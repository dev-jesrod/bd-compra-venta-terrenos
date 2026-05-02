{{--
    Archivo: registro.blade.php
    Descripción: Vista de registro de nuevos usuarios (vendedores/admins)
    Controlador: RegisterController
    - showRegistrationForm() -> GET /registro (pasa $heroImage, $logo, etc.)
    - register(Request $request) -> POST /registro (maneja la creación del usuario)
    
    Variables esperadas desde RegisterController:
    - $hero_image (string) - URL de la imagen del panel izquierdo
    - $logo_url (string) - URL del logo de la marca
    - $hero_title (string) - Título del panel izquierdo
    - $hero_subtitle (string) - Subtítulo del panel izquierdo
    - $page_title (string) - Título del formulario
    - $page_subtitle (string) - Subtítulo del formulario
    - $account_status_text (string) - Texto de estado de cuenta
--}}

@extends('layouts.app')

@section('title', 'Registro - ' . config('app.name', 'Maz Terrenos'))

@push('css_file', 'registro')

@section('styles')
<link href="{{ asset('css/registro.css') }}" rel="stylesheet" />
<style>
    /* Ocultar header y footer del layout en registro */
    .layout-container > header { display: none !important; }
    .layout-container > footer { display: none !important; }
</style>
@endsection

@section('content')
<main class="split-container w-full">
    {{-- Controlador: RegisterController -> $hero_image --}}
    <section class="hidden md:block md:w-1/2 relative overflow-hidden left-panel">
        <img class="absolute inset-0 w-full h-full object-cover" 
             src="{{ $hero_image ?? 'https://lh3.googleusercontent.com/aida/ADBb0ui_uK9rQveIXjxVVr6EvHyuMIsapgNQx6ZRVFv2R5SKMxPr_by-T50-ZblnHQk-WC8OKfd2_hTm9JcZpUG8oooorrmegzhXy2gmjOeDCF_MNOqq2ppTfu4xxY-45kKS10oZAU1dVal_OufbTWkhXqlO3AMrM03Ywp9eIkTcq_BcpfxrLOlZtypmdEpu-Z6hZn2nQQ3BeTl9Fdrouc6aAJ5yn6erg1KLYKsmUwxZym78f1d5y-ATawGX4AcIulj2mj-v-2-gStABv-A' }}"
             alt="Vista aérea del bosque">
        <div class="absolute inset-0 bg-primary/10 backdrop-blur-[2px]"></div>
        {{-- Controlador: RegisterController -> $hero_title, $hero_subtitle --}}
        <div class="relative h-full flex flex-col justify-end p-16 text-white z-10">
            <h2 class="text-5xl font-serif italic mb-6 leading-tight">
                {{ $hero_title ?? 'Comience su viaje hacia la sostenibilidad.' }}
            </h2>
            <p class="text-xl font-body max-w-md opacity-90">
                {{ $hero_subtitle ?? 'Únase a Maz Terrenos y asegure su lugar en el futuro de la conservación consciente.' }}
            </p>
        </div>
    </section>

    {{-- Controlador: RegisterController -> showRegistrationForm() --}}
    <section class="w-full md:w-1/2 flex flex-col items-center justify-start p-8 md:p-16 bg-surface">
        <div class="w-full max-w-xl">
            {{-- Controlador: RegisterController -> $logo_url, $page_title --}}
            <header class="mb-10 flex flex-col items-center md:items-start">
                <div class="w-16 h-16 mb-4 rounded-full bg-white shadow-md flex items-center justify-center border border-outline-variant">
                    <img 
                        src="{{ $logo_url ?? asset('views/logo v2.jpeg') }}" 
                        alt="Logo" 
                        class="w-full h-full object-cover rounded-full"
                    />
                </div>
                <h1 class="text-4xl font-serif font-bold text-on-surface mb-2">
                    {{ $page_title ?? 'Crear Cuenta' }}
                </h1>
                <p class="text-on-surface-variant font-body">
                    {{ $page_subtitle ?? 'Complete el formulario para registrarse en la plataforma.' }}
                </p>
            </header>

            {{-- Controlador: RegisterController -> register(Request $request) --}}
            {{-- Ruta: Route::post('/registro', [RegisterController::class, 'register'])->name('register.store') --}}
            <form action="{{ route('register.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
                @csrf
                @if($errors->any())
                    <div class="bg-error-container text-on-error-container p-4 rounded-xl mb-6">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Profile Photo -->
                <div class="flex flex-col items-center mb-8">
                    <div class="relative group">
                        <div class="w-24 h-24 rounded-full bg-surface-container-highest border-2 border-dashed border-outline-variant flex items-center justify-center overflow-hidden transition-all group-hover:border-primary">
                            @if(old('profile_photo') || (isset($user) && $user->profile_photo))
                                <img class="w-full h-full object-cover rounded-full" 
                                     src="{{ old('profile_photo') ? asset('storage/' . old('profile_photo')) : (isset($user) ? asset('storage/' . $user->profile_photo) : '') }}" 
                                     alt="Foto de perfil">
                            @else
                                <span class="material-symbols-outlined text-4xl text-on-surface-variant group-hover:text-primary">photo_camera</span>
                            @endif
                        </div>
                        <input class="absolute inset-0 opacity-0 cursor-pointer" 
                               name="profile_photo" 
                               type="file" 
                               title="Foto de perfil"
                               accept="image/*">
                        @error('profile_photo')
                            <p class="text-xs text-error mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <span class="text-xs font-label mt-2 block text-center text-on-surface-variant">Foto de perfil</span>
                </div>

                <!-- Names Row -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-1.5">
                        <label class="text-sm font-semibold font-label text-on-surface-variant ml-1">Nombre</label>
                        <input class="w-full px-4 py-3 rounded-xl bg-surface-container-lowest border border-outline-variant focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all font-body text-on-surface @error('nombre') border-error ring-2 ring-error/20 @enderror" 
                               name="nombre"
                               value="{{ old('nombre') }}"
                               placeholder="Ej. Juan" 
                               type="text"/>
                        @error('nombre')
                            <p class="text-xs text-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-sm font-semibold font-label text-on-surface-variant ml-1">Apellido Paterno</label>
                        <input class="w-full px-4 py-3 rounded-xl bg-surface-container-lowest border border-outline-variant focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all font-body text-on-surface @error('apellido_paterno') border-error ring-2 ring-error/20 @enderror" 
                               name="apellido_paterno"
                               value="{{ old('apellido_paterno') }}"
                               placeholder="Ej. Pérez" 
                               type="text"/>
                        @error('apellido_paterno')
                            <p class="text-xs text-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Second Names Row -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-1.5">
                        <label class="text-sm font-semibold font-label text-on-surface-variant ml-1">Apellido Materno</label>
                        <input class="w-full px-4 py-3 rounded-xl bg-surface-container-lowest border border-outline-variant focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all font-body text-on-surface @error('apellido_materno') border-error ring-2 ring-error/20 @enderror" 
                               name="apellido_materno"
                               value="{{ old('apellido_materno') }}"
                               placeholder="Ej. García" 
                               type="text"/>
                        @error('apellido_materno')
                            <p class="text-xs text-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-sm font-semibold font-label text-on-surface-variant ml-1">Teléfono</label>
                        <input class="w-full px-4 py-3 rounded-xl bg-surface-container-lowest border border-outline-variant focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all font-body text-on-surface @error('telefono') border-error ring-2 ring-error/20 @enderror" 
                               name="telefono"
                               value="{{ old('telefono') }}"
                               maxlength="10" 
                               placeholder="10 dígitos" 
                               type="tel"/>
                        @error('telefono')
                            <p class="text-xs text-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Email -->
                <div class="space-y-1.5">
                    <label class="text-sm font-semibold font-label text-on-surface-variant ml-1">Correo Electrónico</label>
                    <input class="w-full px-4 py-3 rounded-xl bg-surface-container-lowest border border-outline-variant focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all font-body text-on-surface @error('email') border-error ring-2 ring-error/20 @enderror" 
                           name="email"
                           value="{{ old('email') }}"
                           placeholder="usuario@ejemplo.com" 
                           type="email"/>
                    @error('email')
                        <p class="text-xs text-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="space-y-1.5">
                    <label class="text-sm font-semibold font-label text-on-surface-variant ml-1">Contraseña</label>
                    <input class="w-full px-4 py-3 rounded-xl bg-surface-container-lowest border border-outline-variant focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all font-body text-on-surface @error('password') border-error ring-2 ring-error/20 @enderror" 
                           name="password"
                           placeholder="••••••••" 
                           type="password"/>
                    @error('password')
                        <p class="text-xs text-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- CURP and Sex Row -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-1.5">
                        <label class="text-sm font-semibold font-label text-on-surface-variant ml-1">CURP</label>
                        <input class="w-full px-4 py-3 rounded-xl bg-surface-container-lowest border border-outline-variant focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all font-body text-on-surface uppercase @error('curp') border-error ring-2 ring-error/20 @enderror" 
                               name="curp"
                               value="{{ old('curp') }}"
                               maxlength="18" 
                               placeholder="18 caracteres" 
                               type="text"/>
                        @error('curp')
                            <p class="text-xs text-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-sm font-semibold font-label text-on-surface-variant ml-1">Sexo</label>
                        <div class="flex gap-4">
                            <label class="flex-1 flex items-center justify-center gap-2 px-4 py-3 rounded-xl border border-outline-variant cursor-pointer transition-all hover:bg-surface-container-low {{ old('sexo') == 'M' ? 'border-primary bg-primary/5' : '' }}">
                                <input class="sr-only" name="sexo" type="radio" value="M" {{ old('sexo') == 'M' ? 'checked' : '' }}/>
                                <span class="text-sm font-medium font-label">M</span>
                            </label>
                            <label class="flex-1 flex items-center justify-center gap-2 px-4 py-3 rounded-xl border border-outline-variant cursor-pointer transition-all hover:bg-surface-container-low {{ old('sexo') == 'F' ? 'border-primary bg-primary/5' : '' }}">
                                <input class="sr-only" name="sexo" type="radio" value="F" {{ old('sexo') == 'F' ? 'checked' : '' }}/>
                                <span class="text-sm font-medium font-label">F</span>
                            </label>
                        </div>
                        @error('sexo')
                            <p class="text-xs text-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Birthdate -->
                <div class="space-y-1.5">
                    <label class="text-sm font-semibold font-label text-on-surface-variant ml-1">Fecha de Nacimiento</label>
                    <input class="w-full px-4 py-3 rounded-xl bg-surface-container-lowest border border-outline-variant focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all font-body text-on-surface @error('fecha_nacimiento') border-error ring-2 ring-error/20 @enderror" 
                           name="fecha_nacimiento"
                           value="{{ old('fecha_nacimiento') }}"
                           type="date"/>
                    @error('fecha_nacimiento')
                        <p class="text-xs text-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Account Status -->
                <div class="space-y-1.5">
                    <label class="text-sm font-semibold font-label text-on-surface-variant ml-1">Estado de Cuenta</label>
                    <div class="flex items-center gap-3 px-4 py-3 bg-surface-container-low rounded-xl border border-outline-variant">
                        <span class="w-2.5 h-2.5 rounded-full bg-primary animate-pulse"></span>
                        <span class="text-sm font-medium font-label text-on-surface">{{ $account_status_text ?? 'Activa (Pre-aprobado)' }}</span>
                    </div>
                </div>

                <!-- Submit Button -->
                <button class="w-full flex justify-center py-4 px-4 border border-transparent rounded-lg shadow-sm text-base font-bold text-white bg-primary hover:bg-primary/90 transition-colors duration-200" type="submit">
                    {{ $register_btn_text ?? 'Registrarse' }}
                </button>
            </form>

            <footer class="mt-10 text-center">
                <p class="text-sm text-on-surface-variant">
                    {{ $has_account_text ?? '¿Ya tienes una cuenta?' }} 
                    {{-- Controlador: LoginController -> showLoginForm() --}}
                    {{-- Ruta: Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login') --}}
                    <a class="text-primary font-bold hover:underline" href="{{ route('login') }}">
                        {{ $login_link_text ?? 'Inicia Sesión' }}
                    </a>
                </p>
            </footer>
        </div>
    </section>
</main>

@push('scripts')
<script src="{{ asset('js/tailwind-registro.js') }}"></script>
@endpush
@endsection
