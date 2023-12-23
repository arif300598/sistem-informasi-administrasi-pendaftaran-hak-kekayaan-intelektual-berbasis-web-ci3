-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2023 at 04:05 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siap`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_ciptaan`
--

CREATE TABLE `jenis_ciptaan` (
  `id_jenis_ciptaan` int(11) NOT NULL,
  `nama_jenis_ciptaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_ciptaan`
--

INSERT INTO `jenis_ciptaan` (`id_jenis_ciptaan`, `nama_jenis_ciptaan`) VALUES
(1, 'Karya Tulis'),
(2, 'Karya Seni'),
(3, 'Komposisi Musik'),
(4, 'Karya Audio Visual');

-- --------------------------------------------------------

--
-- Table structure for table `tb_akses`
--

CREATE TABLE `tb_akses` (
  `akses_id` int(11) NOT NULL,
  `akses` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_akses`
--

INSERT INTO `tb_akses` (`akses_id`, `akses`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_permohonan`
--

CREATE TABLE `tb_jenis_permohonan` (
  `id_jenis_permohonan` int(11) NOT NULL,
  `nama_jenis_permohonan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jenis_permohonan`
--

INSERT INTO `tb_jenis_permohonan` (`id_jenis_permohonan`, `nama_jenis_permohonan`) VALUES
(1, 'Civitas Akademika Itats ( Dosen dan Mahasiswa)'),
(2, 'UMUM');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemegang_hki`
--

CREATE TABLE `tb_pemegang_hki` (
  `id_pemegang` int(11) NOT NULL,
  `nama_pemegang` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `alamat_pemegang` varchar(225) NOT NULL,
  `kode_pos_pemegang` varchar(11) NOT NULL,
  `kota_pemegang` varchar(255) NOT NULL,
  `provinsi_pemegang` varchar(255) NOT NULL,
  `email_pemegang` varchar(255) NOT NULL,
  `no_tlp_pemegang` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sub_ciptaan`
--

CREATE TABLE `tb_sub_ciptaan` (
  `id_sub` int(11) NOT NULL,
  `nama_sub` varchar(50) NOT NULL,
  `Kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_sub_ciptaan`
--

INSERT INTO `tb_sub_ciptaan` (`id_sub`, `nama_sub`, `Kategori`) VALUES
(1, 'Atlas', 'Karya Seni'),
(2, 'Biografi', 'Karya Tulis'),
(3, 'Buku', 'Karya Tulis'),
(4, 'Buku Pelajaran', 'Karya Tulis'),
(5, 'Buku Saku', 'Karya Tulis'),
(6, 'Bunga Rampai', 'Karya Tulis'),
(7, 'Cerita Bergambar', 'Karya Tulis'),
(8, 'Diktat', 'Karya Tulis'),
(9, 'Dongeng', 'Karya Tulis'),
(10, 'E-Book', 'Karya Tulis'),
(11, 'Ensiklopedia', 'Karya Tulis'),
(12, 'Jurnal', 'Karya Tulis'),
(13, 'Kamus', 'Karya Tulis'),
(14, 'Karya Ilmiah', 'Karya Tulis'),
(15, 'Karya Tulis', 'Karya Tulis'),
(16, 'Karya Tulis (Artikel)', 'Karya Tulis'),
(17, 'Karya Tulis (Disertasi)', 'Karya Tulis'),
(18, 'Karya Tulis (Skripsi)', 'Karya Tulis'),
(19, 'Karya Tulis (Tesis)', 'Karya Tulis'),
(20, 'Karya Tulis Lainnya', 'Karya Tulis'),
(21, 'Komik', 'Karya Tulis'),
(22, 'Laporan Penelitian', 'Karya Tulis'),
(23, 'Majalah', 'Karya Tulis'),
(24, 'Makalah', 'Karya Tulis'),
(25, 'Naskah Drama/Pertunjukan', 'Karya Tulis'),
(26, 'Naskah Film', 'Karya Tulis'),
(27, 'Naskah Karya Siaran', 'Karya Tulis'),
(28, 'Naskah Karya Sinematografi', 'Karya Tulis'),
(29, 'Novel', 'Karya Tulis'),
(30, 'Perwajahan Karya Tulis', 'Karya Tulis'),
(31, 'Proposal Penelitian', 'Karya Tulis'),
(32, 'Puisi', 'Karya Tulis'),
(33, 'Resensi', 'Karya Tulis'),
(34, 'Resume/Ringkasan', 'Karya Tulis'),
(35, 'Saduran', 'Karya Tulis'),
(36, 'Sinopsis', 'Karya Tulis'),
(37, 'Tafsir', 'Karya Tulis'),
(38, 'Terjemahan', 'Karya Tulis'),
(39, 'Alat Peraga', 'Karya Seni'),
(40, 'Arsitektur', 'Karya Seni'),
(41, 'Baliho', 'Karya Seni'),
(42, 'Banner', 'Karya Seni'),
(43, 'Brosur', 'Karya Seni'),
(44, 'Diorama', 'Karya Seni'),
(45, 'Flyer', 'Karya Seni'),
(46, 'Kaligrafi', 'Karya Seni'),
(48, 'Aransemen', 'Komposisi Musik'),
(49, 'Lagu (Musik Dengan Teks)', 'Komposisi Musik'),
(50, 'Musik', 'Komposisi Musik'),
(51, 'Musik Tanpa Teks', 'Komposisi Musik'),
(52, 'Film', 'Karya Audio Visual'),
(53, 'Karya Siaran Media Radio', 'Karya Audio Visual'),
(54, 'Karya Siaran media Televisi', 'Karya Audio Visual'),
(55, 'Karya Siaran Video', 'Karya Audio Visual'),
(56, 'Karya Sinematografi', 'Karya Audio Visual'),
(57, 'Reportase', 'Karya Audio Visual'),
(58, 'Karya Fotografi', 'Karya Fotografi'),
(59, 'Potret', 'Karya Fotografi'),
(60, 'Drama/Pertunjukan', 'Karya Drama dan Koreografi'),
(61, 'Drama Musikan', 'Karya Drama dan Koreografi'),
(62, 'Ketoprak', 'Karya Drama dan Koreografi'),
(63, 'Komedi/Lawak', 'Karya Drama dan Koreografi'),
(64, 'Koreografi', 'Karya Drama dan Koreografi'),
(65, 'Opera', 'Karya Drama dan Koreografi'),
(66, 'Pantomim', 'Karya Drama dan Koreografi'),
(67, 'Pentas Musik', 'Karya Drama dan Koreografi'),
(68, 'Pewayangan', 'Karya Drama dan Koreografi'),
(69, 'Seni Pertunjukan', 'Karya Drama dan Koreografi'),
(70, 'Tari (Sendra Tari)', 'Karya Drama dan Koreografi'),
(71, 'Pidato', 'Karya Rekaman'),
(72, 'Ceramah', 'Karya Rekaman'),
(73, 'Khotbah', 'Karya Rekaman'),
(74, 'Basis Data', 'Lainya'),
(75, 'Kompilasi Ciptaan / Data', 'lainya'),
(76, 'Permainan Video', 'lainya'),
(77, 'Program Komputer', 'lainya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat`
--

CREATE TABLE `tb_surat` (
  `id_surat` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nama_pemegang` varchar(255) NOT NULL,
  `hari_tanggal` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` int(11) NOT NULL,
  `nama_jenis_permohonan` varchar(255) NOT NULL,
  `nama_jenis_ciptaan` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `negara` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `npwp` varchar(255) NOT NULL,
  `ktp` varchar(255) NOT NULL,
  `contoh_ciptaan` varchar(50) NOT NULL,
  `surat_pernyataan` varchar(255) NOT NULL,
  `bukti_pengalihan` varchar(255) NOT NULL,
  `data_pencipta` varchar(255) NOT NULL,
  `contoh_link` varchar(255) NOT NULL,
  `nama_sub` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `akses` int(11) NOT NULL,
  `dibuat` varchar(255) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `jk`, `akses`, `dibuat`, `hp`, `email`) VALUES
(1, 'Super Administrator', 'super admin', '$2y$10$WKER4VHv9Nn9/FqisdoDeeb/c4EUrdOW9zbUMCdu9n2LUpR5jc1S.', 'L', 1, '1589868523', '08990953151', 'administrator@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_ciptaan`
--
ALTER TABLE `jenis_ciptaan`
  ADD PRIMARY KEY (`id_jenis_ciptaan`);

--
-- Indexes for table `tb_akses`
--
ALTER TABLE `tb_akses`
  ADD PRIMARY KEY (`akses_id`);

--
-- Indexes for table `tb_jenis_permohonan`
--
ALTER TABLE `tb_jenis_permohonan`
  ADD PRIMARY KEY (`id_jenis_permohonan`);

--
-- Indexes for table `tb_pemegang_hki`
--
ALTER TABLE `tb_pemegang_hki`
  ADD PRIMARY KEY (`id_pemegang`);

--
-- Indexes for table `tb_sub_ciptaan`
--
ALTER TABLE `tb_sub_ciptaan`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indexes for table `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `akses` (`akses`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_ciptaan`
--
ALTER TABLE `jenis_ciptaan`
  MODIFY `id_jenis_ciptaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_akses`
--
ALTER TABLE `tb_akses`
  MODIFY `akses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_jenis_permohonan`
--
ALTER TABLE `tb_jenis_permohonan`
  MODIFY `id_jenis_permohonan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pemegang_hki`
--
ALTER TABLE `tb_pemegang_hki`
  MODIFY `id_pemegang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `tb_sub_ciptaan`
--
ALTER TABLE `tb_sub_ciptaan`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tb_surat`
--
ALTER TABLE `tb_surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
