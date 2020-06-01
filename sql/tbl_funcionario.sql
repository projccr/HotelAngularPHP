

-- Criação da tabela funcionário

-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- SET AUTOCOMMIT = 0;
-- START TRANSACTION;
-- SET time_zone='America/Sao_Paulo';

-- Cria o banco de dados
DROP DATABASE  IF EXISTS hoteldb;
CREATE DATABASE IF NOT EXISTS hoteldb;

-- Seleciona o banco de dados
USE hoteldb;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sample`
--
DROP TABLE IF EXISTS tbl_funcionario; 
-- DROP TABLE tbl_funcionario; 

CREATE TABLE `tbl_funcionario` (
  `cpf` int(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `endereco` varchar(250) NOT NULL,
  `cargo` varchar(10) NOT NULL,
)

--
ALTER TABLE tbl_funcionario
ADD CONSTRAINT PK_FUNCIONARIO
PRIMARY KEY (`cpf`);
-- Dumping data for table `tbl_funcionario`
--

INSERT INTO `tbl_funcionario` (`cpf`, `nome`, `telefone`, `endereco`, `cargo`) VALUES
(1234567, 'Aline Lika', '5199999999', 'Viamão quase na paria', 'gerente'),
(22222222222222222222, 'Tiago Marlito','5199998888', 'Nao faco ideia', 'administrador'),
(33333333333333333333, 'Paulo Maninho','5199997788', 'Nao faco ideia', 'servente');


--
-- Indexes for dumped tables
--

COMMIT;


