-- MySQL dump 10.13  Distrib 5.7.28, for Linux (x86_64)
--
-- Host: localhost    Database: hoteldb
-- ------------------------------------------------------
-- Server version	5.7.28-0ubuntu0.18.04.4

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `cpf` bigint(20) NOT NULL,
  `status` varchar(15) DEFAULT NULL,
  `nome` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cep` varchar(20) NOT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (9621332990,'Inadimplente','Isaac Emanuel da Costa','(48)98719-1543','isaacemanueldacosta@maccropropaganda.com.br','Florianópolis','Rua Osvaldo Silveira',176,'Córrego Grande','SC','88037-720'),(13594801969,'Ativo','Betina Lívia Marlene Novaes','(48)98952-2211','betinaliviamarlenenovaes@raioazul.com.br','Florianópolis','Praça de Portugal',829,'Centro','SC','88015-706'),(30079881955,'Ativo','Carolina Giovana Vieira','(48)98160-2692','ccarolinagiovanavieira@iquattro.com.br','Florianópolis','Rua Auroreal',503,'Campeche','SC','88063-200'),(33874950999,'Ativo','Nathan Danilo Renato Novaes','(48)99224-8407','nathandanilorenatonovaes-73@gerdal.com.br','Florianópolis','Travessa das Sardinhas',696,'Jurerê Internacional','SC','88053-434'),(42795044900,'Inadimplente','José Fábio Cavalcanti','(48)98958-2414','josefabiocavalcanti@lexos.com.br','Florianópolis','Servidão dos Saguis',748,'Ingleses do Rio Vermelho','SC','88058-498'),(48948813730,'Inadimplente','Thales Felipe Paulo da Mata','(21)99457-2654','thalesfelipepaulodamata_@eternalam.com.br','Rio de Janeiro','Rua Raimundo Correia',189,'Copacabana','RJ','22040-970'),(50679185941,'Ativo','Lavínia Maitê das Neves','(48)98249-1374','laviniamaitedasneves@ltecno.com.br','Florianópolis','Servidão Idalina Maria da Silveira',374,'Ingleses do Rio Vermelho','SC','88058-184'),(55190740978,'Ativo','Theo Leandro Duarte','(48)98563-1134','ttheoleandroduarte@yahool.com','Florianópolis','Rua Luiz Rampa',152,'Jurerê','SC','88053-684'),(77052870991,'Ativo','Henry Caio Silveira','(48)99396-6107','henrycaiosilveira@valdulion.com.br','Florianópolis','Rua Professor Aldo Câmara da Silva',923,'Centro','SC','88020-202'),(77259654910,'Ativo','Kevin Marcelo Benício Martins','(48)98245-2382','kevinmarcelobeniciomartins@prudential.com','Florianópolis','Rodovia José Carlos Daux 600',598,'João Paulo','SC','88030-908'),(81868230856,'Ativo','Levi Luís Cavalcanti','(51)99259-7877','leviluiscavalcanti-97@rafaeladson.com','Canoas','Rua Major Bernardo Joaquim Ferreira',857,'São José','RS','92425-533'),(95227704937,'Ativo','Yasmin Sabrina Rebeca Lopes','(48)98831-3711','yasminsabrinarebecalopes@autvale.com','Florianópolis','Servidão Guiomar de Lima Monteiro',113,'Canasvieiras','SC','88054-630');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fatura`
--

DROP TABLE IF EXISTS `fatura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fatura` (
  `idfatura` int(11) NOT NULL,
  `saldototal` double DEFAULT NULL,
  PRIMARY KEY (`idfatura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fatura`
--

LOCK TABLES `fatura` WRITE;
/*!40000 ALTER TABLE `fatura` DISABLE KEYS */;
/*!40000 ALTER TABLE `fatura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionario` (
  `cpf` bigint(20) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `cargo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario`
--

LOCK TABLES `funcionario` WRITE;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itens`
--

DROP TABLE IF EXISTS `itens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itens` (
  `iditens` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `valor` varchar(45) NOT NULL,
  `quantidade` int(11) NOT NULL,
  PRIMARY KEY (`iditens`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itens`
--

LOCK TABLES `itens` WRITE;
/*!40000 ALTER TABLE `itens` DISABLE KEYS */;
/*!40000 ALTER TABLE `itens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quartos`
--

DROP TABLE IF EXISTS `quartos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quartos` (
  `idquartos` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `tipos_idtipo` int(11) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idquartos`),
  KEY `fk_quartos_tipos_idx` (`tipos_idtipo`),
  CONSTRAINT `fk_quartos_tipos` FOREIGN KEY (`tipos_idtipo`) REFERENCES `tipos` (`idtipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quartos`
--

LOCK TABLES `quartos` WRITE;
/*!40000 ALTER TABLE `quartos` DISABLE KEYS */;
INSERT INTO `quartos` VALUES (1,'3QS1',2,'Ocupado'),(2,'3QS2',2,'Disponivel'),(3,'3QS3',2,'Disponivel'),(4,'3QS4',2,'Disponivel'),(5,'3QS5',2,'Disponivel');
/*!40000 ALTER TABLE `quartos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserva`
--

DROP TABLE IF EXISTS `reserva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reserva` (
  `idreserva` int(11) NOT NULL AUTO_INCREMENT,
  `valor` double DEFAULT NULL,
  `cliente_cpf` bigint(20) NOT NULL,
  `quartos_idquartos` int(11) NOT NULL,
  `datacheckin` datetime DEFAULT NULL,
  `datacheckout` datetime DEFAULT NULL,
  PRIMARY KEY (`idreserva`),
  KEY `fk_reserva_cliente1_idx` (`cliente_cpf`),
  KEY `fk_reserva_quartos1_idx` (`quartos_idquartos`),
  CONSTRAINT `fk_reserva_cliente1` FOREIGN KEY (`cliente_cpf`) REFERENCES `cliente` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reserva_quartos1` FOREIGN KEY (`quartos_idquartos`) REFERENCES `quartos` (`idquartos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva`
--

LOCK TABLES `reserva` WRITE;
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
INSERT INTO `reserva` VALUES (2,NULL,13594801969,3,'2019-11-20 18:48:15','2019-11-21 22:48:39'),(3,NULL,13594801969,4,'2019-11-20 22:26:04','2019-11-21 22:48:43'),(4,NULL,13594801969,2,'2019-11-21 22:49:36','2019-11-21 22:50:12'),(5,NULL,33874950999,4,'2019-11-21 22:50:04','2019-11-21 22:50:17'),(6,NULL,42795044900,5,'2019-11-21 22:51:37','2019-11-22 20:27:23'),(7,NULL,42795044900,5,'2019-11-21 22:51:52','2019-11-22 20:27:29'),(8,NULL,13594801969,5,'2019-11-22 20:28:46','2019-11-22 20:30:24'),(9,NULL,9621332990,4,'2019-11-23 13:54:01','2019-11-23 14:58:32'),(10,NULL,13594801969,3,'2019-11-23 15:01:46','2019-11-23 15:02:55'),(11,NULL,30079881955,2,'2019-11-23 15:02:42','2019-11-23 15:08:02'),(12,NULL,13594801969,5,'2019-11-23 15:13:37','2019-11-23 15:13:46'),(13,NULL,30079881955,4,'2019-11-23 15:15:05','2019-11-23 15:15:11'),(14,NULL,33874950999,1,'2019-11-23 15:19:05','2019-11-23 15:20:29'),(15,NULL,30079881955,4,'2019-11-23 15:21:14','2019-11-23 15:22:00'),(16,NULL,30079881955,4,'2019-11-23 15:33:59','2019-11-23 15:34:05'),(17,NULL,30079881955,2,'2019-11-23 17:37:14','2019-11-23 17:37:22'),(18,NULL,30079881955,1,'2019-11-23 17:39:31','2019-11-23 17:39:40'),(19,NULL,30079881955,3,'2019-11-23 17:40:26','2019-11-23 17:40:29'),(20,NULL,13594801969,5,'2019-11-23 18:27:17','2019-11-23 18:27:32'),(21,NULL,42795044900,1,'2019-11-23 18:31:38','2019-11-23 18:31:43'),(22,NULL,30079881955,2,'2019-11-23 18:33:53','2019-11-23 18:33:59'),(23,NULL,30079881955,3,'2019-11-23 19:15:18','2019-11-23 19:15:30'),(24,NULL,13594801969,4,'2019-11-23 19:19:03','2019-11-23 19:19:11'),(25,NULL,30079881955,5,'2019-11-23 19:23:19','2019-11-23 19:23:32'),(26,NULL,13594801969,1,'2019-11-23 19:38:55',NULL);
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos`
--

DROP TABLE IF EXISTS `tipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipos` (
  `idtipo` int(11) NOT NULL AUTO_INCREMENT,
  `nometipo` varchar(45) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `valordiaria` varchar(45) NOT NULL,
  PRIMARY KEY (`idtipo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos`
--

LOCK TABLES `tipos` WRITE;
/*!40000 ALTER TABLE `tipos` DISABLE KEYS */;
INSERT INTO `tipos` VALUES (2,'Quarto super luxo','Quarto super luxo','100'),(3,'Casal standard','Quarto casal padrão','22.5');
/*!40000 ALTER TABLE `tipos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-23 19:57:26
