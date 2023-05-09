CREATE DATABASE  IF NOT EXISTS `tasty_burger` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci */;
USE `tasty_burger`;
-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: tasty_burger
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.38-MariaDB

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
-- Table structure for table `tb_cardapio`
--

DROP TABLE IF EXISTS `tb_cardapio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_cardapio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_item` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `ds_item` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `vl_item` decimal(10,2) DEFAULT NULL,
  `ds_imagem` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_cardapio`
--

LOCK TABLES `tb_cardapio` WRITE;
/*!40000 ALTER TABLE `tb_cardapio` DISABLE KEYS */;
INSERT INTO `tb_cardapio` VALUES (1,'Cl&aacute;ssico','P&atilde;o, carne bovina, alface crocante, tomate, cebola roxa, picles e molho especial da casa.',22.00,'imagem/01.png'),(2,'Quarteir&atilde;o','P&atilde;o, carne de bovina grelhada, queijo cheddar derretido, alface crocante, tomate, cebola roxa, picles e molho de mostarda.  ',24.00,'imagem/10.png'),(3,'Picanha','P&atilde;o, picanha grelhada, queijo gorgonzola derretido, ovo, alface, tomate, cebola roxa, picles e molho especial da casa.',28.00,'imagem/11.png'),(4,'Cordeiro','P&atilde;o, carne de cordeiro grelhada, queijo Gouda, r&uacute;cula, cebola crispy, picles e molho de hortel&atilde;.  ',32.00,'imagem/12.png'),(5,'Vegano','P&atilde;o, proteina de soja, bancon vegano, queijo vegano, alface, tomate, picles e molho especial de mostarda.  ',29.00,'imagem/05.png'),(6,'Frango crispy','P&atilde;o, peito de frango empanado, queijo cheddar derretido, alface, tomate, picles e molho especial de mostarda.  ',33.00,'imagem/14.png'),(7,'Apimentado','P&atilde;o, peito de frango empanaddo, queijo Gouda derretido, alface e gel&eacute;ia de pimenta Dedo-de-Mo&ccedil;a.',34.00,'imagem/16.png'),(8,'BBQ','P&atilde;o, frango crispy coberto com molho barbecue caseiro, alface, queijo cheddar derretido e cebola frita crocante.  ',25.00,'imagem/14.png'),(9,'Choco milk','Sorvete de chocolate belga.',27.00,'imagem/23.png'),(10,'Milk explosão','Sorvete artesanal de baunilha e ovomaltine.\n\n',21.00,'imagem/33.png'),(11,'Morango','Sorvete artesanal de morango com chantily.',22.00,'imagem/34.jpg'),(12,'Milk vegano','Linha vegana feita com leite de coco.\n\n',33.00,'imagem/35.png');
/*!40000 ALTER TABLE `tb_cardapio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pedido`
--

DROP TABLE IF EXISTS `tb_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `vl_total` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `ds_endereco_entrega` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `st_pedido` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `dt_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dt_atualizacao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario_tb_usuario_idx` (`id_usuario`),
  CONSTRAINT `id_usuario_tb_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `tb_pedido_item`
--

DROP TABLE IF EXISTS `tb_pedido_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pedido_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pedido` int(11) DEFAULT NULL,
  `id_cardapio` int(11) DEFAULT NULL,
  `qt_item` int(11) DEFAULT NULL,
  `vl_unitario` decimal(10,2) DEFAULT NULL,
  `dt_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_pedido_tb_pedido_idx` (`id_pedido`),
  KEY `id_cardapio_tb_cardapio_idx` (`id_cardapio`),
  CONSTRAINT `id_cardapio_tb_cardapio` FOREIGN KEY (`id_cardapio`) REFERENCES `tb_cardapio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_pedido_tb_pedido` FOREIGN KEY (`id_pedido`) REFERENCES `tb_pedido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `tb_usuario`
--

DROP TABLE IF EXISTS `tb_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_usuario` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `ds_email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nu_telefone` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `ds_senha` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Dumping events for database 'tasty_burger'
--

--
-- Dumping routines for database 'tasty_burger'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-08 22:35:18
