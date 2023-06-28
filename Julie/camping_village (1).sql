-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jun 27, 2023 at 11:53 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camping village`
--

-- --------------------------------------------------------

--
-- Table structure for table `reserveren`
--

CREATE TABLE `reserveren` (
  `Customer_id` int(11) NOT NULL,
  `visitor_name` varchar(244) NOT NULL,
  `visitor_email` varchar(244) NOT NULL,
  `visitor_phone` int(11) NOT NULL,
  `total_adults` int(10) NOT NULL,
  `total_children` int(10) NOT NULL,
  `checkin_date` date NOT NULL,
  `checkout_date` date NOT NULL,
  `visitor_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reserveren`
--

INSERT INTO `reserveren` (`Customer_id`, `visitor_name`, `visitor_email`, `visitor_phone`, `total_adults`, `total_children`, `checkin_date`, `checkout_date`, `visitor_message`) VALUES
(1, 'Julie Kraanen', '2165220@talnet.nl', 639477339, 2, 2, '2023-06-27', '2023-07-08', 'We zijn allergisch voor dieren'),
(2, 'John Doe', 'john.doe@gmail.com', 692278110, 3, 2, '2023-07-22', '2023-08-03', 'De kinderen zijn 5 en 3 jaar oud.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reserveren`
--
ALTER TABLE `reserveren`
  ADD PRIMARY KEY (`Customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reserveren`
--
ALTER TABLE `reserveren`
  MODIFY `Customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
