<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | Apex Roofing Pro</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @keyframes apexRise {
            0% {
                opacity: 0;
                transform: translateY(22px) scale(0.985);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes apexFadeUp {
            0% {
                opacity: 0;
                transform: translateY(14px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes apexLineExpand {
            0% {
                transform: scaleX(0.2);
                opacity: 0.35;
            }
            100% {
                transform: scaleX(1);
                opacity: 1;
            }
        }

        @keyframes apexPulseGlow {
            0%, 100% {
                opacity: 0.22;
                transform: scale(1);
            }
            50% {
                opacity: 0.36;
                transform: scale(1.08);
            }
        }

        .apex-card-anim {
            animation: apexRise 0.75s cubic-bezier(0.22, 1, 0.36, 1) both;
        }

        .apex-stagger-1 {
            animation: apexFadeUp 0.65s cubic-bezier(0.22, 1, 0.36, 1) 0.12s both;
        }

        .apex-stagger-2 {
            animation: apexFadeUp 0.65s cubic-bezier(0.22, 1, 0.36, 1) 0.24s both;
        }

        .apex-stagger-3 {
            animation: apexFadeUp 0.65s cubic-bezier(0.22, 1, 0.36, 1) 0.36s both;
        }

        .apex-border-anim {
            transform-origin: left center;
            animation: apexLineExpand 0.8s cubic-bezier(0.22, 1, 0.36, 1) 0.18s both;
        }

        .apex-glow-orb {
            animation: apexPulseGlow 6s ease-in-out infinite;
        }

        .apex-btn-anim {
            position: relative;
            overflow: hidden;
            transition: transform 0.25s cubic-bezier(0.22, 1, 0.36, 1), box-shadow 0.25s ease, background-color 0.2s ease;
        }

        .apex-btn-anim::after {
            content: "";
            position: absolute;
            top: 0;
            left: -120%;
            width: 65%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.35), transparent);
            transform: skewX(-20deg);
            transition: left 0.6s ease;
        }

        .apex-btn-anim:hover {
            transform: translateY(-2px);
        }

        .apex-btn-anim:hover::after {
            left: 140%;
        }

        .apex-btn-anim:active {
            transform: translateY(0) scale(0.98);
        }

        @media (prefers-reduced-motion: reduce) {
            .apex-card-anim,
            .apex-stagger-1,
            .apex-stagger-2,
            .apex-stagger-3,
            .apex-border-anim,
            .apex-glow-orb,
            .apex-btn-anim,
            .apex-btn-anim::after {
                animation: none !important;
                transition: none !important;
            }
        }
    </style>
</head>
<body class="bg-[#142D4E] text-[#FFFFFF] min-h-screen flex flex-col antialiased selection:bg-[#F28C28] selection:text-[#142D4E]">

    @include('layouts.navigation')

    <!-- Main Content Section -->
    <main class="relative flex-grow flex items-center justify-center px-4 sm:px-6 lg:px-8 py-12 sm:py-16 overflow-hidden">
        <div class="pointer-events-none absolute -top-24 -right-24 w-72 h-72 rounded-full bg-[#F28C28]/15 blur-3xl apex-glow-orb"></div>

        <div class="relative z-10 w-full max-w-4xl bg-[#0f223a]/90 backdrop-blur-md border border-[#234878] rounded-3xl shadow-2xl p-6 sm:p-10 md:p-12 transition-all duration-300 hover:border-[#F28C28]/40 apex-card-anim">
            
            <!-- Page Heading -->
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-black text-[#FFFFFF] mb-6 border-b-2 border-[#F28C28]/40 pb-4 tracking-tight apex-stagger-1 apex-border-anim">
                About Apex Roofing Pro
            </h1>

            <!-- Descriptive Content -->
            <div class="space-y-4 sm:space-y-6 text-[#FFFFFF]/85 text-base sm:text-lg leading-relaxed font-normal apex-stagger-2">
                <p>
                    Apex Roofing Pro is a premier roofing contractor operating across the United States. With over 15 years of industry experience, we specialize in residential roof replacements, commercial flat roofing, storm damage repairs, and custom gutter installations.
                </p>
                
                <p>
                    Our mission is to protect homes and businesses with top-tier materials, unmatched craftsmanship, and fully transparent pricing backed by lifetime warranties.
                </p>
            </div>

            <!-- Call to Action / Accent Feature -->
            <div class="mt-10 pt-6 border-t border-[#234878] flex flex-col sm:flex-row items-center justify-between gap-4 apex-stagger-3">
                <p class="text-sm sm:text-base text-[#F28C28] font-medium text-center sm:text-left">
                    Need reliable roofing services? Contact our experts today.
                </p>
                
                <a href="{{ route('quote') }}" class="apex-btn-anim w-full sm:w-auto inline-flex items-center justify-center px-6 py-3.5 bg-[#F28C28] hover:bg-[#d97920] text-[#142D4E] font-extrabold rounded-xl shadow-lg hover:shadow-[#F28C28]/30 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-[#F28C28] focus:ring-offset-2 focus:ring-offset-[#142D4E]">
                    Get Free Estimate
                </a>
            </div>

        </div>
    </main>

    @include('layouts.footer')

</body>
</html>