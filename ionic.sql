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

-- Volcando datos para la tabla ionic.maestro: ~14 rows (aproximadamente)
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla ionic.usuario: ~0 rows (aproximadamente)
DELETE FROM `usuario`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
