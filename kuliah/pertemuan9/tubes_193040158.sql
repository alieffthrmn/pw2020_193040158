-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2020 at 04:37 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes_193040158`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `display` varchar(100) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `pengarang` varchar(100) DEFAULT NULL,
  `penerbit` varchar(100) DEFAULT NULL,
  `harga` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `display`, `judul`, `pengarang`, `penerbit`, `harga`) VALUES
(1, '1.jpg', 'Gagal menjadi manusia', 'Dazai Osamu', 'Dema Buku', '53.100'),
(2, '2.jpg', 'Kepunahan Keenam: Sebuah Sejarah Tak Alami', 'Elisabeth Kolbert', 'Gramedia Pustaka Utama', '86.000'),
(3, '3.jpg', 'Pemimpi(N) Edisi Amandemen', 'Wildan Alamsyah', 'Loveable', '84.000'),
(4, '4.jpg', 'Nanti Kita Cerita Tentang Hari Ini: Dari Surat-surat ke Sinema', 'Melarissa Sjarief', 'Kepustakaan Populer Gramedia', '175.000'),
(5, '5.jpg', 'Hak Angket Kawal Demokrasi', 'A.M Sallatu', 'MERDEKA BOOK', '50.000'),
(6, '6.jpg', 'More Of You', 'Acha Sinaga & Andy Ambarita', 'Elex Media Komputindo', '72.000'),
(7, '7.jpg', 'Bukan Cinderella', 'Dheti Azmi', 'Gramedia Widiasarana Indonesia', '173.000'),
(8, '8.jpg', 'Semua Bisa Menjadi Programmer Python Case Study', 'Yuniar Supardi', 'Elex Media Komputindo', '72.000'),
(9, '9.jpg', 'Koleksi Program Web Php', 'YUNIAR SUPARDI & IRWAN KURNIAWAN, S.KOM.', 'Elex Media Komputindo', '95.000'),
(10, '10.jpg', '5 Pemrograman Dasar Desain Website', 'Jubilee Enterprise', 'Elex Media Komputindo', '80.000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
