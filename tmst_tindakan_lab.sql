-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2018 at 10:19 AM
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
-- Table structure for table `tmst_tindakan_lab`
--

CREATE TABLE `tmst_tindakan_lab` (
  `id` int(11) NOT NULL,
  `id_tindakan_lab` varchar(32) NOT NULL,
  `nama_tindakan_lab` text NOT NULL,
  `poli` varchar(256) NOT NULL,
  `golongan` varchar(32) NOT NULL,
  `jenis` varchar(32) NOT NULL,
  `tarif` decimal(10,0) NOT NULL,
  `fee` decimal(10,0) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `recdate` datetime NOT NULL,
  `moddate` datetime NOT NULL,
  `moduser` varchar(64) NOT NULL,
  `nilai_rujukan_dewasa_pria` varchar(32) NOT NULL,
  `nilai_rujukan_dewasa_wanita` varchar(32) NOT NULL,
  `nilai_rujukan_anak_pria` varchar(32) NOT NULL,
  `nilai_rujukan_anak_wanita` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmst_tindakan_lab`
--

INSERT INTO `tmst_tindakan_lab` (`id`, `id_tindakan_lab`, `nama_tindakan_lab`, `poli`, `golongan`, `jenis`, `tarif`, `fee`, `userid`, `recdate`, `moddate`, `moduser`, `nilai_rujukan_dewasa_pria`, `nilai_rujukan_dewasa_wanita`, `nilai_rujukan_anak_pria`, `nilai_rujukan_anak_wanita`) VALUES
(1, 'MDL00002', 'Tes HAEMATOLOGI', 'asd2', 'Hematologi', 'Rinci', '125000', '15000', 'EMP00001', '2018-03-29 14:11:26', '2018-04-12 10:41:36', 'EMP00001', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tmst_tindakan_lab`
--
ALTER TABLE `tmst_tindakan_lab`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tmst_tindakan_lab`
--
ALTER TABLE `tmst_tindakan_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
