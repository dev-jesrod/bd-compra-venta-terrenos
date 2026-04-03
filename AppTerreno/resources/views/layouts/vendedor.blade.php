<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'Dashboard Vendedor | AppTerreno')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script id="tailwind-config">
          tailwind.config = {
            darkMode: "class",
            theme: {
              extend: {
                "colors": {
                        "surface-dim": "#d6dccf",
                        "surface": "#f5fbee",
                        "surface-variant": "#dee5d7",
                        "outline-variant": "#becab7",
                        "on-tertiary-fixed": "#3e0020",
                        "on-primary": "#ffffff",
                        "inverse-surface": "#2c3229",
                        "secondary-fixed": "#c1efb4",
                        "secondary-container": "#c1efb4",
                        "primary-container": "#1c871e",
                        "secondary": "#406839",
                        "inverse-on-surface": "#edf3e5",
                        "on-secondary": "#ffffff",
                        "inverse-primary": "#77dd6a",
                        "on-primary-fixed-variant": "#005307",
                        "tertiary-fixed": "#ffd9e4",
                        "on-surface-variant": "#3f4a3b",
                        "on-background": "#171d15",
                        "on-secondary-fixed-variant": "#294f24",
                        "surface-tint": "#006e0c",
                        "surface-container-lowest": "#ffffff",
                        "surface-container": "#eaf0e3",
                        "primary-fixed-dim": "#77dd6a",
                        "surface-container-low": "#f0f6e8",
                        "error": "#ba1a1a",
                        "on-primary-container": "#f8fff0",
                        "outline": "#6f7a6a",
                        "error-container": "#ffdad6",
                        "on-tertiary": "#ffffff",
                        "primary-fixed": "#92fa83",
                        "on-tertiary-container": "#fffbff",
                        "on-tertiary-fixed-variant": "#890f50",
                        "background": "#f5fbee",
                        "surface-bright": "#f5fbee",
                        "surface-container-high": "#e4eadd",
                        "tertiary": "#a52a66",
                        "on-error-container": "#93000a",
                        "on-surface": "#171d15",
                        "on-secondary-fixed": "#002201",
                        "on-error": "#ffffff",
                        "surface-container-highest": "#dee5d7",
                        "tertiary-fixed-dim": "#ffb0cc",
                        "primary": "#006c0c",
                        "on-secondary-container": "#466e3f",
                        "on-primary-fixed": "#002201",
                        "secondary-fixed-dim": "#a6d29a",
                        "tertiary-container": "#c5447f"
                },
                "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                },
                "fontFamily": {
                        "headline": ["Inter"],
                        "body": ["Inter"],
                        "label": ["Inter"]
                }
              },
            },
          }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="bg-slate-50 dark:bg-slate-950 text-on-background min-h-screen">
    <!-- SideNavBar Shell -->
    <!-- TODO: Controlador necesario para verificar los menús activos según la ruta y cargar la información básica del Vendedor -->
    <aside class="fixed left-0 top-0 h-full flex flex-col bg-slate-50 dark:bg-slate-950 border-r border-gray-200 dark:border-gray-800 w-64 z-50">
        <div class="p-6 flex items-center gap-3">
            <div class="w-10 h-10 bg-primary-container rounded-lg flex items-center justify-center text-white font-black text-xl">M</div>
            <div>
                <h1 class="text-xl font-black text-green-700 dark:text-green-400 leading-none">MAZ TERRENOS</h1>
                <p class="text-xs text-gray-500 font-medium">Vendor Management</p>
            </div>
        </div>
        <nav class="flex-1 px-4 mt-4 space-y-1">
            <a class="flex items-center gap-3 px-4 py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors font-medium text-sm rounded-lg" href="#">
                <span class="material-symbols-outlined">dashboard</span>
                Dashboard
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-green-700 dark:text-green-400 bg-green-50 dark:bg-green-900/20 border-r-4 border-green-700 dark:border-green-400 font-medium text-sm" href="#">
                <span class="material-symbols-outlined">landscape</span>
                Properties
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors font-medium text-sm rounded-lg" href="#">
                <span class="material-symbols-outlined">group</span>Vendedores
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors font-medium text-sm rounded-lg" href="#">
                <span class="material-symbols-outlined">leaderboard</span>
                Leads
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors font-medium text-sm rounded-lg" href="#">
                <span class="material-symbols-outlined">verified_user</span>Mis documentos
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors font-medium text-sm rounded-lg" href="#">
                <span class="material-symbols-outlined">settings</span>Configuracion de cuenta
            </a>
        </nav>
        <div class="p-4 border-t border-gray-200 dark:border-gray-800">
            <!-- TODO: Controlador/Ruta necesario para la vista de soporte técnico -->
            <button class="w-full flex items-center justify-center gap-2 bg-primary-container text-on-primary-container py-3 rounded-lg font-bold text-sm transition-transform active:scale-95">
                <span class="material-symbols-outlined">support_agent</span>
                Soporte Técnico
            </button>
        </div>
    </aside>

    <!-- Main Content Canvas -->
    <main class="pl-64">
        <!-- TopNavBar Shell -->
        <header class="fixed top-0 right-0 left-64 z-40 flex justify-between items-center px-8 h-16 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md border-b border-gray-200 dark:border-gray-800 shadow-sm">
            <div class="flex items-center w-full max-w-xl">
                <div class="relative w-full">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">search</span>
                    <!-- TODO: Controlador necesario para manejar la búsqueda de propiedades/ID -->
                    <form action="#" method="GET">
                        <input name="query" class="w-full pl-10 pr-4 py-2 bg-slate-100 dark:bg-slate-800 border-none rounded-lg text-sm focus:ring-2 focus:ring-primary" placeholder="Buscar por propiedad o ID..." type="text">
                    </form>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <!-- TODO: Controlador necesario para cargar las notificaciones no leídas del vendedor -->
                <button class="relative text-gray-500 hover:text-green-700 transition-colors">
                    <span class="material-symbols-outlined">notifications</span>
                    <span class="absolute top-0 right-0 w-2 h-2 bg-error rounded-full border-2 border-white"></span>
                </button>
                <button class="text-gray-500 hover:text-green-700 transition-colors">
                    <span class="material-symbols-outlined">help</span>
                </button>
                <div class="flex items-center gap-3 pl-6 border-l border-gray-200 dark:border-gray-800">
                    <!-- TODO: Controlador necesario para pasar los datos Auth()->user() a la vista layout -->
                    <div class="text-right">
                        <p class="text-sm font-bold text-gray-900 dark:text-gray-100">Ricardo Mendoza</p>
                        <p class="text-xs text-gray-500">Master Vendor</p>
                    </div>
                    <img alt="Vendor Manager Profile" class="w-10 h-10 rounded-full border border-gray-200" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDenS20kaZBgOS64xvFoHjrbAJy5a-TXSJer_U6Xj93op5sde4GMteyZPLOg1lMlf8MiD14XwN2lAT8Nd5WrIvtenFtpsJYc29qpnTD7Pdf33jbNzTXpveGoG10IVwlZaZI1Sgsd-ZABlQgOQL5vqKa4FyhvgsdzwMDIZQMU5aVOMqyLBUndcoDV94fGHceEIpiBLJk9pI8yy3i-5bNBCXmxi_c1Et9-r2PFHkVugEB4AX1_uOQ-0lHSNpfhTFJX8atS9FEimEKIeI">
                </div>
            </div>
        </header>

        <div class="mt-16 p-8">
            @yield('content')
        </div>
    </main>
</body>
</html>
