-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 31, 2019 at 02:45 PM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.15-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SnowKMS`
--

-- --------------------------------------------------------

--
-- Table structure for table `human-behaviour`
--

/**
 * Human Behaviour
 * Sample Plugin
 * 
 * @author        MohammadReza Tayyebi <rexa@gordarg.com>
 * @since         1.0
 */

CREATE TABLE `human-behaviour` (
  `Id` bigint(20) NOT NULL,
  `Year` int(11) NOT NULL,
  `Month` tinyint(4) NOT NULL,
  `Day` tinyint(4) NOT NULL,
  `From` time NOT NULL,
  `To` time NOT NULL,
  `Quality` tinyint(4) NOT NULL,
  `Task` varchar(300) NOT NULL,
  `Brief` varchar(4000) NOT NULL,
  `UserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `Id` int(11) NOT NULL,
  `Event` varchar(10) DEFAULT 'LOGIN',
  `Key` varchar(100) DEFAULT 'USERNAME',
  `Value` varchar(3000) DEFAULT 'TOKEN',
  `Submit` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `MasterId` char(36) NOT NULL,
  `Id` int(11) NOT NULL,
  `Title` varchar(400) DEFAULT NULL,
  `Submit` datetime NOT NULL,
  `Type` char(5) NOT NULL DEFAULT 'POST' COMMENT 'POST, FILE, ARTL, COMT, SURV, QUST, ANSR,CHAT,TRNL,QUOT',
  `Level` char(2) DEFAULT 'DC' COMMENT 'Data Content by default. Other SEO and publish levels must be declared with integrers.',
  `BinContent` longblob,
  `Body` longtext,
  `UserId` int(11) DEFAULT NULL,
  `Status` char(7) DEFAULT 'DRAFT' COMMENT 'Post lifecycle',
  `Language` varchar(5) DEFAULT 'fa-IR',
  `RefrenceId` char(36) DEFAULT NULL,
  `Index` smallint(6) DEFAULT NULL,
  `IsDeleted` bit(1) NOT NULL DEFAULT b'0',
  `IsContentDeleted` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `post_contributers`
-- (See below for the actual view)
--
CREATE TABLE `post_contributers` (
`MasterID` char(36)
,`ID` int(11)
,`UserID` int(11)
,`Username` varchar(45)
,`Submit` datetime
,`Language` varchar(5)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `post_details`
-- (See below for the actual view)
--
CREATE TABLE `post_details` (
`MasterID` char(36)
,`Title` varchar(400)
,`ID` int(11)
,`Submit` datetime
,`UserID` int(11)
,`Username` varchar(45)
,`Body` longtext
,`Type` char(5)
,`Level` char(2)
,`RefrenceID` char(36)
,`Index` smallint(6)
,`Status` char(7)
,`Language` varchar(5)
,`BinContent` longblob
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Username` varchar(45) DEFAULT NULL,
  `HashPassword` tinytext,
  `IsActive` bit(1) DEFAULT b'1',
  `Role` tinyint(5) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Username`, `HashPassword`, `IsActive`, `Role`) VALUES
(1, 'root', 'fdcfc214459c57ab954b9a8ebde4a96ad761411d94e2fb8a414c0d25d38d2de3c831ce12eff572177b038bb610e301bb924dfc90833804a4409cd0c0e594d70e', b'1', 3);

-- --------------------------------------------------------

--
-- Structure for view `post_contributers`
--
DROP TABLE IF EXISTS `post_contributers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `post_contributers`  AS  select `P`.`MasterId` AS `MasterID`,`P`.`Id` AS `ID`,`P`.`UserId` AS `UserID`,`U`.`Username` AS `Username`,`P`.`Submit` AS `Submit`,`P`.`Language` AS `Language` from (`posts` `P` join `users` `U` on((`P`.`UserId` = `U`.`Id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `post_details`
--
DROP TABLE IF EXISTS `post_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `post_details`  AS  select `P`.`MasterId` AS `MasterID`,`P`.`Title` AS `Title`,`P`.`Id` AS `ID`,`P`.`Submit` AS `Submit`,`P`.`UserId` AS `UserID`,`U`.`Username` AS `Username`,`P`.`Body` AS `Body`,`P`.`Type` AS `Type`,`P`.`Level` AS `Level`,`P`.`RefrenceId` AS `RefrenceID`,`P`.`Index` AS `Index`,`P`.`Status` AS `Status`,`P`.`Language` AS `Language`,(case when ((select `P2`.`Submit` from `posts` `P2` where ((`P2`.`IsContentDeleted` = 1) and (`P`.`MasterId` = `P2`.`MasterId`)) order by `P2`.`Submit` desc limit 1) > (select `P1`.`Submit` from `posts` `P1` where ((`P1`.`BinContent` is not null) and (`P`.`MasterId` = `P1`.`MasterId`)) order by `P1`.`Submit` desc limit 1)) then NULL else (select `P1`.`BinContent` from `posts` `P1` where ((`P1`.`BinContent` is not null) and (`P`.`IsContentDeleted` = 0) and (`P`.`MasterId` = `P1`.`MasterId`)) order by `P1`.`Submit` desc limit 1) end) AS `BinContent` from (`posts` `P` join `users` `U` on((`P`.`UserId` = `U`.`Id`))) where (`P`.`Id` in (select max(`posts`.`Id`) from `posts` group by `posts`.`MasterId`,`posts`.`Language`) and (`P`.`IsDeleted` = '0')) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `human-behaviour`
--
ALTER TABLE `human-behaviour`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`Id`,`MasterId`),
  ADD KEY `fk_posts_user_idx` (`UserId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `human-behaviour`
--
ALTER TABLE `human-behaviour`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_posts_user` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;