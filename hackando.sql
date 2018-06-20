-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 19-Jun-2018 às 23:57
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `hackando`
--
CREATE DATABASE IF NOT EXISTS `hackando` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hackando`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE IF NOT EXISTS `cidade` (
  `id_cidade` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cidade` varchar(35) NOT NULL,
  `cod_estado` int(11) NOT NULL,
  PRIMARY KEY (`id_cidade`),
  KEY `cod_estado` (`cod_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `componentes`
--

CREATE TABLE IF NOT EXISTS `componentes` (
  `id_componente` int(11) NOT NULL AUTO_INCREMENT,
  `nome_componente` varchar(35) NOT NULL,
  `ip` varchar(35) NOT NULL,
  `cod_cidade` int(11) NOT NULL,
  PRIMARY KEY (`id_componente`),
  KEY `cod_cidade` (`cod_cidade`),
  KEY `id_componente` (`id_componente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `nome_estado` varchar(35) NOT NULL,
  `cod_pais` int(11) NOT NULL,
  PRIMARY KEY (`id_estado`),
  KEY `id_pais` (`cod_pais`),
  KEY `cod_pais` (`cod_pais`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `hackers`
--

CREATE TABLE IF NOT EXISTS `hackers` (
  `id_hacker` int(11) NOT NULL AUTO_INCREMENT,
  `nome_hacker` varchar(35) NOT NULL,
  `paradeiro` varchar(35) NOT NULL,
  `senha` varchar(60) NOT NULL,
  PRIMARY KEY (`id_hacker`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `invasoes`
--

CREATE TABLE IF NOT EXISTS `invasoes` (
  `id_invasoes` int(11) NOT NULL AUTO_INCREMENT,
  `cod_hacker` int(11) NOT NULL,
  `cod_componente` int(11) NOT NULL,
  `status` varchar(35) NOT NULL,
  PRIMARY KEY (`id_invasoes`),
  KEY `cod_hacker` (`cod_hacker`),
  KEY `cod_ip` (`cod_componente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `id_pais` int(11) NOT NULL AUTO_INCREMENT,
  `nome_pais` varchar(35) NOT NULL,
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_componentes`
--
CREATE TABLE IF NOT EXISTS `view_componentes` (
`id_componente` int(11)
,`nome_componente` varchar(35)
,`ip` varchar(35)
,`cod_cidade` int(11)
,`id_cidade` int(11)
,`nome_cidade` varchar(35)
,`cod_estado` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_invasoes`
--
CREATE TABLE IF NOT EXISTS `view_invasoes` (
`id_invasoes` int(11)
,`cod_hacker` int(11)
,`cod_componente` int(11)
,`status` varchar(35)
,`id_hacker` int(11)
,`nome_hacker` varchar(35)
,`paradeiro` varchar(35)
,`senha` varchar(60)
,`id_componente` int(11)
,`nome_componente` varchar(35)
,`ip` varchar(35)
,`cod_cidade` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_locais`
--
CREATE TABLE IF NOT EXISTS `view_locais` (
`id_pais` int(11)
,`nome_pais` varchar(35)
,`id_estado` int(11)
,`nome_estado` varchar(35)
,`cod_pais` int(11)
,`id_cidade` int(11)
,`nome_cidade` varchar(35)
,`cod_estado` int(11)
);
-- --------------------------------------------------------

--
-- Structure for view `view_componentes`
--
DROP TABLE IF EXISTS `view_componentes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_componentes` AS select `componentes`.`id_componente` AS `id_componente`,`componentes`.`nome_componente` AS `nome_componente`,`componentes`.`ip` AS `ip`,`componentes`.`cod_cidade` AS `cod_cidade`,`cidade`.`id_cidade` AS `id_cidade`,`cidade`.`nome_cidade` AS `nome_cidade`,`cidade`.`cod_estado` AS `cod_estado` from (`componentes` join `cidade` on((`componentes`.`cod_cidade` = `cidade`.`id_cidade`)));

-- --------------------------------------------------------

--
-- Structure for view `view_invasoes`
--
DROP TABLE IF EXISTS `view_invasoes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_invasoes` AS select `invasoes`.`id_invasoes` AS `id_invasoes`,`invasoes`.`cod_hacker` AS `cod_hacker`,`invasoes`.`cod_componente` AS `cod_componente`,`invasoes`.`status` AS `status`,`hackers`.`id_hacker` AS `id_hacker`,`hackers`.`nome_hacker` AS `nome_hacker`,`hackers`.`paradeiro` AS `paradeiro`,`hackers`.`senha` AS `senha`,`componentes`.`id_componente` AS `id_componente`,`componentes`.`nome_componente` AS `nome_componente`,`componentes`.`ip` AS `ip`,`componentes`.`cod_cidade` AS `cod_cidade` from ((`invasoes` join `hackers` on((`invasoes`.`cod_hacker` = `hackers`.`id_hacker`))) join `componentes` on((`invasoes`.`cod_componente` = `componentes`.`id_componente`)));

-- --------------------------------------------------------

--
-- Structure for view `view_locais`
--
DROP TABLE IF EXISTS `view_locais`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_locais` AS select `pais`.`id_pais` AS `id_pais`,`pais`.`nome_pais` AS `nome_pais`,`estado`.`id_estado` AS `id_estado`,`estado`.`nome_estado` AS `nome_estado`,`estado`.`cod_pais` AS `cod_pais`,`cidade`.`id_cidade` AS `id_cidade`,`cidade`.`nome_cidade` AS `nome_cidade`,`cidade`.`cod_estado` AS `cod_estado` from ((`pais` join `estado` on((`estado`.`cod_pais` = `pais`.`id_pais`))) join `cidade` on((`cidade`.`cod_estado` = `estado`.`id_estado`)));

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `cidade_ibfk_2` FOREIGN KEY (`cod_estado`) REFERENCES `estado` (`id_estado`);

--
-- Limitadores para a tabela `componentes`
--
ALTER TABLE `componentes`
  ADD CONSTRAINT `componentes_ibfk_1` FOREIGN KEY (`cod_cidade`) REFERENCES `cidade` (`id_cidade`);

--
-- Limitadores para a tabela `estado`
--
ALTER TABLE `estado`
  ADD CONSTRAINT `estado_ibfk_1` FOREIGN KEY (`cod_pais`) REFERENCES `pais` (`id_pais`);

--
-- Limitadores para a tabela `invasoes`
--
ALTER TABLE `invasoes`
  ADD CONSTRAINT `invasoes_ibfk_1` FOREIGN KEY (`cod_hacker`) REFERENCES `hackers` (`id_hacker`),
  ADD CONSTRAINT `invasoes_ibfk_2` FOREIGN KEY (`cod_componente`) REFERENCES `componentes` (`id_componente`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
