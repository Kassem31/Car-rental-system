-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2022 at 11:15 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `plate_id` char(6) NOT NULL,
  `model` varchar(20) NOT NULL,
  `manefacturing_company` varchar(30) NOT NULL,
  `airconditioned` tinyint(4) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `price_per_day` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`plate_id`, `model`, `manefacturing_company`, `airconditioned`, `status`, `price_per_day`) VALUES
('AA1234', 'x1', 'bmw', 0, 1, 10),
('DD1234', 'Elentra', 'Hyundai', 1, 1, 10),
('EE1233', 'corolla', 'toyota', 1, 1, 10),
('EE1234', 'x6', 'bmw', 1, 1, 10),
('EE3333', 'a5', 'mercedes', 1, 1, 10),
('PP1234', 'yaris', 'toyota', 1, 1, 10),
('SS1234', 'x6', 'bmw', 1, 1, 10),
('TT1234', 'mach', 'mercedes', 1, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `user_id` int(11) NOT NULL,
  `plate_id` varchar(6) NOT NULL,
  `pickup_date` date NOT NULL,
  `return_date` date NOT NULL,
  `fee` float(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`user_id`, `plate_id`, `pickup_date`, `return_date`, `fee`) VALUES
(1, 'AA1234', '2012-12-11', '2012-12-01', 5.00),
(4, 'EE3333', '2012-12-11', '2012-12-01', 5.00),
(4, 'PP1234', '2012-12-11', '2012-12-01', 5.00),
(4, 'SS1234', '2012-12-11', '2012-12-01', 5.00);

-- --------------------------------------------------------

--
-- Table structure for table `system_user`
--

CREATE TABLE `system_user` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_user`
--

INSERT INTO `system_user` (`user_id`, `fname`, `email`, `user_name`, `pass`, `admin`) VALUES
(1, 'Stewart', 'Stewart11@123.com', 'stewart11', '123', 1),
(2, 'Echo', 'Echo33@123.com', 'echo331', '123', 1),
(3, 'Channing', 'Channing11@123.com', 'Channing', '123', 1),
(4, 'Jeanette', 'Jeanette22@123.com', 'Jeanette', 'qweert', 0),
(5, 'Ferris', 'Ferris@123.com', 'Ferris', 'sdasds', 0),
(6, 'Russell', 'Russell@123.com', 'Russell', 'sadas', 0),
(7, 'Amal', 'Amal@123.com', 'Amal', 'sada', 0),
(8, 'Nita', 'Nita11@123.com', 'Nita', 'aaaaaa', 0),
(9, 'Nita', 'Nita@123.com', 'Nita3333', 'asdad', 0),
(10, 'Evelyn', 'Evelyn@123.com', 'Evelyn', 'asdasd', 0),
(11, 'Hayden', 'Hayden@123.com', 'Hayden57', 'asdass', 0),
(12, 'May', 'May@123.com', 'May', 'sasssss', 0),
(13, 'Franks', 'Franks44@123.com', 'Franks', 'frank', 0),
(14, 'Hester', 'Hester@123.com', 'Hester', 'hhhaS', 0),
(15, 'Limal', 'Limal11111@123.com', 'Limal', 'AAass', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`plate_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`user_id`,`plate_id`,`pickup_date`,`return_date`),
  ADD KEY `plate_id` (`plate_id`);

--
-- Indexes for table `system_user`
--
ALTER TABLE `system_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `data1` (`email`,`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `system_user`
--
ALTER TABLE `system_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `system_user` (`user_id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`plate_id`) REFERENCES `car` (`plate_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
