-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2020 at 08:27 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `aktivasi` int(11) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `username`, `password`, `email`, `aktivasi`, `nama`, `role`) VALUES
(1, 'admin', '1234', 'priambudi@upi.edu', 1, 'Budi', 1),
(2, 'guru', '1234', 'aang@ui.ac.id', 1, 'Aang', 2),
(3, 'martami', '1234', 'martami@upi.edu', 1, 'Budi Martami', 2);

-- --------------------------------------------------------

--
-- Table structure for table `fase`
--

CREATE TABLE `fase` (
  `id` int(11) NOT NULL,
  `nama_fase` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `urutan_fase` int(11) DEFAULT NULL,
  `lampiran` varchar(255) DEFAULT NULL,
  `waktu_akses` datetime DEFAULT NULL,
  `tenggat` datetime DEFAULT NULL,
  `id_project` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fase`
--

INSERT INTO `fase` (`id`, `nama_fase`, `thumb`, `deskripsi`, `urutan_fase`, `lampiran`, `waktu_akses`, `tenggat`, `id_project`) VALUES
(59, 'Pertanyaan Mendasar', 'pertanyaan.jpg', 'Berisi soal-soal mendasar yang relevan dengan project', 1, NULL, NULL, NULL, 30),
(60, 'ffff', NULL, 'erfecec', 2, NULL, '2020-06-16 22:56:00', '2020-06-19 22:56:00', 30),
(61, 'Pertanyaan Mendasar', 'pertanyaan.jpg', 'Berisi soal-soal mendasar yang relevan dengan project', 1, NULL, NULL, NULL, 31),
(62, 'Test Lagi', 'ddfb6d649396554b1d45185e137a82e5.png', 'sdscsdscsd', 2, 'ddd203cc598cd1612de73ad141a5e22a.docx', '2020-06-17 11:38:00', '2020-06-27 11:38:00', 31),
(63, '', NULL, 'ccxzcz', 3, NULL, '2020-06-18 13:17:00', '2020-06-26 13:17:00', 30);

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_kelompok`
--

CREATE TABLE `jawaban_kelompok` (
  `id` int(11) NOT NULL,
  `id_project` int(11) DEFAULT NULL,
  `id_kelompok` int(11) DEFAULT NULL,
  `id_fase` int(11) DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL,
  `lampiran` varchar(255) DEFAULT NULL,
  `dikirim` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nilai` int(3) DEFAULT NULL,
  `komentar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban_kelompok`
--

INSERT INTO `jawaban_kelompok` (`id`, `id_project`, `id_kelompok`, `id_fase`, `jawaban`, `lampiran`, `dikirim`, `nilai`, `komentar`) VALUES
(4, 30, 41, 60, 'fefeef', NULL, '2020-06-18 02:14:24', 70, 'aqaqq'),
(5, 30, 42, 60, 'ccsdsc', NULL, '2020-06-18 02:22:34', 34, 'ffvd'),
(6, 31, 44, 62, 'testsd', '159f798d0f9e46990549834a067f1b51.png', '2020-06-19 06:15:31', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_pertanyaan`
--

CREATE TABLE `jawaban_pertanyaan` (
  `id` int(11) NOT NULL,
  `jawaban` varchar(255) DEFAULT NULL,
  `id_kelompok` int(11) DEFAULT NULL,
  `id_pertanyaan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban_pertanyaan`
--

INSERT INTO `jawaban_pertanyaan` (`id`, `jawaban`, `id_kelompok`, `id_pertanyaan`) VALUES
(14, 'fd', 41, 34),
(15, 'cdsc', 42, 34),
(16, 'xsxsxs', 44, 35),
(17, 'xsxss', 44, 36);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(255) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `id_guru`) VALUES
(6, 'a1', 2),
(7, 'Test Lagi', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kelompok`
--

CREATE TABLE `kelompok` (
  `id` int(11) NOT NULL,
  `nama_kelompok` varchar(255) DEFAULT NULL,
  `anggota` varchar(255) DEFAULT NULL,
  `id_project` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelompok`
--

INSERT INTO `kelompok` (`id`, `nama_kelompok`, `anggota`, `id_project`, `username`, `password`) VALUES
(41, 'kelompok-1p30', NULL, 30, 'kelompok1p30', 'kelompok1p30'),
(42, 'kelompok-2p30', NULL, 30, 'kelompok2p30', 'kelompok2p30'),
(43, 'kelompok-3p30', NULL, 30, 'kelompok3p30', 'kelompok3p30'),
(44, 'kelompok-1p31', NULL, 31, 'kelompok1p31', 'kelompok1p31'),
(45, 'kelompok-2p31', NULL, 31, 'kelompok2p31', 'kelompok2p31');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id` int(11) NOT NULL,
  `id_project` int(11) DEFAULT NULL,
  `pertanyaan` varchar(255) DEFAULT NULL,
  `set_jawaban` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id`, `id_project`, `pertanyaan`, `set_jawaban`) VALUES
(34, 30, 'sssss', 'ssss'),
(35, 31, 'aaaa?', NULL),
(36, 31, 'cccc?', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `nama_project` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `id_kelas`, `nama_project`, `deskripsi`, `thumb`) VALUES
(30, 6, 'a11', 'a11', NULL),
(31, 7, 'Test 3', 'dcdcd', '5a1ed89522fc1e85fdfbf6cf663925d4.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`) USING BTREE,
  ADD KEY `nama` (`nama`),
  ADD KEY `password` (`password`);

--
-- Indexes for table `fase`
--
ALTER TABLE `fase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_project` (`id_project`);

--
-- Indexes for table `jawaban_kelompok`
--
ALTER TABLE `jawaban_kelompok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fase` (`id_fase`),
  ADD KEY `id_kelompok` (`id_kelompok`),
  ADD KEY `id_project` (`id_project`);

--
-- Indexes for table `jawaban_pertanyaan`
--
ALTER TABLE `jawaban_pertanyaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pertanyaan` (`id_pertanyaan`),
  ADD KEY `id_kelompok` (`id_kelompok`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`) USING BTREE,
  ADD KEY `id_project` (`id_project`),
  ADD KEY `password` (`password`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_project` (`id_project`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_ibfk_1` (`id_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fase`
--
ALTER TABLE `fase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `jawaban_kelompok`
--
ALTER TABLE `jawaban_kelompok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jawaban_pertanyaan`
--
ALTER TABLE `jawaban_pertanyaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fase`
--
ALTER TABLE `fase`
  ADD CONSTRAINT `fase_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jawaban_kelompok`
--
ALTER TABLE `jawaban_kelompok`
  ADD CONSTRAINT `jawaban_kelompok_ibfk_1` FOREIGN KEY (`id_fase`) REFERENCES `fase` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jawaban_kelompok_ibfk_2` FOREIGN KEY (`id_kelompok`) REFERENCES `kelompok` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jawaban_pertanyaan`
--
ALTER TABLE `jawaban_pertanyaan`
  ADD CONSTRAINT `jawaban_pertanyaan_ibfk_1` FOREIGN KEY (`id_pertanyaan`) REFERENCES `pertanyaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jawaban_pertanyaan_ibfk_2` FOREIGN KEY (`id_kelompok`) REFERENCES `kelompok` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD CONSTRAINT `kelompok_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD CONSTRAINT `pertanyaan_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
