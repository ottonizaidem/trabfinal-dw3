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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tb_atividade_tomato`
--

INSERT INTO `tb_atividade_tomato` (`id_atividade_tomato`, `descricao`, `tb_usuario_id_usuario`) VALUES
(1, '', 1),
(2, 'Cadastro de Atividades 2', 1),
(3, 'Teste de Redirect', 1),
(4, 'Teste de Redirect2', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_usuario`, `nome`, `empresa`, `user`, `senha`) VALUES
(1, 'Willian', 'CCL', 'ottoni', '123');

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
