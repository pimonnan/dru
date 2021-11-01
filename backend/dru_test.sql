-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2021 at 12:42 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `product_unit`
--

CREATE TABLE `product_unit` (
  `unit_id` int(11) UNSIGNED NOT NULL,
  `unit_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_unit`
--

INSERT INTO `product_unit` (`unit_id`, `unit_name`) VALUES
(1, 'โหล'),
(2, 'ชิ้น'),
(3, 'อัน'),
(4, 'ใบ'),
(5, 'แท่ง'),
(6, 'หลอด');

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
  `position_updatedby` varchar(255) NOT NULL,
  `position_updatedate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_position`
--

INSERT INTO `tbl_position` (`position_id`, `position_name`, `position_statusid`, `position_createdby`, `position_createdate`, `position_updatedby`, `position_updatedate`) VALUES
(6, 'programmer1', 0, 2, '2021-08-26', 'pimon', '2021-10-01'),
(7, 'IT', 0, 12, '2021-08-26', '12', '2021-08-26'),
(8, 'programmer2', 1, 2, '2021-08-26', 'pimon', '2021-10-01'),
(10, 'Sales', 0, 6, '2021-08-27', '6', '2021-08-27'),
(15, 'IT', 0, 3, '2021-10-01', 'pimon', '2021-10-01'),
(16, 'IT-Com', 1, 3, '2021-10-01', 'pimon', '2021-10-01');

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
  `product_pic` varchar(255) NOT NULL,
  `product_u_name` varchar(255) NOT NULL,
  `product_t_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_price`, `product_amount`, `product_picdir`, `product_pic`, `product_u_name`, `product_t_name`) VALUES
(16, 'ช้อน', 50, 2, 'images/', 'P20211001-121430.jpg', 'แท่ง', '1'),
(17, 'Iphone', 200000, 1, 'images/', 'P20211001-123428.jfif', 'โหล', '1');

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

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_username`, `user_password`, `user_position`, `user_photo`, `user_status`, `user_createdby`, `user_createdat`, `user_updatedby`, `user_date`) VALUES
(28, 'babaa', 'bb', '55555', 'admin', 'https://online.pubhtml5.com/cgyr/accountlogo.jpg', 0, 0, '0000-00-00', 0, '0000-00-00'),
(29, 'nan', 'nanana', '66666', 'sale man', 'https://online.pubhtml5.com/cgyr/accountlogo.jpg', 0, 0, '0000-00-00', 0, '0000-00-00'),
(33, 'ttt', 'tttt', '123456', '10', 'https://online.pubhtml5.com/cgyr/accountlogo.jpg', 0, 0, '0000-00-00', 0, '0000-00-00'),
(34, 'ama', 'aam', '123456', 'IT', 'https://online.pubhtml5.com/cgyr/accountlogo.jpg', 0, 0, '0000-00-00', 0, '0000-00-00'),
(35, 'aaaa', 'aa', '12345', '7', 'https://online.pubhtml5.com/cgyr/accountlogo.jpg', 0, 0, '0000-00-00', 0, '0000-00-00');

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

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `admin_username`, `admin_password`, `admin_status`) VALUES
(1, 'Administrator', 'admin', 'password', 1),
(2, 'Employee', 'stafl', 'password', 1),
(3, 'pimon', 'pimonnan', 'pimon2543', 1),
(4, 'pimon', 'pimonnan', 'pimon2543', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `member_id` int(10) UNSIGNED NOT NULL,
  `member_name` varchar(150) NOT NULL,
  `member_email` varchar(100) NOT NULL,
  `member_create` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`member_id`, `member_name`, `member_email`, `member_create`) VALUES
(1, 'Pimon chimpalee', 'pimonchimpalee2543@gmail.com', '2021-09-03 14:45:22'),
(3, 'pimon', 'pimon2543@gmail.com', '2021-09-03 16:02:36'),
(4, 'nan', 'nan2543@gmail.com', '2021-09-03 16:06:08'),
(5, 'nan', 'nan@gmail.com', '2021-09-03 16:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `type_product`
--

CREATE TABLE `type_product` (
  `type_product_id` int(11) UNSIGNED NOT NULL,
  `type_product_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_product`
--

INSERT INTO `type_product` (`type_product_id`, `type_product_name`) VALUES
(1, 'เครื่องครัว'),
(3, 'ของตกแต่งบ้าน'),
(4, 'โทรศัพท์มือถือ'),
(5, 'ทีวี'),
(6, 'เครื่องดื่ม');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_unit`
--
ALTER TABLE `product_unit`
  ADD PRIMARY KEY (`unit_id`);

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
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `type_product`
--
ALTER TABLE `type_product`
  ADD PRIMARY KEY (`type_product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_unit`
--
ALTER TABLE `product_unit`
  MODIFY `unit_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `member_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `type_product`
--
ALTER TABLE `type_product`
  MODIFY `type_product_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
