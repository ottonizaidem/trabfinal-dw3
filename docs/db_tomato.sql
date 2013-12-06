-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.27
-- Versão do PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `db_tomato`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_atividade_tomato`
--

CREATE TABLE IF NOT EXISTS `tb_atividade_tomato` (
  `id_atividade_tomato` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) DEFAULT NULL,
  `tb_usuario_id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_atividade_tomato`),
  KEY `fk_tb_atividade_tomato_tb_usuario_idx` (`tb_usuario_id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `tb_atividade_tomato`
--

INSERT INTO `tb_atividade_tomato` (`id_atividade_tomato`, `descricao`, `tb_usuario_id_usuario`) VALUES
(1, 'Projeto PHP TOMATO', 1),
(3, 'Teste de Redirect', 1),
(4, 'Teste de Redirect2', 1),
(5, 'Caso de Uso Numero 15', 1),
(6, 'Projeto Tomato 1', 2),
(7, 'Aula de PHP', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_reg_tomato`
--

CREATE TABLE IF NOT EXISTS `tb_reg_tomato` (
  `id_tomato` int(11) NOT NULL AUTO_INCREMENT,
  `dt_inicio` datetime NOT NULL,
  `dt_fim` datetime DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `tb_atividade_tomato_id_atividade_tomato` int(11) NOT NULL,
  PRIMARY KEY (`id_tomato`),
  KEY `fk_tb_reg_tomato_tb_atividade_tomato1_idx` (`tb_atividade_tomato_id_atividade_tomato`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Extraindo dados da tabela `tb_reg_tomato`
--

INSERT INTO `tb_reg_tomato` (`id_tomato`, `dt_inicio`, `dt_fim`, `status`, `tb_atividade_tomato_id_atividade_tomato`) VALUES
(13, '2013-12-04 15:15:17', '2013-12-04 22:16:45', 'T', 1),
(14, '2013-12-04 21:23:37', '2013-12-04 21:25:57', 'T', 5),
(15, '2013-12-04 21:26:24', '2013-12-04 22:13:00', 'T', 5),
(16, '2013-12-04 21:46:57', '2013-12-04 21:53:55', 'T', 3),
(17, '2013-12-04 21:54:22', '2013-12-04 22:10:09', 'T', 3),
(18, '2013-12-04 22:10:29', '2013-12-04 22:10:31', 'T', 3),
(19, '2013-12-04 22:16:58', '2013-12-04 22:17:44', 'P', 1),
(20, '2013-12-04 22:18:03', '2013-12-04 22:19:02', 'T', 1),
(21, '2013-12-04 22:19:09', '2013-12-04 22:19:11', 'P', 1),
(22, '2013-12-04 22:19:28', '2013-12-04 22:19:47', 'T', 1),
(23, '2013-12-04 22:23:13', '2013-12-05 08:53:33', 'T', 1),
(24, '2013-12-05 08:54:08', '2013-12-05 08:54:11', '1', 3),
(25, '2013-12-05 08:54:36', '2013-12-05 08:54:50', 'T', 3),
(26, '2013-12-05 19:22:50', '2013-12-05 19:24:18', 'T', 6),
(27, '2013-12-05 19:24:32', '2013-12-05 19:24:35', 'P', 6),
(28, '2013-12-05 19:24:41', '2013-12-05 19:24:43', 'T', 6),
(29, '2013-12-05 19:24:48', '2013-12-05 19:24:49', 'P', 6),
(30, '2013-12-05 19:25:14', '2013-12-05 19:25:17', 'T', 6),
(31, '2013-12-06 21:14:56', '2013-12-06 21:25:56', 'T', 7),
(32, '2013-12-06 21:26:08', '2013-12-06 21:32:44', 'T', 7),
(33, '2013-12-06 21:33:06', '2013-12-06 21:33:08', 'P', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `empresa` varchar(100) DEFAULT NULL,
  `user` varchar(30) NOT NULL,
  `senha` varchar(35) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `user_UNIQUE` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_usuario`, `nome`, `empresa`, `user`, `senha`) VALUES
(1, 'Willian', 'CCL', 'ottoni', '123'),
(2, 'Andre Malesta', 'T System', 'and', '123'),
(3, 'Igor Knop', 'CES', 'igor', '123');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `tb_atividade_tomato`
--
ALTER TABLE `tb_atividade_tomato`
  ADD CONSTRAINT `fk_tb_atividade_tomato_tb_usuario` FOREIGN KEY (`tb_usuario_id_usuario`) REFERENCES `tb_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `tb_reg_tomato`
--
ALTER TABLE `tb_reg_tomato`
  ADD CONSTRAINT `fk_tb_reg_tomato_tb_atividade_tomato1` FOREIGN KEY (`tb_atividade_tomato_id_atividade_tomato`) REFERENCES `tb_atividade_tomato` (`id_atividade_tomato`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
