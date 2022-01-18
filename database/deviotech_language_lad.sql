-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2021 at 05:32 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deviotech_language_lad`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_requests`
--

CREATE TABLE `booking_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tutor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_package_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hours` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `req_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `req_start_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `req_end_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `tutor_amount` double(8,2) NOT NULL DEFAULT 0.00,
  `channel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 For Pending , 1 For Accepted , 2 For Declined, 3 For Completed',
  `refund_status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 Default, 1 Requested, 2 Refunded',
  `cancel_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_reason` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_request` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 No Request, 1 Request Sent, 2 Request Accepted, 3 Request Declined',
  `cancel_requested_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_request` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 No Request, 1 Request Sent, 2 Request Accepted, 3 Request Declined',
  `time_requested_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_request_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_requests`
--

INSERT INTO `booking_requests` (`id`, `student_id`, `tutor_id`, `student_package_id`, `date`, `start_time`, `end_time`, `hours`, `req_date`, `req_start_time`, `req_end_time`, `amount`, `tutor_amount`, `channel`, `channel_type`, `note`, `status`, `refund_status`, `cancel_by`, `cancel_reason`, `cancel_request`, `cancel_requested_at`, `time_request`, `time_requested_at`, `time_request_by`, `created_at`, `updated_at`) VALUES
(38, 40, 42, 5, '2021-09-21 10:00:00', '10:00 AM', '11:30 AM', '2', NULL, NULL, NULL, 80, 0.00, NULL, NULL, NULL, '2', '1', 'LanguageLad', 'Teacher Did Not Respond To This Booking Request With in 24 Hours', '0', NULL, '0', NULL, NULL, '2021-09-13 02:38:11', '2021-10-26 04:06:54'),
(43, 40, 43, 9, '2021-09-27 10:00:00', '10:00 AM', '11:00 AM', '1.5', NULL, NULL, NULL, 10.5, 0.00, NULL, NULL, NULL, '2', '1', 'LanguageLad', 'Teacher Did Not Respond To This Booking Request With in 24 Hours', '0', NULL, '0', NULL, NULL, '2021-09-15 02:46:07', '2021-10-26 07:07:14'),
(44, 56, 43, 10, '2021-09-27 15:00:00', '3:00 PM', '3:30 PM', '1', NULL, NULL, NULL, 40.4, 0.00, NULL, NULL, NULL, '2', '2', 'Student', 'Test Reason For Cancellation By Student.', '0', NULL, '0', NULL, NULL, '2021-09-24 01:00:16', '2021-09-24 06:07:19'),
(45, 56, 43, 10, '2021-09-27 15:00:00', '3:00 PM', '3:30 PM', '1', NULL, NULL, NULL, 40.4, 0.00, 'TestSkypeID', 'Skype', 'Test note for accept request by Teacher.', '2', '2', 'Student', 'I am cancelling active booking by Student for testing purposes.', '0', NULL, '1', NULL, NULL, '2021-09-24 01:06:58', '2021-09-24 06:09:18'),
(46, 61, 58, 11, '2021-10-20 16:00:00', '4:00 PM', '5:30 PM', '2', NULL, NULL, NULL, 30, 0.00, 'Test Skype ID', 'Skype', 'Test Note Here. Test Note Here. Test Note Here. Test Note Here. Test Note Here. Test Note Here.', '3', '1', 'Student', 'lskjfsjdfljksd', '3', NULL, '0', NULL, NULL, '2021-10-14 07:50:25', '2021-10-26 00:53:35'),
(47, 61, 58, 11, '2021-10-18 13:00:00', '1:00 PM', '2:30 PM', '2', NULL, NULL, NULL, 30, 0.00, NULL, NULL, NULL, '2', '1', 'Student', 'Test Cancellation', '3', NULL, '0', NULL, NULL, '2021-10-14 23:15:00', '2021-10-18 06:24:05'),
(48, 62, 58, 12, '2021-10-18 13:00:00', '1:00 PM', '2:30 PM', '2', NULL, NULL, NULL, 30, 0.00, 'TestZoomLink', 'Zoom', 'Test Test Test Test Test Test Test', '2', '1', 'Teacher', NULL, '0', NULL, '0', NULL, NULL, '2021-10-18 07:51:18', '2021-10-18 08:19:51'),
(56, 68, 66, 20, '2021-11-08 06:00:00', '6:00 AM', '7:00 AM', '1.5', NULL, NULL, NULL, 20, 17.00, 'david.z', 'Skype', 'Porque, patatas', '1', '0', NULL, NULL, '0', NULL, '0', NULL, NULL, '2021-10-30 14:19:34', '2021-10-30 14:21:04'),
(57, 70, 66, 21, '2021-11-02 14:00:00', '2:00 PM', '3:00 PM', '1.5', NULL, NULL, NULL, 20, 17.00, 'david.z', 'Skype', 'fsfsfasf', '2', '1', 'Student', '.kjjffdtjyfiuokl;iuyt', '2', NULL, '0', NULL, NULL, '2021-11-01 21:36:34', '2021-11-01 21:44:32'),
(58, 70, 66, 21, '2021-11-03 17:00:00', '12:00 AM', '01:00 AM', '1.5', '2021-11-03 17:00:00', '12:00 AM', '01:00 AM', 20, 0.00, 'david.z', 'Skype', 'DDAFJÑLKAFJljñljflasd', '1', '0', NULL, NULL, '0', NULL, '2', NULL, NULL, '2021-11-01 21:46:28', '2021-11-01 21:49:26'),
(59, 70, 66, 21, '2021-11-02 15:00:00', '3:00 PM', '4:00 PM', '1.5', NULL, NULL, NULL, 20, 0.00, 'david.zoom', 'Skype', 'fdssdfasdf', '1', '0', NULL, NULL, '0', NULL, '0', NULL, NULL, '2021-11-01 21:58:03', '2021-11-01 21:58:30'),
(60, 68, 66, 20, '2021-11-08 08:00:00', '8:00 AM', '9:00 AM', '1.5', NULL, NULL, NULL, 20, 0.00, NULL, NULL, NULL, '0', '0', NULL, NULL, '0', NULL, '0', NULL, NULL, '2021-11-01 22:18:12', '2021-11-01 22:18:12'),
(61, 68, 66, 20, '2021-11-22 10:00:00', '10:00 AM', '11:00 AM', '1.5', NULL, NULL, NULL, 20, 0.00, NULL, NULL, NULL, '0', '0', NULL, NULL, '0', NULL, '0', NULL, NULL, '2021-11-01 22:30:25', '2021-11-01 22:30:25'),
(62, 68, 66, 20, '2021-11-01 20:00:00', '8:00 PM', '9:00 PM', '1.5', NULL, NULL, NULL, 20, 0.00, NULL, NULL, NULL, '0', '0', NULL, NULL, '0', NULL, '0', NULL, NULL, '2021-11-01 22:41:36', '2021-11-01 22:41:36'),
(66, 72, 64, 24, '2021-11-15 18:00:00', '6:00 PM', '7:00 PM', '1.5', '2021-11-22 11:00:00', '05:00 PM', '06:00 PM', 30, 27.00, NULL, NULL, NULL, '2', '1', 'LanguageLad', 'Student Did Not Respond To Booking Time Change Request By The Teacher With in 12 Hours.', '0', NULL, '1', '2021-11-01 09:06:08', NULL, '2021-11-04 00:52:38', '2021-11-04 01:09:40'),
(67, 63, 64, 25, '2021-11-22 06:00:00', '06:00 AM', '07:00 AM', '1.5', NULL, NULL, NULL, 30, 27.00, NULL, NULL, NULL, '0', '0', 'Student', 'Test cancel request', '1', NULL, '0', NULL, NULL, '2021-11-08 02:34:27', '2021-11-15 02:16:45'),
(68, 63, 75, 26, '2021-11-22 18:00:00', '06:00 PM', '07:00 PM', '1.5', '2021-11-22 11:00:00', '12:00 PM', '01:00 PM', 30, 27.00, 'testZoomLink', 'Zoom', 'Test Note Here. herererererlkklksjdsfj', '0', '1', 'Student', 'Test Cancel Request', '0', NULL, '1', '2021-11-17 07:54:37', NULL, '2021-11-15 00:25:11', '2021-11-17 02:54:37'),
(69, 72, 64, 24, '2021-11-22 01:00:00', '01:00 AM', '02:00 AM', '1.5', NULL, NULL, NULL, 30, 27.00, NULL, NULL, NULL, '0', '0', NULL, NULL, '0', NULL, '0', NULL, NULL, '2021-11-17 00:56:44', '2021-11-17 00:56:44'),
(70, 72, 64, 24, '2021-11-29 01:00:00', '01:00 AM', '02:00 AM', '1.5', NULL, NULL, NULL, 30, 27.00, NULL, NULL, NULL, '0', '0', NULL, NULL, '0', NULL, '0', NULL, NULL, '2021-11-17 02:26:58', '2021-11-17 02:26:58'),
(71, 72, 75, 27, '2021-11-29 03:00:00', '03:00 AM', '04:00 AM', '1.5', NULL, NULL, NULL, 30, 27.00, 'sdfsdf', 'Skype', 'dsfdsdf', '0', '0', NULL, NULL, '0', NULL, '0', NULL, NULL, '2021-11-17 02:58:05', '2021-11-17 02:58:54'),
(72, 78, 76, 28, '2021-12-06 15:00:00', '08:00 PM', '09:30 PM', '0', '2021-12-20 19:30:00', '07:30 PM', '09:00 PM', 20, 18.00, 'TestSkypeId2', 'Skype', 'Test note here.', '2', '2', NULL, NULL, '0', NULL, '3', '2021-11-18 09:55:29', 'Student', '2021-11-17 10:55:52', '2021-11-18 04:56:48'),
(73, 78, 76, 29, '2021-12-06 22:00:00', '10:00 PM', '11:00 PM', '0', '2021-12-06 19:00:00', '07:00 PM', '08:00 PM', 10, 9.00, NULL, NULL, NULL, '2', '2', NULL, NULL, '0', NULL, '3', '2021-11-18 07:05:26', 'Student', '2021-11-17 11:30:54', '2021-11-18 03:18:01'),
(74, 78, 76, 29, '2021-12-13 23:00:00', '11:00 PM', '12:00 AM', '0', '2021-12-13 23:00:00', '11:00 PM', '12:00 AM', 10, 9.00, 'TestSkypeId', 'Skype', 'Test note here. Test note here. Test note here. Test note here. Test note here. Test note here. Test note here. Test note here. Test note here. Test note here.', '1', '0', NULL, NULL, '0', NULL, '2', '2021-11-18 08:15:20', 'Student', '2021-11-17 11:34:16', '2021-11-18 04:50:07'),
(75, 78, 76, 30, '2021-11-22 22:30:00', '10:30 PM', '12:00 AM', '0', NULL, NULL, NULL, 20, 18.00, 'Test', 'Skype', 'Test', '0', '0', NULL, NULL, '0', NULL, '0', NULL, NULL, '2021-11-17 12:43:27', '2021-11-18 03:59:45'),
(76, 78, 76, 31, '2021-12-06 23:30:00', '11:30 PM', '12:00 AM', '0', NULL, NULL, NULL, 10, 9.00, NULL, NULL, NULL, '0', '0', NULL, NULL, '0', NULL, '0', NULL, NULL, '2021-11-17 13:17:06', '2021-11-17 13:17:06');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `code` varchar(2) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CD', 'Democratic Republic of the Congo'),
(50, 'CG', 'Republic of Congo'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'HR', 'Croatia (Hrvatska)'),
(54, 'CU', 'Cuba'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DK', 'Denmark'),
(58, 'DJ', 'Djibouti'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(61, 'TP', 'East Timor'),
(62, 'EC', 'Ecuador'),
(63, 'EG', 'Egypt'),
(64, 'SV', 'El Salvador'),
(65, 'GQ', 'Equatorial Guinea'),
(66, 'ER', 'Eritrea'),
(67, 'EE', 'Estonia'),
(68, 'ET', 'Ethiopia'),
(69, 'FK', 'Falkland Islands (Malvinas)'),
(70, 'FO', 'Faroe Islands'),
(71, 'FJ', 'Fiji'),
(72, 'FI', 'Finland'),
(73, 'FR', 'France'),
(74, 'FX', 'France, Metropolitan'),
(75, 'GF', 'French Guiana'),
(76, 'PF', 'French Polynesia'),
(77, 'TF', 'French Southern Territories'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GK', 'Guernsey'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'GN', 'Guinea'),
(92, 'GW', 'Guinea-Bissau'),
(93, 'GY', 'Guyana'),
(94, 'HT', 'Haiti'),
(95, 'HM', 'Heard and Mc Donald Islands'),
(96, 'HN', 'Honduras'),
(97, 'HK', 'Hong Kong'),
(98, 'HU', 'Hungary'),
(99, 'IS', 'Iceland'),
(100, 'IN', 'India'),
(101, 'IM', 'Isle of Man'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran (Islamic Republic of)'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'CI', 'Ivory Coast'),
(109, 'JE', 'Jersey'),
(110, 'JM', 'Jamaica'),
(111, 'JP', 'Japan'),
(112, 'JO', 'Jordan'),
(113, 'KZ', 'Kazakhstan'),
(114, 'KE', 'Kenya'),
(115, 'KI', 'Kiribati'),
(116, 'KP', 'Korea, Democratic People\'s Republic of'),
(117, 'KR', 'Korea, Republic of'),
(118, 'XK', 'Kosovo'),
(119, 'KW', 'Kuwait'),
(120, 'KG', 'Kyrgyzstan'),
(121, 'LA', 'Lao People\'s Democratic Republic'),
(122, 'LV', 'Latvia'),
(123, 'LB', 'Lebanon'),
(124, 'LS', 'Lesotho'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libyan Arab Jamahiriya'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lithuania'),
(129, 'LU', 'Luxembourg'),
(130, 'MO', 'Macau'),
(131, 'MK', 'North Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MW', 'Malawi'),
(134, 'MY', 'Malaysia'),
(135, 'MV', 'Maldives'),
(136, 'ML', 'Mali'),
(137, 'MT', 'Malta'),
(138, 'MH', 'Marshall Islands'),
(139, 'MQ', 'Martinique'),
(140, 'MR', 'Mauritania'),
(141, 'MU', 'Mauritius'),
(142, 'TY', 'Mayotte'),
(143, 'MX', 'Mexico'),
(144, 'FM', 'Micronesia, Federated States of'),
(145, 'MD', 'Moldova, Republic of'),
(146, 'MC', 'Monaco'),
(147, 'MN', 'Mongolia'),
(148, 'ME', 'Montenegro'),
(149, 'MS', 'Montserrat'),
(150, 'MA', 'Morocco'),
(151, 'MZ', 'Mozambique'),
(152, 'MM', 'Myanmar'),
(153, 'NA', 'Namibia'),
(154, 'NR', 'Nauru'),
(155, 'NP', 'Nepal'),
(156, 'NL', 'Netherlands'),
(157, 'AN', 'Netherlands Antilles'),
(158, 'NC', 'New Caledonia'),
(159, 'NZ', 'New Zealand'),
(160, 'NI', 'Nicaragua'),
(161, 'NE', 'Niger'),
(162, 'NG', 'Nigeria'),
(163, 'NU', 'Niue'),
(164, 'NF', 'Norfolk Island'),
(165, 'MP', 'Northern Mariana Islands'),
(166, 'NO', 'Norway'),
(167, 'OM', 'Oman'),
(168, 'PK', 'Pakistan'),
(169, 'PW', 'Palau'),
(170, 'PS', 'Palestine'),
(171, 'PA', 'Panama'),
(172, 'PG', 'Papua New Guinea'),
(173, 'PY', 'Paraguay'),
(174, 'PE', 'Peru'),
(175, 'PH', 'Philippines'),
(176, 'PN', 'Pitcairn'),
(177, 'PL', 'Poland'),
(178, 'PT', 'Portugal'),
(179, 'PR', 'Puerto Rico'),
(180, 'QA', 'Qatar'),
(181, 'RE', 'Reunion'),
(182, 'RO', 'Romania'),
(183, 'RU', 'Russian Federation'),
(184, 'RW', 'Rwanda'),
(185, 'KN', 'Saint Kitts and Nevis'),
(186, 'LC', 'Saint Lucia'),
(187, 'VC', 'Saint Vincent and the Grenadines'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'Sao Tome and Principe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SK', 'Slovakia'),
(198, 'SI', 'Slovenia'),
(199, 'SB', 'Solomon Islands'),
(200, 'SO', 'Somalia'),
(201, 'ZA', 'South Africa'),
(202, 'GS', 'South Georgia South Sandwich Islands'),
(203, 'SS', 'South Sudan'),
(204, 'ES', 'Spain'),
(205, 'LK', 'Sri Lanka'),
(206, 'SH', 'St. Helena'),
(207, 'PM', 'St. Pierre and Miquelon'),
(208, 'SD', 'Sudan'),
(209, 'SR', 'Suriname'),
(210, 'SJ', 'Svalbard and Jan Mayen Islands'),
(211, 'SZ', 'Swaziland'),
(212, 'SE', 'Sweden'),
(213, 'CH', 'Switzerland'),
(214, 'SY', 'Syrian Arab Republic'),
(215, 'TW', 'Taiwan'),
(216, 'TJ', 'Tajikistan'),
(217, 'TZ', 'Tanzania, United Republic of'),
(218, 'TH', 'Thailand'),
(219, 'TG', 'Togo'),
(220, 'TK', 'Tokelau'),
(221, 'TO', 'Tonga'),
(222, 'TT', 'Trinidad and Tobago'),
(223, 'TN', 'Tunisia'),
(224, 'TR', 'Turkey'),
(225, 'TM', 'Turkmenistan'),
(226, 'TC', 'Turks and Caicos Islands'),
(227, 'TV', 'Tuvalu'),
(228, 'UG', 'Uganda'),
(229, 'UA', 'Ukraine'),
(230, 'AE', 'United Arab Emirates'),
(231, 'GB', 'United Kingdom'),
(232, 'US', 'United States'),
(233, 'UM', 'United States minor outlying islands'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VU', 'Vanuatu'),
(237, 'VA', 'Vatican City State'),
(238, 'VE', 'Venezuela'),
(239, 'VN', 'Vietnam'),
(240, 'VG', 'Virgin Islands (British)'),
(241, 'VI', 'Virgin Islands (U.S.)'),
(242, 'WF', 'Wallis and Futuna Islands'),
(243, 'EH', 'Western Sahara'),
(244, 'YE', 'Yemen'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `iso` char(3) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`iso`, `name`) VALUES
('KRW', '(South) Korean Won'),
('AFA', 'Afghanistan Afghani'),
('ALL', 'Albanian Lek'),
('DZD', 'Algerian Dinar'),
('ADP', 'Andorran Peseta'),
('AOK', 'Angolan Kwanza'),
('ARS', 'Argentine Peso'),
('AMD', 'Armenian Dram'),
('AWG', 'Aruban Florin'),
('AUD', 'Australian Dollar'),
('BSD', 'Bahamian Dollar'),
('BHD', 'Bahraini Dinar'),
('BDT', 'Bangladeshi Taka'),
('BBD', 'Barbados Dollar'),
('BZD', 'Belize Dollar'),
('BMD', 'Bermudian Dollar'),
('BTN', 'Bhutan Ngultrum'),
('BOB', 'Bolivian Boliviano'),
('BWP', 'Botswanian Pula'),
('BRL', 'Brazilian Real'),
('GBP', 'British Pound'),
('BND', 'Brunei Dollar'),
('BGN', 'Bulgarian Lev'),
('BUK', 'Burma Kyat'),
('BIF', 'Burundi Franc'),
('CAD', 'Canadian Dollar'),
('CVE', 'Cape Verde Escudo'),
('KYD', 'Cayman Islands Dollar'),
('CLP', 'Chilean Peso'),
('CLF', 'Chilean Unidades de Fomento'),
('COP', 'Colombian Peso'),
('XOF', 'Communauté Financière Africaine BCEAO - Francs'),
('XAF', 'Communauté Financière Africaine BEAC, Francs'),
('KMF', 'Comoros Franc'),
('XPF', 'Comptoirs Français du Pacifique Francs'),
('CRC', 'Costa Rican Colon'),
('CUP', 'Cuban Peso'),
('CYP', 'Cyprus Pound'),
('CZK', 'Czech Republic Koruna'),
('DKK', 'Danish Krone'),
('YDD', 'Democratic Yemeni Dinar'),
('DOP', 'Dominican Peso'),
('XCD', 'East Caribbean Dollar'),
('TPE', 'East Timor Escudo'),
('ECS', 'Ecuador Sucre'),
('EGP', 'Egyptian Pound'),
('SVC', 'El Salvador Colon'),
('EEK', 'Estonian Kroon (EEK)'),
('ETB', 'Ethiopian Birr'),
('EUR', 'Euro'),
('FKP', 'Falkland Islands Pound'),
('FJD', 'Fiji Dollar'),
('GMD', 'Gambian Dalasi'),
('GHC', 'Ghanaian Cedi'),
('GIP', 'Gibraltar Pound'),
('XAU', 'Gold, Ounces'),
('GTQ', 'Guatemalan Quetzal'),
('GNF', 'Guinea Franc'),
('GWP', 'Guinea-Bissau Peso'),
('GYD', 'Guyanan Dollar'),
('HTG', 'Haitian Gourde'),
('HNL', 'Honduran Lempira'),
('HKD', 'Hong Kong Dollar'),
('HUF', 'Hungarian Forint'),
('INR', 'Indian Rupee'),
('IDR', 'Indonesian Rupiah'),
('XDR', 'International Monetary Fund (IMF) Special Drawing Rights'),
('IRR', 'Iranian Rial'),
('IQD', 'Iraqi Dinar'),
('IEP', 'Irish Punt'),
('ILS', 'Israeli Shekel'),
('JMD', 'Jamaican Dollar'),
('JPY', 'Japanese Yen'),
('JOD', 'Jordanian Dinar'),
('KHR', 'Kampuchean (Cambodian) Riel'),
('KES', 'Kenyan Schilling'),
('KWD', 'Kuwaiti Dinar'),
('LAK', 'Lao Kip'),
('LBP', 'Lebanese Pound'),
('LSL', 'Lesotho Loti'),
('LRD', 'Liberian Dollar'),
('LYD', 'Libyan Dinar'),
('MOP', 'Macau Pataca'),
('MGF', 'Malagasy Franc'),
('MWK', 'Malawi Kwacha'),
('MYR', 'Malaysian Ringgit'),
('MVR', 'Maldive Rufiyaa'),
('MTL', 'Maltese Lira'),
('MRO', 'Mauritanian Ouguiya'),
('MUR', 'Mauritius Rupee'),
('MXP', 'Mexican Peso'),
('MNT', 'Mongolian Tugrik'),
('MAD', 'Moroccan Dirham'),
('MZM', 'Mozambique Metical'),
('NAD', 'Namibian Dollar'),
('NPR', 'Nepalese Rupee'),
('ANG', 'Netherlands Antillian Guilder'),
('YUD', 'New Yugoslavia Dinar'),
('NZD', 'New Zealand Dollar'),
('NIO', 'Nicaraguan Cordoba'),
('NGN', 'Nigerian Naira'),
('KPW', 'North Korean Won'),
('NOK', 'Norwegian Kroner'),
('OMR', 'Omani Rial'),
('PKR', 'Pakistan Rupee'),
('XPD', 'Palladium Ounces'),
('PAB', 'Panamanian Balboa'),
('PGK', 'Papua New Guinea Kina'),
('PYG', 'Paraguay Guarani'),
('PEN', 'Peruvian Nuevo Sol'),
('PHP', 'Philippine Peso'),
('XPT', 'Platinum, Ounces'),
('PLN', 'Polish Zloty'),
('QAR', 'Qatari Rial'),
('RON', 'Romanian Leu'),
('RUB', 'Russian Ruble'),
('RWF', 'Rwanda Franc'),
('WST', 'Samoan Tala'),
('STD', 'Sao Tome and Principe Dobra'),
('SAR', 'Saudi Arabian Riyal'),
('SCR', 'Seychelles Rupee'),
('SLL', 'Sierra Leone Leone'),
('XAG', 'Silver, Ounces'),
('SGD', 'Singapore Dollar'),
('SKK', 'Slovak Koruna'),
('SBD', 'Solomon Islands Dollar'),
('SOS', 'Somali Schilling'),
('ZAR', 'South African Rand'),
('LKR', 'Sri Lanka Rupee'),
('SHP', 'St. Helena Pound'),
('SDP', 'Sudanese Pound'),
('SRG', 'Suriname Guilder'),
('SZL', 'Swaziland Lilangeni'),
('SEK', 'Swedish Krona'),
('CHF', 'Swiss Franc'),
('SYP', 'Syrian Potmd'),
('TWD', 'Taiwan Dollar'),
('TZS', 'Tanzanian Schilling'),
('THB', 'Thai Baht'),
('TOP', 'Tongan Paanga'),
('TTD', 'Trinidad and Tobago Dollar'),
('TND', 'Tunisian Dinar'),
('TRY', 'Turkish Lira'),
('UGX', 'Uganda Shilling'),
('AED', 'United Arab Emirates Dirham'),
('UYU', 'Uruguayan Peso'),
('USD', 'US Dollar'),
('VUV', 'Vanuatu Vatu'),
('VEF', 'Venezualan Bolivar'),
('VND', 'Vietnamese Dong'),
('YER', 'Yemeni Rial'),
('CNY', 'Yuan (Chinese) Renminbi'),
('ZRZ', 'Zaire Zaire'),
('ZMK', 'Zambian Kwacha'),
('ZWD', 'Zimbabwe Dollar');

-- --------------------------------------------------------

--
-- Table structure for table `day_slots`
--

CREATE TABLE `day_slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time_table_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tutor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `single_day` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_closed` tinyint(1) NOT NULL DEFAULT 0,
  `slot_type` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 All Day, 1 Specific Day, 2 Closed Day',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `day_slots`
--

INSERT INTO `day_slots` (`id`, `time_table_id`, `tutor_id`, `single_day`, `from`, `to`, `is_closed`, `slot_type`, `created_at`, `updated_at`) VALUES
(60, 58, 42, NULL, '9:00 AM', '12:30 PM', 0, '0', '2021-09-13 02:37:15', '2021-09-13 02:37:15'),
(61, 94, 43, NULL, '9:00 AM', '5:00 PM', 0, '0', '2021-09-13 05:08:28', '2021-09-13 05:08:28'),
(62, 65, 43, NULL, '9:00 AM', '1:15 PM', 0, '0', '2021-09-13 11:56:31', '2021-09-13 11:56:31'),
(63, 65, 43, NULL, '2:00 PM', '4:40 PM', 0, '0', '2021-09-13 11:56:31', '2021-09-13 11:56:31'),
(65, 67, 43, NULL, '5:00 AM', '12:00 PM', 0, '0', '2021-09-13 11:58:19', '2021-09-13 11:58:19'),
(66, 67, 43, NULL, '2:00 PM', '4:00 PM', 0, '0', '2021-09-13 11:58:19', '2021-09-13 11:58:19'),
(77, 97, 58, NULL, '10:00 AM', '2:00 PM', 0, '0', '2021-10-14 00:33:07', '2021-10-14 00:33:07'),
(78, 97, 58, NULL, '4:00 PM', '6:00 PM', 0, '0', '2021-10-14 00:33:07', '2021-10-14 00:33:07'),
(87, 100, 66, NULL, '10:00 AM', '2:00 PM', 0, '0', '2021-10-30 15:54:14', '2021-10-30 15:54:14'),
(88, 100, 66, NULL, '4:00 PM', '6:00 PM', 0, '0', '2021-10-30 15:54:14', '2021-10-30 15:54:14'),
(91, 103, 66, NULL, '5:00 PM', '8:00 PM', 0, '0', '2021-10-30 16:00:28', '2021-10-30 16:00:28'),
(96, 101, 66, NULL, '10:00 AM', '2:00 PM', 0, '0', '2021-11-01 23:51:51', '2021-11-01 23:51:51'),
(97, 101, 66, NULL, '4:00 PM', '6:00 PM', 0, '0', '2021-11-01 23:51:51', '2021-11-01 23:51:51'),
(134, 106, 64, NULL, '5:00 AM', '2:00 PM', 0, '0', '2021-11-08 03:29:50', '2021-11-08 03:29:50'),
(135, 106, 64, NULL, '4:00 PM', '7:00 PM', 0, '0', '2021-11-08 03:29:50', '2021-11-08 03:29:50'),
(136, 107, 75, NULL, '10:00 AM', '2:00 PM', 0, '0', '2021-11-15 00:24:07', '2021-11-15 00:24:07'),
(137, 107, 75, NULL, '4:00 PM', '7:00 PM', 0, '0', '2021-11-15 00:24:07', '2021-11-15 00:24:07'),
(147, 108, 76, NULL, '2:00 PM', '4:00 PM', 0, '0', '2021-11-17 13:13:39', '2021-11-17 13:13:39'),
(148, 108, 76, NULL, '5:00 PM', '7:00 PM', 0, '0', '2021-11-17 13:13:39', '2021-11-17 13:13:39'),
(149, 109, 76, NULL, '10:30 AM', '2:00 PM', 0, '0', '2021-11-25 05:13:16', '2021-11-25 05:13:16'),
(151, 111, 76, NULL, '10:00 AM', '2:00 PM', 0, '0', '2021-11-25 05:16:16', '2021-11-25 05:16:16'),
(152, 112, 76, NULL, '12:00 AM', '11:59 PM', 0, '0', '2021-11-26 12:45:11', '2021-11-26 12:45:11'),
(153, 110, 76, NULL, '12:00 AM', '11:59 PM', 0, '0', '2021-11-29 12:34:22', '2021-11-29 12:34:22');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 Student, 2 Teacher',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `type`, `created_at`, `updated_at`) VALUES
(1, 'What are the requirements to be accepted as a teacher?', '<p class=\"text\">To be a teacher at Languagelad, you need to fulfill the following requirements:</p>\r\n									        	<ul class=\"list-unstyled\">\r\n									        		<li class=\"text\">18+ years of age</li>\r\n									        		<li class=\"text\">Teaching Certificate (e.g. PGCE, DELTA, ELE, CELTA, TEFL etc.)</li>\r\n									        		<li class=\"text\">1-to-3-minute introductory video</li>\r\n									        		<li class=\"text\">CV</li>\r\n									        		<li class=\"text\">Native or C1 in your language(s) of instruction</li>\r\n									        	</ul>', '2', '2021-10-05 00:55:53', '2021-10-05 00:57:02'),
(2, 'How are the lessons taught?', '<p>Lessons are taught one-on-one via Skype or Zoom. This allows our tutors to provide a personalized and interactive learning experience that is virtually identical to in-person instruction.</p>', '2', '2021-10-05 01:01:46', '2021-10-05 01:01:46'),
(3, 'How long are lessons?', '<p>Each lesson is 55 minutes long. This will allow you to take a 5-minute break between consecutive lessons.</p>', '2', '2021-10-05 01:02:24', '2021-10-05 01:02:24'),
(4, 'How are lessons organized?', '<p>We utilize a simple and intuitive booking software that allows students to book lessons easily. Students can also receive reminders by email. In addition, you can add your lessons directly to your Google’s digital calendar. Tutors can easily adjust their availability and view details about their students.</p>\r\n\r\n												<p>We provide support to help students and tutors with any problems</p>', '2', '2021-10-05 01:02:52', '2021-10-05 01:02:52'),
(5, 'What is the rescheduling and cancellation policy?', '<p>Students can reschedule or cancel classes up to 24 hours before the start time. We enforce this policy to protect tutors and ensure that they keep their working hours to a minimum.</p>\r\n\r\n												<p>The system we use at Languagelad does not allow for the cancellation of bookings after 24 hours, but tutors sometimes allow their students to make changes after this time, for example, if a student has fallen ill or something unexpected has happened.</p>\r\n\r\n												<p>If something unexpected has happened in your life that will force you to miss classes for a few days, close your reservation calendar and write to your students to advise them of the situation.</p>', '2', '2021-10-05 01:03:17', '2021-10-05 01:03:17'),
(6, 'How will I get students?', '<p>People who are interested in learning with Languagelad usually sign up for a trial session before booking new lessons. This trial lasts 30 minutes and gives the student a chance to get to know you and your teaching methods.</p>\r\n\r\n                                                <p>An enthusiastic, fun, and interesting tutor will always have a better chance of getting new students.</p>', '2', '2021-10-05 01:03:50', '2021-10-05 01:03:50'),
(7, 'How will my lesson fees be set?', '<p>At Languagelad, there is a maximum and a minimum for the price of your classes. Within those limits, you are free to set any price you want. </p>\r\n                                                <p>You can do this from your teacher profile</p>', '2', '2021-10-05 01:04:26', '2021-10-05 01:04:26'),
(8, 'How much can I expect to earn by teaching with Languagelad?', '<p>It depends on many factors, including your availability, language skills, and performance. Some tutors earn more than $1,600 USD per month.</p>', '2', '2021-10-05 01:04:49', '2021-10-05 01:04:49'),
(9, 'How will I be paid?', '<p>Credits can be withdrawn from Languagelad at the end of each month. You will have to request the withdrawal through your personal wallet and the credits will be sent to your selected payment service.</p>\r\n\r\n												<p>When you withdraw your credits from Languagelad, a third party providing the corresponding payment method may charge you additional fees. These fees are not under the control of Languagelad and Languagelad disclaims all liability in this regard. Whichever payment method you use may be subject to additional terms and conditions, which we recommend that you review before selecting a payment method.</p>\r\n\r\n												<p>Remember that Languagelad charges a commission. <span class=\"text-success font-weight-bold\">The commission is 15% of the total sum you are going to withdraw.</span></p>', '2', '2021-10-05 01:05:14', '2021-10-05 01:05:14'),
(10, 'What sort of relationship will I have with Languagelad?', '<p>As with other online platforms, if you work with Languagelad, you will be a freelance worker and not an employee or partner. This means that you will be responsible for managing your own taxes, work documents, etc. However, you will be free to teach however you want and set your own hours. </p>\r\n\r\n                                                <p>Please note that we do not offer advice on how to handle self-employment matters, as we do not have sufficient knowledge of how it works in each country.</p>', '2', '2021-10-05 01:05:42', '2021-10-05 01:05:42'),
(11, 'What expectations are placed on tutors and how will my performance be evaluated?', '<p>\r\n										      		We hope you strive to offer the best lessons that you are capable of providing. This means adapting to the needs of your students and using different methods to make the lessons as enjoyable and effective as possible.\r\n										      	</p>\r\n										      	<p>\r\n										      		We also hope you stay organized. This includes:\r\n										      	</p>\r\n										        <ul>\r\n										        	<li>Regularly updating your availability calendar so students can book lessons seamlessly.</li>\r\n										        	<li>Attending your classes on time. Attitudes toward punctuality vary across cultures, but students won\'t be happy if you\'re consistently five minutes late.</li>\r\n										        </ul>\r\n										        <p>\r\n										        	We reserve the right to suspend tutors from working through our site at any time. For example, if we receive multiple complaints from students, Languagelad\'s reputation will be jeopardized and we will have to end the relationship.\r\n										        </p>', '2', '2021-10-05 01:06:09', '2021-10-05 01:06:09'),
(12, 'When will I hear from Languagelad?', '<p>\r\n										      		For all applicants, the Languagelad application process consists of these steps:\r\n										      	</p>\r\n										        <ol>\r\n										        	<li>Presentation of the application (through this link).</li>\r\n										        	<li>Review of the application.</li>\r\n										        	<li>Notification by email within 10 business days of pre-acceptance or rejection.</li>\r\n										        	<li>After being pre-approved, you will be asked for proof of identity (mail your ID).</li>\r\n										        	<li>Acceptance of your application and activation of your profile on Languagelad</li>\r\n										        </ol>', '2', '2021-10-05 01:08:11', '2021-10-05 01:08:11'),
(13, 'Can I decide which students I accept and which I don\'t?', '<p>Of course. Just as students can choose other tutors, you, as a tutor, can also reject specific students.</p>', '2', '2021-10-05 01:08:41', '2021-10-05 01:08:41'),
(14, 'Can you tell me more about the classes?', '<p>\r\n									        		At Languagelad, you are able to study one-on-one with a personal tutor in all classes. We guarantee that you will receive quality care from our instructors. The lessons last 55 minutes and will be provided via Skype or Zoom, which will allow you to communicate with your tutor and share materials that will be useful for your classes. Although Skype and Zoom are the programs of choice, you will be able to arrange the use of other programs if you and your tutor so decide.\r\n									        	</p>\r\n									        	<p>\r\n									        		You may opt to have three (3) trial lessons. These cheaper-than-normal lessons will allow your tutor to assess your level, discuss your goals, and tailor the lessons to your individual needs.\r\n									        	</p>\r\n									        	<p>\r\n									        		In your classes, you will be able to improve your speaking, grammar, and listening skills. In the more specialized one-on-one classes, you can learn to communicate at work and pass official exams. Whatever your motivation and goals, we advise you to book a trial lesson and see if online lessons are the best option for you. We are sure you will enjoy them!\r\n									        	</p>', '1', '2021-10-05 01:09:56', '2021-10-05 01:09:56'),
(15, 'Who are these lessons suitable for?', '<p>Most of the tutors on our website can teach students of any level and students with all kinds of needs (work, travel, integration, etc.) That being said, certain tutors are not suitable for beginners or students who need help passing a specific exam. In addition, not all tutors can teach children and teenagers. Before choosing a tutor, you should check their profile to make sure they are right for you.</p>', '1', '2021-10-05 01:10:22', '2021-10-05 01:10:22'),
(16, 'When can I take my lessons?', '<p>For one-on-one lessons, you control the pace at which you learn and the timing of your lessons. Just be sure to choose a tutor with a schedule that suits your needs. Of course, you can also change your tutor whenever you want. Although, if you have found a tutor that fits your needs, we do not advise you to switch.</p>', '1', '2021-10-05 01:10:51', '2021-10-05 01:10:51'),
(17, 'How long does a lesson last?', '<p>One-on-one lessons are 55 minutes long. This duration is best for maintaining a good level of concentration and short enough for even our busiest students.</p>', '1', '2021-10-05 01:11:22', '2021-10-05 01:11:22'),
(18, 'Why Skype or Zoom?', '<p>Skype and Zoom are free programs that allow for easy communication between tutors and students. These programs allow you to do everything you need to do to have a complete class: write, speak, read, listen, and share materials.</p>', '1', '2021-10-05 01:11:52', '2021-10-05 01:11:52'),
(19, 'Do the classes use video or just audio?', '<p>All our teachers use both. We think that communicating using both audio and video simultaneously is much simpler and more useful to you. However, if you prefer to use audio only and your tutor agrees, this is acceptable as well.</p>', '1', '2021-10-05 01:12:41', '2021-10-05 01:12:41'),
(20, 'Do I need to buy materials for my class?', '<p>No, your tutor will share any materials you need online.</p>', '1', '2021-10-05 01:13:06', '2021-10-05 01:13:06'),
(21, 'How much can I expect to earn by teaching with Languagelad? What do I need for my class?', '<p>For your lessons, all you need is the following:</p>\r\n												<ol>\r\n													<li>A good internet connection. We recommend a cable connection, as it will be much stronger than a Wi-Fi connection.</li>\r\n													<li>A Skype or Zoom account. If you don\'t already have an account, it\'s easy and free to create one</li>\r\n													<li>A computer, tablet, or telephone. Most people find that their device\'s speakers and microphone are enough.</li>\r\n													<li>Remember, you won\'t have to buy any books!</li>\r\n												</ol>', '1', '2021-10-05 01:13:29', '2021-10-05 01:13:29'),
(22, 'Are the lessons suitable for teenagers?', '<p>Teenagers sometimes learn with a tutor to support their academic studies. Often, the student shares his/her school materials with their tutor and the lessons follow these materials or cover related topics. If you are a parent, please review the tutor profiles carefully as only some of them are suitable for students under 18 years old. We always require parental permission. Also, be sure to provide your child\'s age and describe their needs when booking a trial session.</p>', '1', '2021-10-05 01:13:55', '2021-10-05 01:13:55'),
(23, 'I have been studying a language for some time, how will the tutor assess my current level?', '<p>Your tutor will assess your language level and discuss your specific learning goals during the test session. He/she will then customize your lessons based on this. </p>', '1', '2021-10-05 01:14:21', '2021-10-05 01:14:21'),
(24, 'How do lessons work for companies and other organizations?', '<p>\r\n										      		Organizations often use our site to help their employees improve their language skills. Online classes are ideal for busy employees, as they can learn from their home or office at times that best suit them. Lessons can be customized to focus on work or business-related language learning.\r\n										      	</p>', '1', '2021-10-05 01:14:48', '2021-10-05 01:14:48'),
(25, 'Could you tell me more about the trial classes?', '<p>\r\n										      		During the 30-minute trial sessions, you will be able to practice the language you want to learn and get an idea of what it would be like to learn through one-on-one online lessons. Your tutor will assess your level and try to understand your needs and interests. This will allow you to personalize the lessons you decide to take. You will be encouraged to speak in the language you want to learn as much as possible, but if you do not think your level is good enough, check your teacher\'s profile to see if you can follow the class in the language you are learning.\r\n										      	</p>', '1', '2021-10-05 01:15:14', '2021-10-05 01:15:14'),
(26, 'How do I book a trial lesson?', '<p>Booking trial lessons works the same as booking regular classes. If a tutor activates trial lessons, you will be able to see the costs in his/her profile. Choose a test class, as well as a date and time, and complete your booking. Remember, you can only book three trial classes with three different tutors.</p>', '1', '2021-10-05 01:15:41', '2021-10-05 01:15:41'),
(27, 'Do I need to do anything after my trial session is scheduled?', '<p>No. After you have booked your trial, all you need to do is find your tutor on Skype or Zoom. </p>\r\n                                                <p>If you do not have Skype, you can download it and create an account very easily through this link. Zoom can be found at this link.</p>', '1', '2021-10-05 01:16:12', '2021-10-05 01:16:12'),
(28, 'How much do classes cost and where can I buy them?', '<p>\r\n									        		Each tutor chooses the price and type of class offered. If you want to see this information, just go to your tutor’s profile. When you find what you are looking for, you will only have to book the date and time. From there, simply follow the prompts for the payment process.\r\n									        	</p>\r\n									        	<p>\r\n									        		You can buy credits and save them in your wallet from your profile.\r\n									        	</p>', '1', '2021-10-05 01:16:38', '2021-10-05 01:16:38'),
(29, 'How can I pay?', '<p>Languagelad will never return the money converted into credits.</p>\r\n										        <p>\r\n										        	If you cannot complete your classes within this period for an understandable reason, \r\n													you can request an extension from your tutor. If he/she agrees, the expiration period \r\n													will be extended by one month.\r\n										        </p>\r\n										        <p>\r\n										        	f you decide to cancel your class package, the credit for any lessons you have not \r\n													received will be returned to your user wallet (minus the discount that was made for the \r\n													purchase of the package, if any).\r\n										        </p>\r\n										        <p>\r\n										        	When the period of your class package expires, the credits of the classes that have not \r\n													been reserved, will go to the teacher\'s portfolio automatically.\r\n										        </p>\r\n										        <p>\r\n										        	Languagelad will never return the money converted into credits.\r\n										        </p>', '1', '2021-10-05 01:17:06', '2021-10-05 01:17:06'),
(30, 'Do I have to complete my lessons within a certain period?', '<p>We understand that sometimes things get in the way of learning a language. This is why we give you a full six months to use your lesson credits. Be sure to use them within the first six months of purchasing your lessons.</p>\r\n\r\n										        <p>If you cannot complete your classes within this period for an understandable reason, you can request an extension from your tutor. If he/she agrees, the expiration period will be extended by one month.</p>\r\n\r\n										        <p>If you decide to cancel your class package, the credit for any lessons you have not received will be returned to your user wallet (minus the discount that was made for the purchase of the package, if any).</p>\r\n\r\n										        <p>When the period of your class package expires, the credits of the classes that have not been reserved, will go to the teacher\'s portfolio automatically.</p>\r\n\r\n										        <p>Languagelad will never return the money converted into credits.</p>', '1', '2021-10-05 01:17:33', '2021-10-05 01:17:33'),
(31, 'Why can\'t I reschedule or cancel my lesson?', '<p>\r\n										        	You can reschedule or cancel a lesson up to 24 hours before it starts. If rescheduling \r\n													was allowed less than 24 hours before a lesson begins, it would be unfair to the tutors \r\n													as it would prevent them from teaching and earning a living. The 24-hour policy is \r\n													highlighted in many places on the website and in our emails.\r\n										        </p>', '1', '2021-10-05 01:18:02', '2021-10-05 01:18:02'),
(32, 'What happens if I don\'t show up for a lesson?', '<p>\r\n										        	If you book a lesson, but do not show up, your tutor will lose time when he/she could \r\n													have been teaching someone else. Therefore, you still need to be pay for that lesson. \r\n													Unfortunately, if you miss your lesson, you will lose credit for it. If you think you will be \r\n													unable to attend a lesson, you can reschedule it up to 24 hours in advance through \r\n													your tutor’s booking calendar.\r\n\r\n										        </p>', '1', '2021-10-05 01:18:40', '2021-10-05 01:18:40'),
(33, 'What is your refund policy?', '<p>\r\n										        	If you decide to cancel your class package, the credits for any lessons you have not \r\n													received will be returned to your user wallet (less the discount that was made for the \r\n													purchase of the package, if any).\r\n										        </p>', '1', '2021-10-05 01:19:04', '2021-10-05 01:19:04'),
(34, 'Can you tell me more about the tutors?', '<p>\r\n									        		We have a rigorous selection process to maintain high standards that will make you feel comfortable, even if you are a beginner. You can view the tutors\' profiles (including videos) when you book a session.\r\n									        	</p>\r\n									        	<p>\r\n									        		If you still have any questions regarding the tutors, please do not hesitate to contact us. We will be happy to help you.\r\n									        	</p>', '1', '2021-10-05 01:19:28', '2021-10-05 01:19:28'),
(35, 'Will my lessons always be with the same tutor?', '<p>\r\n										        	We recommend continuing with the same tutor because this helps develop a long-term relationship. Your tutor can get to know you better, including your interests and what you need to improve. That said, you can change your tutor if you wish (see the next question for more information on this process). \r\n										        </p>\r\n										        <p>\r\n										        	Also, very occasionally, students may need to change to a new tutor due to the availability of their current tutor.\r\n										        </p>', '1', '2021-10-05 01:19:54', '2021-10-05 01:19:54'),
(36, 'Can I change my tutor?', '<p>Although we don\'t usually recommend changing your tutor, sometimes doing so can help refresh things. Some students have classes with two or three different tutors. If you would like to book a new tutor, you can do so directly. You will need to make sure that you contact your tutor by Skype or Zoom using the identification they have given you. If you do not do so, the tutor may not be able to contact you and you may lose your class credit.</p>', '1', '2021-10-05 01:20:27', '2021-10-05 01:20:27'),
(37, 'Where can I find information about working as a tutor?', '<p>You can find all the information <span class=\"text-success\">here.</span></p>', '1', '2021-10-05 01:21:01', '2021-10-05 01:21:01');

-- --------------------------------------------------------

--
-- Table structure for table `integrations`
--

CREATE TABLE `integrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refresh_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires` datetime NOT NULL,
  `additional` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'English', '2021-09-03 08:08:45', '2021-09-03 08:08:45'),
(3, 'French', '2021-09-03 08:08:56', '2021-09-03 08:08:56'),
(4, 'Spanish', '2021-09-03 08:09:10', '2021-09-03 08:09:10'),
(5, 'Urdu', '2021-09-03 08:09:23', '2021-09-03 08:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_10_110215_create_tutor_profiles_table', 1),
(5, '2021_06_14_062515_create_student_profiles_table', 1),
(6, '2021_06_28_111505_create_student_speaks_table', 1),
(7, '2021_06_28_122409_create_tutor_speaks_table', 1),
(8, '2021_06_28_131101_create_tutor_lessons_table', 1),
(9, '2021_06_28_132613_create_tutor_lesson_packages_table', 1),
(10, '2021_06_29_053440_create_tutor_certificates_table', 1),
(11, '2021_06_29_093431_alter_tutor_profiles_for_description', 2),
(12, '2020_05_10_000000_create_integrations_table', 3),
(13, '2021_06_14_094859_alter_tutor_profiles_for_video_and_profile_description', 3),
(14, '2021_06_14_131855_alter_users_table_for_username_field', 4),
(15, '2021_06_30_062607_alter_student_profiles_for_nullable_fields', 4),
(16, '2021_06_30_105839_alter_tutor_lesson_packages_table_for_nullable_fields', 4),
(17, '2021_07_01_052345_alter_tutor_lesson_packages_table', 4),
(18, '2021_07_06_053926_alter_users_table_for_calendar_id', 4),
(19, '2021_07_06_063932_create_time_tables_table', 5),
(22, '2021_07_06_104246_alter_tutor_profiles_table_for_is_free_trial', 6),
(23, '2021_07_07_123135_alter_tutor_profiles_to_make_fields_nullable', 7),
(24, '2021_07_08_123452_create_booking_requests_table', 7),
(25, '2021_07_08_124600_create_transactions_table', 7),
(26, '2021_07_08_124712_create_tutor_reviews_table', 7),
(27, '2021_07_08_124943_create_tutoring_sessions_table', 7),
(28, '2021_07_12_104624_alter_transactions_table_for_tutor_and_student_id', 8),
(29, '2021_07_13_050628_alter_booking_requests_table_for_status', 9),
(30, '2021_07_14_100428_alter_tutor_profiles_table_for_default_zero_step', 9),
(31, '2021_07_26_073120_alter_transactions_table_for_admin_amount', 9),
(32, '2021_08_02_055340_create_settings_table', 10),
(33, '2021_08_02_075624_alter_tutor_profiles_for_modify_is_approved_column', 11),
(34, '2021_08_03_071738_alter_transactions_table_for_is_refund_column', 11),
(35, '2021_08_09_071508_alter_users_table_for_time_zone_column', 12),
(37, '2021_08_10_041521_alter_booking_requests_table_for_start_and_end_time', 13),
(38, '2021_08_11_042015_create_trial_classes_table', 14),
(39, '2021_08_13_054138_create_stripe_transfers_table', 15),
(40, '2021_08_13_054727_alter_tutor_profiles_table_for_stripe_account', 16),
(41, '2021_08_13_055422_alter_transactions_table_for_payout_status', 17),
(48, '2021_08_17_104621_alter_booking_requests_table_for_channel_and_note', 18),
(49, '2021_08_23_080937_alter_trial_classes_table_for_day_and_time_slots', 18),
(50, '2021_08_23_092606_alter_trial_classes_table_for_drop_status_column', 19),
(51, '2021_08_23_110615_alter_trial_classes_table_for_channel_and_note', 20),
(52, '2021_08_24_044920_alter_time_tables_for_drop_from_and_to', 21),
(53, '2021_08_24_045250_create_day_slots_table', 22),
(54, '2021_08_24_065215_create_tutor_education_table', 23),
(55, '2021_08_24_065224_create_tutor_experiences_table', 23),
(56, '2021_08_25_041131_create_testimonials_table', 24),
(58, '2021_08_28_084743_alter_tutor_reviews_for_trial_class_id_column', 25),
(59, '2021_08_28_101128_alter_tutor_lesson_packages_table_for_package_number', 26),
(61, '2021_08_30_044204_alter_transactions_table_for_payment_method_column', 27),
(62, '2021_08_30_111138_alter_transactions_table_for_nullable_stripe_charge_id', 28),
(63, '2021_09_03_124348_create_languages_table', 28),
(64, '2021_09_03_124406_create_tags_table', 28),
(65, '2021_09_06_052607_alter_day_slots_table_for_status_column', 29),
(66, '2021_09_06_075445_alter_time_tables_table_for_status_column', 30),
(67, '2021_09_07_063740_alter_tutor_lesson_packages_table_for_package_number_string', 31),
(68, '2021_09_07_072259_alter_booking_requests_table_for_channel_name_column', 31),
(69, '2021_09_07_090737_alter_student_profiles_table_for_wallet_amount', 32),
(70, '2021_09_07_094618_alter_booking_requests_table_for_refund_payment_column', 33),
(71, '2021_09_07_164729_alter_transactions_table_for_trial_class_id', 34),
(73, '2021_09_07_180553_alter_trial_classes_table_for_refund_status_column', 35),
(74, '2021_09_07_190019_alter_transactions_table_payment_method_wallet', 36),
(75, '2021_09_07_193651_alter_trial_classes_table_for_channel_type_column', 37),
(76, '2021_09_08_062036_alter_day_slots_table_for_slot_type', 38),
(77, '2021_09_08_064451_create_student_packages_table', 39),
(80, '2021_09_08_070046_alter_booking_requests_table_for_student_package_id', 40),
(81, '2021_09_08_075906_alter_student_packages_table_for_status_column', 41),
(82, '2021_09_13_104817_alter_booking_requests_table_for_cancellation_reason', 42),
(83, '2021_09_13_185606_alter_trial_classes_table_for_cancel_by_and_cancel_reason', 43),
(84, '2021_09_22_055101_drop_tutoring_sessions_table', 44),
(87, '2021_10_04_081459_create_faqs_table', 45),
(89, '2021_10_14_051456_alter_booking_requests_table_for_cancel_confirmation', 46),
(90, '2021_10_14_051929_alter_trial_classes_table_for_cancel_confirmation', 46),
(91, '2021_10_25_094410_alter_booking_requests_table_for_request_of_teacher_time_table', 47),
(92, '2021_10_25_094535_alter_trial_classes_table_for_req_date_and_time', 47),
(93, '2021_10_28_050353_alter_booking_requests_table_for_admin_amount', 48),
(94, '2021_11_04_044403_alter_booking_requests_table_for_time_requested_date', 49),
(95, '2021_11_04_044449_alter_trial_classes_table_for_time_requested_date', 49),
(96, '2021_11_15_110821_alter_booking_requests_table_for_class_cancel_requested_at', 50),
(97, '2021_11_15_110847_alter_trial_classes_table_for_class_cancel_requested_at', 50),
(98, '2021_11_18_065249_alter_booking_requests_table_for_time_request_by', 51),
(99, '2021_11_18_065325_alter_trial_classes_table_for_time_request_by', 51);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('deviotech@andrew.com', '$2y$10$1xauLgRLwr7TeqFBcM5qleGAlzpf55NxQMRDGYhrOXqECAFSw0kMK', '2021-07-07 23:49:53'),
('deviotech@jorge.com', '$2y$10$szTDCxeXP6/6pcMOd1OH4u0k7cdPO0LJbOD7G8o2KBGgRvh9GFDfa', '2021-07-15 05:23:34'),
('teststudent2@gmail.com', '$2y$10$ARQSbNzbF2xlo2P/9Bb0EOPhrPxqh6ioyzW3FlhezFbnXw7gFuQya', '2021-09-29 04:32:36'),
('teststudent1@gmail.com', '$2y$10$Rwl8pMNA0Jen3KsW6dDcWe64qNQEu9li0NX6fu6E.dhwvQ5YZUJOq', '2021-09-30 01:05:24'),
('testuser61@gmail.com', '$2y$10$Si.OXC7xRgwQwv0LCri3Hu4PzpE2nNx1flBUsKrVy2bIVOmuR1EvC', '2021-10-24 23:50:09');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'admin_commission', '10', '2021-08-02 00:59:20', '2021-11-01 21:56:13'),
(2, 'terms', '<p>\r\n                    Welcome to languagelad.com, the website and online service for Languagelad Online OCU (hereinafter: \"Languagelad\", \"we\", or \"us\"). On this page, you will find the terms by which you may use our online services, software, and website, provided on or in connection with our service (the \"Service\"). By accessing or using the Service, you indicate that you have read, understood, and agree to be bound by these Terms and Conditions (\"Terms\") and agree to the collection and use of your information as set out in our Privacy Policy, whether or not you are a registered user of our service. This Agreement applies to all visitors, users, and other persons accessing the Service (\"Users\", \"Tutors\", \"Students\", or \"You\").\r\n                </p>\r\n                <p>\r\n                    We may make changes to these Terms from time to time. When we do, we will revise the \"last updated\" date shown above. It is your responsibility to review these Terms frequently and remain informed of any changes to them. The current version of these Terms will supersede all previous versions.\r\n                </p>\r\n                <p>\r\n                    We assume that you accept these terms and conditions in their entirety and any changes that have been posted. Please do not continue to use the Languagelad website if you do not accept all the terms and conditions set out on this page. If any clause or part of this Agreement is deemed invalid by any court or arbitrator, this does not mean that the entire Agreement is deemed invalid.\r\n                </p>\r\n                <ul class=\"list-unstyled\">\r\n                    <li>Languagelad\'s Legal Manager</li>\r\n                    <li>Headline: ¿?</li>\r\n                    <li>NIF/CIF: ¿?</li>\r\n                    <li>Address: ¿?</li>\r\n                    <li>Email: contact@languagelad.com</li>\r\n                </ul>\r\n                <p class=\"font-weight-bold\">Content</p>\r\n                <ol>\r\n                    <li>Provision of Service</li>\r\n                    <li>Payment and Refunds</li>\r\n                    <li>Reservation and Dispute Resolution Policies</li>\r\n                    <li>Managing Your Information</li>\r\n                    <li>Technical Requirements</li>\r\n                    <li>Test Class</li>\r\n                    <li>Specific Terms for Teachers</li>\r\n                    <li>Control of Law and Jurisdiction</li>\r\n                    <li>Arbitration</li>\r\n                    <li>Limitation of Liability</li>\r\n                    <li>Compensation</li>\r\n                    <li>Intellectual Property Rights</li>\r\n                    <li>Links</li>\r\n                    <li>Notices</li>\r\n                </ol>\r\n                <p class=\"font-weight-bold\">1. Provision of the Service.</p>\r\n                <p>\r\n                    Who can use the Service: You can use the Service only if you can form a binding contract with Languagelad that is in compliance with these Terms and all applicable local, state, national, and international laws, rules, and regulations. Any use of or access to the Service by any person under the age of 13 is strictly prohibited and constitutes a violation of these Terms. Users between the ages of 13 and 18 must obtain written permission from a parent or legal guardian. Your right to use our Services is personal to you and cannot be transferred by you to any other person or entity. Languagelad reserves the right to terminate your use of the Service, for example, if you demonstrate abusive or inappropriate behavior towards another User.\r\n                </p>\r\n                <p>\r\n                    Languagelad provides an online language learning environment, in which users (both students and tutors) can collaborate with each other and take advantage of the services (collectively, the \"Services\"). The Services provided are as follows:\r\n                </p>\r\n                <p>\r\n                    <span class=\"font-weight-bold\">Connection Services.</span> By being accepted on the Site, Languagelad allows Tutors to advertise their services to Students. Students can browse the Tutors\' profiles and hire Tutors for language learning. Students and Tutors can coordinate lesson bookings through our software. Through these connection services, Languagelad only provides the venue for Students and Tutors to meet and engage with one another.\r\n                </p>\r\n                <p>\r\n                    <span class=\"font-weight-bold\">Paid Services.</span> Languagelad provides paid services to users. Students can purchase lesson credits, which they can then apply to the booking system to schedule lessons with tutors. Languagelad can receive payment for the lessons they teach. Languagelad offers to send earnings made from the lessons to the tutors once at the end of each month. Languagelad also provides assistance in cases of disputes between Students and Tutors. Paid Services do not refer to Connection Services.\r\n                </p>\r\n                <p>\r\n                    THE SITE AND SERVICES ARE INTENDED TO BE USED TO FACILITATE THE CONNECTION OF TUTORS AND STUDENTS, WHILE THE BOOKING OF LESSONS IS HANDLED DIRECTLY BY THESE PARTIES. LANGUAGELAD IS ONLY RESPONSIBLE FOR PROVIDING THE ABOVE-MENTIONED CONNECTION AND PAYMENT SERVICES. LANGUAGELAD IS NOT RESPONSIBLE FOR THE METHODS, MATERIALS, ONLINE DELIVERY TOOLS, AND OTHER ASPECTS RELATED TO THE LESSONS/SERVICES OF TEACHING. LANGUAGELAD IS NOT RESPONSIBLE FOR AND DISCLAIMS ALL LIABILITY IN CONNECTION WITH ANY AND ALL LESSONS. ACCORDINGLY, ANY PAID SERVICES WILL BE MADE OR ACCEPTED AT YOUR OWN RISK. LANGUAGELAD HAS NO CONTROL OVER THE CONDUCT OF ITS USERS AND DISCLAIMS ALL LIABILITY IN THIS REGARD TO THE FULLEST EXTENT PERMITTED BY LAW. LANGUAGELAD HAS NO CONTROL OVER AND DOES NOT GUARANTEE THE QUALITY, AVAILABILITY, SAFETY, OR LEGALITY OF THE ADVERTISED TEACHING SERVICES, NOR THE TRUTH OR ACCURACY OF THE LISTINGS, QUALIFICATIONS, BACKGROUND, SKILLS, OR ABILITY OF TUTORS TO PROVIDE TEACHING SERVICES, NOR THE ABILITY OF STUDENTS TO PAY FOR TEACHING SERVICES.\r\n\r\n                </p>\r\n                <p class=\"font-weight-bold\">2. Payment and Refunds.</p>\r\n                <p>\r\n                    Students can purchase class credits in US dollars. As stated on the website, class credits are valid for 6 months from the day of purchase. Class credits can be applied in the booking system for the purpose of scheduling classes. All prices quoted exclude any additional charges, such as fees, taxes, or interest charged by the student\'s bank or credit card company. These charges are the sole responsibility of the Student. The prices indicated also do not include any costs associated with the Internet connection.\r\n                    Authorized payments are final. No refunds will be given for Languagelad Credits purchased.\r\n                </p>\r\n                <p class=\"font-weight-bold\">3. Reservation and Dispute Resolution Policies.</p>\r\n                <p>\r\n                    A lesson can be canceled or rescheduled by the student if there are at least 24 hours left to start. The student must reschedule/cancel the lesson through the reservation system. When there are less than 24 hours left until the start of the lesson, the student is NOT entitled to cancel or reschedule the lesson and will lose the lesson credit. This policy exists for the protection of the teacher\'s working conditions. Tutors may make exceptions if they wish, but are not required to do so.\r\n                </p>\r\n                <p>\r\n                    If a student loses their lesson, they will not be able to reschedule or cancel it and will lose the lesson credit. Lessons scheduled during local holidays will not be automatically canceled. It is the responsibility of the Student to make any necessary changes to his/her bookings.\r\n                </p>\r\n                <p>\r\n                    If there is a dispute between the student and the tutor, Languagelad will gather all available communication records to determine how to resolve the dispute. Languagelad will have the right to transfer credits or reverse a transaction.\r\n                </p>\r\n                <p>\r\n                    Languagelad will also have the right to designate who will bear the costs resulting from such actions.\r\n                </p>\r\n                <p class=\"font-weight-bold\">4. Managing Your Information.</p>\r\n                <p>\r\n                    It is the sole responsibility of each user to ensure that all personal information (e.g. contact details, payment details) is up to date and accurate at all times. By accepting these Terms, you release Languagelad from any claims, demands, and damages (actual and consequential) of every kind and nature, known and unknown, suspected and unsuspected, disclosed and undisclosed, arising out of inaccurate personal information held on the site or provided to Languagelad staff. You are also responsible for safeguarding your account password. You agree that you will not disclose your password to any third party and that you are solely responsible for any activities or actions under your Languagelad account, whether or not you have authorized such activities or actions. You will immediately notify Languagelad’s support team of any unauthorized use of your account or of any lesson credits.\r\n                </p>\r\n                <p class=\"font-weight-bold\">5. Technical Requirements.</p>\r\n                <p>\r\n                    The student is responsible for ensuring that he/she has (1) a sufficiently fast and reliable Internet connection and (2) the necessary software and hardware for learning through Languagelad. This includes a Skype or Zoom account and the necessary audio equipment. If a lesson is interrupted or cannot proceed as a result of technical problems on the part of the Student, the Tutor has the right to charge for the lesson. If the Tutor has technical problems, the lesson must be canceled in the system so that the Student\'s credit is not used.\r\n                </p>\r\n                <p class=\"font-weight-bold\">6. Trial Classes.</p>\r\n                <p>\r\n                    New students are allowed to take three \"Trial Classes\". These classes will only be available to new students and are limited to three sessions per Student. The trial classes will be 30 minutes long. After taking these sessions, the Student can decide, without obligation or commitment to make a purchase, whether to proceed with the purchase of lesson credits.\r\n                </p>\r\n                <p class=\"font-weight-bold\">7. Specific Terms for Tutors.</p>\r\n                <p>\r\n                    If you are accepted as a Tutor on the platform, your User status will be changed to \"Tutor\". Languagelad has no right to control how you teach or how you manage your schedule. You will be able to display your profile and create an introductory video for students to watch. You will provide the information you want to be displayed on your profile, which will then be added to the site. You have the right to make changes to your profile at any time (although the profile must be accurate and still conform to our standard profile format). You agree to:\r\n                    <ul>\r\n                        <li>Ensure that the information provided is accurate and not misleading.</li>\r\n                        <li>Maintain student privacy and do not request any personally-identifiable information.</li>\r\n                        <li>Not use content that violates copyright.</li>\r\n                    </ul>\r\n                </p>\r\n                <p>\r\n                    We reserve the right to suspend tutors from working through languagelad.com at any time.\r\n                </p>\r\n                <p>\r\n                    With regard to data privacy:\r\n                </p>\r\n                <p>\r\n                    Your personal data will not be shared with third parties. You will be given access to data that will allow you to contact your students and provide a service that suits your needs. This data may include: the student\'s name, email address, motivation for learning, Skype ID, telephone number, estimated language level, and country of residence. You agree to use this data only for the purposes of teaching the students and not to share it with third parties. This data may occasionally be shared with you by Languagelad via email. If a student contacts you to ask about this data or request you to delete it, you should promptly inform Languagelad so that action can be taken.\r\n                </p>\r\n                <p>\r\n                    IF YOU CHOOSE TO TEACH THROUGH LANGUAGELAD.COM, YOU UNDERSTAND AND AGREE THAT YOUR RELATIONSHIP WITH LANGUAGELAD IS LIMITED TO BEING AN INDEPENDENT, THIRD-PARTY CONTRACTOR, AND NOT AN EMPLOYEE, AGENT, JOINT VENTURE, OR PARTNER OF LANGUAGELAD FOR ANY REASON, AND THAT YOU ARE ACTING SOLELY ON YOUR OWN BEHALF AND FOR YOUR OWN BENEFIT, AND NOT ON BEHALF OF OR FOR THE BENEFIT OF LANGUAGELAD. YOU AGREE NOT TO DO ANYTHING TO CREATE A FALSE IMPRESSION THAT YOU ARE ENDORSED BY, ASSOCIATED WITH, OR ACTING ON BEHALF OF OR FOR THE BENEFIT OF LANGUAGELAD, INCLUDING THE IMPROPER USE OF ANY LANGUAGELAD INTELLECTUAL PROPERTY.\r\n                </p>\r\n                <p>\r\n                    As an independent contractor, you understand that you are solely responsible for determining the applicable tax reporting requirements and tax-related obligations applicable to your services. You are also solely responsible for submitting these taxes to the relevant authorities. Languagelad cannot and does not provide tax-related advice to Users.\r\n                </p>\r\n                <p class=\"font-weight-bold\">8. Control of Law and Jurisdiction.</p>\r\n                <p>\r\n                    These Terms are governed in all respects by the laws of Estonia. However, some countries (including those in the European Union) have laws that require agreements to be governed by the local laws of the consumer\'s country. This paragraph does not override those laws. You agree that any claim or dispute you may have against Languagelad must be resolved by a court located in Estonia or as described in the Arbitration Terms below. You hereby submit to the personal jurisdiction of the courts located in Estonia for the purpose of litigating all such claims or disputes. Any cause of action you may have with respect to this Site must be commenced within 30 days after its occurrence or the cause of action will be barred.\r\n                </p>\r\n                <p  class=\"font-weight-bold\">9. Arbitration.</p>\r\n                <p>\r\n                    We want to address any issues you have without the need for a formal legal case. Before you file a claim against Languagelad, you agree to try to resolve the dispute informally by contacting support@languagelad.com. We will try to resolve the dispute informally by contacting you by email. If a dispute is not resolved within 15 days of its submission, you or Languagelad may initiate formal proceedings\r\n                </p>\r\n                <p>\r\n                    <span>Court Dispute Forum.</span> You and Languagelad agree that any legal proceedings to settle claims relating to these Terms or the Services shall be instituted in the courts of Estonia, subject to the mandatory arbitration provisions set out below. Both you and Languagelad consent to the personal jurisdiction and venue of such courts. If you reside in a country (e.g. member states of the European Union) with laws that give consumers the right to sue in their local courts, this paragraph does not affect those requirements.\r\n                </p>\r\n                <p>\r\n                    IF YOU ARE A RESIDENT OF THE UNITED STATES, YOU ALSO ACCEPT THE FOLLOWING BINDING ARBITRATION PROVISIONS:\r\n                </p>\r\n                <p>\r\n                    <span class=\"font-weight-bold\">We both agree to arbitration.</span> You and Languagelad agree to resolve any claims relating to these Terms or the Services by final and binding arbitration by a single arbitrator, except as set out in the Exceptions to the Arbitration Agreement below. This includes disputes arising out of or relating to the interpretation or application of this section of the \"Binding Arbitration Provisions\", including its applicability, revocability, or validity.\r\n                </p>\r\n                <p>\r\n                    <span class=\"font-weight-bold\">Exceptions to the Arbitration Agreement.</span> You may reject this arbitration agreement by confirming this via email to support@languagelad.com within 30 days of your first use of our Services.\r\n                </p>\r\n                <p>\r\n                    <span class=\"font-weight-bold\">Exceptions to the Arbitration Agreement.</span> Either party may bring a claim only as a temporary measure to stop the unauthorized use or abuse of the Services or the infringement of intellectual property without first engaging in arbitration or the informal dispute resolution process described above. If it is determined that the arbitration agreement does not apply to you or your claim, you agree to the exclusive jurisdiction of the Estonian courts to resolve your claim.\r\n                </p>\r\n                <p>\r\n                    THERE ARE NO CLASS ACTIONS. You may only resolve disputes with us on an individual basis and you may not bring a claim as a claimant or member of a class in a class, consolidated, or representative action. Collective arbitration, class actions, general actions of private attorneys or consolidation with other arbitrations are not allowed. If this specific paragraph is deemed inapplicable, then this entire section of \"Mandatory Arbitration Provisions\" shall be deemed void.\r\n                </p>\r\n                <p class=\"font-weight-bold\">10. Limitation of Liability.</p>\r\n                <p>\r\n                    TO THE MAXIMUM EXTENT PERMITTED BY APPLICABLE LAW, IN NO EVENT SHALL LANGUAGELAD, ITS AGENTS, DIRECTORS, EMPLOYEES, SUPPLIERS, OR LICENSORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, CONSEQUENTIAL, OR EXEMPLARY DAMAGES, INCLUDING, BUT NOT LIMITED TO, DAMAGES FOR LOSS OF PROFITS, GOODWILL, USE, DATA, OR OTHER INTANGIBLE LOSSES (EVEN IF WE HAVE BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES) RESULTING FROM THE USE OF OUR SERVICES AND SERVICE CONTENT. UNDER NO CIRCUMSTANCES WILL LANGUAGELAD BE LIABLE FOR ANY DAMAGE, LOSS, OR INJURY RESULTING FROM HACKING, TAMPERING, OR OTHER UNAUTHORISED ACCESS OR USE OF THE SERVICE OR YOUR ACCOUNT OR THE INFORMATION CONTAINED THEREIN.\r\n                </p>\r\n                <p>\r\n                    TO THE MAXIMUM EXTENT PERMITTED BY APPLICABLE LAW, LANGUAGELAD ASSUMES NO RESPONSIBILITY OR LIABILITY FOR: (I) ANY ERRORS, MISTAKES OR INACCURACIES IN THE CONTENT, (II) PERSONAL INJURY OR PROPERTY DAMAGE OF ANY NATURE WHATSOEVER RESULTING FROM YOUR ACCESS TO OR USE OF OUR SERVICE, (III) ANY UNAUTHORISED ACCESS TO OR USE OF OUR SECURE SERVERS AND/OR ANY AND ALL PERSONAL INFORMATION STORED THEREIN, (IV) ANY INTERRUPTION OR CESSATION OF TRANSMISSION TO OR FROM THE SERVICE, (V) ANY BUGS, VIRUSES, TROJAN HORSES, OR THE LIKE, WHICH MAY BE TRANSMITTED TO OR THROUGH OUR SERVICE BY ANY THIRD PARTY, (VI) ANY ERRORS OR OMISSIONS IN ANY CONTENT OR FOR ANY LOSS OR DAMAGE INCURRED AS A RESULT OF THE USE OF ANY CONTENT POSTED, EMAILED, TRANSMITTED, OR OTHERWISE AVAILABLE THROUGH THE SERVICE, AND/OR (VII) USER CONTENT OR THE DEFAMATORY, OFFENSIVE, OR ILLEGAL CONDUCT OF ANY THIRD PARTY. IN NO EVENT SHALL THE TOTAL LIABILITY OF US AND OUR SUPPLIERS AND LICENSORS OF ANY KIND ARISE OUT OF OR IN CONNECTION WITH YOUR USE OF THE SERVICES AND THE CONTENT OF THE SERVICE (INCLUDING, WITHOUT LIMITATION, WARRANTY CLAIMS), REGARDLESS OF THE FORUM AND WHETHER ANY ACTION OR CLAIM IS BASED ON CONTRACT, TORT, OR OTHERWISE, EXCEED THE AMOUNTS, IF ANY, PAID BY YOU TO US FOR THE USE OF THE SERVICES AND THE CONTENT OF THE SERVICE. SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OR LIMITATION OF INCIDENTAL OR CONSEQUENTIAL DAMAGES, SO THIS LIMITATION AND EXCLUSION MAY NOT APPLY TO YOU.\r\n                </p>\r\n                <p class=\"font-weight-bold\">\r\n                    11. Compensation.\r\n                </p>\r\n                <p>\r\n                    You agree to indemnify, defend, and hold Languagelad harmless from any liability, claim, cost, or damage arising out of your use of languagelad.com or your breach of this Agreement and any of the Terms set out herein.\r\n                </p>\r\n                <p class=\"font-weight-bold\">12. Intellectual Property Rights.</p>\r\n                <p>\r\n                    All Languagelad materials, including the content of the website, articles, images, audio, and video files are at all times the exclusive property of Languagelad. Such materials are protected by international copyright, trademark, and other intellectual property laws. No material protected by copyright, trademarks, or other proprietary information may be published, distributed, sublicensed, translated, or reproduced in any way without the prior express written consent of Languagelad.\r\n                </p>\r\n                <p class=\"font-weight-bold\">13. Links.</p>\r\n                <p>\r\n                    The Site may contain links to third-party websites. You acknowledge and agree that Languagelad is not responsible for: (I) the availability or accuracy of such websites or resources or (II) the content, products, or services on or available from such websites or resources. Links to such websites or resources do not imply any endorsement by Languagelad of said websites or resources. You acknowledge sole responsibility for and assume all risk arising from your use of such websites.\r\n                </p>\r\n                <p class=\"font-weight-bold\">14. Notices.</p>\r\n                <p>\r\n                    By providing Languagelad with your email address, you agree that we may use said email address to send you notices relating to the Service, including any notices required by law, in lieu of communication by post. You agree that such electronic communications satisfy any legal requirement that such communications be in writing. We may also use your email address to send you other messages, such as changes to Service features and special offers. If you do not wish to receive such emails, you may unsubscribe from the email list.\r\n                </p>', '2021-10-04 02:06:39', '2021-10-04 02:06:39'),
(3, 'privacy', '<p class=\"font-weight-bold\">1. Acknowledgement and Acceptance of the Terms.</p>\r\n                <p>\r\n                    Languagelad is committed to protecting your privacy. This Privacy Policy sets out our current privacy practices with regard to the information we collect when you interact with languagelad.com. By accessing our website, you are consenting to the manner in which information is collected and used as described in this Privacy Policy.\r\n                </p>\r\n                <p class=\"font-weight-bold\">2. Third-Party Websites.</p>\r\n                <p>\r\n                    The services and offers related to the links on this website, including all other websites, have their own privacy statements which can be viewed by clicking on the appropriate links within each respective website. Languagelad is not responsible for the privacy practices or the content of third-party websites. We recommend and encourage you to always review the privacy policies of third parties before providing any personal information or completing any transaction with such third parties.\r\n                </p>\r\n                <p class=\"font-weight-bold\">3. The Information We Collect, How We Use It, and Why.</p>\r\n                <p>\r\n                    When a user registers for a free trial session, we are asked to request and store the user\'s email address and other relevant information. This is because the user needs to receive email communications in connection with the trial session and the tutor needs to know certain things in order to provide the service. The information required at this stage is: name, email address, age range, estimated language level, and motivation. The user may also optionally provide their telephone number and Skype ID to enhance communication and receive session reminders. If the user chooses to have lessons without a trial session, the only information required is an email address and key person.\r\n                </p>\r\n                <p>\r\n                    We store the above data for the purpose of (1) allowing lessons and trial sessions to be scheduled, (2) allowing tutors to provide their services, and (3) allowing our support team to skillfully address any issues. The data is stored in third-party software systems, which use the latest security technology and are GDPR compliant. Data can occasionally be shared with tutors by email if you book a lesson with them and they do not have your information. We have an agreement with our tutors that covers data privacy.\r\n                </p>\r\n                <p>\r\n                    We offer meaningful choices when it comes to important uses and collection of your information. To easily access, view, update, correct, delete, or port your personal data, as well as to update your subscription preferences, please sign into your account and visit \"Account Settings\".\r\n                </p>\r\n                <p>\r\n                    After users register for a trial session, they may receive emails regarding their request. Users may also receive occasional emails about updates and special offers. They may opt-out of receiving emails by clicking on the unsubscribe link in any emails they receive\r\n                </p>\r\n                <p>\r\n                    We will not disclose personally-identifiable information we collect from you to third parties (other than Languagelad’s guardians) without your permission, except to the extent necessary, including:\r\n                    <ul>\r\n                        <li>To protect us from liability</li>\r\n                        <li>To respond to legal process or compliance with the law, or in connection with a merger, acquisition, or liquidation of the company</li>\r\n                    </ul>\r\n                </p>\r\n                <p>\r\n                    When you visit Languagelad.com, we may track your browsing activity and analyze it in order to better serve our users. We use third-party cookies to run Google Analytics Demographics and Interest Reports. These cookies collect data on website visitors (such as age and gender), which we use to optimize the content and marketing of our website. These cookies do not collect any personally-identifiable information.\r\n                </p>\r\n                <p>\r\n                    We use remarketing tracking to record when users view specific pages or take specific actions on Languagelad.com. This is a common practice and allows us to advertise to previous users when they are browsing other websites. If you do not wish to receive advertising from Google or Facebook, you can opt-out of receiving advertising on each of these services by using the personal settings for each of these services.\r\n                </p>\r\n                <p class=\"font-weight-bold\">4. Changes to This Statement.</p>\r\n                <p>\r\n                    Languagelad has the discretion to occasionally update this Privacy Policy. We encourage you to periodically review this Privacy Policy to stay informed about how we are helping to protect the personal information we collect.\r\n                </p>\r\n                <p class=\"font-weight-bold\">5. Contacting Us.</p>\r\n                <p>\r\n                    If you have any questions about our Privacy Policy, please contact us.\r\n                </p>', '2021-10-04 02:06:53', '2021-10-04 02:06:53'),
(4, 'stripe_commission', '4.5', '2021-10-12 04:22:02', '2021-10-12 04:22:02'),
(5, 'paypal_commission', '4.5', '2021-10-12 04:22:02', '2021-10-12 04:22:02');

-- --------------------------------------------------------

--
-- Table structure for table `stripe_transfers`
--

CREATE TABLE `stripe_transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stripe_transfer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `tutor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_packages`
--

CREATE TABLE `student_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tutor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tutor_lesson_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tutor_lesson_package_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_classes` int(11) NOT NULL DEFAULT 0,
  `remaining_classes` int(11) NOT NULL DEFAULT 0,
  `cancelled_classes` int(11) NOT NULL DEFAULT 0,
  `completed_classes` int(11) NOT NULL DEFAULT 0,
  `total_amount_paid` double(8,2) NOT NULL DEFAULT 0.00,
  `total_amount_refunded` double(8,2) NOT NULL DEFAULT 0.00,
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 Active, 2 Completed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_packages`
--

INSERT INTO `student_packages` (`id`, `tutor_id`, `student_id`, `tutor_lesson_id`, `tutor_lesson_package_id`, `total_classes`, `remaining_classes`, `cancelled_classes`, `completed_classes`, `total_amount_paid`, `total_amount_refunded`, `status`, `created_at`, `updated_at`) VALUES
(5, 42, 40, 34, 87, 1, 1, 0, 0, 80.00, 0.00, '2', '2021-09-13 02:38:11', '2021-10-26 04:06:54'),
(9, 43, 40, 47, 215, 20, 20, 0, 0, 210.00, 0.00, '1', '2021-09-15 02:46:07', '2021-10-26 07:07:14'),
(10, 43, 56, 47, 216, 10, 10, 0, 0, 404.00, 80.80, '1', '2021-09-24 01:00:16', '2021-09-24 06:09:18'),
(11, 58, 61, 48, 217, 5, 9, 0, 0, 150.00, 0.00, '1', '2021-10-14 07:50:25', '2021-10-18 06:24:05'),
(12, 58, 62, 48, 217, 5, 5, 0, 0, 150.00, 0.00, '1', '2021-10-18 07:51:18', '2021-10-18 08:19:51'),
(20, 66, 68, 56, 242, 5, 1, 0, 0, 100.00, 0.00, '1', '2021-10-30 14:19:34', '2021-11-01 22:41:36'),
(21, 66, 70, 56, 242, 5, 3, 0, 0, 100.00, 0.00, '1', '2021-11-01 21:36:34', '2021-11-01 21:58:03'),
(24, 64, 72, 60, 254, 5, 3, 0, 0, 150.00, 0.00, '1', '2021-11-04 00:52:38', '2021-11-17 02:26:58'),
(25, 64, 63, 60, 254, 5, 4, 0, 0, 150.00, 0.00, '1', '2021-11-08 02:34:27', '2021-11-08 02:34:27'),
(26, 75, 63, 62, 260, 5, 4, 0, 0, 150.00, 0.00, '1', '2021-11-15 00:25:11', '2021-11-15 00:25:11'),
(27, 75, 72, 62, 260, 5, 4, 0, 0, 150.00, 0.00, '1', '2021-11-17 02:58:05', '2021-11-17 02:58:05'),
(28, 76, 78, 63, 262, 5, 5, 0, 0, 100.00, 20.00, '1', '2021-11-17 10:55:52', '2021-11-18 04:56:48'),
(29, 76, 78, 63, 263, 20, 19, 0, 0, 200.00, 10.00, '1', '2021-11-17 11:30:54', '2021-11-18 03:18:01'),
(30, 76, 78, 64, 265, 10, 9, 0, 0, 200.00, 0.00, '1', '2021-11-17 12:43:27', '2021-11-17 12:43:27'),
(31, 76, 78, 64, 267, 10, 9, 0, 0, 100.00, 0.00, '1', '2021-11-17 13:17:06', '2021-11-17 13:17:06');

-- --------------------------------------------------------

--
-- Table structure for table `student_profiles`
--

CREATE TABLE `student_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lives_in` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `native_language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wallet_amount` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_profiles`
--

INSERT INTO `student_profiles` (`id`, `user_id`, `image`, `country`, `lives_in`, `native_language`, `wallet_amount`, `created_at`, `updated_at`) VALUES
(10, 40, 'uploads/students/40/1628838674-27bs-profile-picture.png', 'Pakistan', 'Lahore', 'French', 310.00, '2021-08-13 14:11:14', '2021-09-22 06:48:13'),
(11, 46, 'uploads/students/46/1628840940-bDlV-profile-picture.png', NULL, NULL, NULL, 0.00, '2021-08-13 14:49:00', '2021-08-13 14:49:00'),
(12, 47, NULL, NULL, NULL, NULL, 0.00, '2021-08-23 00:25:17', '2021-08-23 00:25:17'),
(13, 51, NULL, NULL, NULL, NULL, 0.00, '2021-08-28 11:10:30', '2021-08-28 11:10:30'),
(15, 55, NULL, NULL, NULL, NULL, 0.00, '2021-09-16 23:31:14', '2021-09-16 23:31:14'),
(16, 56, 'uploads/students/56/1632462869-VqEz-profile-picture.png', NULL, NULL, NULL, 80.80, '2021-09-24 00:54:29', '2021-09-24 06:09:18'),
(17, 57, 'uploads/students/57/1632909094-ToVW-profile-picture.png', NULL, NULL, NULL, 0.00, '2021-09-29 04:51:34', '2021-09-29 04:51:34'),
(18, 61, 'uploads/students/61/1634189454-voFG-profile-picture.png', NULL, NULL, NULL, 52.25, '2021-10-14 00:30:54', '2021-10-14 05:36:17'),
(19, 62, NULL, NULL, NULL, NULL, 0.00, '2021-10-18 05:46:02', '2021-10-18 05:46:02'),
(20, 63, 'uploads/students/63/1635137315-nuxs-profile-picture.png', 'Spain', 'Bermingom', 'French', 0.00, '2021-10-24 23:48:35', '2021-11-08 02:25:03'),
(21, 65, 'uploads/students/65/1635336633-zvqE-profile-picture.png', NULL, NULL, NULL, 5.00, '2021-10-27 07:10:33', '2021-10-28 00:50:36'),
(22, 68, 'uploads/tutors/68/1635792741-7FXD-profile-picture.jpg', 'Algeria', 'London', 'French', 0.00, '2021-10-30 14:18:06', '2021-11-01 23:01:56'),
(23, 70, NULL, 'Bahamas', 'lkg', 'English', 0.00, '2021-11-01 20:38:49', '2021-11-01 21:20:45'),
(24, 72, 'uploads/students/72/1635932380-iwaY-profile-picture.png', 'Antarctica', 'Test', 'English', 0.00, '2021-11-03 04:39:40', '2021-11-03 06:18:46'),
(25, 77, 'uploads/students/77/1637141430-Sod8-profile-picture.png', 'Pakistan', 'Test City', 'French', 0.00, '2021-11-17 04:30:30', '2021-11-17 04:52:07'),
(26, 78, NULL, 'Antigua and Barbuda', 'Test', 'Spanish', 30.00, '2021-11-17 10:36:36', '2021-11-29 07:49:16'),
(27, 80, 'uploads/students/80/1638185695-G5u0-profile-picture.png', NULL, NULL, NULL, 0.00, '2021-11-29 06:34:55', '2021-11-29 06:34:55');

-- --------------------------------------------------------

--
-- Table structure for table `student_speaks`
--

CREATE TABLE `student_speaks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_speaks`
--

INSERT INTO `student_speaks` (`id`, `student_id`, `language`, `level`, `created_at`, `updated_at`) VALUES
(22, 40, 'Spanish', 'B2: Upper Intermediate', '2021-09-22 06:48:13', '2021-09-22 06:48:13'),
(31, 70, 'English', 'B1: Intermediate', '2021-11-01 21:20:45', '2021-11-01 21:20:45'),
(35, 68, 'English', 'B1: Intermediate', '2021-11-01 23:01:56', '2021-11-01 23:01:56'),
(37, 72, 'Spanish', 'B1: Intermediate', '2021-11-03 06:18:46', '2021-11-03 06:18:46'),
(40, 63, 'French', 'B1: Intermediate', '2021-11-08 02:25:03', '2021-11-08 02:25:03'),
(45, 77, 'English', 'B1: Intermediate', '2021-11-17 04:52:07', '2021-11-17 04:52:07'),
(56, 78, 'English', 'A1: Begineer', '2021-11-29 07:49:16', '2021-11-29 07:49:16');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Test A', '2021-09-03 08:09:42', '2021-09-03 08:09:42'),
(2, 'Tag B', '2021-09-03 08:09:54', '2021-09-03 08:10:04'),
(3, 'Tag C', '2021-09-03 08:10:17', '2021-09-03 08:10:17');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `image`, `description`, `created_at`, `updated_at`) VALUES
(2, 'uploads/admin/6125d01085a3b/1629868048-VJq9-testimonial-user.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only fiv', '2021-08-25 00:00:04', '2021-08-25 00:07:28'),
(3, 'uploads/admin/6125d01f2a4c2/1629868063-djm9-testimonial-user.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only fiv', '2021-08-25 00:04:24', '2021-08-25 00:07:43'),
(4, 'uploads/admin/6125d02ec4a7b/1629868078-I630-testimonial-user.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only fiv', '2021-08-25 00:06:07', '2021-08-25 00:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `timezone`
--

CREATE TABLE `timezone` (
  `country_code` char(3) NOT NULL,
  `timezone` varchar(125) NOT NULL DEFAULT '',
  `gmt_offset` float(10,2) DEFAULT NULL,
  `dst_offset` float(10,2) DEFAULT NULL,
  `raw_offset` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `timezone`
--

INSERT INTO `timezone` (`country_code`, `timezone`, `gmt_offset`, `dst_offset`, `raw_offset`) VALUES
('AD', 'Europe/Andorra', 1.00, 2.00, 1.00),
('AE', 'Asia/Dubai', 4.00, 4.00, 4.00),
('AF', 'Asia/Kabul', 4.50, 4.50, 4.50),
('AG', 'America/Antigua', -4.00, -4.00, -4.00),
('AI', 'America/Anguilla', -4.00, -4.00, -4.00),
('AL', 'Europe/Tirane', 1.00, 2.00, 1.00),
('AM', 'Asia/Yerevan', 4.00, 4.00, 4.00),
('AO', 'Africa/Luanda', 1.00, 1.00, 1.00),
('AQ', 'Antarctica/Casey', 8.00, 8.00, 8.00),
('AQ', 'Antarctica/Davis', 7.00, 7.00, 7.00),
('AQ', 'Antarctica/DumontDUrville', 10.00, 10.00, 10.00),
('AQ', 'Antarctica/Mawson', 5.00, 5.00, 5.00),
('AQ', 'Antarctica/McMurdo', 13.00, 12.00, 12.00),
('AQ', 'Antarctica/Palmer', -3.00, -4.00, -4.00),
('AQ', 'Antarctica/Rothera', -3.00, -3.00, -3.00),
('AQ', 'Antarctica/South_Pole', 13.00, 12.00, 12.00),
('AQ', 'Antarctica/Syowa', 3.00, 3.00, 3.00),
('AQ', 'Antarctica/Vostok', 6.00, 6.00, 6.00),
('AR', 'America/Argentina/Buenos_Aires', -3.00, -3.00, -3.00),
('AR', 'America/Argentina/Catamarca', -3.00, -3.00, -3.00),
('AR', 'America/Argentina/Cordoba', -3.00, -3.00, -3.00),
('AR', 'America/Argentina/Jujuy', -3.00, -3.00, -3.00),
('AR', 'America/Argentina/La_Rioja', -3.00, -3.00, -3.00),
('AR', 'America/Argentina/Mendoza', -3.00, -3.00, -3.00),
('AR', 'America/Argentina/Rio_Gallegos', -3.00, -3.00, -3.00),
('AR', 'America/Argentina/Salta', -3.00, -3.00, -3.00),
('AR', 'America/Argentina/San_Juan', -3.00, -3.00, -3.00),
('AR', 'America/Argentina/San_Luis', -3.00, -3.00, -3.00),
('AR', 'America/Argentina/Tucuman', -3.00, -3.00, -3.00),
('AR', 'America/Argentina/Ushuaia', -3.00, -3.00, -3.00),
('AS', 'Pacific/Pago_Pago', -11.00, -11.00, -11.00),
('AT', 'Europe/Vienna', 1.00, 2.00, 1.00),
('AU', 'Antarctica/Macquarie', 11.00, 11.00, 11.00),
('AU', 'Australia/Adelaide', 10.50, 9.50, 9.50),
('AU', 'Australia/Brisbane', 10.00, 10.00, 10.00),
('AU', 'Australia/Broken_Hill', 10.50, 9.50, 9.50),
('AU', 'Australia/Currie', 11.00, 10.00, 10.00),
('AU', 'Australia/Darwin', 9.50, 9.50, 9.50),
('AU', 'Australia/Eucla', 8.75, 8.75, 8.75),
('AU', 'Australia/Hobart', 11.00, 10.00, 10.00),
('AU', 'Australia/Lindeman', 10.00, 10.00, 10.00),
('AU', 'Australia/Lord_Howe', 11.00, 10.50, 10.50),
('AU', 'Australia/Melbourne', 11.00, 10.00, 10.00),
('AU', 'Australia/Perth', 8.00, 8.00, 8.00),
('AU', 'Australia/Sydney', 11.00, 10.00, 10.00),
('AW', 'America/Aruba', -4.00, -4.00, -4.00),
('AX', 'Europe/Mariehamn', 2.00, 3.00, 2.00),
('AZ', 'Asia/Baku', 4.00, 5.00, 4.00),
('BA', 'Europe/Sarajevo', 1.00, 2.00, 1.00),
('BB', 'America/Barbados', -4.00, -4.00, -4.00),
('BD', 'Asia/Dhaka', 6.00, 6.00, 6.00),
('BE', 'Europe/Brussels', 1.00, 2.00, 1.00),
('BF', 'Africa/Ouagadougou', 0.00, 0.00, 0.00),
('BG', 'Europe/Sofia', 2.00, 3.00, 2.00),
('BH', 'Asia/Bahrain', 3.00, 3.00, 3.00),
('BI', 'Africa/Bujumbura', 2.00, 2.00, 2.00),
('BJ', 'Africa/Porto-Novo', 1.00, 1.00, 1.00),
('BL', 'America/St_Barthelemy', -4.00, -4.00, -4.00),
('BM', 'Atlantic/Bermuda', -4.00, -3.00, -4.00),
('BN', 'Asia/Brunei', 8.00, 8.00, 8.00),
('BO', 'America/La_Paz', -4.00, -4.00, -4.00),
('BQ', 'America/Kralendijk', -4.00, -4.00, -4.00),
('BR', 'America/Araguaina', -3.00, -3.00, -3.00),
('BR', 'America/Bahia', -3.00, -3.00, -3.00),
('BR', 'America/Belem', -3.00, -3.00, -3.00),
('BR', 'America/Boa_Vista', -4.00, -4.00, -4.00),
('BR', 'America/Campo_Grande', -3.00, -4.00, -4.00),
('BR', 'America/Cuiaba', -3.00, -4.00, -4.00),
('BR', 'America/Eirunepe', -5.00, -5.00, -5.00),
('BR', 'America/Fortaleza', -3.00, -3.00, -3.00),
('BR', 'America/Maceio', -3.00, -3.00, -3.00),
('BR', 'America/Manaus', -4.00, -4.00, -4.00),
('BR', 'America/Noronha', -2.00, -2.00, -2.00),
('BR', 'America/Porto_Velho', -4.00, -4.00, -4.00),
('BR', 'America/Recife', -3.00, -3.00, -3.00),
('BR', 'America/Rio_Branco', -5.00, -5.00, -5.00),
('BR', 'America/Santarem', -3.00, -3.00, -3.00),
('BR', 'America/Sao_Paulo', -2.00, -3.00, -3.00),
('BS', 'America/Nassau', -5.00, -4.00, -5.00),
('BT', 'Asia/Thimphu', 6.00, 6.00, 6.00),
('BW', 'Africa/Gaborone', 2.00, 2.00, 2.00),
('BY', 'Europe/Minsk', 3.00, 3.00, 3.00),
('BZ', 'America/Belize', -6.00, -6.00, -6.00),
('CA', 'America/Atikokan', -5.00, -5.00, -5.00),
('CA', 'America/Blanc-Sablon', -4.00, -4.00, -4.00),
('CA', 'America/Cambridge_Bay', -7.00, -6.00, -7.00),
('CA', 'America/Creston', -7.00, -7.00, -7.00),
('CA', 'America/Dawson', -8.00, -7.00, -8.00),
('CA', 'America/Dawson_Creek', -7.00, -7.00, -7.00),
('CA', 'America/Edmonton', -7.00, -6.00, -7.00),
('CA', 'America/Glace_Bay', -4.00, -3.00, -4.00),
('CA', 'America/Goose_Bay', -4.00, -3.00, -4.00),
('CA', 'America/Halifax', -4.00, -3.00, -4.00),
('CA', 'America/Inuvik', -7.00, -6.00, -7.00),
('CA', 'America/Iqaluit', -5.00, -4.00, -5.00),
('CA', 'America/Moncton', -4.00, -3.00, -4.00),
('CA', 'America/Montreal', -5.00, -4.00, -5.00),
('CA', 'America/Nipigon', -5.00, -4.00, -5.00),
('CA', 'America/Pangnirtung', -5.00, -4.00, -5.00),
('CA', 'America/Rainy_River', -6.00, -5.00, -6.00),
('CA', 'America/Rankin_Inlet', -6.00, -5.00, -6.00),
('CA', 'America/Regina', -6.00, -6.00, -6.00),
('CA', 'America/Resolute', -6.00, -5.00, -6.00),
('CA', 'America/St_Johns', -3.50, -2.50, -3.50),
('CA', 'America/Swift_Current', -6.00, -6.00, -6.00),
('CA', 'America/Thunder_Bay', -5.00, -4.00, -5.00),
('CA', 'America/Toronto', -5.00, -4.00, -5.00),
('CA', 'America/Vancouver', -8.00, -7.00, -8.00),
('CA', 'America/Whitehorse', -8.00, -7.00, -8.00),
('CA', 'America/Winnipeg', -6.00, -5.00, -6.00),
('CA', 'America/Yellowknife', -7.00, -6.00, -7.00),
('CC', 'Indian/Cocos', 6.50, 6.50, 6.50),
('CD', 'Africa/Kinshasa', 1.00, 1.00, 1.00),
('CD', 'Africa/Lubumbashi', 2.00, 2.00, 2.00),
('CF', 'Africa/Bangui', 1.00, 1.00, 1.00),
('CG', 'Africa/Brazzaville', 1.00, 1.00, 1.00),
('CH', 'Europe/Zurich', 1.00, 2.00, 1.00),
('CI', 'Africa/Abidjan', 0.00, 0.00, 0.00),
('CK', 'Pacific/Rarotonga', -10.00, -10.00, -10.00),
('CL', 'America/Santiago', -3.00, -4.00, -4.00),
('CL', 'Pacific/Easter', -5.00, -6.00, -6.00),
('CM', 'Africa/Douala', 1.00, 1.00, 1.00),
('CN', 'Asia/Chongqing', 8.00, 8.00, 8.00),
('CN', 'Asia/Harbin', 8.00, 8.00, 8.00),
('CN', 'Asia/Kashgar', 8.00, 8.00, 8.00),
('CN', 'Asia/Shanghai', 8.00, 8.00, 8.00),
('CN', 'Asia/Urumqi', 8.00, 8.00, 8.00),
('CO', 'America/Bogota', -5.00, -5.00, -5.00),
('CR', 'America/Costa_Rica', -6.00, -6.00, -6.00),
('CU', 'America/Havana', -5.00, -4.00, -5.00),
('CV', 'Atlantic/Cape_Verde', -1.00, -1.00, -1.00),
('CW', 'America/Curacao', -4.00, -4.00, -4.00),
('CX', 'Indian/Christmas', 7.00, 7.00, 7.00),
('CY', 'Asia/Nicosia', 2.00, 3.00, 2.00),
('CZ', 'Europe/Prague', 1.00, 2.00, 1.00),
('DE', 'Europe/Berlin', 1.00, 2.00, 1.00),
('DE', 'Europe/Busingen', 1.00, 2.00, 1.00),
('DJ', 'Africa/Djibouti', 3.00, 3.00, 3.00),
('DK', 'Europe/Copenhagen', 1.00, 2.00, 1.00),
('DM', 'America/Dominica', -4.00, -4.00, -4.00),
('DO', 'America/Santo_Domingo', -4.00, -4.00, -4.00),
('DZ', 'Africa/Algiers', 1.00, 1.00, 1.00),
('EC', 'America/Guayaquil', -5.00, -5.00, -5.00),
('EC', 'Pacific/Galapagos', -6.00, -6.00, -6.00),
('EE', 'Europe/Tallinn', 2.00, 3.00, 2.00),
('EG', 'Africa/Cairo', 2.00, 2.00, 2.00),
('EH', 'Africa/El_Aaiun', 0.00, 0.00, 0.00),
('ER', 'Africa/Asmara', 3.00, 3.00, 3.00),
('ES', 'Africa/Ceuta', 1.00, 2.00, 1.00),
('ES', 'Atlantic/Canary', 0.00, 1.00, 0.00),
('ES', 'Europe/Madrid', 1.00, 2.00, 1.00),
('ET', 'Africa/Addis_Ababa', 3.00, 3.00, 3.00),
('FI', 'Europe/Helsinki', 2.00, 3.00, 2.00),
('FJ', 'Pacific/Fiji', 13.00, 12.00, 12.00),
('FK', 'Atlantic/Stanley', -3.00, -3.00, -3.00),
('FM', 'Pacific/Chuuk', 10.00, 10.00, 10.00),
('FM', 'Pacific/Kosrae', 11.00, 11.00, 11.00),
('FM', 'Pacific/Pohnpei', 11.00, 11.00, 11.00),
('FO', 'Atlantic/Faroe', 0.00, 1.00, 0.00),
('FR', 'Europe/Paris', 1.00, 2.00, 1.00),
('GA', 'Africa/Libreville', 1.00, 1.00, 1.00),
('GB', 'Europe/London', 0.00, 1.00, 0.00),
('GD', 'America/Grenada', -4.00, -4.00, -4.00),
('GE', 'Asia/Tbilisi', 4.00, 4.00, 4.00),
('GF', 'America/Cayenne', -3.00, -3.00, -3.00),
('GG', 'Europe/Guernsey', 0.00, 1.00, 0.00),
('GH', 'Africa/Accra', 0.00, 0.00, 0.00),
('GI', 'Europe/Gibraltar', 1.00, 2.00, 1.00),
('GL', 'America/Danmarkshavn', 0.00, 0.00, 0.00),
('GL', 'America/Godthab', -3.00, -2.00, -3.00),
('GL', 'America/Scoresbysund', -1.00, 0.00, -1.00),
('GL', 'America/Thule', -4.00, -3.00, -4.00),
('GM', 'Africa/Banjul', 0.00, 0.00, 0.00),
('GN', 'Africa/Conakry', 0.00, 0.00, 0.00),
('GP', 'America/Guadeloupe', -4.00, -4.00, -4.00),
('GQ', 'Africa/Malabo', 1.00, 1.00, 1.00),
('GR', 'Europe/Athens', 2.00, 3.00, 2.00),
('GS', 'Atlantic/South_Georgia', -2.00, -2.00, -2.00),
('GT', 'America/Guatemala', -6.00, -6.00, -6.00),
('GU', 'Pacific/Guam', 10.00, 10.00, 10.00),
('GW', 'Africa/Bissau', 0.00, 0.00, 0.00),
('GY', 'America/Guyana', -4.00, -4.00, -4.00),
('HK', 'Asia/Hong_Kong', 8.00, 8.00, 8.00),
('HN', 'America/Tegucigalpa', -6.00, -6.00, -6.00),
('HR', 'Europe/Zagreb', 1.00, 2.00, 1.00),
('HT', 'America/Port-au-Prince', -5.00, -4.00, -5.00),
('HU', 'Europe/Budapest', 1.00, 2.00, 1.00),
('ID', 'Asia/Jakarta', 7.00, 7.00, 7.00),
('ID', 'Asia/Jayapura', 9.00, 9.00, 9.00),
('ID', 'Asia/Makassar', 8.00, 8.00, 8.00),
('ID', 'Asia/Pontianak', 7.00, 7.00, 7.00),
('IE', 'Europe/Dublin', 0.00, 1.00, 0.00),
('IL', 'Asia/Jerusalem', 2.00, 3.00, 2.00),
('IM', 'Europe/Isle_of_Man', 0.00, 1.00, 0.00),
('IN', 'Asia/Kolkata', 5.50, 5.50, 5.50),
('IO', 'Indian/Chagos', 6.00, 6.00, 6.00),
('IQ', 'Asia/Baghdad', 3.00, 3.00, 3.00),
('IR', 'Asia/Tehran', 3.50, 4.50, 3.50),
('IS', 'Atlantic/Reykjavik', 0.00, 0.00, 0.00),
('IT', 'Europe/Rome', 1.00, 2.00, 1.00),
('JE', 'Europe/Jersey', 0.00, 1.00, 0.00),
('JM', 'America/Jamaica', -5.00, -5.00, -5.00),
('JO', 'Asia/Amman', 2.00, 3.00, 2.00),
('JP', 'Asia/Tokyo', 9.00, 9.00, 9.00),
('KE', 'Africa/Nairobi', 3.00, 3.00, 3.00),
('KG', 'Asia/Bishkek', 6.00, 6.00, 6.00),
('KH', 'Asia/Phnom_Penh', 7.00, 7.00, 7.00),
('KI', 'Pacific/Enderbury', 13.00, 13.00, 13.00),
('KI', 'Pacific/Kiritimati', 14.00, 14.00, 14.00),
('KI', 'Pacific/Tarawa', 12.00, 12.00, 12.00),
('KM', 'Indian/Comoro', 3.00, 3.00, 3.00),
('KN', 'America/St_Kitts', -4.00, -4.00, -4.00),
('KP', 'Asia/Pyongyang', 9.00, 9.00, 9.00),
('KR', 'Asia/Seoul', 9.00, 9.00, 9.00),
('KW', 'Asia/Kuwait', 3.00, 3.00, 3.00),
('KY', 'America/Cayman', -5.00, -5.00, -5.00),
('KZ', 'Asia/Almaty', 6.00, 6.00, 6.00),
('KZ', 'Asia/Aqtau', 5.00, 5.00, 5.00),
('KZ', 'Asia/Aqtobe', 5.00, 5.00, 5.00),
('KZ', 'Asia/Oral', 5.00, 5.00, 5.00),
('KZ', 'Asia/Qyzylorda', 6.00, 6.00, 6.00),
('LA', 'Asia/Vientiane', 7.00, 7.00, 7.00),
('LB', 'Asia/Beirut', 2.00, 3.00, 2.00),
('LC', 'America/St_Lucia', -4.00, -4.00, -4.00),
('LI', 'Europe/Vaduz', 1.00, 2.00, 1.00),
('LK', 'Asia/Colombo', 5.50, 5.50, 5.50),
('LR', 'Africa/Monrovia', 0.00, 0.00, 0.00),
('LS', 'Africa/Maseru', 2.00, 2.00, 2.00),
('LT', 'Europe/Vilnius', 2.00, 3.00, 2.00),
('LU', 'Europe/Luxembourg', 1.00, 2.00, 1.00),
('LV', 'Europe/Riga', 2.00, 3.00, 2.00),
('LY', 'Africa/Tripoli', 2.00, 2.00, 2.00),
('MA', 'Africa/Casablanca', 0.00, 0.00, 0.00),
('MC', 'Europe/Monaco', 1.00, 2.00, 1.00),
('MD', 'Europe/Chisinau', 2.00, 3.00, 2.00),
('ME', 'Europe/Podgorica', 1.00, 2.00, 1.00),
('MF', 'America/Marigot', -4.00, -4.00, -4.00),
('MG', 'Indian/Antananarivo', 3.00, 3.00, 3.00),
('MH', 'Pacific/Kwajalein', 12.00, 12.00, 12.00),
('MH', 'Pacific/Majuro', 12.00, 12.00, 12.00),
('MK', 'Europe/Skopje', 1.00, 2.00, 1.00),
('ML', 'Africa/Bamako', 0.00, 0.00, 0.00),
('MM', 'Asia/Rangoon', 6.50, 6.50, 6.50),
('MN', 'Asia/Choibalsan', 8.00, 8.00, 8.00),
('MN', 'Asia/Hovd', 7.00, 7.00, 7.00),
('MN', 'Asia/Ulaanbaatar', 8.00, 8.00, 8.00),
('MO', 'Asia/Macau', 8.00, 8.00, 8.00),
('MP', 'Pacific/Saipan', 10.00, 10.00, 10.00),
('MQ', 'America/Martinique', -4.00, -4.00, -4.00),
('MR', 'Africa/Nouakchott', 0.00, 0.00, 0.00),
('MS', 'America/Montserrat', -4.00, -4.00, -4.00),
('MT', 'Europe/Malta', 1.00, 2.00, 1.00),
('MU', 'Indian/Mauritius', 4.00, 4.00, 4.00),
('MV', 'Indian/Maldives', 5.00, 5.00, 5.00),
('MW', 'Africa/Blantyre', 2.00, 2.00, 2.00),
('MX', 'America/Bahia_Banderas', -6.00, -5.00, -6.00),
('MX', 'America/Cancun', -6.00, -5.00, -6.00),
('MX', 'America/Chihuahua', -7.00, -6.00, -7.00),
('MX', 'America/Hermosillo', -7.00, -7.00, -7.00),
('MX', 'America/Matamoros', -6.00, -5.00, -6.00),
('MX', 'America/Mazatlan', -7.00, -6.00, -7.00),
('MX', 'America/Merida', -6.00, -5.00, -6.00),
('MX', 'America/Mexico_City', -6.00, -5.00, -6.00),
('MX', 'America/Monterrey', -6.00, -5.00, -6.00),
('MX', 'America/Ojinaga', -7.00, -6.00, -7.00),
('MX', 'America/Santa_Isabel', -8.00, -7.00, -8.00),
('MX', 'America/Tijuana', -8.00, -7.00, -8.00),
('MY', 'Asia/Kuala_Lumpur', 8.00, 8.00, 8.00),
('MY', 'Asia/Kuching', 8.00, 8.00, 8.00),
('MZ', 'Africa/Maputo', 2.00, 2.00, 2.00),
('NA', 'Africa/Windhoek', 2.00, 1.00, 1.00),
('NC', 'Pacific/Noumea', 11.00, 11.00, 11.00),
('NE', 'Africa/Niamey', 1.00, 1.00, 1.00),
('NF', 'Pacific/Norfolk', 11.50, 11.50, 11.50),
('NG', 'Africa/Lagos', 1.00, 1.00, 1.00),
('NI', 'America/Managua', -6.00, -6.00, -6.00),
('NL', 'Europe/Amsterdam', 1.00, 2.00, 1.00),
('NO', 'Europe/Oslo', 1.00, 2.00, 1.00),
('NP', 'Asia/Kathmandu', 5.75, 5.75, 5.75),
('NR', 'Pacific/Nauru', 12.00, 12.00, 12.00),
('NU', 'Pacific/Niue', -11.00, -11.00, -11.00),
('NZ', 'Pacific/Auckland', 13.00, 12.00, 12.00),
('NZ', 'Pacific/Chatham', 13.75, 12.75, 12.75),
('OM', 'Asia/Muscat', 4.00, 4.00, 4.00),
('PA', 'America/Panama', -5.00, -5.00, -5.00),
('PE', 'America/Lima', -5.00, -5.00, -5.00),
('PF', 'Pacific/Gambier', -9.00, -9.00, -9.00),
('PF', 'Pacific/Marquesas', -9.50, -9.50, -9.50),
('PF', 'Pacific/Tahiti', -10.00, -10.00, -10.00),
('PG', 'Pacific/Port_Moresby', 10.00, 10.00, 10.00),
('PH', 'Asia/Manila', 8.00, 8.00, 8.00),
('PK', 'Asia/Karachi', 5.00, 5.00, 5.00),
('PL', 'Europe/Warsaw', 1.00, 2.00, 1.00),
('PM', 'America/Miquelon', -3.00, -2.00, -3.00),
('PN', 'Pacific/Pitcairn', -8.00, -8.00, -8.00),
('PR', 'America/Puerto_Rico', -4.00, -4.00, -4.00),
('PS', 'Asia/Gaza', 2.00, 3.00, 2.00),
('PS', 'Asia/Hebron', 2.00, 3.00, 2.00),
('PT', 'Atlantic/Azores', -1.00, 0.00, -1.00),
('PT', 'Atlantic/Madeira', 0.00, 1.00, 0.00),
('PT', 'Europe/Lisbon', 0.00, 1.00, 0.00),
('PW', 'Pacific/Palau', 9.00, 9.00, 9.00),
('PY', 'America/Asuncion', -3.00, -4.00, -4.00),
('QA', 'Asia/Qatar', 3.00, 3.00, 3.00),
('RE', 'Indian/Reunion', 4.00, 4.00, 4.00),
('RO', 'Europe/Bucharest', 2.00, 3.00, 2.00),
('RS', 'Europe/Belgrade', 1.00, 2.00, 1.00),
('RU', 'Asia/Anadyr', 12.00, 12.00, 12.00),
('RU', 'Asia/Irkutsk', 9.00, 9.00, 9.00),
('RU', 'Asia/Kamchatka', 12.00, 12.00, 12.00),
('RU', 'Asia/Khandyga', 10.00, 10.00, 10.00),
('RU', 'Asia/Krasnoyarsk', 8.00, 8.00, 8.00),
('RU', 'Asia/Magadan', 12.00, 12.00, 12.00),
('RU', 'Asia/Novokuznetsk', 7.00, 7.00, 7.00),
('RU', 'Asia/Novosibirsk', 7.00, 7.00, 7.00),
('RU', 'Asia/Omsk', 7.00, 7.00, 7.00),
('RU', 'Asia/Sakhalin', 11.00, 11.00, 11.00),
('RU', 'Asia/Ust-Nera', 11.00, 11.00, 11.00),
('RU', 'Asia/Vladivostok', 11.00, 11.00, 11.00),
('RU', 'Asia/Yakutsk', 10.00, 10.00, 10.00),
('RU', 'Asia/Yekaterinburg', 6.00, 6.00, 6.00),
('RU', 'Europe/Kaliningrad', 3.00, 3.00, 3.00),
('RU', 'Europe/Moscow', 4.00, 4.00, 4.00),
('RU', 'Europe/Samara', 4.00, 4.00, 4.00),
('RU', 'Europe/Volgograd', 4.00, 4.00, 4.00),
('RW', 'Africa/Kigali', 2.00, 2.00, 2.00),
('SA', 'Asia/Riyadh', 3.00, 3.00, 3.00),
('SB', 'Pacific/Guadalcanal', 11.00, 11.00, 11.00),
('SC', 'Indian/Mahe', 4.00, 4.00, 4.00),
('SD', 'Africa/Khartoum', 3.00, 3.00, 3.00),
('SE', 'Europe/Stockholm', 1.00, 2.00, 1.00),
('SG', 'Asia/Singapore', 8.00, 8.00, 8.00),
('SH', 'Atlantic/St_Helena', 0.00, 0.00, 0.00),
('SI', 'Europe/Ljubljana', 1.00, 2.00, 1.00),
('SJ', 'Arctic/Longyearbyen', 1.00, 2.00, 1.00),
('SK', 'Europe/Bratislava', 1.00, 2.00, 1.00),
('SL', 'Africa/Freetown', 0.00, 0.00, 0.00),
('SM', 'Europe/San_Marino', 1.00, 2.00, 1.00),
('SN', 'Africa/Dakar', 0.00, 0.00, 0.00),
('SO', 'Africa/Mogadishu', 3.00, 3.00, 3.00),
('SR', 'America/Paramaribo', -3.00, -3.00, -3.00),
('SS', 'Africa/Juba', 3.00, 3.00, 3.00),
('ST', 'Africa/Sao_Tome', 0.00, 0.00, 0.00),
('SV', 'America/El_Salvador', -6.00, -6.00, -6.00),
('SX', 'America/Lower_Princes', -4.00, -4.00, -4.00),
('SY', 'Asia/Damascus', 2.00, 3.00, 2.00),
('SZ', 'Africa/Mbabane', 2.00, 2.00, 2.00),
('TC', 'America/Grand_Turk', -5.00, -4.00, -5.00),
('TD', 'Africa/Ndjamena', 1.00, 1.00, 1.00),
('TF', 'Indian/Kerguelen', 5.00, 5.00, 5.00),
('TG', 'Africa/Lome', 0.00, 0.00, 0.00),
('TH', 'Asia/Bangkok', 7.00, 7.00, 7.00),
('TJ', 'Asia/Dushanbe', 5.00, 5.00, 5.00),
('TK', 'Pacific/Fakaofo', 13.00, 13.00, 13.00),
('TL', 'Asia/Dili', 9.00, 9.00, 9.00),
('TM', 'Asia/Ashgabat', 5.00, 5.00, 5.00),
('TN', 'Africa/Tunis', 1.00, 1.00, 1.00),
('TO', 'Pacific/Tongatapu', 13.00, 13.00, 13.00),
('TR', 'Europe/Istanbul', 2.00, 3.00, 2.00),
('TT', 'America/Port_of_Spain', -4.00, -4.00, -4.00),
('TV', 'Pacific/Funafuti', 12.00, 12.00, 12.00),
('TW', 'Asia/Taipei', 8.00, 8.00, 8.00),
('TZ', 'Africa/Dar_es_Salaam', 3.00, 3.00, 3.00),
('UA', 'Europe/Kiev', 2.00, 3.00, 2.00),
('UA', 'Europe/Simferopol', 2.00, 4.00, 4.00),
('UA', 'Europe/Uzhgorod', 2.00, 3.00, 2.00),
('UA', 'Europe/Zaporozhye', 2.00, 3.00, 2.00),
('UG', 'Africa/Kampala', 3.00, 3.00, 3.00),
('UM', 'Pacific/Johnston', -10.00, -10.00, -10.00),
('UM', 'Pacific/Midway', -11.00, -11.00, -11.00),
('UM', 'Pacific/Wake', 12.00, 12.00, 12.00),
('US', 'America/Adak', -10.00, -9.00, -10.00),
('US', 'America/Anchorage', -9.00, -8.00, -9.00),
('US', 'America/Boise', -7.00, -6.00, -7.00),
('US', 'America/Chicago', -6.00, -5.00, -6.00),
('US', 'America/Denver', -7.00, -6.00, -7.00),
('US', 'America/Detroit', -5.00, -4.00, -5.00),
('US', 'America/Indiana/Indianapolis', -5.00, -4.00, -5.00),
('US', 'America/Indiana/Knox', -6.00, -5.00, -6.00),
('US', 'America/Indiana/Marengo', -5.00, -4.00, -5.00),
('US', 'America/Indiana/Petersburg', -5.00, -4.00, -5.00),
('US', 'America/Indiana/Tell_City', -6.00, -5.00, -6.00),
('US', 'America/Indiana/Vevay', -5.00, -4.00, -5.00),
('US', 'America/Indiana/Vincennes', -5.00, -4.00, -5.00),
('US', 'America/Indiana/Winamac', -5.00, -4.00, -5.00),
('US', 'America/Juneau', -9.00, -8.00, -9.00),
('US', 'America/Kentucky/Louisville', -5.00, -4.00, -5.00),
('US', 'America/Kentucky/Monticello', -5.00, -4.00, -5.00),
('US', 'America/Los_Angeles', -8.00, -7.00, -8.00),
('US', 'America/Menominee', -6.00, -5.00, -6.00),
('US', 'America/Metlakatla', -8.00, -8.00, -8.00),
('US', 'America/New_York', -5.00, -4.00, -5.00),
('US', 'America/Nome', -9.00, -8.00, -9.00),
('US', 'America/North_Dakota/Beulah', -6.00, -5.00, -6.00),
('US', 'America/North_Dakota/Center', -6.00, -5.00, -6.00),
('US', 'America/North_Dakota/New_Salem', -6.00, -5.00, -6.00),
('US', 'America/Phoenix', -7.00, -7.00, -7.00),
('US', 'America/Shiprock', -7.00, -6.00, -7.00),
('US', 'America/Sitka', -9.00, -8.00, -9.00),
('US', 'America/Yakutat', -9.00, -8.00, -9.00),
('US', 'Pacific/Honolulu', -10.00, -10.00, -10.00),
('UY', 'America/Montevideo', -2.00, -3.00, -3.00),
('UZ', 'Asia/Samarkand', 5.00, 5.00, 5.00),
('UZ', 'Asia/Tashkent', 5.00, 5.00, 5.00),
('VA', 'Europe/Vatican', 1.00, 2.00, 1.00),
('VC', 'America/St_Vincent', -4.00, -4.00, -4.00),
('VE', 'America/Caracas', -4.50, -4.50, -4.50),
('VG', 'America/Tortola', -4.00, -4.00, -4.00),
('VI', 'America/St_Thomas', -4.00, -4.00, -4.00),
('VN', 'Asia/Ho_Chi_Minh', 7.00, 7.00, 7.00),
('VU', 'Pacific/Efate', 11.00, 11.00, 11.00),
('WF', 'Pacific/Wallis', 12.00, 12.00, 12.00),
('WS', 'Pacific/Apia', 14.00, 13.00, 13.00),
('YE', 'Asia/Aden', 3.00, 3.00, 3.00),
('YT', 'Indian/Mayotte', 3.00, 3.00, 3.00),
('ZA', 'Africa/Johannesburg', 2.00, 2.00, 2.00),
('ZM', 'Africa/Lusaka', 2.00, 2.00, 2.00),
('ZW', 'Africa/Harare', 2.00, 2.00, 2.00);

-- --------------------------------------------------------

--
-- Table structure for table `time_tables`
--

CREATE TABLE `time_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tutor_id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_closed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_tables`
--

INSERT INTO `time_tables` (`id`, `tutor_id`, `day`, `is_closed`, `created_at`, `updated_at`) VALUES
(58, 42, 'Tuesday', 0, '2021-08-13 14:25:27', '2021-08-13 14:25:27'),
(59, 42, 'Wednesday', 0, '2021-08-13 14:25:27', '2021-08-13 14:25:27'),
(60, 42, 'Thursday', 0, '2021-08-13 14:25:27', '2021-08-13 14:25:27'),
(63, 42, 'Sunday', 0, '2021-08-13 14:25:27', '2021-08-13 14:25:27'),
(65, 43, 'Tuesday', 0, '2021-08-13 14:33:47', '2021-08-13 14:33:47'),
(66, 43, 'Wednesday', 1, '2021-08-13 14:33:47', '2021-09-20 04:52:53'),
(67, 43, 'Thursday', 0, '2021-08-13 14:33:47', '2021-08-13 14:33:47'),
(68, 43, 'Friday', 0, '2021-08-13 14:33:47', '2021-08-13 14:33:47'),
(69, 43, 'Saturday', 0, '2021-08-13 14:33:47', '2021-08-13 14:33:47'),
(70, 43, 'Sunday', 0, '2021-08-13 14:33:47', '2021-08-13 14:33:47'),
(71, 44, 'Monday', 0, '2021-08-13 14:40:43', '2021-08-13 14:40:43'),
(72, 44, 'Tuesday', 0, '2021-08-13 14:40:43', '2021-08-13 14:40:43'),
(73, 44, 'Wednesday', 0, '2021-08-13 14:40:43', '2021-08-13 14:40:43'),
(74, 44, 'Thursday', 0, '2021-08-13 14:40:44', '2021-08-13 14:40:44'),
(75, 44, 'Friday', 0, '2021-08-13 14:40:44', '2021-08-13 14:40:44'),
(76, 44, 'Saturday', 0, '2021-08-13 14:40:44', '2021-08-13 14:40:44'),
(77, 44, 'Sunday', 0, '2021-08-13 14:40:44', '2021-08-13 14:40:44'),
(78, 45, 'Monday', 0, '2021-08-13 14:46:11', '2021-08-13 14:46:11'),
(79, 45, 'Tuesday', 0, '2021-08-13 14:46:11', '2021-08-13 14:46:11'),
(80, 45, 'Wednesday', 0, '2021-08-13 14:46:11', '2021-08-13 14:46:11'),
(81, 45, 'Thursday', 0, '2021-08-13 14:46:11', '2021-08-13 14:46:11'),
(82, 45, 'Friday', 0, '2021-08-13 14:46:11', '2021-08-13 14:46:11'),
(83, 45, 'Saturday', 0, '2021-08-13 14:46:11', '2021-08-13 14:46:11'),
(84, 45, 'Sunday', 0, '2021-08-13 14:46:11', '2021-08-13 14:46:11'),
(92, 42, 'Friday', 0, '2021-08-24 00:29:14', '2021-08-24 00:29:14'),
(93, 42, 'Monday', 0, '2021-08-27 05:49:15', '2021-08-27 05:49:15'),
(94, 43, 'Monday', 0, '2021-08-28 02:42:36', '2021-08-28 02:42:36'),
(97, 58, 'Monday', 0, '2021-10-14 00:33:07', '2021-10-14 00:33:07'),
(100, 66, 'Monday', 0, '2021-10-30 15:54:14', '2021-10-30 15:54:14'),
(101, 66, 'Tuesday', 0, '2021-10-30 15:57:29', '2021-11-01 23:51:51'),
(102, 66, 'Saturday', 1, '2021-10-30 16:00:06', '2021-10-30 16:00:06'),
(103, 66, 'Wednesday', 0, '2021-10-30 16:00:28', '2021-10-30 16:00:28'),
(106, 64, 'Monday', 0, '2021-11-04 03:47:18', '2021-11-08 03:29:50'),
(107, 75, 'Monday', 0, '2021-11-15 00:24:07', '2021-11-15 00:24:07'),
(108, 76, 'Monday', 0, '2021-11-17 07:25:38', '2021-11-17 13:13:39'),
(109, 76, 'Tuesday', 0, '2021-11-25 05:13:16', '2021-11-25 05:13:16'),
(110, 76, 'Wednesday', 0, '2021-11-25 05:15:50', '2021-11-29 12:34:22'),
(111, 76, 'Thursday', 0, '2021-11-25 05:16:16', '2021-11-25 05:16:16'),
(112, 76, 'Friday', 0, '2021-11-26 12:45:11', '2021-11-26 12:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `time_zones`
--

CREATE TABLE `time_zones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_zones`
--

INSERT INTO `time_zones` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, '(UTC-11:00) Midway Island', 'Pacific/Midway', '2021-03-04 06:25:58', '2021-03-04 06:25:58'),
(2, '(UTC-11:00) Samoa', 'Pacific/Samoa', '2021-03-04 06:25:58', '2021-03-04 06:25:58'),
(3, '(UTC-10:00) Hawaii', 'Pacific/Honolulu', '2021-03-04 06:25:59', '2021-03-04 06:25:59'),
(4, '(UTC-09:00) Alaska', 'US/Alaska', '2021-03-04 06:25:59', '2021-03-04 06:25:59'),
(5, '(UTC-08:00) Pacific Time (US', 'America/Los_Angeles', '2021-03-04 06:25:59', '2021-03-04 06:25:59'),
(6, '(UTC-08:00) Tijuana', 'America/Tijuana', '2021-03-04 06:25:59', '2021-03-04 06:25:59'),
(7, '(UTC-07:00) Arizona', 'US/Arizona', '2021-03-04 06:25:59', '2021-03-04 06:25:59'),
(8, '(UTC-07:00) Chihuahua', 'America/Chihuahua', '2021-03-04 06:25:59', '2021-03-04 06:25:59'),
(9, '(UTC-07:00) La Paz', 'America/Chihuahua', '2021-03-04 06:26:00', '2021-03-04 06:26:00'),
(10, '(UTC-07:00) Mazatlan', 'America/Mazatlan', '2021-03-04 06:26:00', '2021-03-04 06:26:00'),
(11, '(UTC-07:00) Mountain Time (US', 'US/Mountain', '2021-03-04 06:26:00', '2021-03-04 06:26:00'),
(12, '(UTC-06:00) Central America', 'America/Managua', '2021-03-04 06:26:00', '2021-03-04 06:26:00'),
(13, '(UTC-06:00) Central Time (US', 'US/Central', '2021-03-04 06:26:00', '2021-03-04 06:26:00'),
(14, '(UTC-06:00) Guadalajara', 'America/Mexico_City', '2021-03-04 06:26:00', '2021-03-04 06:26:00'),
(15, '(UTC-06:00) Mexico City', 'America/Mexico_City', '2021-03-04 06:26:01', '2021-03-04 06:26:01'),
(16, '(UTC-06:00) Monterrey', 'America/Monterrey', '2021-03-04 06:26:01', '2021-03-04 06:26:01'),
(17, '(UTC-06:00) Saskatchewan', 'Canada/Saskatchewan', '2021-03-04 06:26:01', '2021-03-04 06:26:01'),
(18, '(UTC-05:00) Bogota', 'America/Bogota', '2021-03-04 06:26:01', '2021-03-04 06:26:01'),
(19, '(UTC-05:00) Eastern Time (US', 'US/Eastern', '2021-03-04 06:26:01', '2021-03-04 06:26:01'),
(20, '(UTC-05:00) Indiana (East)', 'US/East-Indiana', '2021-03-04 06:26:02', '2021-03-04 06:26:02'),
(21, '(UTC-05:00) Lima', 'America/Lima', '2021-03-04 06:26:02', '2021-03-04 06:26:02'),
(22, '(UTC-05:00) Quito', 'America/Bogota', '2021-03-04 06:26:02', '2021-03-04 06:26:02'),
(23, '(UTC-04:00) Atlantic Time (Canada)', 'Canada/Atlantic', '2021-03-04 06:26:02', '2021-03-04 06:26:02'),
(24, '(UTC-04:30) Caracas', 'America/Caracas', '2021-03-04 06:26:02', '2021-03-04 06:26:02'),
(25, '(UTC-04:00) La Paz', 'America/La_Paz', '2021-03-04 06:26:02', '2021-03-04 06:26:02'),
(26, '(UTC-04:00) Santiago', 'America/Santiago', '2021-03-04 06:26:03', '2021-03-04 06:26:03'),
(27, '(UTC-03:30) Newfoundland', 'Canada/Newfoundland', '2021-03-04 06:26:03', '2021-03-04 06:26:03'),
(28, '(UTC-03:00) Brasilia', 'America/Sao_Paulo', '2021-03-04 06:26:03', '2021-03-04 06:26:03'),
(29, '(UTC-03:00) Buenos Aires', 'America/Argentina/Buenos_Aires', '2021-03-04 06:26:03', '2021-03-04 06:26:03'),
(30, '(UTC-03:00) Georgetown', 'America/Argentina/Buenos_Aires', '2021-03-04 06:26:03', '2021-03-04 06:26:03'),
(31, '(UTC-03:00) Greenland', 'America/Godthab', '2021-03-04 06:26:04', '2021-03-04 06:26:04'),
(32, '(UTC-02:00) Mid-Atlantic', 'America/Noronha', '2021-03-04 06:26:04', '2021-03-04 06:26:04'),
(33, '(UTC-01:00) Azores', 'Atlantic/Azores', '2021-03-04 06:26:04', '2021-03-04 06:26:04'),
(34, '(UTC-01:00) Cape Verde Is.', 'Atlantic/Cape_Verde', '2021-03-04 06:26:04', '2021-03-04 06:26:04'),
(35, '(UTC 00:00) Casablanca', 'Africa/Casablanca', '2021-03-04 06:26:04', '2021-03-04 06:26:04'),
(36, '(UTC 00:00) Edinburgh', 'Europe/Edinburgh', '2021-03-04 06:26:04', '2021-03-04 06:26:04'),
(37, '(UTC 00:00) Greenwich Mean Time : Dublin', 'Etc/Greenwich', '2021-03-04 06:26:05', '2021-03-04 06:26:05'),
(38, '(UTC 00:00) Lisbon', 'Europe/Lisbon', '2021-03-04 06:26:05', '2021-03-04 06:26:05'),
(39, '(UTC 00:00) London', 'Europe/London', '2021-03-04 06:26:05', '2021-03-04 06:26:05'),
(40, '(UTC 00:00) Monrovia', 'Africa/Monrovia', '2021-03-04 06:26:05', '2021-03-04 06:26:05'),
(41, '(UTC 00:00) UTC', 'UTC', '2021-03-04 06:26:05', '2021-03-04 06:26:05'),
(42, '(UTC 01:00) Amsterdam', 'Europe/Amsterdam', '2021-03-04 06:26:06', '2021-03-04 06:26:06'),
(43, '(UTC 01:00) Belgrade', 'Europe/Belgrade', '2021-03-04 06:26:06', '2021-03-04 06:26:06'),
(44, '(UTC 01:00) Berlin', 'Europe/Berlin', '2021-03-04 06:26:06', '2021-03-04 06:26:06'),
(45, '(UTC 01:00) Bern', 'Europe/Berlin', '2021-03-04 06:26:06', '2021-03-04 06:26:06'),
(46, '(UTC 01:00) Bratislava', 'Europe/Bratislava', '2021-03-04 06:26:06', '2021-03-04 06:26:06'),
(47, '(UTC 01:00) Brussels', 'Europe/Brussels', '2021-03-04 06:26:06', '2021-03-04 06:26:06'),
(48, '(UTC 01:00) Budapest', 'Europe/Budapest', '2021-03-04 06:26:07', '2021-03-04 06:26:07'),
(49, '(UTC 01:00) Copenhagen', 'Europe/Copenhagen', '2021-03-04 06:26:07', '2021-03-04 06:26:07'),
(50, '(UTC 01:00) Ljubljana', 'Europe/Ljubljana', '2021-03-04 06:26:07', '2021-03-04 06:26:07'),
(51, '(UTC 01:00) Madrid', 'Europe/Madrid', '2021-03-04 06:26:07', '2021-03-04 06:26:07'),
(52, '(UTC 01:00) Paris', 'Europe/Paris', '2021-03-04 06:26:07', '2021-03-04 06:26:07'),
(53, '(UTC 01:00) Prague', 'Europe/Prague', '2021-03-04 06:26:08', '2021-03-04 06:26:08'),
(54, '(UTC 01:00) Rome', 'Europe/Rome', '2021-03-04 06:26:08', '2021-03-04 06:26:08'),
(55, '(UTC 01:00) Sarajevo', 'Europe/Sarajevo', '2021-03-04 06:26:08', '2021-03-04 06:26:08'),
(56, '(UTC 01:00) Skopje', 'Europe/Skopje', '2021-03-04 06:26:08', '2021-03-04 06:26:08'),
(57, '(UTC 01:00) Stockholm', 'Europe/Stockholm', '2021-03-04 06:26:08', '2021-03-04 06:26:08'),
(58, '(UTC 01:00) Vienna', 'Europe/Vienna', '2021-03-04 06:26:08', '2021-03-04 06:26:08'),
(59, '(UTC 01:00) Warsaw', 'Europe/Warsaw', '2021-03-04 06:26:09', '2021-03-04 06:26:09'),
(60, '(UTC 01:00) West Central Africa', 'Africa/Lagos', '2021-03-04 06:26:09', '2021-03-04 06:26:09'),
(61, '(UTC 01:00) Zagreb', 'Europe/Zagreb', '2021-03-04 06:26:09', '2021-03-04 06:26:09'),
(62, '(UTC 02:00) Athens', 'Europe/Athens', '2021-03-04 06:26:09', '2021-03-04 06:26:09'),
(63, '(UTC 02:00) Bucharest', 'Europe/Bucharest', '2021-03-04 06:26:09', '2021-03-04 06:26:09'),
(64, '(UTC 02:00) Cairo', 'Africa/Cairo', '2021-03-04 06:26:09', '2021-03-04 06:26:09'),
(65, '(UTC 02:00) Harare', 'Africa/Harare', '2021-03-04 06:26:09', '2021-03-04 06:26:09'),
(66, '(UTC 02:00) Helsinki', 'Europe/Helsinki', '2021-03-04 06:26:10', '2021-03-04 06:26:10'),
(67, '(UTC 02:00) Istanbul', 'Europe/Istanbul', '2021-03-04 06:26:10', '2021-03-04 06:26:10'),
(68, '(UTC 02:00) Jerusalem', 'Asia/Jerusalem', '2021-03-04 06:26:10', '2021-03-04 06:26:10'),
(69, '(UTC 02:00) Kyiv', 'Europe/Helsinki', '2021-03-04 06:26:10', '2021-03-04 06:26:10'),
(70, '(UTC 02:00) Pretoria', 'Africa/Johannesburg', '2021-03-04 06:26:10', '2021-03-04 06:26:10'),
(71, '(UTC 02:00) Riga', 'Europe/Riga', '2021-03-04 06:26:10', '2021-03-04 06:26:10'),
(72, '(UTC 02:00) Sofia', 'Europe/Sofia', '2021-03-04 06:26:11', '2021-03-04 06:26:11'),
(73, '(UTC 02:00) Tallinn', 'Europe/Tallinn', '2021-03-04 06:26:11', '2021-03-04 06:26:11'),
(74, '(UTC 02:00) Vilnius', 'Europe/Vilnius', '2021-03-04 06:26:11', '2021-03-04 06:26:11'),
(75, '(UTC 03:00) Baghdad', 'Asia/Baghdad', '2021-03-04 06:26:11', '2021-03-04 06:26:11'),
(76, '(UTC 03:00) Kuwait', 'Asia/Kuwait', '2021-03-04 06:26:11', '2021-03-04 06:26:11'),
(77, '(UTC 03:00) Minsk', 'Europe/Minsk', '2021-03-04 06:26:11', '2021-03-04 06:26:11'),
(78, '(UTC 03:00) Nairobi', 'Africa/Nairobi', '2021-03-04 06:26:12', '2021-03-04 06:26:12'),
(79, '(UTC 03:00) Riyadh', 'Asia/Riyadh', '2021-03-04 06:26:12', '2021-03-04 06:26:12'),
(80, '(UTC 03:00) Volgograd', 'Europe/Volgograd', '2021-03-04 06:26:12', '2021-03-04 06:26:12'),
(81, '(UTC 03:30) Tehran', 'Asia/Tehran', '2021-03-04 06:26:12', '2021-03-04 06:26:12'),
(82, '(UTC 04:00) Abu Dhabi', 'Asia/Muscat', '2021-03-04 06:26:12', '2021-03-04 06:26:12'),
(83, '(UTC 04:00) Baku', 'Asia/Baku', '2021-03-04 06:26:12', '2021-03-04 06:26:12'),
(84, '(UTC 04:00) Moscow', 'Europe/Moscow', '2021-03-04 06:26:13', '2021-03-04 06:26:13'),
(85, '(UTC 04:00) Muscat', 'Asia/Muscat', '2021-03-04 06:26:13', '2021-03-04 06:26:13'),
(86, '(UTC 04:00) St. Petersburg', 'Europe/Moscow', '2021-03-04 06:26:13', '2021-11-03 05:50:02'),
(87, '(UTC 04:00) Tbilisi', 'Asia/Tbilisi', '2021-03-04 06:26:13', '2021-03-04 06:26:13'),
(88, '(UTC 04:00) Yerevan', 'Asia/Yerevan', '2021-03-04 06:26:13', '2021-03-04 06:26:13'),
(89, '(UTC 04:30) Kabul', 'Asia/Kabul', '2021-03-04 06:26:13', '2021-03-04 06:26:13'),
(90, '(UTC 05:00) Islamabad', 'Asia/Karachi', '2021-03-04 06:26:14', '2021-11-03 05:48:48'),
(91, '(UTC 05:00) Karachi', 'Asia/Karachi', '2021-03-04 06:26:14', '2021-03-04 06:26:14'),
(92, '(UTC 05:00) Tashkent', 'Asia/Tashkent', '2021-03-04 06:26:14', '2021-03-04 06:26:14'),
(93, '(UTC 05:30) Chennai', 'Asia/Calcutta', '2021-03-04 06:26:14', '2021-03-04 06:26:14'),
(94, '(UTC 05:30) Kolkata', 'Asia/Kolkata', '2021-03-04 06:26:14', '2021-03-04 06:26:14'),
(95, '(UTC 05:30) Mumbai', 'Asia/Calcutta', '2021-03-04 06:26:14', '2021-03-04 06:26:14'),
(96, '(UTC 05:30) New Delhi', 'Asia/Calcutta', '2021-03-04 06:26:15', '2021-03-04 06:26:15'),
(97, '(UTC 05:30) Sri Jayawardenepura', 'Asia/Calcutta', '2021-03-04 06:26:15', '2021-03-04 06:26:15'),
(98, '(UTC 05:45) Kathmandu', 'Asia/Katmandu', '2021-03-04 06:26:15', '2021-03-04 06:26:15'),
(99, '(UTC 06:00) Almaty', 'Asia/Almaty', '2021-03-04 06:26:15', '2021-03-04 06:26:15'),
(100, '(UTC 06:00) Astana', 'Asia/Dhaka', '2021-03-04 06:26:15', '2021-03-04 06:26:15'),
(101, '(UTC 06:00) Dhaka', 'Asia/Dhaka', '2021-03-04 06:26:15', '2021-03-04 06:26:15'),
(102, '(UTC 06:00) Ekaterinburg', 'Asia/Yekaterinburg', '2021-03-04 06:26:15', '2021-03-04 06:26:15'),
(103, '(UTC 06:30) Rangoon', 'Asia/Rangoon', '2021-03-04 06:26:16', '2021-03-04 06:26:16'),
(104, '(UTC 07:00) Bangkok', 'Asia/Bangkok', '2021-03-04 06:26:16', '2021-03-04 06:26:16'),
(105, '(UTC 07:00) Hanoi', 'Asia/Bangkok', '2021-03-04 06:26:16', '2021-03-04 06:26:16'),
(106, '(UTC 07:00) Jakarta', 'Asia/Jakarta', '2021-03-04 06:26:16', '2021-03-04 06:26:16'),
(107, '(UTC 07:00) Novosibirsk', 'Asia/Novosibirsk', '2021-03-04 06:26:16', '2021-03-04 06:26:16'),
(108, '(UTC 08:00) Beijing', 'Asia/Hong_Kong', '2021-03-04 06:26:17', '2021-03-04 06:26:17'),
(109, '(UTC 08:00) Chongqing', 'Asia/Chongqing', '2021-03-04 06:26:17', '2021-03-04 06:26:17'),
(110, '(UTC 08:00) Hong Kong', 'Asia/Hong_Kong', '2021-03-04 06:26:17', '2021-03-04 06:26:17'),
(111, '(UTC 08:00) Krasnoyarsk', 'Asia/Krasnoyarsk', '2021-03-04 06:26:17', '2021-03-04 06:26:17'),
(112, '(UTC 08:00) Kuala Lumpur', 'Asia/Kuala_Lumpur', '2021-03-04 06:26:18', '2021-03-04 06:26:18'),
(113, '(UTC 08:00) Perth', 'Australia/Perth', '2021-03-04 06:26:18', '2021-03-04 06:26:18'),
(114, '(UTC 08:00) Singapore', 'Asia/Singapore', '2021-03-04 06:26:18', '2021-03-04 06:26:18'),
(115, '(UTC 08:00) Taipei', 'Asia/Taipei', '2021-03-04 06:26:18', '2021-03-04 06:26:18'),
(116, '(UTC 08:00) Ulaan Bataar', 'Asia/Ulan_Bator', '2021-03-04 06:26:18', '2021-03-04 06:26:18'),
(117, '(UTC 08:00) Urumqi', 'Asia/Urumqi', '2021-03-04 06:26:18', '2021-03-04 06:26:18'),
(118, '(UTC 09:00) Irkutsk', 'Asia/Irkutsk', '2021-03-04 06:26:19', '2021-03-04 06:26:19'),
(119, '(UTC 09:00) Osaka', 'Asia/Tokyo', '2021-03-04 06:26:19', '2021-03-04 06:26:19'),
(120, '(UTC 09:00) Sapporo', 'Asia/Tokyo', '2021-03-04 06:26:19', '2021-03-04 06:26:19'),
(121, '(UTC 09:00) Seoul', 'Asia/Seoul', '2021-03-04 06:26:19', '2021-03-04 06:26:19'),
(122, '(UTC 09:00) Tokyo', 'Asia/Tokyo', '2021-03-04 06:26:19', '2021-03-04 06:26:19'),
(123, '(UTC 09:30) Adelaide', 'Australia/Adelaide', '2021-03-04 06:26:20', '2021-03-04 06:26:20'),
(124, '(UTC 09:30) Darwin', 'Australia/Darwin', '2021-03-04 06:26:20', '2021-03-04 06:26:20'),
(125, '(UTC 10:00) Brisbane', 'Australia/Brisbane', '2021-03-04 06:26:20', '2021-03-04 06:26:20'),
(126, '(UTC 10:00) Canberra', 'Australia/Canberra', '2021-03-04 06:26:20', '2021-03-04 06:26:20'),
(127, '(UTC 10:00) Guam', 'Pacific/Guam', '2021-03-04 06:26:20', '2021-03-04 06:26:20'),
(128, '(UTC 10:00) Hobart', 'Australia/Hobart', '2021-03-04 06:26:20', '2021-03-04 06:26:20'),
(129, '(UTC 10:00) Melbourne', 'Australia/Melbourne', '2021-03-04 06:26:21', '2021-03-04 06:26:21'),
(130, '(UTC 10:00) Port Moresby', 'Pacific/Port_Moresby', '2021-03-04 06:26:21', '2021-03-04 06:26:21'),
(131, '(UTC 10:00) Sydney', 'Australia/Sydney', '2021-03-04 06:26:21', '2021-03-04 06:26:21'),
(132, '(UTC 10:00) Yakutsk', 'Asia/Yakutsk', '2021-03-04 06:26:21', '2021-03-04 06:26:21'),
(133, '(UTC 11:00) Vladivostok', 'Asia/Vladivostok', '2021-03-04 06:26:21', '2021-03-04 06:26:21'),
(134, '(UTC 12:00) Auckland', 'Pacific/Auckland', '2021-03-04 06:26:21', '2021-03-04 06:26:21'),
(135, '(UTC 12:00) Fiji', 'Pacific/Fiji', '2021-03-04 06:26:22', '2021-03-04 06:26:22'),
(136, '(UTC 12:00) International Date Line West', 'Pacific/Kwajalein', '2021-03-04 06:26:22', '2021-03-04 06:26:22'),
(137, '(UTC 12:00) Kamchatka', 'Asia/Kamchatka', '2021-03-04 06:26:22', '2021-03-04 06:26:22'),
(138, '(UTC 12:00) Magadan', 'Asia/Magadan', '2021-03-04 06:26:22', '2021-03-04 06:26:22'),
(139, '(UTC 12:00) Marshall Is.', 'Pacific/Fiji', '2021-03-04 06:26:23', '2021-03-04 06:26:23'),
(140, '(UTC 12:00) New Caledonia', 'Asia/Magadan', '2021-03-04 06:26:23', '2021-03-04 06:26:23'),
(141, '(UTC 12:00) Solomon Is.', 'Asia/Magadan', '2021-03-04 06:26:23', '2021-03-04 06:26:23'),
(142, '(UTC 12:00) Wellington', 'Pacific/Auckland', '2021-03-04 06:26:23', '2021-03-04 06:26:23'),
(143, '(UTC 13:00) Nuku\'alofa', 'Pacific/Tongatapu', '2021-03-04 06:26:23', '2021-03-04 06:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tutor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `booking_request_id` bigint(20) UNSIGNED DEFAULT NULL,
  `trial_class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `stripe_charge_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(8,2) NOT NULL,
  `admin_amount` double(8,2) NOT NULL DEFAULT 0.00,
  `is_captured` tinyint(1) NOT NULL DEFAULT 1,
  `is_refunded` tinyint(1) NOT NULL DEFAULT 0,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `payment_method` enum('paypal','stripe','wallet') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'stripe',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `student_id`, `tutor_id`, `booking_request_id`, `trial_class_id`, `stripe_charge_id`, `paypal_id`, `amount`, `admin_amount`, `is_captured`, `is_refunded`, `is_paid`, `payment_method`, `created_at`, `updated_at`) VALUES
(28, 40, 42, 38, NULL, NULL, NULL, 68.00, 12.00, 1, 0, 0, 'wallet', '2021-09-13 02:38:11', '2021-09-13 02:38:11'),
(33, 40, 43, 43, NULL, NULL, 'PAYID-MFA2JIA5B027695ML7889826', 178.50, 31.50, 1, 0, 0, 'paypal', '2021-09-15 02:46:07', '2021-09-15 02:46:07'),
(34, 56, 43, 44, NULL, 'ch_3Jd7SFEpw9x2Vl1Q0S0x2stV', NULL, 343.40, 60.60, 1, 1, 0, 'stripe', '2021-09-24 01:00:16', '2021-09-24 06:07:19'),
(35, 61, 58, NULL, 14, 'ch_3JkMaaEpw9x2Vl1Q0V6QEEr4', NULL, 52.25, 0.00, 1, 1, 0, 'stripe', '2021-10-14 00:34:50', '2021-10-14 05:36:17'),
(36, 61, 58, 46, NULL, NULL, 'PAYID-MFUCO3A11E506333B1447613', 133.24, 23.51, 1, 0, 0, 'paypal', '2021-10-14 07:50:25', '2021-10-14 07:50:25'),
(37, 62, 58, NULL, 15, 'ch_3JltQNEpw9x2Vl1Q0oqRJXHV', NULL, 52.25, 0.00, 1, 0, 0, 'stripe', '2021-10-18 05:50:37', '2021-10-18 05:50:37'),
(38, 62, 58, 48, NULL, 'ch_3JlvJAEpw9x2Vl1Q0bZ42Mx6', NULL, 133.24, 23.51, 1, 0, 0, 'stripe', '2021-10-18 07:51:18', '2021-10-18 07:51:18'),
(51, 68, 66, 56, NULL, NULL, 'PAYID-MF6RYEA4HA16824858929535', 85.00, 15.00, 1, 0, 0, 'paypal', '2021-10-30 14:19:34', '2021-10-30 14:19:34'),
(52, 70, 66, 57, NULL, NULL, 'PAYID-MGACLEI5E615738VB473732X', 85.00, 15.00, 1, 0, 0, 'paypal', '2021-11-01 21:36:34', '2021-11-01 21:36:34'),
(55, 72, 64, 66, NULL, NULL, 'PAYID-MGBXKCQ5KH055515Y7943155', 135.00, 15.00, 1, 0, 0, 'paypal', '2021-11-04 00:52:38', '2021-11-04 00:52:38'),
(56, 63, 64, 67, NULL, 'ch_3JtSN2Epw9x2Vl1Q1YlKVuWG', NULL, 135.00, 15.00, 1, 0, 0, 'stripe', '2021-11-08 02:34:27', '2021-11-08 02:34:27'),
(57, 63, 75, 68, NULL, 'ch_3JvxgmEpw9x2Vl1Q0E4fUReZ', NULL, 135.00, 15.00, 1, 0, 0, 'stripe', '2021-11-15 00:25:11', '2021-11-15 00:25:11'),
(58, 72, 75, NULL, 21, 'ch_3Jwi9vEpw9x2Vl1Q07du5kjR', NULL, 4.50, 0.00, 1, 0, 0, 'stripe', '2021-11-17 02:02:22', '2021-11-17 02:02:22'),
(59, 72, 75, 71, NULL, 'ch_3Jwj1rEpw9x2Vl1Q0hLAtVfc', NULL, 135.00, 15.00, 1, 0, 0, 'stripe', '2021-11-17 02:58:05', '2021-11-17 02:58:05'),
(62, 78, 76, 72, NULL, 'ch_3JwqUFEpw9x2Vl1Q1Jwt58lV', NULL, 90.00, 10.00, 1, 0, 0, 'stripe', '2021-11-17 10:55:52', '2021-11-17 10:55:52'),
(63, 78, 76, 73, NULL, 'ch_3Jwr27Epw9x2Vl1Q0UAA5mnI', NULL, 180.00, 20.00, 1, 0, 0, 'stripe', '2021-11-17 11:30:54', '2021-11-17 11:30:54'),
(64, 78, 76, 75, NULL, 'ch_3JwsAMEpw9x2Vl1Q04MZzmRU', NULL, 180.00, 20.00, 1, 0, 0, 'stripe', '2021-11-17 12:43:27', '2021-11-17 12:43:27'),
(69, 78, 76, 76, NULL, 'ch_3JwsgvEpw9x2Vl1Q1inkMPdj', NULL, 90.00, 10.00, 1, 0, 0, 'stripe', '2021-11-17 13:17:06', '2021-11-17 13:17:06'),
(71, 78, 76, NULL, 29, NULL, NULL, 5.50, 0.00, 1, 0, 0, 'wallet', '2021-11-18 05:32:26', '2021-11-18 05:32:26');

-- --------------------------------------------------------

--
-- Table structure for table `trial_classes`
--

CREATE TABLE `trial_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tutor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(8,2) NOT NULL DEFAULT 0.00,
  `channel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hours` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `req_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `req_start_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `req_end_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 For Pending , 1 For Accepted , 2 For Declined. 3 For Completed',
  `refund_status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 Default, 1 Requested, 2 Refunded',
  `cancel_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_reason` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_request` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 No Request, 1 Request Sent, 2 Request Accepted, 3 Request Declined',
  `cancel_requested_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_request` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 No Request, 1 Request Sent, 2 Request Accepted, 3 Request Declined',
  `time_requested_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_request_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trial_classes`
--

INSERT INTO `trial_classes` (`id`, `tutor_id`, `student_id`, `date`, `start_time`, `end_time`, `amount`, `channel`, `channel_type`, `note`, `hours`, `req_date`, `req_start_time`, `req_end_time`, `status`, `refund_status`, `cancel_by`, `cancel_reason`, `cancel_request`, `cancel_requested_at`, `time_request`, `time_requested_at`, `time_request_by`, `created_at`, `updated_at`) VALUES
(6, 41, 47, '2021-08-25 10:00:00', '9:00 AM', '10:00 AM', 0.00, 'https://zoom.us/postattendee?mn=aU1EepEm6Ot3gAxmeQmxA4P5fhuNIpfoZuAW.tD3SOqkIewPUpi2a&id=34', NULL, 'lksjlkfjsdlfkjsdlkfsdlf', '1.5', NULL, NULL, NULL, '3', '0', NULL, NULL, '0', NULL, '0', NULL, NULL, '2021-08-23 04:17:09', '2021-10-26 00:51:41'),
(7, 42, 40, '2021-08-30 08:00:00', '8:00 AM', '9:00 AM', 0.00, 'alikashi543211', NULL, 'Test description Test description Test description Test description Test description Test description', '1.5', NULL, NULL, NULL, '3', '0', NULL, NULL, '0', NULL, '0', NULL, NULL, '2021-08-27 06:40:47', '2021-10-25 18:51:53'),
(8, 43, 40, '2021-08-30 09:00:00', '9:00 AM', '10:00 AM', 0.00, 'alikashi5543211', NULL, 'Test accept trial request Test accept trial request Test accept trial request Test accept trial request', '1.5', NULL, NULL, NULL, '3', '0', NULL, NULL, '0', NULL, '0', NULL, NULL, '2021-08-28 02:43:07', '2021-08-28 03:44:31'),
(12, 41, 47, '2021-09-13 10:30:00', '10:30 AM', '11:00 AM', 10.00, 'testskypeid', 'Skype', 'Test note', '1', NULL, NULL, NULL, '3', '0', NULL, NULL, '0', NULL, '0', NULL, NULL, '2021-09-07 12:47:49', '2021-10-26 03:52:02'),
(14, 58, 61, '2021-10-18 17:00:00', '5:00 PM', '5:30 PM', 52.25, 'TestSkyepId', 'Skype', 'slkdjfkls fjslkfj dslkfjdslfj', '1', NULL, NULL, NULL, '3', '1', 'Student', 'Test Cancel Request Sent', '2', NULL, '0', NULL, NULL, '2021-10-14 00:34:50', '2021-10-25 18:52:11'),
(15, 58, 62, '2021-10-25 15:30:00', '3:30 PM', '4:00 PM', 52.25, NULL, NULL, NULL, '1', NULL, NULL, NULL, '2', '1', 'Student', 'Test Cancel Request By Student Test Cancel Request By Student Test Cancel Request By Student Test Cancel Request By Student Test Cancel Request By Student Test Cancel Request By Student Test Cancel Request By Student Test Cancel Request By Student Test Cancel Request By Student', '3', NULL, '0', NULL, NULL, '2021-10-18 05:50:37', '2021-10-18 06:22:43'),
(17, 64, 63, '2021-11-15 13:30:00', '12:30 PM', '01:00 PM', 41.80, 'Test Skype ID', 'Skype', 'Test Note', '1', '2021-11-15 13:30:00', '12:30 PM', '01:00 PM', '2', '1', 'LanguageLad', 'Teacher Did Not Respond To This Trial Request With in 24 Hours', '0', NULL, '3', NULL, NULL, '2021-10-23 09:11:39', '2021-10-26 04:14:59'),
(20, 64, 65, '2021-11-01 11:30:00', '11:30 AM', '12:00 PM', 40.00, NULL, NULL, NULL, '1', NULL, NULL, NULL, '0', '0', NULL, NULL, '0', NULL, '0', NULL, NULL, '2021-10-28 00:50:36', '2021-10-28 00:50:36'),
(21, 75, 72, '2021-11-29 02:00:00', '02:00 AM', '02:30 AM', 4.50, 'Test Zoom Link', 'Zoom', 'Test optional note here.', '1', '2021-11-29 17:30:00', '02:30 AM', '03:00 AM', '0', '0', NULL, NULL, '0', NULL, '0', '2021-11-17 07:27:42', NULL, '2021-11-17 02:02:22', '2021-11-17 02:27:42'),
(29, 76, 78, '2021-12-06 15:00:00', '08:00 PM', '08:30 PM', 5.50, 'TestSkypeID', 'Skype', 'Test here....', '0', '2021-12-06 15:00:00', '08:00 PM', '08:30 PM', '0', '0', NULL, NULL, '0', NULL, '2', '2021-11-18 10:35:57', 'Teacher', '2021-11-18 05:32:26', '2021-11-18 05:36:40');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_certificates`
--

CREATE TABLE `tutor_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tutor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_experiance` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `training` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tutor_certificates`
--

INSERT INTO `tutor_certificates` (`id`, `tutor_id`, `date`, `name`, `institution`, `description`, `work_experiance`, `training`, `attachment`, `created_at`, `updated_at`) VALUES
(14, 41, '2018', 'test name', 'test institution', 'test description', 'test experiance', 'test training', 'uploads/tutors/41/1628838985-hq9T-certificate-attachment.pdf', '2021-08-13 14:16:25', '2021-08-13 14:16:25'),
(15, 42, '2018', 'Test', 'test', 'test', 'test', 'test', 'uploads/tutors/42/1628839445-LKLv-certificate-attachment.pdf', '2021-08-13 14:24:05', '2021-08-13 14:24:05'),
(16, 43, '2018', 'Test', 'test institution', 'test', 'test', 'test', 'uploads/tutors/43/1628839949-FJWT-certificate-attachment.pdf', '2021-08-13 14:32:29', '2021-08-13 14:32:29'),
(17, 44, '2017', 'Test', 'test', 'test', 'test', 'test', 'uploads/tutors/44/1628840365-wUcX-certificate-attachment.pdf', '2021-08-13 14:39:25', '2021-08-13 14:39:25'),
(18, 45, '2017', 'Test', 'test', 'test certificate', 'test', 'test', 'uploads/tutors/45/1628840726-qbo8-certificate-attachment.pdf', '2021-08-13 14:45:26', '2021-08-13 14:45:26');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_education`
--

CREATE TABLE `tutor_education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tutor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `degree` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institution` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tutor_education`
--

INSERT INTO `tutor_education` (`id`, `tutor_id`, `from`, `to`, `degree`, `institution`, `attachment`, `created_at`, `updated_at`) VALUES
(2, 42, '2016', '2020', 'Bachular in Computer Science', 'Bahauddin  Zakariya University', NULL, '2021-08-24 03:15:14', '2021-08-24 07:06:58'),
(3, 42, '2017', '2019', 'Phd in Computer Science', 'Punjab University Lahore', 'uploads/tutors/42/1629798424-BA4q-education-attachment.pdf', '2021-08-24 04:47:04', '2021-08-24 04:47:04'),
(4, 42, '2020', NULL, 'Double Phd in CS', 'Howerd University', 'uploads/tutors/42/1629798646-O4eY-education-attachment.pdf', '2021-08-24 04:50:46', '2021-08-24 04:50:46'),
(6, 49, '2016', '2017', 'Computer Course', 'Edutech Center', 'uploads/tutors/49/1630143677-y4Ur-education-attachment.pdf', '2021-08-28 04:32:37', '2021-08-28 04:41:17'),
(7, 50, '2016', '2017', 'Computer course', 'Edutech', 'uploads/tutors/50/1630148477-1vDG-education-attachment.pdf', '2021-08-28 06:01:17', '2021-08-28 06:01:17'),
(8, 50, '2016', NULL, 'Master', 'BZU Multan', 'uploads/tutors/50/1630148982-m9mB-education-attachment.pdf', '2021-08-28 06:09:42', '2021-08-28 06:11:16'),
(9, 52, '2016', NULL, 'Test', 'Test', 'uploads/tutors/52/1630168539-iIQh-education-attachment.pdf', '2021-08-28 11:35:39', '2021-08-28 11:35:39'),
(10, 53, '2018', '2019', 'Test', 'test', 'uploads/tutors/53/1630675291-nHC9-education-attachment.pdf', '2021-09-03 08:21:31', '2021-09-03 08:21:31'),
(12, 59, '2017', '2018', 'Test Degre', 'Test institution', 'uploads/tutors/59/1633591744-QmqR-education-attachment.pdf', '2021-10-07 02:29:04', '2021-10-07 02:29:04'),
(13, 60, '2016', '2017', 'Test Degree', 'Test institution', 'uploads/tutors/60/1633592178-7qh9-education-attachment.pdf', '2021-10-07 02:36:18', '2021-10-07 02:36:18'),
(15, 41, '2016', '2017', 'Test Degree', 'Test institution', 'uploads/tutors/41/1633936791-alVf-education-attachment.pdf', '2021-10-11 02:19:51', '2021-10-11 02:19:51'),
(16, 58, '2017', '2018', 'Test Degree', 'Test Institution', 'uploads/tutors/58/1634188974-I9YU-education-attachment.pdf', '2021-10-14 00:22:54', '2021-10-14 00:22:54'),
(18, 66, '2007', '2012', 'Al contrario del pensamiento popular', 'Literatura del Latin', 'uploads/tutors/66/1635587280-kiBa-education-attachment.pdf', '2021-10-30 13:48:00', '2021-10-30 13:48:00'),
(22, 64, '2017', '2018', 'Test Degree', 'Test Institution', 'uploads/tutors/64/1636004714-yWw4-education-attachment.pdf', '2021-11-04 00:45:14', '2021-11-04 00:45:14'),
(23, 74, '2017', '2018', 'Test Degree', 'Test Institution', 'uploads/tutors/74/1636022277-72Oj-education-attachment.pdf', '2021-11-04 05:37:57', '2021-11-04 05:37:57'),
(24, 75, '2016', '2017', 'Test Degree', 'Test Institution', 'uploads/tutors/75/1636953184-6nCM-education-attachment.pdf', '2021-11-15 00:13:04', '2021-11-15 00:13:04'),
(25, 76, '2016', '2017', 'Test Degree', 'Test institution', 'uploads/tutors/76/1637140886-GHlu-education-attachment.pdf', '2021-11-17 04:21:26', '2021-11-17 04:21:26'),
(26, 79, '2016', '2017', 'Test Degree', 'Test Institution', 'uploads/tutors/79/1637213255-uPyi-education-attachment.pdf', '2021-11-18 00:27:35', '2021-11-18 00:27:35');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_experiences`
--

CREATE TABLE `tutor_experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tutor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tutor_experiences`
--

INSERT INTO `tutor_experiences` (`id`, `tutor_id`, `from`, `to`, `designation`, `company`, `attachment`, `created_at`, `updated_at`) VALUES
(1, 42, '2017', '2018', 'Web Developer', 'Comptech4All', NULL, '2021-08-24 04:23:15', '2021-08-24 04:23:15'),
(2, 42, '2018', NULL, 'Laravel Developer', 'Deviotech', NULL, '2021-08-24 04:30:27', '2021-08-24 06:26:27'),
(3, 42, '2019', NULL, 'Web Developer', 'Codex IT Solutions', NULL, '2021-08-24 04:41:02', '2021-08-24 04:41:02'),
(5, 49, '2017', NULL, 'Web Instructor', 'Comtech4All', NULL, '2021-08-28 04:33:21', '2021-08-28 04:45:21'),
(6, 50, '2018', '2019', 'Computer Teacher', 'Comtech4All', NULL, '2021-08-28 06:05:55', '2021-08-28 06:05:55'),
(7, 52, '2016', '2017', 'Test', 'Test', NULL, '2021-08-28 11:35:57', '2021-08-28 11:35:57'),
(8, 53, '2016', '2017', 'Web developer', 'Test Company', NULL, '2021-09-03 08:21:53', '2021-09-03 08:21:53'),
(10, 59, '2016', '2017', 'Test Designation', 'Test Company', NULL, '2021-10-07 02:29:37', '2021-10-07 02:29:37'),
(11, 60, '2017', '2018', 'Test Designation', 'Test Company', NULL, '2021-10-07 02:36:43', '2021-10-07 02:36:43'),
(13, 41, '2017', '2018', 'Test Designation', 'Test Company', NULL, '2021-10-11 02:20:14', '2021-10-11 02:20:14'),
(14, 58, '2017', '2018', 'Test Designation', 'Test Company', NULL, '2021-10-14 00:23:16', '2021-10-14 00:23:16'),
(16, 66, '2017', NULL, 'Lorem Ipsum', 'Latin de la Universidad de Hampden-Sydney', NULL, '2021-10-30 13:52:51', '2021-10-30 13:52:51'),
(21, 64, '2016', '2017', 'Test Designation', 'Test Company', NULL, '2021-11-04 00:45:32', '2021-11-04 00:45:32'),
(22, 74, '2016', '2017', 'Test Designation', 'Test Company', NULL, '2021-11-04 05:38:16', '2021-11-04 05:38:16'),
(23, 75, '2017', '2018', 'Test Designation', 'Test Company Name', NULL, '2021-11-15 00:13:29', '2021-11-15 00:13:29'),
(24, 76, '2016', '2017', 'Test Designation', 'Test Company', NULL, '2021-11-17 04:21:45', '2021-11-17 04:21:45'),
(25, 79, '2017', '2018', 'Test Designation', 'Test Company', NULL, '2021-11-18 00:27:54', '2021-11-18 00:27:54');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_lessons`
--

CREATE TABLE `tutor_lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tutor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tutor_lessons`
--

INSERT INTO `tutor_lessons` (`id`, `tutor_id`, `title`, `description`, `language`, `level_from`, `level_to`, `category`, `tag`, `availability`, `created_at`, `updated_at`) VALUES
(34, 42, 'Test Teacher b lesson', 'test description', 'French', 'Intermediate', 'Expert', 'Exam Preparation', 'Tag B', 1, '2021-08-13 14:23:42', '2021-08-13 14:23:42'),
(36, 44, 'Test Teacher D lesson', 'test', 'French', 'Beginner', 'Intermediate', 'Business', 'Tag B', 1, '2021-08-13 14:39:01', '2021-08-13 14:39:01'),
(37, 45, 'Test Teacher e Lesson', 'test', 'English', 'Beginner', 'Intermediate', 'Conversation practice', 'Tag B', 1, '2021-08-13 14:44:55', '2021-08-13 14:44:55'),
(38, 48, 'Test Lesson 6', 'Test lesson Test lesson Test lesson Test lesson', 'English', 'Beginner', 'Expert', 'Exam Preparation', 'Tag A', 1, '2021-08-27 13:22:08', '2021-08-27 13:22:08'),
(39, 49, 'Test Lesson Seven', 'Test description Test description Test description Test description Test description Test description Test description Test description Test description Test description Test description Test description Test description Test description Test description Test description Test description Test description Test description Test description', 'English', 'Beginner', 'Expert', 'General', 'Tag C', 1, '2021-08-28 04:13:08', '2021-08-28 04:13:08'),
(40, 50, 'Test Lesson Eight', 'Test lesson eight description', 'English', 'Beginner', 'Intermediate', 'Kids', 'Tag B', 0, '2021-08-28 05:07:29', '2021-08-28 06:54:11'),
(41, 52, 'Test lesson nine', 'Test lesson nine description', 'English', 'Beginner', 'Intermediate', 'Business', 'Tag C', 1, '2021-08-28 11:26:54', '2021-08-28 12:11:41'),
(42, 52, 'Test Nine Lesson Two', 'Test Nine Lesson Two Description', 'English', 'Beginner', 'Intermediate', 'Business', 'Tag A', 1, '2021-08-28 11:51:03', '2021-08-28 11:57:19'),
(43, 53, 'Test', 'test description', 'French', 'Beginner', 'Expert', 'General', 'Test A', 1, '2021-09-03 08:21:02', '2021-09-03 08:21:02'),
(45, 42, 'Test Lesson 2', 'TEst', 'Spanish', 'Beginner', 'Expert', 'Exam Preparation', 'Tag C', 1, '2021-09-13 02:39:27', '2021-09-13 02:39:27'),
(47, 43, 'Test', 'Test Description', 'French', 'Intermediate', 'Intermediate', 'Business', 'Test A', 1, '2021-09-13 11:50:43', '2021-09-13 11:50:43'),
(48, 58, 'Test', 'Test', 'English', 'Beginner', 'Beginner', 'Kids', 'Tag B', 1, '2021-10-04 02:27:47', '2021-10-14 00:22:28'),
(49, 59, 'Test Lesson', 'Test Lesson Description Test Lesson Description Test Lesson Description Test Lesson Description Test Lesson Description Test Lesson Description Test Lesson Description Test Lesson Description Test Lesson Description Test Lesson Description Test Lesson Description Test Lesson Description', 'English', 'Beginner', 'Intermediate', 'General', 'Tag B', 1, '2021-10-07 02:28:23', '2021-10-07 02:28:23'),
(50, 60, 'Test Lesson', 'Test Lesson Description', 'Spanish', 'Intermediate', 'Expert', 'Business', 'Test A', 1, '2021-10-07 02:35:48', '2021-10-07 02:37:13'),
(52, 41, 'Test Title', 'Test description', 'French', 'Beginner', 'Intermediate', 'Business', 'Tag B', 1, '2021-10-11 02:19:26', '2021-10-11 02:19:26'),
(56, 66, 'Español en General', 'Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.', 'Spanish', 'Beginner', 'Expert', 'General', 'Test A', 0, '2021-10-30 13:47:09', '2021-11-01 22:31:43'),
(60, 64, 'Test Lesson', 'Test Lesson Description', 'Spanish', 'Intermediate', 'Beginner', 'Business', 'Tag C', 1, '2021-11-04 00:44:45', '2021-11-04 00:44:45'),
(61, 74, 'Test Lesson', 'Test lesson description Test lesson description Test lesson description Test lesson description Test lesson description Test lesson description Test lesson description Test lesson description Test lesson description Test lesson description Test lesson description Test lesson description Test lesson description Test lesson description Test lesson description Test lesson description Test lesson description Test lesson description Test lesson description Test lesson description Test lesson description Test lesson description Test lesson description Test lesson description Test lesson description Test lesson description Test lesson description Test lesson description Test lesson description Test lesson description Test lesson description', 'French', 'Beginner', 'Intermediate', 'Exam Preparation', 'Tag B', 1, '2021-11-04 05:37:31', '2021-11-04 05:37:31'),
(62, 75, 'Test Lesson One', 'Test Lesson One Description Here, Test Lesson One Description Here, Test Lesson One Description Here, Test Lesson One Description Here, Test Lesson One Description Here, Test Lesson One Description Here, Test Lesson One Description Here, Test Lesson One Description Here, Test Lesson One Description Here, Test Lesson One Description Here, Test Lesson One Description Here, Test Lesson One Description Here, Test Lesson One Description Here, Test Lesson One Description Here, Test Lesson One Description Here, Test Lesson One Description Here, Test Lesson One Description Here, Test Lesson One Description Here,', 'English', 'Beginner', 'Expert', 'Kids', 'Tag B', 1, '2021-11-15 00:10:27', '2021-11-15 00:10:27'),
(63, 76, 'Test Lesson 1', 'Test Lesson 1 Description', 'French', 'Beginner', 'Intermediate', 'Exam Preparation', 'Tag B', 1, '2021-11-17 04:19:10', '2021-11-17 04:19:37'),
(64, 76, 'Test Lesson 2', 'Test Lesson 2 Description', 'English', 'Beginner', 'Intermediate', 'Business', 'Tag B', 1, '2021-11-17 12:37:55', '2021-11-17 12:37:55'),
(65, 79, 'Test Lesson One', 'Test Lesson One Description', 'French', 'Beginner', 'Intermediate', 'Kids', 'Tag B', 1, '2021-11-18 00:27:02', '2021-11-18 00:29:19'),
(66, 79, 'Test Lesson Two', 'Test Lesson Two Description Test Lesson Two Description Test Lesson Two Description Test Lesson Two Description Test Lesson Two Description Test Lesson Two Description Test Lesson Two Description Test Lesson Two Description Test Lesson Two Description Test Lesson Two Description Test Lesson Two Description Test Lesson Two Description', 'English', 'Beginner', 'Intermediate', 'General', 'Tag B', 1, '2021-11-18 00:30:52', '2021-11-18 00:30:52');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_lesson_packages`
--

CREATE TABLE `tutor_lesson_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tutor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tutor_lesson_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `interval` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_per_interval` float DEFAULT NULL,
  `total_amount` float DEFAULT NULL,
  `package_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tutor_lesson_packages`
--

INSERT INTO `tutor_lesson_packages` (`id`, `tutor_id`, `tutor_lesson_id`, `status`, `interval`, `package`, `amount_per_interval`, `total_amount`, `package_number`, `created_at`, `updated_at`) VALUES
(87, 42, 34, 1, '90 min', '1', 80, 80, '1', '2021-08-13 14:23:42', '2021-08-13 14:23:42'),
(89, 44, 36, 1, '90 min', '1', 65, 65, '1', '2021-08-13 14:39:01', '2021-08-13 14:39:01'),
(90, 45, 37, 1, '90 min', '1', 75, 75, '1', '2021-08-13 14:44:55', '2021-08-13 14:44:55'),
(91, 48, 38, 1, '90 min', '1', 30, 30, '1', '2021-08-27 13:22:08', '2021-08-27 13:22:08'),
(92, 49, 39, 1, '60 min', '5', 23, 115, '2', '2021-08-28 04:13:08', '2021-08-28 05:20:24'),
(154, 50, 40, 1, '90 min', '5', 30, 150, '1', '2021-08-28 06:54:11', '2021-08-28 06:54:11'),
(155, 50, 40, 0, '60 min', '1', 20, 20, '2', '2021-08-28 06:54:11', '2021-08-28 06:54:11'),
(156, 50, 40, 1, '30 min', '20', 30, 600, '3', '2021-08-28 06:54:11', '2021-08-28 06:54:11'),
(168, 52, 41, 0, '90 min', '1', 20, 20, '1', '2021-08-28 11:38:15', '2021-08-28 11:38:15'),
(169, 52, 41, 1, '30 min', '5', 30, 150, '3', '2021-08-28 11:38:15', '2021-08-28 11:38:15'),
(172, 52, 42, 1, '90 min', '5', 10, 50, '1', '2021-08-28 11:57:19', '2021-08-28 11:57:19'),
(173, 53, 43, 1, '90 min', '5', 20, 100, '1', '2021-09-03 08:21:02', '2021-09-03 08:21:02'),
(208, 42, 45, 0, '90 min', NULL, NULL, 0, '1', '2021-09-13 02:39:27', '2021-09-13 02:39:27'),
(209, 42, 45, 1, '60 min', '5', 70, 350, '2', '2021-09-13 02:39:27', '2021-09-13 02:39:27'),
(210, 42, 45, 0, '30 min', NULL, NULL, NULL, '3', '2021-09-13 02:39:27', '2021-09-13 02:39:27'),
(214, 43, 47, 1, '90 min', '5', 12, 60, '1', '2021-09-13 11:50:43', '2021-09-13 11:50:43'),
(215, 43, 47, 1, '60 min', '20', 10.5, 210, '2', '2021-09-13 11:50:43', '2021-09-13 11:50:43'),
(216, 43, 47, 1, '30 min', '10', 40.4, 404, '3', '2021-09-13 11:50:43', '2021-09-13 11:50:43'),
(217, 58, 48, 1, '90 min', '5', 30, 150, '1', '2021-10-04 02:27:47', '2021-10-14 00:22:28'),
(218, 58, 48, 0, '60 min', NULL, NULL, NULL, '2', '2021-10-04 02:27:47', '2021-10-14 00:22:28'),
(219, 58, 48, 0, '30 min', NULL, NULL, NULL, '3', '2021-10-04 02:27:47', '2021-10-14 00:22:28'),
(220, 59, 49, 1, '90 min', '5', 15, 75, '1', '2021-10-07 02:28:23', '2021-10-07 02:28:23'),
(221, 59, 49, 0, '60 min', NULL, NULL, NULL, '2', '2021-10-07 02:28:23', '2021-10-07 02:28:23'),
(222, 59, 49, 0, '30 min', NULL, NULL, NULL, '3', '2021-10-07 02:28:23', '2021-10-07 02:28:23'),
(223, 60, 50, 1, '90 min', '10', 30, 300, '1', '2021-10-07 02:35:48', '2021-10-07 02:37:13'),
(224, 60, 50, 0, '60 min', NULL, NULL, NULL, '2', '2021-10-07 02:35:48', '2021-10-07 02:37:13'),
(225, 60, 50, 0, '30 min', NULL, NULL, NULL, '3', '2021-10-07 02:35:48', '2021-10-07 02:37:13'),
(229, 41, 52, 0, '90 min', NULL, NULL, NULL, '1', '2021-10-11 02:19:26', '2021-10-11 02:19:26'),
(230, 41, 52, 1, '60 min', '5', 40, 200, '2', '2021-10-11 02:19:26', '2021-10-11 02:19:26'),
(231, 41, 52, 0, '30 min', NULL, NULL, NULL, '3', '2021-10-11 02:19:26', '2021-10-11 02:19:26'),
(241, 66, 56, 1, '90 min', '1', 25, 25, '1', '2021-10-30 13:47:09', '2021-10-30 13:47:09'),
(242, 66, 56, 1, '60 min', '5', 20, 100, '2', '2021-10-30 13:47:09', '2021-10-30 13:47:09'),
(243, 66, 56, 1, '30 min', '10', 15, 150, '3', '2021-10-30 13:47:09', '2021-10-30 13:47:09'),
(253, 64, 60, 0, '90 min', NULL, NULL, NULL, '1', '2021-11-04 00:44:45', '2021-11-04 00:44:45'),
(254, 64, 60, 1, '60 min', '5', 30, 150, '2', '2021-11-04 00:44:45', '2021-11-04 00:44:45'),
(255, 64, 60, 0, '30 min', NULL, NULL, NULL, '3', '2021-11-04 00:44:45', '2021-11-04 00:44:45'),
(256, 74, 61, 1, '90 min', '5', 20, 100, '1', '2021-11-04 05:37:31', '2021-11-04 05:37:31'),
(257, 74, 61, 0, '60 min', NULL, NULL, NULL, '2', '2021-11-04 05:37:31', '2021-11-04 05:37:31'),
(258, 74, 61, 0, '30 min', NULL, NULL, NULL, '3', '2021-11-04 05:37:31', '2021-11-04 05:37:31'),
(259, 75, 62, 0, '90 min', NULL, NULL, 0, '1', '2021-11-15 00:10:27', '2021-11-15 00:10:27'),
(260, 75, 62, 1, '60 min', '5', 30, 150, '2', '2021-11-15 00:10:27', '2021-11-15 00:10:27'),
(261, 75, 62, 0, '30 min', NULL, NULL, NULL, '3', '2021-11-15 00:10:27', '2021-11-15 00:10:27'),
(262, 76, 63, 1, '90 min', '5', 20, 100, '1', '2021-11-17 04:19:10', '2021-11-17 04:19:37'),
(263, 76, 63, 1, '60 min', '20', 10, 200, '2', '2021-11-17 04:19:10', '2021-11-17 04:19:37'),
(264, 76, 63, 1, '30 min', '10', 12, 120, '3', '2021-11-17 04:19:10', '2021-11-17 04:19:38'),
(265, 76, 64, 1, '90 min', '10', 20, 200, '1', '2021-11-17 12:37:55', '2021-11-17 12:37:55'),
(266, 76, 64, 1, '60 min', '5', 15, 75, '2', '2021-11-17 12:37:55', '2021-11-17 12:37:55'),
(267, 76, 64, 1, '30 min', '10', 10, 100, '3', '2021-11-17 12:37:55', '2021-11-17 12:37:55'),
(268, 79, 65, 1, '90 min', '1', 30, 30, '1', '2021-11-18 00:27:02', '2021-11-18 00:29:19'),
(269, 79, 65, 1, '60 min', '5', 50, 250, '2', '2021-11-18 00:27:02', '2021-11-18 00:29:19'),
(270, 79, 65, 1, '30 min', '5', 66, 330, '3', '2021-11-18 00:27:02', '2021-11-18 00:29:19'),
(271, 79, 66, 1, '90 min', '5', 70, 350, '1', '2021-11-18 00:30:52', '2021-11-18 00:30:52'),
(272, 79, 66, 1, '60 min', '10', 60, 600, '2', '2021-11-18 00:30:52', '2021-11-18 00:30:52'),
(273, 79, 66, 1, '30 min', '10', 56, 560, '3', '2021-11-18 00:30:52', '2021-11-18 00:30:52');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_profiles`
--

CREATE TABLE `tutor_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lives_in` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `native_language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `step` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '1. General 2. Lesson 3. Certificate 4. Submitted',
  `is_approved` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `is_free_trial` tinyint(1) NOT NULL DEFAULT 0,
  `video_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `embed_video_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hourly_rate` double(8,2) DEFAULT 0.00,
  `stripe_account` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_boarded` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tutor_profiles`
--

INSERT INTO `tutor_profiles` (`id`, `user_id`, `image`, `country`, `lives_in`, `native_language`, `description`, `step`, `is_approved`, `is_free_trial`, `video_url`, `embed_video_url`, `hourly_rate`, `stripe_account`, `is_boarded`, `created_at`, `updated_at`) VALUES
(23, 42, 'uploads/tutors/42/1628839336-zTct-profile-picture.png', 'Spain', 'Bermingom', 'Spanish', 'Test Teacher b profile descsription Test Teacher b profile descsription Test Teacher b profile descsription Test Teacher b profile descsription Test Teacher b profile descsription Test Teacher b profile descsription Test Teacher b profile descsription Test Teacher b profile descsription Test Teacher b profile descsription', '3', '1', 1, NULL, NULL, 400.00, NULL, 0, '2021-08-13 14:21:17', '2021-08-26 23:03:11'),
(24, 43, 'uploads/tutors/43/1628839886-t81D-profile-picture.png', 'England', 'New York', 'English', 'Test Teacher c Profile Description Test Teacher c Profile Description Test Teacher c Profile Description Test Teacher c Profile Description Test Teacher c Profile Description Test Teacher c Profile Description Test Teacher c Profile Description Test Teacher c Profile Description Test Teacher c Profile Description', '3', '1', 1, NULL, 'https://www.youtube.com/embed/00K_St4e0BM', 45.00, NULL, 0, '2021-08-13 14:30:05', '2021-09-24 00:56:54'),
(25, 44, 'uploads/tutors/44/1628840287-I4XA-profile-picture.png', 'France', 'New town', 'French', 'Test Teacher D profile description Test Teacher D profile description Test Teacher D profile description Test Teacher D profile description Test Teacher D profile description Test Teacher D profile description Test Teacher D profile description', '3', '1', 0, NULL, NULL, 65.00, NULL, 0, '2021-08-13 14:36:13', '2021-08-13 14:41:01'),
(27, 48, 'uploads/tutors/48/1630086182-0r6P-profile-picture.png', 'Pakistan', 'Lahore', 'English', 'Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test', '2', '0', 0, NULL, NULL, 40.00, NULL, 0, '2021-08-27 12:38:27', '2021-08-27 13:22:08'),
(28, 49, 'uploads/tutors/49/1630141940-vxzh-profile-picture.png', 'England', 'Bermingam', 'French', 'Test description Test description Test description Test description Test description Test description Test description Test description Test description Test description Test description Test description Test description Test description', '3', '1', 0, NULL, NULL, 340.00, NULL, 0, '2021-08-28 04:11:08', '2021-10-07 02:51:33'),
(29, 50, 'uploads/tutors/50/1630145049-5aDK-profile-picture.png', 'Spain', 'Aukland', 'Spanish', 'Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description', '3', '1', 0, NULL, NULL, 30.00, NULL, 0, '2021-08-28 05:01:22', '2021-10-07 02:51:51'),
(30, 52, 'uploads/tutors/52/1630167551-ldnj-profile-picture.png', 'New Zeland', 'Bermingam', 'English', 'Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description', '3', '1', 0, NULL, NULL, 50.00, NULL, 0, '2021-08-28 11:17:55', '2021-10-07 02:52:06'),
(31, 53, 'uploads/tutors/53/1630675116-JyPQ-profile-picture.png', 'Pakistan', 'Lahore', 'Spanish', 'Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test', '3', '2', 0, NULL, NULL, 27.00, NULL, 0, '2021-09-03 08:14:10', '2021-11-02 05:27:22'),
(32, 58, 'uploads/tutors/58/1634188940-ddZg-profile-picture.png', 'Antarctica', 'Test City', 'French', 'Test Description Test Description Test Description Test Description Test Description Test Description Test Description Test Description Test Description', '3', '1', 1, NULL, NULL, 50.00, NULL, 0, '2021-10-04 02:26:23', '2021-10-24 23:55:07'),
(33, 45, NULL, NULL, NULL, NULL, NULL, '0', '0', 0, NULL, NULL, 0.00, NULL, 0, NULL, NULL),
(35, 59, 'uploads/tutors/59/1633591017-p1iA-profile-picture.png', 'Test', 'Test', 'English', 'LTeljsflk sfkl jkl LTeljsflk sfkl jkl LTeljsflk sfkl jkl LTeljsflk sfkl jkl LTeljsflk sfkl jkl LTeljsflk sfkl jkl LTeljsflk sfkl jkl LTeljsflk sfkl jkl LTeljsflk sfkl jkl LTeljsflk sfkl jkl jjjj', '3', '2', 1, NULL, NULL, 40.00, NULL, 0, '2021-10-07 01:58:00', '2021-11-02 05:25:26'),
(36, 60, 'uploads/tutors/60/1633592024-lAIN-profile-picture.png', 'Test Country', 'Test City', 'English', 'Test Description Test Description Test Description Test Description Test Description Test Description Test Description Test Description Test Description Test Description Test Description', '3', '1', 0, NULL, NULL, 20.00, NULL, 0, '2021-10-07 02:31:07', '2021-11-02 05:09:29'),
(37, 41, 'uploads/tutors/41/1633936735-rnfk-profile-picture.png', 'Pakistan', 'Test City', 'English', 'Test Description Test Description Test Description Test Description Test Description Test Description Test Description Test Description Test Description Test Description Test Description Test Description Test Description Test Description Test Description Test Description Test Description Test Description Test Description Test Description Test Description Test Description Test Description Test Description', '3', '1', 1, NULL, NULL, 430.00, NULL, 0, '2021-10-11 02:18:14', '2021-10-11 02:57:13'),
(39, 66, 'uploads/tutors/66/1635587160-8Na3-profile-picture.jpg', 'Spain', 'Málaga', 'Spanish', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.', '3', '1', 1, NULL, NULL, 3.35, NULL, 0, '2021-10-30 13:41:24', '2021-10-30 14:09:52'),
(43, 71, NULL, NULL, NULL, NULL, NULL, '0', '0', 0, NULL, NULL, 0.00, NULL, 0, '2021-11-03 06:30:40', '2021-11-03 06:30:40'),
(44, 64, 'uploads/tutors/64/1636004648-LfNl-profile-picture.png', 'Spain', 'Test', 'Spanish', 'Test Description Test Description Test Description Test Description Test Description Test Description Test Description Test Description Test Description Test Description Test Description Test Description Test Description Test Description', '3', '1', 1, NULL, NULL, 30.00, NULL, 0, '2021-11-04 00:43:25', '2021-11-08 02:26:39'),
(45, 73, NULL, NULL, NULL, NULL, NULL, '0', '0', 0, NULL, NULL, 0.00, NULL, 0, '2021-11-04 05:20:16', '2021-11-04 05:20:16'),
(46, 74, 'uploads/tutors/74/1636022210-rGE6-profile-picture.png', 'American Samoa', 'TEST', 'English', 'Test DescriptionTest DescriptionTest DescriptionTest DescriptionTest DescriptionTest DescriptionTest DescriptionTest DescriptionTest DescriptionTest DescriptionTest DescriptionTest DescriptionTest DescriptionTest DescriptionTest DescriptionTest DescriptionTest DescriptionTest DescriptionTest Description', '3', '0', 1, NULL, NULL, 2.00, NULL, 0, '2021-11-04 05:27:26', '2021-11-04 05:38:22'),
(47, 75, 'uploads/tutors/75/1636952968-kD2v-profile-picture.png', 'Australia', 'Bermingom', 'French', 'Test Description here, Test Description here, Test Description here, Test Description here, Test Description here, Test Description here, Test Description here, Test Description here, Test Description here, Test Description here, Test Description here, Test Description here, Test Description here, Test Description here, Test Description here, Test Description here, Test Description here, Test Description here, Test Description here, Test Description here, Test Description here, Test Description here,', '3', '1', 1, NULL, NULL, 4.50, NULL, 0, '2021-11-14 23:55:53', '2021-11-15 00:16:51'),
(48, 76, 'uploads/tutors/76/1637140660-s8bF-profile-picture.png', 'Antarctica', 'Test', 'French', 'Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description Test profile description', '3', '1', 1, NULL, NULL, 5.50, NULL, 0, '2021-11-17 04:13:57', '2021-11-25 05:26:17'),
(49, 79, 'uploads/tutors/79/1637213061-Al0h-profile-picture.png', 'Australia', 'Test City', 'English', 'Test Profile Description Test Profile Description Test Profile Description Test Profile Description Test Profile Description Test Profile Description Test Profile Description Test Profile Description Test Profile Description Test Profile Description Test Profile Description Test Profile Description Test Profile Description Test Profile Description Test Profile Description Test Profile Description Test Profile Description Test Profile Description Test Profile Description Test Profile Description Test Profile Description Test Profile Description Test Profile Description', '3', '0', 1, NULL, NULL, 6.60, NULL, 0, '2021-11-18 00:20:56', '2021-11-18 00:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_reviews`
--

CREATE TABLE `tutor_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_request_id` bigint(20) UNSIGNED DEFAULT NULL,
  `trial_class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tutor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tutor_speaks`
--

CREATE TABLE `tutor_speaks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tutor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tutor_speaks`
--

INSERT INTO `tutor_speaks` (`id`, `tutor_id`, `language`, `level`, `created_at`, `updated_at`) VALUES
(94, 44, 'French', 'B2: Upper Intermediate', '2021-08-13 14:38:07', '2021-08-13 14:38:07'),
(95, 44, 'Spanish', 'C1: Advanced', '2021-08-13 14:38:07', '2021-08-13 14:38:07'),
(96, 45, 'English', 'B2: Upper Intermediate', '2021-08-13 14:44:17', '2021-08-13 14:44:17'),
(97, 45, 'French', 'Native', '2021-08-13 14:44:17', '2021-08-13 14:44:17'),
(98, 48, 'English', 'C1: Advanced', '2021-08-27 12:43:02', '2021-08-27 12:43:02'),
(99, 48, 'French', 'Native', '2021-08-27 12:43:02', '2021-08-27 12:43:02'),
(100, 49, 'English', 'C1: Advanced', '2021-08-28 04:12:20', '2021-08-28 04:12:20'),
(101, 49, 'Spanish', 'Native', '2021-08-28 04:12:20', '2021-08-28 04:12:20'),
(102, 50, 'English', 'A1: Begineer', '2021-08-28 05:04:09', '2021-08-28 05:04:09'),
(103, 50, 'Spanish', 'C1: Advanced', '2021-08-28 05:04:09', '2021-08-28 05:04:09'),
(104, 52, 'English', 'B2: Upper Intermediate', '2021-08-28 11:19:11', '2021-08-28 11:19:11'),
(107, 53, 'English', 'B1: Intermediate', '2021-09-03 08:18:36', '2021-09-03 08:18:36'),
(120, 43, 'English', 'Native', '2021-09-24 00:56:54', '2021-09-24 00:56:54'),
(121, 43, 'Spanish', 'A2: Elementry', '2021-09-24 00:56:54', '2021-09-24 00:56:54'),
(134, 59, 'English', 'A2: Elementry', '2021-10-07 02:27:36', '2021-10-07 02:27:36'),
(135, 59, 'French', 'B2: Upper Intermediate', '2021-10-07 02:27:36', '2021-10-07 02:27:36'),
(140, 60, 'English', 'C1: Advanced', '2021-10-07 02:35:12', '2021-10-07 02:35:12'),
(141, 60, 'French', 'B2: Upper Intermediate', '2021-10-07 02:35:12', '2021-10-07 02:35:12'),
(144, 41, 'English', 'A2: Elementry', '2021-10-11 02:36:01', '2021-10-11 02:36:01'),
(146, 58, 'French', 'Native', '2021-10-24 23:55:07', '2021-10-24 23:55:07'),
(152, 66, 'Spanish', 'Native', '2021-10-30 13:46:02', '2021-10-30 13:46:02'),
(153, 66, 'English', 'B2: Upper Intermediate', '2021-10-30 13:46:02', '2021-10-30 13:46:02'),
(164, 74, 'Spanish', 'B1: Intermediate', '2021-11-04 05:36:50', '2021-11-04 05:36:50'),
(167, 64, 'French', 'B2: Upper Intermediate', '2021-11-08 02:26:39', '2021-11-08 02:26:39'),
(168, 75, 'French', 'B1: Intermediate', '2021-11-15 00:09:29', '2021-11-15 00:09:29'),
(174, 79, 'French', 'A1: Begineer', '2021-11-18 00:24:21', '2021-11-18 00:24:21'),
(175, 76, 'English', 'B1: Intermediate', '2021-11-25 05:26:17', '2021-11-25 05:26:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timezone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('student','tutor','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  `calendar_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `timezone`, `remember_token`, `role`, `calendar_id`, `created_at`, `updated_at`) VALUES
(39, 'Admin', 'admin', 'admin@languagelad.com', NULL, '$2y$10$iG/umFrLqOFKD.SnNjnp9.cCgY3oGXlRwlCJV8ofJ2EyKNxh.VvqK', NULL, NULL, 'admin', NULL, '2021-08-13 14:07:19', '2021-08-13 14:07:19'),
(40, 'Test Student a', 'test-student-a', 'teststudent1@gmail.com', NULL, '$2y$10$ebb9jUdBGdfaNm7j.SiUYOhHdcihQJq0RZrhTsC0uoD2BchD7ntza', 'Europe/Moscow', NULL, 'student', NULL, '2021-08-13 14:11:14', '2021-09-22 06:48:13'),
(41, 'Test Teacher a', 'test-teacher-a', 'testteacher1@gmail.com', NULL, '$2y$10$eWeEMRqtVWP206vN10veEODtc1tMrzS.QJAzPH1umVuQyxc4j.1Cy', 'Europe/London', NULL, 'tutor', NULL, '2021-08-13 14:13:10', '2021-10-11 05:27:02'),
(42, 'Test Teacher b', 'test-teacher-bIMk', 'testteacher2@gmail.com', NULL, '$2y$10$VuaNHf/FklJeiSAwHLMFlepRqqK2j7sxe7drUhsSnjQ6ZTCKFmZUq', 'Asia/Baghdad', NULL, 'tutor', NULL, '2021-08-13 14:21:17', '2021-10-11 05:27:02'),
(43, 'Test Teacher c', 'test-teacher-c', 'testteacher3@gmail.com', NULL, '$2y$10$WsI.xVALp35duqM8dgZKWOp4E9HRM2EwTLxCyXXEbBR4zltAGAMqq', 'Europe/London', NULL, 'tutor', NULL, '2021-08-13 14:30:05', '2021-10-11 05:27:02'),
(44, 'Test Teacher d', 'test-teacher-dBYH', 'testteacher4@gmail.com', NULL, '$2y$10$91uMWzVUQdo00ivu0vXV8.DyzH1sUzaIvuieGJ.LzrkqWPUqLjWNu', 'Asia/Calcutta', NULL, 'tutor', NULL, '2021-08-13 14:36:13', '2021-10-11 05:27:02'),
(45, 'Test Teacher e', 'test-teacher-eztq', 'testteacher5@gmail.com', NULL, '$2y$10$Axen0g0kxtmMG.BUh0VB4.dJVKOSOo/PB5ElcJCFMrob/HR0ro.QK', 'America/Chihuahua', NULL, 'tutor', NULL, '2021-08-13 14:43:21', '2021-08-28 02:29:21'),
(46, 'Test Student b', 'test-student-bo46', 'teststudent2@gmail.com', NULL, '$2y$10$gNklg85CYtpq8v6VjB7GuOC6D.luzT/oxBy/VHjF1Z8UaRSn47NdC', 'America/Managua', NULL, 'student', NULL, '2021-08-13 14:49:00', '2021-08-28 02:29:21'),
(47, 'Test Student c', 'test-student-cLmI', 'teststudent3@gmail.com', '2021-08-23 00:26:18', '$2y$10$sLqEUPhnRfsH.tZnRL3Nfe4Nxvr9spmH7UYA.PKhbPBhh/f3mDWra', 'America/Chihuahua', NULL, 'student', NULL, '2021-08-23 00:25:17', '2021-08-28 02:29:21'),
(48, 'Test Teacher Five', 'test-teacher-fiveXaa', 'Testteacher6@gmail.com', NULL, '$2y$10$hyJzPsBpe7ChzZYzA5HtvuZvj/9mzPptoQ414znuKPTz2R3DUyXo2', 'America/Chihuahua', NULL, 'tutor', NULL, '2021-08-27 12:38:27', '2021-10-11 05:27:02'),
(49, 'Test Teacher Seven', 'test-teacher-sevenTs7', 'testteacher7@gmail.com', NULL, '$2y$10$.9W.TfjJcSa02tY6qk.1teGrQC94NKdWybP54F9esjBI7UUUL19rG', 'Australia/Hobart', NULL, 'tutor', NULL, '2021-08-28 04:11:08', '2021-10-11 05:27:02'),
(50, 'Test Teacher Eight', 'test-teacher-eightGow', 'testeacher8@gmail.com', NULL, '$2y$10$2gorYSh.Qg8xBbGpqCQJr.7sU26AY9IbJQNFOpSgCuArH.VsCpY3i', 'Europe/Prague', NULL, 'tutor', NULL, '2021-08-28 05:01:22', '2021-10-11 05:27:02'),
(51, 'Test student five', 'test-student-five1dW', 'teststudent5@gmail.com', NULL, '$2y$10$limbOeyZFohpByVNwRodRuzRgDkIh2oeYWGjglHfboRXPDZyRHK4e', 'US/Arizona', NULL, 'student', NULL, '2021-08-28 11:10:30', '2021-08-28 11:10:30'),
(52, 'Test Teacher Nine', 'test-teacher-nineAv5', 'testteacher9@gmail.com', NULL, '$2y$10$aVIJHBPj5Aq/T9kRdELOne7XU0CUabyUptzZFrzA8sY8iJIH9rPYq', 'America/Chihuahua', NULL, 'tutor', NULL, '2021-08-28 11:17:55', '2021-10-11 05:27:02'),
(53, 'Test Teacher Eleven', 'test-teacher-eleven7Te', 'testteacher11@gmail.com', NULL, '$2y$10$VeNtvz0od0R2hnOzcQsfIe5R0RlHZO969Bjh6AYChTPFfvsZNqd66', 'America/Mazatlan', NULL, 'tutor', NULL, '2021-09-03 08:14:10', '2021-10-11 05:27:02'),
(55, 'Test Student Eleven', 'test-student-eleven0Tt', 'teststudent11@gmail.com', NULL, '$2y$10$23tuJNP56LeyujtnZKWdUu1tSIH6y4TjQ8.qfJ/fxngRj6hVWv7g6', 'Asia/Karachi', NULL, 'student', NULL, '2021-09-16 23:31:14', '2021-09-16 23:31:14'),
(56, 'Test Student TwentyOne', 'test-student-twentyonepFg', 'teststudent21@gmail.com', NULL, '$2y$10$Gz630zzD//gaqu8e50MiX.gpXubxnYM7l4/cnSxuthRN.0LEK2Kz2', 'Europe/Moscow', NULL, 'student', NULL, '2021-09-24 00:54:29', '2021-09-24 00:54:29'),
(57, 'Test User thirty one', 'test-user-thirty-one0MY', 'testuserthirtyone@gmail.com', NULL, '$2y$10$nq4IrM06Pmav7YJhK51roeR6C/Czn2kaeuKYd4IM8IgnQSF5jCLQm', 'America/Managua', NULL, 'student', NULL, '2021-09-29 04:51:34', '2021-09-29 04:51:34'),
(58, 'Test Teacher Thirty One', 'test-teacher-thirty-one', 'testteacher31@gmail.com', NULL, '$2y$10$xTlS/UxfLkxfB5P2K/OAi.aEdHrWTdj/cQrfGRNH5skIOh3npBIQS', 'Asia/Muscat', NULL, 'tutor', NULL, '2021-10-04 02:26:23', '2021-10-24 23:55:07'),
(59, 'Test Teacher Trial One', 'test-teacher-trial-one8yi', 'testteachertrial1@gmail.com', NULL, '$2y$10$BQOf7HrhWyjswBQPauPILOL8oqKOi/YT4fbP9YaWVRU.e1bFIYxOO', 'America/Tijuana', NULL, 'tutor', NULL, '2021-10-07 01:58:00', '2021-10-11 05:27:02'),
(60, 'Test Teacher Trial Two', 'test-teacher-trial-twoh5a', 'testteachertrial2@gmail.com', NULL, '$2y$10$z4AyBPjLtpV7pSjOwAtAc.hE0nFC7LDtfL./OJ6u.2zPDpTeXo9gG', 'America/Chihuahua', NULL, 'tutor', NULL, '2021-10-07 02:31:07', '2021-10-11 05:27:02'),
(61, 'Test Student Tone', 'test-student-toneruF', 'teststudent31@gmail.com', NULL, '$2y$10$Z6vB7LDrtq4GzqOsiMj9zue4tdtuBkJp0efdru6U5zuuzptEQ21KS', 'US/Central', NULL, 'student', NULL, '2021-10-14 00:30:54', '2021-10-14 00:30:54'),
(62, 'Test User Fone', 'test-user-fonewRy', 'testuser41@gmail.com', NULL, '$2y$10$QufKSFEwESV2OKu5Ec67OelINBco8sLOPOjq1rGP4qUuGgTS2Rsva', 'Canada/Atlantic', NULL, 'student', NULL, '2021-10-18 05:46:02', '2021-10-18 05:46:02'),
(63, 'Test Student Sone', 'test-student-sone', 'teststudent61@gmail.com', '2021-11-04 07:05:42', '$2y$10$nW2ar9ZjTnsfZwsjhoG5UOkf0DKHzicHGqVP.gXB/E0qpAkHUabmS', 'Europe/Madrid', NULL, 'student', NULL, '2021-10-24 23:48:34', '2021-11-08 02:25:03'),
(64, 'Test Teacher Sone', 'test-teacher-sone', 'testteacher61@gmail.com', '2021-11-04 00:42:18', '$2y$10$L5x0V/SL2GYNQ2fadrheGuAwkEcXDnmSh4uqnTjhbyGh7na9UTxDa', 'Europe/Madrid', NULL, 'tutor', NULL, '2021-10-24 23:56:27', '2021-11-08 02:26:39'),
(65, 'Test Student SeOne', 'test-student-seonevwF', 'teststudent71@gmail.com', NULL, '$2y$10$be1YtCQFTsas4zqWdP9/OOt3azHkum6uBrW5u0afNLUckZMJBLxWC', 'Asia/Karachi', NULL, 'student', NULL, '2021-10-27 07:10:32', '2021-10-27 07:10:32'),
(66, 'David Zurita', 'david-zuritaNIc', 'david.zurita.s@gmail.com', '2021-10-30 13:42:03', '$2y$10$9YTLyyieZYR6xck7173.Te5dDqZul5LFvgXK2mYqnCZqwZZs9Ebrm', 'Europe/Madrid', NULL, 'tutor', NULL, '2021-10-30 13:41:24', '2021-10-30 13:42:03'),
(68, 'Jose', 'jose', 'lacosadelumbral@gmail.com', '2021-10-30 14:18:21', '$2y$10$/Jg5cL6ZUeVyPQQRokhxQerk3/G.c62ed8LYTwHYk5SzpR5ZbjP2C', 'Asia/Hong_Kong', NULL, 'student', NULL, '2021-10-30 14:18:06', '2021-11-01 23:01:56'),
(70, 'olia', 'olia', 'olia.ostt@gmail.com', '2021-11-01 20:40:46', '$2y$10$wEqlZxuuPnY3O3EL5m6jwu3qlhz8Ql4Ii1Bx0uOsHk.7/0lyyj0be', 'Asia/Taipei', NULL, 'student', NULL, '2021-11-01 20:38:49', '2021-11-01 21:20:45'),
(71, 'Test Teacher Delete', 'test-teacher-delete', 'testteacher@delete.com', '2021-11-02 05:37:54', '$2y$10$8mGVFaOsz12J2YIiV6H1QespuPl4ezG07RhCV1vJ3OM7jHvy4s2.S', 'Europe/London', NULL, 'tutor', NULL, '2021-11-02 05:37:27', '2021-11-03 06:09:54'),
(72, 'Test Student None', 'test-student-none', 'teststudent91@gmail.com', '2021-11-03 04:42:05', '$2y$10$xDI0rNyubL/2TDhKsX5r4.c7bhfoPC0U254mvpb238nPahlf5IL2K', 'Asia/Tokyo', NULL, 'student', NULL, '2021-11-03 04:39:40', '2021-11-03 06:18:46'),
(73, 'Testksjd', 'testksjdTlt', 'kljldsf!@gmail.com', NULL, '$2y$10$sTSzzsfA3udsgzcYCPNmAuKuqa4HGI5HMjL3v0ervdWrP0gZWhIjy', 'America/Monterrey', NULL, 'tutor', NULL, '2021-11-04 05:20:15', '2021-11-04 05:20:15'),
(74, 'lskdkfj jsldkfk', 'lskdkfj-jsldkfkNjC', 'lsdfj@gmail.com', '2021-11-04 05:35:50', '$2y$10$H7KiCk1ygZfxmIUAqm6Q7.y6XgSBhW8Ru0M88vXQkOl5YkhrsqDy.', 'America/Chihuahua', NULL, 'tutor', NULL, '2021-11-04 05:27:26', '2021-11-04 05:35:50'),
(75, 'Test Teacher Nfour', 'test-teacher-nfourOsj', 'testteacher94@gmail.com', '2021-11-15 00:04:13', '$2y$10$MArfkmjxig6Nz73rl.7KH.wLjFm1Bpfrrz85k8gs/jNSLsUZtR3te', 'Europe/London', NULL, 'tutor', NULL, '2021-11-14 23:55:53', '2021-11-15 00:04:13'),
(76, 'Test Teacher Ntwo', 'test-teacher-noneyj8', 'testteacher92@gmail.com', '2021-11-17 04:16:53', '$2y$10$BS2hcbQRYaIeY59WUQ5K1epvOzdAUfN3RHC2.1MB8d6.zg7lzwUF.', 'Asia/Karachi', 'pdPhWf5YbqjxCuAbcnU0fe9Rs13e4fSmhH5UKWahdLYnXi7k0ztNru4MMD16', 'tutor', NULL, '2021-11-17 04:13:57', '2021-11-25 05:26:17'),
(77, 'Test Student Nthree', 'test-student-nthree', 'testteacher93@gmail.com', '2021-11-17 04:30:53', '$2y$10$oKiTvkLQUo9HzY27F.vX0.MvXt9zF5aJGLPr8L/w5YGren5j8q4Mi', 'Asia/Karachi', NULL, 'student', NULL, '2021-11-17 04:30:30', '2021-11-17 04:52:07'),
(78, 'Test Student Ntwo', 'test-student-ntwo', 'teststudent92@gmail.com', '2021-11-17 10:37:37', '$2y$10$eWPR.uKn1QOOq6gvKAq6su4NQzKwzq4t.X3ew7DkHNs9ss.8kBEvC', 'Asia/Magadan', NULL, 'student', NULL, '2021-11-17 10:36:36', '2021-11-29 07:49:16'),
(79, 'Test Teacher ThirtyFour', 'test-teacher-thirtyfourRj3', 'testteacher34@gmail.com', '2021-11-18 00:23:45', '$2y$10$zIBUe0UH9eH/EpaKMlM02OHEPV.fXpdORyfDf6RQxEVHbFdXe5zkO', 'America/Managua', NULL, 'tutor', NULL, '2021-11-18 00:20:56', '2021-11-18 00:23:45'),
(80, 'Test Eips', 'test-eipsiZF', 'tikhonovat@eiibps.com', NULL, '$2y$10$3sqUpUpE/B8wmrBYd1ZnCOo1PF/Dm8wrEr.wa/GQR98Gn2LOWQno2', 'US/Alaska', NULL, 'student', NULL, '2021-11-29 06:34:54', '2021-11-29 06:34:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_requests`
--
ALTER TABLE `booking_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_requests_student_id_foreign` (`student_id`),
  ADD KEY `booking_requests_tutor_id_foreign` (`tutor_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`iso`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `day_slots`
--
ALTER TABLE `day_slots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `day_slots_time_table_id_foreign` (`time_table_id`),
  ADD KEY `day_slots_tutor_id_foreign` (`tutor_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `integrations`
--
ALTER TABLE `integrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stripe_transfers`
--
ALTER TABLE `stripe_transfers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stripe_transfers_tutor_id_foreign` (`tutor_id`);

--
-- Indexes for table `student_packages`
--
ALTER TABLE `student_packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_packages_tutor_id_foreign` (`tutor_id`),
  ADD KEY `student_packages_student_id_foreign` (`student_id`),
  ADD KEY `student_packages_tutor_lesson_id_foreign` (`tutor_lesson_id`),
  ADD KEY `student_packages_tutor_lesson_package_id_foreign` (`tutor_lesson_package_id`);

--
-- Indexes for table `student_profiles`
--
ALTER TABLE `student_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `student_speaks`
--
ALTER TABLE `student_speaks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_speaks_student_id_foreign` (`student_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timezone`
--
ALTER TABLE `timezone`
  ADD PRIMARY KEY (`country_code`,`timezone`);

--
-- Indexes for table `time_tables`
--
ALTER TABLE `time_tables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `time_tables_tutor_id_foreign` (`tutor_id`);

--
-- Indexes for table `time_zones`
--
ALTER TABLE `time_zones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_booking_request_id_foreign` (`booking_request_id`),
  ADD KEY `transactions_tutor_id_foreign` (`tutor_id`),
  ADD KEY `transactions_student_id_foreign` (`student_id`),
  ADD KEY `transactions_trial_class_id_foreign` (`trial_class_id`);

--
-- Indexes for table `trial_classes`
--
ALTER TABLE `trial_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trial_classes_tutor_id_foreign` (`tutor_id`),
  ADD KEY `trial_classes_student_id_foreign` (`student_id`);

--
-- Indexes for table `tutor_certificates`
--
ALTER TABLE `tutor_certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutor_certificates_tutor_id_foreign` (`tutor_id`);

--
-- Indexes for table `tutor_education`
--
ALTER TABLE `tutor_education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutor_education_tutor_id_foreign` (`tutor_id`);

--
-- Indexes for table `tutor_experiences`
--
ALTER TABLE `tutor_experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutor_experiences_tutor_id_foreign` (`tutor_id`);

--
-- Indexes for table `tutor_lessons`
--
ALTER TABLE `tutor_lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutor_lessons_tutor_id_foreign` (`tutor_id`);

--
-- Indexes for table `tutor_lesson_packages`
--
ALTER TABLE `tutor_lesson_packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutor_lesson_packages_tutor_id_foreign` (`tutor_id`),
  ADD KEY `tutor_lesson_packages_tutor_lesson_id_foreign` (`tutor_lesson_id`);

--
-- Indexes for table `tutor_profiles`
--
ALTER TABLE `tutor_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutor_profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `tutor_reviews`
--
ALTER TABLE `tutor_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutor_reviews_booking_request_id_foreign` (`booking_request_id`),
  ADD KEY `tutor_reviews_trial_class_id_foreign` (`trial_class_id`),
  ADD KEY `tutor_reviews_tutor_id_foreign` (`tutor_id`),
  ADD KEY `tutor_reviews_student_id_foreign` (`student_id`);

--
-- Indexes for table `tutor_speaks`
--
ALTER TABLE `tutor_speaks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutor_speaks_tutor_id_foreign` (`tutor_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_requests`
--
ALTER TABLE `booking_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `day_slots`
--
ALTER TABLE `day_slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `integrations`
--
ALTER TABLE `integrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stripe_transfers`
--
ALTER TABLE `stripe_transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_packages`
--
ALTER TABLE `student_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `student_profiles`
--
ALTER TABLE `student_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `student_speaks`
--
ALTER TABLE `student_speaks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `time_tables`
--
ALTER TABLE `time_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `time_zones`
--
ALTER TABLE `time_zones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `trial_classes`
--
ALTER TABLE `trial_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tutor_certificates`
--
ALTER TABLE `tutor_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tutor_education`
--
ALTER TABLE `tutor_education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tutor_experiences`
--
ALTER TABLE `tutor_experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tutor_lessons`
--
ALTER TABLE `tutor_lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tutor_lesson_packages`
--
ALTER TABLE `tutor_lesson_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT for table `tutor_profiles`
--
ALTER TABLE `tutor_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tutor_reviews`
--
ALTER TABLE `tutor_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tutor_speaks`
--
ALTER TABLE `tutor_speaks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_requests`
--
ALTER TABLE `booking_requests`
  ADD CONSTRAINT `booking_requests_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_requests_tutor_id_foreign` FOREIGN KEY (`tutor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `day_slots`
--
ALTER TABLE `day_slots`
  ADD CONSTRAINT `day_slots_time_table_id_foreign` FOREIGN KEY (`time_table_id`) REFERENCES `time_tables` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `day_slots_tutor_id_foreign` FOREIGN KEY (`tutor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stripe_transfers`
--
ALTER TABLE `stripe_transfers`
  ADD CONSTRAINT `stripe_transfers_tutor_id_foreign` FOREIGN KEY (`tutor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_packages`
--
ALTER TABLE `student_packages`
  ADD CONSTRAINT `student_packages_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_packages_tutor_id_foreign` FOREIGN KEY (`tutor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_packages_tutor_lesson_id_foreign` FOREIGN KEY (`tutor_lesson_id`) REFERENCES `tutor_lessons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_packages_tutor_lesson_package_id_foreign` FOREIGN KEY (`tutor_lesson_package_id`) REFERENCES `tutor_lesson_packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_profiles`
--
ALTER TABLE `student_profiles`
  ADD CONSTRAINT `student_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_speaks`
--
ALTER TABLE `student_speaks`
  ADD CONSTRAINT `student_speaks_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `time_tables`
--
ALTER TABLE `time_tables`
  ADD CONSTRAINT `time_tables_tutor_id_foreign` FOREIGN KEY (`tutor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_booking_request_id_foreign` FOREIGN KEY (`booking_request_id`) REFERENCES `booking_requests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_trial_class_id_foreign` FOREIGN KEY (`trial_class_id`) REFERENCES `trial_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_tutor_id_foreign` FOREIGN KEY (`tutor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `trial_classes`
--
ALTER TABLE `trial_classes`
  ADD CONSTRAINT `trial_classes_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `trial_classes_tutor_id_foreign` FOREIGN KEY (`tutor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tutor_certificates`
--
ALTER TABLE `tutor_certificates`
  ADD CONSTRAINT `tutor_certificates_tutor_id_foreign` FOREIGN KEY (`tutor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tutor_education`
--
ALTER TABLE `tutor_education`
  ADD CONSTRAINT `tutor_education_tutor_id_foreign` FOREIGN KEY (`tutor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tutor_experiences`
--
ALTER TABLE `tutor_experiences`
  ADD CONSTRAINT `tutor_experiences_tutor_id_foreign` FOREIGN KEY (`tutor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tutor_lessons`
--
ALTER TABLE `tutor_lessons`
  ADD CONSTRAINT `tutor_lessons_tutor_id_foreign` FOREIGN KEY (`tutor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tutor_lesson_packages`
--
ALTER TABLE `tutor_lesson_packages`
  ADD CONSTRAINT `tutor_lesson_packages_tutor_id_foreign` FOREIGN KEY (`tutor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tutor_lesson_packages_tutor_lesson_id_foreign` FOREIGN KEY (`tutor_lesson_id`) REFERENCES `tutor_lessons` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tutor_profiles`
--
ALTER TABLE `tutor_profiles`
  ADD CONSTRAINT `tutor_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tutor_reviews`
--
ALTER TABLE `tutor_reviews`
  ADD CONSTRAINT `tutor_reviews_booking_request_id_foreign` FOREIGN KEY (`booking_request_id`) REFERENCES `booking_requests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tutor_reviews_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tutor_reviews_trial_class_id_foreign` FOREIGN KEY (`trial_class_id`) REFERENCES `trial_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tutor_reviews_tutor_id_foreign` FOREIGN KEY (`tutor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tutor_speaks`
--
ALTER TABLE `tutor_speaks`
  ADD CONSTRAINT `tutor_speaks_tutor_id_foreign` FOREIGN KEY (`tutor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
