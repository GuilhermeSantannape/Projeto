-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Nov-2019 às 17:02
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `wsprodutos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `animal`
--

CREATE TABLE `animal` (
  `id_animal` int(11) NOT NULL,
  `desc_animal` varchar(50) NOT NULL,
  `id_raca` int(11) NOT NULL,
  `dta_nasc` date DEFAULT NULL,
  `sexo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

CREATE TABLE `consulta` (
  `id_consult` int(11) NOT NULL,
  `dta_consult` date NOT NULL,
  `id_pessoa` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id_pessoa` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` int(11) NOT NULL,
  `sexo` int(1) NOT NULL,
  `id_animal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa_animal`
--

CREATE TABLE `pessoa_animal` (
  `id_pessoa` int(11) NOT NULL,
  `id_animal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `imagem` varchar(300) NOT NULL,
  `descricao` text NOT NULL,
  `uso` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `imagem`, `descricao`, `uso`) VALUES
(1, 'Modelo Ragon WZ', 'img/motor-1.jpg', 'Cabeçotes individuais com 4 válvulas por cilindro', 'veicular'),
(2, 'Modelo Ragon TY', 'img/motor-2.jpg', 'Cabeçotes individuais com 4 válvulas por cilindro', 'veicular'),
(3, 'Modelo Delta', 'img/motor-3.jpg', 'Cabeçotes individuais com 6 válvulas por cilindro', 'veicular, maritimo'),
(4, 'Modelo Dyna', 'img/motor-1.jpg', 'Cabeçotes individuais com 4 válvulas por cilindro', 'agricola'),
(5, 'Modelo Tork G1', 'img/motor-2.jpg', 'Cabeçotes individuais com 4 válvulas por cilindro', 'agricola, industrial'),
(6, 'Modelo Tork JA', 'img/motor-3.jpg', 'Cabeçotes individuais com 4 válvulas por cilindro', 'industrial'),
(7, 'Modelo Combo Alfa', 'img/motor-1.jpg', 'Cabeçotes individuais com 4 válvulas por cilindro', 'maritimo'),
(8, 'Modelo Combo Beta', 'img/motor-2.jpg', 'Cabeçotes individuais com 4 válvulas por cilindro', 'maritimo'),
(9, 'GUILHERME PEREIRA SANTANNA', 'asdas', 'asd', 'asd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `raca`
--

CREATE TABLE `raca` (
  `id_raca` int(11) NOT NULL,
  `desc` varchar(50) NOT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_animal`
--

CREATE TABLE `tipo_animal` (
  `id_tipo` int(11) NOT NULL,
  `desc_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `senha`) VALUES
(1, 'guilherme', 'guilherme', '131092');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id_animal`),
  ADD KEY `Fk_raca` (`id_raca`);

--
-- Índices para tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id_pessoa`),
  ADD KEY `Fk` (`id_animal`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `raca`
--
ALTER TABLE `raca`
  ADD PRIMARY KEY (`id_raca`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Índices para tabela `tipo_animal`
--
ALTER TABLE `tipo_animal`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id_pessoa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `raca`
--
ALTER TABLE `raca`
  MODIFY `id_raca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tipo_animal`
--
ALTER TABLE `tipo_animal`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `Fk_raca` FOREIGN KEY (`id_raca`) REFERENCES `raca` (`id_raca`);

--
-- Limitadores para a tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD CONSTRAINT `Fk` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`id_animal`);

--
-- Limitadores para a tabela `raca`
--
ALTER TABLE `raca`
  ADD CONSTRAINT `id_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_animal` (`id_tipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
