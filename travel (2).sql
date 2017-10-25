-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 25, 2017 lúc 04:22 AM
-- Phiên bản máy phục vụ: 10.1.26-MariaDB
-- Phiên bản PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `travel`
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
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `plan_id`, `reply_id`, `message`, `images`, `created_at`, `updated_at`) VALUES
(1, 1, 40, NULL, 'Đẹp quá', NULL, '2017-10-24 04:08:45', NULL),
(2, 4, 40, 1, 'Ừ đẹp thật', NULL, '2017-10-24 04:08:48', NULL),
(3, 3, 40, 1, 'Ừ đẹp thật mà', NULL, '2017-10-24 04:08:51', NULL),
(4, 4, 40, NULL, 'Tôi thấy bình thường', NULL, '2017-10-24 04:09:44', NULL),
(5, 2, 40, 4, 'Nói dối', NULL, '2017-10-24 04:09:40', NULL),
(6, 3, 40, 4, 'Tôi đi rồi đẹp mà', NULL, '2017-10-24 04:09:49', NULL),
(7, 2, 40, NULL, 'Mình sẽ tham gia', NULL, '2017-10-24 04:09:46', NULL),
(8, 2, 50, NULL, 'Nơi này đẹp quá !!', NULL, '2017-10-24 04:09:55', NULL),
(10, 1, 40, NULL, 'Các bạn tham gia vói mình nhé', NULL, '2017-10-24 04:09:52', NULL),
(11, 1, 40, 4, 'Bạn đi chưa mà biết', NULL, '2017-10-24 04:09:29', NULL),
(12, 1, 40, 7, 'Ok cám ơn bạn mình sẽ duyệt cho bạn', NULL, '2017-10-24 04:09:24', NULL),
(13, 1, 50, 8, 'Thật luôn hả bạn', NULL, '2017-10-24 04:09:21', NULL),
(14, 1, 51, NULL, 'JY&JU*J99i9', NULL, '2017-10-24 04:09:17', NULL),
(15, 1, 51, 14, 'sdasdasdasd', NULL, '2017-10-24 04:09:14', NULL),
(16, 1, 50, NULL, 'Minh se tham gia', NULL, '2017-10-24 04:09:10', NULL),
(17, 1, 50, 16, 'ừm', NULL, '2017-10-24 04:09:08', NULL),
(18, 1, 41, NULL, 'Các bạn tham gia vơi mình nhé', NULL, '2017-10-24 04:09:06', NULL),
(24, 1, 50, NULL, 'dsadsadsa', NULL, '2017-10-24 04:23:33', NULL),
(25, 1, 50, NULL, 'dsadsadsa', NULL, '2017-10-24 04:28:57', NULL),
(26, 1, 50, NULL, 'qqqq', NULL, '2017-10-24 04:29:39', NULL),
(27, 1, 50, NULL, 'aaa', NULL, '2017-10-24 04:30:31', NULL),
(28, 1, 50, 27, 'dsadsad', NULL, '2017-10-24 14:15:31', NULL),
(29, 1, 50, NULL, 'ok', NULL, '2017-10-24 14:17:13', NULL),
(31, 4, 50, 16, 'ok ne', NULL, '2017-10-24 14:22:26', NULL),
(32, 4, 50, 16, 'qqqqq', NULL, '2017-10-24 14:27:08', NULL),
(33, 4, 52, NULL, 'Dep trai', NULL, '2017-10-24 14:27:53', NULL),
(34, 4, 52, 33, 'khoai to', NULL, '2017-10-24 14:28:07', NULL),
(35, 4, 51, 14, 'that luon', NULL, '2017-10-24 14:33:42', NULL),
(36, 4, 51, NULL, 'dep lam cac ban a', NULL, '2017-10-24 14:34:00', NULL),
(37, 4, 40, 10, 'sss', NULL, '2017-10-25 01:34:50', NULL),
(38, 4, 40, NULL, 'đẹp', NULL, '2017-10-25 01:36:07', NULL),
(39, 4, 40, 38, 'qqq', NULL, '2017-10-25 01:42:52', NULL),
(40, 4, 49, NULL, 'hihi', NULL, '2017-10-25 01:43:25', NULL),
(41, 4, 49, 40, 'hihi', NULL, '2017-10-25 01:43:35', NULL);

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
(2, 2, 40, 1, NULL, NULL),
(3, 2, 41, 1, NULL, NULL),
(5, 1, 49, 1, NULL, NULL),
(6, 4, 49, 1, NULL, NULL),
(7, 4, 40, 1, NULL, NULL),
(8, 4, 41, 1, NULL, NULL),
(9, 3, 40, 1, NULL, NULL),
(10, 3, 41, 1, NULL, NULL),
(11, 3, 49, 1, NULL, NULL),
(12, 1, 50, 1, NULL, NULL),
(13, 4, 50, 1, NULL, NULL),
(14, 2, 50, 1, NULL, NULL),
(15, 3, 52, 1, NULL, NULL),
(16, 1, 51, 1, NULL, NULL),
(17, 4, 52, 1, NULL, NULL);

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
(1, 26, '1508819379Desert.jpg', NULL, NULL),
(2, 26, '1508819379Hydrangeas.jpg', NULL, NULL),
(3, 26, '1508819379Tulips.jpg', NULL, NULL),
(4, 27, '1508819431Jellyfish.jpg', NULL, NULL),
(5, 29, '1508854633Chrysanthemum - Copy.jpg', NULL, NULL),
(6, 29, '1508854633Desert.jpg', NULL, NULL),
(7, 29, '1508854633Hydrangeas - Copy.jpg', NULL, NULL),
(8, 32, '1508855228Desert - Copy.jpg', NULL, NULL),
(9, 32, '1508855228Hydrangeas - Copy.jpg', NULL, NULL),
(10, 32, '1508855228Koala - Copy (2).jpg', NULL, NULL),
(11, 33, '1508855273Hydrangeas - Copy.jpg', NULL, NULL),
(12, 33, '1508855273Koala - Copy.jpg', NULL, NULL),
(13, 34, '1508855287Chrysanthemum.jpg', NULL, NULL),
(14, 35, '1508855622Desert.jpg', NULL, NULL),
(15, 35, '1508855622Hydrangeas - Copy.jpg', NULL, NULL),
(16, 35, '1508855622Koala - Copy (2).jpg', NULL, NULL),
(17, 36, '1508855640Desert - Copy (2).jpg', NULL, NULL),
(18, 36, '1508855640Jellyfish.jpg', NULL, NULL),
(19, 37, '1508895290Desert.jpg', NULL, NULL),
(20, 37, '1508895291Hydrangeas - Copy.jpg', NULL, NULL),
(21, 38, '1508895367Jellyfish.jpg', NULL, NULL),
(22, 39, '1508895772Desert.jpg', NULL, NULL),
(23, 39, '1508895773Hydrangeas - Copy.jpg', NULL, NULL);

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
(3, 4, 49, 2, NULL, NULL),
(4, 4, 40, 2, NULL, NULL),
(5, 4, 41, 2, NULL, NULL),
(6, 3, 40, 2, NULL, NULL),
(7, 3, 41, 2, NULL, NULL),
(11, 4, 50, 2, NULL, NULL),
(12, 2, 41, 2, NULL, NULL),
(13, 3, 49, 1, NULL, NULL),
(14, 3, 52, 1, NULL, NULL),
(15, 1, 50, 1, NULL, NULL),
(16, 1, 51, 2, NULL, NULL),
(17, 4, 52, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `maps`
--

CREATE TABLE `maps` (
  `id` int(10) UNSIGNED NOT NULL,
  `plan_id` int(11) NOT NULL,
  `start_lat` double(8,2) NOT NULL,
  `start_lng` double(8,2) NOT NULL,
  `start_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_lat` double(8,2) NOT NULL,
  `end_lng` double(8,2) NOT NULL,
  `end_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  `activity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `move_vehicle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2017_10_09_110117_create_joins_table', 1),
(3, '2017_10_09_110216_create_plans_table', 1),
(4, '2017_10_09_110430_create_follows_table', 1),
(5, '2017_10_09_110504_create_maps_table', 1),
(6, '2017_10_09_110549_create_comments_table', 1),
(7, '2017_10_09_110621_create_images_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `plans`
--

CREATE TABLE `plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` date NOT NULL,
  `end_time` date NOT NULL,
  `status` int(11) NOT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_people` int(11) NOT NULL,
  `joined` int(11) NOT NULL,
  `followed` int(11) NOT NULL,
  `comments` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `plans`
--

INSERT INTO `plans` (`id`, `user_id`, `plan_name`, `start_time`, `end_time`, `status`, `cover_image`, `max_people`, `joined`, `followed`, `comments`, `created_at`, `updated_at`) VALUES
(40, 1, 'Du Lich Tam Đảo', '2017-10-26', '2017-10-30', 1, '1508897635.jpg', 10, 5, 3, 10, '2017-10-25 02:13:55', NULL),
(41, 1, 'Du Lich Hà Nội 3', '2017-10-28', '2017-10-29', 1, '1508897670.jpg', 15, 4, 3, 1, '2017-10-25 02:14:30', NULL),
(49, 2, 'Lên Sơn Tây 1', '2017-10-20', '2017-10-29', 1, '1508897785.jpg', 15, 2, 3, 0, '2017-10-25 02:16:26', NULL),
(50, 3, 'Du Lich Ba Vì', '2017-10-26', '2017-10-31', 1, '1508897878.jpg', 10, 1, 3, 7, '2017-10-25 02:17:58', NULL),
(51, 4, 'Du Lịch Hồ Núi Cốc', '2017-10-20', '2017-10-21', 1, '1508897428.jpg', 17, 2, 1, 2, '2017-10-25 02:10:42', NULL),
(52, 2, 'Du Lich Phúc Yên', '2017-10-20', '2017-10-21', 1, '1508897839.jpg', 5, 2, 2, 0, '2017-10-25 02:17:19', NULL);

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
  `avatar_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default.jpg',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `birthday`, `address`, `phone`, `avatar_image`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Duy Long', 1, '1996-10-31', 'Hà Nội', '01679042574', '1507821053.jpg', 'longcvp', '$2y$10$DkdvGruZyhtZM9pmWK63hum131QFXnf0fbN3UASaHaCTogpnPNC6i', '7ecdjbS7Tf94EjZ7iz6zyKJUi8zR3b4KVsvaSLGHydp170DNoB132UR2M1U8', '2017-10-09 05:28:36', '2017-10-12 08:11:13'),
(2, 'Nguyễn Văn Thiết', 1, '1995-03-11', 'Vĩnh Phúc', '0167904558', '1507810352.jpg', 'thietcvp', '$2y$10$8nsWEwOv93qmPSX.zE8R6.lf8ZPqriqfL3HwDM2Iqgrt7GIJfW5Z6', 'AZsSJ1gyc0P34hOg2Dso37qQeloyE4kXbDW3UUOzUnhKVWrL54lSao873qta', '2017-10-09 08:45:53', '2017-10-18 06:03:36'),
(3, 'Nguyễn Duy Điệp', 1, '1999-03-23', 'Vĩnh Phúc', '0165222333', '1508500468.jpg', 'diepyl1', '$2y$10$NYcBhAC9ShJHhGpMJBM1g.fFdhnu7fEWwYe6Bj.1ENTGPA8MnmD4G', 'RMAmqz5MrZ3CEwoxkYZyJfLSdxAntzexhDRmupyP7Us3t990G7Gl1ieosbWf', '2017-10-18 04:36:46', '2017-10-20 04:54:28'),
(4, 'Nguyễn Duy Nam', 1, '1995-10-29', 'Vĩnh Phúc', '0165222333', '1508667303.jpg', 'namcvp', '$2y$10$HSJ9MjrX1nUiugliF79Zmubf8RSM.r4qEWW0gtTVt2Rwal83Bvlwa', '8RcVbaXDrPn3hmgJQMPjPNH2BJgRzIZBYQUHViCbv5R6MhQe5vBonKIlXZEy', '2017-10-18 04:37:18', '2017-10-22 03:15:03');

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
-- Chỉ mục cho bảng `maps`
--
ALTER TABLE `maps`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `follows`
--
ALTER TABLE `follows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `joins`
--
ALTER TABLE `joins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `maps`
--
ALTER TABLE `maps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
