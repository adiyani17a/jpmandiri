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

-- Dumping structure for table jpmandiri.m_agama
CREATE TABLE IF NOT EXISTS `m_agama` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table jpmandiri.m_agama: ~1 rows (approximately)
/*!40000 ALTER TABLE `m_agama` DISABLE KEYS */;
REPLACE INTO `m_agama` (`id`, `nama`, `keterangan`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
	(1, 'ISLAM', 'islam', '2019-04-19 14:44:31', '2019-04-19 14:44:31', '1', '1', NULL);
/*!40000 ALTER TABLE `m_agama` ENABLE KEYS */;

-- Dumping structure for table jpmandiri.m_desa
CREATE TABLE IF NOT EXISTS `m_desa` (
  `id` int(11) NOT NULL,
  `kecamatan_id` int(20) DEFAULT NULL,
  `nama` varchar(300) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_m_kota_m_provinsi` (`provinsi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table jpmandiri.m_kota: ~0 rows (approximately)
/*!40000 ALTER TABLE `m_kota` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_kota` ENABLE KEYS */;

-- Dumping structure for table jpmandiri.m_pegawai
CREATE TABLE IF NOT EXISTS `m_pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `bagian` enum('AKADEMIK','NON AKADEMIK') DEFAULT NULL,
  `gelar_awal` varchar(50) DEFAULT NULL,
  `gelar_akhir` varchar(50) DEFAULT NULL,
  `panggilan` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` int(11) DEFAULT NULL,
  `status_menikah` enum('SUDAH','BELUM','UNDEFINED') DEFAULT NULL,
  `nomor_identitas` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `telpon` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `keterangan` text,
  `pin` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`),
  UNIQUE KEY `pin` (`pin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table jpmandiri.m_pegawai: ~2 rows (approximately)
/*!40000 ALTER TABLE `m_pegawai` DISABLE KEYS */;
REPLACE INTO `m_pegawai` (`id`, `nama`, `nip`, `bagian`, `gelar_awal`, `gelar_akhir`, `panggilan`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_menikah`, `nomor_identitas`, `alamat`, `telpon`, `email`, `foto`, `keterangan`, `pin`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
	(1, 'Tari', '312312312', 'AKADEMIK', 'Dr', 'MM.h', 'tes', 'L', 'surabaya', '2019-04-19', 1, 'SUDAH', '23232132', 'TEs', '23232132', 'sdfdsfdsfeds', 'pegawai_1_.png', 'Tes', NULL, 'Active', '2019-04-19 14:13:21', '2019-04-19 15:46:23', NULL, '1', '2019-04-19 15:46:23'),
	(2, 'Tes', '123', 'AKADEMIK', 'Dtr', 'asdas', 'asdas', 'L', 'sadsadas', '2019-04-19', 1, 'SUDAH', '2323', 'dsa', '232', '2323', 'pegawai_2_.png', '2323232', NULL, 'Active', '2019-04-19 15:33:01', '2019-04-19 15:54:41', NULL, '1', NULL);
/*!40000 ALTER TABLE `m_pegawai` ENABLE KEYS */;

-- Dumping structure for table jpmandiri.m_provinsi
CREATE TABLE IF NOT EXISTS `m_provinsi` (
  `id` int(11) NOT NULL,
  `nama` varchar(300) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table jpmandiri.s_cabang: ~1 rows (approximately)
/*!40000 ALTER TABLE `s_cabang` DISABLE KEYS */;
REPLACE INTO `s_cabang` (`id`, `kode`, `nama`, `alamat`, `telpon`, `fax`, `kota_id`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
	(1, '000', 'JPM PUSAT', 'karah ', NULL, NULL, NULL, '2018-12-04 08:34:24', '2018-12-04 08:34:23', 'ADI', 'ADI', NULL);
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
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table jpmandiri.s_connection: ~2 rows (approximately)
/*!40000 ALTER TABLE `s_connection` DISABLE KEYS */;
REPLACE INTO `s_connection` (`id`, `host`, `database`, `username`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'localhost', 'jpmandiri', 'root', '', '2018-12-04 09:57:49', '0000-00-00 00:00:00', NULL),
	(2, 'localhost', 'jpmandiri_backup', 'root', '', '2018-12-04 09:57:49', '0000-00-00 00:00:00', NULL);
/*!40000 ALTER TABLE `s_connection` ENABLE KEYS */;

-- Dumping structure for table jpmandiri.s_daftar_menu
CREATE TABLE IF NOT EXISTS `s_daftar_menu` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `group_menu_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_s_daftar_menu_s_group_menu` (`group_menu_id`),
  CONSTRAINT `FK_s_daftar_menu_s_group_menu` FOREIGN KEY (`group_menu_id`) REFERENCES `s_group_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table jpmandiri.s_daftar_menu: ~15 rows (approximately)
/*!40000 ALTER TABLE `s_daftar_menu` DISABLE KEYS */;
REPLACE INTO `s_daftar_menu` (`id`, `nama`, `url`, `keterangan`, `group_menu_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'setting group menu', 'setting/group_menu', '-', 1, 0, 1, '2019-04-19 09:55:52', '2019-04-19 09:55:52', NULL),
	(2, 'setting daftar menu', 'setting/daftar_menu', '-', 1, 0, 1, '2019-04-19 09:56:03', '2019-04-19 09:56:03', NULL),
	(3, 'setting hak akses', 'setting/hak_akses', '-', 1, 0, 1, '2019-04-19 09:56:05', '2019-04-19 09:56:05', NULL),
	(4, 'setting user', 'setting/user', '-', 1, 0, 1, '2019-04-19 09:56:07', '2019-04-19 09:56:07', NULL),
	(5, 'setting jabatan', 'setting/jabatan', '-', 1, 0, 1, '2019-04-19 09:56:10', '2019-04-19 09:56:10', NULL),
	(6, 'setting cabang', 'setting/cabang', '-', 1, 0, 1, '2019-04-19 09:56:12', '2019-04-19 09:56:12', NULL),
	(7, 'setting database', 'setting/database', '-', 1, 0, 1, '2019-04-19 09:56:15', '2019-04-19 09:56:15', NULL),
	(8, 'setting tambah periode', 'setting/tambah_periode', '-', 2, 0, 1, '2019-04-19 09:56:17', '2019-04-19 09:56:17', NULL),
	(9, 'setting periode', 'setting/periode', '-', 2, 0, 1, '2019-04-19 09:56:19', '2019-04-19 09:56:19', NULL),
	(10, 'master provinsi', 'master/provinsi', '-', 3, 0, 1, '2019-04-19 09:56:22', '2019-04-19 09:56:22', NULL),
	(11, 'master kota', 'master/kota', '-', 3, 0, 1, '2019-04-19 09:56:26', '2019-04-19 09:56:26', NULL),
	(12, 'master perusahaan', 'master/perusahaan', '-', 3, 0, 1, '2019-04-19 09:57:19', '2019-04-19 09:57:19', NULL),
	(13, 'master kecamatan', 'master/kecamatan', '-', 3, 0, 1, '2019-04-19 09:57:33', '2019-04-19 09:57:33', NULL),
	(14, 'master desa', 'master/desa', '-', 3, 0, 1, '2019-04-19 09:57:35', '2019-04-19 09:57:35', NULL),
	(15, 'master pegawai', 'master/pegawai', NULL, 3, 1, 1, '2019-04-19 10:11:18', '2019-04-19 10:11:18', NULL);
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
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table jpmandiri.s_group_menu: ~3 rows (approximately)
/*!40000 ALTER TABLE `s_group_menu` DISABLE KEYS */;
REPLACE INTO `s_group_menu` (`id`, `nama`, `keterangan`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
	(1, 'setting utility', 'SETTING UTILITY', '2018-12-06 11:38:40', '2018-12-06 11:38:52', 1, 1, NULL),
	(2, 'setting keuangan', 'setting keuangan', '2018-12-06 11:39:04', '2018-12-06 11:39:04', 1, 1, NULL),
	(3, 'master bersama', 'MASTER BERSAMA', '2018-12-06 21:51:43', '2018-12-06 21:51:43', 1, 1, NULL);
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
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`,`dt`),
  KEY `FK_s_hak_akses_s_jabatan` (`jabatan_id`),
  KEY `FK_s_hak_akses_s_daftar_menu` (`daftar_menu_id`),
  CONSTRAINT `FK_s_hak_akses_s_daftar_menu` FOREIGN KEY (`daftar_menu_id`) REFERENCES `s_daftar_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_s_hak_akses_s_jabatan` FOREIGN KEY (`jabatan_id`) REFERENCES `s_jabatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table jpmandiri.s_hak_akses: ~60 rows (approximately)
/*!40000 ALTER TABLE `s_hak_akses` DISABLE KEYS */;
REPLACE INTO `s_hak_akses` (`id`, `dt`, `jabatan_id`, `daftar_menu`, `daftar_menu_id`, `aktif`, `tambah`, `ubah`, `hapus`, `cabang`, `global`, `print`, `validasi`, `created_at`, `updated_at`, `updated_by`, `created_by`, `deleted_at`) VALUES
	(1, 1, 1, 'setting group menu', 1, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 13:55:47', '2019-04-19 15:22:06', 1, 1, NULL),
	(2, 2, 2, 'setting group menu', 1, 1, 1, 0, 0, 0, 0, 0, 0, '2018-12-06 13:55:47', '2019-04-19 09:55:52', 1, 1, NULL),
	(3, 1, 1, 'setting daftar menu', 2, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 13:56:35', '2019-04-19 09:56:03', 1, 1, NULL),
	(4, 2, 2, 'setting daftar menu', 2, 1, 1, 0, 0, 0, 0, 0, 0, '2018-12-06 13:56:35', '2019-04-19 09:56:03', 1, 1, NULL),
	(5, 1, 1, 'setting hak akses', 3, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 13:57:27', '2019-04-19 09:56:05', 1, 1, NULL),
	(6, 2, 2, 'setting hak akses', 3, 1, 1, 0, 0, 0, 0, 0, 0, '2018-12-06 13:57:27', '2019-04-19 09:56:05', 1, 1, NULL),
	(7, 1, 1, 'setting user', 4, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 13:57:43', '2019-04-19 09:56:08', 1, 1, NULL),
	(8, 2, 2, 'setting user', 4, 1, 1, 0, 0, 0, 0, 0, 0, '2018-12-06 13:57:43', '2019-04-19 09:56:08', 1, 1, NULL),
	(9, 1, 1, 'setting jabatan', 5, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 13:57:52', '2019-04-19 09:56:10', 1, 1, NULL),
	(10, 2, 2, 'setting jabatan', 5, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 13:57:52', '2019-04-19 09:56:10', 1, 1, NULL),
	(11, 1, 1, 'setting cabang', 6, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 13:58:15', '2019-04-19 09:56:13', 1, 1, NULL),
	(12, 2, 2, 'setting cabang', 6, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 13:58:15', '2019-04-19 09:56:13', 1, 1, NULL),
	(13, 1, 1, 'setting database', 7, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 13:58:24', '2019-04-19 09:56:15', 1, 1, NULL),
	(14, 2, 2, 'setting database', 7, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 13:58:24', '2019-04-19 09:56:15', 1, 1, NULL),
	(15, 1, 1, 'setting tambah periode', 8, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 13:58:40', '2019-04-19 09:56:17', 1, 1, NULL),
	(16, 2, 2, 'setting tambah periode', 8, 1, 1, 0, 0, 0, 0, 0, 0, '2018-12-06 13:58:40', '2019-04-19 10:00:03', 1, 1, NULL),
	(17, 1, 1, 'setting periode', 9, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 13:58:50', '2019-04-19 09:56:19', 1, 1, NULL),
	(18, 2, 2, 'setting periode', 9, 1, 1, 0, 0, 0, 0, 0, 0, '2018-12-06 13:58:50', '2019-04-19 10:00:18', 1, 1, NULL),
	(19, 3, 3, 'setting group menu', 1, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:19', '2019-04-19 09:55:52', 1, 1, NULL),
	(20, 3, 3, 'setting daftar menu', 2, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:19', '2019-04-19 09:56:03', 1, 1, NULL),
	(21, 3, 3, 'setting hak akses', 3, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:19', '2019-04-19 09:56:05', 1, 1, NULL),
	(22, 3, 3, 'setting user', 4, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:19', '2019-04-19 09:56:08', 1, 1, NULL),
	(23, 3, 3, 'setting jabatan', 5, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:19', '2019-04-19 09:56:10', 1, 1, NULL),
	(24, 3, 3, 'setting cabang', 6, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:19', '2019-04-19 09:56:13', 1, 1, NULL),
	(25, 3, 3, 'setting database', 7, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:19', '2019-04-19 09:56:15', 1, 1, NULL),
	(26, 3, 3, 'setting tambah periode', 8, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:19', '2019-04-19 09:56:17', 1, 1, NULL),
	(27, 3, 3, 'setting periode', 9, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:19', '2019-04-19 09:56:19', 1, 1, NULL),
	(28, 4, 4, 'setting group menu', 1, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:27', '2019-04-19 09:55:52', 1, 1, NULL),
	(29, 4, 4, 'setting daftar menu', 2, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:27', '2019-04-19 09:56:03', 1, 1, NULL),
	(30, 4, 4, 'setting hak akses', 3, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:27', '2019-04-19 09:56:05', 1, 1, NULL),
	(31, 4, 4, 'setting user', 4, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:27', '2019-04-19 09:56:08', 1, 1, NULL),
	(32, 4, 4, 'setting jabatan', 5, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:27', '2019-04-19 09:56:10', 1, 1, NULL),
	(33, 4, 4, 'setting cabang', 6, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:27', '2019-04-19 09:56:13', 1, 1, NULL),
	(34, 4, 4, 'setting database', 7, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:27', '2019-04-19 09:56:15', 1, 1, NULL),
	(35, 4, 4, 'setting tambah periode', 8, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:27', '2019-04-19 09:56:17', 1, 1, NULL),
	(36, 4, 4, 'setting periode', 9, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:12:27', '2019-04-19 09:56:19', 1, 1, NULL),
	(37, 1, 1, 'master provinsi', 10, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 21:52:18', '2019-04-19 09:56:22', 1, 1, NULL),
	(38, 2, 2, 'master provinsi', 10, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:52:18', '2019-04-19 09:56:22', 1, 1, NULL),
	(39, 3, 3, 'master provinsi', 10, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:52:18', '2019-04-19 09:56:22', 1, 1, NULL),
	(40, 4, 4, 'master provinsi', 10, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:52:18', '2019-04-19 09:56:22', 1, 1, NULL),
	(41, 1, 1, 'master kota', 11, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 21:52:31', '2019-04-19 09:56:26', 1, 1, NULL),
	(42, 2, 2, 'master kota', 11, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:52:31', '2019-04-19 09:56:26', 1, 1, NULL),
	(43, 3, 3, 'master kota', 11, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:52:31', '2019-04-19 09:56:26', 1, 1, NULL),
	(44, 4, 4, 'master kota', 11, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:52:31', '2019-04-19 09:56:26', 1, 1, NULL),
	(45, 1, 1, 'master perusahaan', 12, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 21:52:48', '2019-04-19 09:57:19', 1, 1, NULL),
	(46, 2, 2, 'master perusahaan', 12, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:52:48', '2019-04-19 09:57:19', 1, 1, NULL),
	(47, 3, 3, 'master perusahaan', 12, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:52:48', '2019-04-19 09:57:19', 1, 1, NULL),
	(48, 4, 4, 'master perusahaan', 12, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 21:52:48', '2019-04-19 09:57:19', 1, 1, NULL),
	(49, 1, 1, 'master kecamatan', 13, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 23:37:23', '2019-04-19 09:57:33', 1, 1, NULL),
	(50, 2, 2, 'master kecamatan', 13, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 23:37:24', '2019-04-19 09:57:33', 1, 1, NULL),
	(51, 3, 3, 'master kecamatan', 13, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 23:37:24', '2019-04-19 09:57:33', 1, 1, NULL),
	(52, 4, 4, 'master kecamatan', 13, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 23:37:24', '2019-04-19 09:57:33', 1, 1, NULL),
	(53, 1, 1, 'master desa', 14, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 23:37:48', '2019-04-19 09:57:35', 1, 1, NULL),
	(54, 2, 2, 'master desa', 14, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 23:37:48', '2019-04-19 09:57:35', 1, 1, NULL),
	(55, 3, 3, 'master desa', 14, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 23:37:48', '2019-04-19 09:57:35', 1, 1, NULL),
	(56, 4, 4, 'master desa', 14, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 23:37:48', '2019-04-19 09:57:35', 1, 1, NULL),
	(57, 1, 1, 'master pegawai', 15, 1, 1, 1, 1, 1, 1, 1, 1, '2019-04-19 10:11:18', '2019-04-19 15:26:12', 1, 1, NULL),
	(58, 2, 2, 'master pegawai', 15, 1, 0, 0, 0, 0, 0, 0, 0, '2019-04-19 10:11:18', '2019-04-19 10:11:18', 1, 1, NULL),
	(59, 3, 3, 'master pegawai', 15, 1, 0, 0, 0, 0, 0, 0, 0, '2019-04-19 10:11:18', '2019-04-19 10:11:18', 1, 1, NULL),
	(60, 4, 4, 'master pegawai', 15, 1, 0, 0, 0, 0, 0, 0, 0, '2019-04-19 10:11:18', '2019-04-19 15:21:32', 1, 1, NULL);
/*!40000 ALTER TABLE `s_hak_akses` ENABLE KEYS */;

-- Dumping structure for table jpmandiri.s_jabatan
CREATE TABLE IF NOT EXISTS `s_jabatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table jpmandiri.s_jabatan: ~4 rows (approximately)
/*!40000 ALTER TABLE `s_jabatan` DISABLE KEYS */;
REPLACE INTO `s_jabatan` (`id`, `nama`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
	(1, 'SUPERUSER', '2018-12-06 13:08:30', '2018-12-06 13:08:30', '1', '1', NULL),
	(2, 'kepala cabang', '2018-12-06 13:16:41', '2018-12-06 13:16:41', '1', '1', NULL),
	(3, 'admin cabang', '2018-12-06 21:12:19', '2018-12-06 21:12:19', '1', '1', NULL),
	(4, 'admin pusat', '2018-12-06 21:12:27', '2018-12-06 21:12:27', '1', '1', NULL);
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
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table jpmandiri.s_log_history: ~93 rows (approximately)
/*!40000 ALTER TABLE `s_log_history` DISABLE KEYS */;
REPLACE INTO `s_log_history` (`id`, `ref`, `cabang_id`, `user_id`, `table_name`, `keterangan`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '2', 1, 1, 's_jabatan', 'simpan jabatan', 'adi', 'adi', '2018-12-06 13:16:41', '2018-12-06 13:16:41', NULL),
	(2, '10', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 13:47:25', '2018-12-06 13:47:25', NULL),
	(3, '11', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 13:47:46', '2018-12-06 13:47:46', NULL),
	(4, '10', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 13:49:49', '2018-12-06 13:49:49', NULL),
	(5, '1', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 13:55:47', '2018-12-06 13:55:47', NULL),
	(6, '2', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 13:56:35', '2018-12-06 13:56:35', NULL),
	(7, '3', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 13:57:27', '2018-12-06 13:57:27', NULL),
	(8, '4', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 13:57:43', '2018-12-06 13:57:43', NULL),
	(9, '5', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 13:57:52', '2018-12-06 13:57:52', NULL),
	(10, '6', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 13:58:15', '2018-12-06 13:58:15', NULL),
	(11, '7', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 13:58:24', '2018-12-06 13:58:24', NULL),
	(12, '8', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 13:58:40', '2018-12-06 13:58:40', NULL),
	(13, '9', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 13:58:50', '2018-12-06 13:58:50', NULL),
	(14, '10', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2018-12-06 14:23:54', '2018-12-06 14:23:54', NULL),
	(15, '10', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2018-12-06 14:24:00', '2018-12-06 14:24:00', NULL),
	(16, '10', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2018-12-06 14:25:24', '2018-12-06 14:25:24', NULL),
	(17, '10', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2018-12-06 14:25:32', '2018-12-06 14:25:32', NULL),
	(18, '0', 1, 1, 's_hak_akses', 'rubah hak akses tambah', 'adi', 'adi', '2018-12-06 20:17:13', '2018-12-06 20:17:13', NULL),
	(19, '0', 1, 1, 's_hak_akses', 'rubah hak akses tambah', 'adi', 'adi', '2018-12-06 20:17:14', '2018-12-06 20:17:14', NULL),
	(20, '0', 1, 1, 's_hak_akses', 'rubah hak akses tambah', 'adi', 'adi', '2018-12-06 20:17:18', '2018-12-06 20:17:18', NULL),
	(21, '3', 1, 1, 's_jabatan', 'simpan jabatan', 'adi', 'adi', '2018-12-06 20:28:28', '2018-12-06 20:28:28', NULL),
	(22, '3', 1, 1, 's_jabatan', 'simpan jabatan', 'adi', 'adi', '2018-12-06 20:30:46', '2018-12-06 20:30:46', NULL),
	(23, '3', 1, 1, 's_jabatan', 'simpan jabatan', 'adi', 'adi', '2018-12-06 21:06:27', '2018-12-06 21:06:27', NULL),
	(24, '3', 1, 1, 's_group_menu', 'Hapus jabatan', 'adi', 'adi', '2018-12-06 21:08:59', '2018-12-06 21:08:59', NULL),
	(25, '10', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 21:09:19', '2018-12-06 21:09:19', NULL),
	(26, '10', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 21:10:21', '2018-12-06 21:10:21', NULL),
	(27, '3', 1, 1, 's_jabatan', 'simpan jabatan', 'adi', 'adi', '2018-12-06 21:12:19', '2018-12-06 21:12:19', NULL),
	(28, '4', 1, 1, 's_jabatan', 'simpan jabatan', 'adi', 'adi', '2018-12-06 21:12:27', '2018-12-06 21:12:27', NULL),
	(29, '3', 1, 1, 's_group_menu', 'simpan group menu', 'adi', 'adi', '2018-12-06 21:51:43', '2018-12-06 21:51:43', NULL),
	(30, '10', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 21:52:18', '2018-12-06 21:52:18', NULL),
	(31, '11', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 21:52:31', '2018-12-06 21:52:31', NULL),
	(32, '12', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 21:52:48', '2018-12-06 21:52:48', NULL),
	(33, '10', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2018-12-06 21:54:11', '2018-12-06 21:54:11', NULL),
	(34, '11', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2018-12-06 21:54:23', '2018-12-06 21:54:23', NULL),
	(35, '10', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2018-12-06 21:54:37', '2018-12-06 21:54:37', NULL),
	(36, '11', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2018-12-06 21:54:58', '2018-12-06 21:54:58', NULL),
	(37, '12', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2018-12-06 21:57:32', '2018-12-06 21:57:32', NULL),
	(38, '11', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2018-12-06 21:57:48', '2018-12-06 21:57:48', NULL),
	(39, '95', 1, 1, 's_provinsi', 'simpan master provinsi', 'adi', 'adi', '2018-12-06 23:00:15', '2018-12-06 23:00:15', NULL),
	(40, '95', 1, 1, 's_provinsi', 'Hapus master provinsi', 'adi', 'adi', '2018-12-06 23:00:22', '2018-12-06 23:00:22', NULL),
	(41, '95', 1, 1, 's_provinsi', 'simpan master provinsi', 'adi', 'adi', '2018-12-06 23:00:26', '2018-12-06 23:00:26', NULL),
	(42, '95', 1, 1, 's_provinsi', 'Update master provinsi', 'adi', 'adi', '2018-12-06 23:00:33', '2018-12-06 23:00:33', NULL),
	(43, '95', 1, 1, 's_provinsi', 'Hapus master provinsi', 'adi', 'adi', '2018-12-06 23:00:38', '2018-12-06 23:00:38', NULL),
	(44, '94', 1, 1, 's_provinsi', 'Update master provinsi', 'adi', 'adi', '2018-12-06 23:01:18', '2018-12-06 23:01:18', NULL),
	(45, '9472', 1, 1, 's_kota', 'simpan master kota', 'adi', 'adi', '2018-12-06 23:12:44', '2018-12-06 23:12:44', NULL),
	(46, '9472', 1, 1, 's_kota', 'Update master kota', 'adi', 'adi', '2018-12-06 23:12:52', '2018-12-06 23:12:52', NULL),
	(47, '9472', 1, 1, 's_provinsi', 'Hapus master kota', 'adi', 'adi', '2018-12-06 23:12:57', '2018-12-06 23:12:57', NULL),
	(48, '13', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 23:37:23', '2018-12-06 23:37:23', NULL),
	(49, '14', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2018-12-06 23:37:48', '2018-12-06 23:37:48', NULL),
	(50, '1101010', 1, 1, 's_kecamatan', 'Update master kecamatan', 'adi', 'adi', '2018-12-07 02:16:50', '2018-12-07 02:16:50', NULL),
	(51, '9471041', 1, 1, 's_kecamatan', 'simpan master kecamatan', 'adi', 'adi', '2018-12-07 02:19:05', '2018-12-07 02:19:05', NULL),
	(52, '9471041', 1, 1, 's_kecamatan', 'Hapus master kecamatan', 'adi', 'adi', '2018-12-07 02:19:16', '2018-12-07 02:19:16', NULL),
	(53, '9471041', 1, 1, 's_kecamatan', 'simpan master kecamatan', 'adi', 'adi', '2018-12-07 02:20:11', '2018-12-07 02:20:11', NULL),
	(54, '9471041', 1, 1, 's_kecamatan', 'Hapus master kecamatan', 'adi', 'adi', '2018-12-07 02:20:17', '2018-12-07 02:20:17', NULL),
	(55, '9471041', 1, 1, 's_kecamatan', 'simpan master kecamatan', 'adi', 'adi', '2018-12-07 02:20:38', '2018-12-07 02:20:38', NULL),
	(56, '9471041', 1, 1, 's_kecamatan', 'Hapus master kecamatan', 'adi', 'adi', '2018-12-07 02:20:45', '2018-12-07 02:20:45', NULL),
	(57, '1', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2019-04-19 09:46:13', '2019-04-19 09:46:13', NULL),
	(58, '1', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2019-04-19 09:55:52', '2019-04-19 09:55:52', NULL),
	(59, '2', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2019-04-19 09:56:03', '2019-04-19 09:56:03', NULL),
	(60, '3', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2019-04-19 09:56:05', '2019-04-19 09:56:05', NULL),
	(61, '4', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2019-04-19 09:56:08', '2019-04-19 09:56:08', NULL),
	(62, '5', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2019-04-19 09:56:10', '2019-04-19 09:56:10', NULL),
	(63, '6', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2019-04-19 09:56:13', '2019-04-19 09:56:13', NULL),
	(64, '7', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2019-04-19 09:56:15', '2019-04-19 09:56:15', NULL),
	(65, '8', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2019-04-19 09:56:17', '2019-04-19 09:56:17', NULL),
	(66, '9', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2019-04-19 09:56:19', '2019-04-19 09:56:19', NULL),
	(67, '10', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2019-04-19 09:56:22', '2019-04-19 09:56:22', NULL),
	(68, '11', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2019-04-19 09:56:26', '2019-04-19 09:56:26', NULL),
	(69, '12', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2019-04-19 09:57:19', '2019-04-19 09:57:19', NULL),
	(70, '13', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2019-04-19 09:57:33', '2019-04-19 09:57:33', NULL),
	(71, '14', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2019-04-19 09:57:35', '2019-04-19 09:57:35', NULL),
	(72, '0', 1, 1, 's_hak_akses', 'rubah hak akses tambah', 'adi', 'adi', '2019-04-19 10:00:03', '2019-04-19 10:00:03', NULL),
	(73, '0', 1, 1, 's_hak_akses', 'rubah hak akses tambah', 'adi', 'adi', '2019-04-19 10:00:18', '2019-04-19 10:00:18', NULL),
	(74, '15', 1, 1, 's_daftar_menu', 'simpan daftar menu', 'adi', 'adi', '2019-04-19 10:11:18', '2019-04-19 10:11:18', NULL),
	(75, '1', 1, 1, 'm_pegawai', 'simpan master pegawai', 'adi', 'adi', '2019-04-19 14:13:21', '2019-04-19 14:13:21', NULL),
	(76, '1', 1, 1, 'm_pegawai', 'Update master pegawai', 'adi', 'adi', '2019-04-19 14:55:14', '2019-04-19 14:55:14', NULL),
	(77, '1', 1, 1, 'm_pegawai', 'Update master pegawai', 'adi', 'adi', '2019-04-19 14:55:41', '2019-04-19 14:55:41', NULL),
	(78, '1', 1, 1, 'm_pegawai', 'Update master pegawai', 'adi', 'adi', '2019-04-19 14:55:48', '2019-04-19 14:55:48', NULL),
	(79, '1', 1, 1, 's_cabang', 'Update master cabang', 'adi', 'adi', '2019-04-19 15:26:41', '2019-04-19 15:26:41', NULL),
	(80, '1', 1, 1, 's_cabang', 'Update master cabang', 'adi', 'adi', '2019-04-19 15:26:42', '2019-04-19 15:26:42', NULL),
	(81, '1', 1, 1, 'm_pegawai', 'Update master pegawai', 'adi', 'adi', '2019-04-19 15:26:53', '2019-04-19 15:26:53', NULL),
	(82, '1', 1, 1, 'm_pegawai', 'Update master pegawai', 'adi', 'adi', '2019-04-19 15:27:25', '2019-04-19 15:27:25', NULL),
	(83, '1', 1, 1, 'm_pegawai', 'Update master pegawai', 'adi', 'adi', '2019-04-19 15:28:17', '2019-04-19 15:28:17', NULL),
	(84, '1', 1, 1, 'm_pegawai', 'Update master pegawai', 'adi', 'adi', '2019-04-19 15:28:31', '2019-04-19 15:28:31', NULL),
	(85, '1', 1, 1, 'm_pegawai', 'Update master pegawai', 'adi', 'adi', '2019-04-19 15:29:21', '2019-04-19 15:29:21', NULL),
	(86, '1', 1, 1, 'm_pegawai', 'Update master pegawai', 'adi', 'adi', '2019-04-19 15:29:25', '2019-04-19 15:29:25', NULL),
	(87, '1', 1, 1, 'm_pegawai', 'Update master pegawai', 'adi', 'adi', '2019-04-19 15:32:14', '2019-04-19 15:32:14', NULL),
	(88, '2', 1, 1, 'm_pegawai', 'simpan master pegawai', 'adi', 'adi', '2019-04-19 15:33:01', '2019-04-19 15:33:01', NULL),
	(89, '2', 1, 1, 'm_pegawai', 'Update master pegawai', 'adi', 'adi', '2019-04-19 15:35:13', '2019-04-19 15:35:13', NULL),
	(90, '1', 1, 1, 'm_pegawai', 'Hapus master pegawai', 'adi', 'adi', '2019-04-19 15:46:23', '2019-04-19 15:46:23', NULL),
	(91, '2', 1, 1, 'm_pegawai', 'Update master pegawai', 'adi', 'adi', '2019-04-19 15:48:56', '2019-04-19 15:48:56', NULL),
	(92, '2', 1, 1, 's_cabang', 'Update master cabang', 'adi', 'adi', '2019-04-19 15:54:39', '2019-04-19 15:54:39', NULL),
	(93, '2', 1, 1, 's_cabang', 'Update master cabang', 'adi', 'adi', '2019-04-19 15:54:41', '2019-04-19 15:54:41', NULL);
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
  `deleted_at` timestamp NULL DEFAULT NULL,
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

-- Dumping data for table jpmandiri.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `username`, `name`, `address`, `birth_date`, `email`, `email_verified_at`, `password`, `remember_token`, `jabatan_id`, `image`, `cabang_id`, `connection_id`, `last_login`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'admin', 'adi', 'medokan', '1995-11-27', 'dewa17a@gmail.com', '2018-12-04 08:37:16', '$2y$10$omknfk0ADkpMVHt2AGvZtOAOzNQSttzi0WDBL7pX7R1uzyTIqLy6C', '4kNtdsX0yxn8ZZwLjtu8lAEuLdKkJ8Fr3SxieArJHwjK99YVZBt3GTAMxiBr', 1, NULL, 1, 1, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
