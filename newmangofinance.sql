-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 17, 2020 at 10:09 PM
-- Server version: 5.7.29-0ubuntu0.16.04.1
-- PHP Version: 7.2.11-4+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `prefix_employee`
--

CREATE TABLE `prefix_employee` (
  `id` int(11) NOT NULL,
  `fk_users_id` int(11) NOT NULL,
  `empl_no` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `empl_name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `empl_dob` int(11) DEFAULT NULL,
  `emplsex_id` int(11) NOT NULL,
  `emplmarried_id` int(11) NOT NULL,
  `empl_position` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `empl_salary` int(11) DEFAULT NULL,
  `empl_address` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `empl_phone` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `empl_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `empl_in` int(11) DEFAULT NULL,
  `empl_out` int(11) DEFAULT NULL,
  `empl_lastupd` int(11) DEFAULT NULL,
  `empl_active` int(1) NOT NULL DEFAULT '0',
  `empl_pic` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8_bin NOT NULL DEFAULT '1',
  `dels` enum('0','1') COLLATE utf8_bin NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `prefix_usergroups`
--

CREATE TABLE `prefix_usergroups` (
  `id` int(11) NOT NULL,
  `groupname` varchar(50) DEFAULT NULL,
  `permission_admin` int(11) NOT NULL DEFAULT '0',
  `permission_delete` int(11) NOT NULL DEFAULT '0',
  `permission_report` int(11) NOT NULL DEFAULT '0',
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `fk_users_id` int(11) NOT NULL,
  `dels` enum('1','0') NOT NULL DEFAULT '0',
  `cdate` int(15) NOT NULL,
  `mdate` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prefix_usergroups`
--

INSERT INTO `prefix_usergroups` (`id`, `groupname`, `permission_admin`, `permission_delete`, `permission_report`, `status`, `fk_users_id`, `dels`, `cdate`, `mdate`) VALUES
(1, 'admin', 1, 1, 1, '1', 0, '0', 0, 0),
(2, 'Management', 0, 0, 0, '0', 0, '0', 0, 0),
(3, 'Employee', 0, 0, 0, '0', 0, '0', 0, 0),
(4, 'Ext-Admin', 0, 0, 0, '0', 0, '0', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prefix_users`
--

CREATE TABLE `prefix_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `fk_employees_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fk_usergroups_id` int(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `pwdresetdate` datetime NOT NULL,
  `dels` enum('0','1') NOT NULL DEFAULT '0',
  `cdate` int(11) NOT NULL,
  `mdate` int(11) NOT NULL,
  `devicetoken` varchar(2500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prefix_users`
--

INSERT INTO `prefix_users` (`id`, `fullname`, `fk_employees_id`, `username`, `password`, `fk_usergroups_id`, `status`, `pwdresetdate`, `dels`, `cdate`, `mdate`, `devicetoken`) VALUES
(1, 'admin', 0, 'admin', '373e615ce10a76ade195d57ce541b82e', 1, '1', '0000-00-00 00:00:00', '0', 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prefix_employee`
--
ALTER TABLE `prefix_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prefix_usergroups`
--
ALTER TABLE `prefix_usergroups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prefix_users`
--
ALTER TABLE `prefix_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prefix_employee`
--
ALTER TABLE `prefix_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prefix_usergroups`
--
ALTER TABLE `prefix_usergroups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `prefix_users`
--
ALTER TABLE `prefix_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
