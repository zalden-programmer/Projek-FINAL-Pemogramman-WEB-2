# Sistem Informasi Manajemen Perpustakaan Digital

Aplikasi Manajemen Perpustakaan berbasis web yang tangguh, responsif, dan aman, dibangun menggunakan **PHP Laravel**. Proyek ini dikembangkan secara komprehensif sebagai proyek tugas akhir (Final Project) untuk mata kuliah **Pemrograman Web 2**. Sistem ini mengotomatiskan seluruh alur kerja perpustakaan konvensional, mulai dari manajemen inventaris buku, keanggotaan, kalkulasi denda, hingga visualisasi data pada dashboard analitik.

---

## Informasi Pengembang
- Proyek ini dirancang, dikembangkan, dan diuji secara mandiri oleh:
- Nama Lengkap: Meiffio Hasanain M
- Nomor Induk Mahasiswa (NIM): 60324061
- Program Studi: Informatika
- Profil Utama: @zalden-programmer

## Fitur Aplikasi (Status: Terimplementasi Sempurna)

Berikut adalah daftar modul dan fitur wajib yang telah selesai dikembangkan dan berfungsi 100% tanpa kendala:

### 1. Authentication System
Sistem keamanan berlapis untuk menjamin integritas data perpustakaan.
- [x] **Alur Autentikasi Lengkap:** Fitur Login, Register (pendaftaran petugas baru), dan Logout yang aman.
- [x] **Password Hashing:** Keamanan kredensial pengguna terjamin menggunakan algoritma hashing bawaan Laravel (**Bcrypt**).
- [x] **Middleware Protection:** Proteksi jalur URL (*routing*) ketat. Halaman administrasi tidak dapat diakses tanpa sesi login yang valid.

### 2. CRUD Buku Lengkap
Modul pengelolaan data katalog dan inventarisasi buku perpustakaan.
- [x] **Operasi CRUD Arsitektural:** Pembuatan (*Create*), pembacaan (*Read*), pembaruan (*Update*), dan penghapusan (*Delete*) data buku beserta relasi kategorinya.
- [x] **Validasi Sisi Server (Request Validation):** Validasi ketat untuk input ISBN unik, judul, penulis, tahun terbit, dan jumlah stok buku guna menghindari redundansi data.
- [x] **Search & Filter Eksklusif:** Memudahkan pencarian buku berdasarkan judul, penulis, atau penerbit, serta filter dinamis per kategori.

### 3. CRUD Anggota Lengkap
Modul manajemen data profil pengguna/mahasiswa yang terdaftar sebagai anggota perpustakaan.
- [x] **Operasi CRUD Komprehensif:** Manajemen menyeluruh data anggota (Tambah, Lihat Detail, Ubah Riwayat, Hapus Anggota).
- [x] **Date Handling Manusiawi:** Format tanggal lahir, tanggal pendaftaran, dan status masa aktif kartu anggota terkelola dengan baik menggunakan library **Carbon**.
- [x] **Validasi Kontak Ketat:** Validasi keaslian format email (RFC compliant) dan nomor telepon/WhatsApp untuk kebutuhan korespondensi denda.

### 4. Transaksi Peminjaman Buku
Sistem pencatatan sirkulasi buku keluar yang cerdas dan otomatis.
- [x] **Form Peminjaman Interaktif:** Input data dinamis yang menghubungkan ID Anggota dengan beberapa ID Buku sekaligus dalam satu transaksi.
- [x] **Auto Update Stok (Dekremen):** Stok buku otomatis berkurang 1 (`-1`) sesaat setelah transaksi peminjaman berhasil divalidasi. Aplikasi mendeteksi dan menolak transaksi jika stok buku habis (`0`).
- [x] **Generate Kode Transaksi Unik:** Pembuatan kode transaksi otomatis yang terstandardisasi (contoh: `TRX-XXXX`) sebagai primary key pelacakan.
- [x] **Otomatisasi Tanggal Kembali:** Sistem otomatis menghitung dan menetapkan batas waktu pengembalian tepat **7 hari (+7 hari)** setelah tanggal peminjaman dibuat.

### 5. Pengembalian Buku & Manajemen Denda
Modul sirkulasi masuk dan penegakan regulasi keterlambatan.
- [x] **Pembaruan Status Real-time:** Mengubah status transaksi dari `Dipinjam` menjadi `Kembali` atau `Terlambat` secara otomatis.
- [x] **Kalkulasi Denda Otomatis:** Menghitung selisih hari keterlambatan terhadap batas kembali. Jika terlambat, sistem menerapkan denda secara presisi sebesar **Rp 5.000 / hari**.
- [x] **Auto Update Stok (Inkremen):** Stok fisik buku otomatis bertambah kembali 1 (`+1`) di dalam database ketika buku sukses dikembalikan oleh petugas.

### 6. Dashboard Analitik Utama
Pusat kendali visual terpadu untuk membaca ringkasan performa operasional perpustakaan secara instan.
- [x] **Minimal 6 Komponen Statistik Utama:**
  - Total Koleksi Buku
  - Total Anggota Aktif
  - Transaksi Berjalan (Sedang Dipinjam)
  - Total Transaksi Selesai
  - Transaksi Terlambat (Overdue)
  - Akumulasi Pendapatan Kas Denda (Rp)
- [x] **2 Charts Visualisasi Interaktif:**
  - **Line Chart:** Memvisualisasikan tren grafik peminjaman buku dari bulan ke bulan sepanjang tahun berjalan.
  - **Pie/Bar Chart:** Menampilkan persentase kategori buku yang paling sering dipinjam (Koleksi Terpopuler).
- [x] **Recent Data Tables:** Menampilkan tabel mini berisi 5 transaksi peminjaman terbaru dan 5 anggota yang baru bergabung untuk pemantauan cepat.
- [x] **Quick Actions Menu:** Tombol pintas sekali klik untuk langsung menuju form tambah buku, form transaksi baru, dan input anggota tanpa membuka sidebar menu.

### 7. Global Search (Multi-Module Search)
Fitur penjelajahan data menyeluruh dari satu kolom input tunggal di bagian navbar.
- [x] **Pencarian Lintas 3 Modul:** Mencari kata kunci sekaligus secara paralel di dalam modul **Buku**, modul **Anggota**, dan modul **Transaksi**.
- [x] **Hasil Pencarian Berbasis Tabs:** Menampilkan output pencarian yang terorganisir rapi dipisahkan dalam tab Buku, tab Anggota, dan tab Transaksi.
- [x] **Keyword Highlighting:** Menerapkan penandaan visual (highlighting text) berwarna kuning pada teks yang cocok dengan kata kunci pencarian agar mudah diidentifikasi mata.

### 8. Laporan Transaksi Komprehensif
Sistem pelaporan performa sirkulasi berkala untuk kebutuhan manajerial perpustakaan.
- [x] **Multi-Filter Lanjutan:** Filter data laporan yang fleksibel berdasarkan rentang tanggal tertentu (*date range*), status transaksi (`Dipinjam`, `Kembali`, `Denda`), dan nama anggota spesifik.
- [x] **Ringkasan Statistik Laporan (Summary):** Menampilkan total buku dipinjam, total buku kembali, serta total denda yang terkumpul khusus pada periode yang difilter.
- [x] **Print-Friendly Design:** Halaman laporan dilengkapi dengan CSS `@media print` khusus, sehingga ketika tombol cetak ditekan, tampilan navbar, sidebar, dan tombol aksi akan otomatis disembunyikan untuk menghasilkan cetakan fisik/PDF yang bersih dan profesional.

---

## Tech Stack & Arsitektur

Aplikasi ini dirancang menggunakan standar industri modern untuk memastikan kecepatan, keamanan, dan kemudahan skalabilitas:
* **Core Framework:** PHP Laravel v11.x (Arsitektur Model-View-Controller)
* **Database Engine:** MySQL (Dengan optimasi indexing pada Foreign Key)
* **Frontend UI Engine:** [Bootstrap v5 / Tailwind CSS]
* **Library Grafik:** Chart.js / ApexCharts (Bekerja secara asinkronus menyerap data JSON)
* **Manajemen Paket:** Composer (PHP Dependensi) & NPM (Asset Bundler)

## 🗄️ Database Configuration (.sql)

Proyek ini menggunakan database relasional MySQL. Arsitektur tabel telah dirancang dengan struktur yang bersih, relasi *foreign key* yang tepat, serta dilengkapi dengan data sampel untuk memudahkan pengujian.
- [x] **Export Database Lengkap:** Berkas database utuh telah diekspor dan disediakan di dalam repositori proyek (nama file: `perpustakaan_laravel.sql`).
- [x] **Include Sample Data:** Sudah termasuk data sampel (*dummy data*) untuk tabel Buku, Anggota, Petugas/Admin, dan beberapa contoh Transaksi aktif agar aplikasi langsung siap diuji tanpa harus menginput dari awal.
- [x] **Clear Table Structure:** Struktur tabel bersih menggunakan standar penamaan *snake_case* Laravel, lengkap dengan indexing pada kolom pencarian dan *cascade delete* pada relasi tabel transaksi demi menjaga integritas data.

---

## Dokumentasi Antarmuka (Screenshots)

*Berikut adalah bukti visual fungsionalitas sistem perpustakaan yang telah dibangun:*

### 1. Sistem Keamanan & Pintu Masuk Aplikasi (Halaman Login)
<img width="454" height="381" alt="image" src="https://github.com/user-attachments/assets/b49bc372-6c42-443b-8e86-0e577333d84a" />
*Tampilan form login yang dilengkapi perlindungan CSRF Token dan validasi error real-time.*

### 2. Pusat Kontrol Utama (Dashboard Analitik & 2 Charts)
<img width="952" height="386" alt="image" src="https://github.com/user-attachments/assets/2613dfc6-e018-4dda-ae3a-f3bdf6045f0e" />

<img width="959" height="320" alt="image" src="https://github.com/user-attachments/assets/6c9af9c5-0838-4feb-b98a-684b2dfe37d6" />

*Menampilkan 6 kartu statistik utama, grafik tren peminjaman (Line), dan komposisi buku terpopuler (Pie/Bar).*

### 3. Manajemen Inventaris Katalog (CRUD Buku & Filter)

<img width="959" height="477" alt="image" src="https://github.com/user-attachments/assets/9a9fb45e-3d47-4a44-b298-6b30b1ef9629" />

<img width="958" height="456" alt="image" src="https://github.com/user-attachments/assets/4fb252dc-524d-4d0a-b79e-579ebd173494" />

*Tampilan tabel data koleksi buku lengkap dengan tombol aksi, pagination, dan kolom pencarian.*

### 4. Sistem Sirkulasi Cerdas (Form Peminjaman & Deteksi Batas Waktu)

<img width="682" height="464" alt="image" src="https://github.com/user-attachments/assets/35082c47-1df7-41c9-9394-215d69fb818b" />

*Formulir peminjaman interaktif yang otomatis mengunci tanggal kembali +7 hari dan mengurangi stok sistem.*

### 5. Modul Manajerial (Laporan Transaksi & Cetak Print-Friendly)

<img width="959" height="478" alt="image" src="https://github.com/user-attachments/assets/efb62d67-d31d-417c-8a73-1cb93a9d794a" />

*Halaman filter laporan komprehensif yang bersih dan siap dicetak ke media fisik atau diekspor ke PDF.*

---

## ⚙️ Panduan Instalasi Lokal (Step-by-Step)

Ikuti instruksi di bawah ini dengan saksama untuk mereplikasi dan menjalankan aplikasi ini di lingkungan komputer lokal Anda:

### 1. Unduh Source Code
Lakukan *cloning* repositori ini melalui terminal Anda atau unduh file berkas ZIP.
```bash
git clone [https://github.com/zalden-programmer/Projek-FINAL-Pemogramman-WEB-2.git](https://github.com/zalden-programmer/Projek-FINAL-Pemogramman-WEB-2.git)
cd Projek-FINAL-Pemogramman-WEB-2
```
### 2. Pasang Dependensi Framework
Gunakan Composer untuk mengunduh seluruh pustaka (library) backend PHP yang dibutuhkan oleh Laravel berdasarkan berkas pengunci proyek.
```bash
composer install
```

### 3. Replika Konfigurasi Lingkungan (.env)
Salin berkas cetak biru pengaturan lokal menjadi file .env aktif yang dibaca sistem.
```bash
cp .env.example .env
```
### 4. Buat Kunci Enkripsi Aplikasi
Jalankan perintah ini untuk membuat Application Key unik baru di dalam berkas .env Anda demi keamanan sesi aplikasi.
```bash
php artisan key:generate
```
### 5. Konfigurasi Koneksi Database
Buka berkas .env menggunakan teks editor pilihan Anda (misalnya VS Code). Cari baris berikut dan sesuaikan nama databasenya dengan database lokal yang Anda buat di phpMyAdmin:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_perpustakaan_11
DB_USERNAME=root
DB_PASSWORD=
```
### 6. Eksekusi Struktur Tabel (Migrasi)
Jalankan sistem migrasi Laravel untuk membangun seluruh arsitektur tabel (books, members, transactions, dll.) secara otomatis ke dalam database MySQL Anda tanpa perlu melakukan import manual.
```bash
php artisan db:seed
```

### 7. Nyalakan Mesin Aplikasi
Aktifkan XAMPP atau lainnya dan aktifkan server pengembangan lokal bawaan PHP melalui perintah artisan:
```bash
php artisan serve
```
Aplikasi kini siap diakses penuh. Buka peramban (web browser) Anda lalu arahkan ke alamat URL lokal: http://127.0.0.1:8000.
