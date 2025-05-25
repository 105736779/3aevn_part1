-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2025 at 12:29 PM
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
-- Database: `jobs_list`
--

-- --------------------------------------------------------

--
-- Table structure for table `eoi`
--

CREATE TABLE `eoi` (
  `EOInumber` int(11) NOT NULL,
  `job_ref` varchar(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `street_address` varchar(40) NOT NULL,
  `suburb` varchar(40) NOT NULL,
  `state` varchar(3) NOT NULL,
  `postcode` char(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `other_skills` text DEFAULT NULL,
  `status` enum('New','Current','Final') DEFAULT 'New',
  `degree` varchar(100) DEFAULT NULL,
  `skills` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eoi`
--

INSERT INTO `eoi` (`EOInumber`, `job_ref`, `first_name`, `last_name`, `dob`, `gender`, `street_address`, `suburb`, `state`, `postcode`, `email`, `phone`, `other_skills`, `status`, `degree`, `skills`) VALUES
(1, 'AIE78', 'VIET HOANG', 'TRAN', '0000-00-00', 'Male', '79 Rowen Street, Glen Iris VIC, Australi', 'Glen Iris VIC', 'vic', '3336', '104688235@student.swin.edu.au', '0451508683', '1wsadx', 'New', 'cs', 'Java'),
(2, 'AIE78', 'VIET HOANG', 'TRAN', '0000-00-00', 'Male', '79 Rowen Street, Glen Iris VIC, Australi', 'Glen Iris VIC', 'vic', '3336', '104688235@student.swin.edu.au', '0451508683', '1wsadx', 'New', 'cs', 'Java'),
(4, 'AIE78', 'Khanh', 'Pham', '0000-00-00', 'male', '28 Avondale Avenue', 'St Albans', 'vic', '3021', '2006phamlenamkhanh@gmail.com', '0493167158', '', 'Final', '', ''),
(5, 'DSE78', 'Le Nam Khanh', 'Pham', '0000-00-00', 'male', '7 Emma St, Seddon', 'Melbourne', 'vic', '3011', '105736779@student.swin.edu', '0493167158', 'ChatGPT', 'New', 'Bachelor of Computer Science (Professional)', 'HTML'),
(6, 'DSE78', 'Khanh Nam Le', 'Pham', '0000-00-00', 'male', '28 Avondale Avenue', 'St Albans', 'vic', '3021', '2006phamlenamkhanh@gmail.com', '0493167158', 'League of Legends, Valorant, CSGO', 'New', 'Bachelor of Computer Science (Professional)', 'Python'),
(7, 'DSE78', 'Khanh Nam Le', 'Pham', '0000-00-00', 'male', '28 Avondale Avenue', 'St Albans', 'vic', '3021', '2006phamlenamkhanh@gmail.com', '0493167158', 'League of Legends, Valorant, CSGO', 'New', 'Bachelor of Computer Science (Professional)', 'Python'),
(8, 'DSE78', 'Khanh Nam Le', 'Pham', '0000-00-00', 'male', '28 Avondale Avenue', 'St Albans', 'vic', '3021', '2006phamlenamkhanh@gmail.com', '0493167158', 'League of Legends, Valorant, CSGO', 'New', 'Bachelor of Computer Science (Professional)', 'Python'),
(9, 'DSE78', 'Khanh Nam Le', 'Pham', '0000-00-00', 'male', '28 Avondale Avenue', 'St Albans', 'vic', '3021', '2006phamlenamkhanh@gmail.com', '0493167158', 'League of Legends, Valorant, CSGO', 'New', 'Bachelor of Computer Science (Professional)', 'Python'),
(10, 'DSE78', 'Khanh Nam Le', 'Pham', '0000-00-00', 'male', '28 Avondale Avenue', 'St Albans', 'vic', '3021', '2006phamlenamkhanh@gmail.com', '0493167158', 'League of Legends, Valorant, CSGO', 'New', 'Bachelor of Computer Science (Professional)', 'Python'),
(11, 'DSE78', 'Khanh Nam Le', 'Pham', '0000-00-00', 'male', '28 Avondale Avenue', 'St Albans', 'vic', '3021', '2006phamlenamkhanh@gmail.com', '0493167158', 'League of Legends, Valorant, CSGO', 'New', 'Bachelor of Computer Science (Professional)', 'Python'),
(12, 'DSE78', 'Khanh Nam Le', 'Pham', '0000-00-00', 'male', '28 Avondale Avenue', 'St Albans', 'vic', '3021', '2006phamlenamkhanh@gmail.com', '0493167158', 'League of Legends, Valorant, CSGO', 'New', 'Bachelor of Computer Science (Professional)', 'Python'),
(13, 'DSE78', 'Khanh Nam Le', 'Pham', '0000-00-00', 'male', '28 Avondale Avenue', 'St Albans', 'vic', '3021', '2006phamlenamkhanh@gmail.com', '0493167158', 'League of Legends, Valorant, CSGO', 'New', 'Bachelor of Computer Science (Professional)', 'Python'),
(14, 'DSE78', 'Khanh Nam Le', 'Pham', '0000-00-00', 'male', '28 Avondale Avenue', 'St Albans', 'vic', '3021', '2006phamlenamkhanh@gmail.com', '0493167158', 'League of Legends, Valorant, CSGO', 'New', 'Bachelor of Computer Science (Professional)', 'Python'),
(15, 'DSE78', 'Khanh Nam Le', 'Pham', '0000-00-00', 'male', '28 Avondale Avenue', 'St Albans', 'vic', '3021', '2006phamlenamkhanh@gmail.com', '0493167158', 'League of Legends, Valorant, CSGO', 'New', 'Bachelor of Computer Science (Professional)', 'Python'),
(16, 'DSE78', 'Khanh Nam Le', 'Pham', '0000-00-00', 'male', '28 Avondale Avenue', 'St Albans', 'vic', '3021', '2006phamlenamkhanh@gmail.com', '0493167158', 'League of Legends, Valorant, CSGO', 'New', 'Bachelor of Computer Science (Professional)', 'Python');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `job_reference` varchar(11) DEFAULT NULL,
  `job_overview` text NOT NULL,
  `key_responsibility` text NOT NULL,
  `essential_skill` text NOT NULL,
  `preferable_skill` text NOT NULL,
  `salary` varchar(100) NOT NULL,
  `ReportsTo` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `job_title`, `type`, `job_reference`, `job_overview`, `key_responsibility`, `essential_skill`, `preferable_skill`, `salary`, `ReportsTo`, `created_at`) VALUES
(1, 'AI/ML Engineer ', 'Remote', 'AIE78', 'We are seeking a highly motivated and skilled AI Developer to join our growing team and play a crucial role in revolutionizing our customer service SaaS platform with cutting-edge artificial intelligence. ', 'AI Model Development & Integration: Design, develop, and integrate AI models, primarily utilizing GPT into our core SaaS platform.| Data Management & Analysis: Work with large datasets related to customer interactions, product information, and retail transactions.', 'Proven AI Experience: Demonstrated experience in developing and deploying AI solutions.| Bachelor\'s Degree: Bachelor\'s degree in Computer Science, Artificial Intelligence.', 'Experience with any of the major cloud platforms (AWS, Azure, GCP).|Experience with SPARQL or Gremlin query languages for Graph Databases.', '$120,000', 'Lead AI Architect', '2025-05-07 10:46:46'),
(2, 'Data Scientist', 'Remote', 'DSE78', 'As a Junior Data Scientist at Aevina, you will be challenged to understand client problems and formulate exacting solutions as part of a professional technical team.', 'Use your critical thinking and analysis skills to continuously improve our unique Consumer Data. | Develop a strong practical understanding of AWS tools and operations. | Work with clients to understand their business objectives and provide analytical solutions to meet their needs using our geoTribes Platform.', 'Degree with a strong quantification in a primary discipline such as: statistics, engineering, actuarial studies, or computer science. | Strong understanding of statistics concepts and their application to world problems is essential.', 'Experience in data engineering, AWS, GIS software, or analysis would be an advantage. | Experience working with Hadoop-based systems to achieve analytic outcomes ', '$150,000', 'Lead Data Scientist', '2025-05-07 10:46:46');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `username`, `password`, `created_at`) VALUES
(1, 'Khanh', 'Pham', '2006phamlenamkhanh@gmail.com', '0493167158', 'namkhanh1410', '$2y$10$IuwApixTMS/C7oeFdIELxOwzpYpje7uEfBGfiYWjTL.QuXd.27bOK', '2025-05-13 09:12:11'),
(2, 'Le Nam Khanh', 'Pham', '105736779@student.swin.edu.au', '0493167158', '105736779', '$2y$10$o5hUsMhOYweVDAl5qaZmJO2vZpnUz7yrKgVY9LKtCgocnRcg9n9x2', '2025-05-13 14:20:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`EOInumber`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
