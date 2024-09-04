-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 04:37 AM
-- Server version: 10.4.14-MariaDB-log
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tamu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `users` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nohp` int(20) NOT NULL,
  `bidang` enum('Super Admin','Resepsionis','N1','N2','N3','Satpol PP') NOT NULL,
  `level` enum('0','1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`users`, `nama`, `username`, `password`, `nohp`, `bidang`, `level`) VALUES
(1, 'yunus', 'admin', 'admin@@', 123, 'Super Admin', '0'),
(2, 'aurel', 'resepsionis', 'resepsionis', 9875421, 'Resepsionis', '1'),
(3, 'soobin', 'sekpri1', 'sekpri1', 321, 'N1', '2'),
(7, 'rivaldo', 'sekpri2', 'sekpri2', 123, 'N2', '2'),
(11, 'david', 'sekpri3', 'sekpri3', 12344, 'N3', '2'),
(29, 'gunawan', 'satpol', 'satpol', 2222, 'Satpol PP', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tamu`
--

CREATE TABLE `tb_tamu` (
  `id_tamu` int(11) NOT NULL,
  `foto` varchar(2000) NOT NULL,
  `nik` int(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `tujuan` enum('N1','N2','N3','Lainnya') NOT NULL,
  `keperluan` varchar(100) NOT NULL,
  `jumlah` int(15) NOT NULL,
  `waktu` datetime NOT NULL,
  `status` enum('Reject','Accept','Finish') NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `tamu` enum('Entry','Done') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tamu`
--

INSERT INTO `tb_tamu` (`id_tamu`, `foto`, `nik`, `nama`, `jenis_kelamin`, `alamat`, `tujuan`, `keperluan`, `jumlah`, `waktu`, `status`, `keterangan`, `tamu`) VALUES
(134, '', 0, 'Dika Astriana', 'Laki-laki', 'asdasd', 'N1', '', 123, '2019-11-12 01:40:20', 'Accept', '', 'Entry'),
(135, '', 0, 'Indah Evita', 'Laki-laki', 'Nengken', 'N1', '', 1000, '2019-11-12 01:48:21', 'Accept', '', 'Entry'),
(139, '', 0, 'aurel', 'Perempuan', 'asda', 'N1', '', 5555, '2021-04-01 04:50:33', 'Accept', '', 'Entry'),
(144, '', 98909, 'kgkg', 'Laki-laki', 'fufy', 'N3', 'promosi', 6, '2021-04-03 16:25:45', 'Accept', '', 'Entry'),
(145, 'image_1617591540.png', 12345678, 'nilma', 'Perempuan', 'kominfo', 'N3', 'rapat', 3, '2021-04-05 04:58:29', 'Accept', '', 'Entry'),
(146, 'image_1617592821.png', 2222, 'aurel trilili', 'Perempuan', 'busan', 'N2', 'ngopskuy', 7, '2021-04-05 05:01:54', 'Accept', '', 'Entry'),
(147, 'image_1617608240.png', 4444, 'aaaa', 'Laki-laki', 'aaaa', 'N2', 'aaaa', 2, '2021-04-05 08:45:18', 'Accept', '', 'Entry'),
(148, 'image_1618451471.png', 1111, 'diana', 'Perempuan', 'malang', 'Lainnya', 'janji temu', 2, '2021-04-15 03:50:42', 'Accept', '', 'Entry'),
(149, 'image_1618473307.png', 333, 'aaaa', 'Laki-laki', 'aaaaa', 'N3', 'aaaa', 2, '2021-04-15 09:54:39', 'Finish', 'ok', 'Done'),
(150, 'image_1618817514.png', 333, 'aaa', 'Perempuan', 'aaa', 'N1', 'aaa', 2, '2021-04-19 09:28:33', 'Reject', '', 'Entry'),
(152, 'image_1619668332.png', 4444, 'tttt', 'Perempuan', 'rrrr', 'N1', 'aaa', 2, '2021-04-29 05:51:25', 'Reject', '', 'Entry'),
(153, 'image_1619668382.png', 4444, 'diana', 'Perempuan', 'sss', 'N1', 'promosi', 3, '2021-04-29 05:52:38', 'Accept', 'ok', 'Entry');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`users`);

--
-- Indexes for table `tb_tamu`
--
ALTER TABLE `tb_tamu`
  ADD PRIMARY KEY (`id_tamu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_tamu`
--
ALTER TABLE `tb_tamu`
  MODIFY `id_tamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
