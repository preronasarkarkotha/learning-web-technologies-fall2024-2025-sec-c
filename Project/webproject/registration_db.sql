-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2025 at 06:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `phone` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `gender`, `phone`, `created_at`) VALUES
(1, 'MEHZABIN LIANA', 'mehzabinliana25@gmail.com', '$2y$10$yqikgrZSKckLmhfEhZ7T1uXV2HtWvIGvOL4mSoX3jj3eOTGRCiE6u', 'Female', '0131445575', '2025-01-04 16:27:26'),
(2, 'ramisa', 'ramisa@gmail.com', '$2y$10$zd0HGHsSRf0e5MQ0jYytZeMOxPhQ4ZKl7.NQXTjRkPAgqzOiUMcjq', 'Female', '0167774443', '2025-01-04 17:13:05'),
(3, 'mehzabin', 'lianadhk@gmail.com', '$2y$10$UqFCZZeTddnuP.NALM10suQifJoZxTEjf17t4JW8UqqdehImQE1be', 'Female', '0171107678', '2025-01-04 18:47:13'),
(4, 'ashraf', 'ashraf@gmail.com', '$2y$10$tGekL7uY49go57FO4JNc/e0S7n8.4xB1sZ0QaxHpqY06d3Nr2fk8i', 'Male', '0167774378', '2025-01-04 19:03:21'),
(5, 'hasan', 'hasan@gmail.com', '$2y$10$5HVOvNl6poDbnmKQdqQt0.eXF3Hhc/kiPRMmxEnXXRA2ovYjJuoZW', 'Male', '0131445575', '2025-01-05 08:25:30'),
(6, 'ramisha', 'ram@gmail.com', '$2y$10$2RIvLMnU6x97Ld2pAceQ3.sW29BsamNSiUYP.NjzDHFLaxjfrBCxu', 'Female', '1711073629', '2025-01-05 09:01:27'),
(7, 'fariha', 'farihafarin24@gmail.com', '$2y$10$io/fK94Jw9PXDvuTBsv5Z.CUeMOnsI6ZQ2zqUW8bvZzf4P4NtWfNO', 'Female', '0164444029', '2025-01-18 19:38:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
