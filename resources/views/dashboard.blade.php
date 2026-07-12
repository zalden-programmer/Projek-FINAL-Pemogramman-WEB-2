<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Perpustakaan') }}
        </h2>
    </x-slot>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-6 mb-8">

        <!-- Total Buku -->
        <div class="bg-white border border-gray-200 shadow-sm hover:shadow-md transition p-4 flex items-center gap-3"
            style="border-radius: 16px;">
            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0">
                <i class="bi bi-book text-blue-600 text-lg"></i>
            </div>
            <p class="text-sm text-gray-500 flex-1">Total Buku</p>
            <h2 class="text-xl font-bold text-gray-800">
                {{ $stats['total_buku'] }}
            </h2>
        </div>

        <!-- Total Anggota -->
        <div class="bg-white border border-gray-200 shadow-sm hover:shadow-md transition p-4 flex items-center gap-3"
            style="border-radius: 16px;">
            <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                <i class="bi bi-people text-green-600 text-lg"></i>
            </div>
            <p class="text-sm text-gray-500 flex-1">Total Anggota</p>
            <h2 class="text-xl font-bold text-gray-800">
                {{ $stats['total_anggota'] }}
            </h2>
        </div>

        <!-- Dipinjam -->
        <div class="bg-white border border-gray-200 shadow-sm hover:shadow-md transition p-4 flex items-center gap-3"
            style="border-radius: 16px;">
            <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center flex-shrink-0">
                <i class="bi bi-arrow-left-right text-yellow-600 text-lg"></i>
            </div>
            <p class="text-sm text-gray-500 flex-1">Dipinjam</p>
            <h2 class="text-xl font-bold text-gray-800">
                {{ $stats['sedang_dipinjam'] }}
            </h2>
        </div>

        <!-- Hari Ini -->
        <div class="bg-white border border-gray-200 shadow-sm hover:shadow-md transition p-4 flex items-center gap-3"
            style="border-radius: 16px;">
            <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center flex-shrink-0">
                <i class="bi bi-calendar-event text-purple-600 text-lg"></i>
            </div>
            <p class="text-sm text-gray-500 flex-1">Hari Ini</p>
            <h2 class="text-xl font-bold text-gray-800">
                {{ $stats['transaksi_hari_ini'] }}
            </h2>
        </div>

        <!-- Terlambat -->
        <div class="bg-white border border-gray-200 shadow-sm hover:shadow-md transition p-4 flex items-center gap-3"
            style="border-radius: 16px;">
            <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center flex-shrink-0">
                <i class="bi bi-exclamation-triangle text-red-600 text-lg"></i>
            </div>
            <p class="text-sm text-gray-500 flex-1">Terlambat</p>
            <h2 class="text-xl font-bold text-gray-800">
                {{ $jumlahTerlambat }}
            </h2>
        </div>

        <!-- Tersedia -->
        <div class="bg-white border border-gray-200 shadow-sm hover:shadow-md transition p-4 flex items-center gap-3"
            style="border-radius: 16px;">
            <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center flex-shrink-0">
                <i class="bi bi-check-circle text-indigo-600 text-lg"></i>
            </div>
            <p class="text-sm text-gray-500 flex-1">Tersedia</p>
            <h2 class="text-xl font-bold text-gray-800">
                {{ $stats['buku_tersedia'] }}
            </h2>
        </div>

    </div>

    <!-- Line Trend, Pie Kategori, Donut Status (3 kolom) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-3 mt-4 mb-4">

        <div class="bg-white shadow-sm rounded-lg p-4 flex flex-col">
            <h3 class="text-sm font-semibold text-gray-700 mb-2">
                Transaksi 6 Bulan Terakhir
            </h3>
            <div class="relative flex-1" style="height: 100px;">
                <canvas id="chartTransaksi"></canvas>
            </div>
        </div>

        <div class="bg-white shadow-sm rounded-lg p-4 flex flex-col">
            <h3 class="text-sm font-semibold text-gray-700 mb-2">
                Distribusi Kategori Buku
            </h3>
            <div class="relative flex-1" style="height: 100px;">
                <canvas id="chartKategori"></canvas>
            </div>
        </div>

        <div class="bg-white shadow-sm rounded-lg p-4 flex flex-col">
            <h3 class="text-sm font-semibold text-gray-700 mb-2">
                Status Transaksi
            </h3>
            <div class="relative flex-1" style="height: 100px;">
                <canvas id="chartStatus"></canvas>
            </div>
        </div>

    </div>

    <!-- Quick Actions & Daftar Buku Terlambat -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">

        <!-- Quick Actions -->
        <div class="bg-white border border-gray-200 shadow-sm p-6" style="border-radius: 16px;">
            <h3 class="text-base font-semibold text-gray-800 mb-4">
                Aksi Cepat
            </h3>

            <div class="grid grid-cols-2 gap-3">
                <a href="{{ route('buku.create') }}"
                    class="flex items-center gap-3 p-3 border border-gray-100 hover:border-blue-200 hover:bg-blue-50 transition"
                    style="border-radius: 12px;">
                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0">
                        <i class="bi bi-book text-blue-600 text-lg"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-700">
                        Tambah Buku
                    </span>
                </a>

                <a href="{{ route('anggota.create') }}"
                    class="flex items-center gap-3 p-3 border border-gray-100 hover:border-green-200 hover:bg-green-50 transition"
                    style="border-radius: 12px;">
                    <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                        <i class="bi bi-person-plus text-green-600 text-lg"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-700">
                        Tambah Anggota
                    </span>
                </a>

                <a href="{{ route('transaksi.create') }}"
                    class="flex items-center gap-3 p-3 border border-gray-100 hover:border-yellow-200 hover:bg-yellow-50 transition"
                    style="border-radius: 12px;">
                    <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center flex-shrink-0">
                        <i class="bi bi-arrow-left-right text-yellow-600 text-lg"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-700">
                        Pinjam Buku
                    </span>
                </a>

                <a href="{{ route('transaksi.index') }}"
                    class="flex items-center gap-3 p-3 border border-gray-100 hover:border-purple-200 hover:bg-purple-50 transition"
                    style="border-radius: 12px;">
                    <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center flex-shrink-0">
                        <i class="bi bi-journal-text text-purple-600 text-lg"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-700">
                        Semua Transaksi
                    </span>
                </a>
            </div>
        </div>

        <!-- Daftar Buku Terlambat -->
        <div class="bg-white border border-gray-200 shadow-sm overflow-hidden" style="border-radius: 16px;">
            <div class="px-6 py-5 flex items-center justify-between">
                <h3 class="text-base font-semibold text-gray-800 flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center">
                        <i class="bi bi-exclamation-triangle text-red-600 text-sm"></i>
                    </div>
                    Buku Terlambat
                </h3>
                @if ($transaksiTerlambat->count())
                    <span class="text-xs font-medium text-red-600 bg-red-50 px-2.5 py-1 rounded-full">
                        {{ $transaksiTerlambat->count() }} Buku
                    </span>
                @endif
            </div>

            <div class="px-6 pb-6">
                @if ($transaksiTerlambat->count())
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-100">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th
                                        class="px-3 py-2 text-left text-xs font-medium text-black-400 uppercase tracking-wider">
                                        Anggota</th>
                                    <th
                                        class="px-3 py-2 text-left text-xs font-medium text-black-400 uppercase tracking-wider">
                                        Buku</th>
                                    <th
                                        class="px-3 py-2 text-left text-xs font-medium text-black-400 uppercase tracking-wider">
                                        Jatuh Tempo</th>
                                    <th
                                        class="px-3 py-2 text-left text-xs font-medium text-black-400 uppercase tracking-wider">
                                        Terlambat</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-50">
                                @foreach ($transaksiTerlambat as $transaksi)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-3 py-3 whitespace-nowrap text-sm font-medium text-gray-800">
                                            {{ $transaksi->anggota->nama }}
                                        </td>
                                        <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">
                                            {{ $transaksi->buku->judul_buku }}
                                        </td>
                                        <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">
                                            {{ $transaksi->tanggal_kembali->format('d M Y') }}
                                        </td>
                                        <td class="px-3 py-3 whitespace-nowrap">
                                            <span
                                                class="px-2.5 py-1 inline-flex text-xs font-medium rounded-full bg-red-50 text-red-600">
                                                {{ $transaksi->terlambat }} Hari
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="flex items-center gap-3 p-4 bg-green-50 rounded-xl">
                        <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                            <i class="bi bi-check-lg text-green-600"></i>
                        </div>
                        <span class="text-sm text-green-700">
                            Tidak ada buku yang terlambat dikembalikan.
                        </span>
                    </div>
                @endif
            </div>
        </div>

    </div>

    <!-- Recent Transactions -->
    <div class="bg-white border border-gray-200 shadow-sm mb-6" style="border-radius: 16px;">

        {{-- Header --}}
        <div class="px-6 py-4 flex items-center justify-between border-b border-gray-100">
            <h3 class="text-base font-semibold text-gray-800 flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center flex-shrink-0">
                    <i class="bi bi-clock-history text-indigo-600 text-sm" style="line-height:1;"></i>
                </div>
                <span>Transaksi Terbaru</span>
            </h3>
            <a href="{{ route('transaksi.index') }}"
                class="text-sm font-semibold text-indigo-600 hover:text-indigo-700 flex items-center gap-1.5">
                Lihat Semua <i class="bi bi-arrow-right text-base"></i>
            </a>
        </div>

        {{-- Table --}}
        <div class="px-6 pt-2 pb-4">
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th
                                class="px-3 py-3 text-left text-[11px] font-semibold text-black-400 uppercase tracking-wider">
                                Kode</th>
                            <th
                                class="px-3 py-3 text-left text-[11px] font-semibold text-black-400 uppercase tracking-wider">
                                Anggota</th>
                            <th
                                class="px-3 py-3 text-left text-[11px] font-semibold text-black-400 uppercase tracking-wider">
                                Buku</th>
                            <th
                                class="px-3 py-3 text-left text-[11px] font-semibold text-black-400 uppercase tracking-wider">
                                Tanggal Pinjam</th>
                            <th
                                class="px-3 py-3 text-left text-[11px] font-semibold text-black-400 uppercase tracking-wider">
                                Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentTransaksi as $transaksi)
                            <tr class="border-t border-gray-100 hover:bg-indigo-50/40 transition-colors">

                                {{-- Kode --}}
                                <td class="px-3 py-4 whitespace-nowrap">
                                    <code
                                        class="bg-gray-50 border border-gray-200 text-indigo-600 px-2.5 py-1 rounded-md text-[11px] font-mono font-semibold">
                                        {{ $transaksi->kode_transaksi }}
                                    </code>
                                </td>

                                {{-- Anggota --}}
                                <td class="px-3 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2.5">
                                        <div
                                            class="w-8 h-8 rounded-full bg-gradient-to-br from-indigo-500 to-indigo-400 text-white flex items-center justify-center text-xs font-bold flex-shrink-0">
                                            {{ strtoupper(substr($transaksi->anggota->nama, 0, 1)) }}
                                        </div>
                                        <span
                                            class="text-sm font-medium text-gray-700">{{ $transaksi->anggota->nama }}</span>
                                    </div>
                                </td>

                                {{-- Buku --}}
                                <td class="px-3 py-4">
                                    <div class="flex items-center gap-2">
                                        <i class="bi bi-book text-indigo-300 text-sm flex-shrink-0"></i>
                                        <span
                                            class="text-sm text-gray-600 truncate max-w-[200px]">{{ $transaksi->buku->judul_buku }}</span>
                                    </div>
                                </td>

                                {{-- Tanggal --}}
                                <td class="px-3 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center gap-1.5 text-sm text-gray-500">
                                        <i class="bi bi-calendar3 text-gray-300 text-xs"></i>
                                        {{ $transaksi->tanggal_pinjam->format('d M Y') }}
                                    </span>
                                </td>

                                {{-- Status --}}
                                <td class="px-3 py-4 whitespace-nowrap">
                                    @if ($transaksi->status == 'Dipinjam')
                                        <span
                                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-yellow-50 text-yellow-700 border border-yellow-100">
                                            <span class="w-1.5 h-1.5 rounded-full bg-yellow-400"></span>
                                            Dipinjam
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-green-50 text-green-700 border border-green-100">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-400"></span>
                                            Dikembalikan
                                        </span>
                                    @endif
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-14 text-center">
                                    <i class="bi bi-inbox text-4xl text-gray-200 d-block mb-3"></i>
                                    <p class="text-sm text-gray-400">Belum ada transaksi</p>
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

            // Line Chart: Trend Peminjaman
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
                        layout: {
                            padding: {
                                top: 10,
                                bottom: 5,
                                left: 5,
                                right: 10
                            }
                        },
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

            //Pie Chart: Distribusi Kategori Buku
            const kategoriChart = document.getElementById('chartKategori');

            if (kategoriChart) {
                new Chart(kategoriChart, {
                    type: 'pie',
                    data: {
                        labels: @json($kategoriChart->pluck('kategori')),
                        datasets: [{
                            data: @json($kategoriChart->pluck('total')),
                            backgroundColor: [
                                '#0d6efd',
                                '#198754',
                                '#ffc107',
                                '#dc3545',
                                '#6f42c1'
                            ]
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        radius: '80%',
                        animation: {
                            duration: 2000,
                            easing: 'easeOutQuart',
                            animateRotate: true,
                            animateScale: true
                        },
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    boxWidth: 8,
                                    font: {
                                        size: 9
                                    }
                                }
                            }
                        }
                    }
                });
            }

            // ===== Donut Chart: Status Transaksi =====
            const statusChart = document.getElementById('chartStatus');

            if (statusChart) {
                new Chart(statusChart, {
                    type: 'doughnut',
                    data: {
                        labels: @json($statusChart->pluck('status')),
                        datasets: [{
                            data: @json($statusChart->pluck('total')),
                            backgroundColor: [
                                '#ffc107',
                                '#198754'
                            ]
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        radius: '80%',
                        animation: {
                            duration: 2000,
                            easing: 'easeOutQuart',
                            animateRotate: true,
                            animateScale: true
                        },
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    boxWidth: 8,
                                    font: {
                                        size: 9
                                    }
                                }
                            }
                        }
                    }
                });
            }

        });
    </script>

</x-app-layout>
