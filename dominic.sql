-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 09, 2020 at 03:50 PM
-- Server version: 5.7.29-0ubuntu0.16.04.1
-- PHP Version: 7.2.28-3+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dominic`
--

-- --------------------------------------------------------

--
-- Table structure for table `country_code`
--

CREATE TABLE `country_code` (
  `countrycode` char(3) NOT NULL,
  `countryname` varchar(200) NOT NULL,
  `code` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country_code`
--

INSERT INTO `country_code` (`countrycode`, `countryname`, `code`) VALUES
('ABW', 'Aruba', 'AW'),
('AFG', 'Afghanistan', 'AF'),
('AGO', 'Angola', 'AO'),
('AIA', 'Anguilla', 'AI'),
('ALA', 'Åland', 'AX'),
('ALB', 'Albania', 'AL'),
('AND', 'Andorra', 'AD'),
('ARE', 'United Arab Emirates', 'AE'),
('ARG', 'Argentina', 'AR'),
('ARM', 'Armenia', 'AM'),
('ASM', 'American Samoa', 'AS'),
('ATA', 'Antarctica', 'AQ'),
('ATF', 'French Southern Territories', 'TF'),
('ATG', 'Antigua and Barbuda', 'AG'),
('AUS', 'Australia', 'AU'),
('AUT', 'Austria', 'AT'),
('AZE', 'Azerbaijan', 'AZ'),
('BDI', 'Burundi', 'BI'),
('BEL', 'Belgium', 'BE'),
('BEN', 'Benin', 'BJ'),
('BES', 'Bonaire', 'BQ'),
('BFA', 'Burkina Faso', 'BF'),
('BGD', 'Bangladesh', 'BD'),
('BGR', 'Bulgaria', 'BG'),
('BHR', 'Bahrain', 'BH'),
('BHS', 'Bahamas', 'BS'),
('BIH', 'Bosnia and Herzegovina', 'BA'),
('BLM', 'Saint Barthélemy', 'BL'),
('BLR', 'Belarus', 'BY'),
('BLZ', 'Belize', 'BZ'),
('BMU', 'Bermuda', 'BM'),
('BOL', 'Bolivia', 'BO'),
('BRA', 'Brazil', 'BR'),
('BRB', 'Barbados', 'BB'),
('BRN', 'Brunei', 'BN'),
('BTN', 'Bhutan', 'BT'),
('BVT', 'Bouvet Island', 'BV'),
('BWA', 'Botswana', 'BW'),
('CAF', 'Central African Republic', 'CF'),
('CAN', 'Canada', 'CA'),
('CCK', 'Cocos [Keeling] Islands', 'CC'),
('CHE', 'Switzerland', 'CH'),
('CHL', 'Chile', 'CL'),
('CHN', 'China', 'CN'),
('CIV', 'Ivory Coast', 'CI'),
('CMR', 'Cameroon', 'CM'),
('COD', 'Democratic Republic of the Congo', 'CD'),
('COG', 'Republic of the Congo', 'CG'),
('COK', 'Cook Islands', 'CK'),
('COL', 'Colombia', 'CO'),
('COM', 'Comoros', 'KM'),
('CPV', 'Cape Verde', 'CV'),
('CRI', 'Costa Rica', 'CR'),
('CUB', 'Cuba', 'CU'),
('CUW', 'Curacao', 'CW'),
('CXR', 'Christmas Island', 'CX'),
('CYM', 'Cayman Islands', 'KY'),
('CYP', 'Cyprus', 'CY'),
('CZE', 'Czech Republic', 'CZ'),
('DEU', 'Germany', 'DE'),
('DJI', 'Djibouti', 'DJ'),
('DMA', 'Dominica', 'DM'),
('DNK', 'Denmark', 'DK'),
('DOM', 'Dominican Republic', 'DO'),
('DZA', 'Algeria', 'DZ'),
('ECU', 'Ecuador', 'EC'),
('EGY', 'Egypt', 'EG'),
('ERI', 'Eritrea', 'ER'),
('ESH', 'Western Sahara', 'EH'),
('ESP', 'Spain', 'ES'),
('EST', 'Estonia', 'EE'),
('ETH', 'Ethiopia', 'ET'),
('FIN', 'Finland', 'FI'),
('FJI', 'Fiji', 'FJ'),
('FLK', 'Falkland Islands', 'FK'),
('FRA', 'France', 'FR'),
('FRO', 'Faroe Islands', 'FO'),
('FSM', 'Micronesia', 'FM'),
('GAB', 'Gabon', 'GA'),
('GBR', 'United Kingdom', 'GB'),
('GEO', 'Georgia', 'GE'),
('GGY', 'Guernsey', 'GG'),
('GHA', 'Ghana', 'GH'),
('GIB', 'Gibraltar', 'GI'),
('GIN', 'Guinea', 'GN'),
('GLP', 'Guadeloupe', 'GP'),
('GMB', 'Gambia', 'GM'),
('GNB', 'Guinea-Bissau', 'GW'),
('GNQ', 'Equatorial Guinea', 'GQ'),
('GRC', 'Greece', 'GR'),
('GRD', 'Grenada', 'GD'),
('GRL', 'Greenland', 'GL'),
('GTM', 'Guatemala', 'GT'),
('GUF', 'French Guiana', 'GF'),
('GUM', 'Guam', 'GU'),
('GUY', 'Guyana', 'GY'),
('HKG', 'Hong Kong', 'HK'),
('HMD', 'Heard Island and McDonald Islands', 'HM'),
('HND', 'Honduras', 'HN'),
('HRV', 'Croatia', 'HR'),
('HTI', 'Haiti', 'HT'),
('HUN', 'Hungary', 'HU'),
('IDN', 'Indonesia', 'ID'),
('IMN', 'Isle of Man', 'IM'),
('IND', 'India', 'IN'),
('IOT', 'British Indian Ocean Territory', 'IO'),
('IRL', 'Ireland', 'IE'),
('IRN', 'Iran', 'IR'),
('IRQ', 'Iraq', 'IQ'),
('ISL', 'Iceland', 'IS'),
('ISR', 'Israel', 'IL'),
('ITA', 'Italy', 'IT'),
('JAM', 'Jamaica', 'JM'),
('JEY', 'Jersey', 'JE'),
('JOR', 'Jordan', 'JO'),
('JPN', 'Japan', 'JP'),
('KAZ', 'Kazakhstan', 'KZ'),
('KEN', 'Kenya', 'KE'),
('KGZ', 'Kyrgyzstan', 'KG'),
('KHM', 'Cambodia', 'KH'),
('KIR', 'Kiribati', 'KI'),
('KNA', 'Saint Kitts and Nevis', 'KN'),
('KOR', 'South Korea', 'KR'),
('KWT', 'Kuwait', 'KW'),
('LAO', 'Laos', 'LA'),
('LBN', 'Lebanon', 'LB'),
('LBR', 'Liberia', 'LR'),
('LBY', 'Libya', 'LY'),
('LCA', 'Saint Lucia', 'LC'),
('LIE', 'Liechtenstein', 'LI'),
('LKA', 'Sri Lanka', 'LK'),
('LSO', 'Lesotho', 'LS'),
('LTU', 'Lithuania', 'LT'),
('LUX', 'Luxembourg', 'LU'),
('LVA', 'Latvia', 'LV'),
('MAC', 'Macao', 'MO'),
('MAF', 'Saint Martin', 'MF'),
('MAR', 'Morocco', 'MA'),
('MCO', 'Monaco', 'MC'),
('MDA', 'Moldova', 'MD'),
('MDG', 'Madagascar', 'MG'),
('MDV', 'Maldives', 'MV'),
('MEX', 'Mexico', 'MX'),
('MHL', 'Marshall Islands', 'MH'),
('MKD', 'Macedonia', 'MK'),
('MLI', 'Mali', 'ML'),
('MLT', 'Malta', 'MT'),
('MMR', 'Myanmar [Burma]', 'MM'),
('MNE', 'Montenegro', 'ME'),
('MNG', 'Mongolia', 'MN'),
('MNP', 'Northern Mariana Islands', 'MP'),
('MOZ', 'Mozambique', 'MZ'),
('MRT', 'Mauritania', 'MR'),
('MSR', 'Montserrat', 'MS'),
('MTQ', 'Martinique', 'MQ'),
('MUS', 'Mauritius', 'MU'),
('MWI', 'Malawi', 'MW'),
('MYS', 'Malaysia', 'MY'),
('MYT', 'Mayotte', 'YT'),
('NAM', 'Namibia', 'NA'),
('NCL', 'New Caledonia', 'NC'),
('NER', 'Niger', 'NE'),
('NFK', 'Norfolk Island', 'NF'),
('NGA', 'Nigeria', 'NG'),
('NIC', 'Nicaragua', 'NI'),
('NIU', 'Niue', 'NU'),
('NLD', 'Netherlands', 'NL'),
('NOR', 'Norway', 'NO'),
('NPL', 'Nepal', 'NP'),
('NRU', 'Nauru', 'NR'),
('NZL', 'New Zealand', 'NZ'),
('OMN', 'Oman', 'OM'),
('PAK', 'Pakistan', 'PK'),
('PAN', 'Panama', 'PA'),
('PCN', 'Pitcairn Islands', 'PN'),
('PER', 'Peru', 'PE'),
('PHL', 'Philippines', 'PH'),
('PLW', 'Palau', 'PW'),
('PNG', 'Papua New Guinea', 'PG'),
('POL', 'Poland', 'PL'),
('PRI', 'Puerto Rico', 'PR'),
('PRK', 'North Korea', 'KP'),
('PRT', 'Portugal', 'PT'),
('PRY', 'Paraguay', 'PY'),
('PSE', 'Palestine', 'PS'),
('PYF', 'French Polynesia', 'PF'),
('QAT', 'Qatar', 'QA'),
('REU', 'Réunion', 'RE'),
('ROU', 'Romania', 'RO'),
('RUS', 'Russia', 'RU'),
('RWA', 'Rwanda', 'RW'),
('SAU', 'Saudi Arabia', 'SA'),
('SDN', 'Sudan', 'SD'),
('SEN', 'Senegal', 'SN'),
('SGP', 'Singapore', 'SG'),
('SGS', 'South Georgia and the South Sandwich Islands', 'GS'),
('SHN', 'Saint Helena', 'SH'),
('SJM', 'Svalbard and Jan Mayen', 'SJ'),
('SLB', 'Solomon Islands', 'SB'),
('SLE', 'Sierra Leone', 'SL'),
('SLV', 'El Salvador', 'SV'),
('SMR', 'San Marino', 'SM'),
('SOM', 'Somalia', 'SO'),
('SPM', 'Saint Pierre and Miquelon', 'PM'),
('SRB', 'Serbia', 'RS'),
('SSD', 'South Sudan', 'SS'),
('STP', 'São Tomé and Príncipe', 'ST'),
('SUR', 'Suriname', 'SR'),
('SVK', 'Slovakia', 'SK'),
('SVN', 'Slovenia', 'SI'),
('SWE', 'Sweden', 'SE'),
('SWZ', 'Swaziland', 'SZ'),
('SXM', 'Sint Maarten', 'SX'),
('SYC', 'Seychelles', 'SC'),
('SYR', 'Syria', 'SY'),
('TCA', 'Turks and Caicos Islands', 'TC'),
('TCD', 'Chad', 'TD'),
('TGO', 'Togo', 'TG'),
('THA', 'Thailand', 'TH'),
('TJK', 'Tajikistan', 'TJ'),
('TKL', 'Tokelau', 'TK'),
('TKM', 'Turkmenistan', 'TM'),
('TLS', 'East Timor', 'TL'),
('TON', 'Tonga', 'TO'),
('TTO', 'Trinidad and Tobago', 'TT'),
('TUN', 'Tunisia', 'TN'),
('TUR', 'Turkey', 'TR'),
('TUV', 'Tuvalu', 'TV'),
('TWN', 'Taiwan', 'TW'),
('TZA', 'Tanzania', 'TZ'),
('UGA', 'Uganda', 'UG'),
('UKR', 'Ukraine', 'UA'),
('UMI', 'U.S. Minor Outlying Islands', 'UM'),
('URY', 'Uruguay', 'UY'),
('USA', 'United States', 'US'),
('UZB', 'Uzbekistan', 'UZ'),
('VAT', 'Vatican City', 'VA'),
('VCT', 'Saint Vincent and the Grenadines', 'VC'),
('VEN', 'Venezuela', 'VE'),
('VGB', 'British Virgin Islands', 'VG'),
('VIR', 'U.S. Virgin Islands', 'VI'),
('VNM', 'Vietnam', 'VN'),
('VUT', 'Vanuatu', 'VU'),
('WLF', 'Wallis and Futuna', 'WF'),
('WSM', 'Samoa', 'WS'),
('XKX', 'Kosovo', 'XK'),
('YEM', 'Yemen', 'YE'),
('ZAF', 'South Africa', 'ZA'),
('ZMB', 'Zambia', 'ZM'),
('ZWE', 'Zimbabwe', 'ZW');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(27, '2014_10_12_000000_create_users_table', 1),
(28, '2014_10_12_100000_create_password_resets_table', 1),
(29, '2020_02_26_064857_create_parents_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('test34@yopmail.com', '$2y$10$NhjB7mbosGODaO9fLev1cuH0p5kr2daNQm6g8eDLxGZXcIRTVpNni', '2020-03-04 08:41:39'),
('test12@yopmail.com', '$2y$10$E5yNrEIMOd4yktbO3TnESeE39tHAZUI2PQH5T.HiMsh/rB/4A0jda', '2020-03-05 01:54:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) DEFAULT NULL COMMENT '1=>admin, 2=>parent, 3=>coach, 4=>child',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `town` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `county` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `first_name`, `last_name`, `gender`, `date_of_birth`, `address`, `town`, `postcode`, `county`, `country`, `phone_number`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'User', 'male', '2020-03-11', '#1758/10', 'Ele street', 'se13ha', 'qq', 'qq', '1234567890', 'admin@admin.com', NULL, '$2y$10$KHTzdMfe/2Ob3kLTDkcEAuyT/HK97gc.K9.jI3s4rdknwZcYiJQjq', NULL, '2020-03-02 06:50:26', '2020-03-02 06:50:26'),
(2, 2, 'parent', 'user', 'male', '2020-03-11', '#1310/10', 'abc street', 'se13aa', 'qq', 'qq', '1234567890', 'parentuser@yopmail.com', NULL, '$2y$10$KHTzdMfe/2Ob3kLTDkcEAuyT/HK97gc.K9.jI3s4rdknwZcYiJQjq', NULL, '2020-03-02 06:50:26', '2020-03-02 06:50:26'),
(3, 3, 'coach', 'user', 'male', '2020-03-11', '#789/4', 'xyz street', 'se13aa', 'qq', 'qq', '1234567890', 'coachuser@yopmail.com', NULL, '$2y$10$KHTzdMfe/2Ob3kLTDkcEAuyT/HK97gc.K9.jI3s4rdknwZcYiJQjq', NULL, '2020-03-02 06:50:26', '2020-03-02 06:50:26'),
(4, 4, 'child', 'user', 'male', '2020-03-11', '#789/4', 'iop street', 'se15aa', 'qq', 'qq', '1234567890', 'childuser@yopmail.com', NULL, '$2y$10$KHTzdMfe/2Ob3kLTDkcEAuyT/HK97gc.K9.jI3s4rdknwZcYiJQjq', NULL, '2020-03-02 06:50:26', '2020-03-02 06:50:26'),
(5, 3, 'yy', 'yy', 'male', '2020-03-19', '666', '666', '2222', '232', '222', '12345678900', 'test12@yopmail.com', NULL, '$2y$10$KPPsXmWqXk.DTBOAlLcf8.bVeeMjsu6ShIl.mUCqJBjwbELlOu4kO', 'rPzrehqvwnOZxlN8315NLZAMbp8346ZXcCr8g1bCs673mRbke1w9ycvSYvjR', '2020-03-04 00:43:20', '2020-03-05 00:50:04'),
(6, 2, 'test', 'team', 'male', '2020-03-18', 'test', 'test', '12345', 'des', 'fd', '12345678900', 'test34@yopmail.com', NULL, '$2y$10$PGOvxDomeggBv8mH4Z4oEeb7LXM2rz4VrKNkCISj8IsJgb3WjNEfO', NULL, '2020-03-04 01:05:39', '2020-03-04 01:05:39'),
(7, 2, 'Monika', 'Sharma', 'female', '2020-03-27', '#1943/89', 'test', '12345', 'test', 'test', '12345678900', 'monika94@yopmail.com', NULL, '$2y$10$KHTzdMfe/2Ob3kLTDkcEAuyT/HK97gc.K9.jI3s4rdknwZcYiJQjq', NULL, '2020-03-04 07:21:04', '2020-03-04 07:21:04'),
(8, 2, 'fdh', 'hgk', 'male', '2020-03-03', 'gfj', 'fdhj', 'gyklh', 'bnhk', 'gj', '123456789000', 'admin@gmail.com', NULL, '$2y$10$tGQTxip9AITHf5DbyK44c.Kgu6nhzFeJFH72pGjvZTdCm/rFCBgvS', NULL, '2020-03-06 04:56:40', '2020-03-06 04:56:40'),
(9, 2, 'tt', 'tt', 'male', '2020-03-19', 'tt', 'tt', 'tt', 'tt', 'Anguilla', '12345678900', 'test@tt.tt', NULL, '$2y$10$6lrc4m8ZtPG4FFkTgX6fU.bholi8pVqe8a.RiJovxcY78gyPcfnqC', NULL, '2020-03-09 03:45:25', '2020-03-09 03:45:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', '2020-03-01 18:30:00', '2020-02-29 18:30:00'),
(2, 'parent', 'Parent', '2020-03-01 18:30:00', '2020-02-29 18:30:00'),
(3, 'coach', 'Coach', '2020-03-01 18:30:00', '2020-02-29 18:30:00'),
(4, 'child', 'Child', '2020-03-01 18:30:00', '2020-03-01 18:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country_code`
--
ALTER TABLE `country_code`
  ADD PRIMARY KEY (`countrycode`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
