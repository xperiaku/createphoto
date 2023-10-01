-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Bulan Mei 2023 pada 10.53
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
(83, 5, 17, 'ashole', 250000, 1, 'baju putih.jpg');

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
(17, 3, 'ashole', 'Assalamu&#39;alaikum #HajiMuda, Ramadhan ini #NgopiBarengUstad hadir kembali. Cerita bintang tamu yang unik, seru, lucu dan sedih semuanya ada disini, masih Bersama Habib Husein Ja&#39;far Al Hadar (@husein_hadar).\r\n\r\nPerjuangan Dennis Lim untuk mencari kebahagiaan dari yang sempat kesulitan ekonomi, hingga memiliki kekayaan dari hasil sebagai bandar judi. Pencarian Dennis Lim berujung dengan pulang ke Indonesia karena hatinya terketuk untuk mendalami agama. Curahan hati dan perjalanan hidup mantan bandar judi di #NgopiBarengUstad. \r\n\r\nSemoga pengalaman yang dibagikan bisa memberikan hikmah dan manfaat. Jangan lupa Subscribe ya, biar tidak ketinggalan berbagai konten informatif dan Entertaining di YouTube channel BPKH RI. Ditunggu like & commentnya. \r\n\r\nNext ada siapa lagi? Yuk nyalain loncengnya dan nantikan kejutan di #NgopiBarengUstad, Ngobrol santai penuh inspirasi, Santai aja.\r\n#semuabisahaji \r\n\r\n#BPKHRI #HajiIndonesia #JemaahIndonesia #AyoNabungHaji #AyoHajiMuda #Podcast #HabibJafar', 250000, 'baju putih.jpg', 'fag.jpg', 'baju.jpg', 'https://www.youtube.com/watch?v=9EtDR6R4ZDg&ab_channel=DeddyCorbuzier'),
(20, 3, 'jaya', '148.490 x ditonton  7 Apr 2023  #scirocco #pengepulmobil\r\n#scirocco #pengepulmobil #sciroccogisel\r\n\r\nPemesanan lampu saber bisa kunjungi \r\ninstagram @saber.industries\r\natau ke cabang  @Yoong Motor Indonesia  terdekat di kota anda\r\n\r\nTOKOPEDIA\r\nhttps://www.tokopedia.com/pengepulmobil\r\n\r\nKABEL KEJUJURAN \r\nhttps://tokopedia.link/P5cSjZBW2xb\r\n\r\nPOWERBANK SIMIAN\r\nhttps://tokopedia.link/FPoc5zpZ2xb\r\n\r\nPengepul Towing\r\n0813 - 6163 - 0000\r\n\r\nBengkel audio mobil kita @bbswithpengepulmobil\r\n0813 - 6163 - 0000\r\n\r\nJangan lupa Follow instagram \r\n@Pengepul_Mobil\r\n@Reagancp', 250000, 'wolf-howling-moon-starry-night-landscape-minimalist-minimalism-y7336.jpg', 'spiderman-wallpaper-4k-0.jpg', 'fox-forest-trees-mountains-minimalist-minimalism-y7342.jpg', 'https://www.youtube.com/watch?v=7-DQjIswcsc&ab_channel=PengepulMobil'),
(21, 2, 'silver', '1.031.098 x ditonton  24 Nov 2022  #evo9 #evo8 #evo\r\nFollow the Evo builds on Instagram: https://www.instagram.com/chrisgoorba...\r\n\r\nThe Grand Finale on the exterior! Man this video is special to me! We finally did it! After so long changing, restoring or replacing parts the JDM Evo 8 is finally out! I still can&#39;t believe this is my car! So many days and work went into this car I really hope you guys enjoy the video and the way the car came out! Like always if you guys have any questions don&#39;t hesitate to leave them down in the comments!\r\n\r\nAll items used on this video are listed below:\r\n\r\nDetailing Products:\r\nGtechniq ceramic coating: https://bit.ly/3gtKAW9\r\nIron Buster: https://bit.ly/3Vkkbc7\r\nJescar Correcting Compound: https://bit.ly/3OxZiYT\r\nSonax Perfect Finish: https://bit.ly/3V2bwvf\r\nRupes Yellow Foam Pad 3 Inch: https://bit.ly/3ExVLVM\r\nRupes Yellow Foam Pad 6 Inch: https://bit.ly/3gwDHU2\r\nRupes Wool Pad 3 inch: https://bit.ly/3VqX8MRv\r\nRupes Wool pad 6 Inch: https://bit.ly/3i2qlz7\r\nMeguiars Microfiber 3inch Pad: https://bit.ly/3AD1992\r\nMeguiars Microfiber 6inch Pad: https://bit.ly/3EqXJac\r\n3 inch Polisher: https://amzn.to/3TXAryt\r\nMeguiars Clay Bar: https://amzn.to/3V0EawA\r\nMeguiars Natural shine: https://amzn.to/3XpZmOj\r\nDetailing Brushes: https://amzn.to/3VknTCz\r\nMicrofiber Towels: https://bit.ly/3EUCqiO\r\nDecontamination soap: https://bit.ly/3AHdvNk\r\nSteamer: https://amzn.to/3VO6en2\r\nOptimum no rinse: https://amzn.to/3V6lz2q\r\nInterior cleaner: https://bit.ly/3Xtqhsr\r\nMeguiars Carpet Upholstery cleaner: https://amzn.to/3VhqSeM\r\nMothers aluminium polish: https://amzn.to/3VfBlaY\r\nPolisher: https://www.harborfreight.com/75-amp-...\r\n\r\nWall Mounted Pressure washer setup:\r\n1. Karcher Pressure Washer K1700 Cube - https://amzn.to/2Zp7lyc\r\n2. SS Water Inlet Hose - https://amzn.to/3quj6zd\r\n3. Stainless Steel Wall Mounted Shelf - https://amzn.to/2ZmdKuf\r\n4. Blue Cox Reel 112-3-100 - https://amzn.to/3qrVlrz\r\n5. Black Cox Reel - https://bit.ly/31lXwlI\r\n6. 3’ Jumper Hose: $27 - https://bit.ly/3tRngT2\r\n7. Grey MTM Hydro Kobra Jet Hose 75’ - https://amzn.to/3s5h0qb\r\n8. Stainless Steel 1/4&#34; Nozzle 4 Pack: $16 - https://bit.ly/3fiQoii\r\n9. Pressure washer gun: https://bit.ly/3tXSkRm\r\n10. Swivel Pressure washer gun - https://bit.ly/3rnPnI8\r\n11. Ultimate nozzle hose: https://amzn.to/31jELiD\r\n\r\n\r\nCamera Equipment I Use:\r\nMain Camera: https://amzn.to/3BXpZSn\r\nLense 24-70 Sony: https: https://amzn.to/3JNs5G8\r\nLense 16-35 Sony: https://amzn.to/3C0A7d1\r\nGimbal: https://amzn.to/3c13fnx\r\nCamera Backpack: https://amzn.to/35X9a9p\r\nGo pro: https://amzn.to/3QhHQYC\r\nTripod: https://amzn.to/3zQzW14\r\nBackup Camera: https://amzn.to/3AcK1a5\r\nEditing Computer: https://amzn.to/3pt16Xr\r\n\r\n\r\n#evo #evo9 #evo8', 13600600, '04.jpg', '2.jpg', '716030821.jpg', 'https://www.youtube.com/watch?v=UbYONxCvd8g&ab_channel=ChrisGoorbarry'),
(23, 1, 'Al Di', '\r\n\r\n    \r\n    \r\n    \r\n    Halaman Awal\r\n\r\n    \r\n    \r\n\r\n    \r\n\r\n    \r\n\r\n\r\n\r\n\r\n\r\n    \r\n\r\n    \r\n\r\n        tambahkan promo\r\n\r\n        \r\n            \r\n                \r\n                    Kode Promo *\r\n                    \r\n                \r\n                \r\n                    Diskon *\r\n                    \r\n                \r\n                \r\n                    Banner Promo *\r\n                    \r\n                \r\n                \r\n                    Mulai Promo *\r\n                    \r\n                \r\n            \r\n            Tambah Promo\r\n        \r\n    \r\n\r\n\r\n    \r\n\r\n\r\n\r\n', 214113, '13.jpg', 'IMK.jpg', '521004.jpg', 'https://www.youtube.com/watch?v=7-DQjIswcsc&ab_channel=PengepulMobil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `promo`
--

CREATE TABLE `promo` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `discount` int(10) NOT NULL,
  `image_01` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `promo`
--

INSERT INTO `promo` (`id`, `code`, `discount`, `image_01`) VALUES
(48, 'ongkir-UAS', 5, '2.jpg'),
(50, 'UAS10', 5, '04.jpg');

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
-- Indeks untuk tabel `promo`
--
ALTER TABLE `promo`
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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT untuk tabel `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `promo`
--
ALTER TABLE `promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
