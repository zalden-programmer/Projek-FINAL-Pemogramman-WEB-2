<x-app-layout>
    <x-slot name="header">
        <h1 class="mb-0">
            <i class="bi bi-search"></i>
            Hasil Pencarian
        </h1>
    </x-slot>

    <div class="container py-4">

        <div class="mb-4 d-flex align-items-center gap-2">
            <p class="text-muted mb-0">Menampilkan hasil untuk:</p>
            <span class="badge bg-primary fs-6">"{{ $keyword }}"</span>
        </div>

        <ul class="nav nav-pills mb-4 gap-2" role="tablist">
            <li class="nav-item">
                <a class="nav-link active d-flex align-items-center gap-2" data-bs-toggle="tab" href="#tab-buku">
                    <i class="bi bi-book"></i>
                    Buku
                    <span class="badge bg-white text-primary">{{ $results['buku']->count() }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" data-bs-toggle="tab" href="#tab-anggota">
                    <i class="bi bi-people"></i>
                    Anggota
                    <span class="badge bg-white text-primary">{{ $results['anggota']->count() }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" data-bs-toggle="tab" href="#tab-transaksi">
                    <i class="bi bi-arrow-left-right"></i>
                    Transaksi
                    <span class="badge bg-white text-primary">{{ $results['transaksi']->count() }}</span>
                </a>
            </li>
        </ul>

        <div class="tab-content">
            {{-- Tab Buku --}}
            <div class="tab-pane fade show active" id="tab-buku">
                @forelse($results['buku'] as $buku)
                    <div class="card mb-3 border-0 shadow-sm hover-shadow">
                        <div class="card-body d-flex align-items-center gap-3">
                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                                style="width: 48px; height: 48px;">
                                <i class="bi bi-book fs-5"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">
                                    {!! str_ireplace($keyword, '<mark>' . $keyword . '</mark>', e($buku->judul_buku)) !!}
                                </h6>
                                <small class="text-muted">
                                    <i class="bi bi-person"></i> {{ $buku->pengarang }}
                                    &nbsp;•&nbsp;
                                    <i class="bi bi-stack"></i> Stok: {{ $buku->stok }}
                                </small>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-muted py-5">
                        <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                        Tidak ada buku yang cocok.
                    </div>
                @endforelse
            </div>

            {{-- Tab Anggota --}}
            <div class="tab-pane fade" id="tab-anggota">
                @forelse($results['anggota'] as $anggota)
                    <div class="card mb-3 border-0 shadow-sm hover-shadow">
                        <div class="card-body d-flex align-items-center gap-3">
                            <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                                style="width: 48px; height: 48px;">
                                <i class="bi bi-person fs-5"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">
                                    {!! str_ireplace($keyword, '<mark>' . $keyword . '</mark>', e($anggota->nama)) !!}
                                </h6>
                                <small class="text-muted">
                                    <i class="bi bi-telephone"></i> {{ $anggota->telepon }}
                                    &nbsp;•&nbsp;
                                    <i class="bi bi-envelope"></i> {{ $anggota->email }}
                                </small>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-muted py-5">
                        <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                        Tidak ada anggota yang cocok.
                    </div>
                @endforelse
            </div>

            {{-- Tab Transaksi --}}
            <div class="tab-pane fade" id="tab-transaksi">
                @forelse($results['transaksi'] as $trx)
                    <div class="card mb-3 border-0 shadow-sm hover-shadow">
                        <div class="card-body d-flex align-items-center gap-3">
                            <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                                style="width: 48px; height: 48px;">
                                <i class="bi bi-arrow-left-right fs-5"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">
                                    <code>{{ $trx->kode_transaksi }}</code>
                                </h6>
                                <small class="text-muted">
                                    <i class="bi bi-person"></i> {{ $trx->anggota->nama }}
                                    &nbsp;•&nbsp;
                                    <i class="bi bi-book"></i> {{ $trx->buku->judul_buku }}
                                </small>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-muted py-5">
                        <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                        Tidak ada transaksi yang cocok.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <style>
        .hover-shadow {
            transition: box-shadow 0.2s ease, transform 0.2s ease;
        }

        .hover-shadow:hover {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1) !important;
            transform: translateY(-2px);
        }

        mark {
            background-color: #fff3cd;
            padding: 0 2px;
            border-radius: 2px;
        }

        .nav-pills .nav-link {
            color: #495057;
            background-color: #f1f3f5;
        }

        .nav-pills .nav-link.active {
            background-color: #0d6efd;
        }
    </style>
</x-app-layout>
