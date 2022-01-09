-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `processo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_processos`
--

CREATE TABLE `tab_processos` (
  `id` int(11) NOT NULL,
  `nprotocolo` varchar(20) DEFAULT NULL,
  `assunto` text DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `destino` varchar(100) DEFAULT NULL,
  `interessado` varchar(20) DEFAULT NULL,
  `arquivo` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_processos`
--

INSERT INTO `tab_processos` (`id`, `nprotocolo`, `assunto`, `data`, `hora`, `destino`, `interessado`, `arquivo`) VALUES
(5, 'teste14', 'Sed cursus odio diam, lacinia commodo lorem vehicula nec. Quisque pharetra nisl quis suscipit tempus. Nunc sed euismod elit, sed varius mauris', '2022-01-08', '10:02:00', 'BM-4', 'Nome 7', NULL),
(1, '21', 'Fusce laoreet, odio tristique sollicitudin semper, risus eros facilisis lacus, nec posuere arcu lectus in justo. Sed nec consequat mauris. ', '2021-12-27', '12:02:00', 'BM-3', 'Nome 10', NULL),
(2, '1232131', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut convallis dolor, vel sollicitudin enim. Vestibulum eu est in turpis ullamcorper dictum ac nec urna. Praesent quis hendrerit ipsum. Praesent id dictum justo. Donec pretium magna lorem, vel porttitor risus volutpat ut. Nullam eu odio ac eros sollicitudin condimentum sit amet quis sapien. Vestibulum id purus et metus elementum efficitur eu id enim.', '2022-01-07', '21:04:00', 'BM-5', 'Nome 7', NULL),
(3, 'teste12321', 'Duis ex urna, ullamcorper eu tellus vitae, vestibulum tincidunt dolor. Nam posuere risus non ligula lacinia, sed rhoncus justo hendrerit. Vivamus ultrices suscipit quam, vel luctus nunc laoreet vitae. ', '2022-01-06', '12:03:00', 'DSCIP', 'Nome 10', NULL),
(4, 'teste', 'Ut quis mi nec tellus imperdiet convallis. Phasellus maximus, felis vel imperdiet elementum, est mi finibus nibh, et ornare ipsum risus ut nibh', '2022-01-07', '11:12:00', 'BM-10', 'Nome 10', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_protocolo`
--

CREATE TABLE `tab_protocolo` (
  `id` int(11) NOT NULL,
  `nprotocolo` varchar(30) NOT NULL,
  `assunto` text DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `destino` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_protocolo`
--

INSERT INTO `tab_protocolo` (`id`, `nprotocolo`, `assunto`, `data`, `hora`, `destino`, `status`) VALUES
(16, '2022-', 'teste 1', '2022-01-06', '11:01:00', 'Local 1', 'Encaminhado'),
(17, '2022-', 'teste 2', '2022-01-07', '12:02:00', 'Local 2', 'Arquivado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `senha`) VALUES
(9, 'Admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tab_processos`
--
ALTER TABLE `tab_processos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tab_protocolo`
--
ALTER TABLE `tab_protocolo`
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
-- AUTO_INCREMENT de tabela `tab_processos`
--
ALTER TABLE `tab_processos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=495;

--
-- AUTO_INCREMENT de tabela `tab_protocolo`
--
ALTER TABLE `tab_protocolo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
