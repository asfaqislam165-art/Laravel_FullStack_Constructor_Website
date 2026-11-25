<x-app-layout>
    @php
        $adminLinks = [
            ['label' => 'Dashboard',              'route' => 'admin.dashboard',       'active' => request()->routeIs('admin.dashboard')],
            ['label' => 'Estimate Requests',      'route' => 'admin.estimates.index', 'active' => request()->routeIs('admin.estimates.*')],
            ['label' => 'Before & After Projects','route' => 'admin.projects.index',  'active' => request()->routeIs('admin.projects.*')],
            ['label' => 'Services Offered',       'route' => 'admin.services.index',  'active' => request()->routeIs('admin.services.*')],
            ['label' => 'Manage Reviews',         'route' => 'admin.reviews.index',   'active' => request()->routeIs('admin.reviews.*')],
        ];

        $totalEstimatesCount = (int) ($totalEstimates ?? 0);
        $pendingCount        = (int) ($pendingEstimates ?? 0);
        $otherCount          = max($totalEstimatesCount - $pendingCount, 0);
        $projectsCount       = (int) ($totalProjects ?? 0);
        $reviewsCount        = (int) ($totalReviews ?? \App\Models\Review::count());

        // Optional chart data from controller (see notes). Safe fallback = empty.
        $chartLabelsData = collect($chartLabels ?? [])->values()->all();
        $chartValuesData = collect($chartValues ?? [])->values()->all();
    @endphp

    <div class="flex min-h-screen bg-gray-50">

        {{-- Sidebar toggle (mobile) --}}
        <input type="checkbox" id="sidebar-toggle" class="peer sr-only" />

        <label
            for="sidebar-toggle"
            aria-hidden="true"
            class="fixed inset-0 z-30 hidden bg-gray-900/50 peer-checked:block lg:hidden"
        ></label>

        {{-- Sidebar --}}
        <aside
            id="dashboard-sidebar"
            class="fixed inset-y-0 left-0 z-40 flex w-64 -translate-x-full flex-col justify-between overflow-y-auto border-r border-gray-200 bg-white transition-transform duration-300 peer-checked:translate-x-0 lg:sticky lg:top-0 lg:h-screen lg:shrink-0 lg:translate-x-0"
        >
            <div class="p-4">
                <div class="flex h-12 items-center">
                    <span class="text-lg font-black tracking-wider text-[#F28C28]">
                        APEX<span class="text-[#142D4E]">ADMIN</span>
                    </span>
                </div>

                <nav aria-label="Admin navigation" class="mt-4">
                    <ul class="space-y-1">
                        @foreach ($adminLinks as $link)
                            <li>
                                <a
                                    href="{{ route($link['route']) }}"
                                    @if ($link['active']) aria-current="page" @endif
                                    @class([
                                        'block rounded-lg px-4 py-2 text-sm font-medium transition-colors',
                                        'bg-gray-100 text-gray-900' => $link['active'],
                                        'text-gray-600 hover:bg-gray-100 hover:text-gray-900' => ! $link['active'],
                                    ])
                                >
                                    {{ $link['label'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </div>

            <div class="sticky bottom-0 border-t border-gray-200 bg-white p-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="w-full cursor-pointer rounded-lg border border-red-200 bg-red-50 px-4 py-2 text-sm font-medium text-red-600 transition hover:bg-red-100"
                    >
                        Log Out
                    </button>
                </form>
            </div>
        </aside>

        {{-- Main column --}}
        <div class="flex min-w-0 flex-1 flex-col">

            {{-- Top bar --}}
            <header class="flex items-center justify-between gap-3 border-b border-gray-200 bg-white px-4 py-4 sm:px-6">
                <div class="flex min-w-0 items-center gap-3">
                    <label
                        for="sidebar-toggle"
                        id="sidebar-toggle-label"
                        aria-expanded="false"
                        aria-controls="dashboard-sidebar"
                        class="cursor-pointer rounded-md p-2 text-gray-600 transition-colors hover:bg-gray-100 lg:hidden"
                    >
                        <span class="sr-only">Toggle menu</span>

                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </label>

                    <h1 class="truncate text-lg font-semibold text-gray-900">System Metrics Overview</h1>
                </div>

                <a
                    href="{{ route('home') }}"
                    class="shrink-0 rounded-md bg-[#142D4E] px-4 py-2 text-sm font-medium text-white transition hover:bg-[#1f3f6c]"
                >
                    View Main Site
                </a>
            </header>

            <main class="min-w-0 flex-1 space-y-6 p-4 sm:p-6">

                <p class="text-sm text-gray-600">
                    Manage your estimates, projects, services and customer reviews.
                </p>

                {{-- Estimate Request Notification Banner (Appears only on admin.dashboard if there are pending estimates) --}}
                @if ($pendingCount > 0)
                    <div role="status" class="flex items-center justify-between rounded-lg border border-amber-200 bg-amber-50 p-4 text-sm font-medium text-amber-800 shadow-xs">
                        <div class="flex items-center gap-3">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-amber-100 text-amber-600" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                            </span>
                            <span>
                                You have <strong>{{ $pendingCount }}</strong> pending estimate request{{ $pendingCount === 1 ? '' : 's' }} awaiting your response.
                            </span>
                        </div>
                        <a
                            href="{{ route('admin.estimates.index') }}"
                            class="shrink-0 rounded-md bg-amber-600 px-3 py-1.5 text-xs font-semibold text-white transition hover:bg-amber-700"
                        >
                            View Requests →
                        </a>
                    </div>
                @endif

                {{-- Flash message --}}
                @if (session('status'))
                    <div role="status" class="flex items-start gap-2 rounded-lg border border-green-200 bg-green-50 p-4 text-sm font-medium text-green-700">
                        <span class="shrink-0" aria-hidden="true">✓</span>
                        <span class="min-w-0 break-words">{{ session('status') }}</span>
                    </div>
                @endif

                {{-- Metric cards --}}
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
                    <article class="flex flex-col gap-2 rounded-lg border border-gray-200 bg-white p-6">
                        <strong class="block text-sm font-medium text-gray-600">Total Estimates</strong>
                        <span class="text-2xl font-medium text-[#F28C28]">{{ $totalEstimatesCount }}</span>
                    </article>

                    <article class="flex flex-col gap-2 rounded-lg border border-gray-200 bg-white p-6">
                        <strong class="block text-sm font-medium text-gray-600">Pending Leads</strong>
                        <span class="text-2xl font-medium text-green-600">{{ $pendingCount }}</span>
                    </article>

                    <article class="flex flex-col gap-2 rounded-lg border border-gray-200 bg-white p-6">
                        <strong class="block text-sm font-medium text-gray-600">Active Projects</strong>
                        <span class="text-2xl font-medium text-sky-600">{{ $projectsCount }}</span>
                    </article>

                    <article class="flex flex-col gap-2 rounded-lg border border-gray-200 bg-white p-6">
                        <strong class="block text-sm font-medium text-gray-600">Customer Reviews</strong>
                        <span class="text-2xl font-medium text-purple-600">{{ $reviewsCount }}</span>
                    </article>
                </div>

                {{-- Charts --}}
                <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                    <div class="rounded-lg border border-gray-200 bg-white p-6 lg:col-span-2">
                        <h2 class="text-sm font-medium text-gray-900">Estimate requests by month</h2>

                        @if (count($chartLabelsData) > 0)
                            <div class="mt-4 h-64">
                                <canvas
                                    id="estimates-line-chart"
                                    role="img"
                                    aria-label="Line chart showing the number of estimate requests per month"
                                ></canvas>
                            </div>
                        @else
                            <div class="mt-4 flex h-64 items-center justify-center text-sm text-gray-500">
                                No monthly data available yet.
                            </div>
                        @endif
                    </div>

                    <div class="rounded-lg border border-gray-200 bg-white p-6">
                        <h2 class="text-sm font-medium text-gray-900">Estimates by status</h2>

                        @if ($totalEstimatesCount > 0)
                            <div class="mt-4 h-64">
                                <canvas
                                    id="estimates-donut-chart"
                                    role="img"
                                    aria-label="Donut chart showing pending estimates compared with other estimates"
                                ></canvas>
                            </div>
                        @else
                            <div class="mt-4 flex h-64 items-center justify-center text-sm text-gray-500">
                                No estimates yet.
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Recent estimates --}}
                <section class="min-w-0 rounded-lg border border-gray-200 bg-white p-6">
                    <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                        <h2 class="text-sm font-medium text-gray-900">Recent Roof Estimate Submissions</h2>

                        <a
                            href="{{ route('admin.estimates.index') }}"
                            class="text-sm font-medium text-[#F28C28] transition hover:text-[#142D4E]"
                        >
                            View All Requests →
                        </a>
                    </div>

                    <p class="mt-2 text-xs text-gray-500 lg:hidden">
                        Swipe the table sideways to view all columns.
                    </p>

                    <div
                        class="mt-4 overflow-x-auto"
                        role="region"
                        aria-label="Recent estimate submissions, horizontally scrollable"
                        tabindex="0"
                    >
                        <table class="min-w-full divide-y-2 divide-gray-200 text-left text-sm">
                            <thead>
                                <tr class="text-gray-900">
                                    <th scope="col" class="whitespace-nowrap px-3 py-2 font-medium">Client</th>
                                    <th scope="col" class="whitespace-nowrap px-3 py-2 font-medium">Phone</th>
                                    <th scope="col" class="whitespace-nowrap px-3 py-2 font-medium">Service</th>
                                    <th scope="col" class="whitespace-nowrap px-3 py-2 font-medium">Address</th>
                                    <th scope="col" class="whitespace-nowrap px-3 py-2 font-medium">Status</th>
                                    <th scope="col" class="whitespace-nowrap px-3 py-2 text-center font-medium">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200">
                                @forelse (($recentEstimates ?? []) as $est)
                                    @php
                                        $statusClasses = match (strtolower((string) $est->status)) {
                                            'pending', 'new'                     => 'bg-yellow-100 text-yellow-700',
                                            'contacted', 'approved', 'completed'   => 'bg-green-100 text-green-700',
                                            'cancelled', 'canceled', 'rejected'    => 'bg-red-100 text-red-700',
                                            default                                => 'bg-gray-100 text-gray-700',
                                        };
                                    @endphp

                                    <tr class="transition-colors hover:bg-gray-50">
                                        <td class="px-3 py-2 font-medium text-gray-900">
                                            <div class="min-w-[120px] max-w-[180px] break-words">{{ $est->full_name }}</div>
                                        </td>

                                        <td class="whitespace-nowrap px-3 py-2 text-gray-900">{{ $est->phone }}</td>

                                        <td class="px-3 py-2 text-gray-900">
                                            <div class="min-w-[120px] max-w-[180px] break-words">{{ $est->service_type }}</div>
                                        </td>

                                        <td class="px-3 py-2 text-gray-900">
                                            <div class="max-w-[220px] truncate" title="{{ $est->property_address }}">
                                                {{ $est->property_address }}
                                            </div>
                                        </td>

                                        <td class="whitespace-nowrap px-3 py-2">
                                            <span class="rounded-full px-2.5 py-0.5 text-xs {{ $statusClasses }}">
                                                {{ $est->status }}
                                            </span>
                                        </td>

                                        <td class="px-3 py-2 text-center">
                                            <form
                                                action="{{ route('admin.estimates.destroy', $est->id) }}"
                                                method="POST"
                                                class="inline-block"
                                            >
                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this estimate request?')"
                                                    class="inline-flex min-h-[36px] cursor-pointer items-center justify-center rounded-md border border-red-200 bg-red-50 px-3 py-1.5 text-xs font-medium text-red-600 transition hover:bg-red-100"
                                                >
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-3 py-10 text-center text-gray-500">
                                            No estimate submissions found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </section>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.1/dist/chart.umd.min.js"></script>
    <script>
        (function () {
            // Sidebar aria-expanded sync
            var toggle = document.getElementById('sidebar-toggle');
            var toggleLabel = document.getElementById('sidebar-toggle-label');

            if (toggle && toggleLabel) {
                toggle.addEventListener('change', function () {
                    toggleLabel.setAttribute('aria-expanded', String(toggle.checked));
                });

                document.addEventListener('keydown', function (e) {
                    if (e.key === 'Escape' && toggle.checked) {
                        toggle.checked = false;
                        toggleLabel.setAttribute('aria-expanded', 'false');
                    }
                });
            }

            if (typeof Chart === 'undefined') { return; }

            // Line chart
            var lineCanvas = document.getElementById('estimates-line-chart');

            if (lineCanvas) {
                var labels = @json($chartLabelsData);
                var values = @json($chartValuesData);
                var ctx = lineCanvas.getContext('2d');
                var gradient = ctx.createLinearGradient(0, 0, 0, 256);

                gradient.addColorStop(0, 'rgba(242, 140, 40, 0.25)');
                gradient.addColorStop(1, 'rgba(242, 140, 40, 0)');

                new Chart(lineCanvas, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Estimates',
                            data: values,
                            borderColor: '#F28C28',
                            backgroundColor: gradient,
                            borderWidth: 2,
                            pointRadius: 0,
                            pointHoverRadius: 5,
                            pointHoverBackgroundColor: '#F28C28',
                            pointHoverBorderColor: '#ffffff',
                            pointHoverBorderWidth: 2,
                            tension: 0.35,
                            fill: true
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        interaction: { mode: 'index', intersect: false },
                        plugins: { legend: { display: false } },
                        scales: {
                            x: { grid: { display: false }, ticks: { color: '#4b5563' } },
                            y: {
                                beginAtZero: true,
                                grid: { color: '#e5e7eb' },
                                ticks: { color: '#4b5563', precision: 0 }
                            }
                        }
                    }
                });
            }

            // Donut chart
            var donutCanvas = document.getElementById('estimates-donut-chart');

            if (donutCanvas) {
                new Chart(donutCanvas, {
                    type: 'doughnut',
                    data: {
                        labels: ['Pending', 'Other'],
                        datasets: [{
                            data: [{{ $pendingCount }}, {{ $otherCount }}],
                            backgroundColor: ['#f59e0b', '#10b981'],
                            hoverBackgroundColor: ['#d97706', '#059669'],
                            borderColor: '#ffffff',
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        cutout: '70%',
                        plugins: {
                            legend: { position: 'bottom', labels: { color: '#4b5563' } }
                        }
                    }
                });
            }
        })();
    </script>
</x-app-layout>