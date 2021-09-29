# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.26)
# Database: SIT223-utute-v1
# Generation Time: 2021-09-29 06:41:27 +0000
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

CREATE TABLE `appointments` (
  `appointment_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `tutor_id` int(11) unsigned DEFAULT NULL,
  `qualification_id` int(11) unsigned DEFAULT NULL,
  `appt_start_time` datetime DEFAULT NULL,
  `appt_end_time` datetime DEFAULT NULL,
  `status` enum('Requested','Declined','Approved','Completed') DEFAULT 'Requested',
  `meeting_url` varchar(255) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `fees` decimal(9,2) DEFAULT '0.00',
  PRIMARY KEY (`appointment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table availabilities
# ------------------------------------------------------------

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


# Dump of table messages
# ------------------------------------------------------------

CREATE TABLE `messages` (
  `message_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `from_user_id` int(11) unsigned DEFAULT NULL,
  `to_user_id` int(11) unsigned DEFAULT NULL,
  `message_content` longtext,
  `is_new` tinyint(1) DEFAULT '1',
  `created_time` datetime DEFAULT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table qualification_types
# ------------------------------------------------------------

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



# Dump of table specialisations
# ------------------------------------------------------------

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



# Dump of table tutor_qualifications
# ------------------------------------------------------------

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
	(1,1,NULL,16,'',0.00);

/*!40000 ALTER TABLE `tutor_qualifications` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tutor_specialisations
# ------------------------------------------------------------

CREATE TABLE `tutor_specialisations` (
  `tutor_specialisation_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `specialisation_id` int(11) unsigned NOT NULL,
  `tutor_id` int(11) NOT NULL,
  PRIMARY KEY (`tutor_specialisation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table tutor_teachings
# ------------------------------------------------------------

CREATE TABLE `tutor_teachings` (
  `teaching_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tutor_id` int(11) unsigned DEFAULT NULL,
  `unit_code` varchar(16) DEFAULT NULL,
  `unit_name` varchar(128) DEFAULT NULL,
  `fees` decimal(9,2) DEFAULT NULL,
  PRIMARY KEY (`teaching_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table tutors
# ------------------------------------------------------------

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
	(1,15,'/img/Assets/Tutor_Search/tutor_1.png',0.00,NULL,NULL,NULL);

/*!40000 ALTER TABLE `tutors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table universities
# ------------------------------------------------------------

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
	(14,'peibing.gu@hotmail.com','$2y$10$Zy9QlrvxxZgl4enYsqu.ousqhtWmtshVQhsCFEUiNlSkhQ8eYci0S','Peibing','Gu',0,'0488646369',0,1,'2021-09-16 06:31:51',NULL,NULL,'2021-09-16 06:31:51'),
	(15,'jane@citizen.com','','Jane','Citizen',0,NULL,1,1,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
