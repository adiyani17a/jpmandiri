-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.37-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
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

-- Dumping data for table jpmandiri.s_cabang: ~1 rows (approximately)
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

-- Dumping data for table jpmandiri.s_daftar_menu: ~10 rows (approximately)
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
	(9, 'setting periode', '-', 2, 0, 1, '2018-12-06 14:25:32', '2018-12-06 14:25:32');
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
	(2, 'setting keuangan', 'setting keuangan', '2018-12-06 11:39:04', '2018-12-06 11:39:04', 1, 1);
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
  `updated_by` varchar(50) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  PRIMARY KEY (`id`,`dt`),
  KEY `FK_s_hak_akses_s_jabatan` (`jabatan_id`),
  KEY `FK_s_hak_akses_s_daftar_menu` (`daftar_menu_id`),
  CONSTRAINT `FK_s_hak_akses_s_daftar_menu` FOREIGN KEY (`daftar_menu_id`) REFERENCES `s_daftar_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_s_hak_akses_s_jabatan` FOREIGN KEY (`jabatan_id`) REFERENCES `s_jabatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table jpmandiri.s_hak_akses: ~0 rows (approximately)
/*!40000 ALTER TABLE `s_hak_akses` DISABLE KEYS */;
REPLACE INTO `s_hak_akses` (`id`, `dt`, `jabatan_id`, `daftar_menu`, `daftar_menu_id`, `aktif`, `tambah`, `ubah`, `hapus`, `cabang`, `global`, `print`, `validasi`, `created_at`, `updated_at`, `updated_by`, `created_by`) VALUES
	(1, 1, 1, 'setting group menu', 1, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 13:55:47', '2018-12-06 13:55:47', 'adi', 'adi'),
	(2, 2, 2, 'setting group menu', 1, 1, 1, 0, 0, 0, 0, 0, 0, '2018-12-06 13:55:47', '2018-12-06 14:41:02', 'adi', 'adi'),
	(3, 1, 1, 'setting daftar menu', 2, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 13:56:35', '2018-12-06 13:56:35', 'adi', 'adi'),
	(4, 2, 2, 'setting daftar menu', 2, 1, 1, 0, 0, 0, 0, 0, 0, '2018-12-06 13:56:35', '2018-12-06 14:41:10', 'adi', 'adi'),
	(5, 1, 1, 'setting hak akses', 3, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 13:57:27', '2018-12-06 13:57:27', 'adi', 'adi'),
	(6, 2, 2, 'setting hak akses', 3, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 13:57:27', '2018-12-06 13:57:27', 'adi', 'adi'),
	(7, 1, 1, 'setting user', 4, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 13:57:43', '2018-12-06 13:57:43', 'adi', 'adi'),
	(8, 2, 2, 'setting user', 4, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 13:57:43', '2018-12-06 13:57:43', 'adi', 'adi'),
	(9, 1, 1, 'setting jabatan', 5, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 13:57:52', '2018-12-06 13:57:52', 'adi', 'adi'),
	(10, 2, 2, 'setting jabatan', 5, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 13:57:52', '2018-12-06 13:57:52', 'adi', 'adi'),
	(11, 1, 1, 'setting cabang', 6, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 13:58:15', '2018-12-06 13:58:15', 'adi', 'adi'),
	(12, 2, 2, 'setting cabang', 6, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 13:58:15', '2018-12-06 13:58:15', 'adi', 'adi'),
	(13, 1, 1, 'setting database', 7, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 13:58:24', '2018-12-06 13:58:24', 'adi', 'adi'),
	(14, 2, 2, 'setting database', 7, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 13:58:24', '2018-12-06 13:58:24', 'adi', 'adi'),
	(15, 1, 1, 'setting tambah periode', 8, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 13:58:40', '2018-12-06 14:25:24', 'adi', 'adi'),
	(16, 2, 2, 'setting tambah periode', 8, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 13:58:40', '2018-12-06 14:25:24', 'adi', 'adi'),
	(17, 1, 1, 'setting periode', 9, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 13:58:50', '2018-12-06 14:25:32', 'adi', 'adi'),
	(18, 2, 2, 'setting periode', 9, 1, 0, 0, 0, 0, 0, 0, 0, '2018-12-06 13:58:50', '2018-12-06 14:25:32', 'adi', 'adi');
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

-- Dumping data for table jpmandiri.s_jabatan: ~2 rows (approximately)
/*!40000 ALTER TABLE `s_jabatan` DISABLE KEYS */;
REPLACE INTO `s_jabatan` (`id`, `nama`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(1, 'SUPERUSER', '2018-12-06 13:08:30', '2018-12-06 13:08:30', '1', '1'),
	(2, 'kepala cabang', '2018-12-06 13:16:41', '2018-12-06 13:16:41', '1', '1');
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

-- Dumping data for table jpmandiri.s_log_history: ~2 rows (approximately)
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
	(17, '10', 1, 1, 's_daftar_menu', 'update daftar menu', 'adi', 'adi', '2018-12-06 14:25:32', '2018-12-06 14:25:32');
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

-- Dumping data for table jpmandiri.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `username`, `name`, `address`, `birth_date`, `email`, `email_verified_at`, `password`, `remember_token`, `jabatan_id`, `image`, `cabang_id`, `connection_id`, `last_login`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'adi', 'medokan', '1995-11-27', 'dewa17a@gmail.com', '2018-12-04 08:37:16', '$2y$10$omknfk0ADkpMVHt2AGvZtOAOzNQSttzi0WDBL7pX7R1uzyTIqLy6C', '4kNtdsX0yxn8ZZwLjtu8lAEuLdKkJ8Fr3SxieArJHwjK99YVZBt3GTAMxiBr', 1, NULL, 1, 1, NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
