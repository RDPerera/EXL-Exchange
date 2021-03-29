-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 29, 2021 at 11:09 AM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `advertisementID` int NOT NULL,
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
  `price` int NOT NULL,
  `rate` float NOT NULL,
  `feedbacks` int NOT NULL,
  `totRate` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`advertisementID`, `dateTime`, `status`, `category`, `image`, `title`, `tag`, `content`, `userName`, `member1`, `member2`, `member3`, `price`, `rate`, `feedbacks`, `totRate`) VALUES
(20, '2020-11-16 12:08:41', 'active', 'Content Writing', 'nimaya1605524921.jpg', 'I will create an amazing signature logo for your brand', 'sign', 'I\'ll navigate with you through the process of creating your very own logo! Together we\'ll discuss in detail your brand and vision so that I can perfect a visual identity that will communicate your values and will make your brand stand out from the crowd.', 'nimaya', '', '', '', 750, 0, 0, 0),
(21, '2020-11-16 12:18:33', 'active', 'Graphics Designing', 'nimaya1605525513.jpg', 'I will create your brochure or leaflet with illustrations', 'ilustrator', '\'m an illustrator and graphic designer with more than 10 years experience in layout design of books and brochures. I\'ll provide you an unique brochure with original illustrations.\r\nI can do commercial or corporate brochures, annual or sale reports, white papers, guides, etc.', 'nimaya', '', '', '', 1000, 0, 0, 0),
(22, '2020-11-16 12:20:26', 'active', 'Graphics Designing', 'nimaya1605525626.jpg', 'I will remove malware recover hacked wordpress, security fix', 'ad-remove', 'Blacklisted by Google\r\n✔️Disabled by Host\r\n✔️Redirecting & Sending Spam\r\n✔️Spam in Search Results\r\n✔️Abnormal Resource Usage\r\n✔️Google ads / Facebook Ads / malware-infected ( see Extra options )', 'nimaya', '', '', '', 1400, 0, 0, 0),
(23, '2020-11-16 12:21:46', 'active', 'Graphics Designing', 'nimaya1605525706.jpg', 'I will craft your existing squarespace page to perfection', 'craft', 'About This Gig,I have built 100+ Squarespace websites and worked with clients from all over the world. I have over 10+ years of experience with start-ups, established businesses, and non-profits.', 'nimaya', '', '', '', 15000, 0, 0, 0),
(28, '2020-11-16 12:27:42', 'active', 'Graphics Designing', 'dilan1605526062.jpg', 'I will create lofi hip hop illustration and GIF animations', 'gif', 'I will create cool looking animated illustrations that can be looped forever. Something like lo-fi hip hop animations.', 'michelle', '', '', '', 2500, 0, 0, 0),
(29, '2020-11-16 12:29:29', 'active', 'Graphics Designing', 'dilan1605526169.jpg', 'I will create whiteboard explainer video cheaper than others', 'whiteboard', 'The animation is not only entertaining and interactive, but it will also explain your point in depth where a picture might fail you.', 'michelle', '', '', '', 3500, 0, 0, 0),
(30, '2020-11-16 12:30:41', 'active', 'Graphics Designing', 'dilan1605526241.jpg', 'I will create a wix ecommerce website', 'wix', 'I\'m one of the original Wix Pro Designers, certified by Wix. I have been designing Wix websites for more than nine years. I\'m a member of the Wix Partners Council.', 'michelle', 'nimaya', '', '', 8000, 0, 0, 0),
(31, '2020-11-16 12:33:04', 'active', 'Graphics Designing', 'dilan1605526384.jpg', 'I will design your brand identity', 'brand', 'Yotam Bezalel Studio is a leading boutique branding studio, with twenty years of experience, holding a circle of cross-continent customers, rich resume and big success stories in the food and lifestyle industry.', 'michelle', '', '', '', 2000, 0, 0, 0),
(32, '2020-11-16 12:34:01', 'active', 'Graphics Designing', 'dilan1605526441.jpg', 'I will design stunning game environments', 'game', 'If you need stunning game backgrounds and environments that will make your game look amazing, then you are in the right place!', 'michelle', '', '', '', 5000, 0, 0, 0),
(33, '2020-11-16 12:35:48', 'active', 'Graphics Designing', 'dilan1605526548.jpg', 'I will professionally retouch a product photography', 'editing', 'Hi! My name is Sergei. I\'m professional retoucher with over a six years of experience. I would love to take your images to the next level and to exceed your expectations with high-end retouching!', 'michelle', '', '', '', 4500, 0, 0, 0),
(34, '2020-11-16 12:37:46', 'active', 'Graphics Designing', 'nimaya1605526666.jpg', 'I will edit and retouch images creatively in photoshop', 'editing', 'I am a Dubai based retoucher ,working in the industry for 5 years now\r\n\r\n(Kindly find my attached portfolio below, which comprises of a vast variety of different brands/projects i have worked with over the years)', 'nimaya', '', '', '', 1500, 0, 0, 0),
(35, '2020-11-16 12:39:07', 'active', 'Graphics Designing', 'nimaya1605526747.jpg', 'I will do high quality photoshop editing or photo manipulation', 'editing', 'I am a photoshop designer and artist featured by many popular social media pages, even on official Adobe students photoshop instagram page. If you are interested, check it in stories section (Great features) on my instagram page called @thunderer_ica. Plus you can see step by step how i work. Cheers!', 'nimaya', '', '', '', 5000, 0, 0, 0),
(42, '2020-11-18 10:43:39', 'active', 'Graphics Designing', 'dilan1605692619.jpg', 'I will professionally retouch or edit photos in photoshop', 'editing', 'I am happy to offer you my technical knowledge and expertise of an artist to give your photos a better life.', 'dilan', 'nimaya', '', '', 1500, 3, 10, 33);

-- --------------------------------------------------------

--
-- Table structure for table `ad_message`
--

CREATE TABLE `ad_message` (
  `adId` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `message` mediumtext NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `receiver` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ad_message`
--

INSERT INTO `ad_message` (`adId`, `sender`, `message`, `date`, `time`, `receiver`) VALUES
('42', 'chathura', 'hi im buyer', '2020-11-18', '03:17:15', 'chathura'),
('42', 'dilan', 'hi im seller', '2020-11-18', '03:17:22', 'chathura');

-- --------------------------------------------------------

--
-- Table structure for table `ad_reviews`
--

CREATE TABLE `ad_reviews` (
  `jobId` int NOT NULL,
  `buyerId` varchar(255) NOT NULL,
  `adverticementId` int NOT NULL,
  `review` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ad_reviews`
--

INSERT INTO `ad_reviews` (`jobId`, `buyerId`, `adverticementId`, `review`) VALUES
(32, 'chathura', 42, 'amazing'),
(33, 'chathura', 42, 'This seller is amazing'),
(34, 'chathura', 42, 'good seller');

-- --------------------------------------------------------

--
-- Table structure for table `ad_stats`
--

CREATE TABLE `ad_stats` (
  `recordID` int NOT NULL,
  `adID` int NOT NULL,
  `date` date NOT NULL,
  `ip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ad_stats`
--

INSERT INTO `ad_stats` (`recordID`, `adID`, `date`, `ip`) VALUES
(1, 42, '2021-03-28', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `userName` varchar(255) NOT NULL,
  `buyerRate` double NOT NULL,
  `reviews` int NOT NULL,
  `totalRate` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`userName`, `buyerRate`, `reviews`, `totalRate`) VALUES
('chathura', 3, 8, 27);

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `complainId` int NOT NULL,
  `ComplainerUsername` varchar(1000) NOT NULL,
  `accusedUsername` varchar(1000) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `jobId` int NOT NULL,
  `advertisementId` int NOT NULL,
  `complainType` varchar(1000) NOT NULL,
  `actionStatus` int NOT NULL,
  `modId` varchar(1000) NOT NULL,
  `adminId` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`complainId`, `ComplainerUsername`, `accusedUsername`, `description`, `jobId`, `advertisementId`, `complainType`, `actionStatus`, `modId`, `adminId`) VALUES
(13, 'nimaya', 'dilan', 'didn\'t full fill all requirements ', 0, 0, 'Seller Rule Violation', 0, '', 'uvindu'),
(20, 'dilan', 'michelle', 'She didn\'t give my product', 12, 13, 'Seller Rule Violation', 4, 'charitha', 'uvindu'),
(21, 'dilan', 'chathura', 'Seller Didn\'t fullfil req', 0, 0, 'Seller Rule Violation', 4, 'charitha', ''),
(28, 'dilan', 'chathura', 'offensive words\r\n', 0, 0, 'Abuse', 0, 'charitha', 'uvindu');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` int NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jobid` int NOT NULL,
  `final` int NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `size`, `time`, `jobid`, `final`, `description`) VALUES
(37, 'sample.zip', 16166, '2021-03-27 21:59:28', 33, 0, 'not-final'),
(38, 'EXL-Exchange-master.zip', 0, '2021-03-28 00:44:53', 33, 0, 'not-final'),
(39, 'sample product.zip', 594, '2021-03-28 00:45:32', 33, 1, 'This is my first delivery'),
(40, 'sample.zip', 16166, '2021-03-28 02:07:54', 33, 1, 'Second Deliver'),
(41, 'sample.zip', 16166, '2021-03-28 19:18:47', 34, 0, 'not-final'),
(42, 'sample.zip', 16166, '2021-03-28 19:19:36', 34, 1, 'sds');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `jobId` int NOT NULL,
  `adId` int NOT NULL,
  `userName` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `additionalPayment` double(100,2) NOT NULL,
  `jobStatus` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`jobId`, `adId`, `userName`, `date`, `time`, `additionalPayment`, `jobStatus`) VALUES
(34, 42, 'chathura', '2021-04-04', '19:16:06', 150.00, 4);

-- --------------------------------------------------------

--
-- Table structure for table `moderator`
--

CREATE TABLE `moderator` (
  `userName` varchar(1000) NOT NULL,
  `stsrtDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `moderator`
--

INSERT INTO `moderator` (`userName`, `stsrtDate`) VALUES
('charitha', '2020-11-17'),
('nirmal', '2020-11-18'),
('chamath', '2020-11-18'),
('kamal98', '2020-11-18');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int NOT NULL,
  `type` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `jobID` int NOT NULL,
  `seller` varchar(50) NOT NULL,
  `buyer` varchar(50) NOT NULL,
  `adID` int NOT NULL,
  `totalAmount` float NOT NULL,
  `exlAmount` float NOT NULL,
  `sellerAmount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `type`, `date`, `time`, `jobID`, `seller`, `buyer`, `adID`, `totalAmount`, `exlAmount`, `sellerAmount`) VALUES
(1, 'std', '2021-03-29', '04:58:52', 34, '', 'chathura', 42, 1650, 165, 1485),
(2, 'std', '2021-03-29', '04:59:28', 34, '', 'chathura', 42, 1650, 165, 1485),
(3, 'std', '2021-03-29', '05:04:31', 34, '', 'chathura', 42, 1650, 165, 1485),
(4, 'std', '2021-03-29', '05:04:38', 34, '', 'chathura', 42, 1650, 165, 1485);

-- --------------------------------------------------------

--
-- Stand-in structure for view `requestsTable`
-- (See below for the actual view)
--
CREATE TABLE `requestsTable` (
`theWeek` varchar(8)
,`requests` bigint
);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `userName` varchar(255) NOT NULL,
  `mainRate` double NOT NULL,
  `communicationRate` double NOT NULL,
  `deliveringRate` double NOT NULL,
  `totalMainRate` int NOT NULL DEFAULT '0',
  `totalCommunicationRate` int NOT NULL DEFAULT '0',
  `totalDeliveringRate` int NOT NULL DEFAULT '0',
  `totalReviews` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`userName`, `mainRate`, `communicationRate`, `deliveringRate`, `totalMainRate`, `totalCommunicationRate`, `totalDeliveringRate`, `totalReviews`) VALUES
('dilan', 3, 3, 3, 34, 32, 34, 10),
('michelle', 1, 1, 2, 0, 0, 0, 0),
('nimaya', 2, 2, 4, 0, 0, 0, 0);

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
  `accountStatus` int NOT NULL,
  `verificationStatus` int NOT NULL,
  `verificationOTP` int NOT NULL,
  `password` varchar(255) NOT NULL,
  `profilePicture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userName`, `firstName`, `lastName`, `dob`, `email`, `accountStatus`, `verificationStatus`, `verificationOTP`, `password`, `profilePicture`) VALUES
('chamath', 'Chamath', 'Perera', '2020-11-16', '2018css123@stu.ucsc.cmb.ac.lk', 0, 1, 12345, 'fc5e038d38a57032085441e7fe7010b0', 'admin.png'),
('charitha', 'Charitha', 'Attalage', '2020-11-20', 'charitha@gmail.com', 0, 1, 12345, 'fc5e038d38a57032085441e7fe7010b0', 'admin.png'),
('chathura', 'Chathura', 'Rathnayake', '2020-11-11', 'crathnayake@gmail.com', 0, 1, 1255, 'fc5e038d38a57032085441e7fe7010b0', 'chathura1605478069.jpg'),
('dilan', 'Dilan', 'Perera', '2020-11-17', '2018cs123@stu.ucsc.cmb.ac.lk', 0, 1, 9990436, 'fc5e038d38a57032085441e7fe7010b0', 'dilan1616579022.png'),
('kamal98', 'kamal', 'Perera', '2020-12-04', '2018cs123@stu.ucsc.cmb.ac.lk', 0, 1, 12345, 'fc5e038d38a57032085441e7fe7010b0', 'admin.png'),
('michelle', 'Michelle', 'Fernando', '2020-11-17', 'r.dilanperera@gmail.com', 0, 1, 9631714, 'fc5e038d38a57032085441e7fe7010b0', 'michelle1605679490.jpg'),
('nimaya', 'Nimaya', 'Perera', '0000-00-00', 'manthi@manthi.com', 0, 1, 0, 'fc5e038d38a57032085441e7fe7010b0', 'nimaya.png'),
('nirmal', 'Nirmal', 'Perera', '2020-11-20', 'r.diladnperera@gmail.com', 0, 1, 12345, '81dc9bdb52d04dc20036dbd8313ed055', 'admin.png'),
('uvindu', 'Uvindu', 'Sandeepa', '2020-11-06', 'uvindu@gmail.com', 0, 1, 1255, 'fc5e038d38a57032085441e7fe7010b0', 'uvindu.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_message`
--

CREATE TABLE `user_message` (
  `receiver` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `message` varchar(10000) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_online`
--

CREATE TABLE `user_online` (
  `userName` varchar(255) NOT NULL,
  `status` int NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_online`
--

INSERT INTO `user_online` (`userName`, `status`, `date_time`) VALUES
('dilan', 1, '2021-03-29 05:04:53'),
('insert', 1, '2020-11-11 18:20:11'),
('nimaya', 0, '2020-11-18 00:03:42'),
('chathura', 1, '2021-03-29 05:04:24'),
('chathura', 1, '2021-03-29 05:04:24'),
('nandula', 1, '2020-11-18 02:09:24');

-- --------------------------------------------------------

--
-- Structure for view `requestsTable`
--
DROP TABLE IF EXISTS `requestsTable`;

CREATE ALGORITHM=UNDEFINED DEFINER=`dilan`@`localhost` SQL SECURITY DEFINER VIEW `requestsTable`  AS  select concat(year(`job`.`date`),'/',week(`job`.`date`,0)) AS `theWeek`,count(`job`.`jobId`) AS `requests` from `job` where (`job`.`adId` = '42') group by `theWeek` order by year(`job`.`date`),week(`job`.`date`,0) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`advertisementID`);

--
-- Indexes for table `ad_stats`
--
ALTER TABLE `ad_stats`
  ADD PRIMARY KEY (`recordID`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`complainId`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`jobId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

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
  MODIFY `advertisementID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `ad_stats`
--
ALTER TABLE `ad_stats`
  MODIFY `recordID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `complainId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `jobId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
