/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 8.0.25 : Database - employee
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`employee` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `employee`;

/*Table structure for table `ads` */

DROP TABLE IF EXISTS `ads`;

CREATE TABLE `ads` (
  `id` int NOT NULL AUTO_INCREMENT,
  `correspondent_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ad_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `rate` int NOT NULL,
  `extra_charge` int NOT NULL,
  `division` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `upazila` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `client` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `gd_no` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `order_no` int NOT NULL,
  `inch` int NOT NULL,
  `colum` int NOT NULL,
  `total_size` int NOT NULL,
  `amount` float NOT NULL,
  `payment_status` binary(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `ads` */

insert  into `ads`(`id`,`correspondent_name`,`ad_type`,`rate`,`extra_charge`,`division`,`district`,`upazila`,`client`,`gd_no`,`order_no`,`inch`,`colum`,`total_size`,`amount`,`payment_status`,`created_at`,`updated_at`) values 
(1,'Biplob','Govt',538,0,'Rangpur','Kurigram','Chilmari','LGED','346/21',512,10,4,40,20488,'1','2021-06-22 08:20:08','2021-06-23 08:51:47'),
(2,'Shajib','Private',0,5000,'Rangpur','Kurigram','Ulipur','Private','347/21',231,10,5,50,50500,'1','2021-06-22 08:22:38','2021-06-24 00:44:47'),
(3,'Shobuj','Govt',500,0,'Rangpur','Rangpur Shadar','Rangpur Shadar','LGED','348/21',234,10,5,50,25000,'1','2021-06-22 08:28:19','2021-06-22 18:40:35'),
(4,'Mehedi Hasan','Private',0,0,'Dinajpur','Dinajpur','Dinajpur','Personal','349/21',111,15,5,75,25500,'1','2021-06-22 18:45:12','2021-06-22 18:45:12'),
(6,'Biplob','govt',600,0,'Rangpur','Kurigram','Chilmari','PA','111',222,10,5,50,30000,'1','2021-06-23 18:39:01','2021-06-23 18:39:01'),
(7,'FFF','govt',538,500,'Rangpur','Kurigram','Ulipur','PA','1122',334,10,5,50,27400,'1','2021-06-24 00:43:04','2021-06-24 00:43:04');

/*Table structure for table `ads_price` */

DROP TABLE IF EXISTS `ads_price`;

CREATE TABLE `ads_price` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ads_type` enum('govt','private','commercial') COLLATE utf8mb4_unicode_ci NOT NULL,
  `ads_position` enum('front','back','inner','inner_color') COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `extra_charge` int DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ads_price` */

insert  into `ads_price`(`id`,`ads_type`,`ads_position`,`price`,`extra_charge`,`status`,`created_at`,`updated_at`) values 
(1,'govt','front',538,NULL,1,'2021-06-24 02:32:20','2021-06-24 02:32:20'),
(2,'govt','back',538,NULL,1,'2021-06-24 02:32:44','2021-06-24 02:32:44'),
(3,'govt','inner',50,NULL,1,'2021-06-24 02:32:51','2021-06-24 11:51:58'),
(4,'govt','inner_color',53,NULL,1,'2021-06-24 02:33:02','2021-06-24 11:52:10'),
(5,'private','front',500,NULL,1,'2021-06-24 02:33:18','2021-06-24 02:33:18'),
(6,'private','back',450,NULL,1,'2021-06-24 02:33:27','2021-06-24 02:33:27'),
(7,'private','inner',400,NULL,1,'2021-06-24 02:33:35','2021-06-24 02:33:35'),
(8,'private','inner_color',800,NULL,1,'2021-06-24 02:33:41','2021-06-24 12:28:36'),
(9,'commercial','front',700,NULL,1,'2021-06-24 02:33:47','2021-06-24 02:33:47'),
(10,'commercial','back',650,NULL,1,'2021-06-24 02:33:54','2021-06-24 02:33:54'),
(11,'commercial','inner',600,NULL,1,'2021-06-24 02:34:01','2021-06-24 02:34:01'),
(13,'commercial','inner_color',680,NULL,1,'2021-06-24 12:17:31','2021-06-24 12:17:51');

/*Table structure for table `correspondents` */

DROP TABLE IF EXISTS `correspondents`;

CREATE TABLE `correspondents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `upazila` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `nid` int NOT NULL,
  `corid` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `correspondents` */

/*Table structure for table `employees` */

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fathers_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `upazila` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `employees` */

insert  into `employees`(`id`,`name`,`fathers_name`,`district`,`upazila`,`mobile`,`email`,`nid`,`image`,`created_at`,`updated_at`,`section`,`designation`,`joining_date`) values 
(3,'Shajib','Father','Kurigram','Ulipur',9900880,'Email',897660,'Image','2021-06-19 06:37:57','2021-06-19 06:49:00',NULL,NULL,NULL),
(4,'Hasan','Father','Kurigram','Chilmari',990943,'mail@gmail.com',344443,'Image','2021-06-19 06:41:52','2021-06-19 06:49:37',NULL,NULL,NULL),
(5,'Shahid','Father','Barishal','Barishal Shadar',2111211,'mail@gmail.com',77088022,'Image','2021-06-19 08:48:07','2021-06-19 08:48:07',NULL,NULL,NULL),
(6,'Shagor','Abdul Majed','Khulna','Khulna Shadar',907768,'md@gmail.com',99800007,'Nai','2021-06-19 08:49:26','2021-06-19 08:49:26',NULL,NULL,NULL),
(7,'Rashedul','Milon','Nilphamari','Nilphamari Shadar',900654,'mail@gmail.com',3339088,'Image','2021-06-19 08:52:42','2021-06-19 08:52:42',NULL,NULL,NULL),
(8,'Riazul Haque','Abdul Majed','Khulna','Khulna Shadar',17253633,'md@gmail.com',77088022,'Image','2021-06-19 08:54:10','2021-06-19 08:54:10',NULL,NULL,NULL),
(9,'Biplob Mia','Full Mia','Kurigram','Chilmari',1725361208,'biplob@gmail.com',77088022,'Image','2021-06-19 08:55:00','2021-06-19 08:55:00',NULL,NULL,NULL),
(10,'Shahid','Abdul Majed','Nilphamari','Nilphamari Shadar',90073332,'md@gmail.com',99870,'Image','2021-06-19 17:23:05','2021-06-19 17:23:05',NULL,NULL,'2010-10-08'),
(11,'Shahid','Full Mia','Kurigram','Kurigram Shadar',334222,'md@gmail.com',9987023,'Img','2021-06-19 17:26:36','2021-06-19 17:26:36',NULL,NULL,'2012-01-26'),
(12,'Fazly Rabbi','Amzad Shekh','Khulna','Khulna Shadar',8897000,'mail@test.com',999000777,'koi','2021-06-21 18:09:18','2021-06-21 18:09:18',NULL,NULL,'2015-10-01');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `members` */

DROP TABLE IF EXISTS `members`;

CREATE TABLE `members` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `members` */

insert  into `members`(`id`,`name`,`mobile`,`district`,`created_at`,`updated_at`) values 
(1,'Abdul Karim','1733398742','Nilphamari','2021-06-18 16:18:18','2021-06-18 16:18:18'),
(2,'Azizul Haque','1790898740','Borguna','2021-06-18 16:18:18','2021-06-18 16:18:18'),
(3,'Baker Khan','134','Dinajpur','2021-06-18 16:18:18','2021-06-18 16:18:18'),
(5,'Gautam Shekh','444','Bhola','2021-06-18 16:18:18','2021-06-18 16:18:18'),
(6,'Md Biplob Mia','1208','Kurigram','2021-06-18 16:18:18','2021-06-18 16:18:18'),
(7,'Taluqder Shekh','2626','Nilphamari','2021-06-18 16:18:18','2021-06-18 16:18:18'),
(8,'Zunayed','123','Chattogram','2021-06-18 16:18:18','2021-06-18 16:18:18'),
(9,'Anwar Hossain','111','Rangpur','2021-06-18 16:18:18','2021-06-18 16:18:18'),
(10,'Abu Mussa','589609','Bogura','2021-06-18 16:18:18','2021-06-18 16:18:18'),
(11,'Shajib','909090','Barishal','2021-06-18 16:18:18','2021-06-18 16:18:18'),
(13,'Muskaq Hossain','33555','Sylhet','2021-06-18 16:18:18','2021-06-18 16:18:18'),
(14,'Abu Mustak Miraz','98075','B Baria','2021-06-18 16:18:18','2021-06-18 16:18:18'),
(15,'Millat Mirza','90908765','Madaripur','2021-06-18 16:18:18','2021-06-18 16:18:18'),
(16,'Md Manik','87600','Nilphamari','2021-06-18 16:18:18','2021-06-18 16:18:18'),
(17,'Hamid','1733398','Comilla','2021-06-18 16:18:18','2021-06-18 16:18:18'),
(18,'Riaz','87690','Khulna','2021-06-18 16:18:18','2021-06-18 16:18:18'),
(21,'AAA','2342','Nai','2021-06-18 16:18:18','2021-06-18 16:18:18'),
(23,'Naaa','01725361208','Dff','2021-06-18 21:31:58','2021-06-18 21:31:58');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2021_06_13_090319_create_employees_table',1),
(5,'2021_06_23_174037_create_ads_price_table',2);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `reporters` */

DROP TABLE IF EXISTS `reporters`;

CREATE TABLE `reporters` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `reporters` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`dob`,`created_at`,`updated_at`) values 
(1,'Biplob','biplob@gmail.com',NULL,'$2y$10$m1.7QDdouwV9qkBfwnmhuuT9VRxqrVvqw4OJoUeNB26ebjqtRSrZi',NULL,'2021-06-23','2021-06-18 16:29:42','2021-06-18 17:16:06'),
(2,'Shajib','shajib@gmail.com',NULL,'$2y$10$PDRGQh.s.phrSiBfQFfna.X4.jru5RSySB7xA.ZOYDwd8O5hDWihu',NULL,NULL,'2021-06-18 16:30:43','2021-06-18 16:30:43');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
