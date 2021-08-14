-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: kepegawaian
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
-- Table structure for table `cuti`
--

DROP TABLE IF EXISTS `cuti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuti` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `karyawan_id` bigint(20) unsigned NOT NULL,
  `mulai_cuti` date NOT NULL,
  `selesai_cuti` date NOT NULL,
  `total_cuti` int(11) NOT NULL,
  `status` enum('selesai cuti','belum selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cuti_karyawan_id_foreign` (`karyawan_id`),
  CONSTRAINT `cuti_karyawan_id_foreign` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuti`
--

LOCK TABLES `cuti` WRITE;
/*!40000 ALTER TABLE `cuti` DISABLE KEYS */;
INSERT INTO `cuti` VALUES (1,4,'2021-08-09','2021-08-18',500000,'belum selesai','2021-08-13 22:50:59','2021-08-13 22:50:59'),(2,8,'2021-08-02','2021-08-15',700000,'selesai cuti','2021-08-13 22:51:35','2021-08-13 22:53:32'),(3,1,'2021-08-04','2021-08-07',200000,'belum selesai','2021-08-13 22:52:50','2021-08-13 22:52:50'),(4,2,'2021-08-01','2021-08-03',150000,'belum selesai','2021-08-13 22:53:25','2021-08-13 22:53:25'),(5,6,'2021-08-29','2021-08-31',150000,'selesai cuti','2021-08-13 22:53:50','2021-08-13 22:53:57');
/*!40000 ALTER TABLE `cuti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `karyawan`
--

DROP TABLE IF EXISTS `karyawan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `karyawan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('pria','wanita') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telepon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `karyawan`
--

LOCK TABLES `karyawan` WRITE;
/*!40000 ALTER TABLE `karyawan` DISABLE KEYS */;
INSERT INTO `karyawan` VALUES (1,'Amir','pria','Saint John','2015-01-10','62-75-830-3899','Ap #963-812 Pellentesque Rd.','2021-08-13 22:41:18','2021-08-13 22:41:18'),(2,'Ebony','wanita','Antakya','2017-06-12','62-17-357-4671','2773 Parturient Ave','2021-08-13 22:42:50','2021-08-13 22:42:50'),(3,'Rama','pria','Massemen','2014-07-16','62-58-386-3519','7121 Aliquam Street','2021-08-13 22:44:08','2021-08-13 22:44:08'),(4,'Dorothy','wanita','Sirsa','2013-07-16','62-16-838-8690','686-2391 Pretium Avenue','2021-08-13 22:45:24','2021-08-13 22:45:24'),(5,'Merrill','wanita','Monacilioni','2014-03-13','62-54-034-3128','9733 Velit. Ave','2021-08-13 22:46:19','2021-08-13 22:46:19'),(6,'Sebastian','pria','Sibret','2017-07-05','62-35-320-2999','767-5751 Laoreet Road','2021-08-13 22:47:06','2021-08-13 22:47:06'),(7,'Gary','pria','Lichfield','2018-08-08','62-27-525-5891','9529 Risus. Rd.','2021-08-13 22:47:57','2021-08-13 22:47:57'),(8,'Angelica','wanita','Caucaia','2012-08-23','62-49-120-0559','Ap #150-6800 Cum Road','2021-08-13 22:48:41','2021-08-13 22:48:41'),(9,'Griffin','pria','Roccalumera','2014-11-20','62-96-938-2943','845-7751 Nunc Road','2021-08-13 22:49:31','2021-08-13 22:49:31'),(10,'Serina','wanita','Poppel','2011-01-04','62-24-218-5338','P.O. Box 341, 8310 Purus, Rd.','2021-08-13 22:50:23','2021-08-13 22:50:23');
/*!40000 ALTER TABLE `karyawan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lembur`
--

DROP TABLE IF EXISTS `lembur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lembur` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `karyawan_id` bigint(20) unsigned NOT NULL,
  `mulai_lembur` time NOT NULL,
  `selesai_lembur` time NOT NULL,
  `total_jam` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lembur_karyawan_id_foreign` (`karyawan_id`),
  CONSTRAINT `lembur_karyawan_id_foreign` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lembur`
--

LOCK TABLES `lembur` WRITE;
/*!40000 ALTER TABLE `lembur` DISABLE KEYS */;
INSERT INTO `lembur` VALUES (1,1,'18:00:00','20:00:00',2,50000,'2021-08-13 22:55:35','2021-08-13 22:55:35'),(2,2,'18:00:00','23:00:00',5,125000,'2021-08-13 22:56:00','2021-08-13 22:56:00'),(3,3,'17:00:00','23:00:00',6,150000,'2021-08-13 22:56:41','2021-08-13 22:56:41'),(4,7,'18:00:00','22:00:00',4,100000,'2021-08-13 22:57:01','2021-08-13 22:57:01'),(5,10,'15:00:00','23:59:00',9,225000,'2021-08-13 22:57:40','2021-08-13 22:57:40');
/*!40000 ALTER TABLE `lembur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2021_08_10_132205_create_karyawans_table',1),(5,'2021_08_10_133022_create_cutis_table',1),(6,'2021_08_10_140917_create_lemburs_table',1),(7,'2021_08_10_141514_create_penggajians_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penggajian`
--

DROP TABLE IF EXISTS `penggajian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penggajian` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `karyawan_id` bigint(20) unsigned NOT NULL,
  `jumlah_gaji` int(11) NOT NULL,
  `jumlah_lembur` int(11) NOT NULL,
  `jumlah_cuti` int(11) NOT NULL,
  `total_gaji` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `penggajian_karyawan_id_foreign` (`karyawan_id`),
  CONSTRAINT `penggajian_karyawan_id_foreign` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penggajian`
--

LOCK TABLES `penggajian` WRITE;
/*!40000 ALTER TABLE `penggajian` DISABLE KEYS */;
INSERT INTO `penggajian` VALUES (1,'2021-08-01',1,2000000,50000,200000,1850000,'2021-08-13 22:58:10','2021-08-13 22:58:10'),(2,'2021-08-01',2,2500000,125000,150000,2475000,'2021-08-13 22:58:21','2021-08-13 22:58:21'),(3,'2021-08-01',3,2000000,150000,0,2150000,'2021-08-13 22:58:39','2021-08-13 22:58:39'),(4,'2021-08-01',4,3000000,0,500000,2500000,'2021-08-13 22:58:55','2021-08-13 22:58:55'),(5,'2021-08-01',5,4000000,0,0,4000000,'2021-08-13 22:59:11','2021-08-13 22:59:11');
/*!40000 ALTER TABLE `penggajian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@email.com',NULL,'$2y$10$vixU86EBMntYOCWDFFfhduozHxIqyEjop8iDqw7pDocHENTphVKnW',NULL,'2021-08-13 22:30:55','2021-08-13 22:30:55'),(2,'Pegawai','pegawai@email.com',NULL,'$2y$10$ORhszXsFDloDgeXyENMOY.O2aQvYoI6Dge.U0/h95APx.tqaDonDS',NULL,'2021-08-13 22:31:48','2021-08-13 22:31:48'),(3,'staff','staff@email.com',NULL,'$2y$10$2hnB4ZEE74kDuZemEil1reSlQcaewohi4PABjm1rdPMfaUAX.1QTW',NULL,'2021-08-13 22:32:55','2021-08-13 22:32:55'),(4,'marketing','marketing@email.com',NULL,'$2y$10$HA7fYdjBCWgacUan6oFpSOsfHm/vwWeVQO6UWdj/FnWb0qtV1QrdO',NULL,'2021-08-13 22:33:34','2021-08-13 22:33:34'),(5,'Ilham Cahya','ilham@email.com',NULL,'$2y$10$jx2Vfsk/h8DWRWibqN4mseoaJ9c1vVgPKkqYgGLbAxock2FBemYSK',NULL,'2021-08-13 22:34:38','2021-08-13 22:34:38');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-08-14 14:04:27
