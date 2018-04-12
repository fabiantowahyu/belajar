-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2018 at 05:33 AM
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
-- Table structure for table `ttrs_pemeriksaan_lab_item`
--

CREATE TABLE `ttrs_pemeriksaan_lab_item` (
  `id` int(11) NOT NULL,
  `id_pemeriksaan` varchar(32) NOT NULL,
  `kode_tindakan_lab` varchar(64) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `diskon` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `recdate` datetime NOT NULL,
  `userid` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ttrs_pemeriksaan_lab_item`
--

INSERT INTO `ttrs_pemeriksaan_lab_item` (`id`, `id_pemeriksaan`, `kode_tindakan_lab`, `harga`, `diskon`, `total`, `recdate`, `userid`) VALUES
(2, 'CHK00001', 'MDC00002', '8000', 10, '7200', '2018-04-12 10:32:23', 'EMP00001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ttrs_pemeriksaan_lab_item`
--
ALTER TABLE `ttrs_pemeriksaan_lab_item`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ttrs_pemeriksaan_lab_item`
--
ALTER TABLE `ttrs_pemeriksaan_lab_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
