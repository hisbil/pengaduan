-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 04, 2015 at 09:31 PM
-- Server version: 5.5.42-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inspekto_pengaduan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `nama` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `email` varchar(32) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`, `email`, `status`) VALUES
(5, 'yudi', 'yudi1234', '9e5d6be78cc80a3d249e214c775721a1', 'hisbilislami92@yahoo.com', 1),
(6, 'hisbil islami', 'hisbil', '2fe47e4982abb45c58be456f636000cf', 'hisbilislami92@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE IF NOT EXISTS `pertanyaan` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `id_petugas` int(8) NOT NULL,
  `satker` varchar(32) NOT NULL,
  `id_admin` int(8) NOT NULL,
  `email` varchar(32) NOT NULL,
  `tanya` varchar(1000) NOT NULL,
  `tgl` varchar(32) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_petugas` (`id_petugas`),
  KEY `id_admin` (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id`, `id_petugas`, `satker`, `id_admin`, `email`, `tanya`, `tgl`, `status`) VALUES
(1, 1, 'dinas pendidikan', 6, 'leomessi@gmail.com', '0', '2015-04-01', 1),
(2, 1, 'dinas pendidikan', 6, 'leomessi@gmail.com', '0', '2015-04-01', 1),
(3, 1, 'dinas pendidikan', 6, 'leomessi@gmail.com', 'coba email', '2015-04-02', 1),
(4, 1, 'dinas pendidikan', 6, 'leomessi@gmail.com', 'coba email', '2015-04-02', 1),
(5, 1, 'dinas pendidikan', 6, 'leomessi@gmail.com', 'coba email', '2015-04-02', 1),
(6, 1, 'dinas pendidikan', 6, 'leomessi@gmail.com', 'coba email', '2015-04-02', 1),
(7, 1, 'dinas pendidikan', 6, 'leomessi@gmail.com', 'coba email', '2015-04-02', 1),
(8, 1, 'dinas pendidikan', 6, 'leomessi@gmail.com', 'coba email', '2015-04-02', 1),
(9, 1, 'dinas pendidikan', 6, 'leomessi@gmail.com', 'ini email baru bro', '2015-04-02', 1),
(10, 1, 'dinas pendidikan', 6, 'leomessi@gmail.com', 'yang ini juga bro', '2015-04-02', 1),
(11, 1, 'dinas pendidikan', 6, 'leomessi@gmail.com', 'test 1', '2015-04-02', 1),
(12, 1, 'dinas pendidikan', 6, 'leomessi@gmail.com', 'test 2', '2015-04-02', 1),
(13, 1, 'dinas pendidikan', 6, 'leomessi@gmail.com', 'sudah fixkah ?', '2015-04-02', 1),
(14, 1, 'dinas pendidikan', 6, 'leomessi@gmail.com', 'apakah sudah fix ?', '2015-04-02', 1),
(15, 2, 'dinas perikanan', 6, 'andreas@gmail.com', 'kapan barcelona tanding ?', '2015-04-02', 1),
(16, 2, 'dinas perikanan', 6, 'andreas@gmail.com', 'oya ?', '2015-04-02', 1),
(17, 3, 'dinas pendidikan', 6, 'coba21041992@gmail.com', 'coba bos', '2015-04-02', 1),
(18, 3, 'dinas pendidikan', 6, 'coba21041992@gmail.com', 'coba lagi bos', '2015-04-02', 1),
(19, 1, 'dinas pendidikan', 6, 'leomessi@gmail.com', 'haloo ', '2015-04-04', 1),
(20, 1, 'dinas pendidikan', 6, 'leomessi@gmail.com', 'halooo lagi', '2015-04-04', 1),
(21, 1, 'dinas pendidikan', 6, 'leomessi@gmail.com', 'haloo lagi yaaa', '2015-04-04', 1),
(22, 1, 'dinas pendidikan', 6, 'leomessi@gmail.com', 'cheking akhir', '2015-04-04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE IF NOT EXISTS `petugas` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `nama` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `email` varchar(32) NOT NULL,
  `id_satker` int(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_satker` (`id_satker`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `nama`, `username`, `password`, `email`, `id_satker`) VALUES
(1, 'leo messi', 'leomessi', 'ce0a8ad8a758c3d242d9e050c4707fb6', 'leomessi@gmail.com', 1),
(2, 'andreas', 'andreas', 'e024f9589c1e9d64b34cb1257d9c9dfc', 'andreas@gmail.com', 2),
(3, 'yahya', 'yahya23', 'b3cd71f856e954a970c0b1292c455b8c', 'coba21041992@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbsatker`
--

CREATE TABLE IF NOT EXISTS `tbsatker` (
  `id_satker` int(8) NOT NULL AUTO_INCREMENT,
  `satker` varchar(32) NOT NULL,
  PRIMARY KEY (`id_satker`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbsatker`
--

INSERT INTO `tbsatker` (`id_satker`, `satker`) VALUES
(1, 'dinas pendidikan'),
(2, 'dinas perikanan');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD CONSTRAINT `id` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_admin` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `id_satker` FOREIGN KEY (`id_satker`) REFERENCES `tbsatker` (`id_satker`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
