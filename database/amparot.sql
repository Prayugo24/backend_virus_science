-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13 Apr 2019 pada 16.13
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amparot`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_kelas`
--

CREATE TABLE `kategori_kelas` (
  `id_kat_kelas` int(11) NOT NULL,
  `kat_kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_kelas`
--

INSERT INTO `kategori_kelas` (`id_kat_kelas`, `kat_kelas`) VALUES
(1, 'SD'),
(2, 'SMP'),
(3, 'SMA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pilihan_jawaban`
--

CREATE TABLE `pilihan_jawaban` (
  `kode_jawaban` varchar(10) NOT NULL,
  `jawaban` varchar(200) NOT NULL,
  `id_soal` varchar(10) NOT NULL,
  `koreksi` enum('true','false') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pilihan_jawaban`
--

INSERT INTO `pilihan_jawaban` (`kode_jawaban`, `jawaban`, `id_soal`, `koreksi`) VALUES
('Jwb-001', 'asasa', 'So-002', 'true'),
('Jwb-002', 'suhaaa', 'So-003', 'true'),
('Jwb-003', 'nana', 'So-003', 'false'),
('Jwb-004', 'sssasa', 'So-002', 'false');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `id_soal` varchar(10) NOT NULL,
  `soal` varchar(200) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`id_soal`, `soal`, `gambar`) VALUES
('So-002', 'mim', '404.jpg'),
('So-003', 'saya', '4041.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_deskripsi`
--

CREATE TABLE `tb_deskripsi` (
  `id_deskripsi` varchar(10) NOT NULL,
  `nama_materi` varchar(50) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_deskripsi`
--

INSERT INTO `tb_deskripsi` (`id_deskripsi`, `nama_materi`, `id_kategori`, `deskripsi`) VALUES
('Des-001', 'Virus', 1, 'virus merupakan salah satu'),
('Des-002', 'Virus', 1, 'materi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Virus'),
(2, 'Bakteri'),
(3, 'Jamur'),
(4, 'Protista');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_materi`
--

CREATE TABLE `tb_materi` (
  `id_materi` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `id_kat_kelas` int(11) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `forgot_password` varchar(100) NOT NULL,
  `gambar` varchar(225) NOT NULL,
  `ukuran` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama_user`, `email`, `forgot_password`, `gambar`, `ukuran`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'Pepi Eka Rosalia', 'freditya96@gmail.com', '', '', 0),
(2, 'pepi', 'dcb76da384ae3028d6aa9b2ebcea01c9', 'Eka Rosalia', 'freditya96@gmail.com', '', 'logo1.png', 45.6),
(4, 'Bagus', '17b38fc02fd7e92f3edeb6318e3066d8', 'Bagus Abid', '', '', '585e4d1ccb11b227491c339b.png', 41.05);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori_kelas`
--
ALTER TABLE `kategori_kelas`
  ADD PRIMARY KEY (`id_kat_kelas`);

--
-- Indexes for table `pilihan_jawaban`
--
ALTER TABLE `pilihan_jawaban`
  ADD PRIMARY KEY (`kode_jawaban`),
  ADD KEY `id_soal` (`id_soal`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `tb_deskripsi`
--
ALTER TABLE `tb_deskripsi`
  ADD PRIMARY KEY (`id_deskripsi`),
  ADD KEY `kategori` (`id_kategori`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `id_kat_kelas` (`id_kat_kelas`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori_kelas`
--
ALTER TABLE `kategori_kelas`
  MODIFY `id_kat_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_materi`
--
ALTER TABLE `tb_materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
