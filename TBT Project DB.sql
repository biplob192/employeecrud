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
  `ad_position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
  `payment_status` tinyint(1) NOT NULL DEFAULT '0',
  `publishing_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `ads` */

insert  into `ads`(`id`,`correspondent_name`,`ad_type`,`ad_position`,`rate`,`extra_charge`,`division`,`district`,`upazila`,`client`,`gd_no`,`order_no`,`inch`,`colum`,`total_size`,`amount`,`payment_status`,`publishing_date`,`created_at`,`updated_at`) values 
(1,'Biplob Mia','Govt','Front Page',560,300,'Dhaka','Kurigram','Chilmari','LGED','346/21',512,1,1,1,860,0,'30 June 2021','2021-06-22 08:20:08','2021-07-12 15:55:28'),
(2,'Manjurul Shajib','Commercial','Back Page',700,5000,'Rangpur','Kurigram','Ulipur','Private','347/21',231,2,5,10,12000,0,'29 June 2021','2021-06-22 08:22:38','2021-07-10 16:48:48'),
(4,'Mehedi Hasan','Govt','Front Page',560,0,'Dinajpur','Dinajpur','Dinajpur','Personal','349/21',111,15,5,75,42000,0,'28 June 2021','2021-06-22 18:45:12','2021-07-10 16:48:46'),
(6,'Billal Hossain','Govt','Front Page',560,0,'Rangpur','Kurigram','Chilmari','PA','348/21',222,10,5,50,28000,0,'27 June 2021','2021-06-23 18:39:01','2021-07-10 16:48:43'),
(7,'Faruq Miah','Govt','Front Page',560,500,'Rangpur','Kurigram','Ulipur','PA','351/21',334,10,5,50,28500,0,'30 June 2021','2021-06-24 00:43:04','2021-07-10 16:46:37'),
(8,'Didarul Haque','Govt','Front Page',560,0,'Rangpur','Dinajpur','Dinajpur Sdr','Police Line','350/21',333,10,5,50,28000,0,'30 June 2021','2021-06-25 21:12:18','2021-07-10 16:48:40'),
(9,'Hamidul Islam','Govt','Front Page',560,0,'Rangpur','Kurigram','Kurigram Sdr','LGED','345/21',322,10,5,50,28000,0,'28 June 2021','2021-06-25 22:49:07','2021-07-10 16:47:12'),
(10,'Tarikul Islam','Govt','Inner Page',538,500,'Dhaka','Dhaka','Dhaka','RAB','344/21',444,15,5,75,40850,1,'28 June 2021','2021-06-25 22:52:48','2021-07-13 16:53:58'),
(11,'Sabbir Khan','Govt','Back Page',550,0,'ww','ww','ww','ee','343/21',33,10,5,50,27500,0,'15 June 2021','2021-06-25 23:08:52','2021-07-04 02:14:08'),
(12,'Abdullah','Govt','Front Page',560,400,'Abdullah','Abdullah','Abdullah','Abdullah','342/21',222,2,1,2,1520,0,'01 July 2021','2021-06-28 16:49:50','2021-07-10 16:47:15'),
(13,'SSS','Govt','Front Page',560,100,'SSS','SSS','SSS','SSS','341/21',33,5,2,10,5700,0,'29 June 2021','2021-06-28 17:26:55','2021-07-10 16:47:18'),
(14,'Badsha','Govt','Front Page',560,0,'Rangpur','Rangpur','Rangpur','LGED','340/21',111,12,5,60,33600,0,'30 June 2021','2021-06-28 17:27:40','2021-07-10 15:55:50');

/*Table structure for table `ads_price` */

DROP TABLE IF EXISTS `ads_price`;

CREATE TABLE `ads_price` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ads_type` enum('Govt','Private','Commercial') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ads_position` enum('Front Page','Back Page','Inner Page','Inner_Color') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `extra_charge` int DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ads_price` */

insert  into `ads_price`(`id`,`ads_type`,`ads_position`,`price`,`extra_charge`,`status`,`created_at`,`updated_at`) values 
(1,'Govt','Front Page',560,NULL,1,'2021-06-28 16:40:33','2021-06-28 22:38:04'),
(2,'Govt','Back Page',550,NULL,1,'2021-06-28 16:46:38','2021-06-28 22:38:42'),
(3,'Govt','Inner Page',538,NULL,1,'2021-06-28 16:46:44','2021-06-28 16:46:44'),
(4,'Govt','Inner_Color',540,NULL,1,'2021-06-28 16:46:48','2021-06-28 18:33:28'),
(5,'Private','Front Page',580,NULL,1,'2021-06-28 16:47:04','2021-06-28 16:47:04'),
(6,'Private','Back Page',580,NULL,1,'2021-06-28 16:47:12','2021-06-28 16:47:12'),
(7,'Private','Inner Page',580,NULL,1,'2021-06-28 16:47:18','2021-06-28 16:47:18'),
(8,'Private','Inner_Color',580,NULL,1,'2021-06-28 16:47:26','2021-06-28 16:47:26'),
(9,'Commercial','Front Page',700,NULL,1,'2021-06-28 16:47:53','2021-06-28 16:47:53'),
(10,'Commercial','Back Page',700,NULL,1,'2021-06-28 16:48:00','2021-06-28 16:48:00'),
(11,'Commercial','Inner Page',700,NULL,1,'2021-06-28 16:48:05','2021-06-28 16:48:05'),
(12,'Commercial','Inner_Color',700,NULL,1,'2021-06-28 16:48:11','2021-06-28 16:48:11');

/*Table structure for table `cheques` */

DROP TABLE IF EXISTS `cheques`;

CREATE TABLE `cheques` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `gd_no` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `bank_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cheque_amount` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `cheques` */

insert  into `cheques`(`id`,`gd_no`,`bank_name`,`cheque_amount`,`created_at`,`updated_at`) values 
(16,'344/21','sfdfd',49000,'2021-07-13 16:53:58','2021-07-13 16:53:58');

/*Table structure for table `correspondents` */

DROP TABLE IF EXISTS `correspondents`;

CREATE TABLE `correspondents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `division` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `upazila` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `nid` int NOT NULL,
  `corrid` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `appointed_date` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `correspondents` */

insert  into `correspondents`(`id`,`name`,`division`,`district`,`upazila`,`mobile`,`nid`,`corrid`,`email`,`appointed_date`,`image`,`created_at`,`updated_at`) values 
(1,'Mamun','Chattogram','Noakhali','Noakhali','01930384330',445566,445566,'ddfff@gmail.com','14 April 2021','Biplob.jpg','2021-06-25 16:22:46','2021-06-27 20:24:12'),
(3,'Harunor Rashid','Rangpur','Kurigram','Ulipur','01725361208',45000980,45000980,'name@gmail.com','02 May 2017','Biplob.jpg','2021-06-26 14:02:08','2021-06-27 20:15:12'),
(4,'Shiraj Khan','Dhaka','Madaripur','Madaripur','776000980',776000980,776000980,'dot@gmail.com','10 May 2016',NULL,'2021-06-26 14:09:03','2021-06-27 19:55:21'),
(5,'Nijam Mollah','Dhaka','Madaripur','Madaripur','01725361209',77600,77600,'fds@test.com','01 June 2021',NULL,'2021-06-26 14:10:06','2021-06-27 20:19:35'),
(6,'Bikrom Pathan','Sylhet','Habiganj','Habiganj','01725361210',33244,33244,'drt@tr.com','03 June 2021',NULL,'2021-06-26 14:10:37','2021-06-27 20:19:44'),
(7,'Masum Billah',NULL,'Mymensingh','Mymensingh','01788033900',8033900,8033900,'name@mail.com','02 June 2021',NULL,'2021-06-27 20:04:56','2021-06-27 20:04:56'),
(8,'Nijam Uddin',NULL,'Natore','Natore','01725361211',36120,36120,'nijam@gmail.com','02 June 2021',NULL,'2021-06-27 20:10:00','2021-06-27 20:19:49');

/*Table structure for table `division_list` */

DROP TABLE IF EXISTS `division_list`;

CREATE TABLE `division_list` (
  `division_id` int NOT NULL AUTO_INCREMENT,
  `division_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`division_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `division_list` */

insert  into `division_list`(`division_id`,`division_name`) values 
(1,''),
(2,''),
(3,''),
(4,''),
(5,''),
(6,''),
(7,''),
(8,'');

/*Table structure for table `employees` */

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fathers_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `upazila` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` int NOT NULL,
  `emp_id` int NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appointed_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `employees` */

insert  into `employees`(`id`,`name`,`fathers_name`,`district`,`upazila`,`mobile`,`email`,`nid`,`emp_id`,`section`,`designation`,`appointed_date`,`image`,`created_at`,`updated_at`) values 
(3,'Shajib Dud','Father','Kurigram','Ulipur','1930384220','SS@Email.com',897660,33567,'Fathersection','IT Manager','01 June 2021','1624645138.jpg','2021-06-19 06:37:57','2021-06-27 16:21:48'),
(4,'Moniruzzaman Manik','Hasan Mahmud','Kurigram','Chilmari','1725361208','mail@gmail.com',2222,33333,'IT','Manager','01 June 2021','1624789616.jpg','2021-06-19 06:41:52','2021-06-27 16:26:57'),
(5,'Jobaer Alam','Father\'s Name','Nilphamari','Nilphamari','01625361208','mail@gmail.com',77088022,0,'Author','Chairman & Editor','01 January 2013','1624790124.JPG','2021-06-19 08:48:07','2021-06-28 22:32:38'),
(6,'Shagor','Abdul Majed','Khulna','Khulna Shadar','907768','md@gmail.com',99800007,0,'News','News Editor','07 June 2021','1624790174.jpg','2021-06-19 08:49:26','2021-06-27 16:36:15'),
(7,'Rashedul','Milon','Nilphamari','Nilphamari Shadar','900654','mail@gmail.com',3339088,0,'IT','IT Executive','03 June 2021','1624790235.jpg','2021-06-19 08:52:42','2021-06-27 16:37:16'),
(8,'Riazul Haque','Abdul Majed','Khulna','Khulna Shadar','1725361208','md@gmail.com',77088022,0,'News','Sub Editor','01 June 2021','1624807582.jpg','2021-06-19 08:54:10','2021-06-27 21:26:22'),
(9,'Biplob Mia','Full Mia','Kurigram','Chilmari','01825361208','biplob@gmail.com',77088022,77088022,'IT','IT Executive','01 June 2021','1624652038.jpg','2021-06-19 08:55:00','2021-06-28 13:12:03'),
(10,'Shahid','Abdul Majed','Nilphamari','Nilphamari Shadar','90073332','md@gmail.com',99870,0,'News','News Editor','2010-10-08','1624806473.jpg','2021-06-19 17:23:05','2021-06-27 21:07:53'),
(11,'Shahid','Full Mia','Kurigram','Kurigram Shadar','334222','md@gmail.com',9987023,0,NULL,'News Editor','2012-01-26','1624825271.jpg','2021-06-19 17:26:36','2021-06-28 02:21:11'),
(12,'Fazly Rabbi','Amzad Shekh','Khulna','Khulna Shadar','01625361202','mail@test.com',999000777,0,NULL,'News Editor','2015-10-01','1624825248.JPG','2021-06-21 18:09:18','2021-06-28 22:36:36'),
(14,'Biju Shekh','Bayjid Shekh','Kurigram','Kurigram','1725361213','biju@gmail.com',444,555555,'Marketing','AGM','07 May 2014','1624825221.jpg','2021-06-25 23:27:48','2021-06-28 13:13:08'),
(15,'Mahmud Hossain','Mahammod Mirza','Nilphamari','Nilphamari','1925361208','rrr@gmail.com',444,444,'News','Editor','01 June 2021','1624788947.jpg','2021-06-25 23:57:05','2021-06-28 12:53:25');

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
