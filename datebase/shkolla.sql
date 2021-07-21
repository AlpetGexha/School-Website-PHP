-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2021 at 05:00 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

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
(3, 1, 'Privacy ', 'Privacy is the ability of an individual or group to seclude themselves or information about themselves, and thereby express themselves selectively.\r\n\r\nWhen something is private to a person, it usually means that something is inherently special or sensitive to them. The domain of privacy partially overlaps with security, which can include the concepts of appropriate use and protection of information. Privacy may also take the form of bodily integrity. The right not to be subjected to unsanctioned invasions of privacy by the government, corporations, or individuals is part of many countries\' privacy laws, and in some cases, constitutions.\r\n\r\nIn the business world, a person may volunteer personal details, including for advertising, in order to receive some kinds of benefit. Public figures may be subject to rules on the public interest. Personal information which is voluntarily shared but subsequently stolen or misused can lead to identity theft.\r\n\r\nThe concept of universal individual privacy is a modern concept primarily associated with Western culture, British and North American in particular, and remained virtually unknown in some cultures until recent times. Most cultures, however, recognize the ability of individuals to withhold certain parts of their personal information from wider society, such as closing the door to one\'s home.', '', 'AlpetG Blog.60be642275d6e6.66775567.jpg', '2021-05-13 00:00:00', 3, 15),
(4, 1, 'Iphone 12', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 'AlpetG Blog.60be642275d6e6.66775567.jpg', '2021-05-13 00:00:00', 4, 59),
(5, 1, 'IT', 'Information technology (IT) is the use of computers to store or retrieve data[1] and information. IT is typically used within the context of business operations as opposed to personal or entertainment technologies.[2] IT is considered to be a subset of information and communications technology (ICT). An information technology system (IT system) is generally an information system, a communications system, or, more specifically speaking, a computer system â€“ including all hardware, software, and peripheral equipment â€“ operated by a limited group of IT users.\r\n\r\nHumans have been storing, retrieving, manipulating, and communicating information since the Sumerians in Mesopotamia developed writing in about 3000 BC.[3] However, the term information technology in its modern sense first appeared in a 1958 article published in the Harvard Business Review; authors Harold J. Leavitt and Thomas L. Whisler commented that \"the new technology does not yet have a single established name. We shall call it information technology (IT).\" Their definition consists of three categories: techniques for processing, the application of statistical and mathematical methods to decision-making, and the simulation of higher-order thinking through computer programs.[4]', '', 'dubai.jpg', '2021-05-13 00:00:00', 5, 94),
(60, 17, 'Computer', ' A computer is a machine that can be programmed to carry out sequences of arithmetic or logical operations automatically. Modern computers can perform generic sets of operations known as programs. These programs enable computers to perform a wide range of tasks. A computer system is a \"complete\" computer that includes the hardware, operating system (main software), and peripheral equipment needed and used for \"full\" operation. This term may also refer to a group of computers that are linked and function together, such as a computer network or computer cluster.\r\n\r\nA broad range of industrial and consumer products use computers as control systems. Simple special-purpose devices like microwave ovens and remote controls are included, as are factory devices like industrial robots and computer-aided design, as well as general-purpose devices like personal computers and mobile devices like smartphones. Computers power the Internet, which links hundreds of millions of other computers and users.\r\n\r\nEarly computers were only meant to be used for calculations. Simple manual instruments like the abacus have aided people in doing calculations since ancient times. Early in the Industrial Revolution, some mechanical devices were built to automate long tedious tasks, such as guiding patterns for looms. More sophisticated electrical machines did specialized analog calculations in the early 20th century. The first digital electronic calculating machines were developed during World War II. The first semiconductor transistors in the late 1940s were followed by the silicon-based MOSFET (MOS transistor) and monolithic integrated circuit (IC) chip technologies in the late 1950s, leading to the microprocessor and the microcomputer revolution in the 1970s. The speed, power and versatility of computers have been increasing dramatically ever since then, with transistor counts increasing at a rapid pace (as predicted by Moore\'s law), leading to the Digital Revolution during the late 20th to early 21st centuries.\r\n\r\nConventionally, a modern computer consists of at least one processing element, typically a central processing unit (CPU) in the form of a microprocessor, along with some type of computer memory, typically semiconductor memory chips. The processing element carries out arithmetic and logical operations, and a sequencing and control unit can change the order of operations in response to stored information. Peripheral devices include input devices (keyboards, mice, joystick, etc.), output devices (monitor screens, printers, etc.), and input/output devices that perform both functions (e.g., the 2000s-era touchscreen). Peripheral devices allow information to be retrieved from an external source and they enable the result of operations to be saved and retrieved.\r\nAccording to the Oxford English Dictionary, the first known use of the word \"computer\" was in 1613 in a book called The Yong Mans Gleanings by the English writer Richard Braithwait: \"I haue [sic] read the truest computer of Times, and the best Arithmetician that euer [sic] breathed, and he reduceth thy dayes into a short number.\" This usage of the term referred to a human computer, a person who carried out calculations or computations. The word continued with the same meaning until the middle of the 20th century. During the latter part of this period women were often hired as computers because they could be paid less than their male counterparts.[1] By 1943, most human computers were women.[2]\r\n\r\nThe Online Etymology Dictionary gives the first attested use of \"computer\" in the 1640s, meaning \"one who calculates\"; this is an \"agent noun from compute (v.)\". The Online Etymology Dictionary states that the use of the term to mean \"\'calculating machine\' (of ', '', 'AlpetG Blog.60be642275d6e6.66775567.jpg', '2021-06-05 13:01:58', 2, 182),
(80, 17, 'Teste', 'Last text', '', 'AlpetG Blog.60be642275d6e6.66775567.jpg', '2021-06-07 20:23:30', 2, 61),
(91, 1, 'Alpet', 'Alpet', '', 'NexhmedinNixha.60e8fddd446c10.03582778.jpg', '2021-07-10 03:54:37', 1, 0);

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
(4, 'NexhmedinNixhaStaf.60f6412c2981f1.78525617.jpg', 'Testfdfds', 'Dasd', 3),
(5, 'NexhmedinNixhaStaf.60f6412c2981f1.78525617.jpg', 'Test', 'Dasd', 2),
(6, 'NexhmedinNixhaStaf.60f6412c2981f1.78525617.jpg', 'Test', 'Dasd', 2),
(7, 'NexhmedinNixhaStaf.60f6412c2981f1.78525617.jpg', 'Test', 'Dasd', 2),
(8, 'NexhmedinNixhaStaf.60f6412c2981f1.78525617.jpg', 'Test', 'Dasd', 2),
(9, 'NexhmedinNixhaStaf.60f6412c2981f1.78525617.jpg', 'Test', 'Dasd', 2),
(10, 'NexhmedinNixhaStaf.60f6412c2981f1.78525617.jpg', 'Test', 'Dasd', 2),
(11, 'NexhmedinNixhaStaf.60f6412c2981f1.78525617.jpg', 'Test', 'Dasd', 2),
(12, 'NexhmedinNixhaStaf.60f6412c2981f1.78525617.jpg', 'Test', 'Dasd', 2),
(13, 'NexhmedinNixhaStaf.60f6412c2981f1.78525617.jpg', 'Test', 'Dasd', 2);

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

--
-- Indexes for dumped tables
--

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
  ADD KEY `category` (`category`),
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
-- AUTO_INCREMENT for dumped tables
--

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

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
  MODIFY `stafiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

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
