<<<<<<< HEAD
{{--
    Archivo: login.blade.php
    Descripción: Vista de inicio de sesión para vendedores
    Controlador: LoginController
    - showLoginForm() -> GET /login (pasa $hero_image, $logo, $brand_name)
    - login(Request $request) -> POST /login (maneja autenticación)
=======
<<<<<<< HEAD
<<<<<<< HEAD
{{-- resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>{{ config('app.name', 'Maz Terrenos') }} - Iniciar Sesión</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Newsreader:opsz,wght@6..72,400;6..72,600;6..72,700&family=Work+Sans:wght@300;400;500;600&display=swap" rel="stylesheet"/>
<script id="tailwind-config">
tailwind.config = {
  darkMode: "class",
  theme: {
    extend: {
      "colors": {
        "surface-container-lowest": "#ffffff",
        "on-primary-fixed": "#002020",
        "on-error": "#ffffff",
        "surface-container": "#ebefee",
        "on-tertiary-fixed-variant": "#723611",
        "on-background": "#0f172a",
        "on-primary-container": "#ffffff",
        "surface-tint": "#228B22",
        "secondary-container": "#f1f5f9",
        "on-secondary": "#ffffff",
        "on-tertiary-container": "#fffbff",
        "surface-bright": "#ffffff",
        "on-surface-variant": "#475569",
        "tertiary-container": "#aa623a",
        "surface-variant": "#e2e8f0",
        "surface": "#F8F8FF",
        "surface-container-highest": "#dfe3e2",
        "inverse-surface": "#1e293b",
        "tertiary": "#8c4a24",
        "tertiary-fixed": "#ffdbca",
        "secondary": "#475569",
        "on-surface": "#0f172a",
        "on-secondary-container": "#1e293b",
        "outline-variant": "#e2e8f0",
        "primary-container": "#228B22",
        "on-tertiary-fixed": "#341100",
        "primary-fixed-dim": "#78d6d5",
        "surface-container-low": "#F8F8FF",
        "primary-fixed": "#94f2f2",
        "surface-dim": "#d7dbda",
        "secondary-fixed-dim": "#aacdcc",
        "error-container": "#ffdad6",
        "on-error-container": "#93000a",
        "surface-container-high": "#e5e9e8",
        "on-secondary-fixed-variant": "#2b4c4c",
        "primary": "#228B22",
        "on-tertiary": "#ffffff",
        "on-secondary-fixed": "#002020",
        "on-primary": "#ffffff",
        "inverse-primary": "#78d6d5",
        "secondary-fixed": "#c6e9e8",
        "background": "#F8F8FF",
        "tertiary-fixed-dim": "#ffb690",
        "inverse-on-surface": "#f1f5f9",
        "error": "#ba1a1a",
        "outline": "#cbd5e1",
        "on-primary-fixed-variant": "#004f50"
      },
      "borderRadius": {
        "DEFAULT": "0.25rem",
        "lg": "0.5rem",
        "xl": "0.75rem",
        "full": "9999px"
      },
      "fontFamily": {
        "headline": ["Newsreader", "serif"],
        "body": ["Work Sans", "sans-serif"],
        "label": ["Work Sans", "sans-serif"]
      }
    },
  },
}
</script>
<style>
body { font-family: 'Work Sans', sans-serif; }
h1, h2, h3, .font-serif { font-family: 'Newsreader', serif; }
.material-symbols-outlined {
  font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
}
</style>
</head>
<body class="bg-surface min-h-screen flex items-center justify-center selection:bg-primary/20">
<main class="w-full min-h-screen flex flex-col md:flex-row overflow-hidden">
<!-- Left Side: Immersive Visual -->
<!-- ========================================== -->
{{-- 🎯 CONTROLADOR: LoginController@index() - $hero_image = asset('images/mazatlan.jpg'); --}}
<!-- ========================================== -->
<section class="hidden md:flex md:w-1/2 relative bg-primary items-end p-16 overflow-hidden">
<div class="absolute inset-0 z-0">
<img class="w-full h-full object-cover opacity-80 mix-blend-multiply" 
     src="{{ $hero_image ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuAOeEdlKCLWsmO2sL2E6ADT0Y3ZQG9ka5GWTLKWrRHgr0DILP9gb_W2WidgBJyAkzgCFM-ausUE_fZctSTkOq6FxEjHQYd3Pqmj-2DwXsoLOv_IsfdMuS1VzyveFYfzdtQgobuAW3kyTcj5NuiJIUXsaUapy7sKlUulvTCnAOC6wcRKcd-pjChnO62IzGKqshZ_WsBce090uUP5yjcDSYO34BiDhCTdRL6yPE7e6DyR5dZhnGaM5sl-A-JLNRAEOIISu_AtdPVuVybO' }}" 
     alt="Vista aérea de Mazatlán"/>
<div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
</div>
<div class="relative z-10 max-w-lg">
<h2 class="text-white text-5xl font-serif leading-tight mb-6">
  {{ $slogan ?? config('app.slogan', 'Encuentra el terreno ideal para construir tu futuro consciente.') }}
</h2>
<p class="text-white/80 text-sm tracking-[0.2em] font-semibold">
  — {{ config('app.name', 'MAZ TERRENOS') }}
</p>
</div>
</section>

<!-- Right Side: Interaction Canvas -->
<section class="w-full md:w-1/2 bg-surface-container-low flex flex-col items-center justify-center p-8 md:p-16 relative">

<!-- Branding Header -->
<div class="flex flex-col items-center mb-12 text-center">
<div class="w-16 h-16 rounded-full bg-white shadow-lg flex items-center justify-center mb-4 border border-outline-variant">
<span class="material-symbols-outlined text-primary text-4xl" style="font-variation-settings: 'FILL' 1;">
  home_work
</span>
</div>
<h1 class="text-on-surface text-3xl font-serif font-bold tracking-tight">{{ config('app.name', 'Maz Terrenos') }}</h1>
<p class="text-secondary text-sm font-medium mt-1">{{ $tagline ?? config('app.tagline', 'Inversión consciente, legado natural.') }}</p>
</div>

<!-- Login Form Container -->
<div class="w-full max-w-md bg-surface-container-lowest rounded-xl p-8 md:p-10 shadow-sm border border-outline-variant/30">
<div class="mb-8">
<h2 class="text-on-surface text-2xl font-serif font-bold">{{ __('Iniciar Sesión') }}</h2>
<p class="text-on-surface-variant text-sm mt-2">{{ __('Accede a tu cuenta de inversiones') }}</p>
</div>

<!-- ========================================== -->
{{-- 🎯 CONTROLADOR: Auth\LoginController@login() - POST /login --}}
<!-- ========================================== -->
<form method="POST" action="{{ route('login') }}" class="space-y-6">
@csrf

<!-- Errores Globales -->
@if ($errors->any())
<div class="p-4 bg-error-container border-l-4 border-error rounded-xl mb-6">
  <div class="flex items-start">
    <span class="material-symbols-outlined text-on-error-container mr-3 mt-0.5 text-xl">error</span>
    <div class="text-on-error-container text-sm">
      @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
      @endforeach
    </div>
  </div>
</div>
@endif

<!-- Email Field -->
<div>
<label class="block text-sm font-semibold text-on-surface mb-2" for="email">{{ $email_label ?? __('Email') }}</label>
<div class="relative group">
<div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-on-surface-variant group-focus-within:text-primary transition-colors">
<span class="material-symbols-outlined text-xl">mail</span>
</div>
<input 
  class="block w-full pl-12 pr-4 py-3 bg-surface-container border border-outline-variant rounded-xl text-on-surface focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none @error('email') border-error ring-2 ring-error/50 @enderror" 
  id="email" 
  name="email" 
  value="{{ old('email') }}" 
  placeholder="{{ $email_placeholder ?? __('tu@email.com') }}" 
  type="email" 
  required 
  autocomplete="email"
/>
@if ($errors->has('email'))
  <p class="mt-1 text-sm text-error">{{ $errors->first('email') }}</p>
@endif
</div>
</div>

<!-- Password Field -->
<div>
<div class="flex justify-between items-center mb-2">
<label class="block text-sm font-semibold text-on-surface" for="password">{{ $password_label ?? __('Password') }}</label>
<!-- ========================================== -->
{{-- 🎯 CONTROLADOR: Auth\ForgotPasswordController@showLinkRequestForm() - GET /password/reset --}}
<!-- ========================================== -->
<a class="text-sm font-semibold text-primary hover:text-primary/80 transition-colors" href="{{ route('password.request') }}">
  {{ $forgot_text ?? __('¿Olvidaste tu contraseña?') }}
</a>
</div>
<div class="relative group">
<div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-on-surface-variant group-focus-within:text-primary transition-colors">
<span class="material-symbols-outlined text-xl">lock</span>
</div>
<input 
  class="block w-full pl-12 pr-4 py-3 bg-surface-container border border-outline-variant rounded-xl text-on-surface focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none @error('password') border-error ring-2 ring-error/50 @enderror" 
  id="password" 
  name="password" 
  placeholder="{{ $password_placeholder ?? '••••••••' }}" 
  type="password" 
  required 
  autocomplete="current-password"
/>
@if ($errors->has('password'))
  <p class="mt-1 text-sm text-error">{{ $errors->first('password') }}</p>
@endif
</div>
</div>

<!-- Remember Me -->
<div class="flex items-center">
<input 
  class="h-5 w-5 text-primary border-outline rounded-lg focus:ring-primary focus:ring-offset-2 transition-all cursor-pointer @error('remember') border-error @enderror" 
  id="remember" 
  name="remember" 
  type="checkbox" 
  {{ old('remember') ? 'checked' : '' }}
/>
<label class="ml-3 block text-sm text-on-surface-variant font-medium cursor-pointer" for="remember">
  {{ $remember_text ?? __('Recordarme por 30 días') }}
</label>
</div>

<!-- Submit Button -->
<!-- ========================================== -->
{{-- 🎯 CONTROLADOR: LoginController@login() - $processing = true para deshabilitar --}}
<!-- ========================================== -->
<button 
  class="w-full flex items-center justify-center gap-2 bg-primary text-white py-4 rounded-xl font-bold text-lg hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 shadow-lg shadow-primary/20 disabled:opacity-50 disabled:cursor-not-allowed @cannot('login') opacity-50 cursor-not-allowed @endcannot" 
  type="submit"
  {{ $processing ?? false ? 'disabled' : '' }}
>
<span>{{ $login_btn_text ?? __('Iniciar Sesión') }}</span>
<span class="material-symbols-outlined">arrow_forward</span>
</button>
</form>

<!-- Additional Action -->
<div class="mt-8 text-center">
<p class="text-sm text-on-surface-variant font-medium">
  {{ $no_account_text ?? __('¿No tienes una cuenta?') }} 
  <!-- ========================================== -->
  {{-- 🎯 CONTROLADOR: Auth\RegisterController@showRegistrationForm() - GET /register --}}
  <!-- ========================================== -->
  <a class="text-primary font-bold hover:underline ml-1" href="{{ route('register') }}">
    {{ $register_text ?? __('Regístrate gratis') }}
  </a>
</p>
</div>
</div>

<!-- Contextual Footer -->
<footer class="mt-12 w-full max-w-md">
<nav class="flex justify-center flex-wrap gap-x-6 gap-y-2">
<!-- ========================================== -->
{{-- 🎯 CONTROLADOR: web.php - Route::get('/privacy', ...)->name('privacy.policy'); --}}
<!-- ========================================== -->
<a class="text-secondary text-xs uppercase tracking-widest hover:text-primary transition-colors" href="{{ route('privacy.policy') }}">Privacidad</a>
<a class="text-secondary text-xs uppercase tracking-widest hover:text-primary transition-colors" href="{{ route('terms') }}">Términos</a>
<a class="text-secondary text-xs uppercase tracking-widest hover:text-primary transition-colors" href="{{ route('contact') }}">Contacto</a>
</nav>
<p class="text-center text-on-surface-variant/50 text-[10px] uppercase tracking-widest mt-6">
  © {{ date('Y') }} {{ config('app.name', 'Maz Terrenos') }}. {{ __('Todos los derechos reservados.') }}.
</p>
</footer>
</section>
</main>
</body>
</html>
=======
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion -- MazTerrenos</title>
</head>

<body>
>>>>>>> dataBase
    
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

<<<<<<< HEAD
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
=======
</html>
>>>>>>> 5e284d38264939afc81f06b3ace1c4fca40c7ebb
=======
@extends('layouts.app')

@section('title', 'Maz Terrenos - Iniciar Sesión')

@php
    $css_file = 'login';
@endphp

@section('content')
    <main class="flex min-h-screen bg-white">
        <!-- Left Side: Background Image -->
        <div class="hidden lg:block lg:w-1/2 relative">
            <div class="absolute inset-0 bg-cover bg-center FondoLogin"></div>
        </div>

        <!-- Right Side: Login Form -->
        <div class=" w-full lg:w-1/2 flex flex-col justify-center items-center p-8 sm:p-12 lg:p-24">

            <div class="w-full max-w-md">
                <!-- Logo Section -->
                <div class="flex flex-col items-center mb-10">
                    <div class="w-20 h-20 border-2 border-gray-400 rounded-full flex items-center justify-center mb-3">
                        <!-- Icon Placeholder -->
                        <svg class="w-10 h-10 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </div>
                    <h1 class="text-xl font-extrabold text-[#2ca030] tracking-wide uppercase">Maz Terrenos</h1>
                </div>

                <!-- Header Section -->
                <div class="mb-8">
                    <h2 class="text-4xl font-extrabold text-[#2ca030] mb-3">Sign In</h2>
                    <p class="text-gray-500 text-sm">Welcome back! Please enter your details to manage your properties.</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-800 mb-1.5">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                                placeholder="name@company.com"
                                class="block w-full pl-10 pr-3 py-3 rounded-lg bg-gray-50 border-transparent focus:bg-white focus:border-[#2ca030] focus:ring-1 focus:ring-[#2ca030] transition-colors text-gray-900 border text-sm">
                        </div>
                        @error('email')
                            <span class="text-red-500 text-xs font-semibold mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label for="password" class="block text-sm font-semibold text-gray-800">Password</label>
                            <a href="#" class="text-sm font-bold text-[#2ca030] hover:underline">Se te olvido la
                                contraseña?</a>
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input type="password" name="password" id="password" required placeholder="••••••••"
                                class="block w-full pl-10 pr-10 py-3 rounded-lg bg-gray-50 border-transparent focus:bg-white focus:border-[#2ca030] focus:ring-1 focus:ring-[#2ca030] transition-colors text-gray-900 border text-sm">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <button type="button" id="toggle-password"
                                    class="text-gray-400 hover:text-gray-500 focus:outline-none">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        id="eye-icon">
                                        <!-- Eye icon -->
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        @error('password')
                            <span class="text-red-500 text-xs font-semibold mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex items-center mt-4 mb-6">
                        <input id="remember_me" type="checkbox" name="remember"
                            class="w-4 h-4 text-[#2ca030] bg-white border-gray-300 rounded focus:ring-[#2ca030]">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-600 font-medium">Recordar contraseña
                            por 30 dias</label>
                    </div>

                    <button type="submit"
                        class="w-full bg-[#2ca030] hover:bg-[#238026] text-white font-bold py-3.5 px-4 rounded-xl transition duration-200 shadow-md">
                        Iniciar Sesión
                    </button>
                </form>

                <div class="mt-8 flex justify-center items-center">
                    <p class="text-sm text-gray-500 font-medium">
                        No tiene una cuenta?
                    </p>
                    <a href="{{ route('registro') }}" class="ml-1 text-sm font-bold text-[#2ca030] hover:underline flex">
                        Registrate <br class="hidden"> <span class="ml-1">gratis</span>
                    </a>
                </div>

                <!-- Footer Links -->
                <div class="mt-16 flex justify-center space-x-6 text-xs text-gray-400 font-medium">
                    <a href="#" class="hover:text-gray-600">Politica de Privacidad</a>
                    <a href="#" class="hover:text-gray-600">Terminos de Servicio</a>
                    <a href="#" class="hover:text-gray-600">Centro de Ayuda</a>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.getElementById('toggle-password').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const icon = document.getElementById('eye-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />'; // Crossed eye
            } else {
                passwordInput.type = 'password';
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />'; // Normal eye
            }
        });
    </script>
@endsection
>>>>>>> database
>>>>>>> dataBase
