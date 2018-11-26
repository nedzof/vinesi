-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2018 at 04:14 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vinesidatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `expensetable`
--

CREATE TABLE `expensetable` (
  `expenseID` int(11) NOT NULL,
  `expenseType` varchar(20) DEFAULT NULL,
  `expenseAmount` decimal(7,2) DEFAULT NULL,
  `expenseStartDate` date DEFAULT NULL,
  `expensePaidDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expensetable`
--

INSERT INTO `expensetable` (`expenseID`, `expenseType`, `expenseAmount`, `expenseStartDate`, `expensePaidDate`) VALUES
(1, 'Water', '14.32', '2015-11-19', '2018-11-19'),
(2, 'Oil', '23.32', '2017-08-15', '2018-11-19');

-- --------------------------------------------------------

--
-- Table structure for table `invoicetable`
--

CREATE TABLE `invoicetable` (
  `invoiceID` int(11) NOT NULL,
  `invoiceType` varchar(20) DEFAULT NULL,
  `invoiceAmount` double DEFAULT NULL,
  `invoiceStartDate` datetime DEFAULT NULL,
  `invoicePaidDate` datetime DEFAULT NULL,
  `invoiceCreator` int(11) DEFAULT NULL,
  `invoiceClient` int(11) DEFAULT NULL,
  `invoiceProperty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoicetable`
--

INSERT INTO `invoicetable` (`invoiceID`, `invoiceType`, `invoiceAmount`, `invoiceStartDate`, `invoicePaidDate`, `invoiceCreator`, `invoiceClient`, `invoiceProperty`) VALUES
(1, 'Email', 32.32, '2018-06-19 14:20:47', '2018-11-19 14:20:56', 1, 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `leasetable`
--

CREATE TABLE `leasetable` (
  `leaseID` int(11) NOT NULL,
  `leaseMonthlyRent` decimal(7,2) NOT NULL,
  `leaseUtilities` decimal(7,2) DEFAULT NULL,
  `leasePaymentMethod` varchar(45) DEFAULT NULL,
  `leaseDeposit` enum('Half','Full','Double') DEFAULT NULL,
  `leaseStart` date DEFAULT NULL,
  `leaseEnd` date DEFAULT NULL,
  `propertytable_propertyID` int(11) DEFAULT NULL,
  `tenanttable_tenantID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leasetable`
--

INSERT INTO `leasetable` (`leaseID`, `leaseMonthlyRent`, `leaseUtilities`, `leasePaymentMethod`, `leaseDeposit`, `leaseStart`, `leaseEnd`, `propertytable_propertyID`, `tenanttable_tenantID`) VALUES
(4, '1500.00', '200.00', 'Email', 'Half', '2018-11-19', '2018-11-19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `propertytable`
--

CREATE TABLE `propertytable` (
  `propertyID` int(11) NOT NULL,
  `propertyRooms` int(11) DEFAULT NULL,
  `propertyLeasedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `propertytable`
--

INSERT INTO `propertytable` (`propertyID`, `propertyRooms`, `propertyLeasedBy`) VALUES
(11, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tenanttable`
--

CREATE TABLE `tenanttable` (
  `tenantID` int(11) NOT NULL,
  `tenantFirstName` varchar(20) DEFAULT NULL,
  `tenantLastName` varchar(20) DEFAULT NULL,
  `tenantEmail` varchar(20) DEFAULT NULL,
  `tenantGender` enum('Ms','Mr') DEFAULT NULL,
  `tenantBillingStreet` varchar(30) DEFAULT NULL,
  `tenantBillingCity` varchar(30) DEFAULT NULL,
  `tenantBillingPostalCode` int(11) DEFAULT NULL,
  `tenantBillingCountry` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenanttable`
--

INSERT INTO `tenanttable` (`tenantID`, `tenantFirstName`, `tenantLastName`, `tenantEmail`, `tenantGender`, `tenantBillingStreet`, `tenantBillingCity`, `tenantBillingPostalCode`, `tenantBillingCountry`) VALUES
(1, 'Max', 'Mustermann', 'maxi@max.com', 'Mr', 'Maxistrasse 39', 'Maxingen', 3910, 'Maxland');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `userID` int(11) NOT NULL,
  `userLastName` varchar(200) DEFAULT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userPassword` varchar(200) NOT NULL,
  `userStatus` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`userID`, `userLastName`, `userEmail`, `userPassword`, `userStatus`) VALUES
(1, 'Fetahovic', 'nedzo.fetahovic@students.fhnw.ch', 'fetahovic', 0),
(2, 'Tamba', 'sira.tamba@students.fhnw.ch', 'tamba', 0),
(3, 'Villar', 'victoria.villar@students.fhnw.ch', 'villar', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expensetable`
--
ALTER TABLE `expensetable`
  ADD PRIMARY KEY (`expenseID`);

--
-- Indexes for table `invoicetable`
--
ALTER TABLE `invoicetable`
  ADD PRIMARY KEY (`invoiceID`),
  ADD KEY `invoiceTable_usertable_userID_fk` (`invoiceCreator`),
  ADD KEY `invoicetable_tenanttable_tenantID_fk` (`invoiceClient`),
  ADD KEY `invoicetable_propertytable_propertyID_fk` (`invoiceProperty`);

--
-- Indexes for table `leasetable`
--
ALTER TABLE `leasetable`
  ADD PRIMARY KEY (`leaseID`),
  ADD KEY `leasetable_propertytable_propertyID_fk` (`propertytable_propertyID`),
  ADD KEY `leasetable_tenanttable_tenantID_fk` (`tenanttable_tenantID`);

--
-- Indexes for table `propertytable`
--
ALTER TABLE `propertytable`
  ADD PRIMARY KEY (`propertyID`),
  ADD KEY `propertytable_tenanttable_tenantID_fk` (`propertyLeasedBy`);

--
-- Indexes for table `tenanttable`
--
ALTER TABLE `tenanttable`
  ADD PRIMARY KEY (`tenantID`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expensetable`
--
ALTER TABLE `expensetable`
  MODIFY `expenseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoicetable`
--
ALTER TABLE `invoicetable`
  MODIFY `invoiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leasetable`
--
ALTER TABLE `leasetable`
  MODIFY `leaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `propertytable`
--
ALTER TABLE `propertytable`
  MODIFY `propertyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tenanttable`
--
ALTER TABLE `tenanttable`
  MODIFY `tenantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoicetable`
--
ALTER TABLE `invoicetable`
  ADD CONSTRAINT `invoiceTable_usertable_userID_fk` FOREIGN KEY (`invoiceCreator`) REFERENCES `usertable` (`userID`),
  ADD CONSTRAINT `invoicetable_propertytable_propertyID_fk` FOREIGN KEY (`invoiceProperty`) REFERENCES `propertytable` (`propertyID`),
  ADD CONSTRAINT `invoicetable_tenanttable_tenantID_fk` FOREIGN KEY (`invoiceClient`) REFERENCES `tenanttable` (`tenantID`);

--
-- Constraints for table `leasetable`
--
ALTER TABLE `leasetable`
  ADD CONSTRAINT `leasetable_propertytable_propertyID_fk` FOREIGN KEY (`propertytable_propertyID`) REFERENCES `propertytable` (`propertyID`),
  ADD CONSTRAINT `leasetable_tenanttable_tenantID_fk` FOREIGN KEY (`tenanttable_tenantID`) REFERENCES `tenanttable` (`tenantID`);

--
-- Constraints for table `propertytable`
--
ALTER TABLE `propertytable`
  ADD CONSTRAINT `propertytable_tenanttable_tenantID_fk` FOREIGN KEY (`propertyLeasedBy`) REFERENCES `tenanttable` (`tenantID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
