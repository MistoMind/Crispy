-- MariaDB dump 10.19  Distrib 10.8.3-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: Crispy
-- ------------------------------------------------------
-- Server version	10.8.3-MariaDB

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
('Khush','I love ordering food from this website.'),
('Anubhuti','The UI is great and service is really fast.'),
('Ketan','The quality of the food is osm!!!');
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
('c7ad69d722d35e67bb1ec904ef5dee56',38,2),
('27b4c639cf66d94db1a95f8415d111a4',1,2),
('32eea29bc371688b1f3a0651dd3e29a8',32,2),
('03be8ea488d57e0dfef747a22b1e58b1',6,10),
('40dcd86ef42cc397ceaf2f61fa516b73',38,1),
('40dcd86ef42cc397ceaf2f61fa516b73',36,1),
('40dcd86ef42cc397ceaf2f61fa516b73',17,1),
('40dcd86ef42cc397ceaf2f61fa516b73',26,1),
('3e5e9eb96650ab9bc8968ea079ba1592',27,1),
('0fc960193c98e3752b42bf67daeaf969',15,2);
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
('03be8ea488d57e0dfef747a22b1e58b1','Anubhuti','2022-07-16 11:50:18',250),
('0fc960193c98e3752b42bf67daeaf969','Ketan','2022-07-16 11:53:55',80),
('27b4c639cf66d94db1a95f8415d111a4','Khush','2022-07-16 11:49:03',240),
('32eea29bc371688b1f3a0651dd3e29a8','Anubhuti','2022-07-16 11:50:05',60),
('3e5e9eb96650ab9bc8968ea079ba1592','Akshat','2022-07-16 11:53:39',20),
('40dcd86ef42cc397ceaf2f61fa516b73','Anubhuti','2022-07-16 11:52:34',960),
('c7ad69d722d35e67bb1ec904ef5dee56','Khush','2022-07-16 11:48:50',560);
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
('Akshat','25cd0bdc4d2d600225045e5156d190c0a005d7ac0eca330794f275b76a1d99df','Akshat','Jain',18,'Male','akshat@gmail.com','Random Addr',9876543210,'images/user_pics/user_pic.png'),
('Anubhuti','128f6c8bf52142a3d25de5a8a33384c38cf08c6f069fe1f5292fae5a5d59bec6','Anubhuti','Bhardwaj',20,'Female','anubhuti@gmail.com','Random Addr',9876543120,'images/user_pics/Anubhuti.jpg'),
('Ketan','d45e6250d1aef2371c79dbfe2a1532af01a79b344e05c4f5689801e34963797b','Ketan ','Jhanwar',18,'Male','ketan@gmail.com','Random Addr',9876543210,'images/user_pics/user_pic.png'),
('Khush','90d137679d66ae7856e877aa53555d6b1b2c69e3df323e5e02cb7555bb556ee8','Khush','Seervi',19,'Male','khush@gmail.com','Random Addr',9876543210,'images/user_pics/Khush.png');
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

-- Dump completed on 2022-07-16 12:00:15
