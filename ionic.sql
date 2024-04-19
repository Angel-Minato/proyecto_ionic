-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para ionic
CREATE DATABASE IF NOT EXISTS `ionic` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ionic`;

-- Volcando estructura para tabla ionic.comic
CREATE TABLE IF NOT EXISTS `comic` (
  `comic_id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL DEFAULT '',
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `portada` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fecha_publicacion` varchar(50) NOT NULL DEFAULT '',
  `genero` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`comic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla ionic.comic: ~3 rows (aproximadamente)
DELETE FROM `comic`;
INSERT INTO `comic` (`comic_id`, `titulo`, `descripcion`, `portada`, `fecha_publicacion`, `genero`) VALUES
	(1, 'jujutsu kaisen', 'un vato que comio un dedo y ahroa es el narco mas poderos del barrio de sibuya', 'https://m.media-amazon.com/images/I/81TmHlRleJL._SL1500_.jpg', '12', 'horro, accion, sobrenatural, demonios'),
	(2, 'SPY X FAMILY', 'es la historia de una famili conformada por una niño que lee mentes, un espia y una asecina sabrosa', 'https://m.media-amazon.com/images/I/71GU1enbfFL._SL1500_.jpg', '1', 'accion, comedia, familia, romance, drama'),
	(3, 'One Piece', 'Hace veintidós años,', 'https://m.media-amazon.com/images/I/71XUszyF5uL._SL1100_.jpg', '20', 'Acción, Aventuras, Cómico, Fantasía'),
	(4, 'Mushoku Tensei: Isekai Ittara Honki Dasu', 'La historia trata sobre un muchacho que se encierra en su casa tras sufrir una enorme humillación pública sin atreverse a salir durante varios años debido a los traumas que esto le ocasionó. Incapaz de soportar esto, se encerró en casa sin querer salir ni volver a ver a sus compañeros y durante años el miedo a salir creció y creció, acabando por convertirse en una carga para su familia… hasta el día en que sus padres murieron y sus hermanos lo expulsaron de su hogar por el parásito en el que se había convertido. En ese momento, aunque tarde, se arrepintió de su actitud y se puso a pensar que su vida podría haber sido decente si él le hubiera puesto más esfuerzo. Justo cuando estaba a punto de iniciar su nuevo cambio, ve un camión en movimiento a gran velocidad dirigiéndose a tres estudiantes de secundaria. Reuniendo todas las fuerzas que tenía logra salvarlos, pero a cambio él termina siendo atropellado por el camión, muriendo al instante. Cuando abrió los ojos, él había reencarnado en un mundo de espadas y magia como Rudeus Greyrat. Nacido en este nuevo mundo, con una nueva vida, Rudeus decidió que, Esta vez, realmente voy a vivir mi vida al máximo sin arrepentimientos. De este modo se inicia el viaje de un hombre que anhela reiniciar su vida.', 'https://m.media-amazon.com/images/I/91g5bGT5zjL._SL1500_.jpg', '22', 'Acción, aventura, drama, ecchi, romance, fantasía, isekai, harem');

-- Volcando estructura para tabla ionic.maestro
CREATE TABLE IF NOT EXISTS `maestro` (
  `id_maestro` int unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) DEFAULT NULL,
  `apodo` varchar(50) DEFAULT NULL,
  `correo` varchar(250) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_maestro`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla ionic.maestro: ~15 rows (aproximadamente)
DELETE FROM `maestro`;
INSERT INTO `maestro` (`id_maestro`, `nombre`, `apodo`, `correo`, `tel`, `foto`) VALUES
	(1, 'ingeneria civil', 'no se ', 'hola@h.com', '61811187', 'xds'),
	(2, 'Ingeneria de Software', 'Batman', 'america@HOLA.com', '6181833954', ''),
	(3, '', '', '', '0', ''),
	(4, '', '', '', '0', ''),
	(5, 'Ingeneria ambiental', 'chinge su madre el america', 'america@HOLA.com', '6178923', '0'),
	(7, '', '', '', '', ''),
	(8, '', '', '', '', ''),
	(10, '', '', '', '', ''),
	(11, '', '', '', '', ''),
	(12, '', '', '', '', ''),
	(13, '', '', '', '', ''),
	(14, '', '', '', '', ''),
	(15, 'Ingeneria ambiental', 'chinge su madre el america', 'america@HOLA.com', '6178923', 'xds'),
	(16, 'yahir', 'nose ', 'gantzs@.anime.edu.com', '6181833954', 'xds');

-- Volcando estructura para tabla ionic.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla ionic.usuario: ~0 rows (aproximadamente)
DELETE FROM `usuario`;
INSERT INTO `usuario` (`id`, `nombre`, `correo`, `contrasena`) VALUES
	(1, 'yahir', 'unipoyo@hotmail.com', '12345'),
	(2, 'Lizeth Murillo', 'hitman13522@gmail.com', '123456');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
