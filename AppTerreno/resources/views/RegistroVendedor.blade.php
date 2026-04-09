@extends('layouts.app')

@section('title', 'Maz Terrenos - Registro')

@php
    $css_file = 'registro';
@endphp

@section('content')
<main class="flex-1 flex bg-white min-h-[calc(100vh-80px)]">
    <!-- Left Side: Image Placeholder -->
    <div class="hidden lg:flex lg:w-1/2 bg-gray-200 relative items-center justify-center">
        <!-- 
        <img src="{{ asset('public/images/paisaje-mazatlan.jpg') }}" class="absolute inset-0 w-full h-full object-cover">
        -->
        <div class="absolute inset-0 flex items-center justify-center">
            <span class="text-gray-500 font-black text-3xl uppercase tracking-widest text-center px-10">Paisaje de Mazatlán</span>
        </div>
    </div>

    <!-- Right Side: Registration Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12 lg:p-24 bg-white">
        <div class="w-full max-w-md">
            
            <!-- Logo Section -->
            <div class="flex flex-col items-center mb-8">
                <div class="w-16 h-16 rounded-full border-2 border-green-600 flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-green-600 text-3xl">nature_people</span>
                </div>
                <h1 class="text-2xl font-black text-green-700 tracking-wide uppercase">MAZ TERRENOS</h1>
                <p class="text-gray-500 text-sm mt-2 font-medium text-center">Únete a la red inmobiliaria más sostenible del mundo</p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('registro.store') }}" class="space-y-4">
                @csrf
                <input type="hidden" name="role" value="seller" />

                <!-- Nombre Completo -->
                <div>
                    <label class="block text-[11px] font-bold text-gray-800 mb-1.5 tracking-wide">Nombre Completo</label>
                    <div class="relative flex items-center">
                        <span class="material-symbols-outlined absolute left-4 text-gray-400 text-[18px] pointer-events-none">person</span>
                        <input type="text" name="name" value="{{ old('name') }}" required placeholder="Ej: Juan Pérez" class="w-full pl-11 pr-4 py-3 rounded-lg border border-gray-200 focus:ring-1 focus:ring-green-600 focus:border-green-600 text-sm placeholder:text-gray-400 outline-none transition-colors @error('name') border-red-500 @enderror">
                    </div>
                    @error('name')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Nombre de la Inmobiliaria / Negocio -->
                <div>
                    <label class="block text-[11px] font-bold text-gray-800 mb-1.5 tracking-wide">Nombre de la Inmobiliaria / Negocio</label>
                    <div class="relative flex items-center">
                        <span class="material-symbols-outlined absolute left-4 text-gray-400 text-[18px] pointer-events-none">domain</span>
                        <input type="text" name="business_name" value="{{ old('business_name') }}" placeholder="Ej: Inmuebles Verdes S.A." class="w-full pl-11 pr-4 py-3 rounded-lg border border-gray-200 focus:ring-1 focus:ring-green-600 focus:border-green-600 text-sm placeholder:text-gray-400 outline-none transition-colors @error('business_name') border-red-500 @enderror">
                    </div>
                    @error('business_name')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Correo Electrónico -->
                <div>
                    <label class="block text-[11px] font-bold text-gray-800 mb-1.5 tracking-wide">Correo Electrónico</label>
                    <div class="relative flex items-center">
                        <span class="material-symbols-outlined absolute left-4 text-gray-400 text-[18px] pointer-events-none">mail</span>
                        <input type="email" name="email" value="{{ old('email') }}" required placeholder="juan@ejemplo.com" class="w-full pl-11 pr-4 py-3 rounded-lg border border-gray-200 focus:ring-1 focus:ring-green-600 focus:border-green-600 text-sm placeholder:text-gray-400 outline-none transition-colors @error('email') border-red-500 @enderror">
                    </div>
                    @error('email')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Teléfono -->
                <div>
                    <label class="block text-[11px] font-bold text-gray-800 mb-1.5 tracking-wide">Teléfono</label>
                    <div class="relative flex items-center">
                        <span class="material-symbols-outlined absolute left-4 text-gray-400 text-[18px] pointer-events-none">call</span>
                        <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="+52 55 1234 5678" class="w-full pl-11 pr-4 py-3 rounded-lg border border-gray-200 focus:ring-1 focus:ring-green-600 focus:border-green-600 text-sm placeholder:text-gray-400 outline-none transition-colors @error('phone') border-red-500 @enderror">
                    </div>
                    @error('phone')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Contraseña -->
                <div>
                    <label class="block text-[11px] font-bold text-gray-800 mb-1.5 tracking-wide">Contraseña</label>
                    <div class="relative flex items-center">
                        <span class="material-symbols-outlined absolute left-4 text-gray-400 text-[18px] pointer-events-none">lock</span>
                        <input type="password" id="password" name="password" required placeholder="••••••••" class="w-full pl-11 pr-12 py-3 rounded-lg border border-gray-200 focus:ring-1 focus:ring-green-600 focus:border-green-600 text-sm placeholder:text-gray-400 outline-none transition-colors @error('password') border-red-500 @enderror">
                        <button id="toggle-password" type="button" class="absolute right-4 text-gray-400 hover:text-gray-600 transition-colors focus:outline-none">
                            <span class="material-symbols-outlined text-[18px]">visibility</span>
                        </button>
                    </div>
                    @error('password')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="pt-6">
                    <button type="submit" class="w-full bg-[#1e8a26] hover:bg-green-800 text-white font-bold py-3.5 rounded-lg flex items-center justify-center gap-2 transition-colors shadow-sm">
                        Registrarse como Vendedor
                        <span class="material-symbols-outlined text-[18px] font-bold">arrow_forward</span>
                    </button>
                </div>
            </form>

            <div class="mt-8 text-center text-xs text-gray-500 font-medium tracking-wide">
                ¿Ya tienes una cuenta? <a href="{{ route('login') }}" class="text-[#1e8a26] font-bold hover:underline">Inicia sesión aquí</a>
            </div>
            
        </div>
    </div>
</main>

<script>
    document.getElementById('toggle-password').addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        const icon = this.querySelector('span');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.textContent = 'visibility_off';
        } else {
            passwordInput.type = 'password';
            icon.textContent = 'visibility';
        }
    });
</script>
@endsection