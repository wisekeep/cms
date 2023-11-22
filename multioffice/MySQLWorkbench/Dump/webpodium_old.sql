-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.23 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para webpodium_old
DROP DATABASE IF EXISTS `webpodium_old`;
CREATE DATABASE IF NOT EXISTS `webpodium_old` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `webpodium_old`;

-- Copiando estrutura para tabela webpodium_old.empresas
DROP TABLE IF EXISTS `empresas`;
CREATE TABLE IF NOT EXISTS `empresas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_uuid` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `empresa_matriz` int(11) DEFAULT NULL,
  `empresa_da_matriz` int(11) DEFAULT NULL,
  `empresa_ativa` tinyint(4) DEFAULT NULL,
  `empresa_data_inclusao` datetime DEFAULT CURRENT_TIMESTAMP,
  `empresa_insc_cnpj_cpf` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `empresa_insc_estadual` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `empresa_insc_municipal` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `empresa_razao_social` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `empresa_endereco` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `empresa_numero` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `empresa_observacao` blob,
  PRIMARY KEY (`id`),
  KEY `FK_empresas_empresas` (`empresa_da_matriz`),
  CONSTRAINT `FK_empresas_empresas` FOREIGN KEY (`empresa_da_matriz`) REFERENCES `empresas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela webpodium_old.empresas: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` (`id`, `empresa_uuid`, `empresa_matriz`, `empresa_da_matriz`, `empresa_ativa`, `empresa_data_inclusao`, `empresa_insc_cnpj_cpf`, `empresa_insc_estadual`, `empresa_insc_municipal`, `empresa_razao_social`, `empresa_endereco`, `empresa_numero`, `empresa_observacao`) VALUES
	(1, 'ABCDEFGHIJKLMNOP', 1, 1, 1, '2018-09-10 23:22:00', '1111111111', '2222222222', '3333333333', 'Teste 1', 'Endereço 1', '1', NULL),
	(2, 'dc0e5e132e8b09f7806ba316ce9902bb90979c18', 1, 1, 0, '2018-09-10 20:44:00', '1111111111', '2222222222', '3333333333', 'Teste 2', 'Endereço 1', '1', NULL),
	(3, '65018212f16706b8cd865be821c6450c88b91bf9', 0, 2, 0, '0000-00-00 00:00:00', '1111111111', '2222222222', '3333333333', 'Teste 3', 'Endereço 1', '1', NULL),
	(4, NULL, 1, 1, 1, '0000-00-00 00:00:00', '1111111111', '2222222222X', '3333333333', 'Teste 4', 'Endereço 1', '1', NULL),
	(5, NULL, 1, 1, 0, '2018-09-06 22:37:00', '1111111111', '2222222222', '3333333333', 'Teste 5', 'Endereço 1', '1', NULL),
	(6, NULL, 1, 1, 1, '0000-00-00 00:00:00', '1111111111', '2222222222', '3333333333', 'Teste 6', 'Endereço 1', '1', NULL),
	(7, NULL, 1, 1, 1, '0000-00-00 00:00:00', '1111111111', '2222222222', '3333333333XX', 'Teste 7', 'Endereço 1', '1', NULL),
	(8, NULL, 1, 1, 0, '2018-09-10 23:23:00', '1111111111', '2222222222XXX', '3333333333', 'Teste 8', 'Endereço 1', '1', NULL),
	(9, NULL, 0, 2, 1, '2018-09-07 00:23:00', '1111111111', '2222222222', '3333333333', 'Teste 9', 'Endereço 1', '1', NULL),
	(10, 'ec5a8c15348cfaa8e1608ce9af807df1b12e07aa', 1, 1, 1, '2018-09-07 12:25:00', '1111111111', '2222222222', '3333333333', 'Teste 1', 'Endereço 1', '1', _binary 0x3C703E7A787A627A633C2F703E),
	(11, '67320e6d35b62a4dfadffb259b92dab97d2141c3', 0, 1, 0, '0000-00-00 00:00:00', '1111111111', '2222222222', '3333333333', 'Teste 3', 'Endereço 1', '1', NULL),
	(12, '554c4cf603ef98dfd8d3730e3a12035466af6b6e', 0, 1, 0, '2018-09-10 00:00:00', '1111111111', '2222222222', '3333333333', 'Teste 3', 'Endereço 1', '1', _binary 0x3C703E6363633C2F703E);
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;

-- Copiando estrutura para tabela webpodium_old.medicos
DROP TABLE IF EXISTS `medicos`;
CREATE TABLE IF NOT EXISTS `medicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `medico_nome` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `medico_ativo` tinyint(11) DEFAULT NULL,
  `medico_registro_crm` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `medico_obs` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela webpodium_old.medicos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `medicos` DISABLE KEYS */;
/*!40000 ALTER TABLE `medicos` ENABLE KEYS */;

-- Copiando estrutura para tabela webpodium_old.protocolos
DROP TABLE IF EXISTS `protocolos`;
CREATE TABLE IF NOT EXISTS `protocolos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresas_id` int(11) NOT NULL,
  `protocolosstatus_id` int(11) NOT NULL,
  `protocolo_uuid` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `protocolo_nome` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `protocolo_obs` blob,
  PRIMARY KEY (`id`),
  KEY `fk_proptocolos_empresas` (`empresas_id`),
  KEY `fk_protocolos_protocolosstatus` (`protocolosstatus_id`),
  CONSTRAINT `fk_proptocolos_empresas` FOREIGN KEY (`empresas_id`) REFERENCES `empresas` (`id`),
  CONSTRAINT `fk_protocolos_protocolosstatus` FOREIGN KEY (`protocolosstatus_id`) REFERENCES `protocolosstatus` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela webpodium_old.protocolos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `protocolos` DISABLE KEYS */;
/*!40000 ALTER TABLE `protocolos` ENABLE KEYS */;

-- Copiando estrutura para tabela webpodium_old.protocolosstatus
DROP TABLE IF EXISTS `protocolosstatus`;
CREATE TABLE IF NOT EXISTS `protocolosstatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `protocolo_status_nome` varchar(200) CHARACTER SET latin1 NOT NULL,
  `protocolo_status_obs` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela webpodium_old.protocolosstatus: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `protocolosstatus` DISABLE KEYS */;
INSERT INTO `protocolosstatus` (`id`, `protocolo_status_nome`, `protocolo_status_obs`) VALUES
	(1, 'Recebimento de Malote', NULL),
	(2, 'Envio de Malote', NULL);
/*!40000 ALTER TABLE `protocolosstatus` ENABLE KEYS */;

-- Copiando estrutura para tabela webpodium_old.receitas
DROP TABLE IF EXISTS `receitas`;
CREATE TABLE IF NOT EXISTS `receitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresas_id` int(11) DEFAULT NULL,
  `usuarios_id` int(11) DEFAULT NULL,
  `receita_status` int(11) DEFAULT NULL,
  `receita_tipo` int(11) DEFAULT NULL,
  `receita_ad` timestamp NULL DEFAULT NULL,
  `receita_validade` date DEFAULT NULL,
  `receita_obs` blob,
  PRIMARY KEY (`id`),
  KEY `fk_receitas_empresas` (`empresas_id`),
  KEY `fk_receitas_usuarios` (`usuarios_id`),
  CONSTRAINT `fk_receitas_empresas` FOREIGN KEY (`empresas_id`) REFERENCES `empresas` (`id`),
  CONSTRAINT `fk_receitas_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela webpodium_old.receitas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `receitas` DISABLE KEYS */;
/*!40000 ALTER TABLE `receitas` ENABLE KEYS */;

-- Copiando estrutura para tabela webpodium_old.usuarios
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresas_id` int(11) NOT NULL,
  `usuariosniveis_id` int(11) NOT NULL,
  `usuariossituacoes_id` int(11) NOT NULL,
  `usuariostipos_id` int(11) NOT NULL,
  `usuario_uuid` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario_email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario_senha` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario_adicionado_data` datetime DEFAULT CURRENT_TIMESTAMP,
  `usuario_cpf` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario_rg` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario_nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_endereco` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario_numero` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario_bairro` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario_cidade` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario_estado` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario_pais` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario_cep` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario_fone1` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario_fone2` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario_fone3` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario_fone4` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario_obs` blob,
  PRIMARY KEY (`id`),
  KEY `FK_usuarios_empresas` (`empresas_id`),
  KEY `FK_usuarios_usuariossituacoes` (`usuariossituacoes_id`),
  KEY `FK_usuarios_usuariosniveis` (`usuariosniveis_id`),
  KEY `FK_usuarios_usuariostipos` (`usuariostipos_id`),
  CONSTRAINT `FK_usuarios_empresas` FOREIGN KEY (`empresas_id`) REFERENCES `empresas` (`id`),
  CONSTRAINT `FK_usuarios_usuariosniveis` FOREIGN KEY (`usuariosniveis_id`) REFERENCES `usuariosniveis` (`id`),
  CONSTRAINT `FK_usuarios_usuariossituacoes` FOREIGN KEY (`usuariossituacoes_id`) REFERENCES `usuariossituacoes` (`id`),
  CONSTRAINT `FK_usuarios_usuariostipos` FOREIGN KEY (`usuariostipos_id`) REFERENCES `usuariostipos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela webpodium_old.usuarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `empresas_id`, `usuariosniveis_id`, `usuariossituacoes_id`, `usuariostipos_id`, `usuario_uuid`, `usuario_email`, `usuario_senha`, `usuario_adicionado_data`, `usuario_cpf`, `usuario_rg`, `usuario_nome`, `usuario_endereco`, `usuario_numero`, `usuario_bairro`, `usuario_cidade`, `usuario_estado`, `usuario_pais`, `usuario_cep`, `usuario_fone1`, `usuario_fone2`, `usuario_fone3`, `usuario_fone4`, `usuario_obs`) VALUES
	(1, 1, 1, 1, 1, NULL, NULL, NULL, '2018-09-10 13:52:00', NULL, NULL, 'Marcelo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Copiando estrutura para tabela webpodium_old.usuariosniveis
DROP TABLE IF EXISTS `usuariosniveis`;
CREATE TABLE IF NOT EXISTS `usuariosniveis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuarionivel_chave` int(11) NOT NULL,
  `usuarionivel_nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `usuarionivel_obs` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela webpodium_old.usuariosniveis: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `usuariosniveis` DISABLE KEYS */;
INSERT INTO `usuariosniveis` (`id`, `usuarionivel_chave`, `usuarionivel_nome`, `usuarionivel_obs`) VALUES
	(1, 1, 'Nivel 1', _binary 0x00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000430054004900),
	(2, 2, 'Nivel 2', NULL);
/*!40000 ALTER TABLE `usuariosniveis` ENABLE KEYS */;

-- Copiando estrutura para tabela webpodium_old.usuariossituacoes
DROP TABLE IF EXISTS `usuariossituacoes`;
CREATE TABLE IF NOT EXISTS `usuariossituacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuariossituacao_chave` int(11) NOT NULL,
  `usuariossituacao_nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `usuariossituacao_obs` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela webpodium_old.usuariossituacoes: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `usuariossituacoes` DISABLE KEYS */;
INSERT INTO `usuariossituacoes` (`id`, `usuariossituacao_chave`, `usuariossituacao_nome`, `usuariossituacao_obs`) VALUES
	(1, 1, 'Ativo', NULL),
	(2, 0, 'Ivativo', NULL),
	(3, 99, 'Bloqueado', NULL);
/*!40000 ALTER TABLE `usuariossituacoes` ENABLE KEYS */;

-- Copiando estrutura para tabela webpodium_old.usuariostipos
DROP TABLE IF EXISTS `usuariostipos`;
CREATE TABLE IF NOT EXISTS `usuariostipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuariostipo_chave` int(11) NOT NULL,
  `usuariostipo_nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `usuariostipo_obs` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela webpodium_old.usuariostipos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuariostipos` DISABLE KEYS */;
INSERT INTO `usuariostipos` (`id`, `usuariostipo_chave`, `usuariostipo_nome`, `usuariostipo_obs`) VALUES
	(1, 1, 'Operador', _binary 0x300030003A00330000);
/*!40000 ALTER TABLE `usuariostipos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
