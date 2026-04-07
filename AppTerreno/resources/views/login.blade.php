<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>{{ config('app.name', 'Maz Terrenos') }} - @yield('title', 'Iniciar Sesión')</title>
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
                        "primary-fixed-dim": "#78d6d6",
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
    @stack('styles')
</head>
<body class="bg-surface min-h-screen flex items-center justify-center selection:bg-primary/20">
    @include('partials.flash-messages') {{-- Mostrar mensajes de sesión/error --}}
    
    <main class="w-full min-h-screen flex flex-col md:flex-row overflow-hidden">
        <!-- Left Side: Immersive Visual -->
        <section class="hidden md:flex md:w-1/2 relative bg-primary items-end p-16 overflow-hidden">
            <div class="absolute inset-0 z-0">
                <img class="w-full h-full object-cover opacity-80 mix-blend-multiply" 
                     data-alt="Aerial view of Mazatlan coastline at dusk with the boardwalk stretching along the blue ocean and city lights beginning to twinkle" 
                     src="{{ asset('images/mazatlan-coastline.jpg') }}" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
            </div>
            <div class="relative z-10 max-w-lg">
                <h2 class="text-white text-5xl font-serif leading-tight mb-6">
                    Encuentra el terreno ideal para construir tu futuro consciente.
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
                    <img alt="{{ config('app.name', 'Maz Terrenos') }} Logo" 
                         class="w-full h-full rounded-full object-cover" 
                         src="{{ asset('images/logo.png') }}" />
                </div>
                <h1 class="text-3xl font-serif font-bold tracking-tight text-primary">{{ config('app.name', 'Maz Terrenos') }}</h1>
                <p class="text-secondary text-sm font-medium mt-1">{{ config('app.tagline', 'Inversión consciente, legado natural.') }}</p>
            </div>

            <!-- Login Form Container -->
            <div class="w-full max-w-md bg-surface-container-lowest rounded-xl p-8 md:p-10 shadow-sm border border-outline-variant/30">
                <div class="mb-8">
                    <h2 class="text-on-surface text-2xl font-serif font-bold">Iniciar Sesión</h2>
                    <p class="text-on-surface-variant text-sm mt-2">Accede a tu cuenta de inversiones</p>
                </div>

                {{-- ═══════════════════════════════════════════════════════════════════════════════════ --}}
                {{-- 🚨 CONTROLADOR 1: MOSTRAR FORMULARIO DE LOGIN                                        --}}
                {{-- 📍 app/Http/Controllers/Auth/AuthController.php → showLoginForm()                  --}}
                {{-- 📍 Ruta: Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); --}}
                {{-- ═══════════════════════════════════════════════════════════════════════════════════ --}}

                {{-- 🚨 CONTROLADOR 2: PROCESAR LOGIN (POST)                                             --}}
                {{-- 📍 app/Http/Controllers/Auth/AuthController.php → login(Request $request)          --}}
                {{-- 📍 Ruta: Route::post('/login', [AuthController::class, 'login'])->name('login');    --}}
                {{-- ═══════════════════════════════════════════════════════════════════════════════════ --}}

                <form class="space-y-6" method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <!-- Email Field -->
                    <div>
                        <label class="block text-sm font-semibold text-on-surface mb-2" for="email">Email</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-on-surface-variant group-focus-within:text-primary transition-colors">
                                <span class="material-symbols-outlined text-xl">mail</span>
                            </div>
                            <input class="block w-full pl-12 pr-4 py-3 bg-surface-container border border-outline-variant rounded-xl text-on-surface focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none @error('email') border-error ring-2 ring-error @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}"
                                   placeholder="tu@email.com" 
                                   type="email"
                                   required/>
                        </div>
                        @error('email')
                            <p class="mt-1 text-sm text-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <label class="block text-sm font-semibold text-on-surface" for="password">Password</label>
                            {{-- 🚨 RUTA: Route::get('/password/reset', ...)->name('password.request'); --}}
                            <a class="text-sm font-semibold text-primary hover:text-primary/80 transition-colors" href="{{ route('password.request') }}">
                                ¿Olvidaste tu contraseña?
                            </a>
                        </div>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-on-surface-variant group-focus-within:text-primary transition-colors">
                                <span class="material-symbols-outlined text-xl">lock</span>
                            </div>
                            <input class="block w-full pl-12 pr-4 py-3 bg-surface-container border border-outline-variant rounded-xl text-on-surface focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none @error('password') border-error ring-2 ring-error @enderror" 
                                   id="password" 
                                   name="password" 
                                   placeholder="••••••••" 
                                   type="password"
                                   required/>
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input class="h-5 w-5 text-primary border-outline rounded-lg focus:ring-primary focus:ring-offset-2 transition-all cursor-pointer" 
                               id="remember-me" 
                               name="remember" 
                               type="checkbox"
                               {{ old('remember') ? 'checked' : '' }}/>
                        <label class="ml-3 block text-sm text-on-surface-variant font-medium cursor-pointer" for="remember-me">
                            Recordarme por 30 días
                        </label>
                    </div>

                    <!-- Submit Button - ENVÍA AL CONTROLADOR login() -->
                    <button class="w-full flex items-center justify-center gap-2 bg-primary text-white py-4 rounded-xl font-bold text-lg hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 shadow-lg shadow-primary/20 disabled:opacity-50" 
                            type="submit">
                        <span>Iniciar Sesión</span>
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </button>
                </form>

                <!-- Additional Action -->
                <div class="mt-8 text-center">
                    <p class="text-sm text-on-surface-variant font-medium">
                        ¿No tienes una cuenta? 
                        {{-- 🚨 RUTA: Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register'); --}}
                        <a class="text-primary font-bold hover:underline ml-1" href="{{ route('register') }}">Regístrate gratis</a>
                    </p>
                </div>
            </div>

            <!-- Contextual Footer -->
            <footer class="mt-12 w-full max-w-md">
                <nav class="flex justify-center flex-wrap gap-x-6 gap-y-2">
                    {{-- 🚨 RUTAS ADICIONALES --}}
                    <a class="text-secondary text-xs uppercase tracking-widest hover:text-primary transition-colors" href="{{ route('privacy') }}">Privacidad</a>
                    <a class="text-secondary text-xs uppercase tracking-widest hover:text-primary transition-colors" href="{{ route('terms') }}">Términos</a>
                    <a class="text-secondary text-xs uppercase tracking-widest hover:text-primary transition-colors" href="{{ route('contact') }}">Contacto</a>
                </nav>
                <p class="text-center text-on-surface-variant/50 text-[10px] uppercase tracking-widest mt-6">
                    © {{ date('Y') }} {{ config('app.name') }}. Todos los derechos reservados.
                </p>
            </footer>
        </section>
    </main>

    @stack('scripts')
</body>
</html>
