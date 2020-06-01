-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Nov-2019 às 21:40
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `paulo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cpf` bigint(20) NOT NULL,
  `status` varchar(15) DEFAULT NULL,
  `nome` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cep` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cpf`, `status`, `nome`, `telefone`, `email`, `cidade`, `endereco`, `numero`, `bairro`, `estado`, `cep`) VALUES
(2677735016, 'Ativo', 'Juliana Daniela Stella da Rosa', '(51)99259-7877', 'jjulianadanielastelladarosa@julianacaran.com.', 'Porto Alegre', 'Rua Primeiro de Setembro', 736, 'Vila São José', 'RS', '91520-540'),
(9621332990, 'Inadimplente', 'Isaac Emanuel da Costa', '(48)98719-1543', 'isaacemanueldacosta@maccropropaganda.com.br', 'Florianópolis', 'Rua Osvaldo Silveira', 176, 'Córrego Grande', 'SC', '88037-720'),
(13594801969, 'Ativo', 'Betina Lívia Marlene Novaes', '(48)98952-2211', 'betinaliviamarlenenovaes@raioazul.com.br', 'Florianópolis', 'Praça de Portugal', 829, 'Centro', 'SC', '88015-706'),
(30079881955, 'Ativo', 'Carolina Giovana Vieira', '(48)98160-2692', 'ccarolinagiovanavieira@iquattro.com.br', 'Florianópolis', 'Rua Auroreal', 503, 'Campeche', 'SC', '88063-200'),
(33874950999, 'Ativo', 'Nathan Danilo Renato Novaes', '(48)99224-8407', 'nathandanilorenatonovaes-73@gerdal.com.br', 'Florianópolis', 'Travessa das Sardinhas', 696, 'Jurerê Internacional', 'SC', '88053-434'),
(42795044900, 'Inadimplente', 'José Fábio Cavalcanti', '(48)98958-2414', 'josefabiocavalcanti@lexos.com.br', 'Florianópolis', 'Servidão dos Saguis', 748, 'Ingleses do Rio Vermelho', 'SC', '88058-498'),
(48948813730, 'Inadimplente', 'Thales Felipe Paulo da Mata', '(21)99457-2654', 'thalesfelipepaulodamata_@eternalam.com.br', 'Rio de Janeiro', 'Rua Raimundo Correia', 189, 'Copacabana', 'RJ', '22040-970'),
(50679185941, 'Ativo', 'Lavínia Maitê das Neves', '(48)98249-1374', 'laviniamaitedasneves@ltecno.com.br', 'Florianópolis', 'Servidão Idalina Maria da Silveira', 374, 'Ingleses do Rio Vermelho', 'SC', '88058-184'),
(55190740978, 'Ativo', 'Theo Leandro Duarte', '(48)98563-1134', 'ttheoleandroduarte@yahool.com', 'Florianópolis', 'Rua Luiz Rampa', 152, 'Jurerê', 'SC', '88053-684'),
(77052870991, 'Ativo', 'Henry Caio Silveira', '(48)99396-6107', 'henrycaiosilveira@valdulion.com.br', 'Florianópolis', 'Rua Professor Aldo Câmara da Silva', 923, 'Centro', 'SC', '88020-202'),
(77259654910, 'Ativo', 'Kevin Marcelo Benício Martins', '(48)98245-2382', 'kevinmarcelobeniciomartins@prudential.com', 'Florianópolis', 'Rodovia José Carlos Daux 600', 598, 'João Paulo', 'SC', '88030-908'),
(81868230856, 'Ativo', 'Levi Luís Cavalcanti', '(51)99259-7877', 'leviluiscavalcanti-97@rafaeladson.com', 'Canoas', 'Rua Major Bernardo Joaquim Ferreira', 857, 'São José', 'RS', '92425-533'),
(85845530897, 'Ativo', 'Demonio 666', '(99)9999', 'ottiagos@gmail.com', 'Porto Alegre', 'Travessa Engenheiro Acilino Carvalho', 200, 'Centro Histórico', 'RS', '90010-200'),
(95227704937, 'Ativo', 'Yasmin Sabrina Rebeca Lopes', '(48)98831-3711', 'yasminsabrinarebecalopes@autvale.com', 'Florianópolis', 'Servidão Guiomar de Lima Monteiro', 113, 'Canasvieiras', 'SC', '88054-630');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fatura`
--

CREATE TABLE `fatura` (
  `idfatura` int(11) NOT NULL,
  `saldototal` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `cpf` bigint(20) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `cargo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

CREATE TABLE `itens` (
  `iditens` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `valor` varchar(45) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `quartos`
--

CREATE TABLE `quartos` (
  `idquartos` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `tipos_idtipo` int(11) NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `quartos`
--

INSERT INTO `quartos` (`idquartos`, `nome`, `tipos_idtipo`, `status`) VALUES
(1, '3QS1', 2, 'Disponível'),
(2, '3QS2', 2, 'Ocupado'),
(3, '3QS3', 2, 'Disponível'),
(4, '3QS4', 2, 'Ocupado'),
(5, '3QS5', 3, 'Disponível'),
(6, 'br hu3', 3, 'Disponível'),
(7, 'br hu3', 3, 'Disponível'),
(8, 'QS66', 2, 'Ocupado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE `reserva` (
  `idreserva` int(11) NOT NULL,
  `valor` double DEFAULT NULL,
  `cliente_cpf` bigint(20) NOT NULL,
  `quartos_idquartos` int(11) NOT NULL,
  `datacheckin` datetime DEFAULT NULL,
  `datacheckout` datetime DEFAULT NULL,
  `pagamento` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `reserva`
--

INSERT INTO `reserva` (`idreserva`, `valor`, `cliente_cpf`, `quartos_idquartos`, `datacheckin`, `datacheckout`, `pagamento`) VALUES
(2, NULL, 13594801969, 3, '2019-11-20 18:48:15', '2019-11-21 22:48:39', ''),
(3, NULL, 13594801969, 4, '2019-11-20 22:26:04', '2019-11-21 22:48:43', ''),
(4, NULL, 13594801969, 2, '2019-11-21 22:49:36', '2019-11-21 22:50:12', ''),
(5, NULL, 33874950999, 4, '2019-11-21 22:50:04', '2019-11-21 22:50:17', ''),
(6, NULL, 42795044900, 5, '2019-11-21 22:51:37', '2019-11-22 20:27:23', ''),
(7, NULL, 42795044900, 5, '2019-11-21 22:51:52', '2019-11-22 20:27:29', ''),
(8, NULL, 13594801969, 5, '2019-11-22 20:28:46', '2019-11-22 20:30:24', ''),
(9, NULL, 9621332990, 4, '2019-11-23 13:54:01', '2019-11-23 14:58:32', ''),
(10, NULL, 13594801969, 3, '2019-11-23 15:01:46', '2019-11-23 15:02:55', ''),
(11, NULL, 30079881955, 2, '2019-11-23 15:02:42', '2019-11-23 15:08:02', ''),
(12, NULL, 13594801969, 5, '2019-11-23 15:13:37', '2019-11-23 15:13:46', ''),
(13, NULL, 30079881955, 4, '2019-11-23 15:15:05', '2019-11-23 15:15:11', ''),
(14, NULL, 33874950999, 1, '2019-11-23 15:19:05', '2019-11-23 15:20:29', ''),
(15, NULL, 30079881955, 4, '2019-11-23 15:21:14', '2019-11-23 15:22:00', ''),
(16, NULL, 30079881955, 4, '2019-11-23 15:33:59', '2019-11-23 15:34:05', ''),
(17, NULL, 30079881955, 2, '2019-11-23 17:37:14', '2019-11-23 17:37:22', ''),
(18, NULL, 30079881955, 1, '2019-11-23 17:39:31', '2019-11-23 17:39:40', ''),
(19, NULL, 30079881955, 3, '2019-11-23 17:40:26', '2019-11-23 17:40:29', ''),
(20, NULL, 13594801969, 5, '2019-11-23 18:27:17', '2019-11-23 18:27:32', ''),
(21, NULL, 42795044900, 1, '2019-11-23 18:31:38', '2019-11-23 18:31:43', ''),
(22, NULL, 30079881955, 2, '2019-11-23 18:33:53', '2019-11-23 18:33:59', ''),
(23, NULL, 30079881955, 3, '2019-11-23 19:15:18', '2019-11-23 19:15:30', ''),
(24, NULL, 13594801969, 4, '2019-11-23 19:19:03', '2019-11-23 19:19:11', ''),
(25, NULL, 30079881955, 5, '2019-11-23 19:23:19', '2019-11-23 19:23:32', ''),
(26, NULL, 13594801969, 1, '2019-11-23 19:38:55', '2019-11-24 02:56:37', ''),
(27, NULL, 30079881955, 2, '2019-11-24 02:41:51', '2019-11-24 03:03:44', ''),
(28, NULL, 13594801969, 3, '2019-11-24 03:05:14', '2019-11-24 03:05:22', ''),
(29, NULL, 13594801969, 5, '2019-11-24 03:09:08', '2019-11-24 03:09:21', ''),
(30, NULL, 13594801969, 4, '2019-11-24 03:09:49', '2019-11-24 03:11:27', ''),
(31, NULL, 30079881955, 2, '2019-11-24 03:14:15', '2019-11-24 03:30:06', ''),
(32, NULL, 30079881955, 1, '2019-11-24 03:25:20', '2019-11-24 03:27:19', ''),
(33, NULL, 13594801969, 3, '2019-11-24 03:38:20', '2019-11-24 15:33:46', ''),
(34, NULL, 13594801969, 5, '2019-11-24 07:41:24', '2019-11-24 17:24:05', 'Cancelado'),
(35, NULL, 13594801969, 3, '2019-11-24 15:34:39', '2019-11-25 19:18:45', 'Pago'),
(36, NULL, 2677735016, 6, '2019-11-25 17:45:56', '2019-11-25 19:19:17', 'Pendente'),
(37, NULL, 9621332990, 6, '2019-11-25 19:42:35', '2019-11-25 20:46:42', 'Pendente'),
(38, NULL, 9621332990, 6, '2019-11-25 20:44:12', '2019-11-25 20:46:42', 'Pendente'),
(39, NULL, 9621332990, 6, '2019-11-25 20:44:25', '2019-11-25 20:46:43', 'Pendente'),
(40, NULL, 30079881955, 2, '2019-11-25 20:45:22', '2019-11-25 20:46:37', 'Pendente'),
(41, NULL, 9621332990, 5, '2019-11-25 20:45:31', '2019-11-25 20:46:42', 'Pendente'),
(42, NULL, 13594801969, 1, '2019-11-25 20:45:41', '2019-11-25 20:46:41', 'Pendente'),
(43, NULL, 13594801969, 6, '2019-11-25 20:45:50', '2019-11-25 20:46:40', 'Pendente'),
(44, NULL, 30079881955, 6, '2019-11-25 20:45:57', '2019-11-25 20:46:39', 'Pendente'),
(45, NULL, 9621332990, 2, '2019-11-25 20:47:00', NULL, 'Pago'),
(46, NULL, 9621332990, 8, '2019-11-25 21:09:27', NULL, 'Pendente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos`
--

CREATE TABLE `tipos` (
  `idtipo` int(11) NOT NULL,
  `nometipo` varchar(45) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `valordiaria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipos`
--

INSERT INTO `tipos` (`idtipo`, `nometipo`, `descricao`, `valordiaria`) VALUES
(2, 'Quarto super luxo', 'Quarto super luxo', '100'),
(3, 'Casal standard', 'Quarto casal padrão', '22.5'),
(4, 'Quarto motley crue', 'metal', '666');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices para tabela `fatura`
--
ALTER TABLE `fatura`
  ADD PRIMARY KEY (`idfatura`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices para tabela `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`iditens`);

--
-- Índices para tabela `quartos`
--
ALTER TABLE `quartos`
  ADD PRIMARY KEY (`idquartos`),
  ADD KEY `fk_quartos_tipos_idx` (`tipos_idtipo`);

--
-- Índices para tabela `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`idreserva`),
  ADD KEY `fk_reserva_cliente1_idx` (`cliente_cpf`),
  ADD KEY `fk_reserva_quartos1_idx` (`quartos_idquartos`);

--
-- Índices para tabela `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`idtipo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `itens`
--
ALTER TABLE `itens`
  MODIFY `iditens` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `quartos`
--
ALTER TABLE `quartos`
  MODIFY `idquartos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `reserva`
--
ALTER TABLE `reserva`
  MODIFY `idreserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de tabela `tipos`
--
ALTER TABLE `tipos`
  MODIFY `idtipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `quartos`
--
ALTER TABLE `quartos`
  ADD CONSTRAINT `fk_quartos_tipos` FOREIGN KEY (`tipos_idtipo`) REFERENCES `tipos` (`idtipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_reserva_cliente1` FOREIGN KEY (`cliente_cpf`) REFERENCES `cliente` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reserva_quartos1` FOREIGN KEY (`quartos_idquartos`) REFERENCES `quartos` (`idquartos`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
