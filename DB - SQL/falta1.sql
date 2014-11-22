-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-11-2014 a las 13:07:25
-- Versión del servidor: 5.5.38
-- Versión de PHP: 5.4.4-14+deb7u14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `falta1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Candidato`
--

CREATE TABLE IF NOT EXISTS `Candidato` (
  `id_candidato` int(9) NOT NULL AUTO_INCREMENT,
  `id_usr` int(9) DEFAULT NULL,
  `id_puestoEvento` int(9) DEFAULT NULL,
  `id_estado` int(9) DEFAULT NULL,
  PRIMARY KEY (`id_candidato`),
  KEY `id_candidato` (`id_candidato`),
  KEY `id_usr` (`id_usr`),
  KEY `id_puestoEvento` (`id_puestoEvento`),
  KEY `id_estado` (`id_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `Candidato`
--

INSERT INTO `Candidato` (`id_candidato`, `id_usr`, `id_puestoEvento`, `id_estado`) VALUES
(1, 9, 16, 3),
(2, 10, 16, 1),
(3, 10, 15, 3),
(4, 2, 18, 4),
(5, 11, 18, 3),
(6, 12, 16, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ciudad`
--

CREATE TABLE IF NOT EXISTS `Ciudad` (
  `id_ciudad` int(9) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(48) NOT NULL,
  PRIMARY KEY (`id_ciudad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `Ciudad`
--

INSERT INTO `Ciudad` (`id_ciudad`, `nombre`) VALUES
(1, 'Neuquen'),
(2, 'Cipolletti'),
(3, 'Plottier');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Deporte`
--

CREATE TABLE IF NOT EXISTS `Deporte` (
  `id_deporte` int(9) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`id_deporte`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `Deporte`
--

INSERT INTO `Deporte` (`id_deporte`, `nombre`) VALUES
(1, 'Futbol'),
(2, 'Basquet'),
(3, 'Handball'),
(4, 'Volley'),
(5, 'Hockey');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EstadoCandidato`
--

CREATE TABLE IF NOT EXISTS `EstadoCandidato` (
  `id_estado` int(9) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `EstadoCandidato`
--

INSERT INTO `EstadoCandidato` (`id_estado`, `tipo`) VALUES
(1, 'Elegido'),
(2, 'Rechazado'),
(3, 'Postulado'),
(4, 'Asistio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Evento`
--

CREATE TABLE IF NOT EXISTS `Evento` (
  `id_evento` int(9) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `direccion` varchar(140) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(240) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `lat` float NOT NULL,
  `long` float NOT NULL,
  `id_ciudad` int(9) NOT NULL,
  `id_deporte` int(9) NOT NULL,
  `id_tipo` int(9) NOT NULL,
  `id_usuario` int(9) NOT NULL,
  PRIMARY KEY (`id_evento`),
  KEY `id_ciudad` (`id_ciudad`),
  KEY `id_deporte` (`id_deporte`),
  KEY `id_tipo` (`id_tipo`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `Evento`
--

INSERT INTO `Evento` (`id_evento`, `fecha`, `hora`, `direccion`, `descripcion`, `lat`, `long`, `id_ciudad`, `id_deporte`, `id_tipo`, `id_usuario`) VALUES
(20, '2014-11-20', '07:15:00', 'Escondido', 'Urgente Partido de Handball', 0, 0, 1, 3, 1, 2),
(21, '2014-11-28', '10:00:00', 'Leguizamon y La Plata', 'Futbol 5', 0, 0, 1, 1, 1, 3),
(22, '2014-10-07', '09:00:00', 'matheu', 'futbol5', 0, 0, 1, 1, 1, 10),
(23, '2014-03-31', '09:15:00', 'aca en casa', 'fecha atras', 0, 0, 1, 2, 1, 10),
(24, '2014-11-21', '03:00:00', 'sdfsdf 34', 'hoy', 0, 0, 2, 2, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Puesto`
--

CREATE TABLE IF NOT EXISTS `Puesto` (
  `id_puesto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(140) NOT NULL,
  `id_deporte` int(11) NOT NULL,
  PRIMARY KEY (`id_puesto`),
  KEY `id_deporte` (`id_deporte`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `Puesto`
--

INSERT INTO `Puesto` (`id_puesto`, `descripcion`, `id_deporte`) VALUES
(1, 'Arquero', 1),
(2, 'Defensor', 1),
(3, 'Base', 2),
(4, 'Pivot', 2),
(5, 'Lateral', 3),
(6, 'Arquero', 3),
(7, 'Volante', 1),
(8, 'Delantero', 1),
(9, 'Escolta', 2),
(10, 'Alero', 2),
(11, 'Ala-Pivote', 2),
(12, 'Pivot', 3),
(13, 'Central', 3),
(14, 'Extremo', 3),
(15, 'Armador', 4),
(16, 'Libero', 4),
(17, 'Opuesto', 4),
(18, 'Punta-Receptor', 4),
(19, 'Central', 4),
(20, 'Arquero', 5),
(21, 'Defensor', 5),
(22, 'Lateral', 5),
(23, 'Mediocampista', 5),
(24, 'Delantero', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Puesto_Evento`
--

CREATE TABLE IF NOT EXISTS `Puesto_Evento` (
  `id_puestoEvento` int(9) NOT NULL AUTO_INCREMENT,
  `id_evento` int(9) DEFAULT NULL,
  `id_puesto` int(9) DEFAULT NULL,
  PRIMARY KEY (`id_puestoEvento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `Puesto_Evento`
--

INSERT INTO `Puesto_Evento` (`id_puestoEvento`, `id_evento`, `id_puesto`) VALUES
(15, 20, 6),
(16, 21, 7),
(17, 22, 1),
(18, 23, 1),
(19, 24, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Reputacion`
--

CREATE TABLE IF NOT EXISTS `Reputacion` (
  `id_reputacion` int(9) NOT NULL AUTO_INCREMENT,
  `comentario` varchar(140) NOT NULL,
  `positvo` int(9) NOT NULL,
  `negativo` int(9) NOT NULL,
  `id_tipo` int(9) NOT NULL,
  `id_usr` int(9) NOT NULL,
  `id_evento` int(9) NOT NULL,
  PRIMARY KEY (`id_reputacion`),
  KEY `id_usr` (`id_usr`),
  KEY `id_evento` (`id_evento`),
  KEY `id_tipo` (`id_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tipo_Evento`
--

CREATE TABLE IF NOT EXISTS `Tipo_Evento` (
  `id_tipoEvento` int(9) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tipoEvento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `Tipo_Evento`
--

INSERT INTO `Tipo_Evento` (`id_tipoEvento`, `nombre`) VALUES
(1, 'falta1'),
(2, 'cerrado'),
(3, 'pausado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_reputacion`
--

CREATE TABLE IF NOT EXISTS `tipo_reputacion` (
  `id_tipo` int(9) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipo_reputacion`
--

INSERT INTO `tipo_reputacion` (`id_tipo`, `tipo`) VALUES
(1, 'Positivo'),
(2, 'Negativo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE IF NOT EXISTS `Usuario` (
  `id_usr` int(9) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) DEFAULT NULL,
  `apellido` varchar(40) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `sexo` varchar(10) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `clave` varchar(140) DEFAULT NULL,
  `usr` varchar(140) DEFAULT NULL,
  `telefono` int(15) NOT NULL,
  `foto` varchar(140) NOT NULL,
  PRIMARY KEY (`id_usr`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`id_usr`, `nombre`, `apellido`, `fecha_nac`, `sexo`, `email`, `clave`, `usr`, `telefono`, `foto`) VALUES
(2, ' martin marrtin', 'martin', '2014-11-05', 'masculino', 'martin.betelu6@gmail.com', 'martin', 'martin', 12335664, 'avatar-profile.png'),
(3, 'ale', 'ale', '2014-11-03', 'masculino', 'alexis_v87@hotmail.com', 'ale', 'ale', 2147483647, 'cd0585e52306c260a7159e4ed3dad43e.jpg'),
(9, 'administradora', 'www', '2014-11-12', 'femenino', 'appNN.2014@gmail.com', 'admin', 'admin', 666, '58525b854b1a91868418ae7c8c961a10.jpg'),
(10, 'Milton Javier', 'Encina', '1979-09-27', 'masculino', 'milton_encina@hotmail.com', 'aleja1958', 'milton79', 2147483647, 'aa338465b466d64b0f9ea06c7769ef63.jpg'),
(11, 'Jorge Omar', '152', '2015-05-01', 'masculino', 'milton.encina@gmail.com', '1956', 'joe', 4481880, 'avatar-profile.png'),
(12, 'roge', 'añahual', '1990-07-19', 'masculino', 'rogee09@gmail.com', 'roge', 'roge', 244697203, '4ed4dfe0bbd1c40694850ee27e6d46c2.png'),
(13, 'demo Nombre', 'demo Apellido', '1990-01-30', 'masculino', 'demo2@demo.com', 'demo', 'demo', 2147483647, 'avatar-profile.png');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Candidato`
--
ALTER TABLE `Candidato`
  ADD CONSTRAINT `Candidato_ibfk_1` FOREIGN KEY (`id_usr`) REFERENCES `Usuario` (`id_usr`),
  ADD CONSTRAINT `Candidato_ibfk_2` FOREIGN KEY (`id_puestoEvento`) REFERENCES `Puesto_Evento` (`id_puestoEvento`),
  ADD CONSTRAINT `Candidato_ibfk_3` FOREIGN KEY (`id_estado`) REFERENCES `EstadoCandidato` (`id_estado`);

--
-- Filtros para la tabla `Evento`
--
ALTER TABLE `Evento`
  ADD CONSTRAINT `Evento_ibfk_1` FOREIGN KEY (`id_ciudad`) REFERENCES `Ciudad` (`id_ciudad`),
  ADD CONSTRAINT `Evento_ibfk_2` FOREIGN KEY (`id_deporte`) REFERENCES `Deporte` (`id_deporte`),
  ADD CONSTRAINT `Evento_ibfk_3` FOREIGN KEY (`id_tipo`) REFERENCES `Tipo_Evento` (`id_tipoEvento`),
  ADD CONSTRAINT `Evento_ibfk_4` FOREIGN KEY (`id_usuario`) REFERENCES `Usuario` (`id_usr`);

--
-- Filtros para la tabla `Puesto`
--
ALTER TABLE `Puesto`
  ADD CONSTRAINT `Puesto_ibfk_1` FOREIGN KEY (`id_deporte`) REFERENCES `Deporte` (`id_deporte`);

--
-- Filtros para la tabla `Reputacion`
--
ALTER TABLE `Reputacion`
  ADD CONSTRAINT `Reputacion_ibfk_1` FOREIGN KEY (`id_usr`) REFERENCES `Usuario` (`id_usr`),
  ADD CONSTRAINT `Reputacion_ibfk_2` FOREIGN KEY (`id_evento`) REFERENCES `Evento` (`id_evento`),
  ADD CONSTRAINT `Reputacion_ibfk_3` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_reputacion` (`id_tipo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
