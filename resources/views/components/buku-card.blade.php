@props([
    'buku',
    'showActions' => true
])
<div class="card shadow-sm position-relative">

    {{-- Checkbox pojok kiri atas --}}
    <div class="position-absolute top-0 start-0 m-3 bg-light rounded p-1">
        <input
            type="checkbox"
            name="buku_ids[]"
            value="{{ $buku->id }}"
            form="bulk-delete-form"
            class="form-check-input border-2 border-secondary">
    </div>

    <div class="card-body">

        <div class="row align-items-stretch">
            {{-- Kolom Kiri --}}
            <div class="col-md-2 d-flex flex-column justify-content-center align-items-center">
                <i class="bi bi-book display-3 text-primary"></i>

                <div class="mt-2">
                    <span class="badge
                    @if($buku->kategori == 'Programming') bg-primary
                    @elseif($buku->kategori == 'Database') bg-success
                    @elseif($buku->kategori == 'Web Design') bg-info
                    @elseif($buku->kategori == 'Networking') bg-warning
                    @else bg-danger
                    @endif">
                        {{ $buku->kategori }}
                    </span>
                </div>

            </div>

            {{-- Kolom Tengah --}}
            <div class="col-md-7">

                <h4>{{ $buku->judul_buku }}</h4>

                <p class="mb-2">
                    <strong>Pengarang:</strong>
                    {{ $buku->pengarang }}
                </p>

                <p class="mb-2">
                    <strong>Harga:</strong>
                    {{ $buku->harga_format }}
                </p>

                <p class="mb-2">
                    <strong>Stok:</strong>
                    {{ $buku->stok }}
                </p>

                @if($buku->stok > 0)
                <span class="badge bg-success">
                    Tersedia
                </span>
                @else
                <span class="badge bg-danger">
                    Habis
                </span>
                @endif

            </div>

            {{-- Kolom Kanan --}}
            @if($showActions)
            <div class="col-md-3 d-flex flex-column justify-content-end">

                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route('buku.show', $buku->id) }}"
                        class="btn btn-primary btn-sm"
                        title="Detail">
                        <i class="bi bi-eye fs-5"></i>
                    </a>

                    <a href="{{ route('buku.edit', $buku->id) }}"
                        class="btn btn-warning btn-sm"
                        title="Edit">
                        <i class="bi bi-pencil fs-5"></i>
                    </a>

                    <form action="{{ route('buku.destroy', $buku->id) }}"
                        method="POST"
                        class="delete-form d-inline">

                        @csrf
                        @method('DELETE')

                        <button type="button"
                            class="btn btn-danger btn-sm btn-delete"
                            data-judul="{{ $buku->judul_buku }}"
                            title="Hapus">
                            <i class="bi bi-trash fs-5"></i>
                        </button>

                    </form>

                </div>

            </div>
            @endif

        </div>
    </div>
</div>

@push('scripts')
<script>
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            const form = this.closest('form');
            const judul = this.getAttribute('data-judul');

            Swal.fire({
                title: 'Konfirmasi Hapus',
                text: `Apakah Anda yakin ingin menghapus buku "${judul}"?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endpush