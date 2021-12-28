-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Hazırlanma Vaxtı: 28 Dek, 2021 saat 12:55
-- Server versiyası: 8.0.21
-- PHP Versiyası: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Verilənlər Bazası: `alotech`
--

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `abouts`
--

DROP TABLE IF EXISTS `abouts`;
CREATE TABLE IF NOT EXISTS `abouts` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `about` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `abouts`
--

INSERT INTO `abouts` (`id`, `about`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '<h3>Watt.az sayt olaraq həm blog, həm xidmət, həm maqazin kimi sizin xidmətinizdədir. Bu saytı yaratmaqda məqsədimiz sizə standart, orginal elektrik məhsulları haqqda geniş məlumat vermək və sizə sərfəli qiymətlərlə m&uuml;xtəlif &ouml;dəniş &uuml;sulları ilə elektrik məhsullarının &ccedil;atdırılmasını təşkil etməkdir.</h3>\r\n\r\n<p>Bizim vəzifəmiz yalnız d&uuml;zg&uuml;n məhsulu satmaq deyil, həm də alıcını məlumatlandırmaq və maarifləndirməkdir. &nbsp;Sizi maraqlandıran hər-hansı bir məhsul və ya xidmət olarsa, dərhal bizimlə əlaqə saxlayın.<br />\r\ntel:994508880895</p>', NULL, '2021-08-21 06:08:19', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mobile` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `zip_code` varchar(15) DEFAULT NULL,
  `phone` varchar(60) DEFAULT NULL,
  `activation_key` varchar(60) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_manage` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `mobile`, `password`, `address`, `city`, `state`, `country`, `zip_code`, `phone`, `activation_key`, `is_active`, `is_manage`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'Göyçay', 'AVM', 'qalayciyev@gmail.com', '+994 ** *** ** **', '$2y$10$wUl0Jm29gfHjokZTSSFgCuRvHo03RD/qP.AV6CvSoRButm91dCaHy', 'Baku', 'Bakı', 'Bakı', 'Azərbaycan', NULL, '+994 ** *** ** **', NULL, 1, 1, 'rrN6PE0ugW0HFmiI0bFoLxcvHvZVqrm2Yq9ZFJ58x1yzcS1XOhua6gHAMCpK', '2021-07-01 19:37:26', '2021-11-12 05:12:45', NULL),
(8, 'Ariz', 'Alıyev', 'ariznd.info@gmail.com', '+994503952986', '$2y$10$8p3ZomY/dYT59EH8fm9DZekYqhZdNbYRZYPEe5J/3dev5bbHpyspu', 'Şəhriyar ev 8,m17', 'Göyçay', 'Bakı', 'Azərbaycan', 'AZ2300', '+994202744196', NULL, 1, 1, 'l9DEmAFEbZWoNW27Uw2AkctGj7xx4FhQ6oLRZvd3tYUeAKRKSdeyuLbwQyxh', '2021-12-23 16:20:01', '2021-12-23 16:20:01', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `api_keys`
--

DROP TABLE IF EXISTS `api_keys`;
CREATE TABLE IF NOT EXISTS `api_keys` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `api_token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `api_keys_api_token_unique` (`api_token`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `api_keys`
--

INSERT INTO `api_keys` (`id`, `name`, `api_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1C', 'reUXHNM90cz406PYXKCcKATKGOiRjWSeNYFbQLA0kBHnvMZxKdDzn6LehKJUb6Scsb3NRsMW0lvYwqDzafi8vhoqXqpNULaRAE3j', '2021-11-16 10:05:10', '2021-11-16 10:06:27', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL,
  `banner_name` varchar(191) DEFAULT NULL,
  `banner_image` varchar(191) NOT NULL,
  `banner_slug` varchar(191) NOT NULL,
  `banner_order` int NOT NULL,
  `banner_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_id` (`type`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `banners`
--

INSERT INTO `banners` (`id`, `type`, `banner_name`, `banner_image`, `banner_slug`, `banner_order`, `banner_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 'top', 'banner2', 'banner_1640520003.webp', 'fast-food', 1, 1, '2021-07-27 06:47:02', '2021-12-26 17:00:03', NULL),
(12, 'top', '', 'banner_1636114965.webp', 'basic_markup/', 2, 1, '2021-08-15 04:14:07', '2021-11-06 04:03:38', NULL),
(13, 'center', NULL, 'banner_1636185508.webp', 'banner center', 3, 1, '2021-11-04 06:40:46', '2021-11-06 03:58:29', NULL),
(14, 'top', NULL, 'banner_1636121449.webp', 'banner55', 3, 1, '2021-11-04 06:47:41', '2021-11-06 04:03:38', NULL),
(15, 'bottom', NULL, 'banner_1636185632.webp', 'banner55', 5, 1, '2021-11-04 06:58:32', '2021-11-06 04:00:32', NULL),
(16, 'bottom', NULL, 'banner_1636185666.webp', 'banner55', 6, 1, '2021-11-04 06:58:47', '2021-11-06 04:01:06', NULL),
(17, 'bottom', NULL, 'banner_1636185682.webp', 'banner55', 7, 1, '2021-11-04 06:59:04', '2021-11-06 04:01:22', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `blog_content` text NOT NULL,
  `blog_image` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `blogs`
--

INSERT INTO `blogs` (`id`, `blog_title`, `slug`, `blog_content`, `blog_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Suqovuşan qəsəbəsinə mediatur təşkil edilib', 'suqovusan-qesebesine-mediatur-teskil-edilib', '<p><strong>Azərişıq&quot; ASC Tərtər rayonunun işğaldan azad olunmuş Suqovuşan qəsəbəsinə mediatur təşkil edib.</strong></p><p>&nbsp;</p><p>&ldquo;Azərişıq&rdquo; ASC-nin mətbuat xidmətinin rəhbəri Vaqif Mustafayev bildrib ki, təmsil etdiyi qurum işğaldan azad olunmuş əraziləri elektrik enerjisi ilə təchiz etmək &uuml;&ccedil;&uuml;n kompleks tədbirləri davam etdirir:</p><p>&quot;Prezident İlham Əliyevin m&uuml;vafiq fərmanına uyğun olaraq səhmdar ASC &ldquo;Azərişıq Qarabağda&rdquo; layihəsi &ccedil;ər&ccedil;ivəsində Suqovuşan ərazisində işləri yekunlaşdırıb.</p><p>İşğaldan azad olunmuş Suqovuşan qəsəbəsinə 110/35/6 kv-luq Tərtər yarımstansiyasından 35 kV-luq yeni elektrik veriliş xətti &ccedil;əkilib.</p><p>Ağıllı Şəbəkə Konsepsiyası işğaldan azad olunan digər ərazilərdə olduğu kimi Suqovuşan ərazisində də tətbiq edilir. 35 kV-luq xətt izolyasiyalı kabellə &ccedil;əkilib.</p><p>&nbsp;</p><p><strong>Ətraflı:&nbsp;</strong><a href=\"https://az.trend.az/azerbaijan/society/3429645.html\">https://az.trend.az/<strong>​​​​​​</strong></a></p>', 'blog_1629225342.webp', '2021-08-02 12:12:37', '2021-08-18 02:35:42', NULL),
(2, 'Çin ən böyük elektrik gəmisini inşa edir', 'cin-en-boyuk-elektrik-gemisini-insa-edir', 'Yichang Tersanesi Sənaye Parkındakı Yangtze &ccedil;ayı &uuml;zərində, yalnız elektriklə işləyən d&uuml;nyanın ən b&ouml;y&uuml;k turist gəmisində işlər davam edir. &nbsp;100 metrlik layner 1300 qonağı qəbul edə biləcək və Hubei Three Gorges Tourism turizm şirkətinin verdiyi son məlumata g&ouml;rə, g&ouml;vdənin inşası yenicə başa &ccedil;atıb.<br /><br />&nbsp;Gəmi 2021 -ci ilin sonlarında istismara veriləcək, lakin artıq Yangtze &ccedil;ayında yaşıl enerjini təbliğ etmək &uuml;&ccedil;&uuml;n bir &ccedil;ox layihələrdən biri olacağı a&ccedil;ıqlandı.<br /><br />&nbsp;Gəminin &ouml;z&uuml; &quot;Yangtze Three Gorges 1&quot; adlanır və onun seyr radiusu təxminən 60 mil, yəni 95 km -dən bir qədər &ccedil;oxdur. &nbsp;Bunun məsuliyyəti 7,5 min kVt / saat g&uuml;c&uuml;ndə olan yeni nəsil təkrar doldurulan batareyadır. &nbsp;&Ccedil;in səyahət şirkəti enerji təchizatı sahəsində texnoloji tərəqqi sayəsində standart batareyaların &ouml;mr&uuml;n&uuml; əhəmiyyətli dərəcədə artırmağın m&uuml;mk&uuml;n olduğunu vurğuladı. &nbsp;Əlavə bir &uuml;st&uuml;nl&uuml;k, m&ouml;vcud enerjinin səmərəli və təhl&uuml;kəsiz idarə edilməsinə və gəminin b&uuml;t&uuml;n elementlərinə &ccedil;atdırılmasına imkan verən m&uuml;asir sistemlər olacaq.<br /><br />&nbsp;Şarj sistemi əsasdır - şirkət, batareyasını y&uuml;ksək gərginliklə dolduran d&uuml;nyada ilk dəniz qurğusu olacağını əlavə etdi. &nbsp;Əvvəllər bu həlli istifadə etmək cəhdləri belə bir batareyanın &ouml;mr&uuml;n&uuml; əhəmiyyətli dərəcədə azaldır.<br />Mənbə: https://hi-tech.news', 'blog_1629748687.webp', '2021-08-24 03:58:07', '2021-08-24 03:58:07', NULL),
(3, 'Çin ən böyük elektrik gəmisini inşa edir', 'cin-en-boyuk-elektrik-gemisini-insa-edir', 'Yichang Tersanesi Sənaye Parkındakı Yangtze &ccedil;ayı &uuml;zərində, yalnız elektriklə işləyən d&uuml;nyanın ən b&ouml;y&uuml;k turist gəmisində işlər davam edir. &nbsp;100 metrlik layner 1300 qonağı qəbul edə biləcək və Hubei Three Gorges Tourism turizm şirkətinin verdiyi son məlumata g&ouml;rə, g&ouml;vdənin inşası yenicə başa &ccedil;atıb.<br /><br />&nbsp;Gəmi 2021 -ci ilin sonlarında istismara veriləcək, lakin artıq Yangtze &ccedil;ayında yaşıl enerjini təbliğ etmək &uuml;&ccedil;&uuml;n bir &ccedil;ox layihələrdən biri olacağı a&ccedil;ıqlandı.<br /><br />&nbsp;Gəminin &ouml;z&uuml; &quot;Yangtze Three Gorges 1&quot; adlanır və onun seyr radiusu təxminən 60 mil, yəni 95 km -dən bir qədər &ccedil;oxdur. &nbsp;Bunun məsuliyyəti 7,5 min kVt / saat g&uuml;c&uuml;ndə olan yeni nəsil təkrar doldurulan batareyadır. &nbsp;&Ccedil;in səyahət şirkəti enerji təchizatı sahəsində texnoloji tərəqqi sayəsində standart batareyaların &ouml;mr&uuml;n&uuml; əhəmiyyətli dərəcədə artırmağın m&uuml;mk&uuml;n olduğunu vurğuladı. &nbsp;Əlavə bir &uuml;st&uuml;nl&uuml;k, m&ouml;vcud enerjinin səmərəli və təhl&uuml;kəsiz idarə edilməsinə və gəminin b&uuml;t&uuml;n elementlərinə &ccedil;atdırılmasına imkan verən m&uuml;asir sistemlər olacaq.<br /><br />&nbsp;Şarj sistemi əsasdır - şirkət, batareyasını y&uuml;ksək gərginliklə dolduran d&uuml;nyada ilk dəniz qurğusu olacağını əlavə etdi. &nbsp;Əvvəllər bu həlli istifadə etmək cəhdləri belə bir batareyanın &ouml;mr&uuml;n&uuml; əhəmiyyətli dərəcədə azaldır.<br />Mənbə: https://hi-tech.news', 'blog_1629748688.webp', '2021-08-24 03:58:08', '2021-08-24 03:58:08', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51517 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `brand`
--

INSERT INTO `brand` (`id`, `name`, `slug`, `image`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'CHINA', 'china', NULL, NULL, '2021-12-22 18:37:06', '2021-12-27 11:13:32', NULL),
(2, 'NO NAME', 'no-name', NULL, NULL, '2021-12-22 18:37:06', '2021-12-27 11:13:32', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `brand_product`
--

DROP TABLE IF EXISTS `brand_product`;
CREATE TABLE IF NOT EXISTS `brand_product` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `brand_product_brand_id_foreign` (`brand_id`),
  KEY `brand_product_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24259 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `brand_product`
--

INSERT INTO `brand_product` (`id`, `brand_id`, `product_id`) VALUES
(24252, 1, 24247),
(24253, 2, 24248),
(24254, 2, 24249),
(24255, 2, 24250),
(24256, 1, 24251),
(24257, 2, 24252),
(24258, 2, 24253);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED DEFAULT '0',
  `no_register` int NOT NULL DEFAULT '0',
  `time_id` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `no_register`, `time_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(114, 195, 0, 0, '2021-12-12 17:54:30', '2021-12-12 17:54:30', NULL),
(117, 195, 0, 0, '2021-12-13 18:44:35', '2021-12-13 18:44:35', NULL),
(118, 195, 0, 0, '2021-12-13 18:58:52', '2021-12-13 18:58:52', NULL),
(119, 195, 0, 0, '2021-12-13 19:29:59', '2021-12-13 19:29:59', NULL),
(124, 195, 0, 0, '2021-12-16 01:19:15', '2021-12-16 01:19:15', NULL),
(132, 192, 0, 0, '2021-12-17 14:17:25', '2021-12-17 14:17:25', NULL),
(133, 192, 0, 0, '2021-12-17 14:17:50', '2021-12-17 14:17:50', NULL),
(134, 202, 0, 0, '2021-12-17 16:51:38', '2021-12-17 16:51:38', NULL),
(135, 202, 0, 0, '2021-12-17 16:53:00', '2021-12-17 16:53:00', NULL),
(136, 202, 0, 0, '2021-12-17 16:58:19', '2021-12-17 16:58:19', NULL),
(137, 192, 0, 0, '2021-12-17 17:22:05', '2021-12-17 17:22:05', NULL),
(138, 195, 0, 0, '2021-12-17 18:03:40', '2021-12-17 18:03:40', NULL),
(139, 195, 0, 0, '2021-12-18 15:30:00', '2021-12-18 15:30:00', NULL),
(140, 195, 0, 0, '2021-12-19 21:59:20', '2021-12-19 21:59:20', NULL),
(141, 195, 0, 0, '2021-12-20 18:30:15', '2021-12-20 18:30:15', NULL),
(142, 192, 0, 0, '2021-12-23 12:16:18', '2021-12-23 12:16:18', NULL),
(143, 203, 0, 0, '2021-12-24 19:35:47', '2021-12-24 19:35:47', NULL),
(144, 203, 0, 0, '2021-12-25 01:18:06', '2021-12-25 01:18:06', NULL),
(145, 203, 0, 0, '2021-12-25 01:21:35', '2021-12-25 01:21:35', NULL),
(146, 192, 0, 0, '2021-12-25 11:29:37', '2021-12-25 11:29:37', NULL),
(147, 192, 0, 0, '2021-12-25 11:32:51', '2021-12-25 11:32:51', NULL),
(148, 192, 0, 0, '2021-12-25 13:07:30', '2021-12-25 13:07:30', NULL),
(149, 195, 0, 0, '2021-12-26 23:25:12', '2021-12-26 23:25:12', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `cart_product`
--

DROP TABLE IF EXISTS `cart_product`;
CREATE TABLE IF NOT EXISTS `cart_product` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `cart_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `size_id` int UNSIGNED DEFAULT NULL,
  `color_id` int UNSIGNED DEFAULT NULL,
  `piece` int NOT NULL,
  `amount` decimal(5,2) NOT NULL,
  `sale_price` decimal(6,2) NOT NULL,
  `price_id` int NOT NULL,
  `cart_status` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_product_cart_id_foreign` (`cart_id`),
  KEY `cart_product_product_id_foreign` (`product_id`),
  KEY `cart_product_size_id_foreign` (`size_id`) USING BTREE,
  KEY `cart_product_color_id_foreign` (`color_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=267 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `cart_product`
--

INSERT INTO `cart_product` (`id`, `cart_id`, `product_id`, `size_id`, `color_id`, `piece`, `amount`, `sale_price`, `price_id`, `cart_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(248, 141, 24248, 90, 99, 1, '2.20', '2.20', 24036, 'Pending', '2021-12-22 18:38:41', '2021-12-22 18:38:56', '2021-12-22 18:38:56'),
(249, 137, 24249, 89, 102, 1, '4.15', '4.15', 24038, 'Pending', '2021-12-23 11:52:50', '2021-12-23 11:52:50', NULL),
(250, 137, 24248, 90, 99, 1, '2.20', '2.20', 24036, 'Pending', '2021-12-23 11:52:52', '2021-12-23 11:52:52', NULL),
(251, 143, 24250, 88, 97, 1, '6.20', '6.20', 24040, 'Pending', '2021-12-24 19:44:38', '2021-12-24 19:44:38', NULL),
(252, 143, 24247, 89, 98, 1, '2.55', '2.55', 24031, 'Pending', '2021-12-24 19:46:30', '2021-12-24 19:46:30', NULL),
(253, 143, 24249, 89, 102, 1, '4.15', '4.15', 24038, 'Pending', '2021-12-24 19:46:36', '2021-12-24 19:46:36', NULL),
(254, 144, 24247, 89, 98, 1, '2.55', '2.55', 24031, 'Pending', '2021-12-25 01:18:23', '2021-12-25 01:18:23', NULL),
(255, 144, 24249, 89, 102, 1, '4.15', '4.15', 24038, 'Pending', '2021-12-25 01:18:27', '2021-12-25 01:18:27', NULL),
(256, 145, 24247, 89, 98, 1, '2.55', '2.55', 24031, 'Pending', '2021-12-25 01:21:35', '2021-12-25 01:21:35', NULL),
(257, 145, 24250, 88, 97, 1, '6.20', '6.20', 24040, 'Pending', '2021-12-25 01:21:55', '2021-12-25 01:21:55', NULL),
(258, 145, 24249, 89, 102, 1, '4.15', '4.15', 24038, 'Pending', '2021-12-25 01:22:32', '2021-12-25 01:22:32', NULL),
(259, 142, 24249, 89, 102, 2, '4.15', '4.15', 24038, 'Pending', '2021-12-25 11:22:05', '2021-12-25 11:22:08', NULL),
(260, 146, 24249, 89, 102, 3, '4.15', '4.15', 24038, 'Pending', '2021-12-25 11:29:37', '2021-12-25 11:29:48', NULL),
(261, 147, 24249, 89, 102, 3, '4.15', '4.15', 24038, 'Pending', '2021-12-25 11:32:51', '2021-12-25 11:33:02', NULL),
(262, 148, 24247, 89, 98, 4, '2.55', '2.55', 24031, 'Pending', '2021-12-25 13:07:30', '2021-12-25 13:07:48', NULL),
(263, 141, 24248, 90, 99, 1, '2.20', '2.20', 24036, 'Pending', '2021-12-26 15:16:41', '2021-12-26 15:16:41', NULL),
(264, 149, 24249, 89, 102, 1, '4.15', '4.15', 24038, 'Pending', '2021-12-26 23:25:12', '2021-12-26 23:25:12', NULL),
(265, 149, 24247, 89, 98, 3, '2.55', '2.55', 24031, 'Pending', '2021-12-26 23:25:48', '2021-12-26 23:25:48', NULL),
(266, 149, 24248, 90, 99, 3, '2.20', '2.20', 24036, 'Pending', '2021-12-26 23:25:57', '2021-12-26 23:25:57', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `top_id` int DEFAULT NULL,
  `category_name` varchar(30) NOT NULL,
  `slug` varchar(40) NOT NULL,
  `category_view` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51517 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `category`
--

INSERT INTO `category` (`id`, `top_id`, `category_name`, `slug`, `category_view`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, NULL, 'Meyvə,tərəvəz,quru meyvə', 'meyveterevezquru-meyve', 0, '2021-12-22 18:37:07', '2021-12-22 18:37:07', NULL),
(6, NULL, 'Ət,toyuq,dəniz məhsulları', 'ettoyuqdeniz-mehsullari', 0, '2021-12-22 18:37:07', '2021-12-22 18:37:07', NULL),
(20, 2, 'Meyvə', 'meyve', 0, '2021-12-22 18:37:07', '2021-12-22 18:37:07', NULL),
(22, 6, 'Toyuq', 'toyuq', 0, '2021-12-22 18:37:07', '2021-12-22 18:37:07', NULL),
(23, 2, 'Tərəvəz', 'terevez', 0, '2021-12-22 18:37:07', '2021-12-22 18:37:07', NULL),
(20122, NULL, 'Numuneler', 'numuneler', 0, '2021-12-25 01:11:24', '2021-12-25 01:11:24', NULL),
(20126, 20122, 'Yoxlamaq', 'yoxlamaq', 0, '2021-12-25 01:11:24', '2021-12-25 01:11:24', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `category_images`
--

DROP TABLE IF EXISTS `category_images`;
CREATE TABLE IF NOT EXISTS `category_images` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int UNSIGNED NOT NULL,
  `image_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_images_category_id_foreign` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `category_product`
--

DROP TABLE IF EXISTS `category_product`;
CREATE TABLE IF NOT EXISTS `category_product` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_product_category_id_foreign` (`category_id`),
  KEY `category_product_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24272 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `category_product`
--

INSERT INTO `category_product` (`id`, `category_id`, `product_id`) VALUES
(24265, 20, 24247),
(24266, 23, 24248),
(24267, 23, 24249),
(24268, 22, 24250),
(24269, 20126, 24251),
(24270, 20122, 24252),
(24271, 20, 24253);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `color`
--

DROP TABLE IF EXISTS `color`;
CREATE TABLE IF NOT EXISTS `color` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `color`
--

INSERT INTO `color` (`id`, `title`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'none', 'none', '2021-12-10 02:55:26', '2021-12-13 14:25:29', NULL),
(88, 'Ag', '#ffffff', '2021-12-03 12:40:55', '2021-12-09 06:15:23', NULL),
(89, 'Narinci', '#ff8400', '2021-12-03 14:35:55', '2021-12-03 14:35:55', NULL),
(90, 'Sari', '#ffe600', '2021-12-04 15:40:31', '2021-12-04 15:40:31', NULL),
(93, 'Benovseyi', '#f700ff', '2021-12-04 16:39:49', '2021-12-04 16:39:49', NULL),
(94, 'Açıq bənövşəyi', '#ff85de', '2021-12-14 15:04:08', '2021-12-24 13:21:05', NULL),
(95, 'FF0000 Sarı', '#FF0000', '2021-12-14 15:29:56', '2021-12-25 01:11:25', NULL),
(96, 'Qehveyi', '#6b3305', '2021-12-14 16:39:52', '2021-12-17 17:38:22', NULL),
(97, 'Qara', '#000000', '2021-12-21 19:07:25', '2021-12-24 13:17:02', NULL),
(98, 'Boz', '#6b6b6b', '2021-12-22 18:31:09', '2021-12-25 11:27:22', NULL),
(99, 'Mavi', '#64b4af', '2021-12-22 18:31:09', '2021-12-25 11:27:39', NULL),
(100, 'Sari', '#FFFF00', '2021-12-22 18:31:09', '2021-12-25 11:26:58', NULL),
(101, 'yasil', '#00FF00', '2021-12-22 18:31:09', '2021-12-24 13:16:45', NULL),
(102, 'Goy', '#0000FF', '2021-12-22 18:37:09', '2021-12-25 11:26:47', NULL),
(103, 'ABCDEF açıq bənövşəyi', '#ABCDEF', '2021-12-25 01:11:25', '2021-12-25 01:11:25', NULL),
(104, '#FFFFFF', 'ag', '2021-12-27 11:13:35', '2021-12-27 11:13:35', NULL),
(105, '#000000', 'qara', '2021-12-27 11:13:35', '2021-12-27 11:13:35', NULL),
(106, '#FFFF00', 'sari', '2021-12-27 11:13:35', '2021-12-27 11:13:35', NULL),
(107, '#00FF00', 'yasil', '2021-12-27 11:13:35', '2021-12-27 11:13:35', NULL),
(108, '-', '-', '2021-12-27 11:13:35', '2021-12-27 11:13:35', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `color_product`
--

DROP TABLE IF EXISTS `color_product`;
CREATE TABLE IF NOT EXISTS `color_product` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `color_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `color_product_color_id_foreign` (`color_id`),
  KEY `color_product_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29659 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `color_product`
--

INSERT INTO `color_product` (`id`, `color_id`, `product_id`) VALUES
(29639, 98, 24247),
(29640, 99, 24247),
(29641, 100, 24247),
(29642, 101, 24247),
(29643, 1, 24247),
(29644, 99, 24248),
(29645, 1, 24248),
(29646, 102, 24249),
(29647, 1, 24249),
(29648, 97, 24250),
(29649, 1, 24250),
(29650, 103, 24251),
(29651, 1, 24251),
(29652, 95, 24252),
(29653, 1, 24252),
(29654, 104, 24247),
(29655, 105, 24247),
(29656, 106, 24247),
(29657, 107, 24247),
(29658, 108, 24253);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `message` text NOT NULL,
  `feedback` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `feedback`, `created_at`, `updated_at`, `deleted_at`) VALUES
(32, 'Ariz', 'ariznd-inf0@yandex.ru', 'Salam', NULL, '2021-12-26 14:47:46', '2021-12-26 14:47:46', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `company` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `zip_code` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `infos`
--

DROP TABLE IF EXISTS `infos`;
CREATE TABLE IF NOT EXISTS `infos` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `logo` varchar(150) DEFAULT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `keywords` text,
  `phone` varchar(191) DEFAULT NULL,
  `mobile` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `address` text,
  `facebook` text,
  `instagram` text,
  `twitter` text,
  `youtube` text,
  `pinterest` text,
  `delivery` text,
  `terms` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `infos`
--

INSERT INTO `infos` (`id`, `logo`, `title`, `description`, `keywords`, `phone`, `mobile`, `email`, `address`, `facebook`, `instagram`, `twitter`, `youtube`, `pinterest`, `delivery`, `terms`) VALUES
(1, 'logo.png', 'Göyçay AVM', 'Goycay AVM', '#qida #məhsullarının #online #satışı', '+994 ** *** ** **', '+994 ** *** ** **', 'info@goycay-avm.az', 'Online Store', 'https://www.facebook.com/G%C3%B6y%C3%A7ay-AVM-101523055714807', 'https://www.instagram.com/', 'https://www.twitter.com/', 'https://www.youtube.com/', 'https://www.pinterest.com/', 'Bakı, Abşeron, Sumqayıt ərazilərinə çatdırılma ödənişsizdir.\r\nBölgələrə çatdırılma ödənişlidir\r\nMəhsul sifariş verdiyiniz andan 1-3 saat ərzində müştəriyə təhvil verilir.', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `logs`
--

INSERT INTO `logs` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, '[{\"product_name\":null,\"product_code\":\"12345789\",\"measurement\":\"kq\",\"stok_piece\":\"10\",\"retail_price\":\"6\",\"category\":\"1\"},{\"product_name\":null,\"product_code\":\"1234578\",\"measurement\":\"1\",\"stok_piece\":\"10\",\"retail_price\":\"6\",\"category\":\"1\"}]', '2021-11-17 09:30:21', '2021-11-17 09:30:21'),
(2, '[{\"product_name\":\"N\\u00fcmun\\u0259 \\u00fc\\u00e7\\u00fcn mal\",\"product_code\":null,\"measurement\":\"piece\",\"stok_piece\":7,\"retail_price\":7,\"product_description\":\"M\\u0259hsul a\\u00e7\\u0131qlamas\\u0131 burada\",\"discount\":15,\"wholesale_count\":10,\"wholesale_price\":4,\"discount_date\":\"2020-10-10 11:10:10\",\"colors\":[\"reng 1\",\"reng 2\"],\"sizes\":[\"S\",\"M\",\"L\"],\"category\":\"0\"}]', '2021-11-18 03:09:10', '2021-11-18 03:09:10'),
(3, '[{\"product_name\":\"N\\u00fcmun\\u0259 \\u00fc\\u00e7\\u00fcn mal\",\"product_code\":\"M0001\",\"measurement\":\"piece\",\"stok_piece\":7,\"retail_price\":7,\"product_description\":\"M\\u0259hsul a\\u00e7\\u0131qlamas\\u0131 burada\",\"discount\":15,\"wholesale_count\":10,\"wholesale_price\":4,\"discount_date\":\"2020-10-10 11:10:10\",\"colors\":[\"reng 1\",\"reng 2\"],\"sizes\":[\"S\",\"M\",\"L\"],\"category\":\"0\"}]', '2021-11-18 03:09:20', '2021-11-18 03:09:20'),
(4, '[{\"product_name\":\"N\\u00fcmun\\u0259 \\u00fc\\u00e7\\u00fcn mal\",\"product_code\":\"M0001\",\"measurement\":\"piece\",\"stok_piece\":7,\"retail_price\":7,\"product_description\":\"M\\u0259hsul a\\u00e7\\u0131qlamas\\u0131 burada\",\"discount\":15,\"wholesale_count\":10,\"wholesale_price\":4,\"discount_date\":null,\"colors\":[\"reng 1\",\"reng 2\"],\"sizes\":[\"S\",\"M\",\"L\"],\"category\":\"0\"}]', '2021-11-18 03:27:17', '2021-11-18 03:27:17'),
(6, '[{\"product_name\":\"N\\u00fcmun\\u0259 \\u00fc\\u00e7\\u00fcn mal\",\"product_code\":\"M0001\",\"measurement\":\"piece\",\"stok_piece\":7,\"retail_price\":7,\"product_description\":\"M\\u0259hsul a\\u00e7\\u0131qlamas\\u0131 burada\",\"discount\":15,\"wholesale_count\":10,\"wholesale_price\":4,\"discount_date\":null,\"colors\":[\"reng 1\",\"reng 2\"],\"sizes\":[\"S\",\"M\",\"L\"],\"category\":\"0\"}]', '2021-11-18 03:27:30', '2021-11-18 03:27:30'),
(7, '[{\"product_name\":\"N\\u00fcmun\\u0259 \\u00fc\\u00e7\\u00fcn mal\",\"product_code\":\"M0001\",\"measurement\":\"piece\",\"stok_piece\":7,\"retail_price\":7,\"product_description\":\"M\\u0259hsul a\\u00e7\\u0131qlamas\\u0131 burada\",\"discount\":15,\"wholesale_count\":10,\"wholesale_price\":4,\"discount_date\":null,\"colors\":[\"reng 1\",\"reng 2\"],\"sizes\":[\"S\",\"M\",\"L\"],\"category\":\"0\"}]', '2021-11-18 03:28:48', '2021-11-18 03:28:48'),
(9, '[{\"product_name\":\"N\\u00fcmun\\u0259 \\u00fc\\u00e7\\u00fcn mal\",\"product_code\":\"M0001\",\"measurement\":\"piece\",\"stok_piece\":7,\"retail_price\":7,\"product_description\":\"M\\u0259hsul a\\u00e7\\u0131qlamas\\u0131 burada\",\"discount\":15,\"wholesale_count\":10,\"wholesale_price\":4,\"colors\":[\"reng 1\",\"reng 2\"],\"sizes\":[\"S\",\"M\",\"L\"],\"category\":\"0\"}]', '2021-11-18 03:29:06', '2021-11-18 03:29:06'),
(10, '[{\"product_name\":\"N\\u00fcmun\\u0259 \\u00fc\\u00e7\\u00fcn mal\",\"product_code\":\"M0001\",\"measurement\":\"piece\",\"stok_piece\":7,\"retail_price\":7,\"product_description\":\"M\\u0259hsul a\\u00e7\\u0131qlamas\\u0131 burada\",\"discount\":15,\"wholesale_count\":10,\"wholesale_price\":4,\"colors\":[\"reng 1\",\"reng 2\"],\"sizes\":[\"S\",\"M\",\"L\"],\"category\":\"0\"}]', '2021-11-18 03:29:18', '2021-11-18 03:29:18'),
(11, '[{\"product_name\":\"N\\u00fcmun\\u0259 \\u00fc\\u00e7\\u00fcn mal\",\"product_code\":\"M0001\",\"measurement\":\"piece\",\"stok_piece\":7,\"retail_price\":7,\"product_description\":\"M\\u0259hsul a\\u00e7\\u0131qlamas\\u0131 burada\",\"discount\":15,\"wholesale_count\":10,\"wholesale_price\":4,\"colors\":[\"reng 1\",\"reng 2\"],\"sizes\":[\"S\",\"M\",\"L\"],\"category\":\"0\"}]', '2021-11-18 03:29:32', '2021-11-18 03:29:32'),
(12, '[{\"product_name\":\"N\\u00fcmun\\u0259 \\u00fc\\u00e7\\u00fcn mal\",\"product_code\":\"M0001\",\"measurement\":\"piece\",\"stok_piece\":7,\"retail_price\":7,\"product_description\":\"M\\u0259hsul a\\u00e7\\u0131qlamas\\u0131 burada\",\"discount\":15,\"wholesale_count\":10,\"wholesale_price\":4,\"colors\":[\"reng 1\",\"reng 2\"],\"sizes\":[\"S\",\"M\",\"L\"],\"category\":\"0\"}]', '2021-11-18 03:29:48', '2021-11-18 03:29:48'),
(13, '{\"1\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\"],\"2\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\",\"brand id qeyd edin.\"]}', '2021-11-24 03:28:56', '2021-11-24 03:28:56'),
(14, '{\"1\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\"],\"2\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\",\"brand id qeyd edin.\"]}', '2021-11-24 03:40:04', '2021-11-24 03:40:04'),
(15, '{\"1\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\"],\"2\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\",\"brand id qeyd edin.\"]}', '2021-11-24 03:40:58', '2021-11-24 03:40:58'),
(16, '{\"1\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\"],\"2\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\",\"brand id qeyd edin.\"]}', '2021-11-24 03:41:23', '2021-11-24 03:41:23'),
(17, '{\"1\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\"],\"2\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\",\"brand id qeyd edin.\"]}', '2021-11-24 03:43:14', '2021-11-24 03:43:14'),
(18, '{\"1\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\"],\"2\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\",\"brand id qeyd edin.\"]}', '2021-11-24 03:43:54', '2021-11-24 03:43:54'),
(19, '{\"1\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\"],\"2\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\",\"brand id qeyd edin.\"]}', '2021-11-24 03:44:30', '2021-11-24 03:44:30'),
(20, '{\"1\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\"],\"2\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\",\"brand id qeyd edin.\"]}', '2021-11-24 03:47:55', '2021-11-24 03:47:55'),
(21, '{\"1\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\"],\"2\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\",\"brand id qeyd edin.\"]}', '2021-11-24 03:48:21', '2021-11-24 03:48:21'),
(22, '{\"1\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\"],\"2\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\",\"brand id qeyd edin.\"]}', '2021-11-24 03:50:15', '2021-11-24 03:50:15'),
(23, '{\"1\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\"],\"2\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\",\"brand id qeyd edin.\"]}', '2021-11-24 03:53:26', '2021-11-24 03:53:26'),
(24, '{\"1\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\"],\"2\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\",\"brand id qeyd edin.\"]}', '2021-11-24 03:56:17', '2021-11-24 03:56:17'),
(25, '{\"1\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\"],\"2\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\",\"brand id qeyd edin.\"]}', '2021-11-24 03:56:44', '2021-11-24 03:56:44'),
(26, '{\"1\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\"],\"2\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\",\"brand id qeyd edin.\"]}', '2021-11-24 03:57:30', '2021-11-24 03:57:30'),
(27, '{\"1\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\"],\"2\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\",\"brand id qeyd edin.\"]}', '2021-11-24 03:57:57', '2021-11-24 03:57:57'),
(28, '{\"1\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\"],\"2\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\",\"brand id qeyd edin.\"]}', '2021-11-24 03:58:31', '2021-11-24 03:58:31'),
(29, '{\"1\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\"],\"2\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\",\"brand id qeyd edin.\"]}', '2021-11-24 05:20:15', '2021-11-24 05:20:15'),
(30, '{\"1\":[\"brand name qeyd edin.\"],\"2\":[\"brand name qeyd edin.\",\"brand name qeyd edin.\"]}', '2021-11-24 06:27:47', '2021-11-24 06:27:47'),
(31, '{\"1\":[\"brand name qeyd edin.\"],\"2\":[\"brand name qeyd edin.\",\"brand name qeyd edin.\"]}', '2021-11-24 07:00:22', '2021-11-24 07:00:22'),
(32, '{\"1\":[\"Bu brand name art\\u0131q qeyd edilib.\"],\"2\":[\"Bu brand name art\\u0131q qeyd edilib.\",\"Bu brand name art\\u0131q qeyd edilib.\"]}', '2021-11-24 07:02:55', '2021-11-24 07:02:55'),
(33, '{\"20123\":[\"price list qeyd edin.\"],\"20124\":[\"price list qeyd edin.\"],\"20125\":[\"price list qeyd edin.\"]}', '2021-12-02 16:54:55', '2021-12-02 16:54:55'),
(34, '{\"20123\":[\"price list qeyd edin.\"],\"20124\":[\"price list qeyd edin.\"],\"20125\":[\"price list qeyd edin.\"]}', '2021-12-02 17:01:22', '2021-12-02 17:01:22'),
(35, '{\"20123\":[\"price list qeyd edin.\"],\"20124\":[\"price list qeyd edin.\"],\"20125\":[\"price list qeyd edin.\"]}', '2021-12-02 17:03:11', '2021-12-02 17:03:11'),
(36, '{\"20123\":[\"price list qeyd edin.\"]}', '2021-12-02 17:03:46', '2021-12-02 17:03:46'),
(37, '{\"20123\":[\"price list qeyd edin.\"]}', '2021-12-02 17:04:10', '2021-12-02 17:04:10'),
(38, '[[\"brand name qeyd edin.\"]]', '2021-12-06 19:01:55', '2021-12-06 19:01:55');
INSERT INTO `logs` (`id`, `content`, `created_at`, `updated_at`) VALUES
(39, '{\"576\":[\"stock list qeyd edin.\"],\"577\":[\"stock list qeyd edin.\"],\"578\":[\"stock list qeyd edin.\"],\"579\":[\"stock list qeyd edin.\"],\"580\":[\"stock list qeyd edin.\"],\"581\":[\"stock list qeyd edin.\"],\"582\":[\"stock list qeyd edin.\"],\"583\":[\"stock list qeyd edin.\"],\"584\":[\"stock list qeyd edin.\"],\"585\":[\"stock list qeyd edin.\"],\"586\":[\"stock list qeyd edin.\"],\"587\":[\"stock list qeyd edin.\"],\"588\":[\"stock list qeyd edin.\"],\"589\":[\"stock list qeyd edin.\"],\"590\":[\"stock list qeyd edin.\"],\"591\":[\"stock list qeyd edin.\"],\"592\":[\"stock list qeyd edin.\"],\"593\":[\"stock list qeyd edin.\"],\"594\":[\"stock list qeyd edin.\"],\"595\":[\"stock list qeyd edin.\"],\"596\":[\"stock list qeyd edin.\"],\"597\":[\"stock list qeyd edin.\"],\"598\":[\"stock list qeyd edin.\"],\"599\":[\"stock list qeyd edin.\"],\"600\":[\"stock list qeyd edin.\"],\"601\":[\"stock list qeyd edin.\"],\"602\":[\"stock list qeyd edin.\"],\"603\":[\"stock list qeyd edin.\"],\"604\":[\"stock list qeyd edin.\"],\"605\":[\"stock list qeyd edin.\"],\"606\":[\"stock list qeyd edin.\"],\"607\":[\"stock list qeyd edin.\"],\"608\":[\"stock list qeyd edin.\"],\"609\":[\"stock list qeyd edin.\"],\"610\":[\"stock list qeyd edin.\"],\"611\":[\"stock list qeyd edin.\"],\"612\":[\"stock list qeyd edin.\"],\"613\":[\"stock list qeyd edin.\"],\"614\":[\"stock list qeyd edin.\"],\"615\":[\"stock list qeyd edin.\"],\"616\":[\"stock list qeyd edin.\"],\"617\":[\"stock list qeyd edin.\"],\"618\":[\"stock list qeyd edin.\"],\"619\":[\"stock list qeyd edin.\"],\"620\":[\"stock list qeyd edin.\"],\"621\":[\"stock list qeyd edin.\"],\"622\":[\"stock list qeyd edin.\"],\"623\":[\"stock list qeyd edin.\"],\"624\":[\"stock list qeyd edin.\"],\"625\":[\"stock list qeyd edin.\"],\"626\":[\"stock list qeyd edin.\"],\"627\":[\"stock list qeyd edin.\"],\"628\":[\"stock list qeyd edin.\"],\"629\":[\"stock list qeyd edin.\"],\"630\":[\"stock list qeyd edin.\"],\"631\":[\"stock list qeyd edin.\"],\"632\":[\"stock list qeyd edin.\"],\"633\":[\"stock list qeyd edin.\"],\"634\":[\"stock list qeyd edin.\"],\"635\":[\"stock list qeyd edin.\"],\"636\":[\"stock list qeyd edin.\"],\"637\":[\"stock list qeyd edin.\"],\"638\":[\"stock list qeyd edin.\"],\"639\":[\"stock list qeyd edin.\"],\"640\":[\"stock list qeyd edin.\"],\"641\":[\"stock list qeyd edin.\"],\"642\":[\"stock list qeyd edin.\"],\"643\":[\"stock list qeyd edin.\"],\"644\":[\"stock list qeyd edin.\"],\"645\":[\"stock list qeyd edin.\"],\"646\":[\"stock list qeyd edin.\"],\"647\":[\"stock list qeyd edin.\"],\"648\":[\"stock list qeyd edin.\"],\"649\":[\"stock list qeyd edin.\"],\"650\":[\"stock list qeyd edin.\"],\"651\":[\"stock list qeyd edin.\"],\"652\":[\"stock list qeyd edin.\"],\"653\":[\"stock list qeyd edin.\"],\"654\":[\"stock list qeyd edin.\"],\"655\":[\"stock list qeyd edin.\"],\"656\":[\"stock list qeyd edin.\"],\"657\":[\"stock list qeyd edin.\"],\"658\":[\"stock list qeyd edin.\"],\"659\":[\"stock list qeyd edin.\"],\"660\":[\"stock list qeyd edin.\"],\"661\":[\"stock list qeyd edin.\"],\"662\":[\"stock list qeyd edin.\"],\"663\":[\"stock list qeyd edin.\"],\"664\":[\"stock list qeyd edin.\"],\"665\":[\"stock list qeyd edin.\"],\"666\":[\"stock list qeyd edin.\"],\"667\":[\"stock list qeyd edin.\"],\"668\":[\"stock list qeyd edin.\"],\"669\":[\"stock list qeyd edin.\"],\"670\":[\"stock list qeyd edin.\"],\"671\":[\"stock list qeyd edin.\"],\"672\":[\"stock list qeyd edin.\"],\"673\":[\"stock list qeyd edin.\"],\"674\":[\"stock list qeyd edin.\"],\"675\":[\"stock list qeyd edin.\"],\"676\":[\"stock list qeyd edin.\"],\"677\":[\"stock list qeyd edin.\"],\"678\":[\"stock list qeyd edin.\"],\"679\":[\"stock list qeyd edin.\"],\"680\":[\"stock list qeyd edin.\"],\"681\":[\"stock list qeyd edin.\"],\"682\":[\"stock list qeyd edin.\"],\"683\":[\"stock list qeyd edin.\"],\"684\":[\"stock list qeyd edin.\"],\"685\":[\"stock list qeyd edin.\"],\"686\":[\"stock list qeyd edin.\"],\"687\":[\"stock list qeyd edin.\"],\"688\":[\"stock list qeyd edin.\"],\"689\":[\"stock list qeyd edin.\"],\"690\":[\"stock list qeyd edin.\"],\"691\":[\"stock list qeyd edin.\"],\"692\":[\"stock list qeyd edin.\"],\"693\":[\"stock list qeyd edin.\"],\"694\":[\"stock list qeyd edin.\"],\"695\":[\"stock list qeyd edin.\"],\"696\":[\"stock list qeyd edin.\"],\"697\":[\"stock list qeyd edin.\"],\"698\":[\"stock list qeyd edin.\"],\"699\":[\"stock list qeyd edin.\"],\"700\":[\"stock list qeyd edin.\"],\"701\":[\"stock list qeyd edin.\"],\"702\":[\"stock list qeyd edin.\"],\"703\":[\"stock list qeyd edin.\"],\"704\":[\"stock list qeyd edin.\"],\"705\":[\"stock list qeyd edin.\"],\"706\":[\"stock list qeyd edin.\"],\"707\":[\"stock list qeyd edin.\"],\"708\":[\"stock list qeyd edin.\"],\"709\":[\"stock list qeyd edin.\"],\"710\":[\"stock list qeyd edin.\"],\"711\":[\"stock list qeyd edin.\"],\"712\":[\"stock list qeyd edin.\"],\"713\":[\"stock list qeyd edin.\"],\"714\":[\"stock list qeyd edin.\"],\"715\":[\"stock list qeyd edin.\"],\"716\":[\"stock list qeyd edin.\"],\"717\":[\"stock list qeyd edin.\"],\"718\":[\"stock list qeyd edin.\"],\"719\":[\"stock list qeyd edin.\"],\"720\":[\"stock list qeyd edin.\"],\"721\":[\"stock list qeyd edin.\"],\"722\":[\"stock list qeyd edin.\"],\"723\":[\"stock list qeyd edin.\"],\"724\":[\"stock list qeyd edin.\"],\"725\":[\"stock list qeyd edin.\"],\"726\":[\"stock list qeyd edin.\"],\"727\":[\"stock list qeyd edin.\"],\"728\":[\"stock list qeyd edin.\"],\"729\":[\"stock list qeyd edin.\"],\"730\":[\"stock list qeyd edin.\"],\"731\":[\"stock list qeyd edin.\"],\"732\":[\"stock list qeyd edin.\"],\"733\":[\"stock list qeyd edin.\"],\"734\":[\"stock list qeyd edin.\"],\"3\":[\"stock list qeyd edin.\"],\"4\":[\"stock list qeyd edin.\"],\"5\":[\"stock list qeyd edin.\"],\"6\":[\"stock list qeyd edin.\"],\"7\":[\"stock list qeyd edin.\"],\"8\":[\"stock list qeyd edin.\"],\"9\":[\"stock list qeyd edin.\"],\"10\":[\"stock list qeyd edin.\"],\"11\":[\"stock list qeyd edin.\"],\"12\":[\"stock list qeyd edin.\"],\"13\":[\"stock list qeyd edin.\"],\"14\":[\"stock list qeyd edin.\"],\"15\":[\"stock list qeyd edin.\"],\"16\":[\"stock list qeyd edin.\"],\"17\":[\"stock list qeyd edin.\"],\"18\":[\"stock list qeyd edin.\"],\"19\":[\"stock list qeyd edin.\"],\"20\":[\"stock list qeyd edin.\"],\"21\":[\"stock list qeyd edin.\"],\"22\":[\"stock list qeyd edin.\"],\"23\":[\"stock list qeyd edin.\"],\"24\":[\"stock list qeyd edin.\"],\"25\":[\"stock list qeyd edin.\"],\"26\":[\"stock list qeyd edin.\"],\"27\":[\"stock list qeyd edin.\"],\"28\":[\"stock list qeyd edin.\"],\"29\":[\"stock list qeyd edin.\"],\"30\":[\"stock list qeyd edin.\"],\"31\":[\"stock list qeyd edin.\"],\"32\":[\"stock list qeyd edin.\"],\"33\":[\"stock list qeyd edin.\"],\"35\":[\"stock list qeyd edin.\"],\"36\":[\"stock list qeyd edin.\"],\"37\":[\"stock list qeyd edin.\"],\"38\":[\"stock list qeyd edin.\"],\"39\":[\"stock list qeyd edin.\"],\"735\":[\"stock list qeyd edin.\"],\"736\":[\"stock list qeyd edin.\"],\"737\":[\"stock list qeyd edin.\"],\"738\":[\"stock list qeyd edin.\"],\"739\":[\"stock list qeyd edin.\"],\"740\":[\"stock list qeyd edin.\"],\"741\":[\"stock list qeyd edin.\"],\"742\":[\"stock list qeyd edin.\"],\"743\":[\"stock list qeyd edin.\"],\"744\":[\"stock list qeyd edin.\"],\"745\":[\"stock list qeyd edin.\"],\"746\":[\"stock list qeyd edin.\"],\"747\":[\"stock list qeyd edin.\"],\"748\":[\"stock list qeyd edin.\"],\"749\":[\"stock list qeyd edin.\"],\"750\":[\"stock list qeyd edin.\"],\"751\":[\"stock list qeyd edin.\"],\"752\":[\"stock list qeyd edin.\"],\"753\":[\"stock list qeyd edin.\"],\"754\":[\"stock list qeyd edin.\"],\"755\":[\"stock list qeyd edin.\"],\"756\":[\"stock list qeyd edin.\"],\"757\":[\"stock list qeyd edin.\"],\"758\":[\"stock list qeyd edin.\"],\"759\":[\"stock list qeyd edin.\"],\"760\":[\"stock list qeyd edin.\"],\"761\":[\"stock list qeyd edin.\"],\"762\":[\"stock list qeyd edin.\"],\"763\":[\"stock list qeyd edin.\"],\"764\":[\"stock list qeyd edin.\"],\"765\":[\"stock list qeyd edin.\"],\"766\":[\"stock list qeyd edin.\"],\"767\":[\"stock list qeyd edin.\"],\"768\":[\"stock list qeyd edin.\"],\"769\":[\"stock list qeyd edin.\"],\"770\":[\"stock list qeyd edin.\"],\"771\":[\"stock list qeyd edin.\"],\"772\":[\"stock list qeyd edin.\"],\"773\":[\"stock list qeyd edin.\"],\"774\":[\"stock list qeyd edin.\"],\"775\":[\"stock list qeyd edin.\"],\"776\":[\"stock list qeyd edin.\"],\"777\":[\"stock list qeyd edin.\"],\"778\":[\"stock list qeyd edin.\"],\"779\":[\"stock list qeyd edin.\"],\"780\":[\"stock list qeyd edin.\"],\"781\":[\"stock list qeyd edin.\"],\"782\":[\"stock list qeyd edin.\"],\"783\":[\"stock list qeyd edin.\"],\"784\":[\"stock list qeyd edin.\"],\"785\":[\"stock list qeyd edin.\"],\"786\":[\"stock list qeyd edin.\"],\"787\":[\"stock list qeyd edin.\"],\"788\":[\"stock list qeyd edin.\"],\"789\":[\"stock list qeyd edin.\"],\"790\":[\"stock list qeyd edin.\"],\"791\":[\"stock list qeyd edin.\"],\"792\":[\"stock list qeyd edin.\"],\"793\":[\"stock list qeyd edin.\"],\"41\":[\"stock list qeyd edin.\"],\"42\":[\"stock list qeyd edin.\"],\"43\":[\"stock list qeyd edin.\"],\"44\":[\"stock list qeyd edin.\"],\"45\":[\"stock list qeyd edin.\"],\"46\":[\"stock list qeyd edin.\"],\"48\":[\"stock list qeyd edin.\"],\"49\":[\"stock list qeyd edin.\"],\"50\":[\"stock list qeyd edin.\"],\"51\":[\"stock list qeyd edin.\"],\"52\":[\"stock list qeyd edin.\"],\"53\":[\"stock list qeyd edin.\"],\"54\":[\"stock list qeyd edin.\"],\"55\":[\"stock list qeyd edin.\"],\"56\":[\"stock list qeyd edin.\"],\"57\":[\"stock list qeyd edin.\"],\"58\":[\"stock list qeyd edin.\"],\"59\":[\"stock list qeyd edin.\"],\"60\":[\"stock list qeyd edin.\"],\"61\":[\"stock list qeyd edin.\"],\"62\":[\"stock list qeyd edin.\"],\"63\":[\"stock list qeyd edin.\"],\"64\":[\"stock list qeyd edin.\"],\"65\":[\"stock list qeyd edin.\"],\"66\":[\"stock list qeyd edin.\"],\"67\":[\"stock list qeyd edin.\"],\"794\":[\"stock list qeyd edin.\"],\"795\":[\"stock list qeyd edin.\"],\"796\":[\"stock list qeyd edin.\"],\"797\":[\"stock list qeyd edin.\"],\"798\":[\"stock list qeyd edin.\"],\"799\":[\"stock list qeyd edin.\"],\"800\":[\"stock list qeyd edin.\"],\"801\":[\"stock list qeyd edin.\"],\"802\":[\"stock list qeyd edin.\"],\"803\":[\"stock list qeyd edin.\"],\"804\":[\"stock list qeyd edin.\"],\"805\":[\"stock list qeyd edin.\"],\"806\":[\"stock list qeyd edin.\"],\"807\":[\"stock list qeyd edin.\"],\"808\":[\"stock list qeyd edin.\"],\"809\":[\"stock list qeyd edin.\"],\"810\":[\"stock list qeyd edin.\"],\"811\":[\"stock list qeyd edin.\"],\"812\":[\"stock list qeyd edin.\"],\"813\":[\"stock list qeyd edin.\"],\"814\":[\"stock list qeyd edin.\"],\"815\":[\"stock list qeyd edin.\"],\"816\":[\"stock list qeyd edin.\"],\"817\":[\"stock list qeyd edin.\"],\"818\":[\"stock list qeyd edin.\"],\"819\":[\"stock list qeyd edin.\"],\"820\":[\"stock list qeyd edin.\"],\"821\":[\"stock list qeyd edin.\"],\"822\":[\"stock list qeyd edin.\"],\"823\":[\"stock list qeyd edin.\"],\"824\":[\"stock list qeyd edin.\"],\"825\":[\"stock list qeyd edin.\"],\"826\":[\"stock list qeyd edin.\"],\"69\":[\"stock list qeyd edin.\"],\"70\":[\"stock list qeyd edin.\"],\"71\":[\"stock list qeyd edin.\"],\"72\":[\"stock list qeyd edin.\"],\"73\":[\"stock list qeyd edin.\"],\"74\":[\"stock list qeyd edin.\"],\"75\":[\"stock list qeyd edin.\"],\"77\":[\"stock list qeyd edin.\"],\"78\":[\"stock list qeyd edin.\"],\"827\":[\"stock list qeyd edin.\"],\"828\":[\"stock list qeyd edin.\"],\"829\":[\"stock list qeyd edin.\"],\"830\":[\"stock list qeyd edin.\"],\"831\":[\"stock list qeyd edin.\"],\"832\":[\"stock list qeyd edin.\"],\"833\":[\"stock list qeyd edin.\"],\"834\":[\"stock list qeyd edin.\"],\"835\":[\"stock list qeyd edin.\"],\"836\":[\"stock list qeyd edin.\"],\"837\":[\"stock list qeyd edin.\"],\"838\":[\"stock list qeyd edin.\"],\"839\":[\"stock list qeyd edin.\"],\"840\":[\"stock list qeyd edin.\"],\"841\":[\"stock list qeyd edin.\"],\"842\":[\"stock list qeyd edin.\"],\"843\":[\"stock list qeyd edin.\"],\"844\":[\"stock list qeyd edin.\"],\"845\":[\"stock list qeyd edin.\"],\"846\":[\"stock list qeyd edin.\"],\"847\":[\"stock list qeyd edin.\"],\"848\":[\"stock list qeyd edin.\"],\"849\":[\"stock list qeyd edin.\"],\"850\":[\"stock list qeyd edin.\"],\"851\":[\"stock list qeyd edin.\"],\"852\":[\"stock list qeyd edin.\"],\"853\":[\"stock list qeyd edin.\"],\"854\":[\"stock list qeyd edin.\"],\"855\":[\"stock list qeyd edin.\"],\"856\":[\"stock list qeyd edin.\"],\"857\":[\"stock list qeyd edin.\"],\"858\":[\"stock list qeyd edin.\"],\"859\":[\"stock list qeyd edin.\"],\"860\":[\"stock list qeyd edin.\"],\"861\":[\"stock list qeyd edin.\"],\"862\":[\"stock list qeyd edin.\"],\"863\":[\"stock list qeyd edin.\"],\"864\":[\"stock list qeyd edin.\"],\"865\":[\"stock list qeyd edin.\"],\"866\":[\"stock list qeyd edin.\"],\"867\":[\"stock list qeyd edin.\"],\"868\":[\"stock list qeyd edin.\"],\"869\":[\"stock list qeyd edin.\"],\"870\":[\"stock list qeyd edin.\"],\"871\":[\"stock list qeyd edin.\"],\"872\":[\"stock list qeyd edin.\"],\"873\":[\"stock list qeyd edin.\"],\"874\":[\"stock list qeyd edin.\"],\"875\":[\"stock list qeyd edin.\"],\"876\":[\"stock list qeyd edin.\"],\"877\":[\"stock list qeyd edin.\"],\"878\":[\"stock list qeyd edin.\"],\"879\":[\"stock list qeyd edin.\"],\"880\":[\"stock list qeyd edin.\"],\"881\":[\"stock list qeyd edin.\"],\"882\":[\"stock list qeyd edin.\"],\"883\":[\"stock list qeyd edin.\"],\"884\":[\"stock list qeyd edin.\"],\"885\":[\"stock list qeyd edin.\"],\"886\":[\"stock list qeyd edin.\"],\"887\":[\"stock list qeyd edin.\"],\"888\":[\"stock list qeyd edin.\"],\"889\":[\"stock list qeyd edin.\"],\"890\":[\"stock list qeyd edin.\"],\"891\":[\"stock list qeyd edin.\"],\"892\":[\"stock list qeyd edin.\"],\"893\":[\"stock list qeyd edin.\"],\"894\":[\"stock list qeyd edin.\"],\"895\":[\"stock list qeyd edin.\"],\"896\":[\"stock list qeyd edin.\"],\"897\":[\"stock list qeyd edin.\"],\"898\":[\"stock list qeyd edin.\"],\"899\":[\"stock list qeyd edin.\"],\"900\":[\"stock list qeyd edin.\"],\"901\":[\"stock list qeyd edin.\"],\"902\":[\"stock list qeyd edin.\"],\"903\":[\"stock list qeyd edin.\"],\"904\":[\"stock list qeyd edin.\"],\"905\":[\"stock list qeyd edin.\"],\"906\":[\"stock list qeyd edin.\"],\"907\":[\"stock list qeyd edin.\"],\"908\":[\"stock list qeyd edin.\"],\"909\":[\"stock list qeyd edin.\"],\"910\":[\"stock list qeyd edin.\"],\"911\":[\"stock list qeyd edin.\"],\"912\":[\"stock list qeyd edin.\"],\"913\":[\"stock list qeyd edin.\"],\"914\":[\"stock list qeyd edin.\"],\"915\":[\"stock list qeyd edin.\"],\"916\":[\"stock list qeyd edin.\"],\"917\":[\"stock list qeyd edin.\"],\"918\":[\"stock list qeyd edin.\"],\"919\":[\"stock list qeyd edin.\"],\"920\":[\"stock list qeyd edin.\"],\"921\":[\"stock list qeyd edin.\"],\"922\":[\"stock list qeyd edin.\"],\"923\":[\"stock list qeyd edin.\"],\"924\":[\"stock list qeyd edin.\"],\"925\":[\"stock list qeyd edin.\"],\"926\":[\"stock list qeyd edin.\"],\"927\":[\"stock list qeyd edin.\"],\"928\":[\"stock list qeyd edin.\"],\"929\":[\"stock list qeyd edin.\"],\"930\":[\"stock list qeyd edin.\"],\"931\":[\"stock list qeyd edin.\"],\"932\":[\"stock list qeyd edin.\"],\"933\":[\"stock list qeyd edin.\"],\"934\":[\"stock list qeyd edin.\"],\"935\":[\"stock list qeyd edin.\"],\"936\":[\"stock list qeyd edin.\"],\"937\":[\"stock list qeyd edin.\"],\"938\":[\"stock list qeyd edin.\"],\"939\":[\"stock list qeyd edin.\"],\"940\":[\"stock list qeyd edin.\"],\"941\":[\"stock list qeyd edin.\"],\"942\":[\"stock list qeyd edin.\"],\"943\":[\"stock list qeyd edin.\"],\"944\":[\"stock list qeyd edin.\"],\"945\":[\"stock list qeyd edin.\"],\"946\":[\"stock list qeyd edin.\"],\"947\":[\"stock list qeyd edin.\"],\"948\":[\"stock list qeyd edin.\"],\"949\":[\"stock list qeyd edin.\"],\"950\":[\"stock list qeyd edin.\"],\"951\":[\"stock list qeyd edin.\"],\"952\":[\"stock list qeyd edin.\"],\"953\":[\"stock list qeyd edin.\"],\"954\":[\"stock list qeyd edin.\"],\"955\":[\"stock list qeyd edin.\"],\"956\":[\"stock list qeyd edin.\"],\"957\":[\"stock list qeyd edin.\"],\"958\":[\"stock list qeyd edin.\"],\"959\":[\"stock list qeyd edin.\"],\"960\":[\"stock list qeyd edin.\"],\"961\":[\"stock list qeyd edin.\"],\"962\":[\"stock list qeyd edin.\"],\"963\":[\"stock list qeyd edin.\"],\"964\":[\"stock list qeyd edin.\"],\"965\":[\"stock list qeyd edin.\"],\"966\":[\"stock list qeyd edin.\"],\"967\":[\"stock list qeyd edin.\"],\"968\":[\"stock list qeyd edin.\"],\"969\":[\"stock list qeyd edin.\"],\"970\":[\"stock list qeyd edin.\"],\"971\":[\"stock list qeyd edin.\"],\"972\":[\"stock list qeyd edin.\"],\"973\":[\"stock list qeyd edin.\"],\"974\":[\"stock list qeyd edin.\"],\"975\":[\"stock list qeyd edin.\"],\"976\":[\"stock list qeyd edin.\"],\"977\":[\"stock list qeyd edin.\"],\"978\":[\"stock list qeyd edin.\"],\"979\":[\"stock list qeyd edin.\"],\"980\":[\"stock list qeyd edin.\"],\"981\":[\"stock list qeyd edin.\"],\"982\":[\"stock list qeyd edin.\"],\"983\":[\"stock list qeyd edin.\"],\"984\":[\"stock list qeyd edin.\"],\"985\":[\"stock list qeyd edin.\"],\"986\":[\"stock list qeyd edin.\"],\"987\":[\"stock list qeyd edin.\"],\"988\":[\"stock list qeyd edin.\"],\"989\":[\"stock list qeyd edin.\"],\"990\":[\"stock list qeyd edin.\"],\"991\":[\"stock list qeyd edin.\"],\"992\":[\"stock list qeyd edin.\"],\"993\":[\"stock list qeyd edin.\"],\"994\":[\"stock list qeyd edin.\"],\"995\":[\"stock list qeyd edin.\"],\"996\":[\"stock list qeyd edin.\"],\"997\":[\"stock list qeyd edin.\"],\"998\":[\"stock list qeyd edin.\"],\"999\":[\"stock list qeyd edin.\"],\"1000\":[\"stock list qeyd edin.\"],\"1001\":[\"stock list qeyd edin.\"],\"1002\":[\"stock list qeyd edin.\"],\"1003\":[\"stock list qeyd edin.\"],\"1004\":[\"stock list qeyd edin.\"],\"1005\":[\"stock list qeyd edin.\"],\"1006\":[\"stock list qeyd edin.\"],\"1007\":[\"stock list qeyd edin.\"],\"1008\":[\"stock list qeyd edin.\"],\"1009\":[\"stock list qeyd edin.\"],\"1010\":[\"stock list qeyd edin.\"],\"1011\":[\"stock list qeyd edin.\"],\"1012\":[\"stock list qeyd edin.\"],\"1013\":[\"stock list qeyd edin.\"],\"1014\":[\"stock list qeyd edin.\"],\"1015\":[\"stock list qeyd edin.\"],\"1016\":[\"stock list qeyd edin.\"],\"1017\":[\"stock list qeyd edin.\"],\"1018\":[\"stock list qeyd edin.\"],\"1019\":[\"stock list qeyd edin.\"],\"1020\":[\"stock list qeyd edin.\"],\"1021\":[\"stock list qeyd edin.\"],\"1022\":[\"stock list qeyd edin.\"],\"1023\":[\"stock list qeyd edin.\"],\"1024\":[\"stock list qeyd edin.\"],\"1025\":[\"stock list qeyd edin.\"],\"1026\":[\"stock list qeyd edin.\"],\"1027\":[\"stock list qeyd edin.\"],\"1028\":[\"stock list qeyd edin.\"],\"1029\":[\"stock list qeyd edin.\"],\"1030\":[\"stock list qeyd edin.\"],\"1031\":[\"stock list qeyd edin.\"],\"1032\":[\"stock list qeyd edin.\"],\"1033\":[\"stock list qeyd edin.\"],\"1034\":[\"stock list qeyd edin.\"],\"1035\":[\"stock list qeyd edin.\"],\"1036\":[\"stock list qeyd edin.\"],\"1037\":[\"stock list qeyd edin.\"],\"1038\":[\"stock list qeyd edin.\"],\"1039\":[\"stock list qeyd edin.\"],\"1040\":[\"stock list qeyd edin.\"],\"1041\":[\"stock list qeyd edin.\"],\"1042\":[\"stock list qeyd edin.\"],\"1043\":[\"stock list qeyd edin.\"],\"1044\":[\"stock list qeyd edin.\"],\"1045\":[\"stock list qeyd edin.\"],\"1046\":[\"stock list qeyd edin.\"],\"1047\":[\"stock list qeyd edin.\"],\"1048\":[\"stock list qeyd edin.\"],\"1049\":[\"stock list qeyd edin.\"],\"1050\":[\"stock list qeyd edin.\"],\"1051\":[\"stock list qeyd edin.\"],\"1052\":[\"stock list qeyd edin.\"],\"1053\":[\"stock list qeyd edin.\"],\"1054\":[\"stock list qeyd edin.\"],\"1055\":[\"stock list qeyd edin.\"],\"1056\":[\"stock list qeyd edin.\"],\"1057\":[\"stock list qeyd edin.\"],\"1058\":[\"stock list qeyd edin.\"],\"1059\":[\"stock list qeyd edin.\"],\"1060\":[\"stock list qeyd edin.\"],\"1061\":[\"stock list qeyd edin.\"],\"1062\":[\"stock list qeyd edin.\"],\"1063\":[\"stock list qeyd edin.\"],\"1064\":[\"stock list qeyd edin.\"],\"1065\":[\"stock list qeyd edin.\"],\"1066\":[\"stock list qeyd edin.\"],\"1067\":[\"stock list qeyd edin.\"],\"1068\":[\"stock list qeyd edin.\"],\"1069\":[\"stock list qeyd edin.\"],\"1070\":[\"stock list qeyd edin.\"],\"1071\":[\"stock list qeyd edin.\"],\"1072\":[\"stock list qeyd edin.\"],\"1073\":[\"stock list qeyd edin.\"],\"1074\":[\"stock list qeyd edin.\"],\"1075\":[\"stock list qeyd edin.\"],\"1076\":[\"stock list qeyd edin.\"],\"1077\":[\"stock list qeyd edin.\"],\"1078\":[\"stock list qeyd edin.\"],\"1079\":[\"stock list qeyd edin.\"],\"1080\":[\"stock list qeyd edin.\"],\"1081\":[\"stock list qeyd edin.\"],\"1082\":[\"stock list qeyd edin.\"],\"1083\":[\"stock list qeyd edin.\"],\"1084\":[\"stock list qeyd edin.\"],\"80\":[\"stock list qeyd edin.\"],\"81\":[\"stock list qeyd edin.\"],\"1085\":[\"stock list qeyd edin.\"],\"1086\":[\"stock list qeyd edin.\"],\"1087\":[\"stock list qeyd edin.\"],\"1088\":[\"stock list qeyd edin.\"],\"1089\":[\"stock list qeyd edin.\"],\"1090\":[\"stock list qeyd edin.\"],\"1091\":[\"stock list qeyd edin.\"],\"1092\":[\"stock list qeyd edin.\"],\"1093\":[\"stock list qeyd edin.\"],\"1094\":[\"stock list qeyd edin.\"],\"1095\":[\"stock list qeyd edin.\"],\"1096\":[\"stock list qeyd edin.\"],\"1097\":[\"stock list qeyd edin.\"],\"1098\":[\"stock list qeyd edin.\"],\"1099\":[\"stock list qeyd edin.\"],\"1100\":[\"stock list qeyd edin.\"],\"1101\":[\"stock list qeyd edin.\"],\"1102\":[\"stock list qeyd edin.\"],\"1103\":[\"stock list qeyd edin.\"],\"1104\":[\"stock list qeyd edin.\"],\"1105\":[\"stock list qeyd edin.\"],\"83\":[\"stock list qeyd edin.\"],\"84\":[\"stock list qeyd edin.\"],\"85\":[\"stock list qeyd edin.\"],\"1106\":[\"stock list qeyd edin.\"],\"1107\":[\"stock list qeyd edin.\"],\"1108\":[\"stock list qeyd edin.\"],\"1109\":[\"stock list qeyd edin.\"],\"1110\":[\"stock list qeyd edin.\"],\"1111\":[\"stock list qeyd edin.\"],\"1112\":[\"stock list qeyd edin.\"],\"1113\":[\"stock list qeyd edin.\"],\"1114\":[\"stock list qeyd edin.\"],\"1115\":[\"stock list qeyd edin.\"],\"1116\":[\"stock list qeyd edin.\"],\"1117\":[\"stock list qeyd edin.\"],\"1118\":[\"stock list qeyd edin.\"],\"1119\":[\"stock list qeyd edin.\"],\"1120\":[\"stock list qeyd edin.\"],\"1121\":[\"stock list qeyd edin.\"],\"1122\":[\"stock list qeyd edin.\"],\"1123\":[\"stock list qeyd edin.\"],\"1124\":[\"stock list qeyd edin.\"],\"1125\":[\"stock list qeyd edin.\"],\"1126\":[\"stock list qeyd edin.\"],\"1127\":[\"stock list qeyd edin.\"],\"1128\":[\"stock list qeyd edin.\"],\"1129\":[\"stock list qeyd edin.\"],\"1130\":[\"stock list qeyd edin.\"],\"1131\":[\"stock list qeyd edin.\"],\"1132\":[\"stock list qeyd edin.\"],\"1133\":[\"stock list qeyd edin.\"],\"1134\":[\"stock list qeyd edin.\"],\"1135\":[\"stock list qeyd edin.\"],\"1136\":[\"stock list qeyd edin.\"],\"1137\":[\"stock list qeyd edin.\"],\"1138\":[\"stock list qeyd edin.\"],\"1139\":[\"stock list qeyd edin.\"],\"1140\":[\"stock list qeyd edin.\"],\"1141\":[\"stock list qeyd edin.\"],\"1142\":[\"stock list qeyd edin.\"],\"1143\":[\"stock list qeyd edin.\"],\"1144\":[\"stock list qeyd edin.\"],\"1145\":[\"stock list qeyd edin.\"],\"1146\":[\"stock list qeyd edin.\"],\"1147\":[\"stock list qeyd edin.\"],\"1148\":[\"stock list qeyd edin.\"],\"1149\":[\"stock list qeyd edin.\"],\"1150\":[\"stock list qeyd edin.\"],\"1151\":[\"stock list qeyd edin.\"],\"1152\":[\"stock list qeyd edin.\"],\"1153\":[\"stock list qeyd edin.\"],\"1154\":[\"stock list qeyd edin.\"],\"1155\":[\"stock list qeyd edin.\"],\"1156\":[\"stock list qeyd edin.\"],\"1157\":[\"stock list qeyd edin.\"],\"1158\":[\"stock list qeyd edin.\"],\"1159\":[\"stock list qeyd edin.\"],\"1160\":[\"stock list qeyd edin.\"],\"1161\":[\"stock list qeyd edin.\"],\"1162\":[\"stock list qeyd edin.\"],\"1163\":[\"stock list qeyd edin.\"],\"1164\":[\"stock list qeyd edin.\"],\"1165\":[\"stock list qeyd edin.\"],\"1166\":[\"stock list qeyd edin.\"],\"1167\":[\"stock list qeyd edin.\"],\"1168\":[\"stock list qeyd edin.\"],\"1169\":[\"stock list qeyd edin.\"],\"1170\":[\"stock list qeyd edin.\"],\"1171\":[\"stock list qeyd edin.\"],\"1172\":[\"stock list qeyd edin.\"],\"1173\":[\"stock list qeyd edin.\"],\"1174\":[\"stock list qeyd edin.\"],\"1175\":[\"stock list qeyd edin.\"],\"1176\":[\"stock list qeyd edin.\"],\"1177\":[\"stock list qeyd edin.\"],\"1178\":[\"stock list qeyd edin.\"],\"1179\":[\"stock list qeyd edin.\"],\"1180\":[\"stock list qeyd edin.\"],\"1181\":[\"stock list qeyd edin.\"],\"1182\":[\"stock list qeyd edin.\"],\"1183\":[\"stock list qeyd edin.\"],\"1184\":[\"stock list qeyd edin.\"],\"1185\":[\"stock list qeyd edin.\"],\"1186\":[\"stock list qeyd edin.\"],\"1187\":[\"stock list qeyd edin.\"],\"1188\":[\"stock list qeyd edin.\"],\"1189\":[\"stock list qeyd edin.\"],\"1190\":[\"stock list qeyd edin.\"],\"1191\":[\"stock list qeyd edin.\"],\"1192\":[\"stock list qeyd edin.\"],\"1193\":[\"stock list qeyd edin.\"],\"1194\":[\"stock list qeyd edin.\"],\"1195\":[\"stock list qeyd edin.\"],\"1196\":[\"stock list qeyd edin.\"],\"1197\":[\"stock list qeyd edin.\"],\"1198\":[\"stock list qeyd edin.\"],\"1199\":[\"stock list qeyd edin.\"],\"1200\":[\"stock list qeyd edin.\"],\"1201\":[\"stock list qeyd edin.\"],\"1202\":[\"stock list qeyd edin.\"],\"1203\":[\"stock list qeyd edin.\"],\"1204\":[\"stock list qeyd edin.\"],\"1205\":[\"stock list qeyd edin.\"],\"1206\":[\"stock list qeyd edin.\"],\"1207\":[\"stock list qeyd edin.\"],\"1208\":[\"stock list qeyd edin.\"],\"1209\":[\"stock list qeyd edin.\"],\"1210\":[\"stock list qeyd edin.\"],\"1211\":[\"stock list qeyd edin.\"],\"1212\":[\"stock list qeyd edin.\"],\"1213\":[\"stock list qeyd edin.\"],\"1214\":[\"stock list qeyd edin.\"],\"1215\":[\"stock list qeyd edin.\"],\"1216\":[\"stock list qeyd edin.\"],\"1217\":[\"stock list qeyd edin.\"],\"1218\":[\"stock list qeyd edin.\"],\"1219\":[\"stock list qeyd edin.\"],\"1220\":[\"stock list qeyd edin.\"],\"1221\":[\"stock list qeyd edin.\"],\"1222\":[\"stock list qeyd edin.\"],\"1223\":[\"stock list qeyd edin.\"],\"1224\":[\"stock list qeyd edin.\"],\"1225\":[\"stock list qeyd edin.\"],\"1226\":[\"stock list qeyd edin.\"],\"1227\":[\"stock list qeyd edin.\"],\"1228\":[\"stock list qeyd edin.\"],\"1229\":[\"stock list qeyd edin.\"],\"1230\":[\"stock list qeyd edin.\"],\"1231\":[\"stock list qeyd edin.\"],\"1232\":[\"stock list qeyd edin.\"],\"1233\":[\"stock list qeyd edin.\"],\"1234\":[\"stock list qeyd edin.\"],\"1235\":[\"stock list qeyd edin.\"],\"1236\":[\"stock list qeyd edin.\"],\"1237\":[\"stock list qeyd edin.\"],\"1238\":[\"stock list qeyd edin.\"],\"1239\":[\"stock list qeyd edin.\"],\"1240\":[\"stock list qeyd edin.\"],\"1241\":[\"stock list qeyd edin.\"],\"1242\":[\"stock list qeyd edin.\"],\"1243\":[\"stock list qeyd edin.\"],\"1244\":[\"stock list qeyd edin.\"],\"1245\":[\"stock list qeyd edin.\"],\"1246\":[\"stock list qeyd edin.\"],\"1247\":[\"stock list qeyd edin.\"],\"1248\":[\"stock list qeyd edin.\"],\"1249\":[\"stock list qeyd edin.\"],\"1250\":[\"stock list qeyd edin.\"],\"1251\":[\"stock list qeyd edin.\"],\"1252\":[\"stock list qeyd edin.\"],\"1253\":[\"stock list qeyd edin.\"],\"1254\":[\"stock list qeyd edin.\"],\"1255\":[\"stock list qeyd edin.\"],\"1256\":[\"stock list qeyd edin.\"],\"1257\":[\"stock list qeyd edin.\"],\"1258\":[\"stock list qeyd edin.\"],\"1259\":[\"stock list qeyd edin.\"],\"1260\":[\"stock list qeyd edin.\"],\"1261\":[\"stock list qeyd edin.\"],\"1262\":[\"stock list qeyd edin.\"],\"1263\":[\"stock list qeyd edin.\"],\"1264\":[\"stock list qeyd edin.\"],\"1265\":[\"stock list qeyd edin.\"],\"1266\":[\"stock list qeyd edin.\"],\"1267\":[\"stock list qeyd edin.\"],\"1268\":[\"stock list qeyd edin.\"],\"1269\":[\"stock list qeyd edin.\"],\"1270\":[\"stock list qeyd edin.\"],\"1271\":[\"stock list qeyd edin.\"],\"1272\":[\"stock list qeyd edin.\"],\"1273\":[\"stock list qeyd edin.\"],\"1274\":[\"stock list qeyd edin.\"],\"1275\":[\"stock list qeyd edin.\"],\"1276\":[\"stock list qeyd edin.\"],\"1277\":[\"stock list qeyd edin.\"],\"1278\":[\"stock list qeyd edin.\"],\"1279\":[\"stock list qeyd edin.\"],\"1280\":[\"stock list qeyd edin.\"],\"1281\":[\"stock list qeyd edin.\"],\"1282\":[\"stock list qeyd edin.\"],\"1283\":[\"stock list qeyd edin.\"],\"1284\":[\"stock list qeyd edin.\"],\"1285\":[\"stock list qeyd edin.\"],\"1286\":[\"stock list qeyd edin.\"],\"1287\":[\"stock list qeyd edin.\"],\"1288\":[\"stock list qeyd edin.\"],\"1289\":[\"stock list qeyd edin.\"],\"1290\":[\"stock list qeyd edin.\"],\"1291\":[\"stock list qeyd edin.\"],\"1292\":[\"stock list qeyd edin.\"],\"1293\":[\"stock list qeyd edin.\"],\"1294\":[\"stock list qeyd edin.\"],\"1295\":[\"stock list qeyd edin.\"],\"1296\":[\"stock list qeyd edin.\"],\"1297\":[\"stock list qeyd edin.\"],\"1298\":[\"stock list qeyd edin.\"],\"1299\":[\"stock list qeyd edin.\"],\"1300\":[\"stock list qeyd edin.\"],\"1301\":[\"stock list qeyd edin.\"],\"1302\":[\"stock list qeyd edin.\"],\"1303\":[\"stock list qeyd edin.\"],\"1304\":[\"stock list qeyd edin.\"],\"1305\":[\"stock list qeyd edin.\"],\"1306\":[\"stock list qeyd edin.\"],\"1307\":[\"stock list qeyd edin.\"],\"1308\":[\"stock list qeyd edin.\"],\"1309\":[\"stock list qeyd edin.\"],\"1310\":[\"stock list qeyd edin.\"],\"1311\":[\"stock list qeyd edin.\"],\"1312\":[\"stock list qeyd edin.\"],\"1313\":[\"stock list qeyd edin.\"],\"1314\":[\"stock list qeyd edin.\"],\"1315\":[\"stock list qeyd edin.\"],\"1316\":[\"stock list qeyd edin.\"],\"1317\":[\"stock list qeyd edin.\"],\"1318\":[\"stock list qeyd edin.\"],\"1319\":[\"stock list qeyd edin.\"],\"1320\":[\"stock list qeyd edin.\"],\"1321\":[\"stock list qeyd edin.\"],\"1322\":[\"stock list qeyd edin.\"],\"1323\":[\"stock list qeyd edin.\"],\"1324\":[\"stock list qeyd edin.\"],\"1325\":[\"stock list qeyd edin.\"],\"1326\":[\"stock list qeyd edin.\"],\"1327\":[\"stock list qeyd edin.\"],\"1328\":[\"stock list qeyd edin.\"],\"1329\":[\"stock list qeyd edin.\"],\"1330\":[\"stock list qeyd edin.\"],\"1331\":[\"stock list qeyd edin.\"],\"1332\":[\"stock list qeyd edin.\"],\"1333\":[\"stock list qeyd edin.\"],\"1334\":[\"stock list qeyd edin.\"],\"1335\":[\"stock list qeyd edin.\"],\"1336\":[\"stock list qeyd edin.\"],\"1337\":[\"stock list qeyd edin.\"],\"1338\":[\"stock list qeyd edin.\"],\"1339\":[\"stock list qeyd edin.\"],\"1340\":[\"stock list qeyd edin.\"],\"1341\":[\"stock list qeyd edin.\"],\"1342\":[\"stock list qeyd edin.\"],\"1343\":[\"stock list qeyd edin.\"],\"1344\":[\"stock list qeyd edin.\"],\"1345\":[\"stock list qeyd edin.\"],\"1346\":[\"stock list qeyd edin.\"],\"1347\":[\"stock list qeyd edin.\"],\"1348\":[\"stock list qeyd edin.\"],\"1349\":[\"stock list qeyd edin.\"],\"1350\":[\"stock list qeyd edin.\"],\"1351\":[\"stock list qeyd edin.\"],\"1352\":[\"stock list qeyd edin.\"],\"1353\":[\"stock list qeyd edin.\"],\"1354\":[\"stock list qeyd edin.\"],\"1355\":[\"stock list qeyd edin.\"],\"1356\":[\"stock list qeyd edin.\"],\"1357\":[\"stock list qeyd edin.\"],\"1358\":[\"stock list qeyd edin.\"],\"1359\":[\"stock list qeyd edin.\"],\"1360\":[\"stock list qeyd edin.\"],\"1361\":[\"stock list qeyd edin.\"],\"1362\":[\"stock list qeyd edin.\"],\"1363\":[\"stock list qeyd edin.\"],\"1364\":[\"stock list qeyd edin.\"],\"1365\":[\"stock list qeyd edin.\"],\"1366\":[\"stock list qeyd edin.\"],\"1367\":[\"stock list qeyd edin.\"],\"1368\":[\"stock list qeyd edin.\"],\"1369\":[\"stock list qeyd edin.\"],\"1370\":[\"stock list qeyd edin.\"],\"1371\":[\"stock list qeyd edin.\"],\"1372\":[\"stock list qeyd edin.\"],\"1373\":[\"stock list qeyd edin.\"],\"1374\":[\"stock list qeyd edin.\"],\"1375\":[\"stock list qeyd edin.\"],\"1376\":[\"stock list qeyd edin.\"],\"1377\":[\"stock list qeyd edin.\"],\"1378\":[\"stock list qeyd edin.\"],\"1379\":[\"stock list qeyd edin.\"],\"1380\":[\"stock list qeyd edin.\"],\"1381\":[\"stock list qeyd edin.\"],\"1382\":[\"stock list qeyd edin.\"],\"1383\":[\"stock list qeyd edin.\"],\"1384\":[\"stock list qeyd edin.\"],\"1385\":[\"stock list qeyd edin.\"],\"1386\":[\"stock list qeyd edin.\"],\"1387\":[\"stock list qeyd edin.\"],\"1388\":[\"stock list qeyd edin.\"],\"1389\":[\"stock list qeyd edin.\"],\"1390\":[\"stock list qeyd edin.\"],\"1391\":[\"stock list qeyd edin.\"],\"1392\":[\"stock list qeyd edin.\"],\"1393\":[\"stock list qeyd edin.\"],\"1394\":[\"stock list qeyd edin.\"],\"1395\":[\"stock list qeyd edin.\"],\"1396\":[\"stock list qeyd edin.\"],\"1397\":[\"stock list qeyd edin.\"],\"1398\":[\"stock list qeyd edin.\"],\"1399\":[\"stock list qeyd edin.\"],\"1400\":[\"stock list qeyd edin.\"],\"1401\":[\"stock list qeyd edin.\"],\"1402\":[\"stock list qeyd edin.\"],\"1403\":[\"stock list qeyd edin.\"],\"1404\":[\"stock list qeyd edin.\"],\"1405\":[\"stock list qeyd edin.\"],\"1406\":[\"stock list qeyd edin.\"],\"1407\":[\"stock list qeyd edin.\"],\"1408\":[\"stock list qeyd edin.\"],\"1409\":[\"stock list qeyd edin.\"],\"1410\":[\"stock list qeyd edin.\"],\"1411\":[\"stock list qeyd edin.\"],\"1412\":[\"stock list qeyd edin.\"],\"1413\":[\"stock list qeyd edin.\"],\"88\":[\"stock list qeyd edin.\"],\"89\":[\"stock list qeyd edin.\"],\"90\":[\"stock list qeyd edin.\"],\"91\":[\"stock list qeyd edin.\"],\"92\":[\"stock list qeyd edin.\"],\"93\":[\"stock list qeyd edin.\"],\"94\":[\"stock list qeyd edin.\"],\"95\":[\"stock list qeyd edin.\"],\"96\":[\"stock list qeyd edin.\"],\"97\":[\"stock list qeyd edin.\"],\"98\":[\"stock list qeyd edin.\"],\"99\":[\"stock list qeyd edin.\"],\"100\":[\"stock list qeyd edin.\"],\"101\":[\"stock list qeyd edin.\"],\"102\":[\"stock list qeyd edin.\"],\"103\":[\"stock list qeyd edin.\"],\"104\":[\"stock list qeyd edin.\"],\"105\":[\"stock list qeyd edin.\"],\"106\":[\"stock list qeyd edin.\"],\"107\":[\"stock list qeyd edin.\"],\"108\":[\"stock list qeyd edin.\"],\"109\":[\"stock list qeyd edin.\"],\"110\":[\"stock list qeyd edin.\"],\"111\":[\"stock list qeyd edin.\"],\"112\":[\"stock list qeyd edin.\"],\"113\":[\"stock list qeyd edin.\"],\"114\":[\"stock list qeyd edin.\"],\"115\":[\"stock list qeyd edin.\"],\"116\":[\"stock list qeyd edin.\"],\"117\":[\"stock list qeyd edin.\"],\"118\":[\"stock list qeyd edin.\"],\"119\":[\"stock list qeyd edin.\"],\"120\":[\"stock list qeyd edin.\"],\"121\":[\"stock list qeyd edin.\"],\"122\":[\"stock list qeyd edin.\"],\"123\":[\"stock list qeyd edin.\"],\"124\":[\"stock list qeyd edin.\"],\"125\":[\"stock list qeyd edin.\"],\"126\":[\"stock list qeyd edin.\"],\"127\":[\"stock list qeyd edin.\"],\"128\":[\"stock list qeyd edin.\"],\"129\":[\"stock list qeyd edin.\"],\"130\":[\"stock list qeyd edin.\"],\"131\":[\"stock list qeyd edin.\"],\"132\":[\"stock list qeyd edin.\"],\"133\":[\"stock list qeyd edin.\"],\"134\":[\"stock list qeyd edin.\"],\"135\":[\"stock list qeyd edin.\"],\"136\":[\"stock list qeyd edin.\"],\"137\":[\"stock list qeyd edin.\"],\"138\":[\"stock list qeyd edin.\"],\"139\":[\"stock list qeyd edin.\"],\"140\":[\"stock list qeyd edin.\"],\"141\":[\"stock list qeyd edin.\"],\"142\":[\"stock list qeyd edin.\"],\"143\":[\"stock list qeyd edin.\"],\"144\":[\"stock list qeyd edin.\"],\"145\":[\"stock list qeyd edin.\"],\"146\":[\"stock list qeyd edin.\"],\"147\":[\"stock list qeyd edin.\"],\"148\":[\"stock list qeyd edin.\"],\"149\":[\"stock list qeyd edin.\"],\"150\":[\"stock list qeyd edin.\"],\"151\":[\"stock list qeyd edin.\"],\"152\":[\"stock list qeyd edin.\"],\"153\":[\"stock list qeyd edin.\"],\"154\":[\"stock list qeyd edin.\"],\"155\":[\"stock list qeyd edin.\"],\"156\":[\"stock list qeyd edin.\"],\"157\":[\"stock list qeyd edin.\"],\"158\":[\"stock list qeyd edin.\"],\"159\":[\"stock list qeyd edin.\"],\"160\":[\"stock list qeyd edin.\"],\"161\":[\"stock list qeyd edin.\"],\"162\":[\"stock list qeyd edin.\"],\"163\":[\"stock list qeyd edin.\"],\"164\":[\"stock list qeyd edin.\"],\"165\":[\"stock list qeyd edin.\"],\"166\":[\"stock list qeyd edin.\"],\"167\":[\"stock list qeyd edin.\"],\"168\":[\"stock list qeyd edin.\"],\"169\":[\"stock list qeyd edin.\"],\"170\":[\"stock list qeyd edin.\"],\"171\":[\"stock list qeyd edin.\"],\"172\":[\"stock list qeyd edin.\"],\"173\":[\"stock list qeyd edin.\"],\"174\":[\"stock list qeyd edin.\"],\"175\":[\"stock list qeyd edin.\"],\"176\":[\"stock list qeyd edin.\"],\"177\":[\"stock list qeyd edin.\"],\"178\":[\"stock list qeyd edin.\"],\"179\":[\"stock list qeyd edin.\"],\"180\":[\"stock list qeyd edin.\"],\"181\":[\"stock list qeyd edin.\"],\"182\":[\"stock list qeyd edin.\"],\"183\":[\"stock list qeyd edin.\"],\"184\":[\"stock list qeyd edin.\"],\"185\":[\"stock list qeyd edin.\"],\"186\":[\"stock list qeyd edin.\"],\"187\":[\"stock list qeyd edin.\"],\"188\":[\"stock list qeyd edin.\"],\"189\":[\"stock list qeyd edin.\"],\"190\":[\"stock list qeyd edin.\"],\"191\":[\"stock list qeyd edin.\"],\"192\":[\"stock list qeyd edin.\"],\"193\":[\"stock list qeyd edin.\"],\"194\":[\"stock list qeyd edin.\"],\"195\":[\"stock list qeyd edin.\"],\"196\":[\"stock list qeyd edin.\"],\"197\":[\"stock list qeyd edin.\"],\"198\":[\"stock list qeyd edin.\"],\"199\":[\"stock list qeyd edin.\"],\"200\":[\"stock list qeyd edin.\"],\"201\":[\"stock list qeyd edin.\"],\"202\":[\"stock list qeyd edin.\"],\"203\":[\"stock list qeyd edin.\"],\"204\":[\"stock list qeyd edin.\"],\"205\":[\"stock list qeyd edin.\"],\"206\":[\"stock list qeyd edin.\"],\"207\":[\"stock list qeyd edin.\"],\"208\":[\"stock list qeyd edin.\"],\"209\":[\"stock list qeyd edin.\"],\"210\":[\"stock list qeyd edin.\"],\"211\":[\"stock list qeyd edin.\"],\"212\":[\"stock list qeyd edin.\"],\"213\":[\"stock list qeyd edin.\"],\"214\":[\"stock list qeyd edin.\"],\"215\":[\"stock list qeyd edin.\"],\"216\":[\"stock list qeyd edin.\"],\"217\":[\"stock list qeyd edin.\"],\"218\":[\"stock list qeyd edin.\"],\"219\":[\"stock list qeyd edin.\"],\"220\":[\"stock list qeyd edin.\"],\"221\":[\"stock list qeyd edin.\"],\"222\":[\"stock list qeyd edin.\"],\"223\":[\"stock list qeyd edin.\"],\"224\":[\"stock list qeyd edin.\"],\"225\":[\"stock list qeyd edin.\"],\"226\":[\"stock list qeyd edin.\"],\"227\":[\"stock list qeyd edin.\"],\"228\":[\"stock list qeyd edin.\"],\"229\":[\"stock list qeyd edin.\"],\"230\":[\"stock list qeyd edin.\"],\"231\":[\"stock list qeyd edin.\"],\"232\":[\"stock list qeyd edin.\"],\"233\":[\"stock list qeyd edin.\"],\"234\":[\"stock list qeyd edin.\"],\"235\":[\"stock list qeyd edin.\"],\"236\":[\"stock list qeyd edin.\"],\"237\":[\"stock list qeyd edin.\"],\"238\":[\"stock list qeyd edin.\"],\"239\":[\"stock list qeyd edin.\"],\"240\":[\"stock list qeyd edin.\"],\"241\":[\"stock list qeyd edin.\"],\"242\":[\"stock list qeyd edin.\"],\"243\":[\"stock list qeyd edin.\"],\"244\":[\"stock list qeyd edin.\"],\"245\":[\"stock list qeyd edin.\"],\"246\":[\"stock list qeyd edin.\"],\"247\":[\"stock list qeyd edin.\"],\"248\":[\"stock list qeyd edin.\"],\"249\":[\"stock list qeyd edin.\"],\"250\":[\"stock list qeyd edin.\"],\"251\":[\"stock list qeyd edin.\"],\"252\":[\"stock list qeyd edin.\"],\"253\":[\"stock list qeyd edin.\"],\"254\":[\"stock list qeyd edin.\"],\"255\":[\"stock list qeyd edin.\"],\"256\":[\"stock list qeyd edin.\"],\"257\":[\"stock list qeyd edin.\"],\"258\":[\"stock list qeyd edin.\"],\"259\":[\"stock list qeyd edin.\"],\"260\":[\"stock list qeyd edin.\"],\"261\":[\"stock list qeyd edin.\"],\"262\":[\"stock list qeyd edin.\"],\"263\":[\"stock list qeyd edin.\"],\"264\":[\"stock list qeyd edin.\"],\"265\":[\"stock list qeyd edin.\"],\"266\":[\"stock list qeyd edin.\"],\"267\":[\"stock list qeyd edin.\"],\"268\":[\"stock list qeyd edin.\"],\"269\":[\"stock list qeyd edin.\"],\"270\":[\"stock list qeyd edin.\"],\"271\":[\"stock list qeyd edin.\"],\"272\":[\"stock list qeyd edin.\"],\"273\":[\"stock list qeyd edin.\"],\"274\":[\"stock list qeyd edin.\"],\"275\":[\"stock list qeyd edin.\"],\"276\":[\"stock list qeyd edin.\"],\"277\":[\"stock list qeyd edin.\"],\"278\":[\"stock list qeyd edin.\"],\"279\":[\"stock list qeyd edin.\"],\"280\":[\"stock list qeyd edin.\"],\"281\":[\"stock list qeyd edin.\"],\"282\":[\"stock list qeyd edin.\"],\"283\":[\"stock list qeyd edin.\"],\"284\":[\"stock list qeyd edin.\"],\"285\":[\"stock list qeyd edin.\"],\"286\":[\"stock list qeyd edin.\"],\"287\":[\"stock list qeyd edin.\"],\"288\":[\"stock list qeyd edin.\"],\"289\":[\"stock list qeyd edin.\"],\"290\":[\"stock list qeyd edin.\"],\"291\":[\"stock list qeyd edin.\"],\"292\":[\"stock list qeyd edin.\"],\"293\":[\"stock list qeyd edin.\"],\"294\":[\"stock list qeyd edin.\"],\"295\":[\"stock list qeyd edin.\"],\"296\":[\"stock list qeyd edin.\"],\"297\":[\"stock list qeyd edin.\"],\"298\":[\"stock list qeyd edin.\"],\"299\":[\"stock list qeyd edin.\"],\"300\":[\"stock list qeyd edin.\"],\"301\":[\"stock list qeyd edin.\"],\"302\":[\"stock list qeyd edin.\"],\"303\":[\"stock list qeyd edin.\"],\"304\":[\"stock list qeyd edin.\"],\"305\":[\"stock list qeyd edin.\"],\"306\":[\"stock list qeyd edin.\"],\"307\":[\"stock list qeyd edin.\"],\"308\":[\"stock list qeyd edin.\"],\"309\":[\"stock list qeyd edin.\"],\"310\":[\"stock list qeyd edin.\"],\"311\":[\"stock list qeyd edin.\"],\"312\":[\"stock list qeyd edin.\"],\"313\":[\"stock list qeyd edin.\"],\"314\":[\"stock list qeyd edin.\"],\"315\":[\"stock list qeyd edin.\"],\"316\":[\"stock list qeyd edin.\"],\"317\":[\"stock list qeyd edin.\"],\"318\":[\"stock list qeyd edin.\"],\"319\":[\"stock list qeyd edin.\"],\"320\":[\"stock list qeyd edin.\"],\"321\":[\"stock list qeyd edin.\"],\"322\":[\"stock list qeyd edin.\"],\"323\":[\"stock list qeyd edin.\"],\"324\":[\"stock list qeyd edin.\"],\"325\":[\"stock list qeyd edin.\"],\"326\":[\"stock list qeyd edin.\"],\"327\":[\"stock list qeyd edin.\"],\"328\":[\"stock list qeyd edin.\"],\"329\":[\"stock list qeyd edin.\"],\"330\":[\"stock list qeyd edin.\"],\"331\":[\"stock list qeyd edin.\"],\"332\":[\"stock list qeyd edin.\"],\"333\":[\"stock list qeyd edin.\"],\"334\":[\"stock list qeyd edin.\"],\"335\":[\"stock list qeyd edin.\"],\"336\":[\"stock list qeyd edin.\"],\"337\":[\"stock list qeyd edin.\"],\"338\":[\"stock list qeyd edin.\"],\"339\":[\"stock list qeyd edin.\"],\"340\":[\"stock list qeyd edin.\"],\"341\":[\"stock list qeyd edin.\"],\"342\":[\"stock list qeyd edin.\"],\"343\":[\"stock list qeyd edin.\"],\"344\":[\"stock list qeyd edin.\"],\"345\":[\"stock list qeyd edin.\"],\"346\":[\"stock list qeyd edin.\"],\"347\":[\"stock list qeyd edin.\"],\"348\":[\"stock list qeyd edin.\"],\"349\":[\"stock list qeyd edin.\"],\"350\":[\"stock list qeyd edin.\"],\"351\":[\"stock list qeyd edin.\"],\"352\":[\"stock list qeyd edin.\"],\"353\":[\"stock list qeyd edin.\"],\"354\":[\"stock list qeyd edin.\"],\"355\":[\"stock list qeyd edin.\"],\"356\":[\"stock list qeyd edin.\"],\"357\":[\"stock list qeyd edin.\"],\"358\":[\"stock list qeyd edin.\"],\"359\":[\"stock list qeyd edin.\"],\"360\":[\"stock list qeyd edin.\"],\"361\":[\"stock list qeyd edin.\"],\"362\":[\"stock list qeyd edin.\"],\"363\":[\"stock list qeyd edin.\"],\"364\":[\"stock list qeyd edin.\"],\"365\":[\"stock list qeyd edin.\"],\"366\":[\"stock list qeyd edin.\"],\"367\":[\"stock list qeyd edin.\"],\"368\":[\"stock list qeyd edin.\"],\"369\":[\"stock list qeyd edin.\"],\"370\":[\"stock list qeyd edin.\"],\"371\":[\"stock list qeyd edin.\"],\"372\":[\"stock list qeyd edin.\"],\"373\":[\"stock list qeyd edin.\"],\"374\":[\"stock list qeyd edin.\"],\"375\":[\"stock list qeyd edin.\"],\"376\":[\"stock list qeyd edin.\"],\"377\":[\"stock list qeyd edin.\"],\"378\":[\"stock list qeyd edin.\"],\"379\":[\"stock list qeyd edin.\"],\"380\":[\"stock list qeyd edin.\"],\"381\":[\"stock list qeyd edin.\"],\"382\":[\"stock list qeyd edin.\"],\"383\":[\"stock list qeyd edin.\"],\"384\":[\"stock list qeyd edin.\"],\"385\":[\"stock list qeyd edin.\"],\"386\":[\"stock list qeyd edin.\"],\"387\":[\"stock list qeyd edin.\"],\"388\":[\"stock list qeyd edin.\"],\"389\":[\"stock list qeyd edin.\"],\"390\":[\"stock list qeyd edin.\"],\"391\":[\"stock list qeyd edin.\"],\"392\":[\"stock list qeyd edin.\"],\"393\":[\"stock list qeyd edin.\"],\"394\":[\"stock list qeyd edin.\"],\"395\":[\"stock list qeyd edin.\"],\"396\":[\"stock list qeyd edin.\"],\"397\":[\"stock list qeyd edin.\"],\"398\":[\"stock list qeyd edin.\"],\"399\":[\"stock list qeyd edin.\"],\"400\":[\"stock list qeyd edin.\"],\"401\":[\"stock list qeyd edin.\"],\"402\":[\"stock list qeyd edin.\"],\"403\":[\"stock list qeyd edin.\"],\"404\":[\"stock list qeyd edin.\"],\"405\":[\"stock list qeyd edin.\"],\"406\":[\"stock list qeyd edin.\"],\"407\":[\"stock list qeyd edin.\"],\"408\":[\"stock list qeyd edin.\"],\"409\":[\"stock list qeyd edin.\"],\"410\":[\"stock list qeyd edin.\"],\"411\":[\"stock list qeyd edin.\"],\"412\":[\"stock list qeyd edin.\"],\"413\":[\"stock list qeyd edin.\"],\"414\":[\"stock list qeyd edin.\"],\"415\":[\"stock list qeyd edin.\"],\"416\":[\"stock list qeyd edin.\"],\"417\":[\"stock list qeyd edin.\"],\"418\":[\"stock list qeyd edin.\"],\"419\":[\"stock list qeyd edin.\"],\"420\":[\"stock list qeyd edin.\"],\"421\":[\"stock list qeyd edin.\"],\"422\":[\"stock list qeyd edin.\"],\"423\":[\"stock list qeyd edin.\"],\"424\":[\"stock list qeyd edin.\"],\"425\":[\"stock list qeyd edin.\"],\"426\":[\"stock list qeyd edin.\"],\"427\":[\"stock list qeyd edin.\"],\"428\":[\"stock list qeyd edin.\"],\"429\":[\"stock list qeyd edin.\"],\"430\":[\"stock list qeyd edin.\"],\"431\":[\"stock list qeyd edin.\"],\"432\":[\"stock list qeyd edin.\"],\"433\":[\"stock list qeyd edin.\"],\"434\":[\"stock list qeyd edin.\"],\"435\":[\"stock list qeyd edin.\"],\"436\":[\"stock list qeyd edin.\"],\"437\":[\"stock list qeyd edin.\"],\"438\":[\"stock list qeyd edin.\"],\"439\":[\"stock list qeyd edin.\"],\"440\":[\"stock list qeyd edin.\"],\"441\":[\"stock list qeyd edin.\"],\"442\":[\"stock list qeyd edin.\"],\"443\":[\"stock list qeyd edin.\"],\"444\":[\"stock list qeyd edin.\"],\"445\":[\"stock list qeyd edin.\"],\"446\":[\"stock list qeyd edin.\"],\"447\":[\"stock list qeyd edin.\"],\"448\":[\"stock list qeyd edin.\"],\"449\":[\"stock list qeyd edin.\"],\"450\":[\"stock list qeyd edin.\"],\"451\":[\"stock list qeyd edin.\"],\"452\":[\"stock list qeyd edin.\"],\"453\":[\"stock list qeyd edin.\"],\"454\":[\"stock list qeyd edin.\"],\"455\":[\"stock list qeyd edin.\"],\"456\":[\"stock list qeyd edin.\"],\"457\":[\"stock list qeyd edin.\"],\"458\":[\"stock list qeyd edin.\"],\"459\":[\"stock list qeyd edin.\"],\"460\":[\"stock list qeyd edin.\"],\"461\":[\"stock list qeyd edin.\"],\"462\":[\"stock list qeyd edin.\"],\"463\":[\"stock list qeyd edin.\"],\"464\":[\"stock list qeyd edin.\"],\"465\":[\"stock list qeyd edin.\"],\"466\":[\"stock list qeyd edin.\"],\"467\":[\"stock list qeyd edin.\"],\"468\":[\"stock list qeyd edin.\"],\"469\":[\"stock list qeyd edin.\"],\"470\":[\"stock list qeyd edin.\"],\"471\":[\"stock list qeyd edin.\"],\"472\":[\"stock list qeyd edin.\"],\"473\":[\"stock list qeyd edin.\"],\"474\":[\"stock list qeyd edin.\"],\"475\":[\"stock list qeyd edin.\"],\"476\":[\"stock list qeyd edin.\"],\"477\":[\"stock list qeyd edin.\"],\"478\":[\"stock list qeyd edin.\"],\"479\":[\"stock list qeyd edin.\"],\"480\":[\"stock list qeyd edin.\"],\"481\":[\"stock list qeyd edin.\"],\"482\":[\"stock list qeyd edin.\"],\"483\":[\"stock list qeyd edin.\"],\"484\":[\"stock list qeyd edin.\"],\"485\":[\"stock list qeyd edin.\"],\"486\":[\"stock list qeyd edin.\"],\"487\":[\"stock list qeyd edin.\"],\"488\":[\"stock list qeyd edin.\"],\"489\":[\"stock list qeyd edin.\"],\"490\":[\"stock list qeyd edin.\"],\"491\":[\"stock list qeyd edin.\"],\"492\":[\"stock list qeyd edin.\"],\"493\":[\"stock list qeyd edin.\"],\"494\":[\"stock list qeyd edin.\"],\"495\":[\"stock list qeyd edin.\"],\"496\":[\"stock list qeyd edin.\"],\"497\":[\"stock list qeyd edin.\"],\"498\":[\"stock list qeyd edin.\"],\"499\":[\"stock list qeyd edin.\"],\"500\":[\"stock list qeyd edin.\"],\"501\":[\"stock list qeyd edin.\"],\"502\":[\"stock list qeyd edin.\"],\"503\":[\"stock list qeyd edin.\"],\"504\":[\"stock list qeyd edin.\"],\"505\":[\"stock list qeyd edin.\"],\"506\":[\"stock list qeyd edin.\"],\"507\":[\"stock list qeyd edin.\"],\"508\":[\"stock list qeyd edin.\"],\"509\":[\"stock list qeyd edin.\"],\"510\":[\"stock list qeyd edin.\"],\"511\":[\"stock list qeyd edin.\"],\"512\":[\"stock list qeyd edin.\"],\"513\":[\"stock list qeyd edin.\"],\"514\":[\"stock list qeyd edin.\"],\"515\":[\"stock list qeyd edin.\"],\"516\":[\"stock list qeyd edin.\"],\"517\":[\"stock list qeyd edin.\"],\"518\":[\"stock list qeyd edin.\"],\"519\":[\"stock list qeyd edin.\"],\"520\":[\"stock list qeyd edin.\"],\"521\":[\"stock list qeyd edin.\"],\"522\":[\"stock list qeyd edin.\"],\"523\":[\"stock list qeyd edin.\"],\"524\":[\"stock list qeyd edin.\"],\"525\":[\"stock list qeyd edin.\"],\"526\":[\"stock list qeyd edin.\"],\"527\":[\"stock list qeyd edin.\"],\"528\":[\"stock list qeyd edin.\"],\"1414\":[\"stock list qeyd edin.\"],\"1415\":[\"stock list qeyd edin.\"],\"1416\":[\"stock list qeyd edin.\"],\"1417\":[\"stock list qeyd edin.\"],\"1418\":[\"stock list qeyd edin.\"],\"1419\":[\"stock list qeyd edin.\"],\"1420\":[\"stock list qeyd edin.\"],\"1421\":[\"stock list qeyd edin.\"],\"1422\":[\"stock list qeyd edin.\"],\"1423\":[\"stock list qeyd edin.\"],\"1424\":[\"stock list qeyd edin.\"],\"1425\":[\"stock list qeyd edin.\"],\"1426\":[\"stock list qeyd edin.\"],\"1427\":[\"stock list qeyd edin.\"],\"1428\":[\"stock list qeyd edin.\"],\"1429\":[\"stock list qeyd edin.\"],\"1430\":[\"stock list qeyd edin.\"],\"1431\":[\"stock list qeyd edin.\"],\"1432\":[\"stock list qeyd edin.\"],\"1433\":[\"stock list qeyd edin.\"],\"1434\":[\"stock list qeyd edin.\"],\"1435\":[\"stock list qeyd edin.\"],\"1436\":[\"stock list qeyd edin.\"],\"1437\":[\"stock list qeyd edin.\"],\"1438\":[\"stock list qeyd edin.\"],\"1439\":[\"stock list qeyd edin.\"],\"1440\":[\"stock list qeyd edin.\"],\"1441\":[\"stock list qeyd edin.\"],\"1442\":[\"stock list qeyd edin.\"],\"1443\":[\"stock list qeyd edin.\"],\"1444\":[\"stock list qeyd edin.\"],\"1445\":[\"stock list qeyd edin.\"],\"1446\":[\"stock list qeyd edin.\"],\"1447\":[\"stock list qeyd edin.\"],\"1448\":[\"stock list qeyd edin.\"],\"1449\":[\"stock list qeyd edin.\"],\"1450\":[\"stock list qeyd edin.\"],\"1451\":[\"stock list qeyd edin.\"],\"1452\":[\"stock list qeyd edin.\"],\"1453\":[\"stock list qeyd edin.\"],\"1454\":[\"stock list qeyd edin.\"],\"1455\":[\"stock list qeyd edin.\"],\"1456\":[\"stock list qeyd edin.\"],\"1457\":[\"stock list qeyd edin.\"],\"1458\":[\"stock list qeyd edin.\"],\"1459\":[\"stock list qeyd edin.\"],\"1460\":[\"stock list qeyd edin.\"],\"1461\":[\"stock list qeyd edin.\"],\"1462\":[\"stock list qeyd edin.\"],\"1463\":[\"stock list qeyd edin.\"],\"1464\":[\"stock list qeyd edin.\"],\"1465\":[\"stock list qeyd edin.\"],\"1466\":[\"stock list qeyd edin.\"],\"1467\":[\"stock list qeyd edin.\"],\"1468\":[\"stock list qeyd edin.\"],\"1469\":[\"stock list qeyd edin.\"],\"1470\":[\"stock list qeyd edin.\"],\"1471\":[\"stock list qeyd edin.\"],\"1472\":[\"stock list qeyd edin.\"],\"1473\":[\"stock list qeyd edin.\"],\"1474\":[\"stock list qeyd edin.\"],\"1475\":[\"stock list qeyd edin.\"],\"1476\":[\"stock list qeyd edin.\"],\"1477\":[\"stock list qeyd edin.\"],\"1478\":[\"stock list qeyd edin.\"],\"1479\":[\"stock list qeyd edin.\"],\"1480\":[\"stock list qeyd edin.\"],\"1481\":[\"stock list qeyd edin.\"],\"1482\":[\"stock list qeyd edin.\"],\"1483\":[\"stock list qeyd edin.\"],\"1484\":[\"stock list qeyd edin.\"],\"1485\":[\"stock list qeyd edin.\"],\"1486\":[\"stock list qeyd edin.\"],\"1487\":[\"stock list qeyd edin.\"],\"1488\":[\"stock list qeyd edin.\"],\"1489\":[\"stock list qeyd edin.\"],\"1490\":[\"stock list qeyd edin.\"],\"1491\":[\"stock list qeyd edin.\"],\"1492\":[\"stock list qeyd edin.\"],\"1493\":[\"stock list qeyd edin.\"],\"1494\":[\"stock list qeyd edin.\"],\"1495\":[\"stock list qeyd edin.\"],\"1496\":[\"stock list qeyd edin.\"],\"1497\":[\"stock list qeyd edin.\"],\"1498\":[\"stock list qeyd edin.\"],\"1499\":[\"stock list qeyd edin.\"],\"1500\":[\"stock list qeyd edin.\"],\"1501\":[\"stock list qeyd edin.\"],\"1502\":[\"stock list qeyd edin.\"],\"1503\":[\"stock list qeyd edin.\"],\"1504\":[\"stock list qeyd edin.\"],\"1505\":[\"stock list qeyd edin.\"],\"1506\":[\"stock list qeyd edin.\"],\"1507\":[\"stock list qeyd edin.\"],\"1508\":[\"stock list qeyd edin.\"],\"1509\":[\"stock list qeyd edin.\"],\"1510\":[\"stock list qeyd edin.\"],\"1511\":[\"stock list qeyd edin.\"],\"1512\":[\"stock list qeyd edin.\"],\"1513\":[\"stock list qeyd edin.\"],\"1514\":[\"stock list qeyd edin.\"],\"1515\":[\"stock list qeyd edin.\"],\"1516\":[\"stock list qeyd edin.\"],\"1517\":[\"stock list qeyd edin.\"],\"1518\":[\"stock list qeyd edin.\"],\"1519\":[\"stock list qeyd edin.\"],\"1520\":[\"stock list qeyd edin.\"],\"1521\":[\"stock list qeyd edin.\"],\"1522\":[\"stock list qeyd edin.\"],\"1523\":[\"stock list qeyd edin.\"],\"1524\":[\"stock list qeyd edin.\"],\"1525\":[\"stock list qeyd edin.\"],\"1526\":[\"stock list qeyd edin.\"],\"1527\":[\"stock list qeyd edin.\"],\"1528\":[\"stock list qeyd edin.\"],\"1529\":[\"stock list qeyd edin.\"],\"1530\":[\"stock list qeyd edin.\"],\"1531\":[\"stock list qeyd edin.\"],\"1532\":[\"stock list qeyd edin.\"],\"1533\":[\"stock list qeyd edin.\"],\"1534\":[\"stock list qeyd edin.\"],\"1535\":[\"stock list qeyd edin.\"],\"1536\":[\"stock list qeyd edin.\"],\"1537\":[\"stock list qeyd edin.\"],\"1538\":[\"stock list qeyd edin.\"],\"1539\":[\"stock list qeyd edin.\"],\"1540\":[\"stock list qeyd edin.\"],\"1541\":[\"stock list qeyd edin.\"],\"1542\":[\"stock list qeyd edin.\"],\"1543\":[\"stock list qeyd edin.\"],\"1544\":[\"stock list qeyd edin.\"],\"1545\":[\"stock list qeyd edin.\"],\"1546\":[\"stock list qeyd edin.\"],\"1547\":[\"stock list qeyd edin.\"],\"1548\":[\"stock list qeyd edin.\"],\"1549\":[\"stock list qeyd edin.\"],\"1550\":[\"stock list qeyd edin.\"],\"1551\":[\"stock list qeyd edin.\"],\"1552\":[\"stock list qeyd edin.\"],\"1553\":[\"stock list qeyd edin.\"],\"1554\":[\"stock list qeyd edin.\"],\"1555\":[\"stock list qeyd edin.\"],\"1556\":[\"stock list qeyd edin.\"],\"1557\":[\"stock list qeyd edin.\"],\"1558\":[\"stock list qeyd edin.\"],\"1559\":[\"stock list qeyd edin.\"],\"1560\":[\"stock list qeyd edin.\"],\"1561\":[\"stock list qeyd edin.\"],\"1562\":[\"stock list qeyd edin.\"],\"1563\":[\"stock list qeyd edin.\"],\"1564\":[\"stock list qeyd edin.\"],\"1565\":[\"stock list qeyd edin.\"],\"1566\":[\"stock list qeyd edin.\"],\"1567\":[\"stock list qeyd edin.\"],\"1568\":[\"stock list qeyd edin.\"],\"1569\":[\"stock list qeyd edin.\"],\"1570\":[\"stock list qeyd edin.\"],\"1571\":[\"stock list qeyd edin.\"],\"1572\":[\"stock list qeyd edin.\"],\"1573\":[\"stock list qeyd edin.\"],\"1574\":[\"stock list qeyd edin.\"],\"1575\":[\"stock list qeyd edin.\"],\"1576\":[\"stock list qeyd edin.\"],\"1577\":[\"stock list qeyd edin.\"],\"1578\":[\"stock list qeyd edin.\"],\"1579\":[\"stock list qeyd edin.\"],\"1580\":[\"stock list qeyd edin.\"],\"1581\":[\"stock list qeyd edin.\"],\"1582\":[\"stock list qeyd edin.\"],\"1583\":[\"stock list qeyd edin.\"],\"1584\":[\"stock list qeyd edin.\"],\"1585\":[\"stock list qeyd edin.\"],\"1586\":[\"stock list qeyd edin.\"],\"1587\":[\"stock list qeyd edin.\"],\"1588\":[\"stock list qeyd edin.\"],\"1589\":[\"stock list qeyd edin.\"],\"1590\":[\"stock list qeyd edin.\"],\"1591\":[\"stock list qeyd edin.\"],\"1592\":[\"stock list qeyd edin.\"],\"1593\":[\"stock list qeyd edin.\"],\"1594\":[\"stock list qeyd edin.\"],\"1595\":[\"stock list qeyd edin.\"],\"1596\":[\"stock list qeyd edin.\"],\"1597\":[\"stock list qeyd edin.\"],\"1598\":[\"stock list qeyd edin.\"],\"1599\":[\"stock list qeyd edin.\"],\"1600\":[\"stock list qeyd edin.\"],\"1601\":[\"stock list qeyd edin.\"],\"1602\":[\"stock list qeyd edin.\"],\"1603\":[\"stock list qeyd edin.\"],\"1604\":[\"stock list qeyd edin.\"],\"1605\":[\"stock list qeyd edin.\"],\"1606\":[\"stock list qeyd edin.\"],\"1607\":[\"stock list qeyd edin.\"],\"1608\":[\"stock list qeyd edin.\"],\"1609\":[\"stock list qeyd edin.\"],\"1610\":[\"stock list qeyd edin.\"],\"1611\":[\"stock list qeyd edin.\"],\"1612\":[\"stock list qeyd edin.\"],\"1613\":[\"stock list qeyd edin.\"],\"1614\":[\"stock list qeyd edin.\"],\"1615\":[\"stock list qeyd edin.\"],\"1616\":[\"stock list qeyd edin.\"],\"1617\":[\"stock list qeyd edin.\"],\"1618\":[\"stock list qeyd edin.\"],\"1619\":[\"stock list qeyd edin.\"],\"1620\":[\"stock list qeyd edin.\"],\"1621\":[\"stock list qeyd edin.\"],\"1622\":[\"stock list qeyd edin.\"],\"1623\":[\"stock list qeyd edin.\"],\"1624\":[\"stock list qeyd edin.\"],\"1625\":[\"stock list qeyd edin.\"],\"1626\":[\"stock list qeyd edin.\"],\"1627\":[\"stock list qeyd edin.\"],\"1628\":[\"stock list qeyd edin.\"],\"1629\":[\"stock list qeyd edin.\"],\"1630\":[\"stock list qeyd edin.\"],\"1631\":[\"stock list qeyd edin.\"],\"1632\":[\"stock list qeyd edin.\"],\"1633\":[\"stock list qeyd edin.\"],\"1634\":[\"stock list qeyd edin.\"],\"1635\":[\"stock list qeyd edin.\"],\"1636\":[\"stock list qeyd edin.\"],\"1637\":[\"stock list qeyd edin.\"],\"1638\":[\"stock list qeyd edin.\"],\"1639\":[\"stock list qeyd edin.\"],\"1640\":[\"stock list qeyd edin.\"],\"1641\":[\"stock list qeyd edin.\"],\"1642\":[\"stock list qeyd edin.\"],\"1643\":[\"stock list qeyd edin.\"],\"1644\":[\"stock list qeyd edin.\"],\"530\":[\"stock list qeyd edin.\"],\"531\":[\"stock list qeyd edin.\"],\"532\":[\"stock list qeyd edin.\"],\"533\":[\"stock list qeyd edin.\"],\"534\":[\"stock list qeyd edin.\"],\"535\":[\"stock list qeyd edin.\"],\"536\":[\"stock list qeyd edin.\"],\"537\":[\"stock list qeyd edin.\"],\"538\":[\"stock list qeyd edin.\"],\"539\":[\"stock list qeyd edin.\"],\"540\":[\"stock list qeyd edin.\"],\"541\":[\"stock list qeyd edin.\"],\"542\":[\"stock list qeyd edin.\"],\"543\":[\"stock list qeyd edin.\"],\"544\":[\"stock list qeyd edin.\"],\"545\":[\"stock list qeyd edin.\"],\"546\":[\"stock list qeyd edin.\"],\"547\":[\"stock list qeyd edin.\"],\"548\":[\"stock list qeyd edin.\"],\"549\":[\"stock list qeyd edin.\"],\"550\":[\"stock list qeyd edin.\"],\"551\":[\"stock list qeyd edin.\"],\"552\":[\"stock list qeyd edin.\"],\"553\":[\"stock list qeyd edin.\"],\"554\":[\"stock list qeyd edin.\"],\"555\":[\"stock list qeyd edin.\"],\"556\":[\"stock list qeyd edin.\"],\"557\":[\"stock list qeyd edin.\"],\"558\":[\"stock list qeyd edin.\"],\"559\":[\"stock list qeyd edin.\"],\"560\":[\"stock list qeyd edin.\"],\"561\":[\"stock list qeyd edin.\"],\"1645\":[\"stock list qeyd edin.\"],\"1646\":[\"stock list qeyd edin.\"],\"1647\":[\"stock list qeyd edin.\"],\"1648\":[\"stock list qeyd edin.\"],\"1649\":[\"stock list qeyd edin.\"],\"1650\":[\"stock list qeyd edin.\"],\"1651\":[\"stock list qeyd edin.\"],\"1652\":[\"stock list qeyd edin.\"],\"1653\":[\"stock list qeyd edin.\"],\"1654\":[\"stock list qeyd edin.\"],\"1655\":[\"stock list qeyd edin.\"],\"1656\":[\"stock list qeyd edin.\"],\"1657\":[\"stock list qeyd edin.\"],\"1658\":[\"stock list qeyd edin.\"],\"1659\":[\"stock list qeyd edin.\"],\"1660\":[\"stock list qeyd edin.\"],\"1661\":[\"stock list qeyd edin.\"],\"1662\":[\"stock list qeyd edin.\"],\"1663\":[\"stock list qeyd edin.\"],\"1664\":[\"stock list qeyd edin.\"],\"1665\":[\"stock list qeyd edin.\"],\"1666\":[\"stock list qeyd edin.\"],\"1667\":[\"stock list qeyd edin.\"],\"1668\":[\"stock list qeyd edin.\"],\"1669\":[\"stock list qeyd edin.\"],\"1670\":[\"stock list qeyd edin.\"],\"1671\":[\"stock list qeyd edin.\"],\"1672\":[\"stock list qeyd edin.\"],\"1673\":[\"stock list qeyd edin.\"],\"1674\":[\"stock list qeyd edin.\"],\"1675\":[\"stock list qeyd edin.\"],\"1676\":[\"stock list qeyd edin.\"],\"1677\":[\"stock list qeyd edin.\"],\"1678\":[\"stock list qeyd edin.\"],\"1679\":[\"stock list qeyd edin.\"],\"1680\":[\"stock list qeyd edin.\"],\"1681\":[\"stock list qeyd edin.\"],\"1682\":[\"stock list qeyd edin.\"],\"1683\":[\"stock list qeyd edin.\"],\"1684\":[\"stock list qeyd edin.\"],\"1685\":[\"stock list qeyd edin.\"],\"1686\":[\"stock list qeyd edin.\"],\"1687\":[\"stock list qeyd edin.\"],\"1688\":[\"stock list qeyd edin.\"],\"564\":[\"stock list qeyd edin.\"],\"565\":[\"stock list qeyd edin.\"],\"566\":[\"stock list qeyd edin.\"],\"567\":[\"stock list qeyd edin.\"],\"568\":[\"stock list qeyd edin.\"],\"569\":[\"stock list qeyd edin.\"],\"570\":[\"stock list qeyd edin.\"],\"571\":[\"stock list qeyd edin.\"],\"572\":[\"stock list qeyd edin.\"],\"573\":[\"stock list qeyd edin.\"],\"574\":[\"stock list qeyd edin.\"],\"575\":[\"stock list qeyd edin.\"],\"1689\":[\"stock list qeyd edin.\"],\"1690\":[\"stock list qeyd edin.\"],\"1691\":[\"stock list qeyd edin.\"],\"1692\":[\"stock list qeyd edin.\"],\"1693\":[\"stock list qeyd edin.\"],\"1694\":[\"stock list qeyd edin.\"],\"1695\":[\"stock list qeyd edin.\"],\"1696\":[\"stock list qeyd edin.\"],\"1697\":[\"stock list qeyd edin.\"],\"1698\":[\"stock list qeyd edin.\"],\"1699\":[\"stock list qeyd edin.\"],\"1700\":[\"stock list qeyd edin.\"],\"1701\":[\"stock list qeyd edin.\"],\"1702\":[\"stock list qeyd edin.\"],\"1703\":[\"stock list qeyd edin.\"],\"1704\":[\"stock list qeyd edin.\"],\"1705\":[\"stock list qeyd edin.\"],\"1706\":[\"stock list qeyd edin.\"],\"1707\":[\"stock list qeyd edin.\"],\"1708\":[\"stock list qeyd edin.\"],\"1709\":[\"stock list qeyd edin.\"],\"1710\":[\"stock list qeyd edin.\"],\"1711\":[\"stock list qeyd edin.\"],\"1712\":[\"stock list qeyd edin.\"],\"1713\":[\"stock list qeyd edin.\"],\"1714\":[\"stock list qeyd edin.\"],\"1715\":[\"stock list qeyd edin.\"],\"1716\":[\"stock list qeyd edin.\"],\"1717\":[\"stock list qeyd edin.\"],\"1718\":[\"stock list qeyd edin.\"],\"1719\":[\"stock list qeyd edin.\"],\"1720\":[\"stock list qeyd edin.\"],\"1721\":[\"stock list qeyd edin.\"],\"1722\":[\"stock list qeyd edin.\"],\"1723\":[\"stock list qeyd edin.\"],\"1724\":[\"stock list qeyd edin.\"],\"1725\":[\"stock list qeyd edin.\"],\"1726\":[\"stock list qeyd edin.\"],\"1727\":[\"stock list qeyd edin.\"],\"1728\":[\"stock list qeyd edin.\"],\"1729\":[\"stock list qeyd edin.\"],\"1730\":[\"stock list qeyd edin.\"],\"1731\":[\"stock list qeyd edin.\"],\"1732\":[\"stock list qeyd edin.\"],\"1733\":[\"stock list qeyd edin.\"],\"1734\":[\"stock list qeyd edin.\"],\"1735\":[\"stock list qeyd edin.\"],\"1736\":[\"stock list qeyd edin.\"],\"1737\":[\"stock list qeyd edin.\"],\"1738\":[\"stock list qeyd edin.\"],\"1739\":[\"stock list qeyd edin.\"],\"1740\":[\"stock list qeyd edin.\"],\"1741\":[\"stock list qeyd edin.\"],\"1742\":[\"stock list qeyd edin.\"],\"1743\":[\"stock list qeyd edin.\"],\"1744\":[\"stock list qeyd edin.\"],\"1745\":[\"stock list qeyd edin.\"],\"1746\":[\"stock list qeyd edin.\"],\"1747\":[\"stock list qeyd edin.\"],\"1748\":[\"stock list qeyd edin.\"],\"1749\":[\"stock list qeyd edin.\"],\"1750\":[\"stock list qeyd edin.\"],\"1751\":[\"stock list qeyd edin.\"],\"1752\":[\"stock list qeyd edin.\"],\"1753\":[\"stock list qeyd edin.\"],\"1754\":[\"stock list qeyd edin.\"],\"1755\":[\"stock list qeyd edin.\"],\"1756\":[\"stock list qeyd edin.\"],\"1757\":[\"stock list qeyd edin.\"],\"1758\":[\"stock list qeyd edin.\"],\"1759\":[\"stock list qeyd edin.\"],\"1760\":[\"stock list qeyd edin.\"],\"1761\":[\"stock list qeyd edin.\"],\"1762\":[\"stock list qeyd edin.\"],\"1763\":[\"stock list qeyd edin.\"],\"1764\":[\"stock list qeyd edin.\"],\"1765\":[\"stock list qeyd edin.\"],\"1766\":[\"stock list qeyd edin.\"],\"1767\":[\"stock list qeyd edin.\"],\"1768\":[\"stock list qeyd edin.\"],\"1769\":[\"stock list qeyd edin.\"],\"1770\":[\"stock list qeyd edin.\"],\"1771\":[\"stock list qeyd edin.\"],\"1772\":[\"stock list qeyd edin.\"],\"1773\":[\"stock list qeyd edin.\"],\"1774\":[\"stock list qeyd edin.\"],\"1775\":[\"stock list qeyd edin.\"],\"1776\":[\"stock list qeyd edin.\"],\"1777\":[\"stock list qeyd edin.\"],\"1778\":[\"stock list qeyd edin.\"],\"1779\":[\"stock list qeyd edin.\"],\"1780\":[\"stock list qeyd edin.\"],\"1781\":[\"stock list qeyd edin.\"],\"1782\":[\"stock list qeyd edin.\"],\"1783\":[\"stock list qeyd edin.\"],\"1784\":[\"stock list qeyd edin.\"],\"1785\":[\"stock list qeyd edin.\"],\"1786\":[\"stock list qeyd edin.\"],\"1787\":[\"stock list qeyd edin.\"],\"1788\":[\"stock list qeyd edin.\"],\"1789\":[\"stock list qeyd edin.\"],\"1790\":[\"stock list qeyd edin.\"],\"1791\":[\"stock list qeyd edin.\"],\"1792\":[\"stock list qeyd edin.\"],\"1793\":[\"stock list qeyd edin.\"],\"1794\":[\"stock list qeyd edin.\"],\"1795\":[\"stock list qeyd edin.\"],\"1796\":[\"stock list qeyd edin.\"],\"1797\":[\"stock list qeyd edin.\"],\"1798\":[\"stock list qeyd edin.\"],\"1799\":[\"stock list qeyd edin.\"],\"1800\":[\"stock list qeyd edin.\"],\"1801\":[\"stock list qeyd edin.\"],\"1802\":[\"stock list qeyd edin.\"],\"1803\":[\"stock list qeyd edin.\"],\"1804\":[\"stock list qeyd edin.\"],\"1805\":[\"stock list qeyd edin.\"],\"1806\":[\"stock list qeyd edin.\"],\"1807\":[\"stock list qeyd edin.\"],\"1808\":[\"stock list qeyd edin.\"],\"1809\":[\"stock list qeyd edin.\"],\"1810\":[\"stock list qeyd edin.\"],\"1811\":[\"stock list qeyd edin.\"],\"1812\":[\"stock list qeyd edin.\"],\"1813\":[\"stock list qeyd edin.\"],\"1814\":[\"stock list qeyd edin.\"],\"1815\":[\"stock list qeyd edin.\"],\"1816\":[\"stock list qeyd edin.\"],\"1817\":[\"stock list qeyd edin.\"],\"1818\":[\"stock list qeyd edin.\"],\"1819\":[\"stock list qeyd edin.\"],\"1820\":[\"stock list qeyd edin.\"],\"1821\":[\"stock list qeyd edin.\"],\"1822\":[\"stock list qeyd edin.\"],\"1823\":[\"stock list qeyd edin.\"],\"1824\":[\"stock list qeyd edin.\"],\"1825\":[\"stock list qeyd edin.\"],\"1826\":[\"stock list qeyd edin.\"],\"1827\":[\"stock list qeyd edin.\"],\"1828\":[\"stock list qeyd edin.\"],\"1829\":[\"stock list qeyd edin.\"],\"1830\":[\"stock list qeyd edin.\"],\"1831\":[\"stock list qeyd edin.\"],\"1832\":[\"stock list qeyd edin.\"],\"1833\":[\"stock list qeyd edin.\"],\"1834\":[\"stock list qeyd edin.\"],\"1835\":[\"stock list qeyd edin.\"],\"1836\":[\"stock list qeyd edin.\"],\"1837\":[\"stock list qeyd edin.\"],\"1838\":[\"stock list qeyd edin.\"],\"1839\":[\"stock list qeyd edin.\"],\"1840\":[\"stock list qeyd edin.\"],\"1841\":[\"stock list qeyd edin.\"],\"1842\":[\"stock list qeyd edin.\"],\"1843\":[\"stock list qeyd edin.\"],\"1844\":[\"stock list qeyd edin.\"],\"1845\":[\"stock list qeyd edin.\"],\"1846\":[\"stock list qeyd edin.\"],\"1847\":[\"stock list qeyd edin.\"],\"1848\":[\"stock list qeyd edin.\"],\"1849\":[\"stock list qeyd edin.\"],\"1850\":[\"stock list qeyd edin.\"],\"1851\":[\"stock list qeyd edin.\"],\"1852\":[\"stock list qeyd edin.\"],\"1853\":[\"stock list qeyd edin.\"],\"1854\":[\"stock list qeyd edin.\"],\"1855\":[\"stock list qeyd edin.\"],\"1856\":[\"stock list qeyd edin.\"],\"1857\":[\"stock list qeyd edin.\"],\"1858\":[\"stock list qeyd edin.\"],\"1859\":[\"stock list qeyd edin.\"],\"1860\":[\"stock list qeyd edin.\"],\"1861\":[\"stock list qeyd edin.\"],\"1862\":[\"stock list qeyd edin.\"],\"1863\":[\"stock list qeyd edin.\"],\"1864\":[\"stock list qeyd edin.\"],\"1865\":[\"stock list qeyd edin.\"],\"1866\":[\"stock list qeyd edin.\"],\"1867\":[\"stock list qeyd edin.\"],\"1868\":[\"stock list qeyd edin.\"],\"1869\":[\"stock list qeyd edin.\"],\"1870\":[\"stock list qeyd edin.\"],\"1871\":[\"stock list qeyd edin.\"],\"1872\":[\"stock list qeyd edin.\"],\"1873\":[\"stock list qeyd edin.\"],\"1874\":[\"stock list qeyd edin.\"],\"1875\":[\"stock list qeyd edin.\"],\"1876\":[\"stock list qeyd edin.\"],\"1877\":[\"stock list qeyd edin.\"],\"1878\":[\"stock list qeyd edin.\"],\"1879\":[\"stock list qeyd edin.\"],\"1880\":[\"stock list qeyd edin.\"],\"1881\":[\"stock list qeyd edin.\"],\"1882\":[\"stock list qeyd edin.\"],\"1883\":[\"stock list qeyd edin.\"],\"1884\":[\"stock list qeyd edin.\"],\"1885\":[\"stock list qeyd edin.\"],\"1886\":[\"stock list qeyd edin.\"],\"1887\":[\"stock list qeyd edin.\"],\"1888\":[\"stock list qeyd edin.\"],\"1889\":[\"stock list qeyd edin.\"],\"1890\":[\"stock list qeyd edin.\"],\"1891\":[\"stock list qeyd edin.\"],\"1892\":[\"stock list qeyd edin.\"],\"1893\":[\"stock list qeyd edin.\"],\"1894\":[\"stock list qeyd edin.\"],\"1961\":[\"stock list qeyd edin.\"],\"1962\":[\"stock list qeyd edin.\"],\"1963\":[\"stock list qeyd edin.\"],\"1964\":[\"stock list qeyd edin.\"],\"1965\":[\"stock list qeyd edin.\"],\"1966\":[\"stock list qeyd edin.\"],\"1967\":[\"stock list qeyd edin.\"],\"1968\":[\"stock list qeyd edin.\"],\"1969\":[\"stock list qeyd edin.\"],\"1970\":[\"stock list qeyd edin.\"],\"1971\":[\"stock list qeyd edin.\"],\"1972\":[\"stock list qeyd edin.\"],\"1973\":[\"stock list qeyd edin.\"],\"1974\":[\"stock list qeyd edin.\"],\"1975\":[\"stock list qeyd edin.\"],\"1898\":[\"stock list qeyd edin.\"],\"1899\":[\"stock list qeyd edin.\"],\"1900\":[\"stock list qeyd edin.\"],\"1901\":[\"stock list qeyd edin.\"],\"1902\":[\"stock list qeyd edin.\"],\"1903\":[\"stock list qeyd edin.\"],\"1904\":[\"stock list qeyd edin.\"],\"1905\":[\"stock list qeyd edin.\"],\"1906\":[\"stock list qeyd edin.\"],\"1907\":[\"stock list qeyd edin.\"],\"1908\":[\"stock list qeyd edin.\"],\"1909\":[\"stock list qeyd edin.\"],\"1910\":[\"stock list qeyd edin.\"],\"1911\":[\"stock list qeyd edin.\"],\"1912\":[\"stock list qeyd edin.\"],\"1913\":[\"stock list qeyd edin.\"],\"1914\":[\"stock list qeyd edin.\"],\"1915\":[\"stock list qeyd edin.\"],\"1916\":[\"stock list qeyd edin.\"],\"1917\":[\"stock list qeyd edin.\"],\"1918\":[\"stock list qeyd edin.\"],\"1919\":[\"stock list qeyd edin.\"],\"1920\":[\"stock list qeyd edin.\"],\"1921\":[\"stock list qeyd edin.\"],\"1922\":[\"stock list qeyd edin.\"],\"1923\":[\"stock list qeyd edin.\"],\"1924\":[\"stock list qeyd edin.\"],\"1925\":[\"stock list qeyd edin.\"],\"1926\":[\"stock list qeyd edin.\"],\"1927\":[\"stock list qeyd edin.\"],\"1928\":[\"stock list qeyd edin.\"],\"1929\":[\"stock list qeyd edin.\"],\"1930\":[\"stock list qeyd edin.\"],\"1931\":[\"stock list qeyd edin.\"],\"1932\":[\"stock list qeyd edin.\"],\"1933\":[\"stock list qeyd edin.\"],\"1934\":[\"stock list qeyd edin.\"],\"1935\":[\"stock list qeyd edin.\"],\"1936\":[\"stock list qeyd edin.\"],\"1937\":[\"stock list qeyd edin.\"],\"1938\":[\"stock list qeyd edin.\"],\"1939\":[\"stock list qeyd edin.\"],\"1940\":[\"stock list qeyd edin.\"],\"1941\":[\"stock list qeyd edin.\"],\"1942\":[\"stock list qeyd edin.\"],\"1943\":[\"stock list qeyd edin.\"],\"1944\":[\"stock list qeyd edin.\"],\"1945\":[\"stock list qeyd edin.\"],\"1946\":[\"stock list qeyd edin.\"],\"1947\":[\"stock list qeyd edin.\"],\"1948\":[\"stock list qeyd edin.\"],\"1949\":[\"stock list qeyd edin.\"],\"1950\":[\"stock list qeyd edin.\"],\"1951\":[\"stock list qeyd edin.\"],\"1952\":[\"stock list qeyd edin.\"],\"1953\":[\"stock list qeyd edin.\"],\"1954\":[\"stock list qeyd edin.\"],\"1955\":[\"stock list qeyd edin.\"],\"1956\":[\"stock list qeyd edin.\"],\"1957\":[\"stock list qeyd edin.\"],\"1958\":[\"stock list qeyd edin.\"],\"1959\":[\"stock list qeyd edin.\"],\"1960\":[\"stock list qeyd edin.\"],\"1976\":[\"stock list qeyd edin.\"],\"1977\":[\"stock list qeyd edin.\"],\"1978\":[\"stock list qeyd edin.\"],\"1979\":[\"stock list qeyd edin.\"],\"1980\":[\"stock list qeyd edin.\"],\"1981\":[\"stock list qeyd edin.\"],\"1982\":[\"stock list qeyd edin.\"],\"1983\":[\"stock list qeyd edin.\"],\"1984\":[\"stock list qeyd edin.\"],\"1985\":[\"stock list qeyd edin.\"],\"1986\":[\"stock list qeyd edin.\"],\"1987\":[\"stock list qeyd edin.\"],\"1988\":[\"stock list qeyd edin.\"],\"1989\":[\"stock list qeyd edin.\"],\"1990\":[\"stock list qeyd edin.\"],\"1991\":[\"stock list qeyd edin.\"],\"1992\":[\"stock list qeyd edin.\"],\"1993\":[\"stock list qeyd edin.\"],\"1994\":[\"stock list qeyd edin.\"],\"1995\":[\"stock list qeyd edin.\"],\"1996\":[\"stock list qeyd edin.\"],\"1997\":[\"stock list qeyd edin.\"],\"1998\":[\"stock list qeyd edin.\"],\"1999\":[\"stock list qeyd edin.\"],\"2000\":[\"stock list qeyd edin.\"],\"2001\":[\"stock list qeyd edin.\"],\"2002\":[\"stock list qeyd edin.\"],\"2003\":[\"stock list qeyd edin.\"],\"2004\":[\"stock list qeyd edin.\"],\"2005\":[\"stock list qeyd edin.\"],\"2006\":[\"stock list qeyd edin.\"],\"2007\":[\"stock list qeyd edin.\"],\"2008\":[\"stock list qeyd edin.\"],\"2009\":[\"stock list qeyd edin.\"],\"2010\":[\"stock list qeyd edin.\"],\"2011\":[\"stock list qeyd edin.\"],\"2012\":[\"stock list qeyd edin.\"],\"2013\":[\"stock list qeyd edin.\"],\"2014\":[\"stock list qeyd edin.\"],\"2015\":[\"stock list qeyd edin.\"],\"2016\":[\"stock list qeyd edin.\"],\"2017\":[\"stock list qeyd edin.\"],\"2018\":[\"stock list qeyd edin.\"],\"2019\":[\"stock list qeyd edin.\"],\"2020\":[\"stock list qeyd edin.\"],\"2021\":[\"stock list qeyd edin.\"],\"2022\":[\"stock list qeyd edin.\"],\"2023\":[\"stock list qeyd edin.\"],\"2024\":[\"stock list qeyd edin.\"],\"2025\":[\"stock list qeyd edin.\"],\"2026\":[\"stock list qeyd edin.\"],\"2027\":[\"stock list qeyd edin.\"],\"2028\":[\"stock list qeyd edin.\"],\"2029\":[\"stock list qeyd edin.\"],\"2030\":[\"stock list qeyd edin.\"],\"2031\":[\"stock list qeyd edin.\"],\"2032\":[\"stock list qeyd edin.\"],\"2033\":[\"stock list qeyd edin.\"],\"2034\":[\"stock list qeyd edin.\"],\"2035\":[\"stock list qeyd edin.\"],\"2036\":[\"stock list ', '2021-12-08 16:46:11', '2021-12-08 16:46:11');
INSERT INTO `logs` (`id`, `content`, `created_at`, `updated_at`) VALUES
(40, '{\"1961\":[\"stock list qeyd edin.\"],\"1962\":[\"stock list qeyd edin.\"],\"1963\":[\"stock list qeyd edin.\"],\"1964\":[\"stock list qeyd edin.\"],\"1965\":[\"stock list qeyd edin.\"],\"1966\":[\"stock list qeyd edin.\"],\"1967\":[\"stock list qeyd edin.\"],\"1968\":[\"stock list qeyd edin.\"],\"1969\":[\"stock list qeyd edin.\"],\"1970\":[\"stock list qeyd edin.\"],\"1971\":[\"stock list qeyd edin.\"],\"1972\":[\"stock list qeyd edin.\"],\"1973\":[\"stock list qeyd edin.\"],\"1974\":[\"stock list qeyd edin.\"],\"1975\":[\"stock list qeyd edin.\"],\"1898\":[\"stock list qeyd edin.\"],\"1899\":[\"stock list qeyd edin.\"],\"1900\":[\"stock list qeyd edin.\"],\"1901\":[\"stock list qeyd edin.\"],\"1902\":[\"stock list qeyd edin.\"],\"1903\":[\"stock list qeyd edin.\"],\"1904\":[\"stock list qeyd edin.\"],\"1905\":[\"stock list qeyd edin.\"],\"1906\":[\"stock list qeyd edin.\"],\"1907\":[\"stock list qeyd edin.\"],\"1908\":[\"stock list qeyd edin.\"],\"1909\":[\"stock list qeyd edin.\"],\"1910\":[\"stock list qeyd edin.\"],\"1911\":[\"stock list qeyd edin.\"],\"1912\":[\"stock list qeyd edin.\"],\"1913\":[\"stock list qeyd edin.\"],\"1914\":[\"stock list qeyd edin.\"],\"1915\":[\"stock list qeyd edin.\"],\"1916\":[\"stock list qeyd edin.\"],\"1917\":[\"stock list qeyd edin.\"],\"1918\":[\"stock list qeyd edin.\"],\"1919\":[\"stock list qeyd edin.\"],\"1920\":[\"stock list qeyd edin.\"],\"1921\":[\"stock list qeyd edin.\"],\"1922\":[\"stock list qeyd edin.\"],\"1923\":[\"stock list qeyd edin.\"],\"1924\":[\"stock list qeyd edin.\"],\"1925\":[\"stock list qeyd edin.\"],\"1926\":[\"stock list qeyd edin.\"],\"1927\":[\"stock list qeyd edin.\"],\"1928\":[\"stock list qeyd edin.\"],\"1929\":[\"stock list qeyd edin.\"],\"1930\":[\"stock list qeyd edin.\"],\"1931\":[\"stock list qeyd edin.\"],\"1932\":[\"stock list qeyd edin.\"],\"1933\":[\"stock list qeyd edin.\"],\"1934\":[\"stock list qeyd edin.\"],\"1935\":[\"stock list qeyd edin.\"],\"1936\":[\"stock list qeyd edin.\"],\"1937\":[\"stock list qeyd edin.\"],\"1938\":[\"stock list qeyd edin.\"],\"1939\":[\"stock list qeyd edin.\"],\"1940\":[\"stock list qeyd edin.\"],\"1941\":[\"stock list qeyd edin.\"],\"1942\":[\"stock list qeyd edin.\"],\"1943\":[\"stock list qeyd edin.\"],\"1944\":[\"stock list qeyd edin.\"],\"1945\":[\"stock list qeyd edin.\"],\"1946\":[\"stock list qeyd edin.\"],\"1947\":[\"stock list qeyd edin.\"],\"1948\":[\"stock list qeyd edin.\"],\"1949\":[\"stock list qeyd edin.\"],\"1950\":[\"stock list qeyd edin.\"],\"1951\":[\"stock list qeyd edin.\"],\"1952\":[\"stock list qeyd edin.\"],\"1953\":[\"stock list qeyd edin.\"],\"1954\":[\"stock list qeyd edin.\"],\"1955\":[\"stock list qeyd edin.\"],\"1956\":[\"stock list qeyd edin.\"],\"1957\":[\"stock list qeyd edin.\"],\"1958\":[\"stock list qeyd edin.\"],\"1959\":[\"stock list qeyd edin.\"],\"1960\":[\"stock list qeyd edin.\"],\"1976\":[\"stock list qeyd edin.\"],\"1977\":[\"stock list qeyd edin.\"],\"1978\":[\"stock list qeyd edin.\"],\"1979\":[\"stock list qeyd edin.\"],\"1980\":[\"stock list qeyd edin.\"],\"1981\":[\"stock list qeyd edin.\"],\"1982\":[\"stock list qeyd edin.\"],\"1983\":[\"stock list qeyd edin.\"],\"1984\":[\"stock list qeyd edin.\"],\"1985\":[\"stock list qeyd edin.\"],\"1986\":[\"stock list qeyd edin.\"],\"1987\":[\"stock list qeyd edin.\"],\"1988\":[\"stock list qeyd edin.\"],\"1989\":[\"stock list qeyd edin.\"],\"1990\":[\"stock list qeyd edin.\"],\"1991\":[\"stock list qeyd edin.\"],\"1992\":[\"stock list qeyd edin.\"],\"1993\":[\"stock list qeyd edin.\"],\"1994\":[\"stock list qeyd edin.\"],\"1995\":[\"stock list qeyd edin.\"],\"1996\":[\"stock list qeyd edin.\"],\"1997\":[\"stock list qeyd edin.\"],\"1998\":[\"stock list qeyd edin.\"],\"1999\":[\"stock list qeyd edin.\"],\"2000\":[\"stock list qeyd edin.\"],\"2001\":[\"stock list qeyd edin.\"],\"2002\":[\"stock list qeyd edin.\"],\"2003\":[\"stock list qeyd edin.\"],\"2004\":[\"stock list qeyd edin.\"],\"2005\":[\"stock list qeyd edin.\"],\"2006\":[\"stock list qeyd edin.\"],\"2007\":[\"stock list qeyd edin.\"],\"2008\":[\"stock list qeyd edin.\"],\"2009\":[\"stock list qeyd edin.\"],\"2010\":[\"stock list qeyd edin.\"],\"2011\":[\"stock list qeyd edin.\"],\"2012\":[\"stock list qeyd edin.\"],\"2013\":[\"stock list qeyd edin.\"],\"2014\":[\"stock list qeyd edin.\"],\"2015\":[\"stock list qeyd edin.\"],\"2016\":[\"stock list qeyd edin.\"],\"2017\":[\"stock list qeyd edin.\"],\"2018\":[\"stock list qeyd edin.\"],\"2019\":[\"stock list qeyd edin.\"],\"2020\":[\"stock list qeyd edin.\"],\"2021\":[\"stock list qeyd edin.\"],\"2022\":[\"stock list qeyd edin.\"],\"2023\":[\"stock list qeyd edin.\"],\"2024\":[\"stock list qeyd edin.\"],\"2025\":[\"stock list qeyd edin.\"],\"2026\":[\"stock list qeyd edin.\"],\"2027\":[\"stock list qeyd edin.\"],\"2028\":[\"stock list qeyd edin.\"],\"2029\":[\"stock list qeyd edin.\"],\"2030\":[\"stock list qeyd edin.\"],\"2031\":[\"stock list qeyd edin.\"],\"2032\":[\"stock list qeyd edin.\"],\"2033\":[\"stock list qeyd edin.\"],\"2034\":[\"stock list qeyd edin.\"],\"2035\":[\"stock list qeyd edin.\"],\"2036\":[\"stock list qeyd edin.\"],\"2037\":[\"stock list qeyd edin.\"],\"2038\":[\"stock list qeyd edin.\"],\"2039\":[\"stock list qeyd edin.\"],\"2040\":[\"stock list qeyd edin.\"],\"2041\":[\"stock list qeyd edin.\"],\"2042\":[\"stock list qeyd edin.\"],\"2043\":[\"stock list qeyd edin.\"],\"2044\":[\"stock list qeyd edin.\"],\"2045\":[\"stock list qeyd edin.\"],\"2046\":[\"stock list qeyd edin.\"],\"2047\":[\"stock list qeyd edin.\"],\"2048\":[\"stock list qeyd edin.\"],\"2049\":[\"stock list qeyd edin.\"],\"2050\":[\"stock list qeyd edin.\"],\"2051\":[\"stock list qeyd edin.\"],\"2052\":[\"stock list qeyd edin.\"],\"2053\":[\"stock list qeyd edin.\"],\"2054\":[\"stock list qeyd edin.\"],\"2055\":[\"stock list qeyd edin.\"],\"2056\":[\"stock list qeyd edin.\"],\"2057\":[\"stock list qeyd edin.\"],\"2058\":[\"stock list qeyd edin.\"],\"2059\":[\"stock list qeyd edin.\"],\"2060\":[\"stock list qeyd edin.\"],\"2061\":[\"stock list qeyd edin.\"],\"2062\":[\"stock list qeyd edin.\"],\"2063\":[\"stock list qeyd edin.\"],\"2064\":[\"stock list qeyd edin.\"],\"2065\":[\"stock list qeyd edin.\"],\"2066\":[\"stock list qeyd edin.\"],\"2067\":[\"stock list qeyd edin.\"],\"2068\":[\"stock list qeyd edin.\"],\"2069\":[\"stock list qeyd edin.\"],\"2070\":[\"stock list qeyd edin.\"],\"2071\":[\"stock list qeyd edin.\"],\"2072\":[\"stock list qeyd edin.\"],\"2073\":[\"stock list qeyd edin.\"],\"2074\":[\"stock list qeyd edin.\"],\"2075\":[\"stock list qeyd edin.\"],\"2076\":[\"stock list qeyd edin.\"],\"2077\":[\"stock list qeyd edin.\"],\"2078\":[\"stock list qeyd edin.\"],\"2079\":[\"stock list qeyd edin.\"],\"2080\":[\"stock list qeyd edin.\"],\"2081\":[\"stock list qeyd edin.\"],\"2082\":[\"stock list qeyd edin.\"],\"2083\":[\"stock list qeyd edin.\"],\"2084\":[\"stock list qeyd edin.\"],\"2085\":[\"stock list qeyd edin.\"],\"2086\":[\"stock list qeyd edin.\"],\"2087\":[\"stock list qeyd edin.\"],\"2088\":[\"stock list qeyd edin.\"],\"2089\":[\"stock list qeyd edin.\"],\"2090\":[\"stock list qeyd edin.\"],\"2091\":[\"stock list qeyd edin.\"],\"2092\":[\"stock list qeyd edin.\"],\"2093\":[\"stock list qeyd edin.\"],\"2094\":[\"stock list qeyd edin.\"],\"2095\":[\"stock list qeyd edin.\"],\"2096\":[\"stock list qeyd edin.\"],\"2097\":[\"stock list qeyd edin.\"],\"2098\":[\"stock list qeyd edin.\"],\"2099\":[\"stock list qeyd edin.\"],\"2100\":[\"stock list qeyd edin.\"],\"2101\":[\"stock list qeyd edin.\"],\"2102\":[\"stock list qeyd edin.\"],\"2103\":[\"stock list qeyd edin.\"],\"2104\":[\"stock list qeyd edin.\"],\"2105\":[\"stock list qeyd edin.\"],\"2106\":[\"stock list qeyd edin.\"],\"2107\":[\"stock list qeyd edin.\"],\"2108\":[\"stock list qeyd edin.\"],\"2109\":[\"stock list qeyd edin.\"],\"2110\":[\"stock list qeyd edin.\"],\"2111\":[\"stock list qeyd edin.\"],\"2112\":[\"stock list qeyd edin.\"],\"2113\":[\"stock list qeyd edin.\"],\"2114\":[\"stock list qeyd edin.\"],\"2115\":[\"stock list qeyd edin.\"],\"2116\":[\"stock list qeyd edin.\"],\"2117\":[\"stock list qeyd edin.\"],\"2118\":[\"stock list qeyd edin.\"],\"2119\":[\"stock list qeyd edin.\"],\"2120\":[\"stock list qeyd edin.\"],\"2121\":[\"stock list qeyd edin.\"],\"2122\":[\"stock list qeyd edin.\"],\"2123\":[\"stock list qeyd edin.\"],\"2124\":[\"stock list qeyd edin.\"],\"2125\":[\"stock list qeyd edin.\"],\"2126\":[\"stock list qeyd edin.\"],\"2127\":[\"stock list qeyd edin.\"],\"2128\":[\"stock list qeyd edin.\"],\"2129\":[\"stock list qeyd edin.\"],\"2130\":[\"stock list qeyd edin.\"],\"2131\":[\"stock list qeyd edin.\"],\"2132\":[\"stock list qeyd edin.\"],\"2133\":[\"stock list qeyd edin.\"],\"2134\":[\"stock list qeyd edin.\"],\"2136\":[\"stock list qeyd edin.\"],\"2137\":[\"stock list qeyd edin.\"],\"2138\":[\"stock list qeyd edin.\"],\"2139\":[\"stock list qeyd edin.\"],\"2140\":[\"stock list qeyd edin.\"],\"2141\":[\"stock list qeyd edin.\"],\"2142\":[\"stock list qeyd edin.\"],\"2143\":[\"stock list qeyd edin.\"],\"2144\":[\"stock list qeyd edin.\"],\"2478\":[\"stock list qeyd edin.\"],\"2479\":[\"stock list qeyd edin.\"],\"2480\":[\"stock list qeyd edin.\"],\"2481\":[\"stock list qeyd edin.\"],\"2482\":[\"stock list qeyd edin.\"],\"2483\":[\"stock list qeyd edin.\"],\"2146\":[\"stock list qeyd edin.\"],\"2147\":[\"stock list qeyd edin.\"],\"2148\":[\"stock list qeyd edin.\"],\"2149\":[\"stock list qeyd edin.\"],\"2150\":[\"stock list qeyd edin.\"],\"2151\":[\"stock list qeyd edin.\"],\"2152\":[\"stock list qeyd edin.\"],\"2153\":[\"stock list qeyd edin.\"],\"2154\":[\"stock list qeyd edin.\"],\"2155\":[\"stock list qeyd edin.\"],\"2156\":[\"stock list qeyd edin.\"],\"2157\":[\"stock list qeyd edin.\"],\"2158\":[\"stock list qeyd edin.\"],\"2159\":[\"stock list qeyd edin.\"],\"2160\":[\"stock list qeyd edin.\"],\"2161\":[\"stock list qeyd edin.\"],\"2162\":[\"stock list qeyd edin.\"],\"2163\":[\"stock list qeyd edin.\"],\"2164\":[\"stock list qeyd edin.\"],\"2165\":[\"stock list qeyd edin.\"],\"2166\":[\"stock list qeyd edin.\"],\"2167\":[\"stock list qeyd edin.\"],\"2168\":[\"stock list qeyd edin.\"],\"2169\":[\"stock list qeyd edin.\"],\"2170\":[\"stock list qeyd edin.\"],\"2171\":[\"stock list qeyd edin.\"],\"2172\":[\"stock list qeyd edin.\"],\"2173\":[\"stock list qeyd edin.\"],\"2174\":[\"stock list qeyd edin.\"],\"2175\":[\"stock list qeyd edin.\"],\"2176\":[\"stock list qeyd edin.\"],\"2177\":[\"stock list qeyd edin.\"],\"2178\":[\"stock list qeyd edin.\"],\"2179\":[\"stock list qeyd edin.\"],\"2180\":[\"stock list qeyd edin.\"],\"2181\":[\"stock list qeyd edin.\"],\"2182\":[\"stock list qeyd edin.\"],\"2183\":[\"stock list qeyd edin.\"],\"2184\":[\"stock list qeyd edin.\"],\"2185\":[\"stock list qeyd edin.\"],\"2186\":[\"stock list qeyd edin.\"],\"2187\":[\"stock list qeyd edin.\"],\"2188\":[\"stock list qeyd edin.\"],\"2189\":[\"stock list qeyd edin.\"],\"2190\":[\"stock list qeyd edin.\"],\"2191\":[\"stock list qeyd edin.\"],\"2192\":[\"stock list qeyd edin.\"],\"2193\":[\"stock list qeyd edin.\"],\"2194\":[\"stock list qeyd edin.\"],\"2195\":[\"stock list qeyd edin.\"],\"2196\":[\"stock list qeyd edin.\"],\"2197\":[\"stock list qeyd edin.\"],\"2198\":[\"stock list qeyd edin.\"],\"2199\":[\"stock list qeyd edin.\"],\"2200\":[\"stock list qeyd edin.\"],\"2201\":[\"stock list qeyd edin.\"],\"2202\":[\"stock list qeyd edin.\"],\"2203\":[\"stock list qeyd edin.\"],\"2204\":[\"stock list qeyd edin.\"],\"2205\":[\"stock list qeyd edin.\"],\"2206\":[\"stock list qeyd edin.\"],\"2207\":[\"stock list qeyd edin.\"],\"2208\":[\"stock list qeyd edin.\"],\"2209\":[\"stock list qeyd edin.\"],\"2210\":[\"stock list qeyd edin.\"],\"2211\":[\"stock list qeyd edin.\"],\"2212\":[\"stock list qeyd edin.\"],\"2213\":[\"stock list qeyd edin.\"],\"2214\":[\"stock list qeyd edin.\"],\"2215\":[\"stock list qeyd edin.\"],\"2216\":[\"stock list qeyd edin.\"],\"2217\":[\"stock list qeyd edin.\"],\"2218\":[\"stock list qeyd edin.\"],\"2219\":[\"stock list qeyd edin.\"],\"2220\":[\"stock list qeyd edin.\"],\"2221\":[\"stock list qeyd edin.\"],\"2222\":[\"stock list qeyd edin.\"],\"2223\":[\"stock list qeyd edin.\"],\"2224\":[\"stock list qeyd edin.\"],\"2225\":[\"stock list qeyd edin.\"],\"2226\":[\"stock list qeyd edin.\"],\"2227\":[\"stock list qeyd edin.\"],\"2228\":[\"stock list qeyd edin.\"],\"2229\":[\"stock list qeyd edin.\"],\"2230\":[\"stock list qeyd edin.\"],\"2231\":[\"stock list qeyd edin.\"],\"2232\":[\"stock list qeyd edin.\"],\"2233\":[\"stock list qeyd edin.\"],\"2234\":[\"stock list qeyd edin.\"],\"2235\":[\"stock list qeyd edin.\"],\"2236\":[\"stock list qeyd edin.\"],\"2237\":[\"stock list qeyd edin.\"],\"2238\":[\"stock list qeyd edin.\"],\"2239\":[\"stock list qeyd edin.\"],\"2240\":[\"stock list qeyd edin.\"],\"2241\":[\"stock list qeyd edin.\"],\"2242\":[\"stock list qeyd edin.\"],\"2243\":[\"stock list qeyd edin.\"],\"2244\":[\"stock list qeyd edin.\"],\"2245\":[\"stock list qeyd edin.\"],\"2246\":[\"stock list qeyd edin.\"],\"2247\":[\"stock list qeyd edin.\"],\"2248\":[\"stock list qeyd edin.\"],\"2249\":[\"stock list qeyd edin.\"],\"2250\":[\"stock list qeyd edin.\"],\"2251\":[\"stock list qeyd edin.\"],\"2252\":[\"stock list qeyd edin.\"],\"2253\":[\"stock list qeyd edin.\"],\"2254\":[\"stock list qeyd edin.\"],\"2255\":[\"stock list qeyd edin.\"],\"2256\":[\"stock list qeyd edin.\"],\"2257\":[\"stock list qeyd edin.\"],\"2258\":[\"stock list qeyd edin.\"],\"2259\":[\"stock list qeyd edin.\"],\"2260\":[\"stock list qeyd edin.\"],\"2261\":[\"stock list qeyd edin.\"],\"2262\":[\"stock list qeyd edin.\"],\"2263\":[\"stock list qeyd edin.\"],\"2264\":[\"stock list qeyd edin.\"],\"2265\":[\"stock list qeyd edin.\"],\"2266\":[\"stock list qeyd edin.\"],\"2267\":[\"stock list qeyd edin.\"],\"2268\":[\"stock list qeyd edin.\"],\"2269\":[\"stock list qeyd edin.\"],\"2270\":[\"stock list qeyd edin.\"],\"2271\":[\"stock list qeyd edin.\"],\"2272\":[\"stock list qeyd edin.\"],\"2273\":[\"stock list qeyd edin.\"],\"2274\":[\"stock list qeyd edin.\"],\"2275\":[\"stock list qeyd edin.\"],\"2276\":[\"stock list qeyd edin.\"],\"2277\":[\"stock list qeyd edin.\"],\"2278\":[\"stock list qeyd edin.\"],\"2279\":[\"stock list qeyd edin.\"],\"2280\":[\"stock list qeyd edin.\"],\"2281\":[\"stock list qeyd edin.\"],\"2282\":[\"stock list qeyd edin.\"],\"2283\":[\"stock list qeyd edin.\"],\"2284\":[\"stock list qeyd edin.\"],\"2285\":[\"stock list qeyd edin.\"],\"2286\":[\"stock list qeyd edin.\"],\"2287\":[\"stock list qeyd edin.\"],\"2288\":[\"stock list qeyd edin.\"],\"2289\":[\"stock list qeyd edin.\"],\"2290\":[\"stock list qeyd edin.\"],\"2291\":[\"stock list qeyd edin.\"],\"2292\":[\"stock list qeyd edin.\"],\"2293\":[\"stock list qeyd edin.\"],\"2294\":[\"stock list qeyd edin.\"],\"2295\":[\"stock list qeyd edin.\"],\"2296\":[\"stock list qeyd edin.\"],\"2297\":[\"stock list qeyd edin.\"],\"2298\":[\"stock list qeyd edin.\"],\"2299\":[\"stock list qeyd edin.\"],\"2300\":[\"stock list qeyd edin.\"],\"2301\":[\"stock list qeyd edin.\"],\"2302\":[\"stock list qeyd edin.\"],\"2303\":[\"stock list qeyd edin.\"],\"2304\":[\"stock list qeyd edin.\"],\"2306\":[\"stock list qeyd edin.\"],\"2307\":[\"stock list qeyd edin.\"],\"2308\":[\"stock list qeyd edin.\"],\"2309\":[\"stock list qeyd edin.\"],\"2310\":[\"stock list qeyd edin.\"],\"2311\":[\"stock list qeyd edin.\"],\"2312\":[\"stock list qeyd edin.\"],\"2313\":[\"stock list qeyd edin.\"],\"2314\":[\"stock list qeyd edin.\"],\"2315\":[\"stock list qeyd edin.\"],\"2316\":[\"stock list qeyd edin.\"],\"2317\":[\"stock list qeyd edin.\"],\"2318\":[\"stock list qeyd edin.\"],\"2319\":[\"stock list qeyd edin.\"],\"2320\":[\"stock list qeyd edin.\"],\"2321\":[\"stock list qeyd edin.\"],\"2322\":[\"stock list qeyd edin.\"],\"2323\":[\"stock list qeyd edin.\"],\"2324\":[\"stock list qeyd edin.\"],\"2325\":[\"stock list qeyd edin.\"],\"2326\":[\"stock list qeyd edin.\"],\"2327\":[\"stock list qeyd edin.\"],\"2328\":[\"stock list qeyd edin.\"],\"2329\":[\"stock list qeyd edin.\"],\"2330\":[\"stock list qeyd edin.\"],\"2331\":[\"stock list qeyd edin.\"],\"2332\":[\"stock list qeyd edin.\"],\"2333\":[\"stock list qeyd edin.\"],\"2334\":[\"stock list qeyd edin.\"],\"2335\":[\"stock list qeyd edin.\"],\"2336\":[\"stock list qeyd edin.\"],\"2337\":[\"stock list qeyd edin.\"],\"2338\":[\"stock list qeyd edin.\"],\"2339\":[\"stock list qeyd edin.\"],\"2340\":[\"stock list qeyd edin.\"],\"2341\":[\"stock list qeyd edin.\"],\"2342\":[\"stock list qeyd edin.\"],\"2343\":[\"stock list qeyd edin.\"],\"2344\":[\"stock list qeyd edin.\"],\"2345\":[\"stock list qeyd edin.\"],\"2346\":[\"stock list qeyd edin.\"],\"2347\":[\"stock list qeyd edin.\"],\"2348\":[\"stock list qeyd edin.\"],\"2349\":[\"stock list qeyd edin.\"],\"2350\":[\"stock list qeyd edin.\"],\"2351\":[\"stock list qeyd edin.\"],\"2352\":[\"stock list qeyd edin.\"],\"2353\":[\"stock list qeyd edin.\"],\"2354\":[\"stock list qeyd edin.\"],\"2355\":[\"stock list qeyd edin.\"],\"2356\":[\"stock list qeyd edin.\"],\"2357\":[\"stock list qeyd edin.\"],\"2358\":[\"stock list qeyd edin.\"],\"2359\":[\"stock list qeyd edin.\"],\"2360\":[\"stock list qeyd edin.\"],\"2361\":[\"stock list qeyd edin.\"],\"2362\":[\"stock list qeyd edin.\"],\"2363\":[\"stock list qeyd edin.\"],\"2364\":[\"stock list qeyd edin.\"],\"2365\":[\"stock list qeyd edin.\"],\"2366\":[\"stock list qeyd edin.\"],\"2367\":[\"stock list qeyd edin.\"],\"2368\":[\"stock list qeyd edin.\"],\"2369\":[\"stock list qeyd edin.\"],\"2370\":[\"stock list qeyd edin.\"],\"2371\":[\"stock list qeyd edin.\"],\"2372\":[\"stock list qeyd edin.\"],\"2373\":[\"stock list qeyd edin.\"],\"2374\":[\"stock list qeyd edin.\"],\"2375\":[\"stock list qeyd edin.\"],\"2376\":[\"stock list qeyd edin.\"],\"2377\":[\"stock list qeyd edin.\"],\"2378\":[\"stock list qeyd edin.\"],\"2379\":[\"stock list qeyd edin.\"],\"2380\":[\"stock list qeyd edin.\"],\"2381\":[\"stock list qeyd edin.\"],\"2382\":[\"stock list qeyd edin.\"],\"2383\":[\"stock list qeyd edin.\"],\"2384\":[\"stock list qeyd edin.\"],\"2385\":[\"stock list qeyd edin.\"],\"2386\":[\"stock list qeyd edin.\"],\"2387\":[\"stock list qeyd edin.\"],\"2388\":[\"stock list qeyd edin.\"],\"2389\":[\"stock list qeyd edin.\"],\"2390\":[\"stock list qeyd edin.\"],\"2391\":[\"stock list qeyd edin.\"],\"2392\":[\"stock list qeyd edin.\"],\"2393\":[\"stock list qeyd edin.\"],\"2394\":[\"stock list qeyd edin.\"],\"2395\":[\"stock list qeyd edin.\"],\"2396\":[\"stock list qeyd edin.\"],\"2397\":[\"stock list qeyd edin.\"],\"2398\":[\"stock list qeyd edin.\"],\"2399\":[\"stock list qeyd edin.\"],\"2400\":[\"stock list qeyd edin.\"],\"2401\":[\"stock list qeyd edin.\"],\"2402\":[\"stock list qeyd edin.\"],\"2403\":[\"stock list qeyd edin.\"],\"2404\":[\"stock list qeyd edin.\"],\"2405\":[\"stock list qeyd edin.\"],\"2406\":[\"stock list qeyd edin.\"],\"2407\":[\"stock list qeyd edin.\"],\"2408\":[\"stock list qeyd edin.\"],\"2409\":[\"stock list qeyd edin.\"],\"2410\":[\"stock list qeyd edin.\"],\"2411\":[\"stock list qeyd edin.\"],\"2412\":[\"stock list qeyd edin.\"],\"2413\":[\"stock list qeyd edin.\"],\"2414\":[\"stock list qeyd edin.\"],\"2415\":[\"stock list qeyd edin.\"],\"2416\":[\"stock list qeyd edin.\"],\"2417\":[\"stock list qeyd edin.\"],\"2418\":[\"stock list qeyd edin.\"],\"2419\":[\"stock list qeyd edin.\"],\"2484\":[\"stock list qeyd edin.\"],\"2485\":[\"stock list qeyd edin.\"],\"2486\":[\"stock list qeyd edin.\"],\"2487\":[\"stock list qeyd edin.\"],\"2488\":[\"stock list qeyd edin.\"],\"2489\":[\"stock list qeyd edin.\"],\"2490\":[\"stock list qeyd edin.\"],\"2491\":[\"stock list qeyd edin.\"],\"2492\":[\"stock list qeyd edin.\"],\"2493\":[\"stock list qeyd edin.\"],\"2494\":[\"stock list qeyd edin.\"],\"2495\":[\"stock list qeyd edin.\"],\"2496\":[\"stock list qeyd edin.\"],\"2497\":[\"stock list qeyd edin.\"],\"2498\":[\"stock list qeyd edin.\"],\"2499\":[\"stock list qeyd edin.\"],\"2500\":[\"stock list qeyd edin.\"],\"2501\":[\"stock list qeyd edin.\"],\"2502\":[\"stock list qeyd edin.\"],\"2503\":[\"stock list qeyd edin.\"],\"2421\":[\"stock list qeyd edin.\"],\"2422\":[\"stock list qeyd edin.\"],\"2423\":[\"stock list qeyd edin.\"],\"2424\":[\"stock list qeyd edin.\"],\"2425\":[\"stock list qeyd edin.\"],\"2426\":[\"stock list qeyd edin.\"],\"2427\":[\"stock list qeyd edin.\"],\"2428\":[\"stock list qeyd edin.\"],\"2429\":[\"stock list qeyd edin.\"],\"2430\":[\"stock list qeyd edin.\"],\"2431\":[\"stock list qeyd edin.\"],\"2432\":[\"stock list qeyd edin.\"],\"2433\":[\"stock list qeyd edin.\"],\"2434\":[\"stock list qeyd edin.\"],\"2435\":[\"stock list qeyd edin.\"],\"2436\":[\"stock list qeyd edin.\"],\"2437\":[\"stock list qeyd edin.\"],\"2504\":[\"stock list qeyd edin.\"],\"2505\":[\"stock list qeyd edin.\"],\"2506\":[\"stock list qeyd edin.\"],\"2439\":[\"stock list qeyd edin.\"],\"2440\":[\"stock list qeyd edin.\"],\"2441\":[\"stock list qeyd edin.\"],\"2442\":[\"stock list qeyd edin.\"],\"2443\":[\"stock list qeyd edin.\"],\"2444\":[\"stock list qeyd edin.\"],\"2445\":[\"stock list qeyd edin.\"],\"2446\":[\"stock list qeyd edin.\"],\"2447\":[\"stock list qeyd edin.\"],\"2448\":[\"stock list qeyd edin.\"],\"2449\":[\"stock list qeyd edin.\"],\"2450\":[\"stock list qeyd edin.\"],\"2451\":[\"stock list qeyd edin.\"],\"2452\":[\"stock list qeyd edin.\"],\"2453\":[\"stock list qeyd edin.\"],\"2454\":[\"stock list qeyd edin.\"],\"2455\":[\"stock list qeyd edin.\"],\"2456\":[\"stock list qeyd edin.\"],\"2457\":[\"stock list qeyd edin.\"],\"2458\":[\"stock list qeyd edin.\"],\"2459\":[\"stock list qeyd edin.\"],\"2460\":[\"stock list qeyd edin.\"],\"2461\":[\"stock list qeyd edin.\"],\"2462\":[\"stock list qeyd edin.\"],\"2463\":[\"stock list qeyd edin.\"],\"2464\":[\"stock list qeyd edin.\"],\"2465\":[\"stock list qeyd edin.\"],\"2466\":[\"stock list qeyd edin.\"],\"2467\":[\"stock list qeyd edin.\"],\"2468\":[\"stock list qeyd edin.\"],\"2469\":[\"stock list qeyd edin.\"],\"2470\":[\"stock list qeyd edin.\"],\"2471\":[\"stock list qeyd edin.\"],\"2472\":[\"stock list qeyd edin.\"],\"2473\":[\"stock list qeyd edin.\"],\"2474\":[\"stock list qeyd edin.\"],\"2475\":[\"stock list qeyd edin.\"],\"2476\":[\"stock list qeyd edin.\"],\"2477\":[\"stock list qeyd edin.\"],\"2507\":[\"stock list qeyd edin.\"]}', '2021-12-08 16:59:01', '2021-12-08 16:59:01'),
(41, '{\"20123\":[\"stock list qeyd edin.\"]}', '2021-12-08 16:59:23', '2021-12-08 16:59:23'),
(42, '{\"20123\":[\"stock list qeyd edin.\"]}', '2021-12-08 17:01:05', '2021-12-08 17:01:05'),
(43, '[[\"brand name qeyd edin.\"]]', '2021-12-22 18:18:45', '2021-12-22 18:18:45');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `measurement`
--

DROP TABLE IF EXISTS `measurement`;
CREATE TABLE IF NOT EXISTS `measurement` (
  `id` int NOT NULL AUTO_INCREMENT,
  `number` int NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `measurement`
--

INSERT INTO `measurement` (`id`, `number`, `name`) VALUES
(1, 1, 'piece'),
(2, 2, 'kq');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `migrations`
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
(75, '2021_11_17_124755_create_logs_table', 19);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `scopes` text,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `scopes` text,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(191) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Göyçay AVM Personal Access Client', 'AC8xvd7Jl2XPUAFAubb6AFmurDvt9MhA4THBxV5I', NULL, 'http://localhost', 1, 0, 0, '2021-11-16 08:03:20', '2021-11-16 08:03:20'),
(2, NULL, 'Göyçay AVM Password Grant Client', 'cZHSr49tP4YnVBplH6q6wncADAtG1AmBuYwFx7Bb', 'users', 'http://localhost', 0, 1, 0, '2021-11-16 08:03:20', '2021-11-16 08:03:20');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-11-16 08:03:20', '2021-11-16 08:03:20');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `cart_id` int UNSIGNED NOT NULL,
  `order_amount` decimal(10,2) NOT NULL,
  `status` varchar(30) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(80) NOT NULL,
  `zip_code` varchar(30) DEFAULT NULL,
  `bank` varchar(20) DEFAULT NULL,
  `card` varchar(50) DEFAULT NULL,
  `tran_date_time` varchar(191) DEFAULT NULL,
  `order_status` varchar(50) DEFAULT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `installment_number` int DEFAULT NULL,
  `exported` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_cart_id_unique` (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `order`
--

INSERT INTO `order` (`id`, `cart_id`, `order_amount`, `status`, `first_name`, `last_name`, `email`, `address`, `phone`, `mobile`, `city`, `country`, `zip_code`, `bank`, `card`, `tran_date_time`, `order_status`, `brand`, `installment_number`, `exported`, `created_at`, `updated_at`, `deleted_at`) VALUES
(81, 114, '0.55', 'Your order has been received', 'Ariz', 'Alıyev', 'ariznd-info@yandex.ru', 'Şəhriyar ev 8 m17', NULL, '+994503952986', 'Göyçay', 'Azərbaycan', 'AZ2300', 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 1, '2021-12-12 17:56:05', '2021-12-24 19:04:39', NULL),
(83, 117, '11.70', 'Cargoed', 'Ariz', 'Alıyev', 'ariznd-info@yandex.ru', 'Şəhriyar ev 8 m17', NULL, '+994503952986', 'Göyçay', 'Azərbaycan', 'AZ2300', 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 1, '2021-12-13 18:55:33', '2021-12-24 19:04:39', NULL),
(84, 118, '0.53', 'Your order has been received', 'Ariz', 'Alıyev', 'ariznd-info@yandex.ru', 'Nizami kuc.154', NULL, '+994503952986', 'Göyçay', 'Uruguvay', 'AZ2300', 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 1, '2021-12-13 19:01:39', '2021-12-24 19:04:39', NULL),
(85, 119, '0.53', 'Payment approved', 'Ariz', 'Alıyev', 'ariznd-info@yandex.ru', 'Şəhriyar ev 8 m17', NULL, '+994503952986', 'Göyçay', 'Azərbaycan', 'AZ2300', 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 1, '2021-12-14 01:50:47', '2021-12-24 19:04:39', NULL),
(96, 132, '5.60', 'Your order has been received', 'Mehemmed', 'Qalayciyev', 'qalayciyev@gmail.com', 'Baku Umid Ekberov 86', '+994707250903', '+994514598208', 'Baku', 'Azerbaycan', 'AZ1138', 'Kapital Bank', 'PAN', '2021-12-17 09:17:36\r\n', 'APPROVED', 'Brand', 0, 1, '2021-12-17 14:17:36', '2021-12-24 19:04:39', NULL),
(97, 134, '5.40', 'Your order has been received', 'Ramal', 'Aliyev', 'ramal2025@gmail.com', 'Baku', NULL, '0556115118', 'Baku', 'Azerbaiajn', NULL, 'Kapital Bank', 'PAN', '2021-12-17 11:52:08\r\n', 'APPROVED', 'Brand', 0, 1, '2021-12-17 16:52:08', '2021-12-24 19:04:39', NULL),
(98, 135, '11.20', 'Payment is expected', 'Ramal', 'Aliyev', 'ramal2025@gmail.com', 'Gggg', NULL, '0556115118', 'Baku', 'Azerbaijan', NULL, 'Bank Kartı', NULL, NULL, 'PENDING', NULL, 0, 1, '2021-12-17 16:56:03', '2021-12-24 19:04:39', NULL),
(99, 136, '0.50', 'Your order has been received', 'Ramal', 'Aliyev', 'ramal2025@gmail.com', 'Ffg', NULL, '0556115118', 'Vcv', 'Cvg', NULL, 'Kapital Bank', 'PAN', '2021-12-17 11:58:42', 'APPROVED', 'Brand', 0, 1, '2021-12-17 16:58:42', '2021-12-24 19:04:39', NULL),
(100, 133, '0.50', 'Payment is expected', 'Mehemmed', 'Qalayciyev', 'qalayciyev@gmail.com', 'Baku Umid Ekberov 86', '+994707250903', '+994514598208', 'Baku', 'Azerbaycan', 'AZ1138', 'Bank Kartı', NULL, NULL, 'PENDING', NULL, 0, 1, '2021-12-17 17:21:45', '2021-12-24 19:04:39', NULL),
(101, 124, '1.00', 'Payment is expected', 'Ariz', 'Alıyev', 'ariznd-info@yandex.ru', 'Şəhriyar ev 8 m17', '+994202744196', '+994503952986', 'Göyçay', 'Azərbaycan', 'AZ2300', 'Bank Kartı', NULL, NULL, 'PENDING', NULL, 0, 0, '2021-12-17 18:02:55', '2021-12-24 18:43:55', '2021-12-24 18:43:55'),
(102, 138, '1.00', 'Payment approved', 'Ariz', 'Alıyev', 'ariznd-info@yandex.ru', 'Şəhriyar ev 8 m17', '+994202744196', '+994503952986', 'Göyçay', 'Azərbaycan', 'AZ2300', 'Kapital Bank', 'PAN', '2021-12-17 13:04:07', 'APPROVED', 'Brand', 0, 1, '2021-12-17 18:04:07', '2021-12-24 19:04:39', NULL),
(103, 139, '0.50', 'Payment is expected', 'Ariz', 'Alıyev', 'ariznd-info@yandex.ru', 'Şəhriyar ev 8 m17', '+994202744196', '+994503952986', 'Göyçay', 'Azərbaycan', 'AZ2300', 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 0, '2021-12-18 15:30:16', '2021-12-22 18:33:42', '2021-12-22 18:33:42'),
(104, 140, '6.10', 'Payment is expected', 'Ariz', 'Alıyev', 'ariznd-info@yandex.ru', 'Şəhriyar ev 8 m17', '+994202744196', '+994503952986', 'Göyçay', 'Azərbaycan', 'AZ2300', 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 0, '2021-12-19 22:00:01', '2021-12-22 18:33:36', '2021-12-22 18:33:36'),
(105, 137, '6.35', 'Payment is expected', 'Mehemmed', 'Qalayciyev', 'qalayciyev@gmail.com', 'Baku Umid Ekberov 86', '+994707250903', '+994514598208', 'Baku', 'Azerbaycan', 'AZ1138', 'Bank Kartı', NULL, '23/12/2021 11:16:41', 'PENDING', NULL, 0, 1, '2021-12-23 12:10:55', '2021-12-24 19:04:39', NULL),
(106, 143, '12.90', 'Your order has been received', 'Zöhrab', 'Əmi', 'zohrabemi@gmail.com', 'Qusar şəhəri', NULL, '+994506747820', 'Qusar ş.', 'Azərbaycan', NULL, 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 1, '2021-12-24 19:49:07', '2021-12-25 11:22:35', NULL),
(107, 144, '6.70', 'Your order has been received', 'Zöhrab', 'Əmi', 'zohrabemi@gmail.com', 'Mərdıkan , R. Qasımov küç', NULL, '+994506747820', 'Bakı', 'Azərbaycan', 'AZ41000AZ', 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 1, '2021-12-25 01:19:06', '2021-12-25 01:21:14', '2021-12-25 01:21:14'),
(108, 145, '12.90', 'Your order has been received', 'Zöhrab', 'Əmi', 'zohrabemi@gmail.com', 'Mərdıkan , R. Qasımov küç', NULL, '+994506747820', 'Bakı', 'Azərbaycan', 'AZ41000AZ', 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 0, '2021-12-25 01:23:36', '2021-12-25 11:08:45', NULL),
(109, 142, '8.30', 'Your order has been received', 'Mehemmed', 'Qalayciyev', 'qalayciyev@gmail.com', 'Baku Umid Ekberov 86', '+994707250903', '+994514598208', 'Baku', 'Azerbaycan', 'AZ1138', 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 0, '2021-12-25 11:22:19', '2021-12-25 11:22:19', NULL),
(110, 146, '12.45', 'Your order has been received', 'Mehemmed', 'Qalayciyev', 'qalayciyev@gmail.com', 'Baku Umid Ekberov 86', '+994707250903', '+994514598208', 'Baku', 'Azerbaycan', 'AZ1138', 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 0, '2021-12-25 11:29:52', '2021-12-25 11:29:52', NULL),
(111, 147, '12.45', 'Your order has been received', 'Mehemmed', 'Qalayciyev', 'qalayciyev@gmail.com', 'Baku Umid Ekberov 86', '+994707250903', '+994514598208', 'Baku', 'Azerbaycan', 'AZ1138', 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 0, '2021-12-25 11:33:06', '2021-12-25 11:33:06', NULL),
(112, 148, '10.20', 'Your order has been received', 'Mehemmed', 'Qalayciyev', 'qalayciyev@gmail.com', 'Baku Umid Ekberov 86', '+994707250903', '+994514598208', 'Baku', 'Azerbaycan', 'AZ1138', 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 0, '2021-12-25 13:07:54', '2021-12-25 13:07:54', NULL),
(113, 141, '2.20', 'Cargoed', 'Ariz', 'Alıyev', 'ariznd-info@yandex.ru', 'Şəhriyar ev 8 m17', '+994202744196', '+994503952986', 'Göyçay', 'Azərbaycan', 'AZ2300', 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 0, '2021-12-26 23:08:47', '2021-12-26 23:18:17', NULL),
(114, 149, '18.40', 'Payment approved', 'Ariz', 'Alıyev', 'ariznd-info@yandex.ru', 'Şəhriyar ev 8 m17', '+994202744196', '+994503952986', 'Göyçay', 'Azərbaycan', 'AZ2300', 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 0, '2021-12-26 23:26:47', '2021-12-26 23:28:30', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(24, 'familqasimov@gmail.com', '$2y$10$EmYMiSuu753umkb1a6ZiwuzIIN1BLsjGzh36/rvY3CAI4CeEUNapO', '2021-12-16 16:36:22', NULL, NULL),
(29, 'familqasimov@gmail.com', 'V6Mq5yo1jqwogsLlrSRBp679YCOC6w8RUnSBuvvvNncXicxZdxpmd9itRIb6', '2021-12-25 00:03:31', '2021-12-25 00:04:19', '2021-12-25 00:04:19'),
(28, 'qalayciyev@gmail.com', 'zgcCzqZhZNBpMIAcgXgDaxHPLyBRT2SPPOsZGqxK1S1WPItvjnTcEnyI0efe', '2021-12-17 16:35:31', '2021-12-17 16:35:57', '2021-12-17 16:35:57');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `price_list`
--

DROP TABLE IF EXISTS `price_list`;
CREATE TABLE IF NOT EXISTS `price_list` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `product_id` int UNSIGNED NOT NULL,
  `sale_price` decimal(6,2) NOT NULL,
  `wholesale_count` int DEFAULT NULL,
  `wholesale_price` decimal(6,2) DEFAULT NULL,
  `default_price` tinyint NOT NULL DEFAULT '0',
  `color_id` int UNSIGNED DEFAULT NULL,
  `size_id` int UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `color` (`color_id`),
  KEY `price_list_product_id` (`product_id`) USING BTREE,
  KEY `price_list_size_id` (`size_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=24049 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `price_list`
--

INSERT INTO `price_list` (`id`, `product_id`, `sale_price`, `wholesale_count`, `wholesale_price`, `default_price`, `color_id`, `size_id`) VALUES
(24031, 24247, '2.55', 0, '2.35', 0, 98, 89),
(24032, 24247, '2.75', 0, '2.35', 0, 99, 90),
(24033, 24247, '2.65', 0, '2.35', 0, 100, 90),
(24034, 24247, '2.85', 0, '2.35', 0, 101, 89),
(24035, 24247, '2.65', 0, '2.35', 1, 1, NULL),
(24036, 24248, '2.20', 0, '2.00', 0, 99, 90),
(24037, 24248, '2.20', NULL, NULL, 1, 1, NULL),
(24038, 24249, '4.15', 0, '4.00', 0, 102, 89),
(24039, 24249, '4.15', NULL, NULL, 1, 1, NULL),
(24040, 24250, '6.20', NULL, NULL, 1, 1, NULL),
(24041, 24251, '1.00', 0, '1.00', 1, 1, NULL),
(24042, 24252, '5.00', 0, '5.00', 0, 95, 81),
(24043, 24252, '5.00', 0, '5.00', 0, 95, 87),
(24044, 24252, '5.00', 0, '5.00', 1, 1, NULL),
(24045, 24247, '2.55', 0, '2.35', 0, 104, 89),
(24046, 24247, '2.75', 0, '2.35', 0, 105, 90),
(24047, 24247, '2.65', 0, '2.35', 0, 106, 90),
(24048, 24247, '2.85', 0, '2.35', 0, 107, 89);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_code` int NOT NULL,
  `slug` varchar(160) NOT NULL,
  `product_name` varchar(191) NOT NULL,
  `product_description` text,
  `meta_title` varchar(150) DEFAULT NULL,
  `meta_discription` varchar(200) DEFAULT NULL,
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code_unique` (`product_code`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=24254 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `product`
--

INSERT INTO `product` (`id`, `product_code`, `slug`, `product_name`, `product_description`, `meta_title`, `meta_discription`, `stok_piece`, `supply_price`, `markup`, `discount`, `discount_date`, `one_or_more`, `other_count`, `other_bonus`, `bonus_comment`, `wish_list`, `best_selling`, `created_at`, `updated_at`, `deleted_at`) VALUES
(24247, 1, 'mvtalma-fudji-kg', 'MVT.ALMA FUDJI KG', 'MVT.ALMA FUDJI sarı 41', NULL, NULL, 0, NULL, NULL, 0, '2022-10-10 15:10:10', NULL, NULL, NULL, NULL, 0, 5, '2021-12-22 18:37:08', '2021-12-27 11:13:34', NULL),
(24248, 24, 'mvtbadimcan-kg', 'Mvtbadimcan kg', 'MVT.BADIMCAN KG qara 41', NULL, NULL, 0, NULL, NULL, 0, '2022-10-10 15:10:00', NULL, NULL, NULL, NULL, 0, 3, '2021-12-22 18:37:09', '2021-12-26 23:26:47', NULL),
(24249, 25, 'mvtbiber-rengli-kg', 'Mvtbiber Rengli kg', 'MVT.BIBER RENGLI goy 42', NULL, NULL, 0, NULL, NULL, 0, '2022-10-10 15:10:00', NULL, NULL, NULL, NULL, 0, 8, '2021-12-22 18:37:09', '2021-12-26 23:26:47', NULL),
(24250, 5, 'toyuq-butun-teze-kg', 'Toyuq butun teze kg', 'TOYUQ BUTUN TEZE KG', NULL, NULL, 0, NULL, NULL, 0, '2022-10-10 15:10:00', NULL, NULL, NULL, NULL, 0, 2, '2021-12-22 18:37:09', '2021-12-25 01:23:36', NULL),
(24251, 20123, 'bir-reng-bir-olcu', 'Bir reng bir olcu', 'Bir rəng bir olçü', NULL, NULL, 0, NULL, NULL, 0, '2022-10-10 15:10:10', NULL, NULL, NULL, NULL, 0, 0, '2021-12-25 01:11:25', '2021-12-25 01:11:25', NULL),
(24252, 20124, 'bir-reng-iki-olcu', 'Bir reng iki olcu', 'M2', NULL, NULL, 0, NULL, NULL, 0, '2022-10-10 15:10:10', NULL, NULL, NULL, NULL, 0, 0, '2021-12-25 01:11:25', '2021-12-25 01:11:25', NULL),
(24253, 21, 'alma-simirinka', 'ALMA SIMIRINKA', 'MVT.ALMA SEMERINKA XARICI', NULL, NULL, 0, NULL, NULL, 0, '2022-10-10 15:10:10', NULL, NULL, NULL, NULL, 0, 0, '2021-12-27 11:13:35', '2021-12-27 11:13:35', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `product_detail`
--

DROP TABLE IF EXISTS `product_detail`;
CREATE TABLE IF NOT EXISTS `product_detail` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int UNSIGNED NOT NULL,
  `measurement` varchar(50) NOT NULL,
  `show_new_collection` tinyint(1) NOT NULL DEFAULT '0',
  `show_hot_deal` tinyint(1) NOT NULL DEFAULT '0',
  `show_best_seller` tinyint(1) NOT NULL DEFAULT '0',
  `show_latest_products` tinyint(1) NOT NULL DEFAULT '0',
  `show_deals_of_the_day` tinyint(1) NOT NULL DEFAULT '0',
  `show_picked_for_you` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_detail_product_id_unique` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24239 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `product_detail`
--

INSERT INTO `product_detail` (`id`, `product_id`, `measurement`, `show_new_collection`, `show_hot_deal`, `show_best_seller`, `show_latest_products`, `show_deals_of_the_day`, `show_picked_for_you`) VALUES
(24232, 24247, 'ədəd', 0, 0, 0, 0, 0, 0),
(24233, 24248, 'ədəd', 0, 0, 0, 0, 0, 0),
(24234, 24249, 'ədəd', 0, 0, 0, 0, 0, 0),
(24235, 24250, 'piece', 0, 0, 0, 0, 0, 0),
(24236, 24251, 'piece', 0, 0, 0, 0, 0, 0),
(24237, 24252, 'ədəd', 0, 0, 0, 0, 0, 0),
(24238, 24253, 'ədəd', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `product_image`
--

DROP TABLE IF EXISTS `product_image`;
CREATE TABLE IF NOT EXISTS `product_image` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int UNSIGNED NOT NULL,
  `image_name` varchar(50) NOT NULL,
  `thumb_name` varchar(50) NOT NULL,
  `main_name` varchar(50) NOT NULL,
  `cover` int DEFAULT NULL,
  `color_id` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_image_product_id_foreign` (`product_id`),
  KEY `product_image_color_id` (`color_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=347 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image_name`, `thumb_name`, `main_name`, `cover`, `color_id`, `created_at`, `updated_at`) VALUES
(343, 24247, 'product-0_24247_1640180463.webp', 'thumb_product-0_24247_1640180463.webp', 'main_product-0_24247_1640180463.webp', NULL, 98, '2021-12-22 18:41:03', '2021-12-22 18:41:03'),
(344, 24248, 'product-0_24248_1640180483.webp', 'thumb_product-0_24248_1640180483.webp', 'main_product-0_24248_1640180483.webp', NULL, 99, '2021-12-22 18:41:23', '2021-12-22 18:41:23'),
(345, 24249, 'product-0_24249_1640180516.webp', 'thumb_product-0_24249_1640180516.webp', 'main_product-0_24249_1640180516.webp', NULL, 102, '2021-12-22 18:41:56', '2021-12-22 18:41:56'),
(346, 24250, 'product-0_24250_1640180543.webp', 'thumb_product-0_24250_1640180543.webp', 'main_product-0_24250_1640180543.webp', NULL, 97, '2021-12-22 18:42:23', '2021-12-22 18:42:23');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `rating` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `rating`
--

INSERT INTO `rating` (`id`, `product_id`, `rating`) VALUES
(118, 237, 5),
(119, 237, 5),
(120, 270, 5);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `review` text NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `rating` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `email`, `review`, `product_id`, `rating`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 'Ariz Alıyev', 'ariznd-info@yandex.ru', 'Çox gözəl bibərlərdir.Xoşuma gəldi keyfiyyəti', 24249, 5, '2021-12-26 14:34:49', '2021-12-26 14:34:49', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `services_name` varchar(191) NOT NULL,
  `services_price` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `shipping_returns`
--

DROP TABLE IF EXISTS `shipping_returns`;
CREATE TABLE IF NOT EXISTS `shipping_returns` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `shipping_return` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `shipping_returns`
--

INSERT INTO `shipping_returns` (`id`, `shipping_return`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sifarişin izlənilməsi\r\n<p>Kuryer ilə planlı və ya ekspress &ccedil;atdırılmanı se&ccedil;dikdə sizin sifariş &ccedil;atdırılmaya veriləndə və kuryer sizə y&ouml;nlənəndə SMS bildirişlərini alacaqsınız.</p>', '2021-03-11 18:33:23', '2021-08-24 00:21:57', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `size`
--

DROP TABLE IF EXISTS `size`;
CREATE TABLE IF NOT EXISTS `size` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `size`
--

INSERT INTO `size` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(81, 'XXL', '2021-12-03 12:40:55', '2021-12-03 12:40:55', NULL),
(82, 'M', '2021-12-03 14:35:55', '2021-12-10 03:00:24', NULL),
(83, 'XS', '2021-12-04 15:56:12', '2021-12-10 03:00:09', '2021-12-04 16:08:23'),
(84, 'L', '2021-12-04 16:39:49', '2021-12-10 03:00:16', NULL),
(85, 'XL', '2021-12-08 16:56:40', '2021-12-08 16:56:40', NULL),
(86, 'Orta', '2021-12-11 22:20:52', '2021-12-11 22:20:52', NULL),
(87, 'AB', '2021-12-14 15:29:56', '2021-12-14 15:29:56', NULL),
(88, '-', '2021-12-14 16:39:52', '2021-12-14 16:39:52', NULL),
(89, '42', '2021-12-22 18:31:09', '2021-12-22 18:31:09', NULL),
(90, '41', '2021-12-22 18:31:09', '2021-12-22 18:31:09', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `size_product`
--

DROP TABLE IF EXISTS `size_product`;
CREATE TABLE IF NOT EXISTS `size_product` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `size_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `size_product_size_id_foreign` (`size_id`),
  KEY `size_product_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24219 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `size_product`
--

INSERT INTO `size_product` (`id`, `size_id`, `product_id`) VALUES
(24211, 89, 24247),
(24212, 90, 24247),
(24213, 90, 24248),
(24214, 89, 24249),
(24215, 88, 24250),
(24216, 81, 24251),
(24217, 81, 24252),
(24218, 87, 24252);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `slider_name` varchar(191) NOT NULL,
  `slider_image` varchar(191) NOT NULL,
  `slider_slug` varchar(191) NOT NULL,
  `slider_order` int NOT NULL,
  `slider_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `sliders`
--

INSERT INTO `sliders` (`id`, `slider_name`, `slider_image`, `slider_slug`, `slider_order`, `slider_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(40, 'undefined', 'slider_1640508765.webp', '522', 1, 1, '2021-07-27 06:49:28', '2021-12-26 13:52:45', NULL),
(48, '', 'slider_1640518482.webp', 'https://amp.dev/tr/documentation/guides-and-tutorials/start/create/basic_markup/', 4, 1, '2021-08-14 13:13:37', '2021-12-26 16:34:43', NULL),
(54, '', 'slider_1640513673.webp', 'https://goycay-avm.az/category/meyveterevezquru-meyve', 3, 1, '2021-12-24 20:16:54', '2021-12-26 15:16:11', NULL),
(55, '', 'slider_1640508576.webp', 'Slide 2', 4, 1, '2021-12-24 22:02:17', '2021-12-26 13:54:27', '2021-12-26 13:54:27'),
(56, '', 'slider_1640518218.webp', '1132156565', 4, 1, '2021-12-26 16:30:18', '2021-12-26 16:30:18', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `stock_list`
--

DROP TABLE IF EXISTS `stock_list`;
CREATE TABLE IF NOT EXISTS `stock_list` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int UNSIGNED NOT NULL,
  `color_id` int UNSIGNED DEFAULT NULL,
  `size_id` int UNSIGNED DEFAULT NULL,
  `stock_piece` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `stock_list_product_id` (`product_id`) USING BTREE,
  KEY `stock_list_color_id` (`color_id`) USING BTREE,
  KEY `stock_list_size_id` (`size_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5497 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `stock_list`
--

INSERT INTO `stock_list` (`id`, `product_id`, `color_id`, `size_id`, `stock_piece`) VALUES
(5483, 24247, 98, 89, 5),
(5484, 24247, 99, 90, 10),
(5485, 24247, 100, 90, 5),
(5486, 24247, 101, 89, 20),
(5487, 24248, 99, 90, 10),
(5488, 24249, 102, 89, 10),
(5489, 24250, 97, 88, 10),
(5490, 24251, 103, 81, 0),
(5491, 24252, 95, 81, 0),
(5492, 24252, 95, 87, 0),
(5493, 24247, 104, 89, 5),
(5494, 24247, 105, 90, 10),
(5495, 24247, 106, 90, 5),
(5496, 24247, 107, 89, 20);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `markup` int NOT NULL DEFAULT '0',
  `description` text,
  `company` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `postcode` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `supplier_product`
--

DROP TABLE IF EXISTS `supplier_product`;
CREATE TABLE IF NOT EXISTS `supplier_product` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `supplier_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `supplier_product_supplier_id_foreign` (`supplier_id`),
  KEY `supplier_product_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `tag_product`
--

DROP TABLE IF EXISTS `tag_product`;
CREATE TABLE IF NOT EXISTS `tag_product` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `tag_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tag_product_tag_id_foreign` (`tag_id`),
  KEY `tag_product_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mobile` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `activation_key` varchar(60) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `bonus` bigint NOT NULL DEFAULT '0',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_email_uindex` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=204 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `mobile`, `password`, `activation_key`, `is_active`, `bonus`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(192, 'Mehemmed', 'Qalayciyev', 'qalayciyev@gmail.com', '+994514598208', '$2y$10$n6tImOsqHsJh7NO62bSwFuEIbiDERqZ3xJjL.2IAVCzL4Ame.e4Mm', NULL, 1, 9, 'gNfkDSqjkMIaJF41X1Z28TflxJmoaa46SkwyAq1eEOqwFq3qEg8xc9zxFSgz', '2021-07-28 07:35:09', '2021-12-17 16:35:57', NULL),
(195, 'Ariz', 'Alıyev', 'ariznd-info@yandex.ru', '+994503952986', '$2y$10$LGkLkVLf/xOh24D2Zu32W.UIU1iC2VhDa5hNrWg5Fdt3vwHdVHcwC', NULL, 1, 20, 'D5jVMqLfw7XPaBJKXak6w6O7A2rqhnGQPCHm6q838WmJ2MgyCkdGGH4ehwXw', '2021-12-01 10:24:45', '2021-12-15 11:55:35', NULL),
(198, 'Famil', 'Qasimov', 'familqasimov@gmail.com', '0557318342', '$2y$10$yF6/u7xiXbcxbR7X2xDc1OaUpOgTSTJKTff0YFNuTv2a3j.T0oxV2', NULL, 1, 0, NULL, '2021-12-12 17:00:30', '2021-12-25 00:04:19', NULL),
(202, 'Ramal', 'Aliyev', 'ramal2025@gmail.com', '0556115118', '$2y$10$YbVbSA2U4KQdq5JsXFxmJOe9U3wjqGY9GWNk06hwx6c08UxOeGpzW', NULL, 1, 0, NULL, '2021-12-17 16:51:38', '2021-12-17 16:51:38', NULL),
(203, 'Zöhrab', 'Əmi', 'zohrabemi@gmail.com', '+994506747820', '$2y$10$0XPNw4d3H.FCY7rInCL7Vufm0fK5Rm1tTlFPu1RzKG6szJ/2Js8PW', NULL, 1, 0, 'No2OvWatovmhY8guyh3r7nOeF9iIQD91aF78wqn2aDGYJ8jX6LQzGAGNce31', '2021-12-24 19:35:47', '2021-12-24 19:35:47', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `user_detail`
--

DROP TABLE IF EXISTS `user_detail`;
CREATE TABLE IF NOT EXISTS `user_detail` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `zip_code` varchar(15) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_detail_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sxemi çıxarılan cedvel `user_detail`
--

INSERT INTO `user_detail` (`id`, `user_id`, `address`, `city`, `state`, `country`, `zip_code`, `phone`) VALUES
(13, 192, 'Baku Umid Ekberov 86', 'Baku', 'Baku', 'Azerbaycan', 'AZ1138', '+994707250903'),
(15, 195, 'Şəhriyar ev 8 m17', 'Göyçay', 'Bakı', 'Azərbaycan', 'AZ2300', '+994202744196'),
(16, 203, 'Mərdıkan , R. Qasımov küç', 'Bakı', 'Bakı', 'Azərbaycan', 'AZ41000AZ', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `wish_list`
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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brand_product`
--
ALTER TABLE `brand_product`
  ADD CONSTRAINT `brand_product_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `brand_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD CONSTRAINT `cart_product_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_product_ibfk_1` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_product_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_images`
--
ALTER TABLE `category_images`
  ADD CONSTRAINT `category_images_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `color_product`
--
ALTER TABLE `color_product`
  ADD CONSTRAINT `color_product_ibfk_1` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `color_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `price_list`
--
ALTER TABLE `price_list`
  ADD CONSTRAINT `price_list_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `price_list_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `price_list_ibfk_3` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD CONSTRAINT `product_detail_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_ibfk_1` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `product_image_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `size_product`
--
ALTER TABLE `size_product`
  ADD CONSTRAINT `size_product_ibfk_1` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `size_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock_list`
--
ALTER TABLE `stock_list`
  ADD CONSTRAINT `stock_list_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_list_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_list_ibfk_3` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supplier_product`
--
ALTER TABLE `supplier_product`
  ADD CONSTRAINT `supplier_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `supplier_product_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tag_product`
--
ALTER TABLE `tag_product`
  ADD CONSTRAINT `tag_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tag_product_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD CONSTRAINT `user_detail_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wish_list`
--
ALTER TABLE `wish_list`
  ADD CONSTRAINT `wish_list_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wish_list_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
