<nav
    x-data="{ open: false }"
    @keydown.escape.window="open = false"
    @resize.window="if (window.innerWidth >= 1280) open = false"
    @click.outside="open = false"
    class="sticky top-0 z-50 border-b border-[#F28C28]/30 bg-[#142D4E] text-white"
>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between gap-3 sm:h-20">

            {{-- Logo --}}
            <a
                href="{{ route('home') }}"
                class="shrink-0 whitespace-nowrap text-lg font-black tracking-wide text-white sm:text-2xl"
            >
                APEX<span class="text-[#F28C28]">ROOFING</span>
            </a>

            {{-- Desktop Navigation --}}
            <div class="hidden items-center gap-4 whitespace-nowrap text-sm font-medium xl:flex">
                <a href="{{ route('home') }}" class="transition hover:text-[#F28C28]">
                    Home
                </a>

                <a href="{{ route('about') }}" class="transition hover:text-[#F28C28]">
                    About Us
                </a>

                <a href="{{ route('services') }}" class="transition hover:text-[#F28C28]">
                    Services
                </a>

                <a href="{{ route('projects') }}" class="transition hover:text-[#F28C28]">
                    Projects
                </a>

                <a href="{{ route('reviews') }}" class="transition hover:text-[#F28C28]">
                    Reviews
                </a>

                <a href="{{ route('contact') }}" class="transition hover:text-[#F28C28]">
                    Contact
                </a>

                <a href="{{ route('quote') }}" class="font-bold text-[#F28C28] transition hover:text-white">
                    Get Quote
                </a>
            </div>

            {{-- Desktop Auth Controls --}}
            <div class="hidden shrink-0 items-center gap-3 whitespace-nowrap xl:flex">
                @auth
                    @if (Auth::user()->usertype === 'admin')
                        <div class="flex items-center gap-3 rounded-xl border border-[#234878] bg-[#0f223a] px-3 py-2">
                            <a
                                href="{{ route('admin.dashboard') }}"
                                class="text-sm font-extrabold text-[#F28C28] hover:underline"
                            >
                                Dashboard
                            </a>

                            <span class="text-slate-500">|</span>

                            <a
                                href="{{ route('profile.edit') }}"
                                class="text-sm font-bold text-slate-300 transition hover:text-white"
                            >
                                Settings
                            </a>
                        </div>
                    @else
                        <a
                            href="{{ route('profile.edit') }}"
                            class="text-sm font-semibold text-slate-300 transition hover:text-white"
                        >
                            Profile
                        </a>
                    @endif

                    <span class="max-w-[6rem] truncate text-sm font-semibold text-white/80">
                        Hi, {{ Auth::user()->name }}
                    </span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button
                            type="submit"
                            class="cursor-pointer rounded-lg border border-white/40 px-3 py-2 text-xs font-bold transition hover:bg-white hover:text-[#142D4E]"
                        >
                            Log Out
                        </button>
                    </form>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="text-sm font-semibold text-white/80 transition hover:text-white"
                    >
                        Log in
                    </a>

                    <a
                        href="{{ route('register') }}"
                        class="rounded-lg bg-[#F28C28] px-4 py-2 text-sm font-bold text-[#142D4E] shadow transition hover:bg-[#d97a1c]"
                    >
                        Register
                    </a>
                @endauth
            </div>

            {{-- Mobile / Tablet Toggle --}}
            <button
                type="button"
                @click="open = !open"
                :aria-expanded="open.toString()"
                :aria-label="open ? 'Close navigation menu' : 'Open navigation menu'"
                aria-controls="mobile-menu"
                class="inline-flex h-11 w-11 shrink-0 cursor-pointer items-center justify-center rounded-lg border border-white/20 transition hover:bg-white/10 focus:outline-none focus-visible:ring-2 focus-visible:ring-[#F28C28] xl:hidden"
            >
                {{-- Hamburger --}}
                <svg
                    x-show="!open"
                    class="h-6 w-6"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"
                    />
                </svg>

                {{-- Close Icon --}}
                <svg
                    x-cloak
                    x-show="open"
                    class="h-6 w-6"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"
                    />
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div
        id="mobile-menu"
        x-cloak
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        @click="if ($event.target.closest('a')) open = false"
        class="absolute inset-x-0 top-full max-h-[calc(100dvh-4rem)] overflow-y-auto border-t border-white/10 bg-[#142D4E] shadow-xl sm:max-h-[calc(100dvh-5rem)] xl:hidden"
    >
        <div class="mx-auto max-w-7xl space-y-1 px-4 py-3 font-medium sm:px-6">
            <a
                href="{{ route('home') }}"
                class="block rounded-lg px-3 py-3 transition hover:bg-white/10 hover:text-[#F28C28]"
            >
                Home
            </a>

            <a
                href="{{ route('about') }}"
                class="block rounded-lg px-3 py-3 transition hover:bg-white/10 hover:text-[#F28C28]"
            >
                About Us
            </a>

            <a
                href="{{ route('services') }}"
                class="block rounded-lg px-3 py-3 transition hover:bg-white/10 hover:text-[#F28C28]"
            >
                Services
            </a>

            <a
                href="{{ route('projects') }}"
                class="block rounded-lg px-3 py-3 transition hover:bg-white/10 hover:text-[#F28C28]"
            >
                Projects
            </a>

            <a
                href="{{ route('reviews') }}"
                class="block rounded-lg px-3 py-3 transition hover:bg-white/10 hover:text-[#F28C28]"
            >
                Reviews
            </a>

            <a
                href="{{ route('contact') }}"
                class="block rounded-lg px-3 py-3 transition hover:bg-white/10 hover:text-[#F28C28]"
            >
                Contact
            </a>

            <a
                href="{{ route('quote') }}"
                class="block rounded-lg bg-[#F28C28]/10 px-3 py-3 font-bold text-[#F28C28] transition hover:bg-[#F28C28]/20"
            >
                Get Quote
            </a>
        </div>

        {{-- Mobile Auth --}}
        <div class="mx-auto max-w-7xl space-y-2 border-t border-white/10 px-4 pb-4 pt-3 sm:px-6">
            @auth
                <p class="break-words px-3 text-sm font-semibold text-white/80">
                    Hi, {{ Auth::user()->name }}
                </p>

                @if (Auth::user()->usertype === 'admin')
                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="block rounded-lg border border-[#234878] bg-[#0f223a] px-3 py-3 text-sm font-extrabold text-[#F28C28]"
                    >
                        Admin Dashboard
                    </a>

                    <a
                        href="{{ route('profile.edit') }}"
                        class="block rounded-lg px-3 py-3 text-sm font-bold text-slate-300 transition hover:bg-white/10 hover:text-white"
                    >
                        Settings
                    </a>
                @else
                    <a
                        href="{{ route('profile.edit') }}"
                        class="block rounded-lg px-3 py-3 text-sm font-semibold text-slate-300 transition hover:bg-white/10 hover:text-white"
                    >
                        Profile
                    </a>
                @endif

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="w-full cursor-pointer rounded-lg border border-white/40 px-3 py-3 text-sm font-bold transition hover:bg-white hover:text-[#142D4E]"
                    >
                        Log Out
                    </button>
                </form>
            @else
                <div class="grid grid-cols-2 gap-3">
                    <a
                        href="{{ route('login') }}"
                        class="rounded-lg border border-white/40 px-3 py-3 text-center text-sm font-semibold transition hover:bg-white/10"
                    >
                        Log in
                    </a>

                    <a
                        href="{{ route('register') }}"
                        class="rounded-lg bg-[#F28C28] px-3 py-3 text-center text-sm font-bold text-[#142D4E] shadow transition hover:bg-[#d97a1c]"
                    >
                        Register
                    </a>
                </div>
            @endauth
        </div>
    </div>
</nav>