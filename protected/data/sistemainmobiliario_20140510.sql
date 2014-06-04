# Host: localhost  (Version: 5.6.17)
# Date: 2014-05-20 23:01:24
# Generator: MySQL-Front 5.3  (Build 4.122)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "cruge_authitem"
#

DROP TABLE IF EXISTS `cruge_authitem`;
CREATE TABLE `cruge_authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "cruge_authitem"
#

INSERT INTO `cruge_authitem` VALUES ('action_actividad_admin',0,'',NULL,'N;'),('action_barrio_admin',0,'',NULL,'N;'),('action_barrio_create',0,'',NULL,'N;'),('action_barrio_view',0,'',NULL,'N;'),('action_ciudad_admin',0,'',NULL,'N;'),('action_ciudad_create',0,'',NULL,'N;'),('action_ciudad_view',0,'',NULL,'N;'),('action_cobranzaEtapa_admin',0,'',NULL,'N;'),('action_eventoPrioridad_admin',0,'',NULL,'N;'),('action_grupo_admin',0,'',NULL,'N;'),('action_incidenciaCategoria_admin',0,'',NULL,'N;'),('action_incidenciaEstado_admin',0,'',NULL,'N;'),('action_incidenciaMotivo_admin',0,'',NULL,'N;'),('action_incidenciaPrioridad_admin',0,'',NULL,'N;'),('action_incidenciaSubmotivo_admin',0,'',NULL,'N;'),('action_incidenciaViaIngreso_admin',0,'',NULL,'N;'),('action_industria_admin',0,'',NULL,'N;'),('action_llamadaMotivo_admin',0,'',NULL,'N;'),('action_llamadaSubestado_admin',0,'',NULL,'N;'),('action_llamadaSubmotivo_admin',0,'',NULL,'N;'),('action_llamada_historialEntrantes',0,'',NULL,'N;'),('action_llamada_historialSalientes',0,'',NULL,'N;'),('action_mailAsunto_admin',0,'',NULL,'N;'),('action_mailPlantilla_admin',0,'',NULL,'N;'),('action_mail_historial',0,'',NULL,'N;'),('action_oportunidadEtapa_admin',0,'',NULL,'N;'),('action_provincia_admin',0,'',NULL,'N;'),('action_provincia_create',0,'',NULL,'N;'),('action_provincia_view',0,'',NULL,'N;'),('action_smsMotivo_admin',0,'',NULL,'N;'),('action_smsPlantilla_admin',0,'',NULL,'N;'),('action_sms_historial',0,'',NULL,'N;'),('action_tareaEtapa_admin',0,'',NULL,'N;'),('action_ui_editprofile',0,'',NULL,'N;'),('action_ui_fieldsadmincreate',0,'',NULL,'N;'),('action_ui_fieldsadminlist',0,'',NULL,'N;'),('action_ui_rbaclistops',0,'',NULL,'N;'),('action_ui_rbaclistroles',0,'',NULL,'N;'),('action_ui_rbaclisttasks',0,'',NULL,'N;'),('action_ui_rbacusersassignments',0,'',NULL,'N;'),('action_ui_systemupdate',0,'',NULL,'N;'),('action_ui_usermanagementadmin',0,'',NULL,'N;'),('action_ui_usermanagementcreate',0,'',NULL,'N;'),('action_ui_usermanagementupdate',0,'',NULL,'N;'),('admin',0,'',NULL,'N;'),('Cruge.ui.*',0,'',NULL,'N;'),('edit-advanced-profile-features',0,'C:\\wamp\\www\\sistemainmobiliario\\protected\\modules\\cruge\\views\\ui\\usermanagementupdate.php linea 98',NULL,'N;'),('importar_archivo_csv',0,'',NULL,'N;');

#
# Structure for table "cruge_authitemchild"
#

DROP TABLE IF EXISTS `cruge_authitemchild`;
CREATE TABLE `cruge_authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `crugeauthitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `cruge_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `crugeauthitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `cruge_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "cruge_authitemchild"
#


#
# Structure for table "cruge_field"
#

DROP TABLE IF EXISTS `cruge_field`;
CREATE TABLE `cruge_field` (
  `idfield` int(11) NOT NULL AUTO_INCREMENT,
  `fieldname` varchar(20) NOT NULL,
  `longname` varchar(50) DEFAULT NULL,
  `position` int(11) DEFAULT '0',
  `required` int(11) DEFAULT '0',
  `fieldtype` int(11) DEFAULT '0',
  `fieldsize` int(11) DEFAULT '20',
  `maxlength` int(11) DEFAULT '45',
  `showinreports` int(11) DEFAULT '0',
  `useregexp` varchar(512) DEFAULT NULL,
  `useregexpmsg` varchar(512) DEFAULT NULL,
  `predetvalue` mediumblob,
  PRIMARY KEY (`idfield`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "cruge_field"
#


#
# Structure for table "cruge_session"
#

DROP TABLE IF EXISTS `cruge_session`;
CREATE TABLE `cruge_session` (
  `idsession` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `created` bigint(30) DEFAULT NULL,
  `expire` bigint(30) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `ipaddress` varchar(45) DEFAULT NULL,
  `usagecount` int(11) DEFAULT '0',
  `lastusage` bigint(30) DEFAULT NULL,
  `logoutdate` bigint(30) DEFAULT NULL,
  `ipaddressout` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idsession`),
  KEY `crugesession_iduser` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Data for table "cruge_session"
#

INSERT INTO `cruge_session` VALUES (1,1,1400448630,1400496630,1,'::1',4,1400464708,NULL,NULL),(2,1,1400502909,1400550909,0,'::1',4,1400534156,1400535239,'::1'),(3,1,1400535246,1400583246,0,'::1',6,1400549119,1400550759,'::1'),(4,1,1400551652,1400553452,0,'::1',1,1400551652,1400552554,'::1'),(5,1,1400554269,1400556069,1,'::1',1,1400554269,NULL,NULL),(6,1,1400643100,1400644900,0,'::1',1,1400643100,1400643107,'::1'),(7,1,1400643112,1400644912,0,'::1',1,1400643112,1400644799,'::1');

#
# Structure for table "cruge_system"
#

DROP TABLE IF EXISTS `cruge_system`;
CREATE TABLE `cruge_system` (
  `idsystem` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `largename` varchar(45) DEFAULT NULL,
  `sessionmaxdurationmins` int(11) DEFAULT '30',
  `sessionmaxsameipconnections` int(11) DEFAULT '10',
  `sessionreusesessions` int(11) DEFAULT '1' COMMENT '1yes 0no',
  `sessionmaxsessionsperday` int(11) DEFAULT '-1',
  `sessionmaxsessionsperuser` int(11) DEFAULT '-1',
  `systemnonewsessions` int(11) DEFAULT '0' COMMENT '1yes 0no',
  `systemdown` int(11) DEFAULT '0',
  `registerusingcaptcha` int(11) DEFAULT '0',
  `registerusingterms` int(11) DEFAULT '0',
  `terms` blob,
  `registerusingactivation` int(11) DEFAULT '1',
  `defaultroleforregistration` varchar(64) DEFAULT NULL,
  `registerusingtermslabel` varchar(100) DEFAULT NULL,
  `registrationonlogin` int(11) DEFAULT '1',
  PRIMARY KEY (`idsystem`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "cruge_system"
#

INSERT INTO `cruge_system` VALUES (1,'default',NULL,30,10,1,-1,-1,0,0,0,0,NULL,0,'','',1);

#
# Structure for table "cruge_user"
#

DROP TABLE IF EXISTS `cruge_user`;
CREATE TABLE `cruge_user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `regdate` bigint(30) DEFAULT NULL,
  `actdate` bigint(30) DEFAULT NULL,
  `logondate` bigint(30) DEFAULT NULL,
  `username` varchar(64) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL COMMENT 'Hashed password',
  `authkey` varchar(100) DEFAULT NULL COMMENT 'llave de autentificacion',
  `state` int(11) DEFAULT '0',
  `totalsessioncounter` int(11) DEFAULT '0',
  `currentsessioncounter` int(11) DEFAULT '0',
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "cruge_user"
#

INSERT INTO `cruge_user` VALUES (1,NULL,NULL,1400643112,'admin','armand1live@gmail.com','admin','admin',1,0,0);

#
# Structure for table "cruge_fieldvalue"
#

DROP TABLE IF EXISTS `cruge_fieldvalue`;
CREATE TABLE `cruge_fieldvalue` (
  `idfieldvalue` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `idfield` int(11) NOT NULL,
  `value` blob,
  PRIMARY KEY (`idfieldvalue`),
  KEY `fk_cruge_fieldvalue_cruge_user1` (`iduser`),
  KEY `fk_cruge_fieldvalue_cruge_field1` (`idfield`),
  CONSTRAINT `fk_cruge_fieldvalue_cruge_field1` FOREIGN KEY (`idfield`) REFERENCES `cruge_field` (`idfield`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_cruge_fieldvalue_cruge_user1` FOREIGN KEY (`iduser`) REFERENCES `cruge_user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "cruge_fieldvalue"
#


#
# Structure for table "cruge_authassignment"
#

DROP TABLE IF EXISTS `cruge_authassignment`;
CREATE TABLE `cruge_authassignment` (
  `userid` int(11) NOT NULL,
  `bizrule` text,
  `data` text,
  `itemname` varchar(64) NOT NULL,
  PRIMARY KEY (`userid`,`itemname`),
  KEY `fk_cruge_authassignment_cruge_authitem1` (`itemname`),
  KEY `fk_cruge_authassignment_user` (`userid`),
  CONSTRAINT `fk_cruge_authassignment_cruge_authitem1` FOREIGN KEY (`itemname`) REFERENCES `cruge_authitem` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cruge_authassignment_user` FOREIGN KEY (`userid`) REFERENCES `cruge_user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "cruge_authassignment"
#


#
# Structure for table "inmueble"
#

DROP TABLE IF EXISTS `inmueble`;
CREATE TABLE `inmueble` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(500) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL,
  `estado` enum('ACTIVO','INACTIVO') DEFAULT NULL,
  `estado_inmueble` enum('DISPONIBLE','VENDIDO','ARRENDADO','RESERVADO') NOT NULL,
  `direccion_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "inmueble"
#


#
# Structure for table "inmueble_imagen"
#

DROP TABLE IF EXISTS `inmueble_imagen`;
CREATE TABLE `inmueble_imagen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `ruta` varchar(45) NOT NULL,
  `inmueble_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_inmueble_imagen_inmueble1_idx` (`inmueble_id`),
  CONSTRAINT `fk_inmueble_imagen_inmueble1` FOREIGN KEY (`inmueble_id`) REFERENCES `inmueble` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "inmueble_imagen"
#


#
# Structure for table "provincia"
#

DROP TABLE IF EXISTS `provincia`;
CREATE TABLE `provincia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(21) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "provincia"
#

INSERT INTO `provincia` VALUES (1,'Imbabura'),(2,'Pichincha');

#
# Structure for table "ciudad"
#

DROP TABLE IF EXISTS `ciudad`;
CREATE TABLE `ciudad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(32) NOT NULL,
  `provincia_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ciudad_provincia1_idx` (`provincia_id`),
  CONSTRAINT `fk_ciudad_provincia1` FOREIGN KEY (`provincia_id`) REFERENCES `provincia` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "ciudad"
#

INSERT INTO `ciudad` VALUES (1,'Otavalo',1),(2,'Ibarra',1);

#
# Structure for table "barrio"
#

DROP TABLE IF EXISTS `barrio`;
CREATE TABLE `barrio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(32) NOT NULL,
  `ciudad_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_barrio_ciudad1_idx` (`ciudad_id`),
  CONSTRAINT `fk_barrio_ciudad1` FOREIGN KEY (`ciudad_id`) REFERENCES `ciudad` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "barrio"
#

INSERT INTO `barrio` VALUES (1,'El Jordan',1),(2,'San Luis',1);

#
# Structure for table "direccion"
#

DROP TABLE IF EXISTS `direccion`;
CREATE TABLE `direccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `calle_1` varchar(128) DEFAULT NULL,
  `calle_2` varchar(128) DEFAULT NULL,
  `numero` varchar(8) DEFAULT NULL,
  `referencia` text,
  `barrio_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_direccion_barrio1_idx` (`barrio_id`),
  CONSTRAINT `fk_direccion_barrio1` FOREIGN KEY (`barrio_id`) REFERENCES `barrio` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "direccion"
#


#
# Structure for table "cliente"
#

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` set('COMPRADOR','VENDEDOR') NOT NULL,
  `nombre` varchar(64) NOT NULL,
  `apellido` varchar(64) NOT NULL,
  `razon_social` varchar(64) DEFAULT NULL,
  `celuda` varchar(20) DEFAULT NULL,
  `telefono` varchar(24) DEFAULT NULL,
  `celular` varchar(24) DEFAULT NULL,
  `email_1` varchar(255) DEFAULT NULL,
  `email_2` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `estado` enum('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO',
  `fecha_creacion` datetime NOT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL,
  `direccion_principal_id` int(11) DEFAULT NULL,
  `direccion_secundaria_id` int(11) DEFAULT NULL,
  `ciudad_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_contacto_direccion1_idx` (`direccion_principal_id`),
  KEY `fk_contacto_direccion2_idx` (`direccion_secundaria_id`),
  KEY `fk_contacto_ciudad1_idx` (`ciudad_id`),
  CONSTRAINT `fk_contacto_direccion1` FOREIGN KEY (`direccion_principal_id`) REFERENCES `direccion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_contacto_direccion2` FOREIGN KEY (`direccion_secundaria_id`) REFERENCES `direccion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_contacto_ciudad1` FOREIGN KEY (`ciudad_id`) REFERENCES `ciudad` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "cliente"
#

