-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2017 at 11:58 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `savepaise`
--

-- --------------------------------------------------------

--
-- Table structure for table `adduser`
--

CREATE TABLE `adduser` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pnumber` varchar(11) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adduser`
--

INSERT INTO `adduser` (`id`, `firstname`, `lastname`, `email`, `password`, `pnumber`, `usertype`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'janibasha', 'shaik', 'janibasha@ladatechnologies.com', 'SmFuaWJhc2hhMTIx', '7842585505', '1', 1, 0, '2017-05-19 07:43:03', 0, '0000-00-00 00:00:00'),
(2, 'venkat', 'uppugalla', 'venkat@gmail.com', 'VmVua2F0MTIx', '7845124578', '2', 1, 0, '2017-05-19 07:44:50', 0, '2017-05-19 08:28:14'),
(3, 'naidu', 'tirupati', 'naidu@gmail.com', 'TmFpZHUxMjE=', '7412587412', '2', 1, 0, '2017-05-19 07:45:26', 0, '2017-05-19 08:49:43'),
(4, 'ghani', 'shaik', 'ghani@gmail.com', 'R2hhbmkxMjE=', '7845857454', '3', 1, 0, '2017-05-19 11:07:51', 0, '0000-00-00 00:00:00'),
(5, 'Chiranjeevi', 'Sadi', 'narayanarao.b@ladatechnologies.com', 'UHJhdmVlMTIz', '9999999999', '1', 1, 0, '2017-05-20 15:14:59', 0, '0000-00-00 00:00:00'),
(6, 'Chiranjeevi', 'Sadi', 'narayanarao.b@ladatechnologies.com', 'UHJhdmVlMTIz', '9999999999', '1', 1, 0, '2017-05-20 15:15:11', 0, '0000-00-00 00:00:00'),
(7, 'Chiranjeevi', 'Sadi', 'narayanarao.b@ladatechnologies.com', 'UHJhdmVlbjE=', '9999999997', '2', 1, 0, '2017-05-20 15:15:46', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `show_in_search` tinyint(4) NOT NULL DEFAULT '1',
  `sorting` int(11) NOT NULL,
  `show_in_header` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `image`, `status`, `show_in_search`, `sorting`, `show_in_header`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'Home Appliances', '1495278750.png', 1, 1, 0, 0, 0, '2017-05-20 08:44:03', 0, '2017-05-20 13:12:30'),
(2, 'Gadgets', '1495278904.png', 1, 1, 0, 0, 0, '2017-05-20 13:15:04', 0, '0000-00-00 00:00:00'),
(3, 'Electronic Appliances', '1495540000.png', 1, 1, 0, 0, 0, '2017-05-23 13:46:41', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category_group`
--

CREATE TABLE `category_group` (
  `g_id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `group_name` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL,
  `show_in_header` int(11) DEFAULT '0',
  `sorting` int(11) DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_group`
--

INSERT INTO `category_group` (`g_id`, `cate_id`, `group_name`, `image`, `show_in_header`, `sorting`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 1, 'Furnitures', '1495604388.jpg', 0, 0, 0, 0, '2017-05-23 07:46:32', 0, '2017-05-24 07:40:20'),
(2, 1, 'Testers', '1495523177.png', 0, 0, 1, 0, '2017-05-23 09:06:18', 0, '0000-00-00 00:00:00'),
(4, 4, 'Tv Remotes', '1495540062.jpg', 0, 0, 0, 0, '2017-05-23 13:47:42', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `scat_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `scat_name` varchar(50) NOT NULL,
  `logo` varchar(450) NOT NULL,
  `category_group` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `sorting` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`scat_id`, `category_id`, `scat_name`, `logo`, `category_group`, `status`, `sorting`, `image`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 1, 'Jewellerys', '1495694518.', 1, 1, 0, '', 0, '2017-05-24 08:58:53', 0, '2017-05-25 08:58:55'),
(2, 3, 'Test SUBCAT', '1495694389.', 2, 1, 0, '', 0, '2017-05-24 11:55:57', 0, '2017-05-25 08:39:49'),
(3, 2, 'Jewellerys', '1495694797.', 1, 1, 0, '', 0, '2017-05-24 12:20:14', 0, '2017-05-25 08:46:41');

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `id` int(11) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`id`, `user_type`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'Super Admin', '1', 0, '2017-05-12 10:35:49', 0, '2017-05-19 08:42:48'),
(2, 'Admin', '1', 0, '2017-05-12 11:03:55', 0, '0000-00-00 00:00:00'),
(3, 'User', '1', 0, '2017-05-19 08:47:54', 0, '2017-05-19 08:55:11'),
(4, 'Admin', '1', 0, '2017-05-20 14:55:56', 0, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adduser`
--
ALTER TABLE `adduser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `category_group`
--
ALTER TABLE `category_group`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`scat_id`);

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adduser`
--
ALTER TABLE `adduser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category_group`
--
ALTER TABLE `category_group`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `scat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usertypes`
--
ALTER TABLE `usertypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
