-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 07-02-2022 a las 09:23:01
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alumno`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnoo`
--

CREATE TABLE `alumnoo` (
  `id` int(100) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_bin NOT NULL,
  `apellidos` varchar(200) COLLATE utf8_bin NOT NULL,
  `matricula` int(100) NOT NULL,
  `carrera` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `alumnoo`
--

INSERT INTO `alumnoo` (`id`, `nombre`, `apellidos`, `matricula`, `carrera`) VALUES
(1, 'Karla', 'Cruz Velazquez', 123, 'Ing. Industrial'),
(2, 'Ingrid', 'Lopez Torres', 456, 'Ing. Quimica'),
(3, 'Eduardo', 'Gonzalez chavez', 789, 'Ing. Electronica'),
(4, 'Rodolfo', 'Martinez Velazquez', 101, 'Contabilida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(100) NOT NULL,
  `materia` varchar(200) COLLATE utf8_bin NOT NULL,
  `promedio` int(11) NOT NULL,
  `semestre` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `materia`, `promedio`, `semestre`) VALUES
(1, 'Ecuaciones', 9, 2),
(2, 'matematicas', 8, 4),
(3, 'ingles', 10, 7),
(4, 'italiano', 7, 8);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnoo`
--
ALTER TABLE `alumnoo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
