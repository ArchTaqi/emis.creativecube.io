-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2018 at 09:18 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aquas_inventory_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `bottles`
--

CREATE TABLE `bottles` (
  `id` int(11) NOT NULL,
  `liters` varchar(400) NOT NULL,
  `total_packs` int(11) NOT NULL,
  `total_caps_pack` int(11) NOT NULL,
  `total_caps` int(11) NOT NULL,
  `total_empty` int(11) NOT NULL,
  `total_filled` int(11) NOT NULL,
  `rtg` int(11) NOT NULL,
  `gate_out` int(11) NOT NULL,
  `total_labels` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bottles`
--

INSERT INTO `bottles` (`id`, `liters`, `total_packs`, `total_caps_pack`, `total_caps`, `total_empty`, `total_filled`, `rtg`, `gate_out`, `total_labels`, `date`) VALUES
(1, '19 Liter Bottle', 27, 7, 5, 6, 5, 6, 7, 4, '2018-02-12 17:49:31'),
(2, '16 Liter Bottle', 26, 0, 0, 0, 0, 0, 0, 0, '2018-02-12 17:49:59'),
(3, '1.5 Liter Bottle', 7, 0, 0, 0, 0, 0, 0, 0, '2018-02-12 17:50:07'),
(4, '0.6 Liter Bottle', 0, 0, 0, 0, 0, 0, 0, 0, '2018-02-12 17:50:13'),
(5, '600ml Bottle', 0, 0, 0, 0, 0, 0, 0, 0, '2018-02-12 17:50:18');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `client_name` varchar(200) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `feedback` varchar(400) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `client_name`, `phone_number`, `email`, `feedback`, `date`) VALUES
(1, 'Amir', '0343-6599622', 'm.amir.6693@gmail.com', 'New One', '2018-02-12 19:32:32');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_name` varchar(200) NOT NULL,
  `phone_number` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `id_number` varchar(200) NOT NULL,
  `employeed_date` date NOT NULL,
  `refered_by` varchar(400) NOT NULL,
  `ref_number` varchar(200) NOT NULL,
  `remarks` varchar(400) NOT NULL,
  `client_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_name`, `phone_number`, `email`, `id_number`, `employeed_date`, `refered_by`, `ref_number`, `remarks`, `client_id`, `date`) VALUES
(4, 'Rizwan', '1233-4353453', 'rizwan@gmail.com', '12312-3243232-4', '2018-02-14', 'amir', '34365996220', 'Good', 1, '2018-02-14 19:33:08');

-- --------------------------------------------------------

--
-- Table structure for table `employees_attendance`
--

CREATE TABLE `employees_attendance` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `remarks` varchar(400) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employees_performance`
--

CREATE TABLE `employees_performance` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `ppe` varchar(100) NOT NULL,
  `gentle_atitude` varchar(100) NOT NULL,
  `house_keeping` varchar(100) NOT NULL,
  `client_relation` varchar(100) NOT NULL,
  `employee_relation` varchar(100) NOT NULL,
  `technical_work` varchar(100) NOT NULL,
  `qhse` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `generator`
--

CREATE TABLE `generator` (
  `id` int(11) NOT NULL,
  `oil_change_date` date NOT NULL,
  `oil_change_reading` int(11) NOT NULL,
  `filter_change_date` date NOT NULL,
  `filter_change_reading` int(11) NOT NULL,
  `fuel_on_date` date NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generator`
--

INSERT INTO `generator` (`id`, `oil_change_date`, `oil_change_reading`, `filter_change_date`, `filter_change_reading`, `fuel_on_date`, `date`) VALUES
(1, '2018-02-12', 5, '2018-02-12', 5, '2018-02-12', '2018-02-12 20:04:23');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `id` int(11) NOT NULL,
  `sample_reports` varchar(400) NOT NULL,
  `equipment_status` varchar(400) NOT NULL,
  `attendance_performance` varchar(400) NOT NULL,
  `chemical_status` varchar(400) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`id`, `sample_reports`, `equipment_status`, `attendance_performance`, `chemical_status`, `date`) VALUES
(1, 'ab', 'ab', 'ab', 'ab', '2018-02-13 05:25:34');

-- --------------------------------------------------------

--
-- Table structure for table `minerals`
--

CREATE TABLE `minerals` (
  `id` int(11) NOT NULL,
  `ca` int(200) NOT NULL,
  `na` int(11) NOT NULL,
  `mg` int(11) NOT NULL,
  `ci` int(11) NOT NULL,
  `so4` int(11) NOT NULL,
  `k` int(11) NOT NULL,
  `hco3` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `minerals`
--

INSERT INTO `minerals` (`id`, `ca`, `na`, `mg`, `ci`, `so4`, `k`, `hco3`, `date`) VALUES
(2, 10, 0, 9, 0, 2, 0, 0, '2018-02-14 17:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `order_description` varchar(500) NOT NULL,
  `demand` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_date`, `delivery_date`, `order_description`, `demand`, `client_id`, `date`) VALUES
(5, '2018-02-12', '2018-02-12', '', 5, 1, '2018-02-12 19:51:48'),
(6, '2018-02-14', '2018-02-14', '19 liters bottles', 18, 1, '2018-02-14 19:37:39');

-- --------------------------------------------------------

--
-- Table structure for table `plant`
--

CREATE TABLE `plant` (
  `id` int(11) NOT NULL,
  `total_running_hours` int(11) NOT NULL,
  `inlet_hour` int(11) NOT NULL,
  `outlet_hour` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plant`
--

INSERT INTO `plant` (`id`, `total_running_hours`, `inlet_hour`, `outlet_hour`, `date`) VALUES
(1, 5, 6, 5, '2018-02-12 20:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `user` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `user`, `password`, `date`) VALUES
(1, 'admin', 'admin', '2018-02-13 15:55:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bottles`
--
ALTER TABLE `bottles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees_attendance`
--
ALTER TABLE `employees_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees_performance`
--
ALTER TABLE `employees_performance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generator`
--
ALTER TABLE `generator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minerals`
--
ALTER TABLE `minerals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plant`
--
ALTER TABLE `plant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bottles`
--
ALTER TABLE `bottles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `employees_attendance`
--
ALTER TABLE `employees_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `employees_performance`
--
ALTER TABLE `employees_performance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `generator`
--
ALTER TABLE `generator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `minerals`
--
ALTER TABLE `minerals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `plant`
--
ALTER TABLE `plant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
