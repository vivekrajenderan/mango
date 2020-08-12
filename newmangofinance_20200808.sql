-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2020 at 04:00 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newmangofinance`
--

-- --------------------------------------------------------

--
-- Table structure for table `financecustomer`
--

CREATE TABLE `financecustomer` (
  `id` int(11) NOT NULL,
  `cusreferenceno` varchar(250) DEFAULT NULL,
  `cusname` varchar(250) DEFAULT NULL,
  `cusdob` date DEFAULT NULL,
  `cussex` enum('male','female','others') DEFAULT 'male',
  `cusaddress` varchar(500) DEFAULT NULL,
  `cusmobileno` varchar(11) DEFAULT NULL,
  `cusemail` varchar(11) DEFAULT NULL,
  `occup` varchar(150) DEFAULT NULL,
  `aadhar` varchar(20) DEFAULT NULL,
  `pan` varchar(20) DEFAULT NULL,
  `drivinglicence` varchar(20) DEFAULT NULL,
  `accountno` varchar(30) DEFAULT NULL,
  `aadhardocument` varchar(500) DEFAULT NULL,
  `dldocument` varchar(500) DEFAULT NULL,
  `regioncolor` varchar(10) NOT NULL,
  `profile` varchar(500) NOT NULL,
  `createdby` int(11) DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL,
  `status` enum('0','1') DEFAULT '1',
  `dels` enum('0','1') DEFAULT '0',
  `cdate` int(15) DEFAULT NULL,
  `mdate` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `financedocprefix`
--

CREATE TABLE `financedocprefix` (
  `id` int(11) NOT NULL,
  `doctype` enum('employee','customer','loan','agent','bill') NOT NULL DEFAULT 'employee',
  `prefix` varchar(15) NOT NULL,
  `start` int(255) NOT NULL DEFAULT 1000,
  `current` int(255) NOT NULL DEFAULT 1000,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `fk_users_id` int(11) NOT NULL,
  `dels` enum('1','0') NOT NULL DEFAULT '0',
  `cdate` int(15) NOT NULL,
  `mdate` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `financedocprefix`
--

INSERT INTO `financedocprefix` (`id`, `doctype`, `prefix`, `start`, `current`, `status`, `fk_users_id`, `dels`, `cdate`, `mdate`) VALUES
(1, 'customer', 'CUSTOMER', 0, 1, '1', 0, '0', 1554959938, 1596884440),
(2, 'employee', 'EMPLOYEE', 0, 1, '1', 0, '0', 1554959938, 1590852414),
(3, 'loan', 'LOAN', 0, 1, '1', 0, '0', 1554959938, 1595506387),
(4, 'agent', 'AGNT', 0, 1, '1', 0, '0', 1554959938, 1596884492),
(5, 'bill', 'BILL', 0, 1, '1', 0, '0', 1554959938, 1596875182);

-- --------------------------------------------------------

--
-- Table structure for table `financeemployee`
--

CREATE TABLE `financeemployee` (
  `id` int(11) NOT NULL,
  `fk_users_id` int(11) NOT NULL,
  `empno` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `empname` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `emp_type` enum('employee','agent') COLLATE utf8_bin NOT NULL DEFAULT 'employee',
  `dob` date DEFAULT NULL,
  `emplsex` enum('male','female','others') COLLATE utf8_bin NOT NULL DEFAULT 'male',
  `fk_maritalstatus_id` int(11) NOT NULL,
  `position` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `salary` decimal(10,5) DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `empin` datetime DEFAULT NULL,
  `empout` int(11) DEFAULT NULL,
  `empl_lastupd` int(11) DEFAULT NULL,
  `profileimage` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8_bin NOT NULL DEFAULT '1',
  `dels` enum('0','1') COLLATE utf8_bin NOT NULL DEFAULT '0',
  `cdate` int(15) NOT NULL,
  `mdate` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `financeloan`
--

CREATE TABLE `financeloan` (
  `id` int(11) NOT NULL,
  `loanreferenceno` varchar(250) DEFAULT NULL,
  `fk_customer_id` int(11) DEFAULT NULL,
  `fk_employee_id` int(11) DEFAULT NULL COMMENT 'Agent ID',
  `fk_vechicle_id` int(11) DEFAULT NULL,
  `requestdate` date DEFAULT NULL,
  `approveddate` date DEFAULT NULL,
  `activateddate` date DEFAULT NULL,
  `originalloanamount` decimal(15,2) DEFAULT 0.00,
  `totalemiamount` decimal(15,2) DEFAULT 0.00,
  `commission` decimal(5,2) NOT NULL DEFAULT 0.00,
  `loanperiod` int(11) DEFAULT NULL,
  `loanperiodfrequency` enum('month','year','days') DEFAULT 'month',
  `loanintrestrate` decimal(5,2) DEFAULT 0.00,
  `security1name` varchar(250) DEFAULT NULL,
  `security1aadhar` varchar(25) DEFAULT NULL,
  `security1mobileno` varchar(11) DEFAULT NULL,
  `security1profile` varchar(500) NOT NULL,
  `security2name` varchar(250) DEFAULT NULL,
  `security2aadhar` varchar(25) DEFAULT NULL,
  `security2mobileno` varchar(11) DEFAULT NULL,
  `nextduedate` date DEFAULT NULL,
  `loanstatus` enum('pending','approved','cleared','vechile_cheased') DEFAULT 'pending',
  `approveddocument` varchar(500) DEFAULT NULL,
  `cheasedreason` varchar(500) DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL,
  `status` enum('0','1') DEFAULT '1',
  `dels` enum('0','1') DEFAULT '0',
  `cdate` int(15) DEFAULT NULL,
  `mdate` int(15) DEFAULT NULL,
  `emiamount` decimal(15,2) NOT NULL,
  `lastduedate` date DEFAULT NULL,
  `payment_count` int(11) NOT NULL DEFAULT 0,
  `late_payment_count` int(11) NOT NULL DEFAULT 0,
  `document_charge` decimal(15,2) NOT NULL,
  `agent_charge` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `financeloanpayment`
--

CREATE TABLE `financeloanpayment` (
  `id` int(11) NOT NULL,
  `fk_customer_id` int(11) DEFAULT NULL,
  `fk_vechicle_id` int(11) DEFAULT NULL,
  `fk_loan_id` int(11) DEFAULT NULL,
  `billreferenceno` varchar(250) NOT NULL,
  `dateduepaid` date DEFAULT NULL,
  `dateofpaid` date DEFAULT NULL,
  `fineintrest` decimal(5,2) DEFAULT 0.00,
  `fineamount` decimal(15,2) DEFAULT 0.00,
  `subamount` decimal(15,2) DEFAULT 0.00,
  `amount` decimal(15,2) DEFAULT 0.00,
  `preemi` int(11) NOT NULL DEFAULT 0,
  `createdby` int(11) DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `dels` int(11) DEFAULT 0,
  `createdate` datetime DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `financemaritalstatus`
--

CREATE TABLE `financemaritalstatus` (
  `id` int(11) NOT NULL,
  `statusname` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8_bin NOT NULL DEFAULT '1',
  `dels` enum('0','1') COLLATE utf8_bin NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `financemaritalstatus`
--

INSERT INTO `financemaritalstatus` (`id`, `statusname`, `status`, `dels`) VALUES
(1, 'Single', '1', '0'),
(2, 'Married', '1', '0'),
(3, 'Widowed', '1', '0'),
(4, 'Divorced', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `financeoveralltransaction`
--

CREATE TABLE `financeoveralltransaction` (
  `id` int(11) NOT NULL,
  `fk_customer_id` int(11) DEFAULT 0,
  `fk_loan_id` int(11) DEFAULT 0,
  `fk_loan_payment_id` int(11) DEFAULT 0,
  `acctype` enum('income','expense') DEFAULT NULL,
  `transdate` datetime DEFAULT current_timestamp(),
  `transamount` decimal(15,2) DEFAULT 0.00,
  `refno` varchar(250) DEFAULT NULL,
  `transtext` mediumtext DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL,
  `status` enum('0','1') DEFAULT '1',
  `dels` enum('0','1') DEFAULT '0',
  `cdate` int(15) DEFAULT NULL,
  `mdate` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `financesettings`
--

CREATE TABLE `financesettings` (
  `id` int(11) NOT NULL,
  `fine_percentage` decimal(15,2) NOT NULL,
  `fine_days` int(11) NOT NULL,
  `document_charge` decimal(5,2) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `dels` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `financesettings`
--

INSERT INTO `financesettings` (`id`, `fine_percentage`, `fine_days`, `document_charge`, `status`, `dels`) VALUES
(1, '1.00', 10, '0.00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `financetax`
--

CREATE TABLE `financetax` (
  `id` int(11) NOT NULL,
  `taxname` varchar(100) NOT NULL,
  `percentage` varchar(10) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `dels` enum('0','1') NOT NULL DEFAULT '0',
  `cdate` int(15) NOT NULL,
  `mdate` int(15) NOT NULL,
  `uby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `financetax`
--

INSERT INTO `financetax` (`id`, `taxname`, `percentage`, `status`, `dels`, `cdate`, `mdate`, `uby`) VALUES
(6, 'Accessories', '5', '1', '0', 1559325575, 1559326505, 1),
(7, 'GST', '5', '1', '0', 1559325846, 1559382956, 1),
(8, 'GST Schedule', '5', '1', '0', 1559394056, 1559394331, 26679),
(9, 'GST Party', '5', '1', '0', 1559394133, 1559394133, 26679),
(10, 'PayoutGST', '5', '1', '0', 1560856494, 1560856494, 26689);

-- --------------------------------------------------------

--
-- Table structure for table `financeusergroups`
--

CREATE TABLE `financeusergroups` (
  `id` int(11) NOT NULL,
  `groupname` varchar(50) DEFAULT NULL,
  `padmin` int(11) NOT NULL DEFAULT 0,
  `pdelete` int(11) NOT NULL DEFAULT 0,
  `preport` int(11) NOT NULL DEFAULT 0,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `fk_users_id` int(11) NOT NULL,
  `dels` enum('1','0') NOT NULL DEFAULT '0',
  `cdate` int(15) NOT NULL,
  `mdate` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `financeusergroups`
--

INSERT INTO `financeusergroups` (`id`, `groupname`, `padmin`, `pdelete`, `preport`, `status`, `fk_users_id`, `dels`, `cdate`, `mdate`) VALUES
(1, 'admin', 1, 1, 1, '1', 0, '0', 0, 0),
(2, 'Management', 0, 0, 0, '0', 0, '0', 0, 0),
(3, 'Employee', 0, 0, 0, '0', 1, '0', 0, 0),
(4, 'Ext-Admin', 0, 0, 0, '0', 0, '0', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `financeusers`
--

CREATE TABLE `financeusers` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `fk_employee_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fk_usergroups_id` int(255) NOT NULL,
  `fk_users_id` int(11) NOT NULL DEFAULT 0,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `pwdresetdate` datetime NOT NULL,
  `dels` enum('0','1') NOT NULL DEFAULT '0',
  `cdate` int(11) NOT NULL,
  `mdate` int(11) NOT NULL,
  `devicetoken` varchar(2500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `financeusers`
--

INSERT INTO `financeusers` (`id`, `fullname`, `fk_employee_id`, `username`, `password`, `fk_usergroups_id`, `fk_users_id`, `status`, `pwdresetdate`, `dels`, `cdate`, `mdate`, `devicetoken`) VALUES
(1, 'admin', 0, 'admin', 'UEIXRVNswNXlg+vbGbx3mA==', 1, 0, '1', '0000-00-00 00:00:00', '0', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `financevechicle`
--

CREATE TABLE `financevechicle` (
  `id` int(11) NOT NULL,
  `fk_customer_id` int(11) DEFAULT NULL,
  `vechilenumber` varchar(100) DEFAULT NULL,
  `vechilename` varchar(100) DEFAULT NULL,
  `vechilemodelyear` varchar(100) DEFAULT NULL,
  `vechilemanufectureyear` varchar(100) DEFAULT NULL,
  `vechilechessisno` varchar(100) DEFAULT NULL,
  `vechileinsurenceno` varchar(100) DEFAULT NULL,
  `vechileinsurenseduedate` varchar(100) DEFAULT NULL,
  `vechileinsurensestartdate` varchar(100) NOT NULL,
  `vechileenginetype` varchar(100) DEFAULT NULL,
  `rcdocument` varchar(500) DEFAULT NULL,
  `insurencedocument` varchar(500) DEFAULT NULL,
  `ischessed` int(11) DEFAULT 0,
  `chesseddate` date DEFAULT NULL,
  `chessedagainstloanid` int(11) DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL,
  `status` enum('0','1') DEFAULT '1',
  `dels` enum('0','1') DEFAULT '0',
  `cdate` int(15) DEFAULT NULL,
  `mdate` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `financecustomer`
--
ALTER TABLE `financecustomer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financedocprefix`
--
ALTER TABLE `financedocprefix`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financeemployee`
--
ALTER TABLE `financeemployee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financeloan`
--
ALTER TABLE `financeloan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financeloanpayment`
--
ALTER TABLE `financeloanpayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financemaritalstatus`
--
ALTER TABLE `financemaritalstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financeoveralltransaction`
--
ALTER TABLE `financeoveralltransaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financesettings`
--
ALTER TABLE `financesettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financetax`
--
ALTER TABLE `financetax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financeusergroups`
--
ALTER TABLE `financeusergroups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financeusers`
--
ALTER TABLE `financeusers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `financevechicle`
--
ALTER TABLE `financevechicle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `financecustomer`
--
ALTER TABLE `financecustomer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `financedocprefix`
--
ALTER TABLE `financedocprefix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `financeemployee`
--
ALTER TABLE `financeemployee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `financeloan`
--
ALTER TABLE `financeloan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `financeloanpayment`
--
ALTER TABLE `financeloanpayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `financemaritalstatus`
--
ALTER TABLE `financemaritalstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `financeoveralltransaction`
--
ALTER TABLE `financeoveralltransaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `financesettings`
--
ALTER TABLE `financesettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `financetax`
--
ALTER TABLE `financetax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `financeusergroups`
--
ALTER TABLE `financeusergroups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `financeusers`
--
ALTER TABLE `financeusers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `financevechicle`
--
ALTER TABLE `financevechicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
