-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2020 at 07:06 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tcreative`
--
CREATE DATABASE IF NOT EXISTS `tcreative` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tcreative`;

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `kode_bahan` varchar(10) NOT NULL,
  `nama_bahan` varchar(10) NOT NULL,
  `harga_bahan` varchar(10) NOT NULL,
  `status_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`kode_bahan`, `nama_bahan`, `harga_bahan`, `status_delete`) VALUES
('BHN001', 'Bontax', '6000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `harga_barang` varchar(10) NOT NULL,
  `bahan_barang` varchar(10) NOT NULL,
  `laminasi_barang` varchar(20) NOT NULL,
  `ukuran_barang` varchar(10) NOT NULL,
  `gambar_barang` blob NOT NULL,
  `status_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `harga_barang`, `bahan_barang`, `laminasi_barang`, `ukuran_barang`, `gambar_barang`, `status_delete`) VALUES
('LN002', 'Label Nama', '30000', 'Bontax', 'Tanpa Laminasi', '1CM X 5CM', 0x4c6162656c4e616d612e6a7067, 0),
('SL001', 'Shipping Label', '80000', 'Bontax', 'Tanpa Laminasi', '1CM X 5CM', 0x5368697070696e674c6162656c322e6a7067, 0);

-- --------------------------------------------------------

--
-- Table structure for table `d_pesan`
--

CREATE TABLE `d_pesan` (
  `h_kode_pemesanan` varchar(10) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `kode_bahan` varchar(10) NOT NULL,
  `kode_laminasi` varchar(10) NOT NULL,
  `kode_ukuran` varchar(10) NOT NULL,
  `harga_barang` varchar(10) NOT NULL,
  `jumlah_barang` varchar(10) NOT NULL,
  `subtotal` varchar(10) NOT NULL,
  `status_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `d_pesan`
--

INSERT INTO `d_pesan` (`h_kode_pemesanan`, `kode_barang`, `kode_bahan`, `kode_laminasi`, `kode_ukuran`, `harga_barang`, `jumlah_barang`, `subtotal`, `status_delete`) VALUES
('ORD001', 'LN001', 'BHN001', 'LAM001', 'UKU001', '80000', '1', '80000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `galery`
--

CREATE TABLE `galery` (
  `kode_gambar` varchar(10) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `gambar` blob NOT NULL,
  `status_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galery`
--

INSERT INTO `galery` (`kode_gambar`, `kode_barang`, `gambar`, `status_delete`) VALUES
('GBR001', '', 0x5368697070696e674c6162656c322e6a7067, 0);

-- --------------------------------------------------------

--
-- Table structure for table `h_pesan`
--

CREATE TABLE `h_pesan` (
  `kode_pesanan` varchar(10) NOT NULL,
  `tanggal_pesanan` varchar(10) NOT NULL,
  `email_user` varchar(20) NOT NULL,
  `total` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `status_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `h_pesan`
--

INSERT INTO `h_pesan` (`kode_pesanan`, `tanggal_pesanan`, `email_user`, `total`, `status`, `status_delete`) VALUES
('ORD001', '2019-12-20', 'tamputhera@gmail.com', '80000', 'Proses', 0);

-- --------------------------------------------------------

--
-- Table structure for table `laminasi`
--

CREATE TABLE `laminasi` (
  `kode_laminasi` varchar(10) NOT NULL,
  `nama_laminasi` varchar(20) NOT NULL,
  `harga_laminasi` varchar(10) NOT NULL,
  `status_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laminasi`
--

INSERT INTO `laminasi` (`kode_laminasi`, `nama_laminasi`, `harga_laminasi`, `status_delete`) VALUES
('LAM001', 'Tanpa Laminasi', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ukuran`
--

CREATE TABLE `ukuran` (
  `kode_ukuran` varchar(10) NOT NULL,
  `ukuran` varchar(10) NOT NULL,
  `harga_ukuran` varchar(10) NOT NULL,
  `status_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ukuran`
--

INSERT INTO `ukuran` (`kode_ukuran`, `ukuran`, `harga_ukuran`, `status_delete`) VALUES
('UKU001', '1CM X 5CM', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nama_user` varchar(20) NOT NULL,
  `email_user` varchar(20) NOT NULL,
  `pass_user` varchar(10) NOT NULL,
  `alamat_user` varchar(50) NOT NULL,
  `telp_user` varchar(12) NOT NULL,
  `status_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nama_user`, `email_user`, `pass_user`, `alamat_user`, `telp_user`, `status_delete`) VALUES
('Tamara', 'tamputhera@gmail.com', '12345', 'Ngagel Madya VI No. 26-28', '0811523105', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`kode_bahan`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `d_pesan`
--
ALTER TABLE `d_pesan`
  ADD PRIMARY KEY (`h_kode_pemesanan`),
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `kode_bahan` (`kode_bahan`),
  ADD KEY `kode_laminasi` (`kode_laminasi`),
  ADD KEY `kode_ukuran` (`kode_ukuran`);

--
-- Indexes for table `galery`
--
ALTER TABLE `galery`
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `h_pesan`
--
ALTER TABLE `h_pesan`
  ADD PRIMARY KEY (`kode_pesanan`),
  ADD KEY `email_user` (`email_user`);

--
-- Indexes for table `laminasi`
--
ALTER TABLE `laminasi`
  ADD PRIMARY KEY (`kode_laminasi`);

--
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`kode_ukuran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
