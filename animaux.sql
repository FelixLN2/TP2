-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 10 nov. 2023 à 23:50
-- Version du serveur : 8.0.31
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `animaux`
--

-- --------------------------------------------------------

--
-- Structure de la table `animals`
--

CREATE TABLE `animals` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `genus_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `animals`
--

INSERT INTO `animals` (`id`, `nom`, `description`, `created_at`, `updated_at`, `genus_id`, `user_id`, `image`) VALUES
(7, 'testanimal', 'testanimal', '2023-11-09 04:14:07', '2023-11-09 04:14:07', 4, 23, NULL),
(12, 'testimage', 'gfrdfs', '2023-11-09 04:48:29', '2023-11-09 08:36:24', 4, 23, 'Capture d’écran (15).png'),
(13, 'testtt', 'testtt', '2023-11-09 08:37:32', '2023-11-09 08:37:32', 4, 23, 'Battlefield 4 Screenshot 2023.06.26 - 16.08.22.36.png');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `genera`
--

CREATE TABLE `genera` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `genera`
--

INSERT INTO `genera` (`id`, `nom`, `description`, `created_at`, `updated_at`, `user_id`) VALUES
(4, 'testgenus', 'testgenus', '2023-11-09 03:46:00', '2023-11-09 03:47:19', 23);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_23_171339_create_genera_table', 1),
(6, '2023_10_23_171400_create_animals_table', 1),
(7, '2023_10_28_222647_add_foreign_to_genera', 1),
(8, '2023_10_28_223233_add_foreign_to_animals', 1),
(9, '2023_11_08_231627_add_image_to_animals', 2);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Linnea Reichel DDS', 'fkeebler@example.net', '2023-11-05 23:54:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'edCqx3Frfy', '2023-11-05 23:54:12', '2023-11-05 23:54:12'),
(2, 'Carlotta Stoltenberg', 'zack27@example.org', '2023-11-05 23:54:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BiK8xngYA6', '2023-11-05 23:54:12', '2023-11-05 23:54:12'),
(3, 'Prof. Shanna Ortiz', 'cleora.fisher@example.net', '2023-11-05 23:54:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2OitsPBt2p', '2023-11-05 23:54:12', '2023-11-05 23:54:12'),
(4, 'Ilene Kiehn', 'vbergnaum@example.net', '2023-11-05 23:54:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'sivNs9Iflp', '2023-11-05 23:54:12', '2023-11-05 23:54:12'),
(5, 'Berry Farrell', 'vidal28@example.net', '2023-11-05 23:54:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '8DPUwxWdWA', '2023-11-05 23:54:12', '2023-11-05 23:54:12'),
(6, 'Mae McClure', 'ppaucek@example.net', '2023-11-05 23:54:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'c1SsG3kD6v', '2023-11-05 23:54:12', '2023-11-05 23:54:12'),
(7, 'Albina Fadel', 'sterling23@example.org', '2023-11-05 23:54:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'toULxnDDj4', '2023-11-05 23:54:12', '2023-11-05 23:54:12'),
(8, 'Tito Nikolaus', 'melvina.cartwright@example.net', '2023-11-05 23:54:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'kUz2dZFsbW', '2023-11-05 23:54:12', '2023-11-05 23:54:12'),
(9, 'Laurel Schmeler', 'emerald.boyer@example.com', '2023-11-05 23:54:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'tmzV9H6epb', '2023-11-05 23:54:12', '2023-11-05 23:54:12'),
(10, 'Avery Halvorson III', 'charlie21@example.net', '2023-11-05 23:54:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'jzGWwtOZbA', '2023-11-05 23:54:12', '2023-11-05 23:54:12'),
(12, 'Remington Turcotte', 'cristobal.kessler@example.com', '2023-11-06 00:10:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ak9ABrBxVn', '2023-11-06 00:10:53', '2023-11-06 00:10:53'),
(13, 'Yoshiko Wilderman', 'quincy63@example.com', '2023-11-06 00:10:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'SUAWqKDErA', '2023-11-06 00:10:53', '2023-11-06 00:10:53'),
(14, 'Lessie Little', 'yundt.edgardo@example.org', '2023-11-06 00:10:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ylx502bL6i', '2023-11-06 00:10:53', '2023-11-06 00:10:53'),
(15, 'Mary Mitchell', 'roob.brianne@example.com', '2023-11-06 00:10:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'P1adYO2hwo', '2023-11-06 00:10:53', '2023-11-06 00:10:53'),
(16, 'Dr. Willa Hessel', 'davion.lind@example.com', '2023-11-06 00:10:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hp99FyNrhc', '2023-11-06 00:10:53', '2023-11-06 00:10:53'),
(17, 'Dannie Bosco', 'mavis.mosciski@example.com', '2023-11-06 00:10:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'DykPH2zO4k', '2023-11-06 00:10:53', '2023-11-06 00:10:53'),
(18, 'Weldon Hane', 'upton.hallie@example.org', '2023-11-06 00:10:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'EhazEHXLl7', '2023-11-06 00:10:53', '2023-11-06 00:10:53'),
(19, 'Miss Jude Cronin V', 'ecremin@example.com', '2023-11-06 00:10:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Emp39K39YN', '2023-11-06 00:10:53', '2023-11-06 00:10:53'),
(20, 'Kallie Fahey', 'hills.giles@example.net', '2023-11-06 00:10:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'i10QdOC1k8', '2023-11-06 00:10:53', '2023-11-06 00:10:53'),
(21, 'Mrs. Carolina Bartell IV', 'ruben.douglas@example.net', '2023-11-06 00:10:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '4AZUCwprLW', '2023-11-06 00:10:53', '2023-11-06 00:10:53'),
(22, 'bob', 'bob@hotmail.com', NULL, '$2y$10$KxfK1bcVG4HKLKj0tLYmVOQjUDtt3HCLklVbJcL83KBeif4sfJEGC', NULL, '2023-11-06 00:11:12', '2023-11-06 00:11:12'),
(23, 'test', 'test@hotmail.com', '2023-11-06 00:12:19', '$2y$10$x2RHf2AhLoZZKFldQnoyv.midSB49rMiPAycqziq5EbPQl6KuckgK', NULL, '2023-11-06 00:12:13', '2023-11-06 00:12:19');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animals_genus_id_foreign` (`genus_id`),
  ADD KEY `animals_user_id_foreign` (`user_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `genera`
--
ALTER TABLE `genera`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genera_user_id_foreign` (`user_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `genera`
--
ALTER TABLE `genera`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_genus_id_foreign` FOREIGN KEY (`genus_id`) REFERENCES `genera` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `animals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `genera`
--
ALTER TABLE `genera`
  ADD CONSTRAINT `genera_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
