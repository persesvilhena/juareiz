-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.15
-- Versão do PHP: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `juareiz`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nomefoto` varchar(255) DEFAULT NULL,
  `us` varchar(255) DEFAULT NULL,
  `usn` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `album`
--

INSERT INTO `album` (`id`, `nomefoto`, `us`, `usn`, `nome`) VALUES
(11, '', '6', 'Leonardo', '9c7f922452bd53e966269a50dd5e4fd1.jpg'),
(14, '', '4', 'perses', '048a92c52eeecfb4fbef3a1c294de58e.'),
(13, '', '4', 'perses', 'c636106b3d9ff83f0eadfaf25afe13be.'),
(12, '', '4', 'perses', '4c402105ef4c92c96689efe8126778e2.'),
(15, '', '4', 'perses', 'ab39ef9b811d84fb3c2066a8adc69e5b.'),
(16, '', '4', 'perses', '44f89428b2d0009f605d6f91cf6d8681.bmp');

-- --------------------------------------------------------

--
-- Estrutura da tabela `amigos`
--

CREATE TABLE IF NOT EXISTS `amigos` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `us1` varchar(255) NOT NULL,
  `us2` varchar(255) NOT NULL,
  `us1name` varchar(255) NOT NULL,
  `us2name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Extraindo dados da tabela `amigos`
--

INSERT INTO `amigos` (`id`, `us1`, `us2`, `us1name`, `us2name`) VALUES
(15, '4', '10', 'perses', 'mauro'),
(16, '10', '4', 'mauro', 'perses'),
(17, '4', '4', 'perses', 'perses'),
(19, '4', '6', 'Perses', 'Leonardo'),
(20, '6', '4', 'Leonardo', 'Perses'),
(21, '8', '8', 'perses1', 'perses1'),
(22, '15', '15', 'perses2', 'perses2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `us` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `com_news`
--

CREATE TABLE IF NOT EXISTS `com_news` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `us` varchar(255) DEFAULT NULL,
  `usn` varchar(255) DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL,
  `newsid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `com_news`
--

INSERT INTO `com_news` (`id`, `us`, `usn`, `msg`, `newsid`) VALUES
(1, '4', 'perses', 'teste', '2'),
(2, '4', 'perses', 'porra, funcionaaaaaa', '2'),
(3, '4', 'perses', 'teste', '1'),
(4, '4', 'perses', 'teste', '3'),
(5, '4', 'perses', 'novo', '3'),
(6, '4', 'perses', 'testando site....', '3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `com_post`
--

CREATE TABLE IF NOT EXISTS `com_post` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) DEFAULT NULL,
  `us` varchar(255) DEFAULT NULL,
  `usn` varchar(255) DEFAULT NULL,
  `com` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `com_post`
--

INSERT INTO `com_post` (`id`, `uid`, `us`, `usn`, `com`) VALUES
(1, '5', '10', 'mauro sergio', 'dasdasda'),
(2, '5', '10', 'mauro sergio', 'testa'),
(3, '5', '4', 'Perses', 'asdsada'),
(4, '5', '4', 'Perses', 'fdsfsdfs'),
(5, '1', '4', 'Perses', 'asdasdas'),
(6, '1', '4', 'Perses', 'asdasda'),
(7, '1', '4', 'Perses', 'sdasd'),
(8, '8', '6', 'Leonardo', 'dfsfds');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE IF NOT EXISTS `contato` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`id`, `nome`, `email`, `msg`) VALUES
(1, 'perses', 'persesvilhena@gmail.com', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `convite`
--

CREATE TABLE IF NOT EXISTS `convite` (
  `deid` varchar(255) NOT NULL,
  `paraid` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`deid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `convite`
--

INSERT INTO `convite` (`deid`, `paraid`, `desc`, `nome`) VALUES
('4', '4', 'aaaa', 'perses');

-- --------------------------------------------------------

--
-- Estrutura da tabela `convite2`
--

CREATE TABLE IF NOT EXISTS `convite2` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `deid` varchar(255) NOT NULL,
  `paraid` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `nome1` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Extraindo dados da tabela `convite2`
--

INSERT INTO `convite2` (`id`, `deid`, `paraid`, `descricao`, `nome1`, `nome`) VALUES
(21, '4', '10', '', 'perses', 'perses'),
(23, '4', '4', '', 'perses', 'perses'),
(24, '10', '13', '', 'mauro', 'mauro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `erros`
--

CREATE TABLE IF NOT EXISTS `erros` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `erro` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `erros`
--

INSERT INTO `erros` (`id`, `nome`, `email`, `erro`) VALUES
(1, 'perses', 'persesvilhena@gmail.com', 'nenhum erro'),
(2, 'teste', 'aaaaaaaaa', 'aaaaaaa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `file` varchar(255) DEFAULT NULL,
  `us` varchar(255) DEFAULT NULL,
  `usn` varchar(255) DEFAULT NULL,
  `nomearquivo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `msg`
--

CREATE TABLE IF NOT EXISTS `msg` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `deid` varchar(255) DEFAULT NULL,
  `paraid` varchar(255) DEFAULT NULL,
  `assunto` varchar(255) DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `msg`
--

INSERT INTO `msg` (`id`, `deid`, `paraid`, `assunto`, `msg`, `nome`) VALUES
(2, '14', '10', 'eeeeeeee', 'terjinhu, eu sou gayy', 'silas'),
(3, '14', '6', 'assunta', 'aiii', 'silas'),
(4, '', '', 'aaaaaaaa', 'aaaaaaaa', 'perses');

-- --------------------------------------------------------

--
-- Estrutura da tabela `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `news`
--

INSERT INTO `news` (`id`, `nome`, `autor`, `msg`) VALUES
(1, 'persesteste', 'perses', 'msg'),
(2, 'novo', 'perses', 'msg'),
(3, 'novooaaaaaaaaaa', 'perses', 'aaaaaaaa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `us` varchar(255) DEFAULT NULL,
  `usn` varchar(255) DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL,
  `assunto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`id`, `us`, `usn`, `msg`, `assunto`) VALUES
(11, '4', 'perses', 'negrito\r\nteste', 'aaaaaaaa'),
(10, '4', 'perses', 'zczxcaaaa', 'dasdsa'),
(9, '4', 'perses', 'teste teste\r\n', 'aaaaaaaaaaaaa'),
(8, '6', 'Leonardo', 'aaaaaaaa', 'teste'),
(12, '6', 'Leonardo', 'nada', 'aaaaaaaaaa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `shows`
--

CREATE TABLE IF NOT EXISTS `shows` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `data` varchar(255) NOT NULL,
  `local` varchar(255) NOT NULL,
  `preco` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `shows`
--

INSERT INTO `shows` (`id`, `data`, `local`, `preco`) VALUES
(1, '23/12/2011', 'Muzambinho,CENTRO', 'gratuito'),
(2, '30/12/2011', 'teste', 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `teste`
--

CREATE TABLE IF NOT EXISTS `teste` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `data` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `teste`
--

INSERT INTO `teste` (`id`, `nome`, `msg`, `data`) VALUES
(1, 'perses', 'teste', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `topicos`
--

CREATE TABLE IF NOT EXISTS `topicos` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `data` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `usautor` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `topicos`
--

INSERT INTO `topicos` (`id`, `nome`, `autor`, `data`, `descricao`, `usautor`) VALUES
(1, 'teste', '', '20:51:23 - 30/01/2012', 'aaaaaa', NULL),
(2, 'novo topico', 'Perses/>\r\n        \r\n      \r\n      \r\n        \r\n        \r\n          ', '', 'aaaaaaaa', ''),
(3, 'teste2', 'Perses', '', 'aaaaaaa', '4/>\r\n        \r\n      \r\n      \r\n        \r\n        \r\n          '),
(4, 'teste3', 'Perses', '17:11:30 - 31/01/2012', 'aaaaaaaaa', '4');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users1`
--

CREATE TABLE IF NOT EXISTS `users1` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nome1` varchar(255) NOT NULL,
  `descricao1` varchar(255) NOT NULL,
  `nome2` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `users1`
--

INSERT INTO `users1` (`id`, `nome`, `senha`, `email`, `nome1`, `descricao1`, `nome2`, `foto`) VALUES
(4, 'perses', 'teste', 'persesvilhena@gmail.com', 'Perses', 'PHP', 'De Vilhena', '7d0ba5d3233a2cb95c85c0131ed48699.jpg'),
(6, 'Leonardo', 'pepigay', 'leo_bjc@yahoo.com.br', '<span class=adm><strong>Leonardo</strong></span>', 'Irm?o do Perses', '<span class=adm><strong>Vilhena</strong></span>', '6e8425d99ff3818acec8bbba9bd11d6c.jpg'),
(7, 'Paula', '123456', 'aninha-muz@hotmail.com', 'Anna Paula Guida', 'nada', '', 'anon/anon.jpg'),
(8, 'perses1', 'teste', 'aaaaaaaaaaaaaaa1', 'azaaaaaaaaaaa', 'aaaaaaaaaaa', '', 'anon/anon.jpg'),
(9, 'teste', 'senha', '$email', '$nome1', '$descricao1', '$nome2', 'anon/anon.jpg'),
(10, 'mauro', '2587', 'num tem', 'mauro sergio', 'fofinho e boin', 'almeida bueno filho', 'anon/anon.jpg'),
(11, 'nariz', '123', 'matheusa', 'matheusa', 'aaaa', 'gay', 'anon/anon.jpg'),
(12, 'pepi', 'pepi', 'silviaantoniaguida@gmail.com', '<span class=adm><strong>Silvia</strong></span>', 'mamae', '<span class=adm><strong>Guida</strong></span>', 'anon/anon.jpg'),
(13, 'novouser', 'teste', 'persesvilhena01@gmail.com', 'Teste', 'nenhum', 'teste', 'anon/anon.jpg'),
(14, 'silas', 'gay', 'gay', 'Silas', 'muito Gay', 'Gay', 'anon/anon.jpg'),
(15, 'perses2', 'teste', 'testeaaa', 'Perses', 'PHP', 'Vilhena', 'anon/anon.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
