-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 04, 2017 at 01:21 PM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slac`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `reg_no` varchar(25) NOT NULL,
  `login_date` varchar(55) NOT NULL,
  `login_time` varchar(55) NOT NULL,
  `logout_time` varchar(55) NOT NULL DEFAULT '-1',
  `live` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permanent_list`
--

CREATE TABLE `permanent_list` (
  `id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `reg_no` varchar(25) NOT NULL,
  `year_of_admission` int(4) NOT NULL,
  `branch` text NOT NULL,
  `hours_worked` double NOT NULL DEFAULT '0',
  `unique_id` int(11) NOT NULL DEFAULT '0',
  `approval` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wait_list`
--

CREATE TABLE `wait_list` (
  `id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `reg_no` varchar(25) NOT NULL,
  `year_of_admission` int(4) NOT NULL,
  `branch` text NOT NULL,
  `hours_worked` double NOT NULL,
  `unique_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permanent_list`
--
ALTER TABLE `permanent_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wait_list`
--
ALTER TABLE `wait_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `permanent_list`
--
ALTER TABLE `permanent_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `wait_list`
--
ALTER TABLE `wait_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
