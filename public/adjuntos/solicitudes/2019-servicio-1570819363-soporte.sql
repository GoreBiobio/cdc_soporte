-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 10-10-2019 a las 19:26:45
-- Versión del servidor: 5.7.27-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.23-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `soporte`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodegas`
--

CREATE TABLE `bodegas` (
  `idBod` int(11) NOT NULL,
  `nombreBod` varchar(30) DEFAULT NULL,
  `ubiqEdificioBod` varchar(50) DEFAULT NULL,
  `estadoBod` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bodegas`
--

INSERT INTO `bodegas` (`idBod`, `nombreBod`, `ubiqEdificioBod`, `estadoBod`) VALUES
(1, 'Edificio Principal', 'Bodega 1', 'Activa'),
(2, 'Edificio Principal', 'Bodega 2', 'Activa'),
(3, 'Edificio Principal', 'Bodega 3', 'Activa'),
(4, 'Edificio Principal', 'Bodega 4', 'Activa'),
(5, 'Edificio Principal', 'Bodega 5', 'Activa'),
(6, 'Edificio Principal', 'Bodega 6', 'Activa'),
(7, 'Edificio Principal', 'Bodega 7', 'Activa'),
(8, 'Edificio Principal', 'Bodega 8', 'Activa'),
(9, 'Edificio Principal', 'Bodega 9', 'Activa'),
(10, 'Edificio Principal', 'Bodega 10', 'Activa'),
(11, 'Edificio Principal', 'Bodega 11', 'Activa'),
(12, 'Edificio Principal', 'Bodega 12', 'Activa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajas`
--

CREATE TABLE `cajas` (
  `idCaja` int(11) NOT NULL,
  `numCaja` varchar(3) DEFAULT NULL,
  `estadoCaja` varchar(10) DEFAULT NULL,
  `secciones_idSecc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cajas`
--

INSERT INTO `cajas` (`idCaja`, `numCaja`, `estadoCaja`, `secciones_idSecc`) VALUES
(1, 'IZQ', 'Activa', 1),
(2, 'DER', 'Activa', 2),
(3, 'IZQ', 'Activa', 3),
(4, 'DER', 'Activa', 4),
(5, 'IZQ', 'Activa', 5),
(6, 'DER', 'Activa', 6),
(7, 'IZQ', 'Activa', 7),
(8, 'DER', 'Activa', 8),
(9, '-', 'Activa', 9),
(10, '-', 'Activa', 10),
(11, '-', 'Activa', 11),
(12, '-', 'Activa', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comodatos`
--

CREATE TABLE `comodatos` (
  `idComod` int(11) NOT NULL,
  `fechaIngComod` date DEFAULT NULL,
  `fechaDevEstComod` date DEFAULT NULL,
  `fechaDevolComod` date NOT NULL,
  `ubicacionEquiposComod` varchar(50) DEFAULT NULL,
  `funcRecibeComod` varchar(10) DEFAULT NULL,
  `funcEntregaComod` varchar(10) DEFAULT NULL,
  `funcApruebaComod` varchar(10) DEFAULT NULL,
  `estadoComod` varchar(20) DEFAULT NULL,
  `estadoEqComod` varchar(20) DEFAULT NULL,
  `tipoUsoComod` varchar(20) DEFAULT NULL,
  `hardwares_idHard` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configdocumentos`
--

CREATE TABLE `configdocumentos` (
  `idConfigDoc` int(11) NOT NULL,
  `pendiente` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuraciones`
--

CREATE TABLE `configuraciones` (
  `pregAEnc` text,
  `pregBEnc` text,
  `pregCEnc` text,
  `estadoPreg` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `idDepto` int(11) NOT NULL,
  `departamento` varchar(25) DEFAULT NULL,
  `estadoDepto` varchar(10) DEFAULT NULL,
  `divisiones_idDiv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`idDepto`, `departamento`, `estadoDepto`, `divisiones_idDiv`) VALUES
(1, 'Pendiente', 'Activa', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `divisiones`
--

CREATE TABLE `divisiones` (
  `idDiv` int(11) NOT NULL,
  `division` varchar(25) DEFAULT NULL,
  `estadoDiv` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `divisiones`
--

INSERT INTO `divisiones` (`idDiv`, `division`, `estadoDiv`) VALUES
(1, 'Pendiente', 'Activa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `idDoc` int(11) NOT NULL,
  `nombreDoc` varchar(55) DEFAULT NULL,
  `obsDoc` text,
  `fecCargaDoc` timestamp NULL DEFAULT NULL,
  `rutaDoc` varchar(255) DEFAULT NULL,
  `nivelDoc` varchar(10) DEFAULT NULL,
  `subnivelDoc` varchar(10) DEFAULT NULL,
  `moduloDoc` varchar(10) DEFAULT NULL,
  `funcEntregaDoc` varchar(10) DEFAULT NULL,
  `funcRecibeDoc` varchar(10) DEFAULT NULL,
  `estadoDoc` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`idDoc`, `nombreDoc`, `obsDoc`, `fecCargaDoc`, `rutaDoc`, `nivelDoc`, `subnivelDoc`, `moduloDoc`, `funcEntregaDoc`, `funcRecibeDoc`, `estadoDoc`) VALUES
(40, '182rh-mo2z0.csv', NULL, '2019-10-09 11:58:29', '2019-servicio-1570633109-182rh-mo2z0.csv', 'servicio', '146', NULL, '35', NULL, NULL),
(41, '182rh-mo2z0.csv', NULL, '2019-10-09 11:59:26', '2019-servicio-1570633166-182rh-mo2z0.csv', 'servicio', '147', NULL, '35', NULL, NULL),
(42, '182rh-mo2z0.csv', NULL, '2019-10-09 11:59:39', '2019-servicio-1570633179-182rh-mo2z0.csv', 'servicio', '148', NULL, '35', NULL, NULL),
(43, 'vc1rx-0in64.csv', NULL, '2019-10-09 12:00:24', '2019-servicio-1570633224-vc1rx-0in64.csv', 'servicio', '149', NULL, '35', NULL, NULL),
(44, 'lbestias.pdf', NULL, '2019-10-09 12:00:37', '2019-servicio-1570633237-lbestias.pdf', 'servicio', '150', NULL, '10', NULL, NULL),
(45, 'vc1rx-0in64.csv', NULL, '2019-10-09 12:00:43', '2019-servicio-1570633243-vc1rx-0in64.csv', 'servicio', '151', NULL, '35', NULL, NULL),
(46, 'imagen.JPG', NULL, '2019-10-09 16:31:25', '2019-servicio-1570649485-imagen.JPG', 'servicio', '153', NULL, '89', NULL, NULL),
(47, '71tj7-tco1z.csv', NULL, '2019-10-10 09:33:25', '2019-servicio-1570710805-71tj7-tco1z.csv', 'servicio', '157', NULL, '102', NULL, NULL),
(48, 'foto de prueba.PNG', NULL, '2019-10-10 16:15:26', '2019-servicio-1570734926-foto de prueba.PNG', 'servicio', '164', NULL, '82', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestasopmant`
--

CREATE TABLE `encuestasopmant` (
  `idEncSop` int(11) NOT NULL,
  `fecCreaEncSop` datetime DEFAULT NULL,
  `respASop` varchar(1) DEFAULT NULL,
  `respBSop` varchar(1) DEFAULT NULL,
  `respCSop` varchar(1) DEFAULT NULL,
  `tipoEncSopMan` varchar(10) DEFAULT NULL,
  `funcRespoEnc` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `idEstado` int(11) NOT NULL,
  `nombreEstado` varchar(20) DEFAULT NULL,
  `nivelEstado` varchar(40) DEFAULT NULL,
  `subnivelEstado` varchar(40) DEFAULT NULL,
  `estadoEstado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`idEstado`, `nombreEstado`, `nivelEstado`, `subnivelEstado`, `estadoEstado`) VALUES
(1, 'En Funciones', 'Funcionarios', 'Nuevo', 'Activa'),
(2, 'Ex - Funcionario', 'Funcionarios', 'Nuevo', 'Activa'),
(3, 'Nuevo', 'Hardware', 'Nuevo', 'Activa'),
(4, 'Usado', 'Hardware', 'Nuevo', 'Activa'),
(5, 'Liberado', 'Hardware', 'NuevoB', 'Activa'),
(6, 'En Comodato', 'Hardware', 'NuevoB', 'Activa'),
(10, 'Creación Interna', 'Soporte', 'Interno', 'Activa'),
(11, 'Para Baja', 'Hardware', 'NuevoB', 'Activa'),
(12, 'Activo', 'Comodato', 'Comodato', 'Activa'),
(13, 'Archivo', 'Comodato', 'Comodato', 'Activa'),
(14, 'Creación Interna', 'Soportes', 'Gestion', 'Activa'),
(15, 'En Asignación', 'Soportes', 'Gestion', 'Activa'),
(16, 'Asignado', 'Soportes', 'Gestion', 'Activa'),
(17, 'Cerrado Informática', 'Soportes', 'Gestión', 'Activa'),
(18, 'Evaluado', 'Soportes', 'Gestión', 'Activa'),
(19, 'Archivado', 'Soportes', 'Gestión', 'Activa'),
(20, 'Anulado por Usuario', 'Soportes', 'Gestion', 'Activa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciones_soportes`
--

CREATE TABLE `evaluaciones_soportes` (
  `idEval` int(11) NOT NULL,
  `calificacionEval` int(11) NOT NULL,
  `obsEval` varchar(255) DEFAULT NULL,
  `fechaEval` datetime NOT NULL,
  `idSolSop` int(11) NOT NULL,
  `tipoEval` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evaluaciones_soportes`
--

INSERT INTO `evaluaciones_soportes` (`idEval`, `calificacionEval`, `obsEval`, `fechaEval`, `idSolSop`, `tipoEval`) VALUES
(8, 1, 'muy buena atención', '2019-10-10 11:01:59', 158, 'servicio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `idFac` int(11) NOT NULL,
  `fecCargaFac` timestamp NULL DEFAULT NULL,
  `numFac` varchar(10) DEFAULT NULL,
  `montoFac` int(11) DEFAULT NULL,
  `fecCompraFac` date DEFAULT NULL,
  `obsFac` text,
  `fecVencGarantiaFac` date DEFAULT NULL,
  `estadoFac` varchar(10) DEFAULT NULL,
  `proveedores_idProv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`idFac`, `fecCargaFac`, `numFac`, `montoFac`, `fecCompraFac`, `obsFac`, `fecVencGarantiaFac`, `estadoFac`, `proveedores_idProv`) VALUES
(1, '2018-05-23 16:00:00', '000000', 0, '2018-05-23', 'NULL', '2018-05-23', 'Activa', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionarios`
--

CREATE TABLE `funcionarios` (
  `idFunc` int(11) NOT NULL,
  `fecCreaFunc` timestamp NULL DEFAULT NULL,
  `rutFunc` varchar(13) DEFAULT NULL,
  `paternoFunc` varchar(20) DEFAULT NULL,
  `maternoFunc` varchar(20) DEFAULT NULL,
  `nombresFunc` varchar(25) DEFAULT NULL,
  `correoFunc` varchar(55) DEFAULT NULL,
  `anexoFunc` varchar(5) DEFAULT NULL,
  `fonoFunc` varchar(12) DEFAULT NULL,
  `fecBajaFunc` date DEFAULT NULL,
  `motivoBajaFunc` varchar(20) DEFAULT NULL,
  `contratoFunc` varchar(20) DEFAULT NULL,
  `estadoFunc` varchar(10) DEFAULT NULL,
  `jefatura` varchar(20) NOT NULL,
  `departamentos_idDepto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `funcionarios`
--

INSERT INTO `funcionarios` (`idFunc`, `fecCreaFunc`, `rutFunc`, `paternoFunc`, `maternoFunc`, `nombresFunc`, `correoFunc`, `anexoFunc`, `fonoFunc`, `fecBajaFunc`, `motivoBajaFunc`, `contratoFunc`, `estadoFunc`, `jefatura`, `departamentos_idDepto`) VALUES
(1, '2019-10-09 00:00:01', '17.745.791-4', 'ABELLO', 'AGUILLON', 'ANA MARIA', '11gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(2, '2019-10-09 00:00:01', '18.814.268-0', 'ACUÑA', 'VELASQUEZ', 'INES', '21gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(3, '2019-10-09 00:00:01', '18.109.478-8', 'AGUAYO', 'RIVAS', 'ROBERT', '31gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(4, '2019-10-09 00:00:01', '13.578.477-K', 'ALARCON', 'GONZALEZ', 'MILTON', '41gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(5, '2019-10-09 00:00:01', '17.584.385-K', 'ANTINAO', 'QUEZADA', 'CLAUDIA', '51gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(6, '2019-10-09 00:00:01', '16.338.111-7', 'ANUCH', 'MEDINA', 'LEYLA', '61gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(7, '2019-10-09 00:00:01', '16.768.408-4', 'ARAVENA', 'URCELAY', 'IGNACIO ', '71gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(8, '2019-10-09 00:00:01', '10.024.633-3', 'ARRIAGADA', 'LOBOS', 'CAROLINA', '81gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(9, '2019-10-09 00:00:01', '8.923.509-K', 'ASIAIN', 'MADRIAGA', 'NICOLAS', '91gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(10, '2019-10-09 00:00:01', '5.012.862-8', 'BAHAMONDES', 'COHAS', 'NORA', '101gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(11, '2019-10-09 00:00:01', '13.319.402-9', 'BAHRE', 'JOFRE', 'VIVIANNE', '111gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(12, '2019-10-09 00:00:01', '6.694.148-5', 'BARRIA', 'PEREZ', 'SERGIO ', '121gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(13, '2019-10-09 00:00:01', '17.548.397-7', 'BASTIAS', 'ORELLANA', 'LEONARDO', '131gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(14, '2019-10-09 00:00:01', '6.234.669-8', 'BELMAR', 'RUIZ', 'MARIA', '141gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(15, '2019-10-09 00:00:01', '8.009.627-5', 'BENAVENTE', 'SANI', 'VERONICA ', '151gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(16, '2019-10-09 00:00:01', '13.725.489-1', 'BERRIOS', 'GARATE', 'MIGUEL', '161gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(17, '2019-10-09 00:00:01', '14.519.366-4', 'BESTWICK', 'SALDIVIA', 'VANESSA', '171gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(18, '2019-10-09 00:00:01', '7.766.863-2', 'BORQUEZ', 'ELGUETA', 'HILDA', '181gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(19, '2019-10-09 00:00:01', '35706009-7', 'BRITO', 'MENDOZA', 'GILLERMO', '191gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(20, '2019-10-09 00:00:01', '4.959.505-0', 'CABA', 'ARRIAGADA', 'NELSON', '201gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(21, '2019-10-09 00:00:01', '12.553.278-0', 'CACERES', 'HERNANDEZ', 'MARIO', '211gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(22, '2019-10-09 00:00:01', '10.129.385-8', 'CARRASCO', 'LOPEZ', 'ALEJANDRO', '221gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(23, '2019-10-09 00:00:01', '10.665.930-3', 'CARRASCO', 'MUÑOZ', 'JACQUELINE', 'jcarrasco@gorebiobio.cl', '753', '0', '2019-10-09', '', '1', '1', '', 1),
(24, '2019-10-09 00:00:01', '13.951.540-4', 'CASTILLO', 'CRUZ', 'CAMILA', '241gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(25, '2019-10-09 00:00:01', '9.754.309-7', 'CERDA', 'MONSALVE', 'EDGARDO', '251gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(26, '2019-10-09 00:00:01', '16.598.460-9', 'CERNA', 'VERA', 'JAVIER', '261gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(27, '2019-10-09 00:00:01', '18.815.150-7', 'CISTERNAS', 'RAMIREZ', 'MICHELLE', '271gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(28, '2019-10-09 00:00:01', '19.596.562-5', 'COFRE', 'CARRILLO', 'POLET', '281gore@gorebiobio.cl', '769', '0', '2019-10-09', '', '1', '1', '', 1),
(29, '2019-10-09 00:00:01', '13.307.330-2', 'CUEVAS', 'MATAMALA', 'LUIS', '291gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(30, '2019-10-09 00:00:01', '10.636.952-6', 'DIAZ', 'OBANDO', 'JORGE', '301gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(31, '2019-10-09 00:00:01', '19.087.617-9', 'FLORES', 'GONZALEZ', 'CRISTIAN', '311gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(32, '2019-10-09 00:00:01', '15.201.240-3', 'GALILEA', 'SAN MARTIN', 'KARINA', '321gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(33, '2019-10-09 00:00:01', '17.043.389-0', 'GOMEZ', 'LANDA', 'ROCIO', '331gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(34, '2019-10-09 00:00:01', '15.671.580-8', 'GONZALEZ', 'LUNA', 'CLAUDIA', '341gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(35, '2019-10-09 00:00:01', '17.574.786-9', 'GUTIERREZ', 'FARIÑA', 'DANIEL ESTEBAN', 'dgutierrez@gorebiobio.cl', '782', '0', '2019-10-09', '', '1', '1', '', 1),
(36, '2019-10-09 00:00:01', '12.299.829-0', 'GUZMAN', 'BAYLE', 'ANDREA', '361gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(37, '2019-10-09 00:00:01', '11.100.303-3', 'GUZMAN', 'CONTRERAS', 'RUTH', '371gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(38, '2019-10-09 00:00:01', '15.881.337-8', 'GUZMAN', 'TORRES', 'VANESSA', '381gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(39, '2019-10-09 00:00:01', '9.361.856-4', 'HINOJOSA', 'MONTECINOS', 'MIGUEL', '391gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(40, '2019-10-09 00:00:01', '9.985.881-8', 'ILLANES', 'PERDIGERO', 'MARIA EUGENIA', '401gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(41, '2019-10-09 00:00:01', '12.921.113-K', 'INOSTROZA', 'AGUILAR', 'JEANNETE', '411gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(42, '2019-10-09 00:00:01', '13.624.698-4', 'INOSTROZA', 'INZUNZA', 'KATHERINE', '421gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(43, '2019-10-09 00:00:01', '16.152.686-K', 'JASMA', 'MELO', 'ISMAEL', '431gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(44, '2019-10-09 00:00:01', '7.136.393-7', 'LAMA', 'BENAVIDEZ', 'RAFAEL ', '441gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(45, '2019-10-09 00:00:01', '15.593.018-7', 'LARENAS', 'VEGA', 'FRANCISCO', '451gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(46, '2019-10-09 00:00:01', '6.265.787-1', 'LAVANDEROS', 'POBLETE', 'WENCESLAO', '461gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(47, '2019-10-09 00:00:01', '8.630.607-7', 'LOBO', 'ROJAS', 'MARIO', '471gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(48, '2019-10-09 00:00:01', '9.396.095-5', 'MARINA', 'LEAL', 'LUZ', '481gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(49, '2019-10-09 00:00:01', '14.282.437-K', 'MENDOZA', 'QUINTANA', 'ANDREA', '491gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(50, '2019-10-09 00:00:01', '17.887.726-7', 'MERINO', 'CUEVAS', 'KATHERINE', '501gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(51, '2019-10-09 00:00:01', '17.209.169-7', 'MIRANDA', 'CASTRO', 'SIXTO', '511gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(52, '2019-10-09 00:00:01', '6.851.219-0', 'MONSALVE', 'CASTILLO', 'MARLENE', '521gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(53, '2019-10-09 00:00:01', '14.562.859-8', 'MONTALDO', 'MONTALDO', 'JAZMIN', '531gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(54, '2019-10-09 00:00:01', '14.059.965-4', 'MONTECINO', 'CAMPOS', 'PAULINA', '541gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(55, '2019-10-09 00:00:01', '13.829.584-2', 'MOSSO', 'ESCUDERO', 'FELIPE', '551gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(56, '2019-10-09 00:00:01', '16.152.395-k', 'MUÑOZ', 'CRUZ', 'ROXANA', 'rmunoz@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(57, '2019-10-09 00:00:01', '12.554.896-2', 'MUÑOZ', 'VENEGAS', 'VIVIANE', 'vmunoz@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(58, '2019-10-09 00:00:01', '16.329.999-2', 'NAVARRO', 'SAGREDO', 'MIGUEL', '581gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(59, '2019-10-09 00:00:01', '9.760.648-K', 'NORAMBUENA', 'FARIAS', 'CECILIA', '591gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(60, '2019-10-09 00:00:01', '15.614.086-4', 'NUÑEZ', 'SILVA', 'CESAR', 'cnunez@gorebiobio.cl', '834', '0', '2019-10-09', '', '1', '1', '', 1),
(61, '2019-10-09 00:00:01', '6.840.539-9', 'ORELLANA', 'ABURTO', 'SUSANA ', '611gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(62, '2019-10-09 00:00:01', '15.929.064-6', 'ORTIZ', 'RIFO', 'MARIA', '621gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(63, '2019-10-09 00:00:01', '10.980.723-0', 'PALMA', 'RAMIREZ', 'GUILLERMO ', '631gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(64, '2019-10-09 00:00:01', '16.140.634-1', 'PARDO', 'OPAZO', 'SILVANA', '641gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(65, '2019-10-09 00:00:01', '7.059.834-5', 'PARGA', 'TALPEN', 'GUILLERMO ', '651gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(66, '2019-10-09 00:00:01', '10.861.071-9', 'PEDREROS', 'CAMPOS', 'PAMELA ', '661gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(67, '2019-10-09 00:00:01', '13.380.863-9', 'RABANAL', 'ZAPATA', 'PAULINA', '671gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(68, '2019-10-09 00:00:01', '6.661.785-8', 'RAMWELL', 'SOTO', 'JULIETA', '681gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(69, '2019-10-09 00:00:01', '14.244.786-K', 'REYES', 'SCHWARTZ', 'ALEJANDRO ', '691gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(70, '2019-10-09 00:00:01', '16.854.332-8', 'REYES', 'BRAVO', 'CATALINA', '701gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(71, '2019-10-09 00:00:01', '8.905.551-2', 'REYES', 'CAMUS', 'JORGE', '711gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(72, '2019-10-09 00:00:01', '18.500.208-K', 'RIQUELME', 'FUENTEALBA', 'CORINA', '721gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(73, '2019-10-09 00:00:01', '16.219.875-0', 'RIVAS', 'ESPINOZA', 'GERALDINE', '731gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(74, '2019-10-09 00:00:01', '12.699.189-4', 'RIVERA', 'ESTRADA', 'ANGELA', '741gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(75, '2019-10-09 00:00:01', '19.531.535-3', 'ROCHA', 'YAÑEZ', 'ALEJANDRA', 'arocha@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(76, '2019-10-09 00:00:01', '16.598.300-9', 'ROJAS', 'GALLARDO', 'MIREYA', '761gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(77, '2019-10-09 00:00:01', '7.393.585-0', 'ROMO', 'CARRERA', 'CLAUDIO', '771gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(78, '2019-10-09 00:00:01', '6.291.791-1', 'RUEDA', 'SAEZ', 'MERCEDES', '781gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(79, '2019-10-09 00:00:01', '6.661.785-8', 'SAAVEDRA', 'ARCE', 'JORGE', '791gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(80, '2019-10-09 00:00:01', '16.010.399-K', 'SAAVEDRA', 'ESTEFO', 'JORGE', '801gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(81, '2019-10-09 00:00:01', '6.592.392-0', 'SABAG', 'COUCHOT', 'MARCOS', '811gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(82, '2019-10-09 00:00:01', '12.532.307-3', 'SAEZ', 'REBOLLEDO', 'VERONICA', '821gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(83, '2019-10-09 00:00:01', '17.046.262-9', 'SALAS', 'CARRILLO', 'JOSELYN ', '831gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(84, '2019-10-09 00:00:01', '8.834.921-0', 'SALAZAR', 'VALDERRAMA', 'MARIA', '841gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(85, '2019-10-09 00:00:01', '14.273.359-5', 'SALDIVIA', 'OPAZO', 'ANGELICA', '851gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(86, '2019-10-09 00:00:01', '8.224.823-4', 'SALGADO', 'PARDO', 'MANUEL', '861gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(87, '2019-10-09 00:00:01', '13.904.870-9', 'SAN JUAN', 'OSORIO', 'JOSELYN', '871gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(88, '2019-10-09 00:00:01', '13.806.271-6', 'SAN MARTÍN', 'NUÑEZ', 'MICHELE', '8710gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(89, '2019-10-09 00:00:01', '13.956.538-K', 'SANCHEZ', 'DE LA PEÑA', 'OLGA', 'osanchez@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(90, '2019-10-09 00:00:01', '10.036.304-6', 'SANHUEZA', 'MUÑOZ', 'PAULA', 'psanhueza@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(91, '2019-10-09 00:00:01', '14.390.686-8', 'SANTOS', 'JIMENEZ', 'CRISTIAN', '911gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(92, '2019-10-09 00:00:01', '15.221.500-2', 'SARANDONA', 'INZUNZA', 'JESSICA', '921gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(93, '2019-10-09 00:00:01', '11.677.887-4', 'SAUERBAUM', 'MUÑOZ', 'ENRIQUE', 'esauerbaum@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(94, '2019-10-09 00:00:01', '12.208.169-9', 'SILVA', 'SANDOVAL', 'MARIEL', '941gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(95, '2019-10-09 00:00:01', '7.135.291-9', 'SOTO', 'HENRIQUEZ', 'MARGARITA', '951gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(96, '2019-10-09 00:00:01', '10.910.690-9', 'TOLEDO', 'ALARCON', 'CLAUDIA', '961gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(97, '2019-10-09 00:00:01', '10.910.687-9', 'TOLEDO', 'ALARCON', 'DANIEL', '971gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(98, '2019-10-09 00:00:01', '12.552.727-2', 'TORRES', 'PALMA', 'LORENA', '981gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(99, '2019-10-09 00:00:01', '12.763.068-2', 'VERA', 'TARBES', 'PAULINA', '991gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(100, '2019-10-09 00:00:01', '15.671.173-K', 'VERSCHEURE', 'ARAVENA', 'DANIELA', '1001gore@gorebiobio.cl', '700', '0', '2019-10-09', '', '1', '1', '', 1),
(101, '2019-10-09 00:00:01', '5.902.484-1', 'MENA', 'CISTERNAS', 'ISIDORO', 'imena@gorebiobio.cl', '875', '0', '2019-10-09', '', '1', '1', '', 1),
(102, '2019-10-09 00:00:01', '12.525.404-7', 'GATICA', 'FUENTES', 'NANCY', 'ngatica@gorebiobio.cl', '865', '0', '2019-10-09', '', '1', '1', '', 1),
(103, '2019-10-09 00:00:01', '13.627.136-9', 'SAEZ', 'SALAZAR', 'YESSICA', 'ysaez@gorebiobio.cl', '745', '0', '2019-10-09', '', '1', '1', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hardwares`
--

CREATE TABLE `hardwares` (
  `idHard` int(11) NOT NULL,
  `fecCargaHard` timestamp NULL DEFAULT NULL,
  `fol_invHard` varchar(20) DEFAULT NULL,
  `nombreHard` varchar(50) DEFAULT NULL,
  `numSerieHard` varchar(70) DEFAULT NULL,
  `imeiHard` varchar(20) DEFAULT NULL,
  `capacidadHard` varchar(4) DEFAULT NULL,
  `ramHard` varchar(3) DEFAULT NULL,
  `procesadorHard` varchar(10) DEFAULT NULL,
  `obsHard` text,
  `numTelHard` varchar(12) DEFAULT NULL,
  `ipHard` varchar(20) DEFAULT NULL,
  `comodatoHard` varchar(4) DEFAULT NULL,
  `macHard` varchar(20) DEFAULT NULL,
  `fecBajaHard` date DEFAULT NULL,
  `estadoHardNA` varchar(20) DEFAULT NULL,
  `estadoHardNB` varchar(20) DEFAULT NULL,
  `tipoHard` varchar(20) DEFAULT NULL,
  `facturas_idFac` int(11) DEFAULT NULL,
  `cajas_idCaja` int(11) DEFAULT NULL,
  `modelos_idModelo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historiales`
--

CREATE TABLE `historiales` (
  `idHist` int(11) NOT NULL,
  `fechoraHist` timestamp NULL DEFAULT NULL,
  `detalleHist` text,
  `funcReceptorHist` varchar(10) DEFAULT NULL,
  `funcEmisorHist` varchar(10) DEFAULT NULL,
  `moduloHist` varchar(25) DEFAULT NULL,
  `visibilidadHist` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `idIncid` int(11) NOT NULL,
  `fecIncid` date DEFAULT NULL,
  `horaIncid` time DEFAULT NULL,
  `detalleIncid` text,
  `obsIncid` text,
  `fechaCierreIncid` date DEFAULT NULL,
  `horaCierreIncid` time DEFAULT NULL,
  `fechaAprobIncid` date DEFAULT NULL,
  `horaAprobIncid` time DEFAULT NULL,
  `funcAprobIncid` varchar(10) DEFAULT NULL,
  `tipoInc` varchar(20) DEFAULT NULL,
  `servAfectado` varchar(20) NOT NULL,
  `estadoIncid` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `idMarca` int(11) NOT NULL,
  `marca` varchar(20) DEFAULT NULL,
  `estadoMarca` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`idMarca`, `marca`, `estadoMarca`) VALUES
(1, 'Apple', 'Activa'),
(2, 'Samsung', 'Activa'),
(3, 'Alcatel', 'Activa'),
(4, 'Sony', 'Activa'),
(5, 'Epson', 'Activa'),
(6, 'Generico', 'Activa'),
(7, 'Lenovo', 'Activa'),
(8, 'HP', 'Activa'),
(9, 'ASUS', 'Activa'),
(10, 'ViewSonic', 'Activa'),
(11, 'Toshiba', 'Activa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `idMensajesInfo` int(11) NOT NULL,
  `fecEnvioMsje` datetime DEFAULT NULL,
  `funcEnviaMsje` varchar(10) DEFAULT NULL,
  `funcRecepMsje` varchar(10) DEFAULT NULL,
  `mensaje` text,
  `respuestaMsje` text,
  `estadoMsje` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos`
--

CREATE TABLE `modelos` (
  `idModelo` int(11) NOT NULL,
  `modelo` varchar(20) DEFAULT NULL,
  `estadoModelo` varchar(10) DEFAULT NULL,
  `compModelo` varchar(20) DEFAULT NULL,
  `marcas_idMarca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `modelos`
--

INSERT INTO `modelos` (`idModelo`, `modelo`, `estadoModelo`, `compModelo`, `marcas_idMarca`) VALUES
(1, 'iPhone 5S', 'Activa', 'Telefono', 1),
(2, 'iPhone 5', 'Activa', 'Telefono', 1),
(5, 'iPhone 6', 'Activa', 'Telefono', 1),
(6, 'iPhone 6S', 'Activa', 'Telefono', 1),
(7, 'iPhone 7', 'Activa', 'Telefono', 1),
(8, 'iPhone 6PLUS', 'Activa', 'Telefono', 1),
(9, 'iPhone 5C', 'Activa', 'Telefono', 1),
(10, 'iPhone 5SE', 'Activa', 'Telefono', 1),
(11, 'Galaxy J5', 'Activa', 'Telefono', 2),
(12, 'Galaxy S6', 'Activa', 'Telefono', 2),
(13, 'Galaxy J7', 'Activa', 'Telefono', 2),
(14, 'S4 Mini', 'Activa', 'Telefono', 2),
(15, 'Pixi', 'Activa', 'Telefono', 3),
(16, 'Xperia D2533', 'Activa', 'Telefono', 4),
(17, 'iPhone 4', 'Activa', 'Telefono', 1),
(18, 'iPhone 4S', 'Activa', 'Telefono', 1),
(19, 'iPad Air', 'Activa', 'Tablet', 1),
(20, 'iPad Mini', 'Activa', 'Tablet', 1),
(21, 'iPad 1', 'Activa', 'Tablet', 1),
(22, 'L395', 'Activa', 'Impresora', 5),
(23, 'iPad PRO', 'Activa', 'Tablet', 1),
(24, 'Pantalla Generico', 'Activa', 'Pantalla', 6),
(25, 'i5-6400T', 'Activa', 'Computador', 7),
(26, 'Galaxy S8', 'Activa', 'Telefono', 2),
(27, 'VAIO', 'Activa', 'Notebook', 4),
(28, 'ThinkCentre Edge 72z', 'Activa', 'Computador', 7),
(29, 'ThinkCentre Edge 71z', 'Activa', 'Computador', 7),
(30, 'V510z', 'Activa', 'Computador', 7),
(31, 'Macbook AIR', 'Activa', 'Notebook', 1),
(32, 'V244h Monitor', 'Activa', 'Pantalla', 8),
(33, 'EliteBook 1040 G3', 'Activa', 'Notebook', 8),
(34, 'VAIO - SVF13', 'Activa', 'Notebook', 4),
(35, 'L220', 'Activa', 'Impresora', 5),
(36, 'M700z', 'Activa', 'Computador', 7),
(37, 'Macbook PRO', 'Activa', 'Notebook', 1),
(38, 'X455L', 'Activa', 'Notebook', 9),
(39, 'L380', 'Activa', 'Impresora', 5),
(40, 'HDR-PJ270', 'Activa', 'Camara', 4),
(41, 'ProBook 440 G4', 'Activa', 'Notebook', 8),
(42, 'H552A', 'Activa', 'Proyector', 5),
(43, 'VS12513', 'Activa', 'Pantalla', 10),
(44, 'EliteBook 1040 G4', 'Activa', 'Notebook', 8),
(45, 'Portege Z30-B', 'Activa', 'Notebook', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pin_funcionarios`
--

CREATE TABLE `pin_funcionarios` (
  `id_pin` int(11) NOT NULL,
  `pin` varchar(255) CHARACTER SET utf8 NOT NULL,
  `fecha_ingreso_pin` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizacion_pin` datetime DEFAULT NULL,
  `usuario_asignacion_pin` int(11) NOT NULL,
  `idFunc` int(11) NOT NULL,
  `estado_pin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamostemporales`
--

CREATE TABLE `prestamostemporales` (
  `idprestTemp` int(11) NOT NULL,
  `fecSolTemp` date DEFAULT NULL,
  `horaSolTemp` time DEFAULT NULL,
  `fecDevolTemp` date DEFAULT NULL,
  `horaDevolTemp` time DEFAULT NULL,
  `funcRecibeTemp` varchar(10) DEFAULT NULL,
  `funcEntregaTemp` varchar(10) DEFAULT NULL,
  `estadoPrestTemp` varchar(10) DEFAULT NULL,
  `obsPrestTemp` text,
  `hardwares_idHard` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `idProv` int(11) NOT NULL,
  `fecCargaProv` timestamp NULL DEFAULT NULL,
  `rutProv` varchar(13) DEFAULT NULL,
  `rsocProv` varchar(55) DEFAULT NULL,
  `correoProv` varchar(55) DEFAULT NULL,
  `fonoProv` varchar(12) DEFAULT NULL,
  `estadoProv` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`idProv`, `fecCargaProv`, `rutProv`, `rsocProv`, `correoProv`, `fonoProv`, `estadoProv`) VALUES
(1, '2018-05-23 15:41:05', '11.111.111-1', 'Interno', 'NULL', 'NULL', 'Activa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `idSecc` int(11) NOT NULL,
  `nombreSecc` varchar(30) DEFAULT NULL,
  `estadoSecc` varchar(10) DEFAULT NULL,
  `bodegas_idBod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`idSecc`, `nombreSecc`, `estadoSecc`, `bodegas_idBod`) VALUES
(1, 'Piso 1', 'Activa', 1),
(2, 'Piso 1', 'Activa', 2),
(3, 'Piso 2', 'Activa', 3),
(4, 'Piso 2', 'Activa', 4),
(5, 'Piso 3', 'Activa', 5),
(6, 'Piso 3', 'Activa', 6),
(7, 'Piso 4', 'Activa', 7),
(8, 'Piso 4', 'Activa', 8),
(9, 'Sala Servidores', 'Activa', 9),
(10, 'Oficina Informatica', 'Activa', 10),
(11, 'Shaft Edificio', 'Activa', 11),
(12, 'Otro Edificio', 'Activa', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `idServ` int(10) NOT NULL,
  `servicio` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ind_critico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`idServ`, `servicio`, `created_at`, `updated_at`, `ind_critico`) VALUES
(1, 'Impresora en Red', NULL, NULL, 0),
(2, 'Teléfono IP/Correo Electrónico', NULL, NULL, 0),
(3, 'Permisos Carpetas Compartidas', NULL, NULL, 1),
(4, 'Plataforma SAGIR', NULL, NULL, 0),
(5, 'Otros', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistema`
--

CREATE TABLE `sistema` (
  `id_sis` int(11) NOT NULL,
  `nombre_sis` varchar(45) NOT NULL,
  `fecha_creacion_sis` datetime NOT NULL,
  `version_sis` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `softwares`
--

CREATE TABLE `softwares` (
  `idSoft` int(11) NOT NULL,
  `fecCargaSoft` timestamp NULL DEFAULT NULL,
  `nombreSoft` varchar(50) DEFAULT NULL,
  `obsSoft` text,
  `comodatoSoft` varchar(4) DEFAULT NULL,
  `fecCadLicSoft` date DEFAULT NULL,
  `tipoASoft` varchar(10) DEFAULT NULL,
  `tipoBSoft` varchar(10) DEFAULT NULL,
  `tipoCSoft` varchar(10) DEFAULT NULL,
  `estadoSoft` varchar(10) DEFAULT NULL,
  `cantidadSoft` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `software_equipo`
--

CREATE TABLE `software_equipo` (
  `id_seq` int(11) NOT NULL,
  `fecha_instalacion_seq` datetime NOT NULL,
  `estado_seq` int(11) NOT NULL,
  `fecha_registro_seq` datetime DEFAULT NULL,
  `id_hard` int(11) NOT NULL,
  `idsoft` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudmantenciones`
--

CREATE TABLE `solicitudmantenciones` (
  `idSolMant` int(11) NOT NULL,
  `fecCreaMant` datetime DEFAULT NULL,
  `solicitudMant` text,
  `hardSoftMant` varchar(10) DEFAULT NULL,
  `obsMant` text,
  `fecCierreMant` datetime DEFAULT NULL,
  `fecAprobMant` datetime DEFAULT NULL,
  `obsCierreMant` text,
  `tipoMantA` varchar(10) DEFAULT NULL,
  `tipoMantB` varchar(10) DEFAULT NULL,
  `tipoMantC` varchar(10) DEFAULT NULL,
  `funcSolicMant` varchar(10) DEFAULT NULL,
  `funcRespoMant` varchar(10) DEFAULT NULL,
  `funcAprobMant` varchar(10) DEFAULT NULL,
  `estadoMant` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudsoportes`
--

CREATE TABLE `solicitudsoportes` (
  `idSolSop` int(11) NOT NULL,
  `fecCreaSop` datetime DEFAULT NULL,
  `solicitudSop` text,
  `hardSop` varchar(10) DEFAULT NULL,
  `obsSoftSop` text,
  `fecCierreSop` datetime DEFAULT NULL,
  `fecAprobSop` datetime DEFAULT NULL,
  `obsCierreSop` text,
  `tipoSopA` varchar(20) DEFAULT NULL,
  `tipoSopB` varchar(20) DEFAULT NULL,
  `tipoSopC` varchar(20) DEFAULT NULL,
  `tipoSopD` varchar(20) NOT NULL,
  `funcSolicSop` varchar(10) DEFAULT NULL,
  `funcRespoSop` varchar(10) DEFAULT NULL,
  `funcAprobSop` varchar(10) DEFAULT NULL,
  `estadoCritSop` varchar(10) DEFAULT NULL,
  `estadoSop` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_servicio`
--

CREATE TABLE `solicitud_servicio` (
  `idSolServ` int(10) UNSIGNED NOT NULL,
  `fecCreaSolServ` datetime NOT NULL,
  `solicitudServ` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `obsSolServ` text COLLATE utf8mb4_unicode_ci,
  `fecCierreSolServ` datetime DEFAULT NULL,
  `fecAprobSolServ` datetime DEFAULT NULL,
  `obsCierreSolServ` text COLLATE utf8mb4_unicode_ci,
  `tipoSolServA` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipoSolServB` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipoSolServC` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipoSSolServD` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `funcSolServ` int(11) DEFAULT NULL,
  `funcRespoSolServ` int(11) DEFAULT NULL,
  `funcAprobSolServ` int(11) DEFAULT NULL,
  `estadoCritSolServ` int(11) DEFAULT NULL,
  `estadoSolServ` int(11) DEFAULT NULL,
  `idServ` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `solicitud_servicio`
--

INSERT INTO `solicitud_servicio` (`idSolServ`, `fecCreaSolServ`, `solicitudServ`, `obsSolServ`, `fecCierreSolServ`, `fecAprobSolServ`, `obsCierreSolServ`, `tipoSolServA`, `tipoSolServB`, `tipoSolServC`, `tipoSSolServD`, `funcSolServ`, `funcRespoSolServ`, `funcAprobSolServ`, `estadoCritSolServ`, `estadoSolServ`, `idServ`, `created_at`, `updated_at`) VALUES
(153, '2019-10-09 16:31:25', 'Al abril alguna aplicacion de office abre ventana emergene con mensaje que indica \"esta copia de microsoft office no esta activida\".', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 89, NULL, NULL, 2, 15, 5, '2019-10-09 16:31:25', '2019-10-09 16:31:25'),
(154, '2019-10-09 16:41:38', 'no imprime la impresosa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 85, NULL, NULL, 1, 20, 5, '2019-10-09 16:41:38', '2019-10-09 16:41:38'),
(155, '2019-10-09 17:35:50', 'ok', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, NULL, NULL, 2, 20, 1, '2019-10-09 17:35:50', '2019-10-09 17:35:50'),
(156, '2019-10-10 08:41:23', 'volver a etapa anterior inciativa 400000000000 solo para test. 8.41 am', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 93, NULL, NULL, 3, 20, 4, '2019-10-10 08:41:23', '2019-10-10 08:41:23'),
(157, '2019-10-10 09:33:25', 'aa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 102, NULL, NULL, 2, 20, 5, '2019-10-10 09:33:25', '2019-10-10 09:33:25'),
(158, '2019-10-10 10:12:54', 'NO LLEGAN LOS SCANNER DE LA IMPRESORA DAF', 'Se comprueba el envio de scanner y se encuentran funcionando', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 60, NULL, 2, 18, 1, '2019-10-10 10:12:54', '2019-10-10 10:12:54'),
(159, '2019-10-10 15:42:09', 'no me funciona la pagina de soporte', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 66, NULL, NULL, 1, 15, 5, '2019-10-10 15:42:09', '2019-10-10 15:42:09'),
(160, '2019-10-10 15:50:30', 'Casilla casi completa', 'Se configura autoarchivar en outlook para archivar corres mas antiguos a 2 meses', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 32, 60, NULL, 1, 16, 2, '2019-10-10 15:50:30', '2019-10-10 15:50:30'),
(161, '2019-10-10 16:03:32', 'No imprime', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 103, NULL, NULL, 2, 15, 1, '2019-10-10 16:03:32', '2019-10-10 16:03:32'),
(162, '2019-10-10 16:08:42', 'Creación de accesos directos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 34, NULL, NULL, 1, 15, 5, '2019-10-10 16:08:42', '2019-10-10 16:08:42'),
(163, '2019-10-10 16:11:04', 'favor cambiar mi nombre en telefono', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 34, NULL, NULL, 1, 15, 2, '2019-10-10 16:11:04', '2019-10-10 16:11:04'),
(164, '2019-10-10 16:15:26', 'Prueba', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 82, NULL, NULL, 2, 20, 4, '2019-10-10 16:15:26', '2019-10-10 16:15:26'),
(165, '2019-10-10 16:18:25', 'planilla de archivo no permite hacer modificaciones ni guardar solo quedo en modo lectura', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 34, NULL, NULL, 1, 15, 5, '2019-10-10 16:18:25', '2019-10-10 16:18:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareasycompromisos`
--

CREATE TABLE `tareasycompromisos` (
  `idTarea` int(11) NOT NULL,
  `fecCreaTarea` date DEFAULT NULL,
  `horaCreaTarea` time DEFAULT NULL,
  `detalleTarea` text,
  `obsTarea` text,
  `fechaAprobTarea` date DEFAULT NULL,
  `horaAprobTarea` time DEFAULT NULL,
  `fecCompromisoTarea` date DEFAULT NULL,
  `horaCompromisoTarea` time DEFAULT NULL,
  `ObsCierreTarea` text,
  `funcAsignaTarea` varchar(10) DEFAULT NULL,
  `funcResponTarea` varchar(10) DEFAULT NULL,
  `tipoTarea` varchar(10) DEFAULT NULL,
  `estadoTarea` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `idTipo` int(11) NOT NULL,
  `nombreTipo` varchar(20) DEFAULT NULL,
  `nivelTipo` varchar(40) DEFAULT NULL,
  `subnivelTipo` varchar(40) DEFAULT NULL,
  `estadoTipo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`idTipo`, `nombreTipo`, `nivelTipo`, `subnivelTipo`, `estadoTipo`) VALUES
(1, 'Contrata', 'Contrato', 'Nuevo', 'Activa'),
(2, 'Honorario', 'Contrato', 'Nuevo', 'Activa'),
(3, 'Planta', 'Contrato', 'Nuevo', 'Activa'),
(4, 'Código del Trabajo', 'Contrato', 'Nuevo', 'Activa'),
(5, 'Core', 'Contrato', 'Nuevo', 'Activa'),
(6, 'Externo', 'Contrato', 'Nuevo', 'Activa'),
(7, 'Teléfono', 'Hardware', 'Nuevo', 'Activa'),
(8, 'Tablet', 'Hardware', 'Nuevo', 'Activa'),
(9, 'Computador', 'Hardware', 'Nuevo', 'Activa'),
(10, 'BAM', 'Hardware', 'Nuevo', 'Activa'),
(11, 'Notebook', 'Hardware', 'Nuevo', 'Activa'),
(12, 'Netbook', 'Hardware', 'Nuevo', 'Activa'),
(13, 'Remoto', 'Mantencion', 'Solicitud', 'Activa'),
(14, 'En Oficina', 'Mantencion', 'Solicitud', 'Activa'),
(15, 'Preventiva', 'Mantencion', 'Tipo', 'Activa'),
(16, 'Correctiva', 'Mantencion', 'Tipo', 'Activa'),
(17, 'Evolutiva', 'Mantencion', 'Tipo', 'Activa'),
(18, 'Verbal', 'Soporte', 'Solicitud', 'Activa'),
(19, 'Escrita', 'Soporte', 'Solicitud', 'Activa'),
(20, 'Telefónica', 'Soporte', 'Solicitud', 'Activa'),
(21, 'Mant Correctiva', 'Soporte', 'Tipo', 'Activa'),
(22, 'Instalación', 'Soporte', 'Tipo', 'Activa'),
(23, 'Configuración', 'Soporte', 'Tipo', 'Activa'),
(24, 'Cambio', 'Soporte', 'Tipo', 'Activa'),
(25, 'Retiro', 'Soporte', 'Tipo', 'Activa'),
(26, 'Remoto', 'Soporte', 'Forma', 'Activa'),
(27, 'En Oficina', 'Soporte', 'Forma', 'Activa'),
(28, 'Ambas', 'Soporte', 'Forma', 'Activa'),
(29, 'Licenciado', 'Software', 'Nuevo', 'Activa'),
(30, 'Libre', 'Software', 'Nuevo', 'Activa'),
(31, 'Interno', 'Software', 'Nuevo', 'Activa'),
(32, 'Func. GORE', 'Software', 'Uso', 'Activa'),
(33, 'Externo', 'Software', 'Uso', 'Activa'),
(34, 'U. Informática', 'Software', 'Uso', 'Activa'),
(35, 'Carpetas Compartidas', 'Software', 'Interno', 'Activa'),
(36, 'Correo Electrónico', 'Software', 'Interno', 'Activa'),
(37, 'Otros', 'Software', 'Interno', 'Activa'),
(38, 'Alta', 'Soporte', 'Nivel', 'Activa'),
(39, 'Media', 'Soporte', 'Nivel', 'Activa'),
(40, 'Baja', 'Soporte', 'Nivel', 'Activa'),
(41, 'Impresora', 'Hardware', 'Nuevo', 'Activa'),
(42, 'Pantalla', 'Hardware', 'Nuevo', 'Activa'),
(43, 'Baja Inesperada', 'Incidencia', 'Nuevo', 'Activa'),
(44, 'Mant. Preventiva', 'Incidencia', 'Nuevo', 'Activa'),
(45, 'Mant. Correctiva', 'Incidencia', 'Nuevo', 'Activa'),
(46, 'Mant. Evolutiva', 'Incidencia', 'Nuevo', 'Activa'),
(47, 'Baja Supervisada', 'Incidencia', 'Nuevo', 'Activa'),
(48, 'Servidores', 'Incidencia', 'Servicios', 'Activa'),
(49, 'Servicio Internet', 'Incidencia', 'Servicios', 'Activa'),
(50, 'Carpetas Compartidas', 'Incidencia', 'Servicios', 'Activa'),
(51, 'Sistemas Internos', 'Incidencia', 'Servicios', 'Activa'),
(52, 'Otros', 'Incidencia', 'Servicios', 'Activa'),
(53, 'Camara', 'Hardware', 'Nuevo', 'Activa'),
(54, 'Pendiente', 'Soporte', 'Tipo', 'Activa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_evaluacion`
--

CREATE TABLE `tipos_evaluacion` (
  `idTev` int(11) NOT NULL,
  `nombreTev` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos_evaluacion`
--

INSERT INTO `tipos_evaluacion` (`idTev`, `nombreTev`) VALUES
(1, 'Muy Bueno'),
(2, 'Bueno'),
(3, 'Regular'),
(4, 'Malo'),
(5, 'Muy malo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_perfil`
--

CREATE TABLE `tipo_perfil` (
  `id_per` int(11) NOT NULL,
  `nombre_per` varchar(45) NOT NULL,
  `fecha_creacion_per` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `level` varchar(5) DEFAULT NULL,
  `subLevel` varchar(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idFuncUser` varchar(5) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `level`, `subLevel`, `created_at`, `updated_at`, `idFuncUser`, `estado`) VALUES
(1, 'Daniel Gutiérrez Fariña', 'dgutierrez@gorebiobio.cl', '$2y$10$FJ87CXRFyOk7XkCpTbmHeukegbMRmh76PmCkJen3IHUAcOpdCymGW', 'Dk81C7XYuaGl3ms0Su9GUIOdlXIR6UjH50MKW2JzJakiuEl3nI30vSETq8oj', 'NULL', 'NULL', '2018-05-17 23:17:17', '2018-05-17 23:17:17', '0', 'NULL'),
(2, 'Leonardo Bastias Orellana', 'lbastias@gorebiobio.cl', '$2y$10$FJ87CXRFyOk7XkCpTbmHeukegbMRmh76PmCkJen3IHUAcOpdCymGW', 'mS1oIv5yStMgC5x7qejSXhOID9SvmR5etbu0blPZDWrEugIPyUMG83Vk8GrU', 'NULL', 'NULL', '2018-05-17 23:17:17', '2018-05-17 23:17:17', '0', 'NULL'),
(3, 'Cesar Nuñez Silva', 'cnunez@gorebiobio.cl', '$2y$10$FJ87CXRFyOk7XkCpTbmHeukegbMRmh76PmCkJen3IHUAcOpdCymGW', '', 'NULL', 'NULL', '2018-05-17 23:17:17', '2018-05-17 23:17:17', '0', 'NULL'),
(4, 'Cristobal Salinas Ruiz-Tagle', 'csalinas@gorebiobio.cl', '$2y$10$FJ87CXRFyOk7XkCpTbmHeukegbMRmh76PmCkJen3IHUAcOpdCymGW', 'TOgOMr2VPACEjdve5GUrudUIeOD82uUoiIZDUNopsOTnuht6SEa12MD1Ec4d', 'NULL', 'NULL', '2018-06-12 23:17:17', '2018-05-17 23:17:17', '0', 'NULL');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bodegas`
--
ALTER TABLE `bodegas`
  ADD PRIMARY KEY (`idBod`);

--
-- Indices de la tabla `cajas`
--
ALTER TABLE `cajas`
  ADD PRIMARY KEY (`idCaja`,`secciones_idSecc`),
  ADD KEY `fk_cajas_secciones1_idx` (`secciones_idSecc`);

--
-- Indices de la tabla `comodatos`
--
ALTER TABLE `comodatos`
  ADD PRIMARY KEY (`idComod`,`hardwares_idHard`),
  ADD KEY `fk_comodatos_hardwares1_idx` (`hardwares_idHard`);

--
-- Indices de la tabla `configdocumentos`
--
ALTER TABLE `configdocumentos`
  ADD PRIMARY KEY (`idConfigDoc`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`idDepto`,`divisiones_idDiv`),
  ADD KEY `fk_departamentos_divisiones1_idx` (`divisiones_idDiv`);

--
-- Indices de la tabla `divisiones`
--
ALTER TABLE `divisiones`
  ADD PRIMARY KEY (`idDiv`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`idDoc`);

--
-- Indices de la tabla `encuestasopmant`
--
ALTER TABLE `encuestasopmant`
  ADD PRIMARY KEY (`idEncSop`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indices de la tabla `evaluaciones_soportes`
--
ALTER TABLE `evaluaciones_soportes`
  ADD PRIMARY KEY (`idEval`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`idFac`,`proveedores_idProv`),
  ADD KEY `fk_facturas_proveedores1_idx` (`proveedores_idProv`);

--
-- Indices de la tabla `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`idFunc`,`departamentos_idDepto`),
  ADD UNIQUE KEY `correoFunc` (`correoFunc`),
  ADD KEY `fk_funcionarios_departamentos1_idx` (`departamentos_idDepto`);

--
-- Indices de la tabla `hardwares`
--
ALTER TABLE `hardwares`
  ADD PRIMARY KEY (`idHard`,`modelos_idModelo`),
  ADD KEY `fk_hardwares_facturas1_idx` (`facturas_idFac`),
  ADD KEY `fk_hardwares_cajas1_idx` (`cajas_idCaja`),
  ADD KEY `fk_hardwares_modelos1_idx` (`modelos_idModelo`);

--
-- Indices de la tabla `historiales`
--
ALTER TABLE `historiales`
  ADD PRIMARY KEY (`idHist`);

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`idIncid`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`idMarca`),
  ADD UNIQUE KEY `marca` (`marca`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`idMensajesInfo`);

--
-- Indices de la tabla `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`idModelo`,`marcas_idMarca`),
  ADD UNIQUE KEY `modelo` (`modelo`),
  ADD KEY `fk_modelos_marcas_idx` (`marcas_idMarca`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indices de la tabla `pin_funcionarios`
--
ALTER TABLE `pin_funcionarios`
  ADD PRIMARY KEY (`id_pin`),
  ADD KEY `usuario_asignacion_pin` (`usuario_asignacion_pin`),
  ADD KEY `idFunc` (`idFunc`);

--
-- Indices de la tabla `prestamostemporales`
--
ALTER TABLE `prestamostemporales`
  ADD PRIMARY KEY (`idprestTemp`,`hardwares_idHard`),
  ADD KEY `fk_prestamosTemporales_hardwares1_idx` (`hardwares_idHard`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`idProv`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`idSecc`,`bodegas_idBod`),
  ADD KEY `fk_secciones_bodegas1_idx` (`bodegas_idBod`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`idServ`),
  ADD KEY `servicio_idserv_index` (`idServ`);

--
-- Indices de la tabla `sistema`
--
ALTER TABLE `sistema`
  ADD PRIMARY KEY (`id_sis`);

--
-- Indices de la tabla `softwares`
--
ALTER TABLE `softwares`
  ADD PRIMARY KEY (`idSoft`);

--
-- Indices de la tabla `software_equipo`
--
ALTER TABLE `software_equipo`
  ADD PRIMARY KEY (`id_seq`),
  ADD KEY `id_hard` (`id_hard`),
  ADD KEY `idsoft` (`idsoft`);

--
-- Indices de la tabla `solicitudmantenciones`
--
ALTER TABLE `solicitudmantenciones`
  ADD PRIMARY KEY (`idSolMant`);

--
-- Indices de la tabla `solicitudsoportes`
--
ALTER TABLE `solicitudsoportes`
  ADD PRIMARY KEY (`idSolSop`);

--
-- Indices de la tabla `solicitud_servicio`
--
ALTER TABLE `solicitud_servicio`
  ADD PRIMARY KEY (`idSolServ`),
  ADD KEY `solicitud_servicio_idsolserv_index` (`idSolServ`),
  ADD KEY `idServ` (`idServ`);

--
-- Indices de la tabla `tareasycompromisos`
--
ALTER TABLE `tareasycompromisos`
  ADD PRIMARY KEY (`idTarea`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indices de la tabla `tipos_evaluacion`
--
ALTER TABLE `tipos_evaluacion`
  ADD PRIMARY KEY (`idTev`);

--
-- Indices de la tabla `tipo_perfil`
--
ALTER TABLE `tipo_perfil`
  ADD PRIMARY KEY (`id_per`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bodegas`
--
ALTER TABLE `bodegas`
  MODIFY `idBod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `cajas`
--
ALTER TABLE `cajas`
  MODIFY `idCaja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `comodatos`
--
ALTER TABLE `comodatos`
  MODIFY `idComod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT de la tabla `configdocumentos`
--
ALTER TABLE `configdocumentos`
  MODIFY `idConfigDoc` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `idDepto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `divisiones`
--
ALTER TABLE `divisiones`
  MODIFY `idDiv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `idDoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT de la tabla `encuestasopmant`
--
ALTER TABLE `encuestasopmant`
  MODIFY `idEncSop` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `evaluaciones_soportes`
--
ALTER TABLE `evaluaciones_soportes`
  MODIFY `idEval` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `idFac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `idFunc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT de la tabla `hardwares`
--
ALTER TABLE `hardwares`
  MODIFY `idHard` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT de la tabla `historiales`
--
ALTER TABLE `historiales`
  MODIFY `idHist` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `idIncid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `idMarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `idMensajesInfo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `modelos`
--
ALTER TABLE `modelos`
  MODIFY `idModelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT de la tabla `pin_funcionarios`
--
ALTER TABLE `pin_funcionarios`
  MODIFY `id_pin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `prestamostemporales`
--
ALTER TABLE `prestamostemporales`
  MODIFY `idprestTemp` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `idProv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `idSecc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `idServ` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `sistema`
--
ALTER TABLE `sistema`
  MODIFY `id_sis` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `softwares`
--
ALTER TABLE `softwares`
  MODIFY `idSoft` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `software_equipo`
--
ALTER TABLE `software_equipo`
  MODIFY `id_seq` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `solicitudmantenciones`
--
ALTER TABLE `solicitudmantenciones`
  MODIFY `idSolMant` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `solicitudsoportes`
--
ALTER TABLE `solicitudsoportes`
  MODIFY `idSolSop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;
--
-- AUTO_INCREMENT de la tabla `solicitud_servicio`
--
ALTER TABLE `solicitud_servicio`
  MODIFY `idSolServ` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;
--
-- AUTO_INCREMENT de la tabla `tareasycompromisos`
--
ALTER TABLE `tareasycompromisos`
  MODIFY `idTarea` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT de la tabla `tipo_perfil`
--
ALTER TABLE `tipo_perfil`
  MODIFY `id_per` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cajas`
--
ALTER TABLE `cajas`
  ADD CONSTRAINT `fk_cajas_secciones1` FOREIGN KEY (`secciones_idSecc`) REFERENCES `secciones` (`idSecc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comodatos`
--
ALTER TABLE `comodatos`
  ADD CONSTRAINT `fk_comodatos_hardwares1` FOREIGN KEY (`hardwares_idHard`) REFERENCES `hardwares` (`idHard`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD CONSTRAINT `fk_departamentos_divisiones1` FOREIGN KEY (`divisiones_idDiv`) REFERENCES `divisiones` (`idDiv`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `fk_facturas_proveedores1` FOREIGN KEY (`proveedores_idProv`) REFERENCES `proveedores` (`idProv`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `fk_funcionarios_departamentos1` FOREIGN KEY (`departamentos_idDepto`) REFERENCES `departamentos` (`idDepto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `hardwares`
--
ALTER TABLE `hardwares`
  ADD CONSTRAINT `fk_hardwares_cajas1` FOREIGN KEY (`cajas_idCaja`) REFERENCES `cajas` (`idCaja`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hardwares_facturas1` FOREIGN KEY (`facturas_idFac`) REFERENCES `facturas` (`idFac`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hardwares_modelos1` FOREIGN KEY (`modelos_idModelo`) REFERENCES `modelos` (`idModelo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `modelos`
--
ALTER TABLE `modelos`
  ADD CONSTRAINT `fk_modelos_marcas` FOREIGN KEY (`marcas_idMarca`) REFERENCES `marcas` (`idMarca`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pin_funcionarios`
--
ALTER TABLE `pin_funcionarios`
  ADD CONSTRAINT `pin_funcionarios_ibfk_1` FOREIGN KEY (`usuario_asignacion_pin`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pin_funcionarios_ibfk_2` FOREIGN KEY (`idFunc`) REFERENCES `funcionarios` (`idFunc`);

--
-- Filtros para la tabla `prestamostemporales`
--
ALTER TABLE `prestamostemporales`
  ADD CONSTRAINT `fk_prestamosTemporales_hardwares1` FOREIGN KEY (`hardwares_idHard`) REFERENCES `hardwares` (`idHard`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD CONSTRAINT `fk_secciones_bodegas1` FOREIGN KEY (`bodegas_idBod`) REFERENCES `bodegas` (`idBod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `software_equipo`
--
ALTER TABLE `software_equipo`
  ADD CONSTRAINT `software_equipo_ibfk_1` FOREIGN KEY (`id_hard`) REFERENCES `hardwares` (`idHard`),
  ADD CONSTRAINT `software_equipo_ibfk_2` FOREIGN KEY (`idsoft`) REFERENCES `softwares` (`idSoft`);

--
-- Filtros para la tabla `solicitud_servicio`
--
ALTER TABLE `solicitud_servicio`
  ADD CONSTRAINT `solicitud_Servicio_ibfk_1` FOREIGN KEY (`idServ`) REFERENCES `servicio` (`idServ`),
  ADD CONSTRAINT `solicitud_Servicio_ibfk_2` FOREIGN KEY (`idServ`) REFERENCES `servicio` (`idServ`),
  ADD CONSTRAINT `solicitud_Servicio_ibfk_3` FOREIGN KEY (`idServ`) REFERENCES `servicio` (`idServ`),
  ADD CONSTRAINT `solicitud_Servicio_ibfk_4` FOREIGN KEY (`idServ`) REFERENCES `servicio` (`idServ`),
  ADD CONSTRAINT `solicitud_servicio_idserv_foreign` FOREIGN KEY (`idServ`) REFERENCES `servicio` (`idServ`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
