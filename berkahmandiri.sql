-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 10, 2020 at 01:10 AM
-- Server version: 5.7.30
-- PHP Version: 5.6.40-29+ubuntu20.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berkahmandiri`
--

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `id_konsumen` int(4) NOT NULL,
  `nama_konsumen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`id_konsumen`, `nama_konsumen`) VALUES
(1, 'Ujang');

-- --------------------------------------------------------

--
-- Table structure for table `mekanik`
--

CREATE TABLE `mekanik` (
  `id_mekanik` int(5) UNSIGNED NOT NULL,
  `nama_mekanik` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mekanik`
--

INSERT INTO `mekanik` (`id_mekanik`, `nama_mekanik`) VALUES
(1, 'Triwahyudi '),
(2, 'Emon semprani'),
(3, 'Ujang Bolon'),
(4, 'Suryanto');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(5) NOT NULL,
  `id_mekanik` int(5) DEFAULT NULL,
  `id_sparepart` int(5) DEFAULT NULL,
  `qty` int(5) DEFAULT NULL,
  `harga_jasa` varchar(10) DEFAULT NULL,
  `tgl_beli` date DEFAULT NULL,
  `nama_pelanggan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_mekanik`, `id_sparepart`, `qty`, `harga_jasa`, `tgl_beli`, `nama_pelanggan`) VALUES
(8, 1, 1, 1, '30000', '2016-08-26', ''),
(9, 1, 14, 1, '20000', '2016-08-26', ''),
(10, 2, 18, 1, '7000', '2016-08-26', ''),
(11, 2, 19, 1, '70000', '2016-08-26', ''),
(13, 3, 27, 1, '5000', '2016-08-26', ''),
(14, 2, 3, 1, '7000', '2016-08-26', ''),
(15, 2, 10, 1, '35000', '2016-08-26', ''),
(25, 3, 2, 1, '3500', '2016-08-26', ''),
(26, 2, 1, 1, '35000', '2016-08-26', ''),
(27, 1, 1, 1, '35000', '2016-08-26', ''),
(28, 3, 6, 1, '35000', '2016-08-26', ''),
(29, 2, 8, 2, '5000', '2016-08-26', ''),
(30, 3, 18, 2, '10000', '2016-08-26', ''),
(31, 4, 11, 1, '35000', '2016-08-26', ''),
(32, 4, 7, 2, '10000', '2016-08-27', ''),
(33, 1, 1, 1, '30000', '2016-08-26', ''),
(34, 1, 4, 2, '900000', '2020-11-10', ''),
(35, 1, 4, 2, '91731290', '2020-11-10', ''),
(36, 1, 4, 2, '80000', '2020-11-10', 'pandu');

--
-- Triggers `pembelian`
--
DELIMITER $$
CREATE TRIGGER `jual` AFTER INSERT ON `pembelian` FOR EACH ROW BEGIN
UPDATE sparepart SET stock=stock-NEW.qty
WHERE id_sparepart=NEW.id_sparepart;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(5) NOT NULL,
  `nama_pengguna` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`) VALUES
(1, 'Rendy Permana ', 'kasir', 'c7911af3adbd12a035b289556d96470a'),
(2, 'Mulyadi P Tamsir', 'kasir2', '8c86013d8ba23d9b5ade4d6463f81c45');

-- --------------------------------------------------------

--
-- Table structure for table `sparepart`
--

CREATE TABLE `sparepart` (
  `id_sparepart` int(5) NOT NULL,
  `sparepart` varchar(50) DEFAULT NULL,
  `stock` varchar(5) DEFAULT NULL,
  `harga` varchar(10) DEFAULT NULL,
  `kode` varchar(100) NOT NULL,
  `merk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sparepart`
--

INSERT INTO `sparepart` (`id_sparepart`, `sparepart`, `stock`, `harga`, `kode`, `merk`) VALUES
(1, 'Filter Udara', '-1', '32000', '', ''),
(2, 'Kampas Rem Depan', '0', '37000', '', ''),
(3, 'Kampas Rem Belakang', '0', '26000', '', ''),
(4, 'Rantai', '6', '65000', '', ''),
(5, 'Gir Depan', '0', '35000', '', ''),
(6, 'Gir belakang', '0', '63000', '', ''),
(7, 'Bohlam Depan', '21', '25000', '', ''),
(8, 'Bohlam Belakang', '18', '7500', '', ''),
(9, 'Kabel Gas', '20', '20000', '', ''),
(10, 'Kampas Kopling', '5', '148000', '', ''),
(11, 'Piston', '2', '38000', '', ''),
(12, 'Ring Piston', '5', '60000', '', ''),
(13, 'V-belt', '4', '43000', '', ''),
(14, 'CDI', '5', '340000', '', ''),
(15, 'Relay Starter', '6', '40000', '', ''),
(16, 'Sokbreker Belakang', '6', '180000', '', ''),
(17, 'Kem', '5', '115000', '', ''),
(18, 'Oli Yamalube', '3', '35000', '', ''),
(19, 'Oli Top One', '5', '40000', '', ''),
(20, 'Oli Castroll', '5', '65000', '', ''),
(21, 'Oli Mesran', '5', '35000', '', ''),
(27, 'Spion', '6', '25000', '', ''),
(28, 'coba', 'coba', 'coba', 'coba', 'coba'),
(29, 'merk', '10', '50000', 'merk', 'merk'),
(30, '01', '01', '01', '01', '01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id_konsumen`);

--
-- Indexes for table `mekanik`
--
ALTER TABLE `mekanik`
  ADD PRIMARY KEY (`id_mekanik`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `sparepart`
--
ALTER TABLE `sparepart`
  ADD PRIMARY KEY (`id_sparepart`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id_konsumen` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mekanik`
--
ALTER TABLE `mekanik`
  MODIFY `id_mekanik` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sparepart`
--
ALTER TABLE `sparepart`
  MODIFY `id_sparepart` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
