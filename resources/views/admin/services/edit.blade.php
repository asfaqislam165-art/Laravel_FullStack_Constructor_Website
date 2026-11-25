<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-lg sm:text-xl text-slate-800 dark:text-slate-200">Edit Roofing Service</h2>
    </x-slot>

    <div class="py-6 sm:py-12">
        <div class="max-w-4xl mx-auto px-3 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-900 shadow-sm rounded-2xl p-4 sm:p-8 border border-slate-200 dark:border-slate-800">

                <form method="POST" action="{{ route('admin.services.update', $service->id) }}" enctype="multipart/form-data" class="space-y-5 sm:space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Service Title</label>
                        <input id="title" type="text" name="title" value="{{ old('title', $service->title) }}" required class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-800 rounded-xl px-4 py-3 text-base text-slate-900 dark:text-white focus:ring-2 focus:ring-amber-500 outline-none">
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Category</label>
                        <input id="category" type="text" name="category" value="{{ old('category', $service->category) }}" required class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-800 rounded-xl px-4 py-3 text-base text-slate-900 dark:text-white focus:ring-2 focus:ring-amber-500 outline-none">
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Description</label>
                        <textarea id="description" name="description" rows="5" required class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-800 rounded-xl px-4 py-3 text-base text-slate-900 dark:text-white focus:ring-2 focus:ring-amber-500 outline-none resize-y">{{ old('description', $service->description) }}</textarea>
                    </div>

                    <!-- Features -->
                    <div>
                        <label for="features" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Features (Comma separated)</label>
                        <input id="features" type="text" name="features" value="{{ old('features', is_array($service->features) ? implode(', ', $service->features) : $service->features) }}" class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-800 rounded-xl px-4 py-3 text-base text-slate-900 dark:text-white focus:ring-2 focus:ring-amber-500 outline-none">
                    </div>

                    <!-- Service Image -->
                    <div class="space-y-3 min-w-0">
                        <label for="image" class="block text-sm font-bold text-slate-700 dark:text-slate-300">Service Image (Optional)</label>
                        @if($service->image)
                            <div class="mb-2">
                                <img src="{{ asset($service->image) }}" alt="Current service image" class="w-28 h-20 sm:w-24 sm:h-16 object-cover rounded-lg border border-slate-700">
                            </div>
                        @endif
                        <input id="image" type="file" name="image" accept="image/*" class="block w-full min-w-0 text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-amber-500 file:text-slate-950 hover:file:bg-amber-400 cursor-pointer">
                    </div>

                    <!-- Buttons: stacked on mobile, Update on top -->
                    <div class="flex flex-col-reverse sm:flex-row sm:items-center gap-3 sm:gap-4 pt-4 border-t border-slate-200 dark:border-slate-800">
                        <a href="{{ route('admin.services.index') }}" class="w-full sm:w-auto text-center px-6 py-3 rounded-xl border border-slate-300 dark:border-slate-700 text-slate-700 dark:text-slate-300 font-bold hover:bg-slate-100 dark:hover:bg-slate-800 transition">Cancel</a>
                        <button type="submit" class="w-full sm:w-auto px-6 py-3 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-extrabold transition shadow-lg shadow-amber-500/20">Update Service</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>