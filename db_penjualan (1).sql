-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2021 at 06:16 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barcode` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_jual` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `barcode`, `nama`, `satuan`, `harga_beli`, `harga_jual`, `stok`, `created_at`, `updated_at`) VALUES
(2, '54321', 'Minyak Bimoli', 'pcs', '115000', '120000', 17, '2021-07-03 08:33:56', '2021-08-02 03:40:53'),
(3, '12345678', 'Indomilk Coklat', 'Pcs', '4000', '5000', 29, '2021-07-10 11:38:19', '2021-07-10 11:39:08'),
(4, '123456', 'Paket Grill BBQ', 'Paket', '200000', '250000', 20, '2021-08-02 03:20:24', '2021-08-02 03:20:24');

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
-- Table structure for table `last_logins`
--

CREATE TABLE `last_logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `login_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `last_logins`
--

INSERT INTO `last_logins` (`id`, `user_id`, `login_at`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-07-03 15:11:39', '2021-07-03 08:11:39', '2021-07-03 08:11:39'),
(2, 2, '2021-07-10 18:28:27', '2021-07-10 11:28:27', '2021-07-10 11:28:27'),
(3, 1, '2021-07-10 18:36:04', '2021-07-10 11:36:04', '2021-07-10 11:36:04'),
(4, 2, '2021-07-10 19:40:31', '2021-07-10 12:40:31', '2021-07-10 12:40:31'),
(5, 2, '2021-08-02 10:15:00', '2021-08-02 03:15:00', '2021-08-02 03:15:00'),
(6, 2, '2021-08-02 10:34:28', '2021-08-02 03:34:28', '2021-08-02 03:34:28'),
(7, 2, '2021-08-02 10:59:44', '2021-08-02 03:59:44', '2021-08-02 03:59:44'),
(8, 2, '2021-08-02 11:04:59', '2021-08-02 04:04:59', '2021-08-02 04:04:59'),
(9, 2, '2021-08-02 11:12:01', '2021-08-02 04:12:01', '2021-08-02 04:12:01'),
(10, 1, '2021-08-02 11:13:43', '2021-08-02 04:13:43', '2021-08-02 04:13:43'),
(11, 1, '2021-08-02 11:15:27', '2021-08-02 04:15:27', '2021-08-02 04:15:27');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` enum('Backend','Frontend') COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` enum('none','_blank') COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_group_id`, `type`, `title`, `url`, `icon`, `target`, `position`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Backend', 'Analytics Dashboard', '/administrator/dashboard', 'icon ni ni-growth', 'none', 1, 1, 1, '2021-07-03 07:55:30', '2021-07-03 07:55:30'),
(2, 2, 'Backend', 'Entry Penjualan', '/administrator/penjualan', 'icon ni ni-cart', 'none', 1, 1, 1, '2021-07-03 07:55:30', '2021-07-03 07:55:30'),
(3, 2, 'Backend', 'Daftar Penjualan', '/administrator/daftar-penjualan', 'icon ni ni-list', 'none', 2, 1, 1, '2021-07-03 07:55:30', '2021-07-03 07:55:30'),
(4, 2, 'Backend', 'Data Barang', '/administrator/barang', 'icon ni ni-briefcase', 'none', 3, 1, 1, '2021-07-03 07:55:30', '2021-07-03 07:55:30'),
(5, 2, 'Backend', 'User Manager', '#', 'icon ni ni-users', 'none', 4, 1, 1, '2021-07-03 07:55:30', '2021-07-03 07:55:30'),
(6, 2, 'Backend', 'Menu Manager', '#', 'icon ni ni-grid-alt', 'none', 5, 1, 1, '2021-07-03 07:55:30', '2021-07-03 07:55:30'),
(7, 2, 'Backend', 'Report', '#', 'icon ni ni-book', 'none', 6, 1, 1, '2021-07-03 07:55:30', '2021-07-03 07:55:30'),
(8, 3, 'Backend', 'Permissions', '/administrator/permissions', 'icon ni ni-security', 'none', 1, 1, 1, '2021-07-03 07:55:30', '2021-07-03 07:55:30'),
(9, 3, 'Backend', 'Setting', '/administrator/settings', 'icon ni ni-setting', 'none', 2, 1, 1, '2021-07-03 07:55:30', '2021-07-03 07:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `menu_groups`
--

CREATE TABLE `menu_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_groups`
--

INSERT INTO `menu_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Dashboards', '2021-07-03 07:55:30', NULL),
(2, 'Applications', '2021-07-03 07:55:30', NULL),
(3, 'Settings', '2021-07-03 07:55:30', NULL);

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_02_13_145255_create_settings_table', 1),
(4, '2021_05_03_124623_create_users_table', 1),
(5, '2021_05_03_124624_create_permission_tables', 1),
(6, '2021_05_09_113847_create_menu_groups_table', 1),
(7, '2021_05_09_113912_create_menus_table', 1),
(8, '2021_05_09_113935_create_submenus_table', 1),
(9, '2021_06_22_114058_create_barang_table', 1),
(10, '2021_06_22_114121_create_penjualan_table', 1),
(11, '2021_06_22_114141_create_penjualan_detail_table', 1),
(12, '2021_07_03_071355_create_last_logins_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 1);

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
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bayar` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kembali` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diskon` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `user_id`, `invoice`, `total`, `bayar`, `kembali`, `diskon`, `tgl`, `created_at`, `updated_at`) VALUES
(3, 2, 'INV-345324-14', '125000', '125000', '0', '0', '2021-07-01', '2021-07-02 17:00:00', NULL),
(4, 1, 'INV-20210703-0003', '465500', '465500', '0', '5', '2021-07-02', '2021-07-03 08:54:29', '2021-07-03 08:55:11'),
(5, 1, 'INV-20210703-0004', '480000', '500000', '20000', '0', '2021-07-03', '2021-07-03 09:05:57', '2021-07-03 09:06:11'),
(6, 1, 'INV-20210710-0001', '120000', '150000', '30000', '0', '2021-07-10', '2021-07-10 11:36:28', '2021-07-10 11:36:47'),
(7, 1, 'INV-20210710-0002', '255000', '300000', '45000', '0', '2021-07-10', '2021-07-10 11:39:08', '2021-07-10 11:39:50'),
(8, 2, 'INV-20210802-0001', '120000', '120000', '0', '0', '2021-08-02', '2021-08-02 03:38:51', '2021-08-02 03:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penjualan_id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id`, `penjualan_id`, `barang_id`, `qty`, `subtotal`, `created_at`, `updated_at`) VALUES
(3, 4, 2, 2, '240000', '2021-07-03 08:54:48', '2021-07-03 08:54:48'),
(4, 5, 2, 4, '480000', '2021-07-03 09:05:57', '2021-07-03 09:05:57'),
(5, 6, 2, 1, '120000', '2021-07-10 11:36:28', '2021-07-10 11:36:28'),
(6, 7, 3, 1, '5000', '2021-07-10 11:39:08', '2021-07-10 11:39:08'),
(9, 8, 2, 1, '120000', '2021-08-02 03:40:53', '2021-08-02 03:40:53');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'read-dashboard', 'web', 'Y', NULL, NULL),
(2, 'read-roles', 'web', 'Y', NULL, NULL),
(3, 'create-roles', 'web', 'Y', NULL, NULL),
(4, 'update-roles', 'web', 'Y', NULL, NULL),
(5, 'delete-roles', 'web', 'Y', NULL, NULL),
(6, 'read-permissions', 'web', 'Y', NULL, NULL),
(7, 'create-permissions', 'web', 'Y', NULL, NULL),
(8, 'update-permissions', 'web', 'Y', NULL, NULL),
(9, 'delete-permissions', 'web', 'Y', NULL, NULL),
(10, 'read-users', 'web', 'Y', NULL, NULL),
(11, 'create-users', 'web', 'Y', NULL, NULL),
(12, 'update-users', 'web', 'Y', NULL, NULL),
(13, 'delete-users', 'web', 'Y', NULL, NULL),
(14, 'read-menus', 'web', 'Y', NULL, NULL),
(15, 'create-menus', 'web', 'Y', NULL, NULL),
(16, 'update-menus', 'web', 'Y', NULL, NULL),
(17, 'delete-menus', 'web', 'Y', NULL, NULL),
(18, 'read-menu-groups', 'web', 'Y', NULL, NULL),
(19, 'create-menu-groups', 'web', 'Y', NULL, NULL),
(20, 'update-menu-groups', 'web', 'Y', NULL, NULL),
(21, 'delete-menu-groups', 'web', 'Y', NULL, NULL),
(22, 'read-sub-menus', 'web', 'Y', NULL, NULL),
(23, 'create-sub-menus', 'web', 'Y', NULL, NULL),
(24, 'update-sub-menus', 'web', 'Y', NULL, NULL),
(25, 'delete-sub-menus', 'web', 'Y', NULL, NULL),
(26, 'read-settings', 'web', 'Y', NULL, NULL),
(27, 'update-settings', 'web', 'Y', NULL, NULL),
(28, 'read-penjualan', 'web', 'Y', NULL, NULL),
(29, 'read-daftar-penjualan', 'web', 'Y', NULL, NULL),
(30, 'read-barang', 'web', 'Y', NULL, NULL),
(31, 'create-barang', 'web', 'Y', NULL, NULL),
(32, 'update-barang', 'web', 'Y', NULL, NULL),
(33, 'delete-barang', 'web', 'Y', NULL, NULL),
(34, 'read-report-penjualan', 'web', 'Y', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'Developer', 'web', 'Y', '2021-07-03 07:55:25', '2021-07-03 07:55:25'),
(2, 'Administrator', 'web', 'Y', '2021-07-03 07:55:25', '2021-07-03 07:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `groups` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `options` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `groups`, `options`, `value`, `is_default`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'General', 'web_name', 'PENJUALAN APP', 'Y', 1, 2, '2021-07-03 07:55:30', '2021-08-02 04:08:01'),
(2, 'General', 'web_url', 'http://127.0.0.1:8000', 'Y', 1, 1, '2021-07-03 07:55:30', '2021-07-03 07:55:30'),
(3, 'General', 'web_description', 'The Laravel Permission System is a system used to manage permissions in your application', 'Y', 1, 1, '2021-07-03 07:55:30', '2021-07-03 07:55:30'),
(4, 'General', 'web_keyword', 'Easily create permissions in your application with the Laravel Permission System', 'Y', 1, 1, '2021-07-03 07:55:30', '2021-07-03 07:55:30'),
(5, 'General', 'web_author', 'Web Media Solusi Digital', 'Y', 1, 1, '2021-07-03 07:55:30', '2021-07-03 07:55:30'),
(6, 'General', 'copyright', 'Web Media Solusi Digital', 'Y', 1, 1, '2021-07-03 07:55:30', '2021-07-03 07:55:30'),
(7, 'General', 'email', 'contact@webmediadigital.com', 'Y', 1, 1, '2021-07-03 07:55:30', '2021-07-03 07:55:30'),
(8, 'General', 'phone', '085642746374', 'Y', 1, 1, '2021-07-03 07:55:30', '2021-07-03 07:55:30'),
(9, 'General', 'address', 'Banyuwangi, Jawa Timur, Indonesia', 'Y', 1, 1, '2021-07-03 07:55:30', '2021-07-03 07:55:30'),
(10, 'General', 'facebook', 'https://www.facebook.com/webmedia', 'Y', 1, 1, '2021-07-03 07:55:30', '2021-07-03 07:55:30'),
(11, 'General', 'instagram', 'https://www.instagram.com/webmedia.id', 'Y', 1, 1, '2021-07-03 07:55:30', '2021-07-03 07:55:30'),
(12, 'General', 'youtube', 'https://www.youtube.com/c/WebMediaSolusiDigital', 'Y', 1, 1, '2021-07-03 07:55:30', '2021-07-03 07:55:30'),
(13, 'Image', 'favicon', 'favicon.png', 'Y', 1, 1, '2021-07-03 07:55:30', '2021-07-03 07:55:30'),
(14, 'Image', 'logo', 'logo.png', 'Y', 1, 1, '2021-07-03 07:55:30', '2021-07-03 07:55:30'),
(15, 'Config', 'maintenance_mode', 'N', 'Y', 1, 1, '2021-07-03 07:55:30', '2021-07-03 07:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `submenus`
--

CREATE TABLE `submenus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` enum('none','_blank') COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submenus`
--

INSERT INTO `submenus` (`id`, `menu_id`, `title`, `url`, `target`, `position`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 5, 'Users', '/administrator/users', 'none', 1, 1, 1, '2021-07-03 07:55:30', '2021-07-03 07:55:30'),
(2, 5, 'Roles', '/administrator/roles', 'none', 2, 1, 1, '2021-07-03 07:55:30', '2021-07-03 07:55:30'),
(3, 6, 'Menu', '/administrator/menus', 'none', 1, 1, 1, '2021-07-03 07:55:30', '2021-07-03 07:55:30'),
(4, 6, 'Sub Menu', '/administrator/sub-menus', 'none', 2, 1, 1, '2021-07-03 07:55:30', '2021-07-03 07:55:30'),
(5, 6, 'Menu Groups', '/administrator/menu-groups', 'none', 3, 1, 1, '2021-07-03 07:55:30', '2021-07-03 07:55:30'),
(6, 7, 'Report Penjualan', '/administrator/report-penjualan', 'none', 1, 1, 1, '2021-07-03 07:55:30', '2021-07-03 07:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `block` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user_pic.png',
  `phone_number` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `block`, `picture`, `phone_number`, `last_login`, `remember_token`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Mirza Saputra', 'mirza23', 'mirza@gmail.com', NULL, '$2y$10$o4oD4AmUoYrgdK9aYbU7iOGOnteu6GZbBvdFRmGYcT0sz7Q5U4mGe', 'N', 'user_pic.png', '085736274637', '2021-08-02 04:15:27', NULL, 1, 1, '2021-07-03 07:55:29', '2021-08-02 04:15:51'),
(2, 'root', 'root', 'root@gmail.com', NULL, '$2y$10$0kTGCQNyjYPejXkaf6tJWuM.3HuGzRO5.x/Vufa8mDsPLZJRJ04J6', 'N', 'user_pic.png', 'root', '2021-08-02 04:12:01', NULL, 1, 1, '2021-07-03 07:55:29', '2021-08-02 04:12:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barang_barcode_unique` (`barcode`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `last_logins`
--
ALTER TABLE `last_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `last_logins_user_id_foreign` (`user_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_menu_group_id_foreign` (`menu_group_id`);

--
-- Indexes for table `menu_groups`
--
ALTER TABLE `menu_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `penjualan_invoice_unique` (`invoice`),
  ADD KEY `penjualan_user_id_foreign` (`user_id`);

--
-- Indexes for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penjualan_detail_barang_id_foreign` (`barang_id`),
  ADD KEY `penjualan_detail_penjualan_id_foreign` (`penjualan_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submenus`
--
ALTER TABLE `submenus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submenus_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `last_logins`
--
ALTER TABLE `last_logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menu_groups`
--
ALTER TABLE `menu_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `submenus`
--
ALTER TABLE `submenus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `last_logins`
--
ALTER TABLE `last_logins`
  ADD CONSTRAINT `last_logins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_menu_group_id_foreign` FOREIGN KEY (`menu_group_id`) REFERENCES `menu_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD CONSTRAINT `penjualan_detail_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjualan_detail_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `submenus`
--
ALTER TABLE `submenus`
  ADD CONSTRAINT `submenus_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
