-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2020 pada 14.48
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `nim_mhs` varchar(50) NOT NULL,
  `id_dosen` varchar(128) NOT NULL,
  `nilai_krs` int(11) NOT NULL,
  `grade` varchar(2) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `krs_detail`
--

INSERT INTO `krs_detail` (`id_krs`, `nim_mhs`, `id_dosen`, `nilai_krs`, `grade`, `status`) VALUES
('KRS-304', '102505202', '0203011739', 2, 'C', 'Aktif'),
('KRS-424', '102604201', '0201011731', 4, 'A', 'Aktif'),
('KRS-441', '102505202', '0201011731', 4, 'A', 'Aktif'),
('KRS-543', '102905203', '0203011739', 0, '', 'Aktif'),
('KRS-652', '102905203', '0201011731', 0, '', 'Aktif'),
('KRS-657', '102604201', '0203011739', 4, 'A', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim_mhs` int(11) NOT NULL,
  `image` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nama_panggilan` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(32) NOT NULL,
  `agama` varchar(128) NOT NULL,
  `tmpt_lahir` varchar(128) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `status` varchar(50) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_jurusan` varchar(128) NOT NULL,
  `id_kelas` varchar(128) NOT NULL,
  `id_tahun_akademik` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim_mhs`, `image`, `nama`, `nama_panggilan`, `jenis_kelamin`, `agama`, `tmpt_lahir`, `tanggal_lahir`, `alamat`, `no_telp`, `email`, `status`, `id_role`, `id_jurusan`, `id_kelas`, `id_tahun_akademik`) VALUES
(100406204, 'IMG_20200223_164959.jpg', 'Coba ', 'Coba', 'Laki-Laki', 'Islam', '29', '2003-12-05', 'ASAS', '08212', '', 'Tidak Aktif', 0, 'JR-08-07', 'KLS-07-36', 'TA-355'),
(101106205, 'module_table_bottom.png', 'Testing', 'Test', 'Laki-Laki', 'Kristen', 'Bogor', '2003-01-30', 'Kampung', '0827218921', '', 'Tidak Aktif', 2, 'JR-02-42', 'KLS-06-26', 'TA-218'),
(101606206, 'IMG_20200223_165036.jpg', 'coba1', 'coba1', 'Laki-Laki', 'Islam', 'skjasjaksasj', '1000-12-01', 'wqwwqwq', '11221', '', 'Tidak Aktif', 2, 'JR-02-42', 'KLS-07-36', 'TA-355'),
(102505202, 'index.jpg', 'Cahaya Melati Mutiara', 'Cahaya', 'Laki-Laki', 'Islam', 'Bogor', '2004-01-01', 'Sanja', '083764862347', 'Cahaya03@tazkia.ac.id', 'Aktif', 2, 'JR-04-51', 'KLS-01-23', 'TA-218'),
(102604201, 'IMG_20200223_164959.jpg', 'Eko Muchamad Haryono', 'Amano', 'Laki-Laki', 'Islam', 'Bogor', '2004-01-01', 'Test', '087823122121', 'Amano04@tazkia.ac.id', 'Aktif', 2, 'JR-02-42', 'KLS-02-33', 'TA-425'),
(102905203, 'Capture.PNG', 'Percobaan', 'Coba', 'Laki-Laki', 'Islam', 'Jakarta', '2003-12-31', 'Cibinong', '08446603179', '', 'Tidak Aktif', 2, 'JR-08-07', 'KLS-07-36', 'TA-355');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `id_dosen` varchar(128) NOT NULL,
  `nama_dosen` varchar(255) NOT NULL,
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

INSERT INTO `tb_dosen` (`id_dosen`, `nama_dosen`, `nama_panggilan`, `jenis_kelamin`, `agama`, `tmpt_lahir`, `tanggal_lahir`, `alamat`, `no_telp`, `image`, `email`, `status`, `id_role`, `id_matkul`) VALUES
('0201011731', 'Dr. Luqyan Tamanni, M.Ec', 'Luqyan ', 'Laki-Laki', 'Islam', 'Bogor', '2020-01-29', 'Bogor', '0811021317318', 'POSTER_GC.jpg', 'Luqyan04@dosentazkia.ac.id', 'Tidak Aktif', 3, 'MK-02-08'),
('02011011701', 'Dr. Murniati Mukhlisin, M.Acc.', 'Murniati ', 'Laki-Laki', 'Islam', 'Bogor', '2020-01-28', 'Bogor', '083817123612', 'foto.png', 'Murniati017@dosentazkia.ac.id', 'Tidak Aktif', 3, '--Pilih Mata Kuliah--'),
('02012011744', 'Dr. Sugiyarti Fatma Laela, M.Buss. Acc., CMA. CIBA', 'Fatma ', 'Laki-Laki', 'Islam', 'Bogor', '2019-02-18', 'Bogor', '083813271326', 'foto.png', '', 'Tidak Aktif', 0, '--Pilih Mata Kuliah--'),
('0202011745', 'Dr. Indra, S.Si, M.Si', 'Indra', 'Laki-Laki', 'Islam', 'Bogor', '2020-01-29', 'Bogor', '0983082912', 'foto.png', 'Indra019@dosentazkia.ac.id', 'Tidak Aktif', 3, '--Pilih Mata Kuliah--'),
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
('FKS-04-30', 'Belum Diisi', 'Tidak Memiliki Fakultas', 'Aktif'),
('FKS-05-55', 'Test', 'Test', 'Aktif'),
('FKS-0648', 'Percobaan', 'Percobaan', 'Aktif'),
('FKS-0753', 'CContoh ', 'Contoh', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ipk`
--

CREATE TABLE `tb_ipk` (
  `id_ipk` varchar(36) NOT NULL,
  `nim_mhs` varchar(36) NOT NULL,
  `sks_total` int(11) NOT NULL,
  `bobot_total` decimal(6,2) NOT NULL,
  `nilai_total_sks` int(11) NOT NULL,
  `ipk` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_ipk`
--

INSERT INTO `tb_ipk` (`id_ipk`, `nim_mhs`, `sks_total`, `bobot_total`, `nilai_total_sks`, `ipk`) VALUES
('IPK-150', '102604201', 2, '0.00', 8, '3.00'),
('IPK-244', '102505202', 2, '0.00', 6, '0.00'),
('IPK-330', '102905203', 0, '0.00', 0, '0.00');

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
(1, 'Diploma Satu', 'D1', 'Tidak Aktif'),
(2, 'Diploma Dua', 'D2', 'Tidak Aktif'),
(3, 'Diploma Tiga', 'D3', 'Aktif'),
(4, 'Diploma Empat', 'D4', 'Tidak Aktif'),
(5, 'Sarjana Satu', 'S1', 'Aktif'),
(6, 'Sarjana Dua', 'S2', 'Aktif'),
(7, 'Sarjana Tiga', 'S3', 'Tidak Aktif'),
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
('JR-06-13', 'Belum Diisi', '8', 'Kosong', 'Aktif', 'FKS-04-30'),
('JR-07-38', 'Test', '3', 'Test', 'Aktif', 'FKS-05-55'),
('JR-08-07', 'Coba', '3', 'Coba', 'Aktif', 'FKS-05-55'),
('JR-09-56', 'Percobaan', '8', 'Percobaan', 'Tidak Aktif', 'FKS-0648');

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
('KLS-01-23', 'MBS - 01', 'Aktif', 'RGN-120'),
('KLS-02-33', 'AKS - 01', 'Aktif', 'RGN-313'),
('KLS-03-45', 'MBS - 02', 'Aktif', 'RGN-207'),
('KLS-04-04', 'AKS - 02', 'Aktif', 'RGN-120'),
('KLS-05-15', 'MBS - 03', 'Aktif', 'RGN-05-47'),
('KLS-06-26', 'AKS - 03', 'Aktif', 'RGN-06-03'),
('KLS-07-36', 'AKS - 00', 'Aktif', 'RGN-01-37'),
('KLS-08-09', 'Percobaan', 'Tidak Aktif', '01');

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
(1, '2020-05-18 22:08:44', 'ekomh13@gmail.com', 1, 'Data Ipk', 'Hapus Data', 'IPK-235', '', ''),
(2, '2020-05-19 09:16:34', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-207', '', ''),
(3, '2020-05-19 10:45:41', 'ekomh13@gmail.com', 1, 'Data Krs', 'Hapus Data', 'KRS-207', '', ''),
(4, '2020-05-19 10:46:22', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-122', '', ''),
(5, '2020-05-19 10:47:03', 'ekomh13@gmail.com', 1, 'Data Nilai', 'Hapus Data', 'NLI-301', '', ''),
(6, '2020-05-19 10:49:32', 'ekomh13@gmail.com', 1, 'Data Nilai', 'Menambah Data', 'NLI-232', '', ''),
(7, '2020-05-19 10:50:09', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-209', '', ''),
(8, '2020-05-19 11:56:29', 'ekomh13@gmail.com', 1, 'Data Krs', 'Hapus Data', 'KRS-122', '', ''),
(9, '2020-05-19 11:58:19', 'ekomh13@gmail.com', 1, 'Data Krs', 'Hapus Data', 'KRS-209', '', ''),
(10, '2020-05-19 11:58:37', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-136', '', ''),
(11, '2020-05-19 11:59:56', 'ekomh13@gmail.com', 1, 'Data Krs', 'Hapus Data', 'KRS-136', '', ''),
(12, '2020-05-19 12:01:44', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-144', '', ''),
(13, '2020-05-19 12:01:58', 'ekomh13@gmail.com', 1, 'Data Krs', 'Hapus Data', 'KRS-144', '', ''),
(14, '2020-05-19 12:03:46', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-146', '', ''),
(15, '2020-05-19 12:03:57', 'ekomh13@gmail.com', 1, 'Data Krs', 'Hapus Data', 'KRS-146', '', ''),
(16, '2020-05-19 12:05:09', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-109', '', ''),
(17, '2020-05-19 13:15:47', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-109', '', ''),
(18, '2020-05-19 13:16:20', 'ekomh13@gmail.com', 1, 'Data Krs', 'Hapus Data', 'KRS-109', '', ''),
(19, '2020-05-19 13:19:40', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-140', '', ''),
(20, '2020-05-19 13:20:16', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-216', '', ''),
(21, '2020-05-19 13:21:52', 'ekomh13@gmail.com', 1, 'Data Nilai', 'Menambah Data', 'NLI-352', '', ''),
(22, '2020-05-19 13:22:55', 'ekomh13@gmail.com', 1, 'Data Nilai', 'Menambah Data', 'NLI-455', '', ''),
(23, '2020-05-20 05:48:11', 'ekomh13@gmail.com', 1, 'Data Nilai', 'Hapus Data', 'NLI-455', '', ''),
(24, '2020-05-20 05:52:32', 'ekomh13@gmail.com', 1, 'Data Krs', 'Hapus Data', 'KRS-140', '', ''),
(25, '2020-05-20 05:55:53', 'ekomh13@gmail.com', 1, 'Data Krs', 'Hapus Data', 'KRS-216', '', ''),
(26, '2020-05-20 05:56:38', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-138', '', ''),
(27, '2020-05-20 05:57:36', 'ekomh13@gmail.com', 1, 'Data Krs', 'Hapus Data', 'KRS-138', '', ''),
(28, '2020-05-20 05:57:42', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-141', '', ''),
(29, '2020-05-20 05:57:44', 'ekomh13@gmail.com', 1, 'Data Krs', 'Hapus Data', 'KRS-141', '', ''),
(30, '2020-05-20 06:05:15', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-115', '', ''),
(31, '2020-05-20 06:06:00', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-200', '', ''),
(32, '2020-05-20 06:29:55', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-115', '', ''),
(33, '2020-05-20 06:33:33', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-333', '', ''),
(34, '2020-05-20 06:38:03', 'ekomh13@gmail.com', 1, 'Data Nilai', 'Ubah Data', 'NLI-232', '', ''),
(35, '2020-05-20 07:12:44', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-200', '', ''),
(36, '2020-05-20 07:12:57', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-333', '', ''),
(37, '2020-05-20 07:30:17', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-115', '', ''),
(38, '2020-05-20 10:10:43', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-443', '', ''),
(39, '2020-05-22 08:29:03', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-115', '', ''),
(40, '2020-05-22 09:00:21', 'ekomh13@gmail.com', 1, 'Data Ipk', 'Menambah Data', 'IPK-150', '', ''),
(41, '2020-05-22 09:00:40', 'ekomh13@gmail.com', 1, 'Data Ipk', 'Menambah Data', 'IPK-150', '', ''),
(42, '2020-05-22 09:00:58', 'ekomh13@gmail.com', 1, 'Data Ipk', 'Menambah Data', 'IPK-150', '', ''),
(43, '2020-05-23 07:36:55', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-443', '', ''),
(44, '2020-05-24 13:58:05', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-443', '', ''),
(45, '2020-05-25 00:29:25', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-115', '', ''),
(46, '2020-05-25 15:49:31', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Menambah Data', '102505202', '', ''),
(47, '2020-05-25 16:00:13', 'ekomh13@gmail.com', 1, 'Data Nilai', 'Menambah Data', 'NLI-513', '', ''),
(48, '2020-05-25 16:01:45', 'ekomh13@gmail.com', 1, 'Data Nilai', 'Hapus Data', 'NLI-232', '', ''),
(49, '2020-05-25 16:01:50', 'ekomh13@gmail.com', 1, 'Data Nilai', 'Hapus Data', 'NLI-352', '', ''),
(50, '2020-05-25 16:02:05', 'ekomh13@gmail.com', 1, 'Data Nilai', 'Hapus Data', 'NLI-513', '', ''),
(51, '2020-05-25 16:04:07', 'ekomh13@gmail.com', 1, 'Data Nilai', 'Menambah Data', 'NLI-307', '', ''),
(52, '2020-05-25 16:04:12', 'ekomh13@gmail.com', 1, 'Data Nilai', 'Hapus Data', 'NLI-307', '', ''),
(53, '2020-05-25 16:08:39', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-639', '', ''),
(54, '2020-05-25 16:08:54', 'ekomh13@gmail.com', 1, 'Data Krs', 'Hapus Data', 'KRS-524', '', ''),
(55, '2020-05-25 16:10:28', 'ekomh13@gmail.com', 1, 'Data Krs', 'Hapus Data', 'KRS-639', '', ''),
(56, '2020-05-25 16:10:35', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-534', '', ''),
(57, '2020-05-26 02:06:44', 'ekomh13@gmail.com', 1, 'Data Ipk', 'Menambah Data', 'IPK-244', '', ''),
(58, '2020-05-26 02:09:02', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-534', '', ''),
(59, '2020-05-26 02:41:02', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-115', '', ''),
(60, '2020-05-26 02:41:50', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-534', '', ''),
(61, '2020-05-26 02:44:08', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-534', '', ''),
(62, '2020-05-26 06:23:45', 'ekomh13@gmail.com', 1, 'Data Transkrip Nilai', 'Menambah Data', 'TN-145', '', ''),
(63, '2020-05-26 06:23:53', 'ekomh13@gmail.com', 1, 'Data Transkrip Nilai', 'Menambah Data', 'TN-252', '', ''),
(64, '2020-05-26 11:39:08', 'ekomh13@gmail.com', 1, 'Data Nilai', 'Hapus Data', 'NLI-221', '', ''),
(65, '2020-05-26 11:54:11', 'ekomh13@gmail.com', 1, 'Data Krs', 'Hapus Data', 'KRS-534', '', ''),
(66, '2020-05-26 11:54:17', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-516', '', ''),
(67, '2020-05-26 11:54:23', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-623', '', ''),
(68, '2020-05-26 11:54:35', 'ekomh13@gmail.com', 1, 'Data Nilai', 'Hapus Data', 'NLI-456', '', ''),
(69, '2020-05-26 11:54:42', 'ekomh13@gmail.com', 1, 'Data Nilai', 'Menambah Data', 'NLI-142', '', ''),
(70, '2020-05-26 11:54:52', 'ekomh13@gmail.com', 1, 'Data Nilai', 'Menambah Data', 'NLI-252', '', ''),
(71, '2020-05-26 11:55:07', 'ekomh13@gmail.com', 1, 'Data Nilai', 'Menambah Data', 'NLI-307', '', ''),
(72, '2020-05-26 11:55:15', 'ekomh13@gmail.com', 1, 'Data Nilai', 'Menambah Data', 'NLI-415', '', ''),
(73, '2020-05-26 11:55:35', 'ekomh13@gmail.com', 1, 'Data Krs', 'Hapus Data', 'KRS-443', '', ''),
(74, '2020-05-26 11:55:38', 'ekomh13@gmail.com', 1, 'Data Krs', 'Hapus Data', 'KRS-115', '', ''),
(75, '2020-05-26 11:55:41', 'ekomh13@gmail.com', 1, 'Data Krs', 'Hapus Data', 'KRS-200', '', ''),
(76, '2020-05-26 11:55:45', 'ekomh13@gmail.com', 1, 'Data Krs', 'Hapus Data', 'KRS-333', '', ''),
(77, '2020-05-26 11:55:51', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-351', '', ''),
(78, '2020-05-26 11:55:58', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-458', '', ''),
(79, '2020-05-27 01:03:46', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-346', '', ''),
(80, '2020-05-27 01:03:50', 'ekomh13@gmail.com', 1, 'Data Krs', 'Hapus Data', 'KRS-346', '', ''),
(81, '2020-05-27 01:04:24', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-324', '', ''),
(82, '2020-05-27 01:04:52', 'ekomh13@gmail.com', 1, 'Data Krs', 'Hapus Data', 'KRS-324', '', ''),
(83, '2020-05-27 01:07:18', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-318', '', ''),
(84, '2020-05-27 01:09:36', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-436', '', ''),
(85, '2020-05-27 01:30:10', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-310', '', ''),
(86, '2020-05-27 01:31:30', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-330', '', ''),
(87, '2020-05-27 01:49:05', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-304', '', ''),
(88, '2020-05-27 01:50:34', 'ekomh13@gmail.com', 1, 'Data Krs', 'Hapus Data', 'KRS-444', '', ''),
(89, '2020-05-27 01:51:58', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-758', '', ''),
(90, '2020-05-27 01:52:46', 'ekomh13@gmail.com', 1, 'Data Krs', 'Hapus Data', 'KRS-758', '', ''),
(91, '2020-05-27 01:52:50', 'ekomh13@gmail.com', 1, 'Data Krs', 'Hapus Data', 'KRS-628', '', ''),
(92, '2020-05-27 01:52:55', 'ekomh13@gmail.com', 1, 'Data Krs', 'Hapus Data', 'KRS-507', '', ''),
(93, '2020-05-27 01:54:16', 'ekomh13@gmail.com', 1, 'Data Krs', 'Hapus Data', 'KRS-458', '', ''),
(94, '2020-05-27 01:54:24', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-424', '', ''),
(95, '2020-05-27 12:33:12', 'ekomh13@gmail.com', 1, 'Data Transkrip Nilai', 'Hapus Data', 'TN-252', '', ''),
(96, '2020-05-27 12:34:54', 'ekomh13@gmail.com', 1, 'Data TranskripNilai', 'Menambah Data', 'TN-145', '', ''),
(97, '2020-05-27 12:35:13', 'ekomh13@gmail.com', 1, 'Data TranskripNilai', 'Menambah Data', 'TN-145', '', ''),
(98, '2020-05-27 12:35:21', 'ekomh13@gmail.com', 1, 'Data Transkrip Nilai', 'Menambah Data', 'TN-221', '', ''),
(99, '2020-05-28 04:24:18', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-304', '', ''),
(100, '2020-05-28 04:24:38', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-441', '', ''),
(101, '2020-05-28 04:25:20', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-351', '', ''),
(102, '2020-05-28 04:25:33', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-424', '', ''),
(103, '2020-05-28 04:39:04', 'ekomh13@gmail.com', 1, 'Data Nilai', 'Ubah Data', 'NLI-415', '', ''),
(104, '2020-05-28 05:28:34', 'ekomh13@gmail.com', 1, 'Data Menu', 'Ubah Data', 'Data Informasi Mahasiswa dan Penilaian Mahasiswa', '', ''),
(105, '2020-05-28 05:28:53', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '1', '', ''),
(106, '2020-05-28 05:36:31', 'ekomh13@gmail.com', 1, 'Data Menu', 'Ubah Data', 'Dashboard', '', ''),
(107, '2020-05-28 05:36:51', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '1', '', ''),
(108, '2020-05-28 11:59:22', 'ekomh13@gmail.com', 1, 'Data Nilai', 'Ubah Data', 'NLI-252', '', ''),
(109, '2020-05-28 12:02:43', 'ekomh13@gmail.com', 1, 'Data Nilai', 'Ubah Data', 'NLI-252', '', ''),
(110, '2020-05-28 23:49:22', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Menambah Data', '102905203', '', ''),
(111, '2020-05-28 23:50:07', 'ekomh13@gmail.com', 1, 'Data Nilai', 'Menambah Data', 'NLI-507', '', ''),
(112, '2020-05-28 23:53:50', 'ekomh13@gmail.com', 1, 'Data Nilai', 'Ubah Data', 'NLI-507', '', ''),
(113, '2020-05-28 23:59:31', 'ekomh13@gmail.com', 1, 'Data Ipk', 'Menambah Data', 'IPK-330', '', ''),
(114, '2020-05-28 23:59:43', 'ekomh13@gmail.com', 1, 'Data Transkrip Nilai', 'Menambah Data', 'TN-343', '', ''),
(115, '2020-05-29 00:00:21', 'ekomh13@gmail.com', 1, 'Data Nilai', 'Menambah Data', 'NLI-621', '', ''),
(116, '2020-05-29 08:32:05', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-705', '', ''),
(117, '2020-05-29 08:32:10', 'ekomh13@gmail.com', 1, 'Data Krs', 'Hapus Data', 'KRS-705', '', ''),
(118, '2020-05-29 08:32:27', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-827', '', ''),
(119, '2020-05-29 08:32:32', 'ekomh13@gmail.com', 1, 'Data Krs', 'Hapus Data', 'KRS-827', '', ''),
(120, '2020-05-29 08:33:11', 'ekomh13@gmail.com', 1, 'Data Krs', 'Hapus Data', 'KRS-720', '', ''),
(121, '2020-05-29 08:33:45', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-745', '', ''),
(122, '2020-05-29 08:37:14', 'ekomh13@gmail.com', 1, 'Data Krs', 'Hapus Data', 'KRS-745', '', ''),
(123, '2020-05-29 08:42:30', 'ekomh13@gmail.com', 1, 'Data Krs', 'Hapus Data', 'KRS-724', '', ''),
(124, '2020-05-29 15:25:05', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-304', '', ''),
(125, '2020-05-29 17:06:18', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-351', '', ''),
(126, '2020-05-29 17:11:20', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-720', '', ''),
(127, '2020-05-29 17:11:38', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-657', '', ''),
(128, '2020-05-29 17:23:56', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Menambah Data', '103005204', '', ''),
(129, '2020-05-29 17:24:04', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Hapus Data', '103005204', '', ''),
(130, '2020-05-30 07:34:25', 'ekomh13@gmail.com', 1, 'Data Sub', 'Menambah Data', '16', '', ''),
(131, '2020-05-30 07:34:47', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '17', '', ''),
(132, '2020-05-30 07:35:04', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '1', '', ''),
(133, '2020-05-30 07:36:58', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '3', '', ''),
(134, '2020-05-30 07:38:43', 'ekomh13@gmail.com', 1, 'Data Sub', 'Hapus Data', '19', '', ''),
(135, '2020-05-30 07:39:14', 'ekomh13@gmail.com', 1, 'Data Sub', 'Menambah Data', '16', '', ''),
(136, '2020-05-30 07:44:18', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '16', '', ''),
(137, '2020-05-30 07:44:39', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '1', '', ''),
(138, '2020-05-30 07:48:29', 'ekomh13@gmail.com', 1, 'Data Sub', 'Ubah Data', '16', '', ''),
(139, '2020-06-04 12:31:44', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Menambah Data', '100406204', '', ''),
(140, '2020-06-11 08:33:43', 'ekomh13@gmail.com', 1, 'Data Tahun Akademik', 'Menambahkan Data', 'TA-542', '', ''),
(141, '2020-06-11 08:33:55', 'ekomh13@gmail.com', 1, 'Data Tahun Akademik', 'Menambahkan Data', 'TA-655', '', ''),
(142, '2020-06-11 13:43:20', 'ekomh13@gmail.com', 1, 'Data Ruangan', 'Menambah Data', 'RGN-120', '', ''),
(143, '2020-06-11 13:48:07', 'ekomh13@gmail.com', 1, 'Data Ruangan', 'Menambah Data', 'RGN-207', '', ''),
(144, '2020-06-11 15:44:13', 'ekomh13@gmail.com', 1, 'Data Ruangan', 'Menambah Data', 'RGN-313', '', ''),
(145, '2020-06-11 15:47:40', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Menambah Data', '101106205', '', ''),
(146, '2020-06-11 15:53:37', 'ekomh13@gmail.com', 1, 'Data Menu', 'Menambahkan Data', 'cek', '', ''),
(147, '2020-06-11 15:53:50', 'ekomh13@gmail.com', 1, 'Data Menu', 'Menambahkan Data', 'cek2', '', ''),
(148, '2020-06-11 15:54:02', 'ekomh13@gmail.com', 1, 'Data Menu', 'Hapus Data', '19', '', ''),
(149, '2020-06-11 15:54:06', 'ekomh13@gmail.com', 1, 'Data Menu', 'Hapus Data', '18', '', ''),
(150, '2020-06-11 16:07:42', 'ekomh13@gmail.com', 1, 'Data Menu', 'Menambahkan Data', 'cek', '', ''),
(151, '2020-06-11 16:07:42', 'ekomh13@gmail.com', 1, 'Data Menu', 'Menambahkan Data', 'cek', '', ''),
(152, '2020-06-11 16:07:42', 'ekomh13@gmail.com', 1, 'Data Menu', 'Menambahkan Data', 'cek', '', ''),
(153, '2020-06-11 16:07:50', 'ekomh13@gmail.com', 1, 'Data Menu', 'Hapus Data', '22', '', ''),
(154, '2020-06-11 16:07:54', 'ekomh13@gmail.com', 1, 'Data Menu', 'Hapus Data', '21', '', ''),
(155, '2020-06-11 16:47:31', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Ubah Data', '100406204', '', ''),
(156, '2020-06-11 16:48:30', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Ubah Data', '100406204', '', ''),
(157, '2020-06-15 09:20:51', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Ubah Data', '102604201', '', ''),
(158, '2020-06-15 10:15:39', 'ekomh13@gmail.com', 1, 'Data Kelas', 'Ubah Data', 'KLS-01-23', '', ''),
(159, '2020-06-15 10:17:00', 'ekomh13@gmail.com', 1, 'Data Kelas', 'Ubah Data', 'KLS-02-33', '', ''),
(160, '2020-06-15 10:24:01', 'ekomh13@gmail.com', 1, 'Data Kelas', 'Ubah Data', 'KLS-03-45', '', ''),
(161, '2020-06-15 10:24:19', 'ekomh13@gmail.com', 1, 'Data Kelas', 'Ubah Data', 'KLS-04-04', '', ''),
(162, '2020-06-16 03:53:45', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Menambah Data', '101606206', '', ''),
(163, '2020-06-16 16:35:36', 'ekomh13@gmail.com', 1, 'Data Pengguna', 'Hapus Data', '61', '', ''),
(164, '2020-06-16 16:35:40', 'ekomh13@gmail.com', 1, 'Data Pengguna', 'Hapus Data', '62', '', ''),
(165, '2020-06-16 16:35:44', 'ekomh13@gmail.com', 1, 'Data Pengguna', 'Hapus Data', '63', '', ''),
(166, '2020-06-16 16:35:50', 'ekomh13@gmail.com', 1, 'Data Pengguna', 'Hapus Data', '64', '', ''),
(167, '2020-06-16 16:35:55', 'ekomh13@gmail.com', 1, 'Data Pengguna', 'Hapus Data', '65', '', ''),
(168, '2020-06-16 16:36:01', 'ekomh13@gmail.com', 1, 'Data Pengguna', 'Hapus Data', '79', '', ''),
(169, '2020-06-16 16:36:08', 'ekomh13@gmail.com', 1, 'Data Pengguna', 'Hapus Data', '68', '', ''),
(170, '2020-06-16 16:36:12', 'ekomh13@gmail.com', 1, 'Data Pengguna', 'Hapus Data', '71', '', ''),
(171, '2020-06-16 16:36:18', 'ekomh13@gmail.com', 1, 'Data Pengguna', 'Hapus Data', '72', '', ''),
(172, '2020-06-16 16:36:24', 'ekomh13@gmail.com', 1, 'Data Pengguna', 'Hapus Data', '73', '', ''),
(173, '2020-06-16 16:36:29', 'ekomh13@gmail.com', 1, 'Data Pengguna', 'Hapus Data', '74', '', ''),
(174, '2020-06-16 16:36:33', 'ekomh13@gmail.com', 1, 'Data Pengguna', 'Hapus Data', '75', '', ''),
(175, '2020-06-16 16:36:38', 'ekomh13@gmail.com', 1, 'Data Pengguna', 'Hapus Data', '60', '', ''),
(176, '2020-06-16 16:36:42', 'ekomh13@gmail.com', 1, 'Data Pengguna', 'Hapus Data', '76', '', ''),
(177, '2020-06-16 16:36:46', 'ekomh13@gmail.com', 1, 'Data Pengguna', 'Hapus Data', '58', '', ''),
(178, '2020-06-16 16:36:50', 'ekomh13@gmail.com', 1, 'Data Pengguna', 'Hapus Data', '78', '', ''),
(179, '2020-06-16 16:36:54', 'ekomh13@gmail.com', 1, 'Data Pengguna', 'Hapus Data', '77', '', ''),
(180, '2020-06-18 15:11:37', 'ekomh13@gmail.com', 1, 'Data Menu', 'Hapus Data', '15', '', ''),
(181, '2020-06-18 15:11:43', 'ekomh13@gmail.com', 1, 'Data Menu', 'Hapus Data', '20', '', ''),
(182, '2020-06-18 15:11:56', 'ekomh13@gmail.com', 1, 'Data Menu', 'Hapus Data', '16', '', ''),
(183, '2020-06-18 15:12:07', 'ekomh13@gmail.com', 1, 'Data Menu', 'Menambahkan Data', 'Menu', '', ''),
(184, '2020-06-18 15:12:28', 'ekomh13@gmail.com', 1, 'Data Menu', 'Menambahkan Data', 'Sub', '', ''),
(185, '2020-06-18 15:12:52', 'ekomh13@gmail.com', 1, 'Data Menu', 'Menambahkan Data', 'Role', '', ''),
(186, '2020-06-18 15:16:05', 'ekomh13@gmail.com', 1, 'Data Sub', 'Menambah Data', '23', '', ''),
(187, '2020-06-18 15:16:42', 'ekomh13@gmail.com', 1, 'Data Sub', 'Menambah Data', '24', '', ''),
(188, '2020-06-18 15:17:22', 'ekomh13@gmail.com', 1, 'Data Sub', 'Menambah Data', '25', '', '');

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
(1, '2020-05-18 22:26:44', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(2, '2020-05-18 22:29:11', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(3, '2020-05-18 22:29:24', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(4, '2020-05-18 22:30:06', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(5, '2020-05-18 23:08:41', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(6, '2020-05-19 03:54:05', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(7, '2020-05-19 04:04:52', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(8, '2020-05-19 04:34:28', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(9, '2020-05-19 09:02:37', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(10, '2020-05-19 11:35:02', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(11, '2020-05-19 11:41:17', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(12, '2020-05-20 05:47:09', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(13, '2020-05-20 10:06:22', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(14, '2020-05-20 12:59:08', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(15, '2020-05-22 08:02:05', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(16, '2020-05-23 07:01:13', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(17, '2020-05-24 13:33:02', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(18, '2020-05-24 17:41:40', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(19, '2020-05-25 00:21:40', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(20, '2020-05-25 03:17:01', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(21, '2020-05-25 10:29:12', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(22, '2020-05-25 10:43:25', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(23, '2020-05-25 10:43:41', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(24, '2020-05-25 11:21:02', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(25, '2020-05-25 11:32:38', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(26, '2020-05-25 11:32:45', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(27, '2020-05-25 15:12:20', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(28, '2020-05-26 01:57:01', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(29, '2020-05-26 11:38:33', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(30, '2020-05-26 16:03:09', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(31, '2020-05-27 00:36:23', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(32, '2020-05-27 09:37:52', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(33, '2020-05-27 14:30:36', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(34, '2020-05-27 14:31:36', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(35, '2020-05-27 14:31:41', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(36, '2020-05-27 14:34:38', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(37, '2020-05-27 14:34:39', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(38, '2020-05-27 14:35:44', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(39, '2020-05-27 14:36:23', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(40, '2020-05-27 14:36:29', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(41, '2020-05-27 14:36:48', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(42, '2020-05-27 14:36:54', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(43, '2020-05-27 14:38:11', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(44, '2020-05-27 14:38:17', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(45, '2020-05-27 14:39:05', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(46, '2020-05-27 14:39:16', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(47, '2020-05-27 14:40:05', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(48, '2020-05-27 14:42:55', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(49, '2020-05-27 14:42:58', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(50, '2020-05-27 14:43:27', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(51, '2020-05-27 14:43:29', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(52, '2020-05-27 14:43:52', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(53, '2020-05-27 14:43:55', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(54, '2020-05-27 14:44:35', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(55, '2020-05-27 14:44:37', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(56, '2020-05-27 14:45:09', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(57, '2020-05-27 14:45:11', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(58, '2020-05-27 14:45:56', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(59, '2020-05-27 14:45:58', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(60, '2020-05-27 14:47:29', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(61, '2020-05-27 14:47:31', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(62, '2020-05-27 14:49:07', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(63, '2020-05-27 14:49:11', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(64, '2020-05-27 14:50:57', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(65, '2020-05-27 14:51:00', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(66, '2020-05-27 14:51:57', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(67, '2020-05-27 14:52:00', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(68, '2020-05-27 15:19:13', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(69, '2020-05-27 15:21:21', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(70, '2020-05-27 15:21:28', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(71, '2020-05-27 15:21:44', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(72, '2020-05-27 15:22:27', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(73, '2020-05-27 15:22:32', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(74, '2020-05-27 15:22:39', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(75, '2020-05-27 15:22:43', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(76, '2020-05-27 15:24:50', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(77, '2020-05-27 15:24:59', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(78, '2020-05-27 15:25:20', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(79, '2020-05-27 15:25:22', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(80, '2020-05-27 15:27:00', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(81, '2020-05-27 15:27:03', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(82, '2020-05-27 15:46:28', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(83, '2020-05-27 15:51:49', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(84, '2020-05-27 15:51:55', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(85, '2020-05-27 15:53:22', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(86, '2020-05-27 15:53:28', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(87, '2020-05-28 04:21:08', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(88, '2020-05-28 05:27:11', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(89, '2020-05-28 05:27:19', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(90, '2020-05-28 05:35:22', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(91, '2020-05-28 05:35:27', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(92, '2020-05-28 05:38:07', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(93, '2020-05-28 05:38:15', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(94, '2020-05-28 11:54:28', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(95, '2020-05-28 11:56:29', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(96, '2020-05-28 11:56:40', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(97, '2020-05-28 16:59:59', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(98, '2020-05-28 17:00:06', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(99, '2020-05-28 17:00:13', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(100, '2020-05-28 23:16:51', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(101, '2020-05-29 04:04:07', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(102, '2020-05-29 08:31:22', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(103, '2020-05-29 08:31:34', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(104, '2020-05-29 08:31:40', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(105, '2020-05-29 12:04:57', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(106, '2020-05-29 12:09:15', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(107, '2020-05-29 12:09:21', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(108, '2020-05-29 12:21:38', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(109, '2020-05-29 12:21:44', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(110, '2020-05-29 12:22:02', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(111, '2020-05-29 12:22:08', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(112, '2020-05-29 12:23:06', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(113, '2020-05-29 12:23:12', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(114, '2020-05-29 12:24:12', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(115, '2020-05-29 12:24:18', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(116, '2020-05-29 12:24:35', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(117, '2020-05-29 12:24:42', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(118, '2020-05-29 12:27:57', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(119, '2020-05-29 12:28:14', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(120, '2020-05-29 12:29:47', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(121, '2020-05-29 12:29:53', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(122, '2020-05-29 12:33:07', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(123, '2020-05-29 12:33:13', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(124, '2020-05-29 12:37:24', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(125, '2020-05-29 12:37:30', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(126, '2020-05-29 12:41:32', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(127, '2020-05-29 12:41:38', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(128, '2020-05-29 15:05:41', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(129, '2020-05-29 17:27:16', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(130, '2020-05-29 17:28:52', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(131, '2020-05-29 17:30:37', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(132, '2020-05-29 17:30:43', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(133, '2020-05-29 17:32:16', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(134, '2020-05-30 01:02:01', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(135, '2020-05-30 02:18:26', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(136, '2020-05-30 07:31:11', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(137, '2020-05-30 07:31:17', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(138, '2020-05-30 07:31:27', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(139, '2020-05-30 07:31:33', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(140, '2020-05-30 07:31:42', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(141, '2020-05-30 07:38:29', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(142, '2020-05-30 07:38:35', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(143, '2020-05-30 07:40:02', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(144, '2020-05-30 07:40:07', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(145, '2020-05-30 07:42:10', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(146, '2020-05-30 07:42:20', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(147, '2020-05-31 04:44:30', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(148, '2020-05-31 04:56:06', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(149, '2020-05-31 04:56:12', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(150, '2020-05-31 04:56:31', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(151, '2020-05-31 04:56:38', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(152, '2020-05-31 12:23:56', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(153, '2020-05-31 12:32:14', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(154, '2020-06-01 04:35:38', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(155, '2020-06-01 17:09:40', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(156, '2020-06-04 12:30:36', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(157, '2020-06-04 12:43:27', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(158, '2020-06-04 13:08:21', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(159, '2020-06-09 13:54:46', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(160, '2020-06-09 14:04:49', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(161, '2020-06-09 14:30:39', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(162, '2020-06-09 15:23:52', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(163, '2020-06-11 06:12:12', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(164, '2020-06-11 13:17:09', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(165, '2020-06-11 13:29:36', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(166, '2020-06-11 13:29:43', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(167, '2020-06-11 15:43:25', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(168, '2020-06-11 15:43:34', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(169, '2020-06-11 15:49:52', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(170, '2020-06-11 15:49:58', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(171, '2020-06-11 15:50:26', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(172, '2020-06-11 15:50:32', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(173, '2020-06-11 15:50:49', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(174, '2020-06-11 15:50:56', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(175, '2020-06-11 15:52:29', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(176, '2020-06-11 15:52:35', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(177, '2020-06-11 15:52:46', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(178, '2020-06-11 15:52:52', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(179, '2020-06-11 15:54:29', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(180, '2020-06-11 15:54:35', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(181, '2020-06-11 15:55:00', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(182, '2020-06-11 15:55:07', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(183, '2020-06-11 15:55:42', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(184, '2020-06-11 15:55:47', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(185, '2020-06-11 15:58:54', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(186, '2020-06-11 15:59:02', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(187, '2020-06-11 16:00:23', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(188, '2020-06-11 16:00:29', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(189, '2020-06-11 16:04:00', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(190, '2020-06-11 16:04:06', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(191, '2020-06-11 16:06:45', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(192, '2020-06-11 16:06:51', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(193, '2020-06-11 16:07:21', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(194, '2020-06-11 16:07:27', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(195, '2020-06-11 16:11:55', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(196, '2020-06-11 16:12:00', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(197, '2020-06-11 16:12:22', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(198, '2020-06-11 16:12:28', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(199, '2020-06-11 16:12:39', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(200, '2020-06-11 16:12:46', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(201, '2020-06-12 06:05:57', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(202, '2020-06-12 06:06:04', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(203, '2020-06-12 06:06:10', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(204, '2020-06-12 10:07:06', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(205, '2020-06-12 12:58:38', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(206, '2020-06-12 14:35:34', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(207, '2020-06-13 11:59:33', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(208, '2020-06-13 17:20:28', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(209, '2020-06-14 03:03:41', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(210, '2020-06-14 16:20:38', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(211, '2020-06-14 16:23:00', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(212, '2020-06-14 16:23:15', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(213, '2020-06-14 16:24:19', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(214, '2020-06-14 16:34:09', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(215, '2020-06-15 09:00:44', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(216, '2020-06-15 09:37:48', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(217, '2020-06-15 09:37:56', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(218, '2020-06-15 09:38:46', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(219, '2020-06-15 09:38:51', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(220, '2020-06-15 09:39:29', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(221, '2020-06-15 09:39:35', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(222, '2020-06-15 09:42:31', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(223, '2020-06-15 09:42:36', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(224, '2020-06-16 03:50:41', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(225, '2020-06-16 03:56:11', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(226, '2020-06-16 03:59:18', 'AmanoKeita@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(227, '2020-06-16 16:15:26', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(228, '2020-06-16 16:41:02', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(229, '2020-06-16 16:41:31', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(230, '2020-06-17 00:39:29', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(231, '2020-06-17 00:40:09', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(232, '2020-06-17 00:40:18', 'AmanoKeita@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(233, '2020-06-17 00:42:54', 'AmanoKeita@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(234, '2020-06-17 00:43:26', 'AmanoKeita@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(235, '2020-06-17 00:45:49', 'AmanoKeita@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(236, '2020-06-17 00:45:56', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(237, '2020-06-17 00:46:39', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(238, '2020-06-17 00:47:18', 'AmanoKeita@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(239, '2020-06-17 00:47:47', 'AmanoKeita@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(240, '2020-06-17 00:47:55', 'AmanoKeita@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(241, '2020-06-17 00:51:29', 'AmanoKeita@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(242, '2020-06-17 00:51:35', 'AmanoKeita@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(243, '2020-06-17 00:53:09', 'AmanoKeita@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(244, '2020-06-17 00:53:15', 'AmanoKeita@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(245, '2020-06-17 00:53:22', 'AmanoKeita@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(246, '2020-06-17 00:53:35', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(247, '2020-06-17 00:53:53', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(248, '2020-06-17 00:54:44', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(249, '2020-06-17 00:55:32', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(250, '2020-06-17 00:55:44', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(251, '2020-06-17 00:56:38', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(252, '2020-06-17 00:56:44', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(253, '2020-06-17 00:58:30', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(254, '2020-06-17 00:58:40', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(255, '2020-06-17 00:59:04', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(256, '2020-06-17 00:59:10', 'Luqyan04@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(257, '2020-06-17 00:59:39', 'Luqyan04@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(258, '2020-06-17 00:59:46', 'Luqyan04@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(259, '2020-06-17 01:03:44', 'Luqyan04@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(260, '2020-06-17 01:03:56', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(261, '2020-06-17 01:07:40', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(262, '2020-06-17 01:07:48', 'Luqyan04@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(263, '2020-06-17 01:09:29', 'Luqyan04@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(264, '2020-06-17 01:09:37', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(265, '2020-06-17 01:12:15', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(266, '2020-06-17 01:13:00', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(267, '2020-06-17 03:50:00', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(268, '2020-06-17 03:54:58', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(269, '2020-06-17 03:55:19', 'AmanoKeita@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(270, '2020-06-17 04:05:13', 'AmanoKeita@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(271, '2020-06-17 04:05:19', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(272, '2020-06-17 04:07:46', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(273, '2020-06-17 04:07:53', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(274, '2020-06-17 04:07:56', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(275, '2020-06-17 04:08:04', 'AmanoKeita@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(276, '2020-06-17 04:09:10', 'AmanoKeita@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(277, '2020-06-17 04:09:17', 'Luqyan04@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(278, '2020-06-17 04:12:51', 'Luqyan04@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(279, '2020-06-17 04:13:02', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(280, '2020-06-17 04:13:50', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(281, '2020-06-17 04:13:56', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(282, '2020-06-17 04:13:59', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(283, '2020-06-17 04:14:16', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(284, '2020-06-17 04:14:19', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(285, '2020-06-17 04:14:54', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(286, '2020-06-17 04:16:50', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(287, '2020-06-17 04:17:00', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(288, '2020-06-17 04:20:15', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(289, '2020-06-17 04:20:21', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(290, '2020-06-17 04:20:25', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(291, '2020-06-17 04:20:32', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(292, '2020-06-17 04:20:50', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(293, '2020-06-17 04:21:14', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(294, '2020-06-17 04:22:15', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(295, '2020-06-17 04:32:02', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(296, '2020-06-17 04:33:37', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(297, '2020-06-17 04:33:44', 'Luqyan04@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(298, '2020-06-17 04:36:04', 'Luqyan04@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(299, '2020-06-17 04:37:10', 'Luqyan04@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(300, '2020-06-17 04:39:42', 'Luqyan04@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(301, '2020-06-17 04:39:51', 'Luqyan04@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(302, '2020-06-17 04:42:51', 'Luqyan04@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(303, '2020-06-17 04:46:13', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(304, '2020-06-17 04:46:58', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(305, '2020-06-17 04:47:52', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(306, '2020-06-17 04:50:41', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(307, '2020-06-17 04:50:47', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(308, '2020-06-17 04:51:13', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(309, '2020-06-17 04:51:45', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(310, '2020-06-17 04:51:52', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(311, '2020-06-17 04:54:12', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(312, '2020-06-17 05:00:11', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(313, '2020-06-17 05:00:29', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(314, '2020-06-17 05:03:17', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(315, '2020-06-17 05:26:42', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(316, '2020-06-17 05:35:23', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(317, '2020-06-17 05:37:45', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(318, '2020-06-17 05:37:48', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(319, '2020-06-17 05:38:27', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(320, '2020-06-17 05:38:37', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(321, '2020-06-17 05:38:45', 'Luqyan04@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(322, '2020-06-17 05:44:13', 'Luqyan04@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(323, '2020-06-17 05:44:28', 'Luqyan04@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(324, '2020-06-17 05:44:33', 'Luqyan04@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(325, '2020-06-17 05:44:58', 'AmanoKeita@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(326, '2020-06-17 06:09:08', 'AmanoKeita@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(327, '2020-06-17 09:06:01', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(328, '2020-06-17 09:08:41', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(329, '2020-06-17 09:08:50', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(330, '2020-06-17 09:13:34', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(331, '2020-06-17 09:13:42', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(332, '2020-06-17 09:21:45', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(333, '2020-06-17 09:21:58', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(334, '2020-06-17 09:23:46', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(335, '2020-06-17 09:23:52', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(336, '2020-06-17 09:24:51', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(337, '2020-06-17 09:24:59', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(338, '2020-06-17 09:27:59', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(339, '2020-06-17 09:28:13', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(340, '2020-06-17 15:57:47', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(341, '2020-06-18 14:11:37', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(342, '2020-06-18 14:19:23', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(343, '2020-06-18 14:19:29', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(344, '2020-06-18 14:19:36', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(345, '2020-06-18 14:19:52', 'Luqyan04@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(346, '2020-06-18 14:20:41', 'Luqyan04@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(347, '2020-06-18 14:21:50', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(348, '2020-06-18 14:39:20', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(349, '2020-06-18 14:39:26', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(350, '2020-06-18 14:47:41', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(351, '2020-06-18 14:47:47', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(352, '2020-06-18 15:07:26', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(353, '2020-06-18 15:07:32', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(354, '2020-06-18 15:18:16', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(355, '2020-06-18 15:18:22', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(356, '2020-06-18 15:18:25', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(357, '2020-06-18 15:18:31', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(358, '2020-06-19 05:41:23', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(359, '2020-06-19 05:44:42', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(360, '2020-06-19 05:44:48', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(361, '2020-06-19 05:52:45', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(362, '2020-06-19 05:52:51', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(363, '2020-06-19 05:53:03', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(364, '2020-06-19 05:53:08', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(365, '2020-06-19 05:58:45', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(366, '2020-06-19 05:59:27', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(367, '2020-06-19 06:01:33', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(368, '2020-06-19 06:01:41', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(369, '2020-06-19 06:02:17', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(370, '2020-06-19 06:02:24', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(371, '2020-06-19 06:02:32', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(372, '2020-06-19 06:02:38', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(373, '2020-06-19 06:07:09', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(374, '2020-06-19 06:07:23', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(375, '2020-06-19 06:09:21', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(376, '2020-06-19 06:09:29', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(377, '2020-06-19 06:10:04', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(378, '2020-06-19 06:27:41', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(379, '2020-06-19 06:28:11', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(380, '2020-06-19 06:28:29', 'Amano04@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(381, '2020-06-19 12:42:04', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna');

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
('MK-01-14', 'Lempar Lari', 'Aktif', 'JR-01-17'),
('MK-02-08', 'Belom', 'Aktif', 'JR-02-42'),
('MK-03-19', 'Belom', 'Aktif', 'JR-03-09'),
('MK-04-29', 'Belom', 'Aktif', 'JR-03-09'),
('MK-05-37', 'Belom', 'Aktif', 'JR-01-17'),
('MK-06-56', 'Belom', 'Aktif', 'JR-04-51'),
('MK-07-09', 'Belom', 'Aktif', 'JR-01-17'),
('MK-08-41', 'Belum', 'Aktif', 'JR-08-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` varchar(50) NOT NULL,
  `nim_mhs` varchar(50) NOT NULL,
  `nilai_presensi` int(11) NOT NULL,
  `nilai_tugas` int(11) NOT NULL,
  `nilai_uts` int(11) NOT NULL,
  `nilai_uas` int(11) NOT NULL,
  `total_nilai` int(11) NOT NULL,
  `nilai_akhir` int(11) NOT NULL,
  `grade` char(1) NOT NULL,
  `status` varchar(12) NOT NULL,
  `id_krs` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `nim_mhs`, `nilai_presensi`, `nilai_tugas`, `nilai_uts`, `nilai_uas`, `total_nilai`, `nilai_akhir`, `grade`, `status`, `id_krs`) VALUES
('NLI-142', '102505202', 0, 0, 0, 0, 0, 2, '', 'Aktif', 'KRS-304'),
('NLI-252', '102505202', 0, 0, 0, 0, 0, 3, 'E', 'Aktif', 'KRS-441'),
('NLI-307', '102604201', 0, 0, 0, 0, 0, 5, '', 'Aktif', 'KRS-351'),
('NLI-415', '102604201', 100, 100, 100, 100, 400, 10, 'A', 'Aktif', 'KRS-424'),
('NLI-507', '102905203', 0, 0, 0, 0, 0, 0, 'E', 'Aktif', 'KRS-652'),
('NLI-621', '102905203', 0, 0, 0, 0, 0, 0, '', 'Aktif', 'KRS-543');

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
('RGN-120', 'Ruang Kesehatan', '1', '10', 'Ruang Kesehatan Adalah Ruangan :v', 'Aktif', '05'),
('RGN-207', 'Ruang Kelas 01 ', '1', '30', 'Ruang Kelas adalah Tempat Untuk Belajar', 'Aktif', '01'),
('RGN-313', 'Ruang Kelas 012', '1', '30', 'Ruang Kelas', 'Aktif', '01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ruangan_jenis`
--

CREATE TABLE `tb_ruangan_jenis` (
  `id_jenis_ruangan` varchar(36) NOT NULL,
  `nama_jr` varchar(255) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_ruangan_jenis`
--

INSERT INTO `tb_ruangan_jenis` (`id_jenis_ruangan`, `nama_jr`, `status`) VALUES
('01', 'Ruang Kelas', 'AKTIF'),
('02', 'Asrama Putra', 'AKTIF'),
('03', 'Asrama Putri', 'AKTIF'),
('04', 'Ruang Rapat', 'AKTIF'),
('05', 'Aula', 'AKTIF'),
('06', 'Ruang Kantor', 'AKTIF');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tahun_akademik`
--

CREATE TABLE `tb_tahun_akademik` (
  `id_tahun_akademik` varchar(25) NOT NULL,
  `nama_tahun_akademik` varchar(128) NOT NULL,
  `semester` int(11) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tahun_akademik`
--

INSERT INTO `tb_tahun_akademik` (`id_tahun_akademik`, `nama_tahun_akademik`, `semester`, `status`) VALUES
('TA-152', '2017/2018', 1, 'Tidak Aktif'),
('TA-218', '2018/2019', 2, 'Aktif'),
('TA-355', '2016/2017', 2, 'Aktif'),
('TA-425', '2018/2019', 2, 'Aktif'),
('TA-542', 'Test', 2, 'Aktif'),
('TA-655', 'Coba', 1, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transkrip_nilai`
--

CREATE TABLE `tb_transkrip_nilai` (
  `id_transkrip_nilai` varchar(50) NOT NULL,
  `nim_mhs` varchar(128) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transkrip_nilai`
--

INSERT INTO `tb_transkrip_nilai` (`id_transkrip_nilai`, `nim_mhs`, `status`) VALUES
('TN-145', '102604201', 'Aktif'),
('TN-221', '102505202', 'Aktif'),
('TN-343', '102905203', 'Aktif');

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
  `data_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `nama_panggilan`, `email`, `image`, `password`, `password_asli`, `id_role`, `status`, `data_created`) VALUES
(56, 'Eko Muchamad Haryono', 'Amano29', 'ekomh13@gmail.com', 'IMG_20200223_164959.jpg', '$2y$10$swL/vw8PBtKqJwIItyBtcuxHWhuBMRYx5BfV1WXifMSdrEWbO1o92', '12345', 1, 'Aktif', '2019-12-26 13:54:37'),
(80, 'Cahaya Melati Mutiara', 'Cahaya', 'Cahaya03@tazkia.ac.id', 'index.jpg', '$2y$10$s5vQJncxx4CZic6CcOrm8OeXd8GXAQk.b9bXJH9wub4npASXgzsIm', '12345', 2, 'Aktif', '2020-06-17 07:53:49'),
(81, 'Dr. Luqyan Tamanni, M.Ec', 'Luqyan ', 'Luqyan04@dosentazkia.ac.id', 'IMG_20200223_165103.jpg', '$2y$10$2ZJsQOmxz9b/pSBKwcc10.aCQc.OVkD8qc5H.YYz6LFazgOBsB7JC', '$2y$10$2ZJsQOmxz9b/pSBKwcc10.aCQc.OVkD8qc5H.YYz6LFazgOBsB7JC', 3, 'Aktif', '2020-06-17 07:58:52'),
(82, 'Eko Muchamad Haryono', 'Amano', 'Amano04@tazkia.ac.id', 'IMG_20200223_164959.jpg', '$2y$10$5pnhFof2U3RoFRoT/Rpl5uBcTHY1sZ2jzFsWwjz0AY2kh1syM12VW', '$2y$10$5pnhFof2U3RoFRoT/Rpl5uBcTHY1sZ2jzFsWwjz0AY2kh1syM12VW', 2, 'Aktif', '2020-06-19 13:27:53'),
(83, 'Renanda Liana Putri', 'Nanda', 'nanda201@gmail.com', 'index.png', '$2y$10$afcQWSFoO3vuQKTDexDFCu0DnAzvFFRmBQwuIb5kt/voQ3caUhnie', '12345', 4, 'Aktif', '2020-06-19 19:44:48'),
(84, 'Syahira Laila Mutiara', 'Syahira', 'syahira29@gmail.com', 'index.png', '$2y$10$69.3wGLJu143b1Mz0xtse.Op.sxkAszJy3jNsk0BuSYFocYF3fWfG', '12345', 5, 'Aktif', '2020-06-19 19:45:55');

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
(9, 1, 13),
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
(53, 3, 12),
(54, 3, 13),
(58, 1, 17),
(59, 3, 1),
(61, 5, 17),
(62, 2, 3),
(65, 3, 14),
(66, 3, 17),
(67, 3, 7),
(68, 3, 8),
(69, 3, 9),
(70, 3, 11),
(71, 3, 6),
(72, 3, 10),
(73, 1, 11),
(74, 1, 5),
(75, 1, 6),
(76, 1, 7),
(77, 1, 8),
(78, 1, 9),
(79, 1, 10),
(80, 1, 23);

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
(1, 'Dashboard'),
(2, 'Pengguna'),
(3, 'Profile'),
(4, 'Auth'),
(5, 'Mahasiswa'),
(6, 'Dosen'),
(7, 'Fakultas'),
(8, 'Jurusan'),
(9, 'Matkul'),
(10, 'Kelas'),
(11, 'Ruangan'),
(12, 'Ipk'),
(13, 'KrsDetail'),
(14, 'TranskripNilai'),
(17, 'Nilai'),
(23, 'Menu'),
(24, 'Sub'),
(25, 'Role');

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
  `keterangan` text NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `id_menu`, `title`, `url`, `icon`, `keterangan`, `status`) VALUES
(1, 1, 'Dashboard', 'Dashboard', 'tachometer-alt', 'coba', 'Aktif'),
(2, 2, 'Data Users', 'Pengguna', 'user', '', 'Aktif'),
(3, 3, 'Profile', 'Profile', 'user', '', 'Aktif'),
(4, 4, 'Register Admin', 'Auth/register', 'user-plus', '', 'Aktif'),
(5, 5, 'Data Mahasiswa', 'Mahasiswa', 'table', '', 'Aktif'),
(6, 6, 'Data Dosen', 'Dosen', 'table', '', 'Aktif'),
(7, 7, 'Data Fakultas', 'Fakultas', 'table', '', 'Aktif'),
(8, 8, 'Data Jurusan', 'Jurusan', 'table', '', 'Aktif'),
(9, 9, 'Data Matkul', 'Matkul', 'table', '', 'Aktif'),
(10, 10, 'Data Kelas', 'Kelas', 'table', '', 'Aktif'),
(11, 11, 'Data Ruangan', 'Ruangan', 'table', '', 'Aktif'),
(12, 12, 'Penilaian IPK', 'Ipk', 'tasks', '', 'Aktif'),
(13, 13, 'Penilaian KRS', 'KrsDetail', 'tasks', '', 'Aktif'),
(14, 14, 'Transkrip Nilai', 'TranskripNilai', 'tasks', '', 'Aktif'),
(15, 17, 'Penilaian Nilai Akhir', 'Nilai', 'fas fa-tasks', '', 'Aktif'),
(16, 15, 'Penjadwalan Mengajar Dosen', 'Jadwal', 'clipboard-list', 'Test\r\n', 'Tidak Aktif'),
(22, 23, 'Pengaturan Menu', 'Menu', 'fa fa-cog', 'Pengaturan Menu Berfungsi ', 'Aktif'),
(23, 24, 'Pengaturan Sub Menu', 'Sub', 'fa fa-cog', 'Pengaturan Sub Menu Berfungsi', 'Aktif'),
(24, 25, 'Pengaturan Role', 'Role', 'fa fa-cog', 'Pengaturan Role Berfungsi,', 'Aktif');

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
  ADD PRIMARY KEY (`id_ipk`),
  ADD UNIQUE KEY `nim_mhs` (`nim_mhs`);

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
-- Indeks untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`);

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
  ADD PRIMARY KEY (`id_transkrip_nilai`),
  ADD UNIQUE KEY `nim_mhs` (`nim_mhs`);

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
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT untuk tabel `tb_log_login`
--
ALTER TABLE `tb_log_login`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=382;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT untuk tabel `user_akses_menu`
--
ALTER TABLE `user_akses_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
