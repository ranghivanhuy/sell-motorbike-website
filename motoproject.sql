-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 27, 2020 lúc 10:50 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `motoproject`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Xe Máy', 0, '2020-06-23 23:10:26', '2020-06-23 23:10:26', NULL),
(2, 'Xe Phân Khối Lớn', 0, '2020-06-23 23:10:39', '2020-06-23 23:10:39', NULL),
(3, 'Phụ Tùng', 0, '2020-06-23 23:10:48', '2020-06-23 23:10:48', NULL),
(4, 'Xe Honda 2018', 1, '2020-06-23 23:11:05', '2020-06-23 23:11:05', NULL),
(5, 'Xe Honda 2019', 1, '2020-06-23 23:11:16', '2020-06-23 23:11:16', NULL),
(6, 'Xe Honda 2020', 1, '2020-06-23 23:11:28', '2020-06-23 23:11:28', NULL),
(7, 'Xe 200 Phân Khối', 2, '2020-06-23 23:12:23', '2020-06-23 23:12:23', NULL),
(8, 'Xe 500 Phân Khối', 2, '2020-06-23 23:12:40', '2020-06-23 23:12:40', NULL),
(9, 'Xe 1000 Phân Khối', 2, '2020-06-23 23:13:06', '2020-06-23 23:13:06', NULL),
(10, 'Phụ Tùng Xe Máy', 3, '2020-06-23 23:13:18', '2020-06-23 23:13:18', NULL),
(11, 'Phụ Tùng Xe Phân Khối Lớn', 3, '2020-06-23 23:13:38', '2020-06-23 23:13:38', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `post_id` int(10) UNSIGNED DEFAULT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `contact`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Minh Quân', 'minhquan123@gmail.com', '0908909090', 'Giá xe moto 2020', 0, '2020-06-26 09:34:40', '2020-06-26 09:34:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_time` int(11) NOT NULL,
  `coupon_number` int(11) NOT NULL,
  `coupon_condition` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_code`, `coupon_time`, `coupon_number`, `coupon_condition`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'Giảm giá khai trương', 'MOTO2020', 10, 5, 1, '2020-06-24', '2020-07-24', '2020-06-24 00:22:12', '2020-06-24 00:25:22'),
(2, 'Giảm giá khách hàng thân thiết', 'VIP2020', 10, 15, 1, '2020-06-22', '2020-07-12', '2020-06-24 00:26:24', '2020-06-24 00:26:24'),
(3, 'Giảm giá ngày hội MOTO', 'TRUMMOTO', 1, 500000, 2, '2020-06-24', '2020-07-07', '2020-06-24 00:28:11', '2020-06-24 00:47:54');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_06_24_014724_create_categories_table', 1),
(4, '2020_06_24_014803_create_comments_table', 1),
(5, '2020_06_24_014820_create_contacts_table', 1),
(6, '2020_06_24_014839_create_coupons_table', 1),
(7, '2020_06_24_014917_create_orders_table', 1),
(8, '2020_06_24_015006_create_order_details_table', 1),
(9, '2020_06_24_015031_create_products_table', 1),
(10, '2020_06_24_024603_create_posts_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `order_total` int(11) NOT NULL,
  `status` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `name`, `user_id`, `coupon_id`, `date`, `order_total`, `status`, `address`, `phone`, `user_name`, `created_at`, `updated_at`) VALUES
(4, 'Thanh Tuấn', 1, 3, '2020-06-24', 41890000, '3', 'Duy Xuyên, Quảng Nam', 908909090, 'Thanh Tuấn', '2020-06-24 00:47:54', '2020-06-24 02:05:53'),
(5, 'Thanh Tuấn', 1, 0, '2020-06-24', 48000000, '1', 'Duy Xuyên, Quảng Nam', 908909090, 'Thanh Tuấn', '2020-06-24 02:14:17', '2020-06-27 08:17:50'),
(6, 'Thanh Tuấn', 1, 0, '2020-06-26', 45000000, '2', 'Duy Xuyên, Quảng Nam', 908909090, 'Thanh tun', '2020-06-26 05:33:27', '2020-06-26 05:43:35'),
(7, 'Đặng Trung', 3, 0, '2020-06-26', 105000000, '0', 'dangthanhtrung301@gmai.com', 908909090, 'Thanh Trung', '2020-06-26 09:51:53', '2020-06-26 09:51:53'),
(8, 'Đặng Trung', 3, 0, '2020-06-26', 110000000, '0', 'Thành Phố Huế', 908909090, 'Đặng Thành Trung', '2020-06-26 10:04:31', '2020-06-26 10:04:31'),
(9, 'Thu Hiền', 4, 0, '2020-06-27', 255000000, '0', 'Duy Xuyên, Quảng Nam', 908909090, 'Thu Hiền', '2020-06-27 08:11:24', '2020-06-27 08:11:24'),
(10, 'Phước Hưng', 5, 0, '2020-06-27', 48000000, '0', 'Duy Xuyên, Quảng Nam', 908909090, 'Phước Hưng', '2020-06-27 08:13:55', '2020-06-27 08:13:55'),
(11, 'Minh Quang', 6, 0, '2020-06-27', 37000000, '0', 'Cẩm Lệ, Đà Nẵng', 908909090, 'Minh Quang', '2020-06-27 08:17:04', '2020-06-27 08:17:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `product_id`, `order_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(4, 1, 4, 1, 42390000, '2020-06-24 00:47:54', '2020-06-24 00:47:54'),
(5, 3, 5, 1, 48000000, '2020-06-24 02:14:17', '2020-06-24 02:14:17'),
(6, 2, 6, 1, 45000000, '2020-06-26 05:33:27', '2020-06-26 05:33:27'),
(7, 5, 7, 1, 105000000, '2020-06-26 09:51:53', '2020-06-26 09:51:53'),
(8, 6, 8, 1, 110000000, '2020-06-26 10:04:31', '2020-06-26 10:04:31'),
(9, 5, 9, 2, 105000000, '2020-06-27 08:11:24', '2020-06-27 08:11:24'),
(10, 2, 9, 1, 45000000, '2020-06-27 08:11:25', '2020-06-27 08:11:25'),
(11, 3, 10, 1, 48000000, '2020-06-27 08:13:55', '2020-06-27 08:13:55'),
(12, 7, 11, 1, 37000000, '2020-06-27 08:17:04', '2020-06-27 08:17:04');

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
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Tin tức mới nhất', 'hì bất cứ sự vật nào cũng có hình thức bề ngoài của nó nhưng phép biện chứng duy vật chú ý chủ yếu đến hình thức bên trong của sự vật', 'Mẫu xe ga bản ch&iacute;nh h&atilde;ng&nbsp;thiết kế theo phong c&aacute;ch xế&nbsp;đua cổ điển, ph&aacute;t triển từ d&ograve;ng GTS, lắp động cơ 300 ph&acirc;n khối.<br />\r\nT&ecirc;n xe Vespa Sei Giorni&nbsp;(S&aacute;u ng&agrave;y), bắt nguồn&nbsp;từ cuộc đua&nbsp;&quot;International Six Days&quot; năm 1951,&nbsp;dịch ra tiếng Italy l&agrave; &quot;Sei Giorni Internazionale&quot;. Trước đ&oacute;, th&aacute;ng 6/2018, Vespa từng giới thiệu&nbsp;Sei Giorni&nbsp;tại Việt Nam gi&aacute; 199 triệu.<br />\r\nXe ga thể thao Sei Giorni II 2020. Ảnh:&nbsp;Vespa', '2020-06-26', '2020-06-26 05:27:08', '2020-06-26 05:27:08'),
(2, 'Top xe tay ga năm 2020 có thiết kế đẹp mạnh mẽ phù hợp nam giới', 'Những mẫu xe tay ga trên thị trường Việt Nam có thiết kế thể thao, cá tính cùng với đó là khối động cơ vô cùng mạnh mẽ đến từ những tên tuổi quen thuộc như Honda, Yamaha, Piaggio...', '<strong>Honda Air Blade 150 2020</strong><br />\r\n<br />\r\nMẫu Air Blade 2020 vừa được tung ra tr&ecirc;n thị trường với nhiều nhận định về sự thay đổi ở thiết kế, kh&ocirc;ng c&ograve;n c&oacute; kiểu d&aacute;ng trung t&iacute;nh m&agrave; g&oacute;c cạnh, trẻ trung v&agrave; gọn g&agrave;ng hơn.<br />\r\nB&ecirc;n cạnh đ&oacute; Air Blade 2020 c&ograve;n được trang bị th&ecirc;m động cơ 150 ph&acirc;n khối, hệ thống kh&oacute;a th&ocirc;ng minh, phanh ABS, cụm đ&egrave;n full LED, đồng hồ LCD&hellip;<br />\r\n<br />\r\n<img alt=\"\" src=\"/upload/post/images/tinxe1.jpg\" style=\"height:277px; width:400px\" /><br />\r\n<strong>Honda SH 2020</strong><br />\r\n<br />\r\nPhi&ecirc;n bản 2020 của Honda SH được thiết kế hiện đại, tổng thể xe kh&ocirc;ng thay đổi nhiều so với mẫu cũ, trừ d&aacute;ng vẻ c&oacute; phần &ldquo;đầy đặn&rdquo; hơn, tiện nghi hơn, trang bị an to&agrave;n v&agrave; ti&ecirc;n tiến c&ugrave;ng với khả năng vận h&agrave;nh đ&atilde; được cải thiện đ&aacute;ng kể.<br />\r\nHonda SH 2020 được trang bị hệ thống kh&oacute;a th&ocirc;ng minh Smartkey, hệ thống phanh ABS hoặc CBS truyền thống.<br />\r\n<br />\r\n<img alt=\"\" src=\"/upload/post/images/tinxe2.jpg\" style=\"height:312px; width:400px\" /><br />\r\n<strong>Yamaha NVX 2020</strong><br />\r\n<br />\r\nYamaha NVX với thiết kế thể thao mang tr&ecirc;n m&igrave;nh những c&ocirc;ng nghệ ti&ecirc;n tiến nhất của Yamaha như: C&ocirc;ng nghệ van biến thi&ecirc;n VVA, hệ thống phanh ABS, kh&oacute;a th&ocirc;ng minh Smartkey, tự động tắt mở động cơ Start-Stop system.<br />\r\nNVX hiện tại c&oacute; 2 phi&ecirc;n bản động cơ 125 v&agrave; 155cc, trong đ&oacute; phi&ecirc;n bản NVX 155 c&oacute; 3 sự lựa chọn gồm phanh ABS, kh&ocirc;ng ABS v&agrave; bản giới hạn camo c&oacute; ABS.<br />\r\n<br />\r\n<img alt=\"\" src=\"/upload/post/images/tinxe3.jpg\" style=\"height:330px; width:440px\" />', '2020-06-27', '2020-06-26 17:31:22', '2020-06-26 17:31:22'),
(3, 'Cập nhật bảng giá Honda SH 2020 mới nhất tháng 3/2020', '(VietQ.vn) - Bước sang tháng 3/2020 nhiều mẫu xe máy Honda đã có những thay đổi lớn về giá, đặc biệt là mẫu xe tay ga Honda SH 2020.', 'Với&nbsp;<em><strong>SH 2020</strong></em>, về tổng thể mẫu n&agrave;y vẫn giữ nguy&ecirc;n đường n&eacute;t thiết kế của c&aacute;c thế hệ trước với c&aacute;c n&acirc;ng cấp đủ tạo ra sự kh&aacute;c biệt. Đ&egrave;n pha được dời xuống ph&iacute;a dưới, hệ thống đ&egrave;n định vị ban ng&agrave;y lạ mắt.&nbsp;Honda SH mới cũng được trang bị kết nối th&ocirc;ng minh với Smartphone th&ocirc;ng qua Bluetooth v&agrave; c&oacute; th&ecirc;m cổng sạc điện thoại trong cốp đặt dưới y&ecirc;n xe. Ngo&agrave;i ra,&nbsp;Honda SH được trang bị ổ kh&oacute;a th&ocirc;ng minh với 2 thiết bị điều khiển FOB c&ugrave;ng n&uacute;m xoay khởi động.<br />\r\n<img alt=\"Cập nhật bảng giá Honda SH 2020 mới nhất tháng 6\" src=\"/upload/post/images/tintuc1.png\" style=\"height:493px; width:800px\" /><br />\r\nMột m&agrave;n h&igrave;nh nhỏ ở ph&iacute;a dưới th&ocirc;ng&nbsp;b&aacute;o&nbsp;qu&atilde;ng đường đ&atilde; di chuyển v&agrave; mức ti&ecirc;u hao nhi&ecirc;n liệu, ph&iacute;a 2 b&ecirc;n l&agrave; c&aacute;c đ&egrave;n b&aacute;o c&aacute;c chức năng như ABS, đ&egrave;n b&aacute;o rẽ, đ&egrave;n pha&hellip;<br />\r\nĐiểm nổi bật tr&ecirc;n<strong><em> SH 2020</em></strong> l&agrave; cụm đồng hồ dạng cơ quen thuộc đ&atilde; được thay đổi th&agrave;nh dạng m&agrave;n h&igrave;nh kỹ thuật số ho&agrave;n to&agrave;n dạng &acirc;m bản. Cụm đồng hồ được chia th&agrave;nh 4 phần kh&aacute;c nhau với vị tr&iacute; trung t&acirc;m hiển thị tốc độ, thời gian, t&igrave;nh trạng b&igrave;nh ắc-quy&hellip;<br />\r\nHonda SH 125i sử dụng động cơ xăng eSP+, phun xăng điện tử, với c&ocirc;ng suất 12,2 m&atilde; lực tại tua m&aacute;y 8.750 v&ograve;ng/ph&uacute;t v&agrave; m&ocirc;-men xoắn cực đại 11,6 Nm tại tua m&aacute;y 6.500 v&ograve;ng/ph&uacute;t.<br />\r\nBảng gi&aacute; xe SH cập nhật th&aacute;ng 3/2020:<br />\r\nGi&aacute; xe SH 125 phanh CBS 2020:&nbsp;70.990.000 đồng<br />\r\nGi&aacute; xe SH 125 phanh ABS&nbsp;2020:&nbsp;78.990.000&nbsp;đồng<br />\r\nGi&aacute; xe SH 150 phanh CBS&nbsp;2020:&nbsp;87.990.000&nbsp;đồng<br />\r\nGi&aacute; xe SH 150 phanh ABS&nbsp;2020:&nbsp;95.990.000&nbsp;đồng<br />\r\nGi&aacute; xe SH 300i 2020 phanh ABS (M&agrave;u Đỏ, Trắng):&nbsp;276.500.000&nbsp;đồng<br />\r\nGi&aacute; xe SH 300i 2020 phanh ABS (M&agrave;u X&aacute;m):&nbsp;279.000.000&nbsp;đồng<br />\r\nNgo&agrave;i mẫu xe Honda SH 2019 gi&aacute; vẫn cao ngất ngưởng v&igrave; ch&aacute;y h&agrave;ng v&agrave; kh&ocirc;ng được sản xuất nữa th&igrave; c&aacute;c mẫu xe ga c&ograve;n lại như SH 2020, Air Blade đều c&oacute; xu hướng giảm gi&aacute; khi bước sang thời điểm đầu th&aacute;ng 3 n&agrave;y. Một số mẫu xe ga kh&aacute;c của Honda như Lead, Vision hay SH Mode đều giữ gi&aacute; ổn định hoặc tăng nhẹ.', '2020-06-27', '2020-06-26 17:41:42', '2020-06-26 17:41:42'),
(4, 'Giá xe máy tăng đồng loạt, Honda SH 2019 đội giá kỷ lục', 'Dù đã ngưng sản xuất nhưng đến nay xe tay ga Honda SH 2019 vẫn được săn mua khiến mẫu xe này lên tới 55 triệu đồng tại các đại lý.', '<strong>SH đời cũ vẫn đội gi&aacute; kỷ lục</strong><br />\n<br />\nBước sang th&aacute;ng 6/2020, trong bối cảnh sức mua đ&atilde; dần tăng trưởng trở lại,&nbsp;thị trường xe m&aacute;y Việt&nbsp;cũng ghi nhận nhiều mẫu xe tăng gi&aacute; mạnh.<br />\nTrong số&nbsp;xe m&aacute;y&nbsp;được c&aacute;c đại l&yacute; điều chỉnh gi&aacute;, g&acirc;y ch&uacute; &yacute; nhất vẫn l&agrave; mẫu xe của Honda như SH, Vision, Air Blade&hellip; Trước đ&oacute; thời điểm th&aacute;ng 4 c&aacute;c đại l&yacute; phải đ&oacute;ng cửa v&igrave; c&aacute;ch ly x&atilde; hội, gi&aacute; những mẫu xe đ&atilde; được điều chỉnh giảm từ 500 ng&agrave;n đến 1 triệu đồng th&igrave; nay, gi&aacute; đ&atilde; tăng đ&aacute;ng kể.<br />\nTheo khảo s&aacute;t, mẫu xe SH 2020 tăng 800 ng&agrave;n đến 1 triệu đồng so với th&aacute;ng trước v&agrave; đang dao động 80-106 triệu đồng. Như vậy, hiện tại, SH 2020 đang cao hơn gi&aacute; đề xuất của h&atilde;ng từ 8-10 triệu đồng.<br />\n<br />\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img alt=\"\" src=\"/upload/post/images/tinxe4.jpg\" style=\"height:720px; width:960px\" /><br />\n<em>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Gi&aacute; xe m&aacute;y đồng loạt tăng, Honda SH 2020 ch&ecirc;nh tr&ecirc;n dưới 10 triệu đồng</em><br />\n<br />\nTrong khi đ&oacute;,&nbsp;Honda SH&nbsp;đời 2019 d&ugrave; đ&atilde; ngưng sản xuất nhưng vẫn đang tăng gi&aacute; mạnh tại c&aacute;c đại l&yacute; c&ograve;n h&agrave;ng.&nbsp; Hiện SH 2019 b&aacute;n ra phổ biến từ 100-145 triệu đồng. Trong đ&oacute;, đ&aacute;ng ch&uacute; &yacute;, Honda SH 150 ABS đen mờ 2019 tăng mạnh nhất, hiện c&oacute; gi&aacute; 1405 triệu đồng, tăng 12,5 triệu đồng so với th&aacute;ng trước v&agrave; ch&ecirc;nh gần 55 triệu so với gi&aacute; b&aacute;n đề xuất. Mức ch&ecirc;nh n&agrave;y được cho l&agrave; kỷ lục từ trước đến nay. &nbsp;<br />\nD&ograve;ng&nbsp;xe&nbsp;thấp hơn c&ugrave;ng h&atilde;ng l&agrave; Honda Vision đang tăng đột biến. Nếu như cuối th&aacute;ng 5 mẫu xe n&agrave;y cao hơn gi&aacute; đề xuất đến hơn 1 triệu đồng t&ugrave;y mẫu, m&agrave;u sắc xe. Th&igrave; nay, bước sang th&aacute;ng 6/2020, gi&aacute; xe ga b&igrave;nh d&acirc;n Honda Vision được ghi nhận c&oacute; sự tăng gi&aacute; mạnh với mức ch&ecirc;nh lệch so với đề xuất l&ecirc;n tới xấp xỉ 3 triệu đồng.&nbsp;C&aacute;c mẫu xe tay ga&nbsp;kh&aacute;c của Honda như Air Blade, Lead cũng tăng từ 500 ngh&igrave;n đến 1 triệu đồng so với th&aacute;ng trước.<br />\n<br />\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img alt=\"\" src=\"/upload/post/images/tinxe5.jpg\" style=\"height:638px; width:960px\" /><br />\n<em>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Gi&aacute; xe m&aacute;y đồng loạt tăng, Honda Vision cũng tăng gi&aacute; đột biến cao hơn gi&aacute; đề xuất đến 3 triệu đồng</em><br />\n<br />\nỞ ph&acirc;n kh&uacute;c xe số, c&aacute;c phi&ecirc;n bản của Wave Alpha đều tăng gi&aacute; từ 200.000-800.000 đồng. Trong khi đ&oacute; Wave RSX c&oacute; gi&aacute; đại l&yacute; ch&ecirc;nh cao hơn gi&aacute; đề xuất tới 1 triệu đồng.<br />\nD&ograve;ng xe 2020 Honda Future mới ra mắt c&oacute; gi&aacute; ch&ecirc;nh cao hơn mức đề xuất từ 300.000- 800.000 đồng.<br />\nC&ugrave;ng với đối thủ Honda, bước sang th&aacute;ng 6, Yamaha đang điều chỉnh tăng gi&aacute; Yamaha Exciter 150. Hiện tại c&aacute;c đại l&yacute; mẫu xe n&agrave;y đ&atilde; tăng th&ecirc;m 1 triệu đồng cho tất cả c&aacute;c phi&ecirc;n bản, dao động từ 47 - 49 triệu đồng. Tuy nhi&ecirc;n, c&aacute;c d&ograve;ng xe ga lại hưởng ưu đ&atilde;i như Yamaha Janus, Acruzo v&agrave; Grande đang được h&atilde;ng hạ xuống thấp hơn mức ni&ecirc;m yết từ 1 - 1,5 triệu đồng. &nbsp;Đ&aacute;ng ch&uacute; &yacute; l&agrave; Janus c&oacute; gi&aacute; b&aacute;n hợp l&yacute; dao động từ 27 - 31 triệu đồng sau khi điều chỉnh giảm.&nbsp; Sirius v&agrave; Jupiter c&oacute; gi&aacute; b&aacute;n thấp hơn với gi&aacute; ni&ecirc;m yết từ 300.000 - 500.000 đồng.&nbsp;<br />\n<br />\n<strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <em>&nbsp;Thanh Tuấn</em></strong><br />\n<br />\n&nbsp;', '2020-06-27', '2020-06-26 17:46:07', '2020-06-26 17:50:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `trend` tinyint(1) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `trend`, `description`, `price`, `category_id`, `image_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Xe Honda Airblade 2018', 16, 1, '- M&agrave;u : Đen V&agrave;ng Đồng<br />\r\n- Phi&ecirc;n Bản Ti&ecirc;u Chuẩn<br />\r\n- Dung T&iacute;ch Xăng : 4,4L<br />\r\n- C&ocirc;ng Suất Tối Đa : 8.500/ Ph&uacute;t<br />\r\n- Khối Lương : 111kg', 42390000, 4, '17ab2018.jpg', '2020-06-23 23:34:06', '2020-06-24 00:47:54', NULL),
(2, 'Xe Honde Ariblade 2019', 18, 0, '- M&agrave;u : Đen V&agrave;ng Đồng<br />\r\n- Phi&ecirc;n Bản Ti&ecirc;u Chuẩn<br />\r\n- Dung T&iacute;ch Xăng : 4,4L<br />\r\n- C&ocirc;ng Suất Tối Đa : 8.500/ Ph&uacute;t<br />\r\n- Khối Lương : 111kg', 45000000, 5, '10ab2019.jpg', '2020-06-23 23:40:33', '2020-06-27 08:11:25', NULL),
(3, 'Xe Honda Airblade 2020', 18, 0, '- M&agrave;u : Đen V&agrave;ng Đồng<br />\r\n- Phi&ecirc;n Bản Ti&ecirc;u Chuẩn<br />\r\n- Dung T&iacute;ch Xăng : 4,4L<br />\r\n- C&ocirc;ng Suất Tối Đa : 8.500/ Ph&uacute;t<br />\r\n- Khối Lương : 111kg', 48000000, 6, '55ab2020.jpg', '2020-06-23 23:42:55', '2020-06-27 08:13:55', NULL),
(4, 'Xe Honda SH 2018', 20, 0, '- M&agrave;u : Trắng Đen<br />\r\n- Phi&ecirc;n Bản Ti&ecirc;u Chuẩn<br />\r\n- Dung T&iacute;ch Xăng : 4,4L<br />\r\n- C&ocirc;ng Suất Tối Đa : 10.500/ Ph&uacute;t<br />\r\n- Khối Lương : 111kg', 90000000, 4, '87sh2018.png', '2020-06-23 23:44:29', '2020-06-23 23:44:29', NULL),
(5, 'Xe Honda SH 2019', 17, 1, '- M&agrave;u : Đỏ Đen<br />\r\n- Phi&ecirc;n Bản Ti&ecirc;u Chuẩn<br />\r\n- Dung T&iacute;ch Xăng : 4,4L<br />\r\n- C&ocirc;ng Suất Tối Đa : 10.500/ Ph&uacute;t<br />\r\n- Khối Lương : 130kg', 105000000, 5, '67sh2019.jpg', '2020-06-23 23:45:33', '2020-06-27 08:11:24', NULL),
(6, 'Xe Honda SH 2020', 19, 0, '- M&agrave;u : Đen&nbsp;<br />\r\n- Phi&ecirc;n Bản Ti&ecirc;u Chuẩn<br />\r\n- Dung T&iacute;ch Xăng : 4,4L<br />\r\n- C&ocirc;ng Suất Tối Đa : 10.500/ Ph&uacute;t<br />\r\n- Khối Lương : 130kg', 110000000, 6, '6sh2020.jpg', '2020-06-23 23:46:32', '2020-06-26 10:04:31', NULL),
(7, 'Xe Honda Winner 2018', 19, 1, '- M&agrave;u : Đen V&agrave;ng Đồng<br />\r\n- Phi&ecirc;n Bản Ti&ecirc;u Chuẩn<br />\r\n- Dung T&iacute;ch Xăng : 4,4L<br />\r\n- C&ocirc;ng Suất Tối Đa : 8.500/ Ph&uacute;t<br />\r\n- Khối Lương : 111kg', 37000000, 4, '36w2018.jpeg', '2020-06-23 23:50:35', '2020-06-27 08:17:04', NULL),
(8, 'Xe Honda Winner 2019', 20, 0, '- M&agrave;u : Đen V&agrave;ng Đồng<br />\r\n- Phi&ecirc;n Bản Ti&ecirc;u Chuẩn<br />\r\n- Dung T&iacute;ch Xăng : 4,4L<br />\r\n- C&ocirc;ng Suất Tối Đa : 8.500/ Ph&uacute;t<br />\r\n- Khối Lương : 111kg', 38000000, 5, '55w2019.jpg', '2020-06-23 23:51:08', '2020-06-23 23:51:08', NULL),
(9, 'Xe Honda Winner 2020', 20, 0, '- M&agrave;u : Đen V&agrave;ng Đồng<br />\r\n- Phi&ecirc;n Bản Ti&ecirc;u Chuẩn<br />\r\n- Dung T&iacute;ch Xăng : 4,4L<br />\r\n- C&ocirc;ng Suất Tối Đa : 8.500/ Ph&uacute;t<br />\r\n- Khối Lương : 111kg', 39000000, 6, '36w2020.jpg', '2020-06-23 23:51:44', '2020-06-23 23:51:44', NULL),
(10, 'Phụt Nhún Xe Máy', 11, 0, '- H&agrave;ng Xuất Khẩu<br />\r\n- Chất Lượng Cao<br />\r\n- Ph&ugrave; Hợp Với Nhiều Loại Xe M&aacute;y', 200000, 10, '19phutung-01.jpg', '2020-06-23 23:54:07', '2020-06-23 23:54:07', NULL),
(11, 'Ổ Bi Xe Máy', 11, 0, '- H&agrave;ng Xuất Khẩu<br />\r\n- Chất Lượng Cao<br />\r\n- Ph&ugrave; Hợp Với Nhiều Loại Xe M&aacute;y', 300000, 10, '58phutung1.jpg', '2020-06-23 23:55:32', '2020-06-23 23:55:32', NULL),
(12, 'Ổ Bi Xe Phân Khối Lớn', 11, 0, '- H&agrave;ng Xuất Khẩu<br />\r\n- Chất Lượng Cao<br />\r\n- Ph&ugrave; Hợp Với Nhiều Loại Xe M&aacute;y', 1000000, 11, '54phutung2.jpg', '2020-06-23 23:56:21', '2020-06-23 23:56:21', NULL),
(13, 'Nhông Xe Phân Khối Lớn', 20, 0, '- H&agrave;ng Xuất Khẩu<br />\r\n- Chất Lượng Cao<br />\r\n- Ph&ugrave; Hợp Với Nhiều Loại Xe M&aacute;y', 500000, 11, '55phutung4.jpg', '2020-06-23 23:57:11', '2020-06-23 23:57:11', NULL),
(14, 'Xe Kawasaki Z1000', 10, 1, '- B&igrave;nh Xăng cỡ lớn<br />\r\n- Động Cơ 1043 Ph&acirc;n Khối<br />\r\n- Xilanh thẳng h&agrave;ng<br />\r\n- L&agrave;m m&aacute;t bằng dung dịch<br />\r\n- C&ocirc;ng suất 142 M&atilde; Lực', 700000000, 9, '3pic9.jpg', '2020-06-24 00:07:11', '2020-06-24 00:07:11', NULL),
(15, 'Xe BMW S1000RR', 10, 0, '- B&igrave;nh Xăng cỡ lớn<br />\r\n- Động Cơ 999 Ph&acirc;n Khối<br />\r\n- Xilanh thẳng h&agrave;ng<br />\r\n- L&agrave;m m&aacute;t bằng dung dịch<br />\r\n- C&ocirc;ng suất 142 M&atilde; Lực', 500000000, 8, '80pic22.jpg', '2020-06-24 00:09:57', '2020-06-24 00:09:57', NULL),
(16, 'Xe Kawasaki Z800', 10, 1, '- B&igrave;nh Xăng cỡ lớn<br />\r\n- Động Cơ&nbsp; 430 Ph&acirc;n Khối<br />\r\n- Xilanh thẳng h&agrave;ng<br />\r\n- L&agrave;m m&aacute;t bằng dung dịch<br />\r\n- C&ocirc;ng suất 142 M&atilde; Lực', 380000000, 7, '91t-pic20.jpg', '2020-06-24 00:10:56', '2020-06-24 00:10:56', NULL),
(17, 'Xe Harley Davidson 750', 10, 0, '- B&igrave;nh Xăng cỡ lớn<br />\r\n- Động Cơ 750 Ph&acirc;n Khối<br />\r\n- Xilanh thẳng h&agrave;ng<br />\r\n- L&agrave;m m&aacute;t bằng dung dịch<br />\r\n- C&ocirc;ng suất 142 M&atilde; Lực', 650000000, 8, '27pic2.jpg', '2020-06-24 00:11:59', '2020-06-24 00:11:59', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `phone`, `role`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Thanh Tuấn', 'thanhtuan24031997.lhp@gmail.com', '$2y$10$gKZe946oSGy.3Pi9snncGe40JgEZeXc9P0IF485Jzvwn.c/iX9nb.', 'Duy Xuyên, Quảng Nam', '09090909', '1', NULL, 'K403X2V06netlM8a8bIly8JVjnW25a4MzTH6eRCb0xDlwSlky53P6665ST2z', '2020-06-23 23:05:26', '2020-06-23 23:05:26'),
(2, 'Đạt', 'ledatdx97@gmail.com', '$2y$10$u.GdKHPIBJA5EEtucGouJeKEuuQ6f6ET1lNAizKNGRLukGavjowB2', 'Nam Phước, Quảng Nam', '0908909090', '0', NULL, NULL, '2020-06-23 23:06:56', '2020-06-23 23:06:56'),
(3, 'Đặng Trung', 'dangthanhtrung301@gmail.com', '$2y$10$x7XzyJiwPfK/yKT/.lmuNew0e788taj.vzr6RcbMEY3zIxjxi1Ize', 'Thành Phố Huế', '0908909090', '0', NULL, NULL, '2020-06-26 09:50:34', '2020-06-26 09:50:34'),
(4, 'Thu Hiền', 'thuhien10597@gmail.com', '$2y$10$b2LyzCra2FTUJ7JmlbvPju7ziiLuh.nKv8u5dhyHShgGn0c40CEI6', 'Duy Xuyên, Quảng Nam', '0908909090', '0', NULL, NULL, '2020-06-27 08:10:34', '2020-06-27 08:10:34'),
(5, 'Phước Hưng', 'hungphuoc310@gmail.com', '$2y$10$Z8Kzl22XbAN.IWpG3oxLU.HbmHQkXFQV7uApOdwHuy56TTvHAeUdC', 'Duy Xuyên, Quảng Nam', '0908909090', '0', NULL, NULL, '2020-06-27 08:13:00', '2020-06-27 08:13:00'),
(6, 'Minh Quang', 'minhquang230398@gmail.com', '$2y$10$ZfIdr2pyjVh1YVWuh0YJM.xRFgocpWyj9gB3UNM5DVVrCR3tnL5hi', 'Cẩm Lệ, Đà Nẵng', '0908909090', '0', NULL, NULL, '2020-06-27 08:16:32', '2020-06-27 08:16:32');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
