-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2023 at 04:50 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sanbongdatiteo`
--

-- --------------------------------------------------------

--
-- Table structure for table `danhsachsan`
--

CREATE TABLE `danhsachsan` (
  `id` int(50) NOT NULL,
  `Tensan` text NOT NULL,
  `Diachi` text NOT NULL,
  `Loaisan` text NOT NULL,
  `Giatien` int(50) NOT NULL,
  `Trangthai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhsachsan`
--

INSERT INTO `danhsachsan` (`id`, `Tensan`, `Diachi`, `Loaisan`, `Giatien`, `Trangthai`) VALUES
(1, 'San A', 'Quan 1', 'Sân 5 người', 3000000, 'Hoạt động'),
(2, 'San B', 'Quan 2', 'Sân 7 người', 3000000, 'Hoạt động'),
(3, 'San C', 'Quan 3', 'Sân 11 người', 3000000, 'Hoạt động'),
(4, 'San D', 'Quan 3', 'Sân 5 người', 3000000, 'Hoạt động'),
(5, 'San E', 'Quan 5', 'Sân 5 người', 3000000, 'Hoạt động'),
(6, 'San F', 'Quan 11', 'Sân 11 người', 3000000, 'Trống'),
(7, 'San G', 'Quan 8', 'Sân 7 người', 3000000, 'Trống'),
(8, 'San H', 'Quan 7', 'Sân 5 người', 3000000, 'Trống');

-- --------------------------------------------------------

--
-- Table structure for table `hoadonkh`
--

CREATE TABLE `hoadonkh` (
  `TenDN` text NOT NULL,
  `SDT` int(50) NOT NULL,
  `Tensan` text NOT NULL,
  `Loaisan` text NOT NULL,
  `Ngaydat` date NOT NULL,
  `Thoigian` time(6) NOT NULL,
  `Giatien` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(50) NOT NULL,
  `Tenkh` text NOT NULL,
  `SDT` int(50) NOT NULL,
  `Tensan` text NOT NULL,
  `Loaisan` text NOT NULL,
  `Ngaydat` date NOT NULL,
  `Thoigianbd` time(6) NOT NULL,
  `Thoigiankt` time(6) NOT NULL,
  `Giatien` double NOT NULL,
  `PTTT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lichdatsan`
--

CREATE TABLE `lichdatsan` (
  `id` int(50) NOT NULL,
  `TenDN` text NOT NULL,
  `SDT` int(50) NOT NULL,
  `Ngaydat` date NOT NULL,
  `Thoigianbd` time(6) NOT NULL,
  `Thoigiankt` time(6) NOT NULL,
  `Soluong` int(50) NOT NULL,
  `Loaisan` text NOT NULL,
  `Tensan` text NOT NULL,
  `Ghichu` text NOT NULL,
  `Doan` text DEFAULT NULL,
  `sldoan` int(11) DEFAULT NULL,
  `Nuoc` text DEFAULT NULL,
  `slNuoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lichdatsan`
--

INSERT INTO `lichdatsan` (`id`, `TenDN`, `SDT`, `Ngaydat`, `Thoigianbd`, `Thoigiankt`, `Soluong`, `Loaisan`, `Tensan`, `Ghichu`, `Doan`, `sldoan`, `Nuoc`, `slNuoc`) VALUES
(37, 'b', 1234567890, '2023-10-30', '21:36:00.000000', '21:37:00.000000', 10, 'Sân 5 người', 'San A', '', 'Không', 0, 'Không', 0),
(38, 'b', 1234567890, '2023-10-30', '22:06:00.000000', '22:07:00.000000', 10, 'Sân 5 người', 'San A', '', 'Không', 0, 'Không', 0),
(39, 'b', 1234567890, '2023-11-01', '23:28:00.000000', '12:28:00.000000', 10, 'Sân 5 người', 'San A', '', 'Không', 0, 'Không', 0);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `Hovaten` text NOT NULL,
  `SDT` int(50) NOT NULL,
  `TenDN` text NOT NULL,
  `MatKhau` varchar(50) NOT NULL,
  `Cauhoi` text NOT NULL,
  `Traloi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`Hovaten`, `SDT`, `TenDN`, `MatKhau`, `Cauhoi`, `Traloi`) VALUES
('tinto', 1, 'tinto', '123456', 'a', 'a'),
('a', 1, 'b', 'trambeo', 'vippro', '123'),
('a', 1, 'vcl', '456789', 'vippro', '123'),
('TinTo', 1234567890, 'tinvip', '123456', 'vippro', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `danhsachsan`
--
ALTER TABLE `danhsachsan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lichdatsan`
--
ALTER TABLE `lichdatsan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danhsachsan`
--
ALTER TABLE `danhsachsan`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lichdatsan`
--
ALTER TABLE `lichdatsan`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
