-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2019 at 10:08 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `quiz_admin`
--

CREATE TABLE `quiz_admin` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `quiz_admin`
--

INSERT INTO `quiz_admin` (`user_id`, `username`, `password`) VALUES
(1, 'admin', '8cb2237d0679ca88db6464eac60da96345513964 ');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_pack`
--

CREATE TABLE `quiz_pack` (
  `id` int(11) NOT NULL,
  `quiz_name` varchar(225) COLLATE utf8_bin NOT NULL,
  `num_contestant` int(11) NOT NULL,
  `contestants` varchar(50) COLLATE utf8_bin NOT NULL,
  `timer` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `quiz_pack`
--

INSERT INTO `quiz_pack` (`id`, `quiz_name`, `num_contestant`, `contestants`, `timer`, `createdAt`) VALUES
(1, 'NACOSS WEEK QUIZ', 4, 'HND 1,HND 2,ND 1,ND 2', 30, '2019-05-11 04:20:41');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_question`
--

CREATE TABLE `quiz_question` (
  `quiz_pack_id` int(11) NOT NULL,
  `question` text COLLATE utf8_bin NOT NULL,
  `option_A` varchar(225) COLLATE utf8_bin NOT NULL,
  `option_B` varchar(225) COLLATE utf8_bin NOT NULL,
  `option_C` varchar(225) COLLATE utf8_bin NOT NULL,
  `option_D` varchar(225) COLLATE utf8_bin NOT NULL,
  `answer` varchar(50) COLLATE utf8_bin NOT NULL,
  `ques_id` int(11) NOT NULL,
  `answered` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `quiz_question`
--

INSERT INTO `quiz_question` (`quiz_pack_id`, `question`, `option_A`, `option_B`, `option_C`, `option_D`, `answer`, `ques_id`, `answered`) VALUES
(1, 'Who is the President of Nigeria', 'Stephen', 'Olabisi Kuye', 'Joshua', 'Victor', 'Joshua', 1, 1),
(1, 'Who is the President of Zambia', 'Stephen', 'Olabisi Kuye', 'Joshua', 'Victor', 'Victor', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_scoreboard`
--

CREATE TABLE `tbl_scoreboard` (
  `quiz_pack_id` int(11) NOT NULL,
  `contestant` varchar(50) COLLATE utf8_bin NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_scoreboard`
--

INSERT INTO `tbl_scoreboard` (`quiz_pack_id`, `contestant`, `score`) VALUES
(1, 'HND 1', 5),
(1, 'HND 2', 5),
(1, 'ND 1', 5),
(1, 'ND 2', 5),
(1, 'HND 1', 5),
(1, 'HND 2', 0),
(1, 'ND 1', 0),
(1, 'ND 2', 5),
(1, 'HND 1', 5),
(1, 'HND 2', 0),
(1, 'ND 1', 0),
(1, 'ND 2', 0),
(1, 'HND 1', 5),
(1, 'HND 2', 5),
(1, 'HND 1', 5),
(1, 'HND 2', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quiz_admin`
--
ALTER TABLE `quiz_admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `quiz_pack`
--
ALTER TABLE `quiz_pack`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_question`
--
ALTER TABLE `quiz_question`
  ADD PRIMARY KEY (`ques_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quiz_admin`
--
ALTER TABLE `quiz_admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz_pack`
--
ALTER TABLE `quiz_pack`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz_question`
--
ALTER TABLE `quiz_question`
  MODIFY `ques_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
