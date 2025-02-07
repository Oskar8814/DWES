-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-01-2025 a las 22:15:22
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
-- Base de datos: `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf16 COLLATE utf16_spanish_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `codigo` int(11) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `fecha` DATETIME NOT NULL,
  `contenido` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
INSERT INTO `articulo` (codigo, titulo, fecha, contenido)
VALUES
  (1, 'El futuro de la inteligencia artificial', '2023-11-23', 'Un análisis profundo sobre las últimas tendencias en IA y su impacto en la sociedad.'),
  (2, 'Cómo crear una aplicación móvil desde cero', '2024-02-15', 'Una guía paso a paso para desarrolladores principiantes.'),
  (3, 'Los beneficios de la alimentación saludable', '2023-09-08', 'Descubre cómo una dieta equilibrada puede mejorar tu calidad de vida.'),
  (4, 'El cambio climático: causas y consecuencias', '2023-12-01', 'Un informe sobre las causas del calentamiento global y sus efectos en el planeta.'),
  (5, 'Reseña del último libro de Stephen King', '2024-01-10', 'Una opinión sobre la nueva novela de terror del famoso escritor.'),
  (6, 'Los mejores destinos turísticos para el verano', '2023-05-15', 'Descubre los lugares más increíbles para disfrutar de tus vacaciones.'),
  (7, 'Cómo aprender un nuevo idioma rápidamente', '2024-03-05', 'Consejos y trucos para dominar un idioma extranjero.'),
  (8, 'La importancia del ejercicio físico para la salud', '2023-10-20', 'Un estudio sobre los beneficios de hacer deporte regularmente.'),
  (9, 'Las últimas noticias sobre la exploración espacial', '2024-04-01', 'Descubre los avances más recientes en la conquista del espacio.'),
  (10, 'Recetas saludables y deliciosas para toda la familia', '2023-08-15', 'Una colección de platos nutritivos y fáciles de preparar.');
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
