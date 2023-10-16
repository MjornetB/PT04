-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-10-2023 a las 13:01:20
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pt03_marc_jornet`
--
DROP DATABASE IF EXISTS pt03_Nom_Cognom;
CREATE DATABASE IF NOT EXISTS `pt03_marc_jornet` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pt03_marc_jornet`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articles`
--

INSERT INTO `articles` (`id`, `article`) VALUES
(1, 'Descubrimiento de exoplanetas mediante inteligencia artificial.'),
(2, 'Los beneficios de la meditación en la salud mental.'),
(3, 'Cómo la realidad virtual está transformando la educación.'),
(4, 'La importancia de la diversidad en el lugar de trabajo.'),
(5, 'Avances en la edición genética para tratar enfermedades.'),
(6, 'El impacto ambiental de la agricultura vertical.'),
(7, 'Nuevas terapias para la enfermedad de Alzheimer.'),
(8, 'La influencia de las redes sociales en la política.'),
(9, 'La neurociencia detrás de la toma de decisiones.'),
(10, 'La ciberseguridad en la era de la Internet de las cosas.'),
(11, 'La economía de las criptomonedas y el blockchain.'),
(12, 'Cómo la inteligencia artificial está revolucionando la atención médica.'),
(13, 'La conservación de la biodiversidad en peligro.'),
(14, 'El futuro de la movilidad eléctrica.'),
(15, 'El auge de la carne cultivada en laboratorio.'),
(16, 'Los desafíos éticos de la inteligencia artificial.'),
(17, 'La psicología de la felicidad y el bienestar.'),
(18, 'Innovaciones en la energía solar y eólica.'),
(19, 'La importancia de la educación STEM.'),
(20, 'Los efectos de la contaminación del aire en la salud.'),
(21, 'La conexión entre la dieta y la longevidad.'),
(22, 'La lucha contra la desinformación en línea.'),
(23, 'Nuevas terapias para el cáncer.'),
(24, 'La neuroplasticidad y la rehabilitación cerebral.'),
(25, 'Avances en la exploración espacial.'),
(26, 'La inteligencia artificial en la industria automotriz.'),
(27, 'La crisis global del agua y la sostenibilidad.'),
(28, 'El impacto de la inteligencia artificial en el arte.'),
(29, 'Los desafíos de la adopción de energía renovable.'),
(30, 'El microbioma intestinal y la salud digestiva.'),
(31, 'El futuro de la realidad aumentada en la medicina.'),
(32, 'La ética de la edición genética en humanos.'),
(33, 'La inteligencia artificial en la atención al cliente.'),
(34, 'La neurociencia del aprendizaje en línea.'),
(35, 'Avances en la impresión 3D de órganos humanos.'),
(36, 'Descubrimiento de exoplanetas mediante inteligencia artificial.La exploración de exoplanetas en busca de vida extraterrestre.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
