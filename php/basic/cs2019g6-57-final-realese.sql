-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2020 at 02:34 AM
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
('001/01/2020/1000', 'Ama', 'Charuni', '2020-01-03', 'F', '2020-08-12', 'midwife1', '920000000', 27, 'active'),
('001/02/2018/1000', 'Hasitha', 'Bhagya', '2018-02-02', 'M', '2020-08-11', 'midwife1', '920000000', 25, 'active'),
('001/02/2020/1000', 'Samith', 'Chandula', '2020-02-06', 'M', '2020-08-12', 'midwife1', '950000000', 25, 'active');

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
('001/02/2018/1000', 'midwife1', 4, 50, 'Good', 1, 2, 1, 28, 'Yes', 'Normal', 'Cradle position'),
('001/01/2020/1000', 'midwife1', 2.2, 50, 'Good', 2, 1, 1, 24, 'Yes', 'Good', 'Cross-cradle position'),
('001/02/2020/1000', 'midwife1', 5.5, 45, 'Good', 0, 2, 0, 25, 'No', 'Good', 'Cradle position');

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
  `clinic_date` date NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `child_health_note`
--

INSERT INTO `child_health_note` (`baby_id`, `midwife_id`, `baby_age_group`, `baby_age_group_id`, `eye_size`, `squint`, `retina`, `cornea`, `eye_movement`, `hearing`, `weight`, `height`, `development`, `heart`, `hip`, `other`, `doctor_id`, `clinic_date`, `id`) VALUES
('001/02/2018/1000', 'midwife1', '1st Month', 1, 'O', 'O', 'O', 'O', 'O', 'O', 'N', 'NH', 'O', 'O', 'O', ' ', 'doctor1', '2018-02-04', 1),
('001/02/2018/1000', 'midwife1', 'After 2nd Month', 2, 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'NH', 'O', 'O', 'O', ' ', 'doctor1', '2020-04-04', 2),
('001/02/2018/1000', 'midwife1', 'After 4th Month', 3, 'O', 'O', 'O', 'O', 'O', 'O', 'N', 'S', 'O', 'O', 'O', ' ', 'doctor1', '2018-06-02', 3),
('001/02/2018/1000', 'midwife1', 'After 6th Month', 4, 'O', 'O', 'O', 'O', 'O', 'O', 'N', 'S', 'O', 'O', 'O', ' ', 'doctor1', '2018-08-06', 4),
('001/02/2018/1000', 'midwife1', 'After 9th Month', 5, 'O', 'O', 'O', 'O', 'X', 'O', 'N', 'NH', 'O', 'O', 'O', ' ', 'doctor1', '2018-11-05', 5),
('001/02/2018/1000', 'midwife1', 'After 12th Month', 6, 'O', 'O', 'O', 'O', 'O', 'O', 'N', 'NH', 'O', 'O', 'O', ' ', 'doctor1', '2019-02-02', 6),
('001/02/2018/1000', 'midwife1', 'After 18th Month', 7, 'X', 'O', 'O', 'O', 'O', 'O', 'N', 'NH', 'O', 'O', 'O', ' ', 'doctor1', '2019-08-07', 7),
('001/01/2020/1000', 'midwife1', '1st Month', 1, 'O', 'O', 'O', 'O', 'O', 'O', 'N', 'NH', 'O', 'O', 'O', ' ', 'doctor1', '2020-01-04', 8),
('001/01/2020/1000', 'midwife1', 'After 2nd Month', 2, 'O', 'O', 'O', 'O', 'O', 'O', 'N', 'NH', 'X', 'O', 'O', ' ', 'doctor1', '2020-03-02', 9),
('001/01/2020/1000', 'midwife1', 'After 4th Month', 3, 'O', 'O', 'O', 'O', 'O', 'O', 'X', 'NH', 'O', 'O', 'O', ' ', 'doctor1', '2020-04-08', 10),
('001/01/2020/1000', 'midwife1', 'After 6th Month', 4, 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'NH', 'O', 'O', 'O', ' ', 'doctor1', '2020-07-07', 11),
('001/02/2020/1000', 'midwife1', '1st Month', 1, 'O', 'O', 'O', 'O', 'O', 'O', 'N', 'NH', 'O', 'O', 'O', ' ', 'doctor1', '2020-02-04', 12),
('001/02/2020/1000', 'midwife1', 'After 2nd Month', 2, 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'NH', 'O', 'O', 'O', ' ', 'doctor1', '2020-04-03', 13),
('001/02/2020/1000', 'midwife1', 'After 4th Month', 3, 'O', 'X', 'O', 'O', 'O', 'O', 'N', 'NH', 'O', 'O', 'O', ' ', 'doctor1', '2020-06-07', 14),
('001/02/2020/1000', 'midwife1', 'After 6th Month', 4, 'O', 'O', 'O', 'O', 'O', 'O', 'N', 'NH', 'O', 'O', 'O', ' ', 'doctor1', '2020-08-04', 15);

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
('doctor1', 'Dinsh Madushan', 'Narammala', 1000);

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
('doctor1', 'midwife1', 'thriposha stock removed', '2020-08-12', '04:35:22', 'unread'),
('doctor1', 'midwife1', 'clinic date changed', '2020-08-12', '05:10:49', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_reminder`
--

CREATE TABLE `doctor_reminder` (
  `id` int(11) NOT NULL,
  `doctor_id` varchar(50) DEFAULT NULL,
  `doctor_reminder` varchar(20) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('001/02/2018/1000', 'midwife1', 4, 50, 0, '2018-02-01 21:34:51', 47),
('001/02/2018/1000', 'midwife1', 4.3, 52, 1, '2018-03-06 21:47:37', 48),
('001/02/2018/1000', 'midwife1', 4.7, 56, 2, '2018-04-11 21:47:56', 49),
('001/02/2018/1000', 'midwife1', 5.8, 62.8, 3, '2018-05-10 21:58:09', 50),
('001/02/2018/1000', 'midwife1', 6.9, 64, 4, '2018-06-05 21:58:14', 51),
('001/02/2018/1000', 'midwife1', 8.1, 65, 5, '2018-07-09 21:58:18', 52),
('001/02/2018/1000', 'midwife1', 8.9, 67, 6, '2018-08-01 21:58:22', 53),
('001/02/2018/1000', 'midwife1', 9.5, 68.9, 7, '2018-09-11 21:58:28', 54),
('001/02/2018/1000', 'midwife1', 10, 70, 8, '2018-09-01 21:58:32', 55),
('001/02/2018/1000', 'midwife1', 9.8, 72, 9, '2018-10-04 21:58:36', 56),
('001/02/2018/1000', 'midwife1', 9.6, 73.1, 10, '2018-11-02 21:58:39', 57),
('001/02/2018/1000', 'midwife1', 10.4, 74, 11, '2018-12-07 21:58:44', 58),
('001/02/2018/1000', 'midwife1', 10.1, 75, 12, '2019-01-04 21:58:50', 59),
('001/02/2018/1000', 'midwife1', 10.3, 77.2, 13, '2019-02-11 21:58:56', 60),
('001/02/2018/1000', 'midwife1', 10.6, 78, 14, '2019-03-06 22:12:42', 61),
('001/02/2018/1000', 'midwife1', 11.1, 79, 15, '2019-04-11 21:59:27', 62),
('001/02/2018/1000', 'midwife1', 11.7, 80.1, 16, '2019-05-07 21:59:44', 63),
('001/02/2018/1000', 'midwife1', 12.3, 82, 17, '2019-06-03 21:59:13', 64),
('001/02/2018/1000', 'midwife1', 12.3, 82.9, 18, '2019-07-10 22:00:57', 65),
('001/02/2018/1000', 'midwife1', 12.8, 83.2, 19, '2019-08-11 22:01:43', 66),
('001/02/2018/1000', 'midwife1', 12.4, 84, 20, '2019-09-09 22:01:59', 67),
('001/02/2018/1000', 'midwife1', 12.2, 85.1, 21, '2019-10-05 22:02:44', 68),
('001/02/2018/1000', 'midwife1', 12.3, 86.3, 22, '2019-11-03 22:03:00', 69),
('001/02/2018/1000', 'midwife1', 12.5, 87, 23, '2019-12-07 22:04:14', 70),
('001/02/2018/1000', 'midwife1', 12.2, 88.4, 24, '2020-01-03 22:04:35', 71),
('001/02/2018/1000', 'midwife1', 12.6, 89.5, 25, '2020-02-04 22:17:08', 72),
('001/02/2018/1000', 'midwife1', 12.5, 90.2, 26, '2020-03-04 22:25:13', 73),
('001/02/2018/1000', 'midwife1', 12.8, 91, 27, '2020-04-13 22:25:21', 74),
('001/02/2018/1000', 'midwife1', 13.3, 92.5, 28, '2020-05-06 22:19:14', 75),
('001/02/2018/1000', 'midwife1', 13.7, 93, 29, '2020-06-08 22:22:27', 76),
('001/02/2018/1000', 'midwife1', 13.9, 93.7, 30, '2020-07-17 22:22:43', 77),
('001/02/2018/1000', 'midwife1', 14.3, 94.2, 31, '2020-08-01 22:22:58', 78),
('001/01/2020/1000', 'midwife1', 2.2, 50, 0, '2020-01-04 23:17:00', 79),
('001/01/2020/1000', 'midwife1', 2.6, 52, 1, '2020-02-02 23:17:45', 80),
('001/01/2020/1000', 'midwife1', 3.2, 53.5, 2, '2020-03-02 23:18:21', 81),
('001/01/2020/1000', 'midwife1', 3.9, 54, 3, '2020-04-11 23:18:57', 82),
('001/01/2020/1000', 'midwife1', 5, 58, 4, '2020-05-07 23:19:20', 83),
('001/01/2020/1000', 'midwife1', 4.8, 62, 5, '2020-06-08 23:19:49', 84),
('001/01/2020/1000', 'midwife1', 5.7, 63.5, 6, '2020-07-06 23:20:24', 85),
('001/01/2020/1000', 'midwife1', 6.4, 65, 7, '2020-08-11 23:23:46', 86),
('001/02/2020/1000', 'midwife1', 5.5, 45, 0, '2020-02-01 00:03:03', 87),
('001/02/2020/1000', 'midwife1', 6.1, 46.5, 1, '2020-03-04 00:10:13', 88),
('001/02/2020/1000', 'midwife1', 6.9, 48, 2, '2020-04-08 00:06:26', 89),
('001/02/2020/1000', 'midwife1', 7.8, 50, 3, '2020-05-03 00:06:41', 90),
('001/02/2020/1000', 'midwife1', 9.2, 51, 4, '2020-06-02 00:06:56', 91),
('001/02/2020/1000', 'midwife1', 10.1, 52.5, 5, '2020-07-01 00:07:54', 92),
('001/02/2020/1000', 'midwife1', 11.5, 55, 6, '2020-08-04 00:09:12', 93);

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
  `status` varchar(8) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`mother_nic`, `name`, `midwife_id`, `address`, `lat`, `lng`, `status`, `id`) VALUES
('920000000', 'Dilsha Udani', 'midwife1', 'Koulwewa, Narammala', '7.443638550768643', '80.182120147705090', 'active', 1),
(NULL, NULL, 'midwife1', 'MOH Office, Narammala', '7.432763000000000', '80.212247000000000', NULL, 2),
('950000000', 'Chandi Rupasinha', 'midwife1', 'Uhumiya, Narammala', '7.464744671205938', '80.300909820556650', 'active', 3);

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
('midwife1', 'Aruni Siriwardhana', 'Narammala', 1000);

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
('midwife1', 'doctor1', 'you have meeting on tomorrow', '2020-08-12', '04:04:38', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `midwife_reminder`
--

CREATE TABLE `midwife_reminder` (
  `midwife_id` varchar(50) DEFAULT NULL,
  `midwife_reminder` varchar(100) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('920000000', 'Dilsha Udani', 'midwife1', 'Koulwewa, Narammala', '0700000000', 'mother1@ihms.com', 1000, 'active'),
('950000000', 'Chandi Rupasinha', 'midwife1', 'Uhumiya, Narammala', '0710000000', 'mother2@ihms.com', 1000, 'active');

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
('sister1', 'Dilini Lakmali', 'Narammala', 1000);

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
('sister1', 'doctor1', 'you a meeting on tomorrow', '2020-08-12', '04:04:05', 'unread');

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
('920000000', 'mother', 4, '73e157dcdebc2aaf4ffedc4caa28c25e', 'mother1@ihms.com', 'active'),
('950000000', 'mother', 4, '13739327e69bcd9c5478c6553ec7d14d', 'mother2@ihms.com', 'active'),
('admin1', 'admin', 5, '7985e9eb006f8201581005e4ded3c951', 'admin@admin.com', 'active'),
('doctor1', 'doctor', 1, '83d2d855732d4a4d70f01086a6346ed4', 'doctor@ihms.com', 'active'),
('midwife1', 'midwife', 3, '7092b29cefd6bd1dacc99cd25a084c09', 'midwife1@ihms.com', 'active'),
('sister1', 'sister', 2, '4ba9a8c0fd442353cec282342d3e0d99', 'sister1@ihms.com', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_date`
--

CREATE TABLE `vaccine_date` (
  `midwife_id` varchar(50) NOT NULL,
  `baby_id` varchar(50) NOT NULL,
  `vac_name` varchar(20) NOT NULL,
  `vac_id` int(2) NOT NULL,
  `giving_date` date NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccine_date`
--

INSERT INTO `vaccine_date` (`midwife_id`, `baby_id`, `vac_name`, `vac_id`, `giving_date`, `id`) VALUES
('midwife1', '001/02/2018/1000', 'Pentavalent-1', 3, '2018-08-12', 1),
('midwife1', '001/02/2018/1000', 'OPV-1', 4, '2018-08-14', 2),
('midwife1', '001/02/2018/1000', 'fIPV-1', 5, '2018-08-22', 3),
('midwife1', '001/02/2018/1000', 'Pentavalent-2', 6, '2018-08-19', 4),
('midwife1', '001/02/2018/1000', 'OVP-2', 7, '2018-08-26', 5),
('midwife1', '001/02/2018/1000', 'fIPV-2', 8, '2018-08-29', 6),
('midwife1', '001/02/2018/1000', 'Pentavalent-3', 9, '2018-08-15', 7),
('midwife1', '001/02/2018/1000', 'OVP-3', 10, '2018-08-15', 8),
('midwife1', '001/02/2018/1000', 'MMR-1', 11, '2018-08-30', 9),
('midwife1', '001/02/2018/1000', 'DPT', 13, '2018-08-13', 10),
('midwife1', '001/02/2018/1000', 'OVP-4', 14, '2018-08-14', 11),
('midwife1', '001/01/2020/1000', 'Pentavalent-1', 3, '2020-08-09', 12),
('midwife1', '001/01/2020/1000', 'OPV-1', 4, '2020-04-13', 13),
('midwife1', '001/01/2020/1000', 'fIPV-1', 5, '2020-08-05', 14),
('midwife1', '001/01/2020/1000', 'Pentavalent-2', 6, '2020-08-08', 15),
('midwife1', '001/01/2020/1000', 'OVP-2', 7, '2020-05-14', 16),
('midwife1', '001/01/2020/1000', 'fIPV-2', 8, '2020-07-09', 17),
('midwife1', '001/01/2020/1000', 'Pentavalent-3', 9, '2020-08-01', 18),
('midwife1', '001/01/2020/1000', 'OVP-3', 10, '2020-08-01', 19),
('midwife1', '001/02/2020/1000', 'Pentavalent-1', 3, '2020-08-01', 20),
('midwife1', '001/02/2020/1000', 'OPV-1', 4, '2020-08-01', 21),
('midwife1', '001/02/2020/1000', 'fIPV-1', 5, '2020-08-01', 22),
('midwife1', '001/02/2020/1000', 'Pentavalent-2', 6, '2020-08-01', 23),
('midwife1', '001/02/2020/1000', 'OVP-2', 7, '2020-08-01', 24),
('midwife1', '001/02/2020/1000', 'fIPV-2', 8, '2020-08-01', 25),
('midwife1', '001/02/2020/1000', 'Pentavalent-3', 9, '2020-08-01', 26),
('midwife1', '001/02/2020/1000', 'OVP-3', 10, '2020-08-08', 27);

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
  `status` tinyint(1) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vac_2months`
--

INSERT INTO `vac_2months` (`baby_id`, `approved_doctor_id`, `midwife_id`, `vac_name`, `vac_id`, `date_given`, `batch_no`, `side_effects`, `status`, `id`) VALUES
('001/02/2018/1000', 'doctor1', 'midwife1', 'Pentavalent-1', 3, '2018-08-04', 'EMZ1248', NULL, 1, 1),
('001/02/2018/1000', 'doctor1', 'midwife1', 'OPV-1', 4, '2018-04-04', 'EMZ1232', NULL, 1, 2),
('001/02/2018/1000', 'doctor1', 'midwife1', 'fIPV-1', 5, '2018-05-05', 'EMZ1285', NULL, 1, 3),
('001/01/2020/1000', 'doctor1', 'midwife1', 'Pentavalent-1', 3, '2020-03-05', 'EMZ1248', NULL, 1, 4),
('001/01/2020/1000', 'doctor1', 'midwife1', 'OPV-1', 4, '2020-03-17', 'EMZ1232', NULL, 1, 5),
('001/01/2020/1000', 'doctor1', 'midwife1', 'fIPV-1', 5, '2020-03-17', 'EMZ1285', NULL, 1, 6),
('001/02/2020/1000', 'doctor1', 'midwife1', 'Pentavalent-1', 3, '2020-04-02', 'EMZ1232', NULL, 1, 7),
('001/02/2020/1000', 'doctor1', 'midwife1', 'OPV-1', 4, '2020-04-02', 'EMZ1232', NULL, 1, 8),
('001/02/2020/1000', 'doctor1', 'midwife1', 'fIPV-1', 5, '2020-04-02', 'EMZ1248', NULL, 1, 9);

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
('001/02/2018/1000', 'doctor1', 'midwife1', 'Pentavalent-2', 6, '2018-06-07', 'EMZ1236', NULL, 1),
('001/02/2018/1000', 'doctor1', 'midwife1', 'OVP-2', 7, '2018-06-07', 'EMZ1237', NULL, 1),
('001/02/2018/1000', 'doctor1', 'midwife1', 'fIPV-2', 8, '2018-06-07', 'KZR1479', NULL, 1),
('001/01/2020/1000', 'doctor1', 'midwife1', 'Pentavalent-2', 6, '2020-05-05', 'EMZ1232', NULL, 1),
('001/01/2020/1000', 'doctor1', 'midwife1', 'OVP-2', 7, '2020-05-05', 'EMZ1239', NULL, 1),
('001/01/2020/1000', 'doctor1', 'midwife1', 'fIPV-2', 8, '2020-06-06', 'EMZ1236', NULL, 1),
('001/02/2020/1000', 'doctor1', 'midwife1', 'Pentavalent-2', 6, '2020-06-06', 'EMZ1285', NULL, 1),
('001/02/2020/1000', 'doctor1', 'midwife1', 'OVP-2', 7, '2020-06-06', 'EMZ1236', NULL, 1),
('001/02/2020/1000', 'doctor1', 'midwife1', 'fIPV-2', 8, '2020-06-06', 'KZR1428', NULL, 1);

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
('001/02/2018/1000', 'doctor1', 'midwife1', 'Pentavalent-3', 9, '2018-08-09', 'KZR1487', NULL, 1),
('001/02/2018/1000', 'doctor1', 'midwife1', 'OVP-3', 10, '2018-08-08', 'KZR1425', NULL, 1),
('001/01/2020/1000', 'doctor1', 'midwife1', 'Pentavalent-3', 9, '2020-07-09', 'KZR1425', NULL, 1),
('001/01/2020/1000', 'doctor1', 'midwife1', 'OVP-3', 10, '2020-08-07', 'KZR1428', NULL, 1),
('001/02/2020/1000', 'doctor1', 'midwife1', 'Pentavalent-3', 9, '2020-08-04', 'KZR1469', NULL, 1),
('001/02/2020/1000', 'doctor1', 'midwife1', 'OVP-3', 10, '2020-08-04', 'KZR1479', NULL, 1);

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
('001/02/2018/1000', 'doctor1', 'midwife1', 'MMR-1', 11, '2018-11-05', 'KZR1469', NULL, 1);

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
('001/02/2018/1000', 'doctor1', 'midwife1', 'DPT', 13, '2019-08-06', 'EMZ1245', NULL, 1),
('001/02/2018/1000', 'doctor1', 'midwife1', 'OPV-4', 14, '2019-08-07', 'EMZ1287', NULL, 1);

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
('001/02/2018/1000', 'BCG-1', 1, '2018-02-02', 'EMZ1245', NULL, 'midwife1', 1, NULL, 1),
('001/01/2020/1000', 'BCG-1', 1, '2020-01-04', 'EMZ1245', NULL, 'midwife1', NULL, NULL, 1),
('001/01/2020/1000', 'BCG-2', 2, NULL, NULL, 'doctor1', 'midwife1', NULL, NULL, 0),
('001/02/2020/1000', 'BCG-1', 1, '2020-02-06', 'EMZ1248', NULL, 'midwife1', NULL, NULL, 1);

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
  ADD PRIMARY KEY (`id`),
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
-- Indexes for table `doctor_reminder`
--
ALTER TABLE `doctor_reminder`
  ADD PRIMARY KEY (`id`),
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
  ADD PRIMARY KEY (`id`),
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `baby_id` (`baby_id`),
  ADD KEY `midwife_id` (`midwife_id`);

--
-- Indexes for table `vac_2months`
--
ALTER TABLE `vac_2months`
  ADD PRIMARY KEY (`id`),
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
-- AUTO_INCREMENT for table `child_health_note`
--
ALTER TABLE `child_health_note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `doctor_reminder`
--
ALTER TABLE `doctor_reminder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `doc_thriposha`
--
ALTER TABLE `doc_thriposha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `growth`
--
ALTER TABLE `growth`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vaccine_date`
--
ALTER TABLE `vaccine_date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `vac_2months`
--
ALTER TABLE `vac_2months`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- Constraints for table `doctor_reminder`
--
ALTER TABLE `doctor_reminder`
  ADD CONSTRAINT `doctor_reminder_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`);

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
