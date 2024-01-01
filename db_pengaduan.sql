-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jan 2024 pada 17.56
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aduan`
--

CREATE TABLE `aduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` char(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(45) NOT NULL,
  `notelp` varchar(13) NOT NULL,
  `judul_pengaduan` varchar(50) NOT NULL,
  `isi_pengaduan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status` enum('0','proses','selesai','tolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `aduan`
--

INSERT INTO `aduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `nama`, `email`, `notelp`, `judul_pengaduan`, `isi_pengaduan`, `gambar`, `status`) VALUES
(41, '2023-12-30', '3279082189021218', 'Ahmad Tamims', 'tamims@gmail.com', '0817183712', 'Gempa Bumi', 'gempa bumi didaerah berikut ini', 'a2e13411a80efea20e3d49581edc3a84.jpg', 'selesai'),
(42, '2023-12-30', '1234567890123422', 'Doni Hilman', 'doni132@gmail.com', '081176654433', 'Kerusakan Fasilitas', 'Kerusakan fasilitas didaerah berikut, mohon segera ditangani', 'af753dd3a9b284e7d9a32336d6feb32d.jpg', 'selesai'),
(43, '2023-12-30', '1234567890123422', 'Hilman Doni', 'hilmandoni22@gmail.com', '12345678901', 'Kerusakan', 'kerusakan didaerah anu', '9c17ccd3db31f399fd16609783d4d783.png', 'selesai'),
(45, '2023-12-30', '1234567890123422', 'Hilman Doni', 'hilmandoni3@gmail.com', '9128390183', 'Kerusakan', 'adasdasad', '1f49d9091926cff18f0ecdc1c6a6f2d0.jpg', 'selesai'),
(46, '2023-12-31', '1234567890123456', 'Salma Aulia', 'salma@gmail.com', '081237231231', 'Bencana', 'pohon tumbang daerah anu', '5e669e0b76c2e685616653d945f510e2.jpg', 'selesai'),
(47, '2023-12-31', '1234567890123453', 'Aqila', 'aqilaanita@gmail.com', '081176654433', 'Kerusakan', 'kerusakan fasilitas daerah anu', 'bcd80493a8d7ceecc7b97a3132c2e59e.jpg', 'proses'),
(48, '2023-12-31', '1234567890123453', 'Nuri Nuryanti', 'nurinuryanti@gmail.com', '08152774548', 'Kerusakan', 'kerusakan fasilitas didaerah anu', '7e6ae2529dae31d05082552b4ec74b7e.jpg', 'proses'),
(49, '2024-01-01', '1234567890123456', 'Ahmad Tamim', 'tamim@gmail.com', '081176654433', 'Bencana Alam', 'hjgjgjhjhvhgchggv', '6da10d7a9ece78a056e529ca13c3bc44.jpg', 'tolak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(225) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL,
  `foto_profile` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`, `foto_profile`) VALUES
(27, 'Admin', 'adminhil', '$2y$10$2tzYakka9Z1syg.OxwgH9OWe.ddJbJH9j3RQ9pUX1z0vtDLwUN5zS', '08626526423', 'admin', 'd2e48927843fff746f171909709a4add.jpg'),
(34, 'Petugas Ramdonih', 'petugashilman', '$2y$10$DaV6vcJeU0g1QjlmpEwsKunbnVbLs04ToAG9.7XPnCcqqsUpTqxPS', '0812345678', 'petugas', 'df1a9b0bd7fdec9d21f596c010907a4c.jpg'),
(36, 'hilman', 'philman', '$2y$10$jVH35MJB.tm63AS11XUa.u2PWeQOL5UEZtx/s2aWfFilqZgqrUohq', '', 'petugas', 'user.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `id_petugas`, `tgl_tanggapan`, `tanggapan`, `image`) VALUES
(37, 41, 27, '2023-12-31', 'terimakasih sudah melaporrrr', '88e6cfbcd96e4b978c4b6f5865f41775.PNG'),
(38, 42, 27, '2023-12-31', 'terimakasih sudah melapor, mohon untuk memasukan melakukan kritik dan saran pada menu kolom komentar', 'c5bcc7470f4a90c60e0d838a3e680421.PNG'),
(39, 43, 27, '2023-12-31', 'terimakasih sudah melapor', '72613f5cf3e83ed90709ff3a730cba69.PNG'),
(41, 45, 34, '2023-12-30', 'terimakasih sudah melapor', 'a794fe4c540b91b7648d8ddbfae45fd1.PNG'),
(42, 46, 27, '2023-12-31', 'terimakasih sudah melapor', '6eca18730683ff0f4103f7275459319e.jpg'),
(43, 47, 27, '2024-01-01', 'baik akan segera diproses lebih lanjut', 'default.jpg'),
(44, 48, 27, '2024-01-01', 'segera diproses', ''),
(45, 49, 27, '2024-01-01', 'maaf', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aduan`
--
ALTER TABLE `aduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aduan`
--
ALTER TABLE `aduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
