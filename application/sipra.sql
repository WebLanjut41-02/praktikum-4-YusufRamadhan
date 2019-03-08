-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2019 at 05:08 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipra`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_id`, `username`, `password`, `nama`, `email`) VALUES
(123, 'MYR', 'myr123', 'Muhamad Yusuf Ramadhan', 'eternal199812@gmail.com'),
(234, 'EGN', 'egn234', 'Egan Kusmaya Putra', 'egn234@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `asprak`
--

CREATE TABLE `asprak` (
  `NIM` bigint(10) NOT NULL,
  `Nama` varchar(40) DEFAULT NULL,
  `Prodi` varchar(30) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Username_asprak` varchar(20) DEFAULT NULL,
  `Password_asprak` varchar(20) DEFAULT NULL,
  `Koor_NIM` bigint(10) DEFAULT NULL,
  `Admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `KD_dosen` varchar(3) NOT NULL,
  `NIP` bigint(20) DEFAULT NULL,
  `Nama_dosen` varchar(40) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Koor_Dosen` varchar(3) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `Admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `KD_matkul` varchar(8) NOT NULL,
  `Nama_matkul` varchar(50) DEFAULT NULL,
  `SKS` int(11) DEFAULT NULL,
  `Admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`KD_matkul`, `Nama_matkul`, `SKS`, `Admin_id`) VALUES
('DMA124', 'Algoritma Pemrograman', 4, 123),
('DMCH123', 'Pemrograman Basis Data', 3, 123);

-- --------------------------------------------------------

--
-- Table structure for table `mk_asprak`
--

CREATE TABLE `mk_asprak` (
  `KD_matkul` varchar(8) DEFAULT NULL,
  `NIM` bigint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mk_dosen`
--

CREATE TABLE `mk_dosen` (
  `KD_matkul` varchar(8) DEFAULT NULL,
  `KD_dosen` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_id`);

--
-- Indexes for table `asprak`
--
ALTER TABLE `asprak`
  ADD PRIMARY KEY (`NIM`),
  ADD KEY `Admin_id` (`Admin_id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`KD_dosen`),
  ADD KEY `Admin_id` (`Admin_id`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`KD_matkul`),
  ADD KEY `Admin_id` (`Admin_id`);

--
-- Indexes for table `mk_asprak`
--
ALTER TABLE `mk_asprak`
  ADD KEY `KD_matkul` (`KD_matkul`),
  ADD KEY `NIM` (`NIM`);

--
-- Indexes for table `mk_dosen`
--
ALTER TABLE `mk_dosen`
  ADD KEY `KD_matkul` (`KD_matkul`),
  ADD KEY `KD_dosen` (`KD_dosen`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asprak`
--
ALTER TABLE `asprak`
  ADD CONSTRAINT `asprak_ibfk_1` FOREIGN KEY (`Admin_id`) REFERENCES `admin` (`Admin_id`);

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`Admin_id`) REFERENCES `admin` (`Admin_id`);

--
-- Constraints for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD CONSTRAINT `mata_kuliah_ibfk_1` FOREIGN KEY (`Admin_id`) REFERENCES `admin` (`Admin_id`);

--
-- Constraints for table `mk_asprak`
--
ALTER TABLE `mk_asprak`
  ADD CONSTRAINT `mk_asprak_ibfk_1` FOREIGN KEY (`KD_matkul`) REFERENCES `mata_kuliah` (`KD_matkul`),
  ADD CONSTRAINT `mk_asprak_ibfk_2` FOREIGN KEY (`NIM`) REFERENCES `asprak` (`NIM`);

--
-- Constraints for table `mk_dosen`
--
ALTER TABLE `mk_dosen`
  ADD CONSTRAINT `mk_dosen_ibfk_1` FOREIGN KEY (`KD_matkul`) REFERENCES `mata_kuliah` (`KD_matkul`),
  ADD CONSTRAINT `mk_dosen_ibfk_2` FOREIGN KEY (`KD_dosen`) REFERENCES `dosen` (`KD_dosen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
