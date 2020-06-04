-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Mar 2020 pada 02.50
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
-- Database: `db_mahasiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `krs_detail`
--

CREATE TABLE `krs_detail` (
  `id_krs` varchar(128) NOT NULL,
  `nim_mhs` int(11) NOT NULL,
  `id_dosen` varchar(128) NOT NULL,
  `nilai_presensi` int(11) NOT NULL,
  `nilai_tugas` int(11) NOT NULL,
  `nilai_uts` int(11) NOT NULL,
  `nilai_uas` int(11) NOT NULL,
  `total_nilai` int(11) NOT NULL,
  `nilai_akhir` varchar(50) NOT NULL,
  `grade` varchar(128) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `krs_detail`
--

INSERT INTO `krs_detail` (`id_krs`, `nim_mhs`, `id_dosen`, `nilai_presensi`, `nilai_tugas`, `nilai_uts`, `nilai_uas`, `total_nilai`, `nilai_akhir`, `grade`, `status`) VALUES
('10002', 102203206, '02010011715', 0, 0, 0, 0, 0, '', '', ''),
('10013', 102103202, '0203011739', 0, 0, 0, 0, 0, '', '', ''),
('10144', 102203205, '0203011739', 0, 0, 0, 0, 0, '', '', ''),
('10265', 102203204, '02010011715', 0, 0, 0, 0, 0, '', '', ''),
('10346', 102103201, '0204011728', 0, 0, 0, 0, 0, '', '', ''),
('10381', 102103201, '0203011739', 0, 0, 0, 0, 0, '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim_mhs` int(11) NOT NULL,
  `image` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nama_panggilan` varchar(128) NOT NULL,
  `id_jurusan` varchar(128) NOT NULL,
  `id_kelas` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(32) NOT NULL,
  `agama` varchar(128) NOT NULL,
  `tmpt_lahir` varchar(128) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `status` varchar(50) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim_mhs`, `image`, `nama`, `nama_panggilan`, `id_jurusan`, `id_kelas`, `jenis_kelamin`, `agama`, `tmpt_lahir`, `tanggal_lahir`, `alamat`, `no_telp`, `email`, `status`, `id_role`, `id_tahun_akademik`) VALUES
(102103201, 'WIN_20200317_15_15_45_Pro.jpg', 'Amano Keita', 'Amano', 'JR-03-09', 'KLS-02-30', 'Laki-Laki', 'Islam', 'Malang', '2003-12-18', 'Jepang', '081364867827', '', 'Tidak Aktif', 0, 1),
(102103202, 'proposal.jpg', 'Syahira Laila Mutiara', 'Amano', 'JR-02-42', 'KLS-04-20', 'Laki-Laki', 'Islam', 'Bandung', '2004-01-01', 'Jepang', '083764862347', '', 'Tidak Aktif', 0, 2),
(102103203, 'proposal.jpg', 'Rara Nadira Putri', 'Ra', 'JR-02-42', 'KLS-04-20', 'Laki-Laki', '', 'Jawa Tengah', '2003-11-12', 'Sanja', '081364867827', '', 'Tidak Aktif', 0, 1),
(102203204, 'proposal.jpg', 'udin', 'udin g', 'JR-03-09', 'KLS-01-49', 'Laki-Laki', '', 'Bandung', '2003-12-05', 'Jepang', '082246105463', '', 'Tidak Aktif', 0, 2),
(102203205, 'POSTER_KNU.jpg', 'pink', 'red', 'JR-02-42', 'KLS-06-59', 'Laki-Laki', 'Islam', 'Jawa Tengah', '2004-01-01', 'Dukuh', '082246105463', '', 'Tidak Aktif', 0, 2),
(102203206, 'POSTER_PM.jpg', 'Nara Shikaku', 'Nara', 'JR-03-09', 'KLS-01-49', 'Laki-Laki', '', 'Jakarta', '2003-11-06', 'ss', '083864862399', '', 'Tidak Aktif', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `id_dosen` varchar(128) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nama_panggilan` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(128) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `tmpt_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_matkul` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dosen`
--

INSERT INTO `tb_dosen` (`id_dosen`, `nama`, `nama_panggilan`, `jenis_kelamin`, `agama`, `tmpt_lahir`, `tanggal_lahir`, `alamat`, `no_telp`, `image`, `email`, `status`, `id_role`, `id_matkul`) VALUES
('02010011715', 'Dr. Muhammad Syafii Antonio, M.Ec.', 'Syafii ', 'Laki-Laki', 'Islam', 'Bogor', '2019-02-18', 'Bogor', '0812873811223', 'proposal.jpg', '', 'Tidak Aktif', 0, 'MK-01-14'),
('0201011731', 'Dr. Luqyan Tamanni, M.Ec', 'Luqyan ', 'Laki-Laki', 'Islam', 'Bogor', '2020-01-29', 'Bogor', '0811021317318', 'POSTER_GC.jpg', '', 'Tidak Aktif', 0, 'MK-02-08'),
('02011011701', 'Dr. Murniati Mukhlisin, M.Acc.', 'Murniati ', 'Laki-Laki', 'Islam', 'Bogor', '2020-01-28', 'Bogor', '083817123612', 'foto.png', '', 'Tidak Aktif', 0, '--Pilih Mata Kuliah--'),
('02012011744', 'Dr. Sugiyarti Fatma Laela, M.Buss. Acc., CMA. CIBA', 'Fatma ', 'Laki-Laki', 'Islam', 'Bogor', '2019-02-18', 'Bogor', '083813271326', 'foto.png', '', 'Tidak Aktif', 0, '--Pilih Mata Kuliah--'),
('0202011745', 'Dr. Indra, S.Si, M.Si', 'Indra', 'Laki-Laki', 'Islam', 'Bogor', '2020-01-29', 'Bogor', '0983082912', 'foto.png', '', 'Tidak Aktif', 0, '--Pilih Mata Kuliah--'),
('0203011739', 'Dr. Bayu Taufiq Possummah, M.A.', 'Bayu ', 'Laki-Laki', 'Kristen', 'Bogor', '2020-01-16', 'Bogor', '086125312615', 'POSTER_SKNU.jpg', '', 'Tidak Aktif', 0, 'MK-01-14'),
('0204011728', ' Dr. Erwandi Tarmizi Anwar, MA.', 'Erwandi ', 'Laki-Laki', 'Islam', 'Bogor', '2020-01-23', 'Bogor', '081287381371', 'foto.png', '', 'Tidak Aktif', 0, '--Pilih Mata Kuliah--'),
('0205011707', 'Dr. Muhammad Syarif Surbakti, SE, Ak. M.Sc.', 'Syarif ', 'Laki-Laki', 'Islam', 'Bogor', '2020-01-15', 'Bogor', '0821512612', 'foto.png', '', 'Tidak Aktif', 0, '--Pilih Mata Kuliah--'),
('0206011758', 'Dr. Mukhamad Yasid, M.Si', 'Yasid', 'Laki-Laki', 'Islam', 'Bogor', '2020-01-10', 'Bogor', '08128713213', 'foto.png', '', 'Tidak Aktif', 0, '--Pilih Mata Kuliah--'),
('0207011728', 'Dr. Sigid Eko Pramono, S.E., Ak., MIBA.', 'Pramono', 'Laki-Laki', 'Islam', 'Bogor', '2020-01-23', 'Bogor', '087612361237', 'foto.png', '', 'Tidak Aktif', 0, '--Pilih Mata Kuliah--'),
('0208011728', 'Dr. Sigid Eko Pramono, S.E., Ak., MIBA.', 'Pramono', 'Laki-Laki', 'Islam', 'Bogor', '2020-01-23', 'Bogor', '087612361237', 'foto.png', '', 'Tidak Aktif', 0, '--Pilih Mata Kuliah--'),
('0209011717', 'Rifki Ismal, Ph.D.', 'Rifki ', 'Laki-Laki', 'Islam', 'Bogor', '2021-02-18', 'Bogor', '087612361237', 'foto.png', '', 'Tidak Aktif', 0, '--Pilih Mata Kuliah--');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_fakultas`
--

CREATE TABLE `tb_fakultas` (
  `id_fakultas` varchar(128) NOT NULL,
  `nama_fakultas` varchar(128) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_fakultas`
--

INSERT INTO `tb_fakultas` (`id_fakultas`, `nama_fakultas`, `keterangan`, `status`) VALUES
('FKS-01-24', 'Fakultas Ekonomi', 'Ekonomi', 'Aktif'),
('FKS-02-11', 'Fakultas Hukum', 'Hukum', 'Aktif'),
('FKS-03-57', 'Fakultas Pendidikan', 'Pendidikan Syariah', 'Aktif'),
('FKS-04-30', 'Belum Diisi', 'Tidak Memiliki Fakultas', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ipk`
--

CREATE TABLE `tb_ipk` (
  `id_ipk` varchar(36) NOT NULL,
  `nim_mhs` varchar(36) DEFAULT NULL,
  `sks_total` int(11) DEFAULT NULL,
  `bobot_total` decimal(6,2) DEFAULT NULL,
  `nilai_total_sks` int(11) DEFAULT NULL,
  `ipk` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_ipk`
--

INSERT INTO `tb_ipk` (`id_ipk`, `nim_mhs`, `sks_total`, `bobot_total`, `nilai_total_sks`, `ipk`) VALUES
('10011', '102103201', NULL, NULL, NULL, NULL),
('10353', '102203205', NULL, NULL, NULL, NULL),
('10414', '102103203', NULL, NULL, NULL, NULL),
('10432', '102203206', NULL, NULL, NULL, NULL),
('10485', '102103202', NULL, NULL, NULL, NULL),
('10556', '102203204', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenjang_pendidikan`
--

CREATE TABLE `tb_jenjang_pendidikan` (
  `id_jenjang_pendidikan` int(11) NOT NULL,
  `nama_lengkap_jp` varchar(250) NOT NULL,
  `nama_jp` varchar(128) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenjang_pendidikan`
--

INSERT INTO `tb_jenjang_pendidikan` (`id_jenjang_pendidikan`, `nama_lengkap_jp`, `nama_jp`, `status`) VALUES
(1, '', 'D1', 'Tidak Aktif'),
(2, '', 'D2', 'Tidak Aktif'),
(3, '', 'D3', 'Aktif'),
(4, '', 'D4', 'Tidak Aktif'),
(5, '', 'S1', 'Aktif'),
(6, '', 'S2', 'Aktif'),
(7, '', 'S3', 'Tidak Aktif'),
(8, 'Belum Di isi', 'Kosong', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` varchar(50) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL,
  `id_jenjang_pendidikan` varchar(10) NOT NULL,
  `penjelasan` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `id_fakultas` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `nama_jurusan`, `id_jenjang_pendidikan`, `penjelasan`, `status`, `id_fakultas`) VALUES
('JR-01-17', 'Ekonomi Syariah', '6', 'Ekonomi Syariah Adalah', 'Aktif', 'FKS-01-24'),
('JR-02-42', 'Akutansi Syariah ', '6', 'Fakultas Ekonomi Adalah', 'Aktif', 'FKS-01-24'),
('JR-03-09', 'Managemen Bisnis Syariah', '3', 'Manajemen Bisnis Syariah Adalah', 'Aktif', 'FKS-01-24'),
('JR-04-51', 'Hukum Ekonomi Syariah', '6', 'Hukum Ekonomi Syariah Adalah', 'Aktif', 'FKS-02-11'),
('JR-05-32', 'Tadris Ilmu Pengetahuan Sosial', '3', 'Tadris Ilmu Pengetahuan Sosial', 'Aktif', 'FKS-03-57'),
('JR-06-13', 'Belum Diisi', '8', 'Kosong', 'Aktif', 'FKS-04-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` varchar(128) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `status` varchar(128) NOT NULL,
  `id_ruangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`, `status`, `id_ruangan`) VALUES
('KLS-01-23', 'MBS - 01', 'Aktif', 'RGN-01-37'),
('KLS-02-33', 'AKS - 01', 'Aktif', 'RGN-02-58'),
('KLS-03-45', 'MBS - 02', 'Aktif', 'RGN-03-17'),
('KLS-04-04', 'AKS - 02', 'Aktif', 'RGN-04-33'),
('KLS-05-15', 'MBS - 03', 'Aktif', 'RGN-05-47'),
('KLS-06-26', 'AKS - 03', 'Aktif', 'RGN-06-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_log`
--

CREATE TABLE `tb_log` (
  `id_log` int(11) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `log_user` varchar(50) NOT NULL,
  `log_role` int(11) NOT NULL,
  `log_tipe` varchar(50) NOT NULL,
  `log_aksi` varchar(50) NOT NULL,
  `log_item` varchar(50) NOT NULL,
  `log_assign_to` varchar(50) NOT NULL,
  `log_assign_type` enum('pengguna','lokasi','asset','inventori') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_log`
--

INSERT INTO `tb_log` (`id_log`, `log_time`, `log_user`, `log_role`, `log_tipe`, `log_aksi`, `log_item`, `log_assign_to`, `log_assign_type`) VALUES
(1, '2020-01-03 00:45:01', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '5', '', ''),
(2, '2020-01-03 00:45:09', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '5', '', ''),
(3, '2020-01-03 02:14:37', 'ekomh13@gmail.com', 1, 'Data Jadwal', 'Menambah Data', '0', '', ''),
(4, '2020-01-03 03:31:58', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '24', '', ''),
(5, '2020-01-03 03:32:17', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '11', '', ''),
(6, '2020-01-03 03:32:56', 'ekomh13@gmail.com', 1, 'Data Menu', 'Menambahkan Data', 'RUANGAN', '', ''),
(7, '2020-01-03 03:33:09', 'ekomh13@gmail.com', 1, 'Data Menu', 'Ubah Data', 'Ruangan', '', ''),
(8, '2020-01-03 03:33:34', 'ekomh13@gmail.com', 1, 'Data Sub', 'Menambah Data', '25', '', ''),
(9, '2020-01-03 06:53:00', 'ekomh13@gmail.com', 1, 'Data Jadwal', 'Menambah Data', 'DSN-25-9', '', ''),
(10, '2020-01-03 06:53:19', 'ekomh13@gmail.com', 1, 'Data Jadwal', 'Menambah Data', 'DSN-49-5', '', ''),
(11, '2020-01-03 07:12:47', 'ekomh13@gmail.com', 1, 'Data Kelas', 'Menambah Data', 'KLS-04-47', '', ''),
(12, '2020-01-03 07:54:50', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Menambah Data', '1003012017', '', ''),
(13, '2020-01-03 08:06:17', 'ekomh13@gmail.com', 1, 'Data Sub', 'Menambah Data', 'qweeqwe', '', ''),
(14, '2020-01-03 08:06:26', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '01', '', ''),
(15, '2020-01-03 08:06:36', 'ekomh13@gmail.com', 1, 'Data Sub', 'Menambah Data', '2112', '', ''),
(16, '2020-01-16 15:16:35', 'ekomh13@gmail.com', 1, 'Data Jurusan', 'Menambah Data', 'JR-01-35', '', ''),
(17, '2020-01-16 15:17:31', 'ekomh13@gmail.com', 1, 'Data Jurusan', 'Menambah Data', 'JR-02-31', '', ''),
(18, '2020-01-16 15:18:17', 'ekomh13@gmail.com', 1, 'Data Jurusan', 'Menambah Data', 'JR-03-17', '', ''),
(19, '2020-01-16 15:19:03', 'ekomh13@gmail.com', 1, 'Data Jurusan', 'Menambah Data', 'JR-04-02', '', ''),
(20, '2020-01-16 15:19:29', 'ekomh13@gmail.com', 1, 'Data Jurusan', 'Menambah Data', 'JR-05-29', '', ''),
(21, '2020-01-16 15:20:09', 'ekomh13@gmail.com', 1, 'Data Jurusan', 'Menambah Data', 'JR-06-09', '', ''),
(22, '2020-01-16 15:20:42', 'ekomh13@gmail.com', 1, 'Data Jurusan', 'Menambah Data', 'JR-07-42', '', ''),
(23, '2020-01-16 15:21:52', 'ekomh13@gmail.com', 1, 'Data Jurusan', 'Menambah Data', 'JR-08-52', '', ''),
(24, '2020-01-16 15:22:39', 'ekomh13@gmail.com', 1, 'Data Jurusan', 'Menambah Data', 'JR-09-39', '', ''),
(25, '2020-01-17 00:38:07', 'ekomh13@gmail.com', 1, 'Data Dosen', 'Menambah Data', '02020', '', ''),
(26, '2020-01-17 00:40:59', 'ekomh13@gmail.com', 1, 'Data Dosen', 'Menambah Data', '0202013011759', '', ''),
(27, '2020-01-17 00:42:44', 'ekomh13@gmail.com', 1, 'Data Dosen', 'Menambah Data', '020140117', '', ''),
(28, '2020-01-17 00:48:31', 'ekomh13@gmail.com', 1, 'Data Dosen', 'Menambah Data', '0201011731', '', ''),
(29, '2020-01-17 00:49:45', 'ekomh13@gmail.com', 1, 'Data Dosen', 'Menambah Data', '0202011745', '', ''),
(30, '2020-01-17 00:50:39', 'ekomh13@gmail.com', 1, 'Data Dosen', 'Menambah Data', '0203011739', '', ''),
(31, '2020-01-17 00:52:28', 'ekomh13@gmail.com', 1, 'Data Dosen', 'Menambah Data', '0204011728', '', ''),
(32, '2020-01-17 01:13:07', 'ekomh13@gmail.com', 1, 'Data Dosen', 'Menambah Data', '0205011707', '', ''),
(33, '2020-01-17 01:13:58', 'ekomh13@gmail.com', 1, 'Data Dosen', 'Menambah Data', '0206011758', '', ''),
(34, '2020-01-17 01:15:28', 'ekomh13@gmail.com', 1, 'Data Dosen', 'Menambah Data', '0207011728', '', ''),
(35, '2020-01-17 01:15:28', 'ekomh13@gmail.com', 1, 'Data Dosen', 'Menambah Data', '0208011728', '', ''),
(36, '2020-01-17 01:16:17', 'ekomh13@gmail.com', 1, 'Data Dosen', 'Menambah Data', '0209011717', '', ''),
(37, '2020-01-17 01:17:15', 'ekomh13@gmail.com', 1, 'Data Dosen', 'Menambah Data', '02010011715', '', ''),
(38, '2020-01-17 01:18:01', 'ekomh13@gmail.com', 1, 'Data Dosen', 'Menambah Data', '02011011701', '', ''),
(39, '2020-01-17 01:18:44', 'ekomh13@gmail.com', 1, 'Data Dosen', 'Menambah Data', '02012011744', '', ''),
(40, '2020-02-26 03:35:08', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '13', '', ''),
(41, '2020-02-26 03:35:26', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '13', '', ''),
(42, '2020-02-26 03:35:34', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '13', '', ''),
(43, '2020-02-28 11:10:42', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '5', '', ''),
(44, '2020-02-28 11:10:54', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '11', '', ''),
(45, '2020-02-28 11:11:05', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '10', '', ''),
(46, '2020-02-28 11:11:17', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '6', '', ''),
(47, '2020-02-28 11:11:27', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '7', '', ''),
(48, '2020-02-28 11:11:35', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '8', '', ''),
(49, '2020-02-28 11:16:39', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '12', '', ''),
(50, '2020-02-28 11:17:05', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '13', '', ''),
(51, '2020-02-28 11:17:21', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '13', '', ''),
(52, '2020-02-28 11:17:38', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '14', '', ''),
(53, '2020-02-28 11:19:15', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '15', '', ''),
(54, '2020-02-28 11:19:36', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '2', '', ''),
(55, '2020-02-28 11:20:53', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '3', '', ''),
(56, '2020-02-28 11:21:05', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '2', '', ''),
(57, '2020-02-28 11:22:37', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '4', '', ''),
(58, '2020-02-28 11:24:26', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '1', '', ''),
(59, '2020-02-28 11:24:47', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '1', '', ''),
(60, '2020-02-28 11:24:55', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '1', '', ''),
(61, '2020-02-28 11:26:51', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '15', '', ''),
(62, '2020-03-01 11:58:27', 'ekomh13@gmail.com', 1, 'Data Role', 'Ubah Data', 'Operator Informasi', '', ''),
(63, '2020-03-01 11:58:44', 'ekomh13@gmail.com', 1, 'Data Role', 'Menambah Data', 'Operator Penilaian', '', ''),
(64, '2020-03-01 12:02:29', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '5', '', ''),
(65, '2020-03-01 12:02:37', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '6', '', ''),
(66, '2020-03-01 12:02:45', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '7', '', ''),
(67, '2020-03-01 12:02:56', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '8', '', ''),
(68, '2020-03-01 12:03:16', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '9', '', ''),
(69, '2020-03-01 12:03:28', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '10', '', ''),
(70, '2020-03-01 12:03:38', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '11', '', ''),
(71, '2020-03-01 12:06:33', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '15', '', ''),
(72, '2020-03-20 10:53:02', 'ekomh13@gmail.com', 1, 'Data Pengguna', 'Hapus Data', '67', '', ''),
(73, '2020-03-20 10:53:07', 'ekomh13@gmail.com', 1, 'Data Pengguna', 'Hapus Data', '51', '', ''),
(74, '2020-03-20 10:53:17', 'ekomh13@gmail.com', 1, 'Data Pengguna', 'Hapus Data', '47', '', ''),
(75, '2020-03-20 10:53:26', 'ekomh13@gmail.com', 1, 'Data Pengguna', 'Hapus Data', '59', '', ''),
(76, '2020-03-20 16:58:09', 'ekomh13@gmail.com', 1, 'Data Pengguna', 'Hapus Data', '66', '', ''),
(77, '2020-03-21 09:31:19', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Menambah Data', '1021032018', '', ''),
(78, '2020-03-21 09:31:59', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Menambah Data', '1021032019', '', ''),
(79, '2020-03-21 13:03:12', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Menambah Data', '102103201', '', ''),
(80, '2020-03-21 13:04:28', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Menambah Data', '102103202', '', ''),
(81, '2020-03-21 13:05:59', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Menambah Data', '102103203', '', ''),
(82, '2020-03-22 12:18:05', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Menambah Data', '102203204', '', ''),
(83, '2020-03-22 12:18:46', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Menambah Data', '102203205', '', ''),
(84, '2020-03-22 12:19:33', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Menambah Data', '102203206', '', ''),
(85, '2020-03-23 01:47:26', 'ekomh13@gmail.com', 1, 'Data Fakultas', 'Menambah Data', 'FKS-02-26', '', ''),
(86, '2020-03-23 01:49:24', 'ekomh13@gmail.com', 1, 'Data Fakultas', 'Menambah Data', 'FKS-01-24', '', ''),
(87, '2020-03-23 02:00:11', 'ekomh13@gmail.com', 1, 'Data Fakultas', 'Menambah Data', 'FKS-02-11', '', ''),
(88, '2020-03-23 02:12:01', 'ekomh13@gmail.com', 1, 'Data Fakultas', 'Ubah Data', 'FKS-01-24', '', ''),
(89, '2020-03-23 02:12:16', 'ekomh13@gmail.com', 1, 'Data Fakultas', 'Ubah Data', 'FKS-02-11', '', ''),
(90, '2020-03-23 02:12:57', 'ekomh13@gmail.com', 1, 'Data Fakultas', 'Menambah Data', 'FKS-03-57', '', ''),
(91, '2020-03-23 08:00:17', 'ekomh13@gmail.com', 1, 'Data Jurusan', 'Menambah Data', 'JR-01-17', '', ''),
(92, '2020-03-23 08:02:42', 'ekomh13@gmail.com', 1, 'Data Jurusan', 'Menambah Data', 'JR-02-42', '', ''),
(93, '2020-03-23 08:05:09', 'ekomh13@gmail.com', 1, 'Data Jurusan', 'Menambah Data', 'JR-03-09', '', ''),
(94, '2020-03-23 08:05:51', 'ekomh13@gmail.com', 1, 'Data Jurusan', 'Menambah Data', 'JR-04-51', '', ''),
(95, '2020-03-23 08:06:32', 'ekomh13@gmail.com', 1, 'Data Jurusan', 'Menambah Data', 'JR-05-32', '', ''),
(96, '2020-03-23 08:07:30', 'ekomh13@gmail.com', 1, 'Data Fakultas', 'Menambah Data', 'FKS-04-30', '', ''),
(97, '2020-03-23 08:10:13', 'ekomh13@gmail.com', 1, 'Data Jurusan', 'Menambah Data', 'JR-06-13', '', ''),
(98, '2020-03-23 08:16:16', 'ekomh13@gmail.com', 1, 'Data Jurusan', 'Ubah Data', 'JR-06-13', '', ''),
(99, '2020-03-23 08:16:37', 'ekomh13@gmail.com', 1, 'Data Jurusan', 'Ubah Data', 'JR-06-13', '', ''),
(100, '2020-03-23 11:54:14', 'ekomh13@gmail.com', 1, 'Data Mata Kuliah', 'Menambah Data', 'MK-01-14', '', ''),
(101, '2020-03-23 11:58:50', 'ekomh13@gmail.com', 1, 'Data Mata Kuliah', 'Ubah Data', 'MK-01-14', '', ''),
(102, '2020-03-23 12:01:08', 'ekomh13@gmail.com', 1, 'Data Mata Kuliah', 'Menambah Data', 'MK-02-08', '', ''),
(103, '2020-03-23 12:01:19', 'ekomh13@gmail.com', 1, 'Data Mata Kuliah', 'Menambah Data', 'MK-03-19', '', ''),
(104, '2020-03-23 12:01:29', 'ekomh13@gmail.com', 1, 'Data Mata Kuliah', 'Menambah Data', 'MK-04-29', '', ''),
(105, '2020-03-23 12:01:37', 'ekomh13@gmail.com', 1, 'Data Mata Kuliah', 'Menambah Data', 'MK-05-37', '', ''),
(106, '2020-03-23 12:01:57', 'ekomh13@gmail.com', 1, 'Data Mata Kuliah', 'Menambah Data', 'MK-06-56', '', ''),
(107, '2020-03-23 12:02:09', 'ekomh13@gmail.com', 1, 'Data Mata Kuliah', 'Menambah Data', 'MK-07-09', '', ''),
(108, '2020-03-23 12:11:49', 'ekomh13@gmail.com', 1, 'Data Kelas', 'Menambah Data', 'KLS-01-49', '', ''),
(109, '2020-03-23 12:12:30', 'ekomh13@gmail.com', 1, 'Data Kelas', 'Menambah Data', 'KLS-02-30', '', ''),
(110, '2020-03-23 12:12:51', 'ekomh13@gmail.com', 1, 'Data Kelas', 'Menambah Data', 'KLS-03-51', '', ''),
(111, '2020-03-23 12:13:20', 'ekomh13@gmail.com', 1, 'Data Kelas', 'Menambah Data', 'KLS-04-20', '', ''),
(112, '2020-03-23 12:13:42', 'ekomh13@gmail.com', 1, 'Data Kelas', 'Menambah Data', 'KLS-05-42', '', ''),
(113, '2020-03-23 12:13:59', 'ekomh13@gmail.com', 1, 'Data Kelas', 'Menambah Data', 'KLS-06-59', '', ''),
(114, '2020-03-23 13:03:27', 'ekomh13@gmail.com', 1, 'Data Menu', 'Menambahkan Data', 'Belom Di Set', '', ''),
(115, '2020-03-23 13:06:18', 'ekomh13@gmail.com', 1, 'Data Role', 'Menambah Data', 'Kepala Bagian (Kabag)', '', ''),
(116, '2020-03-23 13:06:29', 'ekomh13@gmail.com', 1, 'Data Role', 'Menambah Data', 'Belum Diset', '', ''),
(117, '2020-03-23 15:58:44', 'ekomh13@gmail.com', 1, 'Data Pengguna', 'Hapus Data', '69', '', ''),
(118, '2020-03-25 09:04:01', 'ekomh13@gmail.com', 1, 'Data Ipk', 'Menambah Data', '10011', '', ''),
(119, '2020-03-25 09:09:43', 'ekomh13@gmail.com', 1, 'Data Ipk', 'Menambah Data', '10432', '', ''),
(120, '2020-03-25 09:10:10', 'ekomh13@gmail.com', 1, 'Data Ipk', 'Menambah Data', '10011', '', ''),
(121, '2020-03-25 09:20:55', 'ekomh13@gmail.com', 1, 'Data krs', 'Menambah Data', '10551', '', ''),
(122, '2020-03-25 09:25:49', 'ekomh13@gmail.com', 1, 'Data Transkrip Nilai', 'Menambah Data', '10492', '', ''),
(123, '2020-03-25 11:52:52', 'ekomh13@gmail.com', 1, 'Data Dosen', 'Ubah Data', '02010011715', '', ''),
(124, '2020-03-25 12:01:38', 'ekomh13@gmail.com', 1, 'Data krs', 'Menambah Data', '10381', '', ''),
(125, '2020-03-25 12:02:00', 'ekomh13@gmail.com', 1, 'Data krs', 'Menambah Data', '10002', '', ''),
(126, '2020-03-25 12:24:35', 'ekomh13@gmail.com', 1, 'Data Ipk', 'Menambah Data', '10353', '', ''),
(127, '2020-03-25 12:24:41', 'ekomh13@gmail.com', 1, 'Data Ipk', 'Menambah Data', '10414', '', ''),
(128, '2020-03-25 12:24:48', 'ekomh13@gmail.com', 1, 'Data Ipk', 'Menambah Data', '10485', '', ''),
(129, '2020-03-25 12:24:55', 'ekomh13@gmail.com', 1, 'Data Ipk', 'Menambah Data', '10556', '', ''),
(130, '2020-03-25 12:28:26', 'ekomh13@gmail.com', 1, 'Data Dosen', 'Ubah Data', '0201011731', '', ''),
(131, '2020-03-25 12:28:43', 'ekomh13@gmail.com', 1, 'Data Dosen', 'Ubah Data', '0203011739', '', ''),
(132, '2020-03-25 12:29:01', 'ekomh13@gmail.com', 1, 'Data krs', 'Menambah Data', '10013', '', ''),
(133, '2020-03-25 12:29:14', 'ekomh13@gmail.com', 1, 'Data krs', 'Menambah Data', '10144', '', ''),
(134, '2020-03-25 12:29:27', 'ekomh13@gmail.com', 1, 'Data krs', 'Menambah Data', '10265', '', ''),
(135, '2020-03-25 12:29:34', 'ekomh13@gmail.com', 1, 'Data krs', 'Menambah Data', '10346', '', ''),
(136, '2020-03-26 01:19:17', 'ekomh13@gmail.com', 1, 'Data Kelas', 'Ubah Data', 'KLS-02-30', '', ''),
(137, '2020-03-26 01:37:23', 'ekomh13@gmail.com', 1, 'Data Kelas', 'Menambah Data', 'KLS-01-23', '', ''),
(138, '2020-03-26 01:37:36', 'ekomh13@gmail.com', 1, 'Data Kelas', 'Menambah Data', 'KLS-02-36', '', ''),
(139, '2020-03-26 01:37:46', 'ekomh13@gmail.com', 1, 'Data Kelas', 'Menambah Data', 'KLS-03-46', '', ''),
(140, '2020-03-26 01:38:00', 'ekomh13@gmail.com', 1, 'Data Kelas', 'Menambah Data', 'KLS-04-00', '', ''),
(141, '2020-03-26 01:39:10', 'ekomh13@gmail.com', 1, 'Data Kelas', 'Menambah Data', 'KLS-05-10', '', ''),
(142, '2020-03-26 01:39:26', 'ekomh13@gmail.com', 1, 'Data Kelas', 'Menambah Data', 'KLS-06-26', '', ''),
(143, '2020-03-26 02:04:46', 'ekomh13@gmail.com', 1, 'Data Ruangan', 'Menambah Data', 'RGN-03-46', '', ''),
(144, '2020-03-26 02:08:37', 'ekomh13@gmail.com', 1, 'Data Ruangan', 'Menambah Data', 'RGN-01-37', '', ''),
(145, '2020-03-26 02:08:58', 'ekomh13@gmail.com', 1, 'Data Ruangan', 'Menambah Data', 'RGN-02-58', '', ''),
(146, '2020-03-26 02:09:17', 'ekomh13@gmail.com', 1, 'Data Ruangan', 'Menambah Data', 'RGN-03-17', '', ''),
(147, '2020-03-26 02:09:33', 'ekomh13@gmail.com', 1, 'Data Ruangan', 'Menambah Data', 'RGN-04-33', '', ''),
(148, '2020-03-26 02:09:47', 'ekomh13@gmail.com', 1, 'Data Ruangan', 'Menambah Data', 'RGN-05-47', '', ''),
(149, '2020-03-26 02:10:03', 'ekomh13@gmail.com', 1, 'Data Ruangan', 'Menambah Data', 'RGN-06-03', '', ''),
(150, '2020-03-26 02:10:23', 'ekomh13@gmail.com', 1, 'Data Kelas', 'Menambah Data', 'KLS-01-23', '', ''),
(151, '2020-03-26 02:10:33', 'ekomh13@gmail.com', 1, 'Data Kelas', 'Menambah Data', 'KLS-02-33', '', ''),
(152, '2020-03-26 02:10:45', 'ekomh13@gmail.com', 1, 'Data Kelas', 'Menambah Data', 'KLS-03-45', '', ''),
(153, '2020-03-26 02:11:04', 'ekomh13@gmail.com', 1, 'Data Kelas', 'Menambah Data', 'KLS-04-04', '', ''),
(154, '2020-03-26 02:11:15', 'ekomh13@gmail.com', 1, 'Data Kelas', 'Menambah Data', 'KLS-05-15', '', ''),
(155, '2020-03-26 02:11:26', 'ekomh13@gmail.com', 1, 'Data Kelas', 'Menambah Data', 'KLS-06-26', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_log_login`
--

CREATE TABLE `tb_log_login` (
  `id_log` int(11) NOT NULL,
  `log_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `log_user` varchar(50) NOT NULL,
  `log_tipe` varchar(50) NOT NULL,
  `log_role` int(11) NOT NULL,
  `log_desc` varchar(50) NOT NULL,
  `log_status` enum('pengguna','lokasi','asset','inventori') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_log_login`
--

INSERT INTO `tb_log_login` (`id_log`, `log_time`, `log_user`, `log_tipe`, `log_role`, `log_desc`, `log_status`) VALUES
(1, '2020-01-02 07:06:22', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(2, '2020-01-02 07:07:21', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(3, '2020-01-02 09:08:26', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(4, '2020-01-03 00:44:25', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(5, '2020-01-17 00:26:26', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(6, '2020-01-17 01:41:26', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(7, '2020-02-24 22:43:01', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(8, '2020-02-24 23:08:34', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(9, '2020-02-24 23:08:47', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(10, '2020-02-25 03:46:44', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(11, '2020-02-26 03:31:48', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(12, '2020-02-26 13:54:39', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(13, '2020-02-26 16:55:21', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(14, '2020-02-26 16:56:10', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(15, '2020-02-26 17:01:36', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(16, '2020-02-26 17:01:48', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(17, '2020-02-26 17:01:51', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(18, '2020-02-26 17:07:22', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(19, '2020-02-26 17:10:29', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(20, '2020-02-26 17:10:39', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(21, '2020-02-26 17:12:36', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(22, '2020-02-26 17:12:47', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(23, '2020-02-26 17:18:00', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(24, '2020-02-26 17:19:02', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(25, '2020-02-26 17:19:17', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(26, '2020-02-26 17:19:27', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(27, '2020-02-26 17:22:33', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(28, '2020-02-28 11:07:47', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(29, '2020-02-29 03:22:31', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(30, '2020-02-29 10:06:36', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(31, '2020-02-29 10:06:49', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(32, '2020-03-01 02:17:20', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(33, '2020-03-01 04:22:06', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(34, '2020-03-01 04:32:56', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(35, '2020-03-01 04:33:06', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(36, '2020-03-01 04:41:25', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(37, '2020-03-01 05:44:06', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(38, '2020-03-01 07:59:15', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(39, '2020-03-01 11:57:21', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(40, '2020-03-04 13:35:13', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(41, '2020-03-04 13:36:35', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(42, '2020-03-04 13:36:41', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(43, '2020-03-04 13:36:59', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(44, '2020-03-04 13:37:09', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(45, '2020-03-04 13:38:32', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(46, '2020-03-04 13:38:42', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(47, '2020-03-04 13:41:11', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(48, '2020-03-04 13:42:55', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(49, '2020-03-04 13:43:03', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(50, '2020-03-04 13:43:09', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(51, '2020-03-04 13:43:52', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(52, '2020-03-04 13:44:51', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(53, '2020-03-04 13:47:36', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(54, '2020-03-04 13:47:43', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(55, '2020-03-04 13:55:10', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(56, '2020-03-04 13:56:15', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(57, '2020-03-04 13:57:57', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(58, '2020-03-04 13:58:18', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(59, '2020-03-04 14:21:42', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(60, '2020-03-04 14:21:48', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(61, '2020-03-04 15:10:27', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(62, '2020-03-04 15:10:34', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(63, '2020-03-05 13:29:42', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(64, '2020-03-06 02:14:11', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(65, '2020-03-06 02:23:21', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(66, '2020-03-06 13:09:47', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(67, '2020-03-07 00:47:36', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(68, '2020-03-07 04:54:54', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(69, '2020-03-07 04:55:44', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(70, '2020-03-09 08:41:17', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(71, '2020-03-09 11:40:53', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(72, '2020-03-10 13:54:20', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(73, '2020-03-10 14:01:50', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(74, '2020-03-10 14:01:56', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(75, '2020-03-11 13:35:42', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(76, '2020-03-11 14:28:40', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(77, '2020-03-11 14:29:33', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(78, '2020-03-11 14:30:24', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(79, '2020-03-12 12:29:08', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(80, '2020-03-12 12:32:40', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(81, '2020-03-15 09:50:14', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(82, '2020-03-15 11:04:23', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(83, '2020-03-20 10:04:40', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(84, '2020-03-20 10:34:46', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(85, '2020-03-20 10:36:34', 'Souta06@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(86, '2020-03-20 10:42:45', 'Souta06@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(87, '2020-03-20 10:42:56', 'Souta06@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(88, '2020-03-20 10:44:13', 'Souta06@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(89, '2020-03-20 10:44:23', 'Souta06@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(90, '2020-03-20 10:49:17', 'Souta06@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(91, '2020-03-20 10:49:34', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(92, '2020-03-20 10:52:31', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(93, '2020-03-20 10:52:49', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(94, '2020-03-20 10:53:42', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(95, '2020-03-20 10:53:54', '011@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(96, '2020-03-20 10:57:59', '011@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(97, '2020-03-20 16:36:57', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(98, '2020-03-20 16:42:43', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(99, '2020-03-20 16:43:58', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(100, '2020-03-20 16:45:09', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(101, '2020-03-20 16:45:16', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(102, '2020-03-20 16:48:02', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(103, '2020-03-20 16:48:11', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(104, '2020-03-20 16:58:50', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(105, '2020-03-20 17:00:48', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(106, '2020-03-20 17:01:38', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(107, '2020-03-21 02:07:42', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(108, '2020-03-21 02:09:43', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(109, '2020-03-21 05:35:07', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(110, '2020-03-21 09:19:00', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(111, '2020-03-21 12:52:26', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(112, '2020-03-21 15:55:47', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(113, '2020-03-22 02:24:43', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(114, '2020-03-22 08:20:21', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(115, '2020-03-22 11:47:43', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(116, '2020-03-23 01:12:18', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(117, '2020-03-23 07:14:32', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(118, '2020-03-23 11:47:31', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(119, '2020-03-24 04:28:18', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(120, '2020-03-24 06:20:50', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(121, '2020-03-24 08:35:53', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(122, '2020-03-24 14:56:25', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(123, '2020-03-24 16:14:29', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(124, '2020-03-25 09:02:26', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(125, '2020-03-25 09:33:19', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(126, '2020-03-25 11:44:52', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(127, '2020-03-26 01:18:39', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(128, '2020-03-26 08:23:10', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(129, '2020-03-27 12:40:26', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_matkul`
--

CREATE TABLE `tb_matkul` (
  `id_matkul` varchar(128) NOT NULL,
  `nama_matkul` varchar(255) NOT NULL,
  `status` varchar(128) NOT NULL,
  `id_jurusan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_matkul`
--

INSERT INTO `tb_matkul` (`id_matkul`, `nama_matkul`, `status`, `id_jurusan`) VALUES
('MK-01-14', 'Belom', 'Aktif', 'JR-05-32'),
('MK-02-08', 'Belom', 'Aktif', 'JR-02-42'),
('MK-03-19', 'Belom', 'Aktif', 'JR-03-09'),
('MK-04-29', 'Belom', 'Aktif', 'JR-03-09'),
('MK-05-37', 'Belom', 'Aktif', 'JR-01-17'),
('MK-06-56', 'Belom', 'Aktif', 'JR-04-51'),
('MK-07-09', 'Belom', 'Aktif', 'JR-01-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ruangan`
--

CREATE TABLE `tb_ruangan` (
  `id_ruangan` varchar(36) NOT NULL,
  `nama_ruangan` varchar(255) DEFAULT NULL,
  `lantai` varchar(50) DEFAULT NULL,
  `kapasitas` decimal(4,0) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `id_jenis_ruangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`id_ruangan`, `nama_ruangan`, `lantai`, `kapasitas`, `keterangan`, `status`, `id_jenis_ruangan`) VALUES
('RGN-01-37', 'Ruang 1.0', '1', '40', '000', 'Aktif', '01'),
('RGN-02-58', 'Ruang 1.1', '1', '40', '000', 'Aktif', '01'),
('RGN-03-17', 'Ruang 1.2', '1', '40', '000', 'Aktif', '01'),
('RGN-04-33', 'Ruang 1.3', '1', '40', '000', 'Aktif', '01'),
('RGN-05-47', 'Ruang 1.4', '1', '40', '000', 'Aktif', '01'),
('RGN-06-03', 'Ruang 1.5', '1', '40', '000', 'Aktif', '01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ruangan_jenis`
--

CREATE TABLE `tb_ruangan_jenis` (
  `id_jenis_ruangan` varchar(36) NOT NULL,
  `nama_jr` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_ruangan_jenis`
--

INSERT INTO `tb_ruangan_jenis` (`id_jenis_ruangan`, `nama_jr`, `keterangan`, `status`) VALUES
('01', 'Ruang Kelas', '-', 'AKTIF'),
('02', 'Asrama Putra', '-', 'AKTIF'),
('03', 'Asrama Putri', '-', 'AKTIF'),
('04', 'Ruang Rapat', '-', 'AKTIF'),
('05', 'Aula', '-', 'AKTIF'),
('06', 'Ruang Kantor', '-', 'AKTIF');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tahun_akademik`
--

CREATE TABLE `tb_tahun_akademik` (
  `id_tahun_akademik` int(12) NOT NULL,
  `nama_tahun_akademik` varchar(128) NOT NULL,
  `semester` int(11) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tahun_akademik`
--

INSERT INTO `tb_tahun_akademik` (`id_tahun_akademik`, `nama_tahun_akademik`, `semester`, `status`) VALUES
(1, '20018/2019', 0, 'Aktif'),
(2, '2019/2020', 0, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transkrip_nilai`
--

CREATE TABLE `tb_transkrip_nilai` (
  `id_transkrip_nilai` int(11) NOT NULL,
  `nim_mhs` varchar(128) NOT NULL,
  `id_krs` varchar(128) NOT NULL,
  `id_ipk` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transkrip_nilai`
--

INSERT INTO `tb_transkrip_nilai` (`id_transkrip_nilai`, `nim_mhs`, `id_krs`, `id_ipk`) VALUES
(10251, '102103201', '10551', '10011'),
(10492, '102103201', '10551', '10011');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nama_panggilan` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_asli` varchar(128) NOT NULL,
  `id_role` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `data_created` datetime NOT NULL,
  `id_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `nama_panggilan`, `email`, `image`, `password`, `password_asli`, `id_role`, `status`, `data_created`, `id_jurusan`) VALUES
(53, 'Amano Keita', 'Amano', 'AmanoKeita@tazkia.ac.id', 'foto.png', '$2y$10$3/W9gdAO93dzAJ99lD2pi.HxM541lRJaGpiJ1cQc0PzS0bUTO3zwK', '12345', 2, 'Aktif', '2019-12-25 23:54:19', 'JR-52-1'),
(56, 'Eko Muchamad Haryono', 'Eko', 'ekomh13@gmail.com', 'tayo.jpg', '$2y$10$swL/vw8PBtKqJwIItyBtcuxHWhuBMRYx5BfV1WXifMSdrEWbO1o92', '12345', 1, 'Aktif', '2019-12-26 13:54:37', 'JR-51-5'),
(58, 'Sakura Haruno1', 'Sakura NESC', 'SakuraNESC0@dosentazkia.ac.id', 'Mnil.jpg', '$2y$10$GYd6YxfN2QndWsrUtk/fUu8YaQnqtdt1AfopVfT3I7GlrMJ1DYNbK', '1234', 3, 'Aktif', '2020-01-02 09:23:23', ''),
(60, 'Souta Yoshiraku', 'Souta', 'Souta07@tazkia.ac.id', 'Mnil.jpg', '$2y$10$hTkTDfNvRWsOKVVijyPo1.5CqjF5WZcKMm.35IISCJ2J5BvLO/tRG', '1234', 2, 'Aktif', '2020-01-03 14:40:43', 'JR-05-2'),
(61, 'Souta Yoshiraku', 'Souta', 'Souta08@tazkia.ac.id', 'Mnil.jpg', '$2y$10$XAhVtR3k3LfLOon/4aIjWOJ0eG5WAgM8EHxp0vwXX5/9wSnMKZWpK', '1234', 2, 'Aktif', '2020-01-03 14:42:15', 'JR-05-2'),
(62, 'Madara', '', '09@dosentazkia.ac.id', 'Tayo_Kuning.jpg', '$2y$10$Pu0rdx3/vZF5SGfG8Ug59.WbbZdbNnziG3WfGO..fvfq/TnN23gn6', '1234', 3, 'Aktif', '2020-01-03 14:48:02', ''),
(63, 'Sakura Haruno1', 'Sakura NESC', 'SakuraNESC010@dosentazkia.ac.id', 'Mnil.jpg', '$2y$10$BH9fumsVu/q1uHYkMyegEeaRbPpnLsPeT/C8UgRRINpgv.8axHULu', '1234', 3, 'Aktif', '2020-01-03 14:48:18', ''),
(64, 'Krito', '', '011@dosentazkia.ac.id', 'foto.png', '$2y$10$y5kP.jQb5Glq0/9XB6ayNuXf6sHcjGM1ZJ3DV3k.QHpmxhkLl8wKO', '12345', 3, 'Aktif', '2020-01-03 14:49:02', ''),
(65, 'Hinata Hyuga', '', '012@dosentazkia.ac.id', 'foto.png', '$2y$10$HVbW2JXyDIOfbDK8Eu1MFOCxFeY/zQZoTmHBA8d17H0DMvUo9kzXG', '1234', 3, 'Aktif', '2020-01-03 14:49:05', ''),
(68, 'Amano Keita 12', 'AMANO', 'ekomh13@gmail.com', 'index.png', '$2y$10$tgtv5jVAmmoaprPJTV4sS.XWMigeg9henHjbindJZ.DMkzdQSdFT2', '12345', 1, 'Aktif', '2020-03-23 22:55:32', 'JR-5-1-5'),
(70, 'rara', 'udin g', 'SoutaYoshiraku@tazkia.ac.id', 'index.png', '$2y$10$6b0BAzUWfFnFgR0dgFR6UOhDjGyl01wrt6hcjFDBYUf.G6yoauBNq', '12345', 6, 'Aktif', '2020-03-23 22:59:04', 'JR-5-1-5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_akses_menu`
--

CREATE TABLE `user_akses_menu` (
  `id` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_akses_menu`
--

INSERT INTO `user_akses_menu` (`id`, `id_role`, `id_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(7, 2, 3),
(9, 1, 13),
(16, 2, 14),
(21, 2, 4),
(23, 3, 3),
(24, 1, 15),
(25, 1, 24),
(26, 1, 25),
(29, 1, 14),
(30, 1, 12),
(31, 4, 1),
(32, 4, 2),
(33, 4, 6),
(34, 4, 7),
(35, 4, 8),
(36, 4, 5),
(37, 4, 9),
(38, 4, 10),
(39, 4, 11),
(40, 4, 3),
(41, 5, 1),
(43, 5, 2),
(44, 5, 3),
(45, 5, 12),
(46, 5, 13),
(47, 5, 14),
(48, 3, 5),
(49, 2, 13),
(50, 2, 12),
(53, 3, 12),
(54, 3, 13),
(55, 3, 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Dashbooard'),
(2, 'Data User'),
(3, 'Profile'),
(4, 'Register Admin'),
(5, 'Data Mahasiswa'),
(6, 'Data Dosen'),
(7, 'Data Fakultas'),
(8, 'Data Jurusan'),
(9, 'Data Matkul'),
(10, 'Data Kelas'),
(11, 'Data Ruangan'),
(12, 'Penilaian IPK'),
(13, 'Penilaian'),
(14, 'Transkrip Nilai '),
(15, 'Penjadwalan Mengajar Dosen\r\n'),
(16, 'Belom Di Set');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Mahasiswa'),
(3, 'Dosen'),
(4, 'Operator Informasi'),
(5, 'Operator Penilaian'),
(6, 'Kepala Bagian (Kabag)'),
(7, 'Belum Diset');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `id_menu`, `title`, `url`, `icon`, `status`) VALUES
(1, 1, 'Dashboard', 'Dashboard', 'fas fa-tachometer-alt', 'Aktif'),
(2, 2, 'Data Users', 'Pengguna', 'fas fa-fw fa-users', 'Aktif'),
(3, 3, 'Profile', 'Profile', 'fas fa-fw fa-user', 'Aktif'),
(4, 4, 'Register Admin', 'Auth/register', 'fas fa-user-plus', 'Aktif'),
(5, 5, 'Data Mahasiswa', 'Mahasiswa', 'fas fa-fw fa-table', 'Aktif'),
(6, 6, 'Data Dosen', 'Dosen', 'fas fa-fw fa-table', 'Aktif'),
(7, 7, 'Data Fakultas', 'Fakultas', 'fas fa-fw fa-table', 'Aktif'),
(8, 8, 'Data Jurusan', 'Jurusan', 'fas fa-fw fa-table', 'Aktif'),
(9, 9, 'Data Matkul', 'Matkul', 'fas fa-fw fa-table', 'Aktif'),
(10, 10, 'Data Kelas', 'Kelas', 'fas fa-fw fa-table', 'Aktif'),
(11, 11, 'Data Ruangan', 'Ruangan', 'fas fa-fw fa-table', 'Aktif'),
(12, 12, 'Penilaian IPK', 'Ipk', 'fas fa-tasks', 'Aktif'),
(13, 13, 'Penilaian KHS', 'KrsDetail', 'fas fa-tasks', 'Aktif'),
(14, 14, 'Transkrip Nilai', 'TranskripNilai', 'fas fa-tasks', 'Aktif'),
(15, 15, 'Penjadwalan Mengajar Dosen', 'Jadwal', 'fas fa-clipboard-list', 'Tidak Aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `krs_detail`
--
ALTER TABLE `krs_detail`
  ADD PRIMARY KEY (`id_krs`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim_mhs`);

--
-- Indeks untuk tabel `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indeks untuk tabel `tb_ipk`
--
ALTER TABLE `tb_ipk`
  ADD PRIMARY KEY (`id_ipk`);

--
-- Indeks untuk tabel `tb_jenjang_pendidikan`
--
ALTER TABLE `tb_jenjang_pendidikan`
  ADD PRIMARY KEY (`id_jenjang_pendidikan`);

--
-- Indeks untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `tb_log_login`
--
ALTER TABLE `tb_log_login`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `tb_matkul`
--
ALTER TABLE `tb_matkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indeks untuk tabel `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indeks untuk tabel `tb_ruangan_jenis`
--
ALTER TABLE `tb_ruangan_jenis`
  ADD PRIMARY KEY (`id_jenis_ruangan`);

--
-- Indeks untuk tabel `tb_tahun_akademik`
--
ALTER TABLE `tb_tahun_akademik`
  ADD PRIMARY KEY (`id_tahun_akademik`);

--
-- Indeks untuk tabel `tb_transkrip_nilai`
--
ALTER TABLE `tb_transkrip_nilai`
  ADD PRIMARY KEY (`id_transkrip_nilai`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_akses_menu`
--
ALTER TABLE `user_akses_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_jenjang_pendidikan`
--
ALTER TABLE `tb_jenjang_pendidikan`
  MODIFY `id_jenjang_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_log`
--
ALTER TABLE `tb_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT untuk tabel `tb_log_login`
--
ALTER TABLE `tb_log_login`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT untuk tabel `tb_tahun_akademik`
--
ALTER TABLE `tb_tahun_akademik`
  MODIFY `id_tahun_akademik` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `user_akses_menu`
--
ALTER TABLE `user_akses_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
