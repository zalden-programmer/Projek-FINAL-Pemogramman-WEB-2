<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="mb-0">
                <i class="bi bi-file-earmark-text"></i>
                Laporan Transaksi
            </h1>
        </div>
    </x-slot>

    {{-- Summary Cards --}}
    <div class="row g-3 mt-4 mb-4">
        <div class="col-md-3">
            <div class="card border-primary">
                <div class="card-body d-flex align-items-center gap-3 p-4">
                    <div class="bg-primary-subtle rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                        style="width: 56px; height: 56px;">
                        <i class="bi bi-journal-text text-primary fs-4"></i>
                    </div>
                    <div>
                        <p class="text-muted mb-0">Total Transaksi</p>
                        <h2 class="mb-0 fs-2 fw-bold">{{ $summary['total'] }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-warning">
                <div class="card-body d-flex align-items-center gap-3 p-4">
                    <div class="bg-warning-subtle rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                        style="width: 56px; height: 56px;">
                        <i class="bi bi-hourglass-split text-warning fs-4"></i>
                    </div>
                    <div>
                        <p class="text-muted mb-0">Dipinjam</p>
                        <h2 class="mb-0 fs-2 fw-bold">{{ $summary['dipinjam'] }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-success">
                <div class="card-body d-flex align-items-center gap-3 p-4">
                    <div class="bg-success-subtle rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                        style="width: 56px; height: 56px;">
                        <i class="bi bi-check-circle-fill text-success fs-4"></i>
                    </div>
                    <div>
                        <p class="text-muted mb-0">Dikembalikan</p>
                        <h2 class="mb-0 fs-2 fw-bold">{{ $summary['dikembalikan'] }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-danger">
                <div class="card-body d-flex align-items-center gap-3 p-4">
                    <div class="bg-danger-subtle rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                        style="width: 56px; height: 56px;">
                        <i class="bi bi-cash-stack text-danger fs-4"></i>
                    </div>
                    <div>
                        <p class="text-muted mb-0">Total Denda</p>
                        <h2 class="mb-0 fs-4 fw-bold">Rp {{ number_format($summary['total_denda'], 0, ',', '.') }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-4">

        {{-- Filter Form --}}
        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Dari Tanggal</label>
                        <input type="date" name="dari" class="form-control" value="{{ request('dari') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Sampai Tanggal</label>
                        <input type="date" name="sampai" class="form-control" value="{{ request('sampai') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="">Semua</option>
                            <option value="Dipinjam" {{ request('status') == 'Dipinjam' ? 'selected' : '' }}>Dipinjam
                            </option>
                            <option value="Dikembalikan" {{ request('status') == 'Dikembalikan' ? 'selected' : '' }}>
                                Dikembalikan</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Anggota</label>
                        <select name="anggota_id" class="form-select">
                            <option value="">Semua</option>
                            @foreach ($anggotas as $anggota)
                                <option value="{{ $anggota->id }}"
                                    {{ request('anggota_id') == $anggota->id ? 'selected' : '' }}>
                                    {{ $anggota->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-filter"></i> Filter
                        </button>
                        <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Reset</a>
                        <button type="button" class="btn btn-success" onclick="window.print()">
                            <i class="bi bi-printer"></i> Cetak
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Tabel Laporan --}}
        <div class="card">
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-info">
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Anggota</th>
                            <th>Buku</th>
                            <th>Tgl Pinjam</th>
                            <th>Tgl Kembali</th>
                            <th>Status</th>
                            <th>Denda</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transaksis as $i => $trx)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $trx->kode_transaksi }}</td>
                                <td>{{ $trx->anggota->nama }}</td>
                                <td>{{ $trx->buku->judul_buku }}</td>
                                <td>{{ $trx->tanggal_pinjam->format('d/m/Y') }}</td>
                                <td>{{ $trx->tanggal_dikembalikan?->format('d/m/Y') ?? '-' }}</td>
                                <td>
                                    <span class="badge bg-{{ $trx->status === 'Dipinjam' ? 'warning' : 'success' }}">
                                        {{ $trx->status }}
                                    </span>
                                </td>
                                <td>{{ $trx->denda ? 'Rp ' . number_format($trx->denda, 0, ',', '.') : '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">Tidak ada data transaksi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Print CSS --}}
    <style>
        @media print {

            .card-body form,
            .btn,
            nav,
            footer {
                display: none !important;
            }

            .card {
                border: none !important;
                box-shadow: none !important;
            }
        }
    </style>
</x-app-layout>
