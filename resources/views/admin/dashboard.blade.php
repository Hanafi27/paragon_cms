@extends('admin.layouts.cms')

@section('title', 'Dashboard')

@section('content')
    <!-- Header Title -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Dashboard</h1>
            <p class="text-sm text-slate-500">Ringkasan performa CMS hari ini.</p>
        </div>
    </div>


    <!-- KPI / Stats Cards (Letakkan di atas, ini wajib) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4 mb-8">
        <div class="group p-5 rounded-2xl bg-white border border-slate-200 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-slate-200/60">
            <p class="text-sm text-slate-500">Total Produk</p>
            <p class="mt-2 text-2xl font-bold text-slate-900">{{ $stats['total_products'] ?? 0 }}</p>
            <p class="mt-1 text-xs text-slate-500">Produk aktif</p>
        </div>
        <div class="group p-5 rounded-2xl bg-white border border-slate-200 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-slate-200/60">
            <p class="text-sm text-slate-500">Total FAQ</p>
            <p class="mt-2 text-2xl font-bold text-slate-900">{{ $stats['total_faq'] ?? 0 }}</p>
            <p class="mt-1 text-xs text-emerald-600 font-medium">FAQ terdaftar</p>
        </div>
        <div class="group p-5 rounded-2xl bg-white border border-slate-200 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-slate-200/60">
            <p class="text-sm text-slate-500">Total Gallery</p>
            <p class="mt-2 text-2xl font-bold text-slate-900">{{ $stats['total_gallery'] ?? 0 }}</p>
            <p class="mt-1 text-xs text-slate-500">Gambar gallery</p>
        </div>
    </div>


    <!-- CHARTS SECTION -->

    <!-- CHARTS SECTION: Trafik Harian & Perangkat Pengunjung -->
    <div class="w-full max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
        <!-- Area Chart: Trafik Harian -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 flex flex-col justify-between card-3d-hover min-h-[340px]">
            <h2 class="text-lg font-bold text-[#a81d5d] mb-2">Trafik Harian</h2>
            <div class="flex-1 flex items-end"><canvas id="trafficAreaChart" class="w-full" height="220"></canvas></div>
        </div>
        <!-- Donut Chart: Perangkat Pengunjung -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 card-3d-hover flex flex-col items-center min-h-[340px]">
            <h2 class="text-lg font-bold text-[#a81d5d] mb-2">Perangkat Pengunjung </h2>
            <div class="w-56 mx-auto flex-1 flex items-end"><canvas id="deviceDonutChart" height="220"></canvas></div>
        </div>
    </div>


    <!-- Bottom Section -->

    <!-- Tidak ada card aktivitas admin terbaru -->


<script>
    // Data dari backend (PHP ke JS)
    const visitorLabels = @json($visitorChart->pluck('visited_at'));
    const visitorData = @json($visitorChart->pluck('total'));
    const deviceLabels = @json($deviceChart->pluck('device'));
    const deviceData = @json($deviceChart->pluck('total'));

    // Area Chart: Trafik Harian
    const ctxArea = document.getElementById('trafficAreaChart').getContext('2d');
    new Chart(ctxArea, {
        type: 'line',
        data: {
            labels: visitorLabels,
            datasets: [{
                label: 'Pengunjung',
                data: visitorData,
                fill: true,
                backgroundColor: 'rgba(168,29,93,0.08)',
                borderColor: '#a81d5d',
                tension: 0.4,
                pointRadius: 3,
                pointBackgroundColor: '#a81d5d',
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            layout: { padding: { top: 10, bottom: 10, left: 0, right: 0 } },
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, grid: { color: '#f3e8f9' } },
                x: { grid: { display: false } }
            }
        }
    });

    // Donut Chart: Perangkat Pengunjung
    const ctxDonut = document.getElementById('deviceDonutChart').getContext('2d');
    new Chart(ctxDonut, {
        type: 'doughnut',
        data: {
            labels: deviceLabels,
            datasets: [{
                data: deviceData,
                backgroundColor: [
                    '#a81d5d',
                    '#ffd600',
                    '#7B1FA2'
                ],
                borderWidth: 2,
                borderColor: '#fff',
            }]
        },
        options: {
            cutout: '70%',
            plugins: { legend: { display: true, position: 'bottom' } }
        }
    });
</script>
@endsection
