-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 03-Dez-2018 às 22:50
-- Versão do servidor: 5.7.23
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manutencao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamentos`
--

DROP TABLE IF EXISTS `equipamentos`;
CREATE TABLE IF NOT EXISTS `equipamentos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `equipamentos`
--

INSERT INTO `equipamentos` (`id`, `nome`, `created_at`, `updated_at`) VALUES
(1, 'Computador', NULL, NULL),
(2, 'Laptop', NULL, NULL),
(3, 'Tablet', NULL, NULL),
(4, 'Impressora', NULL, NULL),
(5, 'Data show', NULL, NULL),
(6, 'Monitor', NULL, NULL),
(7, 'Mouse', NULL, NULL),
(8, 'Teclado', NULL, NULL),
(9, 'Roteador', NULL, NULL),
(10, 'Modem', NULL, NULL),
(11, 'Bateria', NULL, NULL),
(12, 'Mouse Gamer', NULL, NULL),
(13, 'Bateria 18650 Sony', NULL, NULL),
(14, 'Lanterna', NULL, NULL),
(15, 'HD Externo', NULL, NULL),
(16, 'Suporte Gabinete', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `registros`
--

DROP TABLE IF EXISTS `registros`;
CREATE TABLE IF NOT EXISTS `registros` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `equipamento_id` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(191) NOT NULL,
  `datalimite` date NOT NULL,
  `tipo` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `registros_equipamento_id_foreign` (`equipamento_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `registros`
--

INSERT INTO `registros` (`id`, `equipamento_id`, `descricao`, `datalimite`, `tipo`, `created_at`, `updated_at`) VALUES
(1, 1, 'Troca HD', '2018-02-05', 1, '2018-12-03 00:42:58', '2018-12-03 00:42:58'),
(2, 9, 'DHCP', '2018-02-03', 2, '2018-12-03 00:42:58', '2018-12-03 00:42:58'),
(3, 4, 'Tonner', '2018-02-08', 1, '2018-12-03 00:42:58', '2018-12-03 00:42:58'),
(4, 2, 'Tela', '2018-02-07', 2, '2018-12-03 00:42:58', '2018-12-03 00:42:58'),
(5, 3, 'Atualizacao', '2018-02-05', 3, '2018-12-03 00:42:58', '2018-12-03 00:42:58'),
(6, 5, 'Lampada', '2018-02-02', 2, '2018-12-03 00:42:58', '2018-12-03 00:42:58'),
(7, 7, 'Troca', '2018-02-06', 3, '2018-12-03 00:42:58', '2018-12-03 00:42:58'),
(8, 6, 'Burn in', '2018-02-09', 2, '2018-12-03 00:42:58', '2018-12-03 00:42:58'),
(9, 11, 'Troca', '2018-12-07', 3, NULL, NULL),
(10, 11, 'Troca', '2018-12-07', 3, NULL, NULL),
(11, 11, 'Troca', '2018-12-07', 3, NULL, NULL),
(12, 11, 'Troca', '2018-12-03', 3, NULL, NULL),
(13, 11, 'Troca', '2018-12-08', 3, NULL, NULL),
(14, 13, 'Teste de Carga', '2018-12-11', 1, NULL, NULL),
(15, 14, 'Lanterna Intermitente', '2018-12-15', 2, NULL, NULL),
(16, 15, 'Troca', '2018-12-05', 1, NULL, NULL),
(17, 7, 'Troca Cabo', '2018-12-19', 1, NULL, NULL),
(18, 1, 'Troca de Gabinete', '2018-12-07', 2, NULL, NULL),
(19, 12, 'Troca de Fio', '2018-12-13', 2, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `registros`
--
ALTER TABLE `registros`
  ADD CONSTRAINT `registros_equipamento_id_foreign` FOREIGN KEY (`equipamento_id`) REFERENCES `equipamentos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
