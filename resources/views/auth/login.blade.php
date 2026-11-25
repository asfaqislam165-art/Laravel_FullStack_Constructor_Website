<x-guest-layout>
    <div class="w-full">
        <!-- Branding Header -->
        <div class="mb-6 text-center space-y-1.5">
            <h2 class="text-2xl sm:text-3xl font-black text-white tracking-tight">
                Welcome Back
            </h2>
            <p class="text-xs sm:text-sm text-slate-300 font-medium">
                Sign in to manage your estimates, projects & account
            </p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4 text-emerald-400 text-xs text-center font-semibold bg-emerald-500/10 border border-emerald-500/30 p-3 rounded-xl shadow-inner" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email Address -->
            <div class="space-y-1.5">
                <x-input-label for="email" :value="__('Email Address')" class="text-slate-200 font-bold text-xs uppercase tracking-wider" />
                <x-text-input id="email" class="block w-full bg-[#142D4E] border-[#234878] text-white placeholder-slate-400 focus:border-[#F28C28] focus:ring-1 focus:ring-[#F28C28] rounded-xl px-4 py-3 text-sm transition-all shadow-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="name@example.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-rose-400 font-medium" />
            </div>

            <!-- Password -->
            <div class="space-y-1.5">
                <div class="flex justify-between items-center">
                    <x-input-label for="password" :value="__('Password')" class="text-slate-200 font-bold text-xs uppercase tracking-wider" />

                    @if (Route::has('password.request'))
                        <a class="text-xs text-[#F28C28] hover:underline font-semibold transition-colors" href="{{ route('password.request') }}">
                            {{ __('Forgot password?') }}
                        </a>
                    @endif
                </div>

                <x-text-input id="password" class="block w-full bg-[#142D4E] border-[#234878] text-white placeholder-slate-400 focus:border-[#F28C28] focus:ring-1 focus:ring-[#F28C28] rounded-xl px-4 py-3 text-sm transition-all shadow-sm"
                            type="password"
                            name="password"
                            required autocomplete="current-password"
                            placeholder="••••••••" />

                <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-rose-400 font-medium" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center pt-1">
                <label for="remember_me" class="inline-flex items-center cursor-pointer">
                    <input id="remember_me" type="checkbox" class="rounded bg-[#142D4E] border-[#234878] text-[#F28C28] shadow-sm focus:ring-[#F28C28] w-4 h-4 cursor-pointer" name="remember">
                    <span class="ms-2.5 text-xs sm:text-sm text-slate-300 font-medium">{{ __('Remember this device') }}</span>
                </label>
            </div>

            <!-- Submit Button -->
            <div class="pt-2">
                <button type="submit" class="w-full bg-[#F28C28] hover:bg-[#d97a1c] text-[#142D4E] font-extrabold py-3.5 px-4 rounded-xl shadow-lg hover:shadow-[#F28C28]/30 transition-all duration-200 text-center text-sm sm:text-base cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#F28C28]">
                    {{ __('Log In to Dashboard') }}
                </button>
            </div>

            <!-- Register Link -->
            <div class="text-center pt-5 border-t border-[#234878] text-xs sm:text-sm text-slate-300">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-[#F28C28] font-bold hover:underline ml-1 underline-offset-4">
                    Register now
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>