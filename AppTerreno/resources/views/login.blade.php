{{--
    Archivo: login.blade.php
    Descripción: Vista de inicio de sesión para vendedores
    Controlador: LoginController
    - showLoginForm() -> GET /login (pasa $hero_image, $logo, $brand_name)
    - login(Request $request) -> POST /login (maneja autenticación)
    
    Variables esperadas desde LoginController:
    - $hero_image (string) - URL de la imagen del panel izquierdo
    - $logo_url (string) - URL del logo de la marca
    - $brand_name (string) - Nombre de la marca
    - $sign_in_title (string) - Título principal del formulario
    - $sign_in_subtitle (string) - Subtítulo del formulario
    - $email_label (string)
    - $email_placeholder (string)
    - $password_label (string)
    - $password_placeholder (string)
    - $forgot_password_text (string)
    - $remember_text (string)
    - $submit_btn_text (string)
    - $register_text (string)
    - $register_url (string) - Ruta de registro
    - $forgot_password_url (string) - Ruta de recuperación de contraseña
--}}

@extends('layouts.app')

@section('title', 'Iniciar Sesión - ' . ($brand_name ?? 'Maz Terrenos'))

@section('styles')
<style>
    .split-container {
        display: flex;
        min-height: 100vh;
    }
    @media (max-width: 768px) {
        .split-container {
            flex-direction: column;
        }
        .left-panel {
            height: 300px;
            width: 100%;
        }
    }
    /* Ocultar header y footer del layout en login */
    .layout-container > header { display: none !important; }
    .layout-container > footer { display: none !important; }
    .layout-container { min-height: 100vh !important; }
</style>
@endsection

@section('content')
<main class="split-container w-full">
    {{-- Controlador: LoginController -> $hero_image --}}
    <section class="left-panel hidden md:block md:w-1/2 lg:w-[50%] relative overflow-hidden">
        <img 
            alt="Coastal view of Mazatlán" 
            class="absolute inset-0 w-full h-full object-cover" 
            src="{{ $hero_image ?? 'https://lh3.googleusercontent.com/aida/ADBb0ui_uK9rQveIXjxVVr6EvHyuMIsapgNQx6ZRVFv2R5SKMxPr_by-T50-ZblnHQk-WC8OKfd2_hTm9JcZpUG8oooorrmegzhXy2gmjOeDCF_MNOqq2ppTfu4xxY-45kKS10oZAU1dVal_OufbTWkhXqlO3AMrM03Ywp9eIkTcq_BcpfxrLOlZtypmdEpu-Z6hZn2nQQ3BeTl9Fdrouc6aAJ5yn6erg1KLYKsmUwxZym78f1d5y-ATawGX4AcIulj2mj-v-2-gStABv-A' }}"
        />
    </section>

    {{-- Controlador: LoginController -> showLoginForm() --}}
    <section class="flex flex-col justify-center items-center w-full md:w-1/2 p-8 md:p-12 lg:p-24 bg-white">
        <div class="w-full max-w-md">
            {{-- Controlador: LoginController -> $logo_url, $brand_name --}}
            <header class="flex flex-col items-center mb-10">
                <div class="w-20 h-20 mb-4 rounded-full border border-gray-200 flex items-center justify-center p-3">
                    <img 
                        alt="Logo de la marca" 
                        class="w-full h-full object-contain" 
                        src="{{ $logo_url ?? asset('views/logo v2.jpeg') }}"
                    />
                </div>
                <h1 class="text-brand-green font-brand text-2xl font-extrabold tracking-wider uppercase">
                    {{ $brand_name ?? 'MAZ TERRENOS' }}
                </h1>
            </header>

            {{-- Controlador: LoginController -> $sign_in_title, $sign_in_subtitle --}}
            <div class="mb-8">
                <h2 class="text-brand-green font-brand text-4xl font-extrabold mb-3">
                    {{ $sign_in_title ?? 'Iniciar Sesión' }}
                </h2>
                <p class="text-gray-500 text-sm">
                    {{ $sign_in_subtitle ?? 'Bienvenido de vuelta. Ingresa tus datos para gestionar tus propiedades.' }}
                </p>
            </div>

            {{-- Controlador: LoginController -> login(Request $request) --}}
            {{-- Ruta: Route::post('/login', [LoginController::class, 'login'])->name('login') --}}
            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf

                {{-- Mostrar errores globales si existen --}}
                @if ($errors->any())
                <div class="p-4 bg-red-50 border-l-4 border-red-500 rounded-lg mb-6">
                    @foreach ($errors->all() as $error)
                        <p class="text-sm text-red-700">{{ $error }}</p>
                    @endforeach
                </div>
                @endif

                {{-- Email Field --}}
                <div class="space-y-1">
                    <label class="block text-sm font-semibold text-gray-700" for="email">
                        {{ $email_label ?? 'Email' }}
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                                <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                            </svg>
                        </div>
                        <input 
                            class="block w-full pl-10 pr-3 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:ring-brand-green focus:border-brand-green text-sm @error('email') border-red-500 @enderror" 
                            id="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            placeholder="{{ $email_placeholder ?? 'nombre@empresa.com' }}" 
                            type="email" 
                            required 
                            autocomplete="email"
                        />
                        @error('email')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Password Field --}}
                <div class="space-y-1">
                    <div class="flex items-center justify-between">
                        <label class="block text-sm font-semibold text-gray-700" for="password">
                            {{ $password_label ?? 'Contraseña' }}
                        </label>
                        {{-- Controlador: ForgotPasswordController -> showLinkRequestForm() --}}
                        {{-- Ruta: Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request') --}}
                        <a 
                            class="text-xs font-bold text-brand-green hover:underline" 
                            href="{{ $forgot_password_url ?? route('password.request') }}"
                        >
                            {{ $forgot_password_text ?? '¿Olvidaste tu contraseña?' }}
                        </a>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                                <path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                            </svg>
                        </div>
                        <input 
                            class="block w-full pl-10 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:ring-brand-green focus:border-brand-green text-sm @error('password') border-red-500 @enderror" 
                            id="password" 
                            name="password" 
                            placeholder="{{ $password_placeholder ?? '••••••••' }}" 
                            type="password" 
                            required 
                            autocomplete="current-password"
                        />
                        <div id="toggle-password" class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                            </svg>
                        </div>
                        @error('password')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Remember Me --}}
                <div class="flex items-center">
                    <input 
                        class="h-4 w-4 text-brand-green border-gray-300 rounded focus:ring-brand-green" 
                        id="remember_me" 
                        name="remember" 
                        type="checkbox" 
                        {{ old('remember') ? 'checked' : '' }}
                    />
                    <label class="ml-2 block text-xs text-gray-500" for="remember_me">
                        {{ $remember_text ?? 'Recordarme por 30 días' }}
                    </label>
                </div>

                {{-- Submit Button --}}
                <button 
                    class="w-full flex justify-center py-4 px-4 border border-transparent rounded-lg shadow-sm text-base font-bold text-white bg-brand-green hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-green transition-colors duration-200" 
                    type="submit"
                >
                    {{ $submit_btn_text ?? 'Iniciar Sesión' }}
                </button>
            </form>

            {{-- Controlador: LoginController -> $register_text, $register_url --}}
            <footer class="mt-12 text-center">
                <div class="mb-8">
                    <p class="text-sm text-gray-500">
                        {{ $no_account_text ?? '¿No tienes una cuenta?' }} 
                        <a class="text-brand-green font-bold hover:underline" href="{{ $register_url ?? route('register') }}">
                            {{ $register_text ?? 'Regístrate gratis' }}
                        </a>
                    </p>
                </div>
                <nav class="flex justify-center space-x-6 text-xs text-gray-400 font-medium">
                    <a class="hover:text-gray-600 transition-colors" href="#">Política de Privacidad</a>
                    <a class="hover:text-gray-600 transition-colors" href="#">Términos de Servicio</a>
                    <a class="hover:text-gray-600 transition-colors" href="#">Centro de Ayuda</a>
                </nav>
            </footer>
        </div>
    </section>
</main>

@push('scripts')
<script>
    document.getElementById('toggle-password')?.addEventListener('click', function() {
        const input = document.getElementById('password');
        const type = input.type === 'password' ? 'text' : 'password';
        input.type = type;
    });
</script>
@endpush
@endsection
