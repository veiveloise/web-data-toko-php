-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2022 at 05:48 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web2`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga` varchar(80) NOT NULL,
  `stok` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`, `stok`) VALUES
('10001', 'HANDPHONE', '3000000', '89');

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `nota` varchar(10) NOT NULL,
  `id_pelanggan` varchar(15) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga` varchar(80) NOT NULL,
  `jml_barang` varchar(20) NOT NULL,
  `total` varchar(20) NOT NULL,
  `id_trans` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `stok` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`nota`, `id_pelanggan`, `nama`, `alamat`, `telp`, `id_barang`, `nama_barang`, `harga`, `jml_barang`, `total`, `id_trans`, `tanggal`, `stok`) VALUES
('12311', '00001', 'null', 'null', 'null', '10001', 'null', 'null', 'null', '108', '24ED', '0000-00-00', 'null'),
('1234', '00002', 'ADAM', 'alamat', '01234567', '10001', 'BERAS', '12000', '1', '60000', '49011', '2022-06-05', '12');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(15) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `alamat`, `telp`) VALUES
('00001', 'veisha', 'DEPOK', '0812345678910'),
('00002', 'apa aja', 'DEPOK', '089121231238'),
('1234', 'veisha', 'de', '00000000000000');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_trans` varchar(10) NOT NULL,
  `id_pelanggan` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `total` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_trans`, `id_pelanggan`, `tanggal`, `total`) VALUES
('24ED', '00001', '2001-11-01', '1'),
('49011', '00001', '2022-06-08', '10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`) USING BTREE;

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`nota`) USING BTREE,
  ADD KEY `id_pelanggan` (`id_pelanggan`) USING BTREE,
  ADD KEY `id_barang` (`id_barang`) USING BTREE,
  ADD KEY `nama_barang` (`nama_barang`) USING BTREE,
  ADD KEY `id_trans` (`id_trans`) USING BTREE;

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`) USING BTREE;

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_trans`) USING BTREE,
  ADD KEY `id_pelanggan` (`id_pelanggan`) USING BTREE,
  ADD KEY `id_pelanggan_2` (`id_pelanggan`) USING BTREE,
  ADD KEY `id_trans` (`id_trans`,`id_pelanggan`) USING BTREE;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `PELANGGAN_FK1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `barang_fk1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `transaksi_fk1` FOREIGN KEY (`id_trans`) REFERENCES `transaksi` (`id_trans`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `pelanggan_id` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
