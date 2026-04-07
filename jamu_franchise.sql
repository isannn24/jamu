-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Mar 2026 pada 08.30
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jamu_franchise`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bagi_hasil`
--

CREATE TABLE `bagi_hasil` (
  `id_bagi_hasil` int(11) NOT NULL,
  `id_franchise` int(11) DEFAULT NULL,
  `periode` varchar(7) DEFAULT NULL,
  `total_omset` int(11) DEFAULT NULL,
  `bagi_hasil_pusat` int(11) DEFAULT NULL,
  `bagian_mitra` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bagi_hasil`
--

INSERT INTO `bagi_hasil` (`id_bagi_hasil`, `id_franchise`, `periode`, `total_omset`, `bagi_hasil_pusat`, `bagian_mitra`) VALUES
(1, 3, '2026-03', 50000, 10000, 40000),
(2, 4, '2026-03', 70000, 14000, 56000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bahan` int(11) NOT NULL,
  `nama_bahan` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bahan`, `nama_bahan`, `stok`, `satuan`, `tanggal_update`) VALUES
(1, 'Kunyit', 75, 'kg', '2026-03-17 01:54:07'),
(2, 'Jahe', 35, 'kg', '2026-03-17 00:55:28'),
(3, 'Temulawak', 35, 'kg', '2026-03-16 07:34:20'),
(4, 'Serai', 25, 'kg', '2026-03-16 07:34:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail` int(11) NOT NULL,
  `id_penjualan` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail`, `id_penjualan`, `id_produk`, `qty`, `harga`) VALUES
(1, 1, 1, 1, 50000),
(2, 2, 5, 1, 20000),
(3, 11, 1, 2, 50000),
(4, 12, 5, 2, 20000),
(5, 13, 5, 1, 20000),
(6, 14, 1, 2, 50000),
(7, 14, 5, 3, 20000),
(8, 15, 1, 1, 50000),
(9, 15, 5, 1, 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `franchise`
--

CREATE TABLE `franchise` (
  `id_franchise` int(11) NOT NULL,
  `nama_cabang` varchar(100) NOT NULL,
  `pemilik` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(50) NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `franchise`
--

INSERT INTO `franchise` (`id_franchise`, `nama_cabang`, `pemilik`, `alamat`, `kota`, `no_hp`, `status`) VALUES
(1, 'JAMU AROMA REMPAH', 'Anton Hadi', 'Jl Asia Afrika', 'SUBANG', '08123456789', 'Aktif'),
(3, 'Subang 1', 'Pak Andi', 'Subang', 'Subang', '08123456789', 'Aktif'),
(4, 'Subang 2', 'Bu Sari', 'Subang', 'Subang', '08123456788', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan_bahan`
--

CREATE TABLE `pemesanan_bahan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_franchise` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_pesan` date DEFAULT NULL,
  `status` varchar(20) DEFAULT 'menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemesanan_bahan`
--

INSERT INTO `pemesanan_bahan` (`id_pemesanan`, `id_franchise`, `id_bahan`, `jumlah`, `tanggal_pesan`, `status`) VALUES
(1, 3, 1, 10, '2026-03-17', 'dikirim'),
(2, 3, 2, 5, '2026-03-17', 'dikirim'),
(3, 3, 1, 5, '2026-03-17', 'selesai'),
(4, 3, 1, 5, '2026-03-17', 'diproses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_franchise` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_franchise`, `id_produk`, `tanggal`, `jumlah`, `total`) VALUES
(1, 1, 1, '2026-03-17', 1, 50000),
(2, 1, 5, '2026-03-17', 1, 20000),
(3, 3, 1, '2026-03-17', NULL, NULL),
(4, 3, 1, '2026-03-17', NULL, NULL),
(5, 4, 5, '2026-03-17', NULL, NULL),
(6, 3, 5, '2026-03-17', NULL, NULL),
(7, 3, 1, '2026-03-17', 1, NULL),
(8, 3, 1, '2026-03-17', 1, 50000),
(9, 4, 1, '2026-03-17', 1, 50000),
(10, 4, 5, '2026-03-17', 1, 20000),
(11, 3, 1, '2026-03-19', 2, 100000),
(12, 3, NULL, '2026-03-19', NULL, 40000),
(13, 3, NULL, '2026-03-19', NULL, 20000),
(14, 3, NULL, '2026-03-19', NULL, 160000),
(15, 3, NULL, '2026-03-19', NULL, 70000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_jamu`
--

CREATE TABLE `produk_jamu` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `khasiat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk_jamu`
--

INSERT INTO `produk_jamu` (`id_produk`, `nama_produk`, `harga`, `foto`, `khasiat`) VALUES
(1, 'supers', 50000, '1773062965_db3b9aaee4bb7327b3ac.jpg', 'suplemen kesehatan'),
(5, 'jamu', 20000, '1773063056_32de61de758b805a5eb8.jpeg', 'meredakan demam dan sakit kepala');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `id_franchise` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`, `id_franchise`) VALUES
(1, 'admin', 'admin123', 'admin', NULL),
(2, 'owner', 'owner123', 'owner', NULL),
(4, 'mitra_subang1', '123456', 'mitra', 3),
(5, 'mitra_subang2', '123456', 'mitra', 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bagi_hasil`
--
ALTER TABLE `bagi_hasil`
  ADD PRIMARY KEY (`id_bagi_hasil`),
  ADD KEY `fk_bagi_hasil_franchise` (`id_franchise`);

--
-- Indeks untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `franchise`
--
ALTER TABLE `franchise`
  ADD PRIMARY KEY (`id_franchise`);

--
-- Indeks untuk tabel `pemesanan_bahan`
--
ALTER TABLE `pemesanan_bahan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_franchise` (`id_franchise`),
  ADD KEY `fk_pemesanan_bahan` (`id_bahan`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `fk_penjualan_produk` (`id_produk`);

--
-- Indeks untuk tabel `produk_jamu`
--
ALTER TABLE `produk_jamu`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_user_franchise` (`id_franchise`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bagi_hasil`
--
ALTER TABLE `bagi_hasil`
  MODIFY `id_bagi_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `franchise`
--
ALTER TABLE `franchise`
  MODIFY `id_franchise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pemesanan_bahan`
--
ALTER TABLE `pemesanan_bahan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `produk_jamu`
--
ALTER TABLE `produk_jamu`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bagi_hasil`
--
ALTER TABLE `bagi_hasil`
  ADD CONSTRAINT `fk_bagi_hasil_franchise` FOREIGN KEY (`id_franchise`) REFERENCES `franchise` (`id_franchise`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemesanan_bahan`
--
ALTER TABLE `pemesanan_bahan`
  ADD CONSTRAINT `fk_pemesanan_bahan` FOREIGN KEY (`id_bahan`) REFERENCES `bahan_baku` (`id_bahan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_bahan_ibfk_1` FOREIGN KEY (`id_franchise`) REFERENCES `franchise` (`id_franchise`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_bahan_ibfk_2` FOREIGN KEY (`id_bahan`) REFERENCES `bahan_baku` (`id_bahan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `fk_penjualan_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk_jamu` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_franchise` FOREIGN KEY (`id_franchise`) REFERENCES `franchise` (`id_franchise`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
