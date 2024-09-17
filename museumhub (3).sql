-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2024 at 06:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `museumhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminsID` varchar(6) NOT NULL,
  `adminsName` varchar(50) DEFAULT NULL,
  `adminsPass` varchar(15) NOT NULL,
  `adminsPhone` varchar(12) DEFAULT NULL,
  `adminsIC` varchar(12) DEFAULT NULL,
  `museumID` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminsID`, `adminsName`, `adminsPass`, `adminsPhone`, `adminsIC`, `museumID`) VALUES
('adm02', 'edil', 'edil', '131', '231', NULL),
('adm1', 'Ameen', '123', '01112424683', '040722100958', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cuba`
--

CREATE TABLE `cuba` (
  `userName` varchar(30) NOT NULL,
  `userPass` varchar(15) NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `userPhone` varchar(15) NOT NULL,
  `userIC` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cuba`
--

INSERT INTO `cuba` (`userName`, `userPass`, `userEmail`, `userPhone`, `userIC`) VALUES
('test', 'test', 'test@test', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `cuba2`
--

CREATE TABLE `cuba2` (
  `userID` int(6) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userPass` varchar(12) NOT NULL,
  `userIC` varchar(15) NOT NULL,
  `userPhone` varchar(15) NOT NULL,
  `userEmail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cuba2`
--

INSERT INTO `cuba2` (`userID`, `userName`, `userPass`, `userIC`, `userPhone`, `userEmail`) VALUES
(1000, 'testos123', '123', '12', '121', 'test3@test'),
(1002, 'test5', '123', '123', '123', 'test5@test'),
(1003, 'demiw', '123', '123', '123123', 'user@user'),
(1004, 'Ameen', '123', '040323010331', '123', 'ameenakeef2394@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventID` varchar(6) NOT NULL,
  `eventName` varchar(50) DEFAULT NULL,
  `eventPNG` varchar(60) NOT NULL,
  `eventDetail` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventID`, `eventName`, `eventPNG`, `eventDetail`) VALUES
('evn1', 'Pineapple Harvest Festival', 'imagesEvent/2024-06-29073842PM.jpg', ' Join the Pineapple Harvest Festival to celebrate Johor\'s thriving pineapple industry. This event includes workshops on pineapple cultivation and processing, as well as tasting sessions of different pineapple varieties. Enjoy cooking demonstrations featuring pineapple-based dishes and participate in contests for the best pineapple recipes.'),
('evntH1', 'Tanjung Balau Maritime Heritage Festival', 'imagesEvent/2024-06-29070824PM.jpg', 'Dive into the maritime culture of Tanjung Balau with a day full of activities celebrating the life of local fishermen. Participate in hands-on workshops where you can learn traditional net making, knot tying, and various fishing techniques. Listen to seasoned fishermen share captivating tales of the sea. Enjoy a seafood cooking demonstration featuring local recipes, followed by tastings of fresh seafood.'),
('evntH2', 'International Kite Festival', 'imagesEvent/2024-06-29071449PM.jpeg', 'Experience the beauty of kite flying at the International Kite Festival. The event showcases a stunning array of traditional and modern kites from around the world. Participate in kite-making workshops and watch expert demonstrations of intricate kite designs.'),
('evntH3', 'Pineapple Harvest Festival', 'imagesEvent/2024-06-29071600PM.jpg', 'Join the Pineapple Harvest Festival to celebrate Johor\'s thriving pineapple industry. This event includes workshops on pineapple cultivation and processing, as well as tasting sessions of different pineapple varieties. Enjoy cooking demonstrations featuring pineapple-based dishes and participate in contests for the best pineapple recipes.');

-- --------------------------------------------------------

--
-- Table structure for table `inventorys`
--

CREATE TABLE `inventorys` (
  `invID` varchar(6) NOT NULL,
  `invName` varchar(50) DEFAULT NULL,
  `invPNG` varchar(60) DEFAULT NULL,
  `invDetail` varchar(200) DEFAULT NULL,
  `invLocation` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventorys`
--

INSERT INTO `inventorys` (`invID`, `invName`, `invPNG`, `invDetail`, `invLocation`) VALUES
('', 'sa', 'images/cuba.jpg', 'sa', 'sa'),
('234', 'sas', 'images/biskut.jpg', 'sas', 'asa');

-- --------------------------------------------------------

--
-- Table structure for table `inventorys2`
--

CREATE TABLE `inventorys2` (
  `invID` int(6) NOT NULL,
  `invName` varchar(50) NOT NULL,
  `invPNG` varchar(50) NOT NULL,
  `invDetail` varchar(200) NOT NULL,
  `invLocation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventorys2`
--

INSERT INTO `inventorys2` (`invID`, `invName`, `invPNG`, `invDetail`, `invLocation`) VALUES
(103, 'Inven1', 'images/download (2).jpeg', 'The first items that shock the culture', 'Museum Nanas');

-- --------------------------------------------------------

--
-- Table structure for table `museums`
--

CREATE TABLE `museums` (
  `museumID` varchar(6) NOT NULL,
  `museumName` varchar(50) DEFAULT NULL,
  `museumLocation` varchar(200) DEFAULT NULL,
  `museumDetail` varchar(200) DEFAULT NULL,
  `eventID` varchar(6) DEFAULT NULL,
  `adminsID` varchar(6) DEFAULT NULL,
  `invID` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `museums`
--

INSERT INTO `museums` (`museumID`, `museumName`, `museumLocation`, `museumDetail`, `eventID`, `adminsID`, `invID`) VALUES
('musH1', 'Cina Heritage Museum Johor Bahru', 'MY Johor, 42, Jalan Ibrahim, 80000 Johor Bahru', 'The Chinese Heritage Museum in Johor Bahru is a fascinating destination that provides insight into the rich history and culture of the Chinese community in the region.', NULL, 'adm02', NULL),
('musH2', 'Mini Kuso Trick Art Gallery', 'Kuso Trick Art Gallery Location Address: 83-02, Jalan Mutiar', 'he Mini Kuso Trick Art Gallery is a unique and entertaining attraction in Johor Bahru, Malaysia. It offers a playful and interactive experience for visitors of all ages.', NULL, 'adm02', 103),
('musH3', 'Kota Johor Lama Muzium', 'Muzium Kota Johor Lama, Lot 1468, Kampung Johor Lama, 81940 ', 'The Kota Johor Lama Museum is an important historical site located in Johor, Malaysia. It offers insights into the rich history of the Johor Sultanate and the strategic significance of the area during', NULL, 'adm02', NULL),
('musH4', 'Muzium Nenas', 'Jalan Pontian, Pekan Nanas, Johor, 81500, Pekan Nenas, Johor, 81500\r\n', 'The Muzium Nenas, or Pineapple Museum, in Johor is a unique attraction dedicated to the history and cultivation of pineapples, a significant agricultural product in the region.\r\nThe museum features ex', NULL, 'adm1', NULL),
('musH5', 'Muzium Layang-Layang', 'Komplek Pusat Bandar, Pasir Gudang, 81700, Pasir Gudang, Johor, 81700', 'The Muzium Layang-Layang, also known as the Kite Museum, is a fascinating attraction in Johor that celebrates the art and history of kite flying, an important cultural activity in Malaysia.\r\nThe museu', NULL, 'adm02', NULL),
('musH6', 'Muzium Warisan Tiong-Hua', 'Johor Bahru Chinese Heritage Museum, MY Johor, 42, Jalan Ibrahim, 80000 Johor Bahru', 'The Muzium Warisan Tiong-Hua, or the Chinese Heritage Museum, is an important cultural institution in Johor Bahru that focuses on preserving and showcasing the heritage of the Chinese community in Joh', NULL, 'adm1', NULL),
('musH7', 'Muzium di Raja Abu Bakar', 'The Royal Abu Bakar Museum, Istana Besar Johor, 80500 Johor Bahru, Johor.', 'The Muzium di Raja Abu Bakar, also known as the Royal Abu Bakar Museum, is an iconic museum located in Johor Bahru, Malaysia.\r\nThe museum houses a rich collection of artifacts, royal regalia, and memo', NULL, 'adm02', NULL),
('mush8', 'Muzium Kota Tinggi', 'Kampung Makam, 81900 Kota Tinggi, Johor', 'The Muzium Kota Tinggi, or Kota Tinggi Museum, is a historical museum located in Kota Tinggi, Johor, Malaysia\r\nThe museum houses a collection of artifacts that trace the history of Kota Tinggi, includ', NULL, 'adm1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `userID` int(6) NOT NULL,
  `museumID` varchar(6) NOT NULL,
  `recDate` varchar(30) DEFAULT NULL,
  `recQuantity` int(11) DEFAULT NULL,
  `recPrice` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`userID`, `museumID`, `recDate`, `recQuantity`, `recPrice`) VALUES
(1003, 'musH4', '2024-06-04T05:35', 4, 20.00),
(1003, 'musH3', '2024-06-06T05:43', 2, 10.00),
(1003, 'musH2', '2024-06-04T05:46', 2, 10.00),
(1003, 'musH2', '2024-06-04T05:47', 3, 15.00),
(1003, 'musH2', '2024-05-28T05:52', 4, 20.00),
(1003, 'musH3', '2024-06-03T05:52', 3, 15.00),
(1003, 'musH3', '2024-06-02T05:55', 4, 20.00),
(1003, 'musH4', '2024-06-06T05:55', 10, 50.00),
(1003, 'musH4', '2024-06-02T05:57', 2, 10.00),
(1002, 'mush8', '2024-06-07T06:04', 7, 35.00),
(1002, 'musH3', '2024-05-29T06:07', 3, 15.00),
(1002, 'musH5', '2024-06-05T06:12', 4, 20.00),
(1002, 'musH5', '2024-05-28T06:27', 2, 10.00),
(1002, 'musH3', '2024-05-27T06:28', 3, 15.00),
(1002, 'musH5', '2024-06-05T06:28', 2, 10.00),
(1002, 'musH5', '2024-05-28T06:30', 2, 10.00),
(1003, 'musH5', '2024-06-12T06:34', 3, 15.00),
(1003, 'musH7', '2024-06-05T06:35', 2, 10.00),
(1003, 'musH4', '2024-06-11T06:35', 1, 5.00),
(1003, 'musH4', '2024-05-29T06:36', 1, 5.00),
(1003, 'musH6', '2024-06-03T06:37', 3, 15.00),
(1003, 'musH4', '2024-06-04T06:37', 3, 15.00),
(1003, 'musH3', '2024-06-04T07:10', 5, 25.00),
(1003, 'musH2', '2024-06-07T09:20', 4, 20.00),
(1003, 'musH3', '2024-06-04T09:37', 2, 10.00),
(1003, 'musH2', '2024-05-29T09:38', 1, 5.00),
(1004, 'musH2', '2024-06-04T10:39', 1, 5.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` varchar(6) NOT NULL,
  `userName` varchar(50) DEFAULT NULL,
  `userEmail` varchar(50) DEFAULT NULL,
  `userPhone` varchar(12) DEFAULT NULL,
  `userIC` varchar(12) DEFAULT NULL,
  `userPass` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `userEmail`, `userPhone`, `userIC`, `userPass`) VALUES
('', 'test2', 'teset@2', '111', '0101', '$2y$10$ETYGgaAAtd5F/AoaofyaRO7'),
('ajam12', 'ajem', 'ajem@yuha.com', '12345678902', '04071078902', 'ajem'),
('null', 'ajam', 'ajam@ajam', '0123', '0707', 'ajam'),
('test12', 'test123', 'test@test', '0123', '0001', '123'),
('us1234', 'ameen', 'ameen@yuha.com', '12345678901', '04071078901', 'ameen123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminsID`),
  ADD KEY `museumID` (`museumID`);

--
-- Indexes for table `cuba2`
--
ALTER TABLE `cuba2`
  ADD PRIMARY KEY (`userID`) USING BTREE;

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `inventorys`
--
ALTER TABLE `inventorys`
  ADD PRIMARY KEY (`invID`);

--
-- Indexes for table `inventorys2`
--
ALTER TABLE `inventorys2`
  ADD PRIMARY KEY (`invID`);

--
-- Indexes for table `museums`
--
ALTER TABLE `museums`
  ADD PRIMARY KEY (`museumID`),
  ADD KEY `eventID` (`eventID`),
  ADD KEY `adminsID` (`adminsID`),
  ADD KEY `fk_invID` (`invID`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD KEY `userID` (`userID`),
  ADD KEY `museumID` (`museumID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuba2`
--
ALTER TABLE `cuba2`
  MODIFY `userID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;

--
-- AUTO_INCREMENT for table `inventorys2`
--
ALTER TABLE `inventorys2`
  MODIFY `invID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `museumID` FOREIGN KEY (`museumID`) REFERENCES `museums` (`museumID`);

--
-- Constraints for table `museums`
--
ALTER TABLE `museums`
  ADD CONSTRAINT `adminsID` FOREIGN KEY (`adminsID`) REFERENCES `admins` (`adminsID`),
  ADD CONSTRAINT `eventID` FOREIGN KEY (`eventID`) REFERENCES `events` (`eventID`),
  ADD CONSTRAINT `fk_invID` FOREIGN KEY (`invID`) REFERENCES `inventorys2` (`invID`);

--
-- Constraints for table `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `records_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `cuba2` (`userID`),
  ADD CONSTRAINT `records_ibfk_2` FOREIGN KEY (`museumID`) REFERENCES `museums` (`museumID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
