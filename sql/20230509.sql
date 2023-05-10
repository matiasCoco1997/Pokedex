-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-05-2023 a las 04:06:04
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pokedex_grupo3`
--
CREATE DATABASE IF NOT EXISTS `pokedex_grupo3` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `pokedex_grupo3`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pokemones`
--

CREATE TABLE `pokemones` (
                             `IDPokemon` int(11) NOT NULL,
                             `nombre` varchar(20) NOT NULL,
                             `numero` int(5) NOT NULL,
                             `imagen` varchar(500) NOT NULL,
                             `tipo` varchar(300) NOT NULL,
                             `isEnabled` int(1) NOT NULL DEFAULT 1,
                             `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pokemones`
--

INSERT INTO `pokemones` (`IDPokemon`, `nombre`, `numero`, `imagen`, `tipo`, `isEnabled`, `descripcion`) VALUES
                                                                                                            (6, 'charmander', 10, '../../Pokedex/src/images/charmander.png', '../../Pokedex/src/images/Tipo_fuego.png', 1, 'descripción 1'),
                                                                                                            (9, 'Eve', 123, '../../Pokedex/src/images/eevee.png', '../../Pokedex/src/images/Tipo_fuego.png', 1, 'Pega re fuerte'),
                                                                                                            (10, 'Squirtle', 3335, '../../Pokedex/src/images/squirtle.png', '../../Pokedex/src/images/Tipo_agua.png', 1, 'manso chorro de agua'),
                                                                                                            (11, 'Pikachu', 1, '../../Pokedex/src/images/pikachu.png', '../../Pokedex/src/images/Tipo_electrico.png', 1, 'pica pica EL DIEGO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
                            `id_usuario` int(10) NOT NULL,
                            `nombre` varchar(100) NOT NULL,
                            `nombreUsuario` varchar(100) NOT NULL,
                            `contrasenia` varchar(300) NOT NULL,
                            `isAdmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `nombreUsuario`, `contrasenia`, `isAdmin`) VALUES
                                                                                               (3, 'Administrador', 'administrador', 'e10adc3949ba59abbe56e057f20f883e', 1),
                                                                                               (4, 'Juan', 'usuario', 'c33367701511b4f6020ec61ded352059', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pokemones`
--
ALTER TABLE `pokemones`
    ADD PRIMARY KEY (`IDPokemon`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
    ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pokemones`
--
ALTER TABLE `pokemones`
    MODIFY `IDPokemon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
    MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
