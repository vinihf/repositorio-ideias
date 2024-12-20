-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/11/2024 às 12:58
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
-- Banco de dados: `repositorio_ideias`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `artefatos`
--

CREATE TABLE `artefatos` (
  `id_artefato` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `artefatos`
--

INSERT INTO `artefatos` (`id_artefato`, `descricao`) VALUES
(1, 'Software funcional'),
(2, 'Revisão sistemática'),
(3, 'Artigo científico'),
(4, 'Prótotipo'),
(5, 'Resumo'),
(6, 'Apresentação');

-- --------------------------------------------------------

--
-- Estrutura para tabela `disciplinas`
--

CREATE TABLE `disciplinas` (
  `id_disciplina` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `disciplinas`
--

INSERT INTO `disciplinas` (`id_disciplina`, `descricao`) VALUES
(1, 'Programação'),
(2, 'Fundamentos da computação'),
(3, 'Banco de dados'),
(4, 'Redes de computadores'),
(5, 'Práticas de hardware e software'),
(6, 'Informática instrumental');

-- --------------------------------------------------------

--
-- Estrutura para tabela `materiais`
--

CREATE TABLE `materiais` (
  `id_material` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `materiais`
--

INSERT INTO `materiais` (`id_material`, `descricao`) VALUES
(1, 'Caderno de campo'),
(2, 'Computador'),
(3, 'Internet'),
(4, 'Impressora');

-- --------------------------------------------------------

--
-- Estrutura para tabela `projetos`
--

CREATE TABLE `projetos` (
  `id_projeto` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `ancora` text NOT NULL,
  `questao_motriz` text NOT NULL,
  `metodologia` text NOT NULL,
  `avaliacao` text NOT NULL,
  `referencias` text NOT NULL,
  `organizacao` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `projetos_artefatos`
--

CREATE TABLE `projetos_artefatos` (
  `id_projeto` int(11) NOT NULL,
  `id_artefato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `projetos_disciplinas`
--

CREATE TABLE `projetos_disciplinas` (
  `id_projeto` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `projetos_materiais`
--

CREATE TABLE `projetos_materiais` (
  `id_projeto` int(11) NOT NULL,
  `id_material` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `projetos_temas`
--

CREATE TABLE `projetos_temas` (
  `id_projeto` int(11) NOT NULL,
  `id_tema` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `temas`
--

CREATE TABLE `temas` (
  `id_tema` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `temas`
--

INSERT INTO `temas` (`id_tema`, `descricao`, `img`) VALUES
(1, 'Erradicação da pobreza', 'https://brasil.un.org/profiles/undg_country/themes/custom/undg/images/SDGs/pt-br/SDG-1.svg'),
(2, 'Erradicação da fome', 'https://brasil.un.org/profiles/undg_country/themes/custom/undg/images/SDGs/pt-br/SDG-2.svg'),
(3, 'Saúde e Bem-Estar', 'https://brasil.un.org/profiles/undg_country/themes/custom/undg/images/SDGs/pt-br/SDG-3.svg'),
(4, 'Educação de qualidade', 'https://brasil.un.org/profiles/undg_country/themes/custom/undg/images/SDGs/pt-br/SDG-4.svg'),
(5, 'Igualdade de gênero', 'https://brasil.un.org/profiles/undg_country/themes/custom/undg/images/SDGs/pt-br/SDG-5.svg'),
(6, 'Água Potável e Saneamento', 'https://brasil.un.org/profiles/undg_country/themes/custom/undg/images/SDGs/pt-br/SDG-6.svg'),
(7, 'Energia acessível e limpa', 'https://brasil.un.org/profiles/undg_country/themes/custom/undg/images/SDGs/pt-br/SDG-7.svg'),
(8, 'Trabalho decente e crescimento econômico', 'https://brasil.un.org/profiles/undg_country/themes/custom/undg/images/SDGs/pt-br/SDG-8.svg'),
(9, 'Inovação e infraestrutura', 'https://brasil.un.org/profiles/undg_country/themes/custom/undg/images/SDGs/pt-br/SDG-9.svg'),
(10, 'Redução das desigualdades', 'https://brasil.un.org/profiles/undg_country/themes/custom/undg/images/SDGs/pt-br/SDG-10.svg'),
(11, 'Cidades e comunidades sustentáveis', 'https://brasil.un.org/profiles/undg_country/themes/custom/undg/images/SDGs/pt-br/SDG-11.svg'),
(12, 'Consumo e produção responsáveis', 'https://brasil.un.org/profiles/undg_country/themes/custom/undg/images/SDGs/pt-br/SDG-12.svg'),
(13, 'Ação contra a Mudança Global do Clima', 'https://brasil.un.org/profiles/undg_country/themes/custom/undg/images/SDGs/pt-br/SDG-13.svg'),
(14, 'Vida na Água', 'https://brasil.un.org/profiles/undg_country/themes/custom/undg/images/SDGs/pt-br/SDG-14.svg'),
(15, 'Vida Terrestre', 'https://brasil.un.org/profiles/undg_country/themes/custom/undg/images/SDGs/pt-br/SDG-15.svg'),
(16, 'Paz, Justiça e Instituições Eficazes', 'https://brasil.un.org/profiles/undg_country/themes/custom/undg/images/SDGs/pt-br/SDG-16.svg'),
(17, 'Parcerias e Meios de Implementação', 'https://brasil.un.org/profiles/undg_country/themes/custom/undg/images/SDGs/pt-br/SDG-17.svg');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `artefatos`
--
ALTER TABLE `artefatos`
  ADD PRIMARY KEY (`id_artefato`);

--
-- Índices de tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`id_disciplina`);

--
-- Índices de tabela `materiais`
--
ALTER TABLE `materiais`
  ADD PRIMARY KEY (`id_material`);

--
-- Índices de tabela `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`id_projeto`),
  ADD KEY `id_organizacao` (`organizacao`);

--
-- Índices de tabela `projetos_artefatos`
--
ALTER TABLE `projetos_artefatos`
  ADD KEY `id_artefato` (`id_artefato`),
  ADD KEY `id_projeto` (`id_projeto`);

--
-- Índices de tabela `projetos_disciplinas`
--
ALTER TABLE `projetos_disciplinas`
  ADD KEY `id_projeto` (`id_projeto`),
  ADD KEY `id_disciplina` (`id_disciplina`);

--
-- Índices de tabela `projetos_materiais`
--
ALTER TABLE `projetos_materiais`
  ADD KEY `id_material` (`id_material`),
  ADD KEY `id_projeto` (`id_projeto`);

--
-- Índices de tabela `projetos_temas`
--
ALTER TABLE `projetos_temas`
  ADD KEY `id_projeto` (`id_projeto`),
  ADD KEY `id_tema` (`id_tema`);

--
-- Índices de tabela `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`id_tema`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `artefatos`
--
ALTER TABLE `artefatos`
  MODIFY `id_artefato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `id_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `materiais`
--
ALTER TABLE `materiais`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `projetos`
--
ALTER TABLE `projetos`
  MODIFY `id_projeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `projetos_artefatos`
--
ALTER TABLE `projetos_artefatos`
  ADD CONSTRAINT `projetos_artefatos_ibfk_1` FOREIGN KEY (`id_artefato`) REFERENCES `artefatos` (`id_artefato`),
  ADD CONSTRAINT `projetos_artefatos_ibfk_2` FOREIGN KEY (`id_projeto`) REFERENCES `projetos` (`id_projeto`);

--
-- Restrições para tabelas `projetos_disciplinas`
--
ALTER TABLE `projetos_disciplinas`
  ADD CONSTRAINT `projetos_disciplinas_ibfk_1` FOREIGN KEY (`id_projeto`) REFERENCES `projetos` (`id_projeto`),
  ADD CONSTRAINT `projetos_disciplinas_ibfk_2` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplinas` (`id_disciplina`);

--
-- Restrições para tabelas `projetos_materiais`
--
ALTER TABLE `projetos_materiais`
  ADD CONSTRAINT `projetos_materiais_ibfk_1` FOREIGN KEY (`id_material`) REFERENCES `materiais` (`id_material`),
  ADD CONSTRAINT `projetos_materiais_ibfk_2` FOREIGN KEY (`id_projeto`) REFERENCES `projetos` (`id_projeto`);

--
-- Restrições para tabelas `projetos_temas`
--
ALTER TABLE `projetos_temas`
  ADD CONSTRAINT `projetos_temas_ibfk_1` FOREIGN KEY (`id_projeto`) REFERENCES `projetos` (`id_projeto`),
  ADD CONSTRAINT `projetos_temas_ibfk_2` FOREIGN KEY (`id_tema`) REFERENCES `temas` (`id_tema`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
