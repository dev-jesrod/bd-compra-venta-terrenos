<!DOCTYPE html>
<html class="light" lang="es">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>@yield('title', 'AppTerreno')</title>

    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />

    @vite([
        'resources/js/tailwind-config.js',
        'resources/css/app.css',
        isset($css_file) ? "resources/css/{$css_file}.css" : ''
    ])
    @yield('styles')
</head>

<body class="bg-background-light font-display text-slate-900 transition-colors duration-300">
    @yield('content')

    @stack('scripts')
</body>

</html>
