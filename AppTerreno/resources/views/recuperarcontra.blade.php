@extends('layouts.app')

@section('title', 'Recuperar Contraseña - Maz Terrenos')

@push('css_file', 'recuperarcontra')

@section('content')
<main class="asymmetric-split overflow-hidden">
    <section class="hero-image relative hidden md:block">
        <div class="absolute inset-0 bg-primary/10 backdrop-blur-[2px] z-10"></div>
        <img alt="Luxury sustainable architecture" class="w-full h-full object-cover" data-alt="Modern sustainable villa" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBy144V-UrFkqiQlgvL2xRRpmQFmPvNff4tMa8ivFIGEjGb3eRGdhIsE6G5zJsntpyn_DoiEd9WSQENR9tOKLzuB7EokyKCd0ZANfUH9B_rUgCiHUPcRU4DQj5iMwIPLvgy_Fb8US8AGCujps685yt0SdqNnTLiZpookFVGEhgSdnWjy14_7vw7BAgVSt9m0lJOQ9Mi6qxLcU5tcOochq2WgJkhfuX3Yn7UxYyjy-FtVMDRuQRSWWCeQyOu8OJNffV56WNcn-lwtsaB"/>
        <div class="absolute bottom-12 left-12 z-20 max-w-md">
            <div class="bg-white/80 backdrop-blur-md p-8 rounded-xl shadow-lg border border-white/20">
                <h2 class="font-serif italic font-bold text-3xl text-primary leading-tight">
                    Fomentando el futuro de la tierra.
                </h2>
                <p class="mt-4 text-secondary leading-relaxed font-light">
                    Lideramos el camino hacia una inversión consciente, preservando el legado natural de cada terreno.
                </p>
            </div>
        </div>
    </section>

    <section class="flex items-center justify-center p-8 md:p-16 bg-surface">
        <div class="w-full max-w-md flex flex-col items-center">
            <header class="text-center mb-12">
                <img alt="Maz Terrenos Logo" class="w-20 h-20 rounded-full mx-auto mb-6 shadow-md border-2 border-white object-cover" data-alt="Logotipo de Maz Terrenos" src="https://lh3.googleusercontent.com/aida/ADBb0ujpuC5QXQNJQ0SXgcre5F1A4Derl9dtGgk4vUibTVLM6upvOHvaPXc7MfKp_8gqF0lrpPi40XxRjd4P6EN0WbmvLwR4d-JlalmEETu_tfZErjeGMxu5nZRXbMhcF50Ue-5GixhqggqHQo0CRQX67VVTIA0q44tgF1Ih-KHUdG9beSjOViZmq9PrvhyiSkteWHH3HRm6wru-VsjSWMK98VeKHuL3F9wUsqOZxO0IGs8ap4bBPGfRqoVWr2qZxWTHT15q0rVJ31ewTQ"/>
                <h1 class="font-serif italic font-bold text-4xl text-primary tracking-tight">
                    Maz Terrenos
                </h1>
                <p class="font-sans text-secondary mt-2 tracking-wide text-sm font-medium uppercase opacity-80">
                    Inversión consciente, legado natural
                </p>
            </header>

            <div class="w-full bg-white p-10 rounded-xl shadow-lg shadow-black/5 border border-gray-200">
                @csrf
                <div class="mb-8">
                    <h3 class="font-serif text-2xl font-bold text-primary text-center">Recuperar Contraseña</h3>
                    <p class="text-gray-600 text-sm mt-2 leading-relaxed text-center">
                        Ingresa tu correo electrónico para recibir las instrucciones de restablecimiento.
                    </p>
                </div>

                {{-- @dd($errors) --}}
                @if($errors->any())
                    <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                        <ul class="text-sm text-red-600">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- @dd(session('status')) --}}
                @if(session('status'))
                    <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-lg">
                        <p class="text-sm text-green-600">{{ session('status') }}</p>
                    </div>
                @endif

                {{-- Controlador: RecuperarContrasenaController --}}
                {{-- Ruta: Route::post('/recuperar-contrasena', [RecuperarContrasenaController::class, 'enviarEnlace'])->name('password.email'); --}}
                {{-- Metodo: enviarEnlace() --}}
                <form action="{{ route('password.email') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="space-y-2">
                        <label class="block text-xs font-bold uppercase tracking-widest text-gray-500 ml-1" for="email">
                            Correo Electrónico
                        </label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-gray-300">
                                mail
                            </span>
                            <input
                                class="w-full pl-12 pr-4 py-4 bg-gray-50 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 placeholder:text-gray-300 font-sans text-sm"
                                id="email"
                                name="email"
                                placeholder="correo@mazterrenos.com"
                                required
                                type="email"
                                value="{{ old('email') }}"
                            />
                        </div>
                    </div>

                    {{-- Controlador: RecuperarContrasenaController --}}
                    {{-- Metodo: enviarEnlace() -> send reset link --}}
                    <button
                        class="w-full py-4 bg-primary text-white font-sans font-bold rounded-xl shadow-lg shadow-primary/20 hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 flex justify-center items-center gap-3"
                        type="submit"
                    >
                        <span>Enviar Instrucciones</span>
                        <span class="material-symbols-outlined">
                            arrow_forward
                        </span>
                    </button>
                </form>

                <div class="mt-10 pt-6 border-t border-gray-200 text-center">
                    <a class="inline-flex items-center gap-2 text-sm font-semibold text-gray-500 hover:text-primary transition-colors duration-200 group" href="{{ route('login') }}">
                        <span class="material-symbols-outlined text-lg group-hover:-translate-x-1 transition-transform duration-200">
                            arrow_back
                        </span>
                        Volver al login
                    </a>
                </div>
            </div>

            <footer class="mt-12 flex flex-col items-center gap-4 text-center">
                <div class="flex items-center gap-2 text-gray-400">
                    <span class="material-symbols-outlined">
                        support_agent
                    </span>
                    <span class="text-xs font-medium uppercase tracking-widest">Soporte Técnico</span>
                </div>
                <p class="text-xs text-gray-500 max-w-xs">
                    Si tienes problemas para acceder, contacta al administrador de TI.
                </p>
            </footer>
        </div>
    </section>
</main>

<style>
    .asymmetric-split {
        display: grid;
        grid-template-columns: 1.2fr 0.8fr;
        min-height: 100vh;
    }
    @media (max-width: 768px) {
        .asymmetric-split {
            grid-template-columns: 1fr;
        }
        .hero-image {
            display: none;
        }
    }
</style>
@endsection