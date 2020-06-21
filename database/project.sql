-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2020 at 10:15 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

CREATE TABLE `kursus` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `id_author` varchar(100) NOT NULL,
  `durasi` varchar(100) NOT NULL,
  `deskripsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kursus`
--

INSERT INTO `kursus` (`id`, `name`, `thumbnail`, `id_author`, `durasi`, `deskripsi`) VALUES
(1, 'php', 'php.jpeg', 'ryanapsh', '2 bulan', 'belajar dasar php'),
(2, 'Javascript', 'js.png', 'ryanapsh', '3 bulan', 'Belajar Javascript'),
(3, 'Css', 'css.png', 'ryanapsh', '1 Bulan', 'Belajar Css3'),
(14, 'HTML 5', 'html.png', 'manda', '7 Bulan', 'Belejar Html 5'),
(16, 'JavascripT eS6', 'js.png', 'manda', '2 Bulan', 'penulisan eS6 '),
(18, 'Distro Linux', '5ed5ffb7dc124.jpg', 'manda', '3 Bulan', 'hah'),
(19, 'debian Linux', '5ed5fdfb362b3.jpg', 'aiai', 'hsj', 'hshsh'),
(20, 'Belajar Jquery', '5ee1ca6fb0ba2.png', 'Pratiwi', '9 Bulan', 'Belajar Jquery'),
(21, 'Saass', '5eedbdae3f236.png', 'amanda', '4 bulan', 'Belajar Saas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(15) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`) VALUES
(30, 'ryan', 'ryan@gmail.com', '98765'),
(34, 'joker', 'joker@gmail.com', 'password'),
(35, 'iron man', 'iron@gmail.com', 'password'),
(36, 'fruiet', 'tea@yahoo.com', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kursus`
--
ALTER TABLE `kursus`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
