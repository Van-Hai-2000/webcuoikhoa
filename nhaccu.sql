-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: nhaccu
-- ------------------------------------------------------
-- Server version	10.4.17-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `nhaccu`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `nhaccu` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

USE `nhaccu`;

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners`
--

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` VALUES (1,'SHOP MIỀN BẮC','shopbac.jpg'),(2,'SHOP MIỀN TRUNG','shoptrung.jpg'),(3,'SHOP MIỀN NAM','shopnam.jpg');
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_title` text NOT NULL,
  `brand_mobile` varchar(10) NOT NULL,
  `brand_address1` varchar(300) NOT NULL,
  `brand_email` varchar(150) NOT NULL,
  `brand_image` text NOT NULL,
  `create_up` int(11) NOT NULL,
  `update_up` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'Xuân Thủy','0911307049','HÀ nội','admin@admin.com','dự án triệu đô1.png',0,1626579399,1),(2,'Hải','0911307049','Nghệ An','admin@admin.com','bg_contact.png',1626579334,1626947899,1);
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `cate_id` int(11) NOT NULL,
  `create_up` int(11) NOT NULL,
  `update_up` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  `parent_id` int(11) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `lien_ket_01` (`cate_id`),
  CONSTRAINT `lien_ket_01` FOREIGN KEY (`cate_id`) REFERENCES `category_detail` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Rau',1,1627911342,1627911342,1,0),(2,'Hoa',1,1627911354,1627911354,1,0),(3,'Quả',1,1627912116,1627912116,1,0),(4,'Củ',1,1627911405,1627911405,1,0);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_detail`
--

DROP TABLE IF EXISTS `category_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_title` text NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  `create_up` int(11) NOT NULL,
  `update_up` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_detail`
--

LOCK TABLES `category_detail` WRITE;
/*!40000 ALTER TABLE `category_detail` DISABLE KEYS */;
INSERT INTO `category_detail` VALUES (1,'Cấp 1',1,2172021,2172021);
/*!40000 ALTER TABLE `category_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` text NOT NULL,
  `code` varchar(10) NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  `create_up` int(11) NOT NULL,
  `update_up` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'Hà Nội','CT4',1,1626857008,1626857008),(2,'Vinh','CT9999',1,1626864997,1626864997),(3,'Hà Nam','CT9999',1,1626865043,1626865043),(4,'Nam định','?aw0??-?M',1,1626922756,1626922756),(5,'Hải phòng','CT55495',1,1626923612,1626923612),(6,'Nghệ An','CT2717920',1,1626925349,1626925349);
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1626493556),('m130524_201442_init',1626493679),('m190124_110200_add_verification_token_column_to_user_table',1626493679);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `new_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_up` int(11) NOT NULL,
  `update_up` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'Nho','big-img-01.jpg','Nho chủ yếu có nguồn gốc từ Trung Quốc có mẫu mã đẹp mắt nhưng chất lượng thì không được đảm bảo. Trên thị trường hiện nay thì nho Trung Quốc thường được gắn mác thành nho Mỹ, nho Việt Nam khiến cho người tiêu dùng hoang mang và lo lắng không biết cách lựa chọn chính xác.',0,0),(2,'Táo','big-img-01.jpg','Chắc hẳn bạn vẫn chưa quên mấy trang báo hiện nay đưa tin rất nhiều về vụ việc táo Trung Quốc có phản ứng dương tính với vi khuẩn Ecoli gây nên các bệnh tiêu chảy cấp, lạm dụng hóa chất bảo quản độc hại gây ảnh hưởng đến khả năng sinh sản và gây ung thư,..Vậy nên, các bạn cần phải tỉnh táo khi mua loại hoa quả này.',0,0),(3,'Lê\r\n','big-img-01.jpg','Các cơ quan chức năng đã kiểm tra một số mẫu lê nhập khẩu Trung Quốc có chứa hóa chất Endosulfan - một loại thuốc trừ sâu có độc tính cao gây vô sinh, phá vỡ nội tiết. Lê chính là hóa chất độc hại nhất hiện nay. Bạn lưu ý nhé lê Trung Quốc thường có vỏ nhẵn mịn, da căng sáng bóng, hình thức bắt mắt nhưng ruột lại bị thâm đen và lỗ chỗ như kim châm, vị nhạt chứ không thanh chua và dịu mát như lê Việt Nam.',0,0);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vat_rate` decimal(5,2) NOT NULL,
  `vat` decimal(8,2) NOT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `status` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `description` text NOT NULL,
  `create_up` int(11) NOT NULL,
  `update_up` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `lien_ket_07` (`status`),
  CONSTRAINT `lien_ket_07` FOREIGN KEY (`status`) REFERENCES `statuses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_items`
--

DROP TABLE IF EXISTS `orders_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `price` int(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  `create_up` int(11) NOT NULL,
  `update_up` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lien_ket_08` (`order_id`),
  KEY `lien_ket_09` (`product`),
  CONSTRAINT `lien_ket_08` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `lien_ket_09` FOREIGN KEY (`product`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_items`
--

LOCK TABLES `orders_items` WRITE;
/*!40000 ALTER TABLE `orders_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_detail`
--

DROP TABLE IF EXISTS `product_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pr_code` varchar(255) NOT NULL,
  `pr_image1` text NOT NULL,
  `pr_image2` text NOT NULL,
  `pr_image3` text NOT NULL,
  `pr_image4` text NOT NULL,
  `pr_desc` text NOT NULL,
  `create_up` int(11) NOT NULL,
  `update_up` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_detail`
--

LOCK TABLES `product_detail` WRITE;
/*!40000 ALTER TABLE `product_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_cat` int(11) NOT NULL,
  `product_band` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_img` text NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL,
  `create_up` int(11) NOT NULL,
  `update_up` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `lien_ket_03` (`product_cat`),
  KEY `lien_ket_04` (`product_band`),
  CONSTRAINT `lien_ket_03` FOREIGN KEY (`product_cat`) REFERENCES `categories` (`id`),
  CONSTRAINT `lien_ket_04` FOREIGN KEY (`product_band`) REFERENCES `brands` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,1,2,'Rau muống',10000,'categories_img_03.jpg','<p>Rau si&ecirc;u sạch</p>','SP1K91',1627911503,1627911503,1),(2,1,1,'Rau cải',15000,'big-img-03.jpg','<p>Rau sạch chất lượng cao</p>','SP3K360',1627911927,1627911927,1),(3,1,2,'Rau  bắp cái',12000,'blog-img.jpg','<p>Rau sạch lắm</p>','SP2K375',1627912034,1627912034,1),(4,2,1,'Đu đủ',18000,'big-img-02.jpg','<p>Quả ngọt</p>','SP4K900',1627912131,1627912131,1),(5,3,1,'Quả xam',14444,'big-img-01.jpg','<p>&agrave;đsầds</p>','SP1K794',1627912154,1627912154,1),(6,1,1,'Quả cam',120000,'huong-dan-mua-hang-tra-gop-qua-the-tin-dung-khong-can-giay-to-tai-dien-may-xanh-2.png','<p>dfđ&acirc;g</p>','SP2K210',1628000377,1628000377,1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_information`
--

DROP TABLE IF EXISTS `shop_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_mobile` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_facebook` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_gmail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_insta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_up` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_information`
--

LOCK TABLES `shop_information` WRITE;
/*!40000 ALTER TABLE `shop_information` DISABLE KEYS */;
INSERT INTO `shop_information` VALUES (1,'Hoa Qủa Tươi Ha Noi','shopbac.jpg','966666666','Vinh','https://www.facebook.com/dhai147','https://www.facebook.com/dhai147','https://www.facebook.com/dhai147',0);
/*!40000 ALTER TABLE `shop_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statuses`
--

LOCK TABLES `statuses` WRITE;
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
INSERT INTO `statuses` VALUES (1,'Đã giao hàng',1),(2,'Đang giao hàng',1),(3,'Hết hàng',1);
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'mmrhai2000','1maU1fEgaOQXwYIHC5jWLTX74zcdTBfb','$2y$13$k5/DqmF0d8TgzUuFkDbV2.VVbOx2sjHDjVs24eLLAo7rR4YQ7aEay',NULL,'mmrhai2000@gmail.com',1,1626493851,1626493851,'FPC342560-3QX9F0TXkpQrIPJadbEcrV_1626493851'),(2,'hai123456','aUw--vYqg1F-iexV2Y-V4cydeX91vYi8','$2y$13$2S0N11BMaWxcdh119ndu4e7TieHdiX8ON4j8hWBLXGM1ChAxK2YqS',NULL,'admin@admin.com',10,1626494011,1626494011,'mMnlgaLmn50Sk9kb9PjKn6whstoHw2Rn_1626494011');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-08-08  0:05:08
