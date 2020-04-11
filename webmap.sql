-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Apr 2020 pada 06.09
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webmap`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'fahreza isnanto', 'cungkring.gaming123@gmail.com', 'default.jpg', '$2y$10$xpcP/L3c39hWIn/v7TnDIOrdKFP5SDSJdFpHYPnHsifg3C7ZIb0n6', 2, 1, 1586184808),
(2, 'Zulfikar Isnanto', 'fahezaisnanto@gmail.com', 'default.jpg', '$2y$10$V47qR7EgtrfTdYTZCGxmfuiuAZ/mP4gaBuJpW10iiADSNAjhobbji', 2, 0, 1586187406),
(8, 'Muhammad Zulfikar Isnanto', 'muhammadzi@student.ce.undip.ac.id', 'WIN_20200321_23_36_06_Pro.jpg', '$2y$10$xR4noIDBnKLdwom9dy6xxO1W6fxWGrlprW1nj2gVFiZ51cdpT.qtS', 1, 1, 1586191351),
(10, 'Fahreza Isnanto', 'muhzulisnanto@gmail.com', 'default.jpg', '$2y$10$CPoK9Mctn6FRpHGQMRwE.uJjC1PCfHhNkhDThxcGryPDBUGTGvntG', 2, 1, 1586253562),
(11, 'Zul Member', 'zisnanto@100tahun.id', 'WIN_20200324_23_08_31_Pro.jpg', '$2y$10$wd/o234x0EQ8V0tH./Ot7OVuOFkItohvpkY8x6aP9nwC.WT.hkaRW', 2, 1, 1586262694);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_map`
--

CREATE TABLE `user_map` (
  `id` int(11) NOT NULL,
  `location` varchar(128) NOT NULL,
  `user_send` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_map`
--

INSERT INTO `user_map` (`id`, `location`, `user_send`, `role_id`, `date_created`) VALUES
(8, 'LatLng(-6.982488, 110.425987)', 'muhammadzi@student.ce.undip.ac.id', 1, 1586252882),
(11, 'LatLng(-6.993393, 110.387192)', 'muhammadzi@student.ce.undip.ac.id', 1, 1586253679),
(13, 'LatLng(-7.000889, 110.39835)', 'muhammadzi@student.ce.undip.ac.id', 1, 1586263589),
(14, 'LatLng(-6.984192, 110.4356)', 'muhammadzi@student.ce.undip.ac.id', 1, 1586264603),
(15, 'LatLng(-7.017246, 110.430107)', 'zisnanto@100tahun.id', 2, 1586517162);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 1, 'Role', 'admin/role', 'fas fa-fw fa-user', 1),
(4, 1, 'MAP', 'admin/map', 'fas fa-sw fa-map-marked-alt', 1),
(5, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(6, 2, 'MAP', 'user/map', 'fas fa-sw fa-map-marked-alt', 1),
(7, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(9, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'fahezaisnanto@gmail.com', '0', 1586187406),
(8, 'muhammadzi@student.ce.undip.ac.id', 'EzuRfCRUz04soGc3YbwL6ED6/1OJ7oWxcTHJRged8W8=', 1586193074),
(11, 'muhzulisnanto@gmail.com', 'eHbIf0plJ8NtRtCPBexkga8nhKhxy2fSCTFLFBjnohc=', 1586261184),
(13, 'zisnanto@100tahun.id', 'OFxR+/rpHPlNgpgFOclUIjsbCB8X6tfLYpvLIqpZ97c=', 1586264837);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_map`
--
ALTER TABLE `user_map`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_map`
--
ALTER TABLE `user_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
