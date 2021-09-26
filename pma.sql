-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2021 at 12:13 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharma`
--

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `bill_type` char(12) NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  `total_bill` decimal(10,2) DEFAULT NULL,
  `paid_bill` decimal(10,2) DEFAULT NULL,
  `balance_bill` decimal(10,2) DEFAULT NULL,
  `updated_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`id`, `customer_id`, `bill_type`, `bill_no`, `total_bill`, `paid_bill`, `balance_bill`, `updated_on`) VALUES
(4, 1, 'challan', 'CH001', '210.00', '10.00', '90.00', '2019-10-17 07:23:02'),
(3, 1, 'challan', 'CH001', '210.00', '110.00', '100.00', '2019-10-16 08:13:52'),
(5, 1, 'challan', 'CH001', '210.00', '10.00', '90.00', '2019-10-19 08:19:52'),
(6, 1, 'challan', 'CH001', '210.00', '10.00', '90.00', '2019-10-19 08:20:36'),
(7, 1, 'challan', 'CH001', '210.00', '10.00', '90.00', '2019-10-19 08:22:51');

-- --------------------------------------------------------

--
-- Table structure for table `challan_bills`
--

CREATE TABLE `challan_bills` (
  `sr_no` int(11) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `challan_no` varchar(10) NOT NULL,
  `material` varchar(255) NOT NULL,
  `qnty` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `paid` decimal(10,2) DEFAULT NULL,
  `balance` decimal(10,2) DEFAULT NULL,
  `total_in_words` text NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `challan_bills`
--

INSERT INTO `challan_bills` (`sr_no`, `customer_id`, `challan_no`, `material`, `qnty`, `rate`, `amount`, `total`, `paid`, `balance`, `total_in_words`, `created_on`) VALUES
(13, '1', 'CH001', 'ACID PAN,PAV FLAVOR', '1,2', '210.00,120.00', '210.00,240.00', '450', '0.00', '450.00', ' Four Hundred  Fifty', '2019-10-27 23:36:23'),
(14, '2', 'CH002', 'PAV FLAVOR,ACID PAN', '2,2', '120.00,210.00', '240.00,420.00', '660', '0.00', '660.00', ' Six Hundred  Sixty', '2019-10-27 23:49:08'),
(15, '2', 'CH003', 'ACID PAN,PAV FLAVOR', '1,2', '210.00,120.00', '210.00,240.00', '450', '0.00', '450.00', ' Four Hundred  Fifty', '2019-10-28 08:13:29'),
(16, '1', 'CH004', 'ACID PAN,PAV FLAVOR,PAV GHEE FLAVOR,MASKA BUTTER', '1,2,1,1', '210.00,120.00,70.00,90.00', '210.00,240.00,70.00,90.00', '610', '0.00', '610.00', ' Six Hundred Ten', '2019-10-28 08:27:03'),
(17, '2', 'CH005', 'ACID PAN,PAV GHEE FLAVOR', '1,2', '210.00,70.00', '210.00,140.00', '350', '0.00', '350.00', ' Three Hundred  Fifty', '2019-10-28 08:54:11'),
(18, '2', 'CH006', 'PAV GHEE FLAVOR', '2', '70.00', '140.00', '140', '0.00', '140.00', ' One Hundred  Forty', '2019-10-28 09:00:49'),
(19, '1', 'CH007', 'PAV FLAVOR', '1', '120.00', '120.00', '120', '0.00', '120.00', ' One Hundred  Twenty', '2019-10-28 09:05:52'),
(20, '1', 'CH008', 'PAV GHEE FLAVOR', '2', '70.00', '140.00', '140', '0.00', '140.00', ' One Hundred  Forty', '2019-10-28 09:06:42'),
(21, '1', 'CH009', 'ACID PAN', '2', '210.00', '420.00', '420', '0.00', '420.00', ' Four Hundred  Twenty', '2021-09-19 18:56:00');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `bakery_name` varchar(255) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `owner_phone` varchar(255) NOT NULL,
  `owner_email` varchar(255) NOT NULL,
  `bakery_gst` varchar(30) NOT NULL,
  `bakery_address` text NOT NULL,
  `bakery_area` varchar(255) NOT NULL,
  `bakery_city` varchar(255) NOT NULL,
  `last_amount` decimal(10,2) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `bakery_name`, `owner_name`, `owner_phone`, `owner_email`, `bakery_gst`, `bakery_address`, `bakery_area`, `bakery_city`, `last_amount`, `created_on`) VALUES
(1, 'SUNNY BAKER', 'PRAKASH', '9029579145', '', '1234AODPA123SE4', 'New Bombay, Chal No.12, Azad Agar', 'Kgn. Chowk Shanti Nagar', 'Bhiwandi', '300.00', '2019-10-12 16:34:03'),
(3, 'MINA', 'ZIYA', '9874563193', '', '', '', '', '', '0.00', '2021-09-22 15:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `customer_ledger_balance`
--

CREATE TABLE `customer_ledger_balance` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `hsn` varchar(100) NOT NULL,
  `batch_no` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `rate` varchar(150) NOT NULL,
  `invoice` varchar(20) DEFAULT NULL,
  `challan` varchar(20) DEFAULT NULL,
  `customer` int(11) NOT NULL,
  `last_amount` decimal(10,2) NOT NULL,
  `bill_amount` decimal(10,2) NOT NULL,
  `paid_amount` decimal(10,2) NOT NULL,
  `new_amount` decimal(10,2) NOT NULL,
  `payment_mode` varchar(20) NOT NULL,
  `transaction_no` varchar(100) NOT NULL,
  `cheque_no` varchar(10) NOT NULL,
  `dated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_ledger_balance`
--

INSERT INTO `customer_ledger_balance` (`id`, `product_name`, `hsn`, `batch_no`, `quantity`, `rate`, `invoice`, `challan`, `customer`, `last_amount`, `bill_amount`, `paid_amount`, `new_amount`, `payment_mode`, `transaction_no`, `cheque_no`, `dated`) VALUES
(2, 'ACID PAN,PAV FLAVOR', '1901,1901', 'BCA,ABC', '1,1', '50,120.00', NULL, 'ch12', 1, '700.00', '170.00', '200.00', '670.00', 'Cheque', '', '123456', '2019-10-19 22:07:20'),
(3, 'ACID PAN', '', '', '', '', NULL, NULL, 1, '670.00', '0.00', '270.00', '400.00', 'Cash', '', '', '2019-10-19 22:08:40'),
(4, '', '', '', '', '', NULL, NULL, 1, '400.00', '0.00', '100.00', '300.00', 'IMPS', 'sw3456', '', '2018-10-19 22:38:58'),
(5, 'PAV FLAVOR', '1901', 'ABC', '4', '50', 'AB123', NULL, 2, '620.00', '200.00', '100.00', '720.00', 'Cheque', '', '123456', '2019-10-19 22:54:51');

-- --------------------------------------------------------

--
-- Table structure for table `insider_bill`
--

CREATE TABLE `insider_bill` (
  `sr_no` int(11) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `buyer_gst` varchar(32) NOT NULL,
  `invoice_no` varchar(10) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `hsn` varchar(32) NOT NULL,
  `qnty` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `transport_charges` decimal(8,0) DEFAULT NULL,
  `other_charge` decimal(8,0) DEFAULT NULL,
  `total_taxable_amount` decimal(10,0) NOT NULL,
  `igst_5_cent` decimal(10,0) DEFAULT NULL,
  `cgst_2_5_cent` decimal(8,0) DEFAULT NULL,
  `sgst_2_5_cent` decimal(8,0) DEFAULT NULL,
  `total` decimal(10,0) NOT NULL,
  `round_off_total` decimal(10,0) NOT NULL,
  `total_in_words` text NOT NULL,
  `date_of_supply` varchar(255) NOT NULL,
  `place_of_supply` varchar(255) NOT NULL,
  `other_notes` tinytext NOT NULL,
  `paid` decimal(10,2) DEFAULT NULL,
  `balance` decimal(10,2) DEFAULT NULL,
  `invoice_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insider_bill`
--

INSERT INTO `insider_bill` (`sr_no`, `customer_id`, `customer_address`, `buyer_gst`, `invoice_no`, `product_name`, `hsn`, `qnty`, `rate`, `amount`, `transport_charges`, `other_charge`, `total_taxable_amount`, `igst_5_cent`, `cgst_2_5_cent`, `sgst_2_5_cent`, `total`, `round_off_total`, `total_in_words`, `date_of_supply`, `place_of_supply`, `other_notes`, `paid`, `balance`, `invoice_date`) VALUES
(11, '1', '', '', 'INV001', 'ACID PAN', '1901', '1', '571.43', '571.43', '0', '0', '571', '0', '0', '0', '571', '571', ' Five Hundred and Seventy One', '', '', '', '0.00', '571.00', '2019-10-14 09:06:32'),
(12, '2', '', '', 'INV002', 'ACID PAN,PAV FLAVOR', '1901,1901', '1,2', '210.00,120.00', '210.00,240.00', '0', '0', '450', '0', '11', '11', '473', '473', ' Four Hundred and Seventy Three', '', '', '', '0.00', '473.00', '2019-10-19 09:44:42'),
(13, '1', '', '', 'INV003', 'PAV FLAVOR', '1901', '1', '190.48', '190.48', '0', '0', '190', '0', '5', '5', '200', '200', ' Two Hundred ', '', '', '', '0.00', '200.00', '2019-10-28 09:10:54'),
(14, '2', '', '', 'INV004', 'PAV GHEE FLAVOR', '1901', '1', '190.48', '190.48', '10', '20', '220', '0', '6', '6', '232', '232', ' Two Hundred and Thirty Two', '', '', '', '0.00', '232.00', '2019-10-28 18:51:47'),
(15, '2', '', '', 'INV005', 'ACID PAN,PAV GHEE FLAVOR', '1901,1901', '2,1', '210.00,70.00', '420.00,70.00', '10', '20', '520', '0', '13', '13', '546', '546', ' Five Hundred and Forty Six', '2019-10-27', 'Bhiwandi', 'Thaks for business', '0.00', '546.00', '2019-10-28 18:57:30'),
(16, '1', '', '', 'INV006', 'ACID PAN', '1901', '2', '210.00', '420.00', '50', '0', '470', '85', '0', '0', '470', '470', ' Four Hundred  Seventy', '2021-09-20', '', '', '0.00', '470.00', '2021-09-19 18:27:33'),
(17, '1', '', '', 'INV007', 'SAD', '', '2', '60.00', '120.00', '50', '0', '170', '0', '0', '0', '170', '170', ' One Hundred  Seventy', '2021-09-21', '', '', '0.00', '170.00', '2021-09-22 22:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `ledger_balance`
--

CREATE TABLE `ledger_balance` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `paid` decimal(10,2) DEFAULT NULL,
  `balance` decimal(10,2) DEFAULT NULL,
  `updated_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ledger_balance`
--

INSERT INTO `ledger_balance` (`id`, `customer_id`, `product`, `quantity`, `rate`, `total`, `paid`, `balance`, `updated_date`) VALUES
(9, 1, 'PAV FLAVOR', 1, '120.00', '120.00', '0.00', '120.00', '2019-10-17'),
(8, 1, 'ACID PAN', 4, '210.00', '840.00', '300.00', '540.00', '2019-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `material_name` varchar(255) DEFAULT NULL,
  `hsn` varchar(255) DEFAULT NULL,
  `batch_no` varchar(255) DEFAULT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `rate` varchar(150) DEFAULT NULL,
  `invoice` varchar(50) DEFAULT NULL,
  `challan` varchar(40) DEFAULT NULL,
  `vendor` varchar(100) NOT NULL,
  `last_amount` decimal(10,2) DEFAULT NULL,
  `bill_amount` decimal(10,2) DEFAULT NULL,
  `paid_amount` decimal(10,2) DEFAULT NULL,
  `new_amount` decimal(10,2) DEFAULT NULL,
  `pay_mode` varchar(20) NOT NULL,
  `transaction_no` varchar(100) DEFAULT NULL,
  `cheque_no` varchar(10) DEFAULT NULL,
  `buy_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `material_name`, `hsn`, `batch_no`, `quantity`, `rate`, `invoice`, `challan`, `vendor`, `last_amount`, `bill_amount`, `paid_amount`, `new_amount`, `pay_mode`, `transaction_no`, `cheque_no`, `buy_date`) VALUES
(11, 'APPLE,BOY', '1901,1901', 'ABC,BCA', '2,1', '120.00,210.00', 'AB123', 'ch12', '10', '1000.00', '330.00', '500.00', '830.00', 'Cash', '', '', '2019-10-15 02:40:59'),
(12, '', '', '', '', '', NULL, NULL, '10', '830.00', '0.00', '130.00', '700.00', 'Cheque', '', '123456', '2019-10-15 02:41:50'),
(13, 'BOY,CAT', '123,1901', 'BCA,BCA', '1,2', '100,150', 'AB4321', NULL, '9', '123.50', '400.00', '23.00', '500.50', 'Cash', '', '', '2019-10-19 03:50:25');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `weight` decimal(10,3) DEFAULT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `prod_exp` date DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `weight`, `unit_price`, `price`, `prod_exp`, `create_date`) VALUES
(5, 'ACID PAN', '1.000', '210.00', '210.00', NULL, '2019-10-12 16:14:32'),
(4, 'PAV FLAVOR', '1.000', '120.00', '120.00', NULL, '2019-10-09 02:46:04'),
(6, 'PAV GHEE FLAVOR', '1.000', '70.00', '70.00', NULL, '2019-10-28 02:55:53'),
(7, 'MASKA BUTTER', '1.000', '90.00', '90.00', NULL, '2019-10-28 02:56:18'),
(9, 'SAD', '55.000', '3.00', '165.00', '0000-00-00', '2021-09-22 16:26:19'),
(10, 'DFDSF', '55.000', '3.00', '165.00', '2021-09-24', '2021-09-22 16:56:33'),
(11, 'TEST PRODUCT', '100.000', '95.00', '9500.00', '2021-09-25', '2021-09-25 08:18:44'),
(12, 'TEST PRODUCT 2', '15.000', '1000.00', '15000.00', '2021-09-26', '2021-09-25 08:26:23'),
(18, 'STOCK PRODUCT TEST22', '100.000', '100.00', '10000.00', '2021-09-25', '2021-09-25 10:55:48'),
(17, 'STOCK PRODUCT FINAL', '100.000', '100.00', '10000.00', '2021-09-28', '2021-09-25 10:54:28'),
(16, 'STOCK PRODUCT TEST211', '100.000', '1000.00', '100000.00', '2021-09-30', '2021-09-25 10:53:13');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `stock_qty` int(11) NOT NULL,
  `purchase_rate` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `product_id`, `stock_qty`, `purchase_rate`, `created_at`) VALUES
(1, 0, 1000, 1000, '2021-09-25 10:53:13'),
(2, 0, 10, 100, '2021-09-25 10:54:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `last_login`) VALUES
(1, 'labbaik', 'bakery123', '2018-04-11 09:39:58'),
(2, 'asad', '12345678', '2021-09-19 14:00:20'),
(3, 'Mateen', 'Mat@123', '2021-09-19 14:01:24');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `vendor_id` int(11) NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `area` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `phone1` varchar(10) NOT NULL,
  `phone2` varchar(10) NOT NULL,
  `email1` varchar(150) NOT NULL,
  `email2` varchar(150) NOT NULL,
  `gst` varchar(20) NOT NULL,
  `pan` varchar(12) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `bank_branch` varchar(150) NOT NULL,
  `account_number` varchar(20) NOT NULL,
  `rtgs_ifsc` varchar(30) NOT NULL,
  `debit_balance` decimal(10,2) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`vendor_id`, `vendor_name`, `contact_name`, `address`, `area`, `city`, `phone1`, `phone2`, `email1`, `email2`, `gst`, `pan`, `bank_name`, `bank_branch`, `account_number`, `rtgs_ifsc`, `debit_balance`, `date_added`) VALUES
(10, 'ANKIT GRAIN', 'pawan', '701 / 702 , Karishma Plaza Commercial Premises', '7th Floor, Above Shamrao Vithal Bank, Near Asha Gen. Hospital,', 'malad east mumbai', '9320546953', '', '', 'info@hkgroup.net', '123454321234567', 'AODPA8487Q', 'HDFC BANK', 'malad east mumbai', '0228467121', '', '700.00', '2019-10-09 07:59:08'),
(9, 'H. K. ENZYMES', 'Piyush Doshi', '701 / 702 , Karishma Plaza Commercial Premises', '7th Floor, Above Shamrao Vithal Bank, Near Asha Gen. Hospital,', 'malad east mumbai', '0222866765', '', '', 'info@hkgroup.net', '27AABCH5271J1ZG', 'AODPA8487Q', 'HDFC BANK', 'malad east mumbai', '0228467121', 'HDFC0123', '500.50', '2019-10-09 07:54:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `challan_bills`
--
ALTER TABLE `challan_bills`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_ledger_balance`
--
ALTER TABLE `customer_ledger_balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insider_bill`
--
ALTER TABLE `insider_bill`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `ledger_balance`
--
ALTER TABLE `ledger_balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `challan_bills`
--
ALTER TABLE `challan_bills`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_ledger_balance`
--
ALTER TABLE `customer_ledger_balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `insider_bill`
--
ALTER TABLE `insider_bill`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ledger_balance`
--
ALTER TABLE `ledger_balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
