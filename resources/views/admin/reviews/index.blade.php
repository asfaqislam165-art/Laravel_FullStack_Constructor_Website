<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">
            <h2 class="font-bold text-lg sm:text-xl text-slate-800 dark:text-slate-200">Manage Client Reviews</h2>
            <a href="{{ route('admin.reviews.create') }}" class="w-full sm:w-auto text-center bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold px-4 py-2.5 sm:py-2 rounded-lg text-sm transition shadow">
                + Add New Review
            </a>
        </div>
    </x-slot>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.css">
    <div class="py-6 sm:py-12">
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-900 shadow-sm rounded-xl p-3 sm:p-6 border border-slate-200 dark:border-slate-800">

                @if(session('status'))
                    <div class="mb-4 p-4 bg-emerald-100 text-emerald-800 rounded-lg text-sm font-medium">
                        {{ session('status') }}
                    </div>
                @endif

                {{-- Mobile: each row becomes a card. md and up: normal table. --}}
                <div class="md:overflow-x-auto">
                    <table class="block md:table min-w-full md:divide-y divide-slate-200 dark:divide-slate-800 text-sm">
                        <thead class="hidden md:table-header-group bg-slate-50 dark:bg-slate-950">
                            <tr>
                                <th class="px-4 py-3 text-left font-bold text-slate-600 dark:text-slate-400">Client Name</th>
                                <th class="px-4 py-3 text-left font-bold text-slate-600 dark:text-slate-400">Location</th>
                                <th class="px-4 py-3 text-left font-bold text-slate-600 dark:text-slate-400">Rating</th>
                                <th class="px-4 py-3 text-left font-bold text-slate-600 dark:text-slate-400">Review Text</th>
                                <th class="px-4 py-3 text-left font-bold text-slate-600 dark:text-slate-400">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="block md:table-row-group space-y-3 md:space-y-0 md:divide-y divide-slate-200 dark:divide-slate-800 text-slate-200">
                            @isset($reviews)
                                @forelse($reviews as $review)
                                    <tr class="block md:table-row border border-slate-200 dark:border-slate-800 md:border-0 rounded-xl md:rounded-none p-3 md:p-0">
                                        <td class="block md:table-cell md:px-4 md:py-3 font-semibold text-slate-900 dark:text-white break-words">{{ $review->client_name }}</td>
                                        <td class="block md:table-cell md:px-4 md:py-3 text-slate-600 dark:text-slate-400 break-words">
                                            <i class="fa-solid fa-location-dot mr-1 md:hidden"></i>{{ $review->location }}
                                        </td>
                                        <td class="block md:table-cell md:px-4 md:py-3 pt-1 md:pt-3 text-amber-500 font-bold">
                                            {{ str_repeat('★', $review->rating) }} ({{ $review->rating }}/5)
                                        </td>
                                        <td class="block md:table-cell md:px-4 md:py-3 pt-2 md:pt-3 text-slate-600 dark:text-slate-300 break-words md:max-w-xs md:truncate">{{ $review->review_text }}</td>
                                        <td class="block md:table-cell md:px-4 md:py-3 pt-3 mt-3 md:mt-0 border-t border-slate-200 dark:border-slate-800 md:border-0">
                                            <div class="flex items-center justify-between md:justify-start md:space-x-3">
                                                <a href="{{ route('admin.reviews.edit', $review->id) }}" class="text-amber-500 hover:text-amber-400 font-bold transition py-1 pr-2"><i class="fa-solid fa-pen-to-square"></i> Edit</a>

                                                <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this review?')" class="text-rose-600 hover:text-rose-500 font-bold transition py-1 pl-2">Delete <i class="fa-solid fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="block md:table-row">
                                        <td colspan="5" class="block md:table-cell px-4 py-6 text-center text-slate-500">No client reviews found.</td>
                                    </tr>
                                @endforelse
                            @endisset
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>