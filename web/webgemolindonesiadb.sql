-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 12, 2022 at 06:28 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webgemolindonesiadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'ilham', '$2y$10$3XVUC7eQCBmIjymuR7nsGOGuVCn8r8rcjmqnJyf957vTwY/4TOBzW', '2022-05-04 07:18:37', '2022-05-04 07:18:37');

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `jenis_barang_id` bigint(20) UNSIGNED NOT NULL,
  `foto_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat_barang` int(11) NOT NULL,
  `status_barang_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `nama_barang`, `harga_barang`, `jenis_barang_id`, `foto_barang`, `berat_barang`, `status_barang_id`, `created_at`, `updated_at`) VALUES
(1, 'cookies singkong cheese sago', 25000, 1, 'barang-images/pInYrdY1cjG3iHNerDHHQoWHDL711Ihpb23AbTMM.jpg', 225, 1, '2022-05-04 07:18:37', '2022-05-12 01:47:20'),
(2, 'cookies singkong chocolate chip', 25000, 1, 'barang-images/mysdvka7VSxbuK5pKkZjDe57CJb6IRh8x0xuDTNi.jpg', 225, 2, '2022-05-04 07:18:37', '2022-05-12 01:47:44'),
(3, 'cookies singkong chocostick', 50000, 1, 'barang-images/IDXzIVLB0kCQZawtIAjJjcwaOtV8l4vtM78HeEqj.jpg', 225, 1, '2022-05-04 07:18:37', '2022-05-12 01:47:54');

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualans`
--

CREATE TABLE `detail_penjualans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penjualan_id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_penjualans`
--

INSERT INTO `detail_penjualans` (`id`, `jumlah_barang`, `penjualan_id`, `barang_id`, `created_at`, `updated_at`) VALUES
(1, '200', 1, 1, '2020-05-20 11:58:39', '2022-05-05 11:58:39'),
(2, '100', 1, 2, '2022-05-05 11:58:39', '2022-05-05 11:58:39'),
(3, '10', 2, 1, '2022-05-05 11:59:45', '2022-05-05 11:59:45'),
(4, '12', 2, 2, '2022-05-05 11:59:45', '2022-05-05 11:59:45'),
(5, '32', 2, 3, '2022-05-05 11:59:45', '2022-05-05 11:59:45'),
(6, '1', 3, 1, '2022-04-01 00:50:42', '2022-05-07 00:50:42'),
(7, '122', 4, 1, '2022-05-12 05:00:44', '2022-05-12 05:00:44'),
(8, '1234213', 4, 2, '2022-05-12 05:00:44', '2022-05-12 05:00:44'),
(9, '123123', 4, 3, '2022-05-12 05:00:44', '2022-05-12 05:00:44'),
(10, '12', 4, 2, '2022-05-12 05:00:44', '2022-05-12 05:00:44'),
(11, '13123', 4, 1, '2022-05-12 05:00:44', '2022-05-12 05:00:44');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barangs`
--

CREATE TABLE `jenis_barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jenis_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_barangs`
--

INSERT INTO `jenis_barangs` (`id`, `nama_jenis_barang`, `created_at`, `updated_at`) VALUES
(1, 'cookies', '2022-05-04 07:18:37', '2022-05-04 07:18:37'),
(2, 'coffee', '2022-05-04 07:18:37', '2022-05-04 07:18:37');

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
(5, '2022_04_21_121846_create_barangs_table', 1),
(6, '2022_04_21_171744_create_jenis_barangs_table', 1),
(7, '2022_04_22_030728_create_status_barangs_table', 1),
(8, '2022_04_22_083440_create_admins_table', 1),
(9, '2022_04_24_174102_create_pengeluarans_table', 1),
(10, '2022_04_29_050342_create_penjualans_table', 1),
(11, '2022_04_29_051110_create_pembelis_table', 1),
(12, '2022_04_29_052321_create_detail_penjualans_table', 1),
(13, '2022_05_02_141325_create_testimonis_table', 1),
(14, '2022_05_02_171501_create_ulasans_table', 1);

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
-- Table structure for table `pembelis`
--

CREATE TABLE `pembelis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pembeli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp_pembeli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pembeli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelis`
--

INSERT INTO `pembelis` (`id`, `nama_pembeli`, `no_telp_pembeli`, `alamat_pembeli`, `created_at`, `updated_at`) VALUES
(1, 'ilham', '081219855701', 'Jl.werkudoro', '2022-05-05 11:58:39', '2022-05-05 12:00:08'),
(2, 'Adikusuma', '081219855701', 'Jl.werkudoro', '2022-05-05 11:59:45', '2022-05-05 11:59:45'),
(3, 'Ilham Adikusuma', '081219855701', 'Jl.werkudoro', '2022-05-07 00:50:42', '2022-05-07 00:50:42'),
(4, 'Ilham Adikusuma', '081219855701', 'Jl.werkudoro', '2022-05-12 05:00:44', '2022-05-12 05:00:44');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluarans`
--

CREATE TABLE `pengeluarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pengeluaran` date NOT NULL,
  `nama_pengeluaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_pengeluaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengeluarans`
--

INSERT INTO `pengeluarans` (`id`, `tanggal_pengeluaran`, `nama_pengeluaran`, `total_pengeluaran`, `created_at`, `updated_at`) VALUES
(1, '2022-12-31', 'keperluan dong', '213000', '2022-05-04 07:18:37', '2022-05-04 07:18:37'),
(2, '2022-12-31', 'keperluan dong', '1200', '2022-05-04 07:18:37', '2022-05-04 07:18:37'),
(3, '2022-12-31', 'keperluan dong', '13000', '2022-05-04 07:18:37', '2022-05-04 07:18:37'),
(4, '2022-12-31', 'keperluan dong', '41000', '2022-05-04 07:18:37', '2022-05-04 07:18:37'),
(5, '2022-12-31', 'keperluan dong', '13000', '2022-05-04 07:18:37', '2022-05-04 07:18:37'),
(6, '2022-12-31', 'keperluan dong', '13000', '2022-05-04 07:18:37', '2022-05-04 07:18:37');

-- --------------------------------------------------------

--
-- Table structure for table `penjualans`
--

CREATE TABLE `penjualans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pembeli_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjualans`
--

INSERT INTO `penjualans` (`id`, `pembeli_id`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-05-05', '2021-05-19 11:58:39', '2022-05-05 11:58:39'),
(2, 2, '2022-05-05', '2022-05-05 11:59:45', '2022-05-05 11:59:45'),
(3, 3, '2022-04-01', '2022-04-01 00:50:42', '2022-05-07 00:50:42'),
(4, 4, '2022-05-12', '2022-05-12 05:00:44', '2022-05-12 05:00:44');

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status_barangs`
--

CREATE TABLE `status_barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_status_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_barangs`
--

INSERT INTO `status_barangs` (`id`, `nama_status_barang`, `created_at`, `updated_at`) VALUES
(1, 'normal', '2022-05-04 07:18:37', '2022-05-04 07:18:37'),
(2, 'rekomendasi', '2022-05-04 07:18:37', '2022-05-04 07:18:37');

-- --------------------------------------------------------

--
-- Table structure for table `testimonis`
--

CREATE TABLE `testimonis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto_testimoni` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_testimoni` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ulasans`
--

CREATE TABLE `ulasans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_ulasan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_penjualans`
--
ALTER TABLE `detail_penjualans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenis_barangs`
--
ALTER TABLE `jenis_barangs`
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
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembelis`
--
ALTER TABLE `pembelis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengeluarans`
--
ALTER TABLE `pengeluarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualans`
--
ALTER TABLE `penjualans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `status_barangs`
--
ALTER TABLE `status_barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonis`
--
ALTER TABLE `testimonis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ulasans`
--
ALTER TABLE `ulasans`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_penjualans`
--
ALTER TABLE `detail_penjualans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_barangs`
--
ALTER TABLE `jenis_barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pembelis`
--
ALTER TABLE `pembelis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengeluarans`
--
ALTER TABLE `pengeluarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penjualans`
--
ALTER TABLE `penjualans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_barangs`
--
ALTER TABLE `status_barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonis`
--
ALTER TABLE `testimonis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ulasans`
--
ALTER TABLE `ulasans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
