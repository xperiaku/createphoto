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
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `category` int(150) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(10) NOT NULL,
  `image_01` varchar(100) NOT NULL,
  `image_02` varchar(100) NOT NULL,
  `image_03` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `category`, `name`, `details`, `price`, `image_01`, `image_02`, `image_03`, `link`) VALUES
(10, 1, 'xvzxv', 'tytryurty', 5476456, 'IMG-20220615-WA0037.jpg', 'fag.jpg', 'baju.jpg', 'https://youtu.be/TAsENUrjGtc'),
(11, 2, 'LATAHZAN', 'SDAFNJDSAFLGLHG', 152, '1.jpg', 'IMG-20220615-WA0027.jpg', 'IMG-20220615-WA0038.jpg', 'https://youtu.be/TAsENUrjGtc'),
(12, 3, 'SDVSD', 'YJHJH', 6756, 'IMG-20220615-WA0043.jpg', 'IMG-20220615-WA0043.jpg', 'IMG-20220615-WA0044.jpg', 'https://youtube.com/shorts/5civ56xYjCU'),
(14, 1, 'momentic', 'Link Pembelian:\r\nShopee:\r\nSamsung M7 Smart Monitor: https://invl.io/clhurc4\r\nTV Mount: https://invl.io/clhurcj\r\n\r\nTokopedia:\r\nSamsung M7 Smart Monitor: https://invol.co/clhurdb\r\nTV Mount: https://invol.co/clhurdl\r\n\r\nWallpaper: https://www.danieltitchener.com/polarity\r\n\r\nKalian bisa support channel ini dengan membeli dari link ini, Terima Kasih!\r\nShopee: https://invol.co/cl90i8q\r\nTokopedia: https://invol.co/cl90f1w\r\nJD.ID: https://invol.co/cl90f25\r\nBukalapak: https://invol.co/cl90f2g\r\nBlibli: htt', 140000, '1.jpg', 'baju.jpg', '', 'https://youtu.be/R42QFLgt0h0'),
(15, 3, 'asfpaf', '      \r\n            \r\n               gambar 02 *\r\n               \r\n            \r\n            \r\n               gambar 03 *\r\n               \r\n            \r\n            \r\n            ', 1452010, 'home-img-3.png', 'icon-1.png', 'icon-2.png', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Finet.detik.com%2Ffotoinet%2Fd-4348965%2Fkumpulan-foto-keren-berkat-timing-tepat&psig=AOvVaw2z-SsgOpC_tOKwAS1wC_zd&ust=1681204128099000&source=images&cd=vfe&ved=0CBEQjRxqFwoTCODUo877nv4CFQAAAAAdAAAAABAJ');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
