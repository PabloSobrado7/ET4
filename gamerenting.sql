-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-01-2019 a las 21:38:37
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
-- Base de datos: `gamerenting`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `login_admin` varchar(15) NOT NULL,
  `pass_admin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`login_admin`, `pass_admin`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquila`
--

CREATE TABLE `alquila` (
  `login_socio` varchar(15) NOT NULL,
  `id_tarifa` varchar(15) NOT NULL,
  `fecha_alquiler` datetime NOT NULL,
  `id_juego` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alquila`
--

INSERT INTO `alquila` (`login_socio`, `id_tarifa`, `fecha_alquiler`, `id_juego`) VALUES
('admin', '3', '2019-01-12 20:20:00', '8'),
('juan', '2', '2019-01-11 19:02:00', '6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asociado`
--

CREATE TABLE `asociado` (
  `id_tarifa` varchar(15) NOT NULL,
  `id_juego` varchar(15) NOT NULL,
  `fecha_tarifa` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `login_socio` varchar(15) NOT NULL,
  `id_juego` varchar(15) NOT NULL,
  `fecha_compra` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`login_socio`, `id_juego`, `fecha_compra`) VALUES
('admin', '2', '2019-01-23 06:00:00'),
('david', '10', '2019-01-11 18:56:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juego`
--

CREATE TABLE `juego` (
  `id_juego` varchar(15) NOT NULL,
  `nombre_juego` varchar(20) NOT NULL,
  `plataforma` varchar(20) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `precio_compra` decimal(5,0) NOT NULL,
  `categoria` varchar(10) NOT NULL,
  `novedad` tinyint(1) NOT NULL,
  `compra` tinyint(1) NOT NULL,
  `venta` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `juego`
--

INSERT INTO `juego` (`id_juego`, `nombre_juego`, `plataforma`, `genero`, `precio_compra`, `categoria`, `novedad`, `compra`, `venta`) VALUES
('1', 'Crash Bandicoot NST', 'PS4', 'Plataformas', '30', '1', 0, 1, 0),
('10', 'Super Smash Bros', 'Nintendo Switch', 'Plataformas', '49', '1', 1, 1, 0),
('2', 'GTA V', 'PS4', 'Accion', '60', '1', 0, 0, 1),
('3', 'GTA V', 'Xbox 360', 'Accion', '60', '1', 0, 1, 1),
('4', 'FIFA 19', 'PS4', 'Deportes', '60', '1', 0, 1, 1),
('5', 'FIFA 19', 'Xbox 360', 'Deportes', '60', '1', 0, 0, 1),
('6', 'FIFA 19', 'PC', 'Deportes', '60', '1', 0, 1, 0),
('7', 'Super Mario Odyssey', 'Nintendo Switch', 'Plataformas', '49', '1', 0, 1, 1),
('8', 'Pokemon Let\'s Go!', 'Nintendo Switch', 'Plataformas', '49', '1', 0, 1, 0),
('9', 'Mario Kart 8 Deluxe', 'Nintendo Switch', 'Plataformas', '49', '1', 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio`
--

CREATE TABLE `socio` (
  `login_socio` varchar(15) NOT NULL,
  `pass_socio` varchar(20) NOT NULL,
  `dni_socio` varchar(9) NOT NULL,
  `nombre_socio` varchar(25) NOT NULL,
  `apellidos_socio` varchar(50) NOT NULL,
  `email_socio` varchar(60) NOT NULL,
  `telefono_socio` varchar(12) NOT NULL,
  `socio_bloqueado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `socio`
--

INSERT INTO `socio` (`login_socio`, `pass_socio`, `dni_socio`, `nombre_socio`, `apellidos_socio`, `email_socio`, `telefono_socio`, `socio_bloqueado`) VALUES
('david', 'david', '44498928T', 'David', 'Perez', 'davidperez@gmail.com', '665989322', 0),
('juan', 'juan', '44498928T', 'Juan', 'Rodriguez', 'juanrodriguez@gmail.com', '665989324', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifa`
--

CREATE TABLE `tarifa` (
  `id_tarifa` varchar(15) NOT NULL,
  `precio_tarifa` double NOT NULL,
  `categoria_tarifa` varchar(10) NOT NULL,
  `tiempo_tarifa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarifa`
--

INSERT INTO `tarifa` (`id_tarifa`, `precio_tarifa`, `categoria_tarifa`, `tiempo_tarifa`) VALUES
('1', 4, '1', 2),
('2', 9, '1', 7),
('3', 12, '1', 15),
('4', 17, '1', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

CREATE TABLE `vendedor` (
  `login_vendedor` varchar(15) NOT NULL,
  `pass_vendedor` varchar(20) NOT NULL,
  `dni_vendedor` varchar(9) NOT NULL,
  `nombre_vendedor` varchar(25) NOT NULL,
  `apellidos_vendedor` varchar(50) NOT NULL,
  `email_vendedor` varchar(60) NOT NULL,
  `telefono_vendedor` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vendedor`
--

INSERT INTO `vendedor` (`login_vendedor`, `pass_vendedor`, `dni_vendedor`, `nombre_vendedor`, `apellidos_vendedor`, `email_vendedor`, `telefono_vendedor`) VALUES
('manuel', 'manuel', '34927848W', 'Manuel', 'Boo Martinez', 'manuelboo@gmail.com', '555443322'),
('mario', 'mario', '55533299E', 'Mario', 'Gayoso Perez', 'mariogayoso@gmail.com', '666776655'),
('pablo', 'pablo', '44498928T', 'Pablo', 'Sobrado Pinto', 'pablosobrado.realmadrid@gmail.com', '663588615');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`login_admin`);

--
-- Indices de la tabla `alquila`
--
ALTER TABLE `alquila`
  ADD PRIMARY KEY (`login_socio`,`id_tarifa`,`fecha_alquiler`);

--
-- Indices de la tabla `asociado`
--
ALTER TABLE `asociado`
  ADD PRIMARY KEY (`id_tarifa`,`id_juego`,`fecha_tarifa`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`login_socio`,`id_juego`,`fecha_compra`);

--
-- Indices de la tabla `juego`
--
ALTER TABLE `juego`
  ADD PRIMARY KEY (`id_juego`);

--
-- Indices de la tabla `socio`
--
ALTER TABLE `socio`
  ADD PRIMARY KEY (`login_socio`);

--
-- Indices de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  ADD PRIMARY KEY (`id_tarifa`);

--
-- Indices de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`login_vendedor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
