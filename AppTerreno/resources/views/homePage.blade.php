<!DOCTYPE html>
<html class="light" lang="es">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>AppTerreno - Encuentra tu Pedazo de Tierra</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    @vite(['resources/css/homePage.css', 'resources/js/tailwind-config.js'])
</head>
<body class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-slate-100 transition-colors duration-300">
    <div class="relative flex min-h-screen w-full flex-col overflow-x-hidden">
        <div class="layout-container flex h-full grow flex-col">
            <!-- Navigation Header -->
            <header class="flex items-center justify-between border-b border-primary/10 bg-white/80 dark:bg-background-dark/80 backdrop-blur-md sticky top-0 z-50 px-6 md:px-20 py-4">
                <div class="flex items-center gap-10">
                    <div class="flex items-center gap-2 text-primary">
                        <span class="material-symbols-outlined text-3xl font-bold">landscape</span>
                        <h2 class="text-xl font-bold leading-tight tracking-tight">AppTerreno</h2>
                    </div>
                    <nav class="hidden md:flex items-center gap-8">
                        <a class="text-sm font-semibold hover:text-primary transition-colors" href="#">Comprar Terreno</a>
                        <a class="text-sm font-semibold hover:text-primary transition-colors" href="#">Vender Propiedad</a>
                        <a class="text-sm font-semibold hover:text-primary transition-colors" href="#">Inversiones Conjuntas</a>
                        <a class="text-sm font-semibold hover:text-primary transition-colors" href="#">Recursos</a>
                    </nav>
                </div>
                <div class="flex items-center gap-4">
                    <button class="hidden lg:flex items-center gap-2 px-4 py-2 text-sm font-bold text-primary hover:bg-primary/5 rounded-lg transition-colors">
                        <span class="material-symbols-outlined text-[20px]">language</span>
                        ES
                    </button>
                    <a href="/login" class="flex items-center justify-center rounded-full bg-primary p-2 text-white hover:bg-primary/90 transition-all">
                        <span class="material-symbols-outlined">person</span>
                    </a>
                </div>
            </header>

            <main class="flex flex-1 flex-col px-6 md:px-20 py-8 max-w-7xl mx-auto w-full">
                <!-- Hero & Search Section -->
                <div class="flex flex-col gap-6 mb-10">
                    <div class="max-w-2xl">
                        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-slate-900 dark:text-white mb-4">
                            Encuentra tu pedazo de <span class="text-primary text-transparent bg-clip-text bg-gradient-to-r from-primary to-green-700">Tierra.</span>
                        </h1>
                        <p class="text-lg text-slate-600 dark:text-slate-400">
                            La plataforma más confiable para comprar y vender terrenos verificados a nivel global. Transacciones seguras, valuación experta.
                        </p>
                    </div>
                    <div class="w-full bg-white dark:bg-slate-800 p-2 rounded-xl shadow-xl shadow-primary/5 border border-primary/10">
                        <div class="flex flex-col md:flex-row gap-2">
                            <div class="flex-1 flex items-center px-4 bg-background-light dark:bg-slate-900 rounded-lg group border border-transparent focus-within:border-primary/30">
                                <span class="material-symbols-outlined text-primary/60">search</span>
                                <input class="w-full bg-transparent border-none focus:ring-0 text-slate-900 dark:text-white placeholder:text-slate-400 py-3" placeholder="Buscar por ciudad, estado, o tipo de propiedad..." type="text" />
                            </div>
                            <div class="flex items-center px-4 bg-background-light dark:bg-slate-900 rounded-lg min-w-[180px]">
                                <span class="material-symbols-outlined text-primary/60 mr-2">location_on</span>
                                <select class="w-full bg-transparent border-none focus:ring-0 text-sm font-medium">
                                    <option>Todas las Regiones</option>
                                    <option>Norteamérica</option>
                                    <option>Europa</option>
                                    <option>Asia Pacífico</option>
                                </select>
                            </div>
                            <button class="bg-primary text-white px-8 py-3 rounded-lg font-bold hover:brightness-110 transition-all shadow-lg shadow-primary/20">
                                Buscar Propiedades
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Category Filters -->
                <div class="flex gap-3 pb-8 overflow-x-auto no-scrollbar">
                    <button class="flex items-center gap-2 px-5 py-2.5 rounded-full bg-primary text-white text-sm font-semibold whitespace-nowrap">
                        <span class="material-symbols-outlined text-[20px]">grid_view</span>
                        Todos los Terrenos
                    </button>
                    <button class="flex items-center gap-2 px-5 py-2.5 rounded-full bg-white dark:bg-slate-800 border border-primary/10 hover:border-primary/40 transition-colors text-sm font-semibold whitespace-nowrap">
                        <span class="material-symbols-outlined text-[20px]">potted_plant</span>
                        Agrícola
                    </button>
                    <button class="flex items-center gap-2 px-5 py-2.5 rounded-full bg-white dark:bg-slate-800 border border-primary/10 hover:border-primary/40 transition-colors text-sm font-semibold whitespace-nowrap">
                        <span class="material-symbols-outlined text-[20px]">home_work</span>
                        Residencial
                    </button>
                    <button class="flex items-center gap-2 px-5 py-2.5 rounded-full bg-white dark:bg-slate-800 border border-primary/10 hover:border-primary/40 transition-colors text-sm font-semibold whitespace-nowrap">
                        <span class="material-symbols-outlined text-[20px]">factory</span>
                        Industrial
                    </button>
                    <button class="flex items-center gap-2 px-5 py-2.5 rounded-full bg-white dark:bg-slate-800 border border-primary/10 hover:border-primary/40 transition-colors text-sm font-semibold whitespace-nowrap">
                        <span class="material-symbols-outlined text-[20px]">forest</span>
                        Conservación
                    </button>
                    <button class="flex items-center gap-2 px-5 py-2.5 rounded-full bg-white dark:bg-slate-800 border border-primary/10 hover:border-primary/40 transition-colors text-sm font-semibold whitespace-nowrap">
                        <span class="material-symbols-outlined text-[20px]">beach_access</span>
                        Frente al Agua
                    </button>
                </div>

                <!-- Listings Grid Header -->
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Propiedades Destacadas</h2>
                    <div class="flex items-center gap-2 text-primary font-semibold text-sm cursor-pointer hover:underline">
                        Ver todas las 1,248 propiedades
                        <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                    </div>
                </div>

                <!-- Listings Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    <!-- Card 1 -->
                    <div class="group flex flex-col bg-white dark:bg-slate-800 rounded-xl overflow-hidden border border-primary/5 hover:border-primary/20 hover:shadow-2xl hover:shadow-primary/10 transition-all duration-300">
                        <div class="relative aspect-[4/3] overflow-hidden">
                            <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" data-alt="Expansive green agricultural rolling hills landscape" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBUVc23ZBgPPq0hp9Mu2e0Ex2p7MVdE4yCEaglX7x_Ft9cIOqtySfyoJR1NphYRKLsLnpfap62xcUCcCbIYQ1bxefXx9pEtJWCUR8-oTn721DPd0w_Hr4J93QYjl7s2F_hQJI_2IG9sHNHrekqL3XpCv7WsqsIfbEe7sN4UgPb3Wgz2sdbCs9ujL7cQFDNZqfzuHeHVC4AS8Zut3fcddiGUVgFTAo8Vwaj8S_EwwuZM80Uhj8yDEfZvOTs_6hnKzofX0CZls6CqG7U" />
                            <div class="absolute top-3 left-3 flex gap-2">
                                <span class="bg-primary/90 backdrop-blur-sm text-white text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded">Nuevo</span>
                            </div>
                            <div class="absolute top-3 right-3">
                                <button class="size-8 rounded-full bg-white/20 backdrop-blur-md text-white hover:bg-white hover:text-primary transition-colors flex items-center justify-center">
                                    <span class="material-symbols-outlined text-[20px]">favorite</span>
                                </button>
                            </div>
                        </div>
                        <div class="p-5 flex flex-col gap-3">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-2xl font-bold text-slate-900 dark:text-white">$450,000</p>
                                    <p class="text-xs font-semibold text-primary uppercase">$45 / m²</p>
                                </div>
                                <div class="flex items-center gap-1 px-2 py-1 bg-green-50 dark:bg-primary/10 border border-primary/20 rounded text-primary">
                                    <span class="material-symbols-outlined text-[16px] font-bold">verified</span>
                                    <span class="text-[10px] font-bold uppercase">Verificado</span>
                                </div>
                            </div>
                            <div class="space-y-1">
                                <p class="flex items-center text-sm font-medium text-slate-700 dark:text-slate-300">
                                    <span class="material-symbols-outlined text-[18px] mr-1 text-primary">location_on</span>
                                    Austin, TX
                                </p>
                                <p class="flex items-center text-sm text-slate-500 dark:text-slate-400">
                                    <span class="material-symbols-outlined text-[18px] mr-1 text-primary">square_foot</span>
                                    10,000 m² • Agrícola
                                </p>
                            </div>
                            <button class="mt-2 w-full py-2 bg-background-light dark:bg-slate-900 text-slate-900 dark:text-white font-bold rounded-lg border border-primary/5 hover:bg-primary hover:text-white transition-all">
                                Ver Detalles
                            </button>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="group flex flex-col bg-white dark:bg-slate-800 rounded-xl overflow-hidden border border-primary/5 hover:border-primary/20 hover:shadow-2xl hover:shadow-primary/10 transition-all duration-300">
                        <div class="relative aspect-[4/3] overflow-hidden">
                            <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" data-alt="Lush tropical coastal land near the ocean" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC0FjV8v6e_KnNI8VXd2k3aJCDBReKQJ_R3_McFTx5sC96aLWahySlDWYJief2kkucc9weviSPU4wenFkkrZNON5Rm-9KfrTSbeZ9kITX3gCW5CjW8f0HmQJ9KJW_pewow1bcF0ZUhVp7gtLFm9QdNE4HvV27VV_g_NUXELhzJ1w4cTGO8wtL2e8o_bycro9PVUAjhLS3Mh1KFC4xUJLAWCRdJZ2sulWVdHpeO4g3VgO_XZlSyloyaIixgZXA--UB7XZ2X5mEZ7YfI" />
                            <div class="absolute top-3 right-3">
                                <button class="size-8 rounded-full bg-white/20 backdrop-blur-md text-white hover:bg-white hover:text-primary transition-colors flex items-center justify-center">
                                    <span class="material-symbols-outlined text-[20px]">favorite</span>
                                </button>
                            </div>
                        </div>
                        <div class="p-5 flex flex-col gap-3">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-2xl font-bold text-slate-900 dark:text-white">$1,200,000</p>
                                    <p class="text-xs font-semibold text-primary uppercase">$120 / m²</p>
                                </div>
                                <div class="flex items-center gap-1 px-2 py-1 bg-green-50 dark:bg-primary/10 border border-primary/20 rounded text-primary">
                                    <span class="material-symbols-outlined text-[16px] font-bold">verified</span>
                                    <span class="text-[10px] font-bold uppercase">Verificado</span>
                                </div>
                            </div>
                            <div class="space-y-1">
                                <p class="flex items-center text-sm font-medium text-slate-700 dark:text-slate-300">
                                    <span class="material-symbols-outlined text-[18px] mr-1 text-primary">location_on</span>
                                    Miami, FL
                                </p>
                                <p class="flex items-center text-sm text-slate-500 dark:text-slate-400">
                                    <span class="material-symbols-outlined text-[18px] mr-1 text-primary">square_foot</span>
                                    10,000 m² • Industrial
                                </p>
                            </div>
                            <button class="mt-2 w-full py-2 bg-background-light dark:bg-slate-900 text-slate-900 dark:text-white font-bold rounded-lg border border-primary/5 hover:bg-primary hover:text-white transition-all">
                                Ver Detalles
                            </button>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="group flex flex-col bg-white dark:bg-slate-800 rounded-xl overflow-hidden border border-primary/5 hover:border-primary/20 hover:shadow-2xl hover:shadow-primary/10 transition-all duration-300">
                        <div class="relative aspect-[4/3] overflow-hidden">
                            <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" data-alt="Dense pine forest with mountain background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDbs9h6WsIfePAwHgHaY373qgKuPKI8EV85IA86XEpebd5kQBuOP_EzpaxEapyqukYyPfF4J74N95B9x7B4PhUDpehQXkfqWQlopOVJybv7uhrUZ0Rhv93FJtdYhs2BPINU206oReoRxU3tCWqvf0Hpq7P0oON2Gvi-CAh-n7lLfoF1v_FZrZffsxVbDKDCuIjHuYXXon2g-Cf6sH6CzudGLEPQyTR5XpkKvGiVIG3_OOa4XmfnYW4O4dDtOHiaY8AobTxNWWNTL4M" />
                            <div class="absolute top-3 right-3">
                                <button class="size-8 rounded-full bg-white/20 backdrop-blur-md text-white hover:bg-white hover:text-primary transition-colors flex items-center justify-center">
                                    <span class="material-symbols-outlined text-[20px]">favorite</span>
                                </button>
                            </div>
                        </div>
                        <div class="p-5 flex flex-col gap-3">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-2xl font-bold text-slate-900 dark:text-white">$85,000</p>
                                    <p class="text-xs font-semibold text-primary uppercase">$8.5 / m²</p>
                                </div>
                                <div class="flex items-center gap-1 px-2 py-1 bg-green-50 dark:bg-primary/10 border border-primary/20 rounded text-primary">
                                    <span class="material-symbols-outlined text-[16px] font-bold">verified</span>
                                    <span class="text-[10px] font-bold uppercase">Verificado</span>
                                </div>
                            </div>
                            <div class="space-y-1">
                                <p class="flex items-center text-sm font-medium text-slate-700 dark:text-slate-300">
                                    <span class="material-symbols-outlined text-[18px] mr-1 text-primary">location_on</span>
                                    Boise, ID
                                </p>
                                <p class="flex items-center text-sm text-slate-500 dark:text-slate-400">
                                    <span class="material-symbols-outlined text-[18px] mr-1 text-primary">square_foot</span>
                                    10,000 m² • Agrícola
                                </p>
                            </div>
                            <button class="mt-2 w-full py-2 bg-background-light dark:bg-slate-900 text-slate-900 dark:text-white font-bold rounded-lg border border-primary/5 hover:bg-primary hover:text-white transition-all">
                                Ver Detalles
                            </button>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="group flex flex-col bg-white dark:bg-slate-800 rounded-xl overflow-hidden border border-primary/5 hover:border-primary/20 hover:shadow-2xl hover:shadow-primary/10 transition-all duration-300">
                        <div class="relative aspect-[4/3] overflow-hidden">
                            <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" data-alt="Sunlight filtering through forest trees" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDpmXSRc8DpcAVlcywnWRif4fzeO_wNzCM7DSpbkwUHzJmXf8gq6mrrJPMhcV8GNSC8KQTne3450vtWR89UlLI2rlrEUI1EDmOwOb5zMSX4KwbhfKbOyQoE8m2of4mkdmVkH55xWX3eWiDXWHpWBOi9FpdiCq7wMS3yPqH_q5qoaHVl77dv2hjxB_evPkZADB6bhaJMfwUL0m5jHCnxRrp0Q6slQiO1yYQRUS7q0C28e7n9pnheEPa9chqn1G8ASSF_eUgsMqMG4O8" />
                            <div class="absolute top-3 right-3">
                                <button class="size-8 rounded-full bg-white/20 backdrop-blur-md text-white hover:bg-white hover:text-primary transition-colors flex items-center justify-center">
                                    <span class="material-symbols-outlined text-[20px]">favorite</span>
                                </button>
                            </div>
                        </div>
                        <div class="p-5 flex flex-col gap-3">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-2xl font-bold text-slate-900 dark:text-white">$320,000</p>
                                    <p class="text-xs font-semibold text-primary uppercase">$64 / m²</p>
                                </div>
                                <div class="flex items-center gap-1 px-2 py-1 bg-green-50 dark:bg-primary/10 border border-primary/20 rounded text-primary">
                                    <span class="material-symbols-outlined text-[16px] font-bold">verified</span>
                                    <span class="text-[10px] font-bold uppercase">Verificado</span>
                                </div>
                            </div>
                            <div class="space-y-1">
                                <p class="flex items-center text-sm font-medium text-slate-700 dark:text-slate-300">
                                    <span class="material-symbols-outlined text-[18px] mr-1 text-primary">location_on</span>
                                    Denver, CO
                                </p>
                                <p class="flex items-center text-sm text-slate-500 dark:text-slate-400">
                                    <span class="material-symbols-outlined text-[18px] mr-1 text-primary">square_foot</span>
                                    5,000 m² • Residencial
                                </p>
                            </div>
                            <button class="mt-2 w-full py-2 bg-background-light dark:bg-slate-900 text-slate-900 dark:text-white font-bold rounded-lg border border-primary/5 hover:bg-primary hover:text-white transition-all">
                                Ver Detalles
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Call to Action Section -->
                <div class="mt-20 relative overflow-hidden rounded-2xl bg-primary px-8 py-12 text-center text-white">
                    <div class="absolute inset-0 opacity-10 bg-cta-hero"></div>
                    <div class="relative z-10 max-w-2xl mx-auto space-y-6">
                        <h2 class="text-3xl font-bold">¿Listo para vender tu terreno?</h2>
                        <p class="text-primary/10 bg-white/10 p-4 rounded-lg inline-block text-slate-100 backdrop-blur-sm">
                            Únete a miles de propietarios que listan su propiedad con el mercado verificado de AppTerreno.
                        </p>
                        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
                            <button class="w-full sm:w-auto px-10 py-4 bg-white text-primary font-bold rounded-xl shadow-xl hover:scale-105 transition-transform">
                                Listar Tu Propiedad
                            </button>
                            <button class="w-full sm:w-auto px-10 py-4 bg-primary border-2 border-white/30 text-white font-bold rounded-xl hover:bg-white/10 transition-colors">
                                Hablar con un Experto
                            </button>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <footer class="bg-white dark:bg-slate-900 border-t border-primary/5 pt-16 pb-8 px-6 md:px-20 mt-20">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-8 mb-12">
                    <div class="col-span-2 lg:col-span-1">
                        <h2 class="text-xl font-bold leading-tight tracking-tight text-primary mb-4">AppTerreno</h2>
                        <p class="text-sm text-slate-500 dark:text-slate-400 mb-6">
                            Construyendo el futuro de la inversión en terrenos a través de la transparencia y la inteligencia geoespacial.
                        </p>
                    </div>

                    <div class="flex flex-col gap-4">
                        <h4 class="font-bold text-slate-900 dark:text-white">Explorar</h4>
                        <a class="text-sm text-slate-500 hover:text-primary transition-colors" href="#">Todos los Terrenos</a>
                        <a class="text-sm text-slate-500 hover:text-primary transition-colors" href="#">Terrenos Comerciales</a>
                        <a class="text-sm text-slate-500 hover:text-primary transition-colors" href="#">Terrenos Agrícolas</a>
                        <a class="text-sm text-slate-500 hover:text-primary transition-colors" href="#">Lotes Residenciales</a>
                    </div>

                    <div class="flex flex-col gap-4">
                        <h4 class="font-bold text-slate-900 dark:text-white">Compañía</h4>
                        <a class="text-sm text-slate-500 hover:text-primary transition-colors" href="#">Sobre Nosotros</a>
                        <a class="text-sm text-slate-500 hover:text-primary transition-colors" href="#">Carreras</a>
                        <a class="text-sm text-slate-500 hover:text-primary transition-colors" href="#">Prensa</a>
                        <a class="text-sm text-slate-500 hover:text-primary transition-colors" href="#">Contacto</a>
                    </div>

                    <div class="flex flex-col gap-4">
                        <h4 class="font-bold text-slate-900 dark:text-white">Recursos</h4>
                        <a class="text-sm text-slate-500 hover:text-primary transition-colors" href="#">Blog</a>
                        <a class="text-sm text-slate-500 hover:text-primary transition-colors" href="#">Guía para Compradores</a>
                        <a class="text-sm text-slate-500 hover:text-primary transition-colors" href="#">Guía para Vendedores</a>
                        <a class="text-sm text-slate-500 hover:text-primary transition-colors" href="#">Tendencias del Mercado</a>
                    </div>

                    <div class="col-span-2 md:col-span-4 lg:col-span-1 flex flex-col gap-4">
                        <h4 class="font-bold text-slate-900 dark:text-white">Suscríbete</h4>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Recibe las últimas noticias y ofertas de propiedades.</p>
                        <div class="flex gap-2">
                            <input class="w-full bg-background-light dark:bg-slate-800 border-primary/10 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-slate-900 dark:text-white placeholder:text-slate-400 px-4 py-2 text-sm" placeholder="Tu correo electrónico" type="email" />
                            <button class="bg-primary hover:bg-primary/90 text-white rounded-lg px-4 transition-colors">
                                <span class="material-symbols-outlined text-[20px]">send</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="pt-8 border-t border-primary/5 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-slate-400">
                    <p>© 2024 AppTerreno Plataforma Inmobiliaria. Todos los derechos reservados.</p>
                    <div class="flex gap-6">
                        <a class="hover:text-primary transition-colors" href="#">Términos de Servicio</a>
                        <a class="hover:text-primary transition-colors" href="#">Política de Privacidad</a>
                        <a class="hover:text-primary transition-colors" href="#">Cookies</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>