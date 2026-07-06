<x-app-layout>
    <x-slot name="header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('kategori.index') }}"> Kategori </a>
                </li>

                <li class="breadcrumb-item active">
                    {{ $kategori['nama'] }}
                </li>
            </ol>
        </nav>
    </x-slot>

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            Detail Kategori
        </div>

        <div class="card-body">
            <h3>{{ $kategori['nama'] }}</h3>
            <p>{{ $kategori['deskripsi'] }}</p>
            <span class="badge bg-success">
                Jumlah Buku:
                {{ $kategori['jumlah_buku'] }}
            </span>
        </div>
    </div>

</x-app-layout>