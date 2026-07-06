<x-app-layout>
    <x-slot name="header">
        <h2 class="mb-4">Daftar Kategori Buku</h2>
    </x-slot>


    <div class="row">
        @foreach($kategori_list as $kategori)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h4>
                        {{ $kategori['nama'] }}
                    </h4>

                    <p>
                        {{ $kategori['deskripsi'] }}
                    </p>

                    <span class="badge bg-primary mb-3">
                        Jumlah Buku:
                        {{ $kategori['jumlah_buku'] }}
                    </span>

                    <br>
                    <a href="{{ route('kategori.show', $kategori['id']) }}"
                        class="btn btn-success btn-sm"> Detail Kategori
                    </a>

                </div>

            </div>

        </div>
        @endforeach

    </div>

</x-app-layout>