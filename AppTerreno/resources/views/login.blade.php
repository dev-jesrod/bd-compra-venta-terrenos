@extends('layouts.app')

@section('title', 'Maz Terrenos - Iniciar Sesión')

@php
$css_file = 'login';
@endphp

@section('content')
<main class="flex min-h-screen bg-white">
    <!-- Left Side: Background Image -->
    <div class="hidden lg:block lg:w-1/2 relative">
        <div class="absolute inset-0 bg-cover bg-center FondoLogin"></div>
    </div>

    <!-- Right Side: Login Form -->
    <div class=" w-full lg:w-1/2 flex flex-col justify-center items-center p-8 sm:p-12 lg:p-24">

        <div class="w-full max-w-md">
            <!-- Logo Section -->
            <div class="flex flex-col items-center mb-10">
                <div class="w-20 h-20 border-2 border-gray-400 rounded-full flex items-center justify-center mb-3">
                    <!-- Icon Placeholder -->
                    <svg class="w-10 h-10 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                </div>
                <h1 class="text-xl font-extrabold text-[#2ca030] tracking-wide uppercase">Maz Terrenos</h1>
            </div>

            <!-- Header Section -->
            <div class="mb-8">
                <h2 class="text-4xl font-extrabold text-[#2ca030] mb-3">Sign In</h2>
                <p class="text-gray-500 text-sm">Welcome back! Please enter your details to manage your properties.</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-800 mb-1.5">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus placeholder="name@company.com"
                            class="block w-full pl-10 pr-3 py-3 rounded-lg bg-gray-50 border-transparent focus:bg-white focus:border-[#2ca030] focus:ring-1 focus:ring-[#2ca030] transition-colors text-gray-900 border text-sm">
                    </div>
                    @error('email')
                    <span class="text-red-500 text-xs font-semibold mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label for="password" class="block text-sm font-semibold text-gray-800">Password</label>
                        <a href="#" class="text-sm font-bold text-[#2ca030] hover:underline">Forgot password?</a>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input type="password" name="password" id="password" required placeholder="••••••••"
                            class="block w-full pl-10 pr-10 py-3 rounded-lg bg-gray-50 border-transparent focus:bg-white focus:border-[#2ca030] focus:ring-1 focus:ring-[#2ca030] transition-colors text-gray-900 border text-sm">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <button type="button" id="toggle-password" class="text-gray-400 hover:text-gray-500 focus:outline-none">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="eye-icon">
                                    <!-- Eye icon -->
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    @error('password')
                    <span class="text-red-500 text-xs font-semibold mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center mt-4 mb-6">
                    <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 text-[#2ca030] bg-white border-gray-300 rounded focus:ring-[#2ca030]">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-600 font-medium">Remember me for 30 days</label>
                </div>

                <button type="submit" class="w-full bg-[#2ca030] hover:bg-[#238026] text-white font-bold py-3.5 px-4 rounded-xl transition duration-200 shadow-md">
                    Iniciar Sesión
                </button>
            </form>

            <div class="mt-8 flex justify-center items-center">
                <p class="text-sm text-gray-500 font-medium">
                    Don't have an account?
                </p>
                <a href="{{ route('registro') }}" class="ml-1 text-sm font-bold text-[#2ca030] hover:underline flex">
                    Sign up for <br class="hidden"> <span class="ml-1">free</span>
                </a>
            </div>

            <!-- Footer Links -->
            <div class="mt-16 flex justify-center space-x-6 text-xs text-gray-400 font-medium">
                <a href="#" class="hover:text-gray-600">Privacy Policy</a>
                <a href="#" class="hover:text-gray-600">Terms of Service</a>
                <a href="#" class="hover:text-gray-600">Help Center</a>
            </div>
        </div>
    </div>
</main>

<script>
    document.getElementById('toggle-password').addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        const icon = document.getElementById('eye-icon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />'; // Crossed eye
        } else {
            passwordInput.type = 'password';
            icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />'; // Normal eye
        }
    });
</script>
@endsection