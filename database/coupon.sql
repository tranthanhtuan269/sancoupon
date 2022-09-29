-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for coupon
CREATE DATABASE IF NOT EXISTS `coupon` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `coupon`;

-- Dumping structure for table coupon.coupons
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table coupon.coupons: ~1 rows (approximately)
/*!40000 ALTER TABLE `coupons` DISABLE KEYS */;
INSERT INTO `coupons` (`id`, `product_id`, `coupon_code`, `detail`, `created_at`, `update_at`) VALUES
	(1, 1, 'mR3-1DB-oED-pKz', 'Làm móng tại LinhYun được giảm 20%', NULL, NULL),
	(2, 1, 'jJp-Po4-TI1-u2B', 'Học móng tại LinhYun được giảm 20%', NULL, NULL);
/*!40000 ALTER TABLE `coupons` ENABLE KEYS */;

-- Dumping structure for table coupon.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table coupon.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table coupon.histories
CREATE TABLE IF NOT EXISTS `histories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rolls` int(11) DEFAULT NULL,
  `coupon_id` int(11) DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table coupon.histories: ~0 rows (approximately)
/*!40000 ALTER TABLE `histories` DISABLE KEYS */;
INSERT INTO `histories` (`id`, `rolls`, `coupon_id`, `detail`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 7, NULL, 'Mất lượt', 1, '2022-09-29 04:28:04', '2022-09-29 04:28:04'),
	(2, 6, 1, 'Làm móng tại LinhYun được giảm 20%', 1, '2022-09-29 04:28:11', '2022-09-29 04:28:11'),
	(3, 5, 1, 'Làm móng tại LinhYun được giảm 20%', 1, '2022-09-29 04:30:21', '2022-09-29 04:30:21'),
	(4, 4, NULL, '1 coin', 1, '2022-09-29 04:34:51', '2022-09-29 04:34:51'),
	(5, 3, NULL, '3 coins', 1, '2022-09-29 04:36:37', '2022-09-29 04:36:37'),
	(6, 2, 2, 'Học móng tại LinhYun được giảm 20%', 1, '2022-09-29 04:36:45', '2022-09-29 04:36:45'),
	(7, 1, 1, 'Làm móng tại LinhYun được giảm 20%', 1, '2022-09-29 04:39:30', '2022-09-29 04:39:30'),
	(8, 0, NULL, 'Thêm 3 lượt', 1, '2022-09-29 04:39:49', '2022-09-29 04:39:49'),
	(9, 3, NULL, 'Thêm 3 lượt', 1, '2022-09-29 04:40:23', '2022-09-29 04:40:23'),
	(10, 6, NULL, '1 coin', 1, '2022-09-29 04:40:31', '2022-09-29 04:40:31'),
	(11, 5, NULL, '3 coins', 1, '2022-09-29 04:40:39', '2022-09-29 04:40:39'),
	(12, 4, 2, 'Học móng tại LinhYun được giảm 20%', 1, '2022-09-29 04:40:47', '2022-09-29 04:40:47'),
	(13, 3, NULL, 'Thêm 3 lượt', 1, '2022-09-29 04:41:17', '2022-09-29 04:41:17'),
	(14, 6, 1, 'Làm móng tại LinhYun được giảm 20%', 1, '2022-09-29 04:41:25', '2022-09-29 04:41:25'),
	(15, 5, NULL, '3 coins', 1, '2022-09-29 06:17:56', '2022-09-29 06:17:56'),
	(16, 4, NULL, 'Mất lượt', 1, '2022-09-29 06:22:32', '2022-09-29 06:22:32'),
	(17, 3, NULL, 'Mất lượt', 1, '2022-09-29 06:22:41', '2022-09-29 06:22:41'),
	(18, 2, NULL, 'Mất lượt', 1, '2022-09-29 06:22:48', '2022-09-29 06:22:48'),
	(19, 1, NULL, 'Thêm 3 lượt', 1, '2022-09-29 07:00:00', '2022-09-29 07:00:00'),
	(20, 4, 1, 'Làm móng tại LinhYun được giảm 20%', 1, '2022-09-29 07:00:10', '2022-09-29 07:00:10'),
	(21, 3, NULL, 'Thêm 3 lượt', 1, '2022-09-29 07:53:59', '2022-09-29 07:53:59'),
	(22, 6, NULL, '3 coins', 1, '2022-09-29 07:54:17', '2022-09-29 07:54:17'),
	(23, 5, 1, 'Làm móng tại LinhYun được giảm 20%', 1, '2022-09-29 07:56:48', '2022-09-29 07:56:48'),
	(24, 4, NULL, '1 coin', 1, '2022-09-29 07:57:09', '2022-09-29 07:57:09'),
	(25, 3, 1, 'Làm móng tại LinhYun được giảm 20%', 1, '2022-09-29 07:58:04', '2022-09-29 07:58:04'),
	(26, 2, NULL, 'Thêm 3 lượt', 1, '2022-09-29 07:58:15', '2022-09-29 07:58:15'),
	(27, 8, NULL, 'Mua thêm 3 lượt', 1, '2022-09-29 08:43:54', '2022-09-29 08:43:54'),
	(28, 11, NULL, 'Mua thêm 3 lượt', 1, '2022-09-29 08:44:09', '2022-09-29 08:44:09'),
	(29, 14, NULL, 'Mua thêm 3 lượt', 1, '2022-09-29 08:44:17', '2022-09-29 08:44:17'),
	(30, 17, NULL, 'Mua thêm 3 lượt', 1, '2022-09-29 08:44:40', '2022-09-29 08:44:40'),
	(31, 20, NULL, 'Mua thêm 3 lượt', 1, '2022-09-29 08:45:31', '2022-09-29 08:45:31'),
	(32, 23, NULL, 'Mua thêm 3 lượt', 1, '2022-09-29 08:46:35', '2022-09-29 08:46:35'),
	(33, 23, 2, 'Học móng tại LinhYun được giảm 20%', 1, '2022-09-29 08:50:40', '2022-09-29 08:50:40'),
	(34, 22, NULL, '1 coin', 1, '2022-09-29 08:51:14', '2022-09-29 08:51:14'),
	(35, 21, 1, 'Làm móng tại LinhYun được giảm 20%', 1, '2022-09-29 08:52:01', '2022-09-29 08:52:01'),
	(36, 20, NULL, 'Thêm 3 lượt', 1, '2022-09-29 08:52:20', '2022-09-29 08:52:20'),
	(37, 23, 2, 'Học móng tại LinhYun được giảm 20%', 1, '2022-09-29 08:53:15', '2022-09-29 08:53:15'),
	(38, 22, NULL, 'Mất lượt', 1, '2022-09-29 08:53:25', '2022-09-29 08:53:25'),
	(39, 24, NULL, 'Mua thêm 3 lượt', 1, '2022-09-29 08:53:43', '2022-09-29 08:53:43'),
	(40, 27, NULL, 'Mua thêm 3 lượt', 1, '2022-09-29 08:53:47', '2022-09-29 08:53:47'),
	(41, 27, NULL, 'Thêm 3 lượt', 1, '2022-09-29 08:53:57', '2022-09-29 08:53:57'),
	(42, 30, 2, 'Học móng tại LinhYun được giảm 20%', 1, '2022-09-29 08:56:58', '2022-09-29 08:56:58'),
	(43, 29, NULL, 'Thêm 3 lượt', 1, '2022-09-29 10:00:45', '2022-09-29 10:00:45'),
	(44, 32, 2, 'Học móng tại LinhYun được giảm 20%', 1, '2022-09-29 10:03:15', '2022-09-29 10:03:15'),
	(45, 31, NULL, 'Thêm 3 lượt', 1, '2022-09-29 10:03:24', '2022-09-29 10:03:24'),
	(46, 34, NULL, 'Mất lượt', 1, '2022-09-29 10:36:23', '2022-09-29 10:36:23');
/*!40000 ALTER TABLE `histories` ENABLE KEYS */;

-- Dumping structure for table coupon.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table coupon.migrations: ~4 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table coupon.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table coupon.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table coupon.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table coupon.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table coupon.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `real_price` int(11) DEFAULT NULL,
  `sale_price` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table coupon.products: ~0 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `detail`, `real_price`, `sale_price`, `created_at`, `updated_at`) VALUES
	(1, 'linhyun-sale', 'Làm móng', 100, 80, NULL, NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table coupon.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coins` int(11) NOT NULL DEFAULT '0',
  `rolls` int(11) NOT NULL DEFAULT '5',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table coupon.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `phone`, `coins`, `rolls`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Tuan', 'tuantt6393@gmail.com', '', 80, 33, NULL, '$2y$10$QHL7YrTwruVpz8jHnRMkFOE6eE.yO8GT0JVJNvl3Na0ID6sqgu06y', NULL, '2022-09-27 09:40:33', '2022-09-29 10:36:23');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
