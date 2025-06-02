-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 02, 2025 at 04:13 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mindful_moments`
--

-- --------------------------------------------------------

--
-- Table structure for table `entries`
--

DROP TABLE IF EXISTS `entries`;
CREATE TABLE IF NOT EXISTS `entries` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `mood` varchar(50) NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `entries`
--

INSERT INTO `entries` (`id`, `user_id`, `mood`, `note`, `created_at`) VALUES
(33, 8, 'Angry', 'I\'m angry that someone is using my account right now? 😠❌', '2025-06-02 04:12:20'),
(30, 8, 'Neutral', 'I am feeling pretty neutral and cool!', '2025-06-02 03:44:47'),
(32, 14, 'Sad', 'I\'m sad that this presentation will be longer than 5 minutes! 😔', '2025-06-02 04:04:28'),
(27, 7, 'Angry', 'I am so angry. 😠', '2025-05-31 02:53:04'),
(28, 8, 'Angry', 'I\'m so angry! My skateboard broke so now I can\'t do kickflips! Ahhhhhh!! 😠❌', '2025-05-31 02:55:47'),
(29, 8, 'Happy', 'Woah! My skateboard came back to life! 🛹', '2025-05-31 02:56:12'),
(25, 7, 'Happy', 'I\'m so happy! I am a monster from monsterville! I love pizza! 🍕', '2025-05-31 02:51:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password_hash`, `created_at`) VALUES
(8, 'SkateBoardDude', 'skateboarddude@hotmail.com', '$2y$10$XlMiDUQrlNXDEePqgynJdewgBra/XJSr3fu2tjpOFmnD6QLF9rL0a', '2025-05-18 17:37:57'),
(7, 'MagicMonster', 'magicmonster@hotmail.com', '$2y$10$CZc9QIvwahwNNZAS/Guw/uZX59Qbi0pKl47dv8NkMFbi5sNizvgKm', '2025-05-18 16:39:35'),
(14, 'NewAccountPerson', 'newaccountperson@hotmail.com', '$2y$10$W.NBn8JF8iEf.cM05ROcxu35rHz2pLwQjlVKloWJru0SbfkRy7V6K', '2025-06-02 03:50:58');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
