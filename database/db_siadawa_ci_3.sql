-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 09, 2020 at 10:09 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siadawa_ci_3`
--

-- --------------------------------------------------------

--
-- Table structure for table `krs_detail`
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
-- Dumping data for table `krs_detail`
--

INSERT INTO `krs_detail` (`id_krs`, `nim_mhs`, `id_dosen`, `nilai_krs`, `grade`, `status`) VALUES
('KRS-1005', '102407203', '0203072416', 4, 'A', 'Aktif'),
('KRS-115', '101907201', '0201071925', 0, '', 'Aktif'),
('KRS-303', '', '0201071925', 0, '', 'Aktif'),
('KRS-335', '101907202', '0201071925', 4, 'A', 'Aktif'),
('KRS-415', '101907201', '0202071914', 0, '', 'Aktif'),
('KRS-554', '101907202', '0202071914', 3, 'B', 'Aktif'),
('KRS-638', '101907201', '0203072416', 0, '', 'Aktif'),
('KRS-736', '102407204', '0201071925', 1, 'D', 'Aktif'),
('KRS-803', '102407203', '0201071925', 3, 'B', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
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
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim_mhs`, `image`, `nama`, `nama_panggilan`, `jenis_kelamin`, `agama`, `tmpt_lahir`, `tanggal_lahir`, `alamat`, `no_telp`, `email`, `status`, `id_role`, `id_jurusan`, `id_kelas`, `id_tahun_akademik`) VALUES
(100909205, 'Fahmi_Idris-09-09-20.jpg', 'Fahmi Idris', 'Fahmi', 'Laki-Laki', 'Islam', 'Bogor', '2003-12-31', 'Bogor', '08221861428', 'Fahmi012@tazkia.ac.id', 'Aktif', 2, 'JR-03-09', 'KLS-05-15', 'TA-218'),
(101907201, 'Fahmi_Idris-25-07-20.jpg', 'Fahmi Idris', 'Fahmi', 'Laki-Laki', 'Islam', 'Bogor', '2004-01-01', 'Bogor', '08221861428', 'Fahmi03@tazkia.ac.id', 'Aktif', 2, 'JR-03-09', 'KLS-01-23', 'TA-425'),
(101907202, 'Muhammad_Akbar_Maulana_-25-07-20.jpg', 'Muhammad Akbar Maulana ', 'Akbar', 'Laki-Laki', 'Islam', 'Bogor', '2003-10-09', 'Bogor', '082218212123', 'Akbar04@tazkia.ac.id', 'Aktif', 2, 'JR-02-42', 'KLS-06-26', 'TA-218'),
(102407203, 'Eko_Muchamad_Haryono-25-07-20.jpg', 'Eko Muchamad Haryono', 'Eko', 'Laki-Laki', 'Islam', 'Bogor', '2003-12-11', 'Bogor', '08221861428', 'Eko011@tazkia.ac.id', 'Aktif', 2, 'JR-03-09', 'KLS-03-45', 'TA-425');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
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
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`id_dosen`, `nama_dosen`, `nama_panggilan`, `jenis_kelamin`, `agama`, `tmpt_lahir`, `tanggal_lahir`, `alamat`, `no_telp`, `image`, `email`, `status`, `id_role`, `id_matkul`) VALUES
('0201071925', 'Pak Dosen', 'Dosen', 'Laki-Laki', 'Islam', 'Bogor', '2020-07-03', 'Bogor', '08221861221', 'Pak_Dosen-25-07-20.jpg', 'Dosen02@dosentazkia.ac.id', 'Aktif', 3, 'MK-01-14'),
('0202071914', 'Mba Dosen', 'Mba Dsn', 'Perempuan', 'Islam', 'Bogor', '2020-07-09', 'Bogor', '08221861428', 'Mba_Dosen-25-07-20.jpg', 'MbaDsn07@dosentazkia.ac.id', 'Aktif', 3, 'MK-02-08'),
('0203072416', 'Kak Dosen', 'Kak', 'Laki-Laki', 'Islam', 'Sulawesi', '2001-07-26', 'Bogor', '08221861428', 'Kak_Dosen-25-07-20.jpg', 'Kak08@dosentazkia.ac.id', 'Aktif', 3, 'MK-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `tb_fakultas`
--

CREATE TABLE `tb_fakultas` (
  `id_fakultas` varchar(128) NOT NULL,
  `nama_fakultas` varchar(128) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_fakultas`
--

INSERT INTO `tb_fakultas` (`id_fakultas`, `nama_fakultas`, `keterangan`, `status`) VALUES
('FKS-01-24', 'Fakultas Ekonomi', 'Ekonomi', 'Aktif'),
('FKS-02-11', 'Fakultas Hukum', 'Hukum', 'Aktif'),
('FKS-03-57', 'Fakultas Pendidikan', 'Pendidikan Syariah', 'Aktif'),
('FKS-04-30', 'Belum Diisi', 'Tidak Memiliki Fakultas', 'Aktif'),
('FKS-0736', 'TEST', 'TEST', 'Tidak Aktif'),
('FKS-0753', 'Contoh ', 'Contoh PERCOBAAN', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ipk`
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
-- Dumping data for table `tb_ipk`
--

INSERT INTO `tb_ipk` (`id_ipk`, `nim_mhs`, `sks_total`, `bobot_total`, `nilai_total_sks`, `ipk`) VALUES
('IPK-136', '101907201', 0, '0.00', 0, '0.00'),
('IPK-243', '101907202', 0, '1.00', 0, '0.00'),
('IPK-317', '102407203', 2, '0.00', 7, '3.00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenjang_pendidikan`
--

CREATE TABLE `tb_jenjang_pendidikan` (
  `id_jenjang_pendidikan` int(11) NOT NULL,
  `nama_lengkap_jp` varchar(250) NOT NULL,
  `nama_jp` varchar(128) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenjang_pendidikan`
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
-- Table structure for table `tb_jurusan`
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
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `nama_jurusan`, `id_jenjang_pendidikan`, `penjelasan`, `status`, `id_fakultas`) VALUES
('JR-01-17', 'Ekonomi Syariah', '6', 'Ekonomi Syariah Adalah', 'Aktif', 'FKS-01-24'),
('JR-02-42', 'Akutansi Syariah ', '6', 'Fakultas Ekonomi Adalah', 'Aktif', 'FKS-01-24'),
('JR-03-09', 'Managemen Bisnis Syariah', '3', 'Manajemen Bisnis Syariah Adalah', 'Aktif', 'FKS-01-24'),
('JR-04-51', 'Hukum Ekonomi Syariah', '6', 'Hukum Ekonomi Syariah Adalah', 'Aktif', 'FKS-02-11'),
('JR-05-32', 'Tadris Ilmu Pengetahuan Sosial', '3', 'Tadris Ilmu Pengetahuan Sosial', 'Aktif', 'FKS-03-57'),
('JR-06-13', 'Belum Diisi', '8', 'Bagi Data Yang Masih Bingung Saat Mengisi nya\r\n', 'Aktif', 'FKS-04-30'),
('JR-07-38', 'Test', '8', 'Test hanya TESTING', 'Tidak Aktif', 'FKS-04-30'),
('JR-08-07', 'Coba', '8', 'Coba Hanya Percobaan', 'Tidak Aktif', 'FKS-04-30'),
('JR-09-56', 'Percobaan', '8', 'Percobaan', 'Tidak Aktif', 'FKS-0648');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` varchar(128) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `status` varchar(128) NOT NULL,
  `id_ruangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`, `status`, `id_ruangan`) VALUES
('KLS-01-23', 'MBS - 01', 'Aktif', 'RGN-120'),
('KLS-02-33', 'AKS - 01', 'Tidak Aktif', 'RGN-313'),
('KLS-03-45', 'MBS - 02', 'Aktif', 'RGN-207'),
('KLS-04-04', 'AKS - 02', 'Aktif', 'RGN-120'),
('KLS-05-15', 'MBS - 03', 'Tidak Aktif', 'RGN-207'),
('KLS-06-26', 'AKS - 03', 'Aktif', 'RGN-06-03'),
('KLS-07-36', 'AKS - 00', 'Aktif', 'RGN-01-37'),
('KLS-08-09', 'Percobaan', 'Tidak Aktif', '01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_log`
--

CREATE TABLE `tb_log` (
  `id_log` int(11) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `log_user` varchar(50) NOT NULL,
  `log_role` int(11) NOT NULL,
  `log_tipe` varchar(50) NOT NULL,
  `log_aksi` varchar(50) NOT NULL,
  `log_item` varchar(50) NOT NULL,
  `log_assign_to` varchar(50) NOT NULL,
  `log_assign_type` enum('pengguna','lokasi','asset','inventori') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_log`
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
(188, '2020-06-18 15:17:22', 'ekomh13@gmail.com', 1, 'Data Sub', 'Menambah Data', '25', '', ''),
(189, '2020-06-21 01:14:05', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Ubah Data', '100406204', '', ''),
(190, '2020-06-21 01:35:58', 'ekomh13@gmail.com', 1, 'Data Pengguna', 'Hapus Data', '88', '', ''),
(191, '2020-06-21 01:36:04', 'ekomh13@gmail.com', 1, 'Data Pengguna', 'Hapus Data', '87', '', ''),
(192, '2020-06-21 01:36:13', 'ekomh13@gmail.com', 1, 'Data Pengguna', 'Hapus Data', '86', '', ''),
(193, '2020-06-21 01:38:27', 'ekomh13@gmail.com', 1, 'Data Dosen', 'Menambah Data', '02012062126', '', ''),
(194, '2020-06-21 01:43:49', 'ekomh13@gmail.com', 1, 'Data Dosen', 'Ubah Data', '02012062126', '', ''),
(195, '2020-06-21 01:45:22', 'ekomh13@gmail.com', 1, 'Data Fakultas', 'Hapus Data', 'FKS-05-55', '', ''),
(196, '2020-06-21 01:45:36', 'ekomh13@gmail.com', 1, 'Data Fakultas', 'Menambah Data', 'FKS-0736', '', ''),
(197, '2020-06-21 01:45:45', 'ekomh13@gmail.com', 1, 'Data Mata Kuliah', 'Ubah Data', 'FKS-0736', '', ''),
(198, '2020-06-21 01:45:53', 'ekomh13@gmail.com', 1, 'Data Mata Kuliah', 'Ubah Data', 'FKS-0736', '', ''),
(199, '2020-06-21 01:46:14', 'ekomh13@gmail.com', 1, 'Data Mata Kuliah', 'Ubah Data', 'FKS-0753', '', ''),
(200, '2020-06-21 01:46:54', 'ekomh13@gmail.com', 1, 'Data Jurusan', 'Ubah Data', 'JR-08-07', '', ''),
(201, '2020-06-21 01:47:44', 'ekomh13@gmail.com', 1, 'Data Jurusan', 'Ubah Data', 'JR-07-38', '', ''),
(202, '2020-06-21 01:48:51', 'ekomh13@gmail.com', 1, 'Data Jurusan', 'Ubah Data', 'JR-06-13', '', ''),
(203, '2020-06-21 02:43:51', 'ekomh13@gmail.com', 1, 'Data Dosen', 'Ubah Data', '0201011731', '', ''),
(204, '2020-06-21 13:28:53', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Ubah Data', '100406204', '', ''),
(205, '2020-06-21 14:04:40', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Ubah Data', '100406204', '', ''),
(206, '2020-06-21 14:05:03', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Ubah Data', '100406204', '', ''),
(207, '2020-06-21 14:09:33', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Ubah Data', '101106205', '', ''),
(208, '2020-06-21 14:15:11', 'ekomh13@gmail.com', 1, 'Data Dosen', 'Ubah Data', '0201011731', '', ''),
(209, '2020-06-30 13:59:17', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Menambah Data', '103006207', '', ''),
(210, '2020-06-30 14:11:22', 'ekomh13@gmail.com', 1, 'Data Dosen', 'Menambah Data', '02013063021', '', ''),
(211, '2020-06-30 14:13:15', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Ubah Data', '102505202', '', ''),
(212, '2020-07-19 14:37:35', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Menambah Data', '101907201', '', ''),
(213, '2020-07-19 14:38:26', 'ekomh13@gmail.com', 1, 'Data Dosen', 'Menambah Data', '0201071925', '', ''),
(214, '2020-07-19 14:49:11', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Menambah Data', '101907202', '', ''),
(215, '2020-07-19 15:35:15', 'ekomh13@gmail.com', 1, 'Data Dosen', 'Menambah Data', '0202071914', '', ''),
(216, '2020-07-20 00:02:04', 'ekomh13@gmail.com', 1, 'Data Role', 'Ubah Data', 'Operator Pendataan', '', ''),
(217, '2020-07-20 00:11:45', 'Dosen02@dosentazkia.ac.id', 3, 'Data Krs', 'Menambah Data', 'KRS-245', '', ''),
(218, '2020-07-20 00:12:03', 'Dosen02@dosentazkia.ac.id', 3, 'Data Krs', 'Menambah Data', 'KRS-303', '', ''),
(219, '2020-07-20 00:13:46', 'Dosen02@dosentazkia.ac.id', 3, 'Data Krs', 'Menambah Data', 'KRS-345', '', ''),
(220, '2020-07-20 00:16:45', 'Dosen02@dosentazkia.ac.id', 3, 'Data Krs', 'Menambah Data', 'KRS-345', '', ''),
(221, '2020-07-20 00:16:57', 'Dosen02@dosentazkia.ac.id', 3, 'Data Krs', 'Menambah Data', 'KRS-356', '', ''),
(222, '2020-07-20 00:17:19', 'Dosen02@dosentazkia.ac.id', 3, 'Data Krs', 'Menambah Data', 'KRS-319', '', ''),
(223, '2020-07-24 08:56:04', 'ekomh13@gmail.com', 1, 'Data Fakultas', 'Hapus Data', 'FKS-0648', '', ''),
(224, '2020-07-24 08:56:56', 'ekomh13@gmail.com', 1, 'Data Fakultas', 'Menambah Data', 'FKS-0755', '', ''),
(225, '2020-07-24 08:57:01', 'ekomh13@gmail.com', 1, 'Data Fakultas', 'Hapus Data', 'FKS-0755', '', ''),
(226, '2020-07-24 09:10:22', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Menambah Data', '102407203', '', ''),
(227, '2020-07-24 10:37:28', 'ekomh13@gmail.com', 1, 'Data Role', 'Menambah Data', '[removed]  alert&#40;\'Login Gagal Password dan Nam', '', ''),
(228, '2020-07-24 10:38:06', 'ekomh13@gmail.com', 1, 'Data Role', 'Menambah Data', '<H1>lAMA<H1>', '', ''),
(229, '2020-07-24 10:38:18', 'ekomh13@gmail.com', 1, 'Data Role', 'Hapus Data', '9', '', ''),
(230, '2020-07-24 10:38:23', 'ekomh13@gmail.com', 1, 'Data Role', 'Hapus Data', '8', '', ''),
(231, '2020-07-24 10:49:16', 'ekomh13@gmail.com', 1, 'Data Role', 'Menambah Data', '[removed]  alert&#40;\'Login Gagal Password dan Nam', '', ''),
(232, '2020-07-24 10:49:26', 'ekomh13@gmail.com', 1, 'Data Role', 'Menambah Data', '<H1>lAMA<H1>', '', ''),
(233, '2020-07-24 10:59:58', 'ekomh13@gmail.com', 1, 'Data Role', 'Menambah Data', '[removed]  alert&#40;\'Login Gagal Password dan Nam', '', ''),
(234, '2020-07-24 11:00:08', 'ekomh13@gmail.com', 1, 'Data Role', 'Menambah Data', '<H1>lAMA<H1>', '', ''),
(235, '2020-07-24 15:21:28', 'ekomh13@gmail.com', 1, 'Data Mata Kuliah', 'Ubah Data', 'MK-02-08', '', ''),
(236, '2020-07-24 15:21:47', 'ekomh13@gmail.com', 1, 'Data Mata Kuliah', 'Ubah Data', 'MK-04-29', '', ''),
(237, '2020-07-24 15:23:17', 'ekomh13@gmail.com', 1, 'Data Dosen', 'Menambah Data', '0203072416', '', ''),
(238, '2020-07-24 16:11:34', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Menambah Data', '102407204', '', ''),
(239, '2020-07-24 16:11:55', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Ubah Data', '102407204', '', ''),
(240, '2020-07-24 16:12:50', 'ekomh13@gmail.com', 1, 'Data Dosen', 'Menambah Data', '0204072450', '', ''),
(241, '2020-07-24 16:15:00', 'ekomh13@gmail.com', 1, 'Data Dosen', 'Ubah Data', '0204072450', '', ''),
(242, '2020-07-25 02:47:31', 'ekomh13@gmail.com', 1, 'Data Role', 'Hapus Data', '13', '', ''),
(243, '2020-07-25 02:47:36', 'ekomh13@gmail.com', 1, 'Data Role', 'Hapus Data', '12', '', ''),
(244, '2020-07-25 02:48:20', 'ekomh13@gmail.com', 1, 'Data Role', 'Hapus Data', '11', '', ''),
(245, '2020-07-25 02:48:25', 'ekomh13@gmail.com', 1, 'Data Role', 'Hapus Data', '10', '', ''),
(246, '2020-07-25 02:49:15', 'ekomh13@gmail.com', 1, 'Data Transkrip Nilai', 'Menambah Data', 'TN-115', '', ''),
(247, '2020-07-25 02:49:22', 'ekomh13@gmail.com', 1, 'Data Transkrip Nilai', 'Menambah Data', 'TN-222', '', ''),
(248, '2020-07-25 02:49:36', 'ekomh13@gmail.com', 1, 'Data Ipk', 'Menambah Data', 'IPK-136', '', ''),
(249, '2020-07-25 02:49:44', 'ekomh13@gmail.com', 1, 'Data Ipk', 'Menambah Data', 'IPK-243', '', ''),
(250, '2020-07-25 07:57:34', 'ekomh13@gmail.com', 1, 'Data Dosen', 'Ubah Data', '0204072450', '', ''),
(251, '2020-07-25 07:59:07', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Ubah Data', '101907201', '', ''),
(252, '2020-07-25 08:00:15', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Ubah Data', '101907202', '', ''),
(253, '2020-07-25 08:00:38', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Ubah Data', '102407203', '', ''),
(254, '2020-07-25 08:01:33', 'ekomh13@gmail.com', 1, 'Data Dosen', 'Ubah Data', '0201071925', '', ''),
(255, '2020-07-25 08:01:59', 'ekomh13@gmail.com', 1, 'Data Dosen', 'Ubah Data', '0202071914', '', ''),
(256, '2020-07-25 08:02:23', 'ekomh13@gmail.com', 1, 'Data Dosen', 'Ubah Data', '0203072416', '', ''),
(257, '2020-07-26 14:21:44', 'ekomh13@gmail.com', 1, 'Data Tahun Akademik', 'Menambahkan Data', 'TA-744', '', ''),
(258, '2020-07-26 14:21:51', 'ekomh13@gmail.com', 1, 'Data Tahun Akademik', 'Ubah Data', 'TA-744', '', ''),
(259, '2020-07-26 14:22:44', 'ekomh13@gmail.com', 1, 'Data Tahun Akademik', 'Hapus Data', 'TA-744', '', ''),
(260, '2020-07-26 14:22:49', 'ekomh13@gmail.com', 1, 'Data Tahun Akademik', 'Hapus Data', 'TA-542', '', ''),
(261, '2020-07-26 15:35:01', 'ekomh13@gmail.com', 1, 'Data Role', 'Ubah Data', 'Operator Pendataan Informasi', '', ''),
(262, '2020-07-28 03:27:58', 'ekomh13@gmail.com', 1, 'Data Transkrip Nilai', 'Menambah Data', 'TN-358', '', ''),
(263, '2020-07-28 03:28:53', 'Dosen02@dosentazkia.ac.id', 3, 'Data Nilai', 'Ubah Data', 'NLI-215', '', ''),
(264, '2020-09-09 13:43:20', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Menambah Data', '100909205', '', ''),
(265, '2020-09-20 17:07:10', 'ekomh13@gmail.com', 1, 'Data Transkrip Nilai', 'Menambah Data', 'TN-410', '', ''),
(266, '2020-09-21 15:10:39', 'ekomh13@gmail.com', 1, 'Data Kelas', 'Ubah Data', 'KLS-05-15', '', ''),
(267, '2020-09-21 15:10:54', 'ekomh13@gmail.com', 1, 'Data Kelas', 'Ubah Data', 'KLS-02-33', '', ''),
(268, '2020-09-25 16:48:18', 'ekomh13@gmail.com', 1, 'Data Ipk', 'Menambah Data', 'IPK-317', '', ''),
(269, '2020-09-25 16:48:56', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-956', '', ''),
(270, '2020-09-25 16:49:05', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-1005', '', ''),
(271, '2020-09-25 16:49:14', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-1005', '', ''),
(272, '2020-09-25 16:49:23', 'ekomh13@gmail.com', 1, 'Data Krs', 'Menambah Data', 'KRS-956', '', ''),
(273, '2020-09-29 15:47:34', 'ekomh13@gmail.com', 1, 'Data Mahasiswa', 'Hapus Data', '102407204', '', ''),
(274, '2020-09-29 16:04:10', 'ekomh13@gmail.com', 1, 'Data Krs', 'Hapus Data', 'KRS-956', '', ''),
(275, '2020-09-29 16:15:31', 'ekomh13@gmail.com', 1, 'Data Transkrip Nilai', 'Hapus Data', 'TN-358', '', ''),
(276, '2020-09-29 16:30:33', 'ekomh13@gmail.com', 1, 'Data Pengguna', 'Hapus Data', '68', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_log_login`
--

CREATE TABLE `tb_log_login` (
  `id_log` int(11) NOT NULL,
  `log_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `log_user` varchar(50) NOT NULL,
  `log_tipe` varchar(50) NOT NULL,
  `log_role` int(11) NOT NULL,
  `log_desc` varchar(50) NOT NULL,
  `log_status` enum('pengguna','lokasi','asset','inventori') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_log_login`
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
(381, '2020-06-19 12:42:04', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(382, '2020-06-20 02:08:43', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(383, '2020-06-20 02:58:57', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(384, '2020-06-20 02:59:08', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(385, '2020-06-20 03:00:16', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(386, '2020-06-20 03:00:24', 'Luqyan04@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(387, '2020-06-20 03:00:35', 'Luqyan04@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(388, '2020-06-20 03:01:02', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(389, '2020-06-20 03:01:14', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(390, '2020-06-20 10:08:42', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(391, '2020-06-20 10:21:02', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(392, '2020-06-20 10:21:09', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(393, '2020-06-20 10:22:15', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(394, '2020-06-20 10:22:31', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(395, '2020-06-20 10:49:43', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(396, '2020-06-20 10:49:51', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(397, '2020-06-20 10:49:54', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(398, '2020-06-20 10:50:00', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(399, '2020-06-20 10:51:01', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(400, '2020-06-20 10:51:07', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(401, '2020-06-20 10:55:35', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(402, '2020-06-20 10:55:47', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(403, '2020-06-20 11:00:18', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(404, '2020-06-20 11:00:27', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(405, '2020-06-20 11:01:02', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(406, '2020-06-20 11:01:12', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(407, '2020-06-20 11:03:35', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(408, '2020-06-20 11:03:41', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(409, '2020-06-20 11:05:43', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(410, '2020-06-20 11:05:49', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(411, '2020-06-20 11:07:12', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(412, '2020-06-20 11:07:18', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(413, '2020-06-20 11:08:00', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(414, '2020-06-20 11:08:15', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(415, '2020-06-20 12:36:30', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(416, '2020-06-20 12:36:36', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(417, '2020-06-20 12:37:02', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(418, '2020-06-20 12:37:10', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(419, '2020-06-20 12:45:38', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(420, '2020-06-20 12:45:45', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(421, '2020-06-20 12:53:35', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(422, '2020-06-20 12:53:42', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(423, '2020-06-20 12:55:04', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(424, '2020-06-20 13:01:15', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(425, '2020-06-20 13:01:39', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(426, '2020-06-20 13:01:47', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(427, '2020-06-20 13:04:26', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(428, '2020-06-20 13:04:32', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(429, '2020-06-20 13:28:59', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(430, '2020-06-20 13:29:07', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(431, '2020-06-20 13:29:16', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(432, '2020-06-20 13:29:23', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(433, '2020-06-20 13:30:47', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(434, '2020-06-20 13:31:00', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(435, '2020-06-20 13:33:18', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(436, '2020-06-20 13:33:34', 'Amano04@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(437, '2020-06-20 13:33:59', 'Amano04@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(438, '2020-06-20 13:35:33', 'Luqyan04@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(439, '2020-06-20 13:36:25', 'Luqyan04@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(440, '2020-06-20 13:36:31', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(441, '2020-06-20 13:37:27', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(442, '2020-06-20 13:37:45', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(443, '2020-06-20 13:39:22', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(444, '2020-06-20 13:39:30', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(445, '2020-06-20 13:39:41', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(446, '2020-06-20 13:39:48', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(447, '2020-06-20 13:40:57', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(448, '2020-06-20 13:41:03', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(449, '2020-06-20 14:09:05', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(450, '2020-06-20 14:09:27', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(451, '2020-06-20 14:09:53', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(452, '2020-06-20 14:10:10', 'Luqyan04@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(453, '2020-06-20 14:42:07', 'Luqyan04@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(454, '2020-06-20 14:42:14', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(455, '2020-06-20 15:48:05', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(456, '2020-06-20 15:53:43', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(457, '2020-06-20 17:37:12', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(458, '2020-06-20 17:37:49', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(459, '2020-06-20 17:37:53', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(460, '2020-06-20 17:37:59', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(461, '2020-06-20 22:59:09', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(462, '2020-06-20 23:43:14', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(463, '2020-06-20 23:45:54', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(464, '2020-06-20 23:54:29', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(465, '2020-06-20 23:54:35', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(466, '2020-06-21 00:00:26', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(467, '2020-06-21 00:00:35', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(468, '2020-06-21 00:02:31', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(469, '2020-06-21 00:02:36', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(470, '2020-06-21 00:03:13', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(471, '2020-06-21 00:03:20', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(472, '2020-06-21 00:10:25', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(473, '2020-06-21 00:10:33', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(474, '2020-06-21 00:15:15', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(475, '2020-06-21 00:15:22', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(476, '2020-06-21 00:18:44', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(477, '2020-06-21 00:18:53', 'Luqyan04@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(478, '2020-06-21 00:19:04', 'Luqyan04@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(479, '2020-06-21 00:25:39', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(480, '2020-06-21 00:33:08', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(481, '2020-06-21 00:34:31', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(482, '2020-06-21 00:34:42', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(483, '2020-06-21 00:36:01', 'Luqyan04@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(484, '2020-06-21 00:37:55', 'Luqyan04@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(485, '2020-06-21 00:41:33', 'nanda201@gmail.com', 'login', 4, 'Login', 'pengguna'),
(486, '2020-06-21 00:42:53', 'nanda201@gmail.com', 'logout', 4, 'Logout', 'pengguna'),
(487, '2020-06-21 00:43:00', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(488, '2020-06-21 00:43:31', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(489, '2020-06-21 00:43:44', 'nanda201@gmail.com', 'login', 4, 'Login', 'pengguna'),
(490, '2020-06-21 00:44:27', 'nanda201@gmail.com', 'logout', 4, 'Logout', 'pengguna'),
(491, '2020-06-21 00:44:33', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(492, '2020-06-21 00:44:45', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(493, '2020-06-21 00:44:53', 'nanda201@gmail.com', 'login', 4, 'Login', 'pengguna'),
(494, '2020-06-21 00:56:13', 'nanda201@gmail.com', 'logout', 4, 'Logout', 'pengguna'),
(495, '2020-06-21 00:56:18', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(496, '2020-06-21 00:59:49', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(497, '2020-06-21 01:00:07', 'syahira29@gmail.com', 'login', 5, 'Login', 'pengguna'),
(498, '2020-06-21 01:00:47', 'syahira29@gmail.com', 'logout', 5, 'Logout', 'pengguna'),
(499, '2020-06-21 01:01:34', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(500, '2020-06-21 01:02:15', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(501, '2020-06-21 01:02:34', 'ekomh020@gmail.com', 'login', 6, 'Login', 'pengguna'),
(502, '2020-06-21 01:07:00', 'ekomh020@gmail.com', 'logout', 6, 'Logout', 'pengguna'),
(503, '2020-06-21 01:07:12', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(504, '2020-06-21 02:04:07', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(505, '2020-06-21 02:04:14', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(506, '2020-06-21 02:09:12', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(507, '2020-06-21 02:10:42', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(508, '2020-06-21 02:40:58', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(509, '2020-06-21 02:41:08', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(510, '2020-06-21 13:04:12', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(511, '2020-06-21 14:38:01', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(512, '2020-06-21 14:38:08', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(513, '2020-06-21 15:04:02', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(514, '2020-06-21 15:04:12', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(515, '2020-06-21 15:04:51', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(516, '2020-06-21 15:05:05', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(517, '2020-06-21 15:05:33', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(518, '2020-06-21 15:05:48', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(519, '2020-06-21 15:05:58', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(520, '2020-06-21 15:06:19', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(521, '2020-06-21 15:06:24', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(522, '2020-06-21 15:06:50', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(523, '2020-06-22 04:06:07', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(524, '2020-06-28 04:47:51', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(525, '2020-06-28 05:04:15', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(526, '2020-06-28 05:07:48', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(527, '2020-06-28 05:41:45', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(528, '2020-06-28 05:41:51', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(529, '2020-06-28 05:42:46', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(530, '2020-06-29 09:10:07', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(531, '2020-06-29 09:10:27', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(532, '2020-06-29 09:10:34', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(533, '2020-06-29 09:10:38', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(534, '2020-06-30 06:03:03', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(535, '2020-06-30 06:15:51', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(536, '2020-06-30 06:31:16', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(537, '2020-06-30 07:10:30', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(538, '2020-06-30 07:12:11', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(539, '2020-06-30 07:43:09', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(540, '2020-06-30 07:43:21', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(541, '2020-06-30 07:43:24', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(542, '2020-06-30 07:43:55', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(543, '2020-06-30 07:43:58', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(544, '2020-06-30 07:44:23', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(545, '2020-06-30 07:45:56', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(546, '2020-06-30 07:46:03', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(547, '2020-06-30 09:48:01', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(548, '2020-06-30 09:48:13', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(549, '2020-06-30 09:48:29', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(550, '2020-06-30 09:49:12', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(551, '2020-06-30 09:50:13', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(552, '2020-06-30 09:50:20', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(553, '2020-06-30 09:56:22', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(554, '2020-06-30 09:56:29', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(555, '2020-06-30 09:57:31', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(556, '2020-06-30 09:57:37', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(557, '2020-06-30 10:02:31', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(558, '2020-06-30 10:02:37', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(559, '2020-06-30 10:10:04', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(560, '2020-06-30 10:10:10', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(561, '2020-06-30 10:10:17', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(562, '2020-06-30 10:10:22', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(563, '2020-06-30 10:10:25', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(564, '2020-06-30 10:13:18', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(565, '2020-06-30 10:15:55', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(566, '2020-06-30 10:16:06', 'Luqyan04@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(567, '2020-06-30 10:16:10', 'Luqyan04@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(568, '2020-06-30 10:16:33', 'Luqyan04@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(569, '2020-06-30 10:17:48', 'Luqyan04@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(570, '2020-06-30 10:17:54', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(571, '2020-06-30 10:18:08', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(572, '2020-06-30 10:18:35', 'KAMU09@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(573, '2020-06-30 10:21:30', 'KAMU09@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(574, '2020-06-30 10:21:39', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(575, '2020-06-30 10:21:45', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(576, '2020-06-30 10:21:53', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(577, '2020-06-30 10:50:41', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(578, '2020-06-30 10:50:52', 'KAMU09@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(579, '2020-06-30 10:54:43', 'KAMU09@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(580, '2020-06-30 10:55:02', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(581, '2020-06-30 10:55:30', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(582, '2020-06-30 10:55:36', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(583, '2020-06-30 10:57:40', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(584, '2020-06-30 10:57:47', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(585, '2020-06-30 10:58:05', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(586, '2020-06-30 10:58:11', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(587, '2020-06-30 10:58:13', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(588, '2020-06-30 10:58:24', 'KAMU09@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(589, '2020-06-30 10:58:56', 'KAMU09@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(590, '2020-06-30 10:59:01', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(591, '2020-06-30 11:19:23', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna');
INSERT INTO `tb_log_login` (`id_log`, `log_time`, `log_user`, `log_tipe`, `log_role`, `log_desc`, `log_status`) VALUES
(592, '2020-06-30 11:19:30', 'Cahaya03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(593, '2020-06-30 11:20:52', 'Cahaya03@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(594, '2020-06-30 11:20:59', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(595, '2020-06-30 11:22:19', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(596, '2020-06-30 11:23:32', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(597, '2020-06-30 11:23:40', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(598, '2020-06-30 13:12:45', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(599, '2020-06-30 14:15:12', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(600, '2020-06-30 14:15:18', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(601, '2020-06-30 14:17:23', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(602, '2020-06-30 14:17:28', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(603, '2020-06-30 14:18:04', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(604, '2020-06-30 14:18:10', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(605, '2020-06-30 14:21:19', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(606, '2020-06-30 14:21:26', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(607, '2020-06-30 14:24:46', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(608, '2020-06-30 14:25:05', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(609, '2020-06-30 14:25:16', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(610, '2020-06-30 14:26:30', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(611, '2020-06-30 14:27:41', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(612, '2020-06-30 14:27:46', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(613, '2020-06-30 14:28:34', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(614, '2020-06-30 14:28:39', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(615, '2020-06-30 15:09:27', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(616, '2020-07-01 14:52:38', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(617, '2020-07-01 15:11:20', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(618, '2020-07-13 13:56:42', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(619, '2020-07-13 14:07:23', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(620, '2020-07-13 14:07:35', 'Amano04@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(621, '2020-07-13 14:11:27', 'Amano04@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(622, '2020-07-13 14:11:33', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(623, '2020-07-13 14:27:10', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(624, '2020-07-13 14:27:36', 'reza12@gmail.com', 'login', 2, 'Login', 'pengguna'),
(625, '2020-07-13 14:27:52', 'reza12@gmail.com', 'logout', 2, 'Logout', 'pengguna'),
(626, '2020-07-13 14:28:57', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(627, '2020-07-13 14:29:18', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(628, '2020-07-13 14:30:27', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(629, '2020-07-13 14:30:31', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(630, '2020-07-13 14:34:25', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(631, '2020-07-13 14:34:34', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(632, '2020-07-13 14:34:56', 'Bayu011@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(633, '2020-07-13 14:36:12', 'Bayu011@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(634, '2020-07-13 14:36:18', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(635, '2020-07-13 14:36:20', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(636, '2020-07-13 14:36:41', 'Bayu011@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(637, '2020-07-13 14:37:47', 'Bayu011@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(638, '2020-07-13 14:38:42', 'Bayu011@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(639, '2020-07-13 14:39:18', 'Bayu011@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(640, '2020-07-13 14:39:37', 'Bayu011@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(641, '2020-07-13 15:00:49', 'Bayu011@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(642, '2020-07-13 15:01:06', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(643, '2020-07-13 15:01:09', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(644, '2020-07-13 15:01:30', 'Bayu011@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(645, '2020-07-13 15:05:12', 'Bayu011@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(646, '2020-07-13 15:05:54', 'Bayu011@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(647, '2020-07-14 06:03:56', 'Bayu011@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(648, '2020-07-14 06:05:47', 'Bayu011@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(649, '2020-07-14 06:06:05', 'Bayu011@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(650, '2020-07-14 06:08:09', 'Bayu011@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(651, '2020-07-14 06:08:23', 'Bayu011@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(652, '2020-07-14 06:09:23', 'Bayu011@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(653, '2020-07-14 06:09:29', 'Bayu011@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(654, '2020-07-14 06:10:06', 'Bayu011@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(655, '2020-07-14 06:22:58', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(656, '2020-07-14 06:25:09', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(657, '2020-07-14 06:28:02', 'coba1012@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(658, '2020-07-14 06:28:40', 'coba1012@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(659, '2020-07-14 06:29:15', 'coba1012@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(660, '2020-07-14 06:29:19', 'coba1012@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(661, '2020-07-14 06:34:22', 'coba1012@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(662, '2020-07-14 06:34:57', 'coba1012@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(663, '2020-07-14 06:39:35', 'coba1012@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(664, '2020-07-14 06:39:43', 'coba1012@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(665, '2020-07-14 06:41:52', 'coba1012@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(666, '2020-07-14 06:48:33', 'coba1012@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(667, '2020-07-14 06:49:17', 'coba1012@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(668, '2020-07-14 06:49:24', 'coba1012@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(669, '2020-07-14 06:53:14', 'coba1012@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(670, '2020-07-14 06:53:21', 'coba1012@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(671, '2020-07-14 07:02:38', 'coba1012@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(672, '2020-07-14 07:02:44', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(673, '2020-07-14 07:05:38', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(674, '2020-07-14 07:07:03', 'coba1012@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(675, '2020-07-14 07:07:06', 'coba1012@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(676, '2020-07-14 07:08:38', 'coba1012@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(677, '2020-07-14 07:09:32', 'coba1012@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(678, '2020-07-14 07:09:38', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(679, '2020-07-14 07:09:50', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(680, '2020-07-14 07:10:14', 'Test013@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(681, '2020-07-14 07:10:58', 'Test013@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(682, '2020-07-14 07:53:17', 'Test013@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(683, '2020-07-14 07:54:48', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(684, '2020-07-14 16:11:42', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(685, '2020-07-14 17:39:46', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(686, '2020-07-18 07:41:46', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(687, '2020-07-18 07:47:28', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(688, '2020-07-18 07:47:34', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(689, '2020-07-18 07:47:37', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(690, '2020-07-18 07:51:08', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(691, '2020-07-18 07:51:13', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(692, '2020-07-18 07:56:36', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(693, '2020-07-18 07:56:39', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(694, '2020-07-18 07:57:24', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(695, '2020-07-18 07:57:28', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(696, '2020-07-18 07:59:49', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(697, '2020-07-18 07:59:53', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(698, '2020-07-18 08:01:58', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(699, '2020-07-18 08:02:01', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(700, '2020-07-18 08:03:19', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(701, '2020-07-18 08:03:29', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(702, '2020-07-18 08:06:40', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(703, '2020-07-18 08:06:44', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(704, '2020-07-18 08:08:17', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(705, '2020-07-18 08:08:20', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(706, '2020-07-18 08:10:40', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(707, '2020-07-18 08:10:43', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(708, '2020-07-18 12:35:49', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(709, '2020-07-18 12:36:56', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(710, '2020-07-18 12:37:02', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(711, '2020-07-18 12:37:20', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(712, '2020-07-18 12:37:48', 'Luqyan04@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(713, '2020-07-18 12:38:23', 'Luqyan04@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(714, '2020-07-18 12:38:29', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(715, '2020-07-18 12:38:43', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(716, '2020-07-18 12:38:50', 'Luqyan04@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(717, '2020-07-18 12:39:45', 'Luqyan04@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(718, '2020-07-18 12:39:54', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(719, '2020-07-19 14:36:36', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(720, '2020-07-19 14:38:48', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(721, '2020-07-19 14:39:51', 'Dosen02@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(722, '2020-07-19 14:44:54', 'Fahmi03@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(723, '2020-07-19 14:48:26', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(724, '2020-07-19 14:49:16', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(725, '2020-07-19 14:49:39', 'Akbar04@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(726, '2020-07-19 14:50:59', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(727, '2020-07-19 14:54:15', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(728, '2020-07-19 14:54:28', 'Dosen02@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(729, '2020-07-19 15:34:23', 'Dosen02@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(730, '2020-07-19 15:34:30', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(731, '2020-07-19 15:35:18', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(732, '2020-07-19 15:35:38', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(733, '2020-07-19 15:35:46', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(734, '2020-07-19 15:36:04', 'MbaDsn07@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(735, '2020-07-19 15:36:29', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(736, '2020-07-19 15:36:51', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(737, '2020-07-19 15:37:03', 'MbaDsn07@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(738, '2020-07-19 23:58:20', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(739, '2020-07-20 00:02:18', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(740, '2020-07-20 00:02:29', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(741, '2020-07-20 00:02:42', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(742, '2020-07-20 00:02:48', 'Dosen02@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(743, '2020-07-20 00:53:58', 'Dosen02@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(744, '2020-07-20 00:56:20', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(745, '2020-07-20 13:43:48', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(746, '2020-07-24 08:43:02', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(747, '2020-07-24 08:44:16', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(748, '2020-07-24 08:44:22', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(749, '2020-07-24 08:52:04', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(750, '2020-07-24 08:52:11', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(751, '2020-07-24 08:52:38', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(752, '2020-07-24 14:28:48', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(753, '2020-07-24 15:23:38', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(754, '2020-07-24 15:24:02', 'Kak08@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(755, '2020-07-24 15:24:17', 'Kak08@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(756, '2020-07-24 16:08:34', 'Kak08@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(757, '2020-07-24 16:08:41', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(758, '2020-07-25 02:31:24', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(759, '2020-07-25 07:44:57', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(760, '2020-07-25 08:20:12', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(761, '2020-07-25 08:21:18', 'Dosen02@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(762, '2020-07-25 13:51:55', 'Dosen02@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(763, '2020-07-25 13:52:48', 'Dosen02@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(764, '2020-07-26 13:44:57', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(765, '2020-07-26 13:57:23', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(766, '2020-07-26 14:16:59', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(767, '2020-07-26 14:23:23', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(768, '2020-07-26 14:23:54', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(769, '2020-07-26 14:23:57', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(770, '2020-07-26 14:29:12', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(771, '2020-07-26 14:29:14', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(772, '2020-07-26 14:30:09', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(773, '2020-07-26 14:30:39', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(774, '2020-07-26 14:31:17', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(775, '2020-07-26 14:31:20', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(776, '2020-07-26 14:31:29', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(777, '2020-07-26 14:31:32', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(778, '2020-07-26 14:31:42', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(779, '2020-07-26 14:33:30', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(780, '2020-07-26 14:41:00', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(781, '2020-07-26 14:41:07', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(782, '2020-07-26 15:26:43', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(783, '2020-07-26 15:28:18', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(784, '2020-07-26 15:28:47', 'Dosen02@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(785, '2020-07-26 15:32:09', 'Dosen02@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(786, '2020-07-26 15:32:35', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(787, '2020-07-26 15:32:50', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(788, '2020-07-26 15:32:56', 'Akbar04@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(789, '2020-07-26 15:34:15', 'Akbar04@tazkia.ac.id', 'logout', 2, 'Logout', 'pengguna'),
(790, '2020-07-26 15:34:20', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(791, '2020-07-26 15:35:24', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(792, '2020-07-26 15:35:30', 'Rakuca12@gmail.com', 'login', 4, 'Login', 'pengguna'),
(793, '2020-07-26 15:36:28', 'Rakuca12@gmail.com', 'logout', 4, 'Logout', 'pengguna'),
(794, '2020-07-26 15:36:35', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(795, '2020-07-26 15:36:41', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(796, '2020-07-26 15:42:27', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(797, '2020-07-26 15:43:44', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(798, '2020-07-26 15:43:54', 'andrew@gmail.com', 'login', 6, 'Login', 'pengguna'),
(799, '2020-07-26 15:50:43', 'andrew@gmail.com', 'logout', 6, 'Logout', 'pengguna'),
(800, '2020-07-26 16:00:16', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(801, '2020-07-26 16:03:14', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(802, '2020-07-26 16:04:07', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(803, '2020-07-26 16:11:16', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(804, '2020-07-26 16:15:43', 'Dosen02@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(805, '2020-07-26 16:20:02', 'Dosen02@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(806, '2020-07-26 16:20:42', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(807, '2020-07-26 16:29:26', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(808, '2020-07-28 02:54:38', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(809, '2020-07-28 02:55:04', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(810, '2020-07-28 02:55:44', 'Dosen02@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(811, '2020-07-28 03:19:22', 'Dosen02@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(812, '2020-07-28 03:19:42', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(813, '2020-07-28 03:19:47', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(814, '2020-07-28 03:22:07', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(815, '2020-07-28 03:24:06', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(816, '2020-07-28 03:24:13', 'Dosen02@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(817, '2020-07-28 03:26:22', 'Dosen02@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(818, '2020-07-28 03:26:57', 'Rakuca12@gmail.com', 'login', 4, 'Login', 'pengguna'),
(819, '2020-07-28 03:27:19', 'Rakuca12@gmail.com', 'logout', 4, 'Logout', 'pengguna'),
(820, '2020-07-28 03:27:29', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(821, '2020-07-28 03:28:21', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(822, '2020-07-28 03:28:36', 'Dosen02@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(823, '2020-07-28 03:28:57', 'Dosen02@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(824, '2020-07-28 03:29:14', 'Dosen02@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(825, '2020-07-28 03:29:32', 'Dosen02@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(826, '2020-07-28 03:29:43', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(827, '2020-07-28 03:38:17', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(828, '2020-07-28 07:24:34', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(829, '2020-07-30 13:54:22', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(830, '2020-07-30 14:01:42', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(831, '2020-08-03 00:10:42', 'Rakuca12@gmail.com', 'login', 4, 'Login', 'pengguna'),
(832, '2020-08-04 07:45:29', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(833, '2020-08-04 07:46:12', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(834, '2020-08-04 07:46:29', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(835, '2020-08-04 07:46:33', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(836, '2020-08-04 07:46:59', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(837, '2020-08-04 07:47:03', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(838, '2020-08-04 07:48:05', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(839, '2020-08-04 07:48:09', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(840, '2020-08-04 07:50:21', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(841, '2020-08-04 07:50:25', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(842, '2020-08-04 07:51:13', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(843, '2020-08-04 07:51:16', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(844, '2020-08-04 07:52:06', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(845, '2020-08-04 07:52:10', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(846, '2020-08-04 07:53:44', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(847, '2020-08-04 07:53:47', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(848, '2020-08-09 05:24:53', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(849, '2020-08-09 05:25:16', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(850, '2020-08-09 05:57:20', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(851, '2020-08-09 05:58:30', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(852, '2020-08-09 06:06:06', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(853, '2020-08-09 06:14:46', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(854, '2020-08-09 06:14:48', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(855, '2020-08-09 06:19:45', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(856, '2020-08-09 06:19:48', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(857, '2020-08-09 06:21:29', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(858, '2020-08-09 06:21:32', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(859, '2020-08-09 06:22:51', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(860, '2020-08-09 06:22:55', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(861, '2020-08-09 06:32:58', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(862, '2020-08-09 07:40:32', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(863, '2020-08-09 07:42:29', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(864, '2020-08-09 07:42:32', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(865, '2020-08-09 07:43:48', 'Dosen02@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(866, '2020-08-09 07:45:11', 'Dosen02@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(867, '2020-08-09 07:46:59', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(868, '2020-08-09 07:47:02', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(869, '2020-08-09 07:47:18', 'Dosen02@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(870, '2020-08-09 07:53:02', 'Dosen02@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(871, '2020-08-09 07:53:08', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(872, '2020-08-09 10:12:32', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(873, '2020-08-09 10:13:21', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(874, '2020-08-09 10:38:35', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(875, '2020-08-09 10:38:44', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(876, '2020-08-09 10:38:51', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(877, '2020-08-09 10:49:10', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(878, '2020-08-09 10:55:43', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(879, '2020-08-09 10:57:15', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(880, '2020-08-09 23:27:11', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(881, '2020-08-09 23:30:01', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(882, '2020-08-10 00:08:41', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(883, '2020-08-10 00:12:23', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(884, '2020-08-10 00:12:32', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(885, '2020-08-10 00:18:48', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(886, '2020-08-11 04:38:40', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(887, '2020-08-11 04:38:48', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(888, '2020-08-11 04:41:47', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(889, '2020-08-23 12:31:23', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(890, '2020-08-23 12:31:51', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(891, '2020-08-23 12:50:10', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(892, '2020-08-30 06:23:14', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(893, '2020-08-30 06:23:39', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(894, '2020-08-30 06:25:30', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(895, '2020-08-30 09:17:00', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(896, '2020-08-31 17:41:19', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(897, '2020-09-01 10:19:59', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(898, '2020-09-02 14:55:09', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(899, '2020-09-03 05:10:01', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(900, '2020-09-09 13:41:58', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(901, '2020-09-09 13:45:36', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(902, '2020-09-09 13:45:54', 'Fahmi012@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(903, '2020-09-09 13:46:37', 'Fahmi012@tazkia.ac.id', 'login', 2, 'Login', 'pengguna'),
(904, '2020-09-20 15:09:01', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(905, '2020-09-21 14:41:21', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(906, '2020-09-21 17:15:35', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(907, '2020-09-21 17:15:42', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(908, '2020-09-21 17:23:11', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(909, '2020-09-21 17:23:17', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(910, '2020-09-22 16:16:31', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(911, '2020-09-22 16:17:38', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(912, '2020-09-22 16:17:49', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(913, '2020-09-22 16:32:38', 'ekomh13@gmail.com', 'logout', 1, 'Logout', 'pengguna'),
(914, '2020-09-22 16:32:44', 'Dosen02@dosentazkia.ac.id', 'login', 3, 'Login', 'pengguna'),
(915, '2020-09-22 16:33:05', 'Dosen02@dosentazkia.ac.id', 'logout', 3, 'Logout', 'pengguna'),
(916, '2020-09-22 16:33:19', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(917, '2020-09-25 16:37:17', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(918, '2020-09-26 15:01:39', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(919, '2020-09-29 15:19:01', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna'),
(920, '2020-10-02 09:06:26', 'ekomh13@gmail.com', 'login', 1, 'Login', 'pengguna');

-- --------------------------------------------------------

--
-- Table structure for table `tb_matkul`
--

CREATE TABLE `tb_matkul` (
  `id_matkul` varchar(128) NOT NULL,
  `nama_matkul` varchar(255) NOT NULL,
  `status` varchar(128) NOT NULL,
  `id_jurusan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_matkul`
--

INSERT INTO `tb_matkul` (`id_matkul`, `nama_matkul`, `status`, `id_jurusan`) VALUES
('MK-01-14', 'Lempar Lari', 'Aktif', 'JR-01-17'),
('MK-02-08', 'Coba Coba', 'Aktif', 'JR-02-42'),
('MK-03-19', 'Belom', 'Aktif', 'JR-03-09'),
('MK-04-29', 'Testing', 'Aktif', 'JR-03-09'),
('MK-05-37', 'Belom', 'Aktif', 'JR-01-17'),
('MK-06-56', 'Belom', 'Aktif', 'JR-04-51'),
('MK-07-09', 'Belom', 'Aktif', 'JR-01-17'),
('MK-08-41', 'Belum', 'Aktif', 'JR-08-07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
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
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `nim_mhs`, `nilai_presensi`, `nilai_tugas`, `nilai_uts`, `nilai_uas`, `total_nilai`, `nilai_akhir`, `grade`, `status`, `id_krs`) VALUES
('NLI-108', '101907201', 0, 0, 0, 0, 0, 0, '', 'Aktif', 'KRS-115'),
('NLI-215', '101907202', 100, 100, 100, 100, 400, 10, 'A', 'Aktif', 'KRS-335'),
('NLI-342', '102407204', 0, 0, 0, 0, 0, 0, '', 'Aktif', 'KRS-736'),
('NLI-459', '102407203', 100, 10, 10, 10, 130, 3, 'E', 'Aktif', 'KRS-803');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruangan`
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
-- Dumping data for table `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`id_ruangan`, `nama_ruangan`, `lantai`, `kapasitas`, `keterangan`, `status`, `id_jenis_ruangan`) VALUES
('RGN-120', 'Ruang Kesehatan', '1', '10', 'Ruang Kesehatan Adalah Ruangan :v', 'Aktif', '05'),
('RGN-207', 'Ruang Kelas 01 ', '1', '30', 'Ruang Kelas adalah Tempat Untuk Belajar', 'Aktif', '01'),
('RGN-313', 'Ruang Kelas 012', '1', '30', 'Ruang Kelas', 'Aktif', '01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruangan_jenis`
--

CREATE TABLE `tb_ruangan_jenis` (
  `id_jenis_ruangan` varchar(36) NOT NULL,
  `nama_jr` varchar(255) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ruangan_jenis`
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
-- Table structure for table `tb_tahun_akademik`
--

CREATE TABLE `tb_tahun_akademik` (
  `id_tahun_akademik` varchar(25) NOT NULL,
  `nama_tahun_akademik` varchar(128) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tahun_akademik`
--

INSERT INTO `tb_tahun_akademik` (`id_tahun_akademik`, `nama_tahun_akademik`, `status`) VALUES
('TA-152', '2017/2018', 'Tidak Aktif'),
('TA-218', '2018/2019', 'Aktif'),
('TA-355', '2016/2017', 'Aktif'),
('TA-425', '2018/2019', 'Aktif'),
('TA-655', 'Coba', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transkrip_nilai`
--

CREATE TABLE `tb_transkrip_nilai` (
  `id_transkrip_nilai` varchar(50) NOT NULL,
  `nim_mhs` varchar(128) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transkrip_nilai`
--

INSERT INTO `tb_transkrip_nilai` (`id_transkrip_nilai`, `nim_mhs`, `status`) VALUES
('TN-115', '101907201', 'Aktif'),
('TN-222', '101907202', 'Aktif'),
('TN-410', '102407203', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `nama_panggilan`, `email`, `image`, `password`, `password_asli`, `id_role`, `status`, `data_created`) VALUES
(56, 'Eko Muchamad Haryono', 'Aryo-Kun', 'ekomh13@gmail.com', 'Eko_Muchamad_Haryono-30-06-20.PNG', '$2y$10$FukafusDZLqd.qbG3vBFrOKwNT2cWPtrcT2re40saFkXyj4dxe/g.', '$2y$10$FukafusDZLqd.qbG3vBFrOKwNT2cWPtrcT2re40saFkXyj4dxe/g.', 1, 'Aktif', '2019-12-26 13:54:37'),
(57, 'Pak Dosen', 'Dosen Ganteng', 'Dosen02@dosentazkia.ac.id', 'Pak_Dosen-25-07-20.jpg', '$2y$10$jBxbzIomowNf/ctc58faOe8/FUORJlq7ENi514bGhQ4pj8ci/UaY.', '$2y$10$jBxbzIomowNf/ctc58faOe8/FUORJlq7ENi514bGhQ4pj8ci/UaY.', 3, 'Aktif', '2020-07-19 21:38:29'),
(58, 'Fahmi Idris', 'Fahmi', 'Fahmi03@tazkia.ac.id', 'Fahmi_Idris-19-07-20.PNG', '$2y$10$IhFoFnCVUw2goYChloW4luiZoMh5S.8w4q87knzew.e9./SNse3A2', '$2y$10$IhFoFnCVUw2goYChloW4luiZoMh5S.8w4q87knzew.e9./SNse3A2', 2, 'Aktif', '2020-07-19 21:38:38'),
(59, 'Muhammad Akbar Maulana ', 'Akbar', 'Akbar04@tazkia.ac.id', 'Muhammad_Akbar_Maulana-26-07-20.jpg', '$2y$10$2hNU5rmzWh3dmS52CCwkneYwqaijjnSztj3aiubFFtc8QYorAB/ZO', '$2y$10$2hNU5rmzWh3dmS52CCwkneYwqaijjnSztj3aiubFFtc8QYorAB/ZO', 2, 'Aktif', '2020-07-19 21:49:13'),
(60, 'Rara-Chan', 'Ra', 'Rakuca12@gmail.com', 'index.png', '$2y$10$C7hVNAfUkW00GxDwpNeOre8/43OXP4pCIUm8Y5ln5InMoSMvphEyC', '$2y$10$CWSEWOJ3TpXogLPX75kaeODnkHDNCy088iSK36Dr2qNR.3WOuGb3K', 4, 'Aktif', '2020-07-19 21:51:47'),
(61, 'Nirmala-Chan', 'Nir', 'Nir0@gmail.com', 'index.png', '$2y$10$u0lLBpCOhTcYsB7rxmjTGOHKdUNJAYV13GKj0hEKZNoD9.68dshcu', '$2y$10$e.m0uXw0.9k/vxIyDL7BqOJawmSRjlmsPnmHwbora0Ab3dP3Mh3ZG', 6, 'Aktif', '2020-07-19 21:52:42'),
(62, 'Mba Dosen', 'Mba Dsn', 'MbaDsn07@dosentazkia.ac.id', 'Mba_Dosen-25-07-20.jpg', '$2y$10$CGoTbl/bhOeh4ui3xmfVAuCBGgY6qrC6HcjQZ9QLwkRSHFBZdW/I2', '$2y$10$CGoTbl/bhOeh4ui3xmfVAuCBGgY6qrC6HcjQZ9QLwkRSHFBZdW/I2', 3, 'Aktif', '2020-07-19 22:35:43'),
(63, 'Kak Dosen', 'Kak', 'Kak08@dosentazkia.ac.id', 'Kak_Dosen-25-07-20.jpg', '$2y$10$2Jdsa9djkpv.78j1r.xmAefRyjbKX06IlaGjE/Yo2ne6ijF/lS8yK', '$2y$10$2Jdsa9djkpv.78j1r.xmAefRyjbKX06IlaGjE/Yo2ne6ijF/lS8yK', 3, 'Aktif', '2020-07-24 22:23:21'),
(64, 'Raina Nadya Zahra', 'Raina', 'Raina09@tazkia.ac.id', 'index.png', '$2y$10$vRpxGZ.vg/p5OAPgcvn0UOFjO32DwizCQKldp79Scdry5Q5q.1G2.', 'dEpYYnZYSW5FTHZ4M1lhaG1rSlZFUT09', 2, 'Aktif', '2020-07-25 15:00:41'),
(65, 'Andrew Hackor', 'Andrew', 'andrew@gmail.com', 'Andrew_Hackor-26-07-20.jpg', '$2y$10$PgM0wWQesAMCqKt0GmIWGOqAbpi0fT/FIRFITTZO5vMCOaRUxh786', '$2y$10$4tUsWP3ahjvyTBgbDmdIyOpBxYYSNCRZXu.3zadmJdH0gtdRv0IJO', 6, 'Aktif', '2020-07-26 22:43:25'),
(66, 'Eko Muchamad Haryono', 'Eko', 'Eko011@tazkia.ac.id', 'Eko_Muchamad_Haryono-25-07-20.jpg', '$2y$10$WoT2RmOG0cY.lLQWPeMda.f8.f1JwifGnlWnsZ01xSiyESlpLeIqq', 'dEpYYnZYSW5FTHZ4M1lhaG1rSlZFUT09', 2, 'Aktif', '2020-07-28 10:34:36'),
(67, 'Fahmi Idris', 'Fahmi', 'Fahmi012@tazkia.ac.id', 'Fahmi_Idris-09-09-20.jpg', '1234', '1234', 2, 'Tidak Aktif', '2020-09-09 20:43:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`, `keterangan`) VALUES
(1, 'Admin', 'untuk seluruh mengelola data dapat mengakses apapun termasuk menu yang di akses oleh Mahasiswa, Dosen, Operator Data Informasi, Operator Data Penilaian, admin juga dapat mengolah sistem informasi dan penilaian.'),
(2, 'Mahasiswa', 'sebagai penerima hasil data yang telah di olah Admin, Dosen, Operator Data Informasi, Operator Data Penilaian.'),
(3, 'Dosen', 'untuk memberi penilaian kepada mahasiswa, penilaian terdiri berupa Nilai Akhir, KRS, IPK, Transkrip Nilai.'),
(4, 'Operator Pendataan Informasi', 'untuk mengolah data informasi yang ada di aplikasi seperti data mahasiswa, data dosen, data fakultas, data jurusan, data tahun akademik, data mata kuliah, data kelas, data ruangan.'),
(5, 'Operator Penilaian', ''),
(6, 'Kepala Bagian (Kabag)', 'pemimpin dari kemahasiswaan adalah pimpinan dan setelah data diolah harus di serahkan/diperiksa oleh kabag kemahasiswaan.'),
(7, 'Belum Diset', 'adalah sebuah tanda bahwa user tidak memiliki kewenangan untuk mengakses halaman login'),
(8, 'COBA DATA', 'COBA TAMBAH DATA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `krs_detail`
--
ALTER TABLE `krs_detail`
  ADD PRIMARY KEY (`id_krs`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim_mhs`);

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `tb_ipk`
--
ALTER TABLE `tb_ipk`
  ADD PRIMARY KEY (`id_ipk`),
  ADD UNIQUE KEY `nim_mhs` (`nim_mhs`);

--
-- Indexes for table `tb_jenjang_pendidikan`
--
ALTER TABLE `tb_jenjang_pendidikan`
  ADD PRIMARY KEY (`id_jenjang_pendidikan`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `tb_log_login`
--
ALTER TABLE `tb_log_login`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `tb_ruangan_jenis`
--
ALTER TABLE `tb_ruangan_jenis`
  ADD PRIMARY KEY (`id_jenis_ruangan`);

--
-- Indexes for table `tb_tahun_akademik`
--
ALTER TABLE `tb_tahun_akademik`
  ADD PRIMARY KEY (`id_tahun_akademik`);

--
-- Indexes for table `tb_transkrip_nilai`
--
ALTER TABLE `tb_transkrip_nilai`
  ADD PRIMARY KEY (`id_transkrip_nilai`),
  ADD UNIQUE KEY `nim_mhs` (`nim_mhs`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jenjang_pendidikan`
--
ALTER TABLE `tb_jenjang_pendidikan`
  MODIFY `id_jenjang_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_log`
--
ALTER TABLE `tb_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;

--
-- AUTO_INCREMENT for table `tb_log_login`
--
ALTER TABLE `tb_log_login`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=921;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
