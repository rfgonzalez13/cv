-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 09-09-2021 a las 11:57:36
-- Versión del servidor: 10.3.23-MariaDB-0+deb10u1
-- Versión de PHP: 7.3.19-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `datos_curriculares`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `CodigoA` int(11) NOT NULL,
  `AutoresA` varchar(200) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `TituloA` varchar(100) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `TituloR` varchar(100) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `ISSN` varchar(13) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `VolumenR` varchar(4) COLLATE latin1_spanish_ci DEFAULT NULL,
  `PagIniA` int(4) DEFAULT NULL,
  `PagFinA` int(4) DEFAULT NULL,
  `FechaPublicacionR` date DEFAULT NULL,
  `EstadoA` enum('Enviado','Revision','Publicado') COLLATE latin1_spanish_ci NOT NULL DEFAULT 'Publicado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`CodigoA`, `AutoresA`, `TituloA`, `TituloR`, `ISSN`, `VolumenR`, `PagIniA`, `PagFinA`, `FechaPublicacionR`, `EstadoA`) VALUES
(1, 'Rubén Fernández, Marcos Llorente, Florentino Fernández', 'La vida despues de la ESEI', 'SuperPOP', 'ISSNLO67690PO', 'WEP3', 187, 189, '2007-09-23', 'Publicado'),
(2, 'Rubén Fernández, Marcos Llorente, Florentino Fernández', 'La muerte despues de la ESEI', 'SuperPOP', 'ISSNLO67690PO', 'WEP3', 187, 189, '2007-09-23', 'Revision'),
(3, 'Rubén Fernández, Cristiano Ronaldo, Florentino Fernández', 'Python mola', 'PRONTO', 'ISSNLOLER9099', 'DERV', 1, 25, '1993-09-23', 'Publicado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `congreso`
--

CREATE TABLE `congreso` (
  `CodigoC` int(11) NOT NULL,
  `NombreC` varchar(100) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `AcronimoC` varchar(20) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `AnhoC` year(4) NOT NULL DEFAULT 0000,
  `LugarC` varchar(20) COLLATE latin1_spanish_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `congreso`
--

INSERT INTO `congreso` (`CodigoC`, `NombreC`, `AcronimoC`, `AnhoC`, `LugarC`) VALUES
(1, 'Vida de Vicio', 'VdV', 1999, 'Ibiza'),
(2, 'Bases de Datos Molonas', 'BDM', 2008, 'Japon');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estancia`
--

CREATE TABLE `estancia` (
  `CodigoE` int(11) NOT NULL,
  `CentroE` varchar(100) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `UniversidadE` varchar(40) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `PaisE` varchar(20) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `FechaInicioE` date NOT NULL DEFAULT '0000-00-00',
  `FechaFinE` date NOT NULL DEFAULT '0000-00-00',
  `TipoE` enum('Investigacion','Doctorado','Invitado') COLLATE latin1_spanish_ci NOT NULL DEFAULT 'Investigacion',
  `LoginU` varchar(15) COLLATE latin1_spanish_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `estancia`
--

INSERT INTO `estancia` (`CodigoE`, `CentroE`, `UniversidadE`, `PaisE`, `FechaInicioE`, `FechaFinE`, `TipoE`, `LoginU`) VALUES
(1, 'ESEI', 'Universidad de Vigo', 'España', '2000-01-01', '2002-03-05', 'Invitado', 'floro'),
(2, 'ESEI', 'Universidad de Vigo', 'España', '1992-01-01', '1994-03-05', 'Doctorado', 'floro'),
(3, 'ESEI', 'Universidad de Vigo', 'España', '2005-01-01', '2005-01-15', 'Investigacion', 'floro'),
(4, 'ESEI', 'Universidad de Vigo', 'España', '2000-01-01', '2002-03-05', 'Invitado', 'ana'),
(8, 'Kimbawe', 'Kimbempe', 'Kenia', '1990-03-09', '1991-09-09', 'Investigacion', 'floro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `CodigoL` int(11) NOT NULL,
  `AutoresL` varchar(200) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `TituloL` varchar(100) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `ISBN` varchar(13) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `PagIniL` varchar(4) COLLATE latin1_spanish_ci DEFAULT NULL,
  `PagFinL` varchar(4) COLLATE latin1_spanish_ci DEFAULT NULL,
  `VolumenL` varchar(4) COLLATE latin1_spanish_ci DEFAULT NULL,
  `EditorialL` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `FechaPublicacionL` date NOT NULL DEFAULT '0000-00-00',
  `EditorL` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `PaisEdicionL` varchar(20) COLLATE latin1_spanish_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`CodigoL`, `AutoresL`, `TituloL`, `ISBN`, `PagIniL`, `PagFinL`, `VolumenL`, `EditorialL`, `FechaPublicacionL`, `EditorL`, `PaisEdicionL`) VALUES
(1, 'Lionel Messi, Florentino Fernández, Paco Buyo', 'Las mariposas de Brievik', '9783642024801', '5', '250', 'IV', 'ANAYA', '2009-04-04', 'Florentino Perez', 'Noruega'),
(2, 'Rubencito, Florentino Fernández, Marquinhos', 'Jose Breton y la piedra filosofal', '9783642024801', '5', '250', 'IV', 'ANAYA', '2015-04-04', 'Joan Laporta', 'España');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `CodigoM` int(11) NOT NULL,
  `TipoM` enum('Grado','Tercer Ciclo','Curso','Master','Postgrado') COLLATE latin1_spanish_ci NOT NULL DEFAULT 'Grado',
  `TipoParticipacionM` enum('Docente','Director') COLLATE latin1_spanish_ci NOT NULL DEFAULT 'Docente',
  `DenominacionM` varchar(100) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `TitulacionM` varchar(100) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `AnhoAcademicoM` varchar(11) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `CreditosTeoM` char(3) COLLATE latin1_spanish_ci NOT NULL DEFAULT '0',
  `CreditosPraM` char(3) COLLATE latin1_spanish_ci NOT NULL DEFAULT '0',
  `CuatrimestreM` enum('Primero','Segundo','Anual') COLLATE latin1_spanish_ci NOT NULL DEFAULT 'Primero',
  `LoginU` varchar(15) COLLATE latin1_spanish_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pfc`
--

CREATE TABLE `pfc` (
  `CodigoPFC` varchar(10) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `TituloPFC` varchar(100) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `AlumnoPFC` varchar(40) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `FechaLecturaPFC` date DEFAULT NULL,
  `CalificacionPFC` enum('Aprobado','Notable','Sobresaliente','Matricula') COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ponencia`
--

CREATE TABLE `ponencia` (
  `CodigoP` int(11) NOT NULL,
  `AutoresP` varchar(200) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `TituloP` varchar(100) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `CongresoP` varchar(40) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `FechaIniCP` date NOT NULL DEFAULT '0000-00-00',
  `FechaFinCP` date NOT NULL DEFAULT '0000-00-00',
  `LugarCP` varchar(20) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `PaisCP` varchar(20) COLLATE latin1_spanish_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `ponencia`
--

INSERT INTO `ponencia` (`CodigoP`, `AutoresP`, `TituloP`, `CongresoP`, `FechaIniCP`, `FechaFinCP`, `LugarCP`, `PaisCP`) VALUES
(1, 'Cristiano Ronaldo, Lionel Messi', 'El 2-6', 'Historia del Clásico', '2017-06-09', '2017-06-12', 'Madrid', 'España');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `CodigoProy` int(11) NOT NULL,
  `TituloProy` varchar(100) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `EntidadFinanciadora` varchar(40) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `AcronimoProy` varchar(20) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `AnhoInicioProy` year(4) NOT NULL DEFAULT 0000,
  `AnhoFinProy` year(4) NOT NULL DEFAULT 0000,
  `Importe` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`CodigoProy`, `TituloProy`, `EntidadFinanciadora`, `AcronimoProy`, `AnhoInicioProy`, `AnhoFinProy`, `Importe`) VALUES
(1, 'P01', 'Ministerio de interior', 'P01', 2003, 2004, 560),
(2, 'Proyecto secreto', 'CIA', 'XXX-D23', 2017, 2019, 345000),
(6, 'Cosas de ANA', 'Andorra', 'ANA', 1999, 2001, 2550),
(21, 'Proyecto Prueba', 'TEST', 'BBVA', 1993, 1999, 3450);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tad`
--

CREATE TABLE `tad` (
  `CodigoTAD` varchar(10) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `TituloTAD` varchar(100) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `AlumnoTAD` varchar(40) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `FechaLecturaTAD` date DEFAULT NULL,
  `LoginU` varchar(15) COLLATE latin1_spanish_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tad`
--

INSERT INTO `tad` (`CodigoTAD`, `TituloTAD`, `AlumnoTAD`, `FechaLecturaTAD`, `LoginU`) VALUES
('1', 'Indices y optimizacion de consultas recurrentes', 'Francisco Rojas Fernandez', '2018-10-05', 'floro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `technicalreport`
--

CREATE TABLE `technicalreport` (
  `CodigoTR` int(11) NOT NULL,
  `AutoresTR` varchar(200) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `TituloTR` varchar(100) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `DepartamentoTR` varchar(100) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `UniversidadTR` varchar(40) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `FechaTR` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `LoginU` varchar(15) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `PasswordU` varchar(32) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `NombreU` varchar(15) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `ApellidosU` varchar(30) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `TituloAcademicoU` varchar(100) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `TipoContratoU` varchar(40) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `CentroU` varchar(100) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `DepartamentoU` varchar(100) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `UniversidadU` varchar(40) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `TipoU` enum('A','P') COLLATE latin1_spanish_ci NOT NULL DEFAULT 'P'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`LoginU`, `PasswordU`, `NombreU`, `ApellidosU`, `TituloAcademicoU`, `TipoContratoU`, `CentroU`, `DepartamentoU`, `UniversidadU`, `TipoU`) VALUES
('admin', 'e0b7feb3cf3e7d177da400774de0af5b', 'Administrador', '', '', '', '', '', '', 'A'),
('ana', '8ff72d70d87ae08c3f76d990744b91b4', 'Ana', 'Guerra Carvajal', 'Espia', 'Precario', 'ESEI', 'Espionaje', 'Universidad de Madrid', 'A'),
('floro', '8ff72d70d87ae08c3f76d990744b91b4', 'Florentino', 'Fernández Riverola', 'Titular de Universidad', 'Plantilla', 'Escuela Superior de Ingeniería Informática', 'Informática', 'Universidad de Vigo', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_articulo`
--

CREATE TABLE `usuario_articulo` (
  `CodigoA` int(11) NOT NULL DEFAULT 0,
  `LoginU` varchar(15) COLLATE latin1_spanish_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuario_articulo`
--

INSERT INTO `usuario_articulo` (`CodigoA`, `LoginU`) VALUES
(0, 'floro'),
(1, 'floro'),
(2, 'floro'),
(3, 'floro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_congreso`
--

CREATE TABLE `usuario_congreso` (
  `LoginU` varchar(15) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `CodigoC` int(11) NOT NULL DEFAULT 0,
  `TipoParticipacionC` enum('MCO','MCC','R','C','PCO','PCC') COLLATE latin1_spanish_ci NOT NULL DEFAULT 'MCO'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuario_congreso`
--

INSERT INTO `usuario_congreso` (`LoginU`, `CodigoC`, `TipoParticipacionC`) VALUES
('ana', 2, 'MCC'),
('floro', 1, 'PCO'),
('floro', 2, 'R');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_libro`
--

CREATE TABLE `usuario_libro` (
  `CodigoL` int(11) NOT NULL DEFAULT 0,
  `LoginU` varchar(15) COLLATE latin1_spanish_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuario_libro`
--

INSERT INTO `usuario_libro` (`CodigoL`, `LoginU`) VALUES
(1, 'floro'),
(2, 'floro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_pfc`
--

CREATE TABLE `usuario_pfc` (
  `CodigoPFC` varchar(10) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `LoginU` varchar(15) COLLATE latin1_spanish_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_ponencia`
--

CREATE TABLE `usuario_ponencia` (
  `CodigoP` int(11) NOT NULL DEFAULT 0,
  `LoginU` varchar(15) COLLATE latin1_spanish_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuario_ponencia`
--

INSERT INTO `usuario_ponencia` (`CodigoP`, `LoginU`) VALUES
(1, 'floro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_proyecto`
--

CREATE TABLE `usuario_proyecto` (
  `CodigoProy` int(11) NOT NULL DEFAULT 0,
  `LoginU` varchar(15) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `TipoParticipacionProy` enum('Investigador','Investigador Principal') COLLATE latin1_spanish_ci NOT NULL DEFAULT 'Investigador'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuario_proyecto`
--

INSERT INTO `usuario_proyecto` (`CodigoProy`, `LoginU`, `TipoParticipacionProy`) VALUES
(1, 'ana', 'Investigador Principal'),
(1, 'floro', 'Investigador'),
(2, 'floro', 'Investigador'),
(6, 'ana', 'Investigador Principal'),
(21, 'floro', 'Investigador Principal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_technicalreport`
--

CREATE TABLE `usuario_technicalreport` (
  `CodigoTR` int(11) NOT NULL DEFAULT 0,
  `LoginU` varchar(15) COLLATE latin1_spanish_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`CodigoA`);

--
-- Indices de la tabla `congreso`
--
ALTER TABLE `congreso`
  ADD PRIMARY KEY (`CodigoC`);

--
-- Indices de la tabla `estancia`
--
ALTER TABLE `estancia`
  ADD PRIMARY KEY (`CodigoE`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`CodigoL`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`CodigoM`);

--
-- Indices de la tabla `pfc`
--
ALTER TABLE `pfc`
  ADD PRIMARY KEY (`CodigoPFC`);

--
-- Indices de la tabla `ponencia`
--
ALTER TABLE `ponencia`
  ADD PRIMARY KEY (`CodigoP`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`CodigoProy`);

--
-- Indices de la tabla `tad`
--
ALTER TABLE `tad`
  ADD PRIMARY KEY (`CodigoTAD`);

--
-- Indices de la tabla `technicalreport`
--
ALTER TABLE `technicalreport`
  ADD PRIMARY KEY (`CodigoTR`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`LoginU`);

--
-- Indices de la tabla `usuario_articulo`
--
ALTER TABLE `usuario_articulo`
  ADD PRIMARY KEY (`CodigoA`,`LoginU`);

--
-- Indices de la tabla `usuario_congreso`
--
ALTER TABLE `usuario_congreso`
  ADD PRIMARY KEY (`LoginU`,`CodigoC`,`TipoParticipacionC`);

--
-- Indices de la tabla `usuario_libro`
--
ALTER TABLE `usuario_libro`
  ADD PRIMARY KEY (`CodigoL`,`LoginU`);

--
-- Indices de la tabla `usuario_pfc`
--
ALTER TABLE `usuario_pfc`
  ADD PRIMARY KEY (`CodigoPFC`,`LoginU`);

--
-- Indices de la tabla `usuario_ponencia`
--
ALTER TABLE `usuario_ponencia`
  ADD PRIMARY KEY (`CodigoP`,`LoginU`);

--
-- Indices de la tabla `usuario_proyecto`
--
ALTER TABLE `usuario_proyecto`
  ADD PRIMARY KEY (`CodigoProy`,`LoginU`);

--
-- Indices de la tabla `usuario_technicalreport`
--
ALTER TABLE `usuario_technicalreport`
  ADD PRIMARY KEY (`CodigoTR`,`LoginU`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `CodigoA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `congreso`
--
ALTER TABLE `congreso`
  MODIFY `CodigoC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estancia`
--
ALTER TABLE `estancia`
  MODIFY `CodigoE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `CodigoL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `CodigoM` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ponencia`
--
ALTER TABLE `ponencia`
  MODIFY `CodigoP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `CodigoProy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `technicalreport`
--
ALTER TABLE `technicalreport`
  MODIFY `CodigoTR` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
