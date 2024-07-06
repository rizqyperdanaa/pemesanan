-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jul 2024 pada 16.30
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_warungkisam`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_menu`
--

CREATE TABLE `daftar_menu` (
  `id_menu` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `kategori` int(2) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `stok` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `daftar_menu`
--

INSERT INTO `daftar_menu` (`id_menu`, `foto`, `nama_menu`, `keterangan`, `kategori`, `harga`, `stok`) VALUES
(1, 'pempek_mateng.jpg', 'Pempek', 'frozen', 1, '50000', '20'),
(9, '55115-dimsum.jpg', 'Dimsun', 'Adonan Ayam Dan Udang Dikukus', 3, '35000', '100'),
(12, '45126-ayam_ungkep.jpg', 'Ayam Ungkep', 'Ayam Di Ungkep', 1, '60000', '30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `jenis_menu` int(2) NOT NULL,
  `kategori_menu` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `jenis_menu`, `kategori_menu`) VALUES
(1, 1, 'Frozen Food'),
(2, 2, 'Siap Saji'),
(3, 3, 'Instan Food'),
(4, 1, 'Mentah'),
(6, 2, 'Siap Santap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_pesan`
--

CREATE TABLE `list_pesan` (
  `id_list_order` int(11) NOT NULL,
  `menu` int(11) DEFAULT NULL,
  `kode_order` int(30) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `list_pesan`
--

INSERT INTO `list_pesan` (`id_list_order`, `menu`, `kode_order`, `jumlah`, `catatan`, `status`) VALUES
(1, 1, 1, 2, '', '2'),
(2, 12, 1, 3, '', '2'),
(4, 12, 2147483647, 4, '', '2'),
(5, 1, 2147483647, 2, 'Ya', '2'),
(6, 9, 2147483647, 5, 'vlkdflfdk', '2'),
(7, 1, 2, 3, 'Kirim pas Jumat', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(30) NOT NULL,
  `nominal_uang` bigint(20) DEFAULT NULL,
  `jumlah_total` bigint(20) DEFAULT NULL,
  `waktu_bayar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `nominal_uang`, `jumlah_total`, `waktu_bayar`) VALUES
(1, 300000, 280000, '2024-05-03 12:02:40'),
(2147483647, 50000, 515000, '2024-05-16 03:52:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id_order` int(30) NOT NULL,
  `pelanggan` varchar(255) NOT NULL,
  `meja` int(11) NOT NULL,
  `pelayan` int(11) DEFAULT NULL,
  `waktu_order` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id_order`, `pelanggan`, `meja`, `pelayan`, `waktu_order`) VALUES
(1, 'iyadeh', 3, 6, '2024-05-03 11:12:56'),
(2, 'ganti', 5, 4, '2024-05-16 03:54:27'),
(2147483647, 'Tangerang', 5, 4, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `level` int(1) DEFAULT NULL,
  `no_hp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `level`, `no_hp`, `alamat`, `password`) VALUES
(3, 'abel', 'coba@gmail.com', 2, '085878785454', 'Pinang', '202cb962ac59075b964b07152d234b70'),
(4, 'owner lolicafe', 'admin@gmail.com', 1, '089712345623', 'Kunciran', '827ccb0eea8a706c4c34a16891f84e7b'),
(5, 'staff', 'staff@gmail.com', 4, '089624681357', 'Cipete', '202cb962ac59075b964b07152d234b70'),
(6, 'topan', 'reseller@gmail.com', 3, '081314148585', 'Nerogtog', '827ccb0eea8a706c4c34a16891f84e7b'),
(10, 'Tay', 'ceo@gmail.com', 1, '089123456701', 'Cipondoh', '827ccb0eea8a706c4c34a16891f84e7b'),
(12, 'Gemini', 'test@gmail.com', 2, '101984230923094', 'Ciledug', '827ccb0eea8a706c4c34a16891f84e7b'),
(13, 'Fourth', 'bjir@gmail.com', 1, '12345678', 'Bebas', 'e10adc3949ba59abbe56e057f20f883e'),
(16, 'Kiki', 'hadeh@gmail.com', 1, '089665658630', 'Duta Bintaro Blok.G5 No.2', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftar_menu`
--
ALTER TABLE `daftar_menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `kategori` (`kategori`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `list_pesan`
--
ALTER TABLE `list_pesan`
  ADD PRIMARY KEY (`id_list_order`),
  ADD KEY `menu` (`menu`),
  ADD KEY `order` (`kode_order`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `pelayan` (`pelayan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftar_menu`
--
ALTER TABLE `daftar_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `list_pesan`
--
ALTER TABLE `list_pesan`
  MODIFY `id_list_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `daftar_menu`
--
ALTER TABLE `daftar_menu`
  ADD CONSTRAINT `daftar_menu_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `list_pesan`
--
ALTER TABLE `list_pesan`
  ADD CONSTRAINT `list_pesan_ibfk_1` FOREIGN KEY (`menu`) REFERENCES `daftar_menu` (`id_menu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `list_pesan_ibfk_2` FOREIGN KEY (`kode_order`) REFERENCES `pesan` (`id_order`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`pelayan`) REFERENCES `user` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
