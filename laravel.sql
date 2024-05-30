-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 30, 2024 lúc 01:08 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attachment`
--

CREATE TABLE `attachment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `table_id` int(11) NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `size` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_sale`
--

CREATE TABLE `bill_sale` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `detailexport_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `price_total` decimal(20,4) NOT NULL,
  `status` int(11) NOT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `number_bill` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `content-import-export`
--

CREATE TABLE `content-import-export` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `document` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content` varchar(255) NOT NULL,
  `qty_money` decimal(20,4) DEFAULT NULL,
  `fund_id` int(11) NOT NULL,
  `fund_name` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `date_form`
--

CREATE TABLE `date_form` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_name` varchar(255) DEFAULT NULL,
  `form_field` varchar(255) DEFAULT NULL,
  `form_desc` varchar(255) DEFAULT NULL,
  `default_form` tinyint(1) NOT NULL DEFAULT 0,
  `default_guest` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) DEFAULT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `delivered`
--

CREATE TABLE `delivered` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `deliver_qty` decimal(20,4) NOT NULL,
  `product_total_vat` int(11) DEFAULT NULL,
  `price_export` int(11) DEFAULT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `delivery`
--

CREATE TABLE `delivery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guest_id` int(11) NOT NULL,
  `quotation_number` varchar(255) NOT NULL,
  `code_delivery` varchar(255) DEFAULT NULL,
  `shipping_unit` varchar(255) DEFAULT NULL,
  `shipping_fee` decimal(20,4) DEFAULT NULL,
  `detailexport_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detailexport`
--

CREATE TABLE `detailexport` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guest_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `quotation_number` varchar(255) DEFAULT NULL,
  `represent_id` int(11) DEFAULT NULL,
  `reference_number` varchar(255) DEFAULT NULL,
  `price_effect` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `status_receive` int(11) DEFAULT NULL,
  `status_reciept` int(11) DEFAULT NULL,
  `status_pay` int(11) DEFAULT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `guest_name` varchar(255) DEFAULT NULL,
  `represent_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_price` decimal(20,4) DEFAULT NULL,
  `total_tax` decimal(20,4) DEFAULT NULL,
  `discount` decimal(20,4) DEFAULT NULL,
  `discount_type` int(11) DEFAULT NULL,
  `transfer_fee` decimal(20,4) DEFAULT NULL,
  `terms_pay` varchar(255) DEFAULT NULL,
  `amount_owed` decimal(20,4) DEFAULT NULL,
  `goods` varchar(255) DEFAULT NULL,
  `delivery` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `detailexport`
--

INSERT INTO `detailexport` (`id`, `guest_id`, `project_id`, `user_id`, `quotation_number`, `represent_id`, `reference_number`, `price_effect`, `status`, `status_receive`, `status_reciept`, `status_pay`, `workspace_id`, `guest_name`, `represent_name`, `created_at`, `updated_at`, `total_price`, `total_tax`, `discount`, `discount_type`, `transfer_fee`, `terms_pay`, `amount_owed`, `goods`, `delivery`, `location`) VALUES
(1, 1, 1, 1, '30052024/RN-K-01', NULL, NULL, NULL, 2, NULL, NULL, 1, NULL, 'Khách hàng 1', NULL, '2024-05-30 11:05:48', '2024-05-30 11:06:12', 21750000.0000, 2175000.0000, 0.0000, 1, NULL, NULL, 23925000.0000, NULL, NULL, NULL),
(2, 8, 1, 1, '30052024/RN-K-02', NULL, NULL, NULL, 2, NULL, NULL, 1, NULL, 'Khách hàng 8', NULL, '2024-05-30 11:06:28', '2024-05-30 11:07:01', 10650000.0000, 995000.0000, 45000.0000, 1, NULL, NULL, 11600000.0000, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detailimport`
--

CREATE TABLE `detailimport` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provide_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quotation_number` varchar(255) DEFAULT NULL,
  `represent_id` int(11) DEFAULT NULL,
  `reference_number` varchar(255) DEFAULT NULL,
  `price_effect` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `status_receive` int(11) DEFAULT NULL,
  `status_reciept` int(11) DEFAULT NULL,
  `status_pay` int(11) DEFAULT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `provide_name` varchar(255) DEFAULT NULL,
  `represent_name` varchar(255) DEFAULT NULL,
  `status_debt` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_price` decimal(20,4) DEFAULT NULL,
  `total_tax` decimal(20,4) DEFAULT NULL,
  `discount` decimal(20,4) DEFAULT NULL,
  `discount_type` int(11) DEFAULT NULL,
  `transfer_fee` decimal(20,4) DEFAULT NULL,
  `terms_pay` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `detailimport`
--

INSERT INTO `detailimport` (`id`, `provide_id`, `project_id`, `user_id`, `quotation_number`, `represent_id`, `reference_number`, `price_effect`, `status`, `status_receive`, `status_reciept`, `status_pay`, `workspace_id`, `provide_name`, `represent_name`, `status_debt`, `created_at`, `updated_at`, `total_price`, `total_tax`, `discount`, `discount_type`, `transfer_fee`, `terms_pay`) VALUES
(1, 1, 1, 1, '30052024/RN-N-01', NULL, NULL, NULL, 2, 0, 0, 3, NULL, 'Nhà cung cấp 1', '', 1, '2024-05-30 11:03:26', '2024-05-30 11:04:02', 61150000.0000, 63675000.0000, 150000.0000, 1, 0.0000, NULL),
(2, 2, 1, 1, '30052024/RN-N1-01', NULL, NULL, NULL, 2, 0, 0, 3, NULL, 'Nhà cung cấp 2', '', 1, '2024-05-30 11:04:16', '2024-05-30 11:05:03', 173400000.0000, 190740000.0000, 0.0000, 1, 0.0000, NULL),
(3, 8, 1, 1, '30052024/RN-N7-01', NULL, NULL, NULL, 2, 0, 0, 3, NULL, 'Nhà cung cấp 8', '', 1, '2024-05-30 11:05:12', '2024-05-30 11:05:40', 77666000.0000, 77666000.0000, 0.0000, 1, 0.0000, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `workspace_id`, `created_at`, `updated_at`) VALUES
(1, 'Điện thoại', NULL, NULL, '2024-05-30 10:54:46', '2024-05-30 10:54:46'),
(2, 'Ổ cứng', NULL, NULL, '2024-05-30 10:54:54', '2024-05-30 10:54:54'),
(3, 'Ipad', NULL, NULL, '2024-05-30 10:55:01', '2024-05-30 10:55:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `guest`
--

CREATE TABLE `guest` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guest_name_display` varchar(255) NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `guest_name` varchar(255) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `debt_limit` decimal(15,2) DEFAULT NULL,
  `initial_debt` decimal(15,2) DEFAULT NULL,
  `price_type` varchar(255) DEFAULT NULL,
  `guest_address` varchar(255) NOT NULL,
  `guest_code` varchar(255) NOT NULL,
  `guest_email` varchar(255) DEFAULT NULL,
  `guest_phone` varchar(255) DEFAULT NULL,
  `guest_receiver` varchar(255) DEFAULT NULL,
  `guest_email_personal` varchar(255) DEFAULT NULL,
  `guest_phone_receiver` varchar(255) DEFAULT NULL,
  `guest_debt` decimal(20,4) NOT NULL DEFAULT 0.0000,
  `guest_note` varchar(255) DEFAULT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `guest`
--

INSERT INTO `guest` (`id`, `guest_name_display`, `key`, `guest_name`, `group_id`, `birthday`, `fax`, `debt_limit`, `initial_debt`, `price_type`, `guest_address`, `guest_code`, `guest_email`, `guest_phone`, `guest_receiver`, `guest_email_personal`, `guest_phone_receiver`, `guest_debt`, `guest_note`, `workspace_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Khách hàng 1', 'K', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Q 9', '11111', NULL, NULL, NULL, NULL, NULL, 0.0000, NULL, NULL, 1, NULL, NULL),
(2, 'Khách hàng 2', 'K1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Q TD', '22222', NULL, NULL, NULL, NULL, NULL, 0.0000, NULL, NULL, 1, NULL, NULL),
(3, 'Khách hàng 3', 'K2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Q10', '3333', NULL, NULL, NULL, NULL, NULL, 0.0000, NULL, NULL, 1, NULL, NULL),
(4, 'Khách hàng 4', 'K3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Q TB', '444', NULL, NULL, NULL, NULL, NULL, 0.0000, NULL, NULL, 1, NULL, NULL),
(5, 'Khách hàng 5', 'K4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Q TB', '32323', NULL, NULL, NULL, NULL, NULL, 0.0000, NULL, NULL, 1, NULL, NULL),
(6, 'Khác hàng 6', 'K5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Quận 5', '55566', NULL, NULL, NULL, NULL, NULL, 0.0000, NULL, NULL, 1, NULL, NULL),
(7, 'Khách hàng 7', 'K6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Q TBB', '456', NULL, NULL, NULL, NULL, NULL, 0.0000, NULL, NULL, 1, NULL, NULL),
(8, 'Khách hàng 8', 'K7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Q99', '656', NULL, NULL, NULL, NULL, NULL, 0.0000, NULL, NULL, 1, NULL, NULL),
(9, 'Khách hàng 9', 'K8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Q0', '54656', NULL, NULL, NULL, NULL, NULL, 0.0000, NULL, NULL, 1, NULL, NULL),
(10, 'Khách hàng 10', 'K9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Q90', '1010', NULL, NULL, NULL, NULL, NULL, 0.0000, NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `guest_dateform`
--

CREATE TABLE `guest_dateform` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_field` varchar(255) DEFAULT NULL,
  `guest_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_form_id` bigint(20) UNSIGNED DEFAULT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history`
--

CREATE TABLE `history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `delivery_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `detailexport_id` bigint(20) UNSIGNED DEFAULT NULL,
  `delivered_id` bigint(20) UNSIGNED DEFAULT NULL,
  `provide_id` bigint(20) UNSIGNED DEFAULT NULL,
  `qty_export` varchar(255) DEFAULT NULL,
  `hdr` varchar(255) DEFAULT NULL,
  `hdv` varchar(255) DEFAULT NULL,
  `detailimport_id` bigint(20) UNSIGNED DEFAULT NULL,
  `history_import` bigint(20) UNSIGNED DEFAULT NULL,
  `tax_import` decimal(20,4) DEFAULT NULL,
  `price_import` decimal(20,4) DEFAULT NULL,
  `total_import` decimal(20,4) DEFAULT NULL,
  `workspace_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_import`
--

CREATE TABLE `history_import` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `detailImport_id` int(11) NOT NULL,
  `quoteImport_id` int(11) NOT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_unit` varchar(255) NOT NULL,
  `product_qty` decimal(20,4) NOT NULL,
  `product_tax` int(11) NOT NULL,
  `product_total` decimal(20,4) NOT NULL,
  `price_export` decimal(20,4) NOT NULL,
  `product_note` varchar(255) DEFAULT NULL,
  `version` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `provide_id` int(11) DEFAULT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `history_import`
--

INSERT INTO `history_import` (`id`, `detailImport_id`, `quoteImport_id`, `product_code`, `product_name`, `product_unit`, `product_qty`, `product_tax`, `product_total`, `price_export`, `product_note`, `version`, `product_id`, `provide_id`, `workspace_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'WDS500G3B0A', 'Ổ cứng Western SSD 500GB/2.5\" 7mm Sata3 màu xanh _Blue(WDS500G3B0A)', 'Cái', 3.0000, 10, 4500000.0000, 1500000.0000, NULL, 1, NULL, 1, NULL, 1, '2024-05-30 11:04:01', NULL),
(2, 1, 2, 'LQ-590', 'Đầu kim Epson LQ-590', 'Cái', 4.0000, 8, 10000000.0000, 2500000.0000, NULL, 1, NULL, 1, NULL, 1, '2024-05-30 11:04:01', NULL),
(3, 1, 3, 'KXTS500', 'Điện thoại có dây Panasonic KXTS500', 'Cái', 5.0000, 8, 18000000.0000, 3600000.0000, NULL, 1, NULL, 1, NULL, 1, '2024-05-30 11:04:01', NULL),
(4, 1, 4, 'CBS110-8T-D-EU', 'Thiết bị chuyển mạch Cisco SB CBS110 Unmanaged 8- port GE, Desktop, Ext PS_CBS110-8T-D-EU', 'Cái', 6.0000, 0, 28800000.0000, 4800000.0000, NULL, 1, NULL, 1, NULL, 1, '2024-05-30 11:04:01', NULL),
(5, 2, 5, 'T82', 'Máy in bill Epson T82 III ( USB và LAN , P/n C31CH51542 )', 'Chiếc', 7.0000, 10, 24500000.0000, 3500000.0000, NULL, 1, NULL, 2, NULL, 1, '2024-05-30 11:05:03', NULL),
(6, 2, 6, 'KXTS500', 'APPLE IPAD GEN 9TH 10.2 INCH WIFI 64GB- XÁM', 'Chiếc', 8.0000, 10, 44000000.0000, 5500000.0000, NULL, 1, NULL, 2, NULL, 1, '2024-05-30 11:05:03', NULL),
(7, 2, 7, 'SP01', 'Điện thoại không dây Panasonic KXTGF310', 'Cái', 9.0000, 10, 43200000.0000, 4800000.0000, NULL, 1, NULL, 2, NULL, 1, '2024-05-30 11:05:03', NULL),
(8, 2, 8, 'DA-8IP2B21-TI', 'Camera quan sát DA-8IP2B21-TI', 'Cái', 10.0000, 10, 64000000.0000, 6400000.0000, NULL, 1, NULL, 2, NULL, 1, '2024-05-30 11:05:03', NULL),
(9, 3, 9, 'R809797', 'Dây cáp mạng R&M Cat6 R809797', 'M', 4.0000, 0, 31416000.0000, 7854000.0000, NULL, 1, NULL, 8, NULL, 1, '2024-05-30 11:05:40', NULL),
(10, 3, 10, NULL, 'Thiết bị Switch 2960-48 port POE', 'Chiếc', 8.0000, 0, 46400000.0000, 5800000.0000, NULL, 1, NULL, 8, NULL, 1, '2024-05-30 11:05:40', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_payment_export`
--

CREATE TABLE `history_payment_export` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pay_id` int(11) NOT NULL,
  `total` decimal(20,4) DEFAULT NULL,
  `payment` decimal(20,4) DEFAULT NULL,
  `debt` decimal(20,4) DEFAULT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `history_payment_export`
--

INSERT INTO `history_payment_export` (`id`, `pay_id`, `total`, `payment`, `debt`, `workspace_id`, `payment_type`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 23925000.0000, 0.0000, 23925000.0000, NULL, 'Tiền mặt', 1, '2024-05-30 11:05:48', '2024-05-30 11:06:12'),
(2, 2, 11600000.0000, 0.0000, 11600000.0000, NULL, 'Tiền mặt', 1, '2024-05-30 11:06:28', '2024-05-30 11:07:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_payment_order`
--

CREATE TABLE `history_payment_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` int(11) NOT NULL,
  `total` decimal(20,4) NOT NULL,
  `payment` decimal(20,4) NOT NULL,
  `debt` decimal(20,4) NOT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provide_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `history_payment_order`
--

INSERT INTO `history_payment_order` (`id`, `payment_id`, `total`, `payment`, `debt`, `workspace_id`, `payment_type`, `user_id`, `provide_id`, `created_at`, `updated_at`) VALUES
(1, 1, 63675000.0000, 0.0000, 63675000.0000, NULL, 'Tiền mặt', 1, '1', '2024-05-30 11:03:26', NULL),
(2, 2, 190740000.0000, 0.0000, 190740000.0000, NULL, 'Tiền mặt', 1, '2', '2024-05-30 11:04:16', NULL),
(3, 3, 77666000.0000, 0.0000, 77666000.0000, NULL, 'Tiền mặt', 1, '8', '2024-05-30 11:05:12', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invitations`
--

CREATE TABLE `invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `workspace_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `token` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `roleid` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_10_23_063108_create_products_table', 1),
(7, '2023_10_23_063938_create_warehouse_table', 1),
(8, '2023_10_23_065935_create_provides_table', 1),
(9, '2023_10_23_070452_create_detailimport_table', 1),
(10, '2023_10_23_070931_create_quoteimport_table', 1),
(11, '2023_10_23_071052_create_project_table', 1),
(12, '2023_10_23_071202_create_guest_table', 1),
(13, '2023_10_23_071629_create_quoteexport_table', 1),
(14, '2023_10_23_071724_create_detailexport_table', 1),
(15, '2023_10_23_074126_create_update_table', 1),
(16, '2023_10_23_094155_create_serialnumber_table', 1),
(17, '2023_10_23_100814_create_sessions_table', 1),
(18, '2023_10_23_103920_create_roles_table', 1),
(19, '2023_10_23_104003_create_role_user_table', 1),
(20, '2023_10_26_072644_create_update_data_table', 1),
(21, '2023_11_03_054202_create_receive_bill_table', 1),
(22, '2023_11_07_071016_create_reciept_table', 1),
(23, '2023_11_08_054013_update_price_import', 1),
(24, '2023_11_09_040916_create_pay_order_table', 1),
(25, '2023_11_09_041809_create_delivery_table', 1),
(26, '2023_11_12_055122_create_delivered_table', 1),
(27, '2023_11_12_165721_create_bill_sale_table', 1),
(28, '2023_11_12_181329_create_pay_export_table', 1),
(29, '2023_11_14_021642_create_products_import_table', 1),
(30, '2023_11_17_032929_create_update_qty_delivery_table', 1),
(31, '2023_11_20_065756_create_history_import_table', 1),
(32, '2023_11_21_065232_create_update_required_table', 1),
(33, '2023_11_22_032847_create_history_receive_table', 1),
(34, '2023_11_24_043806_add_number_bill_bill_sale', 1),
(35, '2023_11_24_055721_create_history_payment_order_table', 1),
(36, '2023_11_26_104821_create_product_bill', 1),
(37, '2023_11_26_175638_create_product_pay', 1),
(38, '2023_11_26_175912_create_history-payment', 1),
(39, '2023_11_27_061602_insert_column_detail_export', 1),
(40, '2023_11_27_105206_create_update_colum_table', 1),
(41, '2023_11_29_043725_create_attachment_table', 1),
(42, '2023_12_06_142730_insert_serinumber', 1),
(43, '2023_12_08_030243_insert_quote_delivery', 1),
(44, '2023_12_08_064520_create_update_column_provideandguest_table', 1),
(45, '2023_12_08_071011_create_date_form_table', 1),
(46, '2023_12_11_064021_create_represent_guest_table', 1),
(47, '2023_12_11_064406_create_represent_provide_table', 1),
(48, '2023_12_13_054630_update_date_form', 1),
(49, '2023_12_13_054630_update_guest_delivery', 1),
(50, '2023_12_14_064406_create_guest_dateform', 1),
(51, '2023_12_14_072914_create_update_column_sn_table', 1),
(52, '2023_12_21_080702_create_workspaces_table', 1),
(53, '2023_12_22_054630_update_user', 1),
(54, '2023_12_25_040904_create_update_database_table', 1),
(55, '2024_01_05_041217_create_update_database_table', 1),
(56, '2024_01_08_080702_create_history_table', 1),
(57, '2024_01_22_072314_create_update_database_table', 1),
(58, '2024_01_23_032808_insert_col_delivery_table', 1),
(59, '2024_01_23_040005_create_invitations_table', 1),
(60, '2024_01_24_035534_insert_col_represent_guest_table', 1),
(61, '2024_01_24_154629_create_user_workspaces_table', 1),
(62, '2024_01_31_085935_create_update_database_table', 1),
(63, '2024_02_01_163019_insert_col_attachment_table', 1),
(64, '2024_02_20_112050_create_update_database_table', 1),
(65, '2024_02_23_170827_create_numberbill_bill_sale_table', 1),
(66, '2024_02_28_114550_create_code_delivery_delivery_table', 1),
(67, '2024_03_04_160220_create_code_payment_pay_export_table', 1),
(68, '2024_03_06_175749_create_update_database_table', 1),
(69, '2024_03_11_101816_create_status_detail_export_table', 1),
(70, '2024_03_12_120225_create_update_database_table', 1),
(71, '2024_03_20_122359_create_user_flow_database_table', 1),
(72, '2024_03_22_120225_create_update_user_table', 1),
(73, '2024_03_29_095706_create_update_database_table', 1),
(74, '2024_04_01_142552_create_update_database_table', 1),
(75, '2024_04_02_162938_create_update_database_table', 1),
(76, '2024_04_03_162938_create_update_history_table', 1),
(77, '2024_04_04_095907_create_update_database_table', 1),
(78, '2024_04_15_091505_create_update_database_table', 1),
(79, '2024_04_16_110134_create_update_database_table', 1),
(80, '2024_04_17_095907_create_update_roles_permission', 1),
(81, '2024_05_04_095021_create_update_database_table', 1),
(82, '2024_05_07_135518_create_update_database_table', 1),
(83, '2024_05_11_135742_create_update_database_table', 1),
(84, '2024_05_13_155633_create_update_database_table', 1),
(85, '2024_05_22_090138_create_update_database_table', 1),
(86, '2024_05_22_092306_create_groups_table', 1),
(87, '2024_05_22_135518 update_database_workspaceid', 1),
(88, '2024_05_22_155024_add_debt_limit_and_initial_debt_to_groups_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pay_export`
--

CREATE TABLE `pay_export` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `detailexport_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `code_payment` varchar(255) DEFAULT NULL,
  `payment_date` date NOT NULL,
  `total` decimal(20,4) NOT NULL,
  `payment` decimal(20,4) NOT NULL,
  `debt` decimal(20,4) NOT NULL,
  `payment_day` datetime DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `pay_export`
--

INSERT INTO `pay_export` (`id`, `detailexport_id`, `guest_id`, `code_payment`, `payment_date`, `total`, `payment`, `debt`, `payment_day`, `payment_type`, `status`, `workspace_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'MTT-1', '2024-05-30', 23925000.0000, 0.0000, 23925000.0000, '2024-05-30 18:05:48', 'Tiền mặt', 6, NULL, 1, '2024-05-30 11:06:12', '2024-05-30 11:06:12'),
(2, 2, 8, 'MTT-2', '2024-05-30', 11600000.0000, 0.0000, 11600000.0000, '2024-05-30 18:06:28', 'Tiền mặt', 6, NULL, 1, '2024-05-30 11:07:01', '2024-05-30 11:07:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pay_order`
--

CREATE TABLE `pay_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `detailimport_id` int(11) NOT NULL,
  `provide_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `payment_code` varchar(255) DEFAULT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `payment_date` date NOT NULL,
  `total` decimal(20,4) NOT NULL,
  `payment` decimal(20,4) NOT NULL,
  `debt` decimal(20,4) NOT NULL,
  `payment_day` datetime DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `pay_order`
--

INSERT INTO `pay_order` (`id`, `detailimport_id`, `provide_id`, `status`, `payment_code`, `workspace_id`, `user_id`, `payment_date`, `total`, `payment`, `debt`, `payment_day`, `payment_type`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, 'MTT-01', NULL, 1, '2024-05-30', 63675000.0000, 0.0000, 63675000.0000, '2024-05-30 18:03:26', 'Tiền mặt', '2024-05-30 11:04:02', NULL),
(2, 2, 2, 5, 'MTT-02', NULL, 1, '2024-05-30', 190740000.0000, 0.0000, 190740000.0000, '2024-05-30 18:04:16', 'Tiền mặt', '2024-05-30 11:05:03', NULL),
(3, 3, 8, 5, 'MTT-03', NULL, 1, '2024-05-30', 77666000.0000, 0.0000, 77666000.0000, '2024-05-30 18:05:12', 'Tiền mặt', '2024-05-30 11:05:40', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) DEFAULT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_unit` varchar(255) DEFAULT NULL,
  `product_type` varchar(255) DEFAULT NULL,
  `product_manufacturer` varchar(255) DEFAULT NULL,
  `product_origin` varchar(255) DEFAULT NULL,
  `product_guarantee` varchar(255) DEFAULT NULL,
  `product_price_import` decimal(20,4) DEFAULT NULL,
  `product_price_export` decimal(20,4) DEFAULT NULL,
  `product_ratio` varchar(255) DEFAULT NULL,
  `product_tax` int(11) DEFAULT NULL,
  `product_inventory` decimal(20,4) DEFAULT NULL,
  `product_trade` decimal(20,4) DEFAULT NULL,
  `product_available` decimal(20,4) DEFAULT NULL,
  `check_seri` int(11) DEFAULT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `product_weight` decimal(20,4) DEFAULT NULL,
  `price_specialsale` decimal(20,4) DEFAULT NULL,
  `price_wholesale` decimal(20,4) DEFAULT NULL,
  `price_retail` decimal(20,4) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `type`, `product_code`, `product_name`, `product_unit`, `product_type`, `product_manufacturer`, `product_origin`, `product_guarantee`, `product_price_import`, `product_price_export`, `product_ratio`, `product_tax`, `product_inventory`, `product_trade`, `product_available`, `check_seri`, `workspace_id`, `user_id`, `category_id`, `product_weight`, `price_specialsale`, `price_wholesale`, `price_retail`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'WDS500G3B0A', 'Ổ cứng Western SSD 500GB/2.5\" 7mm Sata3 màu xanh _Blue(WDS500G3B0A)', 'Cái', NULL, NULL, NULL, NULL, 0.0000, 0.0000, '0', 10, 1.0000, 0.0000, 0.0000, 0, NULL, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-05-30 10:51:40', '2024-05-30 11:07:01'),
(2, 1, 'LQ-590', 'Đầu kim Epson LQ-590', 'Cái', NULL, NULL, NULL, NULL, 0.0000, 0.0000, '0', 8, 2.0000, 0.0000, 0.0000, 0, NULL, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-05-30 10:51:58', '2024-05-30 11:07:01'),
(3, 1, 'KXTS500', 'Điện thoại có dây Panasonic KXTS500', 'Cái', NULL, NULL, NULL, NULL, 0.0000, 0.0000, '0', 8, 5.0000, 0.0000, 0.0000, 0, NULL, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-05-30 10:52:25', '2024-05-30 11:04:01'),
(4, 1, 'CBS110-8T-D-EU', 'Thiết bị chuyển mạch Cisco SB CBS110 Unmanaged 8- port GE, Desktop, Ext PS_CBS110-8T-D-EU', 'Cái', NULL, NULL, NULL, NULL, 0.0000, 0.0000, '0', 0, 6.0000, 0.0000, 0.0000, 0, NULL, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-05-30 10:52:40', '2024-05-30 11:04:01'),
(5, 1, NULL, 'Thiết bị Switch 2960-48 port POE', 'Chiếc', NULL, NULL, NULL, NULL, 0.0000, 0.0000, '0', 0, 8.0000, 0.0000, 0.0000, 0, NULL, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-05-30 10:53:03', '2024-05-30 11:05:40'),
(6, 1, 'R809797', 'Dây cáp mạng R&M Cat6 R809797', 'M', NULL, NULL, NULL, NULL, 0.0000, 0.0000, '0', 0, 4.0000, 0.0000, 0.0000, 0, NULL, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-05-30 10:53:20', '2024-05-30 11:05:40'),
(7, 1, 'DA-8IP2B21-TI', 'Camera quan sát DA-8IP2B21-TI', 'Cái', NULL, NULL, NULL, NULL, 0.0000, 0.0000, '0', 10, 10.0000, 0.0000, 0.0000, 0, NULL, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-05-30 10:53:35', '2024-05-30 11:05:03'),
(8, 1, 'SP01', 'Điện thoại không dây Panasonic KXTGF310', 'Cái', NULL, NULL, NULL, NULL, 0.0000, 0.0000, '0', 10, 9.0000, 0.0000, 0.0000, 0, NULL, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-05-30 10:53:45', '2024-05-30 11:05:03'),
(9, 1, 'KXTS500', 'APPLE IPAD GEN 9TH 10.2 INCH WIFI 64GB- XÁM', 'Chiếc', NULL, NULL, NULL, NULL, 0.0000, 0.0000, '0', 10, 6.0000, 0.0000, 0.0000, 0, NULL, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-05-30 10:54:04', '2024-05-30 11:06:12'),
(10, 1, 'T82', 'Máy in bill Epson T82 III ( USB và LAN , P/n C31CH51542 )', 'Chiếc', NULL, NULL, NULL, NULL, 0.0000, 0.0000, '0', 10, 5.0000, 0.0000, 0.0000, 0, NULL, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-05-30 10:54:30', '2024-05-30 11:06:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_import`
--

CREATE TABLE `products_import` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `detailimport_id` int(11) NOT NULL,
  `quoteImport_id` int(11) NOT NULL,
  `product_qty` decimal(20,4) NOT NULL,
  `cbSN` int(11) DEFAULT NULL,
  `product_guarantee` varchar(255) DEFAULT NULL,
  `receive_id` int(11) DEFAULT NULL,
  `reciept_id` int(11) DEFAULT NULL,
  `payOrder_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products_import`
--

INSERT INTO `products_import` (`id`, `detailimport_id`, `quoteImport_id`, `product_qty`, `cbSN`, `product_guarantee`, `receive_id`, `reciept_id`, `payOrder_id`, `product_id`, `workspace_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3.0000, 0, NULL, NULL, NULL, 1, NULL, NULL, 1, '2024-05-30 11:04:01', NULL),
(2, 1, 2, 4.0000, 0, NULL, NULL, NULL, 1, NULL, NULL, 1, '2024-05-30 11:04:01', NULL),
(3, 1, 3, 5.0000, 0, NULL, NULL, NULL, 1, NULL, NULL, 1, '2024-05-30 11:04:02', NULL),
(4, 1, 4, 6.0000, 0, NULL, NULL, NULL, 1, NULL, NULL, 1, '2024-05-30 11:04:02', NULL),
(5, 2, 5, 7.0000, 0, NULL, NULL, NULL, 2, NULL, NULL, 1, '2024-05-30 11:05:03', NULL),
(6, 2, 6, 8.0000, 0, NULL, NULL, NULL, 2, NULL, NULL, 1, '2024-05-30 11:05:03', NULL),
(7, 2, 7, 9.0000, 0, NULL, NULL, NULL, 2, NULL, NULL, 1, '2024-05-30 11:05:03', NULL),
(8, 2, 8, 10.0000, 0, NULL, NULL, NULL, 2, NULL, NULL, 1, '2024-05-30 11:05:03', NULL),
(9, 3, 9, 4.0000, 0, NULL, NULL, NULL, 3, NULL, NULL, 1, '2024-05-30 11:05:40', NULL),
(10, 3, 10, 8.0000, 0, NULL, NULL, NULL, 3, NULL, NULL, 1, '2024-05-30 11:05:40', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_bill`
--

CREATE TABLE `product_bill` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `billSale_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `billSale_qty` decimal(20,4) DEFAULT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_pay`
--

CREATE TABLE `product_pay` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pay_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `pay_qty` decimal(20,4) DEFAULT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_pay`
--

INSERT INTO `product_pay` (`id`, `pay_id`, `product_id`, `pay_qty`, `workspace_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 2.0000, NULL, 1, '2024-05-30 11:06:12', '2024-05-30 11:06:12'),
(2, 1, 9, 2.0000, NULL, 1, '2024-05-30 11:06:12', '2024-05-30 11:06:12'),
(3, 2, 2, 2.0000, NULL, 1, '2024-05-30 11:07:01', '2024-05-30 11:07:01'),
(4, 2, 1, 2.0000, NULL, 1, '2024-05-30 11:07:01', '2024-05-30 11:07:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `project`
--

CREATE TABLE `project` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `project`
--

INSERT INTO `project` (`id`, `project_name`, `workspace_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Dự án 1', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `provides`
--

CREATE TABLE `provides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provide_name_display` varchar(255) NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `provide_name` varchar(255) DEFAULT NULL,
  `provide_address` varchar(255) NOT NULL,
  `provide_code` varchar(255) NOT NULL,
  `provide_represent` varchar(255) DEFAULT NULL,
  `provide_email` varchar(255) DEFAULT NULL,
  `provide_phone` varchar(255) DEFAULT NULL,
  `provide_fax` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `quota_debt` decimal(20,4) DEFAULT NULL,
  `provide_debt` decimal(20,4) NOT NULL,
  `provide_address_delivery` varchar(255) DEFAULT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `provides`
--

INSERT INTO `provides` (`id`, `provide_name_display`, `key`, `provide_name`, `provide_address`, `provide_code`, `provide_represent`, `provide_email`, `provide_phone`, `provide_fax`, `category_id`, `quota_debt`, `provide_debt`, `provide_address_delivery`, `workspace_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Nhà cung cấp 1', 'N', NULL, 'Q9', '123', NULL, NULL, NULL, NULL, NULL, NULL, 63675000.0000, NULL, NULL, NULL, NULL, '2024-05-30 11:04:02'),
(2, 'Nhà cung cấp 2', 'N1', NULL, 'QTD', '456', NULL, NULL, NULL, NULL, NULL, NULL, 190740000.0000, NULL, NULL, NULL, NULL, '2024-05-30 11:05:03'),
(3, 'Nhà cung cấp 3', 'N2', NULL, 'Q90', '7845', NULL, NULL, NULL, NULL, NULL, NULL, 0.0000, NULL, NULL, NULL, NULL, NULL),
(4, 'Nhà cung cấp 4', 'N3', NULL, 'QGB', '4545455', NULL, NULL, NULL, NULL, NULL, NULL, 0.0000, NULL, NULL, NULL, NULL, NULL),
(5, 'Nhà cung cấp 5', 'N4', NULL, 'Q90', '45455', NULL, NULL, NULL, NULL, NULL, NULL, 0.0000, NULL, NULL, NULL, NULL, NULL),
(6, 'Nhà cung cấp 6', 'N5', NULL, 'QTB', '445545', NULL, NULL, NULL, NULL, NULL, NULL, 0.0000, NULL, NULL, NULL, NULL, NULL),
(7, 'Nhà cung cấp 7', 'N6', NULL, 'QYY', '5455545', NULL, NULL, NULL, NULL, NULL, NULL, 0.0000, NULL, NULL, NULL, NULL, NULL),
(8, 'Nhà cung cấp 8', 'N7', NULL, 'QU', '454547878', NULL, NULL, NULL, NULL, NULL, NULL, 77666000.0000, NULL, NULL, NULL, NULL, '2024-05-30 11:05:40'),
(9, 'Nhà cung cấp 9', 'N8', NULL, 'QUU', '12121212', NULL, NULL, NULL, NULL, NULL, NULL, 0.0000, NULL, NULL, NULL, NULL, NULL),
(10, 'Nhà cung cấp 10', 'N9', NULL, 'AYU', '445454', NULL, NULL, NULL, NULL, NULL, NULL, 0.0000, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quoteexport`
--

CREATE TABLE `quoteexport` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `detailexport_id` bigint(20) UNSIGNED NOT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_unit` varchar(255) NOT NULL,
  `product_qty` decimal(20,4) NOT NULL,
  `product_tax` int(11) NOT NULL,
  `product_total` decimal(20,4) NOT NULL,
  `price_export` decimal(20,4) NOT NULL,
  `product_ratio` int(11) DEFAULT NULL,
  `price_import` decimal(20,4) DEFAULT NULL,
  `product_note` varchar(255) DEFAULT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `promotion` decimal(20,4) DEFAULT NULL,
  `promotion_type` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deliver_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty_delivery` decimal(20,4) DEFAULT NULL,
  `qty_bill_sale` decimal(20,4) DEFAULT NULL,
  `qty_payment` decimal(20,4) DEFAULT NULL,
  `product_delivery` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quoteexport`
--

INSERT INTO `quoteexport` (`id`, `detailexport_id`, `product_code`, `product_name`, `product_unit`, `product_qty`, `product_tax`, `product_total`, `price_export`, `product_ratio`, `price_import`, `product_note`, `workspace_id`, `user_id`, `promotion`, `promotion_type`, `created_at`, `updated_at`, `deliver_id`, `product_id`, `qty_delivery`, `qty_bill_sale`, `qty_payment`, `product_delivery`, `status`) VALUES
(1, 1, 'T82', 'Máy in bill Epson T82 III ( USB và LAN , P/n C31CH51542 )', 'Chiếc', 2.0000, 10, 5000000.0000, 2500000.0000, 0, NULL, NULL, NULL, 1, 100000.0000, 1, '2024-05-30 11:06:12', '2024-05-30 11:06:12', NULL, 10, NULL, NULL, 2.0000, NULL, 1),
(2, 1, 'KXTS500', 'APPLE IPAD GEN 9TH 10.2 INCH WIFI 64GB- XÁM', 'Chiếc', 2.0000, 10, 17000000.0000, 8500000.0000, 0, NULL, NULL, NULL, 1, 150000.0000, 1, '2024-05-30 11:06:12', '2024-05-30 11:06:12', NULL, 9, NULL, NULL, 2.0000, NULL, 1),
(3, 2, 'LQ-590', 'Đầu kim Epson LQ-590', 'Cái', 2.0000, 8, 5000000.0000, 2500000.0000, 0, NULL, NULL, NULL, 1, 1500000.0000, 1, '2024-05-30 11:07:01', '2024-05-30 11:07:01', NULL, 2, NULL, NULL, 2.0000, NULL, 1),
(4, 2, 'WDS500G3B0A', 'Ổ cứng Western SSD 500GB/2.5\" 7mm Sata3 màu xanh _Blue(WDS500G3B0A)', 'Cái', 2.0000, 10, 7200000.0000, 3600000.0000, 0, NULL, NULL, NULL, 1, 50000.0000, 1, '2024-05-30 11:07:01', '2024-05-30 11:07:01', NULL, 1, NULL, NULL, 2.0000, NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quoteimport`
--

CREATE TABLE `quoteimport` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `detailimport_id` bigint(20) UNSIGNED NOT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_unit` varchar(255) NOT NULL,
  `product_qty` decimal(20,4) NOT NULL,
  `product_tax` int(11) NOT NULL,
  `product_total` decimal(20,4) NOT NULL,
  `price_export` decimal(20,4) NOT NULL,
  `product_note` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `receive_qty` decimal(20,4) DEFAULT NULL,
  `reciept_qty` decimal(20,4) DEFAULT NULL,
  `payment_qty` decimal(20,4) DEFAULT NULL,
  `version` int(11) NOT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `promotion` decimal(20,4) DEFAULT NULL,
  `promotion_type` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `receive_id` int(11) DEFAULT NULL,
  `warehouse_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quoteimport`
--

INSERT INTO `quoteimport` (`id`, `detailimport_id`, `product_code`, `product_name`, `product_unit`, `product_qty`, `product_tax`, `product_total`, `price_export`, `product_note`, `product_id`, `receive_qty`, `reciept_qty`, `payment_qty`, `version`, `workspace_id`, `user_id`, `promotion`, `promotion_type`, `created_at`, `updated_at`, `receive_id`, `warehouse_id`) VALUES
(1, 1, 'WDS500G3B0A', 'Ổ cứng Western SSD 500GB/2.5\" 7mm Sata3 màu xanh _Blue(WDS500G3B0A)', 'Cái', 3.0000, 10, 4500000.0000, 1500000.0000, NULL, 1, 0.0000, 0.0000, 3.0000, 1, NULL, 1, 150000.0000, 1, '2024-05-30 11:04:01', '2024-05-30 11:04:01', 0, 1),
(2, 1, 'LQ-590', 'Đầu kim Epson LQ-590', 'Cái', 4.0000, 8, 10000000.0000, 2500000.0000, NULL, 2, 0.0000, 0.0000, 4.0000, 1, NULL, 1, NULL, 1, '2024-05-30 11:04:01', '2024-05-30 11:04:01', 0, 1),
(3, 1, 'KXTS500', 'Điện thoại có dây Panasonic KXTS500', 'Cái', 5.0000, 8, 18000000.0000, 3600000.0000, NULL, 3, 0.0000, 0.0000, 5.0000, 1, NULL, 1, NULL, 1, '2024-05-30 11:04:01', '2024-05-30 11:04:02', 0, 1),
(4, 1, 'CBS110-8T-D-EU', 'Thiết bị chuyển mạch Cisco SB CBS110 Unmanaged 8- port GE, Desktop, Ext PS_CBS110-8T-D-EU', 'Cái', 6.0000, 0, 28800000.0000, 4800000.0000, NULL, 4, 0.0000, 0.0000, 6.0000, 1, NULL, 1, NULL, 1, '2024-05-30 11:04:01', '2024-05-30 11:04:02', 0, 1),
(5, 2, 'T82', 'Máy in bill Epson T82 III ( USB và LAN , P/n C31CH51542 )', 'Chiếc', 7.0000, 10, 24500000.0000, 3500000.0000, NULL, 10, 0.0000, 0.0000, 7.0000, 1, NULL, 1, NULL, 1, '2024-05-30 11:05:03', '2024-05-30 11:05:03', 0, 1),
(6, 2, 'KXTS500', 'APPLE IPAD GEN 9TH 10.2 INCH WIFI 64GB- XÁM', 'Chiếc', 8.0000, 10, 44000000.0000, 5500000.0000, NULL, 9, 0.0000, 0.0000, 8.0000, 1, NULL, 1, 1500000.0000, 1, '2024-05-30 11:05:03', '2024-05-30 11:05:03', 0, 1),
(7, 2, 'SP01', 'Điện thoại không dây Panasonic KXTGF310', 'Cái', 9.0000, 10, 43200000.0000, 4800000.0000, NULL, 8, 0.0000, 0.0000, 9.0000, 1, NULL, 1, NULL, 1, '2024-05-30 11:05:03', '2024-05-30 11:05:03', 0, 1),
(8, 2, 'DA-8IP2B21-TI', 'Camera quan sát DA-8IP2B21-TI', 'Cái', 10.0000, 10, 64000000.0000, 6400000.0000, NULL, 7, 0.0000, 0.0000, 10.0000, 1, NULL, 1, 800000.0000, 1, '2024-05-30 11:05:03', '2024-05-30 11:05:03', 0, 1),
(9, 3, 'R809797', 'Dây cáp mạng R&M Cat6 R809797', 'M', 4.0000, 0, 31416000.0000, 7854000.0000, NULL, 6, 0.0000, 0.0000, 4.0000, 1, NULL, 1, 150000.0000, 1, '2024-05-30 11:05:40', '2024-05-30 11:05:40', 0, 1),
(10, 3, NULL, 'Thiết bị Switch 2960-48 port POE', 'Chiếc', 8.0000, 0, 46400000.0000, 5800000.0000, NULL, 5, 0.0000, 0.0000, 8.0000, 1, NULL, 1, NULL, 1, '2024-05-30 11:05:40', '2024-05-30 11:05:40', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `receive_bill`
--

CREATE TABLE `receive_bill` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `detailimport_id` int(11) NOT NULL,
  `provide_id` int(11) NOT NULL,
  `shipping_unit` varchar(255) DEFAULT NULL,
  `delivery_charges` decimal(20,4) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `delivery_code` varchar(255) DEFAULT NULL,
  `total_tax` decimal(20,4) DEFAULT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reciept`
--

CREATE TABLE `reciept` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `detailimport_id` int(11) NOT NULL,
  `provide_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `price_total` decimal(20,4) NOT NULL,
  `date_bill` datetime NOT NULL,
  `number_bill` varchar(255) NOT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `represent_guest`
--

CREATE TABLE `represent_guest` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guest_id` int(11) NOT NULL,
  `represent_name` varchar(255) NOT NULL,
  `represent_email` varchar(255) DEFAULT NULL,
  `represent_phone` varchar(255) DEFAULT NULL,
  `represent_address` varchar(255) DEFAULT NULL,
  `default_guest` int(11) DEFAULT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `represent_provide`
--

CREATE TABLE `represent_provide` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provide_id` int(11) NOT NULL,
  `represent_name` varchar(255) NOT NULL,
  `represent_email` varchar(255) DEFAULT NULL,
  `represent_phone` varchar(255) DEFAULT NULL,
  `represent_address` varchar(255) DEFAULT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `default` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `shortname` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `permission` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `workspace_id`, `shortname`, `description`, `permission`, `created_at`, `updated_at`) VALUES
(1, 'SupperADMIN', NULL, 'spAdmin', 'SupperADMIN', NULL, NULL, NULL),
(2, 'Admin', NULL, 'admin', 'Admin', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `serialnumber`
--

CREATE TABLE `serialnumber` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serinumber` varchar(255) NOT NULL,
  `receive_id` int(11) NOT NULL,
  `detailimport_id` int(11) NOT NULL,
  `quoteImport_id` int(11) DEFAULT NULL,
  `detailexport_id` int(11) NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivery_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4u5u5iUBtJCTnjVvpoUUfib3xFN8y2ENyUoI9lge', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiczBXcGJmUWNLdjlQc3F6VHlpRlc3UmN5YktiUzVKWDNvRFB0VlR5aiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9pbnZlbnRvcnkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJE8xZHNILmZ3YTNkMmhYZW1DOG1ybXVIT0E2MUcwNE9Sc1RITmMvNnFXY2d6dXYvaUp5LjJ1Ijt9', 1717067276),
('YGYUCsgOJOtIap7553e6bm995DC1qqSMeJqu3tUN', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiU0QzWnFXajg3SHlCeXNQQXBIUU1QWFlKZXFFYTZ2aldHcUc1Z0oxTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm92aWRlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkWER6V01IMWxyODhWV1JBQkxPN21VZThDZ0tNSkFsNktPTFZodm5QZy41Y1dyblB1V0JONFMiO30=', 1717066993);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `user_code` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `provider` varchar(255) NOT NULL,
  `provider_id` varchar(255) NOT NULL,
  `current_workspace` bigint(20) UNSIGNED DEFAULT NULL,
  `origin_workspace` bigint(20) UNSIGNED DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `roleid` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `group_id`, `user_code`, `email_verified_at`, `provider`, `provider_id`, `current_workspace`, `origin_workspace`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `roleid`, `status`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `phone_number`) VALUES
(1, 'Admin', 'admin@ringnet.vn', NULL, NULL, NULL, 'login', '1', 1, 1, '$2y$10$O1dsH.fwa3d2hXemC8mrmuHOA61G04ORsTHNc/6qWcgzuv/iJy.2u', NULL, NULL, NULL, '1', 1, NULL, NULL, NULL, '2024-05-30 10:50:38', '2024-05-30 10:50:38', NULL),
(2, 'User1', 'user1@mail.com', NULL, NULL, NULL, 'login', '1', 1, NULL, '$2y$10$XDzWMH1lr88VWRABLO7mUe8CgKMJAl6KOLVhvnPg.5cWrnPuWBN4S', NULL, NULL, NULL, '2', 1, NULL, NULL, NULL, '2024-05-30 11:02:45', '2024-05-30 11:02:45', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_flow`
--

CREATE TABLE `user_flow` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity_type` varchar(255) NOT NULL,
  `activity_description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_flow`
--

INSERT INTO `user_flow` (`id`, `user_id`, `activity_type`, `activity_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'SP', 'Lưu nhóm sản phẩm', '2024-05-30 10:54:46', '2024-05-30 10:54:46'),
(2, 1, 'SP', 'Lưu nhóm sản phẩm', '2024-05-30 10:54:54', '2024-05-30 10:54:54'),
(3, 1, 'SP', 'Lưu nhóm sản phẩm', '2024-05-30 10:55:01', '2024-05-30 10:55:01'),
(4, 1, 'KH', 'Tạo mới', '2024-05-30 10:55:06', '2024-05-30 10:55:06'),
(5, 1, 'KH', 'Lưu khách hàng', '2024-05-30 10:55:23', '2024-05-30 10:55:23'),
(6, 1, 'KH', 'Tạo mới', '2024-05-30 10:55:26', '2024-05-30 10:55:26'),
(7, 1, 'KH', 'Lưu khách hàng', '2024-05-30 10:55:38', '2024-05-30 10:55:38'),
(8, 1, 'KH', 'Tạo mới', '2024-05-30 10:55:40', '2024-05-30 10:55:40'),
(9, 1, 'KH', 'Lưu khách hàng', '2024-05-30 10:55:49', '2024-05-30 10:55:49'),
(10, 1, 'KH', 'Tạo mới', '2024-05-30 10:55:52', '2024-05-30 10:55:52'),
(11, 1, 'KH', 'Lưu khách hàng', '2024-05-30 10:56:04', '2024-05-30 10:56:04'),
(12, 1, 'KH', 'Tạo mới', '2024-05-30 10:56:06', '2024-05-30 10:56:06'),
(13, 1, 'KH', 'Lưu khách hàng', '2024-05-30 10:56:22', '2024-05-30 10:56:22'),
(14, 1, 'KH', 'Tạo mới', '2024-05-30 10:56:26', '2024-05-30 10:56:26'),
(15, 1, 'KH', 'Lưu khách hàng', '2024-05-30 10:56:42', '2024-05-30 10:56:42'),
(16, 1, 'KH', 'Tạo mới', '2024-05-30 10:56:44', '2024-05-30 10:56:44'),
(17, 1, 'KH', 'Lưu khách hàng', '2024-05-30 10:57:00', '2024-05-30 10:57:00'),
(18, 1, 'KH', 'Tạo mới', '2024-05-30 10:57:03', '2024-05-30 10:57:03'),
(19, 1, 'KH', 'Lưu khách hàng', '2024-05-30 10:57:18', '2024-05-30 10:57:18'),
(20, 1, 'KH', 'Tạo mới', '2024-05-30 10:57:22', '2024-05-30 10:57:22'),
(21, 1, 'KH', 'Lưu khách hàng', '2024-05-30 10:57:32', '2024-05-30 10:57:32'),
(22, 1, 'KH', 'Tạo mới', '2024-05-30 10:57:34', '2024-05-30 10:57:34'),
(23, 1, 'KH', 'Tạo mới', '2024-05-30 10:57:43', '2024-05-30 10:57:43'),
(24, 1, 'KH', 'Lưu khách hàng', '2024-05-30 10:57:53', '2024-05-30 10:57:53'),
(25, 1, 'BG', 'Tạo mới', '2024-05-30 11:02:17', '2024-05-30 11:02:17'),
(26, 1, 'BG', 'Tạo mới', '2024-05-30 11:03:17', '2024-05-30 11:03:17'),
(27, 1, 'BG', 'Thêm sản phẩm', '2024-05-30 11:03:21', '2024-05-30 11:03:21'),
(28, 1, 'DMH', 'Tạo mới', '2024-05-30 11:03:26', NULL),
(29, 1, 'DMH', 'Thêm sản phẩm', '2024-05-30 11:03:28', NULL),
(30, 1, 'DMH', 'Tạo mới đơn mua hàng', '2024-05-30 11:04:01', NULL),
(31, 1, 'TTMH', 'Xác nhận thanh toán mua hàng', '2024-05-30 11:04:02', NULL),
(32, 1, 'DMH', 'Tạo mới', '2024-05-30 11:04:15', NULL),
(33, 1, 'DMH', 'Thêm sản phẩm', '2024-05-30 11:04:17', NULL),
(34, 1, 'DMH', 'Tạo mới đơn mua hàng', '2024-05-30 11:05:03', NULL),
(35, 1, 'TTMH', 'Xác nhận thanh toán mua hàng', '2024-05-30 11:05:03', NULL),
(36, 1, 'DMH', 'Tạo mới', '2024-05-30 11:05:12', NULL),
(37, 1, 'DMH', 'Thêm sản phẩm', '2024-05-30 11:05:15', NULL),
(38, 1, 'DMH', 'Tạo mới đơn mua hàng', '2024-05-30 11:05:40', NULL),
(39, 1, 'TTMH', 'Xác nhận thanh toán mua hàng', '2024-05-30 11:05:40', NULL),
(40, 1, 'BG', 'Tạo mới', '2024-05-30 11:05:47', '2024-05-30 11:05:47'),
(41, 1, 'BG', 'Thêm sản phẩm', '2024-05-30 11:05:52', '2024-05-30 11:05:52'),
(42, 1, 'BG', 'Thêm sản phẩm', '2024-05-30 11:05:59', '2024-05-30 11:05:59'),
(43, 1, 'BG', 'Xác nhận bán hàng', '2024-05-30 11:06:12', '2024-05-30 11:06:12'),
(44, 1, 'BG', 'Tạo mới', '2024-05-30 11:06:28', '2024-05-30 11:06:28'),
(45, 1, 'BG', 'Thêm sản phẩm', '2024-05-30 11:06:32', '2024-05-30 11:06:32'),
(46, 1, 'BG', 'Thêm sản phẩm', '2024-05-30 11:06:36', '2024-05-30 11:06:36'),
(47, 1, 'BG', 'Xác nhận bán hàng', '2024-05-30 11:07:01', '2024-05-30 11:07:01'),
(48, 1, 'BG', 'Tạo mới', '2024-05-30 11:07:03', '2024-05-30 11:07:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_workspaces`
--

CREATE TABLE `user_workspaces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `workspace_id` bigint(20) UNSIGNED DEFAULT NULL,
  `roleid` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `warehouse`
--

CREATE TABLE `warehouse` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `warehouse_name` varchar(255) NOT NULL,
  `workspace_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `warehouse`
--

INSERT INTO `warehouse` (`id`, `warehouse_name`, `workspace_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Kho 1', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `workspaces`
--

CREATE TABLE `workspaces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `workspace_name` varchar(255) DEFAULT NULL,
  `number_bank` varchar(255) DEFAULT NULL,
  `name_bank` varchar(255) DEFAULT NULL,
  `mst` varchar(255) DEFAULT NULL,
  `address_company` varchar(255) DEFAULT NULL,
  `name_company` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `workspaces`
--

INSERT INTO `workspaces` (`id`, `user_id`, `workspace_name`, `number_bank`, `name_bank`, `mst`, `address_company`, `name_company`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ringnet', NULL, NULL, NULL, NULL, 'Ringnet', '2024-05-30 10:50:38', '2024-05-30 10:50:38');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `attachment`
--
ALTER TABLE `attachment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bill_sale`
--
ALTER TABLE `bill_sale`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `content-import-export`
--
ALTER TABLE `content-import-export`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `date_form`
--
ALTER TABLE `date_form`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `delivered`
--
ALTER TABLE `delivered`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `detailexport`
--
ALTER TABLE `detailexport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detailexport_guest_id_foreign` (`guest_id`),
  ADD KEY `detailexport_project_id_foreign` (`project_id`),
  ADD KEY `detailexport_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `detailimport`
--
ALTER TABLE `detailimport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detailimport_provide_id_foreign` (`provide_id`),
  ADD KEY `detailimport_project_id_foreign` (`project_id`),
  ADD KEY `detailimport_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `guest_dateform`
--
ALTER TABLE `guest_dateform`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_workspace_id_foreign` (`workspace_id`);

--
-- Chỉ mục cho bảng `history_import`
--
ALTER TABLE `history_import`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history_payment_export`
--
ALTER TABLE `history_payment_export`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history_payment_order`
--
ALTER TABLE `history_payment_order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `invitations`
--
ALTER TABLE `invitations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invitations_workspace_id_foreign` (`workspace_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `pay_export`
--
ALTER TABLE `pay_export`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `pay_order`
--
ALTER TABLE `pay_order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products_import`
--
ALTER TABLE `products_import`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_bill`
--
ALTER TABLE `product_bill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_pay`
--
ALTER TABLE `product_pay`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `provides`
--
ALTER TABLE `provides`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `quoteexport`
--
ALTER TABLE `quoteexport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quoteexport_detailexport_id_foreign` (`detailexport_id`);

--
-- Chỉ mục cho bảng `quoteimport`
--
ALTER TABLE `quoteimport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quoteimport_detailimport_id_foreign` (`detailimport_id`);

--
-- Chỉ mục cho bảng `receive_bill`
--
ALTER TABLE `receive_bill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reciept`
--
ALTER TABLE `reciept`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `represent_guest`
--
ALTER TABLE `represent_guest`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `represent_provide`
--
ALTER TABLE `represent_provide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `serialnumber`
--
ALTER TABLE `serialnumber`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serialnumber_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `user_flow`
--
ALTER TABLE `user_flow`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_workspaces`
--
ALTER TABLE `user_workspaces`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `workspaces`
--
ALTER TABLE `workspaces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `workspaces_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `attachment`
--
ALTER TABLE `attachment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `bill_sale`
--
ALTER TABLE `bill_sale`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `content-import-export`
--
ALTER TABLE `content-import-export`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `date_form`
--
ALTER TABLE `date_form`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `delivered`
--
ALTER TABLE `delivered`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `detailexport`
--
ALTER TABLE `detailexport`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `detailimport`
--
ALTER TABLE `detailimport`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `guest`
--
ALTER TABLE `guest`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `guest_dateform`
--
ALTER TABLE `guest_dateform`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `history`
--
ALTER TABLE `history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `history_import`
--
ALTER TABLE `history_import`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `history_payment_export`
--
ALTER TABLE `history_payment_export`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `history_payment_order`
--
ALTER TABLE `history_payment_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `invitations`
--
ALTER TABLE `invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT cho bảng `pay_export`
--
ALTER TABLE `pay_export`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `pay_order`
--
ALTER TABLE `pay_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `products_import`
--
ALTER TABLE `products_import`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `product_bill`
--
ALTER TABLE `product_bill`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_pay`
--
ALTER TABLE `product_pay`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `project`
--
ALTER TABLE `project`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `provides`
--
ALTER TABLE `provides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `quoteexport`
--
ALTER TABLE `quoteexport`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `quoteimport`
--
ALTER TABLE `quoteimport`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `receive_bill`
--
ALTER TABLE `receive_bill`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `reciept`
--
ALTER TABLE `reciept`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `represent_guest`
--
ALTER TABLE `represent_guest`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `represent_provide`
--
ALTER TABLE `represent_provide`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `serialnumber`
--
ALTER TABLE `serialnumber`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user_flow`
--
ALTER TABLE `user_flow`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `user_workspaces`
--
ALTER TABLE `user_workspaces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `workspaces`
--
ALTER TABLE `workspaces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `detailexport`
--
ALTER TABLE `detailexport`
  ADD CONSTRAINT `detailexport_guest_id_foreign` FOREIGN KEY (`guest_id`) REFERENCES `guest` (`id`);

--
-- Các ràng buộc cho bảng `detailimport`
--
ALTER TABLE `detailimport`
  ADD CONSTRAINT `detailimport_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`),
  ADD CONSTRAINT `detailimport_provide_id_foreign` FOREIGN KEY (`provide_id`) REFERENCES `provides` (`id`),
  ADD CONSTRAINT `detailimport_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_workspace_id_foreign` FOREIGN KEY (`workspace_id`) REFERENCES `workspaces` (`id`);

--
-- Các ràng buộc cho bảng `invitations`
--
ALTER TABLE `invitations`
  ADD CONSTRAINT `invitations_workspace_id_foreign` FOREIGN KEY (`workspace_id`) REFERENCES `workspaces` (`id`);

--
-- Các ràng buộc cho bảng `quoteexport`
--
ALTER TABLE `quoteexport`
  ADD CONSTRAINT `quoteexport_detailexport_id_foreign` FOREIGN KEY (`detailexport_id`) REFERENCES `detailexport` (`id`);

--
-- Các ràng buộc cho bảng `quoteimport`
--
ALTER TABLE `quoteimport`
  ADD CONSTRAINT `quoteimport_detailimport_id_foreign` FOREIGN KEY (`detailimport_id`) REFERENCES `detailimport` (`id`);

--
-- Các ràng buộc cho bảng `serialnumber`
--
ALTER TABLE `serialnumber`
  ADD CONSTRAINT `serialnumber_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `workspaces`
--
ALTER TABLE `workspaces`
  ADD CONSTRAINT `workspaces_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
