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
(1, 'thanh26', 'louisthanh51@gmail.com', 'ádzxc', 'dsgfgngjgy', '2021-04-08 12:30:43', '2021-04-08 12:30:43');

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
(1, 'Bo mạch chủ-Mainboard', 'bo-mach-chu-mainboard', '2021-04-08 14:48:49', '2021-04-08 14:48:49'),
(2, 'Bộ nhớ - RAM', 'bo-nho-ram', '2021-04-08 14:49:08', '2021-04-08 14:49:08'),
(3, 'Bộ vi xử lí - CPU', 'bo-vi-xu-li-cpu', '2021-04-08 14:49:14', '2021-04-08 14:49:14'),
(4, 'Card màn hình - VGA', 'card-man-hinh-vga', '2021-04-08 14:49:18', '2021-04-08 14:49:18'),
(5, 'Ổ cứng SSD', 'o-cung-ssd', '2021-04-08 14:49:22', '2021-04-08 14:49:22'),
(6, 'Ổ cứng HDD', 'o-cung-hdd', '2021-04-08 14:49:25', '2021-04-08 14:49:25'),
(7, 'Thùng máy tính - CASE', 'thung-may-tinh-case', '2021-04-08 14:49:47', '2021-04-08 14:49:47'),
(8, 'Nguồn máy tính - PSU', 'nguon-may-tinh-psu', '2021-04-08 14:49:51', '2021-04-08 14:49:51'),
(9, 'Tản nhiệt -RGB', 'tan-nhiet-rgb', '2021-04-08 14:49:56', '2021-04-08 14:49:56'),
(10, 'Bàn phím  -keyboard', 'ban-phim-keyboard', '2021-04-08 14:50:02', '2021-04-08 14:50:02'),
(11, 'Chuột -Mouse', 'chuot-mouse', '2021-04-08 14:50:07', '2021-04-08 14:50:07'),
(12, 'Màn hình -Monitor', 'man-hinh-monitor', '2021-04-08 14:50:11', '2021-04-08 14:50:11');

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
(1, 1, 'Mainboard ASUS PRIME A320M E', 'Mainboard-ASUS-PRIME-A320M -E', 1, 100, 1290000, 0, 1290000, '12 tháng', 'Main máy tính PRIME A320 series sở hữu Công nghệ 5X Protection II đầu ngành, sử dụng những linh kiện tốt nhất, thiết kế mạch hoàn hảo và tuân thủ các tiêu chuẩn khắt khe để bảo đảm chất lượng và độ bền lâu dài cho bo mạch chủ của bạn.\n\nĐiều này đồng nghĩa với sự bảo vệ và ổn định vượt trội cho máy tính — đây là thành quả từ nhiều thập kỷ kinh nghiệm kỹ thuật của thương hiệu bo mạch chủ hàng đầu thế giới.', 'mainboard/asus_primeA320M-E.jpg', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(2, 1, 'Gigabyte GA A320M S2H (rev. 1.x)', 'Gigabyte-GA-A320M-S2H-(rev. 1.x)', 2, 100, 1290000, 0.1, 1161000, '12 tháng', 'Mainboard Gigabyte GA-A320M-S2H giới thiệu bộ xử lý dòng Ryzen 2000 mới nhất để cung cấp sức mạnh tính toán cho nhu cầu chơi game ngân sách. Dòng bo mạch chủ chipset AMD AM4 đầy đủ của GIGABYTE hoàn toàn phù hợp với bộ xử lý AMD Ryzen 2000 mới nhất của bộ xử lý và hiệu suất đồ họa tích hợp. Người dùng có thể tận hưởng những lợi ích mà bộ xử lý AMD Ryzen 2000 mang lại chỉ bằng cách tải xuống và nâng cấp BIOS mới nhất .', 'mainboard/gearvn-gigabyte-ga-a320m-s2h-rev-1.png', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(3, 1, 'Asrock H310CM DVS LGA 1151v2', 'Asrock-H310CM-DVS-LGA-1151v2', 3, 100, 1350000, 0.1, 1215000, '12 tháng', 'Asrock H310CM-DVS là một trong những chiếc mainboard phổ thông mới nhất của ASRock trên nền tảng socket 1151-v2. Hỗ trợ các dòng CPU thế hệ thứ 8 và 9  của Intel và nhiều tính năng cao cấp được cải thiện rõ rệt cùng với bộ chipset B365 mới nhất.', 'mainboard/h310cm-dvs.png', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(4, 1, 'Asus PRIME H310M-CS R2.0 LGA1151v2', 'Asus-PRIME-H310M-CS-2.0-LGA1151v2', 1, 100, 1390000, 0.1, 1251000, '12 tháng', 'PRIME H310M-CS R2.0 là mẫu main máy tính phổ thông đến từ ASUS, hỗ trợ các dòng CPU Intel thế hệ thứ 8 và 9 với nhiều tính năng mạnh mẽ của bộ chipset H310.\n\nMặc dù chỉ là mainboard ở phân khúc phổ thông, nhưng PRIME H310M-CS R2.0 vẫn được trang bị đầy đủ các cổng kết nối tốc độ cao, như chân cắm mở rộng USB 3.1 Gen 1 ra phía mặt trước của case, hỗ trợ các thiết bị ngoại vi yêu cầu tốc độ kết nối nhanh.', 'mainboard/Asus-PRIME-H310M-CS-2.0-LGA1151v2.jpg', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(5, 1, 'Asrock H310CM HDV LGA 1151v2', 'Asrock-H310CM-HDV-LGA-1151v2', 3, 100, 1390000, 0.1, 1251000, '12 tháng', ' H310CM-HDV/M.2 là chiếc mainboard phổ thông trên nền tản socket 1151-v2 của ASRock, hỗ trợ các dòng CPU thế hệ thứ 8 và 9 của Intel cùng với đây đủ tính năng cơ bản với sự hỗ trợ của bộ chipset H310.\n\nH310CM-HDV/M.2 được thiết kế khá đơn giản và nhỏ gọn, phù hợp với các mẫu case nhỏ gọn tầm trung. Mặc dù vậy, H310CM-HDV/M.2 vẫn được ASRock sử dụng linh kiện và bộ cấp nguồn cao cấp nhằm đem lại hiệu năng ổn định nhất.', 'mainboard/h310cm-hdv_l1.png', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(6, 1, 'Mainboard MSI A320M-A PRO MAX', 'Mainboard-MSI-A320M-A-PRO-MAX', 4, 100, 1550000, 0.35, 1007500, '12 tháng', 'Các bo mạch chủ MSI có hàng tấn thiết kế thông mình và cực kỳ tiện lợi, chẳng hạn như khu vực ngăn chặn và nhận biết chân cắm pin cực kỳ thuận tiện, vị trí SATA & USB thân thiện, v.v., vì vậy người dùng có thể tự tay lựa chọn và build bất kỳ thiết bị chơi game nào họ muốn.', 'mainboard/Mainboard-MSI-A320M-A-PRO-MAX.png', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(7, 1, 'MSI H410M PRO E', 'MSI-H410M-PRO-E', 4, 100, 1550000, 0.35, 1007500, '12 tháng', 'MSI H410M PRO-E là main máy tính được sử dụng chipset H410 của Intel, hỗ trợ vi xử lý Intel® Core™ / Pentium® Celeron® thế hệ 10 socket LGA 1200. Là một bo mạch chủ với giá cả phải chăng, MSI H410M PRO-E vẫn sở hữu đầy đủ tính năng để đáp ứng cho nhu cầu làm việc cũng như gaming. \n\nBo mạch chủ của MSI được thiết kế một cách thông minh với hàng loạt tiện ích phù hợp với cả người dùng cơ bản lẫn người đam mê sáng tạo. Đồng thời thiết kế thân thiện cũng giúp người dùng lắp đặt dễ dàng. ', 'mainboard/MSI-H410M-PRO-E.png', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(8, 1, 'Mainboard Asus EX H410M-V3', 'Mainboard-Asus-EX-H410M-V3', 1, 100, 1550000, 0, 1550000, '12 tháng', 'Mainboard Asus EX H410M-V3 là một trong những dòng sản phẩm main máy tính với khả năng cung cấp năng lượng được tăng cường và thiết kế làm mát tối ưu hóa cung cấp nhiều diện tích bề mặt hơn để tản nhiệt. Tận dụng tối đa quá trình xây dựng trò chơi của mình với khả năng cung cấp năng lượng được đánh giá cao và làm mát tối ưu. Điều khiển thông minh cho phép bạn dễ dàng quản lý các cài đặt ép xung, làm mát và kết nối mạng, cung cấp cho bạn mọi thứ bạn cần để khai thác toàn bộ tiềm năng của bản dựng để có hiệu suất chơi trò chơi hàng đầu.', 'mainboard/Mainboard-Asus-EX-H410M-V3.jpg', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(9, 1, 'ASROCK H410M-HVS', 'ASROCK-H410M-HVS', 3, 100, 1550000, 0, 1550000, '12 tháng', 'Main máy tính ASROCK H410M-HVS là bo mạch chủ phổ thông của Asrock, sử dụng chipset H410 của Intel hỗ trợ các CPU socket LGA 1200 mới nhất. Mainboard có màu đen toàn phần chắc chắn nhờ thiết kế Sapphire Black và cho ngoại hình thêm phần huyền bí hơn. Cùng với chất liệu lưới sợi thuỷ tinh bảo vệ các mạch điện bên dưới khỏi độ ẩm môi trường.\n\nMainboard ASROCK H410M-HVS được trang bị 5 phase nguồn Digital VRM với tụ 50A cao cấp sẽ đảm bảo cấp năng lượng ổn định cho CPU hoạt động trơn tru, mượt mà.', 'mainboard/ASROCK-H410M-HVS.png', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(10, 1, 'MSI H410M-A PRO', 'MSI-H410M-A-PRO', 4, 100, 1550000, 0, 1550000, '12 tháng', 'MSI H410M-A PRO là main máy tính được sử dụng chipset H410 của Intel, hỗ trợ vi xử lý Intel® Core™ / Pentium® Celeron® thế hệ 10 socket LGA 1200. Là một bo mạch chủ với giá cả phải chăng, MSI H410M-A Pro vẫn sở hữu đầy đủ tính năng để đáp ứng cho nhu cầu làm việc cũng như gaming. \n\nBo mạch chủ của MSI được thiết kế một cách thông minh với hàng loạt tiện ích phù hợp với cả người dùng cơ bản lẫn người đam mê sáng tạo. Đồng thời thiết kế thân thiện cũng giúp người dùng lắp đặt dễ dàng. ', 'mainboard/MSI-H410M-A-PRO.png', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(11, 1, 'GIGABYTE H410M H (rev. 1.0)', 'GIGABYTE-H410M-H-(rev. 1.0)', 2, 100, 1650000, 0, 1650000, '12 tháng', 'GIGABYTE H410M H (rev. 1.0) là một trong những dòng main máy tính mới nhất cùng với hiệu suất cao cung cấp cho người dùng các tính năng toàn diện nhất và trải nghiệm tốt nhất đến với người tiêu dùng.', 'mainboard/GIGABYTE-H410M-H-(rev. 1.0).png', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(12, 1, 'Gigabyte H310M S2H LGA 1151v2', 'Gigabyte-H310M-S2H-LGA-1151v2', 2, 100, 1650000, 0, 1650000, '12 tháng', NULL, 'mainboard/Gigabyte-H310M-S2H-LGA-1151v2.jpg', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(13, 1, 'Asus Prime H310M-E LGA1151v2', 'Asus-Prime-H310M-E-LGA1151v2', 1, 100, 1690000, 0, 1690000, '12 tháng', 'ASUS Prime H310M-E có hệ thống tản nhiệt bằng phần mềm Fan Expert. Chỉ với một cái nhấp chuột là bạn đã có thể tđiều chỉnh chức năng làm mát của toàn bộ máy.\n\nĐiểm đặc biệt của sản phẩm là USB 3.1 Gen 1 - nơi mà bạn cần với hai cổng cắm siêu tốc độ ở phía trước thùng máy. Người dùng sẽ được trải nghiệm tốc độ truyền dữ liệu nhanh hơn gấp10 lần USB 2.0 do khả năng kết nối cắm là chạy và không phải tháo dỡ thiết bị nào.', 'mainboard/Asus-Prime-H310M-E-LGA1151v2.png', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(14, 1, 'ASROCK H310CM HDV/M2', 'ASROCK-H310CM-HDV/M2', 3, 100, 1750000, 0, 1750000, '12 tháng', 'H310CM-HDV/M.2 là chiếc main máy tính phổ thông trên nền tản socket 1151-v2 của ASRock, hỗ trợ các dòng CPU thế hệ thứ 8 và 9 của Intel cùng với đây đủ tính năng cơ bản với sự hỗ trợ của bộ chipset H310.\n\nĐược thiết kế khá đơn giản và nhỏ gọn, phù hợp với các mẫu case nhỏ gọn tầm trung. Mặc dù vậy, H310CM-HDV/M.2 vẫn được ASRock sử dụng linh kiện và bộ cấp nguồn cao cấp nhằm đem lại hiệu năng ổn định nhất.', 'mainboard/ASROCK-H310CM-HDV/M21.png', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(15, 1, 'GIGABYTE B450M Gaming (AMD Socket AM4)', 'GIGABYTE-B450M-Gaming-(AMD-Socket-AM4)', 2, 100, 1790000, 0, 1790000, '12 tháng', 'GIGABYTE 400-series phát huy tối đa tiềm năng của PC với công nghệ AMD StoreMI. StoreMI tăng tốc các thiết bị lưu trữ truyền thống để giảm thời gian khởi động và nâng cao trải nghiệm người dùng nói chung.\n\nTiện ích dễ sử dụng này kết hợp tốc độ của SSD với dung lượng ổ cứng lớn vào cùng một ổ đĩa, giúp tăng tốc độ đọc / ghi của thiết bị để phù hợp với SSD, tăng hiệu suất dữ liệu cho giá trị đáng kinh ngạc và biến hệ thống PC bình thường thành hiệu suất cao.', 'mainboard/GIGABYTE-B450M-Gaming-(AMD-Socket-AM4).jpg', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(16, 1, 'MSI H410M PRO', 'MSI-H410M-PRO', 4, 100, 1790000, 0, 1790000, '12 tháng', 'MSI H410M PRO là main máy tính sử dụng chipset H410 của Intel, hỗ trợ vi xử lý Intel® Core™ / Pentium® Celeron® thế hệ 10 socket LGA 1200. Là một bo mạch chủ với giá cả phải chăng, MSI H410M Pro vẫn sở hữu đầy đủ tính năng để đáp ứng cho nhu cầu làm việc cũng như gaming. \n\nBo mạch chủ của MSI được thiết kế một cách thông minh với hàng loạt tiện ích phù hợp với cả người dùng cơ bản lẫn người đam mê sáng tạo. Đồng thời thiết kế thân thiện cũng giúp người dùng lắp đặt dễ dàng. ', 'mainboard/MSI-H410M-PRO.png', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(17, 1, 'Asus TUF B360M-Plus Gaming LGA 1151v2', 'Asus-TUF-B360M-Plus -Gaming-LGA1151v2', 1, 100, 1990000, 0, 1990000, '12 tháng', 'TUF Gaming được thiết kế và thử nghiệm đặc biệt để tồn tại và phát triển trong điều kiện mà các bảng khác sẽ phải vật lộn. Được thiết kế với các linh kiện có độ bền cao, các bo mạch chủ này mang lại sự ổn định vững chắc cho các phiên trò chơi kéo dài tới chừng nào bạn yêu cầu.\n\nKhi bạn xây dựng với một bo mạch chủ của TUF Gaming, bạn cũng được hưởng lợi từ TUF Gaming Alliance – một sự hợp tác của ASUS với các đối tác công nghiệp đáng tin cậy đảm bảo xây dựng dễ dàng hơn, tính tương thích tốt nhất và thẩm mỹ bổ sung từ linh kiện cho đến vỏ máy.', 'mainboard/Asus-TUF-B360M-Plus -Gaming-LGA1151v2.png', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(18, 1, 'GIGABYTE Z390 AORUS ELITE LGA1151v2', 'GIGABYTE-Z390-AORUS-ELITE-LGA1151v2', 2, 100, 4690000, 0, 4690000, '12 tháng', NULL, 'mainboard/GIGABYTE-Z390-AORUS-ELITE-LGA1151v2.jpg', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(19, 1, 'ASROCK Z490 Steel Legend', 'ASROCK-Z490-Steel-Legend', 3, 100, 4490000, 0, 4490000, '12 tháng', NULL, 'mainboard/ASROCK-Z490-Steel-Legend.png', '2021-04-13 12:53:08', '2021-04-13 12:53:08'),
(20, 1, 'MSI MPG Z390 GAMING EDGE AC LGA1151V2', 'MSI-MPG-Z390-GAMING-EDGE-AC-LGA1151V2', 4, 100, 4490000, 0, 4490000, '12 tháng', NULL, 'mainboard/MSI-MPG-Z390-GAMING-EDGE-AC-LGA1151V2.jpg', '2021-04-13 12:53:08', '2021-04-13 12:53:08');

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
(3, 'Kích thước', 1),
(4, 'Khe RAM tối đa\r\n', 1),
(5, 'Kiểu RAM hỗ trợ\r\n', 1),
(6, 'Hỗ trợ bộ nhớ tối đa', 1);

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
