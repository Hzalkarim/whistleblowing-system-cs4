-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2020 at 01:10 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `whistleblowing_system_3`
--
CREATE DATABASE IF NOT EXISTS `whistleblowing_system_3` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `whistleblowing_system_3`;

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_pengaduan_count` ()  NO SQL
BEGIN
	SELECT COUNT(`pengaduan`.`id`) as total FROM `pengaduan`;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `basic_pengaduan`
-- (See below for the actual view)
--
CREATE TABLE `basic_pengaduan` (
`id` int(11)
,`nim_mahasiswa` char(10)
,`tanggal_pengaduan` datetime
,`judul` varchar(120)
,`isi` varchar(500)
,`bukti` varchar(255)
,`status` enum('Tertunda','Sedang diproses','Selesai')
,`id_kategori` int(3)
,`privasi_pengadu` enum('Anonim','Sebagai Mahasiswa')
);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(3) NOT NULL,
  `nama` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Layanan Kedisiplinan'),
(2, 'Layanan Perpustakaan'),
(3, 'Layanan Akademik'),
(4, 'Layanan Keuangan'),
(5, 'Layanan Sarana Prasarana');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` char(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kode_prodi` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `user_id`, `kode_prodi`) VALUES
('0000000001', 6207, 'CS'),
('1012101310', 6196, 'TK'),
('1810130002', 6205, 'CS'),
('1810130004', 4431, 'CS'),
('1810130006', 6202, 'CS'),
('5050505050', 2500, 'MS'),
('9999988888', 6212, 'AE');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL,
  `nim_mahasiswa` char(10) DEFAULT NULL,
  `tanggal_pengaduan` datetime NOT NULL DEFAULT current_timestamp(),
  `judul` varchar(120) NOT NULL,
  `isi` varchar(500) NOT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `status` enum('Tertunda','Sedang diproses','Selesai') NOT NULL DEFAULT 'Tertunda',
  `id_kategori` int(3) NOT NULL,
  `privasi_pengadu` enum('Anonim','Sebagai Mahasiswa') NOT NULL DEFAULT 'Sebagai Mahasiswa',
  `deskripsi_tindak_lanjut` varchar(300) DEFAULT NULL,
  `tanggal_tindak_lanjut` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `nim_mahasiswa`, `tanggal_pengaduan`, `judul`, `isi`, `bukti`, `status`, `id_kategori`, `privasi_pengadu`, `deskripsi_tindak_lanjut`, `tanggal_tindak_lanjut`) VALUES
(1, '1810130004', '2020-04-22 20:03:01', 'Tidak tahu', 'Hmmmm Tidak tahu woi', NULL, 'Tertunda', 3, 'Sebagai Mahasiswa', NULL, NULL),
(1246, '1810130004', '2020-04-22 19:58:14', 'Apa ya', 'Hmmm tahu deh', NULL, 'Tertunda', 4, 'Sebagai Mahasiswa', NULL, NULL),
(1248, '1810130004', '2020-04-22 20:04:50', 'Sampaikan salam', 'Saya rindu', NULL, 'Tertunda', 2, 'Anonim', NULL, NULL),
(1249, '5050505050', '2020-04-22 20:23:29', 'Ini Judul', 'Halo', '', 'Sedang diproses', 4, 'Sebagai Mahasiswa', NULL, NULL),
(1250, '5050505050', '2020-04-22 20:24:56', 'Tambahkan Lagi', 'Tidak peduli berapa banyak, yang penting submit', '', 'Selesai', 4, 'Sebagai Mahasiswa', NULL, NULL),
(1251, '5050505050', '2020-04-22 20:35:52', 'asdasdas', 'asdasdasfasf', '', 'Tertunda', 5, 'Sebagai Mahasiswa', NULL, NULL),
(1252, '5050505050', '2020-04-22 20:38:49', 'Ini Judul', 'Apakah akan muncul notifikasi?', '', 'Tertunda', 1, 'Sebagai Mahasiswa', NULL, NULL),
(1253, '5050505050', '2020-04-22 20:39:43', 'Ini Judul', 'Apakah akan muncul notifikasi? lagi', '', 'Sedang diproses', 1, 'Sebagai Mahasiswa', NULL, NULL),
(1254, '5050505050', '2020-04-22 20:40:25', 'Ini Judul', 'Apakah akan muncul notifikasi? lagilagiagiaglsdkam', '', 'Tertunda', 1, 'Sebagai Mahasiswa', NULL, NULL),
(1255, '5050505050', '2020-04-22 20:41:02', 'Ini Judul', 'Apakah akan muncul notifikasi? lagilagiagiaglsdkam', '', 'Tertunda', 1, 'Sebagai Mahasiswa', NULL, NULL),
(1256, '5050505050', '2020-04-22 20:41:26', 'Kita coba lagi', 'Jangan pernah menyerah', '', 'Tertunda', 1, 'Sebagai Mahasiswa', NULL, NULL),
(1257, '5050505050', '2020-04-22 20:41:58', 'Halo', 'Kita makan', '', 'Tertunda', 4, 'Anonim', NULL, NULL),
(1258, '5050505050', '2020-04-22 20:43:32', 'Ini Harusnya bisa', 'Yakin?', '', 'Tertunda', 1, 'Sebagai Mahasiswa', NULL, NULL),
(1259, '5050505050', '2020-04-22 20:49:26', 'sadas', 'akkakakakka', '', 'Tertunda', 5, 'Sebagai Mahasiswa', NULL, NULL),
(1260, '5050505050', '2020-04-23 00:47:22', 'Ini Baru Lagi lho', 'Heheheheh', '', 'Tertunda', 3, 'Sebagai Mahasiswa', NULL, NULL),
(1261, '1810130004', '2020-04-23 00:54:22', 'Cobalah belajar dengan baik', 'Oke siap laksanakan', '', 'Tertunda', 3, 'Anonim', NULL, NULL),
(1262, '1012101310', '2020-04-23 00:57:49', 'Ini Judul', 'Tambahkan pengaduan', '', 'Tertunda', 2, 'Sebagai Mahasiswa', NULL, NULL),
(1263, '5050505050', '2020-04-23 12:20:21', 'Halo', 'Saya ingin bicara', 'BKMS-System.png', 'Tertunda', 4, 'Sebagai Mahasiswa', NULL, NULL),
(1264, '1012101310', '2020-04-23 17:18:20', 'Kita Buat pengaduan baru', 'Jangan kira saya cuma melapor orang lain.\r\nSaya juga suka melapor diri sendiri', 'Contoh Normalisasi.xlsx', 'Tertunda', 5, 'Sebagai Mahasiswa', NULL, NULL),
(1265, '5050505050', '2020-04-23 20:58:59', 'Ini Dari anonim', 'Seandainya saya bisa makan tape', 'Normalization.pdf', 'Tertunda', 2, 'Anonim', NULL, NULL),
(1266, '5050505050', '2020-04-24 08:17:55', 'sadas', 'sdfsfd', '', 'Tertunda', 4, 'Sebagai Mahasiswa', NULL, NULL),
(1269, '1012101310', '2020-04-24 14:16:27', 'Kita Laporkan hasil keuangan', 'Tidak baik', '', 'Tertunda', 2, 'Anonim', NULL, NULL),
(1270, '5050505050', '2020-04-24 15:28:58', 'Ini saya buatkan judul yang mungkin akan sang', 'lihat judul', '', 'Tertunda', 1, 'Sebagai Mahasiswa', NULL, NULL),
(1271, '1012101310', '2020-04-25 00:16:14', 'Kita jumpa lagi', 'Hehehhe', 'Resume Video 23 Maret.docx', 'Tertunda', 4, 'Sebagai Mahasiswa', NULL, NULL),
(1272, '1810130006', '2020-04-26 11:54:45', 'Mau tidur', 'hehe', '', 'Tertunda', 1, 'Sebagai Mahasiswa', NULL, NULL),
(1273, '1012101310', '2020-04-27 15:46:47', 'Ini Judul', 'Siapa ya?', '', 'Tertunda', 4, 'Sebagai Mahasiswa', NULL, NULL),
(1274, '0000000001', '2020-04-28 08:09:05', 'Kebutuhan pertemanan', 'Saya tidak menemukan Mahasiswa Dua', '', 'Tertunda', 5, 'Sebagai Mahasiswa', NULL, NULL),
(1275, '1012101310', '2020-05-03 22:26:22', 'Tambahkan Lagi dan lagi dan lagi', 'Ini', '', 'Tertunda', 5, 'Sebagai Mahasiswa', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penindak_lanjut`
--

CREATE TABLE `penindak_lanjut` (
  `id_pegawai` varchar(12) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bidang` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penindak_lanjut`
--

INSERT INTO `penindak_lanjut` (`id_pegawai`, `user_id`, `bidang`) VALUES
('0001', 6208, 'Saya mengurus Akademika'),
('1203355', 2234, 'Anggota Sarana Prasarana'),
('32546841362', 6210, 'Akadaaaaa'),
('326655990011', 5555, 'Ketua Kedisiplinan'),
('7788997788', 2323, 'Wakil ketua hehe'),
('856422', 6198, 'Ketua Kedisiplinan');

-- --------------------------------------------------------

--
-- Table structure for table `penugasan`
--

CREATE TABLE `penugasan` (
  `user_id_admin` int(11) NOT NULL,
  `id_pegawai` varchar(12) NOT NULL,
  `id_pengaduan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `program_studi`
--

CREATE TABLE `program_studi` (
  `kode` char(2) NOT NULL,
  `nama` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `program_studi`
--

INSERT INTO `program_studi` (`kode`, `nama`) VALUES
('AE', 'Teknik Penerbangan'),
('BM', 'Bisnis Manajemen'),
('CS', 'Ilmu Komputer'),
('IS', 'Sistem Informasi'),
('MS', 'Teknik Mesin'),
('MT', 'Teknik Material'),
('TK', 'Teknik Kimia');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Mahasiswa','Penindak Lanjut','Administrator') DEFAULT NULL,
  `nama` varchar(60) DEFAULT NULL,
  `gender` enum('L','P') DEFAULT 'L',
  `alamat` varchar(100) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`, `nama`, `gender`, `alamat`, `no_telp`) VALUES
(1111, 'admin@admin.c', '$2y$10$1s1Hzujr3rJUUFcbwRRa1OSf0cEjTTucS2uv9QGHOXsnNwvhlnG.y', 'Administrator', 'Admins', '', NULL, NULL),
(2234, 'planjut@sarpras.com', '$2y$10$1s1Hzujr3rJUUFcbwRRa1OSf0cEjTTucS2uv9QGHOXsnNwvhlnG.y', 'Penindak Lanjut', 'PL Sarpras', 'P', 'huhu', '556666'),
(2323, 'planjut@akademik.com', '$2y$10$1s1Hzujr3rJUUFcbwRRa1OSf0cEjTTucS2uv9QGHOXsnNwvhlnG.y', 'Penindak Lanjut', 'Kita Bisa', 'L', 'asfafsasfas', '654313241684'),
(2500, 'kekeke@keke.keke', '$2y$10$1s1Hzujr3rJUUFcbwRRa1OSf0cEjTTucS2uv9QGHOXsnNwvhlnG.y', 'Mahasiswa', 'Saya Mahas', 'L', NULL, NULL),
(4431, 'hafizh.a.k@students.esqbs.ac.id', '$2y$10$1s1Hzujr3rJUUFcbwRRa1OSf0cEjTTucS2uv9QGHOXsnNwvhlnG.y', 'Mahasiswa', 'Hafizh Alkarim', 'L', 'Jalan Sibayak no. 1, Jalan Pol Tangan Raya', '085872702050'),
(5555, 'Huhu@huhu.c', '$2y$10$1s1Hzujr3rJUUFcbwRRa1OSf0cEjTTucS2uv9QGHOXsnNwvhlnG.y', 'Penindak Lanjut', 'Jakarts', 'L', NULL, NULL),
(6196, 'hafizh@gmail.com', '$2y$10$1s1Hzujr3rJUUFcbwRRa1OSf0cEjTTucS2uv9QGHOXsnNwvhlnG.y', 'Mahasiswa', 'huhuhu', 'L', 'kjahsdkjhas', '65432158746984'),
(6198, 'planjut@disiplin.com', '$2y$10$1s1Hzujr3rJUUFcbwRRa1OSf0cEjTTucS2uv9QGHOXsnNwvhlnG.y', 'Penindak Lanjut', 'PL-Kedis', 'L', 'tetap rahasia', '6655333000'),
(6201, 'admin2@admin.com', '$2y$10$1s1Hzujr3rJUUFcbwRRa1OSf0cEjTTucS2uv9QGHOXsnNwvhlnG.y', 'Administrator', 'AdminKe2', 'P', 'Bomat', '123123'),
(6202, 'kikydana@gmail.com', '$2y$10$1s1Hzujr3rJUUFcbwRRa1OSf0cEjTTucS2uv9QGHOXsnNwvhlnG.y', 'Mahasiswa', 'Muhammad Rizky Perdana', 'L', '', ''),
(6205, 'aqillahaya@gmail.com', '$2y$10$1s1Hzujr3rJUUFcbwRRa1OSf0cEjTTucS2uv9QGHOXsnNwvhlnG.y', 'Mahasiswa', 'Aqilla Fadia Haya', 'P', NULL, NULL),
(6207, 'satu@mahasiswa.com', '$2y$10$1s1Hzujr3rJUUFcbwRRa1OSf0cEjTTucS2uv9QGHOXsnNwvhlnG.y', 'Mahasiswa', 'Mahasiswa Satu', 'L', 'rahasia', '1'),
(6208, 'planjutSatu@akademik.com', '$2y$10$1s1Hzujr3rJUUFcbwRRa1OSf0cEjTTucS2uv9QGHOXsnNwvhlnG.y', 'Penindak Lanjut', 'PLanjut Satu Akademik', 'L', 'rahasia', '12'),
(6210, 'planjut2@akademik.com', '$2y$10$1s1Hzujr3rJUUFcbwRRa1OSf0cEjTTucS2uv9QGHOXsnNwvhlnG.y', 'Penindak Lanjut', 'PLanjut keDua akade', 'P', 'Rahasiaaaa', '4455'),
(6211, 'planjut2@disiplin.com', '$2y$10$1s1Hzujr3rJUUFcbwRRa1OSf0cEjTTucS2uv9QGHOXsnNwvhlnG.y', 'Administrator', '', 'L', '', ''),
(6212, 'mahasiswa@tiga.com', '$2y$10$1s1Hzujr3rJUUFcbwRRa1OSf0cEjTTucS2uv9QGHOXsnNwvhlnG.y', 'Mahasiswa', 'Kita Baru Lagi', 'L', 'rahasia', '654654'),
(6213, 'planjut3@akademik.com', '$2y$10$yMuIpkR5nfaipiu1cRKeO.cz9ZNZ8nV/f23AbLLfkWOpUt8XpTkYO', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_mahasiswa`
-- (See below for the actual view)
--
CREATE TABLE `user_mahasiswa` (
`NIM` char(10)
,`nama` varchar(60)
,`kode_prodi` char(2)
);

-- --------------------------------------------------------

--
-- Structure for view `basic_pengaduan`
--
DROP TABLE IF EXISTS `basic_pengaduan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `basic_pengaduan`  AS  select `pengaduan`.`id` AS `id`,`pengaduan`.`nim_mahasiswa` AS `nim_mahasiswa`,`pengaduan`.`tanggal_pengaduan` AS `tanggal_pengaduan`,`pengaduan`.`judul` AS `judul`,`pengaduan`.`isi` AS `isi`,`pengaduan`.`bukti` AS `bukti`,`pengaduan`.`status` AS `status`,`pengaduan`.`id_kategori` AS `id_kategori`,`pengaduan`.`privasi_pengadu` AS `privasi_pengadu` from `pengaduan` ;

-- --------------------------------------------------------

--
-- Structure for view `user_mahasiswa`
--
DROP TABLE IF EXISTS `user_mahasiswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_mahasiswa`  AS  select `mahasiswa`.`nim` AS `NIM`,`user`.`nama` AS `nama`,`mahasiswa`.`kode_prodi` AS `kode_prodi` from (`user` join `mahasiswa` on(`user`.`id` = `mahasiswa`.`user_id`)) order by `mahasiswa`.`nim` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `fk_mahasiswa_user_idx` (`user_id`),
  ADD KEY `fk_mahasiswa_program_studi1_idx` (`kode_prodi`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pengaduan_kategori1_idx` (`id_kategori`),
  ADD KEY `fk_pengaduan_mahasiswa1_idx` (`nim_mahasiswa`);

--
-- Indexes for table `penindak_lanjut`
--
ALTER TABLE `penindak_lanjut`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `fk_penindak_lanjut_user1_idx` (`user_id`);

--
-- Indexes for table `penugasan`
--
ALTER TABLE `penugasan`
  ADD PRIMARY KEY (`user_id_admin`,`id_pegawai`,`id_pengaduan`),
  ADD KEY `fk_penugasan_penindak_lanjut1_idx` (`id_pegawai`),
  ADD KEY `fk_penugasan_pengaduan` (`id_pengaduan`);

--
-- Indexes for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1276;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6214;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `fk_mahasiswa_program_studi1` FOREIGN KEY (`kode_prodi`) REFERENCES `program_studi` (`kode`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mahasiswa_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `fk_pengaduan_kategori1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pengaduan_mahasiswa1` FOREIGN KEY (`nim_mahasiswa`) REFERENCES `mahasiswa` (`nim`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `penindak_lanjut`
--
ALTER TABLE `penindak_lanjut`
  ADD CONSTRAINT `fk_penindak_lanjut_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penugasan`
--
ALTER TABLE `penugasan`
  ADD CONSTRAINT `fk_penugasan_pengaduan` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_penugasan_penindak_lanjut1` FOREIGN KEY (`id_pegawai`) REFERENCES `penindak_lanjut` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_penugasan_user_admin` FOREIGN KEY (`user_id_admin`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
