-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: 08-Jan-2020 às 21:31
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alarme`
--

DROP TABLE IF EXISTS `alarme`;
CREATE TABLE IF NOT EXISTS `alarme` (
  `idAlarme` int(11) NOT NULL AUTO_INCREMENT,
  `Hora` date NOT NULL,
  `Quantidade` double NOT NULL,
  `Medicamento_idMedicamento` int(11) NOT NULL,
  `Pessoa_idPessoa` int(11) NOT NULL,
  PRIMARY KEY (`idAlarme`) USING BTREE,
  KEY `fk_Alarme_Medicamento1` (`Medicamento_idMedicamento`),
  KEY `fk_IdPessoa` (`Pessoa_idPessoa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('guest', '4', 1578482779),
('Medico', '3', 1578482779),
('Secretaria', '2', 1578482779),
('Utente', '1', 1578482779);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('createPost', 2, 'Create a post', NULL, NULL, 1578482779, 1578482779),
('deletePost', 2, 'Delete a post', NULL, NULL, 1578482779, 1578482779),
('guest', 1, NULL, NULL, NULL, 1578482779, 1578482779),
('Medico', 1, NULL, NULL, NULL, 1578482779, 1578482779),
('Secretaria', 1, NULL, NULL, NULL, 1578482779, 1578482779),
('updateOwnPost', 2, 'Update own post', NULL, NULL, 1578482779, 1578482779),
('updatePost', 2, 'Update a post', NULL, NULL, 1578482779, 1578482779),
('Utente', 1, NULL, NULL, NULL, 1578482779, 1578482779),
('viewPost', 2, 'View a post', NULL, NULL, 1578482779, 1578482779);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Utente', 'createPost'),
('Medico', 'Secretaria'),
('Utente', 'updateOwnPost'),
('Secretaria', 'updatePost'),
('Secretaria', 'Utente'),
('Utente', 'viewPost');

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

DROP TABLE IF EXISTS `consulta`;
CREATE TABLE IF NOT EXISTS `consulta` (
  `idConsulta` int(11) NOT NULL AUTO_INCREMENT,
  `DataConsulta` date NOT NULL,
  `hora` time NOT NULL,
  `TipoConsulta` varchar(45) NOT NULL,
  `Descricao` varchar(45) DEFAULT NULL,
  `Estado` tinyint(2) NOT NULL DEFAULT '0',
  `idMedico` int(11) NOT NULL,
  `idFuncionario` int(11) NOT NULL,
  PRIMARY KEY (`idConsulta`),
  KEY `fk_Pessoa_Medico` (`idMedico`),
  KEY `fk_Pessoa_Funcionario` (`idFuncionario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `consulta`
--

INSERT INTO `consulta` (`idConsulta`, `DataConsulta`, `hora`, `TipoConsulta`, `Descricao`, `Estado`, `idMedico`, `idFuncionario`) VALUES
(1, '2020-01-17', '17:13:00', 'blabla', 'descricao', 0, 2, 2),
(3, '2020-01-23', '20:00:00', 'jbnbn', 'bnbb', 0, 2, 2),
(5, '2020-01-29', '06:00:00', 'teset', 'testedescricao', 0, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fichatecnica`
--

DROP TABLE IF EXISTS `fichatecnica`;
CREATE TABLE IF NOT EXISTS `fichatecnica` (
  `idFichaClinica` int(11) NOT NULL AUTO_INCREMENT,
  `Ficheiro` varchar(45) DEFAULT NULL,
  `Observacoes` varchar(45) DEFAULT NULL,
  `Consulta_idConsulta` int(11) NOT NULL,
  PRIMARY KEY (`idFichaClinica`),
  KEY `fk_Consulta_idConsulta` (`Consulta_idConsulta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcacao_consulta`
--

DROP TABLE IF EXISTS `marcacao_consulta`;
CREATE TABLE IF NOT EXISTS `marcacao_consulta` (
  `idMarcacao_Consulta` int(11) NOT NULL AUTO_INCREMENT,
  `Pessoa_idPessoa` int(11) NOT NULL,
  `Consulta_idConsulta` int(11) DEFAULT NULL,
  `Estado` tinyint(2) NOT NULL DEFAULT '0',
  `Descricao` varchar(150) NOT NULL,
  `Urgente` tinyint(2) NOT NULL,
  PRIMARY KEY (`idMarcacao_Consulta`,`Pessoa_idPessoa`) USING BTREE,
  UNIQUE KEY `Consulta_idConsulta` (`Consulta_idConsulta`),
  KEY `fk_Pessoa_Utente` (`Pessoa_idPessoa`),
  KEY `fk_Consulta_Consulta` (`Consulta_idConsulta`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `marcacao_consulta`
--

INSERT INTO `marcacao_consulta` (`idMarcacao_Consulta`, `Pessoa_idPessoa`, `Consulta_idConsulta`, `Estado`, `Descricao`, `Urgente`) VALUES
(2, 1, 1, 0, 'quero uma consulta', 1),
(3, 1, 3, 0, 'descricao consulta2', 0),
(4, 2, 5, 0, 'xzxzxz', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicamento`
--

DROP TABLE IF EXISTS `medicamento`;
CREATE TABLE IF NOT EXISTS `medicamento` (
  `idMedicamento` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(45) NOT NULL,
  PRIMARY KEY (`idMedicamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1573666546),
('m130524_201442_init', 1573666549),
('m190124_110200_add_verification_token_column_to_user_table', 1573666549),
('m191113_182207_user', 1573669376),
('m191029_101340_init_rbac_author', 1578482779);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
CREATE TABLE IF NOT EXISTS `pessoa` (
  `idPessoa` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `DataNascimento` date NOT NULL,
  `Morada` varchar(45) NOT NULL,
  `NumUtenteSaude` int(9) NOT NULL,
  `NumIDCivil` int(9) NOT NULL,
  `TipoUtilizador` enum('Medico','Utente','Funcionario') NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idPessoa`),
  KEY `fk_User_idUser` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`idPessoa`, `Nome`, `DataNascimento`, `Morada`, `NumUtenteSaude`, `NumIDCivil`, `TipoUtilizador`, `idUser`) VALUES
(1, 'mica', '2020-01-21', 'mica', 121212121, 121212121, 'Utente', 1),
(2, 'micaela', '2019-12-04', 'mica', 121212121, 121212121, 'Utente', 2),
(3, 'func', '2020-01-02', 'func', 121313133, 131313133, 'Funcionario', 3),
(4, 'teste', '2020-01-09', 'teste', 123456788, 123456788, 'Medico', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `receita`
--

DROP TABLE IF EXISTS `receita`;
CREATE TABLE IF NOT EXISTS `receita` (
  `idReceita` int(11) NOT NULL AUTO_INCREMENT,
  `DataReceita` date NOT NULL,
  `Prescricao` varchar(100) NOT NULL,
  `Consulta_idConsulta` int(11) NOT NULL,
  PRIMARY KEY (`idReceita`),
  KEY `fk_idConsulta` (`Consulta_idConsulta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `receita_has_medicamento`
--

DROP TABLE IF EXISTS `receita_has_medicamento`;
CREATE TABLE IF NOT EXISTS `receita_has_medicamento` (
  `Receita_idReceita` int(11) NOT NULL,
  `Medicamento_idMedicamento` int(11) NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `Dosagem_Diario` double NOT NULL,
  PRIMARY KEY (`Receita_idReceita`,`Medicamento_idMedicamento`),
  KEY `fk_Medicamento_Medicamento` (`Medicamento_idMedicamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'mica', '003qFCHhsW0Qn5lSi4Hu0-ZR15WNkOch', '$2y$13$mDYjOOC.Hl8wL4vYwSEXeeEaXTqf6eVpguH3UEZrbZV2CXHe9Rv7C', NULL, 'mica@m.pt', 10, 1578341167, 1578341167, NULL),
(2, 'micaela', '8CYzyDeicrkr2TuiZtrR-AeOGiYnRlqe', '$2y$13$lR6MatIwVNs4i9Gc/GZTqe/Z7JbSCLZYSZxI4fJ7UAssywVh9FB2i', NULL, 'mica@mica.pt', 10, 1578341367, 1578341367, NULL),
(3, 'func', 'rU5x4qa7DgpP4rybAPteMwSdkCFV66Qq', '$2y$13$eeQtKkzfs4KXWmsA4HyRf.NJUqrXwnUcTAjcjPoiqBi3J8VesCGmq', NULL, 'func@func.pt', 9, 1578390780, 1578390780, NULL),
(4, 'teste', 'LC8WOVQNvTsp-uHfdufpOvYbooclXy0i', '$2y$13$u5iYwfKXPR6nNE4a4OXOAe8x/6NjBjYPBMJKRmXtvYCkvz5g7bh8S', NULL, 'teste@f.t', 9, 1578482834, 1578482834, NULL);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `fk_Pessoa_Funcionario` FOREIGN KEY (`idFuncionario`) REFERENCES `pessoa` (`idPessoa`),
  ADD CONSTRAINT `fk_Pessoa_Medico` FOREIGN KEY (`idMedico`) REFERENCES `pessoa` (`idPessoa`);

--
-- Limitadores para a tabela `fichatecnica`
--
ALTER TABLE `fichatecnica`
  ADD CONSTRAINT `fk_Consulta_idConsulta` FOREIGN KEY (`Consulta_idConsulta`) REFERENCES `consulta` (`idConsulta`);

--
-- Limitadores para a tabela `marcacao_consulta`
--
ALTER TABLE `marcacao_consulta`
  ADD CONSTRAINT `fk_Consulta_Consulta` FOREIGN KEY (`Consulta_idConsulta`) REFERENCES `consulta` (`idConsulta`),
  ADD CONSTRAINT `fk_Pessoa_Utente` FOREIGN KEY (`Pessoa_idPessoa`) REFERENCES `pessoa` (`idPessoa`);

--
-- Limitadores para a tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD CONSTRAINT `fk_User_idUser` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `receita`
--
ALTER TABLE `receita`
  ADD CONSTRAINT `fk_idConsulta` FOREIGN KEY (`Consulta_idConsulta`) REFERENCES `consulta` (`idConsulta`);

--
-- Limitadores para a tabela `receita_has_medicamento`
--
ALTER TABLE `receita_has_medicamento`
  ADD CONSTRAINT `fk_Medicamento_Medicamento` FOREIGN KEY (`Medicamento_idMedicamento`) REFERENCES `medicamento` (`idMedicamento`),
  ADD CONSTRAINT `fk_Receita_Receita` FOREIGN KEY (`Receita_idReceita`) REFERENCES `receita` (`idReceita`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
