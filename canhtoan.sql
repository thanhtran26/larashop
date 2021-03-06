-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 15, 2021 at 06:43 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `canhtoan`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietts`
--

DROP TABLE IF EXISTS `chitietts`;
CREATE TABLE IF NOT EXISTS `chitietts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ts1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ts2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ts3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ts4` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ts5` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ts6` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sanpham` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `chitietts_sanpham_id_foreign` (`id_sanpham`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chitietts`
--

INSERT INTO `chitietts` (`id`, `ts1`, `ts2`, `ts3`, `ts4`, `ts5`, `ts6`, `id_sanpham`, `created_at`, `updated_at`) VALUES
(1, 'A320', 'AM4', 'Micro-ATX', '2', 'DDR4', '32GB', 1, '2021-04-14 03:45:01', '2021-04-14 03:45:01'),
(2, 'A321', 'AM5', 'Micro-ATX', '2', 'DDR4', '32GB', 2, '2021-04-14 03:45:01', '2021-04-14 03:45:01'),
(3, 'H410', '1200', 'Micro-ATX', '2', 'DDR4', '64GB', 3, '2021-04-14 03:45:01', '2021-04-14 03:45:01'),
(4, 'H310', '1151-v2', 'Micro-ATX', '2', 'DDR4', '32GB', 4, '2021-04-14 03:45:01', '2021-04-14 03:45:01'),
(5, 'H310', '1200', 'Micro-ATX', '2', 'DDR4', '64GB', 5, '2021-04-14 03:45:01', '2021-04-14 03:45:01'),
(6, 'A320M', 'AM4', 'Micro-ATX', '2', 'DDR4', '64GB', 6, '2021-04-14 03:45:01', '2021-04-14 03:45:01'),
(7, 'H410', '1200', 'Micro-ATX', '2', 'DDR4', '64GB', 7, '2021-04-14 03:45:01', '2021-04-14 03:45:01'),
(8, 'H410', '1151-v2', 'Micro-ATX', '2', 'DDR4', '64GB', 8, '2021-04-14 03:45:01', '2021-04-14 03:45:01'),
(9, 'H410', '1200', 'Micro-ATX', '2', 'DDR4', '64GB', 9, '2021-04-14 03:45:01', '2021-04-14 03:45:01'),
(10, 'H410', '1200', 'Micro-ATX', '2', 'DDR4', '64GB', 10, '2021-04-14 03:45:01', '2021-04-14 03:45:01'),
(11, 'H410', '1200', 'Micro-ATX', '2', 'DDR4', '64GB', 11, '2021-04-14 03:45:01', '2021-04-14 03:45:01'),
(12, 'H310', '1200', 'Micro-ATX', '2', 'DDR4', '64GB', 12, '2021-04-14 03:45:01', '2021-04-14 03:45:01'),
(13, 'H310', '1151-v2', 'Micro-ATX', '2', 'DDR4', '32GB', 13, '2021-04-14 03:45:01', '2021-04-14 03:45:01'),
(14, 'H410', '1200', 'Micro-ATX', '2', 'DDR4', '64GB', 14, '2021-04-14 03:45:01', '2021-04-14 03:45:01'),
(15, 'B450', 'AM4', 'Micro-ATX', '2', 'DDR4', '32GB', 15, '2021-04-14 03:45:01', '2021-04-14 03:45:01'),
(16, 'H410', '1200', 'Micro-ATX', '2', 'DDR4', '64GB', 16, '2021-04-14 03:45:01', '2021-04-14 03:45:01'),
(17, 'B360', '1151-v2', 'Micro-ATX', '2', 'DDR4', '32GB', 17, '2021-04-14 03:45:01', '2021-04-14 03:45:01'),
(18, 'Z390', '1151-v2', 'Micro-ATX', '4', 'DDR4', '64GB', 18, '2021-04-14 03:45:01', '2021-04-14 03:45:01'),
(19, 'Z490', '1200', 'Micro-ATX', '4', 'DDR4', '128GB', 19, '2021-04-14 03:45:01', '2021-04-14 03:45:01'),
(20, 'Z390', '1151-v2', 'Micro-ATX', '4', 'DDR4', '64GB', 20, '2021-04-14 03:45:01', '2021-04-14 03:45:01');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

DROP TABLE IF EXISTS `donhang`;
CREATE TABLE IF NOT EXISTS `donhang` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nguoidung_id` bigint(20) UNSIGNED NOT NULL,
  `dienthoaikhachhang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailgiaohang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinhtrang` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `donhang_nguoidung_id_foreign` (`nguoidung_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id`, `nguoidung_id`, `dienthoaikhachhang`, `emailgiaohang`, `address`, `tinhtrang`, `created_at`, `updated_at`) VALUES
(2, 2, 'user', 'saler@example.com', 'cvbnmn,mnhgbfdcvnmbn,m.,mnhgfd', 0, '2021-04-10 01:55:44', '2021-04-10 01:55:44');

-- --------------------------------------------------------

--
-- Table structure for table `donhang_chitiet`
--

DROP TABLE IF EXISTS `donhang_chitiet`;
CREATE TABLE IF NOT EXISTS `donhang_chitiet` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `donhang_id` bigint(20) UNSIGNED NOT NULL,
  `sanpham_id` bigint(20) UNSIGNED NOT NULL,
  `soluongban` int(11) NOT NULL,
  `dongiaban` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `donhang_chitiet_donhang_id_foreign` (`donhang_id`),
  KEY `donhang_chitiet_sanpham_id_foreign` (`sanpham_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donhang_chitiet`
--

INSERT INTO `donhang_chitiet` (`id`, `donhang_id`, `sanpham_id`, `soluongban`, `dongiaban`, `created_at`, `updated_at`) VALUES
(3, 4, 8, 1, 4311000, '2021-04-09 16:06:50', '2021-04-09 16:06:50'),
(4, 5, 4, 1, 1282500, '2021-04-09 16:07:46', '2021-04-09 16:07:46'),
(5, 2, 2, 1, 1232500, '2021-04-10 01:55:44', '2021-04-10 01:55:44');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hang`
--

DROP TABLE IF EXISTS `hang`;
CREATE TABLE IF NOT EXISTS `hang` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tenhang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenhang_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hang`
--

INSERT INTO `hang` (`id`, `tenhang`, `tenhang_slug`, `hinhanh`, `created_at`, `updated_at`) VALUES
(1, 'Asus', 'Asus', 'Logohang/1.png', '2021-04-10 00:56:13', '2021-04-10 00:56:13'),
(2, 'Gigabyte', 'Gigabyte', 'Logohang/2.png', '2021-04-10 00:56:13', '2021-04-10 00:56:13'),
(3, 'Asrock', 'Asrock', 'Logohang/3.png', '2021-04-10 00:56:13', '2021-04-10 00:56:13'),
(4, 'MSI', 'MSI', 'Logohang/4.png', '2021-04-10 00:56:13', '2021-04-10 00:56:13'),
(5, 'AMD', 'AMD', 'Logohang/5.png', '2021-04-10 00:56:13', '2021-04-10 00:56:13'),
(6, 'Intel', 'Intel', 'Logohang/6.png', '2021-04-10 00:56:13', '2021-04-10 00:56:13'),
(7, 'Kingston', 'Kingston', 'Logohang/7.png', '2021-04-10 00:56:13', '2021-04-10 00:56:13'),
(8, 'Gskill', 'Gskill', 'Logohang/8.png', '2021-04-10 00:56:13', '2021-04-10 00:56:13'),
(9, 'Corsair', 'Corsair', 'Logohang/9.png', '2021-04-10 00:56:13', '2021-04-10 00:56:13'),
(10, 'PNY', 'PNY', 'Logohang/10.png', '2021-04-10 00:56:13', '2021-04-10 00:56:13'),
(11, 'APACER', 'APACER', 'Logohang/11.png', '2021-04-10 00:56:13', '2021-04-10 00:56:13'),
(12, 'Samsung', 'Samsung', 'Logohang/12.png', '2021-04-10 00:56:13', '2021-04-10 00:56:13'),
(13, 'Toshiba', 'Toshiba', 'Logohang/13.png', '2021-04-10 00:56:13', '2021-04-10 00:56:13'),
(14, 'Seagate', 'Seagate', 'Logohang/14.png', '2021-04-10 00:56:13', '2021-04-10 00:56:13'),
(15, 'Western Digital', 'Western Digital', 'Logohang/15.png', '2021-04-10 00:56:13', '2021-04-10 00:56:13'),
(16, 'Seagate', 'Seagate', 'Logohang/16.png', '2021-04-10 00:56:13', '2021-04-10 00:56:13'),
(17, 'Xigmatgek', 'Xigmatgek', 'Logohang/17.png', '2021-04-10 00:56:13', '2021-04-10 00:56:13'),
(18, 'DeepCool ', 'DeepCool ', 'Logohang/18.png', '2021-04-10 00:56:13', '2021-04-10 00:56:13'),
(19, 'Cooler Master', 'Cooler Master', 'Logohang/19.png', '2021-04-10 00:56:13', '2021-04-10 00:56:13'),
(20, 'Cougar', 'Cougar', 'Logohang/20.png', '2021-04-10 00:56:13', '2021-04-10 00:56:13'),
(21, 'SliverStone ', 'SliverStone ', 'Logohang/21.png', '2021-04-10 00:56:13', '2021-04-10 00:56:13'),
(22, 'NOCTUA', 'NOCTUA', 'Logohang/22.png', '2021-04-10 00:56:13', '2021-04-10 00:56:13'),
(23, 'Razer', 'Razer', 'Logohang/23.png', '2021-04-10 00:56:13', '2021-04-10 00:56:13'),
(24, 'Logitech', 'Logitech', 'Logohang/24.png', '2021-04-10 00:56:13', '2021-04-10 00:56:13'),
(25, 'iKBC', 'iKBC', 'Logohang/25.png', '2021-04-10 00:56:13', '2021-04-10 00:56:13'),
(26, 'Steelseries', 'Steelseries', 'Logohang/26.png', '2021-04-10 00:56:13', '2021-04-10 00:56:13'),
(27, 'LG', 'LG', 'Logohang/27.png', '2021-04-10 00:56:13', '2021-04-10 00:56:13'),
(28, 'Acer', 'Acer', 'Logohang/28.png', '2021-04-10 00:56:13', '2021-04-10 00:56:13'),
(29, 'Dell', 'Dell', 'Logohang/29.png', '2021-04-10 00:56:13', '2021-04-10 00:56:13');

-- --------------------------------------------------------

--
-- Table structure for table `khoiphucmatkhau`
--

DROP TABLE IF EXISTS `khoiphucmatkhau`;
CREATE TABLE IF NOT EXISTS `khoiphucmatkhau` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `khoiphucmatkhau_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

DROP TABLE IF EXISTS `lienhe`;
CREATE TABLE IF NOT EXISTS `lienhe` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `hovaten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vande` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinnhan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lienhe`
--

INSERT INTO `lienhe` (`id`, `hovaten`, `mail`, `vande`, `tinnhan`, `created_at`, `updated_at`) VALUES
(1, 'thanh26', 'louisthanh51@gmail.com', '??dzxc', 'dsgfgngjgy', '2021-04-08 12:30:43', '2021-04-08 12:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

DROP TABLE IF EXISTS `loaisanpham`;
CREATE TABLE IF NOT EXISTS `loaisanpham` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tenloai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenloai_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`id`, `tenloai`, `tenloai_slug`, `created_at`, `updated_at`) VALUES
(1, 'Bo m???ch ch???-Mainboard', 'bo-mach-chu-mainboard', '2021-04-08 14:48:49', '2021-04-08 14:48:49'),
(2, 'B??? nh??? - RAM', 'bo-nho-ram', '2021-04-08 14:49:08', '2021-04-08 14:49:08'),
(3, 'B??? vi x??? l?? - CPU', 'bo-vi-xu-li-cpu', '2021-04-08 14:49:14', '2021-04-08 14:49:14'),
(4, 'Card m??n h??nh - VGA', 'card-man-hinh-vga', '2021-04-08 14:49:18', '2021-04-08 14:49:18'),
(5, '??? c???ng SSD', 'o-cung-ssd', '2021-04-08 14:49:22', '2021-04-08 14:49:22'),
(6, '??? c???ng HDD', 'o-cung-hdd', '2021-04-08 14:49:25', '2021-04-08 14:49:25'),
(7, 'Th??ng m??y t??nh - CASE', 'thung-may-tinh-case', '2021-04-08 14:49:47', '2021-04-08 14:49:47'),
(8, 'Ngu???n m??y t??nh - PSU', 'nguon-may-tinh-psu', '2021-04-08 14:49:51', '2021-04-08 14:49:51'),
(9, 'T???n nhi???t -RGB', 'tan-nhiet-rgb', '2021-04-08 14:49:56', '2021-04-08 14:49:56'),
(10, 'B??n ph??m  -keyboard', 'ban-phim-keyboard', '2021-04-08 14:50:02', '2021-04-08 14:50:02'),
(11, 'Chu???t -Mouse', 'chuot-mouse', '2021-04-08 14:50:07', '2021-04-08 14:50:07'),
(12, 'M??n h??nh -Monitor', 'man-hinh-monitor', '2021-04-08 14:50:11', '2021-04-08 14:50:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_nguoidungs_table', 1),
(2, '2014_10_12_100000_create_khoiphucmatkhaus_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_28_080331_create_hangs_table', 1),
(5, '2020_12_28_080331_create_loaisanphams_table', 1),
(6, '2020_12_28_080406_create_sanphams_table', 1),
(7, '2020_12_28_080420_create_don_hangs_table', 1),
(8, '2020_12_28_080433_create_don_hang__chi_tiets_table', 1),
(9, '2020_12_28_080433_create_lien_hes_table', 1),
(10, '2021_04_08_182053_role', 1),
(11, '2021_04_08_182734_create_role_user_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

DROP TABLE IF EXISTS `nguoidung`;
CREATE TABLE IF NOT EXISTS `nguoidung` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdt` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nguoidung_username_unique` (`username`),
  UNIQUE KEY `nguoidung_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `sdt`, `created_at`, `updated_at`) VALUES
(1, 'Employee Name', 'employee', 'employee@example.com', NULL, '$2y$10$.Vkky0.9grOBv/z9N13fUupPCThns3gv8M4hVKocofjVJb5PItf02', NULL, '', '2021-04-08 11:34:05', '2021-04-09 12:59:39'),
(2, 'Saler Name', 'salerusername', 'saler@example.com', NULL, '$2y$10$twOmpjIYd5gnH5n4ug4NBeEZXcwtjy9GA2qqzJtOZRa/XD/.RpyYy', NULL, 'user', '2021-04-08 11:34:05', '2021-04-08 11:34:05'),
(3, 'Admin Name', 'adminusername', 'admin@example.com', NULL, '$2y$10$mP94HEqrmT/9u78lNWKCUuqpMllS81F9PjxyFJVyOfrTFHFJL7R7K', NULL, 'user', '2021-04-08 11:34:05', '2021-04-08 11:34:05'),
(4, 'thanh26', 'louisthanh51', 'louisthanh51@gmail.com', NULL, '$2y$10$iUZeD3urVfwXLNJkfViKoevdFJ9tKH/0.9.yI7w4A8V8SThT9ztZC', NULL, 'user', '2021-04-08 11:38:40', '2021-04-08 11:38:40'),
(5, 'khogng', 'kimngan24799', 'kimngan24799@gmail.com', NULL, '$2y$10$TI9WXpq.mKQirl/MDMfhKulj1DENK61K.qO1H/3EMpk2zsarizRtS', NULL, 'user', '2021-04-08 12:10:33', '2021-04-08 12:10:33'),
(9, 'cuong', 'cuong', 'cuong@cuong.com', NULL, '$2y$10$dn7LYLFfSCPycAK22JgR.e9pBtvTIdeHAaB/CFZyl0/4P8/CZOxYC', NULL, 'user', '2021-04-08 12:22:34', '2021-04-08 12:22:34'),
(10, 'thanh2', 'louisthanh5', 'louisthanh5@gmail.com', NULL, '$2y$10$Tt20H9Gk88dR.SVQTSsUeuMgVkS.0Al25x6d5dBHPQog4ged7oEbC', NULL, '0982761913', '2021-04-09 13:08:59', '2021-04-09 13:08:59'),
(11, 'thanh21', 'thanh21', 'thanh21@gmai.com', NULL, '$2y$10$wFumyh1xQpHItt..TfIsyuFIYaZ2AF4tzDO5tZTpJciRw.iAk3rRK', NULL, '0982764646', '2021-04-14 02:40:38', '2021-04-14 02:40:38');

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dung_role`
--

DROP TABLE IF EXISTS `nguoi_dung_role`;
CREATE TABLE IF NOT EXISTS `nguoi_dung_role` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(10) UNSIGNED NOT NULL,
  `nguoi_dung_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nguoi_dung_role`
--

INSERT INTO `nguoi_dung_role` (`id`, `role_id`, `nguoi_dung_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 3, 3, NULL, NULL),
(4, 1, 8, NULL, NULL),
(5, 2, 9, NULL, NULL),
(6, 1, 10, NULL, NULL),
(7, 3, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'employee', 'A Employee User', '2021-04-08 11:34:05', '2021-04-08 11:34:05'),
(2, 'saler', 'A Saler User', '2021-04-08 11:34:05', '2021-04-08 11:34:05'),
(3, 'admin', 'A Admin User', '2021-04-08 11:34:05', '2021-04-08 11:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `loaisanpham_id` bigint(20) UNSIGNED NOT NULL,
  `tensanpham` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tensanpham_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_hang` bigint(20) UNSIGNED NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` double NOT NULL,
  `khuyenmai` double NOT NULL,
  `dongia_km` double NOT NULL,
  `baohanh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thongtinsanpham` text COLLATE utf8mb4_unicode_ci,
  `hinhanh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `sanpham_loaisanpham_id_foreign` (`loaisanpham_id`),
  KEY `sanpham_hang_id_foreign` (`id_hang`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `loaisanpham_id`, `tensanpham`, `tensanpham_slug`, `id_hang`, `soluong`, `dongia`, `khuyenmai`, `dongia_km`, `baohanh`, `thongtinsanpham`, `hinhanh`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mainboard ASUS PRIME A320M E', 'Mainboard-ASUS-PRIME-A320M -E', 1, 100, 1290000, 0, 1290000, '12 th??ng', 'Main m??y t??nh PRIME A320 series s??? h???u C??ng ngh??? 5X Protection II ?????u ng??nh, s??? d???ng nh???ng linh ki???n t???t nh???t, thi???t k??? m???ch ho??n h???o v?? tu??n th??? c??c ti??u chu???n kh???t khe ????? b???o ?????m ch???t l?????ng v?? ????? b???n l??u d??i cho bo m???ch ch??? c???a b???n.\n\n??i???u n??y ?????ng ngh??a v???i s??? b???o v??? v?? ???n ?????nh v?????t tr???i cho m??y t??nh ??? ????y l?? th??nh qu??? t??? nhi???u th???p k??? kinh nghi???m k??? thu???t c???a th????ng hi???u bo m???ch ch??? h??ng ?????u th??? gi???i.', 'mainboard/asus_primeA320M-E.jpg', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(2, 1, 'Gigabyte GA A320M S2H (rev. 1.x)', 'Gigabyte-GA-A320M-S2H-(rev. 1.x)', 2, 100, 1290000, 0.1, 1161000, '12 th??ng', 'Mainboard Gigabyte GA-A320M-S2H gi???i thi???u b??? x??? l?? d??ng Ryzen 2000 m???i nh???t ????? cung c???p s???c m???nh t??nh to??n cho nhu c???u ch??i game ng??n s??ch. D??ng bo m???ch ch??? chipset AMD AM4 ?????y ????? c???a GIGABYTE ho??n to??n ph?? h???p v???i b??? x??? l?? AMD Ryzen 2000 m???i nh???t c???a b??? x??? l?? v?? hi???u su???t ????? h???a t??ch h???p. Ng?????i d??ng c?? th??? t???n h?????ng nh???ng l???i ??ch m?? b??? x??? l?? AMD Ryzen 2000 mang l???i ch??? b???ng c??ch t???i xu???ng v?? n??ng c???p BIOS m???i nh???t .', 'mainboard/gearvn-gigabyte-ga-a320m-s2h-rev-1.png', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(3, 1, 'Asrock H310CM DVS LGA 1151v2', 'Asrock-H310CM-DVS-LGA-1151v2', 3, 100, 1350000, 0.1, 1215000, '12 th??ng', 'Asrock H310CM-DVS l?? m???t trong nh???ng chi???c mainboard ph??? th??ng m???i nh???t c???a ASRock tr??n n???n t???ng socket 1151-v2. H??? tr??? c??c d??ng CPU th??? h??? th??? 8 v?? 9  c???a Intel v?? nhi???u t??nh n??ng cao c???p ???????c c???i thi???n r?? r???t c??ng v???i b??? chipset B365 m???i nh???t.', 'mainboard/h310cm-dvs.png', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(4, 1, 'Asus PRIME H310M-CS R2.0 LGA1151v2', 'Asus-PRIME-H310M-CS-2.0-LGA1151v2', 1, 100, 1390000, 0.1, 1251000, '12 th??ng', 'PRIME H310M-CS R2.0 la?? m????u main m??y t??nh ph???? th??ng ??????n t???? ASUS, h???? tr???? ca??c do??ng CPU Intel th???? h???? th???? 8 va?? 9 v????i nhi????u ti??nh n??ng ma??nh me?? cu??a b???? chipset H310.\n\nM????c du?? chi?? la?? mainboard ???? ph??n khu??c ph???? th??ng, nh??ng PRIME H310M-CS R2.0 v????n ????????c trang bi?? ??????y ??u?? ca??c c????ng k????t n????i t????c ?????? cao, nh?? ch??n c????m m???? r????ng USB 3.1 Gen 1 ra phi??a m????t tr??????c cu??a case, h???? tr???? ca??c thi????t bi?? ngoa??i vi y??u c????u t????c ?????? k????t n????i nhanh.', 'mainboard/Asus-PRIME-H310M-CS-2.0-LGA1151v2.jpg', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(5, 1, 'Asrock H310CM HDV LGA 1151v2', 'Asrock-H310CM-HDV-LGA-1151v2', 3, 100, 1390000, 0.1, 1251000, '12 th??ng', ' H310CM-HDV/M.2 l?? chi???c mainboard ph??? th??ng tr??n n???n t???n socket 1151-v2 c???a ASRock, h??? tr??? c??c d??ng CPU th??? h??? th??? 8 v?? 9 c???a Intel c??ng v???i ????y ????? t??nh n??ng c?? b???n v???i s??? h??? tr??? c???a b??? chipset H310.\n\nH310CM-HDV/M.2 ???????c thi???t k??? kh?? ????n gi???n v?? nh??? g???n, ph?? h???p v???i c??c m???u case nh??? g???n t???m trung. M???c d?? v???y, H310CM-HDV/M.2 v???n ???????c ASRock s??? d???ng linh ki???n v?? b??? c???p ngu???n cao c???p nh???m ??em l???i hi???u n??ng ???n ?????nh nh???t.', 'mainboard/h310cm-hdv_l1.png', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(6, 1, 'Mainboard MSI A320M-A PRO MAX', 'Mainboard-MSI-A320M-A-PRO-MAX', 4, 100, 1550000, 0.35, 1007500, '12 th??ng', 'C??c bo m???ch ch??? MSI c?? h??ng t???n thi???t k??? th??ng m??nh v?? c???c k??? ti???n l???i, ch???ng h???n nh?? khu v???c ng??n ch???n v?? nh???n bi???t ch??n c???m pin c???c k??? thu???n ti???n, v??? tr?? SATA & USB th??n thi???n, v.v., v?? v???y ng?????i d??ng c?? th??? t??? tay l???a ch???n v?? build b???t k??? thi???t b??? ch??i game n??o h??? mu???n.', 'mainboard/Mainboard-MSI-A320M-A-PRO-MAX.png', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(7, 1, 'MSI H410M PRO E', 'MSI-H410M-PRO-E', 4, 100, 1550000, 0.35, 1007500, '12 th??ng', 'MSI H410M PRO-E l?? main m??y t??nh ???????c s??? d???ng chipset H410 c???a Intel, h??? tr??? vi x??? l?? Intel?? Core??? / Pentium?? Celeron?? th??? h??? 10 socket LGA 1200. L?? m???t bo m???ch ch??? v???i gi?? c??? ph???i ch??ng, MSI H410M PRO-E v???n s??? h???u ?????y ????? t??nh n??ng ????? ????p ???ng cho nhu c???u l??m vi???c c??ng nh?? gaming. \n\nBo m???ch ch??? c???a MSI ???????c thi???t k??? m???t c??ch th??ng minh v???i h??ng lo???t ti???n ??ch ph?? h???p v???i c??? ng?????i d??ng c?? b???n l???n ng?????i ??am m?? s??ng t???o. ?????ng th???i thi???t k??? th??n thi???n c??ng gi??p ng?????i d??ng l???p ?????t d??? d??ng. ', 'mainboard/MSI-H410M-PRO-E.png', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(8, 1, 'Mainboard Asus EX H410M-V3', 'Mainboard-Asus-EX-H410M-V3', 1, 100, 1550000, 0, 1550000, '12 th??ng', 'Mainboard Asus EX H410M-V3 l?? m???t trong nh???ng d??ng s???n ph???m main m??y t??nh v???i kh??? n??ng cung c???p n??ng l?????ng ???????c t??ng c?????ng v?? thi???t k??? l??m m??t t???i ??u h??a cung c???p nhi???u di???n t??ch b??? m???t h??n ????? t???n nhi???t. T???n d???ng t???i ??a qu?? tr??nh x??y d???ng tr?? ch??i c???a m??nh v???i kh??? n??ng cung c???p n??ng l?????ng ???????c ????nh gi?? cao v?? l??m m??t t???i ??u. ??i???u khi???n th??ng minh cho ph??p b???n d??? d??ng qu???n l?? c??c c??i ?????t ??p xung, l??m m??t v?? k???t n???i m???ng, cung c???p cho b???n m???i th??? b???n c???n ????? khai th??c to??n b??? ti???m n??ng c???a b???n d???ng ????? c?? hi???u su???t ch??i tr?? ch??i h??ng ?????u.', 'mainboard/Mainboard-Asus-EX-H410M-V3.jpg', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(9, 1, 'ASROCK H410M-HVS', 'ASROCK-H410M-HVS', 3, 100, 1550000, 0, 1550000, '12 th??ng', 'Main m??y t??nh ASROCK H410M-HVS l?? bo m???ch ch??? ph??? th??ng c???a Asrock, s??? d???ng chipset H410 c???a Intel h??? tr??? c??c CPU socket LGA 1200 m???i nh???t. Mainboard c?? m??u ??en to??n ph???n ch???c ch???n nh??? thi???t k??? Sapphire Black v?? cho ngo???i h??nh th??m ph???n huy???n b?? h??n. C??ng v???i ch???t li???u l?????i s???i thu??? tinh b???o v??? c??c m???ch ??i???n b??n d?????i kh???i ????? ???m m??i tr?????ng.\n\nMainboard ASROCK H410M-HVS ???????c trang b??? 5 phase ngu???n Digital VRM v???i t??? 50A cao c???p s??? ?????m b???o c???p n??ng l?????ng ???n ?????nh cho CPU ho???t ?????ng tr??n tru, m?????t m??.', 'mainboard/ASROCK-H410M-HVS.png', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(10, 1, 'MSI H410M-A PRO', 'MSI-H410M-A-PRO', 4, 100, 1550000, 0, 1550000, '12 th??ng', 'MSI H410M-A PRO l?? main m??y t??nh ???????c s??? d???ng chipset H410 c???a Intel, h??? tr??? vi x??? l?? Intel?? Core??? / Pentium?? Celeron?? th??? h??? 10 socket LGA 1200. L?? m???t bo m???ch ch??? v???i gi?? c??? ph???i ch??ng, MSI H410M-A Pro v???n s??? h???u ?????y ????? t??nh n??ng ????? ????p ???ng cho nhu c???u l??m vi???c c??ng nh?? gaming. \n\nBo m???ch ch??? c???a MSI ???????c thi???t k??? m???t c??ch th??ng minh v???i h??ng lo???t ti???n ??ch ph?? h???p v???i c??? ng?????i d??ng c?? b???n l???n ng?????i ??am m?? s??ng t???o. ?????ng th???i thi???t k??? th??n thi???n c??ng gi??p ng?????i d??ng l???p ?????t d??? d??ng. ', 'mainboard/MSI-H410M-A-PRO.png', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(11, 1, 'GIGABYTE H410M H (rev. 1.0)', 'GIGABYTE-H410M-H-(rev. 1.0)', 2, 100, 1650000, 0, 1650000, '12 th??ng', 'GIGABYTE H410M H (rev. 1.0) l?? m???t trong nh???ng d??ng main m??y t??nh m???i nh???t c??ng v???i hi???u su???t cao cung c???p cho ng?????i d??ng c??c t??nh n??ng to??n di???n nh???t v?? tr???i nghi???m t???t nh???t ?????n v???i ng?????i ti??u d??ng.', 'mainboard/GIGABYTE-H410M-H-(rev. 1.0).png', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(12, 1, 'Gigabyte H310M S2H LGA 1151v2', 'Gigabyte-H310M-S2H-LGA-1151v2', 2, 100, 1650000, 0, 1650000, '12 th??ng', NULL, 'mainboard/Gigabyte-H310M-S2H-LGA-1151v2.jpg', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(13, 1, 'Asus Prime H310M-E LGA1151v2', 'Asus-Prime-H310M-E-LGA1151v2', 1, 100, 1690000, 0, 1690000, '12 th??ng', 'ASUS Prime H310M-E c?? h??? th???ng t???n nhi???t b???ng ph???n m???m Fan Expert. Ch??? v???i m???t c??i nh???p chu???t l?? b???n ???? c?? th??? t??i???u ch???nh ch???c n??ng l??m m??t c???a to??n b??? m??y.\n\n??i???m ?????c bi???t c???a s???n ph???m l?? USB 3.1 Gen 1 - n??i m?? b???n c???n v???i hai c???ng c???m si??u t???c ????? ??? ph??a tr?????c th??ng m??y. Ng?????i d??ng s??? ???????c tr???i nghi???m t???c ????? truy???n d??? li???u nhanh h??n g???p10 l???n USB 2.0 do kh??? n??ng k???t n???i c???m l?? ch???y v?? kh??ng ph???i th??o d??? thi???t b??? n??o.', 'mainboard/Asus-Prime-H310M-E-LGA1151v2.png', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(14, 1, 'ASROCK H310CM HDV/M2', 'ASROCK-H310CM-HDV/M2', 3, 100, 1750000, 0, 1750000, '12 th??ng', 'H310CM-HDV/M.2 l?? chi???c main m??y t??nh ph??? th??ng tr??n n???n t???n socket 1151-v2 c???a ASRock, h??? tr??? c??c d??ng CPU th??? h??? th??? 8 v?? 9 c???a Intel c??ng v???i ????y ????? t??nh n??ng c?? b???n v???i s??? h??? tr??? c???a b??? chipset H310.\n\n???????c thi???t k??? kh?? ????n gi???n v?? nh??? g???n, ph?? h???p v???i c??c m???u case nh??? g???n t???m trung. M???c d?? v???y, H310CM-HDV/M.2 v???n ???????c ASRock s??? d???ng linh ki???n v?? b??? c???p ngu???n cao c???p nh???m ??em l???i hi???u n??ng ???n ?????nh nh???t.', 'mainboard/ASROCK-H310CM-HDV/M21.png', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(15, 1, 'GIGABYTE B450M Gaming (AMD Socket AM4)', 'GIGABYTE-B450M-Gaming-(AMD-Socket-AM4)', 2, 100, 1790000, 0, 1790000, '12 th??ng', 'GIGABYTE 400-series ph??t huy t???i ??a ti???m n??ng c???a PC v???i c??ng ngh??? AMD StoreMI. StoreMI t??ng t???c c??c thi???t b??? l??u tr??? truy???n th???ng ????? gi???m th???i gian kh???i ?????ng v?? n??ng cao tr???i nghi???m ng?????i d??ng n??i chung.\n\nTi???n ??ch d??? s??? d???ng n??y k???t h???p t???c ????? c???a SSD v???i dung l?????ng ??? c???ng l???n v??o c??ng m???t ??? ????a, gi??p t??ng t???c ????? ?????c / ghi c???a thi???t b??? ????? ph?? h???p v???i SSD, t??ng hi???u su???t d??? li???u cho gi?? tr??? ????ng kinh ng???c v?? bi???n h??? th???ng PC b??nh th?????ng th??nh hi???u su???t cao.', 'mainboard/GIGABYTE-B450M-Gaming-(AMD-Socket-AM4).jpg', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(16, 1, 'MSI H410M PRO', 'MSI-H410M-PRO', 4, 100, 1790000, 0, 1790000, '12 th??ng', 'MSI H410M PRO l?? main m??y t??nh s??? d???ng chipset H410 c???a Intel, h??? tr??? vi x??? l?? Intel?? Core??? / Pentium?? Celeron?? th??? h??? 10 socket LGA 1200. L?? m???t bo m???ch ch??? v???i gi?? c??? ph???i ch??ng, MSI H410M Pro v???n s??? h???u ?????y ????? t??nh n??ng ????? ????p ???ng cho nhu c???u l??m vi???c c??ng nh?? gaming. \n\nBo m???ch ch??? c???a MSI ???????c thi???t k??? m???t c??ch th??ng minh v???i h??ng lo???t ti???n ??ch ph?? h???p v???i c??? ng?????i d??ng c?? b???n l???n ng?????i ??am m?? s??ng t???o. ?????ng th???i thi???t k??? th??n thi???n c??ng gi??p ng?????i d??ng l???p ?????t d??? d??ng. ', 'mainboard/MSI-H410M-PRO.png', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(17, 1, 'Asus TUF B360M-Plus Gaming LGA 1151v2', 'Asus-TUF-B360M-Plus -Gaming-LGA1151v2', 1, 100, 1990000, 0, 1990000, '12 th??ng', 'TUF Gaming ???????c thi???t k??? v?? th??? nghi???m ?????c bi???t ????? t???n t???i v?? ph??t tri???n trong ??i???u ki???n m?? c??c b???ng kh??c s??? ph???i v???t l???n. ???????c thi???t k??? v???i c??c linh ki???n c?? ????? b???n cao, c??c bo m???ch ch??? n??y mang l???i s??? ???n ?????nh v???ng ch???c cho c??c phi??n tr?? ch??i k??o d??i t???i ch???ng n??o b???n y??u c???u.\n\nKhi b???n x??y d???ng v???i m???t bo m???ch ch??? c???a TUF Gaming, b???n c??ng ???????c h?????ng l???i t??? TUF Gaming Alliance ??? m???t s??? h???p t??c c???a ASUS v???i c??c ?????i t??c c??ng nghi???p ????ng tin c???y ?????m b???o x??y d???ng d??? d??ng h??n, t??nh t????ng th??ch t???t nh???t v?? th???m m??? b??? sung t??? linh ki???n cho ?????n v??? m??y.', 'mainboard/Asus-TUF-B360M-Plus -Gaming-LGA1151v2.png', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(18, 1, 'GIGABYTE Z390 AORUS ELITE LGA1151v2', 'GIGABYTE-Z390-AORUS-ELITE-LGA1151v2', 2, 100, 4690000, 0, 4690000, '12 th??ng', NULL, 'mainboard/GIGABYTE-Z390-AORUS-ELITE-LGA1151v2.jpg', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(19, 1, 'ASROCK Z490 Steel Legend', 'ASROCK-Z490-Steel-Legend', 3, 100, 4490000, 0, 4490000, '12 th??ng', NULL, 'mainboard/ASROCK-Z490-Steel-Legend.png', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(20, 1, 'MSI MPG Z390 GAMING EDGE AC LGA1151V2', 'MSI-MPG-Z390-GAMING-EDGE-AC-LGA1151V2', 4, 100, 4490000, 0, 4490000, '12 th??ng', NULL, 'mainboard/MSI-MPG-Z390-GAMING-EDGE-AC-LGA1151V2.jpg', '2021-04-13 12:53:08', '2021-04-13 12:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

DROP TABLE IF EXISTS `slide`;
CREATE TABLE IF NOT EXISTS `slide` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `link`, `hinhanh`, `created_at`, `updated_at`) VALUES
(1, 'http://canhtoan.com/tuyen-dung/', 'Slide/1.jpg', '2021-04-14 05:05:00', '2021-04-14 05:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `thongso`
--

DROP TABLE IF EXISTS `thongso`;
CREATE TABLE IF NOT EXISTS `thongso` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tenthongso` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_loaisanpham` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `thongso_loaisanpham` (`id_loaisanpham`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thongso`
--

INSERT INTO `thongso` (`id`, `tenthongso`, `id_loaisanpham`) VALUES
(1, 'Chipset\r\n', 1),
(2, 'Socket', 1),
(3, 'Ki??ch th??????c', 1),
(4, 'Khe RAM t???i ??a\r\n', 1),
(5, 'Ki???u RAM h??? tr???\r\n', 1),
(6, 'H???? tr???? b???? nh???? t????i ??a', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietts`
--
ALTER TABLE `chitietts`
  ADD CONSTRAINT `chitietts_sanpham_id_foreign` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_nguoidung_id_foreign` FOREIGN KEY (`nguoidung_id`) REFERENCES `donhang` (`id`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_hang_id_foreign` FOREIGN KEY (`id_hang`) REFERENCES `hang` (`id`),
  ADD CONSTRAINT `sanpham_loaisanpham_id_foreign` FOREIGN KEY (`loaisanpham_id`) REFERENCES `loaisanpham` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
