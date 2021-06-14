-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2020 at 11:36 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengiriman`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_aplikasi`
--

CREATE TABLE `data_aplikasi` (
  `title` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_aplikasi`
--

INSERT INTO `data_aplikasi` (`title`, `nama`, `alamat`, `telp`) VALUES
('Pengiriman Barang blabla', 'Pengiriman Barang', 'Griya Permata Alam Malang', '08551881259');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengiriman`
--

CREATE TABLE `detail_pengiriman` (
  `id_detailPengiriman` int(30) NOT NULL,
  `id_pengiriman` int(30) NOT NULL,
  `nm_pengirim` varchar(50) NOT NULL,
  `id_layanan` int(30) NOT NULL,
  `id_tujuan` int(30) NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `berat` int(30) NOT NULL,
  `biaya_paket` int(20) NOT NULL,
  `total_biaya` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pengiriman`
--

INSERT INTO `detail_pengiriman` (`id_detailPengiriman`, `id_pengiriman`, `nm_pengirim`, `id_layanan`, `id_tujuan`, `tanggal_pengiriman`, `berat`, `biaya_paket`, `total_biaya`) VALUES
(1, 13, '', 1, 2, '0000-00-00', 0, 19000, 219000);

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(30) NOT NULL,
  `layanan` varchar(30) NOT NULL,
  `biaya_paket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `layanan`, `biaya_paket`) VALUES
(1, 'JTR', 1000000),
(2, 'OKE', 10000),
(3, 'REGULAR', 20000),
(4, 'CTC', 12000),
(5, 'YES', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(30) NOT NULL,
  `nm_pengirim` varchar(30) NOT NULL,
  `id_layanan` int(30) NOT NULL,
  `id_tujuan` int(30) NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `berat` int(15) NOT NULL,
  `biaya_paket` int(20) NOT NULL,
  `total_biaya` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `nm_pengirim`, `id_layanan`, `id_tujuan`, `tanggal_pengiriman`, `berat`, `biaya_paket`, `total_biaya`) VALUES
(8, 'vera', 3, 2, '2020-02-20', 1, 20000, 220000),
(10, 'Athena', 5, 4, '2020-12-31', 12, 15000, 180000),
(12, 'Kristina', 5, 1, '2020-12-12', 22, 15000, 330000),
(13, 'Vera Athena', 5, 4, '2020-12-31', 12, 15000, 180000),
(15, 'Vera Kristina', 3, 6, '2020-03-21', 13, 20000, 260000);

-- --------------------------------------------------------

--
-- Table structure for table `tujuan`
--

CREATE TABLE `tujuan` (
  `id_tujuan` int(30) NOT NULL,
  `tujuan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tujuan`
--

INSERT INTO `tujuan` (`id_tujuan`, `tujuan`) VALUES
(1, 'Blitar'),
(3, 'Kediri'),
(9, 'Madiun'),
(2, 'Malang'),
(10, 'Mojokerto'),
(6, 'Probolinggo'),
(4, 'Surabaya'),
(5, 'Tulungagung');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_pengguna` int(30) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `level` enum('User','Operator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_pengguna`, `username`, `password`, `nama`, `alamat`, `no_tlp`, `level`) VALUES
(1, 'vera@gmail.com', '4341dfaa7259082022147afd371b69c3', 'Vera ', 'Malang', '08551881259', 'User'),
(2, 'operator@gmail.com', '4b583376b2767b923c3e1da60d10de59', 'Kristina', 'Yogyakarta', '085790493135', 'Operator'),
(3, 'athena@gmail.com', '0454aa97682235df3ed1a3456bc86e62', 'Vera Athena', 'Surabaya', '081280038571', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pengiriman`
--
ALTER TABLE `detail_pengiriman`
  ADD PRIMARY KEY (`id_detailPengiriman`),
  ADD KEY `id_pengiriman` (`id_pengiriman`),
  ADD KEY `id_layanan` (`id_layanan`),
  ADD KEY `total_harga` (`biaya_paket`),
  ADD KEY `total_biaya` (`total_biaya`),
  ADD KEY `id_tujuan` (`id_tujuan`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `id_layanan` (`id_layanan`),
  ADD KEY `id_tujuan` (`id_tujuan`),
  ADD KEY `biaya_paket` (`biaya_paket`),
  ADD KEY `total_biaya` (`total_biaya`);

--
-- Indexes for table `tujuan`
--
ALTER TABLE `tujuan`
  ADD PRIMARY KEY (`id_tujuan`),
  ADD KEY `tujuan` (`tujuan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pengiriman`
--
ALTER TABLE `detail_pengiriman`
  MODIFY `id_detailPengiriman` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tujuan`
--
ALTER TABLE `tujuan`
  MODIFY `id_tujuan` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_pengguna` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pengiriman`
--
ALTER TABLE `detail_pengiriman`
  ADD CONSTRAINT `detail_pengiriman_ibfk_1` FOREIGN KEY (`id_pengiriman`) REFERENCES `pengiriman` (`id_pengiriman`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pengiriman_ibfk_2` FOREIGN KEY (`id_tujuan`) REFERENCES `tujuan` (`id_tujuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pengiriman_ibfk_3` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_2` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengiriman_ibfk_3` FOREIGN KEY (`id_tujuan`) REFERENCES `tujuan` (`id_tujuan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
