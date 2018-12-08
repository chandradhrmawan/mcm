-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Des 2018 pada 15.53
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1234, 'andriansyah', '1234', 'andriansyahar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `biodata_user`
--

CREATE TABLE `biodata_user` (
  `id_pelamar` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telp` int(15) NOT NULL,
  `alamat` varchar(55) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `no_ktp` int(35) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pendidikan` varchar(15) NOT NULL,
  `perguruan_tinggi` varchar(5) NOT NULL,
  `nama_perguruan_tinggi` varchar(40) NOT NULL,
  `ipk` int(30) NOT NULL,
  `id_skype` varchar(15) NOT NULL,
  `pengalaman_kerja` int(10) NOT NULL,
  `deskripsi_singkat` varchar(100) NOT NULL,
  `cv` varchar(200) NOT NULL,
  `ijazah` varchar(200) NOT NULL,
  `sertifikat_keahlian` varchar(200) NOT NULL,
  `fotocopy_ktp` varchar(200) NOT NULL,
  `npwp` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `biodata_user`
--

INSERT INTO `biodata_user` (`id_pelamar`, `nama`, `tanggal_lahir`, `no_telp`, `alamat`, `jenis_kelamin`, `status`, `no_ktp`, `email`, `pendidikan`, `perguruan_tinggi`, `nama_perguruan_tinggi`, `ipk`, `id_skype`, `pengalaman_kerja`, `deskripsi_singkat`, `cv`, `ijazah`, `sertifikat_keahlian`, `fotocopy_ktp`, `npwp`) VALUES
(1, 'andri', '1991-12-12', 2147483647, 'aaaaaaa', 'Laki-laki', 'Lajang', 2147483647, 'andri_dor@yahoo.com', 'S1', 'ptn', 'Unikom', 3, 'andri123', 4, 'aaaaaaaaaaaaaaaaaa', '20181206071809IMG_0029.JPG', '20181206071809IMG_0029.JPG', '20181206071809IMG_0029.JPG', '20181206071809IMG_0029.JPG', '20181206071809IMG_0029.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(20) NOT NULL,
  `confirm_password` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `confirm_password`, `email`, `no_telp`) VALUES
(5, 'kakakaka', 'kodir', '123', '123123', 'asdasd@gmail.com', '2180548');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `biodata_user`
--
ALTER TABLE `biodata_user`
  ADD PRIMARY KEY (`id_pelamar`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1235;

--
-- AUTO_INCREMENT untuk tabel `biodata_user`
--
ALTER TABLE `biodata_user`
  MODIFY `id_pelamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
