<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>AppTerreno - Iniciar Sesión</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    @vite(['resources/css/login.css', 'resources/js/tailwind-config.js'])
</head>
<body class="font-display bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 min-h-screen flex flex-col">
    <!-- Header -->
    <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-primary/10 px-6 md:px-10 py-3 bg-white dark:bg-background-dark">
        <div class="flex items-center gap-4 text-primary">
            <div class="size-8">
               <!-- Logo tipo -->
            </div>
            <h2 class="text-slate-900 dark:text-slate-100 text-xl font-black leading-tight tracking-tight">AppTerreno</h2>
        </div>
        <div class="flex items-center gap-4">
            <a class="text-sm font-semibold text-primary hover:text-primary/80" href="#">Centro de Ayuda</a>
            <button class="flex min-w-[84px] cursor-pointer items-center justify-center rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold leading-normal transition-all hover:bg-primary/90">
                Registrarse
            </button>
        </div>
    </header>

    <main class="flex-1 flex items-center justify-center relative px-4 py-12 md:py-20">
        <!-- Background Decoration -->
        <div class="absolute inset-0 z-0 opacity-10 pointer-events-none overflow-hidden">
            <div class="w-full h-full bg-cover bg-center bg-login-hero" data-alt="Vista aérea de exuberantes colinas verdes y tierras de cultivo"></div>
        </div>

        <!-- Login Card -->
        <div class="w-full max-w-md bg-white dark:bg-background-dark border border-primary/10 rounded-xl shadow-xl p-8 z-10">
            <div class="flex flex-col gap-2 mb-8">
                <h1 class="text-3xl font-black text-slate-900 dark:text-slate-100 tracking-tight">Bienvenido</h1>
                <p class="text-slate-500 dark:text-slate-400 text-base">Accede de forma segura a tu portafolio de inversión de terrenos.</p>
            </div>
            
            <form class="flex flex-col gap-5">
                <!-- Email Field -->
                <div class="flex flex-col gap-1.5">
                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-300" for="email">Correo Electrónico</label>
                    <input class="w-full px-4 py-3 rounded-lg border border-primary/20 bg-background-light dark:bg-background-dark focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all placeholder:text-slate-400 text-slate-900 dark:text-slate-100" id="email" placeholder="nombre@ejemplo.com" type="email" />
                </div>
                
                <!-- Password Field -->
                <div class="flex flex-col gap-1.5">
                    <div class="flex justify-between items-center">
                        <label class="text-sm font-semibold text-slate-700 dark:text-slate-300" for="password">Contraseña</label>
                        <a class="text-xs font-bold text-primary hover:underline" href="#">¿Olvidaste tu contraseña?</a>
                    </div>
                    <div class="relative">
                        <input class="w-full px-4 py-3 pr-10 rounded-lg border border-primary/20 bg-background-light dark:bg-background-dark focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all placeholder:text-slate-400 text-slate-900 dark:text-slate-100" id="password" placeholder="Ingresa tu contraseña" type="password" />
                        <button class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-primary flex items-center" type="button">
                            <span class="material-symbols-outlined text-[20px]">visibility</span>
                        </button>
                    </div>
                </div>
                
                <!-- Remember Me -->
                <div class="flex items-center gap-2">
                    <input class="w-4 h-4 rounded border-primary/20 text-primary focus:ring-primary cursor-pointer" id="remember" type="checkbox" />
                    <label class="text-sm text-slate-600 dark:text-slate-400 cursor-pointer select-none" for="remember">Recordar este dispositivo</label>
                </div>
                
                <!-- Login Button -->
                <button class="w-full bg-primary text-white font-bold py-3.5 rounded-lg shadow-md hover:bg-primary/90 transition-all active:scale-[0.98] mt-2" type="submit">
                    Iniciar Sesión
                </button>
                
                <!-- Divider -->
                <div class="flex items-center gap-4 my-2">
                    <div class="h-[1px] flex-1 bg-primary/10"></div>
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">O continuar con</span>
                    <div class="h-[1px] flex-1 bg-primary/10"></div>
                </div>
                
                <!-- Social Login -->
                <button class="w-full flex items-center justify-center gap-3 px-4 py-3 border border-primary/10 rounded-lg bg-white dark:bg-background-dark hover:bg-background-light dark:hover:bg-slate-800 transition-all font-semibold text-slate-700 dark:text-slate-300" type="button">
                    <svg class="w-5 h-5" viewBox="0 0 24 24">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"></path>
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"></path>
                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.27.81-.57z" fill="#FBBC05"></path>
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"></path>
                    </svg>
                    Google
                </button>
            </form>
            
            <p class="mt-8 text-center text-sm text-slate-500 dark:text-slate-400">
                ¿No tienes una cuenta?
                <a class="font-bold text-primary hover:underline" href="#">Empieza a invertir</a>
            </p>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white dark:bg-background-dark border-t border-primary/10 py-10 px-6 md:px-20">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-start md:items-center gap-8">
            <div class="flex flex-col gap-4">
                <div class="flex items-center gap-3 text-primary">
                    <div class="size-6">
                        <svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.8261 17.4264C16.7203 18.1174 20.2244 18.5217 24 18.5217C27.7756 18.5217 31.2797 18.1174 34.1739 17.4264C36.9144 16.7722 39.9967 15.2331 41.3563 14.1648L24.8486 40.6391C24.4571 41.267 23.5429 41.267 23.1514 40.6391L6.64374 14.1648C8.00331 15.2331 11.0856 16.7722 13.8261 17.4264Z" fill="currentColor"></path>
                        </svg>
                    </div>
                    <span class="text-slate-900 dark:text-slate-100 font-bold text-lg">AppTerreno</span>
                </div>
                <p class="text-sm text-slate-500 max-w-xs">Construyendo el futuro de la inversión en terrenos a través de la transparencia y la inteligencia geoespacial.</p>
            </div>
            
            <div class="flex flex-wrap gap-x-12 gap-y-6">
                <div class="flex flex-col gap-3">
                    <h4 class="text-xs font-black uppercase tracking-widest text-primary/60">Plataforma</h4>
                    <a class="text-sm text-slate-600 dark:text-slate-400 hover:text-primary transition-colors" href="#">Propiedades</a>
                    <a class="text-sm text-slate-600 dark:text-slate-400 hover:text-primary transition-colors" href="#">Cómo funciona</a>
                </div>
                <div class="flex flex-col gap-3">
                    <h4 class="text-xs font-black uppercase tracking-widest text-primary/60">Legal</h4>
                    <a class="text-sm text-slate-600 dark:text-slate-400 hover:text-primary transition-colors" href="#">Política de Privacidad</a>
                    <a class="text-sm text-slate-600 dark:text-slate-400 hover:text-primary transition-colors" href="#">Términos de Servicio</a>
                </div>
            </div>
            
            <div class="flex gap-4">
                <a class="p-2 bg-primary/10 rounded-full text-primary hover:bg-primary/20 transition-all" href="#">
                    <span class="material-symbols-outlined text-[20px]">public</span>
                </a>
                <a class="p-2 bg-primary/10 rounded-full text-primary hover:bg-primary/20 transition-all" href="#">
                    <span class="material-symbols-outlined text-[20px]">share</span>
                </a>
            </div>
        </div>
        
        <div class="max-w-7xl mx-auto mt-10 pt-6 border-t border-primary/5 flex flex-col md:flex-row justify-between text-xs text-slate-400 font-medium">
            <p>© 2024 AppTerreno Inc. Todos los derechos reservados.</p>
            <p>Hecho con amor por la Tierra.</p>
        </div>
    </footer>
</body>
</html>