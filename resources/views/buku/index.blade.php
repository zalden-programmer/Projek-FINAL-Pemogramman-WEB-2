<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h1>
                <i class="bi bi-book"></i> Daftar Buku
            </h1>
            <div class="d-flex gap-2">
                <a href="{{ route('buku.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Tambah Buku
                </a>

                <a href="{{ route('buku.export') }}" class="btn btn-success">
                    <i class="bi bi-download"></i> Export CSV
                </a>
            </div>
        </div>
    </x-slot>

    {{-- Statistik Cards --}}
    <div class="row mt-4 mb-4 g-3">
        <div class="col-md-4">
            <div class="card border-primary">
                <div class="card-body d-flex align-items-center gap-3 p-4">
                    <div class="bg-primary-subtle rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                        style="width: 56px; height: 56px;">
                        <i class="bi bi-book-fill text-primary fs-4"></i>
                    </div>
                    <p class="text-muted mb-0 flex-grow-1">Total Buku</p>
                    <h2 class="mb-0 fs-2 fw-bold">{{ $totalBuku }}</h2>
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
                    <p class="text-muted mb-0 flex-grow-1">Buku Tersedia</p>
                    <h2 class="mb-0 fs-2 fw-bold">{{ $bukuTersedia }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-danger">
                <div class="card-body d-flex align-items-center gap-3 p-4">
                    <div class="bg-danger-subtle rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                        style="width: 56px; height: 56px;">
                        <i class="bi bi-x-circle-fill text-danger fs-4"></i>
                    </div>
                    <p class="text-muted mb-0 flex-grow-1">Buku Habis</p>
                    <h2 class="mb-0 fs-2 fw-bold">{{ $bukuHabis }}</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Search & Filter --}}
    <div class="card mb-4">
        <div class="card-body">

            <form action="{{ route('buku.search') }}" method="GET">

                <div class="row">

                    <div class="col-md-3 mb-2">
                        <input type="text" name="keyword" class="form-control"
                            placeholder="Cari judul, pengarang, penerbit..." value="{{ request('keyword') }}">
                    </div>

                    <div class="col-md-2 mb-2">
                        <select name="kategori" class="form-select">
                            <option value="">Semua Kategori</option>
                            <option value="Programming">Programming</option>
                            <option value="Database">Database</option>
                            <option value="Web Design">Web Design</option>
                            <option value="Networking">Networking</option>
                            <option value="Data Science">Data Science</option>
                        </select>
                    </div>

                    <div class="col-md-2 mb-2">
                        <select name="tahun" class="form-select">
                            <option value="">Semua Tahun</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                        </select>
                    </div>

                    <div class="col-md-2 mb-2">
                        <select name="ketersediaan" class="form-select">
                            <option value="">Semua Status</option>
                            <option value="tersedia">Tersedia</option>
                            <option value="habis">Habis</option>
                        </select>
                    </div>

                    <div class="col-md-3 mb-2 d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-search"></i> Cari
                        </button>

                        <a href="{{ route('buku.index') }}" class="btn btn-secondary">
                            <i class="bi bi-x-circle"></i>
                            Reset
                        </a>
                    </div>

                </div>

            </form>

        </div>
    </div>

    {{-- Filter Kategori --}}
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex align-items-center flex-wrap gap-2">
                <h6 class="card-title mb-0 me-2">
                    <i class="bi bi-funnel"></i> Filter Kategori:
                </h6>
                <div class="btn-group flex-wrap" role="group">
                    <a href="{{ route('buku.index') }}"
                        class="btn btn-sm {{ !isset($kategori) ? 'btn-primary' : 'btn-outline-primary' }}">
                        Semua
                    </a>
                    <a href="{{ route('buku.kategori', 'Programming') }}"
                        class="btn btn-sm {{ isset($kategori) && $kategori == 'Programming' ? 'btn-primary' : 'btn-outline-primary' }}">
                        Programming
                    </a>
                    <a href="{{ route('buku.kategori', 'Database') }}"
                        class="btn btn-sm {{ isset($kategori) && $kategori == 'Database' ? 'btn-primary' : 'btn-outline-primary' }}">
                        Database
                    </a>
                    <a href="{{ route('buku.kategori', 'Web Design') }}"
                        class="btn btn-sm {{ isset($kategori) && $kategori == 'Web Design' ? 'btn-primary' : 'btn-outline-primary' }}">
                        Web Design
                    </a>
                    <a href="{{ route('buku.kategori', 'Networking') }}"
                        class="btn btn-sm {{ isset($kategori) && $kategori == 'Networking' ? 'btn-primary' : 'btn-outline-primary' }}">
                        Networking
                    </a>
                    <a href="{{ route('buku.kategori', 'Data Science') }}"
                        class="btn btn-sm {{ isset($kategori) && $kategori == 'Data Science' ? 'btn-primary' : 'btn-outline-primary' }}">
                        Data Science
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Bulk Delete Form --}}
    <form id="bulk-delete-form" action="{{ route('buku.bulk-delete') }}" method="POST">
        @csrf
        <div class="mb-3">
            <input type="checkbox" id="select-all" class="form-check-input border-2 border-secondary">
            <label for="select-all">Pilih Semua</label>

            <button type="submit" class="btn btn-danger btn-sm ms-2">
                <i class="bi bi-trash"></i>
                Hapus Terpilih
            </button>
        </div>
    </form>

    {{-- Daftar buku & checkbox menggunakan card --}}
    <div class="row">
        @forelse ($bukus as $buku)
            <div class="col-12 mb-3">
                <div class="flex-grow-1">
                    <x-buku-card :buku="$buku" />
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    <i class="bi bi-info-circle"></i>
                    Tidak ada data buku
                </div>
            </div>
        @endforelse
    </div>

    @if ($bukus->count() > 0)
        <div class="text-center mt-4">
            <p class="text-muted">
                Menampilkan {{ $bukus->count() }} buku
                @isset($kategori)
                    dari kategori <strong>{{ $kategori }}</strong>
                @endisset
            </p>
        </div>
    @endif

    @push('scripts')
        <script>
            document.getElementById('select-all').addEventListener('change', function() {
                document.querySelectorAll('input[name="buku_ids[]"]').forEach(cb => {
                    cb.checked = this.checked;
                });
            });
        </script>
    @endpush
</x-app-layout>
