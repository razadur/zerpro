-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 05, 2016 at 08:06 AM
-- Server version: 5.5.52-cll-lve
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `techvqgu_zerpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'Information Technology'),
(2, 'Marketing'),
(3, 'test2');

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE IF NOT EXISTS `job_applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `job_id`, `freelancer_id`) VALUES
(1, 1, 4),
(2, 2, 4),
(3, 1, 14),
(4, 4, 14),
(5, 2, 9),
(6, 1, 15),
(7, 5, 15),
(8, 5, 14),
(9, 6, 14),
(10, 7, 14),
(11, 8, 14),
(12, 9, 19),
(13, 8, 19),
(14, 10, 21),
(15, 13, 33);

-- --------------------------------------------------------

--
-- Table structure for table `manage_job`
--

CREATE TABLE IF NOT EXISTS `manage_job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_type` varchar(256) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `job_title` varchar(256) NOT NULL,
  `job_description` varchar(256) NOT NULL,
  `category` varchar(256) NOT NULL,
  `spcialization` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `vacancy_type` varchar(256) NOT NULL,
  `budget` varchar(256) NOT NULL,
  `experience` varchar(256) NOT NULL,
  `qualification` varchar(256) NOT NULL,
  `attached_file` varchar(256) NOT NULL,
  `total_view` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `manage_job`
--

INSERT INTO `manage_job` (`id`, `user_id`, `user_type`, `user_name`, `user_email`, `job_title`, `job_description`, `category`, `spcialization`, `description`, `vacancy_type`, `budget`, `experience`, `qualification`, `attached_file`, `total_view`) VALUES
(1, 13, 'Employeer', 'Sagor Hasan', 'employeersagor@gmail.com', 'web developer', 'job description', '', '', 'dhaka', 'local_business', '10$-50$', 'php expert', 'bsc in cse', '', 193),
(2, 13, 'Employeer', 'Sagor Hasan', 'employeersagor@gmail.com', '', '', '', '', '', '0', '--select budget--', '', '', 'Invoice-13681.pdf', 16),
(3, 13, 'Employeer', 'Sagor Hasan', 'employeersagor@gmail.com', 'web developer', 'd sajd jasd j ', '', '', 'ndnsjdjsadj   asd', 'local_business', '10$-50$', 'dnasfjsdjf j dsjf ', 'jnfjds f sd fh  h f', 'Invoice-13682.pdf', 5),
(4, 13, 'Employeer', 'sagor hasan', 'employeersagor@gmail.com', 'Software Engineer', 'mbkndksd j jda d d as d hd  sd hsd ', '', '', 'dhaka', 'Freelancer', '10$-50$', 'f ds f d fn dsnf n sdfjf sdjf', 'nfsdjfjsdjfds  fjds fdsf', 'Invoice-13683.pdf', 11),
(5, 13, 'Employeer', 'sagor hasan', 'ali.siddique@technovicinity.com', 'datebase Developer', 'This Course covers the full perspective of everything going on of the field of Sound Healing and Sound Therapy. It gives you a good overview of the basic structure of sound and how it can be used for meditation, relaxation, learning, productivity, healing ', '', '', 'Dhaka', 'Freelancer', '10$-50$', '', '', '', 16),
(6, 16, 'Employeer', 'Ripon Test-2016', 'ripontest2016@gmail.com', 'database developer', 'mklfds fk sdjkf sd fkjsdkf', '', '', 'dhaka', 'Freelancer', '10$-50$', 'nfksdfsd fj jsd f sdf ', 'nfksdnkfds fjjsd f sdjf', '', 18),
(7, 17, 'Employeer', 'new_test 1', 'new_test@gmail.com', 'New Job', 'nfsd fjdjf jds jfds', '', '', 'mnsdfk sdfj dsjf jds fj sdf jm', '0', '', '', '', '', 5),
(8, 17, 'Employeer', 'new_test 1', 'new_test@gmail.com', 'Fresher Software Engineer', 'fnewf j wjf j djf jds jf sjdf jsd', 'Information Technology', 'JAVASCRIPT,PHP,JAVA', 'dhaka', '0', '10$-50$', '', '', '', 13),
(9, 18, 'Employeer', '2016 New', '2016_new@gmail.com', 'New Trainee officer', 'bl;a bla bla ', 'Information Technology', 'PHP', 'dhaka', 'Freelancer', '10$-50$', 'no', 'bsc incse', '', 27),
(10, 20, 'Employeer', 'live 2016', 'live_2016@gmail.com', 'New Trainee Developer', 'bla bla bla', 'Information Technology', 'PHP', 'dhaka', 'Freelancer', '10$-50$', 'no', 'Bsc InCse', '', 26),
(11, 23, 'Employeer', 'shaheen islam', 'shaheenisl25@gmail.com', 'Graphoc designer', 'agfgfgdsg', 'Information Technology', 'PHP', 'gjjghkgfhj', 'Freelancer', '10$-50$', 'gngfngnfg', 'ngfngfngfn', '', 1),
(12, 25, 'Employeer', 'ZerPro PR', 'zerpropr@gmail.com', 'hfghf', 'fhf', 'Information Technology', 'JAVASCRIPT', 'PUERTO RICO', 'local_business', '', '', '', '', 1),
(13, 35, 'Employeer', 'csadasd dsdsad', 'test3@gmail.com', 'web developer55', 'llknknk', 'Information Technology', 'JAVASCRIPT,PHP', 'Caguas', 'Freelancer,Local Business', '10$-50$', '0-1 year', 'High School Diploma', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `message_history`
--

CREATE TABLE IF NOT EXISTS `message_history` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `sender_by` int(11) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `message_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `message_history`
--

INSERT INTO `message_history` (`message_id`, `emp_id`, `job_id`, `freelancer_id`, `message`, `parent_id`, `sender_by`, `subject`, `subject_id`, `message_date`) VALUES
(26, 13, 1, 14, 'n nds nf nds nf', 0, 0, ' nd snf ndsf', 1, '0000-00-00 00:00:00'),
(27, 16, 6, 14, 'hellow world!', 0, 0, 'sms testing', 2, '0000-00-00 00:00:00'),
(28, 16, 6, 14, 'ok done', 0, 14, '0', 2, '0000-00-00 00:00:00'),
(29, 16, 6, 16, 'nfdsbfd bfjsdf', 0, 16, '0', 2, '0000-00-00 00:00:00'),
(30, 17, 7, 14, 'nfjs dfj sdjf jsd jf sdjf', 0, 0, '0', 0, '0000-00-00 00:00:00'),
(31, 18, 9, 19, 'bla bla', 0, 0, 'new sms sending', 3, '0000-00-00 00:00:00'),
(32, 18, 9, 19, '', 0, 0, 'new sms sending shortlist', 4, '0000-00-00 00:00:00'),
(33, 18, 9, 19, 'yes', 0, 19, '0', 3, '0000-00-00 00:00:00'),
(34, 18, 9, 19, 'ok , done', 0, 19, '0', 4, '0000-00-00 00:00:00'),
(35, 18, 9, 18, 'ok', 0, 18, '0', 3, '0000-00-00 00:00:00'),
(36, 18, 9, 18, 'ol', 0, 18, '0', 4, '0000-00-00 00:00:00'),
(37, 20, 10, 21, 'ok', 0, 0, 'primary', 5, '0000-00-00 00:00:00'),
(38, 20, 10, 21, 'ok', 0, 21, '0', 5, '0000-00-00 00:00:00'),
(39, 20, 10, 21, 'jndsjfjjsdf', 0, 0, 'hhh', 6, '0000-00-00 00:00:00'),
(40, 20, 10, 20, 'reply', 0, 20, '0', 6, '0000-00-00 00:00:00'),
(41, 20, 10, 21, 'knkgng j j gj jdfg f', 0, 0, 'ngkknhknkjh', 7, '0000-00-00 00:00:00'),
(42, 20, 10, 21, 'gdgdggn    gdfgdg', 0, 21, '0', 7, '0000-00-00 00:00:00'),
(43, 20, 10, 21, 'tertertert', 0, 21, '0', 7, '0000-00-00 00:00:00'),
(44, 20, 10, 21, 'kgnksdg fdjg djf gd', 0, 20, 'test', 8, '0000-00-00 00:00:00'),
(45, 20, 10, 21, 'nkjwrfwjr wehr', 0, 21, '0', 8, '0000-00-00 00:00:00'),
(46, 20, 10, 21, 'njck dsf sd f sdmf', 0, 21, '0', 8, '2016-10-19 17:29:56');

-- --------------------------------------------------------

--
-- Table structure for table `shortlist`
--

CREATE TABLE IF NOT EXISTS `shortlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `shortlist`
--

INSERT INTO `shortlist` (`id`, `emp_id`, `job_id`, `freelancer_id`) VALUES
(7, 13, 1, 14),
(8, 13, 1, 15),
(9, 16, 6, 14),
(10, 18, 9, 19),
(11, 20, 10, 21),
(12, 25, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `spcialization`
--

CREATE TABLE IF NOT EXISTS `spcialization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(256) NOT NULL,
  `spcialization` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `spcialization`
--

INSERT INTO `spcialization` (`id`, `category_name`, `spcialization`) VALUES
(1, 'Marketing', 'Power Point'),
(2, 'Information Technology', 'JAVASCRIPT'),
(3, 'Information Technology', 'PHP'),
(4, 'test2', 'test3'),
(5, 'test2', 'test33');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile_info`
--

CREATE TABLE IF NOT EXISTS `user_profile_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `company_name` varchar(256) NOT NULL,
  `job_position` varchar(256) NOT NULL,
  `company_type` varchar(256) NOT NULL,
  `job_details` varchar(256) NOT NULL,
  `degree_name` varchar(256) NOT NULL,
  `year` varchar(256) NOT NULL,
  `institue_name` varchar(256) NOT NULL,
  `user_pic_one` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `user_profile_info`
--

INSERT INTO `user_profile_info` (`id`, `user_id`, `user_type`, `user_email`, `name`, `expeted_salary`, `category`, `spcialization`, `description`, `facebook_link`, `twitter_link`, `youtube_link`, `google_plus_link`, `phone_no`, `website`, `city`, `alt_email_address`, `country`, `complete_address`, `company_name`, `job_position`, `company_type`, `job_details`, `degree_name`, `year`, `institue_name`, `user_pic_one`) VALUES
(1, 0, '0', '0', 'Ahsanul Haque Ripon', '535435', 'kfgndfkngfdg', 'one', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has sur', 'hgfhyfgh', 'hgfhgfh', 'hgfhfgh', 'hghgfh', '01750777467', 'gfdgdfg', 'fgdfgfd', 'gdfgdfg', 'gdfgfdg', 'fdgfdg', '', '', '', 'sdgdfgfdg', '', 'gfdgdfgdfgd', '3', ''),
(3, 0, '', 'ali.siddique@technovicinity.com2', 'Ahsanul Haque Ripon', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'Mohakhali,Dhaka,Bangladesh', '', '0', '0', '0', '0', '0', '0', ''),
(4, 0, '0', '0', 'fdsffdsfdsf', '0', '0', '0', '0', 'fdsfdsf', 'fdsfdsf', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', ''),
(5, 4, 'Frelancer', 'ali.siddique@technovicinity.com11', 'Ahsanul Haque Ripon', '1200', 'Softwaredsdsd', '0', '', 'dfcdscx', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '2016', '1', ''),
(6, 5, 'Employeer', 'ali.siddique@technovicinity.com', 'Ahsanul Haque Ripon', '1200', 'Softwaredsdsd', '0', '', 'dfcdscx', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '2016', '1', ''),
(7, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', ''),
(9, 8, 'Frelancer', 'rty@gmail.com', 'Ahsanul Haque23 2444', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '1', 'Tulips1.jpg'),
(10, 9, 'Frelancer', 'abc@gmail.com', 'Ahsanul Haque 2nd', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '1', 'Tulips2.jpg'),
(11, 10, 'Frelancer', 'frelancer30@gmail.com', 'Ahsanul Haque Ripon', '1200', 'Information Technology', 'JAVASCRIPT<br/>PHP', 'md fsf sad f jd f jdsf ', '', '', '', '', '2345435435435', '', '', '', '', 'sdfdsf fdsfsdfdsf', '', '', '1', '', '', '', '1', 'Tulips11.jpg'),
(12, 11, 'Employeer', 'employeer@gmail.com', 'vksdkf dskf sd f', '0', '0', '0', 'fdskfkdskfkdsf j jdsjf dsjf', 'dfsdf', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', 'Penguins3.jpg'),
(13, 12, 'Frelancer', 'abc1234@gmail.com', 'Ahsanul Haque gdfgfdg', '', 'Information Technology', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '1', 'Lighthouse.jpg'),
(14, 13, 'Employeer', 'employeersagor@gmail.com', 'Sagor Hasan', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', 'technovicinity4.png'),
(15, 14, 'Frelancer', 'frelancersagor@gmail.com', 'frelancer sagor', '', 'Information Technology', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '1', 'Tulips14.jpg'),
(16, 15, 'Frelancer', 'riponfreelancer@gmail.com', 'Ripon Freelancer', '1000', 'Information Technology', '', 'This Course covers the full perspective of everything going on of the field of Sound Healing and Sound Therapy. It gives you a good overview of the basic structure of sound and how it can be used for meditation, relaxation, learning, productivity, healing ', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '1', 'dft.jpg'),
(17, 16, 'Employeer', 'ripontest2016@gmail.com', 'test-2016', '0', '0', '', 'mndfk sdf jf jdsfnf nsdfnsdf', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', 'technovicinity42.png'),
(18, 17, 'Employeer', 'new_test@gmail.com', 'new_test 1', '0', '0', '', 'mf mwd fe rr re jner t', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', 'brochurebutton.gif'),
(19, 18, 'Employeer', '2016_new@gmail.com', '2016 New', '0', '0', '', 'bla bla bla  bla', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', 'technovicinity410.png'),
(20, 19, 'Frelancer', '2016_new_free@gmail.com', '2016 New free', '1,00000', 'JAVASCRIPT,PHP', '', 'bla bla bla', '', '', '', '', '', '', '', '', '', '', 'bla bla', 'Web Developer ', '1', 'dfs fm sdf dsf dsf', 'Bsc in Cse', '2013', '1', '041.jpg'),
(21, 20, 'Employeer', 'live_2016@gmail.com', 'live 2016', '0', '0', '0', 'bla bla', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', 'Tulips26.jpg'),
(22, 21, 'Frelancer', 'live_free@gmail.com', 'live Freelancer', '100000', 'Information Technology', 'JAVASCRIPT,PHP', 'nkjbj k kj bkj bj', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '1', '01.jpg'),
(23, 23, 'Employeer', 'shaheenisl25@gmail.com', 'shaheen islam', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', 'Shaheen-01.jpg'),
(24, 25, 'Employeer', 'zerpropr@gmail.com', 'ZerPro PR', '0', '0', '0', 'jhvhgcvjb,j ', '', '', '', '', '555-555-2222', 'www.zerpropr.com', 'Puerto Rico', '', 'Puerto Rico', '', '0', '0', '0', '0', '0', '0', '0', 'ZerPro_-_Copy.png'),
(25, 35, 'Employeer', 'test3@gmail.com', 'csadasd dsdsad', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', 'sdr.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_registration_info`
--

CREATE TABLE IF NOT EXISTS `user_registration_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(250) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_city` varchar(256) NOT NULL,
  `user_tel` varchar(256) NOT NULL,
  `user_address` varchar(256) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `user_registration_info`
--

INSERT INTO `user_registration_info` (`id`, `user_type`, `first_name`, `last_name`, `user_email`, `user_city`, `user_tel`, `user_address`, `user_password`) VALUES
(2, 'admin', 'Ahsanul Haque', 'Ahsanul', 'riponcse2015@gmail.com', '', '', '', 'admin'),
(3, 'Frelancer', 'Ahsanul Haque', 'gdfgfdg', 'riponcse535@yahoo.com', '', '', '', 'rtcworld'),
(4, 'Frelancer', 'Ahsanul Haque', 'Ripon', 'ali.siddique@technovicinity.com', '', '', '', 'admin'),
(5, 'Employeer', 'Test', 'Employeer', 'test@gmail.com', '', '', '', 'rtcworld'),
(6, 'Frelancer', 'Test', 'Freelancer', 'frelancer@gmail.com', '', '', '', 'rtcworld'),
(8, 'Frelancer', 'Ahsanul Haque23', '2444', 'rty@gmail.com', '', '', '', 'rtcworld'),
(9, 'Frelancer', 'Ahsanul Haque', '2nd', 'abc@gmail.com', '', '', '', 'rtcworld'),
(10, 'Frelancer', 'Ahsanul Haque', 'Ripon', 'frelancer30@gmail.com', '', '', '', 'admin'),
(11, 'Employeer', 'Ahsanul Haque', 'sdsd', 'employeer@gmail.com', '', '', '', 'admin'),
(12, 'Frelancer', 'Ahsanul Haque', 'gdfgfdg', 'abc1234@gmail.com', '', '', '', 'admin'),
(13, 'Employeer', 'sagor', 'hasan', 'employeersagor@gmail.com', '', '', '', 'admin'),
(14, 'Frelancer', 'frelancer', 'sagor', 'frelancersagor@gmail.com', '', '', '', 'admin'),
(15, 'Frelancer', 'Ripon', 'Freelancer', 'riponfreelancer@gmail.com', '', '', '', 'admin'),
(16, 'Employeer', 'Ripon', 'Test-2016', 'ripontest2016@gmail.com', '', '', '', 'admin'),
(17, 'Employeer', 'new_test', '1', 'new_test@gmail.com', '', '', '', '1234'),
(18, 'Employeer', '2016', 'New', '2016_new@gmail.com', '', '', '', '1234'),
(19, 'Frelancer', '2016', 'New free', '2016_new_free@gmail.com', '', '', '', '1234'),
(20, 'Employeer', 'live', '2016', 'live_2016@gmail.com', '', '', '', '1234'),
(21, 'Frelancer', 'live', 'Freelancer', 'live_free@gmail.com', '', '', '', '1234'),
(22, 'Frelancer', 'live97', 'fdsfsd', 'live97@gmail.com', '', '', '', '1234'),
(23, 'Employeer', 'shaheen', 'islam', 'shaheenisl25@gmail.com', '', '', '', '12345678'),
(24, '0', '0', '0', '0', '', '', '', '0'),
(25, 'Employeer', 'ZerPro', 'PR', 'zerpropr@gmail.com', '', '', '', 'zerpropr'),
(26, 'Frelancer', 'dffsdf', 'sdfdsf', 'sdf@gmail.com', 'Dhaka', '0', '0', '0'),
(27, 'Employeer', 'Lipan', 'Dutta', 'lipan@technovicinity.com', '0', '123456123', 'test address', '0'),
(28, 'Frelancer', 'Lipan', 'Dutta', 'lipan.dutta@gmail.com', 'Kurbin', '0', '0', '0'),
(29, 'Employeer', '', '', 'zerpropr@gmail.com', '0', '', '', '0'),
(30, 'Frelancer', '', '', 'zerpropr@gmail.com', '0', '0', '0', '0'),
(31, 'Frelancer', 'ajmean', 'Ferdosh', 'aj_ripon@gmail.com', '0', '0i40234', 'ndasdnsajdsad', '12345678'),
(32, 'Employeer', 'fggd', 'dfgdfg', 'rty@hmil.com', 'Canovanas', '0', '0', '12345678'),
(33, 'Frelancer', 'jfnjsdfsdf', 'sdfsdf', 'riponcse2013@gmail.com', '0', '3213213', '312313123', '12345678'),
(34, 'Employeer', 'wer', 'rew', 'riponcse2013@gmail.com', 'Caguas', '0', '0', '12345678'),
(35, 'Employeer', 'csadasd', 'dsdsad', 'test3@gmail.com', 'Camuy', '0', '0', '12345678'),
(36, 'Frelancer', 'test freelancer', 'last', 'lipan@technovicinity.com', '0', '321321321', 'test address', '123456'),
(37, 'Employeer', 'test employer', 'last', 'lipan.dutta@gmail.com', 'Catano', '0', '0', '123456');

CREATE TABLE `image_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `file_name` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
