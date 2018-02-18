-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-02-2018 a las 09:22:34
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `express_srl`
--
CREATE DATABASE IF NOT EXISTS `express_srl` DEFAULT CHARACTER SET utf16 COLLATE utf16_general_ci;
USE `express_srl`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `iso_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Volcado de datos para la tabla `countries`
--

INSERT INTO `countries` (`id`, `name`, `iso_code`) VALUES
(42, 'Argentina', 'ARG'),
(43, 'Brazil', 'BRA'),
(44, 'Cayman Islands', 'CYM'),
(49, 'Chile', 'CHL'),
(93, 'Colombia', 'COL'),
(94, 'Dominica', 'DMA'),
(95, 'Grenada', 'GRD'),
(96, 'Jamaica', 'JAM'),
(97, 'Montserrat', 'MSR'),
(98, 'Saint Lucia', 'LCA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operators`
--

DROP TABLE IF EXISTS `operators`;
CREATE TABLE `operators` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `external_id` int(11) NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Volcado de datos para la tabla `operators`
--

INSERT INTO `operators` (`id`, `name`, `external_id`, `country_id`) VALUES
(2, 'Claro', 10, 42),
(3, 'Claro', 29, 43),
(4, 'Digicel', 44, 44),
(5, 'Claro', 48, 49),
(6, 'Claro', 49, 93),
(7, 'Lime', 66, 94),
(8, 'Lime', 94, 95),
(9, 'Lime', 137, 96),
(10, 'Lime', 158, 97),
(11, 'Lime', 250, 98);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `indx_country_unique` (`iso_code`);

--
-- Indices de la tabla `operators`
--
ALTER TABLE `operators`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cities_country` (`country_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de la tabla `operators`
--
ALTER TABLE `operators`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `operators`
--
ALTER TABLE `operators`
  ADD CONSTRAINT `fk_cities_country` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
