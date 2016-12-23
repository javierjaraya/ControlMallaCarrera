-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-12-2016 a las 04:22:26
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `control_pro_asignaturas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE IF NOT EXISTS `asignatura` (
  `asig_codigo` int(6) NOT NULL,
  `asig_nombre` varchar(45) NOT NULL,
  `asig_periodo` int(11) NOT NULL,
  `asig_creditos` int(11) NOT NULL,
  `m_id` varchar(11) NOT NULL,
  `ta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`asig_codigo`, `asig_nombre`, `asig_periodo`, `asig_creditos`, `m_id`, `ta_id`) VALUES
(240012, 'Calculo I', 1, 5, '2957-1', 1),
(240013, 'Ãlgebra I', 1, 5, '2957-1', 1),
(240022, 'Calculo I', 1, 5, '2957-2', 1),
(240035, 'Calculo II', 2, 5, '2957-1', 1),
(240036, 'Ãlgebra II', 2, 5, '2957-1', 1),
(241052, 'Fisica I', 3, 5, '2957-1', 1),
(630097, 'GestiÃ³n de Empresa I', 3, 4, '2957-1', 1),
(631045, 'Economia', 3, 4, '2957-1', 1),
(634065, 'IntroducciÃ³n a la Ingenieria', 1, 3, '2957-1', 1),
(634066, 'IntroducciÃ³n a la ProgramaciÃ³n', 1, 5, '2957-1', 1),
(634330, 'Desarrollo Avanzado de Interfaces WEB', 10, 3, '2957-1', 3),
(634360, 'Cloud Computing', 9, 3, '2957-1', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desarrollo_programa_didactico`
--

CREATE TABLE IF NOT EXISTS `desarrollo_programa_didactico` (
`dpd_id` int(11) NOT NULL,
  `dpd_actividad_aprendizaje` varchar(2000) DEFAULT NULL,
  `dpd_mediacion_ensenianza` varchar(2000) DEFAULT NULL,
  `dpd_actividad_evaluacion` varchar(2000) DEFAULT NULL,
  `dpd_recurso_didactivo` varchar(2000) DEFAULT NULL,
  `dpd_hp_ht` int(11) DEFAULT NULL,
  `dpd_hp_hp` int(11) DEFAULT NULL,
  `dpd_hp_hl` int(11) DEFAULT NULL,
  `dpd_hp_ha` int(11) DEFAULT NULL,
  `dpd_ha_ht` int(11) DEFAULT NULL,
  `dpd_ha_hp` int(11) DEFAULT NULL,
  `dpd_ha_hl` int(11) DEFAULT NULL,
  `dpd_ha_ha` int(11) DEFAULT NULL,
  `ra_id` int(11) NOT NULL,
  `pd_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `desarrollo_programa_didactico`
--

INSERT INTO `desarrollo_programa_didactico` (`dpd_id`, `dpd_actividad_aprendizaje`, `dpd_mediacion_ensenianza`, `dpd_actividad_evaluacion`, `dpd_recurso_didactivo`, `dpd_hp_ht`, `dpd_hp_hp`, `dpd_hp_hl`, `dpd_hp_ha`, `dpd_ha_ht`, `dpd_ha_hp`, `dpd_ha_hl`, `dpd_ha_ha`, `ra_id`, `pd_id`) VALUES
(1, 'texto de prueba', 'texto de prueba<br>', 'texto de prueba<br>', 'texto de prueba<br>', 1, 1, 1, 1, 1, 1, 1, 1, 55, 5),
(2, 'texto de prueba<br>', 'texto de prueba<br>', 'texto de prueba<br>', 'texto de prueba<br>', 1, 1, 1, 1, 1, 1, 1, 1, 56, 5),
(3, 'Texto prueba definitiva&nbsp;', 'Texto prueba definitiva&nbsp;<br>', 'Texto prueba definitiva&nbsp;<br>', 'Texto prueba definitiva&nbsp;<br>', 1, 12, 21, 12, 12, 21, 21, 1, 55, 6),
(4, 'Texto prueba definitiva&nbsp;<br>', 'Texto prueba definitiva&nbsp;<br>', 'Texto prueba definitiva&nbsp;<br>', 'Texto prueba definitiva&nbsp;<br>', 21, 21, 1, 2, 41, 212, 12, 12, 56, 6),
(5, 'texto de prueba 2<br>', 'texto de prueba 2<br>', 'texto de prueba 2<br>', 'texto de prueba 2<br>', 12, 12, 12, 12, 12, 12, 12, 12, 55, 7),
(6, '1texto de prueba 2', 'texto de prueba 2<br>', 'texto de prueba 2<br>', 'texto de prueba 2<br>', 1, 21, 21, 21, 21, 21, 24, 2, 56, 7),
(7, 'texto de prueba 2', 'texto de prueba 2<br>', 'texto de prueba 2<br>', 'texto de prueba 2<br>', 12, 12, 12, 12, 12, 1212, 12, 12, 55, 8),
(8, 'texto de prueba 2<br>', 'texto de prueba 2<br>', 'texto de prueba 2<br>', 'texto de prueba 2<br>', 12, 12, 12, 12, 12, 1, 4, 2, 56, 8),
(9, 'texto de prueba 2<br>', 'texto de prueba 2<br>', 'texto de prueba 2<br>', 'texto de prueba 2<br>', 1, 1, 1, 1, 1, 1, 1, 1, 55, 9),
(10, 'texto de prueba 2<br>', 'texto de prueba 2<br>', 'texto de prueba 2<br>', 'texto de prueba 2<br>', 1, 1, 1, 1, 1, 1, 1, 1, 56, 9),
(11, 'texto de prueba 2<br>', 'texto de prueba 2<br>', 'texto de prueba 2<br>', 'texto de prueba 2<br>', 1, 1, 1, 1, 1, 1, 1, 1, 55, 10),
(12, 'texto de prueba 2<br>', 'texto de prueba 2<br>', 'texto de prueba 2<br>', 'texto de prueba 2<br>', 1, 1, 1, 1, 1, 1, 1, 1, 56, 10),
(13, 'texto de prueba 2<br>', 'texto de prueba 2<br>', 'texto de prueba 2<br>', 'texto de prueba 2<br>', 1, 1, 1, 1, 1, 1, 1, 1, 55, 11),
(14, 'texto de prueba 2<br>', 'texto de prueba 2<br>', 'texto de prueba 2<br>', 'texto de prueba 2<br>', 1, 1, 1, 1, 1, 1, 1, 1, 56, 11),
(31, 'texto de prueba 2<br>', 'texto de prueba 2<br>', 'texto de prueba 2<br>', 'texto de prueba 2<br>', 1, 1, 1, 1, 1, 1, 1, 1, 55, 12),
(32, 'texto de prueba 2<br>', 'texto de prueba 2<br>', 'texto de prueba 2<br>', 'texto de prueba 2<br>', 1, 1, 1, 1, 1, 1, 1, 1, 56, 12),
(33, 'texto de prueba 2<br>', 'texto de prueba 2<br>', 'texto de prueba 2<br>', 'texto de prueba 2<br>', 1, 1, 1, 1, 1, 1, 1, 1, 55, 13),
(34, 'texto de prueba 2<br>', 'texto de prueba 2<br>', 'texto de prueba 2<br>', 'texto de prueba 2<br>', 1, 1, 1, 1, 1, 1, 1, 1, 56, 13),
(35, 'texto de prueba 2<br>', 'texto de prueba 2<br>', 'texto de prueba 2<br>', 'texto de prueba 2<br>', 1, 1, 1, 1, 1, 1, 1, 1, 55, 14),
(36, 'texto de prueba 2<br>', 'texto de prueba 2<br>', 'texto de prueba 2<br>', 'texto de prueba 2<br>', 1, 1, 1, 1, 1, 1, 1, 1, 56, 14),
(37, 'texto de prueba', 'texto de prueba<br>', 'texto de prueba<br>', 'texto de prueba<br>', 1, 1, 1, 1, 1, 1, 1, 1, 61, 15),
(38, 'texto de prueba', 'texto de prueba<br>', 'texto de prueba<br>', 'texto de prueba<br>', 1, 1, 1, 1, 1, 1, 1, 1, 61, 16),
(39, 'texto de prueba', 'texto de prueba<br>', 'texto de prueba<br>', 'texto de prueba<br>', 1, 1, 1, 1, 1, 1, 1, 1, 61, 17),
(40, 'texto de prueba', 'texto de prueba<br>', 'texto de prueba<br>', 'texto de prueba<br>', 1, 1, 1, 1, 1, 1, 1, 1, 61, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE IF NOT EXISTS `docente` (
`doc_id` int(11) NOT NULL,
  `usu_rut` int(11) NOT NULL,
  `asig_codigo` int(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`doc_id`, `usu_rut`, `asig_codigo`) VALUES
(2, 6482318, 240022),
(3, 8918389, 634065),
(1, 9658063, 634066),
(4, 12970102, 634066);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_electivo`
--

CREATE TABLE IF NOT EXISTS `grupo_electivo` (
  `ge_codigo` int(6) NOT NULL,
  `ge_nombre` varchar(45) NOT NULL,
  `ge_periodo` int(11) NOT NULL,
  `ge_creditos` int(11) NOT NULL,
  `m_id` varchar(11) NOT NULL,
  `ta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupo_electivo`
--

INSERT INTO `grupo_electivo` (`ge_codigo`, `ge_nombre`, `ge_periodo`, `ge_creditos`, `m_id`, `ta_id`) VALUES
(634092, 'Electivo I', 9, 3, '2957-1', 3),
(634093, 'Electivo II', 9, 3, '2957-1', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `malla`
--

CREATE TABLE IF NOT EXISTS `malla` (
  `m_id` varchar(11) NOT NULL,
  `m_fechaModificacion` date NOT NULL,
  `m_fechaInicio` date NOT NULL,
  `m_fechaFin` date NOT NULL,
  `m_cantidadSemestres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `malla`
--

INSERT INTO `malla` (`m_id`, `m_fechaModificacion`, `m_fechaInicio`, `m_fechaFin`, `m_cantidadSemestres`) VALUES
('2957-1', '2016-11-08', '2016-10-26', '2017-10-26', 10),
('2957-2', '2016-12-13', '2016-12-13', '2017-04-08', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
`per_id` int(11) NOT NULL,
  `per_nombre` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`per_id`, `per_nombre`) VALUES
(1, 'Docente'),
(2, 'Directiva'),
(3, 'Secretaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso_usuario`
--

CREATE TABLE IF NOT EXISTS `permiso_usuario` (
  `usu_rut` int(11) NOT NULL,
  `per_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `permiso_usuario`
--

INSERT INTO `permiso_usuario` (`usu_rut`, `per_id`) VALUES
(6482318, 1),
(7131066, 1),
(8906080, 1),
(9426145, 1),
(9520261, 1),
(9632094, 1),
(9658063, 1),
(10680002, 1),
(12551754, 1),
(12907510, 1),
(12970102, 1),
(12970221, 1),
(13131344, 1),
(13256663, 1),
(13828864, 1),
(14030436, 1),
(15181008, 1),
(15780544, 1),
(16217315, 1),
(16228622, 1),
(16251825, 1),
(16931250, 1),
(17060646, 1),
(17935210, 1),
(8918389, 2),
(17750029, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prerrequisito`
--

CREATE TABLE IF NOT EXISTS `prerrequisito` (
`pre_id` int(11) NOT NULL,
  `asig_codigo` int(6) NOT NULL,
  `asig_codigo_prerrequisito` int(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prerrequisito`
--

INSERT INTO `prerrequisito` (`pre_id`, `asig_codigo`, `asig_codigo_prerrequisito`) VALUES
(2, 240035, 240012),
(3, 240036, 240013),
(6, 241052, 240012),
(5, 241052, 240036);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa_basico`
--

CREATE TABLE IF NOT EXISTS `programa_basico` (
`pb_id` int(11) NOT NULL,
  `pb_tipo_curso` varchar(45) DEFAULT NULL,
  `pb_carrera` varchar(45) DEFAULT NULL,
  `pb_departamento` varchar(45) DEFAULT NULL,
  `pb_facultad` varchar(45) DEFAULT NULL,
  `pb_nro_creditos` int(11) DEFAULT NULL,
  `pb_horas_cronologicas` int(11) DEFAULT NULL,
  `pb_horas_pedagogicas` int(11) DEFAULT NULL,
  `pb_anio` int(11) DEFAULT NULL,
  `pb_semestre` int(11) DEFAULT NULL,
  `pb_hrs_presenciales` int(11) DEFAULT NULL,
  `pb_ht_presenciales` int(11) DEFAULT NULL,
  `pb_hp_presenciales` int(11) DEFAULT NULL,
  `pb_hl_presenciales` int(11) DEFAULT NULL,
  `pb_hrs_autonomas` int(11) DEFAULT NULL,
  `pb_ht_autonomas` int(11) DEFAULT NULL,
  `pb_hp_autonomas` int(11) DEFAULT NULL,
  `pb_hl_autonomas` int(11) DEFAULT NULL,
  `pb_presentacion` varchar(2000) DEFAULT NULL,
  `pb_descriptor_competencias` varchar(2000) DEFAULT NULL,
  `pb_aprendizajes_previos` varchar(100) DEFAULT NULL,
  `pb_biblio_fundamental` varchar(500) DEFAULT NULL,
  `pb_biblio_complementaria` varchar(500) DEFAULT NULL,
  `asig_codigo` int(6) NOT NULL,
  `pb_fecha_modificacion` datetime NOT NULL,
  `usu_rut` int(11) NOT NULL,
  `pb_borrador` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `programa_basico`
--

INSERT INTO `programa_basico` (`pb_id`, `pb_tipo_curso`, `pb_carrera`, `pb_departamento`, `pb_facultad`, `pb_nro_creditos`, `pb_horas_cronologicas`, `pb_horas_pedagogicas`, `pb_anio`, `pb_semestre`, `pb_hrs_presenciales`, `pb_ht_presenciales`, `pb_hp_presenciales`, `pb_hl_presenciales`, `pb_hrs_autonomas`, `pb_ht_autonomas`, `pb_hp_autonomas`, `pb_hl_autonomas`, `pb_presentacion`, `pb_descriptor_competencias`, `pb_aprendizajes_previos`, `pb_biblio_fundamental`, `pb_biblio_complementaria`, `asig_codigo`, `pb_fecha_modificacion`, `usu_rut`, `pb_borrador`) VALUES
(2, 'Obligatorio, Formacion Basica ', 'Ingenieri­a Civil en Informatica', 'Ciencias Basicas, Matematica', 'Ciencias', 5, 150, 225, 2, 2, 108, 4, 2, 0, 117, 4, 3, 0, 'hola mundo', '<p class="MsoNormal" style="text-align:justify"><span lang="ES" style="font-size:\r\n10.0pt;mso-bidi-font-size:14.0pt;font-family:" arial",sans-serif"="">Resolver problemas\r\nrelativos a la Ciencias de la IngenierÃ­a utilizando como herramienta de\r\nmodelamiento las ecuaciones diferenciales ordinarias. &nbsp;<o:p></o:p></span></p>\r\n\r\n<p class="MsoNormal" style="text-align:justify"><span lang="ES" style="font-size:\r\n10.0pt;mso-bidi-font-size:14.0pt;font-family:" arial",sans-serif"=""><o:p>&nbsp;</o:p></span></p>\r\n\r\n<p class="MsoNormal" style="text-align:justify"><span lang="ES" style="font-size:\r\n10.0pt;mso-bidi-font-size:14.0pt;font-family:" arial",sans-serif"="">Resultados de\r\naprendizaje:<o:p></o:p></span></p>\r\n\r\n<p class="MsoNormal" style="text-align:justify"><span lang="ES" style="font-size:\r\n10.0pt;mso-bidi-font-size:14.0pt;font-family:" arial",sans-serif"=""><o:p>&nbsp;</o:p></span></p>\r\n\r\n<ol style="margin-top:0cm" start="1" type="1">\r\n <li class="MsoNormal" style="text-align:justify;mso-list:l0 level1 lfo1"><span lang="ES" style="font-size:10.0pt;mso-bidi-font-size:14.0pt;font-family:\r\n     " arial",sans-serif"="">Fundamenta la aplicaciÃ³n de un determinado mÃ©todo segÃºn\r\n     tipo de ecuaciÃ³n diferencial ordinaria para la resoluciÃ³n de problemas que\r\n     involucran ecuaciones diferenciales ordinarias.<o:p></o:p></span></li>\r\n <li class="MsoNormal" style="text-align:justify;mso-list:l0 level1 lfo1"><span lang="ES" style="font-size:10.0pt;mso-bidi-font-size:14.0pt;font-family:\r\n     " arial",sans-serif"="">Aplica mÃ©todos de resoluciÃ³n de ecuaciones\r\n     diferenciales ordinarias de orden superior con coeficientes constantes,\r\n     coeficientes variables y sistemas de ecuaciones diferenciales ordinarias\r\n     para modelar y fundamentar fenÃ³menos fÃ­sicos.<o:p></o:p></span></li>\r\n <li class="MsoNormal" style="text-align:justify;mso-list:l0 level1 lfo1"></li></ol>', 'aprendisajes previos pruenta', '<p class="MsoNormal"><br></p>\r\n\r\n<p class="MsoNormal" style="margin-top:0cm;margin-right:0cm;margin-bottom:12.0pt;\r\nmargin-left:18.0pt;text-align:justify;mso-pagination:none;mso-layout-grid-align:\r\nnone;text-autospace:none"><span lang="ES-MX" style="font-size:10.0pt;mso-bidi-font-size:\r\n11.0pt;font-family:" arial",sans-serif;mso-bidi-font-family:"times="" new="" roman";="" mso-ansi-language:es-mx"="">Toledo, F. (2002). <i>Ecuaciones\r\nDiferenciales</i>. ChillÃ¡n: Universidad del BÃ­o-BÃ­o</span>&', '<p class="MsoNormal" style="margin-top:0cm;margin-right:0cm;margin-bottom:12.0pt;\r\nmargin-left:18.0pt;text-align:justify;mso-pagination:none;mso-layout-grid-align:\r\nnone;text-autospace:none"><span style="font-size:10.0pt;mso-bidi-font-size:\r\n11.0pt;font-family:" arial",sans-serif;mso-bidi-font-family:"times="" new="" roman";="" mso-ansi-language:es-cl"="">Campbell, S. L, y Haberman, R. </span></p>', 240012, '2016-12-20 17:49:45', 8918389, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa_didactico`
--

CREATE TABLE IF NOT EXISTS `programa_didactico` (
`pd_id` int(11) NOT NULL,
  `pe_id` int(11) NOT NULL,
  `pd_fecha_modificacion` datetime NOT NULL,
  `usu_rut` int(11) NOT NULL,
  `pd_borrador` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `programa_didactico`
--

INSERT INTO `programa_didactico` (`pd_id`, `pe_id`, `pd_fecha_modificacion`, `usu_rut`, `pd_borrador`) VALUES
(5, 19, '2016-12-20 21:55:36', 8918389, 1),
(6, 19, '2016-12-20 21:57:32', 8918389, 1),
(7, 19, '2016-12-20 22:00:46', 8918389, 1),
(8, 19, '2016-12-20 22:02:34', 8918389, 1),
(9, 19, '2016-12-20 22:03:42', 8918389, 1),
(10, 19, '2016-12-20 22:04:50', 8918389, 1),
(11, 19, '2016-12-20 22:05:22', 8918389, 1),
(12, 19, '2016-12-20 23:05:50', 8918389, 0),
(13, 19, '2016-12-20 23:06:07', 8918389, 0),
(14, 19, '2016-12-20 23:07:09', 8918389, 0),
(15, 24, '2016-12-23 00:09:48', 12970102, 3),
(16, 24, '2016-12-23 00:17:39', 12970102, 3),
(17, 24, '2016-12-23 00:19:07', 12970102, 1),
(18, 24, '2016-12-23 00:19:31', 12970102, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa_extenso`
--

CREATE TABLE IF NOT EXISTS `programa_extenso` (
`pe_id` int(11) NOT NULL,
  `pe_tipo_curso` varchar(45) DEFAULT NULL,
  `pe_carrera` varchar(45) DEFAULT NULL,
  `pe_departamento` varchar(45) DEFAULT NULL,
  `pe_facultad` varchar(45) DEFAULT NULL,
  `pe_nro_creditos` int(11) DEFAULT NULL,
  `pe_horas_cronologicas` int(11) DEFAULT NULL,
  `pe_horas_pedagogicas` int(11) DEFAULT NULL,
  `pe_anio` int(11) DEFAULT NULL,
  `pe_semestre` int(11) DEFAULT NULL,
  `pe_hrs_presenciales` int(11) DEFAULT NULL,
  `pe_ht_presenciales` int(11) DEFAULT NULL,
  `pe_hp_presenciales` int(11) DEFAULT NULL,
  `pe_hl_presenciales` int(11) DEFAULT NULL,
  `pe_hrs_autonomas` int(11) DEFAULT NULL,
  `pe_ht_autonomas` int(11) DEFAULT NULL,
  `pe_hp_autonomas` int(11) DEFAULT NULL,
  `pe_hl_autonomas` int(11) DEFAULT NULL,
  `pe_presentacion` varchar(2000) DEFAULT NULL,
  `pe_descriptor_competencias` varchar(2000) DEFAULT NULL,
  `pe_aprendizajes_previos` varchar(2000) DEFAULT NULL,
  `pe_fecha_inicio` date DEFAULT NULL,
  `pe_fecha_fin` date DEFAULT NULL,
  `pe_observacion` varchar(100) DEFAULT NULL,
  `pe_biblio_fundamental` varchar(2000) DEFAULT NULL,
  `pe_biblio_complementaria` varchar(2000) DEFAULT NULL,
  `asig_codigo` int(6) NOT NULL,
  `pe_fecha_modificacion` datetime NOT NULL,
  `usu_rut` int(11) NOT NULL,
  `pe_borrador` int(1) NOT NULL,
  `pe_sistema_evaluacion` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_estonian_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `programa_extenso`
--

INSERT INTO `programa_extenso` (`pe_id`, `pe_tipo_curso`, `pe_carrera`, `pe_departamento`, `pe_facultad`, `pe_nro_creditos`, `pe_horas_cronologicas`, `pe_horas_pedagogicas`, `pe_anio`, `pe_semestre`, `pe_hrs_presenciales`, `pe_ht_presenciales`, `pe_hp_presenciales`, `pe_hl_presenciales`, `pe_hrs_autonomas`, `pe_ht_autonomas`, `pe_hp_autonomas`, `pe_hl_autonomas`, `pe_presentacion`, `pe_descriptor_competencias`, `pe_aprendizajes_previos`, `pe_fecha_inicio`, `pe_fecha_fin`, `pe_observacion`, `pe_biblio_fundamental`, `pe_biblio_complementaria`, `asig_codigo`, `pe_fecha_modificacion`, `usu_rut`, `pe_borrador`, `pe_sistema_evaluacion`) VALUES
(19, 'jhjkhlkhlkj', 'Ingenieria Civil en Informatica', 'hjkhjkhkl', 'hljkhl', 545, 454, 5, 5, 45, 45, 45, 45, 45, 45, 4, 54, 54, 'texto de prueba 2', 'texto de prueba<br>', 'texto de prueba<br>', '2014-01-01', '2016-01-02', 'texto de prueba<br>', 'texto de prueba<br>', 'texto de prueba<br>', 240012, '2016-12-20 18:38:27', 8918389, 0, 'texto de prueba<br>'),
(21, 'Prueba', 'Ingenieria Civil en Informatica', 'Prueba', 'Prueba', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'texto de prueba', 'texto de prueba<br>', 'texto de prueba<br>', '2016-01-01', '2017-01-01', 'texto de prueba<br>', 'texto de prueba<br>', 'texto de prueba<br>', 634066, '2016-12-21 17:09:51', 12970102, 0, 'texto de prueba<br>'),
(22, 'Prueba', 'Ingenieria Civil en Informatica', 'Prueba', 'Prueba', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'texto de prueba', 'texto de prueba<br>', 'texto de prueba<br>', '2016-01-01', '2017-01-01', '<br>', 'texto de prueba<br>', 'texto de prueba<br>', 634066, '2016-12-22 22:57:37', 12970102, 3, 'texto de prueba<br>'),
(23, 'Prueba', 'Ingenieri­a Civil en Informatica', 'Prueba', 'Prueba', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'texto de prueba', 'texto de prueba<br>', 'texto de prueba<br>', '2016-01-01', '2017-01-01', '<br>', 'texto de prueba<br>', 'texto de prueba<br>', 634066, '2016-12-22 23:42:33', 12970102, 2, 'texto de prueba<br>'),
(24, 'Prueba', 'Ingenieria Civil en Informatica', 'Prueba', 'Prueba', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'texto de prueba', 'texto de prueba<br>', 'texto de prueba<br>', '2016-01-01', '2017-01-01', '<br>', 'texto de prueba<br>', 'texto de prueba<br>', 634066, '2016-12-22 23:45:22', 12970102, 0, 'texto de prueba<br>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultado_aprendizaje`
--

CREATE TABLE IF NOT EXISTS `resultado_aprendizaje` (
`ra_id` int(11) NOT NULL,
  `ra_resultado_aprendizaje` varchar(1000) DEFAULT NULL,
  `ra_metodologia` varchar(1000) DEFAULT NULL,
  `ra_criterios_evaluacion` varchar(1000) DEFAULT NULL,
  `ra_contenido_con_pro_act` varchar(1000) DEFAULT NULL,
  `ra_ht_presenciales` int(11) DEFAULT NULL,
  `ra_hp_presenciales` int(11) DEFAULT NULL,
  `ra_ht_autonomas` int(11) DEFAULT NULL,
  `ra_hp_autonomas` int(11) DEFAULT NULL,
  `ra_evidencia_aprendizaje` varchar(1000) DEFAULT NULL,
  `pe_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `resultado_aprendizaje`
--

INSERT INTO `resultado_aprendizaje` (`ra_id`, `ra_resultado_aprendizaje`, `ra_metodologia`, `ra_criterios_evaluacion`, `ra_contenido_con_pro_act`, `ra_ht_presenciales`, `ra_hp_presenciales`, `ra_ht_autonomas`, `ra_hp_autonomas`, `ra_evidencia_aprendizaje`, `pe_id`) VALUES
(55, 'texto de prueba<br>', 'texto de prueba<br>', 'texto de prueba<br>', 'texto de prueba<br>', 12, 12, 12, 121, 'texto de prueba<br>', 19),
(56, 'texto de prueba<br>', 'texto de prueba 2<br>', 'texto de prueba<br>', 'texto de prueba<br>', 12, 21, 21, 2, 'texto de prueba<br>', 19),
(58, 'texto de prueba<br>', 'texto de prueba<br>', 'texto de prueba<br>', 'texto de prueba<br>', 1, 1, 1, 1, 'texto de prueba<br>', 21),
(59, 'texto de prueba<br>', 'texto de prueba<br>', 'texto de prueba<br>', 'texto de prueba<br>', 1, 1, 1, 1, 'texto de prueba<br>', 22),
(60, 'texto de prueba<br>', 'texto de prueba<br>', 'texto de prueba<br>', 'texto de prueba<br>', 1, 1, 1, 1, 'texto de prueba<br>', 23),
(61, 'texto de prueba<br>', 'texto de prueba<br>', 'texto de prueba<br>', 'texto de prueba<br>', 1, 1, 1, 1, 'texto de prueba<br>', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_asignatura`
--

CREATE TABLE IF NOT EXISTS `tipo_asignatura` (
`ta_id` int(11) NOT NULL,
  `ta_nombre` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_asignatura`
--

INSERT INTO `tipo_asignatura` (`ta_id`, `ta_nombre`) VALUES
(1, 'Común'),
(2, 'Formación Integral'),
(3, 'Electivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `usu_rut` int(11) NOT NULL,
  `usu_nombres` varchar(200) NOT NULL,
  `usu_apellidos` varchar(200) NOT NULL,
  `usu_email` varchar(100) NOT NULL,
  `usu_password` varchar(100) NOT NULL,
  `usu_docente` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_rut`, `usu_nombres`, `usu_apellidos`, `usu_email`, `usu_password`, `usu_docente`) VALUES
(6482318, 'JUAN FRANCISCO', 'ESCALONA SEPULVEDA', 'jescalon@ubiobio.cl', '893cf5c151e6309d622bbf0b07c79daf', 1),
(7131066, 'ALFONSO ENRIQUE', 'RODRIGUEZ RIOS', 'alfonso@ubiobio.cl', 'a66cfe73aac1e2ff10116081c2d910c3', 1),
(8906080, 'GILBERTO ANTONIO', 'GUTIERREZ RETAMAL', 'ggutierr@ubiobio.cl', 'c48a3dc220cc64d99672071fb021d6af', 1),
(8918389, 'MARLENE ELENA ', 'ELENA MUÑOZ SEPULVEDA', 'marlene@ubiobio.cl', '4303509f136fb8e54a0abd33f17da4f6', 1),
(9426145, 'MARIA ANGELICA', 'CARO GUTIERREZ', 'mcaro@ubiobio.cl', '6cc32f9578e302908f372125a59dad28', 1),
(9520261, 'SYLVIA MARCELA', 'PINTO FERNANDEZ', 'marcela@ubiobio.cl', 'c5265549057d7ac0e890206f2f135f5b', 1),
(9632094, 'IRMA ', 'BORQUEZ', 'iborquez@ubiobio.cl', 'a159681ec5d001a6e9e912bf0b7abf6b', 0),
(9658063, 'MARIA ANTONIETA ', 'SOTO CHICO', 'msoto@ubiobio.cl', '2b365511e4b247cbc766bd5deb72ae1e', 1),
(10680002, 'MIGUEL RODRIGO', 'PINCHEIRA CARO', 'mpincheir@ubiobio.cl', '5f56ef2787acef2facd7cf556eddf0a9', 1),
(12551754, 'LUIS DANIEL', 'GAJARDO DIAZ', 'lgajardo@ubiobio.cl', 'a2a63488e7d21aadde6be64fab952d4c', 1),
(12907510, 'MARIO ANDRES', 'GAETE PRADENA', 'mario.gaete@sintec.cl', 'df72fba262b62daa0d128c3984d951ad', 0),
(12970102, 'CLAUDIO', 'MUÑOZ SEPULVEDA', 'clamunoz@ubiobio.cl', '0f4ccb0726703154287f87bd559abc4d', 1),
(12970221, 'VICTOR ANDRÉS ', 'CEBALLOS MUÑOZ', 'ceballos@ubiobio.cl', 'e32ce8657f3587b8badfb46f31e216ad', 1),
(13131344, 'MIGUEL', 'ROMERO VASQUEZ', 'miguel.romero@ubiobio.cl', 'f445782a15674b0b0800c792c97cc707', 1),
(13256663, 'ALEJANDRA', 'FUENTES LAGOS', 'alejandra.fuentes.lagos@gmail.com', '5acc15b7f6a73a0ecb92788d156b15ae', 1),
(13828864, 'FABIÁN ADOLFO ', 'VILLAGRAN GUTIERREZ', 'fabo21@gmail.com', 'e511b39fc1c047573335f558252c0219', 1),
(14030436, 'JUAN CARLOS', 'FIGUEROA DURÁN', 'juancarlosfigueroaduran@gmail.com', '585048ffed6e869fce27626d6d0737b3', 1),
(15181008, 'CAROLA ANDREA ', 'FIGUEROA FLORES', 'cfigueroa@ubiobio.cl', 'bf8648d836fff20441cf7eb5dde2bc87', 1),
(15780544, 'FERNANDO ANDRES', 'SANTOLAYA FRANCO', 'fsantolaya@ubiobio.cl', '9d69265511fd208ae293ab78d009b46b', 1),
(16217315, 'JUAN JOSE', 'RAMIREZ LAMA', 'juaramir@ubiobio.cl', '5bb120d8c93b0ac3eec9693524309292', 0),
(16228622, 'JOEL ALEJANDRO', 'FUENTES LÓPEZ', 'jfuentes@ubiobio.cl', '41ab9a5191d928ca6068a716a08be005', 1),
(16251825, 'SERGIO ROCA MUNOZ', 'SERGIO ROCA MUNOZ', 'sroca@ubiobio.cl', '76d284a217295c9b4a60c115689bf6fa', 0),
(16931250, 'DANIEL EDUARDO', 'ESPINOZA NÚÑEZ', 'deespino@egresados.ubiobio.cl', '7380da0ab819043f807a29100b6e2dc0', 0),
(17060646, 'DIEGO FELIPE', 'SEPÚLVEDA BRIONES', 'diego.felipe.sepulveda.briones@gmail.com', '1340672e0879f01fd551b8cc5adb90f2', 0),
(17750029, 'Yaquelin Victoria', 'Badillo Castro', 'secretaria-ici-chi@ubiobio.cl', '23867bfa07b4b9590c2722e80abf03ba', 0),
(17935210, 'CLAUDIO', 'TORRES FONSECA', 'torresfonseca.cl@gmail.com', 'b5f39fbedd69c8af64564408cf5de0c5', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
 ADD PRIMARY KEY (`asig_codigo`), ADD KEY `m_idMalla` (`m_id`,`ta_id`), ADD KEY `ta_id` (`ta_id`);

--
-- Indices de la tabla `desarrollo_programa_didactico`
--
ALTER TABLE `desarrollo_programa_didactico`
 ADD PRIMARY KEY (`dpd_id`), ADD KEY `ra_id` (`ra_id`), ADD KEY `pd_id` (`pd_id`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
 ADD PRIMARY KEY (`doc_id`), ADD KEY `usu_rut` (`usu_rut`,`asig_codigo`), ADD KEY `asig_codigo` (`asig_codigo`);

--
-- Indices de la tabla `grupo_electivo`
--
ALTER TABLE `grupo_electivo`
 ADD PRIMARY KEY (`ge_codigo`), ADD KEY `m_id` (`m_id`), ADD KEY `ta_id` (`ta_id`);

--
-- Indices de la tabla `malla`
--
ALTER TABLE `malla`
 ADD PRIMARY KEY (`m_id`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
 ADD PRIMARY KEY (`per_id`);

--
-- Indices de la tabla `permiso_usuario`
--
ALTER TABLE `permiso_usuario`
 ADD PRIMARY KEY (`usu_rut`), ADD KEY `per_id` (`per_id`);

--
-- Indices de la tabla `prerrequisito`
--
ALTER TABLE `prerrequisito`
 ADD PRIMARY KEY (`pre_id`), ADD KEY `pre_codAsignatura` (`asig_codigo`,`asig_codigo_prerrequisito`), ADD KEY `asig_codigo_prerrequisito` (`asig_codigo_prerrequisito`);

--
-- Indices de la tabla `programa_basico`
--
ALTER TABLE `programa_basico`
 ADD PRIMARY KEY (`pb_id`), ADD KEY `asig_codigo` (`asig_codigo`,`usu_rut`), ADD KEY `usu_rut` (`usu_rut`);

--
-- Indices de la tabla `programa_didactico`
--
ALTER TABLE `programa_didactico`
 ADD PRIMARY KEY (`pd_id`), ADD KEY `mu_id` (`pe_id`,`usu_rut`);

--
-- Indices de la tabla `programa_extenso`
--
ALTER TABLE `programa_extenso`
 ADD PRIMARY KEY (`pe_id`), ADD KEY `asig_codigo` (`asig_codigo`,`usu_rut`), ADD KEY `usu_rut` (`usu_rut`);

--
-- Indices de la tabla `resultado_aprendizaje`
--
ALTER TABLE `resultado_aprendizaje`
 ADD PRIMARY KEY (`ra_id`), ADD KEY `pe_id` (`pe_id`);

--
-- Indices de la tabla `tipo_asignatura`
--
ALTER TABLE `tipo_asignatura`
 ADD PRIMARY KEY (`ta_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`usu_rut`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `desarrollo_programa_didactico`
--
ALTER TABLE `desarrollo_programa_didactico`
MODIFY `dpd_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `prerrequisito`
--
ALTER TABLE `prerrequisito`
MODIFY `pre_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `programa_basico`
--
ALTER TABLE `programa_basico`
MODIFY `pb_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `programa_didactico`
--
ALTER TABLE `programa_didactico`
MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `programa_extenso`
--
ALTER TABLE `programa_extenso`
MODIFY `pe_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `resultado_aprendizaje`
--
ALTER TABLE `resultado_aprendizaje`
MODIFY `ra_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT de la tabla `tipo_asignatura`
--
ALTER TABLE `tipo_asignatura`
MODIFY `ta_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignatura`
--
ALTER TABLE `asignatura`
ADD CONSTRAINT `asignatura_ibfk_1` FOREIGN KEY (`ta_id`) REFERENCES `tipo_asignatura` (`ta_id`),
ADD CONSTRAINT `asignatura_ibfk_2` FOREIGN KEY (`m_id`) REFERENCES `malla` (`m_id`);

--
-- Filtros para la tabla `desarrollo_programa_didactico`
--
ALTER TABLE `desarrollo_programa_didactico`
ADD CONSTRAINT `desarrollo_programa_didactico_ibfk_1` FOREIGN KEY (`ra_id`) REFERENCES `resultado_aprendizaje` (`ra_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `desarrollo_programa_didactico_ibfk_2` FOREIGN KEY (`pd_id`) REFERENCES `programa_didactico` (`pd_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
ADD CONSTRAINT `docente_ibfk_1` FOREIGN KEY (`usu_rut`) REFERENCES `usuario` (`usu_rut`),
ADD CONSTRAINT `docente_ibfk_2` FOREIGN KEY (`asig_codigo`) REFERENCES `asignatura` (`asig_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `grupo_electivo`
--
ALTER TABLE `grupo_electivo`
ADD CONSTRAINT `grupo_electivo_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `malla` (`m_id`);

--
-- Filtros para la tabla `permiso_usuario`
--
ALTER TABLE `permiso_usuario`
ADD CONSTRAINT `permiso_usuario_ibfk_1` FOREIGN KEY (`per_id`) REFERENCES `perfil` (`per_id`),
ADD CONSTRAINT `permiso_usuario_ibfk_2` FOREIGN KEY (`usu_rut`) REFERENCES `usuario` (`usu_rut`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prerrequisito`
--
ALTER TABLE `prerrequisito`
ADD CONSTRAINT `prerrequisito_ibfk_1` FOREIGN KEY (`asig_codigo`) REFERENCES `asignatura` (`asig_codigo`),
ADD CONSTRAINT `prerrequisito_ibfk_2` FOREIGN KEY (`asig_codigo_prerrequisito`) REFERENCES `asignatura` (`asig_codigo`);

--
-- Filtros para la tabla `programa_basico`
--
ALTER TABLE `programa_basico`
ADD CONSTRAINT `programa_basico_ibfk_1` FOREIGN KEY (`usu_rut`) REFERENCES `usuario` (`usu_rut`),
ADD CONSTRAINT `programa_basico_ibfk_2` FOREIGN KEY (`asig_codigo`) REFERENCES `asignatura` (`asig_codigo`);

--
-- Filtros para la tabla `programa_didactico`
--
ALTER TABLE `programa_didactico`
ADD CONSTRAINT `programa_didactico_ibfk_1` FOREIGN KEY (`pe_id`) REFERENCES `programa_extenso` (`pe_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `programa_extenso`
--
ALTER TABLE `programa_extenso`
ADD CONSTRAINT `programa_extenso_ibfk_1` FOREIGN KEY (`usu_rut`) REFERENCES `usuario` (`usu_rut`),
ADD CONSTRAINT `programa_extenso_ibfk_2` FOREIGN KEY (`asig_codigo`) REFERENCES `asignatura` (`asig_codigo`);

--
-- Filtros para la tabla `resultado_aprendizaje`
--
ALTER TABLE `resultado_aprendizaje`
ADD CONSTRAINT `resultado_aprendizaje_ibfk_1` FOREIGN KEY (`pe_id`) REFERENCES `programa_extenso` (`pe_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
