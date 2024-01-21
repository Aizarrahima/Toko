-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 21, 2024 at 06:25 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `Barang`
--

CREATE TABLE `Barang` (
  `IdBarang` int(50) NOT NULL,
  `NamaBarang` varchar(250) NOT NULL,
  `Keterangan` varchar(250) NOT NULL,
  `Satuan` varchar(250) NOT NULL,
  `IdPengguna` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Barang`
--

INSERT INTO `Barang` (`IdBarang`, `NamaBarang`, `Keterangan`, `Satuan`, `IdPengguna`) VALUES
(1, 'Laptop Asus', 'Laptop karyawan', 'Unit', 4),
(2, 'Kamera', 'Kamera owner', 'Unit', 1),
(3, 'Tablet', 'Tablet admin', 'Unit', 1),
(4, 'Headset', 'Headset admin', 'Buah', 1),
(5, 'Keyboard', 'Barang Penjualan', 'Buah', 1),
(6, 'Mouse', 'Barang Penjualan', 'Buah', 1),
(7, 'Monitor', 'Barang Penjualan', 'Unit', 1),
(8, 'Speaker', 'Barang Penjualan', 'Buah', 1),
(9, 'Charger HP', 'Barang Penjualan', 'Buah', 1),
(10, 'Kabel Data', 'Barang Penjualan', 'Buah', 1);

-- --------------------------------------------------------

--
-- Table structure for table `HakAkses`
--

CREATE TABLE `HakAkses` (
  `IdAkses` int(50) NOT NULL,
  `NamaAkses` varchar(250) NOT NULL,
  `Keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `HakAkses`
--

INSERT INTO `HakAkses` (`IdAkses`, `NamaAkses`, `Keterangan`) VALUES
(1, 'Admin', 'Dapat mengakses semua halaman'),
(2, 'Owner', 'Hanya dapat mengakses laporan penjualan dan pembelian'),
(3, 'Pembeli', 'Hanya dapat melihat daftar barang dan melakukan pembelian'),
(4, 'Penjual', 'Hanya dapat melihat dan menambahkan daftar barang dagangannya, beserta laporan dari barang yang telah terjual'),
(5, 'Karyawan', 'Hanya dapat mengelola data pengguna, transaksi, dan absensi karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `Pelanggan`
--

CREATE TABLE `Pelanggan` (
  `IdPelanggan` int(11) NOT NULL,
  `IdPenjualan` int(11) NOT NULL,
  `NamaPelanggan` varchar(250) NOT NULL,
  `Alamat` varchar(250) NOT NULL,
  `NoHP` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Pelanggan`
--

INSERT INTO `Pelanggan` (`IdPelanggan`, `IdPenjualan`, `NamaPelanggan`, `Alamat`, `NoHP`) VALUES
(1, 1, 'rara', 'blitar', '08123412');

-- --------------------------------------------------------

--
-- Table structure for table `Pembelian`
--

CREATE TABLE `Pembelian` (
  `IdPembelian` int(50) NOT NULL,
  `JumlahPembelian` int(200) NOT NULL,
  `HargaBeli` decimal(10,2) NOT NULL,
  `IdPengguna` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Pembelian`
--

INSERT INTO `Pembelian` (`IdPembelian`, `JumlahPembelian`, `HargaBeli`, `IdPengguna`) VALUES
(1, 100, '1000000.00', 2),
(2, 1, '1800000.00', 3),
(3, 7, '500000.00', 3),
(4, 9, '3000000.00', 3),
(5, 8, '500000.00', 3),
(6, 5, '4500000.00', 3),
(7, 6, '4200000.00', 3),
(8, 2, '400000.00', 3),
(9, 4, '1500000.00', 3),
(10, 5, '1800000.00', 3),
(11, 3, '2000000.00', 4),
(12, 1, '2300000.00', 4),
(13, 6, '1200000.00', 4),
(14, 3, '1500000.00', 4),
(15, 4, '2000000.00', 4),
(16, 2, '4500000.00', 4),
(17, 5, '600000.00', 4),
(18, 8, '400000.00', 4),
(19, 9, '550000.00', 4),
(20, 7, '300000.00', 4),
(21, 100, '200000.00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `Pengguna`
--

CREATE TABLE `Pengguna` (
  `IdPengguna` int(50) NOT NULL,
  `NamaPengguna` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `NamaDepan` varchar(250) NOT NULL,
  `NamaBelakang` varchar(250) NOT NULL,
  `NoHP` varchar(250) NOT NULL,
  `Alamat` varchar(255) NOT NULL,
  `IdAkses` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Pengguna`
--

INSERT INTO `Pengguna` (`IdPengguna`, `NamaPengguna`, `Password`, `NamaDepan`, `NamaBelakang`, `NoHP`, `Alamat`, `IdAkses`) VALUES
(1, 'ken', '123', 'Ken', 'Wijaya', '0823131323', 'Malang', 1),
(2, 'James', '123', 'James', 'Doe', '09831312', 'Jakarta', 2),
(3, 'jonathan', '123', 'Jonathan', 'Willend', '0812313131', 'Jakarta', 3),
(4, 'kenaya', '123', 'Kenaya', 'Joe', '09123131', 'Surabaya', 4);

-- --------------------------------------------------------

--
-- Table structure for table `Penjualan`
--

CREATE TABLE `Penjualan` (
  `IdPenjualan` int(50) NOT NULL,
  `JumlahPenjualan` int(200) NOT NULL,
  `HargaJual` decimal(10,2) NOT NULL,
  `IdPengguna` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Penjualan`
--

INSERT INTO `Penjualan` (`IdPenjualan`, `JumlahPenjualan`, `HargaJual`, `IdPengguna`) VALUES
(2, 1, '1850000.00', 3),
(3, 7, '525000.00', 3),
(4, 9, '3075000.00', 3),
(5, 8, '530000.00', 3),
(6, 5, '4550000.00', 3),
(7, 6, '4500000.00', 3),
(8, 2, '550000.00', 3),
(9, 4, '1570000.00', 3),
(10, 5, '1900000.00', 3),
(11, 3, '2100000.00', 4),
(12, 1, '2500000.00', 4),
(13, 6, '1500000.00', 4),
(14, 3, '1650000.00', 4),
(15, 4, '2200000.00', 4),
(16, 2, '4500000.00', 4),
(17, 5, '630000.00', 4),
(18, 8, '420000.00', 4),
(19, 9, '580000.00', 4),
(20, 7, '320000.00', 4),
(22, 10, '100000.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Supplier`
--

CREATE TABLE `Supplier` (
  `IdSupplier` int(11) NOT NULL,
  `IdBarang` int(11) NOT NULL,
  `NamaSupplier` varchar(250) NOT NULL,
  `Alamat` varchar(250) NOT NULL,
  `NoHP` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Supplier`
--

INSERT INTO `Supplier` (`IdSupplier`, `IdBarang`, `NamaSupplier`, `Alamat`, `NoHP`) VALUES
(1, 1, 'Jane', 'Jakarta', '13131313');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Barang`
--
ALTER TABLE `Barang`
  ADD PRIMARY KEY (`IdBarang`),
  ADD KEY `IdPengguna` (`IdPengguna`);

--
-- Indexes for table `HakAkses`
--
ALTER TABLE `HakAkses`
  ADD PRIMARY KEY (`IdAkses`);

--
-- Indexes for table `Pelanggan`
--
ALTER TABLE `Pelanggan`
  ADD PRIMARY KEY (`IdPelanggan`),
  ADD KEY `IdPenjualan` (`IdPenjualan`);

--
-- Indexes for table `Pembelian`
--
ALTER TABLE `Pembelian`
  ADD PRIMARY KEY (`IdPembelian`),
  ADD KEY `IdPengguna` (`IdPengguna`);

--
-- Indexes for table `Pengguna`
--
ALTER TABLE `Pengguna`
  ADD PRIMARY KEY (`IdPengguna`),
  ADD KEY `IdAkses` (`IdAkses`);

--
-- Indexes for table `Penjualan`
--
ALTER TABLE `Penjualan`
  ADD PRIMARY KEY (`IdPenjualan`),
  ADD KEY `IdPengguna` (`IdPengguna`);

--
-- Indexes for table `Supplier`
--
ALTER TABLE `Supplier`
  ADD PRIMARY KEY (`IdSupplier`),
  ADD KEY `IdBarang` (`IdBarang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Barang`
--
ALTER TABLE `Barang`
  MODIFY `IdBarang` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `HakAkses`
--
ALTER TABLE `HakAkses`
  MODIFY `IdAkses` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Pelanggan`
--
ALTER TABLE `Pelanggan`
  MODIFY `IdPelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Pembelian`
--
ALTER TABLE `Pembelian`
  MODIFY `IdPembelian` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `Pengguna`
--
ALTER TABLE `Pengguna`
  MODIFY `IdPengguna` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Penjualan`
--
ALTER TABLE `Penjualan`
  MODIFY `IdPenjualan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `Supplier`
--
ALTER TABLE `Supplier`
  MODIFY `IdSupplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Barang`
--
ALTER TABLE `Barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`IdPengguna`) REFERENCES `Pengguna` (`IdPengguna`);

--
-- Constraints for table `Pembelian`
--
ALTER TABLE `Pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`IdPengguna`) REFERENCES `Pengguna` (`IdPengguna`);

--
-- Constraints for table `Pengguna`
--
ALTER TABLE `Pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`IdAkses`) REFERENCES `HakAkses` (`IdAkses`);

--
-- Constraints for table `Penjualan`
--
ALTER TABLE `Penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`IdPengguna`) REFERENCES `Pengguna` (`IdPengguna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
