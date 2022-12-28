-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 01:03 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpakar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(3) NOT NULL,
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gejala`
--

CREATE TABLE `tb_gejala` (
  `id` int(11) NOT NULL,
  `kdgejala` varchar(3) DEFAULT NULL,
  `gejala` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_gejala`
--

INSERT INTO `tb_gejala` (`id`, `kdgejala`, `gejala`) VALUES
(1, 'G1', 'Pendarahan di kaki'),
(2, 'G2', 'Tulang dan paruh lunak'),
(3, 'G3', 'Sempoyongan ketika berjalan'),
(4, 'G4', 'Pembengkakan wajah'),
(5, 'G5', 'Lemah'),
(6, 'G6', 'Produktivitas Menurun Drastis'),
(7, 'G7', 'Terdapat bintil-bintil pada kulit seperti rongga mulut, jengger dan muka'),
(8, 'G8', 'Kulit menjadi kering'),
(9, 'G9', 'Terdapat cairan putih di mata dan paruh'),
(10, 'G10', 'Bersin'),
(11, 'G11', 'Lumpuh pada kaki'),
(12, 'G12', 'Demam'),
(13, 'G13', 'Sesak Nafas/Frekuensi Bernafas Meningkat'),
(14, 'G14', 'Lesu dan Tidak Mau Makan'),
(15, 'G15', 'Berat badan menurun');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyakit`
--

CREATE TABLE `tb_penyakit` (
  `id` int(11) NOT NULL,
  `kdpenyakit` varchar(3) DEFAULT NULL,
  `nama_penyakit` varchar(100) DEFAULT NULL,
  `definisi` text DEFAULT NULL,
  `solusi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_penyakit`
--

INSERT INTO `tb_penyakit` (`id`, `kdpenyakit`, `nama_penyakit`, `definisi`, `solusi`) VALUES
(1, 'P1', 'White Eye (mata putih)', 'Penyakit White Eye (mata putih) merupakan suatu penyakit yang disebabkan oleh virus dimana membuat mata bebek terlihat lebih putih, kotoran berwarna bening, kesulitan bernafas. Pada kasus yang sudah sangat parah, bebek akan menjadi lumpuh hingga akhirnya mati. ', 'pencegahan bisa diberikan antibiotik seperti Oxytetracycline atau chlortetracycline yang dicampurkan bersama air minum atau pakan. Pemberian antibiotik harus disesuaikan dengan dosis yakni 10 gram untuk setiap 100 kg pakan atau 10 gram untuk 40 galon air minum ternak.'),
(2, 'P2', 'Fowl Pox (cacar bebek)', 'Penyakit Fowl Pox (cacar bebek) merupakan penyakit infeksius yang disebabkan ole virus famili Poxviridae dengan genus Avipox virus dan salah satu jenis penyakit yang menyerang unggas salah satu nya adalah bebek', 'Pengobatan yang bisa dilakukan adalah mengelupas benjolan hingga berdarah lalu berikan yodium tingture atau betadine.'),
(3, 'P3', 'Botulism (bakteri)', 'Penyakit Botulism (bakteri) merupakan kondisi dimana bebek terserang racun bakteri clostridium botulinum. Penyakit ini menyerang saraf dan dapat menyebabkan kelumpuhan. Penyakit ini tergolong fatal dan tidak ada obatnya.', 'pisahkan bebek sakit dengan sehat agar tidak menular dan untuk pengobatan tradisional bisa diberikan 1 sendok makan minyak kelapa dan air minum yang bersih yang sekaligus juga menjadi salah satu tips sukses ternak bebek peking.'),
(4, 'P4', 'Coccidiosis (berak darah)', 'Penyakit Coccidiosis (berak darah) merupakan penyakit yang disebabkan oleh protozoa Eimeria sp. Penyebabnya adalah makanan dan minuman yang tercemar protozoa Eimeria sp masuk kedalam tubuh bebek.  Pencemaran makanan dan minuman oleh parasite disebabkan kurang terpeliharanya kebersihan kandang, peralatan pakan, dan air minum.', 'menjaga kebersihan kandang, kelembaban kandang dan juga diberikan antibiotik yang dicampur pada minum atau pakan bebek.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rules`
--

CREATE TABLE `tb_rules` (
  `id_rules` int(11) NOT NULL,
  `id_gejala` int(11) DEFAULT NULL,
  `id_penyakit` int(11) DEFAULT NULL,
  `belief` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_rules`
--

INSERT INTO `tb_rules` (`id_rules`, `id_gejala`, `id_penyakit`, `belief`) VALUES
(1, 1, 3, 0.6),
(2, 2, 4, 0.7),
(3, 3, 2, 0.5),
(4, 4, 3, 0.4),
(5, 5, 3, 0.5),
(6, 6, 3, 0.5),
(7, 7, 1, 0.4),
(8, 8, 1, 0.7),
(9, 9, 1, 0.6),
(10, 10, 1, 0.3),
(11, 11, 1, 0.6),
(12, 12, 2, 0.6),
(13, 13, 2, 0.3),
(14, 14, 2, 0.7),
(15, 15, 4, 0.8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_gejala`
--
ALTER TABLE `tb_gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_rules`
--
ALTER TABLE `tb_rules`
  ADD PRIMARY KEY (`id_rules`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_gejala`
--
ALTER TABLE `tb_gejala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_rules`
--
ALTER TABLE `tb_rules`
  MODIFY `id_rules` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
