<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-[#142D4E] px-4 py-4 border-b border-[#234878]">
            <h2 class="font-extrabold text-xl text-white tracking-tight flex items-center gap-2">
                <span class="w-2 h-6 bg-[#F28C28] rounded-full inline-block"></span>
                👤 My Account Profile
            </h2>
            <a href="{{ route('home') }}" class="bg-[#0f223a] hover:bg-[#1f3f6c] text-white border border-[#234878] font-bold px-4 py-2 rounded-xl text-sm transition shadow">
                ← Back to Home
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-[#142D4E] min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Success Status Message -->
            @if (session('status') === 'profile-updated')
                <div class="p-4 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 rounded-xl font-semibold text-sm shadow-inner">
                    ✓ Profile information updated successfully.
                </div>
            @endif
            @if (session('status') === 'password-updated')
                <div class="p-4 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 rounded-xl font-semibold text-sm shadow-inner">
                    ✓ Password changed successfully.
                </div>
            @endif

            <!-- 1. Profile Information Update Form -->
            <div class="bg-[#0f223a]/90 backdrop-blur-md shadow-2xl rounded-3xl p-6 sm:p-10 border border-[#234878]">
                <header class="mb-6">
                    <h3 class="text-xl font-extrabold text-white">Profile Information</h3>
                    <p class="text-sm text-white/70">Update your account's profile information and email address.</p>
                </header>

                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>

                <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
                    @csrf
                    @method('patch')

                    <div>
                        <label class="block text-sm font-bold text-white mb-2">Name</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name"
                            class="w-full bg-[#142D4E] border border-[#234878] rounded-xl px-4 py-3 text-white focus:outline-none focus:border-[#F28C28] focus:ring-1 focus:ring-[#F28C28]">
                        @error('name') <span class="text-rose-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-white mb-2">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" required autocomplete="username"
                            class="w-full bg-[#142D4E] border border-[#234878] rounded-xl px-4 py-3 text-white focus:outline-none focus:border-[#F28C28] focus:ring-1 focus:ring-[#F28C28]">
                        @error('email') <span class="text-rose-400 text-xs mt-1 block">{{ $message }}</span> @enderror

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                            <div>
                                <p class="text-sm mt-2 text-white">
                                    Your email address is unverified.
                                    <button form="send-verification" class="underline text-sm text-[#F28C28] hover:text-[#d97920] rounded-md focus:outline-none">
                                        Click here to re-send the verification email.
                                    </button>
                                </p>

                                @if (session('status') === 'verification-link-sent')
                                    <p class="mt-2 font-medium text-sm text-emerald-400">
                                        A new verification link has been sent to your email address.
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="bg-[#F28C28] hover:bg-[#d97920] text-[#142D4E] font-extrabold px-6 py-3 rounded-xl transition shadow-lg cursor-pointer">Save Changes</button>
                    </div>
                </form>
            </div>

            <!-- 2. Update Password Form -->
            <div class="bg-[#0f223a]/90 backdrop-blur-md shadow-2xl rounded-3xl p-6 sm:p-10 border border-[#234878]">
                <header class="mb-6">
                    <h3 class="text-xl font-extrabold text-white">Update Password</h3>
                    <p class="text-sm text-white/70">Ensure your account is using a long, random password to stay secure.</p>
                </header>

                <form method="post" action="{{ route('password.update') }}" class="space-y-6">
                    @csrf
                    @method('put')

                    <div>
                        <label class="block text-sm font-bold text-white mb-2">Current Password</label>
                        <input type="password" name="current_password" autocomplete="current-password"
                            class="w-full bg-[#142D4E] border border-[#234878] rounded-xl px-4 py-3 text-white focus:outline-none focus:border-[#F28C28] focus:ring-1 focus:ring-[#F28C28]">
                        @error('current_password', 'updatePassword') <span class="text-rose-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-white mb-2">New Password</label>
                        <input type="password" name="password" autocomplete="new-password"
                            class="w-full bg-[#142D4E] border border-[#234878] rounded-xl px-4 py-3 text-white focus:outline-none focus:border-[#F28C28] focus:ring-1 focus:ring-[#F28C28]">
                        @error('password', 'updatePassword') <span class="text-rose-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-white mb-2">Confirm Password</label>
                        <input type="password" name="password_confirmation" autocomplete="new-password"
                            class="w-full bg-[#142D4E] border border-[#234878] rounded-xl px-4 py-3 text-white focus:outline-none focus:border-[#F28C28] focus:ring-1 focus:ring-[#F28C28]">
                        @error('password_confirmation', 'updatePassword') <span class="text-rose-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="bg-[#F28C28] hover:bg-[#d97920] text-[#142D4E] font-extrabold px-6 py-3 rounded-xl transition shadow-lg cursor-pointer">Update Password</button>
                    </div>
                </form>
            </div>

            <!-- 3. Delete Account Danger Zone -->
            <div class="bg-[#0f223a]/90 backdrop-blur-md shadow-2xl rounded-3xl p-6 sm:p-10 border border-rose-500/40">
                <header class="mb-6">
                    <h3 class="text-xl font-extrabold text-rose-400">Delete Account</h3>
                    <p class="text-sm text-white/70">Once your account is deleted, all of its resources and data will be permanently deleted.</p>
                </header>

                <form method="post" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
                    @csrf
                    @method('delete')

                    <div class="mb-4">
                        <label class="block text-sm font-bold text-white mb-2">Enter Password to Confirm Deletion</label>
                        <input type="password" name="password" placeholder="Password" required
                            class="max-w-md w-full bg-[#142D4E] border border-rose-500/40 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-rose-500">
                        @error('password', 'userDeletion') <span class="text-rose-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="bg-rose-600 hover:bg-rose-700 text-white font-extrabold px-6 py-3 rounded-xl transition shadow-lg cursor-pointer">
                        Delete Account
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>