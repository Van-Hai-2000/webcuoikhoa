-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 03, 2021 lúc 11:08 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhaccu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand_title` text NOT NULL,
  `brand_mobile` varchar(10) NOT NULL,
  `brand_address1` varchar(300) NOT NULL,
  `brand_email` varchar(150) NOT NULL,
  `brand_image` text NOT NULL,
  `create_up` int(11) NOT NULL,
  `update_up` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `brand_title`, `brand_mobile`, `brand_address1`, `brand_email`, `brand_image`, `create_up`, `update_up`, `active`) VALUES
(1, 'Xuân Thủy', '0911307049', 'HÀ nội', 'admin@admin.com', 'dự án triệu đô1.png', 0, 1626579399, 1),
(2, 'Hải', '0911307049', 'Nghệ An', 'admin@admin.com', 'bg_contact.png', 1626579334, 1626947899, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `cate_id` int(11) NOT NULL,
  `create_up` int(11) NOT NULL,
  `update_up` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  `parent_id` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `cate_id`, `create_up`, `update_up`, `active`, `parent_id`) VALUES
(1, 'Rau', 1, 1627911342, 1627911342, 1, 0),
(2, 'Hoa', 1, 1627911354, 1627911354, 1, 0),
(3, 'Quả', 1, 1627912116, 1627912116, 1, 0),
(4, 'Củ', 1, 1627911405, 1627911405, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_detail`
--

CREATE TABLE `category_detail` (
  `id` int(11) NOT NULL,
  `cat_title` text NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  `create_up` int(11) NOT NULL,
  `update_up` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category_detail`
--

INSERT INTO `category_detail` (`id`, `cat_title`, `active`, `create_up`, `update_up`) VALUES
(1, 'Cấp 1', 1, 2172021, 2172021);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country` text NOT NULL,
  `code` varchar(10) NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  `create_up` int(11) NOT NULL,
  `update_up` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `countries`
--

INSERT INTO `countries` (`id`, `country`, `code`, `active`, `create_up`, `update_up`) VALUES
(1, 'Hà Nội', 'CT4', 1, 1626857008, 1626857008),
(2, 'Vinh', 'CT9999', 1, 1626864997, 1626864997),
(3, 'Hà Nam', 'CT9999', 1, 1626865043, 1626865043),
(4, 'Nam định', '?aw0??-?M', 1, 1626922756, 1626922756),
(5, 'Hải phòng', 'CT55495', 1, 1626923612, 1626923612),
(6, 'Nghệ An', 'CT2717920', 1, 1626925349, 1626925349);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1626493556),
('m130524_201442_init', 1626493679),
('m190124_110200_add_verification_token_column_to_user_table', 1626493679);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `vat_rate` decimal(5,2) NOT NULL,
  `vat` decimal(8,2) NOT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `status` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `description` text NOT NULL,
  `create_up` int(11) NOT NULL,
  `update_up` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_items`
--

CREATE TABLE `orders_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `price` int(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  `create_up` int(11) NOT NULL,
  `update_up` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_cat` int(11) NOT NULL,
  `product_band` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_img` text NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL,
  `create_up` int(11) NOT NULL,
  `update_up` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `product_cat`, `product_band`, `product_title`, `product_price`, `product_img`, `product_desc`, `product_keywords`, `create_up`, `update_up`, `active`) VALUES
(1, 1, 2, 'Rau muống', 10000, 'categories_img_03.jpg', '<p>Rau si&ecirc;u sạch</p>', 'SP1K91', 1627911503, 1627911503, 1),
(2, 1, 1, 'Rau cải', 15000, 'big-img-03.jpg', '<p>Rau sạch chất lượng cao</p>', 'SP3K360', 1627911927, 1627911927, 1),
(3, 1, 2, 'Rau  bắp cái', 12000, 'blog-img.jpg', '<p>Rau sạch lắm</p>', 'SP2K375', 1627912034, 1627912034, 1),
(4, 2, 1, 'Đu đủ', 18000, 'big-img-02.jpg', '<p>Quả ngọt</p>', 'SP4K900', 1627912131, 1627912131, 1),
(5, 3, 1, 'Quả xam', 14444, 'big-img-01.jpg', '<p>&agrave;đsầds</p>', 'SP1K794', 1627912154, 1627912154, 1),
(6, 1, 1, 'Quả cam', 120000, 'huong-dan-mua-hang-tra-gop-qua-the-tin-dung-khong-can-giay-to-tai-dien-may-xanh-2.png', '<p>dfđ&acirc;g</p>', 'SP2K210', 1628000377, 1628000377, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_detail`
--

CREATE TABLE `product_detail` (
  `id` int(11) NOT NULL,
  `pr_code` varchar(255) NOT NULL,
  `pr_image1` text NOT NULL,
  `pr_image2` text NOT NULL,
  `pr_image3` text NOT NULL,
  `pr_image4` text NOT NULL,
  `pr_desc` text NOT NULL,
  `create_up` int(11) NOT NULL,
  `update_up` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `active`) VALUES
(1, 'Đã giao hàng', 1),
(2, 'Đang giao hàng', 1),
(3, 'Hết hàng', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'mmrhai2000', '1maU1fEgaOQXwYIHC5jWLTX74zcdTBfb', '$2y$13$k5/DqmF0d8TgzUuFkDbV2.VVbOx2sjHDjVs24eLLAo7rR4YQ7aEay', NULL, 'mmrhai2000@gmail.com', 1, 1626493851, 1626493851, 'FPC342560-3QX9F0TXkpQrIPJadbEcrV_1626493851'),
(2, 'hai123456', 'aUw--vYqg1F-iexV2Y-V4cydeX91vYi8', '$2y$13$2S0N11BMaWxcdh119ndu4e7TieHdiX8ON4j8hWBLXGM1ChAxK2YqS', NULL, 'admin@admin.com', 10, 1626494011, 1626494011, 'mMnlgaLmn50Sk9kb9PjKn6whstoHw2Rn_1626494011');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lien_ket_01` (`cate_id`);

--
-- Chỉ mục cho bảng `category_detail`
--
ALTER TABLE `category_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lien_ket_07` (`status`);

--
-- Chỉ mục cho bảng `orders_items`
--
ALTER TABLE `orders_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lien_ket_08` (`order_id`),
  ADD KEY `lien_ket_09` (`product`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lien_ket_03` (`product_cat`),
  ADD KEY `lien_ket_04` (`product_band`);

--
-- Chỉ mục cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `category_detail`
--
ALTER TABLE `category_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders_items`
--
ALTER TABLE `orders_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `lien_ket_01` FOREIGN KEY (`cate_id`) REFERENCES `category_detail` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `lien_ket_07` FOREIGN KEY (`status`) REFERENCES `statuses` (`id`);

--
-- Các ràng buộc cho bảng `orders_items`
--
ALTER TABLE `orders_items`
  ADD CONSTRAINT `lien_ket_08` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `lien_ket_09` FOREIGN KEY (`product`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `lien_ket_03` FOREIGN KEY (`product_cat`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `lien_ket_04` FOREIGN KEY (`product_band`) REFERENCES `brands` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
