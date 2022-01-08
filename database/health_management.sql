-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2022 at 06:30 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_information`
--

CREATE TABLE `account_information` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `id_number` varchar(50) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `account_password` varchar(100) NOT NULL,
  `access` varchar(20) NOT NULL,
  `is_activate` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_information`
--

INSERT INTO `account_information` (`id`, `name`, `lastname`, `middlename`, `email_address`, `id_number`, `contact_number`, `address`, `birthday`, `gender`, `account_password`, `access`, `is_activate`) VALUES
(6, 'james', 'yap', 'test', 'yap@gmail.com', '123', '123', 'etst', '', 'male', '123', 'admin', 1),
(8, 'lance', 'cabiscuelas', 'l', 'ladrera21@gmail.com', '123', '09307980536', 'bilucao malvar batangas', '2021-11-28', 'male', '123', 'admin', 0),
(9, 'lance2', 'cabiscuelas', 'l', 'test@gmail.com', '123', '09307980536', 'bilucao malvar batangas', '2021-12-16', 'male', '123', 'nurse', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient_data`
--

CREATE TABLE `patient_data` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `id_number` varchar(50) NOT NULL,
  `issue` varchar(100) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `note` varchar(300) NOT NULL,
  `age` varchar(50) NOT NULL,
  `guardian` varchar(100) NOT NULL,
  `medicine_take` varchar(100) NOT NULL,
  `parent_contact` varchar(50) NOT NULL,
  `issue_status` varchar(20) NOT NULL,
  `date_issue` varchar(50) NOT NULL,
  `time_issue` varchar(50) NOT NULL,
  `nurse_id` varchar(40) NOT NULL,
  `department` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_data`
--

INSERT INTO `patient_data` (`id`, `name`, `lastname`, `id_number`, `issue`, `contact_number`, `address`, `gender`, `note`, `age`, `guardian`, `medicine_take`, `parent_contact`, `issue_status`, `date_issue`, `time_issue`, `nurse_id`, `department`, `course`) VALUES
(3, 'lance cabiscuelas2', 'dsa', 'ads', 'adsa', '09307980536', 'bilucao malvar batangas', 'male', 'test', 'ads', 'lance cabiscuelas', 'adssa', '09307980536', 'minor', '2021-12-29', '12:undefined AM', '', 'test', 'IT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_information`
--
ALTER TABLE `account_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_data`
--
ALTER TABLE `patient_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_information`
--
ALTER TABLE `account_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `patient_data`
--
ALTER TABLE `patient_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
