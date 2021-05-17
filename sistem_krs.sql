-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2021 at 04:35 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_krs`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` char(12) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `dosen_fak` varchar(50) DEFAULT NULL,
  `dosen_jur` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama`, `jenis_kelamin`, `dosen_fak`, `dosen_jur`) VALUES
('10651010', 'HARDIAN OKTAVIANTO', 'Laki-laki', 'Matematika dan IPA', 'Teknik Informatika'),
('10651015', 'YENI DWI RAHAYU', 'Perempuan', 'Matematika dan IPA', 'Teknik Informatika'),
('10651020', 'VICTOR WAHANGGARA', 'Laki-laki', 'Matematika dan IPA', 'Teknik Informatika'),
('10651025', 'MUDAFIQ RIYAN PRATAMA', 'Laki-laki', 'Matematika dan IPA', 'Teknik Informatika'),
('10651030', 'LUTFI ALI MUHAROM', 'Laki-laki', 'Matematika dan IPA', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_dosen`
--

CREATE TABLE `jadwal_dosen` (
  `id_jd` int(1) NOT NULL,
  `nip` char(12) DEFAULT NULL,
  `kode` char(5) DEFAULT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `ruang` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_dosen`
--

INSERT INTO `jadwal_dosen` (`id_jd`, `nip`, `kode`, `hari`, `jam`, `ruang`) VALUES
(1, '10651010', 'TI003', 'Senin', '08:00:00', 'R207'),
(10, '10651015', 'TI001', 'Selasa', '13:00:00', 'R205');

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `id_krs` int(1) NOT NULL,
  `npm` char(12) DEFAULT NULL,
  `id_jd` int(11) DEFAULT NULL,
  `accept` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`id_krs`, `npm`, `id_jd`, `accept`) VALUES
(1, '140810200033', 1, 1),
(14, '140810200033', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `npm` char(12) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `kelas` char(1) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `thn_akademik` int(4) DEFAULT NULL,
  `semester` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`npm`, `nama`, `fakultas`, `prodi`, `jenis_kelamin`, `kelas`, `alamat`, `thn_akademik`, `semester`) VALUES
('140810200033', 'Rafa Azka Ulinnuha', 'Matematika dan IPA', 'Teknik Informatika', 'Perempuan', 'A', 'Bandung', 2021, 2),
('140810200045', 'Amalia Nur Fitri', 'Matematika dan IPA', 'Teknik Informatika', 'Perempuan', 'A', 'Lampung', 2021, 2),
('140810200047', 'Kharisma Fitri Nurunnisa Siahaan', 'Matematika dan IPA', 'Teknik Informatika', 'Perempuan', 'A', 'Bandung Barat', 2021, 2);

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `kode` char(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `sks` int(1) NOT NULL,
  `semester` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`kode`, `nama`, `sks`, `semester`) VALUES
('TI001', 'Struktur Data', 3, 2),
('TI002', 'Sistem Database', 3, 2),
('TI003', 'Kalkulus II', 3, 2),
('TI004', 'Fisika Informatika', 3, 2),
('TI005', 'Arsitektur dan Organisasi Komputer', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` enum('admin','dosen','mahasiswa') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `status`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(12, 'Rafa Azka Ulinnuha', '140810200033', '681f303f3b9ade008797dcbfaf4231fa', 'mahasiswa'),
(13, 'Amalia Nur Fitri', '140810200045', '37cb11b6cae8bc61085321413f597fa9', 'mahasiswa'),
(14, 'Kharisma Fitri Nurunnisa Siahaan', '140810200047', 'bda9c46db4ade3a968e4be1e8ef56f38', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `jadwal_dosen`
--
ALTER TABLE `jadwal_dosen`
  ADD PRIMARY KEY (`id_jd`),
  ADD KEY `nip` (`nip`),
  ADD KEY `kode` (`kode`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id_krs`),
  ADD KEY `npm` (`npm`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal_dosen`
--
ALTER TABLE `jadwal_dosen`
  MODIFY `id_jd` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `id_krs` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_dosen`
--
ALTER TABLE `jadwal_dosen`
  ADD CONSTRAINT `jadwal_dosen_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`),
  ADD CONSTRAINT `jadwal_dosen_ibfk_2` FOREIGN KEY (`kode`) REFERENCES `mata_kuliah` (`kode`);

--
-- Constraints for table `krs`
--
ALTER TABLE `krs`
  ADD CONSTRAINT `krs_ibfk_3` FOREIGN KEY (`npm`) REFERENCES `mahasiswa` (`NPM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
