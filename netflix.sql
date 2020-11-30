-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2020 a las 00:07:02
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `netflix`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'inactive',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `status`, `created_at`) VALUES
(1, 'Anime', 'Películas de anime', 'Active', '2020-11-19 20:34:24'),
(2, 'Comedia', 'Películas que dan risa', 'Active', '2020-11-19 20:34:24'),
(3, 'Drama', 'Películas de drama', 'Active', '2020-11-19 20:35:19'),
(4, 'Acción', 'Películas de acción', 'Active', '2020-11-19 20:35:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `cover` varchar(255) NOT NULL,
  `minutes` int(11) NOT NULL,
  `clasification` varchar(255) NOT NULL,
  `trailer` longtext NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `cover`, `minutes`, `clasification`, `trailer`, `category_id`) VALUES
(5, 'Seishun Buta Yarou ', 'En Fujisawa, donde los cielos son brillantes y los mares brillan, Sakuta Azusagawa está en su segundo año de secundaria. Sus días felices con su novia y estudiante de último año, Mai Sakurajima, se ven interrumpidos con la aparición de su primer enamoramiento, Shouko Makinohara. Por razones desconocidas, se encuentra con dos Shouko: uno en la escuela secundaria y otro que se ha convertido en un adulto. ', 'pelicula3.jpg', 91, 'B15', 'https://www.youtube.com/embed/0KzWEM30L6k', 1),
(6, 'Sword Art Online Movie', 'La película tiene lugar tras los hechos acontecidos en la segunda temporada animada. Kirito, Asuna y sus amigos empiezan a jugar a un nuevo juego conocido como OS (Ordinal Scale) que, a diferencia de los juegos anteriores, utiliza un sistema de realidad aumentada llamado Augma. ', 'pelicula6.jpg', 119, 'B15', 'https://www.youtube.com/embed/vWHkrj5YEsQ', 1),
(8, 'Re:Zero - Memory Snow', 'La historia del OVA tiene lugar después de que Subaru y sus amigos derrotan a los Wolgarm, la fuente de la maldición, y salvan a los niños de la aldea de Irlam. Los personajes finalmente obtienen un momento de paz, y Subaru realiza cierta misión secreta que no debe dejar que nadie descubra. ', 'pelicula8.jpg', 2018, 'B15', 'https://www.youtube.com/embed/HI3JBI5pENg', 1),
(10, 'Kono Subarashii Sekai ', 'Kazuma Satou es un chico de preparatoria otaku y hikikomori que no suele salir de casa, pero cuando lo hace, un fatídico (y ridículo) accidente acaba con su vida. En el otro mundo aparece una diosa ante él y le propone comenzar de nuevo su vida en un mundo de magia y espada, pero las condiciones son un tanto peculiares, así que acabará comenzando de cero como aventurero y acompañado de una diosa. ', 'pelicula1.jpg', 90, 'B15', 'https://www.youtube.com/embed/5h4rQY9bpgE', 1),
(11, 'No Game No Life: Zero', 'No Game No Life narra las aventuras de Sora y Shiro, unos “hermanos” bastante peculiares, quienes se sumergen en un mundo llamado Disboard y que está plagado de referencias a videojuegos y juegos en general. Pero No Game No Life: Zero nos contará eventos previos a nuestros protagonistas, los cuales fueron “borrados” de la memoria colectiva, interpretando así a personajes que vivieron en Disboard hace seis mil años.', 'pelicula2.jpg', 100, 'B15', 'https://www.youtube.com/embed/quj8sK3Phh8', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `created_at`) VALUES
(1, 'Alan', 'halan4126@gmail.com', 'e31aa43ef35a69e142a3d5293bee782b', 'active', '2020-11-26 21:00:54'),
(2, 'Vanessa', 'vane@gmail.com', 'e31aa43ef35a69e142a3d5293bee782b', 'active', '2020-11-26 21:27:16'),
(5, 'ad', 'asd@gmail.com', 'e31aa43ef35a69e142a3d5293bee782b', 'active', '2020-11-26 21:38:05');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
