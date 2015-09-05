-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2015 at 04:55 PM
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
  `content` mediumtext NOT NULL,
  `picture` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `read` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`),
  KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tb_article`
--

INSERT INTO `tb_article` (`id`, `category_id`, `user_id`, `title`, `content`, `picture`, `created_at`, `updated_at`, `read`) VALUES
(6, 2, 1, 'Mau iPhone 6 Plus Anti Bengkok? Coba Anti Gores Ini', '<p><strong>Jakarta</strong> - Sebenarnya hingga saat ini belum ketahuan apa yang menyebabkan iPhone 6 Plus bisa bengkok. Pun demikian, buat penggunanya yang tak ingin mengalami kasus &#39;bendgate&#39; mungkin bisa menjajal anti gores berjenis temper glass ini.<br />\r\n<br />\r\nSeperti diketahui lapisan temper glass adalah lapisan anti gores yang mulai marak digunakan pengguna ponsel. Tak seperti anti gores biasa yang biasanya cuma berbahan seperti lapisan plastik, temper glass punya kelebihan di bahannya yang keras seperti kaca meski sebenarnya terbuat dari silikon.<br />\r\n<br />\r\nDengan kelebihan itu anti gores berjenis temper glass pun punya ketahanan yang jauh lebih baik. Jangankan sekadar goresan, saat ponsel terjatuh pun bagian layarnya akan terlindungi dari kemungkinan pecah.<br />\r\n<br />\r\nTapi temper glass besutan patchworks yang merupakan produsen asal Korea Selatan menyodorkan kemampuan lebih baik lagi. Disebut Impossible Tempered Glass (ITG), lapisan anti gores ini diklaim bisa bikin Phone 6 Plus jadi anti bengkok.<br />\r\n<br />\r\nDari pengujian yang dilakukan, iphone 6 Plus yang tak menggunakan lapisan ITG mengalami bengkok saat ditekan dengan beban 31 kg. Sedangkan bila dibekali lapisan ITG, iPhone 6 Plus bisa tahan sampai tekanan 45 kg. Artinya lapisan ITG berhasil meningkat ketahanannya jadi 45% lebih kuat.</p>\r\n\r\n<p>Meski dibuat perusahaan Korea Selatan, Patchworks sendiri merupakan jawara di Jepang. Seperti <strong>detikINET </strong>kutip dari <em>The Verge</em>, Senin (5/1/2014), perusahaan ini berhasil menjual sebanyak 1,2 juta lapisan ITG di negeri sakura itu pada tahun 2014 lalu.<br />\r\n<br />\r\nPenasaran harganya? Patchworks menjual lapisan ITG untuk iPhone 6 seharga USD 39 atau sekitar Rp 493 ribu. Sedangkan yang untuk iPhone 6 Plus dibanderol sedikit lebih mahal yakni sebesar USD 569 ribu. Tertarik?</p>\r\n', 'Article_20150105_Mau_iPhone_1VmrRmMzly.jpg', '2015-01-05 01:22:52', '2015-01-08 00:36:35', 0),
(7, 9, 1, 'Xiaomi Resmikan Redmi 2, Ponsel 4G Murah Meriah', '<p><strong>Jakarta</strong> - Xiaomi akhirnya merilis penerus Redmi 1S, yang diberi nama Redmi 2. Meski dari segi bentuk keduanya hampir sama persis, namun Redmi 2 kini tersedia dalam berbagai pilihan warna yang cukup mentereng.<br />\r\n<br />\r\nSementara dari segi spesifikasi, prosesor yang digunakan di Redmi 2 adalah quad core 1,2 GHz Snapdragon 410, yang mendukung komputasi 64 bit. Sementara GPU-nya diupgrade dari Adreno 305 ke Adreno 306.<br />\r\n<br />\r\nRAM dan storage-nya tetap 1 GB dan 8 GB. Tersedia juga slot microSD yang bisa diisi kartu memori berukuran maksimal 64 GB. Layarnya tetap 4,7 inch dengan resolusi 1.280 x 720 pixel. Sementara sistem operasinya adalah Android 4.4.4 KitKat.<br />\r\n<br />\r\nKamera belakangnya pun tetap 8 megapixel, namun resolusi kamera depan ditingkatkan menjadi 2 megapixel. Slot dual SIM Redmi 2 juga kini sudah mendukung penggunaan jaringan 4G LTE.<br />\r\n<br />\r\nSeperti dikutip <strong>detikINET </strong>dari <em>PhoneArena</em>, Senin (5/1/2015), Xiaomi Redmi 2 sudah mulai bisa dipesan dengan harga USD 112 atau sekitar Rp 1,4 juta (USD 1 = Rp 12.000), dengan pilihan warna putih, hitam, hijau, kuning, dan pink.</p>\r\n', 'Article_20150105_Xiaomi_Res_tMPsICGb2S.jpg', '2015-01-05 01:47:18', '2015-01-05 02:01:21', 1),
(8, 9, 1, 'Dear Steve Jobs, Ponsel Jumbo Lebih Laris dari Laptop', '<p><strong>Jakarta</strong> - Mungkin Steve Jobs hanya kurang melengkapi kalimatnya dengan kata <em>&#39;at this/that time&#39; </em>saat berucap <em>&#39;no one is going to buy a big phone&#39;</em>. Karena faktanya, hampir semua penjualan ponsel saat ini didominasi oleh ponsel berukuran jumbo.<br />\r\n<br />\r\nPonsel besar yang punya julukan phablet -- karena ukuran tanggungnya yang sedikit lebih besar dari smartphone, tapi masih lebih kecil dari tablet -- dulu sempat dicibir dan diprediksi tak bakalan laku oleh sang pendiri Apple.<br />\r\n<br />\r\nKenyataannya, phablet dengan ukuran mulai dari 5,5 inch hingga 6,9 inch itu ternyata laku keras. Terjual sekitar 175 juta unit sepanjang tahun 2014 lalu dengan dihiasi nama-nama produk ternama seperti Samsung, HTC, Sony, Lenovo, Asus, dan bahkan Apple.<br />\r\n<br />\r\n&ldquo;Penjualan phablet di 2014 melebihi laptop yang hanya 170 juta unit. Perangkat ini akan menjadi sebuah tren baru,&quot; ujar Senior Research Manager IDC Melissa Chau seperti <strong>detikINET</strong> kutip dari situs <em>IDC</em>, Senin (5/1/2014).<br />\r\n<br />\r\nApple yang semula bertahan dengan layar 3,5 inch dan 4 inch, ternyata harus menjilat ludahnya sendiri saat merilis iPhone 6 Plus yang memiliki ukuran layar 5,5 inch. Namun siapa sangka, masuknya Apple ke segmen ini justru semakin menegaskan eksistensi phablet.<br />\r\n<br />\r\nSelain membuat phablet semakin jadi tren, kondisi ini juga membuat persaingan pasar semakin panas. Apalagi ada Samsung dan vendor besar lainnya yang lebih dulu menikmati keuntungan dari segmen phablet ini.<br />\r\n<br />\r\nIDC dalam risetnya bahkan memprediksi penjualan phablet masih bisa menembus 318 juta unit di 2015 ini atau naik 81,71% dibandingkan 2014 sebesar 175 juta unit. Sementara pangsa pasar phablet diperkirakan akan tumbuh 14% dari total pasar smartphone pada 2014 menjadi 32,2% pada 2018.<br />\r\n<br />\r\nMasih ada yang berani bilang &#39;Tak ada yang mau beli ponsel jumbo?&#39;</p>\r\n', 'Article_20150105_Dear_Steve_8nDk4DuUcc.jpg', '2015-01-05 02:01:08', '2015-01-05 02:01:08', 7),
(9, 1, 1, 'dfgdfg', '<p>dfgdfg</p>\r\n', 'Article_20150109_dfgdfg_LXHp9bU5cR.jpg', '2015-01-09 01:44:04', '2015-01-09 01:44:04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_article_tag`
--

CREATE TABLE IF NOT EXISTS `tb_article_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`),
  KEY `tag_id` (`tag_id`),
  KEY `created_at` (`created_at`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tb_article_tag`
--

INSERT INTO `tb_article_tag` (`id`, `article_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 9, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 9, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`id`, `prnt`, `name`, `created_at`, `updated_at`) VALUES
(1, 0, 'Pemrograman', '2014-11-24 23:15:20', '2014-11-24 23:15:20'),
(2, 1, 'Codeigniter', '2014-11-24 23:15:32', '2014-11-24 23:15:32'),
(3, 1, 'Laravel', '2014-11-24 23:15:41', '2014-11-24 23:15:41'),
(4, 1, 'VB.NET', '2014-11-24 23:16:25', '2014-11-24 23:16:25'),
(7, 0, 'Fisika', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 0, 'Matematika', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 0, 'Gadget', '2015-01-05 01:21:55', '2015-01-05 01:21:55');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id`, `prnt`, `name`, `liclass`, `ahref`, `aclass`, `atoggle`, `icon`, `status`, `sort`) VALUES
(1, NULL, 'Dashboard', NULL, 'dashboard', NULL, NULL, 'dashboard', 1, NULL),
(2, NULL, 'Master', 'dropdown', '#', 'dropdown-toggle', 'dropdown', 'list-alt', 1, NULL),
(3, 2, 'Category', NULL, 'category', NULL, NULL, NULL, 1, NULL),
(4, NULL, 'Article', NULL, 'article', NULL, NULL, 'book', 1, NULL),
(6, NULL, 'Contact Us', NULL, 'contact', NULL, NULL, 'comments', 1, NULL),
(7, 2, 'Tags', NULL, 'tag', NULL, NULL, NULL, 1, NULL);

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
  PRIMARY KEY (`id`)
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
(1, 'Zaid Rahman Husnih', 'zaid', 'zaid.r@visione-system.com', '$2y$10$p4K2OVnsuLpnOxRZHpjvh.5wW/XFmXErFubQSsL77TK6qJcJcIU3e', 'Avatar_20150102_Zaid_Rahma_GeMkRgmLmB.jpg', 'Dukuh 3/6, Gemantar, Selogiri, Wonogiri', '', '085728434446', '085728434446', '25fhg545', 'rahmann.zaid', 'rahmannzaid', 'Z2kGAO8HZMN0sKaZMztr8jxpaqoEWM0bDMf5Li61FKeYG2KLpKar4ux2rHed', '2014-11-18 20:08:12', '2015-01-06 02:37:12');

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
