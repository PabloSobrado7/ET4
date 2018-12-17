-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2018 a las 19:29:52
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `iu2018`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `loteriaiu`
--

CREATE TABLE `loteriaiu` (
  `lot.email` varchar(60) COLLATE latin1_spanish_ci NOT NULL COMMENT 'email del que participa en la loteria',
  `lot.nombre` varchar(30) COLLATE latin1_spanish_ci NOT NULL COMMENT 'nombre del que participa en la loteria',
  `lot.apellidos` varchar(40) COLLATE latin1_spanish_ci NOT NULL COMMENT 'apellidos del que participa en la loteria',
  `lot.participacion` int(3) NOT NULL COMMENT 'importe con el que participa en la loteria',
  `lot.resguardo` varchar(50) COLLATE latin1_spanish_ci NOT NULL COMMENT 'resguardo de la participación en la loteria',
  `lot.ingresado` enum('SI','NO') COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'ha ingresado la participación',
  `lot.premiopersonal` int(6) DEFAULT NULL COMMENT 'premio que le corresponde por la participacion jugada',
  `lot.pagado` enum('SI','NO') COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'se le ha pagado el premio que el corresponde'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='Tabla de participaciones en la loteria de la gente de IU';

--
-- Volcado de datos para la tabla `loteriaiu`
--

INSERT INTO `loteriaiu` (`lot.email`, `lot.nombre`, `lot.apellidos`, `lot.participacion`, `lot.resguardo`, `lot.ingresado`, `lot.premiopersonal`, `lot.pagado`) VALUES
('emiliosobrado@gmail.com', 'Emilio', 'Sobrado Pinto', 10, 'http://www.imagen.com.mx/assets/img/IMAGEN_Tv.jpg', 'SI', 40, 'SI'),
('juanmart@gmail.com', 'Juan', 'Martinez', 40, 'http://www.imagen.com.mx/assets/img/IMAGEN_Tv.jpg', 'SI', 20, 'NO'),
('pedro@gmail.com', 'Pedro ', 'Jimenez', 5, 'http://www.imagen.com.mx/assets/img/IMAGEN_Tv.jpg', 'SI', 5, 'SI'),
('samuel@gmail.com', 'Samuel', 'Sanchez Dominguez', 50, 'http://www.imagen.com.mx/assets/img/IMAGEN_Tv.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `login` varchar(15) NOT NULL,
  `password` varchar(128) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `fotopersonal` varchar(50) NOT NULL,
  `sexo` enum('hombre','mujer') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`login`, `password`, `DNI`, `nombre`, `apellidos`, `telefono`, `email`, `FechaNacimiento`, `fotopersonal`, `sexo`) VALUES
('pablo', 'pablo', '44498928T', 'pablo', 'sobrado', '663588615', 'pablosobrado.realmadrid@gmail.com', '2018-11-21', '', 'hombre');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `loteriaiu`
--
ALTER TABLE `loteriaiu`
  ADD PRIMARY KEY (`lot.email`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`login`),
  ADD UNIQUE KEY `DNI` (`DNI`),
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
