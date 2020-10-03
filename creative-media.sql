-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 02, 2020 at 08:41 PM
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
-- Database: `creative-media`
--

-- --------------------------------------------------------

--
-- Table structure for table `IPL_Fun_Chat`
--

CREATE TABLE `IPL_Fun_Chat` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `msg` longtext DEFAULT NULL,
  `msg_sending_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `profile_picture` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `IPL_Fun_Chat`
--

INSERT INTO `IPL_Fun_Chat` (`id`, `name`, `email`, `msg`, `msg_sending_time`, `profile_picture`) VALUES
(6, 'Bala Yokesh Mani', 'balayokeshmani@gmail.com', 'Hi everyone', '2020-10-02 01:02:03', 'https://lh4.googleusercontent.com/-KXkAhvNgSv8/AAAAAAAAAAI/AAAAAAAAAFg/AMZuucn6N3rYXW4jDLoX9aRVZTfydJapig/photo.jpg'),
(36, 'Bala Yokesh Mani', 'balayokeshmani@gmail.com', 'How is going?', '2020-10-02 15:59:20', 'https://lh4.googleusercontent.com/-KXkAhvNgSv8/AAAAAAAAAAI/AAAAAAAAAFg/AMZuucn6N3rYXW4jDLoX9aRVZTfydJapig/photo.jpg'),
(37, 'Aravind', 'vijayyogesh32@gmail.com', 'Fine', '2020-10-02 15:59:31', 'https://lh3.googleusercontent.com/a-/AOh14GhDBRyi5F5mDWf4OSZmHcXZDQ0o56Ir1gsy5A4UmA');

-- --------------------------------------------------------

--
-- Table structure for table `Web_Dev_Chat`
--

CREATE TABLE `Web_Dev_Chat` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `msg` longtext DEFAULT NULL,
  `msg_sending_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `profile_picture` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Web_Dev_Chat`
--

INSERT INTO `Web_Dev_Chat` (`id`, `name`, `email`, `msg`, `msg_sending_time`, `profile_picture`) VALUES
(6, 'Bala Yokesh Mani', 'balayokeshmani@gmail.com', 'Hi everyone.  I am zero in programming.  Can anyone suggest me from where I should start?', '2020-10-02 06:32:36', 'https://lh4.googleusercontent.com/-KXkAhvNgSv8/AAAAAAAAAAI/AAAAAAAAAFg/AMZuucn6N3rYXW4jDLoX9aRVZTfydJapig/photo.jpg'),
(10, 'Bala Yokesh Mani', 'balayokeshmani@gmail.com', 'Start learning from web development.  It will be amazing', '2020-10-02 07:18:13', 'https://lh4.googleusercontent.com/-KXkAhvNgSv8/AAAAAAAAAAI/AAAAAAAAAFg/AMZuucn6N3rYXW4jDLoX9aRVZTfydJapig/photo.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `IPL_Fun_Chat`
--
ALTER TABLE `IPL_Fun_Chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Web_Dev_Chat`
--
ALTER TABLE `Web_Dev_Chat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `IPL_Fun_Chat`
--
ALTER TABLE `IPL_Fun_Chat`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `Web_Dev_Chat`
--
ALTER TABLE `Web_Dev_Chat`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
