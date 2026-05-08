<!DOCTYPE html>
<html class="light" lang="es">
<<<<<<< HEAD
=======

>>>>>>> database
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>@yield('title', 'AppTerreno')</title>
<<<<<<< HEAD
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script>
tailwind.config = {
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                primary: "#228B22",
                'brand-green': "#228B22",
                secondary: "#475569",
                surface: "#F8F8FF",
                surfaceContainer: "#ebefee",
                surfaceContainerLow: "#F8F8FF",
                surfaceContainerLowest: "#ffffff",
                surfaceContainerHigh: "#e5e9e8",
                surfaceContainerHighest: "#dfe3e2",
                surfaceDim: "#d7dbda",
                onSurface: "#0f172a",
                onSurfaceVariant: "#475569",
                onPrimary: "#ffffff",
                onSecondary: "#ffffff",
                background: "#F8F8FF",
                outline: "#cbd5e1",
                outlineVariant: "#e2e8f0",
                tertiary: "#8c4a24",
                tertiaryContainer: "#aa623a",
                tertiaryFixed: "#ffdbca",
                tertiaryFixedDim: "#ffb690",
                onTertiary: "#ffffff",
                onTertiaryFixed: "#341100",
                onTertiaryFixedVariant: "#723611",
                onTertiaryContainer: "#fffbff",
                secondaryFixed: "#c6e9e8",
                secondaryFixedDim: "#aacdcc",
                onSecondaryFixed: "#002020",
                onSecondaryFixedVariant: "#2b4c4c",
                onSecondaryContainer: "#1e293b",
                secondaryContainer: "#f1f5f9",
                primaryFixed: "#94f2f2",
                primaryFixedDim: "#78d6d5",
                onPrimaryFixed: "#002020",
                onPrimaryFixedVariant: "#004f50",
                onPrimaryContainer: "#ffffff",
                primaryContainer: "#228B22",
                surfaceTint: "#228B22",
                inversePrimary: "#78d6d5",
                inverseSurface: "#1e293b",
                inverseOnSurface: "#f1f5f9",
                error: "#ba1a1a",
                errorContainer: "#ffdad6",
                onError: "#ffffff",
                onErrorContainer: "#93000a",
                onBackground: "#0f172a",
                surfaceBright: "#ffffff",
            },
            fontFamily: {
                serif: ["Georgia", "serif"],
                display: ["Inter", "sans-serif"],
                sans: ["Inter", "sans-serif"],
                headline: ["Newsreader", "serif"],
                body: ["Work Sans", "sans-serif"],
                label: ["Work Sans", "sans-serif"],
                brand: ["Newsreader", "serif"],
            },
            borderRadius: {
                DEFAULT: "0.25rem",
                lg: "0.5rem",
                xl: "0.75rem",
                full: "9999px",
            }
        }
    }
}
</script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,opsz,wght@0,6..72,400;0,6..72,700;1,6..72,400;1,6..72,700&family=Manrope:wght@200..800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    
    <!-- Vite Directives -->
    @if(false)
    @vite([
        'resources/js/tailwind-config.js',
        'resources/css/app.css',
        isset($css_file) ? "resources/css/{$css_file}.css" : ''
    ])
    @endif

    @yield('styles')
</head>
<body class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-slate-100 transition-colors duration-300">
    <div class="relative flex min-h-screen w-full flex-col overflow-x-hidden">
        <div class="layout-container flex h-full grow flex-col">
            <!-- Navigation Header -->
            <header class="flex items-center justify-between border-b border-primary/10 bg-white/80 dark:bg-background-dark/80 backdrop-blur-md sticky top-0 z-50 px-6 md:px-20 py-4">
                <div class="flex items-center gap-10">
                    <a href="/" class="flex items-center gap-2 text-primary hover:text-primary/80 transition-colors">
                        <span class="material-symbols-outlined text-3xl font-bold">landscape</span>
                        <h2 class="text-xl font-bold leading-tight tracking-tight">AppTerreno</h2>
                    </a>
                    <nav class="hidden md:flex items-center gap-8">
                        <a class="text-sm font-semibold hover:text-primary transition-colors" href="#">Comprar Terreno</a>
                        <a class="text-sm font-semibold hover:text-primary transition-colors" href="#">Vender Propiedad</a>
                        <a class="text-sm font-semibold hover:text-primary transition-colors" href="#">Inversiones Conjuntas</a>
                        <a class="text-sm font-semibold hover:text-primary transition-colors" href="#">Recursos</a>
                    </nav>
                </div>
                <div class="flex items-center gap-4">
                    <button class="hidden lg:flex items-center gap-2 px-4 py-2 text-sm font-bold text-primary hover:bg-primary/5 rounded-lg transition-colors">
                        <span class="material-symbols-outlined text-[20px]">language</span>
                        ES
                    </button>
                    <!-- Login Button -->
                    @if(request()->is('login') || request()->is('registro'))
                        <div class="hidden"></div>
                    @else
                        <a href="/login" class="flex items-center justify-center rounded-full bg-primary p-2 text-white hover:bg-primary/90 transition-all">
                            <span class="material-symbols-outlined">person</span>
                        </a>
                    @endif
=======

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />

    <!-- Vite Directives -->
    @vite([
    'resources/css/app.css',
    'resources/js/app.js'
    ])
</head>

<body
    class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-slate-100 transition-colors duration-300">
    <div class="relative flex min-h-screen w-full flex-col overflow-x-hidden">
        <div class="layout-container flex h-full grow flex-col">
            <!-- Navigation Header -->
            <header class="bg-white sticky top-0 z-50 px-6 md:px-20 py-4 shadow-sm">
                <div class="flex items-center justify-between max-w-7xl mx-auto">
                    <!-- Logo -->
                    <a href="/" class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full border-2 border-green-600 flex items-center justify-center">
                            <span class="material-symbols-outlined text-green-600 text-lg">nature_people</span>
                        </div>
                        <h2 class="text-xl font-black text-green-700 tracking-wide uppercase">MAZ TERRENOS</h2>
                    </a>
                    <!-- Nav Links -->
                    <nav class="hidden md:flex items-center gap-8 text-sm font-bold text-gray-700">
                        <a class="hover:text-green-600 transition-colors" href="#">Home</a>
                        <a class="hover:text-green-600 transition-colors" href="#">Terrenos</a>
                        <a class="hover:text-green-600 transition-colors" href="#">Vendedores</a>
                        <a class="hover:text-green-600 transition-colors" href="#">Contacto</a>
                    </nav>
                    <!-- Auth Section (condicional: logueado / invitado) -->
                    <x-auth-nav />
>>>>>>> database
                </div>
            </header>

            <!-- Main Content Area -->
            @yield('content')

<<<<<<< HEAD
            <!-- Footer (Hidden on specific auth pages if preferred, but keeping it globally for now) -->
            @yield('footer')
            <footer class="bg-white dark:bg-slate-900 border-t border-primary/5 pt-16 pb-8 px-6 md:px-20 mt-auto">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-8 mb-12 max-w-7xl mx-auto">
                    <div class="col-span-2 lg:col-span-1">
                        <h2 class="text-xl font-bold leading-tight tracking-tight text-primary mb-4">AppTerreno</h2>
                        <p class="text-sm text-slate-500 dark:text-slate-400 mb-6">
                            Construyendo el futuro de la inversión en terrenos a través de la transparencia y la inteligencia geoespacial.
                        </p>
                    </div>

                    <div class="flex flex-col gap-4">
                        <h4 class="font-bold text-slate-900 dark:text-white">Explorar</h4>
                        <a class="text-sm text-slate-500 hover:text-primary transition-colors" href="#">Todos los Terrenos</a>
                        <a class="text-sm text-slate-500 hover:text-primary transition-colors" href="#">Terrenos Comerciales</a>
                        <a class="text-sm text-slate-500 hover:text-primary transition-colors" href="#">Terrenos Agrícolas</a>
                        <a class="text-sm text-slate-500 hover:text-primary transition-colors" href="#">Lotes Residenciales</a>
                    </div>

                    <div class="flex flex-col gap-4">
                        <h4 class="font-bold text-slate-900 dark:text-white">Compañía</h4>
                        <a class="text-sm text-slate-500 hover:text-primary transition-colors" href="#">Sobre Nosotros</a>
                        <a class="text-sm text-slate-500 hover:text-primary transition-colors" href="#">Carreras</a>
                        <a class="text-sm text-slate-500 hover:text-primary transition-colors" href="#">Prensa</a>
                        <a class="text-sm text-slate-500 hover:text-primary transition-colors" href="#">Contacto</a>
                    </div>

                    <div class="flex flex-col gap-4">
                        <h4 class="font-bold text-slate-900 dark:text-white">Recursos</h4>
                        <a class="text-sm text-slate-500 hover:text-primary transition-colors" href="#">Blog</a>
                        <a class="text-sm text-slate-500 hover:text-primary transition-colors" href="#">Guía para Compradores</a>
                        <a class="text-sm text-slate-500 hover:text-primary transition-colors" href="#">Guía para Vendedores</a>
                        <a class="text-sm text-slate-500 hover:text-primary transition-colors" href="#">Tendencias del Mercado</a>
                    </div>

                    <div class="col-span-2 md:col-span-4 lg:col-span-1 flex flex-col gap-4">
                        <h4 class="font-bold text-slate-900 dark:text-white">Suscríbete</h4>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Recibe las últimas noticias y ofertas de propiedades.</p>
                        <div class="flex gap-2">
                            <input class="w-full bg-background-light dark:bg-slate-800 border-primary/10 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-slate-900 dark:text-white placeholder:text-slate-400 px-4 py-2 text-sm" placeholder="Tu correo electrónico" type="email" />
                            <button class="bg-primary hover:bg-primary/90 text-white rounded-lg px-4 transition-colors">
                                <span class="material-symbols-outlined text-[20px]">send</span>
                            </button>
=======
            <!-- Footer -->
            <footer class="bg-white border-t border-gray-100 pt-16 pb-8 px-6 md:px-20 mt-auto">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12 max-w-7xl mx-auto">
                    <div class="col-span-1 md:col-span-1">
                        <a href="/" class="flex items-center gap-2 mb-4">
                            <div
                                class="w-8 h-8 rounded-full border-2 border-green-600 flex items-center justify-center">
                                <span class="material-symbols-outlined text-green-600 text-lg">nature_people</span>
                            </div>
                            <h2 class="text-lg font-black text-green-700 tracking-wide uppercase">MAZ TERRENOS</h2>
                        </a>
                        <p class="text-xs text-gray-500 font-medium leading-relaxed max-w-[200px]">
                            Liderando la transición hacia un mercado inmobiliario sostenible y en armonía con el entorno
                            natural.
                        </p>
                    </div>

                    <div class="flex flex-col gap-3">
                        <h4 class="font-bold text-gray-900 text-sm">Empresa</h4>
                        <a class="text-xs font-semibold text-gray-500 hover:text-green-600" href="#">Sobre Nosotras</a>
                        <a class="text-xs font-semibold text-gray-500 hover:text-green-600" href="#">Sostenibilidad</a>
                        <a class="text-xs font-semibold text-gray-500 hover:text-green-600" href="#">Blog</a>
                        <a class="text-xs font-semibold text-gray-500 hover:text-green-600" href="#">Carreras</a>
                    </div>

                    <div class="flex flex-col gap-3">
                        <h4 class="font-bold text-gray-900 text-sm">Recursos</h4>
                        <a class="text-xs font-semibold text-gray-500 hover:text-green-600" href="#">Preguntas
                            Frecuentes</a>
                        <a class="text-xs font-semibold text-gray-500 hover:text-green-600" href="#">Guía del
                            Comprador</a>
                        <a class="text-xs font-semibold text-gray-500 hover:text-green-600" href="#">Mapa del Sitio</a>
                        <a class="text-xs font-semibold text-gray-500 hover:text-green-600" href="#">Soporte</a>
                    </div>

                    <div class="flex flex-col gap-3">
                        <h4 class="font-bold text-gray-900 text-sm">Síguenos</h4>
                        <div class="flex gap-3">
                            <a href="#"
                                class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-green-600 hover:text-white transition-colors">
                                <span class="material-symbols-outlined text-sm">public</span>
                            </a>
                            <a href="#"
                                class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-green-600 hover:text-white transition-colors">
                                <span class="material-symbols-outlined text-sm">share</span>
                            </a>
                            <a href="#"
                                class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-green-600 hover:text-white transition-colors">
                                <span class="material-symbols-outlined text-sm">mail</span>
                            </a>
>>>>>>> database
                        </div>
                    </div>
                </div>

<<<<<<< HEAD
                <div class="max-w-7xl mx-auto pt-8 border-t border-primary/5 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-slate-400">
                    <p>© 2024 AppTerreno Plataforma Inmobiliaria. Todos los derechos reservados.</p>
                    <div class="flex gap-6">
                        <a class="hover:text-primary transition-colors" href="#">Términos de Servicio</a>
                        <a class="hover:text-primary transition-colors" href="#">Política de Privacidad</a>
                        <a class="hover:text-primary transition-colors" href="#">Cookies</a>
=======
                <div
                    class="max-w-7xl mx-auto pt-8 border-t border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4 text-[10px] text-gray-400 font-semibold">
                    <p>© 2024 GreenEstate. Todos los derechos reservados.</p>
                    <div class="flex gap-6 text-gray-400">
                        <a class="hover:text-green-600" href="#">Política de Privacidad</a>
                        <a class="hover:text-green-600" href="#">Términos de Servicio</a>
>>>>>>> database
                    </div>
                </div>
            </footer>
        </div>
    </div>

    @stack('scripts')
</body>
<<<<<<< HEAD
</html>
=======

</html>
>>>>>>> database
