-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2025 at 05:30 PM
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
-- Database: `cmpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `description`, `last_updated`) VALUES
(4, 'Mission', 'Welcome to sneh kunj  girls campus, where tradition meets innovation and excellence is the standard. Our institution is a vibrant community of scholars, researchers, and professionals dedicated to creating a transformative educational experience for students from all walks of life.\r\nAt sneh kunj girls campus, our mission is to provide a rigorous academic environment that fosters critical thinking, creativity, and ethical leadership. We are committed to preparing our students for the challenges of a rapidly changing world by offering a curriculum that integrates theoretical knowledge with practical application.', '2025-01-06 16:34:41'),
(5, 'Mission', 'Welcome to sneh kunj  girls campus, where tradition meets innovation and excellence is the standard. Our institution is a vibrant community of scholars, researchers, and professionals dedicated to creating a transformative educational experience for students from all walks of life.\r\nAt sneh kunj girls campus, our mission is to provide a rigorous academic environment that fosters critical thinking, creativity, and ethical leadership. We are committed to preparing our students for the challenges of a rapidly changing world by offering a curriculum that integrates theoretical knowledge with practical application.', '2025-01-06 17:33:19'),
(6, 'title', 'sneha', '2025-01-06 17:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`id`, `title`, `description`, `image`, `date`) VALUES
(1, 'National Science Fair Winner', 'Our girls presented an innovative eco-friendly project and secured the first position.', 'a1.jpg', '2024-01-20'),
(2, 'State Level Basketball Champions', 'The girls basketball team won the state-level championship with outstanding performance.', 'a2.jpg', '2023-12-15'),
(3, 'International Math Olympiad Gold', 'A proud moment as our student topped the International Math Olympiad.', 'a3.jpg', '2023-11-30'),
(4, 'District Art Competition Winner', 'Our talented girls secured top positions in the district-level art contest.', 'a4.jpeg', '2023-10-22'),
(5, 'Best Girls School Award', 'Honored as the Best Girls School of 2023 by the State Education Board.', 'a5.jpeg', '2023-09-10'),
(6, 'Robotics Champions', 'Girls showcased tech talent and secured 2nd place in the inter-school robotics event.', 'a6.jpeg', '2023-08-05'),
(7, 'Clean and Green Campus Award', 'Recognized for our students\' efforts in sustainability and cleanliness.', 'a7.png', '2023-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`, `email`) VALUES
(1, 'sneha', '$2y$10$ilNqL4cgd0K3gDGSOzW5xeRZ6P51bwv1obMWPQ5IbBFwNH8/34xhG', 'Sneha Vaghasiya', 'snehavaghasiya016@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` int(11) NOT NULL,
  `bus_number` varchar(50) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `pickup_points` varchar(255) DEFAULT NULL,
  `timings` varchar(100) DEFAULT NULL,
  `fees` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `bus_number`, `route`, `pickup_points`, `timings`, `fees`) VALUES
(1, '12', 'Sarthana', 'Varj chok', '6:30 AM - 7:20 AM', 12000.00),
(2, '13', 'Punagam', 'Sitanager', '6:20 AM - 7:20 AM', 15000.00),
(3, '1', 'Adajan to SGC', 'Adajan Gam, Pal RTO, SGC', '7:00 AM - 8:00 AM', 21000.00),
(4, '2', 'Katargam to SGC', 'Katargam Darwaja, SGC', '6:30 AM - 7:30 AM', 22000.00),
(5, '3', 'Varachha to SGC', 'Yogi Chowk, Sarthana , SGC', '8:00 AM - 9:00 AM', 23000.00),
(6, '4', 'Piplod to SGC', 'VR Mall, Gaurav Path, SGC', '7:15 AM - 8:15 AM', 21000.00),
(7, '5', 'Athwa to SGC', 'Athwa Gate, Parle Point, SGC', '7:45 AM - 8:45 AM', 24000.00),
(8, '6', 'Pal to SGC', 'Pal RTO, L.P. Savani, SGC', '6:50 AM - 7:50 AM', 25000.00),
(9, '7', 'Bhestan to SGC', 'Bhestan Station, Udhna Darwaja, SGC', '6:00 AM - 7:00 AM', 26000.00),
(10, '8', 'Dindoli to SGC', 'Dindoli Road, Parvat Patiya, SGC', '7:30 AM - 8:30 AM', 27000.00),
(11, '9', 'Kosad to SGC', 'Kosad Gam, Kapodra, SGC', '6:40 AM - 7:40 AM', 28000.00),
(12, '10', 'Udhna to SGC', 'Udhna Darwaja, Sahara Darwaja, SGC', '7:20 AM - 8:20 AM', 29000.00),
(13, '11', 'Puna Gam to SGC', 'Puna Canal, Yogi Chowk, SGC', '8:00 AM - 9:00 AM', 21000.00),
(14, '21', 'Ghod Dod Road to SGC', 'Rangila Park, City Light, SGC', '6:20 AM - 7:20 AM', 22000.00),
(15, '22', 'Sachin to SGC', 'Sachin GIDC, Bhestan, SGC', '7:10 AM - 8:10 AM', 23000.00),
(16, '14', 'Amroli to SGC', 'Amroli Char Rasta, Sarthana, SGC', '6:30 AM - 7:30 AM', 24000.00),
(17, '15', 'Jahangirpura to SGC', 'Jahangirpura, Palanpur, SGC', '7:50 AM - 8:50 AM', 25000.00),
(18, '16', 'Althan to SGC', 'Althan Ten Road, VIP Road, SGC', '6:10 AM - 7:10 AM', 26000.00),
(19, '17', 'Bamroli to SGC', 'Bamroli Road, Limbayat, SGC', '8:30 AM - 9:30 AM', 27000.00),
(20, '18', 'Kharwarnagar to SGC', 'Kharwarnagar, Katargam, SGC', '7:40 AM - 8:40 AM', 28000.00),
(21, '19', 'Parvat Patiya to SGC', 'Parvat Patiya, Hirabaug, SGC', '6:50 AM - 7:50 AM', 29000.00),
(22, '20', 'Kapodra to SGC', 'Kapodra Circle, Varachha Main Road, SGC', '7:30 AM - 8:30 AM', 30000.00);

-- --------------------------------------------------------

--
-- Table structure for table `cattendance`
--

CREATE TABLE `cattendance` (
  `id` int(11) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `status` enum('Present','Absent') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cattendance`
--

INSERT INTO `cattendance` (`id`, `student_id`, `date`, `status`) VALUES
(1, 'STU2871', '2025-02-20', 'Present'),
(3, 'STU2871', '2025-02-20', 'Present'),
(5, 'STU2871', '2025-02-20', 'Absent'),
(6, 'STU1001', '2025-02-20', 'Present'),
(7, 'STU1002', '2025-02-20', 'Present'),
(8, 'STU1003', '2025-02-20', 'Present'),
(9, 'STU1004', '2025-02-20', 'Present'),
(10, 'STU1005', '2025-02-20', 'Present'),
(11, 'STU1006', '2025-02-20', 'Present'),
(12, 'STU1007', '2025-02-20', 'Present'),
(13, 'STU1008', '2025-02-20', 'Present'),
(14, 'STU1009', '2025-02-20', 'Present'),
(15, 'STU1010', '2025-02-20', 'Present'),
(16, 'STU1011', '2025-02-20', 'Present'),
(17, 'STU1012', '2025-02-20', 'Present'),
(18, 'STU1013', '2025-02-20', 'Present'),
(19, 'STU1014', '2025-02-20', 'Present'),
(20, 'STU1015', '2025-02-20', 'Present'),
(21, 'STU1016', '2025-02-20', 'Present'),
(22, 'STU1017', '2025-02-20', 'Present'),
(23, 'STU1018', '2025-02-20', 'Present'),
(24, 'STU1019', '2025-02-20', 'Present'),
(25, 'STU1020', '2025-02-20', 'Present'),
(26, 'STU3001', '2025-02-20', 'Present'),
(27, 'STU3002', '2025-02-20', 'Present'),
(28, 'STU3003', '2025-02-20', 'Present'),
(29, 'STU3004', '2025-02-20', 'Present'),
(30, 'STU3005', '2025-02-20', 'Present'),
(31, 'STU3006', '2025-02-20', 'Present'),
(32, 'STU3007', '2025-02-20', 'Present'),
(33, 'STU3008', '2025-02-20', 'Present'),
(34, 'STU3009', '2025-02-20', 'Present'),
(35, 'STU3010', '2025-02-20', 'Present'),
(36, 'STU2001', '2025-02-20', 'Present'),
(37, 'STU2002', '2025-02-20', 'Present'),
(38, 'STU2003', '2025-02-20', 'Present'),
(39, 'STU2004', '2025-02-20', 'Present'),
(40, 'STU2005', '2025-02-20', 'Present'),
(41, 'STU2006', '2025-02-20', 'Present'),
(42, 'STU2007', '2025-02-20', 'Present'),
(43, 'STU2008', '2025-02-20', 'Present'),
(44, 'STU2009', '2025-02-20', 'Present'),
(45, 'STU4001', '2025-02-20', 'Present'),
(46, 'STU4002', '2025-02-20', 'Present'),
(47, 'STU4003', '2025-02-20', 'Present'),
(48, 'STU4004', '2025-02-20', 'Present'),
(49, 'STU4005', '2025-02-20', 'Present'),
(50, 'STU4006', '2025-02-20', 'Present'),
(51, 'STU4007', '2025-02-20', 'Present'),
(52, 'STU4008', '2025-02-20', 'Present'),
(53, 'STU4009', '2025-02-20', 'Present'),
(54, 'STU2871', '2025-03-10', 'Absent'),
(55, 'STU1001', '2025-03-10', 'Present'),
(56, 'STU1002', '2025-03-10', 'Present'),
(57, 'STU1003', '2025-03-10', 'Present'),
(58, 'STU1004', '2025-03-10', 'Present'),
(59, 'STU1005', '2025-03-10', 'Present'),
(60, 'STU1006', '2025-03-10', 'Present'),
(61, 'STU1007', '2025-03-10', 'Present'),
(62, 'STU1008', '2025-03-10', 'Present'),
(63, 'STU1009', '2025-03-10', 'Present'),
(64, 'STU1010', '2025-03-10', 'Present'),
(65, 'STU1011', '2025-03-10', 'Present'),
(66, 'STU1012', '2025-03-10', 'Present'),
(67, 'STU1013', '2025-03-10', 'Present'),
(68, 'STU1014', '2025-03-10', 'Present'),
(69, 'STU1015', '2025-03-10', 'Present'),
(70, 'STU1016', '2025-03-10', 'Present'),
(71, 'STU1017', '2025-03-10', 'Present'),
(72, 'STU1018', '2025-03-10', 'Present'),
(73, 'STU1019', '2025-03-10', 'Present'),
(74, 'STU1020', '2025-03-10', 'Present'),
(75, 'STU8246', '2025-03-10', 'Present'),
(76, 'STU2871', '2025-03-14', 'Absent'),
(77, 'STU1001', '2025-03-14', 'Present'),
(78, 'STU1002', '2025-03-14', 'Present'),
(79, 'STU1003', '2025-03-14', 'Present'),
(80, 'STU1004', '2025-03-14', 'Present'),
(81, 'STU1005', '2025-03-14', 'Present'),
(82, 'STU1006', '2025-03-14', 'Present'),
(83, 'STU1007', '2025-03-14', 'Present'),
(84, 'STU1008', '2025-03-14', 'Present'),
(85, 'STU1009', '2025-03-14', 'Present'),
(86, 'STU1010', '2025-03-14', 'Present'),
(87, 'STU1011', '2025-03-14', 'Present'),
(88, 'STU1012', '2025-03-14', 'Present'),
(89, 'STU1013', '2025-03-14', 'Present'),
(90, 'STU1014', '2025-03-14', 'Present'),
(91, 'STU1015', '2025-03-14', 'Present'),
(92, 'STU1016', '2025-03-14', 'Present'),
(93, 'STU1017', '2025-03-14', 'Present'),
(94, 'STU1018', '2025-03-14', 'Present'),
(95, 'STU1019', '2025-03-14', 'Present'),
(96, 'STU1020', '2025-03-14', 'Present'),
(97, 'STU8246', '2025-03-14', 'Present'),
(98, 'STU4001', '2025-04-11', 'Present'),
(99, 'STU4002', '2025-04-11', 'Present'),
(100, 'STU4003', '2025-04-11', 'Present'),
(101, 'STU4004', '2025-04-11', 'Present'),
(102, 'STU4005', '2025-04-11', 'Present'),
(103, 'STU4006', '2025-04-11', 'Present'),
(104, 'STU4007', '2025-04-11', 'Present'),
(105, 'STU4008', '2025-04-11', 'Present'),
(106, 'STU4009', '2025-04-11', 'Present'),
(107, 'STU2517', '2025-04-11', 'Absent');

-- --------------------------------------------------------

--
-- Table structure for table `ccourses`
--

CREATE TABLE `ccourses` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `duration` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ccourses`
--

INSERT INTO `ccourses` (`id`, `name`, `semester`, `description`, `duration`) VALUES
(1, 'BCA', 'Semester 1', 'Introduction to Computers', '6 Months'),
(2, 'BCA', 'Semester 2', 'Programming in C', '6 Months'),
(3, 'BCA', 'Semester 3', 'Data Structures', '6 Months'),
(4, 'BCA', 'Semester 4', 'Database Management Systems', '6 Months'),
(5, 'BCA', 'Semester 5', 'Web Development', '6 Months'),
(6, 'BCA', 'Semester 6', 'Project Work', '6 Months'),
(7, 'BCom', 'Semester 1', 'Financial Accounting', '6 Months'),
(8, 'BCom', 'Semester 2', 'Business Law', '6 Months'),
(9, 'BCom', 'Semester 3', 'Corporate Accounting', '6 Months'),
(10, 'BCom', 'Semester 4', 'Cost Accounting', '6 Months'),
(11, 'BCom', 'Semester 5', 'Auditing and Taxation', '6 Months'),
(12, 'BCom', 'Semester 6', 'Management Accounting', '6 Months'),
(13, 'BBA', 'Semester 1', 'Principles of Management', '6 Months'),
(14, 'BBA', 'Semester 2', 'Business Communication', '6 Months'),
(15, 'BBA', 'Semester 3', 'Human Resource Management', '6 Months'),
(16, 'BBA', 'Semester 4', 'Marketing Management', '6 Months'),
(17, 'BBA', 'Semester 5', 'Financial Management', '6 Months'),
(18, 'BBA', 'Semester 6', 'Strategic Management', '6 Months'),
(19, 'MSc IT', 'Semester 1', 'Advanced Programming', '6 Months'),
(20, 'MSc IT', 'Semester 2', 'Data Analytics', '6 Months'),
(21, 'MSc IT', 'Semester 3', 'Cloud Computing', '6 Months'),
(22, 'MSc IT', 'Semester 4', 'Research Project', '6 Months');

-- --------------------------------------------------------

--
-- Table structure for table `cexam_schedule`
--

CREATE TABLE `cexam_schedule` (
  `id` int(11) NOT NULL,
  `course` varchar(50) NOT NULL,
  `semester` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `exam_date` date NOT NULL,
  `exam_time` time NOT NULL,
  `venue` varchar(100) NOT NULL,
  `supervisor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cexam_schedule`
--

INSERT INTO `cexam_schedule` (`id`, `course`, `semester`, `subject`, `exam_date`, `exam_time`, `venue`, `supervisor_id`) VALUES
(1, 'BCom', 2, 'Financial Accounting', '2025-04-05', '10:00:00', 'Room A', 1),
(2, 'BCom', 2, 'Business Economics', '2025-04-07', '12:00:00', 'Room B', 2),
(3, 'BCom', 2, 'Corporate Law', '2025-04-09', '09:00:00', 'Room C', 3),
(4, 'BCom', 2, 'Cost Accounting', '2025-04-11', '14:00:00', 'Room D', 4),
(5, 'BCom', 2, 'Taxation', '2025-04-13', '11:30:00', 'Room E', 5),
(6, 'BCom', 2, 'Marketing Strategy', '2025-04-15', '09:30:00', 'Room F', 6),
(7, 'BCom', 2, 'Investment Analysis', '2025-04-17', '13:00:00', 'Room G', 7),
(8, 'BBA', 2, 'Principles of Management', '2025-04-06', '10:00:00', 'Room H', 8),
(9, 'BBA', 2, 'Business Communication', '2025-04-08', '12:30:00', 'Room I', 9),
(10, 'BBA', 2, 'Financial Accounting', '2025-04-10', '09:30:00', 'Room J', 10),
(11, 'BBA', 2, 'Business Mathematics', '2025-04-12', '14:30:00', 'Room K', 11),
(12, 'BBA', 2, 'Marketing Management', '2025-04-14', '11:00:00', 'Room L', 12),
(13, 'BBA', 2, 'Organizational Behavior', '2025-04-16', '09:00:00', 'Room M', 13),
(14, 'BCA', 2, 'Data Structures', '2025-04-06', '10:30:00', 'Room N', 14),
(15, 'BCA', 2, 'Database Management', '2025-04-08', '13:00:00', 'Room O', 15),
(16, 'BCA', 2, 'Operating Systems', '2025-04-10', '09:00:00', 'Room P', 16),
(17, 'BCA', 2, 'Networking Concepts', '2025-04-12', '14:00:00', 'Room Q', 17),
(18, 'BCA', 2, 'Web Technologies', '2025-04-14', '11:30:00', 'Room R', 18),
(19, 'MSc IT', 2, 'Machine Learning', '2025-04-07', '10:30:00', 'Room S', 19),
(20, 'MSc IT', 2, 'Advanced Algorithms', '2025-04-09', '13:30:00', 'Room T', 20),
(21, 'MSc IT', 2, 'Cyber Security', '2025-04-11', '09:30:00', 'Room U', 21),
(22, 'MSc IT', 2, 'Data Mining', '2025-04-13', '14:30:00', 'Room V', 22),
(23, 'BCom', 4, 'Corporate Finance', '2025-05-05', '10:00:00', 'Room A', 23),
(24, 'BCom', 4, 'Business Statistics', '2025-05-07', '12:00:00', 'Room B', 24),
(25, 'BCom', 4, 'E-Commerce', '2025-05-09', '09:30:00', 'Room C', 25),
(26, 'BCom', 4, 'International Trade', '2025-05-11', '14:00:00', 'Room D', 1),
(27, 'BCom', 4, 'Consumer Behavior', '2025-05-13', '11:30:00', 'Room E', 2),
(28, 'BCom', 4, 'Banking & Insurance', '2025-05-15', '09:00:00', 'Room F', 3),
(29, 'BCom', 4, 'Strategic Management', '2025-05-17', '13:00:00', 'Room G', 4),
(30, 'BBA', 4, 'Human Resource Management', '2025-05-06', '10:00:00', 'Room H', 5),
(31, 'BBA', 4, 'Business Law', '2025-05-08', '12:30:00', 'Room I', 6),
(32, 'BBA', 4, 'Operations Research', '2025-05-10', '09:30:00', 'Room J', 7),
(33, 'BBA', 4, 'Sales & Distribution', '2025-05-12', '14:30:00', 'Room K', 8),
(34, 'BBA', 4, 'International Business', '2025-05-14', '11:00:00', 'Room L', 9),
(35, 'BBA', 4, 'Leadership & Ethics', '2025-05-16', '09:00:00', 'Room M', 10),
(36, 'BCA', 4, 'Software Engineering', '2025-05-06', '10:30:00', 'Room N', 11),
(37, 'BCA', 4, 'Web Development', '2025-05-08', '13:00:00', 'Room O', 12),
(38, 'BCA', 4, 'Mobile Computing', '2025-05-10', '09:00:00', 'Room P', 13),
(39, 'BCA', 4, 'Artificial Intelligence', '2025-05-12', '14:00:00', 'Room Q', 14),
(40, 'BCA', 4, 'Cloud Computing', '2025-05-14', '11:30:00', 'Room R', 15),
(41, 'MSc IT', 4, 'Big Data Analytics', '2025-05-07', '10:30:00', 'Room S', 16),
(42, 'MSc IT', 4, 'IOT Security', '2025-05-09', '13:30:00', 'Room T', 17),
(43, 'MSc IT', 4, 'Blockchain Technology', '2025-05-11', '09:30:00', 'Room U', 18),
(44, 'MSc IT', 4, 'Data Visualization', '2025-05-13', '14:30:00', 'Room V', 19);

-- --------------------------------------------------------

--
-- Table structure for table `cgallery`
--

CREATE TABLE `cgallery` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cgallery`
--

INSERT INTO `cgallery` (`id`, `image`, `category`, `description`) VALUES
(1, 'image/WhatsApp Image 2025-02-18 at 11.25.05 AM.jpeg', 'Janmashtami', 'kana'),
(2, 'image/WhatsApp Image 2025-02-18 at 11.51.14 AM.jpeg', 'Seminar', 'seminar'),
(3, 'image/WhatsApp Image 2025-02-18 at 11.49.04 AM.jpeg', 'Day Celebration', 'hair style'),
(4, 'image/WhatsApp Image 2025-02-18 at 11.51.11 AM.jpeg', 'Tour', 'tour'),
(5, 'image/SEMINAR1.jpg', 'Seminar', 'SEMINAR'),
(6, 'image/SEMINAR3.jpg', 'Seminar', 'SEMINAR'),
(7, 'image/NAVRATRI5.jpg', 'Navratri', 'NAVRATRI'),
(8, 'image/NAVRATRI3.jpg', 'Navratri', 'NAVRATRI'),
(9, 'image/NAVRATRI2.jpg', 'Navratri', 'NAVRATRI'),
(10, 'image/WhatsApp Image 2025-02-18 at 11.48.22 AM.jpeg', 'Ganesh Chaturthi', 'GANESHA'),
(11, 'image/YOGA2.jpeg', 'Yoga', 'YOGA'),
(12, 'image/YOGA3.jpg', 'Yoga', 'YOGA'),
(13, 'image/YOGA1.jpeg', 'Yoga', 'YOGA'),
(14, 'image/WhatsApp Image 2025-02-18 at 11.51.12 AM.jpeg', 'Tour', 'TOUR'),
(15, 'image/WhatsApp Image 2025-02-18 at 11.51.12 AM (2).jpeg', 'Tour', 'TOUR');

-- --------------------------------------------------------

--
-- Table structure for table `change_requests`
--

CREATE TABLE `change_requests` (
  `id` int(11) NOT NULL,
  `staff_name` varchar(100) DEFAULT NULL,
  `requested_change` text DEFAULT NULL,
  `status` enum('Pending','Approved','Rejected') DEFAULT 'Pending',
  `request_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `change_requests`
--

INSERT INTO `change_requests` (`id`, `staff_name`, `requested_change`, `status`, `request_date`) VALUES
(1, 'sneha', 'modat first not secdule', 'Pending', '2025-01-30 07:19:55');

-- --------------------------------------------------------

--
-- Table structure for table `class_timetables`
--

CREATE TABLE `class_timetables` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `standard` varchar(50) NOT NULL,
  `day` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `subject` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_timetables`
--

INSERT INTO `class_timetables` (`id`, `teacher_id`, `standard`, `day`, `start_time`, `end_time`, `subject`) VALUES
(54, 9, '1', 'Monday', '09:00:00', '09:40:00', 'Math'),
(55, 10, '1', 'Monday', '09:45:00', '10:25:00', 'English'),
(56, 11, '1', 'Monday', '10:30:00', '11:10:00', 'Drawing'),
(57, 9, '1', 'Tuesday', '09:00:00', '09:40:00', 'Math'),
(58, 12, '1', 'Tuesday', '09:45:00', '10:25:00', 'Gujarati'),
(59, 11, '1', 'Tuesday', '10:30:00', '11:10:00', 'Craft'),
(60, 10, '1', 'Wednesday', '09:00:00', '09:40:00', 'English'),
(61, 9, '1', 'Wednesday', '09:45:00', '10:25:00', 'Math'),
(62, 11, '1', 'Wednesday', '10:30:00', '11:10:00', 'Drawing'),
(63, 12, '1', 'Thursday', '09:00:00', '09:40:00', 'Gujarati'),
(64, 10, '1', 'Thursday', '09:45:00', '10:25:00', 'English'),
(65, 13, '1', 'Thursday', '10:30:00', '11:10:00', 'Music'),
(66, 9, '1', 'Friday', '09:00:00', '09:40:00', 'Math'),
(67, 11, '1', 'Friday', '09:45:00', '10:25:00', 'Craft'),
(68, 12, '1', 'Friday', '10:30:00', '11:10:00', 'Gujarati'),
(69, 10, '1', 'Saturday', '09:00:00', '09:40:00', 'English'),
(70, 11, '1', 'Saturday', '09:45:00', '10:25:00', 'Drawing'),
(71, 9, '1', 'Saturday', '10:30:00', '11:10:00', 'Math'),
(90, 9, '2', 'Monday', '09:00:00', '09:40:00', 'Science'),
(91, 10, '2', 'Monday', '09:45:00', '10:25:00', 'English'),
(92, 11, '2', 'Monday', '10:30:00', '11:10:00', 'Computer'),
(93, 9, '2', 'Tuesday', '09:00:00', '09:40:00', 'Science'),
(94, 12, '2', 'Tuesday', '09:45:00', '10:25:00', 'Social Studies'),
(95, 11, '2', 'Tuesday', '10:30:00', '11:10:00', 'Computer'),
(96, 10, '2', 'Wednesday', '09:00:00', '09:40:00', 'English'),
(97, 9, '2', 'Wednesday', '09:45:00', '10:25:00', 'Science'),
(98, 11, '2', 'Wednesday', '10:30:00', '11:10:00', 'Math'),
(99, 12, '2', 'Thursday', '09:00:00', '09:40:00', 'Social Studies'),
(100, 10, '2', 'Thursday', '09:45:00', '10:25:00', 'English'),
(101, 13, '2', 'Thursday', '10:30:00', '11:10:00', 'Drawing'),
(102, 9, '2', 'Friday', '09:00:00', '09:40:00', 'Science'),
(103, 11, '2', 'Friday', '09:45:00', '10:25:00', 'Math'),
(104, 12, '2', 'Friday', '10:30:00', '11:10:00', 'Social Studies'),
(105, 10, '2', 'Saturday', '09:00:00', '09:40:00', 'English'),
(106, 11, '2', 'Saturday', '09:45:00', '10:25:00', 'Computer'),
(107, 9, '2', 'Saturday', '10:30:00', '11:10:00', 'Science'),
(108, 9, '3', 'Monday', '09:00:00', '09:40:00', 'Math'),
(109, 10, '3', 'Monday', '09:45:00', '10:25:00', 'English'),
(110, 11, '3', 'Monday', '10:30:00', '11:10:00', 'Computer'),
(111, 12, '3', 'Tuesday', '09:00:00', '09:40:00', 'Science'),
(112, 13, '3', 'Tuesday', '09:45:00', '10:25:00', 'Social Studies'),
(113, 14, '3', 'Tuesday', '10:30:00', '11:10:00', 'Drawing'),
(114, 9, '3', 'Wednesday', '09:00:00', '09:40:00', 'Math'),
(115, 15, '3', 'Wednesday', '09:45:00', '10:25:00', 'English'),
(116, 16, '3', 'Wednesday', '10:30:00', '11:10:00', 'Craft'),
(117, 10, '3', 'Thursday', '09:00:00', '09:40:00', 'Science'),
(118, 11, '3', 'Thursday', '09:45:00', '10:25:00', 'Computer'),
(119, 12, '3', 'Thursday', '10:30:00', '11:10:00', 'English'),
(120, 13, '3', 'Friday', '09:00:00', '09:40:00', 'Social Studies'),
(121, 14, '3', 'Friday', '09:45:00', '10:25:00', 'Drawing'),
(122, 15, '3', 'Friday', '10:30:00', '11:10:00', 'Math'),
(123, 16, '3', 'Saturday', '09:00:00', '09:40:00', 'Craft'),
(124, 10, '3', 'Saturday', '09:45:00', '10:25:00', 'Science'),
(125, 11, '3', 'Saturday', '10:30:00', '11:10:00', 'Computer'),
(126, 9, '4', 'Monday', '09:00:00', '09:40:00', 'Science'),
(127, 10, '4', 'Monday', '09:45:00', '10:25:00', 'English'),
(128, 11, '4', 'Monday', '10:30:00', '11:10:00', 'Computer'),
(129, 12, '4', 'Tuesday', '09:00:00', '09:40:00', 'Math'),
(130, 13, '4', 'Tuesday', '09:45:00', '10:25:00', 'Social Studies'),
(131, 14, '4', 'Tuesday', '10:30:00', '11:10:00', 'Drawing'),
(132, 15, '4', 'Wednesday', '09:00:00', '09:40:00', 'English'),
(133, 16, '4', 'Wednesday', '09:45:00', '10:25:00', 'Craft'),
(134, 9, '4', 'Wednesday', '10:30:00', '11:10:00', 'Science'),
(135, 10, '4', 'Thursday', '09:00:00', '09:40:00', 'Computer'),
(136, 11, '4', 'Thursday', '09:45:00', '10:25:00', 'Math'),
(137, 12, '4', 'Thursday', '10:30:00', '11:10:00', 'English'),
(138, 13, '4', 'Friday', '09:00:00', '09:40:00', 'Social Studies'),
(139, 14, '4', 'Friday', '09:45:00', '10:25:00', 'Drawing'),
(140, 15, '4', 'Friday', '10:30:00', '11:10:00', 'Math'),
(141, 16, '4', 'Saturday', '09:00:00', '09:40:00', 'Craft'),
(142, 10, '4', 'Saturday', '09:45:00', '10:25:00', 'Computer'),
(143, 11, '4', 'Saturday', '10:30:00', '11:10:00', 'Science'),
(144, 9, '5', 'Monday', '09:00:00', '09:40:00', 'Science'),
(145, 10, '5', 'Monday', '09:45:00', '10:25:00', 'English'),
(146, 11, '5', 'Monday', '10:30:00', '11:10:00', 'Math'),
(147, 12, '5', 'Tuesday', '09:00:00', '09:40:00', 'Social Studies'),
(148, 13, '5', 'Tuesday', '09:45:00', '10:25:00', 'Computer'),
(149, 14, '5', 'Tuesday', '10:30:00', '11:10:00', 'Drawing'),
(150, 15, '5', 'Wednesday', '09:00:00', '09:40:00', 'English'),
(151, 16, '5', 'Wednesday', '09:45:00', '10:25:00', 'Math'),
(152, 9, '5', 'Wednesday', '10:30:00', '11:10:00', 'Science'),
(153, 10, '5', 'Thursday', '09:00:00', '09:40:00', 'Computer'),
(154, 11, '5', 'Thursday', '09:45:00', '10:25:00', 'Social Studies'),
(155, 12, '5', 'Thursday', '10:30:00', '11:10:00', 'English'),
(156, 13, '5', 'Friday', '09:00:00', '09:40:00', 'Math'),
(157, 14, '5', 'Friday', '09:45:00', '10:25:00', 'Drawing'),
(158, 15, '5', 'Friday', '10:30:00', '11:10:00', 'Science'),
(159, 16, '5', 'Saturday', '09:00:00', '09:40:00', 'Craft'),
(160, 10, '5', 'Saturday', '09:45:00', '10:25:00', 'Computer'),
(161, 11, '5', 'Saturday', '10:30:00', '11:10:00', 'English'),
(162, 17, '6', 'Monday', '09:00:00', '09:40:00', 'Science'),
(163, 18, '6', 'Monday', '09:45:00', '10:25:00', 'Mathematics'),
(164, 19, '6', 'Monday', '10:30:00', '11:10:00', 'English'),
(165, 20, '6', 'Tuesday', '09:00:00', '09:40:00', 'History'),
(166, 21, '6', 'Tuesday', '09:45:00', '10:25:00', 'Geography'),
(167, 17, '6', 'Tuesday', '10:30:00', '11:10:00', 'Science'),
(168, 18, '6', 'Wednesday', '09:00:00', '09:40:00', 'Mathematics'),
(169, 19, '6', 'Wednesday', '09:45:00', '10:25:00', 'English'),
(170, 20, '6', 'Wednesday', '10:30:00', '11:10:00', 'History'),
(171, 21, '6', 'Thursday', '09:00:00', '09:40:00', 'Geography'),
(172, 17, '6', 'Thursday', '09:45:00', '10:25:00', 'Science'),
(173, 18, '6', 'Thursday', '10:30:00', '11:10:00', 'Mathematics'),
(174, 19, '6', 'Friday', '09:00:00', '09:40:00', 'English'),
(175, 20, '6', 'Friday', '09:45:00', '10:25:00', 'History'),
(176, 21, '6', 'Friday', '10:30:00', '11:10:00', 'Geography'),
(177, 17, '6', 'Saturday', '09:00:00', '09:40:00', 'Science'),
(178, 18, '6', 'Saturday', '09:45:00', '10:25:00', 'Mathematics'),
(179, 19, '6', 'Saturday', '10:30:00', '11:10:00', 'English'),
(180, 17, '7', 'Monday', '09:00:00', '09:40:00', 'Science'),
(181, 18, '7', 'Monday', '09:45:00', '10:25:00', 'Mathematics'),
(182, 19, '7', 'Monday', '10:30:00', '11:10:00', 'English'),
(183, 20, '7', 'Tuesday', '09:00:00', '09:40:00', 'History'),
(184, 21, '7', 'Tuesday', '09:45:00', '10:25:00', 'Geography'),
(185, 17, '7', 'Tuesday', '10:30:00', '11:10:00', 'Science'),
(186, 18, '7', 'Wednesday', '09:00:00', '09:40:00', 'Mathematics'),
(187, 19, '7', 'Wednesday', '09:45:00', '10:25:00', 'English'),
(188, 20, '7', 'Wednesday', '10:30:00', '11:10:00', 'History'),
(189, 21, '7', 'Thursday', '09:00:00', '09:40:00', 'Geography'),
(190, 17, '7', 'Thursday', '09:45:00', '10:25:00', 'Science'),
(191, 18, '7', 'Thursday', '10:30:00', '11:10:00', 'Mathematics'),
(192, 19, '7', 'Friday', '09:00:00', '09:40:00', 'English'),
(193, 20, '7', 'Friday', '09:45:00', '10:25:00', 'History'),
(194, 21, '7', 'Friday', '10:30:00', '11:10:00', 'Geography'),
(195, 17, '7', 'Saturday', '09:00:00', '09:40:00', 'Science'),
(196, 18, '7', 'Saturday', '09:45:00', '10:25:00', 'Mathematics'),
(197, 19, '7', 'Saturday', '10:30:00', '11:10:00', 'English'),
(198, 17, '8', 'Monday', '09:00:00', '09:40:00', 'Science'),
(199, 18, '8', 'Monday', '09:45:00', '10:25:00', 'Mathematics'),
(200, 19, '8', 'Monday', '10:30:00', '11:10:00', 'English'),
(201, 20, '8', 'Tuesday', '09:00:00', '09:40:00', 'History'),
(202, 21, '8', 'Tuesday', '09:45:00', '10:25:00', 'Geography'),
(203, 17, '8', 'Tuesday', '10:30:00', '11:10:00', 'Science'),
(204, 18, '8', 'Wednesday', '09:00:00', '09:40:00', 'Mathematics'),
(205, 19, '8', 'Wednesday', '09:45:00', '10:25:00', 'English'),
(206, 20, '8', 'Wednesday', '10:30:00', '11:10:00', 'History'),
(207, 21, '8', 'Thursday', '09:00:00', '09:40:00', 'Geography'),
(208, 17, '8', 'Thursday', '09:45:00', '10:25:00', 'Science'),
(209, 18, '8', 'Thursday', '10:30:00', '11:10:00', 'Mathematics'),
(210, 19, '8', 'Friday', '09:00:00', '09:40:00', 'English'),
(211, 20, '8', 'Friday', '09:45:00', '10:25:00', 'History'),
(212, 21, '8', 'Friday', '10:30:00', '11:10:00', 'Geography'),
(213, 17, '8', 'Saturday', '09:00:00', '09:40:00', 'Science'),
(214, 18, '8', 'Saturday', '09:45:00', '10:25:00', 'Mathematics'),
(215, 19, '8', 'Saturday', '10:30:00', '11:10:00', 'English'),
(216, 22, '9', 'Monday', '09:00:00', '09:40:00', 'Physics'),
(217, 23, '9', 'Monday', '09:45:00', '10:25:00', 'Mathematics'),
(218, 24, '9', 'Monday', '10:30:00', '11:10:00', 'English'),
(219, 25, '9', 'Tuesday', '09:00:00', '09:40:00', 'Chemistry'),
(220, 22, '9', 'Tuesday', '09:45:00', '10:25:00', 'Physics'),
(221, 23, '9', 'Tuesday', '10:30:00', '11:10:00', 'Mathematics'),
(222, 24, '9', 'Wednesday', '09:00:00', '09:40:00', 'English'),
(223, 25, '9', 'Wednesday', '09:45:00', '10:25:00', 'Chemistry'),
(224, 22, '9', 'Wednesday', '10:30:00', '11:10:00', 'Physics'),
(225, 23, '9', 'Thursday', '09:00:00', '09:40:00', 'Mathematics'),
(226, 25, '9', 'Thursday', '09:45:00', '10:25:00', 'Chemistry'),
(227, 24, '9', 'Thursday', '10:30:00', '11:10:00', 'English'),
(228, 22, '9', 'Friday', '09:00:00', '09:40:00', 'Physics'),
(229, 23, '9', 'Friday', '09:45:00', '10:25:00', 'Mathematics'),
(230, 24, '9', 'Friday', '10:30:00', '11:10:00', 'English'),
(231, 25, '9', 'Saturday', '09:00:00', '09:40:00', 'Chemistry'),
(232, 22, '9', 'Saturday', '09:45:00', '10:25:00', 'Physics'),
(233, 23, '9', 'Saturday', '10:30:00', '11:10:00', 'Mathematics'),
(234, 22, '10', 'Monday', '09:00:00', '09:40:00', 'Physics'),
(235, 23, '10', 'Monday', '09:45:00', '10:25:00', 'Mathematics'),
(236, 24, '10', 'Monday', '10:30:00', '11:10:00', 'English'),
(237, 25, '10', 'Tuesday', '09:00:00', '09:40:00', 'Chemistry'),
(238, 22, '10', 'Tuesday', '09:45:00', '10:25:00', 'Physics'),
(239, 23, '10', 'Tuesday', '10:30:00', '11:10:00', 'Mathematics'),
(240, 24, '10', 'Wednesday', '09:00:00', '09:40:00', 'English'),
(241, 25, '10', 'Wednesday', '09:45:00', '10:25:00', 'Chemistry'),
(242, 22, '10', 'Wednesday', '10:30:00', '11:10:00', 'Physics'),
(243, 23, '10', 'Thursday', '09:00:00', '09:40:00', 'Mathematics'),
(244, 25, '10', 'Thursday', '09:45:00', '10:25:00', 'Chemistry'),
(245, 24, '10', 'Thursday', '10:30:00', '11:10:00', 'English'),
(246, 22, '10', 'Friday', '09:00:00', '09:40:00', 'Physics'),
(247, 23, '10', 'Friday', '09:45:00', '10:25:00', 'Mathematics'),
(248, 24, '10', 'Friday', '10:30:00', '11:10:00', 'English'),
(249, 25, '10', 'Saturday', '09:00:00', '09:40:00', 'Chemistry'),
(250, 22, '10', 'Saturday', '09:45:00', '10:25:00', 'Physics'),
(251, 23, '10', 'Saturday', '10:30:00', '11:10:00', 'Mathematics'),
(252, 41, '11', 'Monday', '09:00:00', '09:40:00', 'Physics'),
(253, 42, '11', 'Monday', '09:45:00', '10:25:00', 'Mathematics'),
(254, 43, '11', 'Monday', '10:30:00', '11:10:00', 'Chemistry'),
(255, 44, '11', 'Tuesday', '09:00:00', '09:40:00', 'Biology'),
(256, 41, '11', 'Tuesday', '09:45:00', '10:25:00', 'Physics'),
(257, 42, '11', 'Tuesday', '10:30:00', '11:10:00', 'Mathematics'),
(258, 43, '11', 'Wednesday', '09:00:00', '09:40:00', 'Chemistry'),
(259, 44, '11', 'Wednesday', '09:45:00', '10:25:00', 'Biology'),
(260, 41, '11', 'Wednesday', '10:30:00', '11:10:00', 'Physics'),
(261, 42, '11', 'Thursday', '09:00:00', '09:40:00', 'Mathematics'),
(262, 44, '11', 'Thursday', '09:45:00', '10:25:00', 'Biology'),
(263, 43, '11', 'Thursday', '10:30:00', '11:10:00', 'Chemistry'),
(264, 41, '11', 'Friday', '09:00:00', '09:40:00', 'Physics'),
(265, 42, '11', 'Friday', '09:45:00', '10:25:00', 'Mathematics'),
(266, 44, '11', 'Friday', '10:30:00', '11:10:00', 'Biology'),
(267, 43, '11', 'Saturday', '09:00:00', '09:40:00', 'Chemistry'),
(268, 41, '11', 'Saturday', '09:45:00', '10:25:00', 'Physics'),
(269, 42, '11', 'Saturday', '10:30:00', '11:10:00', 'Mathematics'),
(270, 41, '12', 'Monday', '09:00:00', '09:40:00', 'Physics'),
(271, 42, '12', 'Monday', '09:45:00', '10:25:00', 'Mathematics'),
(272, 43, '12', 'Monday', '10:30:00', '11:10:00', 'Chemistry'),
(273, 44, '12', 'Tuesday', '09:00:00', '09:40:00', 'Biology'),
(274, 41, '12', 'Tuesday', '09:45:00', '10:25:00', 'Physics'),
(275, 42, '12', 'Tuesday', '10:30:00', '11:10:00', 'Mathematics'),
(276, 43, '12', 'Wednesday', '09:00:00', '09:40:00', 'Chemistry'),
(277, 44, '12', 'Wednesday', '09:45:00', '10:25:00', 'Biology'),
(278, 41, '12', 'Wednesday', '10:30:00', '11:10:00', 'Physics'),
(279, 42, '12', 'Thursday', '09:00:00', '09:40:00', 'Mathematics'),
(280, 44, '12', 'Thursday', '09:45:00', '10:25:00', 'Biology'),
(281, 43, '12', 'Thursday', '10:30:00', '11:10:00', 'Chemistry'),
(282, 41, '12', 'Friday', '09:00:00', '09:40:00', 'Physics'),
(283, 42, '12', 'Friday', '09:45:00', '10:25:00', 'Mathematics'),
(284, 44, '12', 'Friday', '10:30:00', '11:10:00', 'Biology'),
(285, 43, '12', 'Saturday', '09:00:00', '09:40:00', 'Chemistry'),
(286, 41, '12', 'Saturday', '09:45:00', '10:25:00', 'Physics'),
(287, 42, '12', 'Saturday', '10:30:00', '11:10:00', 'Mathematics');

-- --------------------------------------------------------

--
-- Table structure for table `college_admin`
--

CREATE TABLE `college_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `college_admin`
--

INSERT INTO `college_admin` (`id`, `username`, `email`, `password`) VALUES
(2, 'college admin', 'admin@gmail.com', '1a145a23d6e47aadfe2063f1f951e691');

-- --------------------------------------------------------

--
-- Table structure for table `college_fees`
--

CREATE TABLE `college_fees` (
  `id` int(11) NOT NULL,
  `course` varchar(50) NOT NULL,
  `semester` int(11) NOT NULL,
  `registration_fee` decimal(10,2) NOT NULL,
  `tuition_fee` decimal(10,2) NOT NULL,
  `hostel_fee` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `college_fees`
--

INSERT INTO `college_fees` (`id`, `course`, `semester`, `registration_fee`, `tuition_fee`, `hostel_fee`) VALUES
(1, 'BCA', 1, 5000.00, 25000.00, 15000.00),
(2, 'BCA', 2, 5000.00, 25000.00, 15000.00),
(3, 'BCA', 3, 5000.00, 28000.00, 17000.00),
(4, 'BCA', 4, 5000.00, 28000.00, 17000.00),
(5, 'BCA', 5, 5000.00, 30000.00, 19000.00),
(6, 'BCA', 6, 5000.00, 30000.00, 19000.00),
(7, 'MSc IT', 1, 7000.00, 35000.00, 20000.00),
(8, 'MSc IT', 2, 7000.00, 35000.00, 20000.00),
(9, 'MSc IT', 3, 7000.00, 38000.00, 22000.00),
(10, 'MSc IT', 4, 7000.00, 38000.00, 22000.00),
(11, 'MSc IT', 5, 7000.00, 40000.00, 25000.00),
(12, 'MSc IT', 6, 7000.00, 40000.00, 25000.00),
(13, 'BCom', 1, 4000.00, 20000.00, 12000.00),
(14, 'BCom', 2, 4000.00, 20000.00, 12000.00),
(15, 'BCom', 3, 4000.00, 22000.00, 13000.00),
(16, 'BCom', 4, 4000.00, 22000.00, 13000.00),
(17, 'BCom', 5, 4000.00, 24000.00, 14000.00),
(18, 'BCom', 6, 4000.00, 24000.00, 14000.00),
(19, 'BBA', 1, 6000.00, 28000.00, 16000.00),
(20, 'BBA', 2, 6000.00, 28000.00, 16000.00),
(21, 'BBA', 3, 6000.00, 30000.00, 18000.00),
(22, 'BBA', 4, 6000.00, 30000.00, 18000.00),
(23, 'BBA', 5, 6000.00, 32000.00, 20000.00),
(24, 'BBA', 6, 6000.00, 32000.00, 20000.00);

-- --------------------------------------------------------

--
-- Table structure for table `complaint_form`
--

CREATE TABLE `complaint_form` (
  `id` int(11) NOT NULL,
  `admission_id` varchar(50) DEFAULT NULL,
  `issue_type` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `complaint_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint_form`
--

INSERT INTO `complaint_form` (`id`, `admission_id`, `issue_type`, `description`, `complaint_date`, `answer`) VALUES
(1, 'ADM8991', 'Food Issue', 'food not best', '2025-03-06 05:33:54', 'try to best make'),
(2, 'ADM8991', 'Food Issue', 'food not best', '2025-03-06 05:34:12', NULL),
(3, 'ADM8991', 'Food Issue', 'food not best', '2025-03-06 05:35:03', NULL),
(4, 'ADM8991', 'Food Issue', 'food not best', '2025-03-06 06:57:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `first_name`, `last_name`, `phone`, `email`, `message`, `submitted_at`) VALUES
(2, 'sneha', 'vaghasiya', '9313261642', 'sneha@gmail.com', 'very nice campus', '2025-01-06 18:35:56'),
(3, 'sneha', 'vaghasiya', '9313261642', 'snehavaghasiya016@gmail.com', 'best campus', '2025-03-07 11:03:22'),
(4, 'sneha', 'vaghasiya', '9313261642', 'snehavaghasiya016@gmail.com', 'best campus', '2025-03-07 11:05:32'),
(5, 'sneha', 'vaghasiya', '9313261642', 'snehavaghasiya016@gmail.com', 'best campus', '2025-03-07 11:06:51'),
(6, 'sneha', 'vaghasiya', '9313261642', 'snehavaghasiya016@gmail.com', 'best campus', '2025-03-07 11:07:24'),
(7, 'sneha', 'vaghasiya', '9313261642', 'snehavaghasiya016@gmail.com', 'best campus', '2025-03-07 11:10:44'),
(8, 'sneha', 'vaghasiya', '9313261642', 'snehavaghasiya016@gmail.com', 'best campus', '2025-03-07 11:11:02'),
(9, 'sneha', 'vaghasiya', '9313261642', 'snehavaghasiya016@gmail.com', 'best campus', '2025-03-07 11:11:08'),
(10, 'sneha', 'vaghasiya', '9313261642', 'snehavaghasiya016@gmail.com', 'best campus', '2025-03-07 11:12:49'),
(11, 'sneha', 'vaghasiya', '9313261642', 'snehavaghasiya016@gmail.com', 'best campus', '2025-03-07 11:15:05'),
(12, 'sneha', 'vaghasiya', '9313261642', 'snehavaghasiya016@gmail.com', 'best campus', '2025-03-07 11:15:24');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `submitted_at`) VALUES
(1, 'Priya Sharma', 'priya.sharma@example.com', 'Hostel Facility Inquiry', 'Hello, I want to know about the hostel facilities available in the Girls College.', '2025-03-05 06:54:38'),
(2, 'Anjali Patel', 'anjali.patel@example.com', 'Course Details', 'Kindly provide details regarding the BCA program in your Girls College.', '2025-03-05 06:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `working_hours` varchar(50) DEFAULT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `phone`, `email`, `address`, `working_hours`, `last_updated`) VALUES
(1, '7069013231', 'snehkunj@gmail.com', 'At.Morthana, Valthan-puna canal road, Kamrej,\r\n\r\nSurat, Pin.394325 Gujarat.', '7:00 to  3 :00', '2025-01-06 18:04:58');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `section` enum('Pre-Primary','Primary','Upper Primary','Secondary','Higher Secondary Science','Higher Secondary Commerce','Higher Secondary Arts') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `teacher_name`, `subject_name`, `duration`, `section`, `created_at`) VALUES
(1, 'sneha vaghasiya', 'maths', '1 year', 'Pre-Primary', '2025-01-30 06:01:42'),
(2, 'hetvi', 'gujarati', '1yaer', 'Primary', '2025-01-30 06:03:07'),
(3, 'hetvi', 'gujarati', '1 year', 'Pre-Primary', '2025-01-30 06:03:32'),
(4, 'Sneha Vaghasiya', 'English ', '1 Year', 'Pre-Primary', '2025-01-30 18:02:44'),
(5, 'Hetvi Patel', 'Mathematics', '1 Year', 'Pre-Primary', '2025-01-30 18:02:44'),
(6, 'Monali Kotadiya', 'Music for SKG', '1 Year', 'Pre-Primary', '2025-01-30 18:02:44'),
(7, 'Bansi Sojitra', 'Environmental Studies', '1 Year', 'Pre-Primary', '2025-01-30 18:02:44'),
(8, 'Aarti Desai', 'English for Primary', '1 Year', 'Primary', '2025-01-30 18:04:07'),
(9, 'Neha Shah', 'Mathematics for Primary', '1 Year', 'Primary', '2025-01-30 18:04:07'),
(10, 'Priya Patel', 'Environmental Studies for Primary', '1 Year', 'Primary', '2025-01-30 18:04:07'),
(11, 'Rina Gupta', 'Science for Primary', '1 Year', 'Primary', '2025-01-30 18:04:07'),
(12, 'Shalini Verma', 'Social Studies for Primary', '1 Year', 'Primary', '2025-01-30 18:04:07'),
(13, 'Kajal Bhatt', 'Art for Primary', '1 Year', 'Primary', '2025-01-30 18:04:07'),
(14, 'Maya Mehta', 'Music for Primary', '1 Year', 'Primary', '2025-01-30 18:04:07'),
(15, 'Sweta Joshi', 'Physical Education for Primary', '1 Year', 'Primary', '2025-01-30 18:04:07'),
(24, 'Anjali Patel', 'Mathematics', '1 Year', 'Upper Primary', '2025-04-10 16:02:58'),
(25, 'Pooja Shah', 'English', '1 Year', 'Upper Primary', '2025-04-10 16:02:58'),
(26, 'Kirti Joshi', 'Science', '1 Year', 'Upper Primary', '2025-04-10 16:02:58'),
(27, 'Sonali Mehta', 'Social Studies', '1 Year', 'Upper Primary', '2025-04-10 16:02:58'),
(28, 'Rupal Desai', 'Physical Education', '1 Year', 'Upper Primary', '2025-04-10 16:02:58'),
(29, 'Anjali Patel', 'Art', '1 Year', 'Upper Primary', '2025-04-10 16:02:58'),
(30, 'Pooja Shah', 'Music', '1 Year', 'Upper Primary', '2025-04-10 16:02:58'),
(31, 'Kirti Joshi', 'Health Education', '1 Year', 'Upper Primary', '2025-04-10 16:02:58'),
(32, 'Shubha Reddy', 'Mathematics', '1 Year', 'Secondary', '2025-04-10 16:07:03'),
(33, 'Divya Joshi', 'English', '1 Year', 'Secondary', '2025-04-10 16:07:03'),
(34, 'Meera Patel', 'Science', '1 Year', 'Secondary', '2025-04-10 16:07:03'),
(35, 'Kavita Sharma', 'Social Studies', '1 Year', 'Secondary', '2025-04-10 16:07:03'),
(36, 'Shubha Reddy', 'Physical Education', '1 Year', 'Secondary', '2025-04-10 16:07:03'),
(37, 'Divya Joshi', 'Art', '1 Year', 'Secondary', '2025-04-10 16:07:03'),
(38, 'Meera Patel', 'Music', '1 Year', 'Secondary', '2025-04-10 16:07:03'),
(39, 'Kavita Sharma', 'Computer Science', '1 Year', 'Secondary', '2025-04-10 16:07:03'),
(40, 'Sanjay Kumar', 'Physics', '1 Year', 'Higher Secondary Science', '2025-04-10 16:07:19'),
(41, 'Neelam Gupta', 'Chemistry', '1 Year', 'Higher Secondary Science', '2025-04-10 16:07:19'),
(42, 'Vikram Patel', 'Biology', '1 Year', 'Higher Secondary Science', '2025-04-10 16:07:19'),
(43, 'Rupal Desai', 'Mathematics', '1 Year', 'Higher Secondary Science', '2025-04-10 16:07:19'),
(44, 'Maya Mehta', 'English', '1 Year', 'Higher Secondary Science', '2025-04-10 16:07:19'),
(45, 'Sanjay Kumar', 'Environmental Science', '1 Year', 'Higher Secondary Science', '2025-04-10 16:07:19'),
(46, 'Neelam Gupta', 'Physical Education', '1 Year', 'Higher Secondary Science', '2025-04-10 16:07:19'),
(47, 'Amit Gupta', 'Accountancy', '1 Year', 'Higher Secondary Commerce', '2025-04-10 16:07:34'),
(48, 'Rajesh Sharma', 'Economics', '1 Year', 'Higher Secondary Commerce', '2025-04-10 16:07:34'),
(49, 'Pooja Mehta', 'Business Studies', '1 Year', 'Higher Secondary Commerce', '2025-04-10 16:07:34'),
(50, 'Seema Joshi', 'Mathematics', '1 Year', 'Higher Secondary Commerce', '2025-04-10 16:07:34'),
(51, 'Kavita Sharma', 'Entrepreneurship', '1 Year', 'Higher Secondary Commerce', '2025-04-10 16:07:34'),
(52, 'Amit Gupta', 'English', '1 Year', 'Higher Secondary Commerce', '2025-04-10 16:07:34'),
(53, 'Rajesh Sharma', 'Commerce', '1 Year', 'Higher Secondary Commerce', '2025-04-10 16:07:34'),
(54, 'Anjali Singh', 'History', '1 Year', 'Higher Secondary Arts', '2025-04-10 16:07:49'),
(55, 'Rina Patel', 'Geography', '1 Year', 'Higher Secondary Arts', '2025-04-10 16:07:49'),
(56, 'Neha Verma', 'Political Science', '1 Year', 'Higher Secondary Arts', '2025-04-10 16:07:49'),
(57, 'Priya Kumari', 'Sociology', '1 Year', 'Higher Secondary Arts', '2025-04-10 16:07:49'),
(58, 'Geeta Sharma', 'Psychology', '1 Year', 'Higher Secondary Arts', '2025-04-10 16:07:49'),
(59, 'Anjali Singh', 'English', '1 Year', 'Higher Secondary Arts', '2025-04-10 16:07:49'),
(60, 'Rina Patel', 'Art', '1 Year', 'Higher Secondary Arts', '2025-04-10 16:07:49');

-- --------------------------------------------------------

--
-- Table structure for table `cstudents`
--

CREATE TABLE `cstudents` (
  `id` int(11) NOT NULL,
  `student_id` varchar(10) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `course` varchar(50) NOT NULL,
  `semester` int(11) NOT NULL,
  `dob` date NOT NULL,
  `status` enum('Pending','Approved') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cstudents`
--

INSERT INTO `cstudents` (`id`, `student_id`, `name`, `email`, `phone`, `course`, `semester`, `dob`, `status`) VALUES
(1, 'STU2871', 'sneha vaghasiya', 'snehavaghasiya016@gmail.com', '9313261642', 'BCA', 0, '2005-05-04', 'Approved'),
(4, 'STU1001', 'Riya Patel', 'riya.patel@example.com', '9876543210', 'BCA', 1, '2003-05-10', 'Approved'),
(5, 'STU1002', 'Aarohi Shah', 'aarohi.shah@example.com', '9876543211', 'BCA', 1, '2003-06-15', 'Approved'),
(6, 'STU1003', 'Kavya Mehta', 'kavya.mehta@example.com', '9876543212', 'BCA', 1, '2004-02-20', 'Approved'),
(7, 'STU1004', 'Dhara Joshi', 'dhara.joshi@example.com', '9876543213', 'BCA', 2, '2003-07-30', 'Approved'),
(8, 'STU1005', 'Nidhi Desai', 'nidhi.desai@example.com', '9876543214', 'BCA', 2, '2004-01-05', 'Approved'),
(9, 'STU1006', 'Isha Trivedi', 'isha.trivedi@example.com', '9876543215', 'BCA', 2, '2003-08-22', 'Approved'),
(10, 'STU1007', 'Kajal Gohil', 'kajal.gohil@example.com', '9876543216', 'BCA', 3, '2003-09-12', 'Approved'),
(11, 'STU1008', 'Pooja Bhatt', 'pooja.bhatt@example.com', '9876543217', 'BCA', 3, '2003-04-14', 'Approved'),
(12, 'STU1009', 'Anaya Rana', 'anaya.rana@example.com', '9876543218', 'BCA', 3, '2003-11-18', 'Approved'),
(13, 'STU1010', 'Sneha Shah', 'sneha.shah@example.com', '9876543219', 'BCA', 4, '2003-03-25', 'Approved'),
(14, 'STU1011', 'Rupal Vyas', 'rupal.vyas@example.com', '9876543220', 'BCA', 4, '2003-10-08', 'Approved'),
(15, 'STU1012', 'Mansi Patel', 'mansi.patel@example.com', '9876543221', 'BCA', 4, '2004-06-19', 'Approved'),
(16, 'STU1013', 'Bhavya Chauhan', 'bhavya.chauhan@example.com', '9876543222', 'BCA', 5, '2003-12-05', 'Approved'),
(17, 'STU1014', 'Jinal Rana', 'jinal.rana@example.com', '9876543223', 'BCA', 5, '2004-02-14', 'Approved'),
(18, 'STU1015', 'Riya Shah', 'riya.shah@example.com', '9876543224', 'BCA', 5, '2003-09-21', 'Approved'),
(19, 'STU1016', 'Harshita Desai', 'harshita.desai@example.com', '9876543225', 'BCA', 6, '2003-07-07', 'Approved'),
(20, 'STU1017', 'Krishna Joshi', 'krishna.joshi@example.com', '9876543226', 'BCA', 6, '2004-04-29', 'Approved'),
(21, 'STU1018', 'Aditi Trivedi', 'aditi.trivedi@example.com', '9876543227', 'BCA', 6, '2003-11-17', 'Approved'),
(22, 'STU1019', 'Meera Shah', 'meera.shah@example.com', '9876543228', 'BCA', 6, '2003-05-23', 'Approved'),
(23, 'STU1020', 'Neha Patel', 'neha.patel@example.com', '9876543229', 'BCA', 6, '2003-08-11', 'Approved'),
(104, 'STU3001', 'Riya Patel', 'riya.patel.mscit@example.com', '9876543301', 'MSC IT', 1, '2003-05-10', 'Approved'),
(105, 'STU3002', 'Aarohi Shah', 'aarohi.shah.mscit@example.com', '9876543302', 'MSC IT', 1, '2003-06-15', 'Approved'),
(106, 'STU3003', 'Tanisha Mehta', 'tanisha.mehta@example.com', '9876543303', 'MSC IT', 1, '2004-02-20', 'Approved'),
(107, 'STU3004', 'Divya Joshi', 'divya.joshi@example.com', '9876543304', 'MSC IT', 1, '2003-07-30', 'Approved'),
(108, 'STU3005', 'Nidhi Desai', 'nidhi.desai.mscit@example.com', '9876543305', 'MSC IT', 1, '2004-01-05', 'Approved'),
(109, 'STU3006', 'Isha Trivedi', 'isha.trivedi.mscit@example.com', '9876543306', 'MSC IT', 2, '2003-08-22', 'Approved'),
(110, 'STU3007', 'Kajal Gohil', 'kajal.gohil.mscit@example.com', '9876543307', 'MSC IT', 2, '2003-09-12', 'Approved'),
(111, 'STU3008', 'Pooja Bhatt', 'pooja.bhatt.mscit@example.com', '9876543308', 'MSC IT', 2, '2003-04-14', 'Approved'),
(112, 'STU3009', 'Anaya Rana', 'anaya.rana.mscit@example.com', '9876543309', 'MSC IT', 2, '2003-11-18', 'Approved'),
(113, 'STU3010', 'Sneha Shah', 'sneha.shah.mscit@example.com', '9876543310', 'MSC IT', 3, '2003-03-25', 'Approved'),
(114, 'STU2001', 'Ritika Patel', 'ritika.patel.bba@example.com', '9876543401', 'BBA', 1, '2003-05-10', 'Approved'),
(115, 'STU2002', 'Ananya Shah', 'ananya.shah.bba@example.com', '9876543402', 'BBA', 1, '2003-06-15', 'Approved'),
(116, 'STU2003', 'Tanvi Mehta', 'tanvi.mehta.bba@example.com', '9876543403', 'BBA', 1, '2004-02-20', 'Approved'),
(117, 'STU2004', 'Diya Joshi', 'diya.joshi.bba@example.com', '9876543404', 'BBA', 1, '2003-07-30', 'Approved'),
(118, 'STU2005', 'Muskan Desai', 'muskan.desai.bba@example.com', '9876543405', 'BBA', 1, '2004-01-05', 'Approved'),
(119, 'STU2006', 'Ishika Trivedi', 'ishika.trivedi.bba@example.com', '9876543406', 'BBA', 2, '2003-08-22', 'Approved'),
(120, 'STU2007', 'Kashish Gohil', 'kashish.gohil.bba@example.com', '9876543407', 'BBA', 2, '2003-09-12', 'Approved'),
(121, 'STU2008', 'Simran Bhatt', 'simran.bhatt.bba@example.com', '9876543408', 'BBA', 2, '2003-04-14', 'Approved'),
(122, 'STU2009', 'Nandini Rana', 'nandini.rana.bba@example.com', '9876543409', 'BBA', 2, '2003-11-18', 'Approved'),
(123, 'STU4001', 'Riya Shah', 'riya.shah.bcom@example.com', '9876543501', 'BCOM', 1, '2003-05-10', 'Approved'),
(124, 'STU4002', 'Aarohi Mehta', 'aarohi.mehta.bcom@example.com', '9876543502', 'BCOM', 1, '2003-06-15', 'Approved'),
(125, 'STU4003', 'Tanvi Patel', 'tanvi.patel.bcom@example.com', '9876543503', 'BCOM', 1, '2004-02-20', 'Approved'),
(126, 'STU4004', 'Diya Joshi', 'diya.joshi.bcom@example.com', '9876543504', 'BCOM', 1, '2003-07-30', 'Approved'),
(127, 'STU4005', 'Muskan Desai', 'muskan.desai.bcom@example.com', '9876543505', 'BCOM', 1, '2004-01-05', 'Approved'),
(128, 'STU4006', 'Ishika Trivedi', 'ishika.trivedi.bcom@example.com', '9876543506', 'BCOM', 2, '2003-08-22', 'Approved'),
(129, 'STU4007', 'Kashish Gohil', 'kashish.gohil.bcom@example.com', '9876543507', 'BCOM', 2, '2003-09-12', 'Approved'),
(130, 'STU4008', 'Simran Bhatt', 'simran.bhatt.bcom@example.com', '9876543508', 'BCOM', 2, '2003-04-14', 'Approved'),
(131, 'STU4009', 'Nandini Rana', 'nandini.rana.bcom@example.com', '9876543509', 'BCOM', 2, '2003-11-18', 'Approved'),
(133, 'STU8246', 'dobariya urvshi manshukhbhai', 'hetvi200824@gmail.com', '9313261642', 'BCA', 1, '2004-11-26', 'Approved'),
(135, 'STU4491', 'sneha vaghasiya', 'hetvi01@gmail.com', '9313261642', 'BCA', 1, '2005-04-04', 'Approved'),
(137, 'STU6115', 'hetvi vaghasiya', 'jeel@gmail.com', '9313261642', 'BCA', 1, '2005-05-20', 'Approved'),
(139, 'STU2517', 'gopi vaghasiya', 'snehavghsiya016@gmail.com', '09374591999', 'BCOM', 1, '2006-04-05', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `cstudy_materials`
--

CREATE TABLE `cstudy_materials` (
  `id` int(11) NOT NULL,
  `course` enum('BCA','BCom','BBA','MSc IT') NOT NULL,
  `subject` varchar(100) NOT NULL,
  `material_name` varchar(150) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `uploaded_by` varchar(100) NOT NULL,
  `upload_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cstudy_materials`
--

INSERT INTO `cstudy_materials` (`id`, `course`, `subject`, `material_name`, `file_path`, `uploaded_by`, `upload_date`) VALUES
(1, 'BCA', 'java', '503-NT Short-Long Que-Ans  Ꮢ.ꪜ.pdf', 'image/503-NT Short-Long Que-Ans  Ꮢ.ꪜ.pdf', 'sneha vaghasiya', '0000-00-00'),
(2, 'BCA', 'web', '501-2-Advanced Web Designing (1).pdf', 'image/501-2-Advanced Web Designing (1).pdf', 'monali kotadiya', '0000-00-00'),
(3, 'BCA', 'gujarati', '501-2- Advanced Web Designing.pdf', 'image/501-2- Advanced Web Designing.pdf', 'sneha vaghasiya', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `ctimetable`
--

CREATE TABLE `ctimetable` (
  `id` int(11) NOT NULL,
  `course` varchar(100) NOT NULL,
  `semester` int(11) NOT NULL,
  `day` enum('Monday','Tuesday','Wednesday','Thursday','Friday') NOT NULL,
  `time` varchar(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `faculty_name` varchar(100) NOT NULL,
  `room_number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ctimetable`
--

INSERT INTO `ctimetable` (`id`, `course`, `semester`, `day`, `time`, `subject`, `faculty_name`, `room_number`) VALUES
(1, 'BCA', 2, 'Monday', '09:00 - 10:00', 'Object-Oriented Programming', 'Sneha Vaghasiya', '201'),
(2, 'BCA', 2, 'Monday', '10:00 - 11:00', 'Data Structures', 'Dhara Joshi', '201'),
(3, 'BCA', 2, 'Monday', '11:00 - 12:00', 'Computer Networks', 'Riddhi Desai', '201'),
(4, 'BCA', 2, 'Monday', '12:00 - 01:00', 'Mathematics for Computing', 'Ria Patel', '201'),
(5, 'BCA', 2, 'Tuesday', '09:00 - 10:00', 'Database Management', 'Sneha Vaghasiya', '201'),
(6, 'BCA', 2, 'Tuesday', '10:00 - 11:00', 'Operating Systems', 'Dhara Joshi', '201'),
(7, 'BCA', 2, 'Tuesday', '11:00 - 12:00', 'Software Engineering', 'Riddhi Desai', '201'),
(8, 'BCA', 2, 'Tuesday', '12:00 - 01:00', 'Web Technologies', 'Ria Patel', '201'),
(9, 'BCA', 2, 'Wednesday', '09:00 - 10:00', 'Cloud Computing', 'Sneha Vaghasiya', '201'),
(10, 'BCA', 2, 'Wednesday', '10:00 - 11:00', 'Artificial Intelligence', 'Dhara Joshi', '201'),
(11, 'BCA', 2, 'Wednesday', '11:00 - 12:00', 'Machine Learning', 'Riddhi Desai', '201'),
(12, 'BCA', 2, 'Wednesday', '12:00 - 01:00', 'Mobile Computing', 'Ria Patel', '201'),
(13, 'BCA', 2, 'Thursday', '09:00 - 10:00', 'Cyber Security', 'Sneha Vaghasiya', '201'),
(14, 'BCA', 2, 'Thursday', '10:00 - 11:00', 'Computer Graphics', 'Dhara Joshi', '201'),
(15, 'BCA', 2, 'Thursday', '11:00 - 12:00', 'Digital Electronics', 'Riddhi Desai', '201'),
(16, 'BCA', 2, 'Thursday', '12:00 - 01:00', 'Software Testing', 'Ria Patel', '201'),
(17, 'BCA', 2, 'Friday', '09:00 - 10:00', 'Big Data Analytics', 'Sneha Vaghasiya', '201'),
(18, 'BCA', 2, 'Friday', '10:00 - 11:00', 'IOT & Robotics', 'Dhara Joshi', '201'),
(19, 'BCA', 2, 'Friday', '11:00 - 12:00', 'Ethical Hacking', 'Riddhi Desai', '201'),
(20, 'BCA', 2, 'Friday', '12:00 - 01:00', 'Data Mining', 'Ria Patel', '201'),
(21, 'BCA', 2, '', '09:00 - 10:00', 'Python Programming', 'Sneha Vaghasiya', '201'),
(22, 'BCA', 2, '', '10:00 - 11:00', 'Java Programming', 'Dhara Joshi', '201'),
(23, 'BCA', 2, '', '11:00 - 12:00', 'Blockchain Technology', 'Riddhi Desai', '201'),
(24, 'BCA', 2, '', '12:00 - 01:00', 'Research Methodology', 'Ria Patel', '201'),
(25, 'BCA', 4, 'Monday', '09:00 - 10:00', 'Advanced Java', 'Dr. Meera Shah', '301'),
(26, 'BCA', 4, 'Monday', '10:00 - 11:00', 'Software Project Management', 'Prof. Kunal Patel', '301'),
(27, 'BCA', 4, 'Monday', '11:00 - 12:00', 'Data Warehousing', 'Dr. Nisha Desai', '301'),
(28, 'BCA', 4, 'Monday', '12:00 - 01:00', 'Multimedia & Animation', 'Prof. Hiren Shah', '301'),
(29, 'BCA', 4, 'Tuesday', '09:00 - 10:00', 'Android Development', 'Dr. Meera Shah', '301'),
(30, 'BCA', 4, 'Tuesday', '10:00 - 11:00', 'Web Frameworks', 'Prof. Kunal Patel', '301'),
(31, 'BCA', 4, 'Tuesday', '11:00 - 12:00', 'Artificial Intelligence', 'Dr. Nisha Desai', '301'),
(32, 'BCA', 4, 'Tuesday', '12:00 - 01:00', 'Computer Graphics', 'Prof. Hiren Shah', '301'),
(33, 'BCA', 4, 'Wednesday', '09:00 - 10:00', 'Mobile App Development', 'Dr. Meera Shah', '301'),
(34, 'BCA', 4, 'Wednesday', '10:00 - 11:00', 'Cyber Security', 'Prof. Kunal Patel', '301'),
(35, 'BCA', 4, 'Wednesday', '11:00 - 12:00', 'Machine Learning', 'Dr. Nisha Desai', '301'),
(36, 'BCA', 4, 'Wednesday', '12:00 - 01:00', 'Big Data Analytics', 'Prof. Hiren Shah', '301'),
(37, 'BCA', 4, 'Thursday', '09:00 - 10:00', 'Internet of Things (IoT)', 'Dr. Meera Shah', '301'),
(38, 'BCA', 4, 'Thursday', '10:00 - 11:00', 'Blockchain Technology', 'Prof. Kunal Patel', '301'),
(39, 'BCA', 4, 'Thursday', '11:00 - 12:00', 'Software Testing', 'Dr. Nisha Desai', '301'),
(40, 'BCA', 4, 'Thursday', '12:00 - 01:00', 'Ethical Hacking', 'Prof. Hiren Shah', '301'),
(41, 'BCA', 4, 'Friday', '09:00 - 10:00', 'Advanced Python', 'Dr. Meera Shah', '301'),
(42, 'BCA', 4, 'Friday', '10:00 - 11:00', 'Data Science', 'Prof. Kunal Patel', '301'),
(43, 'BCA', 4, 'Friday', '11:00 - 12:00', 'Cloud Computing', 'Dr. Nisha Desai', '301'),
(44, 'BCA', 4, 'Friday', '12:00 - 01:00', 'Research Methodology', 'Prof. Hiren Shah', '301'),
(45, 'BBA', 2, 'Monday', '09:00 - 10:00', 'Principles of Management', 'Dr. Ramesh Patel', '201'),
(46, 'BBA', 2, 'Monday', '10:00 - 11:00', 'Business Communication', 'Prof. Neha Shah', '201'),
(47, 'BBA', 2, 'Monday', '11:00 - 12:00', 'Financial Accounting', 'Dr. Kiran Mehta', '201'),
(48, 'BBA', 2, 'Monday', '12:00 - 01:00', 'Microeconomics', 'Prof. Anjali Gupta', '201'),
(49, 'BBA', 2, 'Tuesday', '09:00 - 10:00', 'Marketing Management', 'Dr. Ramesh Patel', '201'),
(50, 'BBA', 2, 'Tuesday', '10:00 - 11:00', 'Organizational Behavior', 'Prof. Neha Shah', '201'),
(51, 'BBA', 2, 'Tuesday', '11:00 - 12:00', 'Cost Accounting', 'Dr. Kiran Mehta', '201'),
(52, 'BBA', 2, 'Tuesday', '12:00 - 01:00', 'Business Statistics', 'Prof. Anjali Gupta', '201'),
(53, 'BBA', 2, 'Wednesday', '09:00 - 10:00', 'Human Resource Management', 'Dr. Ramesh Patel', '201'),
(54, 'BBA', 2, 'Wednesday', '10:00 - 11:00', 'Corporate Law', 'Prof. Neha Shah', '201'),
(55, 'BBA', 2, 'Wednesday', '11:00 - 12:00', 'Macroeconomics', 'Dr. Kiran Mehta', '201'),
(56, 'BBA', 2, 'Wednesday', '12:00 - 01:00', 'Business Ethics', 'Prof. Anjali Gupta', '201'),
(57, 'BBA', 2, 'Thursday', '09:00 - 10:00', 'Business Environment', 'Dr. Ramesh Patel', '201'),
(58, 'BBA', 2, 'Thursday', '10:00 - 11:00', 'Entrepreneurship', 'Prof. Neha Shah', '201'),
(59, 'BBA', 2, 'Thursday', '11:00 - 12:00', 'Financial Management', 'Dr. Kiran Mehta', '201'),
(60, 'BBA', 2, 'Thursday', '12:00 - 01:00', 'Business Analytics', 'Prof. Anjali Gupta', '201'),
(61, 'BBA', 2, 'Friday', '09:00 - 10:00', 'Consumer Behavior', 'Dr. Ramesh Patel', '201'),
(62, 'BBA', 2, 'Friday', '10:00 - 11:00', 'E-Commerce', 'Prof. Neha Shah', '201'),
(63, 'BBA', 2, 'Friday', '11:00 - 12:00', 'Taxation', 'Dr. Kiran Mehta', '201'),
(64, 'BBA', 2, 'Friday', '12:00 - 01:00', 'Leadership Skills', 'Prof. Anjali Gupta', '201'),
(65, 'BBA', 4, 'Monday', '09:00 - 10:00', 'Financial Management', 'Dr. Ramesh Patel', '202'),
(66, 'BBA', 4, 'Monday', '10:00 - 11:00', 'Marketing Research', 'Prof. Neha Shah', '202'),
(67, 'BBA', 4, 'Monday', '11:00 - 12:00', 'Human Resource Development', 'Dr. Kiran Mehta', '202'),
(68, 'BBA', 4, 'Monday', '12:00 - 01:00', 'Business Laws', 'Prof. Anjali Gupta', '202'),
(69, 'BBA', 4, 'Tuesday', '09:00 - 10:00', 'Strategic Management', 'Dr. Ramesh Patel', '202'),
(70, 'BBA', 4, 'Tuesday', '10:00 - 11:00', 'Consumer Behavior', 'Prof. Neha Shah', '202'),
(71, 'BBA', 4, 'Tuesday', '11:00 - 12:00', 'Business Analytics', 'Dr. Kiran Mehta', '202'),
(72, 'BBA', 4, 'Tuesday', '12:00 - 01:00', 'Entrepreneurship Development', 'Prof. Anjali Gupta', '202'),
(73, 'BBA', 4, 'Wednesday', '09:00 - 10:00', 'Operations Management', 'Dr. Ramesh Patel', '202'),
(74, 'BBA', 4, 'Wednesday', '10:00 - 11:00', 'Digital Marketing', 'Prof. Neha Shah', '202'),
(75, 'BBA', 4, 'Wednesday', '11:00 - 12:00', 'Investment Analysis', 'Dr. Kiran Mehta', '202'),
(76, 'BBA', 4, 'Wednesday', '12:00 - 01:00', 'Corporate Social Responsibility', 'Prof. Anjali Gupta', '202'),
(77, 'BBA', 4, 'Thursday', '09:00 - 10:00', 'Risk Management', 'Dr. Ramesh Patel', '202'),
(78, 'BBA', 4, 'Thursday', '10:00 - 11:00', 'Logistics and Supply Chain', 'Prof. Neha Shah', '202'),
(79, 'BBA', 4, 'Thursday', '11:00 - 12:00', 'International Business', 'Dr. Kiran Mehta', '202'),
(80, 'BBA', 4, 'Thursday', '12:00 - 01:00', 'Leadership Skills', 'Prof. Anjali Gupta', '202'),
(81, 'BBA', 4, 'Friday', '09:00 - 10:00', 'E-Commerce', 'Dr. Ramesh Patel', '202'),
(82, 'BBA', 4, 'Friday', '10:00 - 11:00', 'Corporate Finance', 'Prof. Neha Shah', '202'),
(83, 'BBA', 4, 'Friday', '11:00 - 12:00', 'Performance Management', 'Dr. Kiran Mehta', '202'),
(84, 'BBA', 4, 'Friday', '12:00 - 01:00', 'Innovation Management', 'Prof. Anjali Gupta', '202'),
(85, 'BCom', 2, 'Monday', '09:00 - 10:00', 'Financial Accounting', 'Dr. Ramesh Patel', '301'),
(86, 'BCom', 2, 'Monday', '10:00 - 11:00', 'Business Communication', 'Prof. Neha Shah', '301'),
(87, 'BCom', 2, 'Monday', '11:00 - 12:00', 'Microeconomics', 'Dr. Kiran Mehta', '301'),
(88, 'BCom', 2, 'Monday', '12:00 - 01:00', 'Principles of Management', 'Prof. Anjali Gupta', '301'),
(89, 'BCom', 2, 'Tuesday', '09:00 - 10:00', 'Corporate Accounting', 'Dr. Ramesh Patel', '301'),
(90, 'BCom', 2, 'Tuesday', '10:00 - 11:00', 'Cost Accounting', 'Prof. Neha Shah', '301'),
(91, 'BCom', 2, 'Tuesday', '11:00 - 12:00', 'Macroeconomics', 'Dr. Kiran Mehta', '301'),
(92, 'BCom', 2, 'Tuesday', '12:00 - 01:00', 'Business Law', 'Prof. Anjali Gupta', '301'),
(93, 'BCom', 2, 'Wednesday', '09:00 - 10:00', 'Banking & Insurance', 'Dr. Ramesh Patel', '301'),
(94, 'BCom', 2, 'Wednesday', '10:00 - 11:00', 'Business Mathematics', 'Prof. Neha Shah', '301'),
(95, 'BCom', 2, 'Wednesday', '11:00 - 12:00', 'Indian Economy', 'Dr. Kiran Mehta', '301'),
(96, 'BCom', 2, 'Wednesday', '12:00 - 01:00', 'Marketing Management', 'Prof. Anjali Gupta', '301'),
(97, 'BCom', 2, 'Thursday', '09:00 - 10:00', 'Entrepreneurship Development', 'Dr. Ramesh Patel', '301'),
(98, 'BCom', 2, 'Thursday', '10:00 - 11:00', 'International Business', 'Prof. Neha Shah', '301'),
(99, 'BCom', 2, 'Thursday', '11:00 - 12:00', 'E-Commerce', 'Dr. Kiran Mehta', '301'),
(100, 'BCom', 2, 'Thursday', '12:00 - 01:00', 'Organizational Behavior', 'Prof. Anjali Gupta', '301'),
(101, 'BCom', 2, 'Friday', '09:00 - 10:00', 'Auditing', 'Dr. Ramesh Patel', '301'),
(102, 'BCom', 2, 'Friday', '10:00 - 11:00', 'Financial Markets', 'Prof. Neha Shah', '301'),
(103, 'BCom', 2, 'Friday', '11:00 - 12:00', 'Business Ethics', 'Dr. Kiran Mehta', '301'),
(104, 'BCom', 2, 'Friday', '12:00 - 01:00', 'Stock Market Analysis', 'Prof. Anjali Gupta', '301'),
(105, 'BCom', 4, 'Monday', '09:00 - 10:00', 'Advanced Corporate Accounting', 'Dr. Ramesh Patel', '401'),
(106, 'BCom', 4, 'Monday', '10:00 - 11:00', 'Business Statistics', 'Prof. Neha Shah', '401'),
(107, 'BCom', 4, 'Monday', '11:00 - 12:00', 'Managerial Economics', 'Dr. Kiran Mehta', '401'),
(108, 'BCom', 4, 'Monday', '12:00 - 01:00', 'Company Law', 'Prof. Anjali Gupta', '401'),
(109, 'BCom', 4, 'Tuesday', '09:00 - 10:00', 'Cost & Management Accounting', 'Dr. Ramesh Patel', '401'),
(110, 'BCom', 4, 'Tuesday', '10:00 - 11:00', 'Research Methodology', 'Prof. Neha Shah', '401'),
(111, 'BCom', 4, 'Tuesday', '11:00 - 12:00', 'Business Law', 'Dr. Kiran Mehta', '401'),
(112, 'BCom', 4, 'Tuesday', '12:00 - 01:00', 'International Trade & Finance', 'Prof. Anjali Gupta', '401'),
(113, 'BCom', 4, 'Wednesday', '09:00 - 10:00', 'Financial Management', 'Dr. Ramesh Patel', '401'),
(114, 'BCom', 4, 'Wednesday', '10:00 - 11:00', 'Business Environment', 'Prof. Neha Shah', '401'),
(115, 'BCom', 4, 'Wednesday', '11:00 - 12:00', 'E-Commerce & Digital Marketing', 'Dr. Kiran Mehta', '401'),
(116, 'BCom', 4, 'Wednesday', '12:00 - 01:00', 'Strategic Management', 'Prof. Anjali Gupta', '401'),
(117, 'BCom', 4, 'Thursday', '09:00 - 10:00', 'Entrepreneurial Development', 'Dr. Ramesh Patel', '401'),
(118, 'BCom', 4, 'Thursday', '10:00 - 11:00', 'Stock Market & Investment', 'Prof. Neha Shah', '401'),
(119, 'BCom', 4, 'Thursday', '11:00 - 12:00', 'Consumer Behavior', 'Dr. Kiran Mehta', '401'),
(120, 'BCom', 4, 'Thursday', '12:00 - 01:00', 'Corporate Social Responsibility', 'Prof. Anjali Gupta', '401'),
(121, 'BCom', 4, 'Friday', '09:00 - 10:00', 'Banking & Financial Services', 'Dr. Ramesh Patel', '401'),
(122, 'BCom', 4, 'Friday', '10:00 - 11:00', 'Logistics & Supply Chain Management', 'Prof. Neha Shah', '401'),
(123, 'BCom', 4, 'Friday', '11:00 - 12:00', 'Retail Management', 'Dr. Kiran Mehta', '401'),
(124, 'BCom', 4, 'Friday', '12:00 - 01:00', 'Event Management', 'Prof. Anjali Gupta', '401'),
(125, 'MSc IT', 2, 'Monday', '09:00 - 10:00', 'Advanced Data Structures', 'Dr. Rakesh Sharma', '601'),
(126, 'MSc IT', 2, 'Monday', '10:00 - 11:00', 'Software Engineering', 'Prof. Meera Desai', '601'),
(127, 'MSc IT', 2, 'Monday', '11:00 - 12:00', 'Operating Systems', 'Dr. Suresh Pandey', '601'),
(128, 'MSc IT', 2, 'Monday', '12:00 - 01:00', 'Web Technologies', 'Prof. Anjali Verma', '601'),
(129, 'MSc IT', 2, 'Tuesday', '09:00 - 10:00', 'Database Management Systems', 'Dr. Rakesh Sharma', '601'),
(130, 'MSc IT', 2, 'Tuesday', '10:00 - 11:00', 'Artificial Intelligence', 'Prof. Meera Desai', '601'),
(131, 'MSc IT', 2, 'Tuesday', '11:00 - 12:00', 'Computer Networks', 'Dr. Suresh Pandey', '601'),
(132, 'MSc IT', 2, 'Tuesday', '12:00 - 01:00', 'Cloud Computing', 'Prof. Anjali Verma', '601'),
(133, 'MSc IT', 2, 'Wednesday', '09:00 - 10:00', 'Big Data Analytics', 'Dr. Rakesh Sharma', '601'),
(134, 'MSc IT', 2, 'Wednesday', '10:00 - 11:00', 'Cyber Security', 'Prof. Meera Desai', '601'),
(135, 'MSc IT', 2, 'Wednesday', '11:00 - 12:00', 'Mobile Computing', 'Dr. Suresh Pandey', '601'),
(136, 'MSc IT', 2, 'Wednesday', '12:00 - 01:00', 'Blockchain Technology', 'Prof. Anjali Verma', '601'),
(137, 'MSc IT', 2, 'Thursday', '09:00 - 10:00', 'Machine Learning', 'Dr. Rakesh Sharma', '601'),
(138, 'MSc IT', 2, 'Thursday', '10:00 - 11:00', 'Embedded Systems', 'Prof. Meera Desai', '601'),
(139, 'MSc IT', 2, 'Thursday', '11:00 - 12:00', 'Parallel Computing', 'Dr. Suresh Pandey', '601'),
(140, 'MSc IT', 2, 'Thursday', '12:00 - 01:00', 'IoT (Internet of Things)', 'Prof. Anjali Verma', '601'),
(141, 'MSc IT', 2, 'Friday', '09:00 - 10:00', 'Digital Image Processing', 'Dr. Rakesh Sharma', '601'),
(142, 'MSc IT', 2, 'Friday', '10:00 - 11:00', 'Cryptography & Network Security', 'Prof. Meera Desai', '601'),
(143, 'MSc IT', 2, 'Friday', '11:00 - 12:00', 'Ethical Hacking', 'Dr. Suresh Pandey', '601'),
(144, 'MSc IT', 2, 'Friday', '12:00 - 01:00', 'DevOps Practices', 'Prof. Anjali Verma', '601');

-- --------------------------------------------------------

--
-- Table structure for table `daily_reports`
--

CREATE TABLE `daily_reports` (
  `id` int(11) NOT NULL,
  `report_date` date NOT NULL,
  `course` varchar(50) NOT NULL,
  `total_students` int(11) NOT NULL,
  `present_count` int(11) NOT NULL,
  `absent_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daily_reports`
--

INSERT INTO `daily_reports` (`id`, `report_date`, `course`, `total_students`, `present_count`, `absent_count`) VALUES
(1, '2025-02-20', '', 49, 48, 1),
(2, '2025-03-10', '', 22, 21, 1),
(3, '2025-03-14', '', 22, 21, 1),
(4, '2025-04-11', '', 10, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedule`
--

CREATE TABLE `exam_schedule` (
  `id` int(11) NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `class` varchar(50) NOT NULL,
  `exam_date` date NOT NULL,
  `exam_time` time NOT NULL,
  `staff_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_schedule`
--

INSERT INTO `exam_schedule` (`id`, `exam_name`, `subject`, `class`, `exam_date`, `exam_time`, `staff_id`) VALUES
(2, 'Term 1 English Exam', 'English', 'Pre-Primary', '2025-05-15', '10:00:00', 5),
(3, 'Mid-Term Mathematics Exam', 'Mathematics', 'Pre-Primary', '2025-05-16', '10:00:00', 6),
(4, 'General Knowledge Exam', 'General Knowledge', 'Pre-Primary', '2025-05-17', '10:00:00', 7),
(5, 'Art & Craft Exam', 'Art & Craft', 'Pre-Primary', '2025-05-18', '10:00:00', 8),
(6, 'Grade 1 Final Exam', 'English', 'Grade 1', '2025-05-10', '09:00:00', 10),
(7, 'Grade 1 Final Exam', 'Mathematics', 'Grade 1', '2025-05-11', '09:00:00', 11),
(8, 'Grade 1 Final Exam', 'Science', 'Grade 1', '2025-05-12', '09:00:00', 12),
(9, 'Grade 2 Final Exam', 'English', 'Grade 2', '2025-05-10', '10:00:00', 13),
(10, 'Grade 2 Final Exam', 'Mathematics', 'Grade 2', '2025-05-11', '10:00:00', 14),
(11, 'Grade 2 Final Exam', 'Science', 'Grade 2', '2025-05-12', '10:00:00', 15),
(12, 'Grade 3 Final Exam', 'English', 'Grade 3', '2025-05-10', '11:00:00', 16),
(13, 'Grade 3 Final Exam', 'Mathematics', 'Grade 3', '2025-05-11', '11:00:00', 10),
(14, 'Grade 3 Final Exam', 'Science', 'Grade 3', '2025-05-12', '11:00:00', 11),
(15, 'Grade 4 Final Exam', 'English', 'Grade 4', '2025-05-10', '12:00:00', 12),
(16, 'Grade 4 Final Exam', 'Mathematics', 'Grade 4', '2025-05-11', '12:00:00', 13),
(17, 'Grade 4 Final Exam', 'Science', 'Grade 4', '2025-05-12', '12:00:00', 14),
(18, 'Grade 5 Final Exam', 'English', 'Grade 5', '2025-05-10', '13:00:00', 15),
(19, 'Grade 5 Final Exam', 'Mathematics', 'Grade 5', '2025-05-11', '13:00:00', 16),
(20, 'Grade 5 Final Exam', 'Science', 'Grade 5', '2025-05-12', '13:00:00', 10),
(21, 'Grade 6 Final Exam', 'English', 'Grade 6', '2025-05-15', '09:00:00', 17),
(22, 'Grade 6 Final Exam', 'Mathematics', 'Grade 6', '2025-05-16', '09:00:00', 18),
(23, 'Grade 6 Final Exam', 'Science', 'Grade 6', '2025-05-17', '09:00:00', 19),
(24, 'Grade 7 Final Exam', 'English', 'Grade 7', '2025-05-15', '10:00:00', 20),
(25, 'Grade 7 Final Exam', 'Mathematics', 'Grade 7', '2025-05-16', '10:00:00', 21),
(26, 'Grade 7 Final Exam', 'Science', 'Grade 7', '2025-05-17', '10:00:00', 17),
(27, 'Grade 8 Final Exam', 'English', 'Grade 8', '2025-05-15', '11:00:00', 18),
(28, 'Grade 8 Final Exam', 'Mathematics', 'Grade 8', '2025-05-16', '11:00:00', 19),
(29, 'Grade 8 Final Exam', 'Science', 'Grade 8', '2025-05-17', '11:00:00', 20),
(30, 'Grade 9 Final Exam', 'English', 'Grade 9', '2025-05-20', '09:00:00', 22),
(31, 'Grade 9 Final Exam', 'Mathematics', 'Grade 9', '2025-05-21', '09:00:00', 23),
(32, 'Grade 9 Final Exam', 'Science', 'Grade 9', '2025-05-22', '09:00:00', 24),
(33, 'Grade 9 Final Exam', 'Social Science', 'Grade 9', '2025-05-23', '09:00:00', 25),
(34, 'Grade 11 Science Final Exam', 'Physics', '11 Science', '2025-06-01', '09:00:00', 41),
(35, 'Grade 11 Science Final Exam', 'Chemistry', '11 Science', '2025-06-02', '09:00:00', 42),
(36, 'Grade 11 Science Final Exam', 'Mathematics', '11 Science', '2025-06-03', '09:00:00', 43),
(37, 'Grade 11 Science Final Exam', 'Biology', '11 Science', '2025-06-04', '09:00:00', 44),
(38, 'Grade 11 Science Final Exam', 'English', '11 Science', '2025-06-05', '09:00:00', 45),
(39, 'Grade 11 Commerce Final Exam', 'Accountancy', '11 Commerce', '2025-06-01', '11:00:00', 56),
(40, 'Grade 11 Commerce Final Exam', 'Business Studies', '11 Commerce', '2025-06-02', '11:00:00', 57),
(41, 'Grade 11 Commerce Final Exam', 'Economics', '11 Commerce', '2025-06-03', '11:00:00', 58),
(42, 'Grade 11 Commerce Final Exam', 'Mathematics', '11 Commerce', '2025-06-04', '11:00:00', 59),
(43, 'Grade 11 Commerce Final Exam', 'English', '11 Commerce', '2025-06-05', '11:00:00', 60),
(44, 'Grade 11 Arts Final Exam', 'History', '11 Arts', '2025-06-01', '13:00:00', 61),
(45, 'Grade 11 Arts Final Exam', 'Geography', '11 Arts', '2025-06-02', '13:00:00', 62),
(46, 'Grade 11 Arts Final Exam', 'Political Science', '11 Arts', '2025-06-03', '13:00:00', 63),
(47, 'Grade 11 Arts Final Exam', 'Sociology', '11 Arts', '2025-06-04', '13:00:00', 64),
(48, 'Grade 11 Arts Final Exam', 'English', '11 Arts', '2025-06-05', '13:00:00', 65);

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`id`, `title`, `description`, `image`) VALUES
(5, 'Library', 'provide facility', 'facility1.jpg'),
(6, 'Largest Play Ground', 'Provide Facility', 'facility2.jpg'),
(7, 'Testy And Healthy Food', 'Provide Facility', 'facilty3.png');

-- --------------------------------------------------------

--
-- Table structure for table `facility_requests`
--

CREATE TABLE `facility_requests` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `pickup_point` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facility_requests`
--

INSERT INTO `facility_requests` (`id`, `name`, `email`, `phone`, `bus_id`, `pickup_point`, `created_at`) VALUES
(1, 'sneha vaghasiya', 'snehavaghasiya016@gmail.com', '9313261642', 2, 'sitanager', '2025-02-14 15:07:59'),
(4, 'sneha vaghasiya', 'snehavaghasiya016@gmail.com', '9313261642', 1, 'varj chok', '2025-02-17 05:05:30'),
(5, 'sneha vaghasiya', 'snehavaghasiya016@gmail.com', '9313261642', 3, 'Adajan Gam, Pal RTO, SGC', '2025-03-07 10:46:10'),
(6, 'sneha vaghasiya', 'snehavaghasiya016@gmail.com', '9313261642', 3, 'Adajan Gam, Pal RTO, SGC', '2025-03-07 10:46:11'),
(7, 'sneha vaghasiya', 'snehavaghasiya016@gmail.com', '9313261642', 3, 'Adajan Gam, Pal RTO, SGC', '2025-03-07 10:47:26'),
(8, 'sneha vaghasiya', 'snehavaghasiya016@gmail.com', '9313261642', 18, 'Althan Ten Road, VIP Road, SGC', '2025-03-14 16:28:45'),
(9, 'sneha vaghasiya', 'snehavaghasiya016@gmail.com', '9313261642', 18, 'Althan Ten Road, VIP Road, SGC', '2025-03-15 05:11:21'),
(10, 'sneha vaghasiya', 'snehavghsiya016@gmail.com', '9313261642', 5, 'Yogi Chowk, Sarthana , SGC', '2025-04-10 14:23:06'),
(11, 'sneha vaghasiya', 'snehavghsiya016@gmail.com', '9313261642', 5, 'Yogi Chowk, Sarthana , SGC', '2025-04-10 14:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `field` enum('BCA','BCOM','BBA','MSC IT','Lab Assistant','Admin Staff','Sports Staff') NOT NULL,
  `designation` varchar(100) NOT NULL,
  `experience` int(11) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `email`, `phone`, `qualification`, `field`, `designation`, `experience`, `contact`, `image`) VALUES
(1, 'sneha vaghasiya', 'sneha@gmail.com', '9313261642', 'BCA , MCA', 'BCA', 'Ad-hoc Professor', 5, '9313261642', 'tech.jpeg'),
(2, 'Monali Patel', 'monali.patel@example.com', '9876543201', 'MCA, PhD', 'BCA', 'Professor', 10, '9876543201', 'tech.jpeg'),
(3, 'Kajal Mehta', 'kajal.mehta@example.com', '9876543202', 'MCA', 'BCA', 'Assistant Professor', 8, '9876543202', 'tech.jpeg'),
(4, 'Isha Shah', 'isha.shah@example.com', '9876543203', 'B.Tech CS', 'BCA', 'Lecturer', 5, '9876543203', 'tech.jpeg'),
(5, 'Dhara Joshi', 'dhara.joshi@example.com', '9876543204', 'M.Sc CS', 'BCA', 'Senior Lecturer', 7, '9876543204', 'tech.jpeg'),
(6, 'Riddhi Desai', 'riddhi.desai@example.com', '9876543205', 'M.Tech IT', 'BCA', 'Professor', 12, '9876543205', 'tech.jpeg'),
(7, 'Pooja Trivedi', 'pooja.trivedi@example.com', '9876543206', 'B.Sc IT', 'BCA', 'Assistant Lecturer', 6, '9876543206', 'tech.jpeg'),
(8, 'Sneha Rana', 'sneha.rana@example.com', '9876543207', 'MCA', 'BCA', 'Lecturer', 4, '9876543207', 'tech.jpeg'),
(9, 'Aarti Bhatt', 'aarti.bhatt@example.com', '9876543208', 'PhD in IT', 'BCA', 'Professor', 15, '9876543208', 'tech.jpeg'),
(10, 'Kavya Shah', 'kavya.shah@example.com', '9876543209', 'MCA, M.Phil', 'BCA', 'Senior Lecturer', 9, '9876543209', 'tech.jpeg'),
(11, 'Nidhi Sharma', 'nidhi.sharma@example.com', '9876543210', 'M.Com', 'BCOM', 'Professor', 10, '9876543210', 'tech.jpeg'),
(12, 'Ankita Goyal', 'ankita.goyal@example.com', '9876543211', 'B.Com', 'BCOM', 'Lecturer', 5, '9876543211', 'tech.jpeg'),
(13, 'Rupal Jain', 'rupal.jain@example.com', '9876543212', 'M.Com', 'BCOM', 'Assistant Professor', 8, '9876543212', 'tech.jpeg'),
(14, 'Disha Shah', 'disha.shah@example.com', '9876543213', 'MBA Finance', 'BCOM', 'Lecturer', 6, '9876543213', 'tech.jpeg'),
(15, 'Heena Chauhan', 'heena.chauhan@example.com', '9876543214', 'M.Com', 'BCOM', 'Professor', 15, '9876543214', 'tech.jpeg'),
(16, 'Payal Vora', 'payal.vora@example.com', '9876543215', 'B.Com, MBA', 'BCOM', 'Senior Lecturer', 9, '9876543215', 'tech.jpeg'),
(17, 'Ria Patel', 'ria.patel@example.com', '9876543216', 'MBA Marketing', 'BBA', 'Professor', 10, '9876543216', 'tech.jpeg'),
(18, 'Tanya Desai', 'tanya.desai@example.com', '9876543217', 'MBA HR', 'BBA', 'Lecturer', 7, '9876543217', 'tech.jpeg'),
(19, 'Sejal Mehta', 'sejal.mehta@example.com', '9876543218', 'MBA Finance', 'BBA', 'Assistant Professor', 8, '9876543218', 'tech.jpeg'),
(20, 'Charmi Shah', 'charmi.shah@example.com', '9876543219', 'BBA, MBA', 'BBA', 'Professor', 12, '9876543219', 'tech.jpeg'),
(21, 'Neha Trivedi', 'neha.trivedi@example.com', '9876543220', 'M.Com, MBA', 'BBA', 'Lecturer', 5, '9876543220', 'tech.jpeg'),
(22, 'Prachi Gohil', 'prachi.gohil@example.com', '9876543221', 'MBA Finance', 'BBA', 'Senior Lecturer', 9, '9876543221', 'tech.jpeg'),
(23, 'Dimple Joshi', 'dimple.joshi@example.com', '9876543222', 'MBA IT', 'BBA', 'Lecturer', 6, '9876543222', 'tech.jpeg'),
(24, 'Naina Shah', 'naina.shah@example.com', '9876543223', 'Diploma Lab Tech', 'Lab Assistant', 'Senior Technician', 10, '9876543223', 'tech.jpeg'),
(25, 'Hetal Vyas', 'hetal.vyas@example.com', '9876543224', 'Diploma Lab Science', 'Lab Assistant', 'Lab Assistant', 7, '9876543224', 'tech.jpeg'),
(26, 'Krupa Patel', 'krupa.patel@example.com', '9876543225', 'B.Sc Lab Science', 'Lab Assistant', 'Technician', 6, '9876543225', 'tech.jpeg'),
(27, 'Mitali Desai', 'mitali.desai@example.com', '9876543226', 'B.Sc Physics', 'Lab Assistant', 'Senior Lab Tech', 9, '9876543226', 'tech.jpeg'),
(28, 'Bhavna Shah', 'bhavna.shah@example.com', '9876543227', 'MBA', 'Admin Staff', 'Admin Officer', 10, '9876543227', 'tech.jpeg'),
(29, 'Shivani Joshi', 'shivani.joshi@example.com', '9876543228', 'BBA', 'Admin Staff', 'HR Manager', 9, '9876543228', 'tech.jpeg'),
(30, 'Ruchika Patel', 'ruchika.patel@example.com', '9876543229', 'B.Com', 'Admin Staff', 'Accountant', 7, '9876543229', 'tech.jpeg'),
(31, 'Divya Mehta', 'divya.mehta@example.com', '9876543230', 'MBA Finance', 'Admin Staff', 'Finance Officer', 6, '9876543230', 'tech.jpeg'),
(32, 'Snehal Gohil', 'snehal.gohil@example.com', '9876543231', 'M.Com', 'Admin Staff', 'Administrative Head', 12, '9876543231', 'tech.jpeg'),
(33, 'Megha Vora', 'megha.vora@example.com', '9876543232', 'M.Sc IT', 'Admin Staff', 'IT Manager', 8, '9876543232', 'tech.jpeg'),
(34, 'Pallavi Shah', 'pallavi.shah@example.com', '9876543233', 'MBA', 'Admin Staff', 'Operations Manager', 11, '9876543233', 'tech.jpeg'),
(35, 'Niyati Chauhan', 'niyati.chauhan@example.com', '9876543234', 'B.Ed, M.P.Ed', 'Sports Staff', 'Sports Coach', 10, '9876543234', 'tech.jpeg'),
(36, 'Ananya Desai', 'ananya.desai@example.com', '9876543235', 'B.Sc Sports Science', 'Sports Staff', 'Trainer', 6, '9876543235', 'tech.jpeg'),
(37, 'Vrunda Patel', 'vrunda.patel@example.com', '9876543236', 'B.P.Ed', 'Sports Staff', 'Athletics Coach', 8, '9876543236', 'tech.jpeg'),
(38, 'Rashmi Patel', 'rashmi.patel@example.com', '9876543237', 'M.Sc IT, PhD', 'MSC IT', 'Professor', 12, '9876543237', 'tech.jpeg'),
(39, 'Vaishali Mehta', 'vaishali.mehta@example.com', '9876543238', 'M.Sc IT', 'MSC IT', 'Assistant Professor', 9, '9876543238', 'tech.jpeg'),
(40, 'Meera Shah', 'meera.shah@example.com', '9876543239', 'M.Sc IT', 'MSC IT', 'Senior Lecturer', 10, '9876543239', 'tech.jpeg'),
(41, 'Nidhi Desai', 'nidhi.desai@example.com', '9876543240', 'M.Sc IT', 'MSC IT', 'Lecturer', 7, '9876543240', 'tech.jpeg'),
(42, 'Pooja Vora', 'pooja.vora@example.com', '9876543241', 'M.Sc IT', 'MSC IT', 'Lab Instructor', 6, '9876543241', 'tech.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_login`
--

CREATE TABLE `faculty_login` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `experience` int(11) NOT NULL,
  `field` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty_login`
--

INSERT INTO `faculty_login` (`id`, `name`, `email`, `phone`, `qualification`, `designation`, `experience`, `field`, `image`, `password`) VALUES
(1, 'Sneha Vaghasiya', 'sneha@gmail.com', '9313261642', 'BCA , MCA', 'Ad-hoc Professor', 5, 'BCA', 'tech.jpeg', 'password1'),
(2, 'Monali Patel', 'monali.patel@example.com', '9876543201', 'MCA, PhD', 'Professor', 10, 'BCA', 'tech.jpeg', 'password2'),
(3, 'Kajal Mehta', 'kajal.mehta@example.com', '9876543202', 'MCA', 'Assistant Professor', 8, 'BCA', 'tech.jpeg', 'password3'),
(4, 'Isha Shah', 'isha.shah@example.com', '9876543203', 'B.Tech CS', 'Lecturer', 5, 'BCA', 'tech.jpeg', 'password4'),
(5, 'Dhara Joshi', 'dhara.joshi@example.com', '9876543204', 'M.Sc CS', 'Senior Lecturer', 7, 'BCA', 'tech.jpeg', 'password5'),
(6, 'Riddhi Desai', 'riddhi.desai@example.com', '9876543205', 'M.Tech IT', 'Professor', 12, 'BCA', 'tech.jpeg', 'password6'),
(7, 'Pooja Trivedi', 'pooja.trivedi@example.com', '9876543206', 'B.Sc IT', 'Assistant Lecturer', 6, 'BCA', 'tech.jpeg', 'password7'),
(8, 'Sneha Rana', 'sneha.rana@example.com', '9876543207', 'MCA', 'Lecturer', 4, 'BCA', 'tech.jpeg', 'password8'),
(9, 'Aarti Bhatt', 'aarti.bhatt@example.com', '9876543208', 'PhD in IT', 'Professor', 15, 'BCA', 'tech.jpeg', 'password9'),
(10, 'Kavya Shah', 'kavya.shah@example.com', '9876543209', 'MCA, M.Phil', 'Senior Lecturer', 9, 'BCA', 'tech.jpeg', 'password10'),
(11, 'Nidhi Sharma', 'nidhi.sharma@example.com', '9876543210', 'M.Com', 'Professor', 10, 'BCOM', 'tech.jpeg', 'password11'),
(12, 'Ankita Goyal', 'ankita.goyal@example.com', '9876543211', 'B.Com', 'Lecturer', 5, 'BCOM', 'tech.jpeg', 'password12'),
(13, 'Rupal Jain', 'rupal.jain@example.com', '9876543212', 'M.Com', 'Assistant Professor', 8, 'BCOM', 'tech.jpeg', 'password13'),
(14, 'Disha Shah', 'disha.shah@example.com', '9876543213', 'MBA Finance', 'Lecturer', 6, 'BCOM', 'tech.jpeg', 'password14'),
(15, 'Heena Chauhan', 'heena.chauhan@example.com', '9876543214', 'M.Com', 'Professor', 15, 'BCOM', 'tech.jpeg', 'password15'),
(16, 'Payal Vora', 'payal.vora@example.com', '9876543215', 'B.Com, MBA', 'Senior Lecturer', 9, 'BCOM', 'tech.jpeg', 'password16'),
(17, 'Ria Patel', 'ria.patel@example.com', '9876543216', 'MBA Marketing', 'Professor', 10, 'BBA', 'tech.jpeg', 'password17'),
(18, 'Tanya Desai', 'tanya.desai@example.com', '9876543217', 'MBA HR', 'Lecturer', 7, 'BBA', 'tech.jpeg', 'password18'),
(19, 'Sejal Mehta', 'sejal.mehta@example.com', '9876543218', 'MBA Finance', 'Assistant Professor', 8, 'BBA', 'tech.jpeg', 'password19'),
(20, 'Charmi Shah', 'charmi.shah@example.com', '9876543219', 'BBA, MBA', 'Professor', 12, 'BBA', 'tech.jpeg', 'password20'),
(21, 'Neha Trivedi', 'neha.trivedi@example.com', '9876543220', 'M.Com, MBA', 'Lecturer', 5, 'BBA', 'tech.jpeg', 'password21'),
(22, 'Prachi Gohil', 'prachi.gohil@example.com', '9876543221', 'MBA Finance', 'Senior Lecturer', 9, 'BBA', 'tech.jpeg', 'password22'),
(23, 'Dimple Joshi', 'dimple.joshi@example.com', '9876543222', 'MBA IT', 'Lecturer', 6, 'BBA', 'tech.jpeg', 'password23'),
(24, 'Naina Shah', 'naina.shah@example.com', '9876543223', 'Diploma Lab Tech', 'Senior Technician', 10, 'Lab Assistant', 'tech.jpeg', 'password24'),
(25, 'Hetal Vyas', 'hetal.vyas@example.com', '9876543224', 'Diploma Lab Science', 'Lab Assistant', 7, 'Lab Assistant', 'tech.jpeg', 'password25');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(11) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `paid` decimal(10,2) NOT NULL,
  `due` decimal(10,2) NOT NULL,
  `status` enum('Paid','Pending') NOT NULL,
  `receipt_number` varchar(20) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `student_id`, `amount`, `paid`, `due`, `status`, `receipt_number`, `payment_date`) VALUES
(6, '0', 12000.00, 6000.00, 6000.00, 'Pending', 'REC67a8b9c2446b2', '2025-02-09 14:20:50'),
(7, '0', 12000.00, 6000.00, 6000.00, 'Pending', 'REC67a8b9e781223', '2025-02-09 14:21:27'),
(8, '0', 12000.00, 6000.00, 6000.00, 'Pending', 'REC67a8b9f3b7347', '2025-02-09 14:21:39'),
(9, '0', 12000.00, 6000.00, 6000.00, 'Pending', 'REC67a8ba03c258a', '2025-02-09 14:21:55'),
(10, 'S2025296', 12000.00, 6000.00, 6000.00, 'Pending', 'REC9161', '2025-02-09 14:35:19'),
(11, 'S2025683', 12000.00, 6000.00, 6000.00, 'Pending', 'REC9956', '2025-02-09 17:34:47'),
(12, 'S2025296', 12000.00, 30000.00, -18000.00, 'Paid', 'REC5426', '2025-02-20 15:22:05');

-- --------------------------------------------------------

--
-- Table structure for table `fees_payment`
--

CREATE TABLE `fees_payment` (
  `id` int(11) NOT NULL,
  `admission_id` varchar(50) NOT NULL,
  `payment_date` date NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fees_payment`
--

INSERT INTO `fees_payment` (`id`, `admission_id`, `payment_date`, `amount_paid`) VALUES
(1, 'ADM8991', '2025-03-05', 50000.00);

-- --------------------------------------------------------

--
-- Table structure for table `fees_structure`
--

CREATE TABLE `fees_structure` (
  `id` int(11) NOT NULL,
  `standard` varchar(50) NOT NULL,
  `registration_fee` decimal(10,2) NOT NULL,
  `composite_fee` decimal(10,2) NOT NULL,
  `hostel_fee` decimal(10,2) DEFAULT 0.00,
  `frequency` enum('One Time','Yearly','Monthly') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fees_structure`
--

INSERT INTO `fees_structure` (`id`, `standard`, `registration_fee`, `composite_fee`, `hostel_fee`, `frequency`) VALUES
(2, 'Pre-Primary', 4000.00, 12000.00, 10000.00, 'Yearly'),
(3, 'Class 1', 5000.00, 15000.00, 12000.00, 'Yearly'),
(4, 'Class 2', 5200.00, 16000.00, 12500.00, 'Yearly'),
(5, 'Class 3', 5400.00, 17000.00, 13000.00, 'Yearly'),
(6, 'Class 4', 5600.00, 18000.00, 13500.00, 'Yearly'),
(7, 'Class 5', 5800.00, 19000.00, 14000.00, 'Yearly'),
(8, 'Class 6', 7000.00, 21000.00, 15000.00, 'Yearly'),
(9, 'Class 7', 7500.00, 22000.00, 15500.00, 'Yearly'),
(10, 'Class 8', 8000.00, 23000.00, 16000.00, 'Yearly'),
(11, 'Class 9', 9000.00, 25000.00, 18000.00, 'Yearly'),
(12, 'Class 10', 9500.00, 26000.00, 18500.00, 'Yearly'),
(13, 'Class 11 Arts', 11000.00, 28000.00, 20000.00, 'Yearly'),
(14, 'Class 11 Commerce', 11500.00, 30000.00, 21000.00, 'Yearly'),
(15, 'Class 11 Science', 12000.00, 35000.00, 22000.00, 'Yearly'),
(16, 'Class 12 Arts', 11500.00, 29000.00, 20500.00, 'Yearly'),
(17, 'Class 12 Commerce', 12000.00, 31000.00, 21500.00, 'Yearly'),
(18, 'Class 12 Science', 12500.00, 36000.00, 22500.00, 'Yearly');

-- --------------------------------------------------------

--
-- Table structure for table `food_schedule`
--

CREATE TABLE `food_schedule` (
  `id` int(11) NOT NULL,
  `day` varchar(20) NOT NULL,
  `morning_snacks` varchar(255) DEFAULT NULL,
  `breakfast` varchar(255) DEFAULT NULL,
  `lunch` varchar(255) DEFAULT NULL,
  `evening_snacks` varchar(255) DEFAULT NULL,
  `dinner` varchar(255) DEFAULT NULL,
  `late_night_snacks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_schedule`
--

INSERT INTO `food_schedule` (`id`, `day`, `morning_snacks`, `breakfast`, `lunch`, `evening_snacks`, `dinner`, `late_night_snacks`) VALUES
(1, 'Monday', 'Biscuits & Tea', 'Poha & Tea', 'Dal, Rice, Veg Sabzi', 'Samosa & Tea', 'Paneer Curry & Roti', 'Milk & Cookies'),
(2, 'Tuesday', 'Namkeen & Tea', 'Idli & Sambhar', 'Rajma Chawal', 'Bread Pakora', 'Aloo Sabzi & Roti', 'Fruit Salad'),
(3, 'Wednesday', 'Cookies & Tea', 'Upma & Tea', 'Chole Bhature', 'Veg Puff', 'Kadhi & Rice', 'Milkshake'),
(4, 'Thursday', 'Sprouts & Tea', 'Paratha & Curd', 'Mixed Veg & Rice', 'Maggi', 'Palak Paneer & Roti', 'Dry Fruits'),
(5, 'Friday', 'Toast & Tea', 'Dhokla & Chutney', 'Paneer Pulao', 'French Fries', 'Vegetable Biryani', 'Hot Chocolate'),
(6, 'Saturday', 'Chips & Tea', 'Sandwiches', 'Aloo Pulao', 'Momos', 'Malai Kofta & Roti', 'Yogurt'),
(7, 'Sunday', 'Fruit Bowl', 'Pancakes & Honey', 'Special Thali', 'Pizza Slice', 'Dal Makhani & Naan', 'Ice Cream');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `category`, `image`, `description`) VALUES
(3, 'Janmasthami ', 'image/WhatsApp Image 2025-02-18 at 11.25.03 AM (1).jpeg', 'janmasthami celebration'),
(4, 'Janmasthami ', 'image/jan1.jpeg', 'janmasthami celebration'),
(6, 'Ganesh chaturthi', 'image/WhatsApp Image 2025-02-18 at 11.48.24 AM (1).jpeg', 'Ganesha'),
(7, 'Tour', 'image/WhatsApp Image 2025-02-18 at 11.51.11 AM.jpeg', 'Tour'),
(8, 'Seminar', 'image/SEMINAR1.jpg', 'SEMINAR'),
(9, 'Seminar', 'image/SEMINAR2.jpg', 'SEMINAR'),
(10, 'Seminar', 'image/SEMINAR3.jpg', 'SEMINAR'),
(11, 'Navratri', 'image/NAVRATRI1.jpg', 'NAVRATRI'),
(12, 'Navratri', 'image/NAVRATRI2.jpg', 'NAVRATRI'),
(13, 'Navratri', 'image/NAVRATRI3.jpg', 'NAVRATRI'),
(14, 'Navratri', 'image/NAVRATRI4.jpg', 'NAVRATRI'),
(15, 'Navratri', 'image/NAVRATRI5.jpg', 'NAVRATRI'),
(16, 'Day Celebration', 'image/DAY1.jpg', 'DAY CELEBRATION'),
(17, 'Yoga', 'image/YOGA1.jpeg', 'YOGA'),
(18, 'Yoga', 'image/YOGA2.jpeg', 'YOGA'),
(19, 'Yoga', 'image/YOGA3.jpg', 'YOGA'),
(20, 'Yoga', 'image/YOGA4.jpg', 'YOGA'),
(21, 'Mehandi Competition', 'image/MEHANDI1.jpeg', 'MEHANDI');

-- --------------------------------------------------------

--
-- Table structure for table `girls_hostel_rules`
--

CREATE TABLE `girls_hostel_rules` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `rule_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `girls_hostel_rules`
--

INSERT INTO `girls_hostel_rules` (`id`, `title`, `rule_text`) VALUES
(1, '1. Entry Timings', 'All residents must return to the hostel by 9:00 PM. Late entries are not permitted without prior approval.'),
(2, '2. Visitors', 'Visitors are only allowed in the designated visitor area during visiting hours from 4:00 PM to 7:00 PM.'),
(3, '3. Silence Hours', 'Maintain silence from 10:00 PM to 6:00 AM to ensure a peaceful environment for all.'),
(4, '4. Cleanliness', 'All residents are required to keep their rooms and common areas clean and tidy.'),
(5, '5. Attendance', 'Daily attendance will be taken at 9:00 PM. Absentees without prior notice will be reported.'),
(6, '6. ID Cards', 'Hostel ID cards must be carried at all times and shown upon request by authorities.'),
(7, '7. Electrical Appliances', 'Personal electrical appliances like heaters and induction cookers are not allowed.'),
(8, '8. Cooking', 'Cooking inside the rooms is strictly prohibited.'),
(9, '9. Ragging', 'Ragging in any form is strictly prohibited and punishable by law.'),
(10, '10. Substance Prohibition', 'Smoking, alcohol, and drug use are strictly banned within hostel premises.'),
(11, '11. Security', 'Ensure your rooms are locked when unattended. The hostel is not responsible for lost valuables.'),
(12, '12. Dress Code', 'Residents must wear appropriate attire in common areas.'),
(13, '13. Emergencies', 'In case of any emergency, immediately contact the warden or hostel staff.'),
(14, '14. Complaints', 'Residents may submit complaints or suggestions to the hostel office during working hours.'),
(15, '15. Departure', 'Permission must be taken from the warden before leaving the hostel overnight or for holidays.');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_admin`
--

CREATE TABLE `hostel_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hostel_admin`
--

INSERT INTO `hostel_admin` (`id`, `username`, `email`, `password`) VALUES
(2, 'hostel admin', 'admin@example.com', 'c7753557b59d251571c55a79ef78ee4a');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_attendance`
--

CREATE TABLE `hostel_attendance` (
  `id` int(11) NOT NULL,
  `admission_id` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hostel_attendance`
--

INSERT INTO `hostel_attendance` (`id`, `admission_id`, `date`, `status`) VALUES
(1, 'ADM8991', '2025-03-05', 'Present'),
(2, 'ADM8991', '2025-03-05', 'Present'),
(3, 'ADM8991', '2025-03-14', 'Absent'),
(4, 'ADM9461', '2025-03-14', 'Present'),
(5, '0', '2025-03-14', 'Present'),
(6, 'ADM8991', '2025-03-15', 'Present'),
(7, 'ADM9461', '2025-04-11', 'Present'),
(8, 'ADM8733', '2025-04-11', 'Present'),
(9, 'ADM5115', '2025-04-11', 'Present'),
(10, 'ADM2991', '2025-04-11', 'Present'),
(11, 'ADM6540', '2025-04-11', 'Present'),
(12, 'ADM2586', '2025-04-11', 'Absent'),
(13, 'ADM8991', '2025-04-11', 'Absent');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_contact`
--

CREATE TABLE `hostel_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hostel_contact`
--

INSERT INTO `hostel_contact` (`id`, `name`, `email`, `phone`, `message`, `date`, `status`) VALUES
(1, 'sneha vaghasiya', 'snehavaghasiya016@gmail.com', '9313261642', 'best', '2025-03-05', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_facilities`
--

CREATE TABLE `hostel_facilities` (
  `id` int(11) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hostel_facilities`
--

INSERT INTO `hostel_facilities` (`id`, `icon`, `title`, `description`) VALUES
(1, 'fa-solid fa-wifi', 'Free Wi-Fi', 'Enjoy high-speed internet connectivity throughout the hostel.'),
(2, 'fa-solid fa-shield', '24x7 Security', 'Our hostel is under 24/7 CCTV surveillance for maximum safety.'),
(3, 'fa-solid fa-utensils', 'Hygienic Canteen', 'Healthy and tasty food served with cleanliness ensured.'),
(4, 'fa-solid fa-water', 'RO Drinking Water', 'Pure and clean drinking water is available on every floor.'),
(5, 'fa-solid fa-bolt', 'Power Backup', 'Uninterrupted electricity with generator and inverter support.'),
(6, 'fa-solid fa-broom', 'Daily Cleaning', 'Rooms, corridors, and bathrooms are cleaned daily.'),
(7, 'fa-solid fa-first-aid', 'Medical Assistance', 'First aid and emergency medical support available anytime.'),
(8, 'fa-solid fa-tv', 'Common Room', 'Relax with TV, newspapers, and indoor games in the common room.'),
(9, 'fa-solid fa-tshirt', 'Laundry Service', 'Affordable laundry facilities for clean clothes every week.'),
(10, 'fa-solid fa-tree', 'Garden Area', 'Green and peaceful garden space for fresh air and relaxation.'),
(11, 'fa-solid fa-utensils', 'Mess Facility', 'Healthy and hygienic meals served daily.'),
(12, 'fa-solid fa-shower', 'Hot Water', 'Hot water available 24/7 for showers.'),
(13, 'fa-solid fa-lock', 'Secure Lockers', 'Personal lockers for all residents.'),
(14, 'fa-solid fa-book', 'Study Room', 'Quiet and comfortable study area.'),
(15, 'fa-solid fa-tv', 'Entertainment Room', 'TV and indoor games available.'),
(16, 'fa-solid fa-fire-extinguisher', 'Fire Safety', 'Fully equipped with fire safety.'),
(17, 'fa-solid fa-users', 'Visitor Lounge', 'Comfortable area for guests.');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_fees`
--

CREATE TABLE `hostel_fees` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `standard_course` varchar(50) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `fees` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hostel_fees`
--

INSERT INTO `hostel_fees` (`id`, `category`, `standard_course`, `room_type`, `fees`) VALUES
(1, 'School', '5', 'Single Room', 30000.00),
(2, 'School', '5', 'Double Room', 25000.00),
(3, 'School', '6', 'Single Room', 35000.00),
(4, 'School', '6', 'Double Room', 30000.00),
(5, 'School', '7', 'Single Room', 45000.00),
(6, 'School', '7', 'Double Room', 35000.00),
(7, 'School', '8', 'Single Room', 50000.00),
(8, 'School', '8', 'Double Room', 40000.00),
(9, 'School', '9', 'Single Room', 55000.00),
(10, 'School', '10', 'Single Room', 60000.00),
(11, 'School', '11', 'Single Room', 65000.00),
(12, 'School', '5', 'Dormitory', 20000.00),
(13, 'School', '5', 'AC Room', 50000.00),
(14, 'School', '5', 'Non-AC Room', 20000.00),
(15, 'School', '6', 'Dormitory', 25000.00),
(16, 'School', '6', 'AC Room', 50000.00),
(17, 'School', '6', 'Non-AC Room', 25000.00),
(18, 'School', '7', 'Dormitory', 30000.00),
(19, 'School', '7', 'AC Room', 60000.00),
(20, 'School', '7', 'Non-AC Room', 30000.00),
(21, 'School', '8', 'Double Room', 40000.00),
(22, 'School', '8', 'Dormitory', 35000.00),
(23, 'School', '8', 'AC Room', 60000.00),
(24, 'School', '8', 'Non-AC Room', 35000.00),
(25, 'School', '9', 'Double Room', 45000.00),
(26, 'School', '9', 'Dormitory', 40000.00),
(27, 'School', '9', 'AC Room', 70000.00),
(28, 'School', '9', 'Non-AC Room', 40000.00),
(29, 'School', '10', 'Double Room', 50000.00),
(30, 'School', '10', 'Dormitory', 45000.00),
(31, 'School', '10', 'AC Room', 70000.00),
(32, 'School', '10', 'Non-AC Room', 45000.00),
(33, 'School', '11', 'Double Room', 55000.00),
(34, 'School', '11', 'Dormitory', 50000.00),
(35, 'School', '11', 'AC Room', 80000.00),
(36, 'School', '11', 'Non-AC Room', 50000.00),
(37, 'School', '12', 'Double Room', 60000.00),
(38, 'School', '12', 'Dormitory', 55000.00),
(39, 'School', '12', 'AC Room', 80000.00),
(40, 'School', '12', 'Non-AC Room', 55000.00),
(41, 'College', 'BBA', 'Single Room', 80000.00),
(42, 'College', 'BBA', 'Double Room', 70000.00),
(43, 'College', 'BBA', 'Dormitory', 50000.00),
(44, 'College', 'BBA', 'AC Room', 90000.00),
(45, 'College', 'BBA', 'Non-AC Room', 100000.00),
(46, 'College', 'BCA', 'Single Room', 80000.00),
(47, 'College', 'BCA', 'Double Room', 70000.00),
(48, 'College', 'BCA', 'Dormitory', 50000.00),
(49, 'College', 'BCA', 'AC Room', 90000.00),
(50, 'College', 'BCA', 'Non-AC Room', 100000.00),
(51, 'College', 'BCOM', 'Single Room', 80000.00),
(52, 'College', 'BCOM', 'Double Room', 70000.00),
(53, 'College', 'BCOM', 'Dormitory', 50000.00),
(54, 'College', 'BCOM', 'AC Room', 90000.00),
(55, 'College', 'BCOM', 'Non-AC Room', 100000.00),
(56, 'College', 'MSC IT', 'Single Room', 80000.00),
(57, 'College', 'MSC IT', 'Double Room', 70000.00),
(58, 'College', 'MSC IT', 'Dormitory', 50000.00),
(59, 'College', 'MSC IT', 'AC Room', 90000.00),
(60, 'College', 'MSC IT', 'Non-AC Room', 100000.00);

-- --------------------------------------------------------

--
-- Table structure for table `hostel_student`
--

CREATE TABLE `hostel_student` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `school_college` varchar(150) NOT NULL,
  `class` varchar(50) DEFAULT NULL,
  `room_type` varchar(50) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `guardian_name` varchar(100) DEFAULT NULL,
  `guardian_contact` varchar(20) DEFAULT NULL,
  `admission_id` varchar(50) DEFAULT NULL,
  `status` enum('Pending','Confirmed','Allocated') DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hostel_student`
--

INSERT INTO `hostel_student` (`id`, `name`, `email`, `school_college`, `class`, `room_type`, `contact`, `guardian_name`, `guardian_contact`, `admission_id`, `status`, `created_at`) VALUES
(1, 'sneha vaghsiya', 'snehavaghasiya016@gmail.com', 'college', 'BCA', 'AC Room', '9313261642', 'kishorbhai vaghasiya', '1234567890', 'ADM8991', '', '2025-03-05 07:42:08'),
(2, 'Riya patel', 'snehavaghasiya016@gmail.com', 'school', '12', 'Non-AC Room', '1234567890', 'nikeshbhai patel', '9234567890', 'ADM9461', 'Confirmed', '2025-03-14 17:55:03'),
(3, 'Riya patel', 'snehavaghasiya016@gmail.com', 'school', '12', 'Non-AC Room', '1234567890', 'nikeshbhai patel', '9234567890', 'ADM8733', 'Confirmed', '2025-03-14 17:59:05'),
(4, 'hetvi patel', 'snehavaghasiya016@gmail.com', 'school', '11', 'Double Room', '9313261642', 'nareshbhai', '1234567890', 'ADM5115', 'Confirmed', '2025-03-14 18:00:49'),
(5, 'hetvi patel', 'snehavaghasiya016@gmail.com', 'school', '11', 'Double Room', '9313261642', 'nareshbhai', '1234567890', 'ADM2991', 'Confirmed', '2025-03-14 18:02:38'),
(6, 'domadiya himanshi', 'snehavaghasiya016@gmail.com', 'school', '10', 'Non-AC Room', '9313261642', 'mukeshbhai domadiya', '1234567890', 'ADM6540', 'Confirmed', '2025-03-15 02:44:13'),
(7, 'hetvi vaghasiya', 'snehavghsiya016@gmail.com', 'school', '10', 'AC Room', '9313261642', 'nareshbhai', '1234567890', 'ADM2586', 'Allocated', '2025-04-11 18:29:38');

-- --------------------------------------------------------

--
-- Table structure for table `leave_application`
--

CREATE TABLE `leave_application` (
  `id` int(11) NOT NULL,
  `admission_id` varchar(50) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `applied_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `leave_status` varchar(20) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_application`
--

INSERT INTO `leave_application` (`id`, `admission_id`, `reason`, `from_date`, `to_date`, `applied_date`, `leave_status`) VALUES
(3, 'ADM8991', 'medical issue', '2025-03-09', '2025-03-11', '2025-03-06 05:30:38', 'Approved'),
(4, 'ADM8991', 'marriage', '2025-03-08', '2025-03-12', '2025-03-07 16:57:02', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `name` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `image`, `message`, `name`, `role`) VALUES
(5, 'message1.jpg', 'Welcome to our community, where every campus is empowered to thrive! Here, you\'ll find resources, inspiration, and support to navigate your academic journey, balance your social life, and prioritize your well-being. Our platform is designed to help you achieve your goals, whether it\'s acing that next exam, finding the perfect internship, or simply taking care of your mental health. Join us in celebrating your strengths, sharing your stories, and building a brighter future together. We\'re here for you, every step of the way!\r\n\r\n', 'Nikesh Mehta1', 'chairman2'),
(6, 'message3.jpg', 'Dear Students, Parents, Faculty, and Visitors,\r\n\r\nWelcome to campus, where we are dedicated to nurturing the minds and empowering the futures of young women. As the Principal, it is my privilege to lead an institution that prides itself on academic excellence, innovative teaching, and the holistic development of each student. Our talented faculty, cutting-edge facilities, and diverse curriculum are all designed to provide a supportive and stimulating environment where students can thrive academically and personally.\r\n\r\nAt Vishwabharti Girls College, we believe in fostering a community that values inclusivity, creativity, and leadership. Our goal is to prepare our students not just for successful careers, but also for meaningful lives as confident and compassionate individuals. I invite you to explore our website to learn more about our programs, campus life, and the many opportunities we offer. Together, we are building a bright and promising future for all our students.\r\n\r\n', 'Urmila sarma', 'Principal'),
(7, 'messege2.jpg', 'Dear Students, Faculty, Staff, Alumni, and Visitors,\r\n\r\n \r\n\r\nWelcome to campus. As Chairman of the Board of Trustees, it is my great pleasure to extend a warm greeting to you. Our college is dedicated to providing an exceptional educational experience that fosters academic excellence, innovation, and personal growth. We pride ourselves on our diverse and inclusive community, where every member is encouraged to explore their potential and contribute to the collective success of our institution.\r\n\r\n \r\n\r\nAt Vishwabharti Girls College, we believe in the transformative power of education and the importance of community engagement. Our state-of-the-art facilities, dedicated faculty, and vibrant student life offer a unique environment where ideas thrive and futures are shaped. Whether you are a prospective student, a current member of our college family, or an alumnus, I invite you to explore our website and discover the many opportunities available here. Together, we are building a brighter future through knowledge, innovation, and collaboration.', 'Rahul mehta', 'Founder');

-- --------------------------------------------------------

--
-- Table structure for table `mess_rules`
--

CREATE TABLE `mess_rules` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `rule_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mess_rules`
--

INSERT INTO `mess_rules` (`id`, `title`, `rule_text`) VALUES
(1, 'Meal Timings', 'Meals are served strictly as per the schedule. Late arrivals may not be served.'),
(2, 'Cleanliness', 'Every student must ensure cleanliness of their table after eating.'),
(3, 'Food Wastage', 'Avoid wastage of food. Take only the amount you can consume.'),
(4, 'ID Card Mandatory', 'Students must carry their mess ID card to receive meals.'),
(5, 'Guest Meals', 'Guests are allowed with prior approval and additional payment.'),
(6, 'Seating Arrangement', 'Follow the seating plan as instructed during peak hours.'),
(7, 'Personal Utensils', 'Bringing personal utensils is not allowed inside the mess.'),
(8, 'Discipline', 'Maintain discipline and avoid making noise while dining.'),
(9, 'Feedback', 'Any complaints or suggestions should be submitted to the mess manager.');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `timestamp` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `title`, `description`, `timestamp`) VALUES
(10, 'Holiday Notice', 'The campus will remain closed on 15th August for Independence Day. All classes will resume on 16th August.', '2025-04-10 20:36:03'),
(11, 'Exam Schedule', 'The final exams will be conducted from 1st September to 10th September. Please check the notice board for the detailed schedule.', '2025-04-10 20:36:03'),
(12, 'New Admission Open', 'The admissions for the upcoming session are now open. Please submit your applications by 30th June.', '2025-04-10 20:36:03'),
(13, 'Staff Meeting', 'A staff meeting is scheduled for 5th July at 10:00 AM in the conference room. All staff members are requested to attend.', '2025-04-10 20:36:03'),
(14, 'Maintenance Break', 'The school will be closed on 20th July for maintenance work. There will be no classes on that day.', '2025-04-10 20:36:03'),
(15, 'Annual Sports Day', 'The Annual Sports Day is scheduled for 25th December. All students are encouraged to participate. Further details will be shared soon.', '2025-04-10 20:36:03');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `course` varchar(50) NOT NULL,
  `semester` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` enum('Credit Card','Debit Card','Net Banking','UPI','Cash') NOT NULL,
  `payment_status` enum('Paid','Pending') NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `student_id`, `student_name`, `course`, `semester`, `amount`, `payment_method`, `payment_status`, `payment_date`) VALUES
(1, 'STU4002', 'Aarohi Mehta', 'BCA', 1, 23000.00, 'Cash', 'Paid', '2025-02-20 15:54:19'),
(2, 'STU1002', 'Aarohi Shah', 'BCA', 1, 12000.00, 'Cash', 'Paid', '2025-02-20 16:14:44'),
(3, 'STU2008', 'Simran Bhatt', 'BCA', 1, 50000.00, 'Cash', 'Paid', '2025-03-14 17:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `placements`
--

CREATE TABLE `placements` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `package` decimal(5,2) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `placements`
--

INSERT INTO `placements` (`id`, `student_name`, `company`, `package`, `year`) VALUES
(1, 'Aarti Patel', 'TCS', 3.50, '2023'),
(2, 'Neha Shah', 'Infosys', 4.20, '2023'),
(3, 'Kavita Mehta', 'Wipro', 3.80, '2022'),
(4, 'Pooja Sharma', 'Capgemini', 4.00, '2022'),
(5, 'Rina Joshi', 'Accenture', 5.00, '2021'),
(6, 'Sneha Verma', 'Tech Mahindra', 3.60, '2021'),
(7, 'Dipti Desai', 'IBM', 4.50, '2020'),
(8, 'Sonali Patel', 'Cognizant', 3.70, '2020'),
(9, 'Bhavna Trivedi', 'Amazon', 12.00, '2019'),
(10, 'Komal Chauhan', 'Google', 15.00, '2019');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `room_type` varchar(100) NOT NULL,
  `capacity` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `image`, `room_type`, `capacity`, `description`) VALUES
(1, 'room1.jpg', 'Single Room', 1, 'A cozy single room with a study table and bed.'),
(2, 'room2.jpg', 'Double Room', 2, 'A shared room with two beds and storage space.'),
(3, 'room3.jpg', 'Dormitory', 4, 'Spacious dormitory for four students with lockers.'),
(4, 'room4.jpg', 'AC Room', 1, 'An air-conditioned room with attached bathroom.'),
(5, 'room5.jpg', 'Non-AC Room', 2, 'Non-AC shared room with ample ventilation.');

-- --------------------------------------------------------

--
-- Table structure for table `room_allocation`
--

CREATE TABLE `room_allocation` (
  `id` int(11) NOT NULL,
  `admission_id` varchar(20) DEFAULT NULL,
  `room_no` varchar(10) DEFAULT NULL,
  `allocation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_allocation`
--

INSERT INTO `room_allocation` (`id`, `admission_id`, `room_no`, `allocation_date`) VALUES
(1, 'ADM8991', '2', '2025-03-05'),
(2, '', '3', '2025-04-11'),
(3, 'ADM2586', '1', '2025-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `room_number`
--

CREATE TABLE `room_number` (
  `id` int(11) NOT NULL,
  `room_no` varchar(20) NOT NULL,
  `room_type` enum('AC Room','Non-AC Room','Double Room','Dormitory Room','Single Room') NOT NULL,
  `status` enum('Available','Occupied') DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_number`
--

INSERT INTO `room_number` (`id`, `room_no`, `room_type`, `status`) VALUES
(1, '1', 'AC Room', 'Occupied'),
(2, '2', 'AC Room', 'Occupied'),
(3, '3', 'AC Room', 'Occupied'),
(4, '4', 'AC Room', 'Available'),
(5, '5', 'AC Room', 'Available'),
(6, '6', 'AC Room', 'Available'),
(7, '7', 'AC Room', 'Available'),
(8, '8', 'AC Room', 'Available'),
(9, '9', 'AC Room', 'Available'),
(10, '10', 'AC Room', 'Available'),
(11, '11', 'Non-AC Room', 'Available'),
(12, '12', 'Non-AC Room', 'Available'),
(13, '13', 'Non-AC Room', 'Available'),
(14, '14', 'Non-AC Room', 'Available'),
(15, '15', 'Non-AC Room', 'Available'),
(16, '16', 'Non-AC Room', 'Available'),
(17, '17', 'Non-AC Room', 'Available'),
(18, '18', 'Non-AC Room', 'Available'),
(19, '19', 'Non-AC Room', 'Available'),
(20, '20', 'Non-AC Room', 'Available'),
(21, '21', 'Double Room', 'Available'),
(22, '22', 'Double Room', 'Available'),
(23, '23', 'Double Room', 'Available'),
(24, '24', 'Double Room', 'Available'),
(25, '25', 'Double Room', 'Available'),
(26, '26', 'Double Room', 'Available'),
(27, '27', 'Double Room', 'Available'),
(28, '28', 'Double Room', 'Available'),
(29, '29', 'Double Room', 'Available'),
(30, '30', 'Double Room', 'Available'),
(31, '31', 'Dormitory Room', 'Available'),
(32, '32', 'Dormitory Room', 'Available'),
(33, '33', 'Dormitory Room', 'Available'),
(34, '34', 'Dormitory Room', 'Available'),
(35, '35', 'Dormitory Room', 'Available'),
(36, '36', 'Dormitory Room', 'Available'),
(37, '37', 'Dormitory Room', 'Available'),
(38, '38', 'Dormitory Room', 'Available'),
(39, '39', 'Dormitory Room', 'Available'),
(40, '40', 'Dormitory Room', 'Available'),
(41, '41', 'Single Room', 'Available'),
(42, '42', 'Single Room', 'Available'),
(43, '43', 'Single Room', 'Available'),
(44, '44', 'Single Room', 'Available'),
(45, '45', 'Single Room', 'Available'),
(46, '46', 'Single Room', 'Available'),
(47, '47', 'Single Room', 'Available'),
(48, '48', 'Single Room', 'Available'),
(49, '49', 'Single Room', 'Available'),
(50, '50', 'Single Room', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `title`, `description`) VALUES
(1, 'Attendance Policy', 'Students must maintain at least 75% attendance to be eligible for examinations.'),
(2, 'Dress Code', 'Students are required to wear formal attire on campus at all times.'),
(3, 'Library Rules', 'Maintain silence in the library. Mobile phones must be switched off.'),
(4, 'Exam Conduct', 'Any form of cheating during examinations will lead to disqualification.'),
(5, 'Identity Card', 'Students must carry their college ID card at all times on campus.'),
(6, 'Mobile Phone Usage', 'Use of mobile phones is strictly prohibited inside classrooms and labs.'),
(7, 'Parking Rules', 'Park vehicles only in the designated parking areas. Unauthorized parking will result in fines.'),
(8, 'Ragging Prohibition', 'Ragging in any form is strictly banned and punishable by law.'),
(9, 'Laboratory Conduct', 'Handle all lab equipment carefully and follow the safety instructions.'),
(10, 'Fee Payment', 'All fees must be paid before the due date to avoid late fines or suspension.'),
(11, 'Leave Application', 'Submit leave applications in advance to the respective department head.'),
(12, 'Cleanliness', 'Maintain cleanliness in classrooms, labs, and public areas of the college.'),
(13, 'Disciplinary Action', 'Any act of misconduct will lead to strict disciplinary actions as per college policy.'),
(14, 'Use of Resources', 'College resources like internet and library materials should be used responsibly.'),
(15, 'Event Participation', 'Participation in college events requires prior approval from faculty advisors.');

-- --------------------------------------------------------

--
-- Table structure for table `scholarships`
--

CREATE TABLE `scholarships` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `course` enum('BCA','MSc IT','BCom','BBA') NOT NULL,
  `type` enum('Merit-Based','Need-Based','Sports','Cultural','Special Category') NOT NULL,
  `trending` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scholarships`
--

INSERT INTO `scholarships` (`id`, `title`, `description`, `amount`, `course`, `type`, `trending`) VALUES
(1, 'Merit Scholarship for BCA', 'Awarded to students with outstanding academic performance in BCA.', 20000.00, 'BCA', 'Merit-Based', 1),
(2, 'Financial Aid for MSc IT', 'Need-based scholarship for students requiring financial assistance in MSc IT.', 15000.00, 'MSc IT', 'Need-Based', 0),
(3, 'Sports Excellence Award', 'Scholarship for students excelling in sports activities.', 18000.00, 'BCom', 'Sports', 1),
(4, 'Cultural Talent Scholarship', 'For students with exceptional achievements in cultural events.', 12000.00, 'BBA', 'Cultural', 0),
(5, 'Special Category Grant', 'Scholarship for differently-abled students in any course.', 25000.00, 'BCA', 'Special Category', 1),
(6, 'Tech Innovation Scholarship', 'Awarded to students who have made significant tech contributions.', 22000.00, 'MSc IT', 'Merit-Based', 1),
(7, 'Low-Income Family Aid', 'Financial aid for students from low-income families.', 13000.00, 'BBA', 'Need-Based', 0),
(8, 'National Level Sports Fund', 'For students representing their institution in national sports events.', 20000.00, 'BCom', 'Sports', 1),
(9, 'Dance & Music Excellence', 'Scholarship for students excelling in dance or music competitions.', 10000.00, 'BBA', 'Cultural', 0),
(10, 'Diversity & Inclusion Scholarship', 'Encourages students from diverse backgrounds to pursue higher education.', 30000.00, 'MSc IT', 'Special Category', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schoolnotic`
--

CREATE TABLE `schoolnotic` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date_posted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schoolnotic`
--

INSERT INTO `schoolnotic` (`id`, `content`, `date_posted`) VALUES
(1, 'holi clebration', '2025-01-19'),
(2, 'holi clebration', '2025-01-19'),
(3, 'holi clebration', '2025-01-19'),
(4, 'holi clebration', '2025-01-19'),
(5, 'holi clebration', '2025-01-19'),
(6, 'holi clebration', '2025-01-19'),
(7, 'holi clebration', '2025-01-19'),
(8, 'holi clebration', '2025-01-19'),
(9, 'holi clebration', '2025-01-19');

-- --------------------------------------------------------

--
-- Table structure for table `school_admin`
--

CREATE TABLE `school_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_admin`
--

INSERT INTO `school_admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'school admin', '0192023a7bbd73250516f069df18b500', 'school@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `role` enum('Pre-Primary Staff','Primary Staff','Upper Primary Staff','Secondary Staff','Higher Secondary Science Staff','Higher Secondary Commerce Staff','Higher Secondary Arts Staff') NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_added` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `email`, `contact`, `qualification`, `role`, `image`, `date_added`) VALUES
(5, 'Sneha Vaghasiya', 'sneha.vaghasiya@gmail.com', '1234567890', 'Bachelor of Education', 'Pre-Primary Staff', 'tech.jpeg', '2025-01-30 22:50:09'),
(6, 'Hetvi Patel', 'hetvi.patel@gmail.com', '0987654321', 'Diploma in Early Childhood Education', 'Pre-Primary Staff', 'tech.jpeg', '2025-01-30 22:50:09'),
(7, 'Monali Kotadiya', 'monali.kotadiya@gmail.com', '1122334455', 'Master of Education', 'Pre-Primary Staff', 'tech.jpeg', '2025-01-30 22:50:09'),
(8, 'Bansi Sojitra', 'bansi.sojitra@gmail.com', '2233445566', 'Bachelor of Arts in Education', 'Pre-Primary Staff', 'tech.jpeg', '2025-01-30 22:50:09'),
(9, 'Aarti Desai', 'aarti.desai@gmail.com', '1234567890', 'Bachelor of Education', 'Primary Staff', 'tech.jpeg', '2025-01-30 22:55:30'),
(10, 'Neha Shah', 'neha.shah@gmail.com', '0987654321', 'Diploma in Education', 'Primary Staff', 'tech.jpeg', '2025-01-30 22:55:30'),
(11, 'Priya Patel', 'priya.patel@gmail.com', '1122334455', 'Master of Education', 'Primary Staff', 'tech.jpeg', '2025-01-30 22:55:30'),
(12, 'Rina Gupta', 'rina.gupta@gmail.com', '2233445566', 'Bachelor of Arts in Education', 'Primary Staff', 'tech.jpeg', '2025-01-30 22:55:30'),
(13, 'Shalini Verma', 'shalini.verma@gmail.com', '3344556677', 'Bachelor of Science in Education', 'Primary Staff', 'tech.jpeg', '2025-01-30 22:55:30'),
(14, 'Kajal Bhatt', 'kajal.bhatt@gmail.com', '4455667788', 'Bachelor of Arts in Education', 'Primary Staff', 'tech.jpeg', '2025-01-30 22:55:30'),
(15, 'Maya Mehta', 'maya.mehta@gmail.com', '5566778899', 'Bachelor of Education', 'Primary Staff', 'tech.jpeg', '2025-01-30 22:55:30'),
(16, 'Sweta Joshi', 'sweta.joshi@gmail.com', '6677889900', 'Master of Education', 'Primary Staff', 'tech.jpeg', '2025-01-30 22:55:30'),
(17, 'Anjali Patel', 'anjali.patel@gmail.com', '1234567890', 'Bachelor of Education', 'Upper Primary Staff', 'tech.jpeg', '2025-01-30 22:58:07'),
(18, 'Pooja Shah', 'pooja.shah@gmail.com', '0987654321', 'Master of Education', 'Upper Primary Staff', 'tech.jpeg', '2025-01-30 22:58:07'),
(19, 'Kirti Joshi', 'kirti.joshi@gmail.com', '1122334455', 'Bachelor of Arts in Education', 'Upper Primary Staff', 'tech.jpeg', '2025-01-30 22:58:07'),
(20, 'Sonali Mehta', 'sonali.mehta@gmail.com', '2233445566', 'Bachelor of Science in Education', 'Upper Primary Staff', 'tech.jpeg', '2025-01-30 22:58:07'),
(21, 'Rupal Desai', 'rupal.desai@gmail.com', '3344556677', 'Diploma in Education', 'Upper Primary Staff', 'tech.jpeg', '2025-01-30 22:58:07'),
(22, 'Shubha Reddy', 'shubha.reddy@gmail.com', '1234567890', 'Master of Science in Education', 'Secondary Staff', 'tech.jpeg', '2025-01-30 22:59:46'),
(23, 'Divya Joshi', 'divya.joshi@gmail.com', '0987654321', 'Bachelor of Education', 'Secondary Staff', 'tech.jpeg', '2025-01-30 22:59:46'),
(24, 'Meera Patel', 'meera.patel@gmail.com', '1122334455', 'Master of Arts in Education', 'Secondary Staff', 'tech.jpeg', '2025-01-30 22:59:46'),
(25, 'Kavita Sharma', 'kavita.sharma@gmail.com', '2233445566', 'Bachelor of Arts in Education', 'Secondary Staff', 'tech.jpeg', '2025-01-30 22:59:46'),
(41, 'Amit Gupta', 'amit.gupta@gmail.com', '1234567890', 'Master of Commerce', 'Higher Secondary Commerce Staff', 'tech.jpeg', '2025-01-30 23:02:43'),
(42, 'Rajesh Sharma', 'rajesh.sharma@gmail.com', '0987654321', 'Bachelor of Commerce', 'Higher Secondary Commerce Staff', 'tech.jpeg', '2025-01-30 23:02:43'),
(43, 'Pooja Mehta', 'pooja.mehta@gmail.com', '1122334455', 'Master of Commerce', 'Higher Secondary Commerce Staff', 'tech.jpeg', '2025-01-30 23:02:43'),
(44, 'Seema Joshi', 'seema.joshi@gmail.com', '2233445566', 'Bachelor of Commerce', 'Higher Secondary Commerce Staff', 'tech.jpeg', '2025-01-30 23:02:43'),
(45, 'Kavita Sharma', 'kavita.sharma12@gmail.com', '3344556677', 'Master of Business Administration', 'Higher Secondary Commerce Staff', 'tech.jpeg', '2025-01-30 23:02:43'),
(56, 'Sanjay Kumar', 'sanjay.kumar@gmail.com', '1234567890', 'Master of Science', 'Higher Secondary Science Staff', 'tech.jpeg', '2025-01-30 23:03:55'),
(57, 'Neelam Gupta', 'neelam.gupta@gmail.com', '0987654321', 'Master of Science in Physics', 'Higher Secondary Science Staff', 'tech.jpeg', '2025-01-30 23:03:55'),
(58, 'Vikram Patel', 'vikram.patel@gmail.com', '1122334455', 'Master of Science in Chemistry', 'Higher Secondary Science Staff', 'tech.jpeg', '2025-01-30 23:03:55'),
(59, 'Rupal Desai', 'rupal.desai123@gmail.com', '2233445566', 'Master of Science in Biology', 'Higher Secondary Science Staff', 'tech.jpeg', '2025-01-30 23:03:55'),
(60, 'Maya Mehta', 'maya.mehta12@gmail.com', '3344556677', 'Bachelor of Science in Education', 'Higher Secondary Science Staff', 'tech.jpeg', '2025-01-30 23:03:55'),
(61, 'Anjali Singh', 'anjali.singh@gmail.com', '1234567890', 'Master of Arts in Education', 'Higher Secondary Arts Staff', 'tech.jpeg', '2025-01-30 23:07:09'),
(62, 'Rina Patel', 'rina.patel@gmail.com', '0987654321', 'Bachelor of Arts in Education', 'Higher Secondary Arts Staff', 'tech.jpeg', '2025-01-30 23:07:09'),
(63, 'Neha Verma', 'neha.verma@gmail.com', '1122334455', 'Master of Education', 'Higher Secondary Arts Staff', 'tech.jpeg', '2025-01-30 23:07:09'),
(64, 'Priya Kumari', 'priya.kumari@gmail.com', '2233445566', 'Master of Arts in History', 'Higher Secondary Arts Staff', 'tech.jpeg', '2025-01-30 23:07:09'),
(65, 'Geeta Sharma', 'geeta.sharma@gmail.com', '3344556677', 'Bachelor of Arts in Education', 'Higher Secondary Arts Staff', 'tech.jpeg', '2025-01-30 23:07:09');

-- --------------------------------------------------------

--
-- Table structure for table `staff_login`
--

CREATE TABLE `staff_login` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_login`
--

INSERT INTO `staff_login` (`id`, `name`, `email`, `contact`, `qualification`, `role`, `image`, `created_at`, `password`) VALUES
(5, 'Sneha Vaghasiya', 'sneha.vaghasiya@gmail.com', '1234567890', 'Bachelor of Education', 'Pre-Primary Staff', 'tech.jpeg', '2025-01-30 22:50:09', 'password123'),
(6, 'Hetvi Patel', 'hetvi.patel@gmail.com', '0987654321', 'Diploma in Early Childhood Education', 'Pre-Primary Staff', 'tech.jpeg', '2025-01-30 22:50:09', 'password123'),
(7, 'Monali Kotadiya', 'monali.kotadiya@gmail.com', '1122334455', 'Master of Education', 'Pre-Primary Staff', 'tech.jpeg', '2025-01-30 22:50:09', 'password123'),
(8, 'Bansi Sojitra', 'bansi.sojitra@gmail.com', '2233445566', 'Bachelor of Arts in Education', 'Pre-Primary Staff', 'tech.jpeg', '2025-01-30 22:50:09', 'password123'),
(9, 'Aarti Desai', 'aarti.desai@gmail.com', '1234567890', 'Bachelor of Education', 'Primary Staff', 'tech.jpeg', '2025-01-30 22:55:30', 'password123'),
(10, 'Neha Shah', 'neha.shah@gmail.com', '0987654321', 'Diploma in Education', 'Primary Staff', 'tech.jpeg', '2025-01-30 22:55:30', 'password123'),
(11, 'Priya Patel', 'priya.patel@gmail.com', '1122334455', 'Master of Education', 'Primary Staff', 'tech.jpeg', '2025-01-30 22:55:30', 'password123'),
(12, 'Rina Gupta', 'rina.gupta@gmail.com', '2233445566', 'Bachelor of Arts in Education', 'Primary Staff', 'tech.jpeg', '2025-01-30 22:55:30', 'password123'),
(13, 'Shalini Verma', 'shalini.verma@gmail.com', '3344556677', 'Bachelor of Science in Education', 'Primary Staff', 'tech.jpeg', '2025-01-30 22:55:30', 'password123'),
(14, 'Kajal Bhatt', 'kajal.bhatt@gmail.com', '4455667788', 'Bachelor of Arts in Education', 'Primary Staff', 'tech.jpeg', '2025-01-30 22:55:30', 'password123'),
(15, 'Maya Mehta', 'maya.mehta@gmail.com', '5566778899', 'Bachelor of Education', 'Primary Staff', 'tech.jpeg', '2025-01-30 22:55:30', 'password123'),
(16, 'Sweta Joshi', 'sweta.joshi@gmail.com', '6677889900', 'Master of Education', 'Primary Staff', 'tech.jpeg', '2025-01-30 22:55:30', 'password123'),
(17, 'Anjali Patel', 'anjali.patel@gmail.com', '1234567890', 'Bachelor of Education', 'Upper Primary Staff', 'tech.jpeg', '2025-01-30 22:58:07', 'password123'),
(18, 'Pooja Shah', 'pooja.shah@gmail.com', '0987654321', 'Master of Education', 'Upper Primary Staff', 'tech.jpeg', '2025-01-30 22:58:07', 'password123'),
(19, 'Kirti Joshi', 'kirti.joshi@gmail.com', '1122334455', 'Bachelor of Arts in Education', 'Upper Primary Staff', 'tech.jpeg', '2025-01-30 22:58:07', 'password123'),
(20, 'Sonali Mehta', 'sonali.mehta@gmail.com', '2233445566', 'Bachelor of Science in Education', 'Upper Primary Staff', 'tech.jpeg', '2025-01-30 22:58:07', 'password123'),
(21, 'Rupal Desai', 'rupal.desai@gmail.com', '3344556677', 'Diploma in Education', 'Upper Primary Staff', 'tech.jpeg', '2025-01-30 22:58:07', 'password123'),
(22, 'Shubha Reddy', 'shubha.reddy@gmail.com', '1234567890', 'Master of Science in Education', 'Secondary Staff', 'tech.jpeg', '2025-01-30 22:59:46', 'password123'),
(23, 'Divya Joshi', 'divya.joshi@gmail.com', '0987654321', 'Bachelor of Education', 'Secondary Staff', 'tech.jpeg', '2025-01-30 22:59:46', 'password123'),
(24, 'Meera Patel', 'meera.patel@gmail.com', '1122334455', 'Master of Arts in Education', 'Secondary Staff', 'tech.jpeg', '2025-01-30 22:59:46', 'password123'),
(25, 'Kavita Sharma', 'kavita.sharma@gmail.com', '2233445566', 'Bachelor of Arts in Education', 'Secondary Staff', 'tech.jpeg', '2025-01-30 22:59:46', 'password123'),
(41, 'Amit Gupta', 'amit.gupta@gmail.com', '1234567890', 'Master of Commerce', 'Higher Secondary Commerce Staff', 'tech.jpeg', '2025-01-30 23:02:43', 'password123'),
(42, 'Rajesh Sharma', 'rajesh.sharma@gmail.com', '0987654321', 'Bachelor of Commerce', 'Higher Secondary Commerce Staff', 'tech.jpeg', '2025-01-30 23:02:43', 'password123'),
(43, 'Pooja Mehta', 'pooja.mehta@gmail.com', '1122334455', 'Master of Commerce', 'Higher Secondary Commerce Staff', 'tech.jpeg', '2025-01-30 23:02:43', 'password123'),
(44, 'Seema Joshi', 'seema.joshi@gmail.com', '2233445566', 'Bachelor of Commerce', 'Higher Secondary Commerce Staff', 'tech.jpeg', '2025-01-30 23:02:43', 'password123');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `standard` enum('Pre-Primary','Primary','Standard 1','Standard 2','Standard 3','Standard 4','Standard 5','Standard 6','Standard 7','Standard 8','Standard 9','Standard 10','Standard 11','Standard 12') NOT NULL,
  `stream` enum('Science','Commerce','Arts') DEFAULT NULL,
  `admission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `admission_confirmed` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `student_id`, `full_name`, `dob`, `contact`, `email`, `address`, `standard`, `stream`, `admission_date`, `admission_confirmed`) VALUES
(1, 'STU2025000', 'vaghsiya sneha kishorbhai', '2025-02-15', '9313261642', 'sneha@gmail.com', '220,chhitunager', 'Standard 12', 'Commerce', '2025-02-08 12:23:20', 1),
(9, 'S2025147', 'vaghsiya hetvi narshibhai', '2025-02-08', '9313261642', 'snehavaghasiya016@gmail.com', '220,chhitunager', 'Standard 12', 'Commerce', '2025-02-08 14:34:15', 1),
(10, 'S2025699', 'vaghsiya sneha kishorbhai', '2025-02-08', '1234567890', 'sneha@gmail.com', 'sitanager', 'Standard 11', 'Commerce', '2025-02-08 14:34:48', 0),
(11, 'S2025416', 'vaghsiya sneha kishorbhai', '2025-02-08', '1234567890', 'sneha@gmail.com', 'sitanager', 'Standard 11', 'Commerce', '2025-02-08 14:40:49', 0),
(12, 'S2025488', 'vaghsiya sneha kishorbhai', '2025-02-08', '1234567890', 'snehavaghasiya016@gmail.com', 'sitanager', 'Standard 11', 'Commerce', '2025-02-08 14:41:15', 1),
(13, 'S2025683', 'vaghsiya sneha kishorbhai', '2025-02-08', '1234567890', 'snehavaghasiya016@gmail.com', 'sitanager', 'Standard 11', 'Commerce', '2025-02-08 14:45:09', 1),
(14, 'S2025296', 'vaghsiya hetvi narshibhai', '2025-02-08', '9313261642', 'snehavaghasiya016@gmail.com', '220,chhitunager', 'Standard 12', 'Commerce', '2025-02-08 14:53:49', 1),
(15, 'S2025866', 'domadiya himanshi mukeshbhai', '2024-12-06', '1234567890', 'snehavaghasiya016@gmail.com', 'varacha', 'Standard 8', 'Science', '2025-02-09 18:05:35', 1),
(16, 'S2025477', 'domadiya himanshi mukeshbhai', '2024-12-06', '1234567890', 'snehavaghasiya016@gmail.com', 'varacha', 'Standard 8', 'Science', '2025-02-09 18:05:37', 1),
(17, 'S2025801', 'vaghasiya  riya kamleshbhai', '2021-05-12', '9313261642', 'snehavaghasiya016@gmail.com', '220 chhitunager', 'Pre-Primary', 'Science', '2025-02-17 13:03:54', 1),
(18, 'S2025274', 'vaghasiya  riya kamleshbhai', '2021-05-12', '9313261642', 'snehavaghasiya016@gmail.com', '220 chhitunager', 'Pre-Primary', 'Science', '2025-02-17 13:08:28', 0),
(19, 'S2025476', 'vaghasiya  riya kamleshbhai', '2021-05-12', '9313261642', 'snehavaghasiya016@gmail.com', '220 chhitunager', 'Pre-Primary', 'Science', '2025-02-17 13:09:33', 0),
(20, 'S2025319', 'thummer ridhi parthbhai', '2021-05-04', '9313261642', 'snehavaghasiya016@gmail.com', 'surat', 'Pre-Primary', 'Science', '2025-02-17 13:12:14', 0),
(21, 'S2025986', 'thummer ridhi parthbhai', '2021-05-04', '9313261642', 'snehavaghasiya016@gmail.com', 'surat', 'Pre-Primary', 'Science', '2025-02-17 13:15:39', 0),
(22, 'S2025395', 'vaghasiya jeel kishorbhai', '2009-09-30', '9313261642', 'snehavaghasiya016@gmail.com', 'surat', 'Standard 9', 'Science', '2025-02-17 13:16:22', 0),
(23, 'S2025552', 'vaghasiya jeel kishorbhai', '2009-09-30', '9313261642', 'snehavaghasiya016@gmail.com', 'surat', 'Standard 9', 'Science', '2025-02-17 13:36:12', 0),
(24, 'S2025902', 'vaghsiya hetvi narshibhai', '2008-02-13', '9313261642', 'snehavaghasiya016@gmail.com', 'asdcfvgbnm', 'Standard 11', 'Commerce', '2025-02-17 13:37:34', 0),
(25, 'S2025722', 'vaghsiya hetvi narshibhai', '2008-02-13', '9313261642', 'snehavaghasiya016@gmail.com', 'asdcfvgbnm', 'Standard 11', 'Commerce', '2025-02-17 13:39:10', 0),
(26, 'S2025939', 'vaghsiya hetvi narshibhai', '2008-02-13', '9313261642', 'snehavaghasiya016@gmail.com', 'asdcfvgbnm', 'Standard 11', 'Commerce', '2025-02-17 13:39:32', 0),
(27, 'S2025142', 'vaghsiya sneha kishorbhai', '2009-05-04', '9313261642', 'snehavaghasiya016@gmail.com', 'surat', 'Standard 9', 'Science', '2025-03-14 16:31:32', 1),
(28, 'S2025143', 'vaghasiya gopi rameshbhai', '2008-03-13', '08320091384', 'snehavghsiya016@gmail.com', '220, Chhitu Nager Soc ,\r\nbombey market  road puna gam', 'Standard 11', 'Commerce', '2025-04-11 18:14:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_materials`
--

CREATE TABLE `student_materials` (
  `id` int(11) NOT NULL,
  `standard` enum('Pre-Primary','Primary','1','2','3','4','5','6','7','8','9','10','11','12') DEFAULT NULL,
  `stream` enum('None','Science','Commerce','Arts') DEFAULT 'None',
  `material_name` varchar(255) DEFAULT NULL,
  `material_link` varchar(255) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_materials`
--

INSERT INTO `student_materials` (`id`, `standard`, `stream`, `material_name`, `material_link`, `student_id`) VALUES
(1, '12', 'Commerce', 'maths', 'image/11754_compressed (4).pdf', NULL),
(2, '11', 'Commerce', 'Hindi', 'image/11811_compressed (2).pdf', NULL),
(3, '11', 'Commerce', 'maths', 'image/11754_compressed (3).pdf', NULL),
(4, '', 'None', 'qwsedf', 'image/11811_compressed (2).pdf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `support_staff`
--

CREATE TABLE `support_staff` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `duty_role` varchar(100) NOT NULL,
  `shift_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `support_staff`
--

INSERT INTO `support_staff` (`id`, `name`, `photo`, `contact`, `duty_role`, `shift_time`) VALUES
(1, 'Sita Devi', 'tech.jpeg', '9100000001', 'Housekeeping', 'Morning'),
(2, 'Geeta Kumari', 'tech.jpeg', '9100000002', 'Security', 'Night'),
(3, 'Lata Singh', 'tech.jpeg', '9100000003', 'Cook', 'Morning'),
(4, 'Radha Yadav', 'tech.jpeg', '9100000004', 'Laundry', 'Evening'),
(5, 'Sunita Sharma', 'tech.jpeg', '9100000005', 'Maintenance', 'Day'),
(6, 'Poonam Das', 'tech.jpeg', '9100000006', 'Receptionist', 'Morning'),
(7, 'Kiran Patel', 'tech.jpeg', '9100000007', 'Security', 'Evening'),
(8, 'Savita Jain', 'tech.jpeg', '9100000008', 'Cook', 'Night'),
(9, 'Manju Bhat', 'tech.jpeg', '9100000009', 'Housekeeping', 'Night'),
(10, 'Anita Chauhan', 'tech.jpeg', '9100000010', 'Laundry', 'Morning');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('school','college','hostel','campus') NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `reset_token`) VALUES
(10, 'sneha vaghasiya', 'sneha@gmail.com', '$2y$10$XUM8Io0A/tgOyCp9xfYsFeAp/BRoU25edoVS7Y3jf/iExzOfPcOgS', 'campus', 'db5563017a0b6cbce5db8a284a3aa91867d3df32d1f4b16c00283fe8a60e36eb4af1c03a2ee8c094904cf7c91afaef25e951'),
(11, 'happy', 'himanshi.domadiya9974@gmail.com', '$2y$10$wLdyBsudXky2YAyjq8mKFef2Vcg34qZlaE1Zez9BJqYQ3JclAAW.W', 'campus', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `purpose` text NOT NULL,
  `visit_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Pending','Approved','Rejected') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `name`, `contact`, `email`, `purpose`, `visit_date`, `status`) VALUES
(4, 'sneha vaghasiya', '9313261642', 'snehavaghasiya016@gmail.com', 'addmission purposed', '2025-03-05 19:10:53', 'Approved'),
(5, 'urvashi', '9313261642', 'urvashidobariya@gmail.com', 'only visit hostel', '2025-04-13 00:00:00', 'Approved'),
(6, 'sneha vaghasiya', '08320091384', 'snehavaghasiya016@gmail.com', 'admission purposed', '2025-04-13 00:00:00', 'Approved'),
(7, 'kishorbhai vaghasiya', '09374591999', 'snehavghsiya016@gmail.com', 'admission purposed', '2025-04-13 00:00:00', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_guidelines`
--

CREATE TABLE `visitor_guidelines` (
  `id` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `guideline` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitor_guidelines`
--

INSERT INTO `visitor_guidelines` (`id`, `icon`, `guideline`) VALUES
(1, 'fas fa-id-card', 'All visitors must present a valid ID proof at the entrance.'),
(2, 'fas fa-clock', 'Visiting hours are strictly from 9 AM to 6 PM.'),
(3, 'fas fa-mask', 'Face masks are mandatory within hostel premises.'),
(4, 'fas fa-hand-sparkles', 'Sanitize hands before entering the building.'),
(5, 'fas fa-users', 'No group visits without prior approval from the management.'),
(6, 'fas fa-camera', 'Photography is strictly prohibited inside the hostel.'),
(7, 'fas fa-volume-mute', 'Please maintain silence in all common areas.'),
(8, 'fas fa-smoking-ban', 'Smoking and consumption of alcohol are prohibited.'),
(9, 'fas fa-trash-alt', 'Do not litter. Use designated dustbins.'),
(10, 'fas fa-mobile-alt', 'Keep mobile phones on silent mode during your visit.'),
(11, 'fas fa-user-clock', 'Visitors should not stay beyond the permitted hours.'),
(12, 'fas fa-shield-alt', 'Cooperate with security checks when requested.'),
(13, 'fas fa-info-circle', 'Follow all additional instructions given by staff.');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_reports`
--

CREATE TABLE `visitor_reports` (
  `id` int(11) NOT NULL,
  `visitor_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `purpose` text DEFAULT NULL,
  `visit_date` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `approved_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitor_reports`
--

INSERT INTO `visitor_reports` (`id`, `visitor_id`, `name`, `contact`, `email`, `purpose`, `visit_date`, `status`, `approved_date`) VALUES
(1, 4, 'sneha vaghasiya', '9313261642', 'snehavaghasiya016@gmail.com', 'addmission purposed', '2025-03-05', 'Approved', '2025-03-05 13:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `warden`
--

CREATE TABLE `warden` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warden`
--

INSERT INTO `warden` (`id`, `name`, `photo`, `contact`, `designation`, `qualification`, `password`) VALUES
(1, 'Ms. Priya Sharma', 'tech.jpeg', '9000000001', 'Chief Warden', 'M.Sc (Physics)', 'Priya@123'),
(2, 'Ms. Nisha Patel', 'tech.jpeg', '9000000002', 'Deputy Warden', 'M.A (English)', 'Nisha@234'),
(3, 'Ms. Komal Verma', 'tech.jpeg', '9000000003', 'Assistant Warden', 'B.Ed', 'Komal@345'),
(4, 'Ms. Reena Gupta', 'tech.jpeg', '9000000004', 'Senior Warden', 'M.Sc (Maths)', 'Reena@456'),
(5, 'Ms. Pooja Shah', 'tech.jpeg', '9000000005', 'Night Warden', 'MBA', 'Pooja@567'),
(6, 'Ms. Meena Joshi', 'tech.jpeg', '9000000006', 'Hostel Warden', 'M.A (Sociology)', 'Meena@678'),
(7, 'Ms. Anjali Desai', 'tech.jpeg', '9000000007', 'Floor Warden', 'M.Com', 'Anjali@789'),
(8, 'Ms. Neha Kumar', 'tech.jpeg', '9000000008', 'Assistant Warden', 'B.Sc (Chemistry)', 'Neha@890'),
(9, 'Ms. Kavita Mehta', 'tech.jpeg', '9000000009', 'Deputy Warden', 'M.A (History)', 'Kavita@901'),
(10, 'Ms. Shruti Jain', 'tech.jpeg', '9000000010', 'Chief Warden', 'M.Sc (Biology)', 'Shruti@012');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cattendance`
--
ALTER TABLE `cattendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `ccourses`
--
ALTER TABLE `ccourses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cexam_schedule`
--
ALTER TABLE `cexam_schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supervisor_id` (`supervisor_id`);

--
-- Indexes for table `cgallery`
--
ALTER TABLE `cgallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `change_requests`
--
ALTER TABLE `change_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_timetables`
--
ALTER TABLE `class_timetables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `college_admin`
--
ALTER TABLE `college_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `college_fees`
--
ALTER TABLE `college_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint_form`
--
ALTER TABLE `complaint_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cstudents`
--
ALTER TABLE `cstudents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `cstudy_materials`
--
ALTER TABLE `cstudy_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ctimetable`
--
ALTER TABLE `ctimetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_reports`
--
ALTER TABLE `daily_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facility_requests`
--
ALTER TABLE `facility_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bus_id` (`bus_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `faculty_login`
--
ALTER TABLE `faculty_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `fees_payment`
--
ALTER TABLE `fees_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_structure`
--
ALTER TABLE `fees_structure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_schedule`
--
ALTER TABLE `food_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `girls_hostel_rules`
--
ALTER TABLE `girls_hostel_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostel_admin`
--
ALTER TABLE `hostel_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `hostel_attendance`
--
ALTER TABLE `hostel_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostel_contact`
--
ALTER TABLE `hostel_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostel_facilities`
--
ALTER TABLE `hostel_facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostel_fees`
--
ALTER TABLE `hostel_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostel_student`
--
ALTER TABLE `hostel_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_application`
--
ALTER TABLE `leave_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mess_rules`
--
ALTER TABLE `mess_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `placements`
--
ALTER TABLE `placements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_allocation`
--
ALTER TABLE `room_allocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_number`
--
ALTER TABLE `room_number`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scholarships`
--
ALTER TABLE `scholarships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schoolnotic`
--
ALTER TABLE `schoolnotic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_admin`
--
ALTER TABLE `school_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `staff_login`
--
ALTER TABLE `staff_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `student_materials`
--
ALTER TABLE `student_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_staff`
--
ALTER TABLE `support_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor_guidelines`
--
ALTER TABLE `visitor_guidelines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor_reports`
--
ALTER TABLE `visitor_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warden`
--
ALTER TABLE `warden`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cattendance`
--
ALTER TABLE `cattendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `ccourses`
--
ALTER TABLE `ccourses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cexam_schedule`
--
ALTER TABLE `cexam_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `cgallery`
--
ALTER TABLE `cgallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `change_requests`
--
ALTER TABLE `change_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class_timetables`
--
ALTER TABLE `class_timetables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=288;

--
-- AUTO_INCREMENT for table `college_admin`
--
ALTER TABLE `college_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `college_fees`
--
ALTER TABLE `college_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `complaint_form`
--
ALTER TABLE `complaint_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `cstudents`
--
ALTER TABLE `cstudents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `cstudy_materials`
--
ALTER TABLE `cstudy_materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ctimetable`
--
ALTER TABLE `ctimetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `daily_reports`
--
ALTER TABLE `daily_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `facility_requests`
--
ALTER TABLE `facility_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `faculty_login`
--
ALTER TABLE `faculty_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `fees_payment`
--
ALTER TABLE `fees_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fees_structure`
--
ALTER TABLE `fees_structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `food_schedule`
--
ALTER TABLE `food_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `girls_hostel_rules`
--
ALTER TABLE `girls_hostel_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hostel_admin`
--
ALTER TABLE `hostel_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hostel_attendance`
--
ALTER TABLE `hostel_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `hostel_contact`
--
ALTER TABLE `hostel_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hostel_facilities`
--
ALTER TABLE `hostel_facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `hostel_fees`
--
ALTER TABLE `hostel_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `hostel_student`
--
ALTER TABLE `hostel_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `leave_application`
--
ALTER TABLE `leave_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mess_rules`
--
ALTER TABLE `mess_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `placements`
--
ALTER TABLE `placements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `room_allocation`
--
ALTER TABLE `room_allocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room_number`
--
ALTER TABLE `room_number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `scholarships`
--
ALTER TABLE `scholarships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `schoolnotic`
--
ALTER TABLE `schoolnotic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `school_admin`
--
ALTER TABLE `school_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `staff_login`
--
ALTER TABLE `staff_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `student_materials`
--
ALTER TABLE `student_materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `support_staff`
--
ALTER TABLE `support_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `visitor_guidelines`
--
ALTER TABLE `visitor_guidelines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `visitor_reports`
--
ALTER TABLE `visitor_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warden`
--
ALTER TABLE `warden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cattendance`
--
ALTER TABLE `cattendance`
  ADD CONSTRAINT `cattendance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `cstudents` (`student_id`);

--
-- Constraints for table `cexam_schedule`
--
ALTER TABLE `cexam_schedule`
  ADD CONSTRAINT `cexam_schedule_ibfk_1` FOREIGN KEY (`supervisor_id`) REFERENCES `faculty` (`id`);

--
-- Constraints for table `class_timetables`
--
ALTER TABLE `class_timetables`
  ADD CONSTRAINT `class_timetables_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  ADD CONSTRAINT `exam_schedule_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `facility_requests`
--
ALTER TABLE `facility_requests`
  ADD CONSTRAINT `facility_requests_ibfk_1` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
