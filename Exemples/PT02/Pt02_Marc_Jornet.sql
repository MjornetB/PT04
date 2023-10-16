-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2023 a las 19:36:32
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
-- Base de datos: `pt02_marc_jornet`
--
DROP DATABASE IF EXISTS `Pt02_marc_jornet`;
CREATE DATABASE IF NOT EXISTS `Pt02_marc_jornet`;
USE `Pt02_marc_jornet`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuaris`
--

DROP TABLE IF EXISTS `usuaris`;
CREATE TABLE IF NOT EXISTS `usuaris` (
  `dni` varchar(9) NOT NULL,
  `nom` text NOT NULL,
  `adreca` text NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuaris`
--

INSERT INTO `usuaris` (`dni`, `nom`, `adreca`) VALUES
('11111111A', 'Marco', 'C/ Vila madrid'),
('22222222B', 'Benita', 'C/Vila Barcelona'),
('33333333C', 'Davido', 'C/ Vila Palafolls'),
('44444444D', 'Alexandra', 'C/ Vila Tordera'),
('55555555E', 'Angela', 'C/ Vila Calella'),
('66666666F', 'Marco', 'C/ Vila madrid'),
('77777777G', 'Victoria', 'C/ Vila India');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
