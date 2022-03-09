-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2021 a las 05:05:07
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sivephp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evidencias`
--

CREATE TABLE `evidencias` (
  `idEvid` int(11) NOT NULL,
  `tituloEvid` varchar(100) NOT NULL,
  `fechaCreacEvid` date NOT NULL,
  `autorEvid` varchar(50) NOT NULL,
  `fkTipoEvid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `idFacultad` varchar(10) NOT NULL,
  `nombreFacultad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`idFacultad`, `nombreFacultad`) VALUES
('1', 'Facultad Ingeniería'),
('2', 'Facultad Ciencias Exactas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `idPrograma` varchar(10) NOT NULL,
  `nombrePrograma` varchar(100) NOT NULL,
  `fkFacultad` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`idPrograma`, `nombrePrograma`, `fkFacultad`) VALUES
('123', 'Desa SFW', '1'),
('1234', 'Matemática Pura', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoevidencia`
--

CREATE TABLE `tipoevidencia` (
  `idTipoEvid` int(11) NOT NULL,
  `nombEvid` varchar(30) NOT NULL,
  `descripEvid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipoevidencia`
--

INSERT INTO `tipoevidencia` (`idTipoEvid`, `nombEvid`, `descripEvid`) VALUES
(12323, 'Imagen asads', 'Imagen ejemplo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(200) NOT NULL,
  `contrasena` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `contrasena`) VALUES
('invitado', 'invitado'),
('invitado2', 'invitado44');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `evidencias`
--
ALTER TABLE `evidencias`
  ADD PRIMARY KEY (`idEvid`),
  ADD KEY `fkTipoEvid` (`fkTipoEvid`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`idFacultad`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`idPrograma`),
  ADD KEY `CONS_FKFACULT` (`fkFacultad`);

--
-- Indices de la tabla `tipoevidencia`
--
ALTER TABLE `tipoevidencia`
  ADD PRIMARY KEY (`idTipoEvid`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `evidencias`
--
ALTER TABLE `evidencias`
  ADD CONSTRAINT `evidencias_ibfk_1` FOREIGN KEY (`fkTipoEvid`) REFERENCES `tipoevidencia` (`idTipoEvid`);

--
-- Filtros para la tabla `programa`
--
ALTER TABLE `programa`
  ADD CONSTRAINT `CONS_FKFACULT` FOREIGN KEY (`fkFacultad`) REFERENCES `facultad` (`idFacultad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
