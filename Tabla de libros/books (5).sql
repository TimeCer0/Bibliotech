-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3308
-- Tiempo de generación: 01-07-2024 a las 06:57:03
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
-- Base de datos: `bibliotech`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `imagen_portada` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `contenido` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `books`
--

INSERT INTO `books` (`id`, `titulo`, `imagen_portada`, `autor`, `categoria`, `contenido`, `created_at`, `updated_at`) VALUES
(1, 'De Ninguna Parte', 'storage/books/De_ninguna_parte.png', 'Julia Navarro', 'Drama', 'storage/content_book/de_ninguna_parte_content.txt', '2024-06-23 04:23:35', '2024-06-23 04:23:35'),
(2, 'El Hijo Olvidado', 'storage/books/El_hijo_olvidado.png', 'Mikel Santiago', 'Suspenso', 'storage/content_book/el_hijo_olvidado_content.txt', '2024-06-23 04:34:43', '2024-06-23 04:34:43'),
(3, 'La Forja de Una Rebelde', 'storage/books/La_forja_de_una_rebelde.png', 'Lorenzo Silva', 'Suspenso', 'storage/content_book/la_forja_de_una_rebelde_content.txt', '2024-06-23 04:39:21', '2024-06-23 04:39:21'),
(4, 'Proyecto Silverview', 'storage/books/Proyecto_silverview.png', 'John Le Carre', 'Novela', 'storage/content_book/proyecto_silverview_content.txt', '2024-06-23 05:20:23', '2024-06-23 05:20:23'),
(5, 'Violeta', 'storage/books/Violeta.png', 'Isabel Allende', 'Novela', 'storage/content_book/violeta_content.txt', '2024-06-23 15:48:45', '2024-06-23 15:48:45'),
(6, 'La Bestia', 'storage/books/La_bestia.png', 'Carmen Mola', 'Novela', 'storage/content_book/la_bestia_content.txt', '2024-06-23 15:50:43', '2024-06-23 15:50:43'),
(7, 'Nunca', 'storage/books/Ken_follet_nunca.png', 'Ken Follett', 'Novela', 'storage/content_book/nunca_content.txt', '2024-06-23 16:10:07', '2024-06-23 16:10:07'),
(8, 'Ultimos Dias en Berlin', 'storage/books/Ultimos_dias_en_berin.png', 'Paloma Sanchez Garnica', 'ficcion_historica', 'storage/content_book/ultimos_dias_en_berlin_content.txt', '2024-06-23 16:40:40', '2024-06-23 16:40:40'),
(9, 'Sinuhe, El Egipcio', 'storage/books/sinuhe.png', 'Mika Waltari', 'ficcion_historica', 'storage/content_book/sinuhe_el_egipcio_content.txt', '2024-06-23 16:43:28', '2024-06-23 16:43:28'),
(10, 'Memorias de Adriano', 'storage/books/memorias_de_adriano.png', 'Marguerite Yourcenar', 'ficcion_historica', 'storage/content_book/memorias_de_adriano_content.txt', '2024-06-23 16:48:31', '2024-06-23 16:48:31'),
(11, 'La Tierra Bajo Tus Pies', 'storage/books/la_tierra_debajo_tus_pies.png', 'Cristina López Barrio', 'Drama', 'storage/content_book/la_tierra_debajo_tus_pies_content.txt', '2024-06-23 16:53:21', '2024-06-23 16:53:21'),
(12, 'Caperucita Roja', 'storage/books/caperucita_roja.png', 'Christian Guibbaud', 'Cuento', 'storage/content_book/caperucita_roja_content.txt', '2024-06-23 16:59:07', '2024-06-23 16:59:07'),
(13, 'El Principito', 'storage/books/el_principito.png', 'Antoine De Saint Exupery', 'Cuento', 'storage/content_book/el_principito_content.txt', '2024-06-23 17:46:36', '2024-06-23 17:46:36'),
(14, 'La Paciente Silenciosa', 'storage/books/la_paciente_solenciosa.png', 'Alex Michaelides', 'Suspenso', 'storage/content_book/la_paciente_solenciosa_content.txt', '2024-06-24 10:10:47', '2024-06-24 10:10:47'),
(17, 'El Gato con Botas', 'storage/books/el_gato_con_botas.png', 'Charles Perrault', 'Cuento', 'storage/content_book/el_gato_con_botas_content.txt', '2024-06-24 10:57:55', '2024-06-24 10:57:55'),
(18, 'El Espia que Surgio del Frio', 'storage/books/el_espia_que_surgio_del_frio.png', 'John Le Carre', 'Suspenso', 'storage/content_book/el_espia_que_surgio_del_frio_content.txt', '2024-06-25 01:15:36', '2024-06-25 01:15:36');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
