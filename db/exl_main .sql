-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2020 at 06:38 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userName` varchar(1000) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userName`, `date`) VALUES
('uvindu', '2020-11-19'),
('uvindu', '2020-11-03');

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
(18, '2020-11-10 11:51:04', 'active', 'Graphics Designing', '', 'Photography For BDs', 'sdf', 'asdsadsadasd', 'dilanH', '', '', '', 1500, 0, 0),
(20, '2020-11-16 12:08:41', 'active', 'Content Writing', 'nimaya1605524921.jpg', 'I will create an amazing signature logo for your brand', 'sign', 'I\'ll navigate with you through the process of creating your very own logo! Together we\'ll discuss in detail your brand and vision so that I can perfect a visual identity that will communicate your values and will make your brand stand out from the crowd.', 'nimaya', '', '', '', 750, 0, 0),
(21, '2020-11-16 12:18:33', 'active', 'Graphics Designing', 'nimaya1605525513.jpg', 'I will create your brochure or leaflet with illustrations', 'ilustrator', '\'m an illustrator and graphic designer with more than 10 years experience in layout design of books and brochures. I\'ll provide you an unique brochure with original illustrations.\r\nI can do commercial or corporate brochures, annual or sale reports, white papers, guides, etc.', 'nimaya', '', '', '', 1000, 0, 0),
(22, '2020-11-16 12:20:26', 'active', 'Graphics Designing', 'nimaya1605525626.jpg', 'I will remove malware recover hacked wordpress, security fix', 'ad-remove', 'Blacklisted by Google\r\n✔️Disabled by Host\r\n✔️Redirecting & Sending Spam\r\n✔️Spam in Search Results\r\n✔️Abnormal Resource Usage\r\n✔️Google ads / Facebook Ads / malware-infected ( see Extra options )', 'nimaya', '', '', '', 1400, 0, 0),
(23, '2020-11-16 12:21:46', 'active', 'Graphics Designing', 'nimaya1605525706.jpg', 'I will craft your existing squarespace page to perfection', 'craft', 'About This Gig,I have built 100+ Squarespace websites and worked with clients from all over the world. I have over 10+ years of experience with start-ups, established businesses, and non-profits.', 'nimaya', '', '', '', 15000, 0, 0),
(28, '2020-11-16 12:27:42', 'active', 'Graphics Designing', 'dilan1605526062.jpg', 'I will create lofi hip hop illustration and GIF animations', 'gif', 'I will create cool looking animated illustrations that can be looped forever. Something like lo-fi hip hop animations.', 'dilan', '', '', '', 2500, 0, 0),
(29, '2020-11-16 12:29:29', 'active', 'Graphics Designing', 'dilan1605526169.jpg', 'I will create whiteboard explainer video cheaper than others', 'whiteboard', 'The animation is not only entertaining and interactive, but it will also explain your point in depth where a picture might fail you.', 'dilan', '', '', '', 3500, 0, 0),
(30, '2020-11-16 12:30:41', 'active', 'Graphics Designing', 'dilan1605526241.jpg', 'I will create a wix ecommerce website', 'wix', 'I\'m one of the original Wix Pro Designers, certified by Wix. I have been designing Wix websites for more than nine years. I\'m a member of the Wix Partners Council.', 'dilan', 'nimaya', '', '', 8000, 0, 0),
(31, '2020-11-16 12:33:04', 'active', 'Graphics Designing', 'dilan1605526384.jpg', 'I will design your brand identity', 'brand', 'Yotam Bezalel Studio is a leading boutique branding studio, with twenty years of experience, holding a circle of cross-continent customers, rich resume and big success stories in the food and lifestyle industry.', 'dilan', '', '', '', 2000, 0, 0),
(32, '2020-11-16 12:34:01', 'active', 'Graphics Designing', 'dilan1605526441.jpg', 'I will design stunning game environments', 'game', 'If you need stunning game backgrounds and environments that will make your game look amazing, then you are in the right place!', 'dilan', '', '', '', 5000, 0, 0),
(33, '2020-11-16 12:35:48', 'active', 'Graphics Designing', 'dilan1605526548.jpg', 'I will professionally retouch a product photography', 'editing', 'Hi! My name is Sergei. I\'m professional retoucher with over a six years of experience. I would love to take your images to the next level and to exceed your expectations with high-end retouching!', 'dilan', '', '', '', 4500, 0, 0),
(34, '2020-11-16 12:37:46', 'active', 'Graphics Designing', 'nimaya1605526666.jpg', 'I will edit and retouch images creatively in photoshop', 'editing', 'I am a Dubai based retoucher ,working in the industry for 5 years now\r\n\r\n(Kindly find my attached portfolio below, which comprises of a vast variety of different brands/projects i have worked with over the years)', 'nimaya', '', '', '', 1500, 0, 0),
(35, '2020-11-16 12:39:07', 'active', 'Graphics Designing', 'nimaya1605526747.jpg', 'I will do high quality photoshop editing or photo manipulation', 'editing', 'I am a photoshop designer and artist featured by many popular social media pages, even on official Adobe students photoshop instagram page. If you are interested, check it in stories section (Great features) on my instagram page called @thunderer_ica. Plus you can see step by step how i work. Cheers!', 'nimaya', '', '', '', 5000, 0, 0);

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
('28', 'chathura', 'hi', '2020-11-16', '05:38:16', 'chathura'),
('28', 'dilan', 'hi', '2020-11-16', '05:38:59', 'chathura'),
('32', 'chathura', 'hi', '2020-11-16', '05:40:15', 'chathura'),
('32', 'dilan', 'hi', '2020-11-16', '05:40:21', 'chathura');

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
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `complainId` int(11) NOT NULL,
  `ComplainerUsername` varchar(1000) NOT NULL,
  `accusedUsername` varchar(1000) NOT NULL,
  `description` text NOT NULL,
  `jobId` int(10) NOT NULL,
  `advertisementId` int(10) NOT NULL,
  `complainType` int(3) NOT NULL,
  `actionStatus` int(3) NOT NULL,
  `modId` varchar(1000) NOT NULL,
  `adminId` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`complainId`, `ComplainerUsername`, `accusedUsername`, `description`, `jobId`, `advertisementId`, `complainType`, `actionStatus`, `modId`, `adminId`) VALUES
(1, 'dilan', 'nimaya', 'Foul Play', 0, 0, 2, 0, '1', '1'),
(12, 'nimnaka', 'charith', 'Abuse Words', 1, 0, 2, 5, '', '');

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
(21, 28, 'chathura', '2020-11-30', '17:40:07', 0.00, 1),
(22, 31, 'chathura', '2020-11-23', '17:39:52', 0.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `moderator`
--

CREATE TABLE `moderator` (
  `userName` varchar(1000) NOT NULL,
  `stsrtDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `moderator`
--

INSERT INTO `moderator` (`userName`, `stsrtDate`) VALUES
('charitha', '2020-11-17');

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
('charitha', 'Charitha', 'Attalage', '2020-11-20', 'charitha@gmail.com', 0, 1, 12345, 'fc5e038d38a57032085441e7fe7010b0', 'admin.png'),
('chathura', 'Chathura', 'Rathnayake', '2020-11-11', 'crathnayake@gmail.com', 0, 1, 1255, 'fc5e038d38a57032085441e7fe7010b0', 'chathura1605478069.jpg'),
('dilan', 'Dilan', 'Perera', '2020-11-17', 'r.dilanperera@gmail.com', 0, 1, 9631714, 'fc5e038d38a57032085441e7fe7010b0', 'dilan.png'),
('nimaya', 'Nimaya', 'Perera', '0000-00-00', 'manthi@manthi.com', 0, 1, 0, 'fc5e038d38a57032085441e7fe7010b0', 'nimaya.png'),
('uvindu', 'Uvindu', 'Sandeepa', '2020-11-06', 'uvindu@gmail.com', 0, 1, 1255, 'fc5e038d38a57032085441e7fe7010b0', 'uvindu.png');

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
('dilan', 1, '2020-11-17 22:45:39'),
('insert', 1, '2020-11-11 18:20:11'),
('nimaya', 1, '2020-11-16 23:01:12'),
('chathura', 1, '2020-11-16 23:03:20'),
('chathura', 1, '2020-11-16 23:03:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`advertisementID`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`complainId`);

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
  MODIFY `advertisementID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `complainId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `jobId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
