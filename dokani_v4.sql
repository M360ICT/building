-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2023 at 03:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dokani_v4`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(10) UNSIGNED NOT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` bigint(20) DEFAULT NULL,
  `account_bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_branch_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_status` bigint(20) DEFAULT NULL,
  `account_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `account_name`, `account_type`, `account_number`, `account_bank_name`, `account_branch_name`, `account_balance`, `account_status`, `account_create_date`, `account_has_deleted`, `created_at`, `updated_at`) VALUES
(3, 'Eastern', 'BANK', 500541, 'Estern', 'dhanmondi', NULL, 1, '2023-01-04', 'NO', '2023-01-04 00:02:54', '2023-01-04 00:02:54'),
(4, 'mycash', 'CASH', 74748418418, 'mycash', 'banani', NULL, 1, '2023-01-23', 'NO', '2023-01-23 00:12:59', '2023-01-23 00:12:59'),
(5, 'Bkash', 'MOBILE_BANKING', 44841855296, 'bkash', 'bkash', NULL, 1, '2023-01-23', 'NO', '2023-01-23 00:13:26', '2023-01-23 00:13:26'),
(6, 'AB Bank', 'BANK', 123654789987, 'AB Bank', 'Dhanmondi', NULL, 1, '2023-01-24', 'NO', '2023-01-23 22:14:27', '2023-01-23 22:14:27'),
(7, 'standard bank', 'BANK', 0, 'Standard Bank', 'Gulshan', NULL, 1, '2023-01-30', 'NO', '2023-01-30 00:42:48', '2023-01-30 00:42:48');

-- --------------------------------------------------------

--
-- Table structure for table `account_transactions`
--

CREATE TABLE `account_transactions` (
  `transaction_id` int(10) UNSIGNED NOT NULL,
  `transaction_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_account_id` bigint(20) DEFAULT NULL,
  `transaction_client_id` bigint(20) DEFAULT NULL,
  `sale_id` int(11) NOT NULL,
  `client_transaction_id` int(11) NOT NULL,
  `transaction_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_last_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_opening_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `transaction_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `transaction_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_for` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Like Opening Balance'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_transactions`
--

INSERT INTO `account_transactions` (`transaction_id`, `transaction_type`, `transaction_account_id`, `transaction_client_id`, `sale_id`, `client_transaction_id`, `transaction_amount`, `transaction_last_balance`, `transaction_opening_balance`, `transaction_date`, `transaction_note`, `transaction_create_date`, `transaction_has_deleted`, `transaction_deleted_by`, `created_at`, `updated_at`, `transaction_method`, `transaction_for`) VALUES
(11, 'CREDIT', 3, NULL, 0, 0, '80000', NULL, 'YES', '2023-01-04', 'aongbnagg', '2023-01-04', 'NO', NULL, '2023-01-04 00:17:19', '2023-01-04 00:17:19', 'MOBILE_BANKING', 'OPENING_BALANCE'),
(18, 'DEBIT', 3, NULL, 0, 0, '4506', '75494', NULL, '2023-01-04', NULL, NULL, 'NO', NULL, '2023-01-04 02:39:01', '2023-01-04 02:39:01', 'BANK', 'EXPENSE'),
(19, 'DEBIT', 3, NULL, 0, 0, '7000', '68494', NULL, '2023-01-04', NULL, NULL, 'NO', NULL, '2023-01-04 02:43:36', '2023-01-04 02:43:36', 'BANK', 'EXPENSE'),
(20, 'DEBIT', 3, NULL, 0, 0, '8494', '60000', NULL, '2023-01-04', 'mon chaise', NULL, 'NO', NULL, '2023-01-04 04:03:39', '2023-01-04 04:03:39', 'BANK', 'EXPENSE'),
(21, 'DEBIT', 3, NULL, 0, 0, '8500', '51500', NULL, '2023-01-04', 'abar amnitey', NULL, 'NO', NULL, '2023-01-04 04:04:28', '2023-01-04 04:04:28', 'BANK', 'EXPENSE'),
(22, 'CREDIT', 3, NULL, 0, 0, '22611.875', '74111', NULL, '2023-01-17', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-16 21:17:41', '2023-01-16 21:17:41', 'BANK', 'INVOICE_SELL'),
(23, 'CREDIT', 3, NULL, 0, 0, '200.75', '74312', NULL, '2023-01-17', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-16 21:18:59', '2023-01-16 21:18:59', 'BANK', 'INVOICE_SELL'),
(24, 'CREDIT', 3, NULL, 0, 0, '200', '74512', NULL, '2023-01-17', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-17 03:39:15', '2023-01-17 03:39:15', 'BANK', 'INVOICE_SELL'),
(25, 'CREDIT', 3, NULL, 0, 0, '9000', '83512', NULL, '2023-01-17', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-17 03:40:47', '2023-01-17 03:40:47', 'BANK', 'INVOICE_SELL'),
(26, 'CREDIT', 3, NULL, 0, 0, '12225.875', '95738', NULL, '2023-01-17', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-17 04:19:54', '2023-01-17 04:19:54', 'BANK', 'INVOICE_SELL'),
(27, 'CREDIT', 3, NULL, 0, 0, '20000.25', '115738', NULL, '2023-01-17', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-17 04:22:04', '2023-01-17 04:22:04', 'BANK', 'INVOICE_SELL'),
(28, 'CREDIT', 3, NULL, 0, 0, '20000.25', '135739', NULL, '2023-01-17', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-17 04:51:40', '2023-01-17 04:51:40', 'BANK', 'INVOICE_SELL'),
(29, 'CREDIT', 3, NULL, 0, 0, '20000', '155739', NULL, '2023-01-17', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-17 05:39:40', '2023-01-17 05:39:40', 'BANK', 'INVOICE_SELL'),
(30, 'CREDIT', 3, NULL, 0, 0, '20600', '176339', NULL, '2023-01-18', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-18 06:32:15', '2023-01-18 06:32:15', 'BANK', 'INVOICE_SELL'),
(31, 'CREDIT', 3, NULL, 0, 0, '20881.875', '197220', NULL, '2023-01-18', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-18 06:49:42', '2023-01-18 06:49:42', 'BANK', 'INVOICE_SELL'),
(32, 'CREDIT', 3, NULL, 0, 0, '2750.25', '199971', NULL, '2023-01-18', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-18 07:23:03', '2023-01-18 07:23:03', 'BANK', 'INVOICE_SELL'),
(33, 'CREDIT', 3, NULL, 0, 0, '125.375', '200096', NULL, '2023-01-23', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-22 21:20:31', '2023-01-22 21:20:31', 'BANK', 'INVOICE_SELL'),
(34, 'CREDIT', 3, NULL, 0, 0, '225.875', '200322', NULL, '2023-01-23', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-22 22:04:45', '2023-01-22 22:04:45', 'BANK', 'INVOICE_SELL'),
(35, 'CREDIT', 3, NULL, 0, 0, '5400', '205722', NULL, '2023-01-23', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-22 22:06:19', '2023-01-22 22:06:19', 'BANK', 'INVOICE_SELL'),
(36, 'CREDIT', 3, NULL, 0, 0, '3000', '208722', NULL, '2023-01-23', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-22 22:31:23', '2023-01-22 22:31:23', 'BANK', 'INVOICE_SELL'),
(37, 'CREDIT', 3, NULL, 0, 0, '4800', '213522', NULL, '2023-01-23', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-22 22:32:19', '2023-01-22 22:32:19', 'BANK', 'INVOICE_SELL'),
(38, 'CREDIT', 3, NULL, 0, 0, '237.775', '213760', NULL, '2023-01-23', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-22 22:37:56', '2023-01-22 22:37:56', 'BANK', 'INVOICE_SELL'),
(39, 'CREDIT', 3, NULL, 0, 0, '225.875', '213986', NULL, '2023-01-23', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-22 22:47:17', '2023-01-22 22:47:17', 'BANK', 'INVOICE_SELL'),
(40, 'CREDIT', 3, NULL, 0, 0, '1350.25', '215336', NULL, '2023-01-23', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-22 22:52:16', '2023-01-22 22:52:16', 'BANK', 'INVOICE_SELL'),
(41, 'CREDIT', 3, NULL, 0, 0, '225.875', '215562', NULL, '2023-01-23', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-22 22:53:48', '2023-01-22 22:53:48', 'BANK', 'INVOICE_SELL'),
(42, 'CREDIT', 3, NULL, 0, 0, '237.775', '215799', NULL, '2023-01-23', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-22 22:57:39', '2023-01-22 22:57:39', 'BANK', 'INVOICE_SELL'),
(43, 'CREDIT', 3, NULL, 0, 0, '6450', NULL, NULL, '2023-01-23', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-22 22:59:17', '2023-01-22 22:59:17', 'BANK', 'INVOICE_SELL'),
(44, 'CREDIT', 3, 1, 14, 13, '5400', '227649', NULL, '2023-01-23', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-22 23:58:13', '2023-01-22 23:58:13', 'BANK', 'INVOICE_SELL'),
(45, 'CREDIT', 5, 1, 15, 15, '60500', '60500', NULL, '2023-01-23', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-23 00:45:21', '2023-01-23 00:45:21', 'BANK', 'INVOICE_SELL'),
(46, 'CREDIT', NULL, 1, 16, 17, '6450', '6450', NULL, '2023-01-23', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-23 03:17:16', '2023-01-23 03:17:16', 'BANK', 'INVOICE_SELL'),
(47, 'CREDIT', 3, 1, 17, 19, '1720', '229369', NULL, '2023-01-23', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-23 03:46:51', '2023-01-23 03:46:51', 'BANK', 'INVOICE_SELL'),
(48, 'CREDIT', 3, 1, 18, 21, '3440', '232809', NULL, '2023-01-23', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-23 06:07:49', '2023-01-23 06:07:49', 'BANK', 'INVOICE_SELL'),
(49, 'CREDIT', 3, 1, 21, 22, '-1720', '231089', NULL, '2023-01-23', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-23 06:16:04', '2023-01-23 06:16:04', 'BANK', 'INVOICE_SELL'),
(50, 'CREDIT', 5, 1, 23, 24, '40', '60540', NULL, '2023-01-24', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-23 23:41:32', '2023-01-23 23:41:32', 'BANK', 'INVOICE_SELL'),
(51, 'CREDIT', 4, 1, 24, 26, '2000', '2000', NULL, '2023-01-24', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-24 00:33:57', '2023-01-24 00:33:57', 'BANK', 'INVOICE_SELL'),
(52, 'CREDIT', 6, NULL, 26, 28, '233', '233', NULL, '2023-01-24', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-24 02:48:17', '2023-01-24 02:48:17', 'BANK', 'INVOICE_SELL'),
(53, 'CREDIT', 3, NULL, 28, 30, '280', '231369', NULL, '2023-01-24', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-24 04:00:12', '2023-01-24 04:00:12', 'BANK', 'INVOICE_SELL'),
(54, 'CREDIT', 3, 1, 29, 32, '48.6', '231418', NULL, '2023-01-24', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-24 04:00:45', '2023-01-24 04:00:45', 'BANK', 'INVOICE_SELL'),
(55, 'CREDIT', 4, 1, 30, 34, '60.8', '2060', NULL, '2023-01-24', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-24 04:26:07', '2023-01-24 04:26:07', 'BANK', 'INVOICE_SELL'),
(56, 'CREDIT', 3, 1, 31, 36, '360', '231778', NULL, '2023-01-25', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-25 00:37:02', '2023-01-25 00:37:02', 'BANK', 'INVOICE_SELL'),
(57, 'CREDIT', 6, 1, 31, 37, '20', '253', NULL, '2023-01-25', 'INVOICE_SELL_RETURN', NULL, 'NO', NULL, '2023-01-25 06:45:14', '2023-01-25 06:45:14', 'BANK', 'INVOICE_SELL_RETURN'),
(58, 'CREDIT', 6, 1, 31, 38, '80', '333', NULL, '2023-01-25', 'INVOICE_SELL_RETURN', NULL, 'NO', NULL, '2023-01-25 06:59:59', '2023-01-25 06:59:59', 'BANK', 'INVOICE_SELL_RETURN'),
(59, 'CREDIT', 6, 1, 32, 40, '72.4', '405', NULL, '2023-01-26', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-25 21:26:32', '2023-01-25 21:26:32', 'BANK', 'INVOICE_SELL'),
(60, 'CREDIT', 6, 1, 32, 41, '12', '417', NULL, '2023-01-26', 'INVOICE_SELL_RETURN', NULL, 'NO', NULL, '2023-01-25 21:43:01', '2023-01-25 21:43:01', 'BANK', 'INVOICE_SELL_RETURN'),
(61, 'CREDIT', NULL, 1, 33, 42, '240', '6690', NULL, '2023-01-26', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-25 21:54:58', '2023-01-25 21:54:58', NULL, 'INVOICE_SELL'),
(62, 'CREDIT', NULL, 1, 33, 43, '20', '6710', NULL, '2023-01-26', 'INVOICE_SELL_RETURN', NULL, 'NO', NULL, '2023-01-25 22:01:02', '2023-01-25 22:01:02', 'DUE', 'INVOICE_SELL_RETURN'),
(63, 'DEBIT', 6, NULL, 0, 0, '850', '-433', NULL, '2023-01-26', 'this is new', NULL, 'NO', NULL, '2023-01-25 22:49:29', '2023-01-25 22:49:29', 'BANK', 'EXPENSE'),
(64, 'CREDIT', 4, 1, 35, 45, '80', '2140', NULL, '2023-01-29', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-28 23:12:21', '2023-01-28 23:12:21', 'CASH', 'INVOICE_SELL'),
(65, 'CREDIT', NULL, NULL, 36, 46, '80', '6790', NULL, '2023-01-29', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-29 03:42:20', '2023-01-29 03:42:20', NULL, 'INVOICE_SELL'),
(66, 'CREDIT', NULL, NULL, 37, 48, '80', '6870', NULL, '2023-01-29', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-29 04:21:31', '2023-01-29 04:21:31', NULL, 'INVOICE_SELL'),
(67, 'CREDIT', NULL, NULL, 38, 50, '80', '6950', NULL, '2023-01-29', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-29 04:39:21', '2023-01-29 04:39:21', NULL, 'INVOICE_SELL'),
(68, 'CREDIT', NULL, NULL, 39, 52, '80', '7030', NULL, '2023-01-29', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-29 04:39:32', '2023-01-29 04:39:32', NULL, 'INVOICE_SELL'),
(69, 'CREDIT', NULL, NULL, 40, 54, '80', '7110', NULL, '2023-01-29', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-29 05:38:50', '2023-01-29 05:38:50', NULL, 'INVOICE_SELL'),
(70, 'CREDIT', NULL, NULL, 41, 56, '80', '7190', NULL, '2023-01-29', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-29 05:55:25', '2023-01-29 05:55:25', NULL, 'INVOICE_SELL'),
(71, 'CREDIT', NULL, NULL, 42, 58, '80', '7270', NULL, '2023-01-29', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-29 05:55:35', '2023-01-29 05:55:35', NULL, 'INVOICE_SELL'),
(72, 'CREDIT', 3, 1, 43, 59, '9.399999999999999', '231787', NULL, '2023-01-30', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-29 21:13:11', '2023-01-29 21:13:11', 'BANK', 'INVOICE_SELL'),
(73, 'CREDIT', 4, 1, 44, 61, '30.25', '2171', NULL, '2023-01-30', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-29 21:19:51', '2023-01-29 21:19:51', 'CASH', 'INVOICE_SELL'),
(74, 'CREDIT', 6, 1, 45, 63, '32.4', '-401', NULL, '2023-01-30', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-29 21:25:48', '2023-01-29 21:25:48', 'BANK', 'INVOICE_SELL'),
(75, 'CREDIT', 6, 1, 45, 64, '28', '-373', NULL, '2023-01-30', 'INVOICE_SELL_RETURN', NULL, 'NO', NULL, '2023-01-29 21:27:33', '2023-01-29 21:27:33', 'BANK', 'INVOICE_SELL_RETURN'),
(76, 'CREDIT', 5, 1, 46, 65, '352', '60892', NULL, '2023-01-30', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-29 21:37:37', '2023-01-29 21:37:37', 'MOBILE_BANKING', 'INVOICE_SELL'),
(77, 'CREDIT', 4, 1, 47, 66, '180', '2351', NULL, '2023-01-30', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-29 21:44:42', '2023-01-29 21:44:42', 'CASH', 'INVOICE_SELL'),
(78, 'CREDIT', 4, 1, 0, 0, '70', '2421', NULL, '2023-01-30', NULL, '2023-01-30', 'NO', NULL, '2023-01-29 21:46:36', '2023-01-29 21:46:36', NULL, NULL),
(79, 'DEBIT', 3, NULL, 0, 0, '10000', NULL, NULL, '2023-01-30', NULL, '2023-01-30', 'NO', NULL, '2023-01-30 00:44:00', '2023-01-30 00:44:00', NULL, NULL),
(80, 'CREDIT', 7, NULL, 0, 0, '10000', NULL, NULL, '2023-01-30', NULL, '2023-01-30', 'NO', NULL, '2023-01-30 00:44:00', '2023-01-30 00:44:00', NULL, NULL),
(81, 'DEBIT', 7, NULL, 0, 0, '2500', '7500', NULL, '2023-01-30', 'this is not fair', NULL, 'NO', NULL, '2023-01-30 00:44:33', '2023-01-30 00:44:33', 'BANK', 'EXPENSE'),
(82, 'DEBIT', 7, NULL, 0, 0, '1500', '6000', NULL, '2023-01-30', NULL, NULL, 'NO', NULL, '2023-01-30 00:44:59', '2023-01-30 00:44:59', 'BANK', 'EXPENSE'),
(83, 'DEBIT', 7, NULL, 0, 0, '1300', '4700', NULL, '2023-01-30', 'thiis', NULL, 'NO', NULL, '2023-01-30 00:45:23', '2023-01-30 00:45:23', 'BANK', 'EXPENSE'),
(84, 'DEBIT', 7, NULL, 0, 0, '700', '4000', NULL, '2023-01-30', 'why man why', NULL, 'NO', NULL, '2023-01-30 00:47:37', '2023-01-30 00:47:37', 'BANK', 'EXPENSE'),
(85, 'CREDIT', 7, 1, 48, 69, '751', '4751', NULL, '2023-01-30', 'INVOICE_SELL', NULL, 'NO', NULL, '2023-01-30 00:50:10', '2023-01-30 00:50:10', 'BANK', 'INVOICE_SELL'),
(86, 'DEBIT', 4, 1, 0, 9, '1000', '0', NULL, '2023-01-30', 'feaeffeafe', NULL, 'NO', NULL, '2023-01-30 08:04:54', '2023-01-30 08:04:54', NULL, 'SUPPLIER_PAYMENT'),
(87, 'DEBIT', 7, 1, 0, 10, '10000', '0', NULL, '2023-01-30', NULL, NULL, 'NO', NULL, '2023-01-30 08:05:34', '2023-01-30 08:05:34', NULL, 'SUPPLIER_PAYMENT'),
(88, 'DEBIT', 3, 1, 0, 11, '7500', '0', NULL, '2023-01-30', 'this is not fair', NULL, 'NO', NULL, '2023-01-30 08:31:51', '2023-01-30 08:31:51', NULL, 'SUPPLIER_PAYMENT');

-- --------------------------------------------------------

--
-- Table structure for table `account_transfer`
--

CREATE TABLE `account_transfer` (
  `account_transfer_id` int(10) UNSIGNED NOT NULL,
  `account_from` int(11) NOT NULL,
  `account_to` int(11) NOT NULL,
  `account_transaction_id` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_transfer`
--

INSERT INTO `account_transfer` (`account_transfer_id`, `account_from`, `account_to`, `account_transaction_id`, `amount`, `date`, `note`, `created_by`, `deleted_by`, `updated_by`, `status`, `has_deleted`, `created_at`, `updated_at`) VALUES
(1, 3, 7, NULL, 10000, '2023-01-30', NULL, '1', NULL, NULL, '1', 'NO', '2023-01-30 00:44:00', '2023-01-30 00:44:00');

-- --------------------------------------------------------

--
-- Table structure for table `barcodes`
--

CREATE TABLE `barcodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branch_id` int(10) UNSIGNED NOT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_entry_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `branch_is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `branch_created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_id`, `branch_name`, `branch_entry_id`, `branch_phone_number`, `branch_address`, `branch_status`, `branch_is_deleted`, `branch_created_by`, `branch_updated_by`, `branch_deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'Jamalpur', 'Jamalpur4271', '01401033443', 'JamPura', '1', 'NO', '1', NULL, NULL, '2023-01-21 18:00:00', '2023-01-21 21:18:27');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(10) UNSIGNED NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_entry_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `client_is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `client_created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_name`, `branch_id`, `client_entry_id`, `client_type`, `client_email`, `client_phone_number`, `client_address`, `client_image`, `client_status`, `client_is_deleted`, `client_created_by`, `client_updated_by`, `client_deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'Armaan', '2', 'Armaan29423', 'ONLINE', 'armaan@gmail.com', '01401033443', '422,nardapara,dakshinkhan', 'uploads/1673949810.jpg', '1', 'NO', '1', NULL, NULL, '2023-01-16 18:00:00', '2023-01-17 04:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `client_ledgers`
--

CREATE TABLE `client_ledgers` (
  `client_ledger_id` int(10) UNSIGNED NOT NULL,
  `client_id` bigint(20) DEFAULT NULL,
  `client_account_id` bigint(20) DEFAULT NULL,
  `client_transaction_id` bigint(20) DEFAULT NULL,
  `client_ledger_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_ledger_invoice_id` bigint(20) DEFAULT NULL,
  `client_ledger_money_receipt_id` bigint(20) DEFAULT NULL,
  `client_ledger_refund_id` bigint(20) DEFAULT NULL,
  `client_ledger_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_ledger_last_balance` bigint(20) DEFAULT NULL,
  `client_ledger_dr` bigint(20) DEFAULT NULL,
  `client_ledger_cr` bigint(20) DEFAULT NULL,
  `client_ledger_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_ledger_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_ledger_prepared_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_ledgers`
--

INSERT INTO `client_ledgers` (`client_ledger_id`, `client_id`, `client_account_id`, `client_transaction_id`, `client_ledger_type`, `client_ledger_invoice_id`, `client_ledger_money_receipt_id`, `client_ledger_refund_id`, `client_ledger_status`, `client_ledger_last_balance`, `client_ledger_dr`, `client_ledger_cr`, `client_ledger_date`, `client_ledger_create_date`, `client_ledger_prepared_by`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 2, 'SALE', 3193945, NULL, NULL, '1', -4200, NULL, NULL, '2023-01-23', '2023-01-23', '1', '2023-01-22 22:37:56', '2023-01-22 22:37:56'),
(2, 1, NULL, 3, 'SALE', 8082906, NULL, NULL, '1', 200, NULL, NULL, '2023-01-23', '2023-01-23', '1', '2023-01-22 22:47:17', '2023-01-22 22:47:17'),
(3, 1, NULL, 4, 'SALE', 1203106, NULL, NULL, '1', 1200, NULL, NULL, '2023-01-23', '2023-01-23', '1', '2023-01-22 22:52:16', '2023-01-22 22:52:16'),
(4, 1, NULL, 6, 'SALE', 7601919, NULL, NULL, '1', 0, NULL, NULL, '2023-01-23', '2023-01-23', '1', '2023-01-22 22:53:48', '2023-01-22 22:53:48'),
(5, 1, NULL, 8, 'SALE', 7597908, NULL, NULL, '1', -7, NULL, NULL, '2023-01-23', '2023-01-23', '1', '2023-01-22 22:57:39', '2023-01-22 22:57:39'),
(6, 1, NULL, 9, 'SALE', 7503927, NULL, NULL, '1', -6457, NULL, NULL, '2023-01-23', '2023-01-23', '1', '2023-01-22 22:59:17', '2023-01-22 22:59:17'),
(7, 1, NULL, 13, 'SALE', 9063427, NULL, NULL, '1', -11157, NULL, NULL, '2023-01-23', '2023-01-23', '1', '2023-01-22 23:58:13', '2023-01-22 23:58:13'),
(8, 1, NULL, 15, 'SALE', 8551024, NULL, NULL, '1', -11657, NULL, NULL, '2023-01-23', '2023-01-23', '1', '2023-01-23 00:45:21', '2023-01-23 00:45:21'),
(9, 1, NULL, 17, 'SALE', 1648502, NULL, NULL, '1', -12107, NULL, NULL, '2023-01-23', '2023-01-23', '1', '2023-01-23 03:17:16', '2023-01-23 03:17:16'),
(10, 1, NULL, 19, 'SALE', 6383113, NULL, NULL, '1', -13307, NULL, NULL, '2023-01-23', '2023-01-23', '1', '2023-01-23 03:46:51', '2023-01-23 03:46:51'),
(11, 1, NULL, 21, 'SALE', 4439464, NULL, NULL, '1', -16307, NULL, NULL, '2023-01-23', '2023-01-23', '1', '2023-01-23 06:07:49', '2023-01-23 06:07:49'),
(12, 1, NULL, 22, 'SALE', 4076372, NULL, NULL, '1', -16267, NULL, NULL, '2023-01-23', '2023-01-23', '1', '2023-01-23 06:16:04', '2023-01-23 06:16:04'),
(13, 1, NULL, 24, 'SALE', 9517826, NULL, NULL, '1', -16287, NULL, NULL, '2023-01-24', '2023-01-24', '1', '2023-01-23 23:41:32', '2023-01-23 23:41:32'),
(14, 1, NULL, 26, 'SALE', 1958551, NULL, NULL, '1', -16787, NULL, NULL, '2023-01-24', '2023-01-24', '1', '2023-01-24 00:33:57', '2023-01-24 00:33:57'),
(15, NULL, NULL, 28, 'SALE', 5126944, NULL, NULL, '1', -33, NULL, NULL, '2023-01-24', '2023-01-24', '1', '2023-01-24 02:48:17', '2023-01-24 02:48:17'),
(16, NULL, NULL, 30, 'SALE', 5838008, NULL, NULL, '1', -233, NULL, NULL, '2023-01-24', '2023-01-24', '1', '2023-01-24 04:00:12', '2023-01-24 04:00:12'),
(17, 1, NULL, 32, 'SALE', 1415547, NULL, NULL, '1', -16796, NULL, NULL, '2023-01-24', '2023-01-24', '1', '2023-01-24 04:00:45', '2023-01-24 04:00:45'),
(18, 1, NULL, 34, 'SALE', 2988925, NULL, NULL, '1', -16849, NULL, NULL, '2023-01-24', '2023-01-24', '1', '2023-01-24 04:26:07', '2023-01-24 04:26:07'),
(19, 1, NULL, 36, 'SALE', 5155914, NULL, NULL, '1', -16909, NULL, NULL, '2023-01-25', '2023-01-25', '1', '2023-01-25 00:37:02', '2023-01-25 00:37:02'),
(20, 1, NULL, 37, 'INVOICE_SALE_RETURN', 31, NULL, NULL, '1', -16569, 340, NULL, '2023-01-25', '2023-01-25', '1', '2023-01-25 06:45:14', '2023-01-25 06:45:14'),
(21, 1, NULL, 38, 'INVOICE_SALE_RETURN', 31, NULL, NULL, '1', -16329, 240, NULL, '2023-01-25', '2023-01-25', '1', '2023-01-25 06:59:59', '2023-01-25 06:59:59'),
(22, 1, NULL, 40, 'SALE', 4818339, NULL, NULL, '1', -16329, NULL, NULL, '2023-01-26', '2023-01-26', '1', '2023-01-25 21:26:32', '2023-01-25 21:26:32'),
(23, 1, NULL, 41, 'INVOICE_SALE_RETURN', 32, NULL, NULL, '1', -16341, -12, NULL, '2023-01-26', '2023-01-26', '1', '2023-01-25 21:43:01', '2023-01-25 21:43:01'),
(24, 1, NULL, 42, 'SALE', 3833563, NULL, NULL, '1', -16581, NULL, NULL, '2023-01-26', '2023-01-26', '1', '2023-01-25 21:54:58', '2023-01-25 21:54:58'),
(25, 1, NULL, 43, 'INVOICE_SALE_RETURN', 33, NULL, NULL, '1', -16441, 140, NULL, '2023-01-26', '2023-01-26', '1', '2023-01-25 22:01:02', '2023-01-25 22:01:02'),
(26, 1, NULL, 45, 'SALE', 7410817, NULL, NULL, '1', -16441, NULL, NULL, '2023-01-29', '2023-01-29', '1', '2023-01-28 23:12:21', '2023-01-28 23:12:21'),
(27, NULL, NULL, 46, 'SALE', 7410817, NULL, NULL, '1', -313, NULL, NULL, '2023-01-29', '2023-01-29', '1', '2023-01-29 03:42:20', '2023-01-29 03:42:20'),
(28, NULL, NULL, 48, 'SALE', 7410817, NULL, NULL, '1', -313, NULL, NULL, '2023-01-29', '2023-01-29', '1', '2023-01-29 04:21:31', '2023-01-29 04:21:31'),
(29, NULL, NULL, 50, 'SALE', 7410817, NULL, NULL, '1', -313, NULL, NULL, '2023-01-29', '2023-01-29', '1', '2023-01-29 04:39:21', '2023-01-29 04:39:21'),
(30, NULL, NULL, 52, 'SALE', 7410817, NULL, NULL, '1', -313, NULL, NULL, '2023-01-29', '2023-01-29', '1', '2023-01-29 04:39:32', '2023-01-29 04:39:32'),
(31, NULL, NULL, 54, 'SALE', 7410817, NULL, NULL, '1', -313, NULL, NULL, '2023-01-29', '2023-01-29', '1', '2023-01-29 05:38:50', '2023-01-29 05:38:50'),
(32, NULL, NULL, 56, 'SALE', 7410817, NULL, NULL, '1', -313, NULL, NULL, '2023-01-29', '2023-01-29', '1', '2023-01-29 05:55:25', '2023-01-29 05:55:25'),
(33, NULL, NULL, 58, 'SALE', 7410817, NULL, NULL, '1', -313, NULL, NULL, '2023-01-29', '2023-01-29', '1', '2023-01-29 05:55:35', '2023-01-29 05:55:35'),
(34, 1, NULL, 59, 'SALE', 8290241, NULL, NULL, '1', -16421, NULL, NULL, '2023-01-30', '2023-01-30', '1', '2023-01-29 21:13:11', '2023-01-29 21:13:11'),
(35, 1, NULL, 61, 'SALE', 9068163, NULL, NULL, '1', -16426, NULL, NULL, '2023-01-30', '2023-01-30', '1', '2023-01-29 21:19:51', '2023-01-29 21:19:51'),
(36, 1, NULL, 63, 'SALE', 4594220, NULL, NULL, '1', -16427, NULL, NULL, '2023-01-30', '2023-01-30', '1', '2023-01-29 21:25:48', '2023-01-29 21:25:48'),
(37, 1, NULL, 64, 'INVOICE_SALE_RETURN', 45, NULL, NULL, '1', -16575, -148, NULL, '2023-01-30', '2023-01-30', '1', '2023-01-29 21:27:33', '2023-01-29 21:27:33'),
(38, 1, NULL, 65, 'SALE', 2239491, NULL, NULL, '1', -16927, NULL, NULL, '2023-01-30', '2023-01-30', '1', '2023-01-29 21:37:37', '2023-01-29 21:37:37'),
(39, 1, NULL, 66, 'SALE', 8381906, NULL, NULL, '1', -16677, NULL, NULL, '2023-01-30', '2023-01-30', '1', '2023-01-29 21:44:42', '2023-01-29 21:44:42'),
(40, 1, NULL, 67, 'CLIENT_PAYMENT', NULL, 1, NULL, '1', -16607, NULL, 70, '2023-01-30', '2023-01-30', '1', '2023-01-29 21:46:36', '2023-01-29 21:46:36'),
(41, 1, NULL, 69, 'SALE', 2594492, NULL, NULL, '1', -16608, NULL, NULL, '2023-01-30', '2023-01-30', '1', '2023-01-30 00:50:10', '2023-01-30 00:50:10');

-- --------------------------------------------------------

--
-- Table structure for table `client_transactions`
--

CREATE TABLE `client_transactions` (
  `client_transaction_id` int(10) UNSIGNED NOT NULL,
  `client_transaction_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_transaction_account_id` bigint(20) DEFAULT NULL,
  `client_transaction_client_id` bigint(20) DEFAULT NULL,
  `client_transaction_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_transaction_last_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_transaction_opening_balance` bigint(20) DEFAULT NULL,
  `client_transaction_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_transaction_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_transaction_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_transaction_has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `client_transaction_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_transaction_invoice_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_transactions`
--

INSERT INTO `client_transactions` (`client_transaction_id`, `client_transaction_type`, `client_transaction_account_id`, `client_transaction_client_id`, `client_transaction_amount`, `client_transaction_last_balance`, `client_transaction_opening_balance`, `client_transaction_date`, `client_transaction_note`, `client_transaction_create_date`, `client_transaction_has_deleted`, `client_transaction_deleted_by`, `created_at`, `updated_at`, `client_transaction_invoice_id`) VALUES
(7, 'CREDIT', NULL, 1, '230', '0', NULL, '2023-01-23', NULL, NULL, 'NO', '', '2023-01-22 22:57:39', '2023-01-22 22:57:39', 7597908),
(8, 'DEBIT', NULL, 1, '237.775', '-7', NULL, '2023-01-23', NULL, NULL, 'NO', '', '2023-01-22 22:57:39', '2023-01-22 22:57:39', 7597908),
(9, 'DEBIT', NULL, 1, '6450', '-6457', NULL, '2023-01-23', NULL, NULL, 'NO', '', '2023-01-22 22:59:17', '2023-01-22 22:59:17', 7503927),
(10, 'CREDIT', NULL, 1, '150', '-6457', NULL, '2023-01-23', NULL, NULL, 'NO', '', '2023-01-22 23:52:48', '2023-01-22 23:52:48', 4597299),
(11, 'CREDIT', NULL, 1, '150', '-6307', NULL, '2023-01-23', NULL, NULL, 'NO', '', '2023-01-22 23:56:40', '2023-01-22 23:56:40', 2582632),
(12, 'CREDIT', NULL, 1, '400', '-5757', NULL, '2023-01-23', NULL, NULL, 'NO', '', '2023-01-22 23:58:13', '2023-01-22 23:58:13', 9063427),
(13, 'DEBIT', NULL, 1, '5400', '-11157', NULL, '2023-01-23', NULL, NULL, 'NO', '', '2023-01-22 23:58:13', '2023-01-22 23:58:13', 9063427),
(14, 'CREDIT', NULL, 1, '60000', '48843', NULL, '2023-01-23', NULL, NULL, 'NO', '', '2023-01-23 00:45:21', '2023-01-23 00:45:21', 8551024),
(15, 'DEBIT', NULL, 1, '60500', '-11657', NULL, '2023-01-23', NULL, NULL, 'NO', '', '2023-01-23 00:45:21', '2023-01-23 00:45:21', 8551024),
(16, 'CREDIT', NULL, 1, '6000', '-5657', NULL, '2023-01-23', NULL, NULL, 'NO', '', '2023-01-23 03:17:16', '2023-01-23 03:17:16', 1648502),
(17, 'DEBIT', NULL, 1, '6450', '-12107', NULL, '2023-01-23', NULL, NULL, 'NO', '', '2023-01-23 03:17:16', '2023-01-23 03:17:16', 1648502),
(18, 'CREDIT', NULL, 1, '520', '-11587', NULL, '2023-01-23', NULL, NULL, 'NO', '', '2023-01-23 03:46:51', '2023-01-23 03:46:51', 6383113),
(19, 'DEBIT', NULL, 1, '1720', '-13307', NULL, '2023-01-23', NULL, NULL, 'NO', '', '2023-01-23 03:46:51', '2023-01-23 03:46:51', 6383113),
(20, 'CREDIT', NULL, 1, '440', '-12867', NULL, '2023-01-23', NULL, NULL, 'NO', '', '2023-01-23 06:07:49', '2023-01-23 06:07:49', 4439464),
(21, 'DEBIT', NULL, 1, '3440', '-16307', NULL, '2023-01-23', NULL, NULL, 'NO', '', '2023-01-23 06:07:49', '2023-01-23 06:07:49', 4439464),
(22, 'CREDIT', NULL, 1, '40', '-16267', NULL, '2023-01-23', NULL, NULL, 'NO', '', '2023-01-23 06:16:04', '2023-01-23 06:16:04', 4076372),
(23, 'CREDIT', NULL, 1, '20', '-16247', NULL, '2023-01-24', NULL, NULL, 'NO', '', '2023-01-23 23:41:32', '2023-01-23 23:41:32', 9517826),
(24, 'DEBIT', NULL, 1, '40', '-16287', NULL, '2023-01-24', NULL, NULL, 'NO', '', '2023-01-23 23:41:32', '2023-01-23 23:41:32', 9517826),
(25, 'CREDIT', NULL, 1, '1500', '-14787', NULL, '2023-01-24', NULL, NULL, 'NO', '', '2023-01-24 00:33:57', '2023-01-24 00:33:57', 1958551),
(26, 'DEBIT', NULL, 1, '2000', '-16787', NULL, '2023-01-24', NULL, NULL, 'NO', '', '2023-01-24 00:33:57', '2023-01-24 00:33:57', 1958551),
(27, 'CREDIT', NULL, NULL, '200', '200', NULL, '2023-01-24', NULL, NULL, 'NO', '', '2023-01-24 02:48:17', '2023-01-24 02:48:17', 5126944),
(28, 'DEBIT', NULL, NULL, '233', '-33', NULL, '2023-01-24', NULL, NULL, 'NO', '', '2023-01-24 02:48:17', '2023-01-24 02:48:17', 5126944),
(29, 'CREDIT', NULL, NULL, '80', '47', NULL, '2023-01-24', NULL, NULL, 'NO', '', '2023-01-24 04:00:12', '2023-01-24 04:00:12', 5838008),
(30, 'DEBIT', NULL, NULL, '280', '-233', NULL, '2023-01-24', NULL, NULL, 'NO', '', '2023-01-24 04:00:12', '2023-01-24 04:00:12', 5838008),
(31, 'CREDIT', NULL, 1, '40', '-16747', NULL, '2023-01-24', NULL, NULL, 'NO', '', '2023-01-24 04:00:45', '2023-01-24 04:00:45', 1415547),
(32, 'DEBIT', NULL, 1, '48.6', '-16796', NULL, '2023-01-24', NULL, NULL, 'NO', '', '2023-01-24 04:00:45', '2023-01-24 04:00:45', 1415547),
(33, 'CREDIT', NULL, 1, '8', '-16788', NULL, '2023-01-24', NULL, NULL, 'NO', '', '2023-01-24 04:26:06', '2023-01-24 04:26:06', 2988925),
(34, 'DEBIT', NULL, 1, '60.8', '-16849', NULL, '2023-01-24', NULL, NULL, 'NO', '', '2023-01-24 04:26:06', '2023-01-24 04:26:07', 2988925),
(35, 'CREDIT', NULL, 1, '300', '-16549', NULL, '2023-01-25', NULL, NULL, 'NO', '', '2023-01-25 00:37:02', '2023-01-25 00:37:02', 5155914),
(36, 'DEBIT', NULL, 1, '360', '-16909', NULL, '2023-01-25', NULL, NULL, 'NO', '', '2023-01-25 00:37:02', '2023-01-25 00:37:02', 5155914),
(37, 'CREDIT', NULL, 1, '340', '-16569', NULL, '2023-01-25', NULL, NULL, 'NO', '', '2023-01-25 06:45:14', '2023-01-25 06:45:14', 31),
(38, 'CREDIT', NULL, 1, '240', '-16329', NULL, '2023-01-25', NULL, NULL, 'NO', '', '2023-01-25 06:59:59', '2023-01-25 06:59:59', 31),
(39, 'CREDIT', NULL, 1, '72', '-16257', NULL, '2023-01-26', NULL, NULL, 'NO', '', '2023-01-25 21:26:32', '2023-01-25 21:26:32', 4818339),
(40, 'DEBIT', NULL, 1, '72.4', '-16329', NULL, '2023-01-26', NULL, NULL, 'NO', '', '2023-01-25 21:26:32', '2023-01-25 21:26:32', 4818339),
(41, 'CREDIT', NULL, 1, '-12', '-16341', NULL, '2023-01-26', NULL, NULL, 'NO', '', '2023-01-25 21:43:01', '2023-01-25 21:43:01', 32),
(42, 'DEBIT', NULL, 1, '240', '-16581', NULL, '2023-01-26', NULL, NULL, 'NO', '', '2023-01-25 21:54:58', '2023-01-25 21:54:58', 3833563),
(43, 'CREDIT', NULL, 1, '140', '-16441', NULL, '2023-01-26', NULL, NULL, 'NO', '', '2023-01-25 22:01:02', '2023-01-25 22:01:02', 33),
(44, 'CREDIT', NULL, 1, '80', '-16361', NULL, '2023-01-29', NULL, NULL, 'NO', '', '2023-01-28 23:12:21', '2023-01-28 23:12:21', 7410817),
(45, 'DEBIT', NULL, 1, '80', '-16441', NULL, '2023-01-29', NULL, NULL, 'NO', '', '2023-01-28 23:12:21', '2023-01-28 23:12:21', 7410817),
(46, 'DEBIT', NULL, NULL, '80', '-313', NULL, '2023-01-29', NULL, NULL, 'NO', '', '2023-01-29 03:42:20', '2023-01-29 03:42:20', 7410817),
(47, 'CREDIT', NULL, NULL, '80', '-233', NULL, '2023-01-29', NULL, NULL, 'NO', '', '2023-01-29 04:21:31', '2023-01-29 04:21:31', 7410817),
(48, 'DEBIT', NULL, NULL, '80', '-313', NULL, '2023-01-29', NULL, NULL, 'NO', '', '2023-01-29 04:21:31', '2023-01-29 04:21:31', 7410817),
(49, 'CREDIT', NULL, NULL, '80', '-233', NULL, '2023-01-29', NULL, NULL, 'NO', '', '2023-01-29 04:39:21', '2023-01-29 04:39:21', 7410817),
(50, 'DEBIT', NULL, NULL, '80', '-313', NULL, '2023-01-29', NULL, NULL, 'NO', '', '2023-01-29 04:39:21', '2023-01-29 04:39:21', 7410817),
(51, 'CREDIT', NULL, NULL, '80', '-233', NULL, '2023-01-29', NULL, NULL, 'NO', '', '2023-01-29 04:39:32', '2023-01-29 04:39:32', 7410817),
(52, 'DEBIT', NULL, NULL, '80', '-313', NULL, '2023-01-29', NULL, NULL, 'NO', '', '2023-01-29 04:39:32', '2023-01-29 04:39:32', 7410817),
(53, 'CREDIT', NULL, NULL, '80', '-233', NULL, '2023-01-29', NULL, NULL, 'NO', '', '2023-01-29 05:38:50', '2023-01-29 05:38:50', 7410817),
(54, 'DEBIT', NULL, NULL, '80', '-313', NULL, '2023-01-29', NULL, NULL, 'NO', '', '2023-01-29 05:38:50', '2023-01-29 05:38:50', 7410817),
(55, 'CREDIT', NULL, NULL, '80', '-233', NULL, '2023-01-29', NULL, NULL, 'NO', '', '2023-01-29 05:55:25', '2023-01-29 05:55:25', 7410817),
(56, 'DEBIT', NULL, NULL, '80', '-313', NULL, '2023-01-29', NULL, NULL, 'NO', '', '2023-01-29 05:55:25', '2023-01-29 05:55:25', 7410817),
(57, 'CREDIT', NULL, NULL, '80', '-233', NULL, '2023-01-29', NULL, NULL, 'NO', '', '2023-01-29 05:55:35', '2023-01-29 05:55:35', 7410817),
(58, 'DEBIT', NULL, NULL, '80', '-313', NULL, '2023-01-29', NULL, NULL, 'NO', '', '2023-01-29 05:55:35', '2023-01-29 05:55:35', 7410817),
(59, 'CREDIT', NULL, 1, '20', '-16421', NULL, '2023-01-30', NULL, NULL, 'NO', '', '2023-01-29 21:13:11', '2023-01-29 21:13:11', 8290241),
(60, 'CREDIT', NULL, 1, '25', '-16396', NULL, '2023-01-30', NULL, NULL, 'NO', '', '2023-01-29 21:19:51', '2023-01-29 21:19:51', 9068163),
(61, 'DEBIT', NULL, 1, '30.25', '-16426', NULL, '2023-01-30', NULL, NULL, 'NO', '', '2023-01-29 21:19:51', '2023-01-29 21:19:51', 9068163),
(62, 'CREDIT', NULL, 1, '32', '-16394', NULL, '2023-01-30', NULL, NULL, 'NO', '', '2023-01-29 21:25:48', '2023-01-29 21:25:48', 4594220),
(63, 'DEBIT', NULL, 1, '32.4', '-16427', NULL, '2023-01-30', NULL, NULL, 'NO', '', '2023-01-29 21:25:48', '2023-01-29 21:25:48', 4594220),
(64, 'CREDIT', NULL, 1, '-148', '-16575', NULL, '2023-01-30', NULL, NULL, 'NO', '', '2023-01-29 21:27:33', '2023-01-29 21:27:33', 45),
(65, 'DEBIT', NULL, 1, '352', '-16927', NULL, '2023-01-30', NULL, NULL, 'NO', '', '2023-01-29 21:37:37', '2023-01-29 21:37:37', 2239491),
(66, 'CREDIT', NULL, 1, '250', '-16677', NULL, '2023-01-30', NULL, NULL, 'NO', '', '2023-01-29 21:44:42', '2023-01-29 21:44:42', 8381906),
(67, 'CREDIT', 4, 1, '70', '-16607', NULL, '2023-01-30', NULL, '2023-01-30', 'NO', '', '2023-01-29 21:46:36', '2023-01-29 21:46:36', 0),
(68, 'CREDIT', NULL, 1, '750', '-15857', NULL, '2023-01-30', NULL, NULL, 'NO', '', '2023-01-30 00:50:10', '2023-01-30 00:50:10', 2594492),
(69, 'DEBIT', NULL, 1, '751', '-16608', NULL, '2023-01-30', NULL, NULL, 'NO', '', '2023-01-30 00:50:10', '2023-01-30 00:50:10', 2594492);

-- --------------------------------------------------------

--
-- Table structure for table `company_infos`
--

CREATE TABLE `company_infos` (
  `company_id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_facebook_page` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_database_backup_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo_width` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo_height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_men`
--

CREATE TABLE `delivery_men` (
  `delivery_men_id` int(10) UNSIGNED NOT NULL,
  `delivery_men_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_men_entry_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_men_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_men_address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_men_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `delivery_men_is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `delivery_men_vehicle` bigint(20) DEFAULT NULL,
  `delivery_men_created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_men_updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_men_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_men`
--

INSERT INTO `delivery_men` (`delivery_men_id`, `delivery_men_name`, `delivery_men_entry_id`, `delivery_men_phone_number`, `delivery_men_address`, `delivery_men_status`, `delivery_men_is_deleted`, `delivery_men_vehicle`, `delivery_men_created_by`, `delivery_men_updated_by`, `delivery_men_deleted_by`, `created_at`, `updated_at`) VALUES
(8, 'Rakib', 'Rakib37985', '01521326072', 'Noakhali,Dhaka', '1', 'NO', 1, '1', NULL, NULL, '2023-01-19 03:26:32', '2023-01-19 03:26:32');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_vehicles`
--

CREATE TABLE `delivery_vehicles` (
  `delivery_vehicles_id` int(10) UNSIGNED NOT NULL,
  `delivery_vehicles_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_vehicles_entry_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_vehicles_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_vehicles_reg_no` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_vehicles_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `delivery_vehicles_is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `delivery_vehicles_created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_vehicles_updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_vehicles_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_vehicles`
--

INSERT INTO `delivery_vehicles` (`delivery_vehicles_id`, `delivery_vehicles_name`, `delivery_vehicles_entry_id`, `delivery_vehicles_number`, `delivery_vehicles_reg_no`, `delivery_vehicles_status`, `delivery_vehicles_is_deleted`, `delivery_vehicles_created_by`, `delivery_vehicles_updated_by`, `delivery_vehicles_deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'Suzuki Gixxer', 'Suzuki Gixxer40022', '1235050', '4415151 4555', '1', 'NO', '1', NULL, NULL, '2023-01-19 01:01:16', '2023-01-19 01:01:16');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expense_id` int(10) UNSIGNED NOT NULL,
  `expense_head_id` bigint(20) DEFAULT NULL,
  `expense_sub_head_id` bigint(20) DEFAULT NULL,
  `expense_account` bigint(20) DEFAULT NULL,
  `expense_amount` bigint(20) DEFAULT NULL,
  `expense_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expense_id`, `expense_head_id`, `expense_sub_head_id`, `expense_account`, `expense_amount`, `expense_date`, `created_by`, `is_deleted`, `deleted_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 2, NULL, NULL, '5', 'NO', NULL, NULL, '1', '2023-01-03 03:56:06', '2023-01-03 03:56:06'),
(2, 1, 2, 1, NULL, NULL, '1', 'NO', NULL, NULL, '1', '2023-01-03 03:57:45', '2023-01-03 03:57:45'),
(3, 2, 2, 2, NULL, NULL, '5', 'NO', NULL, NULL, '1', '2023-01-03 04:30:10', '2023-01-03 04:30:10'),
(4, 2, 2, 2, NULL, NULL, '5', 'NO', NULL, NULL, '1', '2023-01-03 04:45:59', '2023-01-03 04:45:59'),
(5, 1, 2, 1, NULL, NULL, '1', 'NO', NULL, NULL, '1', '2023-01-03 21:22:45', '2023-01-03 21:22:45'),
(6, 1, 2, 1, NULL, NULL, '1', 'NO', NULL, NULL, '1', '2023-01-03 21:23:57', '2023-01-03 21:23:57'),
(7, 1, 2, 1, NULL, NULL, NULL, 'NO', NULL, NULL, '1', '2023-01-03 21:28:21', '2023-01-03 21:28:21'),
(8, 1, 2, 1, NULL, NULL, NULL, 'NO', NULL, NULL, '1', '2023-01-03 21:28:50', '2023-01-03 21:28:50'),
(9, 1, 2, 1, NULL, NULL, NULL, 'NO', NULL, NULL, '1', '2023-01-03 21:29:22', '2023-01-03 21:29:22'),
(10, 1, 2, 1, NULL, NULL, NULL, 'NO', NULL, NULL, '1', '2023-01-03 21:30:17', '2023-01-03 21:30:17'),
(11, 1, 2, 1, NULL, NULL, NULL, 'NO', NULL, NULL, '1', '2023-01-03 22:05:27', '2023-01-03 22:05:27'),
(12, 1, 2, 1, 580, NULL, NULL, 'NO', NULL, NULL, '1', '2023-01-03 22:07:32', '2023-01-03 22:07:32'),
(13, 1, 2, 1, 2400, NULL, NULL, 'NO', NULL, NULL, '1', '2023-01-03 23:51:48', '2023-01-03 23:51:48'),
(15, 1, 2, 3, 6000, NULL, NULL, 'NO', NULL, NULL, '1', '2023-01-04 01:03:24', '2023-01-04 01:03:24'),
(16, 1, 2, 3, 7000, NULL, NULL, 'NO', NULL, NULL, '1', '2023-01-04 01:04:40', '2023-01-04 01:04:40'),
(17, 1, 2, 3, 450000, NULL, NULL, 'NO', NULL, NULL, '1', '2023-01-04 01:06:08', '2023-01-04 01:06:08'),
(18, 1, 2, 3, 45000, NULL, NULL, 'NO', NULL, NULL, '1', '2023-01-04 02:27:49', '2023-01-04 02:27:49'),
(19, 1, 2, 3, 4000, NULL, NULL, 'NO', NULL, NULL, '1', '2023-01-04 02:33:29', '2023-01-04 02:33:29'),
(20, 1, 1, 3, 4506, NULL, NULL, 'NO', NULL, NULL, '1', '2023-01-04 02:39:01', '2023-01-04 02:39:01'),
(21, 1, 2, 3, 7000, NULL, NULL, 'NO', NULL, NULL, '1', '2023-01-04 02:43:36', '2023-01-04 02:43:36'),
(22, 1, 2, 3, 8494, NULL, NULL, 'NO', NULL, NULL, '1', '2023-01-04 04:03:39', '2023-01-04 04:03:39'),
(23, 1, 2, 3, 8500, NULL, NULL, 'NO', NULL, NULL, '1', '2023-01-04 04:04:28', '2023-01-04 04:04:28'),
(24, 1, 1, 6, 850, NULL, NULL, 'NO', NULL, NULL, '1', '2023-01-25 22:49:29', '2023-01-25 22:49:29'),
(25, 1, 3, 7, 2500, NULL, NULL, 'NO', NULL, NULL, '1', '2023-01-30 00:44:33', '2023-01-30 00:44:33'),
(26, 1, 3, 7, 1500, NULL, NULL, 'NO', NULL, NULL, '1', '2023-01-30 00:44:59', '2023-01-30 00:44:59'),
(27, 1, 2, 7, 1300, NULL, NULL, 'NO', NULL, NULL, '1', '2023-01-30 00:45:23', '2023-01-30 00:45:23'),
(28, 1, 3, 7, 700, NULL, NULL, 'NO', NULL, NULL, '1', '2023-01-30 00:47:37', '2023-01-30 00:47:37');

-- --------------------------------------------------------

--
-- Table structure for table `expense_heads`
--

CREATE TABLE `expense_heads` (
  `expensehead_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_heads`
--

INSERT INTO `expense_heads` (`expensehead_id`, `title`, `created_by`, `deleted_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bazar', '1', NULL, NULL, '1', '2023-01-02 23:04:22', '2023-01-02 23:04:22');

-- --------------------------------------------------------

--
-- Table structure for table `expense_sub_heads`
--

CREATE TABLE `expense_sub_heads` (
  `expense_sub_head_id` int(10) UNSIGNED NOT NULL,
  `expense_head_id` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_sub_heads`
--

INSERT INTO `expense_sub_heads` (`expense_sub_head_id`, `expense_head_id`, `title`, `created_by`, `deleted_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'kacha morich', '1', NULL, NULL, '1', '2023-01-02 23:04:51', '2023-01-02 23:04:51'),
(2, 1, 'peyaz', '1', NULL, NULL, '1', '2023-01-02 23:42:28', '2023-01-02 23:42:28'),
(3, 1, 'kiman', '1', NULL, NULL, '1', '2023-01-30 00:32:32', '2023-01-30 00:32:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_pos_sales`
--

CREATE TABLE `invoice_pos_sales` (
  `sale_id` int(10) UNSIGNED NOT NULL,
  `invoice_no` bigint(20) DEFAULT NULL,
  `sales_form` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` bigint(20) DEFAULT NULL,
  `warehouse_id` bigint(20) DEFAULT NULL,
  `staff_id` bigint(20) DEFAULT NULL,
  `invoice_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sales_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subTotal` bigint(20) DEFAULT NULL,
  `product_discount` bigint(20) DEFAULT NULL,
  `vat_rate` bigint(20) DEFAULT NULL,
  `vat_amount` bigint(20) DEFAULT NULL,
  `overall_discount` bigint(20) DEFAULT NULL,
  `grand_total` bigint(20) DEFAULT NULL,
  `payment_type` bigint(20) DEFAULT NULL,
  `account` bigint(20) DEFAULT NULL,
  `total_paying` bigint(20) DEFAULT NULL,
  `total_paid` int(11) DEFAULT NULL,
  `change` bigint(20) DEFAULT NULL,
  `invoice_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `invoice_created_by` bigint(20) DEFAULT NULL,
  `invoice_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `branch_id` bigint(20) DEFAULT NULL,
  `customer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_pos_sales`
--

INSERT INTO `invoice_pos_sales` (`sale_id`, `invoice_no`, `sales_form`, `client_id`, `warehouse_id`, `staff_id`, `invoice_date`, `sales_date`, `subTotal`, `product_discount`, `vat_rate`, `vat_amount`, `overall_discount`, `grand_total`, `payment_type`, `account`, `total_paying`, `total_paid`, `change`, `invoice_create_date`, `invoice_has_deleted`, `invoice_created_by`, `invoice_deleted_by`, `created_at`, `updated_at`, `branch_id`, `customer_type`) VALUES
(1, 3463626, '2', 1, 1, 2, '23-01-23', '23-01-23', 125, 125, 8, 9, 9, 125, 125, 3, 125, NULL, 0, '23-01-23', 'NO', 1, NULL, '2023-01-22 21:20:31', '2023-01-22 21:20:31', NULL, NULL),
(2, 2731782, '2', 1, 1, 2, '23-01-23', '23-01-23', 225, 25, 8, 17, 16, 226, 226, 3, 200, NULL, -26, '23-01-23', 'NO', 1, NULL, '2023-01-22 22:04:45', '2023-01-22 22:04:45', NULL, NULL),
(3, 8870397, '3', 1, 1, 3, '23-01-23', '23-01-23', 5400, 600, 8, 405, 405, 5400, 5400, 3, 5000, NULL, -400, '23-01-23', 'NO', 1, NULL, '2023-01-22 22:06:19', '2023-01-22 22:06:19', NULL, NULL),
(4, 2892012, '3', 1, 1, 3, '23-01-23', '23-01-23', 3000, 3000, 8, 225, 225, 3000, 3000, 3, 2500, NULL, -500, '23-01-23', 'NO', 1, NULL, '2023-01-22 22:31:23', '2023-01-22 22:31:23', NULL, NULL),
(5, 9276591, '3', 1, 1, 3, '23-01-23', '23-01-23', 4800, 1200, 8, 360, 360, 4800, 4800, 3, 4000, NULL, -800, '23-01-23', 'NO', 1, NULL, '2023-01-22 22:32:19', '2023-01-22 22:32:19', NULL, NULL),
(6, 3193945, '3', 1, 1, 3, '23-01-23', '23-01-23', 237, 13, 8, 18, 17, 238, 238, 3, 200, NULL, -38, '23-01-23', 'NO', 1, NULL, '2023-01-22 22:37:56', '2023-01-22 22:37:56', NULL, NULL),
(7, 8082906, '3', 1, 1, 3, '23-01-23', '23-01-23', 225, 25, 8, 17, 16, 226, 226, 3, 200, NULL, -26, '23-01-23', 'NO', 1, NULL, '2023-01-22 22:47:17', '2023-01-22 22:47:17', NULL, NULL),
(8, 1203106, '2', 1, 1, 2, '23-01-23', '23-01-23', 1350, 150, 8, 101, 101, 1350, 1350, 3, 1000, NULL, -350, '23-01-23', 'NO', 1, NULL, '2023-01-22 22:52:16', '2023-01-22 22:52:16', NULL, NULL),
(9, 7601919, '2', 1, 1, 2, '23-01-23', '23-01-23', 225, 25, 8, 17, 16, 226, 226, 3, 200, NULL, -26, '23-01-23', 'NO', 1, NULL, '2023-01-22 22:53:48', '2023-01-22 22:53:48', NULL, NULL),
(10, 7597908, '3', 1, 1, 3, '23-01-23', '23-01-23', 237, 13, 8, 18, 17, 238, 238, 3, 230, NULL, -8, '23-01-23', 'NO', 1, NULL, '2023-01-22 22:57:39', '2023-01-22 22:57:39', NULL, NULL),
(11, 7503927, '2', 1, 1, 2, '23-01-23', '23-01-23', 6000, 0, 8, 450, 17, 6450, 6450, 3, 0, NULL, 0, '23-01-23', 'NO', 1, NULL, '2023-01-22 22:59:17', '2023-01-22 22:59:17', NULL, NULL),
(12, 4597299, '3', 1, 1, 3, '23-01-23', '23-01-23', 200, 50, 8, 15, 10, 205, 205, 3, 150, NULL, -55, '23-01-23', 'NO', 1, NULL, '2023-01-22 23:52:48', '2023-01-22 23:52:48', NULL, NULL),
(13, 2582632, '3', 1, 1, 3, '23-01-23', '23-01-23', 225, 25, 8, 17, 16, 226, 226, 3, 150, NULL, -76, '23-01-23', 'NO', 1, NULL, '2023-01-22 23:56:40', '2023-01-22 23:56:40', NULL, NULL),
(14, 9063427, '2', 1, 1, 2, '23-01-23', '23-01-23', 5400, 600, 8, 405, 405, 5400, 5400, 3, 400, NULL, -5000, '23-01-23', 'NO', 1, NULL, '2023-01-22 23:58:13', '2023-01-22 23:58:13', NULL, NULL),
(15, 8551024, '3', 1, 1, 3, '23-01-23', '23-01-23', 60000, 0, 8, 4500, 4000, 60500, 5, 5, 60000, NULL, -500, '23-01-23', 'NO', 1, NULL, '2023-01-23 00:45:21', '2023-01-23 00:45:21', NULL, NULL),
(16, 1648502, '2', 1, 1, 2, '23-01-23', '23-01-23', 6000, 0, 8, 450, NULL, 6450, NULL, NULL, 6000, NULL, -450, '23-01-23', 'NO', 1, NULL, '2023-01-23 03:17:16', '2023-01-23 03:17:16', NULL, NULL),
(17, 6383113, '2', 1, 2, 2, '23-01-23', '23-01-23', 1600, 0, 8, 120, NULL, 1720, 3, 3, 520, NULL, -1200, '23-01-23', 'NO', 1, NULL, '2023-01-23 03:46:51', '2023-01-23 03:46:51', NULL, NULL),
(18, 4439464, '2', 1, 2, 2, '23-01-23', '23-01-23', 3200, 0, 8, 240, NULL, 3440, 3, 3, 440, NULL, -3000, '23-01-23', 'NO', 1, NULL, '2023-01-23 06:07:49', '2023-01-23 06:07:49', NULL, NULL),
(19, NULL, NULL, NULL, 2, NULL, '23-01-23', '23-01-23', 1600, 0, 8, 120, NULL, 1720, 3, 3, 0, NULL, 0, '23-01-23', 'NO', 1, NULL, '2023-01-23 06:14:31', '2023-01-23 06:14:31', NULL, NULL),
(20, NULL, NULL, NULL, 2, NULL, '23-01-23', '23-01-23', 1600, 0, 8, 120, NULL, 1720, 3, 3, 1700, NULL, -20, '23-01-23', 'NO', 1, NULL, '2023-01-23 06:14:37', '2023-01-23 06:14:37', NULL, NULL),
(21, 4076372, '2', 1, 2, 2, '23-01-23', '23-01-23', -1600, 0, 8, -120, NULL, -1720, 3, 3, 40, NULL, 1760, '23-01-23', 'NO', 1, NULL, '2023-01-23 06:16:04', '2023-01-23 06:16:04', NULL, NULL),
(22, NULL, NULL, NULL, NULL, NULL, '24-01-23', '24-01-23', 158, 2, 8, 12, 11, 159, 0, 6, 150, NULL, -9, '24-01-23', 'NO', 1, NULL, '2023-01-23 23:37:58', '2023-01-23 23:37:58', NULL, NULL),
(23, 9517826, '2', 1, NULL, 2, '24-01-23', '24-01-23', 40, 0, 8, 3, 3, 40, 0, 5, 20, NULL, -20, '24-01-23', 'NO', 1, NULL, '2023-01-23 23:41:32', '2023-01-23 23:41:32', NULL, NULL),
(24, 1958551, '3', 1, NULL, 3, '24-01-23', '24-01-23', 2000, 0, 8, 150, 150, 2000, 0, 4, 1500, NULL, -500, '24-01-23', 'NO', 1, NULL, '2023-01-24 00:33:57', '2023-01-24 00:33:57', 1, NULL),
(26, 5126944, NULL, NULL, NULL, NULL, '24-01-23', '24-01-23', 240, 160, 8, 18, 25, 233, 0, 6, 200, NULL, -33, '24-01-23', 'NO', 1, NULL, '2023-01-24 02:48:17', '2023-01-24 02:48:17', 1, NULL),
(28, 5838008, NULL, NULL, NULL, NULL, '24-01-23', '24-01-23', 280, 120, 8, 21, 21, 280, 0, 3, 80, NULL, -200, '24-01-23', 'NO', 1, NULL, '2023-01-24 04:00:12', '2023-01-24 04:00:12', NULL, NULL),
(29, 1415547, '3', 1, NULL, 3, '24-01-23', '24-01-23', 48, 912, 8, 4, 3, 49, 0, 3, 40, NULL, -9, '24-01-23', 'NO', 1, NULL, '2023-01-24 04:00:45', '2023-01-24 04:00:45', NULL, NULL),
(30, 2988925, '3', 1, NULL, 3, '24-01-23', '24-01-23', 64, 16, 8, 5, 8, 61, 0, 4, 8, NULL, -53, '24-01-23', 'NO', 1, NULL, '2023-01-24 04:26:06', '2023-01-24 04:26:06', 1, 'offline'),
(31, 5155914, '3', 1, NULL, 3, '25-01-23', '25-01-23', 360, 40, 8, 27, 27, 360, 0, 3, 300, NULL, -60, '25-01-23', 'NO', 1, NULL, '2023-01-25 00:37:02', '2023-01-25 00:37:02', 1, 'offline'),
(32, 4818339, '3', 1, NULL, 3, '26-01-23', '26-01-23', 72, 8, 8, 5, 5, 72, 0, 6, 72, NULL, 0, '26-01-23', 'NO', 1, NULL, '2023-01-25 21:26:32', '2023-01-25 21:26:32', 1, 'offline'),
(33, 3833563, '3', 1, NULL, 3, '26-01-23', '26-01-23', 240, 80, 8, 18, 18, 240, NULL, NULL, 0, NULL, 0, '26-01-23', 'NO', 1, NULL, '2023-01-25 21:54:58', '2023-01-25 21:54:58', 1, 'offline'),
(34, 3666943, '3', 1, NULL, 3, '29-01-23', '29-01-23', NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '29-01-23', 'NO', 1, NULL, '2023-01-28 23:10:17', '2023-01-28 23:10:17', 1, 'offline'),
(35, 35, NULL, NULL, NULL, NULL, '2023-01-30', '2023-01-30', 108, 0, 8, 8, 16, 100, 0, NULL, NULL, NULL, 0, '2023-01-30', 'NO', 1, NULL, '2023-01-28 23:12:21', '2023-01-29 21:09:59', 1, 'online'),
(36, 7410817, NULL, NULL, NULL, NULL, '2023-01-29', '2023-01-29', NULL, NULL, 8, 6, 6, 80, NULL, NULL, NULL, NULL, NULL, '2023-01-29', 'NO', 1, NULL, '2023-01-29 03:42:20', '2023-01-29 03:42:20', NULL, 'online'),
(37, 7410817, NULL, NULL, NULL, NULL, '2023-01-29', '2023-01-29', NULL, NULL, 8, 6, 6, 80, NULL, NULL, 80, NULL, NULL, '2023-01-29', 'NO', 1, NULL, '2023-01-29 04:21:31', '2023-01-29 04:21:31', NULL, 'online'),
(38, 7410817, NULL, NULL, NULL, NULL, '2023-01-29', '2023-01-29', NULL, NULL, 8, 6, 6, 80, NULL, NULL, 80, NULL, NULL, '2023-01-29', 'NO', 1, NULL, '2023-01-29 04:39:21', '2023-01-29 04:39:21', 1, 'online'),
(39, 7410817, NULL, NULL, NULL, NULL, '2023-01-29', '2023-01-29', NULL, NULL, 8, 6, 6, 80, NULL, NULL, 80, NULL, NULL, '2023-01-29', 'NO', 1, NULL, '2023-01-29 04:39:32', '2023-01-29 04:39:32', 1, 'online'),
(40, 7410817, NULL, NULL, NULL, NULL, '2023-01-29', '2023-01-29', 80, NULL, 8, 6, 6, 80, NULL, NULL, 80, NULL, NULL, '2023-01-29', 'NO', 1, NULL, '2023-01-29 05:38:50', '2023-01-29 05:38:50', 1, 'online'),
(41, 7410817, NULL, NULL, NULL, NULL, '2023-01-29', '2023-01-29', 80, NULL, 8, 6, 6, 80, NULL, NULL, 80, NULL, 0, '2023-01-29', 'NO', 1, NULL, '2023-01-29 05:55:25', '2023-01-29 05:55:25', 1, 'online'),
(42, 7410817, NULL, NULL, NULL, NULL, '2023-01-29', '2023-01-29', 80, NULL, 8, 6, 6, 80, NULL, NULL, 80, NULL, 0, '2023-01-29', 'NO', 1, NULL, '2023-01-29 05:55:35', '2023-01-29 05:55:35', 1, 'online'),
(43, 43, '3', NULL, NULL, 3, '2023-01-30', '2023-01-30', 46, 8, 8, 3, 25, 49, 0, NULL, NULL, NULL, 11, '2023-01-30', 'NO', 1, NULL, '2023-01-29 21:13:11', '2023-01-29 21:13:59', 1, 'offline'),
(44, 44, '3', 1, NULL, 3, '2023-01-30', '2023-01-30', 68, 10, 8, 5, 2, 73, 0, NULL, NULL, NULL, -5, '2023-01-30', 'NO', 1, NULL, '2023-01-29 21:19:51', '2023-01-29 21:20:15', 1, 'online'),
(45, 4594220, '3', 1, NULL, 3, '2023-01-30', '2023-01-30', 32, 8, 8, 2, 2, 32, 0, 6, 32, NULL, 0, '2023-01-30', 'NO', 1, NULL, '2023-01-29 21:25:48', '2023-01-29 21:25:48', 1, 'offline'),
(46, 2239491, '2', 1, NULL, 2, '2023-01-30', '2023-01-30', 352, 88, 8, 26, 26, 352, 0, 5, 0, NULL, -352, '2023-01-30', 'NO', 1, NULL, '2023-01-29 21:37:37', '2023-01-29 21:37:37', 1, 'online'),
(47, 8381906, '2', 1, NULL, 2, '2023-01-30', '2023-01-30', 180, 20, 8, 14, 14, 180, 0, 4, 250, 320, 70, '2023-01-30', 'NO', 1, NULL, '2023-01-29 21:44:42', '2023-01-29 21:46:36', 1, 'offline'),
(48, 48, '2', 1, NULL, 2, '2023-01-30', '2023-01-30', 700, 175, 8, 53, 2, 802, 0, 7, NULL, NULL, -1, '2023-01-30', 'NO', 1, NULL, '2023-01-30 00:50:10', '2023-01-30 08:38:33', 1, 'offline');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_returns`
--

CREATE TABLE `invoice_returns` (
  `sale_return_id` int(10) UNSIGNED NOT NULL,
  `sale_id` bigint(20) NOT NULL,
  `branch_id` bigint(20) NOT NULL,
  `return_amount` bigint(20) NOT NULL,
  `return_charge` bigint(20) NOT NULL,
  `return_account` bigint(20) NOT NULL,
  `return_quantity` bigint(20) NOT NULL,
  `return_sale_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `return_sale_created_by` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_returns`
--

INSERT INTO `invoice_returns` (`sale_return_id`, `sale_id`, `branch_id`, `return_amount`, `return_charge`, `return_account`, `return_quantity`, `return_sale_date`, `return_sale_created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 340, 20, 6, 0, '25-01-23', 1, '2023-01-25 06:45:14', '2023-01-25 06:45:14'),
(2, 1, 1, 240, 80, 6, 2, '25-01-23', 1, '2023-01-25 06:59:59', '2023-01-25 06:59:59'),
(3, 1, 1, -12, 12, 6, 1, '26-01-23', 1, '2023-01-25 21:43:01', '2023-01-25 21:43:01'),
(4, 1, 1, 140, 20, 0, 4, '26-01-23', 1, '2023-01-25 22:01:02', '2023-01-25 22:01:02'),
(5, 1, 1, -148, 28, 0, 4, '30-01-23', 1, '2023-01-29 21:27:33', '2023-01-29 21:27:33');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_return_products`
--

CREATE TABLE `invoice_return_products` (
  `return_id` int(10) UNSIGNED NOT NULL,
  `return_sale_id` bigint(20) NOT NULL,
  `return_product_id` bigint(20) NOT NULL,
  `return_product_quantity` bigint(20) NOT NULL,
  `create_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_return_products`
--

INSERT INTO `invoice_return_products` (`return_id`, `return_sale_id`, `return_product_id`, `return_product_quantity`, `create_date`, `created_at`, `updated_at`) VALUES
(1, 1, 12, 1, '', '2023-01-25 06:45:14', '2023-01-25 06:45:14'),
(2, 2, 12, 2, '', '2023-01-25 06:59:59', '2023-01-25 06:59:59'),
(3, 3, 11, 1, '', '2023-01-25 21:43:01', '2023-01-25 21:43:01'),
(4, 4, 14, 4, '', '2023-01-25 22:01:02', '2023-01-25 22:01:02'),
(5, 5, 12, 4, '', '2023-01-29 21:27:33', '2023-01-29 21:27:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(16, '2014_10_12_000000_create_users_table', 1),
(17, '2014_10_12_100000_create_password_resets_table', 1),
(18, '2019_08_19_000000_create_failed_jobs_table', 1),
(19, '2022_11_16_062936_create_accounts_table', 1),
(20, '2022_11_16_063459_create_account_trasections_table', 1),
(21, '2022_12_24_054443_create_suppliers_table', 1),
(22, '2022_12_26_040821_create_clients_table', 1),
(23, '2022_12_26_064550_create_warehouses_table', 1),
(24, '2022_12_26_073251_create_product_categories_table', 1),
(25, '2022_12_26_080623_create_staff_table', 1),
(26, '2022_12_26_093101_create_products_table', 1),
(27, '2022_12_27_080313_create_purchases_table', 1),
(28, '2022_12_27_082335_create_purchase_items_table', 1),
(29, '2022_12_28_050116_create_expense_heads_table', 1),
(30, '2023_01_01_053944_create_expense_sub_heads_table', 1),
(31, '2023_01_03_032511_add_columns_to_account_transactions_table', 1),
(32, '2023_01_03_042552_create_expenses_table', 2),
(33, '2022_11_16_081202_create_client_ledgers_table', 3),
(34, '2022_11_21_080112_create_client_transections_table', 3),
(35, '2022_11_30_054202_create_money_reciept_table', 3),
(36, '2023_01_02_095015_create_delivery_men_table', 3),
(37, '2023_01_03_093144_add_purchase_created_at_purchases_table', 3),
(38, '2023_01_04_044815_create_account_transfer_table', 3),
(39, '2023_01_04_062223_create_delivery_vehicles_table', 3),
(40, '2023_01_04_081607_create_product_transfer_table', 3),
(41, '2023_01_16_065426_create_invoice_pos_sales_table', 4),
(42, '2023_01_16_071718_create_invoice_pos_sales_table', 5),
(43, '2023_01_01_075029_create_branches_table', 6),
(44, '2023_01_04_030208_create_purchase_returns_table', 6),
(45, '2023_01_04_063744_create_purchase_return_items_table', 6),
(46, '2023_01_12_041345_create_barcodes_table', 6),
(47, '2023_01_16_085305_create_pos_sale_products_table', 7),
(48, '2023_01_18_101637_create_pos_transfers_table', 8),
(49, '2023_01_18_101657_create_pos_transfer_products_table', 8),
(50, '2023_01_18_102305_create_pos_transfer_products_table', 9),
(51, '2023_01_19_082320_create_delivery_men_table', 10),
(52, '2023_01_19_083910_create_delivery_men_table', 11),
(53, '2023_01_16_054315_create_company_infos_table', 12),
(54, '2023_01_17_082645_create_warehouse_to_branches_table', 12),
(55, '2023_01_17_082753_create_warehouse_to_branch_items_table', 12),
(56, '2023_01_17_094804_create_terms_table', 12),
(57, '2023_01_18_054047_add_status_to_terms', 12),
(58, '2023_01_18_082301_add_created_by_to_terms', 12),
(59, '2023_01_18_104503_add_updated_by_to_terms', 12),
(60, '2023_01_22_034352_create_supplier_payments_table', 13),
(61, '2023_01_23_031637_create_invoice_pos_sales_table', 14),
(62, '2023_01_23_030459_add_sale_id_to_account_transactions_table', 15),
(63, '2023_01_23_042659_add_client_transaction_invoice_id_to_client_transactions_table', 16),
(64, '2023_01_23_043628_create_client_ledgers_table', 17),
(65, '2023_01_23_062615_add_columns_to_money_receipt_table', 18),
(66, '2023_01_23_064017_add_columns_to_invoice_pos_sales_table', 18),
(67, '2023_01_24_053001_add_branch_id_to_invoice_pos_sales_table', 18),
(68, '2023_01_24_102118_add_customer_type_to_invoice_pos_sales_table', 19),
(69, '2023_01_24_113408_create_invoice_returns_table', 20),
(70, '2023_01_25_120713_create_invoice_return_products_table', 20),
(71, '2023_01_26_045546_add_expense_date_to_expenses', 21),
(72, '2023_01_26_093400_create_supplier_transactions_table', 22),
(73, '2023_01_26_093740_create_supplier_ledgers_table', 23),
(74, '2023_01_30_053544_add_from_warehouse_and_to_warehouse_to_pos_transfer_products', 24),
(75, '2023_01_30_082902_add_warehouse_id_to_purchase_items', 25);

-- --------------------------------------------------------

--
-- Table structure for table `money_receipt`
--

CREATE TABLE `money_receipt` (
  `money_receipt_id` int(10) UNSIGNED NOT NULL,
  `money_receipt_account_transaction_id` bigint(20) DEFAULT NULL,
  `money_receipt_voucher_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `money_receipt_invoice_no` int(11) DEFAULT NULL,
  `money_receipt_client_id` bigint(20) DEFAULT NULL,
  `money_receipt_client_transaction_id` bigint(20) DEFAULT NULL,
  `money_receipt_payment_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `money_receipt_total_amount` bigint(20) DEFAULT NULL,
  `money_receipt_total_discount` bigint(20) DEFAULT NULL,
  `money_receipt_payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `money_receipt_payment_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `money_receipt_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `money_receipt_payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `money_receipt_has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `money_receipt_deleted_by` bigint(20) DEFAULT NULL,
  `money_receipt_created_by` bigint(20) DEFAULT NULL,
  `money_receipt_updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `money_receipt`
--

INSERT INTO `money_receipt` (`money_receipt_id`, `money_receipt_account_transaction_id`, `money_receipt_voucher_no`, `money_receipt_invoice_no`, `money_receipt_client_id`, `money_receipt_client_transaction_id`, `money_receipt_payment_to`, `money_receipt_total_amount`, `money_receipt_total_discount`, `money_receipt_payment_type`, `money_receipt_payment_date`, `money_receipt_note`, `money_receipt_payment_status`, `money_receipt_has_deleted`, `money_receipt_deleted_by`, `money_receipt_created_by`, `money_receipt_updated_by`, `created_at`, `updated_at`) VALUES
(1, 78, '23013001', 8381906, 1, 67, 'CLIENT', 70, NULL, 'CLIENT_PAYMENT', '2023-01-30', NULL, '1', 'NO', NULL, 1, NULL, '2023-01-29 21:46:36', '2023-01-29 21:46:36');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pos_sale_products`
--

CREATE TABLE `pos_sale_products` (
  `sale_product_id` int(10) UNSIGNED NOT NULL,
  `pos_sale_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `size_id` bigint(20) DEFAULT NULL,
  `color_id` bigint(20) DEFAULT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `sales_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subTotal` bigint(20) DEFAULT NULL,
  `discount_amount` bigint(20) DEFAULT NULL,
  `create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `created_by` bigint(20) DEFAULT NULL,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pos_sale_products`
--

INSERT INTO `pos_sale_products` (`sale_product_id`, `pos_sale_id`, `product_id`, `size_id`, `color_id`, `quantity`, `price`, `sales_date`, `subTotal`, `discount_amount`, `create_date`, `has_deleted`, `created_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(5, 9, 5, NULL, NULL, 10, 2400, '16-01-23', NULL, 19200, '16-01-23', 'NO', 1, NULL, '2023-01-16 05:07:46', '2023-01-16 05:07:46'),
(6, 9, 1, NULL, NULL, 1, 250, '16-01-23', NULL, 150, '16-01-23', 'NO', 1, NULL, '2023-01-16 05:07:46', '2023-01-16 05:07:46'),
(7, 10, 1, NULL, NULL, 1, 250, '17-01-23', NULL, 225, '17-01-23', 'NO', 1, NULL, '2023-01-16 21:17:41', '2023-01-16 21:17:41'),
(8, 10, 5, NULL, NULL, 15, 2400, '17-01-23', NULL, 21600, '17-01-23', 'NO', 1, NULL, '2023-01-16 21:17:41', '2023-01-16 21:17:41'),
(9, 11, 1, NULL, NULL, 1, 250, '17-01-23', NULL, 250, '17-01-23', 'NO', 1, NULL, '2023-01-16 21:18:59', '2023-01-16 21:18:59'),
(10, 15, 1, NULL, NULL, 1, 250, '17-01-23', 200, 20, '17-01-23', 'NO', 1, NULL, '2023-01-17 03:39:15', '2023-01-17 03:39:15'),
(11, 16, 1, NULL, NULL, 1, 250, '17-01-23', 200, 20, '17-01-23', 'NO', 1, NULL, '2023-01-17 03:40:47', '2023-01-17 03:40:47'),
(12, 16, 5, NULL, NULL, 15, 2400, '17-01-23', 8640, 76, '17-01-23', 'NO', 1, NULL, '2023-01-17 03:40:47', '2023-01-17 03:40:47'),
(13, 17, 1, NULL, NULL, 1, 250, '17-01-23', 225, 10, '17-01-23', 'NO', 1, NULL, '2023-01-17 04:19:54', '2023-01-17 04:19:54'),
(14, 17, 5, NULL, NULL, 10, 2400, '17-01-23', 12000, 50, '17-01-23', 'NO', 1, NULL, '2023-01-17 04:19:54', '2023-01-17 04:19:54'),
(15, 18, 5, NULL, NULL, 10, 2400, '17-01-23', 19200, 20, '17-01-23', 'NO', 1, NULL, '2023-01-17 04:22:04', '2023-01-17 04:22:04'),
(16, 18, 1, NULL, NULL, 1, 250, '17-01-23', 150, 40, '17-01-23', 'NO', 1, NULL, '2023-01-17 04:22:04', '2023-01-17 04:22:04'),
(17, 19, 5, NULL, NULL, 10, 2400, '17-01-23', 19200, 20, '17-01-23', 'NO', 1, NULL, '2023-01-17 04:51:40', '2023-01-17 04:51:40'),
(18, 19, 1, NULL, NULL, 1, 250, '17-01-23', 150, 40, '17-01-23', 'NO', 1, NULL, '2023-01-17 04:51:40', '2023-01-17 04:51:40'),
(19, 20, 1, NULL, NULL, 1, 250, '17-01-23', 200, 20, '17-01-23', 'NO', 1, NULL, '2023-01-17 05:39:40', '2023-01-17 05:39:40'),
(20, 20, 5, NULL, NULL, 10, 2400, '17-01-23', 19200, 20, '17-01-23', 'NO', 1, NULL, '2023-01-17 05:39:40', '2023-01-17 05:39:40'),
(21, 21, 5, NULL, NULL, 10, 2400, '18-01-23', 19200, 20, '18-01-23', 'NO', 1, NULL, '2023-01-18 06:32:15', '2023-01-18 06:32:15'),
(22, 22, 1, NULL, NULL, 1, 250, '18-01-23', 225, 0, '18-01-23', 'NO', 1, NULL, '2023-01-18 06:49:42', '2023-01-18 06:49:42'),
(23, 22, 5, NULL, NULL, 10, 2400, '18-01-23', 19200, 20, '18-01-23', 'NO', 1, NULL, '2023-01-18 06:49:42', '2023-01-18 06:49:42'),
(24, 23, 4, NULL, NULL, 20, 250, '18-01-23', 2750, 45, '18-01-23', 'NO', 1, NULL, '2023-01-18 07:23:03', '2023-01-18 07:23:03'),
(25, 1, 5, NULL, NULL, 10, 25, '23-01-23', 125, 50, '23-01-23', 'NO', 1, NULL, '2023-01-22 21:20:31', '2023-01-22 21:20:31'),
(26, 2, 5, NULL, NULL, 10, 25, '23-01-23', 225, 10, '23-01-23', 'NO', 1, NULL, '2023-01-22 22:04:45', '2023-01-22 22:04:45'),
(27, 3, 2, NULL, NULL, 40, 150, '23-01-23', 5400, 10, '23-01-23', 'NO', 1, NULL, '2023-01-22 22:06:19', '2023-01-22 22:06:19'),
(28, 4, 2, NULL, NULL, 40, 150, '23-01-23', 3000, 50, '23-01-23', 'NO', 1, NULL, '2023-01-22 22:31:23', '2023-01-22 22:31:23'),
(29, 5, 2, NULL, NULL, 40, 150, '23-01-23', 4800, 20, '23-01-23', 'NO', 1, NULL, '2023-01-22 22:32:19', '2023-01-22 22:32:19'),
(30, 6, 5, NULL, NULL, 10, 25, '23-01-23', 237, 5, '23-01-23', 'NO', 1, NULL, '2023-01-22 22:37:56', '2023-01-22 22:37:56'),
(31, 7, 5, NULL, NULL, 10, 25, '23-01-23', 225, 10, '23-01-23', 'NO', 1, NULL, '2023-01-22 22:47:17', '2023-01-22 22:47:17'),
(32, 8, 2, NULL, NULL, 10, 150, '23-01-23', 1350, 10, '23-01-23', 'NO', 1, NULL, '2023-01-22 22:52:16', '2023-01-22 22:52:16'),
(33, 9, 5, NULL, NULL, 10, 25, '23-01-23', 225, 10, '23-01-23', 'NO', 1, NULL, '2023-01-22 22:53:48', '2023-01-22 22:53:48'),
(34, 10, 5, NULL, NULL, 10, 25, '23-01-23', 237, 5, '23-01-23', 'NO', 1, NULL, '2023-01-22 22:57:39', '2023-01-22 22:57:39'),
(35, 11, 2, NULL, NULL, 40, 150, '23-01-23', 6000, 0, '23-01-23', 'NO', 1, NULL, '2023-01-22 22:59:17', '2023-01-22 22:59:17'),
(36, 12, 5, NULL, NULL, 10, 25, '23-01-23', 200, 20, '23-01-23', 'NO', 1, NULL, '2023-01-22 23:52:48', '2023-01-22 23:52:48'),
(37, 13, 5, NULL, NULL, 10, 25, '23-01-23', 225, 10, '23-01-23', 'NO', 1, NULL, '2023-01-22 23:56:40', '2023-01-22 23:56:40'),
(38, 14, 2, NULL, NULL, 40, 150, '23-01-23', 5400, 10, '23-01-23', 'NO', 1, NULL, '2023-01-22 23:58:13', '2023-01-22 23:58:13'),
(39, 15, 2, NULL, NULL, 40, 1500, '23-01-23', 60000, 0, '23-01-23', 'NO', 1, NULL, '2023-01-23 00:45:21', '2023-01-23 00:45:21'),
(40, 16, 2, NULL, NULL, 40, 150, '23-01-23', 6000, 0, '23-01-23', 'NO', 1, NULL, '2023-01-23 03:17:16', '2023-01-23 03:17:16'),
(41, 17, 8, NULL, NULL, 20, 80, '23-01-23', 1600, 0, '23-01-23', 'NO', 1, NULL, '2023-01-23 03:46:51', '2023-01-23 03:46:51'),
(42, 18, 8, NULL, NULL, 40, 80, '23-01-23', 3200, 0, '23-01-23', 'NO', 1, NULL, '2023-01-23 06:07:49', '2023-01-23 06:07:49'),
(43, 19, 8, NULL, NULL, 20, 80, '23-01-23', 1600, 0, '23-01-23', 'NO', 1, NULL, '2023-01-23 06:14:31', '2023-01-23 06:14:31'),
(44, 20, 8, NULL, NULL, 20, 80, '23-01-23', 1600, 0, '23-01-23', 'NO', 1, NULL, '2023-01-23 06:14:37', '2023-01-23 06:14:37'),
(45, 21, 8, NULL, NULL, -20, 80, '23-01-23', -1600, 0, '23-01-23', 'NO', 1, NULL, '2023-01-23 06:16:04', '2023-01-23 06:16:04'),
(46, 22, 10, NULL, NULL, 4, 40, '24-01-23', 158, 1, '24-01-23', 'NO', 1, NULL, '2023-01-23 23:37:58', '2023-01-23 23:37:58'),
(47, 23, 10, NULL, NULL, 1, 40, '24-01-23', 40, NULL, '24-01-23', 'NO', 1, NULL, '2023-01-23 23:41:32', '2023-01-23 23:41:32'),
(48, 24, 11, NULL, NULL, 25, 80, '24-01-23', 2000, 0, '24-01-23', 'NO', 1, NULL, '2023-01-24 00:33:57', '2023-01-24 00:33:57'),
(50, 26, 11, NULL, NULL, 5, 80, '24-01-23', 240, 40, '24-01-23', 'NO', 1, NULL, '2023-01-24 02:48:17', '2023-01-24 02:48:17'),
(51, 28, 11, NULL, NULL, 5, 80, '24-01-23', 280, 30, '24-01-23', 'NO', 1, NULL, '2023-01-24 04:00:12', '2023-01-24 04:00:12'),
(52, 29, 11, NULL, NULL, 12, 80, '24-01-23', 48, 95, '24-01-23', 'NO', 1, NULL, '2023-01-24 04:00:45', '2023-01-24 04:00:45'),
(53, 30, 11, NULL, NULL, 1, 80, '24-01-23', 64, 20, '24-01-23', 'NO', 1, NULL, '2023-01-24 04:26:06', '2023-01-24 04:26:06'),
(54, 31, 12, NULL, NULL, 10, 40, '25-01-23', 360, 10, '25-01-23', 'NO', 1, NULL, '2023-01-25 00:37:02', '2023-01-25 00:37:02'),
(55, 32, 11, NULL, NULL, 1, 80, '26-01-23', 72, 10, '26-01-23', 'NO', 1, NULL, '2023-01-25 21:26:32', '2023-01-25 21:26:32'),
(56, 33, 14, NULL, NULL, 8, 40, '26-01-23', 240, 25, '26-01-23', 'NO', 1, NULL, '2023-01-25 21:54:58', '2023-01-25 21:54:58'),
(57, 35, 14, NULL, NULL, 2, 40, '29-01-23', 80, 0, '29-01-23', 'NO', 1, NULL, '2023-01-28 23:12:21', '2023-01-28 23:12:21'),
(58, 36, NULL, NULL, NULL, NULL, NULL, '29-01-23', NULL, NULL, '29-01-23', 'NO', 1, NULL, '2023-01-29 03:42:20', '2023-01-29 03:42:20'),
(59, 37, NULL, NULL, NULL, NULL, NULL, '2023-01-29', NULL, 0, '2023-01-29', 'NO', 1, NULL, '2023-01-29 04:21:31', '2023-01-29 04:21:31'),
(60, 38, NULL, NULL, NULL, NULL, NULL, '2023-01-29', NULL, 0, '2023-01-29', 'NO', 1, NULL, '2023-01-29 04:39:21', '2023-01-29 04:39:21'),
(61, 38, 2, NULL, NULL, NULL, 350, '2023-01-29', NULL, NULL, '2023-01-29', 'NO', 1, NULL, '2023-01-29 04:39:21', '2023-01-29 04:39:21'),
(62, 39, NULL, NULL, NULL, NULL, NULL, '2023-01-29', NULL, 0, '2023-01-29', 'NO', 1, NULL, '2023-01-29 04:39:32', '2023-01-29 04:39:32'),
(63, 40, NULL, NULL, NULL, NULL, NULL, '2023-01-29', NULL, 0, '2023-01-29', 'NO', 1, NULL, '2023-01-29 05:38:50', '2023-01-29 05:38:50'),
(64, 41, NULL, NULL, NULL, NULL, NULL, '2023-01-29', NULL, 0, '2023-01-29', 'NO', 1, NULL, '2023-01-29 05:55:25', '2023-01-29 05:55:25'),
(65, 42, NULL, NULL, NULL, NULL, NULL, '2023-01-29', NULL, 0, '2023-01-29', 'NO', 1, NULL, '2023-01-29 05:55:35', '2023-01-29 05:55:35'),
(66, 43, 14, NULL, NULL, 1, 40, '2023-01-30', 32, 20, '2023-01-30', 'NO', 1, NULL, '2023-01-29 21:13:11', '2023-01-29 21:13:11'),
(67, 44, 14, NULL, NULL, 1, 40, '2023-01-30', 30, 25, '2023-01-30', 'NO', 1, NULL, '2023-01-29 21:19:51', '2023-01-29 21:19:51'),
(68, 45, 12, NULL, NULL, 1, 40, '2023-01-30', 32, 20, '2023-01-30', 'NO', 1, NULL, '2023-01-29 21:25:48', '2023-01-29 21:25:48'),
(69, 46, 10, NULL, NULL, 11, 40, '2023-01-30', 352, 20, '2023-01-30', 'NO', 1, NULL, '2023-01-29 21:37:37', '2023-01-29 21:37:37'),
(70, 47, 15, NULL, NULL, 10, 20, '2023-01-30', 180, 10, '2023-01-30', 'NO', 1, NULL, '2023-01-29 21:44:42', '2023-01-29 21:44:42'),
(71, 48, 15, NULL, NULL, 5, 175, '2023-01-30', 700, 20, '2023-01-30', 'NO', 1, NULL, '2023-01-30 00:50:10', '2023-01-30 00:50:10');

-- --------------------------------------------------------

--
-- Table structure for table `pos_transfers`
--

CREATE TABLE `pos_transfers` (
  `transfer_id` int(10) UNSIGNED NOT NULL,
  `transferDate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transferNo` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fromWarehouseID` bigint(20) DEFAULT NULL,
  `toWarehouseID` bigint(20) DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `created_by` bigint(20) DEFAULT NULL,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pos_transfers`
--

INSERT INTO `pos_transfers` (`transfer_id`, `transferDate`, `transferNo`, `fromWarehouseID`, `toWarehouseID`, `note`, `create_date`, `has_deleted`, `created_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(4, '18-01-2023', 'TRNAS_5343010000', 2, NULL, NULL, '18-01-2023', 'NO', 1, NULL, '2023-01-18 05:26:33', '2023-01-22 05:59:02'),
(5, '19-01-2023', 'TRNAS_4940010000', 1, 2, NULL, '19-01-2023', 'NO', 1, NULL, '2023-01-18 22:27:09', '2023-01-18 22:27:09'),
(6, '19-01-2023', 'TRNAS_3634810000', 1, 4, NULL, '19-01-2023', 'NO', 1, NULL, '2023-01-18 22:44:32', '2023-01-18 22:44:32'),
(7, '19-01-2023', 'TRNAS_8457410000', 1, 2, 'faefaeef', '19-01-2023', 'NO', 1, NULL, '2023-01-18 22:47:12', '2023-01-18 22:47:12'),
(8, '19-01-2023', 'TRNAS_4549110000', 1, 2, NULL, '19-01-2023', 'NO', 1, NULL, '2023-01-18 22:47:42', '2023-01-18 22:47:42'),
(9, '19-01-2023', 'TRNAS_5664310000', 1, NULL, NULL, '19-01-2023', 'NO', 1, NULL, '2023-01-18 22:50:52', '2023-01-22 20:50:47'),
(10, '23-01-2023', 'TRNAS_3689210000', 3, 4, NULL, '23-01-2023', 'NO', 1, NULL, '2023-01-23 07:43:49', '2023-01-23 07:43:49'),
(11, '24-01-2023', 'TRNAS_3916910000', 3, 4, NULL, '24-01-2023', 'NO', 1, NULL, '2023-01-23 21:44:17', '2023-01-23 21:44:17'),
(12, '29-01-2023', 'TRNAS_3205910000', 1, 4, 'fufnajufa', '29-01-2023', 'NO', 1, NULL, '2023-01-28 22:41:52', '2023-01-28 22:41:52'),
(13, '30-01-2023', 'TRNAS_8404010000', 4, 3, NULL, '30-01-2023', 'NO', 1, NULL, '2023-01-29 22:50:49', '2023-01-29 22:50:49'),
(14, '30-01-2023', 'TRNAS_404210000', 1, 3, NULL, '30-01-2023', 'NO', 1, NULL, '2023-01-29 23:40:06', '2023-01-29 23:40:06'),
(15, '30-01-2023', 'TRNAS_7617210000', 1, 3, NULL, '30-01-2023', 'NO', 1, NULL, '2023-01-29 23:41:20', '2023-01-29 23:41:20'),
(16, '30-01-2023', 'TRNAS_4214710000', 1, 3, NULL, '30-01-2023', 'NO', 1, NULL, '2023-01-29 23:48:44', '2023-01-29 23:48:44'),
(17, '30-01-2023', 'TRNAS_2059410000', 1, 2, NULL, '30-01-2023', 'NO', 1, NULL, '2023-01-30 02:58:31', '2023-01-30 02:58:31'),
(18, '30-01-2023', 'TRNAS_2839610000', 1, 3, NULL, '30-01-2023', 'NO', 1, NULL, '2023-01-30 02:58:50', '2023-01-30 02:58:50'),
(19, '30-01-2023', 'TRNAS_7535010000', 4, 1, NULL, '30-01-2023', 'NO', 1, NULL, '2023-01-30 03:46:30', '2023-01-30 03:46:30');

-- --------------------------------------------------------

--
-- Table structure for table `pos_transfer_products`
--

CREATE TABLE `pos_transfer_products` (
  `transfer_product_id` int(10) UNSIGNED NOT NULL,
  `transferNo` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `from_warehouse` bigint(20) DEFAULT NULL,
  `to_warehouse` bigint(20) DEFAULT NULL,
  `create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `created_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pos_transfer_products`
--

INSERT INTO `pos_transfer_products` (`transfer_product_id`, `transferNo`, `product_id`, `quantity`, `from_warehouse`, `to_warehouse`, `create_date`, `has_deleted`, `created_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(4, 'TRNAS_5343010000', 5, 50, NULL, NULL, '18-01-2023', 'NO', 1, NULL, '2023-01-18 05:26:33', '2023-01-22 05:59:02'),
(5, 'TRNAS_5343010000', 1, 50, NULL, NULL, '18-01-2023', 'NO', 1, NULL, '2023-01-18 05:26:33', '2023-01-22 05:59:02'),
(6, 'TRNAS_4940010000', 1, 1, NULL, NULL, '19-01-2023', 'NO', 1, NULL, '2023-01-18 22:27:09', '2023-01-18 22:27:09'),
(7, 'TRNAS_3634810000', 5, 20, NULL, NULL, '19-01-2023', 'NO', 1, NULL, '2023-01-18 22:44:32', '2023-01-18 22:44:32'),
(8, 'TRNAS_8457410000', 1, 1, NULL, NULL, '19-01-2023', 'NO', 1, NULL, '2023-01-18 22:47:12', '2023-01-18 22:47:12'),
(9, 'TRNAS_4549110000', 5, 16, NULL, NULL, '19-01-2023', 'NO', 1, NULL, '2023-01-18 22:47:42', '2023-01-18 22:47:42'),
(10, 'TRNAS_4549110000', 1, 1, NULL, NULL, '19-01-2023', 'NO', 1, NULL, '2023-01-18 22:47:42', '2023-01-18 22:47:42'),
(11, 'TRNAS_5664310000', 1, 1, NULL, NULL, '19-01-2023', 'NO', 1, NULL, '2023-01-18 22:50:52', '2023-01-18 22:50:52'),
(12, 'TRNAS_5664310000', 5, 15, NULL, NULL, '19-01-2023', 'NO', 1, NULL, '2023-01-18 22:50:52', '2023-01-18 22:50:52'),
(13, 'TRNAS_5664310000', 2, 48, NULL, NULL, '19-01-2023', 'NO', 1, NULL, '2023-01-18 22:50:52', '2023-01-18 22:50:52'),
(14, 'TRNAS_3689210000', 9, 10, NULL, NULL, '23-01-2023', 'NO', 1, NULL, '2023-01-23 07:43:49', '2023-01-23 07:43:49'),
(15, 'TRNAS_3916910000', 10, 100, NULL, NULL, '24-01-2023', 'NO', 1, NULL, '2023-01-23 21:44:17', '2023-01-23 21:44:17'),
(16, 'TRNAS_3205910000', 5, 10, NULL, NULL, '29-01-2023', 'NO', 1, NULL, '2023-01-28 22:41:52', '2023-01-28 22:41:52'),
(17, 'TRNAS_8404010000', 15, 10, NULL, NULL, '30-01-2023', 'NO', 1, NULL, '2023-01-29 22:50:49', '2023-01-29 22:50:49'),
(18, 'TRNAS_4214710000', 16, 2, 1, 3, '30-01-2023', 'NO', 1, NULL, '2023-01-29 23:48:44', '2023-01-29 23:48:44'),
(19, 'TRNAS_2059410000', 17, 20, 1, 2, '30-01-2023', 'NO', 1, NULL, '2023-01-30 02:58:31', '2023-01-30 02:58:31'),
(20, 'TRNAS_2839610000', 17, 10, 1, 3, '30-01-2023', 'NO', 1, NULL, '2023-01-30 02:58:50', '2023-01-30 02:58:50'),
(21, 'TRNAS_7535010000', 18, 20, 4, 1, '30-01-2023', 'NO', 1, NULL, '2023-01-30 03:46:30', '2023-01-30 03:46:30');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_entry_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_retail_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_wholesale_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `product_is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `product_created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_entry_id`, `product_category`, `product_code`, `product_retail_price`, `product_wholesale_price`, `product_status`, `product_is_deleted`, `product_created_by`, `product_updated_by`, `product_deleted_by`, `product_created_at`, `created_at`, `updated_at`) VALUES
(1, 'Horlicks', 'Horlicks32635', '1', '2301121', '250', '300', '1', 'NO', '1', NULL, NULL, '2023-01-12', '2023-01-11 18:00:00', '2023-01-11 21:57:03'),
(2, 'Sandwich', 'Sandwich28516', '1', '2301122', '350', '450', '1', 'NO', '1', NULL, NULL, '2023-01-12', '2023-01-11 18:00:00', '2023-01-11 21:57:26'),
(3, 'Corn', 'Corn59972', '1', '2301123', '175', '225', '1', 'NO', '1', NULL, NULL, '2023-01-12', '2023-01-11 18:00:00', '2023-01-11 21:57:48'),
(4, 'samsung', 'samsung61760', '2', '2301124', '1200', '1500', '1', 'NO', '1', NULL, NULL, '2023-01-12', '2023-01-11 18:00:00', '2023-01-11 21:58:09'),
(5, 'Nokia', 'Nokia54140', '2', '2301125', '2400', '2800', '1', 'NO', '1', NULL, NULL, '2023-01-12', '2023-01-11 18:00:00', '2023-01-11 21:58:26'),
(6, 'oppo', 'oppo84863', '2', '2301126', '9500', '10000', '1', 'NO', '1', NULL, NULL, '2023-01-12', '2023-01-11 18:00:00', '2023-01-11 21:58:41'),
(7, 'Calculator FX', 'Calculator FX66471', '1', '2301181', '80', '100', '1', 'NO', '1', NULL, NULL, '2023-01-18', '2023-01-17 18:00:00', '2023-01-18 06:56:28'),
(8, 'Egg', 'Egg59303', '1', '2301231', '40', '90', '1', 'NO', '1', NULL, NULL, '2023-01-23', '2023-01-22 18:00:00', '2023-01-23 03:43:30'),
(9, 'oneplus', 'oneplus66823', '2', '2301232', '75', '95', '1', 'NO', '1', NULL, NULL, '2023-01-23', '2023-01-22 18:00:00', '2023-01-23 07:40:47'),
(10, 'Subway', 'Subway71172', '1', '2301241', '40', '50', '1', 'NO', '1', NULL, NULL, '2023-01-24', '2023-01-23 18:00:00', '2023-01-23 21:42:31'),
(11, 'Burger', 'Burger30961', '1', '2301242', '80', '100', '1', 'NO', '1', NULL, NULL, '2023-01-24', '2023-01-23 18:00:00', '2023-01-24 00:22:36'),
(12, 'fuchka', 'fuchka41432', '1', '2301251', '40', '50', '1', 'NO', '1', NULL, NULL, '2023-01-25', '2023-01-24 18:00:00', '2023-01-25 00:31:59'),
(13, 'walton', 'walton52324', '2', '2301261', '80', '100', '1', 'NO', '1', NULL, NULL, '2023-01-26', '2023-01-25 18:00:00', '2023-01-25 21:51:32'),
(14, 'lava', 'lava82088', '2', '2301262', '40', '50', '1', 'NO', '1', NULL, NULL, '2023-01-26', '2023-01-25 18:00:00', '2023-01-25 21:51:53'),
(15, 'Chesse', 'Chesse56412', '1', '2301301', '175', '200', '1', 'NO', '1', NULL, NULL, '2023-01-30', '2023-01-29 18:00:00', '2023-01-29 21:40:44'),
(16, 'Butter', 'Butter19836', '1', '2301302', '40', '50', '1', 'NO', '1', NULL, NULL, '2023-01-30', '2023-01-29 18:00:00', '2023-01-29 23:38:50'),
(17, 'Achar', 'Achar70623', '1', '2301303', '40', '50', '1', 'NO', '1', NULL, NULL, '2023-01-30', '2023-01-29 18:00:00', '2023-01-30 02:34:55'),
(18, 'biriyani', 'biriyani67480', '1', '2301304', '40', '50', '1', 'NO', '1', NULL, NULL, '2023-01-30', '2023-01-29 18:00:00', '2023-01-30 03:44:46'),
(19, 'wfafaaf', 'wfafaaf2461', '1', '2301305', '40', '50', '1', 'NO', '1', NULL, NULL, '2023-01-30', '2023-01-29 18:00:00', '2023-01-30 04:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `product_category_id` int(10) UNSIGNED NOT NULL,
  `product_category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_category_entry_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_category_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `product_category_is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `product_category_created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_category_updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_category_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`product_category_id`, `product_category_name`, `product_category_entry_id`, `product_category_status`, `product_category_is_deleted`, `product_category_created_by`, `product_category_updated_by`, `product_category_deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'Food', 'Food51026', '1', 'NO', '1', NULL, NULL, '2023-01-11 18:00:00', '2023-01-11 21:56:22'),
(2, 'Mobile', 'Mobile59292', '1', 'NO', '1', NULL, NULL, '2023-01-11 18:00:00', '2023-01-11 21:56:37');

-- --------------------------------------------------------

--
-- Table structure for table `product_transfer`
--

CREATE TABLE `product_transfer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `purchase_id` int(10) UNSIGNED NOT NULL,
  `purchase_warehouse_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_supplier_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_po_reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_payment_terms` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_subtotal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_net_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `purchase_is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `purchase_created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `purchase_created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purchase_id`, `purchase_warehouse_id`, `purchase_supplier_id`, `purchase_number`, `purchase_po_reference`, `purchase_payment_terms`, `purchase_date`, `due_date`, `purchase_note`, `purchase_quantity`, `purchase_subtotal`, `purchase_discount`, `purchase_net_total`, `purchase_status`, `purchase_is_deleted`, `purchase_created_by`, `purchase_updated_by`, `purchase_deleted_by`, `created_at`, `updated_at`, `purchase_created_at`) VALUES
(1, '1', '1', '2301121', 'nai', 'no terms', '2023-01-05', '2023-01-13', NULL, '1.00', '150.00', '0', '150.00', '1', 'NO', '1', NULL, NULL, '2023-01-11 18:00:00', '2023-01-11 22:02:58', '2023/01/12'),
(2, '1', '1', '2301121', 'ki korba?', 'nai kono terms', '2023-01-12', '2023-01-20', NULL, '20.00', '500.00', '0', '500.00', '1', 'NO', '1', NULL, NULL, '2023-01-11 18:00:00', '2023-01-12 00:39:34', '2023/01/12'),
(3, '2', '1', '2301181', 'feaafefaefe', 'fafaefe', '2023-01-04', '2023-02-10', 'this is new', '20.00', '7000.00', '0', '7000.00', '1', 'NO', '1', NULL, NULL, '2023-01-17 18:00:00', '2023-01-18 07:00:21', '2023/01/18'),
(4, '2', '1', '2301182', 'aaffea', 'afefeafea', '2023-01-11', '2023-01-28', 'thjafnjfaf', '20.00', '900.00', '0', '900.00', '1', 'NO', '1', NULL, NULL, '2023-01-17 18:00:00', '2023-01-18 07:09:05', '2023/01/18'),
(5, '3', '1', '2301183', 'aafafhfab', 'bfahjabhfab', '2023-01-05', '2023-02-11', NULL, '70.00', '13000.00', '0', '13000.00', '1', 'NO', '1', NULL, NULL, '2023-01-17 18:00:00', '2023-01-18 07:13:02', '2023/01/18'),
(6, '4', '1', '2301184', '1f01af15', 'f1a5fa15af1', '2023-01-04', '2023-02-04', 'fahjfnajfak', '50.00', '12500.00', '0', '12500.00', '1', 'NO', '1', NULL, NULL, '2023-01-17 18:00:00', '2023-01-18 07:19:59', '2023/01/18'),
(7, '1', '1', '2301191', 'feafaef', 'feqeffefe', '2023-01-19', '2023-02-10', 'efeaafefaf', '120', '18000', '500', '17500', '1', 'NO', '1', '1', NULL, '2023-01-18 18:00:00', '2023-01-25 18:00:00', '2023/01/19'),
(8, '2', '1', '2301221', 'no ref', '7fa4f5a45a', '2023-01-15', '2023-02-03', NULL, '25.00', '750.00', '0', '750.00', '1', 'NO', '1', NULL, NULL, '2023-01-21 18:00:00', '2023-01-22 00:23:50', '2023/01/22'),
(9, '1', '1', '2301222', 'afjfanj', 'afefafe', '2023-01-22', '2023-01-25', NULL, '590.00', '7300.00', '0', '7300.00', '1', 'NO', '1', NULL, NULL, '2023-01-21 18:00:00', '2023-01-22 02:39:13', '2023/01/22'),
(10, '3', '1', '2301223', 'ttttt', 'ttttt', '2023-01-22', '2023-01-26', NULL, '2.00', '90.00', '0', '90.00', '1', 'NO', '1', NULL, NULL, '2023-01-21 18:00:00', '2023-01-22 02:40:45', '2023/01/22'),
(11, '2', '1', '2301231', 'afgaf', 'aaffa', '2023-01-16', '2023-01-25', NULL, '30.00', '750.00', '0', '750.00', '1', 'NO', '1', NULL, NULL, '2023-01-22 18:00:00', '2023-01-22 21:57:32', '2023/01/23'),
(12, '2', '1', '2301232', 'feae', 'afafe', '2023-01-27', '2023-01-05', NULL, '80.00', '6400.00', '0', '6400.00', '1', 'NO', '1', NULL, NULL, '2023-01-22 18:00:00', '2023-01-23 03:44:18', '2023/01/23'),
(13, '3', '1', '2301233', '955f84fa5', '5fa541af5f415', '2023-01-19', '2023-02-10', NULL, '50.00', '500000.00', '0', '500000.00', '1', 'NO', '1', NULL, NULL, '2023-01-22 18:00:00', '2023-01-23 07:41:40', '2023/01/23'),
(14, '3', '1', '2301241', '4185514', '5fa15fa15fa', '2023-01-24', '2023-01-28', NULL, '150.00', '12000.00', '0', '12000.00', '1', 'NO', '1', NULL, NULL, '2023-01-23 18:00:00', '2023-01-23 21:43:28', '2023/01/24'),
(15, '2', '1', '2301242', '5fa5fa145fa', '15fa1af51fa5', '2023-01-19', '2023-01-26', 'burger kinlam', '100.00', '8000.00', '0', '8000.00', '1', 'NO', '1', NULL, NULL, '2023-01-23 18:00:00', '2023-01-24 00:23:27', '2023/01/24'),
(16, '4', NULL, '2301251', NULL, NULL, NULL, NULL, NULL, '1.00', '100.00', '20', '80.00', '1', 'NO', '1', NULL, NULL, '2023-01-24 18:00:00', '2023-01-24 22:21:50', '2023/01/25'),
(17, '4', '1', '2301252', '5ffa5f1a5', 'fa15faf15', '2023-01-25', '2023-01-25', NULL, '10.00', '500.00', '0', '500.00', '1', 'NO', '1', NULL, NULL, '2023-01-24 18:00:00', '2023-01-25 00:33:12', '2023/01/25'),
(18, '2', '1', '2301261', '4f5fafa5', 'fa45a4fa5f', '2023-01-26', '2023-01-27', NULL, '20.00', '1100.00', '0', '1100.00', '1', 'NO', '1', NULL, NULL, '2023-01-25 18:00:00', '2023-01-25 21:52:47', '2023/01/26'),
(19, NULL, NULL, '2301291', NULL, NULL, NULL, NULL, NULL, '0.00', NULL, '0', NULL, '1', 'NO', '1', NULL, NULL, '2023-01-28 18:00:00', '2023-01-28 20:49:09', '2023/01/29'),
(20, '4', '1', '2301301', 'affafa', 'afaffa', '2023-01-31', '2023-01-27', 'no discount', '50.00', '10000.00', '0', '10000.00', '1', 'NO', '1', NULL, NULL, '2023-01-29 18:00:00', '2023-01-29 21:41:55', '2023/01/30'),
(21, '1', '1', '2301302', 'fafa', 'wfefg', '2023-02-11', '2023-02-09', NULL, '10.00', '500.00', '0', '500.00', '1', 'NO', '1', NULL, NULL, '2023-01-29 18:00:00', '2023-01-29 23:39:31', '2023/01/30'),
(22, '1', '1', '2301303', '6fa5a25fa', '1f5a1fa5fa1', '2023-01-30', '2023-02-03', NULL, '50.00', '2500.00', '0', '2500.00', '1', 'NO', '1', NULL, NULL, '2023-01-29 18:00:00', '2023-01-30 02:35:33', '2023/01/30'),
(23, '4', '1', '2301304', 'fa485fa45', 'fa51a5fa', '2023-01-30', '2023-01-31', NULL, '100.00', '5000.00', '0', '5000.00', '1', 'NO', '1', NULL, NULL, '2023-01-29 18:00:00', '2023-01-30 03:45:39', '2023/01/30'),
(24, '2', '1', '2301305', 'fa1', '1afs54fa1f5', '2023-01-30', '2023-02-03', NULL, '50.00', '500.00', '0', '500.00', '1', 'NO', '1', NULL, NULL, '2023-01-29 18:00:00', '2023-01-30 04:45:55', '2023/01/30'),
(25, '3', '1', '2301306', 'afaaffa', 'fefaeafefe', '2023-01-30', '2023-02-04', NULL, '50.00', '1250.00', '0', '1250.00', '1', 'NO', '1', NULL, NULL, '2023-01-29 18:00:00', '2023-01-30 06:14:51', '2023/01/30'),
(26, '1', '1', '2301307', 'afefefe', 'feafeafea', '2023-01-26', '2023-02-04', NULL, '50.00', '1250.00', '0', '1250.00', '1', 'NO', '1', NULL, NULL, '2023-01-29 18:00:00', '2023-01-30 06:16:17', '2023/01/30'),
(27, '4', '1', '2301308', 'afafaeefae', 'effeafae', '2023-01-26', '2023-01-27', NULL, '20.00', '5000.00', '0', '5000.00', '1', 'NO', '1', NULL, NULL, '2023-01-29 18:00:00', '2023-01-30 06:18:23', '2023/01/30'),
(28, '4', '1', '2301309', 'feafea', 'fefaefeafe', '2023-01-30', '2023-01-31', NULL, '50.00', '5000.00', '0', '5000.00', '1', 'NO', '1', NULL, NULL, '2023-01-29 18:00:00', '2023-01-30 06:19:12', '2023/01/30'),
(29, '3', '1', '23013010', 'faafe', 'efaafefae', '2023-01-30', '2023-02-01', NULL, '105.00', '551775.00', '0', '551775.00', '1', 'NO', '1', NULL, NULL, '2023-01-29 18:00:00', '2023-01-30 06:29:24', '2023/01/30'),
(30, '4', '1', '23013011', 'f10e4fae1f', 'f51af5f15', '2023-01-18', '2023-02-03', NULL, '50.00', '12500.00', '0', '12500.00', '1', 'NO', '1', NULL, NULL, '2023-01-29 18:00:00', '2023-01-30 06:36:27', '2023/01/30'),
(31, '1', '1', '23013012', 'faafe', 'feaeffe', '2023-02-03', '2023-02-03', NULL, '40.00', '10000.00', '0', '10000.00', '1', 'NO', '1', NULL, NULL, '2023-01-29 18:00:00', '2023-01-30 06:36:48', '2023/01/30');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_items`
--

CREATE TABLE `purchase_items` (
  `purchase_items_id` int(10) UNSIGNED NOT NULL,
  `purchase_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_product_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_product_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_product_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_product_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_product_total_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_items`
--

INSERT INTO `purchase_items` (`purchase_items_id`, `purchase_id`, `purchase_product_id`, `purchase_product_size`, `purchase_product_color`, `purchase_product_quantity`, `purchase_product_price`, `purchase_product_total_price`, `warehouse_id`, `created_at`, `updated_at`) VALUES
(1, '1', '1', NULL, NULL, '1', '150', '150.00', NULL, '2023-01-11 18:00:00', '2023-01-11 22:02:58'),
(2, '2', '5', NULL, NULL, '20', '25', '500.00', NULL, '2023-01-11 18:00:00', '2023-01-12 00:39:34'),
(3, NULL, '4', NULL, NULL, '10', '50', '500.00', NULL, '2023-01-17 18:00:00', '2023-01-18 07:09:05'),
(4, NULL, '2', NULL, NULL, '10', '40', '400.00', NULL, '2023-01-17 18:00:00', '2023-01-18 07:09:05'),
(5, NULL, '4', NULL, NULL, '20', '150', '3000.00', NULL, '2023-01-17 18:00:00', '2023-01-18 07:13:02'),
(6, NULL, '1', NULL, NULL, '50', '200', '10000.00', NULL, '2023-01-17 18:00:00', '2023-01-18 07:13:02'),
(7, '6', '4', NULL, NULL, '50', '250', '12500.00', NULL, '2023-01-17 18:00:00', '2023-01-18 07:19:59'),
(9, NULL, NULL, NULL, NULL, '25', '30', '750.00', NULL, '2023-01-21 18:00:00', '2023-01-22 00:23:50'),
(10, NULL, NULL, NULL, NULL, '450', '10', '4500.00', NULL, '2023-01-21 18:00:00', '2023-01-22 02:39:13'),
(11, NULL, NULL, NULL, NULL, '140', '20', '2800.00', NULL, '2023-01-21 18:00:00', '2023-01-22 02:39:13'),
(12, NULL, NULL, NULL, NULL, '1', '45', '45.00', NULL, '2023-01-21 18:00:00', '2023-01-22 02:40:45'),
(13, NULL, NULL, NULL, NULL, '1', '45', '45.00', NULL, '2023-01-21 18:00:00', '2023-01-22 02:40:45'),
(14, NULL, NULL, NULL, NULL, '30', '25', '750.00', NULL, '2023-01-22 18:00:00', '2023-01-22 21:57:32'),
(15, '12', '8', NULL, NULL, '80', '80', '6400.00', NULL, '2023-01-22 18:00:00', '2023-01-23 03:44:18'),
(16, '13', '9', NULL, NULL, '50', '10000', '500000.00', NULL, '2023-01-22 18:00:00', '2023-01-23 07:41:40'),
(17, '14', '10', NULL, NULL, '150', '80', '12000.00', NULL, '2023-01-23 18:00:00', '2023-01-23 21:43:28'),
(18, '15', '11', NULL, NULL, '100', '80', '8000.00', NULL, '2023-01-23 18:00:00', '2023-01-24 00:23:27'),
(19, '16', '10', NULL, NULL, '1', '100', '100.00', NULL, '2023-01-24 18:00:00', '2023-01-24 22:21:50'),
(20, '17', '12', NULL, NULL, '10', '50', '500.00', NULL, '2023-01-24 18:00:00', '2023-01-25 00:33:12'),
(21, '18', '13', NULL, NULL, '10', '50', '500.00', NULL, '2023-01-25 18:00:00', '2023-01-25 21:52:47'),
(22, '18', '14', NULL, NULL, '10', '60', '600.00', NULL, '2023-01-25 18:00:00', '2023-01-25 21:52:47'),
(23, '7', '2', NULL, NULL, '120', '150', '18000', NULL, '2023-01-25 18:00:00', NULL),
(24, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-25 18:00:00', NULL),
(25, '20', '15', NULL, NULL, '50', '200', '10000.00', NULL, '2023-01-29 18:00:00', '2023-01-29 21:41:55'),
(26, '21', '16', NULL, NULL, '10', '50', '500.00', NULL, '2023-01-29 18:00:00', '2023-01-29 23:39:31'),
(27, '22', '17', NULL, NULL, '50', '50', '2500.00', 1, '2023-01-29 18:00:00', '2023-01-30 02:35:33'),
(28, '23', '18', NULL, NULL, '100', '50', '5000.00', 4, '2023-01-29 18:00:00', '2023-01-30 03:45:39'),
(29, '24', '19', NULL, NULL, '50', '10', '500.00', NULL, '2023-01-29 18:00:00', '2023-01-30 04:45:55'),
(30, '25', '14', NULL, NULL, '50', '25', '1250.00', NULL, '2023-01-29 18:00:00', '2023-01-30 06:14:51'),
(31, '26', '12', NULL, NULL, '50', '25', '1250.00', NULL, '2023-01-29 18:00:00', '2023-01-30 06:16:17'),
(32, '27', '7', NULL, NULL, '20', '250', '5000.00', NULL, '2023-01-29 18:00:00', '2023-01-30 06:18:23'),
(33, '28', '10', NULL, NULL, '50', '100', '5000.00', NULL, '2023-01-29 18:00:00', '2023-01-30 06:19:12'),
(34, '29', '5', NULL, NULL, '105', '5255', '551775.00', NULL, '2023-01-29 18:00:00', '2023-01-30 06:29:24'),
(35, '30', '18', NULL, NULL, '50', '250', '12500.00', NULL, '2023-01-29 18:00:00', '2023-01-30 06:36:27'),
(36, '31', '19', NULL, NULL, '40', '250', '10000.00', NULL, '2023-01-29 18:00:00', '2023-01-30 06:36:48');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_returns`
--

CREATE TABLE `purchase_returns` (
  `purchase_return_id` int(10) UNSIGNED NOT NULL,
  `purchase_return_supplier_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_return_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_total_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_return_total_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_subtotal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_return_subtotal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_return_discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_net_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_return_net_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_return_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `purchase_return_is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `purchase_return_created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_return_updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_return_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_return_created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_returns`
--

INSERT INTO `purchase_returns` (`purchase_return_id`, `purchase_return_supplier_id`, `purchase_number`, `purchase_return_number`, `purchase_total_quantity`, `purchase_return_total_quantity`, `purchase_subtotal`, `purchase_return_subtotal`, `purchase_discount`, `purchase_return_discount`, `purchase_net_total`, `purchase_return_net_total`, `purchase_return_status`, `purchase_return_is_deleted`, `purchase_return_created_by`, `purchase_return_updated_by`, `purchase_return_deleted_by`, `purchase_return_created_at`, `created_at`, `updated_at`) VALUES
(1, '1', '2301121', '2301241', '1.00', '5', '150.00', '125', '0', '0', '150.00', '125', '1', 'NO', '1', NULL, NULL, '2023/01/24', '2023-01-23 18:00:00', '2023-01-23 21:21:41'),
(2, '1', '2301301', '2301301', '50.00', '10', '10000.00', '2000', '0', '0', '10000.00', '2000', '1', 'NO', '1', NULL, NULL, '2023/01/30', '2023-01-29 18:00:00', '2023-01-29 22:53:18');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_return_items`
--

CREATE TABLE `purchase_return_items` (
  `purchase_return_item_id` int(10) UNSIGNED NOT NULL,
  `purchase_return_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_product_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_product_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_product_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_product_return_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_product_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_product_total_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_return_product_total_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_return_items`
--

INSERT INTO `purchase_return_items` (`purchase_return_item_id`, `purchase_return_id`, `purchase_number`, `purchase_product_id`, `purchase_product_size`, `purchase_product_color`, `purchase_product_quantity`, `purchase_product_return_quantity`, `purchase_product_price`, `purchase_product_total_price`, `purchase_return_product_total_price`, `created_at`, `updated_at`) VALUES
(1, '1', '2301121', '1', NULL, NULL, '1', '0', '150', '150.00', '0', '2023-01-23 18:00:00', '2023-01-23 21:21:41'),
(2, '1', '2301121', '5', NULL, NULL, '20', '5', '25', '500.00', '125', '2023-01-23 18:00:00', '2023-01-23 21:21:41'),
(3, '2', '2301301', '15', NULL, NULL, '50', '10', '200', '10000.00', '2000', '2023-01-29 18:00:00', '2023-01-29 22:53:18');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(10) UNSIGNED NOT NULL,
  `staff_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_entry_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `staff_is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `staff_created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_entry_id`, `staff_status`, `staff_is_deleted`, `staff_created_by`, `staff_updated_by`, `staff_deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'Shymol', 'Shymol80836', '1', 'NO', '1', NULL, NULL, '2023-01-17 18:00:00', '2023-01-18 05:39:30'),
(2, 'Armaan', 'Armaan63373', '1', 'NO', '1', NULL, NULL, '2023-01-17 18:00:00', '2023-01-18 05:39:43'),
(3, 'Sefat', 'Sefat20530', '1', 'NO', '1', NULL, NULL, '2023-01-17 18:00:00', '2023-01-18 05:39:50');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_entry_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_opening_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `supplier_is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `supplier_created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`, `branch_id`, `supplier_entry_id`, `supplier_email`, `supplier_phone_number`, `supplier_opening_balance`, `supplier_address`, `supplier_image`, `supplier_status`, `supplier_is_deleted`, `supplier_created_by`, `supplier_updated_by`, `supplier_deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'Nobita', '2', 'Nobita14141', 'nobita@gmail.com', '01401033443', '2500', 'fanfaujafn', 'uploads/1673496104.jpg', '1', 'NO', '1', NULL, NULL, '2023-01-11 18:00:00', '2023-01-11 22:01:44');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_ledgers`
--

CREATE TABLE `supplier_ledgers` (
  `supplier_ledger_id` int(10) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) DEFAULT NULL,
  `supplier_account_id` bigint(20) DEFAULT NULL,
  `supplier_transaction_id` bigint(20) DEFAULT NULL,
  `supplier_ledger_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_ledger_invoice_id` bigint(20) DEFAULT NULL,
  `supplier_ledger_money_receipt_id` bigint(20) DEFAULT NULL,
  `supplier_ledger_refund_id` bigint(20) DEFAULT NULL,
  `supplier_ledger_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_ledger_last_balance` bigint(20) DEFAULT NULL,
  `supplier_ledger_dr` bigint(20) DEFAULT NULL,
  `supplier_ledger_cr` bigint(20) DEFAULT NULL,
  `supplier_ledger_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_ledger_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_ledger_prepared_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_payments`
--

CREATE TABLE `supplier_payments` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) DEFAULT NULL,
  `supplier_payment_type` bigint(20) NOT NULL DEFAULT 0,
  `date` date DEFAULT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `transactionAccountID` bigint(20) DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_id` bigint(20) DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_transactions`
--

CREATE TABLE `supplier_transactions` (
  `supplier_transaction_id` int(10) UNSIGNED NOT NULL,
  `supplier_transaction_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_transaction_account_id` bigint(20) DEFAULT NULL,
  `supplier_transaction_supplier_id` bigint(20) DEFAULT NULL,
  `supplier_warehouse_id` bigint(20) DEFAULT NULL,
  `supplier_payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_transaction_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_transaction_last_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_transaction_opening_balance` bigint(20) DEFAULT NULL,
  `supplier_transaction_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_transaction_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_transaction_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_transaction_has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `supplier_transaction_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier_transactions`
--

INSERT INTO `supplier_transactions` (`supplier_transaction_id`, `supplier_transaction_type`, `supplier_transaction_account_id`, `supplier_transaction_supplier_id`, `supplier_warehouse_id`, `supplier_payment_type`, `supplier_transaction_amount`, `supplier_transaction_last_balance`, `supplier_transaction_opening_balance`, `supplier_transaction_date`, `supplier_transaction_note`, `supplier_transaction_create_date`, `supplier_transaction_has_deleted`, `supplier_transaction_deleted_by`, `created_at`, `updated_at`) VALUES
(6, 'CREDIT', NULL, 1, NULL, NULL, '12500.00', '12500', NULL, '2023-01-30', NULL, NULL, 'NO', '', '2023-01-30 06:36:27', '2023-01-30 06:36:27'),
(7, 'CREDIT', NULL, 1, NULL, NULL, '10000.00', '22500', NULL, '2023-01-30', NULL, NULL, 'NO', '', '2023-01-30 06:36:48', '2023-01-30 06:36:48'),
(8, 'DEBIT', NULL, 1, NULL, NULL, '4000', '18500', NULL, '2023-01-30', NULL, NULL, 'NO', '', '2023-01-30 08:03:31', '2023-01-30 08:03:31'),
(9, 'DEBIT', NULL, 1, NULL, NULL, '1000', '17500', NULL, '2023-01-30', NULL, NULL, 'NO', '', '2023-01-30 08:04:54', '2023-01-30 08:04:54'),
(10, 'DEBIT', NULL, 1, NULL, NULL, '10000', '7500', NULL, '2023-01-30', NULL, NULL, 'NO', '', '2023-01-30 08:05:34', '2023-01-30 08:05:34'),
(11, 'DEBIT', NULL, 1, NULL, NULL, '7500', '0', NULL, '2023-01-30', NULL, NULL, 'NO', '', '2023-01-30 08:31:51', '2023-01-30 08:31:51');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `terms_id` int(10) UNSIGNED NOT NULL,
  `terms_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `terms_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'armaan', 'armaan@gmail.com', NULL, '$2y$10$zINGZmCdiUnVWmfQnr/nDOswnfJ3QRzOvADjph485Ugpp8Dibu8va', 'AiaPjOnGVrTe69ODRBfTnWZe1QWgsrgImXKldyawFYPHeISF18OtNaAGrVib', '2023-01-02 21:43:41', '2023-01-02 21:43:41');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `warehouse_id` int(10) UNSIGNED NOT NULL,
  `warehouse_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_entry_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `warehouse_is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `warehouse_created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`warehouse_id`, `warehouse_name`, `warehouse_entry_id`, `warehouse_phone_number`, `warehouse_address`, `warehouse_status`, `warehouse_is_deleted`, `warehouse_created_by`, `warehouse_updated_by`, `warehouse_deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'Dhanmondi', 'Dhanmondi89249', '01401033443', '7/12 - north dhanmondi', '1', 'NO', '1', NULL, NULL, '2023-01-11 18:00:00', '2023-01-11 22:00:46'),
(2, 'Kuril', 'Kuril94986', '0515151', '441af41fa5fa1', '1', 'NO', '1', NULL, NULL, '2023-01-17 18:00:00', '2023-01-17 20:59:26'),
(3, 'Uttara', 'Uttara23714', '12591515', '1451fa5a1f5fa1', '1', 'NO', '1', NULL, NULL, '2023-01-17 18:00:00', '2023-01-17 20:59:38'),
(4, 'Rajshahi', 'Rajshahi43254', '1515e1', '5f1f15e', '1', 'NO', '1', NULL, NULL, '2023-01-17 18:00:00', '2023-01-17 20:59:52');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_to_branches`
--

CREATE TABLE `warehouse_to_branches` (
  `warehouse_to_branch_transfer_id` int(10) UNSIGNED NOT NULL,
  `warehouse_to_branch_transfer_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_transfer_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transfer_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transfer_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_to_branch_transfer_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `warehouse_to_branch_transfer_is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `warehouse_to_branch_transfer_created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_to_branch_transfer_updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_to_branch_transfer_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_to_branch_transfer_created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouse_to_branches`
--

INSERT INTO `warehouse_to_branches` (`warehouse_to_branch_transfer_id`, `warehouse_to_branch_transfer_number`, `warehouse_id`, `branch_id`, `total_transfer_quantity`, `transfer_note`, `transfer_date`, `warehouse_to_branch_transfer_status`, `warehouse_to_branch_transfer_is_deleted`, `warehouse_to_branch_transfer_created_by`, `warehouse_to_branch_transfer_updated_by`, `warehouse_to_branch_transfer_deleted_by`, `warehouse_to_branch_transfer_created_at`, `created_at`, `updated_at`) VALUES
(1, 'TRANS-8831410000', '1', '1', NULL, NULL, '22-01-2023', '1', 'NO', '1', NULL, NULL, '2023/01/22', '2023-01-21 18:00:00', '2023-01-21 21:26:04'),
(2, 'TRANS-3093310000', '1', '1', NULL, NULL, '22-01-2023', '1', 'NO', '1', NULL, NULL, '2023/01/22', '2023-01-21 18:00:00', '2023-01-21 21:31:21'),
(3, 'TRANS-151410000', '3', '1', NULL, NULL, '24-01-2023', '1', 'NO', '1', NULL, NULL, '2023/01/24', '2023-01-23 18:00:00', '2023-01-23 21:45:55'),
(4, 'TRANS-151410000', '3', '1', NULL, NULL, '24-01-2023', '1', 'NO', '1', NULL, NULL, '2023/01/24', '2023-01-23 18:00:00', '2023-01-23 21:46:06'),
(5, 'TRANS-3053110000', '2', '1', NULL, 'product transfer to branch', '24-01-2023', '1', 'NO', '1', NULL, NULL, '2023/01/24', '2023-01-23 18:00:00', '2023-01-24 00:28:46'),
(6, 'TRANS-4425910000', '4', '1', NULL, NULL, '25-01-2023', '1', 'NO', '1', NULL, NULL, '2023/01/25', '2023-01-24 18:00:00', '2023-01-25 00:33:59'),
(7, 'TRANS-2408510000', '2', '1', NULL, NULL, '26-01-2023', '1', 'NO', '1', NULL, NULL, '2023/01/26', '2023-01-25 18:00:00', '2023-01-25 21:53:46'),
(8, 'TRANS-4142310000', '4', '1', NULL, 'this is update', '30-01-2023', '1', 'NO', '1', NULL, NULL, '2023/01/30', '2023-01-29 18:00:00', '2023-01-29 21:43:31'),
(9, 'TRANS-8125410000', '2', '1', NULL, NULL, '30-01-2023', '1', 'NO', '1', NULL, NULL, '2023/01/30', '2023-01-29 18:00:00', '2023-01-30 03:25:58'),
(10, 'TRANS-1849310000', '1', '1', NULL, NULL, '30-01-2023', '1', 'NO', '1', NULL, NULL, '2023/01/30', '2023-01-29 18:00:00', '2023-01-30 04:54:23'),
(11, 'TRANS-1849310000', '1', '1', NULL, NULL, '30-01-2023', '1', 'NO', '1', NULL, NULL, '2023/01/30', '2023-01-29 18:00:00', '2023-01-30 04:56:49'),
(12, 'TRANS-2741810000', '2', '1', NULL, NULL, '30-01-2023', '1', 'NO', '1', NULL, NULL, '2023/01/30', '2023-01-29 18:00:00', '2023-01-30 04:59:52');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_to_branch_items`
--

CREATE TABLE `warehouse_to_branch_items` (
  `warehouse_to_branch_items_id` int(10) UNSIGNED NOT NULL,
  `warehouse_to_branch_transfer_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_to_branch_transfer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transfer_product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transfer_product_available_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transfer_product_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouse_to_branch_items`
--

INSERT INTO `warehouse_to_branch_items` (`warehouse_to_branch_items_id`, `warehouse_to_branch_transfer_number`, `warehouse_to_branch_transfer_id`, `transfer_product_id`, `transfer_product_available_balance`, `transfer_product_amount`, `created_at`, `updated_at`) VALUES
(1, 'TRANS-8831410000', '1', '1', '51', '26', '2023-01-21 18:00:00', '2023-01-21 21:26:04'),
(2, 'TRANS-3093310000', '2', '2', '100', '10', '2023-01-21 18:00:00', '2023-01-21 21:31:21'),
(3, 'TRANS-151410000', '3', '10', '150', '12', '2023-01-23 18:00:00', '2023-01-23 21:45:55'),
(4, 'TRANS-151410000', '4', '10', '150', '12', '2023-01-23 18:00:00', '2023-01-23 21:46:06'),
(5, 'TRANS-3053110000', '5', '11', '100', '50', '2023-01-23 18:00:00', '2023-01-24 00:28:46'),
(6, 'TRANS-4425910000', '6', '12', '10', '10', '2023-01-24 18:00:00', '2023-01-25 00:33:59'),
(7, 'TRANS-2408510000', '7', '14', '10', '10', '2023-01-25 18:00:00', '2023-01-25 21:53:46'),
(8, 'TRANS-4142310000', '8', '15', '50', '20', '2023-01-29 18:00:00', '2023-01-29 21:43:31'),
(9, 'TRANS-8125410000', '9', '17', '70', '30', '2023-01-29 18:00:00', '2023-01-30 03:25:58'),
(10, 'TRANS-1849310000', '10', '1', '51', '11', '2023-01-29 18:00:00', '2023-01-30 04:54:23'),
(11, 'TRANS-1849310000', '11', '1', '51', '11', '2023-01-29 18:00:00', '2023-01-30 04:56:49'),
(12, 'TRANS-2741810000', '12', '19', '50', '10', '2023-01-29 18:00:00', '2023-01-30 04:59:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `account_transactions`
--
ALTER TABLE `account_transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `account_transfer`
--
ALTER TABLE `account_transfer`
  ADD PRIMARY KEY (`account_transfer_id`);

--
-- Indexes for table `barcodes`
--
ALTER TABLE `barcodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `client_ledgers`
--
ALTER TABLE `client_ledgers`
  ADD PRIMARY KEY (`client_ledger_id`);

--
-- Indexes for table `client_transactions`
--
ALTER TABLE `client_transactions`
  ADD PRIMARY KEY (`client_transaction_id`);

--
-- Indexes for table `company_infos`
--
ALTER TABLE `company_infos`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `delivery_men`
--
ALTER TABLE `delivery_men`
  ADD PRIMARY KEY (`delivery_men_id`);

--
-- Indexes for table `delivery_vehicles`
--
ALTER TABLE `delivery_vehicles`
  ADD PRIMARY KEY (`delivery_vehicles_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `expense_heads`
--
ALTER TABLE `expense_heads`
  ADD PRIMARY KEY (`expensehead_id`),
  ADD UNIQUE KEY `expense_heads_title_unique` (`title`);

--
-- Indexes for table `expense_sub_heads`
--
ALTER TABLE `expense_sub_heads`
  ADD PRIMARY KEY (`expense_sub_head_id`),
  ADD UNIQUE KEY `expense_sub_heads_title_unique` (`title`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_pos_sales`
--
ALTER TABLE `invoice_pos_sales`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `invoice_returns`
--
ALTER TABLE `invoice_returns`
  ADD PRIMARY KEY (`sale_return_id`);

--
-- Indexes for table `invoice_return_products`
--
ALTER TABLE `invoice_return_products`
  ADD PRIMARY KEY (`return_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `money_receipt`
--
ALTER TABLE `money_receipt`
  ADD PRIMARY KEY (`money_receipt_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pos_sale_products`
--
ALTER TABLE `pos_sale_products`
  ADD PRIMARY KEY (`sale_product_id`);

--
-- Indexes for table `pos_transfers`
--
ALTER TABLE `pos_transfers`
  ADD PRIMARY KEY (`transfer_id`);

--
-- Indexes for table `pos_transfer_products`
--
ALTER TABLE `pos_transfer_products`
  ADD PRIMARY KEY (`transfer_product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`product_category_id`);

--
-- Indexes for table `product_transfer`
--
ALTER TABLE `product_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD PRIMARY KEY (`purchase_items_id`);

--
-- Indexes for table `purchase_returns`
--
ALTER TABLE `purchase_returns`
  ADD PRIMARY KEY (`purchase_return_id`);

--
-- Indexes for table `purchase_return_items`
--
ALTER TABLE `purchase_return_items`
  ADD PRIMARY KEY (`purchase_return_item_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `supplier_ledgers`
--
ALTER TABLE `supplier_ledgers`
  ADD PRIMARY KEY (`supplier_ledger_id`);

--
-- Indexes for table `supplier_payments`
--
ALTER TABLE `supplier_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `supplier_transactions`
--
ALTER TABLE `supplier_transactions`
  ADD PRIMARY KEY (`supplier_transaction_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`terms_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`warehouse_id`);

--
-- Indexes for table `warehouse_to_branches`
--
ALTER TABLE `warehouse_to_branches`
  ADD PRIMARY KEY (`warehouse_to_branch_transfer_id`);

--
-- Indexes for table `warehouse_to_branch_items`
--
ALTER TABLE `warehouse_to_branch_items`
  ADD PRIMARY KEY (`warehouse_to_branch_items_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `account_transactions`
--
ALTER TABLE `account_transactions`
  MODIFY `transaction_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `account_transfer`
--
ALTER TABLE `account_transfer`
  MODIFY `account_transfer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barcodes`
--
ALTER TABLE `barcodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branch_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client_ledgers`
--
ALTER TABLE `client_ledgers`
  MODIFY `client_ledger_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `client_transactions`
--
ALTER TABLE `client_transactions`
  MODIFY `client_transaction_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `company_infos`
--
ALTER TABLE `company_infos`
  MODIFY `company_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_men`
--
ALTER TABLE `delivery_men`
  MODIFY `delivery_men_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `delivery_vehicles`
--
ALTER TABLE `delivery_vehicles`
  MODIFY `delivery_vehicles_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expense_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `expense_heads`
--
ALTER TABLE `expense_heads`
  MODIFY `expensehead_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expense_sub_heads`
--
ALTER TABLE `expense_sub_heads`
  MODIFY `expense_sub_head_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_pos_sales`
--
ALTER TABLE `invoice_pos_sales`
  MODIFY `sale_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `invoice_returns`
--
ALTER TABLE `invoice_returns`
  MODIFY `sale_return_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invoice_return_products`
--
ALTER TABLE `invoice_return_products`
  MODIFY `return_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `money_receipt`
--
ALTER TABLE `money_receipt`
  MODIFY `money_receipt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pos_sale_products`
--
ALTER TABLE `pos_sale_products`
  MODIFY `sale_product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `pos_transfers`
--
ALTER TABLE `pos_transfers`
  MODIFY `transfer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pos_transfer_products`
--
ALTER TABLE `pos_transfer_products`
  MODIFY `transfer_product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `product_category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_transfer`
--
ALTER TABLE `product_transfer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `purchase_items_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `purchase_returns`
--
ALTER TABLE `purchase_returns`
  MODIFY `purchase_return_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase_return_items`
--
ALTER TABLE `purchase_return_items`
  MODIFY `purchase_return_item_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier_ledgers`
--
ALTER TABLE `supplier_ledgers`
  MODIFY `supplier_ledger_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier_payments`
--
ALTER TABLE `supplier_payments`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier_transactions`
--
ALTER TABLE `supplier_transactions`
  MODIFY `supplier_transaction_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `terms_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `warehouse_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `warehouse_to_branches`
--
ALTER TABLE `warehouse_to_branches`
  MODIFY `warehouse_to_branch_transfer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `warehouse_to_branch_items`
--
ALTER TABLE `warehouse_to_branch_items`
  MODIFY `warehouse_to_branch_items_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
