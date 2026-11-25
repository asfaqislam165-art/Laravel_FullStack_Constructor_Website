<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Reviews | Apex Roofing Pro</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @keyframes revRise {
            0% {
                opacity: 0;
                transform: translateY(20px) scale(0.985);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes revBannerFade {
            0% {
                opacity: 0;
                transform: translateY(14px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes revBadgeGlow {
            0%, 100% {
                box-shadow: 0 0 0 0 rgba(242, 140, 40, 0.35);
            }
            50% {
                box-shadow: 0 0 0 6px rgba(242, 140, 40, 0);
            }
        }

        .rev-banner-anim {
            animation: revBannerFade 0.7s cubic-bezier(0.22, 1, 0.36, 1) both;
        }

        .rev-card-anim {
            position: relative;
            overflow: hidden;
            animation: revRise 0.65s cubic-bezier(0.22, 1, 0.36, 1) both;
            transition: transform 0.28s cubic-bezier(0.22, 1, 0.36, 1), border-color 0.25s ease, box-shadow 0.28s ease;
        }

        .rev-card-anim:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 36px rgba(0, 0, 0, 0.3);
        }

        .rev-badge-pulse {
            animation: revBadgeGlow 2.6s infinite;
        }

        .rev-form-panel {
            animation: revRise 0.72s cubic-bezier(0.22, 1, 0.36, 1) 0.14s both;
        }

        .rev-submit-btn {
            position: relative;
            overflow: hidden;
            transition: transform 0.24s cubic-bezier(0.22, 1, 0.36, 1), background-color 0.2s ease, box-shadow 0.24s ease;
        }

        .rev-submit-btn::after {
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

        .rev-submit-btn:hover {
            transform: translateY(-2px);
        }

        .rev-submit-btn:hover::after {
            left: 140%;
        }

        .rev-submit-btn:active {
            transform: translateY(0) scale(0.98);
        }

        @media (prefers-reduced-motion: reduce) {
            .rev-banner-anim,
            .rev-card-anim,
            .rev-badge-pulse,
            .rev-form-panel,
            .rev-submit-btn,
            .rev-submit-btn::after {
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
        <div class="max-w-4xl mx-auto space-y-3 rev-banner-anim">
            <span class="inline-block bg-[#F28C28]/15 text-[#F28C28] text-xs sm:text-sm font-extrabold uppercase tracking-widest px-4 py-1.5 rounded-full border border-[#F28C28]/30 shadow-sm">
                Testimonials
            </span>
            <h1 class="text-2xl sm:text-4xl md:text-5xl font-extrabold tracking-tight text-[#FFFFFF] leading-tight">
                What Our Clients Say
            </h1>
            <p class="text-[#F28C28] text-sm sm:text-lg font-medium max-w-xl mx-auto leading-relaxed">
                Verified reviews from homeowners across the United States.
            </p>
        </div>
    </section>

    <!-- Main Content Area -->
    <main class="flex-grow max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 py-10 sm:py-16 w-full space-y-10 sm:space-y-12">
        
        @if(session('status'))
            <div class="max-w-3xl mx-auto p-4 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 rounded-xl text-center font-semibold text-xs sm:text-sm shadow-inner flex items-center justify-center gap-2">
                <span>✓</span>
                <span>{{ session('status') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="max-w-3xl mx-auto p-4 bg-rose-500/10 border border-rose-500/30 text-rose-400 rounded-xl text-xs sm:text-sm shadow-inner">
                <p class="font-bold mb-1">Please fix the following errors before submitting your review:</p>
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Dynamic Reviews Grid from Database -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-8">
            @isset($reviews)
                @forelse($reviews as $review)
                    <div class="rev-card-anim bg-[#0f223a]/80 backdrop-blur-md p-5 sm:p-8 rounded-2xl sm:rounded-3xl shadow-2xl border border-[#234878] hover:border-[#F28C28] transition-all duration-300 flex flex-col justify-between group min-w-0">
                        
                        <div class="space-y-4 min-w-0">
                            <!-- Star Rating -->
                            <div class="text-[#F28C28] text-base sm:text-xl tracking-widest bg-[#142D4E] inline-block px-3 py-1 rounded-xl border border-[#234878]">
                                {{ str_repeat('★', $review->rating) }}{{ str_repeat('☆', 5 - $review->rating) }}
                            </div>
                            
                            <!-- Comment -->
                            <p class="text-[#FFFFFF]/85 text-sm sm:text-base leading-relaxed italic font-normal break-words">
                                "{{ $review->review_text }}"
                            </p>
                        </div>

                        <!-- Author Info -->
                        <div class="mt-6 pt-4 border-t border-[#234878] flex items-center justify-between gap-3 min-w-0">
                            <div class="min-w-0">
                                <h4 class="font-extrabold text-[#FFFFFF] text-base sm:text-lg group-hover:text-[#F28C28] transition-colors truncate">
                                    {{ $review->client_name }}
                                </h4>
                                <span class="text-xs text-[#F28C28] font-medium block mt-0.5 truncate">
                                    📍 {{ $review->location }}
                                </span>
                            </div>
                            <span class="rev-badge-pulse w-8 h-8 rounded-full bg-[#F28C28] text-[#142D4E] font-bold text-xs flex items-center justify-center shadow-md flex-shrink-0">
                                ✓
                            </span>
                        </div>

                    </div>
                @empty
                    <!-- Empty State -->
                    <div class="rev-card-anim col-span-1 md:col-span-2 lg:col-span-3 text-center py-12 sm:py-16 px-4 sm:px-6 bg-[#0f223a]/80 backdrop-blur-md rounded-2xl sm:rounded-3xl border border-[#234878] shadow-xl space-y-3">
                        <div class="text-4xl">💬</div>
                        <p class="text-[#FFFFFF] font-bold text-base sm:text-xl">No reviews found yet.</p>
                        <p class="text-[#F28C28] text-xs sm:text-sm">Be the first to share your experience with Apex Roofing Pro!</p>
                    </div>
                @endforelse
            @endisset
        </div>

        <!-- Submit Review Section (Public Submission Form) -->
        <div class="rev-form-panel max-w-3xl mx-auto bg-[#0f223a]/90 backdrop-blur-md border border-[#234878] rounded-2xl sm:rounded-3xl shadow-2xl p-5 sm:p-10 mt-8 sm:mt-12 min-w-0">
            <div class="text-center mb-6 sm:mb-8 space-y-2">
                <span class="inline-block bg-[#F28C28]/15 text-[#F28C28] text-xs font-extrabold uppercase tracking-widest px-3.5 py-1 rounded-full border border-[#F28C28]/30">
                    Share Your Experience
                </span>
                <h3 class="text-xl sm:text-3xl font-extrabold text-[#FFFFFF]">Leave a Client Review</h3>
                <p class="text-[#FFFFFF]/70 text-xs sm:text-sm">We value your feedback. Let others know about your roofing experience.</p>
            </div>

            <form action="{{ route('reviews.store') }}" method="POST" class="space-y-4 sm:space-y-6">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                    <div class="min-w-0">
                        <label class="block text-xs sm:text-sm font-bold text-[#FFFFFF] mb-2">Your Name *</label>
                        <input type="text" name="client_name" value="{{ old('client_name') }}" required placeholder="e.g., David Miller" class="w-full min-w-0 bg-[#142D4E] border border-[#234878] rounded-xl px-4 py-3 text-sm sm:text-base text-[#FFFFFF] placeholder-[#FFFFFF]/50 focus:outline-none focus:border-[#F28C28]">
                    </div>
                    <div class="min-w-0">
                        <label class="block text-xs sm:text-sm font-bold text-[#FFFFFF] mb-2">Location (City, State) *</label>
                        <input type="text" name="location" value="{{ old('location') }}" required placeholder="e.g., Austin, TX" class="w-full min-w-0 bg-[#142D4E] border border-[#234878] rounded-xl px-4 py-3 text-sm sm:text-base text-[#FFFFFF] placeholder-[#FFFFFF]/50 focus:outline-none focus:border-[#F28C28]">
                    </div>
                </div>

                <div class="min-w-0">
                    <label class="block text-xs sm:text-sm font-bold text-[#FFFFFF] mb-2">Rating (1 to 5 Stars) *</label>
                    <select name="rating" required class="w-full min-w-0 bg-[#142D4E] border border-[#234878] rounded-xl px-4 py-3 text-sm sm:text-base text-[#FFFFFF] focus:outline-none focus:border-[#F28C28]">
                        <option value="5">5 Stars - Excellent Service</option>
                        <option value="4">4 Stars - Very Good</option>
                        <option value="3">3 Stars - Good</option>
                        <option value="2">2 Stars - Fair</option>
                        <option value="1">1 Star - Poor</option>
                    </select>
                </div>

                <div class="min-w-0">
                    <label class="block text-xs sm:text-sm font-bold text-[#FFFFFF] mb-2">Review Comment *</label>
                    <textarea name="review_text" rows="4" required placeholder="Write your review about our roofing service..." class="w-full min-w-0 bg-[#142D4E] border border-[#234878] rounded-xl px-4 py-3 text-sm sm:text-base text-[#FFFFFF] placeholder-[#FFFFFF]/50 focus:outline-none focus:border-[#F28C28]">{{ old('review_text') }}</textarea>
                </div>

                <button type="submit" class="rev-submit-btn w-full bg-[#F28C28] hover:bg-[#d97920] text-[#142D4E] font-extrabold py-3.5 rounded-xl text-sm sm:text-base shadow-lg transition-all cursor-pointer">
                    Publish Review
                </button>
            </form>
        </div>

    </main>

    @include('layouts.footer')

</body>
</html>