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
-- Table structure for table `ttrs_pemeriksaan_lab`
--

CREATE TABLE `ttrs_pemeriksaan_lab` (
  `id` int(11) NOT NULL,
  `id_pemeriksaan` varchar(32) NOT NULL,
  `tgl_kunjungan` datetime NOT NULL,
  `no_urut` varchar(32) NOT NULL,
  `pasien` varchar(64) NOT NULL,
  `dokter` varchar(64) NOT NULL,
  `nama_dokter` varchar(64) NOT NULL,
  `asuransi` varchar(32) NOT NULL,
  `recdate` datetime NOT NULL,
  `userid` varchar(32) NOT NULL,
  `moddate` datetime NOT NULL,
  `moduser` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ttrs_pemeriksaan_lab`
--

INSERT INTO `ttrs_pemeriksaan_lab` (`id`, `id_pemeriksaan`, `tgl_kunjungan`, `no_urut`, `pasien`, `dokter`, `nama_dokter`, `asuransi`, `recdate`, `userid`, `moddate`, `moduser`) VALUES
(1, 'CHK00001', '2018-03-29 14:11:26', 'MDC00002', 'DCT00003', 'MDC00002', '', 'DCT00003', '2018-04-12 10:32:23', 'EMP00001', '2018-04-12 10:32:23', 'EMP00001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ttrs_pemeriksaan_lab`
--
ALTER TABLE `ttrs_pemeriksaan_lab`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ttrs_pemeriksaan_lab`
--
ALTER TABLE `ttrs_pemeriksaan_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
