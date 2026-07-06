<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Transaksi
        </h2>
    </x-slot>
    @if ($transaksi->status == 'Dipinjam' && $transaksi->terlambat > 0)
        <div class="alert alert-danger mb-4">
            <h5 class="mb-2">
                Buku Terlambat
            </h5>
            Buku ini sudah terlambat
            <strong>
                {{ $transaksi->terlambat }} hari
            </strong>
            dari batas pengembalian.
        </div>
    @endif

    <div class="py-6">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white shadow rounded-lg p-6">
                <table class="table table-hover w-100 align-middle" style="border-collapse: separate; border-spacing: 0;">
                    <tr>
                        <th width="30%" class="bg-light text-secondary border-0">Kode Transaksi</th>
                        <td class="border-0">{{ $transaksi->kode_transaksi }}</td>
                    </tr>

                    <tr>
                        <th class="bg-light text-secondary border-0">Nama Anggota</th>
                        <td class="border-0">{{ $transaksi->anggota->nama }}</td>
                    </tr>

                    <tr>
                        <th class="bg-light text-secondary border-0">Judul Buku</th>
                        <td class="border-0">{{ $transaksi->buku->judul_buku }}</td>
                    </tr>

                    <tr>
                        <th class="bg-light text-secondary border-0">Tanggal Pinjam</th>
                        <td class="border-0">{{ $transaksi->tanggal_pinjam->format('d-m-Y') }}</td>
                    </tr>

                    <tr>
                        <th class="bg-light text-secondary border-0">Batas Pengembalian</th>
                        <td class="border-0">{{ $transaksi->tanggal_kembali->format('d-m-Y') }}</td>
                    </tr>

                    <tr>
                        <th class="bg-light text-secondary border-0">Tanggal Dikembalikan</th>
                        <td class="border-0">
                            @if ($transaksi->tanggal_dikembalikan)
                                {{ $transaksi->tanggal_dikembalikan->format('d-m-Y') }}
                            @else
                                -
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th class="bg-light text-secondary border-0">Denda</th>
                        <td class="border-0">
                            <strong class="text-danger">
                                Rp {{ number_format($transaksi->denda_berjalan, 0, ',', '.') }}
                            </strong>

                            @if ($transaksi->status == 'Dipinjam' && $transaksi->terlambat > 0)
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th class="bg-light text-secondary border-0">Status</th>
                        <td class="border-0">
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
                    </tr>
                </table>

                <div class="mt-4 d-flex gap-2">

                    @if ($transaksi->status === 'Dipinjam')
                        <button type="button" class="btn btn-success" id="btn-kembalikan">
                            <i class="bi bi-arrow-return-left"></i>
                            Kembalikan Buku
                        </button>

                        <form id="form-kembalikan" action="{{ route('transaksi.kembalikan', $transaksi->id) }}"
                            method="POST" class="d-none">
                            @csrf
                            @method('PUT')

                        </form>
                    @else
                        @if ($transaksi->tanggal_dikembalikan <= $transaksi->tanggal_kembali)
                            <div class="alert alert-success mb-0">
                                <i class="bi bi-check-circle"></i>
                                Dikembalikan tepat waktu pada
                                {{ $transaksi->tanggal_dikembalikan->format('d M Y') }}
                            </div>
                        @else
                            <div class="alert alert-warning mb-0">
                                <i class="bi bi-exclamation-triangle"></i>
                                Terlambat dikembalikan!
                                Denda:
                                <strong>
                                    Rp {{ number_format($transaksi->denda, 0, ',', '.') }}
                                </strong>
                            </div>
                        @endif
                    @endif
                    <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            document.getElementById('btn-kembalikan')?.addEventListener('click', function() {

                Swal.fire({
                    title: 'Konfirmasi Pengembalian',
                    text: 'Apakah Anda yakin ingin mengembalikan buku ini?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#198754',
                    confirmButtonText: 'Ya, Kembalikan!',
                    cancelButtonText: 'Batal'
                }).then((result) => {

                    if (result.isConfirmed) {
                        document.getElementById('form-kembalikan').submit();
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
