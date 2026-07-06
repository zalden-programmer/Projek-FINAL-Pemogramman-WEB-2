<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Anggota;

class AnggotaSeeder extends Seeder
{
    public function run(): void
    {
        $anggotas = [
            [
                'kode_anggota' => 'AGT-2026-001',
                'nama' => 'Dewi Lestari',
                'email' => 'dewi.lestari@gmail.com',
                'telepon' => '081234567801',
                'alamat' => 'Jl. Melati No. 12, Bandung',
                'tanggal_lahir' => '2001-05-14',
                'jenis_kelamin' => 'Perempuan',
                'pekerjaan' => 'Mahasiswa',
                'tanggal_daftar' => '2025-01-10',
                'status' => 'Aktif',
            ],
            [
                'kode_anggota' => 'AGT-2026-002',
                'nama' => 'Budi Santoso',
                'email' => 'budi.santoso@gmail.com',
                'telepon' => '081234567802',
                'alamat' => 'Jl. Kenanga No. 5, Jakarta',
                'tanggal_lahir' => '1990-08-22',
                'jenis_kelamin' => 'Laki-laki',
                'pekerjaan' => 'Karyawan Swasta',
                'tanggal_daftar' => '2025-02-15',
                'status' => 'Aktif',
            ],
            [
                'kode_anggota' => 'AGT-2026-003',
                'nama' => 'Siti Rahma',
                'email' => 'siti.rahma@gmail.com',
                'telepon' => '081234567803',
                'alamat' => 'Jl. Anggrek No. 8, Surabaya',
                'tanggal_lahir' => '1988-03-30',
                'jenis_kelamin' => 'Perempuan',
                'pekerjaan' => 'Guru',
                'tanggal_daftar' => '2025-03-05',
                'status' => 'Aktif',
            ],
            [
                'kode_anggota' => 'AGT-2026-004',
                'nama' => 'Ahmad Yani',
                'email' => 'ahmad.yani@gmail.com',
                'telepon' => '081234567804',
                'alamat' => 'Jl. Mawar No. 20, Yogyakarta',
                'tanggal_lahir' => '1985-11-11',
                'jenis_kelamin' => 'Laki-laki',
                'pekerjaan' => 'Wiraswasta',
                'tanggal_daftar' => '2024-12-01',
                'status' => 'Nonaktif',
            ],
            [
                'kode_anggota' => 'AGT-2026-005',
                'nama' => 'Rina Marlina',
                'email' => 'rina.marlina@gmail.com',
                'telepon' => '081234567805',
                'alamat' => 'Jl. Dahlia No. 3, Semarang',
                'tanggal_lahir' => '2002-07-19',
                'jenis_kelamin' => 'Perempuan',
                'pekerjaan' => 'Mahasiswa',
                'tanggal_daftar' => '2025-04-20',
                'status' => 'Aktif',
            ],
            [
                'kode_anggota' => 'AGT-2026-006',
                'nama' => 'Rudi Hartono',
                'email' => 'rudi.hartono@gmail.com',
                'telepon' => '081234567806',
                'alamat' => 'Jl. Flamboyan No. 7, Malang',
                'tanggal_lahir' => '1979-09-09',
                'jenis_kelamin' => 'Laki-laki',
                'pekerjaan' => 'PNS',
                'tanggal_daftar' => '2025-05-18',
                'status' => 'Aktif',
            ],
            [
                'kode_anggota' => 'AGT-2026-007',
                'nama' => 'Maya Putri',
                'email' => 'maya.putri@gmail.com',
                'telepon' => '081234567807',
                'alamat' => 'Jl. Cempaka No. 15, Bogor',
                'tanggal_lahir' => '1995-01-25',
                'jenis_kelamin' => 'Perempuan',
                'pekerjaan' => 'Karyawan Swasta',
                'tanggal_daftar' => '2024-11-11',
                'status' => 'Nonaktif',
            ],
            [
                'kode_anggota' => 'AGT-2026-008',
                'nama' => 'Joko Susilo',
                'email' => 'joko.susilo@gmail.com',
                'telepon' => '081234567808',
                'alamat' => 'Jl. Teratai No. 9, Depok',
                'tanggal_lahir' => '1982-06-17',
                'jenis_kelamin' => 'Laki-laki',
                'pekerjaan' => 'Dosen',
                'tanggal_daftar' => '2025-06-02',
                'status' => 'Aktif',
            ],
            [
                'kode_anggota' => 'AGT-2026-009',
                'nama' => 'Dian Permata',
                'email' => 'dian.permata@gmail.com',
                'telepon' => '081234567809',
                'alamat' => 'Jl. Seruni No. 4, Tangerang',
                'tanggal_lahir' => '2004-02-28',
                'jenis_kelamin' => 'Perempuan',
                'pekerjaan' => 'Pelajar',
                'tanggal_daftar' => '2025-06-25',
                'status' => 'Aktif',
            ],
            [
                'kode_anggota' => 'AGT-2026-010',
                'nama' => 'Andi Wijaya',
                'email' => 'andi.wijaya@gmail.com',
                'telepon' => '081234567810',
                'alamat' => 'Jl. Kamboja No. 11, Bekasi',
                'tanggal_lahir' => '1998-10-05',
                'jenis_kelamin' => 'Laki-laki',
                'pekerjaan' => 'Mahasiswa',
                'tanggal_daftar' => '2025-07-01',
                'status' => 'Aktif',
            ],
        ];

        foreach ($anggotas as $anggota) {
            Anggota::create($anggota);
        }
    }
}
