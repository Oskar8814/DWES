-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-02-2025 a las 22:08:17
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
CREATE DATABASE IF NOT EXISTS `avionesAPI` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `avionesAPI`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avion`
--

CREATE TABLE `avion` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(155) NOT NULL,
  `precio` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `avion`
--

INSERT INTO `avion` (`codigo`, `nombre`, `precio`, `imagen`) VALUES
(1, 'Supermarine Spitfire', 320, 'spitfire.jpg'),
(2, 'P-51 Mustang', 300, 'p51mustang.jpg'),
(3, 'Messerschmitt Bf 109', 290, 'bf109.jpg'),
(4, 'Suisei', 280, 'suisei.jpg'),
(5, 'BoeingB17', 255, 'BoeingB17.jpg'),
(6, 'Nakajima B5N', 175, 'kate.jpg'),
(7, 'Lisunov Li-2', 225, 'lusinov.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `nombre` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `peticiones` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`nombre`, `token`, `peticiones`, `id`) VALUES
('Alfredo', 'aB3cDe7fGh9iJk1Lm5', 1, 1),
('Antonio', 'Xy8zAw2bVc4uTr6sQp0', 4, 2),
('Maria', 'Mn1bVf3gCx5jKl7qRs9', 0, 3),
('Laura', 'Po6iUh2jGy8tRe4wQz0', 0, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `avion`
--
ALTER TABLE `avion`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `avion`
--
ALTER TABLE `avion`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
