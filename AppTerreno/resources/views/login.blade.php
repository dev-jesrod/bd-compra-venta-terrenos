@extends('layouts.auth')
@section('title', 'Maz Terrenos - Iniciar Sesión')

@php
$css_file = 'login';
@endphp

@section('content')
<main class="flex min-h-screen bg-white">
    <!-- Left Side: Background Image -->
    <div class="hidden lg:block lg:w-1/2 relative">
        <img src="{{ asset('storage/Login-IMG.jpeg') }}" class="absolute inset-0 w-full h-full object-cover">
    </div>

    <!-- Right Side: Login Form -->
    <div class=" w-full lg:w-1/2 flex flex-col justify-center items-center p-8 sm:p-12 lg:p-24">

        <div class="w-full max-w-md">
            <!-- Logo Section -->
            <div class="flex flex-col items-center mb-10">
                <a href="{{ route('home') }}" class="self-start mb-4 text-xs font-bold text-green-700 hover:text-green-800 flex items-center gap-1 transition-colors">
                    <span class="material-symbols-outlined text-[16px]">arrow_back</span>
                    Volver al inicio
                </a>
                <img src="{{ asset('resources/logo.png') }}" alt="Maz Terrenos Logo" class="w-20 h-20 rounded-full object-cover mb-3">
                <h1 class="text-xl font-extrabold text-brand-green tracking-wide uppercase">Maz Terrenos</h1>
            </div>

            <!-- Header Section -->
            <div class="mb-8">
                <h2 class="text-4xl font-extrabold text-brand-green mb-3">Iniciar Sesión</h2>
                <p class="text-gray-500 text-sm">¡Bienvenido de nuevo! Ingresa tus datos para gestionar tus propiedades.</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
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
                                <path
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                            </svg>
                        </div>
                        <input
                            class="block w-full pl-10 pr-3 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:ring-brand-green focus:border-brand-green text-sm @error('email') border-red-500 @enderror"
                            id="email" name="email" value="{{ old('email') }}"
                            placeholder="{{ $email_placeholder ?? 'nombre@empresa.com' }}" type="email" required
                            autocomplete="email" />
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
                        {{-- Ruta: Route::get('/password/reset', [ForgotPasswordController::class,
                        'showLinkRequestForm'])->name('password.request') --}}
                        <a class="text-xs font-bold text-brand-green hover:underline">
                            {{ $forgot_password_text ?? '¿Olvidaste tu contraseña?' }}
                        </a>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                                <path
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                            </svg>
                        </div>
                        <input type="password" name="password" id="password" required placeholder="••••••••"
                            class="block w-full pl-10 pr-10 py-3 rounded-lg bg-gray-50 border-transparent focus:bg-white focus:border-brand-green focus:ring-1 focus:ring-brand-green transition-colors text-gray-900 border text-sm">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <button type="button" id="toggle-password"
                                class="text-gray-400 hover:text-gray-500 focus:outline-none">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    id="eye-icon">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                        @error('password')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Remember Me --}}
                <div class="flex items-center">
                    <input class="h-4 w-4 text-brand-green border-gray-300 rounded focus:ring-brand-green"
                        id="remember_me" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }} />
                    <label class="ml-2 block text-xs text-gray-500" for="remember_me">
                        {{ $remember_text ?? 'Recordarme por 30 días' }}
                    </label>
                </div>

                {{-- Submit Button --}}
                <button
                    class="w-full flex justify-center py-4 px-4 border border-transparent rounded-lg shadow-sm text-base font-bold text-white bg-brand-green hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-green transition-colors duration-200"
                    type="submit">
                    {{ $submit_btn_text ?? 'Iniciar Sesión' }}
                </button>
            </form>

            {{-- Controlador: LoginController -> $register_text, $register_url --}}
            <footer class="mt-12 text-center">
                <div class="mb-8">
                    <p class="text-sm text-gray-500">
                        {{ $no_account_text ?? '¿No tienes una cuenta?' }}
                        <a href="{{ route('registro.cliente') }}" class="text-brand-green font-bold hover:underline">
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
        </div>
</main>

@push('scripts')
<script>
    document.getElementById('toggle-password').addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        const icon = document.getElementById('eye-icon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />';
        } else {
            passwordInput.type = 'password';
            icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />';
        }
    });
</script>
@endpush