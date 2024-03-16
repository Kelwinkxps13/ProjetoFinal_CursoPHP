-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 16-Mar-2024 às 16:11
-- Versão do servidor: 8.0.30
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamentos`
--

CREATE TABLE `agendamentos` (
  `id` int NOT NULL,
  `idCliente` int NOT NULL,
  `nomeCliente` varchar(40) NOT NULL,
  `emailCliente` varchar(40) NOT NULL,
  `cpfCliente` varchar(15) NOT NULL,
  `idMedico` int NOT NULL,
  `cargoMedico` varchar(50) NOT NULL,
  `nomeMedico` varchar(50) NOT NULL,
  `cpfMedico` varchar(15) NOT NULL,
  `criadoEm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dataConsulta` timestamp NULL DEFAULT NULL,
  `isDeleted` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `agendamentos`
--

INSERT INTO `agendamentos` (`id`, `idCliente`, `nomeCliente`, `emailCliente`, `cpfCliente`, `idMedico`, `cargoMedico`, `nomeMedico`, `cpfMedico`, `criadoEm`, `dataConsulta`, `isDeleted`) VALUES
(14, 3, 'Jesso', 'jesso@email.com', '60395513305', 6, 'Neurologista', 'Foreman', '12346876954', '2024-03-06 01:25:22', '2024-03-07 21:00:00', NULL),
(15, 2, 'Kelwin Jhackson', 'kelwin@email.com', '12345678902', 6, 'Neurologista', 'Foreman', '12346876954', '2024-03-06 01:32:01', '2024-05-01 20:00:00', NULL),
(17, 2, 'Kelwin Jhackson', 'kelwin@email.com', '12345678902', 6, 'Neurologista', 'Foreman', '12346876954', '2024-03-11 18:18:37', '2024-03-29 23:00:00', NULL),
(18, 3, 'Jesso', 'jesso@email.com', '60395513305', 4, 'Diagnosticador', 'House', '12345678903', '2024-03-15 23:25:41', '2024-03-23 00:00:00', NULL),
(25, 2, 'Kelwin Jhackson', 'kelwin@email.com', '12345678902', 4, 'Diagnosticador', 'House', '12345678903', '2024-03-16 13:59:47', '2024-01-01 23:00:00', NULL),
(27, 2, 'Kelwin Jhackson', 'kelwin@email.com', '12345678902', 4, 'Diagnosticador', 'House', '12345678903', '2024-03-16 14:16:37', '2024-05-01 21:00:00', NULL),
(28, 2, 'Kelwin Jhackson', 'kelwin@email.com', '12345678902', 4, 'Diagnosticador', 'House', '12345678903', '2024-03-16 14:25:58', '2024-04-01 21:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nome` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `tipoAcesso` varchar(10) NOT NULL,
  `cargo` varchar(40) NOT NULL,
  `criadoEm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isDeleted` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `cpf`, `senha`, `tipoAcesso`, `cargo`, `criadoEm`, `isDeleted`) VALUES
(1, 'Adminstrador', 'admin@admin.com', '12345678901', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'admin', '', '2024-03-03 14:21:23', NULL),
(2, 'Kelwin Jhackson', 'kelwin@email.com', '12345678902', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'cliente', '', '2024-03-03 14:21:23', NULL),
(3, 'Jesso', 'jesso@email.com', '60395513305', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'cliente', '', '2024-03-03 14:21:23', NULL),
(4, 'House', 'housemd@email.com', '12345678903', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'medico', 'Diagnosticador', '2024-03-03 14:21:23', NULL),
(6, 'Foreman', 'foreman@email.com', '12346876954', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'medico', 'Neurologista', '2024-03-04 00:22:16', NULL),
(9, 'Cameron', 'cameron@email.com', '12345678905', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'medico', 'Imunologista', '2024-03-06 01:31:16', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
