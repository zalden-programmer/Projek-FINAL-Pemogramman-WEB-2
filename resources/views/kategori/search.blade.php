<x-app-layout>
    <h2 class="mb-4"> Hasil Pencarian:
        <span class="text-primary"> "{{ $keyword }}" </span>
    </h2>

    @if(count($hasil) > 0)

    <div class="row">
        @foreach($hasil as $kategori)

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h4 class="card-title text-success">
                        {{ $kategori['nama'] }}
                    </h4>

                    <p>
                        {{ $kategori['deskripsi'] }}
                    </p>

                    <span class="badge bg-primary mb-3"> Jumlah Buku: {{ $kategori['jumlah_buku'] }} </span>

                    <br>
                    <a href="{{ route('kategori.show', $kategori['id']) }}"
                        class="btn btn-success btn-sm"> Detail
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @else
    <div class="alert alert-danger"> Tidak ada kategori ditemukan dengan keyword:
        <strong>{{ $keyword }}</strong>
    </div>
    @endif

</x-app-layout>