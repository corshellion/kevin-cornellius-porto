-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jun 2020 pada 12.03
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

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
-- Struktur dari tabel `bahan`
--

CREATE TABLE `bahan` (
  `kode_bahan` varchar(6) NOT NULL,
  `nama_bahan` varchar(20) NOT NULL,
  `status_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahan`
--

INSERT INTO `bahan` (`kode_bahan`, `nama_bahan`, `status_delete`) VALUES
('BHN001', 'Bontac', 0),
('BHN002', 'Vynil', 0),
('BHN003', 'Transparent', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `gambar_barang` varchar(100) NOT NULL,
  `gambar_barang2` varchar(100) NOT NULL,
  `gambar_barang3` varchar(100) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `status_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `gambar_barang`, `gambar_barang2`, `gambar_barang3`, `deskripsi`, `status_delete`) VALUES
('NL001', 'Name Label', 'LabelNama.jpg', 'LabelNama2.jpg', 'LabelNama3.jpg', 'Label/Stiker yang berisi nama dan kontak untuk menandai barang-barang kepemilikan kita agar tidak tertukar dengan orang lain.', 0),
('PS001', 'Product Sticker', 'ProductSticker.jpg', 'ProductSticker2.jpg', 'ProductSticker3.jpg', 'Stiker ini berguna untuk online shop atau pebisnis yang ingin terdapat logo usaha customer pada produk yang ingin dijual.', 0),
('RS001', 'Round Sticker', 'RoundSticker.jpg', 'RoundSticker2.jpg', 'RoundSticker3.jpg', 'Stiker ini bisa digunakan untuk apa saja, termasuk menandai barang pribadi atau produk yang ingin dijual. Yang spesial dari stiker ini adalah bentuknya yang bundar.', 0),
('SL001', 'Shipping Label', 'ShippingLabel.jpg', 'ShippingLabel2.jpg', 'ShippingLabel3.jpg', 'Label/Stiker yang digunakan untuk mengirim barang. Stiker bisa untuk menulis alamat tujuan barang yang ingin dikirim. Stiker ini sangat berguna untuk online shop yang ingin mengirimkan barang ke customernya.', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `d_pesan`
--

CREATE TABLE `d_pesan` (
  `kode` int(10) NOT NULL,
  `kode_pesanan` varchar(10) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `kode_bahan` varchar(10) NOT NULL,
  `kode_laminasi` varchar(10) NOT NULL,
  `kode_ukuran` varchar(10) NOT NULL,
  `jumlah_barang` varchar(10) NOT NULL,
  `harga_barang` varchar(10) NOT NULL COMMENT 'Berasal dari tabel pricelist, field harga',
  `subtotal` varchar(10) NOT NULL,
  `kode_gambar` varchar(10) NOT NULL,
  `warna_pilih` int(15) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `posisi_gambar` varchar(10) NOT NULL DEFAULT 'kiri',
  `font_pilih` varchar(50) NOT NULL,
  `desain_custom` blob NOT NULL,
  `text_line1` varchar(50) NOT NULL,
  `text_line2` text DEFAULT NULL,
  `status_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `d_pesan`
--

INSERT INTO `d_pesan` (`kode`, `kode_pesanan`, `kode_barang`, `kode_bahan`, `kode_laminasi`, `kode_ukuran`, `jumlah_barang`, `harga_barang`, `subtotal`, `kode_gambar`, `warna_pilih`, `gambar`, `posisi_gambar`, `font_pilih`, `desain_custom`, `text_line1`, `text_line2`, `status_delete`) VALUES
(56, 'TH003', 'NL001', 'BHN001', 'LAM002', 'UKU001', '10', '3500', '3500', '', 0, 'LabelNama.jpg', 'left', '', '', '-', '-', 0),
(57, 'TH002', 'NL001', 'BHN001', 'LAM002', 'UKU001', '10', '3500', '3500', '', 0, 'LabelNama.jpg', 'left', '', '', '-', '-', 0),
(58, 'TH003', 'PS001', '', 'LAM002', 'UKU012', '25', '47500', '47500', '', 0, 'banner_3.png', 'Left', '', '', 'kevin', 'cornellius', 0),
(59, 'TH003', 'PS001', '', 'LAM002', 'UKU012', '25', '47500', '47500', '', 0, 'banner_3.png', 'Left', '', '', 'kevin', 'cornellius', 0),
(60, 'TH003', 'PS001', '', 'LAM002', 'UKU012', '50', '85000', '85000', '', 0, 'banner_3.png', 'Left', '', '', 'kevin', 'cornellius', 0),
(61, '0001', 'PS001', '', 'LAM002', 'UKU011', '50', '65000', '65000', '', 0, 'banner_3.png', 'Right', '', '', 'kevin', 'cornellius', 0),
(62, 'TH2ze2o001', 'NL001', 'BHN001', 'LAM002', 'UKU001', '10', '3500', '3500', '', 0, 'LabelNama.jpg', 'left', '', '', '-', '-', 0),
(64, 'MAwcs1n001', 'NL001', 'BHN001', 'LAM002', 'UKU001', '10', '3500', '3500', '', 0, 'LabelNama.jpg', 'left', '', '', '-', '-', 0),
(65, 'THhgxeh001', 'NL001', 'BHN001', 'LAM002', 'UKU001', '10', '3500', '3500', '', 0, 'LabelNama.jpg', 'left', '', '', '-', '-', 0),
(66, 'THhvqq2001', 'NL001', 'BHN001', 'LAM002', 'UKU001', '10', '3500', '3500', '', 0, 'LabelNama.jpg', 'left', '', '', '-', '-', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `h_pesan`
--

CREATE TABLE `h_pesan` (
  `kode_pesanan` varchar(10) NOT NULL,
  `tanggal_pesanan` varchar(10) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `total` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `status_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `h_pesan`
--

INSERT INTO `h_pesan` (`kode_pesanan`, `tanggal_pesanan`, `email_user`, `total`, `status`, `status_delete`) VALUES
('THhvqq2001', '23/04/2020', 'thecornells21@gmail.com', '3500', 'Payment Received', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laminasi`
--

CREATE TABLE `laminasi` (
  `kode_laminasi` varchar(6) NOT NULL,
  `nama_laminasi` varchar(20) NOT NULL,
  `status_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laminasi`
--

INSERT INTO `laminasi` (`kode_laminasi`, `nama_laminasi`, `status_delete`) VALUES
('LAM001', 'None', 0),
('LAM002', 'Glossy', 0),
('LAM003', 'Doff', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pricelist`
--

CREATE TABLE `pricelist` (
  `kode_pricelist` int(11) NOT NULL,
  `kode_barang` varchar(6) NOT NULL,
  `kode_laminasi` varchar(6) NOT NULL,
  `kode_ukuran` varchar(6) NOT NULL,
  `qty` int(2) NOT NULL,
  `harga` int(11) NOT NULL,
  `status_delete` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pricelist`
--

INSERT INTO `pricelist` (`kode_pricelist`, `kode_barang`, `kode_laminasi`, `kode_ukuran`, `qty`, `harga`, `status_delete`) VALUES
(1, 'NL001', 'LAM001', 'UKU001', 10, 3000, 0),
(2, 'NL001', 'LAM001', 'UKU001', 25, 7000, 0),
(3, 'NL001', 'LAM001', 'UKU001', 50, 12500, 0),
(4, 'NL001', 'LAM001', 'UKU001', 100, 20000, 0),
(5, 'NL001', 'LAM001', 'UKU002', 10, 3500, 0),
(6, 'NL001', 'LAM001', 'UKU002', 25, 8250, 0),
(7, 'NL001', 'LAM001', 'UKU002', 50, 15000, 0),
(8, 'NL001', 'LAM001', 'UKU002', 100, 25000, 0),
(9, 'NL001', 'LAM001', 'UKU003', 10, 3000, 0),
(10, 'NL001', 'LAM001', 'UKU003', 25, 7000, 0),
(11, 'NL001', 'LAM001', 'UKU003', 50, 12500, 0),
(12, 'NL001', 'LAM001', 'UKU003', 100, 20000, 0),
(13, 'NL001', 'LAM001', 'UKU004', 10, 3500, 0),
(14, 'NL001', 'LAM001', 'UKU004', 25, 8250, 0),
(15, 'NL001', 'LAM001', 'UKU004', 50, 15000, 0),
(16, 'NL001', 'LAM001', 'UKU004', 100, 25000, 0),
(17, 'NL001', 'LAM002', 'UKU001', 10, 3500, 0),
(18, 'NL001', 'LAM002', 'UKU001', 25, 8250, 0),
(19, 'NL001', 'LAM002', 'UKU001', 50, 15000, 0),
(20, 'NL001', 'LAM002', 'UKU001', 100, 25000, 0),
(21, 'NL001', 'LAM002', 'UKU002', 10, 4000, 0),
(22, 'NL001', 'LAM002', 'UKU002', 25, 9500, 0),
(23, 'NL001', 'LAM002', 'UKU002', 50, 17500, 0),
(24, 'NL001', 'LAM002', 'UKU002', 100, 30000, 0),
(25, 'NL001', 'LAM002', 'UKU003', 10, 3500, 0),
(26, 'NL001', 'LAM002', 'UKU003', 25, 8250, 0),
(27, 'NL001', 'LAM002', 'UKU003', 50, 15000, 0),
(28, 'NL001', 'LAM002', 'UKU003', 100, 25000, 0),
(29, 'NL001', 'LAM002', 'UKU004', 10, 4000, 0),
(30, 'NL001', 'LAM002', 'UKU004', 25, 9500, 0),
(31, 'NL001', 'LAM002', 'UKU004', 50, 17500, 0),
(32, 'NL001', 'LAM002', 'UKU004', 100, 30000, 0),
(33, 'NL001', 'LAM003', 'UKU001', 10, 3500, 0),
(34, 'NL001', 'LAM003', 'UKU001', 25, 8250, 0),
(35, 'NL001', 'LAM003', 'UKU001', 50, 15000, 0),
(36, 'NL001', 'LAM003', 'UKU001', 100, 25000, 0),
(37, 'NL001', 'LAM003', 'UKU002', 10, 4000, 0),
(38, 'NL001', 'LAM003', 'UKU002', 25, 9500, 0),
(39, 'NL001', 'LAM003', 'UKU002', 50, 17500, 0),
(40, 'NL001', 'LAM003', 'UKU002', 100, 30000, 0),
(41, 'NL001', 'LAM003', 'UKU003', 10, 3500, 0),
(42, 'NL001', 'LAM003', 'UKU003', 25, 8250, 0),
(43, 'NL001', 'LAM003', 'UKU003', 50, 15000, 0),
(44, 'NL001', 'LAM003', 'UKU003', 100, 25000, 0),
(45, 'NL001', 'LAM003', 'UKU004', 10, 4000, 0),
(46, 'NL001', 'LAM003', 'UKU004', 25, 9500, 0),
(47, 'NL001', 'LAM003', 'UKU004', 50, 17500, 0),
(48, 'NL001', 'LAM003', 'UKU004', 100, 30000, 0),
(49, 'PS001', 'LAM001', 'UKU011', 10, 15000, 0),
(50, 'PS001', 'LAM001', 'UKU011', 25, 32500, 0),
(51, 'PS001', 'LAM001', 'UKU011', 50, 55000, 0),
(52, 'PS001', 'LAM001', 'UKU011', 100, 80000, 0),
(53, 'PS001', 'LAM001', 'UKU012', 10, 18000, 0),
(54, 'PS001', 'LAM001', 'UKU012', 25, 42500, 0),
(55, 'PS001', 'LAM001', 'UKU012', 50, 75000, 0),
(56, 'PS001', 'LAM001', 'UKU012', 100, 120000, 0),
(57, 'PS001', 'LAM001', 'UKU013', 10, 20000, 0),
(58, 'PS001', 'LAM001', 'UKU013', 25, 45000, 0),
(59, 'PS001', 'LAM001', 'UKU013', 50, 75000, 0),
(60, 'PS001', 'LAM001', 'UKU013', 100, 130000, 0),
(61, 'PS001', 'LAM002', 'UKU011', 10, 17000, 0),
(62, 'PS001', 'LAM002', 'UKU011', 25, 37500, 0),
(63, 'PS001', 'LAM002', 'UKU011', 50, 65000, 0),
(64, 'PS001', 'LAM002', 'UKU011', 100, 100000, 0),
(65, 'PS001', 'LAM002', 'UKU012', 10, 20000, 0),
(66, 'PS001', 'LAM002', 'UKU012', 25, 47500, 0),
(67, 'PS001', 'LAM002', 'UKU012', 50, 85000, 0),
(68, 'PS001', 'LAM002', 'UKU012', 100, 140000, 0),
(69, 'PS001', 'LAM002', 'UKU013', 10, 22000, 0),
(70, 'PS001', 'LAM002', 'UKU013', 25, 50000, 0),
(71, 'PS001', 'LAM002', 'UKU013', 50, 85000, 0),
(72, 'PS001', 'LAM002', 'UKU013', 100, 150000, 0),
(73, 'PS001', 'LAM003', 'UKU011', 10, 17000, 0),
(74, 'PS001', 'LAM003', 'UKU011', 25, 37500, 0),
(75, 'PS001', 'LAM003', 'UKU011', 50, 65000, 0),
(76, 'PS001', 'LAM003', 'UKU011', 100, 100000, 0),
(77, 'PS001', 'LAM003', 'UKU012', 10, 20000, 0),
(78, 'PS001', 'LAM003', 'UKU012', 25, 47500, 0),
(79, 'PS001', 'LAM003', 'UKU012', 50, 85000, 0),
(80, 'PS001', 'LAM003', 'UKU012', 100, 140000, 0),
(81, 'PS001', 'LAM003', 'UKU013', 10, 22000, 0),
(82, 'PS001', 'LAM003', 'UKU013', 25, 50000, 0),
(83, 'PS001', 'LAM003', 'UKU013', 50, 85000, 0),
(84, 'PS001', 'LAM003', 'UKU013', 100, 150000, 0),
(85, 'RS001', 'LAM001', 'UKU005', 10, 5000, 0),
(86, 'RS001', 'LAM001', 'UKU005', 25, 11500, 0),
(87, 'RS001', 'LAM001', 'UKU005', 50, 20000, 0),
(88, 'RS001', 'LAM001', 'UKU005', 100, 35000, 0),
(89, 'RS001', 'LAM001', 'UKU006', 10, 5500, 0),
(90, 'RS001', 'LAM001', 'UKU006', 25, 12750, 0),
(91, 'RS001', 'LAM001', 'UKU006', 50, 22500, 0),
(92, 'RS001', 'LAM001', 'UKU006', 100, 40000, 0),
(93, 'RS001', 'LAM001', 'UKU007', 10, 5500, 0),
(94, 'RS001', 'LAM001', 'UKU007', 25, 12750, 0),
(95, 'RS001', 'LAM001', 'UKU007', 50, 22500, 0),
(96, 'RS001', 'LAM001', 'UKU007', 100, 40000, 0),
(97, 'RS001', 'LAM001', 'UKU008', 10, 6000, 0),
(98, 'RS001', 'LAM001', 'UKU008', 25, 14000, 0),
(99, 'RS001', 'LAM001', 'UKU008', 50, 25000, 0),
(100, 'RS001', 'LAM001', 'UKU008', 100, 45000, 0),
(101, 'RS001', 'LAM002', 'UKU005', 10, 5500, 0),
(102, 'RS001', 'LAM002', 'UKU005', 25, 12750, 0),
(103, 'RS001', 'LAM002', 'UKU005', 50, 22500, 0),
(104, 'RS001', 'LAM002', 'UKU005', 100, 40000, 0),
(105, 'RS001', 'LAM002', 'UKU006', 10, 6000, 0),
(106, 'RS001', 'LAM002', 'UKU006', 25, 14000, 0),
(107, 'RS001', 'LAM002', 'UKU006', 50, 25000, 0),
(108, 'RS001', 'LAM002', 'UKU006', 100, 45000, 0),
(109, 'RS001', 'LAM002', 'UKU007', 10, 6000, 0),
(110, 'RS001', 'LAM002', 'UKU007', 25, 14000, 0),
(111, 'RS001', 'LAM002', 'UKU007', 50, 25000, 0),
(112, 'RS001', 'LAM002', 'UKU007', 100, 45000, 0),
(113, 'RS001', 'LAM002', 'UKU008', 10, 6500, 0),
(114, 'RS001', 'LAM002', 'UKU008', 25, 15250, 0),
(115, 'RS001', 'LAM002', 'UKU008', 50, 27500, 0),
(116, 'RS001', 'LAM002', 'UKU008', 100, 50000, 0),
(117, 'RS001', 'LAM003', 'UKU005', 10, 5500, 0),
(118, 'RS001', 'LAM003', 'UKU005', 25, 12750, 0),
(119, 'RS001', 'LAM003', 'UKU005', 50, 22500, 0),
(120, 'RS001', 'LAM003', 'UKU005', 100, 40000, 0),
(121, 'RS001', 'LAM003', 'UKU006', 10, 6000, 0),
(122, 'RS001', 'LAM003', 'UKU006', 25, 14000, 0),
(123, 'RS001', 'LAM003', 'UKU006', 50, 25000, 0),
(124, 'RS001', 'LAM003', 'UKU006', 100, 45000, 0),
(125, 'RS001', 'LAM003', 'UKU007', 10, 6000, 0),
(126, 'RS001', 'LAM003', 'UKU007', 25, 14000, 0),
(127, 'RS001', 'LAM003', 'UKU007', 50, 25000, 0),
(128, 'RS001', 'LAM003', 'UKU007', 100, 45000, 0),
(129, 'RS001', 'LAM003', 'UKU008', 10, 6500, 0),
(130, 'RS001', 'LAM003', 'UKU008', 25, 15250, 0),
(131, 'RS001', 'LAM003', 'UKU008', 50, 27500, 0),
(132, 'RS001', 'LAM003', 'UKU008', 100, 50000, 0),
(133, 'SL001', 'LAM001', 'UKU009', 10, 30000, 0),
(134, 'SL001', 'LAM001', 'UKU009', 25, 70000, 0),
(135, 'SL001', 'LAM001', 'UKU009', 50, 125000, 0),
(136, 'SL001', 'LAM001', 'UKU009', 100, 230000, 0),
(137, 'SL001', 'LAM001', 'UKU010', 10, 35000, 0),
(138, 'SL001', 'LAM001', 'UKU010', 25, 80000, 0),
(139, 'SL001', 'LAM001', 'UKU010', 50, 150000, 0),
(140, 'SL001', 'LAM001', 'UKU010', 100, 250000, 0),
(141, 'SL001', 'LAM002', 'UKU009', 10, 31000, 0),
(142, 'SL001', 'LAM002', 'UKU009', 25, 72500, 0),
(143, 'SL001', 'LAM002', 'UKU009', 50, 130000, 0),
(144, 'SL001', 'LAM002', 'UKU009', 100, 240000, 0),
(145, 'SL001', 'LAM002', 'UKU010', 10, 36000, 0),
(146, 'SL001', 'LAM002', 'UKU010', 25, 82500, 0),
(147, 'SL001', 'LAM002', 'UKU010', 50, 155000, 0),
(148, 'SL001', 'LAM002', 'UKU010', 100, 260000, 0),
(149, 'SL001', 'LAM003', 'UKU009', 10, 31000, 0),
(150, 'SL001', 'LAM003', 'UKU009', 25, 72500, 0),
(151, 'SL001', 'LAM003', 'UKU009', 50, 130000, 0),
(152, 'SL001', 'LAM003', 'UKU009', 100, 240000, 0),
(153, 'SL001', 'LAM003', 'UKU010', 10, 36000, 0),
(154, 'SL001', 'LAM003', 'UKU010', 25, 82500, 0),
(155, 'SL001', 'LAM003', 'UKU010', 50, 155000, 0),
(156, 'SL001', 'LAM003', 'UKU010', 100, 260000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `template_galery`
--

CREATE TABLE `template_galery` (
  `kode_gambar` int(10) NOT NULL,
  `kode_barang` varchar(6) NOT NULL,
  `kode_ukuran` varchar(6) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `status_delete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `template_galery`
--

INSERT INTO `template_galery` (`kode_gambar`, `kode_barang`, `kode_ukuran`, `gambar`, `status_delete`) VALUES
(50, 'NL001', 'UKU001', 'LabelNama.jpg', 0),
(51, 'NL001', 'UKU001', 'LabelNama.jpg', 0),
(52, 'NL001', 'UKU001', 'LabelNama.jpg', 0),
(53, 'PS001', 'UKU012', 'banner_3.png', 0),
(54, 'PS001', 'UKU012', 'banner_3.png', 0),
(55, 'PS001', 'UKU012', 'banner_3.png', 0),
(56, 'PS001', 'UKU011', 'banner_3.png', 0),
(57, 'NL001', 'UKU001', 'LabelNama.jpg', 0),
(58, 'NL001', 'UKU001', '20021.jpg', 0),
(59, 'NL001', 'UKU001', 'LabelNama.jpg', 0),
(60, 'NL001', 'UKU001', 'LabelNama.jpg', 0),
(61, 'NL001', 'UKU001', 'LabelNama.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukuran`
--

CREATE TABLE `ukuran` (
  `kode_ukuran` varchar(6) NOT NULL,
  `ukuran` varchar(15) NOT NULL,
  `gambar_ukuran` varchar(100) NOT NULL,
  `status_delete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ukuran`
--

INSERT INTO `ukuran` (`kode_ukuran`, `ukuran`, `gambar_ukuran`, `status_delete`) VALUES
('UKU001', '5CM X 1CM', 'UKU001.jpg', 0),
('UKU002', '5CM X 2CM', 'UKU002.jpg', 0),
('UKU003', '4CM X 1,5CM', 'UKU003.jpg', 0),
('UKU004', '5CM X 1,5CM', 'UKU004.jpg', 0),
('UKU005', '3CM X 3CM', 'UKU005.jpg', 0),
('UKU006', '4CM X 4CM', 'UKU006.jpg', 0),
('UKU007', '5CM X 5CM', 'UKU007.jpg', 0),
('UKU008', '6CM X 6CM', 'UKU008.jpg', 0),
('UKU009', '11CM X 7CM', 'UKU009.jpg', 0),
('UKU010', '12CM X 7CM', 'UKU010.jpg', 0),
('UKU011', '3CM X 6CM', 'UKU011.jpg', 0),
('UKU012', '4CM X 7CM', 'UKU012.jpg', 0),
('UKU013', '5CM X 8CM', 'UKU013.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `nama_user` varchar(20) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `pass_user` varchar(10) NOT NULL,
  `alamat_user` text NOT NULL,
  `telp_user` varchar(12) NOT NULL,
  `status_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nama_user`, `email_user`, `pass_user`, `alamat_user`, `telp_user`, `status_delete`) VALUES
('Indra Maryati', 'maryati@stts.edu', '123456', 'Jl. Ngagel Jaya Tengah 73-77Kota SurabayaJawa Timur60284', '081703207992', 0),
('Tamara', 'tamputhera@gmail.com', '12345', 'Jl. Ngagel Madya VI No. 26-28\r\nKota Surabaya\r\nJawa Timur\r\n60284', '0811523105', 0),
('Kevin Cornellius S', 'thecornells21@gmail.com', '123456', 'Pondok Mutiara AH 14', '089605966393', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlist` int(20) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `kode_barang` varchar(25) NOT NULL,
  `status_delete` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wishlist`
--

INSERT INTO `wishlist` (`id_wishlist`, `email_user`, `kode_barang`, `status_delete`) VALUES
(29, 'thecornells21@gmail.com', 'RS001', 0),
(30, 'thecornells21@gmail.com', 'SL001', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`kode_bahan`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indeks untuk tabel `d_pesan`
--
ALTER TABLE `d_pesan`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `kode_bahan` (`kode_bahan`),
  ADD KEY `kode_laminasi` (`kode_laminasi`),
  ADD KEY `kode_ukuran` (`kode_ukuran`);

--
-- Indeks untuk tabel `h_pesan`
--
ALTER TABLE `h_pesan`
  ADD PRIMARY KEY (`kode_pesanan`),
  ADD KEY `email_user` (`email_user`);

--
-- Indeks untuk tabel `laminasi`
--
ALTER TABLE `laminasi`
  ADD PRIMARY KEY (`kode_laminasi`);

--
-- Indeks untuk tabel `pricelist`
--
ALTER TABLE `pricelist`
  ADD PRIMARY KEY (`kode_pricelist`);

--
-- Indeks untuk tabel `template_galery`
--
ALTER TABLE `template_galery`
  ADD PRIMARY KEY (`kode_gambar`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indeks untuk tabel `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`kode_ukuran`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email_user`);

--
-- Indeks untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_wishlist`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `d_pesan`
--
ALTER TABLE `d_pesan`
  MODIFY `kode` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `pricelist`
--
ALTER TABLE `pricelist`
  MODIFY `kode_pricelist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT untuk tabel `template_galery`
--
ALTER TABLE `template_galery`
  MODIFY `kode_gambar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
