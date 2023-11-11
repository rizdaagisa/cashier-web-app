-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2023 at 03:33 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `percetakan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(8) NOT NULL,
  `nama_admin` varchar(15) NOT NULL,
  `nomor` varchar(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `username` varchar(8) NOT NULL,
  `password` varchar(8) NOT NULL,
  `confirm_password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `nomor`, `email`, `alamat`, `username`, `password`, `confirm_password`) VALUES
(1, 'Toko Percetakan', '081290255683', 'admin@gmail.com', 'jl. Margonda Raya No.100', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(8) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `stock` int(6) NOT NULL,
  `harga` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stock`, `harga`) VALUES
(1, 'pulpen', 2, 5000),
(2, 'buku', 22, 15000),
(3, 'penghapus', 2, 3000),
(5, 'buku tulis', 99, 9000),
(9, 'pensil', 30, 4000),
(10, 'tempat pensil', 21, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `cetak`
--

CREATE TABLE `cetak` (
  `id_cetak` int(8) NOT NULL,
  `nama_pelanggan` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `nomor` int(12) NOT NULL,
  `email` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `kategori` varchar(15) NOT NULL,
  `jumlah` int(12) NOT NULL,
  `harga` int(12) NOT NULL,
  `tanggal_buat` varchar(20) NOT NULL,
  `tanggal_ambil` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cetak`
--

INSERT INTO `cetak` (`id_cetak`, `nama_pelanggan`, `alamat`, `nomor`, `email`, `description`, `kategori`, `jumlah`, `harga`, `tanggal_buat`, `tanggal_ambil`) VALUES
(3, 'pelanggan2', 'Jl. Siaga Darma', 0, '0', 'adad', 'Spanduk', 114, 400000, '2020-08-20', '2020-08-21'),
(5, 'pelanggan1', 'Jl. Siaga Darma', 0, '0', 'r', 'Nota', 114, 400000, '2020-08-29', '2020-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(8) NOT NULL,
  `id_pelanggan` int(8) NOT NULL,
  `id_barang` int(8) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `harga_barang` int(9) NOT NULL,
  `banyak_barang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`id_nota`, `id_pelanggan`, `id_barang`, `nama_barang`, `harga_barang`, `banyak_barang`) VALUES
(193, 135, 1, 'pulpen', 5000, 1),
(194, 135, 2, 'buku', 15000, 2),
(195, 136, 1, 'pulpen', 5000, 2),
(196, 136, 2, 'buku', 15000, 1),
(197, 137, 2, 'buku', 15000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(8) NOT NULL,
  `nama_pelanggan` varchar(20) NOT NULL,
  `alamat` varchar(35) NOT NULL,
  `email` varchar(20) NOT NULL,
  `nomor` int(12) NOT NULL,
  `tanggal` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `email`, `nomor`, `tanggal`) VALUES
(135, 'pelanggan1', 'jl. margonda', 'pelanggan@gmail.com', 2147483647, '23-08-2023'),
(136, 'pelanggan2', 'jl. margonda', 'pelanggan@gmail.com', 2147483647, '23-08-2023'),
(137, 'pelanggan3', 'jl. margonda', 'pelanggan@gmail.com', 2147483647, '23-08-2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `cetak`
--
ALTER TABLE `cetak`
  ADD PRIMARY KEY (`id_cetak`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cetak`
--
ALTER TABLE `cetak`
  MODIFY `id_cetak` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
