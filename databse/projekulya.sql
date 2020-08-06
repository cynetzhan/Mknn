-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Agu 2020 pada 18.46
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekulya`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `testing`
--

CREATE TABLE `testing` (
  `id_test` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jenkel` enum('laki-laki','perempuan') NOT NULL,
  `rapor_ind` int(5) NOT NULL,
  `usbn_ind` int(5) NOT NULL,
  `rapor_ing` int(5) NOT NULL,
  `usbn_ing` int(5) NOT NULL,
  `rapor_mtk` int(5) NOT NULL,
  `usbn_mtk` int(5) NOT NULL,
  `rapor_ipa` int(5) NOT NULL,
  `usbn_ipa` int(5) NOT NULL,
  `minat` enum('MIPA','IPS') NOT NULL,
  `nilai_iq` int(5) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `prediksi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `testing`
--

INSERT INTO `testing` (`id_test`, `nis`, `nama_siswa`, `jenkel`, `rapor_ind`, `usbn_ind`, `rapor_ing`, `usbn_ing`, `rapor_mtk`, `usbn_mtk`, `rapor_ipa`, `usbn_ipa`, `minat`, `nilai_iq`, `kelas`, `prediksi`) VALUES
(1, '8276446', 'aqua man', 'laki-laki', 80, 80, 80, 80, 80, 80, 80, 80, 'MIPA', 100, 'IPS', 'MIPA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `training`
--

CREATE TABLE `training` (
  `id_train` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jenkel` enum('laki-laki','perempuan') NOT NULL,
  `rapor_ind` int(5) NOT NULL,
  `usbn_ind` int(5) NOT NULL,
  `rapor_ing` int(5) NOT NULL,
  `usbn_ing` int(5) NOT NULL,
  `rapor_mtk` int(5) NOT NULL,
  `usbn_mtk` int(5) NOT NULL,
  `rapor_ipa` int(5) NOT NULL,
  `usbn_ipa` int(5) NOT NULL,
  `minat` enum('MIPA','IPS') NOT NULL,
  `nilai_iq` int(5) NOT NULL,
  `kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `training`
--

INSERT INTO `training` (`id_train`, `nis`, `nama_siswa`, `jenkel`, `rapor_ind`, `usbn_ind`, `rapor_ing`, `usbn_ing`, `rapor_mtk`, `usbn_mtk`, `rapor_ipa`, `usbn_ipa`, `minat`, `nilai_iq`, `kelas`) VALUES
(1, '8276446', 'Siska Kalia', 'perempuan', 85, 90, 80, 85, 80, 85, 90, 95, 'MIPA', 90, 'MIPA'),
(21, '1234567890', 'vinci x carbon 70 w', 'laki-laki', 90, 95, 98, 95, 89, 85, 88, 88, 'MIPA', 105, 'ips'),
(23, '8895876655', 'Anos vilgead', 'laki-laki', 96, 90, 90, 95, 90, 98, 90, 90, 'MIPA', 120, 'MIPA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_u` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(254) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `devisi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_u`, `username`, `password`, `nama`, `devisi`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'Staff Administrator');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `testing`
--
ALTER TABLE `testing`
  ADD PRIMARY KEY (`id_test`);

--
-- Indeks untuk tabel `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id_train`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `testing`
--
ALTER TABLE `testing`
  MODIFY `id_test` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `training`
--
ALTER TABLE `training`
  MODIFY `id_train` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
