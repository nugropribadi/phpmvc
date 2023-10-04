-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2023 at 04:54 AM
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
-- Database: `sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_guru`
--

CREATE TABLE `t_guru` (
  `f_idguru` int(11) NOT NULL,
  `f_nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_guru`
--

INSERT INTO `t_guru` (`f_idguru`, `f_nama`) VALUES
(1, 'Henny Susilowati'),
(2, 'Jumanta Hamdayama'),
(3, 'Tri Indriani Parno Widodo');

-- --------------------------------------------------------

--
-- Table structure for table `t_jurusan`
--

CREATE TABLE `t_jurusan` (
  `f_idjurusan` int(11) NOT NULL,
  `f_nama` varchar(25) NOT NULL,
  `f_deskripsi` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_jurusan`
--

INSERT INTO `t_jurusan` (`f_idjurusan`, `f_nama`, `f_deskripsi`) VALUES
(1, 'Akuntansi', 'Akuntansi adalah jurusan yang mempelajari tentang membuat laporan keuangan baik untuk perusahaan ataupun lembaga pemerintah.'),
(2, 'Manajemen Perkantoran', 'Manajemen perkantoran merupakan bagian dari manajemen yang memberikan informasi layanan bidang administrasi yang diperlukan untuk melaksanakan kegiatan secara efektif dan memberi dampak kelancaran pada bidang lainnya'),
(3, 'Bisnis Ritel', 'Bisnis ritel adalah aktivitas penjualan atau penawaran barang dan jasa secara langsung kepada konsumen akhir'),
(4, 'Desain Komunikasi Visual', 'Desain Komunikasi Visual (DKV) mempelajari ilmu tentang penyampaian pesan (komunikasi) dengan menggunakan elemen-elemen visual atau rupa'),
(5, 'Rekayasa Perangkat lunak', 'Rekayasa Perangkat Lunak adalah sebuah jurusan yang mempelajari dan mendalami semua cara-cara pengembangan perangkat lunak termasuk pembuatan, pemeliharaan, manajemen organisasi pengembangan perangkat lunak dan manajemen kualitas.');

-- --------------------------------------------------------

--
-- Table structure for table `t_kelas`
--

CREATE TABLE `t_kelas` (
  `f_idkelas` int(11) NOT NULL,
  `f_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_kelas`
--

INSERT INTO `t_kelas` (`f_idkelas`, `f_nama`) VALUES
(1, 'X'),
(2, 'XI'),
(3, 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `t_siswa`
--

CREATE TABLE `t_siswa` (
  `f_idsiswa` int(11) NOT NULL,
  `f_nama` varchar(50) NOT NULL,
  `f_idkelas` int(11) NOT NULL,
  `f_idjurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_siswa`
--

INSERT INTO `t_siswa` (`f_idsiswa`, `f_nama`, `f_idkelas`, `f_idjurusan`) VALUES
(2, 'Afdhika Baru Lagi', 2, 4),
(4, 'Michael', 2, 5),
(8, 'Sabrina', 2, 5),
(9, 'Andi', 1, 1),
(10, 'Bandi', 2, 2),
(11, 'Candra', 3, 3),
(12, 'Danang', 1, 2),
(13, 'Endang', 1, 3),
(14, 'Fani', 1, 4),
(15, 'Budi', 1, 1),
(17, 'Zaky', 1, 1),
(26, 'Zainal', 1, 2),
(27, 'andhika', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_guru`
--
ALTER TABLE `t_guru`
  ADD PRIMARY KEY (`f_idguru`);

--
-- Indexes for table `t_jurusan`
--
ALTER TABLE `t_jurusan`
  ADD PRIMARY KEY (`f_idjurusan`);

--
-- Indexes for table `t_kelas`
--
ALTER TABLE `t_kelas`
  ADD PRIMARY KEY (`f_idkelas`);

--
-- Indexes for table `t_siswa`
--
ALTER TABLE `t_siswa`
  ADD PRIMARY KEY (`f_idsiswa`),
  ADD KEY `f_idkelas` (`f_idkelas`),
  ADD KEY `f_idjurusan` (`f_idjurusan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_guru`
--
ALTER TABLE `t_guru`
  MODIFY `f_idguru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_jurusan`
--
ALTER TABLE `t_jurusan`
  MODIFY `f_idjurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_kelas`
--
ALTER TABLE `t_kelas`
  MODIFY `f_idkelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_siswa`
--
ALTER TABLE `t_siswa`
  MODIFY `f_idsiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_siswa`
--
ALTER TABLE `t_siswa`
  ADD CONSTRAINT `t_siswa_ibfk_1` FOREIGN KEY (`f_idkelas`) REFERENCES `t_kelas` (`f_idkelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_siswa_ibfk_2` FOREIGN KEY (`f_idjurusan`) REFERENCES `t_jurusan` (`f_idjurusan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
