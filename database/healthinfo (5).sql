-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 02, 2013 at 01:09 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `healthinfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `residence` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_no` int(15) NOT NULL,
  `email` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `centers_routine`
--

CREATE TABLE IF NOT EXISTS `centers_routine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `opening_time` time NOT NULL,
  `closing_time` time NOT NULL,
  `day` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `center_id` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `centers_routine`
--

INSERT INTO `centers_routine` (`id`, `opening_time`, `closing_time`, `day`, `center_id`) VALUES
(1, '07:00:00', '18:00:00', 'Monday - Saturday', 1),
(2, '08:30:00', '14:00:00', 'Sunday', 1);

-- --------------------------------------------------------

--
-- Table structure for table `center_admin`
--

CREATE TABLE IF NOT EXISTS `center_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `residence` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_no` int(15) NOT NULL,
  `email` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `center_id` int(4) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `center_admin`
--

INSERT INTO `center_admin` (`id`, `first_name`, `middle_name`, `last_name`, `dob`, `sex`, `residence`, `mobile_no`, `email`, `center_id`, `user_id`) VALUES
(1, 'Jeremiah', 'M', 'Manyanda', '1989-06-17', 'M', 'Mlalakuwa', 0, '', 1, 19);

-- --------------------------------------------------------

--
-- Table structure for table `center_events`
--

CREATE TABLE IF NOT EXISTS `center_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `event_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `event_description` text COLLATE utf8_unicode_ci NOT NULL,
  `venue` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `organizer` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('to come','cancelled','passed','must attend') COLLATE utf8_unicode_ci NOT NULL,
  `center_id` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `district` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `region_id` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `district`, `region_id`) VALUES
(1, 'Knondoni', 1),
(2, 'Ilala', 1),
(3, 'Temeke', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `residence` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_no` int(15) NOT NULL,
  `specialization` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `office_no` int(3) NOT NULL,
  `email` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `center_id` int(4) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `first_name`, `middle_name`, `last_name`, `dob`, `sex`, `residence`, `mobile_no`, `specialization`, `office_no`, `email`, `center_id`, `user_id`) VALUES
(1, 'omar', 'shabani', 'shekidere', '0000-00-00', '', '', 2147483647, '', 0, '', 1, 0),
(3, 'CONSOLATA', 'SEJA', '', '0000-00-00', '', '', 2147483647, '', 0, '', 1, 0),
(4, 'ALBERT', 'HAULE', '', '1977-04-08', '', '', 2147483647, '', 0, '', 1, 1),
(5, 'MARIA', 'MALANDO', '', '0000-00-00', '', '', 2147483647, '', 0, '', 1, 0),
(6, 'BENEDICT', 'NDUNGURU', '', '0000-00-00', '', '', 2147483647, '', 0, '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faq_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `faq_topic` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `faq_content` text COLLATE utf8_unicode_ci NOT NULL,
  `posted_by` int(11) NOT NULL,
  `date_posted` datetime NOT NULL,
  `category` int(3) NOT NULL DEFAULT '0',
  `related_to` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `faq_title`, `faq_topic`, `faq_content`, `posted_by`, `date_posted`, `category`, `related_to`) VALUES
(4, 'What are the ways of preventing malaria?', 'Malaria prevention', '0', 1, '2013-04-12 13:28:19', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `health_centers`
--

CREATE TABLE IF NOT EXISTS `health_centers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `center_name` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `center_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `region_id` int(2) NOT NULL,
  `district_id` int(3) NOT NULL,
  `location` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `center_category` int(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `health_centers`
--

INSERT INTO `health_centers` (`id`, `center_name`, `center_code`, `region_id`, `district_id`, `location`, `center_category`) VALUES
(1, 'UDSM Dispensary', 'UDSM', 1, 1, 'Ubungo - UDSM main campus', 0);

-- --------------------------------------------------------

--
-- Table structure for table `health_centers_category`
--

CREATE TABLE IF NOT EXISTS `health_centers_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `health_center_admin`
--

CREATE TABLE IF NOT EXISTS `health_center_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `center_id` int(4) NOT NULL,
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `messegeinfo`
--

CREATE TABLE IF NOT EXISTS `messegeinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sender_status` int(1) NOT NULL,
  `receiver_status` int(1) NOT NULL,
  `message_status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `messegeinfo`
--

INSERT INTO `messegeinfo` (`id`, `sender_id`, `receiver_id`, `message`, `sender_status`, `receiver_status`, `message_status`) VALUES
(1, 0, 0, 'From System Administrator :You have been registered to Secure M-Health services based on SMS. Your username is:q and password is:240460.Thanks.', 0, 0, 0),
(2, 0, 0, 'From System Administrator :You have been registered to Secure M-Health services based on SMS. Your username is:x and password is:936224.Thanks.', 0, 0, 0),
(3, 0, 0, 'From System Administrator :You have been registered to Secure M-Health services based on SMS. Your username is:joa and password is:259878.Thanks.', 0, 0, 0),
(4, 0, 0, 'From System Administrator :You have been registered to Secure M-Health services based on SMS. Your username is:s and password is:130404.Thanks.', 0, 0, 0),
(5, 0, 0, 'From System Administrator :You have been registered to Secure M-Health services based on SMS. Your username is:w and password is:843664.Thanks.', 0, 0, 0),
(6, 0, 0, 'From System Administrator :You have been registered to Secure M-Health services based on SMS. Your username is:dock and password is:365429.Thanks.', 0, 0, 0),
(7, 0, 0, 'From System Administrator :You have been registered to Secure M-Health services based on SMS. Your username is:p and password is:570901.Thanks.', 0, 0, 0),
(8, 0, 0, 'From System Administrator :You have been registered to Secure M-Health services based on SMS. Your username is:f and password is:228265.Thanks.', 0, 0, 0),
(9, 0, 0, 'From System Administrator :You have been registered to Secure M-Health services based on SMS. Your username is:l and password is:723117.Thanks.', 0, 0, 0),
(10, 0, 0, 'From System Administrator :You have been registered to Secure M-Health services based on SMS. Your username is:e and password is:760388.Thanks.', 0, 0, 0),
(11, 0, 0, 'From System Administrator :You have been registered to Secure M-Health services based on SMS. Your username is:ben and password is:252627.Thanks.', 0, 0, 0),
(12, 0, 0, 'From System Administrator :You have been registered to Secure M-Health services based on SMS. Your username is:bening''na and password is:426129.Thanks.', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `message` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL,
  `targeted_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE IF NOT EXISTS `nurse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `nurse_level` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `work_section` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `residence` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_no` int(15) NOT NULL,
  `email` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `residence` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_no` int(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `patient_history`
--

CREATE TABLE IF NOT EXISTS `patient_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `problem` text COLLATE utf8_unicode_ci NOT NULL,
  `treatment_description` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `reg_name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `reg_name`) VALUES
(1, 'Dar es salaam'),
(2, 'Dodoma'),
(3, 'Arusha'),
(4, 'Kagera'),
(5, 'Morogoro'),
(6, 'Mbeya');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `review_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `review_topic` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `review_content` text COLLATE utf8_unicode_ci NOT NULL,
  `posted_by` int(11) NOT NULL,
  `date_posted` datetime NOT NULL,
  `category` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `review_title`, `review_topic`, `review_content`, `posted_by`, `date_posted`, `category`) VALUES
(2, 'Causes of Malaria', 'Causes of Malaria', 'malaria is caused by...      ', 1, '2013-04-12 11:23:24', 1),
(3, 'How to prevent malaria', 'Malaria prevention', 'Anything....      ', 1, '2013-04-12 11:36:02', 1),
(6, 'Ways to handle/care infected person', 'Care to infected', 'It is .....      ', 1, '2013-04-24 10:05:20', 2),
(7, 'Burns', '', 'It may happen anytime      ', 1, '2013-04-24 10:22:31', 3),
(8, '0', '0', '0', 1, '2013-04-24 10:22:31', 0),
(9, '0', '0', '0', 1, '2013-04-24 10:24:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reviews_faq_category`
--

CREATE TABLE IF NOT EXISTS `reviews_faq_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `reviews_faq_category`
--

INSERT INTO `reviews_faq_category` (`id`, `cat_name`, `description`) VALUES
(1, 'Malaria ', ''),
(2, 'HIV/AIDS', ''),
(3, 'Skin diseases', ''),
(4, 'STIs', '');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE IF NOT EXISTS `timetable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `nurse1_id` int(11) NOT NULL,
  `nurse2_id` int(11) NOT NULL,
  `session` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `doctor_id`, `nurse1_id`, `nurse2_id`, `session`, `date`) VALUES
(1, 1, 0, 0, 1, '2013-04-05'),
(2, 3, 0, 0, 2, '2013-04-05'),
(3, 4, 0, 0, 3, '2013-04-05'),
(4, 5, 0, 0, 3, '2013-04-05'),
(5, 6, 0, 0, 1, '2013-04-06'),
(6, 0, 0, 0, 0, '0000-00-00'),
(7, 0, 0, 0, 0, '0000-00-00'),
(8, 0, 0, 0, 0, '0000-00-00'),
(9, 0, 0, 0, 0, '0000-00-00'),
(10, 0, 0, 0, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `timetable_sessions`
--

CREATE TABLE IF NOT EXISTS `timetable_sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `timetable_sessions`
--

INSERT INTO `timetable_sessions` (`id`, `session_name`, `start_time`, `end_time`) VALUES
(1, 'morning', '07:00:00', '14:00:00'),
(2, 'afternoon', '14:00:00', '22:00:00'),
(3, 'night', '22:00:00', '06:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE IF NOT EXISTS `userinfo` (
  `username` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_joined` datetime NOT NULL,
  `last_log_in` datetime NOT NULL,
  `user_type` int(1) NOT NULL,
  `specific_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`username`, `password`, `date_joined`, `last_log_in`, `user_type`, `specific_id`, `id`) VALUES
('albert', '6c5bc43b443975b806740d8e41146479', '0000-00-00 00:00:00', '2012-06-06 14:21:51', 3, 0, 1),
('admin', '21232f297a57a5a743894a0e4a801fc3', '2012-05-08 13:17:16', '2012-06-14 10:43:37', 5, 0, 2),
('patient', 'b39024efbc6de61976f585c8421c6bba', '2012-05-08 13:20:03', '2012-05-29 08:49:27', 1, 0, 3),
('jerry', '30035607ee5bb378c71ab434a6d05410', '2013-04-04 16:35:26', '0000-00-00 00:00:00', 4, 0, 19);

-- --------------------------------------------------------

--
-- Table structure for table `user_actions`
--

CREATE TABLE IF NOT EXISTS `user_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `actor_id` int(6) NOT NULL,
  `action` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `action_description` varchar(200) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
