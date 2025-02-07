-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-01-2025 a las 16:04:33
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aviones`
--
CREATE DATABASE IF NOT EXISTS `aviones` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `aviones`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `precio` int(11) NOT NULL,
  `imagen` varchar(55) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `imagen`, `descripcion`) VALUES
(1, 'Supermarine Spitfire', 300, 'img/spitfire.jpg', 'El Supermarine Spitfire fue un caza monoplaza británico usado por la Royal Air Force (RAF) y muchos otros países Aliados durante la Segunda Guerra Mundial. <br> El Spitfire fue diseñado por R. J. Mitchell, diseñador jefe de Supermarine Aviation Works(subsidiaria de Vickers-Armstrong desde 1928), como un interceptor de alto rendimiento y corto alcance.'),
(2, 'P-51 Mustang', 320, 'img/p51mustang.jpg', 'El North American P-51 Mustang fue un caza y caza de escolta monomotor estadounidense de largo alcance,utilizado por las Fuerzas Aéreas del Ejército de los Estados Unidos (USAAF) durante la Segunda Guerra Mundial y la Guerra de Corea, entre otros conflictos.El Mustang fue diseñado en 1940 por North American Aviation (NAA) en respuesta a un requerimiento de la Comisión de Adquisiciones del Reino Unido'),
(3, 'Messerschmitt Bf 109', 290, 'img/bf109.jpg', 'El Messerschmitt Bf 109 fue un avión de caza alemán de la Segunda Guerra Mundial, diseñado por un equipo al mando de Wilhelm Willy Emil Messerschmitt a principios de los años 30, cuando era diseñador jefe de la Bayerische Flugzeugwerke(de ahí que su prefijo sea Bf). Fue uno de los primeros cazas realmente modernos de la época,incluyendo características tales como una construcción monocasco totalmente metálica, carlinga cerrada y tren de aterrizaje retráctil. '),
(4, 'Suisei', 310, 'img/suisei.jpg', ' El D4Y fue uno de los bombarderos en picado más veloces utilizados durante la II Guerra Mundial. A pesar de su uso limitado, su velocidad y autonomía lo hizo eficaz en misiones de reconocimiento así como en ataques kamikaze. ');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
