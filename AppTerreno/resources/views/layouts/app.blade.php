<!DOCTYPE html>
<html class="light" lang="es">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>@yield('title', 'AppTerreno')</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />

    <!-- Vite Directives -->
    @vite([
        'resources/js/tailwind-config.js',
        'resources/css/app.css',
        isset($css_file) ? "resources/css/{$css_file}.css" : ''

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
                </div>
            </header>

            <!-- Main Content Area -->
            @yield('content')

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
                        </div>
                    </div>
                </div>

                <div
                    class="max-w-7xl mx-auto pt-8 border-t border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4 text-[10px] text-gray-400 font-semibold">
                    <p>© 2024 GreenEstate. Todos los derechos reservados.</p>
                    <div class="flex gap-6 text-gray-400">
                        <a class="hover:text-green-600" href="#">Política de Privacidad</a>
                        <a class="hover:text-green-600" href="#">Términos de Servicio</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>