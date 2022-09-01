-- MySQL dump 10.16  Distrib 10.1.40-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: bdferre
-- ------------------------------------------------------
-- Server version	8.0.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `bdferre`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `bdferre` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `bdferre`;

--
-- Table structure for table `detalle_entrada`
--

DROP TABLE IF EXISTS `detalle_entrada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_entrada` (
  `iddetalle_entrada` int(11) NOT NULL AUTO_INCREMENT,
  `idinventario` int(11) DEFAULT NULL,
  `folio_entrada` varchar(45) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `contador` int(11) DEFAULT NULL,
  `observaciones` varchar(100) DEFAULT NULL,
  `lote_producto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`iddetalle_entrada`),
  KEY `folio_entrada_idx` (`folio_entrada`),
  KEY `idinventario_idx` (`idinventario`),
  CONSTRAINT `folio_entrada` FOREIGN KEY (`folio_entrada`) REFERENCES `entrada` (`folio_entrada`),
  CONSTRAINT `idinventario` FOREIGN KEY (`idinventario`) REFERENCES `inventario` (`idinventario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_entrada`
--

LOCK TABLES `detalle_entrada` WRITE;
/*!40000 ALTER TABLE `detalle_entrada` DISABLE KEYS */;
INSERT INTO `detalle_entrada` VALUES (1,1,'E0000001',15,11,'Compra realizada','CF2208011'),(2,2,'E0000001',14,10,'Compra realizada','CF2208012'),(3,3,'E0000002',16,5,'Comprado','CF2208021'),(4,4,'E0000003',17,15,'Compra','CF2208041'),(5,5,'E0000003',14,14,'Compra','CF2208042'),(6,6,'E0000004',20,16,'Compra realizada','CF2208061'),(7,1,'E0000005',14,14,'Compre llaves','CF2208081'),(8,3,'E0000006',1,1,'Devolución realizada','CF2208091'),(9,7,'E0000007',5,4,'Compra','CF2208131'),(10,8,'E0000008',10,8,'Compra realizada','CF2208191');
/*!40000 ALTER TABLE `detalle_entrada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_salida`
--

DROP TABLE IF EXISTS `detalle_salida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_salida` (
  `iddetalle_salida` int(11) NOT NULL AUTO_INCREMENT,
  `idinventario` int(11) DEFAULT NULL,
  `folio_salida` varchar(45) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `observaciones` varchar(45) DEFAULT NULL,
  `lote_producto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`iddetalle_salida`),
  KEY `folio_salida_idx` (`folio_salida`),
  KEY `id_inventario_idx` (`idinventario`),
  CONSTRAINT `folio_salida` FOREIGN KEY (`folio_salida`) REFERENCES `salida` (`folio_salida`),
  CONSTRAINT `id_inventario` FOREIGN KEY (`idinventario`) REFERENCES `inventario` (`idinventario`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_salida`
--

LOCK TABLES `detalle_salida` WRITE;
/*!40000 ALTER TABLE `detalle_salida` DISABLE KEYS */;
INSERT INTO `detalle_salida` VALUES (1,1,'S0000001',2,'Vendido','CF2208011'),(2,3,'S0000002',11,'Vendido','CF2208021'),(3,6,'S0000003',2,'Vendido','CF2208061'),(4,2,'S0000004',4,'Vendido','CF2208012'),(5,7,'S0000005',1,'Se realizo venta','CF2208131'),(6,4,'S0000006',2,'Salida','CF2208041'),(7,1,'S0000006',2,'Salida','CF2208011'),(8,6,'S0000006',2,'Salida','CF2208061'),(9,8,'S0000007',2,'Se vendió','CF2208191');
/*!40000 ALTER TABLE `detalle_salida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleado` (
  `curp` varchar(45) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`curp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES ('AECR730412HOCCHB05','Rubén ','Acevedo Chino',1,'robacesan@hotmail.com'),('AESN160107MOCCNTA2','Natalia','Acevedo Sánchez',1,'rob.acesan@gmail.com'),('AESR011122HOCCNA05','Leonardo','Acevedo Sánchez',1,'luisortizarturo@gmail.com'),('AESR961122HOCCNB05','Roberto ','Acevedo Sánchez',1,'rob.acesan@gmail.com'),('HESY951023MOCRNN03','Yenifer','Hernández López',1,'jh4847149@gmail.com'),('LUOA940930HMNSRR05','Arturo','Luis Ortiz',1,'luisortizarturo@gmail.com'),('SACR780607MOCNRB02','Diana ','Sánchez Córdova ',1,'robertdi2015@gmail.com');
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entrada`
--

DROP TABLE IF EXISTS `entrada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entrada` (
  `folio_entrada` varchar(45) NOT NULL,
  `fecha` varchar(15) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `tipo_entrada` varchar(45) DEFAULT NULL,
  `folio_compra` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`folio_entrada`),
  KEY `idusuario_idx` (`idusuario`),
  CONSTRAINT `idusuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entrada`
--

LOCK TABLES `entrada` WRITE;
/*!40000 ALTER TABLE `entrada` DISABLE KEYS */;
INSERT INTO `entrada` VALUES ('E0000001','2022-08-01',1,'Compra','123456789'),('E0000002','2022-08-02',1,'Compra','987654321'),('E0000003','2022-08-04',1,'Compra','16161255'),('E0000004','2022-08-06',1,'Compra','15487963'),('E0000005','2022-08-08',1,'Compra','012345678'),('E0000006','2022-08-09',1,'Devolucion','S0000002'),('E0000007','2022-08-13',1,'Compra','125460'),('E0000008','2022-08-19',1,'Compra','125043698');
/*!40000 ALTER TABLE `entrada` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `genera_codigoE` BEFORE INSERT ON `entrada` FOR EACH ROW begin
	declare codigo_sigE int;
    set codigo_sigE = (Select ifnull(max(convert(substring(folio_entrada, 2), signed integer)), 0) from entrada) + 1;
    set new.folio_entrada = concat('E', LPAD( codigo_sigE, 7, '0'));
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `inventario`
--

DROP TABLE IF EXISTS `inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventario` (
  `idinventario` int(11) NOT NULL AUTO_INCREMENT,
  `codigoproduc` varchar(45) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `entradas` int(11) DEFAULT NULL,
  `salidas` int(11) DEFAULT NULL,
  PRIMARY KEY (`idinventario`),
  KEY `codigoproduc_idx` (`codigoproduc`),
  CONSTRAINT `codigoproduc` FOREIGN KEY (`codigoproduc`) REFERENCES `producto` (`codigoproduc`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventario`
--

LOCK TABLES `inventario` WRITE;
/*!40000 ALTER TABLE `inventario` DISABLE KEYS */;
INSERT INTO `inventario` VALUES (1,'TRULL000001',25,29,4),(2,'URRPI000002',10,14,4),(3,'DEWST000003',6,17,11),(4,'SURMA000004',15,17,2),(5,'SIESE000005',14,14,0),(6,'PHIAR000006',16,20,4),(7,'HUSDE000007',4,5,1),(8,'SURFL000008',8,10,2);
/*!40000 ALTER TABLE `inventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marca`
--

DROP TABLE IF EXISTS `marca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marca` (
  `idmarca` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idmarca`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marca`
--

LOCK TABLES `marca` WRITE;
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
INSERT INTO `marca` VALUES (1,'TRUPER'),(2,'URREA'),(3,'DEWALT'),(9,'PHILIPS'),(10,'SURTEK'),(12,'PRETUL'),(24,'SIEMENS'),(25,'BARRIL'),(26,'HUSKI'),(27,'OSWALDO');
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `codigoproduc` varchar(45) NOT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `idmarca` int(11) DEFAULT NULL,
  `nombreproducto` varchar(45) DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `stockminimo` int(11) DEFAULT NULL,
  `stockmaximo` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigoproduc`),
  KEY `id_usuario_idx` (`idusuario`),
  KEY `id_marca_idx` (`idmarca`),
  CONSTRAINT `id_marca` FOREIGN KEY (`idmarca`) REFERENCES `marca` (`idmarca`),
  CONSTRAINT `id_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES ('DEWST000003',1,3,'Llave stilson','STI-10P','Llave para tubo stilson','../../archivos/stilson.jpg',7,70),('HUSDE000007',1,26,'Desarmador','DES-101','Desarmador de cruz 10 cm','../../archivos/desarmadorcruz.jpg',3,15),('PHIAR000006',1,9,'Arco para segueta','ARSE-1025','Arco de metal para segueta','../../archivos/arcosegueta.jpg',6,50),('SIESE000005',1,24,'Segueta','SEG-M10','Segueta color negro','../../archivos/segueta.jpg',5,100),('SURFL000008',1,10,'Flexómetro ','FLEX-125','Flexómetro color amarillo','../../archivos/metro.jpg',10,100),('SURMA000004',1,10,'Martillo','MAR-16F','Martillo de uña recta','../../archivos/martillotrupper.jpg',6,70),('TRULL000001',1,1,'Llave inglesa','LLVI100','Llave inglesa ajustable','../../archivos/inglesa.jpg',5,50),('URRPI000002',1,2,'Pinza de presión','PIPR101','Mordazas de acero','../../archivos/pinzapresion.jpg',10,60);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `genera_codigoPro` BEFORE INSERT ON `producto` FOR EACH ROW begin
	declare codigo_sig int;
    set codigo_sig = (Select ifnull(max(convert(substring(codigoproduc, 6), signed integer)), 0) from producto) + 1;
    set new.codigoproduc = concat(new.codigoproduc, LPAD(codigo_sig, 6, '0'));
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `registrar_inventarioP` AFTER INSERT ON `producto` FOR EACH ROW begin
	insert into inventario(codigoproduc, stock, entradas, salidas) values(new.codigoproduc, 0, 0, 0);
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `salida`
--

DROP TABLE IF EXISTS `salida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salida` (
  `folio_salida` varchar(45) NOT NULL,
  `fecha` varchar(15) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `tipo_salida` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`folio_salida`),
  KEY `idusuariosali_idx` (`idusuario`),
  CONSTRAINT `idusuariosali` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salida`
--

LOCK TABLES `salida` WRITE;
/*!40000 ALTER TABLE `salida` DISABLE KEYS */;
INSERT INTO `salida` VALUES ('S0000001','2022-08-09',1,'Venta'),('S0000002','2022-08-09',1,'Venta'),('S0000003','2022-08-10',11,'Venta'),('S0000004','2022-08-10',3,'Venta'),('S0000005','2022-08-13',1,'Venta'),('S0000006','2022-08-13',1,'Venta'),('S0000007','2022-08-19',1,'Venta');
/*!40000 ALTER TABLE `salida` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `genera_codigoS` BEFORE INSERT ON `salida` FOR EACH ROW begin
	declare codigo_sigS int;
    set codigo_sigS = (Select ifnull(max(convert(substring(folio_salida, 2), signed integer)), 0) from salida) + 1;
    set new.folio_salida = concat('S', LPAD( codigo_sigS, 7, '0'));
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `curp` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `contrasena` varchar(45) DEFAULT NULL,
  `rol` varchar(45) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `curp_idx` (`curp`),
  CONSTRAINT `curpe` FOREIGN KEY (`curp`) REFERENCES `empleado` (`curp`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'AESR961122HOCCNB05','robacesan','r1234567','Administrador',1),(3,'LUOA940930HMNSRR05','arlo123','a1234567','Almacen',1),(11,'HESY951023MOCRNN03','ylo123','y1234567','Administrador',1),(15,'SACR780607MOCNRB02','robertdi','Robert123#','Almacen',1),(29,'AECR730412HOCCHB05','7oBXZ8','XL9jFEYNEv','Almacen',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-22  3:27:00
