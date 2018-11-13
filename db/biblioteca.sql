-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 12-04-2018 a las 04:54:50
-- Versión del servidor: 10.2.14-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo` tinyint(1) NOT NULL DEFAULT 0,
  `fecha_nacimiento` date DEFAULT NULL,
  `localidad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `municipio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `nombre`, `apellidos`, `sexo`, `fecha_nacimiento`, `localidad`, `municipio`, `direccion`, `cp`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Vanessa', 'Martinez', 1, NULL, NULL, NULL, NULL, NULL, 'vanessa@admin.com', '$2y$10$3ObxOwP.m/kphZFho5ERouQzB1nZKLJYH2SvnITeTb9k4TqRu.v6G', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bibliotecas`
--

DROP TABLE IF EXISTS `bibliotecas`;
CREATE TABLE IF NOT EXISTS `bibliotecas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `localidad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bibliotecas`
--

INSERT INTO `bibliotecas` (`id`, `nombre`, `descripcion`, `localidad`, `direccion`, `cp`, `telefono`, `created_at`, `updated_at`) VALUES
(1, 'Biblioteca 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Biblioteca 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

DROP TABLE IF EXISTS `compras`;
CREATE TABLE IF NOT EXISTS `compras` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `total` double(8,2) NOT NULL,
  `observaciones` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biblioteca_id` int(10) UNSIGNED NOT NULL,
  `proveedor_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `compras_biblioteca_id_foreign` (`biblioteca_id`),
  KEY `compras_proveedor_id_foreign` (`proveedor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `total`, `observaciones`, `biblioteca_id`, `proveedor_id`, `created_at`, `updated_at`) VALUES
(3, 12038.00, 'esta es una prueba', 2, 1, '2018-04-11 15:51:29', '2018-04-11 15:51:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editoriales`
--

DROP TABLE IF EXISTS `editoriales`;
CREATE TABLE IF NOT EXISTS `editoriales` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `editoriales`
--

INSERT INTO `editoriales` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Reynal & Hitchcock (EUA)', '2018-04-11 12:50:11', '2018-04-11 12:50:11'),
(3, 'Éditions Gallimard (Francia)', '2018-04-11 12:53:22', '2018-04-11 12:53:22'),
(4, 'George Allen & Unwin', '2018-04-11 13:41:28', '2018-04-11 13:41:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

DROP TABLE IF EXISTS `empleados`;
CREATE TABLE IF NOT EXISTS `empleados` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo` tinyint(1) NOT NULL DEFAULT 0,
  `fecha_nacimiento` date DEFAULT NULL,
  `localidad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `municipio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `biblioteca_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `empleados_biblioteca_id_foreign` (`biblioteca_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventarios`
--

DROP TABLE IF EXISTS `inventarios`;
CREATE TABLE IF NOT EXISTS `inventarios` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `biblioteca_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inventarios_biblioteca_id_foreign` (`biblioteca_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inventarios`
--

INSERT INTO `inventarios` (`id`, `biblioteca_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-04-11 12:27:33', '2018-04-11 12:27:33'),
(2, 2, '2018-04-11 12:30:50', '2018-04-11 12:30:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

DROP TABLE IF EXISTS `libros`;
CREATE TABLE IF NOT EXISTS `libros` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `autor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isbn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paginas` int(11) NOT NULL,
  `existencia` int(11) NOT NULL,
  `editorial_id` int(10) UNSIGNED NOT NULL,
  `inventario_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `libros_editorial_id_foreign` (`editorial_id`),
  KEY `libros_inventario_id_foreign` (`inventario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `titulo`, `autor`, `isbn`, `paginas`, `existencia`, `editorial_id`, `inventario_id`, `created_at`, `updated_at`) VALUES
(2, 'El principito', 'Antoine de Saint-Exupery', '54-464-64456-45645-6', 3143, 23, 1, 1, '2018-04-11 13:28:47', '2018-04-11 16:04:37'),
(3, 'El señor de los anillos', 'Luis Domènech', '0423-435-3445-345-345-3', 1368, 2, 4, 2, '2018-04-11 13:43:01', '2018-04-12 06:21:12'),
(4, 'Harry Potter y la piedra filosofal', 'Thomas Taylor', '2434-23243-423-24-3', 223, 1, 3, 2, '2018-04-11 14:31:42', '2018-04-11 14:31:42'),
(5, 'Bases de Datos', 'Marqués, Mercedes Universitat Jaume I', '978-84-693-0146-3', 320, 5, 1, 2, '2018-04-12 06:26:43', '2018-04-12 06:26:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_prestamo`
--

DROP TABLE IF EXISTS `libro_prestamo`;
CREATE TABLE IF NOT EXISTS `libro_prestamo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libro_id` int(11) NOT NULL,
  `prestamo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_04_11_024610_create_bibliotecas_table', 1),
(4, '2018_04_11_024610_create_inventarios_table', 1),
(5, '2018_04_11_024617_create_empleados_table', 1),
(6, '2018_04_11_024618_create_admins_table', 1),
(7, '2018_04_11_024619_create_proveedores_table', 1),
(8, '2018_04_11_024620_create_compras_table', 1),
(9, '2018_04_11_024719_create_editoriales_table', 1),
(10, '2018_04_11_024745_create_libros_table', 1),
(11, '2018_04_11_024805_create_prestamos_table', 1),
(12, '2018_04_11_024806_create_devoluciones_table', 1),
(13, '2018_04_11_030706_create_libro_prestamo_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

DROP TABLE IF EXISTS `prestamos`;
CREATE TABLE IF NOT EXISTS `prestamos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nota` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `fecha_devolucion` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prestamos_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE IF NOT EXISTS `proveedores` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagina_web` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `direccion`, `telefono`, `pagina_web`, `created_at`, `updated_at`) VALUES
(1, 'Imagina Libros', 'Calle, Sebastián Lerdo de Tejada Pte. 101. Colonia, Centro.', '234423', 'www.imaginalibros.com', '2018-04-11 11:51:02', '2018-04-12 07:37:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo` tinyint(1) NOT NULL DEFAULT 0,
  `fecha_nacimiento` date DEFAULT NULL,
  `localidad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `municipio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellidos`, `sexo`, `fecha_nacimiento`, `localidad`, `municipio`, `direccion`, `cp`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ivan', 'Sauza', 0, NULL, 'Toluca', 'Toluca', 'Priv. Pedro Cortez 305', 50050, 'sauuza@gmail.com', '$2y$10$n3WSkQLCu7G467VuEnIKT.OkVILZ5wAC78/LtTegMlVhmzyJ.9DQi', 'WRVMw63ts6WupzYW6Gcf4i6wTeLsPMVjSZTaYqCgpbiqjCOeNL0EWJohjD04', '2018-04-11 14:12:49', '2018-04-11 14:12:49'),
(2, 'Juan', 'Zarza', 1, NULL, NULL, NULL, NULL, NULL, 'ejemplo@ejemplo.com', '$2y$10$RYADmNE7.XwVEiJ66NBl8O997eRQODuAnpZUvnz4Yn1AztoeCCfsy', NULL, '2018-04-11 14:53:48', '2018-04-11 14:53:48'),
(3, 'Carlos', 'Alberto Lara', 0, NULL, NULL, NULL, NULL, NULL, 'carlos@outlook.com', '$2y$10$Obqkqvvd0hccwRlM1PkpfOX0x8UuH7zSafyJi3Y7B6IBJ0pqtfQM2', 'Qn6wmNPN3so8tgF7p1beKOQbeMxBpHexMbsBHrXPmbPGkNUGUnfcVknizn57', '2018-04-11 15:36:03', '2018-04-11 15:36:03');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_biblioteca_id_foreign` FOREIGN KEY (`biblioteca_id`) REFERENCES `bibliotecas` (`id`),
  ADD CONSTRAINT `compras_proveedor_id_foreign` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedores` (`id`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_biblioteca_id_foreign` FOREIGN KEY (`biblioteca_id`) REFERENCES `bibliotecas` (`id`);

--
-- Filtros para la tabla `inventarios`
--
ALTER TABLE `inventarios`
  ADD CONSTRAINT `inventarios_biblioteca_id_foreign` FOREIGN KEY (`biblioteca_id`) REFERENCES `bibliotecas` (`id`);

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_editorial_id_foreign` FOREIGN KEY (`editorial_id`) REFERENCES `editoriales` (`id`),
  ADD CONSTRAINT `libros_inventario_id_foreign` FOREIGN KEY (`inventario_id`) REFERENCES `inventarios` (`id`);

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `prestamos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
