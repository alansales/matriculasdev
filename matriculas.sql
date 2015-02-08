-- phpMyAdmin SQL Dump
-- version 2.8.1
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tempo de Geração: Fev 08, 2015 as 11:46 AM
-- Versão do Servidor: 5.0.21
-- Versão do PHP: 5.1.4
-- 
-- Banco de Dados: `metasmatricula`
-- 

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `matriculas`
-- 

CREATE TABLE `matriculas` (
  `matricula_id` int(11) NOT NULL auto_increment,
  `data` varchar(50) character set latin1 NOT NULL,
  `quantidade` varchar(50) character set latin1 NOT NULL,
  `tipo` varchar(60) character set latin1 NOT NULL,
  PRIMARY KEY  (`matricula_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

-- 
-- Extraindo dados da tabela `matriculas`
-- 

INSERT INTO `matriculas` VALUES (1, '08/02/2015', '100', '');
INSERT INTO `matriculas` VALUES (2, '07/02/2015', '10', '');
INSERT INTO `matriculas` VALUES (3, '04/01/2015', '12', '');
INSERT INTO `matriculas` VALUES (4, '22/01/2015', '100', '');
INSERT INTO `matriculas` VALUES (5, '30/01/2015', '10', '');
