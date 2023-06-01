-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 02, 2023 at 06:44 AM
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
-- Database: `SMA_grandsehat`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `idbarang` int(11) NOT NULL,
  `harga_pokok` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `kode_barang` char(50) NOT NULL,
  `nama_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idbarang`, `harga_pokok`, `harga_jual`, `kode_barang`, `nama_barang`) VALUES
(1, 250000, 300000, 'AB-0001', 'Autolite APP104 double platinum'),
(2, 100000, 135000, 'AB-0002', 'Total Quartz 9000 5W30'),
(3, 337000, 472000, 'AB-0003', 'Castrol Magnatec'),
(4, 425000, 485000, 'AB-0004', 'Ban Achilles'),
(5, 516000, 649000, 'AB-0005', 'Ban Bridgestone');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `idlaporan` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `stok_awal` int(11) NOT NULL,
  `stok_masuk` int(11) NOT NULL,
  `stok_keluar` int(11) NOT NULL,
  `stok_akhir` int(11) NOT NULL,
  `bulan` char(50) DEFAULT NULL,
  `tahun` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`idlaporan`, `idbarang`, `stok_awal`, `stok_masuk`, `stok_keluar`, `stok_akhir`, `bulan`, `tahun`) VALUES
(5, 1, 55, 45, 35, 65, 'January', '2020'),
(6, 1, 65, 0, 55, 10, 'February', '2020'),
(7, 1, 10, 20, 10, 20, 'March', '2020'),
(8, 1, 20, 5, 20, 5, 'April', '2020'),
(9, 1, 5, 35, 27, 13, 'May', '2020'),
(10, 1, 13, 24, 29, 8, 'June', '2020'),
(11, 1, 8, 37, 23, 22, 'July', '2020'),
(12, 1, 22, 13, 21, 14, 'August', '2020'),
(13, 1, 14, 19, 20, 13, 'September', '2020'),
(14, 1, 13, 41, 39, 15, 'October', '2020'),
(15, 1, 15, 17, 22, 10, 'November', '2020'),
(16, 1, 10, 27, 20, 17, 'December', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `productYear` char(4) NOT NULL,
  `productMonth` char(20) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`id`, `name`, `merk`, `productYear`, `productMonth`, `price`) VALUES
(1, 'Busi', 'Autolite APP104 double platinum', '2018', 'March', '50000');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `uid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`uid`, `username`, `password`, `name`, `level`) VALUES
(1, 'admin', 'admin', 'Heru', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`idlaporan`),
  ADD KEY `fk_id_barang` (`idbarang`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `idlaporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `fk_id_barang` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
