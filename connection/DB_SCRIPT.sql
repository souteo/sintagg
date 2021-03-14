-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-03-2021 a las 20:48:58
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sintagg`
--
CREATE DATABASE IF NOT EXISTS `sintagg` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sintagg`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

DROP TABLE IF EXISTS `colores`;
CREATE TABLE IF NOT EXISTS `colores` (
  `id_color` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_color` varchar(60) NOT NULL,
  PRIMARY KEY (`id_color`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- RELACIONES PARA LA TABLA `colores`:
--

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` VALUES
(1, 'Verde brillante'),
(2, 'Verde oscuro'),
(7, 'Negro'),
(8, 'Blanco'),
(9, 'Azul cielo'),
(10, 'Azul oscuro'),
(11, 'Purpura'),
(12, 'Violeta'),
(13, 'Rojo fuerte'),
(14, 'Naranja'),
(15, 'Punzo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diseños`
--

DROP TABLE IF EXISTS `diseños`;
CREATE TABLE IF NOT EXISTS `diseños` (
  `id_diseño` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_diseño` varchar(60) NOT NULL,
  `descripción_diseño` text NOT NULL,
  `imagen_diseño` varchar(400) NOT NULL,
  PRIMARY KEY (`id_diseño`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- RELACIONES PARA LA TABLA `diseños`:
--

--
-- Volcado de datos para la tabla `diseños`
--

INSERT INTO `diseños` VALUES
(1, 'Stripes 3 colores', 'Lineas intercaladas horizontales de 3 colores', ''),
(2, 'Circulos 2 colores', '3 circulos envolventes de colores distintos', ''),
(3, 'Espiral 2 colores', 'Remera con forma de remolino de 4 colores', ''),
(4, 'Nubes 2 colores', 'Remera de 2 colores difusos con aspecto humo.', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remeras`
--

DROP TABLE IF EXISTS `remeras`;
CREATE TABLE IF NOT EXISTS `remeras` (
  `id_remera` int(11) NOT NULL AUTO_INCREMENT,
  `diseño_remera` int(11) NOT NULL,
  `manga_larga` tinyint(1) NOT NULL,
  `precio_remera` decimal(10,0) DEFAULT NULL,
  `stock_remeras` int(11) NOT NULL,
  `talle_remera` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_remera`),
  KEY `diseño_remera` (`diseño_remera`),
  KEY `talle_remera` (`talle_remera`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- RELACIONES PARA LA TABLA `remeras`:
--   `diseño_remera`
--       `diseños` -> `id_diseño`
--   `talle_remera`
--       `talles` -> `id_talles`
--

--
-- Volcado de datos para la tabla `remeras`
--

INSERT INTO `remeras` VALUES
(1, 1, 1, '800', 0, 1),
(3, 2, 0, '700', 0, 3),
(4, 3, 1, '800', 0, 1),
(5, 1, 0, '700', 0, 1),
(6, 1, 0, '700', 0, 6),
(7, 3, 1, '800', 0, 4),
(8, 2, 0, '700', 0, 3),
(9, 1, 1, '800', 0, 1),
(10, 4, 1, '800', 0, 3),
(11, 1, 0, '700', 0, 5),
(12, 4, 1, '800', 0, 6),
(13, 1, 0, '700', 0, 2);

--
-- Disparadores `remeras`
--
DROP TRIGGER IF EXISTS `configurar_precio`;
DELIMITER $$
CREATE TRIGGER `configurar_precio` BEFORE INSERT ON `remeras` FOR EACH ROW BEGIN
      IF (NEW.manga_larga = 1) THEN
            SET NEW.precio_remera = 800;
      ELSE
            SET NEW.precio_remera = 700;
      END IF;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remeras_colores`
--

DROP TABLE IF EXISTS `remeras_colores`;
CREATE TABLE IF NOT EXISTS `remeras_colores` (
  `id_remeras_colores` int(11) NOT NULL AUTO_INCREMENT,
  `id_remera` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  PRIMARY KEY (`id_remeras_colores`),
  KEY `id_remera` (`id_remera`),
  KEY `id_color` (`id_color`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4;

--
-- RELACIONES PARA LA TABLA `remeras_colores`:
--   `id_color`
--       `colores` -> `id_color`
--   `id_remera`
--       `remeras` -> `id_remera`
--

--
-- Volcado de datos para la tabla `remeras_colores`
--

INSERT INTO `remeras_colores` VALUES
(1, 1, 10),
(2, 1, 9),
(3, 1, 8),
(4, 3, 7),
(5, 3, 11),
(6, 4, 13),
(7, 6, 15),
(8, 6, 8),
(9, 4, 1),
(10, 7, 12),
(11, 7, 7),
(12, 6, 13),
(13, 5, 14),
(14, 5, 15),
(15, 5, 13),
(16, 9, 8),
(17, 9, 12),
(18, 9, 14),
(25, 8, 9),
(26, 8, 12),
(27, 10, 2),
(28, 10, 11),
(33, 11, 13),
(34, 11, 9),
(35, 11, 1),
(36, 12, 8),
(37, 12, 7),
(38, 13, 8),
(39, 13, 2),
(40, 13, 11),
(43, 10, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talles`
--

DROP TABLE IF EXISTS `talles`;
CREATE TABLE IF NOT EXISTS `talles` (
  `id_talles` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_talles` varchar(10) NOT NULL,
  PRIMARY KEY (`id_talles`),
  UNIQUE KEY `nombre_talles` (`nombre_talles`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- RELACIONES PARA LA TABLA `talles`:
--

--
-- Volcado de datos para la tabla `talles`
--

INSERT INTO `talles` VALUES
(4, 'L'),
(3, 'M'),
(2, 'S'),
(5, 'XL'),
(1, 'XS'),
(6, 'XXL'),
(7, 'XXXL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `nombre_tipo_usuario` varchar(40) NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`),
  UNIQUE KEY `nombre_tipo_usuario` (`nombre_tipo_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONES PARA LA TABLA `tipo_usuario`:
--

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` VALUES
(0, 'Cliente'),
(1, 'Empleado'),
(2, 'Supervisor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(50) NOT NULL,
  `contraseña_usuario` varchar(100) NOT NULL,
  `mail_usuario` varchar(70) NOT NULL,
  `numero_usuario` varchar(45) NOT NULL,
  `tipo_usuario` int(11) NOT NULL,
  `fechaNac_usuario` date DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `nombre_usuario` (`nombre_usuario`),
  KEY `tipo_usuario` (`tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- RELACIONES PARA LA TABLA `usuarios`:
--   `tipo_usuario`
--       `tipo_usuario` -> `id_tipo_usuario`
--

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` VALUES
(6, 'papoo', '$2y$13$x4v0Yanyp1N5lPlR0AHQOuaPO1I7q9N25tRtaMqtB/5HyVPa16drS', 'papoopap@gmail.com', '1535354362', 0, NULL),
(7, 'teo', '$2y$13$Us6dy9lW7M1y4ZdTskO1DuO9Lo226RE2OXyZmVbXkNKRlG.qCUIHC', 'teoteo@gmail.com', '1141433513', 2, NULL),
(8, 'sabrina', '$2y$13$k8sfemB75ZGVWJZdq9pQdOBL2bmEIEdeh8kcoGxvMRFTQ2E7OYQ5e', 'sabri@gmail.com', '1553343', 1, NULL),
(9, 'cafu', '$2y$13$S3wtIzCghMkPVS9Y1spNJuNWN6fiXvSSp7f5h0d20QJlSzPSooNum', 'cafu1978@gmail.com', '', 0, NULL),
(15, 'mariacasañas@gmail.com', '$2y$13$eat05DOHgY/r/KbnQRIJTOaqcgJwHDCTvnlj0I4qUWKxAGfLDMUpy', 'mariacasañas@gmail.com', '', 0, '2021-02-10');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `remeras`
--
ALTER TABLE `remeras`
  ADD CONSTRAINT `remeras_ibfk_1` FOREIGN KEY (`diseño_remera`) REFERENCES `diseños` (`id_diseño`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `remeras_ibfk_2` FOREIGN KEY (`talle_remera`) REFERENCES `talles` (`id_talles`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `remeras_colores`
--
ALTER TABLE `remeras_colores`
  ADD CONSTRAINT `color_remerascolores` FOREIGN KEY (`id_color`) REFERENCES `colores` (`id_color`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `remera_remerascolores` FOREIGN KEY (`id_remera`) REFERENCES `remeras` (`id_remera`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `tipo_usuario` FOREIGN KEY (`tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
