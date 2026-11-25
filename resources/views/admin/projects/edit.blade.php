<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-lg sm:text-xl text-slate-800 dark:text-slate-200">Edit Roofing Project</h2>
    </x-slot>

    <div class="py-6 sm:py-12">
        <div class="max-w-4xl mx-auto px-3 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-900 shadow-sm rounded-2xl p-4 sm:p-8 border border-slate-200 dark:border-slate-800">

                <form method="POST" action="{{ route('admin.projects.update', $project->id) }}" enctype="multipart/form-data" class="space-y-5 sm:space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Project Title</label>
                        <input id="title" type="text" name="title" value="{{ old('title', $project->title) }}" required class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-800 rounded-xl px-4 py-3 text-base text-slate-900 dark:text-white focus:ring-2 focus:ring-amber-500 outline-none">
                    </div>

                    <!-- Location -->
                    <div>
                        <label for="location" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Project Location</label>
                        <input id="location" type="text" name="location" value="{{ old('location', $project->location) }}" required class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-800 rounded-xl px-4 py-3 text-base text-slate-900 dark:text-white focus:ring-2 focus:ring-amber-500 outline-none">
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Description</label>
                        <textarea id="description" name="description" rows="5" required class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-800 rounded-xl px-4 py-3 text-base text-slate-900 dark:text-white focus:ring-2 focus:ring-amber-500 outline-none resize-y">{{ old('description', $project->description) }}</textarea>
                    </div>

                    <!-- Images Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 sm:gap-6 pt-2">
                        <!-- Before Image -->
                        <div class="min-w-0 space-y-3">
                            <label for="before_image" class="block text-sm font-bold text-slate-700 dark:text-slate-300">Before Image (Optional)</label>
                            @if($project->before_image)
                                <img src="{{ asset($project->before_image) }}" alt="Current before image" class="w-24 h-24 sm:w-28 sm:h-28 object-cover rounded-xl border border-slate-700 shadow">
                            @endif
                            <input id="before_image" type="file" name="before_image" accept="image/*" class="block w-full min-w-0 text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-amber-500 file:text-slate-950 hover:file:bg-amber-400 cursor-pointer">
                        </div>

                        <!-- After Image -->
                        <div class="min-w-0 space-y-3">
                            <label for="after_image" class="block text-sm font-bold text-slate-700 dark:text-slate-300">After Image (Optional)</label>
                            @if($project->after_image)
                                <img src="{{ asset($project->after_image) }}" alt="Current after image" class="w-24 h-24 sm:w-28 sm:h-28 object-cover rounded-xl border border-amber-500 shadow">
                            @endif
                            <input id="after_image" type="file" name="after_image" accept="image/*" class="block w-full min-w-0 text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-amber-500 file:text-slate-950 hover:file:bg-amber-400 cursor-pointer">
                        </div>
                    </div>

                    <!-- Buttons: stacked on mobile, Update on top -->
                    <div class="flex flex-col-reverse sm:flex-row sm:items-center gap-3 sm:gap-4 pt-4 border-t border-slate-200 dark:border-slate-800">
                        <a href="{{ route('admin.projects.index') }}" class="w-full sm:w-auto text-center px-6 py-3 rounded-xl border border-slate-300 dark:border-slate-700 text-slate-700 dark:text-slate-300 font-bold hover:bg-slate-100 dark:hover:bg-slate-800 transition">Cancel</a>
                        <button type="submit" class="w-full sm:w-auto px-6 py-3 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-extrabold transition shadow-lg shadow-amber-500/20">Update Project</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>