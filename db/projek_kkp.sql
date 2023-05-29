-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 10:57 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek_kkp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `alamat`, `telepon`, `email`, `username`, `password`) VALUES
(1, 'admin', 'Jakarta', '0896111222333', 'admin@gmail.com', 'admin', '4297f44b13955235245b2497399d7a93'),
(31, 'Ariq Ali Saman', 'Tanah Abang, Jakarta Pusat, Indonesia', '081511119057', 'ali@gmail.com', 'arqsamn', 'fae0b27c451c728867a567e8c1bb4e53');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_spk`
--

CREATE TABLE `hasil_spk` (
  `id_spk` int(11) NOT NULL,
  `id_calon_kr` int(11) DEFAULT NULL,
  `hasil_spk` float(10,2) DEFAULT NULL,
  `minggu` varchar(2) NOT NULL,
  `bulan` varchar(2) NOT NULL,
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `hasil_spk`
--

INSERT INTO `hasil_spk` (`id_spk`, `id_calon_kr`, `hasil_spk`, `minggu`, `bulan`, `tahun`) VALUES
(45, 5, 98.00, '2', '11', '2019'),
(46, 6, 92.00, '2', '11', '2019'),
(47, 7, 89.00, '2', '11', '2019'),
(48, 8, 98.00, '2', '11', '2019'),
(49, 9, 100.00, '2', '11', '2019'),
(50, 5, 98.00, '3', '04', '2023'),
(51, 6, 92.00, '3', '04', '2023'),
(52, 7, 89.00, '3', '04', '2023'),
(53, 8, 98.00, '3', '04', '2023'),
(54, 9, 100.00, '3', '04', '2023'),
(55, 5, 98.00, '4', '04', '2023'),
(56, 6, 89.00, '4', '04', '2023'),
(57, 7, 84.00, '4', '04', '2023'),
(58, 8, 93.00, '4', '04', '2023'),
(59, 9, 95.00, '4', '04', '2023'),
(60, 6, 85.00, '5', '04', '2023'),
(61, 7, 80.00, '5', '04', '2023'),
(62, 8, 89.00, '5', '04', '2023'),
(63, 9, 91.00, '5', '04', '2023'),
(64, 11, 89.00, '5', '04', '2023'),
(65, 14, 84.50, '5', '04', '2023'),
(66, 14, 0.00, '1', '05', '2023');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_tpa`
--

CREATE TABLE `hasil_tpa` (
  `id_test` int(11) NOT NULL,
  `id_calon_kr` int(11) DEFAULT NULL,
  `Absensi` int(11) DEFAULT NULL,
  `Kerjasama` int(11) DEFAULT NULL,
  `Kerapihan` int(11) DEFAULT NULL,
  `Keaktifan` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `hasil_tpa`
--

INSERT INTO `hasil_tpa` (`id_test`, `id_calon_kr`, `Absensi`, `Kerjasama`, `Kerapihan`, `Keaktifan`) VALUES
(55, 5, 11, NULL, NULL, NULL),
(56, 6, 14, NULL, NULL, NULL),
(57, 7, 11, NULL, NULL, NULL),
(58, 8, 11, NULL, NULL, NULL),
(59, 9, 14, NULL, NULL, NULL),
(62, 14, 13, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_calon_kr` int(11) NOT NULL,
  `NIK` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `ttl` date NOT NULL,
  `TempatLahir` varchar(200) NOT NULL,
  `PendidikanTerakhir` varchar(100) NOT NULL,
  `Jabatan` varchar(100) NOT NULL,
  `TglBergabung` date NOT NULL,
  `skill` varchar(200) DEFAULT NULL,
  `pengalaman` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_calon_kr`, `NIK`, `nama`, `jeniskelamin`, `alamat`, `telepon`, `foto`, `ttl`, `TempatLahir`, `PendidikanTerakhir`, `Jabatan`, `TglBergabung`, `skill`, `pengalaman`) VALUES
(14, '9875926348694359', 'Ariq Ali Saman', 'Pria', 'Serpong, Tangerang Selatan', '081511119057', '', '2002-10-18', 'Jakarta', 'S1', 'Front End', '2022-09-07', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kriteria` varchar(32) DEFAULT NULL,
  `bobot` float(5,2) DEFAULT NULL,
  `type` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kriteria`, `bobot`, `type`) VALUES
(13, 'Absensi', 15.00, 'Cost'),
(41, 'Kerjasama', 40.00, 'Cost'),
(42, 'Kerapihan', 20.00, 'Cost'),
(43, 'Keaktifan', 25.00, 'Cost');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `subkriteria` varchar(255) NOT NULL,
  `nilai` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_subkriteria`, `id_kriteria`, `subkriteria`, `nilai`) VALUES
(11, 13, 'terlambat 0 kali', 10.00),
(12, 13, 'terlambat 1 kali', 9.00),
(13, 13, 'terlambat 2 kali', 8.00),
(14, 13, 'terlambat 3 kali', 7.00),
(15, 13, 'terlambat 4 kali', 6.00),
(16, 13, 'terlambat 5 kali', 5.00),
(17, 13, 'terlambat 6 kali', 4.00),
(18, 13, 'terlambat 7 kali', 3.00),
(19, 13, 'terlambat 8 kali', 2.00),
(20, 13, 'terlambat 9 kali', 1.00),
(21, 13, 'terlambat >10 kali', 0.00),
(22, 14, 'Baik Sekali', 5.00),
(23, 14, 'baik', 4.00),
(24, 14, 'cukup', 3.00),
(25, 14, 'kurang', 2.00),
(26, 14, 'kurang sekali', 1.00),
(27, 15, 'Baik Sekali', 5.00),
(28, 15, 'baik', 4.00),
(29, 15, 'cukup', 3.00),
(30, 15, 'kurang', 2.00),
(31, 15, 'kurang sekali', 1.00),
(32, 16, 'Baik Sekali', 5.00),
(33, 16, 'baik', 4.00),
(34, 16, 'cukup', 3.00),
(35, 16, 'kurang', 2.00),
(36, 16, 'kurang sekali', 1.00),
(37, 28, 'Baik Sekali', 5.00),
(38, 28, 'baik', 4.00),
(39, 28, 'cukup', 3.00),
(40, 28, 'kurang', 2.00),
(41, 28, 'kurang sekali', 1.00),
(42, 29, 'Baik Sekali', 5.00),
(43, 29, 'baik', 4.00),
(44, 29, 'cukup', 3.00),
(45, 29, 'kurang', 2.00),
(46, 29, 'kurang sekali', 1.00),
(47, 30, 'Baik Sekali', 5.00),
(48, 30, 'baik', 4.00),
(49, 30, 'cukup', 3.00),
(50, 30, 'kurang', 2.00),
(51, 30, 'kurang sekali', 1.00),
(52, 31, 'Baik Sekali', 5.00),
(53, 31, 'baik', 4.00),
(54, 31, 'cukup', 3.00),
(55, 31, 'kurang', 2.00),
(56, 31, 'kurang sekali', 1.00),
(57, 32, 'Baik Sekali', 5.00),
(58, 32, 'baik', 4.00),
(59, 32, 'cukup', 3.00),
(60, 32, 'kurang', 2.00),
(61, 32, 'kurang sekali', 1.00),
(66, 39, 'Baik Sekali', 5.00),
(67, 39, 'Baik', 4.00),
(68, 39, 'Cukup', 3.00),
(69, 39, 'Kurang', 2.00),
(70, 39, 'Kurang Sekali', 1.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_spk`
--
ALTER TABLE `hasil_spk`
  ADD PRIMARY KEY (`id_spk`),
  ADD KEY `id_calon_kr` (`id_calon_kr`);

--
-- Indexes for table `hasil_tpa`
--
ALTER TABLE `hasil_tpa`
  ADD PRIMARY KEY (`id_test`),
  ADD KEY `id_calon_kr` (`id_calon_kr`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_calon_kr`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_subkriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `hasil_spk`
--
ALTER TABLE `hasil_spk`
  MODIFY `id_spk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `hasil_tpa`
--
ALTER TABLE `hasil_tpa`
  MODIFY `id_test` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_calon_kr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
