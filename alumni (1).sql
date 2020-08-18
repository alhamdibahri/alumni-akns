-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jun 2019 pada 11.06
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `tanggal_comment` date NOT NULL,
  `deskripsi_comment` text NOT NULL,
  `kode_post` varchar(8) NOT NULL,
  `kodeuser` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `comment`
--

INSERT INTO `comment` (`id`, `tanggal_comment`, `deskripsi_comment`, `kode_post`, `kodeuser`) VALUES
(1, '2019-05-01', 'dfsg', 'PST-002', 'USR-002'),
(2, '2019-05-01', 'sggdg', 'PST-002', 'USR-002'),
(4, '2019-06-06', 'ajdi ganteng coyy', 'PST-001', 'USR-002'),
(6, '2019-06-08', 'ggwp', 'PST-001', 'USR-001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_alumni`
--

CREATE TABLE `data_alumni` (
  `kode_alumni` varchar(10) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(40) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `tahun_angkatan` year(4) NOT NULL,
  `tahun_lulusan` date NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `kodeuser` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_alumni`
--

INSERT INTO `data_alumni` (`kode_alumni`, `nama_lengkap`, `tanggal_lahir`, `tempat_lahir`, `jenis_kelamin`, `no_hp`, `alamat`, `tahun_angkatan`, `tahun_lulusan`, `jurusan`, `kodeuser`) VALUES
('ALM-001', 'Rizal Al Aziz', '2000-03-03', 'Saronggi', 'L', '082245698724', 'Saronggi Pagar Batu', 2012, '2019-04-19', 'Multimedia', 'USR-002'),
('ALM-002', 'Ajdicuy', '0000-00-00', '', 'L', '', '', 0000, '0000-00-00', '', 'USR-003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `kodeuser` varchar(8) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(32) NOT NULL,
  `isaktif` enum('0','1') NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`kodeuser`, `username`, `password`, `level`, `email`, `token`, `isaktif`, `waktu`) VALUES
('USR-001', 'admin', '12345678', 'Admin', 'alhamdiferdiawanbahri@gmail.com', '12345671231441', '1', '2019-04-14 20:15:10'),
('USR-002', 'rizal', 'rizal123', 'User', 'rizal.aziz888@gmail.com', 'a657b1efd24567395d8b94f20c6da423', '1', '2019-04-15 02:45:51'),
('USR-003', 'ajdi', 'ajdi1234', 'User', 'ajdi@gmail.com', '5867b9d573cb52870577f7a5d92eed20', '1', '2019-06-06 14:22:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `kode_post` varchar(8) NOT NULL,
  `tanggal_post` date NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `views` int(11) NOT NULL,
  `kodeuser` varchar(8) NOT NULL,
  `id_type` varchar(8) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`kode_post`, `tanggal_post`, `judul`, `deskripsi`, `gambar`, `views`, `kodeuser`, `id_type`, `waktu`) VALUES
('PST-001', '2019-04-22', 'Lowongan Kerja Daerah Sumenep', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium nam quas inventore, ut iure iste modi eos adipisci ad ea itaque labore earum autem nobis et numquam, minima eius. Nam eius, non unde ut aut sunt eveniet rerum repellendus porro.\r\n\r\nSint ab voluptates itaque, ipsum porro qui obcaecati cumque quas sit vel. Voluptatum provident id quis quo. Eveniet maiores perferendis officia veniam est laborum, expedita fuga doloribus natus repellendus dolorem ab similique sint eius cupiditate necessitatibus, magni nesciunt ex eos.\r\n\r\nQuis eius aspernatur, eaque culpa cumque reiciendis, nobis at earum assumenda similique ut? Aperiam vel aut, ex exercitationem eos consequuntur eaque culpa totam, deserunt, aspernatur quae eveniet hic provident ullam tempora error repudiandae sapiente illum rerum itaque voluptatem. Commodi, sequi.', 'KeyboardReferenceSheet.png', 80, 'USR-003', 'TYP-001', '2019-06-08 04:00:33'),
('PST-002', '2019-04-24', 'kerja', 'fgf', 'KeyboardReferenceSheet.png', 100, 'USR-003', 'TYP-002', '2019-06-08 03:30:08'),
('PST-003', '2019-04-24', 'jhkh', 'lkhoihyoi', 'akademi-komunitas-negeri-sumenep.jpg', 37, 'USR-003', 'TYP-002', '2019-06-06 14:08:18'),
('PST-004', '2019-04-24', 'dasdas', 'asdasd', 'akademi-komunitas-negeri-sumenep.jpg', 19, 'USR-001', 'TYP-001', '2019-06-06 14:31:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post_type`
--

CREATE TABLE `post_type` (
  `id_type` varchar(8) NOT NULL,
  `type_post` varchar(100) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `post_type`
--

INSERT INTO `post_type` (`id_type`, `type_post`, `waktu`) VALUES
('TYP-001', 'Lowongan Kerja', '2019-04-26 01:45:47'),
('TYP-002', 'Berita', '2019-04-26 14:03:15'),
('TYP-003', 'Lainnya', '2019-04-26 14:07:34');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_post` (`kode_post`),
  ADD KEY `kodeuser` (`kodeuser`);

--
-- Indeks untuk tabel `data_alumni`
--
ALTER TABLE `data_alumni`
  ADD PRIMARY KEY (`kode_alumni`),
  ADD KEY `kodeuser` (`kodeuser`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`kodeuser`);

--
-- Indeks untuk tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`kode_post`),
  ADD KEY `kodeuser` (`kodeuser`),
  ADD KEY `id_type` (`id_type`);

--
-- Indeks untuk tabel `post_type`
--
ALTER TABLE `post_type`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`kodeuser`) REFERENCES `login` (`kodeuser`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`kode_post`) REFERENCES `post` (`kode_post`);

--
-- Ketidakleluasaan untuk tabel `data_alumni`
--
ALTER TABLE `data_alumni`
  ADD CONSTRAINT `data_alumni_ibfk_1` FOREIGN KEY (`kodeuser`) REFERENCES `login` (`kodeuser`);

--
-- Ketidakleluasaan untuk tabel `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `post_type` (`id_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
