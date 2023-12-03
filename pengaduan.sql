-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Des 2023 pada 17.09
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

INSERT INTO `aduan` (`id_pengaduan`, `tgl_pengaduan`, `nama`, `email`, `notelp`, `judul_pengaduan`, `isi_pengaduan`, `gambar`, `status`) VALUES
(1, '2023-11-27', 'Hilman Ramdoni', 'hilmandoni22@gmail.com', '08152774548', 'Banjir', 'Banjir di daerah SBJ', '25b65002b6b7ef38af58e55e8839d311.png', 'tolak'),
(2, '2023-11-28', 'Hilman Ramdoni', 'hilmandoni1@gmail.com', '08152774548', 'Banjir', 'Banjir', '7bc64bb96c003e615d7e4e5f9d333aae.png', 'selesai'),
(5, '2023-11-29', 'Ramdoni', 'ramdoni21@gmail.com', '08712351712', 'Gempa Bumi', 'gempa didaerah a, dengan tingkat kerusakan sekitar 25 rumah asgdhagdasgdasgdsahdgsadgshdgadgas', 'e30cb8a20045b17e6002aba285f6556f.png', 'selesai'),
(7, '2023-12-03', 'Budi Dalton', 'budi@gmail.com', '08123651212', 'Bencana Alam', 'telah terjadi bencana alam pohon tumbang di kota bogor tepatnya di kelurahan x kecamatan x . pohon tumbang ini mengakibatkan kemacetan di sekitar jalan tersebut dikarenakan pohon tumbang menyilang jalan raya, mohon untuk petugas segera mengunjungi tempat lokasi bencana.', 'e3518ead58d7f6253718a2857bd79749.PNG', 'tolak'),
(8, '2023-12-03', 'Ahmad Mustakim', 'mustakim@gmail.com', '08162312661', 'Kerusakan', 'terjadi kerusakan tiang listrik di daerah x tepatnya di kota x kelurahan x kecamatan x. akibat dari kerusakan ini menyebabkan kemacetan dijalan tersebut sehingga menghambat masyarakat untuk beraktivitas', '5ed524d7a03faa1395a2a77d4d5a6df5.PNG', 'selesai'),
(9, '2023-12-03', 'Ahmad Muammar', 'ahmadm@gmail.com', '08123712312', 'Gangguan Listrik', 'gangguan listrik yang terjadi di daerah x tepatnya di kota x kelurahan x dan kecamatan x yang disebabkan oleh tiang listik utama roboh, mohon untuk segera cepat ditindak lanjuti terimakasih', 'eab6c9e6dc8a8167fbf26fccd02ef8d1.PNG', 'selesai');

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
(26, 'Hilman Ramdoni', 'adminhilmans', '$2y$10$GnPGedSkBRikUxAaDSPqwuj9CyhbDayiP1RmgcJhN2M9TBw8YXJgS', '085920691497', 'admin', 'f667ce8dba6c27a1861a26b57bea5f81.jpg'),
(27, 'Hilman Ramdoni', 'adminhil', '$2y$10$lLQ.0Wpapi19DNK5VkJRp.1RjnGvUWLDtqXyMuhFVePNWUJlGo8TS', '08626526423', 'admin', '8f69b89f8456b4ce3138cefb9794e574.jpg'),
(34, 'Petugas Hilman', 'petugashilman', '$2y$10$ru4ca6qjqpj3seDIeQSnqOEMWVG30rEDVNlXpf1kuoFDiqMFBzDRu', '08126361253', 'petugas', '7fcf6c72f989fbe8e5a5aaafc2fcd47f.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `id_petugas`, `tgl_tanggapan`, `tanggapan`) VALUES
(1, 2, 27, '2023-12-03', 'siap akan kami tindak lanjuti'),
(2, 5, 27, '2023-12-03', 'siap, petugas kami akan segera kelokasi anda untuk memantau lebih lanjut'),
(3, 1, 27, '2023-12-03', 'silahkan lengkapi datanya terlebih dahulu, silahkan melakukan pengaduan ulang'),
(4, 7, 34, '2023-12-03', 'maaf foto tidak valid, silahkan melakukan pengaduan ulang dengan menyertakan foto yang valid'),
(5, 8, 27, '2023-12-03', 'siap akan kami tangani lebih lanjut'),
(6, 9, 34, '2023-12-03', 'Akan segera ditindak lanjuti oleh pihak kami, terimakasih');

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
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
