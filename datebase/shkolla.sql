-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2021 at 06:43 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nexhmedinnixha`
--

-- --------------------------------------------------------

--
-- Table structure for table `aplikimet`
--

CREATE TABLE `aplikimet` (
  `id` int(11) NOT NULL,
  `emri` varchar(255) NOT NULL,
  `mbiemri` varchar(255) NOT NULL,
  `emriprindi` varchar(255) NOT NULL,
  `ditelindja` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefoni` varchar(255) NOT NULL,
  `drejtimet` varchar(255) NOT NULL,
  `j_data` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aplikimet`
--

INSERT INTO `aplikimet` (`id`, `emri`, `mbiemri`, `emriprindi`, `ditelindja`, `email`, `telefoni`, `drejtimet`, `j_data`) VALUES
(20, 'Alpet Gexha', 'Gexha', 'Alpet', '2004-08-09', 'agexha@gmail.com', '123-123-123', 'Informatika', '2021-07-28 17:42:28'),
(21, 'Alpet Gexha', 'Gexha', 'Alpet', '2004-08-09', 'agexha@gmail.com', '123-123-123', 'Informatika', '2021-07-28 17:42:28');

-- --------------------------------------------------------

--
-- Table structure for table `kontakit`
--

CREATE TABLE `kontakit` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sms` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lamia`
--

CREATE TABLE `lamia` (
  `idLamia` int(11) NOT NULL,
  `lamiaid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lamia`
--

INSERT INTO `lamia` (`idLamia`, `lamiaid`) VALUES
(1, 'Makineri'),
(2, 'Trafik Rrugor'),
(3, 'Elektroteknika'),
(4, 'Ndertimtari'),
(5, 'Tekstil'),
(6, 'Art pamor');

-- --------------------------------------------------------

--
-- Table structure for table `lendet`
--

CREATE TABLE `lendet` (
  `lendetID` int(255) NOT NULL,
  `lendetEmri` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lendet`
--

INSERT INTO `lendet` (`lendetID`, `lendetEmri`) VALUES
(2, 'Teknollogji'),
(3, 'TIK');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `titulli` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `tags` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `category` int(3) DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `userid`, `titulli`, `body`, `tags`, `photo`, `date`, `category`, `views`) VALUES
(93, 1, 'Alpet', 'Alpet', '', 'NexhmedinNixha.61016b2ec79a14.24671002.png', '2021-07-28 16:35:26', 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `lamia` int(11) NOT NULL,
  `emri` varchar(40) NOT NULL,
  `emriPhoto` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `lamia`, `emri`, `emriPhoto`) VALUES
(1, 1, 'Automekanik', 'Makineri.jpg'),
(2, 1, 'Operator Prodhimi', 'Oprodhimi.jpg'),
(4, 2, 'Transport Rrugor', 'TrafikRrugor.jpg'),
(5, 3, 'Informatika', 'Informatika.jpg'),
(7, 3, 'Instalues Elektrik', 'InstaluesEletrik.jpg'),
(8, 3, 'Energjetika', 'Energjetika.jpg'),
(9, 4, 'Arkitektur', 'Arkitektur.jpg'),
(10, 4, 'Ndertimtari', 'Ndertimtari.jpg'),
(11, 5, 'Rrobaqepsi', 'Rrobaqepsi.jpg'),
(98, 6, 'Disajn i Veshjeve', 'NexhmedinNixha.60e91652e57df6.68452799.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'SuperAdmin'),
(2, 'Admin'),
(3, 'Moderator'),
(4, 'Editor');

-- --------------------------------------------------------

--
-- Table structure for table `stafi`
--

CREATE TABLE `stafi` (
  `stafiID` int(11) NOT NULL,
  `stafiPhoto` varchar(255) NOT NULL,
  `stafiEmri` varchar(255) NOT NULL,
  `stafiMbiemri` varchar(255) NOT NULL,
  `stafiLenda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stafi`
--

INSERT INTO `stafi` (`stafiID`, `stafiPhoto`, `stafiEmri`, `stafiMbiemri`, `stafiLenda`) VALUES
(17, 'NNStaf.60ff43632c7b30.69143912.jpg', 'Alpet', 'Gexha', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `emri` varchar(255) NOT NULL,
  `mbiemri` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `image` varchar(500) NOT NULL DEFAULT 'nologouser.jpg',
  `j_data` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `emri`, `mbiemri`, `username`, `password`, `email`, `role`, `image`, `j_data`) VALUES
(1, 'Alpet', 'Gexha', 'AlpetG', '$2y$10$kymJnHuonTJVKJDi5iLqDO12/q7TxatuMUYuRqkzMmPg6yvaGmHqC', 'agexha@gmail.com', 1, 'AlpetGBlogUser.60c38af32e7f04.43411620.jpg', '2021-06-05 01:53:35'),
(17, 'Test', 'test', 'AlpetG2', '$2y$10$kymJnHuonTJVKJDi5iLqDO12/q7TxatuMUYuRqkzMmPg6yvaGmHqC', 'agexha10@gmail.com', 1, 'nologouser.jpg', '2021-06-05 01:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_info`
--

CREATE TABLE `visitor_info` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `time_accessed` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor_info`
--

INSERT INTO `visitor_info` (`id`, `ip_address`, `user_agent`, `time_accessed`) VALUES
(170, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-28 14:35:34'),
(171, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-28 14:35:35'),
(172, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-28 14:44:39'),
(173, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-28 15:21:52'),
(174, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-28 15:21:54'),
(175, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-28 15:23:33'),
(176, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-28 15:23:41'),
(177, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-28 15:23:44'),
(178, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-28 15:23:44'),
(179, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-28 15:23:44'),
(180, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-28 15:25:00'),
(181, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-28 15:26:21'),
(182, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-28 15:31:47'),
(183, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-28 16:16:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aplikimet`
--
ALTER TABLE `aplikimet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontakit`
--
ALTER TABLE `kontakit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lamia`
--
ALTER TABLE `lamia`
  ADD PRIMARY KEY (`idLamia`);

--
-- Indexes for table `lendet`
--
ALTER TABLE `lendet`
  ADD PRIMARY KEY (`lendetID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lamia` (`lamia`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stafi`
--
ALTER TABLE `stafi`
  ADD PRIMARY KEY (`stafiID`),
  ADD KEY `stafiLenda` (`stafiLenda`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `visitor_info`
--
ALTER TABLE `visitor_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aplikimet`
--
ALTER TABLE `aplikimet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `kontakit`
--
ALTER TABLE `kontakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lamia`
--
ALTER TABLE `lamia`
  MODIFY `idLamia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lendet`
--
ALTER TABLE `lendet`
  MODIFY `lendetID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stafi`
--
ALTER TABLE `stafi`
  MODIFY `stafiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `visitor_info`
--
ALTER TABLE `visitor_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD CONSTRAINT `post_categories_ibfk_1` FOREIGN KEY (`lamia`) REFERENCES `lamia` (`idLamia`);

--
-- Constraints for table `stafi`
--
ALTER TABLE `stafi`
  ADD CONSTRAINT `stafi_ibfk_1` FOREIGN KEY (`stafiLenda`) REFERENCES `lendet` (`lendetID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
