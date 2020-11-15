-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2020 at 08:39 PM
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
  `content` text NOT NULL,
  `userName` varchar(255) NOT NULL,
  `member1` varchar(255) NOT NULL,
  `member2` varchar(255) NOT NULL,
  `member3` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `rate` float NOT NULL,
  `feedbacks` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`advertisementID`, `dateTime`, `status`, `category`, `image`, `title`, `tag`, `content`, `userName`, `member1`, `member2`, `member3`, `price`, `rate`, `feedbacks`) VALUES
(1, '2020-10-15 17:05:13', 'Active', 'Blog Writing', 'write-seo-medical-and-healthcare-blog-posts.jpg', 'I will write SEO medical and healthcare blog posts', 'Blog', 'A search engine optimized blog post on a healthcare-related topic written by an experienced, US-trained, native English-speaking registered nurse.\r\n\r\n\r\n\r\n80% of internet users search for health information online. Are they getting it from your site? Or is someone else getting your views and your potential clients?\r\n\r\n\r\n\r\nI can turn complex medical concepts into easy-to-read content that increases your website\'s traffic over time. When you publish high-quality content to your site consistently, you\'re more likely to move up in Google\'s search rankings.', 'dilan', 'nimaya', '', '', 1350, 4, 15),
(2, '2020-10-15 17:05:13', 'Active', 'Med Blog Writing', 'write-seo-medical-and-healthcare-blog-posts.jpg', 'I will write SEO medical and healthcare blog posts New', 'Blog', 'A search engine optimized blog post on a healthcare-related topic written by an experienced, US-trained, native English-speaking registered nurse.\r\n\r\n\r\n\r\n80% of internet users search for health information online. Are they getting it from your site? Or is someone else getting your views and your potential clients?\r\n\r\n\r\n\r\nI can turn complex medical concepts into easy-to-read content that increases your website\'s traffic over time. When you publish high-quality content to your site consistently, you\'re more likely to move up in Google\'s search rankings.\r\n\r\n\r\n\r\nAll posts include keyword optimizing to attract traffic and formatting to keep the reader\'s attention.\r\n', 'dilan', '', '', '', 1550, 3, 12),
(18, '2020-11-10 11:51:04', 'active', 'Graphics Designing', '', 'Photography For BDs', 'sdf', 'asdsadsadasd', 'dilanH', '', '', '', 1500, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ad_message`
--

CREATE TABLE `ad_message` (
  `adId` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `receiver` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_message`
--

INSERT INTO `ad_message` (`adId`, `sender`, `message`, `date`, `time`, `receiver`) VALUES
('1', 'dilan', 'hi', '2020-11-15', '07:10:19', ''),
('1', 'chathura', 'hi', '2020-11-15', '07:11:03', ''),
('1', 'dilan', 'hi', '2020-11-15', '09:08:23', ''),
('1', 'dilan', 'hi', '2020-11-15', '09:08:34', ''),
('1', 'dilan', '12', '2020-11-15', '09:19:08', ''),
('1', 'dilan', 'hi', '2020-11-15', '09:41:35', ''),
('1', 'dilan', 'hi', '2020-11-15', '09:59:07', ''),
('1', 'chathura', 'hello', '2020-11-15', '10:02:56', ''),
('1', 'dilan', 'no', '2020-11-15', '10:03:11', ''),
('1', 'dilan', 'no', '2020-11-15', '10:05:32', ''),
('1', 'dilan', '844', '2020-11-15', '10:05:54', '');

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `userName` varchar(255) NOT NULL,
  `buyerRate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`userName`, `buyerRate`) VALUES
('chathura', 2);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `jobId` int(100) NOT NULL,
  `adId` int(100) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `additionalPayment` double(100,2) NOT NULL,
  `jobStatus` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`jobId`, `adId`, `userName`, `date`, `time`, `additionalPayment`, `jobStatus`) VALUES
(15, 1, 'nimaya', '2020-11-22', '00:43:38', 0.00, 1),
(16, 1, 'dilan', '2020-11-22', '02:46:47', 0.00, 0),
(17, 1, 'dilan', '2020-11-22', '14:49:02', 0.00, 2),
(18, 1, 'chathura', '2020-11-22', '14:51:32', 0.00, 2);

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

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`userName`, `mainRate`, `communicationRate`, `deliveringRate`) VALUES
('dilan', 1, 1, 2),
('nimaya', 2, 2, 4);

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
  `password` varchar(255) NOT NULL,
  `profilePicture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userName`, `firstName`, `lastName`, `dob`, `email`, `accountStatus`, `verificationStatus`, `verificationOTP`, `password`, `profilePicture`) VALUES
('chathura', 'Chathura', 'Rathnayake', '2020-11-11', 'crathnayake@gmail.com', 0, 1, 1255, '0cc175b9c0f1b6a831c399e269772661', 'chathura1605382078.jpg'),
('dilan', 'Dilan', 'Perera', '2020-11-17', 'r.dilanperera@gmail.com', 0, 1, 9631714, '0cc175b9c0f1b6a831c399e269772661', 'dilan.png'),
('nimaya', 'Nimaya', 'Perera', '0000-00-00', 'manthi@manthi.com', 0, 1, 0, '0cc175b9c0f1b6a831c399e269772661', 'nimaya.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_message`
--

CREATE TABLE `user_message` (
  `receiver` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_online`
--

CREATE TABLE `user_online` (
  `userName` varchar(255) NOT NULL,
  `status` int(10) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_online`
--

INSERT INTO `user_online` (`userName`, `status`, `date_time`) VALUES
('dilan', 0, '2020-11-15 18:00:35'),
('insert', 1, '2020-11-11 18:20:11'),
('nimaya', 1, '2020-11-12 18:20:36'),
('chathura', 1, '2020-11-20 01:02:32'),
('chathura', 1, '2020-11-20 01:02:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`advertisementID`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`jobId`);

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

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `advertisementID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `jobId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
