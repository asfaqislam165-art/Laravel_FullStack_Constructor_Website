<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">
            <h2 class="font-bold text-lg sm:text-xl text-slate-800 dark:text-slate-200">Edit Client Review</h2>
            <a href="{{ route('admin.reviews.index') }}" class="w-full sm:w-auto text-center bg-slate-700 hover:bg-slate-600 text-white font-bold px-4 py-2.5 sm:py-2 rounded-lg text-sm transition shadow">
                ← Back to Reviews
            </a>
        </div>
    </x-slot>

    <div class="py-6 sm:py-12">
        <div class="max-w-4xl mx-auto px-3 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-900 shadow-sm rounded-xl p-4 sm:p-8 border border-slate-200 dark:border-slate-800">

                @if ($errors->any())
                    <div class="mb-5 sm:mb-6 p-4 bg-rose-100 text-rose-800 rounded-lg text-sm font-medium">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)
                                <li class="break-words">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.reviews.update', $review->id) }}" method="POST" class="space-y-5 sm:space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 sm:gap-6">
                        <!-- Client Name -->
                        <div class="min-w-0">
                            <label for="client_name" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Client Name *</label>
                            <input id="client_name" type="text" name="client_name" value="{{ old('client_name', $review->client_name) }}" required
                                class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-800 rounded-lg px-4 py-3 sm:py-2.5 text-base text-slate-900 dark:text-white focus:outline-none focus:border-amber-500">
                        </div>

                        <!-- Location -->
                        <div class="min-w-0">
                            <label for="location" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Location (e.g. London, England) *</label>
                            <input id="location" type="text" name="location" value="{{ old('location', $review->location) }}" required
                                class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-800 rounded-lg px-4 py-3 sm:py-2.5 text-base text-slate-900 dark:text-white focus:outline-none focus:border-amber-500">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 sm:gap-6">
                        <!-- Rating -->
                        <div class="min-w-0">
                            <label for="rating" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Rating (1 to 5 Stars) *</label>
                            <select id="rating" name="rating" required class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-800 rounded-lg px-4 py-3 sm:py-2.5 text-base text-slate-900 dark:text-white focus:outline-none focus:border-amber-500">
                                <option value="5" {{ old('rating', $review->rating) == 5 ? 'selected' : '' }}>⭐⭐⭐⭐⭐ (5 Stars)</option>
                                <option value="4" {{ old('rating', $review->rating) == 4 ? 'selected' : '' }}>⭐⭐⭐⭐ (4 Stars)</option>
                                <option value="3" {{ old('rating', $review->rating) == 3 ? 'selected' : '' }}>⭐⭐⭐ (3 Stars)</option>
                                <option value="2" {{ old('rating', $review->rating) == 2 ? 'selected' : '' }}>⭐⭐ (2 Stars)</option>
                                <option value="1" {{ old('rating', $review->rating) == 1 ? 'selected' : '' }}>⭐ (1 Star)</option>
                            </select>
                        </div>

                        <!-- Service Type -->
                        <div class="min-w-0">
                            <label for="service_type" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Service Type</label>
                            <input id="service_type" type="text" name="service_type" value="{{ old('service_type', $review->service_type) }}" placeholder="e.g. Roof Replacement"
                                class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-800 rounded-lg px-4 py-3 sm:py-2.5 text-base text-slate-900 dark:text-white focus:outline-none focus:border-amber-500">
                        </div>
                    </div>

                    <!-- Comment / Review Text -->
                    <div>
                        <label for="review_text" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Review Comment *</label>
                        <textarea id="review_text" name="review_text" rows="5" required placeholder="Write what the client said..."
                            class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-800 rounded-lg px-4 py-3 sm:py-2.5 text-base text-slate-900 dark:text-white focus:outline-none focus:border-amber-500 resize-y">{{ old('review_text', $review->review_text) }}</textarea>
                    </div>

                    <!-- Buttons: stacked on mobile, Update on top -->
                    <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3 sm:gap-4">
                        <a href="{{ route('admin.reviews.index') }}" class="w-full sm:w-auto text-center px-6 py-3 sm:py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 font-bold transition">Cancel</a>
                        <button type="submit" class="w-full sm:w-auto bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold px-6 py-3 sm:py-2.5 rounded-lg transition shadow">Update Review</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>