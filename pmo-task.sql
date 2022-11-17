-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2022 at 09:53 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmo-task`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `emp_title` varchar(255) NOT NULL,
  `emp_email` varchar(255) NOT NULL,
  `emp_mobile` varchar(25) NOT NULL,
  `emp_since` date NOT NULL,
  `company_category` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `company_phone` varchar(25) NOT NULL,
  `company_mobile` varchar(25) NOT NULL,
  `company_since` date NOT NULL,
  `company_website` varchar(255) NOT NULL,
  `company_capital` varchar(255) NOT NULL,
  `company_emp_count` int(11) NOT NULL,
  `company_profile` text NOT NULL,
  `company_logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `emp_name`, `emp_title`, `emp_email`, `emp_mobile`, `emp_since`, `company_category`, `company_name`, `company_address`, `company_phone`, `company_mobile`, `company_since`, `company_website`, `company_capital`, `company_emp_count`, `company_profile`, `company_logo`) VALUES
(17, 'ss123', '3691308f2a4c2f6983f2880d32e29c84', 'ss', 'ss', 'ww@gvffdgf.com', '121212', '2022-11-10', 'Material Supplier', 'ssee', 'ss', '109393939', '109393939', '2022-11-23', 'http://localhost/pmo-task/signup.php', 'wee', 4, 'ss', '2022-11-17-09-07270566a1760c59e184dba9298d4a7784.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `emp_email` (`emp_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
