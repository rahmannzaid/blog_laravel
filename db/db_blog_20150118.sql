-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2015 at 08:18 AM
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
  `tag` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `picture` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `read` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`),
  KEY `tag` (`tag`),
  FULLTEXT KEY `title` (`title`,`content`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tb_article`
--

INSERT INTO `tb_article` (`id`, `category_id`, `user_id`, `tag`, `title`, `content`, `picture`, `created_at`, `updated_at`, `read`, `status`) VALUES
(13, 1, 1, '3;2', 'Masih 19 Tahun Anak Komjen Budi Dapat Kredit Rp 57 M, Siapa Penjaminnya? ', '<p><strong>Jakarta</strong> - Pengucuran dana kredit US$ 5,9 juta atau setara dengan Rp 57 miliar (kurs tahun 2005) dari perusahaan asal Selandia Baru untuk putera Komjen Budi Gunawan, Herviano Widyatama, terjadi saat sang anak berusia 19 tahun. Siapa penjamin Herviano saat itu?<br />\r\n<br />\r\nDalam surat Kabareskrim Polri bertanda tangan Komjen Ito Sumardi bernomor B/1538/VI/2010 tanggal 18 Juni 2010 yang disebar di DPR, tercantum kronologi pengucuran kredit tersebut. Tak hanya itu, dokumen-dokumen penunjangnya pun disebutkan.<br />\r\n<br />\r\nKhusus untuk dokumen pemberi jaminan, datang dari Robert Priantono Bonosusatya tertanggal 6 Juli 2005. Tak disebutkan dalam surat itu, latar belakang Robert. Yang jelas, dia tertulis di kronologi surat sebagai rekan Komjen Budi Gunawan, sama seperti Lo Stefanus.<br />\r\n<br />\r\n&quot;Bahwa dari hasil pembicaraan dengan orang tuanya yakni Irjen pol Drs Budi Gunawan selanjutnya Muhammad Herviano Widyatama dikenalkan dengan rekan orang tuanya yakni Lo Stefanus dan Robert Priantono Bonosusatya guna memperoleh pinjaman dana,&quot; demikian keterangan Bareskrim Polri seperti dikutip detikcom, Rabu (14/1/2015).<br />\r\n<br />\r\n&quot;Bahwa selanjutnya Sdr Robert Priantono Bonosusatya memperkenalkan dengan Sdr. David Koh (kuasa direksi) Pacific Blue International Limited (PBIL) yang kemudian berjanji akan memberikan pinjaman,&quot; sambungnya.<br />\r\n<br />\r\nAkhirnya proses akad kredit dilakukan pada 6 Juli 2005 senilai US$ 5,9 juta atau setara dengan Rp 57 miliar saat itu. Perjanjian kredit berlangsung selama tiga tahun dengan suku bunga 2% untuk usaha pertambangan timah dan perhotelan.<br />\r\n<br />\r\nDi dokumen-dokumen yang dipaparkan dalam surat polisi tersebut, ada satu surat yang menyebut penjamin bagi Herviano. Surat itu adalah: Letter of guarentee from Mr Robert Priantono Bonosusatya tertanggal 6 Juli 2005.<br />\r\n<br />\r\nSaat ditelusuri, nama Robert Priantono muncul sebagai salah satu pengusaha terkenal di Tanah Air. Dia duduk sebagai presiden komisaris di sebuah perusahaan. Belum ada tanggapan dari Robert soal ini.</p>\r\n', 'Article_20150114_Masih_19_T_pj1MiPROFc.jpg', '2015-01-14 05:17:05', '2015-01-14 05:17:05', 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`id`, `prnt`, `name`, `created_at`, `updated_at`) VALUES
(1, 0, 'Ci', '2015-01-14 05:16:04', '2015-01-14 05:16:04');

-- --------------------------------------------------------

--
-- Table structure for table `tb_config`
--

CREATE TABLE IF NOT EXISTS `tb_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domain` varchar(100) NOT NULL,
  `sitename` varchar(100) NOT NULL,
  `title` text NOT NULL,
  `slogan` text NOT NULL,
  `description` text NOT NULL,
  `keyword` text NOT NULL,
  `author` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `linkedin` varchar(100) NOT NULL,
  `gplus` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `phone1` varchar(100) NOT NULL,
  `phone2` varchar(100) NOT NULL,
  `whatsapp` varchar(100) NOT NULL,
  `bbm` varchar(100) NOT NULL,
  `line` varchar(100) NOT NULL,
  `skype` varchar(100) NOT NULL,
  `img_logo` varchar(255) NOT NULL,
  `img_banner` varchar(255) NOT NULL,
  `img_icon` varchar(255) NOT NULL,
  `dummy` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `domain` (`domain`),
  KEY `sitename` (`sitename`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_config`
--

INSERT INTO `tb_config` (`id`, `domain`, `sitename`, `title`, `slogan`, `description`, `keyword`, `author`, `email`, `facebook`, `twitter`, `linkedin`, `gplus`, `instagram`, `path`, `phone1`, `phone2`, `whatsapp`, `bbm`, `line`, `skype`, `img_logo`, `img_banner`, `img_icon`, `dummy`, `updated_at`) VALUES
(1, 'rahmannzaid.com', 'Site Name rahmannzaid', '.:: Blog | Rahmannzaid ::.', 'hidup ini indah\r\n', 'Description site desc', 'Keyword site key', 'rahmannzaid', 'email@mail.cpm', 'rahmann.zaid', 'rahmannzaid', 'rahmannzaid', 'gogle ples', 'insta', ' path', '08572843446', '085228620066', '85728434462', 'bbm', 'lain', 'rahmannzaid', 'Icon_20150112_072326_iUgCSVDyJI.png', '38111ba0b1cf1ef15b6a14ba17465bca.jpg', 'Icon_20150112_092820_5QWjBsktxS.png', '', '2015-01-12 02:28:20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact`
--

CREATE TABLE IF NOT EXISTS `tb_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id`, `prnt`, `name`, `liclass`, `ahref`, `aclass`, `atoggle`, `icon`, `status`, `sort`) VALUES
(1, NULL, 'Dashboard', NULL, 'dashboard', NULL, NULL, 'dashboard', 1, NULL),
(2, NULL, 'Master', 'dropdown', '#', 'dropdown-toggle', 'dropdown', 'list-alt', 1, NULL),
(3, 2, 'Category', NULL, 'category', NULL, NULL, NULL, 1, NULL),
(4, NULL, 'Article', NULL, 'article', NULL, NULL, 'book', 1, NULL),
(6, NULL, 'Contact Us', 'dropdown', '#', 'dropdown-toggle', 'dropdown', 'comments', 1, NULL),
(7, 2, 'Tags', NULL, 'tag', NULL, NULL, NULL, 1, NULL),
(8, NULL, 'Setting', 'dropdown', '#', 'dropdown-toggle', 'dropdown', 'cogs', 1, NULL),
(9, 8, 'Website Configuration', NULL, 'setting', NULL, NULL, NULL, 1, NULL),
(10, 8, 'Images Setting', NULL, 'setting/images', NULL, NULL, NULL, 1, NULL),
(11, 6, 'Contact US', NULL, 'contact', NULL, NULL, NULL, 1, NULL),
(12, 6, 'Comment', NULL, 'comment', NULL, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_messages`
--

CREATE TABLE IF NOT EXISTS `tb_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) DEFAULT NULL,
  `article_id` int(11) NOT NULL,
  `message` mediumtext NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `message_id` (`message_id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tag`
--

CREATE TABLE IF NOT EXISTS `tb_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_tag`
--

INSERT INTO `tb_tag` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'PHP5', '2015-01-09 01:07:47', '2015-01-09 01:09:23'),
(3, 'MySQL', '2015-01-09 01:11:39', '2015-01-09 01:11:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(320) NOT NULL,
  `password` varchar(64) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `description` text NOT NULL,
  `phone` varchar(12) NOT NULL,
  `whatsapp` varchar(12) NOT NULL,
  `bbm` char(8) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `email` (`email`(255)),
  KEY `password` (`password`),
  KEY `remember_token` (`remember_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `avatar`, `address`, `description`, `phone`, `whatsapp`, `bbm`, `facebook`, `twitter`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Zaid Rahman Husnih', 'zaid', 'zaid.r@visione-system.com', '$2y$10$p4K2OVnsuLpnOxRZHpjvh.5wW/XFmXErFubQSsL77TK6qJcJcIU3e', 'Avatar_20150102_Zaid_Rahma_GeMkRgmLmB.jpg', 'Dukuh 3/6, Gemantar, Selogiri, Wonogiri', 'Programer pocokan, raiso opo2, isone mung copas. Neg garap kesuwen. Bos ku wonge gapleki. Raiso dadi panutan', '085728434446', '085728434446', '25fhg545', 'rahmann.zaid', 'rahmannzaid', 'Z2kGAO8HZMN0sKaZMztr8jxpaqoEWM0bDMf5Li61FKeYG2KLpKar4ux2rHed', '2014-11-18 20:08:12', '2015-01-12 00:28:29');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
