-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2022 at 03:11 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antrian_obat3`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nip` bigint(20) NOT NULL,
  `doctor_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `user_id`, `nip`, `doctor_name`, `gender`, `phone_number`, `address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 123456789987, 'Dr. Rahmita', 'P', '085267257475', 'Jalan Halmahera No.32A', '2022-12-13 00:43:40', '2022-12-13 00:43:40', NULL),
(2, 5, 123456789534, 'Dr. Silvia R', 'P', '085267257475', 'Jalan Unib Belakang', '2022-12-13 00:44:01', '2022-12-13 00:44:01', NULL),
(3, 6, 1234567899534, 'Dr. Dania', 'L', '085267257475', 'Lingkar Timur', '2022-12-13 00:44:26', '2022-12-13 00:44:26', NULL),
(4, 7, 65, 'Rhea Luna', 'L', '085267257475', 'Accusantium quia dui', '2022-12-20 08:43:04', '2022-12-20 08:43:04', NULL),
(5, 8, 10, 'Lacota Whitak', 'L', '085267257475', 'Obcaecati dolor fuga', '2022-12-20 09:07:51', '2022-12-20 09:08:13', '2022-12-20 09:08:13'),
(6, 9, 35, 'adam', 'P', '085267257475', 'Quidem cupiditate an', '2022-12-20 09:08:27', '2022-12-20 09:08:27', NULL),
(7, 10, 88, 'Felicia Franklin', 'P', '085267257475', 'Et earum aute sed su', '2022-12-20 09:33:51', '2022-12-20 09:33:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_17_142525_add_role_to_users_table', 1),
(6, '2022_09_18_185737_create_doctors_table', 1),
(7, '2022_09_18_191439_create_polies_table', 1),
(8, '2022_09_26_022858_create_patients_table', 1),
(9, '2022_10_08_235229_create_jobs_table', 1),
(10, '2022_11_14_102140_create_regist_patients_table', 1),
(11, '2022_11_15_093129_add_no_bpjs_column_to_patients_table', 1),
(12, '2022_12_13_050349_add_soft_delete_column_to_polies_table', 1),
(13, '2022_12_13_053222_add_soft_delete_column_to_doctors_table', 1),
(14, '2022_12_13_054120_add_soft_delete_column_to_patients_table', 1),
(15, '2022_12_19_101644_add_no_antrian_obat_column_to_patients_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_poly` bigint(20) UNSIGNED NOT NULL,
  `no_queue` int(11) NOT NULL,
  `no_bpjs` bigint(20) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `code_map` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symptom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipe` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `no_antrian_obat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `id_poly`, `no_queue`, `no_bpjs`, `name`, `address`, `gender`, `age`, `code_map`, `symptom`, `recipe`, `status`, `created_at`, `updated_at`, `deleted_at`, `no_antrian_obat`) VALUES
(59, 1, 1, 67123456789, 'Jena Olsen', 'Necessitatibus omnis', 'P', 16, 'Adipisci necessitati', 'At est temporibus i', 'resep2', 'batal', '2022-12-20 08:20:17', '2022-12-20 09:32:42', NULL, '2'),
(60, 1, 2, 14123456789, 'Gabriel Espinoza', 'Dolorum illo consequ', 'L', 38, 'Labore illum fugit', 'Autem sint cumque i', NULL, 'belum', '2022-12-20 08:20:29', '2022-12-20 09:06:48', NULL, '3'),
(61, 2, 3, 37123456789, 'Sigourney Odom', 'Rerum vel laudantium', 'P', 75, 'Dolores sunt dolor i', 'Omnis esse duis cup', 'resep 1', 'selesai', '2022-12-20 08:20:41', '2022-12-20 09:32:05', NULL, '1'),
(62, 2, 4, 87123456789, 'Clark Park', 'Voluptatem ut ipsum', 'P', 40, 'Eveniet proident i', 'Eligendi adipisicing', 'resep 3', 'selesai', '2022-12-20 08:20:57', '2022-12-20 09:33:11', NULL, '3'),
(63, 3, 5, 66123456789, 'Deborah Holman', 'Et aliquip eum verit', 'L', 5, 'Aut quod incidunt n', 'Repellendus Eos ne', NULL, 'belum', '2022-12-20 08:21:10', '2022-12-20 08:21:10', NULL, NULL),
(64, 1, 6, 31234567891, 'Rahmita Dwi Kurnia', 'Halmahera 2', 'P', 23, '12.B', 'demam tinggi', NULL, 'belum', '2022-12-20 08:28:10', '2022-12-20 08:28:10', NULL, NULL),
(65, 1, 7, 12345678975, 'Rahmita Dwi Kurnia', 'halmahera 32', 'P', 23, '12.A', 'demam tinggi', NULL, 'belum', '2022-12-20 08:35:48', '2022-12-20 08:36:19', '2022-12-20 08:36:19', NULL),
(66, 2, 7, 31234567892, 'Rahmita Dwi Kurnia', 'Halmahera 2', 'P', 23, '12.A', 'demam tinggi', NULL, 'belum', '2022-12-20 08:55:13', '2022-12-20 08:55:53', '2022-12-20 08:55:53', NULL),
(67, 2, 7, 31234567823, 'Rahmita Dwi Kurnia', 'Halmahera 2', 'P', 34, '12.A', 'demam tinggi', NULL, 'belum', '2022-12-20 09:01:40', '2022-12-20 09:02:16', '2022-12-20 09:02:16', NULL),
(68, 2, 7, 31234567892, 'Rahmita Dwi Kurnia', 'Halmahera 1', 'P', 23, '12.A', 'demam tinggi', NULL, 'belum', '2022-12-20 09:27:20', '2022-12-20 09:28:00', '2022-12-20 09:28:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `polies`
--

CREATE TABLE `polies` (
  `id_poly` bigint(20) UNSIGNED NOT NULL,
  `id_doctor` bigint(20) UNSIGNED NOT NULL,
  `poly_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `polies`
--

INSERT INTO `polies` (`id_poly`, `id_doctor`, `poly_name`, `doctor_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Poli Anak', '1', '2022-12-13 00:44:32', '2022-12-13 00:44:32', NULL),
(2, 2, 'Poli Umum', '2', '2022-12-13 00:44:37', '2022-12-13 00:44:37', NULL),
(3, 3, 'Poli Gizi', '3', '2022-12-13 00:44:41', '2022-12-13 00:44:41', NULL),
(4, 4, 'Poli Ibu Hamil', '4', '2022-12-20 08:43:45', '2022-12-20 08:43:45', NULL),
(5, 6, 'Poli KIA', '6', '2022-12-20 09:09:11', '2022-12-20 09:09:11', NULL),
(6, 7, 'poli abc', '7', '2022-12-20 09:34:35', '2022-12-20 09:34:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'dokter',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$Cxfafw9L2r9wU8u4jcXv.udwcGCHaQd5JLZV0B2h2TdEDhOgSP912', 'admin', NULL, NULL, NULL),
(2, 'Customer-Service', 'cs@gmail.com', NULL, '$2y$10$Cxfafw9L2r9wU8u4jcXv.udwcGCHaQd5JLZV0B2h2TdEDhOgSP912', 'cs', NULL, NULL, NULL),
(3, 'Apoteker', 'apoteker@gmail.com', NULL, '$2y$10$Cxfafw9L2r9wU8u4jcXv.udwcGCHaQd5JLZV0B2h2TdEDhOgSP912', 'apoteker', NULL, NULL, NULL),
(4, 'Dr. Rahmita', 'rahmitadwi18@gmail.com', NULL, '$2y$10$UYI5X9.FwI5mNPuNYCcdJ.0DKrf/bV74i2itHPmtFMRgrBLDDDBIW', 'dokter', 'U6cCOpueeR0sZhGeXXGutB49eKLXEOM0uTssuoeUdFp2AWQ4C68MyMeEHtSV', '2022-12-13 00:43:40', '2022-12-20 09:35:39'),
(5, 'Dr. Silvia R', 'Silvia@gmail.com', NULL, '$2y$10$MwPe9twF9KoMOS87XbR59.ttA/9g/j8gd.AFrmqWer6oWySKOneaC', 'dokter', NULL, '2022-12-13 00:44:01', '2022-12-13 00:44:01'),
(6, 'Dr. Dania', 'Dania@gmail.com', NULL, '$2y$10$Tfcm7zRHYSr2K3abH9DN5OGiIDvK.AGNrbbkpQj1MwEhnFIvRvqAa', 'dokter', NULL, '2022-12-13 00:44:26', '2022-12-13 00:44:26'),
(7, 'Rhea Luna', 'duso@mailinator.com', NULL, '$2y$10$z3y95FjIzYvkOPKjdCwKOOEO7bUO55wNYLpHY3gnaEq48r3EmQXXC', 'dokter', NULL, '2022-12-20 08:43:04', '2022-12-20 08:43:04'),
(8, 'Lacota Whitaker', 'fuwizecub@mailinator.com', NULL, '$2y$10$HVH5syvUTA00omVB1aIkAeiHbEMhfFDCtXHicu42xixuCeOhjUbZi', 'dokter', NULL, '2022-12-20 09:07:51', '2022-12-20 09:07:51'),
(9, 'adam', 'jilixicu@mailinator.com', NULL, '$2y$10$pxrKn4drlkmucvVr6pnbPe50TkCiSgj4IgrgOGmJYXJay/OvQ6Qi.', 'dokter', NULL, '2022-12-20 09:08:27', '2022-12-20 09:08:27'),
(10, 'Felicia Franklin', 'xywyhetyx@mailinator.com', NULL, '$2y$10$ryC/wimuuUZk5y/CBBnOJ.B2N1LXmpiow/7RZdRoATH11l7weNcnS', 'dokter', NULL, '2022-12-20 09:33:51', '2022-12-20 09:33:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctors_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patients_id_poly_foreign` (`id_poly`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `polies`
--
ALTER TABLE `polies`
  ADD PRIMARY KEY (`id_poly`),
  ADD KEY `polies_id_doctor_foreign` (`id_doctor`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `polies`
--
ALTER TABLE `polies`
  MODIFY `id_poly` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_id_poly_foreign` FOREIGN KEY (`id_poly`) REFERENCES `polies` (`id_poly`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `polies`
--
ALTER TABLE `polies`
  ADD CONSTRAINT `polies_id_doctor_foreign` FOREIGN KEY (`id_doctor`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
