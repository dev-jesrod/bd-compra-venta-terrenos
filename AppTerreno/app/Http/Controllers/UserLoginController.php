<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class UserLoginController extends Controller
{
    /**
     * Muestra el formulario de inicio de sesión.
     * Redirige al home si ya está autenticado.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        return view('login');
    }

    /**
     * Procesa el intento de inicio de sesión con manejo de errores y rate limiting.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // 1. Validar los campos del formulario
        $request->validate([
            'email'    => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ], [
            'email.required'    => 'El correo electrónico es obligatorio.',
            'email.email'       => 'El correo electrónico no tiene un formato válido.',
            'password.required' => 'La contraseña es obligatoria.',
        ]);

        // 2. Rate limiting: máximo 5 intentos por IP + email cada 60 segundos
        $throttleKey = Str::lower($request->email) . '|' . $request->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);

            return back()->withErrors([
                'email' => "Demasiados intentos fallidos. Inténtalo de nuevo en {$seconds} segundos.",
            ])->onlyInput('email');
        }

        try {
            // 3. Intentar autenticar
            if (Auth::attempt(
                ['email' => $request->email, 'password' => $request->password],
                $request->boolean('remember')
            )) {
                // Éxito: limpiar intentos fallidos y regenerar sesión
                RateLimiter::clear($throttleKey);
                $request->session()->regenerate();

                // Redirigir según rol
                if (Auth::user()->tipoUsuario === 'vendedor') {
                    return redirect()->route('vendedor.dashboard');
                }

                return redirect()->intended(route('home'));
            }

            // 4. Credenciales incorrectas: registrar intento fallido
            RateLimiter::hit($throttleKey);

            return back()->withErrors([
                'email' => 'El correo o la contraseña son incorrectos.',
            ])->onlyInput('email');

        } catch (\Exception $e) {
            // 5. Error inesperado (ej. BD caída): loggear internamente, mensaje genérico al usuario
            Log::error('Error durante el inicio de sesión: ' . $e->getMessage(), [
                'email'     => $request->email,
                'ip'        => $request->ip(),
                'exception' => $e,
            ]);

            return back()->withErrors([
                'email' => 'Ocurrió un error al intentar iniciar sesión. Inténtalo más tarde.',
            ])->onlyInput('email');
        }
    }

    /**
     * Cierra la sesión del usuario autenticado y redirige al HomePage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        } catch (\Exception $e) {
            Log::error('Error durante el cierre de sesión: ' . $e->getMessage(), [
                'exception' => $e,
            ]);
        }

        return redirect()->route('home');
    }
}