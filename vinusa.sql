-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Feb 19, 2018 at 09:24 AM
-- Server version: 5.6.36-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vinusa`
--

-- --------------------------------------------------------

--
-- Table structure for table `coin`
--

CREATE TABLE IF NOT EXISTS `coin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total` int(11) NOT NULL,
  `stage_1` int(11) NOT NULL,
  `stage_2` int(11) NOT NULL,
  `stage_3` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `coin`
--

INSERT INTO `coin` (`id`, `total`, `stage_1`, `stage_2`, `stage_3`) VALUES
(1, 21000000, 7000000, 4000000, 10000000);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE IF NOT EXISTS `order_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` text NOT NULL,
  `result` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_proses`
--

CREATE TABLE IF NOT EXISTS `order_proses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` enum('deposit','withdraw') NOT NULL,
  `total_action` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE IF NOT EXISTS `paket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `min_deposit` int(11) NOT NULL,
  `max_deposit` int(11) NOT NULL,
  `contract` int(11) NOT NULL,
  `reward` int(11) NOT NULL,
  `sk` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id`, `name`, `min_deposit`, `max_deposit`, `contract`, `reward`, `sk`) VALUES
(1, 'Bronze', 100, 300, 14, 15, ''),
(2, 'Silver', 310, 1000, 12, 25, ''),
(3, 'Gold', 1010, 5000, 12, 30, ''),
(4, 'Premium Gold', 5010, 10000, 10, 35, ''),
(5, 'Diamond', 10010, 100000, 8, 40, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vipwallet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accesskey` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `vipwallet`, `accesskey`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dicky Pratama', 'dickypratamss@gmail.com', '$2y$10$CjSnsLibxpRwV8BGE/URvevHtuQrF2qpuT7VKo5QzQZYvH6t5C8x6', 'cieasdjahsdn12bn4122', 'acesskey', '4gzbxf8efutWtp7Low6737POueLxhDgvdMfgLs3o5lqoZHQwLe7cfretipfM', '2018-02-11 00:09:43', '2018-02-11 00:09:43');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE IF NOT EXISTS `wallet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `token` int(11) NOT NULL,
  `total_coin` int(11) NOT NULL,
  `total_eth` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
