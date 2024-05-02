-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-04-2024 a las 01:34:47
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `adaptaciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos`
--

CREATE TABLE `contenidos` (
  `idContenido` int(11) NOT NULL,
  `grado` varchar(45) DEFAULT NULL,
  `descripcion` varchar(110) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `tokenizacion` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tokenizacion`)),
  `idUsuario` varchar(45) NOT NULL,
  `Usuario_Id` int(11) NOT NULL,
  `Usuario_Contenidos_idContenido1` int(11) NOT NULL,
  `operacion` varchar(45) DEFAULT NULL,
  `Contenidoscol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `contenidos`
--

INSERT INTO `contenidos` (`idContenido`, `grado`, `descripcion`, `titulo`, `tokenizacion`, `idUsuario`, `Usuario_Id`, `Usuario_Contenidos_idContenido1`, `operacion`, `Contenidoscol`) VALUES
(1, '1', 'Simón tenía 12 lápices de colores. Compró 6 más. ¿Cuántos tiene en total? \r\n', 'Simon', NULL, '1', 1, 1, 'Suma', ''),
(2, '1', 'Carlos y santiago coleccionaron 101 figuritas. Les regalaron 70 más. ¿Cuántas tienen en total?\r\n \r\n', 'Ejemplo', NULL, '1', 1, 1, 'Suma', ''),
(3, '1', 'Ayer Ana infló 14 globos. Hoy infló 9 más. ¿Cuántos infló en total?\r\n \r\n', 'Ejemplo', NULL, '1', 1, 1, 'Suma', ''),
(5, '1', 'Belén compró 4 manzanas y tambien 5 bananas. ¿Cuántas frutas compró en total?\r\n', '', NULL, '1', 1, 1, 'Suma', '1'),
(6, '1', 'Joaquín tenía 3 alfajores. Se comió 1. ¿Cuántos le quedan?\r\n', '', NULL, '1', 1, 1, 'Resta', '1'),
(7, '1', 'Ramón tenía 9 pelotas. Se le pincharon 2. ¿Cuántas le quedan?\r\n', '', NULL, '1', 1, 1, 'Resta', '1'),
(8, '1', ' Sofía tenía 29 peluches. Perdió 1. ¿Cuántos le quedan?\r\n', '', NULL, '1', 1, 1, 'Resta', '1'),
(9, '1', 'Emilia tenía 200 marcadores. Regaló 15. ¿Cuántos le quedan?\r\n', '', NULL, '1', 1, 1, 'Resta', '1'),
(10, '1', 'Un auto tiene 4 ruedas. ¿Cuántas ruedas tienen 3 autos?\r\n', '', NULL, '1', 1, 1, 'multiplicacion', '1'),
(11, '1', 'Cada alumno tiene 5 cuadernos. ¿Cuántos cuadernos tienen 20 alumnos?\r\n', '', NULL, '1', 1, 1, 'multiplicacion', '1'),
(12, '1', 'Pablo vende 300 caramelos por día. ¿Cuántos caramelos vende en 7 días?\r\n', '', NULL, '1', 1, 1, 'multiplicacion', '1'),
(13, '1', 'Un micro tiene 44 asientos. ¿Cuántos asientos tienen 6 micros?\r\n', '', NULL, '1', 1, 1, 'multiplicacion', '1'),
(14, '1', 'Tengo 25 camisas. Quiero repartirlas en 5 cajones. ¿Cuántas camisas pondré en cada cajón? \r\n', '', NULL, '1', 1, 1, 'division', '1'),
(15, '1', 'Juana tiene 70 fotos. Quiere repartirlas en 7 álbumes. ¿Cuántas fotos pondrá en cada álbum?\r\n', '', NULL, '1', 1, 1, 'division', '1'),
(16, '1', 'Facundo cocinó 24 empanadas. Quiere repartirlas en 3 tuppers. ¿Cuántas empanadas pondrá en cada tupper?\r\n', '', NULL, '1', 1, 1, 'division', '1'),
(18, '1', 'Isabella tiene 81 flores. Quiere plantarlas en 9 macetas. ¿Cuántas flores plantará en cada maceta?\r\n', '', NULL, '1', 1, 1, 'division', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  ADD PRIMARY KEY (`idContenido`,`Usuario_Id`,`Usuario_Contenidos_idContenido1`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  MODIFY `idContenido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
