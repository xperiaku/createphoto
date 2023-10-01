-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Apr 2023 pada 18.40
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
  `message` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(21, 5, 'Al', 'inihaldi@gmail.com', '7456', 'KATA PENGANTAR\r\nRasa puji dan rasa syukur yang sedalam-dalamnya penulis aturkan kepada kehadirat Allah SWT yang telah memberikan rahmat dan karunianya kepada penulis,sehingga penulis dapat menyelesaikan makalah interaksi manusia dan komputer yang berjudul “Sistem bersendor ganda”.Guna untuk memenuhi salah satu tugas terstruktur mata kuliah interaksi manusia dengan computer.\r\nKemudian shalawat berangkaikan salam penulis sampaikan kepada allah SWT kiranya dilimpahkan kepada arwah junjungan kita nabi besar Muhammad SAW,yang telah berjuang mati-matian hingga tetes darah penghabisan demi untuk menegakkan kalimat Laailahaillallah di permukaan bumi ini.Semoga kita senantiasa menjalani hidup dengan pencerahan allahi dan ajaran Rasulullah SAW.\r\n          Ucapan terima kasih tidak lupa pula kami ucapkan kepada bapak ERIL SYAHMAIDI, Spd, Mpd selaku dosen pembimbing yang telah melakukan dan memberi bimbingan baik secara lansung maupun tidak lansung dalam penyelesaian makalah ini. Dan tidaklupa pula kepada teman-teman,yang telah membantu kami dalam pembuatan makalahini.\r\n Dalam pembuatan makalah ini kami menyadari bahawa kami masih banyak memiliki kekurangan. Oleh sebab itu berharap adanya kritik dan saran untuk memperbaiki pembutan makalah selanjutnya. Terima kasih.'),
(22, 0, 'Al', 'inihaldi@gmail.com', '3454353', 'MAKALAH\r\nSISTEM BERSENSOR GANDA\r\nDiajukanUntukMemenuhi Salah SatuTugasTerstrukturPada Mata Kuliah\r\nInteraksiManuasiadanKomputer\r\n\r\nOleh:\r\n                             DELYA NOVINA SANDRA (2512.098)\r\n                             MAISARAH HIDAYATI      (2512.005)\r\n                             REZI KURNIA                       (2512.199)\r\n\r\nDosen Pembimbing\r\nERIL SYAHMAIDI, Spd, Mpd\r\n\r\nPROGRAM STUDI PENDIDIKAN TEKNOLOGI INFORMATIKA JURUSAN\r\nTARBIYAH  SEKOLAH TINGGI AGAMA ISLAM NEGERI\r\n(STAIN)SJECH M. DJAMIL DJAMBEK\r\nBUKITTINGGI\r\n2014'),
(23, 5, 'ase', 'lole@gmail.com', '34564543535', 'Hari apa saja dan jam berapa saja perkuliahan disana?\r\nKategori: Dasar Pengetahuan\r\n\r\nKamu bisa memilih jam kuliah sesuai keinginan atau waktu luang kamu. Berikut rincian perkuliahan : 1. REGULER A : Kuliah dari hari senin s/d jumat pukul 08:00 s/d 17:00 2. REGULER B : Kuliah dari hari...\r\n\r\n116.860\r\n(1.063)\r\nSaya pengguna baru, Saya mau mengirim pesan.\r\nKategori: Dasar Pengetahuan\r\n\r\n1. Kamu bisa klik di Submit a Ticket. 2. Isi nama dan email anda. Ingat gunakan nama asli kamu dan email aktif. 3. Priority adalah tingkat permasalahan. - Low = Permasalahan tingkat biasa - Meduim = ...\r\n\r\n39.032\r\n(1.230)\r\nSaya ingin mengetahui berapa biaya perkuliahan di UNPAM, STIKES dan UNSUT\r\nKategori: Dasar Pengetahuan\r\n\r\n1. Kamu silahkan datang ke kampus UNPAM untuk info lebih lanjut. 2. Kami buka dari hari senin s/d jumat (08:00 s/d 20:00) 3. Sabtu (08:00 s/d 15:00) 4. Tanggal merah dan hari raya kampus libur.\r\n\r\n36.356\r\n(600)\r\nApakah bisa daftar secara online?\r\nKategori: Dasar Pengetahuan\r\n\r\nYa.. Bisa. Kamu bisa mendaftar secara online... Berikut prosedur pendaftaran : 1. Buka browser pada komputer atau smartphone anda. 2. Buka alamat website pmb.unpam.ac.id 3. Silahkan lakukan Registrasi...\r\n\r\n28.852\r\n(768)\r\nBagaimana dengan cara pembayaran disana?\r\nKategori: Dasar Pengetahuan\r\n\r\n1. Kamu bisa membayar kuliah dengan cara dicicil setiap bulannya dan harus lunas di akhir semester. 2. Kamu bisa bayar cicilan kuliah melalui bank BTN yang sudah bekerja sama dengan kampus UNPAM atau ...\r\n\r\n26.222\r\n(662)\r\nSaya sudah daftar online, Tetapi belum dapat info ruangannya?\r\nKategori: Dasar Pengetahuan\r\n\r\nKamu bisa buka link : http://pmb.unpam.ac.id/c_front/info_pmb Dengan mengisi nomor PENDAFTARAN di kolom info ruang pmb. Maka informasi ruang dan gedung akan muncul. ');

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

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `address`, `name_men`, `nickname_men`, `father_men`, `mother_men`, `child_men`, `name_women`, `nickname_women`, `father_women`, `mother_women`, `child_women`, `marriage_date`, `marriage_time`, `marriage_place`, `marriage_link`, `reception_date`, `reception_time`, `reception_place`, `reception_link`, `wa_men`, `ig_men`, `wa_women`, `ig_women`, `photos_link`, `bank_name`, `bank_number`, `bank_name2`, `bank_number2`, `total_products`, `total_price`, `placed_on`, `payment_status`, `name_bank`, `name_sender`, `pay_img`, `link_invitation`) VALUES
(25, 5, 'Al Di', '412412312', 'inihaldi@gmail.com', 'arab', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0001-01-01', '01:01:00', '1', '1', '0001-01-01', '01:01:00', '1', '1', 1, '1', 1, '1', '1', '1', 1, '1', 1, 'aseloleh (120000 x 1) - ', 120000, '2023-04-20', 'completed', 'kamu', 'cantik', '644e9536cb18a_2.jpg', ''),
(26, 5, 'Al Di', '2131', 'inihaldi@gmail.com', 'indonesia', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0001-01-01', '01:01:00', '1', '1', '0001-01-01', '01:01:00', '1', '1', 1, '1', 1, '1', '1', '1', 1, '1', 1, 'aseloleh (120000 x 1) - ', 120000, '2023-04-20', 'completed', '', '', '', 'fdsfsdfsdsdfsdf'),
(27, 5, 'Al Di', '1231', 'inihaldi@gmail.com', 'indonesia', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0001-01-01', '01:01:00', '1', '1', '0001-01-01', '01:01:00', '1', '1', 1, '1', 1, '1', '1', '1', 1, '1', 1, 'aseloleh (120000 x 1) - ashole (250000 x 2) - ', 620000, '2023-04-20', 'completed', '', '', '', 'anu ya kali'),
(30, 5, 'Al Di', '345353534', 'inihaldi@gmail.com', 'indonesia', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '0002-02-02', '02:02:00', '2', '2', '0002-02-02', '02:02:00', '2', '2', 2, '2', 2, '2', '2', '2', 2, '2', 2, 'aseloleh (120000 x 1) - ', 120000, '2023-04-20', 'completed', 'sdfgsd', 'fsdfsd', '644098be04eae_1.jpg', 'zfsdfljsafsdfl');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `category` int(150) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(5000) NOT NULL,
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
(16, 1, 'aseloleh', 'Setelah sebelumnya Mas Once sudah duduk bareng membahas polemik yang terjadi antaranya dan Mas Ahmad Dhani, kali ini gantian Mas Ahmad Dhani menanggapi Duduk Bareng Anji episode bareng Mas Once.\r\n\r\nSemoga setelah ini semuanya selesai dan baik-baik saja.\r\nKalian berdua legend mas.\r\n\r\nEpisode : Anji Diajak Debat Ahmad Dhani di Studio Legend, Tentang Wawancaranya Dengan Once❗️Duduk Bareng Anji\r\n\r\nSaksikan Duduk Bareng Hanya di kanal Dunia Manji\r\n#DudukBareng #DuniaManji #AhmadDhani', 120000, 'IMG-20220615-WA0012.jpg', 'IMG-20220615-WA0013.jpg', 'IMG-20220615-WA0014.jpg', 'https://www.youtube.com/watch?v=DCKCp740BSc&ab_channel=MASRANG'),
(17, 3, 'ashole', 'Assalamu&#39;alaikum #HajiMuda, Ramadhan ini #NgopiBarengUstad hadir kembali. Cerita bintang tamu yang unik, seru, lucu dan sedih semuanya ada disini, masih Bersama Habib Husein Ja&#39;far Al Hadar (@husein_hadar).\r\n\r\nPerjuangan Dennis Lim untuk mencari kebahagiaan dari yang sempat kesulitan ekonomi, hingga memiliki kekayaan dari hasil sebagai bandar judi. Pencarian Dennis Lim berujung dengan pulang ke Indonesia karena hatinya terketuk untuk mendalami agama. Curahan hati dan perjalanan hidup mantan bandar judi di #NgopiBarengUstad. \r\n\r\nSemoga pengalaman yang dibagikan bisa memberikan hikmah dan manfaat. Jangan lupa Subscribe ya, biar tidak ketinggalan berbagai konten informatif dan Entertaining di YouTube channel BPKH RI. Ditunggu like & commentnya. \r\n\r\nNext ada siapa lagi? Yuk nyalain loncengnya dan nantikan kejutan di #NgopiBarengUstad, Ngobrol santai penuh inspirasi, Santai aja.\r\n#semuabisahaji \r\n\r\n#BPKHRI #HajiIndonesia #JemaahIndonesia #AyoNabungHaji #AyoHajiMuda #Podcast #HabibJafar', 250000, 'baju putih.jpg', 'fag.jpg', 'baju.jpg', 'https://www.youtube.com/watch?v=9EtDR6R4ZDg&ab_channel=DeddyCorbuzier');

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
(5, 'aldi', 'Inihaldi@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab');

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
