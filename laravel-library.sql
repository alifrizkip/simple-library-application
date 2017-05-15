-- MySQL dump 10.16  Distrib 10.1.19-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.1.19-MariaDB-1~xenial

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
-- Table structure for table `book_genre`
--

DROP TABLE IF EXISTS `book_genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book_genre` (
  `book_id` int(10) unsigned NOT NULL,
  `genre_id` int(10) unsigned NOT NULL,
  KEY `book_genre_book_id_index` (`book_id`),
  KEY `book_genre_genre_id_index` (`genre_id`),
  CONSTRAINT `book_genre_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  CONSTRAINT `book_genre_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_genre`
--

LOCK TABLES `book_genre` WRITE;
/*!40000 ALTER TABLE `book_genre` DISABLE KEYS */;
INSERT INTO `book_genre` VALUES (1,1),(2,2),(3,3),(4,4),(5,5),(6,6),(7,7),(8,1),(8,2),(9,2),(9,3),(1,2),(1,3),(1,8),(10,1),(11,2),(11,3),(11,4);
/*!40000 ALTER TABLE `book_genre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_user`
--

DROP TABLE IF EXISTS `book_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `book_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_book_user_id_index` (`user_id`),
  KEY `user_book_book_id_index` (`book_id`),
  CONSTRAINT `user_book_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_book_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_user`
--

LOCK TABLES `book_user` WRITE;
/*!40000 ALTER TABLE `book_user` DISABLE KEYS */;
INSERT INTO `book_user` VALUES (13,4,2),(14,4,3),(15,4,4),(16,4,5),(17,4,6),(20,3,1),(21,1,5),(23,6,1),(24,6,2);
/*!40000 ALTER TABLE `book_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `ori_stock` int(11) NOT NULL,
  `img_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'Buku Satu Satu','Buku Satu1',18,20,'PHP-logo.svg.png','2017-04-25 17:11:59','2017-04-30 20:21:44'),(2,'Buku 2','Buku 2',13,15,'grid-cell-12788-1375287846-44.jpg','2017-04-25 17:43:04','2017-04-27 00:14:41'),(3,'Buku Tiga','Pengarang Tiga',14,15,'icon-steve-jobs.jpg','2017-04-26 17:29:49','2017-04-29 04:38:46'),(4,'Buku Komik','Pengarang Komik',14,15,'Volume_1.png','2017-04-26 17:34:23','2017-04-26 19:56:35'),(5,'Book Five','Author Five',13,15,'SocialLife_PB.jpg','2017-04-26 17:38:04','2017-04-26 23:41:10'),(6,'Buku Enam','Pengarang Enam',14,15,'10270-0309082781-450.jpg','2017-04-26 17:43:17','2017-04-26 18:15:44'),(7,'Book 7','Author 7',15,15,'c47a7f6232aa4c81481ad43410a2ced8.jpg','2017-04-26 17:45:31','2017-04-30 20:15:34'),(8,'Book 8','Author 8',10,10,'17357484_Alt01.jpg','2017-04-26 20:00:07','2017-04-26 20:00:07'),(9,'Book 9','Author 9',5,5,'17357484_Alt01.jpg','2017-04-26 20:02:08','2017-04-26 20:02:08'),(10,'10','10',10,10,'17357484_Alt01.jpg','2017-04-26 23:45:06','2017-04-26 23:45:06'),(11,'11','11',11,11,'17357484_Alt01.jpg','2017-04-26 23:45:26','2017-04-26 23:45:26');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genres`
--

LOCK TABLES `genres` WRITE;
/*!40000 ALTER TABLE `genres` DISABLE KEYS */;
INSERT INTO `genres` VALUES (1,'Sci-fi',NULL,NULL),(2,'Novel',NULL,NULL),(3,'Biography',NULL,NULL),(4,'Comic',NULL,NULL),(5,'Social',NULL,NULL),(6,'Information Technology',NULL,NULL),(7,'Cook',NULL,NULL),(8,'Dongeng','2017-04-26 23:43:37','2017-04-26 23:43:37');
/*!40000 ALTER TABLE `genres` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_04_24_030900_create_books_table',1),(4,'2017_04_24_030914_create_genres_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'alif','alif@alif.com','$2y$10$eqFkoNqb9pxa3EXNwN02ZOlBq6Jzn67yAty/QZ5jBP4oin6VTFQru','member',NULL,'2017-04-25 00:18:02','2017-04-25 00:18:43'),(3,'rizki','rizki@rizki.com','$2y$10$LftH0vQWBp0nw/5Au0KZaeDJD7p1TGSz7o55fFHdhd6rzZgC8lttu','member',NULL,'2017-04-25 00:20:34','2017-04-25 00:20:34'),(4,'Alif Rizki','alif@example.com','$2y$10$PN/U35bYVMOdZqb567CO5.RBIj3b.bEdBYReLJjfYZG5/gMQiQUCS','admin','KRfFDZWMuMZo9QCmLiLoNMjS8RoUI7jGcDZnLQ4OBcf3tQHUPLlZzD82mw9e','2017-04-25 17:16:07','2017-04-25 17:16:07'),(5,'Pambudi','pambudi@example.com','$2y$10$2YOIHF6lz2zAuBIt8slK9enak/Ow0Z1611cbbWHlxI7mO5waimY7C','member','lS8lxEK5i3jrAVNkCWob8ozpUhpJ017nA5azIEjvXiZTVSsqo1Ea3o1Z80r3','2017-04-25 20:48:58','2017-04-25 20:48:58'),(6,'Dika Budi Aji','budi@example.com','$2y$10$ZjaG0w61KZ.v37iR7RzhoeJ.GLOVsiJT/ceSNiKKTa/gd4HAiCssq',NULL,'Fkhh1z4MJe6EdGnZSd6CnCg9E9YoUo26sp6jQM8PB3Hz1GH5mCw8yZZsA24i','2017-04-26 19:46:00','2017-04-26 19:46:00');
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

-- Dump completed on 2017-05-15  9:47:32
