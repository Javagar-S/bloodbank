-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2025 at 05:41 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbdms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '25f9e794323b453885f5181f1b624d0b', '2020-07-17 08:47:19'),
(2, 'JAVAGAR', '25f9e794323b453885f5181f1b624d0b', '2025-05-26 15:40:17'),
(3, 'user', '827ccb0eea8a706c4c34a16891f84e7b', '2025-05-26 06:40:00'),
(4, 'demo', 'e99a18c428cb38d5f260853678922e03', '2025-05-26 06:42:00'),
(5, 'sample', '0192023a7bbd73250516f069df18b500', '2025-05-26 06:44:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblblooddonars`
--

CREATE TABLE `tblblooddonars` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `MobileNumber` char(11) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Gender` varchar(20) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `BloodGroup` varchar(20) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblblooddonars`
--

INSERT INTO `tblblooddonars` (`id`, `FullName`, `MobileNumber`, `EmailId`, `Gender`, `Age`, `BloodGroup`, `Address`, `Message`, `PostingDate`, `status`) VALUES
(8, 'Javagar S', '6363043386', 'javagar2943s@gmail.com', 'Male', 21, 'O-', 'BICON OPP HEBBAGODI\r\nELECTRONIC CITY POST\r\nANEKAL TALUK', 'I AM READY TO DONATE BLOOD', '2025-05-08 15:01:52', 1),
(9, 'praveen', '9984561231', 'praveen@gmail.com', 'Male', 21, 'B-', 'hosa road bengaluru,560100', 'i will donate blood', '2025-05-18 06:51:02', 1),
(10, 'shubham', '8963425198', 'shubham@gmail.com', 'Male', 21, 'AB-', 'hebbagodi ,bengaluru,560100', 'i will do blood donation', '2025-05-18 06:52:32', 1),
(11, 'praveen', '9853621145', 'praveen123@gmail.com', 'Male', 22, 'O-', 'HOSAROAD', 'BLOOD', '2025-05-18 06:54:50', 1),
(16, 'Ramu', '8963634523', 'ramu@gmail.com', 'Male', 30, 'A+', '2nd cross ,anekal ,bengaluru', 'i will donate blood', '2025-05-26 10:39:01', 1),
(17, 'Anjali R', '9876543210', 'anjali.r@gmail.com', 'Female', 25, 'B+', 'BTM Layout, Bengaluru', 'Available for emergency donations', '2025-05-26 05:35:00', 1),
(18, 'Kiran M', '9123456780', 'kiran.m@gmail.com', 'Male', 28, 'A-', 'Jayanagar, Bengaluru', 'Happy to help anytime', '2025-05-26 05:37:00', 1),
(19, 'Sowmya N', '9988776655', 'sowmya.n@gmail.com', 'Female', 22, 'O+', 'Indiranagar, Bengaluru', 'Blood is life. Ready to give.', '2025-05-26 05:39:00', 1),
(20, 'Vinay K', '7890654321', 'vinay.k@gmail.com', 'Male', 26, 'AB+', 'HSR Layout, Bengaluru', 'Donating blood saves lives', '2025-05-26 05:41:00', 1),
(21, 'Meena P', '9001122334', 'meena.p@gmail.com', 'Female', 24, 'B-', 'Whitefield, Bengaluru', 'Always ready for a good cause', '2025-05-26 05:43:00', 1),
(22, 'Raghu V', '8654321987', 'raghu.v@gmail.com', 'Male', 32, 'O-', 'Marathahalli, Bengaluru', 'Donate blood, save lives', '2025-05-26 05:45:00', 1),
(23, 'Priya S', '9090909090', 'priya.s@gmail.com', 'Female', 29, 'A+', 'Koramangala, Bengaluru', 'I am willing to donate blood', '2025-05-26 05:47:00', 1),
(24, 'Yogesh T', '8500654321', 'yogesh.t@gmail.com', 'Male', 23, 'B+', 'Electronic City, Bengaluru', 'Call me when in need', '2025-05-26 05:49:00', 1),
(25, 'Divya L', '7878787878', 'divya.l@gmail.com', 'Female', 27, 'AB-', 'Malleshwaram, Bengaluru', 'Helping others is my priority', '2025-05-26 05:51:00', 1),
(26, 'Harsha G', '9988771122', 'harsha.g@gmail.com', 'Male', 31, 'O+', 'Hebbal, Bengaluru', 'Can donate in emergencies', '2025-05-26 05:53:00', 1),
(27, 'Rajesh Kumar', '9812345678', 'rajesh.kumar@gmail.com', 'Male', 34, 'A-', 'KR Puram, Bengaluru', 'Willing to donate anytime', '2025-05-26 06:00:00', 1),
(28, 'Sneha B', '8901234567', 'sneha.b@gmail.com', 'Female', 22, 'O+', 'Yelahanka, Bengaluru', 'Happy to support blood needs', '2025-05-26 06:02:00', 1),
(29, 'Ashok Reddy', '9876501234', 'ashok.reddy@gmail.com', 'Male', 36, 'B-', 'Jalahalli, Bengaluru', 'Available on weekends', '2025-05-26 06:04:00', 1),
(30, 'Pooja S', '9123123123', 'pooja.s@gmail.com', 'Female', 27, 'AB+', 'Banashankari, Bengaluru', 'Blood is meant to circulate', '2025-05-26 06:06:00', 1),
(31, 'Manoj T', '9988001122', 'manoj.t@gmail.com', 'Male', 30, 'O-', 'Basavanagudi, Bengaluru', 'Ready for emergency donation', '2025-05-26 06:08:00', 1),
(32, 'Deepika N', '8765432190', 'deepika.n@gmail.com', 'Female', 24, 'A+', 'Sanjay Nagar, Bengaluru', 'Will donate blood when needed', '2025-05-26 06:10:00', 1),
(33, 'Arjun V', '7654321987', 'arjun.v@gmail.com', 'Male', 28, 'B+', 'Magadi Road, Bengaluru', 'You can count on me', '2025-05-26 06:12:00', 1),
(34, 'Keerthi M', '9345612789', 'keerthi.m@gmail.com', 'Female', 25, 'O-', 'Bommanahalli, Bengaluru', 'I regularly donate blood', '2025-05-26 06:14:00', 1),
(35, 'Naresh K', '9876123456', 'naresh.k@gmail.com', 'Male', 33, 'AB-', 'Peenya, Bengaluru', 'Call me for urgent needs', '2025-05-26 06:16:00', 1),
(36, 'Lakshmi R', '9123412341', 'lakshmi.r@gmail.com', 'Female', 29, 'B-', 'Richmond Town, Bengaluru', 'Always willing to help', '2025-05-26 06:18:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblbloodgroup`
--

CREATE TABLE `tblbloodgroup` (
  `id` int(11) NOT NULL,
  `BloodGroup` varchar(20) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbloodgroup`
--

INSERT INTO `tblbloodgroup` (`id`, `BloodGroup`, `PostingDate`) VALUES
(8, 'A+', '2025-05-08 14:59:19'),
(9, 'A-', '2025-05-08 14:59:24'),
(10, 'B+', '2025-05-08 14:59:34'),
(11, 'B-', '2025-05-08 14:59:41'),
(12, 'AB+', '2025-05-08 14:59:49'),
(13, 'AB-', '2025-05-08 14:59:56'),
(14, 'O+', '2025-05-08 15:00:06'),
(15, 'O-', '2025-05-08 15:00:12');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusinfo`
--

CREATE TABLE `tblcontactusinfo` (
  `id` int(11) NOT NULL,
  `Address` tinytext DEFAULT NULL,
  `EmailId` varchar(255) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcontactusinfo`
--

INSERT INTO `tblcontactusinfo` (`id`, `Address`, `EmailId`, `ContactNo`) VALUES
(1, 'BENGALURU KARNATAKA 560100', 'java2943s@gmail.com', '6363043386');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusquery`
--

CREATE TABLE `tblcontactusquery` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcontactusquery`
--

INSERT INTO `tblcontactusquery` (`id`, `name`, `EmailId`, `ContactNumber`, `Message`, `PostingDate`, `status`) VALUES
(6, 'Javagar S', 'javagar2943s@gmail.com', '06363043386', 'SDFSD', '2025-05-23 13:23:08', NULL),
(8, 'Praveen M', 'praveen.m@gmail.com', '09876543210', 'Need information about blood donation camps.', '2025-05-26 06:20:00', NULL),
(9, 'Shubham S', 'shubham.singh@gmail.com', '09123456789', 'Is O- blood available right now?', '2025-05-26 06:22:00', NULL),
(10, 'Sneha Rao', 'sneha.rao@gmail.com', '08765432190', 'Can I volunteer for upcoming events?', '2025-05-26 06:24:00', NULL),
(11, 'Rakesh Yadav', 'rakesh.y@gmail.com', '08912345678', 'Please update my contact number.', '2025-05-26 06:26:00', NULL),
(12, 'Deepika V', 'deepika.v@gmail.com', '09456712345', 'How to check donor availability online?', '2025-05-26 06:28:00', NULL),
(13, 'Manoj K', 'manoj.kumar@gmail.com', '08234567891', 'I am a regular donor. Want to join your network.', '2025-05-26 06:30:00', NULL),
(14, 'Lakshmi N', 'lakshmi.n@gmail.com', '08876543210', 'What documents are needed to register as a donor?', '2025-05-26 06:32:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `type`, `detail`) VALUES
(2, 'Why Become Donor', 'donor', '																																																																																										                                                        <h2 data-start=\"240\" data-end=\"265\">&nbsp;Why Become a Donor?</h2><h3 data-start=\"267\" data-end=\"304\">A Small Act. A Lifesaving Impact.</h3><h2 data-start=\"199\" data-end=\"221\">\r\n\r\n<p data-start=\"306\" data-end=\"467\">Donating blood isn’t just charity—it’s direct action. A single donation can save up to <strong data-start=\"393\" data-end=\"408\">three lives</strong>. In just <strong data-start=\"418\" data-end=\"432\">15 minutes</strong>, you become someone’s unseen hero.</p>\r\n<hr data-start=\"469\" data-end=\"472\">\r\n</h2><h3 data-start=\"474\" data-end=\"491\">What You Give</h3><h2 data-start=\"199\" data-end=\"221\">\r\n<ul data-start=\"493\" data-end=\"773\">\r\n<li data-start=\"493\" data-end=\"593\">\r\n<p data-start=\"495\" data-end=\"593\"><strong data-start=\"495\" data-end=\"517\">Life to a stranger</strong> — Accident victims, surgical patients, cancer warriors—you help them all.</p>\r\n</li>\r\n<li data-start=\"594\" data-end=\"692\">\r\n<p data-start=\"596\" data-end=\"692\"><strong data-start=\"596\" data-end=\"616\">Hope to a family</strong> — Your donation can mean one more day, one more chance, one more miracle.</p>\r\n</li>\r\n<li data-start=\"693\" data-end=\"773\">\r\n<p data-start=\"695\" data-end=\"773\"><strong data-start=\"695\" data-end=\"719\">Support to hospitals</strong> — You keep critical supplies ready for emergencies.</p>\r\n</li>\r\n</ul>\r\n<hr data-start=\"775\" data-end=\"778\">\r\n</h2><h3 data-start=\"780\" data-end=\"796\">What You Get</h3><h2 data-start=\"199\" data-end=\"221\">\r\n<ul data-start=\"798\" data-end=\"1189\">\r\n<li data-start=\"798\" data-end=\"896\">\r\n<p data-start=\"800\" data-end=\"896\"><strong data-start=\"800\" data-end=\"825\">Free health screening</strong> — Every donor gets checked for blood pressure, hemoglobin, and more.</p>\r\n</li>\r\n<li data-start=\"897\" data-end=\"985\">\r\n<p data-start=\"899\" data-end=\"985\"><strong data-start=\"899\" data-end=\"923\">Balanced iron levels</strong> — Regular donation can help manage excess iron in the body.</p>\r\n</li>\r\n<li data-start=\"986\" data-end=\"1085\">\r\n<p data-start=\"988\" data-end=\"1085\"><strong data-start=\"988\" data-end=\"1013\">Improved heart health</strong> — Some studies link regular donation with lower risk of heart attack.</p>\r\n</li>\r\n<li data-start=\"1086\" data-end=\"1189\">\r\n<p data-start=\"1088\" data-end=\"1189\"><strong data-start=\"1088\" data-end=\"1111\">Mental satisfaction</strong> — Knowing you made a difference builds self-worth and emotional well-being.</p>\r\n</li>\r\n</ul>\r\n<hr data-start=\"1191\" data-end=\"1194\">\r\n</h2><h3 data-start=\"1196\" data-end=\"1214\">Why It Matters</h3><h2 data-start=\"199\" data-end=\"221\">\r\n<ul data-start=\"1216\" data-end=\"1392\">\r\n<li data-start=\"1216\" data-end=\"1261\">\r\n<p data-start=\"1218\" data-end=\"1261\"><strong data-start=\"1218\" data-end=\"1237\">Every 2 seconds</strong>, someone needs blood.</p>\r\n</li>\r\n<li data-start=\"1262\" data-end=\"1319\">\r\n<p data-start=\"1264\" data-end=\"1319\"><strong data-start=\"1264\" data-end=\"1280\">Less than 1%</strong> of eligible people donate regularly.</p>\r\n</li>\r\n<li data-start=\"1320\" data-end=\"1392\">\r\n<p data-start=\"1322\" data-end=\"1392\"><strong data-start=\"1322\" data-end=\"1353\">Blood can’t be manufactured</strong>—it has to come from people like you.</p>\r\n</li>\r\n</ul>\r\n<hr data-start=\"1394\" data-end=\"1397\">\r\n</h2><h3 data-start=\"1399\" data-end=\"1420\">Join the Movement</h3><h2 data-start=\"199\" data-end=\"221\">\r\n<p data-start=\"1422\" data-end=\"1524\">You don’t need to be rich or powerful to save lives. Just <strong data-start=\"1480\" data-end=\"1491\">healthy</strong>, <strong data-start=\"1493\" data-end=\"1504\">willing</strong>, and ready to help.</p>\r\n<p data-start=\"1526\" data-end=\"1600\"><strong data-start=\"1526\" data-end=\"1560\">Be a part of something bigger.</strong><br data-start=\"1560\" data-end=\"1563\">\r\n<strong data-start=\"1563\" data-end=\"1600\">Start the ripple. Become a donor.</strong></p>\r\n<hr data-start=\"1602\" data-end=\"1605\">\r\n<p data-start=\"1607\" data-end=\"1640\"><strong data-start=\"1607\" data-end=\"1640\">Register. Donate. Save Lives.</strong></p></h2><h1>\r\n</h1>                                                    \r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										'),
(3, 'About Us ', 'aboutus', '<div style=\"text-align: justify;\"><div><div><h3><strong>About Us – Red Ripple</strong></h3>\r\n<p><strong>“A single drop, a ripple of hope.”</strong></p>\r\n<p>At <strong>Red Ripple</strong>, we believe in the power of humanity—one donor, one drop, one life at a time. Founded with a mission to create a <strong>lifesaving network</strong>, we are more than just a blood donation platform; we are a movement dedicated to ensuring that no one suffers due to a shortage of blood.</p>\r\n<h4><strong>Who We Are</strong></h4>\r\n<p>We are a community-driven initiative that connects <strong>voluntary donors</strong> with those in urgent need of blood. Whether it’s an emergency transfusion, a medical procedure, or a rare blood type requirement, we ensure <strong>quick, reliable, and efficient</strong> connections between donors and recipients.</p>\r\n<h4><strong>Our Mission</strong></h4>\r\n<p>&nbsp;<strong>Save Lives</strong> – Every donation can be the difference between life and death.<br>&nbsp;<strong>Build Awareness</strong> – Educating people on the <strong>importance of regular blood donation</strong>.<br>&nbsp;<strong>Bridge the Gap</strong> – Making the donation process <strong>simpler, faster, and accessible</strong> to all.</p>\r\n<h4><strong>Why Blood Donation Matters</strong></h4>\r\n<p>Every <strong>two seconds</strong>, someone in the world needs blood. A single donation can save up to <strong>three lives</strong>. Yet, thousands struggle daily to find donors in critical situations. At <strong>Red Ripple</strong>, we aim to <strong>eliminate this struggle</strong> by creating an easy-to-use, highly responsive, and compassionate platform where help is just a few clicks away.</p>\r\n<h4><strong>Join the Ripple Effect</strong></h4>\r\n<p>Becoming a donor means becoming a <strong>lifesaver</strong>. It’s a simple act of kindness that leaves a lasting impact. When you donate, you don’t just give blood—you <strong>give hope, strength, and a second chance at life</strong>.</p>\r\n<p>Are you ready to make a difference? <strong>Be the ripple that saves lives.</strong></p>\r\n<p>&nbsp;<strong>Register. Donate. Save Lives.</strong></p></div></div></div>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblblooddonars`
--
ALTER TABLE `tblblooddonars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbloodgroup`
--
ALTER TABLE `tblbloodgroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblblooddonars`
--
ALTER TABLE `tblblooddonars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tblbloodgroup`
--
ALTER TABLE `tblbloodgroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
