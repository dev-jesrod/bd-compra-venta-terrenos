<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'Dashboard Vendedor | AppTerreno')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    @vite([
        'resources/js/tailwind-config.js',
        'resources/css/app.css',
    ])

    <style>
        body { font-family: 'Inter', sans-serif; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="bg-slate-50 dark:bg-slate-950 text-on-background min-h-screen">
    <!-- Backdrop for mobile sidebar -->
    <div id="sidebar-backdrop" class="fixed inset-0 bg-black/50 z-40 hidden md:hidden transition-opacity"></div>

    <!-- SideNavBar Component -->
    <x-vendedor.sidebar />

    <!-- Main Content Canvas -->
    <main class="md:pl-64 transition-all duration-300">
        <!-- TopNavBar Component -->
        <x-vendedor.navbar />

        <div class="mt-16 p-4 md:p-8">
            @yield('content')
        </div>
    </main>

    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html>