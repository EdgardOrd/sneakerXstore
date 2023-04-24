-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-04-2023 a las 19:51:27
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
-- Base de datos: `store`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sneakers`
--

CREATE TABLE `sneakers` (
  `id` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `marca` varchar(70) NOT NULL,
  `precio` float DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sneakers`
--

INSERT INTO `sneakers` (`id`, `nombre`, `marca`, `precio`, `imagen`) VALUES
(1, 'Adidas Yeezy Zebra', '', 299, './upload/product1.png'),
(2, 'Jordan 1 Retro Low OG', '', 399, './upload/product2.png'),
(3, 'Adidas Forum', '', 299, './upload/product3.png'),
(4, 'Nike Air Force 1 Black', '', 99, './upload/product4.png'),
(5, 'Adidas Yeezy 700 Static', '', 120, './upload/product5.png'),
(6, 'Nike Dunk Low Panda', '', 150, './upload/product6.png'),
(7, 'Adidas Yeezy 700 v3', '', 399, './upload/product7.png'),
(8, 'Air Jordan 4 Sail', '', 399, './upload/product8.png'),
(9, 'Air Jordan 1 Off White', '', 499, './upload/product9.png'),
(10, 'Adidas Ozelia', '', 120, './upload/product10.png'),
(11, 'Nike Blazer Mid \'77', '', 85, './upload/product11.png'),
(12, 'Adidas Foam Runner', '', 220, './upload/product12.png'),
(13, 'Pumas Wild Rider', '', 100, './upload/product13.png'),
(14, 'NB 550 White Green', '', 99, './upload/product14.png'),
(15, 'Vans Old Skool', '', 80, './upload/product15.png'),
(16, 'Kappa Atlanta 2', '', 150, './upload/product16.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `sneaker_id` int(11) NOT NULL,
  `talla_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`id`, `sneaker_id`, `talla_id`, `cantidad`) VALUES
(2, 12, 1, 10),
(3, 3, 1, 10),
(4, 10, 1, 10),
(5, 5, 2, 10),
(6, 7, 3, 10),
(7, 1, 4, 10),
(8, 4, 7, 10),
(9, 11, 7, 10),
(10, 6, 7, 10),
(11, 13, 4, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallas`
--

CREATE TABLE `tallas` (
  `id` int(11) NOT NULL,
  `talla` decimal(3,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tallas`
--

INSERT INTO `tallas` (`id`, `talla`) VALUES
(1, 9.0),
(2, 9.5),
(3, 10.0),
(4, 10.5),
(5, 11.0),
(6, 11.5),
(7, 12.0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `sneakers`
--
ALTER TABLE `sneakers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sneaker_id` (`sneaker_id`,`talla_id`),
  ADD KEY `talla_id` (`talla_id`);

--
-- Indices de la tabla `tallas`
--
ALTER TABLE `tallas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `talla` (`talla`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `sneakers`
--
ALTER TABLE `sneakers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tallas`
--
ALTER TABLE `tallas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`sneaker_id`) REFERENCES `sneakers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`talla_id`) REFERENCES `tallas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
