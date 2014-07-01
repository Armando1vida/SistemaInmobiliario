SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `sistema_inmobiliario` DEFAULT CHARACTER SET latin1 ;
USE `sistema_inmobiliario` ;

-- -----------------------------------------------------
-- Table `sistema_inmobiliario`.`provincia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sistema_inmobiliario`.`provincia` ;

CREATE TABLE IF NOT EXISTS `sistema_inmobiliario`.`provincia` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 6;


-- -----------------------------------------------------
-- Table `sistema_inmobiliario`.`ciudad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sistema_inmobiliario`.`ciudad` ;

CREATE TABLE IF NOT EXISTS `sistema_inmobiliario`.`ciudad` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `provincia_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_ciudad_provincia1_idx` (`provincia_id` ASC),
  CONSTRAINT `fk_ciudad_provincia1`
    FOREIGN KEY (`provincia_id`)
    REFERENCES `sistema_inmobiliario`.`provincia` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 9;


-- -----------------------------------------------------
-- Table `sistema_inmobiliario`.`barrio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sistema_inmobiliario`.`barrio` ;

CREATE TABLE IF NOT EXISTS `sistema_inmobiliario`.`barrio` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `ciudad_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_barrio_ciudad1_idx` (`ciudad_id` ASC),
  CONSTRAINT `fk_barrio_ciudad1`
    FOREIGN KEY (`ciudad_id`)
    REFERENCES `sistema_inmobiliario`.`ciudad` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 8;


-- -----------------------------------------------------
-- Table `sistema_inmobiliario`.`cliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sistema_inmobiliario`.`cliente` ;

CREATE TABLE IF NOT EXISTS `sistema_inmobiliario`.`cliente` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `tipo` SET('COMPRADOR','VENDEDOR') NOT NULL,
  `nombre` VARCHAR(64) NOT NULL,
  `apellido` VARCHAR(64) NOT NULL,
  `razon_social` VARCHAR(64) NULL DEFAULT NULL,
  `cedula` VARCHAR(20) NULL DEFAULT NULL,
  `telefono` VARCHAR(24) NULL DEFAULT NULL,
  `celular` VARCHAR(24) NULL DEFAULT NULL,
  `email` VARCHAR(50) NULL DEFAULT NULL,
  `descripcion` TEXT NULL DEFAULT NULL,
  `estado` ENUM('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO',
  `fecha_creacion` DATETIME NOT NULL,
  `fecha_actualizacion` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 101;


-- -----------------------------------------------------
-- Table `sistema_inmobiliario`.`cruge_authitem`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sistema_inmobiliario`.`cruge_authitem` ;

CREATE TABLE IF NOT EXISTS `sistema_inmobiliario`.`cruge_authitem` (
  `name` VARCHAR(64) NOT NULL,
  `type` INT(11) NOT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `bizrule` TEXT NULL DEFAULT NULL,
  `data` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`name`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sistema_inmobiliario`.`cruge_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sistema_inmobiliario`.`cruge_user` ;

CREATE TABLE IF NOT EXISTS `sistema_inmobiliario`.`cruge_user` (
  `iduser` INT(11) NOT NULL AUTO_INCREMENT,
  `regdate` BIGINT(30) NULL DEFAULT NULL,
  `actdate` BIGINT(30) NULL DEFAULT NULL,
  `logondate` BIGINT(30) NULL DEFAULT NULL,
  `username` VARCHAR(64) NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `password` VARCHAR(64) NULL DEFAULT NULL COMMENT 'Hashed password',
  `authkey` VARCHAR(100) NULL DEFAULT NULL COMMENT 'llave de autentificacion',
  `state` INT(11) NULL DEFAULT '0',
  `totalsessioncounter` INT(11) NULL DEFAULT '0',
  `currentsessioncounter` INT(11) NULL DEFAULT '0',
  PRIMARY KEY (`iduser`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sistema_inmobiliario`.`cruge_authassignment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sistema_inmobiliario`.`cruge_authassignment` ;

CREATE TABLE IF NOT EXISTS `sistema_inmobiliario`.`cruge_authassignment` (
  `userid` INT(11) NOT NULL,
  `bizrule` TEXT NULL DEFAULT NULL,
  `data` TEXT NULL DEFAULT NULL,
  `itemname` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`userid`, `itemname`),
  INDEX `fk_cruge_authassignment_cruge_authitem1` (`itemname` ASC),
  INDEX `fk_cruge_authassignment_user` (`userid` ASC),
  CONSTRAINT `fk_cruge_authassignment_cruge_authitem1`
    FOREIGN KEY (`itemname`)
    REFERENCES `sistema_inmobiliario`.`cruge_authitem` (`name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cruge_authassignment_user`
    FOREIGN KEY (`userid`)
    REFERENCES `sistema_inmobiliario`.`cruge_user` (`iduser`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sistema_inmobiliario`.`cruge_authitemchild`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sistema_inmobiliario`.`cruge_authitemchild` ;

CREATE TABLE IF NOT EXISTS `sistema_inmobiliario`.`cruge_authitemchild` (
  `parent` VARCHAR(64) NOT NULL,
  `child` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`parent`, `child`),
  INDEX `child` (`child` ASC),
  CONSTRAINT `crugeauthitemchild_ibfk_1`
    FOREIGN KEY (`parent`)
    REFERENCES `sistema_inmobiliario`.`cruge_authitem` (`name`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `crugeauthitemchild_ibfk_2`
    FOREIGN KEY (`child`)
    REFERENCES `sistema_inmobiliario`.`cruge_authitem` (`name`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sistema_inmobiliario`.`cruge_field`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sistema_inmobiliario`.`cruge_field` ;

CREATE TABLE IF NOT EXISTS `sistema_inmobiliario`.`cruge_field` (
  `idfield` INT(11) NOT NULL AUTO_INCREMENT,
  `fieldname` VARCHAR(20) NOT NULL,
  `longname` VARCHAR(50) NULL DEFAULT NULL,
  `position` INT(11) NULL DEFAULT '0',
  `required` INT(11) NULL DEFAULT '0',
  `fieldtype` INT(11) NULL DEFAULT '0',
  `fieldsize` INT(11) NULL DEFAULT '20',
  `maxlength` INT(11) NULL DEFAULT '45',
  `showinreports` INT(11) NULL DEFAULT '0',
  `useregexp` VARCHAR(512) NULL DEFAULT NULL,
  `useregexpmsg` VARCHAR(512) NULL DEFAULT NULL,
  `predetvalue` MEDIUMBLOB NULL DEFAULT NULL,
  PRIMARY KEY (`idfield`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sistema_inmobiliario`.`cruge_fieldvalue`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sistema_inmobiliario`.`cruge_fieldvalue` ;

CREATE TABLE IF NOT EXISTS `sistema_inmobiliario`.`cruge_fieldvalue` (
  `idfieldvalue` INT(11) NOT NULL AUTO_INCREMENT,
  `iduser` INT(11) NOT NULL,
  `idfield` INT(11) NOT NULL,
  `value` BLOB NULL DEFAULT NULL,
  PRIMARY KEY (`idfieldvalue`),
  INDEX `fk_cruge_fieldvalue_cruge_user1` (`iduser` ASC),
  INDEX `fk_cruge_fieldvalue_cruge_field1` (`idfield` ASC),
  CONSTRAINT `fk_cruge_fieldvalue_cruge_field1`
    FOREIGN KEY (`idfield`)
    REFERENCES `sistema_inmobiliario`.`cruge_field` (`idfield`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cruge_fieldvalue_cruge_user1`
    FOREIGN KEY (`iduser`)
    REFERENCES `sistema_inmobiliario`.`cruge_user` (`iduser`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sistema_inmobiliario`.`cruge_session`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sistema_inmobiliario`.`cruge_session` ;

CREATE TABLE IF NOT EXISTS `sistema_inmobiliario`.`cruge_session` (
  `idsession` INT(11) NOT NULL AUTO_INCREMENT,
  `iduser` INT(11) NOT NULL,
  `created` BIGINT(30) NULL DEFAULT NULL,
  `expire` BIGINT(30) NULL DEFAULT NULL,
  `status` INT(11) NULL DEFAULT '0',
  `ipaddress` VARCHAR(45) NULL DEFAULT NULL,
  `usagecount` INT(11) NULL DEFAULT '0',
  `lastusage` BIGINT(30) NULL DEFAULT NULL,
  `logoutdate` BIGINT(30) NULL DEFAULT NULL,
  `ipaddressout` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idsession`),
  INDEX `crugesession_iduser` (`iduser` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 20
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sistema_inmobiliario`.`cruge_system`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sistema_inmobiliario`.`cruge_system` ;

CREATE TABLE IF NOT EXISTS `sistema_inmobiliario`.`cruge_system` (
  `idsystem` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `largename` VARCHAR(45) NULL DEFAULT NULL,
  `sessionmaxdurationmins` INT(11) NULL DEFAULT '30',
  `sessionmaxsameipconnections` INT(11) NULL DEFAULT '10',
  `sessionreusesessions` INT(11) NULL DEFAULT '1' COMMENT '1yes 0no',
  `sessionmaxsessionsperday` INT(11) NULL DEFAULT '-1',
  `sessionmaxsessionsperuser` INT(11) NULL DEFAULT '-1',
  `systemnonewsessions` INT(11) NULL DEFAULT '0' COMMENT '1yes 0no',
  `systemdown` INT(11) NULL DEFAULT '0',
  `registerusingcaptcha` INT(11) NULL DEFAULT '0',
  `registerusingterms` INT(11) NULL DEFAULT '0',
  `terms` BLOB NULL DEFAULT NULL,
  `registerusingactivation` INT(11) NULL DEFAULT '1',
  `defaultroleforregistration` VARCHAR(64) NULL DEFAULT NULL,
  `registerusingtermslabel` VARCHAR(100) NULL DEFAULT NULL,
  `registrationonlogin` INT(11) NULL DEFAULT '1',
  PRIMARY KEY (`idsystem`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sistema_inmobiliario`.`direccion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sistema_inmobiliario`.`direccion` ;

CREATE TABLE IF NOT EXISTS `sistema_inmobiliario`.`direccion` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` INT(11) NOT NULL,
  `calle_1` VARCHAR(128) NULL DEFAULT NULL,
  `calle_2` VARCHAR(128) NULL DEFAULT NULL,
  `numero` VARCHAR(8) NULL DEFAULT NULL,
  `referencia` TEXT NULL DEFAULT NULL,
  `barrio_id` INT(11) NULL DEFAULT NULL,
  `ciudad_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `cliente_id`),
  INDEX `fk_direccion_barrio1_idx` (`barrio_id` ASC),
  INDEX `fk_direccion_ciudad1_idx` (`ciudad_id` ASC),
  INDEX `fk_direccion_cliente1_idx` (`cliente_id` ASC),
  CONSTRAINT `fk_direccion_barrio1`
    FOREIGN KEY (`barrio_id`)
    REFERENCES `sistema_inmobiliario`.`barrio` (`id`)
    ON DELETE SET NULL
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_direccion_ciudad1`
    FOREIGN KEY (`ciudad_id`)
    REFERENCES `sistema_inmobiliario`.`ciudad` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_direccion_cliente1`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `sistema_inmobiliario`.`cliente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 101;


-- -----------------------------------------------------
-- Table `sistema_inmobiliario`.`inmueble`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sistema_inmobiliario`.`inmueble` ;

CREATE TABLE IF NOT EXISTS `sistema_inmobiliario`.`inmueble` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `cliente_propietario_id` INT(11) NULL,
  `cliente_negocio_id` INT(11) NULL,
  `direccion_id` INT(11) NOT NULL,
  `estado` ENUM('ACTIVO','INACTIVO') NOT NULL,
  `precio` DECIMAL(10,2) NULL,
  `estado_inmueble` ENUM('DISPONIBLE','VENDIDO','ARRENDADO','RESERVADO') NOT NULL,
  `fecha_publicacion` DATETIME NOT NULL,
  `fecha_actualizacion` DATETIME NULL DEFAULT NULL,
  `fecha_negocio` DATETIME NULL,
  `numero_habitacion` INT(3) NULL,
  `numero_banios` INT(3) NULL,
  `numero_garage` INT(2) NULL,
  `descripcion` VARCHAR(500) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_inmobiliario`.`inmueble_imagen`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sistema_inmobiliario`.`inmueble_imagen` ;

CREATE TABLE IF NOT EXISTS `sistema_inmobiliario`.`inmueble_imagen` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `ruta` VARCHAR(45) NOT NULL,
  `inmueble_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_inmueble_imagen_inmueble1_idx` (`inmueble_id` ASC),
  CONSTRAINT `fk_inmueble_imagen_inmueble1`
    FOREIGN KEY (`inmueble_id`)
    REFERENCES `sistema_inmobiliario`.`inmueble` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
