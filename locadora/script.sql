-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Jan-2023 às 02:59
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `locadora`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_imoveis`
--

CREATE TABLE `tb_imoveis` (
  `id` int(11) NOT NULL,
  `tipo_id` int(1) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `endereco` varchar(300) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `valor` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_imoveis`
--

INSERT INTO `tb_imoveis` (`id`, `tipo_id`, `descricao`, `endereco`, `numero`, `cep`, `bairro`, `municipio`, `uf`, `valor`) VALUES
(12, 1, 'Primeiro UPDATE', 'Rua Francisco Lucindo Fonseca', '75', '33030-290', 'Nossa Senhora das Graças', 'Santa Luzia', 'MG', '15002'),
(24, 2, 'Casa da esquina', 'Rua Francisco Lucindo Fonseca', '75', '33030-290', 'Nossa Senhora das Graças', 'Santa Luzia', 'MG', '2000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo`
--

CREATE TABLE `tb_tipo` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_tipo`
--

INSERT INTO `tb_tipo` (`id`, `descricao`) VALUES
(1, 'Apartamento'),
(2, 'Casa'),
(3, 'Loja');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_imoveis`
--
ALTER TABLE `tb_imoveis`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_tipo`
--
ALTER TABLE `tb_tipo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_imoveis`
--
ALTER TABLE `tb_imoveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `tb_tipo`
--
ALTER TABLE `tb_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
