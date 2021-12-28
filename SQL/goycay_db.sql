-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 04, 2021 at 08:01 AM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
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
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `about`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '<h3>Watt.az sayt olaraq həm blog, həm xidmət, həm maqazin kimi sizin xidmətinizdədir. Bu saytı yaratmaqda məqsədimiz sizə standart, orginal elektrik məhsulları haqqda geniş məlumat vermək və sizə sərfəli qiymətlərlə m&uuml;xtəlif &ouml;dəniş &uuml;sulları ilə elektrik məhsullarının &ccedil;atdırılmasını təşkil etməkdir.</h3>\r\n\r\n<p>Bizim vəzifəmiz yalnız d&uuml;zg&uuml;n məhsulu satmaq deyil, həm də alıcını məlumatlandırmaq və maarifləndirməkdir. &nbsp;Sizi maraqlandıran hər-hansı bir məhsul və ya xidmət olarsa, dərhal bizimlə əlaqə saxlayın.<br />\r\ntel:994508880895</p>', NULL, '2021-08-21 06:08:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
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
  `phone` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `activation_key` varchar(60) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_manage` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `mobile`, `password`, `address`, `city`, `state`, `country`, `zip_code`, `phone`, `activation_key`, `is_active`, `is_manage`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'Göyçay', 'AVM', 'qalayciyev@gmail.com', '+994 ** *** ** **', '$2y$10$wUl0Jm29gfHjokZTSSFgCuRvHo03RD/qP.AV6CvSoRButm91dCaHy', 'Baku', 'Bakı', 'Bakı', 'Azərbaycan', NULL, '+994 ** *** ** **', NULL, 1, 1, 'BKl0be4swatMMHgTq3KKmKI7pIWS948BqTskODDJnmVLN49u3EHGSyyn5LUV', '2021-07-01 19:37:26', '2021-11-12 05:12:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `api_keys`
--

DROP TABLE IF EXISTS `api_keys`;
CREATE TABLE IF NOT EXISTS `api_keys` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `api_keys_api_token_unique` (`api_token`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `api_keys`
--

INSERT INTO `api_keys` (`id`, `name`, `api_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1C', 'reUXHNM90cz406PYXKCcKATKGOiRjWSeNYFbQLA0kBHnvMZxKdDzn6LehKJUb6Scsb3NRsMW0lvYwqDzafi8vhoqXqpNULaRAE3j', '2021-11-16 10:05:10', '2021-11-16 10:06:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `banner_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
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
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `type`, `banner_name`, `banner_image`, `banner_slug`, `banner_order`, `banner_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 'top', 'banner2', 'banner_1636115006.webp', 'banner2', 1, 1, '2021-07-27 06:47:02', '2021-11-06 04:03:38', NULL),
(12, 'top', '', 'banner_1636114965.webp', 'basic_markup/', 2, 1, '2021-08-15 04:14:07', '2021-11-06 04:03:38', NULL),
(13, 'center', NULL, 'banner_1636185508.webp', 'banner center', 3, 1, '2021-11-04 06:40:46', '2021-11-06 03:58:29', NULL),
(14, 'top', NULL, 'banner_1636121449.webp', 'banner55', 3, 1, '2021-11-04 06:47:41', '2021-11-06 04:03:38', NULL),
(15, 'bottom', NULL, 'banner_1636185632.webp', 'banner55', 5, 1, '2021-11-04 06:58:32', '2021-11-06 04:00:32', NULL),
(16, 'bottom', NULL, 'banner_1636185666.webp', 'banner55', 6, 1, '2021-11-04 06:58:47', '2021-11-06 04:01:06', NULL),
(17, 'bottom', NULL, 'banner_1636185682.webp', 'banner55', 7, 1, '2021-11-04 06:59:04', '2021-11-06 04:01:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `blog_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `blog_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog_title`, `slug`, `blog_content`, `blog_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Suqovuşan qəsəbəsinə mediatur təşkil edilib', 'suqovusan-qesebesine-mediatur-teskil-edilib', '<p><strong>Azərişıq&quot; ASC Tərtər rayonunun işğaldan azad olunmuş Suqovuşan qəsəbəsinə mediatur təşkil edib.</strong></p><p>&nbsp;</p><p>&ldquo;Azərişıq&rdquo; ASC-nin mətbuat xidmətinin rəhbəri Vaqif Mustafayev bildrib ki, təmsil etdiyi qurum işğaldan azad olunmuş əraziləri elektrik enerjisi ilə təchiz etmək &uuml;&ccedil;&uuml;n kompleks tədbirləri davam etdirir:</p><p>&quot;Prezident İlham Əliyevin m&uuml;vafiq fərmanına uyğun olaraq səhmdar ASC &ldquo;Azərişıq Qarabağda&rdquo; layihəsi &ccedil;ər&ccedil;ivəsində Suqovuşan ərazisində işləri yekunlaşdırıb.</p><p>İşğaldan azad olunmuş Suqovuşan qəsəbəsinə 110/35/6 kv-luq Tərtər yarımstansiyasından 35 kV-luq yeni elektrik veriliş xətti &ccedil;əkilib.</p><p>Ağıllı Şəbəkə Konsepsiyası işğaldan azad olunan digər ərazilərdə olduğu kimi Suqovuşan ərazisində də tətbiq edilir. 35 kV-luq xətt izolyasiyalı kabellə &ccedil;əkilib.</p><p>&nbsp;</p><p><strong>Ətraflı:&nbsp;</strong><a href=\"https://az.trend.az/azerbaijan/society/3429645.html\">https://az.trend.az/<strong>​​​​​​</strong></a></p>', 'blog_1629225342.webp', '2021-08-02 12:12:37', '2021-08-18 02:35:42', NULL),
(2, 'Çin ən böyük elektrik gəmisini inşa edir', 'cin-en-boyuk-elektrik-gemisini-insa-edir', 'Yichang Tersanesi Sənaye Parkındakı Yangtze &ccedil;ayı &uuml;zərində, yalnız elektriklə işləyən d&uuml;nyanın ən b&ouml;y&uuml;k turist gəmisində işlər davam edir. &nbsp;100 metrlik layner 1300 qonağı qəbul edə biləcək və Hubei Three Gorges Tourism turizm şirkətinin verdiyi son məlumata g&ouml;rə, g&ouml;vdənin inşası yenicə başa &ccedil;atıb.<br /><br />&nbsp;Gəmi 2021 -ci ilin sonlarında istismara veriləcək, lakin artıq Yangtze &ccedil;ayında yaşıl enerjini təbliğ etmək &uuml;&ccedil;&uuml;n bir &ccedil;ox layihələrdən biri olacağı a&ccedil;ıqlandı.<br /><br />&nbsp;Gəminin &ouml;z&uuml; &quot;Yangtze Three Gorges 1&quot; adlanır və onun seyr radiusu təxminən 60 mil, yəni 95 km -dən bir qədər &ccedil;oxdur. &nbsp;Bunun məsuliyyəti 7,5 min kVt / saat g&uuml;c&uuml;ndə olan yeni nəsil təkrar doldurulan batareyadır. &nbsp;&Ccedil;in səyahət şirkəti enerji təchizatı sahəsində texnoloji tərəqqi sayəsində standart batareyaların &ouml;mr&uuml;n&uuml; əhəmiyyətli dərəcədə artırmağın m&uuml;mk&uuml;n olduğunu vurğuladı. &nbsp;Əlavə bir &uuml;st&uuml;nl&uuml;k, m&ouml;vcud enerjinin səmərəli və təhl&uuml;kəsiz idarə edilməsinə və gəminin b&uuml;t&uuml;n elementlərinə &ccedil;atdırılmasına imkan verən m&uuml;asir sistemlər olacaq.<br /><br />&nbsp;Şarj sistemi əsasdır - şirkət, batareyasını y&uuml;ksək gərginliklə dolduran d&uuml;nyada ilk dəniz qurğusu olacağını əlavə etdi. &nbsp;Əvvəllər bu həlli istifadə etmək cəhdləri belə bir batareyanın &ouml;mr&uuml;n&uuml; əhəmiyyətli dərəcədə azaldır.<br />Mənbə: https://hi-tech.news', 'blog_1629748687.webp', '2021-08-24 03:58:07', '2021-08-24 03:58:07', NULL),
(3, 'Çin ən böyük elektrik gəmisini inşa edir', 'cin-en-boyuk-elektrik-gemisini-insa-edir', 'Yichang Tersanesi Sənaye Parkındakı Yangtze &ccedil;ayı &uuml;zərində, yalnız elektriklə işləyən d&uuml;nyanın ən b&ouml;y&uuml;k turist gəmisində işlər davam edir. &nbsp;100 metrlik layner 1300 qonağı qəbul edə biləcək və Hubei Three Gorges Tourism turizm şirkətinin verdiyi son məlumata g&ouml;rə, g&ouml;vdənin inşası yenicə başa &ccedil;atıb.<br /><br />&nbsp;Gəmi 2021 -ci ilin sonlarında istismara veriləcək, lakin artıq Yangtze &ccedil;ayında yaşıl enerjini təbliğ etmək &uuml;&ccedil;&uuml;n bir &ccedil;ox layihələrdən biri olacağı a&ccedil;ıqlandı.<br /><br />&nbsp;Gəminin &ouml;z&uuml; &quot;Yangtze Three Gorges 1&quot; adlanır və onun seyr radiusu təxminən 60 mil, yəni 95 km -dən bir qədər &ccedil;oxdur. &nbsp;Bunun məsuliyyəti 7,5 min kVt / saat g&uuml;c&uuml;ndə olan yeni nəsil təkrar doldurulan batareyadır. &nbsp;&Ccedil;in səyahət şirkəti enerji təchizatı sahəsində texnoloji tərəqqi sayəsində standart batareyaların &ouml;mr&uuml;n&uuml; əhəmiyyətli dərəcədə artırmağın m&uuml;mk&uuml;n olduğunu vurğuladı. &nbsp;Əlavə bir &uuml;st&uuml;nl&uuml;k, m&ouml;vcud enerjinin səmərəli və təhl&uuml;kəsiz idarə edilməsinə və gəminin b&uuml;t&uuml;n elementlərinə &ccedil;atdırılmasına imkan verən m&uuml;asir sistemlər olacaq.<br /><br />&nbsp;Şarj sistemi əsasdır - şirkət, batareyasını y&uuml;ksək gərginliklə dolduran d&uuml;nyada ilk dəniz qurğusu olacağını əlavə etdi. &nbsp;Əvvəllər bu həlli istifadə etmək cəhdləri belə bir batareyanın &ouml;mr&uuml;n&uuml; əhəmiyyətli dərəcədə azaldır.<br />Mənbə: https://hi-tech.news', 'blog_1629748688.webp', '2021-08-24 03:58:08', '2021-08-24 03:58:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
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
) ENGINE=InnoDB AUTO_INCREMENT=51516 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `slug`, `image`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(69, 'MEYVE-TEREVEZ', '', NULL, NULL, '2021-11-09 08:16:56', '2021-11-26 04:16:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brand_product`
--

DROP TABLE IF EXISTS `brand_product`;
CREATE TABLE IF NOT EXISTS `brand_product` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `brand_product_brand_id_foreign` (`brand_id`),
  KEY `brand_product_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=254 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand_product`
--

INSERT INTO `brand_product` (`id`, `brand_id`, `product_id`) VALUES
(240, 69, 236),
(241, 69, 237);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
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
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `no_register`, `time_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(87, 192, 0, 0, '2021-11-29 09:45:01', '2021-11-29 09:45:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart_product`
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
  `cart_status` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_product_cart_id_foreign` (`cart_id`),
  KEY `cart_product_product_id_foreign` (`product_id`),
  KEY `cart_product_size_id_foreign` (`size_id`) USING BTREE,
  KEY `cart_product_color_id_foreign` (`color_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_product`
--

INSERT INTO `cart_product` (`id`, `cart_id`, `product_id`, `size_id`, `color_id`, `piece`, `amount`, `cart_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(153, 87, 237, 67, 67, 1, '4.73', 'Pending', '2021-11-29 09:46:20', '2021-11-29 09:57:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `top_id` int DEFAULT NULL,
  `category_name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `category_view` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51516 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `top_id`, `category_name`, `slug`, `category_view`, `created_at`, `updated_at`, `deleted_at`) VALUES
(125, NULL, 'Meyvə, Tərəvəz, Quru Meyvə', 'meyve-terevez-quru-meyve', 0, '2021-11-05 07:45:29', '2021-11-05 07:45:29', NULL),
(126, 125, 'Meyvə', 'meyve-terevez-quru-meyve-meyve', 0, '2021-11-05 07:51:26', '2021-11-05 07:51:26', NULL),
(127, 125, 'Tərəvəz', 'meyve-terevez-quru-meyve-terevez', 0, '2021-11-05 07:51:46', '2021-11-05 07:52:00', NULL),
(128, 125, 'Göyərti', 'meyve-terevez-quru-meyve-goyerti', 0, '2021-11-05 07:52:21', '2021-11-05 07:52:21', NULL),
(129, 125, 'Quru Meyvələr', 'meyve-terevez-quru-meyve-quru-meyveler', 0, '2021-11-05 07:52:37', '2021-11-05 07:52:37', NULL),
(130, NULL, 'Qastronom', 'qastronom', 0, '2021-11-05 07:52:57', '2021-11-05 07:52:57', NULL),
(131, 130, 'Kolbasa və Sosislər', 'qastronom-kolbasa-ve-sosisler', 0, '2021-11-05 07:53:18', '2021-11-05 07:53:18', NULL),
(132, 130, 'Donmuş məhsullar', 'qastronom-donmus-mehsullar', 0, '2021-11-05 07:53:35', '2021-11-05 07:53:35', NULL),
(133, 130, 'Dondurma', 'qastronom-dondurma', 0, '2021-11-05 07:53:51', '2021-11-05 07:53:51', NULL),
(134, NULL, 'Ərzaq məhsulları', 'erzaq-mehsullari', 0, '2021-11-06 06:44:14', '2021-11-06 06:44:14', NULL),
(135, NULL, 'İçkilər', 'ickiler', 0, '2021-11-06 06:45:58', '2021-11-06 06:45:58', NULL),
(136, NULL, 'Ət, toyuq, dəniz məhsulları', 'et-toyuq-deniz-mehsullari', 0, '2021-11-06 06:46:53', '2021-11-06 06:46:53', NULL),
(137, NULL, 'Şirniyyat, çay, kofe, diabetik', 'sirniyyat-cay-kofe-diabetik', 0, '2021-11-06 06:55:49', '2021-11-06 06:55:49', NULL),
(138, NULL, 'Süd məhsulları', 'sud-mehsullari', 0, '2021-11-06 06:56:30', '2021-11-06 06:56:30', NULL),
(139, NULL, 'Uşaq məhsulları', 'usaq-mehsullari', 0, '2021-11-06 06:56:57', '2021-11-06 06:56:57', NULL),
(140, NULL, 'Yuyucu təmizləyici vasitələr', 'yuyucu-temizleyici-vasiteler', 0, '2021-11-06 06:57:25', '2021-11-06 06:57:25', NULL),
(141, NULL, 'Kosmetik və gigiyenik', 'kosmetik-ve-gigiyenik', 0, '2021-11-06 06:57:55', '2021-11-06 06:57:55', NULL),
(142, NULL, 'Məişət, mətbəx, tekstil', 'meiset-metbex-tekstil', 0, '2021-11-06 06:58:34', '2021-11-06 06:58:34', NULL),
(143, NULL, 'Konselyariya', 'konselyariya', 0, '2021-11-06 06:59:00', '2021-11-06 06:59:00', NULL),
(144, NULL, 'Heyvan yemləri', 'heyvan-yemleri', 0, '2021-11-06 06:59:48', '2021-11-06 06:59:48', NULL),
(145, NULL, 'Elektronika və Mebel', 'elektronika-ve-mebel', 0, '2021-11-06 07:00:18', '2021-11-06 07:00:18', NULL),
(300, NULL, 'katqoriya 1', 'katqoriya-1', 0, '2021-11-24 07:03:44', '2021-11-24 07:07:32', '2021-11-24 07:07:32'),
(301, 300, 'katqoriya 2', 'katqoriya-2', 0, '2021-11-24 07:03:44', '2021-11-24 07:07:24', '2021-11-24 07:07:24');

-- --------------------------------------------------------

--
-- Table structure for table `category_images`
--

DROP TABLE IF EXISTS `category_images`;
CREATE TABLE IF NOT EXISTS `category_images` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int UNSIGNED NOT NULL,
  `image_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_images_category_id_foreign` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_images`
--

INSERT INTO `category_images` (`id`, `category_id`, `image_name`, `created_at`, `updated_at`) VALUES
(56, 130, 'qastronom_1636190103.Qastronom.svg', '2021-11-06 05:15:03', '2021-11-06 05:15:03'),
(57, 125, 'meyve-terevez-quru-meyve_1636190889.Meyvə-və-tərəvəz.svg', '2021-11-06 05:28:09', '2021-11-06 05:28:09'),
(58, 134, 'erzaq-mehsullari_1636195523.ərzaq məhsulları.svg', '2021-11-06 06:45:23', '2021-11-06 06:45:23'),
(59, 135, 'ickiler_1636195558.İçkilər.svg', '2021-11-06 06:45:58', '2021-11-06 06:45:58'),
(60, 136, 'et-toyuq-deniz-mehsullari_1636195613.ət-və-toyuq məhsulları.svg', '2021-11-06 06:46:53', '2021-11-06 06:46:53'),
(61, 137, 'sirniyyat-cay-kofe-diabetik_1636196149.Şirniyyat-çay-və qəhvə.svg', '2021-11-06 06:55:49', '2021-11-06 06:55:49'),
(62, 138, 'sud-mehsullari_1636196190.Süd-məhsulları.svg', '2021-11-06 06:56:30', '2021-11-06 06:56:30'),
(63, 139, 'usaq-mehsullari_1636196217.Uşaq-məhsulları.svg', '2021-11-06 06:56:57', '2021-11-06 06:56:57'),
(64, 140, 'yuyucu-temizleyici-vasiteler_1636196245.Yuyucu-vasitələr.svg', '2021-11-06 06:57:25', '2021-11-06 06:57:25'),
(65, 141, 'kosmetik-ve-gigiyenik_1636196275.Kosmetik-və-gigiyenik.svg', '2021-11-06 06:57:55', '2021-11-06 06:57:55'),
(66, 142, 'meiset-metbex-tekstil_1636196314.Məişət-mətbəx-və-tekstil.svg', '2021-11-06 06:58:34', '2021-11-06 06:58:34'),
(67, 143, 'konselyariya_1636196340.Konselyariya.svg', '2021-11-06 06:59:00', '2021-11-06 06:59:00'),
(68, 144, 'heyvan-yemleri_1636196388.Heyvan-yemləri.svg', '2021-11-06 06:59:48', '2021-11-06 06:59:48'),
(69, 145, 'elektronika-ve-mebel_1636196418.elektronika-və-mebel.svg', '2021-11-06 07:00:18', '2021-11-06 07:00:18');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

DROP TABLE IF EXISTS `category_product`;
CREATE TABLE IF NOT EXISTS `category_product` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_product_category_id_foreign` (`category_id`),
  KEY `category_product_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=263 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `category_id`, `product_id`) VALUES
(248, 126, 236),
(249, 126, 237);

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `color`;
CREATE TABLE IF NOT EXISTS `color` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(67, '#ca0c0c', '2021-11-18 08:38:26', '2021-11-18 08:38:26', NULL),
(68, '#ff0000', '2021-11-18 08:40:18', '2021-11-18 08:40:18', NULL),
(69, '#4dff00', '2021-11-18 08:40:28', '2021-11-18 08:40:28', NULL),
(70, '#ffd500', '2021-11-18 08:40:35', '2021-11-18 08:40:35', NULL),
(71, '#002aff', '2021-11-18 08:41:55', '2021-11-18 08:41:55', NULL),
(72, '#ff00dd', '2021-11-18 08:43:20', '2021-11-18 08:43:20', NULL),
(73, 'red', '2021-11-24 05:27:00', '2021-11-24 05:27:00', NULL),
(74, 'green', '2021-11-24 05:29:32', '2021-11-24 05:29:32', NULL),
(75, 'blue', '2021-11-24 05:29:32', '2021-11-24 05:29:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `color_product`
--

DROP TABLE IF EXISTS `color_product`;
CREATE TABLE IF NOT EXISTS `color_product` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `color_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `color_product_color_id_foreign` (`color_id`),
  KEY `color_product_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `color_product`
--

INSERT INTO `color_product` (`id`, `color_id`, `product_id`) VALUES
(117, 67, 237),
(118, 69, 237),
(161, 67, 236),
(162, 68, 236),
(163, 70, 236),
(164, 71, 236);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
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
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `company` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `website` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fax` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `zip_code` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `street` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `infos`
--

DROP TABLE IF EXISTS `infos`;
CREATE TABLE IF NOT EXISTS `infos` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `logo` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
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
  `delivery` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `infos`
--

INSERT INTO `infos` (`id`, `logo`, `title`, `description`, `keywords`, `phone`, `mobile`, `email`, `address`, `facebook`, `instagram`, `twitter`, `youtube`, `pinterest`, `delivery`) VALUES
(1, 'logo.png', 'Göyçay AVM', 'Goycay AVM', '#qida #məhsullarının #online #satışı', '+994 ** *** ** **', '+994 ** *** ** **', 'admin@inova.az', 'Online Store', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.twitter.com/', 'https://www.youtube.com/', 'https://www.pinterest.com/', 'Bakı, Abşeron, Sumqayıt ərazilərinə çatdırılma ödənişsizdir.\r\nBölgələrə çatdırılma ödənişlidir\r\nMəhsul sifariş verdiyiniz andan 1-3 saat ərzində müştəriyə təhvil verilir.');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
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
(32, '{\"1\":[\"Bu brand name art\\u0131q qeyd edilib.\"],\"2\":[\"Bu brand name art\\u0131q qeyd edilib.\",\"Bu brand name art\\u0131q qeyd edilib.\"]}', '2021-11-24 07:02:55', '2021-11-24 07:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `measurement`
--

DROP TABLE IF EXISTS `measurement`;
CREATE TABLE IF NOT EXISTS `measurement` (
  `id` int NOT NULL AUTO_INCREMENT,
  `number` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `measurement`
--

INSERT INTO `measurement` (`id`, `number`, `name`) VALUES
(1, 1, 'piece'),
(2, 2, 'kq');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
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
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Göyçay AVM Personal Access Client', 'AC8xvd7Jl2XPUAFAubb6AFmurDvt9MhA4THBxV5I', NULL, 'http://localhost', 1, 0, 0, '2021-11-16 08:03:20', '2021-11-16 08:03:20'),
(2, NULL, 'Göyçay AVM Password Grant Client', 'cZHSr49tP4YnVBplH6q6wncADAtG1AmBuYwFx7Bb', 'users', 'http://localhost', 0, 1, 0, '2021-11-16 08:03:20', '2021-11-16 08:03:20');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-11-16 08:03:20', '2021-11-16 08:03:20');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `cart_id` int UNSIGNED NOT NULL,
  `order_amount` decimal(10,2) NOT NULL,
  `status` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `country` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `zip_code` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bank` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `card` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tran_date_time` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `order_status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `brand` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `installment_number` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_cart_id_unique` (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `cart_id`, `order_amount`, `status`, `first_name`, `last_name`, `email`, `address`, `phone`, `mobile`, `city`, `country`, `zip_code`, `bank`, `card`, `tran_date_time`, `order_status`, `brand`, `installment_number`, `created_at`, `updated_at`, `deleted_at`) VALUES
(57, 87, '4.73', 'Your order has been received', 'Mehemmed', 'Qalayciyev', 'qalayciyev@gmail.com', 'Baku Umid Ekberov 86', '+994707250903', '+994514598208', 'Baku', 'Azerbaycan', 'AZ1138', 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, '2021-11-29 09:59:11', '2021-11-29 09:59:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `price_list`
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `price_list`
--

INSERT INTO `price_list` (`id`, `product_id`, `sale_price`, `wholesale_count`, `wholesale_price`, `default_price`, `color_id`, `size_id`) VALUES
(1, 236, '2.34', 10, '2.10', 1, NULL, NULL),
(3, 237, '5.02', NULL, NULL, 1, NULL, NULL),
(4, 237, '5.56', NULL, NULL, 0, 67, 67),
(6, 237, '5.42', NULL, NULL, 0, 69, NULL),
(7, 237, '5.23', NULL, NULL, 0, NULL, 67);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_code` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(160) COLLATE utf8mb4_general_ci NOT NULL,
  `product_name` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `product_description` text COLLATE utf8mb4_general_ci,
  `meta_title` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `meta_discription` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_code`, `slug`, `product_name`, `product_description`, `meta_title`, `meta_discription`, `stok_piece`, `supply_price`, `markup`, `discount`, `discount_date`, `one_or_more`, `other_count`, `other_bonus`, `bonus_comment`, `wish_list`, `best_selling`, `created_at`, `updated_at`, `deleted_at`) VALUES
(236, 'asdjgg', 'mvtalma-fudji-kg', 'MVT.ALMA FUDJI KG', 'MVT.ALMA FUDJI KG', 'MVT.ALMA FUDJI KG', 'MVT.ALMA FUDJI KG', 15, '2.00', '30.00', 10, '2021-11-30 08:19:00', 3, 10, 5, 2, 0, 0, '2021-11-09 08:34:27', '2021-11-26 04:00:20', NULL),
(237, 'asfzggrg', 'mvtananas-eded', 'MVT.ANANAS EDED', 'MVT.ANANAS EDED', 'MVT.ANANAS EDED', 'MVT.ANANAS EDED', 5, '4.90', '20.00', 15, NULL, NULL, NULL, NULL, NULL, 0, 0, '2021-11-15 04:19:16', '2021-11-29 04:40:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
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
) ENGINE=InnoDB AUTO_INCREMENT=239 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`id`, `product_id`, `measurement`, `show_new_collection`, `show_hot_deal`, `show_best_seller`, `show_latest_products`, `show_deals_of_the_day`, `show_picked_for_you`) VALUES
(236, 236, 'kq', 0, 0, 0, 0, 0, 0),
(238, 237, 'eded', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

DROP TABLE IF EXISTS `product_image`;
CREATE TABLE IF NOT EXISTS `product_image` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int UNSIGNED NOT NULL,
  `image_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `thumb_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `main_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `cover` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_image_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=331 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image_name`, `thumb_name`, `main_name`, `cover`, `created_at`, `updated_at`) VALUES
(329, 237, 'product-0_237_1636964356.webp', 'thumb_product-0_237_1636964356.webp', 'main_product-0_237_1636964356.webp', NULL, '2021-11-15 04:19:16', '2021-11-15 04:19:16'),
(330, 237, 'product-0_237_1637758404.webp', 'thumb_product-0_237_1637758404.webp', 'main_product-0_237_1637758404.webp', NULL, '2021-11-24 08:53:26', '2021-11-24 08:53:26');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `rating` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `services_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `services_price` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_returns`
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
-- Dumping data for table `shipping_returns`
--

INSERT INTO `shipping_returns` (`id`, `shipping_return`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sifarişin izlənilməsi\r\n<p>Kuryer ilə planlı və ya ekspress &ccedil;atdırılmanı se&ccedil;dikdə sizin sifariş &ccedil;atdırılmaya veriləndə və kuryer sizə y&ouml;nlənəndə SMS bildirişlərini alacaqsınız.</p>', '2021-03-11 18:33:23', '2021-08-24 00:21:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

DROP TABLE IF EXISTS `size`;
CREATE TABLE IF NOT EXISTS `size` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(66, 'X', '2021-11-18 04:24:32', '2021-11-18 04:24:39', '2021-11-18 04:24:39'),
(67, 'size1', '2021-11-24 05:29:32', '2021-11-24 05:29:32', NULL),
(68, 'size2', '2021-11-24 05:38:05', '2021-11-24 05:38:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `size_product`
--

DROP TABLE IF EXISTS `size_product`;
CREATE TABLE IF NOT EXISTS `size_product` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `size_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `size_product_size_id_foreign` (`size_id`),
  KEY `size_product_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `size_product`
--

INSERT INTO `size_product` (`id`, `size_id`, `product_id`) VALUES
(144, 67, 236),
(145, 68, 236),
(146, 67, 237);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `slider_name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `slider_image` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `slider_slug` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `slider_order` int NOT NULL,
  `slider_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_name`, `slider_image`, `slider_slug`, `slider_order`, `slider_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(40, 'undefined', 'slider_1636114699.webp', '522', 1, 1, '2021-07-27 06:49:28', '2021-11-05 08:18:20', NULL),
(48, '', 'slider_1636114729.webp', 'https://amp.dev/tr/documentation/guides-and-tutorials/start/create/basic_markup/', 4, 1, '2021-08-14 13:13:37', '2021-11-05 08:18:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `markup` int NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_general_ci,
  `company` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fax` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `website` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `postcode` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_product`
--

DROP TABLE IF EXISTS `supplier_product`;
CREATE TABLE IF NOT EXISTS `supplier_product` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `supplier_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `supplier_product_supplier_id_foreign` (`supplier_id`),
  KEY `supplier_product_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tag_product`
--

DROP TABLE IF EXISTS `tag_product`;
CREATE TABLE IF NOT EXISTS `tag_product` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `tag_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tag_product_tag_id_foreign` (`tag_id`),
  KEY `tag_product_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
) ENGINE=InnoDB AUTO_INCREMENT=195 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `mobile`, `password`, `activation_key`, `is_active`, `bonus`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(192, 'Mehemmed', 'Qalayciyev', 'qalayciyev@gmail.com', '+994514598208', '$2y$10$wUl0Jm29gfHjokZTSSFgCuRvHo03RD/qP.AV6CvSoRButm91dCaHy', NULL, 1, 4, '1VFWAMp66XPwnXoJWzpHNYzmFISC61N4ZV5gl0Yh3oB4LBZSeDmTpC32DHJ7', '2021-07-28 07:35:09', '2021-11-12 04:57:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

DROP TABLE IF EXISTS `user_detail`;
CREATE TABLE IF NOT EXISTS `user_detail` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `zip_code` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_detail_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `user_id`, `address`, `city`, `state`, `country`, `zip_code`, `phone`) VALUES
(13, 192, 'Baku Umid Ekberov 86', 'Baku', 'Baku', 'Azerbaycan', 'AZ1138', '+994707250903');

-- --------------------------------------------------------

--
-- Table structure for table `wish_list`
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wish_list`
--

INSERT INTO `wish_list` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(26, 192, 237, '2021-12-01 03:53:06', '2021-12-01 03:55:07', '2021-12-01 03:55:07'),
(27, 192, 236, '2021-12-01 03:53:09', '2021-12-01 03:55:10', '2021-12-01 03:55:10');

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
  ADD CONSTRAINT `price_list_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `price_list_ibfk_3` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD CONSTRAINT `product_detail_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `size_product`
--
ALTER TABLE `size_product`
  ADD CONSTRAINT `size_product_ibfk_1` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `size_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
