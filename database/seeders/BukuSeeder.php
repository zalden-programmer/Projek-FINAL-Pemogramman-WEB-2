<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        $bukus = [
            [
                'kode_buku' => 'BK-PROG-001',
                'judul_buku' => 'Learning Python for Beginners',
                'kategori' => 'Programming',
                'pengarang' => 'Budi Santoso',
                'penerbit' => 'Informatika Press',
                'tahun_terbit' => 2023,
                'isbn' => '978-602-1111-01-1',
                'bahasa' => 'Inggris',
                'harga' => 95000,
                'stok' => 12,
                'deskripsi' => 'Panduan dasar pemrograman Python untuk pemula.',
            ],
            [
                'kode_buku' => 'BK-PROG-002',
                'judul_buku' => 'Clean Code Architecture',
                'kategori' => 'Programming',
                'pengarang' => 'Andi Wijaya',
                'penerbit' => 'Tekno Media',
                'tahun_terbit' => 2022,
                'isbn' => '978-602-1111-02-2',
                'bahasa' => 'Inggris',
                'harga' => 110000,
                'stok' => 8,
                'deskripsi' => 'Prinsip menulis kode yang bersih dan mudah dirawat.',
            ],
            [
                'kode_buku' => 'BK-WEB-001',
                'judul_buku' => 'Modern Web Design',
                'kategori' => 'Web Design',
                'pengarang' => 'Ahmad Yani',
                'penerbit' => 'Creative Media',
                'tahun_terbit' => 2024,
                'isbn' => '978-602-1234-56-3',
                'bahasa' => 'Indonesia',
                'harga' => 120000,
                'stok' => 0,
                'deskripsi' => 'Prinsip dan praktik desain web modern.',
            ],
            [
                'kode_buku' => 'BK-DB-001',
                'judul_buku' => 'PostgreSQL Administration',
                'kategori' => 'Database',
                'pengarang' => 'Dewi Lestari',
                'penerbit' => 'DB Publisher',
                'tahun_terbit' => 2023,
                'isbn' => '978-602-1111-04-4',
                'bahasa' => 'Indonesia',
                'harga' => 135000,
                'stok' => 15,
                'deskripsi' => 'Panduan administrasi database PostgreSQL.',
            ],
            [
                'kode_buku' => 'BK-DB-002',
                'judul_buku' => 'MySQL Fundamentals',
                'kategori' => 'Database',
                'pengarang' => 'Siti Rahma',
                'penerbit' => 'DB Publisher',
                'tahun_terbit' => 2021,
                'isbn' => '978-602-1111-05-5',
                'bahasa' => 'Indonesia',
                'harga' => 90000,
                'stok' => 0,
                'deskripsi' => 'Dasar-dasar pengelolaan database MySQL.',
            ],
            [
                'kode_buku' => 'BK-NET-001',
                'judul_buku' => 'Network Security Fundamentals',
                'kategori' => 'Networking',
                'pengarang' => 'Rudi Hartono',
                'penerbit' => 'Net Press',
                'tahun_terbit' => 2022,
                'isbn' => '978-602-1111-06-6',
                'bahasa' => 'Indonesia',
                'harga' => 105000,
                'stok' => 3,
                'deskripsi' => 'Konsep dasar keamanan jaringan komputer.',
            ],
            [
                'kode_buku' => 'BK-NET-002',
                'judul_buku' => 'Cisco Networking Essentials',
                'kategori' => 'Networking',
                'pengarang' => 'Joko Susilo',
                'penerbit' => 'Net Press',
                'tahun_terbit' => 2020,
                'isbn' => '978-602-1111-07-7',
                'bahasa' => 'Indonesia',
                'harga' => 115000,
                'stok' => 0,
                'deskripsi' => 'Pengenalan perangkat dan konfigurasi jaringan Cisco.',
            ],
            [
                'kode_buku' => 'BK-WEB-002',
                'judul_buku' => 'React & Next.js Development',
                'kategori' => 'Web Design',
                'pengarang' => 'Maya Putri',
                'penerbit' => 'Creative Media',
                'tahun_terbit' => 2024,
                'isbn' => '978-602-1111-08-8',
                'bahasa' => 'Indonesia',
                'harga' => 125000,
                'stok' => 2,
                'deskripsi' => 'Membangun aplikasi web modern dengan React dan Next.js.',
            ],
            [
                'kode_buku' => 'BK-DS-001',
                'judul_buku' => 'Data Science dengan R',
                'kategori' => 'Data Science',
                'pengarang' => 'Rina Marlina',
                'penerbit' => 'Data Publisher',
                'tahun_terbit' => 2023,
                'isbn' => '978-602-1111-09-9',
                'bahasa' => 'Indonesia',
                'harga' => 130000,
                'stok' => 1,
                'deskripsi' => 'Analisis data menggunakan bahasa pemrograman R.',
            ],
            [
                'kode_buku' => 'BK-DS-002',
                'judul_buku' => 'Machine Learning untuk Bisnis',
                'kategori' => 'Data Science',
                'pengarang' => 'Dian Permata',
                'penerbit' => 'Data Publisher',
                'tahun_terbit' => 2024,
                'isbn' => '978-602-1111-10-0',
                'bahasa' => 'Indonesia',
                'harga' => 140000,
                'stok' => 4,
                'deskripsi' => 'Penerapan machine learning untuk kebutuhan bisnis.',
            ],
        ];

        foreach ($bukus as $buku) {
            Buku::create($buku);
        }
    }
}
