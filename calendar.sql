-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2019 at 10:10 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `acdamicYear` varchar(50) NOT NULL,
  `semester` int(10) NOT NULL,
  `department` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `courseCode` varchar(20) NOT NULL,
  `timeStart` time NOT NULL,
  `timeEnd` time NOT NULL,
  `location` varchar(50) NOT NULL,
  `firstStudent` int(10) NOT NULL,
  `repeatStudent` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `acdamicYear`, `semester`, `department`, `date`, `courseCode`, `timeStart`, `timeEnd`, `location`, `firstStudent`, `repeatStudent`) VALUES
(5, '2018/2019', 1, 'Sociology', '2019-07-01', 'COSC 32045', '13:00:00', '16:00:00', 'K3 Hall', 50, 20),
(6, '2018/2019', 2, 'Philosophy', '2019-07-01', 'COSC 32055', '08:30:00', '11:30:00', 'K1 Hall', 150, 12),
(7, '2016/2017', 1, 'Mass Communication', '2019-07-10', 'COSC 32055', '13:00:00', '16:00:00', 'K3 Hall', 50, 20),
(8, '2017/2018', 2, 'Library And Information Science', '2019-07-02', 'COSC 32045', '13:00:00', '16:00:00', 'K3 Hall', 50, 12),
(9, '2017/2018', 2, 'Geography', '2019-07-02', 'COSC 32045', '13:00:00', '16:00:00', 'Kanunwala Hall', 150, 54),
(10, '2018/2019', 1, 'Econ', '2019-07-11', 'COSC 32045', '13:00:00', '16:00:00', 'K3 Hall', 50, 1),
(11, '2018/2019', 2, 'International Studies', '2019-07-05', 'COSC 32045', '13:00:00', '16:00:00', 'Kanunwala Hall', 50, 54),
(12, '2018/2019', 2, 'International Studies', '2019-07-05', 'COSC 32045', '13:00:00', '16:00:00', 'Kanunwala Hall', 50, 54),
(13, '2016/2017', 1, 'Econ', '2019-07-13', 'COSC 32045', '13:00:00', '16:00:00', 'K1 Hall', 50, 54),
(14, '2016/2017', 1, 'Mass Communication', '2019-07-06', 'COSC 32045', '13:00:00', '16:00:00', 'K3 Hall', 50, 1),
(16, '2016/2017', 1, 'Econ', '2019-07-02', 'COSC 32045', '13:00:00', '16:00:00', 'K3 Hall', 200, 54);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`) VALUES
(1, 'All Day Event', '#40E0D0', '2016-01-01 00:00:00', '0000-00-00 00:00:00'),
(2, 'Long Event', '#FF0000', '2016-01-07 00:00:00', '2016-01-10 00:00:00'),
(3, 'Repeating Event', '#0071c5', '2016-01-09 16:00:00', '0000-00-00 00:00:00'),
(4, 'Conference', '#40E0D0', '2016-01-11 00:00:00', '2016-01-13 00:00:00'),
(5, 'Meeting', '#000', '2016-01-12 10:30:00', '2016-01-12 12:30:00'),
(6, 'Lunch', '#0071c5', '2016-01-12 12:00:00', '0000-00-00 00:00:00'),
(7, 'Happy Hour', '#0071c5', '2016-01-12 17:30:00', '0000-00-00 00:00:00'),
(8, 'Dinner', '#0071c5', '2016-01-12 20:00:00', '0000-00-00 00:00:00'),
(10, 'Double click to change', '#008000', '2016-01-28 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
