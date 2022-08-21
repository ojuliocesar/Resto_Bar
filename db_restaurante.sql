/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `db_restaurante` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_restaurante`;

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `ativo` bit(1) NOT NULL DEFAULT b'1',
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_admin` (`id`, `email`, `senha`, `ativo`, `data_cadastro`) VALUES
	(1, 'ojuliocesar@gmail.com', 'ojuliocesar321', b'1', '2022-08-17 14:14:59');

CREATE TABLE IF NOT EXISTS `tb_pratos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `preco` float(6,2) NOT NULL,
  `calorias` int(11) NOT NULL,
  `destaque` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_pratos` (`id`, `codigo`, `nome`, `categoria`, `descricao`, `preco`, `calorias`, `destaque`) VALUES
	(1, 'brie-geleia', 'Queijo Breie Geleia', 'sobremesas', 'Melhor Queijo da cidade', 29.99, 155, 1),
	(2, 'cheesecake-cereja', 'Cheesecake Cereja', 'sobremesas', 'Melhor Cheesecake da cidade', 34.88, 180, 0),
	(3, 'camarao-alho', 'Camarão ao Alho', 'entrada', 'Melhor Camarão da cidade', 55.88, 200, 1),
	(4, 'churrasco-misto', 'Churrasco Misto', 'entrada', 'Melhor Churrasco da cidade ', 80.99, 500, 0),
	(5, 'costelinha', 'Costelinha', 'prato-principal', 'Melhor Costelinha da cidade', 27.88, 285, 1),
	(6, 'creme-papaya', 'Creme Papaya', 'sobremesas', 'Melhor Creme da cidade', 25.55, 134, 1),
	(7, 'flan-frutas-vermelhas', 'Flan Frutas Vermelhas', 'sobremesas', 'Melhores Frutas da cidade', 35.99, 150, 1),
	(8, 'petit-gateau', 'Petit Gateau', 'sobremesas', 'Melhor Petit Gateu da cidade', 50.99, 200, 1),
	(9, 'salmao-legumes', 'Salmão com Legumes', 'prato-principal', 'Melhor Salmão da Cidade', 32.99, 120, 0),
	(10, 'picanha-brasileira', 'Picanha Brasileira', 'prato-principal', 'Melhor Picanha da cidade', 59.99, 360, 0);

CREATE TABLE IF NOT EXISTS `tb_reserva` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `data_reserva` datetime NOT NULL,
  `mensagem` text NOT NULL,
  `numero_pessoas` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
