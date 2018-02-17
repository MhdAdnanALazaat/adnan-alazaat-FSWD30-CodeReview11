-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2018 at 03:43 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_adnan_alazaat`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `City` varchar(55) DEFAULT NULL,
  `Country` varchar(55) DEFAULT NULL,
  `strasse` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `zip_code`, `City`, `Country`, `strasse`) VALUES
(1, 1010, 'wien', 'austria', 'nordwestbahnstrasee 3'),
(2, 2121, 'linz', 'austria', 'haerstrasee 5'),
(3, 121, 'salzburg', 'austria', 'asmayastrasee 9'),
(4, 4322, 'graz', 'austria', 'grazbanhofstrasee 8');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `car_name` varchar(55) DEFAULT NULL,
  `car_model` varchar(55) DEFAULT NULL,
  `fk_office_id` int(11) DEFAULT NULL,
  `status` enum('available','reservedz') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `car_name`, `car_model`, `fk_office_id`, `status`) VALUES
(1, 'mazdah', 'sportcar', 1, 'reservedz'),
(2, 'bmw', 'sportcar', 1, 'available'),
(3, 'Jaguar', 'Businessmen car', 2, 'available'),
(4, 'Rover', 'Businessmen car', 2, 'available'),
(5, 'Peugeot', 'famalicar', 3, 'available'),
(6, 'Lamborghini', 'sportcar', 3, 'reservedz'),
(7, 'Volvo', 'famalicar', 4, 'available'),
(8, 'Mitsubishi', 'sportcar', 4, 'reservedz'),
(9, 'suzuki', 'transportation car', 1, 'available'),
(10, 'Hyindyi', 'transportation car', 1, 'available'),
(11, 'Dawoo', 'famalicar', 2, 'available'),
(12, 'Ford', 'sportcar', 2, 'available'),
(13, 'Hummer', 'Businessmen car', 3, 'reservedz'),
(14, 'Cadlilac', 'Businessmen car', 3, 'available'),
(15, 'Fiat', 'famalicar', 4, 'available'),
(16, 'Ferrari', 'sportcar', 4, 'reservedz'),
(17, 'Bentely', 'Businessmen car', 1, 'reservedz'),
(18, 'Vauxhall', 'famalicar', 1, 'reservedz'),
(19, 'Bentely', 'sportcar', 2, 'reservedz');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `gps_location` varchar(255) DEFAULT NULL,
  `fk_cars_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `gps_location`, `fk_cars_id`) VALUES
(1, 'Landstrasse-Hauptstrasse  1/1', 1),
(2, 'Landstrasse-Hauptstrasse  1/1', 18),
(3, 'Landstrasse-Hauptstrasse  1/1', 17),
(4, 'nordwestbhanstrasse 3', 16),
(5, 'haubtbanhof 12', 13),
(6, 'asmiagasse 2', 19),
(7, 'haubtbanhof 12', 8),
(8, 'westbanhof 14', 6);

-- --------------------------------------------------------

--
-- Table structure for table `php_car_rental_agency`
--

CREATE TABLE `php_car_rental_agency` (
  `PHP_car_rental_agency_id` int(11) NOT NULL,
  `name` varchar(55) DEFAULT NULL,
  `fk_address_id` int(11) DEFAULT NULL,
  `fk_users_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `php_car_rental_agency`
--

INSERT INTO `php_car_rental_agency` (`PHP_car_rental_agency_id`, `name`, `fk_address_id`, `fk_users_id`) VALUES
(1, 'ausriacar', 1, NULL),
(2, 'ausriacar', 2, NULL),
(3, 'ausriacar', 3, NULL),
(4, 'ausriacar', 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(55) DEFAULT NULL,
  `last_name` varchar(55) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `Registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `Registration_date`) VALUES
(1, 'adnna', 'ALAZAAT', 'adnan@hotmail.com', 'e0bc60c82713f64ef8a57c0c40d02ce24fd0141d5cc3086259c19b1e62a62bea', '2018-02-16 11:35:35'),
(2, 'omran', 'kabab', 'omran@gmail.com', 'e0bc60c82713f64ef8a57c0c40d02ce24fd0141d5cc3086259c19b1e62a62bea', '2018-02-16 21:35:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `fk_office_id` (`fk_office_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `fk_cars_id` (`fk_cars_id`);

--
-- Indexes for table `php_car_rental_agency`
--
ALTER TABLE `php_car_rental_agency`
  ADD PRIMARY KEY (`PHP_car_rental_agency_id`),
  ADD KEY `fk_address_id` (`fk_address_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`fk_office_id`) REFERENCES `php_car_rental_agency` (`PHP_car_rental_agency_id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`fk_cars_id`) REFERENCES `cars` (`car_id`);

--
-- Constraints for table `php_car_rental_agency`
--
ALTER TABLE `php_car_rental_agency`
  ADD CONSTRAINT `php_car_rental_agency_ibfk_1` FOREIGN KEY (`fk_address_id`) REFERENCES `address` (`address_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
