-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2024 at 12:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agrofarm`
--

-- --------------------------------------------------------

--
-- Table structure for table `addform`
--

CREATE TABLE `addform` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `end_date` date NOT NULL,
  `photo` varchar(255) NOT NULL,
  `location_coords` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `farmer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addform`
--

INSERT INTO `addform` (`product_id`, `product_name`, `price`, `end_date`, `photo`, `location_coords`, `category`, `farmer_id`) VALUES
(3, 'Graps', 50, '2024-03-09', 'grapes.jpeg', '14.0038363,80.3565451', 'fruits', 305),
(4, 'tomato', 30, '2024-03-07', 'tomato.jpg', '14.0038363,80.3565451', 'vegetables', 305),
(5, 'tomato', 35, '2024-03-15', 'tomato.jpg', '13.0038363,80.3565875', 'vegetables', 310);

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `buyer_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobileno` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`buyer_id`, `username`, `email`, `password`, `mobileno`, `address`) VALUES
(501, 'custormer2', 'raj@gmail.com', '$2y$10$xmgTdxnztyCOPav3.zhiV.Fwv6SmDNiZLzFrcLQ.IEK4YX0yDdz3G', '8954762158', 'solapur'),
(502, 'custormer3', 'customer3@gmail.com', '$2y$10$lKSdGge8Dv1x4OVRRd2shuT85w2/w/vHEx6YprKZrB4oWs6wFGNlG', '6594658966', 'line1'),
(503, 'custormer4', 'customer4@gmail.com', '$2y$10$c000ll.ouYEwkCyCR/VAOe1..ndZaQTNLikyY/HxcriJk0.GcPkpK', '6594658966', 'line2'),
(504, 'custormer5', 'customer5@gmail.com', '$2y$10$oiLFlghnP5Ivfbvnm.Y.SerXyttmCrMYpOvyN/kxu8c0u7bMHDB1S', '6594658966', 'line5'),
(505, 'custormer6', 'customer6@gmail.com', '$2y$10$CgGQ2V9ck0PFFECmVZSMoOoL/b.hJkoxIBKziEsj/yy.al7daF46.', '6666666666', 'line6');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `buyer_id`, `product_id`, `quantity`) VALUES
(912, 504, 5, 3),
(921, 504, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `farmer_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobileno` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`farmer_id`, `username`, `email`, `password`, `mobileno`, `address`) VALUES
(305, 'farmer1', 'rajchopade@gmail.com', '$2y$10$vTYc2FLdolEtVtr7bU6Fruqm2Oc5LBqNLKN1HJtlvlKe5rzMsdf6O', '6535342353', 'Solapur'),
(306, 'Avdhut', 'avdhut@gmail.com', '$2y$10$6uvU1tCcVBm533R6zB8kzu8H5xU8TBJYC43dEEZIRtBGLSxMXPwEG', '8957230164', 'Aran'),
(307, 'Sagar', 'sagar@gmail.com', '$2y$10$oK.Wo8eBKju1DBWCDRg7gusJKRifMsIkWzAuNttyArLQMIvOC.p.u', '6535342353', 'Aran'),
(308, 'Gaurav', 'gaurav123@gmail.com', '$2y$10$ZwGAEk7X/qBUhARFJuhB1.BTbK4VHh.yFAdgBghO4LNwrdiVNIQny', '6050915236', 'Moshi'),
(309, 'Sudesh', 'sudesh123@gmail.com', '$2y$10$XBcid4C.yoavvewp65t6qer2RSEWtSmTsKX.WyhVTwxtLlZsficPC', '6050915236', 'yavatmal'),
(310, 'Shivam', 'Shivam@gmail.com', '$2y$10$xIT1H0B7VxDLzixJYPb7m.msWxLe.LW3OZZInJmc/SIGNnT1sRy8O', '1234567890', 'amravati'),
(311, 'farmer3', 'farmer3@gmail.com', '$2y$10$goFUYWVELZyCMf75CPsUQev.IurWvOkxY536on7qK0u7rawK4oX0S', '1234567890', 'dfs');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `likes_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `likedata` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`likes_id`, `buyer_id`, `product_id`, `likedata`) VALUES
(1222, 504, 4, 1),
(1223, 504, 3, 1),
(1235, 505, 3, 1),
(1239, 505, 5, 1),
(1240, 505, 4, 1),
(1242, 504, 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addform`
--
ALTER TABLE `addform`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_farmer_id` (`farmer_id`) USING BTREE;

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`buyer_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `fk_buyer_id` (`buyer_id`),
  ADD KEY `fk_product_id` (`product_id`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`farmer_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`likes_id`),
  ADD KEY `fk_buyer_id` (`buyer_id`),
  ADD KEY `fk_product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addform`
--
ALTER TABLE `addform`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `buyer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=506;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=922;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `farmer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=312;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `likes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1243;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addform`
--
ALTER TABLE `addform`
  ADD CONSTRAINT `fk_farmer_id` FOREIGN KEY (`farmer_id`) REFERENCES `farmer` (`farmer_id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `fk_buyer_id` FOREIGN KEY (`buyer_id`) REFERENCES `buyer` (`buyer_id`),
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `addform` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
