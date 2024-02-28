-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 13, 2021 at 03:07 PM
-- Server version: 5.7.32-0ubuntu0.16.04.1
-- PHP Version: 7.2.34-8+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MECCAdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(5) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `check_in_date`, `check_out_date`) VALUES
(1, '2021-01-21', '2021-01-21'),
(2, '2021-01-23', '2021-01-26'),
(3, '2021-01-24', '2021-01-27'),
(4, '2021-01-25', '2021-01-28'),
(5, '2021-01-26', '2021-01-29');

-- --------------------------------------------------------

--
-- Table structure for table `checkIn`
--

CREATE TABLE `checkIn` (
  `checkinID` int(5) NOT NULL,
  `checkInDate` date NOT NULL,
  `reserveID` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkIn`
--

INSERT INTO `checkIn` (`checkinID`, `checkInDate`, `reserveID`) VALUES
(1, '2021-01-21', 1),
(2, '2021-01-22', 2),
(3, '2021-01-23', 3),
(4, '2021-01-24', 4),
(5, '2021-01-25', 5);

-- --------------------------------------------------------

--
-- Table structure for table `checkOut`
--

CREATE TABLE `checkOut` (
  `checkoutID` int(5) NOT NULL,
  `checkoutDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkOut`
--

INSERT INTO `checkOut` (`checkoutID`, `checkoutDate`) VALUES
(1, '2021-01-23'),
(2, '2021-01-25'),
(3, '2021-01-26'),
(4, '2021-01-27'),
(5, '2021-01-28');

-- --------------------------------------------------------

--
-- Table structure for table `DluxRoom`
--

CREATE TABLE `DluxRoom` (
  `DluxID` int(5) NOT NULL,
  `DluxInfo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `DluxRoom`
--

INSERT INTO `DluxRoom` (`DluxID`, `DluxInfo`) VALUES
(1, 'the best'),
(2, 'the bomb '),
(3, 'is that real'),
(4, 'am i dreaming'),
(5, 'no you are not');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeID` int(5) NOT NULL,
  `empFname` varchar(100) NOT NULL,
  `empLname` varchar(100) NOT NULL,
  `empContact` varchar(100) NOT NULL,
  `hotelID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeID`, `empFname`, `empLname`, `empContact`, `hotelID`) VALUES
(1, 'dave', 'full', '2505090312', 1),
(2, 'da', 'ull', '2505090312', 2),
(3, 've', 'll', '2505090312', 3),
(4, 'ave', 'ful', '2505090312', 4),
(5, 'will', 'ull', '2505090312', 5);

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `guestID` int(5) NOT NULL,
  `guestFname` varchar(45) NOT NULL,
  `guestLname` varchar(45) NOT NULL,
  `guestAddress` varchar(45) NOT NULL,
  `guestCity` varchar(45) DEFAULT NULL,
  `guestContact` varchar(45) NOT NULL,
  `guestEmail` varchar(45) NOT NULL,
  `guestPassword` varchar(45) NOT NULL,
  `guestAdmin` enum('Guest','Admin') NOT NULL DEFAULT 'Guest'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`guestID`, `guestFname`, `guestLname`, `guestAddress`, `guestCity`, `guestContact`, `guestEmail`, `guestPassword`, `guestAdmin`) VALUES
(1, 'dave', 'Carrter', '4 best ave', 'nelson', '2505090315', 'a@email.com', 'pass', 'Admin'),
(2, 'doug', 'Carrot', '5 best ave', 'nelson', '2505090316', 'a@email.com2', 'pass', 'Guest'),
(3, 'dale', 'Carraher', '6 best ave', 'nelson', '2505090317', 'a@email.com4', 'pass', 'Guest'),
(4, 'dove', 'Carrs', '7 best ave', 'nelson', '2505090318', 'a@email.com5', 'pass', 'Guest'),
(5, 'duey', 'Carin', '8 best ave', 'nelson', '2505090319', 'a@email.com6', 'pass', 'Guest'),
(6, 'matt', 'potter', '2222', 'nelson', '7802409228', 'admin@admin.com', 'logitech207', 'Guest'),
(7, 'mp', 'mp', '2322', 'nelson', '7802422422', 'admin@admin.com', 'logitech', 'Guest');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotelID` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `roomCount` int(11) NOT NULL,
  `floorCount` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(25) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `emailAddress` varchar(45) NOT NULL,
  `website` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotelID`, `description`, `roomCount`, `floorCount`, `address`, `city`, `phone`, `emailAddress`, `website`) VALUES
(1, 'Nice and Classy', 40, 4, '1 awesone Ave', 'nelson', '2505090312', 'hotel@email.com', 'hotel.com');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoiceID` int(5) NOT NULL,
  `reserveID` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoiceID`, `reserveID`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `regRoom`
--

CREATE TABLE `regRoom` (
  `regID` int(5) NOT NULL,
  `regInfo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regRoom`
--

INSERT INTO `regRoom` (`regID`, `regInfo`) VALUES
(1, 'it was nice'),
(2, 'cheap '),
(3, 'regular '),
(4, 'not dreaming'),
(5, 'my back hurts');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `res_id` int(5) NOT NULL,
  `res_date` date DEFAULT NULL,
  `res_slot` varchar(32) DEFAULT NULL,
  `res_name` varchar(255) NOT NULL,
  `res_email` varchar(255) NOT NULL,
  `res_tel` varchar(60) NOT NULL,
  `res_notes` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`res_id`, `res_date`, `res_slot`, `res_name`, `res_email`, `res_tel`, `res_notes`) VALUES
(2, '2021-01-25', 'free', 'bob', 'email@mail2.com', '2505090312', 'bommber room2'),
(3, '2021-01-27', 'full', 'bill', 'email@mail3.com', '2505090313', 'bommber room3'),
(4, '2021-01-28', 'free', 'barb', 'email@mail4.com', '2505090314', 'bommber room4'),
(5, '2021-01-29', 'full', 'bonnie', 'email@mail5.com', '2505090351', 'bommber room5'),
(6, '2021-02-26', 'male', 'Robbie Carragher', 'orcawebdesigns@gmail.com', '2505090311', 'hgjhgjh'),
(7, '2021-02-26', 'male', 'Robbie Carragher', 'orcawebdesigns@gmail.com', '2505090311', 'hgjhgjh'),
(8, '2021-02-26', 'male', 'Robbie Carragher', 'orcawebdesigns@gmail.com', '2505090311', 'hgjhgjh'),
(9, '2021-02-26', 'male', 'Robbie Carragher', 'orcawebdesigns@gmail.com', '2505090311', 'hgjhgjh'),
(10, '2121-04-03', 'male', 'Robbie Carragher', 'orcawebdesigns@gmail.com', '2505090311', 'dfdf'),
(11, '2121-04-03', 'male', 'Robbie Carragher', 'orcawebdesigns@gmail.com', '2505090311', 'dfdf'),
(12, '2021-03-04', 'male', 'Robbie Carragher', 'orcawebdesigns@gmail.com', '2505090311', 'hgjhgjh'),
(13, '2121-03-04', 'male', 'Robbie Carragher', 'orcawebdesigns@gmail.com', '2505090311', 'dfdf'),
(14, '2121-03-04', 'male', 'Robbie Carragher', 'orcawebdesigns@gmail.com', '2505090311', 'dfdf'),
(15, '2121-03-04', 'male', 'Robbie Carragher', 'orcawebdesigns@gmail.com', '2505090311', 'dfdf'),
(16, '2121-03-04', 'male', 'Robbie Carragher', 'orcawebdesigns@gmail.com', '2505090311', 'dfdf'),
(17, '2121-03-04', 'male', 'Tim Cameron', 'tim@email.com', '2898959418', 'dfdfdf');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomID` int(5) NOT NULL,
  `roomNumber` int(5) NOT NULL,
  `regID` int(5) DEFAULT NULL,
  `DluxID` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomID`, `roomNumber`, `regID`, `DluxID`) VALUES
(3, 103, 3, 3),
(4, 104, 4, 4),
(5, 105, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `roomsBooked`
--

CREATE TABLE `roomsBooked` (
  `availableID` int(5) NOT NULL,
  `roomNumber` int(5) NOT NULL,
  `bookedCheckin` date NOT NULL,
  `bookedCheckout` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roomsBooked`
--

INSERT INTO `roomsBooked` (`availableID`, `roomNumber`, `bookedCheckin`, `bookedCheckout`) VALUES
(1, 1, '2021-01-23', '2021-01-26'),
(2, 2, '2021-01-24', '2021-01-27'),
(3, 3, '2021-01-25', '2019-01-21'),
(4, 4, '2021-01-26', '2021-01-22'),
(5, 5, '2021-01-27', '2021-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `roomService`
--

CREATE TABLE `roomService` (
  `serveID` int(5) NOT NULL,
  `hotelID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roomService`
--

INSERT INTO `roomService` (`serveID`, `hotelID`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `checkIn`
--
ALTER TABLE `checkIn`
  ADD PRIMARY KEY (`checkinID`),
  ADD KEY `reserveID` (`reserveID`);

--
-- Indexes for table `checkOut`
--
ALTER TABLE `checkOut`
  ADD PRIMARY KEY (`checkoutID`);

--
-- Indexes for table `DluxRoom`
--
ALTER TABLE `DluxRoom`
  ADD PRIMARY KEY (`DluxID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeID`),
  ADD KEY `hotelID` (`hotelID`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`guestID`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotelID`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoiceID`),
  ADD KEY `reserveID` (`reserveID`);

--
-- Indexes for table `regRoom`
--
ALTER TABLE `regRoom`
  ADD PRIMARY KEY (`regID`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomID`),
  ADD KEY `regID` (`regID`),
  ADD KEY `DluxID` (`DluxID`);

--
-- Indexes for table `roomsBooked`
--
ALTER TABLE `roomsBooked`
  ADD PRIMARY KEY (`availableID`);

--
-- Indexes for table `roomService`
--
ALTER TABLE `roomService`
  ADD PRIMARY KEY (`serveID`),
  ADD KEY `hotelID` (`hotelID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `checkIn`
--
ALTER TABLE `checkIn`
  MODIFY `checkinID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `checkOut`
--
ALTER TABLE `checkOut`
  MODIFY `checkoutID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `DluxRoom`
--
ALTER TABLE `DluxRoom`
  MODIFY `DluxID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employeeID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `guestID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoiceID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `regRoom`
--
ALTER TABLE `regRoom`
  MODIFY `regID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `res_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `roomID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `roomsBooked`
--
ALTER TABLE `roomsBooked`
  MODIFY `availableID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `roomService`
--
ALTER TABLE `roomService`
  MODIFY `serveID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkIn`
--
ALTER TABLE `checkIn`
  ADD CONSTRAINT `checkIn_ibfk_1` FOREIGN KEY (`reserveID`) REFERENCES `reservation` (`reserveID`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`hotelID`) REFERENCES `hotel` (`hotelID`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`reserveID`) REFERENCES `reservation` (`reserveID`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`regID`) REFERENCES `regRoom` (`regID`),
  ADD CONSTRAINT `room_ibfk_2` FOREIGN KEY (`DluxID`) REFERENCES `DluxRooml` (`DluxID`);

--
-- Constraints for table `roomService`
--
ALTER TABLE `roomService`
  ADD CONSTRAINT `roomService_ibfk_1` FOREIGN KEY (`hotelID`) REFERENCES `hotel` (`hotelID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
