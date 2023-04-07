-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2023 at 06:01 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manonjaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `atk`
--

CREATE TABLE `atk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `bobot` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `atk`
--

INSERT INTO `atk` (`id`, `item_name`, `satuan`, `stok`, `bobot`, `deleted_at`) VALUES
(1, 'KARTU ANGSURAN', 'lembar', 0, 40, NULL),
(2, 'KARTU TABER', 'lembar', 0, 40, NULL),
(3, 'BUKU TABUNGAN', 'pcs', 0, 25, NULL),
(4, 'ODNER BESAR', 'pcs', 0, 3, NULL),
(5, 'ODNER KECIL', 'pcs', 0, 3, NULL),
(6, 'PULPEN', 'stick', 0, 12, NULL),
(7, 'LEM KERTAS', 'stick', 0, 2, NULL),
(8, 'SPIDOL', 'stick', 0, 3, NULL),
(9, 'LAKBAN BENING KECIL', 'roll', 0, 2, NULL),
(10, 'TINTA MERAH', 'unit', 0, 1, NULL),
(11, 'TINTA KUNING', 'unit', 0, 1, NULL),
(12, 'TINTA BIRU', 'unit', 0, 1, NULL),
(13, 'TINTA HITAM', 'unit', 0, 1, NULL),
(14, 'KWITANSI TRANSAKSI', 'pcs', 0, 10, NULL),
(15, 'SLIP DEBET', 'pcs', 0, 7, NULL),
(16, 'SLIP CREDIT', 'pcs', 0, 7, NULL),
(17, 'MAP PLASTIK', 'pcs', 0, 5, NULL),
(18, 'BUSSINES FILE', 'pcs', 0, 4, NULL),
(19, 'STEPLER', 'pcs', 0, 2, NULL),
(20, 'NOTE', 'pcs', 0, 3, NULL),
(21, 'TRIGONAL CLIP', 'pcs', 0, 2, NULL),
(22, 'STEPLER ARSIP', 'pcs', 0, 0, NULL),
(23, 'BUKU CATATAN', 'pcs', 0, 2, NULL),
(24, 'STABILO', 'pcs', 0, 3, NULL),
(25, 'CAP KECIL', 'unit', 0, 1, NULL),
(26, 'TIPE-X', 'pcs', 0, 1, NULL),
(27, 'LAKBAN KERTAS', 'roll', 0, 2, NULL),
(28, 'DOUBLETAPE KECIL', 'roll', 0, 2, NULL),
(29, 'LAKBAN HITAM', 'roll', 0, 2, NULL),
(30, 'COMPANY PROFILE', 'lembar', 0, 2, NULL),
(31, 'BOX FILE', 'pcs', 0, 2, NULL),
(32, 'KERTAS A4', 'pcs', 0, 3, NULL),
(33, 'GUNTING', 'unit', 0, 1, NULL),
(34, 'STEPLES', 'pcs', 0, 2, NULL),
(35, 'KANTUNG UANG', 'pcs', 0, 2, NULL),
(36, 'NAZAVA RIAM', 'unit', 0, 2, NULL),
(37, 'LAKBAN BENING BESAR', 'roll', 0, 1, NULL),
(38, 'POSH IT', 'pcs', 0, 2, NULL),
(39, 'BINDER CLIP SM', 'pcs', 0, 1, NULL),
(40, 'BINDER CLIP M', 'pcs', 0, 1, NULL),
(41, 'BINDER CLIP XL', 'pcs', 0, 1, NULL),
(42, 'PUSH PIN', 'pcs', 0, 1, NULL),
(43, 'PENGGARIS', 'pcs', 0, 1, NULL),
(44, 'KERTAS F4', 'pcs', 0, 1, NULL),
(45, 'KALKULATOR', 'unit', 0, 1, NULL),
(46, 'CUTTER', 'unit', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `barang_hilang`
--

CREATE TABLE `barang_hilang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `trx_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Triggers `barang_hilang`
--
DELIMITER $$
CREATE TRIGGER `DeleteBarangHilang` AFTER DELETE ON `barang_hilang` FOR EACH ROW BEGIN UPDATE atk SET stok=stok+old.qty WHERE atk.id=old.item_id; END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TriggerBarangHilang` AFTER INSERT ON `barang_hilang` FOR EACH ROW BEGIN UPDATE atk SET stok=stok-new.qty WHERE atk.id=new.item_id; END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `petugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `trx_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Triggers `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `DeleteBarangKeluar` AFTER DELETE ON `barang_keluar` FOR EACH ROW BEGIN UPDATE atk SET stok=stok+old.qty WHERE atk.id=old.item_id; END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TriggerBarangKeluar` AFTER INSERT ON `barang_keluar` FOR EACH ROW BEGIN UPDATE atk SET stok=stok-new.qty WHERE atk.id=new.item_id; END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `trx_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Triggers `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `DeleteBarangMasuk` AFTER DELETE ON `barang_masuk` FOR EACH ROW BEGIN UPDATE atk SET stok=stok-old.qty WHERE atk.id=old.item_id; END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TambahStok` AFTER INSERT ON `barang_masuk` FOR EACH ROW BEGIN UPDATE atk SET stok=stok+new.qty WHERE atk.id=new.item_id; END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `majelis`
--

CREATE TABLE `majelis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_23_140628_create_alat_tulis_kantors_table', 1),
(6, '2023_01_25_213720_create_barang_masuk_table', 1),
(7, '2023_01_25_213818_create_barang_keluar_table', 1),
(8, '2023_01_25_213836_create_barang_hilang_table', 1),
(9, '2023_01_29_065328_create_wakalah_table', 1),
(10, '2023_01_29_074406_create_petugas_table', 1),
(11, '2023_01_29_081701_create_majelis_table', 1),
(12, '2023_01_30_133906_trigger_tambah_stok', 1),
(13, '2023_01_30_133934_trigger_kurang_stok', 1),
(14, '2023_01_30_140958_trigger_barang_hilang', 1),
(15, '2023_01_30_141924_create_titipans_table', 1),
(16, '2023_01_31_152801_create_selisih_lebihs_table', 1),
(17, '2023_01_31_152818_create_selisih_kurangs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('tpl','supervisi','kepala cabang','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('aktif','non aktif') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `selisih_kurang`
--

CREATE TABLE `selisih_kurang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trx_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `petugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `debet` decimal(15,0) NOT NULL,
  `kredit` decimal(15,0) NOT NULL,
  `status` enum('approve','pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `selisih_lebih`
--

CREATE TABLE `selisih_lebih` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trx_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `petugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `debet` decimal(15,0) NOT NULL,
  `kredit` decimal(15,0) NOT NULL,
  `status` enum('approve','pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `titipan`
--

CREATE TABLE `titipan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trx_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `petugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `debet` decimal(15,0) NOT NULL,
  `kredit` decimal(15,0) NOT NULL,
  `status` enum('taken','not_taken') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not_taken',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','tpl') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tpl',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sumardi', 'admin@gmail.com', NULL, '$2y$10$ZELTHdC7690GW5xU02ucROMbFomK0L40.0aTEXUUwg6kepdyQUNqW', 'admin', NULL, NULL, NULL),
(2, 'tpl', 'tpl@gmail.com', NULL, '$2y$10$QhG0hJyXFIzRtzoeygPoBuC9HcN3wDh3S0pyVaMKzIx86dSJtrDEG', 'tpl', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wakalah`
--

CREATE TABLE `wakalah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `petugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `majelis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` decimal(15,0) NOT NULL,
  `status` enum('OnProses','Approve','Reject') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'OnProses',
  `trx_wkl` date NOT NULL,
  `trx_mba` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atk`
--
ALTER TABLE `atk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_hilang`
--
ALTER TABLE `barang_hilang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_hilang_item_id_foreign` (`item_id`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_keluar_item_id_foreign` (`item_id`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_masuk_item_id_foreign` (`item_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `majelis`
--
ALTER TABLE `majelis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selisih_kurang`
--
ALTER TABLE `selisih_kurang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selisih_lebih`
--
ALTER TABLE `selisih_lebih`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `titipan`
--
ALTER TABLE `titipan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wakalah`
--
ALTER TABLE `wakalah`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atk`
--
ALTER TABLE `atk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `barang_hilang`
--
ALTER TABLE `barang_hilang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `majelis`
--
ALTER TABLE `majelis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `selisih_kurang`
--
ALTER TABLE `selisih_kurang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `selisih_lebih`
--
ALTER TABLE `selisih_lebih`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `titipan`
--
ALTER TABLE `titipan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wakalah`
--
ALTER TABLE `wakalah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_hilang`
--
ALTER TABLE `barang_hilang`
  ADD CONSTRAINT `barang_hilang_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `atk` (`id`);

--
-- Constraints for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `atk` (`id`);

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `atk` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
