-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 10, 2021 at 09:29 PM
-- Server version: 10.3.31-MariaDB-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adry2296_aplikasipertanian`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_admin`
--

CREATE TABLE `table_admin` (
  `UserName` varchar(20) NOT NULL,
  `psw_admin` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_admin`
--

INSERT INTO `table_admin` (`UserName`, `psw_admin`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `table_customer`
--

CREATE TABLE `table_customer` (
  `username` varchar(64) NOT NULL,
  `psw_user` varchar(64) NOT NULL,
  `NoTelepon_1` varchar(64) NOT NULL,
  `Nama` longtext NOT NULL,
  `Alamat` longtext NOT NULL,
  `NoTelepon_2` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_customer`
--

INSERT INTO `table_customer` (`username`, `psw_user`, `NoTelepon_1`, `Nama`, `Alamat`, `NoTelepon_2`) VALUES
('100300', '5842c4f65253dba4bc36826d2fa261af', '081298670321', 'sontiana nainggolan', 'Marindal II amplas', '085297994533'),
('2018010092', '25d55ad283aa400af464c76d713c07ad', '085297993114', 'Saputra Hasibuan', 'Lubuk Pakam ', '085297994533'),
('2018010155', 'aaf021c0258a165aa506d99efc071099', '081222556360', 'Samuel Adriel Romaito Manurung', 'Jalan Irigasi No. 151 Medan', '08116098980');

-- --------------------------------------------------------

--
-- Table structure for table `table_pupuk`
--

CREATE TABLE `table_pupuk` (
  `Kd_pupuk` varchar(16) NOT NULL,
  `Nm_pupuk` varchar(64) NOT NULL,
  `Harga` varchar(20) NOT NULL,
  `Stok` varchar(20) NOT NULL,
  `Gambar` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_pupuk`
--

INSERT INTO `table_pupuk` (`Kd_pupuk`, `Nm_pupuk`, `Harga`, `Stok`, `Gambar`) VALUES
('PCA001', 'AMONIA', '60.000', '150 botol', 'Ammonia.jpg'),
('PCPO002', 'PUPUK ORGANIK', '70.000', '100  botol', 'JUAL_PUPUK_ORGANIK_CAIR_PETANI_ANDALAN.jpg'),
('PPHOO1', 'HUMUS', '20.000', '500 KG', '9d714144f51f59b687c36d5c3395d404818e18d9.jpeg'),
('PPK003', 'PUPUK KANDANG', '30.000', '500 kg', 'KANDANG.jpg'),
('PPP03', 'PHOSCA', '25000', '500 kg', '421001284.jpg'),
('PPU002', 'UREA', '30.000', '150 botol', 'urea.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `table_transaksi`
--

CREATE TABLE `table_transaksi` (
  `Kd_pemesanan` int(11) NOT NULL,
  `Tgl_Transaksi` datetime NOT NULL,
  `Nama` longtext NOT NULL,
  `Alamat` longtext NOT NULL,
  `Pesanan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`Pesanan`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_transaksi`
--

INSERT INTO `table_transaksi` (`Kd_pemesanan`, `Tgl_Transaksi`, `Nama`, `Alamat`, `Pesanan`) VALUES
(6, '2021-07-30 11:42:44', 'sontiana nainggolan', 'Marindal II amplas', '[{\"kodepupuk\":\"PCPO002\",\"namapupuk\":\"PUPUK ORGANIK\",\"harga\":\"70.000\",\"jumlah\":\"5\"},{\"kodepupuk\":\"PPP03\",\"namapupuk\":\"PHOSCA\",\"harga\":\"25000\",\"jumlah\":\"10\"},{\"kodepupuk\":\"PPU002\",\"namapupuk\":\"UREA\",\"harga\":\"30.000\",\"jumlah\":\"24\"}]'),
(7, '2021-07-30 13:10:01', 'sontiana nainggolan', 'Marindal II amplas', '[{\"kodepupuk\":\"PCA001\",\"namapupuk\":\"AMONIA\",\"harga\":\"60.000\",\"jumlah\":\"5\"},{\"kodepupuk\":\"PPHOO1\",\"namapupuk\":\"HUMUS\",\"harga\":\"20.000\",\"jumlah\":\"20\"},{\"kodepupuk\":\"PPP03\",\"namapupuk\":\"PHOSCA\",\"harga\":\"25000\",\"jumlah\":\"30\"}]'),
(8, '2021-07-30 13:11:08', 'sontiana nainggolan', 'Marindal II amplas', '[{\"kodepupuk\":\"PCA001\",\"namapupuk\":\"AMONIA\",\"harga\":\"60.000\",\"jumlah\":\"2\"},{\"kodepupuk\":\"PPK003\",\"namapupuk\":\"PUPUK KANDANG\",\"harga\":\"30.000\",\"jumlah\":\"15\"},{\"kodepupuk\":\"PPP03\",\"namapupuk\":\"PHOSCA\",\"harga\":\"25000\",\"jumlah\":\"10\"}]'),
(9, '2021-07-30 13:11:50', 'sontiana nainggolan', 'Marindal II amplas', '[{\"kodepupuk\":\"PCA001\",\"namapupuk\":\"AMONIA\",\"harga\":\"60.000\",\"jumlah\":\"3\"},{\"kodepupuk\":\"PCPO002\",\"namapupuk\":\"PUPUK ORGANIK\",\"harga\":\"70.000\",\"jumlah\":\"5\"},{\"kodepupuk\":\"PPU002\",\"namapupuk\":\"UREA\",\"harga\":\"30.000\",\"jumlah\":\"30\"}]'),
(10, '2021-07-30 13:12:34', 'sontiana nainggolan', 'Marindal II amplas', '[{\"kodepupuk\":\"PCPO002\",\"namapupuk\":\"PUPUK ORGANIK\",\"harga\":\"70.000\",\"jumlah\":\"2\"},{\"kodepupuk\":\"PPK003\",\"namapupuk\":\"PUPUK KANDANG\",\"harga\":\"30.000\",\"jumlah\":\"10\"},{\"kodepupuk\":\"PPU002\",\"namapupuk\":\"UREA\",\"harga\":\"30.000\",\"jumlah\":\"20\"}]'),
(11, '2021-07-30 13:12:56', 'sontiana nainggolan', 'Marindal II amplas', '[{\"kodepupuk\":\"PCPO002\",\"namapupuk\":\"PUPUK ORGANIK\",\"harga\":\"70.000\",\"jumlah\":\"2\"},{\"kodepupuk\":\"PPK003\",\"namapupuk\":\"PUPUK KANDANG\",\"harga\":\"30.000\",\"jumlah\":\"5\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `table_validasipemesanan`
--

CREATE TABLE `table_validasipemesanan` (
  `Kd_pemesanan` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `Status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_validasipemesanan`
--

INSERT INTO `table_validasipemesanan` (`Kd_pemesanan`, `username`, `Status`) VALUES
(1, '2018010155', 'Valid'),
(2, '2018010155', 'Belum Divalidasi'),
(3, '2018010092', 'Belum Divalidasi'),
(4, '2018010092', 'Belum Divalidasi'),
(5, '2018010092', 'Belum Divalidasi'),
(6, '100300', 'Valid'),
(7, '100300', 'Valid'),
(8, '100300', 'Valid'),
(9, '100300', 'Belum Divalidasi'),
(10, '100300', 'Belum Divalidasi'),
(11, '100300', 'Belum Divalidasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_admin`
--
ALTER TABLE `table_admin`
  ADD PRIMARY KEY (`UserName`);

--
-- Indexes for table `table_customer`
--
ALTER TABLE `table_customer`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `Nik` (`NoTelepon_1`),
  ADD UNIQUE KEY `NoTelepon_1` (`NoTelepon_1`);

--
-- Indexes for table `table_pupuk`
--
ALTER TABLE `table_pupuk`
  ADD PRIMARY KEY (`Kd_pupuk`);

--
-- Indexes for table `table_transaksi`
--
ALTER TABLE `table_transaksi`
  ADD PRIMARY KEY (`Kd_pemesanan`);

--
-- Indexes for table `table_validasipemesanan`
--
ALTER TABLE `table_validasipemesanan`
  ADD PRIMARY KEY (`Kd_pemesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_transaksi`
--
ALTER TABLE `table_transaksi`
  MODIFY `Kd_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `table_validasipemesanan`
--
ALTER TABLE `table_validasipemesanan`
  MODIFY `Kd_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
