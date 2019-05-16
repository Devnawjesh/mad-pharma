-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2018 at 05:32 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `genpharma`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(128) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `status`) VALUES
(1, 'ACI', 'ACTIVE'),
(2, 'Aristopharma', 'ACTIVE'),
(3, 'Global', 'ACTIVE'),
(4, 'Beximco', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(14) NOT NULL,
  `c_id` varchar(64) DEFAULT NULL,
  `c_name` varchar(256) DEFAULT NULL,
  `c_email` varchar(256) DEFAULT NULL,
  `c_type` enum('Regular','Wholesale') NOT NULL DEFAULT 'Regular',
  `cus_contact` varchar(64) DEFAULT NULL,
  `c_address` varchar(512) DEFAULT NULL,
  `c_note` varchar(512) DEFAULT NULL,
  `c_img` varchar(128) DEFAULT NULL,
  `regular_discount` varchar(64) DEFAULT NULL,
  `target_amount` varchar(64) DEFAULT NULL,
  `target_discount` varchar(64) DEFAULT NULL,
  `entrydate` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `c_id`, `c_name`, `c_email`, `c_type`, `cus_contact`, `c_address`, `c_note`, `c_img`, `regular_discount`, `target_amount`, `target_discount`, `entrydate`) VALUES
(11, 'C144844', 'nj ghg', 'nawjesh@gmail.com', 'Regular', '01723179920', 'fgh fghf', 'ghj gjghfghffghgfhgfh fg hgfh gfhf', 'tech2news11.jpg', NULL, NULL, NULL, '0'),
(12, 'C8707289', 'fgf fgh fghfh f', 'nawjesh@gmail.com', 'Regular', '01723179920', 'gf hf hgf gfhfg', 'dfg fdg dfgdf fdg fdgdf', 'tech2news12.jpg', NULL, NULL, NULL, '0'),
(13, 'C1512231', 'Sajjadul Islam', 'sajjad@gmail.com', 'Wholesale', '01723179920', 'lake circus ,Font view, north', 'Keep Up With the Latest Panasonic Technologies\r\nJoin The Panasonic Community Receiving Current News And Events Delivered Right To Their Inbox', 'Untitled-1.png', '0', '', '0', '1519513200'),
(14, 'C919585', 'Saif Uz Zamman', 'nawjesh@gmail.com', 'Regular', '01723179920', 'ghj hgjgjgh', 'd df gdfg dfg dfgdfgfdg dfg dfgdf', NULL, '0', '', '0', '1519513200'),
(15, 'C6279639', 'Taksir Alam', 'taksir@gmail.com', 'Regular', '01723177901', 'gf hf hgf gfhfg', 'Keep Up With the Latest Panasonic Technologies\r\nJoin The Panasonic Community Receiving Current News And Events Delivered Right To Their Inbox', 'C5437363.png', '5', '50000', '5', '1519513200'),
(16, 'C3487712', 'Mashud ', '', 'Wholesale', '01817103918', 'Badda', '', NULL, NULL, NULL, NULL, '0'),
(17, 'C1720358', 'nawjesh', 'nawjesh@gmail.com', 'Regular', '01723177901', 'lake circus', 'Winter sports enthusiasts are bringing the revolution to India.Winter sports enthusiasts are bringing the revolution to India', 'C1720358.PNG', '0.05', '50000', '0.1', '1519340400'),
(18, 'C5577742', 'sa', '', 'Regular', '', '', '', NULL, '0', '', '0', '1519340400'),
(19, 'C3897156', 'Nadim Rabish', 'rabish@gmail.com', 'Wholesale', '01723177901', '', 'Keep Up With the Latest Panasonic Technologies\r\nJoin The Panasonic Community Receiving Current News And Events Delivered Right To Their Inbox', NULL, '0', '', '0', '1519513200'),
(20, 'C1239406', 'nawjesh jaman', 'nawjeshj@gmail.com', 'Regular', '01723177901', 'lake circus', 'dfgd fgfd gdfgd gdfgd gdffg d', NULL, '10', '50000', '5', '1519426800'),
(21, 'C2674634', 'Nurnobi MP', 'nurnobi@gmail.com', 'Regular', '01723177901', 'lake circus', 'Keep Up With the Latest Panasonic Technologies\r\nJoin The Panasonic Community Receiving Current News And Events Delivered Right To Their Inbox', 'C1078275.jpg', '5', '50000', '5', '1519513200'),
(22, 'C8107929', 'Nurnobi Chawdhury', 'nurnobi@gmail.com', 'Regular', '01723177901', 'lake circus', 'Keep Up With the Latest Panasonic Technologies\r\nJoin The Panasonic Community Receiving Current News And Events Delivered Right To Their Inbox', NULL, '5', '50000', '5', '1519513200'),
(23, 'C3782716', 'Nurnobi MP', 'nurnobi@gmail.com', 'Regular', '01723177901', 'lake circus', 'Keep Up With the Latest Panasonic Technologies\r\nJoin The Panasonic Community Receiving Current News And Events Delivered Right To Their Inbox', NULL, '5', '50000', '5', '1519513200'),
(24, 'C4269161', 'Nurnobi Mp', 'nawjesh@gmail.com', 'Regular', '01723177901', 'lake circus', 'gdfg dfgdfgfdg fdg dfgd', NULL, '10', '50000', '10', '1519599600'),
(25, 'C4761100', 'Nurnobi Mp', 'nawjesh@gmail.com', 'Regular', '01723177901', 'lake circus', 'gdfg dfgdfgfdg fdg dfgd', NULL, '10', '50000', '10', '1519599600');

-- --------------------------------------------------------

--
-- Table structure for table `customer_ledger`
--

CREATE TABLE `customer_ledger` (
  `id` int(14) NOT NULL,
  `customer_id` varchar(64) DEFAULT NULL,
  `total_balance` varchar(64) DEFAULT NULL,
  `total_paid` varchar(64) NOT NULL,
  `total_due` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_ledger`
--

INSERT INTO `customer_ledger` (`id`, `customer_id`, `total_balance`, `total_paid`, `total_due`) VALUES
(1, 'C1239406', '1849.6', '1761', '88.6'),
(4, 'C3782716', '0', '0', '0'),
(5, 'C4269161', '0', '0', '0'),
(6, 'C4761100', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` bigint(20) NOT NULL,
  `product_id` varchar(64) DEFAULT NULL,
  `supplier_id` varchar(64) DEFAULT NULL,
  `batch_no` varchar(256) DEFAULT NULL,
  `product_name` varchar(64) DEFAULT NULL,
  `generic_name` varchar(64) DEFAULT NULL,
  `strength` varchar(64) DEFAULT NULL,
  `form` varchar(64) DEFAULT NULL,
  `box_size` varchar(64) DEFAULT NULL,
  `trade_price` varchar(64) DEFAULT NULL,
  `mrp` varchar(64) DEFAULT NULL,
  `box_price` varchar(64) DEFAULT NULL,
  `product_details` varchar(512) DEFAULT NULL,
  `side_effect` varchar(512) DEFAULT NULL,
  `expire_date` varchar(64) DEFAULT NULL,
  `instock` varchar(64) DEFAULT NULL,
  `product_image` varchar(256) DEFAULT NULL,
  `date` varchar(64) DEFAULT NULL,
  `location` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `product_id`, `supplier_id`, `batch_no`, `product_name`, `generic_name`, `strength`, `form`, `box_size`, `trade_price`, `mrp`, `box_price`, `product_details`, `side_effect`, `expire_date`, `instock`, `product_image`, `date`, `location`) VALUES
(68, 'P28734', 'S10296', NULL, 'loll', 'lolz', '100mg', 'Capsule', '12', '12', '17', '185', NULL, 'dfgdf gdf gdf gfdg df gdfgsdfgdf f', '', '700', 'P28734.jpg', '0', NULL),
(69, 'P36051', 'S10296', '144476318', 'Doxiva', 'Doxiva Plus', '10mg', 'Tablet', '12', '12', '17', '185', NULL, 'dfhd gdf gdfgdfgdfgdf gfddfgdfd gdf', '', '189', 'P4478.png', '0', NULL),
(70, 'P21648', 'S22663', NULL, 'paracitamol ', 'paracitamol', '50mg', 'Tablet', '50', '2', '3', '150.00', NULL, 'Keep Up With the Latest Panasonic Technologies\r\nJoin The Panasonic Community Receiving Current News And Events Delivered Right To Their Inbox', '', NULL, 'P21648.PNG', '0', NULL),
(71, 'P6966', 'S22663', NULL, 'Antasid', 'Part dose of a tablet or capsule', '10mg', 'Tablet', '50', '12', '12', '600.00', NULL, 'Part dose of a tablet or capsulePart dose of a tablet or capsulePart dose of a tablet or capsule', '', NULL, 'P5178.jpg', '0', NULL),
(72, 'P44296', 'S22663', '708227539', 'Parapayroll', 'Part dose of a tablet or capsule', '10mg', 'Capsules', '50', '10', '12', '600.00', NULL, 'Part dose of a tablet or capsulePart dose of a tablet or capsulePart dose of a tablet or capsulePart dose of a tablet or capsule', '02/25/2018', NULL, NULL, NULL, NULL),
(73, 'P24066', 'S22663', '708227539', 'Parapayroll', 'Part dose of a tablet or capsule', '10mg', 'Capsules', '50', '10', '12', '600.00', NULL, 'Part dose of a tablet or capsulePart dose of a tablet or capsulePart dose of a tablet or capsulePart dose of a tablet or capsule', '02/25/2018', NULL, NULL, NULL, NULL),
(74, 'P21592', 'S22663', '641748047', 'Deslor', 'Deslordine INN', '5mg', 'Tablet', '12', '12', '12', '144.00', NULL, 'sda a dsadasdas das dasd as dads das dasd as das dasd as dasd as dasdasd asdasd as das das adss asd asd as ddf vd vdfgv dfgdf', '02/25/2018', NULL, NULL, NULL, NULL),
(75, 'P33412', 'S22663', '641748047', 'Deslor', 'Deslordine INN', '5mg', 'Tablet', '12', '12', '12', '144.00', NULL, 'sda a dsadasdas das dasd as dads das dasd as das dasd as dasd as dasdasd asdasd as das das adss asd asd as ddf vd vdfgv dfgdf', '02/25/2018', NULL, NULL, NULL, NULL),
(76, 'P44791', 'S10296', NULL, 'Filmet', 'Metronedazole 10 mg', '10mg', NULL, '12', '12', '16', '192.00', NULL, 'Java Developer?\r\nDo you code fast enough?\r\nGet code suggestions while writing code directly to your Java IDE.\r\nJoin +30,000 developers that code better and faster using Codota >', '02/28/2018', NULL, 'P44791.PNG', '0', NULL),
(77, 'P16219', 'S7174', '555273437', 'Filmet ', 'Part dose of a tablet or capsule', '10mg', 'Powder', '50', '12', '17', '850.00', NULL, 'dfgd gdgd fg dfg dfgdfg dfg df gdfgdfgfdg df gfd gdf gdgfg dfg df g df gdf gdf', '02/25/2018', NULL, NULL, NULL, NULL),
(78, 'P8675', 'S22663', '1249719239', 'Doxiva', 'Doxiva powder', '10mg', 'Powder', '12', '12', '12', '144.00', NULL, 'Java Developer?\r\nDo you code fast enough?\r\nGet code suggestions while writing code directly to your Java IDE.\r\nJoin +30,000 developers that code better and faster using Codota >', '03/10/2018', NULL, 'P8675.jpg', '0', NULL),
(79, 'P10542', 'S11208', '743261719', 'Antasid', 'paracitamol', '50mg', 'Tubes', '50', '12', '17', '850.00', NULL, 'dfgfdg dfgdfg dfgfd gdfg fdsdfgdf gdf', '03/02/2018', NULL, NULL, NULL, NULL),
(80, 'P12115', 'S1302', '333660888', 'Filmet', 'Part dose of a tablet or capsule', '10mg', 'Capsules', '12', '12', '17', '204.00', NULL, 'gf jfhgfh gfh gf ', '02/27/2018', NULL, NULL, NULL, NULL),
(81, 'P32057', 'S1302', '563177490', 'Filmet', 'Part dose of a tablet or capsule', '10mg', 'Capsules', '12', '12', '17', '204.00', NULL, 'fg gfh gf hgf hfghgg', '03/01/2018', NULL, 'P32057.png', '0', NULL),
(82, 'P49853', 'S22663', NULL, 'Doxiva', 'Doxiva Plussdfsd fsd', '10mg', 'Tablet', '12', '12', '17', '185', NULL, 'dfhd gdf gdfgdfgdfgdf gfddfgdfd gdf', '02/28/2018', NULL, 'P498531.png', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(14) NOT NULL,
  `p_id` varchar(64) DEFAULT NULL,
  `sid` varchar(64) DEFAULT NULL,
  `invoice_no` varchar(64) DEFAULT NULL,
  `pur_date` varchar(64) DEFAULT NULL,
  `pur_details` varchar(64) DEFAULT NULL,
  `total_discount` varchar(64) DEFAULT NULL,
  `gtotal_amount` varchar(64) DEFAULT NULL,
  `entry_date` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `p_id`, `sid`, `invoice_no`, `pur_date`, `pur_details`, `total_discount`, `gtotal_amount`, `entry_date`) VALUES
(15, 'P575310', 'S10296', '4vSXDeWimK', '1516921200', 'sdfsd fsdf dsfsd', '', '204', '1519254000'),
(16, 'P7079137', 'S10296', 'MdJZgHWmnv', '1543618800', '1vfgnf hfdhgdf', 'NaN', '204', '1519340400');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_history`
--

CREATE TABLE `purchase_history` (
  `ph_id` int(14) NOT NULL,
  `pur_id` varchar(128) DEFAULT NULL,
  `mid` varchar(128) DEFAULT NULL,
  `supp_id` varchar(64) DEFAULT NULL,
  `qty` varchar(128) DEFAULT NULL,
  `supplier_price` varchar(128) DEFAULT NULL,
  `discount` varchar(128) DEFAULT NULL,
  `expire_date` varchar(128) DEFAULT NULL,
  `total_amount` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase_history`
--

INSERT INTO `purchase_history` (`ph_id`, `pur_id`, `mid`, `supp_id`, `qty`, `supplier_price`, `discount`, `expire_date`, `total_amount`) VALUES
(23, 'P575310', 'P4478', 'S10296', '12', '12', '', '1519254000', '204'),
(24, 'P7079137', 'P4478', 'S10296', '12', '12', '', '1520550000', '204');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(14) NOT NULL,
  `sale_id` varchar(64) DEFAULT NULL,
  `cus_id` varchar(64) DEFAULT NULL,
  `total_discount` varchar(64) DEFAULT NULL,
  `total_amount` varchar(64) DEFAULT NULL,
  `paid_amount` varchar(64) DEFAULT NULL,
  `due_amount` varchar(64) DEFAULT NULL,
  `invoice_no` varchar(128) DEFAULT NULL,
  `create_date` varchar(128) DEFAULT NULL,
  `monthyear` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `sale_id`, `cus_id`, `total_discount`, `total_amount`, `paid_amount`, `due_amount`, `invoice_no`, `create_date`, `monthyear`) VALUES
(3, 'S3555976', 'C1239406', '37.400000000000006', '336.6', '300', '36.60000000000002', '12371041', '0', '2018-01'),
(4, 'S5000390', 'C1239406', '71', '320', '300', '20', '65168533', '1517439600', '2018-01'),
(5, 'S3485190', 'C1239406', '71', '320', '300', '20', '97612864', '1517439600', '2018-01'),
(6, 'S793772', 'C1239406', '20', '184', '180', '4', '33757715', '1517439600', '2018-01'),
(7, 'S5427856', 'C1239406', '20', '184', '180', '4', '4697448', '1517439600', '2018-01'),
(8, 'S6083547', 'C1239406', '2', '15', '15', '0', '74162216', '1517439600', '2018-01'),
(9, 'S7390964', 'C1239406', '20', '184', '180', '4', '630347028', '1517439600', '2018-01'),
(10, 'S1119635', 'C1239406', '34', '306', '306', '0', '833146570', '1517439600', '2018-01'),
(11, 'S6860675', 'Customer Name(Type)', '0', '204', '12', '192', '626441168', '0', '01-2018');

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `sd_id` int(14) NOT NULL,
  `sale_id` varchar(128) DEFAULT NULL,
  `mid` varchar(128) DEFAULT NULL,
  `cartoon` varchar(128) DEFAULT NULL,
  `qty` varchar(128) DEFAULT NULL,
  `rate` varchar(128) DEFAULT NULL,
  `supp_rate` varchar(128) NOT NULL,
  `total_price` varchar(128) DEFAULT NULL,
  `discount` varchar(128) DEFAULT NULL,
  `total_discount` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales_details`
--

INSERT INTO `sales_details` (`sd_id`, `sale_id`, `mid`, `cartoon`, `qty`, `rate`, `supp_rate`, `total_price`, `discount`, `total_discount`) VALUES
(1, 'S3555976', 'P4478', NULL, '12', NULL, '', '183.6', '10', '20.400000000000002'),
(2, 'S3555976', 'P25760', NULL, '10', NULL, '', '153', '10', '17'),
(3, 'S5000390', 'P25760', NULL, '10', '17', '', '148', '13', '22'),
(4, 'S5000390', 'P4478', NULL, '13', '17', '', '172', '22', '49'),
(5, 'S3485190', 'P25760', NULL, '10', '17', '', '148', '13', '22'),
(6, 'S3485190', 'P4478', NULL, '13', '17', '', '172', '22', '49'),
(7, 'S793772', 'P4478', NULL, '12', '17', '', '184', '10', '20'),
(8, 'S5427856', 'P4478', NULL, '12', '17', '', '184', '10', '20'),
(9, 'S6083547', 'P25760', NULL, '1', '17', '', '15', '10', '2'),
(10, 'S7390964', 'P4478', NULL, '12', '17', '', '184', '10', '20'),
(11, 'S1119635', 'P4478', NULL, '10', '17', '', '153', '10', '17'),
(12, 'S1119635', 'P4478', NULL, '10', '17', '', '153', '10', '17');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `sitelogo` varchar(128) DEFAULT NULL,
  `sitetitle` varchar(256) DEFAULT NULL,
  `description` text,
  `copyright` varchar(128) DEFAULT NULL,
  `contact` varchar(128) DEFAULT NULL,
  `currency` varchar(128) DEFAULT NULL,
  `symbol` varchar(64) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(14) NOT NULL,
  `s_id` varchar(64) DEFAULT NULL,
  `s_name` varchar(256) DEFAULT NULL,
  `s_email` varchar(256) DEFAULT NULL,
  `s_note` varchar(512) DEFAULT NULL,
  `s_phone` varchar(128) DEFAULT NULL,
  `s_address` varchar(512) NOT NULL,
  `s_img` varchar(256) DEFAULT NULL,
  `entrydate` varchar(128) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `s_id`, `s_name`, `s_email`, `s_note`, `s_phone`, `s_address`, `s_img`, `entrydate`, `status`) VALUES
(2, 'S10296', 'Aristopharma', 'sada@gmail.com', 'dfg dfgdfg fd gdfg df gd', '01723177901', 'dfgdfg fdg dfg fdg dfg dfgd', 'S10296.jpg', '01-17-2018', 'Inactive'),
(3, 'S22663', 'ACI', 'baker@gmail.com', 'Baker sjfhdsjkfnmds,s dsifjdsf,mds', '01515263960', 'rtyty ty trytry', 'S22663.png', '02-21-2018', 'Inactive'),
(4, 'S1302', 'Navana', 'Navana@gmail.com', 'Java Developer?\r\nDo you code fast enough?\r\nGet code suggestions while writing code directly to your Java IDE.\r\nJoin +30,000 developers that code better and faster using Codota >', '01723177901', 'rtyty ty trytry', 'S1302.PNG', '02-25-2018', 'Inactive'),
(8, 'S11208', 'Beximco', 'beximco@gmail.com', 'Star Sports\r\n48 mins · \r\nSuresh Raina’s impressive performance in the #SAvIND T20Is must\'ve caught the selectors eyes! Will the southpaw make a comeback in the ODI squad?', '01515263960', 'kolabaganfgfhf ', 'S11208.PNG', '02-25-2018', 'Inactive'),
(9, 'S24604', 'Navana', 'baker@gmail.com', 'We want you to have a safe experience on Facebook\r\nMD Nawjesh, we wanted you to know that we have tools to help prevent and remove spam and requests from people you don\'t know. If you\'d like to learn how to secure your account against spam and unwanted requests, or how to review your account activity and report spam, we can help.', '01515263996', 'Pream nagor', NULL, '02-25-2018', 'Active'),
(10, 'S21167', 'navana', 'navana@gmail.com', 'We want you to have a safe experience on Facebook\r\nMD Nawjesh, we wanted you to know that we have tools to help prevent and remove spam and requests from people you don\'t know. If you\'d like to learn how to secure your account against spam and unwanted requests, or how to review your account activity and report spam, we can help.', '0197717971', 'kolabaganfgfhf ', 'S21167.png', '0', 'Active'),
(11, 'S13710', 'Mr.Baker', 'beximco@gmail.com', 'sg sfsd fdsf', '14563512321', 'kolabaganfgfhf ', NULL, '0', 'Inactive'),
(12, 'S7522', 'Navana', 'beximco@gmail.com', 'fgb ngfbfgfbdf fd', '534131232131', '5g hdgdf fgds', 'S7522.PNG', '02-25-2018', 'Inactive'),
(13, 'S10782', 'Beximco Pro', 'beximcopro@gmail.com', 'We want you to have a safe experience on Facebook\r\nMD Nawjesh, we wanted you to know that we have tools to help prevent and remove spam and requests from people you don\'t know. If you\'d like to learn how to secure your account against spam and unwanted requests, or how to review your account activity and report spam, we can help.', '01919177901', 'savar ,dhaka', 'S107821.jpg', '02-27-2018', 'Active'),
(14, 'S17793', 'Mr.Baker Pro', 'pro@gmail.com', 'We want you to have a safe experience on Facebook\r\nMD Nawjesh, we wanted you to know that we have tools to help prevent and remove spam and requests from people you don\'t know. If you\'d like to learn how to secure your account against spam and unwanted requests, or how to review your account activity and report spam, we can help.', '01723177901', 'kolabaganfgfhf ', 'S17793.jpg', '02-27-2018', 'Active'),
(15, 'S22605', 'Mr.Z', 'prop@gmail.com', 'We want you to have a safe experience on Facebook\r\nMD Nawjesh, we wanted you to know that we have tools to help prevent and remove spam and requests from people you don\'t know. If you\'d like to learn how to secure your account against spam and unwanted requests, or how to review your account activity and report spam, we can help.', '01723177901', 'kolabaganfgfhf ', 'S22605.jpg', '02-27-2018', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_product`
--

CREATE TABLE `supplier_product` (
  `sp_id` int(14) NOT NULL,
  `pro_id` varchar(64) DEFAULT NULL,
  `sup_id` varchar(64) DEFAULT NULL,
  `sup_price` varchar(64) DEFAULT NULL,
  `sup_date` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(14) NOT NULL,
  `em_id` varchar(64) DEFAULT NULL,
  `em_name` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `em_role` enum('EMPLOYEE','ADMIN','SUPER ADMIN') NOT NULL DEFAULT 'EMPLOYEE',
  `em_contact` varchar(128) DEFAULT NULL,
  `em_address` varchar(512) DEFAULT NULL,
  `em_image` varchar(256) DEFAULT NULL,
  `em_details` varchar(512) DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  `em_entrydate` varchar(64) DEFAULT NULL,
  `em_ip` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `em_id`, `em_name`, `email`, `password`, `em_role`, `em_contact`, `em_address`, `em_image`, `em_details`, `status`, `em_entrydate`, `em_ip`) VALUES
(1, 'NJ123', 'Nawjesh J Soyeb', 'pharma@gmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', 'ADMIN', '01723177901', 'Kolabagan dhaka', 'nj.jpg', 'Today, I salute the true heroes of our country who keeps us safe by risking their lives at the border. It is because of these brave souls that we can feel safe in our homes. I feel proud to say that I have had the privilege to play the character of a Colonel in one of my movies. On this National Army day I pay my sincere homage to the fighters who have sacrificed their lives for the betterment of our country', 'ACTIVE', '01/15/2018', '01'),
(24, 'U392', 'nawjesh', 'nurmd30@gmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', 'ADMIN', '01723177901', '', NULL, '', 'ACTIVE', '0', '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_ledger`
--
ALTER TABLE `customer_ledger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_history`
--
ALTER TABLE `purchase_history`
  ADD PRIMARY KEY (`ph_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`sd_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_product`
--
ALTER TABLE `supplier_product`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `customer_ledger`
--
ALTER TABLE `customer_ledger`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `purchase_history`
--
ALTER TABLE `purchase_history`
  MODIFY `ph_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `sd_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `supplier_product`
--
ALTER TABLE `supplier_product`
  MODIFY `sp_id` int(14) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
