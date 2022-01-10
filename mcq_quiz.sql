-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2021 at 03:32 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcq_quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `mcq_setting`
--

CREATE TABLE `mcq_setting` (
  `id` int(11) NOT NULL,
  `conduct_question` int(255) NOT NULL,
  `negative_marking` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mcq_setting`
--

INSERT INTO `mcq_setting` (`id`, `conduct_question`, `negative_marking`) VALUES
(1, 10, '0.25');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `o_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `option_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`o_id`, `q_id`, `option_name`) VALUES
(1, 1, 'PHP Hypertex Processor'),
(2, 1, 'PHP Hyper Markup Processor'),
(3, 1, 'PHP Hyper Markup Preprocessor'),
(4, 1, 'PHP Hypertext Preprocessor'),
(5, 2, 'Server-side'),
(6, 2, 'Client-side'),
(7, 2, 'Browser-side'),
(8, 2, 'In-side'),
(9, 3, 'Rasmus Lerdorf'),
(10, 3, 'Willam Makepiece'),
(11, 3, 'Drek Kolkevi'),
(12, 3, 'List Barely'),
(13, 4, '<php> . . . </php>'),
(14, 4, '<?php . . . ?>'),
(15, 4, '?php . . . ?php'),
(16, 4, '<p> . . . </p>'),
(17, 5, '$get'),
(18, 5, '$ask'),
(19, 5, '$request'),
(20, 5, '$post'),
(21, 6, 'chr( );'),
(22, 6, 'asc( );'),
(23, 6, 'ord( );'),
(24, 6, 'val( );'),
(25, 7, 'Get'),
(26, 7, 'Post'),
(27, 7, 'Both'),
(28, 7, 'None'),
(29, 8, 'ucwords($var)'),
(30, 8, 'upper($var)'),
(31, 8, 'toupper($var)'),
(32, 8, 'ucword($var)'),
(33, 9, 'friendly'),
(34, 9, 'final'),
(35, 9, 'public'),
(36, 9, 'static'),
(37, 10, '$object->methodName();'),
(38, 10, 'object->methodName();'),
(39, 10, 'object::methodName();'),
(40, 10, '$object::methodName();');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `q_id` int(11) NOT NULL,
  `que_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ans` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`q_id`, `que_name`, `ans`) VALUES
(1, 'PHP Stands for?', 4),
(2, 'PHP is an example of ___________ scripting language.', 1),
(3, 'Who is known as the father of PHP?', 1),
(4, 'PHP scripts are enclosed within _______', 2),
(5, 'Which of the following variables is not a predefined variable?', 2),
(6, 'When you need to obtain the ASCII value of a character which of the following function you apply in PHP?', 3),
(7, 'Which of the following method sends input to a script via a URL?', 1),
(8, 'Which of the following function returns a text in title case from a variable?', 1),
(9, 'Which one of the following property scopes is not supported by PHP?', 1),
(10, 'Which one of the following is the right way to invoke a method?', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `total_question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attemp_question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correct_question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wrong_question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `percentage` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mcq_setting`
--
ALTER TABLE `mcq_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mcq_setting`
--
ALTER TABLE `mcq_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
