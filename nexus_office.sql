-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/11/2024 às 15:01
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `nexus_office`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `nacionalidade` varchar(50) NOT NULL,
  `estado_civil` varchar(50) NOT NULL,
  `profissao` varchar(50) NOT NULL,
  `cep` varchar(50) NOT NULL,
  `numero_da_casa` varchar(4) DEFAULT NULL,
  `data_nascimento` date NOT NULL,
  `telefone_fixo` varchar(10) NOT NULL,
  `celular` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `logradouro` varchar(100) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `anexos` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `cpf`, `nacionalidade`, `estado_civil`, `profissao`, `cep`, `numero_da_casa`, `data_nascimento`, `telefone_fixo`, `celular`, `email`, `logradouro`, `bairro`, `cidade`, `estado`, `anexos`) VALUES
(1, 'a', '000.000.000', '0', '0', '0', '44090-012', '1', '1997-09-25', '(22) 2222-', '(22) 22222-', 'ajdj@email.com', 'Rua Taquari', 'Tomba', 'Feira de Santana', 'BA', NULL),
(3, 'aa', '555.555.555', 'a', '2', '2', '44090-012', '12', '9111-01-25', '(55) 5555-', '(55) 55555-', 'ajdk@gmail.com', 'Rua Taquari', 'Tomba', 'Feira de Santana', 'BA', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `perfil` enum('secretária','advogado') NOT NULL,
  `numero_oab` varchar(8) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `telefone` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `sobrenome`, `perfil`, `numero_oab`, `email`, `senha`, `telefone`) VALUES
(1, 'teste1', 'teste', 'secretária', NULL, 'teste@email.com', '$2y$10$cXU7m3xRldKaG2Z5rc0Xj.rimOT1tUho62XYBtl7mytxYjPzsggRO', '(00) 00000-'),
(2, 'teste2', 'teste', 'advogado', 'BA345678', 'teste2@email.com', '$2y$10$OoFQ2R35WB6vPHUZjEG0I.lTnTrLKBJRypvh7O2RQ2NAXqF.4efGy', '(11) 11111-');

-- --------------------------------------------------------

--
-- Estrutura para tabela `processos`
--

CREATE TABLE `processos` (
  `id` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `horario` time DEFAULT NULL,
  `numero_processo` varchar(50) DEFAULT NULL,
  `vara` varchar(100) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `processos`
--

INSERT INTO `processos` (`id`, `data`, `horario`, `numero_processo`, `vara`, `cliente_id`) VALUES
(1, '2024-11-22', '12:05:00', '123456766444', '12', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tarefas`
--

CREATE TABLE `tarefas` (
  `id` int(11) NOT NULL,
  `nome_tarefa` varchar(100) DEFAULT NULL,
  `data_tarefa` date DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `mensagem_alerta` varchar(255) DEFAULT NULL,
  `usuario_responsavel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tarefas`
--

INSERT INTO `tarefas` (`id`, `nome_tarefa`, `data_tarefa`, `descricao`, `mensagem_alerta`, `usuario_responsavel`) VALUES
(1, 'aaa', '2025-09-25', 'aaaa', 'aaaa', 2),
(2, 'aaa', '2025-09-25', 'aaaa', 'aaaa', 2),
(3, 'aaaaa', '2024-11-13', 'aaa', 'aaaa', 2),
(4, 'aa', '2024-11-15', 'aa', 'aaaa', 2),
(5, 'aasd', '2024-11-13', 'sadas', 'asdsa', 2),
(6, 'rrrrrrraaaaaaaa', '2024-11-14', 'asd', 'aaaa', 2),
(7, 'rrrrrrraaaaaaaa', '2024-11-14', 'asd', 'aaaa', 2),
(8, 't', '2024-11-16', 'ttt', 'ttt', 2),
(12, 'qqq', '2024-11-21', 'tttt', 'tttt', NULL),
(13, 'b', '2024-11-21', 'bb', 'bb', 2),
(14, 'b', '2024-11-21', 'bb', 'bb', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `processos`
--
ALTER TABLE `processos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Índices de tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_responsavel` (`usuario_responsavel`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `processos`
--
ALTER TABLE `processos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `processos`
--
ALTER TABLE `processos`
  ADD CONSTRAINT `processos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);

--
-- Restrições para tabelas `tarefas`
--
ALTER TABLE `tarefas`
  ADD CONSTRAINT `tarefas_ibfk_1` FOREIGN KEY (`usuario_responsavel`) REFERENCES `funcionarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
