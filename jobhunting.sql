-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2017 at 10:53 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobhunting`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `location` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `salary` varchar(50) NOT NULL,
  `job_type` varchar(30) NOT NULL,
  `date_posted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `user_id`, `title`, `location`, `description`, `salary`, `job_type`, `date_posted`) VALUES
(1, 1, 'We need a hitman that could kill 100 people', 'Inside my house under the bed', 'Your job is to kill all people inside my dreams, failure to succeed means no pay', '$100 / night', 'part_time', '2017-07-16 10:56:27'),
(2, 2, 'We are in need of Scratcher', 'No specific Location', 'I want someone who could scratch my back when its itchy. If you think you could, apply now and be the first to scratch my back!', '$5/hr', 'part_time', '2017-07-16 11:05:40'),
(3, 1, 'SEO for our newly created web app', 'Manila, Philippines', 'Your job is to make our web app, first in the list on google search\r\n# a must have skill is a 5 years experience of SEO\r\n# willing to work 8 hrs a day\r\n# able to solve problems with the team', '$10/hr', 'full_time', '2017-07-16 18:43:41'),
(4, 2, 'Make my web application beautiful', 'Sta. Cruz St. Manila, Philippines', 'I need someone who could make my web app beautiful like youtube. A 3 years experience in web development is a must. Come and be the first to apply!', '$50 / month', 'part_time', '2017-07-16 18:46:51'),
(5, 4, 'Personal make up artist', 'Los Angeles California, USA', 'I need someone who could take care of my looks and beauty. I need an experienced person for this job.', '$5/hr', 'full_time', '2017-07-16 18:50:52'),
(6, 1, 'Sample Job', 'Tacloban City', 'This is a sample job post', '$100/hr', 'full_time', '2017-07-17 10:39:54');

-- --------------------------------------------------------

--
-- Table structure for table `login_tokens`
--

CREATE TABLE `login_tokens` (
  `token_id` int(11) NOT NULL,
  `token` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_tokens`
--

INSERT INTO `login_tokens` (`token_id`, `token`, `user_id`) VALUES
(3, '553b4841488da2d59da56fceafb8ea168dec9ec7', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date_registered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `username`, `email`, `password`, `date_registered`) VALUES
(1, 'Ronel Carlo', 'Berino', 'RonelTheGreat', 'ronelcarlo.berino@gmail.com', '$2y$10$X9sqdpnczFnAoyYWzdDMLe4XzdNit/RxZF6P7QREXGlS2c9TPe7gK', '2017-07-14 20:59:32'),
(2, 'John', 'Doe', 'JohnTheMonggol', 'john@mail.com', '$2y$10$PcviWDO0u5CiDTkqLFjxk./0k2U7eQ4xrhXbBQ/lyK1eV5/wr4zhm', '2017-07-14 21:17:43'),
(3, 'John', 'Doe', 'JohnTheMonggol', 'john@mail.com', '$2y$10$MDd9LbW/xChITtFg6WYhKutIQq5/BZ8Cm3ViSqhD3iLL4riLobaP2', '2017-07-16 11:03:34'),
(4, 'Mary', 'Doe', 'MaryDoe', 'mary@mail.com', '$2y$10$KRcn4OuFSC7LWX71M5FkoeUwfLXV/sk0KmI7H/jpgPHIwEhUOofYG', '2017-07-16 18:48:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `login_tokens`
--
ALTER TABLE `login_tokens`
  ADD PRIMARY KEY (`token_id`),
  ADD KEY `login_tokens_ibfk_1` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `login_tokens`
--
ALTER TABLE `login_tokens`
  MODIFY `token_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `login_tokens`
--
ALTER TABLE `login_tokens`
  ADD CONSTRAINT `login_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
