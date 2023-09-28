-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2023 at 05:04 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tubesweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanans`
--

CREATE TABLE `detail_pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pesanans`
--

INSERT INTO `detail_pesanans` (`id`, `id_produk`, `id_pesanan`, `jumlah_produk`, `jumlah`, `created_at`, `updated_at`) VALUES
(57, 29, 26, 5, 1719000, '2023-05-28 05:58:57', '2023-05-28 05:58:57'),
(58, 49, 26, 2, 106600, '2023-05-28 05:59:27', '2023-05-28 05:59:27'),
(60, 25, 27, 4, 676000, '2023-06-01 00:47:12', '2023-06-01 00:47:12'),
(61, 11, 28, 1, 219000, '2023-06-01 05:25:24', '2023-06-01 05:25:24'),
(63, 8, 29, 1, 275000, '2023-06-01 05:57:25', '2023-06-01 05:57:25'),
(64, 28, 30, 3, 1185000, '2023-06-01 06:01:11', '2023-06-01 06:02:44');

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `kategori`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Skin Care', 'skincare', NULL, NULL),
(2, 'Hair Care', 'haircare', NULL, NULL),
(3, 'Body Care', 'bodycare', NULL, NULL);

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
(3, '2023_05_16_124850_create_produks_table', 1),
(4, '2023_05_16_125443_create_kategoris_table', 1),
(6, '2023_05_16_125844_create_detail_pesanans_table', 1),
(7, '2023_05_16_135658_create_produks_table', 2),
(8, '2023_05_21_062845_create_produks_table', 3),
(10, '2023_05_16_125637_create_pesanans_table', 4),
(11, '2023_05_26_132715_create_kategoris_table', 5);

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
-- Table structure for table `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanans`
--

INSERT INTO `pesanans` (`id`, `id_user`, `tanggal`, `status`, `kode`, `total_harga`, `created_at`, `updated_at`) VALUES
(26, 4, '2023-05-28', '1', 333, 1825600, '2023-05-28 05:58:57', '2023-05-28 05:59:44'),
(27, 4, '2023-05-28', '1', 741, 676000, '2023-05-28 08:39:38', '2023-06-01 00:48:07'),
(28, 6, '2023-06-01', '1', 980, 219000, '2023-06-01 05:25:24', '2023-06-01 05:26:31'),
(29, 7, '2023-06-01', '1', 700, 275000, '2023-06-01 05:57:14', '2023-06-01 05:58:34'),
(30, 2, '2023-06-01', '0', 980, 1185000, '2023-06-01 06:01:11', '2023-06-01 06:02:44');

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `id_kategori`, `nama_produk`, `gambar`, `merk`, `harga`, `stok`, `kategori`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Moisturizing Lotion', 'cetml.png', 'Cetaphil', 224000, 5, 'Skin Care', '200 ml', NULL, '2023-05-22 07:42:01'),
(2, 1, 'Gentle Skin Cleanser', 'cetgsc.png', 'Cetaphil', 297000, 15, 'Skin Care', '500 ml', NULL, NULL),
(3, 1, 'Miraculous Refining Toner', 'avomrt.png', 'Avoskin', 201000, 7, 'Skin Care', '100 ml', NULL, '2023-05-26 07:41:58'),
(4, 1, 'Miraculous Refining Serum', 'avomrs.png', 'Avoskin', 257000, 50, 'Skin Care', '30 ml', NULL, '2023-05-25 08:49:34'),
(5, 1, '5X Ceramide Barrier Moisture Gel', 'skinbm.png', 'Skintific', 140000, 8, 'Skin Care', '30 gr', NULL, '2023-05-22 08:15:45'),
(6, 1, 'Barrier Booster Facial Oil', 'skinbbfo.png', 'Skintific', 130000, 8, 'Skin Care', '10 ml', NULL, '2023-05-25 06:53:31'),
(7, 1, 'Hydrashoothe Sunscreen Gel', 'azahsg.png', 'Azarine', 65000, 10, 'Skin Care', '50 ml', NULL, '2023-05-21 09:06:15'),
(8, 1, 'Advanced Snail Mucin Essence', 'cosasmpe.png', 'COSRX', 275000, 99, 'Skin Care', '100 ml', NULL, '2023-06-01 05:58:34'),
(9, 1, 'AHA/BHA Clarifying Treatment Toner', 'cosabctt.png', 'COSRX', 200000, 15, 'Skin Care', '150 ml', NULL, NULL),
(10, 1, 'Acne Spot Cream', 'pyuasc.png', 'Pyunkang Yul', 200000, 10, 'Skin Care', '15 ml', NULL, NULL),
(11, 2, 'Mirnosa Masque Hair Treatment', 'thebbmmnht.png', 'The Bath Box', 219000, 12, 'Hair Care', '200 gr', NULL, '2023-06-01 05:26:31'),
(12, 2, 'Camellia Essence Hair Oil Serum', 'inncehos.png', 'Innisfree', 152000, 15, 'Hair Care', '100 ml', NULL, NULL),
(13, 2, 'Vegan Hair Mist', 'drsvhm.png', 'DR Soap', 139000, 20, 'Hair Mist', '100 ml', NULL, '2023-05-25 08:49:35'),
(14, 2, 'Extra Volume & Escalp Shampoo', 'moiexss.png', 'Moist Diane', 136000, 10, 'Hair Care', '450 ml', NULL, '2023-05-22 08:18:41'),
(15, 2, 'Extra Damage Repair Hair Mask', 'moiedrhm.png', 'Moist Diane', 119000, 20, 'Hair Care', '150 gr', NULL, NULL),
(16, 2, 'Hair Oil with Peppermint ', 'tumhowp.png', 'Tumbuh Lab', 135000, 20, 'Hair Care', '60 ml', NULL, '2023-05-25 06:10:00'),
(17, 2, 'Keratin Hair Mask', 'joytipkhm.png', 'JOYLAB', 95000, 14, 'Hair Care', '85 ml', NULL, '2023-05-22 07:14:04'),
(18, 2, 'Vitalizing Scalp Nutrition Pack', 'dgmrvsnp.png', 'Daeng Yi Meo Ri', 355000, 32, 'Hair Care', '145 ml', NULL, NULL),
(19, 2, 'Argan Repair Conditioner', 'danarc.png', 'Dancoly', 219000, 9, 'Hair Care', '300 ml', NULL, '2023-05-22 08:17:51'),
(20, 2, 'Voluminous & Grow Scalp Treatment ', 'haivgst.png', 'Hairmony', 139000, 10, 'Hair Care', '100 ml', NULL, '2023-05-22 07:34:19'),
(21, 3, 'Goats Dont Lie - Tea Tree', 'tbbgdltt.png', 'The Bath Box', 225000, 27, 'Body Care', '500 ml', NULL, '2023-05-25 06:16:19'),
(22, 3, 'Sport Ultra Protect Sunscreen', 'bansusl.png', 'Banana Boat', 151000, 21, 'Body Care', '90 ml', NULL, NULL),
(23, 3, 'Wunderbalm', 'senwun.png', 'Sensatia Botanicals', 360000, 25, 'Body Care', '120 ml', NULL, NULL),
(24, 3, 'Coffee Scrub Travel Size BAG', 'clccst.png', 'C LAB & CO', 149000, 12, 'Body Care', '100 gr', NULL, NULL),
(25, 3, 'Pure Bath & Shower Gel Tea Tree', 'petpbsgtt.png', 'Petal Fresh', 169000, 4, 'Body Care', '475 ml', NULL, '2023-06-01 00:48:07'),
(26, 3, 'Everslim Body Shaping Cream', 'eveebs.png', 'Everwhite', 217900, 21, 'Body Care', '200 gr', NULL, NULL),
(27, 3, 'Soothing and Calming Moisturizing', 'avescml.png', 'Aveeno', 219000, 16, 'Body Care', '354 ml', NULL, '2023-05-22 08:06:32'),
(28, 3, 'Tell Me Your Wish Hand Essence', 'aritmywhe.png', 'Ariul', 395000, 19, 'Body Care', '30 gr', NULL, NULL),
(29, 3, 'Overnight Body Serum ', 'bhuobs.png', 'Bhumi', 343800, 45, 'Body Care', '200 gr', NULL, '2023-05-28 05:59:44'),
(30, 3, 'Cocoa Butter & Vanilla Bean', 'stipcb.png', 'ST. IVES', 60000, 90, 'Body Care', '30 ml', NULL, '2023-05-25 08:53:49'),
(31, 3, 'Wonder Serum ', 'sugws.png', 'Sugarcoat', 90000, 25, 'Body Care', '30 ml', NULL, '2023-05-22 08:12:56'),
(32, 3, 'Gentle Shower Scrub', 'bongssmds.png', 'Bonavie', 83900, 28, 'Body Care', '250 gr', NULL, NULL),
(33, 1, 'UV Whitening Milk', 'skiuwm.png', 'SKIN AQUA', 61100, 34, 'Skin Care', '40 gr', NULL, NULL),
(34, 1, 'Ultra Light Serum Sunscreen', 'skiulss.png', 'SKINTIFIC', 103040, 10, 'Skin Care', '25 ml', NULL, NULL),
(35, 3, 'Body Yogurt', 'tbsby.png', 'THE BODY SHOP', 279000, 12, 'Body Care', '200 ml', NULL, NULL),
(36, 3, 'Dancing in the Mist Body Care Set', 'lvydmbcsbs.png', 'LAVOJOY', 120840, 5, 'Body Care', '400 ml', NULL, NULL),
(37, 3, 'Intensive Care Body Lotion', 'vslicb.png', 'VASELINE', 71820, 29, 'Body Care', '400 ml', NULL, '2023-05-25 08:49:35'),
(38, 3, 'Care & Protect Body Wash', 'docpb.png', 'DOVE', 120000, 15, 'Body Care', '1000 ml', NULL, NULL),
(39, 3, 'Brightening Multivitamin Body Gel', 'dmbbmbg.png', 'DEAR ME BEAUTY', 89000, 18, 'Body Care', '100 ml', NULL, NULL),
(40, 2, 'Vitalizing Treatment', 'dgmrvt.png', 'DAENG GI MEO RI', 178500, 15, 'Hair Care', '500 ml', NULL, NULL),
(41, 2, 'Total Damage Care Shampoo', 'ptntdcs.png', 'PANTENE', 134733, 11, 'Hair Care', '1.2 L', NULL, NULL),
(42, 2, 'Pro V Perfect On Conditioner', 'ptnpvp.png', 'PANTENE', 16500, 9, 'Hair Care', '40 ml', NULL, NULL),
(43, 2, 'Orange Flower Hair Spray', 'dncofhs.png', 'DANCOLY', 209000, 99, 'Hair care', '350 ml', NULL, NULL),
(44, 2, 'Real Shea Nourishing Shampoo', 'rgrsn.png', 'RATED GREEN', 215200, 45, 'Hair Care', '400 ml', NULL, NULL),
(45, 2, 'Baby Wash and Shampoo', 'avnbws.png', 'AVEENO', 148000, 12, 'Hair Care', '354 ml', NULL, NULL),
(46, 1, 'Supple Preparation All Over Lotion', 'dksspao.png', '\r\nDEAR KLAIRS', 375000, 23, 'Skincare', '250 ml', NULL, NULL),
(47, 1, 'Acnederm Acne Spot Treatment Gel', 'wrdaas.png', 'WARDAH', 28500, 30, 'Skin Care', '15 ml', NULL, '2023-05-27 04:34:54'),
(48, 1, 'Sebium H2O Micellar Water', 'bidsh20.png', 'BIODERMA', 141900, 11, 'Skin Care', '250 ml', NULL, NULL),
(49, 1, 'Acne Cleansing Wash', 'elsacw.png', 'ELSHESKIN', 53300, 11, 'Skin Care', '100 ml', NULL, '2023-05-28 05:59:45'),
(50, 1, 'Cleansing Oil', 'bioco.png', 'BIORE', 100298, 56, 'Skin Care', '150 ml', NULL, NULL),
(51, 1, 'AHA-BHA-PHA Miracle Toner', 'sbmabp.png', 'SOME BY MI', 191250, 20, 'Skin Care', '150 ml', NULL, NULL),
(52, 1, 'Acne Patch Mix 18', 'derapm.png', 'DERMA ANGEL', 46000, 20, 'Skin Care', '-', NULL, NULL),
(53, 1, 'Hydro Boost Hyaluronic Acid Water Gel', 'neuhbhawg.png', 'NEUTROGENA', 271500, 20, 'Skin Care', '50 gr', NULL, NULL),
(54, 3, 'Snow White Spot Gel', 'secswsg.png', 'SECRET KEY', 265000, 40, 'Body Care', '65 gr', NULL, NULL),
(56, 3, 'Aloe Vera Gel', 'banavg.png', 'BANANA BOAT', 133000, 50, 'Body Care', '90 ml', NULL, NULL),
(58, 3, 'Goat\'s Milk Shower Cream Green Tea', 'mutgmscgt.png', 'MUTOUCH', 93610, 43, 'Body Care', '1000 ml', NULL, NULL);

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
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `alamat`, `nohp`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Fadzli', 'faz69@gmail.com', NULL, '$2y$10$uBFwe75Y.AA1ZXA0HCPgU.THdOC5xWLoHFds5t/Dx3CAD4XPG9RAK', NULL, NULL, NULL, '2023-05-25 06:08:49', '2023-05-25 06:09:46'),
(4, 'Redo Hariyadi', 'redhohariyadi@gmail.com', NULL, '$2y$10$92Q0D4KnMUn6N7/wLUjnaegLnmGmwAns8FP2FDsOO.WSiRJRtj5.W', 'Bengkulu Utara', '082278330270', NULL, '2023-05-25 09:26:45', '2023-05-25 09:27:16'),
(5, 'Seprina Dwi Cahyani', 'seprina24cahyani@gmail.com', NULL, '$2y$10$U60V4gLlGUQzbuqWzJWQ9.x8rX/M/X9P6DNrX6ueik2Wufu0BvVRC', 'IRIAN', '081364168340347', '0fbQpYxVOYqkZKth4tDcdKcTaAtuT6GXBDOCidXP6lIuSeP4BWXmtS9mvnBZ', '2023-05-25 09:54:45', '2023-05-26 06:53:30'),
(7, 'cutdinda', 'cutdinda@gmail.com', NULL, '$2y$10$jMu8GKC0QFLMWvkc6QjPguKcx3SApxZHViM5GzDxegtDGFgEhFNG.', 'swis', '085366266050', NULL, '2023-06-01 05:52:14', '2023-06-01 05:58:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pesanans`
--
ALTER TABLE `detail_pesanans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
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
-- Indexes for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
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
-- AUTO_INCREMENT for table `detail_pesanans`
--
ALTER TABLE `detail_pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
