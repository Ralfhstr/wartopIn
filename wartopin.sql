-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Agu 2023 pada 11.07
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
-- Database: `wartopin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_15_000337_create_types_table', 1),
(6, '2023_07_15_000429_create_products_table', 1),
(7, '2023_07_14_235042_create_statuses_table', 2),
(8, '2023_07_14_235144_create_payments_table', 3),
(9, '2023_07_14_233950_create_transactions_table', 4),
(10, '2023_07_15_002341_add_level_column_into_users_table', 5),
(11, '2023_07_15_002341_add_column_into_users_table', 6),
(12, '2023_07_15_002341_add_column_into_products_table', 7),
(13, '2023_07_21_121610_add_filename_column_into_products_table', 8),
(14, '2023_07_21_121610_add_filename_column_into_transactions_table', 9),
(15, '2023_07_21_121610_add_filename_column_into_productss_table', 10),
(16, '2023_07_21_121610_add_filename_column_into_products_tables', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pyname` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `payments`
--

INSERT INTO `payments` (`id`, `pyname`, `created_at`, `updated_at`) VALUES
(1, 'QRIS', NULL, NULL),
(2, 'Cash', NULL, NULL);

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
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pname` varchar(255) NOT NULL,
  `pdesc` varchar(255) NOT NULL,
  `pphoto` varchar(255) NOT NULL,
  `pprice` int(11) NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `pname`, `pdesc`, `pphoto`, `pprice`, `type_id`, `created_at`, `updated_at`) VALUES
(7, 'Ayam Geprek', 'Nasi dengan Ayam Geprek', 'prek.jpg', 10000, 2, NULL, '2023-08-01 18:35:21'),
(8, 'Pop Ice', 'Aneka Rasa Pop Ice', 'pop.jpg', 4000, 2, NULL, NULL),
(9, 'Basreng', 'Basreng Pedas Manis', 'reng.jpg', 8000, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stname` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `statuses`
--

INSERT INTO `statuses` (`id`, `stname`, `created_at`, `updated_at`) VALUES
(1, 'On Process', NULL, NULL),
(2, 'Processed', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `tqty` varchar(255) NOT NULL,
  `tprice` int(11) NOT NULL,
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `product_id`, `tqty`, `tprice`, `payment_id`, `status_id`, `created_at`, `updated_at`) VALUES
(2, 1, 7, '20', 10000, 1, 1, NULL, NULL),
(3, 2, 7, '1', 10000, 2, 1, '2023-07-26 06:10:43', '2023-07-26 06:10:43'),
(4, 2, 8, '7', 28000, 1, 1, '2023-07-26 06:13:06', '2023-07-26 06:13:06'),
(5, 2, 8, '7', 28000, 2, 1, '2023-07-26 06:17:49', '2023-07-26 06:17:49'),
(6, 2, 8, '1', 4000, 2, 1, '2023-07-26 06:18:18', '2023-07-26 06:18:18'),
(7, 2, 8, '2', 8000, 2, 1, NULL, NULL),
(8, 2, 7, '2', 20000, 2, 1, NULL, NULL),
(9, 2, 9, '2', 16000, 2, 1, NULL, NULL),
(10, 2, 7, '2', 20000, 2, 1, NULL, NULL),
(11, 2, 7, '13', 10317, 2, 1, '2023-07-31 03:35:29', '2023-07-31 03:35:29'),
(12, 2, 7, '6', 13575, 1, 1, '2023-07-31 03:35:29', '2023-07-31 03:35:29'),
(13, 1, 8, '16', 18675, 2, 1, '2023-07-31 03:35:29', '2023-07-31 03:35:29'),
(14, 1, 8, '14', 19973, 2, 2, '2023-07-31 03:35:29', '2023-07-31 03:35:29'),
(15, 1, 9, '17', 12026, 1, 2, '2023-07-31 03:35:29', '2023-07-31 03:35:29'),
(16, 2, 7, '2', 20000, 2, 1, NULL, NULL),
(17, 2, 7, '2', 20000, 2, 1, NULL, NULL),
(18, 2, 9, '3', 24000, 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tyname` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `types`
--

INSERT INTO `types` (`id`, `tyname`, `created_at`, `updated_at`) VALUES
(1, 'makanan berat', NULL, NULL),
(2, 'minuman', NULL, NULL),
(3, 'makanan ringan', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `uphone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `level` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `uphone`, `email`, `email_verified_at`, `password`, `remember_token`, `level`, `created_at`, `updated_at`) VALUES
(1, 'admin', '08xx', 'admin@admin', NULL, '$2y$10$FEFbowRvpOJLlaqybmFRjegscYkqDMalXYqFyIrMfGDmngbfi3uBG', NULL, 'admin', NULL, NULL),
(2, 'user', '09xx', 'user@user', NULL, '$2y$10$jm4Emcgr5kHKPNRl.CyQ/uuxMYghHuUMEQ3cooNCAbmSHMnLdwsca', NULL, 'user', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_type_id_foreign` (`type_id`);

--
-- Indeks untuk tabel `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_product_id_foreign` (`product_id`),
  ADD KEY `transactions_payment_id_foreign` (`payment_id`),
  ADD KEY `transactions_status_id_foreign` (`status_id`);

--
-- Indeks untuk tabel `types`
--
ALTER TABLE `types`
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
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`),
  ADD CONSTRAINT `transactions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `transactions_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
