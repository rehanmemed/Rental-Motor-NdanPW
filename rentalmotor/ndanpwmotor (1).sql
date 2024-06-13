-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jun 2024 pada 03.45
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ndanpwmotor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '081329810268', 'achmadraihan327@gmail.com', 'jalan imogri timur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`kategori_id`, `kategori_name`) VALUES
(1, 'Manual');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_motor`
--

CREATE TABLE `tb_motor` (
  `motor_id` int(11) NOT NULL,
  `kategori_id` int(50) NOT NULL,
  `merk_motor` varchar(50) NOT NULL,
  `motor_img` varchar(100) NOT NULL,
  `motor_desc` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jumlah_motor` int(100) NOT NULL,
  `motor_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_motor`
--

INSERT INTO `tb_motor` (`motor_id`, `kategori_id`, `merk_motor`, `motor_img`, `motor_desc`, `date_created`, `jumlah_motor`, `motor_status`) VALUES
(5, 1, 'scoopy', 'motor1716207419.jpg', '<p>55.000</p>\r\n', '2024-06-06 14:12:51', 11, 0),
(7, 1, 'aerox', 'motor1716210931.png', '<p>50.000</p>\r\n', '2024-06-06 14:12:42', 7, 0),
(8, 1, 'R15', 'motor1716212210.png', '<p>100.000</p>\r\n', '2024-06-06 14:12:35', 5, 0),
(9, 1, 'super cub 50c', 'motor1716212234.jpeg', '<p>70.000</p>\r\n', '2024-06-06 14:12:28', 1, 0),
(10, 1, 'CBR150R', 'motor1716212675.jpg', '<p>75.OOO</p>\r\n', '2024-06-07 01:08:18', 11, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sewa`
--

CREATE TABLE `tb_sewa` (
  `bukti_bayar` varchar(100) NOT NULL,
  `motor_id` int(11) NOT NULL,
  `merk_motor` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `sewa_id` int(11) NOT NULL,
  `kartu_identitas` varchar(100) NOT NULL,
  `telp_user` varchar(100) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `telp_user` varchar(100) NOT NULL,
  `address_user` varchar(100) NOT NULL,
  `password_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `kartu_identitas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `nama_user`, `email_user`, `telp_user`, `address_user`, `password_user`, `username`, `kartu_identitas`) VALUES
(1, 'rehan', 'rehan@gmail.com', '081329810268', 'Jalan imogiri timur 149', '825625953cfd8a71e773215200a4de40', 'rehan', ''),
(4, 'RAIHANN', 'raihanoye@gmail.com', '081329810268', 'Jalan imogiri timur 149', 'f11a16d6b31036fbb05c95237731305b', 'rehan1', 'kartu_identitas'),
(5, 'memed', 'memed@gmail.com', '081329810268', 'Jalan imogiri timur 149', 'ed8ac751b6b9331980a1cee014df8c17', 'memed', 'SCAN KTP.jpg'),
(6, 'memedd', 'memedd@gmail.com', '081329810268', 'Jalan imogiri timur 149', '248112cf40d8fe2033d763de8c04d52a', 'memedd', 'kartuidentitas/SCAN KTP.jpg'),
(7, 'rehanmemed', 'rehanmemed@gmail.com', '081329810268', 'Jalan imogiri timur 149', '2aacfe1b0377c204613c09c20af3aefa', 'rehanmemed', 'kartuidentitas/SCAN KTP.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_id` (`admin_id`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `tb_motor`
--
ALTER TABLE `tb_motor`
  ADD PRIMARY KEY (`motor_id`),
  ADD UNIQUE KEY `motor_id` (`motor_id`,`kategori_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indeks untuk tabel `tb_sewa`
--
ALTER TABLE `tb_sewa`
  ADD PRIMARY KEY (`sewa_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `motor_id` (`motor_id`),
  ADD UNIQUE KEY `admin_id_2` (`admin_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_motor`
--
ALTER TABLE `tb_motor`
  MODIFY `motor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_sewa`
--
ALTER TABLE `tb_sewa`
  MODIFY `sewa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_motor`
--
ALTER TABLE `tb_motor`
  ADD CONSTRAINT `tb_motor_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `tb_kategori` (`kategori_id`);

--
-- Ketidakleluasaan untuk tabel `tb_sewa`
--
ALTER TABLE `tb_sewa`
  ADD CONSTRAINT `tb_sewa_ibfk_3` FOREIGN KEY (`motor_id`) REFERENCES `tb_motor` (`motor_id`),
  ADD CONSTRAINT `tb_sewa_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
