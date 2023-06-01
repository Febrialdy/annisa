-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 01, 2023 at 11:24 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kp_otentikasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `otentikasi`
--

CREATE TABLE `otentikasi` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `mypath` varchar(255) DEFAULT NULL,
  `lastupdate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otentikasi`
--

INSERT INTO `otentikasi` (`id`, `fullname`, `mypath`, `lastupdate`) VALUES
(4, 'aditya', '../berkas/Ifa BAB 3 SKripsiiii.pdf', '01/06/23'),
(5, 'kjnjkh', '../berkas/Ifa BAB 3 SKripsiiii.pdf', '01/06/23');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `personid` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `tanggal_lahir` varchar(255) NOT NULL,
  `no_ktp` varchar(255) NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `no_taspen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`personid`, `fullname`, `alamat`, `city`, `tanggal_lahir`, `no_ktp`, `nohp`, `no_taspen`) VALUES
(3, 'aditya', 'JL. Gunung Sahari, Kemayoran', 'Jakarta', '11, Feb 1999', '1271061102990001', '0818110299', '11029921210311'),
(4, 'kjnjkh', 'jkhkjhjkh', 'Jakarta', '30, May 2023', '0980989089089089', '0818110299', '11029921210311');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `uid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`uid`, `name`, `username`, `password`) VALUES
(1, 'Admin', 'Admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `otentikasi`
--
ALTER TABLE `otentikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`personid`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `otentikasi`
--
ALTER TABLE `otentikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `personid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
