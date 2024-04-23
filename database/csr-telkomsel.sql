-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Apr 2024 pada 04.40
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
-- Database: `csr-telkomsel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `keloladata`
--

CREATE TABLE `keloladata` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_location_csr` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `hostname` varchar(255) NOT NULL,
  `ssd` varchar(255) NOT NULL,
  `winver` varchar(255) NOT NULL,
  `processor` varchar(255) NOT NULL,
  `antivirus` varchar(255) NOT NULL,
  `ram` enum('4 GB','8 GB','16 GB') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keloladata`
--

INSERT INTO `keloladata` (`id`, `id_admin`, `id_location_csr`, `nama`, `jabatan`, `type`, `hostname`, `ssd`, `winver`, `processor`, `antivirus`, `ram`, `created_at`, `updated_at`) VALUES
(1, 1, '2', 'Sandi', 'CEO', 'ROG', '123', '128', 'Ntah lah', 'core i7', 'smadav', '16 GB', '2024-04-21 22:57:31', '2024-04-21 23:03:35'),
(2, 1, '2', 'adas', 'adas', 'ada', 'adas', 'ada', 'ada', 'asdas', 'ada', '8 GB', '2024-04-21 23:43:04', '2024-04-21 23:43:04'),
(3, 1, '1', 'adas', 'adasda', 'adas', 'adas', 'ada', 'adas', 'ada', 'adad', '4 GB', '2024-04-21 23:43:19', '2024-04-21 23:43:19'),
(4, 1, '1', 'Andri Nofiar Am', 'adas', 'adas', 'adas', 'dada', 'asda', 'adas', 'adas', '8 GB', '2024-04-21 23:43:32', '2024-04-21 23:43:32'),
(5, 1, '1', 'Sadasda', 'asda', 'adas', 'dasdas', 'dasdasd', 'ada', 'asda', 'adas', '16 GB', '2024-04-21 23:43:44', '2024-04-21 23:43:44'),
(6, 1, '3', 'sdasdas', 'asdas', 'ada', 'ada', 'asda', 'ada', 'ada', 'ada', '4 GB', '2024-04-21 23:50:05', '2024-04-21 23:50:05'),
(7, 1, '4', 'adasda', 'adas', 'asdas', 'ada', 'adas', 'asdas', 'asda', 'asdas', '8 GB', '2024-04-21 23:50:21', '2024-04-21 23:50:21'),
(8, 1, '5', 'adasd', 'asdas', 'adas', 'adas', 'dasd', 'dasd', 'adasd', 'asdas', '16 GB', '2024-04-21 23:50:34', '2024-04-21 23:50:34'),
(9, 1, '5', 'asdas', 'adas', 'asda', 'ada', 'asd', 'sdasd', 'adas', 'adas', '8 GB', '2024-04-21 23:50:46', '2024-04-21 23:50:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `location_csr`
--

CREATE TABLE `location_csr` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `location_csr`
--

INSERT INTO `location_csr` (`id`, `lokasi`, `created_at`, `updated_at`) VALUES
(1, 'Grapari Pekanbaru', '2024-04-21 22:39:56', '2024-04-21 22:39:56'),
(2, 'Grapari Mall Grand Batam', '2024-04-21 22:40:54', '2024-04-21 22:40:54'),
(3, 'Grapari Tanjung Pinang', '2024-04-21 22:41:09', '2024-04-21 22:41:09'),
(4, 'Grapari Dumai', '2024-04-21 22:41:19', '2024-04-21 22:41:19'),
(5, 'Grapari Batam Center', '2024-04-21 22:41:32', '2024-04-21 22:41:32'),
(6, 'Grapari Padang', '2024-04-21 22:41:45', '2024-04-21 22:41:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2024_04_02_125028_users', 1),
(12, '2024_04_02_125032_roles', 1),
(13, '2024_04_05_034748_keloladata', 1),
(14, '2024_04_22_050918_location_csr', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Viewer', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_role` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `id_role`, `name`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 'Rizky Firmansyah', 'Rizky Admin', '$2y$12$eZ33O7iq55mgvDS/IxkIaOH21RudfEqMznscbwUU77IcVMtetHWLe', NULL, NULL),
(2, 2, 'Rizky Viewer', 'Rizky Viewer', '$2y$10$6ynJBQs5X2Ogz.kHOR/3vuko8.GCl.BtPC0L4AbQ/F9vldhH42akm', '2024-04-21 23:04:19', '2024-04-21 23:04:19');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `keloladata`
--
ALTER TABLE `keloladata`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `location_csr`
--
ALTER TABLE `location_csr`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `keloladata`
--
ALTER TABLE `keloladata`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `location_csr`
--
ALTER TABLE `location_csr`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
