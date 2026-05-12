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
    <!-- SideNavBar Component -->
    <x-vendedor.sidebar />

    <!-- Main Content Canvas -->
    <main class="pl-64">
        <!-- TopNavBar Component -->
        <x-vendedor.navbar />

        <div class="mt-16 p-8">
            @yield('content')
        </div>
    </main>
</body>
</html>
