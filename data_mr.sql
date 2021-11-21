-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2021 at 06:01 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_mr`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `password`, `nama_lengkap`) VALUES
(1, 'admin@mentarigroup', 'admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_item` int(11) NOT NULL,
  `item` varchar(100) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_item`, `item`, `satuan`, `harga`) VALUES
(1, 'Rice Cooker', 'Unit', 600000),
(2, 'Kulkas', 'Unit', 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id_dep` int(11) NOT NULL,
  `nama_dep` varchar(50) NOT NULL,
  `pe` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id_dep`, `nama_dep`, `pe`) VALUES
(1, 'Gudang', 'P'),
(2, 'Manajer', 'E'),
(3, 'Asisten', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(50) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `alamat`) VALUES
(1, 'grahacipta@gmail.com', 'grahacipta', 'PT Graha Cipta Bangkojaya', 'Jl. Lintas Sumatera KM 21, Karang Anyar, Pamenang Barat, Merangin, Jambi'),
(2, 'rismanscham@gmail.com', 'risman', 'PT Risman Scham Palm Indonesia', 'Sungai Pebuaran, Selensen, Kemuning, Indragiri Hilir, Riau'),
(3, 'saktimait@gmail.com', 'saktimait', 'PT Sakti Mait Jaya Langit', 'Jl. Raya Palangkaraya - Buntok KM 60, Lahei Mangkulup, Mantagai, Kapuas, Kalimantan Tengah'),
(4, 'mentarilaju@gmail.com', 'mentarilaju', 'PT Mentari Laju Jaya Usaha', 'Jl. Ciputat No. 14 Kebayoran Lama Selatan, Kebayoran Lama, Jakarta Selatan');

-- --------------------------------------------------------

--
-- Table structure for table `purchasing`
--

CREATE TABLE `purchasing` (
  `id_purchasing` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `mr` varchar(50) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(100) NOT NULL,
  `dep` varchar(50) NOT NULL,
  `sektor` char(1) NOT NULL,
  `status_pembelian` varchar(50) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchasing`
--

INSERT INTO `purchasing` (`id_purchasing`, `id_pelanggan`, `mr`, `tanggal_pembelian`, `total_pembelian`, `dep`, `sektor`, `status_pembelian`) VALUES
(1, 1, '004/SMJL/VIII/2020', '2021-11-18', 2600000, 'Asisten', 'P', 'sudah mengirim'),
(2, 1, '002/SMJL/VIII/2020', '2021-11-18', 3200000, 'Asisten', 'E', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `purchasing_barang`
--

CREATE TABLE `purchasing_barang` (
  `id_purchasing_barang` int(11) NOT NULL,
  `id_purchasing` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `jumlah` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchasing_barang`
--

INSERT INTO `purchasing_barang` (`id_purchasing_barang`, `id_purchasing`, `id_item`, `jumlah`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 2, 1, 2),
(4, 2, 2, 1);

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
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `purchasing`
--
ALTER TABLE `purchasing`
  ADD PRIMARY KEY (`id_purchasing`);

--
-- Indexes for table `purchasing_barang`
--
ALTER TABLE `purchasing_barang`
  ADD PRIMARY KEY (`id_purchasing_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchasing`
--
ALTER TABLE `purchasing`
  MODIFY `id_purchasing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchasing_barang`
--
ALTER TABLE `purchasing_barang`
  MODIFY `id_purchasing_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
