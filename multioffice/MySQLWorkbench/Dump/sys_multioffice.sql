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


-- Copiando estrutura do banco de dados para sys_multioffice
DROP DATABASE IF EXISTS `sys_multioffice`;
CREATE DATABASE IF NOT EXISTS `sys_multioffice` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sys_multioffice`;

-- Copiando estrutura para tabela sys_multioffice.system_access_log
DROP TABLE IF EXISTS `system_access_log`;
CREATE TABLE IF NOT EXISTS `system_access_log` (
  `id` int(11) NOT NULL,
  `sessionid` text,
  `login` text,
  `login_time` timestamp NULL DEFAULT NULL,
  `logout_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sys_multioffice.system_access_log: 62 rows
/*!40000 ALTER TABLE `system_access_log` DISABLE KEYS */;
INSERT INTO `system_access_log` (`id`, `sessionid`, `login`, `login_time`, `logout_time`) VALUES
	(1, 'p40g0bncjfhnftbic15fap8t97', 'admin', '2018-10-10 12:48:48', '2018-10-10 13:00:34'),
	(2, 'rjp5bdstn7jdjikv95aomumv8b', 'admin', '2018-10-10 13:01:00', '2018-10-10 13:07:39'),
	(3, '2q0hbkku60apm15aebquj4u494', 'admin', '2018-10-11 16:32:30', '2018-10-11 16:32:58'),
	(4, '60jgdbd1rvkosbi0q3vl0hp440', 'admin', '2018-10-12 13:44:49', '2018-10-12 10:46:48'),
	(5, 'c0hv9v00qn2903uas187bpl4rr', 'admin', '2018-10-12 10:47:02', '2018-10-12 11:01:35'),
	(6, 'p2tmhqctf5lehajgtdth5erlv4', 'admin', '2018-10-12 11:03:03', '2018-10-12 11:04:21'),
	(7, 'ob1nvsp7bh7ubucflmvlcsoakr', 'admin', '2018-10-12 11:04:28', '2018-10-12 11:05:37'),
	(8, 'pgdm48pp2ctl4i669a17p6rdso', 'admin', '2018-10-12 11:05:43', '2018-10-12 11:17:49'),
	(9, 'p9vbjc4dcrit8kfv9p161203tu', 'admin', '2018-10-12 11:27:26', '2018-10-12 11:31:15'),
	(10, 'h5162rmea6udlqlfor05naqma1', 'admin', '2018-10-12 12:15:47', '2018-10-12 12:23:02'),
	(11, 'nlrem9h6a9k4417m5lio2csmb5', 'admin', '2018-10-12 12:25:32', '2018-10-12 13:59:33'),
	(12, 'dan37muer05e48bng0b364bml3', 'admin', '2018-10-13 14:08:08', '2018-10-13 14:12:49'),
	(13, 'on568j56h614ji1obdqst6aj31', 'admin', '2018-10-15 13:22:52', '2018-10-15 13:23:04'),
	(14, 'soernm9hvlcvadv0c8m2ps0974', 'admin', '2018-10-16 09:32:30', NULL),
	(15, '0015nnem0nf65mhreulnr836k6', 'admin', '2018-10-16 10:14:54', '2018-10-16 10:15:06'),
	(16, '1t11gmftbldsgjgelsh60o7v82', 'admin', '2018-10-16 16:26:04', '2018-10-16 16:32:53'),
	(17, 'e84fhba908ptkrohl1v6m10mi3', 'user', '2018-10-16 16:32:59', '2018-10-16 16:33:27'),
	(18, 'ks51hernn0dp8lknmr4oirv0j0', 'admin', '2018-10-16 16:34:56', '2018-10-16 17:24:16'),
	(19, '5nqmut4cdt0768v6e90mpbe9f1', 'admin', '2018-10-16 17:24:26', '2018-10-16 17:37:09'),
	(20, 'gtge636lt5g282ucip01k6m1jb', 'admin', '2018-10-31 13:36:23', '2018-10-31 13:39:49'),
	(21, '80g0ed8jmppumfeonlnt0l0rlu', 'admin', '2018-10-31 13:44:05', '2018-10-31 13:47:17'),
	(22, '0qbtfmf1cgltt121eo0i6rne5g', 'admin', '2018-10-31 13:47:47', '2018-10-31 13:57:19'),
	(23, '96qrhmvmkqdknavrd9986gsido', 'admin', '2018-10-31 13:58:01', '2018-10-31 14:01:22'),
	(24, 'asqbi4udcfalth09o8rg3r4bs3', 'user', '2018-10-31 14:01:28', '2018-10-31 14:02:31'),
	(25, 'sm680p1sjt0pphk9ja8bjbvj18', 'admin', '2018-10-31 14:08:48', '2018-10-31 14:12:07'),
	(26, 'i0t8pvelrolb6hutdp42k0u446', 'admin', '2018-10-31 14:13:05', '2018-10-31 14:14:45'),
	(27, '3njmvcdnu5312o6873jeo55smu', 'user', '2018-10-31 14:15:00', '2018-10-31 14:15:25'),
	(28, 'le7hnvgh2ldkfcgkenrmf9sa4e', 'admin', '2018-10-31 14:15:31', '2018-10-31 14:29:02'),
	(29, '693fb5qju0ao0b5efb5p7ad1j1', 'admin', '2018-10-31 18:47:43', '2018-10-31 18:02:16'),
	(30, 'vuj4o6h5v7o3st2eebf0d63ia7', 'admin', '2018-10-31 18:02:48', '2018-10-31 18:03:31'),
	(31, 't6ds2rnmau0ibj83njcomtpfhe', 'admin', '2018-11-27 16:03:40', '2018-11-27 16:12:17'),
	(32, 'v6lutl8llq8f76tl9ksd7f3shh', 'admin', '2018-11-27 16:12:58', NULL),
	(33, 'ek1f1rh00rg3m6jkni9mhmbnd7', 'admin', '2018-11-27 16:30:31', '2018-11-27 16:33:31'),
	(34, 'ui0lbsk7o96l8a8gug4dt9dojl', 'pet', '2018-11-27 16:33:44', '2018-11-27 16:33:53'),
	(35, 'j6484keftlf0f87pvbbo0hel4r', 'admin', '2018-11-27 16:34:03', '2018-11-27 16:35:44'),
	(36, 'fnaps61mioa16qf11i5oefnqu1', 'pet', '2018-11-27 16:35:54', '2018-11-27 16:36:09'),
	(37, 'n5veuirmbrvlad8ccimdee97ia', 'admin', '2018-11-27 16:36:15', '2018-11-27 16:37:00'),
	(38, 'jonvlspntdrhpdfpl1atutojj9', 'pet', '2018-11-27 16:37:08', '2018-11-27 16:37:18'),
	(39, 'jskqhh7s629j00cv3fmah8dm73', 'admin', '2018-11-27 16:37:24', '2018-11-27 16:42:06'),
	(40, 'g6pk7vq7shg7g9ciurha8od40h', 'pet', '2018-11-27 16:42:14', '2018-11-27 16:42:40'),
	(41, 'bi7jdai8ptbn2mc8olp922h809', 'admin', '2018-11-27 16:42:47', '2018-11-27 16:43:16'),
	(42, '8nleoe362qcvisrl13d6km15bp', 'pet', '2018-11-27 16:46:06', '2018-11-27 16:53:49'),
	(43, 'ch1otnqsfcd8stkviim52du99v', 'admin', '2018-11-27 16:53:58', '2018-11-27 16:55:07'),
	(44, 'qh721k3m88f3penu1opjsmfjn8', 'pet', '2018-11-27 16:55:13', '2018-11-27 16:56:58'),
	(45, '8rt2h42jrdjhp4ibjaosntme07', 'admin', '2018-11-27 16:57:04', '2018-11-27 17:33:24'),
	(46, 'gmbdf89vfenkemgqd60majp24b', 'pet', '2018-11-27 16:57:14', NULL),
	(47, '5j5mgi077lmknlmdifsc1qkrd6', 'pet', '2018-11-27 17:16:24', '2018-11-27 17:33:21'),
	(48, 'sgbnp2656cftg27siurh3gc7vf', 'admin', '2018-11-27 17:48:04', '2018-11-27 18:02:27'),
	(49, '8snchjkj2rghdgmv0pkjpf1clp', 'pet', '2018-11-27 17:57:01', NULL),
	(50, 'bbve1ksa9t2meetbjmvs52246e', 'admin', '2018-11-27 18:14:39', '2018-11-27 20:37:39'),
	(51, 'tuunicava4i8ecm3iqj1ebul3b', 'pet', '2018-11-27 20:37:46', '2018-11-27 20:43:15'),
	(52, '7jlsal3vi0re7v4p7lqqv2hbn5', 'admin', '2018-11-27 20:43:22', '2018-11-27 20:43:44'),
	(53, 'cusj5lkg72s9cm3pspfbv03t60', 'pet', '2018-11-27 21:09:23', '2018-11-27 21:10:43'),
	(54, '6hm2ro2l4fa4o307kkmvn8hikr', 'pet', '2018-11-28 11:13:03', '2018-11-28 11:51:50'),
	(55, 'iu08t6f13hl106mjbljhnk4bas', 'Pet', '2018-11-28 12:06:54', '2018-11-28 12:14:41'),
	(56, '6vrdlrc2c7a6rrnp8d7o622edm', 'pet', '2018-12-02 13:27:08', NULL),
	(57, 'm7kfd4o4gr2r9atl8n9mmkglan', 'admin', '2018-12-04 13:04:56', '2018-12-04 13:14:50'),
	(58, 'jvin734od3vmnutdna564rrdkn', 'user', '2018-12-04 13:14:59', '2018-12-04 13:15:22'),
	(59, 'aqfhiirp16vq7apb2qmgvrg0n1', 'admin', '2018-12-04 13:15:28', '2018-12-04 13:20:33'),
	(60, 'p6je0c9oighhloi8jhejdc36r9', 'admin', '2018-12-04 13:22:02', NULL),
	(61, '599bipk9nub2t27ppn7a5l58ml', 'admin', '2018-12-04 13:52:36', NULL),
	(62, '2tcmsn1aejhgdivf99872621v6', 'admin', '2018-12-04 14:54:06', '2018-12-04 14:55:04');
/*!40000 ALTER TABLE `system_access_log` ENABLE KEYS */;

-- Copiando estrutura para tabela sys_multioffice.system_change_log
DROP TABLE IF EXISTS `system_change_log`;
CREATE TABLE IF NOT EXISTS `system_change_log` (
  `id` int(11) NOT NULL,
  `logdate` timestamp NULL DEFAULT NULL,
  `login` text,
  `tablename` text,
  `primarykey` text,
  `pkvalue` text,
  `operation` text,
  `columnname` text,
  `oldvalue` text,
  `newvalue` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sys_multioffice.system_change_log: 0 rows
/*!40000 ALTER TABLE `system_change_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `system_change_log` ENABLE KEYS */;

-- Copiando estrutura para tabela sys_multioffice.system_document
DROP TABLE IF EXISTS `system_document`;
CREATE TABLE IF NOT EXISTS `system_document` (
  `id` int(11) NOT NULL,
  `system_user_id` int(11) DEFAULT NULL,
  `title` text,
  `description` text,
  `category_id` int(11) DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `archive_date` date DEFAULT NULL,
  `filename` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sys_multioffice.system_document: 0 rows
/*!40000 ALTER TABLE `system_document` DISABLE KEYS */;
/*!40000 ALTER TABLE `system_document` ENABLE KEYS */;

-- Copiando estrutura para tabela sys_multioffice.system_document_category
DROP TABLE IF EXISTS `system_document_category`;
CREATE TABLE IF NOT EXISTS `system_document_category` (
  `id` int(11) NOT NULL,
  `name` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sys_multioffice.system_document_category: 1 rows
/*!40000 ALTER TABLE `system_document_category` DISABLE KEYS */;
INSERT INTO `system_document_category` (`id`, `name`) VALUES
	(1, 'Documentação');
/*!40000 ALTER TABLE `system_document_category` ENABLE KEYS */;

-- Copiando estrutura para tabela sys_multioffice.system_document_group
DROP TABLE IF EXISTS `system_document_group`;
CREATE TABLE IF NOT EXISTS `system_document_group` (
  `id` int(11) NOT NULL,
  `document_id` int(11) DEFAULT NULL,
  `system_group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sys_multioffice.system_document_group: 0 rows
/*!40000 ALTER TABLE `system_document_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `system_document_group` ENABLE KEYS */;

-- Copiando estrutura para tabela sys_multioffice.system_document_user
DROP TABLE IF EXISTS `system_document_user`;
CREATE TABLE IF NOT EXISTS `system_document_user` (
  `id` int(11) NOT NULL,
  `document_id` int(11) DEFAULT NULL,
  `system_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sys_multioffice.system_document_user: 0 rows
/*!40000 ALTER TABLE `system_document_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `system_document_user` ENABLE KEYS */;

-- Copiando estrutura para tabela sys_multioffice.system_group
DROP TABLE IF EXISTS `system_group`;
CREATE TABLE IF NOT EXISTS `system_group` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sys_multioffice.system_group: 3 rows
/*!40000 ALTER TABLE `system_group` DISABLE KEYS */;
INSERT INTO `system_group` (`id`, `name`) VALUES
	(1, 'Admin'),
	(2, 'Standard'),
	(3, 'Pet-SHOP');
/*!40000 ALTER TABLE `system_group` ENABLE KEYS */;

-- Copiando estrutura para tabela sys_multioffice.system_group_program
DROP TABLE IF EXISTS `system_group_program`;
CREATE TABLE IF NOT EXISTS `system_group_program` (
  `id` int(11) NOT NULL,
  `system_group_id` int(11) DEFAULT NULL,
  `system_program_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sys_group_program_program_idx` (`system_program_id`),
  KEY `sys_group_program_group_idx` (`system_group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sys_multioffice.system_group_program: 64 rows
/*!40000 ALTER TABLE `system_group_program` DISABLE KEYS */;
INSERT INTO `system_group_program` (`id`, `system_group_id`, `system_program_id`) VALUES
	(1, 1, 1),
	(2, 1, 2),
	(3, 1, 3),
	(4, 1, 4),
	(61, 1, 5),
	(6, 1, 6),
	(7, 1, 8),
	(8, 1, 9),
	(9, 1, 11),
	(10, 1, 14),
	(11, 1, 15),
	(43, 1, 10),
	(41, 1, 12),
	(14, 2, 13),
	(50, 1, 16),
	(46, 1, 17),
	(52, 1, 18),
	(18, 2, 19),
	(19, 2, 20),
	(20, 1, 21),
	(21, 2, 22),
	(22, 2, 23),
	(23, 2, 24),
	(24, 2, 25),
	(25, 1, 26),
	(26, 1, 27),
	(27, 1, 28),
	(28, 1, 29),
	(29, 2, 30),
	(30, 1, 31),
	(31, 1, 32),
	(32, 1, 33),
	(33, 1, 34),
	(68, 3, 35),
	(70, 3, 36),
	(57, 1, 37),
	(44, 2, 10),
	(42, 2, 12),
	(45, 1, 38),
	(47, 2, 17),
	(48, 1, 39),
	(49, 2, 39),
	(51, 2, 16),
	(53, 2, 18),
	(55, 2, 40),
	(54, 1, 40),
	(58, 3, 37),
	(75, 1, 44),
	(69, 1, 36),
	(62, 3, 5),
	(67, 1, 35),
	(72, 3, 42),
	(71, 1, 42),
	(73, 1, 43),
	(74, 3, 43),
	(76, 3, 44),
	(77, 1, 45),
	(78, 3, 45),
	(84, 2, 7),
	(83, 1, 7),
	(87, 2, 47),
	(86, 1, 47),
	(85, 3, 7),
	(88, 3, 47);
/*!40000 ALTER TABLE `system_group_program` ENABLE KEYS */;

-- Copiando estrutura para tabela sys_multioffice.system_message
DROP TABLE IF EXISTS `system_message`;
CREATE TABLE IF NOT EXISTS `system_message` (
  `id` int(11) NOT NULL,
  `system_user_id` int(11) DEFAULT NULL,
  `system_user_to_id` int(11) DEFAULT NULL,
  `subject` text,
  `message` text,
  `dt_message` text,
  `checked` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sys_multioffice.system_message: 2 rows
/*!40000 ALTER TABLE `system_message` DISABLE KEYS */;
INSERT INTO `system_message` (`id`, `system_user_id`, `system_user_to_id`, `subject`, `message`, `dt_message`, `checked`) VALUES
	(1, 1, 2, 'teste', '1', '2018-10-31 14:01:17', 'N'),
	(2, 2, 1, 'teste', '2', '2018-10-31 14:15:18', 'N');
/*!40000 ALTER TABLE `system_message` ENABLE KEYS */;

-- Copiando estrutura para tabela sys_multioffice.system_notification
DROP TABLE IF EXISTS `system_notification`;
CREATE TABLE IF NOT EXISTS `system_notification` (
  `id` int(11) NOT NULL,
  `system_user_id` int(11) DEFAULT NULL,
  `system_user_to_id` int(11) DEFAULT NULL,
  `subject` text,
  `message` text,
  `dt_message` text,
  `action_url` text,
  `action_label` text,
  `icon` text,
  `checked` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sys_multioffice.system_notification: 0 rows
/*!40000 ALTER TABLE `system_notification` DISABLE KEYS */;
/*!40000 ALTER TABLE `system_notification` ENABLE KEYS */;

-- Copiando estrutura para tabela sys_multioffice.system_preference
DROP TABLE IF EXISTS `system_preference`;
CREATE TABLE IF NOT EXISTS `system_preference` (
  `id` text,
  `value` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sys_multioffice.system_preference: 0 rows
/*!40000 ALTER TABLE `system_preference` DISABLE KEYS */;
/*!40000 ALTER TABLE `system_preference` ENABLE KEYS */;

-- Copiando estrutura para tabela sys_multioffice.system_program
DROP TABLE IF EXISTS `system_program`;
CREATE TABLE IF NOT EXISTS `system_program` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `controller` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sys_multioffice.system_program: 45 rows
/*!40000 ALTER TABLE `system_program` DISABLE KEYS */;
INSERT INTO `system_program` (`id`, `name`, `controller`) VALUES
	(1, 'System Group Form', 'SystemGroupForm'),
	(2, 'System Group List', 'SystemGroupList'),
	(3, 'System Program Form', 'SystemProgramForm'),
	(4, 'System Program List', 'SystemProgramList'),
	(5, 'System User Form', 'SystemUserForm'),
	(6, 'System User List', 'SystemUserList'),
	(7, 'Common Page', 'CommonPage'),
	(8, 'System PHP Info', 'SystemPHPInfoView'),
	(9, 'System ChangeLog View', 'SystemChangeLogView'),
	(10, 'Welcome View', 'WelcomeView'),
	(11, 'System Sql Log', 'SystemSqlLogList'),
	(12, 'System Profile View', 'SystemProfileView'),
	(13, 'System Profile Form', 'SystemProfileForm'),
	(14, 'System SQL Panel', 'SystemSQLPanel'),
	(15, 'System Access Log', 'SystemAccessLogList'),
	(16, 'System Message Form', 'SystemMessageForm'),
	(17, 'System Message List', 'SystemMessageList'),
	(18, 'System Message Form View', 'SystemMessageFormView'),
	(19, 'System Notification List', 'SystemNotificationList'),
	(20, 'System Notification Form View', 'SystemNotificationFormView'),
	(21, 'System Document Category List', 'SystemDocumentCategoryFormList'),
	(22, 'System Document Form', 'SystemDocumentForm'),
	(23, 'System Document Upload Form', 'SystemDocumentUploadForm'),
	(24, 'System Document List', 'SystemDocumentList'),
	(25, 'System Shared Document List', 'SystemSharedDocumentList'),
	(26, 'System Unit Form', 'SystemUnitForm'),
	(27, 'System Unit List', 'SystemUnitList'),
	(28, 'System Access stats', 'SystemAccessLogStats'),
	(29, 'System Preference form', 'SystemPreferenceForm'),
	(30, 'System Support form', 'SystemSupportForm'),
	(31, 'System PHP Error', 'SystemPHPErrorLogView'),
	(32, 'System Database Browser', 'SystemDatabaseExplorer'),
	(33, 'System Table List', 'SystemTableList'),
	(34, 'System Data Browser', 'SystemDataBrowser'),
	(35, 'Cadastro de Clientes', 'UsuariosForm'),
	(36, 'Lista de Clientes', 'UsuariosList'),
	(37, 'Cadastro de Tipos de Usuários', 'UsuariostiposFormList'),
	(38, 'Dashboard', 'dashboard'),
	(39, 'Public View', 'PublicView'),
	(40, 'User Dashboard', 'userdashboard'),
	(44, 'Cadastro de Tipos - Espécie', 'AnimaistiposFormList'),
	(42, 'Cadastro de Raças', 'AnimaisracasFormList'),
	(43, 'Cadastro de Animais', 'AnimaisForm'),
	(45, 'Cadastro de Item de Estoque', 'EstoqueForm'),
	(47, 'Lista de Estoque', 'EstoqueList');
/*!40000 ALTER TABLE `system_program` ENABLE KEYS */;

-- Copiando estrutura para tabela sys_multioffice.system_sql_log
DROP TABLE IF EXISTS `system_sql_log`;
CREATE TABLE IF NOT EXISTS `system_sql_log` (
  `id` int(11) NOT NULL,
  `logdate` timestamp NULL DEFAULT NULL,
  `login` text,
  `database_name` text,
  `sql_command` text,
  `statement_type` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sys_multioffice.system_sql_log: 0 rows
/*!40000 ALTER TABLE `system_sql_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `system_sql_log` ENABLE KEYS */;

-- Copiando estrutura para tabela sys_multioffice.system_unit
DROP TABLE IF EXISTS `system_unit`;
CREATE TABLE IF NOT EXISTS `system_unit` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sys_multioffice.system_unit: 2 rows
/*!40000 ALTER TABLE `system_unit` DISABLE KEYS */;
INSERT INTO `system_unit` (`id`, `name`) VALUES
	(1, 'Unidade 1 - TESTE'),
	(2, 'Pet-Shop-Show');
/*!40000 ALTER TABLE `system_unit` ENABLE KEYS */;

-- Copiando estrutura para tabela sys_multioffice.system_user
DROP TABLE IF EXISTS `system_user`;
CREATE TABLE IF NOT EXISTS `system_user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `frontpage_id` int(11) DEFAULT NULL,
  `system_unit_id` int(11) DEFAULT NULL,
  `active` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sys_user_program_idx` (`frontpage_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sys_multioffice.system_user: 3 rows
/*!40000 ALTER TABLE `system_user` DISABLE KEYS */;
INSERT INTO `system_user` (`id`, `name`, `login`, `password`, `email`, `frontpage_id`, `system_unit_id`, `active`) VALUES
	(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.net', 38, 1, 'Y'),
	(2, 'User', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@user.net', 7, NULL, 'Y'),
	(3, 'PET-User', 'pet', '6c43c0a88fbf0f44ba944d00524e45c3', NULL, NULL, 1, 'Y');
/*!40000 ALTER TABLE `system_user` ENABLE KEYS */;

-- Copiando estrutura para tabela sys_multioffice.system_user_group
DROP TABLE IF EXISTS `system_user_group`;
CREATE TABLE IF NOT EXISTS `system_user_group` (
  `id` int(11) NOT NULL,
  `system_user_id` int(11) DEFAULT NULL,
  `system_group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sys_user_group_group_idx` (`system_group_id`),
  KEY `sys_user_group_user_idx` (`system_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sys_multioffice.system_user_group: 3 rows
/*!40000 ALTER TABLE `system_user_group` DISABLE KEYS */;
INSERT INTO `system_user_group` (`id`, `system_user_id`, `system_group_id`) VALUES
	(4, 2, 2),
	(5, 1, 1),
	(6, 3, 3);
/*!40000 ALTER TABLE `system_user_group` ENABLE KEYS */;

-- Copiando estrutura para tabela sys_multioffice.system_user_program
DROP TABLE IF EXISTS `system_user_program`;
CREATE TABLE IF NOT EXISTS `system_user_program` (
  `id` int(11) NOT NULL,
  `system_user_id` int(11) DEFAULT NULL,
  `system_program_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sys_user_program_program_idx` (`system_program_id`),
  KEY `sys_user_program_user_idx` (`system_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sys_multioffice.system_user_program: 1 rows
/*!40000 ALTER TABLE `system_user_program` DISABLE KEYS */;
INSERT INTO `system_user_program` (`id`, `system_user_id`, `system_program_id`) VALUES
	(1, 2, 7);
/*!40000 ALTER TABLE `system_user_program` ENABLE KEYS */;

-- Copiando estrutura para tabela sys_multioffice.system_user_unit
DROP TABLE IF EXISTS `system_user_unit`;
CREATE TABLE IF NOT EXISTS `system_user_unit` (
  `id` int(11) NOT NULL,
  `system_user_id` int(11) DEFAULT NULL,
  `system_unit_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `system_user_id` (`system_user_id`),
  KEY `system_unit_id` (`system_unit_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sys_multioffice.system_user_unit: 3 rows
/*!40000 ALTER TABLE `system_user_unit` DISABLE KEYS */;
INSERT INTO `system_user_unit` (`id`, `system_user_id`, `system_unit_id`) VALUES
	(3, 1, 1),
	(2, 2, 1),
	(4, 3, 2);
/*!40000 ALTER TABLE `system_user_unit` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
