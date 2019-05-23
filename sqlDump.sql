-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2019 at 02:40 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `affilomania`
--
CREATE DATABASE IF NOT EXISTS `affilomania` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `affilomania`;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `first_name`, `last_name`, `email`, `username`, `password`, `created_at`, `last_update_time`, `is_active`) VALUES
(1, 'Ruty', 'Cohen', 'veronicadar@gmail.com', 'rutycohen', '866c499e04a94c1a4ba9b181a5e0ca31', '2019-05-23 01:02:41', '2019-05-23 04:02:41', 0),
(2, 'Natali', 'Cohen', 'veronicadar1@gmail.com', 'nataly123', '866c499e04a94c1a4ba9b181a5e0ca31', '2019-05-23 01:11:30', '2019-05-23 09:18:54', 1),
(3, 'Saga', 'Dun', 'veronicadar2@gmail.com', 'sagadun', '866c499e04a94c1a4ba9b181a5e0ca31', '2019-05-23 01:13:05', '2019-05-23 09:19:55', 1),
(4, 'Alexa', 'Eart', 'veronicadar4@gmail.com', 'alexa', '3ec09b239483e8eab0f4640d4021af20', '2019-05-23 09:10:46', '2019-05-23 12:10:46', 1),
(5, 'Vivian', 'Faly', 'veronicadar5@gmail.com', 'vivivi', 'a3b0b1d146e0b2f973f5031b6e0fb2f3', '2019-05-23 09:21:54', '2019-05-23 12:21:54', 0),
(6, 'Victor', 'Wallin', 'veronicadar7@gmail.com', 'victoew', 'a3b0b1d146e0b2f973f5031b6e0fb2f3', '2019-05-23 09:23:01', '2019-05-23 12:23:01', 0),
(7, 'Dmitar', 'Savsky', 'veronicadar8@gmail.com', 'dmitar', 'a3b0b1d146e0b2f973f5031b6e0fb2f3', '2019-05-23 09:23:39', '2019-05-23 12:23:39', 0),
(8, 'Stephan', 'Aski', 'veronicadar9@gmail.com', 'stephanG', 'a3b0b1d146e0b2f973f5031b6e0fb2f3', '2019-05-23 09:24:22', '2019-05-23 12:19:29', 1),
(9, 'Stephan', 'Aski', 'veronicadar10@gmail.com', 'stephan4', '56ef32049ca9f38a2ea74f3388ff252e', '2019-05-23 09:25:11', '2019-05-23 12:25:11', 1),
(10, 'Jon', 'Malko', 'veronicadar11@gmail.com', 'jon1234', '56ef32049ca9f38a2ea74f3388ff252e', '2019-05-23 09:25:45', '2019-05-23 12:19:02', 1),
(11, 'diana', 'read', 'veronicadar12@gmail.com', 'diana', '56ef32049ca9f38a2ea74f3388ff252e', '2019-05-23 10:03:35', '2019-05-23 13:03:35', 1),
(12, 'Alice', 'Folk', 'veronicadar13@gmail.com', 'alice', '56ef32049ca9f38a2ea74f3388ff252e', '2019-05-23 10:25:45', '2019-05-23 13:25:45', 0),
(13, 'Alice', 'Folk', 'veronicadar14@gmail.com', 'alice1', '56ef32049ca9f38a2ea74f3388ff252e', '2019-05-23 10:26:15', '2019-05-23 13:26:15', 0),
(14, 'Alice', 'Folk', 'veronicadar15@gmail.com', 'alice2', '56ef32049ca9f38a2ea74f3388ff252e', '2019-05-23 10:26:26', '2019-05-23 13:26:26', 0),
(15, 'Alice', 'Folk', 'veronicadar16@gmail.com', 'alice3', '56ef32049ca9f38a2ea74f3388ff252e', '2019-05-23 10:26:36', '2019-05-23 13:26:36', 0),
(16, 'Alice', 'Folk', 'veronicadar17@gmail.com', 'alice4', '56ef32049ca9f38a2ea74f3388ff252e', '2019-05-23 10:26:44', '2019-05-23 13:26:44', 0),
(17, 'Alice', 'Folk', 'veronicadar18@gmail.com', 'alice5', '56ef32049ca9f38a2ea74f3388ff252e', '2019-05-23 10:26:54', '2019-05-23 13:26:54', 0),
(18, 'Alice', 'Folk', 'veronicadar19@gmail.com', 'alice56', '56ef32049ca9f38a2ea74f3388ff252e', '2019-05-23 10:27:03', '2019-05-23 13:27:03', 0),
(19, 'Alice', 'Folk', 'veronicadar20@gmail.com', 'alice7', '56ef32049ca9f38a2ea74f3388ff252e', '2019-05-23 10:27:16', '2019-05-23 13:27:16', 0),
(20, 'Alice', 'Folk', 'veronicadar21@gmail.com', 'alice8', '56ef32049ca9f38a2ea74f3388ff252e', '2019-05-23 10:27:25', '2019-05-23 13:27:25', 0),
(21, 'Alice', 'Folk', 'veronicadar22@gmail.com', 'alice9', '56ef32049ca9f38a2ea74f3388ff252e', '2019-05-23 10:27:33', '2019-05-23 13:27:33', 0),
(22, 'Alice', 'Folk', 'veronicadar23@gmail.com', 'alice10', '56ef32049ca9f38a2ea74f3388ff252e', '2019-05-23 10:27:44', '2019-05-23 13:27:44', 0),
(23, 'Alice', 'Folk', 'veronicadar24@gmail.com', 'alice11', '56ef32049ca9f38a2ea74f3388ff252e', '2019-05-23 10:27:55', '2019-05-23 13:27:55', 0),
(24, 'Alice', 'Folk', 'veronicadar25@gmail.com', 'alice25', '56ef32049ca9f38a2ea74f3388ff252e', '2019-05-23 10:28:06', '2019-05-23 13:28:06', 0),
(25, 'Alice', 'Folk', 'veronicadar26@gmail.com', 'alice26', '56ef32049ca9f38a2ea74f3388ff252e', '2019-05-23 10:28:13', '2019-05-23 13:28:13', 0),
(26, 'Alice', 'Folk', 'veronicadar27@gmail.com', 'alice27', '56ef32049ca9f38a2ea74f3388ff252e', '2019-05-23 10:28:19', '2019-05-23 13:28:19', 0),
(27, 'Alice', 'Folk', 'veronicadar28@gmail.com', 'alice28', '56ef32049ca9f38a2ea74f3388ff252e', '2019-05-23 10:28:28', '2019-05-23 13:28:28', 0),
(28, 'Lora', 'MAs', 'veronicadar29@gmail.com', 'loran', '56ef32049ca9f38a2ea74f3388ff252e', '2019-05-23 11:09:01', '2019-05-23 14:09:01', 1),
(29, 'Loran', 'Sev', 'veronicadar30@gmail.com', 'loran12', '56ef32049ca9f38a2ea74f3388ff252e', '2019-05-23 11:24:49', '2019-05-23 14:24:49', 1),
(30, 'Loran', 'Sev', 'veronicadar31@gmail.com', 'loran122', '56ef32049ca9f38a2ea74f3388ff252e', '2019-05-23 11:26:28', '2019-05-23 14:26:28', 1),
(31, 'Dana', 'Volt', 'veronicadar32@gmail.com', 'dana1', '56ef32049ca9f38a2ea74f3388ff252e', '2019-05-23 11:34:02', '2019-05-23 14:34:02', 0),
(36, 'Elika', 'Dun', 'veronicadar33@gmail.com', 'elika', '56ef32049ca9f38a2ea74f3388ff252e', '2019-05-23 12:32:15', '2019-05-23 15:32:15', 0),
(37, 'Fenix', 'Solf', 'veronicadar34@gmail.com', 'fenix', '56ef32049ca9f38a2ea74f3388ff252e', '2019-05-23 12:33:24', '2019-05-23 15:33:24', 1),
(38, 'Alice', 'Fox', 'veronicadar35@gmail.com', 'alice23', '56ef32049ca9f38a2ea74f3388ff252e', '2019-05-23 12:34:52', '2019-05-23 15:34:52', 0),
(39, 'Alice', 'Fox', 'veronicadar36@gmail.com', 'alice237676', '56ef32049ca9f38a2ea74f3388ff252e', '2019-05-23 12:35:23', '2019-05-23 15:35:23', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `last_update_time` (`last_update_time`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
