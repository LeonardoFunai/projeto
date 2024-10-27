-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/10/2024 às 16:47
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
-- Banco de dados: `naves_alienigenas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `naves`
--

CREATE TABLE `naves` (
  `id` int(11) NOT NULL,
  `tamanho` enum('pequena','média','grande','colossal') NOT NULL,
  `cor` enum('vermelha','laranja','amarela','verde','azul','anil','violeta') NOT NULL,
  `local_queda` enum('continente','oceano') NOT NULL,
  `armamentos` enum('laser','míssil','arma de mao Comum','bomba comum') DEFAULT NULL,
  `tipo_combustivel` enum('antimatéria','hélio-3','materia escura','biocombustivel') NOT NULL,
  `numero_tripulantes` int(11) NOT NULL,
  `estado_tripulantes` enum('sobrevivente','ferido','desaparecido','não identificado','morto') NOT NULL,
  `grau_avaria` enum('perda total','muito destruída','parcialmente destruída','praticamente intacta','sem avarias') NOT NULL,
  `potencial_prospeccao` enum('baixo','médio','alto','muito alto') NOT NULL,
  `grau_periculosidade` enum('muito baixo','baixo','moderado','alto','muito alto') NOT NULL,
  `classificacao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `naves`
--
ALTER TABLE `naves`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `naves`
--
ALTER TABLE `naves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
