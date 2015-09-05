-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2015 at 04:38 PM
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
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`),
  KEY `tag` (`tag`),
  FULLTEXT KEY `title` (`title`,`content`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tb_article`
--

INSERT INTO `tb_article` (`id`, `category_id`, `user_id`, `tag`, `title`, `content`, `picture`, `created_at`, `updated_at`, `read`) VALUES
(6, 3, 1, '', 'Mau iPhone 6 Plus Anti Bengkok? Coba Anti Gores Ini \n', '<p><strong>Jakarta</strong> - Sebenarnya hingga saat ini belum ketahuan apa yang menyebabkan iPhone 6 Plus bisa bengkok. Pun demikian, buat penggunanya yang tak ingin mengalami kasus &#39;bendgate&#39; anggota mungkin bisa menjajal anti gores berjenis temper glass ini.<br />\n<br />\nSeperti diketahui lapisan temper glass adalah lapisan anti gores yang mulai marak digunakan pengguna ponsel. Tak seperti anti gores biasa yang biasanya cuma berbahan seperti lapisan plastik, temper glass punya kelebihan di bahannya yang keras seperti kaca meski sebenarnya terbuat dari silikon.<br />\n<br />\nDengan kelebihan itu anti gores berjenis temper glass pun punya ketahanan yang jauh lebih baik. Jangankan sekadar goresan, saat ponsel terjatuh pun bagian layarnya akan terlindungi dari kemungkinan pecah.<br />\n<br />\nTapi temper glass besutan patchworks yang merupakan produsen asal Korea Selatan menyodorkan kemampuan lebih baik lagi. Disebut Impossible Tempered Glass (ITG), lapisan anti gores ini diklaim bisa bikin Phone 6 Plus jadi anti bengkok.<br />\n<br />\nDari pengujian yang dilakukan, iphone 6 Plus yang tak menggunakan lapisan ITG mengalami bengkok saat ditekan dengan beban 31 kg. Sedangkan bila dibekali lapisan ITG, iPhone 6 Plus bisa tahan sampai tekanan 45 kg. Artinya lapisan ITG berhasil meningkat ketahanannya jadi 45% lebih kuat.</p>\n\n<p>Meski dibuat perusahaan Korea Selatan, Patchworks sendiri merupakan jawara di Jepang. Seperti <strong>detikINET </strong>kutip dari <em>The Verge</em>, Senin (5/1/2014), perusahaan ini berhasil menjual sebanyak 1,2 juta lapisan ITG di negeri sakura itu pada tahun 2014 lalu.<br />\n<br />\nPenasaran harganya? Patchworks menjual lapisan ITG untuk iPhone 6 seharga USD 39 atau sekitar Rp 493 ribu. Sedangkan yang untuk iPhone 6 Plus dibanderol sedikit lebih mahal yakni sebesar USD 569 ribu. Tertarik?</p>\n', 'Article_20150105_Mau_iPhone_1VmrRmMzly.jpg', '2015-01-05 01:22:52', '2015-01-09 16:02:43', 0),
(7, 9, 1, '3', 'Xiaomi Resmikan Redmi 2, Ponsel 4G Murah Meriah anggota', '<p><strong>Jakarta</strong> - Xiaomi akhirnya merilis penerus Redmi 1S, yang diberi nama Redmi 2. Meski dari segi bentuk keduanya hampir sama persis, namun Redmi 2 kini tersedia dalam berbagai pilihan warna yang cukup mentereng.<br />\r\n<br />\r\nSementara dari segi spesifikasi, prosesor yang digunakan di Redmi 2 adalah quad core 1,2 GHz Snapdragon 410, yang mendukung komputasi 64 bit. Sementara GPU-nya diupgrade dari Adreno 305 ke Adreno 306.<br />\r\n<br />\r\nRAM dan storage-nya tetap 1 GB dan 8 GB. Tersedia juga slot microSD yang bisa diisi kartu memori berukuran maksimal 64 GB. Layarnya tetap 4,7 inch dengan resolusi 1.280 x 720 pixel. Sementara sistem operasinya adalah Android 4.4.4 KitKat.<br />\r\n<br />\r\nKamera belakangnya pun tetap 8 megapixel, namun resolusi kamera depan ditingkatkan menjadi 2 megapixel. Slot dual SIM Redmi 2 juga kini sudah mendukung penggunaan jaringan 4G LTE.<br />\r\n<br />\r\nSeperti dikutip <strong>detikINET </strong>dari <em>PhoneArena</em>, Senin (5/1/2015), Xiaomi Redmi 2 sudah mulai bisa dipesan dengan harga USD 112 atau sekitar Rp 1,4 juta (USD 1 = Rp 12.000), dengan pilihan warna putih, hitam, hijau, kuning, dan pink.</p>\r\n', 'Article_20150105_Xiaomi_Res_tMPsICGb2S.jpg', '2015-01-05 01:47:18', '2015-01-09 08:54:24', 1),
(8, 8, 1, '3;2', 'Dear Steve Jobs, Ponsel Jumbo Lebih Laris dari Laptop anggota\nanggota\n', '<p><strong>Jakarta</strong> - Mungkin Steve Jobs hanya kurang melengkapi kalimatnya dengan kata <em>&#39;at this/that time&#39; </em>saat berucap <em>&#39;no one is going to buy a big phone&#39;</em>. Karena faktanya, hampir semua penjualan ponsel saat ini didominasi oleh ponsel berukuran jumbo.<br />\r\n<br />\r\nPonsel besar yang punya julukan phablet -- karena ukuran tanggungnya yang sedikit lebih besar dari smartphone, tapi masih lebih kecil dari tablet -- dulu sempat dicibir dan diprediksi tak bakalan laku oleh sang pendiri Apple.<br />\r\n<br />\r\nKenyataannya, phablet dengan ukuran mulai dari 5,5 inch hingga 6,9 inch itu ternyata laku keras. Terjual sekitar 175 juta unit sepanjang tahun 2014 lalu dengan dihiasi nama-nama produk ternama seperti Samsung, HTC, Sony, Lenovo, Asus, dan bahkan Apple.<br />\r\n<br />\r\n&ldquo;Penjualan phablet di 2014 melebihi laptop yang hanya 170 juta unit. Perangkat ini akan menjadi sebuah tren baru,&quot; ujar Senior Research Manager IDC Melissa Chau seperti <strong>detikINET</strong> kutip dari situs <em>IDC</em>, Senin (5/1/2014).<br />\r\n<br />\r\nApple yang semula bertahan dengan layar 3,5 inch dan 4 inch, ternyata harus menjilat ludahnya sendiri saat merilis iPhone 6 Plus yang memiliki ukuran layar 5,5 inch. Namun siapa sangka, masuknya Apple ke segmen ini justru semakin menegaskan eksistensi phablet.<br />\r\n<br />\r\nSelain membuat phablet semakin jadi tren, kondisi ini juga membuat persaingan pasar semakin panas. Apalagi ada Samsung dan vendor besar lainnya yang lebih dulu menikmati keuntungan dari segmen phablet ini.<br />\r\n<br />\r\nIDC dalam risetnya bahkan memprediksi penjualan phablet masih bisa menembus 318 juta unit di 2015 ini atau naik 81,71% dibandingkan 2014 sebesar 175 juta unit. Sementara pangsa pasar phablet diperkirakan akan tumbuh 14% dari total pasar smartphone pada 2014 menjadi 32,2% pada 2018.<br />\r\n<br />\r\nMasih ada yang berani bilang &#39;Tak ada yang mau beli ponsel jumbo?&#39;</p>\r\n', 'Article_20150105_Dear_Steve_8nDk4DuUcc.jpg', '2015-01-05 02:01:08', '2015-01-09 16:02:50', 9),
(12, 2, 1, '3;2', 'Anggota Dewan Akan Cek Gaya Hidup Calon Tunggal Kapolri Budi Gunawan', '<p><strong>Jakarta</strong> - Komjen Pol Budi Gunawan ditunjuk oleh Presiden Joko Widodo (Jokowi) sebagai calon tunggal Kapolri. Anggota DPR, khususnya Komisi III, akan mengecek gaya hidup kepala Lembaga Pendidikan Polri tersebut.<br />\r\n<br />\r\n&quot;Komisi III akan melakukan kunjungan ke rumah dan lingkungan calon untuk melihat langsung kehidupan sosial, gaya hidup dan keluarga yang bersangkutan,&quot; kata anggota Komisi III DPR Bambang Soesatyo kepada detikcom, Jumat (9/1/2015) malam.<br />\r\n<br />\r\nPengecekan itu untuk mengkonfirmasi dan melengkapi fit and proper test calon kapolri. Selain itu, Komisi III DPR juga akan meminta masukan dari rakyat terhadap Budi Gunawan.<br />\r\n<br />\r\n&quot;Setelah ditetapkan, maka Komisi III akan mengumumkannya untuk meminta masukan dari masyarakat,&quot; ujar anggota dewan dari Fraksi Golkar tersebut.<br />\r\n<br />\r\nPresiden Jokowi mengirimkan surat permohonan yang berisi pengajuan Komjen Pol Budi Gunawan menjadi calon Kapolri. Surat itu diterima DPR pada Jumat (9/1) malam, dan akan dibacakan dalam paripurna Senin (11/1) nanti.<br />\r\n&nbsp;</p>\r\n', 'Article_20150109_Anggota_De_LC7fMeejjl.jpg', '2015-01-09 15:47:06', '2015-01-09 15:59:19', 5);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id`, `prnt`, `name`, `liclass`, `ahref`, `aclass`, `atoggle`, `icon`, `status`, `sort`) VALUES
(1, NULL, 'Dashboard', NULL, 'dashboard', NULL, NULL, 'dashboard', 1, NULL),
(2, NULL, 'Master', 'dropdown', '#', 'dropdown-toggle', 'dropdown', 'list-alt', 1, NULL),
(3, 2, 'Category', NULL, 'category', NULL, NULL, NULL, 1, NULL),
(4, NULL, 'Article', NULL, 'article', NULL, NULL, 'book', 1, NULL),
(6, NULL, 'Contact Us', NULL, 'contact', NULL, NULL, 'comments', 1, NULL),
(7, 2, 'Tags', NULL, 'tag', NULL, NULL, NULL, 1, NULL),
(8, NULL, 'Setting', 'dropdown', '#', 'dropdown-toggle', 'dropdown', 'cogs', 1, NULL),
(9, 8, 'Website Configuration', NULL, 'setting', NULL, NULL, NULL, 1, NULL),
(10, 8, 'Images Setting', NULL, 'setting/images', NULL, NULL, NULL, 1, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_messages`
--

INSERT INTO `tb_messages` (`id`, `message_id`, `article_id`, `message`, `name`, `email`, `gender`, `status`, `created_at`, `updated_at`) VALUES
(2, NULL, 12, 'hahah tes', 'Zaid Rahman Husni', 'rahmannzaid@yahoo.co.id', 0, 1, '2015-01-12 08:57:48', '0000-00-00 00:00:00'),
(3, NULL, 12, 'haha', 'santi', 'rr@mail.com', 1, 1, '2015-01-12 08:58:01', '0000-00-00 00:00:00'),
(4, NULL, 12, 'gdg', 'dg', 'rahmannzaid@yahoo.co.id', 0, 0, '2015-01-12 08:47:25', '0000-00-00 00:00:00');

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
