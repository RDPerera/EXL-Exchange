-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2020 at 08:33 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exl_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `advertisementID` int(11) NOT NULL,
  `dateTime` datetime NOT NULL,
  `status` varchar(10) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `tag` varchar(50) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `member1` varchar(255) NOT NULL,
  `member2` varchar(255) NOT NULL,
  `member3` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`advertisementID`, `dateTime`, `status`, `category`, `image`, `title`, `tag`, `content`, `userName`, `member1`, `member2`, `member3`, `price`) VALUES
(0, '2020-10-08 15:34:30', 'active', 'Graphics Designing', 'thumb-1920-238870', 'Photography For BDs', 'ps', 'helllo guys,isad', 'r.dilanperera@gmail.com', '', '', '', 1500),
(0, '2020-10-08 16:38:52', 'active', 'Content Writing', 'retina-desktop-wallpapers_5303433', 'fsdf', 'dsfsdf', 'sdfsdf', '', 'sdf', '', '', 1500),
(0, '2020-10-08 20:01:55', 'active', 'Graphics Designing', 'retina-desktop-wallpapers_5303433', 'Photography For BDs', 'dfg', 'sadsadasdsdsd\r\nasdasdasdasd\r\nasdasdasd', '', 'asdsad', '', '', 1500),
(0, '2020-10-08 20:02:53', 'active', 'Graphics Designing', 'retina-desktop-wallpapers_5303433', 'Photography For BDs', 'dfg', 'sadsadasdsdsd\r\nasdasdasdasd\r\nasdasdasd', '', 'asdsad', '', '', 1500),
(0, '2020-10-08 20:03:20', 'inactive', 'Programming', 'samsung-galaxy-s9-1920x1080-android-8-0-android-or', 'fasfas', 'sdf', 'dsfsdfs', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `userName` varchar(255) NOT NULL,
  `buyerRate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `userName` varchar(255) NOT NULL,
  `mainRate` double NOT NULL,
  `communicationRate` double NOT NULL,
  `deliveringRate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userName` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `accountStatus` int(2) NOT NULL,
  `verificationStatus` int(2) NOT NULL,
  `verificationOTP` int(8) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`userName`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
