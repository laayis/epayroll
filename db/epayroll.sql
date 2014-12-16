-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2014 at 02:36 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `epayroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `allowances`
--

CREATE TABLE IF NOT EXISTS `allowances` (
  `allowances_id` int(11) NOT NULL AUTO_INCREMENT,
  `allowances_type` varchar(100) NOT NULL,
  `allowances_amount` double NOT NULL,
  PRIMARY KEY (`allowances_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `date` date NOT NULL,
  `emp_id` int(11) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `logout_time` datetime(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `ip_address` varchar(100) NOT NULL,
  `note` varchar(500) NOT NULL,
  PRIMARY KEY (`date`),
  UNIQUE KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `basic_salary`
--

CREATE TABLE IF NOT EXISTS `basic_salary` (
  `basic_salary_id` int(11) NOT NULL AUTO_INCREMENT,
  `grade_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `basic_salary_amount` varchar(100) NOT NULL,
  PRIMARY KEY (`basic_salary_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `deduction`
--

CREATE TABLE IF NOT EXISTS `deduction` (
  `deduction_id` int(11) NOT NULL AUTO_INCREMENT,
  `deduction_amount` double NOT NULL,
  `deduction_type` varchar(50) NOT NULL,
  PRIMARY KEY (`deduction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(50) NOT NULL,
  `department_code` varchar(50) NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `department_code`) VALUES
(1, 'asdlfj', 'alsdjf'),
(2, 'asdlkfja;l', 'lasdjf');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
  `designation_id` int(11) NOT NULL AUTO_INCREMENT,
  `designation_name` varchar(100) NOT NULL,
  PRIMARY KEY (`designation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`designation_id`, `designation_name`) VALUES
(1, 'asdf');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `marital_status` enum('Married','Single') NOT NULL,
  `probation_status` enum('Internship','Permanent') NOT NULL,
  `department_name` varchar(20) NOT NULL,
  `designation_name` varchar(20) NOT NULL,
  `grade` varchar(20) NOT NULL,
  `basic_salary` double NOT NULL,
  `joining_date` date NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`ID`, `username`, `password`, `email`, `first_name`, `last_name`, `address`, `phone`, `marital_status`, `probation_status`, `department_name`, `designation_name`, `grade`, `basic_salary`, `joining_date`, `image`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'breakdown21stams@gmail.com', 'Ammar', 'Shrestha', 'kalanki', '9898989898', 'Married', 'Permanent', 'Development', 'Programmer', 'A', 80000, '2014-12-10', ''),
(2, 'benjix21', '5f4dcc3b5aa765d61d8327deb882cf99', 'breakdown21stams@gmail.com', 'Benjamin', 'Pokharel', ' kalanki', '0909909009', '', 'Internship', 'Re', '3', '3', 0, '0000-00-00', ''),
(3, 'bikramgurung', '5f4dcc3b5aa765d61d8327deb882cf99', 'bikramgurung@gmail.com', 'Bikram', 'Gurung', 'bhatbhatini', '099898999889', '', 'Internship', 'Ex', '2', '3', 0, '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee_perms`
--

CREATE TABLE IF NOT EXISTS `employee_perms` (
  `ID` bigint(20) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `userID` bigint(20) NOT NULL,
  `permID` bigint(20) NOT NULL,
  `value` tinyint(1) NOT NULL DEFAULT '0',
  `addDate` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `userID` (`userID`,`permID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `employee_perms`
--

INSERT INTO `employee_perms` (`ID`, `userID`, `permID`, `value`, `addDate`) VALUES
(00000000000000000005, 5, 6, 0, '2012-09-22 10:09:45'),
(00000000000000000020, 8, 15, 1, '2013-09-15 07:42:32'),
(00000000000000000021, 8, 14, 0, '2013-09-15 07:42:32'),
(00000000000000000022, 8, 22, 0, '2013-09-15 07:42:32'),
(00000000000000000023, 2, 1, 1, '2014-12-11 06:03:37'),
(00000000000000000024, 2, 23, 1, '2014-12-11 06:03:37'),
(00000000000000000025, 2, 24, 1, '2014-12-11 06:03:37'),
(00000000000000000026, 2, 27, 1, '2014-12-11 06:03:37');

-- --------------------------------------------------------

--
-- Table structure for table `employee_roles`
--

CREATE TABLE IF NOT EXISTS `employee_roles` (
  `userID` bigint(20) NOT NULL,
  `roleID` bigint(20) NOT NULL,
  `addDate` datetime NOT NULL,
  UNIQUE KEY `userID` (`userID`,`roleID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_roles`
--

INSERT INTO `employee_roles` (`userID`, `roleID`, `addDate`) VALUES
(1, 1, '2013-08-11 12:12:53'),
(1, 2, '2013-08-11 12:12:52'),
(2, 2, '2009-03-02 17:27:23'),
(2, 3, '2009-03-02 17:27:23'),
(3, 2, '2009-03-02 17:27:05'),
(4, 2, '2009-03-02 17:27:32'),
(4, 4, '2009-03-02 17:27:32'),
(5, 1, '2013-08-11 13:25:50'),
(5, 2, '2013-08-11 13:25:50'),
(5, 6, '2013-08-11 13:25:50'),
(8, 4, '2013-09-15 08:13:25'),
(8, 6, '2013-09-15 08:13:25');

-- --------------------------------------------------------

--
-- Table structure for table `emp_allowances`
--

CREATE TABLE IF NOT EXISTS `emp_allowances` (
  `emp_allowances_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `allowances_id` int(11) NOT NULL,
  PRIMARY KEY (`emp_allowances_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `emp_deduction`
--

CREATE TABLE IF NOT EXISTS `emp_deduction` (
  `emp_deduction_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `deduction_id` int(11) NOT NULL,
  `payed_on_date` datetime(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  PRIMARY KEY (`emp_deduction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `emp_provident_fund`
--

CREATE TABLE IF NOT EXISTS `emp_provident_fund` (
  `emp_provident_fund_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `provident_fund_id` int(11) NOT NULL,
  `emp_provident_fund_amount` double NOT NULL,
  `payed_on_date` datetime(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  PRIMARY KEY (`emp_provident_fund_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE IF NOT EXISTS `grade` (
  `grade_id` int(11) NOT NULL AUTO_INCREMENT,
  `grade_type` varchar(50) NOT NULL,
  PRIMARY KEY (`grade_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `office_time`
--

CREATE TABLE IF NOT EXISTS `office_time` (
  `office_time_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `designation_intime` time(6) NOT NULL,
  `designation_outtime` time(6) NOT NULL,
  `effective_date` date NOT NULL,
  PRIMARY KEY (`office_time_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `ID` bigint(20) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `permKey` varchar(30) NOT NULL,
  `permName` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `permKey` (`permKey`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`ID`, `permKey`, `permName`) VALUES
(00000000000000000001, 'access_admin', 'Access Admin System'),
(00000000000000000002, 'dashboard_index', 'Dashboard'),
(00000000000000000003, 'employee_index', 'employee'),
(00000000000000000004, 'employee_add', 'employee Add'),
(00000000000000000005, 'employee_edit', 'employee Edit'),
(00000000000000000006, 'employee_delete', 'employee Delete'),
(00000000000000000007, 'employee_detail', 'employee Detail'),
(00000000000000000008, 'employee_aroles', 'employee Assign/Manage Role'),
(00000000000000000009, 'employee_aperms', 'employee Assign/Manage Permiss'),
(00000000000000000010, 'rbac_index', 'RBAC'),
(00000000000000000011, 'rbac_roles', 'RBAC Roles'),
(00000000000000000012, 'rbac_addrole', 'RBAC Role Add'),
(00000000000000000013, 'rbac_editrole', 'RBAC Role Edit'),
(00000000000000000014, 'rbac_perms', 'RBAC Permision'),
(00000000000000000015, 'rbac_manageperm', 'RBAC Permission Manage'),
(00000000000000000016, 'rbac_deleteperm', 'RBAC Permission Delete'),
(00000000000000000017, 'report_index', 'Report'),
(00000000000000000018, 'report_attendance', 'Report Attendance'),
(00000000000000000019, 'report_salary', 'Report Salary'),
(00000000000000000020, 'report_attendancebydaterange', 'Report employee By Date Range'),
(00000000000000000021, 'settings_index', 'Settings'),
(00000000000000000023, 'attendance_index', 'Attendance'),
(00000000000000000024, 'attendance_add', 'Attendance Add'),
(00000000000000000025, 'attendance_edit', 'Attendance Edit'),
(00000000000000000026, 'attendance_delete', 'Attendance Delete'),
(00000000000000000027, 'attendance_bulkdelete', 'Attendance Bulk Delete'),
(00000000000000000028, 'employee_vperms', 'Employee View Permissions'),
(00000000000000000029, 'salary_index', 'Salary');

-- --------------------------------------------------------

--
-- Table structure for table `provident_fund`
--

CREATE TABLE IF NOT EXISTS `provident_fund` (
  `provident_fund_id` int(11) NOT NULL AUTO_INCREMENT,
  `provident_fund_name` varchar(20) NOT NULL,
  `provident_fund_type` varchar(255) NOT NULL,
  `provident_fund_amount` double NOT NULL,
  `provident_fund_rate` varchar(20) NOT NULL,
  PRIMARY KEY (`provident_fund_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `ID` bigint(20) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `roleName` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `roleName` (`roleName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`ID`, `roleName`) VALUES
(00000000000000000001, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `role_perms`
--

CREATE TABLE IF NOT EXISTS `role_perms` (
  `ID` bigint(20) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `roleID` bigint(20) NOT NULL,
  `permID` bigint(20) NOT NULL,
  `value` tinyint(1) NOT NULL DEFAULT '0',
  `addDate` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `roleID_2` (`roleID`,`permID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=874 ;

--
-- Dumping data for table `role_perms`
--

INSERT INTO `role_perms` (`ID`, `roleID`, `permID`, `value`, `addDate`) VALUES
(00000000000000000016, 1, 2, 1, '2009-03-02 17:13:21'),
(00000000000000000025, 3, 7, 1, '2009-03-02 17:13:38'),
(00000000000000000026, 3, 8, 1, '2009-03-02 17:13:38'),
(00000000000000000027, 3, 6, 1, '2009-03-02 17:13:38'),
(00000000000000000028, 3, 3, 1, '2009-03-02 17:13:38'),
(00000000000000000029, 3, 4, 1, '2009-03-02 17:13:38'),
(00000000000000000043, 7, 7, 0, '2012-09-24 07:04:19'),
(00000000000000000044, 7, 1, 1, '2012-09-24 07:04:19'),
(00000000000000000045, 7, 8, 1, '2012-09-24 07:04:19'),
(00000000000000000046, 7, 4, 1, '2012-09-24 07:04:19'),
(00000000000000000050, 8, 2, 1, '2012-10-02 05:26:08'),
(00000000000000000051, 8, 7, 0, '2012-10-02 05:26:08'),
(00000000000000000052, 8, 1, 1, '2012-10-02 05:26:08'),
(00000000000000000053, 8, 8, 1, '2012-10-02 05:26:08'),
(00000000000000000054, 8, 6, 0, '2012-10-02 05:26:08'),
(00000000000000000055, 8, 3, 1, '2012-10-02 05:26:08'),
(00000000000000000056, 8, 9, 1, '2012-10-02 05:26:08'),
(00000000000000000601, 1, 1, 1, '2013-08-11 12:27:36'),
(00000000000000000602, 1, 15, 1, '2013-08-11 12:27:36'),
(00000000000000000603, 1, 16, 1, '2013-08-11 12:27:36'),
(00000000000000000604, 1, 20, 1, '2013-08-11 12:27:36'),
(00000000000000000605, 1, 18, 1, '2013-08-11 12:27:36'),
(00000000000000000606, 1, 19, 1, '2013-08-11 12:27:36'),
(00000000000000000607, 1, 17, 1, '2013-08-11 12:27:37'),
(00000000000000000608, 1, 3, 1, '2013-08-11 12:27:37'),
(00000000000000000609, 1, 21, 1, '2013-08-11 12:27:37'),
(00000000000000000610, 1, 4, 1, '2013-08-11 12:27:37'),
(00000000000000000611, 1, 5, 1, '2013-08-11 12:27:38'),
(00000000000000000612, 1, 7, 1, '2013-08-11 12:27:38'),
(00000000000000000613, 1, 8, 1, '2013-08-11 12:27:38'),
(00000000000000000614, 1, 6, 1, '2013-08-11 12:27:38'),
(00000000000000000615, 1, 29, 1, '2013-08-11 12:27:38'),
(00000000000000000616, 1, 33, 1, '2013-08-11 12:27:38'),
(00000000000000000617, 1, 35, 1, '2013-08-11 12:27:38'),
(00000000000000000618, 1, 34, 1, '2013-08-11 12:27:38'),
(00000000000000000619, 1, 31, 1, '2013-08-11 12:27:38'),
(00000000000000000620, 1, 32, 1, '2013-08-11 12:27:38'),
(00000000000000000621, 1, 30, 1, '2013-08-11 12:27:38'),
(00000000000000000622, 1, 42, 1, '2013-08-11 12:27:38'),
(00000000000000000623, 1, 43, 1, '2013-08-11 12:27:38'),
(00000000000000000624, 1, 46, 1, '2013-08-11 12:27:38'),
(00000000000000000625, 1, 45, 1, '2013-08-11 12:27:38'),
(00000000000000000626, 1, 44, 1, '2013-08-11 12:27:38'),
(00000000000000000627, 1, 36, 1, '2013-08-11 12:27:38'),
(00000000000000000628, 1, 39, 1, '2013-08-11 12:27:38'),
(00000000000000000629, 1, 37, 1, '2013-08-11 12:27:38'),
(00000000000000000630, 1, 38, 1, '2013-08-11 12:27:38'),
(00000000000000000631, 1, 40, 1, '2013-08-11 12:27:39'),
(00000000000000000632, 1, 9, 1, '2013-08-11 12:27:39'),
(00000000000000000633, 1, 11, 1, '2013-08-11 12:27:39'),
(00000000000000000634, 1, 41, 1, '2013-08-11 12:27:39'),
(00000000000000000635, 1, 13, 1, '2013-08-11 12:27:39'),
(00000000000000000636, 1, 14, 1, '2013-08-11 12:27:39'),
(00000000000000000637, 1, 12, 1, '2013-08-11 12:27:39'),
(00000000000000000638, 1, 22, 1, '2013-08-11 12:27:39'),
(00000000000000000639, 1, 23, 1, '2013-08-11 12:27:39'),
(00000000000000000640, 1, 28, 1, '2013-08-11 12:27:39'),
(00000000000000000641, 1, 27, 1, '2013-08-11 12:27:39'),
(00000000000000000642, 1, 48, 1, '2013-08-11 12:27:39'),
(00000000000000000643, 1, 25, 1, '2013-08-11 12:27:39'),
(00000000000000000644, 1, 26, 1, '2013-08-11 12:27:39'),
(00000000000000000645, 1, 24, 1, '2013-08-11 12:27:39'),
(00000000000000000646, 1, 47, 1, '2013-08-11 12:27:39'),
(00000000000000000745, 2, 1, 1, '2013-09-15 07:50:19'),
(00000000000000000746, 2, 15, 1, '2013-09-15 07:50:19'),
(00000000000000000747, 2, 16, 1, '2013-09-15 07:50:20'),
(00000000000000000748, 2, 20, 1, '2013-09-15 07:50:20'),
(00000000000000000749, 2, 18, 1, '2013-09-15 07:50:20'),
(00000000000000000750, 2, 19, 1, '2013-09-15 07:50:20'),
(00000000000000000751, 2, 17, 1, '2013-09-15 07:50:20'),
(00000000000000000752, 2, 3, 1, '2013-09-15 07:50:20'),
(00000000000000000753, 2, 21, 1, '2013-09-15 07:50:20'),
(00000000000000000754, 2, 4, 1, '2013-09-15 07:50:20'),
(00000000000000000755, 2, 5, 1, '2013-09-15 07:50:20'),
(00000000000000000756, 2, 7, 1, '2013-09-15 07:50:20'),
(00000000000000000757, 2, 8, 1, '2013-09-15 07:50:20'),
(00000000000000000758, 2, 6, 1, '2013-09-15 07:50:20'),
(00000000000000000759, 2, 29, 1, '2013-09-15 07:50:20'),
(00000000000000000760, 2, 33, 1, '2013-09-15 07:50:20'),
(00000000000000000761, 2, 35, 1, '2013-09-15 07:50:20'),
(00000000000000000762, 2, 34, 1, '2013-09-15 07:50:20'),
(00000000000000000763, 2, 31, 1, '2013-09-15 07:50:20'),
(00000000000000000764, 2, 32, 1, '2013-09-15 07:50:20'),
(00000000000000000765, 2, 30, 1, '2013-09-15 07:50:20'),
(00000000000000000766, 2, 42, 1, '2013-09-15 07:50:20'),
(00000000000000000767, 2, 43, 1, '2013-09-15 07:50:20'),
(00000000000000000768, 2, 46, 1, '2013-09-15 07:50:20'),
(00000000000000000769, 2, 45, 1, '2013-09-15 07:50:20'),
(00000000000000000770, 2, 44, 1, '2013-09-15 07:50:20'),
(00000000000000000771, 2, 36, 1, '2013-09-15 07:50:20'),
(00000000000000000772, 2, 39, 1, '2013-09-15 07:50:20'),
(00000000000000000773, 2, 37, 1, '2013-09-15 07:50:20'),
(00000000000000000774, 2, 38, 1, '2013-09-15 07:50:20'),
(00000000000000000775, 2, 40, 1, '2013-09-15 07:50:20'),
(00000000000000000776, 2, 9, 1, '2013-09-15 07:50:20'),
(00000000000000000777, 2, 11, 1, '2013-09-15 07:50:20'),
(00000000000000000778, 2, 41, 1, '2013-09-15 07:50:20'),
(00000000000000000779, 2, 13, 1, '2013-09-15 07:50:20'),
(00000000000000000780, 2, 14, 1, '2013-09-15 07:50:20'),
(00000000000000000781, 2, 12, 1, '2013-09-15 07:50:20'),
(00000000000000000782, 2, 22, 1, '2013-09-15 07:50:20'),
(00000000000000000783, 2, 23, 1, '2013-09-15 07:50:20'),
(00000000000000000784, 2, 28, 1, '2013-09-15 07:50:20'),
(00000000000000000785, 2, 27, 1, '2013-09-15 07:50:21'),
(00000000000000000786, 2, 48, 1, '2013-09-15 07:50:21'),
(00000000000000000787, 2, 25, 1, '2013-09-15 07:50:21'),
(00000000000000000788, 2, 26, 1, '2013-09-15 07:50:21'),
(00000000000000000789, 2, 24, 1, '2013-09-15 07:50:21'),
(00000000000000000790, 2, 47, 1, '2013-09-15 07:50:21'),
(00000000000000000803, 6, 1, 1, '2013-09-15 08:09:44'),
(00000000000000000804, 6, 15, 0, '2013-09-15 08:09:44'),
(00000000000000000805, 6, 16, 0, '2013-09-15 08:09:44'),
(00000000000000000806, 6, 20, 0, '2013-09-15 08:09:45'),
(00000000000000000807, 6, 18, 0, '2013-09-15 08:09:45'),
(00000000000000000808, 6, 19, 0, '2013-09-15 08:09:45'),
(00000000000000000809, 6, 17, 0, '2013-09-15 08:09:45'),
(00000000000000000810, 6, 3, 0, '2013-09-15 08:09:45'),
(00000000000000000811, 6, 21, 0, '2013-09-15 08:09:45'),
(00000000000000000812, 6, 4, 0, '2013-09-15 08:09:45'),
(00000000000000000813, 6, 5, 0, '2013-09-15 08:09:45'),
(00000000000000000814, 6, 7, 0, '2013-09-15 08:09:45'),
(00000000000000000815, 6, 8, 0, '2013-09-15 08:09:45'),
(00000000000000000816, 6, 6, 0, '2013-09-15 08:09:45'),
(00000000000000000817, 6, 29, 0, '2013-09-15 08:09:45'),
(00000000000000000818, 6, 33, 0, '2013-09-15 08:09:45'),
(00000000000000000819, 6, 35, 0, '2013-09-15 08:09:45'),
(00000000000000000820, 6, 34, 0, '2013-09-15 08:09:45'),
(00000000000000000821, 6, 31, 0, '2013-09-15 08:09:45'),
(00000000000000000822, 6, 32, 0, '2013-09-15 08:09:45'),
(00000000000000000823, 6, 30, 0, '2013-09-15 08:09:45'),
(00000000000000000824, 6, 42, 0, '2013-09-15 08:09:45'),
(00000000000000000825, 6, 43, 0, '2013-09-15 08:09:45'),
(00000000000000000826, 6, 46, 0, '2013-09-15 08:09:45'),
(00000000000000000827, 6, 45, 0, '2013-09-15 08:09:45'),
(00000000000000000828, 6, 44, 0, '2013-09-15 08:09:45'),
(00000000000000000829, 6, 36, 0, '2013-09-15 08:09:45'),
(00000000000000000830, 6, 39, 0, '2013-09-15 08:09:45'),
(00000000000000000831, 6, 37, 0, '2013-09-15 08:09:45'),
(00000000000000000832, 6, 38, 0, '2013-09-15 08:09:45'),
(00000000000000000833, 6, 40, 0, '2013-09-15 08:09:45'),
(00000000000000000834, 6, 9, 1, '2013-09-15 08:09:45'),
(00000000000000000835, 6, 11, 0, '2013-09-15 08:09:45'),
(00000000000000000836, 6, 41, 0, '2013-09-15 08:09:45'),
(00000000000000000837, 6, 13, 0, '2013-09-15 08:09:45'),
(00000000000000000838, 6, 14, 0, '2013-09-15 08:09:45'),
(00000000000000000839, 6, 12, 0, '2013-09-15 08:09:45'),
(00000000000000000840, 6, 22, 0, '2013-09-15 08:09:45'),
(00000000000000000841, 6, 23, 0, '2013-09-15 08:09:45'),
(00000000000000000842, 6, 28, 0, '2013-09-15 08:09:45'),
(00000000000000000843, 6, 27, 0, '2013-09-15 08:09:45'),
(00000000000000000844, 6, 48, 0, '2013-09-15 08:09:45'),
(00000000000000000845, 6, 25, 0, '2013-09-15 08:09:45'),
(00000000000000000846, 6, 26, 0, '2013-09-15 08:09:45'),
(00000000000000000847, 6, 24, 0, '2013-09-15 08:09:45'),
(00000000000000000848, 6, 47, 0, '2013-09-15 08:09:45'),
(00000000000000000862, 4, 15, 1, '2013-09-15 08:12:35'),
(00000000000000000863, 4, 16, 1, '2013-09-15 08:12:35'),
(00000000000000000864, 4, 20, 1, '2013-09-15 08:12:35'),
(00000000000000000865, 4, 18, 1, '2013-09-15 08:12:35'),
(00000000000000000866, 4, 19, 1, '2013-09-15 08:12:35'),
(00000000000000000867, 4, 17, 1, '2013-09-15 08:12:35'),
(00000000000000000868, 4, 21, 0, '2013-09-15 08:12:35'),
(00000000000000000869, 4, 4, 0, '2013-09-15 08:12:35'),
(00000000000000000870, 4, 5, 0, '2013-09-15 08:12:35'),
(00000000000000000871, 4, 7, 0, '2013-09-15 08:12:35'),
(00000000000000000872, 4, 6, 0, '2013-09-15 08:12:35'),
(00000000000000000873, 4, 12, 0, '2013-09-15 08:12:35');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
