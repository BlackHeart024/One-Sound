-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2022 at 08:18 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `one-sound`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_passw` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_passw`) VALUES
(1, 'admin@mail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `album_id` int(11) NOT NULL,
  `album_name` varchar(100) NOT NULL,
  `album_photo` varchar(100) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`album_id`, `album_name`, `album_photo`, `created_at`) VALUES
(1, 'Alan Walker Hits', 'ar1-1667929986.jpg', '2022-11-08'),
(2, 'Arijit Singh Specials', 'ar4-1667930008.jpg', '2022-11-08'),
(3, 'Best English Song', 'al01-1667930067.jpg', '2022-11-08');

-- --------------------------------------------------------

--
-- Table structure for table `album_musics`
--

CREATE TABLE `album_musics` (
  `album_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `album_musics`
--

INSERT INTO `album_musics` (`album_id`, `music_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(2, 7),
(2, 8),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `artist_id` int(11) UNSIGNED NOT NULL,
  `artist_name` varchar(100) NOT NULL,
  `artist_pic` varchar(100) NOT NULL,
  `upload_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`artist_id`, `artist_name`, `artist_pic`, `upload_date`) VALUES
(1, 'Alan Walker', 'ar1-1667905455.jpg', '2022-11-08'),
(2, 'Arijiit Singh', 'ar4-1667905542.jpg', '2022-11-08'),
(3, 'Charlie Puth', 'ar2-1667928716.jpg', '2022-11-08'),
(4, 'Ed Sheeran', 'ar3-1667928734.jpg', '2022-11-08'),
(5, 'Imagine Dragons', 'ar5-1667928755.jpg', '2022-11-08'),
(6, 'Neha Kakkar', 'ar6-1667928770.jpg', '2022-11-08'),
(7, 'Lata Mangeshkar', 'ar7-1667928788.jpg', '2022-11-08'),
(8, 'Kishore Kumar', 'ar8-1667928804.jpg', '2022-11-08'),
(9, 'Taylor Shift', 'ar12-1667928850.jpg', '2022-11-08'),
(11, 'Kirtidan Dadhvi', 'navrati2-1667972858.jpeg', '2022-11-09'),
(12, 'Marshmello', 'ar14-1667973385.jpg', '2022-11-09');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `user_id` int(100) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_subject` varchar(50) NOT NULL,
  `user_message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`user_id`, `user_name`, `user_email`, `user_subject`, `user_message`) VALUES
(1, 'chintan', 'chintan@mail.com', 'error', 'No Songs'),
(2, 'harsh', 'harsh@mail.com', 'error', 'No Profile'),
(3, 'parin', 'parin@mail.com', 'musics', 'garba na music upload kar');

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `music_id` int(11) NOT NULL,
  `music_name` varchar(150) NOT NULL,
  `music_mp3` varchar(150) NOT NULL,
  `music_photo` varchar(150) DEFAULT NULL,
  `artist_id` int(11) UNSIGNED DEFAULT NULL,
  `music_upload` date NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`music_id`, `music_name`, `music_mp3`, `music_photo`, `artist_id`, `music_upload`, `created_at`) VALUES
(1, 'Darkside', 'Darkside-1667905674.mp3', 'mu01-1667905674.jpg', 1, '2022-11-08', '2022-11-08 00:00:00'),
(2, 'Ignite', 'Ignite-1667918484.mp3', 'mu05-1667918484.png', 1, '2022-11-08', '2022-11-08 00:00:00'),
(3, 'Diamond Heart', 'Diamond Heart-1667929537.mp3', 'mu02-1667929537.jpg', 1, '2022-11-08', '2022-11-08 00:00:00'),
(4, 'End Of Time', 'End of Time-1667929570.mp3', 'mu03-1667929570.jpg', 1, '2022-11-08', '2022-11-08 00:00:00'),
(5, 'Faded', 'Faded-1667929602.mp3', 'mu04-1667929602.png', 1, '2022-11-08', '2022-11-08 00:00:00'),
(6, 'On My Way', 'On My Way-1667929641.mp3', 'mu06-1667929641.jpg', 1, '2022-11-08', '2022-11-08 00:00:00'),
(7, 'Woh Din', 'Woh Din-1667929685.mp3', 'so3-1667929685.jpg', 2, '2022-11-08', '2022-11-08 00:00:00'),
(8, 'Kesariya', 'Kesariya - Brahmastra-1667929813.mp3', 'so4-1667929813.jpg', 2, '2022-11-08', '2022-11-08 00:00:00'),
(9, 'Happier', 'Happier (Stripped) - Marshmello ft.-1667973478.mp3', 'so5-1667973478.jpg', 12, '2022-11-09', '2022-11-09 00:00:00'),
(10, 'Garba', 'Kirtidan Gadhvi-1667974620.mp3', 'navrati1-1667974620.jpeg', 11, '2022-11-09', '2022-11-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `sub_price` int(100) NOT NULL,
  `sub__desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`sub_id`, `sub_name`, `sub_price`, `sub__desc`) VALUES
(1, 'Silver', 49, 'Ads Free Music for one month'),
(2, 'Gold', 249, 'Ads Free Musics for three months'),
(3, 'Diamond', 499, 'Ads Free Musics for one year');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_mno` varchar(15) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_passw` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_mno`, `user_email`, `user_passw`) VALUES
(1, 'Chintan', '9712424775', 'chintan@mail.com', 'chin1234'),
(4, 'Harsh', '9999999999', 'harsh@mail.com', 'harsh111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`album_id`),
  ADD UNIQUE KEY `music_mp3` (`album_photo`);

--
-- Indexes for table `album_musics`
--
ALTER TABLE `album_musics`
  ADD KEY `album_id` (`album_id`),
  ADD KEY `music_id` (`music_id`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`music_id`),
  ADD KEY `music_artist` (`artist_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `artist_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `music_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album_musics`
--
ALTER TABLE `album_musics`
  ADD CONSTRAINT `album_musics_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `albums` (`album_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `album_musics_ibfk_2` FOREIGN KEY (`music_id`) REFERENCES `music` (`music_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `music`
--
ALTER TABLE `music`
  ADD CONSTRAINT `artist_id_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`artist_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
