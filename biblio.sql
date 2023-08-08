-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 15-Dez-2022 às 17:15
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

DROP TABLE IF EXISTS `alunos`;
CREATE TABLE IF NOT EXISTS `alunos` (
  `alu_id` int(255) NOT NULL AUTO_INCREMENT,
  `alu_nome` varchar(440) NOT NULL,
  `alu_serie` varchar(440) NOT NULL,
  `alu_turmas` int(255) NOT NULL,
  PRIMARY KEY (`alu_id`),
  KEY `alu_turmas` (`alu_turmas`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`alu_id`, `alu_nome`, `alu_serie`, `alu_turmas`) VALUES
(16, 'Raquel', '2°', 5),
(17, 'Letícia', '2°', 2),
(18, 'Hanna Lima', '1°', 4),
(19, 'Gabrielle', '3°', 6),
(20, 'Inez', '2°', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimo`
--

DROP TABLE IF EXISTS `emprestimo`;
CREATE TABLE IF NOT EXISTS `emprestimo` (
  `emp_id` int(220) NOT NULL AUTO_INCREMENT,
  `emp_turma` varchar(220) NOT NULL,
  `emp_alu` varchar(220) NOT NULL,
  `emp_usu` varchar(220) NOT NULL,
  `emp_livro` varchar(220) NOT NULL,
  `emp_data` date NOT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `emp_alu` (`emp_alu`),
  KEY `emp_usu` (`emp_usu`),
  KEY `emp_turma` (`emp_turma`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `emprestimo`
--

INSERT INTO `emprestimo` (`emp_id`, `emp_turma`, `emp_alu`, `emp_usu`, `emp_livro`, `emp_data`) VALUES
(2, '1', '14', 'Isabel', 'Anne da Ilha', '2022-12-15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

DROP TABLE IF EXISTS `livros`;
CREATE TABLE IF NOT EXISTS `livros` (
  `it_id` int(11) NOT NULL AUTO_INCREMENT,
  `it_nome` varchar(400) NOT NULL,
  `it_autor` varchar(400) NOT NULL,
  `it_genero` varchar(400) NOT NULL,
  PRIMARY KEY (`it_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`it_id`, `it_nome`, `it_autor`, `it_genero`) VALUES
(10, 'Capitães da Areia', 'Jorge Amado', 'Romance');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

DROP TABLE IF EXISTS `turmas`;
CREATE TABLE IF NOT EXISTS `turmas` (
  `tur_id` int(11) NOT NULL AUTO_INCREMENT,
  `tur_turmas` varchar(220) NOT NULL,
  PRIMARY KEY (`tur_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`tur_id`, `tur_turmas`) VALUES
(1, 'Informática'),
(2, 'Administração'),
(3, 'Finanças'),
(4, 'Desenvolvimento de Sistemas'),
(5, 'Desenho da Construção Civil'),
(6, 'Enfermagem');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `usu_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `usu_usuario` varchar(220) NOT NULL,
  `usu_pass` varchar(220) NOT NULL,
  PRIMARY KEY (`usu_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usu_codigo`, `usu_usuario`, `usu_pass`) VALUES
(1, 'Isabel', '12345'),
(2, 'Estevão', '12345'),
(3, 'Bruno', '12345');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
