-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Apr 2023 pada 15.02
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
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`) VALUES
(1, 'adm', '356a192b7913b04c54574d18c28d46e6395428ab');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id` int(100) NOT NULL,
  `name_bank` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id`, `name_bank`, `name`, `number`) VALUES
(1, 'Bank Central Asia (BCA)', 'Aldi Setiawan', '453657767'),
(2, 'Bank Syariah Indonesia (BSI)', 'Aldi Setiawan', '2055245254');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(31, 2, 10, 'xvzxv', 5476456, 1, 'IMG-20220615-WA0037.jpg');

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
  `marriage_time` time(4) NOT NULL,
  `marriage_place` varchar(250) NOT NULL,
  `marriage_link` varchar(250) NOT NULL,
  `reception_date` date NOT NULL,
  `reception_time` time(4) NOT NULL,
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
  `placed_on` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending',
  `name_bank` varchar(255) NOT NULL,
  `name_sender` varchar(255) NOT NULL,
  `pay_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `address`, `name_men`, `nickname_men`, `father_men`, `mother_men`, `child_men`, `name_women`, `nickname_women`, `father_women`, `mother_women`, `child_women`, `marriage_date`, `marriage_time`, `marriage_place`, `marriage_link`, `reception_date`, `reception_time`, `reception_place`, `reception_link`, `wa_men`, `ig_men`, `wa_women`, `ig_women`, `photos_link`, `bank_name`, `bank_number`, `bank_name2`, `bank_number2`, `total_products`, `total_price`, `placed_on`, `payment_status`, `name_bank`, `name_sender`, `pay_img`) VALUES
(3, 2, 'Al Di', '0859336592', 'inihaldi@gmail.com', 'flat no. indonesia, dfhdfh, depok, Jawa Barat, Indonesia - 16432', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '00:00:00.0000', '', '', '0000-00-00', '00:00:00.0000', '', '', 0, '', 0, '', '', '', 0, '', 0, 'xvzxv (5476456 x 1) - LATAHZAN (152 x 1) - SDVSD (6756 x 1) - ', 5483364, '2023-03-22', 'completed', 'sdfgs', 'sdfsd', 'icon-2.png'),
(4, 2, 'Al Di', '0859336592', 'inihaldi@gmail.com', 'flat no. indonesia, rthgh, depok, Jawa Barat, Indonesia - 16432', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '00:00:00.0000', '', '', '0000-00-00', '00:00:00.0000', '', '', 0, '', 0, '', '', '', 0, '', 0, 'xvzxv (5476456 x 1) - ', 5476456, '2023-03-22', 'pending', 'afre', 'ewrw', '643a025bd4e77_Tgadget.jpg'),
(6, 2, 'Al Di', '0859336592', 'inihaldi@gmail.com', 'flat no. indonesia, 546456, depok, Jawa Barat, Indonesia - 16432', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '00:00:00.0000', '', '', '0000-00-00', '00:00:00.0000', '', '', 0, '', 0, '', '', '', 0, '', 0, 'SDVSD (6756 x 1) - LATAHZAN (152 x 1) - xvzxv (5476456 x 1) - ', 5483364, '2023-04-05', 'pending', 'a', 'a', '64386687cf5c9_pic-6.png'),
(8, 2, 'Al Di', '0859336592', 'inihaldi@gmail.com', 'flat no. indonesia, asfs, depok, Jawa Barat, Indonesia - 16432', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '00:00:00.0000', '', '', '0000-00-00', '00:00:00.0000', '', '', 0, '', 0, '', '', '', 0, '', 0, 'xvzxv (5476456 x 1) - ', 5476456, '2023-04-11', 'completed', 'sds', 'sdfs', 'home-img-1.png'),
(9, 2, 'Al Di', '0859336592', 'inihaldi@gmail.com', 'flat no. indonesia, egergfdsg, depok, Jawa Barat, Indonesia - 16432', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '00:00:00.0000', '', '', '0000-00-00', '00:00:00.0000', '', '', 0, '', 0, '', '', '', 0, '', 0, 'xvzxv (5476456 x 5) - ', 27382280, '2023-04-11', 'completed', 'df', 'fdg', 'icon-4.png'),
(10, 2, 'Al Di', '0859336592', 'inihaldi@gmail.com', 'flat no. indonesia, wewetetw, depok, Jawa Barat, Indonesia - 16432', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '00:00:00.0000', '', '', '0000-00-00', '00:00:00.0000', '', '', 0, '', 0, '', '', '', 0, '', 0, 'xvzxv (5476456 x 1) - ', 5476456, '2023-04-11', 'completed', 'sdfsd', 'sdfsd', 'pic-5.png'),
(16, 2, 'sg', '45354545', 'shfsdf@gmail.com', 'asfasadadfadasad', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '00:00:00.0000', '', '', '0000-00-00', '00:00:00.0000', '', '', 0, '', 0, '', '', '', 0, '', 0, 'SDVSD (6756 x 1) - momentic (140000 x 4) - ', 566756, '2023-04-14', 'pending', 'xg', 'sdg', '643fe4a159587_images.jpeg'),
(17, 2, 'Al Di', '43', 'inihaldi@gmail.com', 'indonesia', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '00:00:00.0000', '', '', '0000-00-00', '00:00:00.0000', '', '', 0, '', 0, '', '', '', 0, '', 0, 'xvzxv (5476456 x 1) - ', 5476456, '2023-04-19', 'pending', 'sdf', 'sdf', '643fd9ae86bdb_tgadget copy.png');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(2, 'admin', 'inihaldi@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab'),
(4, '5', 'a@g.c', '356a192b7913b04c54574d18c28d46e6395428ab');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
