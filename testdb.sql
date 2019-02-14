-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2018 at 08:59 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookappointment`
--

CREATE TABLE `bookappointment` (
  `depname` varchar(20) NOT NULL,
  `doctorname` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `reason` varchar(200) NOT NULL,
  `apptime` time NOT NULL,
  `patientid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookappointment`
--

INSERT INTO `bookappointment` (`depname`, `doctorname`, `date`, `reason`, `apptime`, `patientid`) VALUES
('CARDIOLOGY', 'DR.ANURAG GUPTA', '2018-07-25', 'sef\r\n', '21:00:00', 'swapnil.more'),
('PEDIATRIC', 'DR.AJIT DEDHIA', '2018-08-02', 'zx', '16:00:00', 'swapnil.more'),
('NEUROLOGY', 'DR.SANDIP KELSHIKAR', '2018-07-26', 'addaad', '15:15:00', 'swapnil.more');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `deptid` int(11) NOT NULL,
  `deptname` varchar(20) NOT NULL,
  `docid` int(11) NOT NULL,
  `docname` varchar(100) NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`deptid`, `deptname`, `docid`, `docname`, `startTime`, `endTime`) VALUES
(1, 'CARDIOLOGY', 1, 'DR.ANURAG GUPTA', '13:00:00', '17:30:00'),
(1, 'CARDIOLOGY', 2, 'DR.RATAN DUTTA', '18:00:00', '22:00:00'),
(1, 'CARDIOLOGY', 3, 'DR.PRIYA JAIN', '09:30:00', '12:30:00'),
(1, 'CARDIOLOGY', 4, 'DR.AJAY BANSAL', '12:00:00', '16:00:00'),
(2, 'PEDIATRIC', 1, 'DR.AJIT DEDHIA', '14:00:00', '18:30:00'),
(2, 'PEDIATRIC', 2, 'DR.SMITA PANDEY', '18:00:00', '22:00:00'),
(2, 'PEDIATRIC', 3, 'DR.DISHA JAIN', '09:30:00', '12:30:00'),
(2, 'PEDIATRIC', 4, 'DR.AMIT SINGH', '12:00:00', '16:00:00'),
(3, 'NEUROLOGY', 1, 'DR.SANDIP KELSHIKAR', '14:00:00', '18:30:00'),
(3, 'NEUROLOGY', 2, 'DR.SANJAY THAKUR', '18:00:00', '22:00:00'),
(3, 'NEUROLOGY', 3, 'DR.ASHA KADAM', '09:30:00', '12:30:00'),
(3, 'NEUROLOGY', 4, 'DR.VIJAY SALUNKHE', '12:00:00', '16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `my`
--

CREATE TABLE `my` (
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `my`
--

INSERT INTO `my` (`no`) VALUES
(1),
(2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
