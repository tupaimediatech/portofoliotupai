-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jun 2021 pada 16.53
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tupai`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(250) NOT NULL,
  `isi` text NOT NULL,
  `img` varchar(200) NOT NULL,
  `tanggal` datetime NOT NULL,
  `link` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `judul_berita`, `isi`, `img`, `tanggal`, `link`) VALUES
(1, 'News Title Here', '<p><strong>Surakata</strong> - Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto consequuntur explicabo sequi officia sunt architecto saepe placeat nostrum aliquam at reiciendis maxime, rem optio, ipsa mollitia et delectus aperiam animi. ?? Lorem ipsum dolor sit amet consectetur adipisicing elit. Error a dolor obcaecati est, voluptate optio architecto nobis. Suscipit molestias earum possimus fuga fugit iste delectus nisi optio recusandae cumque officia dicta, aliquam repellat amet enim nulla pariatur dignissimos! Voluptatibus, libero nostrum. Ab in atque eius asperiores sit ut ex consectetur quis accusamus reprehenderit praesentium soluta ipsum, qui nesciunt dolorem, quaerat error magnam eveniet commodi saepe ipsa reiciendis veniam laboriosam minima.</p>\r\n\r\n<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam veniam velit enim, illum quos consequatur quis ratione eligendi dignissimos laudantium ea soluta facilis hic, exercitationem explicabo magnam nam adipisci sint eos, pariatur voluptate porro earum? Dicta quae et officia fuga non dolore sit ratione veritatis voluptas. Nesciunt architecto maiores similique, quidem consequatur iste impedit officiis magni optio numquam natus odit? Nemo architecto velit quo harum accusamus corporis ut cumque eum eveniet a. Ipsam minima velit, exercitationem et fugit eveniet aperiam doloremque corporis voluptatem necessitatibus beatae sit labore. Soluta, sunt rerum amet deserunt harum obcaecati minima repudiandae autem, dolorem quam mollitia.</p>\r\n', 'mbr-6.jpg', '2021-03-27 00:00:00', 'news-title-here'),
(2, 'Berita Untuk Percobaan', '<p>Isi Beita test percobaan</p>\r\n', 'features3.jpg', '2021-04-07 00:00:00', 'berita-untuk-percobaan'),
(3, 'Pemberitahuan Tentang Berita', '<p>Berita yang akan di tampilkan di halaman berita . maka harus di coba</p>\r\n', 'features4.jpg', '2021-04-07 00:00:00', 'pemberitahuan-tentang-berita'),
(4, 'Pembuatan berita harus sesuai dengan judul', '<p>pembuatan berita harus sesuai dengan judul</p>\r\n', 'features2.jpg', '2021-04-07 00:00:00', 'pembuatan-berita-harus-sesuai-dengan-judul');

-- --------------------------------------------------------

--
-- Struktur dari tabel `project`
--

CREATE TABLE `project` (
  `id_project` int(11) NOT NULL,
  `nama_project` varchar(250) NOT NULL,
  `service_id` int(11) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `status` varchar(250) NOT NULL,
  `img` text NOT NULL,
  `tanggal_mulai` datetime DEFAULT NULL,
  `tanggal_selesai` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `project`
--

INSERT INTO `project` (`id_project`, `nama_project`, `service_id`, `deskripsi`, `status`, `img`, `tanggal_mulai`, `tanggal_selesai`) VALUES
(1, 'Tupai Tech', 9, 'Pembuatan Web Utama Tupai tech', 'Done', 'mbr-4.jpg', '2021-05-30 00:00:00', '2021-06-16 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `service`
--

CREATE TABLE `service` (
  `id_service` int(11) NOT NULL,
  `nama_service` varchar(250) NOT NULL,
  `img` varchar(250) NOT NULL,
  `deskripsi` text NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `service`
--

INSERT INTO `service` (`id_service`, `nama_service`, `img`, `deskripsi`, `link`) VALUES
(8, 'IT Consultancy', 'mbr-1.jpg', 'IT Consultancy Tupai Tech', 'itconsultancy'),
(9, 'Website Development', 'features2.jpg', 'Website Development Tupai Tech', 'websitedevelopment');

-- --------------------------------------------------------

--
-- Struktur dari tabel `team`
--

CREATE TABLE `team` (
  `id_team` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `posisi` varchar(250) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  `ig` text DEFAULT NULL,
  `fb` text DEFAULT NULL,
  `twt` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `team`
--

INSERT INTO `team` (`id_team`, `nama`, `posisi`, `deskripsi`, `img`, `ig`, `fb`, `twt`) VALUES
(6, 'Reza Rivaldo', 'CEO ', 'CEO Tupai Tech ', 'default.jpg', '', 'https://www.facebook.com/', 'https://twitter.com/'),
(7, 'Ihsan Budiono', 'BACKEND', 'Backendnya Tupai Tech', 'team2.jpg', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `posisi` varchar(200) NOT NULL,
  `img` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `password`, `posisi`, `img`) VALUES
(1, 'admin', 'admin', '$2y$10$9uAKnax9/7HoMVtMFWDUEe6GhtWdq5SIn75AWwHnYboKctXCfybVG', 'Admin', 'default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`);

--
-- Indeks untuk tabel `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`);

--
-- Indeks untuk tabel `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id_team`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `service`
--
ALTER TABLE `service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `team`
--
ALTER TABLE `team`
  MODIFY `id_team` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
