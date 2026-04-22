@extends('layouts.app')

@section('title', 'Maz Terrenos - Home')

@php
    $css_file = 'homePage';
@endphp

@section('content')
    <main class="flex-1 bg-white">
        <!-- Hero Section -->
        <div class="flex flex-col lg:flex-row min-h-[600px]">
            <!-- Left: Image Placeholder -->
            <div class="lg:w-1/2 relative bg-gray-300 min-h-[400px] lg:min-h-full flex items-center justify-center">
                <!-- 
                <img src="{{ asset('public/images/hero.jpg') }}" class="absolute inset-0 w-full h-full object-cover">
                -->
                <span class="text-gray-500 text-2xl font-bold tracking-widest uppercase relative z-10">Imagen</span>

                <!-- Overlay Text -->
                <div class="absolute inset-0 bg-black/30 flex flex-col justify-end p-10 lg:p-16">
                    <h1 class="text-white text-5xl lg:text-5xl font-black leading-tight mb-4">Encuentra tu<br>lugar ideal en
                        la<br>naturaleza</h1>
                    <p class="text-white/90 text-xl font-medium">Invierte en tu futuro con sostenibilidad y estilo.</p>
                </div>
            </div>

            <!-- Right: Content -->
            <div class="lg:w-1/2 flex flex-col items-center justify-center p-10 lg:p-20 text-center">
                <div class="w-16 h-16 rounded-full border-2 border-green-600 flex items-center justify-center mb-6">
                    <span class="material-symbols-outlined text-green-600 text-3xl">home_work</span>
                </div>
                <h2 class="text-5xl lg:text-7xl font-black text-green-700 tracking-wider mb-6 leading-none">MAZ<br>TERRENOS
                </h2>
                <p class="text-gray-600 text-sm font-medium leading-relaxed max-w-sm mb-10">
                    Bienvenido a <span class="font-bold">maz terrenos</span>. Descubre una forma consciente de habitar el
                    mundo.
                </p>
                <button
                    class="bg-green-700 hover:bg-green-800 text-white font-bold py-3 px-8 rounded-lg mb-10 flex items-center gap-2 transition-colors">
                    <span class="material-symbols-outlined text-[20px]">check_circle</span>
                    Ver Terrenos
                </button>
                <div class="w-full max-w-md flex items-center bg-gray-50 border border-gray-200 rounded-xl p-1 shadow-sm">
                    <span class="material-symbols-outlined text-gray-400 ml-4">search</span>
                    <input type="text" placeholder="¿Qué tipo de terreno buscas?"
                        class="flex-1 bg-transparent border-none focus:ring-0 text-sm px-4" />
                    <button class="bg-green-700 text-white px-6 py-2 rounded-lg font-bold text-sm flex items-center gap-1">
                        Empezar <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Featured Properties Section -->
        <div class="max-w-7xl mx-auto px-6 md:px-20 py-20">
            <div class="flex justify-between items-end mb-10">
                <div>
                    <h3 class="text-3xl font-black text-gray-900 mb-2">Featured Properties</h3>
                    <p class="text-gray-500 font-medium text-sm">Las mejores oportunidades de inversión en entornos
                        naturales.</p>
                </div>
                <a href="#" class="text-green-700 font-bold text-sm flex items-center hover:underline">
                    Explorar todo <span class="material-symbols-outlined text-[18px] ml-1">arrow_forward</span>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <!-- Property Card 1 -->
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden flex flex-col">
                    <div class="relative bg-gray-300 aspect-[4/3] flex items-center justify-center">
                        <!-- 
                        <img src="{{ asset('public/images/prop1.jpg') }}" class="absolute inset-0 w-full h-full object-cover">
                        -->
                        <span class="text-gray-500 font-bold tracking-widest uppercase z-10">Imagen</span>
                        <span
                            class="absolute top-4 right-4 bg-white text-green-700 text-[10px] font-black uppercase px-3 py-1 rounded-full z-20">Nuevo</span>
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <div class="flex justify-between items-start mb-2">
                            <h4 class="text-xl font-black text-gray-900">Bosque Sereno</h4>
                            <span class="text-green-700 font-black text-lg">$120,000</span>
                        </div>
                        <p class="text-xs font-medium text-gray-500 mb-6 flex-1">
                            Ubicado en el corazón del Valle del Sol, ideal para cabañas eco-friendly.
                        </p>
                        <div class="flex gap-4 text-gray-400 text-xs font-semibold mb-6">
                            <span class="flex items-center gap-1"><span
                                    class="material-symbols-outlined text-[16px]">square_foot</span> 5000 m2</span>
                            <span class="flex items-center gap-1"><span
                                    class="material-symbols-outlined text-[16px]">eco</span> Sostenible</span>
                        </div>
                        <button
                            class="w-full bg-gray-50 hover:bg-green-50 text-green-700 font-bold py-3 rounded-lg text-sm transition-colors border border-green-100">
                            Ver Detalles
                        </button>
                    </div>
                </div>

                <!-- Property Card 2 -->
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden flex flex-col">
                    <div class="relative bg-gray-300 aspect-[4/3] flex items-center justify-center">
                        <!-- 
                        <img src="{{ asset('public/images/prop2.jpg') }}" class="absolute inset-0 w-full h-full object-cover">
                        -->
                        <span class="text-gray-500 font-bold tracking-widest uppercase z-10">Imagen</span>
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <div class="flex justify-between items-start mb-2">
                            <h4 class="text-xl font-black text-gray-900">Pradera Verde</h4>
                            <span class="text-green-700 font-black text-lg">$85,000</span>
                        </div>
                        <p class="text-xs font-medium text-gray-500 mb-6 flex-1">
                            Vistas panorámicas de 360 grados hacia las montañas de la cordillera.
                        </p>
                        <div class="flex gap-4 text-gray-400 text-xs font-semibold mb-6">
                            <span class="flex items-center gap-1"><span
                                    class="material-symbols-outlined text-[16px]">square_foot</span> 2000 m2</span>
                            <span class="flex items-center gap-1"><span
                                    class="material-symbols-outlined text-[16px]">visibility</span> Vista Panorámica</span>
                        </div>
                        <button
                            class="w-full bg-gray-50 hover:bg-green-50 text-green-700 font-bold py-3 rounded-lg text-sm transition-colors border border-green-100">
                            Ver Detalles
                        </button>
                    </div>
                </div>

                <!-- Property Card 3 -->
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden flex flex-col">
                    <div class="relative bg-gray-300 aspect-[4/3] flex items-center justify-center">
                        <!-- 
                        <img src="{{ asset('public/images/prop3.jpg') }}" class="absolute inset-0 w-full h-full object-cover">
                        -->
                        <span class="text-gray-500 font-bold tracking-widest uppercase z-10">Imagen</span>
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <div class="flex justify-between items-start mb-2">
                            <h4 class="text-xl font-black text-gray-900">Refugio del Valle</h4>
                            <span class="text-green-700 font-black text-lg">$150,000</span>
                        </div>
                        <p class="text-xs font-medium text-gray-500 mb-6 flex-1">
                            Acceso directo al río y rodeado de robles centenarios. Privacidad total.
                        </p>
                        <div class="flex gap-4 text-gray-400 text-xs font-semibold mb-6">
                            <span class="flex items-center gap-1"><span
                                    class="material-symbols-outlined text-[16px]">square_foot</span> 8000 m2</span>
                            <span class="flex items-center gap-1"><span
                                    class="material-symbols-outlined text-[16px]">water</span> Cerca del Río</span>
                        </div>
                        <button
                            class="w-full bg-gray-50 hover:bg-green-50 text-green-700 font-bold py-3 rounded-lg text-sm transition-colors border border-green-100">
                            Ver Detalles
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex justify-center">
                <button class="bg-green-700 hover:bg-green-800 text-white font-bold py-4 px-8 rounded-xl transition-colors">
                    Ver más propiedades
                </button>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="bg-green-700 py-24 px-6 text-center">
            <h3 class="text-white text-4xl lg:text-5xl font-black mb-4 tracking-tight">¿Listo para tu nueva vida?</h3>
            <p class="text-white/90 font-medium mb-10 text-sm max-w-md mx-auto">
                Únete a cientos de personas que ya están viviendo su sueño en la naturaleza.
            </p>
            <button
                class="bg-[#1a1e26] hover:bg-black text-white font-bold py-4 px-8 rounded-xl transition-colors shadow-lg">
                Contactar a un asesor
            </button>
        </div>
    </main>
@endsection