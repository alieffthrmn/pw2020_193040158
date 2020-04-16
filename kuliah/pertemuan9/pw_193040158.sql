-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2020 at 08:40 AM
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
-- Database: `pw_193040158`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nrp` char(9) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nrp`, `email`, `jurusan`, `gambar`) VALUES
(1, 'Sandhika Galih', '043040023', 'sandhikagalih@unpas.ac.id', 'Teknik Informatika', 'sandhika.jpg'),
(2, 'Doddy Ferdiansyah', '15304123', 'doddy@gmail.com', 'Teknik Mesin', 'doddy.jpg'),
(3, 'Erik', '023040321', 'erik@yahoo.com', 'Teknik Industri', 'erik.jpg'),
(4, 'Alief Fathurrohman', '193040158', '193040158@mail.unpas.ac.id', 'Teknik Informatika', 'alip.jpg'),
(5, 'Rafi M Zahid', '193040166', '193040166@mail.unpas.ac.id', 'Teknik Lingkungan', 'rafi.jpg'),
(6, 'R Yusuf Raihan', '193040168', '193040168@mail.unpas.ac.id', 'Teknik Pangan', 'ucup.jpg'),
(7, 'Ujang Fatah Abwabal K', '193040174', '193040174@mail.unpas.ac.id', 'Teknik Mesin', 'ujang.jpg'),
(8, 'Rifky Mulyawan', '193040149', '193040149@mail.unpas.ac.id', 'Teknik Mesin', 'rifky.jpg'),
(9, 'Busro Trisno Yuweno', '193040148', '193040148@mail.unpas.ac.id', 'Teknik Industri', 'busro.jpg'),
(10, 'Cahyadi Ivansyah', '193040155', '193040155@mail.unpas.ac.id', 'Teknik Pangan', 'ivan.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
