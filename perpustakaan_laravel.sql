-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2026 at 06:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_anggota` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `tanggal_daftar` date NOT NULL,
  `status` enum('Aktif','Nonaktif') NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `kode_anggota`, `nama`, `email`, `telepon`, `alamat`, `tanggal_lahir`, `jenis_kelamin`, `pekerjaan`, `tanggal_daftar`, `status`, `created_at`, `updated_at`) VALUES
(10, 'AGT-2025-001', 'Sintia', 'Sintia@gmail.com', '081234567801', 'Jl. Melati No. 12, Bandung', '2001-05-14', 'Perempuan', 'Mahasiswa', '2025-01-10', 'Aktif', '2026-07-06 03:39:30', '2026-07-06 05:49:47'),
(11, 'AGT-2025-002', 'Sukma Cokrominoto', 'Cokro@gmail.com', '081234567802', 'Jl. Kenanga No. 5, Jakarta', '1990-08-22', 'Laki-laki', 'Karyawan Swasta', '2025-02-15', 'Aktif', '2026-07-06 03:39:30', '2026-07-06 05:50:28'),
(12, 'AGT-2025-003', 'Hasan Husen', 'Hasan@gmail.com', '081234567803', 'Jl. Anggrek No. 8, Surabaya', '1988-03-30', 'Perempuan', 'Guru', '2025-03-05', 'Aktif', '2026-07-06 03:39:30', '2026-07-06 05:51:31'),
(13, 'AGT-2025-004', 'Mayzalden', 'Zalden@gmail.com', '081234567804', 'Jl. Mawar No. 20, Yogyakarta', '1985-11-11', 'Laki-laki', 'Wiraswasta', '2024-12-01', 'Nonaktif', '2026-07-06 03:39:30', '2026-07-06 05:51:56'),
(14, 'AGT-2025-005', 'Vici', 'Vicidior@gmail.com', '081234567805', 'Jl. Dahlia No. 3, Semarang', '2002-07-19', 'Perempuan', 'Mahasiswa', '2025-04-20', 'Aktif', '2026-07-06 03:39:30', '2026-07-06 05:52:23'),
(15, 'AGT-2025-006', 'Hasanain', 'Hasanain@gmail.com', '081234567806', 'Jl. Flamboyan No. 7, Malang', '1979-09-09', 'Laki-laki', 'PNS', '2025-05-18', 'Aktif', '2026-07-06 03:39:30', '2026-07-06 05:52:58'),
(16, 'AGT-2025-007', 'Cahya', 'Cahya@gmail.com', '081234567807', 'Jl. Cempaka No. 15, Bogor', '1995-01-25', 'Perempuan', 'Karyawan Swasta', '2024-11-11', 'Nonaktif', '2026-07-06 03:39:30', '2026-07-06 05:53:41'),
(17, 'AGT-2025-008', 'Joko Electric Man', 'joko@gmail.com', '081234567808', 'Jl. Teratai No. 9, Depok', '1982-06-17', 'Laki-laki', 'Dosen', '2025-06-02', 'Aktif', '2026-07-06 03:39:30', '2026-07-06 05:54:06'),
(18, 'AGT-2025-009', 'Tokyo', 'Tokyo@gmail.com', '081234567809', 'Jl. Seruni No. 4, Tangerang', '2004-02-28', 'Perempuan', 'Pelajar', '2025-06-25', 'Aktif', '2026-07-06 03:39:30', '2026-07-06 05:54:36'),
(19, 'AGT-2026-011', 'Andi Wuddy', 'Wuddy@gmail.com', '081234567810', 'Jl. Kamboja No. 11, Bekasi', '1998-10-05', 'Laki-laki', 'Mahasiswa', '2025-07-01', 'Aktif', '2026-07-06 03:39:30', '2026-07-06 05:54:56');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_buku` varchar(20) NOT NULL,
  `judul_buku` varchar(200) NOT NULL,
  `kategori` enum('Programming','Database','Web Design','Networking','Data Science') NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `negara_penerbit` varchar(50) DEFAULT NULL,
  `kota_penerbit` varchar(50) DEFAULT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `isbn` varchar(20) DEFAULT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `deskripsi` text DEFAULT NULL,
  `bahasa` varchar(20) NOT NULL DEFAULT 'Indonesia',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `kode_buku`, `judul_buku`, `kategori`, `pengarang`, `penerbit`, `negara_penerbit`, `kota_penerbit`, `tahun_terbit`, `isbn`, `harga`, `stok`, `deskripsi`, `bahasa`, `created_at`, `updated_at`) VALUES
(25, 'BK-PROG-001', 'Learning Python for Beginners', 'Programming', 'Budi Santoso', 'Informatika Press', NULL, NULL, '2023', '978-602-1111-01-1', 95000.00, 11, 'Panduan dasar pemrograman Python untuk pemula.', 'Inggris', '2026-07-06 03:35:17', '2026-07-06 03:45:06'),
(26, 'BK-PROG-002', 'Clean Code Architecture', 'Programming', 'Andi Wijaya', 'Tekno Media', NULL, NULL, '2022', '978-602-1111-02-2', 110000.00, 8, 'Prinsip menulis kode yang bersih dan mudah dirawat.', 'Inggris', '2026-07-06 03:35:17', '2026-07-06 03:35:17'),
(27, 'BK-WEB-001', 'Modern Web Design', 'Web Design', 'Ahmad Yani', 'Creative Media', NULL, NULL, '2024', '978-602-1234-56-3', 120000.00, 0, 'Prinsip dan praktik desain web modern.', 'Indonesia', '2026-07-06 03:35:17', '2026-07-06 03:35:17'),
(28, 'BK-DB-001', 'PostgreSQL Administration', 'Database', 'Dewi Lestari', 'DB Publisher', NULL, NULL, '2023', '978-602-1111-04-4', 135000.00, 14, 'Panduan administrasi database PostgreSQL.', 'Indonesia', '2026-07-06 03:35:17', '2026-07-06 03:47:27'),
(29, 'BK-DB-002', 'MySQL Fundamentals', 'Database', 'Siti Rahma', 'DB Publisher', NULL, NULL, '2021', '978-602-1111-05-5', 90000.00, 0, 'Dasar-dasar pengelolaan database MySQL.', 'Indonesia', '2026-07-06 03:35:17', '2026-07-06 03:35:17'),
(30, 'BK-NET-001', 'Network Security Fundamentals', 'Networking', 'Rudi Hartono', 'Net Press', NULL, NULL, '2022', '978-602-1111-06-6', 105000.00, 3, 'Konsep dasar keamanan jaringan komputer.', 'Indonesia', '2026-07-06 03:35:17', '2026-07-06 03:35:17'),
(32, 'BK-WEB-002', 'React & Next.js Development', 'Web Design', 'Maya Putri', 'Creative Media', NULL, NULL, '2024', '978-602-1111-08-8', 125000.00, 2, 'Membangun aplikasi web modern dengan React dan Next.js.', 'Indonesia', '2026-07-06 03:35:17', '2026-07-06 03:35:17'),
(33, 'BK-DS-001', 'Data Science dengan R', 'Data Science', 'Rina Marlina', 'Data Publisher', NULL, NULL, '2023', '978-602-1111-09-9', 130000.00, 1, 'Analisis data menggunakan bahasa pemrograman R.', 'Indonesia', '2026-07-06 03:35:17', '2026-07-06 03:45:57'),
(34, 'BK-DS-002', 'Machine Learning untuk Bisnis', 'Data Science', 'Dian Permata', 'Data Publisher', NULL, NULL, '2024', '978-602-1111-10-0', 140000.00, 3, 'Penerapan machine learning untuk kebutuhan bisnis.', 'Indonesia', '2026-07-06 03:35:17', '2026-07-06 03:43:20');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('perpustakaan_11_cache_meiffio@gmail.com|127.0.0.1', 'i:3;', 1783324360),
('perpustakaan_11_cache_meiffio@gmail.com|127.0.0.1:timer', 'i:1783324360;', 1783324360);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `warna` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `deskripsi`, `icon`, `warna`, `created_at`, `updated_at`) VALUES
(1, 'Programming', 'Kategori buku pemrograman', 'code-slash', 'primary', '2026-05-24 05:36:05', '2026-05-24 05:36:05'),
(2, 'Database', 'Kategori buku database', 'database', 'success', '2026-05-24 05:36:05', '2026-05-24 05:36:05'),
(3, 'Web Design', 'Kategori buku desain web', 'palette', 'info', '2026-05-24 05:36:05', '2026-05-24 05:36:05'),
(4, 'Networking', 'Kategori buku jaringan komputer', 'wifi', 'warning', '2026-05-24 05:36:05', '2026-05-24 05:36:05'),
(5, 'Data Science', 'Kategori buku data science', 'graph-up', 'danger', '2026-05-24 05:36:05', '2026-05-24 05:36:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_05_19_090955_create_buku_table', 1),
(5, '2026_05_19_092320_create_anggota_table', 1),
(6, '2026_05_20_144654_add_penerbit_detail_to_buku_table', 1),
(7, '2026_05_24_122447_create_kategori_table', 2),
(8, '2026_06_22_141743_create_transaksis_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('IpnJTYjo4gUbKxf8BjY8CUrKacbollTjBjfWXUJb', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoickE5emhrZURSajEzS2hGSWgxRndGamwzYVpjekI2TjVKVXoydWhtcSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjI5OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvbGFwb3JhbiI7czo1OiJyb3V0ZSI7czoxMzoibGFwb3Jhbi5pbmRleCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1783353468);

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_transaksi` varchar(20) NOT NULL,
  `anggota_id` bigint(20) UNSIGNED NOT NULL,
  `buku_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `tanggal_dikembalikan` date DEFAULT NULL,
  `status` enum('Dipinjam','Dikembalikan') NOT NULL DEFAULT 'Dipinjam',
  `denda` int(11) NOT NULL DEFAULT 0,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `kode_transaksi`, `anggota_id`, `buku_id`, `tanggal_pinjam`, `tanggal_kembali`, `tanggal_dikembalikan`, `status`, `denda`, `keterangan`, `created_at`, `updated_at`) VALUES
(6, 'TRX-001', 17, 33, '2026-06-01', '2026-06-08', '2026-07-06', 'Dikembalikan', 140000, 'Saya perlu buku ini untuk belajar mengenai data', '2026-07-06 03:42:26', '2026-07-06 03:45:57'),
(7, 'TRX-002', 19, 34, '2026-07-02', '2026-07-09', NULL, 'Dipinjam', 0, NULL, '2026-07-06 03:43:20', '2026-07-06 03:43:20'),
(8, 'TRX-003', 12, 25, '2026-07-06', '2026-07-13', NULL, 'Dipinjam', 0, NULL, '2026-07-06 03:45:06', '2026-07-06 03:45:06'),
(9, 'TRX-004', 18, 28, '2026-06-22', '2026-06-29', NULL, 'Dipinjam', 0, NULL, '2026-07-06 03:47:27', '2026-07-06 03:47:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Perpustakaan', 'admin@perpustakaan.com', NULL, '$2y$12$DuZTLErKPi2qb4Z5k5/1s.VqyX3W6THPYTZNtdhcja0EVsyKjgM3m', NULL, '2026-06-22 06:06:56', '2026-06-22 06:06:56'),
(2, 'Meiffio', 'meiffio.hasanain.mayzaldin24061@mhs.uingusdur.ac.id', NULL, '$2y$12$o9QCwceJiR1yXCAEnTrd.O0HDiD3b6bNrce0oYqLW7ASJmZ6tGSUu', NULL, '2026-07-03 14:39:40', '2026-07-03 14:39:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `anggota_kode_anggota_unique` (`kode_anggota`),
  ADD UNIQUE KEY `anggota_email_unique` (`email`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `buku_kode_buku_unique` (`kode_buku`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategori_nama_kategori_unique` (`nama_kategori`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaksis_kode_transaksi_unique` (`kode_transaksi`),
  ADD KEY `transaksis_anggota_id_foreign` (`anggota_id`),
  ADD KEY `transaksis_buku_id_foreign` (`buku_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_anggota_id_foreign` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksis_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
