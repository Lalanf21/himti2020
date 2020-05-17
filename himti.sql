-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2020 at 12:23 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `himti`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `id_anggota` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nama_anggota` varchar(100) NOT NULL,
  `nama_divisi` varchar(100) NOT NULL,
  `angkatan` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `minat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`id_anggota`, `nim`, `nama_anggota`, `nama_divisi`, `angkatan`, `foto`, `minat`) VALUES
(7, '1755201278', 'Lalan fathurrahman Bastami', 'SDM', '2015 - 2016', 'a1412cf63a3ecb8ac83eadbcb9435690.JPG', 'Web Programming'),
(8, '1755201265', 'Adiwinarno', 'Ketua', '2016 - 2017', 'e4d69b4baa05e5d37d3973eed3381b5d.png', 'Web Programming'),
(10, '1755201232', 'M maulana Ilham', 'Wakil ketua', '2016 - 2017', '9760ae9c02d89739bf5b85a5c41703ca.png', 'Jaringan Komputer'),
(11, '1855201265', 'Jenal', 'SDM', '2017 - 2018', '4c69954711513ddbd76f2ba352cc5bb9.png', 'Web Programming'),
(12, '1855201267', 'Romli', 'SDM', '2017 - 2018', '1907e4901a7f44eda709e85aa41da0f8.png', 'Web Programming');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_artikel`
--

CREATE TABLE `tbl_artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `publish` int(1) NOT NULL,
  `view` int(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_artikel`
--

INSERT INTO `tbl_artikel` (`id_artikel`, `judul`, `slug`, `isi`, `tanggal`, `penulis`, `gambar`, `publish`, `view`) VALUES
(8, 'Munculnya Generasi Terbaru RAM DDR 5', 'munculnya-generasi-terbaru-ram-ddr-5.html.html', ']RAM (Random Access Memory) dalam sebuah komputer sangatlah penting. RAM merupakan komponen terpentingdalam membantu tugas prosesor. RAM sangat berpengaruh dalam mendongkrak sistem untuk menyelesaikan tugas atau proses dengan cepat.;Pada kesempatan kali ini, kami dari HIMTI UMT akan membahas kabar mengenai RAM. Informasi&amp;amp;nbsp; terbaru menyebutkan&amp;amp;nbsp; bahwa standar generasi RAM berikutnya akan menawarkan&amp;amp;nbsp; perbaikan dan pembaruan atas kondisi RAM pada saat ini.Generasi terbaru RAM yang ada saat ini, yaitu RAM DDR Perusahaan yang bertanggung jawab dalam menetapkan standarisasi memori teknologi komputer, Joint Electronic&amp;amp;nbsp; Device Engineering Council (JEDEC) menginformasikan mengenai generasi memori komputer yang akan muncul pada tahun 2018 yaitu DDR 5 yang memiliki dua kali lipat bandwidth memory dan kepadatan dari DDR 4. DDR 5 juga di informasikan lebih hemat daya dibandingkan dengan DDR 4. Namun JEDEC belum menginformasikan&amp;amp;nbsp; spesifikasi lengkap dari DDR 5&amp;amp;lt;/p&amp;amp;gt;&amp;amp;lt;p&amp;amp;gt;Yang kita ketahui pada saat ini kecepatan DDR 4 dimulai dari 2133Mhz. Kecepatan tersebut adalah batas tertinggi dari DDR 3. DDR 4 mungkin diteruskan sampai 3200Mhz. Sehingga DDR 5 dimungkinkan mampu memberikan kecepatan 4266Mhz hingga 6400Mhz. Dan selain itu DDR % di janjikan akan memberikan interface &amp;ldquo;User Friendly&amp;quot; yang memungkinkan konfigurasi penyimpanan lebih baik&amp;amp;lt;/p&amp;amp;gt;                            ', '2020-04-03', 'test', 'e6404f369ed6cc11149990f8df02a9f5.jpg', 1, 17),
(9, 'test', 'test.html', 'asd', '2020-04-04', 'test', 'caf7ac2d357b2d97ef642b31a2c2fb7a.jpg', 1, 3),
(10, 'test kedua', 'test-kedua.html', 'asdasd', '2020-04-04', 'test', '8ebcde76cedac42bfee98c3643e62bb0.png', 1, 1),
(11, 'test keempat', 'test-keempat.html', 'asdasdsaasd', '2020-04-04', 'test', '46130f34cd25cf211cfc57d07fe9e826.jpg', 1, 0),
(12, 'test kelima', 'test-kelima.html', '&amp;lt;p&amp;gt;test keli,a&amp;lt;/p&amp;gt;&amp;lt;p&amp;gt;&amp;lt;br&amp;gt;&amp;lt;/p&amp;gt;', '2020-04-04', 'test', '9a2b8e7fc7601db7e9437b8e844dc7e8.jpg', 1, 4),
(13, 'test-kelima', 'tesst-kelima.html', 'gaga', '2020-04-04', 'test', '772996855d85e4624e9e1c39f2a72eec.jpg', 1, 4),
(14, 'test ketujuh', 'test-ketujuh.html', '&amp;lt;p&amp;gt;asdasdasd&amp;lt;/p&amp;gt;&amp;lt;p&amp;gt;asd&amp;lt;br&amp;gt;&amp;lt;/p&amp;gt;', '2020-04-04', 'test', '1818c3f225349229176e5e8ecc0da89d.jpg', 1, 3),
(15, 'test benar', 'test-benar.html', '                                                                <p>haha </p><p>haha hihi</p><p>ihi<br></p>                                                        ', '2020-04-04', 'test', 'f3a849d0a700ee8b98a399f6c499476f.jpg', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_carousel_setting`
--

CREATE TABLE `tbl_carousel_setting` (
  `id_carousel` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_carousel_setting`
--

INSERT INTO `tbl_carousel_setting` (`id_carousel`, `image`) VALUES
(2, 'timeline_web_1.jpg'),
(3, 'timeline_web_2.jpg'),
(4, 'timeline_web_3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_divisi`
--

CREATE TABLE `tbl_divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_divisi`
--

INSERT INTO `tbl_divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'SDM'),
(2, 'Hubungan Masyarakat'),
(3, 'Ketua'),
(4, 'Wakil ketua'),
(5, 'Evaluasi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `id_events` int(11) NOT NULL,
  `nama_events` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `waktu` varchar(50) NOT NULL,
  `tempat` varchar(150) NOT NULL,
  `kuota` varchar(10) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `publish` int(1) NOT NULL,
  `view` int(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`id_events`, `nama_events`, `slug`, `tanggal`, `deskripsi`, `gambar`, `waktu`, `tempat`, `kuota`, `harga`, `publish`, `view`) VALUES
(1, 'HIMTI-Fest Workshop di edit', 'HIMTI-Fest-Workshop.html', '2020-04-15', '                                                                                                                                <p>bla bla la </p><p>bla bla bla <br></p>\"\r\n                            \"\r\n                            \"\r\n                            \"\r\n                            ', '04c2a84e0a7db25185ead6d10bdec5ff.png', '08:00-16:00', 'Aula pendopo kabupaten tangerang', '100', '100000', 1, 15),
(2, 'test evebts', 'test-evebts.html', '2020-05-27', 'test', '580feaf2759f331ced0336c6db3293e3.jpg', '08:00-16:00', 'dimana saja', '100', '200000', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_home_setting`
--

CREATE TABLE `tbl_home_setting` (
  `id_home_setting` int(11) NOT NULL,
  `welcome_message` text NOT NULL,
  `about_message` text NOT NULL,
  `link_yt` varchar(100) NOT NULL,
  `link_ig` varchar(50) NOT NULL,
  `link_email` varchar(50) NOT NULL,
  `link_fb` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_home_setting`
--

INSERT INTO `tbl_home_setting` (`id_home_setting`, `welcome_message`, `about_message`, `link_yt`, `link_ig`, `link_email`, `link_fb`) VALUES
(1, 'selamat datang di website resmi Himpunan Mahasiswa Teknik Informatika Universitas Muhammadiyah Tangerang (HIMTI-UMT).\r\n\r\nDisini anda dapat menemukan informasi mengenai kegiatan kemahasiswaan dilingkungan Universitas Muhammadiyah Tangerang dan event terbaru dari kami', 'Himpunan Mahasiswa Teknik Informatika (HIMTI) adalah sebuah Organisasi.yang bergerak di bidang', 'https://www.youtube.com/channel/UCiIhUjjcEp4S_kOvQU_BW8A', 'https://www.instagram.com/himti.umt/', 'himti.umt11@gmail.com', 'https://m.facebook.com/groups/106563542742238');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_modul`
--

CREATE TABLE `tbl_modul` (
  `id_modul` int(11) NOT NULL,
  `modul` varchar(100) NOT NULL,
  `nama_peminatan` varchar(50) NOT NULL,
  `download` int(11) NOT NULL,
  `share` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_modul`
--

INSERT INTO `tbl_modul` (`id_modul`, `modul`, `nama_peminatan`, `download`, `share`) VALUES
(5, 'java-dasar.pdf', 'Java programming', 1, 1),
(6, 'phpFundamental.pdf', 'Web Programming', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peminatan`
--

CREATE TABLE `tbl_peminatan` (
  `id_peminatan` int(11) NOT NULL,
  `nama_peminatan` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_peminatan`
--

INSERT INTO `tbl_peminatan` (`id_peminatan`, `nama_peminatan`, `status`) VALUES
(1, 'Web Programming', 1),
(2, 'Java programming', 1),
(3, 'Multimedia', 1),
(4, 'Jaringan Komputer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_anggota` varchar(100) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('superadmin','admin','penulis','anggota') NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id_pengguna`, `nama_anggota`, `nim`, `password`, `level`, `status`) VALUES
(2, 'Lalan fathurrahman Bastami', '1755201278', '$2y$10$E1r3fzBOK0.vCrLZ2f2kxuaSC3MgbcC/SIESKE.dtFQfEll/Vwbgy', 'superadmin', 1),
(4, 'Adiwinarno', '1755201265', '$2y$10$BE03827V7LScz6G/qPQWteoZu60lrp/8twAXJ3udBZ7OHuq3OfoXK', 'superadmin', 1),
(7, 'M maulana Ilham', '1755201232', '$2y$10$GhjwlZG74T0K5FmnlTLIYeRYpZvU1lccjI5Ol68SQzP264OEP4Q/.', 'superadmin', 1),
(8, 'Jenal', '1855201265', '$2y$10$waVBd6tYacJ29BCyBkSAGuALfHhkoFqeIj3Lt5xNnIgP96OZN0bZm', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_struktural`
--

CREATE TABLE `tbl_struktural` (
  `id_struktural` int(11) NOT NULL,
  `nama_anggota` varchar(100) NOT NULL,
  `nama_divisi` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_struktural`
--

INSERT INTO `tbl_struktural` (`id_struktural`, `nama_anggota`, `nama_divisi`, `jabatan`) VALUES
(1, 'Jenal', 'SDM', 'anggota'),
(2, 'Romli', 'SDM', 'koordinator'),
(5, 'Lalan fathurrahman Bastami', 'SDM', 'anggota');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tahun_angkatan`
--

CREATE TABLE `tbl_tahun_angkatan` (
  `id_angkatan` int(11) NOT NULL,
  `tahun_angkatan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tahun_angkatan`
--

INSERT INTO `tbl_tahun_angkatan` (`id_angkatan`, `tahun_angkatan`) VALUES
(1, '2015 - 2016'),
(2, '2016 - 2017'),
(3, '2017 - 2018');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_talkshow`
--

CREATE TABLE `tbl_talkshow` (
  `id_peserta_seminar` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `semester` int(1) NOT NULL,
  `asal_kampus` varchar(50) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_talkshow`
--

INSERT INTO `tbl_talkshow` (`id_peserta_seminar`, `nama`, `semester`, `asal_kampus`, `fakultas`, `email`, `no_hp`) VALUES
(30, 'test', 3, 'UMT', 'HUKUM', 'lalanfathurrahman@ft-umt.ac.id', '2312300'),
(31, 'Lalan', 7, 'UMT', 'Teknik', 'lalanfathurrahman@gmail.com', '0899826374');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('superadmin','admin','penulis') NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `level`, `is_active`) VALUES
(5, 'lalan', '$2y$10$LUI1hiWz6X8ihdBMroOcFOy0y9zpClKVy0bwRTGA9lN2J/hO/mE7W', 'superadmin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visi_misi`
--

CREATE TABLE `tbl_visi_misi` (
  `id_visi_misi` int(11) NOT NULL,
  `visi_misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_visi_misi`
--

INSERT INTO `tbl_visi_misi` (`id_visi_misi`, `visi_misi`) VALUES
(1, '                                                                HIMTI bertujuan untuk mewujudkan manusia - manusia yang menjunjung tinggi tanggung jawab, moralitas, kepedulian sosial, spiritual, keagungan akhlak, keluasan ilmu, kematangan profesional demi terwujudnya masyarakat madani dan membantuterciptanya sumber daya manusia yang berkualitas dan berdedikasi sehingga menjadi terdepan dalam teknologi informasi yang berkembang.                                                         '),
(2, '                                                                Berperan untuk menampung, menyalurkan, dan mengembangkan aspirasi mahasiswa-mahasiswa.                                                         '),
(4, 'Menyelenggarakan pembelajaran secara bertahap dan kontinyu untuk mengembangkan potensi akademik maupun non-akademik.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tbl_artikel`
--
ALTER TABLE `tbl_artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `tbl_carousel_setting`
--
ALTER TABLE `tbl_carousel_setting`
  ADD PRIMARY KEY (`id_carousel`);

--
-- Indexes for table `tbl_divisi`
--
ALTER TABLE `tbl_divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD PRIMARY KEY (`id_events`);

--
-- Indexes for table `tbl_home_setting`
--
ALTER TABLE `tbl_home_setting`
  ADD PRIMARY KEY (`id_home_setting`);

--
-- Indexes for table `tbl_modul`
--
ALTER TABLE `tbl_modul`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `tbl_peminatan`
--
ALTER TABLE `tbl_peminatan`
  ADD PRIMARY KEY (`id_peminatan`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tbl_struktural`
--
ALTER TABLE `tbl_struktural`
  ADD PRIMARY KEY (`id_struktural`);

--
-- Indexes for table `tbl_tahun_angkatan`
--
ALTER TABLE `tbl_tahun_angkatan`
  ADD PRIMARY KEY (`id_angkatan`);

--
-- Indexes for table `tbl_talkshow`
--
ALTER TABLE `tbl_talkshow`
  ADD PRIMARY KEY (`id_peserta_seminar`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_visi_misi`
--
ALTER TABLE `tbl_visi_misi`
  ADD PRIMARY KEY (`id_visi_misi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_artikel`
--
ALTER TABLE `tbl_artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_carousel_setting`
--
ALTER TABLE `tbl_carousel_setting`
  MODIFY `id_carousel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_divisi`
--
ALTER TABLE `tbl_divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `id_events` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_home_setting`
--
ALTER TABLE `tbl_home_setting`
  MODIFY `id_home_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_modul`
--
ALTER TABLE `tbl_modul`
  MODIFY `id_modul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_peminatan`
--
ALTER TABLE `tbl_peminatan`
  MODIFY `id_peminatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_struktural`
--
ALTER TABLE `tbl_struktural`
  MODIFY `id_struktural` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_tahun_angkatan`
--
ALTER TABLE `tbl_tahun_angkatan`
  MODIFY `id_angkatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_talkshow`
--
ALTER TABLE `tbl_talkshow`
  MODIFY `id_peserta_seminar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_visi_misi`
--
ALTER TABLE `tbl_visi_misi`
  MODIFY `id_visi_misi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
