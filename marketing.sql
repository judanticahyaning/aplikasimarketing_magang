-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2020 at 08:26 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketing`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id_activity` int(11) NOT NULL,
  `name_activity` text NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_am` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_stage` int(11) NOT NULL,
  `time` date DEFAULT NULL,
  `note` text NOT NULL,
  `done` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `am`
--

CREATE TABLE `am` (
  `id_am` int(11) NOT NULL,
  `kode_am` varchar(5) NOT NULL,
  `nama_am` text NOT NULL,
  `foto_am` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `previlege` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `am`
--

INSERT INTO `am` (`id_am`, `kode_am`, `nama_am`, `foto_am`, `password`, `previlege`) VALUES
(1, 'MH', 'Miftahul', '091788000_1460967229-ad159740326pictured-the-v.jpg', '$2y$10$iLPuUR4BEQxYZ2Z8jMw2.u4CIL48uKdTLXmE0iyFT7iYLtfTonZpC', 'SPV'),
(8, 'AS', 'Cempe', 'photo.jpg', '$2y$10$JBuhCXqQ9rO1urA1cJfXgOtjUksvIWYBj4zyPxWlJZPGf5Dgri3BW', 'AM'),
(9, 'EL', 'Lailatul', 'photo.jpg', '$2y$10$xkHsuZIB1SJO5Sn7djsyU.Bb96jFJO.gU4uH5kkzIiIIncpQ588Cy', 'AM'),
(10, 'FZ', 'Fhrezha', 'photo.jpg', '$2y$10$0v05PbTB.Ve8ipKlzpFWgeLnt8P70tu7Hj2.xgCQ0PEMNhIa5l69C', 'AM'),
(11, 'CDG', 'DELTA', 'photo.jpg', '12345', 'AM');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `id_am` int(11) NOT NULL,
  `nama_customer` text NOT NULL,
  `email` text NOT NULL,
  `contact` varchar(50) NOT NULL,
  `segment` enum('Goverment','Corporate','Academy','') NOT NULL DEFAULT 'Goverment'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id_doc` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `nama_doc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pic`
--

CREATE TABLE `pic` (
  `id` int(11) NOT NULL,
  `nama_pic` text NOT NULL,
  `telp` text NOT NULL,
  `email` text NOT NULL,
  `id_customer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id_project` int(11) NOT NULL,
  `id_am` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_prospect` int(11) NOT NULL,
  `revenue` float NOT NULL,
  `est_gross` float NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prospect`
--

CREATE TABLE `prospect` (
  `id_prospect` int(11) NOT NULL,
  `id_am` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `nama_project` text NOT NULL,
  `cf` enum('0','30','60','90','100') NOT NULL DEFAULT '30',
  `est_value` float NOT NULL,
  `lead` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stage`
--

CREATE TABLE `stage` (
  `id_stage` int(11) NOT NULL,
  `stage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stage`
--

INSERT INTO `stage` (`id_stage`, `stage`) VALUES
(1, 'Open Prospect'),
(2, 'Prospecting Progress'),
(3, 'Closing Deal'),
(4, 'Fail'),
(5, 'Project Progress');

-- --------------------------------------------------------

--
-- Table structure for table `type_act`
--

CREATE TABLE `type_act` (
  `id_type` int(11) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type_act`
--

INSERT INTO `type_act` (`id_type`, `type`) VALUES
(1, 'Call'),
(2, 'Administration'),
(3, 'Email/Fax'),
(4, 'Customer Meeting'),
(5, 'Visitation'),
(6, 'Product Presentation');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id_activity`),
  ADD KEY `id_am` (`id_am`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_stage` (`id_stage`),
  ADD KEY `id_type` (`id_type`);

--
-- Indexes for table `am`
--
ALTER TABLE `am`
  ADD PRIMARY KEY (`id_am`),
  ADD UNIQUE KEY `kode_am` (`kode_am`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `id_am` (`id_am`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id_doc`),
  ADD KEY `fk_idproject` (`id_project`);

--
-- Indexes for table `pic`
--
ALTER TABLE `pic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `id_am` (`id_am`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_prospect` (`id_prospect`);

--
-- Indexes for table `prospect`
--
ALTER TABLE `prospect`
  ADD PRIMARY KEY (`id_prospect`),
  ADD KEY `id_am` (`id_am`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`id_stage`);

--
-- Indexes for table `type_act`
--
ALTER TABLE `type_act`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id_activity` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `am`
--
ALTER TABLE `am`
  MODIFY `id_am` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id_doc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pic`
--
ALTER TABLE `pic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prospect`
--
ALTER TABLE `prospect`
  MODIFY `id_prospect` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stage`
--
ALTER TABLE `stage`
  MODIFY `id_stage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `type_act`
--
ALTER TABLE `type_act`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `activity_ibfk_2` FOREIGN KEY (`id_stage`) REFERENCES `stage` (`id_stage`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `activity_ibfk_3` FOREIGN KEY (`id_type`) REFERENCES `type_act` (`id_type`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_am` FOREIGN KEY (`id_am`) REFERENCES `am` (`id_am`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `FK_idAM` FOREIGN KEY (`id_am`) REFERENCES `am` (`id_am`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `fk_idproject` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pic`
--
ALTER TABLE `pic`
  ADD CONSTRAINT `pic_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`id_am`) REFERENCES `am` (`id_am`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_ibfk_3` FOREIGN KEY (`id_prospect`) REFERENCES `prospect` (`id_prospect`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prospect`
--
ALTER TABLE `prospect`
  ADD CONSTRAINT `prospect_ibfk_1` FOREIGN KEY (`id_am`) REFERENCES `am` (`id_am`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prospect_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
