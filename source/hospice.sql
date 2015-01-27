-- phpMyAdmin SQL Dump
-- version 2.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 26, 2015 at 10:18 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `hospice`
--

-- --------------------------------------------------------

--
-- Table structure for table `hos_admin`
--

CREATE TABLE `hos_admin` (
  `id` int(20) NOT NULL auto_increment,
  `first_name` text NOT NULL,
  `middle_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hos_admin`
--

INSERT INTO `hos_admin` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `password`) VALUES
(1, 'Winnie', 'Chepkosgei', 'C', 'winniechepkosgei@gmail.com', 'admin1234'),
(2, 'welly', 'bett', 'ouko', 'kk@gmail.com', '12345kip');

-- --------------------------------------------------------

--
-- Table structure for table `hos_doctor`
--

CREATE TABLE `hos_doctor` (
  `id` int(20) NOT NULL auto_increment,
  `first_name` text NOT NULL,
  `middle_name` text NOT NULL,
  `last_name` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `specialization` varchar(100) NOT NULL,
  `duty` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `hospital_id` int(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `hos_doctor`
--

INSERT INTO `hos_doctor` (`id`, `first_name`, `middle_name`, `last_name`, `title`, `specialization`, `duty`, `phone`, `address`, `email`, `hospital_id`, `password`) VALUES
(2, 'Derrick', 'M', 'Mwiti', 'Mr.', 'Doctor', 'On-Leave', '0716366956', '111 Kemu, Meru', 'derrickmwiti@gmail.com', 1, '112233'),
(3, 'Benard', 'Kiplangat', 'Towett', 'Mr.', 'Surgery', 'On-Call', '07000', '45, Kericho', 'towettbenard@yahoo.com', 1, 'ec3ae4c2e5e70da48466578603f8efce'),
(8, 'Eunice', 'W', 'Chege', 'Ms.', 'Surgery', 'On-Duty', '0726774644', '123456, Kemu', 'eunychege@gmail.com', 1, '1024chege'),
(9, 'weldon', 'bett', 'kip', 'surgeon', 'head surgery', 'On-Duty', '0716844016', '24 , ltn', 'kup@gmarl.com', 1, 'd93591bdf7860e1e4ee2fca799911215');

-- --------------------------------------------------------

--
-- Table structure for table `hos_drugs`
--

CREATE TABLE `hos_drugs` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `hos_drugs`
--

INSERT INTO `hos_drugs` (`id`, `name`, `quantity`) VALUES
(1, 'Aspirine', 168),
(2, 'Panadol', 500),
(3, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hos_hospital`
--

CREATE TABLE `hos_hospital` (
  `id` int(20) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `hos_hospital`
--

INSERT INTO `hos_hospital` (`id`, `name`, `location`) VALUES
(1, 'Meru Hospital', 'Meru, Kenya'),
(2, 'Nyeri Hospice', 'Nyeri, Kenya'),
(3, 'Thika Hospice', 'Thika, Kenya');

-- --------------------------------------------------------

--
-- Table structure for table `hos_message`
--

CREATE TABLE `hos_message` (
  `id` int(10) NOT NULL auto_increment,
  `receiver` int(10) NOT NULL,
  `sender` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date` varchar(100) NOT NULL,
  `type` int(10) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `hos_message`
--

INSERT INTO `hos_message` (`id`, `receiver`, `sender`, `title`, `message`, `date`, `type`, `status`) VALUES
(1, 8, 1, 'TRIAL MESSAGE', 'the message details should go here', '01/03/2014', 1, 1),
(4, 1, 8, 'THE SUBJECT HERE', 'The message body goes here!', '03/03/2014', 1, 1),
(6, 8, 2, 'From patient', 'Here is the message', '03/03/2014', 1, 1),
(7, 2, 2, 'CV APPlication', 'there message!!', '16/03/2014', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hos_news`
--

CREATE TABLE `hos_news` (
  `id` int(10) NOT NULL auto_increment,
  `date` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `news` varchar(500) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `hos_news`
--

INSERT INTO `hos_news` (`id`, `date`, `title`, `news`) VALUES
(7, '23-02-2014', 'News title goes here', '\r\n\r\nThis example is a quick exercise to illustrate how the default, static and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.\r\n\r\nTo see the difference between static and fixed top navbars, just scroll.\r\n'),
(8, '23-02-2014', 'Another news', '\r\n\r\nThis example is a quick exercise to illustrate how the default, static and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.\r\n\r\nTo see the difference between static and fixed top navbars, just scroll.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `hos_patient`
--

CREATE TABLE `hos_patient` (
  `id` int(20) NOT NULL auto_increment,
  `first_name` text NOT NULL,
  `middle_name` text NOT NULL,
  `last_name` text NOT NULL,
  `gender` text NOT NULL,
  `date_of_birth` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `nationality` text NOT NULL,
  `registration_date` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `hos_patient`
--

INSERT INTO `hos_patient` (`id`, `first_name`, `middle_name`, `last_name`, `gender`, `date_of_birth`, `address`, `email`, `phone`, `nationality`, `registration_date`, `password`) VALUES
(1, 'Davies', 'Onseri', 'Mogire', 'Male', '14-01-2014', '4554, Kisii ', 'obisadavis@gmail.com', '0700', 'Kenyan', '15-02-2014', '123'),
(2, 'Joseph', 'Njuguna ', 'Ikua', 'male', '21-7-1991', '45 Eldoret, Kenya', 'njugunacess@gmail.com', '07000', 'Kenyan', '18-02-2014', '123'),
(4, 'James', 'Mwaniki', 'Gakungu', 'male', '1-1-1989', '566, Njoro', 'jematt85@gmail.com', '07000', 'Kenyan', '18-02-2014', '123456'),
(5, 'wesly', 'rono', 'kiptoo', 'male', '7-7-1953', '32 bmt', 'wessy@yahoo.com', '072343216', 'kenyan', '25-04-2014', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `hos_treatment`
--

CREATE TABLE `hos_treatment` (
  `id` int(20) NOT NULL auto_increment,
  `patient_id` int(100) NOT NULL,
  `doctor_id` int(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `bp` varchar(100) NOT NULL,
  `cr` varchar(100) NOT NULL,
  `rr` varchar(100) NOT NULL,
  `temp` int(100) NOT NULL,
  `weight` int(100) NOT NULL,
  `complaint` varchar(100) NOT NULL,
  `medication` varchar(1000) NOT NULL,
  `quantity` int(10) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `next_visit` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `hos_treatment`
--

INSERT INTO `hos_treatment` (`id`, `patient_id`, `doctor_id`, `date`, `time`, `bp`, `cr`, `rr`, `temp`, `weight`, `complaint`, `medication`, `quantity`, `remarks`, `next_visit`) VALUES
(1, 1, 8, '20-Feb-2014', '', '150', '10', '55', 32, 65, 'Stomachache', 'Flagyl, Actals', 0, 'Should drink plenty water', ''),
(2, 1, 8, '20-Feb-2014', '', '150', '10', '55', 32, 65, 'Stomachache', 'Flagyl, Actals', 0, 'Should drink plenty water', ''),
(3, 4, 8, '20-Feb-2014', '', '150', '10', '55', 31, 60, 'Stomachache', 'Actals', 0, 'stop eating too much', ''),
(5, 1, 8, '20-Feb-2014', '', '150', '10', '55', 30, 65, 'Eyes', 'I don knw', 0, 'Too much use of computer', ''),
(6, 2, 8, '20-Feb-2014', '', '150', '10', '55', 30, 90, 'Headache', 'Headex', 0, 'Stop thinking too much', ''),
(10, 4, 8, '20-Feb-2014', '21:48', '150', '10', '55', 32, 60, 'Cold', 'Cofta', 0, 'Dont stay on the cold', ''),
(11, 2, 2, '21-Feb-2014', '18:06', '150', '10', '55', 32, 90, 'Malaria', 'Antimalaria', 0, 'Use mosquito nets', ''),
(12, 4, 9, '27-Feb-2014', '11:48', '150', '10', '55', 32, 65, 'Stomachache', 'Anything', 0, 'Anything', ''),
(13, 1, 8, '05-Mar-2014', '01:19', '150', '10', '55', 32, 60, 'Headache', 'Headex', 0, 'Remarks', '03/06/2014'),
(14, 1, 8, '17-Mar-2014', '07:22', '150', '10', '50', 32, 65, 'Headache', 'Aspirine', 10, 'Eat well', '03/20/2014'),
(15, 1, 8, '25-Mar-2014', '00:43', '150', '10', '50', 32, 65, 'head', 'Aspirine', 10, 'water', '03/28/2014'),
(16, 5, 9, '25-Apr-2014', '09:51', '43', '3', '56', 34, 67, 'malaria', 'Aspirine', 12, 'have enough rest and sleep under treated mosquito net.', '04/30/2014');
