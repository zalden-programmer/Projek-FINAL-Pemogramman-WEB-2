<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Perpustakaan') }}
        </h2>
    </x-slot>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 mt-6 mb-8">

        <!-- Total Buku -->
        <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-4 flex items-center justify-between">
            <div>
                <p class="text-xs text-gray-500">Total Buku</p>
                <h2 class="text-xl font-bold text-blue-600 mt-1">
                    {{ $stats['total_buku'] }}
                </h2>
            </div>

            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                <i class="bi bi-book text-blue-600 text-lg"></i>
            </div>
        </div>

        <!-- Total Anggota -->
        <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-4 flex items-center justify-between">
            <div>
                <p class="text-xs text-gray-500">Total Anggota</p>
                <h2 class="text-xl font-bold text-green-600 mt-1">
                    {{ $stats['total_anggota'] }}
                </h2>
            </div>

            <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">
                <i class="bi bi-people text-green-600 text-lg"></i>
            </div>
        </div>

        <!-- Dipinjam -->
        <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-4 flex items-center justify-between">
            <div>
                <p class="text-xs text-gray-500">Dipinjam</p>
                <h2 class="text-xl font-bold text-yellow-500 mt-1">
                    {{ $stats['sedang_dipinjam'] }}
                </h2>
            </div>

            <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center">
                <i class="bi bi-arrow-left-right text-yellow-600 text-lg"></i>
            </div>
        </div>

        <!-- Hari Ini -->
        <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-4 flex items-center justify-between">
            <div>
                <p class="text-xs text-gray-500">Hari Ini</p>
                <h2 class="text-xl font-bold text-purple-600 mt-1">
                    {{ $stats['transaksi_hari_ini'] }}
                </h2>
            </div>

            <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center">
                <i class="bi bi-calendar-event text-purple-600 text-lg"></i>
            </div>
        </div>

        <!-- Terlambat -->
        <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-4 flex items-center justify-between">
            <div>
                <p class="text-xs text-gray-500">Terlambat</p>
                <h2 class="text-xl font-bold text-red-600 mt-1">
                    {{ $jumlahTerlambat }}
                </h2>
            </div>

            <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">
                <i class="bi bi-exclamation-triangle text-red-600 text-lg"></i>
            </div>
        </div>

        <!-- Tersedia -->
        <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-4 flex items-center justify-between">
            <div>
                <p class="text-xs text-gray-500">Tersedia</p>
                <h2 class="text-xl font-bold text-indigo-600 mt-1">
                    {{ $stats['buku_tersedia'] }}
                </h2>
            </div>

            <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center">
                <i class="bi bi-check-circle text-indigo-600 text-lg"></i>
            </div>
        </div>

    </div>

    <!-- Grafik Transaksi & Buku Populer -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6 mb-6">

        <div class="bg-white shadow-sm rounded-lg p-6 flex flex-col">
            <h3 class="text-lg font-semibold mb-4">
                Transaksi 6 Bulan Terakhir
            </h3>
            <div class="relative flex-1">
                <canvas id="chartTransaksi"></canvas>
            </div>
        </div>

        <div class="bg-white shadow-sm rounded-lg p-6 flex flex-col">
            <h3 class="text-lg font-semibold mb-4">
                Distribusi Kategori Buku
            </h3>
            <div class="relative">
                <canvas id="chartKategori"></canvas>
            </div>
        </div>

    </div>


    <!-- Quick Actions & Daftar Buku Terlambat -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">

        <!-- Quick Actions -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 border-b bg-gradient-to-r from-indigo-600 to-blue-600">
                <h3 class="text-lg font-semibold text-black">
                    Quick Actions
                </h3>
            </div>

            <div class="p-6">

                <div class="grid grid-cols-2 gap-5">
                    <a href="{{ route('buku.create') }}"
                        class="group flex flex-col items-center justify-center rounded-xl border border-blue-100 bg-blue-50 p-6 hover:bg-blue-600 hover:text-white transition duration-300">
                        <i class="bi bi-book text-4xl mb-3 text-blue-600 group-hover:text-white"></i>
                        <span class="font-semibold">
                            Tambah Buku
                        </span>
                    </a>

                    <a href="{{ route('anggota.create') }}"
                        class="group flex flex-col items-center justify-center rounded-xl border border-green-100 bg-green-50 p-6 hover:bg-green-600 hover:text-white transition duration-300">
                        <i class="bi bi-person-plus text-4xl mb-3 text-green-600 group-hover:text-white"></i>
                        <span class="font-semibold">
                            Tambah Anggota
                        </span>
                    </a>

                    <a href="{{ route('transaksi.create') }}"
                        class="group flex flex-col items-center justify-center rounded-xl border border-yellow-100 bg-yellow-50 p-6 hover:bg-yellow-500 hover:text-white transition duration-300">
                        <i class="bi bi-arrow-left-right text-4xl mb-3 text-yellow-600 group-hover:text-white"></i>
                        <span class="font-semibold">
                            Pinjam Buku
                        </span>
                    </a>

                    <a href="{{ route('transaksi.index') }}"
                        class="group flex flex-col items-center justify-center rounded-xl border border-purple-100 bg-purple-50 p-6 hover:bg-purple-600 hover:text-white transition duration-300">
                        <i class="bi bi-journal-text text-4xl mb-3 text-purple-600 group-hover:text-white"></i>
                        <span class="font-semibold">
                            Semua Transaksi
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Daftar Buku Terlambat -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 bg-gradient-to-r from-red-600 to-red-500">
                <h3 class="text-lg font-semibold text-black flex items-center gap-2">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    Buku Terlambat
                </h3>
            </div>

            <div class="p-6">
                @if ($transaksiTerlambat->count())
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Anggota</th>
                                    <th
                                        class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Buku</th>
                                    <th
                                        class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Jatuh Tempo</th>
                                    <th
                                        class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Terlambat</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($transaksiTerlambat as $transaksi)
                                    <tr>
                                        <td class="px-4 py-2 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $transaksi->anggota->nama }}
                                        </td>
                                        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500">
                                            {{ $transaksi->buku->judul_buku }}
                                        </td>
                                        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500">
                                            {{ $transaksi->tanggal_kembali->format('d M Y') }}
                                        </td>
                                        <td class="px-4 py-2 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                {{ $transaksi->terlambat }} Hari
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="flex items-center gap-2 p-4 bg-green-50 text-green-800 rounded-lg">
                        <svg class="h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Tidak ada buku yang terlambat dikembalikan.
                    </div>
                @endif
            </div>
        </div>

    </div>

    <!-- Recent Transactions -->
    <div class="bg-white shadow-sm rounded-lg mb-6">
        <div class="p-6">
            <h3 class="text-lg font-semibold mb-4">Transaksi Terbaru</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Kode</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Anggota</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Buku</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tanggal Pinjam</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($recentTransaksi as $transaksi)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $transaksi->kode_transaksi }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $transaksi->anggota->nama }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $transaksi->buku->judul_buku }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $transaksi->tanggal_pinjam->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $transaksi->status == 'Dipinjam' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                        {{ $transaksi->status }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                                    Belum ada transaksi
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        window.addEventListener('load', function() {

            const transaksiChart = document.getElementById('chartTransaksi');

            if (transaksiChart) {
                const chartData = {
                    labels: @json($chartData->pluck('bulan')),
                    datasets: [{
                            label: 'Peminjaman',
                            data: @json($chartData->pluck('pinjam')),
                            borderColor: '#0d6efd',
                            tension: 0.4
                        },
                        {
                            label: 'Pengembalian',
                            data: @json($chartData->pluck('kembali')),
                            borderColor: '#198754',
                            tension: 0.4
                        }
                    ]
                };

                new Chart(transaksiChart, {
                    type: 'line',
                    data: chartData,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        animation: {
                            duration: 2000,
                            easing: 'easeOutQuart'
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1,
                                    precision: 0
                                }
                            }
                        }
                    }
                });
            }

            const kategoriChart = document.getElementById('chartKategori');
            if (kategoriChart) {
                new Chart(kategoriChart, {
                    type: 'pie',
                    data: {
                        labels: @json($kategoriChart->pluck('kategori')),
                        datasets: [{
                            data: @json($kategoriChart->pluck('total'))
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });
            }

        });
    </script>
</x-app-layout>
