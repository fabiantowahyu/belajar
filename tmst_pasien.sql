-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2018 at 10:09 AM
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
  `nama_pasien` varchar(384) NOT NULL,
  `no_rm` varchar(32) NOT NULL,
  `asuransi` varchar(32) NOT NULL,
  `no_asuransi` varchar(64) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(32) NOT NULL,
  `foto` varchar(32) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `recdate` datetime NOT NULL,
  `moddate` datetime NOT NULL,
  `moduser` varchar(64) NOT NULL,
  `kota` varchar(256) NOT NULL,
  `jenis_kelamin` varchar(24) NOT NULL,
  `pekerjaan` varchar(128) NOT NULL,
  `status_perkawinan` varchar(32) NOT NULL,
  `tempat_lahir` varchar(64) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `umur` int(3) NOT NULL,
  `email` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmst_pasien`
--

INSERT INTO `tmst_pasien` (`id`, `id_pasien`, `nama_pasien`, `no_rm`, `asuransi`, `no_asuransi`, `alamat`, `telp`, `foto`, `userid`, `recdate`, `moddate`, `moduser`, `kota`, `jenis_kelamin`, `pekerjaan`, `status_perkawinan`, `tempat_lahir`, `tanggal_lahir`, `umur`, `email`) VALUES
(1, 'PSN00001', 'Bapa', 'no_rm_bapa', 'ASRN00001', 'no_asuransi12', 'asd2', 'asd3', '1233', 'EMP00001', '2018-03-29 14:11:26', '2018-03-29 14:18:27', 'EMP00001', '', '', '', '', '', '0000-00-00', 0, ''),
(2, 'PSN00002', 'Ibu', 'no_rm_ibu', 'ASRN00001', 'no_asuransiibu', 'asd', 'asd', 'asd', 'EMP00001', '2018-03-29 14:48:30', '2018-03-29 14:48:30', 'EMP00001', '', '', '', '', '', '0000-00-00', 0, '');

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
