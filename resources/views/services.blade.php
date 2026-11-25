<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services | Apex Roofing Pro</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @keyframes srvRise {
            0% {
                opacity: 0;
                transform: translateY(22px) scale(0.985);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes srvHeaderFade {
            0% {
                opacity: 0;
                transform: translateY(14px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes srvDotPulse {
            0%, 100% {
                opacity: 1;
                transform: scale(1);
            }
            50% {
                opacity: 0.45;
                transform: scale(0.8);
            }
        }

        .srv-header-anim {
            animation: srvHeaderFade 0.7s cubic-bezier(0.22, 1, 0.36, 1) both;
        }

        .srv-dot-anim {
            animation: srvDotPulse 2s ease-in-out infinite;
        }

        .srv-card-anim {
            position: relative;
            animation: srvRise 0.68s cubic-bezier(0.22, 1, 0.36, 1) both;
            transition: transform 0.28s cubic-bezier(0.22, 1, 0.36, 1), border-color 0.25s ease, box-shadow 0.28s ease;
        }

        .srv-card-anim:hover {
            transform: translateY(-4px);
            box-shadow: 0 22px 38px rgba(0, 0, 0, 0.32);
        }

        .srv-card-anim::after {
            content: "";
            position: absolute;
            top: 0;
            left: -120%;
            width: 55%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.08), transparent);
            transform: skewX(-20deg);
            transition: left 0.7s ease;
            pointer-events: none;
        }

        .srv-card-anim:hover::after {
            left: 145%;
        }

        .srv-cta-link {
            transition: transform 0.2s cubic-bezier(0.22, 1, 0.36, 1), color 0.2s ease;
        }

        .srv-cta-link:hover {
            transform: translateX(3px);
        }

        @media (prefers-reduced-motion: reduce) {
            .srv-header-anim,
            .srv-dot-anim,
            .srv-card-anim,
            .srv-card-anim::after,
            .srv-cta-link {
                animation: none !important;
                transition: none !important;
            }
        }
    </style>
</head>
<body class="bg-[#142D4E] text-[#FFFFFF] font-sans antialiased selection:bg-[#F28C28] selection:text-[#142D4E] min-h-screen flex flex-col overflow-x-clip">

    @include('layouts.navigation')

    <!-- Services Main Section -->
    <main class="flex-grow max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 py-10 sm:py-16 w-full">
        
        <!-- Header -->
        <div class="text-center mb-10 sm:mb-12 space-y-3 srv-header-anim">
            <span class="inline-flex items-center gap-2 bg-[#F28C28]/15 text-[#F28C28] px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-[0.2em] border border-[#F28C28]/30">
                <span class="w-2 h-2 rounded-full bg-[#F28C28] srv-dot-anim"></span>
                Expert Solutions
            </span>
            <h1 class="text-2xl sm:text-5xl font-extrabold tracking-tight text-white leading-tight">
                Our Professional <span class="text-[#F28C28]">Services</span>
            </h1>
            <p class="text-white/70 text-xs sm:text-base max-w-xl mx-auto leading-relaxed">
                Explore our expert roofing services tailored to protect your home and business with lifetime warranties.
            </p>
        </div>

        <!-- Dynamic Services Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-8">
            @isset($services)
                @forelse($services as $service)
                    <div class="srv-card-anim bg-[#0f223a]/80 backdrop-blur-md border border-[#234878] rounded-2xl sm:rounded-3xl shadow-2xl hover:border-[#F28C28] transition-all duration-300 flex flex-col justify-between group overflow-hidden min-w-0">
                        
                        <!-- Service Image (If available) -->
                        @if($service->image)
                            <div class="relative h-40 sm:h-48 overflow-hidden border-b border-[#234878]">
                                <img src="{{ asset($service->image) }}" alt="{{ $service->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>
                        @endif

                        <div class="p-5 sm:p-8 space-y-4 flex-grow flex flex-col justify-between min-w-0">
                            <div class="space-y-3 min-w-0">
                                <div class="flex items-center justify-between gap-2">
                                    <div class="w-11 h-11 sm:w-12 sm:h-12 bg-[#F28C28] text-[#142D4E] rounded-2xl flex items-center justify-center text-lg sm:text-xl font-bold shadow-md group-hover:scale-105 transition-transform shrink-0">
                                        🏠
                                    </div>
                                    @if($service->category)
                                        <span class="text-[11px] sm:text-xs font-bold px-3 py-1 bg-[#142D4E] text-[#F28C28] border border-[#234878] rounded-full uppercase tracking-wider truncate">
                                            {{ $service->category }}
                                        </span>
                                    @endif
                                </div>

                                <h3 class="text-lg sm:text-2xl font-extrabold text-[#FFFFFF] tracking-tight break-words">
                                    {{ $service->title }}
                                </h3>

                                <p class="text-[#FFFFFF]/80 text-xs sm:text-base leading-relaxed font-normal break-words">
                                    {{ $service->description }}
                                </p>

                                <!-- Features List -->
                                @if(!empty($service->features))
                                    @php
                                        $featuresList = is_array($service->features) ? $service->features : explode(',', $service->features);
                                    @endphp
                                    <ul class="space-y-1.5 pt-2 text-xs sm:text-sm text-slate-300">
                                        @foreach($featuresList as $feature)
                                            @if(trim($feature) !== '')
                                                <li class="flex items-start gap-2 min-w-0">
                                                    <span class="text-[#F28C28] shrink-0">✓</span>
                                                    <span class="break-words">{{ trim($feature) }}</span>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif
                            </div>

                            <!-- Bottom CTA -->
                            <div class="mt-5 sm:mt-6 pt-4 border-t border-[#234878]">
                                <a href="{{ route('quote') }}" class="srv-cta-link inline-flex items-center gap-1 text-xs sm:text-sm text-[#F28C28] font-extrabold uppercase tracking-wider hover:text-[#FFFFFF] transition-colors">
                                    Get Estimate <span class="text-base sm:text-lg">→</span>
                                </a>
                            </div>
                        </div>

                    </div>
                @empty
                    <div class="srv-card-anim col-span-full text-center py-12 sm:py-16 px-4 bg-[#0f223a]/40 border border-[#234878] rounded-2xl sm:rounded-3xl space-y-3">
                        <div class="text-4xl">🛠️</div>
                        <p class="text-white/80 font-bold text-base sm:text-lg">No roofing services available at the moment.</p>
                        <p class="text-white/60 text-xs sm:text-sm">Please check back later or add new services from the admin panel.</p>
                    </div>
                @endforelse
            @endisset
        </div>

    </main>

    @include('layouts.footer')

</body>
</html>