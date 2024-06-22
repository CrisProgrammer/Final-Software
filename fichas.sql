-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-06-2024 a las 04:44:45
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
-- Base de datos: `bd_fichas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichas`
--

CREATE TABLE `fichas` (
  `id` int(11) NOT NULL,
  `patientCI` varchar(15) DEFAULT NULL,
  `specialty` varchar(20) NOT NULL,
  `doctor` varchar(50) NOT NULL,
  `day` varchar(10) NOT NULL,
  `consultorio` varchar(20) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `turno` int(10) NOT NULL,
  `horaPresentacion` int(10) NOT NULL,
  `nroFicha` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fichas`
--

INSERT INTO `fichas` (`id`, `patientCI`, `specialty`, `doctor`, `day`, `consultorio`, `direccion`, `turno`, `horaPresentacion`, `nroFicha`) VALUES
(1, NULL, 'DERMATOLOGIA I', 'Dr. Saavedra Serrano Norma', '2024-06-22', '2', 'DTT0. 111 N 462 ESQ. LA PAZ', 0, 8, 2),
(2, NULL, 'DERMATOLOGIA I', 'Dr. Saavedra Serrano Norma', '2024-06-22', '2', 'DTT0. 111 N 462 ESQ. LA PAZ', 0, 8, 2),
(3, NULL, 'CIRUGIA I', 'Dr. Ortega Moises', '2024-06-08', '2', 'DTT0. 111 N 462 ESQ. LA PAZ', 0, 8, 1),
(4, '10409085', 'CIRUGIA I', 'Dr. Ortega Moises', '2024-06-08', '2', 'DTT0. 111 N 462 ESQ. LA PAZ', 0, 8, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `fichas`
--
ALTER TABLE `fichas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `fichas`
--
ALTER TABLE `fichas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
