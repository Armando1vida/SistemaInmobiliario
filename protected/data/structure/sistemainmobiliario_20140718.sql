# Host: localhost  (Version: 5.6.17)
# Date: 2014-07-18 02:18:04
# Generator: MySQL-Front 5.3  (Build 4.133)

/*!40101 SET NAMES utf8 */;




CREATE DATABASE IF NOT EXISTS `sistema_inmobiliario` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE  `sistema_inmobiliario`;
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
  `cedula` varchar(20) DEFAULT NULL,
  `telefono` varchar(24) DEFAULT NULL,
  `celular` varchar(24) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `descripcion` text,
  `estado` enum('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO',
  `fecha_creacion` datetime NOT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
# Structure for table "inmueble"
#

DROP TABLE IF EXISTS `inmueble`;
CREATE TABLE `inmueble` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_propietario_id` int(11) DEFAULT NULL,
  `cliente_negocio_id` int(11) DEFAULT NULL,
  `estado` enum('ACTIVO','INACTIVO') NOT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `estado_inmueble` enum('DISPONIBLE','VENDIDO','ARRENDADO','RESERVADO') NOT NULL,
  `fecha_publicacion` datetime NOT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL,
  `fecha_negocio` datetime DEFAULT NULL,
  `numero_habitacion` int(3) DEFAULT NULL,
  `numero_banio` int(3) DEFAULT NULL,
  `numero_garage` int(2) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

#
# Structure for table "inmueble_imagen"
#

DROP TABLE IF EXISTS `inmueble_imagen`;
CREATE TABLE `inmueble_imagen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL DEFAULT '',
  `ruta` varchar(200) NOT NULL DEFAULT '',
  `inmueble_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_inmueble_imagen_inmueble1_idx` (`inmueble_id`),
  CONSTRAINT `fk_inmueble_imagen_inmueble1` FOREIGN KEY (`inmueble_id`) REFERENCES `inmueble` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

#
# Structure for table "provincia"
#

DROP TABLE IF EXISTS `provincia`;
CREATE TABLE `provincia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

#
# Structure for table "ciudad"
#

DROP TABLE IF EXISTS `ciudad`;
CREATE TABLE `ciudad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `provincia_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ciudad_provincia1_idx` (`provincia_id`),
  CONSTRAINT `fk_ciudad_provincia1` FOREIGN KEY (`provincia_id`) REFERENCES `provincia` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17061 DEFAULT CHARSET=latin1;

#
# Structure for table "barrio"
#

DROP TABLE IF EXISTS `barrio`;
CREATE TABLE `barrio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `ciudad_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_barrio_ciudad1_idx` (`ciudad_id`),
  CONSTRAINT `fk_barrio_ciudad1` FOREIGN KEY (`ciudad_id`) REFERENCES `ciudad` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "direccion"
#

DROP TABLE IF EXISTS `direccion`;
CREATE TABLE `direccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entidad_id` int(11) NOT NULL DEFAULT '0',
  `calle_1` varchar(128) DEFAULT NULL,
  `calle_2` varchar(128) DEFAULT NULL,
  `numero` varchar(8) DEFAULT NULL,
  `referencia` text,
  `barrio_id` int(11) DEFAULT NULL,
  `ciudad_id` int(11) DEFAULT NULL,
  `entidad_tipo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`,`entidad_id`),
  KEY `fk_direccion_barrio1_idx` (`barrio_id`),
  KEY `fk_direccion_ciudad1_idx` (`ciudad_id`),
  KEY `fk_direccion_cliente1_idx` (`entidad_id`),
  CONSTRAINT `fk_direccion_barrio1` FOREIGN KEY (`barrio_id`) REFERENCES `barrio` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  CONSTRAINT `fk_direccion_ciudad1` FOREIGN KEY (`ciudad_id`) REFERENCES `ciudad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_direccion_cliente1` FOREIGN KEY (`entidad_id`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;
