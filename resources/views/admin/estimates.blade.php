<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between bg-[#142D4E] px-4 py-4 border-b border-[#234878]">
            <h2 class="font-extrabold text-xl text-white tracking-tight flex items-center gap-2">
                <span class="w-2 h-6 bg-[#F28C28] rounded-full inline-block"></span>
                📋 Manage Estimate Enquiries
            </h2>
            <a href="{{ route('admin.dashboard') }}" class="bg-[#0f223a] hover:bg-[#1f3f6c] text-white border border-[#234878] font-bold px-4 py-2 rounded-xl text-sm transition shadow">
                ← Back to Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-[#142D4E] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Success Flash Message -->
            @if(session('status'))
                <div class="p-4 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 rounded-2xl text-sm font-semibold shadow-inner flex items-center gap-2">
                    <span>✓</span>
                    <span>{{ session('status') }}</span>
                </div>
            @endif

            <div class="bg-[#0f223a]/90 backdrop-blur-md border border-[#234878] rounded-3xl overflow-hidden shadow-2xl">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-slate-300">
                        <thead class="bg-[#142D4E] text-[#F28C28] uppercase text-xs font-black tracking-wider border-b border-[#234878]">
                            <tr>
                                <th class="p-4">Date</th>
                                <th class="p-4">Client Name</th>
                                <th class="p-4">Contact</th>
                                <th class="p-4">Service & Material</th>
                                <th class="p-4">Address & Notes</th>
                                <th class="p-4">Status</th>
                                <th class="p-4 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#234878]">
                            @isset($estimates)
                                @forelse($estimates as $item)
                                    <tr class="hover:bg-[#142D4E]/50 transition-colors">
                                        <td class="p-4 text-xs text-slate-400 whitespace-nowrap">
                                            {{ $item->created_at ? $item->created_at->format('M d, Y') : 'N/A' }}
                                        </td>
                                        <td class="p-4 font-extrabold text-white whitespace-nowrap">
                                            {{ $item->full_name }}
                                        </td>
                                        <td class="p-4">
                                            <div class="font-semibold text-white">{{ $item->phone }}</div>
                                            <div class="text-xs text-slate-400">{{ $item->email }}</div>
                                        </td>
                                        <td class="p-4">
                                            <div class="text-[#F28C28] font-bold">{{ $item->service_type }}</div>
                                            @if($item->roof_material)
                                                <span class="text-xs text-slate-400">{{ $item->roof_material }}</span>
                                            @endif
                                        </td>
                                        <td class="p-4 max-w-xs">
                                            <div class="text-white text-xs truncate" title="{{ $item->property_address }}">
                                                📍 {{ $item->property_address }}
                                            </div>
                                            @if($item->project_details)
                                                <p class="text-xs text-slate-400 truncate mt-1" title="{{ $item->project_details }}">
                                                    {{ $item->project_details }}
                                                </p>
                                            @endif
                                        </td>
                                        <td class="p-4">
                                            <form action="{{ route('admin.estimates.status', $item->id) }}" method="POST">
                                                @csrf
                                                <select name="status" onchange="this.form.submit()" class="bg-[#142D4E] border border-[#234878] text-xs font-bold rounded-xl px-3 py-1.5 text-white focus:outline-none focus:border-[#F28C28] cursor-pointer">
                                                    <option value="Pending" {{ $item->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="Contacted" {{ $item->status == 'Contacted' ? 'selected' : '' }}>Contacted</option>
                                                    <option value="Scheduled" {{ $item->status == 'Scheduled' ? 'selected' : '' }}>Scheduled</option>
                                                    <option value="Completed" {{ $item->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td class="p-4 text-center">
                                            <form action="{{ route('admin.estimates.destroy', $item->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this estimate request?')" class="text-rose-400 hover:text-rose-300 font-bold transition text-xs bg-rose-500/10 px-3 py-1.5 rounded-xl border border-rose-500/20 cursor-pointer">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="p-8 text-center text-slate-400 font-medium">
                                            No estimate enquiries found.
                                        </td>
                                    </tr>
                                @endforelse
                            @endisset
                        </tbody>
                    </table>
                </div>

                @if(isset($estimates) && method_exists($estimates, 'hasPages') && $estimates->hasPages())
                    <div class="p-4 border-t border-[#234878]">
                        {{ $estimates->links() }}
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>