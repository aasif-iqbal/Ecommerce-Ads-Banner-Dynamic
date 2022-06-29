-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 08, 2022 at 01:53 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eSTORE_DB`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ads_banner`
--

CREATE TABLE `tbl_ads_banner` (
  `banner_id` int(11) NOT NULL,
  `banner_path` varchar(255) NOT NULL,
  `is_Active` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ads_banner`
--

INSERT INTO `tbl_ads_banner` (`banner_id`, `banner_path`, `is_Active`) VALUES
(1, 'Ads-257420724.jpeg', 0),
(2, 'Ads-98862153.jpeg', 0),
(3, 'Ads-757747144.jpeg', 0),
(4, 'Ads-1021491524.jpeg', 0),
(5, 'Ads-74354802.jpeg', 0),
(6, 'Ads-1011672231.jpeg', 0),
(7, 'Ads-1949830766.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_ads_banner`
--
ALTER TABLE `tbl_ads_banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ads_banner`
--
ALTER TABLE `tbl_ads_banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
