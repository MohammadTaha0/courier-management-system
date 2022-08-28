-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2022 at 12:18 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courier management system`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `msg` varchar(111) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time(1) NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `msg`, `date`, `time`, `user_id`) VALUES
(1, 'taha', 'taha@gmail.com', 'This Is Messege.', '2022-08-14', '15:40:38.0', 20),
(2, 'M.Taha', 'm.taha10045@gmail.com', 'This Messege 2', '2022-08-14', '15:40:38.0', 20),
(3, 'Seeker', 'mtaha1007@gmail.com', 'hgghfghfhfgghf ', '2022-08-14', '15:40:38.0', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `id` int(255) NOT NULL,
  `branch_code` varchar(45) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`id`, `branch_code`, `address`, `city`, `state`, `zip_code`, `country`, `contact`, `date_created`) VALUES
(15, '62e7feeb5380a', 'e-51 gulshan e kaneez', 'Karachi', 'Sindh', '45123', 'Pakistan', '02451212121', '2022-08-01'),
(17, '62e7ff2e6d11e', 'Liaqtuabad C1-Area', 'Karachi', 'Sindh', '56897', 'Pakistan', '03254612184', '2022-08-01'),
(18, '62f100b43e8a7', 'branch_street/branch_building', 'branch_city', 'branch_state', '00111', 'branch_country', '03215997874', '2022-08-08'),
(19, '62f102e54e303', 'branch1_street/branch_building', 'branch1_city', 'branch1_state', '00222', 'branch1_country', '02145698723', '2022-08-08'),
(20, '62f108b1e596a', 'branch2_street/branch_building', 'branch2_city', 'branch2_state', '00333', 'branch3_country', '01245632998', '2022-08-08'),
(21, '62f1095b488f4', 'branch3_street/branch_building', 'branch3_city', 'branch3_state', '00444', 'branch3_country', '03224445111', '2022-08-08'),
(22, '62f10983046c8', 'branch4_street/branch_building', 'branch4_city', 'branch4_state', '00555', 'branch4_country', '03457895623', '2022-08-08'),
(23, '62f10a1c4a0df', 'branch5_street/branch_building', 'branch5_city', 'branch5_state', '00666', 'branch5_country', '02145698233', '2022-08-08'),
(24, '62f121e0b4dde', 'branch6_street/branch_building', 'branch6_city', 'branch6_state', '00666', 'branch6_country', '03145124547', '2022-08-08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_courier`
--

CREATE TABLE `tbl_courier` (
  `id` int(255) NOT NULL,
  `tracking_number` varchar(255) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `sender_address` varchar(255) NOT NULL,
  `sender_contact` varchar(255) NOT NULL,
  `recipitent_name` varchar(255) NOT NULL,
  `recipient_address` varchar(255) NOT NULL,
  `recipient_contact` varchar(255) NOT NULL,
  `type` int(1) NOT NULL COMMENT 'pickup = 1, deliver = 2',
  `from_branch_id` int(255) NOT NULL,
  `to_branch_id` int(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `width` varchar(255) NOT NULL,
  `lenght` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  `date_created` date NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_courier`
--

INSERT INTO `tbl_courier` (`id`, `tracking_number`, `sender_name`, `sender_address`, `sender_contact`, `recipitent_name`, `recipient_address`, `recipient_contact`, `type`, `from_branch_id`, `to_branch_id`, `weight`, `height`, `width`, `lenght`, `price`, `status`, `date_created`, `email`) VALUES
(4, '84093958961', 'Mohammad khalid', 'R-51 Gulshan-E-Kaneez Fatima Society .', '03222153815', 'Mohammad Majid', 'Shah Faisal Colony # 01', '03221545698', 1, 15, 15, '45', '23', '23', '32', '1267', 7, '2022-08-06', 'ok'),
(5, '59872755691', 'Mohammad Hassan1', 'R-51 Gulshan-E-Kaneez Fatima Society .', '03222153815', 'Mohammad Majid1', 'Shah Faisal Colony # 0111', 'Shah Faisal Colony # 0111', 2, 0, 17, '45', '43', '23', '32', '1267', 7, '2022-08-07', 'ok'),
(6, '481314826447', 'Mohammad Taha', 'R-51 Gulshan-E-Kaneez Fatima Society .', '03222153815', 'Mohammad Arsalan', 'Shah Faisal Colony # 0111', '03221545698', 2, 0, 20, '23', '23', '23', '32', '88', 0, '2022-08-17', 'user!@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_register`
--

CREATE TABLE `tbl_register` (
  `id` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userrole` int(255) NOT NULL COMMENT 'admin = 0 , user = 2, agent = 1.',
  `branch_id` int(255) DEFAULT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_register`
--

INSERT INTO `tbl_register` (`id`, `firstname`, `lastname`, `email`, `password`, `userrole`, `branch_id`, `date_created`) VALUES
(11, 'admin', 'admin', 'admin', 'admin', 0, 17, '2022-08-01'),
(13, 'ok', 'ok', 'ok', 'ok', 2, NULL, '2022-08-01'),
(18, 'Mohammad', 'Taha', 'taha', 'taah', 1, 17, '2022-08-01'),
(20, 'user1', 'user1lname', 'user1@gmail.com', 'user1', 2, 15, '2022-08-08'),
(21, 'agent1', 'agent1', 'agent1', 'agent1', 1, 19, '2022-08-08'),
(22, 'agent2', 'agent2', 'agent2', 'agent2', 1, 20, '2022-08-08'),
(23, 'agent3', 'agent3', 'agent3', 'agent3', 1, 21, '2022-08-08'),
(24, 'agent4', 'agent4', 'agent4', 'agent4', 1, 22, '2022-08-08'),
(25, 'agent5', 'agent5', 'agent5', 'agent5', 1, 23, '2022-08-08'),
(26, 'agent6', 'agent6', 'agent6', 'agent6', 1, 24, '2022-08-08'),
(27, 'agent7', 'agent7', 'agent7', 'agent7', 1, 18, '2022-08-08'),
(28, 'agent8', 'agent8', 'agent8', 'agent8', 1, 15, '2022-08-08'),
(30, 'user1', 'user1', 'user!@gmail.com', 'user1', 2, NULL, '2022-08-08'),
(31, 'user2', 'user2', 'user2@gmail.com', 'user2', 2, NULL, '2022-08-08'),
(32, 'user6', 'user6', 'user6@gmail.com', 'user6', 2, NULL, '2022-08-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `branch_code` (`branch_code`);

--
-- Indexes for table `tbl_courier`
--
ALTER TABLE `tbl_courier`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tracking_number` (`tracking_number`),
  ADD KEY `from_branch_id` (`from_branch_id`),
  ADD KEY `to_branch_id` (`to_branch_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `tbl_register`
--
ALTER TABLE `tbl_register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `branch_id` (`branch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_courier`
--
ALTER TABLE `tbl_courier`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_register`
--
ALTER TABLE `tbl_register`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_register` (`id`);

--
-- Constraints for table `tbl_courier`
--
ALTER TABLE `tbl_courier`
  ADD CONSTRAINT `tbl_courier_ibfk_2` FOREIGN KEY (`to_branch_id`) REFERENCES `tbl_branch` (`id`),
  ADD CONSTRAINT `tbl_courier_ibfk_3` FOREIGN KEY (`email`) REFERENCES `tbl_register` (`email`);

--
-- Constraints for table `tbl_register`
--
ALTER TABLE `tbl_register`
  ADD CONSTRAINT `tbl_register_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `tbl_branch` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
