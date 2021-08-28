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
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `correspondent_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `correspondent_id` smallint unsigned NOT NULL DEFAULT '0',
  `ad_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ad_position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rate` smallint unsigned NOT NULL,
  `extra_charge` smallint unsigned NOT NULL,
  `division_id` tinyint unsigned NOT NULL,
  `district_id` tinyint unsigned NOT NULL,
  `upazila_id` smallint unsigned NOT NULL,
  `client` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `gd_no` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `order_no` int unsigned NOT NULL,
  `inch` tinyint unsigned NOT NULL,
  `colum` tinyint unsigned NOT NULL,
  `total_size` smallint unsigned NOT NULL,
  `amount` float unsigned NOT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT '0',
  `publishing_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `ads` */

insert  into `ads`(`id`,`correspondent_name`,`correspondent_id`,`ad_type`,`ad_position`,`rate`,`extra_charge`,`division_id`,`district_id`,`upazila_id`,`client`,`gd_no`,`order_no`,`inch`,`colum`,`total_size`,`amount`,`payment_status`,`publishing_date`,`created_at`,`updated_at`) values 
(1,'MD BIPLOB MIA',1,'Private','Front Page',580,0,7,55,416,'Somaj Seba','234',22,21,7,147,85260,0,'08 July 2021','2021-07-31 12:57:33','2021-08-12 02:50:30'),
(3,'MD BIPLOB MIA',1,'Private','Back Page',580,0,7,55,416,'Personal','666',21,11,9,99,57420,0,'18 August 2021','2021-08-01 21:20:09','2021-08-17 00:05:42'),
(4,'JASHIM UDDIN',10,'Govt','Inner Page',538,0,6,48,366,'LGED','243',16,12,10,120,64560,1,'26 August 2021','2021-08-01 22:48:40','2021-08-03 19:38:32'),
(5,'MD BIPLOB MIA',1,'Govt','Back Page',550,0,7,55,416,'Health','222',12,14,8,112,61600,1,'18 August 2021','2021-08-03 15:58:41','2021-08-21 00:42:32'),
(6,'MD BIPLOB MIA',1,'Private','Front Page',580,0,7,55,423,'Personal','400',10,15,6,90,52200,0,'12 August 2021','2021-08-03 18:06:47','2021-08-20 23:07:24'),
(7,'SHAJIB',2,'Private','Back Page',580,0,7,55,423,'Personal','100',100,10,6,60,34800,0,'16 August 2021','2021-08-04 01:30:03','2021-08-14 02:58:17'),
(8,'HAMIDUL BADSHAH',13,'Private','Front Page',580,0,6,45,329,'Personal','199',200,8,8,64,37120,1,'20 August 2021','2021-08-10 15:52:55','2021-08-11 00:22:18'),
(9,'SHEKHOR BOSU',14,'Govt','Front Page',480,0,4,37,278,'RAB','211',222,5,4,20,9600,1,'15 August 2021','2021-08-13 15:12:42','2021-08-17 00:13:54'),
(10,'SHAJIB',2,'Govt','Front Page',480,280,7,55,423,'LGED','188',188,10,6,60,29080,1,'19 August 2021','2021-08-14 00:40:01','2021-08-20 23:18:18'),
(11,'ROKONUJJAMAN',15,'Govt','Back Page',550,235,7,55,416,'RAB','555',555,10,4,40,22235,0,'30 August 2021','2021-08-20 01:40:40','2021-08-20 22:51:29'),
(12,'MAMUN',4,'Private','Inner_Color',580,342,7,53,397,'Personal','567',567,12,4,48,28182,0,'25 August 2021','2021-08-23 17:02:18','2021-08-23 17:02:18'),
(13,'HASIBUL',6,'Govt','Front Page',680,3500,3,21,494,'WASA','233',233,18,8,144,101420,0,'26 August 2021','2021-08-23 18:27:22','2021-08-23 18:27:22');

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
(1,'Govt','Front Page',680,NULL,1,'2021-06-28 16:40:33','2021-08-20 01:39:42'),
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
  `cheque_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `correspondent_id` smallint unsigned NOT NULL DEFAULT '0',
  `gd_no` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `bank_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cheque_amount` float unsigned NOT NULL DEFAULT '0',
  `cheque_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `ait_amount` float unsigned NOT NULL DEFAULT '0',
  `commission` float unsigned NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cheque_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `cheques` */

insert  into `cheques`(`cheque_id`,`correspondent_id`,`gd_no`,`bank_name`,`cheque_amount`,`cheque_number`,`ait_amount`,`commission`,`deleted_at`,`created_at`,`updated_at`) values 
(3,10,'243','Sonali Bank',64270,'2220980',290,19281,NULL,'2021-08-03 19:38:32','2021-08-03 19:38:32'),
(16,13,'199','Sonali Bak',37120,'37120',0,11136,NULL,'2021-08-11 00:22:18','2021-08-11 00:22:18'),
(17,1,'400','Sonali',50200,'5220022',2000,15060,'2021-08-20 23:07:24','2021-08-12 02:57:47','2021-08-20 23:07:24'),
(18,14,'211','SIBL',9000,'5559800',600,2700,NULL,'2021-08-13 15:18:03','2021-08-13 15:18:03'),
(19,15,'555','Sonali Bank',20000,'555444',2235,6000,'2021-08-20 22:51:29','2021-08-20 01:52:26','2021-08-20 22:51:29'),
(20,2,'188','DBBL',27080,'290802',2000,8124,NULL,'2021-08-20 23:18:18','2021-08-20 23:18:18'),
(21,1,'222','DBBL',59600,'596596',2000,17880,NULL,'2021-08-21 00:42:32','2021-08-21 00:42:32');

/*Table structure for table `commissions` */

DROP TABLE IF EXISTS `commissions`;

CREATE TABLE `commissions` (
  `commission_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `correspondent` smallint unsigned NOT NULL,
  `previous_amount` decimal(8,2) unsigned DEFAULT NULL,
  `commission_amount` decimal(8,2) unsigned DEFAULT NULL,
  `current_amount` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`commission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `commissions` */

insert  into `commissions`(`commission_id`,`correspondent`,`previous_amount`,`commission_amount`,`current_amount`,`created_at`,`updated_at`) values 
(2,12,NULL,750.00,NULL,'2021-08-12 00:25:10','2021-08-12 00:25:10'),
(3,9,NULL,751.00,NULL,'2021-08-12 00:25:52','2021-08-12 00:25:52'),
(4,13,NULL,7000.00,NULL,'2021-08-12 00:38:46','2021-08-12 00:38:46'),
(5,13,NULL,270.00,NULL,'2021-08-12 00:40:11','2021-08-12 00:40:11'),
(6,1,NULL,1500.00,NULL,'2021-08-12 13:52:30','2021-08-12 13:52:30'),
(7,1,NULL,300.00,NULL,'2021-08-13 02:43:27','2021-08-13 02:43:27'),
(8,9,NULL,1010.00,NULL,'2021-08-13 02:49:16','2021-08-13 02:49:16'),
(9,14,NULL,700.00,NULL,'2021-08-13 15:20:32','2021-08-13 15:20:32'),
(10,1,NULL,150.00,NULL,'2021-08-18 02:28:50','2021-08-18 02:28:50'),
(11,6,NULL,1200.00,NULL,'2021-08-19 05:58:27','2021-08-19 05:58:27'),
(12,15,NULL,6500.00,NULL,'2021-08-20 01:55:41','2021-08-20 01:55:41'),
(13,2,35444.00,580.00,34864.00,'2021-08-21 14:32:42','2021-08-21 14:32:42');

/*Table structure for table `corr_wallets` */

DROP TABLE IF EXISTS `corr_wallets`;

CREATE TABLE `corr_wallets` (
  `wallet_id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `corr_id` smallint unsigned DEFAULT NULL,
  `credit` float unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`wallet_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `corr_wallets` */

insert  into `corr_wallets`(`wallet_id`,`corr_id`,`credit`,`created_at`,`updated_at`) values 
(2,9,26310,'2021-08-01 17:04:35','2021-08-13 02:49:16'),
(3,10,19281,'2021-08-01 22:12:19','2021-08-03 19:38:32'),
(4,11,27320,'2021-08-01 22:18:02','2021-08-13 02:15:56'),
(5,1,40861,'2021-08-01 23:21:34','2021-08-21 00:42:32'),
(6,12,17350,'2021-08-05 00:04:35','2021-08-13 02:16:32'),
(7,13,20002,'2021-08-10 15:47:52','2021-08-12 00:40:11'),
(8,2,34864,'2021-08-12 00:45:28','2021-08-21 14:32:42'),
(9,6,41120,'2021-08-12 00:45:35','2021-08-19 05:58:27'),
(11,14,7000,'2021-08-13 15:07:08','2021-08-13 15:20:32'),
(12,15,23500,'2021-08-20 01:30:34','2021-08-20 22:51:29');

/*Table structure for table `correspondents` */

DROP TABLE IF EXISTS `correspondents`;

CREATE TABLE `correspondents` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `division_id` tinyint unsigned DEFAULT NULL,
  `district_id` tinyint unsigned NOT NULL,
  `upazila_id` smallint unsigned NOT NULL,
  `mobile` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `nid` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `corrid` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `appointed_date` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `correspondents` */

insert  into `correspondents`(`id`,`name`,`division_id`,`district_id`,`upazila_id`,`mobile`,`nid`,`corrid`,`email`,`appointed_date`,`image`,`created_at`,`updated_at`) values 
(1,'MD BIPLOB MIA',7,55,416,'01725361208','5361208',5361,'biplob.net2@gmail.com','02 April 2014',NULL,'2021-07-30 21:40:01','2021-08-15 15:20:07'),
(2,'SHAJIB',7,55,423,'01725361209','725361209',7255,'shajib@gmail.com','28 June 2021',NULL,'2021-07-30 22:11:37','2021-08-04 01:28:35'),
(3,'SIRAJ',3,20,161,'01725341209','725341209',72531,'siraj@gmail.com','27 June 2021',NULL,'2021-07-30 23:33:44','2021-07-30 23:33:44'),
(4,'MAMUN',7,53,397,'01735361109','35361109',3536,'mamun@gmail.com','27 June 2021',NULL,'2021-07-31 01:24:16','2021-07-31 01:24:16'),
(5,'HASANUR',4,31,239,'01762448910','762448910',8910,'hasanur@gmail.com','05 January 2021','Eid UL Adha Greetings 2021-01.png','2021-08-01 01:37:58','2021-08-01 01:37:58'),
(6,'HASIBUL',3,21,169,'01727331209','27331209',273,'hasibul@mail.com','15 June 2021',NULL,'2021-08-01 13:31:26','2021-08-01 13:31:26'),
(7,'HASANUR RAHMAN',6,50,369,'01788980010','8980010',8980,'hasan@mail.com','01 August 2021',NULL,'2021-08-01 13:39:44','2021-08-01 13:39:44'),
(9,'MASUM BILLAH',2,9,61,'01788229908','88229908',8822,'masum@gmail.com','02 February 2017',NULL,'2021-08-01 17:04:35','2021-08-01 17:04:35'),
(10,'JASHIM UDDIN',6,48,366,'01388908902','8908902',8908,'jashim@gmail.com','09 May 2013',NULL,'2021-08-01 22:12:19','2021-08-01 22:14:34'),
(11,'HAMIDUL KHAN',1,3,17,'01988092209','988092209',9880,'hamidul@gmail.com','28 June 2021',NULL,'2021-08-01 22:18:02','2021-08-01 22:18:02'),
(12,'AZAM KHAN',3,30,230,'01722090955','22090955',2209,'azam@gmail.com','30 May 2021',NULL,'2021-08-05 00:04:35','2021-08-05 00:04:35'),
(13,'HAMIDUL BADSHAH',6,45,329,'01939384220','39384220',3938,'badsshah@gmail.com','04 February 2015',NULL,'2021-08-10 15:47:52','2021-08-10 15:47:52'),
(14,'SHEKHOR BOSU',4,37,278,'01725676766','1725676767',172567,'bosu@gmail.com','10 August 2021',NULL,'2021-08-13 15:07:08','2021-08-13 15:08:08'),
(15,'ROKONUJJAMAN',7,55,416,'01898990909','98990909',9899,'rokunur@gmail.com','01 March 2021',NULL,'2021-08-20 01:30:34','2021-08-20 01:30:34');

/*Table structure for table `district_list` */

DROP TABLE IF EXISTS `district_list`;

CREATE TABLE `district_list` (
  `district_id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `district_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `division_id` tinyint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `district_list` */

insert  into `district_list`(`district_id`,`district_name`,`division_id`,`created_at`,`updated_at`) values 
(1,'Barguna',1,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(2,'Barisal',1,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(3,'Bhola',1,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(4,'Jhalokati',1,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(5,'Patuakhali',1,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(6,'Pirojpur',1,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(7,'Bandarban',2,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(8,'Brahmanbaria',2,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(9,'Chandpur',2,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(10,'Chattogram',2,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(11,'Cox\'s Bazar',2,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(12,'Cumilla',2,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(13,'Feni',2,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(14,'Khagrachhari',2,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(15,'Lakshmipur',2,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(16,'Noakhali',2,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(17,'Rangamati',2,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(18,'Dhaka',3,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(19,'Faridpur',3,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(20,'Gazipur',3,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(21,'Gopalganj',3,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(22,'Kishoreganj',3,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(23,'Madaripur',3,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(24,'Manikganj',3,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(25,'Munshiganj',3,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(26,'Narayanganj',3,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(27,'Narsingdi',3,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(28,'Rajbari',3,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(29,'Shariatpur',3,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(30,'Tangail',3,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(31,'Bagerhat',4,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(32,'Chuadanga',4,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(33,'Jessore',4,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(34,'Jhenaidah',4,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(35,'Khulna',4,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(36,'Kushtia',4,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(37,'Magura',4,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(38,'Meherpur',4,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(39,'Narail',4,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(40,'Satkhira',4,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(41,'Jamalpur',5,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(42,'Mymensingh',5,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(43,'Netrakona',5,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(44,'Sherpur',5,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(45,'Bogura',6,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(46,'Joypurhat',6,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(47,'Naogaon',6,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(48,'Natore',6,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(49,'Nawabganj',6,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(50,'Pabna',6,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(51,'Rajshahi',6,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(52,'Sirajganj',6,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(53,'Dinajpur',7,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(54,'Gaibandha',7,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(55,'Kurigram',7,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(56,'Lalmonirhat',7,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(57,'Nilphamari',7,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(58,'Panchagarh',7,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(59,'Rangpur',7,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(60,'Thakurgaon',7,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(61,'Habiganj',8,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(62,'Moulvibazar',8,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(63,'Sunamganj',8,'2021-07-13 20:08:55','2021-07-13 20:08:55'),
(64,'Sylhet',8,'2021-07-13 20:08:55','2021-07-13 20:08:55');

/*Table structure for table `division_list` */

DROP TABLE IF EXISTS `division_list`;

CREATE TABLE `division_list` (
  `division_id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `division_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`division_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `division_list` */

insert  into `division_list`(`division_id`,`division_name`,`created_at`,`updated_at`) values 
(1,'Barisal','2021-07-13 22:12:30','2021-07-31 12:00:06'),
(2,'Chattogram','2021-07-13 22:12:30','2021-07-31 12:00:10'),
(3,'Dhaka','2021-07-13 22:12:30','2021-07-31 11:58:11'),
(4,'Khulna','2021-07-13 22:12:30','2021-07-31 11:59:58'),
(5,'Mymensingh','2021-07-13 22:12:30','2021-07-31 12:00:22'),
(6,'Rajshahi','2021-07-13 22:12:30','2021-07-31 12:00:26'),
(7,'Rangpur','2021-07-13 22:12:30','2021-07-31 01:13:42'),
(8,'Sylhet','2021-07-13 22:12:30','2021-07-31 12:00:30');

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
(6,'Shagor','Abdul Majed','Khulna','Khulna Shadar','01999090988','md@gmail.com',99800007,0,'News','News Editor','07 June 2021','1624790174.jpg','2021-06-19 08:49:26','2021-08-17 03:26:10'),
(7,'Rashedul','Milon','Nilphamari','Nilphamari Shadar','01788090021','mail@gmail.com',3339088,0,'IT','IT Executive','03 June 2021','1624790235.jpg','2021-06-19 08:52:42','2021-08-17 03:25:47'),
(8,'Riazul Haque','Abdul Majed','Khulna','Khulna Shadar','1725361208','md@gmail.com',77088022,0,'News','Sub Editor','01 June 2021','1624807582.jpg','2021-06-19 08:54:10','2021-06-27 21:26:22'),
(9,'Biplob Mia','Full Mia','Kurigram','Chilmari','01825361208','biplob@gmail.com',77088022,77088022,'IT','IT Executive','01 June 2021','1624652038.jpg','2021-06-19 08:55:00','2021-06-28 13:12:03'),
(10,'Shahid','Abdul Majed','Nilphamari','Nilphamari Shadar','01999090989','md@gmail.com',99870,0,'News','News Editor','2010-10-08','1624806473.jpg','2021-06-19 17:23:05','2021-08-17 03:26:39'),
(11,'Shahid Hasu','Full Mia','Kurigram','Kurigram Shadar','01300909033','md@gmail.com',9987023,0,NULL,'News Editor','2012-01-26','1624825271.jpg','2021-06-19 17:26:36','2021-08-17 03:50:10'),
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

/*Table structure for table `logs` */

DROP TABLE IF EXISTS `logs`;

CREATE TABLE `logs` (
  `log_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned DEFAULT NULL,
  `data` text COLLATE utf8mb4_general_ci,
  `operation_type` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `logs` */

insert  into `logs`(`log_id`,`user_id`,`data`,`operation_type`,`created_at`,`updated_at`) values 
(1,1,'{\"cheque_id\":17,\"correspondent_id\":1,\"gd_no\":\"400\",\"bank_name\":\"Sonali\",\"cheque_amount\":50200,\"cheque_number\":\"5220022\",\"ait_amount\":2000,\"commission\":15060,\"deleted_at\":\"2021-08-20T17:07:24.528419Z\",\"created_at\":\"2021-08-11T20:57:47.000000Z\",\"updated_at\":\"2021-08-20T17:07:24.000000Z\"}','Delete','2021-08-20 23:07:24','2021-08-20 23:07:24'),
(2,1,'{\"correspondent_id\":\"2\",\"gd_no\":\"188\",\"bank_name\":\"DBBL\",\"cheque_amount\":\"27080\",\"cheque_number\":\"290802\",\"ait_amount\":2000,\"commission\":8124,\"updated_at\":\"2021-08-20T17:18:18.000000Z\",\"created_at\":\"2021-08-20T17:18:18.000000Z\",\"cheque_id\":20}','Insert Cheque','2021-08-20 23:18:18','2021-08-21 00:53:19'),
(3,1,'{\"correspondent_id\":\"1\",\"gd_no\":\"222\",\"bank_name\":\"DBBL\",\"cheque_amount\":\"59600\",\"cheque_number\":\"596596\",\"ait_amount\":2000,\"commission\":17880,\"updated_at\":\"2021-08-20T18:42:32.000000Z\",\"created_at\":\"2021-08-20T18:42:32.000000Z\",\"cheque_id\":21}','Insert Cheque','2021-08-21 00:42:32','2021-08-21 00:42:32');

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

/*Table structure for table `upazila_list` */

DROP TABLE IF EXISTS `upazila_list`;

CREATE TABLE `upazila_list` (
  `upazila_id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `upazila_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sadar_status` tinyint(1) NOT NULL,
  `district_id` tinyint unsigned NOT NULL,
  `division_id` tinyint unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`upazila_id`)
) ENGINE=InnoDB AUTO_INCREMENT=497 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `upazila_list` */

insert  into `upazila_list`(`upazila_id`,`upazila_name`,`sadar_status`,`district_id`,`division_id`,`created_at`,`updated_at`) values 
(1,'Amtali',0,1,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(2,'Bamna',0,1,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(3,'Barguna-S',1,1,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(4,'Betagi',0,1,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(5,'Patharghata',0,1,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(6,'Taltali',0,1,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(7,'Agailjhara',0,2,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(8,'Babuganj',0,2,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(9,'Bakerganj',0,2,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(10,'Banaripara',0,2,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(11,'Barisal-S',1,2,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(12,'Gouranadi',0,2,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(13,'Hizla',0,2,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(14,'Mehendiganj',0,2,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(15,'Muladi',0,2,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(16,'Uzirpur',0,2,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(17,'Bhola-S',1,3,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(18,'Borhanuddin',0,3,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(19,'Charfassion',0,3,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(20,'Daulatkhan',0,3,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(21,'Lalmohan',0,3,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(22,'Monpura',0,3,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(23,'Tazumuddin',0,3,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(24,'Jhalokathi-S',1,4,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(25,'Kathalia',0,4,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(26,'Nalchity',0,4,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(27,'Rajapur',0,4,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(28,'Bauphal',0,5,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(29,'Dashmina',0,5,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(30,'Dumki',0,5,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(31,'Galachipa',0,5,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(32,'Kalapara',0,5,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(33,'Mirjaganj',0,5,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(34,'Patuakhali-S',1,5,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(35,'Rangabali',0,5,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(36,'Bhandaria',0,6,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(37,'Kawkhali',0,6,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(38,'Mothbaria',0,6,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(39,'Nazirpur',0,6,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(40,'Nesarabad',0,6,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(41,'Pirojpur-S',1,6,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(42,'Zianagar',0,6,1,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(43,'Akhaura',0,8,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(44,'Ashuganj',0,8,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(45,'B.Baria-S',1,8,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(46,'Bancharampur',0,8,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(47,'Bijoynagar',0,8,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(48,'Kasba',0,8,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(49,'Nabinagar',0,8,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(50,'Nasirnagar',0,8,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(51,'Sarail',0,8,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(52,'Alikadam',0,7,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(53,'Bandarban-S',1,7,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(54,'Lama',0,7,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(55,'Naikhyongchari',0,7,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(56,'Rowangchari',0,7,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(57,'Ruma',0,7,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(58,'Thanchi',0,7,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(59,'Chandpur-S',1,9,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(60,'Faridganj',0,9,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(61,'Haimchar',0,9,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(62,'Haziganj',0,9,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(63,'Kachua',0,9,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(64,'Matlab (Dakshin)',0,9,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(65,'Matlab (Uttar)',0,9,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(66,'Shahrasti',0,9,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(67,'Anwara',0,10,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(68,'Banskhali',0,10,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(69,'Boalkhali',0,10,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(70,'Chandanish',0,10,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(71,'Fatikchari',0,10,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(72,'Hathazari',0,10,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(73,'Karnaphuli',0,10,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(74,'Lohagara',0,10,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(75,'Mirsharai',0,10,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(76,'Patiya',0,10,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(77,'Rangunia',0,10,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(78,'Raojan',0,10,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(79,'Sandwip',0,10,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(80,'Satkania',0,10,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(81,'Sitakunda',0,10,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(82,'Chakoria',0,11,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(83,'Cox\'S Bazar-S',1,11,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(84,'Kutubdia',0,11,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(85,'Moheskhali',0,11,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(86,'Pekua',0,11,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(87,'Ramu',0,11,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(88,'Teknaf',0,11,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(89,'Ukhiya',0,11,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(90,'Barura',0,12,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(91,'Brahmanpara',0,12,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(92,'Burichong',0,12,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(93,'Chandina',0,12,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(94,'Chouddagram',0,12,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(95,'Cumilla-S',1,12,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(96,'Cumilla-S Daksin',1,12,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(97,'Daudkandi',0,12,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(98,'Debidwar',0,12,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(99,'Homna',0,12,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(100,'Laksham',0,12,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(101,'Lalmai',0,12,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(102,'Meghna',0,12,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(103,'Monohorganj',0,12,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(104,'Muradnagar',0,12,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(105,'Nangalkot',0,12,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(106,'Titas',0,12,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(107,'Chhagalnaiya',0,13,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(108,'Daganbhuiyan',0,13,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(109,'Feni-S',1,13,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(110,'Fulgazi',0,13,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(111,'Porshuram',0,13,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(112,'Sonagazi',0,13,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(113,'Dighinala',0,14,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(114,'Guimara',0,14,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(115,'Khagrachhari-S',1,14,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(116,'Laxmichari',0,14,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(117,'Mahalchari',0,14,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(118,'Manikchari',0,14,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(119,'Matiranga',0,14,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(120,'Panchari',0,14,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(121,'Ramgarh',0,14,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(122,'Komol Nagar',0,15,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(123,'Lakshmipur-S',1,15,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(124,'Raipur',0,15,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(125,'Ramganj',0,15,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(126,'Ramgati',0,15,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(127,'Begumganj',0,16,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(128,'Chatkhil',0,16,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(129,'Companiganj',0,16,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(130,'Hatiya',0,16,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(131,'Kabir Hat',0,16,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(132,'Noakhali-S',1,16,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(133,'Senbag',0,16,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(134,'Sonaimuri',0,16,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(135,'Subarna Char',0,16,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(136,'Baghaichari',0,17,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(137,'Barkal',0,17,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(138,'Belaichari',0,17,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(139,'Juraichari',0,17,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(140,'Kaptai',0,17,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(141,'Kaukhali',0,17,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(142,'Langadu',0,17,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(143,'Nanniarchar',0,17,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(144,'Rajosthali',0,17,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(145,'Rangamati-S',1,17,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(146,'Dhamrai',0,18,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(147,'Dohar',0,18,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(148,'Keraniganj',0,18,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(149,'Nawabganj',0,18,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(150,'Savar',0,18,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(151,'Alfadanga',0,19,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(152,'Bhanga',0,19,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(153,'Boalmari',0,19,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(154,'Charbhadrasan',0,19,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(155,'Faridpur-S',1,19,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(156,'Madhukhali',0,19,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(157,'Nagarkanda',0,19,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(158,'Sadarpur',0,19,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(159,'Saltha',0,19,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(160,'Gazipur-S',1,20,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(161,'Kaliakoir',0,20,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(162,'Kaliganj',0,20,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(163,'Kapasia',0,20,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(164,'Sreepur',0,20,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(165,'Gopalganj-S',1,21,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(166,'Kasiani',0,21,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(167,'Kotwalipara',0,21,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(168,'Muksudpur',0,21,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(169,'Tungipara',0,21,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(170,'Austagram',0,22,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(171,'Bajitpur',0,22,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(172,'Bhairab',0,22,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(173,'Hossainpur',0,22,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(174,'Itna',0,22,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(175,'Karimganj',0,22,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(176,'Katiadi',0,22,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(177,'Kishoreganj-S',1,22,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(178,'Kuliarchar',0,22,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(179,'Mithamoin',0,22,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(180,'Nikli',0,22,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(181,'Pakundia',0,22,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(182,'Tarail',0,22,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(183,'Kalkini',0,23,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(184,'Madaripur-S',1,23,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(185,'Rajoir',0,23,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(186,'Shibchar',0,23,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(187,'Daulatpur',0,24,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(188,'Ghior',0,24,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(189,'Harirampur',0,24,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(190,'Manikganj-S',1,24,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(191,'Saturia',0,24,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(192,'Shivalaya',0,24,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(193,'Singair',0,24,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(194,'Gazaria',0,25,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(195,'Lauhajong',0,25,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(196,'Munshiganj-S',1,25,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(197,'Sirajdikhan',0,25,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(198,'Sreenagar',0,25,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(199,'Tongibari',0,25,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(200,'Araihazar',0,26,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(201,'Bandar',0,26,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(202,'Narayanganj-S',1,26,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(203,'Rupganj',0,26,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(204,'Sonargaon',0,26,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(205,'Belabo',0,27,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(206,'Monohardi',0,27,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(207,'Narshingdi-S',1,27,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(208,'Palash',0,27,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(209,'Raipura',0,27,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(210,'Shibpur',0,27,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(211,'Baliakandi',0,28,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(212,'Goalanda',0,28,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(213,'Kalukhali',0,28,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(214,'Pangsha',0,28,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(215,'Rajbari-S',1,28,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(216,'Bhedarganj',0,29,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(217,'Damuddya',0,29,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(218,'Goshairhat',0,29,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(219,'Janjira',0,29,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(220,'Naria',0,29,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(221,'Shariatpur-S',1,29,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(222,'Basail',0,30,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(223,'Bhuapur',0,30,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(224,'Delduar',0,30,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(225,'Dhanbari',0,30,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(226,'Ghatail',0,30,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(227,'Gopalpur',0,30,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(228,'Kalihati',0,30,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(229,'Madhupur',0,30,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(230,'Mirzapur',0,30,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(231,'Nagarpur',0,30,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(232,'Shakhipur',0,30,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(233,'Tangail-S',1,30,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(234,'Bagerhat-S',1,31,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(235,'Chitalmari',0,31,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(236,'Fakirhat',0,31,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(237,'Kachua',0,31,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(238,'Mollahat',0,31,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(239,'Mongla',0,31,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(240,'Morrelganj',0,31,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(241,'Rampal',0,31,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(242,'Sharankhola',0,31,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(243,'Alamdanga',0,32,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(244,'Chuadanga-S',1,32,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(245,'Damurhuda',0,32,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(246,'Jibannagar',0,32,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(247,'Abhoynagar',0,33,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(248,'Bagherpara',0,33,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(249,'Chowgacha',0,33,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(250,'Jashore-S',1,33,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(251,'Jhikargacha',0,33,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(252,'Keshabpur',0,33,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(253,'Monirampur',0,33,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(254,'Sharsha',0,33,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(255,'Harinakunda',0,34,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(256,'Jhenaidah-S',1,34,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(257,'Kaliganj',0,34,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(258,'Kotchandpur',0,34,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(259,'Moheshpur',0,34,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(260,'Shailkupa',0,34,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(261,'Batiaghata',0,35,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(262,'Dacope',0,35,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(263,'Dighalia',0,35,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(264,'Dumuria',0,35,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(265,'Koira',0,35,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(266,'Paikgacha',0,35,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(267,'Phultala',0,35,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(268,'Rupsa',0,35,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(269,'Terokhada',0,35,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(270,'Bheramara',0,36,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(271,'Daulatpur',0,36,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(272,'Khoksha',0,36,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(273,'Kumarkhali',0,36,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(274,'Kushtia-S',1,36,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(275,'Mirpur',0,36,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(276,'Magura-S',1,37,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(277,'Mohammadpur',0,37,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(278,'Salikha',0,37,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(279,'Sreepur',0,37,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(280,'Gangni',0,38,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(281,'Meherpur-S',1,38,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(282,'Mujib Nagar',0,38,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(283,'Kalia',0,39,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(284,'Lohagara',0,39,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(285,'Narail-S',1,39,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(286,'Assasuni',0,40,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(287,'Debhata',0,40,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(288,'Kalaroa',0,40,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(289,'Kaliganj',0,40,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(290,'Satkhira-S',1,40,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(291,'Shyamnagar',0,40,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(292,'Tala',0,40,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(293,'Bakshiganj',0,41,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(294,'Dewanganj',0,41,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(295,'Islampur',0,41,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(296,'Jamalpur-S',1,41,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(297,'Madarganj',0,41,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(298,'Melendah',0,41,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(299,'Sarishabari',0,41,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(300,'Bhaluka',0,42,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(301,'Dhobaura',0,42,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(302,'Fulbaria',0,42,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(303,'Gaffargaon',0,42,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(304,'Gouripur',0,42,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(305,'Haluaghat',0,42,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(306,'Ishwarganj',0,42,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(307,'Muktagacha',0,42,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(308,'Mymensingh-S',1,42,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(309,'Nandail',0,42,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(310,'Phulpur',0,42,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(311,'Tarakanda',0,42,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(312,'Trishal',0,42,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(313,'Atpara',0,43,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(314,'Barhatta',0,43,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(315,'Durgapur',0,43,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(316,'Kalmakanda',0,43,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(317,'Kendua',0,43,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(318,'Khaliajuri',0,43,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(319,'Madan',0,43,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(320,'Mohanganj',0,43,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(321,'Netrakona-S',1,43,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(322,'Purbadhala',0,43,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(323,'Jhenaigati',0,44,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(324,'Nakla',0,44,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(325,'Nalitabari',0,44,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(326,'Sherpur-S',1,44,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(327,'Sreebordi',0,44,5,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(328,'Adamdighi',0,45,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(329,'Bogura-S',1,45,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(330,'Dhunot',0,45,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(331,'Dhupchancia',0,45,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(332,'Gabtali',0,45,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(333,'Kahaloo',0,45,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(334,'Nandigram',0,45,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(335,'Sariakandi',0,45,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(336,'Shajahanpur',0,45,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(337,'Sherpur',0,45,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(338,'Shibganj',0,45,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(339,'Sonatala',0,45,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(340,'Bholahat',0,49,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(341,'Gomostapur',0,49,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(342,'Nachol',0,49,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(343,'Nawabganj-S',1,49,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(344,'Shibganj',0,49,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(345,'Akkelpur',0,46,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(346,'Joypurhat-S',1,46,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(347,'Kalai',0,46,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(348,'Khetlal',0,46,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(349,'Panchbibi',0,46,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(350,'Atrai',0,47,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(351,'Badalgachi',0,47,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(352,'Dhamoirhat',0,47,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(353,'Manda',0,47,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(354,'Mohadevpur',0,47,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(355,'Naogaon-S',1,47,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(356,'Niamatpur',0,47,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(357,'Patnitala',0,47,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(358,'Porsha',0,47,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(359,'Raninagar',0,47,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(360,'Shapahar',0,47,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(361,'Bagatipara',0,48,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(362,'Baraigram',0,48,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(363,'Gurudaspur',0,48,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(364,'Lalpur',0,48,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(365,'Naldanga',0,48,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(366,'Natore-S',1,48,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(367,'Singra',0,48,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(368,'Atghoria',0,50,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(369,'Bera',0,50,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(370,'Bhangura',0,50,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(371,'Chatmohar',0,50,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(372,'Faridpur',0,50,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(373,'Ishwardi',0,50,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(374,'Pabna-S',1,50,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(375,'Santhia',0,50,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(376,'Sujanagar',0,50,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(377,'Bagha',0,51,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(378,'Bagmara',0,51,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(379,'Charghat',0,51,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(380,'Durgapur',0,51,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(381,'Godagari',0,51,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(382,'Mohanpur',0,51,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(383,'Paba',0,51,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(384,'Puthia',0,51,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(385,'Tanore',0,51,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(386,'Belkuchi',0,52,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(387,'Chowhali',0,52,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(388,'Kamarkhand',0,52,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(389,'Kazipur',0,52,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(390,'Raiganj',0,52,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(391,'Shahzadpur',0,52,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(392,'Sirajganj-S',1,52,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(393,'Tarash',0,52,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(394,'Ullapara',0,52,6,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(395,'Birampur',0,53,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(396,'Birganj',0,53,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(397,'Birol',0,53,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(398,'Bochaganj',0,53,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(399,'Chirirbandar',0,53,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(400,'Dinajpur-S',1,53,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(401,'Fulbari',0,53,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(402,'Ghoraghat',0,53,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(403,'Hakimpur',0,53,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(404,'Kaharol',0,53,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(405,'Khanshama',0,53,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(406,'Nawabganj',0,53,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(407,'Parbatipur',0,53,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(408,'Fulchari',0,54,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(409,'Gaibandha-S',1,54,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(410,'Gobindaganj',0,54,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(411,'Palashbari',0,54,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(412,'Sadullapur',0,54,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(413,'Saghata',0,54,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(414,'Sundarganj',0,54,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(415,'Bhurungamari',0,55,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(416,'Chilmari',0,55,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(417,'Fulbari',0,55,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(418,'Kurigram-S',1,55,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(419,'Nageswari',0,55,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(420,'Rajarhat',0,55,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(421,'Rajibpur',0,55,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(422,'Rowmari',0,55,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(423,'Ulipur',0,55,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(424,'Aditmari',0,56,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(425,'Hatibandha',0,56,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(426,'Kaliganj',0,56,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(427,'Lalmonirhat-S',1,56,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(428,'Patgram',0,56,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(429,'Dimla',0,57,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(430,'Domar',0,57,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(431,'Jaldhaka',0,57,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(432,'Kishoreganj',0,57,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(433,'Nilphamari-S',1,57,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(434,'Sayedpur',0,57,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(435,'Atwari',0,58,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(436,'Boda',0,58,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(437,'Debiganj',0,58,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(438,'Panchagarh-S',1,58,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(439,'Tetulia',0,58,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(440,'Badarganj',0,59,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(441,'Gangachara',0,59,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(442,'Kaunia',0,59,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(443,'Mithapukur',0,59,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(444,'Pirgacha',0,59,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(445,'Pirganj',0,59,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(446,'Rangpur-S',1,59,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(447,'Taraganj',0,59,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(448,'Baliadangi',0,60,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(449,'Haripur',0,60,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(450,'Pirganj',0,60,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(451,'Ranisankail',0,60,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(452,'Thakurgaon-S',1,60,7,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(453,'Azmiriganj',0,61,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(454,'Bahubal',0,61,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(455,'Baniachong',0,61,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(456,'Chunarughat',0,61,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(457,'Habiganj-S',1,61,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(458,'Lakhai',0,61,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(459,'Madhabpur',0,61,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(460,'Nabiganj',0,61,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(461,'Sayestaganj',0,61,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(462,'Barlekha',0,62,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(463,'Juri',0,62,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(464,'Kamalganj',0,62,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(465,'Kulaura',0,62,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(466,'Moulvibazar-S',1,62,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(467,'Rajnagar',0,62,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(468,'Sreemangal',0,62,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(469,'Biswamvarpur',0,63,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(470,'Chatak',0,63,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(471,'Dakhin Sunamganj',0,63,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(472,'Derai',0,63,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(473,'Dharmapasha',0,63,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(474,'Doarabazar',0,63,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(475,'Jagannathpur',0,63,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(476,'Jamalganj',0,63,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(477,'Sulla',0,63,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(478,'Sunamganj-S',1,63,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(479,'Tahirpur',0,63,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(480,'Balaganj',0,64,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(481,'Beanibazar',0,64,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(482,'Biswanath',0,64,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(483,'Companiganj',0,64,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(484,'Dakshin Surma',0,64,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(485,'Fenchuganj',0,64,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(486,'Golapganj',0,64,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(487,'Gowainghat',0,64,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(488,'Jointiapur',0,64,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(489,'Kanaighat',0,64,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(490,'Osmaninagar',0,64,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(491,'Sylhet-S',1,64,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(492,'Zakiganj',0,64,8,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(493,'Chattogram-S',1,10,2,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(494,'Dhaka',0,18,3,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(495,'Khulna-S',1,35,4,'2021-07-15 13:24:52','2021-07-15 13:24:52'),
(496,'Rajshahi-S',1,51,6,'2021-07-15 13:24:52','2021-07-15 13:24:52');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
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
