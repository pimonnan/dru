-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2021 at 10:58 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dru_test`
--
CREATE DATABASE IF NOT EXISTS `dru_test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dru_test`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

CREATE TABLE `tbl_position` (
  `position_id` int(11) NOT NULL,
  `position_name` varchar(255) NOT NULL,
  `position_statusid` int(11) NOT NULL DEFAULT 0,
  `position_createdby` int(11) NOT NULL,
  `position_createdate` date NOT NULL,
  `position_updatedby` int(11) NOT NULL,
  `position_updatedate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_position`
--

REPLACE INTO `tbl_position` (`position_id`, `position_name`, `position_statusid`, `position_createdby`, `position_createdate`, `position_updatedby`, `position_updatedate`) VALUES
(5, 'Admin', 0, 3, '2021-08-26', 3, '2021-08-26'),
(6, 'programmer', 1, 5, '2021-08-26', 5, '2021-08-26'),
(7, 'IT', 0, 12, '2021-08-26', 12, '2021-08-26'),
(8, 'programmer', 1, 2, '2021-08-26', 3, '2021-08-26'),
(9, 'Programmer', 0, 3, '2021-08-26', 3, '2021-08-26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_amount` int(11) NOT NULL,
  `product_picdir` varchar(255) NOT NULL,
  `product_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

REPLACE INTO `tbl_product` (`product_id`, `product_name`, `product_price`, `product_amount`, `product_picdir`, `product_pic`) VALUES
(6, 'bow', 60, 1, 'images/', 'P20210826-185551.jpg'),
(7, 'เสื้อโอเวอร์ไซต์', 300, 1, 'images/', 'P20210826-190015.jpg'),
(8, 'เสื้อ', 3000, 2, 'images/', 'P20210826-225032.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_position` varchar(255) NOT NULL,
  `user_photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_status` int(11) NOT NULL,
  `user_createdby` int(11) NOT NULL,
  `user_createdat` date NOT NULL,
  `user_updatedby` int(11) NOT NULL,
  `user_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

REPLACE INTO `tbl_user` (`user_id`, `user_name`, `user_username`, `user_password`, `user_position`, `user_photo`, `user_status`, `user_createdby`, `user_createdat`, `user_updatedby`, `user_date`) VALUES
(21, 'pimon chimpalee', 'nannn', '1234', 'programmer', 'https://online.pubhtml5.com/cgyr/accountlogo.jpg', 0, 0, '0000-00-00', 0, '0000-00-00'),
(22, 'Bankk', 'Bank', '12333', 'sale man', 'https://1.bp.blogspot.com/-CDLdY_Q21tc/YSeJDTUujqI/AAAAAAABqOU/CTkXnavBV9EGpQKzSKz0l2aPNw7eSSJOACLcBGAsYHQ/s1212/girl-1.jpeg', 0, 0, '0000-00-00', 0, '0000-00-00'),
(23, 'pimon chimpalee1', 'pimon', '1234', 'admin', 'https://i.ytimg.com/vi/L_SxIZAwiPo/hqdefault.jpg', 0, 0, '0000-00-00', 0, '0000-00-00'),
(25, 'Salaly', 'bas', '33333', 'programmer', 'https://s.isanook.com/ca/0/ui/279/1396205/download20190701165129_1562561119.jpg', 0, 0, '0000-00-00', 0, '0000-00-00'),
(26, 'pimommm', 'nan1', '1234', 'admin', 'https://1.bp.blogspot.com/-CDLdY_Q21tc/YSeJDTUujqI/AAAAAAABqOU/CTkXnavBV9EGpQKzSKz0l2aPNw7eSSJOACLcBGAsYHQ/s1212/girl-1.jpeg', 0, 0, '0000-00-00', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_admin`
--

REPLACE INTO `tb_admin` (`admin_id`, `admin_name`, `admin_username`, `admin_password`, `admin_status`) VALUES
(1, 'Administrator', 'admin', 'password', 1),
(2, 'Employee', 'stafl', 'password', 1),
(3, 'pimon', 'pimonnan', 'pimon2543', 1),
(4, 'pimon', 'pimonnan', 'pimon2543', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
