-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2016 at 08:14 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zerpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_profile_info`
--

CREATE TABLE `user_profile_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `expeted_salary` varchar(256) NOT NULL,
  `category` varchar(256) NOT NULL,
  `spcialization` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `facebook_link` varchar(256) NOT NULL,
  `twitter_link` varchar(256) NOT NULL,
  `youtube_link` varchar(256) NOT NULL,
  `google_plus_link` varchar(256) NOT NULL,
  `phone_no` varchar(256) NOT NULL,
  `website` varchar(256) NOT NULL,
  `city` varchar(256) NOT NULL,
  `alt_email_address` varchar(256) NOT NULL,
  `country` varchar(256) NOT NULL,
  `complete_address` varchar(256) NOT NULL,
  `job_position` varchar(256) NOT NULL,
  `company_type` varchar(256) NOT NULL,
  `job_details` varchar(256) NOT NULL,
  `degree_name` varchar(256) NOT NULL,
  `year` varchar(256) NOT NULL,
  `institue_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile_info`
--

INSERT INTO `user_profile_info` (`id`, `user_id`, `user_type`, `user_email`, `name`, `expeted_salary`, `category`, `spcialization`, `description`, `facebook_link`, `twitter_link`, `youtube_link`, `google_plus_link`, `phone_no`, `website`, `city`, `alt_email_address`, `country`, `complete_address`, `job_position`, `company_type`, `job_details`, `degree_name`, `year`, `institue_name`) VALUES
(1, 0, '0', '0', 'Ahsanul Haque Ripon', '535435', 'kfgndfkngfdg', 'one', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has sur', 'hgfhyfgh', 'hgfhgfh', 'hgfhfgh', 'hghgfh', '01750777467', 'gfdgdfg', 'fgdfgfd', 'gdfgdfg', 'gdfgfdg', 'fdgfdg', '', '', 'sdgdfgfdg', '', 'gfdgdfgdfgd', '3'),
(2, 0, '0', '', 'Ahsanul Haque Riponxzcxzcxzcc', '', '', '0', '', 'zxczxcxz', '', '', '', 'xzcxz', '', '', '', '', '', '', '1', '', '', '', '1'),
(3, 0, 'Frelancer', 'ali.siddique@technovicinity.com ', 'Ahsanul Haque Ripon', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'Mohakhali,Dhaka,Bangladesh', '0', '0', '0', '0', '0', '0'),
(4, 0, '0', '0', 'fdsffdsfdsf', '0', '0', '0', '0', 'fdsfdsf', 'fdsfdsf', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_registration_info`
--

CREATE TABLE `user_registration_info` (
  `id` int(11) NOT NULL,
  `user_type` varchar(250) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_registration_info`
--

INSERT INTO `user_registration_info` (`id`, `user_type`, `first_name`, `last_name`, `user_email`, `user_password`) VALUES
(1, 'Employeer', 'Ahsanul Haque', 'Ripon', 'riponcse2013@GMAIL.COM', '1234'),
(2, 'Employeer', 'Ahsanul Haque', 'Ahsanul', 'riponcse2015@gmail.com', 'admin'),
(3, 'Frelancer', 'Ahsanul Haque', 'gdfgfdg', 'riponcse535@yahoo.com', 'rtcworld'),
(4, 'Frelancer', 'Ahsanul Haque', 'Ripon', 'ali.siddique@technovicinity.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_profile_info`
--
ALTER TABLE `user_profile_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_registration_info`
--
ALTER TABLE `user_registration_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_profile_info`
--
ALTER TABLE `user_profile_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_registration_info`
--
ALTER TABLE `user_registration_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
