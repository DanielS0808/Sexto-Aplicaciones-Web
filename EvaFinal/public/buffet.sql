-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-10-2024 a las 13:10:31
-- Versión del servidor: 8.0.39
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `buffet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cli_id` int NOT NULL,
  `cli_cod` varchar(10) NOT NULL,
  `cli_nom` varchar(50) NOT NULL,
  `cli_ape` varchar(50) NOT NULL,
  `cli_dir` varchar(100) NOT NULL,
  `cli_cel` varchar(10) NOT NULL,
  `cli_ema` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cli_id`, `cli_cod`, `cli_nom`, `cli_ape`, `cli_dir`, `cli_cel`, `cli_ema`) VALUES
(1, '1715035687', 'Rolando Daniel', 'Salazar Vasquez', 'El Recreo', '0998723360', 'danielsalazarv@gmail.com'),
(2, '1717655649', 'GENNY MARLENE', 'PAUCAR LOYA', 'GUAJALO', '0984824026', 'JEMAPALO@HOTMAIL.COM'),
(3, '1702828748', 'CESAR AUGUSTO', 'SALAZAR PILCO', 'FERROVIARIA', '022651035', 'CEAGSAPI@GMAIL.COM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procuradores`
--

CREATE TABLE `procuradores` (
  `pro_id` int NOT NULL,
  `pro_cod` varchar(10) NOT NULL,
  `pro_nom` varchar(50) NOT NULL,
  `pro_ape` varchar(50) NOT NULL,
  `pro_cel` varchar(10) NOT NULL,
  `pro_ema` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `procuradores`
--

INSERT INTO `procuradores` (`pro_id`, `pro_cod`, `pro_nom`, `pro_ape`, `pro_cel`, `pro_ema`) VALUES
(1, '1717171717', 'LUIS ALCIVAR', 'NARANJO', '', '022556677');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cli_id`);

--
-- Indices de la tabla `procuradores`
--
ALTER TABLE `procuradores`
  ADD PRIMARY KEY (`pro_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cli_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `procuradores`
--
ALTER TABLE `procuradores`
  MODIFY `pro_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
