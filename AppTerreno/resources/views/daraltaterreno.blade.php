<!DOCTYPE html>
<html class="light" lang="es">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>{{ $pageTitle ?? 'Publicar Terreno | Maz Terrenos' }}</title>
{{-- CSRF TOKEN --}}
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,opsz,wght@0,6..72,200..800;1,6..72,200..800&amp;family=Work+Sans:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "secondary": "#475569",
                        "tertiary-fixed-dim": "#ffb690",
                        "surface-container-lowest": "#ffffff",
                        "on-tertiary-fixed": "#341100",
                        "on-secondary-fixed": "#002020",
                        "outline": "#cbd5e1",
                        "on-error-container": "#93000a",
                        "on-error": "#ffffff",
                        "error-container": "#ffdad6",
                        "on-primary-fixed": "#002020",
                        "surface-container": "#ebefee",
                        "secondary-fixed-dim": "#aacdcc",
                        "on-primary-fixed-variant": "#004f50",
                        "surface-bright": "#ffffff",
                        "error": "#ba1a1a",
                        "outline-variant": "#e2e8f0",
                        "primary-fixed": "#94f2f2",
                        "surface-dim": "#d7dbda",
                        "on-background": "#0f172a",
                        "on-tertiary-container": "#fffbff",
                        "on-surface": "#0f172a",
                        "surface-tint": "#228B22",
                        "primary-fixed-dim": "#78d6d5",
                        "on-surface-variant": "#475569",
                        "primary-container": "#228B22",
                        "on-tertiary": "#ffffff",
                        "on-tertiary-fixed-variant": "#723611",
                        "tertiary-fixed": "#ffdbca",
                        "surface-variant": "#e2e8f0",
                        "tertiary": "#8c4a24",
                        "primary": "#228B22",
                        "surface-container-high": "#e5e9e8",
                        "on-primary-container": "#ffffff",
                        "surface-container-highest": "#dfe3e2",
                        "on-primary": "#ffffff",
                        "secondary-fixed": "#c6e9e8",
                        "on-secondary-container": "#1e293b",
                        "secondary-container": "#f1f5f9",
                        "on-secondary": "#ffffff",
                        "tertiary-container": "#aa623a",
                        "on-secondary-fixed-variant": "#2b4c4c",
                        "inverse-on-surface": "#f1f5f9",
                        "surface": "#F8F8FF",
                        "surface-container-low": "#F8F8FF",
                        "inverse-primary": "#78d6d5",
                        "background": "#F8F8FF",
                        "inverse-surface": "#1e293b"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.5rem",
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
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
        }
        body { font-family: 'Work Sans', sans-serif; background-color: #F8F8FF; }
        .font-serif { font-family: 'Newsreader', serif; }
        .text-brand-green { color: #228B22; }
        .bg-brand-green { background-color: #228B22; }
    </style>
</head>
<body class="text-on-background">

{{-- ========================================
    NAVBAR - CONTROLADOR: pasa $navItems, $logoUrl
======================================= --}}
<!-- TopAppBar -->
<nav class="bg-[#F8F8FF]/80 backdrop-blur-sm fixed top-0 z-50 w-full shadow-lg shadow-black/5">
<div class="flex justify-between items-center px-8 py-3 max-w-full mx-auto">
<div class="flex items-center">
<img alt="{{ $logoAlt ?? 'Maz Terrenos Logo' }}" class="w-14 h-14 object-contain" src="{{ $logoUrl ?? 'https://lh3.googleusercontent.com/aida/ADBb0uhSyDqftCBJ5OByguvtA7rMs1sS4mKPXfOYR2J5PefFe6Ast47RxcD7JRi1TyoQp06UfER8zk8Fb0BqbIPHuKbX_-u1N0M1fYtgG1aJkoe4kQA8mxPM0aVQuy-BgC9w5SvfRh_IGpyzLrlyLmvxsIgwdju6vVfbYl-ZuuLt6gnnhS5u1SheMuHr69lDzPtV2ngcEpnm0lOOqQzta7Ib5tWDMPEXjUi21ixNhy4x_lqX2sfctByg0I8fgkluHMr8i8C9LScd6Kk3jw' }}"/>
</div>
<div class="absolute left-1/2 -translate-x-1/2 text-center">
<h1 class="text-2xl font-bold tracking-tight text-brand-green font-serif leading-none">{{ $siteName ?? 'Maz Terrenos' }}</h1>
<p class="text-[10px] text-brand-green font-medium tracking-[0.2em] uppercase mt-1">{{ $siteTagline ?? 'Inversión consciente, legado natural' }}</p>
</div>
<div class="flex items-center gap-6">
<div class="hidden md:flex gap-8">
    @foreach($navItems ?? [['label' => 'Listings', 'url' => '#'], ['label' => 'Sustainability', 'url' => '#'], ['label' => 'About', 'url' => '#']] as $item)
        <a class="text-slate-600 hover:text-brand-green transition-colors font-medium text-sm" href="{{ $item['url'] }}">{{ $item['label'] }}</a>
    @endforeach
</div>
<a href="{{ $addListingUrl ?? '#' }}" class="bg-brand-green text-white px-6 py-2 rounded-lg font-semibold hover:opacity-90 transition-opacity text-sm">
    {{ $addListingText ?? 'Add Listing' }}
</a>
</div>
</div>
</nav>

{{-- ========================================
    MAIN CONTENT - CONTROLADOR: pasa $heroData, $formData
======================================= --}}
<!-- Main Content Canvas -->
<main class="pt-20 min-h-screen flex flex-col md:flex-row">
<!-- Left Side: Decorative & Editorial -->
<section class="md:w-[40%] h-[300px] md:h-screen sticky top-0 bg-slate-100 overflow-hidden">
<div class="absolute inset-0 z-10 bg-gradient-to-r from-black/30 to-transparent"></div>
<img alt="{{ $heroData['alt'] ?? 'Decorative Tropical Foliage' }}" 
     class="w-full h-full object-cover grayscale opacity-80" 
     src="{{ $heroData['image'] ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuCiJ5ICL0i-wP924M-C4sdhBI7jWJTn4rklIsV75oaLIN-nyR_gG6puNCm6sSURFYNz5x-_cO3_0zDo105dY0WHAOghG63XZYuqB5aOlnX5VAEsgGaX4KvFBPsjg34_iSUYhw4WeXmV8Q_zdCh8X4Au6ot1y3OYJ-c6V8n3rM7aqDZR8NklHDOgZcHxNAXrMG2iQSZdLqDYQs2HJQpCtGoczJ412oi_IHHnP8hGpWTZpiDWJ7zfY_JAerYsMilWI_W1EViLkFFrEe-O' }}"/>
<div class="absolute inset-0 z-20 flex items-center justify-center p-12">
<div class="max-w-md">
<p class="text-white font-serif text-3xl md:text-5xl italic leading-tight">
    "{{ $heroData['quote'] ?? 'Preservar el mañana, construyendo hoy' }}"
</p>
<div class="mt-8 h-1 w-24 bg-brand-green"></div>
</div>
</div>
</section>

<!-- Right Side: Form Container -->
<section class="md:w-[60%] p-8 md:p-16 lg:p-24 bg-[#F8F8FF]">
<div class="max-w-2xl mx-auto">
<header class="mb-12">
<h2 class="text-4xl font-serif font-bold text-slate-900 mb-2">{{ $formData['title'] ?? 'Publicar Terreno' }}</h2>
<p class="text-slate-500 font-body">{{ $formData['subtitle'] ?? 'Complete los detalles de su propiedad para llegar a inversionistas conscientes.' }}</p>
</header>

{{-- FORMULARIO CON VALIDACIÓN - CONTROLADOR: maneja store() --}}
<form action="{{ $formData['action'] ?? route('listings.store') }}" method="POST" enctype="multipart/form-data" class="space-y-12">
    @csrf
    
    {{-- ERRORES GLOBALES --}}
    @if ($errors->any())
        <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-8 rounded">
            <ul class="text-red-700 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- ========================================
        STEP 1: INFORMACIÓN BÁSICA
        CONTROLADOR: valida title, description, price, location
    ======================================= --}}
    <div class="space-y-6">
    <div class="flex items-center gap-4 mb-4">
    <span class="flex items-center justify-center w-10 h-10 rounded-full bg-brand-green text-white font-bold">1</span>
    <h3 class="text-xl font-serif font-bold text-slate-800">{{ $steps[0]['title'] ?? 'Información Básica' }}</h3>
    </div>
    <div class="grid grid-cols-1 gap-6">
        <div>
        <label class="block text-sm font-semibold text-slate-700 mb-2 font-label">{{ $formFields['title']['label'] ?? 'Título del Anuncio' }}</label>
        <input class="w-full px-4 py-3 rounded-lg bg-white border-2 @error('title') border-red-500 @else border-outline-variant @enderror focus:ring-2 focus:ring-brand-green focus:border-brand-green transition-all" 
               name="title" value="{{ old('title') }}" placeholder="{{ $formFields['title']['placeholder'] ?? 'Ej. Lote Residencial en Selva Norte' }}" type="text"/>
        </div>
        <div>
        <label class="block text-sm font-semibold text-slate-700 mb-2 font-label">{{ $formFields['description']['label'] ?? 'Descripción Detallada' }}</label>
        <textarea class="w-full px-4 py-3 rounded-lg bg-white border-2 @error('description') border-red-500 @else border-outline-variant @enderror focus:ring-2 focus:ring-brand-green focus:border-brand-green transition-all" 
                  name="description" rows="4">{{ old('description') }}</textarea>
        <small class="text-slate-500">{{ $formFields['description']['help'] ?? 'Describa el entorno natural, accesos y potencial de inversión...' }}</small>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
            <label class="block text-sm font-semibold text-slate-700 mb-2 font-label">{{ $formFields['price']['label'] ?? 'Precio (MXN)' }}</label>
            <div class="relative">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">$</span>
            <input class="w-full pl-8 pr-4 py-3 rounded-lg bg-white border-2 @error('price') border-red-500 @else border-outline-variant @enderror focus:ring-2 focus:ring-brand-green focus:border-brand-green transition-all" 
                   name="price" value="{{ old('price') }}" placeholder="{{ $formFields['price']['placeholder'] ?? '0.00' }}" type="number" step="0.01"/>
            </div>
            </div>
            <div>
            <label class="block text-sm font-semibold text-slate-700 mb-2 font-label">{{ $formFields['location']['label'] ?? 'Ubicación' }}</label>
            <input class="w-full px-4 py-3 rounded-lg bg-white border-2 @error('location') border-red-500 @else border-outline-variant @enderror focus:ring-2 focus:ring-brand-green focus:border-brand-green transition-all" 
                   name="location" value="{{ old('location') }}" placeholder="{{ $formFields['location']['placeholder'] ?? 'Ciudad, Estado' }}" type="text"/>
            </div>
        </div>
    </div>
    </div>

    {{-- ========================================
        STEP 2: DETALLES TÉCNICOS
        CONTROLADOR: valida area, zoning, topography
    ======================================= --}}
    <div class="space-y-6">
    <div class="flex items-center gap-4 mb-4">
    <span class="flex items-center justify-center w-10 h-10 rounded-full bg-brand-green text-white font-bold">2</span>
    <h3 class="text-xl font-serif font-bold text-slate-800">{{ $steps[1]['title'] ?? 'Detalles Técnicos' }}</h3>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div>
        <label class="block text-sm font-semibold text-slate-700 mb-2 font-label">{{ $formFields['area']['label'] ?? 'Superficie (m2)' }}</label>
        <input class="w-full px-4 py-3 rounded-lg bg-white border-2 @error('area') border-red-500 @else border-outline-variant @enderror focus:ring-2 focus:ring-brand-green focus:border-brand-green transition-all" 
               name="area" value="{{ old('area') }}" placeholder="{{ $formFields['area']['placeholder'] ?? 'm2' }}" type="number"/>
        </div>
        <div>
        <label class="block text-sm font-semibold text-slate-700 mb-2 font-label">{{ $formFields['zoning']['label'] ?? 'Zonificación' }}</label>
        <select class="w-full px-4 py-3 rounded-lg bg-white border-2 @error('zoning') border-red-500 @else border-outline-variant @enderror focus:ring-2 focus:ring-brand-green focus:border-brand-green transition-all appearance-none" name="zoning">
            @foreach($zoningOptions ?? ['Residencial', 'Comercial', 'Mixto', 'Preservación'] as $option)
                <option value="{{ strtolower(str_replace(' ', '_', $option)) }}" {{ old('zoning') == strtolower(str_replace(' ', '_', $option)) ? 'selected' : '' }}>
                    {{ $option }}
                </option>
            @endforeach
        </select>
        </div>
        <div>
        <label class="block text-sm font-semibold text-slate-700 mb-2 font-label">{{ $formFields['topography']['label'] ?? 'Topografía' }}</label>
        <select class="w-full px-4 py-3 rounded-lg bg-white border-2 @error('topography') border-red-500 @else border-outline-variant @enderror focus:ring-2 focus:ring-brand-green focus:border-brand-green transition-all appearance-none" name="topography">
            @foreach($topographyOptions ?? ['Plano', 'Pendiente Ligera', 'Escarpado'] as $option)
                <option value="{{ strtolower(str_replace(' ', '_', $option)) }}" {{ old('topography') == strtolower(str_replace(' ', '_', $option)) ? 'selected' : '' }}>
                    {{ $option }}
                </option>
            @endforeach
        </select>
        </div>
    </div>
    </div>

    {{-- ========================================
        STEP 3: GALERÍA DE IMÁGENES
        CONTROLADOR: valida images.*, max:2048
    ======================================= --}}
    <div class="space-y-6">
    <div class="flex items-center gap-4 mb-4">
    <span class="flex items-center justify-center w-10 h-10 rounded-full bg-brand-green text-white font-bold">3</span>
    <h3 class="text-xl font-serif font-bold text-slate-800">{{ $steps[2]['title'] ?? 'Galería de Imágenes' }}</h3>
    </div>
    <div class="w-full border-2 border-dashed border-outline rounded-xl p-12 flex flex-col items-center justify-center bg-white/50 hover:bg-white transition-colors cursor-pointer group" id="dropZone">
    <span class="material-symbols-outlined text-5xl text-slate-300 group-hover:text-brand-green transition-colors mb-4">cloud_upload</span>
    <p class="text-slate-600 mb-4 font-medium">{{ $uploadZoneText ?? 'Arrastre sus imágenes aquí' }}</p>
    <input type="file" name="images[]" id="fileInput" multiple accept="image/*" class="hidden">
    <label for="fileInput" class="bg-slate-100 text-slate-800 px-6 py-2 rounded-lg font-semibold hover:bg-slate-200 transition-colors text-sm cursor-pointer">
        {{ $selectFilesText ?? 'Seleccionar Archivos' }}
    </label>
    </div>
    <div class="grid grid-cols-4 gap-4" id="imagePreview">
        {{-- IMÁGENES PREVIEW DINÁMICO CON JS --}}
        @if(session('uploaded_images'))
            @foreach(json_decode(session('uploaded_images

