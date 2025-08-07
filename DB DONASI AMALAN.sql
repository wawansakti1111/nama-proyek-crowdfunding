-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table db_crowdfunding.campaigns: ~9 rows (approximately)

-- Dumping data for table db_crowdfunding.campaign_payment_methods: ~0 rows (approximately)

-- Dumping data for table db_crowdfunding.comments: ~26 rows (approximately)

-- Dumping data for table db_crowdfunding.donations: ~26 rows (approximately)

-- Dumping data for table db_crowdfunding.failed_jobs: ~0 rows (approximately)

-- Dumping data for table db_crowdfunding.migrations: ~14 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2025_07_22_174216_create_campaigns_table', 1),
	(6, '2025_07_22_174244_create_donations_table', 1),
	(7, '2025_07_24_095352_create_campaign_payment_methods_table', 1),
	(8, '2025_07_24_195604_add_payment_methods_to_campaigns_table', 1),
	(9, '2025_07_24_202137_add_donor_whatsapp_to_donations_table', 1),
	(10, '2025_07_24_202551_add_user_id_to_donations_table', 1),
	(11, '2025_07_25_181339_create_payment_methods_table', 1),
	(12, '2025_07_25_183432_remove_payment_methods_from_campaigns_table', 1),
	(13, '2025_07_25_190537_fix_payment_method_column_in_donations_table', 2),
	(14, '2025_07_25_192516_add_account_holder_name_to_payment_methods_table', 3),
	(15, '2025_07_27_181902_create_comments_table', 4),
	(16, '2025_07_27_183705_modify_comments_for_guests_table', 5),
	(17, '2025_08_02_152127_add_role_to_users_table', 6);

-- Dumping data for table db_crowdfunding.password_reset_tokens: ~0 rows (approximately)

-- Dumping data for table db_crowdfunding.payment_methods: ~8 rows (approximately)

-- Dumping data for table db_crowdfunding.personal_access_tokens: ~0 rows (approximately)

-- Dumping data for table db_crowdfunding.users: ~4 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'ADMIN UTAMA', 'admin@gmail.com', '2025-08-06 18:33:08', '$2y$12$PpO5NfGJXtPOBFwFM2mdtuKr47WprJLcXwcDLtzaw0VIifHSsoUku', 'admin', NULL, '2025-07-25 11:36:08', '2025-07-25 11:36:08'),
	(2, 'Hafizuddin', 'hafizjawai@gmail.com', '2025-08-02 15:32:37', '$2y$12$IzpSXYrrjsNLhNbTgCGYJ.4caR1gFRP.YDJJCgoa94wmMJmVpVvQ6', 'admin', NULL, '2025-07-27 13:34:37', '2025-07-27 13:34:37'),
	(3, 'Admin Utama', 'admin@example.com', '2025-08-02 15:28:59', '$2y$12$zViYdE8LDloclAnHFYukO.xDSdOFUCJAS1XXd7eVNrHs5Fpwg4BzG', 'admin', NULL, '2025-08-02 08:28:23', '2025-08-02 08:28:23'),
	(4, 'Donny Hidayat', 'donnyhidayat@gmail.com', '2025-08-02 15:28:57', '$2y$12$jmWQbBglawjD.8YQ.PljpOHxrKtVqNfFCBIOjqj7UUo79QtRTb5CW', 'admin', NULL, '2025-08-02 08:28:23', '2025-08-02 08:28:23'),
	(5, 'Raihan', 'raihan@gmail.com', '2025-08-02 15:28:55', '$2y$12$3ItX.6/GbnbKra5P05J2QekUMT1awlfE0IHVvd4sOinK/zdFWQ65e', 'admin', NULL, '2025-08-02 08:28:24', '2025-08-02 08:28:24');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
