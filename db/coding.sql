-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for coding
CREATE DATABASE IF NOT EXISTS `coding` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `coding`;

-- Dumping structure for table coding.aboutus
CREATE TABLE IF NOT EXISTS `aboutus` (
  `id` int(11) NOT NULL,
  `content` varchar(10000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table coding.akses
CREATE TABLE IF NOT EXISTS `akses` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table coding.answer
CREATE TABLE IF NOT EXISTS `answer` (
  `id_question` int(11) DEFAULT NULL,
  `optionid` int(11) DEFAULT NULL,
  KEY `id_question` (`id_question`),
  KEY `optionid` (`optionid`),
  CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`optionid`) REFERENCES `options` (`optionid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table coding.history
CREATE TABLE IF NOT EXISTS `history` (
  `email` varchar(100) DEFAULT NULL,
  `idq` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `benar` int(11) DEFAULT NULL,
  `salah` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table coding.kelas
CREATE TABLE IF NOT EXISTS `kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(500) DEFAULT NULL,
  `foto` varchar(500) DEFAULT NULL,
  `pdf1` varchar(500) DEFAULT NULL,
  `pdf2` varchar(500) DEFAULT NULL,
  `pdf3` varchar(500) DEFAULT NULL,
  `video` varchar(500) DEFAULT NULL,
  `caption` text,
  `harga` int(11) DEFAULT NULL,
  `id_quiz` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_quiz` (`id_quiz`),
  CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`idq`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table coding.options
CREATE TABLE IF NOT EXISTS `options` (
  `optionid` int(11) NOT NULL AUTO_INCREMENT,
  `id_question` int(11) DEFAULT NULL,
  `option` text,
  PRIMARY KEY (`optionid`),
  KEY `id_question` (`id_question`),
  CONSTRAINT `options_ibfk_1` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table coding.pembayaran
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(500) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL,
  `bayar` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kelas` (`id_kelas`),
  CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table coding.questions
CREATE TABLE IF NOT EXISTS `questions` (
  `id_question` int(11) NOT NULL,
  `pertanyaan` text,
  `choice` int(11) DEFAULT NULL,
  `sn` int(11) DEFAULT NULL,
  `idq` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_question`),
  KEY `idq` (`idq`),
  CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`idq`) REFERENCES `quiz` (`idq`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table coding.quiz
CREATE TABLE IF NOT EXISTS `quiz` (
  `idq` int(11) NOT NULL,
  `nama_quiz` varchar(50) NOT NULL DEFAULT '',
  `benar` varchar(50) NOT NULL DEFAULT '',
  `salah` varchar(50) NOT NULL DEFAULT '',
  `total` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idq`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table coding.rank
CREATE TABLE IF NOT EXISTS `rank` (
  `email` varchar(50) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table coding.team
CREATE TABLE IF NOT EXISTS `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table coding.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `google_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hire_date` datetime DEFAULT NULL,
  `umur` date DEFAULT NULL,
  `no_tlp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `latar_image` text COLLATE utf8mb4_unicode_ci,
  `id_kelas` int(11) DEFAULT NULL,
  `id_level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `google_id` (`google_id`),
  KEY `id_level` (`id_level`),
  KEY `id_kelas` (`id_kelas`),
  CONSTRAINT `FK_users_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `akses` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
