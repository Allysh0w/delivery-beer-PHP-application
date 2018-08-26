-- --------------------------------------------------------
-- Servidor:                     db-delivery-bee.mysql.uhserver.com
-- Versão do servidor:           5.6.22 - MySQL Community Server (GPL)
-- OS do Servidor:               Linux
-- HeidiSQL Versão:              8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para db_delivery_bee

USE `u664760171_beer`;


-- Copiando estrutura para tabela db_delivery_bee.auditoria
CREATE TABLE IF NOT EXISTS `auditoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imei` varchar(36) DEFAULT NULL,
  `latitude` varchar(40) DEFAULT NULL,
  `longitude` varchar(40) DEFAULT NULL,
  `numero_tel` varchar(14) DEFAULT NULL,
  `localizacao` varchar(200) DEFAULT NULL,
  `usuario_cliente` varchar(60) DEFAULT NULL,
  `senha_cliente` varchar(40) DEFAULT NULL,
  `id_produto` int(4) DEFAULT NULL,
  `hora_ocorrencia` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela db_delivery_bee.auditoria: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `auditoria` DISABLE KEYS */;
INSERT INTO `auditoria` (`id`, `imei`, `latitude`, `longitude`, `numero_tel`, `localizacao`, `usuario_cliente`, `senha_cliente`, `id_produto`, `hora_ocorrencia`) VALUES
	(1, '355257052477616', '-5.095544', '-42.814502', NULL, 'https://maps.google.com/?q=-5.095544,-42.814502', 'Ally2', '123456', 2, NULL),
	(2, '355257052477616', '-5.095544', '-42.814502', NULL, 'https://maps.google.com/?q=-5.095544,-42.814502', 'Ally2', '123456', 1, NULL),
	(3, '355257052477616', '-5.095544', '-42.814500', '123', 'https://maps.google.com/?q=-5.095544,-42.814500', 'Ally2', '123456', 1, '2015-05-27 16:29:32');
/*!40000 ALTER TABLE `auditoria` ENABLE KEYS */;


-- Copiando estrutura para tabela db_delivery_bee.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  `descricao` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela db_delivery_bee.categoria: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`id`, `nome`, `data_cadastro`, `descricao`) VALUES
	(1, 'Vodka', '2015-05-04', 'Vodka deliciosa'),
	(2, 'Champanhe', '2015-05-25', 'Champanhe, espumante francês.'),
	(3, 'Vinho', '2015-05-07', 'Vinho, bebida derivada da ua.'),
	(4, 'Cerveja', '2015-05-07', 'Cerveja, bebida derivada da cevada.'),
	(5, 'Whisky', '2015-05-07', 'Whisky'),
	(6, 'Licor', '2015-05-25', 'É uma bebida alcoólica doce, composta por álcool misturado com frutas e ervas.');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;


-- Copiando estrutura para tabela db_delivery_bee.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `usuario` varchar(15) DEFAULT NULL,
  `senha` varchar(12) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  `telefone` varchar(13) DEFAULT NULL,
  `endereco` varchar(400) DEFAULT NULL,
  `imei` varchar(40) DEFAULT NULL,
  `cpf` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela db_delivery_bee.cliente: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`id`, `nome`, `email`, `usuario`, `senha`, `data_cadastro`, `telefone`, `endereco`, `imei`, `cpf`) VALUES
	(1, 'Allyson', 'Hshs', 'Ally2', '123456', '2015-05-27', '123', 'Gshsj', '355257052477616', NULL);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


-- Copiando estrutura para tabela db_delivery_bee.entrega
CREATE TABLE IF NOT EXISTS `entrega` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produto` varchar(50) DEFAULT NULL,
  `quantidade` int(2) DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `data_entrega` datetime DEFAULT NULL,
  `endereco` varchar(300) DEFAULT NULL,
  `latitude` varchar(40) DEFAULT NULL,
  `longitude` varchar(40) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela db_delivery_bee.entrega: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `entrega` DISABLE KEYS */;
INSERT INTO `entrega` (`id`, `produto`, `quantidade`, `valor`, `data_entrega`, `endereco`, `latitude`, `longitude`, `telefone`, `usuario`) VALUES
	(1, 'Montila', 1, 20, '2015-05-27 15:34:52', 'Gshsj', '-5.095544', '-42.814502', '123', 'Ally2'),
	(2, 'Vodka Absolut', 1, 70, '2015-05-27 15:39:58', 'Gshsj', '-5.095544', '-42.814502', '123', 'Ally2'),
	(3, 'Vodka Absolut', 1, 70, '2015-05-27 16:29:32', 'Gshsj', '-5.095544', '-42.814500', '123', 'Ally2');
/*!40000 ALTER TABLE `entrega` ENABLE KEYS */;


-- Copiando estrutura para tabela db_delivery_bee.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `descricao` text,
  `id_tipo` int(11) DEFAULT NULL,
  `foto_caminho` varchar(200) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  `quantidade_disponivel` int(3) DEFAULT NULL,
  `promocao` varchar(1) DEFAULT NULL,
  `preco` decimal(10,0) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_categoria` (`id_categoria`),
  KEY `fk_id_tipo` (`id_tipo`),
  CONSTRAINT `fk_id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`),
  CONSTRAINT `fk_id_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela db_delivery_bee.produto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` (`id`, `nome`, `descricao`, `id_tipo`, `foto_caminho`, `data_cadastro`, `quantidade_disponivel`, `promocao`, `preco`, `id_categoria`) VALUES
	(1, 'Old Parr 12 anos', 'Whisky Old Parr 12 anos.', 2, 'Oldparr.jpg', '2015-06-19', 4, 'N', 120, 5);
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;


-- Copiando estrutura para tabela db_delivery_bee.tipo
CREATE TABLE IF NOT EXISTS `tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela db_delivery_bee.tipo: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
INSERT INTO `tipo` (`id`, `nome`, `data_cadastro`) VALUES
	(2, 'Importado', '2015-05-04'),
	(3, 'Nacional', '2015-05-04');
/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;


-- Copiando estrutura para tabela db_delivery_bee.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `usuario` varchar(12) DEFAULT NULL,
  `senha` varchar(12) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela db_delivery_bee.usuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `nome`, `imagem`, `usuario`, `senha`, `data_cadastro`, `telefone`, `email`) VALUES
	(1, 'Allyson', NULL, 'ally', '123', '2015-05-04', '8699150418', 'ally@ally.com');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
