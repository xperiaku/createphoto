-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Apr 2023 pada 15.03
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(9, 2, 'Al', 'inihaldi@gmail.com', '343', 'svasgsgfasfa'),
(10, 4, 'asfd', 'sg3a@g.c', '235235352532', 'rthdsfbdfbghr'),
(11, 4, 'Alfdsg', 'hdfhfdf@g', '434543', 'd fgsg aggds'),
(12, 4, 'sdsd', 'sdfsd@g', '4324343432', ' Rp,-\r\n            pesanan selesai\r\n            Lihat Pesanan\r\n         '),
(13, 4, 'sdfs', 's@v', '235345', 'Maaf, saya tidak dapat memasukkan CSS lengkap di sini karena terlalu panjang dan tergantung pada konteks dan tata letak situs web atau aplikasi yang dimaksud. Namun, saya dapat memberikan beberapa panduan dasar dalam menulis CSS:\r\n\r\nGunakan selektor yang spesifik dan minimal, hindari penggunaan ID yang berlebihan\r\nHindari');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
