-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2017 at 08:57 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simuh`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `billing`
-- (See below for the actual view)
--
CREATE TABLE `billing` (
`id_billing` int(10)
,`id_user` int(10)
,`id_paket` int(10)
,`daftar` varchar(100)
,`expire` varchar(100)
,`status` enum('0','1')
,`id_admin` int(10)
,`member` varchar(90)
,`username` varchar(50)
,`statm` enum('0','1')
,`nama_paket` varchar(50)
,`masa_aktif` varchar(10)
,`admin` varchar(90)
);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(90) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `nama`, `alamat`, `telp`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Sukmo Wijoyo', 'PP. Al-Luqmaniyyah. Jl. Babaran, Pandeyan, Umbulharjo, Yogyakarta 59815', '085729815915');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_billing`
--

CREATE TABLE `tbl_billing` (
  `id_billing` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_paket` int(10) NOT NULL,
  `daftar` varchar(100) NOT NULL,
  `expire` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `id_admin` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_billing`
--

INSERT INTO `tbl_billing` (`id_billing`, `id_user`, `id_paket`, `daftar`, `expire`, `status`, `id_admin`) VALUES
(10, 8, 1, '2017-04-07 05:44:09', '2017-04-10 05:44:09', '0', 1),
(11, 8, 1, '2017-04-07 05:50:21', '2017-04-10 05:50:21', '0', 1),
(12, 8, 7, '2017-04-07 11:53:15', '2017-04-07 14:35:15', '0', 1),
(13, 8, 7, '2017-04-07 14:07:09', '2017-04-07 14:50:09', '0', 1),
(14, 8, 7, '2017-04-07 14:57:39', '2017-04-07 15:15:39', '0', 1),
(15, 8, 6, '2017-04-08 00:23:34', '', '0', 1),
(16, 8, 6, '2017-04-08 03:29:31', '', '0', 1),
(17, 8, 6, '2017-04-08 03:30:51', '', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_config`
--

CREATE TABLE `tbl_config` (
  `id_config` int(10) NOT NULL,
  `router_name` varchar(50) NOT NULL,
  `router_ip` varchar(50) NOT NULL,
  `router_user` varchar(50) NOT NULL,
  `router_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_config`
--

INSERT INTO `tbl_config` (`id_config`, `router_name`, `router_ip`, `router_user`, `router_pass`) VALUES
(1, 'Al-Luqmaniyyah', '10.5.50.1', 'udev', 'arni');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id_member` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(90) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(60) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`id_member`, `username`, `password`, `nama`, `alamat`, `telp`, `status`) VALUES
(8, 'sodrun', 'tegang', 'sodrun', 'sodrun', '089', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paket`
--

CREATE TABLE `tbl_paket` (
  `id_paket` int(10) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `jenis_paket` enum('0','1') NOT NULL,
  `bandwidth` varchar(50) NOT NULL,
  `masa_aktif` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_paket`
--

INSERT INTO `tbl_paket` (`id_paket`, `nama_paket`, `jenis_paket`, `bandwidth`, `masa_aktif`) VALUES
(1, '3 hari', '1', '123k/123k', '3'),
(6, 'Ustadz', '0', '123k/123k', 'Unlimited'),
(7, '1 jam', '1', '123k/123k', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesan`
--

CREATE TABLE `tbl_pesan` (
  `id_pesan` int(10) NOT NULL,
  `id_sender` int(10) NOT NULL,
  `id_receiver` int(10) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `time_pesan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `kat` enum('B','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pesan`
--

INSERT INTO `tbl_pesan` (`id_pesan`, `id_sender`, `id_receiver`, `subject`, `pesan`, `time_pesan`, `status`, `kat`) VALUES
(2, 7, 1, 'user non aktif', 'maaf, user saya non aktif', '2017-04-04 06:41:45', '0', 'N'),
(3, 1, 7, 'user non aktif', 'iya, soalnya sudah mencapai batas penggunaan mas.', '2017-04-04 02:37:30', '0', 'B'),
(4, 7, 1, 'user non aktif', 'iya mas... terimakasih', '2017-04-04 06:41:38', '0', 'B');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vpkt`
-- (See below for the actual view)
--
CREATE TABLE `vpkt` (
`id_billing` int(10)
,`id_user` int(10)
,`id_paket` int(10)
,`daftar` varchar(100)
,`expire` varchar(100)
,`status` enum('0','1')
,`id_admin` int(10)
,`username` varchar(50)
,`nama_paket` varchar(50)
,`bandwidth` varchar(50)
,`admin` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `billing`
--
DROP TABLE IF EXISTS `billing`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `billing`  AS  (select `tbl_billing`.`id_billing` AS `id_billing`,`tbl_billing`.`id_user` AS `id_user`,`tbl_billing`.`id_paket` AS `id_paket`,`tbl_billing`.`daftar` AS `daftar`,`tbl_billing`.`expire` AS `expire`,`tbl_billing`.`status` AS `status`,`tbl_billing`.`id_admin` AS `id_admin`,`tbl_member`.`nama` AS `member`,`tbl_member`.`username` AS `username`,`tbl_member`.`status` AS `statm`,`tbl_paket`.`nama_paket` AS `nama_paket`,`tbl_paket`.`masa_aktif` AS `masa_aktif`,`tbl_admin`.`nama` AS `admin` from ((`tbl_paket` join `tbl_admin`) join (`tbl_billing` join `tbl_member` on((`tbl_billing`.`id_user` = `tbl_member`.`id_member`)))) where (`tbl_billing`.`id_paket` = `tbl_paket`.`id_paket`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vpkt`
--
DROP TABLE IF EXISTS `vpkt`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vpkt`  AS  (select `tbl_billing`.`id_billing` AS `id_billing`,`tbl_billing`.`id_user` AS `id_user`,`tbl_billing`.`id_paket` AS `id_paket`,`tbl_billing`.`daftar` AS `daftar`,`tbl_billing`.`expire` AS `expire`,`tbl_billing`.`status` AS `status`,`tbl_billing`.`id_admin` AS `id_admin`,`tbl_member`.`username` AS `username`,`tbl_paket`.`nama_paket` AS `nama_paket`,`tbl_paket`.`bandwidth` AS `bandwidth`,`tbl_admin`.`username` AS `admin` from ((`tbl_admin` join `tbl_paket`) join (`tbl_billing` join `tbl_member` on((`tbl_billing`.`id_user` = `tbl_member`.`id_member`)))) where (`tbl_billing`.`id_paket` = `tbl_paket`.`id_paket`) order by `tbl_billing`.`daftar` desc) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_billing`
--
ALTER TABLE `tbl_billing`
  ADD PRIMARY KEY (`id_billing`);

--
-- Indexes for table `tbl_config`
--
ALTER TABLE `tbl_config`
  ADD PRIMARY KEY (`id_config`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id_member`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_billing`
--
ALTER TABLE `tbl_billing`
  MODIFY `id_billing` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_config`
--
ALTER TABLE `tbl_config`
  MODIFY `id_config` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id_member` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  MODIFY `id_paket` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  MODIFY `id_pesan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
