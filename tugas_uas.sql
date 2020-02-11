-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2019 at 03:51 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `agenda_id` int(11) NOT NULL,
  `agenda_nama` varchar(200) DEFAULT NULL,
  `agenda_tanggal` varchar(128) DEFAULT NULL,
  `agenda_deskripsi` text,
  `agenda_tempat` varchar(90) DEFAULT NULL,
  `agenda_waktu` varchar(30) DEFAULT NULL,
  `agenda_author` varchar(60) DEFAULT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`agenda_id`, `agenda_nama`, `agenda_tanggal`, `agenda_deskripsi`, `agenda_tempat`, `agenda_waktu`, `agenda_author`, `image`) VALUES
(1, 'Penyembelihan Hewan Kurban Idul Adha 2017', '2017-01-22', 'Idul Adha yang biasa disebut lebaran haji atapun lebaran kurban sangat identik dengan penyembelihan hewan kurban. M-Sekolah tahun ini juga melakukan penyembelihan hewan kurban. Yang rencananya akan dihadiri oleh guru-guru, siswa dan pengurus OSIS.', 'M-Sekolah', '08.00 - 11.00 WIB', 'M Fikri Setiadi', ''),
(2, 'Peluncuran Website Resmi M-Sekolah', '2017-01-22', 'Peluncuran website resmi  M-Sekolah, sebagai media informasi dan akademik online untuk pelayanan pendidikan yang lebih baik kepada siswa, orangtua, dan masyarakat pada umumnya semakin meningkat.', 'M-Sekolah', '07.30 - 12.00 WIB', 'M Fikri Setiadi', ''),
(3, 'Penerimaan Raport Semester Ganjil Tahun Ajaran 2017-2018', '2017-01-22', 'Berakhirnya semester ganjil tahun pelajaran 2016-2017, ditandai dengan pembagian laporan hasil belajar.', 'M-Sekolah', '07.30 - 12.00 WIB', 'M Fikri Setiadi', '');

-- --------------------------------------------------------

--
-- Table structure for table `jadwalkuliah`
--

CREATE TABLE `jadwalkuliah` (
  `kode_mk` int(11) NOT NULL,
  `nama_mk` varchar(128) NOT NULL,
  `sks` int(11) NOT NULL,
  `jam` varchar(128) NOT NULL,
  `hari` varchar(11) NOT NULL,
  `ruangan` varchar(128) NOT NULL,
  `dosen` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwalkuliah`
--

INSERT INTO `jadwalkuliah` (`kode_mk`, `nama_mk`, `sks`, `jam`, `hari`, `ruangan`, `dosen`) VALUES
(240, 'Sistem Informasi Manajemen', 3, '10:00 - 12:30', 'Kamis', '203', 'TAD'),
(328, 'Sistem Operasi', 3, '09:10 - 11:40', 'Rabu', '301', 'AGE'),
(682, 'Web Programming II', 4, '07:30 - 10:50', 'Senin', '504', 'IBA'),
(700, 'Statistika', 3, '07:30 - 10:00', 'Kamis', '203', 'IHS'),
(851, 'Akuntansi Dasar dan Praktik', 3, '10:00 - 12:30', 'Selasa', '301', 'AML'),
(897, 'Metode Perancangan Program', 4, '10:50 - 14:20', 'Senin', '504', 'DWL'),
(916, 'Pemodelan Sistem Berorientasi Objek', 4, '08:20 - 11:40', 'Jumat', '203', 'FHA');

-- --------------------------------------------------------

--
-- Table structure for table `role_id`
--

CREATE TABLE `role_id` (
  `id` int(11) NOT NULL,
  `role_id` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_id`
--

INSERT INTO `role_id` (`id`, `role_id`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(3, 'admin', 'admin@gmail.com', 'img1.jpg', '$2y$10$UOSNBs/1dLFlDMNJToR2neG7OcQlDhC.ROLzpTp/bri39yPb7eoFi', 1, 1, 1575929076),
(7, 'M. Abizar Mulya', 'kumis.macan@gmail.com', 'default.jpg', '$2y$10$/ajxVgnwZlIrgmWtgrklv.1d/.zJYufSt7zON5mn5hbgtMHU2BVFa', 2, 1, 1576402572),
(8, 'Bagus Prasetya', 'giant.extra@gmail.com', 'default.jpg', '$2y$10$pG3sFxlU13ACwB57dPINuOLkVGiwfb/pIXuj2MRf7Ff8FDtCV2cde', 2, 1, 1576402625),
(9, 'Dion Tedison', 'dirty.mind@gmail.com', 'default.jpg', '$2y$10$Cft75pUr4CkqnHR6Za94ou/xCCidb0mAi8mBHABQDt2p6Lth6Q9ce', 2, 1, 1576402694),
(10, 'Aditya Renanda', 'warpsiwa.go@gmail.com', 'default.jpg', '$2y$10$wVZWedLVkAbo7.esDhQak.aGp7I0BZE9lozFcakLzEzN.8nLBZFoi', 2, 1, 1576402747),
(11, 'Irwan Ardiansyah', 'sepuh.legend@gmail.com', 'default.jpg', '$2y$10$llGjSFjC.3L9EqaNISsc5uStmxnmCLzkD4nCpGe6cPSL40JzsrUUO', 2, 1, 1576402805),
(12, 'Ramanda Aji', 'saga.png@gmail.com', 'default.jpg', '$2y$10$djh8yk7y8Dl0.ys65NtXN.cKiCYZitJea0nEmyZ7gTz3pVPv/3LgG', 2, 1, 1576402872),
(13, 'Arya Bagus Saputra', 'tompel.imut@gmail.com', 'default.jpg', '$2y$10$QNqiwT9Fdf5oaAwsk9hD3uB64OnpW2drxG8iQwHnDobCqR9jkg.mS', 2, 1, 1576402961),
(14, 'Diaz Mauludin', 'musangkembang@gmail.com', 'default.jpg', '$2y$10$Bv33BCL05qJKkNob9ANUseUbBmKcoQtunF9mZgdNZU7r2sBaxLZki', 2, 1, 1576403012);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(8, 1, 7),
(9, 2, 7),
(10, 1, 10),
(13, 1, 5),
(17, 2, 11),
(18, 2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(5, 'JadwalAdmin'),
(10, 'Berita'),
(11, 'Beranda'),
(12, 'Jadwal');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My profile', 'user', 'fas fa-fw fa-user', 1),
(4, 3, 'Manajemen Menu', 'menu', 'fas fa-fw fa-folder-plus', 1),
(5, 3, 'Manajemen Submenu', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(8, 5, 'Jadwal Kuliah', 'jadwaladmin', 'fas fa-fw fa-calendar-alt', 1),
(10, 7, 'Berita', 'post', 'fas fa-fw fa-map-pin', 1),
(12, 10, 'Post Berita', 'berita', 'fas fa-map-pin fa-fw', 1),
(13, 3, 'Data User', 'menu/datauser', 'fas fa-fw fa-users', 1),
(14, 11, 'Berita', 'beranda', 'fas fa-fw fa-map-pin', 1),
(15, 5, 'Agenda', 'jadwaladmin/postagenda', 'fas fa-fw fa-map-pin', 1),
(18, 12, 'Jadwal Kuliah', 'jadwal', 'fas fa-fw fa-calendar', 1),
(19, 12, 'Agenda', 'jadwal/agenda', 'fas fa-fw fa-calendar', 1),
(20, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`agenda_id`);

--
-- Indexes for table `jadwalkuliah`
--
ALTER TABLE `jadwalkuliah`
  ADD PRIMARY KEY (`kode_mk`);

--
-- Indexes for table `role_id`
--
ALTER TABLE `role_id`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `agenda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_id`
--
ALTER TABLE `role_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
