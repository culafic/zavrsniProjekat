-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 05, 2019 at 08:39 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `register`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `reply_id` int(11) DEFAULT NULL,
  `post_id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `reply_id`, `post_id`, `timestamp`, `name`, `message`) VALUES
(1, NULL, 999, '2019-10-05 22:33:11', 'Pera', 'Prva poruka'),
(2, 1, 999, '2019-10-05 22:33:26', 'John Doe', 'Prvi odgovor Peri'),
(3, NULL, 999, '2019-10-05 22:34:20', 'Pera', 'drugi komentar');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

DROP TABLE IF EXISTS `password_reset_temp`;
CREATE TABLE IF NOT EXISTS `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_reset_temp`
--

INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES
('mara@mara.com', '768e78024aa8fdb9b8fe87be86f647450ffe53f55a', '2019-09-18 17:09:10'),
('mara@mara.com', '768e78024aa8fdb9b8fe87be86f64745566ac90689', '2019-09-18 17:55:05'),
('mara@mara.com', '768e78024aa8fdb9b8fe87be86f64745a850e3e1da', '2019-09-21 16:09:43'),
('mara@mara.com', '768e78024aa8fdb9b8fe87be86f6474574f0fea269', '2019-09-21 16:12:32'),
('mara@mara.com', '4a6330bc363811bab89789ba6ce80d59c13db77021', '2019-09-21 16:21:01'),
('mara@mara.com', '4a6330bc363811bab89789ba6ce80d59be0f02d87f', '2019-09-21 16:22:37'),
('mara@mara.com', '4a6330bc363811bab89789ba6ce80d591cd76e530c', '2019-09-21 16:31:19');

-- --------------------------------------------------------

--
-- Table structure for table `replays`
--

DROP TABLE IF EXISTS `replays`;
CREATE TABLE IF NOT EXISTS `replays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comment_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `comment_id` (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `password` longtext COLLATE utf32_unicode_ci NOT NULL,
  `trn_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `trn_date`) VALUES
(1, 'marija', 'marijaculafic88@gmail.com', '$2y$10$znTAxXE8uqF4nkUwsWBggunixpx4JXAhY3Wlc4o2sxgYILQIhjWce', '2019-09-22 21:04:36'),
(2, 'pera', 'pera@gmail.com', '$2y$10$w/dEVfJwGKA186W0FPcsQuJoRlghqcLztV8PRzH6ZGi15FTS99jb.', '2019-09-23 21:22:32');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
