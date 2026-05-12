<!DOCTYPE html>
<html lang="{{ config('app.locale', 'es') }}">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta name="description" content="{{ $seo_description ?? 'Terrenos exclusivos en armonía con la naturaleza. Inversión consciente con legado natural.' }}">
    <meta name="keywords" content="{{ $seo_keywords ?? 'terrenos, inversión, sustentabilidad, Valle de Bravo, Querétaro, Tapalpa' }}">
    <title>{{ $page_title ?? 'Maz Terrenos - Inversión Consciente, Legado Natural' }}</title>
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,400;0,700;1,400&family=Work+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
    
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
                        "primary": "{{ $primary_color ?? '#228B22' }}",
                        "on-tertiary-fixed": "#341100",
                        "primary-container": "{{ $primary_color ?? '#228B22' }}",
                        "surface-container": "#ebefee",
                        "tertiary": "#8c4a24",
                        "surface-tint": "{{ $primary_color ?? '#228B22' }}",
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
            <a class="text-green-700 dark:text-green-400 font-bold border-b-2 border-green-700 pb-1" href="{{ route('properties.index') }}">
                Propiedades {{ $propiedades ?? 0 }} 
            </a>
            <a class="text-slate-600 dark:text-slate-400 hover:text-green-700 transition-colors" href="{{ route('projects.index') }}">Proyectos</a>
            <a class="text-slate-600 dark:text-slate-400 hover:text-green-700 transition-colors" href="{{ route('sustainability.index') }}">Sustentabilidad</a>
            <a class="text-slate-600 dark:text-slate-400 hover:text-green-700 transition-colors" href="{{ route('about.index') }}">Nosotros</a>
        </nav>
        
        <!-- Brand Identity (Center) -->
        <div class="flex flex-col items-center text-center">
            <div class="flex items-center space-x-3 mb-1">
                <img alt="{{ $company_name ?? 'Maz Terrenos' }} Logo" 
                     class="w-10 h-10 rounded-full object-cover border border-outline-variant" 
                     src="{{ $logo_url ?? asset('images/logo.png') }}"
                     data-alt="{{ $logo_alt ?? 'Circular minimal logo for a luxury real estate brand featuring stylized natural landscape elements in green and white' }}">
                <span class="text-2xl font-bold tracking-tight text-slate-900 dark:text-slate-50">{{ $company_name ?? 'Maz Terrenos' }}</span>
            </div>
            <span class="text-[10px] uppercase tracking-[0.2em] text-slate-500 italic font-medium">{{ $tagline ?? 'Inversión consciente, legado natural' }}</span>
        </div>
        
        <!-- Actions (Right) -->
        <div class="flex items-center space-x-4">
            @auth
                <a href="{{ route('dashboard') }}" class="text-slate-600 hover:text-green-700 font-medium px-4 py-2 hover:scale-102 transition-transform duration-200">
                    {{ Auth::user()->name }}
                </a>
            @else
                <a href="{{ route('login') }}" class="text-slate-600 hover:text-green-700 font-medium px-4 py-2 hover:scale-102 transition-transform duration-200">
                    Iniciar Sesión
                </a>
            @endauth
            <a href="{{ route('contact') }}" class="bg-primary text-on-primary px-6 py-2.5 rounded-xl font-semibold hover:scale-102 active:scale-95 transition-all duration-200 shadow-sm">
                {{ $cta_button_text ?? 'Contactar' }}
            </a>
        </div>
    </div>
</header>

<main>
    <!-- Hero Section (Split Layout) -->
    <section class="relative min-h-[870px] flex flex-col md:flex-row overflow-hidden">
        <div class="w-full md:w-1/2 relative min-h-[512px] md:min-h-0">
            <img alt="{{ $hero_alt ?? 'Luxury Forest Cabin' }}" 
                 class="absolute inset-0 w-full h-full object-cover" 
                 src="{{ $hero_image ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuCVjd9XoXwlxqcAvT6CopoGXcoUlilf5T4Fw9y1zS97D5ZscDIH3RkFBS1XUcBCqKVDW7oB2V1Wvsn7Eo8kHx6-9vuREFU-9TbnXzunrhTS_-8tfdbsXkBDo8MoEJCRq8e8Uwi6Rf-GxluNFK03vq27OBU2iRMIEj2h8LYBuV1syc_NIG45FvTOk8G6kgnd6AoyqsJSuOn9C5BcRT1yYh9nXYwH0IO6GJ222l7UNn3mTepJz1MvgQte50Re4hwPPeeqiAj2ZR2lqZaQ'}}"
                 data-alt="{{ $hero_alt ?? 'Modern architectural cabin with large glass windows nestled in a misty pine forest during early morning light, editorial style' }}">
            <div class="absolute inset-0 bg-primary/10 backdrop-blur-[1px]"></div>
        </div>
        <div class="w-full md:w-1/2 flex items-center justify-center p-8 md:p-24 bg-surface-container-low">
            <div class="max-w-xl">
                <h1 class="text-5xl md:text-7xl font-bold leading-[1.1] mb-8 uppercase tracking-tighter text-primary">
                    {{ $hero_title ?? 'INVIERTE HOY EN EL ESPACIO DE TUS SUEÑOS' }}
                </h1>
                <p class="text-lg text-secondary mb-10 leading-relaxed font-body">
                    {{ $hero_description ?? 'Descubre terrenos exclusivos diseñados para armonizar con la naturaleza. Creamos plusvalía a través de la conservación y el diseño consciente. Tu legado comienza en la tierra que respira.' }}
                </p>
                <a href="{{ route('properties.index') }}" class="bg-primary text-on-primary text-lg px-10 py-5 rounded-xl font-bold hover:scale-102 transition-transform shadow-lg inline-flex items-center group">
                    {{ $hero_cta_text ?? 'Ver Terrenos' }}
                    <span class="material-symbols-outlined ml-2 group-hover:translate-x-1 transition-transform" data-icon="arrow_forward">arrow_forward</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Properties -->
    <section class="py-24 px-8 max-w-screen-2xl mx-auto">
        <div class="flex justify-between items-end mb-16">
            <div>
                <h2 class="text-4xl font-bold text-on-surface mb-2">{{ $featured_title ?? 'Propiedades Destacadas' }}</h2>
                <p class="text-secondary">{{ $featured_subtitle ?? 'Oportunidades únicas seleccionadas por su entorno natural y potencial de crecimiento.' }}</p>
            </div>
            <a href="{{ route('properties.catalog') }}" class="text-primary font-bold flex items-center hover:underline">
                {{ $catalog_cta ?? 'Ver catálogo completo' }} 
                <span class="material-symbols-outlined ml-1" data-icon="trending_flat">trending_flat</span>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($featured_properties ?? [] as $property)
                <div class="group bg-surface-container-lowest rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="aspect-[4/3] overflow-hidden">
                        <img alt="{{ $property['alt'] ?? $property->name ?? 'Property' }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" 
                             src="{{ $property['image'] ?? $property->image_url ?? asset('images/placeholder.jpg') }}">
                    </div>
                    <div class="p-8">
                        <div class="flex items-center text-primary text-xs font-bold uppercase tracking-widest mb-3">
                            <span class="material-symbols-outlined text-sm mr-1" data-icon="location_on">location_on</span> 
                            {{ $property['location'] ?? $property->location ?? 'Ubicación' }}
                        </div>
                        <h3 class="text-2xl font-bold mb-2">{{ $property['name'] ?? $property->name ?? 'Propiedad' }}</h3>
                        <p class="text-on-surface/60 text-sm mb-6 line-clamp-2 font-body">
                            {{ $property['description'] ?? $property->description ?? 'Descripción de la propiedad' }}
                        </p>
                        <div class="flex justify-between items-center pt-6 border-t border-outline-variant">
                            <span class="text-xl font-bold text-primary">{{ $property['price'] ?? $property->price ?? '$0 MXN' }}</span>
                            <a href="{{ $property['url'] ?? route('properties.show', $property->slug ?? $property->id) }}" 
                               class="bg-surface-container text-on-surface px-4 py-2 rounded-lg text-sm font-semibold hover:bg-primary hover:text-white transition-colors">
                                Ver Detalles
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Fallback properties if none provided -->
                <div class="col-span-full text-center py-16 text-secondary">
                    No hay propiedades destacadas disponibles en este momento.
                </div>
            @endforelse
        </div>
    </section>

    <!-- Call to Action Banner -->
    <section class="px-8 mt-12">
        <div class="bg-primary rounded-3xl p-12 md:p-20 text-center text-on-primary max-w-screen-2xl mx-auto relative overflow-hidden">
            <div class="relative z-10">
                <h2 class="text-4xl md:text-6xl font-bold mb-6">{{ $cta_title ?? '¿Listo para tu nueva vida?' }}</h2>
                <p class="text-lg md:text-xl text-green-100 max-w-2xl mx-auto mb-10 font-body">
                    {{ $cta_description ?? 'Agenda una visita guiada con nuestros expertos y conoce el terreno que transformará tu futuro.' }}
                </p>
                <a href="{{ route('contact') }}" class="bg-white text-primary px-12 py-5 rounded-xl font-bold text-lg hover:scale-105 active:scale-95 transition-all shadow-xl">
                    {{ $cta_button_text ?? 'Contactar a un asesor' }}
                </a>
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
            <div class="text-xl font-serif text-white mb-4">{{ $company_name ?? 'Maz Terrenos' }}</div>
            <p class="text-green-100/80 text-sm leading-relaxed font-sans tracking-wide">
                {{ $footer_description ?? 'Líderes en el desarrollo de espacios conscientes que integran la vida moderna con la preservación del ecosistema. Inversión con propósito.' }}
            </p>
            <div class="flex space-x-4 mt-8">
                @foreach($social_links ?? [] as $platform => $url)
                    <a class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-white hover:text-green-800 transition-all" href="{{ $url }}" target="_blank">
                        <span class="material-symbols-outlined" data-icon="{{ $platform }}">public</span>
                    </a>
                @endforeach
            </div>
        </div>
        
        <!-- Links Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 gap-12 text-sm">
            <div>
                <h4 class="text-white font-bold mb-6 uppercase tracking-widest text-xs">{{ $footer_sections['company'] ?? 'Compañía' }}</h4>
                <ul class="space-y-4">
                    @foreach($footer_company_links ?? [['name' => 'Sustentabilidad', 'url' => route('sustainability.index')], ['name' => 'Nosotros', 'url' => route('about.index')]] as $link)
                        <li><a class="text-green-100/80 hover:text-white hover:translate-x-1 transition-transform inline-block" href="{{ $link['url'] }}">{{ $link['name'] }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h4 class="text-white font-bold mb-6 uppercase tracking-widest text-xs">{{ $footer_sections['support'] ?? 'Soporte' }}</h4>
                <ul class="space-y-4">
                    @foreach($footer_support_links ?? [['name' => 'Preguntas Frecuentes', 'url' => route('faq')], ['name' => 'Privacidad', 'url' => route('privacy')]] as $link)
                        <li><a class="text-green-100/80 hover:text-white hover:translate-x-1 transition-transform inline-block" href="{{ $link['url'] }}">{{ $link['name'] }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-span-2 md:col-span-1">
                <h4 class="text-white font-bold mb-6 uppercase tracking-widest text-xs">{{ $footer_sections['locations'] ?? 'Ubicaciones' }}</h4>
                <ul class="space-y-4 text-green-100/80">
                    @foreach($contact_info ?? [['icon' => 'location_on', 'text' => 'Av. Las Palmas 405, Lomas, CDMX'], ['icon' => 'phone', 'text' => '+52 55 1234 5678']] as $info)
                        <li class="flex items-start">
                            <span class="material-symbols-outlined
