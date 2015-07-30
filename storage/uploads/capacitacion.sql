-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-02-2015 a las 07:41:56
-- Versión del servidor: 5.6.15-log
-- Versión de PHP: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `capacitacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_auth_assignment`
--

CREATE TABLE IF NOT EXISTS `tbl_auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_auth_item`
--

CREATE TABLE IF NOT EXISTS `tbl_auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_auth_item_child`
--

CREATE TABLE IF NOT EXISTS `tbl_auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_auth_rule`
--

CREATE TABLE IF NOT EXISTS `tbl_auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cat_catalogo`
--

CREATE TABLE IF NOT EXISTS `tbl_cat_catalogo` (
  `ID_ELEMENTO` int(11) NOT NULL,
  `ELEMENTO_PADRE` int(11) DEFAULT NULL,
  `NOMBRE` varchar(300) DEFAULT NULL,
  `DESCRIPCION` varchar(300) DEFAULT NULL,
  `ORDEN` int(11) DEFAULT NULL,
  `CATEGORIA` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_ELEMENTO`),
  KEY `FK_REFERENCE_2` (`ELEMENTO_PADRE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_comision_establecimiento`
--

CREATE TABLE IF NOT EXISTS `tbl_comision_establecimiento` (
  `ID_ESTABLECIMIENTO` int(11) NOT NULL,
  `ID_COMISION_MIXTA` int(11) NOT NULL,
  `ACTIVO` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID_ESTABLECIMIENTO`,`ID_COMISION_MIXTA`),
  KEY `FK_REFERENCE_6` (`ID_COMISION_MIXTA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_comision_establecimiento`
--

INSERT INTO `tbl_comision_establecimiento` (`ID_ESTABLECIMIENTO`, `ID_COMISION_MIXTA`, `ACTIVO`) VALUES
(1, 1, 1),
(3, 1, 1),
(3, 2, 1),
(4, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_comision_mixta_cap`
--

CREATE TABLE IF NOT EXISTS `tbl_comision_mixta_cap` (
  `ID_COMISION_MIXTA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_EMPRESA` int(11) DEFAULT NULL,
  `COMISION_MIXTA_PADRE` int(11) DEFAULT NULL,
  `NUMERO_INTEGRANTES` int(11) DEFAULT NULL,
  `FECHA_CONSTITUCION` date DEFAULT NULL,
  `FECHA_ELABORACION` date DEFAULT NULL,
  `ACTIVO` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID_COMISION_MIXTA`),
  KEY `FK_REFERENCE_16` (`ID_EMPRESA`),
  KEY `FK_REFERENCE_18` (`COMISION_MIXTA_PADRE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tbl_comision_mixta_cap`
--

INSERT INTO `tbl_comision_mixta_cap` (`ID_COMISION_MIXTA`, `ID_EMPRESA`, `COMISION_MIXTA_PADRE`, `NUMERO_INTEGRANTES`, `FECHA_CONSTITUCION`, `FECHA_ELABORACION`, `ACTIVO`) VALUES
(1, 2, NULL, 12, '2015-01-01', '2015-01-01', 1),
(2, 2, NULL, 12, '2015-01-01', '2015-01-01', 1),
(3, 1, NULL, 12, '2015-01-05', '2015-01-12', 1),
(4, 3, NULL, 12, '2015-01-01', '2015-01-01', 1),
(5, 3, NULL, 12, '2015-01-01', '2015-01-01', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_curso`
--

CREATE TABLE IF NOT EXISTS `tbl_curso` (
  `ID_CURSO` int(11) NOT NULL,
  `ID_PLAN` int(11) DEFAULT NULL,
  `ID_INSTRUCTOR` int(11) DEFAULT NULL,
  `NOMBRE` varchar(300) DEFAULT NULL,
  `DURACION_HORAS` time DEFAULT NULL,
  `FECHA_INICIO` date DEFAULT NULL,
  `FECHA_TERMINO` date DEFAULT NULL,
  `AREA_TEMATICA` varchar(0) DEFAULT NULL,
  PRIMARY KEY (`ID_CURSO`),
  KEY `FK_REFERENCE_7` (`ID_PLAN`),
  KEY `FK_REFERENCE_17` (`ID_INSTRUCTOR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empresa`
--

CREATE TABLE IF NOT EXISTS `tbl_empresa` (
  `ID_EMPRESA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_REPRESENTANTE_LEGAL` int(11) DEFAULT NULL,
  `NOMBRE_RAZON_SOCIAL` varchar(300) DEFAULT NULL,
  `RFC` varchar(13) DEFAULT NULL,
  `NSS` varchar(10) DEFAULT NULL,
  `CURP` varchar(18) DEFAULT NULL,
  `MORAL` tinyint(1) DEFAULT NULL,
  `CALLE` varchar(300) DEFAULT NULL,
  `NUMERO_EXTERIOR` varchar(100) DEFAULT NULL,
  `NUMERO_INTERIOR` varchar(100) DEFAULT NULL,
  `COLONIA` varchar(300) DEFAULT NULL,
  `ENTIDAD_FEDERATIVA` varchar(100) DEFAULT NULL,
  `LOCALIDAD` varchar(100) DEFAULT NULL,
  `TELEFONO` varchar(300) DEFAULT NULL,
  `MUNICIPIO_DELEGACION` varchar(300) DEFAULT NULL,
  `GIRO_PRINCIPAL` varchar(300) DEFAULT NULL,
  `NUMERO_TRABAJADORES` int(11) DEFAULT NULL,
  `CODIGO_POSTAL` int(11) DEFAULT NULL,
  `FAX` varchar(50) DEFAULT NULL,
  `CORREO_ELECTRONICO` varchar(300) DEFAULT NULL,
  `ACTIVO` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID_EMPRESA`),
  KEY `FK_REFERENCE_1` (`ID_REPRESENTANTE_LEGAL`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tbl_empresa`
--

INSERT INTO `tbl_empresa` (`ID_EMPRESA`, `ID_REPRESENTANTE_LEGAL`, `NOMBRE_RAZON_SOCIAL`, `RFC`, `NSS`, `CURP`, `MORAL`, `CALLE`, `NUMERO_EXTERIOR`, `NUMERO_INTERIOR`, `COLONIA`, `ENTIDAD_FEDERATIVA`, `LOCALIDAD`, `TELEFONO`, `MUNICIPIO_DELEGACION`, `GIRO_PRINCIPAL`, `NUMERO_TRABAJADORES`, `CODIGO_POSTAL`, `FAX`, `CORREO_ELECTRONICO`, `ACTIVO`) VALUES
(1, 1, 'BIMBO S.A. de C.V.', 'BIMBO123456', '', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, '(0155) 27564789', NULL, NULL, NULL, NULL, NULL, 'bimbo@bimbo.com', 1),
(2, 1, 'SABRITAS S.A de C.V', 'SABR251265AQ4', 'HMC1234567', 'HMC12AXTDSA', NULL, 'Los manzanares norte', '12', '14', 'Los reyes la paz', 'MEXICO DF', 'ALBARO OBREGON', '', '', '', NULL, 56507, '', '', 1),
(3, 2, 'CEMEX S.A. DE C.V.', 'NARJ85125AQ4', 'HMC1234567', 'NARJ851225AQG34', 1, 'Cto. e. zapata norte', '201', '18', 'Mexico', 'Aguascalientes', 'Los reyes la paz', '(0155) 26323716', 'Iztapalapa', 'Construccion', 12, 56507, '66799124', 'jesus.nataren@gmail.com', 1),
(4, 2, 'jose de jesus ', '', '', '', 2, 'Cto. e. zapata norte', '1', '2', 'el pino', 'Yucatán', 'Los reyes la paz', '(0155) 26323716', 'Iztapalapa', 'Construccion', 12, 56507, '66799124', 'jesus.nataren@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empresa_usuario`
--

CREATE TABLE IF NOT EXISTS `tbl_empresa_usuario` (
  `ID_EMPRESA` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `ACTIVO` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID_USUARIO`,`ID_EMPRESA`),
  KEY `FK_REFERENCE_55` (`ID_EMPRESA`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_empresa_usuario`
--

INSERT INTO `tbl_empresa_usuario` (`ID_EMPRESA`, `ID_USUARIO`, `ACTIVO`) VALUES
(1, 5, 1),
(2, 6, 1),
(3, 8, 1),
(4, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_establecimiento`
--

CREATE TABLE IF NOT EXISTS `tbl_establecimiento` (
  `ID_ESTABLECIMIENTO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `DOMICILIO` varchar(300) DEFAULT NULL,
  `RFC` varchar(13) DEFAULT NULL,
  `IMSS` varchar(20) DEFAULT NULL,
  `ID_EMPRESA` int(11) NOT NULL,
  `ACTIVO` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID_ESTABLECIMIENTO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tbl_establecimiento`
--

INSERT INTO `tbl_establecimiento` (`ID_ESTABLECIMIENTO`, `NOMBRE`, `DOMICILIO`, `RFC`, `IMSS`, `ID_EMPRESA`, `ACTIVO`) VALUES
(1, 'test', 'test', 'test', 'test', 2, 1),
(2, 'test', 'test', 'test', 'test', 1, 1),
(3, 'Sucursal empacapadora', 'Apizaco Tlaxcala ', 'NARJ851225AQ', 'HMC1234', 2, 1),
(4, 'Sucursal empacapadora', 'Apizaco Tlaxcala', 'NARJ851225AQ', 'HMC1234', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_instructor`
--

CREATE TABLE IF NOT EXISTS `tbl_instructor` (
  `ID_INSTRUCTOR` int(11) NOT NULL,
  `NOMBRE_AGENTE_EXTERNO` varchar(100) DEFAULT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `APP` varchar(100) DEFAULT NULL,
  `APM` varchar(100) DEFAULT NULL,
  `DOMICILIO` varchar(300) DEFAULT NULL,
  `TELEFONO` varchar(100) DEFAULT NULL,
  `CORREO_ELECTRONICO` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`ID_INSTRUCTOR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_migration`
--

CREATE TABLE IF NOT EXISTS `tbl_migration` (
  `version` varchar(180) COLLATE utf8_spanish_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_migration`
--

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1423552980),
('m140506_102106_rbac_init', 1423554210);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_plan`
--

CREATE TABLE IF NOT EXISTS `tbl_plan` (
  `ID_PLAN` int(11) NOT NULL AUTO_INCREMENT,
  `ID_EMPRESA` int(11) DEFAULT NULL,
  `TOTAL_HOMBRES` int(11) DEFAULT NULL,
  `TOTAL_MUJERES` int(11) DEFAULT NULL,
  `VIGENCIA_INICIO` date DEFAULT NULL,
  `VIGENCIA_FIN` date DEFAULT NULL,
  `NUMERO_ETAPAS` int(11) DEFAULT NULL,
  `NUMERO_CONSTANCIAS_EXPEDIDAS` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_PLAN`),
  KEY `FK_REFERENCE_19` (`ID_EMPRESA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_plan_establecimiento`
--

CREATE TABLE IF NOT EXISTS `tbl_plan_establecimiento` (
  `ID_PLAN` int(11) NOT NULL,
  `ID_ESTABLECIMIENTO` int(11) NOT NULL,
  `ACTIVO` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID_PLAN`,`ID_ESTABLECIMIENTO`),
  KEY `FK_REFERENCE_15` (`ID_ESTABLECIMIENTO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_profiles`
--

CREATE TABLE IF NOT EXISTS `tbl_profiles` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `tbl_profiles`
--

INSERT INTO `tbl_profiles` (`user_id`, `lastname`, `firstname`) VALUES
(1, 'Admin', 'Administrator'),
(2, 'Demo', 'Demo'),
(5, 'Nataren', 'Leticia '),
(6, 'Nataren', 'Jose de Jesus'),
(7, 'Nataren', 'Leticia'),
(8, 'Nataren', 'Maria Teresa ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_profiles_fields`
--

CREATE TABLE IF NOT EXISTS `tbl_profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` varchar(15) NOT NULL DEFAULT '0',
  `field_size_min` varchar(15) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_profiles_fields`
--

INSERT INTO `tbl_profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'lastname', 'Last Name', 'VARCHAR', '50', '3', 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
(2, 'firstname', 'First Name', 'VARCHAR', '50', '3', 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_representante_legal`
--

CREATE TABLE IF NOT EXISTS `tbl_representante_legal` (
  `ID_REPRESENTANTE_LEGAL` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `APP` varchar(100) DEFAULT NULL,
  `APM` varchar(100) DEFAULT NULL,
  `FEC_NAC` date DEFAULT NULL,
  `CURP` varchar(18) DEFAULT NULL,
  `RFC` varchar(13) DEFAULT NULL,
  `DOMICILIO` varchar(300) DEFAULT NULL,
  `TELEFONO` varchar(100) DEFAULT NULL,
  `CORREO_ELECTRONICO` varchar(300) DEFAULT NULL,
  `ACTIVO` tinyint(1) DEFAULT NULL,
  `NSS` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID_REPRESENTANTE_LEGAL`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_representante_legal`
--

INSERT INTO `tbl_representante_legal` (`ID_REPRESENTANTE_LEGAL`, `NOMBRE`, `APP`, `APM`, `FEC_NAC`, `CURP`, `RFC`, `DOMICILIO`, `TELEFONO`, `CORREO_ELECTRONICO`, `ACTIVO`, `NSS`) VALUES
(1, 'Jose de Jesus Nataren Ramirez', 'Nataren', 'RAMIREZ', '2015-01-06', 'TEST', NULL, NULL, '(04455) 51078307', 'jjnataren@hotmail.com', 1, NULL),
(2, 'Maria angelica', 'Hernandez', 'Garcia', '0000-00-00', 'TEST12345', 'NARJ68', 'Calle bugambilia', '123', 'teresa@teresa.com', 1, 'HMC1234S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_trabajador`
--

CREATE TABLE IF NOT EXISTS `tbl_trabajador` (
  `ID_TRABAJADOR` int(11) NOT NULL AUTO_INCREMENT,
  `ROL` int(11) DEFAULT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `APP` varchar(100) DEFAULT NULL,
  `APM` varchar(100) DEFAULT NULL,
  `CURP` varchar(18) DEFAULT NULL,
  `RFC` varchar(13) DEFAULT NULL,
  `NSS` varchar(20) DEFAULT NULL,
  `DOMICILIO` varchar(300) DEFAULT NULL,
  `CORREO_ELECTRONICO` varchar(300) DEFAULT NULL,
  `TELEFONO` varchar(100) DEFAULT NULL,
  `PUESTO` varchar(200) DEFAULT NULL,
  `OCUPACION_ESPECIFICA` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`ID_TRABAJADOR`),
  KEY `FK_REFERENCE_3` (`ROL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_trabajador_curso`
--

CREATE TABLE IF NOT EXISTS `tbl_trabajador_curso` (
  `ID_TRABAJADOR` int(11) NOT NULL,
  `ID_CURSO` int(11) NOT NULL,
  `ACTIVO` tinyint(1) NOT NULL,
  `FECHA_ALTA` date DEFAULT NULL,
  PRIMARY KEY (`ID_TRABAJADOR`,`ID_CURSO`),
  KEY `FK_REFERENCE_13` (`ID_CURSO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastvisit_at` datetime DEFAULT NULL,
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `email`, `activkey`, `create_at`, `lastvisit`, `lastvisit_at`, `superuser`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '9a24eff8c15a6a141ece27eb6947da0f', '2015-01-30 04:56:44', '0000-00-00 00:00:00', NULL, 1, 1),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@example.com', '099f825543f7850cc038b90aaff39fac', '2015-01-30 02:14:05', '0000-00-00 00:00:00', NULL, 0, 1),
(5, 'leti', '4cc439219f58690765800799d10bf901', 'leti@leti.com', '8e6be8ca81b358592878f3ca94562654', '2015-01-30 15:18:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(6, 'jesusnataren', 'b545d26462bc211ffc612d5d6de7b64e', 'jesus.nataren@gmail.com', 'bd0315d226bf45d1ceb030489d60ffba', '2015-01-31 08:17:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(7, 'letinataren', '4cc439219f58690765800799d10bf901', 'leticia@leti.com', 'b427db216ac85cc2e8608220860cfec3', '2015-01-31 22:38:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(8, 'teresisa', '15a8f2809fac227d72b9cd553a28c05a', 'tere@tere.com', '6862bed403f53175b8d4755bda7c26cf', '2015-02-01 03:21:21', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_auth_assignment`
--
ALTER TABLE `tbl_auth_assignment`
  ADD CONSTRAINT `tbl_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `tbl_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_auth_item`
--
ALTER TABLE `tbl_auth_item`
  ADD CONSTRAINT `tbl_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `tbl_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_auth_item_child`
--
ALTER TABLE `tbl_auth_item_child`
  ADD CONSTRAINT `tbl_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `tbl_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `tbl_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_cat_catalogo`
--
ALTER TABLE `tbl_cat_catalogo`
  ADD CONSTRAINT `FK_REFERENCE_2` FOREIGN KEY (`ELEMENTO_PADRE`) REFERENCES `tbl_cat_catalogo` (`ID_ELEMENTO`);

--
-- Filtros para la tabla `tbl_comision_establecimiento`
--
ALTER TABLE `tbl_comision_establecimiento`
  ADD CONSTRAINT `FK_REFERENCE_5` FOREIGN KEY (`ID_ESTABLECIMIENTO`) REFERENCES `tbl_establecimiento` (`ID_ESTABLECIMIENTO`),
  ADD CONSTRAINT `FK_REFERENCE_6` FOREIGN KEY (`ID_COMISION_MIXTA`) REFERENCES `tbl_comision_mixta_cap` (`ID_COMISION_MIXTA`);

--
-- Filtros para la tabla `tbl_comision_mixta_cap`
--
ALTER TABLE `tbl_comision_mixta_cap`
  ADD CONSTRAINT `FK_REFERENCE_16` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `tbl_empresa` (`ID_EMPRESA`),
  ADD CONSTRAINT `FK_REFERENCE_18` FOREIGN KEY (`COMISION_MIXTA_PADRE`) REFERENCES `tbl_comision_mixta_cap` (`ID_COMISION_MIXTA`);

--
-- Filtros para la tabla `tbl_curso`
--
ALTER TABLE `tbl_curso`
  ADD CONSTRAINT `FK_REFERENCE_17` FOREIGN KEY (`ID_INSTRUCTOR`) REFERENCES `tbl_instructor` (`ID_INSTRUCTOR`),
  ADD CONSTRAINT `FK_REFERENCE_7` FOREIGN KEY (`ID_PLAN`) REFERENCES `tbl_plan` (`ID_PLAN`);

--
-- Filtros para la tabla `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  ADD CONSTRAINT `FK_REFERENCE_1` FOREIGN KEY (`ID_REPRESENTANTE_LEGAL`) REFERENCES `tbl_representante_legal` (`ID_REPRESENTANTE_LEGAL`);

--
-- Filtros para la tabla `tbl_plan`
--
ALTER TABLE `tbl_plan`
  ADD CONSTRAINT `FK_REFERENCE_19` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `tbl_empresa` (`ID_EMPRESA`);

--
-- Filtros para la tabla `tbl_plan_establecimiento`
--
ALTER TABLE `tbl_plan_establecimiento`
  ADD CONSTRAINT `FK_REFERENCE_14` FOREIGN KEY (`ID_PLAN`) REFERENCES `tbl_plan` (`ID_PLAN`),
  ADD CONSTRAINT `FK_REFERENCE_15` FOREIGN KEY (`ID_ESTABLECIMIENTO`) REFERENCES `tbl_establecimiento` (`ID_ESTABLECIMIENTO`);

--
-- Filtros para la tabla `tbl_profiles`
--
ALTER TABLE `tbl_profiles`
  ADD CONSTRAINT `user_profile_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tbl_trabajador`
--
ALTER TABLE `tbl_trabajador`
  ADD CONSTRAINT `FK_REFERENCE_3` FOREIGN KEY (`ROL`) REFERENCES `tbl_cat_catalogo` (`ID_ELEMENTO`);

--
-- Filtros para la tabla `tbl_trabajador_curso`
--
ALTER TABLE `tbl_trabajador_curso`
  ADD CONSTRAINT `FK_REFERENCE_12` FOREIGN KEY (`ID_TRABAJADOR`) REFERENCES `tbl_trabajador` (`ID_TRABAJADOR`),
  ADD CONSTRAINT `FK_REFERENCE_13` FOREIGN KEY (`ID_CURSO`) REFERENCES `tbl_curso` (`ID_CURSO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
