<aside id="vendedor-sidebar"
    class="fixed left-0 top-0 h-full flex flex-col bg-slate-50 dark:bg-slate-950 border-r border-gray-200 dark:border-gray-800 w-64 z-50 transition-transform duration-300 -translate-x-full md:translate-x-0">
    <div class="p-6 flex items-center gap-3">
        <div
            class="w-10 h-10 bg-primary-container rounded-lg flex items-center justify-center text-white font-black text-xl">
            M</div>
        <div>
            <h1 class="text-xl font-black text-green-700 dark:text-green-400 leading-none">MAZ TERRENOS</h1>
            <p class="text-xs text-gray-500 font-medium">Vendor Management</p>
        </div>
    </div>
    <nav class="flex-1 px-4 mt-4 space-y-1">
        <a class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('vendedor.dashboard') ? 'text-green-700 dark:text-green-400 bg-green-50 dark:bg-green-900/20 border-r-4 border-green-700 dark:border-green-400' : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800' }} transition-colors font-medium text-sm rounded-lg"
            href="{{ route('vendedor.dashboard') }}">
            <span class="material-symbols-outlined">dashboard</span>
            Dashboard
        </a>
        <a class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('vendedor.terrenos.index') ? 'text-green-700 dark:text-green-400 bg-green-50 dark:bg-green-900/20 border-r-4 border-green-700 dark:border-green-400' : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800' }} transition-colors font-medium text-sm rounded-lg"
            href="{{ route('vendedor.terrenos.index') }}">
            <span class="material-symbols-outlined">landscape</span>
            Mis Propiedades
        </a>
        <a class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('vendedor.terrenos.create') ? 'text-green-700 dark:text-green-400 bg-green-50 dark:bg-green-900/20 border-r-4 border-green-700 dark:border-green-400' : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800' }} transition-colors font-medium text-sm rounded-lg"
            href="{{ route('vendedor.terrenos.create') }}">
            <span class="material-symbols-outlined">add_circle</span>
            Publicar Terreno
        </a>
        <a class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('vendedor.leads.index') ? 'text-green-700 dark:text-green-400 bg-green-50 dark:bg-green-900/20 border-r-4 border-green-700 dark:border-green-400' : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800' }} transition-colors font-medium text-sm rounded-lg"
            href="{{ route('vendedor.leads.index') }}">
            <span class="material-symbols-outlined">forum</span>
            Leads y Mensajes
        </a>
        <a class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('vendedor.documentos.index') ? 'text-green-700 dark:text-green-400 bg-green-50 dark:bg-green-900/20 border-r-4 border-green-700 dark:border-green-400' : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800' }} transition-colors font-medium text-sm rounded-lg"
            href="{{ route('vendedor.documentos.index') }}">
            <span class="material-symbols-outlined">verified_user</span>
            Mis documentos
        </a>
        <div class="p-4 border-t border-gray-200 dark:border-gray-800">
            <button
                class="w-full flex items-center justify-center gap-2 bg-primary-container text-on-primary-container py-3 rounded-lg font-bold text-sm transition-transform active:scale-95">
                <span class="material-symbols-outlined">support_agent</span>
                Soporte Técnico
            </button>
        </div>
</aside>