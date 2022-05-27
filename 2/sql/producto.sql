-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-05-2022 a las 05:57:55
-- Versión del servidor: 8.0.26-0ubuntu0.20.04.2
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `producto`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE PROCEDURE `sp_create_product` (IN `pname` VARCHAR(256), IN `pprecio` DECIMAL(10,2), IN `pexistencia` INTEGER)  BEGIN
   INSERT INTO productos (`nombre`,precio,existencia) VALUES (pname,pprecio,pexistencia);
END$$

CREATE PROCEDURE `sp_delete_product` (IN `pid` INTEGER)  BEGIN
   DELETE FROM productos WHERE id = pid;
END$$

CREATE PROCEDURE `sp_search_product` ()  BEGIN
   SELECT id,nombre,precio,existencia FROM productos;
END$$

CREATE PROCEDURE `sp_search_product_single` (IN `pid` INTEGER)  BEGIN
   SELECT id,nombre,precio,existencia FROM productos WHERE id=pid;
END$$

CREATE PROCEDURE `sp_update_product` (IN `pid` INTEGER, IN `pname` VARCHAR(256), IN `pprecio` DECIMAL(10,2), IN `pexistencia` INTEGER)  BEGIN
    UPDATE productos SET `nombre`=pname,precio=pprecio,existencia=pexistencia WHERE id = pid;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int UNSIGNED NOT NULL,
  `nombre` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `existencia` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `existencia`) VALUES
(13, 'D', '1.00', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
