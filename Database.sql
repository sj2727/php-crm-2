-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 19, 2022 at 05:52 AM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u669616946_crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `crm_agent`
--

CREATE TABLE `crm_agent` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `team` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `mode` int(255) NOT NULL DEFAULT 0,
  `imp` varchar(255) NOT NULL DEFAULT '0',
  `branch` int(255) DEFAULT NULL,
  `lastactive` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `crm_attandance`
--

CREATE TABLE `crm_attandance` (
  `id` int(11) NOT NULL,
  `agent_id` int(255) NOT NULL,
  `mode` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `login` timestamp NULL DEFAULT current_timestamp(),
  `login_loc` longtext COLLATE utf8_general_ci NOT NULL,
  `logout` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout_loc` longtext COLLATE utf8_general_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `crm_branch`
--

CREATE TABLE `crm_branch` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `admin_email` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `imp` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `crm_campaign`
--

CREATE TABLE `crm_campaign` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `assest_name` varchar(255) NOT NULL,
  `timezone_type` varchar(255) NOT NULL,
  `script` longtext NOT NULL,
  `confirm` longtext NOT NULL,
  `consent` longtext NOT NULL,
  `rebuttal` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `imp` varchar(255) NOT NULL DEFAULT '0',
  `teams` varchar(255) NOT NULL,
  `Prospect_lists` longtext NOT NULL,
  `prospect_list_status` longtext DEFAULT NULL,
  `branch` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `crm_doc`
--

CREATE TABLE `crm_doc` (
  `id` int(255) NOT NULL,
  `agent_id` int(255) NOT NULL,
  `pan` longtext COLLATE utf8_general_ci NOT NULL,
  `pan_status` int(255) NOT NULL,
  `adhar` longtext COLLATE utf8_general_ci NOT NULL,
  `adhar_status` int(255) NOT NULL,
  `number` varchar(255) COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `crm_it`
--

CREATE TABLE `crm_it` (
  `id` int(255) NOT NULL,
  `name_of_device` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `from` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `who` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `device_serial_no` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `device_configuration` longtext COLLATE utf8_general_ci NOT NULL,
  `location` longtext COLLATE utf8_general_ci NOT NULL,
  `branch` int(255) NOT NULL,
  `perchase_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `device_condition` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `device_status` varchar(255) COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `crm_meetings`
--

CREATE TABLE `crm_meetings` (
  `id` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `meeting_on` longtext COLLATE utf8_general_ci DEFAULT NULL,
  `status` int(255) DEFAULT NULL,
  `hrid` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `crm_resume`
--

CREATE TABLE `crm_resume` (
  `id` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `resume` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `crm_team`
--

CREATE TABLE `crm_team` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `teamleader` varchar(255) DEFAULT NULL,
  `description` longtext NOT NULL,
  `campaign` int(11) NOT NULL,
  `branch` int(255) DEFAULT NULL,
  `imp` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `crm_user`
--

CREATE TABLE `crm_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `priority` varchar(255) DEFAULT NULL,
  `imp` varchar(255) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL,
  `branch` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crm_user`
--

INSERT INTO `crm_user` (`id`, `name`, `email`, `password`, `priority`, `imp`, `status`, `branch`) VALUES
(1, 'admin', 'admin@admin.com', '0ec952de747ca65a1c001bef0144457d8f6579169413453279b20a3a5e1a505a6aea0ae062d711f58ddf0fef56cc1dcb07dcd06ea6cd22d321c67cc9c09694db', 'superadmin', '0', 1, 0);
COMMIT;
-- --------------------------------------------------------

--
-- Table structure for table `data_list`
--

CREATE TABLE `data_list` (
  `id` int(11) NOT NULL,
  `data` varchar(255) NOT NULL,
  `count` varchar(255) NOT NULL,
  `json` varchar(255) NOT NULL,
  `create_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `branch` int(255) DEFAULT NULL,
  `imp` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sample`
--

CREATE TABLE `sample` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `emp_range` varchar(255) DEFAULT NULL,
  `asset` varchar(255) DEFAULT NULL,
  `disposition` varchar(255) DEFAULT NULL,
  `timezone` varchar(255) DEFAULT NULL,
  `create_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `agent_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crm_agent`
--
ALTER TABLE `crm_agent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`(250)),
  ADD KEY `name` (`name`(250)),
  ADD KEY `team` (`team`),
  ADD KEY `status` (`status`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `crm_attandance`
--
ALTER TABLE `crm_attandance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_branch`
--
ALTER TABLE `crm_branch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `crm_campaign`
--
ALTER TABLE `crm_campaign`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `crm_doc`
--
ALTER TABLE `crm_doc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_it`
--
ALTER TABLE `crm_it`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_meetings`
--
ALTER TABLE `crm_meetings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_resume`
--
ALTER TABLE `crm_resume`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_team`
--
ALTER TABLE `crm_team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `crm_user`
--
ALTER TABLE `crm_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `data_list`
--
ALTER TABLE `data_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `id_3` (`id`),
  ADD KEY `id_4` (`id`),
  ADD KEY `id_5` (`id`);

--
-- Indexes for table `sample`
--
ALTER TABLE `sample`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crm_agent`
--
ALTER TABLE `crm_agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_attandance`
--
ALTER TABLE `crm_attandance`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_branch`
--
ALTER TABLE `crm_branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_campaign`
--
ALTER TABLE `crm_campaign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_doc`
--
ALTER TABLE `crm_doc`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_it`
--
ALTER TABLE `crm_it`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_meetings`
--
ALTER TABLE `crm_meetings`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_resume`
--
ALTER TABLE `crm_resume`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_team`
--
ALTER TABLE `crm_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_user`
--
ALTER TABLE `crm_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `data_list`
--
ALTER TABLE `data_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sample`
--
ALTER TABLE `sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
