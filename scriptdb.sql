-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-02-2022 a las 17:47:31
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laravel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centres`
--

CREATE TABLE `centres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `centres`
--

INSERT INTO `centres` (`id`, `name`, `city`, `created_at`, `updated_at`) VALUES
(1, 'MEDAC Escritora', 'Córdoba', NULL, NULL),
(2, 'MEDAC Arena', 'Córdoba', NULL, NULL),
(3, 'MEDAC Arena', 'Córdoba', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `checks`
--

CREATE TABLE `checks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `entry_time` datetime NOT NULL,
  `exit_time` datetime NOT NULL,
  `centres_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `checks`
--

INSERT INTO `checks` (`id`, `user_id`, `entry_time`, `exit_time`, `centres_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-02-16 16:20:00', '2022-02-16 16:20:00', 1, '2022-02-16 14:20:59', '2022-02-16 14:20:59'),
(2, 1, '2022-02-16 16:26:00', '2022-02-16 16:26:00', 1, '2022-02-16 14:27:08', '2022-02-16 14:27:08'),
(3, 1, '2022-02-16 16:31:00', '2022-02-16 16:31:00', 1, '2022-02-16 14:31:29', '2022-02-16 14:31:29'),
(5, 1, '2022-02-16 16:31:00', '2022-02-16 16:31:00', 1, '2022-02-16 14:33:09', '2022-02-16 14:33:09'),
(6, 1, '2022-02-16 16:34:00', '2022-02-16 16:34:00', 1, '2022-02-16 14:34:26', '2022-02-16 14:34:26'),
(8, 1, '2022-02-16 16:34:00', '2022-02-16 16:34:00', 1, '2022-02-16 14:34:50', '2022-02-16 14:34:50'),
(9, 1, '2022-02-16 16:35:00', '2022-02-16 16:35:00', 1, '2022-02-16 14:35:13', '2022-02-16 14:35:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2021_12_09_150529_centres_table', 1),
(3, '2021_12_10_165460_users_table', 1),
(4, '2021_12_13_151817_checks_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
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
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dni` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `dni`, `email`, `password`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, '48726698W', 'a@gmail.com', '$2y$10$UX4GJPiWeBsi9XuE6w5Uputv37kNtGot6GxHIOQ4womx.1w8gV.JW', 0, '2022-02-16 14:19:51', '2022-02-16 14:19:51'),
(2, '123123123', 'b@gmail.com', '$2y$10$e2lB9QQu2koIyMG5U.jal.gLm7ugMR4CN0xr2aoAMnT4BC4XUEVfG', 0, '2022-02-16 15:46:37', '2022-02-16 15:46:37');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `centres`
--
ALTER TABLE `centres`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `checks`
--
ALTER TABLE `checks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checks_user_id_foreign` (`user_id`),
  ADD KEY `checks_centres_id_foreign` (`centres_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `centres`
--
ALTER TABLE `centres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `checks`
--
ALTER TABLE `checks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `checks`
--
ALTER TABLE `checks`
  ADD CONSTRAINT `checks_centres_id_foreign` FOREIGN KEY (`centres_id`) REFERENCES `centres` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `checks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
