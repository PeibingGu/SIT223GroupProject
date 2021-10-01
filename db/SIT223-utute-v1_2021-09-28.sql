# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.26)
# Database: SIT223-utute-v1
# Generation Time: 2021-10-01 04:45:17 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table accounts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `accounts`;

CREATE TABLE `accounts` (
  `account_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `card_number` varchar(32) DEFAULT NULL,
  `name_on_card` varchar(64) DEFAULT NULL,
  `expire_time` datetime DEFAULT NULL,
  `is_selected` tinyint(1) DEFAULT '1',
  `created_time` datetime DEFAULT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table appointments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `appointments`;

CREATE TABLE `appointments` (
  `appointment_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `tutor_id` int(11) unsigned DEFAULT NULL,
  `tutor_teaching_id` int(11) unsigned DEFAULT NULL,
  `appt_start_time` datetime DEFAULT NULL,
  `appt_end_time` datetime DEFAULT NULL,
  `status` enum('Requested','Declined','Approved','Completed') DEFAULT 'Requested',
  `meeting_url` varchar(255) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `fees` decimal(9,2) DEFAULT '0.00',
  PRIMARY KEY (`appointment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `appointments` WRITE;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;

INSERT INTO `appointments` (`appointment_id`, `user_id`, `tutor_id`, `tutor_teaching_id`, `appt_start_time`, `appt_end_time`, `status`, `meeting_url`, `created_time`, `fees`)
VALUES
	(1,14,12,5,'2021-09-01 10:00:00','2021-09-01 11:00:00','Completed','http://https://www.google.com.au/meeting',NULL,86.00),
	(2,14,13,6,'2021-09-01 10:00:00','2021-09-01 11:00:00','Completed','http://https://www.google.com.au/meeting',NULL,97.00),
	(3,14,13,3,'2021-10-02 08:00:00','2021-10-02 10:00:00','Requested',NULL,'2021-10-01 02:51:46',29.00),
	(4,14,13,3,'2021-10-23 08:00:00','2021-10-23 10:00:00','Requested',NULL,'2021-10-01 03:08:42',29.00),
	(5,14,13,3,'2021-10-02 07:00:00','2021-10-02 08:00:00','Requested',NULL,'2021-10-01 03:10:33',29.00),
	(6,14,13,3,'2021-10-09 07:00:00','2021-10-09 08:00:00','Requested',NULL,'2021-10-01 03:19:16',29.00),
	(7,14,13,3,'2021-10-23 07:00:00','2021-10-23 08:00:00','Requested',NULL,'2021-10-01 03:20:49',29.00),
	(8,14,13,3,'2021-10-15 07:00:00','2021-10-15 09:00:00','Requested',NULL,'2021-10-01 03:22:57',29.00),
	(9,14,13,3,'2021-10-15 07:00:00','2021-10-15 08:00:00','Requested',NULL,'2021-10-01 03:30:13',29.00),
	(10,14,13,3,'2021-10-02 07:00:00','2021-10-02 09:00:00','Requested',NULL,'2021-10-01 03:35:32',29.00),
	(11,14,13,3,'2021-10-09 08:00:00','2021-10-09 09:00:00','Requested',NULL,'2021-10-01 03:38:19',29.00),
	(12,14,13,3,'2021-10-02 08:00:00','2021-10-02 09:00:00','Declined',NULL,'2021-10-01 03:47:38',29.00);

/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table availabilities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `availabilities`;

CREATE TABLE `availabilities` (
  `availability_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tutor_id` int(11) unsigned DEFAULT NULL,
  `day_id` int(11) unsigned DEFAULT NULL,
  `time_id` int(11) unsigned DEFAULT NULL,
  `status` enum('Available','Booked','Pending') DEFAULT 'Available',
  PRIMARY KEY (`availability_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table days
# ------------------------------------------------------------

DROP TABLE IF EXISTS `days`;

CREATE TABLE `days` (
  `day_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `day_name` varchar(12) DEFAULT NULL,
  `day_value` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`day_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `days` WRITE;
/*!40000 ALTER TABLE `days` DISABLE KEYS */;

INSERT INTO `days` (`day_id`, `day_name`, `day_value`)
VALUES
	(1,'Monday',1),
	(2,'Tuesday',2),
	(3,'Wednesday',3),
	(4,'Thursday',4),
	(5,'Friday',5),
	(6,'Saturday',6),
	(7,'Sunday',0);

/*!40000 ALTER TABLE `days` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table hobbies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `hobbies`;

CREATE TABLE `hobbies` (
  `hobby_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `hobby_name` varchar(16) NOT NULL DEFAULT '',
  PRIMARY KEY (`hobby_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `hobbies` WRITE;
/*!40000 ALTER TABLE `hobbies` DISABLE KEYS */;

INSERT INTO `hobbies` (`hobby_id`, `hobby_name`)
VALUES
	(1,'Hiking'),
	(2,'Cooking'),
	(3,'Painting'),
	(4,'Writing'),
	(5,'Dancing'),
	(6,'Programming'),
	(7,'Reading'),
	(8,'Knitting'),
	(9,'Gradening'),
	(10,'Acting'),
	(11,'Swimming'),
	(12,'Meditating');

/*!40000 ALTER TABLE `hobbies` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table messages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `message_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `from_user_id` int(11) unsigned DEFAULT NULL,
  `to_user_id` int(11) unsigned DEFAULT NULL,
  `message_content` longtext,
  `is_new` tinyint(1) DEFAULT '1',
  `created_time` datetime DEFAULT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;

INSERT INTO `messages` (`message_id`, `from_user_id`, `to_user_id`, `message_content`, `is_new`, `created_time`)
VALUES
	(1,14,16,'Session Request:blah blah',1,'2021-10-01 02:01:29'),
	(2,14,16,'Session Request:aomwrhinf aa fd f',1,'2021-10-01 02:02:18'),
	(3,14,16,'Session Request:something goes here.',1,'2021-10-01 02:02:57'),
	(4,14,13,'Session Request:something goes here blah blah',1,'2021-10-01 02:37:59'),
	(5,14,13,'Session Request:something goes here blah blah',1,'2021-10-01 02:39:45'),
	(6,14,13,'Session Request:something goes here blah blah',1,'2021-10-01 02:39:45'),
	(7,14,13,'Session Request:something goes here hahahaha',1,'2021-10-01 02:44:43'),
	(8,14,13,'Session Request:something goes here hahahaha',1,'2021-10-01 02:44:43'),
	(9,14,13,'Session Request:fdsafdsafdsa',1,'2021-10-01 02:45:34'),
	(10,14,13,'Session Request:fdsafsdafdsa',1,'2021-10-01 02:46:53'),
	(11,14,13,'Session Request:fdsafsdafdsa',1,'2021-10-01 02:48:37'),
	(12,14,13,'Session Request:fdsafsdafdsa',1,'2021-10-01 02:48:44'),
	(13,14,13,'Session Request:fdsafdsa',1,'2021-10-01 02:48:59'),
	(14,14,13,'Session Request:fdsafdsa',1,'2021-10-01 02:49:16'),
	(15,14,13,'Session Request:fdsafdsa',1,'2021-10-01 02:49:16'),
	(16,14,13,'Session Request:5555555',1,'2021-10-01 02:51:46'),
	(17,14,13,'Session Request:5555555',1,'2021-10-01 02:51:46'),
	(18,14,13,'Session Request:fdsafsafds',1,'2021-10-01 03:08:42'),
	(19,14,13,'Session Request:fdsafsafds',1,'2021-10-01 03:08:42'),
	(20,14,13,'Session Request:fdsafdsa',1,'2021-10-01 03:10:33'),
	(21,14,13,'Session Request:fdsafdsa',1,'2021-10-01 03:10:33'),
	(22,14,13,'Session Request:fdsafdsaf',1,'2021-10-01 03:19:16'),
	(23,14,13,'Session Request:fdsafdsaf',1,'2021-10-01 03:19:16'),
	(24,14,13,'Session Request:fdsafsa',1,'2021-10-01 03:20:49'),
	(25,14,13,'Session Request:fdsafsa',1,'2021-10-01 03:20:49'),
	(26,14,13,'Session Request:fdsafdsa',1,'2021-10-01 03:22:57'),
	(27,14,13,'Session Request:fdsafdsa',1,'2021-10-01 03:22:57'),
	(28,14,13,'Session Request:fdsafdsa',1,'2021-10-01 03:30:13'),
	(29,14,13,'Session Request:fdsafdsa',1,'2021-10-01 03:30:13'),
	(30,14,13,'Session Request:fdsafdsafdsaf',1,'2021-10-01 03:35:32'),
	(31,14,13,'Session Request:fdsafdsafdsaf',1,'2021-10-01 03:35:32'),
	(32,14,13,'Session Request:fdafsdafdsafs',1,'2021-10-01 03:38:19'),
	(33,14,13,'Session Request:fdafsdafdsafs',1,'2021-10-01 03:38:19'),
	(34,14,13,'Session Request:fdsafdsa',1,'2021-10-01 03:47:38'),
	(35,14,13,'Session Request:fdsafdsa',1,'2021-10-01 03:47:38'),
	(36,13,14,'Appointment Request Accepted:John Doe  has accepted your appointment request.',1,'2021-10-01 04:40:24'),
	(37,13,14,'Appointment Request Declined:John Doe  has accepted your appointment request.',1,'2021-10-01 04:42:54');

/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table qualification_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `qualification_types`;

CREATE TABLE `qualification_types` (
  `qualification_type_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `qualification_type_name` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`qualification_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `qualification_types` WRITE;
/*!40000 ALTER TABLE `qualification_types` DISABLE KEYS */;

INSERT INTO `qualification_types` (`qualification_type_id`, `qualification_type_name`)
VALUES
	(1,'High School'),
	(2,'Certificate'),
	(3,'Diploma'),
	(4,'Bachelor'),
	(5,'Graduate Certificate'),
	(6,'Graduate Diploma'),
	(7,'Master'),
	(8,'Doctorate');

/*!40000 ALTER TABLE `qualification_types` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ratings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ratings`;

CREATE TABLE `ratings` (
  `rating_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `appointment_id` int(11) unsigned DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `tutor_id` int(11) unsigned DEFAULT NULL,
  `stars` tinyint(4) DEFAULT '0',
  `review_content` varchar(255) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  PRIMARY KEY (`rating_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ratings` WRITE;
/*!40000 ALTER TABLE `ratings` DISABLE KEYS */;

INSERT INTO `ratings` (`rating_id`, `appointment_id`, `user_id`, `tutor_id`, `stars`, `review_content`, `created_time`)
VALUES
	(1,1,12,12,5,'Tutor is so great! this is no.1 review ','2021-09-30 11:00:00'),
	(2,1,12,13,5,'Tutor is so great! this is no.2 review ','2021-09-30 11:00:00'),
	(3,1,12,14,5,'Tutor is so great! this is no.3 review ','2021-09-30 11:00:00'),
	(4,1,12,15,5,'Tutor is so great! this is no.4 review ','2021-09-30 11:00:00'),
	(5,1,12,16,5,'Tutor is so great! this is no.5 review ','2021-09-30 11:00:00'),
	(6,1,12,17,5,'Tutor is so great! this is no.6 review ','2021-09-30 11:00:00'),
	(7,1,12,18,5,'Tutor is so great! this is no.7 review ','2021-09-30 11:00:00'),
	(8,1,12,19,5,'Tutor is so great! this is no.8 review ','2021-09-30 11:00:00'),
	(9,1,12,20,5,'Tutor is so great! this is no.9 review ','2021-09-30 11:00:00'),
	(10,1,12,12,5,'Tutor is so great! this is no.10 review ','2021-09-30 11:00:00'),
	(11,1,12,12,5,'Tutor is so great! this is no.11 review ','2021-09-30 11:00:00'),
	(12,1,12,13,5,'Tutor is so great! this is no.12 review ','2021-09-30 11:00:00'),
	(13,1,12,14,5,'Tutor is so great! this is no.13 review ','2021-09-30 11:00:00'),
	(14,1,12,15,5,'Tutor is so great! this is no.14 review ','2021-09-30 11:00:00'),
	(15,1,12,16,5,'Tutor is so great! this is no.15 review ','2021-09-30 11:00:00'),
	(16,1,12,17,5,'Tutor is so great! this is no.16 review ','2021-09-30 11:00:00'),
	(17,1,12,18,5,'Tutor is so great! this is no.17 review ','2021-09-30 11:00:00'),
	(18,1,12,19,5,'Tutor is so great! this is no.18 review ','2021-09-30 11:00:00'),
	(19,1,12,20,5,'Tutor is so great! this is no.19 review ','2021-09-30 11:00:00'),
	(20,1,12,12,5,'Tutor is so great! this is no.20 review ','2021-09-30 11:00:00'),
	(21,1,12,13,5,'Tutor is so great! this is no.21 review ','2021-09-30 11:00:00'),
	(22,1,12,14,5,'Tutor is so great! this is no.22 review ','2021-09-30 11:00:00'),
	(23,1,12,15,5,'Tutor is so great! this is no.23 review ','2021-09-30 11:00:00'),
	(24,1,12,16,5,'Tutor is so great! this is no.24 review ','2021-09-30 11:00:00'),
	(25,1,12,17,5,'Tutor is so great! this is no.25 review ','2021-09-30 11:00:00'),
	(26,1,12,18,5,'Tutor is so great! this is no.26 review ','2021-09-30 11:00:00'),
	(27,1,12,12,5,'Tutor is so great! this is no.27 review ','2021-09-30 11:00:00'),
	(28,1,12,20,5,'Tutor is so great! this is no.28 review ','2021-09-30 11:00:00'),
	(29,1,12,12,5,'Tutor is so great! this is no.29 review ','2021-09-30 11:00:00'),
	(30,1,12,13,5,'Tutor is so great! this is no.30 review ','2021-09-30 11:00:00'),
	(31,1,12,14,5,'Tutor is so great! this is no.31 review ','2021-09-30 11:00:00'),
	(32,1,12,15,5,'Tutor is so great! this is no.32 review ','2021-09-30 11:00:00'),
	(33,1,12,16,5,'Tutor is so great! this is no.33 review ','2021-09-30 11:00:00'),
	(34,1,12,17,5,'Tutor is so great! this is no.34 review ','2021-09-30 11:00:00'),
	(35,1,12,15,5,'Tutor is so great! this is no.35 review ','2021-09-30 11:00:00'),
	(36,1,12,19,5,'Tutor is so great! this is no.36 review ','2021-09-30 11:00:00'),
	(37,1,12,20,5,'Tutor is so great! this is no.37 review ','2021-09-30 11:00:00'),
	(38,1,12,12,5,'Tutor is so great! this is no.38 review ','2021-09-30 11:00:00'),
	(39,1,12,13,5,'Tutor is so great! this is no.39 review ','2021-09-30 11:00:00'),
	(40,1,12,14,5,'Tutor is so great! this is no.40 review ','2021-09-30 11:00:00'),
	(41,1,12,15,5,'Tutor is so great! this is no.41 review ','2021-09-30 11:00:00'),
	(42,1,12,16,5,'Tutor is so great! this is no.42 review ','2021-09-30 11:00:00'),
	(43,1,12,17,5,'Tutor is so great! this is no.43 review ','2021-09-30 11:00:00'),
	(44,1,12,18,5,'Tutor is so great! this is no.44 review ','2021-09-30 11:00:00'),
	(45,1,12,19,5,'Tutor is so great! this is no.45 review ','2021-09-30 11:00:00'),
	(46,1,12,20,5,'Tutor is so great! this is no.46 review ','2021-09-30 11:00:00'),
	(47,1,12,12,5,'Tutor is so great! this is no.47 review ','2021-09-30 11:00:00'),
	(48,1,12,13,5,'Tutor is so great! this is no.48 review ','2021-09-30 11:00:00'),
	(49,1,12,14,5,'Tutor is so great! this is no.49 review ','2021-09-30 11:00:00'),
	(50,1,12,15,5,'Tutor is so great! this is no.50 review ','2021-09-30 11:00:00'),
	(51,1,12,16,5,'Tutor is so great! this is no.51 review ','2021-09-30 11:00:00'),
	(52,1,12,17,5,'Tutor is so great! this is no.52 review ','2021-09-30 11:00:00'),
	(53,1,12,18,5,'Tutor is so great! this is no.53 review ','2021-09-30 11:00:00'),
	(54,1,12,19,5,'Tutor is so great! this is no.54 review ','2021-09-30 11:00:00'),
	(55,1,12,20,5,'Tutor is so great! this is no.55 review ','2021-09-30 11:00:00'),
	(56,1,12,12,5,'Tutor is so great! this is no.56 review ','2021-09-30 11:00:00'),
	(57,1,12,13,5,'Tutor is so great! this is no.57 review ','2021-09-30 11:00:00'),
	(58,1,12,14,5,'Tutor is so great! this is no.58 review ','2021-09-30 11:00:00'),
	(59,1,12,15,5,'Tutor is so great! this is no.59 review ','2021-09-30 11:00:00'),
	(60,1,12,16,5,'Tutor is so great! this is no.60 review ','2021-09-30 11:00:00'),
	(61,1,12,17,5,'Tutor is so great! this is no.61 review ','2021-09-30 11:00:00'),
	(62,1,12,18,5,'Tutor is so great! this is no.62 review ','2021-09-30 11:00:00'),
	(63,1,12,19,5,'Tutor is so great! this is no.63 review ','2021-09-30 11:00:00'),
	(64,1,12,19,5,'Tutor is so great! this is no.64 review ','2021-09-30 11:00:00'),
	(65,1,12,12,5,'Tutor is so great! this is no.65 review ','2021-09-30 11:00:00'),
	(66,1,12,13,5,'Tutor is so great! this is no.66 review ','2021-09-30 11:00:00'),
	(67,1,12,14,5,'Tutor is so great! this is no.67 review ','2021-09-30 11:00:00'),
	(68,1,12,15,5,'Tutor is so great! this is no.68 review ','2021-09-30 11:00:00'),
	(69,1,12,16,5,'Tutor is so great! this is no.69 review ','2021-09-30 11:00:00'),
	(70,1,12,17,5,'Tutor is so great! this is no.70 review ','2021-09-30 11:00:00'),
	(71,1,12,18,5,'Tutor is so great! this is no.71 review ','2021-09-30 11:00:00'),
	(72,1,12,19,5,'Tutor is so great! this is no.72 review ','2021-09-30 11:00:00'),
	(73,1,12,20,5,'Tutor is so great! this is no.73 review ','2021-09-30 11:00:00'),
	(74,1,12,12,5,'Tutor is so great! this is no.74 review ','2021-09-30 11:00:00'),
	(75,1,12,13,5,'Tutor is so great! this is no.75 review ','2021-09-30 11:00:00'),
	(76,1,12,14,5,'Tutor is so great! this is no.76 review ','2021-09-30 11:00:00'),
	(77,1,12,15,5,'Tutor is so great! this is no.77 review ','2021-09-30 11:00:00'),
	(78,1,12,16,5,'Tutor is so great! this is no.78 review ','2021-09-30 11:00:00'),
	(79,1,12,17,5,'Tutor is so great! this is no.79 review ','2021-09-30 11:00:00'),
	(80,1,12,18,5,'Tutor is so great! this is no.80 review ','2021-09-30 11:00:00'),
	(81,1,12,19,5,'Tutor is so great! this is no.81 review ','2021-09-30 11:00:00'),
	(82,1,12,20,5,'Tutor is so great! this is no.82 review ','2021-09-30 11:00:00'),
	(83,1,12,12,5,'Tutor is so great! this is no.83 review ','2021-09-30 11:00:00'),
	(84,1,12,13,5,'Tutor is so great! this is no.84 review ','2021-09-30 11:00:00'),
	(85,1,12,14,5,'Tutor is so great! this is no.85 review ','2021-09-30 11:00:00'),
	(86,1,12,15,5,'Tutor is so great! this is no.86 review ','2021-09-30 11:00:00'),
	(87,1,12,16,5,'Tutor is so great! this is no.87 review ','2021-09-30 11:00:00'),
	(88,1,12,17,5,'Tutor is so great! this is no.88 review ','2021-09-30 11:00:00'),
	(89,1,12,18,5,'Tutor is so great! this is no.89 review ','2021-09-30 11:00:00'),
	(90,1,12,19,5,'Tutor is so great! this is no.90 review ','2021-09-30 11:00:00'),
	(91,1,12,20,5,'Tutor is so great! this is no.91 review ','2021-09-30 11:00:00'),
	(92,1,12,12,5,'Tutor is so great! this is no.92 review ','2021-09-30 11:00:00'),
	(93,1,12,13,5,'Tutor is so great! this is no.93 review ','2021-09-30 11:00:00'),
	(94,1,12,14,5,'Tutor is so great! this is no.94 review ','2021-09-30 11:00:00'),
	(95,1,12,15,5,'Tutor is so great! this is no.95 review ','2021-09-30 11:00:00'),
	(96,1,12,16,5,'Tutor is so great! this is no.96 review ','2021-09-30 11:00:00'),
	(97,1,12,17,5,'Tutor is so great! this is no.97 review ','2021-09-30 11:00:00'),
	(98,1,12,18,5,'Tutor is so great! this is no.98 review ','2021-09-30 11:00:00'),
	(99,1,12,19,5,'Tutor is so great! this is no.99 review ','2021-09-30 11:00:00'),
	(100,1,12,20,5,'Tutor is so great! this is no.100 review ','2021-09-30 11:00:00'),
	(101,1,12,12,5,'Tutor is so great! this is no.101 review ','2021-09-30 11:00:00'),
	(102,1,12,13,5,'Tutor is so great! this is no.102 review ','2021-09-30 11:00:00'),
	(103,1,12,14,5,'Tutor is so great! this is no.103 review ','2021-09-30 11:00:00'),
	(104,1,12,15,5,'Tutor is so great! this is no.104 review ','2021-09-30 11:00:00'),
	(105,1,12,16,5,'Tutor is so great! this is no.105 review ','2021-09-30 11:00:00'),
	(106,1,12,17,5,'Tutor is so great! this is no.106 review ','2021-09-30 11:00:00'),
	(107,1,12,18,5,'Tutor is so great! this is no.107 review ','2021-09-30 11:00:00'),
	(108,1,12,19,5,'Tutor is so great! this is no.108 review ','2021-09-30 11:00:00'),
	(109,1,12,20,5,'Tutor is so great! this is no.109 review ','2021-09-30 11:00:00'),
	(110,1,12,12,5,'Tutor is so great! this is no.110 review ','2021-09-30 11:00:00'),
	(111,1,12,13,5,'Tutor is so great! this is no.111 review ','2021-09-30 11:00:00'),
	(112,1,12,14,5,'Tutor is so great! this is no.112 review ','2021-09-30 11:00:00'),
	(113,1,12,15,5,'Tutor is so great! this is no.113 review ','2021-09-30 11:00:00'),
	(114,1,12,16,5,'Tutor is so great! this is no.114 review ','2021-09-30 11:00:00'),
	(115,1,12,17,5,'Tutor is so great! this is no.115 review ','2021-09-30 11:00:00'),
	(116,1,12,16,5,'Tutor is so great! this is no.116 review ','2021-09-30 11:00:00'),
	(117,1,12,19,5,'Tutor is so great! this is no.117 review ','2021-09-30 11:00:00'),
	(118,1,12,20,5,'Tutor is so great! this is no.118 review ','2021-09-30 11:00:00'),
	(119,1,12,12,5,'Tutor is so great! this is no.119 review ','2021-09-30 11:00:00'),
	(120,1,12,13,5,'Tutor is so great! this is no.120 review ','2021-09-30 11:00:00'),
	(121,1,12,14,5,'Tutor is so great! this is no.121 review ','2021-09-30 11:00:00'),
	(122,1,12,15,5,'Tutor is so great! this is no.122 review ','2021-09-30 11:00:00'),
	(123,1,12,16,5,'Tutor is so great! this is no.123 review ','2021-09-30 11:00:00'),
	(124,1,12,17,5,'Tutor is so great! this is no.124 review ','2021-09-30 11:00:00'),
	(125,1,12,18,5,'Tutor is so great! this is no.125 review ','2021-09-30 11:00:00'),
	(126,1,12,19,5,'Tutor is so great! this is no.126 review ','2021-09-30 11:00:00'),
	(127,1,12,20,5,'Tutor is so great! this is no.127 review ','2021-09-30 11:00:00'),
	(128,1,12,12,5,'Tutor is so great! this is no.128 review ','2021-09-30 11:00:00'),
	(129,1,12,13,5,'Tutor is so great! this is no.129 review ','2021-09-30 11:00:00'),
	(130,1,12,14,5,'Tutor is so great! this is no.130 review ','2021-09-30 11:00:00'),
	(131,1,12,15,5,'Tutor is so great! this is no.131 review ','2021-09-30 11:00:00'),
	(132,1,12,16,5,'Tutor is so great! this is no.132 review ','2021-09-30 11:00:00'),
	(133,1,12,17,5,'Tutor is so great! this is no.133 review ','2021-09-30 11:00:00'),
	(134,1,12,18,5,'Tutor is so great! this is no.134 review ','2021-09-30 11:00:00'),
	(135,1,12,19,5,'Tutor is so great! this is no.135 review ','2021-09-30 11:00:00'),
	(136,1,12,20,5,'Tutor is so great! this is no.136 review ','2021-09-30 11:00:00'),
	(137,1,12,12,5,'Tutor is so great! this is no.137 review ','2021-09-30 11:00:00'),
	(138,1,12,13,5,'Tutor is so great! this is no.138 review ','2021-09-30 11:00:00'),
	(139,1,12,14,5,'Tutor is so great! this is no.139 review ','2021-09-30 11:00:00'),
	(140,1,12,15,5,'Tutor is so great! this is no.140 review ','2021-09-30 11:00:00'),
	(141,1,12,16,5,'Tutor is so great! this is no.141 review ','2021-09-30 11:00:00'),
	(142,1,12,17,5,'Tutor is so great! this is no.142 review ','2021-09-30 11:00:00'),
	(143,1,12,18,5,'Tutor is so great! this is no.143 review ','2021-09-30 11:00:00'),
	(144,1,12,19,5,'Tutor is so great! this is no.144 review ','2021-09-30 11:00:00'),
	(145,1,12,20,5,'Tutor is so great! this is no.145 review ','2021-09-30 11:00:00'),
	(146,1,12,12,5,'Tutor is so great! this is no.146 review ','2021-09-30 11:00:00'),
	(147,1,12,13,5,'Tutor is so great! this is no.147 review ','2021-09-30 11:00:00'),
	(148,1,12,14,5,'Tutor is so great! this is no.148 review ','2021-09-30 11:00:00'),
	(149,1,12,15,5,'Tutor is so great! this is no.149 review ','2021-09-30 11:00:00'),
	(150,1,12,16,5,'Tutor is so great! this is no.150 review ','2021-09-30 11:00:00'),
	(151,1,12,17,5,'Tutor is so great! this is no.151 review ','2021-09-30 11:00:00'),
	(152,1,12,18,5,'Tutor is so great! this is no.152 review ','2021-09-30 11:00:00'),
	(153,1,12,19,5,'Tutor is so great! this is no.153 review ','2021-09-30 11:00:00'),
	(154,1,12,20,5,'Tutor is so great! this is no.154 review ','2021-09-30 11:00:00'),
	(155,1,12,12,5,'Tutor is so great! this is no.155 review ','2021-09-30 11:00:00'),
	(156,1,12,13,5,'Tutor is so great! this is no.156 review ','2021-09-30 11:00:00'),
	(157,1,12,14,5,'Tutor is so great! this is no.157 review ','2021-09-30 11:00:00'),
	(158,1,12,15,5,'Tutor is so great! this is no.158 review ','2021-09-30 11:00:00'),
	(159,1,12,16,5,'Tutor is so great! this is no.159 review ','2021-09-30 11:00:00'),
	(160,1,12,17,5,'Tutor is so great! this is no.160 review ','2021-09-30 11:00:00'),
	(161,1,12,18,5,'Tutor is so great! this is no.161 review ','2021-09-30 11:00:00'),
	(162,1,12,19,5,'Tutor is so great! this is no.162 review ','2021-09-30 11:00:00'),
	(163,1,12,20,5,'Tutor is so great! this is no.163 review ','2021-09-30 11:00:00'),
	(164,1,12,12,5,'Tutor is so great! this is no.164 review ','2021-09-30 11:00:00'),
	(165,1,12,13,5,'Tutor is so great! this is no.165 review ','2021-09-30 11:00:00'),
	(166,1,12,14,5,'Tutor is so great! this is no.166 review ','2021-09-30 11:00:00'),
	(167,1,12,15,5,'Tutor is so great! this is no.167 review ','2021-09-30 11:00:00'),
	(168,1,12,16,5,'Tutor is so great! this is no.168 review ','2021-09-30 11:00:00'),
	(169,1,12,17,5,'Tutor is so great! this is no.169 review ','2021-09-30 11:00:00'),
	(170,1,12,18,5,'Tutor is so great! this is no.170 review ','2021-09-30 11:00:00'),
	(171,1,12,19,5,'Tutor is so great! this is no.171 review ','2021-09-30 11:00:00'),
	(172,1,12,20,5,'Tutor is so great! this is no.172 review ','2021-09-30 11:00:00'),
	(173,1,12,12,5,'Tutor is so great! this is no.173 review ','2021-09-30 11:00:00'),
	(174,1,12,13,5,'Tutor is so great! this is no.174 review ','2021-09-30 11:00:00'),
	(175,1,12,14,5,'Tutor is so great! this is no.175 review ','2021-09-30 11:00:00'),
	(176,1,12,15,5,'Tutor is so great! this is no.176 review ','2021-09-30 11:00:00'),
	(177,1,12,16,5,'Tutor is so great! this is no.177 review ','2021-09-30 11:00:00'),
	(178,1,12,17,5,'Tutor is so great! this is no.178 review ','2021-09-30 11:00:00'),
	(179,1,12,18,5,'Tutor is so great! this is no.179 review ','2021-09-30 11:00:00'),
	(180,1,12,19,5,'Tutor is so great! this is no.180 review ','2021-09-30 11:00:00'),
	(181,1,12,20,5,'Tutor is so great! this is no.181 review ','2021-09-30 11:00:00'),
	(182,1,12,12,5,'Tutor is so great! this is no.182 review ','2021-09-30 11:00:00'),
	(183,1,12,13,5,'Tutor is so great! this is no.183 review ','2021-09-30 11:00:00'),
	(184,1,12,14,5,'Tutor is so great! this is no.184 review ','2021-09-30 11:00:00'),
	(185,1,12,15,5,'Tutor is so great! this is no.185 review ','2021-09-30 11:00:00'),
	(186,1,12,16,5,'Tutor is so great! this is no.186 review ','2021-09-30 11:00:00'),
	(187,1,12,17,5,'Tutor is so great! this is no.187 review ','2021-09-30 11:00:00'),
	(188,1,12,18,5,'Tutor is so great! this is no.188 review ','2021-09-30 11:00:00'),
	(189,1,12,19,5,'Tutor is so great! this is no.189 review ','2021-09-30 11:00:00'),
	(190,1,12,20,5,'Tutor is so great! this is no.190 review ','2021-09-30 11:00:00'),
	(191,1,12,12,5,'Tutor is so great! this is no.191 review ','2021-09-30 11:00:00'),
	(192,1,12,13,5,'Tutor is so great! this is no.192 review ','2021-09-30 11:00:00'),
	(193,1,12,14,5,'Tutor is so great! this is no.193 review ','2021-09-30 11:00:00'),
	(194,1,12,15,5,'Tutor is so great! this is no.194 review ','2021-09-30 11:00:00'),
	(195,1,12,16,5,'Tutor is so great! this is no.195 review ','2021-09-30 11:00:00'),
	(196,1,12,17,5,'Tutor is so great! this is no.196 review ','2021-09-30 11:00:00'),
	(197,1,12,18,5,'Tutor is so great! this is no.197 review ','2021-09-30 11:00:00'),
	(198,1,12,19,5,'Tutor is so great! this is no.198 review ','2021-09-30 11:00:00'),
	(199,1,12,20,5,'Tutor is so great! this is no.199 review ','2021-09-30 11:00:00'),
	(200,1,12,12,5,'Tutor is so great! this is no.200 review ','2021-09-30 11:00:00'),
	(201,1,12,13,5,'Tutor is so great! this is no.201 review ','2021-09-30 11:00:00'),
	(202,1,12,14,5,'Tutor is so great! this is no.202 review ','2021-09-30 11:00:00'),
	(203,1,12,15,5,'Tutor is so great! this is no.203 review ','2021-09-30 11:00:00'),
	(204,1,12,16,5,'Tutor is so great! this is no.204 review ','2021-09-30 11:00:00'),
	(205,1,12,17,5,'Tutor is so great! this is no.205 review ','2021-09-30 11:00:00'),
	(206,1,12,18,5,'Tutor is so great! this is no.206 review ','2021-09-30 11:00:00'),
	(207,1,12,19,5,'Tutor is so great! this is no.207 review ','2021-09-30 11:00:00'),
	(208,1,12,20,5,'Tutor is so great! this is no.208 review ','2021-09-30 11:00:00'),
	(209,1,12,12,5,'Tutor is so great! this is no.209 review ','2021-09-30 11:00:00'),
	(210,1,12,13,5,'Tutor is so great! this is no.210 review ','2021-09-30 11:00:00'),
	(211,1,12,14,5,'Tutor is so great! this is no.211 review ','2021-09-30 11:00:00'),
	(212,1,12,15,5,'Tutor is so great! this is no.212 review ','2021-09-30 11:00:00'),
	(213,1,12,16,5,'Tutor is so great! this is no.213 review ','2021-09-30 11:00:00'),
	(214,1,12,17,5,'Tutor is so great! this is no.214 review ','2021-09-30 11:00:00'),
	(215,1,12,18,5,'Tutor is so great! this is no.215 review ','2021-09-30 11:00:00'),
	(216,1,12,19,5,'Tutor is so great! this is no.216 review ','2021-09-30 11:00:00'),
	(217,1,12,20,5,'Tutor is so great! this is no.217 review ','2021-09-30 11:00:00'),
	(218,1,12,12,5,'Tutor is so great! this is no.218 review ','2021-09-30 11:00:00'),
	(219,1,12,13,5,'Tutor is so great! this is no.219 review ','2021-09-30 11:00:00'),
	(220,1,12,14,5,'Tutor is so great! this is no.220 review ','2021-09-30 11:00:00'),
	(221,1,12,15,5,'Tutor is so great! this is no.221 review ','2021-09-30 11:00:00'),
	(222,1,12,16,5,'Tutor is so great! this is no.222 review ','2021-09-30 11:00:00'),
	(223,1,12,17,5,'Tutor is so great! this is no.223 review ','2021-09-30 11:00:00'),
	(224,1,12,18,5,'Tutor is so great! this is no.224 review ','2021-09-30 11:00:00'),
	(225,1,12,19,5,'Tutor is so great! this is no.225 review ','2021-09-30 11:00:00'),
	(226,1,12,20,5,'Tutor is so great! this is no.226 review ','2021-09-30 11:00:00'),
	(227,1,12,12,5,'Tutor is so great! this is no.227 review ','2021-09-30 11:00:00'),
	(228,1,12,13,5,'Tutor is so great! this is no.228 review ','2021-09-30 11:00:00'),
	(229,1,12,14,5,'Tutor is so great! this is no.229 review ','2021-09-30 11:00:00'),
	(230,1,12,15,5,'Tutor is so great! this is no.230 review ','2021-09-30 11:00:00'),
	(231,1,12,16,5,'Tutor is so great! this is no.231 review ','2021-09-30 11:00:00'),
	(232,1,12,17,5,'Tutor is so great! this is no.232 review ','2021-09-30 11:00:00'),
	(233,1,12,18,5,'Tutor is so great! this is no.233 review ','2021-09-30 11:00:00'),
	(234,1,12,19,5,'Tutor is so great! this is no.234 review ','2021-09-30 11:00:00'),
	(235,1,12,20,5,'Tutor is so great! this is no.235 review ','2021-09-30 11:00:00'),
	(236,1,12,12,5,'Tutor is so great! this is no.236 review ','2021-09-30 11:00:00'),
	(237,1,12,13,5,'Tutor is so great! this is no.237 review ','2021-09-30 11:00:00'),
	(238,1,12,14,5,'Tutor is so great! this is no.238 review ','2021-09-30 11:00:00'),
	(239,1,12,15,5,'Tutor is so great! this is no.239 review ','2021-09-30 11:00:00'),
	(240,1,12,16,5,'Tutor is so great! this is no.240 review ','2021-09-30 11:00:00'),
	(241,1,12,17,5,'Tutor is so great! this is no.241 review ','2021-09-30 11:00:00'),
	(242,1,12,18,5,'Tutor is so great! this is no.242 review ','2021-09-30 11:00:00'),
	(243,1,12,19,5,'Tutor is so great! this is no.243 review ','2021-09-30 11:00:00'),
	(244,1,12,20,5,'Tutor is so great! this is no.244 review ','2021-09-30 11:00:00'),
	(245,1,12,12,5,'Tutor is so great! this is no.245 review ','2021-09-30 11:00:00'),
	(246,1,12,13,5,'Tutor is so great! this is no.246 review ','2021-09-30 11:00:00'),
	(247,1,12,14,5,'Tutor is so great! this is no.247 review ','2021-09-30 11:00:00'),
	(248,1,12,15,5,'Tutor is so great! this is no.248 review ','2021-09-30 11:00:00'),
	(249,1,12,16,5,'Tutor is so great! this is no.249 review ','2021-09-30 11:00:00'),
	(250,1,12,17,5,'Tutor is so great! this is no.250 review ','2021-09-30 11:00:00'),
	(251,1,12,18,5,'Tutor is so great! this is no.251 review ','2021-09-30 11:00:00'),
	(252,1,12,19,5,'Tutor is so great! this is no.252 review ','2021-09-30 11:00:00'),
	(253,1,12,20,5,'Tutor is so great! this is no.253 review ','2021-09-30 11:00:00'),
	(254,1,12,16,5,'Tutor is so great! this is no.254 review ','2021-09-30 11:00:00'),
	(255,1,12,12,5,'Tutor is so great! this is no.255 review ','2021-09-30 11:00:00'),
	(256,1,12,14,5,'Tutor is so great! this is no.256 review ','2021-09-30 11:00:00'),
	(257,1,12,15,5,'Tutor is so great! this is no.257 review ','2021-09-30 11:00:00');

/*!40000 ALTER TABLE `ratings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table specialisations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `specialisations`;

CREATE TABLE `specialisations` (
  `specialisation_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `specialisation_name` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`specialisation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `specialisations` WRITE;
/*!40000 ALTER TABLE `specialisations` DISABLE KEYS */;

INSERT INTO `specialisations` (`specialisation_id`, `specialisation_name`)
VALUES
	(1,'Accounting'),
	(2,'Astrophysics'),
	(3,'Biology'),
	(4,'Business'),
	(5,'Chemistry'),
	(6,'Criminology'),
	(7,'Economics'),
	(8,'Finance'),
	(9,'History'),
	(10,'IT'),
	(11,'International Studies'),
	(12,'Journalism'),
	(13,'Linguistics'),
	(14,'Marketing'),
	(15,'Mathematics'),
	(16,'Music'),
	(17,'Philosophy'),
	(18,'Physics'),
	(19,'Physiology'),
	(20,'Politics'),
	(21,'Sociology'),
	(22,'Pyschology');

/*!40000 ALTER TABLE `specialisations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table times
# ------------------------------------------------------------

DROP TABLE IF EXISTS `times`;

CREATE TABLE `times` (
  `time_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `time_start` varchar(4) DEFAULT NULL,
  `time_end` varchar(4) DEFAULT NULL,
  `time_in_mintues` int(4) DEFAULT NULL,
  PRIMARY KEY (`time_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `times` WRITE;
/*!40000 ALTER TABLE `times` DISABLE KEYS */;

INSERT INTO `times` (`time_id`, `time_start`, `time_end`, `time_in_mintues`)
VALUES
	(1,'0700','0800',60),
	(2,'0800','0900',60),
	(3,'0900','1000',60),
	(4,'1000','1100',60),
	(5,'1100','1200',60),
	(6,'1200','1300',60),
	(7,'1300','1400',60),
	(8,'1400','1500',60),
	(9,'1500','1600',60),
	(10,'1600','1700',60),
	(11,'1700','1800',60),
	(12,'1800','1900',60),
	(13,'1900','2000',60),
	(14,'2000','2100',60),
	(15,'2100','2200',60),
	(16,'2200','2300',60);

/*!40000 ALTER TABLE `times` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table transactions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `transactions`;

CREATE TABLE `transactions` (
  `transaction_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `appointment_id` int(11) unsigned DEFAULT NULL,
  `account_id` int(11) unsigned DEFAULT NULL,
  `credit_or_debit` varchar(8) DEFAULT NULL,
  `amount` decimal(9,2) DEFAULT '0.00',
  `status` enum('Pending','Onhold','Completed') DEFAULT NULL,
  `completed_time` datetime DEFAULT NULL,
  `additional_info` varchar(255) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;

INSERT INTO `transactions` (`transaction_id`, `user_id`, `appointment_id`, `account_id`, `credit_or_debit`, `amount`, `status`, `completed_time`, `additional_info`, `created_time`)
VALUES
	(1,12,1,NULL,'debit',86.00,'Completed','2021-09-01 11:00:00',NULL,'2021-09-01 11:00:00'),
	(2,12,2,NULL,'debit',97.00,'Completed','2021-09-01 11:00:00',NULL,'2021-09-01 11:00:00'),
	(3,15,1,NULL,'credit',86.00,'Completed','2021-09-01 11:00:00',NULL,'2021-09-01 11:00:00'),
	(4,16,2,NULL,'credit',97.00,'Completed','2021-09-01 11:00:00',NULL,'2021-09-01 11:00:00');

/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tutor_hobbies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tutor_hobbies`;

CREATE TABLE `tutor_hobbies` (
  `tutor_hobby_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tutor_id` int(11) unsigned DEFAULT NULL,
  `hobby_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`tutor_hobby_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tutor_hobbies` WRITE;
/*!40000 ALTER TABLE `tutor_hobbies` DISABLE KEYS */;

INSERT INTO `tutor_hobbies` (`tutor_hobby_id`, `tutor_id`, `hobby_id`)
VALUES
	(7,11,4),
	(8,12,5),
	(9,13,3),
	(10,14,6),
	(11,15,1),
	(12,16,1),
	(13,17,1),
	(14,18,1),
	(15,19,1),
	(16,20,5),
	(17,13,6),
	(18,15,12),
	(19,18,7),
	(20,19,8);

/*!40000 ALTER TABLE `tutor_hobbies` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tutor_qualifications
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tutor_qualifications`;

CREATE TABLE `tutor_qualifications` (
  `tutor_qualification_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tutor_id` int(11) unsigned DEFAULT NULL,
  `qualification_type_id` int(11) DEFAULT NULL,
  `university_id` int(11) unsigned DEFAULT NULL,
  `complete_year` varchar(4) DEFAULT NULL,
  `gpa` decimal(9,2) DEFAULT '0.00',
  PRIMARY KEY (`tutor_qualification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tutor_qualifications` WRITE;
/*!40000 ALTER TABLE `tutor_qualifications` DISABLE KEYS */;

INSERT INTO `tutor_qualifications` (`tutor_qualification_id`, `tutor_id`, `qualification_type_id`, `university_id`, `complete_year`, `gpa`)
VALUES
	(3,11,3,1,'2010',87.60),
	(4,11,7,16,'2020',97.00),
	(5,12,4,1,'2011',86.00),
	(6,13,4,1,'2020',91.00),
	(7,14,4,2,'2011',89.90),
	(8,15,4,2,'2011',85.00),
	(9,16,4,2,'2011',80.00),
	(10,17,4,2,'2011',82.00),
	(11,18,7,2,'2011',91.00),
	(12,19,7,2,'2011',87.60),
	(13,20,7,2,'2019',76.00);

/*!40000 ALTER TABLE `tutor_qualifications` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tutor_specialisations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tutor_specialisations`;

CREATE TABLE `tutor_specialisations` (
  `tutor_specialisation_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `specialisation_id` int(11) unsigned NOT NULL,
  `tutor_id` int(11) NOT NULL,
  PRIMARY KEY (`tutor_specialisation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tutor_specialisations` WRITE;
/*!40000 ALTER TABLE `tutor_specialisations` DISABLE KEYS */;

INSERT INTO `tutor_specialisations` (`tutor_specialisation_id`, `specialisation_id`, `tutor_id`)
VALUES
	(2,2,11),
	(3,1,12),
	(4,1,13),
	(5,1,14),
	(6,1,15),
	(7,1,16),
	(8,1,17),
	(9,1,18),
	(10,1,19),
	(11,1,20),
	(12,3,20),
	(13,4,19),
	(14,5,18),
	(15,4,17),
	(16,2,16),
	(17,6,15);

/*!40000 ALTER TABLE `tutor_specialisations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tutor_teachings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tutor_teachings`;

CREATE TABLE `tutor_teachings` (
  `tutor_teaching_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tutor_id` int(11) unsigned DEFAULT NULL,
  `unit_code` varchar(16) DEFAULT NULL,
  `unit_name` varchar(128) DEFAULT NULL,
  `fees` decimal(9,2) DEFAULT NULL,
  PRIMARY KEY (`tutor_teaching_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tutor_teachings` WRITE;
/*!40000 ALTER TABLE `tutor_teachings` DISABLE KEYS */;

INSERT INTO `tutor_teachings` (`tutor_teaching_id`, `tutor_id`, `unit_code`, `unit_name`, `fees`)
VALUES
	(1,11,'SIT223','Data Structure',60.00),
	(2,12,'SIT223','Data Structure',16.99),
	(3,13,'SIT223','Data Structure',29.00),
	(4,14,'SIT223','Data Structure',22.00),
	(5,15,'SIT223','Data Structure',32.00),
	(6,16,'SIT223','Data Structure',35.00),
	(7,17,'SIT223','Data Structure',80.00),
	(8,18,'SIT223','Data Structure',78.00),
	(9,19,'SIT223','Data Structure',66.00),
	(10,20,'SIT223','Data Structure',55.00);

/*!40000 ALTER TABLE `tutor_teachings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tutors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tutors`;

CREATE TABLE `tutors` (
  `tutor_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `profile_image` varchar(128) DEFAULT NULL,
  `average_rating` decimal(6,2) DEFAULT '0.00',
  `profile_introduction` longtext,
  `tutoring_strategies` longtext,
  `created_time` datetime DEFAULT NULL,
  PRIMARY KEY (`tutor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tutors` WRITE;
/*!40000 ALTER TABLE `tutors` DISABLE KEYS */;

INSERT INTO `tutors` (`tutor_id`, `user_id`, `profile_image`, `average_rating`, `profile_introduction`, `tutoring_strategies`, `created_time`)
VALUES
	(11,14,NULL,5.00,'Disciplined and enthusiastic sales associate, conversant with POS and stock management systems. Eager to join the ABC Store team to boost sales numbers and customer loyalty metrics. Previous retail experience includes a summer job as a restocker and cashier at DEF Store. Commended on multiple occasions by the store management and customers themselves for superb customer service and communication skills.','Accomplished and highly-organized Project Manager (PMP certified) with a Ph.D. in physics and over 10 years of professional experience managing complex projects in the financial industry. Eager to join ABC Bank to help define product roll-out strategy, track progress against goals, and manage execution projects. ','2021-09-30 05:59:55'),
	(12,15,'/img/Assets//Tutor_Search/tutor_1.png',4.50,'Disciplined and enthusiastic sales associate, conversant with POS and stock management systems. Eager to join the ABC Store team to boost sales numbers and customer loyalty metrics. Previous retail experience includes a summer job as a restocker and cashier at DEF Store. Commended on multiple occasions by the store management and customers themselves for superb customer service and communication skills.','Accomplished and highly-organized Project Manager (PMP certified) with a Ph.D. in physics and over 10 years of professional experience managing complex projects in the financial industry. Eager to join ABC Bank to help define product roll-out strategy, track progress against goals, and manage execution projects. ',NULL),
	(13,16,'/img/Assets//Tutor_Search/tutor_2.png',4.70,'Disciplined and enthusiastic sales associate, conversant with POS and stock management systems. Eager to join the ABC Store team to boost sales numbers and customer loyalty metrics. Previous retail experience includes a summer job as a restocker and cashier at DEF Store. Commended on multiple occasions by the store management and customers themselves for superb customer service and communication skills.','Accomplished and highly-organized Project Manager (PMP certified) with a Ph.D. in physics and over 10 years of professional experience managing complex projects in the financial industry. Eager to join ABC Bank to help define product roll-out strategy, track progress against goals, and manage execution projects. ',NULL),
	(14,17,'/img/Assets//Tutor_Search/tutor_3.png',3.70,'Disciplined and enthusiastic sales associate, conversant with POS and stock management systems. Eager to join the ABC Store team to boost sales numbers and customer loyalty metrics. Previous retail experience includes a summer job as a restocker and cashier at DEF Store. Commended on multiple occasions by the store management and customers themselves for superb customer service and communication skills.','Accomplished and highly-organized Project Manager (PMP certified) with a Ph.D. in physics and over 10 years of professional experience managing complex projects in the financial industry. Eager to join ABC Bank to help define product roll-out strategy, track progress against goals, and manage execution projects. ',NULL),
	(15,18,'/img/Assets//Tutor_Search/tutor_4.png',2.70,'Disciplined and enthusiastic sales associate, conversant with POS and stock management systems. Eager to join the ABC Store team to boost sales numbers and customer loyalty metrics. Previous retail experience includes a summer job as a restocker and cashier at DEF Store. Commended on multiple occasions by the store management and customers themselves for superb customer service and communication skills.','Accomplished and highly-organized Project Manager (PMP certified) with a Ph.D. in physics and over 10 years of professional experience managing complex projects in the financial industry. Eager to join ABC Bank to help define product roll-out strategy, track progress against goals, and manage execution projects. ',NULL),
	(16,19,'/img/Assets//Tutor_Search/tutor_5.png',1.20,'Disciplined and enthusiastic sales associate, conversant with POS and stock management systems. Eager to join the ABC Store team to boost sales numbers and customer loyalty metrics. Previous retail experience includes a summer job as a restocker and cashier at DEF Store. Commended on multiple occasions by the store management and customers themselves for superb customer service and communication skills.','Accomplished and highly-organized Project Manager (PMP certified) with a Ph.D. in physics and over 10 years of professional experience managing complex projects in the financial industry. Eager to join ABC Bank to help define product roll-out strategy, track progress against goals, and manage execution projects. ',NULL),
	(17,20,'/img/Assets//Tutor_Search/tutor_6.png',4.70,'Disciplined and enthusiastic sales associate, conversant with POS and stock management systems. Eager to join the ABC Store team to boost sales numbers and customer loyalty metrics. Previous retail experience includes a summer job as a restocker and cashier at DEF Store. Commended on multiple occasions by the store management and customers themselves for superb customer service and communication skills.','Accomplished and highly-organized Project Manager (PMP certified) with a Ph.D. in physics and over 10 years of professional experience managing complex projects in the financial industry. Eager to join ABC Bank to help define product roll-out strategy, track progress against goals, and manage execution projects. ',NULL),
	(18,21,'/img/Assets//Tutor_Search/tutor_1.png',4.60,'Disciplined and enthusiastic sales associate, conversant with POS and stock management systems. Eager to join the ABC Store team to boost sales numbers and customer loyalty metrics. Previous retail experience includes a summer job as a restocker and cashier at DEF Store. Commended on multiple occasions by the store management and customers themselves for superb customer service and communication skills.','Accomplished and highly-organized Project Manager (PMP certified) with a Ph.D. in physics and over 10 years of professional experience managing complex projects in the financial industry. Eager to join ABC Bank to help define product roll-out strategy, track progress against goals, and manage execution projects. ',NULL),
	(19,22,'/img/Assets//Tutor_Search/tutor_2.png',4.70,'Disciplined and enthusiastic sales associate, conversant with POS and stock management systems. Eager to join the ABC Store team to boost sales numbers and customer loyalty metrics. Previous retail experience includes a summer job as a restocker and cashier at DEF Store. Commended on multiple occasions by the store management and customers themselves for superb customer service and communication skills.','Accomplished and highly-organized Project Manager (PMP certified) with a Ph.D. in physics and over 10 years of professional experience managing complex projects in the financial industry. Eager to join ABC Bank to help define product roll-out strategy, track progress against goals, and manage execution projects. ',NULL),
	(20,23,'/img/Assets//Tutor_Search/tutor_3.png',4.70,'Disciplined and enthusiastic sales associate, conversant with POS and stock management systems. Eager to join the ABC Store team to boost sales numbers and customer loyalty metrics. Previous retail experience includes a summer job as a restocker and cashier at DEF Store. Commended on multiple occasions by the store management and customers themselves for superb customer service and communication skills.','Accomplished and highly-organized Project Manager (PMP certified) with a Ph.D. in physics and over 10 years of professional experience managing complex projects in the financial industry. Eager to join ABC Bank to help define product roll-out strategy, track progress against goals, and manage execution projects. ',NULL);

/*!40000 ALTER TABLE `tutors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table universities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `universities`;

CREATE TABLE `universities` (
  `university_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `university_name` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`university_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `universities` WRITE;
/*!40000 ALTER TABLE `universities` DISABLE KEYS */;

INSERT INTO `universities` (`university_id`, `university_name`)
VALUES
	(1,'Australian National Unversity'),
	(2,'University of Sydney'),
	(3,'University of Melbourne'),
	(4,'University of New South Wales'),
	(5,'University of Queensland'),
	(6,'Monash University'),
	(7,'University of Western Australia'),
	(8,'University of Adelaide'),
	(9,'University of Technology Sydney'),
	(10,'University of Wollongong'),
	(11,'University of Newcastle, Australia'),
	(12,'Macquarie University'),
	(13,'Curtin University'),
	(14,'Queensland University of Technology'),
	(15,'RMIT University'),
	(16,'Deakin University'),
	(17,'University of South Australia'),
	(18,'Griffith University'),
	(19,'University of Tasmania'),
	(20,'Swinburne University of Technology'),
	(21,'La Trobe University'),
	(22,'Bond University'),
	(23,'Flinders University'),
	(24,'James Cook University'),
	(25,'University of Western Sydney'),
	(26,'Victoria University, Melbourne'),
	(27,'Murdoch University'),
	(28,'Central Queensland University'),
	(29,'Edith Cowan University'),
	(30,'Charles Darwin University'),
	(31,'University of Southern Queensland'),
	(32,'Southern Cross University'),
	(33,'Australian Catholic University'),
	(34,'University of New England');

/*!40000 ALTER TABLE `universities` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(128) NOT NULL DEFAULT '',
  `first_name` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `balance` decimal(9,0) DEFAULT '0',
  `mobile` varchar(11) DEFAULT NULL,
  `is_tutor` tinyint(1) DEFAULT '0',
  `is_email_verified` tinyint(1) DEFAULT '0',
  `email_verified_time` datetime DEFAULT NULL,
  `token` varchar(128) DEFAULT NULL,
  `token_expire_time` datetime DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`user_id`, `email`, `password`, `first_name`, `last_name`, `balance`, `mobile`, `is_tutor`, `is_email_verified`, `email_verified_time`, `token`, `token_expire_time`, `created_time`)
VALUES
	(12,'utute2021@gmail.com','$2y$10$Zy9QlrvxxZgl4enYsqu.ousqhtWmtshVQhsCFEUiNlSkhQ8eYci0S','Tester','Sur',0,'',0,1,'2021-09-16 06:31:51',NULL,NULL,'2021-09-16 06:31:51'),
	(14,'utute2021@gmail.com','$2y$10$Zy9QlrvxxZgl4enYsqu.ousqhtWmtshVQhsCFEUiNlSkhQ8eYci0S','Peibing','Gu',0,'',0,1,'2021-09-16 06:31:51',NULL,NULL,'2021-09-16 06:31:51'),
	(15,'utute2021@gmail.com','$2y$10$Zy9QlrvxxZgl4enYsqu.ousqhtWmtshVQhsCFEUiNlSkhQ8eYci0S','Jane','Citizen',0,NULL,1,1,NULL,NULL,NULL,NULL),
	(16,'utute2021@gmail.com','$2y$10$Zy9QlrvxxZgl4enYsqu.ousqhtWmtshVQhsCFEUiNlSkhQ8eYci0S','John','Doe',0,NULL,1,1,NULL,NULL,NULL,NULL),
	(17,'utute2021@gmail.com','$2y$10$Zy9QlrvxxZgl4enYsqu.ousqhtWmtshVQhsCFEUiNlSkhQ8eYci0S','Jill','Smith',0,NULL,1,1,NULL,NULL,NULL,NULL),
	(18,'utute2021@gmail.com','$2y$10$Zy9QlrvxxZgl4enYsqu.ousqhtWmtshVQhsCFEUiNlSkhQ8eYci0S','Robert','Power',0,NULL,1,1,NULL,NULL,NULL,NULL),
	(19,'utute2021@gmail.com','$2y$10$Zy9QlrvxxZgl4enYsqu.ousqhtWmtshVQhsCFEUiNlSkhQ8eYci0S','James','Toretto',0,NULL,1,1,NULL,NULL,NULL,NULL),
	(20,'utute2021@gmail.com','$2y$10$Zy9QlrvxxZgl4enYsqu.ousqhtWmtshVQhsCFEUiNlSkhQ8eYci0S','Margaret','Curie',0,NULL,1,1,NULL,NULL,NULL,NULL),
	(21,'utute2021@gmail.com','$2y$10$Zy9QlrvxxZgl4enYsqu.ousqhtWmtshVQhsCFEUiNlSkhQ8eYci0S','Jona','Tim',0,NULL,1,1,NULL,NULL,NULL,NULL),
	(22,'utute2021@gmail.com','$2y$10$Zy9QlrvxxZgl4enYsqu.ousqhtWmtshVQhsCFEUiNlSkhQ8eYci0S','Rokie','Dean',0,NULL,1,1,NULL,NULL,NULL,NULL),
	(23,'utute2021@gmail.com','$2y$10$Zy9QlrvxxZgl4enYsqu.ousqhtWmtshVQhsCFEUiNlSkhQ8eYci0S','Warren','Gut',0,NULL,1,1,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
