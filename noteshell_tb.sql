-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2022 at 07:53 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notes_app_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `noteshell_tb`
--

CREATE TABLE `noteshell_tb` (
  `serialNo` int(4) NOT NULL,
  `name` text NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `noteshell_tb`
--

INSERT INTO `noteshell_tb` (`serialNo`, `name`, `title`, `description`, `dateTime`) VALUES
(3, 'Ishan Tiwari', 'Laravel Testing', 'Testing website using Dusk', '2022-08-30 16:09:16'),
(4, 'age', 'wcewcfe', '', '2022-08-30 22:13:27'),
(5, 'hit', 'pit', '', '2022-08-30 22:16:12'),
(6, 'qfegeqiufgequf', 'lwiehfoewihfoiew', '', '2022-08-31 10:02:35'),
(7, 'qfegeqiufgequf', 'lwiehfoewihfoiew', '', '2022-08-31 10:03:46'),
(8, 'qfegeqiufgequf', 'lwiehfoewihfoiew', '', '2022-08-31 10:05:18'),
(9, 'age', 'QEFfeqefef', 'ttytfytfyt', '2022-08-31 10:06:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `noteshell_tb`
--
ALTER TABLE `noteshell_tb`
  ADD PRIMARY KEY (`serialNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `noteshell_tb`
--
ALTER TABLE `noteshell_tb`
  MODIFY `serialNo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
