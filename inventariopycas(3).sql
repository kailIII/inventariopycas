-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-07-2016 a las 20:42:19
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventariopycas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesorios`
--

CREATE TABLE `accesorios` (
  `codaccesorio` int(11) NOT NULL,
  `nomacesorio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `accesorios`
--

INSERT INTO `accesorios` (`codaccesorio`, `nomacesorio`) VALUES
(1, 'Mouse'),
(2, 'Teclado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `codarea` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`codarea`, `nombre`) VALUES
(1, 'Precio Transferencia'),
(3, 'RRHH'),
(4, 'Proceso de Negocio'),
(5, 'Marketing'),
(7, 'Consultoria'),
(8, 'Administracion'),
(9, 'hghjjhjh');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `equipo` int(6) UNSIGNED ZEROFILL NOT NULL,
  `presentacion` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `serial` varchar(50) NOT NULL,
  `accesorio` varchar(50) NOT NULL,
  `nomequipo` varchar(50) NOT NULL,
  `serialcargador` varchar(50) NOT NULL,
  `serialbateria` varchar(50) NOT NULL,
  `fechafabrica` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`equipo`, `presentacion`, `marca`, `modelo`, `serial`, `accesorio`, `nomequipo`, `serialcargador`, `serialbateria`, `fechafabrica`) VALUES
(000001, 'Laptop', 'Toshiba', 'Satellite P7445D', '1C202278K', 'CARGADOR', 'PYCAS - 42', 'T15263835676A04', 'LPO114090907M0248', '2016-05-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `codinventario` int(11) NOT NULL,
  `equipo` int(6) UNSIGNED ZEROFILL NOT NULL,
  `inventario` int(6) NOT NULL,
  `codigo` int(8) UNSIGNED ZEROFILL NOT NULL,
  `codarea` int(11) NOT NULL,
  `estadoinv` varchar(1) NOT NULL,
  `observaciones` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`codinventario`, `equipo`, `inventario`, `codigo`, `codarea`, `estadoinv`, `observaciones`) VALUES
(1, 000001, 11, 00000001, 1, 'P', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `codsala` int(11) NOT NULL,
  `ocupado` varchar(1) NOT NULL,
  `horaini` varchar(10) NOT NULL,
  `horafin` varchar(10) NOT NULL,
  `nomsala` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`codsala`, `ocupado`, `horaini`, `horafin`, `nomsala`) VALUES
(1, 'S', '03:15', '03:50', 'sala1h'),
(2, 'N', '03:15', '03:40', 'sala2'),
(3, 'S', '03:10', '01:15', 'sala3'),
(4, 'S', '02:10', '04:20', 'sala4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudequipo`
--

CREATE TABLE `solicitudequipo` (
  `idequipo` int(11) NOT NULL,
  `nomcomp` varchar(100) NOT NULL,
  `equipo` int(8) UNSIGNED ZEROFILL NOT NULL,
  `cargo` varchar(1) NOT NULL,
  `codarea` int(11) NOT NULL,
  `hora` varchar(10) NOT NULL,
  `fechaentrega` date NOT NULL,
  `fechadevulucion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solicitudequipo`
--

INSERT INTO `solicitudequipo` (`idequipo`, `nomcomp`, `equipo`, `cargo`, `codarea`, `hora`, `fechaentrega`, `fechadevulucion`) VALUES
(1, 'sergio Renato', 00000001, 'G', 1, '01:10', '2016-07-06', '2016-06-29'),
(2, 'sergio Renato', 00000001, 'G', 1, '01:10', '2016-07-06', '2016-06-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudsala`
--

CREATE TABLE `solicitudsala` (
  `codigo` int(11) NOT NULL,
  `fecha` varchar(40) NOT NULL,
  `cargo` varchar(1) NOT NULL,
  `codaccesorio` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `codarea` int(11) NOT NULL,
  `horaini` varchar(20) NOT NULL,
  `horafin` varchar(20) NOT NULL,
  `codsala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solicitudsala`
--

INSERT INTO `solicitudsala` (`codigo`, `fecha`, `cargo`, `codaccesorio`, `nombres`, `codarea`, `horaini`, `horafin`, `codsala`) VALUES
(1, '2016-07-07', 'G', 1, 'ewe', 1, '11:05', '01:05', 1),
(2, '2016-07-07', 'G', 1, 'ewe', 3, '11:05', '01:05', 1),
(3, '2016-07-07', 'G', 1, 'ewe', 1, '11:05', '01:05', 3),
(4, '2016-07-01', 'G', 1, 'tttr', 1, '12:05', '03:10', 3),
(5, '2016-07-13', 'G', 1, 'xzxz', 1, '02:00', '03:00', 4),
(6, '2016-07-07', 'G', 1, 'rgffg', 1, '03:10', '01:15', 3),
(7, '2016-07-15', 'G', 1, 'zxxz', 1, '02:10', '04:20', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `codigo` int(8) UNSIGNED ZEROFILL NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `estado` varchar(1) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `permiso` varchar(1) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `celular` varchar(30) NOT NULL,
  `tipousu` varchar(1) NOT NULL,
  `dni` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`codigo`, `nombres`, `apellidos`, `sexo`, `estado`, `direccion`, `permiso`, `usuario`, `contrasena`, `email`, `celular`, `tipousu`, `dni`) VALUES
(00000001, 'Nieve', 'Nieve', 'M', 'A', 'villa el salvador', '1', 'cnieve', '123456', 'nieve@gmail.com', '123456', 'A', '12345678'),
(00000002, 'Sergio Renato', 'Mendoza Pisconte', 'M', 'A', 'Cesar vallejo', '1', 'renato', 'mendoza', 'renato@gmail.com', '982094994', 'U', '47504262'),
(00000003, 'johan', 'cañari', 'M', 'A', 'villa el salvador', '1', 'johan', '123456', 'cañari@gmail.com', '1346', 'U', '145632');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accesorios`
--
ALTER TABLE `accesorios`
  ADD PRIMARY KEY (`codaccesorio`);

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`codarea`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`equipo`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`codinventario`),
  ADD KEY `codarea` (`codarea`),
  ADD KEY `usuario` (`codigo`),
  ADD KEY `equipo` (`equipo`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`codsala`);

--
-- Indices de la tabla `solicitudequipo`
--
ALTER TABLE `solicitudequipo`
  ADD PRIMARY KEY (`idequipo`),
  ADD KEY `equipo` (`equipo`),
  ADD KEY `codarea` (`codarea`);

--
-- Indices de la tabla `solicitudsala`
--
ALTER TABLE `solicitudsala`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `codaccesorio` (`codaccesorio`),
  ADD KEY `codsala` (`codsala`),
  ADD KEY `codarea` (`codarea`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accesorios`
--
ALTER TABLE `accesorios`
  MODIFY `codaccesorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `codarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `equipo` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `codinventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `codsala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `solicitudequipo`
--
ALTER TABLE `solicitudequipo`
  MODIFY `idequipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `solicitudsala`
--
ALTER TABLE `solicitudsala`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
