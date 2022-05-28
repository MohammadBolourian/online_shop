-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2022 at 03:10 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_codes`
--

CREATE TABLE `active_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `code` int(11) NOT NULL,
  `expired_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `active_codes`
--

INSERT INTO `active_codes` (`id`, `user_id`, `code`, `expired_at`) VALUES
(22, 20, 285201, '2022-01-25 04:37:29'),
(23, 34, 393730, '2022-01-27 11:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `state` int(10) NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `city_id`, `state`, `postal_code`, `address`, `created_at`, `updated_at`) VALUES
(4, 1, 73, 4, '121122', 'zqwerty', '2022-01-27 06:34:10', '2022-01-27 07:30:32'),
(7, 33, 1, 1, NULL, NULL, '2022-01-27 09:59:40', '2022-01-27 09:59:40'),
(8, 34, 117, 8, '96199', 'mostaghim', '2022-01-27 10:50:16', '2022-01-27 11:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `amazing_sales`
--

CREATE TABLE `amazing_sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `percentage` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'demo', '2022-01-15 18:17:21', '2022-01-15 18:17:21'),
(2, 'رنگ', '2022-01-16 10:42:27', '2022-01-16 10:42:27'),
(3, 'رم', '2022-01-18 23:38:06', '2022-01-18 23:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_product`
--

CREATE TABLE `attribute_product` (
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `value_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_product`
--

INSERT INTO `attribute_product` (`attribute_id`, `product_id`, `value_id`) VALUES
(1, 9, 1),
(2, 10, 4),
(2, 11, 5),
(3, 11, 6);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_values`
--

INSERT INTO `attribute_values` (`id`, `attribute_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 'demo1', '2022-01-15 18:17:21', '2022-01-15 18:17:21'),
(2, 2, 'قرمز', '2022-01-16 10:42:27', '2022-01-16 10:42:27'),
(3, 2, 'سیز', '2022-01-16 12:24:02', '2022-01-16 12:24:02'),
(4, 2, 'سبز', '2022-01-16 12:24:17', '2022-01-16 12:24:17'),
(5, 2, 'سفید', '2022-01-18 23:38:06', '2022-01-18 23:38:06'),
(6, 3, '4 گیگ', '2022-01-18 23:38:06', '2022-01-18 23:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `persian_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `guarantee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `number` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_item_selected_attributes`
--

CREATE TABLE `cart_item_selected_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `guarantee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `number` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cash_payments`
--

CREATE TABLE `cash_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(20,3) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `cash_receiver` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'الکترونیکی', 0, '2022-01-12 10:51:02', '2022-01-12 10:51:02', NULL),
(2, 'موبایل', 1, '2022-01-12 10:54:55', '2022-01-12 10:54:55', NULL),
(3, 'مانیتور', 1, '2022-01-12 10:55:07', '2022-01-12 10:55:07', NULL),
(4, 'سونی', 2, '2022-01-12 10:55:17', '2022-01-12 10:55:17', NULL),
(5, 'ال جی', 3, '2022-01-12 10:55:43', '2022-01-12 10:55:43', NULL),
(6, 'اسباب بازی', 0, '2022-01-12 10:55:58', '2022-01-12 10:55:58', NULL),
(7, 'اپل', 2, '2022-01-18 18:40:08', '2022-01-18 18:40:08', NULL),
(8, 'فانکو پاپ', 6, '2022-01-18 18:42:20', '2022-01-18 18:42:20', NULL),
(9, 'اکشن فیگور', 6, '2022-01-18 18:42:31', '2022-01-18 18:42:31', NULL),
(10, 'فانکو ایرانی', 8, '2022-01-18 18:42:45', '2022-01-18 18:42:45', NULL),
(11, 'مارول', 8, '2022-01-18 18:42:54', '2022-01-18 18:42:54', NULL),
(12, 'اکادمی', 8, '2022-01-18 18:43:19', '2022-01-18 18:43:19', NULL),
(13, 'اسپایدر من', 9, '2022-01-18 18:43:45', '2022-01-18 18:43:45', NULL),
(14, 'فیگور گران', 9, '2022-01-18 18:43:59', '2022-01-18 18:43:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_attributes`
--

CREATE TABLE `category_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_attribute_default_values`
--

CREATE TABLE `category_attribute_default_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_attribute_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_discount`
--

CREATE TABLE `category_discount` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `discount_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_discount`
--

INSERT INTO `category_discount` (`category_id`, `discount_id`) VALUES
(1, 7),
(14, 8);

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`category_id`, `product_id`) VALUES
(1, 7),
(1, 8),
(1, 11),
(2, 7),
(2, 8),
(2, 10),
(2, 11),
(5, 8),
(6, 7),
(6, 9),
(7, 11);

-- --------------------------------------------------------

--
-- Table structure for table `category_values`
--

CREATE TABLE `category_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_attribute_id` bigint(20) UNSIGNED NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => tak entekhabi , 1 => multi entekhabi va gheymat avaz mishe',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `province_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `province_id`, `name`) VALUES
(1, 1, 'تبريز'),
(2, 1, 'كندوان'),
(3, 1, 'بندر شرفخانه'),
(4, 1, 'مراغه'),
(5, 1, 'ميانه'),
(6, 1, 'شبستر'),
(7, 1, 'مرند'),
(8, 1, 'جلفا'),
(9, 1, 'سراب'),
(10, 1, 'هاديشهر'),
(11, 1, 'بناب'),
(12, 1, 'كليبر'),
(13, 1, 'تسوج'),
(14, 1, 'اهر'),
(15, 1, 'هريس'),
(16, 1, 'عجبشير'),
(17, 1, 'هشترود'),
(18, 1, 'ملكان'),
(19, 1, 'بستان آباد'),
(20, 1, 'ورزقان'),
(21, 1, 'اسكو'),
(22, 1, 'آذر شهر'),
(23, 1, 'قره آغاج'),
(24, 1, 'ممقان'),
(25, 1, 'صوفیان'),
(26, 1, 'ایلخچی'),
(27, 1, 'خسروشهر'),
(28, 1, 'باسمنج'),
(29, 1, 'سهند'),
(30, 2, 'اروميه'),
(31, 2, 'نقده'),
(32, 2, 'ماكو'),
(33, 2, 'تكاب'),
(34, 2, 'خوي'),
(35, 2, 'مهاباد'),
(36, 2, 'سر دشت'),
(37, 2, 'چالدران'),
(38, 2, 'بوكان'),
(39, 2, 'مياندوآب'),
(40, 2, 'سلماس'),
(41, 2, 'شاهين دژ'),
(42, 2, 'پيرانشهر'),
(43, 2, 'سيه چشمه'),
(44, 2, 'اشنويه'),
(45, 2, 'چایپاره'),
(46, 2, 'پلدشت'),
(47, 2, 'شوط'),
(48, 3, 'اردبيل'),
(49, 3, 'سرعين'),
(50, 3, 'بيله سوار'),
(51, 3, 'پارس آباد'),
(52, 3, 'خلخال'),
(53, 3, 'مشگين شهر'),
(54, 3, 'مغان'),
(55, 3, 'نمين'),
(56, 3, 'نير'),
(57, 3, 'كوثر'),
(58, 3, 'كيوي'),
(59, 3, 'گرمي'),
(60, 4, 'اصفهان'),
(61, 4, 'فريدن'),
(62, 4, 'فريدون شهر'),
(63, 4, 'فلاورجان'),
(64, 4, 'گلپايگان'),
(65, 4, 'دهاقان'),
(66, 4, 'نطنز'),
(67, 4, 'نايين'),
(68, 4, 'تيران'),
(69, 4, 'كاشان'),
(70, 4, 'فولاد شهر'),
(71, 4, 'اردستان'),
(72, 4, 'سميرم'),
(73, 4, 'درچه'),
(74, 4, 'کوهپایه'),
(75, 4, 'مباركه'),
(76, 4, 'شهرضا'),
(77, 4, 'خميني شهر'),
(78, 4, 'شاهين شهر'),
(79, 4, 'نجف آباد'),
(80, 4, 'دولت آباد'),
(81, 4, 'زرين شهر'),
(82, 4, 'آران و بيدگل'),
(83, 4, 'باغ بهادران'),
(84, 4, 'خوانسار'),
(85, 4, 'مهردشت'),
(86, 4, 'علويجه'),
(87, 4, 'عسگران'),
(88, 4, 'نهضت آباد'),
(89, 4, 'حاجي آباد'),
(90, 4, 'تودشک'),
(91, 4, 'ورزنه'),
(92, 6, 'ايلام'),
(93, 6, 'مهران'),
(94, 6, 'دهلران'),
(95, 6, 'آبدانان'),
(96, 6, 'شيروان چرداول'),
(97, 6, 'دره شهر'),
(98, 6, 'ايوان'),
(99, 6, 'سرابله'),
(100, 7, 'بوشهر'),
(101, 7, 'تنگستان'),
(102, 7, 'دشتستان'),
(103, 7, 'دير'),
(104, 7, 'ديلم'),
(105, 7, 'كنگان'),
(106, 7, 'گناوه'),
(107, 7, 'ريشهر'),
(108, 7, 'دشتي'),
(109, 7, 'خورموج'),
(110, 7, 'اهرم'),
(111, 7, 'برازجان'),
(112, 7, 'خارك'),
(113, 7, 'جم'),
(114, 7, 'کاکی'),
(115, 7, 'عسلویه'),
(116, 7, 'بردخون'),
(117, 8, 'تهران'),
(118, 8, 'ورامين'),
(119, 8, 'فيروزكوه'),
(120, 8, 'ري'),
(121, 8, 'دماوند'),
(122, 8, 'اسلامشهر'),
(123, 8, 'رودهن'),
(124, 8, 'لواسان'),
(125, 8, 'بومهن'),
(126, 8, 'تجريش'),
(127, 8, 'فشم'),
(128, 8, 'كهريزك'),
(129, 8, 'پاكدشت'),
(130, 8, 'چهاردانگه'),
(131, 8, 'شريف آباد'),
(132, 8, 'قرچك'),
(133, 8, 'باقرشهر'),
(134, 8, 'شهريار'),
(135, 8, 'رباط كريم'),
(136, 8, 'قدس'),
(137, 8, 'ملارد'),
(138, 9, 'شهركرد'),
(139, 9, 'فارسان'),
(140, 9, 'بروجن'),
(141, 9, 'چلگرد'),
(142, 9, 'اردل'),
(143, 9, 'لردگان'),
(144, 9, 'سامان'),
(145, 10, 'قائن'),
(146, 10, 'فردوس'),
(147, 10, 'بيرجند'),
(148, 10, 'نهبندان'),
(149, 10, 'سربيشه'),
(150, 10, 'طبس مسینا'),
(151, 10, 'قهستان'),
(152, 10, 'درمیان'),
(153, 11, 'مشهد'),
(154, 11, 'نيشابور'),
(155, 11, 'سبزوار'),
(156, 11, 'كاشمر'),
(157, 11, 'گناباد'),
(158, 11, 'طبس'),
(159, 11, 'تربت حيدريه'),
(160, 11, 'خواف'),
(161, 11, 'تربت جام'),
(162, 11, 'تايباد'),
(163, 11, 'قوچان'),
(164, 11, 'سرخس'),
(165, 11, 'بردسكن'),
(166, 11, 'فريمان'),
(167, 11, 'چناران'),
(168, 11, 'درگز'),
(169, 11, 'كلات'),
(170, 11, 'طرقبه'),
(171, 11, 'سر ولایت'),
(172, 12, 'بجنورد'),
(173, 12, 'اسفراين'),
(174, 12, 'جاجرم'),
(175, 12, 'شيروان'),
(176, 12, 'آشخانه'),
(177, 12, 'گرمه'),
(178, 12, 'ساروج'),
(179, 13, 'اهواز'),
(180, 13, 'ايرانشهر'),
(181, 13, 'شوش'),
(182, 13, 'آبادان'),
(183, 13, 'خرمشهر'),
(184, 13, 'مسجد سليمان'),
(185, 13, 'ايذه'),
(186, 13, 'شوشتر'),
(187, 13, 'انديمشك'),
(188, 13, 'سوسنگرد'),
(189, 13, 'هويزه'),
(190, 13, 'دزفول'),
(191, 13, 'شادگان'),
(192, 13, 'بندر ماهشهر'),
(193, 13, 'بندر امام خميني'),
(194, 13, 'اميديه'),
(195, 13, 'بهبهان'),
(196, 13, 'رامهرمز'),
(197, 13, 'باغ ملك'),
(198, 13, 'هنديجان'),
(199, 13, 'لالي'),
(200, 13, 'رامشیر'),
(201, 13, 'حمیدیه'),
(202, 13, 'دغاغله'),
(203, 13, 'ملاثانی'),
(204, 13, 'شادگان'),
(205, 13, 'ویسی'),
(206, 14, 'زنجان'),
(207, 14, 'ابهر'),
(208, 14, 'خدابنده'),
(209, 14, 'كارم'),
(210, 14, 'ماهنشان'),
(211, 14, 'خرمدره'),
(212, 14, 'ايجرود'),
(213, 14, 'زرين آباد'),
(214, 14, 'آب بر'),
(215, 14, 'قيدار'),
(216, 15, 'سمنان'),
(217, 15, 'شاهرود'),
(218, 15, 'گرمسار'),
(219, 15, 'ايوانكي'),
(220, 15, 'دامغان'),
(221, 15, 'بسطام'),
(222, 16, 'زاهدان'),
(223, 16, 'چابهار'),
(224, 16, 'خاش'),
(225, 16, 'سراوان'),
(226, 16, 'زابل'),
(227, 16, 'سرباز'),
(228, 16, 'نيكشهر'),
(229, 16, 'ايرانشهر'),
(230, 16, 'راسك'),
(231, 16, 'ميرجاوه'),
(232, 17, 'شيراز'),
(233, 17, 'اقليد'),
(234, 17, 'داراب'),
(235, 17, 'فسا'),
(236, 17, 'مرودشت'),
(237, 17, 'خرم بيد'),
(238, 17, 'آباده'),
(239, 17, 'كازرون'),
(240, 17, 'ممسني'),
(241, 17, 'سپيدان'),
(242, 17, 'لار'),
(243, 17, 'فيروز آباد'),
(244, 17, 'جهرم'),
(245, 17, 'ني ريز'),
(246, 17, 'استهبان'),
(247, 17, 'لامرد'),
(248, 17, 'مهر'),
(249, 17, 'حاجي آباد'),
(250, 17, 'نورآباد'),
(251, 17, 'اردكان'),
(252, 17, 'صفاشهر'),
(253, 17, 'ارسنجان'),
(254, 17, 'قيروكارزين'),
(255, 17, 'سوريان'),
(256, 17, 'فراشبند'),
(257, 17, 'سروستان'),
(258, 17, 'ارژن'),
(259, 17, 'گويم'),
(260, 17, 'داريون'),
(261, 17, 'زرقان'),
(262, 17, 'خان زنیان'),
(263, 17, 'کوار'),
(264, 17, 'ده بید'),
(265, 17, 'باب انار/خفر'),
(266, 17, 'بوانات'),
(267, 17, 'خرامه'),
(268, 17, 'خنج'),
(269, 17, 'سیاخ دارنگون'),
(270, 18, 'قزوين'),
(271, 18, 'تاكستان'),
(272, 18, 'آبيك'),
(273, 18, 'بوئين زهرا'),
(274, 19, 'قم'),
(275, 5, 'طالقان'),
(276, 5, 'نظرآباد'),
(277, 5, 'اشتهارد'),
(278, 5, 'هشتگرد'),
(279, 5, 'كن'),
(280, 5, 'آسارا'),
(281, 5, 'شهرک گلستان'),
(282, 5, 'اندیشه'),
(283, 5, 'كرج'),
(284, 5, 'نظر آباد'),
(285, 5, 'گوهردشت'),
(286, 5, 'ماهدشت'),
(287, 5, 'مشکین دشت'),
(288, 20, 'سنندج'),
(289, 20, 'ديواندره'),
(290, 20, 'بانه'),
(291, 20, 'بيجار'),
(292, 20, 'سقز'),
(293, 20, 'كامياران'),
(294, 20, 'قروه'),
(295, 20, 'مريوان'),
(296, 20, 'صلوات آباد'),
(297, 20, 'حسن آباد'),
(298, 21, 'كرمان'),
(299, 21, 'راور'),
(300, 21, 'بابك'),
(301, 21, 'انار'),
(302, 21, 'کوهبنان'),
(303, 21, 'رفسنجان'),
(304, 21, 'بافت'),
(305, 21, 'سيرجان'),
(306, 21, 'كهنوج'),
(307, 21, 'زرند'),
(308, 21, 'بم'),
(309, 21, 'جيرفت'),
(310, 21, 'بردسير'),
(311, 22, 'كرمانشاه'),
(312, 22, 'اسلام آباد غرب'),
(313, 22, 'سر پل ذهاب'),
(314, 22, 'كنگاور'),
(315, 22, 'سنقر'),
(316, 22, 'قصر شيرين'),
(317, 22, 'گيلان غرب'),
(318, 22, 'هرسين'),
(319, 22, 'صحنه'),
(320, 22, 'پاوه'),
(321, 22, 'جوانرود'),
(322, 22, 'شاهو'),
(323, 23, 'ياسوج'),
(324, 23, 'گچساران'),
(325, 23, 'دنا'),
(326, 23, 'دوگنبدان'),
(327, 23, 'سي سخت'),
(328, 23, 'دهدشت'),
(329, 23, 'ليكك'),
(330, 24, 'گرگان'),
(331, 24, 'آق قلا'),
(332, 24, 'گنبد كاووس'),
(333, 24, 'علي آباد كتول'),
(334, 24, 'مينو دشت'),
(335, 24, 'تركمن'),
(336, 24, 'كردكوي'),
(337, 24, 'بندر گز'),
(338, 24, 'كلاله'),
(339, 24, 'آزاد شهر'),
(340, 24, 'راميان'),
(341, 25, 'رشت'),
(342, 25, 'منجيل'),
(343, 25, 'لنگرود'),
(344, 25, 'رود سر'),
(345, 25, 'تالش'),
(346, 25, 'آستارا'),
(347, 25, 'ماسوله'),
(348, 25, 'آستانه اشرفيه'),
(349, 25, 'رودبار'),
(350, 25, 'فومن'),
(351, 25, 'صومعه سرا'),
(352, 25, 'بندرانزلي'),
(353, 25, 'كلاچاي'),
(354, 25, 'هشتپر'),
(355, 25, 'رضوان شهر'),
(356, 25, 'ماسال'),
(357, 25, 'شفت'),
(358, 25, 'سياهكل'),
(359, 25, 'املش'),
(360, 25, 'لاهیجان'),
(361, 25, 'خشک بيجار'),
(362, 25, 'خمام'),
(363, 25, 'لشت نشا'),
(364, 25, 'بندر کياشهر'),
(365, 26, 'خرم آباد'),
(366, 26, 'ماهشهر'),
(367, 26, 'دزفول'),
(368, 26, 'بروجرد'),
(369, 26, 'دورود'),
(370, 26, 'اليگودرز'),
(371, 26, 'ازنا'),
(372, 26, 'نور آباد'),
(373, 26, 'كوهدشت'),
(374, 26, 'الشتر'),
(375, 26, 'پلدختر'),
(376, 27, 'ساري'),
(377, 27, 'آمل'),
(378, 27, 'بابل'),
(379, 27, 'بابلسر'),
(380, 27, 'بهشهر'),
(381, 27, 'تنكابن'),
(382, 27, 'جويبار'),
(383, 27, 'چالوس'),
(384, 27, 'رامسر'),
(385, 27, 'سواد كوه'),
(386, 27, 'قائم شهر'),
(387, 27, 'نكا'),
(388, 27, 'نور'),
(389, 27, 'بلده'),
(390, 27, 'نوشهر'),
(391, 27, 'پل سفيد'),
(392, 27, 'محمود آباد'),
(393, 27, 'فريدون كنار'),
(394, 28, 'اراك'),
(395, 28, 'آشتيان'),
(396, 28, 'تفرش'),
(397, 28, 'خمين'),
(398, 28, 'دليجان'),
(399, 28, 'ساوه'),
(400, 28, 'سربند'),
(401, 28, 'محلات'),
(402, 28, 'شازند'),
(403, 29, 'بندرعباس'),
(404, 29, 'قشم'),
(405, 29, 'كيش'),
(406, 29, 'بندر لنگه'),
(407, 29, 'بستك'),
(408, 29, 'حاجي آباد'),
(409, 29, 'دهبارز'),
(410, 29, 'انگهران'),
(411, 29, 'ميناب'),
(412, 29, 'ابوموسي'),
(413, 29, 'بندر جاسك'),
(414, 29, 'تنب بزرگ'),
(415, 29, 'بندر خمیر'),
(416, 29, 'پارسیان'),
(417, 29, 'قشم'),
(418, 30, 'همدان'),
(419, 30, 'ملاير'),
(420, 30, 'تويسركان'),
(421, 30, 'نهاوند'),
(422, 30, 'كبودر اهنگ'),
(423, 30, 'رزن'),
(424, 30, 'اسدآباد'),
(425, 30, 'بهار'),
(426, 31, 'يزد'),
(427, 31, 'تفت'),
(428, 31, 'اردكان'),
(429, 31, 'ابركوه'),
(430, 31, 'ميبد'),
(431, 31, 'طبس'),
(432, 31, 'بافق'),
(433, 31, 'مهريز'),
(434, 31, 'اشكذر'),
(435, 31, 'هرات'),
(436, 31, 'خضرآباد'),
(437, 31, 'شاهديه'),
(438, 31, 'حمیدیه شهر'),
(439, 31, 'سید میرزا'),
(440, 31, 'زارچ');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `commentable_id` bigint(20) UNSIGNED NOT NULL,
  `commentable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `commentable_id`, `commentable_type`, `parent_id`, `approved`, `comment`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 7, 'App\\Models\\Market\\Product', 0, 1, 'sadas', '2022-01-07 18:52:23', '2022-01-16 16:29:16', NULL),
(7, 1, 7, 'App\\Models\\Market\\Product', 0, 1, 'بهترین محصول', '2022-01-08 12:09:42', '2022-01-08 17:00:46', NULL),
(10, 1, 10, 'App\\Models\\Market\\Product', 0, 1, 'این محصول خیلی خوبه', '2022-01-16 16:07:34', '2022-01-16 16:11:45', NULL),
(36, 1, 10, 'App\\Models\\Market\\Product', 10, 1, 'بخرش', '2022-01-16 20:22:53', '2022-01-16 20:22:53', NULL),
(37, 1, 7, 'App\\Models\\Market\\Product', 7, 1, 'یک ه یک حرف نداره', '2022-01-16 20:56:20', '2022-01-16 20:56:20', NULL),
(38, 1, 11, 'App\\Models\\Market\\Product', 0, 1, 'گالری خیلی خوبه', '2022-01-31 07:14:31', '2022-01-31 07:14:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `common_discount`
--

CREATE TABLE `common_discount` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` int(11) NOT NULL,
  `discount_ceiling` bigint(20) UNSIGNED DEFAULT NULL,
  `minimal_order_amount` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `copans`
--

CREATE TABLE `copans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => takhfif darsadi ,  1=> meghdari ',
  `discount_ceiling` bigint(20) UNSIGNED DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => common (each user can use one time), 1 => private (one user can use one time)',
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(20,0) DEFAULT NULL,
  `delivery_time` int(11) DEFAULT NULL,
  `delivery_time_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `name`, `amount`, `delivery_time`, `delivery_time_unit`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'پیک موتوری', '100000', 25, 'دقیقه', 1, '2021-12-28 13:53:51', '2021-12-29 09:54:36', NULL),
(2, 'خبری', '22', 2, 'day', 1, '2021-12-28 14:08:47', '2021-12-28 14:25:53', '2021-12-28 14:25:53');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `code`, `percent`, `user`, `expired_at`, `created_at`, `updated_at`) VALUES
(2, 'sa', 12, NULL, '2022-02-18 12:09:00', '2022-02-01 09:10:00', '2022-02-01 09:10:00'),
(3, 'mma', 23, NULL, '2022-02-24 09:11:00', '2022-02-01 09:11:15', '2022-02-01 09:11:15'),
(4, '221', 32, NULL, '2022-02-22 12:15:00', '2022-02-01 09:15:36', '2022-02-01 09:15:36'),
(5, '23', 23, NULL, '2022-02-06 09:17:00', '2022-02-01 09:17:46', '2022-02-01 13:08:00'),
(7, '5050', 50, NULL, '2022-02-23 16:58:00', '2022-02-01 12:58:19', '2022-02-01 13:03:59'),
(8, '50', 99, NULL, '2022-02-09 13:02:00', '2022-02-01 13:02:23', '2022-02-02 09:14:26');

-- --------------------------------------------------------

--
-- Table structure for table `discount_product`
--

CREATE TABLE `discount_product` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `discount_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_product`
--

INSERT INTO `discount_product` (`product_id`, `discount_id`) VALUES
(7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `discount_user`
--

CREATE TABLE `discount_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `discount_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_user`
--

INSERT INTO `discount_user` (`user_id`, `discount_id`) VALUES
(1, 5);

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guarantees`
--

CREATE TABLE `guarantees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price_increase` decimal(20,3) NOT NULL DEFAULT 0.000,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `index_pages`
--

CREATE TABLE `index_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `index_pages`
--

INSERT INTO `index_pages` (`id`, `name`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'pic1', '{\"indexArray\":{\"large\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\\\\1640793549_large.jpg\",\"medium\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\\\\1640793549_medium.jpg\",\"small\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\\\\1640793549_small.jpg\"},\"directory\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\",\"currentImage\":\"medium\"}', NULL, '2021-12-29 16:13:55', NULL),
(2, 'pic1', '{\"indexArray\":{\"large\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\\\\1640793549_large.jpg\",\"medium\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\\\\1640793549_medium.jpg\",\"small\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\\\\1640793549_small.jpg\"},\"directory\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\",\"currentImage\":\"medium\"}', NULL, NULL, NULL),
(3, 'pic1', '{\"indexArray\":{\"large\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\\\\1640793549_large.jpg\",\"medium\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\\\\1640793549_medium.jpg\",\"small\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\\\\1640793549_small.jpg\"},\"directory\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\",\"currentImage\":\"medium\"}', NULL, NULL, NULL),
(4, 'pic1', '{\"indexArray\":{\"large\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\\\\1640793549_large.jpg\",\"medium\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\\\\1640793549_medium.jpg\",\"small\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\\\\1640793549_small.jpg\"},\"directory\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\",\"currentImage\":\"medium\"}', NULL, NULL, NULL),
(5, 'pic1', '{\"indexArray\":{\"large\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\\\\1640793549_large.jpg\",\"medium\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\\\\1640793549_medium.jpg\",\"small\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\\\\1640793549_small.jpg\"},\"directory\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\",\"currentImage\":\"medium\"}', NULL, NULL, NULL),
(6, 'pic1', '{\"indexArray\":{\"large\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\\\\1640793549_large.jpg\",\"medium\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\\\\1640793549_medium.jpg\",\"small\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\\\\1640793549_small.jpg\"},\"directory\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\",\"currentImage\":\"medium\"}', NULL, NULL, NULL),
(7, 'pic1', '{\"indexArray\":{\"large\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\\\\1640793549_large.jpg\",\"medium\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\\\\1640793549_medium.jpg\",\"small\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\\\\1640793549_small.jpg\"},\"directory\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\",\"currentImage\":\"medium\"}', NULL, NULL, NULL),
(8, 'pic1', '{\"indexArray\":{\"large\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\\\\1640793549_large.jpg\",\"medium\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\\\\1640793549_medium.jpg\",\"small\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\\\\1640793549_small.jpg\"},\"directory\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\",\"currentImage\":\"medium\"}', NULL, NULL, NULL),
(9, 'pic1', '{\"indexArray\":{\"large\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\\\\1640793549_large.jpg\",\"medium\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\\\\1640793549_medium.jpg\",\"small\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\\\\1640793549_small.jpg\"},\"directory\":\"images\\\\index-pics\\\\2021\\\\12\\\\29\\\\1640793549\",\"currentImage\":\"medium\"}', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `link`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'instagram.com/Mamal', NULL, '2021-12-29 14:29:42', NULL),
(2, 'youtube.com/MamalKALA', NULL, NULL, NULL),
(3, 'telegram.com/MamalKALA', NULL, NULL, NULL),
(4, 'twitter.com/MamalKALA', NULL, NULL, NULL),
(5, 'facebook.com/MamalKALA', NULL, NULL, NULL),
(6, 'google.com/MamalKALA', NULL, NULL, NULL),
(7, 'bazar.com/MamalKALA', NULL, NULL, NULL),
(8, 'app.com/MamalKALA', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `url`, `status`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'خبری2', 'news.com', 1, NULL, '2021-12-25 15:26:42', '2021-12-25 15:27:02', NULL);

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
(50, '2014_10_12_000000_create_users_table', 1),
(51, '2014_10_12_100000_create_password_resets_table', 1),
(52, '2019_08_19_000000_create_failed_jobs_table', 1),
(53, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(54, '2021_10_30_173751_create_post_categories_table', 1),
(55, '2021_10_30_173905_create_posts_table', 1),
(56, '2021_10_30_174102_create_menus_table', 1),
(57, '2021_10_30_174318_create_faqs_table', 1),
(58, '2021_10_30_174817_create_pages_table', 1),
(59, '2021_10_30_175251_create_comments_table', 1),
(60, '2021_10_31_123153_create_ticket_categories_table', 1),
(61, '2021_10_31_123249_create_ticket_priorities_table', 1),
(62, '2021_10_31_123304_create_ticket_admins_table', 1),
(63, '2021_10_31_134013_create_tickets_table', 1),
(64, '2021_10_31_134044_create_ticket_files_table', 1),
(65, '2021_10_31_135203_create_roles_table', 1),
(66, '2021_10_31_135252_create_permissions_table', 1),
(67, '2021_10_31_140735_create_role_user_table', 1),
(68, '2021_10_31_140807_create_permission_role_table', 1),
(69, '2021_10_31_161805_create_product_categories_table', 1),
(70, '2021_10_31_161832_create_brands_table', 1),
(71, '2021_10_31_163055_create_category_attributes_table', 1),
(72, '2021_10_31_163305_create_category_attribute_default_values_table', 1),
(73, '2021_10_31_163323_create_products_table', 1),
(74, '2021_10_31_170556_create_product_images_table', 1),
(75, '2021_10_31_170849_create_guarantees_table', 1),
(76, '2021_10_31_170916_create_product_colors_table', 1),
(77, '2021_10_31_171021_create_category_values_table', 1),
(78, '2021_10_31_171159_create_product_meta_table', 1),
(79, '2021_11_02_104712_create_copans_table', 1),
(80, '2021_11_02_104734_create_amazing_sales_table', 1),
(81, '2021_11_02_104814_create_common_discount_table', 1),
(82, '2021_11_02_111745_create_provinces_table', 1),
(83, '2021_11_02_111811_create_cities_table', 1),
(84, '2021_11_02_111841_create_addresses_table', 1),
(85, '2021_11_02_111858_create_delivery_table', 1),
(86, '2021_11_02_113150_create_public_sms_table', 1),
(87, '2021_11_02_113225_create_public_mail_table', 1),
(88, '2021_11_02_113251_create_public_mail_files_table', 1),
(89, '2021_11_02_115214_create_product_user_table', 1),
(90, '2021_11_02_131559_create_offline_payments_table', 1),
(91, '2021_11_02_131625_create_online_payments_table', 1),
(92, '2021_11_02_131648_create_cash_payments_table', 1),
(93, '2021_11_02_131702_create_payments_table', 1),
(94, '2021_11_02_134913_create_cart_item_table', 1),
(95, '2021_11_02_135030_create_cart_item_selected_attributes_table', 1),
(96, '2021_11_02_142614_create_orders_table', 1),
(97, '2021_11_02_144734_create_order_items_table', 1),
(98, '2021_11_02_144808_create_order_item_selected_attributes_table', 1),
(100, '2021_12_26_202612_create_settings_table', 2),
(101, '2021_12_29_135033_create_sliders_table', 3),
(102, '2021_12_29_135332_create_index_pages_table', 3),
(103, '2021_12_29_135358_create_links_table', 3),
(104, '2021_12_30_140506_create_products_table', 4),
(107, '2021_12_30_233613_create_active_codes', 5),
(108, '2022_01_07_222124_create_comments_table', 6),
(109, '2022_01_11_113338_create_categories_table', 7),
(110, '2022_01_14_164251_create_attributes_table', 8),
(113, '2022_01_24_061751_create_orders_table', 9),
(114, '2022_01_24_061920_create_payments_table', 9),
(115, '2022_01_27_020240_create_addresses_table', 10),
(116, '2022_01_31_081123_create_product_galleries_table', 11),
(117, '2022_02_01_100956_create_discounts_table', 12),
(118, '2022_02_01_115517_add_user_discount_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `offline_payments`
--

CREATE TABLE `offline_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(20,3) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `online_payments`
--

CREATE TABLE `online_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(20,3) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `gateway` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_first_response` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_second_response` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `price` bigint(20) NOT NULL,
  `status` enum('unpaid','paid','preparation','posted','received','canceled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracking_serial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `price`, `status`, `tracking_serial`, `created_at`, `updated_at`) VALUES
(111, 1, 40000, 'canceled', '0', '2022-01-29 04:59:04', '2022-01-29 05:12:22'),
(112, 1, 2000000, 'paid', '123654', '2022-01-29 05:03:06', '2022-01-29 05:11:52'),
(113, 1, 1500000, 'paid', NULL, '2022-02-02 05:34:17', '2022-02-02 05:34:31'),
(114, 1, 500000, 'unpaid', NULL, '2022-02-02 05:40:06', '2022-02-02 05:40:06');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `amazing_sale_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amazing_sale_object` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `amazing_sale_discount_amount` decimal(20,3) DEFAULT NULL,
  `number` int(11) NOT NULL DEFAULT 1,
  `final_product_price` decimal(20,3) DEFAULT NULL,
  `final_total_price` decimal(20,3) DEFAULT NULL COMMENT 'number * final_product_price',
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `guarantee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_item_selected_attributes`
--

CREATE TABLE `order_item_selected_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `category_attribute_id` bigint(20) UNSIGNED NOT NULL,
  `category_value_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`product_id`, `order_id`, `quantity`, `price`) VALUES
(8, 111, 2, 20000),
(11, 112, 2, 1000000),
(11, 113, 3, 1000000),
(11, 114, 1, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `resnumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `resnumber`, `status`, `created_at`, `updated_at`) VALUES
(48, 111, '000000000000000000000000000000751510', 0, '2022-01-29 04:59:05', '2022-01-29 04:59:05'),
(49, 112, '000000000000000000000000000000751513', 1, '2022-01-29 05:03:06', '2022-01-29 05:03:09'),
(50, 113, '000000000000000000000000000000755142', 1, '2022-02-02 05:34:18', '2022-02-02 05:34:31'),
(51, 114, '000000000000000000000000000000755143', 0, '2022-02-02 05:40:07', '2022-02-02 05:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'shop-manager', 'مدیر فروشگاه', 0, NULL, NULL, NULL),
(2, 'product-manager', 'مدیر محصولات', 0, NULL, NULL, NULL),
(3, 'user-manager', 'مدیریت کاربران', 0, NULL, NULL, NULL),
(4, 'blog-manager', 'مدیریت بخش محتوی', 0, NULL, NULL, NULL),
(5, 'setting-manager', 'مدیریت تمامی تنظیمات سایت', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`, `created_at`) VALUES
(2, 1, '2022-01-05 17:00:16'),
(2, 2, '2022-01-05 17:00:16'),
(2, 3, '2022-01-05 12:40:27'),
(2, 4, '2022-01-05 12:40:27'),
(2, 5, '2022-01-05 17:00:16'),
(5, 1, '2022-01-05 17:01:54'),
(5, 2, '2022-01-05 17:01:54'),
(6, 4, '2022-01-05 17:02:53');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `commentable` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => uncommentable, 1 => commentable',
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `summary`, `body`, `image`, `status`, `commentable`, `tags`, `published_at`, `author_id`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'خبر تست پست', 'khbr-tst-st', '<p>هییی سشی</p>', '<p>یشس شسی شسیشس</p>', '{\"indexArray\":{\"large\":\"images\\\\post\\\\2021\\\\12\\\\25\\\\1640462546\\\\1640462546_large.jpg\",\"medium\":\"images\\\\post\\\\2021\\\\12\\\\25\\\\1640462546\\\\1640462546_medium.jpg\",\"small\":\"images\\\\post\\\\2021\\\\12\\\\25\\\\1640462546\\\\1640462546_small.jpg\"},\"directory\":\"images\\\\post\\\\2021\\\\12\\\\25\\\\1640462546\",\"currentImage\":\"medium\"}', 0, 1, 'پست', '2021-12-25 16:31:53', 1, 1, '2021-12-25 16:32:26', '2021-12-25 16:32:26', NULL),
(2, 'پست با تصویر درون متن', 'پست-با-تصویر-درون-متن', '<p>خلاصه&nbsp;خلاصه&nbsp;خلاصه&nbsp;خلاصه&nbsp;خلاصه&nbsp;</p>', '<p>خلاصه&nbsp;خلاصه&nbsp;خلاصه&nbsp;خلاصه&nbsp;خلاصه&nbsp;خلاصه&nbsp;خلاصه&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"/images/user-images/2022/01/01/1641056138.jpg\" style=\"height:250px; width:200px\" /></p>\r\n\r\n<p>خلاصه&nbsp;خلاصه&nbsp;خلاصه&nbsp;خلاصه&nbsp;خلاصه&nbsp;خلاصه&nbsp;</p>', '{\"indexArray\":{\"large\":\"images\\\\post\\\\2022\\\\01\\\\31\\\\1643601258\\\\1643601258_large.jpg\",\"medium\":\"images\\\\post\\\\2022\\\\01\\\\31\\\\1643601258\\\\1643601258_medium.jpg\",\"small\":\"images\\\\post\\\\2022\\\\01\\\\31\\\\1643601258\\\\1643601258_small.jpg\"},\"directory\":\"images\\\\post\\\\2022\\\\01\\\\31\\\\1643601258\",\"currentImage\":\"medium\"}', 1, 1, 'پست', '2022-01-31 03:54:09', 1, 1, '2022-01-31 03:54:18', '2022-01-31 03:54:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `name`, `description`, `slug`, `image`, `status`, `tags`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'خبری', '<p>تست خبر</p>', 'khbr', '{\"indexArray\":{\"large\":\"images\\\\post-category\\\\2021\\\\12\\\\25\\\\1640462502\\\\1640462502_large.jpg\",\"medium\":\"images\\\\post-category\\\\2021\\\\12\\\\25\\\\1640462502\\\\1640462502_medium.jpg\",\"small\":\"images\\\\post-category\\\\2021\\\\12\\\\25\\\\1640462502\\\\1640462502_small.jpg\"},\"directory\":\"images\\\\post-category\\\\2021\\\\12\\\\25\\\\1640462502\",\"currentImage\":\"medium\"}', 1, 'خبر', '2021-12-25 16:31:43', '2021-12-25 16:31:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `inventory` int(11) NOT NULL DEFAULT 0,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `title`, `image`, `slug`, `description`, `price`, `inventory`, `view_count`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 1, 'لباس ابی', '{\"indexArray\":{\"large\":\"images\\\\product\\\\2022\\\\01\\\\06\\\\1641495541\\\\1641495541_large.jpg\",\"medium\":\"images\\\\product\\\\2022\\\\01\\\\06\\\\1641495541\\\\1641495541_medium.jpg\",\"small\":\"images\\\\product\\\\2022\\\\01\\\\06\\\\1641495541\\\\1641495541_small.jpg\"},\"directory\":\"images\\\\product\\\\2022\\\\01\\\\06\\\\1641495541\",\"currentImage\":\"medium\"}', 'لباس-ابی', '<p>این لباس است</p>', 150000, 20, 0, '2022-01-06 18:59:02', '2022-01-06 19:00:29', NULL),
(8, 1, 'گوشی موبایل', '{\"indexArray\":{\"large\":\"images\\\\product\\\\2022\\\\01\\\\12\\\\1641993845\\\\1641993845_large.jpg\",\"medium\":\"images\\\\product\\\\2022\\\\01\\\\12\\\\1641993845\\\\1641993845_medium.jpg\",\"small\":\"images\\\\product\\\\2022\\\\01\\\\12\\\\1641993845\\\\1641993845_small.jpg\"},\"directory\":\"images\\\\product\\\\2022\\\\01\\\\12\\\\1641993845\",\"currentImage\":\"medium\"}', 'گوشی-موبایل', '<p>گوشی موبایل است</p>', 20000, 2, 0, '2022-01-12 13:24:05', '2022-01-12 13:24:05', NULL),
(9, 1, 'demo', '{\"indexArray\":{\"large\":\"images\\\\product\\\\2022\\\\01\\\\15\\\\1642270641\\\\1642270641_large.jpg\",\"medium\":\"images\\\\product\\\\2022\\\\01\\\\15\\\\1642270641\\\\1642270641_medium.jpg\",\"small\":\"images\\\\product\\\\2022\\\\01\\\\15\\\\1642270641\\\\1642270641_small.jpg\"},\"directory\":\"images\\\\product\\\\2022\\\\01\\\\15\\\\1642270641\",\"currentImage\":\"medium\"}', 'demo', '<p>demo2</p>', 20000, 22, 0, '2022-01-15 18:17:21', '2022-01-15 18:17:21', NULL),
(10, 1, 'تست', '{\"indexArray\":{\"large\":\"images\\\\product\\\\2022\\\\01\\\\16\\\\1642329746\\\\1642329746_large.jpg\",\"medium\":\"images\\\\product\\\\2022\\\\01\\\\16\\\\1642329746\\\\1642329746_medium.jpg\",\"small\":\"images\\\\product\\\\2022\\\\01\\\\16\\\\1642329746\\\\1642329746_small.jpg\"},\"directory\":\"images\\\\product\\\\2022\\\\01\\\\16\\\\1642329746\",\"currentImage\":\"medium\"}', 'تست', '<p>سشی شسیشس</p>', 22000, 20, 0, '2022-01-16 10:42:27', '2022-01-16 10:42:27', NULL),
(11, 1, 'گوشی اپل', '{\"indexArray\":{\"large\":\"images\\\\product\\\\2022\\\\01\\\\19\\\\1642549086\\\\1642549086_large.jpg\",\"medium\":\"images\\\\product\\\\2022\\\\01\\\\19\\\\1642549086\\\\1642549086_medium.jpg\",\"small\":\"images\\\\product\\\\2022\\\\01\\\\19\\\\1642549086\\\\1642549086_small.jpg\"},\"directory\":\"images\\\\product\\\\2022\\\\01\\\\19\\\\1642549086\",\"currentImage\":\"medium\"}', 'گوشی-اپل', '<p>تست انلی تست</p>', 1000000, 5, 0, '2022-01-18 23:38:06', '2022-01-18 23:38:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_galleries`
--

CREATE TABLE `product_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_galleries`
--

INSERT INTO `product_galleries` (`id`, `product_id`, `image`, `alt`, `created_at`, `updated_at`) VALUES
(1, 11, '/images/user-images/2022/01/26/1643176156.jpg', 'quiet', '2022-01-31 06:34:55', '2022-01-31 06:51:18'),
(3, 11, '/images/user-images/2022/01/05/1641403989.jpg', 'pic3', '2022-01-31 06:36:38', '2022-01-31 06:36:38'),
(4, 11, '/images/gallery/3016466-9.jpg', 'quiet', '2022-01-31 07:15:28', '2022-01-31 07:15:28'),
(5, 11, '/images/index-pics/2021/12/29/1640793549/1640793549_medium.jpg', 'pic mic', '2022-01-31 07:16:14', '2022-01-31 07:16:14'),
(6, 11, '/images/setting/2021/12/26/logo.png', 'sdas', '2022-01-31 07:17:00', '2022-01-31 07:17:00');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`) VALUES
(1, 'آذربايجان شرقي'),
(2, 'آذربايجان غربي'),
(3, 'اردبيل'),
(4, 'اصفهان'),
(5, 'البرز'),
(6, 'ايلام'),
(7, 'بوشهر'),
(8, 'تهران'),
(9, 'چهارمحال بختياري'),
(10, 'خراسان جنوبي'),
(11, 'خراسان رضوي'),
(12, 'خراسان شمالي'),
(13, 'خوزستان'),
(14, 'زنجان'),
(15, 'سمنان'),
(16, 'سيستان و بلوچستان'),
(17, 'فارس'),
(18, 'قزوين'),
(19, 'قم'),
(20, 'كردستان'),
(21, 'كرمان'),
(22, 'كرمانشاه'),
(23, 'كهكيلويه و بويراحمد'),
(24, 'گلستان'),
(25, 'گيلان'),
(26, 'لرستان'),
(27, 'مازندران'),
(28, 'مركزي'),
(29, 'هرمزگان'),
(30, 'همدان'),
(31, 'يزد');

-- --------------------------------------------------------

--
-- Table structure for table `public_mail`
--

CREATE TABLE `public_mail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `published_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `public_mail`
--

INSERT INTO `public_mail` (`id`, `subject`, `body`, `status`, `published_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ایمیل', '<p>ds df sdf sdfsd&nbsp;</p>', 1, '2022-01-05 12:03:55', '2021-12-26 10:16:07', '2021-12-26 13:48:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `public_mail_files`
--

CREATE TABLE `public_mail_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `public_mail_id` bigint(20) UNSIGNED NOT NULL,
  `file_path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` bigint(20) NOT NULL,
  `file_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `public_mail_files`
--

INSERT INTO `public_mail_files` (`id`, `public_mail_id`, `file_path`, `file_size`, `file_type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'files\\email-files\\2021\\12\\27\\1640608334.jpg', 283499, 'jpg', 0, '2021-12-27 12:32:14', '2021-12-27 12:32:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `public_sms`
--

CREATE TABLE `public_sms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `published_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `public_sms`
--

INSERT INTO `public_sms` (`id`, `title`, `body`, `status`, `published_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'assa', 'sad as dsasadssasa', 0, '2022-01-02 11:26:00', '2021-12-26 09:41:49', '2021-12-30 08:38:05', NULL),
(2, 'sadsa', 'sadasdasdas', 1, '2021-12-31 18:52:33', '2021-12-31 18:52:40', '2021-12-31 18:52:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'master-admin', 'مدیریت کل سایت', 0, NULL, '2022-01-05 17:00:16', NULL),
(5, 'admin-store', 'مدیریت فروشگاه', 0, '2022-01-05 17:01:54', '2022-01-05 17:01:54', NULL),
(6, 'admin-content', 'مدیریت بخش محتوی', 0, '2022-01-05 17:02:53', '2022-01-05 17:02:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`, `created_at`) VALUES
(1, 2, '2022-01-06 14:11:06'),
(19, 6, '2022-02-02 07:46:40');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `description`, `keywords`, `logo`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'عنوان سایت', 'توضیحات سایت', 'کلمات کلیدی سایت', '\"images\\\\setting\\\\2021\\\\12\\\\26\\\\logo.png\"', '\"images\\\\setting\\\\2021\\\\12\\\\26\\\\icon.png\"', NULL, '2021-12-26 17:19:11');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'اسلایدر 1', '\"images\\\\sliders-images\\\\2021\\\\12\\\\30\\\\1640855288.jpg\"', '2021-12-30 08:48:59', '2021-12-30 09:08:08', NULL),
(2, 'خبری', '\"images\\\\sliders-images\\\\2022\\\\01\\\\18\\\\1642533334.jpg\"', '2022-01-18 19:15:34', '2022-01-18 19:15:34', NULL),
(3, 'اسلایدر 2', '\"images\\\\sliders-images\\\\2022\\\\01\\\\18\\\\1642535661.jpg\"', '2022-01-18 19:54:21', '2022-01-18 19:54:21', NULL),
(4, 'اسلایدر 3', '\"images\\\\sliders-images\\\\2022\\\\01\\\\18\\\\1642535677.jpg\"', '2022-01-18 19:54:37', '2022-01-18 19:54:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `seen` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => unseen, 1 => seen',
  `reference_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `priority_id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_admins`
--

CREATE TABLE `ticket_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_categories`
--

CREATE TABLE `ticket_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_files`
--

CREATE TABLE `ticket_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` bigint(20) NOT NULL,
  `file_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_priorities`
--

CREATE TABLE `ticket_priorities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'avatar',
  `user_type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => user, 1 => admin',
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `phone`, `national_code`, `first_name`, `last_name`, `profile_photo_path`, `user_type`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test@yahoo.com', '09158574662', NULL, 'ممل', 'ریش سفید', '\"images\\\\user-images\\\\2022\\\\01\\\\26\\\\1643176567.jpg\"', 1, 1, 'd5XyfIV7MDuFf8Uf22yTuxmdO6OQLfvA2jLCCSf6YiPyzo4cxjjhxyOhYgCL', NULL, '2022-02-27 09:30:45', NULL),
(19, NULL, '09158574663', NULL, 'محمد', 'نیوباگ زاد', NULL, 1, 1, NULL, '2021-12-31 19:31:33', '2022-02-02 07:31:21', NULL),
(20, NULL, '09153710392', NULL, 'mmm', NULL, NULL, 0, 0, NULL, '2022-01-25 04:17:34', '2022-01-25 04:17:34', NULL),
(33, NULL, '09354566180', NULL, 'mmm', NULL, NULL, 0, 0, NULL, '2022-01-27 09:59:40', '2022-01-27 09:59:40', NULL),
(34, NULL, '09354566880', NULL, 'amir', NULL, NULL, 0, 0, NULL, '2022-01-27 10:50:16', '2022-01-27 10:50:16', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_codes`
--
ALTER TABLE `active_codes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `active_codes_user_id_code_unique` (`user_id`,`code`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`),
  ADD KEY `addresses_city_id_foreign` (`city_id`);

--
-- Indexes for table `amazing_sales`
--
ALTER TABLE `amazing_sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `amazing_sales_product_id_foreign` (`product_id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_product`
--
ALTER TABLE `attribute_product`
  ADD PRIMARY KEY (`attribute_id`,`product_id`,`value_id`),
  ADD KEY `attribute_product_product_id_foreign` (`product_id`),
  ADD KEY `attribute_product_value_id_foreign` (`value_id`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_values_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_item_user_id_foreign` (`user_id`),
  ADD KEY `cart_item_product_id_foreign` (`product_id`),
  ADD KEY `cart_item_color_id_foreign` (`color_id`),
  ADD KEY `cart_item_guarantee_id_foreign` (`guarantee_id`);

--
-- Indexes for table `cart_item_selected_attributes`
--
ALTER TABLE `cart_item_selected_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_item_selected_attributes_user_id_foreign` (`user_id`),
  ADD KEY `cart_item_selected_attributes_product_id_foreign` (`product_id`),
  ADD KEY `cart_item_selected_attributes_color_id_foreign` (`color_id`),
  ADD KEY `cart_item_selected_attributes_guarantee_id_foreign` (`guarantee_id`);

--
-- Indexes for table `cash_payments`
--
ALTER TABLE `cash_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cash_payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_attributes`
--
ALTER TABLE `category_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_attributes_category_id_foreign` (`category_id`);

--
-- Indexes for table `category_attribute_default_values`
--
ALTER TABLE `category_attribute_default_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_attribute_default_values_category_attribute_id_foreign` (`category_attribute_id`);

--
-- Indexes for table `category_discount`
--
ALTER TABLE `category_discount`
  ADD PRIMARY KEY (`category_id`,`discount_id`),
  ADD KEY `category_discount_discount_id_foreign` (`discount_id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`category_id`,`product_id`),
  ADD KEY `category_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `category_values`
--
ALTER TABLE `category_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_values_product_id_foreign` (`product_id`),
  ADD KEY `category_values_category_attribute_id_foreign` (`category_attribute_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_province_id_foreign` (`province_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `common_discount`
--
ALTER TABLE `common_discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `copans`
--
ALTER TABLE `copans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `copans_user_id_foreign` (`user_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_product`
--
ALTER TABLE `discount_product`
  ADD PRIMARY KEY (`product_id`,`discount_id`),
  ADD KEY `discount_product_discount_id_foreign` (`discount_id`);

--
-- Indexes for table `discount_user`
--
ALTER TABLE `discount_user`
  ADD PRIMARY KEY (`user_id`,`discount_id`),
  ADD KEY `discount_user_discount_id_foreign` (`discount_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faqs_slug_unique` (`slug`);

--
-- Indexes for table `guarantees`
--
ALTER TABLE `guarantees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guarantees_product_id_foreign` (`product_id`);

--
-- Indexes for table `index_pages`
--
ALTER TABLE `index_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offline_payments`
--
ALTER TABLE `offline_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offline_payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `online_payments`
--
ALTER TABLE `online_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `online_payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_amazing_sale_id_foreign` (`amazing_sale_id`),
  ADD KEY `order_items_color_id_foreign` (`color_id`),
  ADD KEY `order_items_guarantee_id_foreign` (`guarantee_id`);

--
-- Indexes for table `order_item_selected_attributes`
--
ALTER TABLE `order_item_selected_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_item_selected_attributes_order_item_id_foreign` (`order_item_id`),
  ADD KEY `order_item_selected_attributes_category_attribute_id_foreign` (`category_attribute_id`),
  ADD KEY `order_item_selected_attributes_category_value_id_foreign` (`category_value_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_author_id_foreign` (`author_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_categories_slug_unique` (`slug`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Indexes for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_galleries_product_id_foreign` (`product_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `public_mail`
--
ALTER TABLE `public_mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `public_mail_files`
--
ALTER TABLE `public_mail_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `public_mail_files_public_mail_id_foreign` (`public_mail_id`);

--
-- Indexes for table `public_sms`
--
ALTER TABLE `public_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_reference_id_foreign` (`reference_id`),
  ADD KEY `tickets_user_id_foreign` (`user_id`),
  ADD KEY `tickets_category_id_foreign` (`category_id`),
  ADD KEY `tickets_priority_id_foreign` (`priority_id`),
  ADD KEY `tickets_ticket_id_foreign` (`ticket_id`);

--
-- Indexes for table `ticket_admins`
--
ALTER TABLE `ticket_admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_admins_user_id_foreign` (`user_id`);

--
-- Indexes for table `ticket_categories`
--
ALTER TABLE `ticket_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_files`
--
ALTER TABLE `ticket_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_files_ticket_id_foreign` (`ticket_id`),
  ADD KEY `ticket_files_user_id_foreign` (`user_id`);

--
-- Indexes for table `ticket_priorities`
--
ALTER TABLE `ticket_priorities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`phone`),
  ADD UNIQUE KEY `users_national_code_unique` (`national_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active_codes`
--
ALTER TABLE `active_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `amazing_sales`
--
ALTER TABLE `amazing_sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_item_selected_attributes`
--
ALTER TABLE `cart_item_selected_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cash_payments`
--
ALTER TABLE `cash_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `category_attributes`
--
ALTER TABLE `category_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_attribute_default_values`
--
ALTER TABLE `category_attribute_default_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_values`
--
ALTER TABLE `category_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=441;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `common_discount`
--
ALTER TABLE `common_discount`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `copans`
--
ALTER TABLE `copans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guarantees`
--
ALTER TABLE `guarantees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `index_pages`
--
ALTER TABLE `index_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `offline_payments`
--
ALTER TABLE `offline_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online_payments`
--
ALTER TABLE `online_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_item_selected_attributes`
--
ALTER TABLE `order_item_selected_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `public_mail`
--
ALTER TABLE `public_mail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `public_mail_files`
--
ALTER TABLE `public_mail_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `public_sms`
--
ALTER TABLE `public_sms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_admins`
--
ALTER TABLE `ticket_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_categories`
--
ALTER TABLE `ticket_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_files`
--
ALTER TABLE `ticket_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_priorities`
--
ALTER TABLE `ticket_priorities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `active_codes`
--
ALTER TABLE `active_codes`
  ADD CONSTRAINT `active_codes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `amazing_sales`
--
ALTER TABLE `amazing_sales`
  ADD CONSTRAINT `amazing_sales_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attribute_product`
--
ALTER TABLE `attribute_product`
  ADD CONSTRAINT `attribute_product_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attribute_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attribute_product_value_id_foreign` FOREIGN KEY (`value_id`) REFERENCES `attribute_values` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD CONSTRAINT `attribute_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `cart_item_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `product_colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_item_guarantee_id_foreign` FOREIGN KEY (`guarantee_id`) REFERENCES `guarantees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_item_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_item_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_item_selected_attributes`
--
ALTER TABLE `cart_item_selected_attributes`
  ADD CONSTRAINT `cart_item_selected_attributes_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `product_colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_item_selected_attributes_guarantee_id_foreign` FOREIGN KEY (`guarantee_id`) REFERENCES `guarantees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_item_selected_attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_item_selected_attributes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cash_payments`
--
ALTER TABLE `cash_payments`
  ADD CONSTRAINT `cash_payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_attributes`
--
ALTER TABLE `category_attributes`
  ADD CONSTRAINT `category_attributes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_attribute_default_values`
--
ALTER TABLE `category_attribute_default_values`
  ADD CONSTRAINT `category_attribute_default_values_category_attribute_id_foreign` FOREIGN KEY (`category_attribute_id`) REFERENCES `category_attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_discount`
--
ALTER TABLE `category_discount`
  ADD CONSTRAINT `category_discount_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_discount_discount_id_foreign` FOREIGN KEY (`discount_id`) REFERENCES `discounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_values`
--
ALTER TABLE `category_values`
  ADD CONSTRAINT `category_values_category_attribute_id_foreign` FOREIGN KEY (`category_attribute_id`) REFERENCES `category_attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_values_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `copans`
--
ALTER TABLE `copans`
  ADD CONSTRAINT `copans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `discount_product`
--
ALTER TABLE `discount_product`
  ADD CONSTRAINT `discount_product_discount_id_foreign` FOREIGN KEY (`discount_id`) REFERENCES `discounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `discount_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `discount_user`
--
ALTER TABLE `discount_user`
  ADD CONSTRAINT `discount_user_discount_id_foreign` FOREIGN KEY (`discount_id`) REFERENCES `discounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `discount_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `guarantees`
--
ALTER TABLE `guarantees`
  ADD CONSTRAINT `guarantees_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`);

--
-- Constraints for table `offline_payments`
--
ALTER TABLE `offline_payments`
  ADD CONSTRAINT `offline_payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `online_payments`
--
ALTER TABLE `online_payments`
  ADD CONSTRAINT `online_payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_amazing_sale_id_foreign` FOREIGN KEY (`amazing_sale_id`) REFERENCES `amazing_sales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `product_colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_guarantee_id_foreign` FOREIGN KEY (`guarantee_id`) REFERENCES `guarantees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_item_selected_attributes`
--
ALTER TABLE `order_item_selected_attributes`
  ADD CONSTRAINT `order_item_selected_attributes_category_attribute_id_foreign` FOREIGN KEY (`category_attribute_id`) REFERENCES `category_attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_item_selected_attributes_category_value_id_foreign` FOREIGN KEY (`category_value_id`) REFERENCES `category_values` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_item_selected_attributes_order_item_id_foreign` FOREIGN KEY (`order_item_id`) REFERENCES `order_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `post_categories` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD CONSTRAINT `product_galleries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `public_mail_files`
--
ALTER TABLE `public_mail_files`
  ADD CONSTRAINT `public_mail_files_public_mail_id_foreign` FOREIGN KEY (`public_mail_id`) REFERENCES `public_mail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `ticket_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_priority_id_foreign` FOREIGN KEY (`priority_id`) REFERENCES `ticket_priorities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_reference_id_foreign` FOREIGN KEY (`reference_id`) REFERENCES `ticket_admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_admins`
--
ALTER TABLE `ticket_admins`
  ADD CONSTRAINT `ticket_admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_files`
--
ALTER TABLE `ticket_files`
  ADD CONSTRAINT `ticket_files_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_files_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
