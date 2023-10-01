-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Bulan Mei 2023 pada 10.56
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
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `name_men` varchar(100) NOT NULL,
  `nickname_men` varchar(100) NOT NULL,
  `father_men` varchar(100) NOT NULL,
  `mother_men` varchar(100) NOT NULL,
  `child_men` varchar(100) NOT NULL,
  `name_women` varchar(100) NOT NULL,
  `nickname_women` varchar(100) NOT NULL,
  `father_women` varchar(100) NOT NULL,
  `mother_women` varchar(100) NOT NULL,
  `child_women` varchar(100) NOT NULL,
  `marriage_date` date NOT NULL,
  `marriage_time` time NOT NULL,
  `marriage_place` varchar(250) NOT NULL,
  `marriage_link` varchar(250) NOT NULL,
  `reception_date` date NOT NULL,
  `reception_time` time NOT NULL,
  `reception_place` varchar(250) NOT NULL,
  `reception_link` varchar(250) NOT NULL,
  `wa_men` int(100) NOT NULL,
  `ig_men` varchar(250) NOT NULL,
  `wa_women` int(100) NOT NULL,
  `ig_women` varchar(250) NOT NULL,
  `photos_link` varchar(250) NOT NULL,
  `bank_name` varchar(250) NOT NULL,
  `bank_number` int(100) NOT NULL,
  `bank_name2` varchar(250) NOT NULL,
  `bank_number2` int(100) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `promo_code` varchar(100) NOT NULL,
  `percent` int(11) NOT NULL,
  `grand_total` int(100) NOT NULL,
  `placed_on` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending',
  `name_bank` varchar(255) NOT NULL,
  `name_sender` varchar(255) NOT NULL,
  `pay_img` varchar(100) NOT NULL,
  `link_invitation` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `address`, `name_men`, `nickname_men`, `father_men`, `mother_men`, `child_men`, `name_women`, `nickname_women`, `father_women`, `mother_women`, `child_women`, `marriage_date`, `marriage_time`, `marriage_place`, `marriage_link`, `reception_date`, `reception_time`, `reception_place`, `reception_link`, `wa_men`, `ig_men`, `wa_women`, `ig_women`, `photos_link`, `bank_name`, `bank_number`, `bank_name2`, `bank_number2`, `total_products`, `total_price`, `promo_code`, `percent`, `grand_total`, `placed_on`, `payment_status`, `name_bank`, `name_sender`, `pay_img`, `link_invitation`) VALUES
(25, 5, 'aswer', '122342', 'inihaldi@ail.com', 'lonod232', '12', '123', '1345', '12213', '1213wer', '123', 'ddsf', '1ert', '12ret', '1eter', '1997-12-12', '12:05:00', '132', '15164', '1994-12-15', '02:05:00', '15wrw', '1werwr', 112132, '1123', 11213, '11231', '155352', '1tert', 112313, '1131', 1123, 'aseloleh (120000 x 1) - ', 120000, '0', 0, 0, '2023-04-20', 'completed', 'kamu', 'cantik', '644e9536cb18a_2.jpg', ''),
(26, 5, 'Al Di', '2131', 'inihaldi@gmail.com', 'indonesia', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0001-01-01', '01:01:00', '1', '1', '0001-01-01', '01:01:00', '1', '1', 1, '1', 1, '1', '1', '1', 1, '1', 1, 'aseloleh (120000 x 1) - ', 120000, '0', 0, 0, '2023-04-20', 'completed', '', '', '', 'fdsfsdfsdsdfsdf'),
(27, 5, 'Al Di', '1231', 'inihaldi@gmail.com', 'indonesia', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0001-01-01', '01:01:00', '1', '1', '0001-01-01', '01:01:00', '1', '1', 1, '1', 1, '1', '1', '1', 1, '1', 1, 'aseloleh (120000 x 1) - ashole (250000 x 2) - ', 370000, '0', 0, 0, '2023-04-20', 'completed', '', '', '', 'anu ya kali'),
(30, 5, 'Al Di', '345353534', 'inihaldi@gmail.com', 'indonesia', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '0002-02-02', '02:02:00', '2', '2', '0002-02-02', '02:02:00', '2', '2', 2, '2', 2, '2', '2', '2', 2, '2', 2, 'aseloleh (120000 x 1) - ', 120000, '0', 0, 0, '2023-04-20', 'completed', 'sdfgsd', 'fsdfsd', '644098be04eae_1.jpg', 'zfsdfljsafsdfl'),
(31, 5, 'namaste', '0123', 'a@g.c', 'indonesia', 'adli', 'seti', 'nahat', 'noho', 'anak ke-1 dari 3 bersaudara', 'nahe', 'uhuy', 'nase', 'hot', 'anak ke-3 dari 3 bersaudara', '2023-05-16', '20:09:00', 'nah dimana tuh', 'sfsdfsf.com', '2023-05-05', '07:10:00', 'bogor jawabarat', 'sdfsdfd.com', 5785, '@asf', 534545, '@aewwe', 'sdasda.com', '', 0, '', 0, 'jaya (250000 x 1) - ', 250000, 'uas10', 5, 237500, '2023-05-02', 'pending', '', 'inaaa', '64586ceb053b9_sony.png', ''),
(52, 5, 'Al Di', '123', 'inihaldi@gmail.com', 'indonesia', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '12', '0000-00-00', '17:50:00', '12', '123', '1212-12-12', '21:49:00', '12334', '324234', 123, '123', 123, '123', '123', '123', 123, '123', 123, 'ashole (250000 x 1) - ', 237500, '123', 50, 118750, '2023-05-15', 'completed', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
