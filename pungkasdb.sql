-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for pungkasdb
CREATE DATABASE IF NOT EXISTS `pungkasdb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `pungkasdb`;

-- Dumping structure for table pungkasdb.contact
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table pungkasdb.contact: ~2 rows (approximately)
DELETE FROM `contact`;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `submitted_at`) VALUES
	(1, 'aaa', 'asdad@gmail.com', 'adasdasdasd', 'xx', '2024-10-23 18:20:36'),
	(2, 'aaaa', 'aaa@gmail.com', 'adasdasdasd', 'mm', '2024-10-23 18:22:24'),
	(3, 'aaa', 'asdad@gmail.com', 'adasdasdasd', 'halo', '2024-10-23 18:30:55');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;

-- Dumping structure for table pungkasdb.contact_info
CREATE TABLE IF NOT EXISTS `contact_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `platform` varchar(255) NOT NULL,
  `icon_url` varchar(255) NOT NULL,
  `contact_detail` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table pungkasdb.contact_info: ~3 rows (approximately)
DELETE FROM `contact_info`;
/*!40000 ALTER TABLE `contact_info` DISABLE KEYS */;
INSERT INTO `contact_info` (`id`, `platform`, `icon_url`, `contact_detail`) VALUES
	(1, 'Email', 'https://img.icons8.com/color/48/000000/gmail-new.png', 'pungkasadelia@gmail.com'),
	(2, 'WhatsApp', 'https://img.icons8.com/color/48/000000/whatsapp.png', '08579752499'),
	(3, 'Instagram', 'https://img.icons8.com/color/48/000000/domain.png', '@pungkasarit.a');
/*!40000 ALTER TABLE `contact_info` ENABLE KEYS */;

-- Dumping structure for table pungkasdb.education
CREATE TABLE IF NOT EXISTS `education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `institution` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start_year` year(4) NOT NULL,
  `end_year` year(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table pungkasdb.education: ~4 rows (approximately)
DELETE FROM `education`;
/*!40000 ALTER TABLE `education` DISABLE KEYS */;
INSERT INTO `education` (`id`, `institution`, `description`, `start_year`, `end_year`) VALUES
	(1, 'SDN 03 Pondok Betung', 'Saya menumpuh pendidikan sekolah dasar selama 6 tahun.', '2011', '2017'),
	(2, 'SMP Negeri 14 Tangerang Selatan', 'Saya menempuh pendidikan di SMP selama 3 tahun.', '2017', '2020'),
	(3, 'SMA Kartika X-1 Jakarta', 'Saya mengambil jurusan IPA dan menyelesaikan pendidikan SMA dalam 3 tahun.', '2020', '2023'),
	(4, 'Universitas Pembangunan Jaya', 'Saya sedang menempuh pendidikan S1 di Universitas Pembangunan Jaya.', '2023', '0000');
/*!40000 ALTER TABLE `education` ENABLE KEYS */;

-- Dumping structure for table pungkasdb.experiences
CREATE TABLE IF NOT EXISTS `experiences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `year_start` year(4) NOT NULL,
  `year_end` year(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table pungkasdb.experiences: ~6 rows (approximately)
DELETE FROM `experiences`;
/*!40000 ALTER TABLE `experiences` DISABLE KEYS */;
INSERT INTO `experiences` (`id`, `section`, `title`, `description`, `year_start`, `year_end`) VALUES
	(1, 'ORG', 'Koordinator Humas HIMPUNAN MAHASISWA INFORMATIKA (2024)', 'Sebagai Koordinator Humas di Himpunan Mahasiswa, saya bertanggung jawab mengelola komunikasi eksternal organisasi...', '2024', '2024'),
	(2, 'ANIS', 'Bendahara UKM Dakauri (2024)', 'Dalam peran sebagai Bendahara UKM Dakauri, saya mengelola seluruh aspek keuangan organisasi...', '2024', '2024'),
	(3, 'ASI', 'Koordinator Seksi Bidang OSIS (2022-2023)', 'Menjadi mentor dalam OSPEK (PRIMA) adalah pengalaman luar biasa...', '2022', '2023'),
	(4, 'EXP', 'Dambades (Juli 2024)', 'Pengabdian kepada masyarakat dengan pembelajaran e-commerce bertujuan untuk memberikan edukasi kepada masyarakat...', '2024', '2024'),
	(5, 'ERIE', 'Latris 2 Indonesia (Mei 2024)', 'Pengabdian masyarakat di SMK Letris 2 Indonesia mengenai computational thinking bertujuan untuk mengenalkan konsep berpikir komputasional...', '2024', '2024'),
	(6, 'NCE', 'Panitia PRIMA (Agustus 2024)', 'Menjadi mentor dalam OSPEK (PRIMA) adalah pengalaman luar biasa...', '2024', '2024');
/*!40000 ALTER TABLE `experiences` ENABLE KEYS */;

-- Dumping structure for table pungkasdb.skills
CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` enum('hard','soft') NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table pungkasdb.skills: ~6 rows (approximately)
DELETE FROM `skills`;
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
INSERT INTO `skills` (`id`, `category`, `name`, `description`, `img_url`) VALUES
	(1, 'hard', 'C Programming', 'Menguasai konsep dasar pemrograman seperti pointer, array, dan manajemen memori.', 'images/c-removebg-preview (1).png'),
	(2, 'hard', 'Python Programming', 'Menguasai konsep dasar pemrograman.', 'images/phyton-removebg-preview.png'),
	(3, 'hard', 'PHP Programming', 'Menguasai pengembangan backend untuk aplikasi web dinamis.', 'images/php.png'),
	(4, 'soft', 'Cepat Tanggap', 'Responsif terhadap perubahan atau masalah yang muncul dengan cepat dan efektif.', NULL),
	(5, 'soft', 'Bekerjasama dalam Tim', 'Kolaborasi dengan berbagai orang dan latar belakang untuk mencapai tujuan bersama.', NULL),
	(6, 'soft', 'Kreatif dan Solutif', 'Mampu berpikir out-of-the-box untuk menemukan ide-ide baru yang inovatif.', NULL);
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
