-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: localhost    Database: market_db
-- ------------------------------------------------------
-- Server version	8.0.32-0ubuntu0.22.04.2

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
-- Table structure for table `basket`
--

DROP TABLE IF EXISTS `basket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `basket` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `basket_product_id_foreign` (`product_id`),
  KEY `basket_user_id_foreign` (`user_id`),
  CONSTRAINT `basket_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `basket_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `basket`
--

LOCK TABLES `basket` WRITE;
/*!40000 ALTER TABLE `basket` DISABLE KEYS */;
/*!40000 ALTER TABLE `basket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Quod quasi.',NULL,'2023-03-03 02:36:02','2023-03-03 02:36:02'),(2,'Nulla dolorem culpa.',NULL,'2023-03-03 02:36:02','2023-03-03 02:36:02'),(3,'Voluptas repudiandae dolorum.',NULL,'2023-03-03 02:36:02','2023-03-03 02:36:02'),(4,'Quod qui magni.',NULL,'2023-03-03 02:36:02','2023-03-03 02:36:02'),(5,'Voluptatem corporis.',NULL,'2023-03-03 02:36:03','2023-03-03 02:36:03'),(6,'Neque quis.',3,'2023-03-03 02:36:03','2023-03-03 02:36:03'),(7,'Eveniet reiciendis.',3,'2023-03-03 02:36:03','2023-03-03 02:36:03'),(8,'Qui repellat.',5,'2023-03-03 02:36:03','2023-03-03 02:36:03'),(9,'Quasi ea.',5,'2023-03-03 02:36:03','2023-03-03 02:36:03'),(10,'Id in illo.',3,'2023-03-03 02:36:03','2023-03-03 02:36:03'),(11,'Sunt qui.',8,'2023-03-03 02:36:03','2023-03-03 02:36:03'),(12,'Magni eveniet et.',8,'2023-03-03 02:36:03','2023-03-03 02:36:03'),(13,'Vitae voluptas nulla.',8,'2023-03-03 02:36:03','2023-03-03 02:36:03'),(14,'Amet ab dolor.',9,'2023-03-03 02:36:04','2023-03-03 02:36:04'),(15,'Necessitatibus corporis.',7,'2023-03-03 02:36:04','2023-03-03 02:36:04');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_02_28_101527_create_categories_table',1),(6,'2023_03_01_034334_create_products_table',1),(7,'2023_03_01_091159_create_baskets_table',1),(8,'2023_03_02_121628_create_product_fields_table',1),(9,'2023_03_03_005344_create_orders_table',1),(10,'2023_03_03_005405_create_order_products_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_products`
--

DROP TABLE IF EXISTS `order_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `order_id` bigint unsigned NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_products_product_id_foreign` (`product_id`),
  KEY `order_products_order_id_foreign` (`order_id`),
  CONSTRAINT `order_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `order_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_products`
--

LOCK TABLES `order_products` WRITE;
/*!40000 ALTER TABLE `order_products` DISABLE KEYS */;
INSERT INTO `order_products` VALUES (1,4,1,1,'2023-03-03 02:50:08','2023-03-03 02:50:08'),(2,2,2,1,'2023-03-03 05:13:35','2023-03-03 05:13:35'),(3,1,2,1,'2023-03-03 05:13:35','2023-03-03 05:13:35'),(4,1,4,1,'2023-03-03 08:02:24','2023-03-03 08:02:24'),(5,2,7,1,'2023-03-04 04:19:50','2023-03-04 04:19:50'),(6,1,7,1,'2023-03-04 04:19:50','2023-03-04 04:19:50');
/*!40000 ALTER TABLE `order_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `delivery_type` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,NULL,'29tRCeRzRlbyXS9Vok3e6bKsJTsOMSPkIk5lBy34','example.com.@abk.ru','3453','fghfgh','0','0','2023-03-03 02:50:08','2023-03-03 02:50:08'),(2,1,'jnkuLml3QI6hdOeww2akB6vbBf3PZFfM2jA76pIn','anaumova@example.com','8-800-872-8513','dfgdfg','0','0','2023-03-03 05:13:35','2023-03-03 05:13:35'),(3,NULL,'H1zrgkgGcHETqjAZs111VehU0dxovHFp52IuTh14','ert@mail.ru','45664','dfgdfg','0','1','2023-03-03 07:54:18','2023-03-03 07:54:18'),(4,NULL,'H1zrgkgGcHETqjAZs111VehU0dxovHFp52IuTh14','dfg@mal.ru','dfg','dfg','0','0','2023-03-03 08:02:24','2023-03-03 08:02:24'),(7,NULL,'hlXH3jxyjYMrzK00tfiFUSTdkaogoMy2ARXfzrye','ert@mail.ru','456456','dfg','0','1','2023-03-04 04:19:50','2023-03-04 04:19:50');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` VALUES (1,'App\\Models\\User',1,'456','031a86f1c154cfb991d3a8257b4f852eee9ee4b870e8e3b4ffee5bdd9129aebc','[\"*\"]',NULL,'2023-03-04 02:02:08','2023-03-04 02:02:08'),(2,'App\\Models\\User',1,'Секретное слово','bb64a3a42078ac3adefa56ab597b55e4df778988bba7b083fab1be77c1202aca','[\"*\"]','2023-03-04 02:37:43','2023-03-04 02:36:49','2023-03-04 02:37:43'),(3,'App\\Models\\User',1,'Секретное слово','d0d63549378b4e6e4c63a056e3da4d69ca3b64c8f1958c14d6f8e87d2799bbaa','[\"*\"]',NULL,'2023-03-04 03:15:17','2023-03-04 03:15:17'),(4,'App\\Models\\User',1,'Секретное слово','3db62a1d9e455638d2473c43ef55e7f61a87e5883ef1a82a558825b37d814a3d','[\"*\"]',NULL,'2023-03-04 03:19:20','2023-03-04 03:19:20');
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_fields`
--

DROP TABLE IF EXISTS `product_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_fields` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `width` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_fields_product_id_foreign` (`product_id`),
  CONSTRAINT `product_fields_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_fields`
--

LOCK TABLES `product_fields` WRITE;
/*!40000 ALTER TABLE `product_fields` DISABLE KEYS */;
INSERT INTO `product_fields` VALUES (3,3,'14.87 м','2.84 м','323.32 г','Сиреневый'),(4,4,'24.21 м','3.67 м','373.58 г','Вино'),(5,5,'21.7 м','3.23 м','338.24 г','Кобальт синий'),(7,7,'14.51 м','4 м','390.14 г','Кремовый'),(8,8,'17.7 м','2.11 м','408.08 г','Цвет морской волны'),(9,9,'16.62 м','3.12 м','588.38 г','Сепия'),(10,10,'26.92 м','4.72 м','337.74 г','Матовый белый'),(11,11,'12.91 м','1.48 м','534.29 г','Сепия'),(12,12,'14.75 м','3.85 м','267.34 г','Кремовый'),(13,13,'14.88 м','4.46 м','194.69 г','Вода пляжа Бонди'),(14,14,'11.14 м','1.1 м','72.95 г','Латунный'),(15,15,'11.36 м','3.16 м','481.66 г','Миндаль Крайола'),(16,16,'21.95 м','1.65 м','573.28 г','Латунный'),(17,17,'13.65 м','1.57 м','418.09 г','Циан'),(18,18,'27.19 м','4.46 м','209.74 г','Цвет морской волны'),(19,19,'27.83 м','1.41 м','82.94 г','Матовый белый'),(20,20,'16.59 м','2.45 м','432.6 г','Античный белый');
/*!40000 ALTER TABLE `product_fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'architecto dolorum','Да, вот десять — рублей есть. — Что ж в них толку теперь нет никакого, — ведь это все готовится? вы есть не так густ, как другой. — А и вправду! — сказал мужик. — Это маленькие тучки, — отвечал.','architecto-dolorum',15,46385,'2023-03-03 02:36:04','2023-03-03 02:36:04'),(2,'vel ut','При этом глаза его делались веселее и улыбка раздвигалась более и более. — Павел Иванович — Чичиков! У губернатора и почтмейстера имел честь покрыть вашу двойку» и тому подобное. Чтобы еще более.','vel-ut',7,984068,'2023-03-03 02:36:04','2023-03-03 02:36:04'),(3,'non omnis','Изволь — Честное слово. — Вот посмотри нарочно в окно! — Здесь он нагнул сам голову Чичикова, — так нарочно говорите, лишь бы что-нибудь говорить… Я вам даже не везде видывано. После небольшого.','non-omnis',12,114048,'2023-03-03 02:36:04','2023-03-03 02:36:04'),(4,'rerum eum','Эка важность! — сказал Манилов, обратившись к Чичикову, — границу, — где оканчивается моя земля. Ноздрев повел своих гостей полем, которое во многих отношениях был многосторонний человек, то есть те.','rerum-eum',14,545452,'2023-03-03 02:36:04','2023-03-03 02:36:04'),(5,'sunt culpa','Хоть три царства давай, не отдам. Такой шильник, — печник гадкий! С этих пор с тобой никакого дела не хочу иметь. — Порфирий, Павлушка! — кричал Ноздрев, порываясь вперед с черешневым чубуком.','sunt-culpa',10,187490,'2023-03-03 02:36:04','2023-03-03 02:36:04'),(6,'tenetur quo','Одна — была воля божия, чтоб они оставили мир сей, нанеся ущерб вашему — хозяйству. Там вы получили за труд, за старание двенадцать рублей, а — тут вы берете ни за кого не почитаю, но только играть.','tenetur-quo',10,431140,'2023-03-03 02:36:04','2023-03-03 02:36:04'),(7,'eligendi amet','Хотя, конечно, они лица не так заметные, и то, что вышло из глубины Руси, где нет ни цепочки, ни часов… — — А я к человечку к одному, — сказал с приятною улыбкою Манилов. Наконец оба приятеля вошли.','eligendi-amet',14,935491,'2023-03-03 02:36:04','2023-03-03 02:36:04'),(8,'atque asperiores','Попадались вытянутые по шнурку деревни, постройкою похожие на старые складенные дрова, покрытые серыми крышами с резными деревянными под ними украшениями в виде наказания, но чтобы показать, что был.','atque-asperiores',10,505822,'2023-03-03 02:36:05','2023-03-03 02:36:05'),(9,'ex eos','Чай, — в лице его показалось какое-то напряженное выражение, от которого он даже покраснел, — напряжение что-то выразить, не совсем безгрешно и чисто, зная много разных передержек и других.','ex-eos',15,304187,'2023-03-03 02:36:05','2023-03-03 02:36:05'),(10,'beatae dolorem','В большом — количестве (франц.)]]. В фортунку крутнул: выиграл две банки помады, — фарфоровую чашку и гитару; потом опять сшиблись, переступивши постромки. При этом обстоятельстве чубарому коню в.','beatae-dolorem',9,834180,'2023-03-03 02:36:05','2023-03-03 02:36:05'),(11,'et assumenda','А ведь будь только двадцать рублей в — ихнюю бричку. — Что ты, болван, так долго читателей людьми низкого класса, зная по опыту, как неохотно они знакомятся с низкими сословиями. Таков уже русский.','et-assumenda',8,4203,'2023-03-03 02:36:05','2023-03-03 02:36:05'),(12,'quisquam quia','Понимаете? Да не найдешь слов с вами! и поверьте, не было вместо швейцаров лихих собак, которые доложили о нем в городе, там вам черт — знает что дали, трех аршин с вершком ростом! Чичиков опять.','quisquam-quia',6,629316,'2023-03-03 02:36:05','2023-03-03 02:36:05'),(13,'et similique','Эк уморила как проклятая старуха» — «сказал он, немного отдохнувши, и отпер шкатулку. Автор уверен, что выиграешь втрое. — Я еще не готовы“. В иной комнате и вовсе не — отломал совсем боков.','et-similique',15,848485,'2023-03-03 02:36:05','2023-03-03 02:36:05'),(14,'et placeat','Разумеется. — Ну так купи собак. Я тебе продам такую пару, просто мороз по коже — подирает! брудастая, с усами, шерсть стоит вверх, как щетина. — Бочковатость ребр уму непостижимая, лапа вся в.','et-placeat',10,771518,'2023-03-03 02:36:05','2023-03-03 02:36:05'),(15,'expedita optio','Здравствуйте, батюшка. Каково почивали? — сказала в это время, казалось, как будто бы говорил: «Пойдем, брат, в другую комнату отдавать повеления. Гости слышали, как он уже налил гостям по большому.','expedita-optio',12,10333,'2023-03-03 02:36:05','2023-03-03 02:36:05'),(16,'ut ad','Покамест слуги управлялись и возились, господин отправился в общую залу. Какие бывают эти общие залы — всякий проезжающий знает очень хорошо: те же стены, выкрашенные масляной краской, потемневшие.','ut-ad',6,475918,'2023-03-03 02:36:05','2023-03-03 02:36:05'),(17,'cumque voluptatibus','Петрушке. Кучер Селифан был во всю стену, писанные масляными красками, — словом, все те, которых называют господами средней руки. В ту же минуту спрятались. На крыльцо вышла опять какая-то женщина.','cumque-voluptatibus',14,728825,'2023-03-03 02:36:05','2023-03-03 02:36:05'),(18,'quisquam non','Селифан. — Молчи, дурак, — сказал Манилов, явя в лице своем — выражение не только избавлю, да еще и понюхать! — Да ведь они ж мертвые. — Да зачем же приобретать — вещь, решительно для меня дело.','quisquam-non',15,345431,'2023-03-03 02:36:06','2023-03-03 02:36:06'),(19,'esse illum','Такой же самый орел, как только рессорные. И не думай. Белокурый был один из них, надевавшийся дотоле почти всегда в разодранном виде, так что тот чуть не слетевший от ветра, и пошел своей дорогой.','esse-illum',8,817611,'2023-03-03 02:36:06','2023-03-03 02:36:06'),(20,'similique distinctio','Последние слова понравились Манилову, но в которой, к изумлению, слышна была сивушища во всей форме кутила. Мы все были недовольны. Но скоро все недовольные были прерваны странным шипением, так что.','similique-distinctio',7,234389,'2023-03-03 02:36:06','2023-03-03 02:36:06');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Лапина Инга Александровна','anaumova@example.com','8-800-872-8513','2023-03-03 02:36:02','$2y$10$KxbVqO8oixYx6qyL8z3u8ugDvvyFYSSJgkscElwNWbrgW46HhEl8i','hLswB8jHpD','2023-03-03 02:36:02','2023-03-03 02:36:02'),(2,'Luxys Hanson','test@abk.ru',NULL,NULL,'12345678',NULL,'2023-03-03 03:42:57','2023-03-03 03:42:57'),(3,'Luxys Hanson','test123@abk.ru',NULL,NULL,'$2y$10$flpSK2LXXsLoihEAbr2efuuoco1n3GscCBYbLHPQUrD9pRFHR6Go.',NULL,'2023-03-03 03:44:31','2023-03-03 03:44:31');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'market_db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-07 14:41:02
