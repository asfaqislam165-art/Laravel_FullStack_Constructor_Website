<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Apex Roofing Pro</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @keyframes hqCardEnter {
            0% {
                opacity: 0;
                transform: translateY(22px) scale(0.985);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes hqFadeUp {
            0% {
                opacity: 0;
                transform: translateY(14px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes hqCardPop {
            0% {
                opacity: 0;
                transform: translateY(18px) scale(0.97);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes hqAmbientGlow {
            0%, 100% {
                opacity: 0.2;
                transform: scale(1);
            }
            50% {
                opacity: 0.34;
                transform: scale(1.08);
            }
        }

        .hq-panel-anim {
            animation: hqCardEnter 0.75s cubic-bezier(0.22, 1, 0.36, 1) both;
        }

        .hq-head-anim {
            animation: hqFadeUp 0.65s cubic-bezier(0.22, 1, 0.36, 1) 0.1s both;
        }

        .hq-card-1 {
            animation: hqCardPop 0.6s cubic-bezier(0.22, 1, 0.36, 1) 0.2s both;
        }

        .hq-card-2 {
            animation: hqCardPop 0.6s cubic-bezier(0.22, 1, 0.36, 1) 0.32s both;
        }

        .hq-card-3 {
            animation: hqCardPop 0.6s cubic-bezier(0.22, 1, 0.36, 1) 0.44s both;
        }

        .hq-glow-anim {
            animation: hqAmbientGlow 6s ease-in-out infinite;
        }

        .hq-interactive-card {
            position: relative;
            overflow: hidden;
            transition: transform 0.28s cubic-bezier(0.22, 1, 0.36, 1), box-shadow 0.28s ease, border-color 0.25s ease, background-color 0.25s ease;
        }

        .hq-interactive-card::after {
            content: "";
            position: absolute;
            top: 0;
            left: -120%;
            width: 60%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.14), transparent);
            transform: skewX(-20deg);
            transition: left 0.65s ease;
            pointer-events: none;
        }

        .hq-interactive-card:hover {
            transform: translateY(-4px);
        }

        .hq-interactive-card:hover::after {
            left: 140%;
        }

        .hq-interactive-card:active {
            transform: translateY(-1px) scale(0.99);
        }

        @media (prefers-reduced-motion: reduce) {
            .hq-panel-anim,
            .hq-head-anim,
            .hq-card-1,
            .hq-card-2,
            .hq-card-3,
            .hq-glow-anim,
            .hq-interactive-card,
            .hq-interactive-card::after {
                animation: none !important;
                transition: none !important;
            }
        }
    </style>
</head>
<body class="bg-[#142D4E] text-[#FFFFFF] min-h-screen flex flex-col antialiased selection:bg-[#F28C28] selection:text-[#142D4E]">

    @include('layouts.navigation')

    <!-- Main Content -->
    <main class="relative flex-grow flex items-center justify-center px-3 sm:px-6 lg:px-8 py-10 sm:py-16 overflow-x-clip">
        <div class="pointer-events-none absolute -top-24 -left-24 w-72 h-72 rounded-full bg-[#F28C28]/15 blur-3xl hq-glow-anim"></div>

        <div class="relative z-10 w-full max-w-4xl bg-[#0f223a]/90 backdrop-blur-md border border-[#234878] rounded-2xl sm:rounded-3xl p-5 sm:p-10 md:p-12 text-center space-y-6 sm:space-y-8 shadow-2xl transition-all duration-300 hq-panel-anim">
            
            <!-- Heading -->
            <div class="space-y-3 border-b border-[#234878] pb-6 hq-head-anim">
                <span class="inline-block bg-[#F28C28]/15 text-[#F28C28] text-xs sm:text-sm font-extrabold uppercase tracking-widest px-4 py-1.5 rounded-full border border-[#F28C28]/30 shadow-sm">
                    Get In Touch
                </span>
                <h1 class="text-2xl sm:text-4xl md:text-5xl font-black text-[#FFFFFF] tracking-tight leading-tight">
                    Contact USA HQ
                </h1>
                <p class="text-[#F28C28] text-sm sm:text-base font-medium max-w-xl mx-auto leading-relaxed">
                    Need immediate assistance with an insurance claim or active emergency leak?
                </p>
            </div>

            <!-- Contact Information Grid -->
            <div class="pt-1 sm:pt-2 grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6 text-center items-stretch">
                
                <!-- Hotline Card -->
                <a href="tel:+18007663872" class="hq-interactive-card hq-card-1 h-full bg-[#F28C28] hover:bg-[#d97920] border border-[#F28C28] p-5 sm:p-6 rounded-2xl shadow-lg hover:shadow-[#F28C28]/25 flex flex-col items-center justify-center space-y-2 group">
                    <span class="text-3xl group-hover:scale-110 transition-transform duration-200">📞</span>
                    <span class="text-xs uppercase tracking-widest text-[#142D4E] font-black">Hotline</span>
                    <span class="text-[#142D4E] font-black text-base sm:text-lg">
                        +1 (800) ROOF-USA
                    </span>
                </a>

                <!-- Office Card -->
                <div class="hq-interactive-card hq-card-2 h-full bg-[#142D4E]/90 border border-[#234878] hover:border-[#F28C28]/60 p-5 sm:p-6 rounded-2xl flex flex-col items-center justify-center space-y-2 shadow-md">
                    <span class="text-3xl">📍</span>
                    <span class="text-xs uppercase tracking-widest text-[#F28C28] font-bold">Office</span>
                    <p class="text-[#FFFFFF] text-xs sm:text-sm font-medium leading-relaxed">
                        790 Industrial Parkway, Dallas, TX 75201
                    </p>
                </div>

                <!-- Email Card -->
                <a href="mailto:support@apexroofingusa.com" class="hq-interactive-card hq-card-3 h-full bg-[#142D4E]/90 border border-[#234878] hover:border-[#F28C28]/60 p-5 sm:p-6 rounded-2xl flex flex-col items-center justify-center space-y-2 shadow-md group">
                    <span class="text-3xl group-hover:scale-110 transition-transform duration-200">✉️</span>
                    <span class="text-xs uppercase tracking-widest text-[#F28C28] font-bold">Email</span>
                    <span class="text-[#FFFFFF] text-xs sm:text-sm font-medium break-all group-hover:text-[#F28C28] transition-colors">
                        support@apexroofingusa.com
                    </span>
                </a>

            </div>

        </div>
    </main>

    @include('layouts.footer')

</body>
</html>