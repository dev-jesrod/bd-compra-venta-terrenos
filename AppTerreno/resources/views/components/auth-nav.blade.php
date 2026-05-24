{{-- 
    Componente compartido: Sección de autenticación del nav.
    Usada en layouts/app.blade.php y layouts/vendedor.blade.php.
    
    - Sin sesión: muestra "Iniciar Sesión" y "Registrarse"
    - Con sesión: muestra foto/placeholder gris + nombre + botón "Salir"
--}}
@php
    $user = auth()->user();
    $iniciales = '';
    if ($user) {
        $iniciales = strtoupper(substr($user->nombre ?? 'U', 0, 1) . substr($user->apellido1 ?? '', 0, 1));
    }
@endphp

@auth
    <div class="flex items-center gap-4">
        {{-- Card de perfil --}}
        <div class="flex items-center gap-3">
            @if($user && $user->foto)
                <img 
                    src="{{ asset($user->foto) }}" 
                    alt="Foto de perfil"
                    class="w-9 h-9 rounded-full object-cover border-2 border-gray-200"
                >
            @else
                <div class="w-9 h-9 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 font-bold text-sm border-2 border-gray-300 select-none">
                    {{ $iniciales ?: '?' }}
                </div>
            @endif
            <span class="text-gray-800 font-bold text-sm hidden md:inline leading-tight">
                {{ $user->nombre ?? 'Usuario' }}
            </span>
        </div>

        {{-- Botón de cerrar sesión --}}
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button 
                type="submit"
                class="text-gray-500 hover:text-red-600 transition-colors text-sm font-bold"
            >
                Salir
            </button>
        </form>
    </div>
@else
    <div class="flex items-center gap-4 text-sm font-bold">
        <a href="{{ route('login') }}" class="text-gray-700 hover:text-green-600 transition-colors">
            Iniciar Sesión
        </a>
        <a href="{{ route('registro') }}"
            class="bg-green-700 hover:bg-green-800 text-white px-5 py-2.5 rounded-lg transition-colors">
            Registrarse
        </a>
    </div>
@endauth
