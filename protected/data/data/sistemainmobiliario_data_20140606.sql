# Host: localhost  (Version: 5.6.17)
# Date: 2014-06-11 21:40:26
# Generator: MySQL-Front 5.3  (Build 4.122)

/*!40101 SET NAMES utf8 */;

#
# Data for table "cliente"
#


#
# Data for table "cruge_authitem"
#

INSERT INTO `cruge_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES ('action_barrio_admin',0,'',NULL,'N;'),('action_barrio_create',0,'',NULL,'N;'),('action_barrio_update',0,'',NULL,'N;'),('action_ciudad_admin',0,'',NULL,'N;'),('action_ciudad_create',0,'',NULL,'N;'),('action_ciudad_delete',0,'',NULL,'N;'),('action_ciudad_update',0,'',NULL,'N;'),('action_cliente_admin',0,'',NULL,'N;'),('action_cliente_create',0,'',NULL,'N;'),('action_provincia_admin',0,'',NULL,'N;'),('action_provincia_create',0,'',NULL,'N;'),('action_ui_systemupdate',0,'',NULL,'N;'),('action_ui_usermanagementadmin',0,'',NULL,'N;'),('admin',0,'',NULL,'N;'),('Cruge.ui.*',0,'',NULL,'N;');

#
# Data for table "cruge_authitemchild"
#


#
# Data for table "cruge_field"
#


#
# Data for table "cruge_session"
#

INSERT INTO `cruge_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES (1,1,1400448630,1400496630,1,'::1',4,1400464708,NULL,NULL),(2,1,1400502909,1400550909,0,'::1',4,1400534156,1400535239,'::1'),(3,1,1400535246,1400583246,0,'::1',6,1400549119,1400550759,'::1'),(4,1,1400551652,1400553452,0,'::1',1,1400551652,1400552554,'::1'),(5,1,1400554269,1400556069,1,'::1',1,1400554269,NULL,NULL),(6,1,1400643100,1400644900,0,'::1',1,1400643100,1400643107,'::1'),(7,1,1400643112,1400644912,0,'::1',1,1400643112,1400644799,'::1'),(8,1,1401905923,1401907723,1,'127.0.0.1',1,1401905923,NULL,NULL),(9,1,1401911183,1401912983,0,'127.0.0.1',1,1401911183,NULL,NULL),(10,1,1402532945,1402534745,1,'127.0.0.1',1,1402532945,NULL,NULL),(11,1,1402536597,1402538397,0,'::1',1,1402536597,NULL,NULL),(12,1,1402538410,1402540210,0,'::1',1,1402538410,NULL,NULL),(13,1,1402540293,1402542093,1,'::1',1,1402540293,NULL,NULL);

#
# Data for table "cruge_system"
#

INSERT INTO `cruge_system` (`idsystem`,`name`,`largename`,`sessionmaxdurationmins`,`sessionmaxsameipconnections`,`sessionreusesessions`,`sessionmaxsessionsperday`,`sessionmaxsessionsperuser`,`systemnonewsessions`,`systemdown`,`registerusingcaptcha`,`registerusingterms`,`terms`,`registerusingactivation`,`defaultroleforregistration`,`registerusingtermslabel`,`registrationonlogin`) VALUES (1,'default',NULL,800,10,1,-1,-1,0,0,0,0,NULL,0,'','',1);

#
# Data for table "cruge_user"
#

INSERT INTO `cruge_user` (`iduser`,`regdate`,`actdate`,`logondate`,`username`,`email`,`password`,`authkey`,`state`,`totalsessioncounter`,`currentsessioncounter`) VALUES (1,NULL,NULL,1402540293,'admin','armand1live@gmail.com','admin','admin',1,0,0);

#
# Data for table "cruge_fieldvalue"
#


#
# Data for table "cruge_authassignment"
#


#
# Data for table "inmueble"
#


#
# Data for table "inmueble_imagen"
#


#
# Data for table "provincia"
#

INSERT INTO `provincia` (`id`,`nombre`) VALUES (3,'Imbabura'),(4,'Pichincha'),(5,'Esmeraldas');

#
# Data for table "ciudad"
#

INSERT INTO `ciudad` (`id`,`nombre`,`provincia_id`) VALUES (3,'Otavalo',3),(4,'Ibarra',3),(5,'Atuntaqui',3),(6,'Quito',4),(7,'Atacames',5),(8,'Esmeraldas',4);

#
# Data for table "barrio"
#

INSERT INTO `barrio` (`id`,`nombre`,`ciudad_id`) VALUES (3,'San Luis',3),(4,'El Jordan',3),(5,'Azaya',4),(6,'Los Ciebos',4),(7,'San Antonio',4);

#
# Data for table "direccion"
#

