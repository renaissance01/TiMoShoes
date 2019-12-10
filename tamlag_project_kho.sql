-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 10, 2019 lúc 04:56 AM
-- Phiên bản máy phục vụ: 10.3.16-MariaDB
-- Phiên bản PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tamlag_project_kho`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attr`
--

CREATE TABLE `attr` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `attr`
--

INSERT INTO `attr` (`id`, `name`, `value`, `order_id`) VALUES
(1, 'Size', 'S', 1),
(2, 'color', 'Đỏ', 1),
(3, 'Size', '41', 2),
(4, 'color', 'Đen', 2),
(5, 'color', 'Đen', 3),
(6, 'Size', '41', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attribute`
--

CREATE TABLE `attribute` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `attribute`
--

INSERT INTO `attribute` (`id`, `name`) VALUES
(1, 'Size'),
(2, 'color');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `parent`) VALUES
(1, 'Nam', 'nam', 0),
(2, 'Giày Nam', 'giay-nam', 1),
(3, 'Nữ', 'nu', 0),
(4, 'Giày Nữ', 'giay-nu', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` decimal(18,0) DEFAULT NULL,
  `state` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `full_name`, `address`, `email`, `phone`, `total`, `state`, `created_at`, `updated_at`) VALUES
(1, 'Phạm Thành Tâm', 'số 2, ngõ 2 đường Nguyễn Hoàng, chung cư Mỹ Đình Plaza 2, phường Mỹ Đình 2, quận Nam Từ Liêm', 'tampt0563@gmail.com', '0966944922', '900000', 1, '2019-12-06 03:33:35', '2019-12-06 03:33:53'),
(2, 'Phạm Thành Tâm', 'số 2, ngõ 2 đường Nguyễn Hoàng, chung cư Mỹ Đình Plaza 2, phường Mỹ Đình 2, quận Nam Từ Liêm', 'tampt0563@gmail.com', '0966944922', '300000', 1, '2019-12-06 03:34:36', '2019-12-06 03:34:47'),
(3, 'Phạm Thành Tâm', 'số 2, ngõ 2 đường Nguyễn Hoàng, chung cư Mỹ Đình Plaza 2, phường Mỹ Đình 2, quận Nam Từ Liêm', 'tampt0563@gmail.com', '0966944922', '1120000', 0, '2019-12-06 03:35:42', '2019-12-06 03:35:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(12, '2019_11_15_023015_create_category_table', 1),
(13, '2019_11_15_023139_create_product_table', 1),
(14, '2019_11_15_023158_create_users_table', 1),
(15, '2019_11_17_121017_create_attribute_table', 1),
(16, '2019_11_17_121113_create_values_table', 1),
(17, '2019_11_17_121137_create_values_product_table', 1),
(18, '2019_11_17_121217_create_variant_table', 1),
(19, '2019_11_17_121237_create_variant_values_table', 1),
(20, '2019_11_17_121330_create_customer_table', 1),
(21, '2019_11_17_121348_create_order_table', 1),
(22, '2019_11_17_121406_create_attr_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(18,0) NOT NULL,
  `quantity` tinyint(3) UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `name`, `price`, `quantity`, `img`, `customer_id`) VALUES
(1, 'Áo nam da thật MX105', '100000', 9, '73h7JK5ei.jpg', 1),
(2, 'Giày Thể Thao TiMo 4217', '300000', 1, 'zb58qcydm.jpg', 2),
(3, 'Giày Thể Thao TiMo 19178', '560000', 2, 'y5kC4I6Er.jpg', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(18,0) NOT NULL DEFAULT 0,
  `featured` tinyint(3) UNSIGNED NOT NULL,
  `state` tinyint(3) UNSIGNED NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `describe` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `product_code`, `name`, `slug`, `price`, `featured`, `state`, `info`, `describe`, `img`, `category_id`, `created_at`, `updated_at`) VALUES
(1, '2796', 'Giày Thể Thao TiMo 2796', 'giay-the-thao-timo-2796', '520000', 1, 1, 'Chất liệu cao cấp, bền đẹp theo thời gian. Thiết kế thời trang. Kiểu dáng phong cách. Độ bền cao. Dễ phối đồ.', 'Chất liệu cao cấp, bền đẹp theo thời gian. Thiết kế thời trang. Kiểu dáng phong cách. Độ bền cao. Dễ phối đồ.', 'WzfdAYtyc.jpg', 2, NULL, '2019-12-06 02:28:21'),
(2, '4217', 'Giày Thể Thao TiMo 4217', 'giay-the-thao-timo-4217', '600000', 0, 1, 'Chất liệu cao cấp, bền đẹp theo thời gian. Thiết kế thời trang. Kiểu dáng phong cách. Độ bền cao. Dễ phối đồ.', 'Chất liệu cao cấp, bền đẹp theo thời gian. Thiết kế thời trang. Kiểu dáng phong cách. Độ bền cao. Dễ phối đồ.', 'zb58qcydm.jpg', 2, NULL, '2019-12-06 02:28:16'),
(3, '19178', 'Giày Thể Thao TiMo 19178', 'giay-the-thao-timo-19178', '560000', 0, 1, 'Chất liệu cao cấp, bền đẹp theo thời gian. Thiết kế thời trang. Kiểu dáng phong cách. Độ bền cao. Dễ phối đồ.', 'Chất liệu cao cấp, bền đẹp theo thời gian. Thiết kế thời trang. Kiểu dáng phong cách. Độ bền cao. Dễ phối đồ.', 'y5kC4I6Er.jpg', 2, NULL, '2019-12-06 02:28:27'),
(4, '1908', 'Giày Thể Thao TiMo 1908', 'giay-the-thao-timo-1908', '600000', 1, 1, 'Chất liệu cao cấp, bền đẹp theo thời gian. Thiết kế thời trang. Kiểu dáng phong cách. Độ bền cao. Dễ phối đồ.', 'Chất liệu cao cấp, bền đẹp theo thời gian. Thiết kế thời trang. Kiểu dáng phong cách. Độ bền cao. Dễ phối đồ.', 'YbeBFYW9W.jpg', 2, NULL, '2019-12-06 02:29:04'),
(5, 'VO01', 'Giày Thể Thao Van.s Old Skool Vải XD Mũi Nỉ SF', 'giay-the-thao-vans-old-skool-vai-xd-mui-ni-sf', '250000', 1, 1, 'Chất liệu cao cấp, bền đẹp theo thời gian. Thiết kế thời trang. Kiểu dáng phong cách. Độ bền cao. Dễ phối đồ.', 'Chất liệu cao cấp, bền đẹp theo thời gian. Thiết kế thời trang. Kiểu dáng phong cách. Độ bền cao. Dễ phối đồ.', 'znTHZ9q8Z.jpg', 2, NULL, '2019-12-06 02:29:47'),
(10, 'MSF1', 'Giày Thể Thao Adi.das Superstar Trắng mũi sò F1', 'giay-the-thao-adidas-superstar-trang-mui-so-f1', '250000', 1, 1, 'Chất liệu cao cấp, bền đẹp theo thời gian. Thiết kế thời trang. Kiểu dáng phong cách. Độ bền cao. Dễ phối đồ.', 'Chất liệu cao cấp, bền đẹp theo thời gian. Thiết kế thời trang. Kiểu dáng phong cách. Độ bền cao. Dễ phối đồ.', 'mvLsdAXvw.jpg', 4, '2019-12-06 02:20:02', '2019-12-06 02:31:36'),
(11, 'SF02', 'Giày Thể Thao Van.s Old Skool Vải Lửa SF', 'giay-the-thao-vans-old-skool-vai-lua-sf', '250000', 0, 1, 'Chất liệu cao cấp, bền đẹp theo thời gian. Thiết kế thời trang. Kiểu dáng phong cách. Độ bền cao. Dễ phối đồ.', 'Chất liệu cao cấp, bền đẹp theo thời gian. Thiết kế thời trang. Kiểu dáng phong cách. Độ bền cao. Dễ phối đồ.', 'iaFBIzPKR.jpg', 4, '2019-12-06 02:32:51', '2019-12-06 02:32:51'),
(12, '1098', 'Giày Thể Thao TiMo 1098', 'giay-the-thao-timo-1098', '480000', 0, 1, 'Chất liệu cao cấp, bền đẹp theo thời gian. Thiết kế thời trang. Kiểu dáng phong cách. Độ bền cao. Dễ phối đồ.', 'Chất liệu cao cấp, bền đẹp theo thời gian. Thiết kế thời trang. Kiểu dáng phong cách. Độ bền cao. Dễ phối đồ.', 'XRth4ToVX.jpg', 4, '2019-12-06 02:41:26', '2019-12-06 02:43:08'),
(13, '1112', 'Giày Thể Thao TiMo 1112', 'giay-the-thao-timo-1112', '360000', 1, 1, 'Chất liệu cao cấp, bền đẹp theo thời gian. Thiết kế thời trang. Kiểu dáng phong cách. Độ bền cao. Dễ phối đồ.', 'Chất liệu cao cấp, bền đẹp theo thời gian. Thiết kế thời trang. Kiểu dáng phong cách. Độ bền cao. Dễ phối đồ.', 'qTBcoWCof.jpg', 4, '2019-12-06 02:42:37', '2019-12-06 02:42:37'),
(14, 'MSF02', 'Giày Thể Thao TiMo Adi.das Alphabounce beyond F1', 'giay-the-thao-timo-adidas-alphabounce-beyond-f1', '360000', 0, 1, 'Chất liệu cao cấp, bền đẹp theo thời gian. Thiết kế thời trang. Kiểu dáng phong cách. Độ bền cao. Dễ phối đồ.', 'Chất liệu cao cấp, bền đẹp theo thời gian. Thiết kế thời trang. Kiểu dáng phong cách. Độ bền cao. Dễ phối đồ.', 'RbRNas4Ks.jpg', 4, '2019-12-06 02:44:49', '2019-12-06 02:44:49'),
(15, 'A87', 'Giày Thể Thao TiMo A87', 'giay-the-thao-timo-a87', '360000', 0, 1, 'Chất liệu cao cấp, bền đẹp theo thời gian. Thiết kế thời trang. Kiểu dáng phong cách. Độ bền cao. Dễ phối đồ.', 'Chất liệu cao cấp, bền đẹp theo thời gian. Thiết kế thời trang. Kiểu dáng phong cách. Độ bền cao. Dễ phối đồ.', '13ZwmQ0GN.jpg', 4, '2019-12-09 20:55:30', '2019-12-09 20:55:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `full`, `address`, `phone`, `level`, `remember_token`) VALUES
(1, 'admin@gmail.com', '$2y$10$uyaMD7.kPzP.lDxBK88gHuKiarvjlckGsR3zTnl7UKRuDSjA89xMe', 'vietpro', 'Thường tín', '0356653301', 1, 'JEnmIvVcp91fHOFAoSF8FK2AbmTpE0kdAU5PjXRYyCzNOq1N33ESyDXZyAWZ'),
(2, 'zimpro@gmail.com', '$2y$10$GkwIjFOwRGwxMscBDuad1.39TbnGbn298DNVLXbAQL9Fc6gOtRWCm', 'Nguyễn thế vũ', 'Bắc giang', '0356654487', 2, NULL),
(3, 'phucnguyenthe0809@gmail.com', '$2y$10$rAXbEvR/3KrJC9o5bI2EJeOCacvPMef6q8xlMOJBxaFR1.PhDKz0O', 'Nguyễn thế phúc', 'Huế', '0352264487', 1, NULL),
(4, 'zimpro9x@gmail.com', '$2y$10$C7BrmBbBgdT1TeSTrDEtwO8nNd1Uwnn6IHoJisWbX9YoLEX5eITOO', 'Nguyễn Văn Công', 'Nghệ An', '0357846659', 2, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `values`
--

CREATE TABLE `values` (
  `id` int(10) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attr_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `values`
--

INSERT INTO `values` (`id`, `value`, `attr_id`) VALUES
(1, '35', 1),
(2, '36', 1),
(3, '37', 1),
(4, 'Trắng', 2),
(6, 'Đen', 2),
(7, '38', 1),
(8, '39', 1),
(9, '40', 1),
(10, '41', 1),
(11, '42', 1),
(12, '43', 1),
(13, '44', 1),
(14, 'Hồng', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `values_product`
--

CREATE TABLE `values_product` (
  `values_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `values_product`
--

INSERT INTO `values_product` (`values_id`, `product_id`) VALUES
(4, 1),
(6, 3),
(4, 4),
(6, 4),
(4, 5),
(1, 10),
(4, 10),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(6, 1),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(4, 2),
(6, 2),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(4, 3),
(9, 4),
(10, 4),
(11, 4),
(12, 4),
(13, 4),
(9, 5),
(10, 5),
(11, 5),
(12, 5),
(13, 5),
(6, 5),
(2, 10),
(3, 10),
(7, 10),
(8, 10),
(6, 10),
(1, 11),
(2, 11),
(3, 11),
(7, 11),
(8, 11),
(4, 11),
(6, 11),
(2, 12),
(3, 12),
(7, 12),
(8, 12),
(4, 12),
(14, 12),
(2, 13),
(3, 13),
(7, 13),
(8, 13),
(14, 13),
(2, 14),
(3, 14),
(7, 14),
(8, 14),
(4, 14),
(1, 15),
(2, 15),
(3, 15),
(7, 15),
(8, 15),
(9, 15),
(10, 15),
(11, 15),
(12, 15),
(13, 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `variant`
--

CREATE TABLE `variant` (
  `id` int(10) UNSIGNED NOT NULL,
  `price` decimal(18,0) NOT NULL DEFAULT 0,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `variant`
--

INSERT INTO `variant` (`id`, `price`, `product_id`) VALUES
(1, '520000', 1),
(2, '520000', 1),
(13, '520000', 1),
(14, '520000', 1),
(15, '520000', 1),
(16, '520000', 1),
(17, '550000', 1),
(18, '550000', 1),
(19, '550000', 1),
(20, '550000', 1),
(21, '550000', 1),
(22, '550000', 1),
(23, '300000', 2),
(24, '300000', 2),
(25, '300000', 2),
(26, '300000', 2),
(27, '400000', 2),
(28, '400000', 2),
(29, '400000', 2),
(30, '400000', 2),
(31, '400000', 2),
(32, '400000', 2),
(33, '560000', 3),
(34, '560000', 3),
(35, '560000', 3),
(36, '560000', 3),
(37, '560000', 3),
(38, '560000', 3),
(39, '580000', 3),
(40, '580000', 3),
(41, '580000', 3),
(42, '580000', 3),
(43, '600000', 4),
(44, '600000', 4),
(45, '600000', 4),
(46, '600000', 4),
(47, '600000', 4),
(48, '600000', 4),
(49, '620000', 4),
(50, '620000', 4),
(51, '620000', 4),
(52, '620000', 4),
(53, '250000', 5),
(54, '250000', 5),
(55, '250000', 5),
(56, '250000', 5),
(57, '250000', 5),
(58, '250000', 5),
(59, '270000', 5),
(60, '270000', 5),
(61, '270000', 5),
(62, '270000', 5),
(63, '250000', 10),
(64, '250000', 10),
(65, '250000', 10),
(66, '250000', 10),
(67, '250000', 10),
(68, '250000', 10),
(69, '250000', 10),
(70, '250000', 10),
(71, '250000', 11),
(72, '250000', 11),
(73, '250000', 11),
(74, '250000', 11),
(75, '250000', 11),
(76, '250000', 11),
(77, '260000', 11),
(78, '260000', 11),
(79, '260000', 11),
(80, '260000', 11),
(81, '250000', 10),
(82, '250000', 10),
(87, '480000', 12),
(88, '480000', 12),
(89, '480000', 12),
(90, '480000', 12),
(91, '480000', 12),
(92, '480000', 12),
(93, '480000', 12),
(94, '480000', 12),
(95, '360000', 13),
(96, '360000', 13),
(97, '370000', 13),
(98, '370000', 13),
(99, '490000', 14),
(100, '490000', 14),
(101, '490000', 14),
(102, '490000', 14),
(103, '360000', 15),
(104, '360000', 15),
(105, '360000', 15),
(106, '360000', 15),
(107, '360000', 15),
(108, '360000', 15),
(109, '360000', 15),
(110, '360000', 15),
(111, '360000', 15),
(112, '360000', 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `variant_values`
--

CREATE TABLE `variant_values` (
  `variant_id` int(10) UNSIGNED NOT NULL,
  `values_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `variant_values`
--

INSERT INTO `variant_values` (`variant_id`, `values_id`) VALUES
(1, 1),
(1, 4),
(2, 2),
(2, 4),
(13, 9),
(13, 4),
(14, 9),
(14, 6),
(15, 10),
(15, 4),
(16, 10),
(16, 6),
(17, 11),
(17, 4),
(18, 11),
(18, 6),
(19, 12),
(19, 4),
(20, 12),
(20, 6),
(21, 13),
(21, 4),
(22, 13),
(22, 6),
(23, 9),
(23, 4),
(24, 9),
(24, 6),
(25, 10),
(25, 4),
(26, 10),
(26, 6),
(27, 11),
(27, 4),
(28, 11),
(28, 6),
(29, 12),
(29, 4),
(30, 12),
(30, 6),
(31, 13),
(31, 4),
(32, 13),
(32, 6),
(33, 9),
(33, 4),
(34, 9),
(34, 6),
(35, 10),
(35, 4),
(36, 10),
(36, 6),
(37, 11),
(37, 4),
(38, 11),
(38, 6),
(39, 12),
(39, 4),
(40, 12),
(40, 6),
(41, 13),
(41, 4),
(42, 13),
(42, 6),
(43, 9),
(43, 4),
(44, 9),
(44, 6),
(45, 10),
(45, 4),
(46, 10),
(46, 6),
(47, 11),
(47, 4),
(48, 11),
(48, 6),
(49, 12),
(49, 4),
(50, 12),
(50, 6),
(51, 13),
(51, 4),
(52, 13),
(52, 6),
(53, 9),
(53, 4),
(54, 9),
(54, 6),
(55, 10),
(55, 4),
(56, 10),
(56, 6),
(57, 11),
(57, 4),
(58, 11),
(58, 6),
(59, 12),
(59, 4),
(60, 12),
(60, 6),
(61, 13),
(61, 4),
(62, 13),
(62, 6),
(63, 2),
(63, 4),
(64, 2),
(64, 6),
(65, 3),
(65, 4),
(66, 3),
(66, 6),
(67, 7),
(67, 4),
(68, 7),
(68, 6),
(69, 8),
(69, 4),
(70, 8),
(70, 6),
(71, 1),
(71, 4),
(72, 1),
(72, 6),
(73, 2),
(73, 4),
(74, 2),
(74, 6),
(75, 3),
(75, 4),
(76, 3),
(76, 6),
(77, 7),
(77, 4),
(78, 7),
(78, 6),
(79, 8),
(79, 4),
(80, 8),
(80, 6),
(81, 1),
(81, 4),
(82, 1),
(82, 6),
(87, 2),
(87, 4),
(88, 2),
(88, 14),
(89, 3),
(89, 4),
(90, 3),
(90, 14),
(91, 7),
(91, 4),
(92, 7),
(92, 14),
(93, 8),
(93, 4),
(94, 8),
(94, 14),
(95, 2),
(95, 14),
(96, 3),
(96, 14),
(97, 7),
(97, 14),
(98, 8),
(98, 14),
(99, 2),
(99, 4),
(100, 3),
(100, 4),
(101, 7),
(101, 4),
(102, 8),
(102, 4),
(103, 1),
(104, 2),
(105, 3),
(106, 7),
(107, 8),
(108, 9),
(109, 10),
(110, 11),
(111, 12),
(112, 13);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `attr`
--
ALTER TABLE `attr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attr_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name_unique` (`name`),
  ADD UNIQUE KEY `category_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_customer_id_foreign` (`customer_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_product_code_unique` (`product_code`),
  ADD KEY `product_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `values`
--
ALTER TABLE `values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `values_attr_id_foreign` (`attr_id`);

--
-- Chỉ mục cho bảng `values_product`
--
ALTER TABLE `values_product`
  ADD KEY `values_product_values_id_foreign` (`values_id`),
  ADD KEY `values_product_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `variant`
--
ALTER TABLE `variant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variant_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `variant_values`
--
ALTER TABLE `variant_values`
  ADD KEY `variant_values_variant_id_foreign` (`variant_id`),
  ADD KEY `variant_values_values_id_foreign` (`values_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `attr`
--
ALTER TABLE `attr`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `attribute`
--
ALTER TABLE `attribute`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `values`
--
ALTER TABLE `values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `variant`
--
ALTER TABLE `variant`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `attr`
--
ALTER TABLE `attr`
  ADD CONSTRAINT `attr_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `values`
--
ALTER TABLE `values`
  ADD CONSTRAINT `values_attr_id_foreign` FOREIGN KEY (`attr_id`) REFERENCES `attribute` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `values_product`
--
ALTER TABLE `values_product`
  ADD CONSTRAINT `values_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `values_product_values_id_foreign` FOREIGN KEY (`values_id`) REFERENCES `values` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `variant`
--
ALTER TABLE `variant`
  ADD CONSTRAINT `variant_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `variant_values`
--
ALTER TABLE `variant_values`
  ADD CONSTRAINT `variant_values_values_id_foreign` FOREIGN KEY (`values_id`) REFERENCES `values` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `variant_values_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `variant` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
