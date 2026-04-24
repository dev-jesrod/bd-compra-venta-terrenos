{{-- 
    Archivo: detalles-terreno.blade.php
    Descripción: Vista de detalles de un terreno específico
    Controlador: TerrenoController - metodo: show($id)
    Ruta: Route::get('/terrenos/{id}', [TerrenoController::class, 'show']);
    
    Variables esperadas:
    - $terreno (object): Datos del terreno
      - $terreno->titulo
      - $terreno->direccion
      - $terreno->precio
      - $terreno->descripcion
      - $terreno->superficie
      - $terreno->estado
      - $terreno->zonificacion
      - $terreno->imagen_principal
      - $terreno->vendedor->nombre
      - $terreno->vendedor->cargo
      - $terreno->vendedor->avatar
--}}
<!DOCTYPE html>

<html lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Maz Terrenos - {{ $terreno->titulo ?? 'Emerald Sanctuary' }}</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script src="{{ asset('js/tailwind-detalles.js') }}"></script>
<link href="{{ asset('css/detalles-terreno.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
</head>
<body class="text-on-surface selection:bg-primary-fixed selection:text-on-primary-fixed">
<!-- TopAppBar -->
<nav class="bg-[#f9f9ff]/80 backdrop-blur-xl fixed top-0 w-full z-[100] transition-transform">
<div class="max-w-screen-2xl mx-auto flex flex-col items-center justify-center py-6 px-8 relative">
<!-- Left Logo -->
<div class="absolute left-8 top-1/2 -translate-y-1/2">
<div class="w-12 h-12 rounded-full overflow-hidden border border-outline-variant">
<img class="w-full h-full object-cover" data-alt="Minimalist 'casita' logo for Maz Terrenos" src="https://lh3.googleusercontent.com/aida/ADBb0ug8LxtLBIopamEkJf3TU3pG7StjO5DRYDmKIyi9Y7Hpaji8sK_2npXw1FGQLyFIiEtpcbw1tiWGmUqd8bhPwXKNjCnvyBgF3bPFs0Pwysre-E2JBTu9wdWTXxl3MlVN5MdginwPwSrc3g3k-aW1fhWnXEZmYO0lBtjViHOkCZARBe8uZPybkX_BcuYoiQ3q7O3KleQijcPicVU9zxOsA7Q-25hb89HQfcY03htQTv5DKAUXPVm7TuVclJ9QVM9rAPfUZ0jnnV3Xvg"/>
</div>
</div>
<!-- Centered Identity -->
<div class="text-center">
<span class="text-3xl font-serif text-green-700 tracking-tighter uppercase block">MAZ TERRENOS</span>
<span class="font-serif italic text-sm tracking-widest text-green-700 opacity-80 block mt-1 uppercase">INVERSIÓN CONSCIENTE, LEGADO NATURAL</span>
</div>
<!-- Right Action -->
<div class="absolute right-8 top-1/2 -translate-y-1/2 hidden md:flex items-center gap-6">
<span class="material-symbols-outlined text-slate-600 hover:text-green-700 cursor-pointer transition-colors">account_circle</span>
</div>
</div>
</nav>
<main class="pt-32 pb-24 max-w-6xl mx-auto px-6">
<!-- Header Section -->
<header class="text-center mb-12">
<h1 class="text-5xl md:text-7xl mb-4 tracking-tight" style="color: #228B22;">Emerald Sanctuary in Valle Verde</h1>
<div class="flex items-center justify-center gap-2 text-slate-500 mb-8">
<span class="material-symbols-outlined text-primary text-sm">location_on</span>
<span class="font-body text-sm uppercase tracking-widest">Avenida de los Pinos 45, Valle Verde</span>
</div>
<div class="inline-block px-8 py-3 bg-surface-container-low rounded-full border border-primary/10">
<span class="text-2xl font-body font-bold text-primary tracking-tight">$45,000 USD</span>
</div>
</header>
<!-- Hero Gallery & Key Features -->
<section class="relative mb-20">
<div class="w-full aspect-[21/9] rounded-xl overflow-hidden shadow-2xl relative">
<img class="w-full h-full object-cover" data-alt="sweeping aerial view of a dense emerald green forest canopy with mist rising between ancient pines in soft morning light" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDR0Ujk2TtrkgDya0jFylRuJjtr82xLL6HkczJ9iasR8NytjuFm6RD2kiRP7VLQep6gUuZGeydzsn6n2xiRydeYqwbqpXiIAteCa73WkWLumiEf8ljWxdNU6-SPi46yQAoC1FG5F7lG9k-wzuM-OvvyQoZVgEVB0l4wB6854ExRzplbGfRiSKlH1kTNYBke8pqxRyn5S6xnsUWiEoTM4dx2bwY0J19KyXlqEqAeWQ6N0Fy8pHqP9Ihya-qcspE3nyBecWDA1x3EjHst"/>
<div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
</div>
<!-- Feature Cards (Overlapping Image) -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 px-4 -mt-12 relative z-10">
<div class="bg-white p-6 rounded-xl shadow-sm border border-green-200 flex flex-col items-center text-center">
<span class="material-symbols-outlined text-green-700 mb-2">water_drop</span>
<span class="text-[10px] font-bold uppercase tracking-widest text-gray-500">Spring Water</span>
</div>
<div class="bg-white p-6 rounded-xl shadow-sm border border-green-200 flex flex-col items-center text-center">
<span class="material-symbols-outlined text-green-700 mb-2">solar_power</span>
<span class="text-[10px] font-bold uppercase tracking-widest text-gray-500">Solar Ready</span>
</div>
<div class="bg-white p-6 rounded-xl shadow-sm border border-green-200 flex flex-col items-center text-center">
<span class="material-symbols-outlined text-green-700 mb-2">star</span>
<span class="text-[10px] font-bold uppercase tracking-widest text-gray-500">Starlink Fiber</span>
</div>
<div class="bg-white p-6 rounded-xl shadow-sm border border-green-200 flex flex-col items-center text-center">
<span class="material-symbols-outlined text-green-700 mb-2">nature_people</span>
<span class="text-[10px] font-bold uppercase tracking-widest text-gray-500">60% Protected</span>
</div>
</div>
</section>
<!-- Two Column Layout: Content & Seller -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-16 items-start">
<!-- Left: Description & Tech Details -->
<div class="lg:col-span-2 space-y-12">
<div>
<h2 class="text-3xl font-serif mb-6 text-primary">Descripción</h2>
<p class="text-on-surface-variant font-body leading-relaxed text-lg">
                        Un refugio terrenal diseñado para quienes buscan trascender. Ubicado en el corazón de Valle Verde, este terreno ofrece una topografía equilibrada que permite construcciones orgánicas sin alterar el flujo natural del ecosistema. Un santuario donde el legado y la inversión consciente se encuentran.
                    </p>
</div>
<div class="bg-surface-container-low p-8 rounded-xl">
<h2 class="text-2xl font-serif mb-6 text-primary">Detalles Técnicos</h2>
<div class="grid grid-cols-2 gap-y-6">
<div>
<p class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-1">Superficie</p>
<p class="font-body font-semibold">1,200 m2</p>
</div>
<div>
<p class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-1">Status</p>
<p class="font-body font-semibold text-primary">AVAILABLE</p>
</div>
<div>
<p class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-1">Zonificación</p>
<p class="font-body font-semibold">Low-Density Residential</p>
</div>
<div>
<p class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-1">Pendiente</p>
<p class="font-body font-semibold">8-12% (Grave)</p>
</div>
</div>
</div>
</div>
<!-- Right: Seller Card -->
<aside class="space-y-8 sticky top-36">
<div class="bg-surface-container-highest p-8 rounded-xl">
<p class="text-[10px] font-bold uppercase tracking-[0.2em] text-slate-500 mb-6">DATOS DEL VENDEDOR</p>
<div class="flex items-center gap-4 mb-6">
<img class="w-16 h-16 rounded-full object-cover grayscale hover:grayscale-0 transition-all duration-500 border-2 border-white" data-alt="professional portrait of a middle-aged man with a warm smile, wearing a linen shirt, natural outdoor lighting background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBrom6RbPrRQU9M9M1-qmp_EMppWrKEdskbhWRlVkTd5ODToEO5kb-s2ZKz-EZFTpU1NxwSpVqoJmbepcyEAOuEudFuwO3bp8pJAgY55FYhYia3lk6FktklwK8XjGL7Ak_flhHRQUm9gv8AQlPvephBC3Ut3jndRPpWybU_3tQme4-SLnN9MGaEhutSibaeSzYgXaWnU3FGmQtqQOKVNhrKZcI-XRxLf-Mfqo8SilCtSSO3nK1-lREz1TwChgshFw3Zl_-F8o-_GMbZ"/>
<div>
<h3 class="text-xl font-serif">Eduardo Mendoza</h3>
<p class="text-sm font-body text-slate-500 italic">Senior Land Steward</p>
</div>
</div>
<button class="w-full py-4 bg-on-surface text-white rounded-full font-body font-bold text-xs uppercase tracking-widest flex items-center justify-center gap-2 hover:bg-primary transition-colors">
<span class="material-symbols-outlined text-sm">call</span>
                        Call Agent
                    </button>
</div>
<!-- Form -->
<div class="p-8 border border-outline-variant/50 rounded-xl">
<h2 class="text-xl font-serif mb-6">Solicitar Información</h2>
<form class="space-y-4">
<input class="w-full bg-transparent border-0 border-b border-outline-variant focus:ring-0 focus:border-primary text-sm font-body uppercase tracking-wider px-0 py-3 placeholder:text-slate-300" placeholder="NOMBRE COMPLETO" type="text"/>
<input class="w-full bg-transparent border-0 border-b border-outline-variant focus:ring-0 focus:border-primary text-sm font-body uppercase tracking-wider px-0 py-3 placeholder:text-slate-300" placeholder="EMAIL" type="email"/>
<textarea class="w-full bg-transparent border-0 border-b border-outline-variant focus:ring-0 focus:border-primary text-sm font-body uppercase tracking-wider px-0 py-3 placeholder:text-slate-300" placeholder="MENSAJE" rows="3"></textarea>
<button class="w-full py-4 mt-4 bg-gradient-to-r from-primary to-primary-container text-white rounded-full font-body font-extrabold text-xs uppercase tracking-[0.15em] shadow-lg shadow-primary/20">
                            EXPRESS INTEREST
                        </button>
</form>
</div>
</aside>
</div>
</main>
<!-- Sticky Footer CTA -->
<footer class="fixed bottom-0 left-0 w-full z-[100] md:hidden">
<div class="bg-on-surface text-white p-6 flex justify-between items-center">
<div>
<span class="block text-[10px] text-slate-400 uppercase tracking-widest">Inversión Final</span>
<span class="text-lg font-bold">$45,000 USD</span>
</div>
<button class="bg-primary px-8 py-3 rounded-full flex items-center gap-2 text-xs font-bold uppercase tracking-widest">
                COMPRAR AHORA
                <span class="material-symbols-outlined text-sm">arrow_forward</span>
</button>
</div>
</footer>
<!-- Desktop Footer for Consistency -->
<footer class="hidden md:flex w-full flex-col items-center justify-center space-y-8 border-t border-slate-100 bg-slate-50 py-16 mt-20">
<div class="text-green-700 font-serif text-2xl tracking-tighter uppercase">MAZ TERRENOS</div>
<div class="flex gap-12 text-[10px] font-sans font-bold uppercase tracking-widest text-slate-500">
<a class="hover:text-green-700 transition-colors" href="#">Privacidad</a>
<a class="hover:text-green-700 transition-colors" href="#">Términos</a>
<a class="hover:text-green-700 transition-colors" href="#">Sustentabilidad</a>
<a class="hover:text-green-700 transition-colors" href="#">Patrimonio</a>
</div>
<p class="text-[10px] text-slate-400 uppercase tracking-[0.2em]">© 2024 Maz Terrenos. Inversión consciente, legado natural.</p>
<div class="fixed bottom-10 right-10">
<button class="bg-on-surface text-white pl-8 pr-4 py-4 rounded-full flex items-center gap-6 shadow-2xl group hover:bg-primary transition-all duration-300">
<span class="text-xs font-bold uppercase tracking-[0.2em]">COMPRAR AHORA</span>
<span class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center group-hover:translate-x-1 transition-transform">
<span class="material-symbols-outlined text-sm">arrow_forward</span>
</span>
</button>
</div>
</footer>
</body></html>