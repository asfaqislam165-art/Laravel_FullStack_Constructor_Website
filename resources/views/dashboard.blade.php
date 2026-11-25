<x-app-layout>
    <style>
        @keyframes dashFadeUp {
            0% {
                opacity: 0;
                transform: translateY(18px) scale(0.985);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes dashBarPulse {
            0%, 100% {
                transform: scaleY(1);
                opacity: 1;
            }
            50% {
                transform: scaleY(0.85);
                opacity: 0.75;
            }
        }

        @keyframes dashStatusPing {
            0%, 100% {
                box-shadow: 0 0 0 0 rgba(242, 140, 40, 0.45);
            }
            50% {
                box-shadow: 0 0 0 6px rgba(242, 140, 40, 0);
            }
        }

        .dash-banner-anim {
            animation: dashFadeUp 0.65s cubic-bezier(0.22, 1, 0.36, 1) both;
        }

        .dash-card-1 {
            animation: dashFadeUp 0.6s cubic-bezier(0.22, 1, 0.36, 1) 0.12s both;
        }

        .dash-card-2 {
            animation: dashFadeUp 0.6s cubic-bezier(0.22, 1, 0.36, 1) 0.22s both;
        }

        .dash-card-3 {
            animation: dashFadeUp 0.6s cubic-bezier(0.22, 1, 0.36, 1) 0.32s both;
        }

        .dash-accent-bar {
            animation: dashBarPulse 2.8s ease-in-out infinite;
        }

        .dash-active-badge {
            animation: dashStatusPing 2.2s infinite;
        }

        .dash-card-hover {
            position: relative;
            overflow: hidden;
            transition: transform 0.25s cubic-bezier(0.22, 1, 0.36, 1), border-color 0.25s ease, box-shadow 0.25s ease;
        }

        .dash-card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 32px rgba(0, 0, 0, 0.28);
        }

        .dash-btn-shine {
            position: relative;
            overflow: hidden;
            transition: transform 0.22s cubic-bezier(0.22, 1, 0.36, 1), background-color 0.2s ease, box-shadow 0.2s ease;
        }

        .dash-btn-shine::after {
            content: "";
            position: absolute;
            top: 0;
            left: -120%;
            width: 65%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.35), transparent);
            transform: skewX(-20deg);
            transition: left 0.55s ease;
            pointer-events: none;
        }

        .dash-btn-shine:hover {
            transform: translateY(-2px);
        }

        .dash-btn-shine:hover::after {
            left: 140%;
        }

        @media (prefers-reduced-motion: reduce) {
            .dash-banner-anim,
            .dash-card-1,
            .dash-card-2,
            .dash-card-3,
            .dash-accent-bar,
            .dash-active-badge,
            .dash-card-hover,
            .dash-btn-shine,
            .dash-btn-shine::after {
                animation: none !important;
                transition: none !important;
            }
        }
    </style>

    <x-slot name="header">
        <div class="bg-[#142D4E] border-b border-[#234878] py-4 px-3 sm:px-6 lg:px-8">
            <h2 class="font-extrabold text-xl sm:text-2xl text-[#FFFFFF] leading-tight flex items-center gap-2">
                <span class="w-2 h-6 bg-[#F28C28] rounded-full inline-block dash-accent-bar"></span>
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6 sm:py-12 bg-[#142D4E] min-h-[calc(100vh-8rem)] overflow-x-clip">
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 space-y-5 sm:space-y-6">
            
            <!-- Welcome Alert / Banner -->
            <div class="bg-[#0f223a]/80 backdrop-blur-md border-l-4 border-[#F28C28] rounded-xl shadow-xl p-4 sm:p-6 transition-all duration-300 dash-banner-anim">
                <div class="flex items-start sm:items-center justify-between flex-col sm:flex-row gap-3 sm:gap-4">
                    <div class="space-y-1 min-w-0">
                        <p class="text-[#FFFFFF] font-bold text-base sm:text-xl leading-snug">
                            {{ __("You're logged in!") }}
                        </p>
                        <p class="text-[#F28C28] text-xs sm:text-sm leading-relaxed">
                            Welcome back to your control panel. Everything is running smoothly.
                        </p>
                    </div>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs bg-[#F28C28] text-[#142D4E] shadow-sm font-bold shrink-0 dash-active-badge">
                        Active Session
                    </span>
                </div>
            </div>

            <!-- Stats / Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                
                <!-- Card 1 -->
                <div class="bg-[#0f223a]/70 border border-[#234878] rounded-2xl p-5 sm:p-6 shadow-lg hover:border-[#F28C28] transition-all duration-200 dash-card-hover dash-card-1">
                    <div class="flex items-center justify-between gap-2">
                        <span class="text-[#F28C28] text-xs font-bold uppercase tracking-wider">Overview</span>
                        <span class="text-xs bg-[#142D4E] text-[#FFFFFF] px-2 py-0.5 rounded border border-[#234878]">Stats</span>
                    </div>
                    <p class="text-2xl sm:text-3xl font-extrabold text-[#FFFFFF] mt-2">100%</p>
                    <p class="text-[#FFFFFF]/70 text-xs sm:text-sm mt-1">System Operational</p>
                </div>

                <!-- Card 2 (Linked to Profile Edit) -->
                <div class="bg-[#0f223a]/70 border border-[#234878] rounded-2xl p-5 sm:p-6 shadow-lg hover:border-[#F28C28] transition-all duration-200 flex flex-col justify-between dash-card-hover dash-card-2">
                    <div>
                        <div class="flex items-center justify-between gap-2">
                            <span class="text-[#F28C28] text-xs font-bold uppercase tracking-wider">Quick Actions</span>
                            <span class="text-xs bg-[#142D4E] text-[#FFFFFF] px-2 py-0.5 rounded border border-[#234878]">Action</span>
                        </div>
                        <p class="text-sm sm:text-base font-semibold text-[#FFFFFF] mt-2">Update Account Details</p>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('profile.edit') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2.5 sm:py-2 bg-[#F28C28] hover:bg-[#d97920] text-[#142D4E] text-xs font-extrabold rounded-lg transition-all duration-150 shadow-md dash-btn-shine">
                            Manage Profile & Password →
                        </a>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-[#0f223a]/70 border border-[#234878] rounded-2xl p-5 sm:p-6 shadow-lg hover:border-[#F28C28] transition-all duration-200 sm:col-span-2 lg:col-span-1 dash-card-hover dash-card-3">
                    <div class="flex items-center justify-between gap-2">
                        <span class="text-[#F28C28] text-xs font-bold uppercase tracking-wider">Security</span>
                        <span class="text-xs bg-[#142D4E] text-[#F28C28] px-2 py-0.5 rounded border border-[#234878]">Protected</span>
                    </div>
                    <p class="text-sm sm:text-base font-semibold text-[#FFFFFF] mt-2">Encrypted Session</p>
                    <p class="text-[#FFFFFF]/70 text-xs sm:text-sm mt-1">Your account is fully secured.</p>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>