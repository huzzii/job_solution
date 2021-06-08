-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2021 at 03:19 PM
-- Server version: 8.0.25-0ubuntu0.21.04.1
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint NOT NULL,
  `due_date` date NOT NULL,
  `description` longtext NOT NULL,
  `assignedBy` varchar(255) NOT NULL,
  `assignedTo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `due_date`, `description`, `assignedBy`, `assignedTo`, `status`) VALUES
(3, '2021-06-17', 'body ATask 2', 'MANAGER', 'EMPLOYEE', 'inprogress'),
(4, '2021-06-24', 'body 3', 'MANAGER', 'EMPLOYEE', 'completed'),
(5, '2021-06-27', 'body ATask 4', 'MANAGER', 'EMPLOYEE', 'inprogress'),
(6, '2021-06-14', 'body 5', 'MANAGER', 'EMPLOYEE', 'pending'),
(7, '2021-06-15', 'body6', 'MANAGER', 'EMPLOYEE', 'pending'),
(8, '2021-06-17', 'body 7', 'MANAGER', 'EMPLOYEE', 'completed'),
(9, '2021-06-19', 'body 9', 'MANAGER', 'EMPLOYEE', 'inprogress'),
(10, '2021-06-22', 'Task 9', 'MANAGER', 'EMPLOYEE', 'completed'),
(11, '2021-06-14', 'body 10', 'MANAGER', 'EMPLOYEE', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
