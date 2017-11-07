-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 07, 2017 lúc 04:13 PM
-- Phiên bản máy phục vụ: 10.1.28-MariaDB
-- Phiên bản PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `travel4`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `reply_id` int(11) DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `plan_id`, `reply_id`, `message`, `created_at`, `updated_at`) VALUES
(3, 1, 12, NULL, 'Dep qua', NULL, NULL),
(5, 1, 12, 3, NULL, NULL, NULL),
(7, 1, 16, NULL, 'dep trau', NULL, NULL),
(8, 1, 16, 7, NULL, NULL, NULL),
(9, 1, 16, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `follows`
--

CREATE TABLE `follows` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `follow` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `follows`
--

INSERT INTO `follows` (`id`, `user_id`, `plan_id`, `follow`, `created_at`, `updated_at`) VALUES
(7, 3, 17, 1, NULL, NULL),
(8, 2, 17, 1, NULL, NULL),
(13, 1, 16, 1, NULL, NULL),
(14, 1, 18, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment_id` int(11) NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `comment_id`, `image_name`, `created_at`, `updated_at`) VALUES
(5, 3, '1509695894Lighthouse.jpg', NULL, NULL),
(6, 3, '1509695895Penguins.jpg', NULL, NULL),
(10, 5, '1509695963Jellyfish.jpg', NULL, NULL),
(11, 8, '1509980297Desert.jpg', NULL, NULL),
(12, 8, '1509980297Hydrangeas.jpg', NULL, NULL),
(13, 8, '1509980298Penguins.jpg', NULL, NULL),
(14, 8, '1509980298Tulips.jpg', NULL, NULL),
(15, 9, '1509980311Koala.jpg', NULL, NULL),
(16, 9, '1509980311Lighthouse.jpg', NULL, NULL),
(17, 9, '1509980311Penguins.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `joins`
--

CREATE TABLE `joins` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `join` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `joins`
--

INSERT INTO `joins` (`id`, `user_id`, `plan_id`, `join`, `created_at`, `updated_at`) VALUES
(6, 2, 17, 2, NULL, NULL),
(10, 1, 16, 1, NULL, NULL),
(11, 1, 18, 1, NULL, NULL);

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
(5, '2017_10_09_110504_create_maps_table', 1),
(9, '2014_10_12_000000_create_users_table', 2),
(10, '2017_10_09_110117_create_joins_table', 3),
(11, '2017_10_09_110216_create_plans_table', 3),
(12, '2017_10_09_110430_create_follows_table', 3),
(13, '2017_10_09_110549_create_comments_table', 3),
(14, '2017_10_09_110621_create_images_table', 3),
(15, '2017_11_01_143558_create_trips_table', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `plans`
--

CREATE TABLE `plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '1',
  `trip_id` int(11) NOT NULL,
  `src_lng` double NOT NULL,
  `src_lat` double NOT NULL,
  `src_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dest_lng` double NOT NULL,
  `dest_lat` double NOT NULL,
  `dest_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting_time` datetime NOT NULL,
  `ending_time` datetime NOT NULL,
  `vehicle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `plans`
--

INSERT INTO `plans` (`id`, `user_id`, `trip_id`, `src_lng`, `src_lat`, `src_name`, `dest_lng`, `dest_lat`, `dest_name`, `starting_time`, `ending_time`, `vehicle`, `activity`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, 0, '', 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', NULL, NULL),
(2, 1, 12, 105.80225372235873, 21.025354008683593, 'Láng Thượng, Đống Đa, Hà Nội, Vietnam', 105.7560424762778, 21.143046256798932, 'Yên Nhân, Tiền Phong, Mê Linh, Hà Nội, Vietnam', '2017-11-03 22:01:00', '2017-11-04 22:01:00', 'asdasd', 'asdasd', '2017-11-01 08:17:50', '2017-11-01 08:17:50'),
(3, 1, 12, 105.7560424762778, 21.143046256798932, 'Yên Nhân, Tiền Phong, Mê Linh, Hà Nội, Vietnam', 105.80225372235873, 21.025354008683593, 'Láng Thượng, Đống Đa, Hà Nội, Vietnam', '2017-11-05 22:02:00', '2017-11-06 22:02:00', 'asdasd', 'asdasdas', '2017-11-01 08:17:50', '2017-11-01 08:17:50'),
(4, 1, 14, 105.76510620012414, 21.04105596284647, 'Phú Diễn, Từ Liêm, Hà Nội, Vietnam', 105.81221007043496, 20.996958115954754, 'Chung cư số 4 Chính Kinh - Sapphire Place, 360 Xã Đàn, Thanh Xuân, Hà Nội, Vietnam', '2017-11-02 22:29:00', '2017-11-03 22:29:00', 'sdsdsd', '<br>', '2017-11-01 08:29:47', '2017-11-01 08:29:47'),
(5, 1, 14, 105.81221007043496, 20.996958115954754, 'Chung cư số 4 Chính Kinh - Sapphire Place, 360 Xã Đàn, Thanh Xuân, Hà Nội, Vietnam', 105.76510620012414, 21.04105596284647, 'Phú Diễn, Từ Liêm, Hà Nội, Vietnam', '2017-11-02 22:29:00', '2017-11-10 22:29:00', 'sss', '<br>', '2017-11-01 08:29:48', '2017-11-01 08:29:48'),
(6, 1, 15, 105.81138610839844, 21.025546284581797, 'Ngọc Khánh, Ba Đình, Hà Nội, Việt Nam', 105.88005065917969, 21.00631717395065, 'p. Long Biên, Long Biên, Hà Nội, Việt Nam', '2017-11-04 11:00:00', '2017-11-04 14:00:00', 'xe may', 'aaaaa', '2017-11-02 20:55:17', '2017-11-02 20:55:17'),
(7, 1, 15, 105.88005065917969, 21.00631717395065, 'p. Long Biên, Long Biên, Hà Nội, Việt Nam', 105.81138610839844, 21.025546284581797, 'Ngọc Khánh, Ba Đình, Hà Nội, Việt Nam', '2017-11-04 14:00:00', '2017-11-05 06:00:00', 'aaa', 'aaaaaa', '2017-11-02 20:55:17', '2017-11-02 20:55:17'),
(8, 1, 16, 105.7818603515625, 21.014329604681315, 'Mễ Trì Hạ, Mễ Trì, Từ Liêm, Hà Nội, Việt Nam', 105.83473205566406, 20.992855321748024, 'Phương Liệt, Thanh Xuân, Hà Nội, Việt Nam', '2017-11-03 15:00:00', '2017-11-03 17:00:00', 'aSÁ', 'DSAD', '2017-11-02 22:38:51', '2017-11-02 22:38:51'),
(9, 1, 16, 105.83473205566406, 20.992855321748024, 'Phương Liệt, Thanh Xuân, Hà Nội, Việt Nam', 105.7818603515625, 21.014329604681315, 'Mễ Trì Hạ, Mễ Trì, Từ Liêm, Hà Nội, Việt Nam', '2017-11-04 14:00:00', '2017-11-04 15:00:00', 'SADASDAS', 'DSADASD', '2017-11-02 22:38:51', '2017-11-02 22:38:51'),
(10, 1, 17, 105.79061508178711, 21.020418764184065, 'Yên Hoà, Cầu Giấy, Hà Nội, Việt Nam', 105.84468841552734, 20.99734274071184, 'Đồng Tâm, Hai Bà Trưng, Hà Nội, Việt Nam', '2017-11-05 16:00:00', '2017-11-05 17:00:00', 'aaa', 'aaa', '2017-11-03 00:46:43', '2017-11-03 00:46:43'),
(11, 1, 17, 105.84468841552734, 20.99734274071184, 'Đồng Tâm, Hai Bà Trưng, Hà Nội, Việt Nam', 105.79061508178711, 21.020418764184065, 'Yên Hoà, Cầu Giấy, Hà Nội, Việt Nam', '2017-11-07 15:00:00', '2017-11-07 16:00:00', 'aaa', 'aaa', '2017-11-03 00:46:44', '2017-11-03 00:46:44'),
(12, 1, 18, 105.82683563232422, 21.003432593548425, 'Khương Thượng, Đống Đa, Hà Nội, Việt Nam', 105.8477783203125, 20.987726677792814, 'Tương Mai, Hoàng Mai, Hà Nội, Việt Nam', '2017-11-10 19:00:00', '2017-11-10 20:00:00', 'xe may', 'aaa', '2017-11-03 02:15:02', '2017-11-03 02:15:02'),
(13, 1, 18, 105.8477783203125, 20.987726677792814, 'Tương Mai, Hoàng Mai, Hà Nội, Việt Nam', 105.84752082824707, 20.99445798686113, 'Trương Định, Hai Bà Trưng, Hà Nội, Việt Nam', '2017-11-11 08:00:00', '2017-11-11 10:00:00', 'aaa', 'aaa', '2017-11-03 02:15:02', '2017-11-03 02:15:02'),
(14, 1, 18, 105.84752082824707, 20.99445798686113, 'Trương Định, Hai Bà Trưng, Hà Nội, Việt Nam', 105.82683563232422, 21.003432593548425, 'Khương Thượng, Đống Đa, Hà Nội, Việt Nam', '2017-11-12 09:00:00', '2017-11-12 13:00:00', 'aaa', 'aaa', '2017-11-03 02:15:02', '2017-11-03 02:15:02'),
(15, 1, 19, 105.83344459533691, 20.996381162288483, 'Khương Mai, Thanh Xuân, Hà Nội, Việt Nam', 105.85704803466797, 20.974904297477746, 'Thịnh Liệt, Hoàng Mai, Hà Nội, Việt Nam', '2017-11-08 17:00:00', '2017-11-08 20:00:00', 'ss', 'ss', '2017-11-03 02:21:51', '2017-11-03 02:21:51'),
(16, 1, 19, 105.85704803466797, 20.974904297477746, 'Thịnh Liệt, Hoàng Mai, Hà Nội, Việt Nam', 105.83344459533691, 20.996381162288483, 'Khương Mai, Thanh Xuân, Hà Nội, Việt Nam', '2017-11-08 21:00:00', '2017-11-08 22:00:00', 'ss', 'ss', '2017-11-03 02:21:51', '2017-11-03 02:21:51'),
(17, 1, 20, 105.84657669067383, 21.019777811734844, 'Trần Hưng Đạo, Hoàn Kiếm, Hà Nội, Việt Nam', 105.8755874633789, 20.992855321748024, 'Vĩnh Hưng, Hoàng Mai, Hà Nội, Việt Nam', '2017-11-07 20:00:00', '2017-11-07 23:00:00', 'abcac', 'avc', '2017-11-06 07:57:03', '2017-11-06 07:57:03'),
(18, 1, 20, 105.8755874633789, 20.992855321748024, 'Vĩnh Hưng, Hoàng Mai, Hà Nội, Việt Nam', 105.83370208740234, 20.969133867372143, 'Hoàng Liệt, Hoàng Mai, Hà Nội, Việt Nam', '2017-11-08 05:00:00', '2017-11-08 07:00:00', 'cxz', 'xzc', '2017-11-06 07:57:03', '2017-11-06 07:57:03'),
(19, 1, 20, 105.83370208740234, 20.969133867372143, 'Hoàng Liệt, Hoàng Mai, Hà Nội, Việt Nam', 105.84657669067383, 21.019777811734844, 'Trần Hưng Đạo, Hoàn Kiếm, Hà Nội, Việt Nam', '2017-11-09 06:00:00', '2017-11-09 08:00:00', 'dfdfdf', 'fdfdfd', '2017-11-06 07:57:03', '2017-11-06 07:57:03'),
(20, 1, 21, 105.81567764282227, 21.019136856530395, '16 Láng Hạ, Thành Công, Ba Đình, Hà Nội, Việt Nam', 105.82477569580078, 20.97682772467435, 'Kim Văn, Đại Kim, Hoàng Mai, Hà Nội, Việt Nam', '2017-11-12 22:10:00', '2017-11-13 22:10:00', 'aaa', 'aaa', '2017-11-07 08:11:00', '2017-11-07 08:11:00'),
(21, 1, 21, 105.82477569580078, 20.97682772467435, 'Kim Văn, Đại Kim, Hoàng Mai, Hà Nội, Việt Nam', 105.81567764282227, 21.019136856530395, '16 Láng Hạ, Thành Công, Ba Đình, Hà Nội, Việt Nam', '2017-11-14 22:10:00', '2017-11-15 22:10:00', 'aaa', 'aaa', '2017-11-07 08:11:00', '2017-11-07 08:11:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trips`
--

CREATE TABLE `trips` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting_time` date NOT NULL,
  `ending_time` date NOT NULL,
  `cover` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_people` int(11) NOT NULL,
  `joined` int(11) NOT NULL,
  `followed` int(11) NOT NULL,
  `comments` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trips`
--

INSERT INTO `trips` (`id`, `name`, `owner_id`, `description`, `starting_time`, `ending_time`, `cover`, `status`, `max_people`, `joined`, `followed`, `comments`, `created_at`, `updated_at`) VALUES
(12, 'qweqwe', 1, 'aasddasd', '2017-11-02', '2017-11-11', 'image/cover/1508897635.jpg', '0', 0, 0, 0, 0, '2017-11-01 08:17:50', '2017-11-01 08:17:50'),
(14, 'ddd', 1, 'fdgdfggd', '2017-11-02', '2017-11-10', 'image/cover/1508897428.jpg', '0', 0, 0, 0, 0, '2017-11-01 08:29:47', '2017-11-01 08:29:47'),
(15, 'qwas', 1, 'aaaa', '2017-11-04', '2017-12-05', 'image/cover/1508897670.jpg\r\n', '0', 0, 0, 0, 0, '2017-11-02 20:55:17', '2017-11-02 20:55:17'),
(16, 'qfq', 2, 'DSADASDAS', '2017-11-03', '2017-11-06', 'image/cover/1508897785.jpg\r\n', '0', 10, 1, 1, 0, '2017-11-02 22:38:51', '2017-11-06 08:01:26'),
(17, 'Du Lich', 1, 'aaa', '2017-11-05', '2017-11-07', 'image/cover/1509698289.jpg', '0', 10, 1, 2, 0, '2017-11-03 00:46:43', '2017-11-03 01:38:09'),
(18, 'tao du lich', 3, 'du lich cung toi', '2017-11-10', '2017-11-12', 'image/cover/1509700501Lighthouse.jpg', '0', 10, 1, 1, 0, '2017-11-03 02:15:01', '2017-11-06 21:23:27'),
(19, 'Ok', 3, 'du lich', '2017-11-08', '2017-11-09', 'image/cover/1509700911Tulips.jpg', '0', 10, 1, 0, 0, '2017-11-03 02:21:51', '2017-11-03 02:21:51'),
(20, 'Dep trai', 1, 'bao gom 10 nguoi&nbsp;', '2017-11-07', '2017-11-09', 'image/cover/1509980222Koala.jpg', '0', 10, 1, 0, 0, '2017-11-06 07:57:03', '2017-11-06 07:57:03'),
(21, 'abv', 1, 'aa', '2017-11-11', '2017-11-16', 'image/cover/1510067460Lighthouse.jpg', '0', 10, 1, 0, 0, '2017-11-07 08:11:00', '2017-11-07 08:11:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` int(11) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `birthday`, `address`, `phone`, `avatar_image`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyen Duy Long', 1, '1996-11-17', 'Ha Noi', '0123456789', '1509682595.jpg', '123456', '$2y$10$2Yg2Y9CD0bdS9Tcyy9eBk.Ix6V7A62Nn8jmrNOgM8Tw1DWgyy0jLi', '9z9aawPYa4Kbh4313bB9PU3OcEpQzcToIJMW5XdmwUGe2Sxj3fPhXZIaKYii', '2017-11-01 07:44:00', '2017-11-02 22:27:12'),
(2, 'Nguyen Trung Son', 2, '1996-11-10', 'Ha Noi', '0123458695', '1509686872.jpg', '456789', '$2y$10$Nru9AoMQ8SyAYBOvdfEOMOKYJJfGLj50QeQdIfcMWwIvI9cnDrXa.', 'SBl0kGvgEMnusUpwa9vo3lcMhTtPKKGtpReCGWxtcHkXd5EBL9vEiUMIhYrr', '2017-11-01 11:56:10', '2017-11-02 22:28:31'),
(3, 'Nguyen Duy Linh', 1, '1999-11-10', 'Ha Noi', '0123456789', '1509696250.jpg', 'linhcvp', '$2y$10$mvQXfHzAtye17KXEMObgjOQJDrGe4J9SsJkKdOQ5a3c7lyWZ49k4K', '2xCrL8vyqnFUjqjiwzxOaak3WWHNQAoUfQanJ36hZmrujxi3IrWWmAryAvUO', '2017-11-03 01:02:25', '2017-11-03 02:11:51');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `joins`
--
ALTER TABLE `joins`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `follows`
--
ALTER TABLE `follows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `joins`
--
ALTER TABLE `joins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
