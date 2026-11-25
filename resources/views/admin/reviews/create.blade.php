<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-lg sm:text-xl text-slate-800 dark:text-slate-200">Add New Client Review</h2>
    </x-slot>

    <div class="py-6 sm:py-12">
        <div class="max-w-3xl mx-auto px-3 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-900 shadow-sm rounded-xl p-4 sm:p-8 border border-slate-200 dark:border-slate-800">

                <form action="{{ route('admin.reviews.store') }}" method="POST" class="space-y-5 sm:space-y-6">
                    @csrf

                    <!-- Client Name -->
                    <div>
                        <label for="client_name" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Client Name</label>
                        <input id="client_name" type="text" name="client_name" value="{{ old('client_name') }}" required placeholder="e.g., David Miller" class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 rounded-lg px-4 py-3 text-base text-slate-900 dark:text-white focus:border-amber-500 focus:ring-amber-500">
                        @error('client_name') <span class="text-rose-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Location -->
                    <div>
                        <label for="location" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Location</label>
                        <input id="location" type="text" name="location" value="{{ old('location') }}" required placeholder="e.g., Austin, Texas" class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 rounded-lg px-4 py-3 text-base text-slate-900 dark:text-white focus:border-amber-500 focus:ring-amber-500">
                        @error('location') <span class="text-rose-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Rating -->
                    <div>
                        <label for="rating" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Rating (1 to 5 Stars)</label>
                        <select id="rating" name="rating" required class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 rounded-lg px-4 py-3 text-base text-slate-900 dark:text-white focus:border-amber-500 focus:ring-amber-500">
                            <option value="5">5 Stars - Excellent</option>
                            <option value="4">4 Stars - Very Good</option>
                            <option value="3">3 Stars - Good</option>
                            <option value="2">2 Stars - Fair</option>
                            <option value="1">1 Star - Poor</option>
                        </select>
                        @error('rating') <span class="text-rose-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Review Text (Database Column match) -->
                    <div>
                        <label for="review_text" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Review Comment</label>
                        <textarea id="review_text" name="review_text" rows="5" required placeholder="Write the client's review here..." class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 rounded-lg px-4 py-3 text-base text-slate-900 dark:text-white focus:border-amber-500 focus:ring-amber-500 resize-y">{{ old('review_text') }}</textarea>
                        @error('review_text') <span class="text-rose-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Buttons: stacked on mobile, Save on top -->
                    <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3 sm:gap-4 pt-4 border-t border-slate-200 dark:border-slate-800">
                        <a href="{{ route('admin.reviews.index') }}" class="w-full sm:w-auto text-center px-5 py-3 sm:py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 text-slate-700 dark:text-slate-300 font-semibold hover:bg-slate-100 dark:hover:bg-slate-800 transition">Cancel</a>
                        <button type="submit" class="w-full sm:w-auto bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold px-6 py-3 sm:py-2.5 rounded-lg shadow-md transition">Save Review</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>