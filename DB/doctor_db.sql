-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2023 at 01:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `Appointments_ID` int(11) NOT NULL,
  `BookedByReceptionistID` int(11) NOT NULL,
  `PatientsID` int(11) NOT NULL,
  `DoctorsID` int(11) NOT NULL,
  `AppointmentDate` date NOT NULL,
  `AppointmentTime` time NOT NULL,
  `DurationMinutes` int(11) NOT NULL,
  `ReasonForAppointment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`Appointments_ID`, `BookedByReceptionistID`, `PatientsID`, `DoctorsID`, `AppointmentDate`, `AppointmentTime`, `DurationMinutes`, `ReasonForAppointment`) VALUES
(1, 3, 2, 1, '2023-01-10', '14:00:00', 20, 'Broken Arm'),
(3, 1, 1, 2, '2023-02-15', '12:15:00', 20, 'Excesive Headache'),
(8, 1, 1, 1, '2023-05-04', '07:04:00', 30, 'Stomach Cramps'),
(14, 1, 1, 5, '2023-07-07', '10:12:00', 12, 'Checkup'),
(15, 1, 1, 8, '2023-06-23', '10:34:00', 30, 'Headache');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `Doctors_ID` int(11) NOT NULL,
  `RoomsID` int(11) NOT NULL,
  `ProfileImage` varchar(50) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Surname` varchar(25) NOT NULL,
  `DoB` date NOT NULL,
  `Gender` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `IDNumber` varchar(13) NOT NULL,
  `Specialisation` varchar(50) NOT NULL,
  `Rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`Doctors_ID`, `RoomsID`, `ProfileImage`, `Name`, `Surname`, `DoB`, `Gender`, `Email`, `PhoneNumber`, `IDNumber`, `Specialisation`, `Rating`) VALUES
(1, 2, 'Solomon - 2023.06.23 - 03.39.20pm.jpg', 'Solomon', 'Lottering', '1987-01-08', 'Male', 'Kosie@medical1.com', '+27832751940', '8701080005087', 'X-Rays', 3.6),
(2, 1, 'Debbie - 2023.06.23 - 03.40.56pm.jpg', 'Debbie', 'Robbertson', '1978-11-23', 'Female', 'Debbie@medical2.com', '+27737304156', '7811230121086', 'General Practitioner', 3.9),
(3, 3, 'Jenny - 2023.06.23 - 03.41.57pm.jpg', 'Jenny', 'Lawrence', '1979-01-06', 'Female', 'Lawrence@gmail.com', '+27827738521', '7901064125085', 'General Practinare', 4.3),
(5, 3, 'Abba - 2023.06.09 - 06.01.22pm.jpg', 'Abba T', 'Agatha', '1998-11-19', 'Female', 'Teeth@pretty.com', '+27832114100', '9811190003086', 'Dentist', 4.9),
(6, 2, 'Bradley - 2023.06.23 - 03.43.51pm.jpg', 'Bradley', 'Bosman', '1990-10-17', 'Male', 'BradleyB@gmail.com', '+27722014343', '9010171332086', 'Radiology', 4.1),
(8, 3, 'Cecile - 2023.06.23 - 03.43.20pm.jpg', 'Cecile', 'Johnson', '1994-06-16', 'Female', 'CJ@doctors.com', '+27833255593', '9406160005088', 'Radiology', 4.3),
(14, 1, 'John - 2023.06.23 - 05.38.31pm.jpg', 'John', 'Doe', '1997-01-06', 'Male', 'John@mail.com', '27719318753', '9701065031084', 'Dentists', 4.5);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `Patients_ID` int(11) NOT NULL,
  `ProfileImage` varchar(50) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Surname` varchar(25) NOT NULL,
  `DoB` date NOT NULL,
  `Gender` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `PhoneNumber` varchar(13) NOT NULL,
  `IDNumber` varchar(13) NOT NULL,
  `MedicalAidNumber` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`Patients_ID`, `ProfileImage`, `Name`, `Surname`, `DoB`, `Gender`, `Email`, `PhoneNumber`, `IDNumber`, `MedicalAidNumber`) VALUES
(1, 'download (2).jpg', 'Heinrich', 'Visser', '2001-01-01', 'Male', 'HVisser@gmail.com', '+27712531422', '0101014552086', '42731'),
(2, 'download (6).jpg', 'Jaco', 'Moolman', '1999-02-02', 'Male', 'JacoMoolman@gmail.com', '+27832734151', '9902020011085', '459387'),
(3, 'download (7).jpg', 'Jacolene', 'Marais', '1993-09-13', 'Female', 'JacoleneJacolene@gmail.com', '+27712738516', '9309131115087', '2000145'),
(5, 'noprofil.jpg', 'Dianne', 'Curby', '2013-05-15', 'Female', 'None', '+27724157888', '1305152223084', '2324145'),
(6, 'download (8).jpg', 'Elaine', 'Smith', '2003-06-11', 'Female', 'ElaineS01@hotmail.com', '+27823534166', '0306111145087', '4271886'),
(11, 'Frans - 2023.06.23 - 04.03.19pm.jpg', 'Frans', 'Jacobs', '1951-09-11', 'Male', 'Frans101@gmail.com', '27928209821', '5109110005086', '00117658');

-- --------------------------------------------------------

--
-- Table structure for table `receptionists`
--

CREATE TABLE `receptionists` (
  `Receptionists_ID` int(11) NOT NULL,
  `ProfileImage` varchar(50) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Surname` varchar(25) NOT NULL,
  `Banned` tinyint(1) NOT NULL,
  `DoB` date NOT NULL,
  `Gender` varchar(25) NOT NULL,
  `PhoneNumber` varchar(13) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Rank` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receptionists`
--

INSERT INTO `receptionists` (`Receptionists_ID`, `ProfileImage`, `Name`, `Surname`, `Banned`, `DoB`, `Gender`, `PhoneNumber`, `Email`, `Username`, `Password`, `Rank`) VALUES
(1, 'download (9).jpg', 'Pam J', 'Van Wyk', 0, '1997-01-06', 'Female', '+27712318653', 'Pam33@gmail.com', 'Pam01', 'abc', 'Head'),
(2, 'download (9) (2).jpg', 'Felicity', 'Maree', 1, '1966-12-12', 'Female', '+27822435116', 'FelicityKotze@medical.com', 'Kotze', 'Felicity', 'Assistant'),
(3, 'download (10).jpg', 'Hayley', 'Rix', 0, '1969-03-30', 'Female', '+27748714436', 'Hayley23@gmail.com', 'Hayley23', 'Hayley23', 'Assistant');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `Rooms_ID` int(11) NOT NULL,
  `RoomNumber` int(11) NOT NULL,
  `Type` varchar(25) NOT NULL,
  `Capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`Rooms_ID`, `RoomNumber`, `Type`, `Capacity`) VALUES
(1, 1, 'General Examination', 1),
(2, 2, 'X-Rays', 1),
(3, 3, 'Sonar', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`Appointments_ID`),
  ADD KEY `Appointments_ID` (`Appointments_ID`),
  ADD KEY `BookedByReceptionistID` (`BookedByReceptionistID`,`PatientsID`,`DoctorsID`),
  ADD KEY `DoctorsID` (`DoctorsID`),
  ADD KEY `PatientsID` (`PatientsID`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`Doctors_ID`),
  ADD KEY `Doctors_ID` (`Doctors_ID`),
  ADD KEY `RoomsID` (`RoomsID`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`Patients_ID`),
  ADD KEY `Patients_ID` (`Patients_ID`);

--
-- Indexes for table `receptionists`
--
ALTER TABLE `receptionists`
  ADD PRIMARY KEY (`Receptionists_ID`),
  ADD KEY `Receptionists_ID` (`Receptionists_ID`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`Rooms_ID`),
  ADD KEY `Rooms_ID` (`Rooms_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `Appointments_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `Doctors_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `Patients_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `receptionists`
--
ALTER TABLE `receptionists`
  MODIFY `Receptionists_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `Rooms_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_4` FOREIGN KEY (`DoctorsID`) REFERENCES `doctors` (`Doctors_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `appointments_ibfk_5` FOREIGN KEY (`BookedByReceptionistID`) REFERENCES `receptionists` (`Receptionists_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `appointments_ibfk_6` FOREIGN KEY (`PatientsID`) REFERENCES `patients` (`Patients_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`RoomsID`) REFERENCES `rooms` (`Rooms_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
