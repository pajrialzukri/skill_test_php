-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Apr 2022 pada 07.46
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_php`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(150) NOT NULL,
  `harga` varchar(150) NOT NULL,
  `stok` int(11) NOT NULL,
  `status_menu` varchar(150) NOT NULL,
  `gambar_menu` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `nama_menu`, `harga`, `stok`, `status_menu`, `gambar_menu`) VALUES
(6, 'Nasi Goreng', '15000', 46, 'Tersedia', 'Nasi Goreng.jpg'),
(7, 'Soto Ayam', '10000', 49, 'Tersedia', 'Soto Ayam.jpeg'),
(8, 'Sate Ayam', '12000', 40, 'Tersedia', 'Sate Ayam.jpg'),
(9, 'Batagor ', '7000', 28, 'Tersedia', 'Batagor .jpg'),
(10, 'Jus Jeruk', '5000', 47, 'Tersedia', 'Jus Jeruk.jpg'),
(11, 'Jus Alpukat', '5000', 46, 'Tersedia', 'Jus Alpukat.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(11) NOT NULL,
  `kode_transaksi` varchar(150) NOT NULL,
  `waktu_pesan` datetime NOT NULL,
  `no_meja` int(11) NOT NULL,
  `total_harga` varchar(150) NOT NULL,
  `uang_bayar` varchar(150) NOT NULL,
  `uang_kembali` varchar(150) NOT NULL,
  `status_order` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `kode_transaksi`, `waktu_pesan`, `no_meja`, `total_harga`, `uang_bayar`, `uang_kembali`, `status_order`) VALUES
(1, 'PSN20220429-001', '2022-04-29 12:44:35', 1, '19000', '', '', 'belum bayar'),
(2, 'PSN20220429-002', '2022-04-29 12:44:52', 3, '25000', '30000', '5000', 'sudah bayar'),
(3, 'PSN20220429-003', '2022-04-29 12:45:12', 2, '20000', '', '', 'belum bayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status_pesan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pesan`
--

INSERT INTO `tb_pesan` (`id_pesan`, `id_order`, `id_menu`, `jumlah`, `status_pesan`) VALUES
(1, 1, 9, 2, ''),
(2, 1, 10, 1, ''),
(3, 2, 6, 1, 'sudah'),
(4, 2, 11, 2, 'sudah'),
(5, 3, 7, 1, ''),
(6, 3, 10, 1, ''),
(7, 3, 11, 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesan_sementara`
--

CREATE TABLE `tb_pesan_sementara` (
  `id_pesan` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status_pesan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stok`
--

CREATE TABLE `tb_stok` (
  `id_stok` int(11) NOT NULL,
  `id_pesan` int(11) NOT NULL,
  `jumlah_terjual` int(11) NOT NULL,
  `status_cetak` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_stok`
--

INSERT INTO `tb_stok` (`id_stok`, `id_pesan`, `jumlah_terjual`, `status_cetak`) VALUES
(26, 28, 2, 'belum cetak'),
(27, 29, 1, 'belum cetak'),
(28, 30, 3, 'belum cetak'),
(29, 31, 4, 'belum cetak'),
(30, 32, 2, 'belum cetak'),
(31, 33, 2, 'belum cetak'),
(32, 34, 2, 'belum cetak'),
(33, 35, 3, 'belum cetak'),
(34, 36, 2, 'belum cetak'),
(35, 37, 1, 'belum cetak'),
(36, 38, 4, 'belum cetak'),
(37, 39, 3, 'belum cetak'),
(38, 40, 2, 'belum cetak'),
(39, 41, 3, 'belum cetak'),
(40, 42, 1, 'belum cetak'),
(41, 43, 2, 'belum cetak'),
(42, 44, 2, 'belum cetak'),
(43, 45, 1, 'belum cetak'),
(44, 46, 1, 'belum cetak'),
(45, 47, 2, 'belum cetak'),
(46, 48, 2, 'belum cetak'),
(47, 49, 1, 'belum cetak'),
(48, 50, 2, 'belum cetak'),
(49, 51, 1, 'belum cetak'),
(50, 52, 2, 'belum cetak'),
(51, 53, 1, 'belum cetak'),
(52, 54, 1, 'belum cetak'),
(53, 55, 1, 'belum cetak'),
(54, 56, 0, 'belum cetak'),
(55, 57, 0, 'belum cetak'),
(56, 58, 1, 'belum cetak'),
(57, 59, 2, 'belum cetak'),
(58, 60, 0, 'belum cetak'),
(59, 61, 0, 'belum cetak'),
(60, 62, 2, 'belum cetak'),
(61, 63, 0, 'belum cetak'),
(62, 64, 3, 'belum cetak'),
(63, 63, 0, 'belum cetak'),
(64, 65, 2, 'belum cetak'),
(65, 66, 2, 'belum cetak'),
(66, 67, 2, 'belum cetak'),
(67, 68, 2, 'belum cetak'),
(68, 69, 1, 'belum cetak'),
(69, 70, 1, 'belum cetak'),
(70, 71, 2, 'belum cetak'),
(71, 72, 0, 'belum cetak'),
(72, 73, 0, 'belum cetak'),
(73, 74, 2, 'belum cetak'),
(74, 75, 1, 'belum cetak'),
(75, 76, 2, 'belum cetak'),
(76, 77, 2, 'belum cetak'),
(77, 78, 3, 'belum cetak'),
(78, 79, 1, 'belum cetak'),
(79, 80, 1, 'belum cetak'),
(80, 81, 2, 'belum cetak'),
(81, 82, 1, 'belum cetak'),
(82, 83, 1, 'belum cetak'),
(83, 84, 1, 'belum cetak'),
(84, 85, 1, 'belum cetak'),
(85, 86, 1, 'belum cetak'),
(86, 87, 1, 'belum cetak'),
(87, 88, 1, 'belum cetak'),
(88, 89, 2, 'belum cetak'),
(89, 90, 2, 'belum cetak'),
(90, 91, 2, 'belum cetak'),
(91, 92, 2, 'belum cetak'),
(92, 93, 2, 'belum cetak'),
(93, 94, 2, 'belum cetak'),
(94, 95, 2, 'belum cetak'),
(95, 96, 1, 'belum cetak'),
(96, 97, 2, 'belum cetak'),
(97, 98, 3, 'belum cetak'),
(98, 99, 3, 'belum cetak'),
(99, 100, 1, 'belum cetak'),
(100, 101, 3, 'belum cetak'),
(101, 102, 1, 'belum cetak'),
(102, 103, 2, 'belum cetak'),
(103, 104, 2, 'belum cetak'),
(104, 105, 0, 'belum cetak'),
(105, 106, 0, 'belum cetak'),
(106, 107, 0, 'belum cetak'),
(107, 108, 0, 'belum cetak'),
(108, 109, 0, 'belum cetak'),
(109, 110, 0, 'belum cetak'),
(110, 111, 0, 'belum cetak'),
(111, 112, 0, 'belum cetak'),
(112, 113, 0, 'belum cetak'),
(113, 114, 0, 'belum cetak'),
(114, 115, 0, 'belum cetak'),
(115, 116, 0, 'belum cetak'),
(116, 117, 0, 'belum cetak'),
(117, 118, 0, 'belum cetak'),
(118, 119, 0, 'belum cetak'),
(119, 120, 0, 'belum cetak'),
(120, 121, 0, 'belum cetak'),
(121, 122, 0, 'belum cetak'),
(122, 123, 0, 'belum cetak'),
(123, 124, 0, 'belum cetak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `level` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'admin'),
(2, 'kasir', '202cb962ac59075b964b07152d234b70', 'kasir'),
(3, 'pelayan', '202cb962ac59075b964b07152d234b70', 'pelayan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `tb_pesan_sementara`
--
ALTER TABLE `tb_pesan_sementara`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `tb_stok`
--
ALTER TABLE `tb_stok`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_pesan_sementara`
--
ALTER TABLE `tb_pesan_sementara`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT untuk tabel `tb_stok`
--
ALTER TABLE `tb_stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
