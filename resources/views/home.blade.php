<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apex Roofing Pro | USA Premium Roofing Contractor</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @keyframes apexHomeRise {
            0% {
                opacity: 0;
                transform: translateY(20px) scale(0.985);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes apexHomeGlow {
            0%, 100% {
                opacity: 0.16;
                transform: scale(1);
            }
            50% {
                opacity: 0.3;
                transform: scale(1.07);
            }
        }

        .apex-hero-left {
            animation: apexHomeRise 0.75s cubic-bezier(0.22, 1, 0.36, 1) both;
        }

        .apex-hero-form {
            animation: apexHomeRise 0.75s cubic-bezier(0.22, 1, 0.36, 1) 0.16s both;
        }

        .apex-service-1 {
            animation: apexHomeRise 0.65s cubic-bezier(0.22, 1, 0.36, 1) 0.08s both;
        }

        .apex-service-2 {
            animation: apexHomeRise 0.65s cubic-bezier(0.22, 1, 0.36, 1) 0.18s both;
        }

        .apex-service-3 {
            animation: apexHomeRise 0.65s cubic-bezier(0.22, 1, 0.36, 1) 0.28s both;
        }

        .apex-about-banner {
            animation: apexHomeRise 0.7s cubic-bezier(0.22, 1, 0.36, 1) 0.12s both;
        }

        .apex-glow-drift {
            animation: apexHomeGlow 6.5s ease-in-out infinite;
        }

        .apex-lift-card {
            transition: transform 0.28s cubic-bezier(0.22, 1, 0.36, 1), border-color 0.25s ease, box-shadow 0.28s ease;
        }

        .apex-lift-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 36px rgba(0, 0, 0, 0.3);
        }

        .apex-shine-btn {
            position: relative;
            overflow: hidden;
            transition: transform 0.24s cubic-bezier(0.22, 1, 0.36, 1), background-color 0.2s ease, box-shadow 0.24s ease;
        }

        .apex-shine-btn::after {
            content: "";
            position: absolute;
            top: 0;
            left: -120%;
            width: 65%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.32), transparent);
            transform: skewX(-20deg);
            transition: left 0.6s ease;
            pointer-events: none;
        }

        .apex-shine-btn:hover {
            transform: translateY(-2px);
        }

        .apex-shine-btn:hover::after {
            left: 140%;
        }

        .apex-shine-btn:active {
            transform: translateY(0) scale(0.98);
        }

        @media (prefers-reduced-motion: reduce) {
            .apex-hero-left,
            .apex-hero-form,
            .apex-service-1,
            .apex-service-2,
            .apex-service-3,
            .apex-about-banner,
            .apex-glow-drift,
            .apex-lift-card,
            .apex-shine-btn,
            .apex-shine-btn::after {
                animation: none !important;
                transition: none !important;
            }
        }
    </style>
</head>
<body class="bg-[#142D4E] text-white font-sans antialiased selection:bg-[#F28C28] selection:text-[#142D4E] min-h-screen flex flex-col overflow-x-clip">

    @include('layouts.navigation')

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-[#142D4E] via-[#0f223a] to-[#142D4E] text-[#FFFFFF] py-10 sm:py-16 lg:py-24 px-3 sm:px-6 lg:px-8 overflow-hidden border-b border-[#1f3f6c] shadow-2xl flex-grow flex items-center">
        <!-- Subtle Glow Effect Background -->
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-[#F28C28]/15 via-transparent to-transparent pointer-events-none apex-glow-drift"></div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8 sm:gap-10 lg:gap-16 items-center relative z-10 w-full">
            
            <!-- Left Info Area -->
            <div class="lg:col-span-7 space-y-5 sm:space-y-6 text-center lg:text-left min-w-0 apex-hero-left">
                <!-- Hero Badge -->
                <span class="inline-block bg-[#F28C28]/10 text-[#F28C28] border border-[#F28C28]/30 text-xs sm:text-sm font-semibold tracking-wide px-4 py-1.5 rounded-full shadow-sm backdrop-blur-sm">
                    TRUSTED USA ROOFING CONTRACTOR
                </span>
                
                <!-- Main Heading -->
                <h1 class="text-2xl sm:text-5xl md:text-6xl font-extrabold leading-tight tracking-tight text-[#FFFFFF]">
                    Protect Your Home With America's Best Roofers
                </h1>
                
                <!-- Body Description -->
                <p class="text-[#FFFFFF]/80 text-sm sm:text-lg leading-relaxed max-w-2xl mx-auto lg:mx-0 font-normal">
                    15+ Years of excellence in residential and commercial roofing. Lifetime warranties, certified local crews, and 24/7 emergency repair response.
                </p>
                
                <!-- Call To Action Buttons -->
                <div class="flex flex-col sm:flex-row flex-wrap justify-center lg:justify-start gap-3 sm:gap-4 pt-2">
                    <a href="{{ route('quote') }}" class="apex-shine-btn w-full sm:w-auto inline-flex items-center justify-center bg-[#F28C28] hover:bg-[#d97920] text-[#142D4E] font-bold px-6 sm:px-8 py-3.5 rounded-xl shadow-lg transition-all duration-200 text-sm sm:text-base">
                        Request Free Inspection
                    </a>
                    <a href="{{ route('services') }}" class="apex-shine-btn w-full sm:w-auto inline-flex items-center justify-center bg-[#142D4E]/80 hover:bg-[#1f3f6c] text-[#FFFFFF] border border-[#305a96] px-6 sm:px-8 py-3.5 rounded-xl transition-all duration-200 text-sm sm:text-base">
                        Explore Services
                    </a>
                </div>
            </div>

            <!-- Right Form Box Area -->
            <div class="lg:col-span-5 bg-[#0f223a]/90 backdrop-blur-md border border-[#234878] shadow-2xl rounded-2xl p-5 sm:p-8 min-w-0 apex-hero-form">
                <h3 class="text-lg sm:text-2xl font-bold mb-2 text-[#FFFFFF]">Need Emergency Roof Repair?</h3>
                <p class="text-xs sm:text-sm text-[#FFFFFF]/70 mb-5 sm:mb-6 font-medium leading-relaxed">Fill out this quick request and our local rapid-response crew will call you immediately.</p>
                
                @if(session('status'))
                    <div class="mb-5 p-4 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 rounded-xl text-sm text-center font-medium shadow-inner">
                        {{ session('status') }}
                    </div>
                @endif 

                <form action="{{ route('quote.store') }}" method="POST" class="space-y-3.5 sm:space-y-4">
                    @csrf
                    <div>
                        <input type="text" name="full_name" placeholder="Full Name *" required class="w-full min-w-0 bg-[#142D4E] border border-[#234878] text-[#FFFFFF] placeholder-[#FFFFFF]/50 focus:outline-none focus:border-[#F28C28] focus:ring-1 focus:ring-[#F28C28] rounded-xl px-4 py-3 text-sm sm:text-base transition-all">
                    </div>
                    <div>
                        <input type="text" name="phone" placeholder="Phone Number *" required class="w-full min-w-0 bg-[#142D4E] border border-[#234878] text-[#FFFFFF] placeholder-[#FFFFFF]/50 focus:outline-none focus:border-[#F28C28] focus:ring-1 focus:ring-[#F28C28] rounded-xl px-4 py-3 text-sm sm:text-base transition-all">
                    </div>
                    <div>
                        <input type="text" name="property_address" placeholder="Property Zip / Address *" required class="w-full min-w-0 bg-[#142D4E] border border-[#234878] text-[#FFFFFF] placeholder-[#FFFFFF]/50 focus:outline-none focus:border-[#F28C28] focus:ring-1 focus:ring-[#F28C28] rounded-xl px-4 py-3 text-sm sm:text-base transition-all">
                    </div>
                    <input type="hidden" name="service_type" value="Emergency Repair">
                    <button type="submit" class="apex-shine-btn w-full bg-[#F28C28] hover:bg-[#d97920] text-[#142D4E] font-bold py-3.5 rounded-xl transition-all shadow-lg shadow-[#F28C28]/20 cursor-pointer text-sm sm:text-base">
                        Dispatch Inspector Now
                    </button>
                </form>
            </div>

        </div>
    </section>

    <!-- Services Overview Section -->
    <section class="py-12 sm:py-24 max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 w-full">
        <div class="text-center mb-10 sm:mb-16 space-y-3">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-[#FFFFFF] tracking-tight">Our Full-Service Solutions</h2>
            <p class="text-[#FFFFFF]/70 text-sm sm:text-base font-medium max-w-lg mx-auto">Comprehensive roofing services customized for US climate standards.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 sm:gap-8">
            
            <!-- Card 1 -->
            <div class="apex-lift-card apex-service-1 bg-[#0f223a]/70 backdrop-blur-md p-5 sm:p-8 rounded-2xl border border-[#234878] shadow-xl hover:border-[#F28C28]/50 transition-all duration-300 group min-w-0">
                <div class="w-14 h-14 bg-[#F28C28]/10 text-[#F28C28] border border-[#F28C28]/30 rounded-2xl flex items-center justify-center text-2xl font-bold mb-5 shadow-lg group-hover:scale-105 transition-transform">🏠</div>
                <h3 class="text-lg sm:text-xl font-bold mb-3 text-[#FFFFFF]">Residential Roofing</h3>
                <p class="text-[#FFFFFF]/70 text-sm sm:text-base leading-relaxed">Full roof replacements and repairs using high-grade architectural shingles, standing seam metal, and Spanish tiles.</p>
            </div>

            <!-- Card 2 -->
            <div class="apex-lift-card apex-service-2 bg-[#0f223a]/70 backdrop-blur-md p-5 sm:p-8 rounded-2xl border border-[#234878] shadow-xl hover:border-[#F28C28]/50 transition-all duration-300 group min-w-0">
                <div class="w-14 h-14 bg-[#F28C28]/10 text-[#F28C28] border border-[#F28C28]/30 rounded-2xl flex items-center justify-center text-2xl font-bold mb-5 shadow-lg group-hover:scale-105 transition-transform">🏢</div>
                <h3 class="text-lg sm:text-xl font-bold mb-3 text-[#FFFFFF]">Commercial Roofing</h3>
                <p class="text-[#FFFFFF]/70 text-sm sm:text-base leading-relaxed">TPO, EPDM, and flat roof coatings tailored for commercial buildings, warehouses, and office complexes.</p>
            </div>

            <!-- Card 3 -->
            <div class="apex-lift-card apex-service-3 bg-[#0f223a]/70 backdrop-blur-md p-5 sm:p-8 rounded-2xl border border-[#234878] shadow-xl hover:border-[#F28C28]/50 transition-all duration-300 group min-w-0">
                <div class="w-14 h-14 bg-[#F28C28]/10 text-[#F28C28] border border-[#F28C28]/30 rounded-2xl flex items-center justify-center text-2xl font-bold mb-5 shadow-lg group-hover:scale-105 transition-transform">⛈️</div>
                <h3 class="text-lg sm:text-xl font-bold mb-3 text-[#FFFFFF]">Storm Damage Repair</h3>
                <p class="text-[#FFFFFF]/70 text-sm sm:text-base leading-relaxed">Fast hail, wind, and leak repair with full assistance for US insurance claim approvals.</p>
            </div>

        </div>
    </section>

    <!-- About Preview Banner Section -->
    <section class="py-10 sm:py-12 pb-16 sm:pb-20 px-3 sm:px-6 lg:px-8 max-w-7xl mx-auto w-full">
        <div class="apex-lift-card apex-about-banner bg-[#0f223a]/80 backdrop-blur-md border border-[#234878] rounded-2xl sm:rounded-3xl shadow-2xl p-5 sm:p-10 md:p-12 transition-all duration-300">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6 sm:gap-8">
                <div class="space-y-3 sm:space-y-4 text-center md:text-left min-w-0">
                    <span class="inline-block bg-[#F28C28]/10 text-[#F28C28] border border-[#F28C28]/30 text-xs font-extrabold uppercase tracking-widest px-3 py-1 rounded-full">
                        Who We Are
                    </span>
                    <h2 class="text-xl sm:text-3xl md:text-4xl font-extrabold text-[#FFFFFF] tracking-tight">
                        About Apex Roofing Pro
                    </h2>
                    <p class="text-[#FFFFFF]/80 text-sm sm:text-base leading-relaxed max-w-2xl font-normal">
                        Premier roofing contractor with over 15 years of industry experience across the US. We protect homes and businesses with top-tier materials, unmatched craftsmanship, and lifetime warranties.
                    </p>
                </div>

                <div class="flex-shrink-0 w-full md:w-auto">
                    <a href="{{ route('about') }}" class="apex-shine-btn w-full md:w-auto inline-flex items-center justify-center px-6 py-3.5 bg-[#F28C28] hover:bg-[#d97920] text-[#142D4E] font-extrabold rounded-xl shadow-lg hover:shadow-[#F28C28]/30 transition-all duration-200 text-sm sm:text-base">
                        Learn More About Us →
                    </a>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.footer')

</body>
</html>