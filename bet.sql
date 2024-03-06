-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2018 at 06:01 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_phone` varchar(45) NOT NULL,
  `admin_username` varchar(45) NOT NULL,
  `admin_password` varchar(45) NOT NULL,
  `admin_amount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_phone`, `admin_username`, `admin_password`, `admin_amount`) VALUES
(1, 'moshiul', 'moshiulislam42@gmail.com', '01749912520', 'moshiul711', '12345', 2567);

-- --------------------------------------------------------

--
-- Table structure for table `admin_transaction`
--

CREATE TABLE `admin_transaction` (
  `admin_transaction_id` int(11) NOT NULL,
  `admin_transaction_type` enum('i','o') NOT NULL,
  `admin_transaction_amount` float NOT NULL,
  `admin_transaction_value` float NOT NULL,
  `tbl_admin_admin_id` int(11) NOT NULL,
  `tbl_coin_value_coin_value_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bet_post`
--

CREATE TABLE `bet_post` (
  `bet_id` int(11) NOT NULL,
  `bet_category` enum('cricket','football') NOT NULL,
  `bet_team1` varchar(45) NOT NULL,
  `bet_team2` varchar(45) NOT NULL,
  `bet_name` varchar(45) NOT NULL,
  `base_price` float NOT NULL,
  `bet_start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bet_end_time` time NOT NULL,
  `team1_ratio` float DEFAULT NULL,
  `team2_ratio` float DEFAULT NULL,
  `toss_ratio` float DEFAULT NULL,
  `tbl_admin_admin_id` int(11) NOT NULL,
  `player_ratio` float DEFAULT NULL,
  `picture1` varchar(45) DEFAULT NULL,
  `picture2` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bet_post`
--

INSERT INTO `bet_post` (`bet_id`, `bet_category`, `bet_team1`, `bet_team2`, `bet_name`, `base_price`, `bet_start_time`, `bet_end_time`, `team1_ratio`, `team2_ratio`, `toss_ratio`, `tbl_admin_admin_id`, `player_ratio`, `picture1`, `picture2`) VALUES
(4, 'cricket', 'Pakistan', 'India', 'Pakistan Super League', 50, '2018-03-03 02:12:04', '01:01:00', 1.4, 1.6, 2, 1, 3, 'pakistan.jpg', 'india.jpg'),
(5, 'cricket', 'Bangladesh', 'Srilanka', 'Bangladesh Premier League', 50, '2018-03-10 02:21:47', '01:01:00', 1.4, 1.6, 2, 1, 3, 'pakistan.jpg', 'india.jpg'),
(6, '', '', '', '', 0, '0000-00-00 00:00:00', '00:00:00', 0, 0, 0, 1, 0, '', ''),
(7, '', '', '', '', 0, '0000-00-00 00:00:00', '00:00:00', 0, 0, 0, 1, 0, '', ''),
(8, '', '', '', '', 0, '0000-00-00 00:00:00', '00:00:00', 0, 0, 0, 1, 0, '', ''),
(9, '', '', '', '', 0, '0000-00-00 00:00:00', '00:00:00', 0, 0, 0, 1, 0, '', ''),
(10, '', '', '', '', 0, '0000-00-00 00:00:00', '00:00:00', 0, 0, 0, 1, 0, '', ''),
(11, '', '', '', '', 0, '0000-00-00 00:00:00', '00:00:00', 0, 0, 0, 1, 0, '', ''),
(12, '', '', '', '', 0, '0000-00-00 00:00:00', '00:00:00', 0, 0, 0, 1, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `coin_value`
--

CREATE TABLE `coin_value` (
  `coin_value_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `coin_value` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `user_email` varchar(45) NOT NULL,
  `user_phone` varchar(45) NOT NULL,
  `user_amount` float DEFAULT NULL,
  `user_password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_phone`, `user_amount`, `user_password`) VALUES
(5, 'Md Moshiul islam', 'moshiulislam42@gmail.com', '01749912520', 0, '12345'),
(6, 'moshiul', 'moshiul711@diu.edu.bd', '01674482373', 60, '123qwe'),
(7, 'Dinner', 'moashiul@gmail.com', '01674482373', 978, 'qazxsw');

-- --------------------------------------------------------

--
-- Table structure for table `user_beat`
--

CREATE TABLE `user_beat` (
  `userbet_id` int(11) NOT NULL,
  `bet_name` varchar(45) DEFAULT NULL,
  `bet_amount` float NOT NULL,
  `bet_amount_value` float DEFAULT NULL,
  `tbl_users_user_id` int(11) NOT NULL,
  `tbl_betPost_bet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_beat`
--

INSERT INTO `user_beat` (`userbet_id`, `bet_name`, `bet_amount`, `bet_amount_value`, `tbl_users_user_id`, `tbl_betPost_bet_id`) VALUES
(1, 'gjh', 5, 5, 5, 4),
(2, 'Pakistan', 45, 45, 5, 4),
(3, 'Pakistan', 23, 23, 5, 4),
(4, 'Pakistan', 45, 45, 5, 4),
(5, 'Pakistan', 20, 20, 5, 4),
(6, 'Pakistan', 10, 10, 5, 4),
(7, 'Pakistan', 70, 70, 5, 4),
(8, 'Pakistan', 1, 1, 5, 4),
(9, 'India', 12, 12, 5, 4),
(10, 'Pakistan', 20, 20, 5, 4),
(11, 'Pakistan', 20, 112, 5, 4),
(12, 'Pakistan', 20, 28, 5, 4),
(13, 'Pakistan', 20, 28, 5, 4),
(14, 'Pakistan', 20, 28, 5, 4),
(15, 'Pakistan', 15, 21, 6, 4),
(16, 'Pakistan', 5, 7, 6, 4),
(17, 'Pakistan', 10, 14, 6, 4),
(18, 'India', 100, 160, 7, 4),
(19, 'Srilanka', 10, 16, 7, 5),
(20, 'India', 100, 160, 7, 4),
(21, 'India', 12, 19.2, 7, 4),
(22, 'Pakistan', 60, 84, 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_transaction`
--

CREATE TABLE `user_transaction` (
  `transaction_id` int(11) NOT NULL,
  `transaction_type` enum('i','o') NOT NULL,
  `transaction_amount` float DEFAULT NULL,
  `transaction_amount_value` float DEFAULT NULL,
  `tbl_coin_value_coin_value_id` int(11) NOT NULL,
  `tbl_users_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_transaction`
--
ALTER TABLE `admin_transaction`
  ADD PRIMARY KEY (`admin_transaction_id`),
  ADD KEY `fk_tbl_admin_transaction_tbl_admin1_idx` (`tbl_admin_admin_id`),
  ADD KEY `fk_tbl_admin_transaction_tbl_coin_value1_idx` (`tbl_coin_value_coin_value_id`);

--
-- Indexes for table `bet_post`
--
ALTER TABLE `bet_post`
  ADD PRIMARY KEY (`bet_id`),
  ADD KEY `fk_tbl_betPost_tbl_admin1_idx` (`tbl_admin_admin_id`);

--
-- Indexes for table `coin_value`
--
ALTER TABLE `coin_value`
  ADD PRIMARY KEY (`coin_value_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_beat`
--
ALTER TABLE `user_beat`
  ADD PRIMARY KEY (`userbet_id`),
  ADD KEY `fk_tbl_user_beat_tbl_users_idx` (`tbl_users_user_id`),
  ADD KEY `fk_tbl_user_beat_tbl_betPost1_idx` (`tbl_betPost_bet_id`);

--
-- Indexes for table `user_transaction`
--
ALTER TABLE `user_transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `fk_tbl_user_transaction_tbl_coin_value1_idx` (`tbl_coin_value_coin_value_id`),
  ADD KEY `fk_tbl_user_transaction_tbl_users1_idx` (`tbl_users_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_transaction`
--
ALTER TABLE `admin_transaction`
  MODIFY `admin_transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bet_post`
--
ALTER TABLE `bet_post`
  MODIFY `bet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `coin_value`
--
ALTER TABLE `coin_value`
  MODIFY `coin_value_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_beat`
--
ALTER TABLE `user_beat`
  MODIFY `userbet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_transaction`
--
ALTER TABLE `user_transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_transaction`
--
ALTER TABLE `admin_transaction`
  ADD CONSTRAINT `fk_tbl_admin_transaction_tbl_admin1` FOREIGN KEY (`tbl_admin_admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_admin_transaction_tbl_coin_value1` FOREIGN KEY (`tbl_coin_value_coin_value_id`) REFERENCES `coin_value` (`coin_value_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `bet_post`
--
ALTER TABLE `bet_post`
  ADD CONSTRAINT `fk_tbl_betPost_tbl_admin1` FOREIGN KEY (`tbl_admin_admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_beat`
--
ALTER TABLE `user_beat`
  ADD CONSTRAINT `fk_tbl_user_beat_tbl_betPost1` FOREIGN KEY (`tbl_betPost_bet_id`) REFERENCES `bet_post` (`bet_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_user_beat_tbl_users` FOREIGN KEY (`tbl_users_user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_transaction`
--
ALTER TABLE `user_transaction`
  ADD CONSTRAINT `fk_tbl_user_transaction_tbl_coin_value1` FOREIGN KEY (`tbl_coin_value_coin_value_id`) REFERENCES `coin_value` (`coin_value_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_user_transaction_tbl_users1` FOREIGN KEY (`tbl_users_user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
