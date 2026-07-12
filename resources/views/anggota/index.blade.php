<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h1>
                <i class="bi bi-people"></i>
                Daftar Anggota
            </h1>

            <div class="d-flex gap-2">
                <a href="{{ route('anggota.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Tambah Anggota
                </a>

                <a href="{{ route('anggota.export') }}" class="btn btn-primary text-white">
                    <i class="bi bi-file-excel"></i> Export Excel
                </a>
            </div>
        </div>
    </x-slot>

    {{-- Statistik --}}
    <div class="row mt-4 mb-4 g-3">
        <div class="col-md-4">
            <div class="card border-success">
                <div class="card-body d-flex align-items-center gap-3 p-4">
                    <div class="bg-success-subtle rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                        style="width: 56px; height: 56px;">
                        <i class="bi bi-people-fill text-success fs-4"></i>
                    </div>
                    <p class="text-muted mb-0 flex-grow-1">Total Anggota</p>
                    <h2 class="mb-0 fs-2 fw-bold">{{ $totalAnggota }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-primary">
                <div class="card-body d-flex align-items-center gap-3 p-4">
                    <div class="bg-primary-subtle rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                        style="width: 56px; height: 56px;">
                        <i class="bi bi-person-check-fill text-primary fs-4"></i>
                    </div>
                    <p class="text-muted mb-0 flex-grow-1">Anggota Aktif</p>
                    <h2 class="mb-0 fs-2 fw-bold">{{ $anggotaAktif }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-secondary">
                <div class="card-body d-flex align-items-center gap-3 p-4">
                    <div class="bg-secondary-subtle rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                        style="width: 56px; height: 56px;">
                        <i class="bi bi-person-x-fill text-secondary fs-4"></i>
                    </div>
                    <p class="text-muted mb-0 flex-grow-1">Anggota Nonaktif</p>
                    <h2 class="mb-0 fs-2 fw-bold">{{ $anggotaNonaktif }}</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Search & Filter --}}
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('anggota.search') }}" method="GET">
                <div class="row">
                    {{-- Keyword --}}
                    <div class="col-md-3 mb-2">
                        <input type="text" name="keyword" class="form-control" placeholder="Cari nama/email/telepon"
                            value="{{ request('keyword') }}">
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div class="col-md-2 mb-2">
                        <select name="jenis_kelamin" class="form-select">
                            <option value="">Semua Jenis Kelamin</option>

                            <option value="Laki-laki" {{ request('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki
                            </option>

                            <option value="Perempuan" {{ request('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan
                            </option>
                        </select>
                    </div>

                    {{-- Status --}}
                    <div class="col-md-2 mb-2">
                        <select name="status" class="form-select">
                            <option value="">Semua Status</option>

                            <option value="Aktif" {{ request('status') == 'Aktif' ? 'selected' : '' }}>
                                Aktif
                            </option>

                            <option value="Nonaktif" {{ request('status') == 'Nonaktif' ? 'selected' : '' }}>
                                Nonaktif
                            </option>
                        </select>
                    </div>

                    {{-- Pekerjaan --}}
                    <div class="col-md-2 mb-2">
                        <select name="pekerjaan" class="form-select">
                            <option value="">Semua Pekerjaan</option>

                            <option value="Mahasiswa" {{ request('pekerjaan') == 'Mahasiswa' ? 'selected' : '' }}>
                                Mahasiswa
                            </option>

                            <option value="Pegawai" {{ request('pekerjaan') == 'Pegawai' ? 'selected' : '' }}>
                                Pegawai
                            </option>

                            <option value="Wiraswasta" {{ request('pekerjaan') == 'Wiraswasta' ? 'selected' : '' }}>
                                Wiraswasta
                            </option>
                        </select>
                    </div>

                    {{-- Tombol --}}
                    <div class="col-md-3 mb-2 d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-search"></i>
                            Cari
                        </button>

                        <a href="{{ route('anggota.index') }}" class="btn btn-secondary">
                            <i class="bi bi-x-circle"></i>
                            Reset
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Tabel Anggota --}}
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-info">
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Jenis Kelamin</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @forelse ($anggotas as $anggota)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <code>{{ $anggota->kode_anggota }}</code>
                                </td>
                                <td>
                                    <strong>{{ $anggota->nama }}</strong>
                                </td>
                                <td>
                                    <i class="bi bi-envelope"></i>
                                    {{ $anggota->email }}
                                </td>
                                <td>
                                    <i class="bi bi-telephone"></i>
                                    {{ $anggota->telepon }}
                                </td>
                                <td>
                                    @if ($anggota->jenis_kelamin == 'Laki-laki')
                                        <i class="bi bi-gender-male text-primary"></i>
                                    @else
                                        <i class="bi bi-gender-female text-danger"></i>
                                    @endif
                                    {{ $anggota->jenis_kelamin }}
                                </td>
                                <td>
                                    @if ($anggota->status == 'Aktif')
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle"></i> Aktif
                                        </span>
                                    @else
                                        <span class="badge bg-secondary">
                                            <i class="bi bi-x-circle"></i> Nonaktif
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('anggota.show', $anggota->id) }}"
                                            class="btn btn-sm btn-info text-white" title="Detail">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('anggota.edit', $anggota->id) }}"
                                            class="btn btn-sm btn-warning" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <form action="{{ route('anggota.destroy', $anggota->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus anggota ini?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">
                                    <i class="bi bi-inbox"></i>
                                    Tidak ada data anggota
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
