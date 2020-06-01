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
-- Banco de dados: `legado`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `id_situacao` varchar(20) NOT NULL,
  `nome_completo` varchar(80) NOT NULL,
  `data_nascimento` varchar(10) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(10) NOT NULL,
  `telefone_residencial` varchar(13) NOT NULL,
  `telefone_celular` varchar(14) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `rua` varchar(60) NOT NULL,
  `bairro` varchar(40) NOT NULL,
  `cidade` varchar(40) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `numero` varchar(9999) NOT NULL,
  `complemento` varchar(50) NOT NULL,
  `observacoes` varchar(100) NOT NULL,
  `email` varchar(70) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `data_inclusao` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_alteracao` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `id_situacao`, `nome_completo`, `data_nascimento`, `cpf`, `rg`, `telefone_residencial`, `telefone_celular`, `cep`, `rua`, `bairro`, `cidade`, `estado`, `numero`, `complemento`, `observacoes`, `email`, `senha`, `data_inclusao`, `data_alteracao`) VALUES
(148, 'Ativo', 'Levi Luís Cavalcanti', '05/01/1989', '81868230856', '262840868', '(51)3339-0571', '(51)99259-7877', '92425-533', 'Rua Major Bernardo Joaquim Ferreira', 'São José', 'Canoas', 'RS', '857', 'casa', '', 'leviluiscavalcanti-97@rafaeladson.com', '23164221be798b1ddddd890e6ac9a7ad', '2019-11-11 01:22:55', '2019-11-10 20:46:18'),
(149, 'Ativo', 'Juliana Daniela Stella da Rosa', '03/11/1992', '02677735016', '1096315757', '(51)3339-0571', '(51)99259-7877', '91520-540', 'Rua Primeiro de Setembro', 'Vila São José', 'Porto Alegre', 'RS', '736', 'torre apto 204', '', 'jjulianadanielastelladarosa@julianacaran.com.br', '34e51b82e1562653a9ef52a5a68a7e7b', '2019-11-11 02:42:35', '2019-11-15 20:52:30'),
(163, 'Ativo', 'Yasmin Sabrina Rebeca Lopes', '01/06/1974', '95227704937', '455659552', '(48)2782-9484', '(48)98831-3711', '88054-630', 'Servidão Guiomar de Lima Monteiro', 'Canasvieiras', 'Florianópolis', 'SC', '113', 'Casa', '', 'yasminsabrinarebecalopes@autvale.com', '5cf8db72d2bc645af66ac17771d95392', '2019-11-11 01:23:17', NULL),
(164, 'Ativo', 'Carolina Giovana Vieira', '26/10/1974', '30079881955', '164248936', '(48)2942-4441', '(48)98160-2692', '88063-200', 'Rua Auroreal', 'Campeche', 'Florianópolis', 'SC', '503', 'Casa', '', 'ccarolinagiovanavieira@iquattro.com.br', 'b001d354674c0478ca5600a5fe6a7260', '2019-11-11 01:23:22', NULL),
(165, 'Inadimplente', 'Isaac Emanuel da Costa', '01/08/1974', '09621332990', '450718979', '(48)3700-7624', '(48)98719-1543', '88037-720', 'Rua Osvaldo Silveira', 'Córrego Grande', 'Florianópolis', 'SC', '176', 'Casa', '', 'isaacemanueldacosta@maccropropaganda.com.br', 'fd4d042cfb0436d52b0636daecd9144d', '2019-11-11 01:23:28', '2019-11-16 00:43:38'),
(166, 'Ativo', 'Betina Lívia Marlene Novaes', '15/03/1974', '13594801969', '149050422', '(48)3960-5521', '(48)98952-2211', '88015-706', 'Praça de Portugal', 'Centro', 'Florianópolis', 'SC', '829', 'Torre 9 apto 305', '', 'betinaliviamarlenenovaes@raioazul.com.br', '3f78d8e6b00f0256e4ac5c84c2c49930', '2019-11-11 01:23:33', NULL),
(167, 'Ativo', 'Theo Leandro Duarte', '26/10/1974', '55190740978', '360923641', '(48)2990-4838', '(48)98563-1134', '88053-684', 'Rua Luiz Rampa', 'Jurerê', 'Florianópolis', 'SC', '152', 'Torre 5 Apto 806', '', 'ttheoleandroduarte@yahool.com', 'afbaa1cf8842b06f73a8616c45cd7b25', '2019-11-11 01:23:39', NULL),
(168, 'Ativo', 'Nathan Danilo Renato Novaes', '20/01/1974', '33874950999', '228652868', '(48)2621-4258', '(48)99224-8407', '88053-434', 'Travessa das Sardinhas', 'Jurerê Internacional', 'Florianópolis', 'SC', '696', '', '', 'nathandanilorenatonovaes-73@gerdal.com.br', 'c5ec552dd8acc2271a0f91a9ac375566', '2019-11-11 01:23:45', NULL),
(170, 'Ativo', 'Henry Caio Silveira', '27/05/1974', '77052870991', '289724739', '(48)2862-8456', '(48)99396-6107', '88020-202', 'Rua Professor Aldo Câmara da Silva', 'Centro', 'Florianópolis', 'SC', '923', '', '', 'henrycaiosilveira@valdulion.com.br', 'ade30199d44bd1f8dabfb62c97bdc4db', '2019-11-11 01:23:58', NULL),
(171, 'Ativo', 'Kevin Marcelo Benício Martins', '14/12/1974', '77259654910', '193882607', '(48)2560-2053', '(48)98245-2382', '88030-908', 'Rodovia José Carlos Daux 600', 'João Paulo', 'Florianópolis', 'SC', '598', '', '', 'kevinmarcelobeniciomartins@prudential.com', 'd3d74bc3e723f3f31ef9eb3f9f1c928f', '2019-11-11 01:24:04', NULL),
(172, 'Ativo', 'Lavínia Maitê das Neves', '22/08/1974', '50679185941', '142334704', '(48)3783-4369', '(48)98249-1374', '88058-184', 'Servidão Idalina Maria da Silveira', 'Ingleses do Rio Vermelho', 'Florianópolis', 'SC', '374', '', '', 'laviniamaitedasneves@ltecno.com.br', 'e075712d7d758f382f19d95edd6473c6', '2019-11-11 01:24:09', NULL),
(192, 'Inadimplente', 'José Fábio Cavalcanti', '02/09/1978', '42795044900', '168775323', '(48)3523-4610', '(48)98958-2414', '88058-498', 'Servidão dos Saguis', 'Ingleses do Rio Vermelho', 'Florianópolis', 'SC', '748', '', '', 'josefabiocavalcanti@lexos.com.br', 'c81b113bb8c3696b879402bb8d96a2cb', '2019-11-16 00:40:14', '2019-11-20 11:47:42'),
(195, 'Inadimplente', 'Thales Felipe Paulo da Mata', '10/10/1984', '48948813730', '169037885', '(21)2762-6912', '(21)99457-2654', '22040-970', 'Rua Raimundo Correia', 'Copacabana', 'Rio de Janeiro', 'RJ', '189', 'Torre 9 apto 204', '', 'thalesfelipepaulodamata_@eternalam.com.br', '620bff2a6d3e2cede164a89c2367659a', '2019-11-20 11:50:46', '2019-11-20 11:52:07'),
(196, 'Ativo', 'Demonio 666', '06/06/06', '85845530897', '991111', '(99)9999-9', '(99)9999', '90010-200', 'Travessa Engenheiro Acilino Carvalho', 'Centro Histórico', 'Porto Alegre', 'RS', '200', '600', '', 'ottiagos@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '2019-11-25 15:56:27', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
