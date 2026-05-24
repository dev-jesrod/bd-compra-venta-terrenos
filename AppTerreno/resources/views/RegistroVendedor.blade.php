@extends('layouts.app')

@section('title', 'Maz Terrenos - Registro Vendedor')

@section('content')
<main class="flex-1 flex bg-white min-h-[calc(100vh-80px)]">
    <!-- Left Side: Image Placeholder -->
    <div class="hidden lg:flex lg:w-1/2 bg-gray-200 relative items-center justify-center">
        <div class="absolute inset-0 flex items-center justify-center">
            <span class="text-gray-500 font-black text-3xl uppercase tracking-widest text-center px-10">Paisaje de Mazatlán</span>
        </div>
    </div>

    <!-- Right Side: Registration Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12 lg:p-16 bg-white overflow-y-auto">
        <div class="w-full max-w-md">

            <!-- Logo Section -->
            <div class="flex flex-col items-center mb-8">
                <div class="w-16 h-16 rounded-full border-2 border-green-600 flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-green-600 text-3xl">nature_people</span>
                </div>
                <h1 class="text-2xl font-black text-green-700 tracking-wide uppercase">MAZ TERRENOS</h1>
                <p class="text-gray-500 text-sm mt-2 font-medium text-center">Únete a la red inmobiliaria más sostenible del mundo</p>
            </div>

            {{-- Mensaje de error general --}}
            @if(session('error'))
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                    <p class="text-sm text-red-600 font-semibold">{{ session('error') }}</p>
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('registro.store') }}" class="space-y-4">
                @csrf

                {{-- Nombre --}}
                <div>
                    <label class="block text-[11px] font-bold text-gray-800 mb-1.5 tracking-wide">Nombre(s) *</label>
                    <div class="relative flex items-center">
                        <span class="material-symbols-outlined absolute left-4 text-gray-400 text-[18px] pointer-events-none">person</span>
                        <input type="text" name="nombre" value="{{ old('nombre') }}" required
                            placeholder="Ej: Juan"
                            class="w-full pl-11 pr-4 py-3 rounded-lg border text-sm placeholder:text-gray-400 outline-none transition-colors
                                   {{ $errors->has('nombre') ? 'border-red-500 bg-red-50' : 'border-gray-200 focus:ring-1 focus:ring-green-600 focus:border-green-600' }}">
                    </div>
                    @error('nombre')<span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
                </div>

                {{-- Apellido Paterno --}}
                <div>
                    <label class="block text-[11px] font-bold text-gray-800 mb-1.5 tracking-wide">Apellido Paterno *</label>
                    <div class="relative flex items-center">
                        <span class="material-symbols-outlined absolute left-4 text-gray-400 text-[18px] pointer-events-none">badge</span>
                        <input type="text" name="apellido1" value="{{ old('apellido1') }}" required
                            placeholder="Ej: García"
                            class="w-full pl-11 pr-4 py-3 rounded-lg border text-sm placeholder:text-gray-400 outline-none transition-colors
                                   {{ $errors->has('apellido1') ? 'border-red-500 bg-red-50' : 'border-gray-200 focus:ring-1 focus:ring-green-600 focus:border-green-600' }}">
                    </div>
                    @error('apellido1')<span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
                </div>

                {{-- Apellido Materno --}}
                <div>
                    <label class="block text-[11px] font-bold text-gray-800 mb-1.5 tracking-wide">Apellido Materno</label>
                    <div class="relative flex items-center">
                        <span class="material-symbols-outlined absolute left-4 text-gray-400 text-[18px] pointer-events-none">badge</span>
                        <input type="text" name="apellido2" value="{{ old('apellido2') }}"
                            placeholder="Ej: López (opcional)"
                            class="w-full pl-11 pr-4 py-3 rounded-lg border border-gray-200 focus:ring-1 focus:ring-green-600 focus:border-green-600 text-sm placeholder:text-gray-400 outline-none transition-colors">
                    </div>
                    @error('apellido2')<span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
                </div>

                {{-- Sexo --}}
                <div>
                    <label class="block text-[11px] font-bold text-gray-800 mb-1.5 tracking-wide">Sexo *</label>
                    <select name="sexo" required
                        class="w-full px-4 py-3 rounded-lg border text-sm outline-none transition-colors
                               {{ $errors->has('sexo') ? 'border-red-500 bg-red-50' : 'border-gray-200 focus:ring-1 focus:ring-green-600 focus:border-green-600' }}">
                        <option value="" disabled {{ old('sexo') ? '' : 'selected' }}>Selecciona...</option>
                        <option value="M" {{ old('sexo') === 'M' ? 'selected' : '' }}>Masculino</option>
                        <option value="F" {{ old('sexo') === 'F' ? 'selected' : '' }}>Femenino</option>
                    </select>
                    @error('sexo')<span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
                </div>

                {{-- Fecha de Nacimiento --}}
                <div>
                    <label class="block text-[11px] font-bold text-gray-800 mb-1.5 tracking-wide">Fecha de Nacimiento *</label>
                    <input type="date" name="fechaNacimiento" value="{{ old('fechaNacimiento') }}" required
                        class="w-full px-4 py-3 rounded-lg border text-sm outline-none transition-colors
                               {{ $errors->has('fechaNacimiento') ? 'border-red-500 bg-red-50' : 'border-gray-200 focus:ring-1 focus:ring-green-600 focus:border-green-600' }}">
                    @error('fechaNacimiento')<span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
                </div>

                {{-- CURP --}}
                <div>
                    <label class="block text-[11px] font-bold text-gray-800 mb-1.5 tracking-wide">CURP *</label>
                    <div class="relative flex items-center">
                        <span class="material-symbols-outlined absolute left-4 text-gray-400 text-[18px] pointer-events-none">fingerprint</span>
                        <input type="text" name="curp" value="{{ old('curp') }}" required maxlength="18"
                            placeholder="18 caracteres"
                            class="w-full pl-11 pr-4 py-3 rounded-lg border text-sm placeholder:text-gray-400 outline-none transition-colors uppercase
                                   {{ $errors->has('curp') ? 'border-red-500 bg-red-50' : 'border-gray-200 focus:ring-1 focus:ring-green-600 focus:border-green-600' }}">
                    </div>
                    @error('curp')<span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
                </div>

                {{-- Teléfono --}}
                <div>
                    <label class="block text-[11px] font-bold text-gray-800 mb-1.5 tracking-wide">Teléfono *</label>
                    <div class="relative flex items-center">
                        <span class="material-symbols-outlined absolute left-4 text-gray-400 text-[18px] pointer-events-none">call</span>
                        <input type="tel" name="telefono" value="{{ old('telefono') }}" required maxlength="10"
                            placeholder="10 dígitos"
                            class="w-full pl-11 pr-4 py-3 rounded-lg border text-sm placeholder:text-gray-400 outline-none transition-colors
                                   {{ $errors->has('telefono') ? 'border-red-500 bg-red-50' : 'border-gray-200 focus:ring-1 focus:ring-green-600 focus:border-green-600' }}">
                    </div>
                    @error('telefono')<span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
                </div>

                {{-- Correo Electrónico --}}
                <div>
                    <label class="block text-[11px] font-bold text-gray-800 mb-1.5 tracking-wide">Correo Electrónico *</label>
                    <div class="relative flex items-center">
                        <span class="material-symbols-outlined absolute left-4 text-gray-400 text-[18px] pointer-events-none">mail</span>
                        <input type="email" name="email" value="{{ old('email') }}" required
                            placeholder="juan@ejemplo.com"
                            class="w-full pl-11 pr-4 py-3 rounded-lg border text-sm placeholder:text-gray-400 outline-none transition-colors
                                   {{ $errors->has('email') ? 'border-red-500 bg-red-50' : 'border-gray-200 focus:ring-1 focus:ring-green-600 focus:border-green-600' }}">
                    </div>
                    @error('email')<span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
                </div>

                {{-- RFC --}}
                <div>
                    <label class="block text-[11px] font-bold text-gray-800 mb-1.5 tracking-wide">RFC *</label>
                    <div class="relative flex items-center">
                        <span class="material-symbols-outlined absolute left-4 text-gray-400 text-[18px] pointer-events-none">receipt_long</span>
                        <input type="text" name="rfc" value="{{ old('rfc') }}" required maxlength="13"
                            placeholder="Ej: XXXX000000XXX"
                            class="w-full pl-11 pr-4 py-3 rounded-lg border text-sm placeholder:text-gray-400 outline-none transition-colors uppercase
                                   {{ $errors->has('rfc') ? 'border-red-500 bg-red-50' : 'border-gray-200 focus:ring-1 focus:ring-green-600 focus:border-green-600' }}">
                    </div>
                    @error('rfc')<span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
                </div>

                {{-- Utilidad --}}
                <div>
                    <label class="block text-[11px] font-bold text-gray-800 mb-1.5 tracking-wide">Porcentaje de Utilidad (%) *</label>
                    <div class="relative flex items-center">
                        <span class="material-symbols-outlined absolute left-4 text-gray-400 text-[18px] pointer-events-none">percent</span>
                        <input type="number" name="utilidad" value="{{ old('utilidad', 0) }}" required min="0" step="0.01"
                            placeholder="Ej: 5.5"
                            class="w-full pl-11 pr-4 py-3 rounded-lg border text-sm placeholder:text-gray-400 outline-none transition-colors
                                   {{ $errors->has('utilidad') ? 'border-red-500 bg-red-50' : 'border-gray-200 focus:ring-1 focus:ring-green-600 focus:border-green-600' }}">
                    </div>
                    @error('utilidad')<span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
                </div>

                {{-- Contraseña --}}
                <div>
                    <label class="block text-[11px] font-bold text-gray-800 mb-1.5 tracking-wide">Contraseña *</label>
                    <div class="relative flex items-center">
                        <span class="material-symbols-outlined absolute left-4 text-gray-400 text-[18px] pointer-events-none">lock</span>
                        <input type="password" id="password" name="password" required placeholder="Mínimo 8 caracteres"
                            class="w-full pl-11 pr-12 py-3 rounded-lg border text-sm placeholder:text-gray-400 outline-none transition-colors
                                   {{ $errors->has('password') ? 'border-red-500 bg-red-50' : 'border-gray-200 focus:ring-1 focus:ring-green-600 focus:border-green-600' }}">
                        <button id="toggle-password" type="button" class="absolute right-4 text-gray-400 hover:text-gray-600 transition-colors focus:outline-none">
                            <span class="material-symbols-outlined text-[18px]">visibility</span>
                        </button>
                    </div>
                    @error('password')<span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
                </div>

                {{-- Confirmar Contraseña --}}
                <div>
                    <label class="block text-[11px] font-bold text-gray-800 mb-1.5 tracking-wide">Confirmar Contraseña *</label>
                    <div class="relative flex items-center">
                        <span class="material-symbols-outlined absolute left-4 text-gray-400 text-[18px] pointer-events-none">lock_reset</span>
                        <input type="password" name="password_confirmation" required placeholder="Repite tu contraseña"
                            class="w-full pl-11 pr-4 py-3 rounded-lg border border-gray-200 focus:ring-1 focus:ring-green-600 focus:border-green-600 text-sm placeholder:text-gray-400 outline-none transition-colors">
                    </div>
                </div>

                <!-- Submit -->
                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-[#1e8a26] hover:bg-green-800 text-white font-bold py-3.5 rounded-lg flex items-center justify-center gap-2 transition-colors shadow-sm">
                        Registrarse como Vendedor
                        <span class="material-symbols-outlined text-[18px] font-bold">arrow_forward</span>
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center text-xs text-gray-500 font-medium tracking-wide">
                ¿Ya tienes una cuenta?
                <a href="{{ route('login') }}" class="text-[#1e8a26] font-bold hover:underline">Inicia sesión aquí</a>
            </div>

            <div class="mt-3 text-center text-xs text-gray-500 font-medium tracking-wide">
                ¿Eres comprador?
                <a href="{{ route('registro.cliente') }}" class="text-blue-600 font-bold hover:underline">Regístrate aquí</a>
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