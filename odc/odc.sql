-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2023 at 12:43 AM
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
-- Database: `odc`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT 'N/A',
  `birthday` varchar(50) NOT NULL DEFAULT 'N/A',
  `website` varchar(50) NOT NULL DEFAULT 'N/A',
  `phone` varchar(50) NOT NULL DEFAULT 'N/A',
  `city` varchar(50) NOT NULL DEFAULT 'N/A',
  `age` varchar(11) NOT NULL DEFAULT 'N/A',
  `degree` varchar(50) NOT NULL DEFAULT 'N/A',
  `email` varchar(50) NOT NULL DEFAULT 'N/A',
  `freelance` varchar(50) NOT NULL DEFAULT 'N/A',
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `birthday`, `website`, `phone`, `city`, `age`, `degree`, `email`, `freelance`, `userId`) VALUES
(1, 'Full-stack web developer', '1996-11-04', 'https://ibrahim-mohamedh.github.io/IbrahimMohamed/', '01096199918', 'Giza', '26', 'Bachelor Degree', 'ibrahim20.mohamed@gmail.com', 'Available', 8);

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`id`, `description`) VALUES
(1, 'Access all project'),
(2, 'vendor');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'fake.png',
  `rule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `image`, `rule`) VALUES
(8, 'Ibrahim', 'mhmd.hema@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '1680268590wizarding-world-portrait.png', 1),
(10, 'Rania', 'raniaibrahim1112001@gmail.com', '105663eecc67afd49bc64c4a5683f17d32d5b48d', '16803873032023-04-01 23_38_11-Untitled - Paint1.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT 'N/A',
  `starting_date` varchar(50) NOT NULL DEFAULT 'N/A',
  `ending_date` varchar(50) NOT NULL DEFAULT 'N/A',
  `address` varchar(50) NOT NULL DEFAULT 'N/A',
  `description` text NOT NULL DEFAULT 'N/A',
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `title`, `starting_date`, `ending_date`, `address`, `description`, `userId`) VALUES
(1, 'MASTER OF FINE ARTS & GRAPHIC DESIGN', '2015', '2016', 'Rochester Institute of Technology, Rochester, NY', 'NEW Qui deserunt veniam. Et sed aliquam labore tempore sed quisquam iusto autem sit. Ea vero voluptatum qui ut dignissimos deleniti nerada porti sand markend', 8);

-- --------------------------------------------------------

--
-- Table structure for table `estateagency`
--

CREATE TABLE `estateagency` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estateagency`
--

INSERT INTO `estateagency` (`id`, `address`, `image`, `price`) VALUES
(1, 'Reno California', '1680274025post-7.jpg', '12.00'),
(2, 'Nevada', '1680274102post-6.jpg', '46.00'),
(3, 'Shobra', '1680277186property-2.jpg', '100.00');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL DEFAULT 'N/A',
  `starting_date` varchar(50) NOT NULL DEFAULT 'N/A',
  `ending_date` varchar(50) NOT NULL DEFAULT 'N/A',
  `address` varchar(50) NOT NULL DEFAULT 'N/A',
  `description` text NOT NULL DEFAULT 'N/A',
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `title`, `starting_date`, `ending_date`, `address`, `description`, `userId`) VALUES
(1, 'SENIOR GRAPHIC DESIGN SPECIALIST', '2019', '2023', 'Experion, New York, NY', '-Lead in the design, development, and implementation of the graphic, layout, and production communication materials\n-Delegate tasks to the 7 members of the design team and provide counsel on all aspects of the project.\n-Supervise the assessment of all graphic materials in order to ensure quality and accuracy of the design\n- Oversee the efficient use of production project budgets ranging from $2,000 - $25,000', 8);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `html` varchar(11) NOT NULL,
  `css` varchar(11) NOT NULL,
  `javascript` varchar(11) NOT NULL,
  `php` varchar(11) NOT NULL,
  `Angular` varchar(11) NOT NULL,
  `Photoshop` varchar(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `html`, `css`, `javascript`, `php`, `Angular`, `Photoshop`, `userId`) VALUES
(2, '84', '85', '73', '65', '28', '28', 8);

-- --------------------------------------------------------

--
-- Table structure for table `summary`
--

CREATE TABLE `summary` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `summary`
--

INSERT INTO `summary` (`id`, `description`, `address`, `phone`, `email`, `userId`) VALUES
(2, 'Innovative and deadline-driven Graphic Designer with 3+ years of experience designing and developing user-centered digital/print marketing material from initial concept to final, polished deliverable.', 'Portland par 127,Orlando, FL', '(123) 456-7891', 'alice.barkley@example.com', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `rule` (`rule`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `estateagency`
--
ALTER TABLE `estateagency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`) USING BTREE;

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `summary`
--
ALTER TABLE `summary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `estateagency`
--
ALTER TABLE `estateagency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `summary`
--
ALTER TABLE `summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about`
--
ALTER TABLE `about`
  ADD CONSTRAINT `about_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `admin` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`rule`) REFERENCES `access` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `admin` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `experience_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `admin` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `admin` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `summary`
--
ALTER TABLE `summary`
  ADD CONSTRAINT `summary_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `admin` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
