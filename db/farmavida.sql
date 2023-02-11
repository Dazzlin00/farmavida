-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-02-2023 a las 23:37:36
-- Versión del servidor: 5.7.40
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
-- Estructura de tabla para la tabla `laboratorio`
--

DROP TABLE IF EXISTS `laboratorio`;
CREATE TABLE IF NOT EXISTS `laboratorio` (
  `codlab` varchar(50) NOT NULL,
  `nombrelab` varchar(255) NOT NULL,
  PRIMARY KEY (`codlab`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `laboratorio`
--

INSERT INTO `laboratorio` (`codlab`, `nombrelab`) VALUES
('Lab1', 'Farma'),
('Lab10', 'Farqui'),
('Lab2', 'Pfizer'),
('Lab3', 'Oftalmi'),
('Lab4', 'Bayer'),
('Lab5', 'Kimiceg'),
('Lab6', 'Calox'),
('Lab7', 'Genven'),
('Lab8', 'Roche'),
('Lab9', 'Spefar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio_medicina`
--

DROP TABLE IF EXISTS `laboratorio_medicina`;
CREATE TABLE IF NOT EXISTS `laboratorio_medicina` (
  `codMedicina` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `codlab` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`codMedicina`),
  KEY `codlab` (`codlab`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `laboratorio_medicina`
--

INSERT INTO `laboratorio_medicina` (`codMedicina`, `codlab`) VALUES
('456', 'Lab1'),
('220', 'Lab1'),
('111', 'Lab1'),
('440', 'Lab1'),
('765', 'Lab10'),
('222', 'Lab10'),
('333', 'Lab2'),
('330', 'Lab3'),
('888', 'Lab1'),
('550', 'Lab3'),
('766', 'Lab3'),
('880', 'Lab7'),
('666', 'Lab5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicina`
--

DROP TABLE IF EXISTS `medicina`;
CREATE TABLE IF NOT EXISTS `medicina` (
  `codMedicina` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`codMedicina`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `medicina`
--

INSERT INTO `medicina` (`codMedicina`, `nombre`, `cantidad`) VALUES
(111, 'Albendazol', 300),
(222, 'aspirina', 215),
(333, 'OvilM', 70),
(444, 'Solfen', 60),
(555, 'Dol', 40),
(666, 'Prednisona', 50),
(777, 'Secnidazol', 60),
(888, 'Acetaminofen', 30),
(999, 'Acitromicina', 40),
(100, 'Diane35', 50),
(110, 'Amoxilcilina', 28),
(220, 'Alprazolam', 40),
(330, 'Enalapril', 50),
(440, 'Losartan', 23),
(550, 'Pedialiti', 10),
(660, 'Fenitoina', 10),
(770, 'Verapamil', 30),
(880, 'Vitamina C', 100),
(990, 'Teragrip', 8),
(101, 'Dencorub', 9),
(992, 'Bycuten', 20),
(766, 'Gynotran', 11),
(456, 'Gencibol', 44),
(765, 'Canesten', 15);

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
('sucursal_0', 'Lara', 'Barquisimeto', 'El Cuji Pasarela', 'A'),
('sucursal_1', 'Lara', 'Barquisimeto', 'Obelisco', 'A'),
('sucursal_2', 'Lara', 'Barquisimeto', 'Centro Av 20 calle 22', 'A'),
('sucursal_3', 'Lara', 'Barquisimeto', 'CC Ciudad Paris', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal_medicina`
--

DROP TABLE IF EXISTS `sucursal_medicina`;
CREATE TABLE IF NOT EXISTS `sucursal_medicina` (
  `codMedicina` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `codSucursal` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estatus` char(1) COLLATE utf8mb4_spanish2_ci NOT NULL,
  KEY `codMedicina` (`codMedicina`),
  KEY `codSucursal` (`codSucursal`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `sucursal_medicina`
--

INSERT INTO `sucursal_medicina` (`codMedicina`, `codSucursal`, `cantidad`, `estatus`) VALUES
('111', 'sucursal_0', 20, 'A'),
('111', 'sucursal_1', 30, 'A'),
('111', 'sucursal_2', 60, 'A'),
('111', 'sucursal_3', 65, 'A'),
('666', 'sucursal_3', 90, 'A'),
('222', 'sucursal_2', 13, 'A'),
('222', 'sucursal_1', 17, 'A'),
('222', 'sucursal_0', 18, 'A'),
('333', 'sucursal_0', 33, 'A'),
('333', 'sucursal_1', 22, 'A'),
('333', 'sucursal_2', 11, 'A'),
('333', 'sucursal_3', 87, 'A'),
('444', 'sucursal_0', 23, 'A'),
('444', 'sucursal_1', 45, 'A'),
('444', 'sucursal_2', 17, 'A'),
('444', 'sucursal_3', 14, 'A'),
('555', 'sucursal_3', 3, 'A'),
('555', 'sucursal_2', 9, 'A'),
('666', 'sucursal_1', 0, 'A'),
('666', 'sucursal_0', 22, 'A'),
('666', 'sucursal_3', 2, 'A'),
('888', 'sucursal_2', 32, 'A'),
('888', 'sucursal_1', 0, 'A'),
('888', 'sucursal_0', 17, 'A'),
('888', 'sucursal_3', 29, 'A'),
('777', 'sucursal_2', 72, 'A'),
('100', 'sucursal_1', 66, 'A'),
('100', 'sucursal_0', 39, 'A'),
('220', 'sucursal_0', 20, 'A'),
('220', 'sucursal_1', 11, 'A'),
('330', 'sucursal_2', 0, 'A'),
('330', 'sucursal_3', 34, 'A'),
('330', 'sucursal_0', 78, 'A'),
('660', 'sucursal_1', 28, 'A'),
('660', 'sucursal_2', 11, 'A'),
('110', 'sucursal_3', 17, 'A'),
('110', 'sucursal_3', 23, 'A'),
('765', 'sucursal_2', 87, 'A'),
('456', 'sucursal_1', 20, 'A'),
('456', 'sucursal_0', 100, 'A'),
('992', 'sucursal_0', 23, 'A'),
('990', 'sucursal_1', 67, 'A'),
('880', 'sucursal_2', 57, 'A'),
('770', 'sucursal_3', 8, 'A'),
('440', 'sucursal_3', 65, 'A'),
('550', 'sucursal_2', 10, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `codusuario` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `codsucu` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `role` enum('user','admin') COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombres` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`codusuario`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codusuario`, `codsucu`, `username`, `password`, `role`, `nombres`) VALUES
('user1', 'sucursal_1', 'Eliza', '1', 'admin', 'Eliza Graterol'),
('user2', 'sucursal_2', 'jesus', '1', 'user', 'Jesus Lopez'),
('user-3', 'sucursal_3', 'dazz', '1', 'user', 'Karla Diaz'),
('user_4', 'sucursal_2', 'kley', '1', 'user', 'Jose alvarez'),
('user5', 'sucursal_0', 'melvin', '8', 'user', 'melvin ayala');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
