<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between bg-[#142D4E] px-4 py-4 border-b border-[#234878]">
            <h2 class="font-extrabold text-xl text-white tracking-tight flex items-center gap-2">
                <span class="w-2 h-6 bg-[#F28C28] rounded-full inline-block"></span>
                🏗️ Create Before & After Project
            </h2>
            <a href="{{ route('admin.dashboard') }}" class="bg-[#0f223a] hover:bg-[#1f3f6c] text-white border border-[#234878] font-bold px-4 py-2 rounded-xl text-sm transition shadow">
                ← Back to Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-[#142D4E] min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Validation Errors Alert -->
            @if ($errors->any())
                <div class="p-4 bg-rose-500/10 border border-rose-500/30 text-rose-400 rounded-2xl text-sm shadow-inner">
                    <p class="font-bold mb-1">Please fix the following validation errors:</p>
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-[#0f223a]/90 backdrop-blur-md p-6 sm:p-10 rounded-3xl shadow-2xl border border-[#234878]">
                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label class="block font-bold text-white text-sm mb-2">Project Title *</label>
                        <input type="text" name="title" value="{{ old('title') }}" required placeholder="e.g., Residential Shingle Restoration" class="w-full bg-[#142D4E] border border-[#234878] rounded-xl px-4 py-3 text-white placeholder-slate-400 focus:outline-none focus:border-[#F28C28] focus:ring-1 focus:ring-[#F28C28] transition-all">
                    </div>

                    <div>
                        <label class="block font-bold text-white text-sm mb-2">Location (City, State) *</label>
                        <input type="text" name="location" value="{{ old('location') }}" required placeholder="e.g., Dallas, TX" class="w-full bg-[#142D4E] border border-[#234878] rounded-xl px-4 py-3 text-white placeholder-slate-400 focus:outline-none focus:border-[#F28C28] focus:ring-1 focus:ring-[#F28C28] transition-all">
                    </div>

                    <div>
                        <label class="block font-bold text-white text-sm mb-2">Description *</label>
                        <textarea name="description" rows="4" required placeholder="Describe the roof condition, damage extent, and replacement materials used..." class="w-full bg-[#142D4E] border border-[#234878] rounded-xl px-4 py-3 text-white placeholder-slate-400 focus:outline-none focus:border-[#F28C28] focus:ring-1 focus:ring-[#F28C28] transition-all">{{ old('description') }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block font-bold text-white text-sm mb-2">Before Image (Original Roof) *</label>
                            <input type="file" name="before_image" required accept="image/*" class="w-full bg-[#142D4E] border border-[#234878] rounded-xl p-3 text-sm text-slate-300 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-extrabold file:bg-[#F28C28] file:text-[#142D4E] hover:file:bg-[#d97a1c] cursor-pointer">
                        </div>
                        <div>
                            <label class="block font-bold text-white text-sm mb-2">After Image (Finished Roof) *</label>
                            <input type="file" name="after_image" required accept="image/*" class="w-full bg-[#142D4E] border border-[#234878] rounded-xl p-3 text-sm text-slate-300 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-extrabold file:bg-[#F28C28] file:text-[#142D4E] hover:file:bg-[#d97a1c] cursor-pointer">
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full sm:w-auto bg-[#F28C28] hover:bg-[#d97a1c] text-[#142D4E] font-extrabold px-8 py-3.5 rounded-xl shadow-lg hover:shadow-[#F28C28]/30 transition-all duration-200 cursor-pointer text-base">
                            Save Project
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>