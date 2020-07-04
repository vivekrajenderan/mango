-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2020 at 10:19 PM
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
  `createdby` int(11) DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL,
  `status` enum('0','1') DEFAULT '1',
  `dels` enum('0','1') DEFAULT '0',
  `cdate` int(15) DEFAULT NULL,
  `mdate` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `financecustomer`
--

INSERT INTO `financecustomer` (`id`, `cusreferenceno`, `cusname`, `cusdob`, `cussex`, `cusaddress`, `cusmobileno`, `cusemail`, `occup`, `aadhar`, `pan`, `drivinglicence`, `accountno`, `aadhardocument`, `dldocument`, `createdby`, `updatedby`, `status`, `dels`, `cdate`, `mdate`) VALUES
(1, 'CUSTOMER1001', 'vivek', '2020-05-05', 'female', 'fdsshshshahshgshshshshsgssgssg sgsgsghsgshsh', '6578585856', 'vivek@gmail', 'agag', '54747476666.00', '43563', '97070777', '4536743674747474', '1590411387-aadhardocument.png', NULL, NULL, 1, '1', '0', NULL, NULL),
(2, 'CUSTOMER1002', 'webs', '2020-07-05', 'female', 'sh shs shsh', '6578585655', 'fshs@gmail.', 'coolie', '436363636363.00', 'RAGAG', 'LI898', '54444444747', '1590411948-aadhardocument.png', NULL, NULL, 1, '1', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `financedocprefix`
--

CREATE TABLE `financedocprefix` (
  `id` int(11) NOT NULL,
  `doctype` enum('employee','customer','loan') NOT NULL DEFAULT 'employee',
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
(1, 'customer', 'CUSTOMER', 1000, 1003, '1', 0, '0', 1554959938, 1590411948),
(2, 'employee', 'EMPLOYEE', 1000, 1007, '1', 0, '0', 1554959938, 1590852414),
(3, 'loan', 'LOAN', 1000, 1005, '1', 0, '0', 1554959938, 1590933123);

-- --------------------------------------------------------

--
-- Table structure for table `financeemployee`
--

CREATE TABLE `financeemployee` (
  `id` int(11) NOT NULL,
  `fk_users_id` int(11) NOT NULL,
  `empno` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `empname` varchar(100) COLLATE utf8_bin DEFAULT NULL,
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

--
-- Dumping data for table `financeemployee`
--

INSERT INTO `financeemployee` (`id`, `fk_users_id`, `empno`, `empname`, `dob`, `emplsex`, `fk_maritalstatus_id`, `position`, `salary`, `address`, `phone`, `email`, `empin`, `empout`, `empl_lastupd`, `profileimage`, `status`, `dels`, `cdate`, `mdate`) VALUES
(1, 1, 'EMPLOYEE1003', 'vvjfjfq', '2020-01-04', 'male', 1, '', '43454.58000', 'jhg jkggk k g', '9999999999', '', '2020-04-18 22:41:39', NULL, NULL, '1587229899-profileimage.jpg', '1', '0', 0, 0),
(2, 1, 'EMPLOYEE1004', 'Prabha', '2010-07-07', 'male', 1, 'Head Manager', '59000.00000', '19th, cross street, Main road, Madurai', '9436363636', 'prabha@gmail.com', '2020-04-19 11:39:19', NULL, NULL, '1587278386-profileimage.jpg', '1', '1', 0, 0),
(3, 1, 'EMPLOYEE1005', 'Pandikumar', '0000-00-00', 'male', 1, '', '887.00000', 'jhgfjk fk fj hgd fd', '9999999998', '', '2020-04-19 12:18:23', NULL, NULL, '1587278940-profileimage.jpg', '1', '0', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `financeloan`
--

CREATE TABLE `financeloan` (
  `id` int(11) NOT NULL,
  `loanreferenceno` varchar(250) DEFAULT NULL,
  `fk_customer_id` int(11) DEFAULT NULL,
  `fk_vechicle_id` int(11) DEFAULT NULL,
  `requestdate` date DEFAULT NULL,
  `approveddate` date DEFAULT NULL,
  `activateddate` date DEFAULT NULL,
  `originalloanamount` decimal(15,2) DEFAULT 0.00,
  `approvedamount` decimal(15,2) DEFAULT 0.00,
  `loanperiod` int(11) DEFAULT NULL,
  `loanperiodfrequency` enum('month','year','days') DEFAULT NULL,
  `loanintrestrate` decimal(5,2) DEFAULT 0.00,
  `security1name` varchar(250) DEFAULT NULL,
  `security1aadhar` varchar(25) DEFAULT NULL,
  `security1mobileno` varchar(11) DEFAULT NULL,
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
  `late_payment_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `financeloan`
--

INSERT INTO `financeloan` (`id`, `loanreferenceno`, `fk_customer_id`, `fk_vechicle_id`, `requestdate`, `approveddate`, `activateddate`, `originalloanamount`, `approvedamount`, `loanperiod`, `loanperiodfrequency`, `loanintrestrate`, `security1name`, `security1aadhar`, `security1mobileno`, `security2name`, `security2aadhar`, `security2mobileno`, `nextduedate`, `loanstatus`, `approveddocument`, `cheasedreason`, `createdby`, `updatedby`, `status`, `dels`, `cdate`, `mdate`, `emiamount`, `lastduedate`, `payment_count`, `late_payment_count`) VALUES
(1, 'LOAN1003', 1, 1, '2020-05-31', '2020-05-31', '2020-05-31', '16000.00', '16000.00', 3, 'month', '8.50', 'Test', '1425885', '3453453455', '', '', '', '2020-08-01', 'approved', NULL, NULL, 1, 1590931074, '1', '0', 1590916681, 1, '5410.00', '2020-08-31', 0, 0),
(2, 'LOAN1004', 2, 2, '2020-05-31', '2020-05-31', '2020-05-31', '10000.00', '10000.00', 5, 'month', '12.00', 'pandi', '112222211111', '7485963210', '', '', '', '2020-07-01', 'approved', NULL, NULL, 1, NULL, '1', '0', 1590933123, 1590933123, '2061.00', '2020-10-31', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `financeloanpayment`
--

CREATE TABLE `financeloanpayment` (
  `id` int(11) NOT NULL,
  `fk_customer_id` int(11) DEFAULT NULL,
  `fk_vechicle_id` int(11) DEFAULT NULL,
  `fk_loan_id` int(11) DEFAULT NULL,
  `dateduepaid` date DEFAULT NULL,
  `dateofpaid` date DEFAULT NULL,
  `fineintrest` decimal(5,2) DEFAULT 0.00,
  `fineamount` decimal(15,2) DEFAULT 0.00,
  `subamount` decimal(15,2) DEFAULT 0.00,
  `amount` decimal(15,2) DEFAULT 0.00,
  `createdby` int(11) DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `dels` int(11) DEFAULT 0,
  `createdate` datetime DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `financeloanpayment`
--

INSERT INTO `financeloanpayment` (`id`, `fk_customer_id`, `fk_vechicle_id`, `fk_loan_id`, `dateduepaid`, `dateofpaid`, `fineintrest`, `fineamount`, `subamount`, `amount`, `createdby`, `updatedby`, `status`, `dels`, `createdate`, `updatedate`) VALUES
(1, 1, 1, 1, '2020-07-01', '2020-05-31', '1.00', '54.10', '5410.00', '5464.10', NULL, NULL, 1, 0, NULL, NULL);

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

--
-- Dumping data for table `financeoveralltransaction`
--

INSERT INTO `financeoveralltransaction` (`id`, `fk_customer_id`, `fk_loan_id`, `fk_loan_payment_id`, `acctype`, `transdate`, `transamount`, `refno`, `transtext`, `createdby`, `updatedby`, `status`, `dels`, `cdate`, `mdate`) VALUES
(1, 0, 0, 0, 'income', '2020-04-01 20:04:58', '4366.00', '54d43', '4hshshfds fga', 1, 1, '1', '0', NULL, NULL),
(2, 0, 0, 0, 'expense', '2020-04-29 20:14:43', '545.00', 'djdjj', 'jdj', 1, 1, '1', '0', NULL, NULL),
(3, 0, 0, 0, 'income', '2020-05-27 11:34:10', '35.00', 'REFA343', 'agaga', 1, 1, '1', '0', NULL, NULL),
(4, 0, 0, 0, 'expense', '2020-05-25 12:34:17', '50.02', 'RAG3332', 'gagaga', 1, 1, '1', '0', NULL, NULL),
(5, 0, 0, 0, 'expense', '2020-05-28 12:40:50', '23.04', 'sfdgag', 'agag', 1, 1, '1', '0', NULL, NULL),
(6, 0, 0, 0, 'expense', '2020-05-28 12:41:00', '455.00', 'sgsg', 'gaga', 1, 1, '1', '0', NULL, NULL),
(7, 0, 0, 0, 'expense', '2020-05-28 12:41:11', '65.50', '43sghghaa', 'sgag', 1, 1, '1', '0', NULL, NULL),
(8, 0, 0, 0, 'income', '2020-05-28 12:41:24', '87.98', 'Et436yh', 'shshs', 1, 1, '1', '0', NULL, NULL),
(9, 0, 0, 0, 'income', '2020-05-28 14:11:12', '20.23', 'RAGA', 'ghahah', 1, 1, '1', '0', NULL, NULL),
(10, 1, 1, 1, 'income', '2020-05-31 22:06:26', '5410.00', 'LOAN1003', 'Loan Repayment', 1, 1, '1', '0', NULL, NULL),
(11, 1, 1, 1, 'income', '2020-05-31 22:06:26', '54.10', 'LOAN1003', 'Fine Amount', 1, 1, '1', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `financesettings`
--

CREATE TABLE `financesettings` (
  `id` int(11) NOT NULL,
  `fine_percentage` decimal(15,2) NOT NULL,
  `fine_days` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `dels` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `financesettings`
--

INSERT INTO `financesettings` (`id`, `fine_percentage`, `fine_days`, `status`, `dels`) VALUES
(1, '1.00', 10, 1, 0);

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
(3, 'Employee', 0, 0, 0, '0', 0, '0', 0, 0),
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
(1, 'admin', 0, 'admin', 'UEIXRVNswNXlg+vbGbx3mA==', 1, 0, '1', '0000-00-00 00:00:00', '0', 0, 0, ''),
(2, 'welcome', 1, 'testuser', 'P/cMYLgsnbWje12UFNmZhg==', 2, 1, '1', '0000-00-00 00:00:00', '0', 0, 0, '');

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
  `vechilemodel` varchar(100) DEFAULT NULL,
  `vechilercno` varchar(100) DEFAULT NULL,
  `vechileinsurenceno` varchar(100) DEFAULT NULL,
  `vechileinsurenseduedate` varchar(100) DEFAULT NULL,
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
-- Dumping data for table `financevechicle`
--

INSERT INTO `financevechicle` (`id`, `fk_customer_id`, `vechilenumber`, `vechilename`, `vechilemodelyear`, `vechilemodel`, `vechilercno`, `vechileinsurenceno`, `vechileinsurenseduedate`, `vechileenginetype`, `rcdocument`, `insurencedocument`, `ischessed`, `chesseddate`, `chessedagainstloanid`, `createdby`, `updatedby`, `status`, `dels`, `cdate`, `mdate`) VALUES
(1, 1, 'TN67J8900', 'Honda', '2020', '', '748596', '', '', '', '1590916681-rcdocument.jpg', NULL, 0, NULL, NULL, 1, 1590931074, '1', '0', 1590916681, 1),
(2, 2, 'Hero', 'Tn66J5885', '2009', '', 'RVC00001', '', '', '', '1590933122-rcdocument.jpg', NULL, 0, NULL, NULL, 1, NULL, '1', '0', 1590933123, 1590933123);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `financedocprefix`
--
ALTER TABLE `financedocprefix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `financeemployee`
--
ALTER TABLE `financeemployee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `financeloan`
--
ALTER TABLE `financeloan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `financeloanpayment`
--
ALTER TABLE `financeloanpayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `financemaritalstatus`
--
ALTER TABLE `financemaritalstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `financeoveralltransaction`
--
ALTER TABLE `financeoveralltransaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `financevechicle`
--
ALTER TABLE `financevechicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
