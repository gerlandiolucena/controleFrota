controleFrota
=============

Trabalho executado na faculdade foi iniciado e ainda encontra-se em inplementação

-- Máquina: Teste
-- Data de Criação: 05-Out-2014 às 14:39
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.5.0
--Selecionem  o modo correto de importação, este é o create básico da estrutura do trabalho fique a vontade para alterar e modificar para 
--melhorar a parte de estruturação de dados.

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `ctrl_frota`
--
CREATE DATABASE IF NOT EXISTS `ctrl_frota` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ctrl_frota`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE IF NOT EXISTS `cargo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_setor` int(11) DEFAULT NULL,
  `nomeCargo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`id`, `id_setor`, `nomeCargo`) VALUES
(1, 1, 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` bigint(20) NOT NULL,
  `razaosocial` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `fantasia` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `cidade` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `cnpj` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `endereco` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `estado` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `ie` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `telefone` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `bairro` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UQ_Cliente_cnpj` (`cnpj`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `condutorveiculo`
--

CREATE TABLE IF NOT EXISTS `condutorveiculo` (
  `id` bigint(20) NOT NULL,
  `id_condutor` bigint(20) NOT NULL,
  `id_veiculo` bigint(20) DEFAULT NULL,
  `dataInicio` datetime DEFAULT NULL,
  `datafinal` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UQ_CondutorVeiculo_id_condutor` (`id_condutor`),
  UNIQUE KEY `UQ_CondutorVeiculo_id_veiculo` (`id_veiculo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE IF NOT EXISTS `contato` (
  `id` bigint(20) NOT NULL,
  `id_cliente` bigint(20) NOT NULL,
  `nome` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `telefone` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `setor` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `cargo` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `id_tipocontato` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UQ_Contato_id_cliente` (`id_cliente`),
  UNIQUE KEY `UQ_Contato_id_tipocontato` (`id_tipocontato`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `distribuicao`
--

CREATE TABLE IF NOT EXISTS `distribuicao` (
  `id` bigint(20) NOT NULL,
  `id_condutor` bigint(20) DEFAULT NULL,
  `id_notafiscal` bigint(20) DEFAULT NULL,
  `enderecoentrega` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `cidadeEntrega` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `estadoEntrega` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `id_contato` bigint(20) DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `status` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UQ_Distribuicao_id_condutor` (`id_condutor`),
  UNIQUE KEY `UQ_Distribuicao_id_contato` (`id_contato`),
  UNIQUE KEY `UQ_Distribuicao_id_notafiscal` (`id_notafiscal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE IF NOT EXISTS `estoque` (
  `id_produto` bigint(20) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `quantidade` decimal(10,2) DEFAULT NULL,
  `volume` int(11) DEFAULT NULL,
  `volumeTot` int(11) DEFAULT NULL,
  `Corredor` int(11) DEFAULT NULL,
  `prateleira` int(11) DEFAULT NULL,
  `gaveta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_produto`),
  UNIQUE KEY `UQ_Estoque_id_cliente` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notafiscal`
--

CREATE TABLE IF NOT EXISTS `notafiscal` (
  `id` bigint(20) NOT NULL,
  `id_cliente` bigint(20) DEFAULT NULL,
  `id_usuario` bigint(20) DEFAULT NULL,
  `DataEmissao` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `Peso` decimal(10,2) DEFAULT NULL,
  `Volumes` int(11) DEFAULT NULL,
  `DataEntrega` datetime DEFAULT NULL,
  `DataPrevista` datetime DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UQ_NotaFiscal_id_cliente` (`id_cliente`),
  UNIQUE KEY `UQ_NotaFiscal_id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notaitem`
--

CREATE TABLE IF NOT EXISTS `notaitem` (
  `id_nota` bigint(20) NOT NULL,
  `item` int(11) DEFAULT NULL,
  `id_produto` bigint(20) DEFAULT NULL,
  `Valor_utitario` decimal(10,2) DEFAULT NULL,
  `valor_total` decimal(10,2) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `codigoFiscal` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `desconto` decimal(10,2) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_nota`),
  UNIQUE KEY `UQ_NotaItem_id_produto` (`id_produto`),
  UNIQUE KEY `UQ_NotaItem_item` (`item`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ocorrencia`
--

CREATE TABLE IF NOT EXISTS `ocorrencia` (
  `id` bigint(20) NOT NULL,
  `id_condutorveiculo` bigint(20) DEFAULT NULL,
  `dataOcorrencia` datetime DEFAULT NULL,
  `observacao` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `TipoOcorrencia` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_distribuicao` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UQ_Ocorrencia_id_condutorveiculo` (`id_condutorveiculo`),
  UNIQUE KEY `UQ_Ocorrencia_id_distribuicao` (`id_distribuicao`),
  UNIQUE KEY `UQ_Ocorrencia_id_usuario` (`id_usuario`),
  UNIQUE KEY `UQ_Ocorrencia_TipoOcorrencia` (`TipoOcorrencia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `tipoproduto` int(11) DEFAULT NULL,
  `peso` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UQ_Produto_tipoproduto` (`tipoproduto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE IF NOT EXISTS `setor` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `NomeSetor` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`id`, `NomeSetor`) VALUES
(1, 'Almoxarifado'),
(2, 'Projeto2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipocontato`
--

CREATE TABLE IF NOT EXISTS `tipocontato` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tipocontato`
--

INSERT INTO `tipocontato` (`id`, `descricao`) VALUES
(1, 'Compras'),
(2, 'Vendas2'),
(3, 'Atendente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoocorrencia`
--

CREATE TABLE IF NOT EXISTS `tipoocorrencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(200) DEFAULT NULL,
  `tempomin` int(11) DEFAULT '0',
  `tempomax` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tipoocorrencia`
--

INSERT INTO `tipoocorrencia` (`id`, `descricao`, `tempomin`, `tempomax`) VALUES
(4, 'Batidaalt', 30, 80);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoproduto`
--

CREATE TABLE IF NOT EXISTS `tipoproduto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `especial` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `nome` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoveiculo`
--

CREATE TABLE IF NOT EXISTS `tipoveiculo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Descricao` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tipoveiculo`
--

INSERT INTO `tipoveiculo` (`id`, `Descricao`) VALUES
(1, 'Cargo'),
(2, 'caminhao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `endereco` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `telefone` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `bairro` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `cidade` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `estado` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `setor` bigint(20) DEFAULT NULL,
  `cargo` bigint(20) DEFAULT NULL,
  `DataAdminissao` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `CNH` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `Categoria` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UQ_Usuario_cargo` (`cargo`),
  UNIQUE KEY `UQ_Usuario_setor` (`setor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE IF NOT EXISTS `veiculo` (
  `id` bigint(20) NOT NULL,
  `id_tipo` bigint(20) DEFAULT NULL,
  `placa` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `modelo` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `id_fornecedor` bigint(20) DEFAULT NULL,
  `DataCadastro` datetime DEFAULT NULL,
  `km` bigint(20) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `Cubagem` float DEFAULT NULL,
  `CargaMax` decimal(10,2) DEFAULT NULL,
  `CargaMin` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UQ_Veiculo_id_fornecedor` (`id_fornecedor`),
  UNIQUE KEY `UQ_Veiculo_id_tipo` (`id_tipo`),
  UNIQUE KEY `UQ_Veiculo_modelo` (`modelo`),
  UNIQUE KEY `UQ_Veiculo_placa` (`placa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `FK_Cliente_Contato` FOREIGN KEY (`id`) REFERENCES `contato` (`id_cliente`),
  ADD CONSTRAINT `FK_Cliente_NotaFiscal` FOREIGN KEY (`id`) REFERENCES `notafiscal` (`id_cliente`);

--
-- Limitadores para a tabela `condutorveiculo`
--
ALTER TABLE `condutorveiculo`
  ADD CONSTRAINT `FK_CondutorVeiculo_Distribuicao` FOREIGN KEY (`id`) REFERENCES `distribuicao` (`id_condutor`);

--
-- Limitadores para a tabela `contato`
--
ALTER TABLE `contato`
  ADD CONSTRAINT `FK_Contato_TipoContato` FOREIGN KEY (`id_tipocontato`) REFERENCES `tipocontato` (`id`);

--
-- Limitadores para a tabela `distribuicao`
--
ALTER TABLE `distribuicao`
  ADD CONSTRAINT `FK_Distribuicao_NotaFiscal` FOREIGN KEY (`id_notafiscal`) REFERENCES `notafiscal` (`id`);

--
-- Limitadores para a tabela `notaitem`
--
ALTER TABLE `notaitem`
  ADD CONSTRAINT `FK_NotaItem_NotaFiscal` FOREIGN KEY (`id_nota`) REFERENCES `notafiscal` (`id`);

--
-- Limitadores para a tabela `ocorrencia`
--
ALTER TABLE `ocorrencia`
  ADD CONSTRAINT `fk_ocor_tipo` FOREIGN KEY (`TipoOcorrencia`) REFERENCES `tipoocorrencia` (`id`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `FK_Produto_NotaItem` FOREIGN KEY (`id`) REFERENCES `notaitem` (`id_produto`),
  ADD CONSTRAINT `FK_Produto_TipoProduto` FOREIGN KEY (`tipoproduto`) REFERENCES `tipoproduto` (`id`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_cargo` FOREIGN KEY (`cargo`) REFERENCES `cargo` (`id`),
  ADD CONSTRAINT `FK_Usuario_NotaFiscal` FOREIGN KEY (`id`) REFERENCES `notafiscal` (`id_usuario`);

--
-- Limitadores para a tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD CONSTRAINT `FK_Veiculo_CondutorVeiculo` FOREIGN KEY (`id`) REFERENCES `condutorveiculo` (`id_veiculo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

