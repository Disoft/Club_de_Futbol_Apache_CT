-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.6.11-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema bd_apachect
--

CREATE DATABASE IF NOT EXISTS bd_apachect;
USE bd_apachect;

--
-- Definition of table `arbitro`
--

DROP TABLE IF EXISTS `arbitro`;
CREATE TABLE `arbitro` (
  `idarbitro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `clasificacion` int(10) unsigned NOT NULL COMMENT 'aceptacion del arbitro',
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idarbitro`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arbitro`
--

/*!40000 ALTER TABLE `arbitro` DISABLE KEYS */;
/*!40000 ALTER TABLE `arbitro` ENABLE KEYS */;


--
-- Definition of table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `idcategoria` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  `idTipoCategoria` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idcategoria`) USING BTREE,
  KEY `FK_tipoCategoria` (`idTipoCategoria`),
  CONSTRAINT `FK_tipoCategoria` FOREIGN KEY (`idTipoCategoria`) REFERENCES `tipo_categoria` (`idTipocategoria`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categoria`
--

/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`idcategoria`,`descripcion`,`idTipoCategoria`) VALUES 
 (1,'Portero',1),
 (2,'Defensor Central',1),
 (3,'Defensor Izquierdo',1),
 (4,'Defensor Derecho',1),
 (5,'Lateral Izquierdo',1),
 (6,'Lateral Derecho',1),
 (7,'Medicampista Central',1),
 (8,'Mediocampista Izquierdo',1),
 (9,'Mediocampista Derecho',1),
 (10,'Delantero Central',1),
 (11,'Delantero Izquierdo',1),
 (12,'Delantero Derecho',1),
 (13,'Habilitado',3),
 (14,'Lesionado',3),
 (15,'Suspendido',3),
 (16,'Titular',3),
 (17,'Suplente',3),
 (18,'Reserva',3),
 (19,'Izquierda',4),
 (20,'Derecha',4),
 (21,'Izquierda y Derecha',4),
 (22,'Inhabilitado',3);
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;


--
-- Definition of table `delegado`
--

DROP TABLE IF EXISTS `delegado`;
CREATE TABLE `delegado` (
  `iddelegado` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iddelegado`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delegado`
--

/*!40000 ALTER TABLE `delegado` DISABLE KEYS */;
INSERT INTO `delegado` (`iddelegado`,`nombres`,`apellidos`,`eliminado`) VALUES 
 (1,'Diego','Antequera',0),
 (2,'Juan','Muriel',0);
/*!40000 ALTER TABLE `delegado` ENABLE KEYS */;


--
-- Definition of table `equipo`
--

DROP TABLE IF EXISTS `equipo`;
CREATE TABLE `equipo` (
  `idequipo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `historia` varchar(1000) NOT NULL,
  `vision` varchar(1000) NOT NULL,
  `iddelegado` int(10) unsigned NOT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idequipo`) USING BTREE,
  KEY `FK_Equipo_delegado` (`iddelegado`) USING BTREE,
  CONSTRAINT `FK_Equipo_delegado` FOREIGN KEY (`idDelegado`) REFERENCES `delegado` (`idDelegado`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipo`
--

/*!40000 ALTER TABLE `equipo` DISABLE KEYS */;
INSERT INTO `equipo` (`idequipo`,`nombre`,`historia`,`vision`,`iddelegado`,`eliminado`) VALUES 
 (1,'Apache C+ Turbo','Equipo de la LDCCT con 3 años de trayectoria','Llegar a ser campeon de la LDCCT',1,0);
/*!40000 ALTER TABLE `equipo` ENABLE KEYS */;


--
-- Definition of table `equiporival`
--

DROP TABLE IF EXISTS `equiporival`;
CREATE TABLE `equiporival` (
  `idequiporival` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `urlinformacion` varchar(150) NOT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idequiporival`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equiporival`
--

/*!40000 ALTER TABLE `equiporival` DISABLE KEYS */;
/*!40000 ALTER TABLE `equiporival` ENABLE KEYS */;


--
-- Definition of table `eventos`
--

DROP TABLE IF EXISTS `eventos`;
CREATE TABLE `eventos` (
  `idEventos` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `fechaPublicacion` datetime NOT NULL,
  `fechaEvento` datetime NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  `idEquipo` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idEventos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventos`
--

/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;


--
-- Definition of table `foto`
--

DROP TABLE IF EXISTS `foto`;
CREATE TABLE `foto` (
  `idFoto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) NOT NULL DEFAULT 'sin descripcion',
  `url` varchar(200) NOT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idFoto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto`
--

/*!40000 ALTER TABLE `foto` DISABLE KEYS */;
/*!40000 ALTER TABLE `foto` ENABLE KEYS */;


--
-- Definition of table `galeria_fotos`
--

DROP TABLE IF EXISTS `galeria_fotos`;
CREATE TABLE `galeria_fotos` (
  `idgaleriafotos` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  `idfoto` int(10) unsigned NOT NULL,
  `idequipo` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idgaleriafotos`) USING BTREE,
  KEY `FK_galeriafotos_foto` (`idfoto`) USING BTREE,
  CONSTRAINT `FK_galeriafotos_foto` FOREIGN KEY (`idFoto`) REFERENCES `foto` (`idFoto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Galeria de fotos';

--
-- Dumping data for table `galeria_fotos`
--

/*!40000 ALTER TABLE `galeria_fotos` DISABLE KEYS */;
/*!40000 ALTER TABLE `galeria_fotos` ENABLE KEYS */;


--
-- Definition of table `jugador`
--

DROP TABLE IF EXISTS `jugador`;
CREATE TABLE `jugador` (
  `idjugador` int(10) unsigned NOT NULL,
  `nrocamiseta` int(10) unsigned NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `apodo` varchar(45) NOT NULL,
  `posicioncid` int(10) unsigned NOT NULL,
  `nacimiento` date NOT NULL,
  `estadocid` int(10) unsigned NOT NULL,
  `piernahabilcid` int(10) unsigned NOT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  `idequipo` int(10) unsigned NOT NULL,
  `idnomina` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idjugador`) USING BTREE,
  KEY `FK_jugador_equipo` (`idequipo`) USING BTREE,
  KEY `FK_jugador_nomina` (`idnomina`) USING BTREE,
  CONSTRAINT `FK_jugador_equipo` FOREIGN KEY (`idEquipo`) REFERENCES `equipo` (`idEquipo`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jugador`
--

/*!40000 ALTER TABLE `jugador` DISABLE KEYS */;
/*!40000 ALTER TABLE `jugador` ENABLE KEYS */;


--
-- Definition of table `jugador_nomina`
--

DROP TABLE IF EXISTS `jugador_nomina`;
CREATE TABLE `jugador_nomina` (
  `idnomina` int(10) unsigned NOT NULL,
  `idjugador` int(10) unsigned NOT NULL,
  `estadocid` int(10) unsigned NOT NULL,
  `sancionlid` int(10) unsigned NOT NULL,
  `goles` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idnomina`,`idjugador`) USING BTREE,
  KEY `FK_DetalleNomina_jugador` (`idjugador`) USING BTREE,
  CONSTRAINT `FK_DetalleNomina_jugador` FOREIGN KEY (`idJugador`) REFERENCES `jugador` (`idJugador`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_DetalleNomina_nomina` FOREIGN KEY (`idNomina`) REFERENCES `nomina_jugadores` (`idNominajugadores`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jugador_nomina`
--

/*!40000 ALTER TABLE `jugador_nomina` DISABLE KEYS */;
/*!40000 ALTER TABLE `jugador_nomina` ENABLE KEYS */;


--
-- Definition of table `lista_sancion`
--

DROP TABLE IF EXISTS `lista_sancion`;
CREATE TABLE `lista_sancion` (
  `idlistasancion` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  `costo` double NOT NULL,
  `cantpartsanc` int(10) unsigned NOT NULL COMMENT 'Cantidad de partidos sancionados',
  PRIMARY KEY (`idlistasancion`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lista_sancion`
--

/*!40000 ALTER TABLE `lista_sancion` DISABLE KEYS */;
INSERT INTO `lista_sancion` (`idlistasancion`,`descripcion`,`costo`,`cantpartsanc`) VALUES 
 (1,'Tarjeta Amarilla',3,0),
 (2,'Tarjeta Roja (Doble Amarilla)',5,1),
 (3,'Tarjeta Roja Directa',7,2),
 (4,'Tarjeta Amarilla - Tarjeta Roja',5,2);
/*!40000 ALTER TABLE `lista_sancion` ENABLE KEYS */;


--
-- Definition of table `logros`
--

DROP TABLE IF EXISTS `logros`;
CREATE TABLE `logros` (
  `idlogros` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  `idequipo` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idlogros`) USING BTREE,
  KEY `FK_logros_equipo` (`idequipo`) USING BTREE,
  CONSTRAINT `FK_logros_equipo` FOREIGN KEY (`idEquipo`) REFERENCES `equipo` (`idEquipo`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logros`
--

/*!40000 ALTER TABLE `logros` DISABLE KEYS */;
/*!40000 ALTER TABLE `logros` ENABLE KEYS */;


--
-- Definition of table `nomina_jugadores`
--

DROP TABLE IF EXISTS `nomina_jugadores`;
CREATE TABLE `nomina_jugadores` (
  `idnominajugadores` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `observacion` varchar(200) NOT NULL,
  `informearbitral` varchar(200) NOT NULL,
  `eliminado` tinyint(1) NOT NULL,
  `idpartido` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idnominajugadores`) USING BTREE,
  KEY `FK_NominaJugadores_partido` (`idpartido`) USING BTREE,
  CONSTRAINT `FK_NominaJugadores_partido` FOREIGN KEY (`idPartido`) REFERENCES `partido` (`idPartido`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nomina_jugadores`
--

/*!40000 ALTER TABLE `nomina_jugadores` DISABLE KEYS */;
/*!40000 ALTER TABLE `nomina_jugadores` ENABLE KEYS */;


--
-- Definition of table `partido`
--

DROP TABLE IF EXISTS `partido`;
CREATE TABLE `partido` (
  `idpartido` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `horainicio` datetime NOT NULL,
  `horafin` datetime NOT NULL,
  `fecha` datetime NOT NULL,
  `minutoadicional` int(10) unsigned NOT NULL,
  `resultado` varchar(45) NOT NULL,
  `idarbitro` int(10) unsigned NOT NULL,
  `idtorneo` int(10) unsigned NOT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  `idequipo` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idpartido`) USING BTREE,
  KEY `FK_partido_arbitro` (`idarbitro`) USING BTREE,
  KEY `FK_partido_torneo` (`idtorneo`) USING BTREE,
  CONSTRAINT `FK_partido_arbitro` FOREIGN KEY (`idArbitro`) REFERENCES `arbitro` (`idArbitro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_partido_torneo` FOREIGN KEY (`idTorneo`) REFERENCES `torneo` (`idTorneo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partido`
--

/*!40000 ALTER TABLE `partido` DISABLE KEYS */;
/*!40000 ALTER TABLE `partido` ENABLE KEYS */;


--
-- Definition of table `partido_rival`
--

DROP TABLE IF EXISTS `partido_rival`;
CREATE TABLE `partido_rival` (
  `idpartido` int(10) unsigned NOT NULL,
  `idrival` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idpartido`,`idrival`) USING BTREE,
  KEY `FK_detallerival_Rival` (`idrival`) USING BTREE,
  CONSTRAINT `FK_DetalleRival_partido` FOREIGN KEY (`idPartido`) REFERENCES `partido` (`idPartido`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_detallerival_Rival` FOREIGN KEY (`idRival`) REFERENCES `equiporival` (`idEquipoRival`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partido_rival`
--

/*!40000 ALTER TABLE `partido_rival` DISABLE KEYS */;
/*!40000 ALTER TABLE `partido_rival` ENABLE KEYS */;


--
-- Definition of table `reemplazo`
--

DROP TABLE IF EXISTS `reemplazo`;
CREATE TABLE `reemplazo` (
  `idreemplazo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idjugadorentra` int(10) unsigned NOT NULL,
  `idjugadorsale` int(10) unsigned NOT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idreemplazo`) USING BTREE,
  KEY `FK_reemplazo_entra` (`idjugadorentra`) USING BTREE,
  KEY `FK_reemplazo_sale` (`idjugadorsale`) USING BTREE,
  CONSTRAINT `FK_reemplazo_entra` FOREIGN KEY (`idJugadorEntra`) REFERENCES `jugador` (`idJugador`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_reemplazo_sale` FOREIGN KEY (`idJugadorSale`) REFERENCES `jugador` (`idJugador`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reemplazo`
--

/*!40000 ALTER TABLE `reemplazo` DISABLE KEYS */;
/*!40000 ALTER TABLE `reemplazo` ENABLE KEYS */;


--
-- Definition of table `tipo_categoria`
--

DROP TABLE IF EXISTS `tipo_categoria`;
CREATE TABLE `tipo_categoria` (
  `idtipocategoria` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`idtipocategoria`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipo_categoria`
--

/*!40000 ALTER TABLE `tipo_categoria` DISABLE KEYS */;
INSERT INTO `tipo_categoria` (`idtipocategoria`,`descripcion`) VALUES 
 (1,'Posición Jugador'),
 (2,'Tipo de Sanción'),
 (3,'Estado de Jugador'),
 (4,'Pierna Habil');
/*!40000 ALTER TABLE `tipo_categoria` ENABLE KEYS */;


--
-- Definition of table `torneo`
--

DROP TABLE IF EXISTS `torneo`;
CREATE TABLE `torneo` (
  `idtorneo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `temporada` varchar(45) NOT NULL COMMENT 'e.g. II-2013',
  `organizador` varchar(200) NOT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idtorneo`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `torneo`
--

/*!40000 ALTER TABLE `torneo` DISABLE KEYS */;
/*!40000 ALTER TABLE `torneo` ENABLE KEYS */;


--
-- Definition of table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idusuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  `iddelegado` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idusuario`) USING BTREE,
  KEY `FK_usuario_Delegado` (`iddelegado`) USING BTREE,
  CONSTRAINT `FK_usuario_Delegado` FOREIGN KEY (`IDDelegado`) REFERENCES `delegado` (`idDelegado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`idusuario`,`login`,`password`,`eliminado`,`iddelegado`) VALUES 
 (1,'admin','password',0,1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
