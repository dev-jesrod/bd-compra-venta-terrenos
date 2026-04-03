<!DOCTYPE html>

<html lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,400;0,700;1,400&amp;family=Work+Sans:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "error-container": "#ffdad6",
                        "background": "#F8F8FF",
                        "secondary": "#475569",
                        "primary-fixed-dim": "#78d6d5",
                        "surface-variant": "#e2e8f0",
                        "inverse-primary": "#78d6d5",
                        "on-primary-fixed": "#002020",
                        "surface-container-lowest": "#ffffff",
                        "on-secondary-fixed-variant": "#2b4c4c",
                        "tertiary-fixed": "#ffdbca",
                        "primary": "#228B22",
                        "on-tertiary-fixed": "#341100",
                        "primary-container": "#228B22",
                        "surface-container": "#ebefee",
                        "tertiary": "#8c4a24",
                        "surface-tint": "#228B22",
                        "surface-bright": "#ffffff",
                        "outline-variant": "#e2e8f0",
                        "surface-container-highest": "#dfe3e2",
                        "on-secondary": "#ffffff",
                        "on-primary": "#ffffff",
                        "outline": "#cbd5e1",
                        "on-tertiary": "#ffffff",
                        "secondary-fixed-dim": "#aacdcc",
                        "error": "#ba1a1a",
                        "on-tertiary-fixed-variant": "#723611",
                        "inverse-on-surface": "#f1f5f9",
                        "on-tertiary-container": "#fffbff",
                        "on-surface-variant": "#475569",
                        "surface-container-high": "#e5e9e8",
                        "on-secondary-container": "#1e293b",
                        "surface-container-low": "#F8F8FF",
                        "on-secondary-fixed": "#002020",
                        "on-error": "#ffffff",
                        "secondary-container": "#f1f5f9",
                        "secondary-fixed": "#c6e9e8",
                        "on-surface": "#0f172a",
                        "surface-dim": "#d7dbda",
                        "tertiary-fixed-dim": "#ffb690",
                        "surface": "#F8F8FF",
                        "on-background": "#0f172a",
                        "inverse-surface": "#1e293b",
                        "primary-fixed": "#94f2f2",
                        "on-primary-fixed-variant": "#004f50",
                        "tertiary-container": "#aa623a",
                        "on-primary-container": "#ffffff",
                        "on-error-container": "#93000a"
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
        body { font-family: 'Work Sans', sans-serif; }
        h1, h2, h3, .font-serif { font-family: 'Newsreader', serif; }
    </style>
</head>
<body class="bg-background text-on-surface">
<!-- TopAppBar -->
<header class="bg-[#F8F8FF] dark:bg-slate-900/90 backdrop-blur-md docked full-width top-0 z-50 tonal shift via surface-container-low">
<div class="flex justify-between items-center px-8 py-4 w-full max-w-screen-2xl mx-auto">
<!-- Navigation Links (Left) -->
<nav class="hidden md:flex items-center space-x-8">
    
<a class="text-green-700 dark:text-green-400 font-bold border-b-2 border-green-700 pb-1" href="#">Propiedades</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-green-700 transition-colors" href="#">Proyectos</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-green-700 transition-colors" href="#">Sustentabilidad</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-green-700 transition-colors" href="#">Nosotros</a>
</nav>
<!-- Brand Identity (Center) -->
<div class="flex flex-col items-center text-center">
<div class="flex items-center space-x-3 mb-1">
<img alt="Maz Terrenos Logo" class="w-10 h-10 rounded-full object-cover border border-outline-variant" data-alt="Circular minimal logo for a luxury real estate brand featuring stylized natural landscape elements in green and white" src="https://lh3.googleusercontent.com/aida/ADBb0ui4aBFgO6IWcjSfGeYoIl2Xcv7a9qJKXnfY28ZGuOsK66vHODRMTixBFnRoeX32f_GwroThxwcSi_nM_Ud8mD41-9ojXY6f8FIgmXVlFWL1En9JZxcgvcw7Qdi_nwq8BzuItYdSQawtkgWfxiQXVjHKAGaIZJk-tvdaMetyhE8eUsilFG2if83hfwQbcDfZLy1Io_HtcPWFRfBS4JjGdOGedZZPppIlck4VR3gHmRrLR85VDfYGlrKrHEB29r-SMsOzD3v3pxtn-A"/>
<span class="text-2xl font-bold tracking-tight text-slate-900 dark:text-slate-50">Maz Terrenos</span>
</div>
<span class="text-[10px] uppercase tracking-[0.2em] text-slate-500 italic font-medium">Inversión consciente, legado natural</span>
</div>
<!-- Actions (Right) -->
<div class="flex items-center space-x-4">
<button class="text-slate-600 hover:text-green-700 font-medium px-4 py-2 hover:scale-102 transition-transform duration-200">Iniciar Sesión</button>
<button class="bg-primary text-on-primary px-6 py-2.5 rounded-xl font-semibold hover:scale-102 active:scale-95 transition-all duration-200 shadow-sm">Contactar</button>
</div>
</div>
</header>
<main>
<!-- Hero Section (Split Layout) -->
<section class="relative min-h-[870px] flex flex-col md:flex-row overflow-hidden">
<div class="w-full md:w-1/2 relative min-h-[512px] md:min-h-0">
<img alt="Luxury Forest Cabin" class="absolute inset-0 w-full h-full object-cover" data-alt="Modern architectural cabin with large glass windows nestled in a misty pine forest during early morning light, editorial style" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCVjd9XoXwlxqcAvT6CopoGXcoUlilf5T4Fw9y1zS97D5ZscDIH3RkFBS1XUcBCqKVDW7oB2V1Wvsn7Eo8kHx6-9vuREFU-9TbnXzunrhTS_-8tfdbsXkBDo8MoEJCRq8e8Uwi6Rf-GxluNFK03vq27OBU2iRMIEj2h8LYBuV1syc_NIG45FvTOk8G6kgnd6AoyqsJSuOn9C5BcRT1yYh9nXYwH0IO6GJ222l7UNn3mTepJz1MvgQte50Re4hwPPeeqiAj2ZR2lqZaQ"/>
<div class="absolute inset-0 bg-primary/10 backdrop-blur-[1px]"></div>
</div>
<div class="w-full md:w-1/2 flex items-center justify-center p-8 md:p-24 bg-surface-container-low">
<div class="max-w-xl">
<h1 class="text-5xl md:text-7xl font-bold leading-[1.1] mb-8 uppercase tracking-tighter text-primary">
                        INVIERTE HOY EN EL ESPACIO DE TUS SUEÑOS
                    </h1>
<p class="text-lg text-secondary mb-10 leading-relaxed font-body">
                        Descubre terrenos exclusivos diseñados para armonizar con la naturaleza. Creamos plusvalía a través de la conservación y el diseño consciente. Tu legado comienza en la tierra que respira.
                    </p>
<button class="bg-primary text-on-primary text-lg px-10 py-5 rounded-xl font-bold hover:scale-102 transition-transform shadow-lg inline-flex items-center group">
                        Ver Terrenos
                        <span class="material-symbols-outlined ml-2 group-hover:translate-x-1 transition-transform" data-icon="arrow_forward">arrow_forward</span>
</button>
</div>
</div>
</section>
<!-- Featured Properties -->
<section class="py-24 px-8 max-w-screen-2xl mx-auto">
<div class="flex justify-between items-end mb-16">
<div>
<h2 class="text-4xl font-bold text-on-surface mb-2">Propiedades Destacadas</h2>
<p class="text-secondary">Oportunidades únicas seleccionadas por su entorno natural y potencial de crecimiento.</p>
</div>
<button class="text-primary font-bold flex items-center hover:underline">
                    Ver catálogo completo <span class="material-symbols-outlined ml-1" data-icon="trending_flat">trending_flat</span>
</button>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<!-- Property Card 1 -->
<div class="group bg-surface-container-lowest rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
<div class="aspect-[4/3] overflow-hidden">
<img alt="Bosque Sereno" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" data-alt="Lush green meadow surrounded by dense evergreen forest at sunset, soft golden lighting on the grass" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAhMcNdP3U6BTQcJyB4tY95vqWX4KgRfpxfpdTkEJ6CHeLhxc_LDx1dF7Z2DKCmLsf9p3nHXF_nWdPh9lF3V-g8ipL1eMj2Kbm4n48-G6kJ9blnhdI3huKv1wp3IMSk9ZxMoBG8owRGxClsY29XiLI1XZSo-7VhgxdMYC2tnosmwE4oGChpkqliYFSIlh7yijcbfO0C89b7uQL0t_HBKoqVhrQ7liDv_id-0VS0BVrj-ksc8J8LHcOPb4bGMxdG9l9_ycUKYGmEdral"/>
</div>
<div class="p-8">
<div class="flex items-center text-primary text-xs font-bold uppercase tracking-widest mb-3">
<span class="material-symbols-outlined text-sm mr-1" data-icon="location_on">location_on</span> Valle de Bravo
                        </div>
<h3 class="text-2xl font-bold mb-2">Bosque Sereno</h3>
<p class="text-on-surface/60 text-sm mb-6 line-clamp-2 font-body">1,200 m² de bosque virgen con acceso controlado y servicios subterráneos.</p>
<div class="flex justify-between items-center pt-6 border-t border-outline-variant">
<span class="text-xl font-bold text-primary">$2,450,000 MXN</span>
<button class="bg-surface-container text-on-surface px-4 py-2 rounded-lg text-sm font-semibold hover:bg-primary hover:text-white transition-colors">Ver Detalles</button>
</div>
</div>
</div>
<!-- Property Card 2 -->
<div class="group bg-surface-container-lowest rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
<div class="aspect-[4/3] overflow-hidden">
<img alt="Pradera Verde" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" data-alt="Wide open green fields under a bright blue sky with scattered white clouds, hills in the distance" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDQRPTVOQUE6OMLQD1pOydMzlATRIMxi_9GOhtdRu42G8vMUz0iV-Ndg7DUDvCvaCZVsNp1IlH0RRV8RBV3f4Qt2Z6RY3Bg0-vmLMvQ1iByWc0XYJuAstpbUvOIF_2-qwIh4DDQJTAeQ3nlPGL0oueSgencc7fgWWfyuK3EMS8tsLRwowJqsdCGD-XNHe6W4Q6cnL-HgEAEGGtW40Ok2X9oewWS31JKL82N0z3g1ypKPCdwH8_-VEmI3866mpQcBewAXMAgfyufeLAq"/>
</div>
<div class="p-8">
<div class="flex items-center text-primary text-xs font-bold uppercase tracking-widest mb-3">
<span class="material-symbols-outlined text-sm mr-1" data-icon="location_on">location_on</span> Querétaro
                        </div>
<h3 class="text-2xl font-bold mb-2">Pradera Verde</h3>
<p class="text-on-surface/60 text-sm mb-6 line-clamp-2 font-body">Lotes campestres desde 800 m² con vistas panorámicas a la cordillera.</p>
<div class="flex justify-between items-center pt-6 border-t border-outline-variant">
<span class="text-xl font-bold text-primary">$1,890,000 MXN</span>
<button class="bg-surface-container text-on-surface px-4 py-2 rounded-lg text-sm font-semibold hover:bg-primary hover:text-white transition-colors">Ver Detalles</button>
</div>
</div>
</div>
<!-- Property Card 3 -->
<div class="group bg-surface-container-lowest rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
<div class="aspect-[4/3] overflow-hidden">
<img alt="Refugio del Valle" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" data-alt="Deep mountain valley with a small stream and diverse vegetation, cinematic lighting with shadows and highlights" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAZOElXj1LjK7airhOzMMUYd_7DSklB4vhZGXa0NwOaDBM_efDODybWb6qK9ZOdekFxpNTW31fye5Jp4V1fp6M-lBbV6zJbEGfByO41wREPjMf-kxrM-aRZH86aEmfhvIGeKu69_vUo6FPI_TCVF5uXHxiYzlQpHlFk7MMMM08-i-9i40ivhG_0-PTzOi5DKLByw03IqMd5bMGfcZ15hxfXK26N1T6H0t5Y1EDSJO6QrXKyPOMmMl3pqHHvNsUtjqUlWYVbPP_tAf7d"/>
</div>
<div class="p-8">
<div class="flex items-center text-primary text-xs font-bold uppercase tracking-widest mb-3">
<span class="material-symbols-outlined text-sm mr-1" data-icon="location_on">location_on</span> Tapalpa
                        </div>
<h3 class="text-2xl font-bold mb-2">Refugio del Valle</h3>
<p class="text-on-surface/60 text-sm mb-6 line-clamp-2 font-body">Exclusiva zona de reserva con solo 5 macro-lotes disponibles para proyectos eco-sustentables.</p>
<div class="flex justify-between items-center pt-6 border-t border-outline-variant">
<span class="text-xl font-bold text-primary">$3,120,000 MXN</span>
<button class="bg-surface-container text-on-surface px-4 py-2 rounded-lg text-sm font-semibold hover:bg-primary hover:text-white transition-colors">Ver Detalles</button>
</div>
</div>
</div>
</div>
</section>
<!-- Call to Action Banner -->
<section class="px-8 mt-12">
<div class="bg-primary rounded-3xl p-12 md:p-20 text-center text-on-primary max-w-screen-2xl mx-auto relative overflow-hidden">
<div class="relative z-10">
<h2 class="text-4xl md:text-6xl font-bold mb-6">¿Listo para tu nueva vida?</h2>
<p class="text-lg md:text-xl text-green-100 max-w-2xl mx-auto mb-10 font-body">
                        Agenda una visita guiada con nuestros expertos y conoce el terreno que transformará tu futuro.
                    </p>
<button class="bg-white text-primary px-12 py-5 rounded-xl font-bold text-lg hover:scale-105 active:scale-95 transition-all shadow-xl">
                        Contactar a un asesor
                    </button>
</div>
<!-- Decorative element -->
<div class="absolute -right-20 -bottom-20 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
<div class="absolute -left-20 -top-20 w-96 h-96 bg-black/10 rounded-full blur-3xl"></div>
</div>
</section>
</main>
<!-- Footer -->
<footer class="bg-green-800 dark:bg-green-950 block w-full rounded-t-[2rem] mt-20 shadow-inner">
<div class="flex flex-col md:flex-row justify-between items-start px-12 py-16 w-full max-w-screen-2xl mx-auto">
<!-- Brand Section -->
<div class="mb-12 md:mb-0 max-w-sm">
<div class="text-xl font-serif text-white mb-4">Maz Terrenos</div>
<p class="text-green-100/80 text-sm leading-relaxed font-sans tracking-wide">
                    Líderes en el desarrollo de espacios conscientes que integran la vida moderna con la preservación del ecosistema. Inversión con propósito.
                </p>
<div class="flex space-x-4 mt-8">
<a class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-white hover:text-green-800 transition-all" href="#">
<span class="material-symbols-outlined" data-icon="public">public</span>
</a>
<a class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-white hover:text-green-800 transition-all" href="#">
<span class="material-symbols-outlined" data-icon="share">share</span>
</a>
<a class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-white hover:text-green-800 transition-all" href="#">
<span class="material-symbols-outlined" data-icon="mail">mail</span>
</a>
</div>
</div>
<!-- Links Grid -->
<div class="grid grid-cols-2 md:grid-cols-3 gap-12 text-sm">
<div>
<h4 class="text-white font-bold mb-6 uppercase tracking-widest text-xs">Compañía</h4>
<ul class="space-y-4">
<li><a class="text-green-100/80 hover:text-white hover:translate-x-1 transition-transform inline-block" href="#">Sustentabilidad</a></li>
<li><a class="text-green-100/80 hover:text-white hover:translate-x-1 transition-transform inline-block" href="#">Alianzas</a></li>
<li><a class="text-green-100/80 hover:text-white hover:translate-x-1 transition-transform inline-block" href="#">Nosotros</a></li>
</ul>
</div>
<div>
<h4 class="text-white font-bold mb-6 uppercase tracking-widest text-xs">Soporte</h4>
<ul class="space-y-4">
<li><a class="text-green-100/80 hover:text-white hover:translate-x-1 transition-transform inline-block" href="#">Preguntas Frecuentes</a></li>
<li><a class="text-green-100/80 hover:text-white hover:translate-x-1 transition-transform inline-block" href="#">Privacidad</a></li>
<li><a class="text-green-100/80 hover:text-white hover:translate-x-1 transition-transform inline-block" href="#">Términos</a></li>
</ul>
</div>
<div class="col-span-2 md:col-span-1">
<h4 class="text-white font-bold mb-6 uppercase tracking-widest text-xs">Ubicaciones</h4>
<ul class="space-y-4 text-green-100/80">
<li class="flex items-start">
<span class="material-symbols-outlined text-sm mr-2 mt-0.5" data-icon="location_on">location_on</span>
                            Av. Las Palmas 405, Lomas, CDMX
                        </li>
<li class="flex items-start">
<span class="material-symbols-outlined text-sm mr-2 mt-0.5" data-icon="phone">phone</span>
                            +52 55 1234 5678
                        </li>
</ul>
</div>
</div>
</div>
<!-- Bottom Copyright -->
<div class="border-t border-white/10 px-12 py-8 w-full max-w-screen-2xl mx-auto flex flex-col md:flex-row justify-between items-center text-green-100/60 text-[12px]">
<p>© 2024 Maz Terrenos. Inversión consciente, legado natural.</p>
<div class="flex space-x-6 mt-4 md:mt-0">
<a class="hover:text-white" href="#">Cookies</a>
<a class="hover:text-white" href="#">Accesibilidad</a>
</div>
</div>
</footer>