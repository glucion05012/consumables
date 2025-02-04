-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2025 at 02:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `consumables`
--

-- --------------------------------------------------------

--
-- Table structure for table `requeststocktemp`
--

CREATE TABLE `requeststocktemp` (
  `request_temp_id` int(20) NOT NULL,
  `ris_no` varchar(200) DEFAULT NULL,
  `stock_id` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `division` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `sku` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `product` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `description` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `amount` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `count` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `requested_by` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `timestamp` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `status` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requeststocktemp`
--

INSERT INTO `requeststocktemp` (`request_temp_id`, `ris_no`, `stock_id`, `division`, `sku`, `product`, `description`, `amount`, `count`, `requested_by`, `timestamp`, `status`) VALUES
(1, '2024-08-001', '6', NULL, 'PPMU-2023-06', 'Carbon film, A4 size', 'Carbon film, A4 size', '221', '5', 'AD-GSS', 'August 14, 2024 11:15:am  ', 'Completed'),
(2, '2024-08-001', '8', NULL, 'PPMU-2023-08', 'Cartolina, assorted colors', 'Cartolina, assorted colors', '3.67', '100', 'AD-GSS', 'August 14, 2024 11:16:am  ', 'Completed'),
(4, '2025-01-002', '6', NULL, 'PPMU-2023-06', 'Carbon film, A4 size', 'Carbon film, A4 size', '221', '2', 'AD-GSS', 'January 31, 2025 10:44:am  ', 'Completed'),
(5, '2025-01-002', '8', NULL, 'PPMU-2023-08', 'Cartolina, assorted colors', 'Cartolina, assorted colors', '3.67', '2', 'AD-GSS', 'January 31, 2025 10:44:am  ', 'Completed'),
(6, '2025-02-003', '1', NULL, 'PPMU-2023-01', 'Official Receipt', 'Official Receipt', '100', '2', 'AD-GSS', 'February 4, 2025 10:32:am  ', 'Completed'),
(7, '2025-02-003', '3', NULL, 'PPMU-2023-03', 'Binder clips, 19mm', 'Binder clips, 19mm', '8.76', '4', 'AD-GSS', 'February 4, 2025 10:32:am  ', 'Completed'),
(8, '2025-02-004', '156', NULL, '123109-3029374982367498-2', 'jbl speaker', 'small size', '3000', '3', 'AD-GSS', 'February 4, 2025 4:59:pm  ', 'For Delivery'),
(9, '2025-02-004', '8', NULL, 'PPMU-2023-08', 'Cartolina, assorted colors', 'Cartolina, assorted colors', '3.67', '9', 'AD-GSS', 'February 4, 2025 4:59:pm  ', 'For Delivery'),
(10, '2025-02-004', '9', NULL, 'PPMU-2023-09', 'Clearbook, A4 size', 'Clearbook, A4 size', '39.78', '1', 'AD-GSS', 'February 4, 2025 5:00:pm  ', 'Requested'),
(11, '2025-02-005', '106', NULL, 'PPMU-2023-109', 'USB hub, 2.0 HUB support 500GB, 4-ports (EMED-WAQMS)', 'USB hub, 2.0 HUB support 500GB, 4-ports (EMED-WAQMS)', '200', '6', 'AD-GSS', 'February 4, 2025 5:03:pm  ', 'For Delivery'),
(12, NULL, '156', NULL, '123109-3029374982367498-2', 'jbl speaker', 'small size', '3000', '2', 'AD-GSS', 'February 4, 2025 5:54:pm  ', 'Pending'),
(13, NULL, '8', NULL, 'PPMU-2023-08', 'Cartolina, assorted colors', 'Cartolina, assorted colors', '3.67', '10', 'AD-GSS', 'February 4, 2025 5:54:pm  ', 'Pending'),
(14, NULL, '9', NULL, 'PPMU-2023-09', 'Clearbook, A4 size', 'Clearbook, A4 size', '39.78', '1', 'AD-GSS', 'February 4, 2025 5:54:pm  ', 'Pending'),
(15, NULL, '111', NULL, 'PPMU-2023-114', 'Electric fan, industrial ground type (8-13-2021)', 'Electric fan, industrial ground type (8-13-2021)', '1,109.68', '1', 'AD-GSS', 'February 4, 2025 5:54:pm  ', 'Pending'),
(16, NULL, '111', NULL, 'PPMU-2023-114', 'Electric fan, industrial ground type (8-13-2021)', 'Electric fan, industrial ground type (8-13-2021)', '1,109.68', '1', 'AD-GSS', 'February 4, 2025 5:54:pm  ', 'Pending'),
(17, NULL, '118', NULL, 'PPMU-2023-121', 'File Folder w/ tab Legal', 'File Folder w/ tab Legal', '3.5', '40', 'AD-GSS', 'February 4, 2025 5:54:pm  ', 'Pending'),
(18, NULL, '120', NULL, 'PPMU-2023-123', 'Polaris PVC (instant id System)', 'Polaris PVC (instant id System)', '86.72', '50', 'AD-GSS', 'February 4, 2025 5:55:pm  ', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(20) NOT NULL,
  `engas_id` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `sku` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `product` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `description` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `rate` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `unit` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `threshold` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `amount` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `wish` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `engas_id`, `sku`, `product`, `description`, `rate`, `unit`, `threshold`, `amount`, `wish`) VALUES
(4, NULL, 'PPMU-2023-04', 'Bond paper with DENR letterhead, A4 size (new format)', 'Bond paper with DENR letterhead, A4 size (new format)', '5', 'ream', '10', '1000.30', ''),
(5, NULL, 'PPMU-2023-05', 'Bond paper with DENR letterhead, Legal size (new format)', 'Bond paper with DENR letterhead, Legal size (new format)', '10', 'ream', '10', '1200', ''),
(6, NULL, 'PPMU-2023-06', 'Carbon film, A4 size', 'Carbon film, A4 size', '9', 'pack', '10', '221', ''),
(7, NULL, 'PPMU-2023-07', 'Card case, A3, 115 x 92mm', 'Card case, A3, 115 x 92mm', '2', 'pc', '1', '6.25', ''),
(8, NULL, 'PPMU-2023-08', 'Cartolina, assorted colors', 'Cartolina, assorted colors', '510', 'pc', '50', '3.67', ''),
(9, NULL, 'PPMU-2023-09', 'Clearbook, A4 size', 'Clearbook, A4 size', '6', 'pc', '5', '39.78', ''),
(10, NULL, 'PPMU-2023-10', 'Clearbook, Legal size', 'Clearbook, Legal size', '5', 'pc', '5', '42.38', ''),
(11, NULL, 'PPMU-2023-11', 'Computer continuous form, 3 ply, 11 x 14.88 ADVANCE COMPUTER FORMS, INC.', 'Computer continuous form, 3 ply, 11 x 14.88 ADVANCE COMPUTER FORMS, INC.', '3', 'box', '2', '1034.80', ''),
(12, NULL, 'PPMU-2023-12', 'Computer continuous form, 3 ply, 280 x 378mm PREMIERE', 'Computer continuous form, 3 ply, 280 x 378mm PREMIERE', '3', 'box', '1', '1,508.00', ''),
(13, NULL, 'PPMU-2023-13', 'Correction tape, 4.5m', 'Correction tape, 4.5m', '0', 'pc', '2', '330', 'ORD - Legal Unit'),
(14, NULL, 'PPMU-2023-14', 'Envelope brown, A4 size', 'Envelope brown, A4 size', '77', 'pc', '10', '6850', ''),
(15, NULL, 'PPMU-2023-15', 'Envelope brown, Legal size, expanding, kraftboard', 'Envelope brown, Legal size, expanding, kraftboard', '6', 'pc', '10', '0', 'EMED - SWMS'),
(16, NULL, 'PPMU-2023-16', 'Envelope brown, Legal size', 'Envelope brown, Legal size', '1254', 'pc', '100', '0', ''),
(17, NULL, 'PPMU-2023-17', 'Envelope expanding, plastic', 'Envelope expanding, plastic', '2', 'pc', '2', '650', ''),
(18, NULL, 'PPMU-2023-18', 'Envelope mailing long, 105mm x 241mm, 70GSM, 500 pcs.', 'Envelope mailing long, 105mm x 241mm, 70GSM, 500 pcs.', '2', 'box', '10', '200', 'ORD - Legal Unit'),
(19, NULL, 'PPMU-2023-19', 'Envelope mailing with DENR letterhead, 500/box (window type)', 'Envelope mailing with DENR letterhead, 500/box (window type)', '17499', 'pc', '100', '1600', ''),
(20, NULL, 'PPMU-2023-20', 'Envelopes pay golden kraft, 4 x 7 1/2, 75gsm, 500 pcs.', 'Envelopes pay golden kraft, 4 x 7 1/2, 75gsm, 500 pcs.', '1000', 'pc', '10', '1600', ''),
(21, NULL, 'PPMU-2023-21', 'Eraser, blackboard/whiteboard', 'Eraser, blackboard/whiteboard', '1', 'pc', '1', '1700', ''),
(22, NULL, 'PPMU-2023-22', 'File organizer', 'File organizer', '1', 'pc', '5', '1050', ''),
(23, NULL, 'PPMU-2023-23', 'File tab divider, A4 size', 'File tab divider, A4 size', '25', 'set', '5', '1150', ''),
(24, NULL, 'PPMU-2023-24', 'File tab divider, Legal size (new stock)', 'File tab divider, Legal size (new stock)', '10', 'set', '2', '560', ''),
(25, NULL, 'PPMU-2023-25', 'File tab divider, Legal size (old stock)', 'File tab divider, Legal size (old stock)', '44', 'set', '5', '560', ''),
(26, NULL, 'PPMU-2023-26', 'Highlighter Orange', 'Highlighter Orange', '1', 'pc', '2', '325', ''),
(27, NULL, 'PPMU-2023-27', 'Highlighter yellow', 'Highlighter yellow', '1', 'pc', '2', '325', ''),
(28, NULL, 'PPMU-2023-28', 'Highlighter green', 'Highlighter green', '1', 'pc', '2', '325', ''),
(29, NULL, 'PPMU-2023-29', 'Folder fancy, A4 size', 'Folder fancy, A4 size', '59', 'pc', '20', '2400', ''),
(30, NULL, 'PPMU-2023-30', 'Folder, L-type, A4 size, 216mm x 304mm, 50/pack', 'Folder, L-type, A4 size, 216mm x 304mm, 50/pack', '4', 'pack', '2', '265', ''),
(31, NULL, 'PPMU-2023-31', 'Folder, tagboard, A4 size', 'Folder, tagboard, A4 size', '30', 'pc', '5', '265', ''),
(32, NULL, 'PPMU-2023-32', 'Glue, all purpose (8-13-2021)', 'Glue, all purpose (8-13-2021)', '57', 'pc', '5', '265', ''),
(33, NULL, 'PPMU-2023-33', 'Index card box, 111mm x 143mm x 102mm', 'Index card box, 111mm x 143mm x 102mm', '10', 'pc', '5', '265', ''),
(34, NULL, 'PPMU-2023-34', 'Index card box, 3 x 5', 'Index card box, 3 x 5', '3', 'pc', '5', '495', ''),
(35, NULL, 'PPMU-2023-35', 'Index card box, 5 x 8', 'Index card box, 5 x 8', '1', 'pc', '5', '2345', ''),
(36, NULL, 'PPMU-2023-36', 'Index card, 3 x 5 500/pack', 'Index card, 3 x 5 500/pack', '100', 'pc', '10', '2585', ''),
(37, NULL, 'PPMU-2023-37', 'Index card, 5 x 8 500/pack', 'Index card, 5 x 8 500/pack', '30', 'pc', '10', '2585', ''),
(38, NULL, 'PPMU-2023-38', 'Index tabs, SPEEDO', 'Index tabs, SPEEDO', '17', 'pc', '5', '2585', ''),
(39, NULL, 'PPMU-2023-39', 'Looseleaf cover, 50/bundle', 'Looseleaf cover, 50/bundle', '503', 'pc', '100', '259', ''),
(40, NULL, 'PPMU-2023-40', 'Metro Manila CitiAtlas Accu-map', 'Metro Manila CitiAtlas Accu-map', '1', 'pc', '10', '259', ''),
(41, NULL, 'PPMU-2023-41', 'Mouse pad (EMED-WAQMS)', 'Mouse pad (EMED-WAQMS)', '0', 'pc', '2', '259', ''),
(42, NULL, 'PPMU-2023-42', 'Name plate/tag, acrylic', 'Name plate/tag, acrylic', '10', 'pc', '10', '259', ''),
(43, NULL, 'PPMU-2023-43', 'Note pad, 2 x 3', 'Note pad, 2 x 3', '0', 'pc', '5', '37.06', ''),
(44, NULL, 'PPMU-2023-44', 'Note pad, 3 x 3', 'Note pad, 3 x 3', '5', 'pc', '5', '2550', ''),
(45, NULL, 'PPMU-2023-45', 'Notebook Stenographer (new stock)', 'Notebook Stenographer (new stock)', '1', 'pc', '2', '2690', ''),
(46, NULL, 'PPMU-2023-46', 'Notebook, stenographer', 'Notebook, stenographer', '338', 'pc', '5', '339.04', ''),
(47, NULL, 'PPMU-2023-47', 'Paper, Multicopy, A4 size, 80gsm', 'Paper, Multicopy, A4 size, 80gsm', '100', 'ream', '5', '3535', ''),
(48, NULL, 'PPMU-2023-48', 'Paper, Multi-purpose, Legal size, 70gsm', 'Paper, Multi-purpose, Legal size, 70gsm', '583', 'ream', '5', '4115', ''),
(49, NULL, 'PPMU-2023-49', 'Parchment paper, EMERSON, 210mm x 297mm, 80GSM, 100 sheets (new stock)', 'Parchment paper, EMERSON, 210mm x 297mm, 80GSM, 100 sheets (new stock)', '2', 'pack', '2', '4115', ''),
(50, NULL, 'PPMU-2023-50', 'Pencil', 'Pencil', '209', 'pc', '10', '4115', ''),
(51, NULL, 'PPMU-2023-51', 'Permanent marker, red', 'Permanent marker, red', '27', 'pc', '10', '3560', ''),
(52, NULL, 'PPMU-2023-52', 'Push pins', 'Push pins', '4', 'case', '5', '4200', ''),
(53, NULL, 'PPMU-2023-53', 'Ribbon cartridge, S015531, for LQ-2190 printer', 'Ribbon cartridge, S015531, for LQ-2190 printer', '11', 'pc', '2', '4200', ''),
(54, NULL, 'PPMU-2023-54', 'Ring binder, 25mm, black', 'Ring binder, 25mm, black', '28', 'pc', '5', '4200', ''),
(55, NULL, 'PPMU-2023-55', 'Ring binder, 25mm, blue', 'Ring binder, 25mm, blue', '110', 'pc', '5', '2857.92', ''),
(56, NULL, 'PPMU-2023-56', 'Ring binder, 32mm, black', 'Ring binder, 32mm, black', '56', 'pc', '5', '2857.92', ''),
(57, NULL, 'PPMU-2023-57', 'Ring binder, 51mm, black', 'Ring binder, 51mm, black', '24', 'pc', '5', '2420', ''),
(58, NULL, 'PPMU-2023-58', 'Rubber band (8-13-2021)', 'Rubber band (8-13-2021)', '394', 'box', '10', '14', ''),
(59, NULL, 'PPMU-2023-59', 'Rubber eraser', 'Rubber eraser', '2', 'pc', '5', '76', ''),
(60, NULL, 'PPMU-2023-60', 'Ruled pad paper', 'Ruled pad paper', '8', 'pc', '5', '68.64', ''),
(61, NULL, 'PPMU-2023-61', 'Scissors, DIXON', 'Scissors, DIXON', '2', 'pc', '2', '68.64', ''),
(62, NULL, 'PPMU-2023-62', 'Sign pen, black (8-13-2021)', 'Sign pen, black (8-13-2021)', '1735', 'pc', '50', '2550', ''),
(63, NULL, 'PPMU-2023-63', 'Sign pen, blue (8-13-2021)', 'Sign pen, blue (8-13-2021)', '478', 'pc', '50', '770.11', ''),
(64, NULL, 'PPMU-2023-64', 'Stamp pad ink', 'Stamp pad ink', '56', 'pc', '5', '36.3', ''),
(65, NULL, 'PPMU-2023-65', 'Stamp pad felt', 'Stamp pad felt', '40', 'pc', '5', '77.56', ''),
(66, NULL, 'PPMU-2023-66', 'Staple remover, plier type', 'Staple remover, plier type', '6', 'pc', '5', '82.16', ''),
(67, NULL, 'PPMU-2023-67', 'Staple wire, 23/17, binder type', 'Staple wire, 23/17, binder type', '36', 'box', '5', '18.67', ''),
(68, NULL, 'PPMU-2023-68', 'Stapler with remover, standard type', 'Stapler with remover, standard type', '2', 'pc', '2', '673.09', ''),
(69, NULL, 'PPMU-2023-69', 'Time card, 190mm x 85mm, 100/bundle', 'Time card, 190mm x 85mm, 100/bundle', '27', 'bundle', '5', '927', ''),
(70, NULL, 'PPMU-2023-70', 'Typewriter ribbon, nylon', 'Typewriter ribbon, nylon', '4', 'pc', '5', '738.4', ''),
(71, NULL, 'PPMU-2023-71', 'Whiteboard marker, black', 'Whiteboard marker, black', '2', 'pc', '2', '83.4', ''),
(72, NULL, 'PPMU-2023-72', 'Whiteboard marker, blue', 'Whiteboard marker, blue', '77', 'pc', '10', '83', ''),
(73, NULL, 'PPMU-2023-73', 'Whiteboard marker, red', 'Whiteboard marker, red', '5', 'pc', '5', '11444', ''),
(74, NULL, 'PPMU-2023-74', 'Ink cartridge, canon 810, black', 'Ink cartridge, canon 810, black', '1', 'pc', '1', '23500', ''),
(75, NULL, 'PPMU-2023-75', 'Ink cartridge, canon 811, tri-color', 'Ink cartridge, canon 811, tri-color', '1', 'pc', '1', '11444', ''),
(76, NULL, 'PPMU-2023-76', 'Ink cartridge, hp 680, black', 'Ink cartridge, hp 680, black', '0', 'pc', '0', '560', ''),
(77, NULL, 'PPMU-2023-77', 'Ink cartridge, hp 680, tri-color', 'Ink cartridge, hp 680, tri-color', '0', 'pc', '1', '22888', 'CPD - CHWMS'),
(78, NULL, 'PPMU-2023-78', 'Ink cartridge, HP 678, black ', 'Ink cartridge, HP 678, black ', '4', 'pc', '1', '1144', ''),
(79, NULL, 'PPMU-2023-79', 'Ink tank, CANON GI 790, cyan (CPD)', 'Ink tank, CANON GI 790, cyan (CPD)', '1', 'pc', '1', '5613.25', ''),
(80, NULL, 'PPMU-2023-80', 'Ink tank, CANON GI 790, magenta (CPD)', 'Ink tank, CANON GI 790, magenta (CPD)', '1', 'pc', '1', '3066', ''),
(81, NULL, 'PPMU-2023-81', 'Ink tank, CANON GI 790, yellow (CPD)', 'Ink tank, CANON GI 790, yellow (CPD)', '1', 'pc', '1', '2.48', ''),
(82, NULL, 'PPMU-2023-82', 'Ink tank, HP GT52, cyan (EMED)', 'Ink tank, HP GT52, cyan (EMED)', '9', 'pc', '1', '952.64', ''),
(83, NULL, 'PPMU-2023-83', 'Ink tank, HP GT52, magenta (EMED)', 'Ink tank, HP GT52, magenta (EMED)', '9', 'pc', '1', '500', ''),
(84, NULL, 'PPMU-2023-84', 'Ink tank, HP GT52, yellow (EMED)', 'Ink tank, HP GT52, yellow (EMED)', '9', 'pc', '1', '700', ''),
(85, NULL, 'PPMU-2023-85', 'Ink tank, HP GT53, black (EMED)', 'Ink tank, HP GT53, black (EMED)', '9', 'pc', '1', '499', ''),
(86, NULL, 'PPMU-2023-86', 'Toner cartridge, HP202A, CF500A black (ORD-PISMU2)', 'Toner cartridge, HP202A, CF500A black (ORD-PISMU2)', '0', 'pc', '1', '380', ''),
(87, NULL, 'PPMU-2023-87', 'Toner cartridge, HP202A, CF501A cyan (ORD-PISMU1)', 'Toner cartridge, HP202A, CF501A cyan (ORD-PISMU1)', '8', 'pc', '1', '380', ''),
(88, NULL, 'PPMU-2023-89', 'Toner cartridge, HP202A, CF502A yellow (ORD-PISMU1)', 'Toner cartridge, HP202A, CF502A yellow (ORD-PISMU1)', '8', 'pc', '1', '380', ''),
(89, NULL, 'PPMU-2023-91', 'Toner cartridge, HP202A, CF503A magenta (ORD-PISMU1)', 'Toner cartridge, HP202A, CF503A magenta (ORD-PISMU1)', '12', 'pc', '1', '255', ''),
(90, NULL, 'PPMU-2023-93', 'Toner cartridge, HP CB435A, black', 'Toner cartridge, HP CB435A, black', '12', 'pc', '1', '90.22', ''),
(91, NULL, 'PPMU-2023-94', 'Toner cartridge, HP CE285AC, black (CPD)', 'Toner cartridge, HP CE285AC, black (CPD)', '1', 'pc', '1', '2485', ''),
(92, NULL, 'PPMU-2023-95', 'Toner cartridge, HP CE285AC, black (EMED-CHWMS)', 'Toner cartridge, HP CE285AC, black (EMED-CHWMS)', '9', 'pc', '1', '151.43', ''),
(93, NULL, 'PPMU-2023-96', 'Toner cartridge, HP204A, CF510A black (EMED-CHWMS)', 'Toner cartridge, HP204A, CF510A black (EMED-CHWMS)', '1', 'pc', '1', '48200', ''),
(94, NULL, 'PPMU-2023-97', 'Toner cartridge, HP79A, CF279A black (EMED)', 'Toner cartridge, HP79A, CF279A black (EMED)', '0', 'pc', '1', '111.3', 'ORD - Legal Unit'),
(95, NULL, 'PPMU-2023-98', 'Toner cartridge, LEXMARK, 58D3H00 (ORD-PISMU)', 'Toner cartridge, LEXMARK, 58D3H00 (ORD-PISMU)', '2', 'pc', '1', '59.28', ''),
(96, NULL, 'PPMU-2023-99', 'Toner cartridge, MP2501 (for photocopier)', 'Toner cartridge, MP2501 (for photocopier)', '21', 'pc', '1', '930.8', ''),
(97, NULL, 'PPMU-2023-100', 'Ink Cartridge 811 Tri color', 'Ink Cartridge 811 Tri color', '0', 'pc', '1', '0', ''),
(98, NULL, 'PPMU-2023-101', 'Ink Cartridge 810 Black', 'Ink Cartridge 810 Black', '0', 'pc', '1', '0', 'EMED - SWMS'),
(99, NULL, 'PPMU-2023-102', 'Anti-virus, Kaspersky, 5 Devices, 2-year protection (EMED)', 'Anti-virus, Kaspersky, 5 Devices, 2-year protection (EMED)', '5', 'pc', '1', '1850', ''),
(100, NULL, 'PPMU-2023-103', 'External DVD/CD writer, 8x LITEON (FAD)', 'External DVD/CD writer, 8x LITEON (FAD)', '1', 'pc', '1', '1800', ''),
(101, NULL, 'PPMU-2023-104', 'External DVD/CD writer, 8x LITEON (CPD)', 'External DVD/CD writer, 8x LITEON (CPD)', '0', 'pc', '0', '1800', ''),
(102, NULL, 'PPMU-2023-105', 'External slim DVD-RW ASUS (EMED)', 'External slim DVD-RW ASUS (EMED)', '1', 'pc', '1', '1750', ''),
(103, NULL, 'PPMU-2023-106', 'External slim DVD-RW ASUS (SWMS)', 'External slim DVD-RW ASUS (SWMS)', '3', 'pc', '1', '1750', ''),
(104, NULL, 'PPMU-2023-107', 'Keyboard, A4TECH', 'Keyboard, A4TECH', '5', 'pc', '1', '330', ''),
(105, NULL, 'PPMU-2023-108', 'Printer cable, USB AD-Link high speed', 'Printer cable, USB AD-Link high speed', '2', 'pc', '1', '650', ''),
(106, NULL, 'PPMU-2023-109', 'USB hub, 2.0 HUB support 500GB, 4-ports (EMED-WAQMS)', 'USB hub, 2.0 HUB support 500GB, 4-ports (EMED-WAQMS)', '10', 'pc', '5', '200', ''),
(107, NULL, 'PPMU-2023-110', 'USB hub, UNITEK, 3.0, 4-port, 1.2M (EMED-WAQMS)', 'USB hub, UNITEK, 3.0, 4-port, 1.2M (EMED-WAQMS)', '0', 'pc', '1', '1600', ''),
(108, NULL, 'PPMU-2023-111', 'Calculator, mini-printing, CANON', 'Calculator, mini-printing, CANON', '1', 'pc', '1', '930.80', ''),
(109, NULL, 'PPMU-2023-112', 'Camera, document, 8MP (8-13-2021)', 'Camera, document, 8MP (8-13-2021)', '1', 'pc', '1', '23,623.60', ''),
(110, NULL, 'PPMU-2023-113', 'Camera, document, AVERVISION315AF', 'Camera, document, AVERVISION315AF', '2', 'pc', '1', '28,860.00', ''),
(111, NULL, 'PPMU-2023-114', 'Electric fan, industrial ground type (8-13-2021)', 'Electric fan, industrial ground type (8-13-2021)', '2', 'unit', '1', '1,109.68', ''),
(112, NULL, 'PPMU-2023-115', 'Electric fan, stand type, UNION, UGSF-1600, 16', 'Electric fan, stand type, UNION, UGSF-1600, 16', '1', 'unit', '1', '967.10', ''),
(113, NULL, 'PPMU-2023-116', 'Electric fan, wall type, UNION, UGM-16WF', 'Electric fan, wall type, UNION, UGM-16WF', '0', 'unit', '0', '770.11', ''),
(114, NULL, 'PPMU-2023-117', 'FACSIMILE Machine PANASONIC', 'FACSIMILE Machine PANASONIC', '1', 'unit', '1', '5,642.00', ''),
(115, NULL, 'PPMU-2023-118', 'IC Recorder SONY ICD-UX560F', 'IC Recorder SONY ICD-UX560F', '0', 'pc', '0', '0', ''),
(116, NULL, 'PPMU-2023-119', 'Paper trimmer/cutting machine tabletop (8-13-2021)', 'Paper trimmer/cutting machine tabletop (8-13-2021)', '4', 'pc', '1', '9,297.60', ''),
(117, NULL, 'PPMU-2023-120', 'Printer Impact DOT Matrix 9 pins 80 columns', 'Printer Impact DOT Matrix 9 pins 80 columns', '0', 'unit', '1', '7,995.52', ''),
(118, NULL, 'PPMU-2023-121', 'File Folder w/ tab Legal', 'File Folder w/ tab Legal', '640', 'pc', '50', '3.5', ''),
(119, NULL, 'PPMU-2023-122', 'Continuous Form 281 x 241mm', 'Continuous Form 281 x 241mm', '20', 'pc', '5', '94.64', ''),
(120, NULL, 'PPMU-2023-123', 'Polaris PVC (instant id System)', 'Polaris PVC (instant id System)', '150', 'pc', '5', '86.72', ''),
(121, NULL, 'PPMU-2023-124', 'Cutter knife', 'Cutter knife', '5', 'pc', '5', '14.75', ''),
(122, NULL, 'PPMU-2023-125', 'Cutter blade SPARE', 'Cutter blade SPARE', '10', 'pc', '5', '11', ''),
(123, NULL, 'PPMU-2023-126', 'Tape cloth', 'Tape cloth', '3', 'pc', '1', '51.88', ''),
(124, NULL, 'PPMU-2023-127', 'Staple 23/13', 'Staple 23/13', '7', 'box', '1', '41.6', ''),
(125, NULL, 'PPMU-2023-128', 'Calculator Canon Compact', 'Calculator Canon Compact', '4', 'unit', '1', '105.61', ''),
(126, NULL, 'PPMU-2023-129', 'Correction Tape AAU', 'Correction Tape AAU', '0', 'pc', '0', '65', ''),
(127, NULL, 'PPMU-2023-130', 'marker Permanent Black', 'marker Permanent Black', '2', 'pc', '2', '28', ''),
(128, NULL, 'PPMU-2023-131', 'Marker Permanent Blue', 'Marker Permanent Blue', '0', 'pc', '2', '187.2', 'CPD - AWS'),
(129, NULL, 'PPMU-2023-132', 'Puncher (3 in 1)', 'Puncher (3 in 1)', '2', 'pc', '2', '24.96', ''),
(130, NULL, 'PPMU-2023-133', 'Stamp Pad small', 'Stamp Pad small', '1', 'pc', '1', '960', ''),
(131, NULL, 'PPMU-2023-134', 'Ruler', 'Ruler', '0', 'pc', '1', '24.75', ''),
(132, NULL, 'PPMU-2023-135', 'Record Book 500 Leaves', 'Record Book 500 Leaves', '1', 'book', '1', '34.95', ''),
(133, NULL, 'PPMU-2023-136', 'Record Book 300 Leaves', 'Record Book 300 Leaves', '0', 'book', '1', '21.84', ''),
(134, NULL, 'PPMU-2023-137', 'Tape scotch 24mm x 50 yd', 'Tape scotch 24mm x 50 yd', '1', 'roll', '1', '19.76', ''),
(135, NULL, 'PPMU-2023-138', 'Tape Packing Clear 48mm x 80yd', 'Tape Packing Clear 48mm x 80yd', '0', 'roll', '0', '30.42', ''),
(136, NULL, 'PPMU-2023-139', 'Tape Masking 48mm x 20yd', 'Tape Masking 48mm x 20yd', '0', 'roll', '1', '155.48', 'EMED - WQMS'),
(137, NULL, 'PPMU-2023-140', 'Tape Masking 24mm x 20yd', 'Tape Masking 24mm x 20yd', '1', 'roll', '1', '211', ''),
(138, NULL, 'PPMU-2023-141', 'Ballpen Black ', 'Ballpen Black ', '1', 'pc', '1', '48', ''),
(139, NULL, 'PPMU-2023-142', 'Ballpen Blue', 'Ballpen Blue', '4', 'pc', '5', '71.5', 'EMED - AMS'),
(140, NULL, 'PPMU-2023-143', 'Ballpen Red', 'Ballpen Red', '3', 'pc', '5', '148.5', 'CPD - AWS'),
(141, NULL, 'PPMU-2023-144', 'Fastener plastic', 'Fastener plastic', '1', 'box', '1', '500', ''),
(142, NULL, 'PPMU-2023-145', 'HP 680 Tri Color', 'HP 680 Tri Color', '0', 'pc', '1', '506', ''),
(143, NULL, 'PPMU-2023-147', 'LED Projector', 'LED Projector', '2', 'unit', '1', '148.5', ''),
(144, NULL, 'PPMU-2023-148', 'Staple Wire Standard', 'Staple Wire Standard', '54', 'box', '10', '23.76', ''),
(145, NULL, 'PPMU-2023-150', 'Scandisk memory Card 32GB', 'Scandisk memory Card 32GB', '2', 'pc', '1', '1508', ''),
(146, NULL, 'PPMU-2023-151', 'Adaptor', 'Adaptor', '3', 'pc', '1', '1', ''),
(147, NULL, 'PPMU-2023-152', 'Laser Presenter (wireless)', 'Laser Presenter (wireless)', '3', 'pc', '1', '1.5', ''),
(148, NULL, 'PPMU-2023-154', 'UPS (Accu-Power)', 'UPS (Accu-Power)', '11', 'pc', '1', '2970', ''),
(149, NULL, 'PPMU-2023-155', 'UPS(APC)', 'UPS(APC)', '2', 'pc', '1', '6220', ''),
(150, NULL, 'PPMU-2023-157', 'Signature Pad', 'Signature Pad', '4', 'unit', '1', '0', ''),
(151, NULL, 'PPMU-2023-158', 'Avervision F17-8M Document Camera', 'Avervision F17-8M Document Camera', '1', 'unit', '1', '0', ''),
(152, NULL, 'PPMU-2023-159', 'Mavic Pro Drone', 'Mavic Pro Drone', '2', 'unit', '1', '0', ''),
(153, NULL, 'PPMU-2023-161', 'HP 285a', 'HP 285a', '115', 'pc', '10', '3242.72', ''),
(156, 'DENR - NCR - 01001', '123109-3029374982367498-2', 'jbl speaker', 'small size', '7', 'pcs', '2', '3000', ''),
(157, '1', '1', '1', '1', '3', '1', '1', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `stock_txn`
--

CREATE TABLE `stock_txn` (
  `stock_txn_id` int(20) NOT NULL,
  `user_id` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `stock_id` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `amount` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `division` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `quantity` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `timestamp` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `activity` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `remarks` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `old` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_txn`
--

INSERT INTO `stock_txn` (`stock_txn_id`, `user_id`, `stock_id`, `amount`, `division`, `quantity`, `timestamp`, `activity`, `remarks`, `old`) VALUES
(1, '1', '6', NULL, 'AD-GSS', '5', 'August 14, 2024 11:16:am  ', 'Stock Out', 'New count: 11<br> RIS No.: 2024-08-001', NULL),
(2, '1', '8', NULL, 'AD-GSS', '100', 'August 14, 2024 11:16:am  ', 'Stock Out', 'New count: 521<br> RIS No.: 2024-08-001', NULL),
(3, '1', '6', NULL, 'AD-GSS', '2', 'January 31, 2025 10:46:am  ', 'Stock Out', 'New count: 9<br> RIS No.: 2025-01-002', NULL),
(4, '1', '8', NULL, 'AD-GSS', '2', 'January 31, 2025 2:03:pm  ', 'Stock Out', 'New count: 519<br> RIS No.: 2025-01-002', NULL),
(5, '1', '3', NULL, 'AD-GSS', '4', 'February 4, 2025 10:33:am  ', 'Stock Out', 'New count: 5<br> RIS No.: 2025-02-003', NULL),
(6, '1', '1', NULL, 'AD-GSS', '2', 'February 4, 2025 10:33:am  ', 'Stock Out', 'New count: 90<br> RIS No.: 2025-02-003', NULL),
(7, '1', '1', NULL, 'AD-GSS', NULL, 'February 4, 2025 12:57:pm  ', 'Stock Delete ', NULL, NULL),
(8, '1', '2', NULL, 'AD-GSS', NULL, 'February 4, 2025 12:57:pm  ', 'Stock Delete ', NULL, NULL),
(9, '1', '3', NULL, 'AD-GSS', NULL, 'February 4, 2025 1:01:pm  ', 'Stock Delete ', NULL, NULL),
(10, '1', '4', NULL, 'AD-GSS', '1', 'February 4, 2025 3:06:pm  ', 'Add Quantity', 'New count: 5', NULL),
(11, '1', '5', NULL, 'AD-GSS', '4', 'February 4, 2025 3:07:pm  ', 'Add Quantity', 'New count: 9', NULL),
(12, '1', '5', NULL, 'AD-GSS', '1', 'February 4, 2025 3:07:pm  ', 'Add Quantity', 'New count: 10', NULL),
(13, '1', '154', '100', 'AD-GSS', '10', 'February 4, 2025 4:11:pm  ', 'Stock In ', 'Product added: Test product', NULL),
(14, '1', '4', NULL, 'AD-GSS', NULL, 'February 4, 2025 4:11:pm  ', 'Stock Update ', 'New Product Name: Bond paper with DENR letterhead, A4 size (new format)<br>New Description: Bond paper with DENR letterhead, A4 size (new format)<br>New Amount: 1000.10<br>New Threshold: 10', NULL),
(15, '1', '4', NULL, 'AD-GSS', NULL, 'February 4, 2025 4:12:pm  ', 'Stock Update ', 'New Product Name: Bond paper with DENR letterhead, A4 size (new format)<br>New Description: Bond paper with DENR letterhead, A4 size (new format)<br>New Amount: 1000.20<br>New Threshold: 10', NULL),
(16, '1', '4', '1000.30', 'AD-GSS', NULL, 'February 4, 2025 4:13:pm  ', 'Stock Update ', 'New Product Name: Bond paper with DENR letterhead, A4 size (new format)<br>New Description: Bond paper with DENR letterhead, A4 size (new format)<br>New Amount: 1000.30<br>New Threshold: 10', NULL),
(17, '1', '155', '232.2', 'AD-GSS', '2', 'February 4, 2025 4:14:pm  ', 'Stock In ', 'Product added: 1', NULL),
(18, '1', '154', '200.20', 'AD-GSS', '20', 'February 4, 2025 4:14:pm  ', 'Add Quantity', 'New count: 30', NULL),
(19, '1', '154', NULL, 'AD-GSS', NULL, 'February 4, 2025 4:20:pm  ', 'Stock Delete ', NULL, NULL),
(20, '1', '155', NULL, 'AD-GSS', NULL, 'February 4, 2025 4:20:pm  ', 'Stock Delete ', NULL, NULL),
(21, '1', '156', '3000', 'AD-GSS', '10', 'February 4, 2025 4:21:pm  ', 'Stock In ', 'Product added: jbl speaker', NULL),
(22, '1', '156', '3000', 'AD-GSS', NULL, 'February 4, 2025 4:30:pm  ', 'Stock Update ', 'New Product Name: jbl speaker<br>New Description: small size<br>New Amount: 3000<br>New Threshold: 2', NULL),
(23, '1', '157', '1', 'AD-GSS', '1', 'February 4, 2025 4:41:pm  ', 'Stock In ', 'Product added: 1', 'no'),
(24, '1', '157', '2', 'AD-GSS', '2', 'February 4, 2025 4:44:pm  ', 'Add Quantity', 'New count: 3', 'yes'),
(25, '1', '8', NULL, 'AD-GSS', '9', 'February 4, 2025 5:00:pm  ', 'Stock Out', 'New count: 510<br> RIS No.: 2025-02-004', NULL),
(26, '1', '156', NULL, 'AD-GSS', '3', 'February 4, 2025 5:02:pm  ', 'Stock Out', 'New count: 7<br> RIS No.: 2025-02-004', NULL),
(27, '1', '106', NULL, 'AD-GSS', '6', 'February 4, 2025 5:21:pm  ', 'Stock Out', 'New count: 10<br> RIS No.: 2025-02-005', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(20) NOT NULL,
  `first_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `middle_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `last_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `birthdate` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `email` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `contact` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `division` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `username` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `password` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `status` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `middle_name`, `last_name`, `birthdate`, `email`, `contact`, `division`, `username`, `password`, `status`) VALUES
(1, 'AD-GSS', NULL, NULL, NULL, NULL, NULL, 'AD-GSS', 'gss', 'gss', '1'),
(2, 'AD-AD-RECS', NULL, NULL, NULL, NULL, NULL, 'AD-AD-RECS', 'ad-recs', 'ad-recs', '1'),
(3, 'AD-OAD', NULL, NULL, NULL, NULL, NULL, 'AD-OAD', 'oad', 'oad', '1'),
(4, 'AD-CASH', NULL, NULL, NULL, NULL, NULL, 'AD-CASH', 'cash', 'cash', '1'),
(5, 'AD-PERSONNEL', NULL, NULL, NULL, NULL, NULL, 'AD-PERSONNEL', 'personnel', 'personnel', '1'),
(6, 'AD-PS', NULL, NULL, NULL, NULL, NULL, 'AD-PS', 'ps', 'ps', '1'),
(7, 'AD-HRDS', NULL, NULL, NULL, NULL, NULL, 'AD-HRDS', 'hrds', 'hrds', '1'),
(8, 'COA-COA', NULL, NULL, NULL, NULL, NULL, 'COA-COA', 'coa', 'coa', '1'),
(9, 'CDD-PFMS', NULL, NULL, NULL, NULL, NULL, 'CDD-PFMS', 'pfms', 'pfms', '1'),
(10, 'CDD-LPPWP', NULL, NULL, NULL, NULL, NULL, 'CDD-LPPWP', 'lppwp', 'lppwp', '1'),
(11, 'CDD-PAMBS', NULL, NULL, NULL, NULL, NULL, 'CDD-PAMBS', 'pambs', 'pambs', '1'),
(12, 'CDD-CRFMS', NULL, NULL, NULL, NULL, NULL, 'CDD-CRFMS', 'crfms', 'crfms', '1'),
(13, 'CDD-OCDD', NULL, NULL, NULL, NULL, NULL, 'CDD-OCDD', 'ocdd', 'ocdd', '1'),
(14, 'NCR-NCR', NULL, NULL, NULL, NULL, NULL, 'NCR-NCR', 'ncr', 'ncr', '1'),
(15, 'ED-OED', NULL, NULL, NULL, NULL, NULL, 'ED-OED', 'oed', 'oed', '1'),
(16, 'ED-PICO', NULL, NULL, NULL, NULL, NULL, 'ED-PICO', 'pico', 'pico', '1'),
(17, 'ED-CMIS', NULL, NULL, NULL, NULL, NULL, 'ED-CMIS', 'cmis', 'cmis', '1'),
(18, 'ED-SIS', NULL, NULL, NULL, NULL, NULL, 'ED-SIS', 'sis', 'sis', '1'),
(19, 'ED-WTMU', NULL, NULL, NULL, NULL, NULL, 'ED-WTMU', 'wtmu', 'wtmu', '1'),
(20, 'FD-BUDGET', NULL, NULL, NULL, NULL, NULL, 'FD-BUDGET', 'budget', 'budget', '1'),
(21, 'FD-ACCOUNTING', NULL, NULL, NULL, NULL, NULL, 'FD-ACCOUNTING', 'accounting', 'accounting', '1'),
(22, 'FD-OFD', NULL, NULL, NULL, NULL, NULL, 'FD-OFD', 'ofd', 'ofd', '1'),
(23, 'LD-LD', NULL, NULL, NULL, NULL, NULL, 'LD-LD', 'ld', 'ld', '1'),
(24, 'LPDD-FUS', NULL, NULL, NULL, NULL, NULL, 'LPDD-FUS', 'fus', 'fus', '1'),
(25, 'LPDD-OLPDD', NULL, NULL, NULL, NULL, NULL, 'LPDD-OLPDD', 'olpdd', 'olpdd', '1'),
(26, 'LPDD-PDS', NULL, NULL, NULL, NULL, NULL, 'LPDD-PDS', 'pds', 'pds', '1'),
(27, 'LPDD-WRPS', NULL, NULL, NULL, NULL, NULL, 'LPDD-WRPS', 'wrps', 'wrps', '1'),
(28, 'LPDD-WRUS', NULL, NULL, NULL, NULL, NULL, 'LPDD-WRUS', 'wrus', 'wrus', '1'),
(29, 'LPDD-LPDD-REC', NULL, NULL, NULL, NULL, NULL, 'LPDD-LPDD-REC', 'lpdd-rec', 'lpdd-rec', '1'),
(30, 'MEO-MEO-S', NULL, NULL, NULL, NULL, NULL, 'MEO-MEO-S', 'meo-s', 'meo-s', '1'),
(31, 'MEO-MEO-W', NULL, NULL, NULL, NULL, NULL, 'MEO-MEO-W', 'meo-w', 'meo-w', '1'),
(32, 'MEO-MEO-N', NULL, NULL, NULL, NULL, NULL, 'MEO-MEO-N', 'meo-n', 'meo-n', '1'),
(33, 'MEO-MEO-E', NULL, NULL, NULL, NULL, NULL, 'MEO-MEO-E', 'meo-e', 'meo-e', '1'),
(34, 'ARD-ARD-SC', NULL, NULL, NULL, NULL, NULL, 'ARD-ARD-SC', 'ard-sc', 'ard-sc', '1'),
(35, 'ARD-ARD-MS', NULL, NULL, NULL, NULL, NULL, 'ARD-ARD-MS', 'ard-ms', 'ard-ms', '1'),
(36, 'ARD-ARD-TS', NULL, NULL, NULL, NULL, NULL, 'ARD-ARD-TS', 'ard-ts', 'ard-ts', '1'),
(37, 'ORED-OPCEN', NULL, NULL, NULL, NULL, NULL, 'ORED-OPCEN', 'opcen', 'opcen', '1'),
(38, 'ORED-MBSCMO', NULL, NULL, NULL, NULL, NULL, 'ORED-MBSCMO', 'mbscmo', 'mbscmo', '1'),
(39, 'ORED-ORED', NULL, NULL, NULL, NULL, NULL, 'ORED-ORED', 'ored', 'ored', '1'),
(40, 'ORED-RSCIG', NULL, NULL, NULL, NULL, NULL, 'ORED-RSCIG', 'rscig', 'rscig', '1'),
(41, 'ORED-RAC', NULL, NULL, NULL, NULL, NULL, 'ORED-RAC', 'rac', 'rac', '1'),
(42, 'PRCMO-PPU', NULL, NULL, NULL, NULL, NULL, 'PRCMO-PPU', 'ppu', 'ppu', '1'),
(43, 'PRCMO-PRCMO', NULL, NULL, NULL, NULL, NULL, 'PRCMO-PRCMO', 'prcmo', 'prcmo', '1'),
(44, 'PRCMO-EED', NULL, NULL, NULL, NULL, NULL, 'PRCMO-EED', 'eed', 'eed', '1'),
(45, 'PRCMO-WQWMD', NULL, NULL, NULL, NULL, NULL, 'PRCMO-WQWMD', 'wqwmd', 'wqwmd', '1'),
(46, 'PRCMO-PIAU', NULL, NULL, NULL, NULL, NULL, 'PRCMO-PIAU', 'piau', 'piau', '1'),
(47, 'PRCMO-AU', NULL, NULL, NULL, NULL, NULL, 'PRCMO-AU', 'au', 'au', '1'),
(48, 'PMD-PPS', NULL, NULL, NULL, NULL, NULL, 'PMD-PPS', 'pps', 'pps', '1'),
(49, 'PMD-MES', NULL, NULL, NULL, NULL, NULL, 'PMD-MES', 'mes', 'mes', '1'),
(50, 'PMD-RICTU', NULL, NULL, NULL, NULL, NULL, 'PMD-RICTU', 'rictu', 'rictu', '1'),
(51, 'PMD-OPMD', NULL, NULL, NULL, NULL, NULL, 'PMD-OPMD', 'opmd', 'opmd', '1'),
(52, 'SMD-LAMS', NULL, NULL, NULL, NULL, NULL, 'SMD-LAMS', 'lams', 'lams', '1'),
(53, 'SMD-SCS', NULL, NULL, NULL, NULL, NULL, 'SMD-SCS', 'scs', 'scs', '1'),
(54, 'SMD-LESS', NULL, NULL, NULL, NULL, NULL, 'SMD-LESS', 'less', 'less', '1'),
(55, 'SMD-ASCS', NULL, NULL, NULL, NULL, NULL, 'SMD-ASCS', 'ascs', 'ascs', '1'),
(56, 'SMD-OOSS', NULL, NULL, NULL, NULL, NULL, 'SMD-OOSS', 'ooss', 'ooss', '1'),
(57, 'SMD-SMD-REC', NULL, NULL, NULL, NULL, NULL, 'SMD-SMD-REC', 'smd-rec', 'smd-rec', '1'),
(58, 'SMD-OSMD', NULL, NULL, NULL, NULL, NULL, 'SMD-OSMD', 'osmd', 'osmd', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `requeststocktemp`
--
ALTER TABLE `requeststocktemp`
  ADD PRIMARY KEY (`request_temp_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `stock_txn`
--
ALTER TABLE `stock_txn`
  ADD PRIMARY KEY (`stock_txn_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `requeststocktemp`
--
ALTER TABLE `requeststocktemp`
  MODIFY `request_temp_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `stock_txn`
--
ALTER TABLE `stock_txn`
  MODIFY `stock_txn_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
