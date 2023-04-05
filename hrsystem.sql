-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2023 at 02:00 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrsystem`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `adminalldata`
-- (See below for the actual view)
--
CREATE TABLE `adminalldata` (
`id` int(11)
,`name` varchar(50)
,`password` varchar(50)
,`image` varchar(50)
,`description` varchar(90)
);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL DEFAULT 'fake.jpg',
  `rule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`, `image`, `rule`) VALUES
(1, 'elsafory', '445cd2fd3273962bdf09425109a2d09f7170e837', '3048252023_02_10_16_06_IMG_1995.jpg', 1),
(10, 'elsaforyy', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '6525482023_02_10_16_06_IMG_1995.jpg', 2),
(11, 'mada', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'fake.jpg', 3),
(12, 'kareem', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '9406392023_02_10_16_06_IMG_1995.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(1, 'hr'),
(2, 'php'),
(3, 'web'),
(5, 'FULL STACk');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `salary` int(11) NOT NULL,
  `image` text NOT NULL,
  `departmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `salary`, `image`, `departmentID`) VALUES
(1, 'A_ElsaforY', 3284, '203752023_02_10_16_06_IMG_1995.jpg', 2),
(2, 'hakldb', 34423, '2036702023_02_10_16_06_IMG_1995.jpg', 1),
(3, 'elsafory', 11851, '777912023_02_10_16_06_IMG_1995.jpg', 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `employeesjoindepartment`
-- (See below for the actual view)
--
CREATE TABLE `employeesjoindepartment` (
`id` int(11)
,`empName` varchar(50)
,`salary` int(11)
,`image` text
,`depName` varchar(50)
,`depId` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `employeesnotjoin`
-- (See below for the actual view)
--
CREATE TABLE `employeesnotjoin` (
`id` int(11)
,`depName` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE `rule` (
  `id` int(11) NOT NULL,
  `description` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`id`, `description`) VALUES
(1, 'Super Admin'),
(2, 'Department and Employee Only'),
(3, 'Department Only'),
(4, 'Employee Only');

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `color` varchar(50) NOT NULL DEFAULT 'dark',
  `adminID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`id`, `color`, `adminID`) VALUES
(1, 'dark', 1),
(3, 'light', 1);

-- --------------------------------------------------------

--
-- Structure for view `adminalldata`
--
DROP TABLE IF EXISTS `adminalldata`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `adminalldata`  AS SELECT `admins`.`id` AS `id`, `admins`.`name` AS `name`, `admins`.`password` AS `password`, `admins`.`image` AS `image`, `rule`.`description` AS `description` FROM (`admins` join `rule` on(`admins`.`rule` = `rule`.`id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `employeesjoindepartment`
--
DROP TABLE IF EXISTS `employeesjoindepartment`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `employeesjoindepartment`  AS SELECT `employees`.`id` AS `id`, `employees`.`name` AS `empName`, `employees`.`salary` AS `salary`, `employees`.`image` AS `image`, `departments`.`name` AS `depName`, `departments`.`id` AS `depId` FROM (`employees` join `departments` on(`employees`.`departmentID` = `departments`.`id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `employeesnotjoin`
--
DROP TABLE IF EXISTS `employeesnotjoin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `employeesnotjoin`  AS SELECT `departments`.`id` AS `id`, `departments`.`name` AS `depName` FROM (`departments` left join `employees` on(`employees`.`departmentID` = `departments`.`id`)) WHERE `employees`.`departmentID` is nullnull  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rule` (`rule`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departmentID` (`departmentID`);

--
-- Indexes for table `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adminID` (`adminID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rule`
--
ALTER TABLE `rule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`rule`) REFERENCES `rule` (`id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`departmentID`) REFERENCES `departments` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `theme`
--
ALTER TABLE `theme`
  ADD CONSTRAINT `theme_ibfk_1` FOREIGN KEY (`adminID`) REFERENCES `admins` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
