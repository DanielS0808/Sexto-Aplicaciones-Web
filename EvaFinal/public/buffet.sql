-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2024 a las 00:37:59
-- Versión del servidor: 8.0.39
-- Versión de PHP: 8.2.12

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
(3, '1702828748', 'CESAR AUGUSTO', 'SALAZAR PILCO', 'FERROVIARIA', '022651035', 'CEAGSAPI@GMAIL.COM'),
(5, '1717171717', 'DAMIAN', 'NAVARRETE', 'AV AZUCENAS', '3950500', 'DNAVA@URBANO.COM.EC'),
(6, '1818181818', 'RENATO', 'RODRIGUEZ', 'SOLANDA', '0967452341', 'RR@RBANO.COM.EC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expedientes`
--

CREATE TABLE `expedientes` (
  `exp_id` int NOT NULL,
  `exp_cod` varchar(10) NOT NULL,
  `exp_des` varchar(50) NOT NULL,
  `cli_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `expedientes`
--

INSERT INTO `expedientes` (`exp_id`, `exp_cod`, `exp_des`, `cli_id`) VALUES
(1, 'AAA0001001', 'EXPEDIENTE PRUEBA', 1),
(2, 'AA0001002', 'EXPEDIENTE PRUEBA 2', 2);

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
(1, '1717171717', 'LUIS ALCIVAR', 'NARANJO', '0981234561', 'LN@LNS.COM.EC'),
(2, '2020202020', 'RAFAEL', 'CELA', '0991234567', 'RCELA@URBANO.COM.EC'),
(3, '2222222222', 'ROCIO ', 'MORENO', '0981236789', 'RM@URBANO.COM.EC');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cli_id`);

--
-- Indices de la tabla `expedientes`
--
ALTER TABLE `expedientes`
  ADD PRIMARY KEY (`exp_id`),
  ADD KEY `cli_id` (`cli_id`);

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
  MODIFY `cli_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `expedientes`
--
ALTER TABLE `expedientes`
  MODIFY `exp_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `procuradores`
--
ALTER TABLE `procuradores`
  MODIFY `pro_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `expedientes`
--
ALTER TABLE `expedientes`
  ADD CONSTRAINT `expedientes_ibfk_1` FOREIGN KEY (`cli_id`) REFERENCES `clientes` (`cli_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
