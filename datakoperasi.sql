-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Bulan Mei 2023 pada 01.39
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datakoperasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `koperasi`
--

CREATE TABLE `koperasi` (
  `id` int(11) NOT NULL,
  `nama_koperasi` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `isi_koperasi` text NOT NULL,
  `gambar_koperasi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `koperasi`
--

INSERT INTO `koperasi` (`id`, `nama_koperasi`, `alamat`, `isi_koperasi`, `gambar_koperasi`) VALUES
(15, 'DINAS KOPERASI UMK KOTA CILEGON ADAKAN PELATIHAN MARKETPLACE DIGITAL UNTUK UMKM', 'Dinas Koperasi Dan UMKM', 'Dinas Koperasi Usaha Mikro dan Kecil Kota Cilegon melalui bidang pemberdayaan dan pengembangan koperasi, Usaha Mikro dan Kecil, mengadakan', '63dd5bf6007f6.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`) VALUES
(8, 'adm', 'adm', '$2y$10$vQ9SRJEtsG9a4AW.r/ipi.NppvGvtgM7VA3.FGVxv23cgZKdMpBYK');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `koperasi`
--
ALTER TABLE `koperasi`
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
-- AUTO_INCREMENT untuk tabel `koperasi`
--
ALTER TABLE `koperasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
