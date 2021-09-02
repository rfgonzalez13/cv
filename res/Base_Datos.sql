-- phpMyAdmin SQL Dump
-- version 2.6.3-rc1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Sep 04, 2007 at 04:03 PM
-- Server version: 4.1.12
-- PHP Version: 5.0.4
-- 
-- Database: `datos_curriculares`
-- 
CREATE DATABASE `datos_curriculares` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE datos_curriculares;

-- --------------------------------------------------------

-- 
-- Table structure for table `articulo`
-- 

CREATE TABLE `articulo` (
  `CodigoA` int(11) NOT NULL auto_increment,
  `AutoresA` varchar(200) NOT NULL default '',
  `TituloA` varchar(100) NOT NULL default '',
  `TituloR` varchar(100) NOT NULL default '',
  `ISSN` varchar(13) NOT NULL default '',
  `VolumenR` varchar(4) default NULL,
  `PagIniA` int(4) default NULL,
  `PagFinA` int(4) default NULL,
  `FechaPublicacionR` date default NULL,
  `EstadoA` enum('Enviado','Revision','Publicado') NOT NULL default 'Publicado',
  PRIMARY KEY  (`CodigoA`)
);

-- --------------------------------------------------------

-- 
-- Table structure for table `congreso`
-- 

CREATE TABLE `congreso` (
  `CodigoC` int(11) NOT NULL auto_increment,
  `NombreC` varchar(100) NOT NULL default '',
  `AcronimoC` varchar(20) NOT NULL default '',
  `AnhoC` year(4) NOT NULL default '0000',
  `LugarC` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`CodigoC`)
);

-- --------------------------------------------------------

-- 
-- Table structure for table `estancia`
-- 

CREATE TABLE `estancia` (
  `CodigoE` int(11) NOT NULL auto_increment,
  `CentroE` varchar(100) NOT NULL default '',
  `UniversidadE` varchar(40) NOT NULL default '',
  `PaisE` varchar(20) NOT NULL default '',
  `FechaInicioE` date NOT NULL default '0000-00-00',
  `FechaFinE` date NOT NULL default '0000-00-00',
  `TipoE` enum('Investigacion','Doctorado','Invitado') NOT NULL default 'Investigacion',
  `LoginU` varchar(15) NOT NULL default '',
  PRIMARY KEY  (`CodigoE`)
);

-- --------------------------------------------------------

-- 
-- Table structure for table `libro`
-- 

CREATE TABLE `libro` (
  `CodigoL` int(11) NOT NULL auto_increment,
  `AutoresL` varchar(200) NOT NULL default '',
  `TituloL` varchar(100) NOT NULL default '',
  `ISBN` varchar(13) NOT NULL default '',
  `PagIniL` varchar(4) default NULL,
  `PagFinL` varchar(4) default NULL,
  `VolumenL` varchar(4) default NULL,
  `EditorialL` varchar(100) default NULL,
  `FechaPublicacionL` date NOT NULL default '0000-00-00',
  `EditorL` varchar(100) default NULL,
  `PaisEdicionL` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`CodigoL`)
);

-- --------------------------------------------------------

-- 
-- Table structure for table `materia`
-- 

CREATE TABLE `materia` (
  `CodigoM` int(11) NOT NULL auto_increment,
  `TipoM` enum('Grado','Tercer Ciclo','Curso','Master','Postgrado') NOT NULL default 'Grado',
  `TipoParticipacionM` enum('Docente','Director') NOT NULL default 'Docente',
  `DenominacionM` varchar(100) NOT NULL default '',
  `TitulacionM` varchar(100) NOT NULL default '',
  `AnhoAcademicoM` varchar(11) NOT NULL default '',
  `CreditosTeoM` char(3) NOT NULL default '0',
  `CreditosPraM` char(3) NOT NULL default '0',
  `CuatrimestreM` enum('Primero','Segundo','Anual') NOT NULL default 'Primero',
  `LoginU` varchar(15) NOT NULL default '',
  PRIMARY KEY  (`CodigoM`)
);


-- --------------------------------------------------------

-- 
-- Table structure for table `pfc`
-- 

CREATE TABLE `pfc` (
  `CodigoPFC` varchar(10) NOT NULL default '',
  `TituloPFC` varchar(100) NOT NULL default '',
  `AlumnoPFC` varchar(40) NOT NULL default '',
  `FechaLecturaPFC` date default NULL,
  `CalificacionPFC` enum('Aprobado','Notable','Sobresaliente','Matricula') default NULL,
  PRIMARY KEY  (`CodigoPFC`)
);

-- --------------------------------------------------------

-- 
-- Table structure for table `ponencia`
-- 

CREATE TABLE `ponencia` (
  `CodigoP` int(11) NOT NULL auto_increment,
  `AutoresP` varchar(200) NOT NULL default '',
  `TituloP` varchar(100) NOT NULL default '',
  `CongresoP` varchar(40) NOT NULL default '',
  `FechaIniCP` date NOT NULL default '0000-00-00',
  `FechaFinCP` date NOT NULL default '0000-00-00',
  `LugarCP` varchar(20) NOT NULL default '',
  `PaisCP` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`CodigoP`)
);

-- --------------------------------------------------------

-- 
-- Table structure for table `proyecto`
-- 

CREATE TABLE `proyecto` (
  `CodigoProy` int(11) NOT NULL auto_increment,
  `TituloProy` varchar(100) NOT NULL default '',
  `EntidadFinanciadora` varchar(40) NOT NULL default '',
  `AcronimoProy` varchar(20) NOT NULL default '',
  `AnhoInicioProy` year(4) NOT NULL default '0000',
  `AnhoFinProy` year(4) NOT NULL default '0000',
  `Importe` int(11) NOT NULL default '0',
  PRIMARY KEY  (`CodigoProy`)
);

-- --------------------------------------------------------

-- 
-- Table structure for table `tad`
-- 

CREATE TABLE `tad` (
  `CodigoTAD` varchar(10) NOT NULL default '',
  `TituloTAD` varchar(100) NOT NULL default '',
  `AlumnoTAD` varchar(40) NOT NULL default '',
  `FechaLecturaTAD` date default NULL,
  `LoginU` varchar(15) NOT NULL default '',
  PRIMARY KEY  (`CodigoTAD`)
);


-- --------------------------------------------------------

-- 
-- Table structure for table `technicalreport`
-- 

CREATE TABLE `technicalreport` (
  `CodigoTR` int(11) NOT NULL auto_increment,
  `AutoresTR` varchar(200) NOT NULL default '',
  `TituloTR` varchar(100) NOT NULL default '',
  `DepartamentoTR` varchar(100) NOT NULL default '',
  `UniversidadTR` varchar(40) NOT NULL default '',
  `FechaTR` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`CodigoTR`)
);

-- --------------------------------------------------------

-- 
-- Table structure for table `usuario`
-- 

CREATE TABLE `usuario` (
  `LoginU` varchar(15) NOT NULL default '',
  `PasswordU` varchar(32) NOT NULL default '',
  `NombreU` varchar(15) NOT NULL default '',
  `ApellidosU` varchar(30) NOT NULL default '',
  `TituloAcademicoU` varchar(100) NOT NULL default '',
  `TipoContratoU` varchar(40) NOT NULL default '',
  `CentroU` varchar(100) NOT NULL default '',
  `DepartamentoU` varchar(100) NOT NULL default '',
  `UniversidadU` varchar(40) NOT NULL default '',
  `TipoU` enum('A','P') NOT NULL default 'P',
  PRIMARY KEY  (`LoginU`)
);

-- 
-- Dumping data for table `usuario`
-- 

INSERT INTO `usuario` VALUES ('admin', 'e0b7feb3cf3e7d177da400774de0af5b', 'Administrador', '', '', '', '', '', '', 'A');

INSERT INTO `usuario` VALUES ('floro', '8ff72d70d87ae08c3f76d990744b91b4', 'Florentino', 'Fernández Riverola', 'Titular de Universidad', 'Plantilla', 'Escuela Superior de Ingeniería Informática', 'Informática', 'Universidad de Vigo', 'A');



-- --------------------------------------------------------

-- 
-- Table structure for table `usuario_articulo`
-- 

CREATE TABLE `usuario_articulo` (
  `CodigoA` int(11) NOT NULL default '0',
  `LoginU` varchar(15) NOT NULL default '',
  PRIMARY KEY  (`CodigoA`,`LoginU`)
);

-- --------------------------------------------------------

-- 
-- Table structure for table `usuario_congreso`
-- 

CREATE TABLE `usuario_congreso` (
  `LoginU` varchar(15) NOT NULL default '',
  `CodigoC` int(11) NOT NULL default '0',
  `TipoParticipacionC` enum('MCO','MCC','R','C','PCO','PCC') NOT NULL default 'MCO',
  PRIMARY KEY  (`LoginU`,`CodigoC`,`TipoParticipacionC`)
);

-- --------------------------------------------------------

-- 
-- Table structure for table `usuario_libro`
-- 

CREATE TABLE `usuario_libro` (
  `CodigoL` int(11) NOT NULL default '0',
  `LoginU` varchar(15) NOT NULL default '',
  PRIMARY KEY  (`CodigoL`,`LoginU`)
);

-- --------------------------------------------------------

-- 
-- Table structure for table `usuario_pfc`
-- 

CREATE TABLE `usuario_pfc` (
  `CodigoPFC` varchar(10) NOT NULL default '',
  `LoginU` varchar(15) NOT NULL default '',
  PRIMARY KEY  (`CodigoPFC`,`LoginU`)
);

-- --------------------------------------------------------

-- 
-- Table structure for table `usuario_ponencia`
-- 

CREATE TABLE `usuario_ponencia` (
  `CodigoP` int(11) NOT NULL default '0',
  `LoginU` varchar(15) NOT NULL default '',
  PRIMARY KEY  (`CodigoP`,`LoginU`)
);

-- --------------------------------------------------------

-- 
-- Table structure for table `usuario_proyecto`
-- 

CREATE TABLE `usuario_proyecto` (
  `CodigoProy` int(11) NOT NULL default '0',
  `LoginU` varchar(15) NOT NULL default '',
  `TipoParticipacionProy` enum('Investigador','Investigador Principal') NOT NULL default 'Investigador',
  PRIMARY KEY  (`CodigoProy`,`LoginU`)
);

-- --------------------------------------------------------

-- 
-- Table structure for table `usuario_technicalreport`
-- 

CREATE TABLE `usuario_technicalreport` (
  `CodigoTR` int(11) NOT NULL default '0',
  `LoginU` varchar(15) NOT NULL default '',
  PRIMARY KEY  (`CodigoTR`,`LoginU`)
);
