-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2020 at 02:45 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kanvas`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `kode_area` varchar(10) NOT NULL,
  `nama_area` varchar(128) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `kode_area`, `nama_area`, `is_active`) VALUES
(1, 'PAL01', 'Palu Barat', 1),
(2, 'PAL02', 'Palu Timur', 1),
(3, 'PAL03', 'Palu Selatan', 1),
(4, 'PAL04', 'Palu Utara', 1),
(5, 'PAL05', 'Palu Bangga', 1),
(6, 'PAL06', 'Palu Biromaru', 1),
(7, 'PAL07', 'Palu Tawaili', 1),
(8, 'DG01', 'Donggala ', 1),
(9, 'PK01', 'Pasangkayu', 1),
(10, 'PBR01', 'Pantai Barat', 1),
(11, 'PRG01', 'Parigi - Ambibabo', 1),
(12, 'PRG02', 'Dolago - Sausu', 1),
(13, 'PTM01', 'Kasimbar - Tinomobo', 1),
(14, 'PTM02', 'Kotaraya', 1),
(15, 'PTM03', 'Lambunu - Moutong', 1),
(16, 'MRS01', 'Marisa', 1),
(17, 'PSO01', 'Tambarana -Poso', 1),
(18, 'PSO02', 'Poso', 1),
(19, 'PSO03', 'Tentena - Penpodlo', 1),
(20, 'AMP01', 'Ampana - Bunta', 1),
(21, 'MRI01', 'Morowali Bawah', 1),
(22, 'MRI02', 'Morowali Atas', 1),
(23, 'PNG01', 'Palolo - Napu - Gimpu', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`,`kode_area`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
