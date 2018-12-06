-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.34-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table jpmandiri.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table jpmandiri.migrations: ~2 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table jpmandiri.m_desa
CREATE TABLE IF NOT EXISTS `m_desa` (
  `id` int(11) NOT NULL,
  `kecamatan_id` int(20) DEFAULT NULL,
  `nama` varchar(300) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_m_desa_m_kecamatan` (`kecamatan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table jpmandiri.m_desa: ~0 rows (approximately)
/*!40000 ALTER TABLE `m_desa` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_desa` ENABLE KEYS */;

-- Dumping structure for table jpmandiri.m_kecamatan
CREATE TABLE IF NOT EXISTS `m_kecamatan` (
  `id` int(11) NOT NULL,
  `kota_id` int(11) DEFAULT NULL,
  `nama` varchar(300) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_m_kecamatan_m_kota` (`kota_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table jpmandiri.m_kecamatan: ~0 rows (approximately)
/*!40000 ALTER TABLE `m_kecamatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_kecamatan` ENABLE KEYS */;

-- Dumping structure for table jpmandiri.m_kota
CREATE TABLE IF NOT EXISTS `m_kota` (
  `id` int(11) NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  `nama` varchar(300) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_m_kota_m_provinsi` (`provinsi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table jpmandiri.m_kota: ~0 rows (approximately)
/*!40000 ALTER TABLE `m_kota` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_kota` ENABLE KEYS */;

-- Dumping structure for table jpmandiri.m_provinsi
CREATE TABLE IF NOT EXISTS `m_provinsi` (
  `id` int(11) NOT NULL,
  `nama` varchar(300) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table jpmandiri.m_provinsi: ~0 rows (approximately)
/*!40000 ALTER TABLE `m_provinsi` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_provinsi` ENABLE KEYS */;

-- Dumping structure for table jpmandiri.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table jpmandiri.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table jpmandiri.s_cabang
CREATE TABLE IF NOT EXISTS `s_cabang` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `telpon` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `kota_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table jpmandiri.s_cabang: ~0 rows (approximately)
/*!40000 ALTER TABLE `s_cabang` DISABLE KEYS */;
REPLACE INTO `s_cabang` (`id`, `kode`, `nama`, `alamat`, `telpon`, `fax`, `kota_id`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(1, '000', 'JPM PUSAT', 'karah ', NULL, NULL, NULL, '2018-12-04 08:34:24', '2018-12-04 08:34:23', 'ADI', 'ADI');
/*!40000 ALTER TABLE `s_cabang` ENABLE KEYS */;

-- Dumping structure for table jpmandiri.s_chat_log
CREATE TABLE IF NOT EXISTS `s_chat_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chat` text,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table jpmandiri.s_chat_log: ~0 rows (approximately)
/*!40000 ALTER TABLE `s_chat_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `s_chat_log` ENABLE KEYS */;

-- Dumping structure for table jpmandiri.s_connection
CREATE TABLE IF NOT EXISTS `s_connection` (
  `id` int(11) NOT NULL,
  `host` varchar(50) DEFAULT NULL,
  `database` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table jpmandiri.s_connection: ~2 rows (approximately)
/*!40000 ALTER TABLE `s_connection` DISABLE KEYS */;
REPLACE INTO `s_connection` (`id`, `host`, `database`, `username`, `password`, `created_at`, `updated_at`) VALUES
	(1, 'localhost', 'jpmandiri', 'root', '', '2018-12-04 09:57:49', '0000-00-00 00:00:00'),
	(2, 'localhost', 'jpmandiri_backup', 'root', '', '2018-12-04 09:57:49', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `s_connection` ENABLE KEYS */;

-- Dumping structure for table jpmandiri.s_daftar_menu
CREATE TABLE IF NOT EXISTS `s_daftar_menu` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `group_menu_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `FK_s_daftar_menu_s_group_menu` (`group_menu_id`),
  CONSTRAINT `FK_s_daftar_menu_s_group_menu` FOREIGN KEY (`group_menu_id`) REFERENCES `s_group_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table jpmandiri.s_daftar_menu: ~13 rows (approximately)
/*!40000 ALTER TABLE `s_daftar_menu` DISABLE KEYS */;
REPLACE INTO `s_daftar_menu` (`id`, `nama`, `keterangan`, `group_menu_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(1, 'setting group menu', '-', 1, 1, 1, '2018-12-06 13:55:47', '2018-12-06 13:55:47'),
	(2, 'setting daftar menu', '-', 1, 1, 1, '2018-12-06 13:56:35', '2018-12-06 13:56:35'),
	(3, 'setting hak akses', '-', 1, 1, 1, '2018-12-06 13:57:27', '2018-12-06 13:57:27'),
	(4, 'setting user', '-', 1, 1, 1, '2018-12-06 13:57:43', '2018-12-06 13:57:43'),
	(5, 'setting jabatan', '-', 1, 1, 1, '2018-12-06 13:57:52', '2018-12-06 13:57:52'),
	(6, 'setting cabang', '-', 1, 1, 1, '2018-12-06 13:58:14', '2018-12-06 13:58:14'),
	(7, 'setting database', '-', 1, 0, 1, '2018-12-06 14:24:00', '2018-12-06 14:24:00'),
	(8, 'setting tambah periode', '-', 2, 0, 1, '2018-12-06 14:25:24', '2018-12-06 14:25:24'),
	(9, 'setting periode', '-', 2, 0, 1, '2018-12-06 14:25:32', '2018-12-06 14:25:32'),
	(10, 'master provinsi', '-', 3, 0, 1, '2018-12-06 21:54:37', '2018-12-06 21:54:37'),
	(11, 'master kota', '-', 3, 0, 1, '2018-12-06 21:57:48', '2018-12-06 21:57:48'),
	(12, 'master perusahaan', '-', 3, 0, 1, '2018-12-06 21:57:32', '2018-12-06 21:57:32'),
	(13, 'master kecamatan', '-', 3, 1, 1, '2018-12-06 23:37:23', '2018-12-06 23:37:23'),
	(14, 'master desa', '-', 3, 1, 1, '2018-12-06 23:37:48', '2018-12-06 23:37:48');
/*!40000 ALTER TABLE `s_daftar_menu` ENABLE KEYS */;

-- Dumping structure for table jpmandiri.s_group_menu
CREATE TABLE IF NOT EXISTS `s_group_menu` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table jpmandiri.s_group_menu: ~2 rows (approximately)
/*!40000 ALTER TABLE `s_group_menu` DISABLE KEYS */;
REPLACE INTO `s_group_menu` (`id`, `nama`, `keterangan`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(1, 'setting utility', 'SETTING UTILITY', '2018-12-06 11:38:40', '2018-12-06 11:38:52', 1, 1),
	(2, 'setting keuangan', 'setting keuangan', '2018-12-06 11:39:04', '2018-12-06 11:39:04', 1, 1),
	(3, 'master bersama', 'MASTER BERSAMA', '2018-12-06 21:51:43', '2018-12-06 21:51:43', 1, 1);
/*!40000 ALTER TABLE `s_group_menu` ENABLE KEYS */;

-- Dumping structure for table jpmandiri.s_hak_akses
CREATE TABLE IF NOT EXISTS `s_hak_akses` (
  `id` int(11) NOT NULL,
  `dt` int(11) NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `daftar_menu` varchar(100) DEFAULT NULL,
  `daftar_menu_id` int(11) DEFAULT NULL,
  `aktif` int(11) NOT NULL DEFAULT '0',
  `tambah` int(11) NOT NULL DEFAULT '0',
  `ubah` int(11) NOT NULL DEFAULT '0',
  `hapus` int(11) NOT NULL DEFAULT '0',
  `cabang` int(11) NOT NULL DEFAULT '0',
  `global` int(11) NOT NULL DEFAULT '0',
  `print` int(11) NOT NULL DEFAULT '0',
  `validasi` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`,`dt`),
  KEY `FK_s_hak_akses_s_jabatan` (`jabatan_id`),
  KEY `FK_s_hak_akses_s_daftar_menu` (`daftar_menu_id`),
  CONSTRAINT `FK_s_hak_akses_s_daftar_menu` FOREIGN KEY (`daftar_menu_id`) REFERENCES `s_daftar_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_s_hak_akses_s_jabatan` FOREIGN KEY (`jabatan_id`) REFERENCES `s_jabatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table jpmandiri.s_hak_akses: ~52 rows (approximately)
/*!40000 ALTER TABLE `s_hak_akses` DISABLE KEYS */;
REPLACE INTO `s_hak_akses` (`id`, `dt`, `jabatan_id`, `daftar_menu`, `daftar_menu_id`, `aktif`, `tambah`, `ubah`, `hapus`, `cabang`, `global`, `print`, `validasi`, `created_at`, `updated_at`, `updated_by`, `created_by`) VALUES
	(1, 1, 1, 'setting group menu', 1, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 13:55:47', '2018-12-06 20:25:00', 1, 1),
	(2, 2, 2, 'setting group menu', 1, 1, 1, 0, 0, 0, 0, 0, 0, '2018-12-06 13:55:47', '2018-12-06 20:25:00', 1, 1),
	(3, 1, 1, 'setting daftar menu', 2, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 13:56:35', '2018-12-06 20:25:00', 1, 1),
	(4, 2, 2, 'setting daftar menu', 2, 1, 1, 0, 0, 0, 0, 0, 0, '2018-12-06 13:56:35', '2018-12-06 20:25:00', 1, 1),
	(5, 1, 1, 'setting hak akses', 3, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 13:57:27', '2018-12-06 20:25:00', 1, 1),
	(6, 2, 2, 'setting hak akses', 3, 1, 1, 0, 0, 0, 0, 0, 0, '2018-12-06 13:57:27', '2018-12-06 20:25:00', 1, 1),
	(7, 1, 1, 'setting user', 4, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 13:57:43', '2018-12-06 20:25:00', 1, 1),
	(8, 2, 2, 'setting user', 4, 1, 1, 0, 0, 0, 0, 0, 0, '2018-12-06 13:57:43', '2018-12-06 20:25:00', 1, 1),
	(9, 1, 1, 'setting jabatan', 5, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 13:57:52', '2018-12-06 20:25:00', 1, 1),
	(10, 2, 2, 'setting jabatan', 5, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 13:57:52', '2018-12-06 20:25:00', 1, 1),
	(11, 1, 1, 'setting cabang', 6, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 13:58:15', '2018-12-06 20:25:00', 1, 1),
	(12, 2, 2, 'setting cabang', 6, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 13:58:15', '2018-12-06 20:25:00', 1, 1),
	(13, 1, 1, 'setting database', 7, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 13:58:24', '2018-12-06 20:25:00', 1, 1),
	(14, 2, 2, 'setting database', 7, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 13:58:24', '2018-12-06 20:25:00', 1, 1),
	(15, 1, 1, 'setting tambah periode', 8, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 13:58:40', '2018-12-06 20:25:00', 1, 1),
	(16, 2, 2, 'setting tambah periode', 8, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 13:58:40', '2018-12-06 20:25:00', 1, 1),
	(17, 1, 1, 'setting periode', 9, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 13:58:50', '2018-12-06 20:25:00', 1, 1),
	(18, 2, 2, 'setting periode', 9, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 13:58:50', '2018-12-06 20:25:00', 1, 1),
	(19, 3, 3, 'setting group menu', 1, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:19', '2018-12-06 21:12:19', 1, 1),
	(20, 3, 3, 'setting daftar menu', 2, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:19', '2018-12-06 21:12:19', 1, 1),
	(21, 3, 3, 'setting hak akses', 3, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:19', '2018-12-06 21:12:19', 1, 1),
	(22, 3, 3, 'setting user', 4, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:19', '2018-12-06 21:12:19', 1, 1),
	(23, 3, 3, 'setting jabatan', 5, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:19', '2018-12-06 21:12:19', 1, 1),
	(24, 3, 3, 'setting cabang', 6, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:19', '2018-12-06 21:12:19', 1, 1),
	(25, 3, 3, 'setting database', 7, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:19', '2018-12-06 21:12:19', 1, 1),
	(26, 3, 3, 'setting tambah periode', 8, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:19', '2018-12-06 21:12:19', 1, 1),
	(27, 3, 3, 'setting periode', 9, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:19', '2018-12-06 21:12:19', 1, 1),
	(28, 4, 4, 'setting group menu', 1, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:27', '2018-12-06 21:12:27', 1, 1),
	(29, 4, 4, 'setting daftar menu', 2, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:27', '2018-12-06 21:12:27', 1, 1),
	(30, 4, 4, 'setting hak akses', 3, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:27', '2018-12-06 21:12:27', 1, 1),
	(31, 4, 4, 'setting user', 4, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:27', '2018-12-06 21:12:27', 1, 1),
	(32, 4, 4, 'setting jabatan', 5, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:27', '2018-12-06 21:12:27', 1, 1),
	(33, 4, 4, 'setting cabang', 6, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:27', '2018-12-06 21:12:27', 1, 1),
	(34, 4, 4, 'setting database', 7, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:27', '2018-12-06 21:12:27', 1, 1),
	(35, 4, 4, 'setting tambah periode', 8, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:27', '2018-12-06 21:12:27', 1, 1),
	(36, 4, 4, 'setting periode', 9, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:27', '2018-12-06 21:12:27', 1, 1),
	(37, 1, 1, 'master provinsi', 10, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 21:52:18', '2018-12-06 21:54:37', 1, 1),
	(38, 2, 2, 'master provinsi', 10, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:52:18', '2018-12-06 21:54:37', 1, 1),
	(39, 3, 3, 'master provinsi', 10, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:52:18', '2018-12-06 21:54:37', 1, 1),
	(40, 4, 4, 'master provinsi', 10, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:52:18', '2018-12-06 21:54:37', 1, 1),
	(41, 1, 1, 'master kota', 11, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 21:52:31', '2018-12-06 21:57:48', 1, 1),
	(42, 2, 2, 'master kota', 11, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:52:31', '2018-12-06 21:57:48', 1, 1),
	(43, 3, 3, 'master kota', 11, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:52:31', '2018-12-06 21:57:48', 1, 1),
	(44, 4, 4, 'master kota', 11, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:52:31', '2018-12-06 21:57:48', 1, 1),
	(45, 1, 1, 'master perusahaan', 12, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 21:52:48', '2018-12-06 21:57:32', 1, 1),
	(46, 2, 2, 'master perusahaan', 12, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:52:48', '2018-12-06 21:57:32', 1, 1),
	(47, 3, 3, 'master perusahaan', 12, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:52:48', '2018-12-06 21:57:32', 1, 1),
	(48, 4, 4, 'master perusahaan', 12, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:52:48', '2018-12-06 21:57:32', 1, 1),
	(49, 1, 1, 'master kecamatan', 13, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 23:37:23', '2018-12-06 23:37:23', 1, 1),
	(50, 2, 2, 'master kecamatan', 13, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 23:37:24', '2018-12-06 23:37:24', 1, 1),
	(51, 3, 3, 'master kecamatan', 13, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 23:37:24', '2018-12-06 23:37:24', 1, 1),
	(52, 4, 4, 'master kecamatan', 13, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 23:37:24', '2018-12-06 23:37:24', 1, 1),
	(53, 1, 1, 'master desa', 14, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 23:37:48', '2018-12-06 23:37:48', 1, 1),
	(54, 2, 2, 'master desa', 14, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 23:37:48', '2018-12-06 23:37:48', 1, 1),
	(55, 3, 3, 'master desa', 14, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 23:37:48', '2018-12-06 23:37:48', 1, 1),
	(56, 4, 4, 'master desa', 14, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 23:37:48', '2018-12-06 23:37:48', 1, 1);
/*!40000 ALTER TABLE `s_hak_akses` ENABLE KEYS */;

-- Dumping structure for table jpmandiri.s_jabatan
CREATE TABLE IF NOT EXISTS `s_jabatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table jpmandiri.s_jabatan: ~3 rows (approximately)
/*!40000 ALTER TABLE `s_jabatan` DISABLE KEYS */;
REPLACE INTO `s_jabatan` (`id`, `nama`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(1, 'SUPERUSER', '2018-12-06 13:08:30', '2018-12-06 13:08:30', '1', '1'),
	(2, 'kepala cabang', '2018-12-06 13:16:41', '2018-12-06 13:16:41', '1', '1'),
	(3, 'admin cabang', '2018-12-06 21:12:19', '2018-12-06 21:12:19', '1', '1'),
	(4, 'admin pusat', '2018-12-06 21:12:27', '2018-12-06 21:12:27', '1', '1');
/*!40000 ALTER TABLE `s_jabatan` ENABLE KEYS */;

-- Dumping structure for table jpmandiri.s_log_history
CREATE TABLE IF NOT EXISTS `s_log_history` (
  `id` int(11) NOT NULL,
  `ref` varchar(50) DEFAULT NULL,
  `cabang_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `table_name` varchar(50) DEFAULT NULL,
  `keterangan` text,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table jpmandiri.s_log_history: ~56 rows (approximately)
/*!40000 ALTER TABLE `s_log_history` DISABLE KEYS */;
REPLACE INTO `s_log_history` (`id`, `ref`, `cabang_id`, `user_id`, `table_name`, `keterangan`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(1, '2', 1, 1, 's_jabatan', 'simpan jabatan', 'adi', 'adi', '2018-12-06 13:16:41', '2018-12-06 13:16:41'),
	(2, '10', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 13:47:25', '2018-12-06 13:47:25'),
	(3, '11', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 13:47:46', '2018-12-06 13:47:46'),
	(4, '10', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 13:49:49', '2018-12-06 13:49:49'),
	(5, '1', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 13:55:47', '2018-12-06 13:55:47'),
	(6, '2', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 13:56:35', '2018-12-06 13:56:35'),
	(7, '3', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 13:57:27', '2018-12-06 13:57:27'),
	(8, '4', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 13:57:43', '2018-12-06 13:57:43'),
	(9, '5', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 13:57:52', '2018-12-06 13:57:52'),
	(10, '6', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 13:58:15', '2018-12-06 13:58:15'),
	(11, '7', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 13:58:24', '2018-12-06 13:58:24'),
	(12, '8', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 13:58:40', '2018-12-06 13:58:40'),
	(13, '9', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 13:58:50', '2018-12-06 13:58:50'),
	(14, '10', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2018-12-06 14:23:54', '2018-12-06 14:23:54'),
	(15, '10', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2018-12-06 14:24:00', '2018-12-06 14:24:00'),
	(16, '10', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2018-12-06 14:25:24', '2018-12-06 14:25:24'),
	(17, '10', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2018-12-06 14:25:32', '2018-12-06 14:25:32'),
	(18, '0', 1, 1, 's_hak_akses', 'rubah hak akses tambah', 'adi', 'adi', '2018-12-06 20:17:13', '2018-12-06 20:17:13'),
	(19, '0', 1, 1, 's_hak_akses', 'rubah hak akses tambah', 'adi', 'adi', '2018-12-06 20:17:14', '2018-12-06 20:17:14'),
	(20, '0', 1, 1, 's_hak_akses', 'rubah hak akses tambah', 'adi', 'adi', '2018-12-06 20:17:18', '2018-12-06 20:17:18'),
	(21, '3', 1, 1, 's_jabatan', 'simpan jabatan', 'adi', 'adi', '2018-12-06 20:28:28', '2018-12-06 20:28:28'),
	(22, '3', 1, 1, 's_jabatan', 'simpan jabatan', 'adi', 'adi', '2018-12-06 20:30:46', '2018-12-06 20:30:46'),
	(23, '3', 1, 1, 's_jabatan', 'simpan jabatan', 'adi', 'adi', '2018-12-06 21:06:27', '2018-12-06 21:06:27'),
	(24, '3', 1, 1, 's_group_menu', 'Hapus jabatan', 'adi', 'adi', '2018-12-06 21:08:59', '2018-12-06 21:08:59'),
	(25, '10', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 21:09:19', '2018-12-06 21:09:19'),
	(26, '10', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 21:10:21', '2018-12-06 21:10:21'),
	(27, '3', 1, 1, 's_jabatan', 'simpan jabatan', 'adi', 'adi', '2018-12-06 21:12:19', '2018-12-06 21:12:19'),
	(28, '4', 1, 1, 's_jabatan', 'simpan jabatan', 'adi', 'adi', '2018-12-06 21:12:27', '2018-12-06 21:12:27'),
	(29, '3', 1, 1, 's_group_menu', 'simpan group menu', 'adi', 'adi', '2018-12-06 21:51:43', '2018-12-06 21:51:43'),
	(30, '10', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 21:52:18', '2018-12-06 21:52:18'),
	(31, '11', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 21:52:31', '2018-12-06 21:52:31'),
	(32, '12', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 21:52:48', '2018-12-06 21:52:48'),
	(33, '10', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2018-12-06 21:54:11', '2018-12-06 21:54:11'),
	(34, '11', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2018-12-06 21:54:23', '2018-12-06 21:54:23'),
	(35, '10', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2018-12-06 21:54:37', '2018-12-06 21:54:37'),
	(36, '11', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2018-12-06 21:54:58', '2018-12-06 21:54:58'),
	(37, '12', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2018-12-06 21:57:32', '2018-12-06 21:57:32'),
	(38, '11', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2018-12-06 21:57:48', '2018-12-06 21:57:48'),
	(39, '95', 1, 1, 's_provinsi', 'simpan master provinsi', 'adi', 'adi', '2018-12-06 23:00:15', '2018-12-06 23:00:15'),
	(40, '95', 1, 1, 's_provinsi', 'Hapus master provinsi', 'adi', 'adi', '2018-12-06 23:00:22', '2018-12-06 23:00:22'),
	(41, '95', 1, 1, 's_provinsi', 'simpan master provinsi', 'adi', 'adi', '2018-12-06 23:00:26', '2018-12-06 23:00:26'),
	(42, '95', 1, 1, 's_provinsi', 'Update master provinsi', 'adi', 'adi', '2018-12-06 23:00:33', '2018-12-06 23:00:33'),
	(43, '95', 1, 1, 's_provinsi', 'Hapus master provinsi', 'adi', 'adi', '2018-12-06 23:00:38', '2018-12-06 23:00:38'),
	(44, '94', 1, 1, 's_provinsi', 'Update master provinsi', 'adi', 'adi', '2018-12-06 23:01:18', '2018-12-06 23:01:18'),
	(45, '9472', 1, 1, 's_kota', 'simpan master kota', 'adi', 'adi', '2018-12-06 23:12:44', '2018-12-06 23:12:44'),
	(46, '9472', 1, 1, 's_kota', 'Update master kota', 'adi', 'adi', '2018-12-06 23:12:52', '2018-12-06 23:12:52'),
	(47, '9472', 1, 1, 's_provinsi', 'Hapus master kota', 'adi', 'adi', '2018-12-06 23:12:57', '2018-12-06 23:12:57'),
	(48, '13', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 23:37:23', '2018-12-06 23:37:23'),
	(49, '14', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 23:37:48', '2018-12-06 23:37:48'),
	(50, '1101010', 1, 1, 's_kecamatan', 'Update master kecamatan', 'adi', 'adi', '2018-12-07 02:16:50', '2018-12-07 02:16:50'),
	(51, '9471041', 1, 1, 's_kecamatan', 'simpan master kecamatan', 'adi', 'adi', '2018-12-07 02:19:05', '2018-12-07 02:19:05'),
	(52, '9471041', 1, 1, 's_kecamatan', 'Hapus master kecamatan', 'adi', 'adi', '2018-12-07 02:19:16', '2018-12-07 02:19:16'),
	(53, '9471041', 1, 1, 's_kecamatan', 'simpan master kecamatan', 'adi', 'adi', '2018-12-07 02:20:11', '2018-12-07 02:20:11'),
	(54, '9471041', 1, 1, 's_kecamatan', 'Hapus master kecamatan', 'adi', 'adi', '2018-12-07 02:20:17', '2018-12-07 02:20:17'),
	(55, '9471041', 1, 1, 's_kecamatan', 'simpan master kecamatan', 'adi', 'adi', '2018-12-07 02:20:38', '2018-12-07 02:20:38'),
	(56, '9471041', 1, 1, 's_kecamatan', 'Hapus master kecamatan', 'adi', 'adi', '2018-12-07 02:20:45', '2018-12-07 02:20:45');
/*!40000 ALTER TABLE `s_log_history` ENABLE KEYS */;

-- Dumping structure for table jpmandiri.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan_id` int(11) DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cabang_id` int(11) DEFAULT NULL,
  `connection_id` int(11) DEFAULT '1',
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `username` (`username`),
  KEY `FK_users_s_jabatan` (`jabatan_id`),
  KEY `FK_users_s_cabang` (`cabang_id`),
  KEY `FK_users_s_connection` (`connection_id`),
  CONSTRAINT `FK_users_s_cabang` FOREIGN KEY (`cabang_id`) REFERENCES `s_cabang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_users_s_connection` FOREIGN KEY (`connection_id`) REFERENCES `s_connection` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_users_s_jabatan` FOREIGN KEY (`jabatan_id`) REFERENCES `s_jabatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table jpmandiri.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `username`, `name`, `address`, `birth_date`, `email`, `email_verified_at`, `password`, `remember_token`, `jabatan_id`, `image`, `cabang_id`, `connection_id`, `last_login`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'adi', 'medokan', '1995-11-27', 'dewa17a@gmail.com', '2018-12-04 08:37:16', '$2y$10$omknfk0ADkpMVHt2AGvZtOAOzNQSttzi0WDBL7pX7R1uzyTIqLy6C', '4kNtdsX0yxn8ZZwLjtu8lAEuLdKkJ8Fr3SxieArJHwjK99YVZBt3GTAMxiBr', 1, NULL, 1, 1, NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
