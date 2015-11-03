-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27 Okt 2015 pada 04.35
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testkec`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `indek` int(2) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `passid` varchar(40) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `acces` int(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`indek`, `userid`, `passid`, `nama`, `acces`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Denny Septianto', 0),
(8, 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'Super Admin', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_atas`
--

CREATE TABLE IF NOT EXISTS `menu_atas` (
  `index` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `kategori` int(11) NOT NULL,
  `link` varchar(30) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_atas`
--

INSERT INTO `menu_atas` (`index`, `nama`, `kategori`, `link`) VALUES
(1, 'Home', 0, '?page=index'),
(6, 'Sign In', 0, '?page=login'),
(2, 'Statistik', 1, '?page=statistik'),
(3, 'Tes IQ', 1, '?page=tes'),
(4, 'Contact', 1, '?page=contact'),
(7, 'Log Out', 1, 'logout.php'),
(5, 'Setting', 1, 'index.php?page=setting');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_samping`
--

CREATE TABLE IF NOT EXISTS `menu_samping` (
  `index` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `kategori` int(11) NOT NULL,
  `link` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE IF NOT EXISTS `peserta` (
  `id` char(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id`, `password`, `nama`, `email`, `tgl_lahir`, `tgl_daftar`) VALUES
('indraokt', 'e00b29d5b34c3f78df09d45921c9ec47', 'Dwi Indra Oktoviandy', 'mrx_koplax@yahoo.com', '1994-10-14', '2013-12-14'),
('Feri', '3ee138f529418987592c459eb8b71432', 'Feri Ganteng', 'feri_ganteng01@yahoo.com', '2000-05-30', '2013-12-28'),
('Denny', '827ccb0eea8a706c4c34a16891f84e7b', 'Denny Septianto', 'septiantodenny@gmail.com', '1994-09-12', '2015-09-27'),
('arif', '0ff6c3ace16359e41e37d40b8301d67f', 'arif', 'arif@mail.com', '1992-09-01', '2015-09-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE IF NOT EXISTS `soal` (
  `kd_kategori` char(3) NOT NULL,
  `kd_soal` int(6) NOT NULL,
  `soal` varchar(500) NOT NULL,
  `pil_a` varchar(200) NOT NULL,
  `pil_b` varchar(200) NOT NULL,
  `pil_c` varchar(200) NOT NULL,
  `pil_d` varchar(200) NOT NULL,
  `kunci` enum('A','B','C','D') NOT NULL,
  `skor` int(1) NOT NULL,
  `status` enum('publish','unpublish') NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`kd_kategori`, `kd_soal`, `soal`, `pil_a`, `pil_b`, `pil_c`, `pil_d`, `kunci`, `skor`, `status`) VALUES
('k3', 1, '<img src="administrator/upload/1.gif" alt="Soal Pertama" />       ', '<img src="administrator/upload/1a.gif" alt="Jawaban A" />       ', '<img src="administrator/upload/1b.gif" alt="Jawaban B" />       ', '<img src="administrator/upload/1c.gif" alt="Jawaban C" />       ', '<img src="administrator/upload/1d.gif" alt="Jawaban D" />       ', 'A', 3, 'publish'),
('k2', 2, '<img src="administrator/upload/2.gif" alt="soal nomor 2" /> ', '<img src="administrator/upload/2a.gif" alt="jawaban a" /> ', '<img src="administrator/upload/2b.gif" alt="jawaban 2b" /> ', '<img src="administrator/upload/2c.gif" alt="jawaban 2c" /> ', '<img src="administrator/upload/2d.gif" alt="jawaban 2d" /> ', 'D', 1, 'publish'),
('k1', 3, '<img src="administrator/upload/3.gif" alt="soal nomor 3" />  ', '<img src="administrator/upload/3a.gif" alt="jawaban a" />  ', '<img src="administrator/upload/3b.gif" alt="jawaban b" />  ', '<img src="administrator/upload/3c.gif" alt="jawaban c" />  ', '<img src="administrator/upload/3d.gif" alt="jawaban d" />  ', 'C', 2, 'publish'),
('k2', 4, '<img src="administrator/upload/4.gif" alt="soal" />  ', '<img src="administrator/upload/4a.gif" alt="jawaban a" />  ', '<img src="administrator/upload/4b.gif" alt="jawaban b" />  ', '<img src="administrator/upload/4c.gif" alt="jawaban c" />  ', '<img src="administrator/upload/4d.gif" alt="jawaban d" />  ', 'A', 1, 'publish'),
('k1', 5, '<img src="administrator/upload/5.gif" alt="soal" />', '<img src="administrator/upload/5a.gif" alt="jawaban a" />', '<img src="administrator/upload/5b.gif" alt="jawaban b" />', '<img src="administrator/upload/5c.gif" alt="jawaban c" />', '<img src="administrator/upload/5d.gif" alt="jawaban d" />', 'B', 1, 'publish'),
('k2', 6, '<img src="administrator/upload/6.gif" alt="soal" /> ', '<img src="administrator/upload/6a.gif" alt="jawaban a" /> ', '<img src="administrator/upload/6b.gif" alt="jawaban b" /> ', '<img src="administrator/upload/6c.gif" alt="jawaban c" /> ', '<img src="administrator/upload/6d.gif" alt="jawaban d" /> ', 'B', 2, 'publish'),
('k3', 7, '<img src="administrator/upload/7.gif" alt="soal" /> ', '<img src="administrator/upload/7a.gif" alt="jawaban a" /> ', '<img src="administrator/upload/7b.gif" alt="jawaban b" /> ', '<img src="administrator/upload/7c.gif" alt="jawaban c" /> ', '<img src="administrator/upload/7d.gif" alt="jawaban d" /> ', 'A', 2, 'publish'),
('k1', 9, '<img src="administrator/upload/8.gif" alt="soal" />', '<img src="administrator/upload/8a.gif" alt="jawaban a" />', '<img src="administrator/upload/8b.gif" alt="jawaban b" />', '<img src="administrator/upload/8c.gif" alt="jawaban c" />', '<img src="administrator/upload/8d.gif" alt="jawaban d" />', 'C', 3, 'publish'),
('k2', 10, '<img src="administrator/upload/9.gif" alt="soal" /> ', '<img src="administrator/upload/9a.gif" alt="jawaban a" /> ', '<img src="administrator/upload/9b.gif" alt="jawaban b" /> ', '<img src="administrator/upload/9c.gif" alt="jawaban c" /> ', '<img src="administrator/upload/9d.gif" alt="jawaban d" /> ', 'D', 3, 'publish'),
('k2', 11, '<img src="administrator/upload/10.gif" alt="soal" />', '<img src="administrator/upload/10a.gif" alt="jawaban a" />', '<img src="administrator/upload/10b.gif" alt="jawaban b" />', '<img src="administrator/upload/10c.gif" alt="jawaban c" />', '<img src="administrator/upload/10d.gif" alt="jawaban d" />', 'D', 1, 'publish'),
('k2', 12, '<img src="administrator/upload/11.gif" alt="soal" />', '<img src="administrator/upload/11a.gif" alt="jawaban a" />', '<img src="administrator/upload/11b.gif" alt="jawaban b" />', '<img src="administrator/upload/11c.gif" alt="jawaban c" />', '<img src="administrator/upload/11d.gif" alt="jawaban d" />', 'B', 3, 'publish'),
('k1', 13, '<img src="administrator/upload/12.gif" alt="soal" />', '<img src="administrator/upload/12a.gif" alt="jawaban a" />', '<img src="administrator/upload/12b.gif" alt="jawaban b" />', '<img src="administrator/upload/12c.gif" alt="jawaban c" />', '<img src="administrator/upload/12d.gif" alt="jawaban d" />', 'C', 1, 'publish'),
('k2', 14, '<img src="administrator/upload/13.gif" alt="soal" />', '<img src="administrator/upload/13a.gif" alt="jawaban a" />', '<img src="administrator/upload/13b.gif" alt="jawaban b" />', '<img src="administrator/upload/13c.gif" alt="jawaban c" />', '<img src="administrator/upload/13d.gif" alt="jawaban d" />', 'A', 1, 'publish'),
('k2', 15, '<img src="administrator/upload/14.gif" alt="soal" /> ', '<img src="administrator/upload/14a.gif" alt="jawaban a" /> ', '<img src="administrator/upload/14b.gif" alt="jawaban b" /> ', '<img src="administrator/upload/14c.gif" alt="jawaban c" /> ', '<img src="administrator/upload/14d.gif" alt="jawaban d" /> ', 'D', 2, 'publish'),
('k2', 16, '<img src="administrator/upload/15.gif" alt="soal" />', '<img src="administrator/upload/15a.gif" alt="jawaban a" />', '<img src="administrator/upload/15b.gif" alt="jawaban b" />', '<img src="administrator/upload/15c.gif" alt="jawaban c" />', '<img src="administrator/upload/15d.gif" alt="jawaban d" />', 'B', 2, 'publish'),
('k1', 17, 'Apa warna darah manusia?', 'Hitam', 'Biru', 'Merah', 'Kuning', 'C', 1, 'publish'),
('k1', 18, '<img src="administrator/upload/16.gif" alt="soal" /> \r\njaring-jaring diatas dapart dibuat menjadi bentuk ? ... ', '<img src="administrator/upload/16a.gif" alt="jawaban a" />  ', '<img src="administrator/upload/16b.gif" alt="jawaban b" />  ', '<img src="administrator/upload/16c.gif" alt="jawaban c" />  ', '<img src="administrator/upload/16d.gif" alt="jawaban d" />  ', 'A', 3, 'publish'),
('k2', 19, '<img src="administrator/upload/17.gif" alt="soal" />  ', '<img src="administrator/upload/17a.gif" alt="jawaban a" />  ', '<img src="administrator/upload/17b.gif" alt="jawaban b" />  ', '<img src="administrator/upload/17c.gif" alt="jawaban c" />  ', '<img src="administrator/upload/17d.gif" alt="jawaban d" />  ', 'C', 3, 'publish'),
('k2', 20, '<img src="administrator/upload/18.jpg" alt="soal" />\r\nManakah dari angka tersebut yang berbeda dengan lainnya ?', '<img src="administrator/upload/18a.jpg" alt="jawaban a" /> ', '<img src="administrator/upload/18b.jpg" alt="jawaban b" /> ', '<img src="administrator/upload/18c.jpg" alt="jawaban c" /> ', '<img src="administrator/upload/18d.jpg" alt="jawaban d" /> ', 'A', 2, 'publish'),
('k1', 21, '1, 3, 6, 10, 15, ...', '20', '21', '25', '24', 'B', 1, 'publish'),
('k1', 22, '25, 24, 22, 19, 15, ...', '4', '14', '12', '10', 'D', 1, 'publish'),
('k1', 23, 'Manakah salah satu dari empat yang tidak seperti tiga lainnya ?  ', 'Anjing  ', 'Tikus  ', 'Ular  ', 'Gajah  ', 'C', 2, 'publish'),
('k1', 24, 'PEACH akan menjadi HCAEP sebagaimana 46251 akan menjadi ...', '51462', '15624', '46251', '15264', 'D', 1, 'publish'),
('k2', 25, '<img src="administrator/upload/19.gif" alt="soal" />\r\nJika kedua gambar tersebut digabungkan, maka akan menjadi gambar :', '<img src="administrator/upload/19a.gif" alt="jawaban a" />', '<img src="administrator/upload/19b.gif" alt="jawaban b" />', '<img src="administrator/upload/19c.gif" alt="jawaban c" />', '<img src="administrator/upload/19d.gif" alt="jawaban d" />', 'C', 1, 'publish'),
('k3', 26, 'Pilih angka yang 1/4 dari 1/2 dari 1/5 dari 200 : ', '2 ', '5 ', '10 ', '50 ', 'B', 1, 'publish'),
('k1', 27, 'Angga membutuhkan 13 botol air dari toko. Tetapi Angga hanya dapat membawa 3 botol dalam satu perjalanan. Berapakah kalikah Angga harus melakukan perjalanan dari toko ?', '3', '4', '5', '4,5', 'C', 2, 'publish'),
('k3', 28, '1 - 8 - 27 - ? - 125 - 216', '99', '64', '45', '36', 'B', 1, 'publish'),
('k3', 29, 'Manakah dari dibawah ini yang berbeda dengan lainnya ? ', 'Bunga ', 'Patung ', 'Novel ', 'Lukisan ', 'A', 2, 'publish'),
('k2', 30, '5, 10, 3, 8, 1, ... ', '5 ', '3 ', '6 ', '-2 ', 'C', 2, 'publish'),
('k2', 31, 'Manakah salah satu dari dibawah ini yang berbeda dengan yang lainnya ?', 'Gmail.com', 'Yahoo.com', 'Hotmail.com', 'Ask.com', 'D', 1, 'publish'),
('k3', 32, 'Manakah salah satu dari pilihan dibawah yang berbeda dengan yang lainnya ?', 'Handphone', 'Catatan', 'Komputer', 'Mesin Ketik', 'B', 1, 'publish'),
('k1', 33, '7G, 10J, 13M, 16P, 19S. Urutan selanjutnya adalah . . . ', 'T ', 'U ', 'V ', 'W ', 'C', 2, 'publish'),
('k3', 34, 'Manakah dari huruf berikut, apabila diputar 180 derajat, lalu di refleksikan dalam sebuah kaca dan masih terlihat benar, kecuali ...', 'B', 'D', 'O', 'U', 'D', 1, 'publish'),
('k1', 35, 'Manakah jawaban yang paling tepat untuk melengkapi urutan berikut :\r\ntikus, tupai, ..., harimau, kudanil, paus ', 'Kupu-kupu ', 'Katak ', 'Rusa ', 'Singa ', 'C', 3, 'publish'),
('k1', 36, '<img src="administrator/upload/20.png" alt="soal" />', '<img src="administrator/upload/20a.png" alt="jawaban a" />', '<img src="administrator/upload/20b.png" alt="jawaban b" />', '<img src="administrator/upload/20c.png" alt="jawaban c" />', '<img src="administrator/upload/20d.png" alt="jawaban d" />', 'A', 1, 'publish'),
('k2', 37, 'Perahu adalah untuk air, sebagaimana pesawat terbang adalah untuk ... ', 'Terbang ', 'Langit ', 'Melayang ', 'Udara ', 'D', 1, 'publish'),
('k1', 38, '2, 4, 7, 11, 14, 16. Manakah dari angka tersebut yang tidak sesuai dengan urutan ?  ', '7  ', '11  ', '14  ', '16 ', 'C', 2, 'publish'),
('k1', 39, 'Dibutuhkan waktu 2 jam untuk pergi ke Kota A dengan jarak adalah 120 km, Berapakah kecepatan kendaraan tersebut ? ', '40 ', '60 ', '120 ', '80 ', 'B', 1, 'publish'),
('k1', 40, 'Jika Indra menjual tiket lebih banyak daripada Aris, Aris menjual tiket lebih banyak daripada Beni, dan Beni menjual lebih banyak tiket daripada Jodi, siapakah yang menjual tiket lebih banyak antara Aris dan Jodi ?', 'Sama banyaknya', 'Jodi', 'Aris', 'Beni', 'C', 1, 'publish'),
('k1', 41, 'Kebanyakan bulan memiliki 30 hari, Berapa bulan yang hanya memiliki 28 hari ?  ', '1  ', '2  ', '9', '12', 'A', 2, 'publish'),
('k3', 51, '<img src="administrator/upload/9.gif" alt="soal" />  ', '<img src="administrator/upload/9a.gif" alt="jawaban a" />  ', '<img src="administrator/upload/9b.gif" alt="jawaban b" />  ', '<img src="administrator/upload/9c.gif" alt="jawaban c" />  ', '<img src="administrator/upload/9d.gif" alt="jawaban d" />  ', 'D', 3, 'publish'),
('k2', 43, 'Kamu mengikuti sebuah balapan, kemudian mendahului orang peringkat kedua. Sekarang berada diposisi berapakah kamu?', '1', '2', '3', '4', 'B', 1, 'publish'),
('k3', 44, 'Bagilah 30 dengan setengah (0.5), kemudian tambah dengan 10. Berapa hasilnya ? ', '40 ', '30 ', '60 ', '70 ', 'D', 3, 'publish'),
('k2', 45, 'Bagilah 30 dengan setengah (0.5), kemudian tambah dengan 10. Berapa hasilnya ? ', '40 ', '30 ', '60 ', '70 ', 'D', 3, 'publish'),
('k3', 46, 'Ada 3 apel, kamu mengambil 2 buah. Berapa apelkah yang kamu miliki ?', '1', '2', '3', '5', 'B', 2, 'publish'),
('k2', 47, 'Seorang dokter memberimu 3 pil obat dan memberitahumu untuk meminum obatnya setiap setengah jam. Berapa menitkah pil terakhirmu akan diminum ?  ', '30', '60', '90', '150', 'B', 3, 'publish'),
('k3', 58, 'Seorang dokter memberimu 3 pil obat dan memberitahumu untuk meminum obatnya setiap setengah jam. Berapa menitkah pil terakhirmu akan diminum ?   ', '30', '60', '90', '150', 'B', 3, 'publish'),
('k3', 49, 'Seorang peternak memiliki 17 ekor domba, dan semuanya mati kecuali 9 ekor. Berapakah domba yang tersisa ?  ', '7  ', '8  ', '9  ', '10  ', 'C', 1, 'publish'),
('k3', 50, 'Ambil 1000 dan tambah 40. Sekarang tambah lagi dengan 1000. Kemudian tambah 30. Tambah lagi dengan 1000. Sekarang tambah 20. Tambah lagi dengan 1000. Dan sekarang tambahkan 10. Berapakah totalnya ? ', '4000', '4100', '5000', '6000', 'B', 2, 'publish'),
('k3', 52, '<img src="administrator/upload/17.gif" alt="soal" />   ', '<img src="administrator/upload/17a.gif" alt="jawaban a" />   ', '<img src="administrator/upload/17b.gif" alt="jawaban b" />   ', '<img src="administrator/upload/17c.gif" alt="jawaban c" />   ', '<img src="administrator/upload/17d.gif" alt="jawaban d" />   ', 'D', 3, 'publish'),
('k3', 53, '<img src="administrator/upload/11.gif" alt="soal" />  ', '<img src="administrator/upload/11a.gif" alt="jawaban a" />  ', '<img src="administrator/upload/11b.gif" alt="jawaban b" />  ', '<img src="administrator/upload/11c.gif" alt="jawaban c" />  ', '<img src="administrator/upload/11d.gif" alt="jawaban d" />  ', 'B', 2, 'publish'),
('k2', 59, '<img src="administrator/upload/8.gif" alt="soal" /> ', '<img src="administrator/upload/8a.gif" alt="jawaban a" /> ', '<img src="administrator/upload/8b.gif" alt="jawaban b" /> ', '<img src="administrator/upload/8c.gif" alt="jawaban c" /> ', '<img src="administrator/upload/8d.gif" alt="jawaban d" /> ', 'C', 3, 'publish'),
('k3', 62, 'Perahu adalah untuk air, sebagaimana pesawat terbang adalah untuk ... ', 'Terbang', 'Langit', 'Melayang', 'Udara', 'D', 1, 'publish'),
('k3', 63, '5, 10, 3, 8, 1, ... ', '5', '3', '6', '-2', 'C', 1, 'publish');

-- --------------------------------------------------------

--
-- Struktur dari tabel `test_kategori`
--

CREATE TABLE IF NOT EXISTS `test_kategori` (
  `kd_kategori` char(5) NOT NULL,
  `nm_kategori` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `test_kategori`
--

INSERT INTO `test_kategori` (`kd_kategori`, `nm_kategori`) VALUES
('k1', 'anak-anak'),
('k2', 'remaja'),
('k3', 'dewasa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian`
--

CREATE TABLE IF NOT EXISTS `ujian` (
  `no_ujian` int(5) NOT NULL,
  `id` char(20) NOT NULL,
  `kd_kategori` varchar(5) NOT NULL,
  `tanggal` date NOT NULL,
  `skor` int(3) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ujian`
--

INSERT INTO `ujian` (`no_ujian`, `id`, `kd_kategori`, `tanggal`, `skor`) VALUES
(4, 'indraokt', 'k1', '2013-12-28', 100),
(5, 'indraokt', 'k1', '2013-12-28', 109),
(13, 'Feri', 'k1', '2013-12-28', 103),
(17, 'Feri', 'k2', '2013-12-28', 103),
(24, 'indraokt', 'k3', '2014-01-09', 130),
(19, 'Feri', 'k2', '2013-12-28', 97),
(21, 'Feri', 'k3', '2013-12-28', 124),
(25, 'Denny', 'k3', '2015-09-27', 121),
(26, 'denny', 'k1', '2015-09-27', 118),
(27, 'arif', 'k1', '2015-10-26', 70),
(28, 'arif', 'k1', '2015-10-26', 70),
(29, 'arif', 'k2', '2015-10-26', 70),
(30, 'arif', 'k3', '2015-10-26', 70),
(31, 'arif', 'k1', '2015-10-26', 70),
(32, 'arif', 'k1', '2015-10-26', 70),
(33, 'arif', 'k1', '2015-10-26', 70),
(34, 'arif', 'k1', '2015-10-26', 70),
(35, 'arif', 'k1', '2015-10-26', 70),
(36, 'arif', 'k1', '2015-10-26', 70),
(37, 'arif', 'k1', '2015-10-26', 70),
(38, 'arif', 'k1', '2015-10-26', 70),
(39, 'arif', 'k1', '2015-10-26', 70),
(40, 'arif', 'k1', '2015-10-26', 70),
(41, 'arif', 'k1', '2015-10-26', 70),
(42, 'arif', 'k1', '2015-10-26', 70),
(43, 'arif', 'k1', '2015-10-26', 70),
(44, 'arif', 'k1', '2015-10-26', 70),
(45, 'arif', 'k2', '2015-10-26', 70),
(46, 'arif', 'k1', '2015-10-26', 70),
(47, 'arif', 'k2', '2015-10-26', 100),
(48, 'arif', 'k1', '2015-10-26', 70),
(49, 'arif', 'k1', '2015-10-26', 70),
(50, 'arif', 'k1', '2015-10-26', 70),
(51, 'arif', 'k1', '2015-10-26', 70),
(52, 'arif', 'k1', '2015-10-26', 70),
(53, 'arif', 'k2', '2015-10-26', 73),
(54, 'arif', 'k1', '2015-10-27', 70);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`indek`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `menu_atas`
--
ALTER TABLE `menu_atas`
  ADD PRIMARY KEY (`index`);

--
-- Indexes for table `menu_samping`
--
ALTER TABLE `menu_samping`
  ADD PRIMARY KEY (`index`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`kd_soal`),
  ADD UNIQUE KEY `kd_soal` (`kd_soal`);

--
-- Indexes for table `test_kategori`
--
ALTER TABLE `test_kategori`
  ADD PRIMARY KEY (`kd_kategori`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`no_ujian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `indek` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `menu_atas`
--
ALTER TABLE `menu_atas`
  MODIFY `index` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `menu_samping`
--
ALTER TABLE `menu_samping`
  MODIFY `index` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `kd_soal` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `no_ujian` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
