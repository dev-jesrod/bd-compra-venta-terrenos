<!DOCTYPE html>
<html class="light" lang="es">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,400;0,700;1,400;1,700&family=Work+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "tertiary-fixed-dim": "#ffb690",
                        "surface-container-low": "#F8F8FF",
                        "outline": "#cbd5e1",
                        "surface-container-highest": "#dfe3e2",
                        "primary-container": "#228B22",
                        "on-primary-fixed": "#002020",
                        "surface-bright": "#ffffff",
                        "on-surface": "#0f172a",
                        "tertiary": "#8c4a24",
                        "on-tertiary-fixed": "#341100",
                        "primary-fixed": "#94f2f2",
                        "on-primary-container": "#ffffff",
                        "secondary": "#475569",
                        "on-surface-variant": "#475569",
                        "surface-container-lowest": "#ffffff",
                        "on-background": "#0f172a",
                        "inverse-primary": "#78d6d5",
                        "surface-variant": "#e2e8f0",
                        "secondary-fixed-dim": "#aacdcc",
                        "tertiary-container": "#aa623a",
                        "on-error-container": "#93000a",
                        "surface-dim": "#d7dbda",
                        "error-container": "#ffdad6",
                        "on-secondary": "#ffffff",
                        "on-primary-fixed-variant": "#004f50",
                        "background": "#F8F8FF",
                        "primary": "#228B22",
                        "on-secondary-fixed": "#002020",
                        "surface-container-high": "#e5e9e8",
                        "secondary-fixed": "#c6e9e8",
                        "on-secondary-container": "#1e293b",
                        "on-error": "#ffffff",
                        "on-tertiary-fixed-variant": "#723611",
                        "on-tertiary-container": "#fffbff",
                        "inverse-surface": "#1e293b",
                        "surface": "#F8F8FF",
                        "secondary-container": "#f1f5f9",
                        "inverse-on-surface": "#f1f5f9",
                        "error": "#ba1a1a",
                        "on-primary": "#ffffff",
                        "on-tertiary": "#ffffff",
                        "tertiary-fixed": "#ffdbca",
                        "surface-tint": "#228B22",
                        "surface-container": "#ebefee",
                        "on-secondary-fixed-variant": "#2b4c4c",
                        "outline-variant": "#e2e8f0",
                        "primary-fixed-dim": "#78d6d5"
                    },
                    fontFamily: {
                        "headline": ["Newsreader", "serif"],
                        "body": ["Work Sans", "sans-serif"],
                        "label": ["Work Sans", "sans-serif"]
                    },
                    borderRadius: {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px"},
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
        }
        body {
            font-family: 'Work Sans', sans-serif;
            background-color: #F8F8FF;
        }
        h1, h2, h3, .font-serif {
            font-family: 'Newsreader', serif;
        }
    </style>
</head>
<body class="text-on-surface selection:bg-primary-container selection:text-on-primary-container">
    <!-- HEADER -->
    <header class="fixed top-0 w-full z-50 bg-[#F8F8FF]/80 backdrop-blur-md shadow-sm">
        <div class="flex justify-between items-center px-8 py-4 max-w-7xl mx-auto">
            <div class="flex items-center gap-3">
                <img class="w-10 h-10 rounded-full object-cover" 
                     data-alt="Maz Terrenos circular logo" 
                     src="{{ $logo ?? asset('images/logo.png') }}"
                     alt="Maz Terrenos Logo">
                <span class="text-2xl font-bold tracking-tight text-slate-900 font-serif italic uppercase">
                    {{ config('app.name', 'Maz Terrenos') }}
                </span>
            </div>
            <nav class="hidden md:flex gap-8 items-center">
                <a class="text-slate-600 hover:text-green-700 transition-colors font-label text-sm font-medium" 
                   href="{{ route('listings.index') }}">Listings</a>
                <a class="text-slate-600 hover:text-green-700 transition-colors font-label text-sm font-medium" 
                   href="{{ route('philosophy') }}">Philosophy</a>
                <a class="text-slate-600 hover:text-green-700 transition-colors font-label text-sm font-medium" 
                   href="{{ route('impact') }}">Impact</a>
                <a class="text-slate-600 hover:text-green-700 transition-colors font-label text-sm font-medium" 
                   href="{{ route('concierge') }}">Concierge</a>
                <a class="bg-primary text-on-primary px-6 py-2 rounded-full font-label text-sm font-semibold hover:scale-102 transition-transform active:scale-98" 
                   href="{{ route('contact.inquiry') }}">Inquire</a>
            </nav>
            <button class="md:hidden">
                <span class="material-symbols-outlined text-on-surface">menu</span>
            </button>
        </div>
    </header>

    <main class="min-h-screen flex flex-col md:flex-row pt-20">
        <!-- HERO SECTION -->
        <section class="hidden md:block md:w-1/2 relative overflow-hidden">
            <img class="absolute inset-0 w-full h-full object-cover" 
                 data-alt="Aerial view of lush green forest canopy" 
                 src="{{ $heroImage ?? asset('images/hero-forest.jpg') }}"
                 alt="Vista aérea del bosque">
            <div class="absolute inset-0 bg-primary/10 backdrop-blur-[2px]"></div>
            <div class="relative h-full flex flex-col justify-end p-16 text-white z-10">
                <h2 class="text-5xl font-serif italic mb-6 leading-tight">
                    {{ $heroTitle ?? 'Comience su viaje hacia la sostenibilidad.' }}
                </h2>
                <p class="text-xl font-body max-w-md opacity-90">
                    {{ $heroSubtitle ?? 'Únase a Maz Terrenos y asegure su lugar en el futuro de la conservación consciente.' }}
                </p>
            </div>
        </section>

        <!-- FORM SECTION -->
        <section class="w-full md:w-1/2 flex flex-col items-center justify-start p-8 md:p-16 bg-surface">
            <div class="w-full max-w-xl">
                <header class="mb-10">
                    <h1 class="text-4xl font-serif font-bold text-on-surface mb-2">
                        {{ $pageTitle ?? 'Crear Cuenta' }}
                    </h1>
                    <p class="text-on-surface-variant font-body">
                        {{ $pageSubtitle ?? 'Complete el formulario para registrarse en la plataforma.' }}
                    </p>
                </header>

                {{-- 
                    ========================================================
                    AQUÍ VA EL CONTROLADOR - MÉTODO create() o show()
                    ========================================================
                    
                    EN EL CONTROLADOR DEBERÍAS TENER:
                    
                    public function create()
                    {
                        return view('auth.register', [
                            'logo' => 'path/to/logo.png',
                            'heroImage' => 'path/to/hero.jpg',
                            'heroTitle' => 'Comience su viaje...',
                            'heroSubtitle' => 'Únase a Maz Terrenos...',
                            'pageTitle' => 'Crear Cuenta',
                            'pageSubtitle' => 'Complete el formulario...',
                            'accountStatus' => 'Activa (Pre-aprobado)',
                            'user' => null // Si es edición
                        ]);
                    }
                    
                    ========================================================
                --}}
                
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
                                @if(old('profile_photo') || $user?->profile_photo)
                                    <img class="w-full h-full object-cover rounded-full" 
                                         src="{{ old('profile_photo') ? asset('storage/' . old('profile_photo')) : asset('storage/' . $user->profile_photo) }}" 
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

                    <!-- Birthdate and Account Status Row -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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
                        <div class="space-y-1.5">
                            <label class="text-sm font-semibold font-label text-on-surface-variant ml-1">Estado de Cuenta</label>
                            <div class="flex items-center gap-3 px-4 py-3 bg-surface-container-low rounded-xl border border-outline-variant">
                                <span class="w-2.5 h-2.5 rounded-full bg-primary animate-pulse"></span>
                                <span class="text-sm font-medium font-label text-on-surface
