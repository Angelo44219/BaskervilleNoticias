-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2024 a las 22:03:16
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `baskervillenoticias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Deportes'),
(2, 'Entretenimiento'),
(3, 'Tecnologia'),
(4, 'Economia'),
(5, 'Policial'),
(6, 'Política'),
(7, 'Clima'),
(8, 'Loteria'),
(9, 'El mundo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(6, '2024-04-29-221228', 'App\\Database\\Migrations\\AgregarColumnasNoticia', 'default', 'App', 1714602214, 2),
(8, '2024-05-01-222606', 'App\\Database\\Migrations\\ColumnasUsuario', 'default', 'App', 1714602751, 3),
(15, '2024-05-08-222816', 'App\\Database\\Migrations\\Roles', 'default', 'App', 1715709260, 4),
(16, '2024-05-14-174021', 'App\\Database\\Migrations\\ColumnasSeguimiento', 'default', 'App', 1715709563, 5),
(22, '2024-04-28-020850', 'App\\Database\\Migrations\\Seguimiento', 'default', 'App', 1715739515, 6),
(36, '2024-05-15-022825', 'App\\Database\\Migrations\\ColumnasSeguimiento', 'default', 'App', 1715890704, 7),
(37, '2024-05-16-201758', 'App\\Database\\Migrations\\ColumnasNoticia', 'default', 'App', 1715890704, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `editor_id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `noticia_activa` int(11) DEFAULT NULL,
  `estado` enum('rechazada','correccion','borrador','finalizada','publicada','validar','editada') NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `fecha_publicacion` datetime DEFAULT NULL,
  `fecha_expiracion` datetime DEFAULT NULL,
  `motivo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `editor_id`, `titulo`, `descripcion`, `fecha`, `noticia_activa`, `estado`, `categoria_id`, `imagen`, `fecha_publicacion`, `fecha_expiracion`, `motivo`) VALUES
(26, 4, 'informe 12', 'ssdsds', '2024-05-15 11:12:05', 1, 'borrador', 3, '1715782326_8d09716a058a19aac42c.jpg', NULL, NULL, NULL),
(28, 4, 'Asesinato hacia dos niños con un hacha', 'ha ocurrido un grave asesinato en la calle Bachman road en el que se encontraron dos niños inocentes con un hacha , luego de unos dias se encontro y arresto al asesino cuyo nombre se le conoce como \"Walter sullivan\".', '2024-05-15 12:56:42', 1, 'borrador', 5, '', NULL, NULL, NULL),
(29, 4, 'Danza Floral', 'El 20 de mayo alas 15:30 hs se realizara el evento de la Danza floral en el pueblo pelicano.', '2024-05-16 17:24:15', 1, 'publicada', 2, '', '2024-05-17 04:07:29', '2024-05-22 04:07:29', NULL),
(30, 4, 'sds', 'sdsd', '2024-05-15 13:04:45', 0, 'borrador', 4, '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `seguimiento` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_noticia` int(12) NOT NULL,
  `id_usuario` int(12) NOT NULL,
  `titulo_seg` varchar(255) NOT NULL,
  `descripcion_seg` varchar(255) NOT NULL,
  `imagen_seg` varchar(255) NOT NULL,
  `activo_seg` int(11) NOT NULL,
  `estado_seg` enum('rechazada','correccion','borrador','finalizada','publicada') NOT NULL,
  `id_categoria_seg` int(11) NOT NULL,
  `fecha_modificacion` datetime NOT NULL DEFAULT current_timestamp(),
  `usuario_modificacion` varchar(255) DEFAULT NULL,
  `tipo_modificacion` enum('creacion','edicion','descarte') NOT NULL,
  `revertido` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `seguimiento`
--

INSERT INTO `seguimiento` (`id`, `id_noticia`, `id_usuario`, `titulo_seg`, `descripcion_seg`, `imagen_seg`, `activo_seg`, `estado_seg`, `id_categoria_seg`, `fecha_modificacion`, `usuario_modificacion`, `tipo_modificacion`, `revertido`) VALUES
(3, 26, 4, 'informe 12', 'ssdsds', '', 1, 'borrador', 3, '2024-05-15 11:12:05', NULL, 'creacion', 0),
(5, 28, 4, 'Asesinato hacia dos niños con un hacha', 'ha ocurrido un grave asesinato en la calle Bachman road en el que se encontraron dos niños inocentes con un hacha , luego de unos dias se encontro y arresto al asesino cuyo nombre se le conoce como \"Walter sullivan\".', '', 1, 'borrador', 5, '2024-05-15 12:56:42', NULL, 'creacion', 0),
(6, 29, 4, '222', '222', '', 1, 'borrador', 2, '2024-05-15 12:58:28', NULL, 'creacion', 0),
(7, 30, 4, 'sds', 'sdsd', '', 0, 'borrador', 4, '2024-05-15 13:04:45', NULL, 'creacion', 0),
(30, 29, 4, 'Danza Floral', 'El 20 de mayo alas 15:30 hs se realizara el evento de la Danza floral en el pueblo pelicano.', '1715871886_84eac2df97cce708f270.jpg', 1, 'borrador', 2, '2024-05-16 12:09:05', NULL, 'creacion', 0),
(31, 29, 4, 'Danza Floral', 'El 20 de mayo alas 15:30 hs se realizara el evento de la Danza floral en el pueblo pelicano.', '', 1, '', 2, '2024-05-16 12:09:05', NULL, 'creacion', 0),
(34, 29, 4, 'Danza Floral', 'El 20 de mayo alas 15:30 hs se realizara el evento de la Danza floral en el pueblo pelicano.', '', 1, '', 2, '2024-05-17 04:07:29', '4', 'creacion', 0),
(35, 29, 4, 'Danza Floral', 'El 20 de mayo alas 15:30 hs se realizara el evento de la Danza floral en el pueblo pelicano.', '', 1, 'publicada', 2, '2024-05-17 04:07:30', 'Farolito44', 'edicion', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(12) NOT NULL,
  `nombre_completo` varchar(255) NOT NULL,
  `foto_perfil` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rol` enum('Editor','Validador','Ambos') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `nombre_completo`, `foto_perfil`, `password`, `email`, `rol`) VALUES
(4, 'Luna20', 'Luna Honeymoon', NULL, '$2y$10$yw/hVj4gYXV/9kVkmSJD0.eMDwVbpkvAGxfwKpwwDiK1l/SJ6OWzC', 'SalvatoreHoneymoon32@gmail.com', 'Editor'),
(5, 'Angelo44', 'Angelo Whitedemon', NULL, 'Angelo29', 'AngeloWhitelust@gmail.com', 'Editor'),
(6, 'Jacob8', 'Jacob Crhisfallen', NULL, 'jacob20', 'JacobCris23@gmail.com', 'Validador'),
(7, 'Dave18', 'Dave Mustaine', NULL, '$2y$10$wfVMI.6iEX.pwawCNFj6uOZ6GIHI9JbGn.vMNYEEVFSBVsjO4vWe6', 'DaveMegadeth18@gmail.com', 'Ambos'),
(8, 'Farolito44', 'Juan carlos', NULL, '$2y$10$6t939o8qwBCPyjslKCNxz.s5YuxrQZOUOBSGjxFRCDa9OBxhX3SwO', 'Farolito@gmail.com', 'Validador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`),
  ADD KEY `id_editor` (`editor_id`) USING BTREE;

--
-- Indices de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`) USING BTREE,
  ADD KEY `seguimiento_id_categoria_seg_foreign` (`id_categoria_seg`),
  ADD KEY `id_noticia` (`id_noticia`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `noticias_ibfk_2` FOREIGN KEY (`editor_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD CONSTRAINT `seguimiento_id_categoria_seg_foreign` FOREIGN KEY (`id_categoria_seg`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `seguimiento_id_noticia_foreign` FOREIGN KEY (`id_noticia`) REFERENCES `noticias` (`id`),
  ADD CONSTRAINT `seguimiento_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
