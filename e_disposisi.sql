-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2019 at 03:02 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_disposisi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_arsip`
--

CREATE TABLE `tbl_arsip` (
  `id_arsip` int(11) NOT NULL,
  `no_surat` varchar(500) NOT NULL,
  `kd_div` int(11) NOT NULL,
  `kd_jabatan` int(11) NOT NULL,
  `isi` text NOT NULL,
  `finished_by` varchar(200) NOT NULL,
  `created_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_disposisi`
--

CREATE TABLE `tbl_disposisi` (
  `id_disposisi` int(10) NOT NULL,
  `no_surat` varchar(255) NOT NULL,
  `kd_div` varchar(10) NOT NULL,
  `kd_jabatan` int(11) NOT NULL,
  `divisi` varchar(200) NOT NULL,
  `nama_sub` varchar(250) NOT NULL,
  `isi_disposisi` mediumtext NOT NULL,
  `cat1` mediumtext NOT NULL,
  `cat2` mediumtext NOT NULL,
  `sifat` varchar(100) NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `sts_read` int(11) NOT NULL,
  `sts_disposisi` int(11) NOT NULL,
  `sts_dokumen` int(11) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_divisi`
--

CREATE TABLE `tbl_divisi` (
  `id` int(11) NOT NULL,
  `kd_div` int(11) NOT NULL,
  `kd_jabatan` int(11) NOT NULL,
  `nama_div` varchar(255) NOT NULL,
  `nama_sub` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_divisi`
--

INSERT INTO `tbl_divisi` (`id`, `kd_div`, `kd_jabatan`, `nama_div`, `nama_sub`) VALUES
(1, 1, 2, 'Tata Usaha', 'Kabag Tata Usaha'),
(2, 2, 2, 'Infratruktur Pertanahan', 'Kabid Infrastruktur Pertanahan'),
(3, 3, 2, 'Hubungan Hukum Pertanahan', 'Kabid Hubungan Hukum Pertanahan'),
(4, 4, 2, 'Penataan Pertanahan', 'Kabid Penataan Pertanahan'),
(5, 5, 2, 'Pengadaan Tanah', 'Kabid Pengadaan Pertanahan'),
(6, 6, 2, 'Penangann Masalah dan Pengendalian Pertanahan', 'Kabid Penangann Masalah dan Pengendalian Pertanahan'),
(7, 1, 3, 'Tata Usaha', 'Subag Perencanaan, Evaluasi dan Pelaporan'),
(8, 1, 3, 'Tata Usaha', 'Subag Organisasi dan Kepegawaian'),
(9, 1, 3, 'Tata Usaha', 'Subag Keuangan dan BMN'),
(10, 1, 3, 'Tata Usaha', 'Subag Umum dan Informasi'),
(13, 2, 3, 'Infratruktur Pertanahan', 'Seksi Pengukuran dan Pemetaan Dasar'),
(14, 2, 3, 'Infratruktur Pertanahan', 'Seksi Pengukuran dan Pemetaan Kodastral'),
(15, 2, 3, 'Infratruktur Pertanahan', 'Seksi Survei dan Pemetaan Tematik'),
(16, 3, 3, 'Hubungan Hukum Pertanahan', 'Seksi 1 HHP'),
(17, 3, 3, 'Hubungan Hukum Pertanahan', 'Seksi 2 HHP'),
(18, 3, 3, 'Hubungan Hukum Pertanahan', 'Seksi 3 HHP'),
(19, 4, 3, 'Penataan Pertanahan', 'seksi 1 pp'),
(20, 4, 3, 'Penataan Pertanahan', 'seksi 2 PP'),
(21, 4, 3, 'Penataan Pertanahan', 'seksi 3 pp'),
(22, 5, 3, 'Pengadaan Tanah', 'seksi 1 pt'),
(23, 5, 3, 'Pengadaan Tanah', 'seksi 2 pt'),
(24, 5, 3, 'Pengadaan Tanah', 'seksi 3 pt'),
(25, 6, 3, 'Penangann Masalah dan Pengendalian Pertanahan', 'seksi 1 pmpp'),
(26, 6, 3, 'Penangann Masalah dan Pengendalian Pertanahan', 'seksi 2 pmpp'),
(27, 6, 3, 'Penangann Masalah dan Pengendalian Pertanahan', 'seksi 3 pmpp');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dokumen`
--

CREATE TABLE `tbl_dokumen` (
  `id_dok` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `lemrak` varchar(100) NOT NULL,
  `keterangan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_instansi`
--

CREATE TABLE `tbl_instansi` (
  `id_instansi` tinyint(1) NOT NULL,
  `institusi` varchar(150) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `kepsek` varchar(50) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `website` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `id_user` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_instansi`
--

INSERT INTO `tbl_instansi` (`id_instansi`, `institusi`, `nama`, `status`, `alamat`, `kepsek`, `nip`, `website`, `email`, `logo`, `id_user`) VALUES
(1, 'Dinas Pendidikan Pemuda Dan Olahraga', 'SMK MasRud.com', 'Terakreditasi A', 'Sawahan, Nganjuk, Jawa Timur', 'M. Rudianto', '-', 'https://masrud.com', 'rudi@masrud.com', 'logo.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_klasifikasi`
--

CREATE TABLE `tbl_klasifikasi` (
  `id_klasifikasi` int(5) NOT NULL,
  `kode` varchar(30) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `uraian` mediumtext NOT NULL,
  `id_user` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sett`
--

CREATE TABLE `tbl_sett` (
  `id_sett` int(11) NOT NULL,
  `kd_docno` varchar(10) NOT NULL,
  `docno` varchar(11) NOT NULL,
  `docname` varchar(100) NOT NULL,
  `bulan` varchar(11) NOT NULL,
  `tahun` varchar(11) NOT NULL,
  `Keterangan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sett`
--

INSERT INTO `tbl_sett` (`id_sett`, `kd_docno`, `docno`, `docname`, `bulan`, `tahun`, `Keterangan`) VALUES
(3, 'AG', '16', 'NOMOR AGENDA', '12', '2019', 'AGENDA +1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat_keluar`
--

CREATE TABLE `tbl_surat_keluar` (
  `id_surat` int(10) NOT NULL,
  `no_agenda` int(10) NOT NULL,
  `tujuan` varchar(250) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `isi` mediumtext NOT NULL,
  `kode` varchar(30) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_catat` date NOT NULL,
  `file` varchar(250) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `id_user` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat_masuk`
--

CREATE TABLE `tbl_surat_masuk` (
  `id_surat` int(10) NOT NULL,
  `no_agenda` int(10) NOT NULL,
  `no_surat` varchar(250) NOT NULL,
  `asal_surat` varchar(250) NOT NULL,
  `sifat` varchar(100) NOT NULL,
  `isi` mediumtext NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_terima` date NOT NULL,
  `file` varchar(250) NOT NULL,
  `sts_surat` int(11) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `kd_div` varchar(10) NOT NULL,
  `kd_jabatan` int(11) NOT NULL,
  `nama_sub` varchar(250) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(300) NOT NULL,
  `nama` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `kd_div`, `kd_jabatan`, `nama_sub`, `username`, `password`, `nama`) VALUES
(10, '1', 2, 'KEPALA BAGIAN TATA USAHA', 'KABAG_TU', '3ea420ac9d749c07c28d87c824366745', 'KEPALA BAGIAN TATA USAHA'),
(11, '2', 2, 'KEPALA BIDANG INFRASTRUKTUR PERTANAHAN', 'KABID_IP', '3ea420ac9d749c07c28d87c824366745', 'INFRASTRUKTUR'),
(12, '3', 2, 'KEPALA BIDANG HUBUNGAN HUKUM PERTANAHAN', 'KABID_HHP', '3ea420ac9d749c07c28d87c824366745', 'HUBUNGAN HUKUM'),
(13, '4', 2, 'KEPALA BIDANG PENATAAN PERTANAHAN', 'KABID_PENATAAN', '3ea420ac9d749c07c28d87c824366745', 'BIDANG PENATAAN'),
(14, '5', 2, 'KEPALA BIDANG PENGADAAN TANAH', 'KABID_PENGADAAN_TANAH', '3ea420ac9d749c07c28d87c824366745', 'PENGADAAN TANAH'),
(15, '6', 2, 'KEPALA BIDANG PENANGANAN MASALAH DAN PENGENDALIAN PERTANAHAN', 'KABID_SENGKETA', '3ea420ac9d749c07c28d87c824366745', 'PENANGANAN MASALAH DAN PENGENDALIAN PERTANAHAN'),
(16, '1', 3, 'KEPALA SUBBAGIAN PERENCANAAN, EVALUASI DAN PELAPORAN ', 'KASUBAG_PERENCANAAN', '3ea420ac9d749c07c28d87c824366745', 'SUBBAGIAN PERENCANAAN, EVALUASI DAN PELAPORAN'),
(17, '1', 3, 'KEPALA SUBBAGIAN ORGANISASI DAN KEPEGAWAIAN', 'KASUBAG_ORPEG', '3ea420ac9d749c07c28d87c824366745', 'SUBBAGIAN ORGANISASI DAN KEPEGAWAIAN'),
(18, '1', 3, 'KEPALA SUBBAGIAN KEUANGAN DAN BMN', 'KASUBAG_KEUANGAN', '3ea420ac9d749c07c28d87c824366745', 'SUBBAGIAN KEUANGAN DAN BMN'),
(19, '1', 3, 'KEPALA SUBBAGIAN UMUM DAN INFORMASI', 'KASUBAG_UMUM', '3ea420ac9d749c07c28d87c824366745', 'SUBBAGIAN UMUM DAN INFORMASI'),
(20, '0', 1, 'KEPALA KANTOR WILAYAH BADAN PERTANAHAN NASIONAL', 'KAKANWIL', '3ea420ac9d749c07c28d87c824366745', 'KAKANWIL BPN KALSEL'),
(21, '2', 3, 'KEPALA SEKSI PENGUKURAN DAN PEMETAAN DASAR', 'KASI_PPD', '3ea420ac9d749c07c28d87c824366745', 'SEKSI PENGUKURAN DAN PEMETAAN DASAR'),
(22, '2', 3, 'KEPALA SEKSI PENGUKURAN DAN PEMETAAN KADASTRAL', 'KASI_PPK', '3ea420ac9d749c07c28d87c824366745', 'SEKSI PENGUKURAN DAN PEMETAAN KADASTRAL'),
(23, '2', 3, 'KEPALA SEKSI SURVEI DAN PEMETAAN TEMATIK', 'KASI_SPT', '3ea420ac9d749c07c28d87c824366745', 'SEKSI SURVEI DAN PEMETAAN TEMATIK'),
(24, '3', 3, 'KEPALA SEKSI PENETAPAN HAK TANAH DAN PEMBERDAYAAN HAK TANAH MASYARAKAT', 'KASI_HTPT', '3ea420ac9d749c07c28d87c824366745', 'SEKSI PENETAPAN HAK TANAH DAN PEMBERDAYAAN HAK TANAH MASYARAKAT'),
(25, '3', 3, 'KEPALA SEKSI PENDAFTARAN HAK TANAH', 'KASI_PHT', '3ea420ac9d749c07c28d87c824366745', 'SEKSI PENDAFTARAN HAK TANAH'),
(26, '3', 3, 'KEPALA SEKSI PEMELIHARAAN DATA HAK TANAH DAN PEMBINAAN PPAT', 'KASI_PTPP', '3ea420ac9d749c07c28d87c824366745', 'SEKSI PEMELIHARAAN DATA HAK TANAH DAN PEMBINAAN PPAT'),
(27, '4', 3, 'KEPALA SEKSI PENATAGUNAAN TANAH', 'KASI_PENATAGUNAAN', '3ea420ac9d749c07c28d87c824366745', 'SEKSI PENATAGUNAAN TANAH'),
(28, '4', 3, 'KEPALA SEKSI LANDREFORM DAN KONSOLIDASI TANAH', 'KASI_KONSOLIDASI', '3ea420ac9d749c07c28d87c824366745', 'SEKSI LANDREFORM DAN KONSOLIDASI TANAH'),
(29, '4', 3, 'KEPALA SEKSI PENATAAN KAWASAN TERTENTU', 'KASI_PENATAAN_KAWASAN', '3ea420ac9d749c07c28d87c824366745', 'SEKSI PENATAAN KAWASAN TERTENTU'),
(30, '5', 3, 'KEPALA SEKSI PEMANFAATAN TANAH PEMERINTAH', 'KASI_PEMANFAATAN', '3ea420ac9d749c07c28d87c824366745', 'SEKSI PEMANFAATAN TANAH PEMERINTAH'),
(31, '5', 3, 'KEPALA SEKSI BINA PENGADAAN DAN PENETAPAN TANAH PEMERINTAH', 'KASI_PENGADAAN', '3ea420ac9d749c07c28d87c824366745', 'SEKSI BINA PENGADAAN DAN PENETAPAN TANAH PEMERINTAH'),
(32, '5', 3, 'KEPALA SEKSI PENILAIAN TANAH', 'KASI_PENILAIAN', '3ea420ac9d749c07c28d87c824366745', 'SEKSI PENILAIAN TANAH'),
(33, '6', 3, 'KEPALA SEKSI SENGKETA DAN KONFLIK PERTANAHAN', 'KASI_SENGKETA', '3ea420ac9d749c07c28d87c824366745', 'SEKSI SENGKETA DAN KONFLIK PERTANAHAN'),
(34, '6', 3, 'KEPALA SEKSI PENANGANAN PERKARA PERTANAHAN', 'KASI_PERKARA', '3ea420ac9d749c07c28d87c824366745', 'SEKSI PENANGANAN PERKARA PERTANAHAN'),
(35, '6', 3, 'KEPALA SEKSI PENGENDALIAN PERTANAHAN', 'KASI_PENGENDALIAN', '3ea420ac9d749c07c28d87c824366745', 'SEKSI PENGENDALIAN PERTANAHAN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_arsip`
--
ALTER TABLE `tbl_arsip`
  ADD PRIMARY KEY (`id_arsip`);

--
-- Indexes for table `tbl_disposisi`
--
ALTER TABLE `tbl_disposisi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `tbl_divisi`
--
ALTER TABLE `tbl_divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dokumen`
--
ALTER TABLE `tbl_dokumen`
  ADD PRIMARY KEY (`id_dok`);

--
-- Indexes for table `tbl_instansi`
--
ALTER TABLE `tbl_instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `tbl_klasifikasi`
--
ALTER TABLE `tbl_klasifikasi`
  ADD PRIMARY KEY (`id_klasifikasi`);

--
-- Indexes for table `tbl_sett`
--
ALTER TABLE `tbl_sett`
  ADD PRIMARY KEY (`id_sett`);

--
-- Indexes for table `tbl_surat_keluar`
--
ALTER TABLE `tbl_surat_keluar`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `tbl_surat_masuk`
--
ALTER TABLE `tbl_surat_masuk`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_arsip`
--
ALTER TABLE `tbl_arsip`
  MODIFY `id_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_disposisi`
--
ALTER TABLE `tbl_disposisi`
  MODIFY `id_disposisi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_divisi`
--
ALTER TABLE `tbl_divisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_dokumen`
--
ALTER TABLE `tbl_dokumen`
  MODIFY `id_dok` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_klasifikasi`
--
ALTER TABLE `tbl_klasifikasi`
  MODIFY `id_klasifikasi` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_sett`
--
ALTER TABLE `tbl_sett`
  MODIFY `id_sett` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_surat_keluar`
--
ALTER TABLE `tbl_surat_keluar`
  MODIFY `id_surat` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_surat_masuk`
--
ALTER TABLE `tbl_surat_masuk`
  MODIFY `id_surat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
