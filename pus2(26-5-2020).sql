-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2020 at 01:49 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pus2`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_puskesmas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_program` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_indikator` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_targetumur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cakupan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pencapaian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_sasaran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` int(11) NOT NULL,
  `adequasi_effort` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adequasi_peformance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `progress` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sensitivitas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spesifitas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hasil` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `nama_puskesmas`, `nama_program`, `nama_indikator`, `nama_targetumur`, `cakupan`, `pencapaian`, `total_sasaran`, `target`, `tahun`, `adequasi_effort`, `adequasi_peformance`, `progress`, `sensitivitas`, `spesifitas`, `hasil`, `created_at`, `updated_at`) VALUES
(58, '5', '5', '3', '2', '90', '-', '-', '80', 2013, '112.5', '12.5', '-', '-12.50', 'archived', 'Tercapai', '2019-12-09 09:51:41', '2019-12-09 09:51:41'),
(59, '5', '5', '4', '3', '61', '-', '-', '90', 2015, '67.78', '-32.22', '-', '32.22', 'off track', 'Tidak Tercapai', '2019-12-10 01:58:52', '2019-12-10 02:16:19'),
(60, '5', '7', '15', '21', '50', '50', '70', '70', 2012, '71.43', '-28.57', '-', '28.57', 'off track', 'Tidak Tercapai', '2019-12-10 02:01:49', '2019-12-10 02:01:49'),
(61, '5', '6', '9', '4', '70', '70', '70', '70', 2012, '100', '0', '-', '0.00', 'on track', 'Tidak Tercapai', '2019-12-20 20:03:29', '2019-12-20 20:03:29'),
(62, '5', '6', '9', '4', '70', '70', '70', '70', 2012, '100', '0', '-', '0.00', 'on track', 'Tidak Tercapai', '2019-12-20 20:03:45', '2019-12-20 20:03:45');

-- --------------------------------------------------------

--
-- Table structure for table `indikator`
--

CREATE TABLE `indikator` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_program` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_indikator` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `indikator`
--

INSERT INTO `indikator` (`id`, `nama_program`, `nama_indikator`, `created_at`, `updated_at`) VALUES
(3, '5', 'D/S', '2019-06-26 03:37:08', '2019-07-01 01:58:56'),
(4, '5', 'K/S', '2019-07-01 01:58:17', '2019-07-01 01:58:17'),
(5, '5', 'N/D', '2019-07-04 23:38:43', '2019-07-04 23:38:43'),
(6, '5', 'BGM/D', '2019-07-04 23:38:56', '2019-07-04 23:38:56'),
(7, '5', 'N/S', '2019-07-04 23:39:06', '2019-07-04 23:39:06'),
(8, '5', 'D/K', '2019-07-04 23:39:21', '2019-07-04 23:39:21'),
(9, '6', 'Menimbang Berat Badan Secara Teratur', '2019-07-04 23:39:57', '2019-07-04 23:39:57'),
(10, '6', 'Menggunakan Garam Beryodium', '2019-07-04 23:40:22', '2019-07-04 23:40:22'),
(11, '6', 'Pemberian Asi Eksklusif', '2019-07-04 23:41:20', '2019-07-04 23:41:20'),
(12, '6', 'Makan Makanan Beranekaragam', '2019-07-04 23:41:44', '2019-07-04 23:41:44'),
(13, '6', 'Pemberian Vitamin A', '2019-07-04 23:41:59', '2019-07-04 23:41:59'),
(14, '7', 'Pemberian Makanan Tambahan Gizi Kurang', '2019-07-04 23:48:00', '2019-07-04 23:48:00'),
(15, '7', 'Pemberian Makanan Tambahan Ibu Hamil Kek', '2019-07-04 23:48:39', '2019-07-04 23:48:39'),
(16, '8', 'Pemberian Tablet Tambah Darah', '2019-07-04 23:50:25', '2019-07-04 23:50:25'),
(17, '6', 'Tablet Tambah Darah', '2019-07-04 23:59:18', '2019-07-04 23:59:18'),
(18, '9', 'Pemberian Tablet Tambah Darah', '2019-07-05 00:33:54', '2019-07-05 00:33:54');

-- --------------------------------------------------------

--
-- Table structure for table `kadarzis`
--

CREATE TABLE `kadarzis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `indikator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `targetumur` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_pencapaian` int(11) DEFAULT NULL,
  `pencapaian` int(11) DEFAULT NULL,
  `total_sasaran` int(11) DEFAULT NULL,
  `targer_sasaran` int(11) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `nilai` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adequasi_effort` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adequasi_peformance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `progress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sensitivitas` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spesifitas` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hasil` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_06_13_091850_create_kadarzi_table', 1),
(4, '2019_06_13_093124_create_skdn_table', 1),
(5, '2019_06_13_093140_create_pmt_table', 1),
(6, '2019_06_13_093608_create_ttd_table', 1),
(7, '2019_06_26_005025_create_program_table', 1),
(8, '2019_06_26_011048_create_indikator_table', 1),
(9, '2019_06_26_011343_create_targetumur_table', 1),
(10, '2019_07_01_141907_create_data_table', 2),
(11, '2019_07_02_123805_create_puskesmas_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `id` int(11) NOT NULL,
  `id_puskesmas` varchar(191) DEFAULT NULL,
  `id_program` varchar(191) DEFAULT NULL,
  `id_indikator` varchar(191) DEFAULT NULL,
  `dibaca` varchar(191) DEFAULT NULL,
  `tahun` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`id`, `id_puskesmas`, `id_program`, `id_indikator`, `dibaca`, `tahun`, `created_at`, `updated_at`) VALUES
(17, '5', '7', '15', '0', '2012', '2019-12-10 02:01:48', '2019-12-10 02:01:48'),
(18, '5', '5', '4', '0', '2015', '2019-12-10 02:16:19', '2019-12-10 02:16:19'),
(19, '5', '6', '9', '0', '2012', '2019-12-20 20:03:29', '2019-12-20 20:03:29'),
(20, '5', '6', '9', '0', '2012', '2019-12-20 20:03:45', '2019-12-20 20:03:45');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pmt`
--

CREATE TABLE `pmt` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `indikator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_pencapaian` int(11) DEFAULT NULL,
  `pencapaian` int(11) DEFAULT NULL,
  `total_sasaran` int(11) DEFAULT NULL,
  `targer_sasaran` int(11) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `nilai` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adequasi_effort` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adequasi_peformance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `progress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sensitivitas` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spesifitas` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hasil` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_program` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `nama_program`, `created_at`, `updated_at`) VALUES
(5, 'SKDN', NULL, NULL),
(6, 'KADARZI', '2019-07-04 23:08:16', '2019-07-04 23:08:16'),
(7, 'PEMBERIAN MAKAN TAMBAHAN', '2019-07-04 23:35:52', '2019-07-04 23:35:52'),
(9, 'TABLET TAMBAH DARAH', '2019-07-05 00:33:19', '2019-07-05 00:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `puskesmas`
--

CREATE TABLE `puskesmas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_puskesmas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `puskesmas`
--

INSERT INTO `puskesmas` (`id`, `nama_puskesmas`, `created_at`, `updated_at`) VALUES
(5, 'Puskesmas Dinoyo', '2019-11-21 05:02:56', '2019-11-21 05:02:56'),
(6, 'Puskesmas Merjosari', '2019-11-21 05:04:47', '2019-11-21 05:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `skdn`
--

CREATE TABLE `skdn` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_puskesmas` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun` int(191) DEFAULT NULL,
  `Data_S` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Data_K` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Data_D` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Data_N` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skdn`
--

INSERT INTO `skdn` (`id`, `nama_puskesmas`, `tahun`, `Data_S`, `Data_K`, `Data_D`, `Data_N`, `created_at`, `updated_at`) VALUES
(1, '5', 2017, '6925', '3058', '5719', '1656', '2019-12-11 04:11:48', '2019-12-11 04:11:48'),
(4, '5', 2016, '400', '540', '650', '2012', '2019-12-20 19:57:12', '2019-12-20 19:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `targetumur`
--

CREATE TABLE `targetumur` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_program` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_indikator` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_targetumur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `targetumur`
--

INSERT INTO `targetumur` (`id`, `nama_program`, `nama_indikator`, `nama_targetumur`, `created_at`, `updated_at`) VALUES
(2, '5', '3', 'Balita', '2019-07-01 08:53:38', '2019-08-25 20:45:54'),
(3, '5', '4', 'Balita', '2019-07-01 10:11:36', '2019-08-25 20:46:01'),
(4, '6', '9', 'Bayi', '2019-07-04 23:54:14', '2019-08-25 20:46:39'),
(5, '6', '9', 'Balita', '2019-07-04 23:54:53', '2019-08-25 20:46:46'),
(6, '6', '9', 'Baduta', '2019-07-04 23:55:31', '2019-08-25 20:46:53'),
(7, '6', '11', 'Bayi', '2019-07-04 23:56:32', '2019-08-25 20:47:00'),
(8, '6', '12', 'Keluarga', '2019-07-04 23:56:50', '2019-07-04 23:56:50'),
(9, '6', '10', 'Keluarga', '2019-07-04 23:57:49', '2019-07-04 23:57:49'),
(10, '6', '13', 'Balita', '2019-07-05 00:01:19', '2019-08-25 20:47:06'),
(11, '6', '13', 'Bayi', '2019-07-05 00:01:43', '2019-08-25 01:56:38'),
(12, '6', '13', 'Ibu Nifas', '2019-07-05 00:02:05', '2019-07-05 00:02:05'),
(13, '6', '17', 'Ibu Hamil', '2019-07-05 00:02:31', '2019-07-05 00:02:31'),
(14, '6', '17', 'Remaja Putri', '2019-07-05 00:02:47', '2019-07-05 00:02:47'),
(15, '5', '5', 'Balita', '2019-07-05 00:05:21', '2019-08-25 20:46:08'),
(16, '5', '6', 'Balita', '2019-07-05 00:05:29', '2019-08-25 20:46:15'),
(17, '5', '7', 'Balita', '2019-07-05 00:05:40', '2019-08-25 20:46:22'),
(18, '5', '8', 'Balita', '2019-07-05 00:05:51', '2019-08-25 20:46:29'),
(19, '7', '14', 'Balita', '2019-07-05 00:06:23', '2019-08-25 20:47:13'),
(20, '7', '14', 'Baduta', '2019-07-05 00:06:41', '2019-08-25 20:47:20'),
(21, '7', '15', 'Ibu Hamil', '2019-07-05 00:07:04', '2019-07-05 00:07:04'),
(22, '8', '16', 'Ibu Hamil', '2019-07-05 00:07:17', '2019-07-05 00:07:17'),
(23, '8', '16', 'Remaja Putri', '2019-07-05 00:07:34', '2019-07-05 00:07:34'),
(24, '9', '18', 'Ibu Hamil', '2019-07-05 00:34:19', '2019-07-05 00:34:19'),
(25, '9', '18', 'Remaja Putri', '2019-07-05 00:34:35', '2019-07-05 00:34:35');

-- --------------------------------------------------------

--
-- Table structure for table `ttd`
--

CREATE TABLE `ttd` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `indikator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_pencapaian` int(11) DEFAULT NULL,
  `pencapaian` int(11) DEFAULT NULL,
  `total_sasaran` int(11) DEFAULT NULL,
  `targer_sasaran` int(11) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `nilai` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adequasi_effort` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adequasi_peformance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `progress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sensitivitas` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spesifitas` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hasil` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `puskesmas` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vertified` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `nama`, `puskesmas`, `password`, `pos`, `vertified`, `token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test@gmail.com', 'admin', NULL, '$2y$10$esrE8z5Bhfp/dEEMVVdS4eGhyOVrzSaYlMTbDL1ii4TtuC9gWiXe.', 'super', 'ya', '7ed47929a94395e2ff4112a327235c5e', NULL, '2019-06-13 02:57:54', '2019-06-13 02:57:54'),
(11, 'rereasdev@gmail.com', 'rere', '5', '$2y$10$kCvkO2Gc667BQEZ2ErXRSOELMHPEZdRJrcr7NyF1wG8S.mnmFDxSC', 'admin', 'ya', '7c45a45adbaa46570684c709d87f97bc', 'uxsCXMQCkh84qUBZ4i2MJSk0vLORypjVoTQ2VuwGYeiMl37UTjSCrArWxNdH', '2019-11-21 05:03:23', '2019-11-21 05:03:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indikator`
--
ALTER TABLE `indikator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kadarzis`
--
ALTER TABLE `kadarzis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pmt`
--
ALTER TABLE `pmt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `puskesmas`
--
ALTER TABLE `puskesmas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skdn`
--
ALTER TABLE `skdn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `targetumur`
--
ALTER TABLE `targetumur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ttd`
--
ALTER TABLE `ttd`
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
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `indikator`
--
ALTER TABLE `indikator`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kadarzis`
--
ALTER TABLE `kadarzis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pmt`
--
ALTER TABLE `pmt`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `puskesmas`
--
ALTER TABLE `puskesmas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `skdn`
--
ALTER TABLE `skdn`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `targetumur`
--
ALTER TABLE `targetumur`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `ttd`
--
ALTER TABLE `ttd`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
