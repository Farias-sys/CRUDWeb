-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Dez-2021 às 03:23
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `curso_informatica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `num_register` int(4) UNSIGNED ZEROFILL NOT NULL,
  `class` varchar(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `rg` varchar(15) NOT NULL,
  `cel_aluno` int(12) NOT NULL,
  `tel_aluno` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`num_register`, `class`, `name`, `cpf`, `rg`, `cel_aluno`, `tel_aluno`) VALUES
(0001, '454123', 'silvio luiz', '1453135532', '32655', 135325, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas_informatica`
--

CREATE TABLE `turmas_informatica` (
  `class_code` varchar(6) NOT NULL,
  `teacher` varchar(100) NOT NULL,
  `number_students` int(3) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `turmas_informatica`
--

INSERT INTO `turmas_informatica` (`class_code`, `teacher`, `number_students`, `date_start`, `date_end`) VALUES
('454123', 'eaeae', 2, '0000-00-00', '0000-00-00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`num_register`),
  ADD KEY `FK_alunos_turma` (`class`);

--
-- Índices para tabela `turmas_informatica`
--
ALTER TABLE `turmas_informatica`
  ADD PRIMARY KEY (`class_code`),
  ADD UNIQUE KEY `class_code` (`class_code`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `num_register` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `FK_alunos_turma` FOREIGN KEY (`class`) REFERENCES `turmas_informatica` (`class_code`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
