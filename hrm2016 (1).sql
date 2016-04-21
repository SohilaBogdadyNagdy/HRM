-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21 أبريل 2016 الساعة 14:55
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hrm2016`
--

-- --------------------------------------------------------

--
-- بنية الجدول `academic source`
--

CREATE TABLE IF NOT EXISTS `academic source` (
`ID` int(11) NOT NULL,
  `Academic Source` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- بنية الجدول `city`
--

CREATE TABLE IF NOT EXISTS `city` (
`City_ID` int(11) NOT NULL,
  `City Name` varchar(50) DEFAULT NULL,
  `City Code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- بنية الجدول `doctors`
--

CREATE TABLE IF NOT EXISTS `doctors` (
`Doctors_ID` int(11) NOT NULL,
  `D_pdoduce_type` varchar(50) DEFAULT NULL,
  `Place` varchar(300) DEFAULT NULL,
  `Start_date` date DEFAULT NULL,
  `End_date` date DEFAULT NULL,
  `Place_choice` varchar(50) DEFAULT NULL,
  `Govenmate` varchar(50) DEFAULT NULL,
  `Depatment` varchar(50) DEFAULT NULL,
  `Unit` varchar(50) DEFAULT NULL,
  `Spchileast` varchar(50) DEFAULT NULL,
  `Employee` int(11) DEFAULT NULL,
  `movementdate` date DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- بنية الجدول `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
`Id` int(11) NOT NULL,
  `Name` varchar(400) DEFAULT NULL,
  `Sector` varchar(50) DEFAULT NULL,
  `Creat Data` date DEFAULT NULL,
  `Modificat Date` datetime DEFAULT NULL,
  `National ID` varchar(50) DEFAULT NULL,
  `Insurance ID` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Address` varchar(300) DEFAULT NULL,
  `Contract State` varchar(50) DEFAULT NULL,
  `Onus Date` date DEFAULT NULL,
  `Contract Date` date DEFAULT NULL,
  `Cotract No` varchar(50) DEFAULT NULL,
  `Start work Date` date DEFAULT NULL,
  `Academic Qqualification` varchar(50) DEFAULT NULL,
  `Specialization` varchar(50) DEFAULT NULL,
  `Source` varchar(50) DEFAULT NULL,
  `Date of Academic` date DEFAULT NULL,
  `Source of Primary certificate` varchar(100) DEFAULT NULL,
  `Source of Junior certificate` varchar(100) DEFAULT NULL,
  `Opject Group` varchar(50) DEFAULT NULL,
  `Job title` int(11) DEFAULT NULL,
  `Financial class` varchar(50) DEFAULT NULL,
  `Creat By` varchar(50) DEFAULT NULL,
  `Sector 3` varchar(50) DEFAULT NULL,
  `Deprtment` varchar(50) DEFAULT NULL,
  `Technical Jop` varchar(50) DEFAULT NULL,
  `Administration Job` varchar(50) DEFAULT NULL,
  `Date of Now Job` date DEFAULT NULL,
  `Financial class 2` varchar(50) DEFAULT NULL,
  `Date of Now F C` date DEFAULT NULL,
  `Now Acadmic` varchar(50) DEFAULT NULL,
  `Date of Now Aca` date DEFAULT NULL,
  `Employment Status` varchar(50) DEFAULT NULL,
  `First_N` varchar(100) DEFAULT NULL,
  `Scand_N` varchar(100) DEFAULT NULL,
  `Third_N` varchar(100) DEFAULT NULL,
  `Association No` varchar(100) DEFAULT NULL,
  `profession No` varchar(50) DEFAULT NULL,
  `Movement procuratorates Date` date DEFAULT NULL,
  `Have it Date` date DEFAULT NULL,
  `Imiage` varchar(500) DEFAULT NULL,
  `Motda_type` varchar(300) DEFAULT NULL,
  `pass` varchar(300) DEFAULT NULL,
  `not_need` varchar(11) DEFAULT NULL,
  `STATE` varchar(50) DEFAULT NULL,
  `out_code` varchar(50) DEFAULT NULL,
  `out_Date` date DEFAULT NULL,
  `mstatus` varchar(50) DEFAULT NULL,
  `Serv Debartment` varchar(50) DEFAULT NULL,
  `comment` mediumtext,
  `Main work place` varchar(50) DEFAULT NULL,
  `Balance B` int(11) DEFAULT '6',
  `Balance A` int(11) DEFAULT '15',
  `Vacation Year` varchar(4) DEFAULT NULL,
  `Fourth_N` varchar(100) DEFAULT NULL,
  `mang_desc_number` varchar(50) DEFAULT NULL,
  `mang_desc_sorce` varchar(100) DEFAULT NULL,
  `INstatus8` varchar(50) DEFAULT NULL,
  `visa_number` int(11) DEFAULT NULL,
  `T_degree` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8346 ;

-- --------------------------------------------------------

--
-- بنية الجدول `employment status`
--

CREATE TABLE IF NOT EXISTS `employment status` (
`ID` int(11) NOT NULL,
  `Employment Status` varchar(50) DEFAULT NULL,
  `employment status code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

--
-- بنية الجدول `financial class`
--

CREATE TABLE IF NOT EXISTS `financial class` (
`ID` int(11) NOT NULL,
  `Class Name` varchar(50) DEFAULT NULL,
  `Groupe Type` varchar(50) DEFAULT NULL,
  `financial class Code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=272 ;

-- --------------------------------------------------------

--
-- بنية الجدول `gander`
--

CREATE TABLE IF NOT EXISTS `gander` (
`Gander_ID` int(11) NOT NULL,
  `Gander` varchar(50) DEFAULT NULL,
  `Gander Code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- بنية الجدول `governorate`
--

CREATE TABLE IF NOT EXISTS `governorate` (
`ID` int(11) NOT NULL,
  `Governorate` varchar(50) DEFAULT NULL,
  `Code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

-- --------------------------------------------------------

--
-- بنية الجدول `groupe type`
--

CREATE TABLE IF NOT EXISTS `groupe type` (
`ID` int(11) NOT NULL,
  `Group_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- بنية الجدول `hrm2_audit`
--

CREATE TABLE IF NOT EXISTS `hrm2_audit` (
`id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `ip` varchar(40) NOT NULL,
  `user` varchar(300) DEFAULT NULL,
  `table` varchar(300) DEFAULT NULL,
  `action` varchar(250) NOT NULL,
  `description` mediumtext
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1051 ;

-- --------------------------------------------------------

--
-- بنية الجدول `hrm2_rightuggroups`
--

CREATE TABLE IF NOT EXISTS `hrm2_rightuggroups` (
`GroupID` int(11) NOT NULL,
  `Label` varchar(300) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- بنية الجدول `hrm2_rightugmembers`
--

CREATE TABLE IF NOT EXISTS `hrm2_rightugmembers` (
`GroupID` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- بنية الجدول `hrm2_rightugrights`
--

CREATE TABLE IF NOT EXISTS `hrm2_rightugrights` (
  `TableName` varchar(300) NOT NULL,
  `GroupID` int(11) NOT NULL,
  `AccessMask` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `hrm2_users`
--

CREATE TABLE IF NOT EXISTS `hrm2_users` (
`ID` int(11) NOT NULL,
  `username` varchar(300) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `fullname` varchar(300) DEFAULT NULL,
  `groupid` varchar(300) DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- بنية الجدول `hrm17_searches`
--

CREATE TABLE IF NOT EXISTS `hrm17_searches` (
`ID` int(11) NOT NULL,
  `NAME` mediumtext,
  `USERNAME` mediumtext,
  `COOKIE` varchar(500) DEFAULT NULL,
  `SEARCH` mediumtext,
  `TABLENAME` varchar(300) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- بنية الجدول `job title`
--

CREATE TABLE IF NOT EXISTS `job title` (
`ID_jop` int(11) NOT NULL,
  `Job Title` varchar(50) DEFAULT NULL,
  `Code` int(11) DEFAULT NULL,
  `Group Type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=539 ;

-- --------------------------------------------------------

--
-- بنية الجدول `jops requirment`
--

CREATE TABLE IF NOT EXISTS `jops requirment` (
`ID` int(11) NOT NULL,
  `Reqirment Num` varchar(50) DEFAULT NULL,
  `Jop Title` varchar(50) DEFAULT NULL,
  `Sector` varchar(50) DEFAULT NULL,
  `Plce Id` double DEFAULT NULL,
  `Place type` varchar(50) DEFAULT NULL,
  `Date of requist` date DEFAULT NULL,
  `emportance` varchar(50) DEFAULT NULL,
  `Statuse` varchar(50) DEFAULT NULL,
  `Expected date` varchar(50) DEFAULT NULL,
  `Actual Date` varchar(50) DEFAULT NULL,
  `spchialzation` varchar(50) DEFAULT NULL,
  `Group type` varchar(50) DEFAULT NULL,
  `Num of Avilable` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- بنية الجدول `ksearches`
--

CREATE TABLE IF NOT EXISTS `ksearches` (
`ID` int(11) NOT NULL,
  `NAME` mediumtext,
  `USERNAME` mediumtext,
  `COOKIE` varchar(500) DEFAULT NULL,
  `SEARCH` mediumtext,
  `TABLENAME` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- بنية الجدول `leave without pay`
--

CREATE TABLE IF NOT EXISTS `leave without pay` (
`ID` int(11) NOT NULL,
  `Emploayee` int(11) DEFAULT NULL,
  `Type of Leave` varchar(50) DEFAULT NULL,
  `Start Date` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `Statuse` varchar(50) DEFAULT NULL,
  `enddateinpartoftime` date DEFAULT NULL,
  `employeejob` int(11) DEFAULT NULL,
  `thepartitoon` int(11) DEFAULT NULL,
  `3amelvacation` varchar(50) DEFAULT NULL,
  `notes` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

-- --------------------------------------------------------

--
-- بنية الجدول `mstatus`
--

CREATE TABLE IF NOT EXISTS `mstatus` (
`MSTATUS_id` int(11) NOT NULL,
  `MSTATUS` varchar(50) DEFAULT NULL,
  `MSTATUS code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- بنية الجدول `out_code`
--

CREATE TABLE IF NOT EXISTS `out_code` (
`out_code_id` int(11) NOT NULL,
  `out_typr` varchar(50) DEFAULT NULL,
  `out_code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- بنية الجدول `penalty`
--

CREATE TABLE IF NOT EXISTS `penalty` (
`penalty_id` int(11) NOT NULL,
  `Emp` int(11) DEFAULT NULL,
  `num_of_days` int(11) DEFAULT NULL,
  `Reson` varchar(500) DEFAULT NULL,
  `Created_By` varchar(50) DEFAULT NULL,
  `Created_on` datetime DEFAULT NULL,
  `Work_place` varchar(11) DEFAULT NULL,
  `Why` mediumtext,
  `executaionDate` date DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- بنية الجدول `procedure`
--

CREATE TABLE IF NOT EXISTS `procedure` (
`procedure_ID` int(11) NOT NULL,
  `procedur Number` int(11) DEFAULT NULL,
  `Employee` int(11) DEFAULT NULL,
  `Type` varchar(100) DEFAULT NULL,
  `procedure Date` datetime DEFAULT NULL,
  `Reason` mediumtext,
  `procedure maker` varchar(50) DEFAULT NULL,
  `newjobdegree` varchar(100) DEFAULT NULL,
  `oldjobdegree` varchar(100) DEFAULT NULL,
  `typeoyem` varchar(50) DEFAULT NULL,
  `JopName` varchar(50) DEFAULT NULL,
  `Department` varchar(50) DEFAULT NULL,
  `newdepartment` varchar(50) DEFAULT NULL,
  `Workplace` varchar(50) DEFAULT NULL,
  `NewWorkPlace` varchar(50) DEFAULT NULL,
  `NewJobname` varchar(50) DEFAULT NULL,
  `emp state` varchar(50) DEFAULT NULL,
  `NewEmpstate` varchar(50) DEFAULT NULL,
  `ExistSatea` varchar(50) DEFAULT NULL,
  `ExitDate` date DEFAULT NULL,
  `Dataupdate` varchar(50) DEFAULT NULL,
  `Malritytype` varchar(50) DEFAULT NULL,
  `M_start_Date` date DEFAULT NULL,
  `D_end_date` date DEFAULT NULL,
  `govenment` varchar(50) DEFAULT NULL,
  `mandate_S_D` date DEFAULT NULL,
  `mandate_N_D` date DEFAULT NULL,
  `mandate_to` varchar(300) DEFAULT NULL,
  `new_work_place_in` varchar(50) DEFAULT NULL,
  `numberofyears` int(11) DEFAULT NULL,
  `execuationDate` date DEFAULT NULL,
  `oldservice` int(11) DEFAULT NULL,
  `newservices` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=184 ;

-- --------------------------------------------------------

--
-- بنية الجدول `remote areas`
--

CREATE TABLE IF NOT EXISTS `remote areas` (
`ID` int(11) NOT NULL,
  `Government` varchar(50) DEFAULT NULL,
  `Start Date` date DEFAULT NULL,
  `End Date` date DEFAULT NULL,
  `Employee` varchar(50) DEFAULT NULL,
  `Employee ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- بنية الجدول `scientific_degree`
--

CREATE TABLE IF NOT EXISTS `scientific_degree` (
`ID` int(11) NOT NULL,
  `Employee` int(11) DEFAULT NULL,
  `Degree` varchar(50) DEFAULT NULL,
  `Specialization` varchar(50) DEFAULT NULL,
  `Source` int(11) DEFAULT NULL,
  `date of degree` date DEFAULT NULL,
  `Out of Egypt` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- بنية الجدول `sector`
--

CREATE TABLE IF NOT EXISTS `sector` (
`ID` int(11) NOT NULL,
  `Sector` varchar(50) DEFAULT NULL,
  `Sector Code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- بنية الجدول `sevice- deprtments`
--

CREATE TABLE IF NOT EXISTS `sevice- deprtments` (
`Sevice_ID` int(11) NOT NULL,
  `F_SRV_NM` varchar(50) DEFAULT NULL,
  `F_SRV_CD` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=143 ;

-- --------------------------------------------------------

--
-- بنية الجدول `sintefic code`
--

CREATE TABLE IF NOT EXISTS `sintefic code` (
`sintefic code ID` int(11) NOT NULL,
  `sintefic Name` varchar(50) DEFAULT NULL,
  `sintefic code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

-- --------------------------------------------------------

--
-- بنية الجدول `specialization1`
--

CREATE TABLE IF NOT EXISTS `specialization1` (
`ID` int(11) NOT NULL,
  `specialization` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- بنية الجدول `state`
--

CREATE TABLE IF NOT EXISTS `state` (
`STATE id` int(11) NOT NULL,
  `STATE` varchar(50) DEFAULT NULL,
  `STATE code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- بنية الجدول `training`
--

CREATE TABLE IF NOT EXISTS `training` (
`Train_id` int(11) NOT NULL,
  `Train Name` varchar(150) DEFAULT NULL,
  `Train Place` varchar(200) DEFAULT NULL,
  `Train Type` varchar(100) DEFAULT NULL,
  `Train Start Date` date DEFAULT NULL,
  `Train End Date` date DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- بنية الجدول `traninig-connect`
--

CREATE TABLE IF NOT EXISTS `traninig-connect` (
`ID` int(11) NOT NULL,
  `Emp_ID` int(11) DEFAULT NULL,
  `Trainig_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- بنية الجدول `type group`
--

CREATE TABLE IF NOT EXISTS `type group` (
`Type Group ID` int(11) NOT NULL,
  `Type Group` varchar(50) DEFAULT NULL,
  `Type Group code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

-- --------------------------------------------------------

--
-- بنية الجدول `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
`ID` int(11) NOT NULL,
  `Unit` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- بنية الجدول `vacation`
--

CREATE TABLE IF NOT EXISTS `vacation` (
`vacation id` int(11) NOT NULL,
  `emp id` int(11) NOT NULL,
  `number of days` int(11) DEFAULT NULL,
  `new balance A` int(11) DEFAULT NULL,
  `balance A` int(11) DEFAULT NULL,
  `accepted or rejected` varchar(50) DEFAULT NULL,
  `type of vaction` varchar(50) NOT NULL,
  `new balance B` varchar(50) DEFAULT NULL,
  `balance B` int(11) DEFAULT NULL,
  `Balance A Now` int(11) DEFAULT NULL,
  `Balance B Now` int(11) DEFAULT NULL,
  `Start Date` date DEFAULT NULL,
  `End Date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `Vacation Year` varchar(4) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

-- --------------------------------------------------------

--
-- بنية الجدول `vacationwithfullpaied`
--

CREATE TABLE IF NOT EXISTS `vacationwithfullpaied` (
`ID` int(11) NOT NULL,
  `employee` int(11) NOT NULL,
  `startDateV` date DEFAULT NULL,
  `endDateV` date DEFAULT NULL,
  `numberofMonth` int(11) DEFAULT NULL,
  `TypeofVacation` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=74 ;

-- --------------------------------------------------------

--
-- بنية الجدول `vacation year update`
--

CREATE TABLE IF NOT EXISTS `vacation year update` (
`Year ID` int(11) NOT NULL,
  `Old Year` varchar(4) DEFAULT NULL,
  `New Year` varchar(4) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- بنية الجدول `vacation_balance_update`
--

CREATE TABLE IF NOT EXISTS `vacation_balance_update` (
`V_B_U_ID` int(11) NOT NULL,
  `Emplyee` int(11) DEFAULT NULL,
  `Old_Balance_A` int(11) DEFAULT NULL,
  `Old_Balance_B` int(11) DEFAULT NULL,
  `New_Balance_A` int(11) DEFAULT NULL,
  `New_Balance_B` int(11) DEFAULT NULL,
  `Created_By` varchar(50) DEFAULT NULL,
  `Created_Date` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- بنية الجدول `village`
--

CREATE TABLE IF NOT EXISTS `village` (
`Village_ID` int(11) NOT NULL,
  `Village Name` varchar(50) DEFAULT NULL,
  `City Name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- بنية الجدول `webreports`
--

CREATE TABLE IF NOT EXISTS `webreports` (
`rpt_id` int(11) NOT NULL,
  `rpt_name` varchar(100) NOT NULL,
  `rpt_title` varchar(200) DEFAULT NULL,
  `rpt_cdate` datetime NOT NULL,
  `rpt_mdate` datetime DEFAULT NULL,
  `rpt_content` mediumtext NOT NULL,
  `rpt_owner` varchar(100) NOT NULL,
  `rpt_status` varchar(10) NOT NULL DEFAULT 'public',
  `rpt_type` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- بنية الجدول `webreport_admin`
--

CREATE TABLE IF NOT EXISTS `webreport_admin` (
`id` int(11) NOT NULL,
  `tablename` varchar(300) DEFAULT NULL,
  `db_type` varchar(10) DEFAULT NULL,
  `group_name` varchar(300) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=602 ;

-- --------------------------------------------------------

--
-- بنية الجدول `webreport_sql`
--

CREATE TABLE IF NOT EXISTS `webreport_sql` (
`id` int(11) NOT NULL,
  `sqlname` varchar(100) DEFAULT NULL,
  `sqlcontent` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- بنية الجدول `webreport_style`
--

CREATE TABLE IF NOT EXISTS `webreport_style` (
`report_style_id` int(11) NOT NULL,
  `type` varchar(6) NOT NULL,
  `field` int(11) NOT NULL,
  `group` int(11) NOT NULL,
  `style_str` mediumtext NOT NULL,
  `uniq` int(11) DEFAULT NULL,
  `repname` varchar(255) NOT NULL,
  `styletype` varchar(40) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- بنية الجدول `work palce`
--

CREATE TABLE IF NOT EXISTS `work palce` (
`work_place_ID` int(11) NOT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Adress` varchar(50) DEFAULT NULL,
  `Map` varchar(500) DEFAULT NULL,
  `Lat1` decimal(20,10) DEFAULT NULL,
  `Lon1` decimal(20,10) DEFAULT NULL,
  `Number of Employe` varchar(50) DEFAULT NULL,
  `Working Hours` varchar(50) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `Fax` varchar(50) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `Vallage` varchar(50) DEFAULT NULL,
  `Code` varchar(50) DEFAULT NULL,
  `Start Year` varchar(50) DEFAULT NULL,
  `End Year` varchar(50) DEFAULT NULL,
  `DISTRCT` varchar(50) DEFAULT NULL,
  `connect code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=749 ;

-- --------------------------------------------------------

--
-- بنية الجدول `w_p_injectian`
--

CREATE TABLE IF NOT EXISTS `w_p_injectian` (
`id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `wp_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic source`
--
ALTER TABLE `academic source`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
 ADD PRIMARY KEY (`City_ID`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
 ADD PRIMARY KEY (`Doctors_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`Id`), ADD KEY `Name` (`Name`(255));

--
-- Indexes for table `employment status`
--
ALTER TABLE `employment status`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `financial class`
--
ALTER TABLE `financial class`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `gander`
--
ALTER TABLE `gander`
 ADD PRIMARY KEY (`Gander_ID`);

--
-- Indexes for table `governorate`
--
ALTER TABLE `governorate`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `groupe type`
--
ALTER TABLE `groupe type`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hrm2_audit`
--
ALTER TABLE `hrm2_audit`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hrm2_rightuggroups`
--
ALTER TABLE `hrm2_rightuggroups`
 ADD PRIMARY KEY (`GroupID`);

--
-- Indexes for table `hrm2_rightugmembers`
--
ALTER TABLE `hrm2_rightugmembers`
 ADD PRIMARY KEY (`GroupID`,`UserName`);

--
-- Indexes for table `hrm2_rightugrights`
--
ALTER TABLE `hrm2_rightugrights`
 ADD PRIMARY KEY (`TableName`(50),`GroupID`);

--
-- Indexes for table `hrm2_users`
--
ALTER TABLE `hrm2_users`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hrm17_searches`
--
ALTER TABLE `hrm17_searches`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `job title`
--
ALTER TABLE `job title`
 ADD PRIMARY KEY (`ID_jop`);

--
-- Indexes for table `jops requirment`
--
ALTER TABLE `jops requirment`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ksearches`
--
ALTER TABLE `ksearches`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `leave without pay`
--
ALTER TABLE `leave without pay`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `mstatus`
--
ALTER TABLE `mstatus`
 ADD PRIMARY KEY (`MSTATUS_id`);

--
-- Indexes for table `out_code`
--
ALTER TABLE `out_code`
 ADD PRIMARY KEY (`out_code_id`);

--
-- Indexes for table `penalty`
--
ALTER TABLE `penalty`
 ADD PRIMARY KEY (`penalty_id`);

--
-- Indexes for table `procedure`
--
ALTER TABLE `procedure`
 ADD PRIMARY KEY (`procedure_ID`);

--
-- Indexes for table `remote areas`
--
ALTER TABLE `remote areas`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `scientific_degree`
--
ALTER TABLE `scientific_degree`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sector`
--
ALTER TABLE `sector`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sevice- deprtments`
--
ALTER TABLE `sevice- deprtments`
 ADD PRIMARY KEY (`Sevice_ID`);

--
-- Indexes for table `sintefic code`
--
ALTER TABLE `sintefic code`
 ADD PRIMARY KEY (`sintefic code ID`);

--
-- Indexes for table `specialization1`
--
ALTER TABLE `specialization1`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
 ADD PRIMARY KEY (`STATE id`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
 ADD PRIMARY KEY (`Train_id`);

--
-- Indexes for table `traninig-connect`
--
ALTER TABLE `traninig-connect`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `type group`
--
ALTER TABLE `type group`
 ADD PRIMARY KEY (`Type Group ID`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vacation`
--
ALTER TABLE `vacation`
 ADD PRIMARY KEY (`vacation id`);

--
-- Indexes for table `vacationwithfullpaied`
--
ALTER TABLE `vacationwithfullpaied`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vacation year update`
--
ALTER TABLE `vacation year update`
 ADD PRIMARY KEY (`Year ID`);

--
-- Indexes for table `vacation_balance_update`
--
ALTER TABLE `vacation_balance_update`
 ADD PRIMARY KEY (`V_B_U_ID`);

--
-- Indexes for table `village`
--
ALTER TABLE `village`
 ADD PRIMARY KEY (`Village_ID`);

--
-- Indexes for table `webreports`
--
ALTER TABLE `webreports`
 ADD PRIMARY KEY (`rpt_id`);

--
-- Indexes for table `webreport_admin`
--
ALTER TABLE `webreport_admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webreport_sql`
--
ALTER TABLE `webreport_sql`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webreport_style`
--
ALTER TABLE `webreport_style`
 ADD PRIMARY KEY (`report_style_id`);

--
-- Indexes for table `work palce`
--
ALTER TABLE `work palce`
 ADD PRIMARY KEY (`work_place_ID`);

--
-- Indexes for table `w_p_injectian`
--
ALTER TABLE `w_p_injectian`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic source`
--
ALTER TABLE `academic source`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
MODIFY `City_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
MODIFY `Doctors_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8346;
--
-- AUTO_INCREMENT for table `employment status`
--
ALTER TABLE `employment status`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `financial class`
--
ALTER TABLE `financial class`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=272;
--
-- AUTO_INCREMENT for table `gander`
--
ALTER TABLE `gander`
MODIFY `Gander_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `governorate`
--
ALTER TABLE `governorate`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `groupe type`
--
ALTER TABLE `groupe type`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `hrm2_audit`
--
ALTER TABLE `hrm2_audit`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1051;
--
-- AUTO_INCREMENT for table `hrm2_rightuggroups`
--
ALTER TABLE `hrm2_rightuggroups`
MODIFY `GroupID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `hrm2_rightugmembers`
--
ALTER TABLE `hrm2_rightugmembers`
MODIFY `GroupID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `hrm2_users`
--
ALTER TABLE `hrm2_users`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hrm17_searches`
--
ALTER TABLE `hrm17_searches`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `job title`
--
ALTER TABLE `job title`
MODIFY `ID_jop` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=539;
--
-- AUTO_INCREMENT for table `jops requirment`
--
ALTER TABLE `jops requirment`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ksearches`
--
ALTER TABLE `ksearches`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `leave without pay`
--
ALTER TABLE `leave without pay`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `mstatus`
--
ALTER TABLE `mstatus`
MODIFY `MSTATUS_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `out_code`
--
ALTER TABLE `out_code`
MODIFY `out_code_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `penalty`
--
ALTER TABLE `penalty`
MODIFY `penalty_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `procedure`
--
ALTER TABLE `procedure`
MODIFY `procedure_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=184;
--
-- AUTO_INCREMENT for table `remote areas`
--
ALTER TABLE `remote areas`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `scientific_degree`
--
ALTER TABLE `scientific_degree`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sector`
--
ALTER TABLE `sector`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sevice- deprtments`
--
ALTER TABLE `sevice- deprtments`
MODIFY `Sevice_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=143;
--
-- AUTO_INCREMENT for table `sintefic code`
--
ALTER TABLE `sintefic code`
MODIFY `sintefic code ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `specialization1`
--
ALTER TABLE `specialization1`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
MODIFY `STATE id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
MODIFY `Train_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `traninig-connect`
--
ALTER TABLE `traninig-connect`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `type group`
--
ALTER TABLE `type group`
MODIFY `Type Group ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vacation`
--
ALTER TABLE `vacation`
MODIFY `vacation id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `vacationwithfullpaied`
--
ALTER TABLE `vacationwithfullpaied`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `vacation year update`
--
ALTER TABLE `vacation year update`
MODIFY `Year ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `vacation_balance_update`
--
ALTER TABLE `vacation_balance_update`
MODIFY `V_B_U_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `village`
--
ALTER TABLE `village`
MODIFY `Village_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `webreports`
--
ALTER TABLE `webreports`
MODIFY `rpt_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `webreport_admin`
--
ALTER TABLE `webreport_admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=602;
--
-- AUTO_INCREMENT for table `webreport_sql`
--
ALTER TABLE `webreport_sql`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `webreport_style`
--
ALTER TABLE `webreport_style`
MODIFY `report_style_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `work palce`
--
ALTER TABLE `work palce`
MODIFY `work_place_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=749;
--
-- AUTO_INCREMENT for table `w_p_injectian`
--
ALTER TABLE `w_p_injectian`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
