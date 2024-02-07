-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.34 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for testeal2022025
CREATE DATABASE IF NOT EXISTS `testeal2022025` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `testeal2022025`;

-- Dumping structure for table testeal2022025.artigos
CREATE TABLE IF NOT EXISTS `artigos` (
  `id_artigo` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `descricao` varchar(250) DEFAULT NULL,
  `stock` int NOT NULL,
  `imgPath` varchar(80) DEFAULT NULL,
  `id_usuario` int DEFAULT NULL,
  `preco` decimal(4,2) NOT NULL,
  PRIMARY KEY (`id_artigo`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table testeal2022025.artigos: ~2 rows (approximately)
INSERT INTO `artigos` (`id_artigo`, `nome`, `descricao`, `stock`, `imgPath`, `id_usuario`, `preco`) VALUES
	(20, 'Livro', 'Livro completo do lendario escritor', 30, 'imgupload/Torellly-Vieira1.jpg', 4, 21.00),
	(21, 'epcc', 'Escola cristovao colombo', 1, 'imgupload/download.png', 4, 99.99);

-- Dumping structure for table testeal2022025.destaque
CREATE TABLE IF NOT EXISTS `destaque` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_artigo` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table testeal2022025.destaque: ~1 rows (approximately)
INSERT INTO `destaque` (`id`, `id_artigo`) VALUES
	(32, 20);

-- Dumping structure for table testeal2022025.galeria
CREATE TABLE IF NOT EXISTS `galeria` (
  `id_img` int NOT NULL AUTO_INCREMENT,
  `imgPath` varchar(80) DEFAULT NULL,
  `alt_img` varchar(30) DEFAULT NULL,
  `id_artigo` int DEFAULT NULL,
  PRIMARY KEY (`id_img`)
) ENGINE=InnoDB AUTO_INCREMENT=351 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table testeal2022025.galeria: ~1 rows (approximately)
INSERT INTO `galeria` (`id_img`, `imgPath`, `alt_img`, `id_artigo`) VALUES
	(349, 'imgfoto/Torellly-Vieira1.jpg', '20', 20);

-- Dumping structure for table testeal2022025.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `idade` int NOT NULL,
  `palavra_passe` varchar(100) NOT NULL,
  `tipo` int NOT NULL,
  `img_user` varchar(50) DEFAULT NULL,
  `ativo` int NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table testeal2022025.usuario: ~6 rows (approximately)
INSERT INTO `usuario` (`id_usuario`, `nome`, `idade`, `palavra_passe`, `tipo`, `img_user`, `ativo`) VALUES
	(1, 'aluno', 20, '258311a99c516651fafc071f3149ccbcf29bbc33', 1, './imguser/po.png', 1),
	(2, 'jonas', 12, '22e29e02973e22efd0a5d303ee0dd541fc645168', 2, '23', 1),
	(3, 'Carlos', 32, 'ab5e2bca84933118bbc9d48ffaccce3bac4eeb64', 3, '23', 1),
	(4, '21', 12, '472b07b9fcf2c2451e8781e944bf5f77cd8457c8', 2, './imguser/po.png', 1),
	(5, 'cas', 12, '7071639b6f726fab2ed5e17531e54c6085e6c896', 2, './imguser/po.png', 1),
	(6, 'lucas', 20, '14a4fea23ba09adca5084b51b16dbcb9a83f99cf', 3, './imguser/po.png', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
