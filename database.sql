-- MariaDB dump 10.19  Distrib 10.7.4-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: Crispy
-- ------------------------------------------------------
-- Server version	10.7.4-MariaDB

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(257) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonenumber` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES
('admin','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','admin@crispy.com',9876543210);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `username` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  UNIQUE KEY `item_id` (`item_id`),
  KEY `username` (`username`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES
('khush',3,1),
('khush',5,1);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback` (
  `username` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  KEY `username` (`username`),
  CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES
('santa','Awesome taste of the food.'),
('santa','The quality of the food is top notch.'),
('anubhuti','The deliver doesn\'t take long time.'),
('anubhuti','Love ordering food from here!!'),
('anubhuti','I order the food almost every week!! Just love it.'),
('khush','Simply rich and premium quality of food.'),
('khush','Yummiest Food in the city!!!!');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `category_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_type` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES
(1,'White Sauce Pasta',120,'Starter','Veg','images/food_items/1.jpg'),
(2,'Manchow Soup',100,'Starter','Veg','images/food_items/2.jpg'),
(3,'Hakka Noodles',110,'Starter','Veg','images/food_items/3.jpg'),
(4,'Zingy Parcel',50,'Starter','Veg','images/food_items/4.jpg'),
(5,'French Fries',70,'Starter','Veg','images/food_items/5.jpg'),
(6,'Spring Rolls',25,'Starter','Veg','images/food_items/6.jpg'),
(7,'Chicken Momo',70,'Starter','Non-Veg','images/food_items/7.jpg'),
(8,'Omelet',50,'Starter','Non-Veg','images/food_items/8.jpg'),
(9,'Fish Kabab',150,'Starter','Non-Veg','images/food_items/9.jpg'),
(10,'Manchurian',120,'Starter','Veg','images/food_items/10.jpg'),
(11,'Prawns',200,'Main Course','Non-Veg','images/food_items/11.jpg'),
(12,'Butter Chicken',250,'Main Course','Non-Veg','images/food_items/12.jpg'),
(13,'Rogan Josh',300,'Main Course','Non-Veg','images/food_items/13.jpg'),
(14,'Handi Paneer',300,'Main Course','Veg','images/food_items/14.jpg'),
(15,'Cheese Grilled Sandwich',40,'Starter','Veg','images/food_items/15.jpg'),
(16,'Shahi Paneer',220,'Main Course','Veg','images/food_items/16.jpg'),
(17,'Honey Chilli Potato',150,'Starter','Veg','images/food_items/17.jpg'),
(18,'Shahi Pulao',110,'Main Course','Veg','images/food_items/18.jpg'),
(19,'Butter Naan',35,'Main Course','Veg','images/food_items/19.jpg'),
(20,'Tandoori Roti',10,'Main Course','Veg','images/food_items/20.jpg'),
(21,'Tacos',80,'Starter','Veg','images/food_items/21.jpg'),
(22,'Lemon Mojito',50,'Beverages','Veg','images/food_items/22.jpg'),
(23,'Red Bull',150,'Beverages','Veg','images/food_items/23.jpg'),
(24,'Iced Tea',100,'Beverages','Veg','images/food_items/24.jpg'),
(25,'Cappucino',150,'Beverages','Veg','images/food_items/25.jpg'),
(26,'Pina Colada',280,'Beverages','Veg','images/food_items/26.jpg'),
(27,'Fresh Lime Juice',20,'Beverages','Veg','images/food_items/27.jpg'),
(28,'Lemon Soda',20,'Beverages','Veg','images/food_items/28.jpg'),
(29,'Chocolate Shake',70,'Shakes','Veg','images/food_items/29.jpg'),
(30,'Mango Shake',50,'Shakes','Veg','images/food_items/30.jpg'),
(31,'Strawberry Shake',60,'Shakes','Veg','images/food_items/31.jpg'),
(32,'Cornetto',30,'Ice Creams','Veg','images/food_items/32.jpg'),
(33,'Ice Cream Bread',100,'Ice Creams','Veg','images/food_items/33.jpg'),
(34,'Vanilla Cup',20,'Ice Creams','Veg','images/food_items/34.jpg'),
(35,'Strawberry Cone',25,'Ice Creams','Veg','images/food_items/35.jpg'),
(36,'Farm House',250,'Pizza','Veg','images/food_items/36.jpg'),
(37,'Peppy Paneer',200,'Pizza','Veg','images/food_items/37.jpg'),
(38,'Veg Extravaganza',280,'Pizza','Veg','images/food_items/38.jpg'),
(39,'Margherita',90,'Pizza','Veg','images/food_items/39.jpg'),
(40,'Chicken Pizza',250,'Pizza','Non-Veg','images/food_items/40.jpg'),
(41,'Spaghetti',180,'Main Course','Veg','images/food_items/41.jpg');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordered_item`
--

DROP TABLE IF EXISTS `ordered_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ordered_item` (
  `order_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `order_quantity` int(11) DEFAULT NULL,
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordered_item`
--

LOCK TABLES `ordered_item` WRITE;
/*!40000 ALTER TABLE `ordered_item` DISABLE KEYS */;
INSERT INTO `ordered_item` VALUES
('9f87376656c5bafd08b30f7c00a67114',1,2),
('9f87376656c5bafd08b30f7c00a67114',10,1),
('1b907d58eaed892c7620e0be65d9b723',6,2),
('1b907d58eaed892c7620e0be65d9b723',5,2),
('1b907d58eaed892c7620e0be65d9b723',32,2),
('4ef22fb415b55800090088b690e9011a',15,2),
('4ef22fb415b55800090088b690e9011a',6,2),
('4ef22fb415b55800090088b690e9011a',33,2),
('f459c343c3ad452ba580e454ba752a61',38,1),
('229c3a6da31dbdd6e5777a860a1e9d28',32,10),
('9929457710e3a7dc5877fecd0d95f91a',41,2),
('9929457710e3a7dc5877fecd0d95f91a',23,2);
/*!40000 ALTER TABLE `ordered_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `order_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `username` (`username`),
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`username`) REFERENCES `users` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES
('1b907d58eaed892c7620e0be65d9b723','khush','2022-06-06 12:42:07',250),
('229c3a6da31dbdd6e5777a860a1e9d28','santa','2022-06-06 16:38:05',300),
('4ef22fb415b55800090088b690e9011a','anubhuti','2022-06-06 16:14:18',330),
('9929457710e3a7dc5877fecd0d95f91a','khush','2022-06-06 20:23:50',660),
('9f87376656c5bafd08b30f7c00a67114','khush','2022-06-06 12:39:28',360),
('f459c343c3ad452ba580e454ba752a61','anubhuti','2022-06-06 16:22:18',280);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(257) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonenumber` bigint(20) DEFAULT NULL,
  `pic` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT 'images/user_pics/user_pic.png',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
('anubhuti','7ad2294085b9d3cabeb7e8ae05a16a558b34ebdf790c470390259b9dd0755f31','Anubhuti','Bharadwaj',20,'Female','anubhutibharadwaj11@gmail.com','Martinal Bridge, Ajmer',9123456780,'images/user_pics/user_pic.png'),
('khush','d4fb093503e68b4eee0601f6a95c33c8bdee70c9526efa8471034c77834102c1','Khush','Seervi',19,'Male','khushidk@gmail.com','Gandhi Nagar, Ajmer',9876543210,'images/user_pics/user_pic.png'),
('santa','b6dc9083da372fed2119ace11ae9ba8713f7e30827e854371eb5d2335aec664b','Santa','Claus',87,'Male','santanorthpole@gmail.com','North Pole, Earth',9847563245,'images/user_pics/user_pic.png');
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

-- Dump completed on 2022-06-11 13:45:31
