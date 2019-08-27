-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2019 at 09:24 PM
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
-- Database: `genpharma`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(14) NOT NULL,
  `amount` varchar(64) DEFAULT NULL,
  `due` varchar(64) DEFAULT NULL,
  `paid` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `accounts_report`
--

CREATE TABLE `accounts_report` (
  `id` int(14) NOT NULL,
  `transection_type` varchar(128) DEFAULT NULL,
  `transection_name` varchar(128) DEFAULT NULL,
  `description` varchar(512) DEFAULT NULL,
  `mtype` varchar(128) DEFAULT NULL,
  `cheque` varchar(128) DEFAULT NULL,
  `issuedate` varchar(128) DEFAULT NULL,
  `bankid` varchar(128) DEFAULT NULL,
  `amount` varchar(128) DEFAULT NULL,
  `entry_id` varchar(128) DEFAULT NULL,
  `date` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts_report`
--

INSERT INTO `accounts_report` (`id`, `transection_type`, `transection_name`, `description`, `mtype`, `cheque`, `issuedate`, `bankid`, `amount`, `entry_id`, `date`) VALUES
(26, 'Payment', 'dsfsf', 'sdfsdf', 'Cash', '', '', '1', '', 'U392', '1522778400'),
(27, 'Receipt', 'dfgfdgd', 'sdfds', 'Cash', '', '', '1', '1000', 'U392', '1522778400'),
(28, 'Payment', 'fgdfds', 'fgdgfd', 'Cash', '', '', '1', '', 'U392', '1522778400'),
(29, 'Payment', 'fgfdg', 'sdfsd', 'Cash', '', '', '1', '', 'U392', '1522778400'),
(30, 'Payment', 'xfsdf', 'dsfs', 'Cash', '', '', '1', '', 'U392', '1522778400'),
(31, 'Payment', 'fdsfs', 'sfs', 'Cash', '', '', '1', '', 'U392', '1522778400'),
(32, 'Payment', 'fdsfs', 'sfs', 'Cash', '', '', '1', '', 'U392', '1522778400'),
(33, 'Payment', 'fdgdfgd', 'dfssf', 'Cash', '', '', '1', '', 'U392', '1522778400'),
(34, 'Payment', 'fsfs', 'dsfds', 'Cash', '', '', '1', '', 'U392', '1522778400'),
(35, 'Payment', 'ghgf', 'fsd', 'Cash', '', '', '1', NULL, 'U392', '1522778400'),
(36, 'Payment', 'dasda', 'dfdsfs', 'Cash', '', '', '1', NULL, 'U392', '1522778400'),
(37, 'Payment', 'dsadsa', 'asdas', 'Cash', '', '', '1', '1000', 'U392', '1522778400'),
(38, 'Receipt', 'sdfsdfs', 'sdfds', 'Cash', '', '', '1', '1000', 'U392', '1522778400'),
(39, 'Payment', 'fsdfs', 'sdffsd', 'Cash', '', '', '1', '1000', 'U392', '1522778400');

-- --------------------------------------------------------

--
-- Table structure for table `ambulance`
--

CREATE TABLE `ambulance` (
  `id` int(11) NOT NULL,
  `name` varchar(333) NOT NULL,
  `email` varchar(333) NOT NULL,
  `contact` varchar(333) NOT NULL,
  `address` varchar(333) NOT NULL,
  `hospital_name` varchar(333) NOT NULL,
  `notes` varchar(333) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bank_id` int(14) NOT NULL,
  `bank_name` varchar(256) DEFAULT NULL,
  `account_name` varchar(256) DEFAULT NULL,
  `account_number` varchar(512) DEFAULT NULL,
  `branch` varchar(512) DEFAULT NULL,
  `signature` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `closing`
--

CREATE TABLE `closing` (
  `id` int(14) NOT NULL,
  `date` varchar(128) DEFAULT NULL,
  `opening_balance` varchar(128) DEFAULT NULL,
  `cash_in` varchar(128) DEFAULT NULL,
  `cash_out` varchar(128) DEFAULT NULL,
  `cash_in_hand` varchar(128) DEFAULT NULL,
  `closing_balance` varchar(128) DEFAULT NULL,
  `adjustment` varchar(128) DEFAULT NULL,
  `entry_id` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `pharmacy_name` varchar(256) DEFAULT NULL,
  `c_email` varchar(256) DEFAULT NULL,
  `c_type` enum('Regular','Wholesale') NOT NULL DEFAULT 'Regular',
  `barcode` varchar(512) DEFAULT NULL,
  `cus_contact` varchar(64) DEFAULT NULL,
  `c_address` varchar(512) DEFAULT NULL,
  `c_note` varchar(512) DEFAULT NULL,
  `c_img` varchar(128) DEFAULT NULL,
  `regular_discount` varchar(64) DEFAULT NULL,
  `target_amount` varchar(64) DEFAULT NULL,
  `target_discount` varchar(64) DEFAULT NULL,
  `entrydate` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `address` varchar(512) DEFAULT NULL,
  `contact` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fire_service`
--

CREATE TABLE `fire_service` (
  `id` int(11) NOT NULL,
  `name` varchar(223) NOT NULL,
  `email` varchar(223) NOT NULL,
  `contact` varchar(223) NOT NULL,
  `address` varchar(223) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `contact` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `id` int(14) NOT NULL,
  `em_id` varchar(64) DEFAULT NULL,
  `date` varchar(128) DEFAULT NULL,
  `login` varchar(64) DEFAULT NULL,
  `logout` varchar(64) DEFAULT NULL,
  `counter` varchar(64) DEFAULT NULL,
  `status` enum('1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `instock` int(128) DEFAULT NULL,
  `w_discount` varchar(128) DEFAULT NULL,
  `product_image` varchar(256) DEFAULT NULL,
  `short_stock` int(128) DEFAULT NULL,
  `favourite` enum('1','0') NOT NULL DEFAULT '0',
  `date` varchar(256) DEFAULT NULL,
  `discount` enum('YES','NO') NOT NULL DEFAULT 'YES',
  `sale_qty` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `police`
--

CREATE TABLE `police` (
  `id` int(14) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `contact` varchar(256) DEFAULT NULL,
  `address` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `entry_date` varchar(64) DEFAULT NULL,
  `entry_id` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `purchase_return`
--

CREATE TABLE `purchase_return` (
  `id` int(14) NOT NULL,
  `r_id` varchar(64) DEFAULT NULL,
  `pur_id` varchar(64) DEFAULT NULL,
  `sid` varchar(64) DEFAULT NULL,
  `invoice_no` varchar(128) DEFAULT NULL,
  `return_date` varchar(128) DEFAULT NULL,
  `total_deduction` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_return_details`
--

CREATE TABLE `purchase_return_details` (
  `id` int(14) NOT NULL,
  `r_id` varchar(128) DEFAULT NULL,
  `pur_id` varchar(128) DEFAULT NULL,
  `supp_id` varchar(64) DEFAULT NULL,
  `mid` varchar(128) DEFAULT NULL,
  `return_qty` varchar(64) DEFAULT NULL,
  `deduction_amount` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `monthyear` varchar(64) DEFAULT NULL,
  `entryid` varchar(64) DEFAULT NULL,
  `counter` varchar(64) DEFAULT NULL,
  `pay_status` enum('Hold','Pay') NOT NULL DEFAULT 'Pay',
  `sales_time` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `sales_return`
--

CREATE TABLE `sales_return` (
  `id` int(14) NOT NULL,
  `sr_id` varchar(128) DEFAULT NULL,
  `cus_id` varchar(128) DEFAULT NULL,
  `sale_id` varchar(128) DEFAULT NULL,
  `invoice_no` varchar(256) DEFAULT NULL,
  `return_date` varchar(128) DEFAULT NULL,
  `total_deduction` varchar(128) DEFAULT NULL,
  `total_amount` varchar(128) DEFAULT NULL,
  `entry_id` varchar(128) DEFAULT NULL,
  `counter` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales_return_details`
--

CREATE TABLE `sales_return_details` (
  `id` int(14) NOT NULL,
  `sr_id` varchar(128) DEFAULT NULL,
  `mid` varchar(128) DEFAULT NULL,
  `r_qty` varchar(128) DEFAULT NULL,
  `r_total` varchar(128) DEFAULT NULL,
  `r_deduction` varchar(128) DEFAULT NULL,
  `date` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `sitelogo`, `sitetitle`, `description`, `copyright`, `contact`, `currency`, `symbol`, `email`, `address`) VALUES
(1, 'Safeway Pharma', 'airline.PNG', 'Safeway Pharma', 'Safeway Pharma Bangladesh', 'Genit Bangladesh', '01779883969', 'TK', 'TK', 'safewaypharma18@gmail.com', 'La-58, Moddho Badda, Progati Sharani, Gulshan, Dhaka-1212.');

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

-- --------------------------------------------------------

--
-- Table structure for table `supplier_ledger`
--

CREATE TABLE `supplier_ledger` (
  `id` int(14) NOT NULL,
  `supplier_id` varchar(256) DEFAULT NULL,
  `total_amount` varchar(256) DEFAULT NULL,
  `total_paid` varchar(256) DEFAULT NULL,
  `total_due` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `supp_account`
--

CREATE TABLE `supp_account` (
  `id` int(14) NOT NULL,
  `supplier_id` varchar(64) DEFAULT NULL,
  `pur_id` varchar(128) DEFAULT NULL,
  `total_amount` varchar(64) DEFAULT NULL,
  `paid_amount` varchar(64) DEFAULT NULL,
  `due_amount` varchar(256) DEFAULT NULL,
  `date` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `supp_payment`
--

CREATE TABLE `supp_payment` (
  `id` int(14) NOT NULL,
  `supp_id` varchar(64) DEFAULT NULL,
  `pur_id` varchar(64) DEFAULT NULL,
  `type` varchar(64) DEFAULT NULL,
  `bank_id` int(14) DEFAULT NULL,
  `cheque_no` varchar(128) DEFAULT NULL,
  `issue_date` varchar(64) DEFAULT NULL,
  `receiver_name` varchar(128) DEFAULT NULL,
  `receiver_contact` varchar(128) DEFAULT NULL,
  `paid_amount` varchar(64) DEFAULT NULL,
  `date` varchar(64) DEFAULT NULL
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
  `em_role` enum('SALESMAN','ADMIN','MANAGER') NOT NULL DEFAULT 'SALESMAN',
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
(24, 'U392', 'nawjesh', 'admin@gmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', 'ADMIN', '01723177901', 'egrvrevge rgret', 'U3921.jpg', 'erer treter r gefgfdfg dfs', 'ACTIVE', '0', '::1'),
(25, 'U134', 'Nawjesh', 'example@example.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', 'MANAGER', '01723177901', 'Kolabagan', 'U134.jpg', 'Nawjesh jahan soyeb', 'ACTIVE', '0', '::1'),
(26, 'U310', 'Nawjesh', 'nawjeshbd@gmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', 'SALESMAN', '01723177901', 'egrvrevge rgret', NULL, 'dfgfdgfdg fdg df', 'ACTIVE', '0', '27.147.206.105');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accounts_report`
--
ALTER TABLE `accounts_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambulance`
--
ALTER TABLE `ambulance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `closing`
--
ALTER TABLE `closing`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fire_service`
--
ALTER TABLE `fire_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `police`
--
ALTER TABLE `police`
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
-- Indexes for table `purchase_return`
--
ALTER TABLE `purchase_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_return_details`
--
ALTER TABLE `purchase_return_details`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `sales_return`
--
ALTER TABLE `sales_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_return_details`
--
ALTER TABLE `sales_return_details`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `supplier_ledger`
--
ALTER TABLE `supplier_ledger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_product`
--
ALTER TABLE `supplier_product`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `supp_account`
--
ALTER TABLE `supp_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supp_payment`
--
ALTER TABLE `supp_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `accounts_report`
--
ALTER TABLE `accounts_report`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `closing`
--
ALTER TABLE `closing`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `customer_ledger`
--
ALTER TABLE `customer_ledger`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=344;

--
-- AUTO_INCREMENT for table `police`
--
ALTER TABLE `police`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `purchase_history`
--
ALTER TABLE `purchase_history`
  MODIFY `ph_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT for table `purchase_return`
--
ALTER TABLE `purchase_return`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `purchase_return_details`
--
ALTER TABLE `purchase_return_details`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=360;

--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `sd_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=653;

--
-- AUTO_INCREMENT for table `sales_return`
--
ALTER TABLE `sales_return`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales_return_details`
--
ALTER TABLE `sales_return_details`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `supplier_ledger`
--
ALTER TABLE `supplier_ledger`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `supplier_product`
--
ALTER TABLE `supplier_product`
  MODIFY `sp_id` int(14) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supp_account`
--
ALTER TABLE `supp_account`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `supp_payment`
--
ALTER TABLE `supp_payment`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
