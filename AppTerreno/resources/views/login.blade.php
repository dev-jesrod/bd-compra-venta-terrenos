@extends('layouts.app')

@section('title', 'AppTerreno - Iniciar Sesión')

@php
    $css_file = 'login';
@endphp

@section('content')
<main class="flex-1 flex items-center justify-center relative px-4 py-12 md:py-20">
    <!-- Background Decoration -->
    <div class="absolute inset-0 z-0 opacity-10 pointer-events-none overflow-hidden">
        <div class="w-full h-full bg-cover bg-center bg-login-hero" data-alt="Vista aérea de exuberantes colinas verdes y tierras de cultivo"></div>
    </div>

    <!-- Login Card -->
    <div class="w-full max-w-md bg-white dark:bg-background-dark border border-primary/10 rounded-xl shadow-xl p-8 z-10">
        <div class="flex flex-col gap-2 mb-8">
            <h1 class="text-3xl font-black text-slate-900 dark:text-slate-100 tracking-tight">Bienvenido</h1>
            <p class="text-slate-500 dark:text-slate-400 text-base">Accede de forma segura a tu portafolio de inversión de terrenos.</p>
        </div>
        
        <form action="{{ route('login') }}" method="POST" class="flex flex-col gap-5">
            <!-- Email Field -->
            <div class="flex flex-col gap-1.5">
                <label class="text-sm font-semibold text-slate-700 dark:text-slate-300" for="email">Correo Electrónico</label>
                <input class="w-full px-4 py-3 rounded-lg border border-primary/20 bg-background-light dark:bg-background-dark focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all placeholder:text-slate-400 text-slate-900 dark:text-slate-100" id="email" placeholder="nombre@ejemplo.com" type="email" />
            </div>
            
            <!-- Password Field -->
            <div class="flex flex-col gap-1.5">
                <div class="flex justify-between items-center">
                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-300" for="password">Contraseña</label>
                    <a class="text-xs font-bold text-primary hover:underline" href="#">¿Olvidaste tu contraseña?</a>
                </div>
                <div class="relative">
                    <input class="w-full px-4 py-3 pr-10 rounded-lg border border-primary/20 bg-background-light dark:bg-background-dark focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all placeholder:text-slate-400 text-slate-900 dark:text-slate-100" id="password" placeholder="Ingresa tu contraseña" type="password" />
                    <button class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-primary flex items-center" type="button">
                        <span class="material-symbols-outlined text-[20px]">visibility</span>
                    </button>
                </div>
            </div>
            
            <!-- Remember Me -->
            <div class="flex items-center gap-2">
                <input class="w-4 h-4 rounded border-primary/20 text-primary focus:ring-primary cursor-pointer" id="remember" type="checkbox" />
                <label class="text-sm text-slate-600 dark:text-slate-400 cursor-pointer select-none" for="remember">Recordar este dispositivo</label>
            </div>
            
            <!-- Login Button -->
            <button class="w-full bg-primary text-white font-bold py-3.5 rounded-lg shadow-md hover:bg-primary/90 transition-all active:scale-[0.98] mt-2" type="submit">
                Iniciar Sesión
            </button>
            
            <!-- Divider -->
            <div class="flex items-center gap-4 my-2">
                <div class="h-[1px] flex-1 bg-primary/10"></div>
                <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">O continuar con</span>
                <div class="h-[1px] flex-1 bg-primary/10"></div>
            </div>
            
            <!-- Social Login -->
            <button class="w-full flex items-center justify-center gap-3 px-4 py-3 border border-primary/10 rounded-lg bg-white dark:bg-background-dark hover:bg-background-light dark:hover:bg-slate-800 transition-all font-semibold text-slate-700 dark:text-slate-300" type="button">
                <svg class="w-5 h-5" viewBox="0 0 24 24">
                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"></path>
                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"></path>
                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.27.81-.57z" fill="#FBBC05"></path>
                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"></path>
                </svg>
                Google
            </button>
        </form>
        
        <p class="mt-8 text-center text-sm text-slate-500 dark:text-slate-400">
            ¿No tienes una cuenta?
            <a class="font-bold text-primary hover:underline" href="/registro">Empieza a invertir</a>
        </p>
    </div>
</main>
@endsection