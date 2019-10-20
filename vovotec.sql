-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 20-Out-2019 às 23:36
-- Versão do servidor: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vovotec`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `categoria`, `alias`, `img`) VALUES
(2, 'Facebook', 'fb', 'facebook.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo_alternativa`
--

CREATE TABLE IF NOT EXISTS `modelo_alternativa` (
  `id` int(11) NOT NULL,
  `id_pergunta` int(11) NOT NULL,
  `img1` varchar(255) NOT NULL,
  `resposta1` varchar(255) NOT NULL,
  `img2` varchar(255) NOT NULL,
  `resposta2` varchar(255) NOT NULL,
  `img3` varchar(255) NOT NULL,
  `resposta3` varchar(255) NOT NULL,
  `img4` varchar(255) NOT NULL,
  `resposta4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo_pares`
--

CREATE TABLE IF NOT EXISTS `modelo_pares` (
  `id` int(11) NOT NULL,
  `id_pergunta` int(11) NOT NULL,
  `texto` varchar(255) NOT NULL,
  `resposta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo_sequencia`
--

CREATE TABLE IF NOT EXISTS `modelo_sequencia` (
  `id` int(11) NOT NULL,
  `id_pergunta` int(11) NOT NULL,
  `texto` varchar(255) NOT NULL,
  `posicao` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `modelo_sequencia`
--

INSERT INTO `modelo_sequencia` (`id`, `id_pergunta`, `texto`, `posicao`) VALUES
(1, 1, 'Home', 1),
(2, 1, 'Fechar', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pergunta`
--

CREATE TABLE IF NOT EXISTS `pergunta` (
  `id` int(11) NOT NULL,
  `id_video` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `pergunta` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pergunta`
--

INSERT INTO `pergunta` (`id`, `id_video`, `id_cat`, `modelo`, `pergunta`) VALUES
(1, 7, 2, 'sequencia', 'Selecione a sequencia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pergunta_pessoa`
--

CREATE TABLE IF NOT EXISTS `pergunta_pessoa` (
  `id_pergunta` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `id_video` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE IF NOT EXISTS `pessoa` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `conhecimento` varchar(255) NOT NULL,
  `flag` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `conhecimento`, `flag`) VALUES
(1, 'Lucas', 'Leigo', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `video_aula`
--

CREATE TABLE IF NOT EXISTS `video_aula` (
  `id_video` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `video_aula`
--

INSERT INTO `video_aula` (`id_video`, `id_cat`, `nome`) VALUES
(7, 2, 'Como mexer no Facebook');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `modelo_alternativa`
--
ALTER TABLE `modelo_alternativa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_to_pergunta` (`id_pergunta`);

--
-- Indexes for table `modelo_pares`
--
ALTER TABLE `modelo_pares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_to_pergunta` (`id_pergunta`);

--
-- Indexes for table `modelo_sequencia`
--
ALTER TABLE `modelo_sequencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_to_pergunta` (`id_pergunta`);

--
-- Indexes for table `pergunta`
--
ALTER TABLE `pergunta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fk_va_to_pergunta` (`id_video`),
  ADD KEY `fk_cat_to_pergunta` (`id_cat`) USING BTREE,
  ADD KEY `id_video` (`id_video`,`id_cat`);

--
-- Indexes for table `pergunta_pessoa`
--
ALTER TABLE `pergunta_pessoa`
  ADD PRIMARY KEY (`id_pergunta`),
  ADD KEY `fk_id_to_pessoa` (`id_pessoa`),
  ADD KEY `fk_id_to_va` (`id_video`) USING BTREE,
  ADD KEY `fk_id_to_cat` (`id_cat`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `video_aula`
--
ALTER TABLE `video_aula`
  ADD PRIMARY KEY (`id_video`),
  ADD KEY `fk_cat_to_video` (`id_cat`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `modelo_alternativa`
--
ALTER TABLE `modelo_alternativa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `modelo_pares`
--
ALTER TABLE `modelo_pares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `modelo_sequencia`
--
ALTER TABLE `modelo_sequencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pergunta`
--
ALTER TABLE `pergunta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pergunta_pessoa`
--
ALTER TABLE `pergunta_pessoa`
  MODIFY `id_pessoa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `video_aula`
--
ALTER TABLE `video_aula`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `modelo_alternativa`
--
ALTER TABLE `modelo_alternativa`
  ADD CONSTRAINT `modelo_alternativa_ibfk_1` FOREIGN KEY (`id_pergunta`) REFERENCES `pergunta` (`id`);

--
-- Limitadores para a tabela `modelo_pares`
--
ALTER TABLE `modelo_pares`
  ADD CONSTRAINT `modelo_pares_ibfk_1` FOREIGN KEY (`id_pergunta`) REFERENCES `pergunta` (`id`);

--
-- Limitadores para a tabela `modelo_sequencia`
--
ALTER TABLE `modelo_sequencia`
  ADD CONSTRAINT `modelo_sequencia_ibfk_1` FOREIGN KEY (`id_pergunta`) REFERENCES `pergunta` (`id`);

--
-- Limitadores para a tabela `pergunta`
--
ALTER TABLE `pergunta`
  ADD CONSTRAINT `pergunta_ibfk_1` FOREIGN KEY (`id_video`) REFERENCES `video_aula` (`id_video`),
  ADD CONSTRAINT `pergunta_ibfk_2` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id`);

--
-- Limitadores para a tabela `pergunta_pessoa`
--
ALTER TABLE `pergunta_pessoa`
  ADD CONSTRAINT `pergunta_pessoa_ibfk_1` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id`),
  ADD CONSTRAINT `pergunta_pessoa_ibfk_2` FOREIGN KEY (`id_video`) REFERENCES `video_aula` (`id_video`),
  ADD CONSTRAINT `pergunta_pessoa_ibfk_3` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id`);

--
-- Limitadores para a tabela `video_aula`
--
ALTER TABLE `video_aula`
  ADD CONSTRAINT `video_aula_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
