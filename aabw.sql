-- MySQL dump 10.13  Distrib 8.4.3, for Win64 (x86_64)
--
-- Host: localhost    Database: aabw
-- ------------------------------------------------------
-- Server version	8.4.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `akun1s`
--

DROP TABLE IF EXISTS `akun1s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `akun1s` (
  `id_akun1` int unsigned NOT NULL AUTO_INCREMENT,
  `kode_akun1` varchar(6) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_akun1` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_akun1`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `akun1s`
--

LOCK TABLES `akun1s` WRITE;
/*!40000 ALTER TABLE `akun1s` DISABLE KEYS */;
INSERT INTO `akun1s` VALUES (1,'1','Aktiva'),(2,'2','Kewajiban'),(3,'3','Modal'),(4,'4','Pendapatan'),(5,'5','Beban');
/*!40000 ALTER TABLE `akun1s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `akun2s`
--

DROP TABLE IF EXISTS `akun2s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `akun2s` (
  `id_akun2` int unsigned NOT NULL AUTO_INCREMENT,
  `kode_akun2` int unsigned NOT NULL,
  `nama_akun2` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `kode_akun1` int unsigned NOT NULL,
  PRIMARY KEY (`id_akun2`),
  KEY `akun2s_kode_akun1_foreign` (`kode_akun1`),
  CONSTRAINT `akun2s_kode_akun1_foreign` FOREIGN KEY (`kode_akun1`) REFERENCES `akun1s` (`id_akun1`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `akun2s`
--

LOCK TABLES `akun2s` WRITE;
/*!40000 ALTER TABLE `akun2s` DISABLE KEYS */;
INSERT INTO `akun2s` VALUES (11,11,'Aktiva Lancar',1),(12,12,'Aktiva Tetap',1),(13,21,'Utang Jangka Pendek',2),(14,22,'Utang Jangka Panjang',2),(15,31,'Modal Pemilik',3),(16,32,'Prive Pemilik',3),(17,41,'Pendapatan Usaha',4),(18,42,'Pendapatan di Luar Usaha',4),(19,51,'Beban Usaha',5),(20,52,'Beban di Luar Usaha',5);
/*!40000 ALTER TABLE `akun2s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `akun3s`
--

DROP TABLE IF EXISTS `akun3s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `akun3s` (
  `id_akun3` int unsigned NOT NULL AUTO_INCREMENT,
  `kode_akun3` int unsigned NOT NULL,
  `nama_akun3` varchar(70) COLLATE utf8mb4_general_ci NOT NULL,
  `kode_akun2` int unsigned NOT NULL,
  `kode_akun1` int unsigned NOT NULL,
  PRIMARY KEY (`id_akun3`),
  KEY `akun3s_kode_akun1_foreign` (`kode_akun1`),
  CONSTRAINT `akun3s_kode_akun1_foreign` FOREIGN KEY (`kode_akun1`) REFERENCES `akun1s` (`id_akun1`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `akun3s`
--

LOCK TABLES `akun3s` WRITE;
/*!40000 ALTER TABLE `akun3s` DISABLE KEYS */;
INSERT INTO `akun3s` VALUES (1,1101,'Kas',11,1),(2,1102,'Piutang Usaha',11,1),(3,1103,'Perlengkapan Kantor',11,1),(4,1104,'Sewa Dibayar di muka',11,1),(5,1105,'Asuransi dibayar di muka',11,1),(6,1201,'Peralatan Kantor',12,1),(7,1202,'Akumulasi Penyusutan P.Kantor',12,1),(8,1203,'Tanah',12,1),(9,2101,'Utang Usaha',21,2),(10,2102,'Utang Gaji',21,2),(11,2103,'Pendapatan diterima di muka',21,2),(12,2201,'Utang Hipotek',22,2),(13,2202,'Utang Obligasi',22,2),(14,3101,'Modal Pemilik',31,3),(15,3201,'Prive Tuan Najwan',32,3),(16,4101,'Pendapatan Jasa',41,4),(17,4102,'Pendapatan diterima di muka',41,4),(18,4201,'Pendapatan diluar Usaha',42,4),(19,5101,'Beban Gaji Karyawan',51,5),(20,5102,'Beban Iklan',51,5),(21,5103,'Beban Asuransi',51,5),(22,5104,'Beban Telepon',51,5),(23,5105,'Beban Listrik',51,5),(24,5106,'Beban Sewa',51,5),(25,5107,'Beban Penyusutan Peralatan Kantor',51,5),(26,5108,'Beban Perlengkapan Kantor',51,5),(27,5201,'Beban Bunga',52,5);
/*!40000 ALTER TABLE `akun3s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2026-09-17-164638','App\\Database\\Migrations\\CreateAkun1','default','App',1794252322,1),(2,'2026-11-09-184841','App\\Database\\Migrations\\CreateAkun2','default','App',1794252322,1),(4,'2026-11-11-120124','App\\Database\\Migrations\\CreateAkun3','default','App',1794398526,2),(5,'2026-11-11-150620','App\\Database\\Migrations\\CreateTransaksi','default','App',1794409900,3),(6,'2026-11-11-150648','App\\Database\\Migrations\\CreateNilai','default','App',1794409900,3),(7,'2026-11-11-150804','App\\Database\\Migrations\\CreateStatus','default','App',1794409900,3),(8,'2026-11-13-013000','App\\Database\\Migrations\\CreatePenyesuaian','default','App',1794507754,4),(9,'2026-11-13-013100','App\\Database\\Migrations\\CreateNilaiPenyesuaian','default','App',1794507754,4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_nilai`
--

DROP TABLE IF EXISTS `tbl_nilai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_nilai` (
  `id_nilai` int unsigned NOT NULL AUTO_INCREMENT,
  `id_transaksi` int unsigned NOT NULL,
  `kode_akun3` int unsigned NOT NULL,
  `debit` float unsigned NOT NULL,
  `kredit` float unsigned NOT NULL,
  `id_status` int unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_nilai`),
  KEY `tbl_nilai_id_transaksi_foreign` (`id_transaksi`),
  CONSTRAINT `tbl_nilai_id_transaksi_foreign` FOREIGN KEY (`id_transaksi`) REFERENCES `tbl_transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_nilai`
--

LOCK TABLES `tbl_nilai` WRITE;
/*!40000 ALTER TABLE `tbl_nilai` DISABLE KEYS */;
INSERT INTO `tbl_nilai` VALUES (3,2,1101,30000000,0,3,'2026-11-12 16:26:02','2026-11-12 16:28:24',NULL),(4,2,1103,3000000,0,3,'2026-11-12 16:26:02','2026-11-12 16:28:24',NULL),(5,2,1201,35000000,0,3,'2026-11-12 16:26:02','2026-11-12 16:28:24',NULL),(6,2,3101,0,68000000,3,'2026-11-12 16:26:02','2026-11-12 16:28:24',NULL);
/*!40000 ALTER TABLE `tbl_nilai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_nilaipenyesuaian`
--

DROP TABLE IF EXISTS `tbl_nilaipenyesuaian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_nilaipenyesuaian` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `id_penyesuaian` int unsigned NOT NULL,
  `kode_akun3` int unsigned NOT NULL,
  `debit` float unsigned NOT NULL,
  `kredit` float unsigned NOT NULL,
  `id_status` int unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_nilaipenyesuaian_id_penyesuaian_foreign` (`id_penyesuaian`),
  CONSTRAINT `tbl_nilaipenyesuaian_id_penyesuaian_foreign` FOREIGN KEY (`id_penyesuaian`) REFERENCES `tbl_penyesuaian` (`id_penyesuaian`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_nilaipenyesuaian`
--

LOCK TABLES `tbl_nilaipenyesuaian` WRITE;
/*!40000 ALTER TABLE `tbl_nilaipenyesuaian` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_nilaipenyesuaian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_penyesuaian`
--

DROP TABLE IF EXISTS `tbl_penyesuaian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_penyesuaian` (
  `id_penyesuaian` int unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_general_ci NOT NULL,
  `nilai` float unsigned NOT NULL,
  `waktu` int unsigned NOT NULL,
  `jumlah` float unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_penyesuaian`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_penyesuaian`
--

LOCK TABLES `tbl_penyesuaian` WRITE;
/*!40000 ALTER TABLE `tbl_penyesuaian` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_penyesuaian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_status`
--

DROP TABLE IF EXISTS `tbl_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_status` (
  `id_status` int unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_status`
--

LOCK TABLES `tbl_status` WRITE;
/*!40000 ALTER TABLE `tbl_status` DISABLE KEYS */;
INSERT INTO `tbl_status` VALUES (1,'Penerimaan'),(2,'Pengeluaran'),(3,'Investasi Masuk'),(4,'Investasi Keluar'),(5,'Normal');
/*!40000 ALTER TABLE `tbl_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_transaksi`
--

DROP TABLE IF EXISTS `tbl_transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int unsigned NOT NULL AUTO_INCREMENT,
  `kwitansi` varchar(4) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_general_ci NOT NULL,
  `ketjurnal` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_transaksi`
--

LOCK TABLES `tbl_transaksi` WRITE;
/*!40000 ALTER TABLE `tbl_transaksi` DISABLE KEYS */;
INSERT INTO `tbl_transaksi` VALUES (2,'0001','2021-12-01','Tuan Najwan menyetorkan modal berupa uang tunai sebesar 30.000.000, perlengkapan kantor 3.000.000 dan peralatan kantor 35.000.000','Setoran modal pemilik',NULL,NULL,NULL);
/*!40000 ALTER TABLE `tbl_transaksi` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-11-13  2:35:42
