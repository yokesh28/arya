-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 29, 2013 at 01:42 PM
-- Server version: 5.5.24
-- PHP Version: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stellar`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `label` varchar(150) NOT NULL,
  `value` varchar(250) NOT NULL,
  `category` varchar(50) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `name`, `label`, `value`, `category`, `updated_by`, `updated_time`) VALUES
(1, 'ANALYTICS_GOOGLE', '', '', '', NULL, '2013-01-29 08:11:22');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(20) DEFAULT NULL,
  `message` text NOT NULL,
  `reference` varchar(100) DEFAULT NULL,
  `time` datetime NOT NULL,
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `daemon_jobs`
--

CREATE TABLE IF NOT EXISTS `daemon_jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_time` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('RUNNING','COMPLETED','ERROR') NOT NULL,
  `message` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `daemon_jobs`
--

INSERT INTO `daemon_jobs` (`id`, `type`, `start_time`, `end_time`, `status`, `message`) VALUES
(1, 'EMAIL', '2012-12-26 12:23:55', '2012-12-26 12:24:05', 'COMPLETED', '2 email(s) were processed.'),
(2, 'SMS', '2012-12-26 12:24:19', '2012-12-26 12:24:21', 'COMPLETED', '1 message(s) were processed.'),
(5, 'SMS', '2012-12-26 12:38:46', '2012-12-26 12:38:50', 'COMPLETED', '1 message(s) were processed.'),
(6, 'EMAIL', '2012-12-26 14:52:54', '2012-12-26 14:53:00', 'COMPLETED', '1 email(s) were processed.'),
(7, 'EMAIL', '2012-12-26 14:54:13', '2012-12-26 14:54:19', 'COMPLETED', '1 email(s) were processed.'),
(8, 'EMAIL', '2012-12-26 15:48:44', '2012-12-26 15:48:55', 'COMPLETED', '3 email(s) were processed.'),
(9, 'EMAIL', '2012-12-26 15:54:09', '2012-12-26 15:54:15', 'COMPLETED', '1 email(s) were processed.'),
(10, 'EMAIL', '2012-12-27 09:10:25', '2012-12-27 09:10:48', 'COMPLETED', '1 email(s) were processed.'),
(11, 'EMAIL', '2012-12-27 11:30:39', '2012-12-27 11:30:39', 'COMPLETED', '0 email(s) were processed.'),
(12, 'EMAIL', '2012-12-27 11:31:19', '2012-12-27 11:31:44', 'COMPLETED', '1 email(s) were processed.'),
(13, 'EMAIL', '2013-01-29 06:45:20', '2013-01-29 06:45:27', 'COMPLETED', '1 email(s) were processed.'),
(14, 'EMAIL', '2013-01-29 06:46:13', '2013-01-29 06:46:13', 'COMPLETED', '0 email(s) were processed.'),
(15, 'EMAIL', '2013-01-29 06:46:27', '2013-01-29 06:46:35', 'COMPLETED', '1 email(s) were processed.'),
(16, 'EMAIL', '2013-01-29 06:47:10', '2013-01-29 06:47:20', 'COMPLETED', '1 email(s) were processed.'),
(17, 'EMAIL', '2013-01-29 06:53:52', '2013-01-29 06:54:04', 'COMPLETED', '1 email(s) were processed.'),
(18, 'EMAIL', '2013-01-29 06:54:27', '0000-00-00 00:00:00', 'RUNNING', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email_queue`
--

CREATE TABLE IF NOT EXISTS `email_queue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_email` varchar(150) DEFAULT NULL,
  `from_name` varchar(150) DEFAULT NULL,
  `to` text NOT NULL,
  `cc` text,
  `bcc` text,
  `subject` varchar(300) NOT NULL,
  `body_html` text NOT NULL,
  `body_plain` text NOT NULL,
  `attempts` int(2) DEFAULT NULL,
  `sent` int(1) DEFAULT '0',
  `message` text,
  `created_by` int(11) DEFAULT NULL,
  `updated_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_time` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE IF NOT EXISTS `email_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `from_email` varchar(150) NOT NULL,
  `from_name` varchar(150) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `body_html` text NOT NULL,
  `body_plain` text NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_time` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `name`, `from_email`, `from_name`, `subject`, `body_html`, `body_plain`, `created_by`, `updated_time`, `created_time`, `updated_by`) VALUES
(1, 'CONTACT.RECEIVED', 'caffeineoverdose@stellarteam.in', 'Jason', 'New Contact - Ones and Zeros tech', '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\r\n\r\n<html xmlns="http://www.w3.org/1999/xhtml">\r\n\r\n<head>\r\n\r\n<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />\r\n\r\n<title>Ones and Zeros Technologies - New Contact Request</title>\r\n\r\n</head>\r\n\r\n<body\r\n	style="font-family: Arial, Helvetica, sans-serif; font-family: Arial, Helvetica, sans-serif; margin: 0; padding: 0;">\r\n\r\n	<table width="500" border="0" cellspacing="0" cellpadding="0"\r\n		style="border: #CCC 1px solid;" align="center">\r\n\r\n		<tr>\r\n\r\n			<td align="center" style="border-bottom: #CCC 1px solid;"><img\r\n				src="{logo_link}" width="270" height="83" /></td>\r\n\r\n		</tr>\r\n\r\n		<tr>\r\n\r\n			<td style="padding: 10px 60px 20px 60px; line-height: 20px;">\r\n\r\n				<table width="400" border="0" cellspacing="0" cellpadding="0">\r\n\r\n					<tr>\r\n\r\n						<td><h1\r\n								style="font-size: 20px; color: #a30d0d; font-weight: normal;">Contact\r\n								Received</h1>\r\n\r\n							<p style="font-size: 12px;">\r\n								Hi,<br /> Someone has requested for support through our website\r\n								- <a href="{website_url}">{website_url}</> \r\n							\r\n							</p></td>\r\n\r\n					</tr>\r\n\r\n					<tr>\r\n\r\n						<td><table width="380" border="0" cellspacing="0" cellpadding="0"\r\n								style="font-size: 12px; background-color: #efefef; padding: 15px;">\r\n								</td>\r\n\r\n								<tr>\r\n									<td colspan="2"\r\n										style="color: #a50d0d; font-size: 14px; padding-bottom: 5px;">Contact\r\n										Information</td>\r\n								</tr>\r\n								<tr>\r\n									<td>Name</td>\r\n									<td><b>{contact_name}</b></td>\r\n								</tr>\r\n								<tr>\r\n								<td>Email</td>\r\n								<td><b>{contact_email}</b></td>\r\n								</tr>\r\n								<tr>\r\n								<td>Number</td>\r\n								<td><b>{contact_number}</b></td>\r\n								</tr>\r\n								<tr>\r\n								<td>Message</td>\r\n								<td><b>{contact_message}</b></td>\r\n								</tr>\r\n								<tr>\r\n								<td>Time</td>\r\n								<td><b>{contact_time}</b></td>\r\n								</tr>\r\n								<tr>\r\n								<td>IP</td>\r\n								<td><b>{contact_ip}</b></td>\r\n								</tr>\r\n								<tr>\r\n								<td>Reference</td>\r\n								<td><b>{contact_reference}</b></td>\r\n								</tr>\r\n\r\n								<tr>\r\n									<td colspan="2"\r\n										style="color: #a50d0d; font-size: 16px; padding-bottom: 5px; text-align: center"><br />Can\r\n										someone handle this please ?</td>\r\n\r\n								</tr>\r\n\r\n							</table>\r\n						</td>\r\n\r\n					</tr>\r\n				</table>\r\n				<table width="400" border="0" cellspacing="0" cellpadding="0">\r\n\r\n					<tr>\r\n\r\n						<td><br />\r\n							<p style="font-size: 12px;">\r\n								<b>Will that be all, Sir ?</b>\r\n							</p>\r\n							<p style="font-size: 12px;">Jason Romeo</p></td>\r\n					</tr>\r\n				</table>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n			</td>\r\n\r\n		</tr>\r\n\r\n		<tr>\r\n\r\n			<td\r\n				style="background-color: #6DBBD8; padding: 5px 10px; color: #FFF; font-size: 12px;"><table\r\n					border="0" cellspacing="0" cellpadding="0" width="100%">\r\n\r\n					<tr>\r\n\r\n						<td></td>\r\n\r\n						<td align="right"><a href="{website_url}"\r\n							style="color: #FFF; text-decoration: none;">Website</a></td>\r\n\r\n					</tr>\r\n\r\n				</table>\r\n			</td>\r\n\r\n		</tr>\r\n\r\n	</table>\r\n\r\n</body>\r\n\r\n</html>\r\n', 'Hi,\r\nSomeone has requested for support through our website - {website_url}\r\n\r\nContact Information\r\nName	{contact_name}\r\nEmail	{contact_email}\r\nNumber	{contact_number}\r\nMessage	{contact_message}\r\nTime	{contact_time}\r\nIP	{contact_ip}\r\nReference	{contact_reference}\r\n\r\nCan someone handle this please ?\r\n\r\nWill that be all, Sir ?\r\nJason Romeo\r\n', NULL, '2012-12-26 11:44:45', '0000-00-00 00:00:00', NULL),
(2, 'APPLICATION.ERROR', 'caffeineoverdose@stellarteam.in', 'Jason', 'Error in Ones and Zeros tech website', '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\r\n\r\n<html xmlns="http://www.w3.org/1999/xhtml">\r\n\r\n<head>\r\n\r\n<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />\r\n\r\n<title>Ones and Zeros Technologies - An error occurred.</title>\r\n\r\n</head>\r\n\r\n<body\r\n	style="font-family: Arial, Helvetica, sans-serif; font-family: Arial, Helvetica, sans-serif; margin: 0; padding: 0;">\r\n\r\n	<table width="500" border="0" cellspacing="0" cellpadding="0"\r\n		style="border: #CCC 1px solid;" align="center">\r\n\r\n		<tr>\r\n\r\n			<td align="center" style="border-bottom: #CCC 1px solid;"><img\r\n				src="{logo_link}" width="270" height="83" /></td>\r\n\r\n		</tr>\r\n\r\n		<tr>\r\n\r\n			<td style="padding: 10px 60px 20px 60px; line-height: 20px;">\r\n\r\n				<table width="400" border="0" cellspacing="0" cellpadding="0">\r\n\r\n					<tr>\r\n\r\n						<td><h1\r\n								style="font-size: 20px; color: #a30d0d; font-weight: normal;">We goofed, master !</h1>\r\n\r\n							<p style="font-size: 12px;">\r\n								Hi,<br /> We had an error while processing a request in our website\r\n								- <a href="{website_url}">{website_url}</> \r\n							\r\n							</p></td>\r\n\r\n					</tr>\r\n\r\n					<tr>\r\n\r\n						<td><table width="380" border="0" cellspacing="0" cellpadding="0"\r\n								style="font-size: 12px; background-color: #efefef; padding: 15px;">\r\n								</td>\r\n\r\n								<tr>\r\n									<td colspan="2"\r\n										style="color: #a50d0d; font-size: 14px; padding-bottom: 5px;">Error \r\n										Information</td>\r\n								</tr>\r\n								<tr>\r\n									<td>Error Type</td>\r\n									<td><b>{error_type}</b></td>\r\n								</tr>\r\n								<tr>\r\n								<td>Error Message</td>\r\n								<td><b>{error_message}</b></td>\r\n								</tr>\r\n								<tr>\r\n								<td>File</td>\r\n								<td><b>{error_file}</b></td>\r\n								</tr>\r\n								<tr>\r\n								<td>Line</td>\r\n								<td><b>{error_line}</b></td>\r\n								</tr>\r\n								<tr>\r\n								<td>Trace</td>\r\n								<td><b>{error_trace}</b></td>\r\n								</tr>								<tr>\r\n									<td colspan="2"\r\n										style="color: #a50d0d; font-size: 16px; padding-bottom: 5px; text-align: center"><br />What do we do now ?</td>\r\n\r\n								</tr>\r\n\r\n							</table>\r\n						</td>\r\n\r\n					</tr>\r\n				</table>\r\n				<table width="400" border="0" cellspacing="0" cellpadding="0">\r\n\r\n					<tr>\r\n\r\n						<td><br />\r\n							<p style="font-size: 12px;">\r\n								<b>Beer and Coffee, Sir ?</b>\r\n							</p>\r\n							<p style="font-size: 12px;">Jason Romeo</p></td>\r\n					</tr>\r\n				</table>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n			</td>\r\n\r\n		</tr>\r\n\r\n		<tr>\r\n\r\n			<td\r\n				style="background-color: #6DBBD8; padding: 5px 10px; color: #FFF; font-size: 12px;"><table\r\n					border="0" cellspacing="0" cellpadding="0" width="100%">\r\n\r\n					<tr>\r\n\r\n						<td></td>\r\n\r\n						<td align="right"><a href="{website_url}"\r\n							style="color: #FFF; text-decoration: none;">Website</a></td>\r\n\r\n					</tr>\r\n\r\n				</table>\r\n			</td>\r\n\r\n		</tr>\r\n\r\n	</table>\r\n\r\n</body>\r\n\r\n</html>\r\n', 'Bad news.We had an error while processing a request in our website - {website_url} <br/>\r\n\r\nType - {error_type} <br/>\r\nMessage - {error_message} <br/>\r\nFile - {error_file} <br/>\r\nLine - {error_line} <br/>\r\nTrace - {error_trace} <br/>\r\n', NULL, '2012-12-26 15:53:22', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `category` varchar(50) NOT NULL,
  `priority` int(11) NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sms_providers`
--

CREATE TABLE IF NOT EXISTS `sms_providers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `sms_url` varchar(200) NOT NULL,
  `balance_url` varchar(200) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `api_password` varchar(50) DEFAULT NULL,
  `sender_id` varchar(50) NOT NULL,
  `pri` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sms_providers`
--

INSERT INTO `sms_providers` (`id`, `name`, `sms_url`, `balance_url`, `username`, `password`, `api_password`, `sender_id`, `pri`) VALUES
(1, 'alertbox.in', 'http://alertbox.in/pushsms.php?', 'http://alertbox.in/balancecheck.php?', ' alkarthick', 'jpibzzf162', '45c48wd7vqfop6tan', 'oandz', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sms_queue`
--

CREATE TABLE IF NOT EXISTS `sms_queue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(200) NOT NULL,
  `body` varchar(500) NOT NULL,
  `sent` int(1) DEFAULT '0',
  `attempts` int(2) DEFAULT '0',
  `message` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sms_templates`
--

CREATE TABLE IF NOT EXISTS `sms_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `body` varchar(500) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sms_templates`
--

INSERT INTO `sms_templates` (`id`, `name`, `body`, `created_time`) VALUES
(1, 'CONTACT.RECEIVED', 'Name {contact_name} \\n Email {contact_email} \\n Number {contact_number} \\n Message {contact_message} \\n Time {contact_time} \\n IP {contact_ip} \\n Reference {contact_reference} \\n', '2012-12-26 11:26:29');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;