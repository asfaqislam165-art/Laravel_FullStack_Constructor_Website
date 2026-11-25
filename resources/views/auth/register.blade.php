<x-guest-layout>
    <div class="w-full">
        <!-- Branding Header -->
        <div class="mb-6 text-center space-y-1.5">
            <h2 class="text-2xl sm:text-3xl font-black text-white tracking-tight">
                Create Account
            </h2>
            <p class="text-xs sm:text-sm text-slate-300 font-medium">
                Register to request quotes & track roof inspections
            </p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Name -->
            <div class="space-y-1.5">
                <x-input-label for="name" :value="__('Full Name')" class="text-slate-200 font-bold text-xs uppercase tracking-wider" />
                <x-text-input id="name" class="block w-full bg-[#142D4E] border-[#234878] text-white placeholder-slate-400 focus:border-[#F28C28] focus:ring-1 focus:ring-[#F28C28] rounded-xl px-4 py-3 text-sm transition-all shadow-sm" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="John Doe" />
                <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs text-rose-400 font-medium" />
            </div>

            <!-- Email Address -->
            <div class="space-y-1.5">
                <x-input-label for="email" :value="__('Email Address')" class="text-slate-200 font-bold text-xs uppercase tracking-wider" />
                <x-text-input id="email" class="block w-full bg-[#142D4E] border-[#234878] text-white placeholder-slate-400 focus:border-[#F28C28] focus:ring-1 focus:ring-[#F28C28] rounded-xl px-4 py-3 text-sm transition-all shadow-sm" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="name@example.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-rose-400 font-medium" />
            </div>

            <!-- Password -->
            <div class="space-y-1.5">
                <x-input-label for="password" :value="__('Password')" class="text-slate-200 font-bold text-xs uppercase tracking-wider" />
                <x-text-input id="password" class="block w-full bg-[#142D4E] border-[#234878] text-white placeholder-slate-400 focus:border-[#F28C28] focus:ring-1 focus:ring-[#F28C28] rounded-xl px-4 py-3 text-sm transition-all shadow-sm"
                            type="password"
                            name="password"
                            required autocomplete="new-password"
                            placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-rose-400 font-medium" />
            </div>

            <!-- Confirm Password -->
            <div class="space-y-1.5">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-slate-200 font-bold text-xs uppercase tracking-wider" />
                <x-text-input id="password_confirmation" class="block w-full bg-[#142D4E] border-[#234878] text-white placeholder-slate-400 focus:border-[#F28C28] focus:ring-1 focus:ring-[#F28C28] rounded-xl px-4 py-3 text-sm transition-all shadow-sm"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-xs text-rose-400 font-medium" />
            </div>

            <!-- Submit Button -->
            <div class="pt-2">
                <button type="submit" class="w-full bg-[#F28C28] hover:bg-[#d97a1c] text-[#142D4E] font-extrabold py-3.5 px-4 rounded-xl shadow-lg hover:shadow-[#F28C28]/30 transition-all duration-200 text-center text-sm sm:text-base cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#F28C28]">
                    {{ __('Create Account') }}
                </button>
            </div>

            <!-- Already Registered & Forgot Password Links -->
            <div class="flex items-center justify-between pt-5 border-t border-[#234878] text-xs sm:text-sm text-slate-300">
                <div>
                    Already registered? 
                    <a href="{{ route('login') }}" class="text-[#F28C28] font-bold hover:underline ml-1 underline-offset-4">
                        Log in
                    </a>
                </div>
                <div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-[#F28C28] font-semibold hover:underline underline-offset-4">
                            Forgot password?
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</x-guest-layout>