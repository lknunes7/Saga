-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/10/2024 às 16:39
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
-- Banco de dados: `sitehotel_bd`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `reserva`
--

CREATE TABLE `reserva` (
  `Codigo` int(255) NOT NULL,
  `TipoQuarto` varchar(200) NOT NULL,
  `CheckIn` date NOT NULL,
  `CheckOut` date NOT NULL,
  `NumAdultos` int(10) NOT NULL,
  `NumCriancas` int(10) NOT NULL,
  `Nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `reserva`
--

INSERT INTO `reserva` (`Codigo`, `TipoQuarto`, `CheckIn`, `CheckOut`, `NumAdultos`, `NumCriancas`, `Nome`) VALUES
(9, 'domo', '2024-10-01', '2024-10-02', 2, 0, 'Bruno'),
(10, 'suite', '2024-10-08', '2024-10-09', 2, 0, 'Lucas'),
(11, 'domo', '2024-10-15', '2024-10-16', 2, 0, 'Lucas'),
(12, 'domo', '2024-10-03', '2024-10-15', 2, 0, 'Ana'),
(13, 'domo', '2024-10-03', '2024-10-04', 2, 0, 'Josemar'),
(14, 'charrua', '2024-10-04', '2024-10-05', 2, 1, 'Josemar');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `Codigo` int(11) NOT NULL,
  `Nome` varchar(200) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Senha` varchar(50) NOT NULL,
  `Telefone` varchar(15) NOT NULL,
  `DataNascimento` date NOT NULL,
  `Descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`Codigo`, `Nome`, `Email`, `Senha`, `Telefone`, `DataNascimento`, `Descricao`) VALUES
(9, 'Bruno', 'bruno@gmail.com', '202cb962ac59075b964b07152d234b70', '(31) 12345-6789', '2001-01-01', ''),
(13, 'Lucas', 'lucas@gmail.com', '202cb962ac59075b964b07152d234b70', '(31) 12345-6789', '2024-10-01', ''),
(15, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '(31) 12345-6789', '2004-01-04', ''),
(16, 'Ana', 'ana@gmail.com', '202cb962ac59075b964b07152d234b70', '(31) 12345-6789', '2024-10-03', ''),
(17, 'Josemar', 'josemar@gmail.com', '202cb962ac59075b964b07152d234b70', '(31) 12345-6789', '2024-10-03', ''),
(18, 'Luciano', 'luciano@gmail.com', '202cb962ac59075b964b07152d234b70', '(31) 91234-5678', '1972-04-27', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`Codigo`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Codigo`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `reserva`
--
ALTER TABLE `reserva`
  MODIFY `Codigo` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
