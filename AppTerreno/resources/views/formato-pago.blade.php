{{--
    Archivo: formato-pago.blade.php
    Descripción: Vista de formato de pago para terrenos
    Controlador: PagoController
    - show() -> GET /formato-pago (pasa datos del terreno, precios, etc.)
    - process() -> POST /formato-pago (procesa el pago)
    
    Variables esperadas desde PagoController:
    - $logo_src (string) - URL del logo
    - $company_name (string)
    - $hero_image (string) - URL de la imagen del terreno
    - $property_title (string) - Nombre del terreno
    - $property_subtitle (string) - Descripción breve
    - $land_price (string) - Precio del terreno
    - $admin_fee (string) - Gasto administrativo
    - $iva (string) - Impuestos
    - $total (string) - Total a pagar
    - $payment_title (string) - Título del formulario
    - $payment_subtitle (string) - Subtítulo del formulario
    - $card_label (string)
    - $transfer_label (string)
    - $confirm_text (string)
    - $terms_text (string)
    - $year (int) - Año actual
--}}

@extends('layouts.app')

@section('title', 'Formato de Pago - ' . ($company_name ?? 'Maz Terrenos'))

@section('styles')
    <link href="{{ asset('css/formato-pago.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- Top Branding Header -->
    <div class="sticky top-0 z-50 glass-header w-full border-b border-outline-variant/10 shadow-sm bg-white/95 backdrop-blur-md">
        <div class="max-w-screen-2xl mx-auto flex items-center justify-center py-4 px-8">
            <img alt="Maz Terrenos Logo" class="w-10 h-10 rounded-full object-cover border-2 border-primary mr-3" src="{{ $logo_src ?? '/views/iconov6.png' }}"/>
            <span class="text-2xl font-serif text-primary tracking-tighter italic font-bold">{{ $company_name ?? 'Maz Terrenos' }}</span>
        </div>
    </div>

    <!-- Main Content Area -->
    <main class="max-w-5xl mx-auto px-6 py-12 md:py-20">
        <!-- Asymmetric Layout Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            
            <!-- Summary Column (Order Summary) -->
            <div class="lg:col-span-5 space-y-8">
                <!-- Image Wrapper -->
                <div class="group overflow-hidden rounded-3xl border border-outline-variant/15 shadow-md hover:shadow-lg transition-shadow duration-300">
                    <img class="w-full aspect-[4/3] object-cover transition-transform duration-500 group-hover:scale-105" 
                         alt="{{ $property_title ?? 'Imagen del terreno' }}" 
                         src="{{ $hero_image ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuBZWFaiYtFve4IAmS9RIGCoHdLYtP8C2u1u5zRr7yQtr5mxkEFVo5gNXrQAYI-hQHzj9GJHkuoezKHbnttSwz9RXluivky8D2JUzE8gItCqYAWgpm866s03cT9WMVli55H6E3oJ1W3YU9wgGD56ovpm_1jZ-JnLcrKhxyrwGHN-oh4YOeXY8gWxn9yYnpNGc_6T_gxGcwK3WTRFCo8lM6W4HPII2ermXCekA0R6Ua-XyvNhd2PKtKkVHvYmINJET8DWSJvC3lkqNmWO' }}" />
                </div>

                <!-- Text Header Details -->
                <div class="space-y-4">
                    <span class="label-md uppercase tracking-[0.2em] text-primary font-bold text-[10px] bg-primary/10 px-3 py-1 rounded-full">{{ $badge_text ?? 'Inversión Consciente' }}</span>
                    <h2 class="text-4xl font-body text-[#228B22] leading-tight font-semibold">{{ $property_title ?? 'Reserva Natural San Mateo' }}</h2>
                    <p class="text-on-surface-variant font-body text-sm leading-relaxed">{{ $property_subtitle ?? 'Lote Residencial Premium • 450m² • Ubicación Privilegiada' }}</p>
                </div>

                <!-- Price Breakdown Container -->
                <div class="bg-surface-container-low p-8 rounded-2xl border border-outline-variant/10 space-y-6">
                    <h3 class="text-xl font-serif italic border-b border-outline-variant/30 pb-4 text-slate-800">{{ $breakdown_title ?? 'Desglose de Pago' }}</h3>
                    <div class="space-y-3 font-body text-sm">
                        <div class="flex justify-between text-on-surface-variant">
                            <span class="text-slate-600">{{ $land_label ?? 'Precio del Terreno' }}</span>
                            <span class="font-medium text-slate-800">{{ $land_price ?? '$1,250,000.00 MXN' }}</span>
                        </div>
                        <div class="flex justify-between text-on-surface-variant">
                            <span class="text-slate-600">{{ $admin_label ?? 'Gasto Administrativo' }}</span>
                            <span class="font-medium text-slate-800">{{ $admin_fee ?? '$15,000.00 MXN' }}</span>
                        </div>
                        <div class="flex justify-between text-on-surface-variant">
                            <span class="text-slate-600">{{ $iva_label ?? 'Impuestos (IVA)' }}</span>
                            <span class="font-medium text-slate-800">{{ $iva ?? '$2,400.00 MXN' }}</span>
                        </div>
                        <div class="pt-4 mt-4 border-t border-outline-variant/30 flex justify-between items-baseline">
                            <span class="text-lg font-bold text-slate-900">{{ $total_label ?? 'Total a Pagar' }}</span>
                            <span class="text-2xl font-serif text-primary font-bold">{{ $total ?? '$1,267,400.00 MXN' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Form Column -->
            <div class="lg:col-span-7 bg-surface-container-lowest p-8 md:p-12 rounded-2xl shadow-[0_24px_48px_-12px_rgba(25,28,32,0.06)] border border-outline-variant/10">
                <div class="space-y-10">
                    <div class="text-center md:text-left">
                        <h1 class="text-3xl font-body text-[#228B22] font-semibold">{{ $payment_title ?? 'Finalizar Pago' }}</h1>
                        <p class="text-on-surface-variant mt-2 text-sm">{{ $payment_subtitle ?? 'Seleccione su método de pago preferido para asegurar su patrimonio.' }}</p>
                    </div>

                    <!-- Payment Method Toggle -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        <label class="flex-1 cursor-pointer group">
                            <input checked="" class="sr-only peer" name="payment_method" type="radio" value="card"/>
                            <div class="flex items-center justify-center p-4 border-2 border-surface-container-highest rounded-xl bg-surface peer-checked:border-primary peer-checked:bg-primary/5 transition-all duration-200">
                                <span class="material-symbols-outlined mr-2 text-primary">credit_card</span>
                                <span class="font-bold text-sm text-slate-700 peer-checked:text-primary">{{ $card_label ?? 'Tarjeta' }}</span>
                            </div>
                        </label>
                        <label class="flex-1 cursor-pointer group">
                            <input class="sr-only peer" name="payment_method" type="radio" value="transfer"/>
                            <div class="flex items-center justify-center p-4 border-2 border-surface-container-highest rounded-xl bg-surface peer-checked:border-primary peer-checked:bg-primary/5 transition-all duration-200">
                                <span class="material-symbols-outlined mr-2 text-primary">account_balance</span>
                                <span class="font-bold text-sm text-slate-700 peer-checked:text-primary">{{ $transfer_label ?? 'Transferencia' }}</span>
                            </div>
                        </label>
                    </div>

                    <!-- Payment Form Details -->
                    <form method="POST" action="{{ route('formato.pago') }}" class="space-y-6">
                        @csrf
                        
                        <div class="space-y-2">
                            <label class="text-[10px] uppercase tracking-widest font-bold text-on-surface-variant ml-1">{{ $card_name_label ?? 'Nombre en la Tarjeta' }}</label>
                            <input class="w-full bg-surface-container-low border-b-2 border-outline-variant/30 focus:border-primary focus:ring-0 transition-colors p-4 rounded-t-lg placeholder:text-slate-400 text-sm" 
                                   name="card_name" 
                                   placeholder="{{ $card_name_placeholder ?? 'Como aparece en el plástico' }}" 
                                   type="text" />
                        </div>
                        
                        <div class="space-y-2">
                            <label class="text-[10px] uppercase tracking-widest font-bold text-on-surface-variant ml-1">{{ $card_number_label ?? 'Número de Tarjeta' }}</label>
                            <div class="relative">
                                <input class="w-full bg-surface-container-low border-b-2 border-outline-variant/30 focus:border-primary focus:ring-0 transition-colors p-4 rounded-t-lg placeholder:text-slate-400 text-sm" 
                                       name="card_number" 
                                       placeholder="{{ $card_number_placeholder ?? '0000 0000 0000 0000' }}" 
                                       type="text" />
                                <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-outline text-slate-400">lock</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-[10px] uppercase tracking-widest font-bold text-on-surface-variant ml-1">{{ $expiry_label ?? 'Vencimiento (MM/AA)' }}</label>
                                <input class="w-full bg-surface-container-low border-b-2 border-outline-variant/30 focus:border-primary focus:ring-0 transition-colors p-4 rounded-t-lg placeholder:text-slate-400 text-sm" 
                                       name="expiry" 
                                       placeholder="{{ $expiry_placeholder ?? 'MM/AA' }}" 
                                       type="text" />
                            </div>
                            <div class="space-y-2">
                                <label class="text-[10px] uppercase tracking-widest font-bold text-on-surface-variant ml-1">{{ $cvv_label ?? 'CVV' }}</label>
                                <input class="w-full bg-surface-container-low border-b-2 border-outline-variant/30 focus:border-primary focus:ring-0 transition-colors p-4 rounded-t-lg placeholder:text-slate-400 text-sm" 
                                       name="cvv" 
                                       placeholder="{{ $cvv_placeholder ?? '123' }}" 
                                       type="text" />
                            </div>
                        </div>

                        <!-- CTA Section -->
                        <div class="pt-8 space-y-4">
                            <button class="w-full py-5 bg-gradient-to-r from-primary to-primary-container text-on-primary rounded-full font-bold text-lg shadow-xl shadow-primary/20 hover:scale-[1.02] active:scale-95 transition-all duration-200" 
                                    type="submit">
                                {{ $confirm_text ?? 'Confirmar Pago' }}
                            </button>
                            <p class="text-center text-[11px] text-on-surface-variant italic px-4 leading-relaxed">
                                {{ $terms_text ?? 'Al confirmar, aceptas nuestros términos de servicio y la política de privacidad sobre inversiones sustentables.' }}
                            </p>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </main>

    <!-- Footer (The Natural Legacy) -->
    <footer class="mt-20 border-t border-slate-100 dark:border-slate-800 bg-slate-50">
        <div class="w-full flex flex-col items-center justify-center space-y-8 py-16">
            <div class="flex items-center space-x-2">
                <span class="font-serif text-lg text-primary tracking-tighter">{{ $company_name ?? 'Maz Terrenos' }}</span>
            </div>
            <div class="flex flex-wrap justify-center gap-8">
                <a class="font-sans text-xs tracking-widest uppercase text-slate-500 hover:text-primary transition-all duration-200" href="#">{{ $privacy_label ?? 'Privacidad' }}</a>
                <a class="font-sans text-xs tracking-widest uppercase text-slate-500 hover:text-primary transition-all duration-200" href="#">{{ $terms_label ?? 'Términos' }}</a>
                <a class="font-sans text-xs tracking-widest uppercase text-slate-500 hover:text-primary transition-all duration-200" href="#">{{ $sustainability_label ?? 'Sustentabilidad' }}</a>
                <a class="font-sans text-xs tracking-widest uppercase text-slate-500 hover:text-primary transition-all duration-200" href="#">{{ $heritage_label ?? 'Patrimonio' }}</a>
            </div>
            <p class="font-sans text-xs tracking-widest uppercase text-slate-400">© {{ $year ?? date('Y') }} {{ $company_name ?? 'Maz Terrenos' }}. {{ $footer_tagline ?? 'Inversión consciente, legado natural.' }}</p>
        </div>
    </footer>

    <!-- Responsive Pivot: Bottom Navigation only for Mobile -->
    <nav class="fixed bottom-0 left-0 w-full z-50 flex justify-around items-center px-6 pb-8 pt-4 md:hidden bg-white/90 backdrop-blur-lg border-t border-slate-100 shadow-[0_-10px_40px_-15px_rgba(0,0,0,0.05)] rounded-t-3xl">
        <div class="flex flex-col items-center justify-center text-slate-400">
            <span class="material-symbols-outlined" data-icon="explore">explore</span>
            <span class="font-sans text-[10px] uppercase tracking-[0.1em] font-bold mt-1">{{ $nav_explore ?? 'Explorar' }}</span>
        </div>
        <div class="flex flex-col items-center justify-center text-slate-400">
            <span class="material-symbols-outlined" data-icon="heart_plus">heart_plus</span>
            <span class="font-sans text-[10px] uppercase tracking-[0.1em] font-bold mt-1">{{ $nav_favorites ?? 'Favoritos' }}</span>
        </div>
        <div class="flex flex-col items-center justify-center text-primary">
            <span class="material-symbols-outlined" data-icon="account_balance" data-weight="fill" style="font-variation-settings: 'FILL' 1;">account_balance</span>
            <span class="font-sans text-[10px] uppercase tracking-[0.1em] font-bold mt-1">{{ $nav_invest ?? 'Invertir' }}</span>
        </div>
        <div class="flex flex-col items-center justify-center text-slate-400">
            <span class="material-symbols-outlined" data-icon="person">person</span>
            <span class="font-sans text-[10px] uppercase tracking-[0.1em] font-bold mt-1">{{ $nav_profile ?? 'Perfil' }}</span>
        </div>
    </nav>
@endsection
