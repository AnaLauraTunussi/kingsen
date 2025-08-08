-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/07/2025 às 22:02
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
-- Banco de dados: `kingsen`
--
CREATE DATABASE IF NOT EXISTS `kingsen` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `kingsen`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(2) NOT NULL,
  `nome_cargo` varchar(40) NOT NULL,
  `observacao` varchar(100) DEFAULT NULL,
  `status` bit(1) NOT NULL,
  `data_cadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `nome_cargo`, `observacao`, `status`, `data_cadastro`) VALUES
(1, 'ADM', 'Fundadora da kingsen', b'1', '2025-05-16 14:25:01'),
(2, 'Vendedor', 'vender produtos online e fornecer suporte para a venda dos clientes', b'0', '2025-05-19 13:42:21'),
(3, 'Desenvolvedor', 'responsável por desenvolver todo o sistema kingsen', b'1', '2025-06-12 14:17:21'),
(4, 'Chapisqueiro', 'Chapisca Parede', b'1', '2025-06-25 14:02:41');

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(3) NOT NULL,
  `nome_categoria` varchar(40) DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nome_categoria`, `status`, `data_cadastro`, `descricao`) VALUES
(1, 'Espada de duas mãos', b'1', '2025-05-16 14:27:12', 'espadas grandes e pesadas'),
(2, 'categoria', b'1', '2025-05-16 14:33:23', 'descrição'),
(4, 'categoria foda', b'1', '2025-06-12 14:27:33', 'alguma coisa');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(3) NOT NULL,
  `cep` char(9) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `cidade` varchar(40) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `numero` int(4) DEFAULT NULL,
  `nome` varchar(60) NOT NULL,
  `data_nasc` date NOT NULL,
  `status` bit(1) NOT NULL,
  `sexo` char(1) DEFAULT NULL,
  `senha` char(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nome_social` varchar(50) DEFAULT NULL,
  `tel_residen` char(13) DEFAULT NULL,
  `tel_cell` char(14) DEFAULT NULL,
  `data_cadastro` datetime NOT NULL,
  `endereco` varchar(70) DEFAULT NULL,
  `cpf` char(14) NOT NULL,
  `complemento` varchar(40) DEFAULT NULL,
  `login` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `cep`, `bairro`, `cidade`, `estado`, `numero`, `nome`, `data_nasc`, `status`, `sexo`, `senha`, `email`, `nome_social`, `tel_residen`, `tel_cell`, `data_cadastro`, `endereco`, `cpf`, `complemento`, `login`) VALUES
(4, '44444-444', 'Nossa Senhora das Graças', 'Santo Antônio de Jesus', 'SP', 58, 'Lucas Candido', '1984-05-02', b'1', 'M', '1234', 'lucas@gmail.com', '', '(55)55555-555', '(66)66666-6666', '2025-06-12 14:29:02', 'Rua Via Coletora B', '444.444.444-44', 'complemento', 'lulu'),
(5, '33333-333', 'Castelinho', 'Santo André', 'RS', 521, 'Miguel Ferreira Santos', '1975-05-06', b'1', 'M', 'Senhas12', 'migs@gmail.com', '', '', '(14)99821-2647', '2025-07-08 14:07:21', 'Ladrilinhos Almeida', '777.777.777-77', '', 'Miguel'),
(6, '13254-845', 'Alagoas', 'Maranhão', 'PE', 574, 'Renata Silva Santos', '1984-05-12', b'1', 'F', 'senha123', 'renata@gmail.com', '', '', '(13)99465-4244', '2025-07-08 14:10:02', 'Santo André', '765.575.645-44', '', 'Renata');

-- --------------------------------------------------------

--
-- Estrutura para tabela `contem`
--

CREATE TABLE `contem` (
  `id_produto` int(3) DEFAULT NULL,
  `id_venda` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` int(4) NOT NULL,
  `rg` varchar(12) DEFAULT NULL,
  `cpf` char(14) NOT NULL,
  `sexo` char(1) DEFAULT NULL,
  `nome` varchar(60) DEFAULT NULL,
  `data_nasc` date NOT NULL,
  `nome_social` varchar(60) DEFAULT NULL,
  `estado_civil` varchar(20) DEFAULT NULL,
  `foto` varchar(40) DEFAULT NULL,
  `telef_celular` char(14) DEFAULT NULL,
  `telef_residen` char(13) DEFAULT NULL,
  `status` bit(1) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `usuario` varchar(20) NOT NULL,
  `senha` char(8) DEFAULT NULL,
  `tipo_acesso` bit(1) NOT NULL,
  `numero` int(4) DEFAULT NULL,
  `complemento` varchar(40) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `cidade` varchar(40) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `cep` char(9) DEFAULT NULL,
  `data_cadastro` datetime NOT NULL,
  `salario` decimal(7,2) DEFAULT NULL,
  `id_cargo` int(2) DEFAULT NULL,
  `endereco` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `rg`, `cpf`, `sexo`, `nome`, `data_nasc`, `nome_social`, `estado_civil`, `foto`, `telef_celular`, `telef_residen`, `status`, `email`, `usuario`, `senha`, `tipo_acesso`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `cep`, `data_cadastro`, `salario`, `id_cargo`, `endereco`) VALUES
(1, '56.666.666-6', '777.777.777-77', 'M', 'Breno Forti', '2002-01-19', '', 'casado', 'gandalf_branco.webp', '(19)99999-9999', '', b'1', 'breno.forti@gmail.com', 'breno', 'senha', b'1', 444, 'complemento', 'CECAP', 'Piracicaba', 'SP', '13421-580', '2025-05-16 14:32:42', 30000.00, 3, 'Rua Cabrália Paulista'),
(5, '11.111.111-1', '666.666.666-66', 'M', 'Miguel Ferreira Franco', '2000-08-06', '', 'solteiro', '', '(18)55555-5555', '', b'1', 'chapisqueiro@gmail.com', 'Migs', '1234', b'0', 0, '', 'Malacrabo', 'Morena', 'GO', '66666-666', '2025-06-25 14:04:50', 1500.69, 4, 'Bobos'),
(7, '56.471.085-1', '477.854.738-11', 'F', 'Ana Laura Tunussi Pitombeira', '2005-01-02', '', 'solteiro', 'malenia wallpaper.jpg', '(19)99690-6552', '', b'1', 'ana@gmail.com', 'ana@gmail.com', '321654', b'1', 56, '', 'El Dorado', 'Piracicaba', 'SP', '13421-580', '2025-06-25 14:10:12', 40000.60, 1, 'Cabralia Paulista'),
(8, '45.646.462-4', '756.751.675-46', 'F', 'Danieli Da Silva Santos', '2004-05-28', '', 'Solteiro(a)', '', '(14)54654-6154', '(16)76457-645', b'1', 'danizinha@gmail.com', 'Dani', '55451', b'1', 23, 'Bla', 'Alguma Coisa 2', 'Piracity', 'SP', '12642-146', '2025-06-25 14:13:12', 4500.60, 1, 'Alguma Coisa');

-- --------------------------------------------------------

--
-- Estrutura para tabela `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(3) NOT NULL,
  `nome_marca` varchar(40) DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `marca`
--

INSERT INTO `marca` (`id_marca`, `nome_marca`, `status`, `data_cadastro`, `descricao`) VALUES
(3, 'Iron', b'1', '2025-05-16 16:45:22', 'ferrroo'),
(4, 'super forte', b'1', '2025-05-19 13:40:31', 'sas'),
(5, 'Elden Ring', b'1', '2025-06-12 14:27:15', 'Espadas e armas do mundo de elden ring');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(3) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `nome` varchar(40) NOT NULL,
  `preco_venda` decimal(7,2) NOT NULL,
  `foto` varchar(40) DEFAULT NULL,
  `preco_promocao` decimal(7,2) DEFAULT NULL,
  `estoque` int(3) DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  `preco_custo` decimal(7,2) NOT NULL,
  `lucro` decimal(3,0) NOT NULL,
  `status_promocao` bit(1) DEFAULT NULL,
  `porcentagem` varchar(3) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `id_marca` int(3) DEFAULT NULL,
  `id_categoria` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `descricao`, `nome`, `preco_venda`, `foto`, `preco_promocao`, `estoque`, `status`, `preco_custo`, `lucro`, `status_promocao`, `porcentagem`, `data_cadastro`, `id_marca`, `id_categoria`) VALUES
(17, 'espada do grande pé largo, de nome Aragon', 'Anduril', 1650.00, 'anduril.pnj.webp', 0.00, 300, b'1', 1500.00, 10, b'0', '', '2025-07-04 15:16:51', 3, 1),
(18, 'espada colossal do elden ring, decorativo', 'espada colossal', 2200.00, 'espada_colossal.jpg', 0.00, 200, b'1', 2000.00, 10, b'0', '', '2025-07-04 15:18:03', 5, 1),
(19, 'espada do nosso pequeno hobbit mais amado, frodo', 'Ferroada', 550.00, 'ferroada.pnj.webp', 0.00, 400, b'1', 500.00, 10, b'0', '', '2025-07-04 15:18:47', 3, 2),
(21, 'katana', 'Katana', 1560.00, 'katana.pnj.webp', 0.00, 300, b'1', 1300.00, 20, b'0', '', '2025-07-04 15:31:50', 3, 4),
(23, 'espada do maior bruxo de todos os tempos, decorativa', 'Espada de prata - Gerald', 1760.00, 'espada_gerald.pnj.webp', 0.00, 500, b'1', 1600.00, 10, b'0', '', '2025-07-04 16:43:34', 4, 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `venda`
--

CREATE TABLE `venda` (
  `id_venda` int(3) NOT NULL,
  `hora_vend` datetime NOT NULL,
  `data_cadastro` date NOT NULL,
  `valor_total` decimal(7,2) NOT NULL,
  `id_funcionario` int(4) DEFAULT NULL,
  `id_cliente` int(3) DEFAULT NULL,
  `id_produto` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`),
  ADD UNIQUE KEY `nome_cargo` (`nome_cargo`);

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices de tabela `contem`
--
ALTER TABLE `contem`
  ADD KEY `id_produto` (`id_produto`),
  ADD KEY `id_venda` (`id_venda`);

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- Índices de tabela `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `id_marca` (`id_marca`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Índices de tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `id_funcionario` (`id_funcionario`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `id_venda` int(3) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `contem`
--
ALTER TABLE `contem`
  ADD CONSTRAINT `contem_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`),
  ADD CONSTRAINT `contem_ibfk_2` FOREIGN KEY (`id_venda`) REFERENCES `venda` (`id_venda`);

--
-- Restrições para tabelas `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`);

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`),
  ADD CONSTRAINT `produto_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Restrições para tabelas `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`),
  ADD CONSTRAINT `venda_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
