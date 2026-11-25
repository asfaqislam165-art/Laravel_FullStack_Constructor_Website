<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roofing Gallery & Before-After Projects | Apex Roofing Pro</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @keyframes galleryRise {
            0% {
                opacity: 0;
                transform: translateY(20px) scale(0.985);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes galleryHeaderFade {
            0% {
                opacity: 0;
                transform: translateY(14px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .gallery-banner-anim {
            animation: galleryHeaderFade 0.7s cubic-bezier(0.22, 1, 0.36, 1) both;
        }

        .gallery-card-anim {
            position: relative;
            overflow: hidden;
            animation: galleryRise 0.68s cubic-bezier(0.22, 1, 0.36, 1) both;
            transition: transform 0.28s cubic-bezier(0.22, 1, 0.36, 1), border-color 0.25s ease, box-shadow 0.28s ease;
        }

        .gallery-card-anim:hover {
            transform: translateY(-4px);
            box-shadow: 0 22px 38px rgba(0, 0, 0, 0.32);
        }

        .gallery-card-anim::after {
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

        .gallery-card-anim:hover::after {
            left: 145%;
        }

        @media (prefers-reduced-motion: reduce) {
            .gallery-banner-anim,
            .gallery-card-anim,
            .gallery-card-anim::after {
                animation: none !important;
                transition: none !important;
            }
        }
    </style>
</head>
<body class="bg-[#142D4E] text-[#FFFFFF] font-sans antialiased selection:bg-[#F28C28] selection:text-[#142D4E] min-h-screen flex flex-col overflow-x-clip">

    @include('layouts.navigation')

    <!-- Header Banner Section -->
    <section class="bg-[#0f223a]/90 text-[#FFFFFF] py-10 sm:py-16 px-3 sm:px-6 text-center border-b border-[#234878] shadow-xl">
        <div class="max-w-4xl mx-auto space-y-3 gallery-banner-anim">
            <span class="inline-block bg-[#F28C28]/15 text-[#F28C28] text-xs sm:text-sm font-extrabold uppercase tracking-widest px-4 py-1.5 rounded-full border border-[#F28C28]/30 shadow-sm">
                Project Showcase
            </span>
            <h1 class="text-2xl sm:text-4xl md:text-5xl font-extrabold tracking-tight text-[#FFFFFF] leading-tight">
                Our Work Speaks For Itself
            </h1>
            <p class="text-[#F28C28] text-sm sm:text-lg font-medium max-w-xl mx-auto leading-relaxed">
                Explore before and after transformations across residential & commercial properties.
            </p>
        </div>
    </section>

    <!-- Gallery Grid Section -->
    <main class="flex-grow max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 py-10 sm:py-16 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8 lg:gap-12">
            
            @isset($projects)
                @forelse($projects as $project)
                    <div class="gallery-card-anim bg-[#0f223a]/80 backdrop-blur-md rounded-2xl sm:rounded-3xl shadow-2xl overflow-hidden border border-[#234878] hover:border-[#F28C28] transition-all duration-300 flex flex-col min-w-0">
                        
                        <!-- Before / After Header Labels -->
                        <div class="grid grid-cols-2 bg-[#142D4E] text-[#FFFFFF] text-center py-2 sm:py-2.5 px-1 text-[11px] sm:text-sm font-extrabold uppercase tracking-wider border-b border-[#234878]">
                            <span class="border-r border-[#234878] text-[#FFFFFF]/80 flex items-center justify-center gap-1">
                                <span>⬅</span> Before Repairs
                            </span>
                            <span class="text-emerald-400 flex items-center justify-center gap-1">
                                <span>➡</span> After Restoration
                            </span>
                        </div>

                        <!-- Images Grid -->
                        <div class="grid grid-cols-2 bg-[#142D4E]/50">
                            <div class="relative overflow-hidden group min-w-0">
                                <img src="{{ asset($project->before_image) }}" class="w-full h-36 sm:h-56 md:h-64 object-cover group-hover:scale-105 transition-transform duration-300" alt="Before Restoration">
                            </div>
                            <div class="relative overflow-hidden group border-l-2 border-[#234878] min-w-0">
                                <img src="{{ asset($project->after_image) }}" class="w-full h-36 sm:h-56 md:h-64 object-cover group-hover:scale-105 transition-transform duration-300" alt="After Restoration">
                            </div>
                        </div>

                        <!-- Project Info Box -->
                        <div class="p-4 sm:p-8 flex flex-col justify-between flex-grow space-y-3 min-w-0">
                            <div class="space-y-1 min-w-0">
                                <span class="text-xs font-bold text-[#F28C28] uppercase tracking-widest bg-[#F28C28]/10 px-3 py-1 rounded-full border border-[#F28C28]/30 inline-block max-w-full truncate">
                                    📍 {{ $project->location }}
                                </span>
                                <h3 class="text-lg sm:text-2xl font-extrabold text-[#FFFFFF] mt-2 tracking-tight">
                                    {{ $project->title }}
                                </h3>
                            </div>
                            <p class="text-[#FFFFFF]/80 text-xs sm:text-base leading-relaxed font-normal">
                                {{ $project->description }}
                            </p>
                        </div>

                    </div>
                @empty
                    <!-- Empty State -->
                    <div class="gallery-card-anim col-span-1 lg:col-span-2 text-center py-12 sm:py-16 px-4 sm:px-6 bg-[#0f223a]/80 backdrop-blur-md rounded-2xl sm:rounded-3xl border border-[#234878] shadow-xl space-y-3">
                        <div class="text-4xl">🏗️</div>
                        <p class="text-[#FFFFFF] font-bold text-base sm:text-xl">No projects found in the gallery yet.</p>
                        <p class="text-[#F28C28] text-xs sm:text-sm">Check back soon for our latest roofing transformations!</p>
                    </div>
                @endforelse
            @endisset

        </div>
    </main>

    @include('layouts.footer')

</body>
</html>