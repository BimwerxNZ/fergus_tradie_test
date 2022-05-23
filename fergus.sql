-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 08:00 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fergus`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `cdate` tinytext NOT NULL,
  `contact` tinytext NOT NULL,
  `telno` tinytext NOT NULL,
  `caddress` mediumtext NOT NULL,
  `notes` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `userid`, `name`, `cdate`, `contact`, `telno`, `caddress`, `notes`) VALUES
(1, 0, 'John Doe Family Home', '21/05/2022', 'John Doe', '+64211123456', '123 Residential Street, Happy Town, Auckland, 10111', 'Water damage and pipe leakage'),
(2, 0, 'Peter Pan Family', '21/05/2022', 'Peter Pan', '+642111456789', '123 Awesome street, Neverland, Auckland, 1234', 'Happy customer'),
(6, 0, 'Test Client', '21/05/2022', 'D Vasquez', '+6425461236', '789 Some Place, Some City, NZ', 'Good customer');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `cdate` tinytext NOT NULL,
  `clientid` int(11) NOT NULL,
  `notes` mediumtext NOT NULL,
  `status` tinytext NOT NULL DEFAULT 'scheduled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `userid`, `cdate`, `clientid`, `notes`, `status`) VALUES
(1, 0, '2022-05-21', 1, 'Test Line 1^Test Line 2', 'Active'),
(2, 0, '21/05/2022', 2, 'Replace Shower', 'Scheduled'),
(3, 0, '21/05/2022', 6, 'Broken Bathtub Faucet', 'Scheduled'),
(4, 0, '21/05/2022', 2, 'Sample 123^Sample note line 2', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(0, 'chris@bimwerx.nz', '$2y$10$lD5i4lizcEzpg8BkZspT3eDv21h.bsjnM8RnYA0Vd7jUFeJtccBR.', '2022-05-20 22:38:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
