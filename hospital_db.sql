-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 11 mars 2026 à 10:34
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hospital_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `announcements`
--

DROP TABLE IF EXISTS `announcements`;
CREATE TABLE IF NOT EXISTS `announcements` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `text` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL DEFAULT 'gen',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `announcements`
--

INSERT INTO `announcements` (`id`, `text`, `category`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'طبيب اعصاب متاح اليوم', 'gen', 0, '2026-03-03 22:54:59', '2026-03-09 07:27:14'),
(3, 'يوم عطلة', 'doc', 1, '2026-03-04 03:52:48', '2026-03-10 10:33:05');

-- --------------------------------------------------------

--
-- Structure de la table `lab_requests`
--

DROP TABLE IF EXISTS `lab_requests`;
CREATE TABLE IF NOT EXISTS `lab_requests` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_id` bigint UNSIGNED NOT NULL,
  `type` enum('lab','xray') COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_tests` json DEFAULT NULL,
  `results` json DEFAULT NULL,
  `lab_notes` text COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','in_progress','done') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `doctor_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `urgency` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'عادي',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_lab_requests_patient` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `lab_requests`
--

INSERT INTO `lab_requests` (`id`, `patient_id`, `type`, `requested_tests`, `results`, `lab_notes`, `status`, `doctor_name`, `notes`, `urgency`, `created_at`, `updated_at`) VALUES
(1, 84, 'lab', '\"[\\\"\\\\u0648\\\\u0638\\\\u0627\\\\u0626\\\\u0641 \\\\u0627\\\\u0644\\\\u0643\\\\u0628\\\\u062f\\\",\\\"\\\\u0627\\\\u0644\\\\u062f\\\\u0647\\\\u0648\\\\u0646 \\\\u0648\\\\u0627\\\\u0644\\\\u0643\\\\u0648\\\\u0644\\\\u064a\\\\u0633\\\\u062a\\\\u0631\\\\u0648\\\\u0644\\\"]\"', NULL, NULL, 'done', 'Layal', NULL, 'عادي', '2026-03-04 14:57:14', '2026-03-04 18:15:29'),
(2, 84, 'lab', '\"[\\\"\\\\u062a\\\\u062d\\\\u0644\\\\u064a\\\\u0644 \\\\u062f\\\\u0645 \\\\u0643\\\\u0627\\\\u0645\\\\u0644\\\",\\\"\\\\u0633\\\\u0643\\\\u0631 \\\\u0627\\\\u0644\\\\u062f\\\\u0645\\\"]\"', NULL, NULL, 'done', 'Layal', NULL, 'عادي', '2026-03-04 14:57:25', '2026-03-04 18:15:46'),
(3, 84, 'lab', '\"[\\\"\\\\u0648\\\\u0638\\\\u0627\\\\u0626\\\\u0641 \\\\u0627\\\\u0644\\\\u0643\\\\u0628\\\\u062f\\\",\\\"\\\\u0627\\\\u0644\\\\u062f\\\\u0647\\\\u0648\\\\u0646 \\\\u0648\\\\u0627\\\\u0644\\\\u0643\\\\u0648\\\\u0644\\\\u064a\\\\u0633\\\\u062a\\\\u0631\\\\u0648\\\\u0644\\\",\\\"\\\\u0647\\\\u0631\\\\u0645\\\\u0648\\\\u0646\\\\u0627\\\\u062a \\\\u0627\\\\u0644\\\\u063a\\\\u062f\\\\u0629 \\\\u0627\\\\u0644\\\\u062f\\\\u0631\\\\u0642\\\\u064a\\\\u0629\\\",\\\"\\\\u062a\\\\u062d\\\\u0644\\\\u064a\\\\u0644 \\\\u0628\\\\u0648\\\\u0644 \\\\u0643\\\\u0627\\\\u0645\\\\u0644\\\"]\"', NULL, NULL, 'done', 'Layal', NULL, 'مستعجل', '2026-03-04 15:13:29', '2026-03-04 15:44:36'),
(4, 84, 'lab', '\"[\\\"\\\\u062a\\\\u062d\\\\u0644\\\\u064a\\\\u0644 \\\\u062f\\\\u0645 \\\\u0643\\\\u0627\\\\u0645\\\\u0644\\\",\\\"\\\\u0627\\\\u0644\\\\u062f\\\\u0647\\\\u0648\\\\u0646 \\\\u0648\\\\u0627\\\\u0644\\\\u0643\\\\u0648\\\\u0644\\\\u064a\\\\u0633\\\\u062a\\\\u0631\\\\u0648\\\\u0644\\\"]\"', NULL, NULL, 'done', 'Layal', NULL, 'عادي', '2026-03-04 15:14:01', '2026-03-04 18:16:00'),
(5, 84, 'lab', '\"[\\\"\\\\u062a\\\\u062d\\\\u0644\\\\u064a\\\\u0644 \\\\u062f\\\\u0645 \\\\u0643\\\\u0627\\\\u0645\\\\u0644\\\",\\\"\\\\u0627\\\\u0644\\\\u062f\\\\u0647\\\\u0648\\\\u0646 \\\\u0648\\\\u0627\\\\u0644\\\\u0643\\\\u0648\\\\u0644\\\\u064a\\\\u0633\\\\u062a\\\\u0631\\\\u0648\\\\u0644\\\"]\"', NULL, NULL, 'done', 'Layal', NULL, 'عادي', '2026-03-04 15:14:52', '2026-03-04 18:16:18'),
(6, 71, 'lab', '\"[\\\"\\\\u062a\\\\u062d\\\\u0644\\\\u064a\\\\u0644 \\\\u062f\\\\u0645 \\\\u0643\\\\u0627\\\\u0645\\\\u0644\\\",\\\"\\\\u0627\\\\u0644\\\\u062f\\\\u0647\\\\u0648\\\\u0646 \\\\u0648\\\\u0627\\\\u0644\\\\u0643\\\\u0648\\\\u0644\\\\u064a\\\\u0633\\\\u062a\\\\u0631\\\\u0648\\\\u0644\\\"]\"', NULL, NULL, 'done', 'Layal', NULL, 'عادي', '2026-03-04 15:15:17', '2026-03-04 15:45:00'),
(7, 71, 'lab', '\"[\\\"\\\\u062a\\\\u062d\\\\u0644\\\\u064a\\\\u0644 \\\\u062f\\\\u0645 \\\\u0643\\\\u0627\\\\u0645\\\\u0644\\\",\\\"\\\\u0627\\\\u0644\\\\u062f\\\\u0647\\\\u0648\\\\u0646 \\\\u0648\\\\u0627\\\\u0644\\\\u0643\\\\u0648\\\\u0644\\\\u064a\\\\u0633\\\\u062a\\\\u0631\\\\u0648\\\\u0644\\\",\\\"\\\\u0635\\\\u0648\\\\u0631\\\\u0629 \\\\u0627\\\\u0644\\\\u062f\\\\u0645 \\\\u0627\\\\u0644\\\\u0643\\\\u0627\\\\u0645\\\\u0644\\\\u0629\\\"]\"', NULL, NULL, 'done', 'Layal', NULL, 'عادي', '2026-03-04 15:17:55', '2026-03-04 18:16:40'),
(15, 87, 'lab', '\"[\\\"تحليل دم كامل\\\"]\"', '{\"تحليل دم كامل — الهيماتوكريت (HCT)\": \"45\", \"تحليل دم كامل — الهيموغلوبين (HGB)\": \"12\", \"تحليل دم كامل — الصفائح الدموية (PLT)\": \"388\", \"تحليل دم كامل — متوسط حجم الكريات (MCV)\": \"90\", \"تحليل دم كامل — كريات الدم البيضاء (WBC)\": \"5\", \"تحليل دم كامل — كريات الدم الحمراء (RBC)\": \"1.0\"}', NULL, 'done', 'Layal', NULL, 'عادي', '2026-03-05 03:45:31', '2026-03-05 03:46:39'),
(16, 88, 'lab', '\"[\\\"وظائف الكبد\\\",\\\"الدهون والكوليسترول\\\"]\"', '{\"وظائف الكبد — GGT\": \"10\", \"وظائف الكبد — SGOT (AST)\": \"40\", \"وظائف الكبد — SGPT (ALT)\": \"45\", \"وظائف الكبد — ألبومين\": \"4.3\", \"الدهون والكوليسترول — HDL\": \"50\", \"الدهون والكوليسترول — LDL\": \"34\", \"وظائف الكبد — بيليروبين كلي\": \"O.3\", \"الدهون والكوليسترول — كوليسترول كلي\": \"100\", \"الدهون والكوليسترول — الدهون الثلاثية\": \"35\"}', NULL, 'done', 'Layal', NULL, 'عادي', '2026-03-05 03:54:35', '2026-03-05 03:56:34'),
(17, 88, 'lab', '\"[\\\"وظائف الكبد\\\"]\"', '{\"وظائف الكبد — GGT\": \"10\", \"وظائف الكبد — SGOT (AST)\": \"20\", \"وظائف الكبد — SGPT (ALT)\": \"8\", \"وظائف الكبد — ألبومين\": \"1.6\", \"وظائف الكبد — بيليروبين كلي\": \"0.4\"}', NULL, 'done', 'mohamed', NULL, 'عادي', '2026-03-05 04:05:02', '2026-03-05 04:06:11'),
(18, 89, 'lab', '\"[\\\"فصيلة الدم\\\"]\"', '{\"فصيلة الدم — عامل Rh\": \"موجب\", \"فصيلة الدم — فصيلة ABO\": \"A\"}', NULL, 'done', 'mohamed', NULL, 'عادي', '2026-03-05 04:18:15', '2026-03-05 04:19:07'),
(19, 88, 'lab', '\"[\\\"فصيلة الدم\\\"]\"', '{\"فصيلة الدم — عامل Rh\": \"سالب\", \"فصيلة الدم — فصيلة ABO\": \"B\"}', NULL, 'done', 'mohamed', NULL, 'عادي', '2026-03-05 04:21:25', '2026-03-05 04:21:50'),
(20, 89, 'lab', '\"[\\\"تحليل دم كامل\\\",\\\"الدهون والكوليسترول\\\"]\"', '{\"الدهون والكوليسترول — HDL\": \"38\", \"الدهون والكوليسترول — LDL\": \"150\", \"تحليل دم كامل — الهيماتوكريت (HCT)\": \"6\", \"تحليل دم كامل — الهيموغلوبين (HGB)\": \"13\", \"تحليل دم كامل — الصفائح الدموية (PLT)\": \"300\", \"الدهون والكوليسترول — كوليسترول كلي\": \"300\", \"تحليل دم كامل — متوسط حجم الكريات (MCV)\": \"90\", \"تحليل دم كامل — كريات الدم البيضاء (WBC)\": \"5\", \"تحليل دم كامل — كريات الدم الحمراء (RBC)\": \"1.4\", \"الدهون والكوليسترول — الدهون الثلاثية\": \"200\"}', NULL, 'done', 'Layal', NULL, 'عادي', '2026-03-09 07:16:36', '2026-03-09 08:29:16'),
(21, 92, 'lab', '\"[\\\"وظائف الكبد\\\",\\\"صورة الدم الكاملة\\\"]\"', '{\"وظائف الكبد — GGT\": \"12\", \"وظائف الكبد — SGOT (AST)\": \"12\", \"وظائف الكبد — SGPT (ALT)\": \"22\", \"وظائف الكبد — ألبومين\": \"12\", \"وظائف الكبد — بيليروبين كلي\": \"12\", \"صورة الدم الكاملة — اللمفاوي\": null, \"صورة الدم الكاملة — النيتروفيل\": null, \"صورة الدم الكاملة — الهيماتوكريت (HCT)\": null, \"صورة الدم الكاملة — الهيموغلوبين (HGB)\": null, \"صورة الدم الكاملة — الصفائح الدموية (PLT)\": null, \"صورة الدم الكاملة — كريات الدم البيضاء (WBC)\": null, \"صورة الدم الكاملة — كريات الدم الحمراء (RBC)\": \"12\"}', NULL, 'done', 'Layal', NULL, 'عادي', '2026-03-09 08:21:19', '2026-03-09 08:36:19'),
(22, 92, 'lab', '\"[\\\"وظائف الكبد\\\"]\"', NULL, NULL, 'pending', 'Layal', NULL, 'عادي', '2026-03-09 08:35:21', '2026-03-09 08:35:21');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_id` bigint UNSIGNED NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new_patient',
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unseen',
  `access_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `patient_id_index` (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int DEFAULT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` enum('medical','surgical') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'medical',
  `lab_office` tinyint DEFAULT NULL,
  `received_at` datetime DEFAULT NULL,
  `current_lab1` tinyint(1) DEFAULT '0',
  `received` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `current_lab2` tinyint(1) NOT NULL DEFAULT '0',
  `sent_to_lab2` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `patients`
--

INSERT INTO `patients` (`id`, `first_name`, `last_name`, `age`, `gender`, `status`, `doctor`, `section`, `lab_office`, `received_at`, `current_lab1`, `received`, `created_at`, `updated_at`, `current_lab2`, `sent_to_lab2`) VALUES
(47, 'مريم', 'كرفة', 8, 'أنثى', 'إسهال', 'وصالزيدان', 'medical', 1, '2026-02-25 09:58:12', 0, 1, '2026-02-25 08:46:49', '2026-03-09 08:02:46', 0, 0),
(48, 'اكرام', 'سايح', 5, 'أنثى', 'صداع', 'مريم', 'medical', 1, '2026-02-25 09:49:39', 0, 1, '2026-02-25 08:48:27', '2026-03-09 08:02:46', 0, 0),
(65, 'مخطار', 'نلتبت', 9, 'ذكر', 'سكري', 'نبنبن', 'medical', 1, NULL, 0, 1, '2026-02-25 12:29:51', '2026-03-09 08:02:46', 0, 0),
(66, 'ننتبن', 'ملمبم', 1, 'أنثى', 'مشكلة عين', 'نبميم', 'medical', 1, NULL, 0, 1, '2026-02-25 12:30:52', '2026-03-09 08:02:46', 0, 0),
(67, 'نبنبن', 'ميمسم', 6, 'أنثى', 'نزيف', 'مميمسم', 'medical', 1, NULL, 0, 1, '2026-02-25 12:31:09', '2026-03-09 08:02:46', 0, 0),
(71, 'نرنبنبن', 'مبمبميم', -1, 'أنثى', 'متابعة بعد عملية', 'ممبمم', 'surgical', 2, NULL, 0, 1, '2026-02-25 18:08:11', '2026-03-04 17:42:47', 0, 1),
(72, 'لنبنبن', 'نبنبن', 8, 'أنثى', 'نزيف داخلي', 'نرنبن', 'surgical', 2, NULL, 0, 1, '2026-02-25 18:13:25', '2026-02-25 19:33:41', 0, 1),
(73, 'نبنبقن', 'ننبن', 7, 'أنثى', 'بتر', 'ننبنبن', 'surgical', 2, NULL, 0, 1, '2026-02-25 18:18:15', '2026-02-25 19:33:37', 0, 1),
(74, 'رتبتبت', 'نرنرن', 5, 'أنثى', 'عدوى جراحية', 'نرنبنن', 'surgical', 2, NULL, 0, 1, '2026-02-25 18:21:51', '2026-02-25 19:33:32', 0, 1),
(75, 'رهببن', 'نبنبن', 8, 'ذكر', 'فتق', 'ننبنبن', 'surgical', 2, NULL, 0, 1, '2026-02-25 18:27:23', '2026-02-25 19:33:28', 0, 1),
(76, 'بخبح', 'حبحيح', 5, 'أنثى', 'صدمة / إصابة', 'حؤحؤحيح', 'surgical', 2, NULL, 0, 1, '2026-02-25 18:37:58', '2026-02-25 19:33:23', 0, 1),
(77, 'لببب', 'لبب', 2, 'أنثى', 'عدوى جراحية', 'بايب', 'surgical', 2, NULL, 0, 1, '2026-02-25 19:17:41', '2026-02-25 19:33:16', 0, 1),
(78, 'نفاق', 'اقلفث', 6, 'ذكر', 'نزلة برد', 'لتاقلث', 'medical', 1, NULL, 0, 1, '2026-02-25 20:24:13', '2026-03-09 08:02:46', 0, 0),
(80, 'بثص', 'بيبث', 9, 'أنثى', 'ضغط دم', 'لبيس', 'medical', 1, NULL, 0, 1, '2026-02-26 08:44:21', '2026-03-09 08:02:46', 0, 0),
(81, 'ناتبت', 'نىنلن', 13, 'أنثى', 'حساسية', 'تلتقعه', 'medical', 1, NULL, 0, 1, '2026-02-26 19:03:04', '2026-03-09 08:02:46', 0, 0),
(82, 'LGKGK', 'KLFKKL', 12, 'أنثى', 'ربو', 'LFLDLL', 'medical', 1, NULL, 0, 1, '2026-03-03 18:05:37', '2026-03-09 08:02:46', 0, 0),
(83, 'زينب', 'جمعي', 66, 'أنثى', 'ضغط دم', 'مريم جمعي', 'medical', 1, NULL, 0, 1, '2026-03-03 18:15:24', '2026-03-09 08:02:46', 0, 0),
(84, 'اكرام', 'جمعي', 15, 'أنثى', 'ربو', 'مريم', 'medical', 1, NULL, 0, 1, '2026-03-04 14:27:30', '2026-03-09 08:02:46', 0, 0),
(85, 'نور', 'صخري', 9, 'أنثى', 'نزيف داخلي', 'وصال زيدان', 'surgical', 2, NULL, 0, 1, '2026-03-04 17:42:06', '2026-03-05 03:54:19', 0, 1),
(86, 'اكرم', 'كرفة', 7, 'ذكر', 'كسر', 'نور', 'medical', 1, NULL, 0, 1, '2026-03-04 19:06:09', '2026-03-09 08:02:46', 0, 0),
(87, 'مريم', 'حيران', 25, 'أنثى', 'حساسية', 'زهرة جمعي', 'medical', 1, NULL, 0, 1, '2026-03-05 03:43:23', '2026-03-09 08:02:46', 0, 0),
(88, 'محمد', 'لعياضي', 15, 'ذكر', 'جرح', 'خرفي لامية', 'surgical', 2, NULL, 0, 1, '2026-03-05 03:44:18', '2026-03-06 09:45:10', 0, 1),
(89, 'كوثر', 'مبروكي', 11, 'أنثى', 'ربو', 'محمد جمعي', 'medical', 1, NULL, 0, 1, '2026-03-05 04:17:09', '2026-03-09 08:02:46', 0, 0),
(90, 'خزلة', 'رزقي', 16, 'أنثى', 'فتق', 'سعودي سامية', 'surgical', 2, NULL, 0, 1, '2026-03-06 09:44:49', '2026-03-06 17:40:50', 0, 1),
(91, 'زهرة', 'خرفي', 28, 'أنثى', 'صدمة / إصابة', 'مريم جمعي', 'surgical', 2, NULL, 0, 1, '2026-03-06 17:40:33', '2026-03-06 17:40:50', 1, 1),
(92, 'كزثر', 'ممم', 19, 'ذكر', 'ألم معدة', 'مبمم', 'medical', 1, NULL, 1, 1, '2026-03-09 07:57:56', '2026-03-09 08:02:46', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_id` int UNSIGNED NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `patient_id` (`patient_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `room_assignments`
--

DROP TABLE IF EXISTS `room_assignments`;
CREATE TABLE IF NOT EXISTS `room_assignments` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_id` int UNSIGNED NOT NULL,
  `room` varchar(100) NOT NULL,
  `entered_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `exited_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `patient_id` (`patient_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'doctor',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@hospital.dz', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', '2026-01-08 14:17:28', '2026-01-08 14:17:28'),
(2, 'Layal', 'layal@hospital.dz', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', '2026-01-17 09:12:45', '2026-01-21 19:51:17'),
(7, 'mariem', 'marieml@hospital.dz', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'doctor', '2026-03-04 15:34:40', '2026-03-04 15:34:40'),
(6, 'wissal', 'wissal@hospital.dz', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'doctor', '2026-01-22 09:30:47', '2026-01-22 09:30:47'),
(5, 'ahmed', 'ahmed@hospital.dz', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'doctor', '2026-01-21 18:56:08', '2026-01-21 18:56:08'),
(8, 'mariem', 'mariem@hospital.dz', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'lab_worker', '2026-03-04 15:41:11', '2026-03-04 15:41:11'),
(9, 'mohamed', 'mohamed@hospital.dz', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'lab_worker', '2026-03-04 15:42:41', '2026-03-04 15:42:41'),
(11, 'nour', 'nour@hospital.dz', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xray_worker', '2026-03-05 14:13:29', '2026-03-05 14:13:29');

-- --------------------------------------------------------

--
-- Structure de la table `xray_requests`
--

DROP TABLE IF EXISTS `xray_requests`;
CREATE TABLE IF NOT EXISTS `xray_requests` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_id` bigint UNSIGNED NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `body_part` varchar(255) NOT NULL,
  `side` varchar(255) DEFAULT NULL,
  `notes` text,
  `report` text,
  `image_path` varchar(255) DEFAULT NULL,
  `urgency` varchar(50) DEFAULT 'عادي',
  `status` varchar(50) DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `patient_id` (`patient_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `xray_requests`
--

INSERT INTO `xray_requests` (`id`, `patient_id`, `doctor_name`, `body_part`, `side`, `notes`, `report`, `image_path`, `urgency`, `status`, `created_at`, `updated_at`) VALUES
(1, 89, 'غير محدد', 'أصابع اليد — كلاهما | اليد — كلاهما | الرسغ — كلاهما', 'كلاهما', NULL, 'ججج', 'xrays/vyRpiEIgKU1EWpfZud4w7IXKehV5TUMpUSQe8HOq.jpg', 'مستعجل', 'done', '2026-03-05 09:20:17', '2026-03-05 13:28:05'),
(2, 89, 'غير محدد', 'الذراع (كلاهما) | الركبة (كلاهما)', 'كلاهما', NULL, 'حححح', 'xrays/ia8edAIxI3MRZynRHnLvOinJhGWgErdtV7FFQEtS.jpg', 'مستعجل', 'done', '2026-03-05 09:37:54', '2026-03-05 13:50:51'),
(3, 89, 'غير محدد', 'الرقبة', NULL, NULL, 'خخخخ', 'xrays/anxDZD1A2BVbnHZqA8FhH76P5JmD1WGFsGATfOnz.jpg', 'مستعجل', 'done', '2026-03-05 09:39:01', '2026-03-05 13:50:33'),
(4, 88, 'Layal', 'الكتف (يسار)', 'يسار', NULL, 'خبب', 'xrays/bBfgtkYb1ouyfXF5Bb6AhhSo568RBzQYQnDEZwiF.jpg', 'مستعجل', 'done', '2026-03-05 09:47:52', '2026-03-05 13:50:17'),
(5, 89, 'Layal', 'الرأس | الصدر', NULL, NULL, 'حححح', 'xrays/gpZVrVkRJQWNsAiexIdmlSHKpkWI0autyVyI2YVv.png', 'مستعجل', 'done', '2026-03-05 13:45:41', '2026-03-05 13:51:30'),
(6, 91, 'Layal', 'البطن | الذراع (كلاهما) | الرقبة', 'كلاهما', NULL, 'ددد', 'xrays/WF7InGhUzifj6IePyX95OtjgxMDVdJ6XJtAx51XI.jpg', 'عادي', 'done', '2026-03-06 17:41:17', '2026-03-06 17:42:45'),
(7, 91, 'Layal', 'الرأس | الفك | الرسغ (كلاهما) | الكاحل (يمين)', NULL, NULL, 'لبتتيت', 'xrays/3PiVdNg4xebltIPJiESXnIABMEgZbv4ntwqz6dYG.jpg', 'عادي', 'done', '2026-03-06 18:27:01', '2026-03-09 07:13:51'),
(8, 89, 'Layal', 'الرأس | اليد (يمين)', NULL, NULL, 'نننننن', 'xrays/Y1Jcy7sMU5nsZdrpSXmrIDpeLL7zmZYr4TtztWgN.jpg', 'عادي', 'done', '2026-03-09 07:17:52', '2026-03-09 08:15:32'),
(9, 91, 'nour', 'الصدر', NULL, NULL, NULL, NULL, 'مستعجل', 'pending', '2026-03-09 11:04:09', '2026-03-09 11:04:09');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `lab_requests`
--
ALTER TABLE `lab_requests`
  ADD CONSTRAINT `fk_lab_requests_patient` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
