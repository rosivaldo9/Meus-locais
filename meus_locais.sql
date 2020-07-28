-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 28-Jul-2020 às 15:28
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `meus locais`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `locais`
--

DROP TABLE IF EXISTS `locais`;
CREATE TABLE IF NOT EXISTS `locais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `logradouro` varchar(150) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `numero` varchar(6) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `locais`
--

INSERT INTO `locais` (`id`, `nome`, `cep`, `logradouro`, `complemento`, `numero`, `bairro`, `uf`, `cidade`, `data`) VALUES
(1, 'gg', '65715000', 'gggg', 'gggg', 'gggg', '   gggg', 'MA', '		Lago da Pedra', '2020-07-18'),
(8, 'ggg', '30170121', 'Rua Curitiba', '', 'gggg', ' Centro', 'MG', 'Belo Horizonte', '2020-07-11'),
(9, 'ee', 'r', 'i', '', 'y', ' t', 'r', 'ee', '2020-07-18');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
