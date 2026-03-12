@extends('layouts.app')

@section('title', 'AppTerreno - Crear Cuenta')

@php
    $css_file = 'registro';
@endphp

@section('content')
<main class="flex flex-1 items-center justify-center p-6 bg-background-light dark:bg-background-dark">
    <div class="w-full max-w-[480px] space-y-8 bg-white dark:bg-slate-900 p-8 rounded-xl shadow-xl shadow-primary/5 border border-primary/5">
        <div class="text-center space-y-2">
            <h1 class="text-3xl font-black tracking-tight text-slate-900 dark:text-white">Crear Cuenta</h1>
            <p class="text-primary/70 dark:text-primary/60 text-sm">Únete a AppTerreno para iniciar tu viaje inmobiliario</p>
        </div>

        <div class="flex p-1 bg-primary/5 rounded-xl">
            <label class="flex-1 cursor-pointer">
                <input checked class="peer hidden" name="role" type="radio" value="buyer" />
                <div class="flex items-center justify-center py-2.5 rounded-lg text-sm font-semibold transition-all peer-checked:bg-primary peer-checked:text-white text-primary/60">
                    Comprador
                </div>
            </label>
            <label class="flex-1 cursor-pointer">
                <input class="peer hidden" name="role" type="radio" value="seller" />
                <div class="flex items-center justify-center py-2.5 rounded-lg text-sm font-semibold transition-all peer-checked:bg-primary peer-checked:text-white text-primary/60">
                    Vendedor
                </div>
            </label>
        </div>

        <form class="space-y-4" method="POST" action="{{ route('registro.store') }}">
            @csrf
            <div class="space-y-2">
                <label class="text-sm font-semibold text-slate-700 dark:text-slate-300 ml-1">Nombre Completo</label>
                <div class="relative flex items-center">
                    <span class="material-symbols-outlined absolute left-4 text-primary/40 text-xl pointer-events-none">person</span>
                    <input class="w-full pl-12 pr-4 py-3.5 bg-background-light dark:bg-slate-800 border-primary/10 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-slate-900 dark:text-white placeholder:text-slate-400 @error('name') border-red-500 @enderror" placeholder="Juan Pérez" type="text" name="name" value="{{ old('name') }}" required />
                </div>
                @error('name')
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="space-y-2">
                <label class="text-sm font-semibold text-slate-700 dark:text-slate-300 ml-1">Correo Electrónico</label>
                <div class="relative flex items-center">
                    <span class="material-symbols-outlined absolute left-4 text-primary/40 text-xl pointer-events-none">mail</span>
                    <input class="w-full pl-12 pr-4 py-3.5 bg-background-light dark:bg-slate-800 border-primary/10 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-slate-900 dark:text-white placeholder:text-slate-400 @error('email') border-red-500 @enderror" placeholder="juan@ejemplo.com" type="email" name="email" value="{{ old('email') }}" required />
                </div>
                @error('email')
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="space-y-2">
                <label class="text-sm font-semibold text-slate-700 dark:text-slate-300 ml-1">Número de Teléfono</label>
                <div class="relative flex items-center">
                    <span class="material-symbols-outlined absolute left-4 text-primary/40 text-xl pointer-events-none">call</span>
                    <input class="w-full pl-12 pr-4 py-3.5 bg-background-light dark:bg-slate-800 border-primary/10 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-slate-900 dark:text-white placeholder:text-slate-400" placeholder="+1 (555) 000-0000" type="tel" name="phone" />
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-sm font-semibold text-slate-700 dark:text-slate-300 ml-1">Contraseña</label>
                <div class="relative flex items-center">
                    <span class="material-symbols-outlined absolute left-4 text-primary/40 text-xl pointer-events-none">lock</span>
                    <input class="w-full pl-12 pr-12 py-3.5 bg-background-light dark:bg-slate-800 border-primary/10 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-slate-900 dark:text-white placeholder:text-slate-400 @error('password') border-red-500 @enderror" id="password" placeholder="••••••••" type="password" name="password" required />
                    <button id="toggle-password" class="absolute right-4 flex items-center justify-center text-primary/40 hover:text-primary transition-colors h-full w-8" type="button">
                        <span class="material-symbols-outlined text-xl leading-none">visibility</span>
                    </button>
                </div>
                @error('password')
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="pt-2">
                <button class="w-full bg-primary hover:bg-primary/90 text-white font-bold py-4 rounded-xl transition-all shadow-lg shadow-primary/20 transform active:scale-[0.98]" type="submit">
                    Crear Cuenta
                </button>
            </div>
        </form>

        <div class="relative py-4">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-primary/10"></div>
            </div>
            <div class="relative flex justify-center text-xs uppercase">
                <span class="bg-white dark:bg-slate-900 px-2 text-primary/40 font-semibold tracking-wider">O continuar con</span>
            </div>
        </div>

        <button class="w-full flex items-center justify-center gap-3 bg-white dark:bg-slate-800 border border-primary/10 hover:bg-primary/5 dark:hover:bg-slate-700/50 py-3.5 rounded-xl transition-all text-slate-700 dark:text-slate-200 font-semibold">
            <svg class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"></path>
                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"></path>
                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"></path>
                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.66l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"></path>
            </svg>
            Registrarse con Google
        </button>

        <div class="text-center space-y-4">
            <p class="text-xs text-primary/60 dark:text-primary/40 leading-relaxed max-w-[320px] mx-auto">
                Al crear una cuenta, aceptas nuestros
                <a class="text-primary font-bold hover:underline decoration-2" href="#">Términos y Condiciones</a>
                y
                <a class="text-primary font-bold hover:underline decoration-2" href="#">Política de Privacidad</a>.
            </p>
            <p class="text-sm text-slate-600 dark:text-slate-400">
                ¿Ya tienes una cuenta?
                <a class="text-primary font-bold hover:underline decoration-2 ml-1" href="/login">Iniciar Sesión</a>
            </p>
        </div>
    </div>
</main>

<script>
    document.getElementById('toggle-password').addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        const icon = this.querySelector('span');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.textContent = 'visibility_off'; // Icono para ocultar
        } else {
            passwordInput.type = 'password';
            icon.textContent = 'visibility'; // Icono para mostrar
        }
    });
</script>
@endsection