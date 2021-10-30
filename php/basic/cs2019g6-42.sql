-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2020 at 01:06 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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

-- --------------------------------------------------------

--
-- Table structure for table `growth`
--

CREATE TABLE `growth` (
  `baby_id` varchar(50) DEFAULT NULL,
  `midwife_id` varchar(50) DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  `baby_age_in_months` int(11) DEFAULT NULL
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
('sister1', 'doctor1', 'ho hooo', '2020-04-28', '13:46:18', 'unread');

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
-- Indexes for table `growth`
--
ALTER TABLE `growth`
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
