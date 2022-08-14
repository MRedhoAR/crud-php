-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Mar 2021 pada 17.53
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdasar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_induk` char(5) NOT NULL,
  `bidang` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `no_induk`, `bidang`, `email`, `gambar`) VALUES
(1, 'Redho', '06929', 'Manajer', 'redho@gmail.com', 'redho.png'),
(2, 'arif', '06930', 'hrd', 'arif@gmail.com', 'arif.png'),
(3, 'qatrin', '06931', 'desainer', 'qatrin@gmail.com', 'qatrin.png'),
(4, 'nur', '06932', 'admin', 'nur@gmail.com', 'nur.png'),
(13, 'Faizzah', '06933', 'sales', 'faizzah@email.com', '6030dc01a9256.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'redho', '$2y$10$IgKLnjHNTRptyt2H6LEche43S.MLwPaqrLGG.WJKyj409Cn6w0IG.'),
(2, 'admin', '$2y$10$eTpJRAIs/reMIvU.BXKNJulOgSuvRl/3QvXOPh0z4WDKVnwmeSWn6');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
