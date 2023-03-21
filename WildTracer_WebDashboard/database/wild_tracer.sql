-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2022 at 08:53 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wild_tracer`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scientific_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `average_lifespan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `name`, `scientific_name`, `average_lifespan`, `created_at`, `updated_at`) VALUES
(1, 'Dog', 'Canis lupus familiaris', '10 – 13 years', '2021-10-09 03:59:12', '2021-10-09 04:13:59'),
(2, 'Cat', 'Felis catus', '2 – 16 years', '2021-10-09 04:06:22', '2021-10-09 04:06:22'),
(4, 'Hawk', 'Buteo', '20 years', '2021-11-04 22:40:13', '2022-06-21 12:09:28'),
(6, 'White-tailed Eagle', 'Haliaeetus albicilla', '14 to 20 years', '2022-06-21 12:09:50', '2022-06-21 12:09:50'),
(7, 'Fox', 'Vulpes vulpes', '3 to 4 years', '2022-06-21 12:10:08', '2022-06-21 12:10:08'),
(8, 'Lizard', 'Lacertilia', '5 years', '2022-06-21 12:10:28', '2022-06-21 12:10:28');

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
-- Table structure for table `instances`
--

CREATE TABLE `instances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gps_latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gps_longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `animal_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instances`
--

INSERT INTO `instances` (`id`, `file`, `file_size`, `gps_latitude`, `gps_longitude`, `animal_type`, `location`, `route`, `month`, `year`, `submitted_by`, `mobile`, `created_at`, `updated_at`) VALUES
(4, '7305', '6419', '13.823332', '155.82193', 'Hawk', 'Dhaka', NULL, 'May', '2020', 'Marley Daniel', '+1 (682) 657-8528', '2021-09-23 23:28:42', '2021-09-23 23:28:42'),
(5, '274', '8791', '55.237652', '76.525366', 'Fox', 'Sylhet', NULL, 'March', '2020', 'Lizeth Adams', '917-701-6999', '2021-09-23 23:28:42', '2021-09-23 23:28:42'),
(6, '515280635', '8288', '-53.721405', '84.361207', 'White-tailed Eagle', 'Khulna', NULL, 'May', '2021', 'Libbie Lakin', '+1 (260) 599-8805', '2021-09-23 23:28:42', '2021-09-23 23:28:42'),
(7, '3542369', '7253', '-62.822382', '58.587562', 'Tiger', 'Bogra', NULL, 'January', '2019', 'Joe Jones', '973.523.0765', '2021-09-23 23:28:42', '2021-09-23 23:28:42'),
(8, '15588479', '4767', '52.372425', '108.820669', 'Hawk', 'Sylhet', NULL, 'April', '2016', 'Miss Nelda Schowalter', '224.453.3925', '2021-09-23 23:28:42', '2021-09-23 23:28:42'),
(9, '77043', '7920', '4.462523', '-122.375037', 'Cat', 'Chittagong ', NULL, 'January', '2019', 'Prof. Angeline Kuphal', '(351) 683-7406', '2021-09-23 23:28:42', '2021-09-23 23:28:42'),
(10, '60798507', '6971', '-20.788301', '-50.92323', 'Dog', 'Chittagong', NULL, 'March', '2018', 'Wiley Medhurst', '+1.203.396.6774', '2021-09-23 23:28:42', '2021-09-23 23:28:42'),
(11, NULL, NULL, NULL, NULL, 'Hawk', 'Bogura', 'Route B', 'May', '2021', 'Ruman', '01772772334', '2022-06-21 11:34:49', '2022-06-21 11:34:49'),
(12, NULL, NULL, NULL, NULL, 'Hawk', 'Bogura', NULL, 'May', '2022', 'Sharif', '01772772334', '2022-06-21 12:06:21', '2022-06-21 12:06:21');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', NULL, '2022-05-17 14:39:04'),
(3, 'Chittagong', NULL, NULL),
(4, 'Khulna', NULL, NULL),
(7, 'Bogura', '2022-03-05 05:20:56', '2022-03-05 05:20:56'),
(8, 'Sylhet', '2022-06-21 12:09:05', '2022-06-21 12:09:05');

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
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(13, '2021_09_17_073730_create_roles_table', 1),
(14, '2021_09_17_073942_create_role_user_table', 1),
(15, '2021_09_24_041148_create_instances_table', 2),
(16, '2021_10_09_062539_create_animals_table', 3),
(17, '2021_10_09_063551_create_locations_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ruman@example.com', '$2y$10$yy6X.nLRIPyinTuuvz955uRfwaBYBpK1576LErs1u//NyTMJ8Y7DS', '2021-09-17 22:40:46'),
('sur@gmail.com', '$2y$10$uX7ptrBoVNB479S63hDvZOBKlmVd2XKB1PUyhcXmjdESL4TdILq5W', '2021-09-23 11:06:11'),
('sharif@gmail.com', '$2y$10$pGvNbp2nUbzomPcEkTnx5.HYmF381KM1whSdGD9W29Al1Z2TzAYUa', '2021-09-23 11:16:44'),
('abc123@gmail.com', '$2y$10$n4lC1MAXhCzIcaHzJ3wvnOdW5iQ5qG.qqgoxhcV1p33XlMUKj8KO6', '2021-09-23 11:19:21'),
('ruman123456@gmail.com', '$2y$10$tFcOaYDxgCNnlUz/rguQT.ravXSso.ICqzjVuQfqEu01b0z0ed1wq', '2021-11-04 03:06:05'),
('jordy420@example.com', '$2y$10$OVmptx86mNN20wq16gZdiu2DLbWpOQkj84j9gjYpwn07CU69j6fvW', '2021-11-04 22:48:27'),
('sara@gmail.com', '$2y$10$QYE5FPPabOPNbMV2mAOi7eV8mB.UJfsQQ97Nb5xtitGOlZzWP7oje', '2021-11-05 01:22:15'),
('jordy412@example.com', '$2y$10$eR.6RPvVQZkOjyzvj7k4MuuBRaw/kZNqsDtCRDHmhZAG4X9zSIwn6', '2021-11-05 01:29:07'),
('sara123@gmail.com', '$2y$10$Gzt8FR2vySMnxGg7RrrrX.FzD97cN6TAZNz./LC1eVQNP6C5y4Xfq', '2021-11-05 01:30:50'),
('karim@gmail.com', '$2y$10$Rv49jqLdeXu7k8/U67A1aeadqVupaHuH51Y6zKFAESd6fc3PcgCju', '2022-06-21 09:00:29'),
('rahim@gmail.com', '$2y$10$rwYDvW8czh2oA4cQBhAnBOu0Cb47g6INKgne4jY7Qh1Mafj5alaRq', '2022-06-21 12:13:51'),
('jky@gmail.com', '$2y$10$t11nHIWcWNw2A/OrgMsjiuIPb6uns.kpjGG5NGEujxvDOefSG4O02', '2022-06-21 12:17:45');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'admin', '2021-09-17 21:57:01', '2021-09-17 21:57:01'),
(3, 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(38, 2, 57, NULL, NULL),
(48, 3, 70, NULL, NULL),
(49, 3, 71, NULL, NULL),
(50, 2, 72, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `name`) VALUES
(1, 'Bogra - Sariakandi Rd'),
(2, 'Uposhohor Rd'),
(5, 'Gohail Road'),
(6, 'Matidali - Dhorompur Road'),
(7, 'Chondon - Baisha Rd');

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
  `phone_number` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone_number`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`) VALUES
(57, 'Md Sharif Uddin Ruman', 'sharif.ruman.1996@gmail.com', '2022-02-28 23:07:29', '$2y$10$nqJdiehQyKg8OpKXDGe6Oe6OANSMsNzlOOzuLzFsyZexRglG1YZOO', '01772772334', NULL, NULL, 'Dy7tFiHYcQcecnU25uleWEA9ZdgCv3QeIpTVCSPu6ImDxetgfKz4VpJO4QBv', '2022-02-28 23:06:33', '2022-02-28 23:07:29'),
(69, 'Sharif Uddin', 'ruman789@gmail.com', '2022-06-21 04:12:50', '$2y$10$Wl5kTC2OHKYDmkd9rlSQSOAlb1qPQDHRDKrHudxwYP9sBL4RQnxkS', '01772772334', NULL, NULL, 'VWqR5TyanBwFQ7sJszr9R7XOMWs4HvDYZe5EzWnLlyxqoxLpH6t1Ewd5lDOv', '2022-06-21 04:06:31', '2022-06-21 12:16:44'),
(70, 'Karim', 'karim@gmail.com', '2022-06-21 12:14:54', '$2y$10$2taOiVxMBWCVYmCBtIxdZOm7CHrtGFLuWu/ar7yt9XfYhzP8dX0dO', '01772772334', NULL, NULL, '7kgTspqfIjgRwh2x8gvfuWHJfBbDgxJ9hw08bL222gk1mrZPZTIx8qChg0vt', '2022-06-21 09:00:29', '2022-06-21 12:14:54'),
(71, 'Rahim', 'rahim@gmail.com', '2022-06-21 12:16:03', '$2y$10$ZJf4LE9D72meV.HDOOXQfu4veK6hxAWpPgITmepHgCVY/vmwlBVSe', '01772772334', NULL, NULL, 'clLKnj99g4Vi9c07nKqZkU45otXCeAybgEFgtjxR3fKQZXmwYSflL6c3EJ6q', '2022-06-21 12:13:51', '2022-06-21 12:16:03'),
(72, 'Jakariya Sir', 'jky@gmail.com', '2022-06-21 12:18:16', '$2y$10$DV822rEjXGZUvQhyfQ6dE.5D4gqQsT6yCZDS.z3PcgaT1zN2bmR22', '01772772334', NULL, NULL, 'nNX3N9kxoMjH0Q1qUuLzo44Ecp36Y11Y0W5UJlxBl8H8LeF4swBfWHDbeO9N', '2022-06-21 12:17:45', '2022-06-21 12:18:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `instances`
--
ALTER TABLE `instances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instances`
--
ALTER TABLE `instances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
