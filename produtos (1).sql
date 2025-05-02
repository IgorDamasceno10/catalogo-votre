-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Maio-2025 às 08:20
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `catalogo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `descricao` text DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `tem_desconto` tinyint(1) DEFAULT 0,
  `desconto` decimal(10,2) DEFAULT 0.00,
  `preco_desconto` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `descricao`, `imagem`, `tem_desconto`, `desconto`, `preco_desconto`) VALUES
(12, 'Lava Roupas Especial Coco', 30.00, 'À base de coco natural e com branqueador óptico, o que garante delicadeza e alta perfomance na lavagem. Ideal para roupas finas e delicadas.\r\n\r\n \r\n\r\n', '6814238625e8a_lavaroupas.jpg', 0, 0.00, NULL),
(13, 'Limpa vidros Teiú', 19.90, 'Limpa Vidros Teiú elimina sujeiras e manchas, deixando seus vidros cristalinos e sem resíduos.', '681424c19fd2b_vazlimpavidros.jpg', 0, 0.00, NULL),
(14, 'Sabonete Líquido Teiú', 14.90, 'Sabonete Líquido Teiú limpa e hidrata sua pele, com fórmula suave e fragrância refrescante.', '6814257fb7868_saboneteliquidomaran.jpg', 0, 0.00, NULL),
(15, 'Desinfetante Teiú', 12.90, 'Desinfetante Teiú elimina germes e bactérias, deixando seu ambiente limpo e com um frescor duradouro.', '6814260fb5398_teiudesinfetante.jpg', 1, 0.00, 9.90),
(16, 'Inseticida Teiú', 15.90, 'Inseticida Teiú combate rapidamente insetos indesejados, garantindo sua casa livre de pragas com ação eficaz e prolongada.', '681426b0beac8_inseticidateiu.jpg', 1, 0.00, 12.90),
(17, 'Vela Teiú', 19.90, 'Vela Teiú cria um ambiente aconchegante e perfumado, com uma fragrância suave e agradável que dura por horas.', '6814272937c98_velasteiu.jpg', 1, 0.00, 14.90),
(18, 'Multiuso Vatz- 500ml', 12.90, 'ideal para limpeza de diversas superfícies, como bancadas, pisos, móveis e vidros. ', '68144bd3e47c7_multiusovatzlavanda.webp', 0, 0.00, NULL),
(19, 'Sabão de Coco - 500g', 9.90, 'sabão de coco tradicional, ideal para lavar roupas delicadas, limpar superfícies e até para a higiene pessoal. ', '68144c6e30c34_sabaodecocoteiu.jpg', 1, 0.00, 6.90);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
