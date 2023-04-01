-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Mar-2023 às 02:31
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `controlecpfs`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `controle`
--

CREATE TABLE `controle` (
  `id` int(255) NOT NULL,
  `placa` varchar(255) NOT NULL,
  `logado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `controle`
--

INSERT INTO `controle` (`id`, `placa`, `logado`) VALUES
(17, 'nvidia', '010.451.035-86'),
(18, 'nvidia', '07183028500');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cpf`
--

CREATE TABLE `cpf` (
  `id` int(255) NOT NULL,
  `cpf` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cpf`
--

INSERT INTO `cpf` (`id`, `cpf`) VALUES
(2, '07183028500'),
(4, '010.451.035-86');

-- --------------------------------------------------------

--
-- Estrutura da tabela `supevisor`
--

CREATE TABLE `supevisor` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `supevisor`
--

INSERT INTO `supevisor` (`id`, `email`, `senha`) VALUES
(0, 'adm', '1234');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `controle`
--
ALTER TABLE `controle`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cpf`
--
ALTER TABLE `cpf`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `supevisor`
--
ALTER TABLE `supevisor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `controle`
--
ALTER TABLE `controle`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `cpf`
--
ALTER TABLE `cpf`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
