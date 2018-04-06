-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2018 at 05:36 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belajar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tmst_typevar`
--

CREATE TABLE `tmst_typevar` (
  `id` varchar(16) NOT NULL,
  `name` varchar(64) NOT NULL,
  `table_name` varchar(32) NOT NULL,
  `tid` int(4) NOT NULL,
  `userid` varchar(32) NOT NULL,
  `recdate` datetime NOT NULL,
  `moduser` varchar(32) NOT NULL,
  `moddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmst_typevar`
--

INSERT INTO `tmst_typevar` (`id`, `name`, `table_name`, `tid`, `userid`, `recdate`, `moduser`, `moddate`) VALUES
('0', 'Save as Draft', 'REQUEST_STATUS', 6, 'EMP00001', '2016-08-11 11:49:07', 'EMP00001', '2016-08-11 11:49:07'),
('1', 'New', 'REQUEST_STATUS', 1, 'admin', '2014-02-08 09:33:23', 'admin', '2014-02-08 10:11:22'),
('2', 'Awaiting', 'REQUEST_STATUS', 2, 'admin', '2014-02-08 09:33:41', 'admin', '2014-02-08 09:33:41'),
('3', 'Approved', 'REQUEST_STATUS', 3, 'admin', '2014-02-08 09:33:52', 'admin', '2014-02-08 09:33:52'),
('4', 'Rejected', 'REQUEST_STATUS', 4, 'admin', '2014-02-08 09:34:57', 'admin', '2014-02-08 09:34:57'),
('5', 'Revising', 'REQUEST_STATUS', 5, 'admin', '2014-03-03 17:59:40', 'admin', '2014-03-03 17:59:40'),
('6', 'DRAFT LS', 'REQUEST_STATUS', 7, 'EMP00001', '2017-08-07 14:50:21', 'EMP00001', '2017-08-07 14:50:21'),
('7', 'FINAL LS', 'REQUEST_STATUS', 8, 'EMP00001', '2017-08-07 14:51:41', 'EMP00001', '2017-08-07 14:51:41'),
('8', 'INATRADE', 'REQUEST_STATUS', 9, 'EMP00001', '2017-08-07 14:52:21', 'EMP00001', '2017-08-07 14:52:21'),
('9', 'Void', 'REQUEST_STATUS', 10, 'EMP00001', '2017-08-09 08:30:22', 'EMP00001', '2017-08-09 08:30:22'),
('ADB', '% (adb)', 'LHV_VARIABLE', 4, 'admin', '2018-01-15 00:00:00', 'admin', '2018-01-15 00:00:00'),
('ADV', 'Advance', 'PO_TYPE', 1, 'EMP00001', '2016-05-11 15:15:45', 'EMP00001', '2016-05-25 15:31:51'),
('ARB', '% (arb)', 'LHV_VARIABLE', 3, 'admin', '2018-01-15 00:00:00', 'admin', '2018-01-15 00:00:00'),
('AUD', 'AUD', 'CURRENCY', 5, 'EMP00001', '2016-09-02 09:28:39', 'EMP00001', '2016-09-02 09:28:39'),
('BR', 'Branch', 'OFFICE_STATUS', 2, 'admin', '2014-04-27 11:41:23', 'admin', '2014-04-27 11:41:23'),
('BUDHIST', 'Budhist', 'RELIGION', 1, 'EMP00001', '2015-06-18 20:34:20', 'EMP00001', '2015-06-18 20:34:20'),
('CARGO01', 'In Bulk', 'CARGO_TYPE', 1, 'admin', '2017-08-04 09:51:31', 'admin', '2017-08-04 09:53:15'),
('CASH', 'Cash', 'PAIDTYPE', 2, 'EMP00001', '2015-11-04 11:53:05', 'EMP00001', '2015-11-04 11:53:05'),
('CATHOLIC', 'Catholic', 'RELIGION', 2, 'EMP00001', '2015-06-18 20:34:45', 'EMP00001', '2015-06-18 20:34:45'),
('CF01', 'Overseas', 'CLIENT_FROM', 1, 'EMP00001', '2015-07-29 16:03:53', 'EMP00001', '2015-07-29 16:03:53'),
('CF02', 'Domestic', 'CLIENT_FROM', 2, 'EMP00001', '2015-07-29 16:04:10', 'EMP00001', '2015-07-29 16:04:10'),
('CHECK', 'Check', 'PAIDTYPE', 3, 'EMP00001', '2015-11-04 11:53:57', 'EMP00001', '2015-11-04 11:53:57'),
('CHRISTIAN', 'Christian', 'RELIGION', 3, 'EMP00001', '2015-06-18 20:35:09', 'EMP00001', '2015-06-18 20:35:09'),
('CP01', 'High Potential', 'CLIENT_PRIORITY', 1, 'EMP00001', '2015-07-29 16:10:39', 'EMP00001', '2015-07-29 16:10:39'),
('CP02', 'Medium Potential', 'CLIENT_PRIORITY', 2, 'EMP00001', '2015-07-29 16:10:58', 'EMP00001', '2015-07-29 16:10:58'),
('CP03', 'Low Potential', 'CLIENT_PRIORITY', 3, 'EMP00001', '2015-07-29 16:11:28', 'EMP00001', '2015-07-29 16:11:49'),
('CREDIT', 'Credit', 'DEF_POSITION', 1, 'EMP00001', '2015-10-26 11:58:23', 'EMP00001', '2015-10-26 11:58:23'),
('CT01', 'Company', 'CLIENT_TYPE', 1, 'EMP00001', '2015-07-29 16:08:34', 'EMP00001', '2015-07-29 16:08:34'),
('CT02', 'Individual', 'CLIENT_TYPE', 2, 'EMP00001', '2015-07-29 16:08:58', 'EMP00001', '2015-07-29 16:08:58'),
('CV', 'CV', 'COMPANY_TYPE', 2, 'admin', '2013-10-23 11:18:42', 'admin', '2013-10-23 11:18:42'),
('DAYS', 'Days', 'TUNIT', 1, 'admin', '2013-11-30 22:13:02', 'admin', '2013-11-30 22:13:02'),
('DEBIT', 'Debit', 'DEF_POSITION', 2, 'EMP00001', '2015-10-26 11:58:36', 'EMP00001', '2015-11-12 18:29:04'),
('DOKTER', 'DOKTER', 'JENIS_KARYAWAN', 1, 'EMP00001', '2018-04-02 16:17:34', 'EMP00001', '2018-04-02 16:17:34'),
('DOMESTIK', 'Domestik', 'TUJUAN_PENGAPALAN', 1, 'EMP00001', '2018-01-11 09:53:15', 'EMP00001', '2018-01-11 09:53:15'),
('DOS', 'Drop Off', 'TJOBTYPE', 3, 'EMP00001', '2015-07-28 14:53:06', 'EMP00001', '2015-07-28 14:53:06'),
('EA', 'Ea', 'SO_UOM', 18, 'EMP00001', '2016-05-23 09:44:46', 'EMP00001', '2016-05-23 09:44:46'),
('EKS', 'Eksternal Training', 'TRAINING_TYPE', 2, 'admin', '2014-03-01 09:20:17', 'admin', '2014-03-01 09:20:17'),
('EKSPOR', 'Ekspor', 'TUJUAN_PENGAPALAN', 2, 'EMP00001', '2018-01-11 09:53:40', 'EMP00001', '2018-01-11 09:53:40'),
('EURO', 'EURO', 'CURRENCY', 4, 'EMP00001', '2016-07-22 09:44:09', 'EMP00001', '2016-07-22 09:44:09'),
('FC01', 'MIPA', 'Faculty', 1, 'admin', '2014-01-25 13:03:37', 'admin', '2014-01-25 13:03:37'),
('FC02', 'Computer Science', 'Faculty', 2, 'admin', '2014-01-25 13:04:02', 'admin', '2014-01-25 13:04:02'),
('FC03', 'Engineering', 'Faculty', 3, 'admin', '2014-01-25 13:04:19', 'admin', '2014-01-25 13:04:19'),
('file_ash', 'File Ash', 'LHV_CERTIFICATE', 5, 'admin', '2018-01-15 00:00:00', 'admin', '2018-01-15 00:00:00'),
('file_bill', 'Bill Of Lading (BL)', 'LHV_CERTIFICATE', 1, 'admin', '2018-01-15 00:00:00', 'admin', '2018-01-15 00:00:00'),
('file_blending', 'Surat Blending (not mandatory)', 'DOCUMENT_UPLOAD', 5, 'EMP00001', '2017-08-10 11:50:17', 'EMP00001', '2017-08-10 11:50:17'),
('file_cnc_copy', 'Copy Sertifikat C N C Sumber Batubara IUP OP', 'LHV_CERTIFICATE', 10, 'admin', '2018-01-15 00:00:00', 'admin', '2018-01-15 00:00:00'),
('file_coal_price', 'Harga Batubara (F O B) Barge', 'LHV_CERTIFICATE', 8, 'admin', '2018-01-15 00:00:00', 'admin', '2018-01-15 00:00:00'),
('file_copylc', 'Copy L/C', 'DOCUMENT_UPLOAD', 7, 'EMP00001', '2017-08-10 11:51:20', 'EMP00001', '2017-08-10 11:51:20'),
('file_detail_bank', 'Nama & Alamat Bank', 'LHV_CERTIFICATE', 6, 'admin', '2018-01-15 00:00:00', 'admin', '2018-01-15 00:00:00'),
('file_inv', 'Commercial Invoice', 'DOCUMENT_UPLOAD', 3, 'EMP00001', '2017-08-10 11:48:53', 'EMP00001', '2017-08-10 11:48:53'),
('file_kalori', 'File Kalori', 'LHV_CERTIFICATE', 2, 'admin', '2018-01-15 00:00:00', 'admin', '2018-01-15 00:00:00'),
('file_moisture', 'File Moisture', 'LHV_CERTIFICATE', 3, 'admin', '2018-01-15 00:00:00', 'admin', '2018-01-15 00:00:00'),
('file_pck_list', 'Packing List/ Cargo Manifest', 'DOCUMENT_UPLOAD', 2, 'EMP00001', '2017-08-10 10:10:04', 'EMP00001', '2017-08-10 10:10:04'),
('file_pveb', 'PVEB', 'DOCUMENT_UPLOAD', 1, 'EMP00001', '2017-08-10 10:10:04', 'EMP00001', '2017-08-10 10:10:04'),
('file_royalty_cop', 'Copy bukti Setor Royalty', 'LHV_CERTIFICATE', 9, 'admin', '2018-01-15 00:00:00', 'admin', '2018-01-15 00:00:00'),
('file_royalty_val', 'Besaran Setoran dan Royalty *)', 'LHV_CERTIFICATE', 7, 'admin', '2018-01-15 00:00:00', 'admin', '2018-01-15 00:00:00'),
('file_shipper', 'Surat Pernyataan Kebenaran Dokumen dari Shipper', 'LHV_CERTIFICATE', 11, 'admin', '2018-01-15 00:00:00', 'admin', '2018-01-15 00:00:00'),
('file_spplc', 'Surat Pernyataan penggunaal LC', 'DOCUMENT_UPLOAD', 6, 'EMP00001', '2017-08-10 11:50:38', 'EMP00001', '2017-08-10 11:50:38'),
('file_ssbp', 'Bukti SSBP(Surat Setoran Bukan Pajak) atau Bukti Setoran Royalti', 'DOCUMENT_UPLOAD', 4, 'EMP00001', '2017-08-10 11:49:21', 'EMP00001', '2017-08-10 11:49:21'),
('file_sulfur', 'File Sulfur', 'LHV_CERTIFICATE', 4, 'admin', '2018-01-15 00:00:00', 'admin', '2018-01-15 00:00:00'),
('G', 'Gram', 'SO_UOM', 21, 'EMP00001', '2016-05-23 09:45:23', 'EMP00001', '2016-05-23 09:45:23'),
('G001', 'Domestic Goods', 'GOODS', 1, 'EMP00001', '2017-04-26 17:46:59', 'EMP00001', '2017-04-26 17:46:59'),
('G002', 'Import Goods', 'GOODS', 2, 'EMP00001', '2017-04-26 17:48:29', 'EMP00001', '2017-04-26 17:48:29'),
('G003', 'Domestic/Import', 'GOODS', 3, 'EMP00001', '2017-04-27 14:15:57', 'EMP00001', '2017-04-27 14:15:57'),
('Hematologi', 'Hematologi', 'GOLONGAN_LAB', 1, 'admin', '2014-02-08 09:33:23', 'admin', '2014-02-08 10:11:22'),
('HINDU', 'Hindu', 'RELIGION', 4, 'EMP00001', '2015-06-18 20:35:32', 'EMP00001', '2015-06-18 20:35:32'),
('HO', 'Head Office', 'OFFICE_STATUS', 1, 'admin', '2014-04-27 11:41:04', 'admin', '2014-04-27 11:41:04'),
('IDR', 'IDR', 'CURRENCY', 1, 'admin', '2013-10-21 17:33:06', 'admin', '2013-10-21 17:33:06'),
('INS01', 'Universitas Indonesia', 'INSTITUTION', 1, 'admin', '2014-01-26 13:14:35', 'admin', '2014-01-26 13:14:35'),
('INS02', 'Institut Pertanian Bogor', 'INSTITUTION', 2, 'admin', '2014-01-26 13:14:54', 'admin', '2014-01-26 13:14:54'),
('INT', 'Internal Training', 'TRAINING_TYPE', 1, 'admin', '2014-03-01 09:19:44', 'admin', '2014-03-01 09:19:44'),
('ISLAM', 'Islam', 'RELIGION', 5, 'EMP00001', '2015-06-18 20:35:56', 'EMP00001', '2015-06-18 20:35:56'),
('IUP', 'IUP', 'PERIZINAN', 1, 'EMP00001', '2018-01-11 09:51:54', 'EMP00001', '2018-01-11 09:51:54'),
('JASA', 'JASA', 'JENIS_TINDAKAN', 1, 'EMP00001', '2018-04-02 15:52:05', 'EMP00001', '2018-04-02 15:52:05'),
('JK01', 'Male', 'GENDER', 1, 'admin', '2013-11-01 23:03:31', 'admin', '2013-11-02 18:18:25'),
('JK02', 'Female', 'GENDER', 2, 'admin', '2013-11-01 23:03:47', 'admin', '2013-11-01 23:03:47'),
('JS00302', 'Direct worker', 'EMP_TYPE', 1, 'EMP00001', '2015-08-01 00:11:02', 'EMP00001', '2015-08-01 00:11:02'),
('JS00306', 'Indirect worker', 'EMP_TYPE', 2, 'EMP00001', '2015-08-01 00:11:26', 'EMP00001', '2015-08-01 00:11:26'),
('JS00325', 'Freelance', 'EMP_TYPE', 3, 'EMP00001', '2015-08-01 00:11:48', 'EMP00001', '2015-08-01 00:11:48'),
('JT001', 'CEO', 'JOB_TITLE', 1, 'EMP00001', '2015-08-01 00:06:35', 'EMP00001', '2015-08-01 00:06:35'),
('JT010', 'Asst. Manager', 'JOB_TITLE', 2, 'EMP00001', '2015-08-01 00:06:54', 'EMP00001', '2015-08-01 00:06:54'),
('JT020', 'Budget Control Officer', 'JOB_TITLE', 3, 'EMP00001', '2015-08-01 00:07:11', 'EMP00001', '2015-08-01 00:07:11'),
('JT022', 'Accounting Officer', 'JOB_TITLE', 4, 'EMP00001', '2015-08-01 00:07:39', 'EMP00001', '2015-08-01 00:07:39'),
('KCAL/KG', 'Kcal/kg (adb)', 'LHV_VARIABLE', 2, 'admin', '2018-01-15 00:00:00', 'admin', '2018-01-15 00:00:00'),
('KEPERCAYAAN', 'Kepercayaan', 'RELIGION', 6, 'EMP00001', '2015-06-18 20:36:11', 'EMP00001', '2015-06-18 20:36:11'),
('KG', 'Kilogram (Kg)', 'SO_UOM', 12, 'admin', '2016-03-02 15:55:01', 'admin', '2016-03-02 15:56:03'),
('KL', 'Kilo Liter (KL)', 'SO_UOM', 8, 'admin', '2016-01-19 11:05:36', 'admin', '2016-01-19 11:05:36'),
('L', 'Liter (L)', 'SO_UOM', 11, 'admin', '2016-02-17 14:20:36', 'admin', '2016-02-17 14:20:36'),
('L01', 'New', 'LABEL_STATUS', 1, 'EMP00001', '2017-05-22 14:56:23', 'EMP00001', '2017-05-22 14:56:23'),
('L02', 'Scheduled', 'LABEL_STATUS', 2, 'EMP00001', '2017-05-22 14:57:10', 'EMP00001', '2017-06-08 13:44:53'),
('L03', 'In-Progress', 'LABEL_STATUS', 3, 'EMP00001', '2017-05-22 14:57:28', 'EMP00001', '2017-06-08 13:45:09'),
('L04', 'Completed', 'LABEL_STATUS', 4, 'EMP00001', '2017-05-22 14:57:47', 'EMP00001', '2017-06-08 13:45:24'),
('L05', 'Delivery Order', 'LABEL_STATUS', 5, 'EMP00001', '2017-06-08 13:45:46', 'EMP00001', '2017-06-08 13:45:46'),
('L06', 'Receive Package', 'LABEL_STATUS', 6, 'EMP00001', '2017-06-07 09:36:07', 'EMP00001', '2017-06-07 09:36:07'),
('L07', 'Complaint Package', 'LABEL_STATUS', 7, 'EMP00001', '2017-06-07 09:36:07', 'EMP00001', '2017-06-14 15:54:29'),
('LAKI-LAKI', 'LAKI-LAKI', 'JENIS_KELAMIN', 1, 'EMP00001', '2018-04-06 10:17:29', 'EMP00001', '2018-04-06 10:17:29'),
('Lemak', 'Lemak', 'GOLONGAN_LAB', 2, 'admin', '2014-02-08 09:33:23', 'admin', '2014-02-08 10:11:22'),
('LOT', 'Lot', 'SO_UOM', 20, 'EMP00001', '2016-05-23 09:45:07', 'EMP00001', '2016-05-23 09:45:07'),
('LTD', 'LTD.', 'COMPANY_TYPE', 4, 'admin', '2017-08-02 08:11:56', 'admin', '2017-08-02 08:11:56'),
('LUSIN', 'LUSIN', 'SO_UOM', 13, 'EMP00001', '2016-04-21 16:52:50', 'EMP00001', '2016-04-21 16:52:50'),
('MARRIED', 'Married', 'MARITALSTATUS', 1, 'EMP00001', '2015-06-18 20:33:07', 'EMP00001', '2015-06-18 20:33:07'),
('MENIKAH', 'MENIKAH', 'STATUS_PERKAWINAN', 2, 'EMP00001', '2018-04-06 10:20:11', 'EMP00001', '2018-04-06 10:20:11'),
('NURSE', 'NURSE', 'JENIS_KARYAWAN', 2, 'EMP00001', '2018-04-02 16:18:12', 'EMP00001', '2018-04-02 16:18:12'),
('OFS', 'Offshore', 'TJOBTYPE', 1, 'admin', '2013-11-06 22:53:50', 'admin', '2013-11-06 22:53:50'),
('ONS', 'Onshore', 'TJOBTYPE', 2, 'admin', '2013-11-06 22:54:18', 'admin', '2013-11-06 22:54:18'),
('PACK', 'Pack', 'SO_UOM', 16, 'EMP00001', '2016-05-23 09:44:21', 'EMP00001', '2016-05-23 09:44:21'),
('Paket', 'Paket', 'JENIS_TINDAKAN_LAB', 1, 'admin', '2014-02-08 09:33:23', 'admin', '2014-02-08 10:11:22'),
('PCS', 'PIECES', 'SO_UOM', 14, 'EMP00001', '2016-04-21 16:53:09', 'EMP00001', '2016-04-21 16:53:09'),
('PEGAWAI SWASTA', 'PEGAWAI SWASTA', 'JENIS_PEKERJAAN', 1, 'EMP00001', '2018-04-06 10:18:25', 'EMP00001', '2018-04-06 10:18:25'),
('PEREMPUAN', 'PEREMPUAN', 'JENIS_KELAMIN', 2, 'EMP00001', '2018-04-06 10:17:54', 'EMP00001', '2018-04-06 10:17:54'),
('PH', 'Public Holiday', 'HOLIDAY_TYPE', 1, 'EMP00001', '2017-04-28 09:27:57', 'EMP00001', '2017-04-28 09:27:57'),
('PKP2B', 'PKP2B', 'PERIZINAN', 2, 'EMP00001', '2018-01-11 09:52:14', 'EMP00001', '2018-01-11 09:52:14'),
('PO', 'Purchase Order', 'PO_TYPE', 2, 'EMP00001', '2016-05-11 15:15:20', 'EMP00001', '2016-05-11 15:15:20'),
('POLI_MATA', 'POLI_MATA', 'POLI_JENIS', 1, 'EMP00001', '2018-04-02 15:36:13', 'EMP00001', '2018-04-02 15:36:13'),
('POLI_UMUM', 'POLI_UMUM', 'POLI_JENIS', 2, 'EMP00001', '2018-04-02 15:36:35', 'EMP00001', '2018-04-02 15:36:35'),
('PROTESTANT', 'Protestant', 'RELIGION', 7, 'EMP00001', '2015-06-18 20:36:36', 'EMP00001', '2015-06-18 20:36:36'),
('PT', 'PT', 'COMPANY_TYPE', 1, 'admin', '2013-10-21 10:30:35', 'admin', '2013-10-21 10:30:35'),
('RC_ASSET', 'Asset', 'Resource_Category', 3, 'admin', '2014-02-10 10:34:58', 'admin', '2014-02-10 10:34:58'),
('RC_EMP', 'Employee', 'Resource_Category', 1, 'admin', '2014-02-10 10:34:11', 'admin', '2014-02-10 10:34:11'),
('RC_ITEM', 'Item', 'Resource_Category', 2, 'admin', '2014-02-10 10:34:41', 'admin', '2014-02-10 10:34:41'),
('RFA', 'Request Advance', 'TMPEMAIL_TYPE', 12, 'EMP00001', '2017-03-23 11:50:59', 'EMP00001', '2017-03-23 11:50:59'),
('RIM', 'RIM', 'SO_UOM', 15, 'EMP00001', '2016-05-23 09:44:06', 'EMP00001', '2016-05-23 09:44:06'),
('Rinci', 'Item Rinci', 'JENIS_TINDAKAN_LAB', 1, 'admin', '2014-02-08 09:33:23', 'admin', '2014-02-08 10:11:22'),
('ROL', 'Rol', 'SO_UOM', 22, 'EMP00001', '2016-05-23 09:47:23', 'EMP00001', '2016-05-23 09:47:23'),
('RP', 'RP', 'CURRENCY', 6, 'EMP00001', '2018-01-11 09:58:08', 'EMP00001', '2018-01-11 10:00:08'),
('RP/TON', 'RP/ton', 'LHV_VARIABLE', 6, 'admin', '2018-01-15 00:00:00', 'admin', '2018-01-15 00:00:00'),
('RUPIAH', 'Rp', 'LHV_VARIABLE', 5, 'admin', '2018-01-15 00:00:00', 'admin', '2018-01-15 00:00:00'),
('S1', 'Bachelor Degree', 'EDUCATION_LEVEL', 1, 'admin', '2014-01-25 13:01:44', 'admin', '2014-01-25 13:01:44'),
('S2', 'Masters Degree', 'EDUCATION_LEVEL', 2, 'admin', '2014-01-25 13:02:00', 'admin', '2014-01-25 13:02:00'),
('S3', 'Doctorate Degree', 'EDUCATION_LEVEL', 3, 'admin', '2014-01-25 13:02:17', 'admin', '2014-01-25 13:02:17'),
('SC01', 'Domestic', 'SCOPE', 1, 'admin', '2014-03-04 09:06:37', 'admin', '2014-03-04 09:06:37'),
('SC02', 'Overseas', 'SCOPE', 2, 'admin', '2014-03-04 09:08:10', 'admin', '2014-03-04 09:08:10'),
('SCHEMA_1', 'Schema 1', 'SCHEMA', 1, 'EMP00001', '2017-05-04 10:22:05', 'EMP00001', '2017-05-04 10:22:05'),
('SCHEMA_2', 'Schema 2', 'SCHEMA', 2, 'EMP00001', '2017-05-04 10:22:21', 'EMP00001', '2017-05-04 10:22:21'),
('SET', 'Set', 'SO_UOM', 19, 'EMP00001', '2016-05-23 09:44:57', 'EMP00001', '2016-05-23 09:44:57'),
('SGD', 'SGD', 'CURRENCY', 3, 'EMP00001', '2016-07-22 09:43:41', 'EMP00001', '2016-07-22 09:43:41'),
('SINGLE', 'Single', 'STATUS_PERKAWINAN', 1, 'EMP00001', '2015-06-18 20:33:38', 'EMP00001', '2018-04-06 10:19:45'),
('SMP', 'Sampling', 'TJOBTYPE', 4, 'EMP00001', '2015-07-28 14:54:36', 'EMP00001', '2015-07-28 14:54:36'),
('SRPT01', 'Sales Order', 'SIGN_REPORT', 1, 'EMP00001', '2015-07-31 09:33:41', 'EMP00001', '2015-07-31 09:33:41'),
('SRPT02', 'Batch', 'SIGN_REPORT', 2, 'EMP00001', '2015-07-31 09:33:57', 'EMP00001', '2015-07-31 09:33:57'),
('ST01', 'Verification Request (Sent)', 'UPDATE_STATUS', 1, 'admin', '2015-12-17 11:07:10', 'admin', '2016-02-17 15:48:11'),
('ST02', 'Verification Request Received (DP)', 'UPDATE_STATUS', 2, 'admin', '2015-12-17 11:09:57', 'admin', '2016-02-17 15:49:24'),
('ST03', 'Verification Request Rejected', 'UPDATE_STATUS', 3, 'admin', '2015-12-17 11:11:02', 'admin', '2016-02-17 15:49:42'),
('ST06', 'Draft LS', 'UPDATE_STATUS', 4, 'admin', '2015-12-17 11:11:53', 'admin', '2015-12-17 11:11:53'),
('ST07', 'Final LS', 'UPDATE_STATUS', 5, 'admin', '2015-12-17 11:12:09', 'admin', '2015-12-17 11:12:09'),
('ST08', 'Submit to INATRADE', 'UPDATE_STATUS', 6, 'admin', '2016-02-17 15:50:18', 'admin', '2016-02-17 15:51:34'),
('ST09', 'VOID', 'UPDATE_STATUS', 7, 'admin', '2016-02-29 10:02:33', 'admin', '2016-02-29 10:02:33'),
('TBK', 'Tbk.', 'COMPANY_TYPE', 3, 'admin', '2013-10-23 11:18:57', 'admin', '2013-10-23 11:18:57'),
('TET01', 'Request Template', 'TMPEMAIL_TYPE', 1, 'admin', '2014-03-06 11:43:57', 'EMP00001', '2016-06-14 10:02:56'),
('TET02', 'Pass Approval Template', 'TMPEMAIL_TYPE', 2, 'admin', '2014-03-06 11:44:30', 'admin', '2014-03-06 13:47:29'),
('TET04', 'Delivered Resi', 'TMPEMAIL_TYPE', 14, 'EMP00001', '2017-06-20 08:45:26', 'EMP00001', '2017-06-20 08:45:26'),
('TINDAKAN', 'TINDAKAN', 'JENIS_TINDAKAN', 2, 'EMP00001', '2018-04-02 15:52:19', 'EMP00001', '2018-04-02 15:52:19'),
('TON', 'TON', 'LHV_VARIABLE', 1, 'admin', '2018-01-15 00:00:00', 'admin', '2018-01-15 00:00:00'),
('TRANSFER', 'Transfer', 'PAIDTYPE', 1, 'EMP00001', '2015-11-04 11:52:49', 'EMP00001', '2015-11-04 11:52:49'),
('TRANSPORT01', 'Containers', 'TRANSPORT', 1, 'admin', '2017-08-04 09:49:03', 'admin', '2017-08-04 09:49:03'),
('TRANSPORT02', 'Vessel', 'TRANSPORT', 2, 'admin', '2017-08-04 09:49:39', 'admin', '2017-08-04 09:49:39'),
('TRIP', 'Trip', 'TUNIT', 2, 'admin', '2013-11-30 22:13:47', 'admin', '2013-11-30 22:13:47'),
('Tunggal', 'Tunggal', 'JENIS_TINDAKAN_LAB', 1, 'admin', '2014-02-08 09:33:23', 'admin', '2014-02-08 10:11:22'),
('UNIT', 'Unit', 'SO_UOM', 17, 'EMP00001', '2016-05-23 09:44:34', 'EMP00001', '2016-05-23 09:44:34'),
('USD', 'USD', 'CURRENCY', 2, 'admin', '2013-10-21 17:33:28', 'admin', '2013-10-21 17:33:28'),
('VPIC', 'Vendor PIC', 'CATEGORY_PIC', 1, 'EMP00001', '2016-04-20 14:28:35', 'EMP00001', '2016-04-20 14:28:35'),
('WIRAUSAHA', 'WIRAUSAHA', 'JENIS_PEKERJAAN', 2, 'EMP00001', '2018-04-06 10:18:40', 'EMP00001', '2018-04-06 10:18:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tmst_typevar`
--
ALTER TABLE `tmst_typevar`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
