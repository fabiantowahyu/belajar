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
-- Table structure for table `tmst_pasien`
--

CREATE TABLE `tmst_pasien` (
  `id` int(11) NOT NULL,
  `id_pasien` varchar(32) NOT NULL,
  `nama` varchar(384) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(32) NOT NULL,
  `foto` varchar(32) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `recdate` datetime NOT NULL,
  `moddate` datetime NOT NULL,
  `moduser` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmst_pasien`
--

INSERT INTO `tmst_pasien` (`id`, `id_pasien`, `nama`, `alamat`, `telp`, `foto`, `userid`, `recdate`, `moddate`, `moduser`) VALUES
(1, 'MDC00002', 'asd1', 'asd2', 'asd3', '1233', 'EMP00001', '2018-03-29 14:11:26', '2018-03-29 14:18:27', 'EMP00001'),
(2, 'DCT00003', 'asd', 'asd', 'asd', 'asd', 'EMP00001', '2018-03-29 14:48:30', '2018-03-29 14:48:30', 'EMP00001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tmst_pasien`
--
ALTER TABLE `tmst_pasien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tmst_pasien`
--
ALTER TABLE `tmst_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
