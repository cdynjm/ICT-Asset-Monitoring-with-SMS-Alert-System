/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `assets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `model_number` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `serial_number` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `property_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int NOT NULL,
  `person_in_charge` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date_borrowed` date NOT NULL,
  `date_returned` date DEFAULT NULL,
  `asset_condition` int DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `defective_asset` (
  `id` int NOT NULL AUTO_INCREMENT,
  `report_id` int DEFAULT NULL,
  `property_id` int DEFAULT NULL,
  `others` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `instructors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `issues` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `registered_assets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `property` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `model_number` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `serial_number` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `person_in_charge` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `room` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `reports` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL,
  `roomid` int NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `specify` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` int NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_reported` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_fixed` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `month` int DEFAULT NULL,
  `admin_read` int NOT NULL,
  `user_read` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `room_schedule` (
  `id` int NOT NULL AUTO_INCREMENT,
  `semester_id` int DEFAULT NULL,
  `room_id` int DEFAULT NULL,
  `instructor_id` int DEFAULT NULL,
  `date_from` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_to` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mon` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tue` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `wed` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `thu` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fri` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sat` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `rooms` (
  `id` int NOT NULL AUTO_INCREMENT,
  `room` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `schedule` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL,
  `roomid` int NOT NULL,
  `date_from` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date_to` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `semester` (
  `id` int NOT NULL AUTO_INCREMENT,
  `from_year` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `to_year` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `semester` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `sms_token_identity` (
  `id` int NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `access_token` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mobile_identity` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_me` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `assets` (`id`, `name`, `position`, `contact_number`, `model_number`, `serial_number`, `property_name`, `quantity`, `person_in_charge`, `date_borrowed`, `date_returned`, `asset_condition`, `remarks`, `status`, `created_at`, `updated_at`) VALUES
(15, 'Geraldine Mangmang', 'Dean', '09668337036', '346364', '346344', 'Computer Unit', 1, 'CZARINA ANCELLA GABI', '2023-12-02', '2023-12-19', 0, NULL, 0, '2023-12-02 11:59:16', NULL);
INSERT INTO `assets` (`id`, `name`, `position`, `contact_number`, `model_number`, `serial_number`, `property_name`, `quantity`, `person_in_charge`, `date_borrowed`, `date_returned`, `asset_condition`, `remarks`, `status`, `created_at`, `updated_at`) VALUES
(16, 'Giello Seiga', 'Instructor', '09668337036', '12345', '54321', 'LED TV', 2, 'CZARINA ANCELLA GABI', '2023-12-03', '2023-12-02', 0, NULL, 0, '2023-12-02 12:00:16', NULL);
INSERT INTO `assets` (`id`, `name`, `position`, `contact_number`, `model_number`, `serial_number`, `property_name`, `quantity`, `person_in_charge`, `date_borrowed`, `date_returned`, `asset_condition`, `remarks`, `status`, `created_at`, `updated_at`) VALUES
(17, 'KEANO NIKKO SY', 'Instructor I', '09533182117', '12345', '54321', 'LED TV', 1, 'CZARINA ANCELLA GABI', '2023-12-04', '2023-12-20', 0, NULL, 0, '2023-12-20 03:43:18', NULL);
INSERT INTO `assets` (`id`, `name`, `position`, `contact_number`, `model_number`, `serial_number`, `property_name`, `quantity`, `person_in_charge`, `date_borrowed`, `date_returned`, `asset_condition`, `remarks`, `status`, `created_at`, `updated_at`) VALUES
(18, 'JIMSON OLAYBAR', 'Instructor I', '0945987243', '000000001', '0000000230', 'Projector', 1, 'CZARINA ANCELLA GABI', '2023-12-04', '2023-12-20', 0, NULL, 0, '2023-12-20 03:44:13', NULL),
(19, 'RENE RADAZA', 'Instructor I', '0945987243', '000000001', '0000000230', 'Projector', 1, 'CZARINA ANCELLA GABI', '2023-12-05', NULL, NULL, NULL, 1, '2023-12-20 03:45:21', NULL),
(20, 'KEANO NIKKO SY', 'Instructor I', '09533182117', '000000001', '0000000230', 'Projector', 1, 'CZARINA ANCELLA GABI', '2023-12-20', NULL, NULL, NULL, 1, '2023-12-20 04:49:07', NULL),
(21, 'FLORENTINO GOZO', 'Instructor I', '09533182117', '346364', '346344', 'Computer Unit', 1, 'CZARINA ANCELLA GABI', '2023-12-20', '2023-12-20', 0, NULL, 0, '2023-12-20 08:10:52', NULL);

INSERT INTO `defective_asset` (`id`, `report_id`, `property_id`, `others`, `created_at`, `updated_at`) VALUES
(35, 57, NULL, 'gg', '2023-11-21 02:32:23', NULL);
INSERT INTO `defective_asset` (`id`, `report_id`, `property_id`, `others`, `created_at`, `updated_at`) VALUES
(37, 58, 14, NULL, '2023-11-21 02:50:34', NULL);
INSERT INTO `defective_asset` (`id`, `report_id`, `property_id`, `others`, `created_at`, `updated_at`) VALUES
(38, 59, NULL, 'Pc 2', '2023-11-21 03:05:26', NULL);
INSERT INTO `defective_asset` (`id`, `report_id`, `property_id`, `others`, `created_at`, `updated_at`) VALUES
(40, 60, NULL, 'pc1', '2023-11-22 06:18:29', NULL),
(43, 61, 12, NULL, '2023-12-04 03:26:16', NULL),
(44, 62, NULL, '18', '2023-12-12 08:18:04', NULL),
(46, 63, NULL, '18', '2023-12-12 08:33:03', NULL),
(48, 64, NULL, '18', '2023-12-20 05:13:23', NULL),
(50, 65, NULL, '1', '2023-12-20 08:18:46', NULL),
(51, 65, 14, NULL, '2023-12-20 08:18:46', NULL),
(52, 66, 14, NULL, '2023-12-20 08:21:51', NULL),
(53, 67, NULL, '18', '2023-12-20 08:24:05', NULL),
(54, 67, 14, NULL, '2023-12-20 08:24:05', NULL),
(55, 68, 14, NULL, '2023-12-22 00:39:31', NULL),
(57, 70, NULL, 'Table', '2023-12-22 00:47:09', NULL),
(59, 70, 17, NULL, '2023-12-22 00:47:09', NULL),
(60, 70, 12, NULL, '2023-12-22 00:47:09', NULL),
(61, 71, 14, NULL, '2023-12-28 13:43:43', NULL),
(62, 71, 20, NULL, '2023-12-28 13:43:43', NULL),
(63, 72, 14, NULL, '2024-01-04 02:28:26', NULL),
(64, 72, 20, NULL, '2024-01-04 02:28:26', NULL),
(65, 73, 21, NULL, '2024-01-04 02:29:47', NULL),
(66, 73, 22, NULL, '2024-01-04 02:29:47', NULL),
(67, 74, 21, NULL, '2024-01-04 15:35:21', '2024-01-04 15:35:21');



INSERT INTO `instructors` (`id`, `name`, `position`, `contact_number`, `address`, `created_at`, `updated_at`) VALUES
(4, 'CZARINA ANCELLA GABI', 'Assistant Professor II', '09533182117', 'Bontoc Southern Leyte', '2023-08-17 02:28:47', NULL);
INSERT INTO `instructors` (`id`, `name`, `position`, `contact_number`, `address`, `created_at`, `updated_at`) VALUES
(5, 'GILBERT SIEGA', 'Instructor I', '09533182117', 'Bontoc Southern Leyte', '2023-08-17 03:18:26', NULL);
INSERT INTO `instructors` (`id`, `name`, `position`, `contact_number`, `address`, `created_at`, `updated_at`) VALUES
(6, 'RENEE CLINT GORTIFACION', 'Instructor I', '09533876062', 'Bontoc Southern Leyte', '2023-08-17 09:40:20', NULL);
INSERT INTO `instructors` (`id`, `name`, `position`, `contact_number`, `address`, `created_at`, `updated_at`) VALUES
(7, 'RENE RADAZA', 'Instructor I', '09523985117', 'Sogod Southern Leyte', '2023-08-17 22:19:37', NULL),
(8, 'KEANO NIKKO SY', 'Instructor I', '09533182117', 'Bontoc Southen Leyte', '2023-08-18 05:40:41', NULL),
(9, 'GERALDINE MANGMANG', 'Assistant Professor II', '09563597251', 'Bontoc Southern Leyte', '2023-08-21 03:41:18', NULL),
(10, 'FLORENTINO GOZO', 'Instructor I', '09533182117', 'Libagon Southern Leyte', '2023-08-21 05:02:32', NULL),
(11, 'JIMSON OLAYBAR', 'Assistant Professor II', '09256218223', 'Sogod Southern Leyte', '2023-10-17 01:40:25', NULL),
(12, 'IRENE MARCEL LAGUA', 'Instructor I', '095328917', 'Sogod Southern Leyte', '2023-11-21 04:52:13', NULL),
(13, 'NERISSA JOHNNA CODAL', 'Part-Time', '090293072323', 'Sogod Southern Leyte', '2023-11-22 03:06:29', NULL),
(14, 'JANNIE FLEUR ORANO', 'Instructor I', '09903783434', 'Mahaplag Southern Leyte', '2023-11-22 03:10:54', NULL),
(16, 'PATREX AMOGUIZ', 'Part-Time Instructor', '09675245182', 'Sogod Southern Leyte', '2023-11-22 06:53:09', NULL),
(17, 'JORTON TAGUD', 'Instructor I', '09765423421', 'Sogod Southern Leyte', '2023-11-23 01:46:42', NULL),
(18, 'ALEX BACALLA', 'Professor II', '09029307232', 'Sogod Southern Leyte', '2023-11-23 01:49:24', NULL),
(19, 'FRANCIS REY PADAO', 'Assistant Professor I', '09903783434', 'Sogod Southern Leyte', '2023-11-23 01:51:51', NULL),
(20, 'JERSON MAASIN', 'Part-Time', '09533182117', 'Sogod Southern Leyte', '2023-12-20 04:29:06', NULL);

INSERT INTO `issues` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'No Internet Connection', '2023-10-10 03:00:49', NULL);
INSERT INTO `issues` (`id`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Defective LAN Cable', '2023-10-10 03:05:07', NULL);


INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);





INSERT INTO `registered_assets` (`id`, `property`, `model_number`, `serial_number`, `person_in_charge`, `photo`, `room`, `created_at`, `status`, `updated_at`) VALUES
(12, 'LED TV', '12345', '54321', '4', 'led-tv-20231018-070243.jpg', 14, '2023-10-17 23:02:43', 1, NULL);
INSERT INTO `registered_assets` (`id`, `property`, `model_number`, `serial_number`, `person_in_charge`, `photo`, `room`, `created_at`, `status`, `updated_at`) VALUES
(14, 'Computer Unit-1', '00001', '56789', '4', 'computer-20231018-092424.jpg', 11, '2023-10-18 01:24:24', 1, NULL);
INSERT INTO `registered_assets` (`id`, `property`, `model_number`, `serial_number`, `person_in_charge`, `photo`, `room`, `created_at`, `status`, `updated_at`) VALUES
(16, 'Projector', '000000001', '0000000230', '4', 'projector-20231220-114116.jpg', 8, '2023-12-20 03:41:16', 1, NULL);
INSERT INTO `registered_assets` (`id`, `property`, `model_number`, `serial_number`, `person_in_charge`, `photo`, `room`, `created_at`, `status`, `updated_at`) VALUES
(17, 'electric fan', '11111111', '11111122', '5', 'electric-fan-20231228-213442.jpg', 10, '2023-12-20 08:35:04', 1, NULL),
(19, 'Cooler', '12345', '12345', '18', 'cooler-20231222-093356.jpg', 14, '2023-12-22 01:33:56', 1, NULL),
(20, 'Computer Unit-2', '00002', '567810', '4', 'computer-unit-2-20231228-213901.jpg', 11, '2023-12-28 13:38:36', 1, NULL),
(21, 'Computer Unit-1', '00001', '56789', '4', 'computer-unit-1-20240102-125805.jpg', 1, '2024-01-02 04:58:05', 1, NULL),
(22, 'Computer Unit-2', '00002', '567810', '4', 'computer-unit-1-20240102-125909.jpg', 1, '2024-01-02 04:59:09', 1, NULL),
(23, 'computer', '001', '0000', '4', 'computer-20240105-145339.jpg', 7, '2024-01-05 14:53:39', 1, '2024-01-05 14:56:28');

INSERT INTO `reports` (`id`, `userid`, `roomid`, `description`, `specify`, `status`, `comment`, `date_reported`, `date_fixed`, `month`, `admin_read`, `user_read`, `created_at`, `updated_at`) VALUES
(71, 4, 11, '2', NULL, 1, NULL, '2023-12-28 21:43', NULL, 12, 0, 0, '2023-12-28 13:43:43', '2024-01-13 16:54:29');
INSERT INTO `reports` (`id`, `userid`, `roomid`, `description`, `specify`, `status`, `comment`, `date_reported`, `date_fixed`, `month`, `admin_read`, `user_read`, `created_at`, `updated_at`) VALUES
(72, 8, 11, '2', NULL, 0, NULL, '2024-01-04 10:28', '2024-01-04 10:38', 1, 0, 1, '2024-01-04 02:28:26', '2024-01-13 16:54:29');
INSERT INTO `reports` (`id`, `userid`, `roomid`, `description`, `specify`, `status`, `comment`, `date_reported`, `date_fixed`, `month`, `admin_read`, `user_read`, `created_at`, `updated_at`) VALUES
(73, 4, 1, '1', NULL, 0, NULL, '2024-01-04 10:29', '2024-01-04 10:37', 1, 0, 1, '2024-01-04 02:29:47', '2024-01-13 16:54:29');
INSERT INTO `reports` (`id`, `userid`, `roomid`, `description`, `specify`, `status`, `comment`, `date_reported`, `date_fixed`, `month`, `admin_read`, `user_read`, `created_at`, `updated_at`) VALUES
(74, 5, 1, '1', NULL, 1, NULL, '2024-01-04 15:35', NULL, 1, 0, 0, '2024-01-04 15:35:21', '2024-01-13 16:54:29');

INSERT INTO `room_schedule` (`id`, `semester_id`, `room_id`, `instructor_id`, `date_from`, `date_to`, `mon`, `tue`, `wed`, `thu`, `fri`, `sat`, `created_at`, `updated_at`) VALUES
(30, 1, 5, 11, '09:00', '10:00', '1', NULL, NULL, '4', NULL, NULL, '2023-11-21 03:21:35', NULL);
INSERT INTO `room_schedule` (`id`, `semester_id`, `room_id`, `instructor_id`, `date_from`, `date_to`, `mon`, `tue`, `wed`, `thu`, `fri`, `sat`, `created_at`, `updated_at`) VALUES
(32, 1, 19, 8, '11:00', '00:00', NULL, '2', NULL, NULL, '5', NULL, '2023-11-21 03:25:52', NULL);
INSERT INTO `room_schedule` (`id`, `semester_id`, `room_id`, `instructor_id`, `date_from`, `date_to`, `mon`, `tue`, `wed`, `thu`, `fri`, `sat`, `created_at`, `updated_at`) VALUES
(33, 1, 5, 8, '13:00', '14:30', NULL, '2', NULL, NULL, '5', NULL, '2023-11-21 03:26:46', NULL);
INSERT INTO `room_schedule` (`id`, `semester_id`, `room_id`, `instructor_id`, `date_from`, `date_to`, `mon`, `tue`, `wed`, `thu`, `fri`, `sat`, `created_at`, `updated_at`) VALUES
(34, 1, 5, 8, '14:30', '16:00', NULL, '2', NULL, NULL, '5', NULL, '2023-11-21 03:28:27', NULL),
(35, 1, 10, 8, '08:30', '10:00', NULL, '2', NULL, NULL, '5', NULL, '2023-11-21 03:31:20', NULL),
(37, 1, 1, 12, '07:00', '08:00', NULL, '2', NULL, NULL, '5', NULL, '2023-11-21 04:54:11', NULL),
(38, 1, 8, 12, '10:00', '11:30', NULL, '2', NULL, NULL, '5', NULL, '2023-11-21 04:56:14', NULL),
(39, 1, 8, 10, '13:00', '14:30', NULL, '2', NULL, NULL, '5', NULL, '2023-11-21 05:03:10', NULL),
(40, 1, 20, 10, '13:00', '14:30', NULL, '2', NULL, NULL, '5', NULL, '2023-11-21 05:05:11', NULL),
(41, 1, 20, 10, '14:30', '16:00', NULL, '2', NULL, NULL, '5', NULL, '2023-11-21 05:07:05', NULL),
(42, 1, 3, 8, '07:30', '09:00', '1', NULL, NULL, '4', NULL, NULL, '2023-11-22 04:00:12', NULL),
(43, 1, 8, 8, '10:00', '11:30', '1', NULL, NULL, '4', NULL, NULL, '2023-11-22 04:01:23', NULL),
(44, 1, 1, 8, '15:00', '16:00', '1', NULL, NULL, '4', NULL, NULL, '2023-11-22 04:03:00', NULL),
(45, 1, 19, 14, '09:00', '10:00', '1', NULL, NULL, '4', NULL, NULL, '2023-11-22 04:07:00', NULL),
(46, 1, 20, 14, '10:00', '11:30', '1', NULL, NULL, '4', NULL, NULL, '2023-11-22 04:07:52', NULL),
(47, 1, 3, 14, '16:00', '17:00', '1', NULL, NULL, '4', NULL, NULL, '2023-11-22 04:09:07', NULL),
(48, 1, 20, 14, '08:30', '10:00', NULL, '2', NULL, NULL, '5', NULL, '2023-11-22 04:10:08', NULL),
(49, 1, 7, 14, '10:00', '11:30', NULL, '2', NULL, NULL, '5', NULL, '2023-11-22 04:13:44', NULL),
(50, 1, 16, 10, '14:30', '16:30', NULL, NULL, '3', NULL, NULL, NULL, '2023-11-22 06:01:50', NULL),
(51, 1, 11, 16, '14:30', '17:30', NULL, NULL, '3', NULL, NULL, NULL, '2023-11-22 06:54:59', NULL),
(53, 1, 12, 11, '10:00', '11:30', '1', NULL, NULL, '4', NULL, NULL, '2023-11-23 01:56:54', NULL),
(54, 1, 1, 11, '14:00', '15:00', '1', NULL, NULL, '4', NULL, NULL, '2023-11-23 01:57:48', NULL),
(55, 1, 1, 7, '08:00', '09:00', '1', NULL, NULL, NULL, '5', NULL, '2023-11-23 01:59:18', NULL),
(56, 1, 3, 7, '10:00', '11:30', '1', NULL, NULL, '4', NULL, NULL, '2023-11-23 02:00:31', NULL),
(57, 1, 3, 7, '14:30', '16:00', '1', NULL, NULL, '4', NULL, NULL, '2023-11-23 02:01:11', NULL),
(58, 1, 6, 7, '16:00', '17:00', '1', NULL, NULL, '4', NULL, NULL, '2023-11-23 02:01:41', NULL),
(59, 1, 1, 5, '10:00', '11:30', '1', NULL, NULL, '4', NULL, NULL, '2023-11-23 02:02:34', NULL),
(60, 1, 8, 5, '13:00', '14:30', '1', NULL, NULL, '4', NULL, NULL, '2023-11-23 02:03:07', NULL),
(61, 1, 4, 17, '09:00', '10:00', '1', NULL, NULL, '4', NULL, NULL, '2023-11-23 02:10:34', NULL),
(62, 1, 10, 17, '10:00', '11:30', '1', NULL, NULL, '4', NULL, NULL, '2023-11-23 02:11:12', NULL),
(63, 1, 3, 17, '13:00', '14:00', '1', NULL, NULL, '4', NULL, NULL, '2023-11-23 02:11:55', NULL),
(64, 1, 8, 17, '16:00', '17:30', '1', NULL, NULL, '4', NULL, NULL, '2023-11-23 02:12:26', NULL),
(65, 1, 2, 4, '09:00', '10:00', '1', NULL, NULL, '4', NULL, NULL, '2023-11-23 02:13:32', NULL),
(66, 1, 7, 4, '13:00', '14:30', '1', NULL, NULL, '4', NULL, NULL, '2023-11-23 02:14:05', NULL),
(67, 1, 5, 12, '10:00', '11:00', '1', NULL, NULL, '4', NULL, NULL, '2023-11-23 02:16:53', NULL),
(68, 1, 4, 12, '13:00', '14:00', '1', NULL, NULL, '4', NULL, NULL, '2023-11-23 02:17:30', NULL),
(69, 1, 7, 12, '14:30', '16:00', '1', NULL, NULL, '4', NULL, NULL, '2023-11-23 02:18:43', NULL),
(70, 1, 12, 12, '16:00', '17:30', '1', NULL, NULL, '4', NULL, NULL, '2023-11-23 02:19:20', NULL),
(71, 1, 8, 18, '08:30', '10:00', '1', NULL, NULL, '4', NULL, NULL, '2023-11-23 02:21:46', NULL),
(72, 1, 1, 18, '13:00', '14:00', '1', NULL, NULL, '4', NULL, NULL, '2023-11-23 02:23:10', NULL),
(74, 1, 12, 6, '08:30', '01:00', '1', NULL, NULL, '4', NULL, NULL, '2023-11-23 02:25:31', NULL),
(75, 1, 6, 6, '11:00', '12:00', '1', NULL, NULL, '4', NULL, NULL, '2023-11-23 02:26:41', NULL),
(76, 1, 5, 6, '14:00', '15:00', '1', NULL, NULL, '4', NULL, NULL, '2023-11-23 02:27:18', NULL),
(77, 1, 7, 6, '16:00', '17:30', '1', NULL, NULL, '4', NULL, NULL, '2023-11-23 02:28:06', NULL),
(78, 1, 4, 13, '08:00', '09:00', '1', NULL, NULL, '4', NULL, NULL, '2023-11-23 02:33:04', NULL),
(79, 1, 4, 13, '10:00', '11:00', '1', NULL, NULL, '4', NULL, NULL, '2023-11-23 02:33:37', NULL),
(80, 1, 20, 13, '13:00', '14:30', '1', NULL, NULL, '4', NULL, NULL, '2023-11-23 02:34:53', NULL),
(81, 1, 2, 13, '15:00', '16:00', '1', NULL, NULL, '4', NULL, NULL, '2023-11-23 02:36:28', NULL),
(82, 1, 5, 13, '16:00', '17:00', '1', NULL, NULL, '4', NULL, NULL, '2023-11-23 02:45:17', NULL),
(83, 1, 11, 13, '19:00', '20:30', '1', NULL, NULL, '4', NULL, NULL, '2023-11-23 02:45:46', NULL),
(84, 1, 19, 10, '07:30', '08:30', '1', NULL, NULL, '4', NULL, NULL, '2023-11-23 02:53:43', NULL),
(85, 1, 7, 10, '08:30', '10:00', '1', NULL, NULL, '4', NULL, NULL, '2023-11-23 02:54:25', NULL),
(86, 1, 4, 10, '11:00', '00:00', '1', NULL, NULL, '4', NULL, NULL, '2023-11-23 02:55:20', NULL),
(87, 1, 4, 11, '10:00', '11:30', NULL, '2', NULL, NULL, '5', NULL, '2023-12-20 02:09:59', NULL),
(88, 1, 8, 11, '14:30', '16:00', NULL, '2', NULL, NULL, '5', NULL, '2023-12-20 02:11:22', NULL),
(89, 1, 10, 11, '16:00', '17:30', NULL, '2', NULL, NULL, '5', NULL, '2023-12-20 02:12:41', NULL),
(90, 1, 2, 7, '07:00', '08:30', NULL, '2', NULL, NULL, '5', NULL, '2023-12-20 02:14:57', NULL),
(91, 1, 10, 7, '10:00', '11:30', NULL, '2', NULL, NULL, '5', NULL, '2023-12-20 02:15:38', NULL),
(92, 1, 3, 7, '14:30', '16:00', NULL, '2', NULL, NULL, '5', NULL, '2023-12-20 02:17:22', NULL),
(93, 1, 20, 7, '08:30', '11:30', NULL, NULL, '3', NULL, NULL, NULL, '2023-12-20 02:18:26', NULL),
(94, 1, 7, 5, '08:30', '10:00', NULL, '2', NULL, NULL, '5', NULL, '2023-12-20 02:20:17', NULL),
(95, 1, 1, 5, '10:00', '11:00', NULL, '2', NULL, NULL, '5', NULL, '2023-12-20 02:21:08', NULL),
(96, 1, 12, 5, '14:30', '16:00', NULL, '2', NULL, NULL, '5', NULL, '2023-12-20 02:22:14', NULL),
(97, 1, 19, 5, '16:00', '17:00', NULL, '2', NULL, NULL, '5', NULL, '2023-12-20 02:22:54', NULL),
(98, 1, 1, 17, '08:30', '09:00', NULL, '2', NULL, NULL, '5', NULL, '2023-12-20 02:25:33', NULL),
(99, 1, 2, 17, '11:00', '12:00', NULL, '2', NULL, NULL, '5', NULL, '2023-12-20 02:26:10', NULL),
(100, 1, 10, 17, '14:30', '16:00', NULL, '2', NULL, NULL, '5', NULL, '2023-12-20 02:28:04', NULL),
(101, 1, 2, 4, '09:00', '10:00', NULL, '2', NULL, NULL, '5', NULL, '2023-12-20 02:30:21', NULL),
(102, 1, 7, 4, '13:00', '14:30', NULL, '2', NULL, NULL, '5', NULL, '2023-12-20 02:31:35', NULL),
(103, 1, 11, 18, '10:00', '11:30', NULL, '2', NULL, NULL, '5', NULL, '2023-12-20 02:35:28', NULL),
(104, 1, 19, 19, '13:00', '14:00', NULL, '2', NULL, NULL, '5', NULL, '2023-12-20 02:37:42', NULL),
(105, 1, 3, 19, '10:00', '11:00', NULL, '2', NULL, NULL, '5', NULL, '2023-12-20 02:39:53', NULL),
(106, 1, 7, 19, '07:00', '08:30', NULL, '2', NULL, NULL, '5', NULL, '2023-12-20 02:41:54', NULL),
(107, 1, 12, 19, '08:30', '10:00', NULL, '2', NULL, NULL, '5', NULL, '2023-12-20 02:42:51', NULL),
(108, 1, 4, 6, '09:00', '10:00', '1', NULL, NULL, '4', NULL, NULL, '2023-12-20 02:48:33', NULL),
(109, 1, 2, 6, '10:00', '11:00', NULL, '2', NULL, NULL, '5', NULL, '2023-12-20 02:52:01', NULL),
(110, 1, 8, 6, '16:00', '17:30', NULL, '2', NULL, NULL, '5', NULL, '2023-12-20 02:54:46', NULL),
(111, 1, 8, 6, '10:00', '11:00', NULL, NULL, '3', NULL, NULL, NULL, '2023-12-20 02:55:37', NULL),
(112, 1, 20, 13, '13:00', '14:30', NULL, '2', NULL, NULL, '5', NULL, '2023-12-20 03:09:24', NULL),
(113, 1, 12, 13, '20:30', '22:00', NULL, '2', NULL, NULL, '5', NULL, '2023-12-20 03:10:55', NULL);
INSERT INTO `room_schedule` (`id`, `semester_id`, `room_id`, `instructor_id`, `date_from`, `date_to`, `mon`, `tue`, `wed`, `thu`, `fri`, `sat`, `created_at`, `updated_at`) VALUES
(114, 1, 4, 6, '09:00', '10:00', NULL, '2', NULL, NULL, '5', NULL, '2023-12-20 03:13:44', NULL),
(115, 1, 2, 6, '10:00', '11:00', NULL, '2', NULL, NULL, '5', NULL, '2023-12-20 03:15:29', NULL),
(116, 1, 8, 6, '16:00', '17:30', NULL, '2', NULL, NULL, '5', NULL, '2023-12-20 03:17:44', NULL),
(117, 1, 12, 10, '08:30', '10:00', '1', NULL, NULL, '4', NULL, NULL, '2023-12-20 03:21:28', NULL),
(118, 1, 4, 10, '11:00', '12:00', '1', NULL, NULL, '4', NULL, NULL, '2023-12-20 03:21:57', NULL),
(119, 1, 19, 10, '16:00', '17:00', '1', NULL, NULL, '4', NULL, NULL, '2023-12-20 03:23:52', NULL),
(120, 1, 8, 10, '07:00', '08:30', NULL, '2', NULL, NULL, '5', NULL, '2023-12-20 03:25:45', NULL),
(121, 1, 20, 10, '13:00', '14:30', NULL, '2', NULL, NULL, '5', NULL, '2023-12-20 03:27:18', NULL),
(122, 1, 12, 10, '16:00', '17:30', NULL, '2', NULL, NULL, '5', NULL, '2023-12-20 03:29:42', NULL),
(123, 1, 12, 10, '17:30', '19:00', NULL, '2', NULL, NULL, '5', NULL, '2023-12-20 03:30:24', NULL),
(124, 1, 10, 20, '07:00', '10:00', NULL, NULL, '3', NULL, NULL, NULL, '2023-12-20 04:30:28', NULL),
(125, 1, 10, 20, '10:00', '11:30', NULL, NULL, '3', NULL, NULL, NULL, '2023-12-20 04:31:57', NULL),
(126, 1, 10, 20, '13:00', '14:30', NULL, NULL, '3', NULL, NULL, NULL, '2023-12-20 04:33:57', NULL);

INSERT INTO `rooms` (`id`, `room`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ICT-1', 1, '2023-08-17 03:38:11', NULL);
INSERT INTO `rooms` (`id`, `room`, `status`, `created_at`, `updated_at`) VALUES
(2, 'ICT-2', 1, '2023-08-17 03:45:02', NULL);
INSERT INTO `rooms` (`id`, `room`, `status`, `created_at`, `updated_at`) VALUES
(3, 'ICT-3', 1, '2023-08-17 03:46:40', NULL);
INSERT INTO `rooms` (`id`, `room`, `status`, `created_at`, `updated_at`) VALUES
(4, 'ICT-4', 1, '2023-08-17 03:46:45', NULL),
(5, 'ICT-5', 1, '2023-08-17 03:46:49', NULL),
(6, 'ICT-6', 1, '2023-08-17 03:46:58', NULL),
(7, 'LAB-1', 1, '2023-08-17 03:47:03', NULL),
(8, 'LAB-2', 1, '2023-08-17 03:47:07', NULL),
(10, 'LAB-MAC', 1, '2023-08-17 03:47:22', NULL),
(11, 'LAB-GIS', 1, '2023-08-17 03:49:04', NULL),
(12, 'LAB-3', 1, '2023-08-17 04:19:06', NULL),
(13, 'CISCO Lab', 1, '2023-08-17 04:23:40', NULL),
(14, 'Deans Office', NULL, '2023-08-17 04:24:21', NULL),
(15, 'Faculty Office', NULL, '2023-08-17 04:24:28', NULL),
(16, 'ICT-7', 1, '2023-08-17 07:12:23', NULL),
(17, 'ICT-8', 1, '2023-08-18 09:20:47', NULL),
(19, 'Audio Visual Room', 1, '2023-08-18 09:21:40', NULL),
(20, 'LAB-4', 1, '2023-08-18 09:21:51', NULL);

INSERT INTO `schedule` (`id`, `userid`, `roomid`, `date_from`, `date_to`, `status`, `created_at`, `updated_at`) VALUES
(63, 4, 7, '2023-10-17 07:00', '2023-10-17 08:30', 0, '2023-10-16 23:06:15', NULL);
INSERT INTO `schedule` (`id`, `userid`, `roomid`, `date_from`, `date_to`, `status`, `created_at`, `updated_at`) VALUES
(64, 4, 6, '2023-10-17 10:00', '2023-10-17 11:00', 0, '2023-10-17 02:53:44', NULL);
INSERT INTO `schedule` (`id`, `userid`, `roomid`, `date_from`, `date_to`, `status`, `created_at`, `updated_at`) VALUES
(65, 10, 7, '2023-10-17 11:00', '2023-10-17 12:00', 0, '2023-10-17 03:00:20', NULL);
INSERT INTO `schedule` (`id`, `userid`, `roomid`, `date_from`, `date_to`, `status`, `created_at`, `updated_at`) VALUES
(66, 9, 17, '2023-10-17 11:00', '2023-10-17 12:00', 0, '2023-10-17 03:21:28', NULL),
(67, 4, 3, '2023-10-17 20:00', '2023-10-17 21:00', 0, '2023-10-17 12:10:00', NULL),
(68, 6, 2, '2023-10-18 08:00', '2023-10-18 09:00', 0, '2023-10-18 00:01:05', NULL),
(69, 8, 5, '2023-10-18 08:30', '2023-10-18 11:30', 0, '2023-10-18 00:31:27', NULL),
(70, 6, 12, '2023-10-18 09:00', '2023-10-18 10:30', 0, '2023-10-18 01:01:24', NULL),
(71, 9, 2, '2023-10-18 09:00', '2023-10-18 12:00', 0, '2023-10-18 01:02:44', NULL),
(72, 7, 11, '2023-10-18 09:00', '2023-10-18 10:30', 0, '2023-10-18 01:06:09', NULL),
(73, 4, 3, '2023-11-08 06:00', '2023-11-08 07:30', 0, '2023-11-07 23:24:10', NULL),
(74, 4, 20, '2023-11-08 06:00', '2023-11-08 07:30', 0, '2023-11-07 23:24:50', NULL),
(75, 4, 5, '2023-11-08 07:30', '2023-11-08 09:00', 0, '2023-11-07 23:33:01', NULL),
(76, 10, 6, '2023-11-08 07:30', '2023-11-08 09:00', 0, '2023-11-07 23:33:27', NULL),
(77, 10, 5, '2023-11-08 07:30', '2023-11-08 09:00', 0, '2023-11-07 23:34:51', NULL),
(78, 4, 6, '2023-11-08 07:30', '2023-11-08 09:00', 0, '2023-11-07 23:35:24', NULL),
(79, 10, 20, '2023-11-21 13:00', '2023-11-21 14:30', 0, '2023-11-21 05:12:31', NULL),
(80, 8, 8, '2023-11-21 16:00', '2023-11-21 18:30', 0, '2023-11-21 08:22:31', NULL),
(81, 14, 11, '2023-11-22 13:00', '2023-11-22 14:30', 0, '2023-11-22 05:56:14', NULL),
(82, 18, 1, '2023-11-23 13:00', '2023-11-23 14:00', 0, '2023-11-23 05:04:31', NULL),
(83, 4, 7, '2023-11-23 13:00', '2023-11-23 14:30', 0, '2023-11-23 05:04:55', NULL),
(84, 5, 8, '2023-11-23 13:00', '2023-11-23 14:30', 0, '2023-11-23 05:07:47', NULL),
(85, 12, 4, '2023-11-23 13:00', '2023-11-23 14:00', 0, '2023-11-23 05:08:43', NULL),
(86, 17, 3, '2023-11-23 13:00', '2023-11-23 14:00', 0, '2023-11-23 05:09:43', NULL),
(87, 8, 20, '2023-11-23 13:00', '2023-11-23 14:30', 0, '2023-11-23 05:33:54', NULL),
(88, 10, 15, '2023-11-23 15:00', '2023-11-23 16:30', 0, '2023-11-23 05:40:55', NULL),
(89, 8, 1, '2023-11-30 18:00', '2023-11-30 19:00', 0, '2023-11-30 10:02:29', NULL),
(90, 12, 1, '2023-11-30 18:00', '2023-11-30 19:00', 0, '2023-11-30 10:03:24', NULL),
(91, 8, 8, '2023-12-07 10:00', '2023-12-07 11:30', 0, '2023-12-07 03:04:12', NULL),
(92, 7, 20, '2023-12-20 08:00', '2023-12-20 11:30', 0, '2023-12-20 04:21:06', NULL),
(93, 17, 7, '2023-12-20 07:00', '2023-12-20 10:00', 0, '2023-12-20 04:25:12', NULL),
(94, 20, 10, '2023-12-20 07:00', '2023-12-20 10:00', 0, '2023-12-20 04:37:37', NULL),
(95, 20, 10, '2023-12-20 10:00', '2023-12-20 11:30', 0, '2023-12-20 04:38:49', NULL),
(96, 20, 10, '2023-12-20 13:00', '2023-12-20 14:30', 0, '2023-12-20 05:12:17', NULL),
(97, 16, 11, '2023-12-20 14:30', '2023-12-20 17:30', 0, '2023-12-20 06:42:05', NULL),
(98, 10, 16, '2023-12-20 14:30', '2023-12-20 16:30', 0, '2023-12-20 07:04:21', NULL),
(99, 8, 10, '2023-12-22 08:30', '2023-12-22 10:00', 0, '2023-12-22 00:39:06', NULL),
(100, 4, 2, '2023-12-22 09:00', '2023-12-22 10:00', 0, '2023-12-22 01:06:53', NULL),
(101, 4, 2, '2024-01-04 09:00', '2024-01-04 10:00', 0, '2024-01-04 01:56:00', NULL);

INSERT INTO `semester` (`id`, `from_year`, `to_year`, `semester`, `created_at`, `updated_at`) VALUES
(1, '2023', '2024', '1', '2023-10-16 23:53:54', NULL);


INSERT INTO `sms_token_identity` (`id`, `url`, `access_token`, `mobile_identity`, `created_at`, `updated_at`) VALUES
(1, 'https://api.pushbullet.com/v2/texts', 'o.R6lR2Gmn7yuEHAUdibTawYFRYrIAQUBH', 'ujy9oEqJFsasjBS5UmcGnQ', '2023-08-21 06:56:10', NULL);


INSERT INTO `users` (`id`, `userid`, `name`, `email`, `password`, `phone`, `location`, `about_me`, `remember_token`, `type`, `created_at`, `updated_at`) VALUES
(1, 0, 'ROLLY ACASO', 'rolly@admin.com', '$2y$10$QiNT.cFYUb/0IDHhF95L3Op1t/KJ0e38UKY6Mb9oVoCtJuPQsbzuW', '09089259337', 'Sogod Southern Leyte', 'ICT MS - Administrator', NULL, 1, '2023-08-15 23:14:54', '2023-12-12 08:26:14');
INSERT INTO `users` (`id`, `userid`, `name`, `email`, `password`, `phone`, `location`, `about_me`, `remember_token`, `type`, `created_at`, `updated_at`) VALUES
(4, 4, 'CZARINA ANCELLA GABI', 'czarina@gmail.com', '$2y$10$C6StdRtMRruG2F.Oy0COKuLC1WT1lMoDPuUCLoSsHKyxQdfEePoLK', '09661195690', 'Bontoc Southern Leyte', NULL, NULL, 2, '2023-08-16 18:28:47', '2023-11-14 01:12:09');
INSERT INTO `users` (`id`, `userid`, `name`, `email`, `password`, `phone`, `location`, `about_me`, `remember_token`, `type`, `created_at`, `updated_at`) VALUES
(5, 5, 'GILBERT SIEGA', 'gelo@gmail.com', '$2y$10$FPMblYOl8MCDSatlLU/sQusdQFLmtU4.vdjBIpehGVCKi7Jx65qqi', '09661195690', 'Bontoc Southern Leyte', NULL, NULL, 2, '2023-08-16 19:18:26', '2023-11-09 08:50:52');
INSERT INTO `users` (`id`, `userid`, `name`, `email`, `password`, `phone`, `location`, `about_me`, `remember_token`, `type`, `created_at`, `updated_at`) VALUES
(6, 6, 'RENEE CLINT GORTIFACION', 'renee@gmail.com', '$2y$10$h8g2AMqgb/5cHCpAGXPL3.HJpR.NM0DzcGThfPnsE80j6/E5LzY2y', '09661195690', 'Bontoc Southern Leyte', NULL, NULL, 2, '2023-08-17 01:40:21', '2023-11-22 03:50:27'),
(7, 7, 'RENE RADAZA', 'rene@gmail.com', '$2y$10$DnUNZHv.iOBCne7DqxJKOOlT3T9l/KBBuQWXUdX12dnTtI/a4PtrW', '09661195690', 'Sogod Southern Leyte', NULL, NULL, 2, '2023-08-17 14:19:37', '2023-11-22 03:50:56'),
(8, 8, 'KEANO NIKKO SY', 'keano@gmail.com', '$2y$10$Bviw.jHhGtyGxSHG9ozD.OUPWpkTl6qeOV8i6D3SuxfHO/e.Mgn8O', '09062958437', 'Bontoc Southen Leyte', NULL, NULL, 2, '2023-08-17 21:40:42', '2023-11-09 08:51:21'),
(9, 9, 'GERALDINE MANGMANG', 'jing@gmail.com', '$2y$10$UFLEXhmnvbwm.xcSb.kh8eD3rf6DI53C8MMA6RRsVROzyOCgbYJH.', NULL, NULL, NULL, NULL, 2, '2023-08-20 19:41:18', '2023-12-22 04:41:28'),
(10, 10, 'FLORENTINO GOZO', 'flor@gmail.com', '$2y$10$uAMlxkmPTuVrG4b8ccdemuVb6UaRuXkYdtbbxhIUOwgePWwBBQvKm', '09533182117', 'Libagon Southern Leyte', NULL, NULL, 2, '2023-08-20 21:02:32', '2023-12-20 06:14:36'),
(11, 11, 'JIMSON OLAYBAR', 'jimson@gmail.com', '$2y$10$amaFAX/XHHzwM89lcGM2HeJ0iOVVbXZlnx/Eb5.6eHf2ZbyDs7jmi', NULL, NULL, NULL, NULL, 2, '2023-10-16 17:40:25', '2023-11-22 03:53:05'),
(12, 12, 'IRENE MARCEL LAGUA', 'irene@gmail.com', '$2y$10$A6XSssgU2OTeibDkFNgNcenZ7ppm6GoeaS8dg1MlwY8yR5CufQQM2', NULL, NULL, NULL, NULL, 2, '2023-11-21 04:52:13', '2023-11-21 04:52:13'),
(13, 13, 'NERISSA JOHNNA CODAL', 'narissa@gmail.com', '$2y$10$gMLwkx7CoVXZqMSKp6SnHeE6KJbZJ1Pu.oprK./eUvsyUFqmknYFu', NULL, NULL, NULL, NULL, 2, '2023-11-22 03:06:29', '2023-11-23 02:28:55'),
(14, 14, 'JANNIE FLEUR ORANO', 'janjan@gmail.com', '$2y$10$i90k7FYh1CvF4bXk39iSWeg7wWEDv.VzsJPJJB6r772QbvNkn7oMG', '09903783434', 'Mahaplag Southern Leyte', NULL, NULL, 2, '2023-11-22 03:10:55', '2023-12-07 01:47:33'),
(16, 16, 'PATREX AMOGUIZ', 'patrex@gmail.com', '$2y$10$2FUBhX1FsQV8/zhiOd4vH.G6UDByTxi2vgXWGwfZaJWwle5ISykee', NULL, NULL, NULL, NULL, 2, '2023-11-22 06:53:09', '2023-11-22 06:53:09'),
(17, 17, 'JORTON TAGUD', 'jorton@gmail.com', '$2y$10$H3bgxx/rH0xlvoLY82JVaOD9qebGtPdBNNyqOVEtZWJDp5.WrrJRC', NULL, NULL, NULL, NULL, 2, '2023-11-23 01:46:42', '2023-11-23 01:46:42'),
(18, 18, 'ALEX BACALLA', 'alex@gmail.com', '$2y$10$IUUnaDEMuI9TAfDbDuSNFOSyQ2pn7VwLiHczTUrtc1SoDrQCdBr32', NULL, NULL, NULL, NULL, 2, '2023-11-23 01:49:24', '2023-11-23 01:49:24'),
(19, 19, 'FRANCIS REY PADAO', 'francis@gmail.com', '$2y$10$1YhUWiCpyGWLT8s.s2YEQeik7eL6TWxBpnwy1RlCbK67wP3mQQDc2', NULL, NULL, NULL, NULL, 2, '2023-11-23 01:51:51', '2023-11-23 01:51:51'),
(20, 20, 'JERSON MAASIN', 'jerson@gmail.com', '$2y$10$pAf.8vh18K.suLhNfmz77.kaGSL951L2sQkWeRP7.xUgPQTMnG6kS', '09533182117', 'Sogod Southern Leyte', NULL, NULL, 2, '2023-12-20 04:29:07', '2023-12-20 05:14:03');


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;