-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jun 2022 pada 03.15
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_service`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `kd_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(25) NOT NULL,
  `tugas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`kd_jabatan`, `nama_jabatan`, `tugas`) VALUES
(1, 'Programmer', 'Menciptakan program adalah tugas utama seorang programmer. Tugas ini memaksa mereka memahami dan mampu menulis bahasa pemrograman seperti C++ dan Java. Dari tulisan kode mereka, terciptalah program yang dapat dimengerti dan diikuti oleh komputer.'),
(2, 'System analyst', 'Seorang System Analist mempunyai tugas melakukan analisis sistem, merancang sistem kemudian diimplementasikan pada Perusahaan serta bertanggung jawab terhadap hasil yang ingin di capai oleh Perusahaan.'),
(3, 'Web developer', 'tugas utama web developer adalah membangun situs melalui satu atau lebih bahasa pemrograman. Secara khusus, tugas mereka disesuaikan dengan masing-masing peran, seperti frontend, backend, atau database'),
(4, 'Designer', 'memiliki tugas menentukan tampilan aplikasi dan/atau situs, juga menentukan bagaimana suatu aplikasi dan/atau situs bisa beroperasi dengan mudah. Harus berlandaskan pada hasil riset supaya aplikasi dan/atau situs yang dirancang benar-benar efektif.'),
(5, 'Technical support', 'Memastikan komputer yang digunakan dapat berfungsi normal/berjalan seperti seharusnya, Harus memastikan bahwa semua komputer yang digunakan oleh pengguna terhubung ke jaringan, Melakukan pengecekan jika aplikasi-aplikasi yang dipakai berfungsi.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `kd_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `jk` varchar(9) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `jabatan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`kd_karyawan`, `nama_karyawan`, `jk`, `no_hp`, `jabatan`) VALUES
(1, 'Ghifari Hamdanigiar', 'Laki-laki', '085777267002', 'Programmer'),
(2, 'Geronimo', 'Laki-laki', '085577567032', 'Programmer'),
(3, 'Wina', 'Perempuan', '085718906233', 'Programmer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keluhan`
--

CREATE TABLE `tb_keluhan` (
  `kd_keluhan` int(11) NOT NULL,
  `keluhan` text NOT NULL,
  `tgl_keluhan` date NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_keluhan`
--

INSERT INTO `tb_keluhan` (`kd_keluhan`, `keluhan`, `tgl_keluhan`, `nama_karyawan`) VALUES
(1, 'Gaji kurang', '2022-06-01', 'Geronimo'),
(2, 'Kurangnya fasilitas', '2022-06-02', 'Ghifari Hamdanigiar'),
(3, 'tidak ada layanan wifi', '2022-05-04', 'Wina');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`kd_jabatan`);

--
-- Indeks untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`kd_karyawan`);

--
-- Indeks untuk tabel `tb_keluhan`
--
ALTER TABLE `tb_keluhan`
  ADD PRIMARY KEY (`kd_keluhan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `kd_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `kd_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_keluhan`
--
ALTER TABLE `tb_keluhan`
  MODIFY `kd_keluhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
