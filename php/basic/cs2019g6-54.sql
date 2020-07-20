-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2020 at 06:40 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs2019g6`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_reminder`
--

CREATE TABLE `admin_reminder` (
  `admin_id` varchar(50) NOT NULL,
  `admin_reminder` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_reminder`
--

INSERT INTO `admin_reminder` (`admin_id`, `admin_reminder`, `date_time`) VALUES
('admin1', 'heta wada mata', '2020-07-19 22:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `baby_register`
--

CREATE TABLE `baby_register` (
  `baby_id` varchar(50) NOT NULL,
  `baby_first_name` varchar(50) DEFAULT NULL,
  `baby_last_name` varchar(60) DEFAULT NULL,
  `baby_dob` date DEFAULT NULL,
  `baby_gender` varchar(6) DEFAULT NULL,
  `register_date` date DEFAULT NULL,
  `midwife_id` varchar(50) DEFAULT NULL,
  `mother_nic` varchar(12) DEFAULT NULL,
  `mother_age` int(3) DEFAULT NULL,
  `status` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baby_register`
--

INSERT INTO `baby_register` (`baby_id`, `baby_first_name`, `baby_last_name`, `baby_dob`, `baby_gender`, `register_date`, `midwife_id`, `mother_nic`, `mother_age`, `status`) VALUES
('001/05/2020/1000', 'Hasitha', 'Bhagya', '2020-05-05', 'M', '2020-05-11', 'midwife1', '950000001', 25, 'active'),
('002/05/2020/1000', 'Ama', 'Charuni', '2020-05-06', 'F', '2020-05-11', 'midwife1', '950000001', 27, 'active'),
('008/05/2020/1000', 'asdasf', 'dfdgfg', '2020-05-06', 'M', '2020-05-20', 'midwife1', '950000001', 15, 'inactive'),
('009/06/2020/1000', 'test', 'baby', '2020-06-06', 'M', '2020-06-07', 'midwife1', '950000001', 28, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `birth_details`
--

CREATE TABLE `birth_details` (
  `baby_id` varchar(50) DEFAULT NULL,
  `midwife_id` varchar(50) DEFAULT NULL,
  `birth_weight` float DEFAULT NULL,
  `birth_length` float DEFAULT NULL,
  `health_states` varchar(200) DEFAULT NULL,
  `apgar1` tinyint(1) DEFAULT NULL,
  `apgar2` tinyint(1) DEFAULT NULL,
  `apgar3` tinyint(1) DEFAULT NULL,
  `circumference_of_head` float DEFAULT NULL,
  `vitamin_K_status` varchar(50) DEFAULT NULL,
  `eye_contact` varchar(20) DEFAULT NULL,
  `milk_position` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `birth_details`
--

INSERT INTO `birth_details` (`baby_id`, `midwife_id`, `birth_weight`, `birth_length`, `health_states`, `apgar1`, `apgar2`, `apgar3`, `circumference_of_head`, `vitamin_K_status`, `eye_contact`, `milk_position`) VALUES
('001/05/2020/1000', 'midwife1', 4.1, 56, 'Good', 1, 1, 2, 20.5, 'No', 'Normal', 'Cross-cradle position'),
('002/05/2020/1000', 'midwife1', 4, 57, 'Good', 1, 1, 2, 16.5, 'Yes', 'Good', 'Cross-cradle position'),
('008/05/2020/1000', 'midwife1', 4.2, 58, 'Good', 1, 2, 2, 12.5, 'No', 'Good', 'Cradle position'),
('009/06/2020/1000', 'midwife1', 4.5, 59, 'Weak', 1, 1, 1, 16.3, 'No', 'Normal', 'Side-lying position');

-- --------------------------------------------------------

--
-- Table structure for table `child_health_note`
--

CREATE TABLE `child_health_note` (
  `baby_id` varchar(50) NOT NULL,
  `midwife_id` varchar(50) NOT NULL,
  `baby_age_group` varchar(50) NOT NULL,
  `baby_age_group_id` int(2) NOT NULL,
  `eye_size` varchar(2) NOT NULL,
  `squint` varchar(2) NOT NULL,
  `retina` varchar(2) NOT NULL,
  `cornea` varchar(2) NOT NULL,
  `eye_movement` varchar(2) NOT NULL,
  `hearing` varchar(2) NOT NULL,
  `weight` varchar(2) NOT NULL,
  `height` varchar(2) NOT NULL,
  `development` varchar(2) NOT NULL,
  `heart` varchar(2) NOT NULL,
  `hip` varchar(2) NOT NULL,
  `other` varchar(200) NOT NULL,
  `doctor_id` varchar(50) NOT NULL,
  `clinic_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `child_health_note`
--

INSERT INTO `child_health_note` (`baby_id`, `midwife_id`, `baby_age_group`, `baby_age_group_id`, `eye_size`, `squint`, `retina`, `cornea`, `eye_movement`, `hearing`, `weight`, `height`, `development`, `heart`, `hip`, `other`, `doctor_id`, `clinic_date`) VALUES
('001/05/2020/1000', 'midwife1', '1st Month', 1, 'O', 'O', 'O', 'O', 'O', 'O', 'N', 'NH', 'O', 'O', 'O', ' ', 'doctor1', '2020-05-08'),
('001/05/2020/1000', 'midwife1', 'After 2nd Month', 2, 'O', 'O', 'O', 'O', 'O', 'O', 'N', 'NH', 'O', 'O', 'O', ' ', 'doctor1', '2020-05-13'),
('002/05/2020/1000', 'midwife1', '1st Month', 1, 'O', 'O', 'O', 'O', 'O', 'O', 'N', 'NH', 'O', 'O', 'O', ' ', 'doctor1', '2020-06-17'),
('001/05/2020/1000', 'midwife1', 'After 4th Month', 3, 'X', 'X', 'O', 'O', 'O', 'O', 'N', 'NH', 'O', 'O', 'O', ' ', 'doctor1', '2020-06-17'),
('001/05/2020/1000', 'midwife1', 'After 6th Month', 4, 'O', 'O', 'O', 'O', 'O', 'O', 'N', 'NH', 'O', 'O', 'O', ' ', 'doctor1', '2020-06-04'),
('001/05/2020/1000', 'midwife1', 'After 9th Month', 5, 'O', 'O', 'O', 'O', 'O', 'O', 'N', 'NH', 'O', 'O', 'O', ' ', 'doctor1', '2020-06-09'),
('001/05/2020/1000', 'midwife1', 'After 12th Month', 6, 'O', 'O', 'O', 'O', 'O', 'O', 'N', 'NH', 'O', 'O', 'O', ' ', 'doctor1', '2020-07-01'),
('001/05/2020/1000', 'midwife1', 'After 18th Month', 7, 'O', 'O', 'O', 'O', 'O', 'O', 'N', 'NH', 'O', 'O', 'O', ' ', 'doctor1', '2020-06-19'),
('001/05/2020/1000', 'midwife1', 'After 3rd Year', 8, 'O', 'O', 'O', 'O', 'O', 'O', 'N', 'NH', 'O', 'O', 'O', ' ', 'doctor1', '2020-07-02'),
('002/05/2020/1000', 'midwife1', 'After 2nd Month', 2, 'O', 'O', 'O', 'O', 'O', 'O', 'N', 'NH', 'O', 'O', 'O', ' ', 'doctor1', '2020-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` varchar(50) NOT NULL,
  `doctor_name` varchar(50) DEFAULT NULL,
  `doctor_division` varchar(30) DEFAULT NULL,
  `doctor_moh_division` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `doctor_name`, `doctor_division`, `doctor_moh_division`) VALUES
('doctor1', 'Nirmal Silva', 'Narammala', 1000),
('doctor2', 'Saman Soyza', 'Kiwulgalla', 1053);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_message`
--

CREATE TABLE `doctor_message` (
  `doctor_id` varchar(50) DEFAULT NULL,
  `sender` varchar(50) DEFAULT NULL,
  `doctor_message` varchar(500) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_message`
--

INSERT INTO `doctor_message` (`doctor_id`, `sender`, `doctor_message`, `date`, `time`, `status`) VALUES
('doctor1', 'midwife1', 'i have o leave now', '2020-05-31', '23:10:14', 'unread'),
('doctor1', 'midwife1', 'what are you doing now?', '2020-05-31', '23:10:25', 'read'),
('doctor1', 'midwife1', 'ada hodama dawasa', '2020-06-01', '00:15:25', 'read'),
('doctor1', 'midwife1', 'what happen on meeting??', '2020-06-01', '12:57:10', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `doc_thriposha`
--

CREATE TABLE `doc_thriposha` (
  `id` int(11) NOT NULL,
  `remain_amount` int(11) NOT NULL,
  `required_amount` int(11) NOT NULL,
  `expired_amount` int(11) NOT NULL,
  `nested_amount` int(11) NOT NULL,
  `month` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doc_thriposha`
--

INSERT INTO `doc_thriposha` (`id`, `remain_amount`, `required_amount`, `expired_amount`, `nested_amount`, `month`) VALUES
(2, 2, 2, 2, 2, '2020-06-17');

-- --------------------------------------------------------

--
-- Table structure for table `growth`
--

CREATE TABLE `growth` (
  `baby_id` varchar(50) DEFAULT NULL,
  `midwife_id` varchar(50) DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  `baby_age_in_months` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `growth`
--

INSERT INTO `growth` (`baby_id`, `midwife_id`, `weight`, `height`, `baby_age_in_months`, `date`, `id`) VALUES
('001/05/2020/1000', 'midwife1', 4.1, 56, 0, '2018-03-03 14:00:37', 1),
('002/05/2020/1000', 'midwife1', 4.7, 57, 1, '2020-06-07 16:03:33', 2),
('001/05/2020/1000', 'midwife1', 4.7, 58, 1, '2018-04-04 14:00:37', 10),
('001/05/2020/1000', 'midwife1', 5, 60, 2, '2018-05-03 14:08:42', 11),
('001/05/2020/1000', 'midwife1', 5.6, 61, 3, '2018-06-05 14:08:35', 12),
('001/05/2020/1000', 'midwife1', 5.7, 62, 4, '2018-07-02 14:00:37', 13),
('001/05/2020/1000', 'midwife1', 6, 64, 5, '2018-08-01 14:00:37', 14),
('001/05/2020/1000', 'midwife1', 6.2, 67, 6, '2018-09-07 14:00:37', 15),
('001/05/2020/1000', 'midwife1', 6.8, 68, 7, '2018-10-05 14:50:59', 16),
('001/05/2020/1000', 'midwife1', 7.1, 70, 8, '2018-11-07 14:00:37', 17),
('001/05/2020/1000', 'midwife1', 7.6, 73, 9, '2018-12-04 14:00:37', 18),
('001/05/2020/1000', 'midwife1', 8.2, 74, 10, '2019-01-01 14:00:37', 19),
('001/05/2020/1000', 'midwife1', 8.7, 75, 11, '2019-02-07 14:00:37', 20),
('001/05/2020/1000', 'midwife1', 8.9, 77, 12, '2019-03-03 14:55:21', 21),
('001/05/2020/1000', 'midwife1', 9.2, 78, 13, '2019-04-07 14:00:37', 22),
('001/05/2020/1000', 'midwife1', 11, 86, 19, '2019-05-01 14:00:37', 23),
('001/05/2020/1000', 'midwife1', 9.7, 79, 14, '2019-06-06 14:00:37', 24),
('001/05/2020/1000', 'midwife1', 9.9, 81, 15, '2019-07-03 14:00:37', 25),
('001/05/2020/1000', 'midwife1', 10.1, 82, 16, '2019-08-10 14:00:37', 26),
('001/05/2020/1000', 'midwife1', 10.5, 83, 17, '2019-09-01 14:00:37', 27),
('001/05/2020/1000', 'midwife1', 10.9, 85, 18, '2019-10-07 14:00:37', 28),
('001/05/2020/1000', 'midwife1', 11.3, 87, 20, '2019-11-02 14:00:37', 29),
('001/05/2020/1000', 'midwife1', 11.4, 87, 21, '2019-12-09 14:00:37', 30),
('001/05/2020/1000', 'midwife1', 11.6, 88, 22, '2020-01-01 14:00:37', 31),
('001/05/2020/1000', 'midwife1', 11.9, 88, 23, '2020-02-07 14:00:37', 32),
('001/05/2020/1000', 'midwife1', 12.2, 89, 24, '2020-03-01 14:00:37', 33),
('001/05/2020/1000', 'midwife1', 12.5, 90, 25, '2020-04-05 14:00:37', 34),
('001/05/2020/1000', 'midwife1', 12.8, 91, 26, '2020-05-08 14:00:37', 35),
('001/05/2020/1000', 'midwife1', 13, 92, 27, '2020-06-04 14:00:37', 36),
('008/05/2020/1000', 'midwife1', 4.2, 58, 0, '2020-06-07 14:00:37', 37),
('009/06/2020/1000', 'midwife1', 4.5, 59, 0, '2020-06-07 15:38:49', 38),
('002/05/2020/1000', 'midwife1', 4.2, 56, 0, '2020-05-07 16:02:57', 39);

-- --------------------------------------------------------

--
-- Table structure for table `home_visit`
--

CREATE TABLE `home_visit` (
  `mother_id` varchar(12) NOT NULL,
  `midwife_id` varchar(50) NOT NULL,
  `day1` date NOT NULL,
  `day2` date NOT NULL,
  `day3` date NOT NULL,
  `day4` date NOT NULL,
  `lat` decimal(18,15) NOT NULL,
  `lng` decimal(18,15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `mother_nic` varchar(12) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `midwife_id` varchar(50) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `lat` decimal(18,15) DEFAULT NULL,
  `lng` decimal(18,15) DEFAULT NULL,
  `status` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`mother_nic`, `name`, `midwife_id`, `address`, `lat`, `lng`, `status`) VALUES
('950000001', 'Dilsha Udani', 'midwife1', 'Katuwana, Homagama', '6.835157339909751', '80.005030121797320', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `midwife`
--

CREATE TABLE `midwife` (
  `midwife_id` varchar(50) NOT NULL,
  `midwife_name` varchar(50) DEFAULT NULL,
  `midwife_area` varchar(50) DEFAULT NULL,
  `midwife_moh_division` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `midwife`
--

INSERT INTO `midwife` (`midwife_id`, `midwife_name`, `midwife_area`, `midwife_moh_division`) VALUES
('midwife1', 'Aruni Siriwardhana', 'Narammala', 1000),
('midwife2', 'Samadhi Kariyawasam', 'Kiwulgalla', 1053);

-- --------------------------------------------------------

--
-- Table structure for table `midwife_message`
--

CREATE TABLE `midwife_message` (
  `midwife_id` varchar(50) DEFAULT NULL,
  `sender` varchar(50) DEFAULT NULL,
  `midwife_message` varchar(500) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `midwife_message`
--

INSERT INTO `midwife_message` (`midwife_id`, `sender`, `midwife_message`, `date`, `time`, `status`) VALUES
('midwife1', 'doctor1', 'meeting on tomorrow', '2020-06-01', '12:54:31', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `midwife_reminder`
--

CREATE TABLE `midwife_reminder` (
  `midwife_id` varchar(50) DEFAULT NULL,
  `midwife_reminder` varchar(100) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `midwife_reminder`
--

INSERT INTO `midwife_reminder` (`midwife_id`, `midwife_reminder`, `date_time`) VALUES
('midwife1', 'adow', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mother`
--

CREATE TABLE `mother` (
  `mother_nic` varchar(12) NOT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `midwife_id` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `telephone` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `gn_division` int(20) DEFAULT NULL,
  `status` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mother`
--

INSERT INTO `mother` (`mother_nic`, `mother_name`, `midwife_id`, `address`, `telephone`, `email`, `gn_division`, `status`) VALUES
('950000001', 'Dilsha Udani', 'midwife1', 'Katuwana, Homagama', '0710000001', 'udani@gmail.com', 1000, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `reset_password`
--

CREATE TABLE `reset_password` (
  `reset_id` int(3) DEFAULT NULL,
  `reset_code` varchar(100) DEFAULT NULL,
  `reset_email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sister`
--

CREATE TABLE `sister` (
  `sister_id` varchar(50) NOT NULL,
  `sister_name` varchar(50) DEFAULT NULL,
  `sister_division` varchar(30) DEFAULT NULL,
  `sister_moh_division` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sister`
--

INSERT INTO `sister` (`sister_id`, `sister_name`, `sister_division`, `sister_moh_division`) VALUES
('sister1', 'Dilini Lakmali', 'Narammala', 1000),
('sister2', 'Ishara Shyamali', 'Kiwulgalla', 1053);

-- --------------------------------------------------------

--
-- Table structure for table `sister_message`
--

CREATE TABLE `sister_message` (
  `sister_id` varchar(50) DEFAULT NULL,
  `sender` varchar(50) DEFAULT NULL,
  `sister_message` varchar(500) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sister_message`
--

INSERT INTO `sister_message` (`sister_id`, `sender`, `sister_message`, `date`, `time`, `status`) VALUES
('sister1', 'doctor1', 'ho hooo', '2020-04-28', '13:46:18', 'unread'),
('sister1', 'doctor1', 'meeting on tomorow', '2020-06-01', '12:54:13', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `special_note`
--

CREATE TABLE `special_note` (
  `baby_id` varchar(50) DEFAULT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `thriposha_distribution`
--

CREATE TABLE `thriposha_distribution` (
  `baby_id` varchar(50) DEFAULT NULL,
  `midwife_id` varchar(50) DEFAULT NULL,
  `date_given` date DEFAULT NULL,
  `quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `thriposha_storage`
--

CREATE TABLE `thriposha_storage` (
  `midwife_id` varchar(50) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `available_qty` int(11) DEFAULT NULL,
  `distributed_qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thriposha_storage`
--

INSERT INTO `thriposha_storage` (`midwife_id`, `updated_date`, `available_qty`, `distributed_qty`) VALUES
('midwife1', '2020-04-01', 10, 40),
('midwife1', '2020-05-01', 20, 30),
('midwife1', '2020-06-01', 10, 20),
('midwife1', '2020-07-01', 10, 20),
('midwife1', '2020-08-02', 10, 20),
('midwife1', '2020-09-01', 2, 20),
('midwife1', '2020-10-01', 10, 20),
('midwife1', '2020-11-01', 10, 20),
('midwife1', '2020-12-01', 10, 20),
('midwife1', '2020-07-01', 10, 20),
('midwife1', '2020-08-02', 10, 20),
('midwife1', '2020-09-01', 10, 20),
('midwife1', '2020-10-01', 10, 20),
('midwife1', '2020-11-01', 10, 20),
('midwife1', '2020-12-01', 10, 20),
('midwife1', '2021-01-01', 10, 20),
('midwife1', '2021-02-01', 10, 20),
('midwife1', '2021-03-01', 10, 20),
('midwife1', '2020-04-01', 10, 20),
('midwife1', '2021-04-01', 10, 35);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(50) NOT NULL,
  `role` varchar(10) DEFAULT NULL,
  `role_id` int(3) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `role`, `role_id`, `password`, `email`, `status`) VALUES
('950000001', 'mother', 4, '73e157dcdebc2aaf4ffedc4caa28c25e', 'udithamal.lk@gmail.com', 'active'),
('admin1', 'admin', 5, '7985e9eb006f8201581005e4ded3c951', 'admin1@gmail.com', 'active'),
('doctor1', 'doctor', 1, '83d2d855732d4a4d70f01086a6346ed4', 'doctor1@gmail.com', 'active'),
('doctor2', 'doctor', 1, '16770f3306de569a90b34ee2a00b0eff', 'doctor2@gmail.com', 'active'),
('midwife1', 'midwife', 3, '7092b29cefd6bd1dacc99cd25a084c09', 'midwife1@gmail.com', 'active'),
('midwife2', 'midwife', 3, 'b3316b8146a004a79a275fe36f593c65', 'midwife2@gmail.com', 'active'),
('sister1', 'sister', 2, '4ba9a8c0fd442353cec282342d3e0d99', 'sister1@gmail.com', 'active'),
('sister2', 'sister', 2, '2091d12871dab5442f0f51a2e6f13a98', 'sister2@gmail.com', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_date`
--

CREATE TABLE `vaccine_date` (
  `midwife_id` varchar(50) NOT NULL,
  `baby_id` varchar(50) NOT NULL,
  `vac_name` varchar(20) NOT NULL,
  `vac_id` int(2) NOT NULL,
  `giving_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccine_date`
--

INSERT INTO `vaccine_date` (`midwife_id`, `baby_id`, `vac_name`, `vac_id`, `giving_date`) VALUES
('midwife1', '001/05/2020/1000', 'Pentavalent 1', 3, '2020-05-30'),
('midwife1', '001/05/2020/1000', 'OPV-1', 4, '2020-05-31'),
('midwife1', '001/05/2020/1000', 'fIPV-1', 5, '2020-05-30'),
('midwife1', '001/05/2020/1000', 'Pentavalent-2', 6, '2020-05-30'),
('midwife1', '002/05/2020/1000', 'Pentavalent-1', 3, '2020-06-15'),
('midwife1', '001/05/2020/1000', 'OVP-2', 7, '2020-06-17'),
('midwife1', '001/05/2020/1000', 'fIPV-2', 8, '2020-06-01'),
('midwife1', '001/05/2020/1000', 'Pentavalent-3', 9, '2020-06-25'),
('midwife1', '001/05/2020/1000', 'OVP-3', 10, '2020-06-25'),
('midwife1', '001/05/2020/1000', 'MMR-1', 11, '2020-06-09'),
('midwife1', '001/05/2020/1000', 'Live JE', 12, '2020-06-17'),
('midwife1', '001/05/2020/1000', 'DPT', 13, '2020-03-10'),
('midwife1', '001/05/2020/1000', 'OVP-4', 14, '2020-02-03'),
('midwife1', '002/05/2020/1000', 'BCG-2', 2, '2020-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `vac_2months`
--

CREATE TABLE `vac_2months` (
  `baby_id` varchar(50) DEFAULT NULL,
  `approved_doctor_id` varchar(50) DEFAULT NULL,
  `midwife_id` varchar(50) DEFAULT NULL,
  `vac_name` varchar(20) DEFAULT NULL,
  `vac_id` int(2) DEFAULT NULL,
  `date_given` date DEFAULT NULL,
  `batch_no` varchar(100) DEFAULT NULL,
  `side_effects` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vac_2months`
--

INSERT INTO `vac_2months` (`baby_id`, `approved_doctor_id`, `midwife_id`, `vac_name`, `vac_id`, `date_given`, `batch_no`, `side_effects`, `status`) VALUES
('001/05/2020/1000', 'doctor1', 'midwife1', 'Pentavalent-1', 3, '2020-05-04', 'bnvgfjh', NULL, 1),
('001/05/2020/1000', 'doctor1', 'midwife1', 'OPV-1', 4, '2020-05-20', '21124', NULL, 1),
('001/05/2020/1000', 'doctor1', 'midwife1', 'fIPV-1', 5, '2020-06-04', 'ECD1245', NULL, 1),
('002/05/2020/1000', 'doctor1', 'midwife1', 'Pentavalent-1', 3, '2020-06-09', 'ZVF1452', NULL, 1),
('002/05/2020/1000', 'doctor1', 'midwife1', 'OPV-1', 4, NULL, NULL, NULL, 0),
('002/05/2020/1000', 'doctor1', 'midwife1', 'fIPV-1', 5, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vac_3years`
--

CREATE TABLE `vac_3years` (
  `baby_id` varchar(50) DEFAULT NULL,
  `approved_doctor_id` varchar(50) DEFAULT NULL,
  `midwife_id` varchar(50) DEFAULT NULL,
  `vac_name` varchar(20) DEFAULT NULL,
  `vac_id` int(2) DEFAULT NULL,
  `date_given` date DEFAULT NULL,
  `batch_no` varchar(100) DEFAULT NULL,
  `side_effects` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vac_3years`
--

INSERT INTO `vac_3years` (`baby_id`, `approved_doctor_id`, `midwife_id`, `vac_name`, `vac_id`, `date_given`, `batch_no`, `side_effects`, `status`) VALUES
('001/05/2020/1000', 'doctor1', 'midwife1', 'MMR-2', 15, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vac_4months`
--

CREATE TABLE `vac_4months` (
  `baby_id` varchar(50) DEFAULT NULL,
  `approved_doctor_id` varchar(50) DEFAULT NULL,
  `midwife_id` varchar(50) DEFAULT NULL,
  `vac_name` varchar(20) DEFAULT NULL,
  `vac_id` int(2) DEFAULT NULL,
  `date_given` date DEFAULT NULL,
  `batch_no` varchar(100) DEFAULT NULL,
  `side_effects` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vac_4months`
--

INSERT INTO `vac_4months` (`baby_id`, `approved_doctor_id`, `midwife_id`, `vac_name`, `vac_id`, `date_given`, `batch_no`, `side_effects`, `status`) VALUES
('001/05/2020/1000', 'doctor1', 'midwife1', 'Pentavalent-2', 6, '2020-06-10', 'ECD1246', NULL, 1),
('001/05/2020/1000', 'doctor1', 'midwife1', 'OVP-2', 7, '2020-04-07', 'ASD1254', NULL, 1),
('001/05/2020/1000', 'doctor1', 'midwife1', 'fIPV-2', 8, '2020-06-16', 'SSD1254', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vac_5years`
--

CREATE TABLE `vac_5years` (
  `baby_id` varchar(50) DEFAULT NULL,
  `approved_doctor_id` varchar(50) DEFAULT NULL,
  `midwife_id` varchar(50) DEFAULT NULL,
  `vac_name` varchar(20) DEFAULT NULL,
  `vac_id` int(2) DEFAULT NULL,
  `date_given` date DEFAULT NULL,
  `batch_no` varchar(100) DEFAULT NULL,
  `side_effects` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vac_6months`
--

CREATE TABLE `vac_6months` (
  `baby_id` varchar(50) DEFAULT NULL,
  `approved_doctor_id` varchar(50) DEFAULT NULL,
  `midwife_id` varchar(50) DEFAULT NULL,
  `vac_name` varchar(20) DEFAULT NULL,
  `vac_id` int(2) DEFAULT NULL,
  `date_given` date DEFAULT NULL,
  `batch_no` varchar(100) DEFAULT NULL,
  `side_effects` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vac_6months`
--

INSERT INTO `vac_6months` (`baby_id`, `approved_doctor_id`, `midwife_id`, `vac_name`, `vac_id`, `date_given`, `batch_no`, `side_effects`, `status`) VALUES
('001/05/2020/1000', 'doctor1', 'midwife1', 'Pentavalent-3', 9, '2020-06-17', 'ASD1254', NULL, 1),
('001/05/2020/1000', 'doctor1', 'midwife1', 'OVP-3', 10, '2020-06-10', 'ASD1254', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vac_9months`
--

CREATE TABLE `vac_9months` (
  `baby_id` varchar(50) DEFAULT NULL,
  `approved_doctor_id` varchar(50) DEFAULT NULL,
  `midwife_id` varchar(50) DEFAULT NULL,
  `vac_name` varchar(20) DEFAULT NULL,
  `vac_id` int(2) DEFAULT NULL,
  `date_given` date DEFAULT NULL,
  `batch_no` varchar(100) DEFAULT NULL,
  `side_effects` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vac_9months`
--

INSERT INTO `vac_9months` (`baby_id`, `approved_doctor_id`, `midwife_id`, `vac_name`, `vac_id`, `date_given`, `batch_no`, `side_effects`, `status`) VALUES
('001/05/2020/1000', 'doctor1', 'midwife1', 'MMR-1', 11, '2020-06-04', 'CVF1248', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vac_10years`
--

CREATE TABLE `vac_10years` (
  `baby_id` varchar(50) DEFAULT NULL,
  `approved_doctor_id` varchar(50) DEFAULT NULL,
  `midwife_id` varchar(50) DEFAULT NULL,
  `vac_name` varchar(20) DEFAULT NULL,
  `vac_id` int(2) DEFAULT NULL,
  `date_given` date DEFAULT NULL,
  `batch_no` varchar(100) DEFAULT NULL,
  `side_effects` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vac_11years`
--

CREATE TABLE `vac_11years` (
  `baby_id` varchar(50) DEFAULT NULL,
  `approved_doctor_id` varchar(50) DEFAULT NULL,
  `midwife_id` varchar(50) DEFAULT NULL,
  `vac_name` varchar(20) DEFAULT NULL,
  `vac_id` int(2) DEFAULT NULL,
  `date_given` date DEFAULT NULL,
  `batch_no` varchar(100) DEFAULT NULL,
  `side_effects` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vac_12months`
--

CREATE TABLE `vac_12months` (
  `baby_id` varchar(50) DEFAULT NULL,
  `approved_doctor_id` varchar(50) DEFAULT NULL,
  `midwife_id` varchar(50) DEFAULT NULL,
  `vac_name` varchar(20) DEFAULT NULL,
  `vac_id` int(2) DEFAULT NULL,
  `date_given` date DEFAULT NULL,
  `batch_no` varchar(100) DEFAULT NULL,
  `side_effects` varchar(200) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vac_12months`
--

INSERT INTO `vac_12months` (`baby_id`, `approved_doctor_id`, `midwife_id`, `vac_name`, `vac_id`, `date_given`, `batch_no`, `side_effects`, `status`) VALUES
('001/05/2020/1000', 'doctor1', 'midwife1', 'Live JE', 12, '2020-06-10', 'CVF1248', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vac_18months`
--

CREATE TABLE `vac_18months` (
  `baby_id` varchar(50) DEFAULT NULL,
  `approved_doctor_id` varchar(50) DEFAULT NULL,
  `midwife_id` varchar(50) DEFAULT NULL,
  `vac_name` varchar(20) DEFAULT NULL,
  `vac_id` int(2) DEFAULT NULL,
  `date_given` date DEFAULT NULL,
  `batch_no` varchar(100) DEFAULT NULL,
  `side_effects` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vac_18months`
--

INSERT INTO `vac_18months` (`baby_id`, `approved_doctor_id`, `midwife_id`, `vac_name`, `vac_id`, `date_given`, `batch_no`, `side_effects`, `status`) VALUES
('001/05/2020/1000', 'doctor1', 'midwife1', 'DPT', 13, '2020-06-09', 'SSD1254', NULL, 1),
('001/05/2020/1000', 'doctor1', 'midwife1', 'OPV-4', 14, '2020-06-11', 'ASD1254', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vac_birth`
--

CREATE TABLE `vac_birth` (
  `baby_id` varchar(50) DEFAULT NULL,
  `vac_name` varchar(20) DEFAULT NULL,
  `vac_id` int(2) DEFAULT NULL,
  `date_given` date DEFAULT NULL,
  `batch_no` varchar(100) DEFAULT NULL,
  `approved_doctor_id` varchar(50) DEFAULT NULL,
  `midwife_id` varchar(50) DEFAULT NULL,
  `scar` tinyint(1) DEFAULT NULL,
  `side_effects` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vac_birth`
--

INSERT INTO `vac_birth` (`baby_id`, `vac_name`, `vac_id`, `date_given`, `batch_no`, `approved_doctor_id`, `midwife_id`, `scar`, `side_effects`, `status`) VALUES
('001/05/2020/1000', 'BCG-1', 1, '2020-05-05', 'ECB1254', NULL, 'midwife1', 1, 'got scar', 1),
('002/05/2020/1000', 'BCG-1', 1, '2020-06-02', 'SSD1254', NULL, 'midwife1', NULL, NULL, 1),
('009/06/2020/1000', 'BCG-1', 1, '2020-06-10', 'ASD1254', NULL, 'midwife1', NULL, NULL, 1),
('002/05/2020/1000', 'BCG-2', 2, '2020-06-02', 'XSD1785', 'doctor1', 'midwife1', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vac_other`
--

CREATE TABLE `vac_other` (
  `baby_id` varchar(50) DEFAULT NULL,
  `approved_doctor_id` varchar(50) DEFAULT NULL,
  `midwife_id` varchar(50) DEFAULT NULL,
  `vac_name` varchar(20) DEFAULT NULL,
  `vac_id` int(2) DEFAULT NULL,
  `date_given` date DEFAULT NULL,
  `batch_no` varchar(100) DEFAULT NULL,
  `side_effects` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baby_register`
--
ALTER TABLE `baby_register`
  ADD PRIMARY KEY (`baby_id`),
  ADD KEY `midwife_id` (`midwife_id`),
  ADD KEY `mother_nic` (`mother_nic`);

--
-- Indexes for table `birth_details`
--
ALTER TABLE `birth_details`
  ADD KEY `midwife_id` (`midwife_id`),
  ADD KEY `baby_id` (`baby_id`);

--
-- Indexes for table `child_health_note`
--
ALTER TABLE `child_health_note`
  ADD KEY `baby_id` (`baby_id`),
  ADD KEY `midwife_id` (`midwife_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `doctor_message`
--
ALTER TABLE `doctor_message`
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `doc_thriposha`
--
ALTER TABLE `doc_thriposha`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `growth`
--
ALTER TABLE `growth`
  ADD PRIMARY KEY (`id`),
  ADD KEY `midwife_id` (`midwife_id`),
  ADD KEY `baby_id` (`baby_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD KEY `mother_nic` (`mother_nic`);

--
-- Indexes for table `midwife`
--
ALTER TABLE `midwife`
  ADD PRIMARY KEY (`midwife_id`);

--
-- Indexes for table `midwife_message`
--
ALTER TABLE `midwife_message`
  ADD KEY `midwife_id` (`midwife_id`);

--
-- Indexes for table `midwife_reminder`
--
ALTER TABLE `midwife_reminder`
  ADD KEY `midwife_id` (`midwife_id`);

--
-- Indexes for table `mother`
--
ALTER TABLE `mother`
  ADD PRIMARY KEY (`mother_nic`),
  ADD KEY `midwife_id` (`midwife_id`);

--
-- Indexes for table `sister`
--
ALTER TABLE `sister`
  ADD PRIMARY KEY (`sister_id`);

--
-- Indexes for table `sister_message`
--
ALTER TABLE `sister_message`
  ADD KEY `sister_id` (`sister_id`);

--
-- Indexes for table `special_note`
--
ALTER TABLE `special_note`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `thriposha_distribution`
--
ALTER TABLE `thriposha_distribution`
  ADD KEY `midwife_id` (`midwife_id`),
  ADD KEY `baby_id` (`baby_id`);

--
-- Indexes for table `thriposha_storage`
--
ALTER TABLE `thriposha_storage`
  ADD KEY `midwife_id` (`midwife_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vaccine_date`
--
ALTER TABLE `vaccine_date`
  ADD KEY `baby_id` (`baby_id`),
  ADD KEY `midwife_id` (`midwife_id`);

--
-- Indexes for table `vac_2months`
--
ALTER TABLE `vac_2months`
  ADD KEY `midwife_id` (`midwife_id`),
  ADD KEY `baby_id` (`baby_id`),
  ADD KEY `approved_doctor_id` (`approved_doctor_id`);

--
-- Indexes for table `vac_3years`
--
ALTER TABLE `vac_3years`
  ADD KEY `midwife_id` (`midwife_id`),
  ADD KEY `baby_id` (`baby_id`),
  ADD KEY `approved_doctor_id` (`approved_doctor_id`);

--
-- Indexes for table `vac_4months`
--
ALTER TABLE `vac_4months`
  ADD KEY `midwife_id` (`midwife_id`),
  ADD KEY `baby_id` (`baby_id`),
  ADD KEY `approved_doctor_id` (`approved_doctor_id`);

--
-- Indexes for table `vac_5years`
--
ALTER TABLE `vac_5years`
  ADD KEY `midwife_id` (`midwife_id`),
  ADD KEY `baby_id` (`baby_id`),
  ADD KEY `approved_doctor_id` (`approved_doctor_id`);

--
-- Indexes for table `vac_6months`
--
ALTER TABLE `vac_6months`
  ADD KEY `midwife_id` (`midwife_id`),
  ADD KEY `baby_id` (`baby_id`),
  ADD KEY `approved_doctor_id` (`approved_doctor_id`);

--
-- Indexes for table `vac_9months`
--
ALTER TABLE `vac_9months`
  ADD KEY `midwife_id` (`midwife_id`),
  ADD KEY `baby_id` (`baby_id`),
  ADD KEY `approved_doctor_id` (`approved_doctor_id`);

--
-- Indexes for table `vac_10years`
--
ALTER TABLE `vac_10years`
  ADD KEY `midwife_id` (`midwife_id`),
  ADD KEY `baby_id` (`baby_id`),
  ADD KEY `approved_doctor_id` (`approved_doctor_id`);

--
-- Indexes for table `vac_11years`
--
ALTER TABLE `vac_11years`
  ADD KEY `midwife_id` (`midwife_id`),
  ADD KEY `baby_id` (`baby_id`),
  ADD KEY `approved_doctor_id` (`approved_doctor_id`);

--
-- Indexes for table `vac_12months`
--
ALTER TABLE `vac_12months`
  ADD KEY `baby_id` (`baby_id`),
  ADD KEY `midwife_id` (`midwife_id`),
  ADD KEY `approved_doctor_id` (`approved_doctor_id`);

--
-- Indexes for table `vac_18months`
--
ALTER TABLE `vac_18months`
  ADD KEY `midwife_id` (`midwife_id`),
  ADD KEY `baby_id` (`baby_id`),
  ADD KEY `approved_doctor_id` (`approved_doctor_id`);

--
-- Indexes for table `vac_birth`
--
ALTER TABLE `vac_birth`
  ADD KEY `midwife_id` (`midwife_id`),
  ADD KEY `baby_id` (`baby_id`),
  ADD KEY `approved_doctor_id` (`approved_doctor_id`);

--
-- Indexes for table `vac_other`
--
ALTER TABLE `vac_other`
  ADD KEY `midwife_id` (`midwife_id`),
  ADD KEY `baby_id` (`baby_id`),
  ADD KEY `approved_doctor_id` (`approved_doctor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doc_thriposha`
--
ALTER TABLE `doc_thriposha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `growth`
--
ALTER TABLE `growth`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baby_register`
--
ALTER TABLE `baby_register`
  ADD CONSTRAINT `baby_register_ibfk_1` FOREIGN KEY (`midwife_id`) REFERENCES `midwife` (`midwife_id`),
  ADD CONSTRAINT `baby_register_ibfk_2` FOREIGN KEY (`mother_nic`) REFERENCES `mother` (`mother_nic`);

--
-- Constraints for table `birth_details`
--
ALTER TABLE `birth_details`
  ADD CONSTRAINT `birth_details_ibfk_1` FOREIGN KEY (`midwife_id`) REFERENCES `midwife` (`midwife_id`),
  ADD CONSTRAINT `birth_details_ibfk_2` FOREIGN KEY (`baby_id`) REFERENCES `baby_register` (`baby_id`);

--
-- Constraints for table `child_health_note`
--
ALTER TABLE `child_health_note`
  ADD CONSTRAINT `child_health_note_ibfk_1` FOREIGN KEY (`baby_id`) REFERENCES `baby_register` (`baby_id`),
  ADD CONSTRAINT `child_health_note_ibfk_2` FOREIGN KEY (`midwife_id`) REFERENCES `midwife` (`midwife_id`),
  ADD CONSTRAINT `child_health_note_ibfk_3` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`);

--
-- Constraints for table `doctor_message`
--
ALTER TABLE `doctor_message`
  ADD CONSTRAINT `doctor_message_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`);

--
-- Constraints for table `growth`
--
ALTER TABLE `growth`
  ADD CONSTRAINT `growth_ibfk_1` FOREIGN KEY (`midwife_id`) REFERENCES `midwife` (`midwife_id`),
  ADD CONSTRAINT `growth_ibfk_2` FOREIGN KEY (`baby_id`) REFERENCES `baby_register` (`baby_id`);

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`mother_nic`) REFERENCES `mother` (`mother_nic`);

--
-- Constraints for table `midwife_message`
--
ALTER TABLE `midwife_message`
  ADD CONSTRAINT `midwife_message_ibfk_1` FOREIGN KEY (`midwife_id`) REFERENCES `midwife` (`midwife_id`);

--
-- Constraints for table `midwife_reminder`
--
ALTER TABLE `midwife_reminder`
  ADD CONSTRAINT `midwife_reminder_ibfk_1` FOREIGN KEY (`midwife_id`) REFERENCES `midwife` (`midwife_id`);

--
-- Constraints for table `mother`
--
ALTER TABLE `mother`
  ADD CONSTRAINT `mother_ibfk_1` FOREIGN KEY (`midwife_id`) REFERENCES `midwife` (`midwife_id`);

--
-- Constraints for table `sister_message`
--
ALTER TABLE `sister_message`
  ADD CONSTRAINT `sister_message_ibfk_1` FOREIGN KEY (`sister_id`) REFERENCES `sister` (`sister_id`);

--
-- Constraints for table `special_note`
--
ALTER TABLE `special_note`
  ADD CONSTRAINT `special_note_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `thriposha_distribution`
--
ALTER TABLE `thriposha_distribution`
  ADD CONSTRAINT `thriposha_distribution_ibfk_1` FOREIGN KEY (`midwife_id`) REFERENCES `midwife` (`midwife_id`),
  ADD CONSTRAINT `thriposha_distribution_ibfk_2` FOREIGN KEY (`baby_id`) REFERENCES `baby_register` (`baby_id`);

--
-- Constraints for table `thriposha_storage`
--
ALTER TABLE `thriposha_storage`
  ADD CONSTRAINT `thriposha_storage_ibfk_1` FOREIGN KEY (`midwife_id`) REFERENCES `midwife` (`midwife_id`);

--
-- Constraints for table `vaccine_date`
--
ALTER TABLE `vaccine_date`
  ADD CONSTRAINT `vaccine_date_ibfk_1` FOREIGN KEY (`baby_id`) REFERENCES `baby_register` (`baby_id`),
  ADD CONSTRAINT `vaccine_date_ibfk_2` FOREIGN KEY (`midwife_id`) REFERENCES `midwife` (`midwife_id`);

--
-- Constraints for table `vac_2months`
--
ALTER TABLE `vac_2months`
  ADD CONSTRAINT `vac_2months_ibfk_1` FOREIGN KEY (`midwife_id`) REFERENCES `midwife` (`midwife_id`),
  ADD CONSTRAINT `vac_2months_ibfk_2` FOREIGN KEY (`baby_id`) REFERENCES `baby_register` (`baby_id`),
  ADD CONSTRAINT `vac_2months_ibfk_3` FOREIGN KEY (`approved_doctor_id`) REFERENCES `doctor` (`doctor_id`);

--
-- Constraints for table `vac_3years`
--
ALTER TABLE `vac_3years`
  ADD CONSTRAINT `vac_3years_ibfk_1` FOREIGN KEY (`midwife_id`) REFERENCES `midwife` (`midwife_id`),
  ADD CONSTRAINT `vac_3years_ibfk_2` FOREIGN KEY (`baby_id`) REFERENCES `baby_register` (`baby_id`),
  ADD CONSTRAINT `vac_3years_ibfk_3` FOREIGN KEY (`approved_doctor_id`) REFERENCES `doctor` (`doctor_id`);

--
-- Constraints for table `vac_4months`
--
ALTER TABLE `vac_4months`
  ADD CONSTRAINT `vac_4months_ibfk_1` FOREIGN KEY (`midwife_id`) REFERENCES `midwife` (`midwife_id`),
  ADD CONSTRAINT `vac_4months_ibfk_2` FOREIGN KEY (`baby_id`) REFERENCES `baby_register` (`baby_id`),
  ADD CONSTRAINT `vac_4months_ibfk_3` FOREIGN KEY (`approved_doctor_id`) REFERENCES `doctor` (`doctor_id`);

--
-- Constraints for table `vac_5years`
--
ALTER TABLE `vac_5years`
  ADD CONSTRAINT `vac_5years_ibfk_1` FOREIGN KEY (`midwife_id`) REFERENCES `midwife` (`midwife_id`),
  ADD CONSTRAINT `vac_5years_ibfk_2` FOREIGN KEY (`baby_id`) REFERENCES `baby_register` (`baby_id`),
  ADD CONSTRAINT `vac_5years_ibfk_3` FOREIGN KEY (`approved_doctor_id`) REFERENCES `doctor` (`doctor_id`);

--
-- Constraints for table `vac_6months`
--
ALTER TABLE `vac_6months`
  ADD CONSTRAINT `vac_6months_ibfk_1` FOREIGN KEY (`midwife_id`) REFERENCES `midwife` (`midwife_id`),
  ADD CONSTRAINT `vac_6months_ibfk_2` FOREIGN KEY (`baby_id`) REFERENCES `baby_register` (`baby_id`),
  ADD CONSTRAINT `vac_6months_ibfk_3` FOREIGN KEY (`approved_doctor_id`) REFERENCES `doctor` (`doctor_id`);

--
-- Constraints for table `vac_9months`
--
ALTER TABLE `vac_9months`
  ADD CONSTRAINT `vac_9months_ibfk_1` FOREIGN KEY (`midwife_id`) REFERENCES `midwife` (`midwife_id`),
  ADD CONSTRAINT `vac_9months_ibfk_2` FOREIGN KEY (`baby_id`) REFERENCES `baby_register` (`baby_id`),
  ADD CONSTRAINT `vac_9months_ibfk_3` FOREIGN KEY (`approved_doctor_id`) REFERENCES `doctor` (`doctor_id`);

--
-- Constraints for table `vac_10years`
--
ALTER TABLE `vac_10years`
  ADD CONSTRAINT `vac_10years_ibfk_1` FOREIGN KEY (`midwife_id`) REFERENCES `midwife` (`midwife_id`),
  ADD CONSTRAINT `vac_10years_ibfk_2` FOREIGN KEY (`baby_id`) REFERENCES `baby_register` (`baby_id`),
  ADD CONSTRAINT `vac_10years_ibfk_3` FOREIGN KEY (`approved_doctor_id`) REFERENCES `doctor` (`doctor_id`);

--
-- Constraints for table `vac_11years`
--
ALTER TABLE `vac_11years`
  ADD CONSTRAINT `vac_11years_ibfk_1` FOREIGN KEY (`midwife_id`) REFERENCES `midwife` (`midwife_id`),
  ADD CONSTRAINT `vac_11years_ibfk_2` FOREIGN KEY (`baby_id`) REFERENCES `baby_register` (`baby_id`),
  ADD CONSTRAINT `vac_11years_ibfk_3` FOREIGN KEY (`approved_doctor_id`) REFERENCES `doctor` (`doctor_id`);

--
-- Constraints for table `vac_12months`
--
ALTER TABLE `vac_12months`
  ADD CONSTRAINT `vac_12months_ibfk_1` FOREIGN KEY (`baby_id`) REFERENCES `baby_register` (`baby_id`),
  ADD CONSTRAINT `vac_12months_ibfk_2` FOREIGN KEY (`midwife_id`) REFERENCES `midwife` (`midwife_id`),
  ADD CONSTRAINT `vac_12months_ibfk_3` FOREIGN KEY (`approved_doctor_id`) REFERENCES `doctor` (`doctor_id`);

--
-- Constraints for table `vac_18months`
--
ALTER TABLE `vac_18months`
  ADD CONSTRAINT `vac_18months_ibfk_1` FOREIGN KEY (`midwife_id`) REFERENCES `midwife` (`midwife_id`),
  ADD CONSTRAINT `vac_18months_ibfk_2` FOREIGN KEY (`baby_id`) REFERENCES `baby_register` (`baby_id`),
  ADD CONSTRAINT `vac_18months_ibfk_3` FOREIGN KEY (`approved_doctor_id`) REFERENCES `doctor` (`doctor_id`);

--
-- Constraints for table `vac_birth`
--
ALTER TABLE `vac_birth`
  ADD CONSTRAINT `vac_birth_ibfk_1` FOREIGN KEY (`midwife_id`) REFERENCES `midwife` (`midwife_id`),
  ADD CONSTRAINT `vac_birth_ibfk_2` FOREIGN KEY (`baby_id`) REFERENCES `baby_register` (`baby_id`),
  ADD CONSTRAINT `vac_birth_ibfk_3` FOREIGN KEY (`approved_doctor_id`) REFERENCES `doctor` (`doctor_id`);

--
-- Constraints for table `vac_other`
--
ALTER TABLE `vac_other`
  ADD CONSTRAINT `vac_other_ibfk_1` FOREIGN KEY (`midwife_id`) REFERENCES `midwife` (`midwife_id`),
  ADD CONSTRAINT `vac_other_ibfk_2` FOREIGN KEY (`baby_id`) REFERENCES `baby_register` (`baby_id`),
  ADD CONSTRAINT `vac_other_ibfk_3` FOREIGN KEY (`approved_doctor_id`) REFERENCES `doctor` (`doctor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
