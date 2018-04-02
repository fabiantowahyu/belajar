-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2018 at 09:39 AM
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
-- Table structure for table `tmst_supplier`
--

CREATE TABLE `tmst_supplier` (
  `supplier_id` varchar(16) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `type` varchar(16) DEFAULT NULL,
  `pic` varchar(32) NOT NULL,
  `category` varchar(32) NOT NULL,
  `priority` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `hp` varchar(16) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `fax` varchar(16) NOT NULL,
  `postcode` varchar(16) NOT NULL,
  `province` varchar(128) NOT NULL,
  `country` varchar(128) NOT NULL,
  `address` text,
  `npwp` varchar(64) NOT NULL,
  `npwp_address` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `userid` varchar(32) NOT NULL,
  `recdate` datetime NOT NULL,
  `moduser` varchar(32) NOT NULL,
  `moddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmst_supplier`
--

INSERT INTO `tmst_supplier` (`supplier_id`, `supplier_name`, `type`, `pic`, `category`, `priority`, `email`, `hp`, `phone`, `fax`, `postcode`, `province`, `country`, `address`, `npwp`, `npwp_address`, `status`, `userid`, `recdate`, `moduser`, `moddate`) VALUES
('CLI00003', 'Customer / Exporter Name Test 1', 'PT', 'PIC Name Test 1', '', '', 'EmailTest1@email.com', '', '22222', '22222', '22222', '1', 'ID', 'Address Test 1', '111111', 'NPWP Address Test 1', 1, 'admin', '2017-07-31 11:40:11', 'admin', '2017-07-31 11:40:18'),
('CLI00004', 'Tama Nama', 'TBK', 'Tama Pic', '', '', '22222@gmail.com', '', '22222', '22222', '22222', '1', 'ID', 'Tama Address', '22222', '22222', 1, 'admin', '2017-08-01 10:49:31', 'admin', '2017-08-01 10:49:36'),
('CLI00005', 'LEBUSWANA PERKASA', 'PT', 'RIZKI', '', '', 'Email@email.com', '', '11111', '', '', '15', 'ID', 'MUTIARA 52, JL. VICO RT. 003, SUNGAI SELUANG, SEMBOJA KUTAI KATANEGARA - KALIMANTAN TIMUR, INDONESIA', '02.503.576.7-725.000', 'npwp addr', 1, 'admin', '2017-08-01 11:11:20', 'admin', '2017-08-02 08:15:15'),
('CLI00006', 'asdasd', 'PT', 'asdasd', '', '', 'asd@a.com', '', '123123', '', '', '2', '', 'asdasd', '', '', 1, 'EMP00001', '2017-09-20 11:29:42', 'EMP00001', '2017-09-20 11:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `tmst_supplier_address`
--

CREATE TABLE `tmst_supplier_address` (
  `id` varchar(32) NOT NULL,
  `supplier_id` varchar(32) NOT NULL,
  `def_shipping` int(1) NOT NULL DEFAULT '0',
  `def_billing` int(1) NOT NULL DEFAULT '0',
  `residential` int(1) NOT NULL DEFAULT '0',
  `label` varchar(64) NOT NULL,
  `attention` varchar(32) NOT NULL,
  `addressee` varchar(64) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `city` varchar(64) NOT NULL,
  `province` varchar(64) NOT NULL,
  `country` varchar(64) NOT NULL,
  `post_code` varchar(16) NOT NULL,
  `address` text NOT NULL,
  `override` int(1) NOT NULL DEFAULT '0',
  `district` varchar(32) DEFAULT NULL,
  `userid` varchar(32) NOT NULL,
  `recdate` datetime NOT NULL,
  `moduser` varchar(32) NOT NULL,
  `moddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmst_supplier_address`
--

INSERT INTO `tmst_supplier_address` (`id`, `supplier_id`, `def_shipping`, `def_billing`, `residential`, `label`, `attention`, `addressee`, `phone`, `city`, `province`, `country`, `post_code`, `address`, `override`, `district`, `userid`, `recdate`, `moduser`, `moddate`) VALUES
('20170519134621041473', 'CLI00001', 0, 0, 0, '', 'Danang Wahid', '', '0812343434343', '115', '9', 'ID', '', 'Perum Taman Anyelir 1 Blok A3 No 7 ', 0, NULL, 'Danang', '2017-05-19 13:46:21', 'Danang', '2017-05-19 13:46:21'),
('20170522153436873443', 'CLI00002', 0, 0, 0, '', 'Budi', '', '43698759675945', '115', '9', 'ID', '', 'Anyelir 1 Blok AHBG', 0, NULL, 'Benriwan', '2017-05-22 15:34:36', 'Benriwan', '2017-05-22 15:34:36'),
('20170620132810826171', 'CLI00001', 0, 0, 0, '', 'Muna Mustika Anas', '', '099897987', '115', '9', 'ID', '', 'Perum Taman Anyelir 1 Blok A3 No 7', 0, '1584', 'Danang', '2017-06-20 13:28:10', 'Danang', '2017-06-20 13:28:10'),
('20170704062010599731', 'CLI00001', 0, 0, 0, '', 'Samekto', '', '6359674596', '151', '6', 'ID', '', 'TEST ARDIIIIII KEREN EUY (TEST)', 0, '2087', 'Danang', '2017-07-04 06:20:10', 'Danang', '2017-07-11 16:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `tmst_supplier_pic`
--

CREATE TABLE `tmst_supplier_pic` (
  `id` varchar(32) NOT NULL,
  `supplier_id` varchar(32) NOT NULL,
  `contact_name` varchar(64) NOT NULL,
  `email` varchar(32) NOT NULL,
  `fax` varchar(16) NOT NULL,
  `hp` varchar(16) NOT NULL,
  `work_phone` varchar(16) NOT NULL,
  `category` varchar(8) NOT NULL,
  `userid` varchar(32) NOT NULL,
  `recdate` datetime NOT NULL,
  `moduser` varchar(32) NOT NULL,
  `moddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tmst_supplier`
--
ALTER TABLE `tmst_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tmst_supplier_address`
--
ALTER TABLE `tmst_supplier_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`supplier_id`);

--
-- Indexes for table `tmst_supplier_pic`
--
ALTER TABLE `tmst_supplier_pic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`supplier_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
