-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 21-Out-2019 às 00:38
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `categoria`, `alias`, `img`) VALUES
(2, 'Facebook', 'fb,face', 'facebook.png'),
(3, 'WhatsApp', 'wpp,zapzap', 'whatsapp.png'),
(4, 'Instagram', 'insta', 'instagram.jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo_alternativa`
--

CREATE TABLE IF NOT EXISTS `modelo_alternativa` (
  `id` int(11) NOT NULL,
  `id_pergunta` int(11) NOT NULL,
  `img1` varchar(255) NOT NULL,
  `resposta1` tinyint(1) NOT NULL,
  `img2` varchar(255) NOT NULL,
  `resposta2` tinyint(1) NOT NULL,
  `img3` varchar(255) NOT NULL,
  `resposta3` tinyint(1) NOT NULL,
  `img4` varchar(255) NOT NULL,
  `resposta4` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `modelo_alternativa`
--

INSERT INTO `modelo_alternativa` (`id`, `id_pergunta`, `img1`, `resposta1`, `img2`, `resposta2`, `img3`, `resposta3`, `img4`, `resposta4`) VALUES
(1, 3, './img/facebook3pts.jpg', 0, './img/facebookBuscar.png', 0, './img/facebookCompartilhar.jpg', 0, './img/facebookCurtir.jpg', 1),
(2, 5, './img/facebookCompartilhar.jpg', 1, './img/facebookComentar.jpg', 0, './img/facebookCurtir.jpg', 0, './img/facebook3pts.jpg', 0),
(3, 6, './img/instagram.jpeg', 0, './img/facebookRedimensionado.png', 1, './img/playstoreRedimensionado.png', 0, './img/whatsappRedimensionado.png', 0),
(4, 9, './img/facebookRedimensionado.png', 0, './img/instagram.jpeg', 0, './img/whatsappRedimensionado.png', 1, './img/playstoreRedimensionado.png', 0),
(5, 10, './img/setaCimaBaixo.png', 0, './img/setaDirEsq.png', 0, './img/setaEsqDir.png', 1, './img/setaBaixoCima.png', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo_pares`
--

CREATE TABLE IF NOT EXISTS `modelo_pares` (
  `id` int(11) NOT NULL,
  `id_pergunta` int(11) NOT NULL,
  `texto` varchar(255) NOT NULL,
  `resposta` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `modelo_pares`
--

INSERT INTO `modelo_pares` (`id`, `id_pergunta`, `texto`, `resposta`) VALUES
(1, 12, 'Status', 'Foto/vídeo disponível por 24h'),
(2, 12, 'Confirmação de leitura', 'Ícone que mostra se já leu a conversa'),
(5, 12, 'Localização em tempo real', 'Posição durante um período de tempo'),
(6, 12, 'Contatos bloqueados', 'Pessoas que não podem mandar mensagem/ligar'),
(7, 13, 'Todos', 'Qualquer pessoa, mesmo quem não está nos seus contatos'),
(8, 13, 'Meus Contatos', 'Apenas pessoas que você tem o número salvo'),
(9, 13, 'Ninguém', 'Nenhuma pessoa, mesmo quem está nos seus contantos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo_sequencia`
--

CREATE TABLE IF NOT EXISTS `modelo_sequencia` (
  `id` int(11) NOT NULL,
  `id_pergunta` int(11) NOT NULL,
  `texto` varchar(255) NOT NULL,
  `posicao` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `modelo_sequencia`
--

INSERT INTO `modelo_sequencia` (`id`, `id_pergunta`, `texto`, `posicao`) VALUES
(3, 2, 'Selecionar lupa', 1),
(4, 2, 'Digitar nome', 2),
(5, 2, 'Buscar', 3),
(6, 2, 'Selecionar página', 4),
(7, 2, 'Curtir', 5),
(8, 4, 'Escolher publicação', 1),
(9, 4, 'Compartilhar', 2),
(10, 4, 'Escrever mensagem', 3),
(11, 4, 'Compartilhar agora', 4),
(12, 8, 'Localizar ícones no canto superior da tela', 1),
(13, 8, 'Telefone', 2),
(14, 8, 'Conversar com pessoa', 3),
(15, 8, 'Botão vermelho', 4),
(16, 11, 'Três pontinhos', 1),
(17, 11, 'Configurações', 2),
(18, 11, 'Conta', 3),
(19, 11, 'Privacidade', 4),
(20, 14, 'Página inicial', 1),
(21, 14, 'Encontrar publicação', 2),
(22, 14, 'Clicar duas vezes na foto', 3),
(23, 14, 'Verificar coração vermelho', 4),
(24, 15, 'Clicar na lupa', 1),
(25, 15, 'Clicar na barra de busca', 2),
(26, 15, 'Digitar nome da página', 3),
(27, 15, 'Selecionar uma página', 4),
(28, 15, 'Seguir', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pergunta`
--

CREATE TABLE IF NOT EXISTS `pergunta` (
  `id` int(11) NOT NULL,
  `id_video` varchar(11) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `pergunta` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pergunta`
--

INSERT INTO `pergunta` (`id`, `id_video`, `modelo`, `pergunta`) VALUES
(2, 'IAZYoNs7kU4', 'sequencia', 'Selecione a sequência de passos para curtir uma página:'),
(3, 'IAZYoNs7kU4', 'alternativa', 'Selecione o ícone que representa a ação de curtir uma página:'),
(4, 'K1xfGs7pGho', 'sequencia', 'Selecione a sequência de passos para compartilhar uma publicação'),
(5, 'K1xfGs7pGho', 'alternativa', 'Selecione o ícone que representa "Compartilhar":'),
(6, 'cbhTDynLA74', 'alternativa', 'Selecione o ícone do Facebook:'),
(7, 'cbhTDynLA74', 'sequencia', 'Selecione a sequência de passos para alterar a foto de perfil'),
(8, 'rukpFI0pLZ4', 'sequencia', 'Selecione a sequência de passos para realizar uma chamada de voz'),
(9, 'RlJk9Mjpcv0', 'alternativa', 'Selecione o ícone do WhatsApp:'),
(10, 'RlJk9Mjpcv0', 'alternativa', 'Selecione o movimento que deve ser realizado para responder uma mensagem específica:'),
(11, 'L10CJs6pKI4', 'sequencia', 'Selecione a sequência de passos para chegar nas configurações de privacidade:'),
(12, '63jDpRxhGsI', 'pares', 'Toque nos pares de configurações e seus significados:'),
(13, '63jDpRxhGsI', 'pares', 'Toque nos pares de tipos de privacidade e seus significados'),
(14, '7UsZo4wzVZU', 'sequencia', 'Selecione a sequência de passos para curtir uma publicação:'),
(15, 'mUGJkqYFbYA', 'sequencia', 'Selecione a sequência de passos para seguir uma página');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pergunta_pessoa`
--

CREATE TABLE IF NOT EXISTS `pergunta_pessoa` (
  `id_pergunta` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `id_video` varchar(11) NOT NULL,
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
  `id_video` varchar(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `video_aula`
--

INSERT INTO `video_aula` (`id_video`, `id_cat`, `nome`) VALUES
('63jDpRxhGsI', 4, 'Alterar Configurações de Privacidade'),
('7UsZo4wzVZU', 4, 'Curtir uma Publicação'),
('cbhTDynLA74', 2, 'Trocar Foto de Perfil'),
('IAZYoNs7kU4', 2, 'Curtir uma Página'),
('K1xfGs7pGho', 2, 'Compartilhar uma Publicação'),
('L10CJs6pKI4', 3, 'Deletar Mensagem em Conversa'),
('mUGJkqYFbYA', 4, 'Seguir uma Conta'),
('RlJk9Mjpcv0', 3, 'Responder Mensagem Específica'),
('rukpFI0pLZ4', 3, 'Chamada de Voz no WhatsApp');

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
  ADD KEY `fk_va_to_pergunta` (`id_video`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `modelo_alternativa`
--
ALTER TABLE `modelo_alternativa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `modelo_pares`
--
ALTER TABLE `modelo_pares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `modelo_sequencia`
--
ALTER TABLE `modelo_sequencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `pergunta`
--
ALTER TABLE `pergunta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
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
  ADD CONSTRAINT `pergunta_ibfk_3` FOREIGN KEY (`id_video`) REFERENCES `video_aula` (`id_video`);

--
-- Limitadores para a tabela `pergunta_pessoa`
--
ALTER TABLE `pergunta_pessoa`
  ADD CONSTRAINT `pergunta_pessoa_ibfk_1` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id`),
  ADD CONSTRAINT `pergunta_pessoa_ibfk_3` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `pergunta_pessoa_ibfk_4` FOREIGN KEY (`id_video`) REFERENCES `video_aula` (`id_video`);

--
-- Limitadores para a tabela `video_aula`
--
ALTER TABLE `video_aula`
  ADD CONSTRAINT `video_aula_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
