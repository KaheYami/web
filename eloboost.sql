-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2024 a las 19:21:15
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `eloboost`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `ID_administrador` int(11) NOT NULL,
  `Nombre_administrador` varchar(255) NOT NULL,
  `Contraseña` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`ID_administrador`, `Nombre_administrador`, `Contraseña`) VALUES
(1, 'Edgar', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE `asignacion` (
  `ID_pedido` int(11) DEFAULT NULL,
  `ID_booster` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `booster`
--

CREATE TABLE `booster` (
  `ID_booster` int(11) NOT NULL,
  `Nombre_booster` varchar(255) NOT NULL,
  `Apellido_booster` varchar(255) NOT NULL,
  `LV_skill` int(11) NOT NULL,
  `Disponibilidad` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `booster`
--

INSERT INTO `booster` (`ID_booster`, `Nombre_booster`, `Apellido_booster`, `LV_skill`, `Disponibilidad`) VALUES
(1, 'Juan', 'Perez', 7, 0),
(2, 'Maria', 'Gomez', 12, 0),
(3, 'Carlos', 'Rodriguez', 8, 0),
(4, 'Ana', 'Martinez', 9, 0),
(5, 'Pedro', 'Gonzalez', 8, 0),
(6, 'Carmen', 'Ramirez', 8, 0),
(7, 'Manuel', 'Lopez', 11, 0),
(8, 'Teresa', 'Sanchez', 12, 0),
(9, 'Jose', 'Torres', 10, 0),
(10, 'Isabel', 'Castro', 10, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dificultad_servicio`
--

CREATE TABLE `dificultad_servicio` (
  `Dificultad` varchar(50) NOT NULL,
  `Servicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dificultad_servicio`
--

INSERT INTO `dificultad_servicio` (`Dificultad`, `Servicio`) VALUES
('Dificil', 19),
('Dificil', 20),
('Dificil', 21),
('Dificil', 22),
('Dificil', 23),
('Dificil', 24),
('Dificil', 25),
('Dificil', 26),
('Dificil', 27),
('Dificil', 28),
('Facil', 1),
('Facil', 2),
('Facil', 3),
('Facil', 4),
('Facil', 5),
('Facil', 6),
('Facil', 7),
('Facil', 8),
('Facil', 9),
('Intermedio', 10),
('Intermedio', 11),
('Intermedio', 12),
('Intermedio', 13),
('Intermedio', 14),
('Intermedio', 15),
('Intermedio', 16),
('Intermedio', 17),
('Intermedio', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `ID_pedido` int(11) NOT NULL,
  `ID_usuario` int(11) NOT NULL,
  `Fecha_pedido` varchar(255) NOT NULL,
  `Nivel_inicial` int(11) NOT NULL,
  `Nivel_deseado` int(11) NOT NULL,
  `Estado_del_pedido` tinyint(1) NOT NULL,
  `Fecha_termino` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`ID_pedido`, `ID_usuario`, `Fecha_pedido`, `Nivel_inicial`, `Nivel_deseado`, `Estado_del_pedido`, `Fecha_termino`) VALUES
(1, 2, '2023-07-09', 11, 2, 1, '2023-12-06'),
(2, 27, '2023-01-31', 3, 3, 1, '2023-09-21'),
(3, 17, '2023-02-13', 2, 2, 0, NULL),
(4, 2, '2023-01-07', 1, 10, 1, '2023-04-29'),
(5, 1, '2023-05-05', 9, 6, 0, NULL),
(6, 7, '2023-01-29', 9, 1, 0, '2023-03-25'),
(7, 25, '2023-04-30', 1, 11, 0, '2023-07-12'),
(8, 3, '2023-10-05', 12, 4, 0, '2024-01-06'),
(9, 22, '2023-09-14', 9, 4, 0, '2023-10-28'),
(10, 15, '2023-01-11', 6, 12, 1, '2023-10-08'),
(11, 6, '2023-03-14', 2, 3, 0, '2023-03-20'),
(12, 13, '2023-02-03', 7, 8, 0, '2024-02-14'),
(13, 14, '2023-08-21', 5, 6, 1, '2024-02-05'),
(14, 11, '2023-11-29', 3, 3, 1, '2024-05-06'),
(15, 5, '2023-10-28', 4, 12, 0, '2023-11-29'),
(16, 29, '2023-11-04', 11, 7, 1, NULL),
(17, 5, '2023-02-20', 2, 2, 1, '2023-05-20'),
(18, 13, '2023-07-28', 8, 1, 0, '2024-03-06'),
(19, 4, '2023-05-23', 7, 6, 1, '2023-12-25'),
(20, 17, '2023-05-29', 5, 6, 0, '2023-06-25'),
(21, 26, '2023-03-17', 12, 4, 1, '2023-10-16'),
(22, 15, '2023-05-26', 7, 4, 0, '2023-08-15'),
(23, 1, '2023-10-18', 1, 5, 0, NULL),
(24, 18, '2023-03-27', 10, 3, 0, '2023-06-24'),
(25, 17, '2023-05-05', 3, 6, 0, '2024-03-25'),
(26, 18, '2023-10-16', 7, 11, 0, '2023-10-21'),
(27, 20, '2023-07-19', 9, 10, 1, '2023-10-31'),
(28, 20, '2023-10-10', 11, 5, 1, '2024-05-05'),
(29, 9, '2023-11-18', 4, 7, 0, '2024-05-05'),
(30, 27, '2023-11-15', 10, 5, 0, '2023-12-18'),
(31, 10, '2023-06-26', 8, 2, 1, '2023-10-06'),
(32, 18, '2023-04-21', 8, 6, 1, '2023-08-25'),
(33, 9, '2023-04-12', 3, 12, 0, '2024-01-03'),
(34, 8, '2023-11-11', 5, 1, 0, '2023-11-22'),
(35, 9, '2023-12-24', 3, 4, 1, '2023-12-29'),
(36, 22, '2023-04-17', 9, 7, 0, '2024-04-16'),
(37, 15, '2023-05-06', 10, 7, 1, '2023-10-26'),
(38, 6, '2023-01-25', 5, 5, 1, '2023-06-17'),
(39, 20, '2023-04-13', 2, 11, 0, '2023-12-17'),
(40, 25, '2023-04-22', 6, 1, 1, '2023-05-23'),
(41, 23, '2023-11-03', 7, 9, 1, '2024-02-01'),
(42, 29, '2023-08-04', 1, 7, 1, '2023-10-11'),
(43, 15, '2023-12-24', 10, 5, 0, '2024-04-01'),
(44, 23, '2023-02-12', 8, 8, 0, '2023-03-03'),
(45, 12, '2023-04-09', 1, 2, 0, '2024-01-21'),
(46, 16, '2023-10-22', 2, 2, 1, '2024-03-10'),
(47, 5, '2023-12-17', 5, 6, 1, '2024-03-31'),
(48, 11, '2023-12-28', 3, 2, 1, '2024-04-06'),
(49, 24, '2023-05-17', 8, 11, 1, '2023-12-09'),
(50, 14, '2023-04-07', 9, 1, 1, '2024-03-12'),
(51, 30, '2023-12-03', 12, 9, 0, '2023-12-08'),
(52, 24, '2023-11-14', 10, 6, 0, '2024-02-23'),
(53, 9, '2023-11-11', 12, 10, 1, '2023-12-01'),
(54, 10, '2023-06-05', 2, 8, 1, '2023-06-09'),
(55, 28, '2023-01-13', 8, 4, 0, '2023-06-06'),
(56, 14, '2023-11-20', 7, 6, 1, NULL),
(57, 21, '2023-07-21', 12, 8, 1, '2023-10-20'),
(58, 11, '2023-08-01', 10, 12, 1, NULL),
(59, 17, '2023-07-14', 10, 3, 0, '2024-04-04'),
(60, 26, '2023-03-02', 8, 6, 0, '2023-09-14'),
(61, 11, '2023-01-27', 6, 5, 0, '2024-04-28'),
(62, 8, '2023-07-01', 3, 3, 1, '2023-12-31'),
(63, 14, '2023-03-11', 8, 10, 0, '2023-08-29'),
(64, 5, '2023-10-30', 4, 1, 1, '2023-11-11'),
(65, 15, '2023-10-26', 2, 3, 1, '2023-12-17'),
(66, 19, '2023-05-18', 6, 8, 0, '2023-07-29'),
(67, 18, '2023-02-21', 2, 9, 0, NULL),
(68, 10, '2023-12-28', 5, 1, 1, '2024-02-23'),
(69, 30, '2023-04-10', 11, 3, 0, '2023-11-06'),
(70, 19, '2023-01-06', 6, 6, 0, '2023-05-28'),
(71, 30, '2023-06-04', 6, 6, 0, '2024-04-07'),
(72, 27, '2023-10-07', 12, 2, 0, '2024-04-21'),
(73, 26, '2023-11-07', 10, 7, 0, '2023-11-22'),
(74, 13, '2023-09-06', 4, 3, 0, '2023-10-25'),
(75, 4, '2023-10-19', 1, 12, 0, '2024-03-12'),
(76, 17, '2023-11-02', 12, 12, 0, '2023-12-29'),
(77, 4, '2023-06-18', 8, 12, 0, '2024-04-28'),
(78, 24, '2023-12-06', 1, 11, 1, '2024-02-28'),
(79, 8, '2023-11-06', 8, 3, 1, '2024-03-02'),
(80, 8, '2023-09-10', 8, 5, 1, '2024-04-14'),
(81, 28, '2023-05-10', 6, 8, 0, '2023-08-31'),
(82, 24, '2023-08-21', 12, 6, 0, '2024-04-28'),
(83, 19, '2023-10-08', 7, 10, 1, '2024-03-14'),
(84, 8, '2023-02-12', 12, 1, 0, '2023-04-21'),
(85, 15, '2023-06-04', 2, 4, 1, NULL),
(86, 3, '2023-03-09', 7, 7, 1, '2023-08-29'),
(87, 1, '2023-04-19', 7, 6, 0, '2023-09-26'),
(88, 23, '2023-10-03', 5, 8, 1, '2023-10-24'),
(89, 1, '2023-07-01', 3, 12, 0, '2024-02-16'),
(90, 10, '2023-04-17', 7, 12, 0, '2023-07-09'),
(91, 29, '2023-11-22', 12, 12, 1, '2024-02-24'),
(92, 26, '2023-08-08', 6, 9, 0, '2023-09-13'),
(93, 4, '2023-03-16', 6, 1, 1, '2023-10-02'),
(94, 28, '2023-12-30', 5, 3, 1, '2024-01-09'),
(95, 1, '2023-03-06', 4, 5, 1, '2023-09-30'),
(96, 7, '2023-05-19', 11, 8, 0, NULL),
(97, 18, '2023-12-15', 12, 2, 1, '2024-01-19'),
(98, 26, '2023-07-20', 11, 8, 0, '2023-10-12'),
(99, 21, '2023-01-11', 6, 4, 0, '2023-10-27'),
(100, 28, '2023-02-20', 11, 7, 1, NULL),
(101, 30, '2023-10-15', 4, 8, 1, '2023-12-13'),
(102, 10, '2023-11-25', 8, 3, 1, '2024-03-20'),
(103, 9, '2023-11-30', 9, 9, 0, '2024-03-13'),
(104, 14, '2023-05-26', 1, 12, 0, NULL),
(105, 23, '2023-02-26', 10, 8, 1, '2024-01-16'),
(106, 29, '2023-03-11', 10, 1, 1, NULL),
(107, 24, '2023-02-24', 12, 3, 1, '2024-02-06'),
(108, 9, '2023-02-02', 10, 12, 0, NULL),
(109, 17, '2023-04-09', 11, 10, 0, '2023-07-03'),
(110, 9, '2023-08-25', 12, 2, 1, '2023-10-19'),
(111, 23, '2023-01-30', 5, 6, 1, '2023-11-22'),
(112, 10, '2023-06-07', 2, 9, 0, '2024-02-08'),
(113, 1, '2023-12-31', 2, 6, 1, '2024-03-16'),
(114, 2, '2023-12-14', 10, 11, 1, '2024-03-23'),
(115, 4, '2023-01-06', 10, 5, 0, NULL),
(116, 23, '2023-02-23', 7, 6, 1, '2023-06-17'),
(117, 17, '2023-06-10', 6, 6, 0, '2024-02-25'),
(118, 4, '2023-06-17', 2, 6, 1, '2023-08-20'),
(119, 26, '2023-09-29', 10, 8, 0, '2024-02-16'),
(120, 30, '2023-12-11', 2, 9, 1, '2023-12-26'),
(121, 2, '2023-07-24', 2, 8, 0, '2023-10-19'),
(122, 21, '2023-04-03', 6, 5, 0, NULL),
(123, 9, '2023-03-24', 5, 2, 1, '2023-05-30'),
(124, 12, '2023-11-02', 8, 12, 1, '2024-03-23'),
(125, 29, '2023-11-13', 11, 8, 0, '2024-02-07'),
(126, 8, '2023-03-18', 7, 11, 1, '2024-04-28'),
(127, 28, '2023-10-27', 12, 10, 0, '2024-02-12'),
(128, 8, '2023-07-11', 11, 7, 1, '2023-09-11'),
(129, 6, '2023-05-19', 3, 7, 0, '2023-12-17'),
(130, 30, '2023-02-08', 5, 1, 1, '2023-11-15'),
(131, 4, '2023-12-24', 5, 9, 0, '2024-02-23'),
(132, 7, '2023-04-10', 1, 8, 0, '2023-09-25'),
(133, 2, '2023-03-26', 5, 7, 1, '2024-04-01'),
(134, 25, '2023-05-30', 5, 7, 0, '2023-05-30'),
(135, 20, '2023-10-29', 7, 11, 0, '2023-12-24'),
(136, 20, '2023-01-29', 7, 12, 1, '2024-03-02'),
(137, 30, '2023-06-20', 1, 6, 1, '2024-03-06'),
(138, 9, '2023-10-07', 5, 10, 0, '2024-03-03'),
(139, 3, '2023-02-03', 11, 4, 0, '2023-03-05'),
(140, 25, '2023-05-25', 2, 2, 1, '2023-09-26'),
(141, 13, '2023-07-21', 8, 11, 1, '2024-04-21'),
(142, 14, '2023-04-18', 8, 11, 1, '2024-02-10'),
(143, 16, '2023-11-03', 12, 2, 1, '2024-03-21'),
(144, 23, '2023-01-29', 6, 1, 0, '2023-10-04'),
(145, 23, '2023-11-05', 9, 4, 1, '2023-11-10'),
(146, 11, '2023-05-27', 11, 3, 1, '2023-09-25'),
(147, 18, '2023-06-20', 3, 4, 0, NULL),
(148, 26, '2023-05-12', 5, 4, 1, '2023-07-21'),
(149, 6, '2023-04-07', 3, 5, 1, '2023-07-01'),
(150, 6, '2023-06-04', 10, 8, 0, '2023-07-02'),
(151, 17, '2023-02-12', 12, 3, 0, '2023-11-03'),
(152, 2, '2023-12-23', 8, 1, 0, '2023-12-31'),
(153, 15, '2023-04-02', 2, 2, 0, '2024-02-18'),
(154, 11, '2023-03-13', 4, 5, 1, '2024-02-02'),
(155, 4, '2023-12-14', 5, 8, 0, '2024-03-04'),
(156, 30, '2023-08-17', 12, 11, 0, '2024-04-18'),
(157, 17, '2023-03-20', 1, 9, 0, '2023-10-19'),
(158, 14, '2023-11-28', 2, 2, 1, '2024-01-17'),
(159, 9, '2023-10-12', 12, 3, 1, '2024-02-05'),
(160, 30, '2023-04-20', 4, 5, 1, '2023-04-23'),
(161, 8, '2023-02-16', 12, 3, 1, '2023-07-26'),
(162, 4, '2023-11-21', 12, 7, 0, '2024-04-11'),
(163, 27, '2023-08-11', 9, 10, 1, '2024-02-25'),
(164, 26, '2023-01-15', 11, 11, 0, '2023-12-17'),
(165, 21, '2023-08-30', 10, 12, 0, NULL),
(166, 14, '2023-07-21', 5, 8, 1, '2023-11-05'),
(167, 26, '2023-10-26', 5, 5, 1, '2024-01-10'),
(168, 19, '2023-07-16', 1, 4, 1, '2023-11-14'),
(169, 12, '2023-01-21', 12, 11, 0, '2023-08-28'),
(170, 11, '2023-12-05', 2, 8, 0, '2024-03-18'),
(171, 6, '2023-11-25', 9, 11, 0, '2023-12-01'),
(172, 9, '2023-02-07', 11, 7, 0, '2023-07-07'),
(173, 2, '2023-07-10', 8, 12, 1, '2024-03-16'),
(174, 23, '2023-07-05', 2, 4, 0, '2024-05-02'),
(175, 3, '2023-05-19', 8, 10, 1, '2023-08-26'),
(176, 7, '2023-07-08', 8, 7, 1, '2024-01-17'),
(177, 26, '2023-08-25', 7, 5, 0, '2024-03-10'),
(178, 1, '2023-07-30', 1, 12, 1, '2024-04-14'),
(179, 30, '2023-03-13', 11, 5, 0, '2023-06-04'),
(180, 12, '2023-04-03', 10, 10, 1, '2023-04-08'),
(181, 14, '2023-03-30', 12, 6, 0, '2023-07-20'),
(182, 10, '2023-11-24', 4, 5, 1, '2023-12-02'),
(183, 2, '2023-06-09', 1, 4, 0, '2023-06-23'),
(184, 6, '2023-09-27', 2, 11, 1, '2024-01-09'),
(185, 3, '2023-06-01', 11, 12, 1, '2024-03-28'),
(186, 8, '2023-11-01', 5, 12, 1, '2023-11-16'),
(187, 27, '2023-01-07', 6, 9, 1, '2023-05-04'),
(188, 29, '2023-09-29', 10, 3, 1, '2024-02-27'),
(189, 15, '2023-03-19', 9, 11, 0, '2023-07-20'),
(190, 17, '2023-01-24', 1, 8, 0, '2023-09-22'),
(191, 30, '2023-09-06', 12, 1, 1, '2024-03-24'),
(192, 5, '2023-03-28', 8, 11, 1, '2023-12-01'),
(193, 11, '2023-03-01', 2, 6, 1, '2023-05-04'),
(194, 28, '2023-06-28', 3, 6, 1, '2024-01-13'),
(195, 21, '2023-08-03', 12, 10, 0, '2023-08-07'),
(196, 3, '2023-10-21', 1, 11, 1, '2024-01-12'),
(197, 7, '2023-09-05', 6, 9, 0, '2024-03-14'),
(198, 4, '2023-12-20', 7, 5, 1, '2024-04-16'),
(199, 2, '2023-02-27', 3, 12, 0, '2023-11-27'),
(200, 4, '2023-06-19', 9, 1, 0, '2024-04-08'),
(201, 7, '2023-12-22', 12, 1, 0, '2024-04-20'),
(202, 15, '2023-09-23', 4, 10, 0, NULL),
(203, 11, '2023-01-05', 3, 1, 1, '2023-05-06'),
(204, 21, '2023-09-29', 3, 11, 1, '2023-10-26'),
(205, 25, '2023-10-23', 5, 8, 1, '2024-02-16'),
(206, 3, '2023-03-07', 5, 8, 0, '2023-08-13'),
(207, 27, '2023-05-20', 9, 9, 1, '2024-03-09'),
(208, 21, '2023-08-13', 2, 8, 1, NULL),
(209, 21, '2023-07-21', 8, 2, 1, '2024-01-30'),
(210, 16, '2023-06-10', 5, 3, 0, '2023-10-16'),
(211, 24, '2023-06-25', 6, 2, 0, '2023-09-23'),
(212, 29, '2023-12-29', 2, 9, 0, '2024-03-27'),
(213, 3, '2023-07-27', 6, 1, 1, '2023-10-11'),
(214, 26, '2023-04-28', 3, 4, 1, NULL),
(215, 28, '2023-12-10', 10, 1, 0, '2024-02-28'),
(216, 3, '2023-11-21', 3, 8, 1, '2023-11-29'),
(217, 23, '2023-09-14', 11, 3, 0, '2024-03-09'),
(218, 11, '2023-05-26', 3, 11, 1, '2024-01-24'),
(219, 12, '2023-09-13', 1, 1, 0, '2024-01-22'),
(220, 30, '2023-11-19', 12, 8, 1, '2024-02-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rangos`
--

CREATE TABLE `rangos` (
  `ID` int(11) NOT NULL,
  `rango` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rangos`
--

INSERT INTO `rangos` (`ID`, `rango`) VALUES
(1, 'Hierro IV'),
(2, 'Hierro III'),
(3, 'Hierro II'),
(4, 'Hierro I'),
(5, 'Bronce IV'),
(6, 'Bronce III'),
(7, 'Bronce II'),
(8, 'Bronce I'),
(9, 'Plata IV'),
(10, 'Plata III'),
(11, 'Plata II'),
(12, 'Plata I'),
(13, 'Oro IV'),
(14, 'Oro III'),
(15, 'Oro II'),
(16, 'Oro I'),
(17, 'Platino IV'),
(18, 'Platino III'),
(19, 'Platino II'),
(20, 'Platino I'),
(21, 'Diamante IV'),
(22, 'Diamante III'),
(23, 'Diamante II'),
(24, 'Diamante I'),
(25, 'Maestro'),
(26, 'Gran Maestro'),
(27, 'Challenger');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `ID` int(11) NOT NULL,
  `rango_inicial` int(11) NOT NULL,
  `rango_final` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`ID`, `rango_inicial`, `rango_final`, `precio`) VALUES
(1, 1, 2, 2500),
(2, 2, 3, 3000),
(3, 3, 4, 3500),
(4, 4, 5, 4000),
(5, 5, 6, 3300),
(6, 6, 7, 3900),
(7, 7, 8, 4200),
(8, 8, 9, 4500),
(9, 9, 10, 3800),
(10, 10, 11, 4000),
(11, 11, 12, 4800),
(12, 12, 13, 5100),
(13, 13, 14, 3400),
(14, 14, 15, 3800),
(15, 15, 16, 4200),
(16, 16, 17, 6000),
(17, 17, 18, 6300),
(18, 18, 19, 6700),
(19, 19, 20, 7500),
(20, 20, 21, 10000),
(21, 21, 22, 11500),
(22, 22, 23, 13000),
(23, 23, 24, 15000),
(24, 24, 25, 40000),
(25, 25, 26, 40000),
(26, 26, 27, 60000),
(27, 27, 28, 80000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_usuario` int(11) NOT NULL,
  `Nombre_usuario` varchar(255) NOT NULL,
  `Contraseña` varchar(255) NOT NULL,
  `Correo_electronico` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_usuario`, `Nombre_usuario`, `Contraseña`, `Correo_electronico`) VALUES
(0, 'wensen', '$2y$10$tVIrX74vGjhP.uMZ.2M36uJycjHwAn8VugUAC9/mwlnFB02TkUPbO', 'edgar.santana@alumnos.uaysen.cl'),
(1, 'Usuario1', 'Contraseña1', 'usuario1@ejemplo.com'),
(2, 'Usuario2', 'Contraseña2', 'usuario2@ejemplo.com'),
(3, 'Usuario3', 'Contraseña3', 'usuario3@ejemplo.com'),
(4, 'Usuario4', 'Contraseña4', 'usuario4@ejemplo.com'),
(5, 'Usuario5', 'Contraseña5', 'usuario5@ejemplo.com'),
(6, 'Usuario6', 'Contraseña6', 'usuario6@ejemplo.com'),
(7, 'Usuario7', 'Contraseña7', 'usuario7@ejemplo.com'),
(8, 'Usuario8', 'Contraseña8', 'usuario8@ejemplo.com'),
(9, 'Usuario9', 'Contraseña9', 'usuario9@ejemplo.com'),
(10, 'Usuario10', 'Contraseña10', 'usuario10@ejemplo.com'),
(11, 'Usuario11', 'Contraseña11', 'usuario11@ejemplo.com'),
(12, 'Usuario12', 'Contraseña12', 'usuario12@ejemplo.com'),
(13, 'Usuario13', 'Contraseña13', 'usuario13@ejemplo.com'),
(14, 'Usuario14', 'Contraseña14', 'usuario14@ejemplo.com'),
(15, 'Usuario15', 'Contraseña15', 'usuario15@ejemplo.com'),
(16, 'Usuario16', 'Contraseña16', 'usuario16@ejemplo.com'),
(17, 'Usuario17', 'Contraseña17', 'usuario17@ejemplo.com'),
(18, 'Usuario18', 'Contraseña18', 'usuario18@ejemplo.com'),
(19, 'Usuario19', 'Contraseña19', 'usuario19@ejemplo.com'),
(20, 'Usuario20', 'Contraseña20', 'usuario20@ejemplo.com'),
(21, 'Usuario21', 'Contraseña21', 'usuario21@ejemplo.com'),
(22, 'Usuario22', 'Contraseña22', 'usuario22@ejemplo.com'),
(23, 'Usuario23', 'Contraseña23', 'usuario23@ejemplo.com'),
(24, 'Usuario24', 'Contraseña24', 'usuario24@ejemplo.com'),
(25, 'Usuario25', 'Contraseña25', 'usuario25@ejemplo.com'),
(26, 'Usuario26', 'Contraseña26', 'usuario26@ejemplo.com'),
(27, 'Usuario27', 'Contraseña27', 'usuario27@ejemplo.com'),
(28, 'Usuario28', 'Contraseña28', 'usuario28@ejemplo.com'),
(29, 'Usuario29', 'Contraseña29', 'usuario29@ejemplo.com'),
(30, 'Usuario30', 'Contraseña30', 'usuario30@ejemplo.com'),
(66600, 'edgar', '$2y$10$iUlY1PsJWjir2weFVqKpfuOZwym7mhFv0PovDoab.SScPgy31JtQ.', 'edgarbkn321@gmail.com'),
(666065, 'beylian', '$2y$10$HkjFdkHhyJn9WJQlwHopsuy0kx/qRt.5jwvOWDQJc4KEVHPDbQJBS', 'victor.ovando@alumnos.uaysen.cl');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`ID_administrador`);

--
-- Indices de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD KEY `ID_pedido` (`ID_pedido`),
  ADD KEY `ID_booster` (`ID_booster`);

--
-- Indices de la tabla `booster`
--
ALTER TABLE `booster`
  ADD PRIMARY KEY (`ID_booster`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`ID_pedido`),
  ADD KEY `ID_usuario` (`ID_usuario`);

--
-- Indices de la tabla `rangos`
--
ALTER TABLE `rangos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_servicios_rangos_inicial` (`rango_inicial`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD CONSTRAINT `asignacion_ibfk_1` FOREIGN KEY (`ID_pedido`) REFERENCES `pedidos` (`ID_pedido`),
  ADD CONSTRAINT `asignacion_ibfk_2` FOREIGN KEY (`ID_booster`) REFERENCES `booster` (`ID_booster`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuarios` (`ID_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
