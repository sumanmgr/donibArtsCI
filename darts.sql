-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2016 at 06:09 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `darts`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `is_super` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `gallery_access_type` int(1) NOT NULL,
  `booking_date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `booking_status` int(11) NOT NULL,
  `book_start_date_time` datetime NOT NULL,
  `book_end_date_time` datetime NOT NULL,
  `customer_id` int(11) NOT NULL,
  `photographer_id` int(11) NOT NULL,
  `booking_title` varchar(50) NOT NULL,
  `booking_details` text CHARACTER SET utf8 NOT NULL,
  `booking_quote` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `gallery_access_type`, `booking_date_time`, `booking_status`, `book_start_date_time`, `book_end_date_time`, `customer_id`, `photographer_id`, `booking_title`, `booking_details`, `booking_quote`) VALUES
(7, 0, '2016-05-14 11:45:16', 4, '2016-05-15 12:00:00', '2016-05-15 17:00:00', 12, 11, 'Test Book For Public Access', 'This is a test Booking which have a public access for photographer Binod Ranabhat', 100),
(8, 1, '2016-05-18 01:13:21', 2, '2016-05-25 01:13:00', '2016-05-25 01:13:00', 12, 11, 'New Test', 'test for pay', 150),
(9, 1, '2016-05-21 14:00:01', 1, '2016-05-22 13:59:00', '2016-05-24 13:59:00', 12, 11, 'test book 4', '', 20),
(10, 1, '2016-05-21 14:05:58', 4, '2016-05-21 18:00:00', '2016-05-25 15:00:00', 12, 11, 'hawa', '', 5115);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `user_id` int(11) NOT NULL,
  `reward_point` int(11) NOT NULL,
  `refrence` varchar(90) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`user_id`, `reward_point`, `refrence`) VALUES
(12, 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `customergallery`
--

CREATE TABLE `customergallery` (
  `cgId` int(11) NOT NULL,
  `galleryID` int(11) NOT NULL,
  `bookingId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customergallery`
--

INSERT INTO `customergallery` (`cgId`, `galleryID`, `bookingId`) VALUES
(3, 26, 7);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL,
  `photographer_id` int(11) NOT NULL,
  `gallery_name` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `gallery_description` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `gallery_type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `photographer_id`, `gallery_name`, `gallery_description`, `gallery_type`) VALUES
(25, 11, 'Portfolio', '', 0),
(26, 11, 'Test Book For Public Access', 'Test Book 2016-05-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `isSuccess` int(11) NOT NULL,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `booking_id`, `amount`, `payment_mode`, `isSuccess`, `update_date`) VALUES
(1, 0, 100, '7', 1, '2016-05-21 13:38:17'),
(2, 0, 100, '7', 1, '2016-05-21 13:38:56'),
(3, 0, 100, '7', 1, '2016-05-21 13:40:03'),
(4, 7, 100, 'Paypal', 1, '2016-05-21 13:41:06'),
(5, 10, 5115, 'Paypal', 1, '2016-05-21 14:07:03');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `photo_id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `photo_name` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `photo_description` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`photo_id`, `gallery_id`, `photo_name`, `photo_description`, `file_name`) VALUES
(26, 25, '44.jpg', '', '44.jpg'),
(27, 26, '10610896_10203389348272745_4352108561130951216_n.jpg', '', '10610896_10203389348272745_4352108561130951216_n.jpg'),
(28, 26, '12705282_10156564261535164_1732712695178155049_n.jpg', '', '12705282_10156564261535164_1732712695178155049_n.jpg'),
(29, 26, '12991024_1204935169550552_502892681320738713_n.jpg', '', '12991024_1204935169550552_502892681320738713_n.jpg'),
(30, 26, 'abc.jpg', '', 'abc.jpg'),
(31, 25, 'DSC01230.JPG', '', 'DSC01230.JPG'),
(32, 26, '22222.jpg', '', '22222.jpg'),
(33, 26, '10610896_10203389348272745_4352108561130951216_n1.jpg', '', '10610896_10203389348272745_4352108561130951216_n1.jpg'),
(34, 26, '12705282_10156564261535164_1732712695178155049_n1.jpg', '', '12705282_10156564261535164_1732712695178155049_n1.jpg'),
(35, 26, '12991024_1204935169550552_502892681320738713_n1.jpg', '', '12991024_1204935169550552_502892681320738713_n1.jpg'),
(36, 26, '13164177_1049925951765562_3455773534478239733_n.jpg', '', '13164177_1049925951765562_3455773534478239733_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `photographer`
--

CREATE TABLE `photographer` (
  `user_id` int(11) NOT NULL,
  `experties` varchar(90) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `perHourRate` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photographer`
--

INSERT INTO `photographer` (`user_id`, `experties`, `perHourRate`) VALUES
(11, 'Events', 55);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `pID` int(11) NOT NULL,
  `galleryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`pID`, `galleryID`) VALUES
(11, 25);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `address` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `salt` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `status` int(1) NOT NULL,
  `user_type` enum('a','c','p') NOT NULL DEFAULT 'c',
  `img` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date_created` datetime NOT NULL,
  `facebook` varchar(60) NOT NULL,
  `instagram` varchar(60) NOT NULL,
  `mobile` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fullname`, `address`, `email`, `username`, `password`, `salt`, `status`, `user_type`, `img`, `date_created`, `facebook`, `instagram`, `mobile`) VALUES
(11, 'Binod Ranabhat', '52 Park Road Hurstville', 'merobinod@gmail.com', 'binod', 'aaf4c61ddcc5e8a2dabede0f3b482cd9aea9434d', '', 0, 'p', '', '0000-00-00 00:00:00', 'merobinod', 'binod.ranabhat', 434),
(12, 'Suman Thapa', '', 'suman@gmail.com', 'suman', 'aaf4c61ddcc5e8a2dabede0f3b482cd9aea9434d', '', 0, 'c', '', '0000-00-00 00:00:00', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `customergallery`
--
ALTER TABLE `customergallery`
  ADD PRIMARY KEY (`cgId`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`photo_id`);

--
-- Indexes for table `photographer`
--
ALTER TABLE `photographer`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`pID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `customergallery`
--
ALTER TABLE `customergallery`
  MODIFY `cgId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `pID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
