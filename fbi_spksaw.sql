-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 25, 2021 at 10:24 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fbi_spksaw`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_alternatif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_alternatif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `kode_alternatif`, `nama_alternatif`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '001', 'Febri', 'test', '2021-05-25 02:01:45', '2021-05-25 02:01:45'),
(2, '002', 'Budi', 'test', '2021-05-25 02:05:06', '2021-05-25 02:05:06'),
(3, '003', 'dani', 'aawd', '2021-05-25 02:56:16', '2021-05-25 02:56:16'),
(4, '004', 'yolan', 'adwaw', '2021-05-25 03:05:50', '2021-05-25 03:05:50');

-- --------------------------------------------------------

--
-- Table structure for table `crip`
--

CREATE TABLE `crip` (
  `id` int(10) UNSIGNED NOT NULL,
  `kriteria_id` int(10) UNSIGNED DEFAULT NULL,
  `nama_crip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_crip` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crip`
--

INSERT INTO `crip` (`id`, `kriteria_id`, `nama_crip`, `nilai_crip`, `created_at`, `updated_at`) VALUES
(1, 1, 'gaji', 76, '2021-05-25 02:00:54', '2021-05-25 02:04:24'),
(2, 2, '50 Meter', 50, '2021-05-25 02:01:11', '2021-05-25 02:03:33'),
(3, 3, 'Anak 1', 50, '2021-05-25 02:01:23', '2021-05-25 02:03:46'),
(4, 3, 'anak 2', 60, '2021-05-25 02:03:56', '2021-05-25 02:03:56'),
(5, 3, 'anak 3', 30, '2021-05-25 02:04:11', '2021-05-25 02:04:11'),
(6, 1, 'Tunjangan anak', 60, '2021-05-25 02:04:38', '2021-05-25 02:04:38'),
(7, 2, '10 meter', 60, '2021-05-25 02:04:51', '2021-05-25 02:04:51');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id` int(11) NOT NULL,
  `kode` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `total` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id`, `kode`, `nama`, `total`, `created_at`, `updated_at`) VALUES
(1, '004', 'yolan', '76.97368421052632', '2021-05-25 03:22:56', '2021-05-25 10:22:56'),
(2, '003', 'dani', '71.97368421052632', '2021-05-25 03:22:56', '2021-05-25 10:22:56'),
(3, '002', 'Budi', '90', '2021-05-25 03:22:56', '2021-05-25 10:22:56'),
(4, '001', 'Febri', '72.80701754385964', '2021-05-25 03:22:56', '2021-05-25 10:22:56');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `atribut` enum('cost','benefit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `kode`, `nama`, `atribut`, `bobot`, `created_at`, `updated_at`) VALUES
(1, '1', 'Penghasilan Orang Tua', 'cost', 50, '2021-05-25 02:00:01', '2021-05-25 02:00:01'),
(2, '2', 'Jarak Rumah', 'benefit', 25, '2021-05-25 02:00:19', '2021-05-25 02:00:19'),
(3, '3', 'Tanggungan Orang Tua', 'benefit', 15, '2021-05-25 02:00:37', '2021-05-25 02:00:37');

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
(3, '2018_05_27_174332_create_kriteria_table', 1),
(4, '2018_05_27_174938_create_crip_table', 1),
(5, '2018_05_27_175955_create_alternatif_table', 1),
(6, '2018_05_27_180046_create_nilai_alternatif_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_alternatif`
--

CREATE TABLE `nilai_alternatif` (
  `id` int(10) UNSIGNED NOT NULL,
  `alternatif_id` int(10) UNSIGNED DEFAULT NULL,
  `crip_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai_alternatif`
--

INSERT INTO `nilai_alternatif` (`id`, `alternatif_id`, `crip_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 6),
(5, 2, 7),
(6, 2, 4),
(7, 3, 1),
(8, 3, 7),
(9, 3, 5),
(10, 4, 1),
(11, 4, 7),
(12, 4, 3);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$5QsDubHRegsbGlT2tbCKEu2kOqlPHJI.Nj.Cz966n.XtAfcdwoACS', NULL, '2021-05-25 01:58:51', '2021-05-25 01:58:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alternatif_kode_alternatif_unique` (`kode_alternatif`);

--
-- Indexes for table `crip`
--
ALTER TABLE `crip`
  ADD PRIMARY KEY (`id`),
  ADD KEY `crip_kriteria_id_index` (`kriteria_id`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kriteria_kode_unique` (`kode`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_alternatif_alternatif_id_index` (`alternatif_id`),
  ADD KEY `nilai_alternatif_crip_id_index` (`crip_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `crip`
--
ALTER TABLE `crip`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `crip`
--
ALTER TABLE `crip`
  ADD CONSTRAINT `crip_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD CONSTRAINT `nilai_alternatif_alternatif_id_foreign` FOREIGN KEY (`alternatif_id`) REFERENCES `alternatif` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_alternatif_crip_id_foreign` FOREIGN KEY (`crip_id`) REFERENCES `crip` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
