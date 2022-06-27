-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 27, 2022 at 04:47 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_karyawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_calon_karyawan`
--

CREATE TABLE `data_calon_karyawan` (
  `id` int(11) NOT NULL,
  `namacalon` varchar(50) NOT NULL,
  `IPK` varchar(20) NOT NULL,
  `umur` varchar(20) NOT NULL,
  `pengalamanKerja` varchar(20) NOT NULL,
  `nilaiPsikotest` varchar(20) NOT NULL,
  `nilaiWawancara` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `data_calon_karyawan`
--

INSERT INTO `data_calon_karyawan` (`id`, `namacalon`, `IPK`, `umur`, `pengalamanKerja`, `nilaiPsikotest`, `nilaiWawancara`) VALUES
(1, 'Maimunah', '2.7', '20', '2', '90', '80'),
(2, 'Raudah', '1.8', '27', '1', '30', '90'),
(3, 'Samiun', '1.5', '30', '6', '60', '60'),
(4, 'Boidah', '3.8', '25', '9', '20', '70'),
(5, 'Jamal', '4', '22', '3', '8', '40');

-- --------------------------------------------------------

--
-- Table structure for table `data_kriteria`
--

CREATE TABLE `data_kriteria` (
  `id_kriteria` tinyint(3) UNSIGNED NOT NULL,
  `kode` varchar(5) NOT NULL,
  `kriteria` varchar(100) NOT NULL,
  `type` set('Benefit','Cost') NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `data_kriteria`
--

INSERT INTO `data_kriteria` (`id_kriteria`, `kode`, `kriteria`, `type`, `bobot`) VALUES
(1, 'C1', 'IPK', 'Benefit', 0.2),
(2, 'C2', 'umur', 'Cost', 0.15),
(3, 'C3', 'pengalamanKerja', 'Benefit', 0.3),
(4, 'C4', 'nilaiPsikotest', 'Cost', 0.15),
(5, 'C5', 'Nilai Wawancara', 'Benefit', 0.2);

-- --------------------------------------------------------

--
-- Table structure for table `fuzzytiapkriteria`
--

CREATE TABLE `fuzzytiapkriteria` (
  `id_fuzzykriteria` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `nilai` varchar(5) NOT NULL,
  `bilanganfuzzy` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fuzzytiapkriteria`
--

INSERT INTO `fuzzytiapkriteria` (`id_fuzzykriteria`, `kode`, `nilai`, `bilanganfuzzy`) VALUES
(1, 'SB1', '0', 'Sangat Buruk'),
(2, 'B1', '10', 'Buruk'),
(3, 'C', '20', 'Cukup'),
(4, 'B2', '30', 'Baik'),
(5, 'CB', '40', 'Cukup Baik'),
(6, 'SB2', '50', 'Sangat Baik');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_akhir`
--

CREATE TABLE `hasil_akhir` (
  `id` int(11) NOT NULL,
  `namaCalon` varchar(100) NOT NULL,
  `nilaiMax` varchar(100) NOT NULL,
  `nilaiMin` varchar(100) NOT NULL,
  `nilaiYi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hasil_akhir`
--

INSERT INTO `hasil_akhir` (`id`, `namaCalon`, `nilaiMax`, `nilaiMin`, `nilaiYi`) VALUES
(1, 'Maimunah', '0.25300731030138', '0.17484539338956', '0.078161916911816'),
(2, 'Raudah', '0.21372303491378', '0.11596454813675', '0.097758486777033'),
(3, 'Samiun', '0.27748751329929', '0.090118410248098', '0.18736910305119'),
(4, 'Boidah', '0.40038678191516', '0.13259625927289', '0.26779052264227'),
(5, 'Jamal', '0.30399110453379', '0.093941409893971', '0.21004969463982');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_alternatif`
--

CREATE TABLE `hasil_alternatif` (
  `id_alternatif` tinyint(3) NOT NULL,
  `id_calon` int(11) NOT NULL,
  `alternatif` varchar(50) NOT NULL,
  `IPK` float NOT NULL,
  `umur` float NOT NULL,
  `pengalamanKerja` float NOT NULL,
  `nilaiPsikotest` float NOT NULL,
  `nilaiWawancara` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `hasil_alternatif`
--

INSERT INTO `hasil_alternatif` (`id_alternatif`, `id_calon`, `alternatif`, `IPK`, `umur`, `pengalamanKerja`, `nilaiPsikotest`, `nilaiWawancara`) VALUES
(1, 1, 'Maimunah', 0.7, 0.8, 0.4, 100, 0.8),
(2, 2, 'Raudah', 0.2, 0.6, 0.4, 60, 1),
(3, 3, 'Samiun', 0.2, 0.1, 1, 80, 0.6),
(4, 4, 'Boidah', 1, 1, 1, 40, 0.8),
(5, 5, 'Jamal', 1, 0.8, 0.6, 20, 0.6);

-- --------------------------------------------------------

--
-- Table structure for table `kriteriaIPK`
--

CREATE TABLE `kriteriaIPK` (
  `id` int(11) NOT NULL,
  `IPK` varchar(20) NOT NULL,
  `bilanganfuzzy` varchar(15) NOT NULL,
  `nilai` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `kriteriaIPK`
--

INSERT INTO `kriteriaIPK` (`id`, `IPK`, `bilanganfuzzy`, `nilai`) VALUES
(1, '3,5', 'Sangat Baik', '100'),
(2, '3,25', 'Cukup Baik', '80'),
(3, '3,0', 'Baik', '70'),
(4, '2,7', 'Cukup', '50'),
(5, '2', 'Buruk', '20');

-- --------------------------------------------------------

--
-- Table structure for table `kriteriaPengalaman`
--

CREATE TABLE `kriteriaPengalaman` (
  `id` int(11) NOT NULL,
  `lamaKerja` varchar(20) NOT NULL,
  `bilanganfuzzy` varchar(15) NOT NULL,
  `nilai` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `kriteriaPengalaman`
--

INSERT INTO `kriteriaPengalaman` (`id`, `lamaKerja`, `bilanganfuzzy`, `nilai`) VALUES
(1, '6', 'Sangat Baik', '100'),
(2, '4', 'Cukup Baik', '80'),
(3, '3', 'Baik', '60'),
(4, '2', 'Cukup', '40'),
(5, '0', 'Buruk', '10');

-- --------------------------------------------------------

--
-- Table structure for table `kriteriaPsikotest`
--

CREATE TABLE `kriteriaPsikotest` (
  `id` int(11) NOT NULL,
  `jumlahNilai` varchar(20) NOT NULL,
  `bilanganfuzzy` varchar(15) NOT NULL,
  `nilai` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `kriteriaPsikotest`
--

INSERT INTO `kriteriaPsikotest` (`id`, `jumlahNilai`, `bilanganfuzzy`, `nilai`) VALUES
(1, '90', 'Sangat Baik', '100'),
(2, '60', 'Cukup Baik', '80'),
(3, '40', 'Baik', '60'),
(4, '20', 'Cukup', '40'),
(5, '10', 'Buruk', '20');

-- --------------------------------------------------------

--
-- Table structure for table `kriteriaUmur`
--

CREATE TABLE `kriteriaUmur` (
  `id` int(11) NOT NULL,
  `umur` varchar(20) NOT NULL,
  `bilanganfuzzy` varchar(15) NOT NULL,
  `nilai` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `kriteriaUmur`
--

INSERT INTO `kriteriaUmur` (`id`, `umur`, `bilanganfuzzy`, `nilai`) VALUES
(1, '23-25', 'Sangat Baik', '100'),
(2, '20-23', 'Cukup Baik', '80'),
(3, '26-27 ', 'Baik', '60'),
(4, '17-19', 'Cukup', '50'),
(5, '<17 atau >27', 'Buruk', '10');

-- --------------------------------------------------------

--
-- Table structure for table `kriteriaWawancara`
--

CREATE TABLE `kriteriaWawancara` (
  `id` int(11) NOT NULL,
  `jumlahNilai` varchar(20) NOT NULL,
  `bilanganfuzzy` varchar(15) NOT NULL,
  `nilai` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `kriteriaWawancara`
--

INSERT INTO `kriteriaWawancara` (`id`, `jumlahNilai`, `bilanganfuzzy`, `nilai`) VALUES
(1, '100', 'Sangat Baik', '100'),
(2, '80', 'Cukup Baik', '80'),
(3, '60', 'Baik', '60'),
(4, '30', 'Cukup', '40'),
(5, '10', 'Buruk', '10');

-- --------------------------------------------------------

--
-- Table structure for table `log_admin`
--

CREATE TABLE `log_admin` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_admin`
--

INSERT INTO `log_admin` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_calon_karyawan`
--
ALTER TABLE `data_calon_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_kriteria`
--
ALTER TABLE `data_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `fuzzytiapkriteria`
--
ALTER TABLE `fuzzytiapkriteria`
  ADD PRIMARY KEY (`id_fuzzykriteria`);

--
-- Indexes for table `hasil_akhir`
--
ALTER TABLE `hasil_akhir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_alternatif`
--
ALTER TABLE `hasil_alternatif`
  ADD PRIMARY KEY (`id_alternatif`),
  ADD KEY `id_alat` (`id_calon`);

--
-- Indexes for table `kriteriaIPK`
--
ALTER TABLE `kriteriaIPK`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteriaPengalaman`
--
ALTER TABLE `kriteriaPengalaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteriaPsikotest`
--
ALTER TABLE `kriteriaPsikotest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteriaUmur`
--
ALTER TABLE `kriteriaUmur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteriaWawancara`
--
ALTER TABLE `kriteriaWawancara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_admin`
--
ALTER TABLE `log_admin`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_kriteria`
--
ALTER TABLE `data_kriteria`
  MODIFY `id_kriteria` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fuzzytiapkriteria`
--
ALTER TABLE `fuzzytiapkriteria`
  MODIFY `id_fuzzykriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hasil_akhir`
--
ALTER TABLE `hasil_akhir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kriteriaIPK`
--
ALTER TABLE `kriteriaIPK`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kriteriaPengalaman`
--
ALTER TABLE `kriteriaPengalaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kriteriaPsikotest`
--
ALTER TABLE `kriteriaPsikotest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kriteriaUmur`
--
ALTER TABLE `kriteriaUmur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kriteriaWawancara`
--
ALTER TABLE `kriteriaWawancara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log_admin`
--
ALTER TABLE `log_admin`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil_alternatif`
--
ALTER TABLE `hasil_alternatif`
  ADD CONSTRAINT `hasil_alternatif_ibfk_1` FOREIGN KEY (`id_calon`) REFERENCES `data_calon_karyawan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
