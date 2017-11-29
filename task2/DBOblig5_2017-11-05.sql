# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.17)
# Database: DBOblig5
# Generation Time: 2017-11-05 19:41:17 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Cities
# ------------------------------------------------------------

CREATE TABLE `Cities` (
  `cityname` varchar(256) NOT NULL DEFAULT '',
  `county` varchar(256) NOT NULL DEFAULT '',
  PRIMARY KEY (`cityname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Clubs
# ------------------------------------------------------------

CREATE TABLE `Clubs` (
  `id` varchar(256) NOT NULL DEFAULT '',
  `name` varchar(256) NOT NULL DEFAULT '',
  `city` varchar(256) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Logs
# ------------------------------------------------------------

CREATE TABLE `Logs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `season` year(4) NOT NULL,
  `club` varchar(256) DEFAULT '',
  `skier` varchar(256) NOT NULL DEFAULT '',
  `date` date NOT NULL,
  `area` varchar(256) NOT NULL DEFAULT '',
  `distance` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Season
# ------------------------------------------------------------

CREATE TABLE `Season` (
  `year` year(4) NOT NULL,
  PRIMARY KEY (`year`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Skier
# ------------------------------------------------------------

CREATE TABLE `Skier` (
  `username` varchar(11) NOT NULL DEFAULT '',
  `firstname` varchar(256) NOT NULL DEFAULT '',
  `lastname` varchar(256) NOT NULL,
  `birthyear` year(4) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Totaldistance
# ------------------------------------------------------------

CREATE TABLE `Totaldistance` (
  `skier` varchar(256) NOT NULL DEFAULT '',
  `season` year(4) NOT NULL,
  `distance` int(11) unsigned NOT NULL,
  PRIMARY KEY (`skier`,`season`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
