-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-12-2016 a las 04:47:46
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
  `ta_id` int(11) NOT NULL,
  `correquisito` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`asig_codigo`, `asig_nombre`, `asig_periodo`, `asig_creditos`, `m_id`, `ta_id`, `correquisito`) VALUES
(240012, 'CALCULO I', 1, 5, '2957-1', 1, NULL),
(240013, 'ALGEBRA I', 1, 5, '2957-1', 1, NULL),
(240035, 'CALCULO II', 2, 5, '2957-1', 1, NULL),
(240036, 'ALGEBRA II', 2, 5, '2957-1', 1, NULL),
(240152, 'CALCULO EN VARIAS VAR. Y ECUACIONES DIF.', 3, 5, '2957-1', 1, NULL),
(240153, 'ESTADISTICA Y PROBABILIDAD', 4, 5, '2957-1', 1, NULL),
(241052, 'FISICA I', 3, 5, '2957-1', 1, NULL),
(241053, 'FISICA II', 4, 5, '2957-1', 1, NULL),
(310130, 'INGLES I', 5, 3, '2957-1', 1, NULL),
(310131, 'INGLES II', 6, 3, '2957-1', 1, NULL),
(310132, 'INGLES III', 7, 3, '2957-1', 1, NULL),
(310133, 'INGLES IV', 8, 3, '2957-1', 1, NULL),
(311170, 'LENGUAJE Y COMUNICACION', 1, 3, '2957-1', 1, NULL),
(326444, 'FORM. GENERAL I', 2, 2, '2957-1', 2, NULL),
(326445, 'FORM. GENERAL II', 4, 2, '2957-1', 2, NULL),
(326446, 'FORM. GENERAL III', 5, 2, '2957-1', 2, NULL),
(412010, 'SISTEMAS DIGITALES', 5, 4, '2957-1', 1, NULL),
(630097, 'GESTION DE EMPRESA I', 3, 4, '2957-1', 1, NULL),
(630098, 'GESTION DE EMPRESA II', 4, 4, '2957-1', 1, NULL),
(630099, 'INFORMATICA EN LA LA SOCIEDAD Y LEGISTACION', 9, 3, '2957-1', 1, NULL),
(630125, 'GESTION ESTRATEGICA', 10, 3, '2957-1', 1, NULL),
(631045, 'ECONOMIA', 3, 4, '2957-1', 1, NULL),
(631046, 'FORM. Y EVAL. DE PROYECTOS', 8, 4, '2957-1', 1, NULL),
(632079, 'SISTEMAS CONTABLES', 4, 4, '2957-1', 1, NULL),
(632080, 'SISTEMAS FINANCIEROS', 6, 4, '2957-1', 1, NULL),
(634055, 'INGENIERIA DEL SOFTWARE', 8, 4, '2957-1', 1, NULL),
(634065, 'INTRODUCCION A LA INGENIERIA', 1, 3, '2957-1', 1, NULL),
(634066, 'INTRODUCCION A LA PROGRAMACION', 1, 5, '2957-1', 1, NULL),
(634067, 'ESTRUCTURAS DISCRETAS CS. COMPUTACION', 2, 4, '2957-1', 1, NULL),
(634068, 'DISENO Y CONSTRUCCION ', 2, 4, '2957-1', 1, NULL),
(634069, 'ESTRUCTURA DE DATOS', 3, 5, '2957-1', 1, NULL),
(634070, 'FUNDAMENTOS DE CS. COMPUTACION', 4, 4, '2957-1', 1, NULL),
(634072, 'PARADIGMAS DE PROGRAMACION', 5, 4, '2957-1', 1, NULL),
(634073, 'ANÃLISIS Y DISEÃ‘O DE ALGORITMOS', 5, 4, '2957-1', 1, NULL),
(634074, 'TEORIA DE SISTEMAS', 5, 4, '2957-1', 1, NULL),
(634075, 'INVESTIGACION DE OPERACIONES I', 6, 4, '2957-1', 1, NULL),
(634076, 'MODELAMIENTO DE INFORMACIÃ“N', 6, 4, '2957-1', 1, NULL),
(634077, 'ARQUITECTURA DE COMPUTADORES', 6, 5, '2957-1', 1, NULL),
(634078, 'PRACTICA PROFESIONAL I', 6, 4, '2957-1', 1, NULL),
(634079, 'INVESTIGACION DE OPERACIONES II', 7, 4, '2957-1', 1, NULL),
(634080, 'BASE DE DATOS I', 7, 4, '2957-1', 1, NULL),
(634081, 'SISTEMAS OPERATIVOS ', 7, 4, '2957-1', 1, NULL),
(634082, 'INTELIGENCIA ARTIFICIAL', 7, 4, '2957-1', 1, NULL),
(634083, 'SISTEMAS DE INFORMACION', 7, 4, '2957-1', 1, NULL),
(634084, 'COMUNICACION DE DATOS Y REDES', 8, 4, '2957-1', 1, NULL),
(634086, 'METODOLOGÃA DE DESARROLLO DE SOFTWARE', 8, 4, '2957-1', 1, NULL),
(634088, 'PRACTICA PROFESIONAL II', 8, 4, '2957-1', 1, NULL),
(634089, 'BASE DE DATOS II', 9, 4, '2957-1', 1, NULL),
(634090, 'DESARROLLO DE SISTEMAS DE INFORMACIÃ“N', 9, 3, '2957-1', 1, NULL),
(634095, 'TALLER DE DESARROLLO PROYECTO', 10, 8, '2957-1', 1, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE IF NOT EXISTS `docente` (
`doc_id` int(11) NOT NULL,
  `usu_rut` int(11) NOT NULL,
  `asig_codigo` int(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`doc_id`, `usu_rut`, `asig_codigo`) VALUES
(8, 9426145, 634066),
(6, 9520261, 634066),
(7, 9658063, 634066);

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
(634092, 'ELECTIVO I', 9, 3, '2957-1', 3),
(634093, 'ELECTIVO II', 9, 3, '2957-1', 3),
(634094, 'ELECTIVO III', 9, 3, '2957-1', 3),
(634096, 'ELECTIVO IV', 10, 3, '2957-1', 3),
(634097, 'ELECTIVO V', 10, 3, '2957-1', 3);

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
('2957-1', '2016-12-29', '2009-01-01', '2012-12-31', 10);

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
(12970102, 2),
(17750029, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prerrequisito`
--

CREATE TABLE IF NOT EXISTS `prerrequisito` (
`pre_id` int(11) NOT NULL,
  `asig_codigo` int(6) NOT NULL,
  `asig_codigo_prerrequisito` int(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prerrequisito`
--

INSERT INTO `prerrequisito` (`pre_id`, `asig_codigo`, `asig_codigo_prerrequisito`) VALUES
(7, 240035, 240012),
(8, 240036, 240013),
(15, 240153, 240035),
(12, 241052, 240012),
(13, 241052, 240036),
(16, 241053, 241052),
(17, 241053, 634068),
(30, 310131, 310130),
(36, 310132, 310131),
(41, 310133, 310132),
(21, 412010, 634067),
(22, 412010, 634069),
(20, 630098, 630097),
(45, 630125, 631046),
(40, 631046, 632080),
(19, 632079, 631045),
(28, 632080, 630098),
(29, 632080, 632079),
(38, 634055, 634083),
(9, 634067, 240013),
(10, 634068, 634066),
(14, 634069, 634068),
(18, 634070, 634068),
(23, 634072, 634069),
(24, 634073, 634070),
(25, 634075, 240153),
(26, 634076, 634069),
(27, 634077, 412010),
(31, 634079, 634075),
(32, 634080, 634076),
(33, 634081, 634077),
(34, 634082, 634072),
(35, 634083, 634074),
(37, 634084, 634081),
(39, 634086, 634083),
(42, 634088, 634078),
(43, 634089, 634080),
(44, 634090, 634086);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4;

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
(1, 'Comun'),
(2, 'Formacion Integral'),
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
(8918389, 'MARLENE ELENA ', 'ELENA MUNOZ SEPULVEDA', 'marlene@ubiobio.cl', '4303509f136fb8e54a0abd33f17da4f6', 1),
(9426145, 'MARIA ANGELICA', 'CARO GUTIERREZ', 'mcaro@ubiobio.cl', '6cc32f9578e302908f372125a59dad28', 1),
(9520261, 'SYLVIA MARCELA', 'PINTO FERNANDEZ', 'marcela@ubiobio.cl', 'c5265549057d7ac0e890206f2f135f5b', 1),
(9632094, 'IRMA ', 'BORQUEZ', 'iborquez@ubiobio.cl', 'a159681ec5d001a6e9e912bf0b7abf6b', 0),
(9658063, 'MARIA ANTONIETA ', 'SOTO CHICO', 'msoto@ubiobio.cl', '2b365511e4b247cbc766bd5deb72ae1e', 1),
(10680002, 'MIGUEL RODRIGO', 'PINCHEIRA CARO', 'mpincheir@ubiobio.cl', '5f56ef2787acef2facd7cf556eddf0a9', 1),
(12551754, 'LUIS DANIEL', 'GAJARDO DIAZ', 'lgajardo@ubiobio.cl', 'a2a63488e7d21aadde6be64fab952d4c', 1),
(12907510, 'MARIO ANDRES', 'GAETE PRADENA', 'mario.gaete@sintec.cl', 'df72fba262b62daa0d128c3984d951ad', 0),
(12970102, 'CLAUDIO', 'MUÑOZ SEPULVEDA', 'clamunoz@ubiobio.cl', '0f4ccb0726703154287f87bd559abc4d', 1),
(12970221, 'VICTOR ANDRÉS ', 'CEBALLOS MUNOZ', 'ceballos@ubiobio.cl', 'e32ce8657f3587b8badfb46f31e216ad', 1),
(13131344, 'MIGUEL', 'ROMERO VASQUEZ', 'miguel.romero@ubiobio.cl', 'f445782a15674b0b0800c792c97cc707', 1),
(13256663, 'ALEJANDRA', 'FUENTES LAGOS', 'alejandra.fuentes.lagos@gmail.com', '5acc15b7f6a73a0ecb92788d156b15ae', 1),
(13828864, 'FABIÁN ADOLFO ', 'VILLAGRAN GUTIERREZ', 'fabo21@gmail.com', 'e511b39fc1c047573335f558252c0219', 1),
(14030436, 'JUAN CARLOS', 'FIGUEROA DURÁN', 'juancarlosfigueroaduran@gmail.com', '585048ffed6e869fce27626d6d0737b3', 1),
(15181008, 'CAROLA ANDREA ', 'FIGUEROA FLORES', 'cfigueroa@ubiobio.cl', 'bf8648d836fff20441cf7eb5dde2bc87', 1),
(15780544, 'FERNANDO ANDRES', 'SANTOLAYA FRANCO', 'fsantolaya@ubiobio.cl', '9d69265511fd208ae293ab78d009b46b', 1),
(16217315, 'JUAN JOSE', 'RAMIREZ LAMA', 'juaramir@ubiobio.cl', '5bb120d8c93b0ac3eec9693524309292', 0),
(16228622, 'JOEL ALEJANDRO', 'FUENTES LÓPEZ', 'jfuentes@ubiobio.cl', '41ab9a5191d928ca6068a716a08be005', 1),
(16251825, 'SERGIO ROCA MUNOZ', 'SERGIO ROCA MUNOZ', 'sroca@ubiobio.cl', '76d284a217295c9b4a60c115689bf6fa', 0),
(16931250, 'DANIEL EDUARDO', 'ESPINOZA NÚNEZ', 'deespino@egresados.ubiobio.cl', '7380da0ab819043f807a29100b6e2dc0', 0),
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
MODIFY `dpd_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `prerrequisito`
--
ALTER TABLE `prerrequisito`
MODIFY `pre_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT de la tabla `programa_basico`
--
ALTER TABLE `programa_basico`
MODIFY `pb_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `programa_didactico`
--
ALTER TABLE `programa_didactico`
MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `programa_extenso`
--
ALTER TABLE `programa_extenso`
MODIFY `pe_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `resultado_aprendizaje`
--
ALTER TABLE `resultado_aprendizaje`
MODIFY `ra_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
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
