-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 18-02-2025 a las 13:23:42
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_pedidos`
--

CREATE TABLE `linea_pedidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pedido_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_producto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_producto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio_unidad` double(8,2) NOT NULL,
  `cantidad_producto` int(11) NOT NULL,
  `precio_total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `linea_pedidos`
--

INSERT INTO `linea_pedidos` (`id`, `pedido_id`, `id_producto`, `nombre_producto`, `precio_unidad`, `cantidad_producto`, `precio_total`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 'camiseta', 25.00, 3, 75.00, '2025-02-18 11:11:45', '2025-02-18 11:11:45'),
(2, '2', '1', 'camiseta', 25.00, 1, 25.00, '2025-02-18 11:12:26', '2025-02-18 11:12:26'),
(3, '3', '1', 'camiseta', 25.00, 10, 250.00, '2025-02-18 11:16:23', '2025-02-18 11:16:23'),
(4, '4', '1', 'camiseta', 25.00, 10, 250.00, '2025-02-18 11:16:24', '2025-02-18 11:16:24');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2025_02_07_105209_create_productos_table', 1),
(4, '2025_02_17_092120_create_pedidos_table', 1),
(5, '2025_02_17_093332_create_linea_pedidos_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `name`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', '1', '2025-02-18 11:11:45', '2025-02-18 11:11:45'),
(2, 'Administrador', '1', '2025-02-18 11:12:26', '2025-02-18 11:12:26'),
(3, 'Administrador', '1', '2025-02-18 11:16:23', '2025-02-18 11:16:23'),
(4, 'Administrador', '1', '2025-02-18 11:16:24', '2025-02-18 11:16:24');

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
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` double(8,2) NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `imagen`, `created_at`, `updated_at`) VALUES
(1, 'camiseta', 25.00, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcQRQ7K-zLg7j_u5c-cFUZOtykuAWEW0iLpuyBCQFy6a7qJsKZheFWrgwxyp_Al7IJrCdIuuHiwCGkoxjWfKxu8FXa8PQGPXWAcgKRnRf23vOqFJ7Gj3fK9JRzYeZ4FBlGG2M_RajMf0&usqp=CAc', '2025-02-18 10:40:48', '2025-02-18 10:40:48'),
(2, 'chaqueta', 50.00, 'https://aurelien-online.com/cdn/shop/files/Aurelien_Cashmere_Puffer_Jacket_AUR1_wool_men_bomber_caramel2.jpg', '2025-02-18 10:40:48', '2025-02-18 10:40:48'),
(3, 'pantalon', 20.00, 'https://mivestidorazul.es/15639-large_default/pantalon-mujer-vistructia-beige.jpg', '2025-02-18 10:40:48', '2025-02-18 10:40:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `rol`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'ana@gmail.com', '$2y$10$ph5C67YrZ/6h4xW9gdbkNexRfnic/6bkfWoBA8rVUL52/JShvof.m', 'admin', '2025-02-18 10:40:48', '2025-02-18 10:40:48'),
(2, 'Lane Kessler', 'lolita17@example.net', '$2y$10$MWGDe4u2COaTfwn0xchQ8e9bNtJtDE9dFIVQ2JELaU9Axbw51YPPC', 'usuario', '2025-02-18 10:40:48', '2025-02-18 10:40:48'),
(3, 'Dr. Walker Howe I', 'medhurst.brenda@example.net', '$2y$10$3SjcXWbU.Mn7oA1oeb3ldehcC/Qeh.LqSLB6mEQ.2DCXnm8CGIuwe', 'usuario', '2025-02-18 10:40:48', '2025-02-18 10:40:48'),
(4, 'Tyson Murazik', 'gabriel.rau@example.net', '$2y$10$.0o46IJN9WlyrGvD5bfajeOaT0oP7DGRl0mNTBAoapH.pxgWWm4Dq', 'usuario', '2025-02-18 10:40:48', '2025-02-18 10:40:48'),
(5, 'Mr. Matteo Shanahan', 'mac.reinger@example.org', '$2y$10$VwDOtuHTYKXx37mZUmRCk.KbYgMpSg2SdRzoeNRjiuFWkgGddD2gS', 'usuario', '2025-02-18 10:40:48', '2025-02-18 10:40:48'),
(6, 'Carmen Mitchell II', 'jayde.harris@example.com', '$2y$10$c9pSKAEhMVVBXGUneSEMNOh6bqTEt2uXr/QOCI7SLej8e17jkDmTK', 'usuario', '2025-02-18 10:40:48', '2025-02-18 10:40:48');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `linea_pedidos`
--
ALTER TABLE `linea_pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `linea_pedidos`
--
ALTER TABLE `linea_pedidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
