/*
SQLyog Community v13.0.1 (64 bit)
MySQL - 10.1.35-MariaDB : Database - laraveltest
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`laraveltest` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `laraveltest`;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2018_09_05_093500_create_tbl_admin_table',1),
(2,'2018_09_06_165309_create_tbl_category_table',1),
(3,'2018_09_07_111744_create_manufacture_table',1),
(4,'2018_09_08_003946_create_tbl_products_table',1),
(5,'2018_09_09_214342_create_tbl_users_table',1);

/*Table structure for table `tbl_admin` */

DROP TABLE IF EXISTS `tbl_admin`;

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_admin` */

insert  into `tbl_admin`(`admin_id`,`admin_email`,`admin_password`,`admin_name`,`admin_phone`,`created_at`,`updated_at`) values 
(1,'admin@gmail.com','21232f297a57a5a743894a0e4a801fc3','admin','11111',NULL,NULL);

/*Table structure for table `tbl_users` */

DROP TABLE IF EXISTS `tbl_users`;

CREATE TABLE `tbl_users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_short_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_users` */

insert  into `tbl_users`(`user_id`,`user_name`,`user_short_description`,`user_photo`,`user_status`,`created_at`,`updated_at`) values 
(7,'vitaliy','I am a developer','image/kaKhzSecPBkolrTpJvqt.jpg',1,NULL,NULL),
(8,'Mihail','I am also developer','image/vZtdnFUWHG68fypNBl6W.jpg',1,NULL,NULL),
(9,'lina','I am a designer','image/D5k3brn9JOYT68MkeEWl.jpg',1,NULL,NULL),
(10,'rusha','I am also designer','image/Z4iW6SYkWzLUeXIDtRR9.jpg',1,NULL,NULL),
(11,'jena','I am a officer.','image/hzHtpdadMuOqpYrAOlr1.jpg',1,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
