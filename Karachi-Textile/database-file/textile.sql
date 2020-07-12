-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2020 at 08:43 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `textile`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) NOT NULL,
  `PRODUCTNAME` mediumtext NOT NULL,
  `PRODUCTPRICE` mediumtext NOT NULL,
  `PRODUCTIMAGE` mediumtext NOT NULL,
  `QTY` mediumtext NOT NULL,
  `TOTALPRICE` int(11) NOT NULL,
  `PRODUCTCODE` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ID`, `PRODUCTNAME`, `PRODUCTPRICE`, `PRODUCTIMAGE`, `QTY`, `TOTALPRICE`, `PRODUCTCODE`) VALUES
(63, 'WGB-MOT20-0046 CL-663 B', '4553', '17763646021594158900.jpg', '255', 1161015, '16');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `MESSAGEID` int(11) NOT NULL,
  `NAME` varchar(10000) NOT NULL,
  `EMAIL` mediumtext NOT NULL,
  `MESSAGE` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`MESSAGEID`, `NAME`, `EMAIL`, `MESSAGE`) VALUES
(1, 'hamza', 'hamza@gmail.com', 'sd');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `EMAIL` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`EMAIL`, `PASSWORD`) VALUES
('talhamushtaq565@gmail.com', '12345'),
('admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `ORDER_ID` int(200) NOT NULL,
  `CUSTOMER_NAME` mediumtext NOT NULL,
  `SHIPPING_ADDRESS` mediumtext NOT NULL,
  `COUNTRY` mediumtext NOT NULL,
  `PRODUCTS` mediumtext NOT NULL,
  `TOTAL_BILL` mediumtext NOT NULL,
  `CARD_NO` varchar(10000) NOT NULL,
  `VALIDITY` varchar(10000) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `CARD_CODE` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`ORDER_ID`, `CUSTOMER_NAME`, `SHIPPING_ADDRESS`, `COUNTRY`, `PRODUCTS`, `TOTAL_BILL`, `CARD_NO`, `VALIDITY`, `CARD_CODE`) VALUES
(11, 'hamza', 'sheikhupura road sitara valley phase 2 ', 'Pakistan', 'Lawn Shirt GLS-19-113 DP(1)', '1,330.00', '46872367346643', '01-2020', '0421'),
(12, 'Ali Jabbar', 'Samnabad nisar colony faisalabad', 'Pakistan', 'WGB-MOT20-0046 CL-663 B(255)', '296,058,825.00', '33100-4675882-1', '01-2020', '0421');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `PRODUCTID` int(11) NOT NULL,
  `PRODUCTTITLE` mediumtext NOT NULL,
  `PRODUCTCATEGORY` varchar(256) NOT NULL,
  `PRODUCTIMAGE` varchar(1000) NOT NULL,
  `PRODUCTDETAIL` longtext NOT NULL,
  `PRODUCT_PRICE` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PRODUCTID`, `PRODUCTTITLE`, `PRODUCTCATEGORY`, `PRODUCTIMAGE`, `PRODUCTDETAIL`, `PRODUCT_PRICE`) VALUES
(15, 'Lily T-200 Quilt Cover Set', 'Bedsheets', '1321955661594209534.jpg', 'DETAILS\r\nQuilt Cover Set:\r\n\r\nPackage Includes:\r\n\r\nSingle\r\n\r\n1 Quilt Cover\r\n1 Pillowcase\r\nDouble & King:\r\n\r\n1 Quilt Cover\r\n2 Pillowcases\r\nSize:\r\n\r\nSingle: 152x240 cm\r\nDouble: 230x240 cm\r\nKing: 265x240 cm', '6777'),
(16, 'WGB-MOT20-0046 CL-663 B', 'Unstictched', '17763646021594158900.jpg', '\r\nPrinted Dupatta. Printed Shirt. Dyed Trouser.', '4553'),
(17, '3PC Unstitched Festive Embroidered Suit', 'Festival Collection', '15029452121594158923.jpg', 'Embroidered Organza Dupatta with Zari ', '2000'),
(18, 'Lawn Shirt GLS-19-113 DP', 'Ladies', '6428993321594209449.jpg', 'Multi-colored, printed, boat neck, lawn shirt with organza details and hand work', '1330');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`MESSAGEID`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`ORDER_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PRODUCTID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `MESSAGEID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `ORDER_ID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `PRODUCTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
