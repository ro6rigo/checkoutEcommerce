-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 30/09/2019 às 20:23
-- Versão do servidor: 8.0.17
-- Versão do PHP: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbVendas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE `vendas` (
  `cod` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `tid` varchar(30) NOT NULL,
  `paymentId` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `vendas`
--

INSERT INTO `vendas` (`cod`, `id`, `tid`, `paymentId`) VALUES
(3, 123, '0925113654512', '647689de-af38-470a-975d-84e15bb56622'),
(4, 123, '0926120047294', '07d663d6-3f3c-459b-937b-b17dbe801d1f'),
(5, 123, '0926120115156', '1378c79b-29df-48f7-9abb-70c6e0720138'),
(6, 123, '0926120442646', '638525c5-caf0-43ab-a921-46f021c2fe6a'),
(7, 123, '0926120627717', '83d141f8-46fb-45d2-acb0-5f9bafc9e8fc'),
(8, 123, '0926121537493', 'ecbd2cbd-93b9-47ad-a24b-5833c6c08be5'),
(9, 123, '0926102056334', 'f3cdb85f-d6bf-4921-8e23-e4a6e0bfc565'),
(10, 123, '0926093651406', 'cfd9204c-dd44-49f5-bd8e-8dfca4fc01ba');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `cod` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
