-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2025 at 08:34 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `Name`) VALUES
(16, 'Chococlate'),
(10, 'Coffee'),
(14, 'Frappe'),
(13, 'Matcha'),
(11, 'Milk'),
(15, 'Phin'),
(12, 'Tea');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `EmpID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Role` varchar(50) NOT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `HireDate` date DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EmpID`, `Name`, `Role`, `Phone`, `HireDate`, `UserID`) VALUES
(79, 'Boun Hongly', 'Cashier', '0965429290', '2025-12-01', 15),
(80, 'Nano Can ', 'Waiter', '0987654321', '2025-12-01', 15),
(81, 'Sok Thida', 'Cashier', '012345678', '2025-12-02', 15);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `InventoryID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` decimal(10,3) NOT NULL,
  `ReorderLevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`InventoryID`, `ProductID`, `Quantity`, `ReorderLevel`) VALUES
(9, 20, '34.000', 15),
(10, 21, '9.000', 15),
(11, 22, '31.000', 15),
(12, 23, '17.000', 15),
(13, 24, '32.000', 10),
(14, 25, '0.000', 12),
(15, 26, '40.000', 15),
(16, 27, '39.000', 20),
(17, 28, '14.000', 15),
(19, 30, '39.000', 15),
(20, 31, '38.000', 5),
(21, 32, '40.000', 5),
(22, 33, '39.000', 5),
(23, 34, '39.000', 5),
(24, 35, '40.000', 5),
(25, 36, '40.000', 5),
(26, 37, '40.000', 5),
(27, 38, '40.000', 5),
(28, 39, '39.000', 5),
(29, 40, '40.000', 5),
(30, 41, '20.000', 5),
(31, 42, '40.000', 5),
(32, 43, '40.000', 5),
(33, 44, '39.000', 5),
(34, 45, '40.000', 5),
(35, 46, '40.000', 5),
(36, 47, '39.000', 5),
(37, 48, '40.000', 5),
(38, 49, '34.000', 5),
(39, 50, '29.000', 5),
(40, 51, '41.000', 5),
(41, 52, '20.000', 5),
(42, 53, '30.000', 5),
(43, 54, '30.000', 5),
(44, 55, '30.000', 5),
(45, 56, '30.000', 5),
(46, 57, '30.000', 5),
(47, 58, '30.000', 5),
(48, 59, '39.000', 5),
(49, 60, '20.000', 5),
(50, 61, '20.000', 5),
(51, 62, '30.000', 5),
(52, 63, '20.000', 5),
(53, 64, '30.000', 5),
(54, 65, '30.000', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `OrderDetailID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`OrderDetailID`, `OrderID`, `ProductID`, `Quantity`, `Subtotal`) VALUES
(63, 73, 24, 1, '2.20'),
(64, 73, 27, 1, '2.60'),
(65, 73, 25, 1, '2.30'),
(66, 74, 22, 1, '2.60'),
(67, 74, 24, 1, '2.20'),
(68, 75, 31, 1, '2.60'),
(69, 76, 39, 1, '3.20'),
(70, 76, 47, 1, '2.30'),
(71, 77, 24, 3, '6.60'),
(73, 79, 24, 1, '2.20'),
(74, 87, 20, 1, '2.40'),
(75, 87, 22, 1, '2.60'),
(76, 87, 28, 1, '2.60'),
(78, 90, 21, 1, '2.30'),
(79, 93, 21, 2, '4.60'),
(80, 93, 44, 1, '2.00'),
(81, 94, 25, 3, '6.90'),
(82, 94, 25, 2, '4.60'),
(83, 95, 25, 2, '4.60'),
(84, 117, 21, 1, '2.30'),
(85, 117, 23, 1, '2.60'),
(86, 118, 21, 1, '2.30'),
(87, 119, 22, 1, '2.60'),
(88, 119, 23, 1, '2.60'),
(89, 120, 22, 1, '2.60'),
(90, 121, 22, 1, '2.60'),
(91, 122, 22, 1, '2.60'),
(92, 123, 21, 1, '2.30'),
(93, 123, 22, 1, '2.60'),
(94, 124, 21, 1, '2.30'),
(95, 125, 20, 2, '4.80'),
(96, 126, 23, 1, '2.60'),
(97, 126, 23, 7, '18.20'),
(98, 127, 25, 1, '2.30'),
(99, 127, 25, 12, '27.60'),
(100, 128, 21, 3, '6.90'),
(101, 129, 24, 2, '4.40'),
(102, 129, 31, 1, '2.60'),
(103, 130, 23, 1, '2.60'),
(104, 131, 23, 1, '2.60'),
(105, 131, 33, 1, '3.20'),
(106, 132, 21, 1, '2.30'),
(107, 132, 30, 1, '2.80'),
(108, 133, 25, 1, '2.30'),
(109, 134, 21, 1, '2.30'),
(110, 135, 21, 3, '6.90'),
(111, 136, 25, 9, '20.70'),
(112, 137, 28, 15, '39.00'),
(113, 138, 28, 10, '26.00'),
(114, 139, 23, 1, '2.60'),
(115, 139, 34, 1, '3.00'),
(116, 140, 22, 1, '2.60'),
(117, 141, 22, 1, '2.60'),
(118, 142, 21, 1, '2.30'),
(119, 143, 20, 1, '2.40'),
(120, 144, 20, 1, '2.40'),
(121, 145, 20, 1, '2.40');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `OrderDate` datetime NOT NULL,
  `TableNo` varchar(10) DEFAULT NULL,
  `Status` varchar(50) NOT NULL,
  `TotalAmount` decimal(10,2) NOT NULL,
  `PaymentType` varchar(50) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `OrderDate`, `TableNo`, `Status`, `TotalAmount`, `PaymentType`, `UserID`) VALUES
(73, '2025-12-01 15:42:03', 'Dine-in', 'Pending', '7.10', 'Cash', 15),
(74, '2025-12-01 21:54:12', 'Delivery', 'Pending', '4.80', 'QRCode', 15),
(75, '2025-12-01 21:54:37', 'Dine-in', 'Pending', '2.60', 'Card', 15),
(76, '2025-12-01 21:55:08', 'Takeaway', 'Pending', '5.50', 'Cash', 15),
(77, '2025-12-01 22:17:36', 'Takeaway', 'Done', '6.60', 'Card', 15),
(78, '2025-12-01 22:42:33', 'Delivery', 'Done', '3.00', 'Cash', 15),
(79, '2025-12-01 22:54:17', 'Delivery', 'Done', '2.20', 'Cash', 15),
(86, '2025-12-01 22:56:15', 'Dine-in', 'Done', '2.30', 'Card', 15),
(87, '2025-12-02 10:40:02', 'Takeaway', 'Done', '7.60', 'Cash', 15),
(89, '2025-12-02 10:42:55', 'Dine-in', 'Done', '4.60', 'QRCode', 15),
(90, '2025-12-02 10:44:27', 'Dine-in', 'Done', '2.30', 'Card', 15),
(93, '2025-12-02 10:47:46', 'Takeaway', 'Done', '6.60', 'QRCode', 15),
(94, '2025-12-02 10:48:51', 'Dine-in', 'Done', '11.50', 'Card', 15),
(95, '2025-12-02 10:51:01', 'Delivery', 'Done', '4.60', 'Card', 15),
(117, '2025-12-02 11:13:43', 'Delivery', 'Done', '4.90', 'Card', 15),
(118, '2025-12-02 11:14:02', 'Takeaway', 'Done', '2.30', 'QRCode', 15),
(119, '2025-12-02 11:16:57', 'Delivery', 'Done', '5.20', 'Cash', 15),
(120, '2025-12-02 11:17:58', 'Delivery', 'Done', '2.60', 'Cash', 15),
(121, '2025-12-02 11:18:38', 'Delivery', 'Done', '2.60', 'Cash', 15),
(122, '2025-12-02 11:21:17', 'Delivery', 'Done', '2.60', 'Cash', 15),
(123, '2025-12-02 11:24:10', 'Delivery', 'Done', '4.90', '5', 15),
(124, '2025-12-02 11:24:45', 'Dine-in', 'Done', '2.30', '5', 15),
(125, '2025-12-02 11:28:32', 'Dine-in', 'Done', '4.80', 'Cash', 15),
(126, '2025-12-02 11:34:08', 'Dine-in', 'Done', '20.80', 'Card', 15),
(127, '2025-12-02 11:35:22', 'Takeaway', 'Done', '29.90', 'Card', 15),
(128, '2025-12-02 11:36:15', 'Takeaway', 'Done', '6.90', 'Card', 15),
(129, '2025-12-02 11:42:23', 'Takeaway', 'Done', '7.00', 'Cash', 15),
(130, '2025-12-02 11:43:57', 'Delivery', 'Done', '2.60', 'QRCode', 15),
(131, '2025-12-02 12:00:45', 'Takeaway', 'Done', '5.80', 'Cash', 15),
(132, '2025-12-02 12:02:04', 'Dine-in', 'Done', '5.10', 'QRCode', 15),
(133, '2025-12-02 12:04:06', 'Takeaway', 'Done', '2.30', 'Card', 15),
(134, '2025-12-02 12:05:00', 'Dine-in', 'Done', '2.30', 'Card', 15),
(135, '2025-12-02 13:40:50', '', 'Done', '6.90', 'Card', 15),
(136, '2025-12-02 13:41:24', 'Dine-in', 'Done', '20.70', 'Card', 15),
(137, '2025-12-02 13:43:03', 'Dine-in', 'Done', '39.00', 'Card', 15),
(138, '2025-12-02 13:43:44', 'Dine-in', 'Done', '26.00', 'Card', 15),
(139, '2025-12-02 13:48:00', 'Takeaway', 'Done', '5.60', 'Cash', 15),
(140, '2025-12-02 13:49:38', 'Delivery', 'Done', '2.60', 'QRCode', 15),
(141, '2025-12-02 13:49:54', 'Takeaway', 'Done', '2.60', 'Card', 15),
(142, '2025-12-02 13:51:22', 'Delivery', 'Done', '2.30', 'Card', 15),
(143, '2025-12-02 14:15:58', 'Dine-in', 'Done', '2.40', 'Card', 15),
(144, '2025-12-02 14:16:34', 'Dine-in', 'Done', '2.40', 'QRCode', 15),
(145, '2025-12-02 14:25:06', 'Dine-in', 'Done', '2.40', 'Card', 15);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `PaymentID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `PaymentMethod` varchar(50) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`PaymentID`, `OrderID`, `Amount`, `PaymentMethod`, `Date`) VALUES
(52, 73, '7.10', 'Cash', '2025-12-01 15:42:03'),
(53, 74, '4.80', 'QRCode', '2025-12-01 21:54:12'),
(54, 75, '2.60', 'Card', '2025-12-01 21:54:37'),
(55, 76, '5.50', 'Cash', '2025-12-01 21:55:08'),
(56, 77, '6.60', 'Card', '2025-12-01 22:17:36'),
(57, 78, '3.00', 'Cash', '2025-12-01 22:42:33'),
(58, 79, '2.20', 'Cash', '2025-12-01 22:54:17'),
(59, 86, '2.30', 'Card', '2025-12-01 22:56:15'),
(60, 87, '7.60', 'Cash', '2025-12-02 10:40:02'),
(61, 89, '4.60', 'QRCode', '2025-12-02 10:42:55'),
(62, 90, '2.30', 'Card', '2025-12-02 10:44:27'),
(63, 93, '6.60', 'QRCode', '2025-12-02 10:47:46'),
(64, 94, '11.50', 'Card', '2025-12-02 10:48:51'),
(65, 95, '4.60', 'Card', '2025-12-02 10:51:01'),
(66, 117, '4.90', 'Card', '2025-12-02 11:13:43'),
(67, 118, '2.30', 'QRCode', '2025-12-02 11:14:02'),
(68, 119, '5.20', 'Cash', '2025-12-02 11:16:57'),
(69, 120, '2.60', 'Cash', '2025-12-02 11:17:58'),
(70, 121, '2.60', 'Cash', '2025-12-02 11:18:38'),
(71, 122, '2.60', 'Cash', '2025-12-02 11:21:17'),
(72, 123, '4.90', '5', '2025-12-02 11:24:10'),
(73, 124, '2.30', '5', '2025-12-02 11:24:45'),
(74, 125, '4.80', 'Cash', '2025-12-02 11:28:32'),
(75, 126, '20.80', 'Card', '2025-12-02 11:34:08'),
(76, 127, '29.90', 'Card', '2025-12-02 11:35:22'),
(77, 128, '6.90', 'Card', '2025-12-02 11:36:15'),
(78, 129, '7.00', 'Cash', '2025-12-02 11:42:23'),
(79, 130, '2.60', 'QRCode', '2025-12-02 11:43:57'),
(80, 131, '5.80', 'Cash', '2025-12-02 12:00:45'),
(81, 132, '5.10', 'QRCode', '2025-12-02 12:02:04'),
(82, 133, '2.30', 'Card', '2025-12-02 12:04:06'),
(83, 134, '2.30', 'Card', '2025-12-02 12:05:00'),
(84, 135, '6.90', 'Card', '2025-12-02 13:40:50'),
(85, 136, '20.70', 'Card', '2025-12-02 13:41:24'),
(86, 137, '39.00', 'Card', '2025-12-02 13:43:03'),
(87, 138, '26.00', 'Card', '2025-12-02 13:43:44'),
(88, 139, '5.60', 'Cash', '2025-12-02 13:48:00'),
(89, 140, '2.60', 'QRCode', '2025-12-02 13:49:38'),
(90, 141, '2.60', 'Card', '2025-12-02 13:49:54'),
(91, 142, '2.30', 'Card', '2025-12-02 13:51:22'),
(92, 143, '2.40', 'Card', '2025-12-02 14:15:58'),
(93, 144, '2.40', 'QRCode', '2025-12-02 14:16:34'),
(94, 145, '2.40', 'Card', '2025-12-02 14:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `StockQty` int(11) DEFAULT '0',
  `Image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `CategoryID`, `Name`, `Price`, `StockQty`, `Image`) VALUES
(20, 12, 'Fresh Passion', '2.40', 34, 'Freshpassion.png'),
(21, 12, 'Peach Green Tea', '2.30', 9, 'Peach Green Tea.webp'),
(22, 13, 'Whisk Matcha Latte', '2.60', 31, 'Cold Whisk Matcha Latte.webp'),
(23, 13, 'Classic Matcha Latte', '2.60', 17, '3906979Classic Matcha Latte.webp'),
(24, 10, 'Honey Americano', '2.20', 32, 'Honey Americano3907005.webp'),
(25, 10, 'Spanish Latte', '2.30', 0, 'Spanish Latte3907006.webp'),
(26, 10, 'Hazelnut Latte', '2.60', 40, 'Hazelnut Latte3907010.webp'),
(27, 10, 'Vanilla Latte', '2.60', 39, 'Vanilla Latte3907011.webp'),
(28, 10, 'Caramel Latte', '2.60', 14, 'Iced Phin Black3907027.webp'),
(30, 10, 'Coconut Coffee Latte', '2.80', 39, 'Caramel Matcha Latte3906983.webp'),
(31, 10, 'Mocha', '2.60', 38, 'Mocha3907016.webp'),
(32, 10, 'Fresh Passion Americano', '2.50', 40, 'Fresh Passion Americano3907017.webp'),
(33, 14, 'Mixed Berry Frappe', '3.20', 39, 'Mixed Berry Frappe3907018.webp'),
(34, 14, 'Chocolate Frappe', '3.00', 39, 'Chocolate Frappe3907019.webp'),
(35, 14, 'Chocolate Frappe', '3.20', 40, 'White Chocolate Frappe3907020.webp'),
(36, 14, 'Blueberry Frappe', '3.00', 40, 'Blueberry Frappe3907021.webp'),
(37, 14, 'Strawberry Frappe', '3.00', 40, 'Strawberry Frappe3907022.webp'),
(38, 14, 'Caramel Milk Frappe', '3.00', 40, 'Caramel Milk Frappe3907023.webp'),
(39, 10, 'Coffee Frappe', '3.20', 39, 'Coffee Frappe3907025.webp'),
(40, 15, 'Iced Phin Milk Coffee', '2.50', 40, 'Iced Phin Milk Coffee3907026.webp'),
(41, 15, 'Iced Phin Black', '2.00', 20, 'Iced Phin Black3907027.webp'),
(42, 15, 'Milk Coffee with Cream', '2.80', 40, 'Iced Milk Coffee with Cream3907028.webp'),
(43, 12, 'Sweet Passion', '2.60', 40, 'Sweet Passion3906974.webp'),
(44, 12, 'Lemon Tea', '2.00', 39, 'Lemon Tea3906975.webp'),
(45, 12, 'Passion Cream', '2.40', 40, 'Passion Cream3906976.webp'),
(46, 12, 'Passion Green Tea', '2.00', 40, 'Passion Green Tea3906977.webp'),
(47, 13, 'Pure Matcha', '2.30', 39, 'Pure Matcha3906980.webp'),
(48, 13, 'Strawberry Matcha ', '2.80', 40, 'Strawberry Matcha Latte3906981.webp'),
(49, 13, 'Blueberry Matcha ', '2.80', 34, 'Blueberry Matcha Latte3906982.webp'),
(50, 13, 'Caramel Matcha Latte', '2.80', 29, 'Vanilla Latte3907011.webp'),
(51, 13, 'Iced Double Matchaâ€‹ with Cream', '3.00', 41, 'Iced Double Matchaâ€‹ with Cream3906984.webp'),
(52, 13, 'Coco Matcha Cream', '2.00', 20, 'Coco Matcha Cream3906985.webp'),
(53, 13, 'Coco Matcha', '2.50', 30, 'Coco Matcha3906986.webp'),
(54, 13, 'Oat Milk Matcha Latte', '3.00', 30, 'Oat Milk Matcha Latte3906987.webp'),
(55, 13, 'Oat Milk Hojicha Latte', '3.00', 30, 'Oat Milk Hojicha Latte3906988.webp'),
(56, 13, 'Hojicha Latte', '3.00', 30, 'Hojicha Latte3906989.webp'),
(57, 13, 'Pure Hojicha', '2.00', 30, 'Pure Hojicha3906990.webp'),
(58, 13, 'Coco Hojicha', '2.00', 30, 'Coco Hojicha3906992.webp'),
(59, 13, 'Coco Hojicha Cream', '2.60', 39, 'Coco Hojicha Cream3906992.webp'),
(60, 11, 'Fresh Milk with Caramel Cheese', '2.60', 20, 'Fresh Milk with Caramel Cheese3906994.webp'),
(61, 11, 'Fresh Milk Passion', '3.00', 20, 'Fresh Milk Passion3906995.webp'),
(62, 16, 'Iced Chocolate', '2.00', 30, 'Iced Chocolate3906996.webp'),
(63, 16, 'Iced White Chocolate', '2.50', 20, 'Iced White Chocolate3906997.webp'),
(64, 16, 'Purple Sweet Potato Milk with Boba and Cream Cheese', '3.00', 30, 'Purple Sweet Potato Milk with Boba and Cream Cheese3906998.webp'),
(65, 16, 'Purple Sweet Potato Corn Milk with Boba and Cream Cheese', '2.00', 30, 'Purple Sweet Potato Corn Milk with Boba and Cream Cheese3906999.webp');

-- --------------------------------------------------------

--
-- Table structure for table `purchasedetails`
--

CREATE TABLE `purchasedetails` (
  `PurchaseDetailID` int(11) NOT NULL,
  `PurchaseID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `CostPrice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchasedetails`
--

INSERT INTO `purchasedetails` (`PurchaseDetailID`, `PurchaseID`, `ProductID`, `Qty`, `CostPrice`) VALUES
(6, 6, 41, 20, '2.00'),
(7, 7, 25, 10, '2.00'),
(8, 8, 21, 5, '2.00'),
(9, 9, 23, 20, '2.00'),
(10, 10, 25, 10, '1.80'),
(11, 11, 21, 10, '2.00');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `PurchaseID` int(11) NOT NULL,
  `SupplierID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`PurchaseID`, `SupplierID`, `Date`, `Total`) VALUES
(6, 6, '2025-12-01', '40.00'),
(7, 8, '2025-12-03', '20.00'),
(8, 8, '2025-12-02', '10.00'),
(9, 6, '2025-12-02', '40.00'),
(10, 6, '2025-12-03', '18.00'),
(11, 6, '2025-12-02', '20.00');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `SupplierID` int(11) NOT NULL,
  `Name` varchar(150) NOT NULL,
  `Contact` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`SupplierID`, `Name`, `Contact`, `Address`) VALUES
(5, 'AA Cafe', '0965429290', 'Phnom Penh'),
(6, 'BB Cafe and Tea', '0965429290', 'Phnom Penh'),
(7, 'CC Drink and Food ', '0965429290', 'Kompot'),
(8, 'DD Cafe and Cake ', '0965429290', 'Kandal');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `PasswordHash` varchar(255) NOT NULL,
  `Role` varchar(50) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `PasswordHash`, `Role`, `CreatedAt`) VALUES
(8, 'Admin', '33333333', 'Admin', '2025-12-01 07:50:02'),
(15, 'Boun Hongly', '11111111', 'Manager', '2025-12-01 07:53:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EmpID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`InventoryID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`OrderDetailID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `purchasedetails`
--
ALTER TABLE `purchasedetails`
  ADD PRIMARY KEY (`PurchaseDetailID`),
  ADD KEY `PurchaseID` (`PurchaseID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`PurchaseID`),
  ADD KEY `SupplierID` (`SupplierID`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`SupplierID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `EmpID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `InventoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `OrderDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `purchasedetails`
--
ALTER TABLE `purchasedetails`
  MODIFY `PurchaseDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `PurchaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `SupplierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`);

--
-- Constraints for table `purchasedetails`
--
ALTER TABLE `purchasedetails`
  ADD CONSTRAINT `purchasedetails_ibfk_1` FOREIGN KEY (`PurchaseID`) REFERENCES `purchases` (`PurchaseID`),
  ADD CONSTRAINT `purchasedetails_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`SupplierID`) REFERENCES `suppliers` (`SupplierID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
