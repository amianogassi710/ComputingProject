-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2017 at 07:30 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(6) NOT NULL,
  `customerID` int(4) NOT NULL,
  `itemID` int(4) NOT NULL,
  `quantity` int(3) NOT NULL,
  `dateAdded` date NOT NULL,
  `timeAdded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartID`, `customerID`, `itemID`, `quantity`, `dateAdded`, `timeAdded`) VALUES
(1, 18, 1, 1, '2017-06-15', '2017-06-15 16:35:09'),
(2, 18, 2, 2, '2017-06-15', '2017-06-15 16:35:13'),
(3, 18, 3, 2, '2017-06-15', '2017-06-15 16:35:17'),
(4, 18, 4, 1, '2017-06-15', '2017-06-15 16:38:50'),
(5, 19, 1, 2, '2017-06-15', '2017-06-15 22:40:39'),
(6, 19, 2, 3, '2017-06-15', '2017-06-15 22:40:44'),
(7, 19, 3, 4, '2017-06-15', '2017-06-15 22:40:48');

--
-- Triggers `cart`
--
DELIMITER $$
CREATE TRIGGER `deleteTrigger` AFTER DELETE ON `cart` FOR EACH ROW BEGIN
set @cartID=(SELECT orderID FROM orders where orderID NOT IN (SELECT cartID from cart));

    DELETE FROM orders WHERE orderID =@cartID;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `orderTrigger` AFTER INSERT ON `cart` FOR EACH ROW BEGIN
set @customerID=(select customerID from cart where cartID IN (select max(cartID) from cart));
set @itemID=(select itemID from cart where cartID IN (select max(cartID) from cart));
set @itemName=(select itemName from item where itemID=@itemID);
set @quantity=(select quantity from cart where cartID IN (select max(cartID) from cart));
set @itemPrice=(select itemPrice from item where itemID=@itemID);
set @dateAdded=(select dateAdded from cart where cartID IN (select max(cartID) from cart) );
set @timeAdded=(select timeAdded from cart where cartID IN (select max(cartID) from cart) );	

    insert into orders(customerID,itemID, itemName, quantity, itemPrice, dateAdded, timeAdded) values (@customerID,@itemID,@itemName, @quantity, @itemPrice, @dateAdded, @timeAdded);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateTrigger` AFTER UPDATE ON `cart` FOR EACH ROW BEGIN
set @cartID=(SELECT cartID FROM cart ORDER BY timeAdded DESC LIMIT 1);
set @quantity=(SELECT quantity FROM cart where cartID=@cartID);
set @dateAdded=(select dateAdded from cart where cartID = @cartID);
set @timeAdded=(select timeAdded from cart where cartID =@cartID);
    update orders set quantity = @quantity, dateAdded=@dateAdded, timeAdded=@timeAdded where orderID=@cartID;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(4) NOT NULL,
  `categoryName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`) VALUES
(1, 'Breakfast'),
(2, 'Snacks'),
(3, 'Soup'),
(4, 'Momo'),
(5, 'Chowmein'),
(6, 'Pizza'),
(7, 'Newari Khaja'),
(8, 'Beverages'),
(9, 'Alcoholic Beverages'),
(10, 'Sandwich');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(4) NOT NULL,
  `customerFirstName` varchar(30) NOT NULL,
  `customerLastName` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `mobileNumber` varchar(10) NOT NULL,
  `district` enum('Kathmandu','Bhaktapur','Lalitpur','') NOT NULL,
  `street` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `customerFirstName`, `customerLastName`, `email`, `username`, `password`, `mobileNumber`, `district`, `street`) VALUES
(1, 'Sarance', 'Shrestha', 'stha.sarans100@gmail.com', 'sarance', 'sarance', '9842578927', 'Kathmandu', 'Baneswor'),
(18, 'Lionel', 'Messi', 'lionel@gmail.com', 'lionelmessi', 'lionelmessi', '9842152436', 'Kathmandu', 'Argentina'),
(19, 'cristiano', 'ronaldo', 'cr7@gmail.com', 'cristiano', 'cristiano', '9842517858', 'Bhaktapur', 'Bansagoapl');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemID` int(4) NOT NULL,
  `itemName` varchar(25) NOT NULL,
  `itemPrice` int(4) NOT NULL,
  `itemDescription` varchar(100) NOT NULL,
  `itemStatus` enum('Available','Not Available','','') NOT NULL,
  `itemImage` varchar(255) NOT NULL,
  `categoryID` varchar(4) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemID`, `itemName`, `itemPrice`, `itemDescription`, `itemStatus`, `itemImage`, `categoryID`, `date`) VALUES
(1, 'Egg, Sausage and Toast', 270, '2 Eggs, Sausage and Toast with Butter/Jam', 'Available', '', '1', '2017-05-17'),
(2, 'Corn flakes with Toast/Eg', 270, 'Corn flakes, 2 Eggs and Toast with Butter/Jam', 'Available', '', '1', '2017-05-17'),
(3, 'Omelette', 150, 'Omelette with cheese, tomato and onion', 'Available', '', '1', '2017-05-17'),
(4, 'Chicken Chili', 280, 'Chicken Chili', 'Available', '', '2', '2017-05-17'),
(5, 'Chicken Chili Boneless', 310, 'Chicken Chili Boneless with ketchup', 'Available', '', '2', '2017-05-17'),
(6, 'Chicken Meat Ball', 250, 'Chicken Meat Ball with ketchup', 'Available', '', '2', '2017-05-17'),
(7, 'Chicken Wings', 225, 'Chicken Wings with ketchup', 'Available', '', '2', '2017-05-17'),
(8, 'Buff Chili', 225, 'Buff Chili with ketchup', 'Available', '', '2', '2017-05-17'),
(9, 'Fried Fish', 315, 'Fried Fish with ketchup', 'Available', '', '2', '2017-05-17'),
(10, 'Chicken Soup', 220, 'Chicken Soup', 'Available', '', '3', '2017-05-17'),
(11, 'Mushroom Soup', 170, 'Mushroom Soup', 'Available', '', '3', '2017-05-17'),
(12, 'Vegetable Soup', 120, 'Vegetable Soup', 'Available', '', '3', '2017-05-17'),
(13, 'Chicken Thukpa', 180, 'Chicken Thukpa', 'Available', '', '3', '2017-05-17'),
(14, 'Vegetable Thukpa', 150, 'Vegetable Thukpa', 'Available', '', '3', '2017-05-17'),
(15, 'Buff Momo Steam', 150, 'Buff Momo Steam', 'Available', '', '4', '2017-05-17'),
(16, 'Buff Momo Fried', 200, 'Buff Momo Fried', 'Available', '', '4', '2017-05-17'),
(17, 'Buff Momo C', 200, 'Buff Momo C', 'Available', '', '4', '2017-05-17'),
(18, 'Vegetable Momo Steam', 120, 'Vegetable Momo Steam', 'Available', '', '4', '2017-05-17'),
(19, 'Vegetable Momo Fried', 170, 'Vegetable Momo Fried', 'Available', '', '4', '2017-05-17'),
(20, 'Vegetable Momo C', 170, 'Vegetable Momo C', 'Available', '', '4', '2017-05-17'),
(21, 'Chicken Momo Steam', 170, 'Chicken Momo Steam', 'Available', '', '4', '2017-05-17'),
(22, 'Chicken Momo Fried', 220, 'Chicken Momo Fried', 'Available', '', '4', '2017-05-17'),
(23, 'Chicken Momo C', 220, 'Chicken Momo C', 'Available', '', '4', '2017-05-17'),
(24, 'Buff Chowmein', 150, 'Buff Chowmein with ketchup', 'Available', '', '5', '2017-05-17'),
(25, 'Vegetable Chowmein', 125, 'Vegetable Chowmein with ketchup', 'Available', '', '5', '2017-05-17'),
(26, 'Chicken Pizza', 295, 'Medium size Chicken Pizza', 'Available', '', '6 ', '2017-06-03'),
(27, 'Chicken Pizza', 425, 'Large size chicken pizza', 'Available', '', '6 ', '2017-06-03'),
(28, 'Mixed Pizza', 325, 'Medium size Mixed Pizza', 'Available', '', '6', '2017-06-04'),
(29, 'Mixed Pizza', 440, 'Large size Mixed Pizza', 'Available', '1-1-2.jpg', '6', '2017-06-04'),
(30, 'Sausage Pizza', 295, 'Medium size Sausage Pizza', 'Available', 'masala_buttermilk.jpg', '6', '2017-06-04'),
(31, 'Sausage Pizza', 430, 'Large size Sausage Pizza', 'Available', '', '6', '2017-06-10'),
(32, 'Mushroom Pizza', 295, 'Medium size Mushroom Pizza', 'Available', '18485353_1336851956399110_5296994407749846084_n.jpg', '6', '2017-06-13'),
(33, 'Mushroom Pizza', 425, 'Large size Mushroom Pizza', 'Available', 'top.JPG', '6', '2017-06-14'),
(34, 'Kukhura ko Choela', 280, 'Khukurako ko Choela', 'Available', 'masala_buttermilk.jpg', '7', '2017-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(6) NOT NULL,
  `customerID` int(4) NOT NULL,
  `itemID` int(4) NOT NULL,
  `itemName` varchar(25) NOT NULL,
  `quantity` int(3) NOT NULL,
  `itemPrice` int(4) NOT NULL,
  `totalAmount` int(6) AS (`quantity`*`itemPrice`) VIRTUAL,
  `dateAdded` date NOT NULL,
  `timeAdded` datetime NOT NULL,
  `deliveryStatus` enum('Yes','No','','') NOT NULL DEFAULT 'No',
  `paymentStatus` enum('Yes','No','','') NOT NULL DEFAULT 'No',
  `statusUpdatedTime` datetime NOT NULL,
  `confirmUserOrder` enum('No','Yes') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `customerID`, `itemID`, `itemName`, `quantity`, `itemPrice`, `totalAmount`, `dateAdded`, `timeAdded`, `deliveryStatus`, `paymentStatus`, `statusUpdatedTime`, `confirmUserOrder`) VALUES
(3, 18, 3, 'Omelette', 2, 150, 300, '2017-06-15', '2017-06-15 16:35:17', 'No', 'No', '0000-00-00 00:00:00', 'Yes'),
(4, 18, 4, 'Chicken Chili', 1, 280, 280, '2017-06-15', '2017-06-15 16:38:50', 'No', 'No', '0000-00-00 00:00:00', 'Yes'),
(5, 19, 1, 'Egg, Sausage and Toast', 2, 270, 540, '2017-06-15', '2017-06-15 22:40:39', 'No', 'No', '0000-00-00 00:00:00', 'Yes'),
(6, 19, 2, 'Corn flakes with Toast/Eg', 3, 270, 810, '2017-06-15', '2017-06-15 22:40:44', 'No', 'No', '0000-00-00 00:00:00', 'Yes');

--
-- Triggers `orders`
--
DELIMITER $$
CREATE TRIGGER `orderHistoryTrigger` AFTER UPDATE ON `orders` FOR EACH ROW BEGIN
set @orderID=(select  orderID from orders ORDER BY statusUpdatedTime DESC LIMIT 1);
set @customerID=(select customerID from orders where orderID=@orderID);
set @itemID=(select itemID from orders where orderID=@orderID);
set @itemName=(select itemName from item where itemID=@itemID);
set @quantity=(select quantity from orders where orderID=@orderID);
set @itemPrice=(select itemPrice from item where itemID=@itemID);
set @totalAmount=(select totalAmount from orders where orderID=@orderID);
set @timeAdded=(select statusUpdatedTime from orders where orderID=@orderID);
set @deliveryStatus=(select deliveryStatus from orders where orderID=@orderID);
set @paymentStatus=(select paymentStatus from orders where orderID=@orderID);

IF (@deliveryStatus='Yes')
THEN 
	if (@paymentStatus='Yes')
    THEN
		insert into ordershistory(orderID,customerID,itemID,itemName,quantity,itemPrice,totalAmount,timeAdded) values (@orderID,@customerID,@itemID,@itemName,@quantity,@itemPrice,@totalAmount,@timeAdded);
     end if;

END IF; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ordershistory`
--

CREATE TABLE `ordershistory` (
  `ordersHistoryID` int(5) NOT NULL,
  `orderID` int(6) NOT NULL,
  `customerID` int(4) NOT NULL,
  `itemID` int(4) NOT NULL,
  `itemName` varchar(25) NOT NULL,
  `quantity` int(3) NOT NULL,
  `itemPrice` int(4) NOT NULL,
  `totalAmount` int(6) NOT NULL,
  `timeAdded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordershistory`
--

INSERT INTO `ordershistory` (`ordersHistoryID`, `orderID`, `customerID`, `itemID`, `itemName`, `quantity`, `itemPrice`, `totalAmount`, `timeAdded`) VALUES
(7, 2, 18, 2, 'Corn flakes with Toast/Eg', 2, 270, 540, '2017-06-15 22:41:59'),
(8, 7, 19, 3, 'Omelette', 4, 150, 600, '2017-06-15 22:42:40');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(4) NOT NULL,
  `customerID` int(4) NOT NULL,
  `orderID` int(6) NOT NULL,
  `paymentAmount` int(5) NOT NULL,
  `paymentDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `ordershistory`
--
ALTER TABLE `ordershistory`
  ADD PRIMARY KEY (`ordersHistoryID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ordershistory`
--
ALTER TABLE `ordershistory`
  MODIFY `ordersHistoryID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(4) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
