-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2017 at 03:36 AM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jenusits`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Delete_Branch`(IN `b_id` INT(3), IN `b_Address` VARCHAR(50), IN `b_Contact_no` VARCHAR(15), IN `b_Email` VARCHAR(20), IN `b_Date_Established` DATE)
BEGIN

DELETE FROM branch

WHERE id = b_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Delete_Department`(IN `d_id` INT(3), IN `d_Dept_Name` VARCHAR(50), IN `d_Functions` VARCHAR(50))
BEGIN

DELETE FROM department

WHERE

d_id = id ;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Delete_Educational_Level`(IN `el_id` INT(3), IN `el_Educational_Level_Name` VARCHAR(100))
BEGIN

DELETE FROM educational_level

WHERE

el_id = id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Delete_Employee`(IN `e_User_ID` INT, IN `e_ID` VARCHAR(20), IN `e_First_Name` VARCHAR(50), IN `e_Last_Name` VARCHAR(50), IN `e_Middle_Name` VARCHAR(50), IN `e_Extension_Name` VARCHAR(20), IN `e_Gender` BIT(1), IN `e_Birthday` DATE, IN `e_Street` VARCHAR(50), IN `e_City` VARCHAR(20), IN `e_State` VARCHAR(50), IN `e_Country` VARCHAR(20), IN `e_ZIPCode` VARCHAR(20), IN `e_Contact_No` VARCHAR(15), IN `e_Email` VARCHAR(50), IN `e_Civil_Status` VARCHAR(20), IN `e_Citizenship` VARCHAR(30), IN `e_Date_Hired` DATE, IN `e_SSS` VARCHAR(50), IN `e_GSIS` VARCHAR(50), IN `e_TIN` VARCHAR(50), IN `e_PhilHealth` VARCHAR(50), IN `e_Pagibig` VARCHAR(50), IN `e_Username` VARCHAR(20), IN `e_Password` VARCHAR(50))
BEGIN

DELETE FROM employee 
WHERE e_User_ID = User_ID &&
e_ID = ID;                             

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Delete_Emp_EducBG`(IN `eb_id` INT(3), IN `eb_School` VARCHAR(100), IN `eb_Level_ID` INT(3), IN `eb_Address` VARCHAR(200), IN `eb_From_Year` DATE, IN `eb_To_Year` DATE)
BEGIN 

DELETE FROM emp_educbg
 
WHERE
 
id = eb_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Delete_Status`(IN `s_id` INT(3), IN `s_Status_Name` VARCHAR(20))
BEGIN

DELETE FROM status

WHERE

id = s_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Insert_Branch`(IN `b_id` INT(3), IN `b_Address` VARCHAR(50), IN `b_Contact_No` VARCHAR(15), IN `b_Email` VARCHAR(20), IN `b_Date_Established` DATE, IN `Status` BIT(1))
BEGIN

insert into branch
(    
id,Address, Contact_No, Email, Date_Established, Status
) 
   
VALUES
(    
 b_id, b_Address, b_Contact_No, b_Email , b_Date_Established, Status
);


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Insert_Department`(IN `d_id` INT(3), IN `d_Dept_Name` VARCHAR(50), IN `d_Functions` VARCHAR(50))
BEGIN 

insert into department ( id,Dept_Name, Functions ) 

VALUES ( d_ID,d_Dept_Name, d_Functions );


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Insert_Educational_Level`(IN `el_id` INT(3), IN `el_Educatinal_Level_Name` VARCHAR(100))
BEGIN 

insert into educational_level ( id,educational_Level_Name ) 

VALUES ( el_ID, el_Educatinal_Level_Name);


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Insert_Employee`(IN `e_User_ID` INT(3), IN `e_ID` VARCHAR(20), IN `e_First_Name` VARCHAR(50), IN `e_Middle_Name` VARCHAR(50), IN `e_Last_Name` VARCHAR(50), IN `e_Extension_Name` VARCHAR(20), IN ` e_Gender` BIT(1), IN `e_Birthday` DATE, IN `e_Street` VARCHAR(50), IN `e_City` VARCHAR(20), IN `e_State` VARCHAR(50), IN `e_Country` VARCHAR(20), IN `e_ZIPCODE` VARCHAR(20), IN `e_Contact_No` VARCHAR(15), IN `e_Email` VARCHAR(50), IN `e_Civil_Status` VARCHAR(20), IN `e_Citizenship` VARCHAR(30), IN `e_Date_Hired` DATE, IN `e_SSS` VARCHAR(50), IN `e_GSIS` VARCHAR(50), IN `e_TIN` VARCHAR(50), IN `e_PhilHealth` VARCHAR(50), IN `e_Pagibig` VARCHAR(50), IN `e_Username` VARCHAR(20), IN `e_Password` VARCHAR(50))
BEGIN

INSERT INTO employee 
( 
User_ID,ID, First_Name, Last_Name, Middle_Name, Extension_Name, Gender, Birthday, Street, City, State, Country, ZIPCode, Contact_No, Email, Civil_Status, Citizenship, Date_Hired, SSS,GSIS,TIN, PhilHealth, Pagibig, Username,Password
)
                                
VALUES
(
e_User_ID, e_ID, e_First_Name, e_Middle_Name, e_Last_Name,  e_Extension_Name , e_Gender,  e_Birthday, e_Street, e_City, e_State, e_Country, e_ZIPCODE,  e_Contact_No,  e_Email, e_Civil_Status, e_Citizenship, e_Date_Hired, e_SSS, e_GSIS, e_TIN,  e_PhilHealth,  e_Pagibig, e_Username, e_Password
);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Insert_Emp_EducBG`(IN `eb_id` INT(3), IN `eb_School` VARCHAR(100), IN `eb_Level_ID` INT(3), IN `eb_Address` VARCHAR(200), IN `eb_From_Year` DATE, IN `eb_To_Year` DATE)
BEGIN 
insert into emp_educbg

(id, School, Level_ID, Address, From_Year, To_Year)

VALUES

(eb_id, eb_School, eb_Level_ID, eb_Address, eb_From_Year, eb_To_Year);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Insert_Status`(IN `s_id` INT(3), IN `s_Status_Name` VARCHAR(20))
BEGIN
INSERT INTO status

(id, Status_Name)

VALUES
(s_id, s_Status_Name);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Update_Branch`(IN `b_id` INT(3), IN `b_Addres` VARCHAR(50), IN `b_Contact_No` VARCHAR(15), IN `b_Email` VARCHAR(20), IN `b_Date_Established` DATE, IN `b_Status` BIT(1))
    NO SQL
BEGIN 

UPDATE branch
SET 

Address = b_Address,
Contact_No = b_Contact_No,
Email = b_Email,
Date_Established = b_Date_Established,
Status = b_Status

Where id = b_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Update_Department`(IN `d_id` INT(3), IN `d_Dept_Name` VARCHAR(50), IN `d_Functions` VARCHAR(50))
    NO SQL
BEGIN

UPDATE department

SET

Dept_Name = d_Dept_Name,
Functions = d_Functions

WHERE

id = d_id ;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Update_Educational_Level`(IN `el_id` INT(3), IN `el_Educational_Level_Name` VARCHAR(100))
BEGIN
 
 UPDATE educational_level
 SET
 
 Educational_Level_Name = el_Educational_Level_Name
 
 WHERE
 
 id = el_id;
 
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Update_Employee`(IN `e_User_ID` INT(3), IN `e_ID` VARCHAR(20), IN `e_First_Name` VARCHAR(50), IN `e_Middle_Name` VARCHAR(50), IN `e_Last_Name` VARCHAR(50), IN `e_Extension_Name` VARCHAR(20), IN `e_Gender` BIT(1), IN `e_Birthday` DATE, IN `e_Street` VARCHAR(50), IN `e_City` VARCHAR(20), IN `e_State` VARCHAR(50), IN `e_Country` VARCHAR(20), IN `e_ZIPCode` VARCHAR(20), IN `e_Contact_No` VARCHAR(15), IN `e_Email` VARCHAR(50), IN `e_Civil_Status` VARCHAR(20), IN `e_Citizenship` VARCHAR(30), IN `e_Date_Hired` DATE, IN `e_SSS` VARCHAR(50), IN `e_GSIS` VARCHAR(50), IN `e_TIN` VARCHAR(50), IN `e_PhilHealth` VARCHAR(50), IN `e_Pagibig` VARCHAR(50), IN `e_Username` VARCHAR(20), IN `e_Password` VARCHAR(50))
BEGIN
UPDATE employee 
SET

ID = e_ID, 
First_Name = e_First_Name, 
Middle_Name = e_Middle_Name,
Last_Name = e_Last_Name, 
Extension_Name = e_Extension_Name, 
Gender = e_Gender, 
Birthday = e_Birthday,
Street = e_Street,
City = e_City, 
State = e_State, 
Country = e_Country, 
ZIPCode = e_ZIPCODE,
Contact_No = e_Contact_No, 
Email = e_Email, 
Civil_Status = e_Civil_Status , 
Citizenship = e_Citizenship, 
Date_Hired = e_Date_Hired, 
SSS = e_SSS,
GSIS = e_GSIS, 
TIN = e_TIN, 
PhilHealth = e_PhilHealth, 
Pagibig = e_Pagibig, 
Username = e_Username, 
Password = e_Password

Where User_ID = e_User_ID;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Update_Emp_EducBG`(IN `eb_id` INT(3), IN `eb_School` VARCHAR(100), IN `eb_Level_ID` INT(3), IN `eb_Address` VARCHAR(200), IN `eb_From_Year` DATE, IN `eb_To_Year` DATE)
BEGIN

UPDATE emp_educbg

SET

School = eb_School,
Level_ID = eb_Level_ID,
Address = eb_Address,
From_Year = eb_From_Year,
To_Year = eb_To_Year

WHERE

id = eb_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Update_Status`(IN `s_id` INT(3), IN `s_Status_Name` VARCHAR(20))
BEGIN

UPDATE status
SET

Status_Name = s_Status_Name

WHERE

id = s_id;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `benefits`
--

CREATE TABLE IF NOT EXISTS `benefits` (
  `id` int(11) NOT NULL,
  `exp_name` varchar(30) NOT NULL,
  `exp_desc` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `status` bit(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `id` int(3) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Contact_No` varchar(15) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Date_Established` date NOT NULL,
  `Status` int(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `Address`, `Contact_No`, `Email`, `Date_Established`, `Status`) VALUES
(6, 'Commonwealth Quezon City', '2272827', 'jenus@yahoo.com', '2012-08-12', 0),
(7, 'Jocfer Bldg. Comm.Ave', '287-0994', 'info@jenusitsolution', '2010-05-09', 2),
(8, 'Caloocan', '6399999999999', 'caloocan@yahoo.com', '2017-01-03', 1),
(9, 'sample', '639999999999999', 'sample@yahoo.com', '1996-11-12', 1),
(10, 'sda', 'sdsadsdsdsdds', 'das@y.c', '2017-02-25', 0),
(11, 'dsadsa', 'kjkjkjkjlkjjl', 'asd@s', '2017-02-01', 0),
(12, '343', '343443434324243', '43@t.y', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

CREATE TABLE IF NOT EXISTS `deductions` (
  `id` int(11) NOT NULL,
  `Deduc_Name` varchar(30) NOT NULL,
  `Deduc_Desc` varchar(50) NOT NULL,
  `Amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(3) NOT NULL,
  `Dept_Name` varchar(50) NOT NULL,
  `Functions` varchar(50) NOT NULL,
  `Status` int(3) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `Dept_Name`, `Functions`, `Status`) VALUES
(1, 'Human Resource (HR) Department', 'Recruitment and selection.', 1),
(2, 'Information Technology', 'Information Technology', 1),
(3, 'Finance', 'Financing', 1),
(4, 'sample', 'sample', 1);

-- --------------------------------------------------------

--
-- Table structure for table `educational_level`
--

CREATE TABLE IF NOT EXISTS `educational_level` (
  `ID` int(3) NOT NULL,
  `Educational_Level_Name` varchar(100) NOT NULL,
  `Status` int(3) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `educational_level`
--

INSERT INTO `educational_level` (`ID`, `Educational_Level_Name`, `Status`) VALUES
(1, 'Elementary', 1),
(2, 'Secondary', 1),
(3, 'Tertiary', 1),
(4, 'Masteral', 1),
(5, 'Vocational', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `User_ID` int(3) NOT NULL,
  `ID` varchar(20) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Middle_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Extension_Name` varchar(5) NOT NULL,
  `Gender` bit(1) NOT NULL,
  `Birthday` date NOT NULL,
  `Street` varchar(50) NOT NULL,
  `City` varchar(20) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Country` varchar(20) NOT NULL,
  `ZIPCode` varchar(20) NOT NULL,
  `Contact_No` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Civil_Status` varchar(20) NOT NULL,
  `Citizenship` varchar(30) NOT NULL,
  `Date_Hired` date DEFAULT NULL,
  `SSS` varchar(50) NOT NULL,
  `GSIS` varchar(50) NOT NULL,
  `TIN` varchar(50) NOT NULL,
  `PhilHealth` varchar(50) NOT NULL,
  `Pagibig` varchar(50) NOT NULL,
  `Bank_Account` varchar(50) NOT NULL,
  `Basic_Pay` float NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Credits` double NOT NULL,
  `Status_ID` int(3) DEFAULT NULL,
  `JobTitle_ID` int(3) DEFAULT '1',
  `Branch_ID` int(11) DEFAULT NULL,
  `Dept_ID` int(11) DEFAULT NULL,
  `Profile_Pic` varchar(100) DEFAULT 'Uploads\\avatar0.png',
  `Date_Acct_Created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`User_ID`, `ID`, `First_Name`, `Middle_Name`, `Last_Name`, `Extension_Name`, `Gender`, `Birthday`, `Street`, `City`, `State`, `Country`, `ZIPCode`, `Contact_No`, `Email`, `Civil_Status`, `Citizenship`, `Date_Hired`, `SSS`, `GSIS`, `TIN`, `PhilHealth`, `Pagibig`, `Bank_Account`, `Basic_Pay`, `Username`, `Password`, `Credits`, `Status_ID`, `JobTitle_ID`, `Branch_ID`, `Dept_ID`, `Profile_Pic`, `Date_Acct_Created`) VALUES
(37, 'JITSOJITSO0006', 'First', '', 'Last', '', b'0', '0000-00-00', '', '', '', '', '', '639012345678', 'sample@y.c', '', '', '2016-12-12', '', '', '', '', '', '', 0, '', 'gBdFAfIA5KqcQvX3+KeMTIHNvwxjBVgSFLJnq8a9UNI=', 0, NULL, 6, 6, NULL, 'Uploads\\37_First Last.png', '0000-00-00 00:00:00'),
(38, '', 'Louie', '', 'Sjuana', '', b'0', '0000-00-00', '', '', '', '', '', '639232185925', 'sample@yahoo.com', '', '', NULL, '', '', '', '', '', '', 0, '', 'fA5LS1jLHwpgI2MTf41Wbw29gnqJr+kjx88urbXitDs=', 0, NULL, 7, NULL, NULL, 'Uploads\\38_Louie Sjuana.jpg', '0000-00-00 00:00:00'),
(39, '', '1', '', '1', '', b'0', '0000-00-00', '', '', '', '', '', '639999999999', '1@y.c', '', '', NULL, '', '', '', '', '', '', 0, '', 'fA5LS1jLHwpgI2MTf41Wbw29gnqJr+kjx88urbXitDs=', 0, NULL, 1, NULL, NULL, 'Uploads\\avatar0.png', '0000-00-00 00:00:00'),
(40, '', 'yeah', '', 'yeah', '', b'0', '0000-00-00', '', '', '', '', '', '639999999999', 'yeah@yahoo.com', '', '', NULL, '', '', '', '', '', '', 0, 'yeah', 'ZiBhj2Z7iatIcxayI6ZhZscy8MOUdupeSG78vq9TqR4=', 0, NULL, 1, NULL, NULL, 'Uploads\\40_yeah yeah.jpg', '0000-00-00 00:00:00'),
(41, 'JITSAJITSO008', 'Lg', 'L', 'Camarillo', 'da', b'1', '2017-02-15', 'Mabini', 'QC', '', 'Phil', '1121', '639362544920', 'lg@g.com', 'Single', 'dsa', '2017-02-01', '111', '', '111', '11', '11', '', 0, '', 'EXEDr/vaSwNcXTOIzhyife7vLAIYc3mcOkEXvTlU+KA=', 0, NULL, 7, 6, NULL, 'Uploads\\41_Lg Camarillo.jpg', '0000-00-00 00:00:00'),
(42, 'JITSG0001', 'Jebelyn', '', 'Dublon', '', b'0', '0000-00-00', '', '', '', '', '', '639999999999', 'jeb@gmail.com', '', '', '1980-02-14', '', '', '', '', '', '', 0, '', 'ZiBhj2Z7iatIcxayI6ZhZscy8MOUdupeSG78vq9TqR4=', 0, NULL, 5, 6, NULL, 'Uploads\\avatar0.png', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `emp_educbg`
--

CREATE TABLE IF NOT EXISTS `emp_educbg` (
  `ID` int(3) NOT NULL,
  `School` varchar(100) NOT NULL,
  `Level_ID` int(3) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `From_Year` date NOT NULL,
  `To_Year` date NOT NULL,
  `Status` int(3) DEFAULT '1',
  `User_ID` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_educbg`
--

INSERT INTO `emp_educbg` (`ID`, `School`, `Level_ID`, `Address`, `From_Year`, `To_Year`, `Status`, `User_ID`) VALUES
(1, 'west', 1, '123', '2009-02-06', '2013-02-07', 1, 41),
(2, 'asd', 2, 'asd', '2013-06-06', '2017-03-25', 1, 41),
(3, 'fs', 3, 'fds', '2017-09-03', '2019-09-08', 1, 41);

-- --------------------------------------------------------

--
-- Table structure for table `emp_emergency`
--

CREATE TABLE IF NOT EXISTS `emp_emergency` (
  `ID` int(3) NOT NULL,
  `Contact_Person` varchar(100) NOT NULL,
  `Contact_No` varchar(15) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Relation` varchar(50) NOT NULL,
  `Status` int(3) DEFAULT '1',
  `User_ID` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_emergency`
--

INSERT INTO `emp_emergency` (`ID`, `Contact_Person`, `Contact_No`, `Address`, `Relation`, `Status`, `User_ID`) VALUES
(1, 'dasdsa', 'sdas', 'dsadsa', 'Mother', 1, 41),
(3, 'dsa', 'das', 'da', 'Sibling', 1, 41),
(4, '312', '312312323123232', '3132', 'Father', 1, 41),
(5, 'sda', '154343434343432', '343434434', 'Father', 1, 41);

-- --------------------------------------------------------

--
-- Table structure for table `emp_familybg`
--

CREATE TABLE IF NOT EXISTS `emp_familybg` (
  `ID` int(3) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Occupation` varchar(50) NOT NULL,
  `Relation` varchar(50) NOT NULL,
  `Status` int(3) DEFAULT '1',
  `User_ID` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_familybg`
--

INSERT INTO `emp_familybg` (`ID`, `Name`, `Occupation`, `Relation`, `Status`, `User_ID`) VALUES
(1, 'fdfs', 'sdas', 'Mother', 1, 41),
(2, 'dsa', 'dsa', 'Father', 1, 41),
(3, 'sadsa', 'sada', 'Mother', 1, 41);

-- --------------------------------------------------------

--
-- Table structure for table `emp_schedule`
--

CREATE TABLE IF NOT EXISTS `emp_schedule` (
  `id` int(11) NOT NULL,
  `Shift` varchar(30) NOT NULL,
  `Starting_time` time NOT NULL,
  `End_Time` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_schedule`
--

INSERT INTO `emp_schedule` (`id`, `Shift`, `Starting_time`, `End_Time`) VALUES
(1, 'Day Shift', '08:30:00', '05:30:00'),
(2, 'Night Shift', '23:00:00', '08:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `emp_time_table`
--

CREATE TABLE IF NOT EXISTS `emp_time_table` (
  `id` int(11) DEFAULT NULL,
  `overtime` int(20) NOT NULL,
  `undertime` int(20) NOT NULL,
  `late` int(20) NOT NULL,
  `absences` int(20) NOT NULL,
  `user_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_workbg`
--

CREATE TABLE IF NOT EXISTS `emp_workbg` (
  `ID` int(3) NOT NULL,
  `Company_Name` varchar(100) NOT NULL,
  `Job_Title` varchar(50) NOT NULL,
  `From_Year` date NOT NULL,
  `To_Year` date NOT NULL,
  `Status` int(3) DEFAULT '1',
  `User_ID` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_workbg`
--

INSERT INTO `emp_workbg` (`ID`, `Company_Name`, `Job_Title`, `From_Year`, `To_Year`, `Status`, `User_ID`) VALUES
(1, 'sdas', 'dsa', '2017-02-05', '2017-02-11', 1, 41);

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE IF NOT EXISTS `holidays` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Holiday_Type` bit(1) NOT NULL,
  `Status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `id` int(3) NOT NULL,
  `Job_Title` varchar(50) NOT NULL,
  `Code` varchar(20) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Status` int(3) DEFAULT '1',
  `Dept_ID` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `Job_Title`, `Code`, `Description`, `Status`, `Dept_ID`) VALUES
(1, 'Employee', '', 'Default Job Title', 1, 2),
(2, 'Web Designer', 'W', 'Web Designer', 1, 2),
(3, 'PHP Programmer', 'P', 'Programmer', 1, 2),
(4, 'Social Media Marketer', 'S', 'Social Media Marketer', 1, 2),
(5, 'Graphic Designer', 'G', 'Graphic Designer', 1, 2),
(6, 'OJT', 'O', 'OJT', 1, 2),
(7, 'Admin', 'A', 'system administrator', 1, 1),
(8, 'dssda', 'ds', 'dad', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE IF NOT EXISTS `leave` (
  `ID` int(11) NOT NULL,
  `Leave_Name` varchar(30) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(3) NOT NULL,
  `Login_Time` datetime DEFAULT '0000-00-00 00:00:00',
  `Logout_Time` datetime DEFAULT '0000-00-00 00:00:00',
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `Login_Time`, `Logout_Time`, `User_ID`) VALUES
(19, '2017-01-27 10:11:14', '2017-01-27 10:11:30', 37),
(20, '2017-01-27 10:14:57', '0000-00-00 00:00:00', 38),
(21, '2017-01-27 10:19:10', '2017-01-27 10:33:44', 38),
(22, '2017-01-27 10:33:54', '2017-01-27 10:35:13', 38),
(23, '2017-01-27 10:36:09', '0000-00-00 00:00:00', 40),
(24, '2017-01-31 15:11:25', '2017-01-31 16:02:15', 38),
(25, '2017-01-31 16:02:36', '0000-00-00 00:00:00', 38),
(26, '2017-02-02 12:36:58', '2017-02-02 12:37:46', 41),
(27, '2017-02-02 12:37:49', '0000-00-00 00:00:00', 41),
(28, '2017-02-02 14:01:15', '0000-00-00 00:00:00', 41),
(29, '2017-02-03 04:24:58', '2017-02-03 04:26:19', 41),
(30, '2017-02-08 10:58:51', '0000-00-00 00:00:00', 41),
(31, '2017-02-09 09:20:48', '0000-00-00 00:00:00', 41),
(32, '2017-02-09 11:11:52', '2017-02-09 14:29:49', 41),
(33, '2017-02-09 14:34:56', '2017-02-09 14:36:17', 42),
(34, '2017-02-09 14:36:31', '2017-02-09 14:43:47', 42),
(35, '2017-02-09 14:44:00', '2017-02-09 14:47:51', 41),
(36, '2017-02-09 14:52:53', '2017-02-09 14:58:38', 42),
(37, '2017-02-09 14:59:21', '0000-00-00 00:00:00', 41);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `ID` int(3) NOT NULL,
  `Status_Name` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`ID`, `Status_Name`) VALUES
(1, 'Active'),
(2, 'Deceased'),
(3, 'On Non-Pay Leave'),
(4, 'Processing'),
(5, 'Retired'),
(6, 'Terminated'),
(7, 'On - Leave'),
(8, 'Inactive'),
(9, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `ID` int(11) NOT NULL,
  `Team_Name` varchar(30) NOT NULL,
  `Shift` bit(1) NOT NULL,
  `Status` bit(1) NOT NULL,
  `Dept_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE IF NOT EXISTS `time` (
  `ID` int(3) NOT NULL,
  `Time_In` datetime DEFAULT '0000-00-00 00:00:00',
  `Time_Out` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Break_In` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Break_Out` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`ID`, `Time_In`, `Time_Out`, `Break_In`, `Break_Out`, `User_ID`) VALUES
(51, '2017-01-27 09:53:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 36),
(52, '2017-01-27 10:19:13', '2017-01-27 10:34:04', '2017-01-27 10:34:00', '2017-01-27 10:34:02', 38),
(53, '2017-01-31 15:11:55', '0000-00-00 00:00:00', '2017-01-31 15:12:00', '2017-01-31 15:12:02', 38),
(54, '2017-02-08 11:01:26', '2017-02-08 13:52:48', '2017-02-08 13:06:17', '2017-02-08 13:18:38', 41),
(55, '2017-02-08 13:56:03', '2017-02-08 14:33:17', '2017-02-08 14:33:09', '2017-02-08 14:33:14', 41),
(56, '2017-02-09 09:31:38', '2017-02-09 10:44:55', '2017-02-09 10:20:19', '2017-02-09 10:20:49', 41),
(57, '2017-02-09 11:14:18', '2017-02-09 11:20:56', '2017-02-09 11:20:49', '2017-02-09 11:20:52', 41),
(58, '2017-02-09 13:09:38', '2017-02-09 14:01:47', '2017-02-09 14:01:44', '2017-02-09 14:01:46', 41),
(59, '2017-02-09 14:16:18', '2017-02-09 14:24:45', '2017-02-09 14:16:33', '2017-02-09 14:20:45', 41),
(60, '2017-02-09 14:24:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 41),
(61, '2017-02-09 14:35:48', '2017-02-09 14:54:31', '2017-02-09 14:54:28', '2017-02-09 14:54:29', 42);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `benefits`
--
ALTER TABLE `benefits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deductions`
--
ALTER TABLE `deductions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educational_level`
--
ALTER TABLE `educational_level`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `emp_educbg`
--
ALTER TABLE `emp_educbg`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `emp_emergency`
--
ALTER TABLE `emp_emergency`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `emp_familybg`
--
ALTER TABLE `emp_familybg`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `emp_schedule`
--
ALTER TABLE `emp_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_workbg`
--
ALTER TABLE `emp_workbg`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `benefits`
--
ALTER TABLE `benefits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `deductions`
--
ALTER TABLE `deductions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `educational_level`
--
ALTER TABLE `educational_level`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `User_ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `emp_educbg`
--
ALTER TABLE `emp_educbg`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `emp_emergency`
--
ALTER TABLE `emp_emergency`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `emp_familybg`
--
ALTER TABLE `emp_familybg`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `emp_schedule`
--
ALTER TABLE `emp_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `emp_workbg`
--
ALTER TABLE `emp_workbg`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `employee` (`User_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
