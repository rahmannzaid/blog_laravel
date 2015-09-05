-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2015 at 04:52 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_article`
--

CREATE TABLE IF NOT EXISTS `tb_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `picture` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`),
  KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_article`
--

INSERT INTO `tb_article` (`id`, `category_id`, `user_id`, `title`, `content`, `picture`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 'fisika ki gapleki', '<p>pokoe fisika nganyelne</p>\r\n', 'Article_20141203_fisika_ki__xfjYhTNOfy.jpg', '2014-11-25 17:00:00', '2014-12-03 15:22:21'),
(2, 3, 1, 'Laravel', 'larav larav', 'Article_20141128_Laravel_sFcQZtGglv.jpg', '2014-11-27 18:15:34', '2014-11-27 18:15:34'),
(3, 2, 1, 'Tutorial Codeigniter', 'hahah codeigniter', 'Article_20141128_Tutorial_C_4zzpTdVafn.jpg', '2014-11-28 02:28:50', '2014-11-28 02:28:50'),
(4, 7, 1, 'Title Fisika', 'konten fisika', 'Article_20141202_Title_Fisi_i4dZd1HsT4.jpg', '2014-12-01 18:23:35', '2014-12-01 18:23:35'),
(5, 8, 1, 'Saya benci orang matematika', '<p>hahaha</p>\r\n', 'Article_20141203_Saya_benci_6wGI6ntjpA.jpg', '2014-12-03 15:13:53', '2014-12-03 15:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE IF NOT EXISTS `tb_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prnt` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `parent` (`prnt`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`id`, `prnt`, `name`, `created_at`, `updated_at`) VALUES
(1, 0, 'Pemrograman', '2014-11-24 23:15:20', '2014-11-24 23:15:20'),
(2, 1, 'Codeigniter', '2014-11-24 23:15:32', '2014-11-24 23:15:32'),
(3, 1, 'Laravel', '2014-11-24 23:15:41', '2014-11-24 23:15:41'),
(4, 1, 'VB.NET', '2014-11-24 23:16:25', '2014-11-24 23:16:25'),
(7, 0, 'Fisika', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 0, 'Matematika', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact`
--

CREATE TABLE IF NOT EXISTS `tb_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_contact`
--

INSERT INTO `tb_contact` (`id`, `name`, `email`, `title`, `content`, `created_at`, `updated_at`) VALUES
(2, 'Rahman', 'rahmannzaid@yahoo.co.id', 'Aku meh tekok', 'Anu, ah yowes rasido tekok wae', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE IF NOT EXISTS `tb_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prnt` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `liclass` varchar(100) DEFAULT NULL,
  `ahref` varchar(100) DEFAULT NULL,
  `aclass` varchar(100) DEFAULT NULL,
  `atoggle` varchar(100) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent` (`prnt`),
  KEY `status` (`status`),
  KEY `sort` (`sort`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id`, `prnt`, `name`, `liclass`, `ahref`, `aclass`, `atoggle`, `icon`, `status`, `sort`) VALUES
(1, NULL, 'Dashboard', NULL, 'dashboard', NULL, NULL, 'dashboard', 1, NULL),
(2, NULL, 'Master', 'dropdown', '#', 'dropdown-toggle', 'dropdown', 'list-alt', 1, NULL),
(3, 2, 'Category', NULL, 'category', NULL, NULL, NULL, 1, NULL),
(4, NULL, 'Article', NULL, 'article', NULL, NULL, 'book', 1, NULL),
(6, NULL, 'Contact Us', NULL, 'contact', NULL, NULL, 'comments', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(320) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `whatsapp` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `bbm` char(8) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `email` (`email`(255)),
  KEY `password` (`password`),
  KEY `remember_token` (`remember_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `avatar`, `address`, `phone`, `whatsapp`, `bbm`, `facebook`, `twitter`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Zaid Rahman Husnih', 'zaid', 'zaid.r@visione-system.com', '$2y$10$p4K2OVnsuLpnOxRZHpjvh.5wW/XFmXErFubQSsL77TK6qJcJcIU3e', 'Avatar_20150102_Zaid_Rahma_GeMkRgmLmB.jpg', 'Dukuh 3/6, Gemantar, Selogiri, Wonogiri', '085728434446', '085728434446', '25fhg545', 'rahmann.zaid', 'rahmannzaid', 'NgpZRgjwRt89j0RLUdwHrU0JVza0IrUbP9uiScGNmhfiStLsBIQj9Aswaeiz', '2014-11-18 20:08:12', '2015-01-02 02:42:21');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_article`
--
ALTER TABLE `tb_article`
  ADD CONSTRAINT `tb_article_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tb_category` (`id`),
  ADD CONSTRAINT `tb_article_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
