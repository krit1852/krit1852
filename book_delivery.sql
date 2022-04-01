-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2022 at 08:16 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_delivery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_username` varchar(20) NOT NULL,
  `admin_password` varchar(32) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_surname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_username`, `admin_password`, `admin_name`, `admin_surname`) VALUES
('admin1', '4eef1e1ea34879a2ae60c60815927ed9', 'ศิรดา', 'อินทร์ศิริ');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_title` varchar(50) NOT NULL,
  `book_call` varchar(30) NOT NULL,
  `book_author` varchar(100) DEFAULT NULL,
  `book_id` int(10) NOT NULL,
  `book_user_id` int(10) NOT NULL,
  `book_comment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_title`, `book_call`, `book_author`, `book_id`, `book_user_id`, `book_comment`) VALUES
('Kill ร่วมห้องต้องฆ่า', 'นว .ภ215 2556', NULL, 1, 1, NULL),
('บ้านข้างโลงเคียง', 'นว .ภ214', NULL, 3, 1, NULL),
('บ้านข้างโลงเคียง', 'นว .ภ214', NULL, 4, 2, NULL),
('สถิติเบื้องต้น', ' LB1131 .ว32 2520', 'วิเชียร เกตุสิงห์', 5, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookstatus`
--

CREATE TABLE `bookstatus` (
  `status_book` enum('กำลังดำเนินการ','ส่งเรียบร้อย','ยกเลิกคำขอ (หาไม่พบ / หาย)','ยกเลิกคำขอ (มีที่ห้องสมุดอื่น)','ยกเลิกคำขอ (ส่งไฟล์แทนฉบับจริง)','ยกเลิกคำขอ (ถูกยืมแล้ว)') NOT NULL,
  `status_tracking` varchar(20) DEFAULT NULL,
  `status_id` int(10) NOT NULL,
  `status_book_id` int(10) NOT NULL,
  `status_dateSent` date DEFAULT NULL,
  `status_comment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `bookstatus`
--

INSERT INTO `bookstatus` (`status_book`, `status_tracking`, `status_id`, `status_book_id`, `status_dateSent`, `status_comment`) VALUES
('กำลังดำเนินการ', NULL, 1, 1, NULL, NULL),
('ส่งเรียบร้อย', '123456789TH', 2, 3, '2021-12-14', 'หน้าปกชำรุด'),
('ยกเลิกคำขอ (ถูกยืมแล้ว)', NULL, 3, 4, NULL, NULL),
('ยกเลิกคำขอ (หาไม่พบ / หาย)', NULL, 4, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `price_id` int(10) NOT NULL,
  `price_status_id` int(10) NOT NULL,
  `price_type` enum('มอเตอร์ไซค์รับจ้าง','ส่งไปรษณีย์') NOT NULL,
  `price_value` int(11) NOT NULL,
  `price_withdraw` enum('เบิก','ยังไม่เบิก') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`price_id`, `price_status_id`, `price_type`, `price_value`, `price_withdraw`) VALUES
(1, 2, 'ส่งไปรษณีย์', 35, 'ยังไม่เบิก');

-- --------------------------------------------------------

--
-- Table structure for table `recommand`
--

CREATE TABLE `recommand` (
  `rec_id` int(10) NOT NULL,
  `rec_title` varchar(30) NOT NULL,
  `rec_call` varchar(30) NOT NULL,
  `rec_author` varchar(30) DEFAULT NULL,
  `rec_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_name` varchar(50) NOT NULL,
  `user_surname` varchar(50) NOT NULL,
  `user_id` int(10) NOT NULL,
  `user_title` enum('นิสิต','บุคลากรภายในมหาวิทยาลัย','ประชาชนทั่วไป') NOT NULL,
  `user_stdID` varchar(10) DEFAULT NULL,
  `user_faculty` varchar(50) NOT NULL,
  `user_department` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_tel` varchar(10) NOT NULL,
  `user_lineID` varchar(30) NOT NULL,
  `user_sendOption` enum('รับด้านหน้าหอสมุด','ส่งคณะ / ภาควิชาในวิทยาเขตกำแพงแสน','ส่งหอพักนอกวิทยาเขตกำแพงแสน','ส่งต่างจังหวัด') NOT NULL,
  `user_address` varchar(200) DEFAULT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_name`, `user_surname`, `user_id`, `user_title`, `user_stdID`, `user_faculty`, `user_department`, `user_email`, `user_tel`, `user_lineID`, `user_sendOption`, `user_address`, `user_date`) VALUES
('ศิรดา', 'อินทร์ศิริ', 1, 'นิสิต', '6121650079', 'ศิลปศาสตร์และวิทยาศาสตร์', 'วิทยาการคอมพิวเตอร์', 'sirada.ins@ku.th', '0861657300', 'siradainsiri', 'รับด้านหน้าหอสมุด', '15/12/2564 เวลา 13:00 น', '2021-12-15 08:42:46'),
('ภัทรชัย', 'หงส์พิริยะกุล', 2, 'นิสิต', '6121650737', 'ศิลปศาสตร์และวิทยาศาสตร์', 'วิทยาการคอมพิวเตอร์', 'pattharachai.h@ku.th', '0888888888', 'krit', 'ส่งคณะ / ภาควิชาในวิทยาเขตกำแพงแสน', 'คณะศิลปศาสตร์และวิทยาศาสตร์', '2021-12-15 03:51:50'),
('สหัสวรรษ', 'รวมธรรม', 3, 'บุคลากรภายในมหาวิทยาลัย', '6121650770', 'ศิลปศาสตร์และวิทยาศาสตร์', 'วิทยาการคอมพิวเตอร์', 'sahattsawat.rua@ku.th', '0811111111', 'pondza', 'ส่งหอพักนอกวิทยาเขตกำแพงแสน', 'หอพัก The bright', '2021-12-15 03:51:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_username`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `book_user_id` (`book_user_id`);

--
-- Indexes for table `bookstatus`
--
ALTER TABLE `bookstatus`
  ADD PRIMARY KEY (`status_id`),
  ADD KEY `status_book_id` (`status_book_id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`price_id`),
  ADD KEY `price_status_id` (`price_status_id`);

--
-- Indexes for table `recommand`
--
ALTER TABLE `recommand`
  ADD PRIMARY KEY (`rec_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bookstatus`
--
ALTER TABLE `bookstatus`
  MODIFY `status_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `price_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `recommand`
--
ALTER TABLE `recommand`
  MODIFY `rec_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`book_user_id`) REFERENCES `user_info` (`user_id`);

--
-- Constraints for table `bookstatus`
--
ALTER TABLE `bookstatus`
  ADD CONSTRAINT `bookstatus_ibfk_1` FOREIGN KEY (`status_book_id`) REFERENCES `book` (`book_id`);

--
-- Constraints for table `price`
--
ALTER TABLE `price`
  ADD CONSTRAINT `price_ibfk_1` FOREIGN KEY (`price_status_id`) REFERENCES `bookstatus` (`status_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
