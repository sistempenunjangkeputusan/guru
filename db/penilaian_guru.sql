-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2018 at 03:07 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penilaian_guru`
--
CREATE DATABASE IF NOT EXISTS `penilaian_guru` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `penilaian_guru`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nm_admin` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nm_admin`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nuptk` varchar(20) NOT NULL,
  `nm_guru` varchar(255) NOT NULL,
  `jenkel` varchar(8) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tmpt_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `pendidikan` varchar(4) NOT NULL,
  `no_telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nuptk`, `nm_guru`, `jenkel`, `alamat`, `tmpt_lahir`, `tgl_lahir`, `pendidikan`, `no_telp`) VALUES
('87823613153242523423', 'Anita Saragih', 'Wanita', 'Jakarta Selatan', 'Pematang Siantar', '1989-06-22', 'S1', '08881787'),
('97857565746575748686', 'Diky Putra', 'Pria', 'Jakarta', 'Tangerang', '1989-12-01', 'S1', '0896587856779'),
('97863926892538732859', 'Anjas', 'Pria', 'Jakarta', 'Jakarta', '1991-01-01', 'S1', '0878675646367');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kd_kriteria` varchar(20) NOT NULL,
  `nm_kriteria` varchar(255) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kd_kriteria`, `nm_kriteria`, `bobot`) VALUES
('KT-01', 'Pengajaran', 20);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `kd_nilai` int(11) NOT NULL,
  `nuptk` varchar(20) NOT NULL,
  `kd_kriteria` varchar(20) NOT NULL,
  `kd_subkriteria` varchar(20) NOT NULL,
  `nilai` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`kd_nilai`, `nuptk`, `kd_kriteria`, `kd_subkriteria`, `nilai`) VALUES
(3, '87823613153242523423', 'KT-01', 'subk-02', 5);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `kd_subkriteria` varchar(20) NOT NULL,
  `kd_kriteria` varchar(20) NOT NULL,
  `nm_subkriteria` varchar(255) NOT NULL,
  `rn_awal` int(11) NOT NULL,
  `rn_akhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`kd_subkriteria`, `kd_kriteria`, `nm_subkriteria`, `rn_awal`, `rn_akhir`) VALUES
('subk-01', 'KT-01', 'Baik', 1, 5),
('subk-02', 'KT-01', 'Ramah', 1, 6),
('subk-03', 'KT-01', 'Target', 1, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nuptk`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kd_kriteria`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`kd_nilai`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`kd_subkriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `kd_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
