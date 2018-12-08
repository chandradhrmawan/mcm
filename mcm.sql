-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 08, 2018 at 07:14 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mcm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1235 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1234, 'andriansyah', '1234', 'andriansyahar');

-- --------------------------------------------------------

--
-- Table structure for table `biodata_user`
--

CREATE TABLE IF NOT EXISTS `biodata_user` (
  `id_pelamar` int(11) NOT NULL AUTO_INCREMENT,
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
  `npwp` varchar(200) NOT NULL,
  PRIMARY KEY (`id_pelamar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `biodata_user`
--

INSERT INTO `biodata_user` (`id_pelamar`, `nama`, `tanggal_lahir`, `no_telp`, `alamat`, `jenis_kelamin`, `status`, `no_ktp`, `email`, `pendidikan`, `perguruan_tinggi`, `nama_perguruan_tinggi`, `ipk`, `id_skype`, `pengalaman_kerja`, `deskripsi_singkat`, `cv`, `ijazah`, `sertifikat_keahlian`, `fotocopy_ktp`, `npwp`) VALUES
(1, 'andri', '1991-12-12', 2147483647, 'aaaaaaa', 'Laki-laki', 'Lajang', 2147483647, 'andri_dor@yahoo.com', 'S1', 'ptn', 'Unikom', 3, 'andri123', 4, 'aaaaaaaaaaaaaaaaaa', '20181206071809IMG_0029.JPG', '20181206071809IMG_0029.JPG', '20181206071809IMG_0029.JPG', '20181206071809IMG_0029.JPG', '20181206071809IMG_0029.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE IF NOT EXISTS `jawaban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_soal` varchar(255) DEFAULT NULL,
  `jawab` varchar(255) DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL,
  `skor` varchar(255) DEFAULT NULL,
  `id_user` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id`, `id_soal`, `jawab`, `jawaban`, `skor`, `id_user`) VALUES
(42, '1', 'A', 'A', '1', '5'),
(43, '3', 'B', 'A', '0', '5'),
(44, '4', 'A', 'A', '1', '5'),
(45, '5', 'B', 'A', '0', '5'),
(46, '6', 'D', 'A', '0', '5'),
(47, '7', 'A', 'A', '1', '5'),
(48, '8', 'C', 'A', '0', '5'),
(49, '9', 'D', 'A', '0', '5'),
(74, '1', 'A', 'A', '1', '6'),
(75, '3', '', 'A', '0', '6'),
(76, '4', '', 'A', '0', '6'),
(77, '5', '', 'A', '0', '6'),
(78, '6', '', 'A', '0', '6'),
(79, '7', '', 'A', '0', '6'),
(80, '8', '', 'A', '0', '6'),
(81, '9', '', 'A', '0', '6');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE IF NOT EXISTS `soal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_soal` text,
  `a` varchar(255) DEFAULT NULL,
  `b` varchar(255) DEFAULT NULL,
  `c` varchar(255) DEFAULT NULL,
  `d` varchar(255) DEFAULT NULL,
  `jabawan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id`, `nama_soal`, `a`, `b`, `c`, `d`, `jabawan`) VALUES
(1, 'Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within matter of hours to help you. ?', 'A', 'B', 'C', 'D', 'A'),
(3, 'Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within matter of hours to help you. ?', 'A', 'B', 'C', 'D', 'A'),
(4, 'Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within matter of hours to help you. ?', 'A', 'B', 'C', 'D', 'A'),
(5, 'Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within matter of hours to help you. ?', 'A', 'B', 'C', 'D', 'A'),
(6, 'Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within matter of hours to help you. ?', 'A', 'B', 'C', 'D', 'A'),
(7, 'Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within matter of hours to help you. ?', 'A', 'B', 'C', 'D', 'A'),
(8, 'Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within matter of hours to help you. ?', 'A', 'B', 'C', 'D', 'A'),
(9, 'Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within matter of hours to help you. ?', 'A', 'B', 'C', 'D', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(15) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(20) NOT NULL,
  `confirm_password` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `confirm_password`, `email`, `no_telp`) VALUES
(5, 'kakakaka', 'kodir', '123', '123123', 'asdasd@gmail.com', '2180548'),
(6, 'admin', 'admin', 'admin', '123123', 'asdasd@gmail.com', '2180548');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
