-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-02-2023 a las 02:48:48
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `farmavida`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicina`
--

DROP TABLE IF EXISTS `medicina`;
CREATE TABLE IF NOT EXISTS `medicina` (
  `codMedicina` int NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `cantidad` int NOT NULL,
  PRIMARY KEY (`codMedicina`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `medicina`
--

INSERT INTO `medicina` (`codMedicina`, `nombre`, `cantidad`) VALUES
(22222, 'Albendazol', 300),
(3333, 'aspi', 215),
(11111, 'Loratadinas', 910);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

DROP TABLE IF EXISTS `sucursal`;
CREATE TABLE IF NOT EXISTS `sucursal` (
  `codSucursal` varchar(50) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `estatus` varchar(1) NOT NULL,
  PRIMARY KEY (`codSucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`codSucursal`, `estado`, `ciudad`, `direccion`, `estatus`) VALUES
('sucursal_0', 'Lara', 'Barquisimeto', 'carrera 25', 'A'),
('sucursal_1', 'lara', 'barquisimeto', 'obelisco', 'A'),
('sucursal_2', 'caracas', 'caracas', 'petare', ''),
('sucursal_3', 'merida', 'merida', 'tucani', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal_medicina`
--

DROP TABLE IF EXISTS `sucursal_medicina`;
CREATE TABLE IF NOT EXISTS `sucursal_medicina` (
  `codMedicina` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `codSucursal` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `cantidad` int NOT NULL,
  `estatus` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  KEY `codMedicina` (`codMedicina`),
  KEY `codSucursal` (`codSucursal`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `sucursal_medicina`
--

INSERT INTO `sucursal_medicina` (`codMedicina`, `codSucursal`, `cantidad`, `estatus`) VALUES
('0', 'sucursal_0', 1, ''),
('0', 'sucursal_0', 1, ''),
('0', 'sucursal_0', 1, ''),
('11111', 'sucursal_2', 410, ''),
('', '', 0, ''),
('3333', 'sucursal_2', 215, ''),
('22222', 'sucursal_0', 200, ''),
('0', 'Sucursal_4', 100, ''),
('22222', 'sucursal_1', 100, ''),
('11111', 'sucursal_0', 500, ''),
('99999', 'sucursal_0', 100, ''),
('99999', 'Sucursal_4', 100, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `codusuario` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `codsucu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `role` enum('user','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombres` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`codusuario`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codusuario`, `codsucu`, `username`, `password`, `role`, `nombres`) VALUES
('user1', 'sucursal_1', 'Eliza', '1', 'admin', 'Eliza Graterol'),
('user2', 'sucursal_2', 'jesus', '1', 'user', 'Jesus Lopez'),
('user-3', 'sucursal_3', 'dazz', '1', 'user', 'Eliza'),
('user_4', 'sucursal_2', 'kley', '1', 'user', 'Jose alvarez');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
