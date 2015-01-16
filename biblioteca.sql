SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `biblioteca`
--
CREATE DATABASE `biblioteca` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `biblioteca`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` TEXT COLLATE utf8_spanish_ci NOT NULL,
  `description` TEXT COLLATE utf8_spanish_ci NOT NULL,
  `director` TEXT COLLATE utf8_spanish_ci NOT NULL,
  `embedUrl` TEXT COLLATE utf8_spanish_ci NOT NULL,
  `datePublished` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `movies` (`name`, `description`, `director`, `embedUrl`, `datePublished`) VALUES
('El Señor de los Anillos', 'Su historia se desarrolla en la Tercera Edad del Sol de la Tierra Media, un lugar ficticio poblado por hombres y otras razas antropomorfas como los hobbits, los elfos o los enanos, así como por muchas otras criaturas reales y fantásticas. La novela narra el viaje del protagonista principal, el hobbit Frodo Bolsón, para destruir el Anillo Único y la consiguiente guerra que provocará el enemigo para recuperarlo, ya que es la principal fuente de poder de su creador, el Señor oscuro Sauron.', 'Peter Jackson', '<iframe width="560" height="315" src="//www.youtube.com/embed/VIgkpEgCV-I" frameborder="0" allowfullscreen></iframe>', '2001-12-19'),
('Los Vengadores', 'The Avengers (The Avengers: Los Vengadores en Latinoamérica y Los Vengadores en España) es una película de superhéroes estadounidense producida por Marvel Studios y distribuida por Walt Disney Pictures, basado en el equipo de superhéroes de Marvel Comics del mismo nombre. Es parte del Universo Cinematográfico de Marvel, que enlaza varias películas de superhéroes de Marvel como Iron Man (2008), El Increíble Hulk (2008), Iron Man 2 (2010), Thor (2011) y Capitán América: el primer vengador (2011).', 'Joss Whedon', '<iframe width="560" height="315" src="//www.youtube.com/embed/HQIiYqOVTWo" frameborder="0" allowfullscreen></iframe>', '2012-04-25'),
('Alta Fidelidad', 'Rob Gordon (John Cusack) es el propietario de una tienda de discos de Chicago a punto de quebrar y en la que sólo se venden discos de vinilo. Rob comparte su afición por el clásico material con sus dos empleados, Dick (Todd Louiso) y Barry (Jack Black). En la tienda, los tres reflexionan y discuten sobre la música que aman. Pero Rob tiene otro problema: quiere volver con su antigua novia Laura (Iben Hjejle), que está saliendo con otro chico.', 'Stephen Frears', '<iframe width="560" height="315" src="//www.youtube.com/embed/cxFFRhNovbo" frameborder="0" allowfullscreen></iframe>', '2000-05-19');

