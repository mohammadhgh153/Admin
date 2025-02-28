-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2025 at 09:57 AM
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
-- Database: `user_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `image`) VALUES
(1, 'ahmad', 'moaaadahammad@gmail.com', '$2y$10$IYCnGX/KISH5gbkDUYpfWufRHcPouyq31mjOqrUYjJX/zZVD2esCW', '2025-02-17 15:23:57', NULL),
(2, 'aliهههه', 'ali@gmail.com', '$2y$10$6QZnL839UcewHVcINcQaOuZQH/Jd3RmPdj0VqVxtx7oaYWYmTyGjS', '2025-02-20 04:48:35', 'uploads/1740026915_IMG_0007.JPG'),
(3, 'ahmadddd', 'ahmadi@gmail.com', '$2y$10$e1XfF41i4wJL4O.uSB0R6uxk8Amk7g8iqs/KgLVsMG8lJm3sxeyey', '2025-02-20 04:48:48', 'uploads/1740026928_IMG_0009.JPG'),
(4, 'abbassss', 'abbasd@gmail.com', '$2y$10$TIEd.gCU4PCCPcurWpvYQOlamLMv8XPlbb3W4L7ELd2bVB9guLVbi', '2025-02-18 05:47:23', NULL),
(5, 'hesammm ', 'hesam@gmail.com', '$2y$10$aPQ4auqYjSplPVOUo/XNaen/uHCJZ5ETTqBqTYs9XxmqWzV.oC0v2', '2025-02-18 05:46:30', NULL),
(6, 'ننن', 'nn@gmail.com', '$2y$10$e43Z3sjz45rkLfqPgE9iOeoR2LtpzavLKxtXRMi7uhK35lPSHiXgG', '2025-02-18 06:15:23', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
