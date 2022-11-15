-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2022 a las 20:41:04
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_torneos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arbitros`
--

CREATE TABLE `arbitros` (
  `id` int(11) NOT NULL,
  `foto` longblob NOT NULL,
  `arbitro` varchar(100) NOT NULL,
  `residencia` varchar(80) NOT NULL,
  `id_asociacion_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `arbitros`
--

INSERT INTO `arbitros` (`id`, `foto`, `arbitro`, `residencia`, `id_asociacion_fk`) VALUES
(60, '', 'Da Silva Nicolas', 'Mar del Plata', 44),
(61, '', 'Barbas Diego', 'Tandil', 43),
(62, '', 'Grill Fernando', 'Mar del Plata', 44),
(64, '', 'Valusek Ezequiel', 'Henderson', 54),
(65, '', 'Del Ruiz Hernan', 'Bahia Blanca', 48),
(66, '', 'Canale Basilio', 'Bahia Blanca', 48),
(69, '', 'Escriba Bab Martin', 'Tandil', 43),
(73, '', 'Rolando Gaston', 'Tandil', 43),
(74, '', 'Giannini Lorena', 'Tandil', 43),
(75, '', 'Forment Magali', 'Bahia Blanca', 48),
(76, '', 'Cavallero Araceli', 'Buenos Aires', 44),
(84, '', 'prueba para practicar', 'desconocida', 50),
(85, '', 'prueba 2', 'Disney', 50),
(87, '', 'prueba 2 millones', 'La selva', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asociaciones`
--

CREATE TABLE `asociaciones` (
  `id_asociacion` int(11) NOT NULL,
  `logo` tinyblob NOT NULL,
  `asociacion` varchar(80) NOT NULL,
  `region` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asociaciones`
--

INSERT INTO `asociaciones` (`id_asociacion`, `logo`, `asociacion`, `region`) VALUES
(43, '', 'Federacion Tandilense', 'Bonaerense'),
(44, '', 'Asociacion Marplatense', 'Bonaerense'),
(48, '', 'Asociacion Bahiense', 'Bonaerense'),
(49, '', 'Asociacion Cuenca del Salado', 'Bonaerense'),
(50, '', 'Asociacion del Oeste de Bs. As.', 'Bonaerense'),
(51, '', 'Asociacion Noroeste', 'Bonaerense'),
(52, '', 'Asociacion Reg. Tresarroyense', 'Bonaerense'),
(54, '', 'Federacion del Centro de Bs. As.', 'Bonaerense'),
(55, '', 'Federacion del Sudoeste', 'Bonaerense');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '$2a$12$P5nSystZwOAietrgsVrCF.sEbPCHG/EyFUujmoxGDyxjJPgy8DNnO'),
(2, 'martinescribabab@gmail.com', '$2a$12$8V95Q/p.cx8i8k8coS877.vHzDMa2YnGw.Fnm/ANsRkMFgYFF9WZm');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `arbitros`
--
ALTER TABLE `arbitros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_asociacion` (`id_asociacion_fk`);

--
-- Indices de la tabla `asociaciones`
--
ALTER TABLE `asociaciones`
  ADD PRIMARY KEY (`id_asociacion`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `arbitros`
--
ALTER TABLE `arbitros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de la tabla `asociaciones`
--
ALTER TABLE `asociaciones`
  MODIFY `id_asociacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `arbitros`
--
ALTER TABLE `arbitros`
  ADD CONSTRAINT `arbitros_ibfk_1` FOREIGN KEY (`id_asociacion_fk`) REFERENCES `asociaciones` (`id_asociacion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
