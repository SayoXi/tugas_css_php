-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Feb 2024 pada 17.24
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `css_php`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanans`
--

CREATE TABLE `pesanans` (
  `id_pesanan` int(255) NOT NULL,
  `id_produk` int(255) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `jumlah_pesanan` int(255) NOT NULL,
  `harga_total` int(255) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanans`
--

INSERT INTO `pesanans` (`id_pesanan`, `id_produk`, `nama_pemesan`, `jumlah_pesanan`, `harga_total`, `status`) VALUES
(16, 1, 'alia', 8, 2000000, 2),
(22, 9, 'alia', 5, 650000, 2),
(23, 9, 'alia', 5, 650000, 2),
(24, 14, 'alia', 4, 240000, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks`
--

CREATE TABLE `produks` (
  `id_produk` int(100) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `stock` int(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `gambar_produk` varchar(255) NOT NULL,
  `desk_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id_produk`, `nama_produk`, `stock`, `harga`, `gambar_produk`, `desk_produk`) VALUES
(4, 'Short Sleeves Shirt ', 20, 1300000, 'gambar6.jpg', 'Gayanya yang simpel, namun terlihat classy dan juga chic'),
(9, 'Short Sleeves Shirt', 40, 130000, 'gambar5.jpg', 'Gayanya yang simpel, namun terlihat classy dan juga chic'),
(14, 'Baju Seragam Jepang', 30, 60000, 'gambar1.jpg', 'Lucu, keren, modern'),
(15, 'Seragam Korea', 15, 50000, 'gambar2.jpg', 'Keren');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'alia', 'alia123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id_pesanan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `produks`
--
ALTER TABLE `produks`
  MODIFY `id_produk` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
