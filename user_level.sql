-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Sep 2021 pada 03.28
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_level`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `suratkeluar`
--

CREATE TABLE `suratkeluar` (
  `id` int(11) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `file_suratkeluar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `suratkeluar`
--

INSERT INTO `suratkeluar` (`id`, `nomor_surat`, `tanggal_keluar`, `perihal`, `file_suratkeluar`) VALUES
(3, '748892uujd9902', '2021-09-27', 'malger', 'suratkeluar-20210927111116.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suratmasuk`
--

CREATE TABLE `suratmasuk` (
  `id` int(11) NOT NULL,
  `pengirim` varchar(100) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `file_suratmasuk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `suratmasuk`
--

INSERT INTO `suratmasuk` (`id`, `pengirim`, `tanggal_masuk`, `nomor_surat`, `perihal`, `unit`, `file_suratmasuk`) VALUES
(47, 'vs', '2021-09-27', '342', 'malger', '1', 'suratmasuk-20210927101932.pdf'),
(48, 'ujicoba', '2021-09-27', '889900okl90', 'klohi', '1,2', 'suratmasuk-20210927113308.pdf'),
(49, 'pmencoba', '2021-09-27', '342', 'bismillah', '1,2', 'suratmasuk-20210927121316.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `unit`
--

INSERT INTO `unit` (`id`, `nama`) VALUES
(1, 'Direktur'),
(2, 'Umum'),
(3, 'Pelayanan'),
(4, 'SDM'),
(5, 'Diklat'),
(6, 'Keuangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL,
  `id_unit` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`, `id_unit`) VALUES
(1, 'Hafidz', 'admin', 'admin', 'admin', 0),
(2, 'Unyuk', 'pegawai', 'pegawai', 'pegawai', 1),
(3, 'dino', 'umum', 'umum', 'pegawai', 2),
(7, 'orang1', 'pelayanan', 'pelayanan', 'pegawai', 3),
(8, 'orang2', 'sdm', 'sdm', 'pegawai', 4),
(9, 'orang3', 'diklat', 'diklat', 'pegawai', 5),
(10, 'orang4', 'keuangan', 'keuangan', 'pegawai', 6);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `suratkeluar`
--
ALTER TABLE `suratkeluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `suratmasuk`
--
ALTER TABLE `suratmasuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `unit`
--
ALTER TABLE `unit`
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
-- AUTO_INCREMENT untuk tabel `suratkeluar`
--
ALTER TABLE `suratkeluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `suratmasuk`
--
ALTER TABLE `suratmasuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
