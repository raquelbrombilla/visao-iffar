-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 13-Nov-2019 às 11:58
-- Versão do servidor: 8.0.15
-- versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `visao_iffar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(10) UNSIGNED NOT NULL,
  `data` datetime NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_publicacao` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curtidas`
--

CREATE TABLE `curtidas` (
  `id_curtida` int(10) UNSIGNED NOT NULL,
  `data` datetime NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_publicacao` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE `imagens` (
  `id_imagem` int(10) UNSIGNED NOT NULL,
  `id_publicacao` int(10) UNSIGNED NOT NULL,
  `endereco` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`id_imagem`, `id_publicacao`, `endereco`) VALUES
(2, 5, '15735939485dcb235caadf0.jpg'),
(3, 6, '15736408305dcbda7e8ae6d.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicao`
--

CREATE TABLE `instituicao` (
  `id_dados` int(11) NOT NULL,
  `descricao` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `publicacao`
--

CREATE TABLE `publicacao` (
  `id_publicacao` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `data` int(255) NOT NULL,
  `ativa` tinyint(1) NOT NULL,
  `id_usuario` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `publicacao`
--

INSERT INTO `publicacao` (`id_publicacao`, `descricao`, `titulo`, `data`, `ativa`, `id_usuario`) VALUES
(5, '', 'ALUNOS CANSADOS ', 2010, 0, 22),
(6, '', 'teste', 2018, 0, 22);

-- --------------------------------------------------------

--
-- Estrutura da tabela `timeline`
--

CREATE TABLE `timeline` (
  `id_timeline` int(10) UNSIGNED NOT NULL,
  `foto` varchar(300) NOT NULL,
  `descricao` varchar(250) NOT NULL,
  `date` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `timeline`
--

INSERT INTO `timeline` (`id_timeline`, `foto`, `descricao`, `date`) VALUES
(1, 'encontro-cafw.jpg', 'Encontro ex-servidores CAFW', 2017),
(3, 'iff.jpg', 'IFFAR-FW', 2018),
(4, 'ru.jpg', 'RESTAURANTE UNIVERSÍTÁRIO', 2019);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(600) NOT NULL,
  `foto` varchar(600) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `email`, `nome`, `senha`, `foto`, `admin`) VALUES
(1, 'raquelbrombilla@hotmail.com', 'Raquel', 'raquel123', NULL, 1),
(4, 'vitoria@gmail.com', 'vitoria', 'lalalala', '', 0),
(5, 'raquel@gmail', 'raquel', 'raquel', '', 0),
(6, 'aa@qq.com', 'aaaa', 'aaa', '', 0),
(7, '', 'Raquel', 'd41d8cd98f00b204e9800998ecf8427e', '', 0),
(9, 'rafabrombilla@yahoo.com.br', 'Raquel', '202cb962ac59075b964b07152d234b70', '15735813395dcaf21b2e712.png', 0),
(10, 'quel@hotmail.com', 'quel', '202cb962ac59075b964b07152d234b70', '15735813895dcaf24d6b70a.png', 0),
(21, 'queeeeeel@gmail.com', 'quel', '202cb962ac59075b964b07152d234b70', 'NULL', 0),
(22, 'teste@teste.com', 'quel', '202cb962ac59075b964b07152d234b70', NULL, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `fk_usuario` (`id_usuario`),
  ADD KEY `fk_id_publicacao` (`id_publicacao`);

--
-- Índices para tabela `curtidas`
--
ALTER TABLE `curtidas`
  ADD PRIMARY KEY (`id_curtida`),
  ADD KEY `fk_id_usuario` (`id_usuario`),
  ADD KEY `id_publicacao` (`id_publicacao`);

--
-- Índices para tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id_imagem`),
  ADD KEY `fk_publicacao` (`id_publicacao`);

--
-- Índices para tabela `publicacao`
--
ALTER TABLE `publicacao`
  ADD PRIMARY KEY (`id_publicacao`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`id_timeline`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `curtidas`
--
ALTER TABLE `curtidas`
  MODIFY `id_curtida` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id_imagem` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `publicacao`
--
ALTER TABLE `publicacao`
  MODIFY `id_publicacao` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `timeline`
--
ALTER TABLE `timeline`
  MODIFY `id_timeline` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_id_publicacao` FOREIGN KEY (`id_publicacao`) REFERENCES `publicacao` (`id_publicacao`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `curtidas`
--
ALTER TABLE `curtidas`
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `id_publicacao` FOREIGN KEY (`id_publicacao`) REFERENCES `publicacao` (`id_publicacao`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `imagens`
--
ALTER TABLE `imagens`
  ADD CONSTRAINT `fk_publicacao` FOREIGN KEY (`id_publicacao`) REFERENCES `publicacao` (`id_publicacao`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `publicacao`
--
ALTER TABLE `publicacao`
  ADD CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
