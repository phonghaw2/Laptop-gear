-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2022 at 06:12 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ali`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `level`) VALUES
(1, 'admin', 'admin', 0),
(2, 'superadmin', 'superadmin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `token` varchar(200) DEFAULT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `email`, `password`, `token`, `phone_number`, `address`) VALUES
(1, 'phongbui', 'phongtest1@gmail.com', '123123', 'user_62c59e4847a229.063603061657118280', '', ''),
(3, 'phong dai ka', 'phongdaika@gmail.com', '123123', 'user_62c45dec1c4706.803839071657036268', '', ''),
(4, 'phong met moi', 'phongtired@gmail.com', '123123', 'user_62c44df420b811.769283021657032180', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE `forgot_password` (
  `customer_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mount_product` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`, `mount_product`) VALUES
(9, 'Asus', 0),
(10, 'MSI', 0),
(11, 'Lenovo', 0),
(12, 'Dell', 0),
(13, 'HP', 0),
(14, 'Acer', 0),
(15, 'Logitech', 0),
(16, 'Razer', 0),
(17, 'HyperX', 0),
(18, 'Akko', 0),
(19, 'IQUNIX', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name_receiver` varchar(50) NOT NULL,
  `phone_receiver` char(20) NOT NULL,
  `address_receiver` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `name_receiver`, `phone_receiver`, `address_receiver`, `status`, `created_at`, `total_price`) VALUES
(1, 4, 'phong met moi', '0999999999', 'district 6 , Hell', 2, '2022-07-06 14:18:28', 29080000),
(2, 4, 'Phong hang xom', '258585', 'district 6 , Satan , Hell', 0, '2022-07-05 15:42:59', 27980000),
(3, 3, 'phong dai ka', '225225225', 'still suck bro', 0, '2022-07-05 15:47:44', 3480000),
(4, 3, 'phong dai ka', '255255255', 'hehehe', 0, '2022-07-05 15:51:21', 15090000);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_id`, `product_id`, `quantity`) VALUES
(1, 208, 1),
(1, 210, 1),
(2, 208, 2),
(3, 274, 1),
(3, 290, 1),
(4, 210, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` int(20) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `style_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `description`, `manufacturer_id`, `style_id`) VALUES
(206, 'Laptop ASUS D515DA EJ845T', 9690000, 'Laptop ASUS D515DA EJ845T.jpg', '', 9, 1),
(207, 'Laptop Asus VivoBook A415EA EB1750W', 11990000, 'Laptop Asus VivoBook A415EA EB1750W.jpg', '', 9, 1),
(208, 'Laptop Asus X415EA EB640W', 13990000, 'Laptop Asus X415EA EB640W.jpg', '', 9, 1),
(209, 'Laptop ASUS Vivobook Flip TP470EA EC346W', 14490000, 'Laptop ASUS Vivobook Flip TP470EA EC346W.jpg', '', 9, 1),
(210, 'Laptop Asus VivoBook A415EA EB1474W', 15090000, 'Laptop Asus VivoBook A415EA EB1474W.jpg', '', 9, 1),
(211, 'Laptop Asus Vivobook OLED A515EA L12033W', 16290000, 'Laptop Asus Vivobook OLED A515EA L12033W.jpg', '', 9, 1),
(212, 'Laptop Asus VivoBook 14 X1402ZA EK084W', 17290000, 'Laptop Asus VivoBook 14 X1402ZA EK084W.jpg', '', 9, 1),
(213, 'Laptop Asus Vivobook Pro M3401QA KM006W', 17390000, 'Laptop Asus Vivobook Pro M3401QA KM006W.jpg', '', 9, 1),
(214, 'Laptop ASUS Vivobook 15 X1502ZA BQ127W', 17990000, 'Laptop ASUS Vivobook 15 X1502ZA BQ127W.jpg', '', 9, 1),
(215, 'Laptop Asus VivoBook 14 M413IA EK481T', 18090000, 'Laptop Asus VivoBook 14 M413IA EK481T.jpg', '', 9, 1),
(216, 'Laptop Lenovo V14 G2 ITL 82KA00RXVN', 13590000, 'Laptop Lenovo V14 G2 ITL 82KA00RXVN.jpg', '', 11, 1),
(217, 'Laptop Lenovo ThinkBook 13S G3 ACN 20YA003CVN', 15490000, 'Laptop Lenovo ThinkBook 13S G3 ACN 20YA003CVN.jpg', '', 11, 1),
(218, 'Laptop Lenovo ThinkBook 15 G3 ACL 21A400CFVN', 16990000, 'Laptop Lenovo ThinkBook 15 G3 ACL 21A400CFVN.jpg', '', 11, 1),
(219, 'Laptop Lenovo IdeaPad 5 15ITL05 82FG01H8VN', 17490000, 'Laptop Lenovo IdeaPad 5 15ITL05 82FG01H8VN.jpg', '', 11, 1),
(220, 'Laptop Lenovo IdeaPad 5 Pro 14ITL6 82L300KSVN', 17990000, 'Laptop Lenovo IdeaPad 5 Pro 14ITL6 82L300KSVN.jpg', '', 11, 1),
(221, 'Laptop Lenovo IdeaPad 5 Pro 14ACN6 82L700L5VN', 18290000, 'Laptop Lenovo IdeaPad 5 Pro 14ACN6 82L700L5VN.jpg', '', 11, 1),
(222, 'Laptop Lenovo ThinkBook 14 G2 ITL 20VD00Y5VN', 18390000, 'Laptop Lenovo ThinkBook 14 G2 ITL 20VD00Y5VN.jpg', '', 11, 1),
(223, 'Laptop Lenovo V15 G2 ITL 82KB00R2VN', 19580000, 'Laptop Lenovo V15 G2 ITL 82KB00R2VN.jpg', '', 11, 1),
(224, 'Laptop MSI Modern 14 B11MOU 1028VN', 11590000, 'Laptop MSI Modern 14 B11MOU 1028VN.jpg', '', 10, 1),
(225, 'Laptop MSI Modern 14 B11MOU 1030VN', 12190000, 'Laptop MSI Modern 14 B11MOU 1030VN.jpg', '', 10, 1),
(226, 'Laptop MSI Modern 14 B5M 202VN', 13490000, 'Laptop MSI Modern 14 B5M 202VN.jpg', '', 10, 1),
(227, 'Laptop MSI Modern 14 B5M 204VN', 13490000, 'Laptop MSI Modern 14 B5M 204VN.jpg', '', 10, 1),
(228, 'Laptop MSI Modern 15 A5M 238VN', 14190000, 'Laptop MSI Modern 15 A5M 238VN.jpg', '', 10, 1),
(229, 'Laptop MSI Modern 15 A11M 1024VN', 15190000, 'Laptop MSI Modern 15 A11M 1024VN.jpg', '', 10, 1),
(230, 'Laptop MSI Modern 15 A5M 239VN', 15690000, 'Laptop MSI Modern 15 A5M 239VN.jpg', '', 10, 1),
(231, 'Laptop MSI Modern 14 B11MOU 1033VN', 17990000, 'Laptop MSI Modern 14 B11MOU 1033VN.jpg', '', 10, 1),
(232, 'Laptop Dell Vostro 3510 V5I3305W Black', 12590000, 'Laptop Dell Vostro 3510 V5I3305W Black.jpg', '', 12, 1),
(233, 'Laptop Dell Vostro 3400 P132G003 70270644', 12590000, 'Laptop Dell Vostro 3400 P132G003 70270644.jpg', '', 12, 1),
(234, 'Laptop Dell Inspiron 3511 P112F001CBL', 13790000, 'Laptop Dell Inspiron 3511 P112F001CBL.jpg', '', 12, 1),
(235, 'Laptop Dell Vostro 3400 P132G003 70270645', 16490000, 'Laptop Dell Vostro 3400 P132G003 70270645.jpg', '', 12, 1),
(236, 'Laptop Dell Vostro 3510 7T2YC2', 17490000, 'Laptop Dell Vostro 3510 7T2YC2.jpg', '', 12, 1),
(237, 'Laptop Dell Inspiron 15 3511 P112F002 70270650', 18690000, 'Laptop Dell Inspiron 15 3511 P112F002 70270650.jpg', '', 12, 1),
(238, 'Laptop Dell Vostro 5410 V4I5214W1', 20600000, 'Laptop Dell Vostro 5410 V4I5214W1.jpg', '', 12, 1),
(239, 'Laptop Dell Inspiron 5515 N5R75700U104W1 Silver', 21990000, 'Laptop Dell Inspiron 5515 N5R75700U104W1 Silver.jpg', '', 12, 1),
(240, 'Laptop HP Pavilion 15 EG0513TU 46M12PA', 13990000, 'Laptop HP Pavilion 15 EG0513TU 46M12PA.jpg', '', 13, 1),
(241, 'Laptop HP 15S du3593tu 63P89PA', 14990000, 'Laptop HP 15S du3593tu 63P89PA.jpg', '', 13, 1),
(242, 'Laptop HP Pavilion 15 EG0539TU 4P5G6PA', 17990000, 'Laptop HP Pavilion 15 EG0539TU 4P5G6PA.jpg', '', 13, 1),
(243, 'Laptop HP Pavilion 15 EG0506TX 46M05PA', 19590000, 'Laptop HP Pavilion 15 EG0506TX 46M05PA.jpg', '', 13, 1),
(244, 'Laptop HP ProBook 450 G8 614K3PA', 19990000, 'Laptop HP ProBook 450 G8 614K3PA.jpg', '', 13, 1),
(245, 'Laptop HP Pavilion 14 dv0534TU 4P5G3PA', 22490000, 'Laptop HP Pavilion 14 dv0534TU 4P5G3PA.jpg', '', 13, 1),
(246, 'Laptop Acer Aspire 5 A515 57 52Y2', 15990000, 'Laptop Acer Aspire 5 A515 57 52Y2.jpg', '', 14, 1),
(247, 'Laptop Acer Aspire 3 A315 58 59LY', 15390000, 'Laptop Acer Aspire 3 A315 58 59LY.jpg', '', 14, 1),
(248, 'Laptop Acer Aspire 3 A315 58 54M5', 16990000, 'Laptop Acer Aspire 3 A315 58 54M5.jpg', '', 14, 1),
(249, 'Laptop Acer Aspire 3 A315 58 35AG', 11490000, 'Laptop Acer Aspire 3 A315 58 35AG.jpg', '', 14, 1),
(250, 'Laptop Acer Aspire 5 A514 54 5127', 15990000, 'Laptop Acer Aspire 5 A514 54 5127.jpg', '', 14, 1),
(251, 'Laptop Acer Aspire 3 A315 57G 573F', 15590000, 'Laptop Acer Aspire 3 A315 57G 573F.jpg', '', 14, 1),
(252, 'Laptop Acer Aspire 3 A315 56 58EG', 12990000, 'Laptop Acer Aspire 3 A315 56 58EG.jpg', '', 14, 1),
(253, 'Laptop Acer Swift 3 SF314 43 R4X3', 18490000, 'Laptop Acer Swift 3 SF314 43 R4X3.jpg', '', 14, 1),
(254, 'Chuột Logitech G203 LightSync Blue', 400000, 'Chuột Logitech G203 LightSync Blue.jpg', '', 15, 2),
(255, 'Chuột Logitech G203 LightSync Lilac', 400000, 'Chuột Logitech G203 LightSync Lilac.jpg', '', 15, 2),
(256, 'Chuột Logitech G102 Lightsync RGB Black', 400000, 'Chuột Logitech G102 Lightsync RGB Black.jpg', '', 15, 2),
(257, 'Chuột Logitech G102 Lightsync RGB White', 400000, 'Chuột Logitech G102 Lightsync RGB White.jpg', '', 15, 2),
(258, 'Chuột Logitech G402 Hyperion', 659000, 'Chuột Logitech G402 Hyperion.jpg', '', 15, 2),
(259, 'Chuột Logitech G502 Hero', 1049000, 'Chuột Logitech G502 Hero.jpg', '', 15, 2),
(260, 'Chuột Logitech G Pro X Superlight Wireless Black', 2890000, 'Chuột Logitech G Pro X Superlight Wireless Black.jpg', '', 15, 2),
(261, 'Chuột Logitech G304 Lightspeed Wireless', 790000, 'Chuột Logitech G304 Lightspeed Wireless.jpg', '', 15, 2),
(262, 'Chuột Razer Viper Ultimate (Bản không dock sạc)', 1990000, 'Chuột Razer Viper Ultimate (Bản không dock sạc).jpg', '', 16, 2),
(263, 'Chuột Razer Deathadder Essential', 590000, 'Chuột Razer Deathadder Essential.jpg', '', 16, 2),
(264, 'Chuột Razer Deathadder Essential White', 590000, 'Chuột Razer Deathadder Essential White.jpg', '', 16, 2),
(265, 'Chuột Razer Basilisk V3', 1590000, 'Chuột Razer Basilisk V3.jpg', '', 16, 2),
(266, 'Chuột Razer DeathAdder V2 Pro', 2390000, 'Chuột Razer DeathAdder V2 Pro.jpg', '', 16, 2),
(267, 'Chuột Razer Deathadder V2 Mini', 650000, 'Chuột Razer Deathadder V2 Mini.jpg', '', 16, 2),
(268, 'Chuột Razer Viper V2 Pro White', 3899000, 'Chuột Razer Viper V2 Pro White.jpg', '', 16, 2),
(269, 'Chuột Razer Viper V2 Pro', 3899000, 'Chuột Razer Viper V2 Pro.jpg', '', 16, 2),
(270, 'Chuột HyperX PulseFire FPS Core', 690000, 'Chuột HyperX PulseFire FPS Core.jpg', '', 17, 2),
(271, 'Chuột HyperX Pulsefire FPS Pro', 790000, 'Chuột HyperX Pulsefire FPS Pro.jpg', '', 17, 2),
(272, 'Chuột HyperX Pulsefire Haste White Pink', 990000, 'Chuột HyperX Pulsefire Haste White Pink.jpg', '', 17, 2),
(273, 'Chuột HyperX Pulsefire Haste Black Red', 990000, 'Chuột HyperX Pulsefire Haste Black Red.jpg', '', 17, 2),
(274, 'Chuột HyperX Pulsefire Haste RGB', 990000, 'Chuột HyperX Pulsefire Haste RGB.jpg', '', 17, 2),
(275, 'Chuột HyperX Pulsefire Raid RGB', 1190000, 'Chuột HyperX Pulsefire Raid RGB.jpg', '', 17, 2),
(276, 'Chuột HyperX Pulsefire Haste White Wireless', 1990000, 'Chuột HyperX Pulsefire Haste White Wireless.jpg', '', 17, 2),
(277, 'Chuột HyperX Pulsefire Haste Black Wireless', 1990000, 'Chuột HyperX Pulsefire Haste Black Wireless.jpg', '', 17, 2),
(278, 'Bàn phím cơ AKKO 3108SP Pink Akko Switch V2', 790000, 'Bàn phím cơ AKKO 3108SP Pink Akko Switch V2.jpg', '', 18, 3),
(279, 'Bàn phím cơ AKKO 3108SP Black Akko Switch V2', 790000, 'Bàn phím cơ AKKO 3108SP Black Akko Switch V2.jpg', '', 18, 3),
(280, 'Bàn phím cơ AKKO 3087 Plus Black & Cyan', 1489000, 'Bàn phím cơ AKKO 3087 Plus Black & Cyan.jpg', '', 18, 3),
(281, 'Bàn phím cơ AKKO 3087 Plus Prunus Lannesiana', 1489000, 'Bàn phím cơ AKKO 3087 Plus Prunus Lannesiana.jpg', '', 18, 3),
(282, 'Bàn phím cơ AKKO 3108 Plus Prunus Lannesiana', 1589000, 'Bàn phím cơ AKKO 3108 Plus Prunus Lannesiana.jpg', '', 18, 3),
(283, 'Bàn phím cơ AKKO 3108 Plus Black & Cyan', 1589000, 'Bàn phím cơ AKKO 3108 Plus Black & Cyan.jpg', '', 18, 3),
(284, 'Bàn phím AKKO 3068 v2 RGB White', 1599000, 'Bàn phím AKKO 3068 v2 RGB White.jpg', '', 18, 3),
(285, 'Bàn phím AKKO 3084 v2 RGB Black', 1699000, 'Bàn phím AKKO 3084 v2 RGB Black.jpg', '', 18, 3),
(286, 'Bàn phím Logitech G512 GX RGB (Clicky)', 1990000, 'Bàn phím Logitech G512 GX RGB (Clicky).jpg', '', 15, 3),
(288, 'Bàn phím Logitech G PRO Mechanical Gaming Keyboard', 2590000, 'Bàn phím Logitech G PRO Mechanical Gaming Keyboard.jpg', '', 15, 3),
(289, 'Bàn phím Logitech G PRO KDA', 3269000, 'Bàn phím Logitech G PRO KDA.jpg', '', 15, 3),
(290, 'Bàn phím Logitech G Pro League Of Legends', 2490000, 'Bàn phím Logitech G Pro League Of Legends.jpg', '', 15, 3),
(291, 'Bàn phím Logitech G913 TKL Lightspeed Wireless', 4390000, 'Bàn phím Logitech G913 TKL Lightspeed Wireless.jpg', '', 15, 3),
(292, 'Bàn phím Logitech G813 RGB', 3190000, 'Bàn phím Logitech G813 RGB.jpg', '', 15, 3),
(293, 'Bàn phím Logitech Mechanical Gaming G413 SE', 1790000, 'Bàn phím Logitech Mechanical Gaming G413 SE.jpg', '', 15, 3),
(294, 'Bàn phím Razer Blackwidow V3 Tenkeyless', 2390000, 'Bàn phím Razer Blackwidow V3 Tenkeyless.jpg', '', 16, 3),
(295, 'Destiny 2 Razer Ornata Chroma', 2390000, 'Destiny 2 Razer Ornata Chroma.jpg', '', 16, 3),
(296, 'Bàn phím Razer Huntsman V2 Tenkeyless', 3990000, 'Bàn phím Razer Huntsman V2 Tenkeyless.jpg', '', 16, 3),
(297, 'Bàn phím Razer Cynosa V2 Chroma', 1590000, 'Bàn phím Razer Cynosa V2 Chroma.jpg', '', 16, 3),
(298, 'Bàn phím Razer BlackWidow V3 Mini HyperSpeed - Phantom Pudding Edition', 5290000, 'Bàn phím Razer BlackWidow V3 Mini HyperSpeed - Phantom Pudding Edition.jpg', '', 16, 3),
(299, 'Bàn phím Razer Blackwidow V3 Mini HyperSpeed', 4690000, 'Bàn phím Razer Blackwidow V3 Mini HyperSpeed.jpg', '', 16, 3),
(300, 'Bàn phím Razer Huntsman V2 Analog', 7490000, 'Bàn phím Razer Huntsman V2 Analog.jpg', '', 16, 3),
(301, 'Bàn phím Razer Blackwidow V3 Pro', 5499000, 'Bàn phím Razer Blackwidow V3 Pro.jpg', '', 16, 3),
(302, 'Bàn phím cơ IQUNIX ZX-75 Gravity Wave Wireless RGB', 5100000, 'Bàn phím cơ IQUNIX ZX-75 Gravity Wave Wireless RGB.jpg', '', 19, 3),
(303, 'Bàn Phím Cơ IQUNIX ZX-75 Gravity Wave Wireless RGB TTC Switch', 5250000, 'Bàn Phím Cơ IQUNIX ZX-75 Gravity Wave Wireless RGB TTC Switch.jpg', '', 19, 3),
(304, 'Bàn phím cơ IQUNIX F60 Jungle Mystery RGB', 3900000, 'Bàn phím cơ IQUNIX F60 Jungle Mystery RGB.jpg', '', 19, 3),
(305, 'Bàn phím cơ IQUNIX F60 Joker RGB', 3900000, 'Bàn phím cơ IQUNIX F60 Joker RGB.jpg', '', 19, 3),
(306, 'Bàn phím cơ IQUNIX F60 Strawberry RGB', 3900000, 'Bàn phím cơ IQUNIX F60 Strawberry RGB.jpg', '', 19, 3),
(307, 'Bàn phím cơ IQUNIX F60 Coral Sea RGB', 3900000, 'Bàn phím cơ IQUNIX F60 Coral Sea RGB.jpg', '', 19, 3),
(308, 'Bàn phím cơ IQUNIX M80 Tabby Wireless', 3150000, 'Bàn phím cơ IQUNIX M80 Tabby Wireless.jpg', '', 19, 3),
(309, 'Bàn phím cơ IQUNIX M80 Persian Wireless', 3150000, 'Bàn phím cơ IQUNIX M80 Persian Wireless.jpg', '', 19, 3),
(310, 'Tai nghe Logitech G333 có Mic và Màng loa kép', 890000, 'Tai nghe Logitech G333 có Mic và Màng loa kép.jpg', '', 15, 4),
(311, 'Tai nghe Logitech G435 Lightspeed Wireless Black', 1490000, 'Tai nghe Logitech G435 Lightspeed Wireless Black.jpg', '', 15, 4),
(312, 'Tai nghe Logitech G435 Lightspeed Wireless White', 1490000, 'Tai nghe Logitech G435 Lightspeed Wireless White.jpg', '', 15, 4),
(313, 'Tai nghe Logitech G435 Lightspeed Wireless Blue Raspberry', 1490000, 'Tai nghe Logitech G435 Lightspeed Wireless Blue Raspberry.jpg', '', 15, 4),
(314, 'Tai nghe Gaming Logitech G335 Black', 1290000, 'Tai nghe Gaming Logitech G335 Black.jpg', '', 15, 4),
(315, 'Tai nghe Gaming Logitech G335 White', 1290000, 'Tai nghe Gaming Logitech G335 White.jpg', '', 15, 4),
(316, 'Tai nghe Gaming Logitech G Pro Gen 2', 1690000, 'Tai nghe Gaming Logitech G Pro Gen 2.jpg', '', 15, 4),
(317, 'Tai nghe Logitech G733 LIGHTSPEED Wireless Black', 2990000, 'Tai nghe Logitech G733 LIGHTSPEED Wireless Black.jpg', '', 15, 4),
(318, 'Tai nghe HyperX Cloud Earbuds', 849000, 'Tai nghe HyperX Cloud Earbuds.jpg', '', 17, 4),
(319, 'Tai nghe HyperX Cloud II Pink', 2190000, 'Tai nghe HyperX Cloud II Pink.jpg', '', 17, 4),
(320, 'Tai nghe HyperX Cloud Core Wireless', 2590000, 'Tai nghe HyperX Cloud Core Wireless.jpg', '', 17, 4),
(321, 'Tai nghe HyperX Cloud Core 7.1', 1990000, 'Tai nghe HyperX Cloud Core 7.1.jpg', '', 17, 4),
(322, 'Tai nghe HyperX Cloud Alpha Wireless', 5119000, 'Tai nghe HyperX Cloud Alpha Wireless.jpg', '', 17, 4),
(323, 'HyperX Streamer Bundle', 2790000, 'HyperX Streamer Bundle.jpg', '', 17, 4),
(324, 'Tai nghe không dây HyperX Cloud Buds', 1490000, 'Tai nghe không dây HyperX Cloud Buds.jpg', '', 17, 4),
(325, 'Tai nghe HyperX Cloud II Wireless', 3690000, 'Tai nghe HyperX Cloud II Wireless.jpg', '', 17, 4),
(326, 'Tai nghe Razer Barracuda X', 1890000, 'Tai nghe Razer Barracuda X.jpg', '', 16, 4),
(327, 'Tai nghe Razer Hammerhead PRO V2', 790000, 'Tai nghe Razer Hammerhead PRO V2.jpg', '', 16, 4),
(328, 'Tai nghe Razer Kraken V3', 2450000, 'Tai nghe Razer Kraken V3.jpg', '', 16, 4),
(329, 'Tai nghe Razer Kraken X - Black', 1090000, 'Tai nghe Razer Kraken X - Black.jpg', '', 16, 4),
(330, 'Tai nghe Razer Opus X - Green', 2590000, 'Tai nghe Razer Opus X - Green.jpg', '', 16, 4),
(331, 'Tai nghe Razer Kaira for Xbox - Wireless', 2690000, 'Tai nghe Razer Kaira for Xbox - Wireless.jpg', '', 16, 4),
(332, 'Tai nghe Razer Opus X - Mercury', 2340000, 'Tai nghe Razer Opus X - Mercury.jpg', '', 16, 4),
(333, 'Tai nghe Razer Opus X - Quartz', 2340000, 'Tai nghe Razer Opus X - Quartz.jpg', '', 16, 4),
(334, 'Tai nghe Asus TUF Gaming H3', 790000, 'Tai nghe Asus TUF Gaming H3.jpg', '', 9, 4),
(335, 'Tai nghe Asus ROG Cetra II Core', 890000, 'Tai nghe Asus ROG Cetra II Core.jpg', '', 9, 4),
(336, 'Tai nghe Asus ROG Delta S EVA Edition', 5590000, 'Tai nghe Asus ROG Delta S EVA Edition.jpg', '', 9, 4),
(337, 'Tai nghe Asus ROG Delta S Animate', 5690000, 'Tai nghe Asus ROG Delta S Animate.jpg', '', 9, 4),
(338, 'Tai nghe Asus ROG Cetra True Wireless', 2090000, 'Tai nghe Asus ROG Cetra True Wireless.jpg', '', 9, 4),
(339, 'Tai nghe Asus ROG STRIX GO (USB-C)', 2190000, 'Tai nghe Asus ROG STRIX GO (USB-C).jpg', '', 9, 4),
(340, 'Tai nghe Asus TUF H3 Wireless', 2290000, 'Tai nghe Asus TUF H3 Wireless.jpg', '', 9, 4),
(341, 'Tai nghe Asus ROG Cetra II', 2290000, 'Tai nghe Asus ROG Cetra II.jpg', '', 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `style`
--

CREATE TABLE `style` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `style`
--

INSERT INTO `style` (`id`, `name`) VALUES
(4, 'Headphone'),
(3, 'Keyboard'),
(1, 'Laptop'),
(2, 'Mouse');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `numberp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`numberp`) VALUES
(400000),
(400000),
(400000),
(400000),
(659000),
(1049000),
(2890000),
(790000),
(690000),
(2490000),
(3090000),
(3090000),
(2290000),
(790000),
(2590000),
(1590000),
(590000),
(1350000),
(990000),
(1290000),
(1540000),
(1790000),
(2650000),
(1390000),
(1650000),
(1590000),
(1690000),
(1690000),
(1690000),
(2290000),
(2190000),
(2190000),
(330000),
(250000),
(690000),
(290000),
(390000),
(290000),
(400000),
(400000),
(400000),
(400000),
(659000),
(1049000),
(2890000),
(790000),
(690000),
(2490000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD UNIQUE KEY `customer_email` (`token`),
  ADD UNIQUE KEY `token` (`token`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `order_product_ibfk_2` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `manufacturer_id` (`manufacturer_id`),
  ADD KEY `style_id` (`style_id`);

--
-- Indexes for table `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=342;

--
-- AUTO_INCREMENT for table `style`
--
ALTER TABLE `style`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD CONSTRAINT `forgot_password_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`id`),
  ADD CONSTRAINT `style` FOREIGN KEY (`style_id`) REFERENCES `style` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
