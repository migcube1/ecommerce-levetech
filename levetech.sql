-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: levetech
-- ------------------------------------------------------
-- Server version	10.4.17-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `claveCliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `apaterno` varchar(100) DEFAULT NULL,
  `amaterno` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`claveCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_orden`
--

DROP TABLE IF EXISTS `detalle_orden`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_orden` (
  `claveDetalleOrden` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) DEFAULT NULL,
  `precioUnitario` float DEFAULT NULL,
  `claveOrden` int(11) NOT NULL,
  `claveProducto` int(11) NOT NULL,
  PRIMARY KEY (`claveDetalleOrden`),
  KEY `claveOrden` (`claveOrden`),
  KEY `claveProducto` (`claveProducto`),
  CONSTRAINT `detalle_orden_ibfk_1` FOREIGN KEY (`claveOrden`) REFERENCES `orden` (`claveOrden`) ON DELETE CASCADE,
  CONSTRAINT `detalle_orden_ibfk_2` FOREIGN KEY (`claveProducto`) REFERENCES `producto` (`claveProducto`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_orden`
--

LOCK TABLES `detalle_orden` WRITE;
/*!40000 ALTER TABLE `detalle_orden` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_orden` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `domicilio`
--

DROP TABLE IF EXISTS `domicilio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `domicilio` (
  `claveDomicilio` int(11) NOT NULL AUTO_INCREMENT,
  `calle` varchar(100) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `colonia` varchar(100) DEFAULT NULL,
  `alcaldia` varchar(100) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `claveCliente` int(11) NOT NULL,
  PRIMARY KEY (`claveDomicilio`),
  KEY `claveCliente` (`claveCliente`),
  CONSTRAINT `domicilio_ibfk_1` FOREIGN KEY (`claveCliente`) REFERENCES `cliente` (`claveCliente`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domicilio`
--

LOCK TABLES `domicilio` WRITE;
/*!40000 ALTER TABLE `domicilio` DISABLE KEYS */;
/*!40000 ALTER TABLE `domicilio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `envio`
--

DROP TABLE IF EXISTS `envio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `envio` (
  `claveEnvio` int(11) NOT NULL AUTO_INCREMENT,
  `medioEnvio` varchar(50) DEFAULT NULL,
  `costoEnvio` float DEFAULT NULL,
  PRIMARY KEY (`claveEnvio`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `envio`
--

LOCK TABLES `envio` WRITE;
/*!40000 ALTER TABLE `envio` DISABLE KEYS */;
INSERT INTO `envio` VALUES (1,'DHL',99.99),(2,'Fedex',99.99);
/*!40000 ALTER TABLE `envio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden`
--

DROP TABLE IF EXISTS `orden`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orden` (
  `claveOrden` int(11) NOT NULL AUTO_INCREMENT,
  `fechaCompra` varchar(50) DEFAULT NULL,
  `montoTotal` float DEFAULT NULL,
  `numeroTarjeta` varchar(200) DEFAULT NULL,
  `vencimiento` varchar(200) DEFAULT NULL,
  `codigoSeguridad` varchar(200) DEFAULT NULL,
  `claveEnvio` int(11) NOT NULL,
  `claveCliente` int(11) NOT NULL,
  `claveDomicilio` int(11) NOT NULL,
  PRIMARY KEY (`claveOrden`),
  KEY `claveEnvio` (`claveEnvio`),
  KEY `claveDomicilio` (`claveDomicilio`),
  KEY `claveCliente` (`claveCliente`),
  CONSTRAINT `orden_ibfk_1` FOREIGN KEY (`claveEnvio`) REFERENCES `envio` (`claveEnvio`) ON DELETE CASCADE,
  CONSTRAINT `orden_ibfk_2` FOREIGN KEY (`claveDomicilio`) REFERENCES `domicilio` (`claveDomicilio`) ON DELETE CASCADE,
  CONSTRAINT `orden_ibfk_3` FOREIGN KEY (`claveCliente`) REFERENCES `cliente` (`claveCliente`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden`
--

LOCK TABLES `orden` WRITE;
/*!40000 ALTER TABLE `orden` DISABLE KEYS */;
/*!40000 ALTER TABLE `orden` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `claveProducto` int(11) NOT NULL AUTO_INCREMENT,
  `precio` float DEFAULT NULL,
  `precioOferta` float DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `puntuacion` float DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `activo` int(11) DEFAULT 1,
  PRIMARY KEY (`claveProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,619.99,559.99,'SSD ADATA SU630 120GB','SSD Adata Ultimate SU630 QLC 3D, 240GB, SATA, 2.5\", 7mm',200,4.3,'LVT-ADATA-ASU630SS-240GQ-R.jpg',1),(2,1619,1479,'SSD Kingston KC2500 500GB','SSD Kingston KC2500, 500GB, PCI Express 3.0, M.2, Escritura 2500 MB/s,  3500 MB/s',104,4.5,'LVT-KINGSTON-SKC2500M8-500G.jpg',1),(3,7129,6819,'Procesador AMD Ryzen 5 5600X','Procesador AMD Ryzen 5 5600X, S-AM4, 3.70GHz, 32MB L3 Cache - incluye Disipador Wraith Stealth',175,4,'LVT-AMD-100-100000065BOX.jpg',1),(4,5880,5600,'Tarjeta Madre ASUS Micro ATX','Tarjeta Madre ASUS Micro ATX PRIME B450M-A II, S-AM4, AMD B450, HDMI, 128GB DDR4 para AMD ',91,4.8,'LVT-ASUS-90MB15Z0-M0AAY0.png',1),(5,1729,1599,'Tarjeta Madre Gigabyte Micro ATX H410M','Tarjeta Madre Gigabyte Micro ATX H410M H (REV. 1.0), S-1200, Intel H410 Express, HDMI, 64GB DDR4 para Intel',12,4,'LVT-GIGABYTE-H410MH.jpg',1),(6,730,660,'Memoria RAM Kingston 8GB','Memoria RAM Kingston FURY Beast Black DDR4, 2666MHz, 8GB, Non-ECC, CL16, XMP',270,4.7,'LVT-KINGSTON-KF426C16BB8.jpg',1),(7,3389,3149,'Monitor LG 24MK430H-B','Monitor LG 24MK430H-B LED 24, Full HD, WideScreen, Free-Sync, 75Hz, HDMI, Negro',239,5,'LVT-LG-24MK430HB.jpg',1),(8,2999,2439,'Fuente de Poder ASUS ROG','Fuente de Poder ASUS ROG Strix 750W 80 PLUS Gold, 20+4 pin ATX, 150mm, 750W',112,4.5,'LVT-ASUS-90YE00A0-B0NA00.jpg',1),(9,1929,1009,'Gabinete Thermaltake V100','Gabinete Thermaltake V100 Window con Ventana RGB, Midi Tower, ATX, USB 2.0/3.0, sin Fuente, Negro',60,3.5,'LVT-THERMALTAKE-CA-1K7-00M1WN00.jpg',1),(10,297.5,250.5,'Gabinete Thermaltake V100','Teclado Gamer Vorago Start The Game RGB, Al├ímbrico, Negro (Espa├▒ol)',40,5,'LVT-VORAGO-KB-503.jpg',1);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-22 16:03:12
