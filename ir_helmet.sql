-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 12, 2022 at 11:54 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ir_helmet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, ' Ilham Shubkhi', 'owner1 ', 'owner111'),
(2, 'Ramzi ', 'owner2', 'owner222');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_produk`, `qty`) VALUES
(1, 1, 4);

--
-- Triggers `keranjang`
--
DELIMITER $$
CREATE TRIGGER `keranjang hapus` AFTER DELETE ON `keranjang` FOR EACH ROW UPDATE produk SET qty = qty + OLD.qty WHERE id_produk = OLD.id_produk
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `keranjang tambah` AFTER INSERT ON `keranjang` FOR EACH ROW UPDATE produk SET qty = qty - NEW.qty WHERE id_produk = NEW.id_produk
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `batas_stok` int(11) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `deskripsi_produk` text COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `qty`, `batas_stok`, `harga_produk`, `foto_produk`, `deskripsi_produk`) VALUES
(1, 'MT HELMET', 30, 15, 9000000, 'helmet1.jpg', 'MT HELMET KRE+ CARBON PROJECTILE D2 GLOSS GREEN'),
(2, 'SCORPION EXO R1', 40, 10, 8500000, 'helmet2.jpg', 'SCORPION EXO R1 EDISI FABIO QUARTARARO (EXCLUDE VISOR)'),
(4, 'X-LITE X-803', 180, 15, 8650000, 'helmet3.jpg', 'X-LITE X-803 HOTLAP CARBON BLACK RED (EXCLUDE VISOR)'),
(5, 'AGV PISTA FUTURO GP-RR', 200, 20, 34000000, 'helmet4.jpg', 'AGV PISTA GP RR ANNO 75 CARBON CONPOSITE (INCLUDE VISOR)'),
(6, 'AGV PISTA SCUDERIA GP-RR', 90, 15, 18000000, 'helmet5.jpg', 'AGV PISTA SCUDERIA GP-RR CARBON COMPOSITE (EXCLUDE VISOR)'),
(7, 'SHARK GP-PRO', 300, 15, 13800000, 'helmet6.jpg', 'SHARK RACE R PRO GP EDISI OLIVEIRA SIGNATURE MATTE (INCLUDE VISOR DARK SMOKE)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
