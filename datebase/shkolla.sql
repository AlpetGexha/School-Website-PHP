
DROP DATABASE IF EXISTS `nexhmedinnixha`;
CREATE DATABASE `nexhmedinnixha`;
USE `nexhmedinnixha`;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 10:24 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

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

CREATE TABLE IF NOT EXISTS `aplikimet` (
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
(23, 'jhgjgh', 'jghjgh', 'Alpet', '2004-08-09', 'agexha@gmail.com', '044-444-444', 'Ndertimtari', '2021-08-03 00:26:27'),
(24, 'das', 'das', 'das', '2004-08-09', 'agexha@gmail.com', '123-123-123', 'Transport Rrugor', '2021-08-09 00:05:48'),
(25, 'Sufjan', 'Mejziri', 'Alpet', '2021-11-08', 'Sufa6969@outlook.com', '123-123-123', 'Arkitektur', '2021-11-08 09:10:32');

-- --------------------------------------------------------

--
-- Table structure for table `kontakit`
--

CREATE TABLE IF NOT EXISTS `kontakit` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sms` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontakit`
--

INSERT INTO `kontakit` (`id`, `email`, `sms`) VALUES
(6, '', 'cxczxczxc');

-- --------------------------------------------------------

--
-- Table structure for table `lamia`
--

CREATE TABLE IF NOT EXISTS `lamia` (
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

CREATE TABLE IF NOT EXISTS `lendet` (
  `lendetID` int(255) NOT NULL,
  `lendetEmri` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lendet`
--

INSERT INTO `lendet` (`lendetID`, `lendetEmri`) VALUES
(4, 'Drejtori'),
(5, 'Arsimtar'),
(6, 'Sekretar'),
(7, 'Kordinator i shkollÃ«s'),
(8, 'ShÃ«rbim teknik');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
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
(96, 1, 'Automekanik', 'NjÃ« mekanik auto ( teknik automobilave nÃ« shumicÃ«n e AmerikÃ«n e Veriut , teknik tÃ« lehta automjeteve nÃ« British anglisht , dhe mekanik motor nÃ« Australian anglisht ) Ã«shtÃ« njÃ« mekanik me njÃ« shumÃ«llojshmÃ«ri tÃ« automobilave bÃ«n ose ose nÃ« njÃ« zonÃ« tÃ« caktuar ose nÃ« njÃ« tÃ« veÃ§antÃ« tÃ« automobilave. NÃ« riparimin e makinave, roli i tyre kryesor Ã«shtÃ« diagnostikimiproblemi nÃ« mÃ«nyrÃ« tÃ« saktÃ« dhe tÃ« shpejtÃ«. Ata shpesh duhet tÃ« japin kuotat e Ã§mimeve pÃ«r klientÃ«t e tyre para fillimit tÃ« punÃ«s ose pas Ã§montimit tÃ« pjesshÃ«m pÃ«r inspektim. Puna e tyre mund tÃ« pÃ«rfshijÃ« riparimin e njÃ« pjese tÃ« veÃ§antÃ« ose zÃ«vendÃ«simin e njÃ« ose mÃ« shumÃ« pjesÃ«ve si kuvende.\r\n\r\nMirÃ«mbajtja themelore e automjeteve Ã«shtÃ« njÃ« pjesÃ« themelore e punÃ«s sÃ« njÃ« mekaniku nÃ« vendet moderne tÃ« industrializuara, ndÃ«rsa nÃ« tÃ« tjerat ata konsultohen vetÃ«m kur njÃ« automjet tashmÃ« po tregon shenja tÃ« mosfunksionimit. MirÃ«mbajtja parandaluese Ã«shtÃ« gjithashtu njÃ« pjesÃ« themelore e punÃ«s sÃ« njÃ« mekaniku, por kjo nuk Ã«shtÃ« e mundur nÃ« rastin e automjeteve qÃ« nuk mirÃ«mbahen rregullisht nga njÃ« mekanik. NjÃ« aspekt i keqkuptuar i mirÃ«mbajtjes parandaluese Ã«shtÃ« zÃ«vendÃ«simi i planifikuar i pjesÃ«ve tÃ« ndryshme, i cili ndodh para dÃ«shtimit pÃ«r tÃ« shmangur dÃ«mtimet shumÃ« mÃ« tÃ« shtrenjta. MeqenÃ«se kjo do tÃ« thotÃ« qÃ« pjesÃ«t tÃ« zÃ«vendÃ«sohen para se tÃ« vÃ«rehet ndonjÃ« problem, shumÃ« pronarÃ« tÃ« automjeteve nuk do ta kuptojnÃ« pse shpenzimi Ã«shtÃ« i nevojshÃ«m. [1]\r\n\r\nMe pÃ«rparimin e shpejtÃ« nÃ« teknologji, puna e mekanikut ka evoluar nga thjesht mekanike, pÃ«r tÃ« pÃ«rfshirÃ« teknologjinÃ« elektronike. PÃ«r shkak se automjetet sot posedojnÃ« sisteme komplekse kompjuterike dhe elektronike, mekanikÃ«t duhet tÃ« kenÃ« njÃ« bazÃ« mÃ« tÃ« gjerÃ« njohurish sesa nÃ« tÃ« kaluarÃ«n.\r\n\r\nPÃ«r shkak tÃ« natyrÃ«s gjithnjÃ« e mÃ« labirintike tÃ« teknologjisÃ« qÃ« tani Ã«shtÃ« pÃ«rfshirÃ« nÃ« automobila, shumica e shitÃ«sve tÃ« automobilave dhe punÃ«toritÃ« e pavarura tani ofrojnÃ« kompjuterÃ« tÃ« sofistikuar diagnostikues pÃ«r Ã§do teknik, pa tÃ« cilÃ«t ata nuk do tÃ« ishin nÃ« gjendje tÃ« diagnostikonin ose riparonin njÃ« automjet.', '', 'NexhmedinNixha.611062f8d2c387.43086966.jpg', '2021-08-09 01:04:24', 1, 2),
(97, 1, 'Topologjia e rrjetit', 'NjÃ« rrjet kompjuterik Ã«shtÃ« njÃ« grup kompjuterash autonomÃ« tÃ« ndÃ«rlidhur me ndihmÃ«n e njÃ« teknologjie tÃ« caktuar. Dy kompjutera quhen tÃ« ndÃ«rlidhur nÃ«se janÃ« tÃ« aftÃ« tÃ« shkÃ«mbejnÃ« informacion midis tyre. Lidhja mund tÃ« realizohet me anÃ«n e kabllove elektrikÃ«, fibrave optike, mikrovalÃ«ve, rrezeve infra tÃ« kuqe apo me anÃ«n e satelitÃ«ve. Rrjetet kanÃ« forma dhe madhÃ«si tÃ« ndryshme.', '', 'NexhmedinNixha.6110633e47b151.50288201.png', '2021-08-09 01:05:34', 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE IF NOT EXISTS `post_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `lamia` int(11) NOT NULL,
  `emri` varchar(40) NOT NULL,
  `emriPhoto` longtext NOT NULL,
  `colum_table` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `lamia`, `emri`, `emriPhoto`, `colum_table`) VALUES
(1, 1, 'Automekanik', 'NexhmedinNixha.611006ccea96b8.44966171.jpg', ''),
(2, 1, 'Operator Prodhimi', 'NexhmedinNixha.611006f99e3ac3.46040921.jpg', ''),
(4, 2, 'Transport Rrugor', 'TrafikRrugor.jpg', ''),
(5, 3, 'Informatika', 'Informatika.jpg', ' Ã‹shtÃ« profil nÃ« kuadÃ«r tÃ« drejtimit tÃ« ElektroteknikÃ«s. Brenda kÃ«tij profili nxÃ«nÃ«sit mund tÃ« mÃ«sojnÃ« pÃ«r:\r\nAplikacionet e Office-it,\r\nSistemet Operative,\r\nRrjetet Kompjuterike,\r\nAlgoritme,\r\nBaza tÃ« tÃ« dhÃ«nave,\r\nGjuhÃ« Programuese (C++),\r\nWeb disejn,\r\nArkitekturÃ« Kompjuteri.\r\n\r\nViti i Ri shkollor â€¦ Drejtimi i InformatikÃ«s nÃ« vitin e ri shkollor, 2021 fillon i pÃ«rgatitur sa i pÃ«rket gadishmÃ«risÃ« sÃ« kabineteve pÃ«r tâ€™iu shÃ«rbyer nxÃ«nÃ«sve sa mÃ« mirÃ«. NÃ« kÃ«tÃ« kontekst vlenÃ« tÃ« theksohet se ekzistojnÃ« dy kabinete tÃ« paisur me kompjuterÃ« solidÃ« pÃ«r punÃ«. Ata janÃ« tÃ« lidhur nÃ« rrjetin e Internetit, kÃ«shtuqÃ« nxÃ«nÃ«sit mund tÃ« shfrytÃ«zojnÃ« informacione edhe nga Interneti. PÃ«r tÃ« shfrytÃ«zuar materiale pÃ«r mÃ«sim, klikoni mÃ« poshtÃ« !'),
(7, 3, 'Instalues Elektrik', 'InstaluesEletrik.jpg', ''),
(8, 3, 'Energjetika', 'Energjetika.jpg', ''),
(9, 4, 'Arkitektur', 'Arkitektur.jpg', ''),
(10, 4, 'Ndertimtari', 'Ndertimtari.jpg', ''),
(11, 5, 'Rrobaqepsi', 'Rrobaqepsi.jpg', ''),
(98, 6, 'Disajn i Veshjeve', 'NexhmedinNixha.60e91652e57df6.68452799.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
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

CREATE TABLE IF NOT EXISTS `stafi` (
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
(19, 'NNStaf.611050e37454f6.80223837.jpg', 'Lorem', 'Lorem', 4),
(24, 'NNStaf.61105130d124e0.47590146.jpg', 'Lorem6', 'Lorem6', 7),
(25, 'NNStaf.611051528cfbe5.30088685.jpg', 'Lorem6', 'Lorem7', 8),
(26, 'NNStaf.6110515ee52b14.92856169.jpg', 'Jhgdsafds', 'Lorem4', 8),
(35, 'NNStaf.61b7b89897c308.62536935.jpg', 'Lorem ', 'Lorem2', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `emri` varchar(255) NOT NULL,
  `mbiemri` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `perm` int(11) NOT NULL DEFAULT 0,
  `image` varchar(500) NOT NULL DEFAULT 'nologouser.jpg',
  `j_data` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `emri`, `mbiemri`, `username`, `password`, `email`, `role`, `perm`, `image`, `j_data`) VALUES
(1, 'Alpet', 'Gexha', 'AlpetG', '$2y$10$kymJnHuonTJVKJDi5iLqDO12/q7TxatuMUYuRqkzMmPg6yvaGmHqC', 'agexha@gmail.com', 1, 1, 'AlpetGBlogUser.60c38af32e7f04.43411620.jpg', '2021-06-05 01:53:35'),
(17, 'Test', 'test', 'AlpetG2', '$2y$10$kymJnHuonTJVKJDi5iLqDO12/q7TxatuMUYuRqkzMmPg6yvaGmHqC', 'agexha10@gmail.com', 1, 0, 'nologouser.jpg', '2021-06-05 01:13:22'),
(74, 'admin', 'admin', 'damin', '$2y$10$91/2mHTdkWWgFda6oWdXkO2L0igeRuE63G3DP5xYOY7c24.YyPRCG', 'admin@admin.com', 1, 0, 'nologouser.jpg', '2021-07-29 02:13:05');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_info`
--

CREATE TABLE IF NOT EXISTS `visitor_info` (
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `kontakit`
--
ALTER TABLE `kontakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lamia`
--
ALTER TABLE `lamia`
  MODIFY `idLamia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lendet`
--
ALTER TABLE `lendet`
  MODIFY `lendetID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1023;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stafi`
--
ALTER TABLE `stafi`
  MODIFY `stafiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `visitor_info`
--
ALTER TABLE `visitor_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

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
