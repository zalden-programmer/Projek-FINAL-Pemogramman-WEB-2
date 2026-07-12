<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="mb-0">
                <i class="bi bi-arrow-left-right"></i>
                Daftar Transaksi Peminjaman
            </h1>
            <div>
                <a href="{{ route('transaksi.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i>
                    Pinjam Buku
                </a>
            </div>
        </div>
    </x-slot>

    {{-- Statistik --}}
    <div class="row mt-4 mb-4 g-3">
        <div class="col-md-4">
            <div class="card border-primary">
                <div class="card-body d-flex align-items-center gap-3 p-4">
                    <div class="bg-primary-subtle rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                        style="width: 56px; height: 56px;">
                        <i class="bi bi-journal-text text-primary fs-4"></i>
                    </div>
                    <p class="text-muted mb-0 flex-grow-1">Total Transaksi</p>
                    <h2 class="mb-0 fs-2 fw-bold">{{ $transaksis->count() }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-warning">
                <div class="card-body d-flex align-items-center gap-3 p-4">
                    <div class="bg-warning-subtle rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                        style="width: 56px; height: 56px;">
                        <i class="bi bi-hourglass-split text-warning fs-4"></i>
                    </div>
                    <p class="text-muted mb-0 flex-grow-1">Sedang Dipinjam</p>
                    <h2 class="mb-0 fs-2 fw-bold">{{ $transaksis->where('status', 'Dipinjam')->count() }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-success">
                <div class="card-body d-flex align-items-center gap-3 p-4">
                    <div class="bg-success-subtle rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                        style="width: 56px; height: 56px;">
                        <i class="bi bi-check-circle-fill text-success fs-4"></i>
                    </div>
                    <p class="text-muted mb-0 flex-grow-1">Sudah Dikembalikan</p>
                    <h2 class="mb-0 fs-2 fw-bold">{{ $transaksis->where('status', 'Dikembalikan')->count() }}</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel Transaksi --}}
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-info">
                        <tr>
                            <th>No</th>
                            <th>Kode Transaksi</th>
                            <th>Anggota</th>
                            <th>Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transaksis as $transaksi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><code>{{ $transaksi->kode_transaksi }}</code></td>
                                <td>{{ $transaksi->anggota->nama }}</td>
                                <td>{{ $transaksi->buku->judul_buku }}</td>
                                <td>{{ $transaksi->tanggal_pinjam->format('d M Y') }}</td>
                                <td>{{ $transaksi->tanggal_kembali->format('d M Y') }}</td>
                                <td>
                                    @if ($transaksi->status == 'Dipinjam')
                                        <span class="badge bg-warning">
                                            Dipinjam
                                        </span>
                                        @if ($transaksi->terlambat > 0)
                                            <span class="badge bg-danger">
                                                Terlambat {{ $transaksi->terlambat }} Hari
                                            </span>
                                        @endif
                                    @else
                                        <span class="badge bg-success">
                                            Dikembalikan
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('transaksi.show', $transaksi->id) }}"
                                        class="btn btn-sm btn-info text-white">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">
                                    Belum ada transaksi
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
