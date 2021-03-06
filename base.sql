-- MariaDB dump 10.17  Distrib 10.4.14-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: mercaconsumoadra
-- ------------------------------------------------------
-- Server version	10.4.14-MariaDB

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
-- Table structure for table `carrito_producto`
--

DROP TABLE IF EXISTS `carrito_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrito_producto` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `carrito_id` bigint(20) unsigned NOT NULL,
  `producto_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `carrito_producto_carrito_id_producto_id_unique` (`carrito_id`,`producto_id`),
  KEY `carrito_producto_producto_id_foreign` (`producto_id`),
  CONSTRAINT `carrito_producto_carrito_id_foreign` FOREIGN KEY (`carrito_id`) REFERENCES `carritos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `carrito_producto_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito_producto`
--

LOCK TABLES `carrito_producto` WRITE;
/*!40000 ALTER TABLE `carrito_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrito_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carritos`
--

DROP TABLE IF EXISTS `carritos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carritos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) NOT NULL,
  `producto_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carritos_producto_id_foreign` (`producto_id`),
  KEY `carritos_user_id_foreign` (`user_id`),
  CONSTRAINT `carritos_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `carritos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carritos`
--

LOCK TABLES `carritos` WRITE;
/*!40000 ALTER TABLE `carritos` DISABLE KEYS */;
INSERT INTO `carritos` VALUES (2,1,21,3,'2021-06-10 01:03:41','2021-06-10 01:03:41');
/*!40000 ALTER TABLE `carritos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'storage/img/catdefault.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Limpieza','storage/img/limpieza.jpg','2021-06-09 23:35:22','2021-06-09 23:35:22'),(2,'Platos Preparados','storage/img/ppreparados.jpg','2021-06-09 23:35:22','2021-06-09 23:35:22'),(3,'Frescos','storage/img/frescos.jpg','2021-06-09 23:35:22','2021-06-09 23:35:22'),(4,'Despensa','storage/img/despensa.jpeg','2021-06-09 23:35:22','2021-06-09 23:35:22'),(5,'Mascotas','storage/img/mascotas.jpg','2021-06-09 23:35:22','2021-06-09 23:35:22'),(6,'Beb├®','storage/img/bebes.jpg','2021-06-09 23:35:22','2021-06-09 23:35:22'),(7,'Cuidado Personal','storage/img/cuidadopersonal.png','2021-06-09 23:35:22','2021-06-09 23:35:22'),(8,'Bebidas','storage/img/bebidas.jpg','2021-06-09 23:35:22','2021-06-09 23:35:22'),(9,'Bodega','storage/img/bodega.jpg','2021-06-09 23:35:22','2021-06-09 23:35:22'),(10,'Congelados','storage/img/congelados.png','2021-06-09 23:35:22','2021-06-09 23:35:22'),(11,'Hogar','storage/img/hogar.jpg','2021-06-09 23:35:22','2021-06-09 23:35:22'),(12,'Cosm├®tica','storage/img/cosmetica.jpg','2021-06-09 23:35:22','2021-06-09 23:35:22'),(13,'Perecederos','storage/img/perecedero.jpg','2021-06-09 23:35:22','2021-06-09 23:35:22');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
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
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `likes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `producto_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `likes_producto_id_foreign` (`producto_id`),
  KEY `likes_user_id_foreign` (`user_id`),
  CONSTRAINT `likes_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2021_02_22_170502_create_categorias_table',1),(5,'2021_02_22_170557_create_productos_table',1),(6,'2021_06_03_175652_create_carritos_table',1),(7,'2021_06_03_180108_create_likes_table',1),(8,'2021_06_09_145858_create_carrito_producto_table',1);
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
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'storage/img/default.jpg',
  `precio` decimal(8,2) NOT NULL DEFAULT 1.00,
  `oferta` tinyint(1) NOT NULL DEFAULT 0,
  `stock` int(11) NOT NULL DEFAULT 1,
  `categoria_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `productos_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `productos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'Et','Perspiciatis molestias tenetur cupiditate unde neque et eaque. Dolore non aut et voluptates.','storage/img/default.jpg',4.54,0,9,5,'2021-06-09 23:35:23','2021-06-09 23:35:23'),(2,'Voluptatem','Voluptatem non sapiente unde aliquam iusto. Sint et hic suscipit quia. Nemo non sit dicta.','storage/img/default.jpg',2.68,0,15,6,'2021-06-09 23:35:23','2021-06-09 23:35:23'),(4,'Velit','Sit asperiores deserunt voluptas eaque et. Et voluptates in ducimus quaerat nam.','storage/img/default.jpg',6.02,0,12,6,'2021-06-09 23:35:23','2021-06-09 23:35:23'),(5,'Excepturi','Autem alias in et. Accusamus ea nobis facere et perferendis. Et hic assumenda quia ab iste ut.','storage/img/default.jpg',9.56,0,5,13,'2021-06-09 23:35:23','2021-06-09 23:35:23'),(6,'Eos','Reiciendis deleniti delectus quas culpa unde autem iure sed. Sed ut ut in odio.','storage/img/default.jpg',4.55,1,6,6,'2021-06-09 23:35:23','2021-06-09 23:35:23'),(7,'Delectus','Dignissimos non similique dolor est praesentium quis quaerat. Ut mollitia porro repellendus.','storage/img/default.jpg',1.51,0,19,7,'2021-06-09 23:35:23','2021-06-09 23:35:23'),(8,'Ut','Quo et repellendus molestiae id. Reiciendis autem incidunt accusamus quaerat unde id dignissimos.','storage/img/default.jpg',8.51,1,7,10,'2021-06-09 23:35:23','2021-06-09 23:35:23'),(9,'Reprehenderit','Beatae vel possimus ipsam laudantium distinctio sit. Ut et nulla necessitatibus labore enim eum.','storage/img/default.jpg',4.79,1,9,4,'2021-06-09 23:35:23','2021-06-09 23:35:23'),(10,'Repudiandae','Accusamus voluptatum iste non nihil vero. Quibusdam consequatur hic pariatur est autem quas.','storage/img/default.jpg',4.65,1,8,11,'2021-06-09 23:35:23','2021-06-09 23:35:23'),(11,'Quibusdam','Quo et commodi consequuntur dicta quo. Vel sint incidunt suscipit doloribus.','storage/img/default.jpg',5.67,1,18,8,'2021-06-09 23:35:23','2021-06-09 23:35:23'),(12,'Veritatis','Ducimus ut culpa consequatur illo. Ipsam et animi ut enim consequuntur aliquid.','storage/img/default.jpg',7.91,0,9,11,'2021-06-09 23:35:23','2021-06-09 23:35:23'),(13,'Ipsam','Alias iusto deserunt molestiae. Vitae voluptas similique blanditiis error iure. Quas vel omnis id.','storage/img/default.jpg',1.34,0,4,11,'2021-06-09 23:35:23','2021-06-09 23:35:23'),(14,'Facere','Ut dolorum assumenda molestias quisquam qui aut. Est eaque delectus ex ex asperiores sequi et.','storage/img/default.jpg',9.17,0,0,3,'2021-06-09 23:35:23','2021-06-09 23:35:23'),(15,'Vitae','Sed sint at consequatur non illo et delectus. Quo in natus sed. Aut odio eos excepturi id in.','storage/img/default.jpg',7.39,1,5,5,'2021-06-09 23:35:23','2021-06-09 23:35:23'),(16,'Est','Sequi non fuga corrupti ut iure non esse. Accusamus dicta rem dolore voluptates eligendi.','storage/img/default.jpg',5.12,0,1,2,'2021-06-09 23:35:23','2021-06-09 23:35:23'),(17,'Dolor','Eos repellat accusantium omnis natus qui totam. Similique autem perferendis non ut.','storage/img/default.jpg',5.11,0,8,7,'2021-06-09 23:35:23','2021-06-09 23:35:23'),(18,'Molestiae','Veritatis aut sequi quis maxime repellendus. Facere expedita quos iste magnam nam omnis ab modi.','storage/img/default.jpg',2.88,0,15,7,'2021-06-09 23:35:23','2021-06-09 23:35:23'),(19,'Error','Quaerat ipsa voluptatibus repellendus eum corrupti maxime. Numquam aut suscipit velit sed.','storage/img/default.jpg',1.40,1,6,3,'2021-06-09 23:35:23','2021-06-09 23:35:23'),(20,'Nemo','Dolorem reiciendis aut ut quos autem animi facilis. Incidunt autem est culpa. Quia quod libero eos.','storage/img/default.jpg',7.98,1,19,6,'2021-06-09 23:35:23','2021-06-09 23:35:23'),(21,'Blanditiis','Et sit nisi omnis et. Quo officiis voluptatem aut laborum omnis. Est ut vitae optio accusantium.','storage/img/default.jpg',2.09,0,3,8,'2021-06-09 23:35:23','2021-06-09 23:35:23'),(22,'Occaecati','Ea commodi eius unde. Fugiat perspiciatis voluptatem id necessitatibus non voluptatum.','storage/img/default.jpg',4.41,1,0,3,'2021-06-09 23:35:23','2021-06-09 23:35:23'),(23,'Quia','Eius magni cum aliquam architecto autem est. Quo id omnis ea. Et sed animi et neque recusandae.','storage/img/default.jpg',2.06,1,19,1,'2021-06-09 23:35:23','2021-06-09 23:35:23'),(24,'Pariatur','Iusto ipsa rem quibusdam aliquam aut. Nesciunt aperiam assumenda est quibusdam dolorem.','storage/img/default.jpg',9.91,0,17,7,'2021-06-09 23:35:23','2021-06-09 23:35:23'),(25,'Similique','Et ipsa et commodi ipsa. Nulla dolores unde maxime.','storage/img/default.jpg',6.58,0,10,7,'2021-06-09 23:35:23','2021-06-09 23:35:23'),(26,'AA Prueba Testaaa','AA prueba testaaaa','storage/img/60c237d6eb245patatas.jpg',4.00,0,345,4,'2021-06-10 09:47:43','2021-06-10 14:03:35');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
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
  `tipo` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@admin.com','2021-06-09 23:35:23','$2y$10$a7nrNyNEQb9rOa0w67OBOep4/RPV97.P1BbI1z653MlbljFnPrGvm',1,NULL,'2021-06-09 23:35:23','2021-06-09 23:35:23'),(2,'Usuario','usuario@usuario.com','2021-06-09 23:35:23','$2y$10$oSxeZBIB4ec/gaTZ3faiHujFCQcqQxZSX2PiAYV4YKjNwU0ebHXD.',0,NULL,'2021-06-09 23:35:23','2021-06-09 23:35:23'),(3,'Juan Jos├® Rom├ín Ojeda','juanjo95dw@gmail.com',NULL,'$2y$10$cYxh0V0r9zl/pxX8a0M9jOE/wUf5oIqmyeMVM4uRZF3C7jyX8YCoy',0,NULL,'2021-06-10 00:59:02','2021-06-10 00:59:02'),(4,'pruebaEjemplo','pruebaEjemplo@correo.es',NULL,'$2y$10$5t9xc.RMnEXiFz/37RMid.ObD03C2u38.ECxO9dXCFKWZ97AXcKrG',0,NULL,'2021-06-10 09:40:55','2021-06-10 09:40:55');
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

-- Dump completed on 2021-06-10 19:05:23
