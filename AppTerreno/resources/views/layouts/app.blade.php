<!DOCTYPE html>
<html class="light" lang="es">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>@yield('title', 'AppTerreno')</title>
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script>
tailwind.config = {
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                primary: "#228B22",
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
            },
            fontFamily: {
                serif: ["Georgia", "serif"],
                display: ["Inter", "sans-serif"],
                sans: ["Inter", "sans-serif"],
            }
        }
    }
}
</script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
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
                </div>
            </header>

            <!-- Main Content Area -->
            @yield('content')

            <!-- Footer (Hidden on specific auth pages if preferred, but keeping it globally for now) -->
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
                        </div>
                    </div>
                </div>

                <div class="max-w-7xl mx-auto pt-8 border-t border-primary/5 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-slate-400">
                    <p>© 2024 AppTerreno Plataforma Inmobiliaria. Todos los derechos reservados.</p>
                    <div class="flex gap-6">
                        <a class="hover:text-primary transition-colors" href="#">Términos de Servicio</a>
                        <a class="hover:text-primary transition-colors" href="#">Política de Privacidad</a>
                        <a class="hover:text-primary transition-colors" href="#">Cookies</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>
