<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Project | Apex Roofing Pro</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-950 text-slate-100 font-sans min-h-screen flex flex-col antialiased selection:bg-amber-500 selection:text-slate-950 overflow-x-hidden">

    @include('layouts.navigation')

    <main class="flex-grow relative overflow-hidden px-3 sm:px-6 lg:px-8 py-8 sm:py-12 md:py-16">

        <!-- Background Glow Orbs (smaller on mobile) -->
        <div class="absolute top-10 left-0 sm:left-1/4 w-56 h-56 sm:w-96 sm:h-96 bg-amber-500/10 rounded-full blur-[80px] sm:blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-10 right-0 sm:right-1/4 w-56 h-56 sm:w-96 sm:h-96 bg-blue-500/10 rounded-full blur-[80px] sm:blur-[120px] pointer-events-none"></div>

        <div class="relative w-full max-w-3xl mx-auto">

            <!-- Page Header -->
            <div class="text-center mb-6 sm:mb-10 space-y-3">
                <span class="inline-flex items-center gap-2 bg-amber-500/10 text-amber-400 border border-amber-500/20 px-3 sm:px-4 py-1.5 rounded-full text-[10px] sm:text-xs font-bold uppercase tracking-widest">
                    <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                    Portfolio Management
                </span>
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-black tracking-tight text-white">
                    Add New <span class="text-amber-400">Project</span>
                </h1>
                <p class="text-slate-400 text-sm sm:text-base max-w-lg mx-auto leading-relaxed px-2">
                    Showcase high-impact roofing craftsmanship. Upload before & after transformations to impress prospective clients.
                </p>
            </div>

            <!-- Main Form Card -->
            <div class="bg-slate-900/90 backdrop-blur-xl border border-slate-800 rounded-2xl sm:rounded-3xl shadow-2xl overflow-hidden">

                <!-- Card Header Banner: stacks on mobile -->
                <div class="bg-slate-950 px-4 sm:px-10 py-5 sm:py-6 border-b border-slate-800 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div class="flex items-center gap-3 sm:gap-4 min-w-0">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-amber-500/10 border border-amber-500/20 rounded-xl sm:rounded-2xl flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <h2 class="text-base sm:text-lg font-bold text-white">Project Specification</h2>
                            <p class="text-slate-400 text-xs mt-0.5">Complete all required fields below to publish.</p>
                        </div>
                    </div>
                    <a href="{{ route('admin.projects.index') }}" class="w-full sm:w-auto text-center text-xs font-bold text-slate-400 hover:text-white bg-slate-800/60 border border-slate-700/60 px-4 py-2.5 rounded-xl transition shrink-0">
                        &larr; Back to List
                    </a>
                </div>

                <!-- Form Body -->
                <div class="px-4 sm:px-10 py-6 sm:py-8">
                    <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" class="space-y-6 sm:space-y-8">
                        @csrf

                        <!-- Section 1: Basic Information -->
                        <div class="space-y-4 sm:space-y-5">
                            <div class="flex items-center gap-2.5 text-amber-400 font-bold text-xs sm:text-sm uppercase tracking-wider">
                                <span class="w-6 h-6 rounded-lg bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-xs shrink-0">1</span>
                                Core Details
                            </div>

                            <!-- Title -->
                            <div class="space-y-2">
                                <label for="title" class="block text-sm font-semibold text-slate-300">
                                    Project Title <span class="text-amber-400">*</span>
                                </label>
                                <input
                                    id="title"
                                    name="title"
                                    type="text"
                                    value="{{ old('title') }}"
                                    required
                                    placeholder="e.g. Complete Architectural Shingle Replacement"
                                    class="w-full bg-slate-950 border border-slate-800 text-white text-base placeholder-slate-600 focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 rounded-xl px-4 py-3 sm:py-3.5 outline-none transition"
                                >
                                @error('title')
                                    <p class="text-xs text-rose-500 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Location -->
                            <div class="space-y-2">
                                <label for="location" class="block text-sm font-semibold text-slate-300">
                                    Project Location <span class="text-amber-400">*</span>
                                </label>
                                <input
                                    id="location"
                                    name="location"
                                    type="text"
                                    value="{{ old('location') }}"
                                    required
                                    placeholder="e.g. Dallas, Texas"
                                    class="w-full bg-slate-950 border border-slate-800 text-white text-base placeholder-slate-600 focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 rounded-xl px-4 py-3 sm:py-3.5 outline-none transition"
                                >
                                @error('location')
                                    <p class="text-xs text-rose-500 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="space-y-2">
                                <label for="description" class="block text-sm font-semibold text-slate-300">
                                    Project Description & Scope <span class="text-amber-400">*</span>
                                </label>
                                <textarea
                                    id="description"
                                    name="description"
                                    rows="5"
                                    required
                                    placeholder="Describe the challenges, materials used (e.g., Owens Corning shingles), and final outcome..."
                                    class="w-full bg-slate-950 border border-slate-800 text-white text-base placeholder-slate-600 focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 rounded-xl px-4 py-3 sm:py-3.5 outline-none transition resize-y"
                                >{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="text-xs text-rose-500 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="border-t border-slate-800"></div>

                        <!-- Section 2: Image Uploads -->
                        <div class="space-y-4 sm:space-y-5">
                            <div class="flex items-center gap-2.5 text-amber-400 font-bold text-xs sm:text-sm uppercase tracking-wider">
                                <span class="w-6 h-6 rounded-lg bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-xs shrink-0">2</span>
                                Before & After Imagery
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">

                                <!-- Before Image Upload -->
                                <div class="min-w-0 border-2 border-dashed border-slate-800 hover:border-amber-500/50 rounded-2xl p-4 sm:p-6 transition bg-slate-950/50 group text-center">
                                    <div class="w-10 h-10 sm:w-12 sm:h-12 mx-auto rounded-xl bg-slate-900 border border-slate-800 flex items-center justify-center mb-3 text-slate-400 group-hover:text-amber-400 transition">
                                        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4-4 4 4 4-6 4 6M4 6h16v14H4z"/>
                                        </svg>
                                    </div>
                                    <label for="before_image" class="block text-sm font-bold text-white mb-1">
                                        Before Image <span class="text-amber-400">*</span>
                                    </label>
                                    <p class="text-xs text-slate-400 mb-3 sm:mb-4">Original damaged state</p>

                                    <input
                                        type="file"
                                        name="before_image"
                                        id="before_image"
                                        accept="image/*"
                                        required
                                        class="block w-full min-w-0 text-xs text-slate-400 file:mr-3 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-slate-800 file:text-amber-400 hover:file:bg-slate-700 cursor-pointer"
                                    >
                                    @error('before_image')
                                        <p class="text-xs text-rose-500 font-medium mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- After Image Upload -->
                                <div class="min-w-0 border-2 border-dashed border-slate-800 hover:border-amber-500/50 rounded-2xl p-4 sm:p-6 transition bg-slate-950/50 group text-center">
                                    <div class="w-10 h-10 sm:w-12 sm:h-12 mx-auto rounded-xl bg-slate-900 border border-slate-800 flex items-center justify-center mb-3 text-slate-400 group-hover:text-amber-400 transition">
                                        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </div>
                                    <label for="after_image" class="block text-sm font-bold text-white mb-1">
                                        After Image <span class="text-amber-400">*</span>
                                    </label>
                                    <p class="text-xs text-slate-400 mb-3 sm:mb-4">Completed pristine roof</p>

                                    <input
                                        type="file"
                                        name="after_image"
                                        id="after_image"
                                        accept="image/*"
                                        required
                                        class="block w-full min-w-0 text-xs text-slate-400 file:mr-3 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-amber-500 file:text-slate-950 hover:file:bg-amber-400 cursor-pointer font-bold"
                                    >
                                    @error('after_image')
                                        <p class="text-xs text-rose-500 font-medium mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="border-t border-slate-800"></div>

                        <!-- Action Buttons: Publish on top for mobile -->
                        <div class="flex flex-col-reverse sm:flex-row gap-3 sm:gap-4 pt-2">
                            <a href="{{ route('admin.projects.index') }}" class="w-full sm:w-1/3 flex items-center justify-center gap-2 border border-slate-700 hover:bg-slate-800 text-slate-300 font-bold py-3 sm:py-3.5 px-6 rounded-xl transition">
                                Cancel
                            </a>
                            <button type="submit" class="w-full sm:flex-1 flex items-center justify-center gap-2 bg-amber-500 hover:bg-amber-400 text-slate-950 font-extrabold py-3 sm:py-3.5 px-6 rounded-xl shadow-lg shadow-amber-500/20 transition cursor-pointer">
                                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                                Publish Project
                            </button>
                        </div>

                    </form>
                </div>
            </div>

            <!-- Footer Note -->
            <p class="text-center text-slate-500 text-xs mt-6 sm:mt-8">
                Apex Roofing Pro &copy; 2026 &bull; Secure Admin Portal
            </p>

        </div>
    </main>

    @include('layouts.footer')

</body>
</html>