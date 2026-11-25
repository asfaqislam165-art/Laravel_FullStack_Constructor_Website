<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get a Free Roofing Estimate | Apex Roofing Pro</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @keyframes quoteCardEnter {
            0% {
                opacity: 0;
                transform: translateY(22px) scale(0.985);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes quoteFadeUp {
            0% {
                opacity: 0;
                transform: translateY(14px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes quoteAmbientPulse {
            0%, 100% {
                opacity: 0.18;
                transform: scale(1);
            }
            50% {
                opacity: 0.32;
                transform: scale(1.08);
            }
        }

        .quote-panel-anim {
            animation: quoteCardEnter 0.75s cubic-bezier(0.22, 1, 0.36, 1) both;
        }

        .quote-head-anim {
            animation: quoteFadeUp 0.65s cubic-bezier(0.22, 1, 0.36, 1) 0.1s both;
        }

        .quote-form-anim {
            animation: quoteFadeUp 0.68s cubic-bezier(0.22, 1, 0.36, 1) 0.2s both;
        }

        .quote-glow-anim {
            animation: quoteAmbientPulse 6.5s ease-in-out infinite;
        }

        .quote-submit-btn {
            position: relative;
            overflow: hidden;
            transition: transform 0.24s cubic-bezier(0.22, 1, 0.36, 1), background-color 0.2s ease, box-shadow 0.24s ease;
        }

        .quote-submit-btn::after {
            content: "";
            position: absolute;
            top: 0;
            left: -120%;
            width: 65%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.34), transparent);
            transform: skewX(-20deg);
            transition: left 0.6s ease;
            pointer-events: none;
        }

        .quote-submit-btn:hover {
            transform: translateY(-2px);
        }

        .quote-submit-btn:hover::after {
            left: 140%;
        }

        .quote-submit-btn:active {
            transform: translateY(0) scale(0.98);
        }

        @media (prefers-reduced-motion: reduce) {
            .quote-panel-anim,
            .quote-head-anim,
            .quote-form-anim,
            .quote-glow-anim,
            .quote-submit-btn,
            .quote-submit-btn::after {
                animation: none !important;
                transition: none !important;
            }
        }
    </style>
</head>
<body class="bg-[#142D4E] text-[#FFFFFF] font-sans antialiased selection:bg-[#F28C28] selection:text-[#142D4E] min-h-screen flex flex-col overflow-x-clip">

    @include('layouts.navigation')

    <!-- Main Content Section -->
    <main class="relative flex-grow flex items-center justify-center px-3 sm:px-6 lg:px-8 py-8 sm:py-12 md:py-16">
        <div class="pointer-events-none absolute -top-24 -right-24 w-72 h-72 rounded-full bg-[#F28C28]/15 blur-3xl quote-glow-anim"></div>

        <div class="relative z-10 w-full max-w-4xl bg-[#0f223a]/90 backdrop-blur-md rounded-2xl sm:rounded-3xl shadow-2xl p-5 sm:p-10 md:p-12 border border-[#234878] transition-all duration-300 min-w-0 quote-panel-anim">
            
            <div class="text-center mb-7 sm:mb-10 space-y-2 quote-head-anim">
                <span class="inline-block bg-[#F28C28]/15 text-[#F28C28] text-xs sm:text-sm font-extrabold uppercase tracking-widest px-4 py-1.5 rounded-full border border-[#F28C28]/30 shadow-sm mb-2">
                    Free Consultation
                </span>
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-[#FFFFFF] tracking-tight leading-tight">
                    Request Your Free Roof Estimate
                </h1>
                <p class="text-[#F28C28] text-xs sm:text-base font-medium max-w-lg mx-auto leading-relaxed">
                    No hidden fees, no obligation. Receive a clear detailed quote within 24 hours.
                </p>
            </div>

            @if(session('status'))
                <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 rounded-xl text-sm text-center font-medium shadow-inner">
                    {{ session('status') }}
                </div>
            @endif 

            @if ($errors->any())
                <div class="mb-6 p-4 bg-rose-500/10 border border-rose-500/30 text-rose-400 rounded-xl text-sm shadow-inner">
                    <p class="font-bold mb-1">Please fix the following errors:</p>
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('quote.store') }}" method="POST" class="space-y-4 sm:space-y-6 quote-form-anim">
                @csrf

                <!-- Row 1 -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                    <div class="min-w-0">
                        <label class="block text-xs sm:text-sm font-bold text-[#FFFFFF] mb-2">Full Name *</label>
                        <input type="text" name="full_name" value="{{ old('full_name') }}" required placeholder="John Doe" class="w-full min-w-0 bg-[#142D4E] border border-[#234878] rounded-xl px-4 py-3 text-sm sm:text-base text-[#FFFFFF] placeholder-[#FFFFFF]/50 focus:outline-none focus:border-[#F28C28] focus:ring-1 focus:ring-[#F28C28] transition-all">
                    </div>
                    <div class="min-w-0">
                        <label class="block text-xs sm:text-sm font-bold text-[#FFFFFF] mb-2">Email Address *</label>
                        <input type="email" name="email" value="{{ old('email') }}" required placeholder="john@example.com" class="w-full min-w-0 bg-[#142D4E] border border-[#234878] rounded-xl px-4 py-3 text-sm sm:text-base text-[#FFFFFF] placeholder-[#FFFFFF]/50 focus:outline-none focus:border-[#F28C28] focus:ring-1 focus:ring-[#F28C28] transition-all">
                    </div>
                </div>

                <!-- Row 2 -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                    <div class="min-w-0">
                        <label class="block text-xs sm:text-sm font-bold text-[#FFFFFF] mb-2">Phone Number *</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" required placeholder="+1 (555) 000-0000" class="w-full min-w-0 bg-[#142D4E] border border-[#234878] rounded-xl px-4 py-3 text-sm sm:text-base text-[#FFFFFF] placeholder-[#FFFFFF]/50 focus:outline-none focus:border-[#F28C28] focus:ring-1 focus:ring-[#F28C28] transition-all">
                    </div>
                    <div class="min-w-0">
                        <label class="block text-xs sm:text-sm font-bold text-[#FFFFFF] mb-2">Property Address *</label>
                        <input type="text" name="property_address" value="{{ old('property_address') }}" required placeholder="123 Main St, City, Zip" class="w-full min-w-0 bg-[#142D4E] border border-[#234878] rounded-xl px-4 py-3 text-sm sm:text-base text-[#FFFFFF] placeholder-[#FFFFFF]/50 focus:outline-none focus:border-[#F28C28] focus:ring-1 focus:ring-[#F28C28] transition-all">
                    </div>
                </div>

                <!-- Row 3 -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                    <div class="min-w-0">
                        <label class="block text-xs sm:text-sm font-bold text-[#FFFFFF] mb-2">Service Needed *</label>
                        <select name="service_type" required class="w-full min-w-0 bg-[#142D4E] border border-[#234878] rounded-xl px-4 py-3 text-sm sm:text-base text-[#FFFFFF] focus:outline-none focus:border-[#F28C28] focus:ring-1 focus:ring-[#F28C28] transition-all">
                            <option value="" class="bg-[#142D4E] text-[#FFFFFF]">Select Service</option>
                            <option value="Roof Replacement" @selected(old('service_type') == 'Roof Replacement') class="bg-[#142D4E] text-[#FFFFFF]">Full Roof Replacement</option>
                            <option value="Roof Repair" @selected(old('service_type') == 'Roof Repair') class="bg-[#142D4E] text-[#FFFFFF]">Roof Repair & Leak Fixing</option>
                            <option value="Gutter Installation" @selected(old('service_type') == 'Gutter Installation') class="bg-[#142D4E] text-[#FFFFFF]">Gutter Repair & Installation</option>
                            <option value="Storm Damage" @selected(old('service_type') == 'Storm Damage') class="bg-[#142D4E] text-[#FFFFFF]">Storm / Hail Damage Inspection</option>
                        </select>
                    </div>
                    <div class="min-w-0">
                        <label class="block text-xs sm:text-sm font-bold text-[#FFFFFF] mb-2">Preferred Roof Material</label>
                        <select name="roof_material" class="w-full min-w-0 bg-[#142D4E] border border-[#234878] rounded-xl px-4 py-3 text-sm sm:text-base text-[#FFFFFF] focus:outline-none focus:border-[#F28C28] focus:ring-1 focus:ring-[#F28C28] transition-all">
                            <option value="Architectural Shingles" @selected(old('roof_material') == 'Architectural Shingles') class="bg-[#142D4E] text-[#FFFFFF]">Asphalt Shingles</option>
                            <option value="Metal Roofing" @selected(old('roof_material') == 'Metal Roofing') class="bg-[#142D4E] text-[#FFFFFF]">Standing Seam Metal</option>
                            <option value="Flat TPO" @selected(old('roof_material') == 'Flat TPO') class="bg-[#142D4E] text-[#FFFFFF]">Flat / TPO Membrane</option>
                            <option value="Slate / Tile" @selected(old('roof_material') == 'Slate / Tile') class="bg-[#142D4E] text-[#FFFFFF]">Slate or Clay Tile</option>
                        </select>
                    </div>
                </div>
                    
                <div class="min-w-0">
                    <label class="block text-xs sm:text-sm font-bold text-[#FFFFFF] mb-2">Project Details / Additional Notes</label>
                    <textarea name="project_details" rows="4" placeholder="Describe leak areas, roof pitch, approximate age, etc." class="w-full min-w-0 bg-[#142D4E] border border-[#234878] rounded-xl px-4 py-3 text-sm sm:text-base text-[#FFFFFF] placeholder-[#FFFFFF]/50 focus:outline-none focus:border-[#F28C28] focus:ring-1 focus:ring-[#F28C28] transition-all">{{ old('project_details') }}</textarea>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="quote-submit-btn w-full bg-[#F28C28] hover:bg-[#d97920] text-[#142D4E] font-extrabold py-3.5 sm:py-4 rounded-xl text-sm sm:text-lg shadow-xl hover:shadow-[#F28C28]/30 transition-all duration-200 cursor-pointer">
                    Submit Estimate Request
                </button>
            </form>

        </div>
    </main>

    @include('layouts.footer')

</body>
</html>