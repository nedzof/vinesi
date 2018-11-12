-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2018 at 03:52 PM
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
-- Database: `vinesidb`
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
  `invoiceClient` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leasetable`
--

CREATE TABLE `leasetable` (
  `leaseMonthlyRent` decimal(7,2) NOT NULL,
  `leasePaymentMethod` varchar(45) DEFAULT NULL,
  `leaseDeposit` enum('Half','Full','Double') DEFAULT NULL,
  `leaseStart` date DEFAULT NULL,
  `leaseEnd` date DEFAULT NULL,
  `propertytable_propertyID` int(11) DEFAULT NULL,
  `tenanttable_tenantID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `propertytable`
--

CREATE TABLE `propertytable` (
  `propertyID` int(11) NOT NULL,
  `propertyRooms` int(11) DEFAULT NULL,
  `propertyLeasedBy` int(11) DEFAULT NULL,
  `propertyLeaseStart` date DEFAULT NULL,
  `propertyLeaseEnd` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tenanttable`
--

CREATE TABLE `tenanttable` (
  `tenantID` int(11) NOT NULL,
  `tenantFirstName` varchar(20) DEFAULT NULL,
  `tenantLastName` varchar(20) DEFAULT NULL,
  `tenantEmail` varchar(20) DEFAULT NULL,
  `tenantGender` tinyint(4) DEFAULT NULL,
  `tenantBillingStreet` varchar(30) DEFAULT NULL,
  `tenantBillingCity` varchar(30) DEFAULT NULL,
  `tenantBillingPostalCode` int(11) DEFAULT NULL,
  `tenantBillingCountry` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `userID` int(11) NOT NULL,
  `userFirstName` varchar(200) DEFAULT NULL,
  `userLastName` varchar(200) DEFAULT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userPassword` varchar(200) NOT NULL,
  `userAddress` varchar(200) DEFAULT NULL,
  `userAddressNumber` int(11) DEFAULT NULL,
  `userPostalCode` int(11) DEFAULT NULL,
  `userCity` varchar(200) DEFAULT NULL,
  `userCounty` varchar(200) DEFAULT NULL,
  `userStatus` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD KEY `invoicetable_tenanttable_tenantID_fk` (`invoiceClient`);

--
-- Indexes for table `leasetable`
--
ALTER TABLE `leasetable`
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
  MODIFY `expenseID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoicetable`
--
ALTER TABLE `invoicetable`
  MODIFY `invoiceID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `propertytable`
--
ALTER TABLE `propertytable`
  MODIFY `propertyID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoicetable`
--
ALTER TABLE `invoicetable`
  ADD CONSTRAINT `invoiceTable_usertable_userID_fk` FOREIGN KEY (`invoiceCreator`) REFERENCES `usertable` (`userID`),
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
