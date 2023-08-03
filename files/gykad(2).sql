-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2023 at 09:33 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gykad`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_fname` varchar(50) NOT NULL,
  `admin_sname` varchar(50) DEFAULT NULL,
  `admin_nic` varchar(15) DEFAULT NULL,
  `admin_photo` varchar(255) DEFAULT NULL,
  `admin_phone_number` varchar(20) DEFAULT NULL,
  `admin_address` varchar(100) DEFAULT NULL,
  `admin_email` varchar(100) DEFAULT NULL,
  `admin_password` varchar(100) DEFAULT NULL,
  `admin_status` varchar(10) DEFAULT 'active',
  `admin_reg_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_fname`, `admin_sname`, `admin_nic`, `admin_photo`, `admin_phone_number`, `admin_address`, `admin_email`, `admin_password`, `admin_status`, `admin_reg_time`) VALUES
(10, 'Arzil', 'Riyaj', '982201969V', '', '0774928220', '45 main street matale', 'arzil@gmail.com', '123', 'active', '2023-07-23 14:08:59');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_schedule`
--

CREATE TABLE `assigned_schedule` (
  `assigned_schedule_id` int(11) NOT NULL,
  `assigned_shedule` varchar(12) NOT NULL,
  `assigned_schedule_assigned_by` int(11) NOT NULL,
  `assigned_schedule_member` int(11) NOT NULL,
  `assigned_schedule_regtime` timestamp NOT NULL DEFAULT current_timestamp(),
  `assigned_schedule_status` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assigned_schedule`
--

INSERT INTO `assigned_schedule` (`assigned_schedule_id`, `assigned_shedule`, `assigned_schedule_assigned_by`, `assigned_schedule_member`, `assigned_schedule_regtime`, `assigned_schedule_status`) VALUES
(13, ' 1', 0, 1, '2023-07-28 20:15:13', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `attendance_user_role` int(12) NOT NULL,
  `attendance_member_id` int(11) DEFAULT NULL,
  `attendance_date` date DEFAULT NULL,
  `attendance_check_in_time` time DEFAULT NULL,
  `attendance_check_out_time` time DEFAULT NULL,
  `attendance_reg_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `attendance_crt_sts` varchar(12) NOT NULL DEFAULT 'ON GYM',
  `attendance_status` varchar(255) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `attendance_user_role`, `attendance_member_id`, `attendance_date`, `attendance_check_in_time`, `attendance_check_out_time`, `attendance_reg_time`, `attendance_crt_sts`, `attendance_status`) VALUES
(1, 3, 1, '2023-07-01', '21:44:00', '22:40:00', '2023-07-29 16:14:33', 'out', 'active'),
(2, 1, 1, '2023-07-29', '23:10:00', '12:10:00', '2023-07-29 17:41:04', 'out', 'active'),
(3, 1, 10, '2023-07-30', '08:45:00', '00:00:00', '2023-07-29 18:15:15', 'ON GYM', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_role` varchar(50) DEFAULT NULL,
  `user_id` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `status` varchar(50) DEFAULT 'active',
  `reg_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `user_name`, `user_email`, `user_role`, `user_id`, `user_password`, `status`, `reg_time`) VALUES
(2, 'Ajmal ', 'ajmal@gmail.com', '3', '1', '9ea1f3c0c2bd3501ba14431612a5f4dc', 'active', '2023-07-19 11:55:22'),
(5, 'Arzil ', 'arzil@gmail.com', '2', '10', '202cb962ac59075b964b07152d234b70', 'active', '2023-07-23 14:08:59'),
(10, 'Matheesha ', 'matheesha@gmail.com', '3', '2', 'c03ee156752cfac45183112a07166707', 'active', '2023-07-27 20:38:56'),
(18, 'Nishad ', 'nishad@gmail.com', '1', '1', '7224e5fbe7789d933da055979e3f2c37', 'active', '2023-07-28 12:29:00'),
(19, 'Sajith ', 'sajith@gmail.com', '1', '2', 'db5574a40cc73fced0766b4f5ec4c955', 'active', '2023-07-28 14:08:42'),
(20, 'Wishwa ', 'wishwa@gmail.com', '1', '3', '23487c370c47f439505ec1a269ae2d0f', 'active', '2023-07-28 20:22:53'),
(21, 'Amasha ', 'amasha@gmail.com', '1', '4', '7afa0a80311fb30ea8049bb76429bbbd', 'active', '2023-07-28 21:20:48'),
(22, 'Manoj ', 'manoj@gmail.com', '1', '5', 'c6f2d732356b3b878375a66f58f00ba4', 'active', '2023-07-28 21:23:07'),
(23, 'Sadique ', 'sadique@gmail.com', '1', '6', 'b884d70c05316e178bff75b6c13449b6', 'active', '2023-07-28 22:46:06'),
(24, 'Janaki ', 'janaki@gmail.com', '1', '7', 'cfedc5858d6fc343fb44edb511eb39b3', 'active', '2023-07-28 22:48:55'),
(25, 'Shan ', 'shan@gmail.com', '1', '8', '09544d3c63eaf0cb57db1622a230b0ef', 'active', '2023-07-29 11:07:43'),
(26, 'Jhone ', 'jhone@gmail.com', '1', '9', '00383550300414e9bbfd360c6c566151', 'active', '2023-07-29 11:54:02'),
(27, 'Budika ', 'budhika@gmail.com', '3', '3', '8bd5c630c78b1c95699840862edf93d6', 'active', '2023-07-29 13:12:07'),
(28, 'Sampath ', 'sampath@gmail.com', '3', '4', '950721a1ed16335aab225fd6e71100b0', 'active', '2023-07-29 13:21:59'),
(29, 'Raj ', 'raj@gmail.com', '1', '10', 'e72fb318c3a7c87bc7c3d63e9a563b26', 'active', '2023-07-29 14:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `member_reg_no` varchar(12) NOT NULL,
  `member_fname` varchar(50) DEFAULT NULL,
  `member_sname` varchar(50) DEFAULT NULL,
  `member_nic` varchar(12) NOT NULL,
  `member_dob` date DEFAULT NULL,
  `member_gender` varchar(12) NOT NULL,
  `member_age` int(11) DEFAULT NULL,
  `member_membership` varchar(50) DEFAULT NULL,
  `member_ptrainer` varchar(50) DEFAULT NULL,
  `member_email` varchar(50) DEFAULT NULL,
  `member_phone_number` varchar(20) DEFAULT NULL,
  `member_address` varchar(100) DEFAULT NULL,
  `member_current_status` varchar(12) NOT NULL DEFAULT 'out',
  `member_status` varchar(12) NOT NULL DEFAULT 'active',
  `member_regtime` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_reg_no`, `member_fname`, `member_sname`, `member_nic`, `member_dob`, `member_gender`, `member_age`, `member_membership`, `member_ptrainer`, `member_email`, `member_phone_number`, `member_address`, `member_current_status`, `member_status`, `member_regtime`) VALUES
(1, 'GYK0001', 'Nishad', 'Ahamed', '994562156V', '1999-01-14', 'Male', 24, '1', '1', 'nishad@gmail.com', '0774265448', '45 main street matale', 'out', 'active', '2023-04-28 12:29:00.528257'),
(2, 'GYK0002', 'Sajith', 'Lasantha', '964582621V', '1996-02-13', 'Male', 27, '2', '2', 'sajith@gmail.com', '0776215995', '45 Ukuwela Road Matale', 'out', 'active', '2023-07-28 14:08:42.617687'),
(3, 'GYK0003', 'Wishwa', 'Bandara', '226547895V', '2003-12-07', 'Male', 19, '1', '1', 'wishwa@gmail.com', '0785432557', '65 king Street matale', 'out', 'active', '2023-07-28 20:22:53.645662'),
(4, 'GYK0004', 'Amasha', 'Amarasena', '205564831V', '2002-12-01', 'Female', 20, '1', '1', 'amasha@gmail.com', '0776216442', '45 main street matale', 'out', 'active', '2023-07-28 21:20:48.295449'),
(5, 'GYK0005', 'Manoj', 'Kumar', '902354615V', '1990-12-12', 'Male', 32, '1', '2', 'manoj@gmail.com', '0786512558', '98 Rose Street matle', 'out', 'active', '2023-07-28 21:23:07.762010'),
(6, 'GYK0006', 'Sadique', 'Zufer', '895624361V', '1989-11-15', 'Male', 33, '1', '1', 'sadique@gmail.com', '0777562114', '45 Dole Road Matale', 'out', 'active', '2023-06-28 22:46:06.511418'),
(7, 'GYK0007', 'Janaki', 'Ram', '154514542V', '2002-03-12', 'Female', 21, '1', '1', 'janaki@gmail.com', '0773215332', '78 Main street Matale', 'out', 'active', '2023-07-28 22:48:55.383797'),
(8, 'GYK0008', 'Shan', 'leon', '201235615V', '2002-12-22', 'Male', 20, '2', '2', 'shan@gmail.com', '0773159552', '45 King Street Matale', 'out', 'active', '2023-07-29 11:07:43.664554'),
(9, 'GYK0009', 'Jhone', 'Roy', '982246547V', '2002-01-23', 'Male', 21, '4', '2', 'jhone@gmail.com', '0773215448', '45 King Street Matale', 'out', 'active', '2023-07-29 11:54:02.093068'),
(10, 'GYK0010', 'Raj', 'Kumar', '204513649V', '2002-11-13', 'Male', 20, '2', '1', 'raj@gmail.com', '0773216442', '45 Main Street Matale', 'ON GYM', 'active', '2023-07-29 14:21:30.958299');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `package_duration` int(11) NOT NULL,
  `package_price` decimal(10,2) NOT NULL,
  `package_description` varchar(255) DEFAULT NULL,
  `package_status` varchar(50) NOT NULL DEFAULT 'active',
  `package_reg_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `package_name`, `package_duration`, `package_price`, `package_description`, `package_status`, `package_reg_time`) VALUES
(1, 'Gold', 0, '5500.00', 'Get fit with our premium gym package! Enjoy the expertise of our top-notch trainers, full access to cutting-edge equipment, and post-workout refreshment with our shower facilities. Your journey to a healthier, fitter you starts here!', 'active', '2023-07-27 15:13:26'),
(2, 'Silver', 0, '4000.00', ' ', 'active', '2023-07-27 15:25:22'),
(4, 'bronze ', 0, '3000.00', ' ', 'active', '2023-07-29 11:47:57');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_member` varchar(255) DEFAULT NULL,
  `payment_amount` decimal(10,2) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_managed_by` varchar(255) DEFAULT NULL,
  `payment_status` varchar(20) DEFAULT 'active',
  `payment_reg_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_member`, `payment_amount`, `payment_date`, `payment_managed_by`, `payment_status`, `payment_reg_time`) VALUES
(1, '1', '5500.00', '2023-07-01', '1', 'active', '2023-07-27 20:17:13'),
(2, '1', '5500.00', '2023-06-01', '1', 'active', '2023-07-28 12:45:58'),
(3, '1', '5500.00', '2023-05-01', '1', 'active', '2023-07-28 12:57:30'),
(5, '2', '4000.00', '2023-07-01', '1', 'active', '2023-07-28 19:45:21'),
(6, '4', '5500.00', '2023-07-02', '1', 'active', '2023-07-28 21:46:05'),
(7, '5', '5500.00', '2023-07-29', '1', 'active', '2023-07-29 16:59:40'),
(8, '10', '4000.00', '2023-06-02', '1', 'active', '2023-07-29 19:26:37');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `schedule_name` varchar(255) DEFAULT NULL,
  `schedule_trainer` varchar(255) DEFAULT NULL,
  `schedule_status` varchar(50) DEFAULT 'active',
  `schedule_reg_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `schedule_name`, `schedule_trainer`, `schedule_status`, `schedule_reg_time`) VALUES
(1, 'schedule No 1             ', '10', 'active', '2023-07-26 12:15:00'),
(10, 'Cardio Schedule 01', '1', 'active', '2023-07-29 16:48:02'),
(11, 'Chest Workouts', '1', 'active', '2023-07-29 16:53:33');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

CREATE TABLE `schedule_list` (
  `schedule_list_id` int(11) NOT NULL,
  `schedule_list_scd_id` int(11) DEFAULT NULL,
  `schedule_list_workout` varchar(255) DEFAULT NULL,
  `schedule_list_weight` varchar(10) DEFAULT NULL,
  `schedule_list_sets` varchar(11) DEFAULT NULL,
  `schedule_list_reps` int(11) DEFAULT NULL,
  `schedule_list_dis` varchar(255) DEFAULT NULL,
  `schedule_list_reg_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `schedule_list_status` varchar(50) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule_list`
--

INSERT INTO `schedule_list` (`schedule_list_id`, `schedule_list_scd_id`, `schedule_list_workout`, `schedule_list_weight`, `schedule_list_sets`, `schedule_list_reps`, `schedule_list_dis`, `schedule_list_reg_time`, `schedule_list_status`) VALUES
(1, 1, '2', '10', '3', 10, '', '2023-07-26 12:15:00', 'active'),
(2, 1, '5', '5', '3', 12, 'take 1 min rest between sets', '2023-07-26 12:15:00', 'active'),
(3, 2, 'Select Workout', '', '', 0, '', '2023-07-26 13:19:34', 'active'),
(4, 3, '', '', '', 0, '', '2023-07-26 14:07:56', 'active'),
(5, 4, '', '', '', 0, '', '2023-07-26 14:09:03', 'active'),
(6, 5, '', '', '', 0, '', '2023-07-26 14:10:01', 'active'),
(7, 6, '', '', '', 0, '', '2023-07-26 14:15:02', 'active'),
(8, 7, '', '', '', 0, '', '2023-07-26 14:19:27', 'active'),
(9, 7, 'Select Workout', '', '', 0, '', '2023-07-26 14:19:27', 'active'),
(10, 8, '', '', '', 0, '', '2023-07-26 14:21:53', 'active'),
(11, 8, '1', '', '', 0, '', '2023-07-26 14:21:53', 'active'),
(12, 9, '', '', '', 0, '', '2023-07-26 14:25:01', 'active'),
(15, 1, '5', '', '', 0, '', '2023-07-26 15:16:16', 'removed'),
(18, 1, '5', '', '', 0, '', '2023-07-26 15:16:29', 'removed'),
(21, 1, '5', '', '', 0, '', '2023-07-26 20:43:00', 'removed'),
(27, 1, '9', '23', '2', 0, 'hh', '2023-07-26 20:58:14', 'removed'),
(33, 1, '10', '', '', 0, '', '2023-07-26 21:03:34', 'removed'),
(46, 1, '5', '', '', 0, '', '2023-07-26 21:05:43', 'removed'),
(47, 1, '2', '10', '10', 10, '', '2023-07-26 21:06:35', 'removed'),
(48, 1, '5', '5', '12', 12, 'take 1 min rest between sets', '2023-07-26 21:06:35', 'removed'),
(54, 1, '1', '', '', 0, '', '2023-07-26 21:06:35', 'removed'),
(55, 10, '14', '', '3', 50, '1 min rest between sets', '2023-07-29 16:48:02', 'active'),
(56, 10, '13', '', '4', 12, '', '2023-07-29 16:48:02', 'active'),
(57, 10, '10', '', '1', 20, '', '2023-07-29 16:48:02', 'active'),
(58, 10, '11', '', '1', 10, '', '2023-07-29 16:48:02', 'active'),
(59, 11, '6', '12', '3', 12, '', '2023-07-29 16:53:33', 'active'),
(60, 11, '7', '10', '3', 12, '', '2023-07-29 16:53:33', 'active'),
(61, 11, '8', '8', '2', 12, '', '2023-07-29 16:53:33', 'active'),
(62, 1, '2', '10', '10', 10, '', '2023-07-29 19:06:55', 'removed'),
(68, 1, '2', '10', '10', 10, '', '2023-07-29 19:13:11', 'removed'),
(69, 1, '5', '5', '12', 12, 'take 1 min rest between sets', '2023-07-29 19:13:11', 'removed'),
(70, 1, '2', '10', '10', 10, '', '2023-07-29 19:13:33', 'removed'),
(71, 1, '5', '5', '12', 12, 'take 1 min rest between sets', '2023-07-29 19:13:33', 'removed'),
(72, 1, '2', '10', '10', 10, '', '2023-07-29 19:14:38', 'removed'),
(73, 1, '5', '5', '12', 12, 'take 1 min rest between sets', '2023-07-29 19:14:38', 'removed'),
(74, 1, '2', '10', '10', 10, '', '2023-07-29 19:16:04', 'removed'),
(75, 1, '5', '5', '12', 12, 'take 1 min rest between sets', '2023-07-29 19:16:04', 'removed'),
(76, 1, '2', '10', '10', 10, '', '2023-07-29 19:20:59', 'removed'),
(77, 1, '5', '5', '12', 12, 'take 1 min rest between sets', '2023-07-29 19:20:59', 'removed'),
(78, 1, '6', '10', '3', 3, '', '2023-07-29 19:22:22', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `trainer_id` int(11) NOT NULL,
  `trainer_reg_no` varchar(11) NOT NULL,
  `trainer_fname` varchar(255) NOT NULL,
  `trainer_sname` varchar(255) NOT NULL,
  `trainer_nic` varchar(12) NOT NULL,
  `trainer_email` varchar(255) NOT NULL,
  `trainer_phone_number` varchar(20) DEFAULT NULL,
  `trainer_address` varchar(255) DEFAULT NULL,
  `trainer_status` varchar(50) DEFAULT 'active',
  `trainer_regtime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`trainer_id`, `trainer_reg_no`, `trainer_fname`, `trainer_sname`, `trainer_nic`, `trainer_email`, `trainer_phone_number`, `trainer_address`, `trainer_status`, `trainer_regtime`) VALUES
(1, 'GYT0001', 'Ajmal', 'Anver', '985562163v', 'ajmal@gmail.com', '0774532115', '45 Main street Matale', 'active', '2023-07-19 11:55:22'),
(2, 'GYT0002', 'Matheesha', 'Senanayaka', '895621354V', 'matheesha@gmail.com', '0785621552', '56 Nagolla Road Matale', 'active', '2023-07-27 20:38:56'),
(3, 'GYT0003', 'Budika', 'Senanayaka', '658894561V', 'budhika@gmail.com', '0772651882', '56 Nagolla Road Matale', 'active', '2023-07-29 13:12:07'),
(4, 'GYT0004', 'Sampath', 'Wikramasinha', '985542461V', 'sampath@gmail.com', '0775123325', '45 Main street Kandy', 'active', '2023-07-29 13:21:59');

-- --------------------------------------------------------

--
-- Table structure for table `weight`
--

CREATE TABLE `weight` (
  `weight_id` int(11) NOT NULL,
  `weight_member` varchar(12) NOT NULL,
  `weight_date` date DEFAULT NULL,
  `weight_kg` decimal(10,2) DEFAULT NULL,
  `weight_status` varchar(50) DEFAULT NULL,
  `weight_reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weight`
--

INSERT INTO `weight` (`weight_id`, `weight_member`, `weight_date`, `weight_kg`, `weight_status`, `weight_reg_date`) VALUES
(1, '1', '2023-04-01', '98.00', NULL, '2023-07-28 23:10:46'),
(2, '1', '2023-05-01', '92.00', NULL, '2023-07-28 23:11:05'),
(3, '1', '2023-06-01', '90.00', NULL, '2023-07-28 23:11:29'),
(4, '1', '2023-06-01', '90.00', NULL, '2023-07-28 23:15:41'),
(5, '1', '2023-06-01', '90.00', NULL, '2023-07-29 11:15:58'),
(6, '1', '2023-07-01', '83.00', NULL, '2023-07-29 11:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `workout`
--

CREATE TABLE `workout` (
  `workout_id` int(11) NOT NULL,
  `workout_name` varchar(255) DEFAULT NULL,
  `workout_category` varchar(255) DEFAULT NULL,
  `workout_target` varchar(255) DEFAULT NULL,
  `workout_video_url` varchar(255) DEFAULT NULL,
  `workout_status` varchar(255) DEFAULT 'active',
  `workout_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workout`
--

INSERT INTO `workout` (`workout_id`, `workout_name`, `workout_category`, `workout_target`, `workout_video_url`, `workout_status`, `workout_datetime`) VALUES
(1, '3/4 sit-up', 'Strength', 'Abs', 'https://youtu.be/nxFgeTpBP6s', 'active', '2023-07-25 20:40:26'),
(2, 'barbell lying triceps extension skull crusher', 'Muscle Building', 'Triceps', 'https://youtube.com/shorts/Kfbfkd0Sf_o?feature=share', 'active', '2023-07-25 21:15:40'),
(3, '', '', '', '', 'deleted', '2023-07-25 20:54:57'),
(4, '', '', '', '', 'deleted', '2023-07-25 20:54:48'),
(5, 'barbell lying close-grip triceps extension', 'Muscle Building ', 'Triceps', 'https://youtu.be/Ma_SNy-WjwU', 'active', '2023-07-25 20:58:36'),
(6, 'barbell bench press', 'Muscle Building', 'Chest', 'https://youtu.be/4Y2ZdHCOXok', 'active', '2023-07-25 21:33:02'),
(7, 'barbell decline bench press', 'Muscle Building', 'Chest', 'https://youtu.be/LfyQBUKR8SE', 'active', '2023-07-25 21:34:13'),
(8, 'barbell incline bench press', 'Muscle Building', 'Chest', 'https://youtu.be/4Y2ZdHCOXok', 'active', '2023-07-26 11:50:24'),
(9, 'ski step', 'Cardio', 'Full Body', '', 'active', '2023-07-29 15:26:45'),
(10, 'stationary bike run', 'Cardio', 'Full Body', '', 'active', '2023-07-29 15:26:37'),
(11, 'stationary bike walk', 'Cardio', 'Full Body', '', 'active', '2023-07-29 15:26:28'),
(12, 'band front lateral raise', 'Muscle Building', 'Shoulders', '#', 'active', '2023-07-29 15:25:49'),
(13, 'astride jumps', 'Cardio', 'Full Body', '#', 'active', '2023-07-29 16:30:25'),
(14, 'back and forth step', 'Cardio', 'Full Body', '#', 'active', '2023-07-29 16:33:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `assigned_schedule`
--
ALTER TABLE `assigned_schedule`
  ADD PRIMARY KEY (`assigned_schedule_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`schedule_list_id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`trainer_id`);

--
-- Indexes for table `weight`
--
ALTER TABLE `weight`
  ADD PRIMARY KEY (`weight_id`);

--
-- Indexes for table `workout`
--
ALTER TABLE `workout`
  ADD PRIMARY KEY (`workout_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `assigned_schedule`
--
ALTER TABLE `assigned_schedule`
  MODIFY `assigned_schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `schedule_list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `trainer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `weight`
--
ALTER TABLE `weight`
  MODIFY `weight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `workout`
--
ALTER TABLE `workout`
  MODIFY `workout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
