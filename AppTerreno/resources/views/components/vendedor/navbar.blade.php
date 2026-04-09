<header class="fixed top-0 right-0 left-0 md:left-64 z-40 flex justify-between items-center px-4 md:px-8 h-16 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md border-b border-gray-200 dark:border-gray-800 shadow-sm transition-all duration-300">
    <div class="flex items-center w-full max-w-xl gap-3">
        <button id="mobile-menu-btn" class="md:hidden text-gray-500 hover:text-green-700 transition-colors">
            <span class="material-symbols-outlined">menu</span>
        </button>
        <div class="relative w-full">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">search</span>
            <form action="#" method="GET">
                <input name="query" class="w-full pl-10 pr-4 py-2 bg-slate-100 dark:bg-slate-800 border-none rounded-lg text-sm focus:ring-2 focus:ring-primary" placeholder="Buscar por propiedad o ID..." type="text">
            </form>
        </div>
    </div>
    <div class="flex items-center gap-6">
        <button class="relative text-gray-500 hover:text-green-700 transition-colors">
            <span class="material-symbols-outlined">notifications</span>
            <span class="absolute top-0 right-0 w-2 h-2 bg-error rounded-full border-2 border-white"></span>
        </button>
        <button class="text-gray-500 hover:text-green-700 transition-colors">
            <span class="material-symbols-outlined">help</span>
        </button>
        <div class="flex items-center gap-3 pl-6 border-l border-gray-200 dark:border-gray-800">
            @php
                $user = auth()->user();
                $nombreCorto = $user ? $user->nombre . ' ' . $user->apellido1 : 'Usuario';
                $iniciales = $user ? substr($user->nombre, 0, 1) . substr($user->apellido1, 0, 1) : 'U';
            @endphp
            <div class="text-right">
                <p class="text-sm font-bold text-gray-900 dark:text-gray-100">{{ $nombreCorto }}</p>
                <p class="text-xs text-gray-500">Vendedor</p>
            </div>
            @if($user && $user->foto)
                <img alt="Vendor Profile" class="w-10 h-10 rounded-full border border-gray-200 object-cover" src="{{ asset($user->foto) }}">
            @else
                <div class="w-10 h-10 rounded-full bg-slate-200 dark:bg-slate-700 flex items-center justify-center text-slate-600 dark:text-slate-300 font-bold uppercase border border-slate-300 dark:border-slate-600">
                    {{ $iniciales }}
                </div>
            @endif
        </div>
    </div>
</header>
