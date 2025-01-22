-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-01-2025 a las 01:24:52
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `studio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `especialidad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `nombre`, `especialidad`) VALUES
(1, 'Greisy', 'Ginecobstetra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `empleado_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `motivo` varchar(255) DEFAULT NULL,
  `estado` enum('por confirmar','confirmada','pospuesta') DEFAULT 'por confirmar'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `empleado_id`, `admin_id`, `fecha`, `motivo`, `estado`) VALUES
(7, 14, 1, '2025-02-05 09:00:00', 'Examen', 'pospuesta'),
(16, 8, 1, '2025-02-06 09:00:00', 'Consulta', 'por confirmar'),
(18, 5, 1, '2025-01-30 09:00:00', 'asdsad', 'por confirmar'),
(19, 15, 1, '2025-01-30 15:00:00', 'Revision', 'por confirmar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `apellido` varchar(200) DEFAULT NULL,
  `dni` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `detalles` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `apellido`, `dni`, `password`, `detalles`) VALUES
(1, 'admin', 'raat', '18970657', '$2y$10$QdK22wsKyGWBWCRJISnTW.F5G81EcMUUD/tsXJK3Q3i.oigFAZTmm', NULL),
(5, 'Jose', 'Perez', '10601579', '$2y$10$uexWFTSjfPSrjfyrRxgIsONrVtaDsofK/WnhXDqyQ13hIEoqSACPm', NULL),
(7, 'Michael', 'Graves', '24870932', '$2y$10$8GerEZIB/c0GcEKLBOuT1e3jNOBowOteNi38ETxr7iyD4MbhNcbyG', NULL),
(8, 'Ruben', 'Hernandez', '31578721', '$2y$10$nM/MCRVGjNM6UCMTtb2MuuEINMwQT0isWyUndgX7rIr4Gdw6xehzi', NULL),
(14, 'Alejandro', 'Nieves', '27814560', '$2y$10$5cHkXZ1HN7sCdM.3o/wGTuDnd.4MzSJ1mbEOC3QmFJqYBl1E4W3tu', NULL),
(15, 'Ruben', 'Hernandez', '30608765', '$2y$10$N8wfLosMTF8Wr1dLqcC/teODajhxmyW7/1n/u8BeHal84Q2xvf4lm', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historiales`
--

CREATE TABLE `historiales` (
  `id` int(11) NOT NULL,
  `empleado_id` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historiales`
--

INSERT INTO `historiales` (`id`, `empleado_id`, `fecha`, `descripcion`) VALUES
(1, 14, '2024-12-27 04:00:00', 'El empleado Alejandro Nieves, asistiÃ³ a la consulta para realizar un chequeo mensual como lo indica el reglamento de la empresa'),
(2, 8, '2025-01-11 05:18:15', 'work'),
(3, 8, '2025-01-11 05:08:12', 'Probando'),
(4, 5, '2024-12-27 14:38:00', 'No se cayo de la grua'),
(5, 5, '2025-01-08 13:54:00', 'El paciente, ha presentado una mejorÃ­a notoria desde la vez pasada'),
(6, 7, '2025-01-12 11:58:00', 'Diagnostico de prueba numero 2'),
(7, 8, '2025-01-12 14:51:00', 'El paciente no asistio a la consulta'),
(8, 15, '2025-01-14 15:53:00', 'Funciona'),
(9, 14, '2025-01-21 08:20:00', 'probando123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_citas`
--

CREATE TABLE `historial_citas` (
  `id` int(11) NOT NULL,
  `empleado_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `motivo` text,
  `estado` enum('confirmada','pospuesta','por confirmar') NOT NULL,
  `realizada` tinyint(1) DEFAULT '0',
  `modificada` tinyint(1) NOT NULL DEFAULT '0',
  `observacion` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historial_citas`
--

INSERT INTO `historial_citas` (`id`, `empleado_id`, `admin_id`, `fecha`, `motivo`, `estado`, `realizada`, `modificada`, `observacion`) VALUES
(1, 7, 1, '2025-02-01 00:00:00', 'prueba', 'confirmada', 1, 1, NULL),
(2, 5, 1, '2025-01-02 15:00:00', 'no se', '', 1, 1, NULL),
(3, 14, 1, '2025-01-01 09:00:00', 'porfavor', '', 0, 1, NULL),
(4, 7, 1, '2025-01-03 15:00:00', 'ayno', 'por confirmar', 0, 1, NULL),
(5, 14, 1, '2025-01-08 15:00:00', 'Prueba 2', 'por confirmar', 0, 1, NULL),
(6, 8, 1, '2025-01-11 09:00:00', 'Consulta', 'confirmada', 0, 1, NULL),
(8, 7, 1, '2025-01-10 15:00:00', 'Primera consulta', 'por confirmar', 0, 1, 'La consulta nunca se confirmo'),
(10, 5, 1, '2025-01-05 15:00:00', 'sin motivo', 'por confirmar', 0, 1, 'El paciente nunca concretÃ³ la fecha apropiadamente'),
(11, 15, 1, '2025-01-02 09:00:00', 'Revision mensual', 'confirmada', 1, 1, NULL),
(12, 8, 1, '2025-01-17 09:00:00', 'Consulta Mensual', 'confirmada', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `mensajitos` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `leido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `mensajitos`, `fecha`, `leido`) VALUES
(11, 1, 8, 's', '2024-12-30 17:49:17', 1),
(12, 1, 8, 'Hola\n', '2024-12-30 17:49:40', 1),
(13, 1, 8, 'QuÃ© tal?', '2024-12-30 17:51:18', 1),
(14, 1, 14, 'Hola Alejandro', '2024-12-30 17:53:55', 0),
(15, 14, 1, 'Hola Doc\n', '2024-12-30 21:09:16', 1),
(17, 1, 14, 'Â¿QuÃ© tal te has sentido?', '2024-12-30 21:17:44', 0),
(18, 14, 1, 'Me duele el guevo', '2024-12-30 21:19:01', 1),
(19, 8, 1, 'Todo bien doctora', '2024-12-31 03:51:35', 1),
(20, 8, 1, 'Por favor, confirme la siguiente cita.', '2025-01-08 01:41:07', 1),
(21, 7, 1, 'Hola doctora', '2025-01-15 15:43:38', 1),
(22, 7, 1, 'Necesito que me responda rapido, porfavor', '2025-01-15 15:43:53', 1),
(23, 1, 7, 'Hola Michael', '2025-01-15 15:44:24', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empleado_id` (`empleado_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historiales`
--
ALTER TABLE `historiales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empleado_id` (`empleado_id`);

--
-- Indices de la tabla `historial_citas`
--
ALTER TABLE `historial_citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empleado_id` (`empleado_id`),
  ADD KEY `doctor_id` (`admin_id`);

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `historiales`
--
ALTER TABLE `historiales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `historial_citas`
--
ALTER TABLE `historial_citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Filtros para la tabla `historiales`
--
ALTER TABLE `historiales`
  ADD CONSTRAINT `historiales_ibfk_1` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`);

--
-- Filtros para la tabla `historial_citas`
--
ALTER TABLE `historial_citas`
  ADD CONSTRAINT `historial_citas_ibfk_1` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`),
  ADD CONSTRAINT `historial_citas_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Filtros para la tabla `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `empleados` (`id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `empleados` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
