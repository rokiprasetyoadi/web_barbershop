-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2019 at 07:56 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sevenhead`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblbarang`
--

CREATE TABLE `tblbarang` (
  `kodebarang` char(4) NOT NULL,
  `namabarang` varchar(100) DEFAULT NULL,
  `kodejenis` char(4) DEFAULT NULL,
  `harganet` double DEFAULT NULL,
  `hargajual` double DEFAULT NULL,
  `stok` smallint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblbrgmasuk`
--

CREATE TABLE `tblbrgmasuk` (
  `nonota` char(10) NOT NULL,
  `tglmasuk` varchar(30) DEFAULT NULL,
  `iddistributor` char(6) DEFAULT NULL,
  `idpetugas` char(6) DEFAULT NULL,
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbldetailbrgmasuk`
--

CREATE TABLE `tbldetailbrgmasuk` (
  `nonota` char(10) NOT NULL,
  `kodebarang` char(4) NOT NULL,
  `jumlah` smallint(4) DEFAULT NULL,
  `subtotal` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbldetailpenjualan`
--

CREATE TABLE `tbldetailpenjualan` (
  `nofaktur` char(10) NOT NULL,
  `kodebarang` char(4) NOT NULL,
  `jumlah` smallint(4) DEFAULT NULL,
  `subtotal` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbldistributor`
--

CREATE TABLE `tbldistributor` (
  `iddistributor` char(6) NOT NULL,
  `namadistributor` varchar(80) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kotasal` varchar(80) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `telpon` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbljenis`
--

CREATE TABLE `tbljenis` (
  `kodejenis` char(4) NOT NULL,
  `jenis` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblpenjualan`
--

CREATE TABLE `tblpenjualan` (
  `nofaktur` char(10) NOT NULL,
  `tglpenjualan` varchar(30) DEFAULT NULL,
  `idpetugas` char(6) DEFAULT NULL,
  `bayar` double DEFAULT NULL,
  `sisa` double DEFAULT NULL,
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblpetugas`
--

CREATE TABLE `tblpetugas` (
  `idpetugas` char(6) NOT NULL,
  `namapetugas` varchar(80) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `telpon` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblbarang`
--
ALTER TABLE `tblbarang`
  ADD PRIMARY KEY (`kodebarang`);

--
-- Indexes for table `tblbrgmasuk`
--
ALTER TABLE `tblbrgmasuk`
  ADD PRIMARY KEY (`nonota`);

--
-- Indexes for table `tbldistributor`
--
ALTER TABLE `tbldistributor`
  ADD PRIMARY KEY (`iddistributor`);

--
-- Indexes for table `tbljenis`
--
ALTER TABLE `tbljenis`
  ADD PRIMARY KEY (`kodejenis`);

--
-- Indexes for table `tblpenjualan`
--
ALTER TABLE `tblpenjualan`
  ADD PRIMARY KEY (`nofaktur`);

--
-- Indexes for table `tblpetugas`
--
ALTER TABLE `tblpetugas`
  ADD PRIMARY KEY (`idpetugas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
