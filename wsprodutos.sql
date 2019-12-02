-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Dez-2019 às 02:45
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
-- Estrutura da tabela `animais`
--

CREATE TABLE `animais` (
  `id_animal` int(11) NOT NULL,
  `desc_animal` varchar(50) NOT NULL,
  `id_raca` int(11) NOT NULL,
  `dta_nasc` date NOT NULL,
  `sexo` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `animais`
--

INSERT INTO `animais` (`id_animal`, `desc_animal`, `id_raca`, `dta_nasc`, `sexo`) VALUES
(1, 'belinha1', 3, '2019-12-01', 'M'),
(2, 'belinha2', 1, '2019-12-01', 'M'),
(3, 'GUILHERME PEREIRA SANTANNA3', 3, '2019-12-01', 'F'),
(4, 'a4', 0, '2019-12-01', 'M'),
(5, 'a5', 0, '2019-12-01', 'M'),
(6, 'barara]', 0, '0000-00-00', ''),
(7, 'GUILHERME P', 0, '2019-12-01', 't'),
(8, 'perna curta', 1, '1994-05-25', 'a'),
(9, 'madona', 2, '2019-12-01', 'F'),
(10, 'chuck', 2, '2019-12-01', 'M'),
(11, 'budemina', 2, '2019-12-01', 'M'),
(12, 'GUILHERME PEREIRA SANTANNA', 1, '1994-05-25', 'a'),
(13, 'GUILHERME ', 0, '2019-12-04', 'a');

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
(1, 'Modelo Ragon WZasdd', 'img/motor-1.jpg', 'Cabeçotes individuais com 4 válvulas por cilindro', 'veicular'),
(2, 'Modelo Ragon TY', 'img/motor-2.jpg', 'Cabeçotes individuais com 4 válvulas por cilindro', 'veicular'),
(3, 'Modelo Delta', 'img/motor-3.jpg', 'Cabeçotes individuais com 6 válvulas por cilindro', 'veicular, maritimo'),
(4, 'Modelo Dyna', 'img/motor-1.jpg', 'Cabeçotes individuais com 4 válvulas por cilindro', 'agricola'),
(5, 'Modelo Tork G1', 'img/motor-2.jpg', 'Cabeçotes individuais com 4 válvulas por cilindro', 'agricola, industrial'),
(6, 'Modelo Tork JA', 'img/motor-3.jpg', 'Cabeçotes individuais com 4 válvulas por cilindro', 'industrial'),
(7, 'Modelo Combo Alfa', 'img/motor-1.jpg', 'Cabeçotes individuais com 4 válvulas por cilindro', 'maritimo'),
(8, 'Modelo Combo Beta', 'img/motor-2.jpg', 'Cabeçotes individuais com 4 válvulas por cilindro', 'maritimo'),
(9, 'GUILHERME PEREIRA SANTANNA', 'asdas', 'asd', 'asd'),
(11, 'GUILHERME PEREIRA SANTANNA', 's', 's', 's'),
(12, 'Modelo Ragon WZ', 'img/motor-1.jpg', 'Cabeçotes individuais com 4 válvulas por cilindro', 'veicular');

-- --------------------------------------------------------

--
-- Estrutura da tabela `raca`
--

CREATE TABLE `raca` (
  `id_raca` int(11) NOT NULL,
  `desc` varchar(50) NOT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `raca`
--

INSERT INTO `raca` (`id_raca`, `desc`, `id_tipo`) VALUES
(1, 'labrador', 1),
(2, 'ragdoll', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_animal`
--

CREATE TABLE `tipo_animal` (
  `id_tipo` int(11) NOT NULL,
  `desc_tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_animal`
--

INSERT INTO `tipo_animal` (`id_tipo`, `desc_tipo`) VALUES
(1, 'cachorro'),
(2, 'gato');

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
-- Índices para tabela `animais`
--
ALTER TABLE `animais`
  ADD PRIMARY KEY (`id_animal`);

--
-- Índices para tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id_pessoa`);

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
-- AUTO_INCREMENT de tabela `animais`
--
ALTER TABLE `animais`
  MODIFY `id_animal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id_pessoa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `raca`
--
ALTER TABLE `raca`
  MODIFY `id_raca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tipo_animal`
--
ALTER TABLE `tipo_animal`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
