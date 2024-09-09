-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 02, 2024 at 10:56 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_rifo`
--

-- --------------------------------------------------------

--
-- Table structure for table `indikator`
--

CREATE TABLE `indikator` (
  `id_indikator` int NOT NULL,
  `kode_kriteria` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `kode_indikator` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_indikator` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `simpan_indikator` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `indikator`
--

INSERT INTO `indikator` (`id_indikator`, `kode_kriteria`, `kode_indikator`, `nama_indikator`, `simpan_indikator`) VALUES
(2, 'KD1', 'A1', 'Mengenali Karakteristik Murid', '2024-06-02 17:20:25'),
(3, 'KD1', 'A2', 'Menguasai Teori Belajar', '2024-06-02 17:20:31'),
(4, 'KD1', 'A3', 'Pengembangan Pembelajaran Yang Mendidik', '2024-06-02 17:20:38'),
(5, 'KD1', 'A4', 'Komunikasi Dengan Peserta Didik', '2024-06-02 17:20:44'),
(6, 'KD2', 'B2', 'Penguasaan Materi Pembelajaran', '2024-06-02 17:21:02'),
(7, 'KD2', 'B1', 'Mengembangkan Keprofesionalan Melalui Tindakan Yang Reaktif', '2024-06-02 17:20:51'),
(8, 'KD3', 'C1', 'Bersikap Inklusif, Obyektif dan Tidak Diskriminatif', '2024-06-02 17:21:14'),
(9, 'KD3', 'C2', 'Komunikasi Sesama Guru, Tenaga Pendidikan, Orang Tua, dan Peserta Didik', '2024-06-02 17:21:24'),
(10, 'KD4', 'D1', 'Bertindak Sesuai Norma Agama, Hukum,  Sosial, dan Kebudayaan Nasional', '2024-06-02 17:21:33'),
(11, 'KD4', 'D2', 'Menunjukan Pribadi Yang Dewasa dan Teladan', '2024-06-02 17:21:38'),
(12, 'KD4', 'D3', 'Etos Kerja, Tanggung Jawab Yang TInggi dan Rasa Bangga Menjadi Guru ', '2024-06-02 17:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `id_indikator` int NOT NULL,
  `nama_kategori` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `nilai` int NOT NULL,
  `simpan_kategori` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `id_indikator`, `nama_kategori`, `nilai`, `simpan_kategori`) VALUES
(1, 3, 'Sangat Baik', 5, '2024-06-02 16:07:17'),
(2, 3, 'Baik', 4, '2024-06-02 16:09:03'),
(3, 3, 'Cukup', 3, '2024-06-02 16:10:27'),
(4, 3, 'Kurang', 2, '2024-06-02 16:10:33'),
(5, 3, 'Sangat Kurang', 1, '2024-06-02 16:11:04'),
(6, 2, 'Sangat Baik', 5, '2024-06-02 16:11:22'),
(7, 2, 'Baik', 4, '2024-06-02 16:11:32'),
(8, 2, 'Cukup', 3, '2024-06-02 16:11:40'),
(9, 2, 'Kurang', 2, '2024-06-02 16:11:45'),
(11, 2, 'Sangat Kurang', 1, '2024-06-02 16:17:59'),
(12, 4, 'Sangat Baik', 5, '2024-06-02 16:29:14'),
(13, 4, 'Baik', 4, '2024-06-02 16:29:25'),
(14, 4, 'Cukup', 3, '2024-06-02 16:29:34'),
(15, 4, 'Kurang', 2, '2024-06-02 16:29:44'),
(16, 4, 'Sangat Kurang', 1, '2024-06-02 16:29:52'),
(17, 5, 'Sangat Baik', 5, '2024-06-02 16:32:40'),
(18, 5, 'Baik', 4, '2024-06-02 16:33:01'),
(19, 5, 'Cukup', 3, '2024-06-02 16:33:12'),
(20, 5, 'Kurang', 2, '2024-06-02 16:33:18'),
(21, 5, 'Sangat Kurang', 1, '2024-06-02 16:33:24'),
(22, 7, 'Sangat Baik', 5, '2024-06-02 16:34:06'),
(23, 7, 'Baik', 4, '2024-06-02 16:34:11'),
(24, 7, 'Cukup', 3, '2024-06-02 16:34:16'),
(25, 7, 'Kurang', 2, '2024-06-02 16:34:21'),
(26, 7, 'Sangat Kurang', 1, '2024-06-02 16:34:25'),
(27, 6, 'Sangat Baik', 5, '2024-06-02 16:34:51'),
(28, 6, 'Baik', 4, '2024-06-02 16:34:55'),
(29, 6, 'Cukup', 3, '2024-06-02 16:35:01'),
(30, 6, 'Kurang', 2, '2024-06-02 16:35:26'),
(31, 6, 'Sangat Kurang', 1, '2024-06-02 16:35:32'),
(32, 8, 'Sangat Baik', 5, '2024-06-02 16:35:43'),
(33, 8, 'Baik', 4, '2024-06-02 16:35:48'),
(34, 8, 'Cukup', 3, '2024-06-02 16:35:54'),
(35, 8, 'Kurang', 2, '2024-06-02 16:36:03'),
(36, 8, 'Sangat Kurang', 1, '2024-06-02 16:36:11'),
(37, 9, 'Sangat Baik', 5, '2024-06-02 16:38:15'),
(38, 9, 'Baik', 4, '2024-06-02 16:38:21'),
(39, 9, 'Cukup', 3, '2024-06-02 16:38:38'),
(40, 9, 'Kurang', 2, '2024-06-02 16:39:01'),
(41, 9, 'Sangat Kurang', 1, '2024-06-02 16:39:09'),
(42, 10, 'Sangat Baik', 5, '2024-06-02 16:39:20'),
(43, 10, 'Baik', 4, '2024-06-02 16:39:36'),
(44, 10, 'Cukup', 3, '2024-06-02 16:39:41'),
(45, 10, 'Kurang', 2, '2024-06-02 16:39:47'),
(46, 10, 'Sangat Kurang', 1, '2024-06-02 16:39:52'),
(47, 11, 'Sangat Baik', 5, '2024-06-02 16:42:41'),
(48, 11, 'Baik', 4, '2024-06-02 16:42:45'),
(49, 11, 'Cukup', 3, '2024-06-02 16:42:50'),
(50, 11, 'Kurang', 2, '2024-06-02 16:42:55'),
(51, 11, 'Sangat Kurang', 1, '2024-06-02 16:43:01'),
(52, 12, 'Sangat Baik', 5, '2024-06-02 16:43:11'),
(53, 12, 'Baik', 4, '2024-06-02 16:43:16'),
(54, 12, 'Cukup', 3, '2024-06-02 16:43:22'),
(55, 12, 'Kurang', 2, '2024-06-02 16:43:27'),
(56, 12, 'Sangat Kurang', 1, '2024-06-02 16:43:33');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int NOT NULL,
  `kode_kriteria` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_kriteria` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `simpan_kriteria` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`, `simpan_kriteria`) VALUES
(3, 'KD1', 'PEDAGOGIK', '2024-06-02 15:34:28'),
(4, 'KD2', 'PROFESIONAL', '2024-06-02 15:34:41'),
(5, 'KD3', 'SOSIAL', '2024-06-02 15:34:57'),
(6, 'KD4', 'INDIVIDUAL', '2024-06-02 15:35:06');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nip` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_pengguna` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `jabatan` enum('Kepala','Operator','Guru') COLLATE utf8mb4_general_ci NOT NULL,
  `simpan_pengguna` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `nip`, `nama_pengguna`, `jabatan`, `simpan_pengguna`) VALUES
(1, 'admin', 'admin', '-', 'Lastari Mairani, A.Md', 'Operator', '2024-06-06 10:00:05'),
(3, 'syabrina', 'root', '198106242014062004', 'Syabrina Yunera, S.Pd', 'Kepala', '2024-06-06 10:00:18'),
(8, 'ratna', 'root', '196412161988022002', 'Ratna Helmi, S.Pd', 'Guru', '2024-06-06 10:01:31'),
(9, 'yurni', 'root', '196509121986032002', 'Yurni S.Pd', 'Guru', '2024-06-06 10:02:05'),
(10, 'warni', 'root', '196507091988022002', 'Miswarni, S.Pd', 'Guru', '2024-06-06 10:03:20'),
(11, 'johan', 'root', '196803082008011001', 'Marjoan, S.Pd.I', 'Guru', '2024-06-06 10:07:20'),
(12, 'marnis', 'root', '197611282007012002', 'Zalmarnis, S.Pd.I', 'Guru', '2024-06-06 10:08:40'),
(13, 'ramius', 'root', '196603272008011001', 'Ramius', 'Guru', '2024-06-06 10:08:00'),
(14, 'radia', 'root', '-', 'Radia Nisma, S.Pd', 'Guru', '2024-06-06 10:08:24'),
(15, 'sisri', 'root', '-', 'Sisri Yulianti, S.Pd', 'Guru', '2024-06-06 10:09:18'),
(16, 'nengla', 'root', '-', 'Nengla Harinanda, S.Pd', 'Guru', '2024-06-06 10:09:51'),
(17, 'yasri', 'root', '-', 'Yasri Fitriani, S.Pd', 'Guru', '2024-06-06 10:10:19');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int NOT NULL,
  `id_pengguna` int NOT NULL,
  `id_kriteria` int NOT NULL,
  `id_indikator` int NOT NULL,
  `id_kategori` int NOT NULL,
  `semester` int NOT NULL,
  `periode` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `simpan_penilaian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_pengguna`, `id_kriteria`, `id_indikator`, `id_kategori`, `semester`, `periode`, `simpan_penilaian`) VALUES
(38, 8, 3, 2, 6, 1, '2024/2025', '2024-06-06 10:13:15'),
(39, 8, 3, 3, 2, 1, '2024/2025', '2024-06-06 10:13:15'),
(40, 8, 3, 4, 14, 1, '2024/2025', '2024-06-06 10:13:15'),
(41, 8, 3, 5, 18, 1, '2024/2025', '2024-06-06 10:13:15'),
(42, 17, 3, 2, 6, 2, '2023/2024', '2024-06-16 06:46:19'),
(43, 17, 3, 3, 2, 2, '2023/2024', '2024-06-16 06:46:19'),
(44, 17, 3, 4, 14, 2, '2023/2024', '2024-06-16 06:46:19'),
(45, 17, 3, 5, 18, 2, '2023/2024', '2024-06-16 06:46:19'),
(46, 17, 4, 6, 28, 2, '2023/2024', '2024-06-16 06:47:02'),
(47, 17, 4, 7, 24, 2, '2023/2024', '2024-06-16 06:47:02'),
(48, 17, 5, 8, 33, 2, '2023/2024', '2024-06-16 06:47:21'),
(49, 17, 5, 9, 37, 2, '2023/2024', '2024-06-16 06:47:21'),
(50, 17, 6, 10, 43, 2, '2023/2024', '2024-06-16 06:47:43'),
(51, 17, 6, 11, 48, 2, '2023/2024', '2024-06-16 06:47:43'),
(52, 17, 6, 12, 54, 2, '2023/2024', '2024-06-16 06:47:43'),
(53, 11, 3, 2, 7, 1, '2023/2024', '2024-07-02 10:07:43'),
(54, 11, 3, 3, 1, 1, '2023/2024', '2024-07-02 10:07:43'),
(55, 11, 3, 4, 12, 1, '2023/2024', '2024-07-02 10:07:43'),
(56, 11, 3, 5, 18, 1, '2023/2024', '2024-07-02 10:07:43'),
(57, 11, 4, 6, 27, 1, '2023/2024', '2024-07-02 10:08:49'),
(58, 11, 4, 7, 22, 1, '2023/2024', '2024-07-02 10:08:49'),
(59, 11, 5, 8, 33, 1, '2023/2024', '2024-07-02 10:09:06'),
(60, 11, 5, 9, 38, 1, '2023/2024', '2024-07-02 10:09:06'),
(61, 11, 6, 10, 43, 1, '2023/2024', '2024-07-02 10:09:24'),
(62, 11, 6, 11, 47, 1, '2023/2024', '2024-07-02 10:09:24'),
(63, 11, 6, 12, 53, 1, '2023/2024', '2024-07-02 10:09:24'),
(64, 8, 3, 2, 6, 1, '2023/2024', '2024-07-02 10:21:28'),
(65, 8, 3, 3, 2, 1, '2023/2024', '2024-07-02 10:21:28'),
(66, 8, 3, 4, 13, 1, '2023/2024', '2024-07-02 10:21:28'),
(67, 8, 3, 5, 17, 1, '2023/2024', '2024-07-02 10:21:28'),
(68, 8, 4, 6, 28, 1, '2023/2024', '2024-07-02 10:21:49'),
(69, 8, 4, 7, 22, 1, '2023/2024', '2024-07-02 10:21:49'),
(70, 8, 5, 8, 33, 1, '2023/2024', '2024-07-02 10:23:01'),
(71, 8, 5, 9, 37, 1, '2023/2024', '2024-07-02 10:23:01'),
(72, 8, 6, 10, 42, 1, '2023/2024', '2024-07-02 10:23:39'),
(73, 8, 6, 11, 48, 1, '2023/2024', '2024-07-02 10:23:39'),
(74, 8, 6, 12, 52, 1, '2023/2024', '2024-07-02 10:23:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `indikator`
--
ALTER TABLE `indikator`
  ADD PRIMARY KEY (`id_indikator`),
  ADD UNIQUE KEY `kode_indikator` (`kode_indikator`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`),
  ADD UNIQUE KEY `kode` (`kode_kriteria`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `indikator`
--
ALTER TABLE `indikator`
  MODIFY `id_indikator` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
