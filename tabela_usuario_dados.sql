-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 10-Maio-2023 às 18:38
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tasty_burger`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

DROP TABLE IF EXISTS `tb_usuario`;
CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nm_usuario` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `ds_email` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nu_telefone` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `ds_senha` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id`, `nm_usuario`, `ds_email`, `nu_telefone`, `ds_senha`) VALUES
(20, 'Maria', 'maria@gmail.com', '11111111', '4cd3a44cb7427f95a5010a7f59925063'),
(21, 'João', 'joao@gmail.com', '44444444', '80a20d3f3074fc189647554223430c25'),
(22, 'rafael', 'rafael@gmail.com', '33333333', '6d65533b980510e05f6700d150b9c114'),
(23, 'Paulo', 'paulo@gmail.com', '77777777', '4cd3a44cb7427f95a5010a7f59925063'),
(24, 'Camila Rezende', 'camila@gmail.com', '55555555', '4cd3a44cb7427f95a5010a7f59925063');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
