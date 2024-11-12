-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2024 at 03:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appoinment`
--

CREATE TABLE `tbl_appoinment` (
  `appoinment_id` int(11) NOT NULL,
  `appoinment_details` varchar(30) NOT NULL,
  `appoinment_token` int(30) NOT NULL,
  `appoinment_medicine` varchar(30) NOT NULL,
  `appoinment_status` varchar(50) NOT NULL DEFAULT '0',
  `appoinment_datetime` varchar(30) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_appoinment`
--

INSERT INTO `tbl_appoinment` (`appoinment_id`, `appoinment_details`, `appoinment_token`, `appoinment_medicine`, `appoinment_status`, `appoinment_datetime`, `patient_id`, `doctor_id`) VALUES
(91, 'Antherosclerosis and blood Pre', 1, 'Antibiotics - amoxicillin, Ant', '1', '2024-10-09', 20, 31);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_amt` varchar(50) NOT NULL,
  `booking_staus` int(11) NOT NULL DEFAULT 0,
  `booking_datetime` date NOT NULL,
  `appointment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `cart_qty` int(11) NOT NULL DEFAULT 1,
  `medicine_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `cart_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(30) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(14, ' Cardiovascular'),
(15, 'Neurological Disorders'),
(16, 'Musculoskeletal'),
(17, 'Pediatric Health'),
(18, 'Cancer Treatment');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_title` varchar(500) NOT NULL,
  `complaint_content` varchar(300) NOT NULL,
  `complaint_date` varchar(30) NOT NULL,
  `complaint_reply` varchar(300) NOT NULL,
  `complaint_status` varchar(30) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `dept_id` int(30) NOT NULL,
  `dept_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`dept_id`, `dept_name`) VALUES
(12, ' Cardiology'),
(13, 'Neurology'),
(14, 'Orthopedics'),
(15, 'Pediatrics'),
(16, 'Oncology');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(8, 'Kasaragod'),
(9, 'Kannur'),
(10, 'Wayanad'),
(11, 'Kozhikode'),
(12, 'Malappuram'),
(13, 'Palakkad'),
(15, 'Ernakulam'),
(17, 'Thrissur'),
(19, 'Idukki'),
(20, 'Kottayam'),
(21, 'Alappuzha'),
(22, 'Pathanamthitta'),
(23, 'Kollam'),
(24, 'Thiruvananthapuram');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor`
--

CREATE TABLE `tbl_doctor` (
  `doctor_name` varchar(30) NOT NULL,
  `doctor_email` varchar(30) NOT NULL,
  `doctor_contact` varchar(30) NOT NULL,
  `doctor_password` varchar(30) NOT NULL,
  `doctor_photo` varchar(300) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `doctor_qualification` varchar(300) NOT NULL,
  `doctor_address` varchar(300) NOT NULL,
  `doctor_experience` varchar(300) NOT NULL,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_doctor`
--

INSERT INTO `tbl_doctor` (`doctor_name`, `doctor_email`, `doctor_contact`, `doctor_password`, `doctor_photo`, `doctor_id`, `doctor_qualification`, `doctor_address`, `doctor_experience`, `dept_id`) VALUES
(' Dr. Sarah Elizabeth Johnson', 'Sarah@gmail.com', '9447672096', 'Sarah@123', 'czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdjg2OC1zYXNpLTA2LmpwZw.webp', 31, 'MBBS - Harvard Medical School ', '456 Elm Street, Springfield, Illinois, 62704', '15 Years, Dubai Hospital ', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medicine`
--

CREATE TABLE `tbl_medicine` (
  `medicine_id` int(11) NOT NULL,
  `medicine_name` varchar(30) NOT NULL,
  `medicine_details` varchar(300) NOT NULL,
  `medicine_price` int(30) NOT NULL,
  `subcat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_medicine`
--

INSERT INTO `tbl_medicine` (`medicine_id`, `medicine_name`, `medicine_details`, `medicine_price`, `subcat_id`) VALUES
(1, 'Beta blocker', 'Beta blockers are medicines that lower blood pressure', 200, 6),
(2, 'amoxicillin', 'Used to treat bacterial infections', 500, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient`
--

CREATE TABLE `tbl_patient` (
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(30) NOT NULL,
  `patient_contact` varchar(30) NOT NULL,
  `place_id` int(11) NOT NULL,
  `patient_address` varchar(300) NOT NULL,
  `patient_gender` varchar(30) NOT NULL,
  `patient_dob` varchar(30) NOT NULL,
  `patient_opno` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_patient`
--

INSERT INTO `tbl_patient` (`patient_id`, `patient_name`, `patient_contact`, `place_id`, `patient_address`, `patient_gender`, `patient_dob`, `patient_opno`) VALUES
(20, 'Daniel', '9447662966', 17, 'Kappen House, Aluva ', 'Male', '2003-07-09', 1001),
(21, 'Manu', '9447620966', 15, 'dfgdfggddg', 'Male', '2024-10-11', 1021);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pharmacy`
--

CREATE TABLE `tbl_pharmacy` (
  `pharmacy_id` int(30) NOT NULL,
  `pharmacy_email` varchar(30) NOT NULL,
  `pharmacy_password` varchar(30) NOT NULL,
  `pharmacy_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pharmacy`
--

INSERT INTO `tbl_pharmacy` (`pharmacy_id`, `pharmacy_email`, `pharmacy_password`, `pharmacy_name`) VALUES
(14, 'store@gamil.com', 'Store@123', 'Store');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(50) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(11, 'Kottiyam', 4),
(13, 'Adkathbail', 8),
(14, 'Kelugudde', 8),
(15, 'Manjeri', 12),
(16, 'Cheruthoni', 19),
(17, 'Aluva', 15),
(18, 'Perumbavoor', 15),
(20, 'Azhikode:', 9),
(21, 'Thalassery', 9),
(22, 'Kizhunna', 9),
(23, 'Vythiri', 10),
(24, 'Kalpetta', 10),
(25, 'Mananthavady', 10),
(28, 'Nilambur', 12),
(29, 'Ponnani', 12),
(30, 'Kalamassery', 15),
(31, 'Muvattupuzha', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room`
--

CREATE TABLE `tbl_room` (
  `room_id` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `room_status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_room`
--

INSERT INTO `tbl_room` (`room_id`, `room_no`, `room_status`) VALUES
(3, 0, 'vjgJxk');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `staff_id` int(30) NOT NULL,
  `staff_name` varchar(30) NOT NULL,
  `staff_email` varchar(30) NOT NULL,
  `staff_password` varchar(30) NOT NULL,
  `staff_photo` varchar(300) NOT NULL,
  `staff_contact` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`staff_id`, `staff_name`, `staff_email`, `staff_password`, `staff_photo`, `staff_contact`) VALUES
(16, 'Emmaa', 'emma@gmail.com', 'emma58', 'back-school-concept-flat-style_1273898-701.webp', '9876543210'),
(17, 'Sofia', 'sofia@gmail.com', 'sofi98', 'sticker-profession-cartoon-character_1142157-21933.webp', '9753124680'),
(18, 'Isabella', 'isabella@gmail.com', 'isa56', 'cartoon-nurse-blue-uniform-with-stethoscope-generative-ai_1034986-10649.webp', '9087654321'),
(19, 'staff', 'staff@gmail.com', 'staff', 'destructure.png', '8934356221'),
(20, 'qwww', 'as@gmail.com', '12345', 'pexels-tima-miroshnichenko-8376277.jpg', '123456'),
(21, 'daniel george', 'danielgeorgenote8@gmail.com', 'jeesvilla@123', 'pexels-tima-miroshnichenko-8376277.jpg', '7012540020');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stock_id` int(11) NOT NULL,
  `stock_qty` int(30) NOT NULL,
  `stock_date` varchar(30) NOT NULL,
  `medicine_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stock_id`, `stock_qty`, `stock_date`, `medicine_id`) VALUES
(1, 200, '2024-10-08', 1),
(2, 750, '2024-10-09', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcat_id` int(11) NOT NULL,
  `subcat_name` varchar(30) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcat_id`, `subcat_name`, `category_id`) VALUES
(5, 'Hypertension', 14),
(6, ' Heart Failure', 14),
(7, 'Angina', 14),
(8, 'Epilepsy', 15),
(9, 'Parkinson’s Disease', 15),
(10, 'Migraine', 15),
(11, 'Rheumatoid Arthritis', 16),
(12, 'Acute Back Pain', 16),
(13, 'Osteoarthritis', 16),
(14, ' Infections', 17),
(15, 'Allergies', 17),
(16, 'Asthma', 17),
(17, ' Breast Cancer', 18),
(18, 'Lung Cancer', 18),
(19, ' Prostate Cancer', 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_appoinment`
--
ALTER TABLE `tbl_appoinment`
  ADD PRIMARY KEY (`appoinment_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `tbl_pharmacy`
--
ALTER TABLE `tbl_pharmacy`
  ADD PRIMARY KEY (`pharmacy_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_appoinment`
--
ALTER TABLE `tbl_appoinment`
  MODIFY `appoinment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `dept_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_pharmacy`
--
ALTER TABLE `tbl_pharmacy`
  MODIFY `pharmacy_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_room`
--
ALTER TABLE `tbl_room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `staff_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
