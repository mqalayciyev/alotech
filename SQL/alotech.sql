-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 04 Şub 2022, 07:27:57
-- Sunucu sürümü: 8.0.27
-- PHP Sürümü: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `alotech`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `abouts`
--

DROP TABLE IF EXISTS `abouts`;
CREATE TABLE IF NOT EXISTS `abouts` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `about` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `abouts`
--

INSERT INTO `abouts` (`id`, `about`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '<h3>goycay-avm.az sayt olaraq həm blog, həm xidmət, həm maqazin kimi sizin xidmətinizdədir. Bu saytı yaratmaqda məqsədimiz sizə standart, orginal elektrik məhsulları haqqda geniş məlumat vermək və sizə sərfəli qiymətlərlə m&uuml;xtəlif &ouml;dəniş &uuml;sulları ilə elektrik məhsullarının &ccedil;atdırılmasını təşkil etməkdir.</h3>\r\n\r\n<p>Bizim vəzifəmiz yalnız d&uuml;zg&uuml;n məhsulu satmaq deyil, həm də alıcını məlumatlandırmaq və maarifləndirməkdir. &nbsp;Sizi maraqlandıran hər-hansı bir məhsul və ya xidmət olarsa, dərhal bizimlə əlaqə saxlayın.<br />\r\ntel:994508382300</p>', NULL, '2022-01-06 20:24:05', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `zip_code` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(60) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `activation_key` varchar(60) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_manage` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `mobile`, `password`, `address`, `city`, `state`, `country`, `zip_code`, `phone`, `activation_key`, `is_active`, `is_manage`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'Alotech', 'AZ', 'qalayciyev@gmail.com', '+994 ** *** ** **', '$2y$10$wUl0Jm29gfHjokZTSSFgCuRvHo03RD/qP.AV6CvSoRButm91dCaHy', 'Baku', 'Bakı', 'Bakı', 'Azərbaycan', NULL, '+994 ** *** ** **', NULL, 1, 1, 'rrN6PE0ugW0HFmiI0bFoLxcvHvZVqrm2Yq9ZFJ58x1yzcS1XOhua6gHAMCpK', '2021-07-01 19:37:26', '2022-01-20 10:08:52', NULL),
(8, 'Ariz', 'Alıyev', 'ariznd.info@gmail.com', '+994503952986', '$2y$10$8p3ZomY/dYT59EH8fm9DZekYqhZdNbYRZYPEe5J/3dev5bbHpyspu', 'Şəhriyar ev 8,m17', 'Göyçay', 'Bakı', 'Azərbaycan', 'AZ2300', '+994202744196', NULL, 1, 1, '01ILeCjM9cT8QpdA6Rcp7Ahmn59sEKTapKyAqOtfaBApJ5tpeTsSLCLCooMv', '2021-12-23 16:20:01', '2022-01-20 10:08:35', '2022-01-20 10:08:35');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `api_keys`
--

DROP TABLE IF EXISTS `api_keys`;
CREATE TABLE IF NOT EXISTS `api_keys` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `api_token` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `api_keys_api_token_unique` (`api_token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `banner_name` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `banner_image` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `banner_slug` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `banner_order` int NOT NULL,
  `banner_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_id` (`type`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `banners`
--

INSERT INTO `banners` (`id`, `type`, `banner_name`, `banner_image`, `banner_slug`, `banner_order`, `banner_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 'top', 'LOGITECH G29 Oyun sükanı', 'banner_1642851326.webp', 'https://alotech.az/', 1, 1, '2021-07-27 06:47:02', '2022-01-22 20:35:26', NULL),
(12, 'top', 'Car Holder Samsung Wıreless', 'banner_1642851381.webp', 'basic_markup/', 2, 1, '2021-08-15 04:14:07', '2022-01-22 20:36:21', NULL),
(13, 'center', NULL, 'banner_1642852196.webp', 'banner center', 3, 1, '2021-11-04 06:40:46', '2022-01-22 20:49:57', NULL),
(14, 'top', 'SONY KDL-32WD603SONY KDL-32WD603', 'banner_1642851614.webp', 'https://alotech.az/', 3, 1, '2021-11-04 06:47:41', '2022-01-22 20:40:14', NULL),
(15, 'bottom', NULL, 'banner_1636185632.webp', 'banner55', 5, 1, '2021-11-04 06:58:32', '2021-11-06 04:00:32', NULL),
(16, 'bottom', NULL, 'banner_1636185666.webp', 'banner55', 6, 1, '2021-11-04 06:58:47', '2021-11-06 04:01:06', NULL),
(17, 'bottom', NULL, 'banner_1636185682.webp', 'banner55', 7, 1, '2021-11-04 06:59:04', '2021-11-06 04:01:22', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `brand`
--

INSERT INTO `brand` (`id`, `name`, `slug`, `image`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Samsung', 'samsung', 'samsung_1642944188.webp', NULL, '2022-01-20 10:09:27', '2022-01-23 22:23:08', NULL),
(2, 'Huawei', 'huawei', 'huawei_1642943601.webp', NULL, '2022-01-20 10:09:35', '2022-01-23 22:13:21', NULL),
(3, 'Vivo', 'vivo', 'vivo_1642943617.webp', NULL, '2022-01-20 10:09:43', '2022-01-23 22:13:37', NULL),
(4, 'OPPO', 'oppo', 'oppo_1642943631.webp', NULL, '2022-01-20 10:09:50', '2022-01-23 22:13:51', NULL),
(5, 'Realme', 'realme', 'realme_1642943858.webp', NULL, '2022-01-20 10:09:57', '2022-01-23 22:17:38', NULL),
(6, 'Apple', 'apple', 'apple_1643112840.webp', NULL, '2022-01-20 10:10:04', '2022-01-25 21:14:00', NULL),
(7, 'Xiaomi', 'xiaomi', 'xiaomi_1642943889.webp', NULL, '2022-01-20 10:10:23', '2022-01-23 22:18:09', NULL),
(8, 'Sony', 'sony', 'sony_1642943934.webp', NULL, '2022-01-20 10:10:39', '2022-01-23 22:25:19', NULL),
(9, 'HP', 'hp', 'hp_1642943436.webp', NULL, '2022-01-20 10:11:21', '2022-01-23 22:10:36', NULL),
(10, 'Acer', 'acer', 'acer_1642943586.webp', NULL, '2022-01-20 10:11:28', '2022-01-23 22:13:06', NULL),
(11, 'Asus', 'asus', 'asus_1642943955.webp', NULL, '2022-01-20 10:11:33', '2022-01-23 22:19:16', NULL),
(12, 'Lenovo', 'lenovo', 'lenovo_1642943336.webp', NULL, '2022-01-20 10:11:43', '2022-01-23 22:25:02', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brand_product`
--

DROP TABLE IF EXISTS `brand_product`;
CREATE TABLE IF NOT EXISTS `brand_product` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `brand_product_brand_id_foreign` (`brand_id`),
  KEY `brand_product_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `brand_product`
--

INSERT INTO `brand_product` (`id`, `brand_id`, `product_id`) VALUES
(1, 10, 1),
(2, 12, 2),
(5, 1, 5),
(6, 12, 6),
(7, 12, 7),
(8, 9, 8),
(9, 10, 4),
(10, 10, 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '2022-01-21 09:20:15', '2022-01-21 09:20:15', NULL),
(2, 1, '2022-01-21 13:53:32', '2022-01-21 13:53:32', NULL),
(3, 2, '2022-01-23 05:42:44', '2022-01-23 05:42:44', NULL),
(4, 2, '2022-01-23 16:35:41', '2022-01-23 16:35:41', NULL),
(5, 2, '2022-01-23 23:26:56', '2022-01-23 23:26:56', NULL),
(6, 1, '2022-01-24 18:04:16', '2022-01-24 18:04:16', NULL),
(7, 1, '2022-01-24 18:06:21', '2022-01-24 18:06:21', NULL),
(8, 1, '2022-01-24 18:23:27', '2022-01-24 18:23:27', NULL),
(9, 1, '2022-01-24 19:24:04', '2022-01-24 19:24:04', NULL),
(10, 2, '2022-01-25 16:36:27', '2022-01-25 16:36:27', NULL),
(11, 1, '2022-01-26 14:04:25', '2022-01-26 14:04:25', NULL),
(12, 1, '2022-01-28 11:20:04', '2022-01-28 11:20:04', NULL),
(13, 1, '2022-01-29 09:11:09', '2022-01-29 09:11:09', NULL),
(14, 1, '2022-01-31 07:23:12', '2022-01-31 07:23:12', NULL),
(15, 7, '2022-02-01 10:24:25', '2022-02-01 10:24:25', NULL),
(16, 7, '2022-02-01 10:25:15', '2022-02-01 10:25:15', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cart_product`
--

DROP TABLE IF EXISTS `cart_product`;
CREATE TABLE IF NOT EXISTS `cart_product` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `cart_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `size_id` int UNSIGNED DEFAULT NULL,
  `color_id` int UNSIGNED DEFAULT NULL,
  `piece` int NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `sale_price` decimal(8,2) NOT NULL,
  `price_id` int NOT NULL,
  `cart_status` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_product_cart_id_foreign` (`cart_id`),
  KEY `cart_product_product_id_foreign` (`product_id`),
  KEY `cart_product_size_id_foreign` (`size_id`) USING BTREE,
  KEY `cart_product_color_id_foreign` (`color_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `cart_product`
--

INSERT INTO `cart_product` (`id`, `cart_id`, `product_id`, `size_id`, `color_id`, `piece`, `amount`, `sale_price`, `price_id`, `cart_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, NULL, 2, 1, '700.00', '0.00', 1, 'Pending', '2022-01-21 09:20:15', '2022-01-21 09:20:15', NULL),
(3, 3, 1, NULL, 1, 1, '700.00', '0.00', 1, 'Pending', '2022-01-23 05:43:28', '2022-01-23 05:43:28', NULL),
(4, 3, 3, NULL, 1, 2, '1200.00', '0.00', 3, 'Pending', '2022-01-23 05:43:38', '2022-01-23 05:44:24', NULL),
(5, 3, 3, 4, 7, 1, '1200.00', '0.00', 3, 'Pending', '2022-01-23 05:44:16', '2022-01-23 05:44:16', NULL),
(6, 4, 1, NULL, 2, 1, '700.00', '0.00', 1, 'Pending', '2022-01-23 21:59:32', '2022-01-23 21:59:32', NULL),
(8, 5, 2, 1, 2, 1, '999.99', '0.00', 10, 'Pending', '2022-01-24 04:23:02', '2022-01-24 04:23:02', NULL),
(9, 5, 4, 5, 2, 1, '389.00', '0.00', 7, 'Pending', '2022-01-24 04:23:04', '2022-01-24 04:23:04', NULL),
(11, 2, 4, 5, 2, 1, '389.00', '0.00', 7, 'Pending', '2022-01-24 16:05:15', '2022-01-24 17:50:15', NULL),
(13, 2, 2, 1, 2, 1, '999.99', '0.00', 10, 'Pending', '2022-01-24 17:50:25', '2022-01-24 17:53:36', NULL),
(14, 6, 3, 4, 7, 1, '1200.00', '0.00', 3, 'Pending', '2022-01-24 18:04:16', '2022-01-24 18:04:16', NULL),
(15, 6, 4, 5, 2, 1, '389.00', '0.00', 7, 'Pending', '2022-01-24 18:04:18', '2022-01-24 18:04:18', NULL),
(16, 6, 2, 1, 2, 1, '999.99', '0.00', 10, 'Pending', '2022-01-24 18:04:19', '2022-01-24 18:04:19', NULL),
(17, 7, 3, 4, 7, 1, '1200.00', '0.00', 3, 'Pending', '2022-01-24 18:06:21', '2022-01-24 18:06:21', NULL),
(18, 7, 2, 1, 2, 1, '999.99', '0.00', 10, 'Pending', '2022-01-24 18:06:23', '2022-01-24 18:06:23', NULL),
(19, 7, 4, 5, 2, 1, '389.00', '0.00', 7, 'Pending', '2022-01-24 18:07:29', '2022-01-24 18:07:29', NULL),
(20, 8, 3, 4, 7, 1, '1200.00', '0.00', 3, 'Pending', '2022-01-24 18:23:27', '2022-01-24 18:23:27', NULL),
(24, 9, 8, NULL, 2, 1, '1376.99', '0.00', 4, 'Pending', '2022-01-26 13:33:18', '2022-01-26 13:33:18', NULL),
(25, 9, 7, NULL, 2, 1, '1519.99', '0.00', 5, 'Pending', '2022-01-26 13:34:20', '2022-01-26 13:34:20', NULL),
(61, 13, 3, 4, 7, 1, '1200.00', '0.00', 3, 'Pending', '2022-01-29 13:21:54', '2022-01-29 13:59:15', NULL),
(62, 13, 8, NULL, 2, 1, '1376.99', '0.00', 4, 'Pending', '2022-01-29 13:21:54', '2022-01-29 13:21:54', NULL),
(63, 13, 1, NULL, 2, 1, '700.00', '0.00', 1, 'Pending', '2022-01-29 13:21:54', '2022-01-29 13:21:54', NULL),
(74, 15, 4, 5, 2, 1, '389.00', '0.00', 7, 'Pending', '2022-02-01 10:24:25', '2022-02-01 10:24:25', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `top_id` int DEFAULT NULL,
  `second_id` int DEFAULT NULL,
  `category_name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `category_image` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slug` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `category_view` int DEFAULT '0',
  `no_order_amount` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`id`, `top_id`, `second_id`, `category_name`, `category_image`, `slug`, `category_view`, `no_order_amount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, NULL, 'Telefonlar və qadcetlər', NULL, 'telefonlar-ve-qadcetler', 0, 0, '2022-01-20 10:12:10', '2022-01-20 10:12:10', NULL),
(2, 1, NULL, 'Smartfonlar, mobil telefonlar', NULL, 'telefonlar-ve-qadcetler-smartfonlar-mobi', 0, 0, '2022-01-20 10:12:28', '2022-01-20 10:12:28', NULL),
(3, 1, NULL, 'Planşetlər', NULL, 'telefonlar-ve-qadcetler-plansetler', 0, 0, '2022-01-20 10:12:40', '2022-01-20 10:12:40', NULL),
(4, 1, NULL, 'Aksesuarlar', NULL, 'telefonlar-ve-qadcetler-aksesuarlar', 0, 0, '2022-01-20 10:12:56', '2022-01-20 10:12:56', NULL),
(5, 1, 4, 'Adapterlər', NULL, 'telefonlar-ve-qadcetler-aksesuarlar-adap', 0, 0, '2022-01-20 10:13:20', '2022-01-20 10:13:20', NULL),
(6, 1, 4, 'Yaddaş kartı', NULL, 'telefonlar-ve-qadcetler-aksesuarlar-yadd', 0, 0, '2022-01-20 10:13:35', '2022-01-20 10:13:35', NULL),
(7, NULL, NULL, 'Noutbuklar və kompüterlər', NULL, 'noutbuklar-ve-komputerler', 1, 0, '2022-01-20 10:13:56', '2022-01-22 20:08:16', NULL),
(8, NULL, NULL, 'Böyük məişət texnikası', NULL, 'boyuk-meiset-texnikasi', 0, 0, '2022-01-20 10:14:05', '2022-01-20 10:14:05', NULL),
(9, NULL, NULL, 'Televizorlar, audio-video', NULL, 'televizorlar-audio-video', 0, 0, '2022-01-20 10:14:13', '2022-01-20 10:14:13', NULL),
(10, 9, NULL, 'Televizorlar', NULL, 'televizorlar-audio-video-televizorlar', 0, 0, '2022-01-20 10:16:47', '2022-01-20 10:16:47', NULL),
(11, 9, NULL, 'Ev kinoteatrları', NULL, 'televizorlar-audio-video-ev-kinoteatrlari', 0, 0, '2022-01-20 10:16:57', '2022-01-20 10:16:57', NULL),
(12, 9, NULL, 'Akustik sistemlər', NULL, 'televizorlar-audio-video-akustik-sistemler', 0, 0, '2022-01-20 10:17:07', '2022-01-20 10:17:07', NULL),
(13, 9, NULL, 'Aksesuarlar', NULL, 'televizorlar-audio-video-aksesuarlar', 0, 0, '2022-01-20 10:17:20', '2022-01-20 10:17:20', NULL),
(14, 9, 13, 'Elektrik uzadıcı', NULL, 'televizorlar-audio-video-aksesuarlar-elektrik-uzadici', 0, 0, '2022-01-20 10:17:30', '2022-01-20 10:17:30', NULL),
(15, 9, 13, 'TV tumbalar', NULL, 'televizorlar-audio-video-aksesuarlar-tv-tumbalar', 0, 0, '2022-01-20 10:17:42', '2022-01-20 10:17:42', NULL),
(16, 9, 13, 'Kronşteyn və divar asılqanları', NULL, 'televizorlar-audio-video-aksesuarlar-kronsteyn-ve-divar-asil', 0, 0, '2022-01-20 10:17:59', '2022-01-20 10:17:59', NULL),
(17, 7, NULL, 'Noutbuklar', NULL, 'noutbuklar-ve-komputerler-noutbuklar', 0, 0, '2022-01-20 10:18:09', '2022-01-20 10:18:09', NULL),
(18, 7, NULL, 'Monobloklar', NULL, 'noutbuklar-ve-komputerler-monobloklar', 0, 0, '2022-01-20 10:18:27', '2022-01-20 10:18:27', NULL),
(19, 7, NULL, 'Oyun kompüterləri Predator Thr', NULL, 'noutbuklar-ve-komputerler-oyun-komputerleri-predator-thronos', 0, 0, '2022-01-20 10:18:38', '2022-01-20 10:18:38', NULL),
(20, 7, NULL, 'Kompüterlər PC', NULL, 'noutbuklar-ve-komputerler-komputerler-pc', 0, 0, '2022-01-20 10:18:48', '2022-01-20 10:18:48', NULL),
(21, 7, NULL, 'Monitorlar', NULL, 'noutbuklar-ve-komputerler-monitorlar', 0, 0, '2022-01-20 10:19:04', '2022-01-20 10:19:04', NULL),
(22, 7, NULL, 'Printer və digər qurğular', NULL, 'noutbuklar-ve-komputerler-printer-ve-diger-qurgular', 0, 0, '2022-01-20 10:19:15', '2022-01-20 10:19:15', NULL),
(23, 7, 22, 'Kartriclər', NULL, 'noutbuklar-ve-komputerler-printer-ve-diger-qurgular-kartricl', 0, 0, '2022-01-20 10:19:27', '2022-01-20 10:19:27', NULL),
(24, 7, 22, 'Printerlər', NULL, 'noutbuklar-ve-komputerler-printer-ve-diger-qurgular-printerl', 0, 0, '2022-01-20 10:19:46', '2022-01-20 10:19:46', NULL),
(25, 7, NULL, 'Kompüter aksesuarları', NULL, 'noutbuklar-ve-komputerler-komputer-aksesuarlari', 0, 0, '2022-01-20 10:19:59', '2022-01-20 10:19:59', NULL),
(26, 7, 25, 'IP kameralar', NULL, 'noutbuklar-ve-komputerler-komputer-aksesuarlari-ip-kameralar', 0, 0, '2022-01-20 10:20:11', '2022-01-20 10:20:11', NULL),
(27, 7, 25, 'Klaviatura və kompüter siçanla', NULL, 'noutbuklar-ve-komputerler-komputer-aksesuarlari-klaviatura-v', 0, 0, '2022-01-20 10:20:31', '2022-01-20 10:20:31', NULL),
(28, 8, NULL, 'Soyuducular', NULL, 'boyuk-meiset-texnikasi-soyuducular', 0, 0, '2022-01-20 10:21:56', '2022-01-20 10:21:56', NULL),
(29, 8, NULL, 'Dondurucu kameralar', NULL, 'boyuk-meiset-texnikasi-dondurucu-kameralar', 0, 0, '2022-01-20 10:22:08', '2022-01-20 10:22:08', NULL),
(30, 8, NULL, 'Paltaryuyan maşınlar', NULL, 'boyuk-meiset-texnikasi-paltaryuyan-masinlar', 0, 0, '2022-01-20 10:22:18', '2022-01-20 10:22:18', NULL),
(31, 8, NULL, 'Quruducu maşınlar', NULL, 'boyuk-meiset-texnikasi-quruducu-masinlar', 0, 0, '2022-01-20 10:22:28', '2022-01-20 10:22:28', NULL),
(32, 8, NULL, 'Buxar dolabı', NULL, 'boyuk-meiset-texnikasi-buxar-dolabi', 0, 0, '2022-01-20 10:22:37', '2022-01-20 10:22:37', NULL),
(33, 8, NULL, 'Qabyuyan maşınlar', NULL, 'boyuk-meiset-texnikasi-qabyuyan-masinlar', 0, 0, '2022-01-20 10:22:46', '2022-01-20 10:22:46', NULL),
(34, 8, NULL, 'Aspiratorlar', NULL, 'boyuk-meiset-texnikasi-aspiratorlar', 0, 0, '2022-01-20 10:22:58', '2022-01-20 10:22:58', NULL),
(35, 8, NULL, 'Bişirmə panelləri', NULL, 'boyuk-meiset-texnikasi-bisirme-panelleri', 0, 0, '2022-01-20 10:23:10', '2022-01-20 10:23:10', NULL),
(36, 8, NULL, 'Sobalar', NULL, 'boyuk-meiset-texnikasi-sobalar', 0, 0, '2022-01-20 10:23:22', '2022-01-20 10:23:22', NULL),
(37, 8, NULL, 'Plitələr', NULL, 'boyuk-meiset-texnikasi-pliteler', 0, 0, '2022-01-20 10:23:34', '2022-01-20 10:23:34', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category_product`
--

DROP TABLE IF EXISTS `category_product`;
CREATE TABLE IF NOT EXISTS `category_product` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_product_category_id_foreign` (`category_id`),
  KEY `category_product_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `category_product`
--

INSERT INTO `category_product` (`id`, `category_id`, `product_id`) VALUES
(1, 17, 1),
(2, 17, 2),
(3, 17, 3),
(5, 2, 5),
(6, 3, 6),
(7, 18, 7),
(8, 20, 8),
(9, 17, 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `delivery_days` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `delivery_amount` decimal(8,2) DEFAULT NULL,
  `delivery_time` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `city`
--

INSERT INTO `city` (`id`, `name`, `delivery_days`, `delivery_amount`, `delivery_time`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Baki', '3-5', NULL, '[{\"end\": \"13:20\", \"start\": \"13:00\"}, {\"end\": \"14:20\", \"start\": \"14:00\"}, {\"end\": \"15:20\", \"start\": \"15:00\"}, {\"end\": \"16:20\", \"start\": \"16:00\"}]', '2022-01-20 13:11:34', '2022-01-21 12:13:01', NULL),
(2, 'Gence', '3-6', '10.00', '[{\"end\": \"12:40\", \"start\": \"12:00\"}, {\"end\": \"13:40\", \"start\": \"13:00\"}, {\"end\": \"14:40\", \"start\": \"14:00\"}]', '2022-01-20 13:29:28', '2022-01-21 12:22:07', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `color`
--

DROP TABLE IF EXISTS `color`;
CREATE TABLE IF NOT EXISTS `color` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `color`
--

INSERT INTO `color` (`id`, `title`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'none', 'none', '2022-01-20 10:37:11', '2022-01-20 10:37:11', NULL),
(2, 'Qara', '#000000', '2022-01-20 10:38:15', '2022-01-20 10:38:15', NULL),
(3, 'Ag', '#ffffff', '2022-01-20 10:38:23', '2022-01-20 10:38:23', NULL),
(4, 'Qirmizi', '#ff0000', '2022-01-20 10:38:34', '2022-01-20 10:38:34', NULL),
(5, 'Sari', '#fff700', '2022-01-20 10:38:44', '2022-01-20 10:38:44', NULL),
(6, 'Yasil', '#11ff00', '2022-01-20 10:38:53', '2022-01-20 10:38:53', NULL),
(7, 'Boz', '#b0b0b0', '2022-01-20 10:39:13', '2022-01-20 10:39:13', NULL),
(8, 'Goy', '#002aff', '2022-01-20 10:39:42', '2022-01-20 10:39:42', NULL),
(9, 'Cehrayi', '#fab8ff', '2022-01-22 20:20:29', '2022-01-22 20:20:29', NULL),
(10, 'Mavi', '#00e1ff', '2022-01-22 20:20:40', '2022-01-22 20:20:40', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `color_product`
--

DROP TABLE IF EXISTS `color_product`;
CREATE TABLE IF NOT EXISTS `color_product` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `color_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `color_product_color_id_foreign` (`color_id`),
  KEY `color_product_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `color_product`
--

INSERT INTO `color_product` (`id`, `color_id`, `product_id`) VALUES
(3, 2, 2),
(4, 3, 2),
(5, 7, 2),
(6, 2, 1),
(7, 3, 1),
(10, 2, 5),
(11, 9, 5),
(12, 10, 5),
(13, 2, 6),
(14, 2, 7),
(15, 2, 8),
(18, 1, 4),
(20, 5, 8),
(21, 4, 3),
(22, 7, 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `order` int NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `companies`
--

INSERT INTO `companies` (`id`, `image`, `slug`, `order`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'company_1643627014.webp', 'http://127.0.0.1:8000/product/noutbuk-lenovo-l3-15iml05-grey-81y300pqrk-n', 1, 1, '2022-01-31 10:06:42', '2022-01-31 11:03:35', NULL),
(2, 'company_1643627040.webp', 'noutbuk-acer-a315-57g-nxhzrer005-n', 2, 1, '2022-01-31 11:04:00', '2022-01-31 11:04:00', NULL),
(3, 'company_1643627061.webp', 'noutbuk-acer-a315-57g-nxhzrer005-n', 3, 1, '2022-01-31 11:04:21', '2022-01-31 11:04:21', NULL),
(4, 'company_1643627085.webp', 'noutbuk-acer-a315-57g-nxhzrer005-n', 4, 1, '2022-01-31 11:04:45', '2022-01-31 11:04:45', NULL),
(5, 'company_1643627112.webp', 'noutbuk-acer-a315-57g-nxhzrer005-n', 5, 1, '2022-01-31 11:05:12', '2022-01-31 11:05:12', NULL),
(6, 'company_1643627143.webp', 'noutbuk-acer-a315-57g-nxhzrer005-n', 6, 1, '2022-01-31 11:05:43', '2022-01-31 11:05:43', NULL),
(7, 'company_1643627167.webp', 'noutbuk-acer-a315-57g-nxhzrer005-n', 7, 1, '2022-01-31 11:06:07', '2022-01-31 11:06:07', NULL),
(8, 'company_1643627431.webp', 'noutbuk-acer-a315-57g-nxhzrer005-n', 8, 1, '2022-01-31 11:10:31', '2022-01-31 11:10:31', NULL),
(9, 'company_1643627468.webp', 'noutbuk-acer-a315-57g-nxhzrer005-n', 9, 1, '2022-01-31 11:11:08', '2022-01-31 11:11:08', NULL),
(10, 'company_1643627490.webp', 'noutbuk-acer-a315-57g-nxhzrer005-n', 10, 1, '2022-01-31 11:11:30', '2022-01-31 11:11:30', NULL),
(11, 'company_1643627511.webp', 'noutbuk-acer-a315-57g-nxhzrer005-n', 11, 1, '2022-01-31 11:11:51', '2022-01-31 11:11:51', NULL),
(12, 'company_1643627528.webp', 'noutbuk-acer-a315-57g-nxhzrer005-n', 12, 1, '2022-01-31 11:12:08', '2022-01-31 11:12:08', NULL),
(13, 'company_1643627609.webp', 'noutbuk-acer-a315-57g-nxhzrer005-n', 13, 1, '2022-01-31 11:13:29', '2022-01-31 11:13:29', NULL),
(14, 'company_1643627729.webp', 'noutbuk-acer-a315-57g-nxhzrer005-n', 14, 1, '2022-01-31 11:15:29', '2022-01-31 11:15:29', NULL),
(15, 'company_1643629584.webp', 'noutbuk-acer-a315-57g-nxhzrer005-n', 15, 1, '2022-01-31 11:46:24', '2022-01-31 11:46:24', NULL),
(16, 'company_1643629704.webp', 'noutbuk-acer-a315-57g-nxhzrer005-n', 16, 1, '2022-01-31 11:48:24', '2022-01-31 11:48:24', NULL),
(17, 'company_1643629718.webp', 'noutbuk-acer-a315-57g-nxhzrer005-n', 17, 1, '2022-01-31 11:48:38', '2022-01-31 11:48:38', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `feedback` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int UNSIGNED NOT NULL,
  `cart_id` int UNSIGNED DEFAULT NULL,
  `discount` decimal(8,2) NOT NULL,
  `count` tinyint NOT NULL,
  PRIMARY KEY (`id`),
  KEY `coupons_product_id_foreign` (`product_id`),
  KEY `coupons_cart_id_foreign` (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `connection` text COLLATE utf8mb4_general_ci NOT NULL,
  `queue` text COLLATE utf8mb4_general_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `infos`
--

DROP TABLE IF EXISTS `infos`;
CREATE TABLE IF NOT EXISTS `infos` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `logo` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `favicon` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `keywords` text COLLATE utf8mb4_general_ci,
  `phone` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_general_ci,
  `facebook` text COLLATE utf8mb4_general_ci,
  `instagram` text COLLATE utf8mb4_general_ci,
  `twitter` text COLLATE utf8mb4_general_ci,
  `youtube` text COLLATE utf8mb4_general_ci,
  `pinterest` text COLLATE utf8mb4_general_ci,
  `payment_door` text COLLATE utf8mb4_general_ci,
  `delivery` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `standart_delivery_amount` decimal(8,2) NOT NULL,
  `fast_delivery_amount` decimal(8,2) NOT NULL,
  `min_order_amount` decimal(8,2) DEFAULT NULL,
  `bonus_amount` decimal(8,2) DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `infos`
--

INSERT INTO `infos` (`id`, `logo`, `favicon`, `title`, `description`, `keywords`, `phone`, `mobile`, `email`, `address`, `facebook`, `instagram`, `twitter`, `youtube`, `pinterest`, `payment_door`, `delivery`, `standart_delivery_amount`, `fast_delivery_amount`, `min_order_amount`, `bonus_amount`) VALUES
(1, 'logo.png', 'favicon.jpg', 'Alotech', 'Alotech', '#alotech', '+994 ** *** ** **', '+994 ** *** ** **', 'info@alotech.az', 'Online Store', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.twitter.com/', 'https://www.youtube.com/', 'https://www.pinterest.com/', 'Məhsul sifariş verdiyiniz andan 1-2 saat ərzində müştəriyə təhvil verilir.', 'Göyçay şəhəri üzrə çatdırılma 2azn təşkil edir.', '0.00', '2.00', '40.00', '0.20');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(16, '2018_03_22_101115_create_category_table', 1),
(17, '2018_03_22_130714_create_product_table', 1),
(18, '2018_03_22_165805_create_category_product_table', 1),
(19, '2018_03_23_063758_create_product_detail_table', 1),
(20, '2018_03_24_131540_create_user_table', 1),
(21, '2018_03_27_063926_create_cart_table', 1),
(22, '2018_03_27_064601_create_cart_product_table', 1),
(23, '2018_03_28_085845_create_order_table', 1),
(24, '2018_03_28_085948_create_user_detail_table', 1),
(25, '2018_03_28_090033_create_product_image_table', 1),
(26, '2018_04_12_214139_create_brand_table', 1),
(27, '2018_04_16_164623_create_supplier_table', 1),
(28, '2018_04_17_185615_create_supplier_product_table', 1),
(29, '2018_04_18_114617_create_tag_table', 1),
(30, '2018_04_18_130456_create_tag_product_table', 1),
(31, '2018_04_23_210853_create_brand_product_table', 2),
(32, '2018_04_24_105708_create_admin_table', 3),
(33, '2018_04_26_151002_create_customer_table', 4),
(34, '2018_05_10_180233_create_rating_table', 5),
(41, '2021_02_25_130226_create_wish_list_table', 6),
(42, '2021_03_02_115938_create_sliders_table', 6),
(43, '2021_03_02_130744_create_banners_table', 6),
(45, '2021_03_02_153617_create_reviews_table', 7),
(46, '2014_10_12_100000_create_password_resets_table', 8),
(47, '2021_03_05_102826_create_password_resets_table', 9),
(48, '2021_03_05_152015_create_sites_table', 10),
(49, '2021_03_11_110043_create_infos_table', 11),
(50, '2021_03_11_203949_create_abouts_table', 12),
(51, '2021_03_11_204324_create_shipping_returns_table', 12),
(53, '2021_03_12_111533_create_contacts_table', 13),
(55, '2021_07_30_151412_create_category_images_table', 14),
(56, '2021_08_02_145428_create_services_table', 15),
(57, '2021_08_02_145733_create_blogs_table', 15),
(59, '2019_08_19_000000_create_failed_jobs_table', 16),
(60, '2019_12_14_000001_create_personal_access_tokens_table', 16),
(67, '2016_06_01_000001_create_oauth_auth_codes_table', 17),
(68, '2016_06_01_000002_create_oauth_access_tokens_table', 17),
(69, '2016_06_01_000003_create_oauth_refresh_tokens_table', 17),
(70, '2016_06_01_000004_create_oauth_clients_table', 17),
(71, '2016_06_01_000005_create_oauth_personal_access_clients_table', 17),
(73, '2021_11_16_120506_create_api_keys_table', 18),
(75, '2021_11_17_124755_create_logs_table', 19),
(77, '2022_01_13_144605_create_depots_table', 20),
(78, '2022_01_26_125607_create_terms_table', 21),
(79, '2022_01_26_132716_create_privacies_table', 21),
(82, '2022_01_27_125458_create_product_related_table', 22),
(83, '2022_01_27_130044_create_product_companies_table', 23),
(85, '2022_01_29_143947_create_coupons_table', 24),
(86, '2022_02_01_160258_create_order_returns_table', 25);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_general_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_general_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_general_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Göyçay AVM Personal Access Client', 'AC8xvd7Jl2XPUAFAubb6AFmurDvt9MhA4THBxV5I', NULL, 'http://localhost', 1, 0, 0, '2021-11-16 08:03:20', '2021-11-16 08:03:20'),
(2, NULL, 'Göyçay AVM Password Grant Client', 'cZHSr49tP4YnVBplH6q6wncADAtG1AmBuYwFx7Bb', 'users', 'http://localhost', 0, 1, 0, '2021-11-16 08:03:20', '2021-11-16 08:03:20'),
(3, NULL, 'Alotech Personal Access Client', 'KRj5XFutGn6iXeW8Sq96zSsQqI7tdwaO67qp4Nkd', NULL, 'http://localhost', 1, 0, 0, '2022-01-26 09:36:52', '2022-01-26 09:36:52'),
(4, NULL, 'Alotech Password Grant Client', 'lJKgYOSOdqklOAJvlz3d5H340bMeyGk06Ye5Xrwn', 'users', 'http://localhost', 0, 1, 0, '2022-01-26 09:36:52', '2022-01-26 09:36:52');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-11-16 08:03:20', '2021-11-16 08:03:20'),
(2, 3, '2022-01-26 09:36:52', '2022-01-26 09:36:52');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `cart_id` int UNSIGNED NOT NULL,
  `order_amount` decimal(15,2) NOT NULL,
  `bonus_amount` decimal(8,2) DEFAULT NULL,
  `bonus_value` decimal(8,0) DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` int UNSIGNED DEFAULT NULL,
  `country` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `zip_code` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bank` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `card` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tran_date_time` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `order_status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `brand` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `installment_number` int DEFAULT NULL,
  `shipping` decimal(7,2) NOT NULL DEFAULT '0.00',
  `delivery_day` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `delivery_time` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `call_me` int DEFAULT '0',
  `exported` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_cart_id_unique` (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `order`
--

INSERT INTO `order` (`id`, `cart_id`, `order_amount`, `bonus_amount`, `bonus_value`, `status`, `first_name`, `last_name`, `email`, `address`, `phone`, `mobile`, `city`, `country`, `zip_code`, `bank`, `card`, `tran_date_time`, `order_status`, `brand`, `installment_number`, `shipping`, `delivery_day`, `delivery_time`, `call_me`, `exported`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 9, '2906.98', '0.00', NULL, 'Your order has been received', 'Məhəmməd', 'Qalayçiyev', 'qalayciyev@gmail.com', 'Baki Umid Ekberov 86', '+994514598208', '+994514598208', 2, '', 'AZ1138', 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, '10.00', '29-01-2022', '14:00-14:40', 1, 0, '2022-01-26 13:37:22', '2022-01-26 13:37:22', NULL),
(10, 15, '389.00', NULL, NULL, 'Your order has been received', 'Mehemmed', 'Qalayciyev', 'mqalayciyev@mail.ru', 'Baku Umid Ekberov 86', '+994514598208', '+994514598208', 1, '', 'AZ1138', 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, '0.00', '04-02-2022', '15:00-15:20', 1, 0, '2022-02-01 10:24:25', '2022-02-01 10:24:25', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order_returns`
--

DROP TABLE IF EXISTS `order_returns`;
CREATE TABLE IF NOT EXISTS `order_returns` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_returns_order_id_foreign` (`order_id`),
  KEY `order_returns_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `order_returns`
--

INSERT INTO `order_returns` (`id`, `order_id`, `user_id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, 1, 'Zehmet olmasa sifarisimi legv ederdiniz. TEST', 0, '2022-02-01 13:25:07', '2022-02-01 13:25:07');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(24, 'familqasimov@gmail.com', '$2y$10$EmYMiSuu753umkb1a6ZiwuzIIN1BLsjGzh36/rvY3CAI4CeEUNapO', '2021-12-16 16:36:22', NULL, NULL),
(30, 'familqasimov@gmail.com', 'Y3tMRoqx5hM2xo3w7AGBc8aoYvMUKRhiOi2hkOUOmAoQkDwXQ4xxRjTEDyG3', '2022-01-01 16:29:49', '2022-01-01 16:31:15', '2022-01-01 16:31:15'),
(29, 'familqasimov@gmail.com', 'V6Mq5yo1jqwogsLlrSRBp679YCOC6w8RUnSBuvvvNncXicxZdxpmd9itRIb6', '2021-12-25 00:03:31', '2021-12-25 00:04:19', '2021-12-25 00:04:19'),
(28, 'qalayciyev@gmail.com', 'zgcCzqZhZNBpMIAcgXgDaxHPLyBRT2SPPOsZGqxK1S1WPItvjnTcEnyI0efe', '2021-12-17 16:35:31', '2021-12-17 16:35:57', '2021-12-17 16:35:57'),
(31, 'mqalayciyev@mail.ru', 'IPmqlGUXlhC4sK1BJM1chytCpG8WrgKuDGLpRzEnlvTQ6E2g2QhJrVF9Madn', '2022-02-01 09:51:23', NULL, NULL),
(32, 'mqalayciyev@mail.ru', 'CzLUuhgleyFJmvR1fA5z6lzfO4m41AEoISzvBWkMQbvsWncyYTGhnAblGRcM', '2022-02-01 12:49:34', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `price_list`
--

DROP TABLE IF EXISTS `price_list`;
CREATE TABLE IF NOT EXISTS `price_list` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int UNSIGNED NOT NULL,
  `sale_price` decimal(8,2) DEFAULT NULL,
  `stock_piece` decimal(8,2) DEFAULT NULL,
  `wholesale_count` decimal(8,2) DEFAULT NULL,
  `wholesale_price` decimal(8,2) DEFAULT NULL,
  `color_id` int UNSIGNED DEFAULT NULL,
  `size_id` int UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `color` (`color_id`),
  KEY `price_list_product_id` (`product_id`) USING BTREE,
  KEY `price_list_size_id` (`size_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `price_list`
--

INSERT INTO `price_list` (`id`, `product_id`, `sale_price`, `stock_piece`, `wholesale_count`, `wholesale_price`, `color_id`, `size_id`) VALUES
(1, 1, '700.00', '10.00', '5.00', '650.00', 2, NULL),
(2, 1, '750.00', '10.00', NULL, NULL, 3, NULL),
(4, 8, '1100.00', '14.00', NULL, NULL, 2, NULL),
(5, 7, '1600.00', '14.00', NULL, NULL, 2, NULL),
(7, 4, '389.00', '2.00', '5.00', '350.00', 2, 5),
(8, 4, '440.00', '5.00', '5.00', '400.00', 2, 6),
(9, 4, '360.00', '5.00', '5.00', '330.00', 10, 5),
(10, 2, '1000.00', '18.00', NULL, NULL, 2, 1),
(11, 6, '1000.00', '0.00', NULL, NULL, 2, NULL),
(12, 8, '1200.00', '15.00', NULL, NULL, 5, NULL),
(13, 3, '1200.00', '7.00', NULL, NULL, 7, NULL),
(14, 3, '1250.00', '15.00', NULL, NULL, 4, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `privacies`
--

DROP TABLE IF EXISTS `privacies`;
CREATE TABLE IF NOT EXISTS `privacies` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `privacy` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `privacies`
--

INSERT INTO `privacies` (`id`, `privacy`, `created_at`, `updated_at`) VALUES
(1, '<h1>Alotech məxfilik siyasəti.</h1><p><strong>Bizim saytın izlədiyi/topladığı məlumat</strong><br>1. Saytın optimallaşdırılması, sayta daxil olan istifadəçilərlə operativ əks əlaqə yaratmaq, faydalı məlumatların verilməsi və statistikanın toplanması məqsədi ilə, bizim veb-xidmətlər sizin kompüterin (qurğuların) internetə qoşulması, eləcə də daxil olma zamanı IP ünvan və cookie faylları haqda avtomatik olaraq məhdud məlumatları toplayır. Toplanan fayllar bizə, daxil olanların şəxsi məlumatları deyil, məhz kompüterin (qurğu) ID ünvanını bildirərək, Sizin hansı səhifələrə daxil olduğunuz haqqında məlumat verir.<br><br>&nbsp;</p><p>2. Qəsdən şəxsi identifikasiya olmadığı təqdirdə, (məsələn, qeydiyyat vasitəsilə) hətta sizin kompüterin cookies fayllarının istifadəsi zamanı belə, şəxsiyyətinizin müəyyənləşdirilməsi mümkün deyil. Cokkies fayllarında saxlanılan şəxsi məlumatlar – sizin təqdim etdiyiniz məlumatlardır. Bizim cookie faylları sizin şəxsi cihazdan məlumatları oxuya bilməz.<br><br>&nbsp;</p><p>3. Saytın müəyyən funskiyalarından istifadə etmək üçün (məsələn, malən onlayn sifarişi və ödənişi)istifadəçilər qeydiyyatdan keçməli və eyni zamanda müəyyən məlumatları təqdim etməlidirlər (məsələn, biz ad, elektron poçt ünvanı, telefon nömrəsi, şəhər və poçt indeksi tələb edə bilərik).<br><br>&nbsp;</p><p>4. Sizin təqdim etdiyiniz məlumatlar daha şəxsləndirilmiş məlumatların verilməsində yardımcı ola bilər, saytı sizin maraqlarınıza uyğunlaşdıra və onu daha da dolğun edə bilər. Anonimliyi saxlamaq fikrinə düşsəniz, saytda olan bütün məlumatları qeydiyyatsız əldə edə bilərsiniz.<br><br>&nbsp;</p><p><strong>Təhlükəsizlik</strong><br>Bu sayt məlumat itkisi, məlumatın yalnış və qeyri-qanuni istifadə edilməsi və ya dəyişilməsinin qarşısının alınması üçün çoxsaylı təhlükəsizlik tədbirlərindən istifadə edir. Hazırki tədbirlər şifrənin istifadə olunmasını, təhlükəsizlik serverləri ilə əlaqəni, məlumatların şifrlənməsini, ehtiyat surət çıxarılmasını, nəhayət bloklanma və xəbərdarlıq sistemini özündə cəmləyir.<br><br>&nbsp;</p><p><strong>Dəyişiklik və yeniləşmə</strong><br>Biz məxfilik siyasətini dəyişmək hüququnu özümüzdə saxlayırıq. Məxfilik Siyasətində hər-hansı dəyişiklik saytda yerləşdiriləcək.</p>', '2022-01-26 09:37:06', '2022-01-26 09:38:16');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_code` int NOT NULL,
  `sku` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slug` varchar(160) COLLATE utf8mb4_general_ci NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `product_description` text COLLATE utf8mb4_general_ci,
  `meta_title` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `meta_description` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `stok_piece` int NOT NULL,
  `supply_price` decimal(6,2) DEFAULT NULL,
  `markup` decimal(6,2) DEFAULT NULL,
  `discount` int DEFAULT NULL,
  `discount_date` timestamp NULL DEFAULT NULL,
  `one_or_more` int DEFAULT NULL,
  `other_count` int DEFAULT NULL,
  `other_bonus` int DEFAULT NULL,
  `bonus_comment` int DEFAULT NULL,
  `wish_list` tinyint(1) DEFAULT '0',
  `best_selling` int NOT NULL DEFAULT '0',
  `order_arrival` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code_unique` (`product_code`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `product`
--

INSERT INTO `product` (`id`, `product_code`, `sku`, `slug`, `product_name`, `product_description`, `meta_title`, `meta_description`, `stok_piece`, `supply_price`, `markup`, `discount`, `discount_date`, `one_or_more`, `other_count`, `other_bonus`, `bonus_comment`, `wish_list`, `best_selling`, `order_arrival`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3021, 'TFDTDDSF-545', 'noutbuk-acer-a315-57g-nxhzrer005-n', 'Noutbuk Acer A315-57G (NX.HZRER.005-N)', '<p>Noutbuk Acer A315-57G (NX.HZRER.005-N)</p>', 'Noutbuk Acer A315-57G (NX.HZRER.005-N)', 'Noutbuk Acer A315-57G (NX.HZRER.005-N)', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3, NULL, '2022-01-20 10:37:11', '2022-01-23 22:00:29', NULL),
(2, 2083, 'TFDTDDSF-545', 'noutbuk-lenovo-l3-15iml05-grey-81y300pqrk-n', 'Noutbuk Lenovo L3 15IML05 Grey (81Y300PQRK-N)', '<p><a href=\"https://www.bakuelectronics.az/catalog/noutbuklar-komputerler/noutbuklar/noutbuk-lenovo-l3-15iml05-grey-81y300pqrk-n.html\">Noutbuk Lenovo L3 15IML05 Grey (81Y300PQRK-N)</a></p>', 'Noutbuk Lenovo L3 15IML05 Grey (81Y300PQRK-N)', 'Noutbuk Lenovo L3 15IML05 Grey (81Y300PQRK-N)', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 4, '2022-01-29 19:48:00', '2022-01-20 10:37:55', '2022-02-02 07:08:56', NULL),
(3, 15582, 'TFDTDDSF-545', 'noutbuk-lenovo-ideapad-3-15itl6-82h800nwrk-n', 'Noutbuk Lenovo Ideapad 3 15ITL6 (82H800NWRK-N)', '<h2>Noutbuk Lenovo Ideapad 3 15ITL6 (82H800NWRK-N)</h2>', 'Noutbuk, Lenovo, Ideapad', 'Noutbuk Lenovo Ideapad 3 15ITL6 (82H800NWRK-N)', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 5, NULL, '2022-01-22 08:32:24', '2022-01-31 10:50:00', NULL),
(4, 14179, 'TFDTDDSF-545', 'samsung-galaxy-a22-5g-sm-a226', 'Samsung Galaxy A22 5G (SM-A226)', '<p>Noutbuk Acer A315-57G (NX.HZRER.005-N)</p>', 'Samsung Galaxy A22 5G (SM-A226)', 'Samsung Galaxy A22 5G (SM-A226)', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 7, NULL, '2022-01-22 20:10:48', '2022-01-28 06:50:34', NULL),
(5, 18155, 'TFDTDDSF-545', 'samsung-galaxy-a32-64gb-sm-a325', 'Samsung Galaxy A32 64GB (SM-A325)', '<h1><strong>Samsung Galaxy A32 64GB (SM-A325)</strong></h1>', 'Samsung Galaxy A32 64GB (SM-A325)', 'Samsung Galaxy A32 64GB (SM-A325)', 0, NULL, NULL, 15, '2022-01-23 20:21:00', NULL, NULL, NULL, NULL, 0, 0, NULL, '2022-01-22 20:21:41', '2022-01-22 20:24:13', NULL),
(6, 18434, 'TFDTDDSF-545', 'lenovo-tab-m7-tb-7306x-za8d0057ru', 'Lenovo Tab M7 TB-7306X (ZA8D0057RU)', '<h1><strong>Lenovo Tab M7 TB-7306X (ZA8D0057RU)</strong></h1>', 'Lenovo Tab M7 TB-7306X (ZA8D0057RU)', 'Lenovo Tab M7 TB-7306X (ZA8D0057RU)', 0, NULL, NULL, 5, '2022-01-29 20:25:00', NULL, NULL, NULL, NULL, 0, 0, '2022-01-25 23:02:00', '2022-01-22 20:25:52', '2022-01-25 16:35:40', NULL),
(7, 21087, 'TFDTDDSF-545', 'lenovo-ic-aio-3-24imb05-f0eu00mnrk', 'Lenovo IC AIO 3 24IMB05 (F0EU00MNRK)', '<h1><strong>Lenovo IC AIO 3 24IMB05 (F0EU00MNRK)</strong></h1><p><br>&nbsp;</p>', 'Lenovo IC AIO 3 24IMB05 (F0EU00MNRK)', 'Lenovo IC AIO 3 24IMB05 (F0EU00MNRK)', 0, NULL, NULL, NULL, '2022-01-30 20:27:00', 3, NULL, NULL, 2, 0, 1, NULL, '2022-01-22 20:27:29', '2022-01-31 09:01:07', NULL),
(8, 5066, 'TFDTDDSF-545', 'hp-pro-300-g6-mt-294u7ea', 'HP Pro 300 G6 MT (294U7EA)', '<h1><strong>HP Pro 300 G6 MT (294U7EA)</strong></h1><p><br>&nbsp;</p>', 'HP Pro 300 G6 MT (294U7EA)', 'HP Pro 300 G6 MT (294U7EA)', 0, NULL, NULL, 10, '2022-01-26 19:30:00', 5, NULL, NULL, NULL, 0, 1, NULL, '2022-01-22 20:29:00', '2022-02-02 07:51:30', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_companies`
--

DROP TABLE IF EXISTS `product_companies`;
CREATE TABLE IF NOT EXISTS `product_companies` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int UNSIGNED DEFAULT NULL,
  `company_id` int UNSIGNED DEFAULT NULL,
  `main_product_price_id` bigint UNSIGNED NOT NULL,
  `price_id` bigint UNSIGNED NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_companies_product_id_foreign` (`product_id`),
  KEY `product_companies_company_id_foreign` (`company_id`),
  KEY `product_companies_price_id_foreign` (`price_id`),
  KEY `product_companies_main_product_price_id_foreign` (`main_product_price_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `product_companies`
--

INSERT INTO `product_companies` (`id`, `product_id`, `company_id`, `main_product_price_id`, `price_id`, `discount`) VALUES
(36, 2, 7, 10, 5, '20.00'),
(37, 2, 4, 10, 7, '20.00'),
(47, 1, 8, 2, 4, '10.00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_detail`
--

DROP TABLE IF EXISTS `product_detail`;
CREATE TABLE IF NOT EXISTS `product_detail` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int UNSIGNED NOT NULL,
  `measurement` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `show_new_collection` tinyint(1) NOT NULL DEFAULT '0',
  `show_hot_deal` tinyint(1) NOT NULL DEFAULT '0',
  `show_best_seller` tinyint(1) NOT NULL DEFAULT '0',
  `show_latest_products` tinyint(1) NOT NULL DEFAULT '0',
  `show_deals_of_the_day` tinyint(1) NOT NULL DEFAULT '0',
  `show_picked_for_you` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_detail_product_id_unique` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `product_detail`
--

INSERT INTO `product_detail` (`id`, `product_id`, `measurement`, `show_new_collection`, `show_hot_deal`, `show_best_seller`, `show_latest_products`, `show_deals_of_the_day`, `show_picked_for_you`) VALUES
(1, 1, 'eded', 0, 0, 0, 0, 0, 0),
(2, 2, 'eded', 0, 0, 0, 0, 0, 0),
(3, 3, 'eded', 0, 0, 0, 0, 0, 0),
(4, 4, 'eded', 0, 0, 0, 0, 0, 0),
(5, 5, 'eded', 0, 0, 0, 0, 0, 0),
(6, 6, 'eded', 0, 0, 0, 0, 0, 0),
(7, 7, 'eded', 0, 0, 0, 0, 0, 0),
(8, 8, 'eded', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_image`
--

DROP TABLE IF EXISTS `product_image`;
CREATE TABLE IF NOT EXISTS `product_image` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int UNSIGNED NOT NULL,
  `image_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `thumb_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `main_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `cover` int DEFAULT NULL,
  `color_id` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_image_product_id_foreign` (`product_id`),
  KEY `product_image_color_id` (`color_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image_name`, `thumb_name`, `main_name`, `cover`, `color_id`, `created_at`, `updated_at`) VALUES
(1, 2, 'product-0_2_1642675397.webp', 'thumb_product-0_2_1642675397.webp', 'main_product-0_2_1642675397.webp', NULL, 7, '2022-01-20 10:43:18', '2022-01-20 10:43:18'),
(2, 2, 'product-0_2_1642675447.webp', 'thumb_product-0_2_1642675447.webp', 'main_product-0_2_1642675447.webp', NULL, 2, '2022-01-20 10:44:08', '2022-01-20 10:44:08'),
(3, 1, 'product-0_1_1642685428.webp', 'thumb_product-0_1_1642685428.webp', 'main_product-0_1_1642685428.webp', 1, 2, '2022-01-20 13:30:30', '2022-01-23 05:31:24'),
(4, 1, 'product-0_1_1642685441.webp', 'thumb_product-0_1_1642685441.webp', 'main_product-0_1_1642685441.webp', 0, 3, '2022-01-20 13:30:41', '2022-01-23 05:31:24'),
(5, 3, 'product-0_3_1642840383.webp', 'thumb_product-0_3_1642840383.webp', 'main_product-0_3_1642840383.webp', NULL, 7, '2022-01-22 08:33:06', '2022-01-22 08:33:06'),
(17, 4, 'product-0_4_1642850288.webp', 'thumb_product-0_4_1642850288.webp', 'main_product-0_4_1642850288.webp', 1, 2, '2022-01-22 20:18:08', '2022-01-23 23:28:25'),
(20, 4, 'product-2_4_1642850301.webp', 'thumb_product-2_4_1642850301.webp', 'main_product-2_4_1642850301.webp', 0, 2, '2022-01-22 20:18:22', '2022-01-23 23:28:25'),
(21, 5, 'product-0_5_1642850527.webp', 'thumb_product-0_5_1642850527.webp', 'main_product-0_5_1642850527.webp', NULL, 2, '2022-01-22 20:22:07', '2022-01-22 20:22:07'),
(22, 5, 'product-0_5_1642850578.webp', 'thumb_product-0_5_1642850578.webp', 'main_product-0_5_1642850578.webp', NULL, 10, '2022-01-22 20:22:59', '2022-01-22 20:22:59'),
(23, 5, 'product-0_5_1642850653.webp', 'thumb_product-0_5_1642850653.webp', 'main_product-0_5_1642850653.webp', NULL, 9, '2022-01-22 20:24:13', '2022-01-22 20:24:13'),
(24, 6, 'product-0_6_1642850770.webp', 'thumb_product-0_6_1642850770.webp', 'main_product-0_6_1642850770.webp', NULL, 2, '2022-01-22 20:26:10', '2022-01-22 20:26:10'),
(25, 7, 'product-0_7_1642850860.webp', 'thumb_product-0_7_1642850860.webp', 'main_product-0_7_1642850860.webp', NULL, 2, '2022-01-22 20:27:41', '2022-01-22 20:27:41'),
(26, 8, 'product-0_8_1642850951.webp', 'thumb_product-0_8_1642850951.webp', 'main_product-0_8_1642850951.webp', NULL, 2, '2022-01-22 20:29:12', '2022-01-22 20:29:12'),
(27, 4, 'product-0_4_1642860265.webp', 'thumb_product-0_4_1642860265.webp', 'main_product-0_4_1642860265.webp', 0, 2, '2022-01-22 23:04:25', '2022-01-23 23:28:25'),
(28, 4, 'product-1_4_1642860265.webp', 'thumb_product-1_4_1642860265.webp', 'main_product-1_4_1642860265.webp', 0, 2, '2022-01-22 23:04:25', '2022-01-23 23:28:25'),
(29, 4, 'product-0_4_1642945768.webp', 'thumb_product-0_4_1642945768.webp', 'main_product-0_4_1642945768.webp', 0, 2, '2022-01-23 22:49:28', '2022-01-23 23:28:25'),
(30, 4, 'product-0_4_1642945837.webp', 'thumb_product-0_4_1642945837.webp', 'main_product-0_4_1642945837.webp', 0, 2, '2022-01-23 22:50:38', '2022-01-23 23:28:25'),
(34, 4, 'product-0_4_1642947165.webp', 'thumb_product-0_4_1642947165.webp', 'main_product-0_4_1642947165.webp', 0, 10, '2022-01-23 23:12:46', '2022-01-23 23:28:25'),
(35, 4, 'product-0_4_1642947344.webp', 'thumb_product-0_4_1642947344.webp', 'main_product-0_4_1642947344.webp', 0, 10, '2022-01-23 23:15:45', '2022-01-23 23:28:25'),
(36, 4, 'product-0_4_1642947452.webp', 'thumb_product-0_4_1642947452.webp', 'main_product-0_4_1642947452.webp', 0, 10, '2022-01-23 23:17:32', '2022-01-23 23:28:25'),
(38, 4, 'product-0_4_1642947659.webp', 'thumb_product-0_4_1642947659.webp', 'main_product-0_4_1642947659.webp', 0, 10, '2022-01-23 23:21:00', '2022-01-23 23:28:25'),
(39, 4, 'product-0_4_1642947753.webp', 'thumb_product-0_4_1642947753.webp', 'main_product-0_4_1642947753.webp', 0, 10, '2022-01-23 23:22:33', '2022-01-23 23:28:25'),
(40, 4, 'product-0_4_1642947857.webp', 'thumb_product-0_4_1642947857.webp', 'main_product-0_4_1642947857.webp', 0, 10, '2022-01-23 23:24:17', '2022-01-23 23:28:25');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_related`
--

DROP TABLE IF EXISTS `product_related`;
CREATE TABLE IF NOT EXISTS `product_related` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int UNSIGNED NOT NULL,
  `related_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_related_product_id_foreign` (`product_id`),
  KEY `product_related_related_id_foreign` (`related_id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `product_related`
--

INSERT INTO `product_related` (`id`, `product_id`, `related_id`) VALUES
(70, 1, 2),
(71, 1, 3),
(72, 1, 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `rating` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `rating`
--

INSERT INTO `rating` (`id`, `product_id`, `rating`) VALUES
(1, 4, 4),
(2, 4, 4),
(3, 4, 3),
(4, 4, 5),
(5, 4, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `review` text COLLATE utf8mb4_general_ci NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `rating` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `email`, `review`, `product_id`, `rating`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Famil Qasımov', 'familqasimov@gmail.com', 'Məhsulu aldım. Vaxtında çatdırıldı. Xidmətinizdən tam razıyam', 4, 5, '2022-01-24 00:06:43', '2022-01-24 00:06:43', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `shipping_returns`
--

DROP TABLE IF EXISTS `shipping_returns`;
CREATE TABLE IF NOT EXISTS `shipping_returns` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `shipping_return` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `shipping_returns`
--

INSERT INTO `shipping_returns` (`id`, `shipping_return`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sifarişin izlənilməsi\r\n<p>Kuryer ilə planlı və ya ekspress &ccedil;atdırılmanı se&ccedil;dikdə sizin sifariş &ccedil;atdırılmaya veriləndə və kuryer sizə y&ouml;nlənəndə SMS bildirişlərini alacaqsınız.</p>', '2021-03-11 18:33:23', '2021-08-24 00:21:57', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `size`
--

DROP TABLE IF EXISTS `size`;
CREATE TABLE IF NOT EXISTS `size` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `size`
--

INSERT INTO `size` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '13', '2022-01-20 10:40:24', '2022-01-20 10:40:24', NULL),
(2, '14', '2022-01-20 10:40:28', '2022-01-20 10:40:28', NULL),
(3, '15', '2022-01-20 10:40:33', '2022-01-20 10:40:33', NULL),
(4, '17', '2022-01-20 10:40:37', '2022-01-20 10:40:37', NULL),
(5, '64 GB', '2022-01-22 20:11:28', '2022-01-22 20:11:28', NULL),
(6, '128 GB', '2022-01-22 20:11:37', '2022-01-22 20:11:37', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `size_product`
--

DROP TABLE IF EXISTS `size_product`;
CREATE TABLE IF NOT EXISTS `size_product` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `size_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `size_product_size_id_foreign` (`size_id`),
  KEY `size_product_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `size_product`
--

INSERT INTO `size_product` (`id`, `size_id`, `product_id`) VALUES
(1, 1, 2),
(2, 3, 2),
(3, 4, 2),
(7, 5, 5),
(8, 5, 6);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `slider_name` text COLLATE utf8mb4_general_ci,
  `slider_image` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `slider_icon` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slider_slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slider_order` int NOT NULL,
  `slider_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `sliders`
--

INSERT INTO `sliders` (`id`, `slider_name`, `slider_image`, `slider_icon`, `slider_slug`, `slider_order`, `slider_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(40, '<h1><span style=\"color:#ffffff;\"><span style=\"font-size:48px;\">Yeni Mehsul</span></span></h1>\r\n\r\n<h2><span style=\"color:#ffffff;\"><span style=\"font-size:28px;\">Endirim</span></span></h2>\r\n<span style=\"color:#ffffff;\"><span style=\"font-size:36px;\">15AZN</span></span>', 'slider_1642152370.webp', 'slider_icon_1642152371.webp', 'https://goycay-avm.az/', 1, 1, '2021-07-27 06:49:28', '2022-01-14 09:26:11', NULL),
(48, NULL, 'slider_1642152514.webp', 'slider_icon_1642152514.webp', 'https://goycay-avm.az/', 3, 1, '2021-08-14 13:13:37', '2022-01-14 09:28:34', NULL),
(54, NULL, 'slider_1642152432.webp', 'slider_icon_1642152448.webp', 'https://goycay-avm.az/category/meyveterevezquru-meyve', 2, 1, '2021-12-24 20:16:54', '2022-01-14 09:27:28', NULL),
(55, '', 'slider_1640508576.webp', NULL, 'Slide 2', 4, 1, '2021-12-24 22:02:17', '2021-12-26 13:54:27', '2021-12-26 13:54:27'),
(56, '', 'slider_1640518218.webp', NULL, '1132156565', 4, 1, '2021-12-26 16:30:18', '2022-01-14 09:28:17', '2022-01-14 09:28:17');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tag_product`
--

DROP TABLE IF EXISTS `tag_product`;
CREATE TABLE IF NOT EXISTS `tag_product` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `tag_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tag_product_tag_id_foreign` (`tag_id`),
  KEY `tag_product_product_id_foreign` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `terms`
--

DROP TABLE IF EXISTS `terms`;
CREATE TABLE IF NOT EXISTS `terms` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `terms` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `terms`
--

INSERT INTO `terms` (`id`, `terms`, `created_at`, `updated_at`) VALUES
(1, 'Alotech', '2022-01-26 09:37:06', '2022-01-26 09:37:06');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `activation_key` varchar(60) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `bonus` bigint NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_email_uindex` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `mobile`, `password`, `activation_key`, `is_active`, `bonus`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Məhəmməd', 'Qalayçiyev', 'qalayciyev@gmail.com', '+994514598208', '$2y$10$HcYh8JgybwYOErMj4gMd.ury.ML0T/3xYXgou9oCtxU0Bi7HaHykm', NULL, 1, 8, 'fjSAqGegSdajxYE2NeJcpHt6Y567axLnENo4QyA7JbhFKhnQs91SMwkks0Yj', '2022-01-21 09:20:15', '2022-01-26 13:37:22', NULL),
(2, 'Famil', 'Qasımov', 'familqasimov@gmail.com', '+99455738342', '$2y$10$gwq0Moqs5e3m1BmjK6QypeTwc4XdbDLqxuREHvhgjqDdObmfRr3i.', NULL, 1, 0, NULL, '2022-01-23 05:42:44', '2022-01-23 05:42:44', NULL),
(7, 'Mehemmed', 'Qalayciyev', 'mqalayciyev@mail.ru', '+994514598208', '$2y$10$FNBmUkCE7RdAeqGXjCiK7OE2IKhzP1N7OhNV2TzRh0afJ3L5o7VAy', NULL, 1, 0, NULL, '2022-02-01 10:24:22', '2022-02-01 10:24:22', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_detail`
--

DROP TABLE IF EXISTS `user_detail`;
CREATE TABLE IF NOT EXISTS `user_detail` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` int UNSIGNED DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `zip_code` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_detail_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `user_detail`
--

INSERT INTO `user_detail` (`id`, `user_id`, `address`, `city`, `state`, `country`, `zip_code`, `phone`) VALUES
(1, 1, 'Baki Umid Ekberov 86', 1, NULL, NULL, 'AZ1138', '+994514598208');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `wish_list`
--

DROP TABLE IF EXISTS `wish_list`;
CREATE TABLE IF NOT EXISTS `wish_list` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `brand_product`
--
ALTER TABLE `brand_product`
  ADD CONSTRAINT `brand_product_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `brand_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `cart_product`
--
ALTER TABLE `cart_product`
  ADD CONSTRAINT `cart_product_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_product_ibfk_1` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_product_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `color_product`
--
ALTER TABLE `color_product`
  ADD CONSTRAINT `color_product_ibfk_1` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `color_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `coupons_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `coupons_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `order_returns`
--
ALTER TABLE `order_returns`
  ADD CONSTRAINT `order_returns_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_returns_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `price_list`
--
ALTER TABLE `price_list`
  ADD CONSTRAINT `price_list_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `price_list_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `price_list_ibfk_3` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `product_companies`
--
ALTER TABLE `product_companies`
  ADD CONSTRAINT `product_companies_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_companies_ibfk_1` FOREIGN KEY (`main_product_price_id`) REFERENCES `price_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_companies_price_id_foreign` FOREIGN KEY (`price_id`) REFERENCES `price_list` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_companies_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `product_detail`
--
ALTER TABLE `product_detail`
  ADD CONSTRAINT `product_detail_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_ibfk_1` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `product_image_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `product_related`
--
ALTER TABLE `product_related`
  ADD CONSTRAINT `product_related_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_related_related_id_foreign` FOREIGN KEY (`related_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `size_product`
--
ALTER TABLE `size_product`
  ADD CONSTRAINT `size_product_ibfk_1` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `size_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `tag_product`
--
ALTER TABLE `tag_product`
  ADD CONSTRAINT `tag_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tag_product_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `user_detail`
--
ALTER TABLE `user_detail`
  ADD CONSTRAINT `user_detail_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `wish_list`
--
ALTER TABLE `wish_list`
  ADD CONSTRAINT `wish_list_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wish_list_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
