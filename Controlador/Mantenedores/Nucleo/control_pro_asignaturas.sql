-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2016 a las 04:16:59
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
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE IF NOT EXISTS `docente` (
`doc_id` int(11) NOT NULL,
  `usu_rut` int(11) NOT NULL,
  `asig_codigo` int(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`doc_id`, `usu_rut`, `asig_codigo`) VALUES
(1, 9658063, 634066);

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
('2957-1', '2016-11-08', '2016-10-26', '2017-10-26', 10);

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
(8906080, 1),
(9426145, 1),
(9520261, 1),
(9658063, 1),
(10680002, 1),
(12551754, 1),
(12970102, 1),
(12970221, 1),
(13131344, 1),
(13256663, 1),
(13828864, 1),
(14030436, 1),
(15181008, 1),
(15780544, 1),
(16228622, 1),
(17935210, 1),
(7131066, 2),
(8918389, 2),
(9632094, 3),
(12907510, 3),
(16217315, 3),
(16251825, 3),
(16931250, 3),
(17060646, 3);

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
(7131066, 'ALFONSO ENRIQUE', 'RODRIGUEZ RIOS', 'alfonso@ubiobio.cl', 'ZD+iGie8jM/tf2a7/K/oOUmBWj0=', 1),
(8906080, 'GILBERTO ANTONIO', 'GUTIERREZ RETAMAL', 'ggutierr@ubiobio.cl', 'pZwHJ0nBe7ZeNA1VJxHiLibER1k=', 1),
(8918389, 'MARLENE ELENA ', 'ELENA MUÑOZ SEPULVEDA', 'marlene@ubiobio.cl', 'f7/7lz/9pTkfpORvoSmF/SyrMqA=', 1),
(9426145, 'MARIA ANGELICA', 'CARO GUTIERREZ', 'mcaro@ubiobio.cl', 'eo4Evy3vvnNpq9nmX25RfCqFd+w=', 1),
(9520261, 'SYLVIA MARCELA', 'PINTO FERNANDEZ', 'marcela@ubiobio.cl', 'NrfoEgk73FqdubjHEoyrELwR5KA=', 1),
(9632094, 'IRMA ', 'BORQUEZ', 'iborquez@ubiobio.cl', 'BHxmFNawNTZhLppDhQUCZ2KQpgE=', 0),
(9658063, 'MARIA ANTONIETA ', 'SOTO CHICO', 'msoto@ubiobio.cl', 'buAVab/kIwk5rkFCeNzqPxBmK1Q=', 1),
(10680002, 'MIGUEL RODRIGO', 'PINCHEIRA CARO', 'mpincheir@ubiobio.cl', 'Agt8K65QBFiMWVpey9HCaqLMs6I=', 1),
(12551754, 'LUIS DANIEL', 'GAJARDO DIAZ', 'lgajardo@ubiobio.cl', 'VogdMM6koOCLlReXbDvITQmetBk=', 1),
(12907510, 'MARIO ANDRES', 'GAETE PRADENA', 'mario.gaete@sintec.cl', '8D7my8Sip6l0XYAUMdZF1xiXpA4=', 0),
(12970102, 'CLAUDIO', 'MUÑOZ SEPULVEDA', 'clamunoz@ubiobio.cl', '604w+yGX0VivPpNYIabtCIStuyc=', 1),
(12970221, 'VICTOR ANDRÉS ', 'CEBALLOS MUÑOZ', 'ceballos@ubiobio.cl', 'K0dvpaMkwd18cn1/u4igYNYZXWE=', 1),
(13131344, 'MIGUEL', 'ROMERO VASQUEZ', 'miguel.romero@ubiobio.cl', 'JrZSKOQ3T6ihdkTLnHzJsiviTlM=', 1),
(13256663, 'ALEJANDRA', 'FUENTES LAGOS', 'alejandra.fuentes.lagos@gmail.com', 'SKueL1Hg8X+g14Pji38oziOaN6k=', 1),
(13828864, 'FABIÁN ADOLFO ', 'VILLAGRAN GUTIERREZ', 'fabo21@gmail.com', 'STg+P6X3srd+NX62G5z0xZySunI=', 1),
(14030436, 'JUAN CARLOS', 'FIGUEROA DURÁN', 'juancarlosfigueroaduran@gmail.com', 'Erb922AaEQRe1ydO9Lip7SQRRaY=', 1),
(15181008, 'CAROLA ANDREA ', 'FIGUEROA FLORES', 'cfigueroa@ubiobio.cl', 'qQq/OZmyQwtHM6/0tTOdBiisiF4=', 1),
(15780544, 'FERNANDO ANDRES', 'SANTOLAYA FRANCO', 'fsantolaya@ubiobio.cl', 'AFqp3JWhXDqea8sj/3MKO7RBKMA=', 1),
(16217315, 'JUAN JOSE', 'RAMIREZ LAMA', 'juaramir@ubiobio.cl', 'aB8CNYjIgr+ma4mkFlXKx9LLawE=', 0),
(16228622, 'JOEL ALEJANDRO', 'FUENTES LÓPEZ', 'jfuentes@ubiobio.cl', 'fp6yPyZSs/Sq3Rl3Kanz0bX5TF0=', 1),
(16251825, 'SERGIO ROCA MUNOZ', 'SERGIO ROCA MUNOZ', 'sroca@ubiobio.cl', 'FMh+6+KGvsdEtaJ9y9zjnNnMpZs=', 0),
(16931250, 'DANIEL EDUARDO', 'ESPINOZA NÚÑEZ', 'deespino@egresados.ubiobio.cl', '83bS+Xjle2i7tRZG76V7wDKkjR4=', 0),
(17060646, 'DIEGO FELIPE', 'SEPÚLVEDA BRIONES', 'diego.felipe.sepulveda.briones@gmail.com', 'FA3LhLo1v3qAjpyfzWSlL4hklqE=', 0),
(17935210, 'CLAUDIO', 'TORRES FONSECA', 'torresfonseca.cl@gmail.com', 'hUrrvAmq320HpToANExFmqNarVo=', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
 ADD PRIMARY KEY (`asig_codigo`), ADD KEY `m_idMalla` (`m_id`,`ta_id`), ADD KEY `ta_id` (`ta_id`);

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
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
