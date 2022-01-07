-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 07, 2022 at 03:08 AM
-- Server version: 10.3.32-MariaDB-cll-lve
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `megamwpk_goycayavm`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `about` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `about`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '<h3>goycay-avm.az sayt olaraq həm blog, həm xidmət, həm maqazin kimi sizin xidmətinizdədir. Bu saytı yaratmaqda məqsədimiz sizə standart, orginal elektrik məhsulları haqqda geniş məlumat vermək və sizə sərfəli qiymətlərlə m&uuml;xtəlif &ouml;dəniş &uuml;sulları ilə elektrik məhsullarının &ccedil;atdırılmasını təşkil etməkdir.</h3>\r\n\r\n<p>Bizim vəzifəmiz yalnız d&uuml;zg&uuml;n məhsulu satmaq deyil, həm də alıcını məlumatlandırmaq və maarifləndirməkdir. &nbsp;Sizi maraqlandıran hər-hansı bir məhsul və ya xidmət olarsa, dərhal bizimlə əlaqə saxlayın.<br />\r\ntel:994508382300</p>', NULL, '2022-01-06 20:24:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `is_manage` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `mobile`, `password`, `address`, `city`, `state`, `country`, `zip_code`, `phone`, `activation_key`, `is_active`, `is_manage`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'Göyçay', 'AVM', 'qalayciyev@gmail.com', '+994 ** *** ** **', '$2y$10$wUl0Jm29gfHjokZTSSFgCuRvHo03RD/qP.AV6CvSoRButm91dCaHy', 'Baku', 'Bakı', 'Bakı', 'Azərbaycan', NULL, '+994 ** *** ** **', NULL, 1, 1, 'rrN6PE0ugW0HFmiI0bFoLxcvHvZVqrm2Yq9ZFJ58x1yzcS1XOhua6gHAMCpK', '2021-07-01 19:37:26', '2021-11-12 05:12:45', NULL),
(8, 'Ariz', 'Alıyev', 'ariznd.info@gmail.com', '+994503952986', '$2y$10$8p3ZomY/dYT59EH8fm9DZekYqhZdNbYRZYPEe5J/3dev5bbHpyspu', 'Şəhriyar ev 8,m17', 'Göyçay', 'Bakı', 'Azərbaycan', 'AZ2300', '+994202744196', NULL, 1, 1, '01ILeCjM9cT8QpdA6Rcp7Ahmn59sEKTapKyAqOtfaBApJ5tpeTsSLCLCooMv', '2021-12-23 16:20:01', '2021-12-23 16:20:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `api_keys`
--

CREATE TABLE `api_keys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `api_token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `api_keys`
--

INSERT INTO `api_keys` (`id`, `name`, `api_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1C', 'reUXHNM90cz406PYXKCcKATKGOiRjWSeNYFbQLA0kBHnvMZxKdDzn6LehKJUb6Scsb3NRsMW0lvYwqDzafi8vhoqXqpNULaRAE3j', '2021-11-16 10:05:10', '2021-11-16 10:06:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(10) NOT NULL,
  `banner_name` varchar(191) DEFAULT NULL,
  `banner_image` varchar(191) NOT NULL,
  `banner_slug` varchar(191) NOT NULL,
  `banner_order` int(11) NOT NULL,
  `banner_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `type`, `banner_name`, `banner_image`, `banner_slug`, `banner_order`, `banner_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 'top', 'banner2', 'banner_1640520003.webp', 'https://goycay-avm.az/category/fast-food', 1, 1, '2021-07-27 06:47:02', '2022-01-06 20:26:41', NULL),
(12, 'top', '', 'banner_1636114965.webp', 'basic_markup/', 2, 1, '2021-08-15 04:14:07', '2022-01-04 14:44:55', NULL),
(13, 'center', NULL, 'banner_1636185508.webp', 'banner center', 3, 1, '2021-11-04 06:40:46', '2021-11-06 03:58:29', NULL),
(14, 'top', NULL, 'banner_1636121449.webp', 'banner55', 3, 1, '2021-11-04 06:47:41', '2022-01-04 14:44:55', NULL),
(15, 'bottom', NULL, 'banner_1636185632.webp', 'banner55', 5, 1, '2021-11-04 06:58:32', '2021-11-06 04:00:32', NULL),
(16, 'bottom', NULL, 'banner_1636185666.webp', 'banner55', 6, 1, '2021-11-04 06:58:47', '2021-11-06 04:01:06', NULL),
(17, 'bottom', NULL, 'banner_1636185682.webp', 'banner55', 7, 1, '2021-11-04 06:59:04', '2021-11-06 04:01:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `blog_content` text NOT NULL,
  `blog_image` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `brand` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `slug`, `image`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'CHINA', 'china', NULL, NULL, '2021-12-30 13:21:47', '2021-12-30 13:21:47', NULL),
(2, 'NO NAME', 'no-name', NULL, NULL, '2021-12-30 13:21:47', '2021-12-30 13:21:47', NULL),
(3, 'QUBA', 'quba', NULL, NULL, '2021-12-30 13:21:47', '2021-12-30 13:21:47', NULL),
(4, 'KƏND', 'kend', NULL, NULL, '2021-12-30 13:36:36', '2021-12-30 13:36:36', NULL),
(5, 'Defacto', 'defacto', NULL, NULL, '2022-01-03 21:08:16', '2022-01-03 21:08:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brand_product`
--

CREATE TABLE `brand_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand_product`
--

INSERT INTO `brand_product` (`id`, `brand_id`, `product_id`) VALUES
(24494, 2, 24488),
(24495, 2, 24489),
(24496, 2, 24490),
(24497, 2, 24491),
(24498, 4, 24492),
(24499, 2, 24493),
(24501, 2, 24495),
(24505, 2, 24499),
(24506, 2, 24500),
(24507, 4, 24501),
(24509, 3, 24503),
(24512, 2, 24506),
(24513, 3, 24507),
(24514, 5, 24508),
(24515, 1, 24509),
(24516, 2, 24510),
(24517, 2, 24511),
(24518, 2, 24512),
(24519, 2, 24513),
(24520, 2, 24514);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT 0,
  `no_register` int(11) NOT NULL DEFAULT 0,
  `time_id` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
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
(149, 195, 0, 0, '2021-12-26 23:25:12', '2021-12-26 23:25:12', NULL),
(150, 195, 0, 0, '2021-12-27 12:58:48', '2021-12-27 12:58:48', NULL),
(151, 195, 0, 0, '2021-12-27 21:47:04', '2021-12-27 21:47:04', NULL),
(152, 192, 0, 0, '2021-12-28 18:12:05', '2021-12-28 18:12:05', NULL),
(153, 192, 0, 0, '2021-12-28 18:24:43', '2021-12-28 18:24:43', NULL),
(154, 195, 0, 0, '2021-12-28 20:55:01', '2021-12-28 20:55:01', NULL),
(155, 195, 0, 0, '2021-12-28 21:59:40', '2021-12-28 21:59:40', NULL),
(156, 203, 0, 0, '2021-12-29 04:08:49', '2021-12-29 04:08:49', NULL),
(157, 203, 0, 0, '2021-12-29 05:00:58', '2021-12-29 05:00:58', NULL),
(158, 203, 0, 0, '2021-12-29 05:16:34', '2021-12-29 05:16:34', NULL),
(159, 203, 0, 0, '2021-12-29 05:19:09', '2021-12-29 05:19:09', NULL),
(160, 203, 0, 0, '2021-12-29 05:19:45', '2021-12-29 05:19:45', NULL),
(161, 195, 0, 0, '2021-12-29 17:44:17', '2021-12-29 17:44:17', NULL),
(162, 198, 0, 0, '2021-12-29 17:51:40', '2021-12-29 17:51:40', NULL),
(163, 198, 0, 0, '2021-12-29 21:21:32', '2021-12-29 21:21:32', NULL),
(164, 195, 0, 0, '2021-12-29 21:48:40', '2021-12-29 21:48:40', NULL),
(165, 198, 0, 0, '2021-12-29 23:58:39', '2021-12-29 23:58:39', NULL),
(166, 195, 0, 0, '2021-12-29 23:59:32', '2021-12-29 23:59:32', NULL),
(167, 198, 0, 0, '2021-12-30 00:49:29', '2021-12-30 00:49:29', NULL),
(168, 195, 0, 0, '2021-12-31 15:02:12', '2021-12-31 15:02:12', NULL),
(169, 198, 0, 0, '2022-01-04 11:09:23', '2022-01-04 11:09:23', NULL),
(170, 192, 0, 0, '2022-01-04 15:09:34', '2022-01-04 15:09:34', NULL),
(171, 195, 0, 0, '2022-01-04 15:13:01', '2022-01-04 15:13:01', NULL),
(172, 195, 0, 0, '2022-01-04 15:20:10', '2022-01-04 15:20:10', NULL),
(173, 192, 0, 0, '2022-01-04 17:20:55', '2022-01-04 17:20:55', NULL),
(174, 195, 0, 0, '2022-01-05 17:08:54', '2022-01-05 17:08:54', NULL),
(175, 195, 0, 0, '2022-01-05 21:43:33', '2022-01-05 21:43:33', NULL),
(176, 195, 0, 0, '2022-01-05 21:47:42', '2022-01-05 21:47:42', NULL),
(177, 195, 0, 0, '2022-01-05 21:48:43', '2022-01-05 21:48:43', NULL),
(178, 195, 0, 0, '2022-01-05 21:52:39', '2022-01-05 21:52:39', NULL),
(179, 195, 0, 0, '2022-01-05 23:14:45', '2022-01-05 23:14:45', NULL),
(180, 195, 0, 0, '2022-01-06 00:52:23', '2022-01-06 00:52:23', NULL),
(181, 192, 0, 0, '2022-01-06 15:52:27', '2022-01-06 15:52:27', NULL),
(182, 192, 0, 0, '2022-01-06 15:54:34', '2022-01-06 15:54:34', NULL),
(183, 192, 0, 0, '2022-01-06 15:58:06', '2022-01-06 15:58:06', NULL),
(184, 195, 0, 0, '2022-01-06 16:53:14', '2022-01-06 16:53:14', NULL),
(185, 195, 0, 0, '2022-01-06 17:18:48', '2022-01-06 17:18:48', NULL),
(186, 198, 0, 0, '2022-01-06 17:19:22', '2022-01-06 17:19:22', NULL),
(187, 198, 0, 0, '2022-01-06 17:21:12', '2022-01-06 17:21:12', NULL),
(188, 192, 0, 0, '2022-01-06 19:03:01', '2022-01-06 19:03:01', NULL),
(189, 198, 0, 0, '2022-01-06 19:15:55', '2022-01-06 19:15:55', NULL),
(190, 198, 0, 0, '2022-01-07 01:18:50', '2022-01-07 01:18:50', NULL),
(191, 192, 0, 0, '2022-01-07 16:41:59', '2022-01-07 16:41:59', NULL),
(192, 192, 0, 0, '2022-01-07 17:00:10', '2022-01-07 17:00:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart_product`
--

CREATE TABLE `cart_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `cart_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `size_id` int(10) UNSIGNED DEFAULT NULL,
  `color_id` int(10) UNSIGNED DEFAULT NULL,
  `piece` int(11) NOT NULL,
  `amount` decimal(5,2) NOT NULL,
  `sale_price` decimal(6,2) NOT NULL,
  `price_id` int(11) NOT NULL,
  `cart_status` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_product`
--

INSERT INTO `cart_product` (`id`, `cart_id`, `product_id`, `size_id`, `color_id`, `piece`, `amount`, `sale_price`, `price_id`, `cart_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(373, 169, 24488, NULL, 1, 3, 4.00, 4.00, 24554, 'Pending', '2022-01-04 11:09:23', '2022-01-04 11:10:15', NULL),
(377, 150, 24488, NULL, 1, 2, 4.15, 4.15, 24555, 'Pending', '2022-01-04 14:50:18', '2022-01-04 14:50:18', NULL),
(378, 150, 24489, NULL, 1, 1, 1.35, 1.35, 24556, 'Pending', '2022-01-04 14:50:25', '2022-01-04 14:50:25', NULL),
(379, 150, 24503, NULL, 1, 1, 3.80, 3.80, 24585, 'Pending', '2022-01-04 14:59:59', '2022-01-04 14:59:59', NULL),
(380, 153, 24489, NULL, 1, 2, 1.35, 1.35, 24556, 'Pending', '2022-01-04 15:08:27', '2022-01-04 15:08:27', NULL),
(388, 171, 24493, NULL, 1, 1, 1.15, 1.15, 24561, 'Pending', '2022-01-04 15:13:55', '2022-01-04 15:13:55', NULL),
(389, 171, 24495, NULL, 1, 1, 12.50, 12.50, 24566, 'Pending', '2022-01-04 15:13:58', '2022-01-04 15:13:58', NULL),
(407, 149, 24491, NULL, 1, 2, 5.34, 5.34, 24558, 'Pending', '2022-01-05 16:33:19', '2022-01-05 16:33:52', NULL),
(408, 149, 24492, NULL, 1, 3, 6.00, 6.00, 24559, 'Pending', '2022-01-05 16:33:25', '2022-01-05 16:33:55', NULL),
(409, 149, 24490, NULL, 1, 2, 11.90, 11.90, 24557, 'Pending', '2022-01-05 16:33:35', '2022-01-05 16:33:35', NULL),
(412, 173, 24506, NULL, 1, 1, 5.50, 5.50, 24588, 'Pending', '2022-01-05 17:09:26', '2022-01-05 17:10:47', NULL),
(414, 174, 24507, NULL, 1, 2, 3.80, 3.80, 24589, 'Pending', '2022-01-05 17:15:31', '2022-01-05 17:41:13', NULL),
(416, 174, 24488, NULL, 1, 2, 4.15, 4.15, 24555, 'Pending', '2022-01-05 17:39:41', '2022-01-05 17:40:51', NULL),
(420, 174, 24503, NULL, 1, 2, 3.80, 3.80, 24585, 'Pending', '2022-01-05 17:40:24', '2022-01-05 17:40:40', NULL),
(423, 141, 24488, NULL, 1, 1, 4.15, 4.15, 24555, 'Pending', '2022-01-05 21:37:15', '2022-01-05 21:37:15', NULL),
(424, 141, 24489, NULL, 1, 1, 1.35, 1.35, 24556, 'Pending', '2022-01-05 21:37:29', '2022-01-05 21:37:29', NULL),
(425, 141, 24503, NULL, 1, 1, 3.80, 3.80, 24585, 'Pending', '2022-01-05 21:37:33', '2022-01-05 21:37:33', NULL),
(427, 141, 24491, NULL, 1, 2, 5.34, 5.34, 24558, 'Pending', '2022-01-05 21:37:52', '2022-01-05 21:37:52', NULL),
(428, 141, 24492, NULL, 1, 2, 6.20, 6.20, 24559, 'Pending', '2022-01-05 21:37:55', '2022-01-05 21:37:55', NULL),
(429, 141, 24495, NULL, 1, 1, 12.50, 12.50, 24566, 'Pending', '2022-01-05 21:38:06', '2022-01-05 21:38:06', NULL),
(433, 176, 24490, NULL, 1, 3, 11.90, 11.90, 24557, 'Pending', '2022-01-05 21:47:48', '2022-01-05 21:48:06', NULL),
(437, 178, 24509, NULL, 146, 8, 2.35, 2.75, 24597, 'Pending', '2022-01-05 22:24:03', '2022-01-05 22:25:51', NULL),
(438, 178, 24509, NULL, 147, 2, 2.65, 2.65, 24598, 'Pending', '2022-01-05 22:24:43', '2022-01-05 22:24:43', NULL),
(439, 178, 24509, NULL, 148, 3, 2.85, 2.85, 24599, 'Pending', '2022-01-05 22:24:48', '2022-01-05 22:24:48', NULL),
(442, 179, 24495, NULL, 1, 6, 12.50, 12.50, 24566, 'Pending', '2022-01-05 23:16:03', '2022-01-05 23:18:21', NULL),
(443, 179, 24488, NULL, 1, 2, 4.15, 4.15, 24555, 'Pending', '2022-01-05 23:16:49', '2022-01-05 23:16:49', NULL),
(444, 179, 24489, NULL, 1, 10, 1.25, 1.35, 24556, 'Pending', '2022-01-05 23:16:52', '2022-01-05 23:18:06', NULL),
(449, 180, 24503, NULL, 1, 1, 3.80, 3.80, 24585, 'Pending', '2022-01-06 06:22:52', '2022-01-06 06:22:52', NULL),
(450, 180, 24506, NULL, 1, 1, 5.50, 5.50, 24588, 'Pending', '2022-01-06 06:22:58', '2022-01-06 06:22:58', NULL),
(451, 180, 24514, NULL, 149, 1, 2.20, 2.20, 24605, 'Pending', '2022-01-06 06:23:04', '2022-01-06 06:23:04', NULL),
(452, 180, 24500, NULL, 1, 10, 0.20, 0.20, 24578, 'Pending', '2022-01-06 06:23:21', '2022-01-06 06:23:21', NULL),
(453, 180, 24501, NULL, 1, 1, 0.35, 0.35, 24580, 'Pending', '2022-01-06 06:23:46', '2022-01-06 06:24:42', NULL),
(454, 180, 24489, NULL, 1, 4, 1.35, 1.35, 24556, 'Pending', '2022-01-06 06:24:09', '2022-01-06 06:24:09', NULL),
(455, 180, 24495, NULL, 1, 2, 12.50, 12.50, 24566, 'Pending', '2022-01-06 06:27:15', '2022-01-06 06:27:15', NULL),
(456, 180, 24499, NULL, 1, 3, 14.20, 14.20, 24576, 'Pending', '2022-01-06 06:27:24', '2022-01-06 06:27:24', NULL),
(457, 177, 24489, NULL, 1, 5, 1.35, 1.35, 24556, 'Pending', '2022-01-06 13:35:08', '2022-01-06 13:37:48', NULL),
(458, 177, 24511, NULL, 1, 1, 3.50, 3.50, 24602, 'Pending', '2022-01-06 13:36:14', '2022-01-06 13:36:14', NULL),
(460, 173, 24488, NULL, 1, 2, 4.15, 4.15, 24555, 'Pending', '2022-01-06 15:22:15', '2022-01-06 15:22:47', NULL),
(461, 173, 24503, NULL, 1, 2, 3.80, 3.80, 24585, 'Pending', '2022-01-06 15:22:37', '2022-01-06 15:22:49', NULL),
(462, 173, 24495, NULL, 1, 2, 12.50, 12.50, 24566, 'Pending', '2022-01-06 15:22:41', '2022-01-06 15:22:50', NULL),
(463, 173, 24509, NULL, 146, 1, 2.75, 2.75, 24597, 'Pending', '2022-01-06 15:22:45', '2022-01-06 15:22:45', NULL),
(464, 181, 24488, NULL, 1, 1, 4.15, 4.15, 24555, 'Pending', '2022-01-06 15:52:27', '2022-01-06 15:52:27', NULL),
(465, 181, 24495, NULL, 1, 2, 12.50, 12.50, 24566, 'Pending', '2022-01-06 15:52:28', '2022-01-06 15:52:30', NULL),
(466, 181, 24509, NULL, 146, 1, 2.75, 2.75, 24597, 'Pending', '2022-01-06 15:52:31', '2022-01-06 15:52:31', NULL),
(467, 181, 24503, NULL, 1, 1, 3.80, 3.80, 24585, 'Pending', '2022-01-06 15:52:33', '2022-01-06 15:52:33', NULL),
(468, 182, 24489, NULL, 1, 1, 1.35, 1.35, 24556, 'Pending', '2022-01-06 15:54:34', '2022-01-06 15:54:34', NULL),
(469, 182, 24495, NULL, 1, 1, 12.50, 12.50, 24566, 'Pending', '2022-01-06 15:54:39', '2022-01-06 15:54:39', NULL),
(470, 183, 24495, NULL, 1, 1, 12.50, 12.50, 24566, 'Pending', '2022-01-06 15:58:06', '2022-01-06 15:58:06', NULL),
(473, 175, 24514, NULL, 149, 10, 2.00, 2.00, 24605, 'Pending', '2022-01-06 17:14:16', '2022-01-06 17:14:16', NULL),
(474, 169, 24514, NULL, 149, 10, 2.00, 2.00, 24605, 'Pending', '2022-01-06 17:15:40', '2022-01-06 17:15:40', NULL),
(477, 186, 24514, NULL, 149, 10, 2.00, 2.00, 24605, 'Pending', '2022-01-06 17:19:22', '2022-01-06 17:19:22', NULL),
(478, 187, 24514, NULL, 149, 1, 2.20, 2.20, 24605, 'Pending', '2022-01-06 17:21:12', '2022-01-06 17:21:12', NULL),
(479, 187, 24508, 115, 153, 1, 95.00, 95.00, 24595, 'Pending', '2022-01-06 17:32:16', '2022-01-06 17:32:16', NULL),
(480, 187, 24508, 114, 154, 1, 85.00, 85.00, 24594, 'Pending', '2022-01-06 17:32:21', '2022-01-06 17:32:21', NULL),
(481, 187, 24508, 113, 152, 1, 68.00, 68.00, 24593, 'Pending', '2022-01-06 17:32:26', '2022-01-06 17:32:26', NULL),
(491, 189, 24508, 113, 152, 1, 85.00, 68.00, 24593, 'Pending', '2022-01-06 19:15:55', '2022-01-06 19:16:45', NULL),
(492, 189, 24508, 114, 154, 1, 85.00, 85.00, 24594, 'Pending', '2022-01-06 19:16:02', '2022-01-06 19:16:02', NULL),
(493, 189, 24508, 115, 153, 1, 95.00, 95.00, 24595, 'Pending', '2022-01-06 19:16:06', '2022-01-06 19:16:06', NULL),
(504, 188, 24510, NULL, 1, 1, 2.90, 2.90, 24601, 'Pending', '2022-01-06 22:10:22', '2022-01-06 22:10:38', NULL),
(508, 185, 24510, NULL, 1, 1, 2.90, 2.90, 24601, 'Pending', '2022-01-07 00:41:05', '2022-01-07 00:41:05', NULL),
(509, 185, 24513, NULL, 1, 1, 3.20, 3.20, 24604, 'Pending', '2022-01-07 00:41:08', '2022-01-07 00:41:08', NULL),
(510, 190, 24510, NULL, 1, 1, 2.90, 2.90, 24601, 'Pending', '2022-01-07 01:18:50', '2022-01-07 01:18:50', NULL),
(522, 170, 24512, NULL, 1, 1, 3.80, 3.80, 24603, 'Pending', '2022-01-07 16:40:02', '2022-01-07 16:40:02', NULL),
(523, 191, 24511, NULL, 1, 5, 3.50, 3.50, 24602, 'Pending', '2022-01-07 16:41:59', '2022-01-07 16:55:41', NULL),
(524, 192, 24511, NULL, 1, 5, 3.50, 3.50, 24602, 'Pending', '2022-01-07 17:00:10', '2022-01-07 17:00:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `top_id` int(11) DEFAULT NULL,
  `category_name` varchar(30) NOT NULL,
  `slug` varchar(40) NOT NULL,
  `category_view` int(11) DEFAULT 0,
  `no_order_amount` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `top_id`, `category_name`, `slug`, `category_view`, `no_order_amount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, NULL, 'Meyvə,Tərəvəz,Quru Meyvə', 'meyveterevezquru-meyve', 0, 0, '2021-12-30 13:21:48', '2022-01-03 21:21:21', NULL),
(6, NULL, 'Ət,Toyuq,Dəniz məhsulları', 'ettoyuqdeniz-mehsullari', 0, 0, '2021-12-30 13:21:48', '2022-01-04 13:28:12', NULL),
(9, NULL, 'Ərzaq Məhsulları', 'erzaq-mehsullari', 0, 0, '2022-01-03 19:44:25', '2022-01-04 13:28:12', NULL),
(20, 2, 'MEYVƏ', 'meyve', 0, 0, '2021-12-30 13:21:48', '2021-12-30 13:57:20', NULL),
(22, 6, 'TOYUQ', 'toyuq', 0, 0, '2021-12-30 13:21:48', '2021-12-30 13:36:37', NULL),
(23, 2, 'TƏRƏVƏZ', 'terevez', 0, 0, '2021-12-30 13:21:48', '2021-12-30 13:57:20', NULL),
(31, 6, 'YUMURTA', 'yumurta', 0, 0, '2021-12-30 13:36:37', '2021-12-30 13:36:37', NULL),
(35, 6, 'DƏNİZ MƏHSULLARI', 'deniz-mehsullari', 0, 0, '2021-12-30 14:22:19', '2021-12-30 14:22:19', NULL),
(39, 6, 'ƏT', 'et', 0, 0, '2022-01-03 16:14:50', '2022-01-03 16:14:50', NULL),
(41, 9, 'UNLAR', 'unlar', 0, 0, '2022-01-03 19:44:25', '2022-01-03 19:44:25', NULL),
(43, NULL, 'Geyimlər', 'geyimler', 0, 0, '2022-01-03 21:08:17', '2022-01-04 13:28:12', NULL),
(44, 43, 'KİŞİ GEYİMLƏRİ', 'kisi-geyimleri', 0, 0, '2022-01-03 21:08:17', '2022-01-03 21:08:17', NULL),
(47, NULL, 'Fast-Food', 'fast-food', 0, 1, '2022-01-05 23:52:53', '2022-01-06 21:10:20', NULL),
(48, 47, 'DÖNƏR', 'doner', 0, 0, '2022-01-05 23:52:53', '2022-01-05 23:52:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_images`
--

CREATE TABLE `category_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `image_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_images`
--

INSERT INTO `category_images` (`id`, `category_id`, `image_name`, `created_at`, `updated_at`) VALUES
(72, 43, 'geyimler_1641227467.Geyim.png', '2022-01-03 21:31:07', '2022-01-03 21:31:07'),
(73, 6, 'ettoyuqdeniz-mehsullari_1641227643.ət-və-toyuq məhsulları.svg', '2022-01-03 21:34:03', '2022-01-03 21:34:03'),
(80, 2, 'meyveterevezquru-meyve_1641228596.Meyvə-və-tərəvəz.png', '2022-01-03 21:49:56', '2022-01-03 21:49:56');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `category_id`, `product_id`) VALUES
(24515, 23, 24488),
(24516, 41, 24489),
(24517, 39, 24490),
(24518, 22, 24491),
(24519, 22, 24492),
(24520, 23, 24493),
(24522, 35, 24495),
(24526, 35, 24499),
(24527, 31, 24500),
(24528, 31, 24501),
(24530, 20, 24503),
(24533, 23, 24506),
(24534, 20, 24507),
(24535, 44, 24508),
(24536, 20, 24509),
(24538, 48, 24511),
(24539, 48, 24512),
(24540, 48, 24513),
(24541, 23, 24514),
(24543, 48, 24510);

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `title`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'none', 'none', '2021-12-10 02:55:26', '2022-01-04 13:55:43', NULL),
(145, 'QARA', '#000000', '2021-12-29 23:28:45', '2021-12-29 23:28:45', NULL),
(146, 'QIRMIZI', '#FF0000', '2021-12-29 23:28:45', '2021-12-30 13:21:50', NULL),
(147, 'SARI', '#FFFF00', '2021-12-29 23:28:45', '2021-12-29 23:28:45', NULL),
(148, 'YAŞIL', '#00FF00', '2021-12-29 23:28:45', '2021-12-29 23:28:45', NULL),
(149, 'GÖY', '#0000FF', '2021-12-29 23:28:45', '2021-12-29 23:28:45', NULL),
(151, 'AĞ', '#FFFFFF', '2022-01-03 16:31:05', '2022-01-03 16:31:05', NULL),
(152, 'BƏNÖVŞƏYİ', '#800080', '2022-01-03 21:08:18', '2022-01-03 21:08:18', NULL),
(153, 'QƏHVƏYİ', '#DEB887', '2022-01-03 21:08:18', '2022-01-03 21:08:18', NULL),
(154, 'Fuchsia', '#FF00FF', '2022-01-05 22:14:56', '2022-01-05 22:14:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `color_product`
--

CREATE TABLE `color_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `color_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `color_product`
--

INSERT INTO `color_product` (`id`, `color_id`, `product_id`) VALUES
(30162, 1, 24488),
(30163, 1, 24489),
(30164, 1, 24490),
(30165, 1, 24491),
(30166, 1, 24492),
(30167, 1, 24493),
(30171, 1, 24495),
(30178, 1, 24499),
(30179, 1, 24500),
(30180, 1, 24501),
(30185, 1, 24503),
(30189, 1, 24506),
(30190, 1, 24507),
(30192, 152, 24508),
(30193, 154, 24508),
(30194, 153, 24508),
(30195, 1, 24508),
(30196, 146, 24509),
(30197, 147, 24509),
(30198, 148, 24509),
(30199, 1, 24509),
(30200, 1, 24510),
(30201, 1, 24511),
(30202, 1, 24512),
(30203, 1, 24513),
(30204, 149, 24514),
(30205, 145, 24514),
(30206, 1, 24514);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `message` text NOT NULL,
  `feedback` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `feedback`, `created_at`, `updated_at`, `deleted_at`) VALUES
(32, 'Ariz', 'ariznd-inf0@yandex.ru', 'Salam', NULL, '2021-12-26 14:47:46', '2021-12-26 14:47:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `infos`
--

CREATE TABLE `infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `logo` varchar(150) DEFAULT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `keywords` text DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `mobile` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `youtube` text DEFAULT NULL,
  `pinterest` text DEFAULT NULL,
  `payment_door` text DEFAULT NULL,
  `delivery` varchar(191) DEFAULT NULL,
  `standart_delivery_amount` decimal(7,2) NOT NULL,
  `fast_delivery_amount` decimal(7,2) NOT NULL,
  `min_order_amount` decimal(7,2) DEFAULT NULL,
  `bonus_amount` decimal(7,2) DEFAULT 0.00
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `infos`
--

INSERT INTO `infos` (`id`, `logo`, `title`, `description`, `keywords`, `phone`, `mobile`, `email`, `address`, `facebook`, `instagram`, `twitter`, `youtube`, `pinterest`, `payment_door`, `delivery`, `standart_delivery_amount`, `fast_delivery_amount`, `min_order_amount`, `bonus_amount`) VALUES
(1, 'logo.png', 'Goychayda internet üzərində online market |Göyçay AVM', 'Göyçay AVM də istədiyiniz qədər ərzaq,geyim,elektronika,fast-food sifariş edə bilərsiniz əlaqə nömrəsi +994508382300', '#goychayda #qida #məhsullarının #online #satışı', '+994 ** *** ** **', '+994508382300', 'info@goycay-avm.az', 'Online Store', 'https://www.facebook.com/G%C3%B6y%C3%A7ay-AVM-101523055714807', 'https://www.instagram.com/', 'https://www.twitter.com/', 'https://www.youtube.com/', 'https://www.pinterest.com/', 'Göyçay şəhəri üzrə çatdırılma 0 azn təşkil edir.\r\nBölgələrə çatdırılma xidməti yoxdur.\r\nMəhsul sifariş verdiyiniz andan 1-2 saat ərzində müştəriyə təhvil verilir.', 'Göyçay şəhəri üzrə çatdırılma 2azn təşkil edir.', 0.00, 2.00, 40.00, 0.20);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

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
(14, '[{\"1\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\"],\"2\":[\"measurement qeyd edin.\",\"stok piece qeyd edin.\",\"P\\u0259rak\\u0259nd\\u0259 Qiym\\u0259ti qeyd edin.\",\"brand id qeyd edin.\"]}]', '2021-11-24 03:40:04', '2021-11-24 03:40:04'),
(33, '[{\"20123\":[\"price list qeyd edin.\"],\"20124\":[\"price list qeyd edin.\"],\"20125\":[\"price list qeyd edin.\"]}]', '2021-12-02 16:54:55', '2021-12-02 16:54:55'),
(38, '[[\"brand name qeyd edin.\"]]', '2021-12-06 19:01:55', '2021-12-06 19:01:55'),
(44, '[{\"product_name\":\"MVT.ALMA FUDJI KG\",\"product_code\":1,\"measurement\":\"\\u0259d\\u0259d\",\"stok_piece\":0,\"sale_price\":2.65,\"product_description\":\"MVT.ALMA FUDJI sar\\u0131 41\",\"discount\":0,\"discount_date\":\"2022-10-10 11:10:10\",\"category_id\":20,\"brand_id\":1,\"colors\":[{\"color_name\":\"ag\",\"color_title\":\"#FFFFFF\"},{\"color_name\":\"qara\",\"color_title\":\"#000000\"},{\"color_name\":\"sari\",\"color_title\":\"#FFFF00\"},{\"color_name\":\"yasil\",\"color_title\":\"#00FF00\"}],\"sizes\":[\"42\",\"41\"],\"stock_list\":[{\"stock_piece\":5,\"color_name\":\"ag\",\"color_title\":\"#FFFFFF\",\"size_name\":\"42\"},{\"stock_piece\":10,\"color_name\":\"qara\",\"color_title\":\"#000000\",\"size_name\":\"41\"},{\"stock_piece\":5,\"color_name\":\"sari\",\"color_title\":\"#FFFF00\",\"size_name\":\"41\"},{\"stock_piece\":20,\"color_name\":\"yasil\",\"color_title\":\"#00FF00\",\"size_name\":\"42\"}],\"price_list\":[{\"sale_price\":2.55,\"color_name\":\"ag\",\"color_title\":\"#FFFFFF\",\"size_name\":\"42\",\"wholesale_count\":0,\"wholesale_price\":2.35},{\"sale_price\":2.75,\"color_name\":\"qara\",\"color_title\":\"#000000\",\"size_name\":\"41\",\"wholesale_count\":0,\"wholesale_price\":2.35},{\"sale_price\":2.65,\"color_name\":\"sari\",\"color_title\":\"#FFFF00\",\"size_name\":\"41\",\"wholesale_count\":0,\"wholesale_price\":2.35},{\"sale_price\":2.85,\"color_name\":\"yasil\",\"color_title\":\"#00FF00\",\"size_name\":\"42\",\"wholesale_count\":0,\"wholesale_price\":2.35},{\"sale_price\":2.65,\"color_name\":null,\"color_title\":null,\"size_name\":null,\"wholesale_count\":0,\"wholesale_price\":2.35}]},{\"product_name\":\"ALMA SIMIRINKA KG\",\"product_code\":21,\"measurement\":\"\\u0259d\\u0259d\",\"stok_piece\":0,\"sale_price\":3.8,\"product_description\":\"MVT.ALMA SEMERINKA XARICI\",\"discount\":0,\"discount_date\":\"2022-10-10 11:10:10\",\"category_id\":20,\"brand_id\":2,\"colors\":[{\"color_name\":\"-\",\"color_title\":\"-\"}],\"sizes\":[null],\"stock_list\":[{\"stock_piece\":15,\"color_name\":\"-\",\"color_title\":\"-\",\"size_name\":null}],\"price_list\":[{\"sale_price\":3.8,\"color_name\":\"-\",\"color_title\":\"-\",\"size_name\":null,\"wholesale_count\":0,\"wholesale_price\":3},{\"sale_price\":3.8,\"color_name\":null,\"color_title\":null,\"size_name\":null,\"wholesale_count\":0,\"wholesale_price\":3}]},{\"product_name\":\"MVT.BADIMCAN KG\",\"product_code\":24,\"measurement\":\"\\u0259d\\u0259d\",\"stok_piece\":0,\"sale_price\":2.2,\"product_description\":\"MVT.BADIMCAN KG qara 41\",\"discount\":0,\"discount_date\":\"2022-10-10 11:10:10\",\"category_id\":23,\"brand_id\":2,\"colors\":[{\"color_name\":\"qara\",\"color_title\":\"#000000\"}],\"sizes\":[\"41\"],\"stock_list\":[{\"stock_piece\":10,\"color_name\":\"qara\",\"color_title\":\"#000000\",\"size_name\":\"41\"}],\"price_list\":[{\"sale_price\":2.2,\"color_name\":\"qara\",\"color_title\":\"#000000\",\"size_name\":\"41\",\"wholesale_count\":0,\"wholesale_price\":2},{\"sale_price\":2.2,\"color_name\":null,\"color_title\":null,\"size_name\":null,\"wholesale_count\":0,\"wholesale_price\":2}]},{\"product_name\":\"MVT.BIBER RENGLI KG\",\"product_code\":25,\"measurement\":\"\\u0259d\\u0259d\",\"stok_piece\":0,\"sale_price\":4.15,\"product_description\":\"MVT.BIBER RENGLI goy 42\",\"discount\":0,\"discount_date\":\"2022-10-10 11:10:10\",\"category_id\":23,\"brand_id\":2,\"colors\":[{\"color_name\":\"goy\",\"color_title\":\"#0000FF\"}],\"sizes\":[\"42\"],\"stock_list\":[{\"stock_piece\":10,\"color_name\":\"goy\",\"color_title\":\"#0000FF\",\"size_name\":\"42\"}],\"price_list\":[{\"sale_price\":4.15,\"color_name\":\"goy\",\"color_title\":\"#0000FF\",\"size_name\":\"42\",\"wholesale_count\":0,\"wholesale_price\":4},{\"sale_price\":4.15,\"color_name\":null,\"color_title\":null,\"size_name\":null,\"wholesale_count\":0,\"wholesale_price\":4}]},{\"product_name\":\"TOYUQ BUTUN TEZE KG\",\"product_code\":5,\"measurement\":\"piece\",\"stok_piece\":10,\"sale_price\":6.2,\"product_description\":\"TOYUQ BUTUN TEZE KG\",\"discount\":0,\"discount_date\":\"2022-10-10 11:10:10\",\"category_id\":22,\"brand_id\":2,\"colors\":[{\"color_name\":\"-\",\"color_title\":\"-\"}],\"sizes\":[\"-\"],\"price_list\":[{\"sale_price\":6.2,\"color_name\":null,\"color_title\":null,\"size_name\":null,\"wholesale_count\":0,\"wholesale_price\":6}],\"stock_list\":[{\"stock_piece\":10,\"color_name\":\"-\",\"color_title\":\"-\",\"size_name\":\"-\"}]}]', '2021-12-27 12:01:03', '2021-12-27 12:01:03'),
(45, '[{\"product_name\":\"MVT.ALMA FUDJI KG\",\"product_code\":1,\"measurement\":\"\\u0259d\\u0259d\",\"stok_piece\":0,\"sale_price\":2.65,\"product_description\":\"MVT.ALMA FUDJI sar\\u0131 41\",\"discount\":0,\"discount_date\":\"2022-10-10 11:10:10\",\"category_id\":20,\"brand_id\":1,\"colors\":[{\"color_name\":\"ag\",\"color_title\":\"#FFFFFF\"},{\"color_name\":\"qara\",\"color_title\":\"#000000\"},{\"color_name\":\"sari\",\"color_title\":\"#FFFF00\"},{\"color_name\":\"yasil\",\"color_title\":\"#00FF00\"}],\"sizes\":[\"42\",\"41\"],\"stock_list\":[{\"stock_piece\":5,\"color_name\":\"ag\",\"color_title\":\"#FFFFFF\",\"size_name\":\"42\"},{\"stock_piece\":10,\"color_name\":\"qara\",\"color_title\":\"#000000\",\"size_name\":\"41\"},{\"stock_piece\":5,\"color_name\":\"sari\",\"color_title\":\"#FFFF00\",\"size_name\":\"41\"},{\"stock_piece\":20,\"color_name\":\"yasil\",\"color_title\":\"#00FF00\",\"size_name\":\"42\"}],\"price_list\":[{\"sale_price\":2.55,\"color_name\":\"ag\",\"color_title\":\"#FFFFFF\",\"size_name\":\"42\",\"wholesale_count\":0,\"wholesale_price\":2.35},{\"sale_price\":2.75,\"color_name\":\"qara\",\"color_title\":\"#000000\",\"size_name\":\"41\",\"wholesale_count\":0,\"wholesale_price\":2.35},{\"sale_price\":2.65,\"color_name\":\"sari\",\"color_title\":\"#FFFF00\",\"size_name\":\"41\",\"wholesale_count\":0,\"wholesale_price\":2.35},{\"sale_price\":2.85,\"color_name\":\"yasil\",\"color_title\":\"#00FF00\",\"size_name\":\"42\",\"wholesale_count\":0,\"wholesale_price\":2.35},{\"sale_price\":2.65,\"color_name\":null,\"color_title\":null,\"size_name\":null,\"wholesale_count\":0,\"wholesale_price\":2.35}]},{\"product_name\":\"ALMA SIMIRINKA KG\",\"product_code\":21,\"measurement\":\"\\u0259d\\u0259d\",\"stok_piece\":0,\"sale_price\":3.8,\"product_description\":\"MVT.ALMA SEMERINKA XARICI\",\"discount\":0,\"discount_date\":\"2022-10-10 11:10:10\",\"category_id\":20,\"brand_id\":2,\"colors\":[{\"color_name\":\"-\",\"color_title\":\"-\"}],\"sizes\":[null],\"stock_list\":[{\"stock_piece\":15,\"color_name\":\"-\",\"color_title\":\"-\",\"size_name\":null}],\"price_list\":[{\"sale_price\":3.8,\"color_name\":\"-\",\"color_title\":\"-\",\"size_name\":null,\"wholesale_count\":0,\"wholesale_price\":3},{\"sale_price\":3.8,\"color_name\":null,\"color_title\":null,\"size_name\":null,\"wholesale_count\":0,\"wholesale_price\":3}]},{\"product_name\":\"MVT.BADIMCAN KG\",\"product_code\":24,\"measurement\":\"\\u0259d\\u0259d\",\"stok_piece\":0,\"sale_price\":2.2,\"product_description\":\"MVT.BADIMCAN KG qara 41\",\"discount\":0,\"discount_date\":\"2022-10-10 11:10:10\",\"category_id\":23,\"brand_id\":2,\"colors\":[{\"color_name\":\"qara\",\"color_title\":\"#000000\"}],\"sizes\":[\"41\"],\"stock_list\":[{\"stock_piece\":10,\"color_name\":\"qara\",\"color_title\":\"#000000\",\"size_name\":\"41\"}],\"price_list\":[{\"sale_price\":2.2,\"color_name\":\"qara\",\"color_title\":\"#000000\",\"size_name\":\"41\",\"wholesale_count\":0,\"wholesale_price\":2},{\"sale_price\":2.2,\"color_name\":null,\"color_title\":null,\"size_name\":null,\"wholesale_count\":0,\"wholesale_price\":2}]},{\"product_name\":\"MVT.BIBER RENGLI KG\",\"product_code\":25,\"measurement\":\"\\u0259d\\u0259d\",\"stok_piece\":0,\"sale_price\":4.15,\"product_description\":\"MVT.BIBER RENGLI goy 42\",\"discount\":0,\"discount_date\":\"2022-10-10 11:10:10\",\"category_id\":23,\"brand_id\":2,\"colors\":[{\"color_name\":\"goy\",\"color_title\":\"#0000FF\"}],\"sizes\":[\"42\"],\"stock_list\":[{\"stock_piece\":10,\"color_name\":\"goy\",\"color_title\":\"#0000FF\",\"size_name\":\"42\"}],\"price_list\":[{\"sale_price\":4.15,\"color_name\":\"goy\",\"color_title\":\"#0000FF\",\"size_name\":\"42\",\"wholesale_count\":0,\"wholesale_price\":4},{\"sale_price\":4.15,\"color_name\":null,\"color_title\":null,\"size_name\":null,\"wholesale_count\":0,\"wholesale_price\":4}]},{\"product_name\":\"TOYUQ BUTUN TEZE KG\",\"product_code\":5,\"measurement\":\"piece\",\"stok_piece\":10,\"sale_price\":6.2,\"product_description\":\"TOYUQ BUTUN TEZE KG\",\"discount\":0,\"discount_date\":\"2022-10-10 11:10:10\",\"category_id\":22,\"brand_id\":2,\"colors\":[{\"color_name\":\"-\",\"color_title\":\"-\"}],\"sizes\":[\"-\"],\"price_list\":[{\"sale_price\":6.2,\"color_name\":null,\"color_title\":null,\"size_name\":null,\"wholesale_count\":0,\"wholesale_price\":6}],\"stock_list\":[{\"stock_piece\":10,\"color_name\":\"-\",\"color_title\":\"-\",\"size_name\":\"-\"}]}]', '2021-12-27 12:01:45', '2021-12-27 12:01:45'),
(43, '[[\"brand name qeyd edin.\"]]', '2021-12-22 18:18:45', '2021-12-22 18:18:45');

-- --------------------------------------------------------

--
-- Table structure for table `measurement`
--

CREATE TABLE `measurement` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(191) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-11-16 08:03:20', '2021-11-16 08:03:20');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `cart_id` int(10) UNSIGNED NOT NULL,
  `order_amount` decimal(10,2) NOT NULL,
  `bonus_amount` decimal(7,2) DEFAULT NULL,
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
  `installment_number` int(11) DEFAULT NULL,
  `shipping` decimal(7,2) NOT NULL DEFAULT 0.00,
  `exported` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `cart_id`, `order_amount`, `bonus_amount`, `status`, `first_name`, `last_name`, `email`, `address`, `phone`, `mobile`, `city`, `country`, `zip_code`, `bank`, `card`, `tran_date_time`, `order_status`, `brand`, `installment_number`, `shipping`, `exported`, `created_at`, `updated_at`, `deleted_at`) VALUES
(81, 114, 0.55, NULL, 'Your order has been received', 'Ariz', 'Alıyev', 'ariznd-info@yandex.ru', 'Şəhriyar ev 8 m17', NULL, '+994503952986', 'Göyçay', 'Azərbaycan', 'AZ2300', 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 1.00, 1, '2021-12-12 17:56:05', '2021-12-28 18:24:15', '2021-12-28 18:24:15'),
(101, 124, 1.00, NULL, 'Payment is expected', 'Ariz', 'Alıyev', 'ariznd-info@yandex.ru', 'Şəhriyar ev 8 m17', '+994202744196', '+994503952986', 'Göyçay', 'Azərbaycan', 'AZ2300', 'Bank Kartı', NULL, NULL, 'PENDING', NULL, 0, 1.00, 0, '2021-12-17 18:02:55', '2021-12-24 18:43:55', '2021-12-24 18:43:55'),
(103, 139, 0.50, NULL, 'Payment is expected', 'Ariz', 'Alıyev', 'ariznd-info@yandex.ru', 'Şəhriyar ev 8 m17', '+994202744196', '+994503952986', 'Göyçay', 'Azərbaycan', 'AZ2300', 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 1.00, 0, '2021-12-18 15:30:16', '2021-12-22 18:33:42', '2021-12-22 18:33:42'),
(104, 140, 6.10, NULL, 'Payment is expected', 'Ariz', 'Alıyev', 'ariznd-info@yandex.ru', 'Şəhriyar ev 8 m17', '+994202744196', '+994503952986', 'Göyçay', 'Azərbaycan', 'AZ2300', 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 1.00, 0, '2021-12-19 22:00:01', '2021-12-22 18:33:36', '2021-12-22 18:33:36'),
(107, 144, 6.70, NULL, 'Your order has been received', 'Zöhrab', 'Əmi', 'zohrabemi@gmail.com', 'Mərdıkan , R. Qasımov küç', NULL, '+994506747820', 'Bakı', 'Azərbaycan', 'AZ41000AZ', 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 1.00, 1, '2021-12-25 01:19:06', '2021-12-25 01:21:14', '2021-12-25 01:21:14'),
(118, 151, 17.70, NULL, 'Payment is expected', 'Ariz', 'Alıyev', 'ariznd-info@yandex.ru', 'Şəhriyar ev 8 m17', '+994202744196', '+994503952986', 'Göyçay', 'Azərbaycan', 'AZ2300', 'Bank Kartı', NULL, '28/12/2021 19:54:16', 'PENDING', NULL, 0, 1.00, 0, '2021-12-28 20:52:53', '2021-12-28 20:54:44', '2021-12-28 20:54:44'),
(125, 155, 18.90, NULL, 'Payment approved', 'Ariz', 'Alıyev', 'ariznd-info@yandex.ru', 'Şəhriyar ev 8 m17', '+994202744196', '+994503952986', 'Göyçay', 'Azərbaycan', 'AZ2300', 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 1.00, 1, '2021-12-29 17:28:26', '2021-12-29 17:40:39', '2021-12-29 17:40:39'),
(126, 162, 15.25, NULL, 'Cargoed', 'Famil', 'Qasimov', 'familqasimov@gmail.com', 'Vaqif 17', '+994557318342', '0557318342', 'Göyçay', 'Азербайджан', '2300', 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 1.00, 1, '2021-12-29 17:54:30', '2021-12-29 20:48:46', '2021-12-29 20:48:46'),
(127, 161, 30.80, NULL, 'Payment approved', 'Ariz', 'Alıyev', 'ariznd-info@yandex.ru', 'Şəhriyar ev 8 m17', '+994202744196', '+994503952986', 'Göyçay', 'Azərbaycan', 'AZ2300', 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 1.00, 1, '2021-12-29 21:19:59', '2021-12-29 21:51:53', '2021-12-29 21:51:53'),
(128, 163, 23.90, NULL, 'Payment approved', 'Famil', 'Qasimov', 'familqasimov@gmail.com', 'Vaqif 17', '+994557318342', '+994557318342', 'Göyçay', 'Азербайджан', '2300', 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 1.00, 1, '2021-12-29 21:25:45', '2021-12-29 21:51:51', '2021-12-29 21:51:51'),
(129, 164, 33.60, NULL, 'Payment approved', 'Ariz', 'Alıyev', 'ariznd-info@yandex.ru', 'Şəhriyar ev 8 m17', '+994202744196', '+994503952986', 'Göyçay', 'Azərbaycan', 'AZ2300', 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 1.00, 1, '2021-12-29 23:52:56', '2021-12-30 13:18:11', '2021-12-30 13:18:11'),
(130, 165, 9.30, NULL, 'Cargoed', 'Famil', 'Qasimov', 'familqasimov@gmail.com', 'Vaqif 17', '+994557318342', '+994557318342', 'Göyçay', 'Азербайджан', '2300', 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 1.00, 0, '2021-12-29 23:59:56', '2021-12-30 13:18:09', '2021-12-30 13:18:09'),
(131, 166, 111.65, NULL, 'Cargoed', 'Ariz', 'Alıyev', 'ariznd-info@yandex.ru', 'Şəhriyar ev 8 m17', '+994202744196', '+994503952986', 'Göyçay', 'Azərbaycan', 'AZ2300', 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 1.00, 1, '2021-12-30 14:06:29', '2021-12-31 14:45:38', '2021-12-31 14:45:38'),
(132, 154, 49.80, NULL, 'Payment approved', 'Ariz', 'Alıyev', 'ariznd-info@yandex.ru', 'Şəhriyar ev 8 m17', '+994202744196', '+994503952986', 'Göyçay', 'Azərbaycan', 'AZ2300', 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 1.00, 1, '2021-12-31 14:52:07', '2022-01-04 14:48:13', '2022-01-04 14:48:13'),
(133, 168, 12.50, NULL, 'Payment approved', 'Ariz', 'Alıyev', 'ariznd-info@yandex.ru', 'Şəhriyar ev 8 m17', '+994202744196', '+994503952986', 'Göyçay', 'Azərbaycan', 'AZ2300', 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 1.00, 1, '2021-12-31 15:03:32', '2022-01-04 14:48:11', '2022-01-04 14:48:11'),
(134, 150, 13.45, NULL, 'Payment approved', 'Ariz', 'Alıyev', 'ariznd-info@yandex.ru', 'Şəhriyar ev 8 m17', '+994202744196', '+994503952986', 'Göyçay', 'Azərbaycan', 'AZ2300', 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 1.00, 1, '2022-01-04 15:00:19', '2022-01-04 15:12:47', '2022-01-04 15:12:47'),
(137, 171, 13.65, NULL, 'Payment approved', 'Ariz', 'Alıyev', 'ariznd-info@yandex.ru', 'Şəhriyar ev 8 m17', '+994202744196', '+994503952986', 'Göyçay', 'Azərbaycan', 'AZ2300', 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 1.00, 1, '2022-01-04 15:14:10', '2022-01-04 15:19:31', '2022-01-04 15:19:31'),
(145, 178, 40.55, NULL, 'Your order has been received', 'Ariz', 'Alıyev', 'ariznd-info@yandex.ru', 'Şəhriyar ev 8 m17', '+994202744196', '+994503952986', 'Göyçay', '', NULL, 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 1.00, 1, '2022-01-05 22:26:02', '2022-01-05 22:46:12', NULL),
(147, 180, 86.85, NULL, 'Your order has been received', 'Ariz', 'Alıyev', 'ariznd-info@yandex.ru', 'Şəhriyar ev 8 m17', '+994202744196', '+994503952986', 'Göyçay', '', NULL, 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 1.00, 1, '2022-01-06 06:28:37', '2022-01-06 17:17:57', NULL),
(148, 177, 10.25, NULL, 'Your order has been received', 'Ariz', 'Alıyev', 'ariznd-info@yandex.ru', 'Şəhriyar ev 8 m17', '+994202744196', '+994503952986', 'Göyçay', '', NULL, 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 1.00, 1, '2022-01-06 13:43:07', '2022-01-06 17:17:57', NULL),
(149, 173, 44.65, 4.50, 'Your order has been received', 'Mehemmed', 'Qalayciyev', 'qalayciyev@gmail.com', 'Baku Umid Ekberov 86', '+994707250903', '+994514598208', 'Baku', '', NULL, 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 1.00, 1, '2022-01-06 15:45:54', '2022-01-06 17:17:57', NULL),
(150, 181, 30.70, 5.00, 'Your order has been received', 'Mehemmed', 'Qalayciyev', 'qalayciyev@gmail.com', 'Baku Umid Ekberov 86', '+994707250903', '+994514598208', 'Baku', '', NULL, 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 1.00, 1, '2022-01-06 15:53:18', '2022-01-06 17:17:57', NULL),
(151, 182, 13.85, 0.00, 'Your order has been received', 'Mehemmed', 'Qalayciyev', 'qalayciyev@gmail.com', 'Baku Umid Ekberov 86', '+994707250903', '+994514598208', 'Baku', '', NULL, 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 1.00, 1, '2022-01-06 15:57:13', '2022-01-06 17:17:57', NULL),
(152, 183, 12.00, 0.50, 'Your order has been received', 'Mehemmed', 'Qalayciyev', 'qalayciyev@gmail.com', 'Baku Umid Ekberov 86', '+994707250903', '+994514598208', 'Baku', '', NULL, 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 0.00, 1, '2022-01-06 15:58:17', '2022-01-06 17:17:57', NULL),
(153, 176, 23.70, 12.00, 'Your order has been received', 'Ariz', 'Alıyev', 'ariznd-info@yandex.ru', 'Şəhriyar ev 8 m17', '+994202744196', '+994503952986', 'Göyçay', '', NULL, 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 0.00, 1, '2022-01-06 16:46:00', '2022-01-06 20:41:10', NULL),
(156, 175, 20.00, 0.00, 'Payment approved', 'Ariz', 'Alıyev', 'ariznd-info@yandex.ru', 'Şəhriyar ev 8 m17', '+994202744196', '+994503952986', 'Göyçay', '', NULL, 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 1.00, 1, '2022-01-06 17:16:27', '2022-01-06 17:44:14', NULL),
(157, 186, 20.00, 0.00, 'Your order has been received', 'Famil', 'Qasimov', 'familqasimov@gmail.com', 'Goychay, Vaqif 1727', '+994552150159', '+994557318342', 'Göyçay', '', NULL, 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 1.00, 1, '2022-01-06 17:19:37', '2022-01-06 18:36:25', NULL),
(158, 187, 250.20, 0.00, 'Order completed', 'Famil', 'Qasimov', 'familqasimov@gmail.com', 'Goychay, Vaqif 1727', '+994552150159', '+994557318342', 'Göyçay', '', NULL, 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 1.00, 1, '2022-01-06 17:32:48', '2022-01-06 20:33:35', NULL),
(159, 188, 7.90, 0.00, 'Your order has been received', 'Mehemmed', 'Qalayciyev', 'qalayciyev@gmail.com', 'Baku Umid Ekberov 86', '+994707250903', '+994514598208', 'Baku', '', NULL, 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 5.00, 0, '2022-01-06 22:44:46', '2022-01-07 15:43:46', NULL),
(160, 185, 6.10, 0.00, 'Your order has been received', 'Ariz', 'Alıyev', 'ariznd-info@yandex.ru', 'Şəhriyar ev 8 m17', '+994202744196', '+994503952986', 'Göyçay', '', NULL, 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 1.00, 0, '2022-01-07 00:42:24', '2022-01-07 00:42:24', NULL),
(161, 190, 2.40, 0.50, 'Payment approved', 'Famil', 'Qasimov', 'familqasimov@gmail.com', 'Goychay, Vaqif 1727', '+994552150159', '+994557318342', 'Göyçay', '', NULL, 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 1.00, 0, '2022-01-07 02:48:00', '2022-01-07 15:34:45', NULL),
(162, 170, 2.80, 3.00, 'Your order has been received', 'Mehemmed', 'Qalayciyev', 'qalayciyev@gmail.com', 'Baku Umid Ekberov 86', '+994707250903', '+994514598208', 'Baku', '', NULL, 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 2.00, 0, '2022-01-07 16:40:19', '2022-01-07 16:40:19', NULL),
(163, 191, 16.50, 3.00, 'Your order has been received', 'Mehemmed', 'Qalayciyev', 'qalayciyev@gmail.com', 'Baku Umid Ekberov 86', '+994707250903', '+994514598208', 'Baku', '', NULL, 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 2.00, 0, '2022-01-07 16:57:39', '2022-01-07 16:57:39', NULL),
(164, 192, 16.50, 3.00, 'Your order has been received', 'Mehemmed', 'Qalayciyev', 'qalayciyev@gmail.com', 'Baku Umid Ekberov 86', '+994707250903', '+994514598208', 'Baku', '', NULL, 'Qapıda Ödəmə', NULL, NULL, 'PAYMENT_DOOR', NULL, 0, 2.00, 0, '2022-01-07 17:00:30', '2022-01-07 17:02:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(24, 'familqasimov@gmail.com', '$2y$10$EmYMiSuu753umkb1a6ZiwuzIIN1BLsjGzh36/rvY3CAI4CeEUNapO', '2021-12-16 16:36:22', NULL, NULL),
(30, 'familqasimov@gmail.com', 'Y3tMRoqx5hM2xo3w7AGBc8aoYvMUKRhiOi2hkOUOmAoQkDwXQ4xxRjTEDyG3', '2022-01-01 16:29:49', '2022-01-01 16:31:15', '2022-01-01 16:31:15'),
(29, 'familqasimov@gmail.com', 'V6Mq5yo1jqwogsLlrSRBp679YCOC6w8RUnSBuvvvNncXicxZdxpmd9itRIb6', '2021-12-25 00:03:31', '2021-12-25 00:04:19', '2021-12-25 00:04:19'),
(28, 'qalayciyev@gmail.com', 'zgcCzqZhZNBpMIAcgXgDaxHPLyBRT2SPPOsZGqxK1S1WPItvjnTcEnyI0efe', '2021-12-17 16:35:31', '2021-12-17 16:35:57', '2021-12-17 16:35:57');

-- --------------------------------------------------------

--
-- Table structure for table `price_list`
--

CREATE TABLE `price_list` (
  `id` bigint(20) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `sale_price` decimal(6,2) NOT NULL,
  `wholesale_count` int(11) DEFAULT NULL,
  `wholesale_price` decimal(6,2) DEFAULT NULL,
  `default_price` tinyint(4) NOT NULL DEFAULT 0,
  `color_id` int(10) UNSIGNED DEFAULT NULL,
  `size_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `price_list`
--

INSERT INTO `price_list` (`id`, `product_id`, `sale_price`, `wholesale_count`, `wholesale_price`, `default_price`, `color_id`, `size_id`) VALUES
(24555, 24488, 4.15, 5, 4.00, 1, 1, NULL),
(24556, 24489, 1.35, 6, 1.25, 1, 1, NULL),
(24557, 24490, 11.90, 0, 10.50, 1, 1, NULL),
(24558, 24491, 5.34, 10, 5.20, 1, 1, NULL),
(24559, 24492, 6.20, 3, 6.00, 1, 1, NULL),
(24561, 24493, 1.15, 2, 1.00, 1, 1, NULL),
(24566, 24495, 12.50, 0, 0.00, 1, 1, NULL),
(24576, 24499, 14.20, 0, 12.00, 1, 1, NULL),
(24578, 24500, 0.20, 0, 0.19, 1, 1, NULL),
(24580, 24501, 0.35, 0, 0.32, 1, 1, NULL),
(24585, 24503, 3.80, 8, 3.60, 1, 1, NULL),
(24588, 24506, 5.50, 4, 5.20, 1, 1, NULL),
(24589, 24507, 3.80, 0, 3.00, 1, 1, NULL),
(24593, 24508, 68.00, 0, 0.00, 0, 152, 113),
(24594, 24508, 85.00, 0, 0.00, 0, 154, 114),
(24595, 24508, 95.00, 0, 0.00, 0, 153, 115),
(24596, 24508, 95.00, 0, 0.00, 1, 1, NULL),
(24597, 24509, 2.75, 7, 2.10, 0, 146, NULL),
(24598, 24509, 2.65, 3, 2.35, 0, 147, NULL),
(24599, 24509, 2.85, 4, 2.35, 0, 148, NULL),
(24600, 24509, 2.65, 0, 2.35, 1, 1, NULL),
(24601, 24510, 2.90, NULL, NULL, 1, 1, NULL),
(24602, 24511, 3.50, NULL, NULL, 1, 1, NULL),
(24603, 24512, 3.80, 0, 0.00, 1, 1, NULL),
(24604, 24513, 3.20, 0, 0.00, 1, 1, NULL),
(24605, 24514, 2.20, 6, 2.00, 0, 149, NULL),
(24606, 24514, 2.40, 3, 2.10, 0, 145, NULL),
(24607, 24514, 2.40, NULL, NULL, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_code` int(11) NOT NULL,
  `slug` varchar(160) NOT NULL,
  `product_name` varchar(191) NOT NULL,
  `product_description` text DEFAULT NULL,
  `meta_title` varchar(150) DEFAULT NULL,
  `meta_discription` varchar(200) DEFAULT NULL,
  `stok_piece` int(11) NOT NULL,
  `supply_price` decimal(6,2) DEFAULT NULL,
  `markup` decimal(6,2) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `discount_date` timestamp NULL DEFAULT NULL,
  `one_or_more` int(11) DEFAULT NULL,
  `other_count` int(11) DEFAULT NULL,
  `other_bonus` int(11) DEFAULT NULL,
  `bonus_comment` int(11) DEFAULT NULL,
  `wish_list` tinyint(1) DEFAULT 0,
  `best_selling` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_code`, `slug`, `product_name`, `product_description`, `meta_title`, `meta_discription`, `stok_piece`, `supply_price`, `markup`, `discount`, `discount_date`, `one_or_more`, `other_count`, `other_bonus`, `bonus_comment`, `wish_list`, `best_selling`, `created_at`, `updated_at`, `deleted_at`) VALUES
(24488, 25, 'biber-rengli-bolqar-kq', 'BIBER RENGLI BOLQAR KQ', 'ghdlghldsjghdsljghdskljghkdsjghkdsjhgkdjgdskjghdkgjdhgkjd<br />\r\nghdlghldsjghdsljghdskljghkdsjghkdsjhgkdjgdskjghdkgjdhgkjd<br />\r\nghdlghldsjghdsljghdskljghkdsjghkdsjhgkdjgdskjghdkgjdhgkjd<br />\r\nghdlghldsjghdsljghdskljghkdsjghkdsjhgkdjgdskjghdkgjdhgkjd<br />\r\nghdlghldsjghdsljghdskljghkdsjghkdsjhgkdjgdskjghdkgjdhgkjd<br />\r\nghdlghldsjghdsljghdskljghkdsjghkdsjhgkdjgdskjghdkgjdhgkjd<br />\r\nghdlghldsjghdsljghdskljghkdsjghkdsjhgkdjgdskjghdkgjdhgkjd', NULL, NULL, 0, NULL, NULL, NULL, NULL, 3, NULL, NULL, 1, 0, 9, '2022-01-03 22:03:17', '2022-01-06 17:16:10', NULL),
(24489, 42, 'bismak-1kg-un', 'BISMAK 1KG UN', 'BISMAK 1KG UN', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 8, '2022-01-03 22:03:17', '2022-01-06 15:57:13', NULL),
(24490, 40, 'et-dana-antrikot', 'ƏT DANA ANTRIKOT', 'ƏT DANA ANTRIKOT', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3, '2022-01-03 22:03:17', '2022-01-06 16:46:00', NULL),
(24491, 38, 'seba-toyuq-tabaka', 'SEBA TOYUQ TABAKA', 'dldjlkdjdkjgldkgvvvdvkvmldkmvldkvldkvdlk', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 2, '2022-01-03 22:03:17', '2022-01-05 21:38:39', NULL),
(24492, 5, 'toyuq-butun-teze-kg', 'TOYUQ BUTUN TEZE KG', 'dldjlkdjdkjgldkgvvvdvkvmldkmvldkvldkvdlk', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 2, '2022-01-03 22:03:17', '2022-01-05 21:38:39', NULL),
(24493, 26, 'cugundur-kg', 'ÇUĞUNDUR KG', '&Ccedil;UĞUNDUR KG<br />\r\nghdlghldsjghdsljghdskljghkdsjghkdsjhgkdjgdskjghdkgjdhgkjd<br />\r\nghdlghldsjghdsljghdskljghkdsjghkdsjhgkdjgdskjghdkgjdhgkjd<br />\r\nghdlghldsjghdsljghdskljghkdsjghkdsjhgkdjgdskjghdkgjdhgkjd<br />\r\nghdlghldsjghdsljghdskljghkdsjghkdsjhgkdjgdskjghdkgjdhgkjd<br />\r\nghdlghldsjghdsljghdskljghkdsjghkdsjhgkdjgdskjghdkgjdhgkjd<br />\r\nghdlghldsjghdsljghdskljghkdsjghkdsjhgkdjgdskjghdkgjdhgkjd', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2022-01-03 22:03:17', '2022-01-06 00:51:24', NULL),
(24495, 37, 'baliq-forel-sari-kg', 'BALIQ FOREL SARI KG', 'FOREL SARI BALIQ KG', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 9, '2022-01-03 22:03:17', '2022-01-06 16:53:55', NULL),
(24499, 36, 'baliq-skumbriya-dalga-kg', 'BALIQ SKUMBRIYA DALGA KG', 'Atlantyik okeanın sularından tutulmuş,möhtəşəm dada məxsus Skumbriya balığı', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2022-01-03 22:03:17', '2022-01-06 06:28:37', NULL),
(24500, 33, 'yumurta', 'YUMURTA', 'YUMURTA BROYLER', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2022-01-03 22:03:17', '2022-01-06 06:28:37', NULL),
(24501, 32, 'yumurta-kend', 'YUMURTA KƏND', 'YUMURTA KEND', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2022-01-03 22:03:17', '2022-01-06 06:28:37', NULL),
(24503, 29, 'alma-palmet-kg', 'ALMA PALMET KG', 'idsaifcdfjhdkjfdkjvbdkvjdsbvk\nQuba almasio', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 7, '2022-01-04 14:52:30', '2022-01-06 15:53:18', NULL),
(24506, 27, 'kereviz-selderey', 'KEREVIZ-SELDEREY', 'Elmə məlum olmayan göyərti', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 2, '2022-01-05 16:38:43', '2022-01-06 15:45:54', NULL),
(24507, 21, 'alma-simirinka-kg', 'ALMA SIMIRINKA KG', 'MVT.ALMA SEMERINKA XARICI', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2022-01-05 16:38:43', '2022-01-05 22:14:56', NULL),
(24508, 4, 'pantalon-defacto-regulyar-fit-basic-chino', 'PANTALON DEFACTO REGULYAR FİT BASİC CHİNO', 'Defacto Regular Fit Basic Chino Pantolon M1968AZ.19WN.BN285', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3, '2022-01-05 22:16:57', '2022-01-06 17:32:48', NULL),
(24509, 1, 'alma-fudji-kg', 'ALMA FUDJI KG', 'MVT.ALMA FUDJI sarı', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 5, '2022-01-05 22:22:19', '2022-01-06 15:53:18', NULL),
(24510, 46, 'doner-klassik-toyuq-eticorek', 'Dönər Klassik (Toyuq əti,Çörək)', 'İnqrediyentlər Toyuq əti,xiyar,pomidor,keşniş,ş&uuml;y&uuml;d,tomat sousu', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3, '2022-01-05 23:52:54', '2022-01-07 16:18:51', NULL),
(24511, 50, 'doner-klassik-mal-eticorek', 'Dönər Klassik (Mal əti,çörək)', 'İnqrediyentlər Mal əti,xiyar,pomidor,keşniş,ş&uuml;y&uuml;d,tomat sousu', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 16, '2022-01-06 00:03:35', '2022-01-07 17:00:30', NULL),
(24512, 51, 'doner-klassik-mal-etilavas', 'Dönər Klassik (Mal əti,Lavaş)', 'İnqrediyentlər\nMal əti,xiyar,pomidor,keşniş,şüyüd,tomat sousu', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2022-01-06 00:03:35', '2022-01-07 16:40:19', NULL),
(24513, 49, 'doner-klassik-toyuq-etilavas', 'Dönər Klassik (Toyuq əti,Lavaş)', 'İnqrediyentlər\nToyuq əti,xiyar,pomidor,keşniş,şüyüd,tomat sousu', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2022-01-06 00:03:35', '2022-01-07 00:42:24', NULL),
(24514, 24, 'badimcan-kg', 'BADIMCAN KG', 'BADIMCAN KG QARA', '#goychay #badimcan #bazar #internet #online #almaq', 'goychayda teze terevezler,badimcan', 0, NULL, NULL, NULL, NULL, 1, 5, 3, NULL, 0, 5, '2022-01-06 00:49:03', '2022-01-07 15:22:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `measurement` varchar(50) NOT NULL,
  `show_new_collection` tinyint(1) NOT NULL DEFAULT 0,
  `show_hot_deal` tinyint(1) NOT NULL DEFAULT 0,
  `show_best_seller` tinyint(1) NOT NULL DEFAULT 0,
  `show_latest_products` tinyint(1) NOT NULL DEFAULT 0,
  `show_deals_of_the_day` tinyint(1) NOT NULL DEFAULT 0,
  `show_picked_for_you` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`id`, `product_id`, `measurement`, `show_new_collection`, `show_hot_deal`, `show_best_seller`, `show_latest_products`, `show_deals_of_the_day`, `show_picked_for_you`) VALUES
(24479, 24488, 'kq', 0, 0, 0, 0, 0, 0),
(24480, 24489, 'ədəd', 0, 0, 0, 0, 0, 0),
(24481, 24490, 'kq', 0, 0, 0, 0, 0, 0),
(24482, 24491, 'kq', 0, 0, 0, 0, 0, 0),
(24483, 24492, 'kq', 0, 0, 0, 0, 0, 0),
(24484, 24493, 'kq', 0, 0, 0, 0, 0, 0),
(24486, 24495, 'kq', 0, 0, 0, 0, 0, 0),
(24490, 24499, 'kq', 0, 0, 0, 0, 0, 0),
(24491, 24500, 'ədəd', 0, 0, 0, 0, 0, 0),
(24492, 24501, 'ədəd', 0, 0, 0, 0, 0, 0),
(24494, 24503, 'kq', 0, 0, 0, 0, 0, 0),
(24497, 24506, 'ədəd', 0, 0, 0, 0, 0, 0),
(24498, 24507, 'kq', 0, 0, 0, 0, 0, 0),
(24499, 24508, 'ədəd', 0, 0, 0, 0, 0, 0),
(24500, 24509, 'kq', 0, 0, 0, 0, 0, 0),
(24501, 24510, 'ədəd', 0, 0, 0, 0, 0, 0),
(24502, 24511, 'ədəd', 0, 0, 0, 0, 0, 0),
(24503, 24512, 'ədəd', 0, 0, 0, 0, 0, 0),
(24504, 24513, 'ədəd', 0, 0, 0, 0, 0, 0),
(24505, 24514, 'kq', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `image_name` varchar(50) NOT NULL,
  `thumb_name` varchar(50) NOT NULL,
  `main_name` varchar(50) NOT NULL,
  `cover` int(11) DEFAULT NULL,
  `color_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image_name`, `thumb_name`, `main_name`, `cover`, `color_id`, `created_at`, `updated_at`) VALUES
(458, 24488, 'product-0_24488_1641230643.webp', 'thumb_product-0_24488_1641230643.webp', 'main_product-0_24488_1641230643.webp', NULL, 1, '2022-01-03 22:24:03', '2022-01-03 22:24:03'),
(459, 24489, 'product-0_24489_1641230660.webp', 'thumb_product-0_24489_1641230660.webp', 'main_product-0_24489_1641230660.webp', NULL, 1, '2022-01-03 22:24:21', '2022-01-03 22:24:21'),
(460, 24490, 'product-0_24490_1641230935.webp', 'thumb_product-0_24490_1641230935.webp', 'main_product-0_24490_1641230935.webp', NULL, 1, '2022-01-03 22:28:56', '2022-01-03 22:28:56'),
(461, 24491, 'product-0_24491_1641231012.webp', 'thumb_product-0_24491_1641231012.webp', 'main_product-0_24491_1641231012.webp', NULL, 1, '2022-01-03 22:30:12', '2022-01-03 22:30:12'),
(462, 24492, 'product-0_24492_1641284951.webp', 'thumb_product-0_24492_1641284951.webp', 'main_product-0_24492_1641284951.webp', NULL, 1, '2022-01-04 13:29:11', '2022-01-04 13:29:11'),
(463, 24493, 'product-0_24493_1641284969.webp', 'thumb_product-0_24493_1641284969.webp', 'main_product-0_24493_1641284969.webp', NULL, 1, '2022-01-04 13:29:29', '2022-01-04 13:29:29'),
(464, 24495, 'product-0_24495_1641284985.webp', 'thumb_product-0_24495_1641284985.webp', 'main_product-0_24495_1641284985.webp', NULL, 1, '2022-01-04 13:29:45', '2022-01-04 13:29:45'),
(466, 24499, 'product-0_24499_1641285054.webp', 'thumb_product-0_24499_1641285054.webp', 'main_product-0_24499_1641285054.webp', NULL, 1, '2022-01-04 13:30:55', '2022-01-04 13:30:55'),
(467, 24500, 'product-0_24500_1641285085.webp', 'thumb_product-0_24500_1641285085.webp', 'main_product-0_24500_1641285085.webp', NULL, 1, '2022-01-04 13:31:25', '2022-01-04 13:31:25'),
(468, 24501, 'product-0_24501_1641285106.webp', 'thumb_product-0_24501_1641285106.webp', 'main_product-0_24501_1641285106.webp', NULL, 1, '2022-01-04 13:31:46', '2022-01-04 13:31:46'),
(476, 24503, 'product-0_24503_1641290383.webp', 'thumb_product-0_24503_1641290383.webp', 'main_product-0_24503_1641290383.webp', NULL, 1, '2022-01-04 14:59:43', '2022-01-04 14:59:43'),
(479, 24506, 'product-0_24506_1641368382.webp', 'thumb_product-0_24506_1641368382.webp', 'main_product-0_24506_1641368382.webp', NULL, 1, '2022-01-05 16:39:42', '2022-01-05 16:39:42'),
(480, 24507, 'product-0_24507_1641368403.webp', 'thumb_product-0_24507_1641368403.webp', 'main_product-0_24507_1641368403.webp', NULL, 1, '2022-01-05 16:40:04', '2022-01-05 16:40:04'),
(481, 24508, 'product-0_24508_1641388657.webp', 'thumb_product-0_24508_1641388657.webp', 'main_product-0_24508_1641388657.webp', NULL, 152, '2022-01-05 22:17:37', '2022-01-05 22:17:37'),
(482, 24508, 'product-0_24508_1641388681.webp', 'thumb_product-0_24508_1641388681.webp', 'main_product-0_24508_1641388681.webp', NULL, 154, '2022-01-05 22:18:01', '2022-01-05 22:18:01'),
(483, 24508, 'product-0_24508_1641388702.webp', 'thumb_product-0_24508_1641388702.webp', 'main_product-0_24508_1641388702.webp', NULL, 153, '2022-01-05 22:18:22', '2022-01-05 22:18:22'),
(484, 24509, 'product-0_24509_1641388969.webp', 'thumb_product-0_24509_1641388969.webp', 'main_product-0_24509_1641388969.webp', NULL, 146, '2022-01-05 22:22:49', '2022-01-05 22:22:49'),
(485, 24509, 'product-0_24509_1641388987.webp', 'thumb_product-0_24509_1641388987.webp', 'main_product-0_24509_1641388987.webp', NULL, 147, '2022-01-05 22:23:07', '2022-01-05 22:23:07'),
(486, 24509, 'product-0_24509_1641389008.webp', 'thumb_product-0_24509_1641389008.webp', 'main_product-0_24509_1641389008.webp', NULL, 148, '2022-01-05 22:23:28', '2022-01-05 22:23:28'),
(487, 24510, 'product-0_24510_1641394440.webp', 'thumb_product-0_24510_1641394440.webp', 'main_product-0_24510_1641394440.webp', NULL, 1, '2022-01-05 23:54:00', '2022-01-05 23:54:00'),
(488, 24511, 'product-0_24511_1641395088.webp', 'thumb_product-0_24511_1641395088.webp', 'main_product-0_24511_1641395088.webp', NULL, 1, '2022-01-06 00:04:48', '2022-01-06 00:04:48'),
(489, 24512, 'product-0_24512_1641395114.webp', 'thumb_product-0_24512_1641395114.webp', 'main_product-0_24512_1641395114.webp', NULL, 1, '2022-01-06 00:05:15', '2022-01-06 00:05:15'),
(490, 24513, 'product-0_24513_1641395143.webp', 'thumb_product-0_24513_1641395143.webp', 'main_product-0_24513_1641395143.webp', NULL, 1, '2022-01-06 00:05:44', '2022-01-06 00:05:44'),
(491, 24514, 'product-0_24514_1641397798.webp', 'thumb_product-0_24514_1641397798.webp', 'main_product-0_24514_1641397798.webp', NULL, 149, '2022-01-06 00:49:58', '2022-01-06 00:49:58'),
(492, 24514, 'product-0_24514_1641397811.webp', 'thumb_product-0_24514_1641397811.webp', 'main_product-0_24514_1641397811.webp', NULL, 145, '2022-01-06 00:50:11', '2022-01-06 00:50:11');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `product_id`, `rating`) VALUES
(118, 237, 5),
(119, 237, 5),
(120, 270, 5),
(121, 24378, 5),
(122, 24378, 1),
(123, 24488, 5),
(124, 24510, 5),
(125, 24511, 2),
(126, 24511, 4),
(127, 24511, 4),
(128, 24513, 3),
(129, 24513, 5);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `review` text NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `email`, `review`, `product_id`, `rating`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 'Ariz Alıyev', 'ariznd-info@yandex.ru', 'Çox gözəl məhsuldur', 24488, 5, '2022-01-05 21:36:50', '2022-01-05 21:36:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `services_name` varchar(191) NOT NULL,
  `services_price` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_returns`
--

CREATE TABLE `shipping_returns` (
  `id` int(10) UNSIGNED NOT NULL,
  `shipping_return` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping_returns`
--

INSERT INTO `shipping_returns` (`id`, `shipping_return`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sifarişin izlənilməsi\r\n<p>Kuryer ilə planlı və ya ekspress &ccedil;atdırılmanı se&ccedil;dikdə sizin sifariş &ccedil;atdırılmaya veriləndə və kuryer sizə y&ouml;nlənəndə SMS bildirişlərini alacaqsınız.</p>', '2021-03-11 18:33:23', '2021-08-24 00:21:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(111, '42', '2022-01-03 19:09:54', '2022-01-03 19:09:54', NULL),
(112, '41', '2022-01-03 19:09:54', '2022-01-03 19:09:54', NULL),
(113, 'L', '2022-01-05 22:14:56', '2022-01-05 22:14:56', NULL),
(114, 'X', '2022-01-05 22:14:56', '2022-01-05 22:14:56', NULL),
(115, 'M', '2022-01-05 22:14:56', '2022-01-05 22:14:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `size_product`
--

CREATE TABLE `size_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `size_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `size_product`
--

INSERT INTO `size_product` (`id`, `size_id`, `product_id`) VALUES
(24518, 113, 24508),
(24519, 114, 24508),
(24520, 115, 24508);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `slider_name` varchar(191) NOT NULL,
  `slider_image` varchar(191) NOT NULL,
  `slider_slug` varchar(191) NOT NULL,
  `slider_order` int(11) NOT NULL,
  `slider_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_name`, `slider_image`, `slider_slug`, `slider_order`, `slider_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(40, 'undefined', 'slider_1640508765.webp', 'https://goycay-avm.az/', 1, 1, '2021-07-27 06:49:28', '2022-01-06 17:56:01', NULL),
(48, '', 'slider_1640518482.webp', 'https://goycay-avm.az/', 3, 1, '2021-08-14 13:13:37', '2022-01-06 17:55:43', NULL),
(54, '', 'slider_1640513673.webp', 'https://goycay-avm.az/category/meyveterevezquru-meyve', 2, 1, '2021-12-24 20:16:54', '2022-01-04 23:20:02', NULL),
(55, '', 'slider_1640508576.webp', 'Slide 2', 4, 1, '2021-12-24 22:02:17', '2021-12-26 13:54:27', '2021-12-26 13:54:27'),
(56, '', 'slider_1640518218.webp', '1132156565', 4, 1, '2021-12-26 16:30:18', '2022-01-04 14:44:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stock_list`
--

CREATE TABLE `stock_list` (
  `id` int(11) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `color_id` int(10) UNSIGNED DEFAULT NULL,
  `size_id` int(10) UNSIGNED DEFAULT NULL,
  `stock_piece` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_list`
--

INSERT INTO `stock_list` (`id`, `product_id`, `color_id`, `size_id`, `stock_piece`) VALUES
(5893, 24501, 1, NULL, 360),
(5894, 24488, 1, NULL, 30),
(5895, 24489, 1, NULL, 120),
(5896, 24490, 1, NULL, 120),
(5897, 24491, 1, NULL, 65),
(5898, 24492, 1, NULL, 100),
(5899, 24493, 1, NULL, 100),
(5900, 24495, 1, NULL, 120),
(5906, 24499, 1, NULL, 100),
(5907, 24500, 1, NULL, 360),
(5908, 24501, 1, NULL, 220),
(5912, 24503, 1, NULL, 150),
(5915, 24506, 1, NULL, 200),
(5916, 24507, 1, NULL, 150),
(5920, 24508, 152, 113, 100),
(5921, 24508, 154, 114, 65),
(5922, 24508, 153, 115, 100),
(5923, 24509, 146, NULL, 55),
(5924, 24509, 147, NULL, 65),
(5925, 24509, 148, NULL, 75),
(5926, 24510, 1, NULL, 97),
(5927, 24511, 1, NULL, 90),
(5928, 24512, 1, NULL, 99),
(5929, 24513, 1, NULL, 99),
(5930, 24514, 149, NULL, 10),
(5931, 24514, 145, NULL, 50);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `markup` int(11) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_product`
--

CREATE TABLE `supplier_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tag_product`
--

CREATE TABLE `tag_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mobile` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `activation_key` varchar(60) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `bonus` bigint(20) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `mobile`, `password`, `activation_key`, `is_active`, `bonus`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(192, 'Mehemmed', 'Qalayciyev', 'qalayciyev@gmail.com', '+994514598208', '$2y$10$n6tImOsqHsJh7NO62bSwFuEIbiDERqZ3xJjL.2IAVCzL4Ame.e4Mm', NULL, 1, 15, 'GRPMogtQS7ccnW5Rnfss1N2pV59sjOLWDKbCaOspKl4Gba4GnKsnG4UTLYHe', '2021-07-28 07:35:09', '2022-01-06 22:06:19', NULL),
(195, 'Ariz', 'Alıyev', 'ariznd-info@yandex.ru', '+994503952986', '$2y$10$LGkLkVLf/xOh24D2Zu32W.UIU1iC2VhDa5hNrWg5Fdt3vwHdVHcwC', NULL, 1, 0, 'Di3J7v9u2GOuQQgfA6hExpHElrBK5CzI09iKcdBehO5jOy5qCapuGIPJRuL6', '2021-12-01 10:24:45', '2022-01-06 16:53:55', NULL),
(198, 'Famil', 'Qasimov', 'familqasimov@gmail.com', '+994557318342', '$2y$10$DMpxtTb1FRYsgLpnAGxL3eNwTqAipa9LCP1BigFQ.8dUmEc4JSNle', NULL, 1, 1, 'CmG4OgsDAsA8793rG5lBFlk3DUEb9rRHYGCOQ78i4EhzNaCOLsZHUwIlC4Y8', '2021-12-12 17:00:30', '2022-01-06 17:16:10', NULL),
(202, 'Ramal', 'Aliyev', 'ramal2025@gmail.com', '+994556115118', '$2y$10$YbVbSA2U4KQdq5JsXFxmJOe9U3wjqGY9GWNk06hwx6c08UxOeGpzW', NULL, 1, 0, NULL, '2021-12-17 16:51:38', '2021-12-29 01:12:02', NULL),
(203, 'Zöhrab', 'Əmi', 'zohrabemi@gmail.com', '+994506747820', '$2y$10$0XPNw4d3H.FCY7rInCL7Vufm0fK5Rm1tTlFPu1RzKG6szJ/2Js8PW', NULL, 1, 0, 'No2OvWatovmhY8guyh3r7nOeF9iIQD91aF78wqn2aDGYJ8jX6LQzGAGNce31', '2021-12-24 19:35:47', '2021-12-24 19:35:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `zip_code` varchar(15) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `user_id`, `address`, `city`, `state`, `country`, `zip_code`, `phone`) VALUES
(13, 192, 'Baku Umid Ekberov 86', 'Baku', 'Baku', 'Azerbaycan', 'AZ1138', '+994707250903'),
(15, 195, 'Şəhriyar ev 8 m17', 'Göyçay', 'Bakı', 'Azərbaycan', 'AZ2300', '+994202744196'),
(16, 203, 'Mərdıkan , R. Qasımov küç', 'Bakı', 'Bakı', 'Azərbaycan', 'AZ41000AZ', NULL),
(17, 202, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 198, 'Goychay, Vaqif 17\n27', 'Göyçay', 'Bakı', 'Азербайджан', '2300', '+994552150159');

-- --------------------------------------------------------

--
-- Table structure for table `wish_list`
--

CREATE TABLE `wish_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Indexes for table `api_keys`
--
ALTER TABLE `api_keys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `api_keys_api_token_unique` (`api_token`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`type`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_product`
--
ALTER TABLE `brand_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_product_brand_id_foreign` (`brand_id`),
  ADD KEY `brand_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_user_id_foreign` (`user_id`);

--
-- Indexes for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_product_cart_id_foreign` (`cart_id`),
  ADD KEY `cart_product_product_id_foreign` (`product_id`),
  ADD KEY `cart_product_size_id_foreign` (`size_id`) USING BTREE,
  ADD KEY `cart_product_color_id_foreign` (`color_id`) USING BTREE;

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_images`
--
ALTER TABLE `category_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_images_category_id_foreign` (`category_id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_product_category_id_foreign` (`category_id`),
  ADD KEY `category_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color_product`
--
ALTER TABLE `color_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `color_product_color_id_foreign` (`color_id`),
  ADD KEY `color_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `infos`
--
ALTER TABLE `infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `measurement`
--
ALTER TABLE `measurement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_cart_id_unique` (`cart_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price_list`
--
ALTER TABLE `price_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `color` (`color_id`),
  ADD KEY `price_list_product_id` (`product_id`) USING BTREE,
  ADD KEY `price_list_size_id` (`size_id`) USING BTREE;

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code_unique` (`product_code`) USING BTREE;

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_detail_product_id_unique` (`product_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_image_product_id_foreign` (`product_id`),
  ADD KEY `product_image_color_id` (`color_id`) USING BTREE;

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_returns`
--
ALTER TABLE `shipping_returns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size_product`
--
ALTER TABLE `size_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `size_product_size_id_foreign` (`size_id`),
  ADD KEY `size_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_list`
--
ALTER TABLE `stock_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_list_product_id` (`product_id`) USING BTREE,
  ADD KEY `stock_list_color_id` (`color_id`) USING BTREE,
  ADD KEY `stock_list_size_id` (`size_id`) USING BTREE;

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_product`
--
ALTER TABLE `supplier_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_product_supplier_id_foreign` (`supplier_id`),
  ADD KEY `supplier_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_product`
--
ALTER TABLE `tag_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_product_tag_id_foreign` (`tag_id`),
  ADD KEY `tag_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email_uindex` (`email`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_detail_user_id_foreign` (`user_id`);

--
-- Indexes for table `wish_list`
--
ALTER TABLE `wish_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `api_keys`
--
ALTER TABLE `api_keys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51517;

--
-- AUTO_INCREMENT for table `brand_product`
--
ALTER TABLE `brand_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24521;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `cart_product`
--
ALTER TABLE `cart_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=525;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51517;

--
-- AUTO_INCREMENT for table `category_images`
--
ALTER TABLE `category_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24544;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `color_product`
--
ALTER TABLE `color_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30207;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `infos`
--
ALTER TABLE `infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `measurement`
--
ALTER TABLE `measurement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `price_list`
--
ALTER TABLE `price_list`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24608;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24515;

--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24506;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=493;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `shipping_returns`
--
ALTER TABLE `shipping_returns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `size_product`
--
ALTER TABLE `size_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24521;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `stock_list`
--
ALTER TABLE `stock_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5932;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `supplier_product`
--
ALTER TABLE `supplier_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tag_product`
--
ALTER TABLE `tag_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

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
