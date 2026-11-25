<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl text-slate-800">Manage Before & After Projects</h2>
            <a href="{{ route('admin.projects.create') }}" class="bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold px-4 py-2 rounded-lg text-sm transition">
                + Add New Project
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-xl p-6 border border-slate-200">
                @if(session('status'))
                    <div class="mb-4 p-4 bg-emerald-100 text-emerald-800 rounded-lg text-sm font-medium">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200 text-sm">
                        <thead class="bg-slate-50">
                            <tr>
                                <th class="px-4 py-3 text-left font-bold text-slate-600">Before / After</th>
                                <th class="px-4 py-3 text-left font-bold text-slate-600">Title</th>
                                <th class="px-4 py-3 text-left font-bold text-slate-600">Location</th>
                                <th class="px-4 py-3 text-left font-bold text-slate-600">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200">
                            @foreach($projects as $project)
                                <tr>
                                    <td class="px-4 py-3">
                                        <div class="flex space-x-2">
                                            <img src="{{ asset('storage/' . $project->before_image) }}" class="w-12 h-12 object-cover rounded border" alt="Before">
                                            <img src="{{ asset('storage/' . $project->after_image) }}" class="w-12 h-12 object-cover rounded border border-amber-500" alt="After">
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 font-semibold text-slate-900">{{ $project->title }}</td>
                                    <td class="px-4 py-3 text-slate-600">{{ $project->location }}</td>
                                    <td class="px-4 py-3 space-x-3">
                                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="text-indigo-600 font-bold hover:underline">Edit</a>
                                        <a href="{{ route('admin.projects.destroy', $project->id) }}" onclick="return confirm('Delete project?')" class="text-rose-600 font-bold hover:underline">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>