-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-09-2019 a las 14:23:45
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ventas`
--

CREATE DATABASE ventas;
USE ventas;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcliente`
--

CREATE TABLE `tblcliente` (
  `docId` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblcliente`
--

INSERT INTO `tblcliente` (`docId`, `nombre`, `apellido`) VALUES
(990, 'Periquito', 'Perez'),
(1234, 'juan', 'Perez'),
(9898, 'nicolas', 'Suarez'),
(1234565, 'Susana', 'Perez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblempleado`
--

CREATE TABLE `tblempleado` (
  `docId` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `clave` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblempleado`
--

INSERT INTO `tblempleado` (`docId`, `nombre`, `apellido`, `clave`) VALUES
(0, 'Nicolas', 'Suzarez', '$2y$10$oBqTVjM01UiEaKpPQBXMeuvGbb2iN/Bgmw4Kno0rfQThLit.ZBpvq'),
(99, 'editado', 'prueba', '$2y$10$IQWQrJ3BxlnV8nDpSLg1KuGHaxF1fE/m6joM5WLDKYXEFIluJrhAC'),
(1234, 'Jose', 'Juan', '$2y$10$uuHy6X5QCx7H4Q6JsK6gUOcokeYRKNXj3VppuxnoekSwFChClJP.q'),
(9898, 'juan', 'perez', '$2y$10$r4zpVOSuF83bGR5OAMK1LOwGTFAdQs6QVdG9cIel3ku1aRXlnx0MC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblfactura`
--

CREATE TABLE `tblfactura` (
  `consecutivo` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `empleado` int(11) NOT NULL,
  `cliente` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblfactura`
--

INSERT INTO `tblfactura` (`consecutivo`, `fecha`, `empleado`, `cliente`, `total`) VALUES
(1, '2019-09-14 16:08:13', 1234, 990, 368900),
(2, '2019-09-14 16:14:08', 1234, 9898, 276556),
(3, '2019-09-14 17:31:50', 1234, 1234, 11900),
(4, '2019-09-14 17:32:18', 1234, 1234, 71400),
(5, '2019-09-14 17:37:52', 1234, 1234, 47600),
(6, '2019-09-14 17:38:06', 1234, 1234, 23800),
(7, '2019-09-14 22:14:41', 1234, 990, 298452),
(8, '2019-09-14 23:43:35', 1234, 9898, 940100),
(9, '2019-09-15 02:50:51', 0, 1234565, 11900),
(10, '2019-09-15 02:52:05', 0, 1234, 84252),
(11, '2019-09-15 02:52:15', 0, 1234, 84252),
(12, '2019-09-15 04:38:49', 1234, 990, 421260),
(13, '2019-09-15 04:39:38', 1234, 9898, 4633860);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblfacturaproductos`
--

CREATE TABLE `tblfacturaproductos` (
  `consFactura` int(11) NOT NULL,
  `codProducto` varchar(20) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valorUnitario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblfacturaproductos`
--

INSERT INTO `tblfacturaproductos` (`consFactura`, `codProducto`, `cantidad`, `valorUnitario`) VALUES
(1, '1', 1, 10000),
(1, '770890', 2, 150000),
(2, '1', 2, 10000),
(2, '789654', 3, 70800),
(3, '1', 1, 10000),
(4, '2', 3, 20000),
(5, '2', 2, 20000),
(6, '2', 1, 20000),
(7, '1', 1, 10000),
(7, '2', 1, 20000),
(7, '770890', 1, 150000),
(7, '789654', 1, 70800),
(8, '1', 3, 10000),
(8, '2', 23, 20000),
(8, '770890', 2, 150000),
(9, '1', 1, 10000),
(10, '789654', 1, 70800),
(11, '789654', 1, 70800),
(12, '789654', 5, 70800),
(13, '789654', 55, 70800);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproductos`
--

CREATE TABLE `tblproductos` (
  `codigo` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblproductos`
--

INSERT INTO `tblproductos` (`codigo`, `nombre`, `stock`, `valor`) VALUES
('1', 'Camisa', 307, 10000),
('2', 'tenis', 818, 20000),
('770890', 'Pantalla 34P', 89, 150000),
('789654', 'Teclado', 14, 70800);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblcliente`
--
ALTER TABLE `tblcliente`
  ADD PRIMARY KEY (`docId`);

--
-- Indices de la tabla `tblempleado`
--
ALTER TABLE `tblempleado`
  ADD PRIMARY KEY (`docId`);

--
-- Indices de la tabla `tblfactura`
--
ALTER TABLE `tblfactura`
  ADD PRIMARY KEY (`consecutivo`),
  ADD KEY `fk_tblfactura_tblempleado` (`empleado`),
  ADD KEY `fk_tblfactura_tblcliente` (`cliente`);

--
-- Indices de la tabla `tblfacturaproductos`
--
ALTER TABLE `tblfacturaproductos`
  ADD PRIMARY KEY (`consFactura`,`codProducto`),
  ADD KEY `fk_tblfacturaproducto_tblproductos` (`codProducto`);

--
-- Indices de la tabla `tblproductos`
--
ALTER TABLE `tblproductos`
  ADD PRIMARY KEY (`codigo`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tblfactura`
--
ALTER TABLE `tblfactura`
  ADD CONSTRAINT `fk_tblfactura_tblcliente` FOREIGN KEY (`cliente`) REFERENCES `tblcliente` (`docId`),
  ADD CONSTRAINT `fk_tblfactura_tblempleado` FOREIGN KEY (`empleado`) REFERENCES `tblempleado` (`docId`);

--
-- Filtros para la tabla `tblfacturaproductos`
--
ALTER TABLE `tblfacturaproductos`
  ADD CONSTRAINT `fk_tblfacturaproducto_tblfactura` FOREIGN KEY (`consFactura`) REFERENCES `tblfactura` (`consecutivo`),
  ADD CONSTRAINT `fk_tblfacturaproducto_tblproductos` FOREIGN KEY (`codProducto`) REFERENCES `tblproductos` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
