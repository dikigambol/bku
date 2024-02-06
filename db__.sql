-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Feb 2024 pada 05.00
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db__`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `id_cart` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satker` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_cart` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `carts`
--

INSERT INTO `carts` (`id_cart`, `status`, `admin`, `satker`, `jenis`, `kd_cart`, `created_at`, `updated_at`) VALUES
(1, '-1', '', '238720', '3', '1', '2023-06-26 13:39:26', '2023-06-26 13:39:26'),
(2, '-1', '', '238720', '3', '2', '2023-06-26 13:44:56', '2023-06-26 13:44:56'),
(3, '0', '3', '238720', '2', '1', '2023-06-26 13:59:37', '2023-06-26 13:59:37'),
(4, '0', '3', '238720', '1', '1', '2023-06-27 08:42:32', '2023-06-27 08:42:32'),
(1, '-1', '', '238720', '3', '1', '2023-06-26 13:39:26', '2023-06-26 13:39:26'),
(2, '-1', '', '238720', '3', '2', '2023-06-26 13:44:56', '2023-06-26 13:44:56'),
(3, '0', '3', '238720', '2', '1', '2023-06-26 13:59:37', '2023-06-26 13:59:37'),
(4, '0', '3', '238720', '1', '1', '2023-06-27 08:42:32', '2023-06-27 08:42:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts_spj`
--

CREATE TABLE `carts_spj` (
  `id_cart_spj` bigint(20) UNSIGNED NOT NULL,
  `id_cart` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `carts_spj`
--

INSERT INTO `carts_spj` (`id_cart_spj`, `id_cart`, `status`, `admin`, `created_at`, `updated_at`) VALUES
(1, '3', '0', '3', '2023-06-26 13:59:37', '2023-06-26 13:59:37'),
(2, '4', '0', '3', '2023-06-27 08:42:32', '2023-06-27 08:42:32'),
(1, '3', '0', '3', '2023-06-26 13:59:37', '2023-06-26 13:59:37'),
(2, '4', '0', '3', '2023-06-27 08:42:32', '2023-06-27 08:42:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailusers`
--

CREATE TABLE `detailusers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_satker` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detailusers`
--

INSERT INTO `detailusers` (`id`, `nip`, `kd_satker`, `unor`, `alamat`, `telp`, `created_at`, `updated_at`) VALUES
(1, '10291299', '238720', '1', 'Jl. Soekarno hatta no2A', '085233117226', NULL, NULL),
(2, '1099887866', '238720', '1', 'Jl. Soekarno hatta no2A', '085233117226', NULL, NULL),
(3, '0988667465', '238720', '1', 'Jl. Soekarno hatta no2A', '085233117226', NULL, NULL),
(1, '10291299', '238720', '1', 'Jl. Soekarno hatta no2A', '085233117226', NULL, NULL),
(2, '1099887866', '238720', '1', 'Jl. Soekarno hatta no2A', '085233117226', NULL, NULL),
(3, '0988667465', '238720', '1', 'Jl. Soekarno hatta no2A', '085233117226', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_carts`
--

CREATE TABLE `detail_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `volume` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_carts`
--

INSERT INTO `detail_carts` (`id`, `id_detail`, `item`, `desc`, `volume`, `harga`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, '2', '34', '- 1 Pencetakan dan Penjilidan', '1', '2.000.000', '2000000', '2023-06-26 13:39:53', '2023-06-26 13:39:53'),
(2, '3', '28', '- 1 ATK', '1', '2.350.000', '2350000', '2023-06-26 13:49:31', '2023-06-26 13:49:31'),
(3, '3', '50', '- 5 Snack Rapat Biasa D.K.I.  JAKARTA', '60', '22.000', '1320000', '2023-06-26 13:59:23', '2023-06-26 13:59:23'),
(4, '4', '28', '- 1 ATK', '1', '2.350.000', '2350000', '2023-06-27 08:42:27', '2023-06-27 08:42:27'),
(1, '2', '34', '- 1 Pencetakan dan Penjilidan', '1', '2.000.000', '2000000', '2023-06-26 13:39:53', '2023-06-26 13:39:53'),
(2, '3', '28', '- 1 ATK', '1', '2.350.000', '2350000', '2023-06-26 13:49:31', '2023-06-26 13:49:31'),
(3, '3', '50', '- 5 Snack Rapat Biasa D.K.I.  JAKARTA', '60', '22.000', '1320000', '2023-06-26 13:59:23', '2023-06-26 13:59:23'),
(4, '4', '28', '- 1 ATK', '1', '2.350.000', '2350000', '2023-06-27 08:42:27', '2023-06-27 08:42:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_carts_spj`
--

CREATE TABLE `detail_carts_spj` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_detail_spj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `volume` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_carts_spj`
--

INSERT INTO `detail_carts_spj` (`id`, `id_detail_spj`, `item`, `desc`, `volume`, `harga`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, '1', '28', '- 1 ATK', '1', '2.350.000', '2350000', '2023-06-26 13:59:37', '2023-06-26 13:59:37'),
(2, '1', '50', '- 5 Snack Rapat Biasa D.K.I.  JAKARTA', '60', '22.000', '1320000', '2023-06-26 13:59:37', '2023-06-26 13:59:37'),
(3, '2', '28', '- 1 ATK', '1', '2.350.000', '2350000', '2023-06-27 08:42:32', '2023-06-27 08:42:32'),
(1, '1', '28', '- 1 ATK', '1', '2.350.000', '2350000', '2023-06-26 13:59:37', '2023-06-26 13:59:37'),
(2, '1', '50', '- 5 Snack Rapat Biasa D.K.I.  JAKARTA', '60', '22.000', '1320000', '2023-06-26 13:59:37', '2023-06-26 13:59:37'),
(3, '2', '28', '- 1 ATK', '1', '2.350.000', '2350000', '2023-06-27 08:42:32', '2023-06-27 08:42:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_spj`
--

CREATE TABLE `detail_spj` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_cart_spj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_detail_item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_spj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenis_spj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE `dokumen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_cart` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `benar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `excel_rkakl`
--

CREATE TABLE `excel_rkakl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_import` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdcp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `import_log`
--

CREATE TABLE `import_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_satker` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_dokumen` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `import_log_detail`
--

CREATE TABLE `import_log_detail` (
  `id` int(11) NOT NULL,
  `import_log_id` int(200) NOT NULL,
  `value` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` bigint(20) UNSIGNED NOT NULL,
  `nm_jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keldok`
--

CREATE TABLE `keldok` (
  `id_keldok` bigint(20) UNSIGNED NOT NULL,
  `jenis_ptj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_keldok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_keldok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formula` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keldok`
--

INSERT INTO `keldok` (`id_keldok`, `jenis_ptj`, `nm_keldok`, `sub_keldok`, `formula`, `created_at`, `updated_at`) VALUES
(1, 'kwitansi pembayaran', 'tagihan', '', '0', NULL, NULL),
(2, 'kwitansi pembayaran', 'kwitansi', '', '0', NULL, NULL),
(3, 'konsumsi rapat', 'kwitansi', '', '< 2000000', NULL, NULL),
(4, 'konsumsi rapat', 'dokumentasi', '', '< 2000000', NULL, NULL),
(5, 'konsumsi rapat', 'undangan', '', '>= 2000000', NULL, NULL),
(6, 'konsumsi rapat', 'daftar hadir', '', '>= 2000000', NULL, NULL),
(7, 'konsumsi rapat', 'kwitansi', '', '>= 2000000', NULL, NULL),
(8, 'konsumsi rapat', 'dokumentasi', '', '>= 2000000', NULL, NULL),
(9, 'pengadaan barang/jasa umum', 'kwitansi', '', '< 2000000', NULL, NULL),
(10, 'pengadaan barang/jasa umum', 'dokumentasi', '', '< 2000000', NULL, NULL),
(11, 'pengadaan barang/jasa umum', 'kwitansi', '', '>= 2000000;< 10000000', NULL, NULL),
(12, 'pengadaan barang/jasa umum', 'faktur', '', '>= 2000000;< 10000000', NULL, NULL),
(13, 'pengadaan barang/jasa umum', 'dokumentasi', '', '>= 2000000;< 10000000', NULL, NULL),
(14, 'pengadaan barang/jasa umum', 'usulan/permohonan pengadaan', '', '>= 10000000;< 50000000', NULL, NULL),
(15, 'pengadaan barang/jasa umum', 'hps', '', '>= 10000000;< 50000000', NULL, NULL),
(16, 'pengadaan barang/jasa umum', 'kwitansi', '', '>= 10000000;< 50000000', NULL, NULL),
(17, 'pengadaan barang/jasa umum', 'faktur', '', '>= 10000000;< 50000000', NULL, NULL),
(18, 'pengadaan barang/jasa umum', 'BA pemerikasaan & dokumentasi', '', '>= 10000000;< 50000000', NULL, NULL),
(19, 'pengadaan barang/jasa umum', 'bast', '', '>= 10000000;< 50000000', NULL, NULL),
(20, 'pengadaan barang/jasa umum', 'usulan/permohonan pengadaan', '', '>= 50000000', NULL, NULL),
(21, 'pengadaan barang/jasa umum', 'memo ppk ke pbj', '', '>= 50000000', NULL, NULL),
(22, 'pengadaan barang/jasa umum', 'hps', '', '>= 50000000', NULL, NULL),
(23, 'pengadaan barang/jasa umum', 'undangan pengadaan', '', '>= 50000000', NULL, NULL),
(24, 'pengadaan barang/jasa umum', 'dokumen penawaran', 'harga penawaran', '>= 50000000', NULL, NULL),
(25, 'pengadaan barang/jasa umum', 'dokumen penawaran', 'npwp', '>= 50000000', NULL, NULL),
(26, 'pengadaan barang/jasa umum', 'dokumen penawaran', 'no. rekening', '>= 50000000', NULL, NULL),
(27, 'pengadaan barang/jasa umum', 'dokumen penawaran', 'pakta integritas', '>= 50000000', NULL, NULL),
(28, 'pengadaan barang/jasa umum', 'dokumen penawaran', 'legalitas', '>= 50000000', NULL, NULL),
(29, 'pengadaan barang/jasa umum', 'dokumen pengadaan', 'ba pembukaan dok penawaran', '>= 50000000', NULL, NULL),
(30, 'pengadaan barang/jasa umum', 'dokumen pengadaan', 'ba evaluasi dok penawaran', '>= 50000000', NULL, NULL),
(31, 'pengadaan barang/jasa umum', 'dokumen pengadaan', 'ba klarifikasi dan negosiasi', '>= 50000000', NULL, NULL),
(32, 'pengadaan barang/jasa umum', 'dokumen pengadaan', 'ba hasil pengadaan', '>= 50000000', NULL, NULL),
(33, 'pengadaan barang/jasa umum', 'dokumen pengadaan', 'memo usulan pemenang dari pbj', '>= 50000000', NULL, NULL),
(34, 'pengadaan barang/jasa umum', 'memo penetapan pemenang', '', '>= 50000000', NULL, NULL),
(35, 'pengadaan barang/jasa umum', 'surat pengumuman pemenang', '', '>= 50000000', NULL, NULL),
(36, 'pengadaan barang/jasa umum', 'sppbj', '', '>= 50000000', NULL, NULL),
(37, 'pengadaan barang/jasa umum', 'spk/kontrak', '', '>= 50000000', NULL, NULL),
(38, 'pengadaan barang/jasa umum', 'spmk/spp', '', '>= 50000000', NULL, NULL),
(39, 'pengadaan barang/jasa umum', 'ba pemeriksaan & dokumentasi', '', '>= 50000000', NULL, NULL),
(40, 'pengadaan barang/jasa umum', 'bast', '', '>= 50000000', NULL, NULL),
(41, 'pengadaan barang/jasa umum', 'dokumen penyedia', 'permohonan pembayaran/invoice', '>= 50000000', NULL, NULL),
(42, 'pengadaan barang/jasa umum', 'dokumen penyedia', 'kwitansi', '>= 50000000', NULL, NULL),
(43, 'pengadaan barang/jasa umum', 'dokumen penyedia', 'faktur', '>= 50000000', NULL, NULL),
(44, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'undangan kegiatan', '', '< 2000000', NULL, NULL),
(45, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'susunan acara', '', '< 2000000', NULL, NULL),
(46, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'kwitansi', '', '< 2000000', NULL, NULL),
(47, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'daftar hadir', '', '< 2000000', NULL, NULL),
(48, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'dokumentasi', '', '< 2000000', NULL, NULL),
(49, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'undangan kegiatan', '', '>= 2000000;< 10000000', NULL, NULL),
(50, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'susunan acara', '', '>= 2000000;< 10000000', NULL, NULL),
(51, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'kwitansi', '', '>= 2000000;< 10000000', NULL, NULL),
(52, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'faktur', '', '>= 2000000;< 10000000', NULL, NULL),
(53, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'daftar hadir', '', '>= 2000000;< 10000000', NULL, NULL),
(54, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'dokumentasi', '', '>= 2000000;< 10000000', NULL, NULL),
(55, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'undangan kegiatan', '', '>= 10000000;< 50000000', NULL, NULL),
(56, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'susunan acara', '', '>= 10000000;< 50000000', NULL, NULL),
(57, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'kwitansi', '', '>= 10000000;< 50000000', NULL, NULL),
(58, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'faktur', '', '>= 10000000;< 50000000', NULL, NULL),
(59, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'ba pemeriksaan & dokumentasi', '', '>= 10000000;< 50000000', NULL, NULL),
(60, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'bast', '', '>= 10000000;< 50000000', NULL, NULL),
(61, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'daftar hadir', '', '>= 10000000;< 50000000', NULL, NULL),
(62, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'hps', '', '>= 10000000;< 50000000', NULL, NULL),
(63, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'undangan kegiatan', '', '>= 50000000', NULL, NULL),
(64, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'susunan acara', '', '>= 50000000', NULL, NULL),
(65, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'memo ppk ke pbj', '', '>= 50000000', NULL, NULL),
(66, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'hps', '', '>= 50000000', NULL, NULL),
(67, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'undangan pengadaan', '', '>= 50000000', NULL, NULL),
(68, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'dokumen penawaran', 'harga penawaran', '>= 50000000', NULL, NULL),
(69, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'dokumen penawaran', 'npwp', '>= 50000000', NULL, NULL),
(70, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'dokumen penawaran', 'no. rekening', '>= 50000000', NULL, NULL),
(71, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'dokumen penawaran', 'pakta integritas', '>= 50000000', NULL, NULL),
(72, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'dokumen penawaran', 'legalitas', '>= 50000000', NULL, NULL),
(73, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'dokumen pengadaan', 'ba pembukaan dok penawaran', '>= 50000000', NULL, NULL),
(74, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'dokumen pengadaan', 'ba evaluasi dok penawaran', '>= 50000000', NULL, NULL),
(75, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'dokumen pengadaan', 'ba klarifikasi dan negosiasi', '>= 50000000', NULL, NULL),
(76, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'dokumen pengadaan', 'ba hasil pengadaan', '>= 50000000', NULL, NULL),
(77, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'dokumen pengadaan', 'memo usulan pemenang dari pbj', '>= 50000000', NULL, NULL),
(78, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'memo penetapan pemenang', '', '>= 50000000', NULL, NULL),
(79, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'surat pengumuman pemenang', '', '>= 50000000', NULL, NULL),
(80, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'sppbj', '', '>= 50000000', NULL, NULL),
(81, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'spk/kontrak', '', '>= 50000000', NULL, NULL),
(82, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'spmk/spp', '', '>= 50000000', NULL, NULL),
(83, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'ba pemeriksaan & dokumentasi', '', '>= 50000000', NULL, NULL),
(84, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'bast', '', '>= 50000000', NULL, NULL),
(85, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'daftar hadir', '', '>= 50000000', NULL, NULL),
(86, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'dokumen penyedia', 'permohonan pembayaran/invoice', '>= 50000000', NULL, NULL),
(87, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'dokumen penyedia', 'kwitansi', '>= 50000000', NULL, NULL),
(88, 'pengadaan kegiatan halfday/ fullday/ fullboard', 'dokumen penyedia', 'faktur', '>= 50000000', NULL, NULL),
(89, 'honor bulanan', 'sk / daftar honorarium', '', '0', NULL, NULL),
(90, 'honor bulanan', 'rincian honor sesuai sbm & perhitungan pajak', '', '0', NULL, NULL),
(91, 'honor bulanan', 'bukti pembayaran honor', '', '0', NULL, NULL),
(92, 'honor kegiatan', 'undangan', '', '0', NULL, NULL),
(93, 'honor kegiatan', 'dokumentasi', '', '0', NULL, NULL),
(94, 'honor kegiatan', 'Rincian honor seusai SBM & perhitungan pajak', '', '0', NULL, NULL),
(95, 'honor kegiatan', 'Bukti pembayaran honor', '', '0', NULL, NULL),
(96, 'Pengadaan Seminar Kit', 'Undangan kegiatan', '', '< 2000000', NULL, NULL),
(97, 'Pengadaan Seminar Kit', 'Kwitansi', '', '< 2000000', NULL, NULL),
(98, 'Pengadaan Seminar Kit', 'Dokumentasi', '', '< 2000000', NULL, NULL),
(99, 'Pengadaan Seminar Kit', 'Daftar penerima', '', '< 2000000', NULL, NULL),
(100, 'Pengadaan Seminar Kit', 'Undangan kegiatan', '', '>= 2000000;< 10000000', NULL, NULL),
(101, 'Pengadaan Seminar Kit', 'Kwitansi', '', '>= 2000000;< 10000000', NULL, NULL),
(102, 'Pengadaan Seminar Kit', 'Faktur', '', '>= 2000000;< 10000000', NULL, NULL),
(103, 'Pengadaan Seminar Kit', 'Dokumentasi', '', '>= 2000000;< 10000000', NULL, NULL),
(104, 'Pengadaan Seminar Kit', 'Daftar penerima', '', '>= 2000000;< 10000000', NULL, NULL),
(105, 'Pengadaan Seminar Kit', 'Undangan kegiatan', '', '>= 10000000;< 50000000', NULL, NULL),
(106, 'Pengadaan Seminar Kit', 'HPS', '', '>= 10000000;< 50000000', NULL, NULL),
(107, 'Pengadaan Seminar Kit', 'Kwitansi', '', '>= 10000000;< 50000000', NULL, NULL),
(108, 'Pengadaan Seminar Kit', 'Faktur', '', '>= 10000000;< 50000000', NULL, NULL),
(109, 'Pengadaan Seminar Kit', 'BA pemeriksaan & dokumentasi', '', '>= 10000000;< 50000000', NULL, NULL),
(110, 'Pengadaan Seminar Kit', 'BAST', '', '>= 10000000;< 50000000', NULL, NULL),
(111, 'Pengadaan Seminar Kit', 'Daftar penerima', '', '>= 10000000;< 50000000', NULL, NULL),
(112, 'Pengadaan Seminar Kit', 'Undangan kegiatan', '', '>= 50000000', NULL, NULL),
(113, 'Pengadaan Seminar Kit', 'memo ppk ke pbj', '', '>= 50000000', NULL, NULL),
(114, 'Pengadaan Seminar Kit', 'hps', '', '>= 50000000', NULL, NULL),
(115, 'Pengadaan Seminar Kit', 'undangan pengadaan', '', '>= 50000000', NULL, NULL),
(116, 'Pengadaan Seminar Kit', 'dokumen penawaran', 'harga penawaran', '>= 50000000', NULL, NULL),
(117, 'Pengadaan Seminar Kit', 'dokumen penawaran', 'npwp', '>= 50000000', NULL, NULL),
(118, 'Pengadaan Seminar Kit', 'dokumen penawaran', 'no. rekening', '>= 50000000', NULL, NULL),
(119, 'Pengadaan Seminar Kit', 'dokumen penawaran', 'pakta integritas', '>= 50000000', NULL, NULL),
(120, 'Pengadaan Seminar Kit', 'dokumen penawaran', 'legalitas', '>= 50000000', NULL, NULL),
(121, 'Pengadaan Seminar Kit', 'dokumen pengadaan', 'ba pembukaan dok penawaran', '>= 50000000', NULL, NULL),
(122, 'Pengadaan Seminar Kit', 'dokumen pengadaan', 'ba evaluasi dok penawaran', '>= 50000000', NULL, NULL),
(123, 'Pengadaan Seminar Kit', 'dokumen pengadaan', 'ba klarifikasi dan negosiasi', '>= 50000000', NULL, NULL),
(124, 'Pengadaan Seminar Kit', 'dokumen pengadaan', 'ba hasil pengadaan', '>= 50000000', NULL, NULL),
(125, 'Pengadaan Seminar Kit', 'dokumen pengadaan', 'memo usulan pemenang dari pbj', '>= 50000000', NULL, NULL),
(126, 'Pengadaan Seminar Kit', 'memo penetapan pemenang', '', '>= 50000000', NULL, NULL),
(127, 'Pengadaan Seminar Kit', 'surat pengumuman pemenang', '', '>= 50000000', NULL, NULL),
(128, 'Pengadaan Seminar Kit', 'sppbj', '', '>= 50000000', NULL, NULL),
(129, 'Pengadaan Seminar Kit', 'spk/kontrak', '', '>= 50000000', NULL, NULL),
(130, 'Pengadaan Seminar Kit', 'spmk/spp', '', '>= 50000000', NULL, NULL),
(131, 'Pengadaan Seminar Kit', 'ba pemeriksaan & dokumentasi', '', '>= 50000000', NULL, NULL),
(132, 'Pengadaan Seminar Kit', 'bast', '', '>= 50000000', NULL, NULL),
(133, 'Pengadaan Seminar Kit', 'daftar penerima', '', '>= 50000000', NULL, NULL),
(134, 'Pengadaan Seminar Kit', 'dokumen penyedia', 'permohonan pembayaran/invoice', '>= 50000000', NULL, NULL),
(135, 'Pengadaan Seminar Kit', 'dokumen penyedia', 'kwitansi', '>= 50000000', NULL, NULL),
(136, 'Pengadaan Seminar Kit', 'dokumen penyedia', 'faktur', '>= 50000000', NULL, NULL),
(137, 'perjalanan dinas', 'spt dan undangan', '', '0', NULL, NULL),
(138, 'perjalanan dinas', 'sppd', '', '0', NULL, NULL),
(139, 'perjalanan dinas', 'rincian biaya', '', '0', NULL, NULL),
(140, 'perjalanan dinas', 'bill hotel', '', '0', NULL, NULL),
(141, 'perjalanan dinas', 'bukti perjalanan pergi', 'darat:kwitansi bensin', '0', NULL, NULL),
(142, 'perjalanan dinas', 'bukti perjalanan pergi', 'darat:kwitansi tol/bukti transaksi', '0', NULL, NULL),
(143, 'perjalanan dinas', 'bukti perjalanan pergi', 'umum:taksi asal', '0', NULL, NULL),
(144, 'perjalanan dinas', 'bukti perjalanan pergi', 'umum:bill booking', '0', NULL, NULL),
(145, 'perjalanan dinas', 'bukti perjalanan pergi', 'umum:tiket/pass', '0', NULL, NULL),
(146, 'perjalanan dinas', 'bukti perjalanan pergi', 'umum:taksi lokasi', '0', NULL, NULL),
(147, 'perjalanan dinas', 'bukti perjalanan pulang', 'darat:kwitansi bensin', '0', NULL, NULL),
(148, 'perjalanan dinas', 'bukti perjalanan pulang', 'darat:kwitansi tol/bukti transaksi', '0', NULL, NULL),
(149, 'perjalanan dinas', 'bukti perjalanan pulang', 'umum:taksi asal', '0', NULL, NULL),
(150, 'perjalanan dinas', 'bukti perjalanan pulang', 'umum:bill booking', '0', NULL, NULL),
(151, 'perjalanan dinas', 'bukti perjalanan pulang', 'umum:tiket/pass', '0', NULL, NULL),
(152, 'perjalanan dinas', 'bukti perjalanan pulang', 'umum:taksi lokasi', '0', NULL, NULL),
(153, 'perjalanan dinas', 'laporan hasil tugas/perjalanan dinas', '', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_05_17_153456_excel_rkakl', 1),
(5, '2022_07_01_152308_cart', 1),
(6, '2022_07_01_152422_detail_cart', 1),
(7, '2022_07_07_220624_create_table_detail_user', 1),
(8, '2022_08_29_070143_import_log', 1),
(9, '2022_09_11_225830_dokumen', 1),
(10, '2022_09_12_043537_keldok', 1),
(11, '2022_09_20_082156_rkakl', 1),
(12, '2023_02_13_231648_create_transfer_table', 1),
(13, '2023_02_23_171249_create_unor_table', 1),
(14, '2023_03_15_215608_jenis', 1),
(15, '2023_04_20_114914_carts_spj', 1),
(16, '2023_04_20_114938_detail_carts_spj', 1),
(17, '2023_05_11_011050_detail_spj', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rkakl`
--

CREATE TABLE `rkakl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_import` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_parent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `string_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hie1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hie2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hie3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hie4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hie5` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hie6` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hie7` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hie8` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdcp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `realisasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sisa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengajuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `satker`
--

CREATE TABLE `satker` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_satker` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_satker` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_satker` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kppn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_dipa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_dipa` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `satker`
--

INSERT INTO `satker` (`id`, `kd_satker`, `nm_satker`, `alamat_satker`, `kppn`, `no_dipa`, `tgl_dipa`, `created_at`, `updated_at`) VALUES
(1, '238720', 'Sekretariat Ditjen Perikanan Tangkap', '', '', '', '0000-00-00', '2023-05-26 23:51:20', '2023-05-26 23:51:20'),
(2, '239146', 'Pelabuhan Perikanan Nusantara Karangantu', '', '', '', '0000-00-00', '2023-05-26 23:51:20', '2023-05-26 23:51:20'),
(3, '239150', 'Balai Besar Penangkapan Ikan', '', '', '', '0000-00-00', '2023-05-26 23:51:20', '2023-05-26 23:51:20'),
(4, '239171', 'Pelabuhan Perikanan Nusantara Pekalongan', '', '', '', '0000-00-00', '2023-05-26 23:51:20', '2023-05-26 23:51:20'),
(5, '239214', 'Pelabuhan Perikanan Nusantara Sungailiat', '', '', '', '0000-00-00', '2023-05-26 23:51:20', '2023-05-26 23:51:20'),
(6, '239221', 'Pelabuhan Perikanan Nusantara Tanjung Pandan', '', '', '', '0000-00-00', '2023-05-26 23:51:20', '2023-05-26 23:51:20'),
(7, '239235', 'Pelabuhan Perikanan Pantai Teluk Batang', '', '', '', '0000-00-00', '2023-05-26 23:51:20', '2023-05-26 23:51:20'),
(8, '239991', 'Pelabuhan Perikanan Nusantara Pemangkat', '', '', '', '0000-00-00', '2023-05-26 23:51:20', '2023-05-26 23:51:20'),
(9, '310719', 'Pelabuhan Perikanan Nusantara Kwandang', '', '', '', '0000-00-00', '2023-05-26 23:51:20', '2023-05-26 23:51:20'),
(10, '427655', 'Pelabuhan Perikanan Samudera Belawan', '', '', '', '0000-00-00', '2023-05-26 23:51:20', '2023-05-26 23:51:20'),
(11, '427661', 'Pelabuhan Perikanan Nusantara Ternate', '', '', '', '0000-00-00', '2023-05-26 23:51:20', '2023-05-26 23:51:20'),
(12, '427670', 'Pelabuhan Perikanan Nusantara Prigi', '', '', '', '0000-00-00', '2023-05-26 23:51:20', '2023-05-26 23:51:20'),
(13, '427692', 'Pelabuhan Perikanan Nusantara Brondong', '', '', '', '0000-00-00', '2023-05-26 23:51:20', '2023-05-26 23:51:20'),
(14, '452997', 'Direktorat Kepelabuhanan', '', '', '', '0000-00-00', '2023-05-26 23:51:20', '2023-05-26 23:51:20'),
(15, '453001', 'Direktorat Kapal dan Alat Penangkapan Ikan', '', '', '', '0000-00-00', '2023-05-26 23:51:20', '2023-05-26 23:51:20'),
(16, '465017', 'Direktorat Pengelolaan Sumberdara Ikan', '', '', '', '0000-00-00', '2023-05-26 23:51:20', '2023-05-26 23:51:20'),
(17, '465023', 'Direktorat Perizinan dan Kenelayanan', '', '', '', '0000-00-00', '2023-05-26 23:51:20', '2023-05-26 23:51:20'),
(18, '518117', 'Pelabuhan Perikanan Samudera Cilacap', '', '', '', '0000-00-00', '2023-05-26 23:51:20', '2023-05-26 23:51:20'),
(19, '531488', 'Pelabuhan Perikanan Samudera Bungus', '', '', '', '0000-00-00', '2023-05-26 23:51:20', '2023-05-26 23:51:20'),
(20, '537611', 'Pelabuhan Perikanan Samudera Nizam Zachman', '', '', '', '0000-00-00', '2023-05-26 23:51:20', '2023-05-26 23:51:20'),
(21, '537695', 'Pelabuhan Perikanan Samudera Kendari', '', '', '', '0000-00-00', '2023-05-26 23:51:20', '2023-05-26 23:51:20'),
(22, '560393', 'Pelabuhan Perikanan Nusantara Pelabuhanratu', '', '', '', '0000-00-00', '2023-05-26 23:51:20', '2023-05-26 23:51:20'),
(23, '560401', 'Pelabuhan Perikanan Nusantara Sibolga', '', '', '', '0000-00-00', '2023-05-26 23:51:20', '2023-05-26 23:51:20'),
(24, '622461', 'Pelabuhan Perikanan Nusantara Ambon', '', '', '', '0000-00-00', '2023-05-26 23:51:20', '2023-05-26 23:51:20'),
(25, '622475', 'Pelabuhan Perikanan Nusantara Tual', '', '', '', '0000-00-00', '2023-05-26 23:51:20', '2023-05-26 23:51:20'),
(26, '622482', 'Pelabuhan Perikanan Nusantara Kejawanan', '', '', '', '0000-00-00', '2023-05-26 23:51:20', '2023-05-26 23:51:20'),
(27, '633693', 'Pelabuhan Perikanan Nusantara Pengambengan', '', '', '', '0000-00-00', '2023-05-26 23:51:20', '2023-05-26 23:51:20'),
(28, '633707', 'Pelabuhan Perikanan Samudera Bitung', '', '', '', '0000-00-00', '2023-05-26 23:51:20', '2023-05-26 23:51:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_detuser` bigint(20) DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `id_detuser`, `fullname`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Salman Khan', 'admin', 1, 'admin@gmail.com', NULL, '$2y$10$WuzCIfaRyRAiNWadA36DseTgOdLuWu7M9bGBGZplNp0bm1Yt8SU/i', NULL, '2023-06-26 05:52:32', NULL),
(2, 2, 'Reza rahadian', 'bp', 2, 'reza@gmail.com', NULL, '$2y$10$d3jIgipBvMWeJT5h.Jg9z.izQBqgOIKMvePe0Bo7wVK1U803.uI9q', NULL, '2023-06-26 05:52:32', NULL),
(3, 3, 'Hamdan maliki', 'bpp', 3, 'hamdan@gmail.com', NULL, '$2y$10$dHZ7hpekWeuBo6NnT6lBDOCibCsFEyypqeXJYiQQI2moKAFlT0.ti', NULL, '2023-06-26 05:52:32', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `import_log`
--
ALTER TABLE `import_log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `import_log_detail`
--
ALTER TABLE `import_log_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `satker`
--
ALTER TABLE `satker`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `import_log`
--
ALTER TABLE `import_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `import_log_detail`
--
ALTER TABLE `import_log_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `satker`
--
ALTER TABLE `satker`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
