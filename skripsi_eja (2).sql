-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Agu 2025 pada 05.49
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_eja`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_jadwal`
--

CREATE TABLE `detail_jadwal` (
  `id` int(11) NOT NULL,
  `jadwal_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `tanggal_waktu` datetime NOT NULL,
  `lokasi` text NOT NULL,
  `catatan_petugas` text NOT NULL,
  `status_jadwal` varchar(255) NOT NULL DEFAULT '1',
  `petugas_pendamping` varchar(255) NOT NULL,
  `notifikasi` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_jadwal`
--

INSERT INTO `detail_jadwal` (`id`, `jadwal_id`, `users_id`, `nama_kegiatan`, `tanggal_waktu`, `lokasi`, `catatan_petugas`, `status_jadwal`, `petugas_pendamping`, `notifikasi`, `created_at`, `updated_at`) VALUES
(5, 4, 1, 'Pendampingan Kasus Warisan', '2025-08-15 16:44:00', 'Pengadilan Agama Kota Cirebon', 'wadwad', '2', 'Eja Julpi ,Syahreza Zulfii', 3, '2025-08-15 09:45:03', '2025-08-24 08:35:47'),
(6, 4, 1, 'Pendampingan Kasus Warisannn', '2025-08-16 09:51:00', 'Pengadilan Agama Kota Cirebonn', 'asdaww', '2', 'Syahreza Zulfii', 3, '2025-08-15 09:45:42', '2025-08-24 08:56:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE `dokumen` (
  `id` int(11) NOT NULL,
  `judul_dokumen` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `dokumen` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokumen`
--

INSERT INTO `dokumen` (`id`, `judul_dokumen`, `deskripsi`, `dokumen`, `created_at`, `updated_at`) VALUES
(2, 'awda', 'awdwa', '1755294521_31.+Paper+No+76.+Paula+Dewanti.pdf', '2025-08-15 21:45:09', '2025-08-15 21:48:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `pendampingan_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `judul_acara` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `lokasi` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `pendampingan_id`, `users_id`, `judul_acara`, `deskripsi`, `tanggal_mulai`, `tanggal_selesai`, `lokasi`, `status`, `created_at`, `updated_at`) VALUES
(4, 22, 1, 'Pendampingan Kasus Warisann', 'Rebutan Warisann', '2025-08-23', '2025-08-31', 'Pengadilan Agama Kota Cirebonn', '2', '2025-08-15 20:45:51', '2025-08-15 20:45:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metode_tanggapan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `jawaban` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumen_jawaban` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notifikasi` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `konsultasi`
--

INSERT INTO `konsultasi` (`id`, `users_id`, `judul`, `kategori`, `deskripsi`, `dokumen`, `metode_tanggapan`, `kontak`, `status`, `jawaban`, `dokumen_jawaban`, `notifikasi`, `created_at`, `updated_at`) VALUES
(1, 1, 'Warisan', 'Keluarga', 'Rebutan warisan', '1755503091_Screenshot 2025-02-15 133209.png', 'Manual', '083846788549', 1, NULL, NULL, NULL, '2025-08-18 07:44:51', '2025-08-18 07:44:51'),
(2, 1, 'Beban Kerja', 'Ketenagakerjaan', 'Tidak sesuai jobdesk', NULL, 'Otomatis', '083846788549', 1, NULL, NULL, NULL, '2025-08-18 07:47:30', '2025-08-18 07:47:30'),
(3, 1, 'Pekerjaan Berlebihan', 'Ketenagakerjaan', 'Pekerjaan berlebihan tidak sesuai aturan yang ada', NULL, 'Otomatis', NULL, 1, NULL, NULL, NULL, '2025-08-18 08:17:51', '2025-08-18 08:17:51'),
(4, 1, 'Pekerjaan Over', 'Ketenagakerjaan', 'Pekerjaan terlalu memberatkan', NULL, 'Otomatis', '083846788549', 2, NULL, NULL, NULL, '2025-08-18 08:21:48', '2025-08-18 08:21:48'),
(5, 1, 'Pekerjaan Over', 'Ketenagakerjaan', 'Pekerjaan diluar tanggunga jawab', NULL, 'Manual', '083846788549', 1, NULL, NULL, NULL, '2025-08-22 02:45:28', '2025-08-22 02:45:28'),
(7, 1, 'Beban Kerja', 'Ketenagakerjaan', 'Pekerjaan yang saya terima tidak sesuai dengan jobdesk kjadnkjawndjwndw dawdjnawdawidmiawdiawd awoidmawiodjawiodioawdn oiawjdoiawjdioaw oiawkdjoiawjdawio oiawdjawioj ', '1755843351_1755294309_1755080560_SKD.docx', 'Manual', '083846788549', 2, 'kjadnakuwdnw dawkjdnaukdnaiund dawkjdnawuidn lk', '1755866337_1755294309_1755080560_SKD.docx', 3, '2025-08-22 06:15:51', '2025-08-24 08:27:50');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2025_08_04_211243_konsultasi', 2),
(7, '2025_08_05_202829_add_tfidf_response_to_konsultasi_table', 3),
(8, '2025_08_22_093731_create_notifications_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('05c7e7e7-2559-4515-864b-2163053051a2', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 2, '{\"model\":\"Konsultasi\",\"action\":\"ditambahkan\",\"time\":\"2025-08-22 13:15:51\"}', NULL, '2025-08-22 06:15:51', '2025-08-22 06:15:51'),
('07daefb2-a6aa-44be-99e7-e8275f611c30', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 3, '{\"model\":\"Detail Jadwal\",\"action\":\"diubah\",\"time\":\"2025-08-24 15:35:47\"}', NULL, '2025-08-24 08:35:47', '2025-08-24 08:35:47'),
('0d46d08f-41a7-4f61-8026-5428e013ffcb', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 1, '{\"model\":\"Detail Jadwal\",\"action\":\"diubah\",\"time\":\"2025-08-24 15:35:47\"}', NULL, '2025-08-24 08:35:47', '2025-08-24 08:35:47'),
('12b9cd6f-479d-4be0-888e-6e717e56e02e', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 3, '{\"model\":\"Pendampingan\",\"action\":\"diubah\",\"time\":\"2025-08-23 01:28:12\"}', NULL, '2025-08-22 18:28:12', '2025-08-22 18:28:12'),
('13246973-d70b-40be-8bf5-a5f104f5b970', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 4, '{\"model\":\"Konsultasi\",\"action\":\"diubah\",\"time\":\"2025-08-24 15:22:45\"}', NULL, '2025-08-24 08:22:45', '2025-08-24 08:22:45'),
('1830dc19-135a-40c2-8a4a-d9763eb6c3d1', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 4, '{\"model\":\"Pendampingan\",\"action\":\"diubah\",\"time\":\"2025-08-24 15:30:46\"}', NULL, '2025-08-24 08:30:46', '2025-08-24 08:30:46'),
('1930a32e-bd4e-440b-b969-b1c4e872109a', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 3, '{\"model\":\"Konsultasi\",\"action\":\"diubah\",\"time\":\"2025-08-24 15:21:36\"}', NULL, '2025-08-24 08:21:36', '2025-08-24 08:21:36'),
('1a7ee28e-86ff-41ea-b7ec-7208bb293108', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 4, '{\"model\":\"Konsultasi\",\"action\":\"diubah\",\"time\":\"2025-08-24 15:21:36\"}', NULL, '2025-08-24 08:21:36', '2025-08-24 08:21:36'),
('1d98d908-898a-4f22-9b8b-7e9591d6765c', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 1, '{\"model\":\"Detail Jadwal\",\"action\":\"diubah\",\"time\":\"2025-08-24 15:56:41\"}', NULL, '2025-08-24 08:56:41', '2025-08-24 08:56:41'),
('2029fb1f-1c51-4bee-af86-5ccff62788aa', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 4, '{\"model\":\"Konsultasi\",\"action\":\"diubah\",\"time\":\"2025-08-22 14:44:58\"}', NULL, '2025-08-22 07:44:58', '2025-08-22 07:44:58'),
('2093efbf-44a9-4cb6-bd39-19c05218b845', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 4, '{\"model\":\"Konsultasi\",\"action\":\"ditambahkan\",\"time\":\"2025-08-22 09:45:30\"}', NULL, '2025-08-22 02:45:30', '2025-08-22 02:45:30'),
('25a59d8d-e8d6-4557-a405-58e9d90d6ef3', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 4, '{\"model\":\"Konsultasi\",\"action\":\"ditambahkan\",\"time\":\"2025-08-22 13:11:35\"}', NULL, '2025-08-22 06:11:35', '2025-08-22 06:11:35'),
('2d6f6901-7e7f-4bca-ac99-99952f17e56c', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 4, '{\"model\":\"Detail Jadwal\",\"action\":\"diubah\",\"time\":\"2025-08-24 15:56:41\"}', NULL, '2025-08-24 08:56:41', '2025-08-24 08:56:41'),
('303a3f95-c55c-4f6d-9ce8-bcd5be3c807f', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 3, '{\"model\":\"Konsultasi\",\"action\":\"ditambahkan\",\"time\":\"2025-08-22 13:15:51\"}', NULL, '2025-08-22 06:15:51', '2025-08-22 06:15:51'),
('36e89063-2ca2-4b09-87b2-c87711912b19', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 2, '{\"model\":\"Pendampingan\",\"action\":\"diubah\",\"time\":\"2025-08-24 15:32:29\"}', NULL, '2025-08-24 08:32:29', '2025-08-24 08:32:29'),
('39ff009b-8ead-47a7-aa83-51b355e7e742', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 2, '{\"model\":\"Konsultasi\",\"action\":\"diubah\",\"time\":\"2025-08-24 15:27:51\"}', NULL, '2025-08-24 08:27:51', '2025-08-24 08:27:51'),
('3ef5820d-e595-49d2-9409-c2f7b35f0472', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 1, '{\"model\":\"Pendampingan\",\"action\":\"diubah\",\"time\":\"2025-08-23 01:28:12\"}', NULL, '2025-08-22 18:28:12', '2025-08-22 18:28:12'),
('4d3ed9ff-9d10-47e6-a2b8-87ecb2e4771d', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 1, '{\"model\":\"Konsultasi\",\"action\":\"ditambahkan\",\"time\":\"2025-08-22 13:15:51\"}', NULL, '2025-08-22 06:15:51', '2025-08-22 06:15:51'),
('53e7d4fa-cb4b-431d-9ac1-18d5743d7529', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 1, '{\"model\":\"Konsultasi\",\"action\":\"diubah\",\"time\":\"2025-08-24 15:21:36\"}', NULL, '2025-08-24 08:21:36', '2025-08-24 08:21:36'),
('556fdcad-967a-4f3a-b79d-e053a2b3e1d4', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 3, '{\"model\":\"Konsultasi\",\"action\":\"ditambahkan\",\"time\":\"2025-08-22 09:45:30\"}', NULL, '2025-08-22 02:45:30', '2025-08-22 02:45:30'),
('629636ba-1867-493d-9232-ddf54862df08', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 2, '{\"model\":\"Konsultasi\",\"action\":\"diubah\",\"time\":\"2025-08-24 15:21:36\"}', NULL, '2025-08-24 08:21:36', '2025-08-24 08:21:36'),
('6486012f-55da-4215-9cc5-aa71074c6852', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 2, '{\"model\":\"Konsultasi\",\"action\":\"diubah\",\"time\":\"2025-08-22 14:44:58\"}', NULL, '2025-08-22 07:44:58', '2025-08-22 07:44:58'),
('71ae4ef9-950c-4c44-92e1-32d6e4b6e07a', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 3, '{\"model\":\"Konsultasi\",\"action\":\"diubah\",\"time\":\"2025-08-24 15:27:51\"}', NULL, '2025-08-24 08:27:51', '2025-08-24 08:27:51'),
('749a05db-3ef9-4143-93d8-4932f4dca528', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 1, '{\"model\":\"Pendampingan\",\"action\":\"diubah\",\"time\":\"2025-08-24 15:30:46\"}', NULL, '2025-08-24 08:30:46', '2025-08-24 08:30:46'),
('7a085668-f6ee-40d3-a6ec-d0ef00444a41', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 2, '{\"model\":\"Konsultasi\",\"action\":\"ditambahkan\",\"time\":\"2025-08-22 13:11:35\"}', NULL, '2025-08-22 06:11:35', '2025-08-22 06:11:35'),
('7e10c66c-dd0a-4474-9ea4-c1863ff2092e', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 4, '{\"model\":\"Pendampingan\",\"action\":\"diubah\",\"time\":\"2025-08-23 01:28:12\"}', NULL, '2025-08-22 18:28:12', '2025-08-22 18:28:12'),
('820b88b0-a34c-4e01-b9ff-514077be6242', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 4, '{\"model\":\"Konsultasi\",\"action\":\"diubah\",\"time\":\"2025-08-24 15:27:51\"}', NULL, '2025-08-24 08:27:51', '2025-08-24 08:27:51'),
('964d384f-51de-4c3c-ac90-8621ec6c8c07', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 1, '{\"model\":\"Konsultasi\",\"action\":\"diubah\",\"time\":\"2025-08-22 14:44:58\"}', NULL, '2025-08-22 07:44:58', '2025-08-22 07:44:58'),
('96bcbec4-ad3f-4d8c-83dc-740bea85b1d1', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 4, '{\"model\":\"Detail Jadwal\",\"action\":\"diubah\",\"time\":\"2025-08-24 15:35:47\"}', NULL, '2025-08-24 08:35:47', '2025-08-24 08:35:47'),
('99472e6b-2611-41f3-82e8-6a7d7ac2227f', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 3, '{\"model\":\"Konsultasi\",\"action\":\"diubah\",\"time\":\"2025-08-22 14:44:58\"}', NULL, '2025-08-22 07:44:58', '2025-08-22 07:44:58'),
('9aabb509-c5ca-475a-be71-749f44c11ab8', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 3, '{\"model\":\"Detail Jadwal\",\"action\":\"diubah\",\"time\":\"2025-08-24 15:56:41\"}', NULL, '2025-08-24 08:56:41', '2025-08-24 08:56:41'),
('a184e265-b441-4710-87b3-77f938abc01f', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 1, '{\"model\":\"Pendampingan\",\"action\":\"diubah\",\"time\":\"2025-08-24 15:32:29\"}', NULL, '2025-08-24 08:32:29', '2025-08-24 08:32:29'),
('ab73035e-2fa0-4e3a-b713-458c4aa3b97e', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 2, '{\"model\":\"Konsultasi\",\"action\":\"diubah\",\"time\":\"2025-08-24 15:22:45\"}', NULL, '2025-08-24 08:22:45', '2025-08-24 08:22:45'),
('accf4b3e-5b91-483f-aca9-2973cb685fae', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 4, '{\"model\":\"Pendampingan\",\"action\":\"diubah\",\"time\":\"2025-08-24 15:32:29\"}', NULL, '2025-08-24 08:32:29', '2025-08-24 08:32:29'),
('b331d413-c95e-4ee6-a51f-d5285e7f4ec4', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 3, '{\"model\":\"Pendampingan\",\"action\":\"diubah\",\"time\":\"2025-08-24 15:30:46\"}', NULL, '2025-08-24 08:30:46', '2025-08-24 08:30:46'),
('b3b682f2-0e4a-45ca-a33b-fcf5ea6b47d6', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 2, '{\"model\":\"Konsultasi\",\"action\":\"ditambahkan\",\"time\":\"2025-08-22 09:45:30\"}', NULL, '2025-08-22 02:45:30', '2025-08-22 02:45:30'),
('b9735f07-7316-46e3-a88c-e03b2b95308d', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 3, '{\"model\":\"Konsultasi\",\"action\":\"ditambahkan\",\"time\":\"2025-08-22 13:11:35\"}', NULL, '2025-08-22 06:11:35', '2025-08-22 06:11:35'),
('bbb8870a-edd5-4ed8-9bb3-fd317a51e59d', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 2, '{\"model\":\"Detail Jadwal\",\"action\":\"diubah\",\"time\":\"2025-08-24 15:56:41\"}', NULL, '2025-08-24 08:56:41', '2025-08-24 08:56:41'),
('c5905fd6-8b76-484b-a0a8-45864d785e2a', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 1, '{\"model\":\"Konsultasi\",\"action\":\"diubah\",\"time\":\"2025-08-24 15:22:45\"}', NULL, '2025-08-24 08:22:45', '2025-08-24 08:22:45'),
('cd53ebd6-9508-48d3-a76f-26d15fcc5ed8', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 3, '{\"model\":\"Pendampingan\",\"action\":\"diubah\",\"time\":\"2025-08-24 15:32:29\"}', NULL, '2025-08-24 08:32:29', '2025-08-24 08:32:29'),
('d170bd37-3158-4886-a064-6e7d636b8b87', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 1, '{\"model\":\"Konsultasi\",\"action\":\"ditambahkan\",\"time\":\"2025-08-22 13:11:35\"}', NULL, '2025-08-22 06:11:35', '2025-08-22 06:11:35'),
('d20a1d46-b78c-43a1-b207-a20c15f880e9', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 4, '{\"model\":\"Konsultasi\",\"action\":\"ditambahkan\",\"time\":\"2025-08-22 13:15:51\"}', NULL, '2025-08-22 06:15:51', '2025-08-22 06:15:51'),
('e1482008-c1f4-422a-8e3d-bc47664c950d', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 2, '{\"model\":\"Pendampingan\",\"action\":\"diubah\",\"time\":\"2025-08-23 01:28:12\"}', NULL, '2025-08-22 18:28:12', '2025-08-22 18:28:12'),
('e3387e31-cf5c-420d-8175-9947018127a0', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 2, '{\"model\":\"Detail Jadwal\",\"action\":\"diubah\",\"time\":\"2025-08-24 15:35:47\"}', NULL, '2025-08-24 08:35:47', '2025-08-24 08:35:47'),
('e36456ca-91b1-4875-9391-27f1ecb70f59', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 1, '{\"model\":\"Konsultasi\",\"action\":\"diubah\",\"time\":\"2025-08-24 15:27:51\"}', NULL, '2025-08-24 08:27:51', '2025-08-24 08:27:51'),
('e45c62a4-12df-4090-91fb-f9a934b00d48', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 2, '{\"model\":\"Pendampingan\",\"action\":\"diubah\",\"time\":\"2025-08-24 15:30:46\"}', NULL, '2025-08-24 08:30:46', '2025-08-24 08:30:46'),
('ec4c68b9-438f-4549-8972-3c9f2c719cc3', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 3, '{\"model\":\"Konsultasi\",\"action\":\"diubah\",\"time\":\"2025-08-24 15:22:45\"}', NULL, '2025-08-24 08:22:45', '2025-08-24 08:22:45'),
('fd7697e1-14db-46c0-abb8-8c60abe4cb49', 'App\\Notifications\\DataChangedNotification', 'App\\Models\\Users', 1, '{\"model\":\"Konsultasi\",\"action\":\"ditambahkan\",\"time\":\"2025-08-22 09:45:30\"}', NULL, '2025-08-22 02:45:30', '2025-08-22 02:45:30');

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
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendampingan`
--

CREATE TABLE `pendampingan` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `judul_permohonan` varchar(255) NOT NULL,
  `kategori_masalah` varchar(255) NOT NULL,
  `detail_kasus` text NOT NULL,
  `lokasi_pendampingan` text NOT NULL,
  `tanggal_permintaan` date DEFAULT NULL,
  `urgensi` varchar(255) NOT NULL,
  `kontak_aktif` varchar(255) NOT NULL,
  `surat_panggilan_sidang` text DEFAULT NULL,
  `bukti_transaksi` text DEFAULT NULL,
  `akta` text DEFAULT NULL,
  `perjanjian` text DEFAULT NULL,
  `ktp` text DEFAULT NULL,
  `surat_kuasa` text DEFAULT NULL,
  `bukti_lainnya` text DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `catatan` text DEFAULT NULL,
  `dokumen_admin` text DEFAULT NULL,
  `notifikasi` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendampingan`
--

INSERT INTO `pendampingan` (`id`, `users_id`, `judul_permohonan`, `kategori_masalah`, `detail_kasus`, `lokasi_pendampingan`, `tanggal_permintaan`, `urgensi`, `kontak_aktif`, `surat_panggilan_sidang`, `bukti_transaksi`, `akta`, `perjanjian`, `ktp`, `surat_kuasa`, `bukti_lainnya`, `status`, `catatan`, `dokumen_admin`, `notifikasi`, `created_at`, `updated_at`) VALUES
(22, 1, 'Pendampingan Kasus Warisan', 'Hukum Keluarga', 'Rebutan Warisan', 'Pengadilan Agama Kota Cirebon', '2025-08-13', 'Sedang', '083846788549', '1755075314_ezot.pdf', '1755075314_Frame 5 (1).png', '1755075314_image 3.png', '1755075314_WhatsApp Image 2025-05-20 at 16.21.56_a8a72f8c.jpg', '1755075314_WhatsApp Image 2025-05-25 at 20.39.18_77456097.jpg', NULL, NULL, 2, 'Pengajuan anda diterima, silakan lengkapi dokumen yang saya lampirkan', '1755080560_SKD.docx', 3, '2025-08-13 08:55:14', '2025-08-24 08:32:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','users') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttl` date DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_profil` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `email_verified_at`, `password`, `role`, `no_tlp`, `ttl`, `jenis_kelamin`, `alamat`, `foto_profil`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Febby', 'Azis', 'febbyazis70', 'febbyazis70@gmail.com', NULL, '$2y$12$Yx3N1jQtk47c91LqJIXuDufpB5BXjPxZ4Vvucji4kYyXMaw6o/xOK', 'users', '083846788549', '2002-02-07', 'Laki-laki', 'Taman Kota Ciperna Blok G1 No 4', '1755410893_WhatsApp Image 2025-01-23 at 16.10.28_197709a0.jpg', 'djIAwJypt0kHFLPVGW5GsIoGrSOeC5qQ38jdQB3oQioJHwTf1TwpuT0n1IS2', '2025-07-28 16:03:58', '2025-08-27 03:13:24'),
(2, 'Eja1', 'Julpi1', 'admin1', 'admin1@gmail.com', NULL, '$2y$12$Oo9YIPlemrEErCPmByyr8evsmlfaKoWLUOjHOTuTdTJVtcNyyvW/u', 'admin', '083846788549', '2002-02-14', 'Laki-laki', 'Permata Harjamukti 3 D7 No 22, Kec. Harjamukti, Kel. Kalijaga, Kota Cirebon, Jawa Barat, Indonesia', '1755327658_WhatsApp Image 2025-02-15 at 12.12.54_4187e8f5.jpg', NULL, '2025-07-30 12:57:47', '2025-08-16 07:06:52'),
(3, 'Syahreza', 'Zulfii', 'ejaupi', 'ejaupi@gmail.com', NULL, '$2y$12$wuw6ykAWaJyhlBRZVa5ZJOpH8Ped1oNbKzfMasyWc/fpa9qpOQAue', 'admin', NULL, NULL, '', NULL, '', NULL, '2025-08-10 01:42:45', '2025-08-10 01:42:45'),
(4, 'saipul', 'jamil', 'saipuljamil', 'ipul@gmail.com', NULL, '$2y$12$2SHsVmT9EDS.XFDlFRqYjOR4mMQqgZdigZ2TzSCWAxoIpYUL9l/D6', 'users', NULL, NULL, '', NULL, '', NULL, '2025-08-12 12:13:34', '2025-08-12 12:13:34');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_jadwal`
--
ALTER TABLE `detail_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pendampingan`
--
ALTER TABLE `pendampingan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT untuk tabel `detail_jadwal`
--
ALTER TABLE `detail_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pendampingan`
--
ALTER TABLE `pendampingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
