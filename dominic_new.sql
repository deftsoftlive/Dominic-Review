-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 20, 2020 at 05:38 PM
-- Server version: 5.7.29-0ubuntu0.16.04.1
-- PHP Version: 7.2.28-3+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dominic_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `accordians`
--

CREATE TABLE `accordians` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accordians`
--

INSERT INTO `accordians` (`id`, `slug`, `page_title`, `title`, `description`, `pdf`, `color`, `status`, `created_at`, `updated_at`) VALUES
(2, 'football-coaching-with-drh', 'course-listing/football', 'FOOTBALL COACHING WITH DRH', 'DRH Sports has teamed up with the MK City Colts FC to offer not just fantastic junior football coaching, but to provide a seamless link into teams and competition', '1584699280.pdf', NULL, 1, '2020-03-20 04:44:40', '2020-03-20 04:44:40'),
(3, 'tennis-coaching-with-drh', 'course-listing/tennis', 'TENNIS COACHING WITH DRH', 'DRH Sports has teamed up with the MK City Colts FC to offer not just fantastic junior football coaching, but to provide a seamless link into teams and competition', '1584700286.pdf', NULL, 1, '2020-03-20 05:01:26', '2020-03-20 06:36:43'),
(4, 'coaching-with-drh', 'course-listing', 'Coaching with DRH', 'DRH Sports has teamed up with the MK City Colts FC to offer not just fantastic junior football coaching, but to provide a seamless link into teams and competition.', '1584704789.pdf', NULL, 1, '2020-03-20 06:16:29', '2020-03-20 06:36:09'),
(5, 'how-our-courses-run', 'course-listing/tennis', 'How our courses run', 'bla bla', '1584705058.pdf', NULL, 1, '2020-03-20 06:20:58', '2020-03-20 06:20:58');

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `name`, `description`, `slug`, `image`, `type`, `status`, `created_at`, `updated_at`) VALUES
(4, 'ame', 'descf', 'amen', NULL, 'game', 1, '2019-11-13 04:30:49', '2019-12-24 02:44:17'),
(6, 'Bride dressing are wrwqwertwq', 'Bride\'s dressing', 'ames', NULL, 'amenity', 1, '2019-11-13 04:34:50', '2019-12-05 07:38:32'),
(7, 'kabull', 'History (from Greek ἱστορία, historia, meaning \'inquiry; knowledge acquired by investigation\') is the past as it is described in written documents, and the study thereof. Events occurr', 'ne', NULL, 'game', 1, '2019-11-13 04:43:32', '2019-11-21 00:43:04'),
(8, 'Ceremony arch', 'Ceremony arch', 'gg', NULL, 'amenity', 1, '2019-11-13 04:43:45', '2019-12-24 02:40:46'),
(9, 'Dance floor', 'Dance floor', 'sds', NULL, 'amenity', 1, '2019-11-15 04:18:56', '2019-12-24 02:40:49'),
(10, 'Tables and chairs', 'Tables and chairs provided', 'sds-1', NULL, 'amenity', 0, '2019-11-15 04:19:13', '2019-12-24 08:32:22'),
(11, 'Groom dressing area', 'Groom\'s dressing area', 'dsfsdf', NULL, 'amenity', 1, '2019-11-15 04:46:34', '2019-11-20 02:34:01'),
(12, 'Bed1', '!!! URGENT: I pulled a link from my', 'bed1', NULL, 'game', 1, '2019-11-18 04:49:47', '2019-11-19 03:48:54'),
(13, 'Bed2', 'By the end of the fourth millennium BC.', 'bed2', NULL, 'game', 0, '2019-11-18 04:50:23', '2019-11-19 03:52:03'),
(14, 'Roomss', 'India\'s history and cultur civilization.', 'room', NULL, 'amenity', 0, '2019-11-19 03:47:40', '2019-11-21 00:40:23'),
(15, 'Outdoor', 'Golf.\r\nHorseshoes.\r\nCornhole.\r\nFishing Tournament.\r\nWasher Toss.', 'outdoor', NULL, 'amenity', 1, '2019-12-05 04:57:52', '2019-12-05 04:58:21'),
(16, 'GOLf', '5, 2018 - Top 50 Outdoor Games List. Disc Golf. Horseshoes. Cornhole. Fishing Tournament. Washer Toss. Paintball. Marco Polo. Chicken (in a pool, not on a tractor like in Footloose)', 'golf', NULL, 'game', 0, '2019-12-05 04:59:13', '2019-12-24 08:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nokia', 1, '2020-01-31 02:28:02', '2020-01-31 04:29:05'),
(2, 'Samsung', 1, '2020-01-31 02:28:13', '2020-01-31 03:36:36'),
(3, 'Mi', 0, '2020-01-31 03:04:28', '2020-01-31 03:36:48'),
(4, 'Vivo', 1, '2020-01-31 03:04:39', '2020-01-31 04:28:53'),
(5, 'Oppo', 1, '2020-01-31 03:04:43', '2020-01-31 03:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent` int(11) DEFAULT '0',
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subparent` int(11) DEFAULT '0',
  `sorting` int(11) DEFAULT '0',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `capacity` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_type` int(11) NOT NULL DEFAULT '1',
  `meta_tag` text COLLATE utf8mb4_unicode_ci,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci,
  `featured` int(11) DEFAULT '0',
  `template_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent`, `label`, `subparent`, `sorting`, `slug`, `status`, `capacity`, `created_at`, `updated_at`, `description`, `image`, `thumbnail_image`, `meta_title`, `color`, `cover_type`, `meta_tag`, `meta_description`, `featured`, `template_id`) VALUES
(1, 0, 'Photography', 0, 23, 'photography', 1, 0, '2019-11-09 02:43:13', '2020-03-05 06:27:04', NULL, 'images/categories/15743400105v2qXkoiDtFtn0gWQT1g-photography.png', '', 'photography', '#ff80c0', 1, 'photography', 'photography', 0, 1),
(2, 8, 'Cateringss', 0, 1, 'catering', 1, 0, '2019-11-09 03:28:53', '2019-11-18 09:52:14', NULL, 'images/categories/1574071913C7jokbqSIC1l9G0G99FC-2faf1563b9868cea2b35d9345c68c77d.jpg', 'images/categories/1574071913dffkUcobysb0AhTRmTsd-167958.jpg', 'photography', '#ff8040', 1, 'photography', 'kgiuiu', 1, 1),
(3, 2, 'Food', 0, 2, 'food', 1, 0, '2019-11-09 03:41:39', '2019-11-13 05:21:43', NULL, '', '', 'huh', '', 1, 'ljoj', 'hgigy', 0, 1),
(4, 2, 'Demo', 0, 1, 'demo', 1, 0, '2019-11-09 03:44:29', '2019-11-13 05:21:43', NULL, '', '', 'Test', '', 1, 'Test', 'Test', 0, 1),
(5, 0, 'Transportation', 0, 1, 'transportation', 0, 0, '2019-11-13 02:48:49', '2020-03-03 06:58:45', NULL, 'images/categories/157433882640bPU2ByR2dPRT7yYPmB-transportation.png', '', 'Transportation', '#ff8040', 1, 'Transportation', 'Transportation', 1, 1),
(6, 0, 'Balloons', 0, 4, 'balloons', 1, 0, '2019-11-13 02:49:07', '2020-01-16 04:28:59', NULL, 'images/categories/1574338883As2ZWsXRGbdg8HhrcA2l-balloons.png', '', 'Balloons', '#ff8040', 1, 'Balloons', 'Balloons', 1, 1),
(7, 0, 'Bands', 0, 24, 'bands', 1, 0, '2019-11-13 02:49:22', '2020-03-05 06:27:04', NULL, 'images/categories/1574338845Ft52x3r4UsopztpEpzKA-band.png', '', 'Bands', '#ff8040', 1, 'Bands', 'Bands', 1, 1),
(8, 0, 'Catering/ Beverages', 0, 27, 'catering-beverages', 1, 0, '2019-11-13 02:49:53', '2020-03-05 06:27:04', NULL, 'images/categories/15743388746aYwytATTpiwln8JgO1l-catering.png', '', 'Catering/ Beverages', '#ff8040', 1, 'Catering/ Beverages', 'Catering/ Beverages', 1, 1),
(9, 0, 'Churches/Temples', 0, 12, 'churches-temples', 1, 0, '2019-11-13 02:50:23', '2020-01-16 04:28:59', NULL, 'images/categories/15743388975Lo3RUq2ORffCzrIn3ES-church.png', '', 'Churches/Temples', '#ff8000', 1, 'Churches/Temples', 'Churches/Temples', 1, 1),
(10, 6, 'Musicians/Instrumentalist', 0, 1, 'musicians-instrumentalist', 1, 0, '2019-11-13 02:50:46', '2020-01-15 07:50:38', NULL, 'images/categories/1574338997zHC6WEdhupjPoMfdptdB-musician.png', '', 'Musicians/Instrumentalist', '#ff8040', 1, 'Musicians/Instrumentalist', 'Musicians/Instrumentalist', 1, 1),
(11, 0, 'Venues', 0, 29, 'venues', 1, 1, '2019-11-13 02:51:29', '2020-03-05 06:27:04', NULL, 'images/categories/1574340571KoXV6BcmL7FtmiqzGJCy-venue.png', '', 'Venues', '#00ff00', 1, 'Venues', 'Venues', 1, 1),
(12, 0, 'Flowers/Florist', 0, 30, 'flowers-florist', 1, 0, '2019-11-13 02:51:44', '2020-03-05 06:27:04', NULL, 'images/categories/1574338941zjFl0RTRQa4urXRVqZaw-florist.png', '', 'Flowers/Florist', '#0080ff', 1, 'Flowers/Florist', 'Flowers/Florist', 1, 1),
(13, 0, 'Clothing/Dressing and Jewelries', 0, 14, 'clothing-dressing-and-jewelries', 0, 0, '2019-11-13 02:52:02', '2020-01-16 04:28:59', NULL, 'images/categories/15743147966MV8ioeX3sYpcqvg155J-162958.jpg', '', 'Clothing', '#80ffff', 1, 'Clothing/Dressing and Jewelries', 'Clothing/Dressing and Jewelries', 1, 1),
(14, 0, 'Beauty and Health', 0, 2, 'beauty-and-health', 1, 0, '2019-11-13 02:52:35', '2020-03-03 06:58:45', NULL, 'images/categories/1574340548WcIrYQEN4PSQezJc2tif-entertainers2.png', '', 'Beauty and Health', '#ff80c0', 1, 'Beauty and Health', 'Beauty and Health', 1, 1),
(15, 0, 'Staffing/Officiants', 0, 16, 'staffing-officiants', 1, 0, '2019-11-13 02:52:54', '2020-01-16 04:28:59', NULL, 'images/categories/1574339014DCigHI8pGlmLvmvy1pDn-staffing.png', '', 'Staffing/Officiants', '#80ffff', 1, 'Staffing/Officiants', 'Staffing/Officiants', 1, 1),
(16, 0, 'Photography/Videography', 0, 25, 'photography-videography', 1, 0, '2019-11-13 02:53:14', '2020-03-05 06:27:04', NULL, 'images/categories/1574340612LaVErx8mUMnl3hyDiHp2-videography.png', '', 'Photography/Videography', '#ff80ff', 1, 'Photography/Videography', 'Photography/Videography', 1, 1),
(17, 0, 'Party/Event Rental', 0, 9, 'party-event-rental', 1, 0, '2019-11-13 02:53:35', '2020-01-16 04:28:59', NULL, 'images/categories/15743390710Ro5L21ODtO9epoSDl4M-party-rental.png', '', 'Party/Event Rental', '#ff80ff', 1, 'Party/Event Rental', 'Party/Event Rental', 1, 1),
(18, 0, 'DJ/Entertainment/MC', 0, 10, 'dj-entertainment-mc', 1, 0, '2019-11-13 02:56:51', '2020-01-16 04:28:59', NULL, 'images/categories/1574339085ukuq313vmLuiahg25Yai-DJ.png', '', 'DJ/Entertainment/MC', '#ff80c0', 2, 'DJ/Entertainment/MC', 'DJ/Entertainment/MC', 1, 1),
(19, 0, 'Entertainer', 0, 11, 'entertainer', 1, 0, '2019-11-13 03:33:22', '2020-01-16 04:28:59', NULL, 'images/categories/15743391119xZNxqPtq1sVkDFA6CoQ-entertainers.png', '', 'Entertainer', '#00ff40', 1, 'Entertainer', 'Entertainer', 1, 1),
(20, 0, 'Event Planner', 0, 13, 'event-planner', 1, 0, '2019-11-13 03:34:21', '2020-01-16 04:28:59', NULL, 'images/categories/1574339133CJtGgkOlGdtRvuXmyF1k-entertainers2.png', '', 'Event Planner', '#ff8040', 1, 'Event Planner', 'Event Planner', 1, 1),
(21, 0, 'Funeral Service', 0, 15, 'funeral-service', 1, 0, '2019-11-13 03:34:36', '2020-01-16 04:28:59', NULL, 'images/categories/1574339197L4GqIvvm4Oid7vnlVcmO-florist.png', '', 'Funeral Service', '#ff0000', 1, 'Funeral Service', 'Funeral Service', 1, 1),
(22, 0, 'Printing/Stationary Services', 0, 17, 'printing-stationary-services', 1, 0, '2019-11-13 03:34:51', '2020-03-05 05:32:58', NULL, 'images/categories/15743404078k4fedURqsU2RwVPvBQE-printing.png', '', 'Printing/Stationary Services', '#ff8080', 1, 'Printing/Stationary Services', 'Printing/Stationary Services', 1, 1),
(23, 0, 'Lodging', 0, 18, 'lodging', 1, 0, '2019-11-13 03:35:02', '2020-01-16 04:28:59', NULL, 'images/categories/1574339946c55TKH0QzOHK2GRoq554-lodging.png', '', 'Lodging', '#ffff80', 1, 'Lodging', 'Lodging', 1, 1),
(24, 13, 'Cake', 0, 1, 'cake', 0, 0, '2019-11-13 03:35:12', '2020-01-16 04:25:02', NULL, 'images/categories/1574240469F63ls8aI3ygV7cnB8vxz-162958.jpg', '', 'Cake', '#ff0000', 1, 'Cake', 'Cake', 1, 1),
(25, 0, 'Decoration', 0, 19, 'decoration', 1, 0, '2019-11-13 03:35:23', '2020-01-16 04:28:59', NULL, 'images/categories/1574339960iBUOm0yNMRU16xAEJQDX-decoration.png', '', 'Decoration', '#ff80ff', 1, 'Decoration', 'Decoration', 1, 1),
(26, 0, 'Favors/Gift Registry', 0, 21, 'favors-gift-registry', 1, 0, '2019-11-13 03:35:38', '2020-01-16 04:28:59', NULL, 'images/categories/1574339974JyKWQ6DgYIT7r2VL0WXd-gifts.png', '', 'Favors/Gift Registry', '#0080ff', 1, 'Favors/Gift Registry', 'Favors/Gift Registry', 1, 1),
(27, 0, 'SECURITY', 0, 28, 'security', 1, 0, '2019-11-13 03:35:52', '2020-03-05 06:27:04', NULL, 'images/categories/15743399888soBNff6Zohuwf7dS0NJ-security2.png', '', 'SECURITY', '#80ffff', 1, 'SECURITY', 'SECURITY', 1, 1),
(28, 0, 'Sam', 0, 5, 'sam', 1, 0, '2019-11-13 10:36:27', '2019-12-18 04:22:33', NULL, 'images/categories/15743388561XqhzKceY675FsChfYKO-band2.png', '', 'Sam', '#ff8040', 1, 'Sam', 'Sam', 1, 1),
(29, 1, 'Photographers', 0, 1, 'demoo', 1, 0, '2019-11-14 05:03:12', '2020-03-05 06:27:04', NULL, '', '', 'sads', '#80ffff', 1, 'sdds', 'sdds', 0, 1),
(30, 1, 'Professional Photographers', 0, 5, 'demmo2', 1, 0, '2019-11-14 05:03:54', '2020-03-05 06:27:04', NULL, '', '', 'ses', '#ff8040', 1, 'sddssd', 'sdddddd', 0, 1),
(31, 6, 'Parent', 0, 2, 'parentcategory', 0, 0, '2019-11-15 04:12:46', '2020-01-22 04:37:18', NULL, 'images/categories/1574256910AdkpUtPl3yUSI01kzwZb-dries-augustyns-58ASFVAP2Y4-unsplash.png', 'images/categories/1574068648dKhoF4UWzKOtpexI0C7f-162958.jpg', 'Love', '#ff8040', 1, 'Always', '•	Price should say: Factor in the costs of materials and labor, plus any related business expenses. Consider the total price buyers will pay too—including shipping.\r\n\r\n•	Quantity: For quantities greater than one, this listing will renew automatically until you remove the product manually.', 1, 1),
(32, 31, 'ChildCategoryOne', 0, 1, 'childcategoryone', 1, 0, '2019-11-15 04:13:45', '2019-11-15 04:13:58', NULL, '', '', 'Test', '', 1, 'Test', 'Test', 1, 1),
(33, 0, 'category', 0, 7, 'category', 0, 0, '2019-11-18 04:40:10', '2020-01-16 04:25:49', NULL, 'images/categories/1574071810xXRXBhmUjmxnpJK55Cnw-162958.jpg', 'images/categories/1574071810hQyNwDAQBCLLAD8QI5Dg-167958.jpg', 'alwaysss', '', 1, 'sparrow', '!!! URGENT: I pulled a link from my history and it took me straight to the back end of the portal. This is a huge security problem. People login always has to be required!!!\r\nI suggest you place a small text under each field to guide the vendors through the process just like we did with other fields', 1, 1),
(34, 0, 'Event category', 0, 3, 'event-category', 0, 0, '2019-11-19 01:28:57', '2020-01-16 04:28:59', NULL, 'images/categories/1574314841E0CfEogVI4aByjqFMTY3-162958.jpg', 'images/categories/1574146737JMJEFKSdT7wZpkGxEbwE-162958.jpg', 'Jassi', '#ff8080', 1, 'JASSI12', 'India\'s history and culture is dynamic, spanning back to the beginning of human civilization. It begins with a mysterious culture along the Indus River and in farming communities in the southern lands of India. ... By the end of the fourth millennium BC, India had emerged as a region of highly developed civilization.', 1, 1),
(35, 0, 'Wedding Photographer', 0, 6, 'wedding-photographer', 0, 0, '2019-11-19 05:26:39', '2020-01-16 04:28:14', NULL, '', '', 'Wedding Photographer', '#eda208', 1, 'Wedding Photographer', 'Wedding Photographer', 1, 1),
(36, 1, 'Event Photographer', 0, 2, 'event-photographer', 1, 0, '2019-11-19 05:26:59', '2020-03-05 06:27:04', NULL, '', '', 'Event Photographer', '#eda208', 1, 'Event Photographer', 'Event Photographer', 0, 1),
(37, 1, 'Portrait Photographer', 0, 4, 'portrait-photographer', 1, 0, '2019-11-19 05:27:22', '2020-03-05 06:27:04', NULL, '', '', 'Portrait Photographer', '#eda208', 1, 'Portrait Photographer', 'Portrait Photographer', 0, 1),
(38, 1, 'Product Photographer', 0, 3, 'product-photographer', 1, 0, '2019-11-19 05:27:39', '2020-03-05 06:27:04', NULL, '', '', 'Product Photographer', '#eda208', 1, 'Product Photographer', 'Product Photographer', 0, 1),
(39, 0, 'Aerial Photographer', 0, 31, 'aerial-photographer', 0, 0, '2019-11-19 05:28:03', '2020-03-05 06:27:04', NULL, '', '', 'Aerial Photographer', '#eda208', 1, 'Aerial Photographer', 'Aerial Photographer', 0, 1),
(40, 0, 'Boudoir Photographer', 0, 32, 'boudoir-photographer', 0, 0, '2019-11-19 05:28:20', '2020-03-05 06:27:04', NULL, '', '', 'Boudoir Photographer', '#eda208', 1, 'Boudoir Photographer', 'Boudoir Photographer', 0, 1),
(41, 0, 'Sammy', 0, 33, 'sammy', 1, 0, '2019-11-19 05:52:46', '2020-03-05 06:27:04', NULL, 'images/categories/1574162585bMLKCNv4sUhDZDM39u0f-band.png', '', 'Sammy', '#eda208', 1, 'Sammy', 'Sammy', 0, 1),
(42, 0, 'Cake Shop', 0, 20, 'cake-shop', 0, 0, '2019-11-20 03:16:01', '2020-01-16 04:28:59', NULL, 'images/categories/1574239561Dsj1Fhax8VobJI3KNprn-wp3276805-pubg-4k-wallpapers.jpg', '', 'Cakesss', '#ff0000', 1, 'Cake121', 'A cake can be decorated with a photograph by printing the photograph onto an edible icing sheet and then setting the sheet on the desired portion of the cake. The ink used for printing the photograph on the edible icing ...', 0, 1),
(43, 0, 'test cat001 name', 0, 8, 'test-cat001-name', 0, 0, '2019-11-20 08:04:19', '2020-01-16 04:28:59', NULL, 'images/categories/1574256925IY43SgxOfewhaXwMw0QK-dries-augustyns-58ASFVAP2Y4-unsplash.png', '', 'test cat  titla', '#eda208', 1, 'new tag', 'desc', 0, 1),
(44, 0, 'Lights', 0, 22, 'lights', 0, 0, '2019-11-21 07:32:57', '2020-01-16 04:29:53', NULL, 'images/categories/1574341377swECw7z4VJqUU75EzrYx--dsc2796_15_68762.jpg', '', 'men-long-sleeve-shirts', '#eda208', 1, 'men-long-sleeve-shirts', 'sdsds', 0, 1),
(45, 0, 'Ballonss', 0, 26, 'ballonss', 0, 1, '2019-12-05 04:51:52', '2020-03-05 06:27:04', NULL, 'images/categories/1575541383lITC0JkHkJwUD8L2C58TBallons.jpg', '', 'Birthday Party', '#17dd1d', 2, 'PARTY   1', 'Balloons can brighten up any event, any day, and make things more fun! Here are 25 fun things to do with balloons that will bring a smile to your face.', 0, 1),
(46, 11, 'Amazing Venue', 0, 1, 'amazing-venue', 1, 1, '2019-12-23 07:48:40', '2020-01-15 07:50:45', NULL, 'images/categories/1577107120SW6W9qvJByPDFbYIUfW6t20_1312238515529Pwc10011.jpg', '', 'Test', '#eda208', 1, 'Test', 'Test', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_variations`
--

CREATE TABLE `category_variations` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_variations`
--

INSERT INTO `category_variations` (`id`, `parent`, `category_id`, `variant_id`, `type`, `created_at`, `updated_at`) VALUES
(105, NULL, 7, 7, 'game', '2019-11-13 09:15:12', '2019-11-13 09:15:12'),
(121, NULL, 5, 1, 'event', '2019-11-13 09:16:13', '2019-11-13 09:16:13'),
(122, NULL, 5, 4, 'amenity', '2019-11-13 09:16:13', '2019-11-13 09:16:13'),
(123, NULL, 5, 7, 'game', '2019-11-13 09:16:13', '2019-11-13 09:16:13'),
(125, NULL, 8, 7, 'event', '2019-11-13 09:16:26', '2019-11-13 09:16:26'),
(126, NULL, 8, 6, 'amenity', '2019-11-13 09:16:26', '2019-11-13 09:16:26'),
(127, NULL, 8, 7, 'game', '2019-11-13 09:16:26', '2019-11-13 09:16:26'),
(238, NULL, 31, 1, 'event', '2019-11-15 10:34:36', '2019-11-15 10:34:36'),
(239, NULL, 31, 9, 'event', '2019-11-15 10:34:37', '2019-11-15 10:34:37'),
(240, NULL, 31, 6, 'amenity', '2019-11-15 10:34:37', '2019-11-15 10:34:37'),
(241, NULL, 31, 8, 'amenity', '2019-11-15 10:34:37', '2019-11-15 10:34:37'),
(242, NULL, 31, 9, 'amenity', '2019-11-15 10:34:37', '2019-11-15 10:34:37'),
(243, NULL, 31, 10, 'amenity', '2019-11-15 10:34:37', '2019-11-15 10:34:37'),
(244, NULL, 31, 4, 'game', '2019-11-15 10:34:37', '2019-11-15 10:34:37'),
(245, NULL, 31, 7, 'game', '2019-11-15 10:34:37', '2019-11-15 10:34:37'),
(246, NULL, 31, 1, 'seasons', '2019-11-15 10:34:37', '2019-11-15 10:34:37'),
(247, NULL, 31, 2, 'seasons', '2019-11-15 10:34:37', '2019-11-15 10:34:37'),
(324, NULL, 6, 2, 'event', '2019-11-18 05:22:54', '2019-11-18 05:22:54'),
(325, NULL, 6, 10, 'amenity', '2019-11-18 05:22:55', '2019-11-18 05:22:55'),
(326, NULL, 6, 12, 'amenity', '2019-11-18 05:22:55', '2019-11-18 05:22:55'),
(327, NULL, 6, 4, 'game', '2019-11-18 05:22:55', '2019-11-18 05:22:55'),
(328, NULL, 6, 13, 'game', '2019-11-18 05:22:55', '2019-11-18 05:22:55'),
(329, NULL, 6, 2, 'seasons', '2019-11-18 05:22:55', '2019-11-18 05:22:55'),
(330, NULL, 6, 3, 'seasons', '2019-11-18 05:22:55', '2019-11-18 05:22:55'),
(351, NULL, 18, 1, 'event', '2019-11-21 07:27:37', '2019-11-21 07:27:37'),
(352, NULL, 18, 2, 'event', '2019-11-21 07:27:37', '2019-11-21 07:27:37'),
(353, NULL, 18, 3, 'event', '2019-11-21 07:27:38', '2019-11-21 07:27:38'),
(354, NULL, 18, 5, 'event', '2019-11-21 07:27:38', '2019-11-21 07:27:38'),
(355, NULL, 18, 6, 'event', '2019-11-21 07:27:38', '2019-11-21 07:27:38'),
(356, NULL, 18, 9, 'event', '2019-11-21 07:27:38', '2019-11-21 07:27:38'),
(357, NULL, 18, 10, 'event', '2019-11-21 07:27:38', '2019-11-21 07:27:38'),
(358, NULL, 18, 11, 'event', '2019-11-21 07:27:38', '2019-11-21 07:27:38'),
(359, NULL, 18, 14, 'event', '2019-11-21 07:27:38', '2019-11-21 07:27:38'),
(360, NULL, 18, 10, 'amenity', '2019-11-21 07:27:38', '2019-11-21 07:27:38'),
(361, NULL, 18, 11, 'amenity', '2019-11-21 07:27:38', '2019-11-21 07:27:38'),
(362, NULL, 18, 4, 'game', '2019-11-21 07:27:38', '2019-11-21 07:27:38'),
(363, NULL, 18, 7, 'game', '2019-11-21 07:27:38', '2019-11-21 07:27:38'),
(364, NULL, 18, 12, 'game', '2019-11-21 07:27:38', '2019-11-21 07:27:38'),
(365, NULL, 18, 1, 'seasons', '2019-11-21 07:27:38', '2019-11-21 07:27:38'),
(366, NULL, 18, 3, 'seasons', '2019-11-21 07:27:38', '2019-11-21 07:27:38'),
(367, NULL, 18, 4, 'seasons', '2019-11-21 07:27:38', '2019-11-21 07:27:38'),
(368, NULL, 25, 1, 'event', '2019-11-26 01:08:52', '2019-11-26 01:08:52'),
(369, NULL, 25, 2, 'event', '2019-11-26 01:08:52', '2019-11-26 01:08:52'),
(370, NULL, 25, 10, 'amenity', '2019-11-26 01:08:52', '2019-11-26 01:08:52'),
(371, NULL, 25, 11, 'amenity', '2019-11-26 01:08:52', '2019-11-26 01:08:52'),
(372, NULL, 25, 4, 'game', '2019-11-26 01:08:52', '2019-11-26 01:08:52'),
(373, NULL, 25, 7, 'game', '2019-11-26 01:08:52', '2019-11-26 01:08:52'),
(374, NULL, 25, 4, 'seasons', '2019-11-26 01:08:52', '2019-11-26 01:08:52'),
(897, NULL, 16, 1, 'event', '2019-12-18 03:01:24', '2019-12-18 03:01:24'),
(898, NULL, 16, 6, 'amenity', '2019-12-18 03:01:24', '2019-12-18 03:01:24'),
(899, NULL, 16, 4, 'game', '2019-12-18 03:01:25', '2019-12-18 03:01:25'),
(900, NULL, 16, 7, 'game', '2019-12-18 03:01:25', '2019-12-18 03:01:25'),
(901, NULL, 16, 2, 'seasons', '2019-12-18 03:01:25', '2019-12-18 03:01:25'),
(902, NULL, 16, 3, 'seasons', '2019-12-18 03:01:25', '2019-12-18 03:01:25'),
(903, NULL, 16, 4, 'seasons', '2019-12-18 03:01:25', '2019-12-18 03:01:25'),
(904, NULL, 16, 5, 'seasons', '2019-12-18 03:01:25', '2019-12-18 03:01:25'),
(1011, NULL, 41, 5, 'event', '2019-12-20 06:47:16', '2019-12-20 06:47:16'),
(1012, NULL, 41, 6, 'event', '2019-12-20 06:47:16', '2019-12-20 06:47:16'),
(1013, NULL, 41, 9, 'event', '2019-12-20 06:47:16', '2019-12-20 06:47:16'),
(1014, NULL, 41, 10, 'amenity', '2019-12-20 06:47:16', '2019-12-20 06:47:16'),
(1015, NULL, 41, 4, 'game', '2019-12-20 06:47:16', '2019-12-20 06:47:16'),
(1016, NULL, 41, 3, 'seasons', '2019-12-20 06:47:16', '2019-12-20 06:47:16'),
(1017, NULL, 41, 4, 'seasons', '2019-12-20 06:47:16', '2019-12-20 06:47:16'),
(1018, NULL, 11, 2, 'event', '2019-12-23 08:05:44', '2019-12-23 08:05:44'),
(1019, NULL, 11, 3, 'event', '2019-12-23 08:05:44', '2019-12-23 08:05:44'),
(1020, NULL, 11, 5, 'event', '2019-12-23 08:05:44', '2019-12-23 08:05:44'),
(1021, NULL, 11, 6, 'event', '2019-12-23 08:05:44', '2019-12-23 08:05:44'),
(1022, NULL, 11, 10, 'event', '2019-12-23 08:05:44', '2019-12-23 08:05:44'),
(1023, NULL, 11, 11, 'event', '2019-12-23 08:05:44', '2019-12-23 08:05:44'),
(1024, NULL, 11, 17, 'event', '2019-12-23 08:05:44', '2019-12-23 08:05:44'),
(1025, NULL, 11, 6, 'amenity', '2019-12-23 08:05:44', '2019-12-23 08:05:44'),
(1026, NULL, 11, 10, 'amenity', '2019-12-23 08:05:44', '2019-12-23 08:05:44'),
(1027, NULL, 11, 11, 'amenity', '2019-12-23 08:05:44', '2019-12-23 08:05:44'),
(1028, NULL, 11, 15, 'amenity', '2019-12-23 08:05:44', '2019-12-23 08:05:44'),
(1029, NULL, 11, 4, 'game', '2019-12-23 08:05:44', '2019-12-23 08:05:44'),
(1030, NULL, 11, 7, 'game', '2019-12-23 08:05:44', '2019-12-23 08:05:44'),
(1031, NULL, 11, 12, 'game', '2019-12-23 08:05:45', '2019-12-23 08:05:45'),
(1032, NULL, 11, 16, 'game', '2019-12-23 08:05:45', '2019-12-23 08:05:45'),
(1033, NULL, 11, 1, 'seasons', '2019-12-23 08:05:45', '2019-12-23 08:05:45'),
(1034, NULL, 11, 2, 'seasons', '2019-12-23 08:05:45', '2019-12-23 08:05:45'),
(1035, NULL, 11, 3, 'seasons', '2019-12-23 08:05:45', '2019-12-23 08:05:45'),
(1036, NULL, 11, 4, 'seasons', '2019-12-23 08:05:45', '2019-12-23 08:05:45'),
(1037, NULL, 11, 5, 'seasons', '2019-12-23 08:05:45', '2019-12-23 08:05:45'),
(1038, NULL, 20, 2, 'event', '2019-12-24 04:05:29', '2019-12-24 04:05:29'),
(1039, NULL, 20, 3, 'event', '2019-12-24 04:05:29', '2019-12-24 04:05:29'),
(1040, NULL, 20, 5, 'event', '2019-12-24 04:05:29', '2019-12-24 04:05:29'),
(1041, NULL, 20, 6, 'event', '2019-12-24 04:05:29', '2019-12-24 04:05:29'),
(1042, NULL, 20, 11, 'event', '2019-12-24 04:05:29', '2019-12-24 04:05:29'),
(1043, NULL, 20, 17, 'event', '2019-12-24 04:05:29', '2019-12-24 04:05:29'),
(1044, NULL, 20, 6, 'amenity', '2019-12-24 04:05:29', '2019-12-24 04:05:29'),
(1045, NULL, 20, 8, 'amenity', '2019-12-24 04:05:29', '2019-12-24 04:05:29'),
(1046, NULL, 20, 9, 'amenity', '2019-12-24 04:05:29', '2019-12-24 04:05:29'),
(1047, NULL, 20, 10, 'amenity', '2019-12-24 04:05:29', '2019-12-24 04:05:29'),
(1048, NULL, 20, 11, 'amenity', '2019-12-24 04:05:29', '2019-12-24 04:05:29'),
(1049, NULL, 20, 15, 'amenity', '2019-12-24 04:05:29', '2019-12-24 04:05:29'),
(1050, NULL, 20, 4, 'game', '2019-12-24 04:05:30', '2019-12-24 04:05:30'),
(1051, NULL, 20, 7, 'game', '2019-12-24 04:05:30', '2019-12-24 04:05:30'),
(1052, NULL, 20, 12, 'game', '2019-12-24 04:05:30', '2019-12-24 04:05:30'),
(1053, NULL, 20, 16, 'game', '2019-12-24 04:05:30', '2019-12-24 04:05:30'),
(1054, NULL, 20, 1, 'seasons', '2019-12-24 04:05:30', '2019-12-24 04:05:30'),
(1055, NULL, 20, 2, 'seasons', '2019-12-24 04:05:30', '2019-12-24 04:05:30'),
(1056, NULL, 20, 3, 'seasons', '2019-12-24 04:05:30', '2019-12-24 04:05:30'),
(1057, NULL, 20, 4, 'seasons', '2019-12-24 04:05:30', '2019-12-24 04:05:30'),
(1058, NULL, 20, 5, 'seasons', '2019-12-24 04:05:30', '2019-12-24 04:05:30'),
(1059, NULL, 1, 2, 'event', '2020-01-08 03:59:58', '2020-01-08 03:59:58'),
(1060, NULL, 1, 3, 'event', '2020-01-08 03:59:58', '2020-01-08 03:59:58'),
(1061, NULL, 1, 5, 'event', '2020-01-08 03:59:58', '2020-01-08 03:59:58'),
(1062, NULL, 1, 6, 'event', '2020-01-08 03:59:58', '2020-01-08 03:59:58'),
(1063, NULL, 1, 11, 'event', '2020-01-08 03:59:58', '2020-01-08 03:59:58'),
(1064, NULL, 1, 17, 'event', '2020-01-08 03:59:58', '2020-01-08 03:59:58'),
(1065, NULL, 1, 6, 'amenity', '2020-01-08 03:59:58', '2020-01-08 03:59:58'),
(1066, NULL, 1, 11, 'amenity', '2020-01-08 03:59:58', '2020-01-08 03:59:58'),
(1067, NULL, 1, 15, 'amenity', '2020-01-08 03:59:58', '2020-01-08 03:59:58'),
(1068, NULL, 1, 4, 'game', '2020-01-08 03:59:58', '2020-01-08 03:59:58'),
(1069, NULL, 1, 12, 'game', '2020-01-08 03:59:59', '2020-01-08 03:59:59'),
(1070, NULL, 1, 2, 'seasons', '2020-01-08 03:59:59', '2020-01-08 03:59:59'),
(1071, NULL, 1, 3, 'seasons', '2020-01-08 03:59:59', '2020-01-08 03:59:59'),
(1072, NULL, 1, 4, 'seasons', '2020-01-08 03:59:59', '2020-01-08 03:59:59'),
(1073, NULL, 1, 5, 'seasons', '2020-01-08 03:59:59', '2020-01-08 03:59:59'),
(1074, NULL, 12, 2, 'event', '2020-01-09 07:40:27', '2020-01-09 07:40:27'),
(1075, NULL, 12, 3, 'event', '2020-01-09 07:40:27', '2020-01-09 07:40:27'),
(1076, NULL, 12, 5, 'event', '2020-01-09 07:40:27', '2020-01-09 07:40:27'),
(1077, NULL, 12, 6, 'event', '2020-01-09 07:40:27', '2020-01-09 07:40:27'),
(1078, NULL, 12, 11, 'event', '2020-01-09 07:40:28', '2020-01-09 07:40:28'),
(1079, NULL, 12, 17, 'event', '2020-01-09 07:40:28', '2020-01-09 07:40:28'),
(1080, NULL, 12, 6, 'amenity', '2020-01-09 07:40:28', '2020-01-09 07:40:28'),
(1081, NULL, 12, 8, 'amenity', '2020-01-09 07:40:28', '2020-01-09 07:40:28'),
(1082, NULL, 12, 9, 'amenity', '2020-01-09 07:40:28', '2020-01-09 07:40:28'),
(1083, NULL, 12, 11, 'amenity', '2020-01-09 07:40:28', '2020-01-09 07:40:28'),
(1084, NULL, 12, 15, 'amenity', '2020-01-09 07:40:28', '2020-01-09 07:40:28'),
(1085, NULL, 12, 4, 'game', '2020-01-09 07:40:28', '2020-01-09 07:40:28'),
(1086, NULL, 12, 7, 'game', '2020-01-09 07:40:28', '2020-01-09 07:40:28'),
(1087, NULL, 12, 12, 'game', '2020-01-09 07:40:28', '2020-01-09 07:40:28'),
(1088, NULL, 12, 1, 'seasons', '2020-01-09 07:40:28', '2020-01-09 07:40:28'),
(1089, NULL, 12, 2, 'seasons', '2020-01-09 07:40:28', '2020-01-09 07:40:28'),
(1090, NULL, 12, 3, 'seasons', '2020-01-09 07:40:28', '2020-01-09 07:40:28'),
(1091, NULL, 12, 4, 'seasons', '2020-01-09 07:40:28', '2020-01-09 07:40:28'),
(1092, NULL, 12, 5, 'seasons', '2020-01-09 07:40:28', '2020-01-09 07:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `deal_id` int(11) DEFAULT NULL,
  `business_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `deal_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `user_id`, `vendor_id`, `deal_id`, `business_id`, `status`, `deal_status`, `created_at`, `updated_at`) VALUES
(1, 60, 31, 0, 1, 0, 0, '2020-02-12 10:52:07', '2020-02-14 09:39:11');

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `deal_id` int(11) DEFAULT NULL,
  `business_id` int(11) DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci,
  `chat_id` int(11) DEFAULT NULL,
  `sender_status` int(11) DEFAULT '0',
  `receiver_status` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0',
  `custom_package_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `parent`, `sender_id`, `receiver_id`, `deal_id`, `business_id`, `message`, `chat_id`, `sender_status`, `receiver_status`, `type`, `custom_package_id`, `created_at`, `updated_at`) VALUES
(1, 0, 60, 31, 0, 1, '{"message":{"name":"Kanny Customer","request_for":"2","contact_type":null,"start_date":null,"no_of_guest":null,"phone_number":"9465470549","email":"kannyc@yopmail.com","message":"I need custom Package for eg"},"pkg":12}', 1, 0, 1, 1, 0, '2020-02-12 10:52:07', '2020-02-14 09:38:37'),
(2, 0, 60, 31, 0, 1, 'Hey Man', 1, 1, 1, 0, 0, '2020-02-12 10:52:41', '2020-02-14 09:38:37'),
(3, 0, 60, 31, 0, 1, 'How are you?', 1, 1, 1, 0, 0, '2020-02-12 10:53:47', '2020-02-14 09:38:37'),
(4, 0, 60, 31, 0, 1, 'I am fine', 1, 1, 1, 0, 0, '2020-02-12 10:53:52', '2020-02-14 09:38:37'),
(5, 0, 60, 31, 0, 1, 'Okay how are you now?', 1, 1, 1, 0, 0, '2020-02-14 09:37:57', '2020-02-14 09:38:37'),
(6, 0, 31, 60, 0, 1, 'hello', 1, 1, 1, 0, 0, '2020-02-14 09:38:41', '2020-02-14 09:38:42'),
(7, 0, 60, 31, 0, 1, 'Okay areyou in now', 1, 1, 1, 0, 0, '2020-02-14 09:38:56', '2020-02-14 09:39:01'),
(8, 0, 31, 60, 0, 1, 'hello', 1, 1, 1, 0, 0, '2020-02-14 09:39:07', '2020-02-14 09:39:07'),
(9, 0, 60, 31, 0, 1, 'Great', 1, 1, 1, 0, 0, '2020-02-14 09:39:11', '2020-02-14 09:39:11');

-- --------------------------------------------------------

--
-- Table structure for table `check_lists`
--

CREATE TABLE `check_lists` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `task` text COLLATE utf8mb4_unicode_ci,
  `task_id` int(11) NOT NULL DEFAULT '0',
  `event_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `check_lists`
--

INSERT INTO `check_lists` (`id`, `parent`, `task`, `task_id`, `event_id`, `user_id`, `created_at`, `updated_at`) VALUES
(6, 0, NULL, 1, 57, 0, '2020-02-19 06:24:47', '2020-02-19 06:24:47'),
(7, 0, NULL, 4, 57, 0, '2020-02-19 06:24:47', '2020-02-19 06:24:47'),
(8, 0, NULL, 11, 57, 0, '2020-02-19 06:24:48', '2020-02-19 06:24:48'),
(9, 0, NULL, 16, 57, 0, '2020-02-19 06:24:48', '2020-02-19 06:24:48'),
(10, 0, NULL, 20, 57, 0, '2020-02-19 06:24:48', '2020-02-19 06:24:48'),
(11, 0, NULL, 26, 57, 0, '2020-02-19 06:24:49', '2020-02-19 06:24:49'),
(12, 0, NULL, 31, 57, 0, '2020-02-19 06:24:49', '2020-02-19 06:24:49'),
(13, 0, NULL, 36, 57, 0, '2020-02-19 06:24:49', '2020-02-19 06:24:49'),
(14, 0, NULL, 44, 57, 0, '2020-02-19 06:24:50', '2020-02-19 06:24:50'),
(160, 0, NULL, 49, 58, 32, '2020-02-21 10:21:04', '2020-02-21 10:21:04'),
(161, 0, NULL, 56, 58, 32, '2020-02-21 10:21:04', '2020-02-21 10:21:04'),
(162, 0, NULL, 64, 58, 32, '2020-02-21 10:21:05', '2020-02-21 10:21:05'),
(163, 0, NULL, 72, 58, 32, '2020-02-21 10:21:05', '2020-02-21 10:21:05'),
(164, 0, NULL, 77, 58, 32, '2020-02-21 10:21:06', '2020-02-21 10:21:06'),
(165, 0, NULL, 86, 58, 32, '2020-02-21 10:21:06', '2020-02-21 10:21:06'),
(166, 0, NULL, 100, 58, 32, '2020-02-21 10:21:07', '2020-02-21 10:21:07'),
(167, 0, NULL, 111, 58, 32, '2020-02-21 10:21:08', '2020-02-21 10:21:08'),
(168, 0, NULL, 123, 58, 32, '2020-02-21 10:21:08', '2020-02-21 10:21:08'),
(169, 0, NULL, 128, 58, 32, '2020-02-21 10:21:09', '2020-02-21 10:21:09'),
(170, 0, NULL, 137, 58, 32, '2020-02-21 10:21:09', '2020-02-21 10:21:09'),
(171, 0, NULL, 142, 58, 32, '2020-02-21 10:21:09', '2020-02-21 10:21:09'),
(172, 0, NULL, 154, 58, 32, '2020-02-21 10:21:10', '2020-02-21 10:21:10'),
(173, 0, NULL, 162, 58, 32, '2020-02-21 10:21:10', '2020-02-21 10:21:10'),
(174, 0, NULL, 167, 58, 32, '2020-02-21 10:21:10', '2020-02-21 10:21:10'),
(175, 0, NULL, 174, 58, 32, '2020-02-21 10:21:11', '2020-02-21 10:21:11'),
(176, 0, NULL, 185, 58, 32, '2020-02-21 10:21:11', '2020-02-21 10:21:11'),
(177, 0, NULL, 49, 52, 60, '2020-02-21 12:22:31', '2020-02-21 12:22:31'),
(178, 0, NULL, 56, 52, 60, '2020-02-21 12:22:31', '2020-02-21 12:22:31'),
(179, 0, NULL, 64, 52, 60, '2020-02-21 12:22:31', '2020-02-21 12:22:31'),
(180, 0, NULL, 72, 52, 60, '2020-02-21 12:22:32', '2020-02-21 12:22:32'),
(181, 0, NULL, 77, 52, 60, '2020-02-21 12:22:32', '2020-02-21 12:22:32'),
(182, 0, NULL, 86, 52, 60, '2020-02-21 12:22:32', '2020-02-21 12:22:32'),
(183, 0, NULL, 100, 52, 60, '2020-02-21 12:22:33', '2020-02-21 12:22:33'),
(184, 0, NULL, 111, 52, 60, '2020-02-21 12:22:34', '2020-02-21 12:22:34'),
(185, 0, NULL, 123, 52, 60, '2020-02-21 12:22:34', '2020-02-21 12:22:34'),
(186, 0, NULL, 128, 52, 60, '2020-02-21 12:22:35', '2020-02-21 12:22:35'),
(187, 0, NULL, 137, 52, 60, '2020-02-21 12:22:35', '2020-02-21 12:22:35'),
(188, 0, NULL, 142, 52, 60, '2020-02-21 12:22:35', '2020-02-21 12:22:35'),
(189, 0, NULL, 154, 52, 60, '2020-02-21 12:22:36', '2020-02-21 12:22:36'),
(190, 0, NULL, 162, 52, 60, '2020-02-21 12:22:36', '2020-02-21 12:22:36'),
(191, 0, NULL, 167, 52, 60, '2020-02-21 12:22:37', '2020-02-21 12:22:37'),
(192, 0, NULL, 174, 52, 60, '2020-02-21 12:22:37', '2020-02-21 12:22:37'),
(193, 0, NULL, 185, 52, 60, '2020-02-21 12:22:37', '2020-02-21 12:22:37'),
(194, 0, NULL, 49, 40, 50, '2020-02-24 02:31:03', '2020-02-24 02:31:03'),
(195, 0, NULL, 56, 40, 50, '2020-02-24 02:31:03', '2020-02-24 02:31:03'),
(196, 0, NULL, 64, 40, 50, '2020-02-24 02:31:03', '2020-02-24 02:31:03'),
(197, 0, NULL, 72, 40, 50, '2020-02-24 02:31:04', '2020-02-24 02:31:04'),
(198, 0, NULL, 77, 40, 50, '2020-02-24 02:31:04', '2020-02-24 02:31:04'),
(199, 0, NULL, 86, 40, 50, '2020-02-24 02:31:04', '2020-02-24 02:31:04'),
(200, 0, NULL, 100, 40, 50, '2020-02-24 02:31:05', '2020-02-24 02:31:05'),
(201, 0, NULL, 111, 40, 50, '2020-02-24 02:31:06', '2020-02-24 02:31:06'),
(202, 0, NULL, 123, 40, 50, '2020-02-24 02:31:06', '2020-02-24 02:31:06'),
(203, 0, NULL, 128, 40, 50, '2020-02-24 02:31:07', '2020-02-24 02:31:07'),
(204, 0, NULL, 137, 40, 50, '2020-02-24 02:31:07', '2020-02-24 02:31:07'),
(205, 0, NULL, 142, 40, 50, '2020-02-24 02:31:07', '2020-02-24 02:31:07'),
(206, 0, NULL, 154, 40, 50, '2020-02-24 02:31:08', '2020-02-24 02:31:08'),
(207, 0, NULL, 162, 40, 50, '2020-02-24 02:31:08', '2020-02-24 02:31:08'),
(208, 0, NULL, 167, 40, 50, '2020-02-24 02:31:09', '2020-02-24 02:31:09'),
(209, 0, NULL, 174, 40, 50, '2020-02-24 02:31:09', '2020-02-24 02:31:09'),
(210, 0, NULL, 185, 40, 50, '2020-02-24 02:31:10', '2020-02-24 02:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `slug`, `meta_title`, `meta_description`, `meta_keywords`, `title`, `body`, `status`, `created_at`, `updated_at`) VALUES
(1, 'about-us', 'About Us', 'About Us Description', 'About Us keywords', 'About Us', '<div class="bg-light">\r\n<div class="container py-5">\r\n<div class="row h-100 align-items-center py-5">\r\n<div class="col-lg-6">\r\n<h1 class="display-4">About us page</h1>\r\n\r\n<p class="lead text-muted mb-0">\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id sem fringilla, sollicitudin nisl aliquam, sodales neque. Pellentesque ac ultricies felis. Nam et iaculis quam, et pharetra felis. Proin vulputate tincidunt velit id euismod..</p>\r\n\r\n</div>\r\n\r\n<div class="col-lg-6 d-none d-lg-block"><img alt="" class="img-fluid" src="https://res.cloudinary.com/mhmd/image/upload/v1556834136/illus_kftyh4.png" /></div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="bg-white py-5">\r\n<div class="container py-5">\r\n<div class="row align-items-center mb-5">\r\n<div class="col-lg-6 order-2 order-lg-1">\r\n<h2 class="font-weight-light">Lorem ipsum dolor sit amet</h2>\r\n\r\n<p class="font-italic text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n<a class="btn btn-light px-5 rounded-pill shadow-sm" href="#">Learn More</a></div>\r\n\r\n<div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img alt="" class="img-fluid mb-4 mb-lg-0" src="https://res.cloudinary.com/mhmd/image/upload/v1556834139/img-1_e25nvh.jpg" /></div>\r\n</div>\r\n\r\n<div class="row align-items-center">\r\n<div class="col-lg-5 px-5 mx-auto"><img alt="" class="img-fluid mb-4 mb-lg-0" src="https://res.cloudinary.com/mhmd/image/upload/v1556834136/img-2_vdgqgn.jpg" /></div>\r\n\r\n<div class="col-lg-6">\r\n<h2 class="font-weight-light">Lorem ipsum dolor sit amet</h2>\r\n\r\n<p class="font-italic text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n<a class="btn btn-light px-5 rounded-pill shadow-sm" href="#">Learn More</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="bg-light py-5">\r\n<div class="container py-5">\r\n<div class="row mb-4">\r\n<div class="col-lg-5">\r\n<h2 class="display-4 font-weight-light">Our team</h2>\r\n\r\n<p class="font-italic text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n</div>\r\n</div>\r\n\r\n<div class="row text-center"><!-- Team item-->\r\n<div class="col-xl-3 col-sm-6 mb-5">\r\n<div class="bg-white rounded shadow-sm py-5 px-4"><img alt="" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm" src="https://res.cloudinary.com/mhmd/image/upload/v1556834132/avatar-4_ozhrib.png" width="100" />\r\n<h5 class="mb-0">Manuella Nevoresky</h5>\r\n<span class="small text-uppercase text-muted">CEO - Founder</span>\r\n\r\n<ul class="social mb-0 list-inline mt-3">\r\n	<li class="list-inline-item">&nbsp;</li>\r\n	<li class="list-inline-item">&nbsp;</li>\r\n	<li class="list-inline-item">&nbsp;</li>\r\n	<li class="list-inline-item">&nbsp;</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<!-- End--><!-- Team item-->\r\n\r\n<div class="col-xl-3 col-sm-6 mb-5">\r\n<div class="bg-white rounded shadow-sm py-5 px-4"><img alt="" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm" src="https://res.cloudinary.com/mhmd/image/upload/v1556834130/avatar-3_hzlize.png" width="100" />\r\n<h5 class="mb-0">Samuel Hardy</h5>\r\n<span class="small text-uppercase text-muted">CEO - Founder</span>\r\n\r\n<ul class="social mb-0 list-inline mt-3">\r\n	<li class="list-inline-item">&nbsp;</li>\r\n	<li class="list-inline-item">&nbsp;</li>\r\n	<li class="list-inline-item">&nbsp;</li>\r\n	<li class="list-inline-item">&nbsp;</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<!-- End--><!-- Team item-->\r\n\r\n<div class="col-xl-3 col-sm-6 mb-5">\r\n<div class="bg-white rounded shadow-sm py-5 px-4"><img alt="" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm" src="https://res.cloudinary.com/mhmd/image/upload/v1556834133/avatar-2_f8dowd.png" width="100" />\r\n<h5 class="mb-0">Tom Sunderland</h5>\r\n<span class="small text-uppercase text-muted">CEO - Founder</span>\r\n\r\n<ul class="social mb-0 list-inline mt-3">\r\n	<li class="list-inline-item">&nbsp;</li>\r\n	<li class="list-inline-item">&nbsp;</li>\r\n	<li class="list-inline-item">&nbsp;</li>\r\n	<li class="list-inline-item">&nbsp;</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<!-- End--><!-- Team item-->\r\n\r\n<div class="col-xl-3 col-sm-6 mb-5">\r\n<div class="bg-white rounded shadow-sm py-5 px-4"><img alt="" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm" src="https://res.cloudinary.com/mhmd/image/upload/v1556834133/avatar-1_s02nlg.png" width="100" />\r\n<h5 class="mb-0">John Tarly</h5>\r\n<span class="small text-uppercase text-muted">CEO - Founder</span>\r\n\r\n<ul class="social mb-0 list-inline mt-3">\r\n	<li class="list-inline-item">&nbsp;</li>\r\n	<li class="list-inline-item">&nbsp;</li>\r\n	<li class="list-inline-item">&nbsp;</li>\r\n	<li class="list-inline-item">&nbsp;</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<!-- End--></div>\r\n</div>\r\n</div>\r\n\r\n<footer class="bg-light pb-5">\r\n<div class="container text-center"><a class="cstm-btn" href="javascript:void(0);">Contact us</a></div>\r\n</footer>', 1, '2019-11-21 04:39:24', '2019-11-21 08:26:00'),
(2, 'terms-and-condition', 'Terms and Condition', 'Terms and Condition description', 'Terms and Condition keyword', 'Terms & Condition', '<p><strong>Terms and Conditions - the following applies to both Camp GO! and Coaching Courses</strong></p>\r\n\r\n<p><strong>Definitions :</strong></p>\r\n\r\n<p><strong>Activity:</strong><strong>&nbsp;Any camp, club, course, event or activity organised and ran by DRH Sports Ltd.</strong></p>\r\n\r\n<p><strong>Terms &amp; Conditions:</strong><strong>&nbsp;The terms contained in this document and any other document referred to within it.</strong></p>\r\n\r\n<p><strong>Childcare Vouchers</strong></p>\r\n\r\n<p>DRH Sports LTD is now registered with Ofsted and therefore able to accept childcare vouchers as payment. Please see the list below of the voucher providers that we are currently registered with. If the provider that you are registered with does not appear on the list below then please email us at info@drhsports.co.uk.</p>\r\n\r\n<p>To make a booking using childcare vouchers please email us at info@drhsports.co.uk with a detailed description of the booking that you would like to make and we will send you an invoice. We will soon be able to take childcare voucher bookings through the website.</p>\r\n\r\n<p>- Computershare - 24767070<br />\r\n<br />\r\n- Mychildcaervouchers (Eden Red) - P21144641<br />\r\n<br />\r\n- Sodexo &ndash; 878811</p>\r\n\r\n<p><strong>General</strong></p>\r\n\r\n<ul>\r\n	<li>It is your responsibility to make sure that you are there to pick your child up on time after their session has finished.</li>\r\n	<li>You should wear appropriate sports clothing, non-marking trainers, no jewellery and long hair should be tied back.</li>\r\n	<li>Any form of abuse towards any of our staff will not be tolerated.</li>\r\n	<li>Anyone that is deemed to be too disruptive to the class due to antisocial behaviour will not be allowed to continue on the course and no refund will be issued. However, every effort will be made to resolve any issues should this arise.</li>\r\n</ul>\r\n\r\n<p><strong>Child Protection</strong></p>\r\n\r\n<p><strong>All our staff are DBS checked and have regular training in safeguarding in accordance with our qualifications/ insurance. They all act in accordance with our child protection policy &ndash; a copy of which is available on request. Please email&nbsp;</strong><a href="mailto:info@drhsports.co.uk">info@drhsports.co.uk</a></p>\r\n\r\n<p><strong>Course/Camp cancellation/Refunds</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Coaching courses &amp; School Clubs:</strong>&nbsp;No refunds will be issued once enrolled in course/camp in regards to illness or injury, except on production of a&nbsp;letter from a doctor or medical professional.</li>\r\n	<li><strong>Kids Camps:</strong>&nbsp;If you give at least 7 days notice before the camp date(s) you would like to cancel we will refund all monies paid, minus your deposit of 25% of the total amount per child per day.</li>\r\n	<li>If you give 3 days notice we will only refund you 50% of the total fee.</li>\r\n	<li>As we offer a discounted weekly price, if you wish to cancel a day(s) within a week, we will then recalculate your booking at the daily rate which may result in an additional charge.</li>\r\n	<li>(The following applies to tennis coaching classes) If you want to request to make up a class you will need to contact the head coach before the session is missed. Classes can be made up at a later stage in the term provided that you have let the Head Coach know at least 24 hours prior to the missed class and that there is available space in the class you intend to join. Missed classes must be made up within the intended term and cannot be carried over to future terms or be held in credit for other participants, camps or courses.</li>\r\n	<li>Any courses that have insufficient numbers of participants may be cancelled at the Head Coach or Camp Director&rsquo;s discretion. In this case money paid will be refunded or another course may be booked if places available.</li>\r\n	<li>Sessions must be booked in advance to enable us to manage the coach to player ratio and so the coaching team can contact parents in the event of cancellation.</li>\r\n	<li>In the event that DRH Sports has to cancel an activity for any reason, alternative provisions to stage the activity at another time will be arranged and confirmed to all.</li>\r\n	<li>If you are unable to attend the alternatively arranged time you must confirm with DRH and we will try our best to accommodate you in another class.</li>\r\n</ul>\r\n\r\n<p><strong>Photography/Video footage</strong></p>\r\n\r\n<ul>\r\n	<li>DRH Sports Ltd may from time to time take photographs/ videos of any activity. The use of which is solely for promoting and publicising DRH Sports Ltd.&rsquo;s activities through relevant use on social media, our website and for advertising. Please note we cannot guarantee your child will appear on these.</li>\r\n	<li>Parents/ guardians that do not wish for their child to be photographed/filmed must make DRH Sports Ltd aware of this at the time of booking in writing, and before the activity starts to the lead coach. Please state this also on your DRH account.</li>\r\n	<li>Where possible we will inform parents/guardians at the start of an activity when we plan to take photographs/ videos.</li>\r\n</ul>\r\n\r\n<p><strong>Your Child&rsquo;s Information</strong></p>\r\n\r\n<ul>\r\n	<li>It is the responsibility of the person making the booking to ensure that all details provided are accurate.</li>\r\n	<li>In particular, full info about each child, including medical and other special educational needs, and emergency contact info.</li>\r\n	<li>If we do not have all this information before camp starts, or before any session with DRH Sports begins, your child will not be allowed to leave your care.</li>\r\n	<li>We can&rsquo;t take responsibility for the child until we have all of this information.</li>\r\n</ul>\r\n\r\n<p><strong>Data Protection</strong></p>\r\n\r\n<ul>\r\n	<li><strong>DRH Sports Ltd will hold all personal data in accordance with its Privacy Policy.</strong></li>\r\n</ul>\r\n\r\n<p><strong>Special Requirement</strong></p>\r\n\r\n<ul>\r\n	<li>DRH Sports recognises that the needs of individual children vary, and will endeavour to accommodate children with specific needs and medical conditions within the camp environment.</li>\r\n	<li>It is our policy not to exclude any child due to specific needs and/or medical conditions wherever possible.</li>\r\n	<li>It is the responsibility of the parent/carer to inform us of any medical conditions, special educational needs, or disabilities when booking online or over email so we can discuss how best to accommodate the child and consider whether there are reasonable adjustments which can be made to ensure they are able to fully participate and enjoy the activities within the staffing ratios.</li>\r\n	<li>The needs of each child vary so decisions are made on a case-by-case basis and depend upon the level of support each individual child may require.</li>\r\n	<li>Our staffing ratio procedure requires two members of staff at least at all times. We can&rsquo;t accommodate our ratios for any specific needs or medical conditions.</li>\r\n	<li>Where we feel that a child is not coping within these ratios, we reserve the right to ask the parent/carer to come and collect their child. No refund will be available.</li>\r\n	<li>Where a child does require one-to-one support, DRH Sports ltd will permit parents/carers to attend camp to support their child, providing they are fully DBS checked and vetted.</li>\r\n	<li>DRH Sports does not provide one-to-one support.</li>\r\n</ul>\r\n\r\n<p><strong>Complaints</strong></p>\r\n\r\n<ul>\r\n	<li>DRH Sports is committed to ensuring every adult/child has a great time on our coaching courses or camps. If you or your child is not happy with the service, we provide then we&#39;d like to hear about it.</li>\r\n	<li>In the first instance raise it with the senior coach at the activity. He/she will deal with the problem in accordance with our policies and procedures.</li>\r\n	<li>If your problem is not resolved to your satisfaction then please write to our customer services team at&nbsp;<a href="mailto:info@drhsports.co.uk">info@drhsports.co.uk</a>&nbsp;within 7 days of your child&rsquo;s attendance of the activity. We will respond to your complaint within 28 days.</li>\r\n	<li>We take your views and complaints very seriously and will endeavour to resolve your complaint as quickly as possible.</li>\r\n	<li>Refunds will only be issued if DRH Sports Ltd is proven to be in breach of its T&amp;Cs.</li>\r\n</ul>\r\n\r\n<p><strong>Personal Property / Lost Property</strong></p>\r\n\r\n<ul>\r\n	<li>DRH Sports cannot be held responsible for any loss or damage to any personal belongings whilst attending a DRH Sports Ltd activity.</li>\r\n	<li>Please ensure that your children don&rsquo;t arrive to one of our activities with valuables.</li>\r\n	<li>Lost property for any activity held at Milton Keynes Tennis Club will be kept in our lost property container for 2 weeks.</li>\r\n	<li>If you leave an item at a leisure centre or other venue and we find it, we will take it with us and keep it at Milton Keynes Tennis Club for 2 weeks.</li>\r\n	<li>If an item is left at one of our external venues and we don&rsquo;t find it the leisure centre will hold on to it in accordance with their policy.</li>\r\n	<li>No electronic tablets, mobile phones or recording devices are permitted during any of our activities. Please ask your child to pass such items to a member of staff for safekeeping.</li>\r\n</ul>\r\n\r\n<p><strong>Health and Safety</strong></p>\r\n\r\n<ul>\r\n	<li>A full risk assessment will be carried out before any activity takes place at a new venue.</li>\r\n	<li>By agreeing to these terms and conditions, you are providing consent for DRH Sports Ltd professionals to administer all necessary first aid to your child as required at any time.</li>\r\n	<li>For safety reasons it is compulsory for all attendees to wear shin pads on any activity that involves football, hockey or other contact sports. DRH Sports Ltd reserves the right to refuse permission for any child not wearing shin protection to participate. &ndash; We advise shin pads are worn.</li>\r\n	<li>Any participant wearing earrings will need to have them removed prior to attendance or, for newly pierced ears, they must be covered with appropriate tape.</li>\r\n	<li>It is the parent/guardian&rsquo;s responsibility to ensure appropriate clothing is worn and/or available for their child for the activity being undertaken and weather conditions. If a child arrives without the appropriate clothing the coaches have the right to send them home.</li>\r\n</ul>\r\n\r\n<p><strong>Medical Conditions</strong></p>\r\n\r\n<ul>\r\n	<li>Any medical conditions that any participant may have must be fully disclosed</li>\r\n</ul>\r\n\r\n<ol>\r\n	<li>When you create your account with DRH.</li>\r\n	<li>To the lead coach of the activity or at the venue.</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>If the booking is made outside of the website then the medical concern must be disclosed to the lead coach and camp director.</li>\r\n	<li>Any child with allergies must have an Epi-pen with them or we must exclude them from an activity.</li>\r\n	<li>Any child with asthma must have their inhaler with them otherwise we must exclude them from the activity.</li>\r\n	<li>If your child has any medical condition which requires equipment they must bring it with them otherwise we are not allowed to have them participating.</li>\r\n</ul>\r\n\r\n<p><strong>Leaving an Activity</strong></p>\r\n\r\n<ul>\r\n	<li>All children must be collected and dropped off by a parent&nbsp;or guardian and they must sign in and out with a member of DRH staff.</li>\r\n	<li>Any child that normally walks home unaccompanied from any activity will only be allowed to leave unaccompanied if a parent or guardian has provided written consent prior to the activity starting. &ndash; any child aged 12 or under must be collected.</li>\r\n</ul>\r\n\r\n<p><strong>Exclusions</strong></p>\r\n\r\n<ul>\r\n	<li>DRH Sports has a responsibility for ensuring the well being and safety of all children in our care and have approved procedures for managing behaviour.</li>\r\n	<li>The company follows a zero-tolerance policy on discrimination, bullying and persistent poor behaviour of any kind, irrespective of any special needs.</li>\r\n	<li>On rare occasions, and in more serious cases, we reserve the right to ask parents to remove children from camps/ sessions for the remainder of day/lesson or for the entirety of a camp/term.</li>\r\n	<li>DRH Sports reserve the right to exclude any child for any reason at its absolute discretion, including, persistent late collection. No refund will be made for days missed and no compensation will be made for any other cost or losses incurred as a result. Any costs associated with the exclusion will be the parents&rsquo; responsibility.</li>\r\n	<li>We reserve the right to exclude a child at any time prior or during a session due to illness. The parents/ carer will be expected to come and collect their child.</li>\r\n</ul>\r\n\r\n<p><strong>Policies &amp; Procedures</strong></p>\r\n\r\n<p>Copies of DRH Sports Ltd&rsquo;s policies and procedures can be made available upon request from info@drhsports.co.uk</p>\r\n\r\n<p><strong>INFO</strong></p>\r\n\r\n<ul>\r\n	<li>The information on this site is updated regularly. However, we hereby exclude any warranties (whether expressed or implied) as to the quality, accuracy, efficiency, completeness, performance and fitness for a particular purpose of the site.</li>\r\n	<li>These T&amp;Cs form the entire agreement between you and DRH Sports Ltd.</li>\r\n	<li>By booking an activity with DRH you are acknowledging your full acceptance of these T&amp;Cs and confirm that you have not relied on any other representation other than those contained within these T&amp;Cs.</li>\r\n	<li>If any term within these T&amp;Cs is found to be unenforceable by a competent Court then such a term shall be struck out, but the remaining terms within these T&amp;Cs shall continue in force to the full extent permitted by law.</li>\r\n	<li>These T&amp;Cs are governed by English Law and subject to the exclusive jurisdiction of the Courts of England.</li>\r\n</ul>\r\n\r\n<p><strong>Camp GO! Terms and Conditions - the following applies only to Camp GO!</strong></p>\r\n\r\n<p><strong>Bookings/ Payments</strong></p>\r\n\r\n<ul>\r\n	<li><strong>DRH Sports Ltd bookings are strictly limited to availability.</strong></li>\r\n	<li><strong>The booking customer must be aged 18 or over.</strong></li>\r\n	<li><strong>Bookings made online or by telephone will be confirmed by email. A booking is confirmed when we receive the appropriate deposit and/ or childcare vouchers, and receipt of these constitutes acceptance of these terms and conditions.</strong></li>\r\n	<li><strong>DRH Sports accept payment by credit card, debit card and childcare vouchers. We do not accept payment by cheque or Paypal.</strong></li>\r\n	<li><strong>A deposit of 25% of your booking cost is non-refundable.</strong></li>\r\n</ul>\r\n\r\n<p><strong>Coupon Codes/ Discounts</strong></p>\r\n\r\n<p>Sibling Discount &ndash; 10% &ndash; Coupon is: sb10 (this coupon code must be entered at the checkout page when completing your booking).<br />\r\n<br />\r\n<br />\r\n<br />\r\nThis discount applies to two of more courses being booked for siblings. The booking for both players must be made at the same time.</p>\r\n\r\n<p><strong>Changing your Booking</strong></p>\r\n\r\n<ul>\r\n	<li><strong>You can change your booking once for free providing there is space and suitable numbers.</strong></li>\r\n	<li><strong>There is a&nbsp;</strong>&pound;5&nbsp;<strong>booking charge for every change after that.</strong></li>\r\n	<li><strong>In order to change your booking you must email&nbsp;</strong><a href="mailto:info@drhsports.co.uk">info@drhsports.co.uk</a></li>\r\n</ul>\r\n\r\n<p><strong>Age</strong></p>\r\n\r\n<p>We can only accept children aged 4.5 and above.</p>\r\n\r\n<p>If your child is four years old or younger on August 31st 2017 they can only attend 4 hours in a single day.</p>\r\n\r\n<p><strong>Equipment</strong></p>\r\n\r\n<ul>\r\n	<li><strong>All players must treat all equipment with respect at all times.</strong></li>\r\n	<li><strong>If players damage equipment there will be a fee dependent upon the item.</strong></li>\r\n</ul>\r\n\r\n<p><strong>Inclement Weather</strong></p>\r\n\r\n<ul>\r\n	<li>In the event of inclement weather you must assume the camp will go ahead unless you hear otherwise from a member of the coaching team.</li>\r\n	<li>We have limited indoor space at MKTC so if we need to cancel the camp due to bad or insufficient numbers then participants can transfer their booking to the Multi-sports camp at Oakgrove Leisure Centre.</li>\r\n</ul>\r\n\r\n<p><strong>Extended Care</strong></p>\r\n\r\n<ul>\r\n	<li>Our standard extended care hours are 8:15-9am and 4-5:30pm and can be booked at an additional cost.</li>\r\n	<li>Some venue times vary and this is confirmed at the time of booking.</li>\r\n	<li>Extended care can be cancelled. If you give us 7 days notice or more before camp starts we will refund you in full.</li>\r\n	<li>With less than 7 days notice, no refund is payable.</li>\r\n	<li>If you wish to move extended care to a different camp day, this is possible with 7 days or more notice free of charge.</li>\r\n</ul>\r\n\r\n<p><strong>Late Pick-Up</strong></p>\r\n\r\n<ul>\r\n	<li>If you are more than 10 minutes late for the standard 4pm finish time you will be charged the late pick up fee of &pound;10, provided there is late stay occurring.</li>\r\n	<li>If there is no late stay, or if you are late for extended care, we will charge you &pound;20 for every 15 minutes you are late to pay for staff costs.</li>\r\n	<li>This applies if there is no communication from the parent, if you communicate with us the fee will be down to the coaches&rsquo; discretion.</li>\r\n	<li>If we have no contact from a parent/ guardian we will have to call social services after 6pm and you will be charged.</li>\r\n</ul>\r\n\r\n<p><strong>Tuck Shop</strong></p>\r\n\r\n<ul>\r\n	<li>We advise your child brings no more than &pound;2 for the tuck shop.</li>\r\n</ul>\r\n\r\n<p>DRH Sports Ltd&rsquo;s eating policy is reinforced throughout any activity and staff will encourage children to eat their packed lunches before buying from the camp shop.</p>\r\n\r\n<p><strong>Notice of Absence</strong></p>\r\n\r\n<ul>\r\n	<li>If a child is not attending a scheduled day of camp, parents/ carers must telephone the camp manager or head office to allow us to update records.</li>\r\n</ul>\r\n\r\n<p><strong>Programmes &amp; Activities</strong></p>\r\n\r\n<ul>\r\n	<li>From time to time, we may need to change venues, dates, activities and courses for reasons within or outside our control.</li>\r\n	<li>Activity programmes are subject to change in the event of unsuitable weather or other circumstances beyond our control.</li>\r\n	<li>Timetables displayed on camp are a guide and are subject to change.</li>\r\n	<li>We can&rsquo;t guarantee certain activities will 100% happen on certain days.</li>\r\n	<li>In exceptional circumstances we may have to cancel particular dates at a venue, and in this event, we will try to give those booked as much notice as possible and offer a suitable alternative.</li>\r\n	<li>If no alternative is available, we will refund all monies paid for the dates cancelled.</li>\r\n	<li>If our tennis camp gets cancelled due to inclement weather or insufficient numbers we will transfer all bookings to our multi-sports camp at Oakgrove Leisure centre, if they are both running on the same day. This is due to the close proximity of the leisure centre to MKTC and we hope it should be easy for parents to make the change. We will give you as much notice as possible.</li>\r\n</ul>\r\n\r\n<p><strong>DRH Sports Coaching Courses Terms and Conditions - the following applies only to Coaching Courses</strong></p>\r\n\r\n<p><strong>Bookings/ Payments</strong></p>\r\n\r\n<ul>\r\n	<li><strong>DRH Sports Ltd bookings are strictly limited to availability.</strong></li>\r\n	<li><strong>The booking customer must be aged 18 or over.</strong></li>\r\n	<li><strong>For coaching courses, you book on at the beginning of each term. If you book on part way through the term, there is a reduced price dependent on how many weeks are left.</strong></li>\r\n	<li><strong>In some circumstances special payments can be made, if you are signing up more than 3 people in a term. Entire family etc.</strong></li>\r\n	<li><strong>Bookings made online or by telephone will be confirmed by email. A booking is confirmed when we receive the appropriate deposit and/ or childcare vouchers, and receipt of these constitutes acceptance of these terms and conditions.</strong></li>\r\n	<li><strong>DRH Sports accept payment by credit card, debit card and childcare vouchers. We do not accept payment by cheque or Paypal.</strong></li>\r\n</ul>\r\n\r\n<p><strong>Coupon Codes/ Discounts</strong></p>\r\n\r\n<p>To receive the early bird discount price (12% off) you must enter the following coupon code at the checkout page: EARLY.<br />\r\n<br />\r\nThis coupon can only be used during the specified early bird offer dates and cannot be used in conjunction with any other coupons, discounts or offers. Once the early bird deadline has passed, only one coupon per booking can be applied.<br />\r\n<br />\r\n<br />\r\n<br />\r\nSibling Discount &ndash;10% &ndash; Coupon is: sb10.<br />\r\n<br />\r\nMultiple booking discount - Coupon is: mb10 (10%) This coupon can only be used if one participant is booking onto 2 our more coaching groups.<br />\r\n<br />\r\nFamily Discount -Coupon is: fam10. (10%) This coupon can only be used for 3 or more members of the same family are booked onto courses. Must include at least 2 adults and one child.</p>\r\n\r\n<p><strong>Taster Sessions</strong></p>\r\n\r\n<p><strong>You are allowed to try a taster class for maximum of 2 classes to the head coach&rsquo;s discretion. You can only try any particular session one time.</strong></p>\r\n\r\n<p><strong>Equipment (Borrowing Rackets)</strong></p>\r\n\r\n<ul>\r\n	<li><strong>The first two times you are allowed to borrow a racket free of charge.</strong></li>\r\n	<li><strong>After this, rackets cost&nbsp;</strong>&pound;<strong>2 to hire for children and&nbsp;</strong>&nbsp;&pound;<strong>4 for adults.</strong></li>\r\n	<li><strong>All players must treat all equipment with respect at all times.</strong></li>\r\n	<li><strong>If players damage equipment there will be a fee dependent upon the item.</strong></li>\r\n</ul>\r\n\r\n<p><strong>Group Sessions/Inclement Weather</strong></p>\r\n\r\n<ul>\r\n	<li>In the event of inclement weather you must assume the group will go ahead unless you hear otherwise from a member of the coaching team.</li>\r\n	<li>Any sessions cancelled by us prior to the start time will be made up at another time of our choosing.</li>\r\n	<li>If the weather turns bad once a session has started the coach will ensure the children are picked up or engaged in activities and the session will not be made up at a later time.</li>\r\n	<li>The coach may leave the club after 15 minutes passed the start time if nobody shows and has not been warned of your late arrival.</li>\r\n</ul>', 1, '2019-11-21 05:09:48', '2020-03-13 02:09:11'),
(3, 'privacy-policy', 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', '<p>Here are a few examples:</p>\r\n\r\n<p>Here&rsquo;s how&nbsp;<a href="https://500px.com/terms">500px</a>&nbsp;lists its prohibited activities:</p>\r\n\r\n<ol>\r\n	<li>The&nbsp;<strong>Intellectual Property</strong>&nbsp;disclosure will inform users that the contents, logo and other visual media you created is your property and is protected by copyright laws.</li>\r\n	<li>A&nbsp;<strong>Termination</strong>&nbsp;clause will inform that users&rsquo; accounts on your website and mobile app or users&rsquo; access to your website and mobile (if users can&rsquo;t have an account with you) can be terminated in case of abuses or at your sole discretion.</li>\r\n	<li>A&nbsp;<strong>Governing Law</strong>&nbsp;will inform users which laws govern the agreement. This should the country in which your company is headquartered or the country from which you operate your website and mobile app.</li>\r\n	<li>A&nbsp;<strong>Links To Other Web Sites</strong>&nbsp;clause will inform users that you are not responsible for any third party websites that you link to. This kind of clause will generally inform users that they are responsible for reading and agreeing (or disagreeing) with the Terms and Conditions or Privacy Policies of these third parties.</li>\r\n	<li>\r\n	<p>If your website or mobile app allows users to create content and make that content public to other users, a&nbsp;<strong>Content</strong>&nbsp;section will inform users that they own the rights to the content they have created. The &ldquo;Content&rdquo; clause usually mentions that users must give you (the website or mobile app developer) a license so that you can share this content on your website/mobile app and to make it available to other users.</p>\r\n\r\n	<p>Because the content created by users is public to other users, a&nbsp;<a href="https://termsfeed.com/blog/dmca-terms-and-conditions/">DMCA notice clause</a>&nbsp;(or Copyright Infringement ) section is helpful to inform users and copyright authors that, if any content is found to be a copyright infringement, you will respond to any DMCA takedown notices received and you will take down the content.</p>\r\n	</li>\r\n	<li>A&nbsp;<strong>Limit What Users Can Do</strong>&nbsp;clause can inform users that&nbsp;<strong>by agreeing to use your service, they&rsquo;re also agreeing to not do certain things</strong>. This can be part of a very long and thorough list in your Terms and Conditions agreements so as to encompass the most amount of negative uses.</li>\r\n</ol>', 1, '2019-11-21 07:08:44', '2019-11-21 07:54:11');

-- --------------------------------------------------------

--
-- Table structure for table `commissions`
--

CREATE TABLE `commissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `slab_from` double DEFAULT NULL,
  `slab_to` double NOT NULL DEFAULT '0',
  `commission_type` int(11) DEFAULT NULL,
  `commission_fee` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commissions`
--

INSERT INTO `commissions` (`id`, `parent`, `slab_from`, `slab_to`, `commission_type`, `commission_fee`, `type`, `created_at`, `updated_at`) VALUES
(14, 0, 1001, 2000, NULL, 3, 'slab', '2019-12-30 06:00:06', '2019-12-30 06:00:06'),
(15, 0, 2001, 3000, NULL, 4, 'slab', '2019-12-30 06:00:36', '2019-12-30 06:00:36'),
(18, 0, 3001, 9000, NULL, 6, 'slab', '2019-12-30 11:08:33', '2019-12-30 11:08:33'),
(22, 0, 0, 1000, NULL, 2, 'slab', '2019-12-31 00:02:39', '2019-12-31 00:02:39'),
(23, 0, 9001, 99999999, NULL, 2, 'slab', '2019-12-31 00:03:42', '2019-12-31 00:03:42');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `participant_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participant_dob` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participant_gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtype` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age_group` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booking_slot` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `more_info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `player` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` float DEFAULT NULL,
  `early_birth_price` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `slug`, `description`, `title`, `type`, `subtype`, `term`, `image`, `age`, `session_date`, `location`, `day_time`, `age_group`, `booking_slot`, `more_info`, `player`, `price`, `early_birth_price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'mini-tots', 'Week commencing Jan 6th and runs for 12 weeks', 'MINI TOTS', '156', '0', 'Spring - 2020', '1584016216.png', '3-4 years', '12 WEEKS - Jan 11th, 18th, 25th – Feb 1st,  8th, 15th, 29th - Mar 7th, 14th, 21st, 28th – Apr 4th', 'NDOORS at Oakgrove Leisure Centre, MK10 9JQ', 'Saturday 9-10am', '6-10', '12', 'In our Tots sessions we give the players an introduction to tennis through fun games and exercises designed to develop co-ordination and athletic ability.\r\nAll the equipment and rackets will be provided by the club.', 'Player2', 42, '', 1, '2020-03-12 07:00:16', '2020-03-20 01:25:26'),
(2, 'red-club-1-spring-2020-mon-5-6pm', 'Week commencing Jan 6th and runs for 12 weeks', 'RED CLUB 1', '158', '0', 'SPRING 2020', '1584071612.png', '5-8 years', 'Jan 6th, 13th, 20th, 27th - Feb 3rd, 10th, 24th - Mar 2nd, 9th, 16th, 23rd, 30th', 'Oakgrove Leisure Centre, Brickhill Street, MK10 9JQ.', 'MON 5-6PM', '3-7', '20', 'In our Red Club groups we aim to teach our players the basics in a fun environment, with plenty of fun games to break up the learning.\r\nThroughout a term we will cover the main four shots in tennis: forehand, backhand, serve and volley.', 'Player1', 40, '', 1, '2020-03-12 22:23:32', '2020-03-20 01:25:38'),
(3, 'red-club-2-spring-2020-wed-4-45-5-45pm', 'Week commencing Jan 6th and runs for 12 weeks', 'RED CLUB 2', '157', '160', 'SPRING 2020', '1584071789.png', '5-8 years', 'Jan 8th, 15th, 22nd, 29th - Feb 5th, 12th, 26th - Mar 4th, 11th, 18th, 25th – Apr 1st', 'Oakgrove Secondary School, Venture Gate, MK10 9JQ.', 'WED 4.45-5.45PM', '9-17', '10', 'In our Red Club groups we aim to teach our players the basics in a fun environment, with plenty of fun games to break up the learning.\r\nThroughout a term we will cover the main four shots in tennis: forehand, backhand, serve and volley.', 'Player1', 40, '38', 1, '2020-03-12 22:26:29', '2020-03-18 01:19:03'),
(7, 'tadpoles-2', 'There will be no coaching during half term (Monday Feb 13th - Sunday Feb 23rd 2020)', 'TADPOLES', '156', '0', 'SPRING 2020', NULL, 'School foundation and year 1', 'Jan 11th, 18th, 25th – Feb 1st,  8th, 15th, 29th - Mar 7th, 14th, 21st, 28th – Apr 4th', 'INDOORS at Oakgrove Leisure Centre, MK10 9JQ', 'Saturday 9-10am', '8-11', '10', 'Course Cost: £84 - if paid up front (£7 per session) - The course price will change weekly to represent the number of weeks remaining in the course \r\nDrop in cost: £8.50 (pay on the day). You can only PAYG for a maximum of 1 time before advanced booking r', NULL, 21, '', 1, '2020-03-19 01:18:20', '2020-03-20 01:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `course_dates`
--

CREATE TABLE `course_dates` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `course_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_dates`
--

INSERT INTO `course_dates` (`id`, `course_id`, `course_date`, `display_course`, `created_at`, `updated_at`) VALUES
(119, 3, '2020-03-19', '', '2020-03-19 06:29:42', '2020-03-19 06:29:42'),
(120, 3, '2020-03-11', '1', '2020-03-19 06:29:42', '2020-03-19 06:29:42'),
(121, 3, '2020-03-17', '1', '2020-03-19 06:29:42', '2020-03-19 06:29:42'),
(122, 8, '2020-03-13', '1', '2020-03-19 06:31:36', '2020-03-19 06:31:36'),
(124, 9, '2020-03-27', '1', '2020-03-19 06:36:02', '2020-03-19 06:36:02'),
(125, 9, '2020-03-27', '1', '2020-03-19 06:36:02', '2020-03-19 06:36:02'),
(126, 1, '2020-03-19', '1', '2020-03-20 01:25:26', '2020-03-20 01:25:26'),
(127, 1, '2020-03-28', '1', '2020-03-20 01:25:26', '2020-03-20 01:25:26'),
(128, 1, '2020-04-02', '1', '2020-03-20 01:25:26', '2020-03-20 01:25:26'),
(129, 1, '2020-03-02', '1', '2020-03-20 01:25:26', '2020-03-20 01:25:26'),
(130, 1, '2020-03-13', '1', '2020-03-20 01:25:26', '2020-03-20 01:25:26'),
(131, 1, '2020-04-09', '1', '2020-03-20 01:25:26', '2020-03-20 01:25:26'),
(132, 1, '2020-04-16', '1', '2020-03-20 01:25:26', '2020-03-20 01:25:26'),
(133, 1, '2020-04-23', '1', '2020-03-20 01:25:26', '2020-03-20 01:25:26'),
(134, 1, '2020-04-30', '1', '2020-03-20 01:25:26', '2020-03-20 01:25:26'),
(135, 2, '2020-03-14', '1', '2020-03-20 01:25:38', '2020-03-20 01:25:38'),
(136, 2, '2020-03-28', '', '2020-03-20 01:25:38', '2020-03-20 01:25:38'),
(137, 7, '2020-03-12', '1', '2020-03-20 01:25:47', '2020-03-20 01:25:47'),
(138, 7, '2020-03-19', '1', '2020-03-20 01:25:47', '2020-03-20 01:25:47'),
(139, 7, '2020-03-27', '1', '2020-03-20 01:25:47', '2020-03-20 01:25:47'),
(140, 7, '2020-03-20', '1', '2020-03-20 01:25:47', '2020-03-20 01:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `custom_packages`
--

CREATE TABLE `custom_packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `no_of_hours` int(11) DEFAULT NULL,
  `no_of_days` int(11) DEFAULT NULL,
  `menus` longtext COLLATE utf8mb4_unicode_ci,
  `price_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_person` int(11) DEFAULT NULL,
  `max_person` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `amenities` text COLLATE utf8mb4_unicode_ci,
  `events` text COLLATE utf8mb4_unicode_ci,
  `games` text COLLATE utf8mb4_unicode_ci,
  `package_id` int(11) NOT NULL DEFAULT '0',
  `vendor_id` int(11) DEFAULT NULL,
  `business_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_packages`
--

INSERT INTO `custom_packages` (`id`, `title`, `slug`, `description`, `category_id`, `user_id`, `price`, `no_of_hours`, `no_of_days`, `menus`, `price_type`, `min_person`, `max_person`, `status`, `created_at`, `updated_at`, `amenities`, `events`, `games`, `package_id`, `vendor_id`, `business_id`) VALUES
(2, 'My Wedding Custom Package', NULL, NULL, 1, 32, 5000, NULL, NULL, NULL, NULL, 120, 100, 2, '2020-01-14 04:48:11', '2020-01-14 04:55:27', '', '["2","3","5","11","17"]', '["4"]', 55, 31, 1),
(3, 'Lorem ipsum dolor sit', NULL, NULL, 1, 32, 3000, NULL, NULL, NULL, NULL, 120, 500, 3, '2020-01-14 05:06:00', '2020-01-14 05:46:08', '["11"]', '["2","3"]', '["4","7","12"]', 0, 31, 1),
(4, 'Lorem ipsum dolor sit', NULL, NULL, 1, 32, 5000, NULL, NULL, NULL, NULL, 120, 500, 3, '2020-01-14 05:48:41', '2020-01-14 06:35:38', '["11"]', '["2","3","11","17"]', '["4","7","12"]', 0, 31, 1),
(5, 'Lorem ipsum dolor sit', NULL, NULL, 11, 32, 12000, NULL, NULL, NULL, NULL, 12, 150, 1, '2020-01-15 06:26:13', '2020-01-15 06:26:13', '["11"]', '["2"]', '["4"]', 0, 31, 24),
(6, 'Lorem ipsum dolor sit', NULL, NULL, 11, 32, 12000, NULL, NULL, NULL, NULL, 12, 150, 1, '2020-01-15 06:26:36', '2020-01-15 06:26:36', '["11"]', '["2"]', '["4"]', 0, 31, 24),
(7, 'Lorem ipsum dolor sit', NULL, NULL, 11, 32, 12000, NULL, NULL, NULL, NULL, 12, 150, 1, '2020-01-15 06:28:12', '2020-01-15 06:28:12', '["11"]', '["2"]', '["4"]', 0, 31, 24),
(8, 'Lorem ipsum dolor sit', NULL, NULL, 11, 32, 12000, NULL, NULL, NULL, NULL, 12, 150, 1, '2020-01-15 06:28:37', '2020-01-15 06:28:37', '["11"]', '["2"]', '["4"]', 0, 31, 24),
(9, 'Lorem ipsum dolor sit', NULL, NULL, 11, 32, 12000, NULL, NULL, NULL, NULL, 12, 150, 1, '2020-01-15 06:30:07', '2020-01-15 06:30:07', '["11"]', '["2"]', '["4"]', 0, 31, 24),
(10, 'Lorem ipsum dolor sit', NULL, NULL, 11, 32, 12000, NULL, NULL, NULL, NULL, 12, 150, 2, '2020-01-15 06:32:47', '2020-01-15 06:38:52', '["11"]', '["2"]', '["4"]', 56, 31, 24),
(11, 'Sample 1', NULL, NULL, 11, 32, 5000, NULL, NULL, NULL, NULL, 120, 500, 2, '2020-01-15 06:44:02', '2020-01-15 06:45:14', '["11"]', '["2"]', '["4","7"]', 57, 31, 24),
(12, 'Birthday Bash', NULL, NULL, 1, 60, 1000, NULL, NULL, NULL, NULL, 10, 100, 1, '2020-02-12 10:52:07', '2020-02-12 10:52:07', '["11"]', '["2","3"]', '["4","7"]', 0, 31, 1);

-- --------------------------------------------------------

--
-- Table structure for table `default_tasks`
--

CREATE TABLE `default_tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `task` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `event_id` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `default_tasks`
--

INSERT INTO `default_tasks` (`id`, `parent`, `task`, `description`, `event_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 0, '8 weeks before', NULL, 17, 0, '2020-02-19 04:39:44', '2020-02-19 04:39:44'),
(2, 1, 'Begin considering themes and locations.', NULL, 17, 0, '2020-02-19 04:40:18', '2020-02-19 04:40:18'),
(3, 1, 'Compile preliminary guest list.', NULL, 17, 0, '2020-02-19 04:40:33', '2020-02-19 04:40:33'),
(4, 0, '7 weeks before', NULL, 17, 0, '2020-02-19 04:40:52', '2020-02-19 04:40:52'),
(5, 4, 'Finalize theme and location.', NULL, 17, 0, '2020-02-19 04:41:49', '2020-02-19 04:41:49'),
(6, 4, 'Reserve any rentals you may need (extra chairs, tables, etc.).', NULL, 17, 0, '2020-02-19 04:42:11', '2020-02-19 04:42:11'),
(7, 4, 'Lock in party date and finalize guest list.', NULL, 17, 0, '2020-02-19 04:42:53', '2020-02-19 04:42:53'),
(8, 4, 'Send invitations.', NULL, 17, 0, '2020-02-19 04:43:10', '2020-02-19 04:43:10'),
(9, 4, 'Begin gathering inspiration and researching food, activities, and décor.', NULL, 17, 0, '2020-02-19 04:43:29', '2020-02-19 04:43:29'),
(10, 4, 'Book performers (if applicable).', NULL, 17, 0, '2020-02-19 04:43:44', '2020-02-19 04:43:44'),
(11, 0, '4 weeks before', NULL, 17, 0, '2020-02-19 04:43:58', '2020-02-19 04:43:58'),
(12, 11, 'Begin compiling music playlist if applicable.', NULL, 17, 0, '2020-02-19 04:44:17', '2020-02-19 04:44:17'),
(13, 11, 'Plan menu and shopping list.', NULL, 17, 0, '2020-02-19 04:44:32', '2020-02-19 04:44:32'),
(14, 11, 'Order cake/cupcakes.', NULL, 17, 0, '2020-02-19 04:44:54', '2020-02-19 04:44:54'),
(15, 11, 'Review tableware and assess needs.', NULL, 17, 0, '2020-02-19 04:45:10', '2020-02-19 04:45:10'),
(16, 0, '3 weeks before', NULL, 17, 0, '2020-02-19 04:45:31', '2020-02-19 04:45:31'),
(17, 16, 'Purchase/order decorations, party supplies, favors, and gift bags.', NULL, 17, 0, '2020-02-19 04:45:47', '2020-02-19 04:45:47'),
(18, 16, 'Buy non-perishable menu items.', NULL, 17, 0, '2020-02-19 04:46:01', '2020-02-19 04:46:01'),
(19, 16, 'Select, borrow, or buy serveware (cake stands, baskets, etc.).', NULL, 17, 0, '2020-02-19 04:46:14', '2020-02-19 04:46:14'),
(20, 0, '2 weeks before', NULL, 17, 0, '2020-02-19 04:46:27', '2020-02-19 04:46:27'),
(21, 20, 'Begin compiling food-shopping list.', NULL, 17, 0, '2020-02-19 04:48:23', '2020-02-19 04:48:23'),
(22, 20, 'Choose party outfits.', NULL, 17, 0, '2020-02-19 04:48:36', '2020-02-19 04:48:36'),
(23, 20, 'Create schedule for activities/entertainment.', NULL, 17, 0, '2020-02-19 04:48:55', '2020-02-19 04:48:55'),
(24, 20, 'Create, buy, or borrow any additional risers and props for food table.', NULL, 17, 0, '2020-02-19 04:49:12', '2020-02-19 04:49:12'),
(25, 20, 'Personalize and print out Printables for favors, food labels, signage.', NULL, 17, 0, '2020-02-19 04:49:28', '2020-02-19 04:49:28'),
(26, 0, '1 week before', NULL, 17, 0, '2020-02-19 04:49:46', '2020-02-19 04:49:46'),
(27, 26, 'Clean party serveware.', NULL, 17, 0, '2020-02-19 04:50:14', '2020-02-19 04:50:14'),
(28, 26, 'Create timeline for food assembly.', 'description', 17, 0, '2020-02-19 04:50:30', '2020-02-21 09:55:18'),
(29, 26, 'Plan tablescapes for dining and food display.', NULL, 17, 0, '2020-02-19 04:50:46', '2020-02-19 04:50:46'),
(30, 26, 'Finalize RSVPs.', NULL, 17, 0, '2020-02-19 05:58:31', '2020-02-19 05:58:31'),
(31, 0, '2 days before', NULL, 17, 0, '2020-02-19 05:58:46', '2020-02-19 05:58:46'),
(32, 31, 'Purchase any last-minute party supplies and equipment.', NULL, 17, 0, '2020-02-19 05:59:07', '2020-02-19 05:59:07'),
(33, 31, 'Organize and stage activity set-up(s).', NULL, 17, 0, '2020-02-19 05:59:21', '2020-02-19 05:59:21'),
(34, 31, 'Confirm services with any entertainers.', NULL, 17, 0, '2020-02-19 05:59:39', '2020-02-19 05:59:39'),
(35, 31, 'Charge camera.', NULL, 17, 0, '2020-02-19 06:01:04', '2020-02-19 06:01:04'),
(36, 0, '1 day before', NULL, 17, 0, '2020-02-19 06:01:23', '2020-02-19 06:01:23'),
(37, 36, 'Buy last-minute perishable items, including ice.', 'sqerrrrrrrrrrrrrrr', 17, 0, '2020-02-19 06:01:43', '2020-02-21 09:54:22'),
(38, 36, 'Set tables and arrange displays.', 'rwerer', 17, 0, '2020-02-19 06:01:57', '2020-02-21 09:54:11'),
(39, 36, 'Set up any large supplies and non-perishable decorations.', NULL, 17, 0, '2020-02-19 06:02:11', '2020-02-19 06:02:11'),
(40, 36, 'Chill drinks.', NULL, 17, 0, '2020-02-19 06:03:32', '2020-02-19 06:03:32'),
(41, 36, 'Pick up flowers and arrange if applicable.', NULL, 17, 0, '2020-02-19 06:03:46', '2020-02-19 06:03:46'),
(42, 36, 'Print out gift tracker.', NULL, 17, 0, '2020-02-19 06:04:13', '2020-02-19 06:04:13'),
(43, 36, '1 week before', NULL, 17, 0, '2020-02-19 06:04:29', '2020-02-19 06:04:29'),
(44, 0, 'the Big day !!', NULL, 17, 0, '2020-02-19 06:04:55', '2020-02-19 06:04:55'),
(45, 44, 'Inflate and arrange balloons early in the morning.', NULL, 17, 0, '2020-02-19 06:05:16', '2020-02-19 06:05:16'),
(46, 44, 'Set up flower arrangements and other last-minute decorations.', NULL, 17, 0, '2020-02-19 06:05:36', '2020-02-19 06:05:36'),
(47, 44, 'Finesse final set-up.', NULL, 17, 0, '2020-02-19 06:06:22', '2020-02-19 06:06:22'),
(48, 44, 'Turn on the music and party lights.', NULL, 17, 0, '2020-02-19 06:07:27', '2020-02-19 06:07:27'),
(49, 0, 'Event Pre-Planning', 'null', 0, 0, '2020-02-21 08:59:18', '2020-02-21 08:59:18'),
(50, 49, 'Objectives', 'test', 0, 0, '2020-02-21 09:07:14', '2020-02-21 09:07:14'),
(51, 49, 'Audience', 'ssssssssssssss', 0, 0, '2020-02-21 09:07:43', '2020-02-21 09:07:43'),
(52, 49, 'Message of the Event', 'test', 0, 0, '2020-02-21 09:08:00', '2020-02-21 09:08:00'),
(53, 49, 'Costs', 'Costs', 0, 0, '2020-02-21 09:08:19', '2020-02-21 09:08:19'),
(54, 49, 'Dates', 'Dates', 0, 0, '2020-02-21 09:08:36', '2020-02-21 09:08:36'),
(55, 49, 'Location', 'Location', 0, 0, '2020-02-21 09:08:51', '2020-02-21 09:08:51'),
(56, 0, 'Types of Invitations', 'null', 0, 0, '2020-02-21 09:09:09', '2020-02-21 09:09:09'),
(57, 56, 'Phoned', 'Phoned', 0, 0, '2020-02-21 09:09:38', '2020-02-21 09:09:38'),
(58, 56, 'E-mailed', 'E-mailed', 0, 0, '2020-02-21 09:09:58', '2020-02-21 09:09:58'),
(59, 56, 'Printed, informal', 'Printed, informal description', 0, 0, '2020-02-21 09:10:22', '2020-02-21 09:10:22'),
(60, 56, 'Printed, formal', 'Printed, formal descr', 0, 0, '2020-02-21 09:10:44', '2020-02-21 09:10:44'),
(61, 56, 'RSVP return card', 'RSVP return card description', 0, 0, '2020-02-21 09:11:05', '2020-02-21 09:11:05'),
(62, 56, 'RSVP by telephone', 'RSVP by telephone', 0, 0, '2020-02-21 09:11:21', '2020-02-21 09:11:21'),
(63, 56, 'Reminder mailing', 'Reminder mailing', 0, 0, '2020-02-21 09:11:37', '2020-02-21 09:11:37'),
(64, 0, 'Event Program', 'null', 0, 0, '2020-02-21 09:11:54', '2020-02-21 09:11:54'),
(65, 64, 'Topics', 'Topics Desc', 0, 0, '2020-02-21 09:12:26', '2020-02-21 09:12:26'),
(66, 64, 'Speakers', 'Speakers DESC', 0, 0, '2020-02-21 09:12:44', '2020-02-21 09:12:44'),
(67, 64, 'Speaker contact', 'test', 0, 0, '2020-02-21 09:13:01', '2020-02-21 09:13:01'),
(68, 64, 'Speaker agreements, honoraria', 'Speaker agreements, honoraria desc', 0, 0, '2020-02-21 09:13:20', '2020-02-21 09:13:20'),
(69, 64, 'Equipment needed', 'Equipment needed DESC', 0, 0, '2020-02-21 09:13:37', '2020-02-21 09:13:37'),
(70, 64, 'Biographies', 'Biographies DESC', 0, 0, '2020-02-21 09:13:54', '2020-02-21 09:13:54'),
(71, 64, 'Introductions', 'Introductions DESC', 0, 0, '2020-02-21 09:14:11', '2020-02-21 09:14:11'),
(72, 0, 'People Logistics', 'null', 0, 0, '2020-02-21 09:14:34', '2020-02-21 09:14:34'),
(73, 72, 'Hospitality', 'Hospitality DESC', 0, 0, '2020-02-21 09:14:56', '2020-02-21 09:14:56'),
(74, 72, 'Transportation', 'Transportation DESC', 0, 0, '2020-02-21 09:15:21', '2020-02-21 09:15:21'),
(75, 72, 'Accommodation', 'Accommodation DESC', 0, 0, '2020-02-21 09:15:38', '2020-02-21 09:15:38'),
(76, 72, 'Mementos', 'Mementos DESC', 0, 0, '2020-02-21 09:15:58', '2020-02-21 09:15:58'),
(77, 0, 'Event Venue Facilities', 'null', 0, 0, '2020-02-21 09:16:19', '2020-02-21 09:16:19'),
(78, 77, 'Number of people', 'Number of people DESC', 0, 0, '2020-02-21 09:16:42', '2020-02-21 09:16:42'),
(79, 77, 'Auditorium-type seating', 'Auditorium-type seating desc', 0, 0, '2020-02-21 09:17:18', '2020-02-21 09:17:18'),
(80, 77, 'Conference room seating', 'Conference room seating desc', 0, 0, '2020-02-21 09:17:41', '2020-02-21 09:17:41'),
(81, 77, 'Table shapes: O, U, V', 'Table shapes: O, U, V desc', 0, 0, '2020-02-21 09:18:00', '2020-02-21 09:18:00'),
(82, 77, 'Menu service needed', 'Menu service needed desc', 0, 0, '2020-02-21 09:18:21', '2020-02-21 09:18:21'),
(83, 77, 'Parking', 'Parking descr', 0, 0, '2020-02-21 09:18:40', '2020-02-21 09:18:40'),
(84, 77, 'Directional signs', 'Directional signs Desc', 0, 0, '2020-02-21 09:18:57', '2020-02-21 09:18:57'),
(85, 77, 'Marquee sign(s)', 'Marquee sign(s) Descc', 0, 0, '2020-02-21 09:19:16', '2020-02-21 09:19:16'),
(86, 0, 'Equipment Requirements', 'null', 0, 0, '2020-02-21 09:24:14', '2020-02-21 09:24:14'),
(87, 86, 'Lectern', 'Lectern', 0, 0, '2020-02-21 09:24:46', '2020-02-21 09:24:46'),
(88, 86, 'Podium', 'Podium', 0, 0, '2020-02-21 09:25:18', '2020-02-21 09:25:18'),
(89, 86, 'Public address system', 'Public address system', 0, 0, '2020-02-21 09:25:34', '2020-02-21 09:25:34'),
(90, 86, 'Microphone(s): Neck, podium, table, floor', 'Microphone(s): Neck, podium, table, floor', 0, 0, '2020-02-21 09:25:46', '2020-02-21 09:25:46'),
(91, 86, 'Raised platform', 'Raised platform', 0, 0, '2020-02-21 09:25:56', '2020-02-21 09:25:56'),
(92, 86, 'Projection screen', 'Projection screen', 0, 0, '2020-02-21 09:26:08', '2020-02-21 09:26:08'),
(93, 86, 'Video projector', 'Video projector', 0, 0, '2020-02-21 09:26:17', '2020-02-21 09:26:17'),
(94, 86, 'Remote control cord', 'Remote control cord', 0, 0, '2020-02-21 09:26:26', '2020-02-21 09:26:26'),
(95, 86, 'Overhead projector', 'Overhead projector', 0, 0, '2020-02-21 09:26:35', '2020-02-21 09:26:35'),
(96, 86, 'Flip charts, markers', 'Flip charts, markers', 0, 0, '2020-02-21 09:26:44', '2020-02-21 09:26:44'),
(97, 86, 'Extension cords', 'Extension cords', 0, 0, '2020-02-21 09:26:53', '2020-02-21 09:26:53'),
(98, 86, 'DVD player and monitor:', 'DVD player and monitor:', 0, 0, '2020-02-21 09:27:02', '2020-02-21 09:27:02'),
(99, 86, 'Lap top to Screen', 'Lap top to Screen', 0, 0, '2020-02-21 09:27:10', '2020-02-21 09:27:10'),
(100, 0, 'Event Food & Beverage Arrangements', 'null', 0, 0, '2020-02-21 09:27:25', '2020-02-21 09:27:25'),
(101, 100, 'Menu selection', 'Menu selection', 0, 0, '2020-02-21 09:27:41', '2020-02-21 09:27:41'),
(102, 100, 'Caterers', 'Caterers', 0, 0, '2020-02-21 09:27:51', '2020-02-21 09:27:51'),
(103, 100, 'Schedule', 'Schedule', 0, 0, '2020-02-21 09:28:06', '2020-02-21 09:28:06'),
(104, 100, 'Type service (buffet, seated)', 'Type service (buffet, seated)', 0, 0, '2020-02-21 09:28:15', '2020-02-21 09:28:15'),
(105, 100, 'Tables for 6, 8, 10', 'Tables for 6, 8, 10', 0, 0, '2020-02-21 09:28:24', '2020-02-21 09:28:24'),
(106, 100, 'Head table', 'Head table', 0, 0, '2020-02-21 09:28:32', '2020-02-21 09:28:32'),
(107, 100, 'Place cards', 'Place cards', 0, 0, '2020-02-21 09:28:43', '2020-02-21 09:28:43'),
(108, 100, 'Seating diagrams', 'Seating diagrams', 0, 0, '2020-02-21 09:28:51', '2020-02-21 09:28:51'),
(109, 100, 'Beverages', 'Beverages', 0, 0, '2020-02-21 09:28:59', '2020-02-21 09:28:59'),
(110, 100, 'Hospitality room service', 'Hospitality room service', 0, 0, '2020-02-21 09:29:09', '2020-02-21 09:29:09'),
(111, 0, 'Publicity & Promotion Considerations', 'null', 0, 0, '2020-02-21 09:29:17', '2020-02-21 09:29:17'),
(112, 111, 'Mailing lists', 'Mailing lists', 0, 0, '2020-02-21 09:29:34', '2020-02-21 09:29:34'),
(113, 111, 'Promotional mailings', 'Promotional mailings', 0, 0, '2020-02-21 09:29:50', '2020-02-21 09:29:50'),
(114, 111, 'Posters, flyers', 'Posters, flyers', 0, 0, '2020-02-21 09:29:57', '2020-02-21 09:29:57'),
(115, 111, 'Advertising', 'Advertising', 0, 0, '2020-02-21 09:30:04', '2020-02-21 09:30:04'),
(116, 111, 'Media contact', 'Media contact', 0, 0, '2020-02-21 09:30:17', '2020-02-21 09:30:17'),
(117, 111, 'Media fact sheets', 'Media fact sheets', 0, 0, '2020-02-21 09:30:25', '2020-02-21 09:30:25'),
(118, 111, 'News releases', 'News releases', 0, 0, '2020-02-21 09:30:41', '2020-02-21 09:30:41'),
(119, 111, 'Talk show appearances', 'Talk show appearances', 0, 0, '2020-02-21 09:30:49', '2020-02-21 09:30:49'),
(120, 111, 'Press packets', 'Press packets', 0, 0, '2020-02-21 09:30:57', '2020-02-21 09:30:57'),
(121, 111, 'Press room', 'Press room', 0, 0, '2020-02-21 09:31:06', '2020-02-21 09:31:06'),
(122, 111, 'Special phone lines and internet connectivity for media', 'Special phone lines and internet connectivity for media', 0, 0, '2020-02-21 09:31:20', '2020-02-21 09:31:20'),
(123, 0, 'Event Photography', 'null', 0, 0, '2020-02-21 09:33:24', '2020-02-21 09:33:24'),
(124, 123, 'Stills', 'Stills', 0, 0, '2020-02-21 09:33:41', '2020-02-21 09:33:41'),
(125, 123, 'Video', 'Video', 0, 0, '2020-02-21 09:33:52', '2020-02-21 09:33:52'),
(126, 123, 'Hire photographer', 'Hire photographer', 0, 0, '2020-02-21 09:34:02', '2020-02-21 09:34:02'),
(127, 123, 'Shot list for photographer', 'Shot list for photographer', 0, 0, '2020-02-21 09:34:11', '2020-02-21 09:34:11'),
(128, 0, 'Printed Program', 'null', 0, 0, '2020-02-21 09:34:20', '2020-02-21 09:34:20'),
(129, 128, 'Agenda', 'Agenda', 0, 0, '2020-02-21 09:34:40', '2020-02-21 09:34:40'),
(130, 128, 'Speakers\' biographies & photos', 'Speakers\' biographies & photos', 0, 0, '2020-02-21 09:34:52', '2020-02-21 09:34:52'),
(131, 128, 'Organization information', 'Organization information', 0, 0, '2020-02-21 09:35:10', '2020-02-21 09:35:10'),
(132, 128, 'Lists of officers, committees', 'Lists of officers, committees', 0, 0, '2020-02-21 09:35:23', '2020-02-21 09:35:23'),
(133, 128, 'Lists of sponsors, contributors', 'Lists of sponsors, contributors', 0, 0, '2020-02-21 09:35:33', '2020-02-21 09:35:33'),
(134, 128, 'Design and printing', 'Design and printing', 0, 0, '2020-02-21 09:35:42', '2020-02-21 09:35:42'),
(135, 128, 'Quantity', 'Quantity', 0, 0, '2020-02-21 09:35:50', '2020-02-21 09:35:50'),
(136, 128, 'Distribution', 'Distribution', 0, 0, '2020-02-21 09:36:02', '2020-02-21 09:36:02'),
(137, 0, 'Registration', 'null', 0, 0, '2020-02-21 09:36:19', '2020-02-21 09:36:19'),
(138, 137, 'Registration form', 'Registration form', 0, 0, '2020-02-21 09:36:36', '2020-02-21 09:36:36'),
(139, 137, 'Bank account', 'Bank account', 0, 0, '2020-02-21 09:36:47', '2020-02-21 09:36:47'),
(140, 137, 'Reporting system', 'Reporting system', 0, 0, '2020-02-21 09:36:55', '2020-02-21 09:36:55'),
(141, 137, 'Registration confirmation', 'Registration confirmation', 0, 0, '2020-02-21 09:37:05', '2020-02-21 09:37:05'),
(142, 0, 'On-site Registration', 'null', 0, 0, '2020-02-21 09:37:16', '2020-02-21 09:37:16'),
(143, 142, 'Pre-registration list', 'Pre-registration list', 0, 0, '2020-02-21 09:37:32', '2020-02-21 09:37:32'),
(144, 142, 'Tables', 'Tables', 0, 0, '2020-02-21 09:37:41', '2020-02-21 09:37:41'),
(145, 142, 'Computers, collateral equipment', 'Computers, collateral equipment', 0, 0, '2020-02-21 09:37:53', '2020-02-21 09:37:53'),
(146, 142, 'Personnel', 'Personnel', 0, 0, '2020-02-21 09:38:02', '2020-02-21 09:38:02'),
(147, 142, 'Cash receipts', 'Cash receipts', 0, 0, '2020-02-21 09:38:09', '2020-02-21 09:38:09'),
(148, 142, 'Programs', 'Programs', 0, 0, '2020-02-21 09:38:21', '2020-02-21 09:38:21'),
(149, 142, 'Name badges', 'Name badges', 0, 0, '2020-02-21 09:38:29', '2020-02-21 09:38:29'),
(150, 142, 'Goodie Bags', 'Goodie Bags', 0, 0, '2020-02-21 09:38:41', '2020-02-21 09:38:41'),
(151, 142, 'Ticket sales', 'Ticket sales', 0, 0, '2020-02-21 09:38:51', '2020-02-21 09:38:51'),
(152, 142, 'Host identification', 'Host identification', 0, 0, '2020-02-21 09:39:02', '2020-02-21 09:39:02'),
(153, 142, 'Venue signage', 'Venue signage', 0, 0, '2020-02-21 09:39:14', '2020-02-21 09:39:14'),
(154, 0, 'Transportation', 'null', 0, 0, '2020-02-21 09:39:22', '2020-02-21 09:39:22'),
(155, 154, 'For equipment', 'For equipment', 0, 0, '2020-02-21 09:39:35', '2020-02-21 09:39:35'),
(156, 154, 'Lease or charter vehicles', 'Lease or charter vehicles', 0, 0, '2020-02-21 09:39:44', '2020-02-21 09:39:44'),
(157, 154, 'To and from parking areas', 'To and from parking areas', 0, 0, '2020-02-21 09:39:54', '2020-02-21 09:39:54'),
(158, 154, 'For speakers & special guests', 'For speakers & special guests', 0, 0, '2020-02-21 09:40:02', '2020-02-21 09:40:02'),
(159, 154, 'Between locations', 'Between locations', 0, 0, '2020-02-21 09:40:11', '2020-02-21 09:40:11'),
(160, 154, 'Signs on vehicles', 'Signs on vehicles', 0, 0, '2020-02-21 09:40:20', '2020-02-21 09:40:20'),
(161, 154, 'Publish or post schedules', 'Publish or post schedules', 0, 0, '2020-02-21 09:40:30', '2020-02-21 09:40:30'),
(162, 0, 'Escorts or Guides', 'null', 0, 0, '2020-02-21 09:40:43', '2020-02-21 09:40:43'),
(163, 162, 'For speakers', 'For speakers', 0, 0, '2020-02-21 09:41:18', '2020-02-21 09:41:18'),
(164, 162, 'For special guests', 'For special guests', 0, 0, '2020-02-21 09:41:28', '2020-02-21 09:41:28'),
(165, 162, 'For tours, exhibits, etc.', 'For tours, exhibits, etc.', 0, 0, '2020-02-21 09:41:40', '2020-02-21 09:41:40'),
(166, 162, 'Aboard shuttles / buses when needed', 'Aboard shuttles / buses when needed', 0, 0, '2020-02-21 09:41:54', '2020-02-21 09:41:54'),
(167, 0, 'Event Decor', 'null', 0, 0, '2020-02-21 09:42:02', '2020-02-21 09:42:02'),
(168, 167, 'Set the theme', 'Set the theme', 0, 0, '2020-02-21 09:42:16', '2020-02-21 09:42:16'),
(169, 167, 'Entrances and exits', 'Entrances and exits', 0, 0, '2020-02-21 09:42:27', '2020-02-21 09:42:27'),
(170, 167, 'Speaker platform', 'Speaker platform', 0, 0, '2020-02-21 09:42:36', '2020-02-21 09:42:36'),
(171, 167, 'Head tables', 'Head tables', 0, 0, '2020-02-21 09:42:44', '2020-02-21 09:42:44'),
(172, 167, 'Dining tables', 'Dining tables', 0, 0, '2020-02-21 09:42:52', '2020-02-21 09:42:52'),
(173, 167, 'Hospitality suite', 'Hospitality suite', 0, 0, '2020-02-21 09:43:00', '2020-02-21 09:43:00'),
(174, 0, 'Access Ticketing', 'null', 0, 0, '2020-02-21 09:43:08', '2020-02-21 09:43:08'),
(175, 174, 'Prices', 'Prices', 0, 0, '2020-02-21 09:43:19', '2020-02-21 09:43:19'),
(176, 174, 'Advance sales', 'Advance sales', 0, 0, '2020-02-21 09:43:27', '2020-02-21 09:43:27'),
(177, 174, 'Printing', 'Printing', 0, 0, '2020-02-21 09:43:36', '2020-02-21 09:43:36'),
(178, 174, 'Distribution', 'Distribution', 0, 0, '2020-02-21 09:43:50', '2020-02-21 09:43:50'),
(179, 174, 'Sales reports', 'Sales reports', 0, 0, '2020-02-21 09:43:57', '2020-02-21 09:43:57'),
(180, 174, 'Ticket and money control', 'Ticket and money control', 0, 0, '2020-02-21 09:44:05', '2020-02-21 09:44:05'),
(181, 174, 'Complimentary tickets', 'Complimentary tickets', 0, 0, '2020-02-21 09:44:14', '2020-02-21 09:44:14'),
(182, 174, 'Press tickets', 'Press tickets', 0, 0, '2020-02-21 09:44:21', '2020-02-21 09:44:21'),
(183, 174, 'Sales at doors', 'Sales at doors', 0, 0, '2020-02-21 09:44:30', '2020-02-21 09:44:30'),
(184, 174, 'Collection at events', 'Collection at events', 0, 0, '2020-02-21 09:44:42', '2020-02-21 09:44:42'),
(185, 0, 'Additional Considerations', 'null', 0, 0, '2020-02-21 09:44:52', '2020-02-21 09:44:52'),
(186, 185, 'Valet parking', 'Valet parking', 0, 0, '2020-02-21 09:45:12', '2020-02-21 09:45:12'),
(187, 185, 'Bad weather planning', 'Bad weather planning', 0, 0, '2020-02-21 09:45:20', '2020-02-21 09:45:20'),
(188, 185, 'Exhibits, displays', 'Exhibits, displays', 0, 0, '2020-02-21 09:45:41', '2020-02-21 09:45:41'),
(189, 185, 'Security', 'Security', 0, 0, '2020-02-21 09:45:50', '2020-02-21 09:45:50'),
(190, 185, 'Technicians for equipment', 'Technicians for equipment', 0, 0, '2020-02-21 09:47:10', '2020-02-21 09:47:10'),
(191, 185, 'Disaster management', 'Disaster management', 0, 0, '2020-02-21 09:47:40', '2020-02-21 09:47:40'),
(192, 185, 'Ambulance on stand-by', 'Ambulance on stand-by', 0, 0, '2020-02-21 09:47:50', '2020-02-21 09:47:50'),
(193, 185, 'Police, traffic control, security', 'Police, traffic control, security', 0, 0, '2020-02-21 09:47:57', '2020-02-21 09:47:57'),
(194, 0, '6 – 1 2 MONTHS AHEAD', 'null', 18, 0, '2020-02-24 01:57:26', '2020-02-24 01:57:26'),
(195, 194, 'Select Anniversary Party Date and approximate time', 'Select Anniversary Party Date and approximate time', 18, 0, '2020-02-24 01:57:44', '2020-02-24 01:57:44'),
(196, 194, 'Discuss Party Budget and who will be paying', 'Discuss Party Budget and who will be paying', 18, 0, '2020-02-24 01:57:53', '2020-02-24 01:57:53'),
(197, 194, 'Agree on Guest List and the style of the party  ', 'Agree on Guest List and the style of the party  ', 18, 0, '2020-02-24 01:58:07', '2020-02-24 01:58:07'),
(198, 194, 'Choose and book the party venue ', 'Choose and book the party venue ', 18, 0, '2020-02-24 01:58:19', '2020-02-24 01:58:19'),
(199, 194, 'Choose and book Photographer &/or Videographer', 'Choose and book Photographer &/or Videographer', 18, 0, '2020-02-24 01:58:34', '2020-02-24 01:58:34'),
(200, 194, 'Organize the catering', 'Organize the catering', 18, 0, '2020-02-24 01:58:46', '2020-02-24 01:58:46'),
(201, 194, 'Select and book any transport needed for the anniversary couple', 'Select and book any transport needed for the anniversary couple', 18, 0, '2020-02-24 01:58:58', '2020-02-24 01:58:58'),
(202, 194, 'Select your florist and discuss the colors and theme  ', 'Select your florist and discuss the colors and theme  ', 18, 0, '2020-02-24 01:59:10', '2020-02-24 01:59:10'),
(203, 194, 'Select the entertainment ', 'Select the entertainment ', 18, 0, '2020-02-24 01:59:21', '2020-02-24 01:59:21'),
(204, 194, 'Consider Invitations and decide if making them yourself ', 'Consider Invitations and decide if making them yourself ', 18, 0, '2020-02-24 01:59:30', '2020-02-24 01:59:30'),
(205, 0, '3 – 6 MONTHS AHEAD ', 'null', 18, 0, '2020-02-24 01:59:43', '2020-02-24 01:59:43'),
(206, 194, 'Order or make your anniversary invitations ', 'Order or make your anniversary invitations ', 18, 0, '2020-02-24 02:01:56', '2020-02-24 02:01:56'),
(207, 194, 'Order Hire Equipment – chairs, tables, etc ', 'Order Hire Equipment – chairs, tables, etc ', 18, 0, '2020-02-24 02:02:04', '2020-02-24 02:02:04'),
(208, 0, '2 MONTHS AHEAD ', 'null', 18, 0, '2020-02-24 02:02:12', '2020-02-24 02:02:12'),
(209, 208, 'Post or deliver all invitations', 'Post or deliver all invitations', 18, 0, '2020-02-24 02:02:24', '2020-02-24 02:02:24'),
(210, 208, 'Select an Anniversary Cake and order ', 'Select an Anniversary Cake and order ', 18, 0, '2020-02-24 02:02:33', '2020-02-24 02:02:33'),
(211, 208, 'Book any Accommodation or Transport needed for out of town guests ', 'Book any Accommodation or Transport needed for out of town guests ', 18, 0, '2020-02-24 02:02:48', '2020-02-24 02:02:48'),
(212, 208, 'Discuss and plan you photos with your Photographer/Videographer', 'Discuss and plan you photos with your Photographer/Videographer', 18, 0, '2020-02-24 02:03:00', '2020-02-24 02:03:00'),
(213, 0, '4 WEEKS AHEAD ', 'null', 18, 0, '2020-02-24 02:03:13', '2020-02-24 02:03:13'),
(214, 213, 'Check and confirm all bookings and arrangements ', 'Check and confirm all bookings and arrangements ', 18, 0, '2020-02-24 02:03:25', '2020-02-24 02:03:25'),
(215, 213, 'Buy wedding rings ', 'Buy wedding rings ', 18, 0, '2020-02-24 02:03:34', '2020-02-24 02:03:34'),
(216, 213, 'Plan seating arrangements ', 'Plan seating arrangements ', 18, 0, '2020-02-24 02:03:45', '2020-02-24 02:03:45'),
(217, 213, 'Ask speakers to prepare speeches ', 'Ask speakers to prepare speeches ', 18, 0, '2020-02-24 02:03:55', '2020-02-24 02:03:55'),
(218, 0, '2 WEEKS AHEAD ', 'null', 18, 0, '2020-02-24 02:04:03', '2020-02-24 02:04:03'),
(219, 208, 'Confirm venue booking and the numbers', 'Confirm venue booking and the numbers', 18, 0, '2020-02-24 02:04:14', '2020-02-24 02:04:14'),
(220, 0, '7 DAYS AHEAD', 'null', 18, 0, '2020-02-24 02:04:22', '2020-02-24 02:04:22'),
(221, 220, 'Confirm transportation', 'Confirm transportation', 18, 0, '2020-02-24 02:04:35', '2020-02-24 02:04:35'),
(222, 0, '1 DAY BEFORE', 'null', 18, 0, '2020-02-24 02:04:46', '2020-02-24 02:04:46'),
(223, 222, 'Lay out everything you will require on the party day', 'Lay out everything you will require on the party day', 18, 0, '2020-02-24 02:04:56', '2020-02-24 02:04:56'),
(224, 222, 'Confirm when Flowers and Cake are arriving', 'Confirm when Flowers and Cake are arriving', 18, 0, '2020-02-24 02:05:07', '2020-02-24 02:05:07'),
(225, 222, 'Sleep Well! ', 'Sleep Well! ', 18, 0, '2020-02-24 02:05:15', '2020-02-24 02:05:15'),
(226, 0, '8 Weeks Before', 'null', 4, 0, '2020-02-24 02:08:09', '2020-02-24 02:08:09'),
(227, 226, 'Decide who will plan the Baby Shower party.', 'Decide who will plan the Baby Shower party.', 4, 0, '2020-02-24 02:08:29', '2020-02-24 02:08:29'),
(228, 226, 'Set the budget', 'Set the budget', 4, 0, '2020-02-24 02:08:38', '2020-02-24 02:08:38'),
(229, 226, 'Decide on the date and time', 'Decide on the date and time', 4, 0, '2020-02-24 02:08:52', '2020-02-24 02:08:52'),
(230, 226, 'Choose the location', 'Choose the location', 4, 0, '2020-02-24 02:09:04', '2020-02-24 02:09:04'),
(231, 226, 'Make a Guest List', 'Make a Guest List', 4, 0, '2020-02-24 02:09:15', '2020-02-24 02:09:15'),
(232, 226, 'Ask the honoree where she has registered for gifts', 'Ask the honoree where she has registered for gifts', 4, 0, '2020-02-24 02:09:25', '2020-02-24 02:09:25'),
(233, 226, 'Choose the beverages', 'Choose the beverages', 4, 0, '2020-02-24 02:09:36', '2020-02-24 02:09:36'),
(234, 226, 'Start preparing the invitations', 'Start preparing the invitations', 4, 0, '2020-02-24 02:09:47', '2020-02-24 02:09:47'),
(235, 0, '6 Weeks Before', 'null', 4, 0, '2020-02-24 02:09:59', '2020-02-24 02:09:59'),
(236, 235, 'Choose the theme for the party', 'Choose the theme for the party', 4, 0, '2020-02-24 02:10:14', '2020-02-24 02:10:14'),
(237, 235, 'Send out the Baby Shower Invitations', 'Send out the Baby Shower Invitations', 4, 0, '2020-02-24 02:10:23', '2020-02-24 02:10:23'),
(238, 235, 'Choose your favors and decorations', 'Choose your favors and decorations', 4, 0, '2020-02-24 02:10:33', '2020-02-24 02:10:33'),
(239, 235, 'Choose your menu and beverages', 'Choose your menu and beverages', 4, 0, '2020-02-24 02:10:47', '2020-02-24 02:10:47'),
(240, 0, '5 Weeks Before', 'null', 4, 0, '2020-02-24 02:10:58', '2020-02-24 02:10:58'),
(241, 240, 'Ask for help if you need', 'Ask for help if you need', 4, 0, '2020-02-24 02:11:08', '2020-02-24 02:11:08'),
(242, 240, 'Order the cake ,flowers ,rental chairs etc. from an outside vendor', 'Order the cake ,flowers ,rental chairs etc. from an outside\r\nvendor', 4, 0, '2020-02-24 02:11:17', '2020-02-24 02:11:17'),
(243, 240, 'Prepare the thank you notes', 'Prepare the thank you notes', 4, 0, '2020-02-24 02:11:27', '2020-02-24 02:11:27'),
(244, 240, 'Choose the Baby Shower Games and buy some prizes', 'Choose the Baby Shower Games and buy some prizes', 4, 0, '2020-02-24 02:11:41', '2020-02-24 02:11:41'),
(245, 0, 'A Week Before', 'null', 4, 0, '2020-02-24 02:11:56', '2020-02-24 02:11:56'),
(246, 245, 'Follow up with guest who hasn’t responded and have your final guest list', 'Follow up with guest who hasn’t responded and have your final\r\nguest list', 4, 0, '2020-02-24 02:12:19', '2020-02-24 02:12:19'),
(247, 245, 'Print off any baby shower games that require each guest to have their own game sheet', 'Print off any baby shower games that require each guest to\r\nhave their own game sheet', 4, 0, '2020-02-24 02:12:31', '2020-02-24 02:12:31'),
(248, 245, 'Buy and wrap favors and prizes', 'Buy and wrap favors and prizes', 4, 0, '2020-02-24 02:12:51', '2020-02-24 02:12:51'),
(249, 245, 'Designate a photographer and prepare your video recorder and camera batteries', 'Designate a photographer and prepare your video recorder\r\nand camera batteries', 4, 0, '2020-02-24 02:13:00', '2020-02-24 02:13:00'),
(250, 0, '2 Days Before', 'null', 4, 0, '2020-02-24 02:13:09', '2020-02-24 02:13:09'),
(251, 250, 'Complete the grocery shopping', 'Complete the grocery shopping', 4, 0, '2020-02-24 02:13:25', '2020-02-24 02:13:25'),
(252, 250, 'Clean your house, or wherever you are planning to hold the baby shower', 'Clean your house, or wherever you are planning to hold the\r\nbaby shower', 4, 0, '2020-02-24 02:13:42', '2020-02-24 02:13:42'),
(253, 0, 'A Day Before', 'null', 4, 0, '2020-02-24 02:13:52', '2020-02-24 02:13:52'),
(254, 253, 'Set up the baby shower room the way you have planned it', 'Set up the baby shower room the way you have planned it', 4, 0, '2020-02-24 02:14:09', '2020-02-24 02:14:09'),
(255, 253, 'Decorate the party room', 'Decorate the party room', 4, 0, '2020-02-24 02:14:26', '2020-02-24 02:14:26'),
(256, 253, 'Pick up the cake, food, flower etc. that you ordered.', 'Pick up the cake, food, flower etc. that you ordered.', 4, 0, '2020-02-24 02:14:36', '2020-02-24 02:14:36'),
(257, 253, 'Prepare the Baby Shower food', 'Prepare the Baby Shower food', 4, 0, '2020-02-24 02:14:50', '2020-02-24 02:14:50'),
(258, 0, 'On the Baby Shower Day', 'null', 4, 0, '2020-02-24 02:14:59', '2020-02-24 02:14:59'),
(259, 258, 'Call the expectant mother and make sure she is ready for a party!', 'Call the expectant mother and make sure she is ready for a party!', 4, 0, '2020-02-24 02:15:14', '2020-02-24 02:15:14'),
(260, 258, 'Prepare the beverages', 'Prepare the beverages', 4, 0, '2020-02-24 02:15:24', '2020-02-24 02:15:24'),
(261, 258, 'Arrange the tables, food, and desert table', 'Arrange the tables, food, and desert table', 4, 0, '2020-02-24 02:15:36', '2020-02-24 02:15:36'),
(262, 258, 'Decorate your table with a centerpiece', 'Decorate your table with a centerpiece', 4, 0, '2020-02-24 02:15:46', '2020-02-24 02:15:46'),
(263, 258, 'Set out baby shower favors on a table', 'Set out baby shower favors on a table', 4, 0, '2020-02-24 02:16:50', '2020-02-24 02:16:50'),
(264, 258, 'Have all your baby shower game props, papers, prizes, and pens in one place so you know exactly where they are', 'Have all your baby shower game props, papers, prizes, and pens\r\nin one place so you know exactly where they are', 4, 0, '2020-02-24 02:17:02', '2020-02-24 02:17:02'),
(265, 258, 'Designate someone to help the expecting mom', 'Designate someone to help the expecting mom', 4, 0, '2020-02-24 02:17:13', '2020-02-24 02:17:13'),
(266, 0, '18 – 16 Months Ahead', 'null', 19, 0, '2020-02-24 02:19:04', '2020-02-24 02:19:04'),
(267, 266, 'Determine objectives of your event, planning committee and task assignments', 'Determine objectives of your event, planning committee and task assignments', 19, 0, '2020-02-24 02:20:26', '2020-02-24 02:20:26'),
(268, 266, 'Establish a preliminary budget and solicit sponsorship', 'Establish a preliminary budget and solicit sponsorship', 19, 0, '2020-02-24 02:20:39', '2020-02-24 02:20:39'),
(269, 266, 'City/venue search (several potential options that meet all requirements)', 'City/venue search (several potential options that meet all requirements)', 19, 0, '2020-02-24 02:20:50', '2020-02-24 02:20:50'),
(270, 266, 'Prepare and send Request for Proposal (RFP)', 'Prepare and send Request for Proposal (RFP)', 19, 0, '2020-02-24 02:20:57', '2020-02-24 02:20:57'),
(271, 266, 'Conduct site visits', 'Conduct site visits', 19, 0, '2020-02-24 02:21:06', '2020-02-24 02:21:06'),
(272, 266, 'Contract/deposits with chosen venues', 'Contract/deposits with chosen venues', 19, 0, '2020-02-24 02:21:14', '2020-02-24 02:21:14'),
(273, 266, 'Determine theme, if any', 'Determine theme, if any', 19, 0, '2020-02-24 02:21:22', '2020-02-24 02:21:22'),
(274, 266, 'Create a marketing plan, create website and choose registration platform', 'Create a marketing plan, create website and choose registration platform', 19, 0, '2020-02-24 02:21:30', '2020-02-24 02:21:30'),
(275, 266, 'Send “Save the Date” notices via email', 'Send “Save the Date” notices via email', 19, 0, '2020-02-24 02:21:38', '2020-02-24 02:21:38'),
(276, 266, 'Begin agenda format planning', 'Begin agenda format planning', 19, 0, '2020-02-24 02:21:45', '2020-02-24 02:21:45'),
(277, 266, 'Decide on special events (like golf outing, excursions, etc.)', 'Decide on special events (like golf outing, excursions, etc.)', 19, 0, '2020-02-24 02:21:53', '2020-02-24 02:21:53'),
(278, 266, 'Additional contracts (like hotel accommodations, transportation, equipment rental)', 'Additional contracts (like hotel accommodations, transportation, equipment rental)', 19, 0, '2020-02-24 02:22:02', '2020-02-24 02:22:02'),
(279, 0, '14 – 12 Months Ahead', 'null', 19, 0, '2020-02-24 02:22:08', '2020-02-24 02:22:08'),
(280, 279, 'Prepare session/speaker proposal submission form and distribute', 'Prepare session/speaker proposal submission form and distribute', 19, 0, '2020-02-24 02:22:22', '2020-02-24 02:22:22'),
(281, 279, 'Identify and secure speakers and their travel/housing arrangements', 'Identify and secure speakers and their travel/housing arrangements', 19, 0, '2020-02-24 02:22:35', '2020-02-24 02:22:35'),
(282, 279, 'Begin promoting conference theme, location and registration rates', 'Begin promoting conference theme, location and registration rates', 19, 0, '2020-02-24 02:22:42', '2020-02-24 02:22:42'),
(283, 279, 'Determine after-hour excursions (receptions, tours, special receptions, etc.) along with any additional pricing to include in registration', 'Determine after-hour excursions (receptions, tours, special receptions, etc.) along with any additional pricing to include in registration', 19, 0, '2020-02-24 02:22:50', '2020-02-24 02:22:50'),
(284, 279, 'Compile all information for registration site', 'Compile all information for registration site', 19, 0, '2020-02-24 02:22:59', '2020-02-24 02:22:59'),
(285, 0, '10 – 9 Months Ahead', 'null', 19, 0, '2020-02-24 02:23:06', '2020-02-24 02:23:06'),
(286, 285, 'Deadline for proposals to be received by review committee', 'Deadline for proposals to be received by review committee', 19, 0, '2020-02-24 02:23:15', '2020-02-24 02:23:15'),
(287, 285, 'Review proposals, select sessions and notify accepted and declined proposers', 'Review proposals, select sessions and notify accepted and declined proposers', 19, 0, '2020-02-24 02:23:24', '2020-02-24 02:23:24'),
(288, 285, 'Open registration and housing reservations to attendees', 'Open registration and housing reservations to attendees', 19, 0, '2020-02-24 02:23:31', '2020-02-24 02:23:31'),
(289, 0, '6 – 4 Months Ahead', 'null', 19, 0, '2020-02-24 02:23:40', '2020-02-24 02:23:40'),
(290, 289, 'Finalize program, speakers & agenda, update website', 'Finalize program, speakers & agenda, update website', 19, 0, '2020-02-24 02:24:05', '2020-02-24 02:24:05'),
(291, 289, 'Determine final print date', 'Determine final print date', 19, 0, '2020-02-24 02:24:11', '2020-02-24 02:24:11'),
(292, 289, 'Review audio-visual availability and needs', 'Review audio-visual availability and needs', 19, 0, '2020-02-24 02:24:26', '2020-02-24 02:24:26'),
(293, 289, 'Prepare “Day of Coordination” list', 'Prepare “Day of Coordination” list', 19, 0, '2020-02-24 02:24:36', '2020-02-24 02:24:36'),
(294, 289, 'Continue to update us', 'Continue to update us', 19, 0, '2020-02-24 02:24:44', '2020-02-24 02:24:44'),
(295, 0, '4 – 3 Months Ahead', 'null', 19, 0, '2020-02-24 02:26:15', '2020-02-24 02:26:15'),
(296, 295, 'Contact vendors to begin planning logistics (like A/V, menu, etc.)', 'Contact vendors to begin planning logistics (like A/V, menu, etc.)', 19, 0, '2020-02-24 02:26:34', '2020-02-24 02:26:34'),
(297, 295, 'Prepare session and post-event survey', 'Prepare session and post-event survey', 19, 0, '2020-02-24 02:26:45', '2020-02-24 02:26:45'),
(298, 0, '2 Months – 6 Weeks Ahead', 'null', 19, 0, '2020-02-24 02:26:53', '2020-02-24 02:26:53'),
(299, 298, 'Send reminders to speakers', 'Send reminders to speakers', 19, 0, '2020-02-24 02:27:08', '2020-02-24 02:27:08'),
(300, 298, 'Order attendee materials (name tags, portfolios, notebooks, etc.)', 'Order attendee materials (name tags, portfolios, notebooks, etc.)', 19, 0, '2020-02-24 02:27:19', '2020-02-24 02:27:19'),
(301, 298, 'Finalize special event details (linens, flowers, etc.)', 'Finalize special event details (linens, flowers, etc.)', 19, 0, '2020-02-24 02:27:29', '2020-02-24 02:27:29'),
(302, 0, '3 – 2 Weeks Ahead', 'null', 19, 0, '2020-02-24 02:27:37', '2020-02-24 02:27:37'),
(303, 302, 'Confirm guest/meeting room arrangements, menus and final counts', 'Confirm guest/meeting room arrangements, menus and final counts', 19, 0, '2020-02-24 02:27:48', '2020-02-24 02:27:48'),
(304, 302, 'Print signage and distribute printed or digital program', 'Print signage and distribute printed or digital program', 19, 0, '2020-02-24 02:27:59', '2020-02-24 02:27:59'),
(305, 302, 'Update website', 'Update website', 19, 0, '2020-02-24 02:28:11', '2020-02-24 02:28:11'),
(306, 302, 'Assign session moderators', 'Assign session moderators', 19, 0, '2020-02-24 02:28:18', '2020-02-24 02:28:18'),
(307, 0, '1 Week Ahead', 'null', 19, 0, '2020-02-24 02:28:24', '2020-02-24 02:28:24'),
(308, 307, 'Ship materials to hotel', 'Ship materials to hotel', 19, 0, '2020-02-24 02:28:35', '2020-02-24 02:28:35'),
(309, 307, 'Hold pre-conference meeting and walk-through', 'Hold pre-conference meeting and walk-through', 19, 0, '2020-02-24 02:28:48', '2020-02-24 02:28:48'),
(310, 307, 'Send email update to participants/speakers', 'Send email update to participants/speakers', 19, 0, '2020-02-24 02:28:56', '2020-02-24 02:28:56'),
(311, 307, 'Review all set-ups and A/V needs', 'Review all set-ups and A/V needs', 19, 0, '2020-02-24 02:29:05', '2020-02-24 02:29:05'),
(312, 307, 'Develop registration table materials, prepare name badges and gift bags for registration and speakers', 'Develop registration table materials, prepare name badges and gift bags for registration and speakers', 19, 0, '2020-02-24 02:29:13', '2020-02-24 02:29:13'),
(313, 0, 'During your conference', 'null', 19, 0, '2020-02-24 02:29:24', '2020-02-24 02:29:24'),
(314, 313, 'Enjoy! Contact us with any questions that arise', 'Enjoy! Contact us with any questions that arise', 19, 0, '2020-02-24 02:29:38', '2020-02-24 02:29:38'),
(315, 0, '1 week after the conference', 'null', 19, 0, '2020-02-24 02:29:44', '2020-02-24 02:29:44'),
(316, 315, 'Send sponsor and VIP thank you letters', 'Send sponsor and VIP thank you letters', 19, 0, '2020-02-24 02:30:04', '2020-02-24 02:30:04'),
(317, 315, 'Send post-event survey', 'Send post-event survey', 19, 0, '2020-02-24 02:30:14', '2020-02-24 02:30:14'),
(318, 315, 'Have a post-conference meeting with key players', 'Have a post-conference meeting with key players', 19, 0, '2020-02-24 02:30:24', '2020-02-24 02:30:24'),
(319, 0, 'ONE MONTH BEFORE COOKOUT:', 'null', 20, 0, '2020-02-24 02:32:35', '2020-02-24 02:32:35'),
(320, 319, 'Reserve grill. Call Outdoor Rec at 442-', 'Reserve grill. Call Outdoor Rec at 442-', 20, 0, '2020-02-24 02:32:50', '2020-02-24 02:32:50'),
(321, 319, 'Advertise with flyers and announce at formations and FRG meetings', 'Advertise with flyers and announce at formations and FRG meetings', 20, 0, '2020-02-24 02:33:06', '2020-02-24 02:33:06'),
(322, 0, 'TWO WEEKS BEFORE COOKOUT', 'null', 20, 0, '2020-02-24 02:33:15', '2020-02-24 02:33:15'),
(323, 322, 'Locate refrigerator space for hot dogs, condiments, and bread', 'Locate refrigerator space for hot dogs, condiments, and bread', 20, 0, '2020-02-24 02:34:55', '2020-02-24 02:34:55'),
(324, 322, 'Locate freezer space for hamburger patties', 'Locate freezer space for hamburger patties', 20, 0, '2020-02-24 02:35:11', '2020-02-24 02:35:11'),
(325, 322, 'Ask Soldiers/spouses to contribute individually wrapped baked goods to sell. Use FRG Phone Tree', 'Ask Soldiers/spouses to contribute individually wrapped baked goods to sell. Use FRG\r\nPhone Tree', 20, 0, '2020-02-24 02:35:21', '2020-02-24 02:35:21'),
(326, 0, 'ONE WEEK BEFORE COOKOUT', 'null', 20, 0, '2020-02-24 02:35:29', '2020-02-24 02:35:29'),
(327, 326, 'Use FRG phone tree to remind everyone of the event', 'Use FRG phone tree to remind everyone of the event', 20, 0, '2020-02-24 02:36:22', '2020-02-24 02:36:22'),
(328, 326, 'Reminder announcements to Soldiers in formation', 'Reminder announcements to Soldiers in formation', 20, 0, '2020-02-24 02:36:33', '2020-02-24 02:36:33'),
(329, 326, 'Purchase all items. Collect in FRG closet or Battery Orderly Room', 'Purchase all items. Collect in FRG closet or Battery Orderly Room', 20, 0, '2020-02-24 02:36:45', '2020-02-24 02:36:45'),
(330, 0, 'COOK-OUT DAY', 'null', 20, 0, '2020-02-24 02:36:58', '2020-02-24 02:36:58'),
(331, 330, 'Deliver grill, charcoal, lighter fluid, and lighter (or matches)', 'Deliver grill, charcoal, lighter fluid, and lighter (or matches)', 20, 0, '2020-02-24 02:37:09', '2020-02-24 02:37:09'),
(332, 330, 'Begin heating charcoals', 'Begin heating charcoals', 20, 0, '2020-02-24 02:37:18', '2020-02-24 02:37:18'),
(333, 330, 'Determine who will be in charge of the grill – one person', 'Determine who will be in charge of the grill – one person', 20, 0, '2020-02-24 02:37:25', '2020-02-24 02:37:25'),
(334, 330, 'Determine who will cook the food – up to five people', 'Determine who will cook the food – up to five people', 20, 0, '2020-02-24 02:37:37', '2020-02-24 02:37:37'),
(335, 330, 'Set up tables, cover with table covers', 'Set up tables, cover with table covers', 20, 0, '2020-02-24 02:37:48', '2020-02-24 02:37:48'),
(336, 330, 'Tape table covers under tables', 'Tape table covers under tables', 20, 0, '2020-02-24 02:37:56', '2020-02-24 02:37:56'),
(337, 330, 'Display price flyers or posters', 'Display price flyers or posters', 20, 0, '2020-02-24 02:38:03', '2020-02-24 02:38:03'),
(338, 330, 'Fill cooler with ice; begin cooling sodas', 'Fill cooler with ice; begin cooling sodas', 20, 0, '2020-02-24 02:38:12', '2020-02-24 02:38:12'),
(339, 330, 'Display in order: plates & napkins, bread, meats, condiments, chips, desserts, cups, ice, sodas', 'Display in order: plates & napkins, bread, meats, condiments, chips, desserts, cups, ice,\r\nsodas', 20, 0, '2020-02-24 02:38:21', '2020-02-24 02:38:21'),
(340, 330, 'Determine who will be in charge of the cash box – one person ONLY', 'Determine who will be in charge of the cash box – one person ONLY', 20, 0, '2020-02-24 02:38:30', '2020-02-24 02:38:30'),
(341, 330, 'Meet with all volunteer spouses. Explain set-up and what they can do. Have a job for everyone! Be specific and encouraging', 'Meet with all volunteer spouses. Explain set-up and what they can do. Have a job for\r\neveryone! Be specific and encouraging', 20, 0, '2020-02-24 02:38:39', '2020-02-24 02:38:39'),
(342, 0, 'AFTER COOKOUT', 'null', 20, 0, '2020-02-24 02:38:49', '2020-02-24 02:38:49'),
(343, 342, 'Send personal thank-you note to every Soldier and spouse who volunteered', 'Send personal thank-you note to every Soldier and spouse who volunteered', 20, 0, '2020-02-24 02:39:01', '2020-02-24 02:39:01'),
(344, 342, 'Record and turn in ALL volunteer hours', 'Record and turn in ALL volunteer hours', 20, 0, '2020-02-24 02:39:14', '2020-02-24 02:39:14'),
(345, 342, 'Place an “update” in the FRG newsletter that tells the positive things about the cookout – how much money was raised, what the money will be used for, and a public thank you to ALL Soldiers and spouses who volunteered (list by name). (**NOTE: Adding a personal touch – like how PFC Smith ate as many hot dogs as he cooked – is a fun way to get the attention of your readers.)', 'Place an “update” in the FRG newsletter that tells the positive things about the cookout –\r\nhow much money was raised, what the money will be used for, and a public thank you to\r\nALL Soldiers and spouses who volunteered (list by name). (**NOTE: Adding a\r\npersonal touch – like how PFC Smith ate as many hot dogs as he cooked – is a fun way to\r\nget the attention of your readers.)', 20, 0, '2020-02-24 02:39:46', '2020-02-24 02:39:46'),
(346, 0, 'LIST OF THINGS TO TAKE TO THE COOKOUT', 'null', 20, 0, '2020-02-24 02:39:54', '2020-02-24 02:39:54'),
(347, 346, 'Fundraiser Approval Form', 'Fundraiser Approval Form', 20, 0, '2020-02-24 02:40:21', '2020-02-24 02:40:21'),
(348, 346, 'grill', 'grill', 20, 0, '2020-02-24 02:40:40', '2020-02-24 02:40:40'),
(349, 346, 'charcoal, lighter fluid, lighter or matches', 'charcoal, lighter fluid, lighter or matches', 20, 0, '2020-02-24 02:40:55', '2020-02-24 02:40:55'),
(350, 346, 'cash box with $50.00 change (quarters and dollar bills, especially)', 'cash box with $50.00 change (quarters and dollar bills, especially)', 20, 0, '2020-02-24 02:41:08', '2020-02-24 02:41:08'),
(351, 346, 'hot dogs, 100', 'hot dogs, 100', 20, 0, '2020-02-24 02:41:19', '2020-02-24 02:41:19'),
(352, 346, 'buns, 100', 'buns, 100', 20, 0, '2020-02-24 02:41:29', '2020-02-24 02:41:29'),
(353, 346, 'hamburgers, 120', 'hamburgers, 120', 20, 0, '2020-02-24 02:41:39', '2020-02-24 02:41:39'),
(354, 346, 'buns, 120', 'buns, 120', 20, 0, '2020-02-24 02:41:46', '2020-02-24 02:41:46'),
(355, 346, 'salt and pepper shakers for hamburger meat', 'salt and pepper shakers for hamburger meat', 20, 0, '2020-02-24 02:41:56', '2020-02-24 02:41:56'),
(356, 346, 'mustard, 2 large', 'mustard, 2 large', 20, 0, '2020-02-24 02:43:57', '2020-02-24 02:43:57'),
(357, 346, 'mayonnaise, 1 extra large', 'mayonnaise, 1 extra large', 20, 0, '2020-02-24 02:44:07', '2020-02-24 02:44:07'),
(358, 346, 'plastic knives for spreading mayonnaise', 'plastic knives for spreading mayonnaise', 20, 0, '2020-02-24 02:45:10', '2020-02-24 02:45:10'),
(359, 346, 'ketchup, 2 large', 'ketchup, 2 large', 20, 0, '2020-02-24 02:45:21', '2020-02-24 02:45:21'),
(360, 346, 'relish, 1 extra large', 'relish, 1 extra large', 20, 0, '2020-02-24 02:45:30', '2020-02-24 02:45:30'),
(361, 346, 'spoons for relish', 'spoons for relish', 20, 0, '2020-02-24 02:45:43', '2020-02-24 02:45:43'),
(362, 346, 'pickles, 1 extra large', 'pickles, 1 extra large', 20, 0, '2020-02-24 02:45:52', '2020-02-24 02:45:52'),
(363, 346, 'bread & butter pickles, 1 extra large', 'bread & butter pickles, 1 extra large', 20, 0, '2020-02-24 02:46:03', '2020-02-24 02:46:03'),
(364, 346, 'forks for pickles', 'forks for pickles', 20, 0, '2020-02-24 02:46:10', '2020-02-24 02:46:10'),
(365, 346, 'cheese, 72 slices', 'cheese, 72 slices', 20, 0, '2020-02-24 02:46:21', '2020-02-24 02:46:21'),
(366, 346, 'chopped onions, in Ziploc baggie', 'chopped onions, in Ziploc baggie', 20, 0, '2020-02-24 02:46:29', '2020-02-24 02:46:29'),
(367, 346, 'sodas, 200', 'sodas, 200', 20, 0, '2020-02-24 02:46:38', '2020-02-24 02:46:38'),
(368, 346, 'cooler', 'cooler', 20, 0, '2020-02-24 02:46:46', '2020-02-24 02:46:46'),
(369, 346, 'ice', 'ice', 20, 0, '2020-02-24 02:46:53', '2020-02-24 02:46:53'),
(370, 346, 'tables, 4', 'tables, 4', 20, 0, '2020-02-24 02:47:03', '2020-02-24 02:47:03'),
(371, 346, 'table covers, 4', 'table covers, 4', 20, 0, '2020-02-24 02:47:13', '2020-02-24 02:47:13'),
(372, 346, 'poster with prices', 'poster with prices', 20, 0, '2020-02-24 02:47:25', '2020-02-24 02:47:25'),
(373, 346, 'plates, 200', 'plates, 200', 20, 0, '2020-02-24 02:47:34', '2020-02-24 02:47:34'),
(374, 346, 'napkins, 200', 'napkins, 200', 20, 0, '2020-02-24 02:47:41', '2020-02-24 02:47:41'),
(375, 346, 'utensils – spatula, fork, tongs', 'utensils – spatula, fork, tongs', 20, 0, '2020-02-24 02:47:49', '2020-02-24 02:47:49'),
(376, 346, 'Ziploc baggies', 'Ziploc baggies', 20, 0, '2020-02-24 02:47:57', '2020-02-24 02:47:57'),
(377, 346, 'plastic knife', 'plastic knife', 20, 0, '2020-02-24 02:48:06', '2020-02-24 02:48:06'),
(378, 346, 'large trash bags', 'large trash bags', 20, 0, '2020-02-24 02:48:19', '2020-02-24 02:48:19'),
(379, 346, 'baked goods', 'baked goods', 20, 0, '2020-02-24 02:48:29', '2020-02-24 02:48:29'),
(380, 346, 'scissors, heavy-duty tape, waterproof markers', 'scissors, heavy-duty tape, waterproof markers', 20, 0, '2020-02-24 02:48:37', '2020-02-24 02:48:37'),
(381, 0, 'Brainstorm', 'null', 6, 0, '2020-02-24 02:50:07', '2020-02-24 02:50:07'),
(382, 381, 'Tune into her. Listen carefully to pick up clues of her latest interests and what type of date she needs. Every time you hear a clue write it down and you’ll have a running list of date ideas.', 'Tune into her. Listen carefully to pick up clues of her latest interests and what type of date she needs. Every time you hear a clue write it down and you’ll have a running list of date ideas.', 6, 0, '2020-02-24 02:50:29', '2020-02-24 02:50:29'),
(383, 0, 'Ask her out', 'null', 6, 0, '2020-02-24 02:50:36', '2020-02-24 02:50:36'),
(384, 383, 'Take initiative and ask her. Be creative. Perhaps leave her a note saying, “Would you go out with me on Friday? Yes, No, Maybe (Circle one and return to my night table)”', 'Take initiative and ask her. Be creative. Perhaps leave her a note saying, “Would you go out with me on Friday? Yes, No, Maybe (Circle one and return to my night table)”', 6, 0, '2020-02-24 02:50:51', '2020-02-24 02:50:51'),
(385, 0, 'Arrange childcare if needed', 'null', 6, 0, '2020-02-24 02:51:01', '2020-02-24 02:51:01'),
(386, 385, 'Don’t leave this up to your wife. The day of the date, clean the house and have written instructions for the sitter. Do it all so she feels totally free of responsibility', 'Don’t leave this up to your wife. The day of the date, clean the house and have written instructions for the sitter. Do it all so she feels totally free of responsibility', 6, 0, '2020-02-24 02:51:16', '2020-02-24 02:51:16'),
(387, 0, 'Plan, make reservations and confirm', 'null', 6, 0, '2020-02-24 02:51:23', '2020-02-24 02:51:23'),
(388, 387, 'Check availability and make reservations in advance. Make sure what you plan to do will be available and confirm the day before', 'Check availability and make reservations in advance. Make sure what you plan to do will be available and confirm the day before', 6, 0, '2020-02-24 02:51:35', '2020-02-24 02:51:35'),
(389, 0, 'Build it up', 'null', 6, 0, '2020-02-24 02:51:42', '2020-02-24 02:51:42'),
(390, 389, 'Promote the date like a major event. Build anticipation so you both are excited.', 'Promote the date like a major event. Build anticipation so you both are excited.', 6, 0, '2020-02-24 02:51:55', '2020-02-24 02:51:55'),
(391, 0, 'Make sure everything looks good', 'null', 6, 0, '2020-02-24 02:52:03', '2020-02-24 02:52:03');
INSERT INTO `default_tasks` (`id`, `parent`, `task`, `description`, `event_id`, `type`, `created_at`, `updated_at`) VALUES
(392, 391, 'Detail the car. Get a haircut and wear your best outfit. Shower, shave, put on the cologne she loves.', 'Detail the car. Get a haircut and wear your best outfit. Shower, shave, put on the cologne she loves.', 6, 0, '2020-02-24 02:52:18', '2020-02-24 02:52:18'),
(393, 0, 'Be early, but patient', 'null', 6, 0, '2020-02-24 02:52:24', '2020-02-24 02:52:24'),
(394, 393, 'Even though you may be in the same house, be ready early. But be patient because you may be waiting on her. Don’t make her feel rushed or pressured to get out the door. Let her know she is worth waiting for.', 'Even though you may be in the same house, be ready early. But be patient because you may be waiting on her. Don’t make her feel rushed or pressured to get out the door. Let her know she is worth waiting for.', 6, 0, '2020-02-24 02:52:38', '2020-02-24 02:52:38'),
(395, 0, '12 Months prior', 'null', 21, 0, '2020-02-24 02:56:32', '2020-02-24 02:56:32'),
(396, 0, '9 months Prior', 'null', 21, 0, '2020-02-24 02:56:47', '2020-02-24 02:56:47'),
(397, 396, 'Make final reservations--remember that some family members will have to cancel, and others may decide to show up at the last minute', 'Make final reservations--remember that some family members will have to cancel,\r\nand others may decide to show up at the last minute', 21, 0, '2020-02-24 02:56:56', '2020-02-24 02:56:56'),
(398, 396, 'Schedule events and activities that require advance registration or booking', 'Schedule events and activities that require advance registration or booking', 21, 0, '2020-02-24 02:57:03', '2020-02-24 02:57:03'),
(399, 396, 'Make contact with family members by email to keep them up to date on family reunion plans. Encourage email contacts to help spread the word.', 'Make contact with family members by email to keep them up to date on family\r\nreunion plans. Encourage email contacts to help spread the word.', 21, 0, '2020-02-24 02:57:11', '2020-02-24 02:57:11'),
(400, 0, '6 Months Prior', 'null', 21, 0, '2020-02-24 02:57:18', '2020-02-24 02:57:18'),
(401, 0, 'Three to six months before the party', 'null', 22, 0, '2020-02-24 03:01:19', '2020-02-24 03:01:19'),
(402, 401, 'Save Set up an account at your bank specifically for saving funds towards the party, and add a little each week. Ask other family members to chip in', 'Save Set up an account at your bank specifically for saving funds towards the party, and add a little each week. Ask other family members to chip in', 22, 0, '2020-02-24 03:01:35', '2020-02-24 03:01:35'),
(403, 401, 'Make a guest list This is subject to flux, but get a ballpark idea of how many guests you can handle.', 'Make a guest list This is subject to flux, but get a ballpark idea of how many guests you can handle.', 22, 0, '2020-02-24 03:01:46', '2020-02-24 03:01:46'),
(404, 401, 'Choose a venue June is wedding month as well as graduation, so book early and put down a deposit. Or, plan to have the party at your house, or a classmate\'s home.', 'Choose a venue June is wedding month as well as graduation, so book early and put down a deposit. Or, plan to have the party at your house, or a classmate\'s home.', 22, 0, '2020-02-24 03:01:56', '2020-02-24 03:01:56'),
(405, 401, 'Network Planning way in advance can discourage wild off-site parties being planned by the graduates themselves. Work with other parents to plan an all inclusive party for a safe, fun time.', 'Network Planning way in advance can discourage wild off-site parties being planned by the graduates themselves. Work with other parents to plan an all inclusive party for a safe, fun time.', 22, 0, '2020-02-24 03:02:04', '2020-02-24 03:02:04'),
(406, 0, 'Six to eight weeks before the party', 'null', 22, 0, '2020-02-24 03:02:12', '2020-02-24 03:02:12'),
(407, 406, 'Budget By now you should have save some cash and have an idea of what you can spend. Lay out a realistic game plan.', 'Budget By now you should have save some cash and have an idea of what you can spend. Lay out a realistic game plan.', 22, 0, '2020-02-24 03:02:24', '2020-02-24 03:02:24'),
(408, 406, ' Supplies Graduation party supplies can sell out fast, so get some of the paper products and decorations early - they won\'t spoil.', ' Supplies Graduation party supplies can sell out fast, so get some of the paper products and decorations early - they won\'t spoil.', 22, 0, '2020-02-24 03:02:34', '2020-02-24 03:02:34'),
(409, 406, ' Liquor If you are holding your college graduation party in a banquet hall you may need to obtain licensing, and find a vendor well in advance', ' Liquor If you are holding your college graduation party in a banquet hall you may need to obtain licensing, and find a vendor well in advance', 22, 0, '2020-02-24 03:02:42', '2020-02-24 03:02:42'),
(410, 406, ' Entertainment Maybe one of the graduates is part of a band, or you can convince a local DJ to provide musical entertainment', ' Entertainment Maybe one of the graduates is part of a band, or you can convince a local DJ to provide musical entertainment', 22, 0, '2020-02-24 03:02:54', '2020-02-24 03:02:54'),
(411, 406, ' Catering Another item that should be taken care of sooner rather than later, as spring schedules fill up fast', ' Catering Another item that should be taken care of sooner rather than later, as spring schedules fill up fast', 22, 0, '2020-02-24 03:03:02', '2020-02-24 03:03:02'),
(412, 0, 'Two to four weeks before the party', 'null', 22, 0, '2020-02-24 03:03:11', '2020-02-24 03:03:49'),
(413, 412, ' Invitations Send these out in plenty of time to make sure your party is the one people decide to go to. Ask for RSVPs - include your phone number and email address', ' Invitations Send these out in plenty of time to make sure your party is the one people decide to go to. Ask for RSVPs - include your phone number and email address', 22, 0, '2020-02-24 03:04:33', '2020-02-24 03:04:33'),
(414, 412, 'Dress code Decide if your party is formal and elegant or casual and laid back. Include this information I the invitations', 'Dress code Decide if your party is formal and elegant or casual and laid back. Include this information I the invitations', 22, 0, '2020-02-24 03:04:54', '2020-02-24 03:04:54'),
(415, 412, ' Games Plan some fun games to break the ice and get the party started', ' Games Plan some fun games to break the ice and get the party started', 22, 0, '2020-02-24 03:05:05', '2020-02-24 03:05:05'),
(416, 412, 'Karaoke. Put a deposit down on a machine and sound system early for maximum fun', 'Karaoke. Put a deposit down on a machine and sound system early for maximum fun', 22, 0, '2020-02-24 03:05:15', '2020-02-24 03:05:15'),
(417, 412, 'Seating Make sure you have plenty of folding chairs even if you are having a casual event', 'Seating Make sure you have plenty of folding chairs even if you are having a casual event', 22, 0, '2020-02-24 03:05:27', '2020-02-24 03:05:27'),
(418, 412, ' Dishes/cutlery/linensIf the caterer isn\'t providing plates, silverware, napkins and tablecloths, make sure you have this covered on your end', ' Dishes/cutlery/linensIf the caterer isn\'t providing plates, silverware, napkins and tablecloths, make sure you have this covered on your end', 22, 0, '2020-02-24 03:05:44', '2020-02-24 03:05:44'),
(419, 0, 'Two to three days before the party', 'null', 22, 0, '2020-02-24 03:05:50', '2020-02-24 03:06:35'),
(420, 419, ' Cake Get your cake ordered and set a time to pick it up - this avoids delivery problems', ' Cake Get your cake ordered and set a time to pick it up - this avoids delivery problems', 22, 0, '2020-02-24 03:06:13', '2020-02-24 03:06:13'),
(421, 419, ' Extras Make a list of what the caterer is covering, and fill in any gaps', ' Extras Make a list of what the caterer is covering, and fill in any gaps', 22, 0, '2020-02-24 03:06:54', '2020-02-24 03:06:54'),
(422, 419, 'Deliveries To avoid late deliveries and delays, accept as many deliveries as you can prior to the actual day of the party', 'Deliveries To avoid late deliveries and delays, accept as many deliveries as you can prior to the actual day of the party', 22, 0, '2020-02-24 03:07:13', '2020-02-24 03:07:13'),
(423, 419, 'Flowers No party is complete without them, so order early and arrange to pick them up the day of the party', 'Flowers No party is complete without them, so order early and arrange to pick them up the day of the party', 22, 0, '2020-02-24 03:07:24', '2020-02-24 03:07:24'),
(424, 0, 'Day of the party', 'null', 22, 0, '2020-02-24 03:07:32', '2020-02-24 03:07:32'),
(425, 424, ' Relax. Get some extra rest in the morning - the party will be exhaustingly fun!', ' Relax. Get some extra rest in the morning - the party will be exhaustingly fun!', 22, 0, '2020-02-24 03:07:43', '2020-02-24 03:07:43'),
(426, 424, 'Memories  Have batteries in cameras and video cams, and a blank book for all guests to sign and later transform into a scrapbook', 'Memories  Have batteries in cameras and video cams, and a blank book for all guests to sign and later transform into a scrapbook', 22, 0, '2020-02-24 03:07:51', '2020-02-24 03:07:51'),
(427, 424, 'Decorations Balloons, streamers, signs and everything else should be in place in plenty of time', 'Decorations Balloons, streamers, signs and everything else should be in place in plenty of time', 22, 0, '2020-02-24 03:07:58', '2020-02-24 03:07:58'),
(428, 424, 'Refreshments Make sure the caterer has room to work, and pick up the cake', 'Refreshments Make sure the caterer has room to work, and pick up the cake', 22, 0, '2020-02-24 03:08:07', '2020-02-24 03:08:07'),
(429, 424, 'Gifts Set up a table for gifts for the graduate if it is a private party', 'Gifts Set up a table for gifts for the graduate if it is a private party', 22, 0, '2020-02-24 03:08:14', '2020-02-24 03:08:14'),
(430, 424, 'Fun Have some! This is a celebration, and everyone should have a blast', 'Fun Have some! This is a celebration, and everyone should have a blast', 22, 0, '2020-02-24 03:08:23', '2020-02-24 03:08:23'),
(431, 0, 'After the party', 'null', 22, 0, '2020-02-24 03:08:32', '2020-02-24 03:08:32'),
(432, 431, 'Caterer Pay promptly and thank them for their service.', 'Caterer Pay promptly and thank them for their service.', 22, 0, '2020-02-24 03:09:08', '2020-02-24 03:09:08'),
(433, 431, 'Clean up Have plenty of large trash bags and get everyone to pitch in', 'Clean up Have plenty of large trash bags and get everyone to pitch in', 22, 0, '2020-02-24 03:09:17', '2020-02-24 03:09:17'),
(434, 431, 'Congratulate Let your graduate(s) know how proud you are', 'Congratulate Let your graduate(s) know how proud you are', 22, 0, '2020-02-24 03:09:28', '2020-02-24 03:09:28'),
(435, 0, 'Create an agenda', 'null', 23, 0, '2020-02-24 03:10:29', '2020-02-24 03:10:29'),
(436, 435, 'Set a clear schedule in your group description. If the group has set activities, note when members need to arrive. If it’s more of an open social hour, let people know', 'Set a clear schedule in your group description. If the group has set activities, note when members need to arrive. If it’s more of an open social hour, let people know', 23, 0, '2020-02-24 03:10:39', '2020-02-24 03:10:39'),
(437, 0, 'Secure a venue', 'null', 23, 0, '2020-02-24 03:10:45', '2020-02-24 03:10:45'),
(438, 0, 'Send an message to those who said they’re coming.', 'null', 23, 0, '2020-02-24 03:10:50', '2020-02-24 03:10:50'),
(439, 0, 'Gather your supplies', 'null', 23, 0, '2020-02-24 03:10:56', '2020-02-24 03:10:56'),
(440, 0, 'Welcome everyone', 'null', 23, 0, '2020-02-24 03:11:05', '2020-02-24 03:11:05'),
(441, 437, 'Find some venue options. Contact management with your questions, and check if your members need specific accommodations.', 'Find some venue options. Contact management with your questions, and check if your members need specific accommodations.', 23, 0, '2020-02-24 03:11:19', '2020-02-24 03:11:19'),
(442, 438, 'Rely on your regulars — don’t be shy about asking them to help out.', 'Rely on your regulars — don’t be shy about asking them to help out.', 23, 0, '2020-02-24 03:11:30', '2020-02-24 03:11:30'),
(443, 438, 'Reach out personally to newcomers — developing a rapport encourages them to show up', 'Reach out personally to newcomers — developing a rapport encourages them to show up', 23, 0, '2020-02-24 03:11:38', '2020-02-24 03:11:38'),
(444, 439, 'Make signs, prepare name tags, and ensure you have everything else you need for your event to be successful', 'Make signs, prepare name tags, and ensure you have everything else you need for your event to be successful', 23, 0, '2020-02-24 03:11:50', '2020-02-24 03:11:50'),
(445, 440, 'Get there early and greet people as they arrive. Introduce them to each other, and ask them thoughtful questions', 'Get there early and greet people as they arrive. Introduce them to each other, and ask them thoughtful questions', 23, 0, '2020-02-24 03:11:59', '2020-02-24 03:11:59'),
(446, 0, 'INITIAL PLANNING', 'null', 24, 0, '2020-02-24 03:24:35', '2020-02-24 03:24:35'),
(447, 0, 'BUDGET PLANNING', 'null', 24, 0, '2020-02-24 03:24:43', '2020-02-24 03:24:43'),
(448, 0, 'ACTIVITY PLANNING', 'null', 24, 0, '2020-02-24 03:24:49', '2020-02-24 03:24:49'),
(449, 446, 'Determine your audience. For whom is this retreat planned: men, women, couples, singles, youth?', 'Determine your audience. For whom is this retreat planned: men, women, couples, singles, youth?', 24, 0, '2020-02-24 03:25:12', '2020-02-24 03:25:12'),
(450, 446, 'Make a Guest List and RSVP', 'Make a Guest List and RSVP', 24, 0, '2020-02-24 03:25:41', '2020-02-24 03:25:41'),
(451, 446, 'Create a theme. Having a central idea makes organizing speakers and activities easier', 'Create a theme. Having a central idea makes organizing speakers and activities easier', 24, 0, '2020-02-24 03:25:50', '2020-02-24 03:25:50'),
(452, 446, 'Schedule coordinating activities. Choose activities that fit the theme and meets the needs of attendees', 'Schedule coordinating activities. Choose activities that fit the theme and meets the needs of attendees', 24, 0, '2020-02-24 03:25:58', '2020-02-24 03:25:58'),
(453, 446, 'Set a date for the event', 'Set a date for the event', 24, 0, '2020-02-24 03:26:05', '2020-02-24 03:26:05'),
(454, 447, 'Create a budget to include costs of promotion, venue, activities, food, supplies, etc', 'Create a budget to include costs of promotion, venue, activities, food, supplies, etc', 24, 0, '2020-02-24 03:26:16', '2020-02-24 03:26:16'),
(455, 447, 'Secure a venue. Decide how much service you need for your group. A full-service venue is recommended, but a selfservice venue may be more fitting for your budget. It is also important to find out how many attendees a venue can accommodate', 'Secure a venue. Decide how much service you need for your group. A full-service venue is recommended, but a selfservice venue may be more fitting for your budget. It is also important to find out how many attendees a venue can accommodate', 24, 0, '2020-02-24 03:26:24', '2020-02-24 03:26:24'),
(456, 447, 'Determine cost for attendees. How much will you need to charge in order to cover costs?', 'Determine cost for attendees. How much will you need to charge in order to cover costs?', 24, 0, '2020-02-24 03:26:32', '2020-02-24 03:26:32'),
(457, 448, 'Contact speakers/guest presenters. Find out if they are available on your set dates and how much they charge', 'Contact speakers/guest presenters. Find out if they are available on your set dates and how much they charge', 24, 0, '2020-02-24 03:26:48', '2020-02-24 03:26:48'),
(458, 448, 'Determine a schedule of events. Decide on times for meetings, seminars, organized activities and meals. Be sure to leave room for unstructured personal time.', 'Determine a schedule of events. Decide on times for meetings, seminars, organized activities and meals. Be sure to leave room for unstructured personal time.', 24, 0, '2020-02-24 03:26:58', '2020-02-24 03:26:58'),
(459, 448, 'If you are using a self-service facility, plan a daily menu with available options.', 'If you are using a self-service facility, plan a daily menu with available options.', 24, 0, '2020-02-24 03:27:07', '2020-02-24 03:27:07'),
(460, 0, 'PROMOTIONAL PLANNING', 'null', 24, 0, '2020-02-24 03:27:14', '2020-02-24 03:27:14'),
(461, 0, 'FINAL PLANNING', 'null', 24, 0, '2020-02-24 03:27:20', '2020-02-24 03:27:20'),
(462, 0, 'AFTER RETREAT', 'null', 24, 0, '2020-02-24 03:27:30', '2020-02-24 03:27:30'),
(463, 460, 'Send out mail and/or email informational brochures or newsletters', 'Send out mail and/or email informational brochures or newsletters', 24, 0, '2020-02-24 03:27:43', '2020-02-24 03:27:43'),
(464, 460, 'Create a social media event page on Facebook or Twitter for promotion, updates and reminders. Social media is often the fastest way to communicate to an audience', 'Create a social media event page on Facebook or Twitter for promotion, updates and reminders. Social media is often the fastest way to communicate to an audience', 24, 0, '2020-02-24 03:27:50', '2020-02-24 03:27:50'),
(465, 460, 'Set deadlines for sign-ups and/or deposits. It is easier to coordinate if you can get a solid count of attendees early on in planning', 'Set deadlines for sign-ups and/or deposits. It is easier to coordinate if you can get a solid count of attendees early on in planning', 24, 0, '2020-02-24 03:27:58', '2020-02-24 03:27:58'),
(466, 461, 'Check in with the venue to ensure the location and staff are ready for your event', 'Check in with the venue to ensure the location and staff are ready for your event', 24, 0, '2020-02-24 03:28:11', '2020-02-24 03:28:11'),
(467, 461, 'Check in with speaker/guest presenter to ensure he or she is still on board and prepared. It is advisable to have a back-up speaker available should there be any last minute changes. Emergencies happen, so it is always better to be prepared', 'Check in with speaker/guest presenter to ensure he or she is still on board and prepared. It is advisable to have a back-up speaker available should there be any last minute changes. Emergencies happen, so it is always better to be prepared', 24, 0, '2020-02-24 03:28:20', '2020-02-24 03:28:20'),
(468, 461, 'Meet with your volunteers and planning team to go over schedules and checklists. This ensures that everyone is on the same page and has all the needed supplies and equipment', 'Meet with your volunteers and planning team to go over schedules and checklists. This ensures that everyone is on the same page and has all the needed supplies and equipment', 24, 0, '2020-02-24 03:28:29', '2020-02-24 03:28:29'),
(469, 462, 'Send Thank you node to all who attended', 'Send Thank you node to all who attended', 24, 0, '2020-02-24 03:28:42', '2020-02-24 03:28:42'),
(470, 0, 'Pre-Event Checklist', 'null', 25, 0, '2020-02-24 03:30:17', '2020-02-24 03:30:17'),
(471, 0, 'Post-Event Checklist', 'null', 25, 0, '2020-02-24 03:30:24', '2020-02-24 03:30:24'),
(472, 0, 'Budget Checklist', 'null', 25, 0, '2020-02-24 03:30:29', '2020-02-24 03:30:29'),
(473, 470, 'Decide on the event’s purpose, content and activity level', 'Decide on the event’s purpose, content and activity level', 25, 0, '2020-02-24 03:30:50', '2020-02-24 03:30:50'),
(474, 0, 'Notes', 'null', 25, 0, '2020-02-24 03:30:57', '2020-02-24 03:32:34'),
(475, 470, 'Check proposed date for potential conflicts', 'Check proposed date for potential conflicts', 25, 0, '2020-02-24 03:31:06', '2020-02-24 03:31:06'),
(476, 470, 'Appoint an event coordinator/manager', 'Appoint an event coordinator/manager', 25, 0, '2020-02-24 03:33:32', '2020-02-24 03:33:32'),
(477, 470, 'Agreement and deposit sent to vendor', 'Agreement and deposit sent to vendor', 25, 0, '2020-02-24 03:33:42', '2020-02-24 03:33:42'),
(478, 470, 'Team background questionnaire returned to vendor.', 'Team background questionnaire returned to vendor.', 25, 0, '2020-02-24 03:33:50', '2020-02-24 03:33:50'),
(479, 470, 'Make travel arrangements for out of town participants.', 'Make travel arrangements for out of town participants.', 25, 0, '2020-02-24 03:34:07', '2020-02-24 03:34:07'),
(480, 470, 'Make reservations for lodging for participants.', 'Make reservations for lodging for participants.', 25, 0, '2020-02-24 03:34:20', '2020-02-24 03:34:20'),
(481, 470, 'Make food, beverage & snack arrangements.', 'Make food, beverage & snack arrangements.', 25, 0, '2020-02-24 03:34:29', '2020-02-24 03:34:29'),
(482, 470, 'Communicate event details to attendees.', 'Communicate event details to attendees.', 25, 0, '2020-02-24 03:34:38', '2020-02-24 03:34:38'),
(483, 470, 'Set up transportation plan (car/van pool, bus, drive solo, etc.).', 'Set up transportation plan (car/van pool, bus, drive solo, etc.).', 25, 0, '2020-02-24 03:34:45', '2020-02-24 03:34:45'),
(484, 470, 'Select photographer; arrange for photos/video.', 'Select photographer; arrange for photos/video.', 25, 0, '2020-02-24 03:34:53', '2020-02-24 03:34:53'),
(485, 470, 'Review script/timeline with vendor’s lead facilitator.', 'Review script/timeline with vendor’s lead facilitator.', 25, 0, '2020-02-24 03:35:02', '2020-02-24 03:35:02'),
(486, 471, 'Review post-program report with facilitator and key team members.', 'Review post-program report with facilitator and key team members.', 25, 0, '2020-02-24 03:35:13', '2020-02-24 03:35:13'),
(487, 471, 'Plan any follow-up activities accordingly.', 'Plan any follow-up activities accordingly.', 25, 0, '2020-02-24 03:35:23', '2020-02-24 03:35:23'),
(488, 471, 'Circulate photos or video of event to the team.', 'Circulate photos or video of event to the team.', 25, 0, '2020-02-24 03:35:30', '2020-02-24 03:35:30'),
(489, 472, 'Deposit and balance', 'Deposit and balance', 25, 0, '2020-02-24 03:35:41', '2020-02-24 03:35:41'),
(490, 472, 'Room rental (guest/meeting rooms)', 'Room rental (guest/meeting rooms)', 25, 0, '2020-02-24 03:35:52', '2020-02-24 03:35:52'),
(491, 472, 'Special activities (dinner, golfing, etc.)', 'Special activities (dinner, golfing, etc.)', 25, 0, '2020-02-24 03:36:03', '2020-02-24 03:36:03'),
(492, 472, 'Incentives/prizes', 'Incentives/prizes', 25, 0, '2020-02-24 03:36:11', '2020-02-24 03:36:11'),
(493, 472, 'Meals and snacks at event', 'Meals and snacks at event', 25, 0, '2020-02-24 03:36:21', '2020-02-24 03:36:21'),
(494, 472, 'Travel', 'Travel', 25, 0, '2020-02-24 03:36:29', '2020-02-24 03:36:29'),
(495, 472, 'Photography/videotaping', 'Photography/videotaping', 25, 0, '2020-02-24 03:36:36', '2020-02-24 03:36:36');

-- --------------------------------------------------------

--
-- Table structure for table `discount_deals`
--

CREATE TABLE `discount_deals` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `slug` longtext COLLATE utf8mb4_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `vendor_category_id` int(11) NOT NULL DEFAULT '0',
  `title` text COLLATE utf8mb4_unicode_ci,
  `message_text` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `expiry_date` timestamp(6) NULL DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `deal_life` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type_of_deal` tinyint(3) NOT NULL,
  `packages` int(11) NOT NULL DEFAULT '0',
  `deal_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deal_off_type` tinyint(3) DEFAULT NULL,
  `start_date` timestamp(6) NULL DEFAULT NULL,
  `min_price` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_deals`
--

INSERT INTO `discount_deals` (`id`, `category_id`, `slug`, `user_id`, `vendor_category_id`, `title`, `message_text`, `image`, `description`, `expiry_date`, `type`, `deal_life`, `created_at`, `updated_at`, `type_of_deal`, `packages`, `deal_code`, `amount`, `deal_off_type`, `start_date`, `min_price`) VALUES
(16, 1, NULL, 42, 11, 'Year Ending Deal', 'Grab the Year-End Deal', 'images/vendors/deals/1575613611varZkyfL19pFRih1FHGP15747561420CECWnSZ7yaVhvavQEMn14997.png', 'Grab the Year-End Deal', '2019-12-31 00:56:51.000000', NULL, 1, '2019-12-06 00:56:51', '2019-12-06 01:58:18', 0, 0, 'GET50OFF', '10', 0, '2019-12-06 00:55:51.118110', 0),
(27, 1, 'grab-winter-deal', 59, 35, 'Grab Winter Deal', 'Grab Winter Deal direct 50% OFF on my Packages. Hurry Try Coupon Code Now!!', 'images/vendors/deals/1575881871WPtwNXYfCRO38QCZWepjimg_77201.jpg', 'Grab Winter Deal direct 50% OFF on my Packages. Hurry Try Coupon Code Now!!', '2020-01-30 18:30:00.000000', NULL, 1, '2019-12-09 03:27:51', '2020-01-03 09:20:21', 0, 0, 'GETWIN50', '50', 0, '2020-01-09 18:30:00.000000', 0),
(28, 1, '50-percent-off', 31, 1, '50 Percent Off', 'hello', 'images/vendors/deals/1575974893kxtKknJAD099cgwqhMzZapproved.jpg', '50% OFF on my Packages.', '2019-12-30 18:30:00.000000', NULL, 1, '2019-12-10 05:18:13', '2019-12-19 09:24:46', 1, 1, '', '50', 0, '2019-12-18 18:30:00.000000', 0),
(29, 1, 'grab-my-discounted-gold-package', 59, 35, 'Grab My Discounted Gold Package', 'Grab my Gold Package with 20% dicount. Hurry Up!!', 'images/vendors/deals/1576230064EaQFM3sy4E0aJwZMPDOT15747561420CECWnSZ7yaVhvavQEMn14997.png', 'Grab my Gold Package with 20% dicount. Hurry Up!!', '2020-01-30 18:30:00.000000', NULL, 0, '2019-12-13 04:11:04', '2019-12-23 08:48:04', 0, 0, '07114', '20', 0, '2019-12-22 18:30:00.000000', 0),
(30, 20, 'winter-deal', 34, 14, 'winter deal', 'its good deal', 'images/vendors/deals/1576246570lWeXSmQ3j8Vfr0Xeta2Weventpic.jpg', '20% discount for winters', '2020-01-30 18:30:00.000000', NULL, 1, '2019-12-13 08:46:10', '2019-12-13 08:46:10', 0, 0, '124563', '20', 0, '2019-12-12 18:30:00.000000', 0),
(31, 11, 'get-10-off', 59, 39, 'Get 10% OFF', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'images/vendors/deals/1577107293JNfo6HNoISfxFFOCs1q1t10_1435802609300solo019.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2019-12-22 18:30:00.000000', NULL, 0, '2019-12-23 07:51:33', '2019-12-23 07:51:33', 0, 0, 'KANNGET10', '10', 0, '0000-00-00 00:00:00.000000', 0),
(32, 11, 'direct-50-off', 59, 39, 'Direct 50% OFF', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'images/vendors/deals/1577107556WGnd2uxrpl7mPVWYWSBVt20_1312238515529Pwc10011.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2019-12-22 18:30:00.000000', NULL, 0, '2019-12-23 07:55:56', '2019-12-23 07:55:56', 1, 42, '', '50', 1, '2019-12-22 18:30:00.000000', 0),
(33, 11, 'venue-deal', 31, 24, 'Venue Deal', 'Golden Chance', 'images/vendors/deals/1577113810L1KhlSL6Zwv5fCNyEftueventpic.jpg', 'Golden Chance', '2019-12-30 18:30:00.000000', NULL, 0, '2019-12-24 09:40:10', '2019-12-26 09:40:10', 0, 0, '160055', '20', 0, '2019-12-22 18:30:00.000000', 0),
(34, 11, 'direct-deal', 31, 24, 'Direct Deal', 'test', 'images/vendors/deals/1577171306fFilROzIBg3SK6y5aRahmenuabout.png', 'test', '0000-00-00 00:00:00.000000', NULL, 0, '2019-12-24 01:38:26', '2019-12-24 01:38:26', 1, 43, '', '20', 0, '0000-00-00 00:00:00.000000', 0),
(35, 20, '20-off', 44, 22, 'Get Deal', 'Taj Lounge event space invokes the combined lounge and restaurant environment and reckoned as one of the best venues in NYC. The event space owns the imported decor like a copper-topped bar, majestic ma', 'images/vendors/deals/157717474217PLxt3ypgO3p5OUXds0taj2020.jpg', 'Taj Lounge event space invokes the combined lounge and restaurant environment and reckoned as one of the best venues in NYC. The event space owns the imported decor like a copper-topped bar, majestic mahogany, woodwork, and excellent carved teak. The Taj restaurant theme instills the great Indian environment especially the nightlife.', '0000-00-00 00:00:00.000000', NULL, 0, '2019-12-24 02:35:42', '2019-12-24 02:37:31', 0, 0, '7890', '10', 0, '0000-00-00 00:00:00.000000', 0),
(36, 20, '50-off', 44, 22, 'Deal', 'Taj Lounge event space invokes the combined lounge and restaurant environment and reckoned as one of the best venues in NYC. The eve', 'images/vendors/deals/1577174817Q1Svoa0njnk2DfTJNvFh2020.jpg', 'Taj Lounge event space invokes the combined lounge and restaurant environment and reckoned as one of the best venues in NYC. The event space owns the imported decor like a copper-topped bar, majestic mahogany, woodwork, and excellent carved teak. The Taj restaurant theme instills the great Indian environment especially the nightlife.', '2019-12-25 18:30:00.000000', NULL, 1, '2019-12-24 02:36:57', '2019-12-24 02:37:47', 1, 15, '', '50', 0, '2019-12-24 18:30:00.000000', 0),
(37, 11, 'roof-party', 44, 26, 'Roof Party', '48 West, 21 Street between 5 & 6 Avenues - New York, NY-10010', 'images/vendors/deals/1577182872QzWA9BCUqXoiG6JgYtL6img2.jpg', '48 West, 21 Street between 5 & 6 Avenues - New York, NY-10010', '2020-01-04 18:30:00.000000', NULL, 1, '2019-12-24 04:51:12', '2020-01-03 11:04:58', 0, 0, '7891', '20', 0, '2020-01-03 18:30:00.000000', 0),
(39, 20, 'club-party', 44, 22, 'Club Party', 'The definition of marriage is the religious or legal process through which people become husband and wife, husband and husband or wife and wife, or the state of being married. An example of marriage is the Sacrament of Holy Matrimony.', 'images/vendors/deals/1577184832bkbodWONCkm7BDcGX36nimg.png', 'The definition of marriage is the religious or legal process through which people become husband and wife, husband and husband or wife and wife, or the state of being married. An example of marriage is the Sacrament of Holy Matrimony.', '2019-12-30 18:30:00.000000', NULL, 1, '2019-12-24 05:23:52', '2019-12-24 07:10:03', 0, 44, '4567', '50', 0, '2019-12-23 18:30:00.000000', 0),
(40, 11, 'party', 44, 26, 'party', 'Face actual professional level pitchers who\'ve pitched at the affiliate to big league level! Ever wondered if you could hit a big league fastball or changeup? Come find out!', 'images/vendors/deals/1577776198kaTfMqPY27MXRp927n3r218763.jpg', 'Face actual professional level pitchers who\'ve pitched at the affiliate to big league level! Ever wondered if you could hit a big league fastball or changeup? Come find out!', '0000-00-00 00:00:00.000000', NULL, 0, '2019-12-31 01:39:58', '2020-01-03 11:05:16', 0, 0, '1231', '10', 1, '0000-00-00 00:00:00.000000', 0),
(41, 1, 'valentine-special-offer', 31, 1, 'Valentine Special Offer', 'It usually begins with: “Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'images/vendors/deals/15784693378M3UeeGLviGHVSpEYE9eanthonydelanoixhzgs56Ze49sunsplash.jpg', 'It usually begins with: “Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.” The purpose of lorem ipsum is to create a natural looking block of text (sentence, paragraph, page, etc.) that doesn\'t distract from the layout.', '0000-00-00 00:00:00.000000', NULL, 0, '2020-01-08 02:12:17', '2020-01-08 05:42:46', 0, 0, '95134', '500', 1, '0000-00-00 00:00:00.000000', 1500),
(42, 12, 'zambo-offer', 31, 52, 'Zambo Offer', 'Why can\'t I log in to my Print Genie account even though I connected a store?', 'images/vendors/deals/1578575020UvPZX88maEZYlm1Xggw2beachweddingceremonyduringdaytime169198.jpg', 'Why can\'t I log in to my Print Genie account even though I connected a store?', '0000-00-00 00:00:00.000000', NULL, 0, '2020-01-09 07:33:41', '2020-01-09 07:33:41', 0, 0, '951343', '50', 1, '0000-00-00 00:00:00.000000', 200),
(43, 1, 'test-event-deal', 59, 35, 'Test Event Deal', 'Test Event Deal', 'images/vendors/deals/1580897912MomjOSnSqCni83TPkrKu15747561420CECWnSZ7yaVhvavQEMn14997.png', 'Test Event Deal', '0000-00-00 00:00:00.000000', NULL, 0, '2020-02-05 04:48:32', '2020-02-05 04:48:32', 0, 0, '786786', '50', 0, '0000-00-00 00:00:00.000000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dispute_vendors`
--

CREATE TABLE `dispute_vendors` (
  `id` int(10) UNSIGNED NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` longtext COLLATE utf8mb4_unicode_ci,
  `images` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `event_order_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dispute_vendors`
--

INSERT INTO `dispute_vendors` (`id`, `reason`, `email`, `phone_number`, `summary`, `images`, `user_id`, `vendor_id`, `event_id`, `order_id`, `event_order_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Not coming', 'bajwa9876470491@gmail.com', '789654156', 'awsas', NULL, 32, 35, 55, 2, 1, 2, '2020-02-12 06:14:02', '2020-02-12 09:10:07');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `subject`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1, 'Vendor Submit {business-title} Business', 'Vendor Submit Business', '<p>Please reviews the&nbsp;{business-title} Business.</p>', '2019-12-19 18:30:00', '2019-12-02 04:34:20'),
(2, '{business-title} Business Approve.', 'Approve Business', '<p>{business-title} Business Approved.</p>', '2019-12-13 18:30:00', '2019-12-02 04:34:46'),
(3, '{business-title} Business Rejected.', 'Reject Business', '<p>{business-title} Business is rejected from the admin cause of some reason.</p>', NULL, '2019-12-02 04:38:28'),
(4, 'Order Status', 'User Order Sucessful', '<p>Hello {name},</p>\r\n\r\n<p>Your order is placed Successfully.</p>\r\n\r\n<p>{OrderDetail}</p>', '2019-12-31 02:14:44', '2019-12-31 02:18:47'),
(5, 'New Order is placed.', 'Order Status For Admin', '<p>Hello Admin,</p>\r\n\r\n<p>The order is placed successfully&nbsp;</p>\r\n\r\n<p>{OrderDetail}</p>\r\n\r\n<p>&nbsp;</p>', '2019-12-31 06:28:39', '2019-12-31 06:55:57'),
(6, 'You have an order : {orderID}', 'Order Status for Vendor', '<p>Hello {name},</p>\r\n\r\n<p>The order is placed successfully&nbsp;</p>\r\n\r\n<p>{OrderDetail}</p>', '2019-12-31 07:11:00', '2019-12-31 07:12:15'),
(7, 'Your Account has been approved', 'Vendor Approval', '<p>Hello {name}</p>\r\n\r\n<p>Your Account has been approved</p>', '2020-01-02 08:54:48', '2020-01-02 08:56:04'),
(8, 'Your Account has been rejected.', 'Reject Approval', '<p>Hello {name}</p>\r\n\r\n<p>Your Account has been rejected due to some reason which is given below:</p>\r\n\r\n<p>{detail}&nbsp;</p>\r\n\r\n<p>Please Correct your detail according to rejection : {link}</p>', '2020-01-02 08:55:01', '2020-01-09 03:15:58'),
(9, 'We have reference to inviting you at our Website', 'Inviting Vendor', '<p>Hello {name}</p>\r\n\r\n<p>We have reference to inviting you to our Website.&nbsp;<strong>{business}</strong></p>\r\n\r\n<p>Please join&nbsp;our membership&nbsp;to grow up your business.</p>', '2020-01-03 00:45:15', '2020-01-09 02:46:41'),
(10, 'Resubmit account for approval', 'Vendor Account Resubmit for Approval', '<p>Hello Admin</p>\r\n\r\n<p>{name} has been updated the account information according to your message.</p>\r\n\r\n<p>Please check from : {link}</p>', '2020-01-09 05:12:17', '2020-01-09 05:15:15'),
(11, 'New Vendor Joining', 'New Vendor', '<p>Hello Admin</p>\r\n\r\n<p>{name} is joined as A vendor account.</p>\r\n\r\n<p>Please check from this link: {link}</p>', '2020-01-09 05:58:03', '2020-01-09 06:00:37'),
(12, 'Pricing Quote Request', 'Pricing Quote Request', '<p>Hello {name},</p>\r\n\r\n<p>{username} is requested for Pricing Quote:</p>\r\n\r\n<p>{message}</p>', '2020-01-13 01:50:25', '2020-01-13 01:53:16'),
(13, 'Request For Custom Package', 'Request For Custom Package', '<p>Hello {name}</p>\r\n\r\n<p>You have a request for create custom package by {username} :</p>\r\n\r\n<p>{message}</p>\r\n\r\n<p>&nbsp;</p>', '2020-01-13 01:50:44', '2020-01-13 04:08:04'),
(14, 'Order Placed', 'Order Placed', '<p>Hello {name}</p>\r\n\r\n<p>Your order have been placed successfully.</p>\r\n\r\n<p>{OrderDetail}</p>', '2020-02-04 02:42:52', '2020-02-04 03:16:37'),
(15, 'You have an new Order.', 'New Order For Vendor', '<p>Hello {name}</p>\r\n\r\n<p>You have an new Order</p>\r\n\r\n<p>{OrderDetail}</p>', '2020-02-04 05:30:50', '2020-02-04 05:33:02'),
(16, 'Your Business is blocked', 'Block The Vendor', '<p>Hello {name}</p>\r\n\r\n<p>your business ({businesName}) is blocked.</p>\r\n\r\n<p>Thanks</p>', '2020-02-12 08:39:16', '2020-02-12 08:40:45'),
(17, 'Inviting', 'Invite User', '<p>Hello {name}</p>\r\n\r\n<p>We have reference to inviting you to our Website.&nbsp;<b>&nbsp;</b></p>\r\n\r\n<p>Please join&nbsp;with us and find vendors.</p>', '2020-02-13 02:26:25', '2020-02-13 02:27:50'),
(18, 'Your Shop has been rejected.', 'Shop Rejected', '<p>Hello {name},</p>\r\n\r\n<p>Your shop {shopName} is rejected to due some reasons which are given below:</p>\r\n\r\n<p>{reasons}</p>', '2020-02-17 06:35:18', '2020-02-17 06:36:48'),
(19, 'Product Rejection', 'Product Rejection', '<p>Hello {name},</p>\r\n\r\n<p>The Product has been rejected by Admin due to some reasons:</p>\r\n\r\n<p>Shop Name : {shopName},</p>\r\n\r\n<p>Product Name : {productName)</p>\r\n\r\n<p>Reasons are:</p>\r\n\r\n<p>{reasons}</p>', '2020-02-17 06:37:07', '2020-02-17 06:48:56'),
(20, 'Your Shop is Approved', 'Shop Approved', '<p>Hello {name}</p>\r\n\r\n<p>Your Shop ({shopName}) is approved now.</p>', '2020-02-17 08:55:52', '2020-02-17 09:13:57'),
(21, 'Product is Approved', 'Product Approved', '<p>Hello {name},</p>\r\n\r\n<p>The Product has been approved by Admin.</p>\r\n\r\n<p>Shop Name : {shopName},</p>\r\n\r\n<p>Product Name : {productName)</p>', '2020-02-18 02:48:03', '2020-02-18 02:49:16'),
(22, NULL, 'rr', '', '2020-03-05 05:31:46', '2020-03-05 05:31:46');

-- --------------------------------------------------------

--
-- Table structure for table `eshops`
--

CREATE TABLE `eshops` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `vendor_id` int(11) NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_account_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_account_status` int(11) NOT NULL DEFAULT '0',
  `paypal_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `approved_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `eshops`
--

INSERT INTO `eshops` (`id`, `name`, `slug`, `vendor_id`, `logo`, `stripe_account_id`, `stripe_account_status`, `paypal_email`, `status`, `approved_status`, `created_at`, `updated_at`) VALUES
(1, 'Wedding Collection Store', 'wedding-collection-store', 31, 'images/shops/1579618371hfZndz9YvNPyoZ7fXxNlfinal_cover.jpg', 'acct_1G6cxyFzSNgbCEQp', 1, NULL, 1, 1, '2020-01-21 06:22:34', '2020-02-17 10:06:31'),
(2, 'Kanny Store', 'kanny-store', 59, 'images/shops/1579952141TNKSXpLgssKKTvsTHUwn15747561420CECWnSZ7yaVhvavQEMn14997.png', 'acct_1Fz0whE8A1VCXYb0', 1, NULL, 1, 0, '2020-01-25 06:05:41', '2020-02-11 02:04:59'),
(3, 'Tester', NULL, 44, 'images/shops/1580214939NHFRYyqhDKS0B2nMhXTmdownload.jpg', '', 0, NULL, 1, 0, '2020-01-28 07:05:39', '2020-01-28 07:05:39'),
(4, 'DreamLand', 'dreamland', 76, 'images/shops/1580468962GLv2Q938M0HpKucRGAmX5.jpg', NULL, 0, NULL, 1, 2, '2020-01-31 05:39:22', '2020-02-17 09:33:41');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'event',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `slug`, `image`, `status`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Tests', 'Testing', 'test', NULL, 1, 'event', '2019-11-12 14:00:41', '2019-11-12 15:03:28'),
(2, 'Wedding', 'Wedding', 'wedding', NULL, 1, 'event', '2019-11-13 03:36:46', '2019-11-14 02:28:47'),
(3, 'Reception', 'Reception', 'reception', NULL, 1, 'event', '2019-11-13 03:37:17', '2019-11-13 03:37:17'),
(4, 'Baby Shower', 'Baby Shower', 'baby-shower', NULL, 1, 'event', '2019-11-13 03:38:50', '2020-02-24 02:07:49'),
(5, 'Retreat/ Team Building', 'Retreat/ Team Building', 'retreat-team-building', NULL, 1, 'game', '2019-11-13 03:38:58', '2019-12-20 06:30:20'),
(6, 'Date Night', 'Date Night', 'date-night', NULL, 1, 'event', '2019-11-13 03:39:10', '2019-11-13 03:39:10'),
(7, 'Birth Day', 'Birth Day', 'birth-day', NULL, 0, 'event', '2019-11-13 03:39:21', '2019-11-18 05:30:14'),
(8, 'Hot', 'Hot Des', 'hot', NULL, 0, 'event', '2019-11-13 15:05:42', '2019-11-18 05:30:29'),
(9, 'test', 'dfdfsdf sdfsd sdfds sfsdf', 'test-1', NULL, 1, 'event', '2019-11-14 07:59:35', '2019-11-14 07:59:35'),
(10, 'Event Type Demo', 'Demo Description', 'event-type-demo', NULL, 1, 'event', '2019-11-15 04:14:37', '2019-11-15 04:14:37'),
(11, 'Pool Party', 'DJ  full  and drinks.', 'pool-part', NULL, 1, 'event', '2019-11-18 04:57:44', '2019-11-21 07:07:27'),
(12, 'Jaskaran Singh', 'spanning back to the beginning of human civiliz.', 'jaskaran-singh', NULL, 0, 'event', '2019-11-19 02:49:01', '2019-11-21 00:35:01'),
(13, 'Jaskaran Sandha', 'Back to the beginning of human civilize.', 'jaskaran', NULL, 0, 'event', '2019-11-19 03:31:00', '2019-11-19 03:39:03'),
(14, 'fafasa', 'asgasgagag', 'fafasa', NULL, 1, 'event', '2019-11-20 00:50:26', '2019-11-20 00:50:26'),
(15, 'Vaisakhi', 'Vaisakhi, also known as Baisakhi, Vaishakhi, Vaisakhi, also known as Baisakhi, Vaishakhi, or Vasakhi is a historical and religious festival in Hinduism and Sikhism. It is usually celebrated on 13 or 14 April every year, which commemorates the formation of Khalsa panth of warriors under Guru Gobind Singh in 1699. Wikipedia', 'vaisakhi', NULL, 0, 'event', '2019-11-20 03:41:07', '2019-11-20 03:50:45'),
(16, 'Jasss', 'The image must be an image. Error message should be correct .  it should be sound goodThe image must be an image. Error message should be correct .  it should be sound goodThe image must be an image. Error message should be correct .  it should be sound goodThe image must be an image. Error message should be correct .  it should be sound goodThe image must be an image. Error message should be correct .  it should be sound good', 'jaskaran-singh123', NULL, 0, 'event', '2019-11-20 07:53:58', '2019-11-21 00:35:12'),
(17, 'Birthday Party', 'many parts of the world an individual\'s birthday is celebrated by a party where a specially made cake, usually decorated with lettering and the person\'s age, is presented. The cake is traditionally studded with the same number of lit candles as the age of the individual, or a number candle representing their age.', 'birthday-party', NULL, 1, 'event', '2019-12-05 04:55:24', '2019-12-05 04:55:59'),
(18, 'Anniversary', 'Anniversary', 'anniversary-checklist', NULL, 1, 'event', '2020-02-24 01:57:08', '2020-02-24 02:07:00'),
(19, 'Conference', 'Conference', 'conference', NULL, 1, 'event', '2020-02-24 02:18:18', '2020-02-24 02:18:18'),
(20, 'Cookout and Ideas', 'Cookout and Ideas', 'cookout-and-ideas', NULL, 1, 'event', '2020-02-24 02:30:59', '2020-02-24 02:30:59'),
(21, 'Family Reunion', 'Family Reunion', 'family-reunion', NULL, 1, 'event', '2020-02-24 02:55:46', '2020-02-24 02:55:46'),
(22, 'Graduation', 'Graduation', 'graduation', NULL, 1, 'event', '2020-02-24 03:00:55', '2020-02-24 03:00:55'),
(23, 'Meetup', 'Meetup', 'meetup', NULL, 1, 'event', '2020-02-24 03:10:01', '2020-02-24 03:10:01'),
(24, 'Retreat', 'Retreat', 'retreat', NULL, 1, 'event', '2020-02-24 03:24:16', '2020-02-24 03:24:16'),
(25, 'Team Building', 'Team Building', 'team-building', NULL, 1, 'event', '2020-02-24 03:29:59', '2020-02-24 03:29:59');

-- --------------------------------------------------------

--
-- Table structure for table `event_orders`
--

CREATE TABLE `event_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `OrderID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `vendor_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `deal_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checkout_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cart',
  `package_price` double DEFAULT NULL,
  `discounted_price` double DEFAULT NULL,
  `addons` double NOT NULL DEFAULT '0',
  `addon_price` double NOT NULL DEFAULT '0',
  `subtotal` double DEFAULT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` double NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT NULL,
  `order_status` int(11) DEFAULT NULL,
  `payment_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL,
  `payment_data` longtext COLLATE utf8mb4_unicode_ci,
  `related_tableData` longtext COLLATE utf8mb4_unicode_ci,
  `paymentDetails` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_orders`
--

INSERT INTO `event_orders` (`id`, `OrderID`, `order_id`, `vendor_id`, `event_id`, `package_id`, `user_id`, `deal_id`, `category_id`, `type`, `checkout_type`, `package_price`, `discounted_price`, `addons`, `addon_price`, `subtotal`, `coupon_code`, `discount`, `status`, `order_status`, `payment_type`, `payment_status`, `payment_data`, `related_tableData`, `paymentDetails`, `created_at`, `updated_at`) VALUES
(1, '#ENV1581492730', 2, 35, 55, 36, 32, 43, 1, 'order', 'cart', 1000, 500, 0, 0, 1000, '786786', 500, 0, NULL, 'STRIPE', 1, '{"id":"ch_1GBFheENgNZPUt9Ks3FWkGnN","object":"charge","amount":51663,"amount_refunded":0,"application":null,"application_fee":null,"application_fee_amount":null,"balance_transaction":"txn_1GBFheENgNZPUt9Kk4b72ulD","billing_details":{"address":{"city":null,"country":null,"line1":null,"line2":null,"postal_code":null,"state":null},"email":null,"name":"bajwa9876470491@gmail.com","phone":null},"captured":true,"created":1581492730,"currency":"usd","customer":null,"description":"Customer for pay for #ENV1581492730","destination":null,"dispute":null,"disputed":false,"failure_code":null,"failure_message":null,"fraud_details":[],"invoice":null,"livemode":false,"metadata":[],"on_behalf_of":null,"order":null,"outcome":{"network_status":"approved_by_network","reason":null,"risk_level":"normal","risk_score":57,"seller_message":"Payment complete.","type":"authorized"},"paid":true,"payment_intent":null,"payment_method":"card_1GBFhbENgNZPUt9KfaX472zg","payment_method_details":{"card":{"brand":"visa","checks":{"address_line1_check":null,"address_postal_code_check":null,"cvc_check":"pass"},"country":"US","exp_month":12,"exp_year":2020,"fingerprint":"5yPNVhsLBrcpIKlS","funding":"unknown","installments":null,"last4":"1111","network":"visa","three_d_secure":null,"wallet":null},"type":"card"},"receipt_email":null,"receipt_number":null,"receipt_url":"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1Fbq7RENgNZPUt9K\\/ch_1GBFheENgNZPUt9Ks3FWkGnN\\/rcpt_Gih5pRvhyW2ssGnRpHugIUhTPK93p3Q","refunded":false,"refunds":{"object":"list","data":[],"has_more":false,"total_count":0,"url":"\\/v1\\/charges\\/ch_1GBFheENgNZPUt9Ks3FWkGnN\\/refunds"},"review":null,"shipping":null,"source":{"id":"card_1GBFhbENgNZPUt9KfaX472zg","object":"card","address_city":null,"address_country":null,"address_line1":null,"address_line1_check":null,"address_line2":null,"address_state":null,"address_zip":null,"address_zip_check":null,"brand":"Visa","country":"US","customer":null,"cvc_check":"pass","dynamic_last4":null,"exp_month":12,"exp_year":2020,"fingerprint":"5yPNVhsLBrcpIKlS","funding":"unknown","last4":"1111","metadata":[],"name":"bajwa9876470491@gmail.com","tokenization_method":null},"source_transfer":null,"statement_descriptor":null,"statement_descriptor_suffix":null,"status":"succeeded","transfer_data":null,"transfer_group":null}', '{"package_data":{"id":36,"title":"Grab Gold Package","slug":"grab-gold-package","description":"<p>Grab Gold Package for dummy offers<\\/p>","category_id":1,"user_id":59,"price":1000,"no_of_hours":5,"no_of_days":5,"menus":"<p>No<\\/p>","price_type":"per_person","min_person":100,"max_person":1000,"vendor_category_id":35,"type":0,"user_requested_by":0,"custom_package_id":0,"status":1,"created_at":"2019-12-09 10:29:45","updated_at":"2019-12-09 10:29:45"},"event_data":{"id":55,"user_id":32,"slug":"wedding-anniversary-1","title":"Wedding Anniversary","event_picture":"images\\/events\\/1581090544yF63jasWChjjUDiR60R9photo1507217633297c9815ce2f885.jpeg","event_budget":1000,"long_description":"wewewe","description":"we","start_date":"2020-02-15 00:00:00","end_date":"2020-02-15 00:00:00","location":"Lombard Street, San Francisco, CA, USA","latitude":"37.80105529999999","longitude":"-122.4262049","event_type":"2","status":0,"min_person":100,"max_person":200,"start_time":"03:15 AM","end_time":"03:10 AM","seasons":"12","colour":"[{\\"colourName\\":\\"red\\",\\"colour\\":\\"#fe1717\\"}]","notepad":null,"ideas":null,"created_at":"2020-02-07 15:49:04","updated_at":"2020-02-12 07:07:18","event_categories":[{"id":528,"parent":0,"user_id":32,"type":"events","key":"category_id","key_value":"1","event_id":55,"created_at":"2020-02-12 07:07:18","updated_at":"2020-02-12 07:07:18","event_category":{"id":1,"parent":0,"label":"Photography","subparent":0,"sorting":23,"slug":"photography","status":1,"capacity":0,"created_at":"2019-11-09 08:13:13","updated_at":"2020-01-16 09:58:59","description":null,"image":"images\\/categories\\/15743400105v2qXkoiDtFtn0gWQT1g-photography.png","thumbnail_image":"","meta_title":"photography","color":"#ff80c0","cover_type":1,"meta_tag":"photography","meta_description":"photography","featured":0,"template_id":1}}]},"deal_data":{"id":43,"category_id":1,"slug":"test-event-deal","user_id":59,"vendor_category_id":35,"title":"Test Event Deal","message_text":"Test Event Deal","image":"images\\/vendors\\/deals\\/1580897912MomjOSnSqCni83TPkrKu15747561420CECWnSZ7yaVhvavQEMn14997.png","description":"Test Event Deal","expiry_date":"0000-00-00 00:00:00","type":null,"deal_life":0,"created_at":"2020-02-05 10:18:32","updated_at":"2020-02-05 10:18:32","type_of_deal":0,"packages":0,"deal_code":"786786","amount":"50","deal_off_type":0,"start_date":"0000-00-00 00:00:00","min_price":0}}', '{"35":{"vendor_id":35,"total":516.63,"sum":500,"amount":500,"tax":6.63,"commission_fee":10,"service_fee":10,"payable_amount":480,"account_id":null,"stripeAccountParams":{"amount":480,"stripe_account":null}}}', '2020-02-12 02:01:17', '2020-02-12 02:02:11'),
(2, NULL, 0, 1, 40, 47, 50, 0, 1, 'cart', 'cart', 2000, 2000, 0, 0, 2000, NULL, 0, 0, NULL, NULL, NULL, NULL, '{"package_data":{"id":47,"title":"Sample 1","slug":"sample-1","description":"<p>test<\\/p>","category_id":1,"user_id":31,"price":2000,"no_of_hours":5,"no_of_days":2,"menus":"<p>test<\\/p>","price_type":"per_person","min_person":20,"max_person":1000,"vendor_category_id":1,"type":0,"user_requested_by":0,"custom_package_id":0,"status":1,"created_at":"2019-12-31 07:16:13","updated_at":"2019-12-31 07:16:13"},"event_data":{"id":40,"user_id":50,"slug":"birthday-bash-party","title":"Birthday Bash Party","event_picture":"images\\/events\\/1577697409eRqVgI1EVuZUhfyw35Fs15747561420CECWnSZ7yaVhvavQEMn14997.png","event_budget":2500,"long_description":"Birthday Bash Party","description":"Birthday Bash Party","start_date":"2020-12-17 00:00:00","end_date":"2021-01-21 00:00:00","location":"Newark International Airport Street, Newark, NJ, USA","latitude":"40.6921118","longitude":"-74.1828812","event_type":"11","status":0,"min_person":100,"max_person":250,"start_time":"09:15 AM","end_time":"06:25 AM","seasons":"Summer","colour":"#d03333","notepad":null,"ideas":null,"created_at":"2019-12-30 09:16:49","updated_at":"2020-01-17 10:43:34","event_categories":[{"id":417,"parent":0,"user_id":50,"type":"events","key":"category_id","key_value":"1","event_id":40,"created_at":"2020-01-17 10:43:34","updated_at":"2020-01-17 10:43:34","event_category":{"id":1,"parent":0,"label":"Photography","subparent":0,"sorting":23,"slug":"photography","status":1,"capacity":0,"created_at":"2019-11-09 08:13:13","updated_at":"2020-01-16 09:58:59","description":null,"image":"images\\/categories\\/15743400105v2qXkoiDtFtn0gWQT1g-photography.png","thumbnail_image":"","meta_title":"photography","color":"#ff80c0","cover_type":1,"meta_tag":"photography","meta_description":"photography","featured":0,"template_id":1}},{"id":418,"parent":0,"user_id":50,"type":"events","key":"category_id","key_value":"11","event_id":40,"created_at":"2020-01-17 10:43:34","updated_at":"2020-01-17 10:43:34","event_category":{"id":11,"parent":0,"label":"Venues","subparent":0,"sorting":29,"slug":"venues","status":1,"capacity":1,"created_at":"2019-11-13 08:21:29","updated_at":"2020-01-16 09:59:00","description":null,"image":"images\\/categories\\/1574340571KoXV6BcmL7FtmiqzGJCy-venue.png","thumbnail_image":"","meta_title":"Venues","color":"#00ff00","cover_type":1,"meta_tag":"Venues","meta_description":"Venues","featured":1,"template_id":1}},{"id":419,"parent":0,"user_id":50,"type":"events","key":"category_id","key_value":"20","event_id":40,"created_at":"2020-01-17 10:43:34","updated_at":"2020-01-17 10:43:34","event_category":{"id":20,"parent":0,"label":"Event Planner","subparent":0,"sorting":13,"slug":"event-planner","status":1,"capacity":0,"created_at":"2019-11-13 09:04:21","updated_at":"2020-01-16 09:58:59","description":null,"image":"images\\/categories\\/1574339133CJtGgkOlGdtRvuXmyF1k-entertainers2.png","thumbnail_image":"","meta_title":"Event Planner","color":"#ff8040","cover_type":1,"meta_tag":"Event Planner","meta_description":"Event Planner","featured":1,"template_id":1}}]},"deal_data":[]}', NULL, '2020-02-12 05:55:36', '2020-02-12 05:55:36'),
(3, NULL, 0, 1, 40, 47, 50, 0, 1, 'wishlist', 'cart', 2000, 2000, 0, 0, 2000, NULL, 0, 0, NULL, NULL, NULL, NULL, '{"package_data":{"id":47,"title":"Sample 1","slug":"sample-1","description":"<p>test<\\/p>","category_id":1,"user_id":31,"price":2000,"no_of_hours":5,"no_of_days":2,"menus":"<p>test<\\/p>","price_type":"per_person","min_person":20,"max_person":1000,"vendor_category_id":1,"type":0,"user_requested_by":0,"custom_package_id":0,"status":1,"created_at":"2019-12-31 07:16:13","updated_at":"2019-12-31 07:16:13"},"event_data":{"id":40,"user_id":50,"slug":"birthday-bash-party","title":"Birthday Bash Party","event_picture":"images\\/events\\/1577697409eRqVgI1EVuZUhfyw35Fs15747561420CECWnSZ7yaVhvavQEMn14997.png","event_budget":2500,"long_description":"Birthday Bash Party","description":"Birthday Bash Party","start_date":"2020-12-17 00:00:00","end_date":"2021-01-21 00:00:00","location":"Newark International Airport Street, Newark, NJ, USA","latitude":"40.6921118","longitude":"-74.1828812","event_type":"11","status":0,"min_person":100,"max_person":250,"start_time":"09:15 AM","end_time":"06:25 AM","seasons":"Summer","colour":"#d03333","notepad":null,"ideas":null,"created_at":"2019-12-30 09:16:49","updated_at":"2020-01-17 10:43:34","event_categories":[{"id":417,"parent":0,"user_id":50,"type":"events","key":"category_id","key_value":"1","event_id":40,"created_at":"2020-01-17 10:43:34","updated_at":"2020-01-17 10:43:34","event_category":{"id":1,"parent":0,"label":"Photography","subparent":0,"sorting":23,"slug":"photography","status":1,"capacity":0,"created_at":"2019-11-09 08:13:13","updated_at":"2020-01-16 09:58:59","description":null,"image":"images\\/categories\\/15743400105v2qXkoiDtFtn0gWQT1g-photography.png","thumbnail_image":"","meta_title":"photography","color":"#ff80c0","cover_type":1,"meta_tag":"photography","meta_description":"photography","featured":0,"template_id":1}},{"id":418,"parent":0,"user_id":50,"type":"events","key":"category_id","key_value":"11","event_id":40,"created_at":"2020-01-17 10:43:34","updated_at":"2020-01-17 10:43:34","event_category":{"id":11,"parent":0,"label":"Venues","subparent":0,"sorting":29,"slug":"venues","status":1,"capacity":1,"created_at":"2019-11-13 08:21:29","updated_at":"2020-01-16 09:59:00","description":null,"image":"images\\/categories\\/1574340571KoXV6BcmL7FtmiqzGJCy-venue.png","thumbnail_image":"","meta_title":"Venues","color":"#00ff00","cover_type":1,"meta_tag":"Venues","meta_description":"Venues","featured":1,"template_id":1}},{"id":419,"parent":0,"user_id":50,"type":"events","key":"category_id","key_value":"20","event_id":40,"created_at":"2020-01-17 10:43:34","updated_at":"2020-01-17 10:43:34","event_category":{"id":20,"parent":0,"label":"Event Planner","subparent":0,"sorting":13,"slug":"event-planner","status":1,"capacity":0,"created_at":"2019-11-13 09:04:21","updated_at":"2020-01-16 09:58:59","description":null,"image":"images\\/categories\\/1574339133CJtGgkOlGdtRvuXmyF1k-entertainers2.png","thumbnail_image":"","meta_title":"Event Planner","color":"#ff8040","cover_type":1,"meta_tag":"Event Planner","meta_description":"Event Planner","featured":1,"template_id":1}}]},"deal_data":[]}', NULL, '2020-02-12 05:57:26', '2020-02-12 05:57:26'),
(4, '#ENV1582167109', 3, 1, 57, 47, 32, 0, 1, 'order', 'cart', 2000, 2000, 0, 0, 2000, NULL, 0, 0, NULL, 'STRIPE', 1, '{"id":"ch_1GEGNWENgNZPUt9KZGBsh7ZN","object":"charge","amount":204925,"amount_refunded":0,"application":null,"application_fee":null,"application_fee_amount":null,"balance_transaction":"txn_1GEGNXENgNZPUt9K2RjEPqh2","billing_details":{"address":{"city":null,"country":null,"line1":null,"line2":null,"postal_code":null,"state":null},"email":null,"name":"bajwa9876470491@gmail.com","phone":null},"captured":true,"created":1582210310,"currency":"usd","customer":null,"description":"Customer for pay for #ENV1582167109","destination":null,"dispute":null,"disputed":false,"failure_code":null,"failure_message":null,"fraud_details":[],"invoice":null,"livemode":false,"metadata":[],"on_behalf_of":null,"order":null,"outcome":{"network_status":"approved_by_network","reason":null,"risk_level":"normal","risk_score":27,"seller_message":"Payment complete.","type":"authorized"},"paid":true,"payment_intent":null,"payment_method":"card_1GEGNSENgNZPUt9KNkF0J7rR","payment_method_details":{"card":{"brand":"visa","checks":{"address_line1_check":null,"address_postal_code_check":null,"cvc_check":"pass"},"country":"US","exp_month":12,"exp_year":2020,"fingerprint":"5yPNVhsLBrcpIKlS","funding":"unknown","installments":null,"last4":"1111","network":"visa","three_d_secure":null,"wallet":null},"type":"card"},"receipt_email":null,"receipt_number":null,"receipt_url":"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1Fbq7RENgNZPUt9K\\/ch_1GEGNWENgNZPUt9KZGBsh7ZN\\/rcpt_GlnzsUHno0pDxbPLD5AnZ8LcuZqWZcJ","refunded":false,"refunds":{"object":"list","data":[],"has_more":false,"total_count":0,"url":"\\/v1\\/charges\\/ch_1GEGNWENgNZPUt9KZGBsh7ZN\\/refunds"},"review":null,"shipping":null,"source":{"id":"card_1GEGNSENgNZPUt9KNkF0J7rR","object":"card","address_city":null,"address_country":null,"address_line1":null,"address_line1_check":null,"address_line2":null,"address_state":null,"address_zip":null,"address_zip_check":null,"brand":"Visa","country":"US","customer":null,"cvc_check":"pass","dynamic_last4":null,"exp_month":12,"exp_year":2020,"fingerprint":"5yPNVhsLBrcpIKlS","funding":"unknown","last4":"1111","metadata":[],"name":"bajwa9876470491@gmail.com","tokenization_method":null},"source_transfer":null,"statement_descriptor":null,"statement_descriptor_suffix":null,"status":"succeeded","transfer_data":null,"transfer_group":null}', '{"package_data":{"id":47,"title":"Sample 1","slug":"sample-1","description":"<p>test<\\/p>","category_id":1,"user_id":31,"price":2000,"no_of_hours":5,"no_of_days":2,"menus":"<p>test<\\/p>","price_type":"per_person","min_person":20,"max_person":1000,"vendor_category_id":1,"type":0,"user_requested_by":0,"custom_package_id":0,"status":1,"created_at":"2019-12-31 07:16:13","updated_at":"2019-12-31 07:16:13"},"event_data":{"id":57,"user_id":32,"slug":"my-darling-s-birthday","title":"My Love Birthday","event_picture":"images\\/events\\/1581582640SaC7DVuBAj2yMW3IJaP6plussizeweddingdressesimage.jpg","event_budget":50000,"long_description":"tes","description":"test","start_date":"2020-02-23 00:00:00","end_date":"2020-02-24 00:00:00","location":"Lombard Street, San Francisco, CA, USA","latitude":"37.80105529999999","longitude":"-122.4262049","event_type":"17","status":0,"min_person":120,"max_person":400,"start_time":"12:00 AM","end_time":"04:00 PM","seasons":"Summer","colour":"[{\\"colourName\\":\\"Red\\",\\"colour\\":\\"#ff0101\\"},{\\"colourName\\":\\"White\\",\\"colour\\":\\"#ffffff\\"}]","notepad":null,"ideas":null,"created_at":"2020-02-13 08:30:40","updated_at":"2020-02-20 14:08:22","event_categories":[{"id":535,"parent":0,"user_id":32,"type":"events","key":"category_id","key_value":"1","event_id":57,"created_at":"2020-02-20 14:08:22","updated_at":"2020-02-20 14:08:22","event_category":{"id":1,"parent":0,"label":"Photography","subparent":0,"sorting":23,"slug":"photography","status":1,"capacity":0,"created_at":"2019-11-09 08:13:13","updated_at":"2020-01-16 09:58:59","description":null,"image":"images\\/categories\\/15743400105v2qXkoiDtFtn0gWQT1g-photography.png","thumbnail_image":"","meta_title":"photography","color":"#ff80c0","cover_type":1,"meta_tag":"photography","meta_description":"photography","featured":0,"template_id":1}},{"id":536,"parent":0,"user_id":32,"type":"events","key":"category_id","key_value":"12","event_id":57,"created_at":"2020-02-20 14:08:22","updated_at":"2020-02-20 14:08:22","event_category":{"id":12,"parent":0,"label":"Flowers\\/Florist","subparent":0,"sorting":30,"slug":"flowers-florist","status":1,"capacity":0,"created_at":"2019-11-13 08:21:44","updated_at":"2020-01-16 10:00:44","description":null,"image":"images\\/categories\\/1574338941zjFl0RTRQa4urXRVqZaw-florist.png","thumbnail_image":"","meta_title":"Flowers\\/Florist","color":"#0080ff","cover_type":1,"meta_tag":"Flowers\\/Florist","meta_description":"Flowers\\/Florist","featured":1,"template_id":1}},{"id":537,"parent":0,"user_id":32,"type":"events","key":"category_id","key_value":"20","event_id":57,"created_at":"2020-02-20 14:08:22","updated_at":"2020-02-20 14:08:22","event_category":{"id":20,"parent":0,"label":"Event Planner","subparent":0,"sorting":13,"slug":"event-planner","status":1,"capacity":0,"created_at":"2019-11-13 09:04:21","updated_at":"2020-01-16 09:58:59","description":null,"image":"images\\/categories\\/1574339133CJtGgkOlGdtRvuXmyF1k-entertainers2.png","thumbnail_image":"","meta_title":"Event Planner","color":"#ff8040","cover_type":1,"meta_tag":"Event Planner","meta_description":"Event Planner","featured":1,"template_id":1}}]},"deal_data":[]}', '{"1":{"vendor_id":1,"total":2049.25,"sum":2000,"amount":2000,"tax":9.25,"commission_fee":60,"service_fee":40,"payable_amount":1900,"account_id":"photostripe@gmail.com","stripeAccountParams":{"amount":1900,"stripe_account":"photostripe@gmail.com"}}}', '2020-02-20 09:18:31', '2020-02-20 09:21:51');

-- --------------------------------------------------------

--
-- Table structure for table `favourite_vendors`
--

CREATE TABLE `favourite_vendors` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favourite_vendors`
--

INSERT INTO `favourite_vendors` (`id`, `vendor_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 35, 50, '2020-01-17 06:16:17', '2020-01-17 06:16:17');

-- --------------------------------------------------------

--
-- Table structure for table `f_a_qs`
--

CREATE TABLE `f_a_qs` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci,
  `answer` longtext COLLATE utf8mb4_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `vendor_category_id` int(11) NOT NULL DEFAULT '0',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `f_a_qs`
--

INSERT INTO `f_a_qs` (`id`, `question`, `answer`, `user_id`, `category_id`, `vendor_category_id`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'What all services can you offer?', '<ul>\r\n	<li>Candid Photography</li>\r\n	<li>Traditional Photography</li>\r\n	<li>Pre-wedding shoots</li>\r\n	<li>Cinematography</li>\r\n	<li>Traditional Videography</li>\r\n	<li>Albums</li>\r\n</ul>', 31, 1, 1, NULL, 1, '2019-11-20 02:18:06', '2019-11-20 02:18:45'),
(2, 'What is the price of your most popular wedding package?', '<p>175000</p>', 31, 1, 1, NULL, 1, '2019-11-20 02:19:17', '2019-11-20 02:19:17'),
(3, 'What all does the most popular package include?', '<p>Traditional Photographer, Candid Photographer on Wedding and Engagement,Cinematic Video on Wedding and Engagement, HD Video on Small Function Like Mehendi and Haldi etc with 2 Albums</p>', 31, 1, 1, NULL, 1, '2019-11-20 02:19:48', '2019-11-20 02:19:48'),
(4, 'What is the starting price per day for candid photography?', '<p>30,000</p>', 31, 1, 1, NULL, 1, '2019-11-20 02:20:18', '2019-11-20 02:20:18'),
(5, 'What is the starting price for your wedding photography services?', '<p>$ 2299.00</p>', 42, 1, 11, NULL, 1, '2019-11-20 03:29:58', '2019-11-20 03:29:58'),
(6, 'What primary photographic style do you identify with?', '<ul>\r\n	<li>Contemporary</li>\r\n	<li>Natural</li>\r\n	<li>Photojournalism</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>', 42, 1, 11, NULL, 1, '2019-11-20 03:31:07', '2019-11-20 03:31:07'),
(7, 'Why can\'t I log in to my Print Genie account even though I connected a store?', '<p>Why can&#39;t I log in to my Print Genie account even though I connected a store&nbsp;</p>', 31, 18, 2, NULL, 1, '2019-11-21 07:26:30', '2019-11-21 07:26:30'),
(15, 'How we are playing.', '<p>Do you have experience in&nbsp;<b>event</b>&nbsp;from start to finish according to requirements, brand, target audience and objectives? If yes ,then go through our&nbsp;<b>event planner</b>&nbsp;interview&nbsp;<b>questions</b>&nbsp;page for better understanding of interview process and win in job search.</p>', 44, 20, 22, NULL, 1, '2019-11-26 04:32:49', '2019-11-26 04:32:49'),
(16, 'question', '<p>answer</p>', 34, 25, 15, NULL, 1, '2019-11-27 01:37:13', '2019-11-27 01:37:13'),
(17, 'Why can\'t I log in to my Print Genie account even though I connected a store?', '<p>Why can&#39;t I log in to my Print Genie account even though I connected a store</p>', 31, 11, 24, NULL, 1, '2019-11-27 02:10:43', '2019-11-27 02:10:43'),
(18, 'developer question about develop the application?', '<p>It is a long established fact that a reader will be distracted by the readable</p>', 34, 11, 25, NULL, 1, '2019-11-27 02:19:26', '2019-11-27 02:19:26'),
(22, 'q1', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 34, 20, 14, NULL, 1, '2019-11-29 05:08:25', '2019-12-10 04:54:44'),
(23, 'It is a long established fact that a reader will be distracted by the readable', '<p>l[kplk[</p>', 34, 20, 14, NULL, 1, '2019-11-29 05:10:25', '2019-11-29 05:10:25'),
(25, 'Helloo', '<p>Ffjhvh jhgjgjhgjh g lhjhjg he gjg hug Jha he h &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', 44, 11, 26, NULL, 1, '2019-12-02 04:23:50', '2019-12-06 04:24:54'),
(26, 'new question', '<p>my answer</p>', 34, 20, 14, NULL, 1, '2019-12-03 04:41:08', '2019-12-03 04:41:08'),
(27, 'Testing', '<p>FGsh vjvihg NV. &nbsp;Jghkf I&rsquo;ve iub is ukub Uk bulb ukulele is bi buhig igig ig Uk Gil his hkhuiug I big jug I h kgukugig is iu gig is iu go gi gigigiugigiguguiggiy Uighur IGN iigu ig u gig ug if if g I gut if ,IGN I give gjg give it ig. I giygiyg iguana ignite go gg ig I gig I guess hi gu gig is juggjg I big jgjg jiggly IGN IGN ujg g gi&nbsp;</p>', 44, 11, 26, NULL, 1, '2019-12-06 04:26:54', '2019-12-06 04:26:54'),
(29, 'What are the PLANS. What are the PLANS. What are the PLANS. What are the PLANS. What are the PLANS. What are the PLANS.', '<p>Book the best&nbsp;<b>wedding venues</b>&nbsp;for your&nbsp;<b>wedding</b>&nbsp;in chandigarh at guaranteed best prices. Book with weddingz.in - india&#39;s largest&nbsp;<b>wedding</b>&nbsp;company&nbsp;<b>and</b>&nbsp;enjoy hassle free bookings. Quality Services. Great Deals Available. Dedicated&nbsp;<b>Venue</b>&nbsp;Managers. Hassle Free Booking. Styles:&nbsp;<b>Wedding</b>&nbsp;Hotels,&nbsp;<b>Wedding</b>&nbsp;Lawns,&nbsp;<b>Wedding Venues</b>, Banquet Halls, 5 Star&nbsp;<b>Wedding</b>&nbsp;Hotels.Book the best&nbsp;<b>wedding venues</b>&nbsp;for your&nbsp;<b>wedding</b>&nbsp;in chandigarh at guaranteed best prices. Book with weddingz.in - india&#39;s largest&nbsp;<b>wedding</b>&nbsp;company&nbsp;<b>and</b>&nbsp;enjoy hassle free bookings. Quality Services. Great Deals Available. Dedicated&nbsp;<b>Venue</b>&nbsp;Managers. Hassle Free Booking. Styles:&nbsp;<b>Wedding</b>&nbsp;Hotels,&nbsp;<b>Wedding</b>&nbsp;Lawns,&nbsp;<b>Wedding Venues</b>, Banquet Halls, 5 Star&nbsp;<b>Wedding</b>&nbsp;Hotels.&nbsp;Book the best&nbsp;<b>wedding venues</b>&nbsp;for your&nbsp;<b>wedding</b>&nbsp;in chandigarh at guaranteed best prices. Book with weddingz.in - india&#39;s largest&nbsp;<b>wedding</b>&nbsp;company&nbsp;<b>and</b>&nbsp;enjoy hassle free bookings. Quality Services. Great Deals Available. Dedicated&nbsp;<b>Venue</b>&nbsp;Managers. Hassle Free Booking. Styles:&nbsp;<b>Wedding</b>&nbsp;Hotels,&nbsp;<b>Wedding</b>&nbsp;Lawns,&nbsp;<b>Wedding Venues</b>, Banquet Halls, 5 Star&nbsp;<b>Wedding</b>&nbsp;Hotels.</p>', 44, 11, 26, NULL, 1, '2019-12-10 00:53:27', '2019-12-10 00:53:27'),
(30, 'Its my Dummy Question', '<p>Its my dummy Answer</p>', 59, 11, 39, NULL, 1, '2019-12-23 07:46:23', '2019-12-23 07:46:23'),
(33, 'Do you offer discounts?', '<p>Yes, we offer the following discounts.<br />\r\n&nbsp;</p>\r\n\r\n<h2>-&nbsp;<strong>HOLIDAY CAMPS</strong></h2>\r\n\r\n<p>Sibling Discount &ndash; 10% &ndash; Coupon is: sb10 (this coupon code must be entered at the checkout page when completing your booking).<br />\r\n<br />\r\nThis discount applies to two of more courses being booked for siblings. The booking for both players must be made at the same time.<br />\r\n&nbsp;</p>\r\n\r\n<h2>- MKTC COACHING COURSES</h2>\r\n\r\n<p>To receive the early bird discount price you must enter the following coupon code at the checkout page: EARLY.<br />\r\nThis coupon can only be used during the specified early bird offer dates and cannot be used in conjunction with any other coupons, discounts or offers. Once the early bird deadline has passed, only one coupon per booking can be applied.<br />\r\n<br />\r\nSibling Discount &ndash;10% &ndash; Coupon is: sb10.<br />\r\nMultiple booking discount - Coupon is: mb10 - 10%. This coupon can only be used if one participant is booking onto 2 our more coaching groups.<br />\r\nFamily Discount -Coupon is: fam10. - 10% - This coupon can only be used for 3 or more members of the same family are booked onto courses. Must include at least 2 adults and one child.</p>', NULL, NULL, 0, 'user', 1, '2020-01-07 03:55:30', '2020-03-13 08:45:53'),
(35, 'Do you accept childcare vouchers?', '<p>Yes!</p>\r\n\r\n<p>DRH Sports LTD is registered with Ofsted and therefore able to accept childrecare vouchers as payment. Please see the list below of the voucher providers that we are currently registered with. If the provider that you are registered with does not appear on the list below then please email us at info@drhsports.co.uk. You can now make a booking with childcare vouchers using our booking system. All you need to do is book a camp as normal and then select &#39;Use Childcare Vouchers&#39; as your payment method. If you have any problems paying with childcare vouchers using the information below please email us.</p>\r\n\r\n<ul>\r\n	<li>Computershare - 24767070</li>\r\n	<li>Mychildcaervouchers (Eden Red) - P21144641</li>\r\n	<li>Sodexo - 878811</li>\r\n	<li>Care4 - 05007023 - SG5 2JG</li>\r\n	<li>Busy Bees - EY562954</li>\r\n	<li>Fair Care - DRHS0219</li>\r\n	<li>Kiddivouchers - Search for DRH Sports Ltd</li>\r\n	<li>Co-op flexible benefits - 85118351</li>\r\n	<li>RG Childcare - 70858896419</li>\r\n	<li>For Fidelity - Please search for us using our Ofsted number EY562954 or our post code SG5 2JG</li>\r\n	<li>For Tax Free Childcare, please select Childcare vouchers as the payment option and then select Tax Free Childcare as the voucher provider. Once slected and the order confirmed you&#39;ll need to log into your Tax Free Childcare portal and add DRH Sports Ltd as a childcare provider. In order to add us, please search for us using some or all of the following information: 50031676316, EY number - EY562954, Company Name: DRH Sports Ltd, Activity address: MK10 9JQ</li>\r\n</ul>', NULL, NULL, 0, 'user', 1, '2020-01-07 04:07:43', '2020-03-13 01:51:47'),
(36, 'Why should a bride and groom hire a wedding coordinator?', '<p>To truly enjoy their wedding day. To invest in their friends, family &amp; guests without worrying about the details themselves. To have a peace of mind that everything will run smoothly. Wedding coordinators are professionals who have experience and industry relationships that will allow the brides wedding vision come to life.</p>', NULL, NULL, 0, 'vendor', 1, '2020-01-07 08:20:54', '2020-01-09 02:00:57'),
(37, 'When does Camp Go run?', '<p>Our camps run in all school holidays except Christmas. A full list of upcoming bookable Camp GO camps can be found on the website.</p>', NULL, NULL, 0, 'user', 1, '2020-01-09 01:58:01', '2020-03-13 01:52:21'),
(38, 'Who are your coaches?', '<p>Our team is made up of enthusiastic sports professionals who work with children all year round. They are all fully qualified, insured, first aid trained and DBS checked.</p>', NULL, NULL, 0, 'user', 1, '2020-01-09 01:58:14', '2020-03-13 01:52:41'),
(39, 'What sports and activities do you offer at the Camp?', '<p>Tennis Camp:<br />\r\n<br />\r\nOur tennis camp comprises mostly tennis teaching, tennis games, matches and tournaments. Each day will have a different technique, shot or theme as the focus to the day. This means that over the course of the week the kids will have covered all of the shots, techniques and tactics that make up the basics of the game. The last day of each week generally consists of competitive games and tennis matchplay/tournament.<br />\r\nThe children will be given the opportunity to play other sports and games to break up the day if they wish. Those who want to continue playing tennis will be able to do this.<br />\r\n<br />\r\nMulti-sports:<br />\r\n<br />\r\nThe sports that the children will play at the multi-sport camp are:<br />\r\n- Football<br />\r\n- Cricket<br />\r\n- Hockey<br />\r\n- Tennis<br />\r\n- Table Tennis<br />\r\n- Dodgeball<br />\r\n- Netball<br />\r\n- Basketball<br />\r\n- Athletic games<br />\r\n- Swedish Handball<br />\r\n- Rounders</p>', NULL, NULL, 0, 'user', 1, '2020-01-09 01:58:29', '2020-03-13 01:53:59'),
(40, 'What are the staff to child ratios?', '<p>For children aged 3 - 7 years the staff to child ratio is 1:8.<br />\r\n<br />\r\nFor children aged 8 - 10 years the staff to child ratio is 1:12.<br />\r\n<br />\r\nOf course there are always additional staff on hand for any eventuality ensuring that we are able to fulfil a child&#39;s needs at all times.</p>', NULL, NULL, 0, 'user', 1, '2020-01-09 01:58:43', '2020-03-13 01:54:20'),
(41, 'As a vendor, what are the benefits to working with a wedding coordinator such as yourself?', '<p>So often I am told by other vendors that I am very easy to work with and very professional and friendly. I am flexible and get along with everyone. I don&rsquo;t see myself as a higher rank than the other vendors, which I am told some coordinators do. We are all there for the best interest of the bride &amp; groom. It&rsquo;s so important to work as a team on the wedding day with all vendors making sure everything goes well and to ensure a smooth &amp; flawless event. In addition, I also work 1 day a week for a videographer company so I get to see things from their point of view as a vendor; which helps me think in terms of the vendors and support them even more on the wedding day.</p>', NULL, NULL, 0, 'vendor', 1, '2020-01-09 02:01:11', '2020-01-09 02:01:11'),
(42, 'What makes your service different than other coordinators?', '<p>My experience and my friendly personality. I am able to take care of all the details in an organized &amp; business like manner, while maintaining my poise, style &amp; grace. With my past experience as a Corporate Catering Manager, I learned so many aspects on the venue side. Currently, I am the Ceremony Coordinator at another country club running rehearsals &amp; ceremonies almost every weekend that I don&rsquo;t have one of my own weddings. I gain more experience with every wedding that I do, coming across all kinds of different brides, styles &amp; trends. I truly love what I do and want every wedding to be perfect for my brides.</p>', NULL, NULL, 0, 'vendor', 1, '2020-01-09 02:01:26', '2020-01-09 02:01:26'),
(43, 'How early should couples start to plan their wedding? Hire a wedding coordinator?', '<p>Anywhere from 9-12 months prior to the wedding date is a good time to start planning. You don&rsquo;t want to wait until the last minute and feel overwhelmed, but you also don&rsquo;t want to be planning for too long. I do recommend hiring your wedding coordinator right away, even for the &lsquo;month of/day of&rsquo; package. You&rsquo;ll want to get a contract signed to ensure the coordinator is available for your wedding date. I already have weddings booked for 22 months from now!</p>', NULL, NULL, 0, 'vendor', 1, '2020-01-09 02:01:41', '2020-01-09 02:01:41'),
(44, 'Can we hire you as soon as we get engaged or should we wait?', '<p>&nbsp;As soon as you get engaged is recommended. Dates are booked well in advance and the sooner we begin planning, the better! If you are interested in the Signature Package, we recommend booking as soon as you have secured your date &amp; venue</p>', NULL, NULL, 0, 'vendor', 1, '2020-01-09 02:01:56', '2020-01-09 02:01:56'),
(45, 'What does an Orange County Wedding Coordinator cost?', '<p>Since each event is different, we encourage you to schedule a consultation with us to determine which services will best fit your needs.</p>', NULL, NULL, 0, 'vendor', 1, '2020-01-09 02:02:12', '2020-01-09 02:02:12'),
(46, 'What areas do you service?', '<p>We service all of Orange County, as well as Los Angeles, Riverside &amp; San Diego counties.</p>', NULL, NULL, 0, 'vendor', 1, '2020-01-09 02:02:30', '2020-01-09 02:02:30'),
(47, 'What payment types do you accept?', '<p>We accept cash or checks.</p>', NULL, NULL, 0, 'vendor', 1, '2020-01-09 02:02:47', '2020-01-09 02:02:47'),
(48, 'How do I book a date with you?', '<p>By emailing, calling or filling out the contact form on our website. We will schedule a free, no obligation consultation with you to make sure we are a good fit and that we can meet your needs. Most consultations take about 1 hour.</p>', NULL, NULL, 0, 'vendor', 1, '2020-01-09 02:03:13', '2020-01-09 02:03:13'),
(49, 'Why can\'t I log in to my Print Genie account even though I connected a store?', '<p>Why can&#39;t I log in to my Print Genie account even though I connected a store?</p>', 31, 12, 52, NULL, 1, '2020-01-09 07:30:38', '2020-01-09 07:30:38');

-- --------------------------------------------------------

--
-- Table structure for table `invite_vendors`
--

CREATE TABLE `invite_vendors` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `business_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0',
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'vendor',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invite_vendors`
--

INSERT INTO `invite_vendors` (`id`, `user_id`, `name`, `category_id`, `business_name`, `address`, `phone_number`, `email`, `detail`, `status`, `type`, `created_at`, `updated_at`) VALUES
(1, 32, 'Narinder Singh', 6, 'Prateek Dua Photography', '310 CRESCENT VILLAGE CIR 1489, sdsdsd', '4158464500', 'bajwa8360854880@gmail.com', 'test', 1, 'vendor', '2020-01-02 23:33:13', '2020-01-03 01:17:52'),
(2, 50, 'dsfsd', 8, 'dsfdsf', 'dsfsd', '46465+', 'user001@yopmail.com', 'fsdgsfgsf', 1, 'vendor', '2020-01-06 07:23:23', '2020-01-06 08:00:18'),
(3, 51, 'security vendor', 27, 'secure', 'mohali tower', '4454585452', 'vendor001@yopmail.com', 'vendor invitation', 0, 'vendor', '2020-01-06 07:25:43', '2020-01-06 07:25:43'),
(4, 60, 'Sammy', 6, 'Sammy Balloon Factory', 'Miami', '9465470549', 'sammy1@yopmail.com', 'As this is the interesting fact of the Dummy one', 1, 'vendor', '2020-01-06 12:52:20', '2020-01-06 13:00:21'),
(5, 60, 'Kanny Vendor', 14, 'Kanny Beauty Business', 'Newark International Airport Street', '9465470549', 'kannyBeauty@yopmail.com', 'Need be on this Platform!!', 0, 'vendor', '2020-01-09 05:01:09', '2020-01-09 05:01:09'),
(6, 32, 'Narinder Singh', NULL, NULL, NULL, '4158464500', 'bajwa9876470491@gmail.com', 'helloo', 1, 'user', '2020-02-13 01:39:34', '2020-02-13 02:34:31');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_11_09_040849_create_categories_table', 1),
(4, '2019_11_10_114533_create_vendor_categories_table', 2),
(5, '2019_11_12_172559_create_events_table', 3),
(6, '2019_11_12_172713_create_amenities_table', 3),
(8, '2019_11_13_111529_create_category_variations_table', 5),
(9, '2019_11_13_201236_create_seasons_table', 6),
(10, '2019_11_14_074420_create_f_a_qs_table', 7),
(11, '2019_11_14_075803_create_vendor_amenities_table', 8),
(12, '2019_11_14_075820_create_vendor_event_games_table', 8),
(14, '2019_11_15_065627_create_venues_table', 10),
(15, '2019_11_15_133350_create_styles_table', 11),
(16, '2019_11_14_124605_create_vendor_packages_table', 12),
(17, '2019_11_16_041359_create_package_meta_datas_table', 13),
(18, '2019_11_13_091032_create_vendor_category_meta_datas_table', 14),
(19, '2019_11_18_095419_create_discount_deals_table', 15),
(20, '2019_11_19_062234_create_page_meta_tags_table', 16),
(21, '2019_11_21_080208_create_cms_pages_table', 17),
(22, '2019_11_25_062651_create_service_aproval_processes_table', 18),
(23, '2019_12_02_062444_create_email_templates_table', 19),
(24, '2019_12_03_100520_create_chat_messages_table', 20),
(25, '2019_12_03_101839_create_chats_table', 20),
(26, '2019_12_06_104107_create_user_events_table', 21),
(27, '2019_12_10_140816_create_orders_table', 22),
(28, '2019_12_20_080115_create_models_event_orders_table', 23),
(29, '2019_12_20_123358_create_event_orders_table', 24),
(30, '2019_12_30_074638_create_commissions_table', 25),
(31, '2020_01_03_045038_create_invite_vendors_table', 26),
(32, '2020_01_10_142042_create_custom_packages_table', 27),
(33, '2020_01_15_125559_create_product_categories_table', 28),
(34, '2020_01_16_063636_create_product_category_variations_table', 29),
(35, '2020_01_16_064042_create_product_variations_table', 30),
(36, '2020_01_16_120453_create_product_category_variations_table', 31),
(37, '2020_01_16_150505_create_variations_table', 32),
(38, '2020_01_17_110447_create_variation_extras_table', 33),
(39, '2020_01_20_153848_create_eshops_table', 34),
(40, '2020_01_21_104430_create_shop_categories_table', 35),
(41, '2020_01_22_064333_create_products_table', 36),
(42, '2020_01_23_110932_create_product_attributes_table', 37),
(43, '2020_01_23_152809_create_product_inventories_table', 38),
(44, '2020_01_24_115005_create_product_assigned_variations_table', 39),
(45, '2020_01_25_134841_create_product_images_table', 40),
(46, '2020_01_29_065856_create_shop_cart_items_table', 41),
(47, '2020_01_30_071548_create_brands_table', 42),
(48, '2020_01_30_120113_create_shop_orders_table', 43),
(49, '2020_01_31_145700_create_product_category_brands_table', 44),
(50, '2020_02_10_111418_create_reviews_table', 45),
(51, '2020_02_11_131503_create_shop_pages_table', 46),
(52, '2020_02_12_095449_create_dispute_vendors_table', 47),
(53, '2020_02_13_094022_create_check_lists_table', 48),
(54, '2020_02_14_065932_create_default_tasks_table', 49),
(55, '2020_02_17_132307_create_rejection_reasons_table', 50),
(56, '2020_02_18_133837_create_my_check_list_tasks_table', 51),
(57, '2020_03_06_062116_create_roles_table', 52),
(58, '2020_03_11_081325_create_testimonials_table', 53),
(59, '2020_03_12_114623_create_courses_table', 54),
(60, '2020_03_13_014318_create_contact_details_table', 55),
(61, '2020_03_19_061134_create_course_dates_table', 56),
(62, '2020_03_19_112749_create_accordians_table', 57);

-- --------------------------------------------------------

--
-- Table structure for table `my_check_list_tasks`
--

CREATE TABLE `my_check_list_tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `task_id` int(11) NOT NULL DEFAULT '0',
  `task` longtext COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `task_date` date DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL DEFAULT '0',
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `my_check_list_tasks`
--

INSERT INTO `my_check_list_tasks` (`id`, `parent`, `task_id`, `task`, `description`, `task_date`, `category_id`, `event_id`, `vendor_id`, `note`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 3, 'Compile preliminary guest list.', NULL, '2020-02-19', 0, 57, 11, NULL, 0, '2020-02-19 06:24:47', '2020-02-20 10:53:22'),
(3, 4, 5, 'Finalize theme and location.', NULL, '2020-02-19', 0, 57, 11, NULL, 0, '2020-02-19 06:24:47', '2020-02-20 10:53:01'),
(4, 4, 6, 'Reserve any rentals you may need (extra chairs, tables, etc.).', NULL, '2020-02-29', 7, 57, 1, NULL, 1, '2020-02-19 06:24:48', '2020-02-22 07:49:42'),
(5, 4, 7, 'Lock in party date and finalize guest list.', NULL, '2020-02-19', 7, 57, 1, NULL, 1, '2020-02-19 06:24:48', '2020-02-22 02:28:42'),
(6, 4, 8, 'Send invitations.', NULL, '2020-02-29', 7, 57, 1, NULL, 1, '2020-02-19 06:24:48', '2020-02-22 07:48:03'),
(7, 4, 9, 'Begin gathering inspiration and researching food, activities, and décor.', NULL, '2020-02-19', 7, 57, 0, NULL, 0, '2020-02-19 06:24:48', '2020-02-22 01:28:18'),
(8, 4, 10, 'Book performers (if applicable).', NULL, '2020-02-19', 7, 57, 0, NULL, 0, '2020-02-19 06:24:48', '2020-02-21 01:08:23'),
(9, 11, 12, 'Begin compiling music playlist if applicable.', NULL, '2020-02-19', 8, 57, 0, NULL, 0, '2020-02-19 06:24:48', '2020-02-20 05:41:18'),
(10, 11, 13, 'Plan menu and shopping list.', NULL, '2020-02-19', 8, 57, 0, NULL, 0, '2020-02-19 06:24:48', '2020-02-20 01:29:34'),
(11, 11, 14, 'Order cake/cupcakes.', NULL, '2020-02-19', 8, 57, 0, NULL, 0, '2020-02-19 06:24:48', '2020-02-20 01:29:37'),
(12, 11, 15, 'Review tableware and assess needs.', NULL, '2020-02-19', 8, 57, 0, NULL, 0, '2020-02-19 06:24:48', '2020-02-19 06:24:48'),
(13, 16, 17, 'Purchase/order decorations, party supplies, favors, and gift bags.', NULL, '2020-02-19', 9, 57, 0, NULL, 0, '2020-02-19 06:24:48', '2020-02-20 01:29:41'),
(14, 16, 18, 'Buy non-perishable menu items.', NULL, '2020-02-19', 9, 57, 0, NULL, 0, '2020-02-19 06:24:48', '2020-02-22 07:48:01'),
(15, 16, 19, 'Select, borrow, or buy serveware (cake stands, baskets, etc.).', NULL, '2020-02-19', 9, 57, 0, NULL, 0, '2020-02-19 06:24:48', '2020-02-22 07:47:59'),
(16, 20, 21, 'Begin compiling food-shopping list.', NULL, '2020-02-19', 10, 57, 0, NULL, 0, '2020-02-19 06:24:48', '2020-02-21 01:08:26'),
(17, 20, 22, 'Choose party outfits.', NULL, '2020-02-19', 10, 57, 0, NULL, 0, '2020-02-19 06:24:48', '2020-02-19 06:24:48'),
(18, 20, 23, 'Create schedule for activities/entertainment.', NULL, '2020-02-19', 10, 57, 0, NULL, 0, '2020-02-19 06:24:48', '2020-02-19 06:24:48'),
(19, 20, 24, 'Create, buy, or borrow any additional risers and props for food table.', NULL, '2020-02-19', 10, 57, 0, NULL, 0, '2020-02-19 06:24:49', '2020-02-19 06:24:49'),
(20, 20, 25, 'Personalize and print out Printables for favors, food labels, signage.', NULL, '2020-02-19', 10, 57, 0, NULL, 0, '2020-02-19 06:24:49', '2020-02-19 06:24:49'),
(21, 26, 27, 'Clean party serveware.', NULL, '2020-02-19', 11, 57, 0, NULL, 1, '2020-02-19 06:24:49', '2020-02-22 01:50:09'),
(22, 26, 28, 'Create timeline for food assembly.', NULL, '2020-02-19', 11, 57, 0, NULL, 1, '2020-02-19 06:24:49', '2020-02-22 01:50:10'),
(23, 26, 29, 'Plan tablescapes for dining and food display.', NULL, '2020-02-19', 11, 57, 0, NULL, 1, '2020-02-19 06:24:49', '2020-02-22 01:50:11'),
(24, 26, 30, 'Finalize RSVPs.', NULL, '2020-02-19', 11, 57, 0, NULL, 1, '2020-02-19 06:24:49', '2020-02-22 01:50:12'),
(25, 31, 32, 'Purchase any last-minute party supplies and equipment.', NULL, '2020-02-19', 12, 57, 0, NULL, 0, '2020-02-19 06:24:49', '2020-02-19 06:24:49'),
(26, 31, 33, 'Organize and stage activity set-up(s).', NULL, '2020-02-19', 12, 57, 0, NULL, 0, '2020-02-19 06:24:49', '2020-02-19 06:24:49'),
(27, 31, 34, 'Confirm services with any entertainers.', NULL, '2020-02-19', 12, 57, 0, NULL, 0, '2020-02-19 06:24:49', '2020-02-19 06:24:49'),
(28, 31, 35, 'Charge camera.', NULL, '2020-02-19', 12, 57, 0, NULL, 0, '2020-02-19 06:24:49', '2020-02-19 06:24:49'),
(29, 36, 37, 'Buy last-minute perishable items, including ice.', NULL, '2020-02-19', 13, 57, 0, NULL, 0, '2020-02-19 06:24:49', '2020-02-19 06:24:49'),
(30, 36, 38, 'Set tables and arrange displays.', NULL, '2020-02-19', 13, 57, 0, NULL, 0, '2020-02-19 06:24:49', '2020-02-19 06:24:49'),
(31, 36, 39, 'Set up any large supplies and non-perishable decorations.', NULL, '2020-02-19', 13, 57, 0, NULL, 0, '2020-02-19 06:24:49', '2020-02-19 06:24:49'),
(32, 36, 40, 'Chill drinks.', NULL, '2020-02-19', 13, 57, 0, NULL, 0, '2020-02-19 06:24:49', '2020-02-19 06:24:49'),
(33, 36, 41, 'Pick up flowers and arrange if applicable.', NULL, '2020-02-19', 13, 57, 0, NULL, 0, '2020-02-19 06:24:49', '2020-02-19 06:24:49'),
(34, 36, 42, 'Print out gift tracker.', NULL, '2020-02-19', 13, 57, 0, NULL, 0, '2020-02-19 06:24:49', '2020-02-19 06:24:49'),
(35, 36, 43, '1 week before', NULL, '2020-02-19', 13, 57, 0, NULL, 0, '2020-02-19 06:24:49', '2020-02-19 06:24:49'),
(36, 44, 45, 'Inflate and arrange balloons early in the morning.', NULL, '2020-02-19', 14, 57, 0, NULL, 0, '2020-02-19 06:24:50', '2020-02-19 06:24:50'),
(37, 44, 46, 'Set up flower arrangements and other last-minute decorations.', NULL, '2020-02-19', 14, 57, 0, NULL, 0, '2020-02-19 06:24:50', '2020-02-19 06:24:50'),
(38, 44, 47, 'Finesse final set-up.', NULL, '2020-02-19', 14, 57, 0, NULL, 0, '2020-02-19 06:24:50', '2020-02-19 06:24:50'),
(39, 44, 48, 'Turn on the music and party lights.', NULL, '2020-02-19', 14, 57, 0, NULL, 0, '2020-02-19 06:24:50', '2020-02-19 06:24:50'),
(44, 1, 0, 'Invitations', 'saeeeeeeeeeeeeeeeeeee', '2020-02-29', 0, 57, 1, 'erwwwwwwwwwwwwwwwwwwwwwwwwwww', 1, '2020-02-19 09:53:06', '2020-02-20 10:52:19'),
(45, 1, 0, 'My Custom Task', 'Love planning with WeddingWire? Share about your experience with family and friends (you might just help others who are also planning)!', '2020-02-29', 0, 57, 11, NULL, 0, '2020-02-20 02:52:02', '2020-02-20 10:52:39'),
(46, 1, 0, 'Confirm services with any entertainers.', 'sweeeeeeeeeee', '2020-02-06', 0, 57, 11, 'seddddddddddddd', 0, '2020-02-21 01:17:46', '2020-02-21 01:17:59'),
(47, 1, 0, 'Confirm services with any entertainers.', 'asssssssss', '2020-02-13', 0, 57, 1, NULL, 0, '2020-02-21 01:18:50', '2020-02-21 01:19:21'),
(48, 1, 0, 'Confirm services with any entertainers.', 'ssssssssssssss', '2020-02-28', 0, 57, 1, NULL, 0, '2020-02-21 01:20:21', '2020-02-21 01:23:07'),
(49, 1, 0, 'Confirm services with any entertainers.', 'assssssssssss', '2020-02-06', 0, 57, 1, NULL, 0, '2020-02-21 01:24:01', '2020-02-21 01:24:55'),
(50, 1, 0, 'Confirm services with any entertainers.', 'ssssssssssssssssssss', '2020-02-06', 0, 57, 1, NULL, 0, '2020-02-21 01:26:06', '2020-02-21 01:26:35'),
(52, 49, 50, 'Objectives', 'test', '2020-02-21', 15, 58, 0, NULL, 0, '2020-02-21 10:15:47', '2020-02-21 10:15:47'),
(53, 49, 51, 'Audience', 'ssssssssssssss', '2020-02-21', 15, 58, 0, NULL, 0, '2020-02-21 10:15:47', '2020-02-21 10:15:47'),
(54, 49, 52, 'Message of the Event', 'test', '2020-02-21', 15, 58, 0, NULL, 0, '2020-02-21 10:15:48', '2020-02-21 10:15:48'),
(55, 49, 53, 'Costs', 'Costs', '2020-02-21', 15, 58, 0, NULL, 0, '2020-02-21 10:15:48', '2020-02-21 10:15:48'),
(56, 49, 54, 'Dates', 'Dates', '2020-02-21', 15, 58, 0, NULL, 0, '2020-02-21 10:15:48', '2020-02-21 10:15:48'),
(57, 49, 55, 'Location', 'Location', '2020-02-21', 15, 58, 0, NULL, 0, '2020-02-21 10:15:48', '2020-02-21 10:15:48'),
(58, 56, 57, 'Phoned', 'Phoned', '2020-02-21', 22, 58, 0, NULL, 0, '2020-02-21 10:15:48', '2020-02-21 10:15:48'),
(59, 56, 58, 'E-mailed', 'E-mailed', '2020-02-21', 22, 58, 0, NULL, 0, '2020-02-21 10:15:48', '2020-02-21 10:15:48'),
(60, 56, 59, 'Printed, informal', 'Printed, informal description', '2020-02-21', 22, 58, 0, NULL, 0, '2020-02-21 10:15:48', '2020-02-21 10:15:48'),
(61, 56, 60, 'Printed, formal', 'Printed, formal descr', '2020-02-21', 22, 58, 0, NULL, 0, '2020-02-21 10:15:48', '2020-02-21 10:15:48'),
(62, 56, 61, 'RSVP return card', 'RSVP return card description', '2020-02-21', 22, 58, 0, NULL, 0, '2020-02-21 10:15:49', '2020-02-21 10:15:49'),
(63, 56, 62, 'RSVP by telephone', 'RSVP by telephone', '2020-02-21', 22, 58, 0, NULL, 0, '2020-02-21 10:15:49', '2020-02-21 10:15:49'),
(64, 56, 63, 'Reminder mailing', 'Reminder mailing', '2020-02-21', 22, 58, 0, NULL, 0, '2020-02-21 10:15:49', '2020-02-21 10:15:49'),
(65, 64, 65, 'Topics', 'Topics Desc', '2020-02-21', 30, 58, 0, NULL, 0, '2020-02-21 10:15:49', '2020-02-21 10:15:49'),
(66, 64, 66, 'Speakers', 'Speakers DESC', '2020-02-21', 30, 58, 0, NULL, 0, '2020-02-21 10:15:49', '2020-02-21 10:15:49'),
(67, 64, 67, 'Speaker contact', 'test', '2020-02-21', 30, 58, 0, NULL, 0, '2020-02-21 10:15:49', '2020-02-21 10:15:49'),
(68, 64, 68, 'Speaker agreements, honoraria', 'Speaker agreements, honoraria desc', '2020-02-21', 30, 58, 0, NULL, 0, '2020-02-21 10:15:49', '2020-02-21 10:15:49'),
(69, 64, 69, 'Equipment needed', 'Equipment needed DESC', '2020-02-21', 30, 58, 0, NULL, 0, '2020-02-21 10:15:49', '2020-02-21 10:15:49'),
(70, 64, 70, 'Biographies', 'Biographies DESC', '2020-02-21', 30, 58, 0, NULL, 0, '2020-02-21 10:15:49', '2020-02-21 10:15:49'),
(71, 64, 71, 'Introductions', 'Introductions DESC', '2020-02-21', 30, 58, 0, NULL, 0, '2020-02-21 10:15:49', '2020-02-21 10:15:49'),
(72, 72, 73, 'Hospitality', 'Hospitality DESC', '2020-02-21', 38, 58, 0, NULL, 0, '2020-02-21 10:15:50', '2020-02-21 10:15:50'),
(73, 72, 74, 'Transportation', 'Transportation DESC', '2020-02-21', 38, 58, 0, NULL, 0, '2020-02-21 10:15:50', '2020-02-21 10:15:50'),
(74, 72, 75, 'Accommodation', 'Accommodation DESC', '2020-02-21', 38, 58, 0, NULL, 0, '2020-02-21 10:15:50', '2020-02-21 10:15:50'),
(75, 72, 76, 'Mementos', 'Mementos DESC', '2020-02-21', 38, 58, 0, NULL, 0, '2020-02-21 10:15:50', '2020-02-21 10:15:50'),
(76, 77, 78, 'Number of people', 'Number of people DESC', '2020-02-21', 43, 58, 0, NULL, 0, '2020-02-21 10:15:50', '2020-02-21 10:15:50'),
(77, 77, 79, 'Auditorium-type seating', 'Auditorium-type seating desc', '2020-02-21', 43, 58, 0, NULL, 0, '2020-02-21 10:15:51', '2020-02-21 10:15:51'),
(78, 77, 80, 'Conference room seating', 'Conference room seating desc', '2020-02-21', 43, 58, 0, NULL, 0, '2020-02-21 10:15:51', '2020-02-21 10:15:51'),
(79, 77, 81, 'Table shapes: O, U, V', 'Table shapes: O, U, V desc', '2020-02-21', 43, 58, 0, NULL, 0, '2020-02-21 10:15:51', '2020-02-21 10:15:51'),
(80, 77, 82, 'Menu service needed', 'Menu service needed desc', '2020-02-21', 43, 58, 0, NULL, 0, '2020-02-21 10:15:51', '2020-02-21 10:15:51'),
(81, 77, 83, 'Parking', 'Parking descr', '2020-02-21', 43, 58, 0, NULL, 0, '2020-02-21 10:15:51', '2020-02-21 10:15:51'),
(82, 77, 84, 'Directional signs', 'Directional signs Desc', '2020-02-21', 43, 58, 0, NULL, 0, '2020-02-21 10:15:51', '2020-02-21 10:15:51'),
(83, 77, 85, 'Marquee sign(s)', 'Marquee sign(s) Descc', '2020-02-21', 43, 58, 0, NULL, 0, '2020-02-21 10:15:51', '2020-02-21 10:15:51'),
(84, 86, 87, 'Lectern', 'Lectern', '2020-02-21', 52, 58, 0, NULL, 0, '2020-02-21 10:15:51', '2020-02-21 10:15:51'),
(85, 86, 88, 'Podium', 'Podium', '2020-02-21', 52, 58, 0, NULL, 0, '2020-02-21 10:15:51', '2020-02-21 10:15:51'),
(86, 86, 89, 'Public address system', 'Public address system', '2020-02-21', 52, 58, 0, NULL, 0, '2020-02-21 10:15:51', '2020-02-21 10:15:51'),
(87, 86, 90, 'Microphone(s): Neck, podium, table, floor', 'Microphone(s): Neck, podium, table, floor', '2020-02-21', 52, 58, 0, NULL, 0, '2020-02-21 10:15:52', '2020-02-21 10:15:52'),
(88, 86, 91, 'Raised platform', 'Raised platform', '2020-02-21', 52, 58, 0, NULL, 0, '2020-02-21 10:15:52', '2020-02-21 10:15:52'),
(89, 86, 92, 'Projection screen', 'Projection screen', '2020-02-21', 52, 58, 0, NULL, 0, '2020-02-21 10:15:52', '2020-02-21 10:15:52'),
(90, 86, 93, 'Video projector', 'Video projector', '2020-02-21', 52, 58, 0, NULL, 0, '2020-02-21 10:15:52', '2020-02-21 10:15:52'),
(91, 86, 94, 'Remote control cord', 'Remote control cord', '2020-02-21', 52, 58, 0, NULL, 0, '2020-02-21 10:15:52', '2020-02-21 10:15:52'),
(92, 86, 95, 'Overhead projector', 'Overhead projector', '2020-02-21', 52, 58, 0, NULL, 0, '2020-02-21 10:15:52', '2020-02-21 10:15:52'),
(93, 86, 96, 'Flip charts, markers', 'Flip charts, markers', '2020-02-21', 52, 58, 0, NULL, 0, '2020-02-21 10:15:52', '2020-02-21 10:15:52'),
(94, 86, 97, 'Extension cords', 'Extension cords', '2020-02-21', 52, 58, 0, NULL, 0, '2020-02-21 10:15:52', '2020-02-21 10:15:52'),
(95, 86, 98, 'DVD player and monitor:', 'DVD player and monitor:', '2020-02-21', 52, 58, 0, NULL, 0, '2020-02-21 10:15:52', '2020-02-21 10:15:52'),
(96, 86, 99, 'Lap top to Screen', 'Lap top to Screen', '2020-02-21', 52, 58, 0, NULL, 0, '2020-02-21 10:15:52', '2020-02-21 10:15:52'),
(97, 100, 101, 'Menu selection', 'Menu selection', '2020-02-21', 66, 58, 0, NULL, 0, '2020-02-21 10:15:53', '2020-02-21 10:15:53'),
(98, 100, 102, 'Caterers', 'Caterers', '2020-02-21', 66, 58, 0, NULL, 0, '2020-02-21 10:15:53', '2020-02-21 10:15:53'),
(99, 100, 103, 'Schedule', 'Schedule', '2020-02-21', 66, 58, 0, NULL, 0, '2020-02-21 10:15:53', '2020-02-21 10:15:53'),
(100, 100, 104, 'Type service (buffet, seated)', 'Type service (buffet, seated)', '2020-02-21', 66, 58, 0, NULL, 0, '2020-02-21 10:15:53', '2020-02-21 10:15:53'),
(101, 100, 105, 'Tables for 6, 8, 10', 'Tables for 6, 8, 10', '2020-02-21', 66, 58, 0, NULL, 0, '2020-02-21 10:15:53', '2020-02-21 10:15:53'),
(102, 100, 106, 'Head table', 'Head table', '2020-02-21', 66, 58, 0, NULL, 0, '2020-02-21 10:15:53', '2020-02-21 10:15:53'),
(103, 100, 107, 'Place cards', 'Place cards', '2020-02-21', 66, 58, 0, NULL, 0, '2020-02-21 10:15:53', '2020-02-21 10:15:53'),
(104, 100, 108, 'Seating diagrams', 'Seating diagrams', '2020-02-21', 66, 58, 0, NULL, 0, '2020-02-21 10:15:53', '2020-02-21 10:15:53'),
(105, 100, 109, 'Beverages', 'Beverages', '2020-02-21', 66, 58, 0, NULL, 0, '2020-02-21 10:15:53', '2020-02-21 10:15:53'),
(106, 100, 110, 'Hospitality room service', 'Hospitality room service', '2020-02-21', 66, 58, 0, NULL, 0, '2020-02-21 10:15:53', '2020-02-21 10:15:53'),
(107, 111, 112, 'Mailing lists', 'Mailing lists', '2020-02-21', 77, 58, 0, NULL, 0, '2020-02-21 10:15:54', '2020-02-21 10:15:54'),
(108, 111, 113, 'Promotional mailings', 'Promotional mailings', '2020-02-21', 77, 58, 0, NULL, 0, '2020-02-21 10:15:54', '2020-02-21 10:15:54'),
(109, 111, 114, 'Posters, flyers', 'Posters, flyers', '2020-02-21', 77, 58, 0, NULL, 0, '2020-02-21 10:15:54', '2020-02-21 10:15:54'),
(110, 111, 115, 'Advertising', 'Advertising', '2020-02-21', 77, 58, 0, NULL, 0, '2020-02-21 10:15:54', '2020-02-21 10:15:54'),
(111, 111, 116, 'Media contact', 'Media contact', '2020-02-21', 77, 58, 0, NULL, 0, '2020-02-21 10:15:54', '2020-02-21 10:15:54'),
(112, 111, 117, 'Media fact sheets', 'Media fact sheets', '2020-02-21', 77, 58, 0, NULL, 0, '2020-02-21 10:15:54', '2020-02-21 10:15:54'),
(113, 111, 118, 'News releases', 'News releases', '2020-02-21', 77, 58, 0, NULL, 0, '2020-02-21 10:15:54', '2020-02-21 10:15:54'),
(114, 111, 119, 'Talk show appearances', 'Talk show appearances', '2020-02-21', 77, 58, 0, NULL, 0, '2020-02-21 10:15:54', '2020-02-21 10:15:54'),
(115, 111, 120, 'Press packets', 'Press packets', '2020-02-21', 77, 58, 0, NULL, 0, '2020-02-21 10:15:54', '2020-02-21 10:15:54'),
(116, 111, 121, 'Press room', 'Press room', '2020-02-21', 77, 58, 0, NULL, 0, '2020-02-21 10:15:54', '2020-02-21 10:15:54'),
(117, 111, 122, 'Special phone lines and internet connectivity for media', 'Special phone lines and internet connectivity for media', '2020-02-21', 77, 58, 0, NULL, 0, '2020-02-21 10:15:54', '2020-02-21 10:15:54'),
(118, 123, 124, 'Stills', 'Stills', '2020-02-21', 89, 58, 0, NULL, 0, '2020-02-21 10:15:55', '2020-02-21 10:15:55'),
(119, 123, 125, 'Video', 'Video', '2020-02-21', 89, 58, 0, NULL, 0, '2020-02-21 10:15:55', '2020-02-21 10:15:55'),
(120, 123, 126, 'Hire photographer', 'Hire photographer', '2020-02-21', 89, 58, 0, NULL, 0, '2020-02-21 10:15:55', '2020-02-21 10:15:55'),
(121, 123, 127, 'Shot list for photographer', 'Shot list for photographer', '2020-02-21', 89, 58, 0, NULL, 0, '2020-02-21 10:15:55', '2020-02-21 10:15:55'),
(122, 128, 129, 'Agenda', 'Agenda', '2020-02-21', 94, 58, 0, NULL, 0, '2020-02-21 10:15:55', '2020-02-21 10:15:55'),
(123, 128, 130, 'Speakers\' biographies & photos', 'Speakers\' biographies & photos', '2020-02-21', 94, 58, 0, NULL, 0, '2020-02-21 10:15:56', '2020-02-21 10:15:56'),
(124, 128, 131, 'Organization information', 'Organization information', '2020-02-21', 94, 58, 0, NULL, 0, '2020-02-21 10:15:56', '2020-02-21 10:15:56'),
(125, 128, 132, 'Lists of officers, committees', 'Lists of officers, committees', '2020-02-21', 94, 58, 0, NULL, 0, '2020-02-21 10:15:56', '2020-02-21 10:15:56'),
(126, 128, 133, 'Lists of sponsors, contributors', 'Lists of sponsors, contributors', '2020-02-21', 94, 58, 0, NULL, 0, '2020-02-21 10:15:56', '2020-02-21 10:15:56'),
(127, 128, 134, 'Design and printing', 'Design and printing', '2020-02-21', 94, 58, 0, NULL, 0, '2020-02-21 10:15:56', '2020-02-21 10:15:56'),
(128, 128, 135, 'Quantity', 'Quantity', '2020-02-21', 94, 58, 0, NULL, 0, '2020-02-21 10:15:56', '2020-02-21 10:15:56'),
(129, 128, 136, 'Distribution', 'Distribution', '2020-02-21', 94, 58, 0, NULL, 0, '2020-02-21 10:15:56', '2020-02-21 10:15:56'),
(130, 137, 138, 'Registration form', 'Registration form', '2020-02-21', 103, 58, 0, NULL, 0, '2020-02-21 10:15:56', '2020-02-21 10:15:56'),
(131, 137, 139, 'Bank account', 'Bank account', '2020-02-21', 103, 58, 0, NULL, 0, '2020-02-21 10:15:57', '2020-02-21 10:15:57'),
(132, 137, 140, 'Reporting system', 'Reporting system', '2020-02-21', 103, 58, 0, NULL, 0, '2020-02-21 10:15:57', '2020-02-21 10:15:57'),
(133, 137, 141, 'Registration confirmation', 'Registration confirmation', '2020-02-21', 103, 58, 0, NULL, 0, '2020-02-21 10:15:57', '2020-02-21 10:15:57'),
(134, 142, 143, 'Pre-registration list', 'Pre-registration list', '2020-02-21', 108, 58, 0, NULL, 0, '2020-02-21 10:15:57', '2020-02-21 10:15:57'),
(135, 142, 144, 'Tables', 'Tables', '2020-02-21', 108, 58, 0, NULL, 0, '2020-02-21 10:15:57', '2020-02-21 10:15:57'),
(136, 142, 145, 'Computers, collateral equipment', 'Computers, collateral equipment', '2020-02-21', 108, 58, 0, NULL, 0, '2020-02-21 10:15:57', '2020-02-21 10:15:57'),
(137, 142, 146, 'Personnel', 'Personnel', '2020-02-21', 108, 58, 0, NULL, 0, '2020-02-21 10:15:57', '2020-02-21 10:15:57'),
(138, 142, 147, 'Cash receipts', 'Cash receipts', '2020-02-21', 108, 58, 0, NULL, 0, '2020-02-21 10:15:57', '2020-02-21 10:15:57'),
(139, 142, 148, 'Programs', 'Programs', '2020-02-21', 108, 58, 0, NULL, 0, '2020-02-21 10:15:57', '2020-02-21 10:15:57'),
(140, 142, 149, 'Name badges', 'Name badges', '2020-02-21', 108, 58, 0, NULL, 0, '2020-02-21 10:15:57', '2020-02-21 10:15:57'),
(141, 142, 150, 'Goodie Bags', 'Goodie Bags', '2020-02-21', 108, 58, 0, NULL, 0, '2020-02-21 10:15:57', '2020-02-21 10:15:57'),
(142, 142, 151, 'Ticket sales', 'Ticket sales', '2020-02-21', 108, 58, 0, NULL, 0, '2020-02-21 10:15:57', '2020-02-21 10:15:57'),
(143, 142, 152, 'Host identification', 'Host identification', '2020-02-21', 108, 58, 0, NULL, 0, '2020-02-21 10:15:57', '2020-02-21 10:15:57'),
(144, 142, 153, 'Venue signage', 'Venue signage', '2020-02-21', 108, 58, 0, NULL, 0, '2020-02-21 10:15:57', '2020-02-21 10:15:57'),
(145, 154, 155, 'For equipment', 'For equipment', '2020-02-21', 120, 58, 0, NULL, 0, '2020-02-21 10:15:58', '2020-02-21 10:15:58'),
(146, 154, 156, 'Lease or charter vehicles', 'Lease or charter vehicles', '2020-02-21', 120, 58, 0, NULL, 0, '2020-02-21 10:15:58', '2020-02-21 10:15:58'),
(147, 154, 157, 'To and from parking areas', 'To and from parking areas', '2020-02-21', 120, 58, 0, NULL, 0, '2020-02-21 10:15:58', '2020-02-21 10:15:58'),
(148, 154, 158, 'For speakers & special guests', 'For speakers & special guests', '2020-02-21', 120, 58, 0, NULL, 0, '2020-02-21 10:15:59', '2020-02-21 10:15:59'),
(149, 154, 159, 'Between locations', 'Between locations', '2020-02-21', 120, 58, 0, NULL, 0, '2020-02-21 10:15:59', '2020-02-21 10:15:59'),
(150, 154, 160, 'Signs on vehicles', 'Signs on vehicles', '2020-02-21', 120, 58, 0, NULL, 0, '2020-02-21 10:15:59', '2020-02-21 10:15:59'),
(151, 154, 161, 'Publish or post schedules', 'Publish or post schedules', '2020-02-21', 120, 58, 0, NULL, 0, '2020-02-21 10:15:59', '2020-02-21 10:15:59'),
(152, 162, 163, 'For speakers', 'For speakers', '2020-02-21', 128, 58, 0, NULL, 0, '2020-02-21 10:15:59', '2020-02-21 10:15:59'),
(153, 162, 164, 'For special guests', 'For special guests', '2020-02-21', 128, 58, 0, NULL, 0, '2020-02-21 10:15:59', '2020-02-21 10:15:59'),
(154, 162, 165, 'For tours, exhibits, etc.', 'For tours, exhibits, etc.', '2020-02-21', 128, 58, 0, NULL, 0, '2020-02-21 10:15:59', '2020-02-21 10:15:59'),
(155, 162, 166, 'Aboard shuttles / buses when needed', 'Aboard shuttles / buses when needed', '2020-02-21', 128, 58, 0, NULL, 0, '2020-02-21 10:15:59', '2020-02-21 10:15:59'),
(156, 167, 168, 'Set the theme', 'Set the theme', '2020-02-21', 133, 58, 0, NULL, 0, '2020-02-21 10:16:00', '2020-02-21 10:16:00'),
(157, 167, 169, 'Entrances and exits', 'Entrances and exits', '2020-02-21', 133, 58, 0, NULL, 0, '2020-02-21 10:16:00', '2020-02-21 10:16:00'),
(158, 167, 170, 'Speaker platform', 'Speaker platform', '2020-02-21', 133, 58, 0, NULL, 0, '2020-02-21 10:16:00', '2020-02-21 10:16:00'),
(159, 167, 171, 'Head tables', 'Head tables', '2020-02-21', 133, 58, 0, NULL, 0, '2020-02-21 10:16:00', '2020-02-21 10:16:00'),
(160, 167, 172, 'Dining tables', 'Dining tables', '2020-02-21', 133, 58, 0, NULL, 0, '2020-02-21 10:16:00', '2020-02-21 10:16:00'),
(161, 167, 173, 'Hospitality suite', 'Hospitality suite', '2020-02-21', 133, 58, 0, NULL, 0, '2020-02-21 10:16:00', '2020-02-21 10:16:00'),
(162, 174, 175, 'Prices', 'Prices', '2020-02-21', 140, 58, 0, NULL, 0, '2020-02-21 10:16:00', '2020-02-21 10:16:00'),
(163, 174, 176, 'Advance sales', 'Advance sales', '2020-02-21', 140, 58, 0, NULL, 0, '2020-02-21 10:16:01', '2020-02-21 10:16:01'),
(164, 174, 177, 'Printing', 'Printing', '2020-02-21', 140, 58, 0, NULL, 0, '2020-02-21 10:16:01', '2020-02-21 10:16:01'),
(165, 174, 178, 'Distribution', 'Distribution', '2020-02-21', 140, 58, 0, NULL, 0, '2020-02-21 10:16:01', '2020-02-21 10:16:01'),
(166, 174, 179, 'Sales reports', 'Sales reports', '2020-02-21', 140, 58, 0, NULL, 0, '2020-02-21 10:16:01', '2020-02-21 10:16:01'),
(167, 174, 180, 'Ticket and money control', 'Ticket and money control', '2020-02-21', 140, 58, 0, NULL, 0, '2020-02-21 10:16:01', '2020-02-21 10:16:01'),
(168, 174, 181, 'Complimentary tickets', 'Complimentary tickets', '2020-02-21', 140, 58, 0, NULL, 0, '2020-02-21 10:16:01', '2020-02-21 10:16:01'),
(169, 174, 182, 'Press tickets', 'Press tickets', '2020-02-21', 140, 58, 0, NULL, 0, '2020-02-21 10:16:01', '2020-02-21 10:16:01'),
(170, 174, 183, 'Sales at doors', 'Sales at doors', '2020-02-21', 140, 58, 0, NULL, 0, '2020-02-21 10:16:01', '2020-02-21 10:16:01'),
(171, 174, 184, 'Collection at events', 'Collection at events', '2020-02-21', 140, 58, 0, NULL, 0, '2020-02-21 10:16:01', '2020-02-21 10:16:01'),
(172, 185, 186, 'Valet parking', 'Valet parking', '2020-02-21', 151, 58, 0, NULL, 0, '2020-02-21 10:16:02', '2020-02-21 10:16:02'),
(173, 185, 187, 'Bad weather planning', 'Bad weather planning', '2020-02-21', 151, 58, 0, NULL, 0, '2020-02-21 10:16:02', '2020-02-21 10:16:02'),
(174, 185, 188, 'Exhibits, displays', 'Exhibits, displays', '2020-02-21', 151, 58, 0, NULL, 0, '2020-02-21 10:16:02', '2020-02-21 10:16:02'),
(175, 185, 189, 'Security', 'Security', '2020-02-21', 151, 58, 0, NULL, 0, '2020-02-21 10:16:02', '2020-02-21 10:16:02'),
(176, 185, 190, 'Technicians for equipment', 'Technicians for equipment', '2020-02-21', 151, 58, 0, NULL, 0, '2020-02-21 10:16:02', '2020-02-21 10:16:02'),
(177, 185, 191, 'Disaster management', 'Disaster management', '2020-02-21', 151, 58, 0, NULL, 0, '2020-02-21 10:16:02', '2020-02-21 10:16:02'),
(178, 185, 192, 'Ambulance on stand-by', 'Ambulance on stand-by', '2020-02-21', 151, 58, 0, NULL, 0, '2020-02-21 10:16:02', '2020-02-21 10:16:02'),
(179, 185, 193, 'Police, traffic control, security', 'Police, traffic control, security', '2020-02-21', 151, 58, 0, NULL, 0, '2020-02-21 10:16:02', '2020-02-21 10:16:02'),
(180, 49, 50, 'Objectives', 'test', '2020-02-21', 160, 58, 6, NULL, 1, '2020-02-21 10:21:04', '2020-02-25 07:59:33'),
(181, 49, 51, 'Audience', 'ssssssssssssss', '2020-02-21', 160, 58, 0, NULL, 1, '2020-02-21 10:21:04', '2020-02-24 07:59:40'),
(182, 49, 52, 'Message of the Event', 'test', '2020-02-21', 160, 58, 6, NULL, 1, '2020-02-21 10:21:04', '2020-02-24 07:59:42'),
(183, 49, 53, 'Costs', 'Costs', '2020-02-21', 160, 58, 0, NULL, 1, '2020-02-21 10:21:04', '2020-02-24 09:13:00'),
(184, 49, 54, 'Dates', 'Dates', '2020-02-21', 160, 58, 0, NULL, 1, '2020-02-21 10:21:04', '2020-02-24 09:13:04'),
(185, 49, 55, 'Location', 'Location', '2020-02-21', 160, 58, 0, NULL, 1, '2020-02-21 10:21:04', '2020-02-24 09:13:05'),
(186, 56, 57, 'Phoned', 'Phoned', '2020-02-29', 161, 58, 1, NULL, 1, '2020-02-21 10:21:04', '2020-02-25 07:59:06'),
(187, 56, 58, 'E-mailed', 'E-mailed', '2020-02-21', 161, 58, 0, NULL, 1, '2020-02-21 10:21:05', '2020-02-25 07:59:08'),
(188, 56, 59, 'Printed, informal', 'Printed, informal description', '2020-02-21', 161, 58, 1, NULL, 0, '2020-02-21 10:21:05', '2020-02-24 10:20:30'),
(189, 56, 60, 'Printed, formal', 'Printed, formal descr', '2020-02-21', 161, 58, 6, NULL, 0, '2020-02-21 10:21:05', '2020-02-24 10:20:00'),
(190, 56, 61, 'RSVP return card', 'RSVP return card description', '2020-02-21', 161, 58, 0, NULL, 0, '2020-02-21 10:21:05', '2020-02-21 10:21:05'),
(191, 56, 62, 'RSVP by telephone', 'RSVP by telephone', '2020-02-21', 161, 58, 0, NULL, 0, '2020-02-21 10:21:05', '2020-02-21 10:21:05'),
(192, 56, 63, 'Reminder mailing', 'Reminder mailing', '2020-02-21', 161, 58, 0, NULL, 0, '2020-02-21 10:21:05', '2020-02-21 10:21:05'),
(193, 64, 65, 'Topics', 'Topics Desc', '2020-02-21', 162, 58, 0, NULL, 0, '2020-02-21 10:21:05', '2020-02-21 10:21:05'),
(194, 64, 66, 'Speakers', 'Speakers DESC', '2020-02-21', 162, 58, 0, NULL, 0, '2020-02-21 10:21:05', '2020-02-21 10:21:05'),
(195, 64, 67, 'Speaker contact', 'test', '2020-02-21', 162, 58, 0, NULL, 0, '2020-02-21 10:21:05', '2020-02-21 10:21:05'),
(196, 64, 68, 'Speaker agreements, honoraria', 'Speaker agreements, honoraria desc', '2020-02-21', 162, 58, 0, NULL, 0, '2020-02-21 10:21:05', '2020-02-21 10:21:05'),
(197, 64, 69, 'Equipment needed', 'Equipment needed DESC', '2020-02-21', 162, 58, 0, NULL, 0, '2020-02-21 10:21:05', '2020-02-21 10:21:05'),
(198, 64, 70, 'Biographies', 'Biographies DESC', '2020-02-21', 162, 58, 0, NULL, 0, '2020-02-21 10:21:05', '2020-02-21 10:21:05'),
(199, 64, 71, 'Introductions', 'Introductions DESC', '2020-02-21', 162, 58, 0, NULL, 0, '2020-02-21 10:21:05', '2020-02-21 10:21:05'),
(200, 72, 73, 'Hospitality', 'Hospitality DESC', '2020-02-21', 163, 58, 6, NULL, 1, '2020-02-21 10:21:05', '2020-02-24 07:59:10'),
(201, 72, 74, 'Transportation', 'Transportation DESC', '2020-02-21', 163, 58, 0, NULL, 0, '2020-02-21 10:21:06', '2020-02-21 10:21:06'),
(202, 72, 75, 'Accommodation', 'Accommodation DESC', '2020-02-21', 163, 58, 0, NULL, 0, '2020-02-21 10:21:06', '2020-02-21 10:21:06'),
(203, 72, 76, 'Mementos', 'Mementos DESC', '2020-02-21', 163, 58, 0, NULL, 0, '2020-02-21 10:21:06', '2020-02-21 10:21:06'),
(204, 77, 78, 'Number of people', 'Number of people DESC', '2020-02-21', 164, 58, 0, NULL, 0, '2020-02-21 10:21:06', '2020-02-21 10:21:06'),
(205, 77, 79, 'Auditorium-type seating', 'Auditorium-type seating desc', '2020-02-21', 164, 58, 0, NULL, 0, '2020-02-21 10:21:06', '2020-02-21 10:21:06'),
(206, 77, 80, 'Conference room seating', 'Conference room seating desc', '2020-02-21', 164, 58, 0, NULL, 0, '2020-02-21 10:21:06', '2020-02-21 10:21:06'),
(207, 77, 81, 'Table shapes: O, U, V', 'Table shapes: O, U, V desc', '2020-02-21', 164, 58, 0, NULL, 0, '2020-02-21 10:21:06', '2020-02-21 10:21:06'),
(208, 77, 82, 'Menu service needed', 'Menu service needed desc', '2020-02-21', 164, 58, 0, NULL, 0, '2020-02-21 10:21:06', '2020-02-21 10:21:06'),
(209, 77, 83, 'Parking', 'Parking descr', '2020-02-21', 164, 58, 0, NULL, 0, '2020-02-21 10:21:06', '2020-02-21 10:21:06'),
(210, 77, 84, 'Directional signs', 'Directional signs Desc', '2020-02-21', 164, 58, 0, NULL, 0, '2020-02-21 10:21:06', '2020-02-21 10:21:06'),
(211, 77, 85, 'Marquee sign(s)', 'Marquee sign(s) Descc', '2020-02-21', 164, 58, 0, NULL, 0, '2020-02-21 10:21:06', '2020-02-21 10:21:06'),
(212, 86, 87, 'Lectern', 'Lectern', '2020-02-21', 165, 58, 0, NULL, 0, '2020-02-21 10:21:06', '2020-02-21 10:21:06'),
(213, 86, 88, 'Podium', 'Podium', '2020-02-21', 165, 58, 0, NULL, 0, '2020-02-21 10:21:06', '2020-02-21 10:21:06'),
(214, 86, 89, 'Public address system', 'Public address system', '2020-02-21', 165, 58, 0, NULL, 0, '2020-02-21 10:21:06', '2020-02-21 10:21:06'),
(215, 86, 90, 'Microphone(s): Neck, podium, table, floor', 'Microphone(s): Neck, podium, table, floor', '2020-02-21', 165, 58, 0, NULL, 0, '2020-02-21 10:21:07', '2020-02-21 10:21:07'),
(216, 86, 91, 'Raised platform', 'Raised platform', '2020-02-21', 165, 58, 0, NULL, 0, '2020-02-21 10:21:07', '2020-02-21 10:21:07'),
(217, 86, 92, 'Projection screen', 'Projection screen', '2020-02-21', 165, 58, 0, NULL, 0, '2020-02-21 10:21:07', '2020-02-21 10:21:07'),
(218, 86, 93, 'Video projector', 'Video projector', '2020-02-21', 165, 58, 0, NULL, 0, '2020-02-21 10:21:07', '2020-02-21 10:21:07'),
(219, 86, 94, 'Remote control cord', 'Remote control cord', '2020-02-21', 165, 58, 0, NULL, 0, '2020-02-21 10:21:07', '2020-02-21 10:21:07'),
(220, 86, 95, 'Overhead projector', 'Overhead projector', '2020-02-21', 165, 58, 0, NULL, 0, '2020-02-21 10:21:07', '2020-02-21 10:21:07'),
(221, 86, 96, 'Flip charts, markers', 'Flip charts, markers', '2020-02-21', 165, 58, 0, NULL, 0, '2020-02-21 10:21:07', '2020-02-21 10:21:07'),
(222, 86, 97, 'Extension cords', 'Extension cords', '2020-02-21', 165, 58, 0, NULL, 0, '2020-02-21 10:21:07', '2020-02-21 10:21:07'),
(223, 86, 98, 'DVD player and monitor:', 'DVD player and monitor:', '2020-02-21', 165, 58, 0, NULL, 0, '2020-02-21 10:21:07', '2020-02-21 10:21:07'),
(224, 86, 99, 'Lap top to Screen', 'Lap top to Screen', '2020-02-21', 165, 58, 0, NULL, 0, '2020-02-21 10:21:07', '2020-02-21 10:21:07'),
(225, 100, 101, 'Menu selection', 'Menu selection', '2020-02-21', 166, 58, 0, NULL, 0, '2020-02-21 10:21:07', '2020-02-21 10:21:07'),
(226, 100, 102, 'Caterers', 'Caterers', '2020-02-21', 166, 58, 0, NULL, 0, '2020-02-21 10:21:07', '2020-02-21 10:21:07'),
(227, 100, 103, 'Schedule', 'Schedule', '2020-02-21', 166, 58, 0, NULL, 0, '2020-02-21 10:21:07', '2020-02-21 10:21:07'),
(228, 100, 104, 'Type service (buffet, seated)', 'Type service (buffet, seated)', '2020-02-21', 166, 58, 0, NULL, 0, '2020-02-21 10:21:07', '2020-02-21 10:21:07'),
(229, 100, 105, 'Tables for 6, 8, 10', 'Tables for 6, 8, 10', '2020-02-21', 166, 58, 0, NULL, 0, '2020-02-21 10:21:07', '2020-02-21 10:21:07'),
(230, 100, 106, 'Head table', 'Head table', '2020-02-21', 166, 58, 0, NULL, 0, '2020-02-21 10:21:07', '2020-02-21 10:21:07'),
(231, 100, 107, 'Place cards', 'Place cards', '2020-02-21', 166, 58, 0, NULL, 0, '2020-02-21 10:21:07', '2020-02-21 10:21:07'),
(232, 100, 108, 'Seating diagrams', 'Seating diagrams', '2020-02-21', 166, 58, 0, NULL, 0, '2020-02-21 10:21:08', '2020-02-21 10:21:08'),
(233, 100, 109, 'Beverages', 'Beverages', '2020-02-21', 166, 58, 0, NULL, 0, '2020-02-21 10:21:08', '2020-02-21 10:21:08'),
(234, 100, 110, 'Hospitality room service', 'Hospitality room service', '2020-02-21', 166, 58, 0, NULL, 0, '2020-02-21 10:21:08', '2020-02-21 10:21:08'),
(235, 111, 112, 'Mailing lists', 'Mailing lists', '2020-02-21', 167, 58, 0, NULL, 0, '2020-02-21 10:21:08', '2020-02-21 10:21:08'),
(236, 111, 113, 'Promotional mailings', 'Promotional mailings', '2020-02-21', 167, 58, 0, NULL, 0, '2020-02-21 10:21:08', '2020-02-21 10:21:08'),
(237, 111, 114, 'Posters, flyers', 'Posters, flyers', '2020-02-21', 167, 58, 0, NULL, 0, '2020-02-21 10:21:08', '2020-02-21 10:21:08'),
(238, 111, 115, 'Advertising', 'Advertising', '2020-02-21', 167, 58, 0, NULL, 0, '2020-02-21 10:21:08', '2020-02-21 10:21:08'),
(239, 111, 116, 'Media contact', 'Media contact', '2020-02-21', 167, 58, 0, NULL, 0, '2020-02-21 10:21:08', '2020-02-21 10:21:08'),
(240, 111, 117, 'Media fact sheets', 'Media fact sheets', '2020-02-21', 167, 58, 0, NULL, 0, '2020-02-21 10:21:08', '2020-02-21 10:21:08'),
(241, 111, 118, 'News releases', 'News releases', '2020-02-21', 167, 58, 0, NULL, 0, '2020-02-21 10:21:08', '2020-02-21 10:21:08'),
(242, 111, 119, 'Talk show appearances', 'Talk show appearances', '2020-02-21', 167, 58, 0, NULL, 0, '2020-02-21 10:21:08', '2020-02-21 10:21:08'),
(243, 111, 120, 'Press packets', 'Press packets', '2020-02-21', 167, 58, 0, NULL, 0, '2020-02-21 10:21:08', '2020-02-21 10:21:08'),
(244, 111, 121, 'Press room', 'Press room', '2020-02-21', 167, 58, 0, NULL, 0, '2020-02-21 10:21:08', '2020-02-21 10:21:08'),
(245, 111, 122, 'Special phone lines and internet connectivity for media', 'Special phone lines and internet connectivity for media', '2020-02-21', 167, 58, 0, NULL, 0, '2020-02-21 10:21:08', '2020-02-21 10:21:08'),
(246, 123, 124, 'Stills', 'Stills', '2020-02-21', 168, 58, 0, NULL, 0, '2020-02-21 10:21:08', '2020-02-21 10:21:08'),
(247, 123, 125, 'Video', 'Video', '2020-02-21', 168, 58, 0, NULL, 0, '2020-02-21 10:21:08', '2020-02-21 10:21:08'),
(248, 123, 126, 'Hire photographer', 'Hire photographer', '2020-02-21', 168, 58, 0, NULL, 0, '2020-02-21 10:21:08', '2020-02-21 10:21:08'),
(249, 123, 127, 'Shot list for photographer', 'Shot list for photographer', '2020-02-21', 168, 58, 0, NULL, 0, '2020-02-21 10:21:08', '2020-02-21 10:21:08'),
(250, 128, 129, 'Agenda', 'Agenda', '2020-02-21', 169, 58, 0, NULL, 0, '2020-02-21 10:21:09', '2020-02-21 10:21:09'),
(251, 128, 130, 'Speakers\' biographies & photos', 'Speakers\' biographies & photos', '2020-02-21', 169, 58, 0, NULL, 0, '2020-02-21 10:21:09', '2020-02-21 10:21:09'),
(252, 128, 131, 'Organization information', 'Organization information', '2020-02-21', 169, 58, 0, NULL, 0, '2020-02-21 10:21:09', '2020-02-21 10:21:09'),
(253, 128, 132, 'Lists of officers, committees', 'Lists of officers, committees', '2020-02-21', 169, 58, 0, NULL, 0, '2020-02-21 10:21:09', '2020-02-21 10:21:09'),
(254, 128, 133, 'Lists of sponsors, contributors', 'Lists of sponsors, contributors', '2020-02-13', 169, 58, 1, NULL, 0, '2020-02-21 10:21:09', '2020-02-24 06:53:31'),
(255, 128, 134, 'Design and printing', 'Design and printing', '2020-02-21', 169, 58, 0, NULL, 0, '2020-02-21 10:21:09', '2020-02-21 10:21:09'),
(256, 128, 135, 'Quantity', 'Quantity', '2020-02-21', 169, 58, 0, NULL, 0, '2020-02-21 10:21:09', '2020-02-21 10:21:09'),
(257, 128, 136, 'Distribution', 'Distribution', '2020-02-21', 169, 58, 0, NULL, 0, '2020-02-21 10:21:09', '2020-02-21 10:21:09'),
(258, 137, 138, 'Registration form', 'Registration form', '2020-02-21', 170, 58, 0, NULL, 0, '2020-02-21 10:21:09', '2020-02-21 10:21:09'),
(259, 137, 139, 'Bank account', 'Bank account', '2020-02-21', 170, 58, 0, NULL, 0, '2020-02-21 10:21:09', '2020-02-21 10:21:09'),
(260, 137, 140, 'Reporting system', 'Reporting system', '2020-02-21', 170, 58, 0, NULL, 0, '2020-02-21 10:21:09', '2020-02-21 10:21:09'),
(261, 137, 141, 'Registration confirmation', 'Registration confirmation', '2020-02-21', 170, 58, 0, NULL, 0, '2020-02-21 10:21:09', '2020-02-21 10:21:09'),
(262, 142, 143, 'Pre-registration list', 'Pre-registration list', '2020-02-21', 171, 58, 0, NULL, 0, '2020-02-21 10:21:09', '2020-02-21 10:21:09'),
(263, 142, 144, 'Tables', 'Tables', '2020-02-21', 171, 58, 0, NULL, 0, '2020-02-21 10:21:09', '2020-02-21 10:21:09'),
(264, 142, 145, 'Computers, collateral equipment', 'Computers, collateral equipment', '2020-02-21', 171, 58, 0, NULL, 0, '2020-02-21 10:21:09', '2020-02-21 10:21:09'),
(265, 142, 146, 'Personnel', 'Personnel', '2020-02-21', 171, 58, 0, NULL, 0, '2020-02-21 10:21:09', '2020-02-21 10:21:09'),
(266, 142, 147, 'Cash receipts', 'Cash receipts', '2020-02-21', 171, 58, 0, NULL, 0, '2020-02-21 10:21:09', '2020-02-21 10:21:09'),
(267, 142, 148, 'Programs', 'Programs', '2020-02-21', 171, 58, 0, NULL, 0, '2020-02-21 10:21:09', '2020-02-21 10:21:09'),
(268, 142, 149, 'Name badges', 'Name badges', '2020-02-21', 171, 58, 0, NULL, 0, '2020-02-21 10:21:10', '2020-02-21 10:21:10'),
(269, 142, 150, 'Goodie Bags', 'Goodie Bags', '2020-02-21', 171, 58, 0, NULL, 0, '2020-02-21 10:21:10', '2020-02-21 10:21:10'),
(270, 142, 151, 'Ticket sales', 'Ticket sales', '2020-02-21', 171, 58, 0, NULL, 0, '2020-02-21 10:21:10', '2020-02-21 10:21:10'),
(271, 142, 152, 'Host identification', 'Host identification', '2020-02-21', 171, 58, 0, NULL, 0, '2020-02-21 10:21:10', '2020-02-21 10:21:10'),
(272, 142, 153, 'Venue signage', 'Venue signage', '2020-02-21', 171, 58, 0, NULL, 0, '2020-02-21 10:21:10', '2020-02-21 10:21:10'),
(273, 154, 155, 'For equipment', 'For equipment', '2020-02-21', 172, 58, 0, NULL, 0, '2020-02-21 10:21:10', '2020-02-21 10:21:10'),
(274, 154, 156, 'Lease or charter vehicles', 'Lease or charter vehicles', '2020-02-21', 172, 58, 0, NULL, 0, '2020-02-21 10:21:10', '2020-02-21 10:21:10'),
(275, 154, 157, 'To and from parking areas', 'To and from parking areas', '2020-02-21', 172, 58, 0, NULL, 0, '2020-02-21 10:21:10', '2020-02-21 10:21:10'),
(276, 154, 158, 'For speakers & special guests', 'For speakers & special guests', '2020-02-21', 172, 58, 0, NULL, 0, '2020-02-21 10:21:10', '2020-02-21 10:21:10'),
(277, 154, 159, 'Between locations', 'Between locations', '2020-02-21', 172, 58, 0, NULL, 0, '2020-02-21 10:21:10', '2020-02-21 10:21:10'),
(278, 154, 160, 'Signs on vehicles', 'Signs on vehicles', '2020-02-21', 172, 58, 6, NULL, 0, '2020-02-21 10:21:10', '2020-02-24 04:49:15'),
(279, 154, 161, 'Publish or post schedules', 'Publish or post schedules', '2020-02-21', 172, 58, 0, NULL, 0, '2020-02-21 10:21:10', '2020-02-21 10:21:10'),
(280, 162, 163, 'For speakers', 'For speakers', '2020-02-21', 173, 58, 0, NULL, 0, '2020-02-21 10:21:10', '2020-02-21 10:21:10'),
(281, 162, 164, 'For special guests', 'For special guests', '2020-02-21', 173, 58, 0, NULL, 0, '2020-02-21 10:21:10', '2020-02-21 10:21:10'),
(282, 162, 165, 'For tours, exhibits, etc.', 'For tours, exhibits, etc.', '2020-02-21', 173, 58, 0, NULL, 0, '2020-02-21 10:21:10', '2020-02-21 10:21:10'),
(283, 162, 166, 'Aboard shuttles / buses when needed', 'Aboard shuttles / buses when needed', '2020-02-21', 173, 58, 0, NULL, 0, '2020-02-21 10:21:10', '2020-02-21 10:21:10'),
(284, 167, 168, 'Set the theme', 'Set the theme', '2020-02-21', 174, 58, 0, NULL, 0, '2020-02-21 10:21:11', '2020-02-21 10:21:11'),
(285, 167, 169, 'Entrances and exits', 'Entrances and exits', '2020-02-21', 174, 58, 0, NULL, 0, '2020-02-21 10:21:11', '2020-02-21 10:21:11'),
(286, 167, 170, 'Speaker platform', 'Speaker platform', '2020-02-21', 174, 58, 0, NULL, 0, '2020-02-21 10:21:11', '2020-02-21 10:21:11'),
(287, 167, 171, 'Head tables', 'Head tables', '2020-02-21', 174, 58, 0, NULL, 0, '2020-02-21 10:21:11', '2020-02-21 10:21:11'),
(288, 167, 172, 'Dining tables', 'Dining tables', '2020-02-21', 174, 58, 0, NULL, 0, '2020-02-21 10:21:11', '2020-02-21 10:21:11'),
(289, 167, 173, 'Hospitality suite', 'Hospitality suite', '2020-02-21', 174, 58, 0, NULL, 0, '2020-02-21 10:21:11', '2020-02-21 10:21:11'),
(290, 174, 175, 'Prices', 'Prices', '2020-02-21', 175, 58, 0, NULL, 0, '2020-02-21 10:21:11', '2020-02-21 10:21:11'),
(291, 174, 176, 'Advance sales', 'Advance sales', '2020-02-21', 175, 58, 0, NULL, 0, '2020-02-21 10:21:11', '2020-02-21 10:21:11'),
(292, 174, 177, 'Printing', 'Printing', '2020-02-21', 175, 58, 0, NULL, 0, '2020-02-21 10:21:11', '2020-02-21 10:21:11'),
(293, 174, 178, 'Distribution', 'Distribution', '2020-02-21', 175, 58, 0, NULL, 0, '2020-02-21 10:21:11', '2020-02-21 10:21:11'),
(294, 174, 179, 'Sales reports', 'Sales reports', '2020-02-21', 175, 58, 0, NULL, 0, '2020-02-21 10:21:11', '2020-02-21 10:21:11'),
(295, 174, 180, 'Ticket and money control', 'Ticket and money control', '2020-02-21', 175, 58, 0, NULL, 0, '2020-02-21 10:21:11', '2020-02-21 10:21:11'),
(296, 174, 181, 'Complimentary tickets', 'Complimentary tickets', '2020-02-21', 175, 58, 0, NULL, 0, '2020-02-21 10:21:11', '2020-02-21 10:21:11'),
(297, 174, 182, 'Press tickets', 'Press tickets', '2020-02-21', 175, 58, 0, NULL, 0, '2020-02-21 10:21:11', '2020-02-21 10:21:11'),
(298, 174, 183, 'Sales at doors', 'Sales at doors', '2020-02-21', 175, 58, 0, NULL, 0, '2020-02-21 10:21:11', '2020-02-21 10:21:11'),
(299, 174, 184, 'Collection at events', 'Collection at events', '2020-02-21', 175, 58, 0, NULL, 0, '2020-02-21 10:21:11', '2020-02-21 10:21:11'),
(300, 185, 186, 'Valet parking', 'Valet parking', '2020-02-21', 176, 58, 0, NULL, 0, '2020-02-21 10:21:11', '2020-02-21 10:21:11'),
(301, 185, 187, 'Bad weather planning', 'Bad weather planning', '2020-02-21', 176, 58, 0, NULL, 0, '2020-02-21 10:21:11', '2020-02-21 10:21:11'),
(302, 185, 188, 'Exhibits, displays', 'Exhibits, displays', '2020-02-21', 176, 58, 0, NULL, 0, '2020-02-21 10:21:11', '2020-02-21 10:21:11'),
(303, 185, 189, 'Security', 'Security', '2020-02-21', 176, 58, 0, NULL, 0, '2020-02-21 10:21:12', '2020-02-21 10:21:12'),
(304, 185, 190, 'Technicians for equipment', 'Technicians for equipment', '2020-02-21', 176, 58, 0, NULL, 0, '2020-02-21 10:21:12', '2020-02-21 10:21:12'),
(305, 185, 191, 'Disaster management', 'Disaster management', '2020-02-21', 176, 58, 0, NULL, 0, '2020-02-21 10:21:12', '2020-02-21 10:21:12'),
(306, 185, 192, 'Ambulance on stand-by', 'Ambulance on stand-by', '2020-02-21', 176, 58, 0, NULL, 0, '2020-02-21 10:21:12', '2020-02-21 10:21:12'),
(307, 185, 193, 'Police, traffic control, security', 'Police, traffic control, security', '2020-02-21', 176, 58, 0, NULL, 0, '2020-02-21 10:21:12', '2020-02-21 10:21:12'),
(308, 49, 50, 'Objectives', 'test', '2020-02-21', 177, 52, 0, NULL, 0, '2020-02-21 12:22:31', '2020-02-21 12:22:31'),
(309, 49, 51, 'Audience', 'ssssssssssssss', '2020-02-21', 177, 52, 0, NULL, 0, '2020-02-21 12:22:31', '2020-02-21 12:22:31'),
(310, 49, 52, 'Message of the Event', 'test', '2020-02-21', 177, 52, 0, NULL, 0, '2020-02-21 12:22:31', '2020-02-21 12:22:31'),
(311, 49, 53, 'Costs', 'Costs', '2020-02-21', 177, 52, 0, NULL, 0, '2020-02-21 12:22:31', '2020-02-21 12:22:31'),
(312, 49, 54, 'Dates', 'Dates', '2020-02-21', 177, 52, 0, NULL, 0, '2020-02-21 12:22:31', '2020-02-21 12:22:31'),
(313, 49, 55, 'Location', 'Location', '2020-02-21', 177, 52, 0, NULL, 0, '2020-02-21 12:22:31', '2020-02-21 12:22:31'),
(314, 56, 57, 'Phoned', 'Phoned', '2020-02-21', 178, 52, 0, NULL, 0, '2020-02-21 12:22:31', '2020-02-21 12:22:31'),
(315, 56, 58, 'E-mailed', 'E-mailed', '2020-02-21', 178, 52, 0, NULL, 0, '2020-02-21 12:22:31', '2020-02-21 12:22:31'),
(316, 56, 59, 'Printed, informal', 'Printed, informal description', '2020-02-21', 178, 52, 0, NULL, 0, '2020-02-21 12:22:31', '2020-02-21 12:22:31'),
(317, 56, 60, 'Printed, formal', 'Printed, formal descr', '2020-02-21', 178, 52, 0, NULL, 0, '2020-02-21 12:22:31', '2020-02-21 12:22:31'),
(318, 56, 61, 'RSVP return card', 'RSVP return card description', '2020-02-21', 178, 52, 0, NULL, 0, '2020-02-21 12:22:31', '2020-02-21 12:22:31'),
(319, 56, 62, 'RSVP by telephone', 'RSVP by telephone', '2020-02-21', 178, 52, 0, NULL, 0, '2020-02-21 12:22:31', '2020-02-21 12:22:31'),
(320, 56, 63, 'Reminder mailing', 'Reminder mailing', '2020-02-21', 178, 52, 0, NULL, 0, '2020-02-21 12:22:31', '2020-02-21 12:22:31'),
(321, 64, 65, 'Topics', 'Topics Desc', '2020-02-21', 179, 52, 0, NULL, 0, '2020-02-21 12:22:31', '2020-02-21 12:22:31'),
(322, 64, 66, 'Speakers', 'Speakers DESC', '2020-02-21', 179, 52, 0, NULL, 0, '2020-02-21 12:22:31', '2020-02-21 12:22:31'),
(323, 64, 67, 'Speaker contact', 'test', '2020-02-21', 179, 52, 0, NULL, 0, '2020-02-21 12:22:31', '2020-02-21 12:22:31'),
(324, 64, 68, 'Speaker agreements, honoraria', 'Speaker agreements, honoraria desc', '2020-02-21', 179, 52, 0, NULL, 0, '2020-02-21 12:22:31', '2020-02-21 12:22:31'),
(325, 64, 69, 'Equipment needed', 'Equipment needed DESC', '2020-02-21', 179, 52, 0, NULL, 0, '2020-02-21 12:22:31', '2020-02-21 12:22:31'),
(326, 64, 70, 'Biographies', 'Biographies DESC', '2020-02-21', 179, 52, 0, NULL, 0, '2020-02-21 12:22:32', '2020-02-21 12:22:32'),
(327, 64, 71, 'Introductions', 'Introductions DESC', '2020-02-21', 179, 52, 0, NULL, 0, '2020-02-21 12:22:32', '2020-02-21 12:22:32'),
(328, 72, 73, 'Hospitality', 'Hospitality DESC', '2020-02-21', 180, 52, 0, NULL, 0, '2020-02-21 12:22:32', '2020-02-21 12:22:32'),
(329, 72, 74, 'Transportation', 'Transportation DESC', '2020-02-21', 180, 52, 0, NULL, 0, '2020-02-21 12:22:32', '2020-02-21 12:22:32'),
(330, 72, 75, 'Accommodation', 'Accommodation DESC', '2020-02-21', 180, 52, 0, NULL, 0, '2020-02-21 12:22:32', '2020-02-21 12:22:32'),
(331, 72, 76, 'Mementos', 'Mementos DESC', '2020-02-21', 180, 52, 0, NULL, 0, '2020-02-21 12:22:32', '2020-02-21 12:22:32'),
(332, 77, 78, 'Number of people', 'Number of people DESC', '2020-02-21', 181, 52, 0, NULL, 0, '2020-02-21 12:22:32', '2020-02-21 12:22:32'),
(333, 77, 79, 'Auditorium-type seating', 'Auditorium-type seating desc', '2020-02-21', 181, 52, 0, NULL, 0, '2020-02-21 12:22:32', '2020-02-21 12:22:32'),
(334, 77, 80, 'Conference room seating', 'Conference room seating desc', '2020-02-21', 181, 52, 0, NULL, 0, '2020-02-21 12:22:32', '2020-02-21 12:22:32'),
(335, 77, 81, 'Table shapes: O, U, V', 'Table shapes: O, U, V desc', '2020-02-21', 181, 52, 0, NULL, 0, '2020-02-21 12:22:32', '2020-02-21 12:22:32'),
(336, 77, 82, 'Menu service needed', 'Menu service needed desc', '2020-02-21', 181, 52, 0, NULL, 0, '2020-02-21 12:22:32', '2020-02-21 12:22:32'),
(337, 77, 83, 'Parking', 'Parking descr', '2020-02-21', 181, 52, 0, NULL, 0, '2020-02-21 12:22:32', '2020-02-21 12:22:32'),
(338, 77, 84, 'Directional signs', 'Directional signs Desc', '2020-02-21', 181, 52, 0, NULL, 0, '2020-02-21 12:22:32', '2020-02-21 12:22:32'),
(339, 77, 85, 'Marquee sign(s)', 'Marquee sign(s) Descc', '2020-02-21', 181, 52, 0, NULL, 0, '2020-02-21 12:22:32', '2020-02-21 12:22:32'),
(340, 86, 87, 'Lectern', 'Lectern', '2020-02-21', 182, 52, 0, NULL, 0, '2020-02-21 12:22:32', '2020-02-21 12:22:32'),
(341, 86, 88, 'Podium', 'Podium', '2020-02-21', 182, 52, 0, NULL, 0, '2020-02-21 12:22:33', '2020-02-21 12:22:33'),
(342, 86, 89, 'Public address system', 'Public address system', '2020-02-21', 182, 52, 0, NULL, 0, '2020-02-21 12:22:33', '2020-02-21 12:22:33'),
(343, 86, 90, 'Microphone(s): Neck, podium, table, floor', 'Microphone(s): Neck, podium, table, floor', '2020-02-21', 182, 52, 0, NULL, 0, '2020-02-21 12:22:33', '2020-02-21 12:22:33'),
(344, 86, 91, 'Raised platform', 'Raised platform', '2020-02-21', 182, 52, 0, NULL, 0, '2020-02-21 12:22:33', '2020-02-21 12:22:33'),
(345, 86, 92, 'Projection screen', 'Projection screen', '2020-02-21', 182, 52, 0, NULL, 0, '2020-02-21 12:22:33', '2020-02-21 12:22:33'),
(346, 86, 93, 'Video projector', 'Video projector', '2020-02-21', 182, 52, 0, NULL, 0, '2020-02-21 12:22:33', '2020-02-21 12:22:33'),
(347, 86, 94, 'Remote control cord', 'Remote control cord', '2020-02-21', 182, 52, 0, NULL, 0, '2020-02-21 12:22:33', '2020-02-21 12:22:33'),
(348, 86, 95, 'Overhead projector', 'Overhead projector', '2020-02-21', 182, 52, 0, NULL, 0, '2020-02-21 12:22:33', '2020-02-21 12:22:33'),
(349, 86, 96, 'Flip charts, markers', 'Flip charts, markers', '2020-02-21', 182, 52, 0, NULL, 0, '2020-02-21 12:22:33', '2020-02-21 12:22:33'),
(350, 86, 97, 'Extension cords', 'Extension cords', '2020-02-21', 182, 52, 0, NULL, 0, '2020-02-21 12:22:33', '2020-02-21 12:22:33'),
(351, 86, 98, 'DVD player and monitor:', 'DVD player and monitor:', '2020-02-21', 182, 52, 0, NULL, 0, '2020-02-21 12:22:33', '2020-02-21 12:22:33'),
(352, 86, 99, 'Lap top to Screen', 'Lap top to Screen', '2020-02-21', 182, 52, 0, NULL, 0, '2020-02-21 12:22:33', '2020-02-21 12:22:33'),
(353, 100, 101, 'Menu selection', 'Menu selection', '2020-02-21', 183, 52, 0, NULL, 0, '2020-02-21 12:22:33', '2020-02-21 12:22:33'),
(354, 100, 102, 'Caterers', 'Caterers', '2020-02-21', 183, 52, 0, NULL, 0, '2020-02-21 12:22:33', '2020-02-21 12:22:33'),
(355, 100, 103, 'Schedule', 'Schedule', '2020-02-21', 183, 52, 0, NULL, 0, '2020-02-21 12:22:33', '2020-02-21 12:22:33'),
(356, 100, 104, 'Type service (buffet, seated)', 'Type service (buffet, seated)', '2020-02-21', 183, 52, 0, NULL, 0, '2020-02-21 12:22:33', '2020-02-21 12:22:33'),
(357, 100, 105, 'Tables for 6, 8, 10', 'Tables for 6, 8, 10', '2020-02-21', 183, 52, 0, NULL, 0, '2020-02-21 12:22:33', '2020-02-21 12:22:33'),
(358, 100, 106, 'Head table', 'Head table', '2020-02-21', 183, 52, 0, NULL, 0, '2020-02-21 12:22:33', '2020-02-21 12:22:33'),
(359, 100, 107, 'Place cards', 'Place cards', '2020-02-21', 183, 52, 0, NULL, 0, '2020-02-21 12:22:33', '2020-02-21 12:22:33'),
(360, 100, 108, 'Seating diagrams', 'Seating diagrams', '2020-02-21', 183, 52, 0, NULL, 0, '2020-02-21 12:22:34', '2020-02-21 12:22:34'),
(361, 100, 109, 'Beverages', 'Beverages', '2020-02-21', 183, 52, 0, NULL, 0, '2020-02-21 12:22:34', '2020-02-21 12:22:34'),
(362, 100, 110, 'Hospitality room service', 'Hospitality room service', '2020-02-21', 183, 52, 0, NULL, 0, '2020-02-21 12:22:34', '2020-02-21 12:22:34'),
(363, 111, 112, 'Mailing lists', 'Mailing lists', '2020-02-21', 184, 52, 0, NULL, 0, '2020-02-21 12:22:34', '2020-02-21 12:22:34'),
(364, 111, 113, 'Promotional mailings', 'Promotional mailings', '2020-02-21', 184, 52, 0, NULL, 0, '2020-02-21 12:22:34', '2020-02-21 12:22:34'),
(365, 111, 114, 'Posters, flyers', 'Posters, flyers', '2020-02-21', 184, 52, 0, NULL, 0, '2020-02-21 12:22:34', '2020-02-21 12:22:34'),
(366, 111, 115, 'Advertising', 'Advertising', '2020-02-21', 184, 52, 0, NULL, 0, '2020-02-21 12:22:34', '2020-02-21 12:22:34'),
(367, 111, 116, 'Media contact', 'Media contact', '2020-02-21', 184, 52, 0, NULL, 0, '2020-02-21 12:22:34', '2020-02-21 12:22:34'),
(368, 111, 117, 'Media fact sheets', 'Media fact sheets', '2020-02-21', 184, 52, 0, NULL, 0, '2020-02-21 12:22:34', '2020-02-21 12:22:34'),
(369, 111, 118, 'News releases', 'News releases', '2020-02-21', 184, 52, 0, NULL, 0, '2020-02-21 12:22:34', '2020-02-21 12:22:34'),
(370, 111, 119, 'Talk show appearances', 'Talk show appearances', '2020-02-21', 184, 52, 0, NULL, 0, '2020-02-21 12:22:34', '2020-02-21 12:22:34');
INSERT INTO `my_check_list_tasks` (`id`, `parent`, `task_id`, `task`, `description`, `task_date`, `category_id`, `event_id`, `vendor_id`, `note`, `status`, `created_at`, `updated_at`) VALUES
(371, 111, 120, 'Press packets', 'Press packets', '2020-02-21', 184, 52, 0, NULL, 0, '2020-02-21 12:22:34', '2020-02-21 12:22:34'),
(372, 111, 121, 'Press room', 'Press room', '2020-02-21', 184, 52, 0, NULL, 0, '2020-02-21 12:22:34', '2020-02-21 12:22:34'),
(373, 111, 122, 'Special phone lines and internet connectivity for media', 'Special phone lines and internet connectivity for media', '2020-02-21', 184, 52, 0, NULL, 0, '2020-02-21 12:22:34', '2020-02-21 12:22:34'),
(374, 123, 124, 'Stills', 'Stills', '2020-02-21', 185, 52, 0, NULL, 0, '2020-02-21 12:22:34', '2020-02-21 12:22:34'),
(375, 123, 125, 'Video', 'Video', '2020-02-21', 185, 52, 0, NULL, 0, '2020-02-21 12:22:34', '2020-02-21 12:22:34'),
(376, 123, 126, 'Hire photographer', 'Hire photographer', '2020-02-21', 185, 52, 0, NULL, 0, '2020-02-21 12:22:34', '2020-02-21 12:22:34'),
(377, 123, 127, 'Shot list for photographer', 'Shot list for photographer', '2020-02-21', 185, 52, 0, NULL, 0, '2020-02-21 12:22:34', '2020-02-21 12:22:34'),
(378, 128, 129, 'Agenda', 'Agenda', '2020-02-21', 186, 52, 0, NULL, 0, '2020-02-21 12:22:35', '2020-02-21 12:22:35'),
(379, 128, 130, 'Speakers\' biographies & photos', 'Speakers\' biographies & photos', '2020-02-21', 186, 52, 0, NULL, 0, '2020-02-21 12:22:35', '2020-02-21 12:22:35'),
(380, 128, 131, 'Organization information', 'Organization information', '2020-02-21', 186, 52, 0, NULL, 0, '2020-02-21 12:22:35', '2020-02-21 12:22:35'),
(381, 128, 132, 'Lists of officers, committees', 'Lists of officers, committees', '2020-02-21', 186, 52, 0, NULL, 0, '2020-02-21 12:22:35', '2020-02-21 12:22:35'),
(382, 128, 133, 'Lists of sponsors, contributors', 'Lists of sponsors, contributors', '2020-02-21', 186, 52, 0, NULL, 0, '2020-02-21 12:22:35', '2020-02-21 12:22:35'),
(383, 128, 134, 'Design and printing', 'Design and printing', '2020-02-21', 186, 52, 0, NULL, 0, '2020-02-21 12:22:35', '2020-02-21 12:22:35'),
(384, 128, 135, 'Quantity', 'Quantity', '2020-02-21', 186, 52, 0, NULL, 0, '2020-02-21 12:22:35', '2020-02-21 12:22:35'),
(385, 128, 136, 'Distribution', 'Distribution', '2020-02-21', 186, 52, 0, NULL, 0, '2020-02-21 12:22:35', '2020-02-21 12:22:35'),
(386, 137, 138, 'Registration form', 'Registration form', '2020-02-21', 187, 52, 0, NULL, 0, '2020-02-21 12:22:35', '2020-02-21 12:22:35'),
(387, 137, 139, 'Bank account', 'Bank account', '2020-02-21', 187, 52, 0, NULL, 0, '2020-02-21 12:22:35', '2020-02-21 12:22:35'),
(388, 137, 140, 'Reporting system', 'Reporting system', '2020-02-21', 187, 52, 0, NULL, 0, '2020-02-21 12:22:35', '2020-02-21 12:22:35'),
(389, 137, 141, 'Registration confirmation', 'Registration confirmation', '2020-02-21', 187, 52, 0, NULL, 0, '2020-02-21 12:22:35', '2020-02-21 12:22:35'),
(390, 142, 143, 'Pre-registration list', 'Pre-registration list', '2020-02-21', 188, 52, 0, NULL, 0, '2020-02-21 12:22:35', '2020-02-21 12:22:35'),
(391, 142, 144, 'Tables', 'Tables', '2020-02-21', 188, 52, 0, NULL, 0, '2020-02-21 12:22:35', '2020-02-21 12:22:35'),
(392, 142, 145, 'Computers, collateral equipment', 'Computers, collateral equipment', '2020-02-21', 188, 52, 0, NULL, 0, '2020-02-21 12:22:35', '2020-02-21 12:22:35'),
(393, 142, 146, 'Personnel', 'Personnel', '2020-02-21', 188, 52, 0, NULL, 0, '2020-02-21 12:22:35', '2020-02-21 12:22:35'),
(394, 142, 147, 'Cash receipts', 'Cash receipts', '2020-02-21', 188, 52, 0, NULL, 0, '2020-02-21 12:22:35', '2020-02-21 12:22:35'),
(395, 142, 148, 'Programs', 'Programs', '2020-02-21', 188, 52, 0, NULL, 0, '2020-02-21 12:22:36', '2020-02-21 12:22:36'),
(396, 142, 149, 'Name badges', 'Name badges', '2020-02-21', 188, 52, 0, NULL, 0, '2020-02-21 12:22:36', '2020-02-21 12:22:36'),
(397, 142, 150, 'Goodie Bags', 'Goodie Bags', '2020-02-21', 188, 52, 0, NULL, 0, '2020-02-21 12:22:36', '2020-02-21 12:22:36'),
(398, 142, 151, 'Ticket sales', 'Ticket sales', '2020-02-21', 188, 52, 0, NULL, 0, '2020-02-21 12:22:36', '2020-02-21 12:22:36'),
(399, 142, 152, 'Host identification', 'Host identification', '2020-02-21', 188, 52, 0, NULL, 0, '2020-02-21 12:22:36', '2020-02-21 12:22:36'),
(400, 142, 153, 'Venue signage', 'Venue signage', '2020-02-21', 188, 52, 0, NULL, 0, '2020-02-21 12:22:36', '2020-02-21 12:22:36'),
(401, 154, 155, 'For equipment', 'For equipment', '2020-02-21', 189, 52, 0, NULL, 0, '2020-02-21 12:22:36', '2020-02-21 12:22:36'),
(402, 154, 156, 'Lease or charter vehicles', 'Lease or charter vehicles', '2020-02-21', 189, 52, 0, NULL, 0, '2020-02-21 12:22:36', '2020-02-21 12:22:36'),
(403, 154, 157, 'To and from parking areas', 'To and from parking areas', '2020-02-21', 189, 52, 0, NULL, 0, '2020-02-21 12:22:36', '2020-02-21 12:22:36'),
(404, 154, 158, 'For speakers & special guests', 'For speakers & special guests', '2020-02-21', 189, 52, 0, NULL, 0, '2020-02-21 12:22:36', '2020-02-21 12:22:36'),
(405, 154, 159, 'Between locations', 'Between locations', '2020-02-21', 189, 52, 0, NULL, 0, '2020-02-21 12:22:36', '2020-02-21 12:22:36'),
(406, 154, 160, 'Signs on vehicles', 'Signs on vehicles', '2020-02-21', 189, 52, 0, NULL, 0, '2020-02-21 12:22:36', '2020-02-21 12:22:36'),
(407, 154, 161, 'Publish or post schedules', 'Publish or post schedules', '2020-02-21', 189, 52, 0, NULL, 0, '2020-02-21 12:22:36', '2020-02-21 12:22:36'),
(408, 162, 163, 'For speakers', 'For speakers', '2020-02-21', 190, 52, 0, NULL, 0, '2020-02-21 12:22:36', '2020-02-21 12:22:36'),
(409, 162, 164, 'For special guests', 'For special guests', '2020-02-21', 190, 52, 0, NULL, 0, '2020-02-21 12:22:36', '2020-02-21 12:22:36'),
(410, 162, 165, 'For tours, exhibits, etc.', 'For tours, exhibits, etc.', '2020-02-21', 190, 52, 0, NULL, 0, '2020-02-21 12:22:36', '2020-02-21 12:22:36'),
(411, 162, 166, 'Aboard shuttles / buses when needed', 'Aboard shuttles / buses when needed', '2020-02-21', 190, 52, 0, NULL, 0, '2020-02-21 12:22:36', '2020-02-21 12:22:36'),
(412, 167, 168, 'Set the theme', 'Set the theme', '2020-02-21', 191, 52, 0, NULL, 0, '2020-02-21 12:22:37', '2020-02-21 12:22:37'),
(413, 167, 169, 'Entrances and exits', 'Entrances and exits', '2020-02-21', 191, 52, 0, NULL, 0, '2020-02-21 12:22:37', '2020-02-21 12:22:37'),
(414, 167, 170, 'Speaker platform', 'Speaker platform', '2020-02-21', 191, 52, 0, NULL, 0, '2020-02-21 12:22:37', '2020-02-21 12:22:37'),
(415, 167, 171, 'Head tables', 'Head tables', '2020-02-21', 191, 52, 0, NULL, 0, '2020-02-21 12:22:37', '2020-02-21 12:22:37'),
(416, 167, 172, 'Dining tables', 'Dining tables', '2020-02-21', 191, 52, 0, NULL, 0, '2020-02-21 12:22:37', '2020-02-21 12:22:37'),
(417, 167, 173, 'Hospitality suite', 'Hospitality suite', '2020-02-21', 191, 52, 0, NULL, 0, '2020-02-21 12:22:37', '2020-02-21 12:22:37'),
(418, 174, 175, 'Prices', 'Prices', '2020-02-21', 192, 52, 0, NULL, 0, '2020-02-21 12:22:37', '2020-02-21 12:22:37'),
(419, 174, 176, 'Advance sales', 'Advance sales', '2020-02-21', 192, 52, 0, NULL, 0, '2020-02-21 12:22:37', '2020-02-21 12:22:37'),
(420, 174, 177, 'Printing', 'Printing', '2020-02-21', 192, 52, 0, NULL, 0, '2020-02-21 12:22:37', '2020-02-21 12:22:37'),
(421, 174, 178, 'Distribution', 'Distribution', '2020-02-21', 192, 52, 0, NULL, 0, '2020-02-21 12:22:37', '2020-02-21 12:22:37'),
(422, 174, 179, 'Sales reports', 'Sales reports', '2020-02-21', 192, 52, 0, NULL, 0, '2020-02-21 12:22:37', '2020-02-21 12:22:37'),
(423, 174, 180, 'Ticket and money control', 'Ticket and money control', '2020-02-21', 192, 52, 0, NULL, 0, '2020-02-21 12:22:37', '2020-02-21 12:22:37'),
(424, 174, 181, 'Complimentary tickets', 'Complimentary tickets', '2020-02-21', 192, 52, 0, NULL, 0, '2020-02-21 12:22:37', '2020-02-21 12:22:37'),
(425, 174, 182, 'Press tickets', 'Press tickets', '2020-02-21', 192, 52, 0, NULL, 0, '2020-02-21 12:22:37', '2020-02-21 12:22:37'),
(426, 174, 183, 'Sales at doors', 'Sales at doors', '2020-02-21', 192, 52, 0, NULL, 0, '2020-02-21 12:22:37', '2020-02-21 12:22:37'),
(427, 174, 184, 'Collection at events', 'Collection at events', '2020-02-21', 192, 52, 0, NULL, 0, '2020-02-21 12:22:37', '2020-02-21 12:22:37'),
(428, 185, 186, 'Valet parking', 'Valet parking', '2020-02-21', 193, 52, 0, NULL, 0, '2020-02-21 12:22:37', '2020-02-21 12:22:37'),
(429, 185, 187, 'Bad weather planning', 'Bad weather planning', '2020-02-21', 193, 52, 0, NULL, 0, '2020-02-21 12:22:37', '2020-02-21 12:22:37'),
(430, 185, 188, 'Exhibits, displays', 'Exhibits, displays', '2020-02-21', 193, 52, 0, NULL, 0, '2020-02-21 12:22:38', '2020-02-21 12:22:38'),
(431, 185, 189, 'Security', 'Security', '2020-02-21', 193, 52, 0, NULL, 0, '2020-02-21 12:22:38', '2020-02-21 12:22:38'),
(432, 185, 190, 'Technicians for equipment', 'Technicians for equipment', '2020-02-21', 193, 52, 0, NULL, 0, '2020-02-21 12:22:38', '2020-02-21 12:22:38'),
(433, 185, 191, 'Disaster management', 'Disaster management', '2020-02-21', 193, 52, 0, NULL, 0, '2020-02-21 12:22:38', '2020-02-21 12:22:38'),
(434, 185, 192, 'Ambulance on stand-by', 'Ambulance on stand-by', '2020-02-21', 193, 52, 0, NULL, 0, '2020-02-21 12:22:38', '2020-02-21 12:22:38'),
(435, 185, 193, 'Police, traffic control, security', 'Police, traffic control, security', '2020-02-21', 193, 52, 0, NULL, 0, '2020-02-21 12:22:38', '2020-02-21 12:22:38'),
(437, 49, 50, 'Objectives', 'test', '2020-02-24', 194, 40, 0, NULL, 0, '2020-02-24 02:31:03', '2020-02-24 02:31:03'),
(438, 49, 51, 'Audience', 'ssssssssssssss', '2020-02-24', 194, 40, 0, NULL, 0, '2020-02-24 02:31:03', '2020-02-24 02:31:03'),
(439, 49, 52, 'Message of the Event', 'test', '2020-02-24', 194, 40, 0, NULL, 0, '2020-02-24 02:31:03', '2020-02-24 02:31:03'),
(440, 49, 53, 'Costs', 'Costs', '2020-02-24', 194, 40, 0, NULL, 0, '2020-02-24 02:31:03', '2020-02-24 02:31:03'),
(441, 49, 54, 'Dates', 'Dates', '2020-02-24', 194, 40, 0, NULL, 0, '2020-02-24 02:31:03', '2020-02-24 02:31:03'),
(442, 49, 55, 'Location', 'Location', '2020-02-24', 194, 40, 0, NULL, 0, '2020-02-24 02:31:03', '2020-02-24 02:31:03'),
(443, 56, 57, 'Phoned', 'Phoned', '2020-02-24', 195, 40, 0, NULL, 0, '2020-02-24 02:31:03', '2020-02-24 02:31:03'),
(444, 56, 58, 'E-mailed', 'E-mailed', '2020-02-24', 195, 40, 0, NULL, 0, '2020-02-24 02:31:03', '2020-02-24 02:31:03'),
(445, 56, 59, 'Printed, informal', 'Printed, informal description', '2020-02-24', 195, 40, 0, NULL, 0, '2020-02-24 02:31:03', '2020-02-24 02:31:03'),
(446, 56, 60, 'Printed, formal', 'Printed, formal descr', '2020-02-24', 195, 40, 0, NULL, 0, '2020-02-24 02:31:03', '2020-02-24 02:31:03'),
(447, 56, 61, 'RSVP return card', 'RSVP return card description', '2020-02-24', 195, 40, 0, NULL, 0, '2020-02-24 02:31:03', '2020-02-24 02:31:03'),
(448, 56, 62, 'RSVP by telephone', 'RSVP by telephone', '2020-02-24', 195, 40, 0, NULL, 0, '2020-02-24 02:31:03', '2020-02-24 02:31:03'),
(449, 56, 63, 'Reminder mailing', 'Reminder mailing', '2020-02-24', 195, 40, 0, NULL, 0, '2020-02-24 02:31:03', '2020-02-24 02:31:03'),
(450, 64, 65, 'Topics', 'Topics Desc', '2020-02-24', 196, 40, 0, NULL, 0, '2020-02-24 02:31:03', '2020-02-24 02:31:03'),
(451, 64, 66, 'Speakers', 'Speakers DESC', '2020-02-24', 196, 40, 0, NULL, 0, '2020-02-24 02:31:03', '2020-02-24 02:31:03'),
(452, 64, 67, 'Speaker contact', 'test', '2020-02-24', 196, 40, 0, NULL, 0, '2020-02-24 02:31:03', '2020-02-24 02:31:03'),
(453, 64, 68, 'Speaker agreements, honoraria', 'Speaker agreements, honoraria desc', '2020-02-24', 196, 40, 0, NULL, 0, '2020-02-24 02:31:03', '2020-02-24 02:31:03'),
(454, 64, 69, 'Equipment needed', 'Equipment needed DESC', '2020-02-24', 196, 40, 0, NULL, 0, '2020-02-24 02:31:04', '2020-02-24 02:31:04'),
(455, 64, 70, 'Biographies', 'Biographies DESC', '2020-02-24', 196, 40, 0, NULL, 0, '2020-02-24 02:31:04', '2020-02-24 02:31:04'),
(456, 64, 71, 'Introductions', 'Introductions DESC', '2020-02-24', 196, 40, 0, NULL, 0, '2020-02-24 02:31:04', '2020-02-24 02:31:04'),
(457, 72, 73, 'Hospitality', 'Hospitality DESC', '2020-02-24', 197, 40, 0, NULL, 0, '2020-02-24 02:31:04', '2020-02-24 02:31:04'),
(458, 72, 74, 'Transportation', 'Transportation DESC', '2020-02-24', 197, 40, 0, NULL, 0, '2020-02-24 02:31:04', '2020-02-24 02:31:04'),
(459, 72, 75, 'Accommodation', 'Accommodation DESC', '2020-02-24', 197, 40, 0, NULL, 0, '2020-02-24 02:31:04', '2020-02-24 02:31:04'),
(460, 72, 76, 'Mementos', 'Mementos DESC', '2020-02-24', 197, 40, 0, NULL, 0, '2020-02-24 02:31:04', '2020-02-24 02:31:04'),
(461, 77, 78, 'Number of people', 'Number of people DESC', '2020-02-24', 198, 40, 0, NULL, 0, '2020-02-24 02:31:04', '2020-02-24 02:31:04'),
(462, 77, 79, 'Auditorium-type seating', 'Auditorium-type seating desc', '2020-02-24', 198, 40, 0, NULL, 0, '2020-02-24 02:31:04', '2020-02-24 02:31:04'),
(463, 77, 80, 'Conference room seating', 'Conference room seating desc', '2020-02-24', 198, 40, 0, NULL, 0, '2020-02-24 02:31:04', '2020-02-24 02:31:04'),
(464, 77, 81, 'Table shapes: O, U, V', 'Table shapes: O, U, V desc', '2020-02-24', 198, 40, 0, NULL, 0, '2020-02-24 02:31:04', '2020-02-24 02:31:04'),
(465, 77, 82, 'Menu service needed', 'Menu service needed desc', '2020-02-24', 198, 40, 0, NULL, 0, '2020-02-24 02:31:04', '2020-02-24 02:31:04'),
(466, 77, 83, 'Parking', 'Parking descr', '2020-02-24', 198, 40, 0, NULL, 0, '2020-02-24 02:31:04', '2020-02-24 02:31:04'),
(467, 77, 84, 'Directional signs', 'Directional signs Desc', '2020-02-24', 198, 40, 0, NULL, 0, '2020-02-24 02:31:04', '2020-02-24 02:31:04'),
(468, 77, 85, 'Marquee sign(s)', 'Marquee sign(s) Descc', '2020-02-24', 198, 40, 0, NULL, 0, '2020-02-24 02:31:04', '2020-02-24 02:31:04'),
(469, 86, 87, 'Lectern', 'Lectern', '2020-02-24', 199, 40, 0, NULL, 0, '2020-02-24 02:31:04', '2020-02-24 02:31:04'),
(470, 86, 88, 'Podium', 'Podium', '2020-02-24', 199, 40, 0, NULL, 0, '2020-02-24 02:31:05', '2020-02-24 02:31:05'),
(471, 86, 89, 'Public address system', 'Public address system', '2020-02-24', 199, 40, 0, NULL, 0, '2020-02-24 02:31:05', '2020-02-24 02:31:05'),
(472, 86, 90, 'Microphone(s): Neck, podium, table, floor', 'Microphone(s): Neck, podium, table, floor', '2020-02-24', 199, 40, 0, NULL, 0, '2020-02-24 02:31:05', '2020-02-24 02:31:05'),
(473, 86, 91, 'Raised platform', 'Raised platform', '2020-02-24', 199, 40, 0, NULL, 0, '2020-02-24 02:31:05', '2020-02-24 02:31:05'),
(474, 86, 92, 'Projection screen', 'Projection screen', '2020-02-24', 199, 40, 0, NULL, 0, '2020-02-24 02:31:05', '2020-02-24 02:31:05'),
(475, 86, 93, 'Video projector', 'Video projector', '2020-02-24', 199, 40, 0, NULL, 0, '2020-02-24 02:31:05', '2020-02-24 02:31:05'),
(476, 86, 94, 'Remote control cord', 'Remote control cord', '2020-02-24', 199, 40, 0, NULL, 0, '2020-02-24 02:31:05', '2020-02-24 02:31:05'),
(477, 86, 95, 'Overhead projector', 'Overhead projector', '2020-02-24', 199, 40, 0, NULL, 0, '2020-02-24 02:31:05', '2020-02-24 02:31:05'),
(478, 86, 96, 'Flip charts, markers', 'Flip charts, markers', '2020-02-24', 199, 40, 0, NULL, 0, '2020-02-24 02:31:05', '2020-02-24 02:31:05'),
(479, 86, 97, 'Extension cords', 'Extension cords', '2020-02-24', 199, 40, 0, NULL, 0, '2020-02-24 02:31:05', '2020-02-24 02:31:05'),
(480, 86, 98, 'DVD player and monitor:', 'DVD player and monitor:', '2020-02-24', 199, 40, 0, NULL, 0, '2020-02-24 02:31:05', '2020-02-24 02:31:05'),
(481, 86, 99, 'Lap top to Screen', 'Lap top to Screen', '2020-02-24', 199, 40, 0, NULL, 0, '2020-02-24 02:31:05', '2020-02-24 02:31:05'),
(482, 100, 101, 'Menu selection', 'Menu selection', '2020-02-24', 200, 40, 0, NULL, 0, '2020-02-24 02:31:05', '2020-02-24 02:31:05'),
(483, 100, 102, 'Caterers', 'Caterers', '2020-02-24', 200, 40, 0, NULL, 0, '2020-02-24 02:31:05', '2020-02-24 02:31:05'),
(484, 100, 103, 'Schedule', 'Schedule', '2020-02-24', 200, 40, 0, NULL, 0, '2020-02-24 02:31:05', '2020-02-24 02:31:05'),
(485, 100, 104, 'Type service (buffet, seated)', 'Type service (buffet, seated)', '2020-02-24', 200, 40, 0, NULL, 0, '2020-02-24 02:31:05', '2020-02-24 02:31:05'),
(486, 100, 105, 'Tables for 6, 8, 10', 'Tables for 6, 8, 10', '2020-02-24', 200, 40, 0, NULL, 0, '2020-02-24 02:31:06', '2020-02-24 02:31:06'),
(487, 100, 106, 'Head table', 'Head table', '2020-02-24', 200, 40, 0, NULL, 0, '2020-02-24 02:31:06', '2020-02-24 02:31:06'),
(488, 100, 107, 'Place cards', 'Place cards', '2020-02-24', 200, 40, 0, NULL, 0, '2020-02-24 02:31:06', '2020-02-24 02:31:06'),
(489, 100, 108, 'Seating diagrams', 'Seating diagrams', '2020-02-24', 200, 40, 0, NULL, 0, '2020-02-24 02:31:06', '2020-02-24 02:31:06'),
(490, 100, 109, 'Beverages', 'Beverages', '2020-02-24', 200, 40, 0, NULL, 0, '2020-02-24 02:31:06', '2020-02-24 02:31:06'),
(491, 100, 110, 'Hospitality room service', 'Hospitality room service', '2020-02-24', 200, 40, 0, NULL, 0, '2020-02-24 02:31:06', '2020-02-24 02:31:06'),
(492, 111, 112, 'Mailing lists', 'Mailing lists', '2020-02-24', 201, 40, 0, NULL, 0, '2020-02-24 02:31:06', '2020-02-24 02:31:06'),
(493, 111, 113, 'Promotional mailings', 'Promotional mailings', '2020-02-24', 201, 40, 0, NULL, 0, '2020-02-24 02:31:06', '2020-02-24 02:31:06'),
(494, 111, 114, 'Posters, flyers', 'Posters, flyers', '2020-02-24', 201, 40, 0, NULL, 0, '2020-02-24 02:31:06', '2020-02-24 02:31:06'),
(495, 111, 115, 'Advertising', 'Advertising', '2020-02-24', 201, 40, 0, NULL, 0, '2020-02-24 02:31:06', '2020-02-24 02:31:06'),
(496, 111, 116, 'Media contact', 'Media contact', '2020-02-24', 201, 40, 0, NULL, 0, '2020-02-24 02:31:06', '2020-02-24 02:31:06'),
(497, 111, 117, 'Media fact sheets', 'Media fact sheets', '2020-02-24', 201, 40, 0, NULL, 0, '2020-02-24 02:31:06', '2020-02-24 02:31:06'),
(498, 111, 118, 'News releases', 'News releases', '2020-02-24', 201, 40, 0, NULL, 0, '2020-02-24 02:31:06', '2020-02-24 02:31:06'),
(499, 111, 119, 'Talk show appearances', 'Talk show appearances', '2020-02-24', 201, 40, 0, NULL, 0, '2020-02-24 02:31:06', '2020-02-24 02:31:06'),
(500, 111, 120, 'Press packets', 'Press packets', '2020-02-24', 201, 40, 0, NULL, 0, '2020-02-24 02:31:06', '2020-02-24 02:31:06'),
(501, 111, 121, 'Press room', 'Press room', '2020-02-24', 201, 40, 0, NULL, 0, '2020-02-24 02:31:06', '2020-02-24 02:31:06'),
(502, 111, 122, 'Special phone lines and internet connectivity for media', 'Special phone lines and internet connectivity for media', '2020-02-24', 201, 40, 0, NULL, 0, '2020-02-24 02:31:06', '2020-02-24 02:31:06'),
(503, 123, 124, 'Stills', 'Stills', '2020-02-24', 202, 40, 0, NULL, 0, '2020-02-24 02:31:06', '2020-02-24 02:31:06'),
(504, 123, 125, 'Video', 'Video', '2020-02-24', 202, 40, 0, NULL, 0, '2020-02-24 02:31:06', '2020-02-24 02:31:06'),
(505, 123, 126, 'Hire photographer', 'Hire photographer', '2020-02-24', 202, 40, 0, NULL, 0, '2020-02-24 02:31:07', '2020-02-24 02:31:07'),
(506, 123, 127, 'Shot list for photographer', 'Shot list for photographer', '2020-02-24', 202, 40, 0, NULL, 0, '2020-02-24 02:31:07', '2020-02-24 02:31:07'),
(507, 128, 129, 'Agenda', 'Agenda', '2020-02-24', 203, 40, 0, NULL, 0, '2020-02-24 02:31:07', '2020-02-24 02:31:07'),
(508, 128, 130, 'Speakers\' biographies & photos', 'Speakers\' biographies & photos', '2020-02-24', 203, 40, 0, NULL, 0, '2020-02-24 02:31:07', '2020-02-24 02:31:07'),
(509, 128, 131, 'Organization information', 'Organization information', '2020-02-24', 203, 40, 0, NULL, 0, '2020-02-24 02:31:07', '2020-02-24 02:31:07'),
(510, 128, 132, 'Lists of officers, committees', 'Lists of officers, committees', '2020-02-24', 203, 40, 0, NULL, 0, '2020-02-24 02:31:07', '2020-02-24 02:31:07'),
(511, 128, 133, 'Lists of sponsors, contributors', 'Lists of sponsors, contributors', '2020-02-24', 203, 40, 0, NULL, 0, '2020-02-24 02:31:07', '2020-02-24 02:31:07'),
(512, 128, 134, 'Design and printing', 'Design and printing', '2020-02-24', 203, 40, 0, NULL, 0, '2020-02-24 02:31:07', '2020-02-24 02:31:07'),
(513, 128, 135, 'Quantity', 'Quantity', '2020-02-24', 203, 40, 0, NULL, 0, '2020-02-24 02:31:07', '2020-02-24 02:31:07'),
(514, 128, 136, 'Distribution', 'Distribution', '2020-02-24', 203, 40, 0, NULL, 0, '2020-02-24 02:31:07', '2020-02-24 02:31:07'),
(515, 137, 138, 'Registration form', 'Registration form', '2020-02-24', 204, 40, 0, NULL, 0, '2020-02-24 02:31:07', '2020-02-24 02:31:07'),
(516, 137, 139, 'Bank account', 'Bank account', '2020-02-24', 204, 40, 0, NULL, 0, '2020-02-24 02:31:07', '2020-02-24 02:31:07'),
(517, 137, 140, 'Reporting system', 'Reporting system', '2020-02-24', 204, 40, 0, NULL, 0, '2020-02-24 02:31:07', '2020-02-24 02:31:07'),
(518, 137, 141, 'Registration confirmation', 'Registration confirmation', '2020-02-24', 204, 40, 0, NULL, 0, '2020-02-24 02:31:07', '2020-02-24 02:31:07'),
(519, 142, 143, 'Pre-registration list', 'Pre-registration list', '2020-02-24', 205, 40, 0, NULL, 0, '2020-02-24 02:31:07', '2020-02-24 02:31:07'),
(520, 142, 144, 'Tables', 'Tables', '2020-02-24', 205, 40, 0, NULL, 0, '2020-02-24 02:31:07', '2020-02-24 02:31:07'),
(521, 142, 145, 'Computers, collateral equipment', 'Computers, collateral equipment', '2020-02-24', 205, 40, 0, NULL, 0, '2020-02-24 02:31:07', '2020-02-24 02:31:07'),
(522, 142, 146, 'Personnel', 'Personnel', '2020-02-24', 205, 40, 0, NULL, 0, '2020-02-24 02:31:07', '2020-02-24 02:31:07'),
(523, 142, 147, 'Cash receipts', 'Cash receipts', '2020-02-24', 205, 40, 0, NULL, 0, '2020-02-24 02:31:08', '2020-02-24 02:31:08'),
(524, 142, 148, 'Programs', 'Programs', '2020-02-24', 205, 40, 0, NULL, 0, '2020-02-24 02:31:08', '2020-02-24 02:31:08'),
(525, 142, 149, 'Name badges', 'Name badges', '2020-02-24', 205, 40, 0, NULL, 0, '2020-02-24 02:31:08', '2020-02-24 02:31:08'),
(526, 142, 150, 'Goodie Bags', 'Goodie Bags', '2020-02-24', 205, 40, 0, NULL, 0, '2020-02-24 02:31:08', '2020-02-24 02:31:08'),
(527, 142, 151, 'Ticket sales', 'Ticket sales', '2020-02-24', 205, 40, 0, NULL, 0, '2020-02-24 02:31:08', '2020-02-24 02:31:08'),
(528, 142, 152, 'Host identification', 'Host identification', '2020-02-24', 205, 40, 0, NULL, 0, '2020-02-24 02:31:08', '2020-02-24 02:31:08'),
(529, 142, 153, 'Venue signage', 'Venue signage', '2020-02-24', 205, 40, 0, NULL, 0, '2020-02-24 02:31:08', '2020-02-24 02:31:08'),
(530, 154, 155, 'For equipment', 'For equipment', '2020-02-24', 206, 40, 0, NULL, 0, '2020-02-24 02:31:08', '2020-02-24 02:31:08'),
(531, 154, 156, 'Lease or charter vehicles', 'Lease or charter vehicles', '2020-02-24', 206, 40, 0, NULL, 0, '2020-02-24 02:31:08', '2020-02-24 02:31:08'),
(532, 154, 157, 'To and from parking areas', 'To and from parking areas', '2020-02-24', 206, 40, 0, NULL, 0, '2020-02-24 02:31:08', '2020-02-24 02:31:08'),
(533, 154, 158, 'For speakers & special guests', 'For speakers & special guests', '2020-02-24', 206, 40, 0, NULL, 0, '2020-02-24 02:31:08', '2020-02-24 02:31:08'),
(534, 154, 159, 'Between locations', 'Between locations', '2020-02-24', 206, 40, 0, NULL, 0, '2020-02-24 02:31:08', '2020-02-24 02:31:08'),
(535, 154, 160, 'Signs on vehicles', 'Signs on vehicles', '2020-02-24', 206, 40, 0, NULL, 0, '2020-02-24 02:31:08', '2020-02-24 02:31:08'),
(536, 154, 161, 'Publish or post schedules', 'Publish or post schedules', '2020-02-24', 206, 40, 0, NULL, 0, '2020-02-24 02:31:08', '2020-02-24 02:31:08'),
(537, 162, 163, 'For speakers', 'For speakers', '2020-02-24', 207, 40, 0, NULL, 0, '2020-02-24 02:31:08', '2020-02-24 02:31:08'),
(538, 162, 164, 'For special guests', 'For special guests', '2020-02-24', 207, 40, 0, NULL, 0, '2020-02-24 02:31:08', '2020-02-24 02:31:08'),
(539, 162, 165, 'For tours, exhibits, etc.', 'For tours, exhibits, etc.', '2020-02-24', 207, 40, 0, NULL, 0, '2020-02-24 02:31:08', '2020-02-24 02:31:08'),
(540, 162, 166, 'Aboard shuttles / buses when needed', 'Aboard shuttles / buses when needed', '2020-02-24', 207, 40, 0, NULL, 0, '2020-02-24 02:31:09', '2020-02-24 02:31:09'),
(541, 167, 168, 'Set the theme', 'Set the theme', '2020-02-24', 208, 40, 0, NULL, 0, '2020-02-24 02:31:09', '2020-02-24 02:31:09'),
(542, 167, 169, 'Entrances and exits', 'Entrances and exits', '2020-02-24', 208, 40, 0, NULL, 0, '2020-02-24 02:31:09', '2020-02-24 02:31:09'),
(543, 167, 170, 'Speaker platform', 'Speaker platform', '2020-02-24', 208, 40, 0, NULL, 0, '2020-02-24 02:31:09', '2020-02-24 02:31:09'),
(544, 167, 171, 'Head tables', 'Head tables', '2020-02-24', 208, 40, 0, NULL, 0, '2020-02-24 02:31:09', '2020-02-24 02:31:09'),
(545, 167, 172, 'Dining tables', 'Dining tables', '2020-02-24', 208, 40, 0, NULL, 0, '2020-02-24 02:31:09', '2020-02-24 02:31:09'),
(546, 167, 173, 'Hospitality suite', 'Hospitality suite', '2020-02-24', 208, 40, 0, NULL, 0, '2020-02-24 02:31:09', '2020-02-24 02:31:09'),
(547, 174, 175, 'Prices', 'Prices', '2020-02-24', 209, 40, 0, NULL, 0, '2020-02-24 02:31:09', '2020-02-24 02:31:09'),
(548, 174, 176, 'Advance sales', 'Advance sales', '2020-02-24', 209, 40, 0, NULL, 0, '2020-02-24 02:31:09', '2020-02-24 02:31:09'),
(549, 174, 177, 'Printing', 'Printing', '2020-02-24', 209, 40, 0, NULL, 0, '2020-02-24 02:31:09', '2020-02-24 02:31:09'),
(550, 174, 178, 'Distribution', 'Distribution', '2020-02-24', 209, 40, 0, NULL, 0, '2020-02-24 02:31:09', '2020-02-24 02:31:09'),
(551, 174, 179, 'Sales reports', 'Sales reports', '2020-02-24', 209, 40, 0, NULL, 0, '2020-02-24 02:31:09', '2020-02-24 02:31:09'),
(552, 174, 180, 'Ticket and money control', 'Ticket and money control', '2020-02-24', 209, 40, 0, NULL, 0, '2020-02-24 02:31:09', '2020-02-24 02:31:09'),
(553, 174, 181, 'Complimentary tickets', 'Complimentary tickets', '2020-02-24', 209, 40, 0, NULL, 0, '2020-02-24 02:31:09', '2020-02-24 02:31:09'),
(554, 174, 182, 'Press tickets', 'Press tickets', '2020-02-24', 209, 40, 0, NULL, 0, '2020-02-24 02:31:09', '2020-02-24 02:31:09'),
(555, 174, 183, 'Sales at doors', 'Sales at doors', '2020-02-24', 209, 40, 0, NULL, 0, '2020-02-24 02:31:09', '2020-02-24 02:31:09'),
(556, 174, 184, 'Collection at events', 'Collection at events', '2020-02-24', 209, 40, 0, NULL, 0, '2020-02-24 02:31:09', '2020-02-24 02:31:09'),
(557, 185, 186, 'Valet parking', 'Valet parking', '2020-02-24', 210, 40, 0, NULL, 0, '2020-02-24 02:31:10', '2020-02-24 02:31:10'),
(558, 185, 187, 'Bad weather planning', 'Bad weather planning', '2020-02-24', 210, 40, 0, NULL, 0, '2020-02-24 02:31:10', '2020-02-24 02:31:10'),
(559, 185, 188, 'Exhibits, displays', 'Exhibits, displays', '2020-02-24', 210, 40, 0, NULL, 0, '2020-02-24 02:31:10', '2020-02-24 02:31:10'),
(560, 185, 189, 'Security', 'Security', '2020-02-24', 210, 40, 0, NULL, 0, '2020-02-24 02:31:10', '2020-02-24 02:31:10'),
(561, 185, 190, 'Technicians for equipment', 'Technicians for equipment', '2020-02-24', 210, 40, 0, NULL, 0, '2020-02-24 02:31:10', '2020-02-24 02:31:10'),
(562, 185, 191, 'Disaster management', 'Disaster management', '2020-02-24', 210, 40, 0, NULL, 0, '2020-02-24 02:31:10', '2020-02-24 02:31:10'),
(563, 185, 192, 'Ambulance on stand-by', 'Ambulance on stand-by', '2020-02-24', 210, 40, 0, NULL, 0, '2020-02-24 02:31:10', '2020-02-24 02:31:10'),
(564, 185, 193, 'Police, traffic control, security', 'Police, traffic control, security', '2020-02-24', 210, 40, 0, NULL, 0, '2020-02-24 02:31:10', '2020-02-24 02:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `orderID` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `amount` double NOT NULL DEFAULT '0',
  `payment_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance_transaction` longtext COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0',
  `billing_address` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderID`, `user_id`, `amount`, `payment_by`, `balance_transaction`, `status`, `billing_address`, `created_at`, `updated_at`) VALUES
(2, '#ENV1581492730', 32, 516.63, 'STRIPE', '{"35":{"vendor_id":35,"total":516.63,"sum":500,"amount":500,"tax":6.63,"commission_fee":10,"service_fee":10,"payable_amount":480,"account_id":null,"stripeAccountParams":{"amount":480,"stripe_account":null}}}', 1, '{"name":"Narinder Singh","email":"admin@printgenie.com","phone_number":"4158464500","address":"Benjamin Franklin Road","country":"United States","state":"NJ","city":"Lawrence Township","zipcode":"08648","latitude":"40.2832392","longitude":"-74.720687","country_short_code":"US","tax":6.63}', '2020-02-12 02:02:11', '2020-02-12 02:02:11'),
(3, '#ENV1582167109', 32, 2049.25, 'STRIPE', '{"1":{"vendor_id":1,"total":2049.25,"sum":2000,"amount":2000,"tax":9.25,"commission_fee":60,"service_fee":40,"payable_amount":1900,"account_id":"photostripe@gmail.com","stripeAccountParams":{"amount":1900,"stripe_account":"photostripe@gmail.com"}}}', 1, '{"name":"Narinder Singh","email":"admin@printgenie.com","phone_number":"4158464500","address":"Broadway","country":"United States","state":"NY","city":"New York","zipcode":"95134","latitude":"40.7186342","longitude":"-74.0025412","country_short_code":"US","tax":9.25}', '2020-02-20 09:21:51', '2020-02-20 09:21:51');

-- --------------------------------------------------------

--
-- Table structure for table `package_meta_datas`
--

CREATE TABLE `package_meta_datas` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_meta_datas`
--

INSERT INTO `package_meta_datas` (`id`, `parent`, `package_id`, `category_id`, `user_id`, `type`, `key`, `key_value`, `created_at`, `updated_at`) VALUES
(125, 0, 3, 1, 42, 'amenities', 'amenity', '6', '2019-11-20 03:38:58', '2019-11-20 03:38:58'),
(126, 0, 3, 1, 42, 'amenities', 'amenity', '8', '2019-11-20 03:38:58', '2019-11-20 03:38:58'),
(127, 0, 3, 1, 42, 'events', 'event', '2', '2019-11-20 03:38:58', '2019-11-20 03:38:58'),
(128, 0, 3, 1, 42, 'events', 'event', '3', '2019-11-20 03:38:58', '2019-11-20 03:38:58'),
(129, 0, 3, 1, 42, 'addons', 'Collage Family', '5', '2019-11-20 03:40:34', '2019-11-20 03:40:34'),
(202, 0, 12, 20, 34, 'amenities', 'amenity', '10', '2019-11-26 02:06:40', '2019-11-26 02:06:40'),
(203, 0, 12, 20, 34, 'games', 'game', '4', '2019-11-26 02:06:40', '2019-11-26 02:06:40'),
(204, 0, 12, 20, 34, 'events', 'event', '1', '2019-11-26 02:06:40', '2019-11-26 02:06:40'),
(251, 0, 19, 1, 44, 'amenities', 'amenity', '10', '2019-11-26 07:42:27', '2019-11-26 07:42:27'),
(252, 0, 19, 1, 44, 'amenities', 'amenity', '11', '2019-11-26 07:42:27', '2019-11-26 07:42:27'),
(253, 0, 19, 1, 44, 'games', 'game', '4', '2019-11-26 07:42:28', '2019-11-26 07:42:28'),
(254, 0, 19, 1, 44, 'games', 'game', '7', '2019-11-26 07:42:28', '2019-11-26 07:42:28'),
(255, 0, 19, 1, 44, 'games', 'game', '12', '2019-11-26 07:42:28', '2019-11-26 07:42:28'),
(256, 0, 19, 1, 44, 'events', 'event', '2', '2019-11-26 07:42:28', '2019-11-26 07:42:28'),
(257, 0, 19, 1, 44, 'events', 'event', '3', '2019-11-26 07:42:28', '2019-11-26 07:42:28'),
(265, 0, 20, 25, 34, 'amenities', 'amenity', '11', '2019-11-27 01:38:21', '2019-11-27 01:38:21'),
(266, 0, 20, 25, 34, 'games', 'game', '7', '2019-11-27 01:38:21', '2019-11-27 01:38:21'),
(267, 0, 20, 25, 34, 'events', 'event', '2', '2019-11-27 01:38:21', '2019-11-27 01:38:21'),
(268, 0, 20, 25, 34, 'addons', 'tt', '52', '2019-11-27 01:38:34', '2019-11-27 01:38:34'),
(269, 0, 21, 11, 34, 'amenities', 'amenity', '10', '2019-11-27 02:20:44', '2019-11-27 02:20:44'),
(270, 0, 21, 11, 34, 'games', 'game', '4', '2019-11-27 02:20:44', '2019-11-27 02:20:44'),
(271, 0, 21, 11, 34, 'games', 'game', '7', '2019-11-27 02:20:44', '2019-11-27 02:20:44'),
(272, 0, 21, 11, 34, 'events', 'event', '1', '2019-11-27 02:20:44', '2019-11-27 02:20:44'),
(273, 0, 21, 11, 34, 'events', 'event', '3', '2019-11-27 02:20:44', '2019-11-27 02:20:44'),
(322, 0, 26, 11, 42, 'amenities', 'amenity', '11', '2019-12-05 10:23:28', '2019-12-05 10:23:28'),
(323, 0, 26, 11, 42, 'games', 'game', '12', '2019-12-05 10:23:28', '2019-12-05 10:23:28'),
(324, 0, 26, 11, 42, 'events', 'event', '6', '2019-12-05 10:23:28', '2019-12-05 10:23:28'),
(325, 0, 26, 11, 42, 'events', 'event', '11', '2019-12-05 10:23:28', '2019-12-05 10:23:28'),
(326, 0, 30, 35, 59, 'addons', 'Add On for one Large Portrait', '10', '2019-12-09 03:22:18', '2019-12-09 03:22:18'),
(330, 0, 32, 16, 34, 'amenities', 'amenity', '8', '2019-12-09 04:17:15', '2019-12-09 04:17:15'),
(331, 0, 32, 16, 34, 'amenities', 'amenity', '9', '2019-12-09 04:17:15', '2019-12-09 04:17:15'),
(332, 0, 32, 16, 34, 'games', 'game', '7', '2019-12-09 04:17:15', '2019-12-09 04:17:15'),
(333, 0, 32, 16, 34, 'events', 'event', '2', '2019-12-09 04:17:15', '2019-12-09 04:17:15'),
(334, 0, 33, 16, 34, 'amenities', 'amenity', '6', '2019-12-09 04:18:07', '2019-12-09 04:18:07'),
(335, 0, 33, 16, 34, 'games', 'game', '13', '2019-12-09 04:18:08', '2019-12-09 04:18:08'),
(336, 0, 33, 16, 34, 'events', 'event', '1', '2019-12-09 04:18:08', '2019-12-09 04:18:08'),
(337, 0, 32, 16, 34, 'addons', 'my', '25', '2019-12-09 04:25:33', '2019-12-09 04:25:33'),
(338, 0, 33, 16, 34, 'addons', 'new add', '20', '2019-12-09 04:25:44', '2019-12-09 04:25:44'),
(339, 0, 31, 35, 59, 'addons', 'Add On for two Large Portrait', '50', '2019-12-09 04:26:39', '2019-12-09 04:26:39'),
(345, 0, 36, 1, 59, 'amenities', 'amenity', '11', '2019-12-09 04:59:45', '2019-12-09 04:59:45'),
(346, 0, 36, 1, 59, 'games', 'game', '7', '2019-12-09 04:59:45', '2019-12-09 04:59:45'),
(347, 0, 36, 1, 59, 'events', 'event', '2', '2019-12-09 04:59:45', '2019-12-09 04:59:45'),
(348, 0, 36, 1, 59, 'events', 'event', '3', '2019-12-09 04:59:45', '2019-12-09 04:59:45'),
(349, 0, 37, 1, 59, 'amenities', 'amenity', '10', '2019-12-09 05:01:54', '2019-12-09 05:01:54'),
(350, 0, 37, 1, 59, 'games', 'game', '12', '2019-12-09 05:01:54', '2019-12-09 05:01:54'),
(351, 0, 37, 1, 59, 'events', 'event', '3', '2019-12-09 05:01:54', '2019-12-09 05:01:54'),
(364, 0, 11, 1, 42, 'amenities', 'amenity', '10', '2019-12-10 04:14:15', '2019-12-10 04:14:15'),
(365, 0, 11, 1, 42, 'amenities', 'amenity', '11', '2019-12-10 04:14:15', '2019-12-10 04:14:15'),
(366, 0, 11, 1, 42, 'games', 'game', '4', '2019-12-10 04:14:15', '2019-12-10 04:14:15'),
(367, 0, 11, 1, 42, 'games', 'game', '7', '2019-12-10 04:14:15', '2019-12-10 04:14:15'),
(368, 0, 11, 1, 42, 'events', 'event', '2', '2019-12-10 04:14:15', '2019-12-10 04:14:15'),
(369, 0, 11, 1, 42, 'events', 'event', '3', '2019-12-10 04:14:15', '2019-12-10 04:14:15'),
(373, 0, 39, 20, 34, 'amenities', 'amenity', '11', '2019-12-12 06:05:04', '2019-12-12 06:05:04'),
(374, 0, 39, 20, 34, 'games', 'game', '7', '2019-12-12 06:05:04', '2019-12-12 06:05:04'),
(375, 0, 39, 20, 34, 'events', 'event', '1', '2019-12-12 06:05:04', '2019-12-12 06:05:04'),
(378, 0, 40, 20, 34, 'events', 'event', '1', '2019-12-12 06:22:40', '2019-12-12 06:22:40'),
(379, 0, 36, 1, 59, 'addons', 'Patch with Dress', '10', '2019-12-13 03:43:15', '2019-12-13 03:43:15'),
(380, 0, 36, 1, 59, 'addons', 'Patch with Two Dress', '20', '2019-12-13 03:43:16', '2019-12-13 03:43:16'),
(381, 0, 40, 20, 34, 'addons', 'cookies', '20', '2019-12-13 08:44:59', '2019-12-13 08:44:59'),
(424, 0, 41, 1, 34, 'amenities', 'amenity', '6', '2019-12-17 05:56:51', '2019-12-17 05:56:51'),
(425, 0, 41, 1, 34, 'amenities', 'amenity', '10', '2019-12-17 05:56:51', '2019-12-17 05:56:51'),
(426, 0, 41, 1, 34, 'amenities', 'amenity', '11', '2019-12-17 05:56:51', '2019-12-17 05:56:51'),
(427, 0, 41, 1, 34, 'amenities', 'amenity', '15', '2019-12-17 05:56:51', '2019-12-17 05:56:51'),
(428, 0, 41, 1, 34, 'games', 'game', '4', '2019-12-17 05:56:51', '2019-12-17 05:56:51'),
(429, 0, 41, 1, 34, 'games', 'game', '7', '2019-12-17 05:56:51', '2019-12-17 05:56:51'),
(430, 0, 41, 1, 34, 'events', 'event', '5', '2019-12-17 05:56:51', '2019-12-17 05:56:51'),
(447, 0, 42, 11, 59, 'addons', '5 Extra Person', '10', '2019-12-23 07:50:33', '2019-12-23 07:50:33'),
(460, NULL, 1, 1, 31, 'amenities', 'amenity', '6', '2019-12-23 09:35:54', '2019-12-23 09:35:54'),
(461, NULL, 1, 1, 31, 'amenities', 'amenity', '11', '2019-12-23 09:35:54', '2019-12-23 09:35:54'),
(462, NULL, 1, 1, 31, 'amenities', 'amenity', '15', '2019-12-23 09:35:54', '2019-12-23 09:35:54'),
(463, NULL, 1, 1, 31, 'games', 'game', '4', '2019-12-23 09:35:54', '2019-12-23 09:35:54'),
(464, NULL, 1, 1, 31, 'games', 'game', '12', '2019-12-23 09:35:54', '2019-12-23 09:35:54'),
(465, NULL, 1, 1, 31, 'games', 'game', '16', '2019-12-23 09:35:54', '2019-12-23 09:35:54'),
(466, NULL, 1, 1, 31, 'events', 'event', '3', '2019-12-23 09:35:54', '2019-12-23 09:35:54'),
(467, NULL, 1, 1, 31, 'events', 'event', '5', '2019-12-23 09:35:55', '2019-12-23 09:35:55'),
(468, NULL, 1, 1, 31, 'events', 'event', '6', '2019-12-23 09:35:55', '2019-12-23 09:35:55'),
(484, NULL, 43, 11, 31, 'amenities', 'amenity', '6', '2019-12-23 09:41:21', '2019-12-23 09:41:21'),
(485, NULL, 43, 11, 31, 'amenities', 'amenity', '10', '2019-12-23 09:41:21', '2019-12-23 09:41:21'),
(486, NULL, 43, 11, 31, 'amenities', 'amenity', '11', '2019-12-23 09:41:21', '2019-12-23 09:41:21'),
(487, NULL, 43, 11, 31, 'amenities', 'amenity', '15', '2019-12-23 09:41:22', '2019-12-23 09:41:22'),
(488, NULL, 43, 11, 31, 'games', 'game', '4', '2019-12-23 09:41:22', '2019-12-23 09:41:22'),
(489, NULL, 43, 11, 31, 'games', 'game', '7', '2019-12-23 09:41:22', '2019-12-23 09:41:22'),
(490, NULL, 43, 11, 31, 'games', 'game', '12', '2019-12-23 09:41:22', '2019-12-23 09:41:22'),
(491, NULL, 43, 11, 31, 'games', 'game', '16', '2019-12-23 09:41:22', '2019-12-23 09:41:22'),
(492, NULL, 43, 11, 31, 'events', 'event', '2', '2019-12-23 09:41:22', '2019-12-23 09:41:22'),
(493, NULL, 43, 11, 31, 'events', 'event', '3', '2019-12-23 09:41:22', '2019-12-23 09:41:22'),
(494, NULL, 43, 11, 31, 'events', 'event', '5', '2019-12-23 09:41:22', '2019-12-23 09:41:22'),
(495, NULL, 43, 11, 31, 'events', 'event', '6', '2019-12-23 09:41:22', '2019-12-23 09:41:22'),
(496, NULL, 43, 11, 31, 'events', 'event', '10', '2019-12-23 09:41:22', '2019-12-23 09:41:22'),
(497, NULL, 43, 11, 31, 'events', 'event', '11', '2019-12-23 09:41:22', '2019-12-23 09:41:22'),
(498, NULL, 43, 11, 31, 'events', 'event', '17', '2019-12-23 09:41:22', '2019-12-23 09:41:22'),
(515, NULL, 44, 20, 44, 'events', 'event', '2', '2019-12-24 04:31:13', '2019-12-24 04:31:13'),
(516, NULL, 44, 20, 44, 'events', 'event', '3', '2019-12-24 04:31:13', '2019-12-24 04:31:13'),
(517, NULL, 44, 20, 44, 'events', 'event', '5', '2019-12-24 04:31:13', '2019-12-24 04:31:13'),
(518, NULL, 44, 20, 44, 'events', 'event', '6', '2019-12-24 04:31:13', '2019-12-24 04:31:13'),
(519, NULL, 44, 20, 44, 'events', 'event', '11', '2019-12-24 04:31:13', '2019-12-24 04:31:13'),
(520, NULL, 44, 20, 44, 'events', 'event', '17', '2019-12-24 04:31:13', '2019-12-24 04:31:13'),
(529, NULL, 15, 20, 44, 'amenities', 'amenity', '10', '2019-12-24 04:33:24', '2019-12-24 04:33:24'),
(530, NULL, 15, 20, 44, 'games', 'game', '4', '2019-12-24 04:33:25', '2019-12-24 04:33:25'),
(531, NULL, 15, 20, 44, 'events', 'event', '2', '2019-12-24 04:33:25', '2019-12-24 04:33:25'),
(532, NULL, 15, 20, 44, 'events', 'event', '3', '2019-12-24 04:33:25', '2019-12-24 04:33:25'),
(533, NULL, 15, 20, 44, 'events', 'event', '5', '2019-12-24 04:33:25', '2019-12-24 04:33:25'),
(534, NULL, 15, 20, 44, 'events', 'event', '6', '2019-12-24 04:33:25', '2019-12-24 04:33:25'),
(535, NULL, 15, 20, 44, 'events', 'event', '11', '2019-12-24 04:33:25', '2019-12-24 04:33:25'),
(536, NULL, 15, 20, 44, 'events', 'event', '17', '2019-12-24 04:33:25', '2019-12-24 04:33:25'),
(589, NULL, 40, 20, 34, 'amenities', 'amenity', '11', '2019-12-26 01:47:11', '2019-12-26 01:47:11'),
(590, NULL, 40, 20, 34, 'games', 'game', '7', '2019-12-26 01:47:11', '2019-12-26 01:47:11'),
(647, NULL, 45, 11, 44, 'amenities', 'amenity', '6', '2019-12-31 02:12:30', '2019-12-31 02:12:30'),
(648, NULL, 45, 11, 44, 'amenities', 'amenity', '11', '2019-12-31 02:12:30', '2019-12-31 02:12:30'),
(649, NULL, 45, 11, 44, 'amenities', 'amenity', '15', '2019-12-31 02:12:30', '2019-12-31 02:12:30'),
(650, NULL, 45, 11, 44, 'games', 'game', '4', '2019-12-31 02:12:31', '2019-12-31 02:12:31'),
(651, NULL, 45, 11, 44, 'games', 'game', '7', '2019-12-31 02:12:31', '2019-12-31 02:12:31'),
(652, NULL, 45, 11, 44, 'games', 'game', '12', '2019-12-31 02:12:31', '2019-12-31 02:12:31'),
(653, NULL, 45, 11, 44, 'events', 'event', '2', '2019-12-31 02:12:31', '2019-12-31 02:12:31'),
(654, NULL, 45, 11, 44, 'events', 'event', '3', '2019-12-31 02:12:31', '2019-12-31 02:12:31'),
(655, NULL, 45, 11, 44, 'events', 'event', '5', '2019-12-31 02:12:31', '2019-12-31 02:12:31'),
(656, NULL, 45, 11, 44, 'events', 'event', '6', '2019-12-31 02:12:31', '2019-12-31 02:12:31'),
(657, NULL, 45, 11, 44, 'events', 'event', '10', '2019-12-31 02:12:31', '2019-12-31 02:12:31'),
(658, NULL, 45, 11, 44, 'events', 'event', '11', '2019-12-31 02:12:31', '2019-12-31 02:12:31'),
(659, NULL, 45, 11, 44, 'events', 'event', '17', '2019-12-31 02:12:31', '2019-12-31 02:12:31'),
(712, NULL, 50, 11, 44, 'amenities', 'amenity', '6', '2019-12-31 03:35:16', '2019-12-31 03:35:16'),
(713, NULL, 50, 11, 44, 'amenities', 'amenity', '11', '2019-12-31 03:35:16', '2019-12-31 03:35:16'),
(714, NULL, 50, 11, 44, 'amenities', 'amenity', '15', '2019-12-31 03:35:16', '2019-12-31 03:35:16'),
(715, NULL, 50, 11, 44, 'games', 'game', '4', '2019-12-31 03:35:17', '2019-12-31 03:35:17'),
(716, NULL, 50, 11, 44, 'games', 'game', '7', '2019-12-31 03:35:17', '2019-12-31 03:35:17'),
(717, NULL, 50, 11, 44, 'games', 'game', '12', '2019-12-31 03:35:17', '2019-12-31 03:35:17'),
(718, NULL, 50, 11, 44, 'events', 'event', '2', '2019-12-31 03:35:17', '2019-12-31 03:35:17'),
(719, NULL, 50, 11, 44, 'events', 'event', '3', '2019-12-31 03:35:17', '2019-12-31 03:35:17'),
(720, NULL, 50, 11, 44, 'events', 'event', '6', '2019-12-31 03:35:17', '2019-12-31 03:35:17'),
(721, NULL, 50, 11, 44, 'events', 'event', '11', '2019-12-31 03:35:17', '2019-12-31 03:35:17'),
(722, NULL, 42, 11, 59, 'amenities', 'amenity', '11', '2020-01-06 04:33:30', '2020-01-06 04:33:30'),
(723, NULL, 42, 11, 59, 'amenities', 'amenity', '15', '2020-01-06 04:33:30', '2020-01-06 04:33:30'),
(724, NULL, 42, 11, 59, 'games', 'game', '12', '2020-01-06 04:33:30', '2020-01-06 04:33:30'),
(725, NULL, 42, 11, 59, 'events', 'event', '2', '2020-01-06 04:33:31', '2020-01-06 04:33:31'),
(726, NULL, 42, 11, 59, 'events', 'event', '3', '2020-01-06 04:33:31', '2020-01-06 04:33:31'),
(727, NULL, 42, 11, 59, 'events', 'event', '5', '2020-01-06 04:33:31', '2020-01-06 04:33:31'),
(728, NULL, 42, 11, 59, 'events', 'event', '6', '2020-01-06 04:33:31', '2020-01-06 04:33:31'),
(729, NULL, 42, 11, 59, 'events', 'event', '10', '2020-01-06 04:33:31', '2020-01-06 04:33:31'),
(730, NULL, 42, 11, 59, 'events', 'event', '11', '2020-01-06 04:33:31', '2020-01-06 04:33:31'),
(731, NULL, 42, 11, 59, 'events', 'event', '17', '2020-01-06 04:33:31', '2020-01-06 04:33:31'),
(732, NULL, 47, 1, 31, 'amenities', 'amenity', '6', '2020-01-08 04:01:03', '2020-01-08 04:01:03'),
(733, NULL, 47, 1, 31, 'amenities', 'amenity', '11', '2020-01-08 04:01:03', '2020-01-08 04:01:03'),
(734, NULL, 47, 1, 31, 'amenities', 'amenity', '15', '2020-01-08 04:01:03', '2020-01-08 04:01:03'),
(735, NULL, 47, 1, 31, 'games', 'game', '4', '2020-01-08 04:01:03', '2020-01-08 04:01:03'),
(736, NULL, 47, 1, 31, 'games', 'game', '12', '2020-01-08 04:01:03', '2020-01-08 04:01:03'),
(737, NULL, 47, 1, 31, 'events', 'event', '2', '2020-01-08 04:01:03', '2020-01-08 04:01:03'),
(738, NULL, 47, 1, 31, 'events', 'event', '3', '2020-01-08 04:01:03', '2020-01-08 04:01:03'),
(739, NULL, 47, 1, 31, 'events', 'event', '5', '2020-01-08 04:01:03', '2020-01-08 04:01:03'),
(740, NULL, 47, 1, 31, 'events', 'event', '6', '2020-01-08 04:01:03', '2020-01-08 04:01:03'),
(741, NULL, 47, 1, 31, 'events', 'event', '11', '2020-01-08 04:01:03', '2020-01-08 04:01:03'),
(742, NULL, 47, 1, 31, 'events', 'event', '17', '2020-01-08 04:01:03', '2020-01-08 04:01:03'),
(743, 0, 53, 1, 31, 'amenities', 'amenity', '6', '2020-01-14 04:35:34', '2020-01-14 04:35:34'),
(744, 0, 53, 1, 31, 'amenities', 'amenity', '11', '2020-01-14 04:35:34', '2020-01-14 04:35:34'),
(745, 0, 53, 1, 31, 'amenities', 'amenity', '15', '2020-01-14 04:35:35', '2020-01-14 04:35:35'),
(746, 0, 53, 1, 31, 'games', 'game', '4', '2020-01-14 04:35:35', '2020-01-14 04:35:35'),
(747, 0, 53, 1, 31, 'games', 'game', '12', '2020-01-14 04:35:35', '2020-01-14 04:35:35'),
(748, 0, 53, 1, 31, 'events', 'event', '2', '2020-01-14 04:35:35', '2020-01-14 04:35:35'),
(749, 0, 53, 1, 31, 'events', 'event', '3', '2020-01-14 04:35:35', '2020-01-14 04:35:35'),
(750, 0, 53, 1, 31, 'events', 'event', '5', '2020-01-14 04:35:35', '2020-01-14 04:35:35'),
(751, 0, 53, 1, 31, 'events', 'event', '6', '2020-01-14 04:35:35', '2020-01-14 04:35:35'),
(752, 0, 53, 1, 31, 'events', 'event', '11', '2020-01-14 04:35:35', '2020-01-14 04:35:35'),
(753, 0, 53, 1, 31, 'events', 'event', '17', '2020-01-14 04:35:35', '2020-01-14 04:35:35'),
(754, 0, 54, 1, 31, 'amenities', 'amenity', '6', '2020-01-14 04:36:35', '2020-01-14 04:36:35'),
(755, 0, 54, 1, 31, 'amenities', 'amenity', '11', '2020-01-14 04:36:36', '2020-01-14 04:36:36'),
(756, 0, 54, 1, 31, 'amenities', 'amenity', '15', '2020-01-14 04:36:36', '2020-01-14 04:36:36'),
(757, 0, 54, 1, 31, 'games', 'game', '4', '2020-01-14 04:36:36', '2020-01-14 04:36:36'),
(758, 0, 54, 1, 31, 'games', 'game', '12', '2020-01-14 04:36:36', '2020-01-14 04:36:36'),
(759, 0, 54, 1, 31, 'events', 'event', '2', '2020-01-14 04:36:36', '2020-01-14 04:36:36'),
(760, 0, 54, 1, 31, 'events', 'event', '3', '2020-01-14 04:36:36', '2020-01-14 04:36:36'),
(761, 0, 54, 1, 31, 'events', 'event', '5', '2020-01-14 04:36:36', '2020-01-14 04:36:36'),
(762, 0, 54, 1, 31, 'events', 'event', '6', '2020-01-14 04:36:36', '2020-01-14 04:36:36'),
(763, 0, 54, 1, 31, 'events', 'event', '11', '2020-01-14 04:36:36', '2020-01-14 04:36:36'),
(764, 0, 54, 1, 31, 'events', 'event', '17', '2020-01-14 04:36:36', '2020-01-14 04:36:36'),
(765, 0, 55, 1, 31, 'amenities', 'amenity', '6', '2020-01-14 04:55:27', '2020-01-14 04:55:27'),
(766, 0, 55, 1, 31, 'amenities', 'amenity', '11', '2020-01-14 04:55:27', '2020-01-14 04:55:27'),
(767, 0, 55, 1, 31, 'games', 'game', '4', '2020-01-14 04:55:27', '2020-01-14 04:55:27'),
(768, 0, 55, 1, 31, 'games', 'game', '12', '2020-01-14 04:55:27', '2020-01-14 04:55:27'),
(769, 0, 55, 1, 31, 'events', 'event', '2', '2020-01-14 04:55:27', '2020-01-14 04:55:27'),
(770, 0, 55, 1, 31, 'events', 'event', '3', '2020-01-14 04:55:27', '2020-01-14 04:55:27'),
(771, 0, 55, 1, 31, 'events', 'event', '5', '2020-01-14 04:55:27', '2020-01-14 04:55:27'),
(772, 0, 55, 1, 31, 'events', 'event', '11', '2020-01-14 04:55:27', '2020-01-14 04:55:27'),
(773, 0, 55, 1, 31, 'events', 'event', '17', '2020-01-14 04:55:27', '2020-01-14 04:55:27'),
(774, 0, 56, 11, 31, 'amenities', 'amenity', '6', '2020-01-15 06:38:51', '2020-01-15 06:38:51'),
(775, 0, 56, 11, 31, 'amenities', 'amenity', '11', '2020-01-15 06:38:51', '2020-01-15 06:38:51'),
(776, 0, 56, 11, 31, 'amenities', 'amenity', '15', '2020-01-15 06:38:51', '2020-01-15 06:38:51'),
(777, 0, 56, 11, 31, 'games', 'game', '4', '2020-01-15 06:38:51', '2020-01-15 06:38:51'),
(778, 0, 56, 11, 31, 'games', 'game', '12', '2020-01-15 06:38:51', '2020-01-15 06:38:51'),
(779, 0, 56, 11, 31, 'events', 'event', '2', '2020-01-15 06:38:51', '2020-01-15 06:38:51'),
(780, 0, 56, 11, 31, 'events', 'event', '3', '2020-01-15 06:38:51', '2020-01-15 06:38:51'),
(781, 0, 56, 11, 31, 'events', 'event', '5', '2020-01-15 06:38:51', '2020-01-15 06:38:51'),
(782, 0, 56, 11, 31, 'events', 'event', '6', '2020-01-15 06:38:51', '2020-01-15 06:38:51'),
(783, 0, 56, 11, 31, 'events', 'event', '10', '2020-01-15 06:38:52', '2020-01-15 06:38:52'),
(784, 0, 56, 11, 31, 'events', 'event', '11', '2020-01-15 06:38:52', '2020-01-15 06:38:52'),
(785, 0, 56, 11, 31, 'events', 'event', '17', '2020-01-15 06:38:52', '2020-01-15 06:38:52'),
(786, 0, 57, 11, 31, 'amenities', 'amenity', '6', '2020-01-15 06:45:13', '2020-01-15 06:45:13'),
(787, 0, 57, 11, 31, 'amenities', 'amenity', '11', '2020-01-15 06:45:13', '2020-01-15 06:45:13'),
(788, 0, 57, 11, 31, 'amenities', 'amenity', '15', '2020-01-15 06:45:13', '2020-01-15 06:45:13'),
(789, 0, 57, 11, 31, 'games', 'game', '4', '2020-01-15 06:45:13', '2020-01-15 06:45:13'),
(790, 0, 57, 11, 31, 'games', 'game', '7', '2020-01-15 06:45:13', '2020-01-15 06:45:13'),
(791, 0, 57, 11, 31, 'games', 'game', '12', '2020-01-15 06:45:13', '2020-01-15 06:45:13'),
(792, 0, 57, 11, 31, 'events', 'event', '2', '2020-01-15 06:45:13', '2020-01-15 06:45:13'),
(793, 0, 57, 11, 31, 'events', 'event', '3', '2020-01-15 06:45:13', '2020-01-15 06:45:13'),
(794, 0, 57, 11, 31, 'events', 'event', '5', '2020-01-15 06:45:13', '2020-01-15 06:45:13'),
(795, 0, 57, 11, 31, 'events', 'event', '6', '2020-01-15 06:45:13', '2020-01-15 06:45:13'),
(796, 0, 57, 11, 31, 'events', 'event', '10', '2020-01-15 06:45:13', '2020-01-15 06:45:13'),
(797, 0, 57, 11, 31, 'events', 'event', '11', '2020-01-15 06:45:13', '2020-01-15 06:45:13'),
(798, 0, 57, 11, 31, 'events', 'event', '17', '2020-01-15 06:45:14', '2020-01-15 06:45:14');

-- --------------------------------------------------------

--
-- Table structure for table `page_meta_tags`
--

CREATE TABLE `page_meta_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent` int(11) NOT NULL,
  `key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyValue` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_meta_tags`
--

INSERT INTO `page_meta_tags` (`id`, `parent`, `key`, `keyValue`, `type`, `title`, `created_at`, `updated_at`) VALUES
(2, 0, '', '', 'homepage', 'Home', '2019-11-19 03:32:36', '2019-11-19 03:32:36'),
(3, 0, 'slider_title', 'WELCOME', 'homepage', '', '2019-11-19 03:45:36', '2020-03-11 06:10:23'),
(4, 0, 'type', 'homepage', 'homepage', '', '2019-11-19 03:54:09', '2019-11-19 03:54:09'),
(5, 0, 'slider_tagline', 'SHOP for ALL TYPES OF EVENTS from Weddings, Parties, funerals and much more...', 'homepage', '', '2019-11-19 03:56:03', '2020-01-16 04:49:33'),
(6, 0, 'slider_video_url', '1579170347slider_video_url.mp4', 'homepage', '', '2019-11-19 03:56:03', '2020-01-16 04:55:47'),
(14, 0, 'section1_title', 'About Us', 'homepage', '', '2019-11-19 07:25:32', '2020-03-11 08:58:10'),
(15, 0, 'section1_description', 'EVENTS', 'homepage', '', '2019-11-19 07:25:32', '2019-11-19 07:32:28'),
(16, 0, 'section1_tagline', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\norem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem', 'homepage', '', '2019-11-19 07:35:33', '2020-03-11 08:58:10'),
(17, 0, 'section2_title', 'Need help with kids camps or our coaching courses?', 'homepage', '', '2019-11-19 07:36:21', '2020-03-11 07:10:02'),
(18, 0, 'section2_tagline', 'LET’S PLAN TOGETHER', 'homepage', '', '2019-11-19 07:36:22', '2019-11-19 07:37:08'),
(19, 0, 'section3_title', '\'ENVISIUN EXPALINED, LET’S SHOW YOU HOW\'', 'homepage', '', '2019-11-19 07:38:25', '2019-11-20 07:16:19'),
(20, 0, 'section3_tagline', '"PILOT YOUR DREAMS"', 'homepage', '', '2019-11-19 07:38:25', '2019-11-20 07:16:19'),
(21, 0, 'section4_title1', 'WHY NOT CHOOSE US?', 'homepage', '', '2019-11-19 07:45:22', '2019-11-19 07:46:01'),
(22, 0, 'section4_tagline1', 'GET TO KNOW ENVISIUN!!', 'homepage', '', '2019-11-19 07:45:22', '2019-11-19 07:46:01'),
(23, 0, 'section4_description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris', 'homepage', '', '2019-11-19 07:45:22', '2019-11-19 07:46:01'),
(24, 0, 'section4_title2', 'ARE YOU A VENDOR?', 'homepage', '', '2019-11-19 07:45:22', '2019-11-19 07:46:01'),
(25, 0, 'section4_tagline2', 'List your Business and Start Delivering Dreams', 'homepage', '', '2019-11-19 07:45:22', '2019-11-19 07:46:01'),
(26, 0, 'section5_title', 'WHAT PEOPLE ARE SAYING ABOUT US', 'homepage', '', '2019-11-19 07:48:04', '2019-11-20 07:14:58'),
(28, 0, 'title', 'login', 'homepage', '', '2019-11-19 07:52:09', '2019-11-19 07:55:23'),
(40, 0, 'slider_button_title', 'Explore more', 'homepage', '', '2019-11-19 08:28:48', '2019-11-19 08:29:20'),
(41, 0, 'slider_button_url', 'http://49.249.236.30:8654/', 'homepage', '', '2019-11-19 08:28:48', '2019-11-20 06:02:28'),
(42, 0, 'section4_button_title', 'Sign Up', 'homepage', '', '2019-11-19 08:33:06', '2019-11-19 08:33:29'),
(43, 0, 'section4_button_url', 'http://49.249.236.30:8654/', 'homepage', '', '2019-11-19 08:33:06', '2019-11-20 06:02:29'),
(44, 0, 'section2_image_tagline', 'Let’s Budget', 'homepage', '', '2019-11-19 08:35:51', '2019-11-19 08:36:06'),
(53, 0, 'slider_video_url', 'images/setting/1574177390lBvPzkHcwFyTsr4OVPo7-t10_-dsc5356_15_183683-1555326929.jpg', 'common', NULL, '2019-11-19 09:59:50', '2019-11-19 09:59:50'),
(58, 0, 'section2_image', '1574250795.png', 'homepage', NULL, '2019-11-20 05:49:27', '2019-11-20 06:23:15'),
(59, 0, 'section4_image', '1574251218.png', 'homepage', NULL, '2019-11-20 06:26:08', '2019-11-20 06:30:18'),
(60, 0, 'section3_video', '1574253495.mp4', 'homepage', NULL, '2019-11-20 06:34:00', '2019-11-20 07:08:15'),
(62, 0, 'section3_video_poster', '1574260675.png', 'homepage', NULL, '2019-11-20 09:06:03', '2019-11-20 09:07:55'),
(90, 0, 'meta_title', 'Welcome to the website', 'homepage', NULL, '2019-11-21 01:48:26', '2020-03-11 07:10:01'),
(91, 0, 'meta_description', 'Platform welcomes you', 'homepage', NULL, '2019-11-21 01:48:26', '2019-11-21 02:53:37'),
(92, 0, 'meta_keyword', 'Home, Test, User', 'homepage', NULL, '2019-11-21 01:48:27', '2019-11-21 02:53:37'),
(103, 0, 'meta_title', '', '', NULL, '2019-11-21 02:18:10', '2019-11-21 02:18:10'),
(109, 0, '', '', 'global-settings', 'Global Settings', '2019-11-27 07:12:41', '2019-11-27 07:12:41'),
(110, 0, 'meta_title', '', 'global-settings', NULL, '2019-11-27 07:15:34', '2019-11-27 07:15:34'),
(111, 0, 'meta_description', '', 'global-settings', NULL, '2019-11-27 07:15:34', '2019-11-27 07:15:34'),
(112, 0, 'meta_keyword', '', 'global-settings', NULL, '2019-11-27 07:15:34', '2019-11-27 07:15:34'),
(113, 0, 'signup_title', '', 'global-settings', NULL, '2019-11-27 07:15:34', '2019-11-27 07:15:34'),
(114, 0, 'signup_background_image', '', 'global-settings', NULL, '2019-11-27 07:15:34', '2019-11-27 07:15:34'),
(115, 0, 'heading', '', 'global-settings', NULL, '2019-11-27 07:15:34', '2019-11-27 07:15:34'),
(116, 0, 'signup_banner', '', 'global-settings', NULL, '2019-11-27 07:15:35', '2019-11-27 07:15:35'),
(117, 0, 'description', '', 'global-settings', NULL, '2019-11-27 07:15:35', '2019-11-27 07:15:35'),
(118, 0, 'section1_title', '', 'global-settings', NULL, '2019-11-27 07:15:35', '2019-11-27 07:15:35'),
(119, 0, 'section1_tagline', '', 'global-settings', NULL, '2019-11-27 07:15:35', '2019-11-27 07:15:35'),
(120, 0, 'section1_video', '', 'global-settings', NULL, '2019-11-27 07:15:35', '2019-11-27 07:15:35'),
(121, 0, 'section1_video_poster', '', 'global-settings', NULL, '2019-11-27 07:15:35', '2019-11-27 07:15:35'),
(122, 0, 'section2_title', '', 'global-settings', NULL, '2019-11-27 07:15:35', '2019-11-27 07:15:35'),
(123, 0, 'google_api_key', 'AIzaSyDULjv0UAVmj_zgc9GjBhJNh9fNuEj87LQ', 'global-settings', NULL, '2019-11-27 07:17:44', '2019-12-04 06:09:03'),
(124, 0, '', 'global-settings', 'global-settings', NULL, '2019-11-27 07:20:24', '2019-11-27 07:20:24'),
(198, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-04 06:09:03', '2019-12-04 06:09:03'),
(200, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-05 02:01:10', '2019-12-05 02:01:10'),
(201, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-05 02:01:31', '2019-12-05 02:01:31'),
(202, 0, 'weather_api_key', '8b9eccd531cf8de092a195b4d5c2d869', 'global-settings', NULL, '2019-12-06 00:17:58', '2019-12-06 00:51:41'),
(203, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-06 00:25:47', '2019-12-06 00:25:47'),
(204, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-06 00:47:19', '2019-12-06 00:47:19'),
(205, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-06 00:51:29', '2019-12-06 00:51:29'),
(206, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-06 00:51:41', '2019-12-06 00:51:41'),
(207, 0, 'stripe_credentials', '', 'stripe_credentials', NULL, '2019-12-10 04:00:44', '2019-12-10 04:00:44'),
(208, 0, 'stripe_credentials', '{"_token":"sGlNlc7e7fcLPgKBiwNxaBsbuNPSdQls0wSyYwEB","type":"stripe-credentials","key":"stripe_credentials","test_sk":"sk_test_p8VlaYX68wQNoikV5b3eXawB00tVn2yhs2","test_pk":"pk_test_7s4zephLlSBQHOqovi6w0XCK00U4UJ6WlO","test_client_id":"ca_GLAxBauXm8E4habSHJXBNiOWAixurQ2U","live_sk":"sk_test_p8VlaYX68wQNoikV5b3eXawB00tVn2yhs2","live_pk":"pk_test_7s4zephLlSBQHOqovi6w0XCK00U4UJ6WlO","live_client_id":"ca_GLAxBauXm8E4habSHJXBNiOWAixurQ2U"}', 'stripe-credentials', NULL, '2019-12-16 05:25:28', '2020-01-31 05:43:02'),
(209, 0, 'paypal_credentials', '{"_token":"LP4MzcKahcPBpHgIF1M13hwpPpQkMNLiqPmLUU7q","type":"paypal-credentials","key":"paypal_credentials","sandbox_username":"sdsd","sandbox_password":"sssd","sandbox_clientId":"sdsdsd","sandbox_secret":"sdssd","live_username":"sdssd","live_password":"sds","live_clientId":"sddssd","live_secret":"sdsdsd"}', 'paypal-credentials', NULL, '2019-12-16 06:57:52', '2019-12-16 06:58:10'),
(210, 0, 'commission_fee_type', '0', 'global-settings', NULL, '2019-12-26 01:51:14', '2019-12-27 04:27:57'),
(211, 0, 'commission_fee_amount', '3', 'global-settings', NULL, '2019-12-26 01:53:48', '2019-12-27 04:27:57'),
(212, 0, 'service_fee_type', '0', 'global-settings', NULL, '2019-12-26 01:57:38', '2019-12-27 04:27:57'),
(213, 0, 'service_fee_amount', '2', 'global-settings', NULL, '2019-12-26 01:57:38', '2019-12-27 04:27:57'),
(214, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-26 01:58:28', '2019-12-26 01:58:28'),
(215, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-26 01:59:07', '2019-12-26 01:59:07'),
(216, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-26 02:02:44', '2019-12-26 02:02:44'),
(217, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-26 02:04:17', '2019-12-26 02:04:17'),
(218, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-26 02:04:45', '2019-12-26 02:04:45'),
(219, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-26 02:04:57', '2019-12-26 02:04:57'),
(220, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-26 02:05:01', '2019-12-26 02:05:01'),
(221, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-26 02:05:30', '2019-12-26 02:05:30'),
(222, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-26 02:05:34', '2019-12-26 02:05:34'),
(223, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-26 02:05:38', '2019-12-26 02:05:38'),
(224, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-26 02:05:45', '2019-12-26 02:05:45'),
(225, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-26 02:05:50', '2019-12-26 02:05:50'),
(226, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-26 02:05:54', '2019-12-26 02:05:54'),
(227, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-26 02:08:42', '2019-12-26 02:08:42'),
(228, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-26 03:06:49', '2019-12-26 03:06:49'),
(229, 0, 'taxjar_api_key', 'b67517825dfc045e57e86e6500a1e71c', 'global-settings', NULL, '2019-12-26 03:26:59', '2020-01-29 07:31:44'),
(230, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-26 03:27:16', '2019-12-26 03:27:16'),
(231, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-26 03:36:36', '2019-12-26 03:36:36'),
(232, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-26 03:39:26', '2019-12-26 03:39:26'),
(233, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-26 03:39:52', '2019-12-26 03:39:52'),
(234, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-26 03:44:33', '2019-12-26 03:44:33'),
(235, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-26 04:01:10', '2019-12-26 04:01:10'),
(236, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-26 04:01:17', '2019-12-26 04:01:17'),
(237, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-26 04:03:15', '2019-12-26 04:03:15'),
(238, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-26 04:06:21', '2019-12-26 04:06:21'),
(239, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-26 04:06:40', '2019-12-26 04:06:40'),
(240, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-26 04:12:35', '2019-12-26 04:12:35'),
(241, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-26 04:14:30', '2019-12-26 04:14:30'),
(242, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-26 04:15:53', '2019-12-26 04:15:53'),
(243, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-26 04:16:02', '2019-12-26 04:16:02'),
(244, 0, '', 'global-settings', 'global-settings', NULL, '2019-12-27 04:27:57', '2019-12-27 04:27:57'),
(246, 0, '', 'global-settings', 'global-settings', NULL, '2020-01-29 07:31:44', '2020-01-29 07:31:44'),
(247, 0, 'slider_title1', 'Football Coaching in Milton Kenyes - 1', 'homepage', NULL, '2020-03-11 06:45:27', '2020-03-11 07:10:02'),
(248, 0, 'slider_tagline1', '1', 'homepage', NULL, '2020-03-11 06:45:27', '2020-03-11 07:10:02'),
(249, 0, 'slider_video_url1', '', 'homepage', NULL, '2020-03-11 06:45:27', '2020-03-11 06:45:27'),
(250, 0, 'slider_button_title1', 'Know More', 'homepage', NULL, '2020-03-11 06:45:28', '2020-03-11 07:10:02'),
(251, 0, 'slider_button_url1', '#', 'homepage', NULL, '2020-03-11 06:45:28', '2020-03-18 04:08:13'),
(252, 0, 'slider_title2', 'Football Coaching in Milton Kenyes - 2', 'homepage', NULL, '2020-03-11 06:45:28', '2020-03-11 07:10:02'),
(253, 0, 'slider_tagline2', '1', 'homepage', NULL, '2020-03-11 06:45:28', '2020-03-11 07:10:02'),
(254, 0, 'slider_video_url2', '', 'homepage', NULL, '2020-03-11 06:45:28', '2020-03-11 06:45:28'),
(255, 0, 'slider_button_title2', 'In Partnership with MK City Colts FC.', 'homepage', NULL, '2020-03-11 06:45:28', '2020-03-11 07:10:02'),
(256, 0, 'slider_button_url2', '#', 'homepage', NULL, '2020-03-11 06:45:28', '2020-03-18 04:08:13'),
(257, 0, 'slider_title3', 'Football Coaching in Milton Kenyes - 3', 'homepage', NULL, '2020-03-11 06:45:28', '2020-03-11 07:10:02'),
(258, 0, 'slider_tagline3', '3', 'homepage', NULL, '2020-03-11 06:45:28', '2020-03-11 07:10:02'),
(259, 0, 'slider_video_url3', '', 'homepage', NULL, '2020-03-11 06:45:28', '2020-03-11 06:45:28'),
(260, 0, 'slider_button_title3', 'In Partnership with MK City Colts FC.', 'homepage', NULL, '2020-03-11 06:45:28', '2020-03-11 07:10:02'),
(261, 0, 'slider_button_url3', '#', 'homepage', NULL, '2020-03-11 06:45:28', '2020-03-18 04:08:13'),
(262, 0, 'slider_description1', 'In Partnership with MK City Colts FC.', 'homepage', NULL, '2020-03-11 06:45:50', '2020-03-11 07:10:02'),
(263, 0, 'slider_description2', 'In Partnership with MK City Colts FC.', 'homepage', NULL, '2020-03-11 06:45:50', '2020-03-11 07:10:02'),
(264, 0, 'slider_description3', 'In Partnership with MK City Colts FC.', 'homepage', NULL, '2020-03-11 06:45:50', '2020-03-11 07:10:02'),
(265, 0, 'aboutus_image', '1583930402aboutus_image.png', 'homepage', NULL, '2020-03-11 06:52:07', '2020-03-11 07:10:02'),
(266, 0, 'section1_button_title', 'Read More', 'homepage', NULL, '2020-03-11 06:54:39', '2020-03-11 07:10:02'),
(267, 0, 'section1_button_url', '#', 'homepage', NULL, '2020-03-11 06:54:39', '2020-03-18 04:08:13'),
(268, 0, 'section2_button_title', 'Click Here', 'homepage', NULL, '2020-03-11 07:06:43', '2020-03-11 07:10:02'),
(269, 0, 'section2_button_url', '#', 'homepage', NULL, '2020-03-11 07:06:43', '2020-03-18 04:08:13'),
(270, 0, 'slider_heading1', 'DRH Sports', 'homepage', NULL, '2020-03-11 07:14:31', '2020-03-11 07:15:33'),
(271, 0, 'slider_subheading1', 'Football Coaching', 'homepage', NULL, '2020-03-11 07:14:31', '2020-03-11 07:34:47'),
(272, 0, 'slider_heading2', 'DRH Sports', 'homepage', NULL, '2020-03-11 07:14:31', '2020-03-11 07:15:33'),
(273, 0, 'slider_subheading2', 'Football Coaching', 'homepage', NULL, '2020-03-11 07:14:31', '2020-03-11 07:34:47'),
(274, 0, 'slider_heading3', 'DRH Sports', 'homepage', NULL, '2020-03-11 07:14:32', '2020-03-11 07:15:33'),
(275, 0, 'slider_subheading3', 'Football Coaching', 'homepage', NULL, '2020-03-11 07:14:32', '2020-03-11 07:34:47'),
(276, 0, 'slider_image1', '1583934033slider_image1.png', 'homepage', NULL, '2020-03-11 07:42:49', '2020-03-11 08:10:33'),
(277, 0, 'slider_image2', '1583934033slider_image2.png', 'homepage', NULL, '2020-03-11 07:42:49', '2020-03-11 08:10:33'),
(278, 0, 'slider_image3', '1583934033slider_image3.png', 'homepage', NULL, '2020-03-11 07:42:49', '2020-03-11 08:10:33'),
(279, 0, 'meta_title', '', 'signup', NULL, '2020-03-11 11:32:03', '2020-03-11 11:32:03'),
(280, 0, 'meta_description', '', 'signup', NULL, '2020-03-11 11:32:03', '2020-03-11 11:32:03'),
(281, 0, 'meta_keyword', '', 'signup', NULL, '2020-03-11 11:32:03', '2020-03-11 11:32:03'),
(282, 0, 'signup_background_image', '', 'vendor-signup', NULL, '2020-03-11 11:32:03', '2020-03-11 11:32:03'),
(299, 0, 'meta_title', 'Welcome to the website', 'course-listing', NULL, '2020-03-12 01:41:30', '2020-03-12 01:45:35'),
(300, 0, 'meta_description', 'Platform welcomes you', 'course-listing', NULL, '2020-03-12 01:41:30', '2020-03-12 01:45:35'),
(301, 0, 'meta_keyword', 'Courses, Test, User', 'course-listing', NULL, '2020-03-12 01:41:30', '2020-03-12 01:45:35'),
(302, 0, 'page_title', 'COURSES', 'course-listing', NULL, '2020-03-12 01:41:30', '2020-03-19 06:43:58'),
(303, 0, 'banner_image', '1583997335banner_image.png', 'course-listing', NULL, '2020-03-12 01:41:30', '2020-03-12 01:45:35'),
(304, 0, 'heading1', 'FOOTBALL COACHING WITH DRH', 'course-listing', NULL, '2020-03-12 01:41:30', '2020-03-12 01:55:06'),
(305, 0, 'description1', 'DRH Sports has teamed up with the MK City Colts FC to offer not just fantastic junior football coaching, but to provide a seamless link into teams and competition', 'course-listing', NULL, '2020-03-12 01:41:30', '2020-03-12 01:45:35'),
(306, 0, 'heading2', 'OUR FOOTBALL COACHES', 'course-listing', NULL, '2020-03-12 01:41:31', '2020-03-12 01:55:06'),
(307, 0, 'description2', 'At DRH Sports all our football coaches are fully FA qualified, insured, DBS checked and First Aid Trained. Collectively they have a great amount of experience and expertise and they all share a passion for football and coaching. Each and every one of our coaches brings energy and enthusiasm on court - they all love what they do, and we have been told that it shows!', 'course-listing', NULL, '2020-03-12 01:41:31', '2020-03-12 01:45:35'),
(308, 0, 'heading3', 'OUR COURSES & CLASSES EXPLAINED', 'course-listing', NULL, '2020-03-12 01:41:31', '2020-03-12 01:55:06'),
(309, 0, 'description3', 'We currently only offer a Tadpoles coaching class which is for boys and girls aged 5 and 6 years old. The aim of the class is to create the next under 7s MK City Colts team which will be lead and manged by one of the parents.', 'course-listing', NULL, '2020-03-12 01:41:31', '2020-03-12 01:45:35'),
(310, 0, 'section4_title', 'Need help with kids camps or our coaching courses?', 'course-listing', NULL, '2020-03-12 01:41:31', '2020-03-12 01:45:35'),
(311, 0, 'section4_button_title', 'Click Here', 'course-listing', NULL, '2020-03-12 01:41:31', '2020-03-12 01:57:00'),
(312, 0, 'section4_button_url', '#', 'course-listing', NULL, '2020-03-12 01:41:31', '2020-03-12 01:45:35'),
(313, 0, '', 'course-listing', 'course-listing', NULL, '2020-03-12 01:45:35', '2020-03-12 01:45:35'),
(314, 0, '', 'course-listing', 'course-listing', NULL, '2020-03-12 01:54:40', '2020-03-12 01:54:40'),
(315, 0, '', 'course-listing', 'course-listing', NULL, '2020-03-12 01:55:06', '2020-03-12 01:55:06'),
(316, 0, '', 'course-listing', 'course-listing', NULL, '2020-03-12 01:56:47', '2020-03-12 01:56:47'),
(317, 0, 'section4_button_url', '', 'login', NULL, '2020-03-12 01:56:50', '2020-03-12 01:56:50'),
(318, 0, '', 'course-listing', 'course-listing', NULL, '2020-03-12 01:57:00', '2020-03-12 01:57:00'),
(319, 0, 'meta_title', 'Welcome to the website', 'contact-us', NULL, '2020-03-12 05:52:52', '2020-03-12 06:04:28'),
(320, 0, 'meta_description', 'Platform welcomes you', 'contact-us', NULL, '2020-03-12 05:52:52', '2020-03-12 06:04:28'),
(321, 0, 'meta_keyword', 'Contact Us', 'contact-us', NULL, '2020-03-12 05:52:52', '2020-03-12 06:04:28'),
(322, 0, 'page_title', 'Contact Us', 'contact-us', NULL, '2020-03-12 05:52:52', '2020-03-12 06:04:28'),
(323, 0, 'banner_image', '1584012868banner_image.png', 'contact-us', NULL, '2020-03-12 05:52:52', '2020-03-12 06:04:28'),
(324, 0, 'heading1', 'Headquarters', 'contact-us', NULL, '2020-03-12 05:52:52', '2020-03-17 02:04:22'),
(325, 0, 'description1', 'Dominic Ross-Hurst\r\nThe Pavilion,\r\nWoughton on the Green,\r\nMilton Keynes\r\nMK6 3EA,\r\nUK', 'contact-us', NULL, '2020-03-12 05:52:52', '2020-03-17 02:23:00'),
(326, 0, 'heading2', 'Contact Us', 'contact-us', NULL, '2020-03-12 05:52:52', '2020-03-17 02:04:22'),
(327, 0, 'description2', 'Phone: 07929 341226\r\nEmail: info@drhsports.co.uk', 'contact-us', NULL, '2020-03-12 05:52:52', '2020-03-17 02:04:22'),
(328, 0, 'heading3', 'Social links', 'contact-us', NULL, '2020-03-12 05:52:53', '2020-03-17 02:04:22'),
(329, 0, 'description3', 'We currently only offer a Tadpoles coaching class which is for boys and girls aged 5 and 6 years old. The aim of the class is to create the next under 7s MK City Colts team which will be lead and manged by one of the parents.', 'contact-us', NULL, '2020-03-12 05:52:53', '2020-03-12 06:04:28'),
(330, 0, 'section4_title', 'Need help with kids camps or our coaching courses?', 'contact-us', NULL, '2020-03-12 05:52:53', '2020-03-12 06:04:28'),
(331, 0, 'section4_button_title', 'Click Here', 'contact-us', NULL, '2020-03-12 05:52:53', '2020-03-12 06:04:28'),
(332, 0, 'section4_button_url', '#', 'contact-us', NULL, '2020-03-12 05:52:53', '2020-03-12 06:04:28'),
(333, 0, '', 'contact-us', 'contact-us', NULL, '2020-03-12 05:56:35', '2020-03-12 05:56:35'),
(334, 0, 'contact_meta_title', '', 'contact-us', NULL, '2020-03-12 06:00:09', '2020-03-12 06:00:09'),
(335, 0, 'contact_meta_description', '', 'contact-us', NULL, '2020-03-12 06:00:09', '2020-03-12 06:00:09'),
(336, 0, 'contact_meta_keyword', '', 'contact-us', NULL, '2020-03-12 06:00:09', '2020-03-12 06:00:09'),
(337, 0, 'contact_page_title', '', 'contact-us', NULL, '2020-03-12 06:00:09', '2020-03-12 06:00:09'),
(338, 0, 'contact_banner_image', '', 'contact-us', NULL, '2020-03-12 06:00:09', '2020-03-12 06:00:09'),
(339, 0, 'contact_heading1', '', 'contact-us', NULL, '2020-03-12 06:00:09', '2020-03-12 06:00:09'),
(340, 0, 'contact_description1', '', 'contact-us', NULL, '2020-03-12 06:00:09', '2020-03-12 06:00:09'),
(341, 0, 'contact_heading2', '', 'contact-us', NULL, '2020-03-12 06:00:09', '2020-03-12 06:00:09'),
(342, 0, 'contact_description2', '', 'contact-us', NULL, '2020-03-12 06:00:09', '2020-03-12 06:00:09'),
(343, 0, 'contact_heading3', '', 'contact-us', NULL, '2020-03-12 06:00:09', '2020-03-12 06:00:09'),
(344, 0, 'contact_description3', '', 'contact-us', NULL, '2020-03-12 06:00:09', '2020-03-12 06:00:09'),
(345, 0, 'contact_section4_title', '', 'contact-us', NULL, '2020-03-12 06:00:09', '2020-03-12 06:00:09'),
(346, 0, 'contact_section4_button_title', '', 'contact-us', NULL, '2020-03-12 06:00:09', '2020-03-12 06:00:09'),
(347, 0, 'contact_section4_button_url', '', 'contact-us', NULL, '2020-03-12 06:00:09', '2020-03-12 06:00:09'),
(348, 0, '', 'contact-us', 'contact-us', NULL, '2020-03-12 06:04:28', '2020-03-12 06:04:28'),
(349, 0, 'meta_title', '', 'vendor-signup', NULL, '2020-03-12 21:35:41', '2020-03-12 21:35:41'),
(350, 0, 'meta_description', '', 'vendor-signup', NULL, '2020-03-12 21:35:41', '2020-03-12 21:35:41'),
(351, 0, 'meta_keyword', '', 'vendor-signup', NULL, '2020-03-12 21:35:41', '2020-03-12 21:35:41'),
(352, 0, 'signup_title', '', 'vendor-signup', NULL, '2020-03-12 21:35:41', '2020-03-12 21:35:41'),
(353, 0, 'signup_banner', '', 'vendor-signup', NULL, '2020-03-12 21:35:41', '2020-03-12 21:35:41'),
(354, 0, 'heading', '', 'vendor-signup', NULL, '2020-03-12 21:35:42', '2020-03-12 21:35:42'),
(355, 0, 'description', '', 'vendor-signup', NULL, '2020-03-12 21:35:42', '2020-03-12 21:35:42'),
(356, 0, 'section1_title', '', 'vendor-signup', NULL, '2020-03-12 21:35:42', '2020-03-12 21:35:42'),
(357, 0, 'section1_tagline', '', 'vendor-signup', NULL, '2020-03-12 21:35:42', '2020-03-12 21:35:42'),
(358, 0, 'section1_video_poster', '', 'vendor-signup', NULL, '2020-03-12 21:35:42', '2020-03-12 21:35:42'),
(359, 0, 'section1_video', '', 'vendor-signup', NULL, '2020-03-12 21:35:42', '2020-03-12 21:35:42'),
(360, 0, 'section2_title', '', 'vendor-signup', NULL, '2020-03-12 21:35:42', '2020-03-12 21:35:42'),
(361, 0, 'facebook_link', '', 'basic-settings', NULL, '2020-03-12 23:57:16', '2020-03-12 23:57:16'),
(362, 0, 'instagram_link', '', 'basic-settings', NULL, '2020-03-12 23:57:16', '2020-03-12 23:57:16'),
(363, 0, 'google_link', '', 'basic-settings', NULL, '2020-03-12 23:57:16', '2020-03-12 23:57:16'),
(364, 0, 'website_email', '', 'basic-settings', NULL, '2020-03-12 23:57:16', '2020-03-12 23:57:16'),
(365, 0, 'website_phone_number', '', 'basic-settings', NULL, '2020-03-12 23:57:17', '2020-03-12 23:57:17'),
(366, 0, 'facebook_link', 'https://www.facebook.com/drhsportsuk', 'general-setting', NULL, '2020-03-12 23:59:23', '2020-03-15 09:12:03'),
(367, 0, 'instagram_link', 'https://www.instagram.com/?hl=en', 'general-setting', NULL, '2020-03-12 23:59:23', '2020-03-13 00:21:41'),
(368, 0, 'google_link', 'https://aboutme.google.com/u/0/?referer=gplus', 'general-setting', NULL, '2020-03-12 23:59:23', '2020-03-13 00:21:41'),
(369, 0, 'website_email', 'info@drhsports.co.uk', 'general-setting', NULL, '2020-03-12 23:59:23', '2020-03-13 00:21:41'),
(370, 0, 'website_phone_number', '7929341226', 'general-setting', NULL, '2020-03-12 23:59:23', '2020-03-14 17:25:01'),
(371, 0, 'website_logo', '1584078701website_logo.png', 'general-setting', NULL, '2020-03-13 00:03:02', '2020-03-13 00:21:41'),
(372, 0, 'footer_section1', 'DRH Sports , the best in sports coaching!', 'general-setting', NULL, '2020-03-13 00:18:00', '2020-03-13 04:36:47'),
(373, 0, 'newsletter_content', 'Subscribe to Our Newsletter to get Important News, Amazing Offers & Inside Scoops:', 'general-setting', NULL, '2020-03-13 00:18:00', '2020-03-13 04:36:47'),
(374, 0, '', 'general-setting', 'general-setting', NULL, '2020-03-13 00:21:41', '2020-03-13 00:21:41'),
(375, 0, 'copyright_section', 'Copyright © 2020 - All Rights Reserved.', 'general-setting', NULL, '2020-03-13 00:59:05', '2020-03-13 04:36:47'),
(376, 0, '', 'general-setting', 'general-setting', NULL, '2020-03-13 00:59:10', '2020-03-13 00:59:10'),
(377, 0, '', 'general-setting', 'general-setting', NULL, '2020-03-13 00:59:39', '2020-03-13 00:59:39'),
(378, 0, '', 'general-setting', 'general-setting', NULL, '2020-03-13 00:59:52', '2020-03-13 00:59:52'),
(379, 0, '', 'general-setting', 'general-setting', NULL, '2020-03-13 04:34:48', '2020-03-13 04:34:48'),
(380, 0, '', 'general-setting', 'general-setting', NULL, '2020-03-13 04:35:16', '2020-03-13 04:35:16'),
(381, 0, '', 'general-setting', 'general-setting', NULL, '2020-03-13 04:36:46', '2020-03-13 04:36:46'),
(382, 0, '', 'general-setting', 'general-setting', NULL, '2020-03-14 17:25:00', '2020-03-14 17:25:00'),
(383, 0, '', 'general-setting', 'general-setting', NULL, '2020-03-15 09:12:03', '2020-03-15 09:12:03'),
(386, 0, 'pdf_upload', '1584366592pdf_upload.pdf', 'course-listing', NULL, '2020-03-16 08:16:36', '2020-03-16 08:19:52'),
(387, 0, '', 'course-listing', 'course-listing', NULL, '2020-03-16 08:19:52', '2020-03-16 08:19:52'),
(388, 0, 'admin_email', 'test89@yopmail.com', 'general-setting', NULL, '2020-03-17 00:41:48', '2020-03-17 00:41:58'),
(389, 0, '', 'general-setting', 'general-setting', NULL, '2020-03-17 00:41:58', '2020-03-17 00:41:58'),
(390, 0, '', 'general-setting', 'general-setting', NULL, '2020-03-17 00:44:51', '2020-03-17 00:44:51'),
(391, 0, '', 'general-setting', 'general-setting', NULL, '2020-03-17 00:48:35', '2020-03-17 00:48:35'),
(392, 0, '', 'general-setting', 'general-setting', NULL, '2020-03-17 00:49:37', '2020-03-17 00:49:37'),
(393, 0, '', 'general-setting', 'general-setting', NULL, '2020-03-17 00:50:42', '2020-03-17 00:50:42'),
(394, 0, '', 'general-setting', 'general-setting', NULL, '2020-03-17 00:50:57', '2020-03-17 00:50:57'),
(395, 0, '', 'contact-us', 'contact-us', NULL, '2020-03-17 02:04:22', '2020-03-17 02:04:22'),
(396, 0, '', 'contact-us', 'contact-us', NULL, '2020-03-17 02:05:23', '2020-03-17 02:05:23'),
(397, 0, 'phone_number', '07929 341226', 'contact-us', NULL, '2020-03-17 02:08:56', '2020-03-17 02:22:29'),
(398, 0, 'email', 'info@drhsports.co.uk', 'contact-us', NULL, '2020-03-17 02:08:56', '2020-03-17 02:22:29'),
(399, 0, '', 'contact-us', 'contact-us', NULL, '2020-03-17 02:22:29', '2020-03-17 02:22:29'),
(400, 0, '', 'contact-us', 'contact-us', NULL, '2020-03-17 02:23:00', '2020-03-17 02:23:00'),
(401, 0, 'facebook', 'www.facebook.com', 'contact-us', NULL, '2020-03-17 02:45:51', '2020-03-17 03:32:27'),
(402, 0, 'instagram', 'www.instagram.com', 'contact-us', NULL, '2020-03-17 02:45:51', '2020-03-17 03:32:27'),
(403, 0, 'google', 'www.google.com', 'contact-us', NULL, '2020-03-17 02:45:51', '2020-03-17 03:32:27'),
(404, 0, '', 'contact-us', 'contact-us', NULL, '2020-03-17 02:46:33', '2020-03-17 02:46:33'),
(405, 0, '', 'contact-us', 'contact-us', NULL, '2020-03-17 03:32:27', '2020-03-17 03:32:27'),
(421, 0, 'early_bird_date', '', 'contact-us', NULL, '2020-03-17 08:16:29', '2020-03-17 08:16:29'),
(422, 0, 'early_bird_time', '', 'contact-us', NULL, '2020-03-17 08:16:29', '2020-03-17 08:16:29'),
(425, 0, 'early_bird_date', '2020-03-10', 'early-bird', NULL, '2020-03-17 08:19:06', '2020-03-17 08:19:35'),
(426, 0, 'early_bird_time', '02:01', 'early-bird', NULL, '2020-03-17 08:19:06', '2020-03-17 08:19:35'),
(427, 0, 'tennis_percentage', '10', 'early-bird', NULL, '2020-03-17 08:19:06', '2020-03-17 08:19:23'),
(428, 0, 'football_percentage', '20', 'early-bird', NULL, '2020-03-17 08:19:06', '2020-03-17 08:19:23'),
(429, 0, 'school_percentage', '20', 'early-bird', NULL, '2020-03-17 08:19:06', '2020-03-17 08:19:23'),
(430, 0, '', 'early-bird', 'early-bird', NULL, '2020-03-17 08:19:22', '2020-03-17 08:19:22'),
(431, 0, '', 'early-bird', 'early-bird', NULL, '2020-03-17 08:19:35', '2020-03-17 08:19:35'),
(432, 0, '', 'course-listing', 'course-listing', NULL, '2020-03-19 06:43:58', '2020-03-19 06:43:58'),
(433, 0, 'meta_title', 'Welcome to the website', 'football-course-listing', NULL, '2020-03-19 06:57:29', '2020-03-20 00:30:49'),
(434, 0, 'meta_description', 'Platform welcomes you', 'football-course-listing', NULL, '2020-03-19 06:57:29', '2020-03-20 00:30:50'),
(435, 0, 'meta_keyword', 'Football courses', 'football-course-listing', NULL, '2020-03-19 06:57:29', '2020-03-20 00:30:49'),
(436, 0, 'football_course_page_title', 'FOOTBALL COURSES', 'football-course-listing', NULL, '2020-03-19 06:57:29', '2020-03-20 00:30:50'),
(437, 0, 'football_course_banner_image', '1584684050football_course_banner_image.png', 'football-course-listing', NULL, '2020-03-19 06:57:29', '2020-03-20 00:30:50'),
(438, 0, 'football_course_heading1', 'FOOTBALL COACHING WITH DRH', 'football-course-listing', NULL, '2020-03-19 06:57:29', '2020-03-20 00:30:50'),
(439, 0, 'football_course_description1', 'DRH Sports has teamed up with the MK City Colts FC to offer not just fantastic junior football coaching, but to provide a seamless link into teams and competition', 'football-course-listing', NULL, '2020-03-19 06:57:29', '2020-03-20 00:30:50'),
(440, 0, 'football_course_heading2', 'OUR FOOTBALL COACHES', 'football-course-listing', NULL, '2020-03-19 06:57:29', '2020-03-20 00:30:50'),
(441, 0, 'football_course_description2', 'At DRH Sports all our football coaches are fully FA qualified, insured, DBS checked and First Aid Trained. Collectively they have a great amount of experience and expertise and they all share a passion for football and coaching. Each and every one of our coaches brings energy and enthusiasm on court - they all love what they do, and we have been told that it shows!', 'football-course-listing', NULL, '2020-03-19 06:57:29', '2020-03-20 00:30:50'),
(442, 0, 'football_course_heading3', 'OUR COURSES & CLASSES EXPLAINED', 'football-course-listing', NULL, '2020-03-19 06:57:29', '2020-03-20 00:30:50'),
(443, 0, 'football_course_description3', 'We currently only offer a Tadpoles coaching class which is for boys and girls aged 5 and 6 years old. The aim of the class is to create the next under 7s MK City Colts team which will be lead and manged by one of the parents.', 'football-course-listing', NULL, '2020-03-19 06:57:29', '2020-03-20 00:30:50'),
(444, 0, 'football_course_section4_title', 'Need help with kids camps or our coaching courses?', 'football-course-listing', NULL, '2020-03-19 06:57:29', '2020-03-20 00:30:50'),
(445, 0, 'football_course_section4_button_title', 'Click Here', 'football-course-listing', NULL, '2020-03-19 06:57:29', '2020-03-20 00:30:50'),
(446, 0, 'football_course_section4_button_url', '#', 'football-course-listing', NULL, '2020-03-19 06:57:29', '2020-03-20 00:30:50'),
(447, 0, 'pdf_upload', '', 'football-course-listing', NULL, '2020-03-19 06:57:29', '2020-03-19 06:57:29'),
(448, 0, 'football_course_pdf_upload', '1584684050football_course_pdf_upload.pdf', 'football-course-listing', NULL, '2020-03-19 07:00:09', '2020-03-20 00:30:50'),
(449, 0, 'meta_title', 'Welcome to the website', 'tennis-course-listing', NULL, '2020-03-19 07:02:36', '2020-03-20 00:44:24'),
(450, 0, 'meta_description', 'Platform welcomes you', 'tennis-course-listing', NULL, '2020-03-19 07:02:36', '2020-03-20 00:44:25'),
(451, 0, 'meta_keyword', 'Tennis courses', 'tennis-course-listing', NULL, '2020-03-19 07:02:37', '2020-03-20 00:44:25'),
(452, 0, 'tennis_course_page_title', 'TENNIS COURSES', 'tennis-course-listing', NULL, '2020-03-19 07:02:37', '2020-03-20 00:44:25'),
(453, 0, 'tennis_course_banner_image', '1584684865tennis_course_banner_image.png', 'tennis-course-listing', NULL, '2020-03-19 07:02:37', '2020-03-20 00:44:25'),
(454, 0, 'tennis_course_heading1', 'TENNIS COACHING WITH DRH', 'tennis-course-listing', NULL, '2020-03-19 07:02:37', '2020-03-20 00:44:25'),
(455, 0, 'tennis_course_description1', 'DRH Sports has teamed up with the MK City Colts FC to offer not just fantastic junior football coaching, but to provide a seamless link into teams and competition', 'tennis-course-listing', NULL, '2020-03-19 07:02:37', '2020-03-20 00:44:25'),
(456, 0, 'heading2', '', 'tennis-course-listing', NULL, '2020-03-19 07:02:37', '2020-03-19 07:02:37'),
(457, 0, 'description2', '', 'tennis-course-listing', NULL, '2020-03-19 07:02:37', '2020-03-19 07:02:37'),
(458, 0, 'tennis_course_heading3', 'OUR COURSES & CLASSES EXPLAINED', 'tennis-course-listing', NULL, '2020-03-19 07:02:37', '2020-03-20 00:44:25'),
(459, 0, 'tennis_course_description3', 'We currently only offer a Tadpoles coaching class which is for boys and girls aged 5 and 6 years old. The aim of the class is to create the next under 7s MK City Colts team which will be lead and manged by one of the parents.', 'tennis-course-listing', NULL, '2020-03-19 07:02:37', '2020-03-20 00:44:25'),
(460, 0, 'tennis_course_section4_title', 'Need help with kids camps or our coaching courses?', 'tennis-course-listing', NULL, '2020-03-19 07:02:37', '2020-03-20 00:44:25'),
(461, 0, 'tennis_course_section4_button_title', 'Click Here', 'tennis-course-listing', NULL, '2020-03-19 07:02:37', '2020-03-20 00:44:25'),
(462, 0, 'tennis_course_section4_button_url', '#', 'tennis-course-listing', NULL, '2020-03-19 07:02:37', '2020-03-20 00:44:25'),
(463, 0, 'pdf_upload', '', 'tennis-course-listing', NULL, '2020-03-19 07:02:37', '2020-03-19 07:02:37'),
(464, 0, 'tennis_course_pdf_upload', '1584684865tennis_course_pdf_upload.pdf', 'tennis-course-listing', NULL, '2020-03-19 07:02:56', '2020-03-20 00:44:25'),
(465, 0, 'meta_title', 'Welcome to the website', 'school-course-listing', NULL, '2020-03-19 07:04:42', '2020-03-20 01:07:37'),
(466, 0, 'meta_description', 'Platform welcomes you', 'school-course-listing', NULL, '2020-03-19 07:04:42', '2020-03-20 01:07:37'),
(467, 0, 'meta_keyword', 'School courses', 'school-course-listing', NULL, '2020-03-19 07:04:43', '2020-03-20 01:07:37'),
(468, 0, 'school_course_page_title', 'SCHOOL COURSES', 'school-course-listing', NULL, '2020-03-19 07:04:43', '2020-03-20 01:07:37'),
(469, 0, 'school_course_banner_image', '1584686257school_course_banner_image.png', 'school-course-listing', NULL, '2020-03-19 07:04:43', '2020-03-20 01:07:37'),
(470, 0, 'school_course_heading1', 'SCHOOL COACHING WITH DRH', 'school-course-listing', NULL, '2020-03-19 07:04:43', '2020-03-20 01:07:37'),
(471, 0, 'school_course_description1', 'DRH Sports has teamed up with the MK City Colts FC to offer not just fantastic junior football coaching, but to provide a seamless link into teams and competition', 'school-course-listing', NULL, '2020-03-19 07:04:43', '2020-03-20 01:07:37'),
(472, 0, 'school_course_heading2', 'OUR SCHOOL COACHES', 'school-course-listing', NULL, '2020-03-19 07:04:43', '2020-03-20 01:07:37'),
(473, 0, 'school_course_description2', 'At DRH Sports all our school coaches are fully FA qualified, insured, DBS checked and First Aid Trained. Collectively they have a great amount of experience and expertise and they all share a passion for football and coaching. Each and every one of our coaches brings energy and enthusiasm on court - they all love what they do, and we have been told that it shows!', 'school-course-listing', NULL, '2020-03-19 07:04:43', '2020-03-20 01:07:37'),
(474, 0, 'school_course_heading3', 'OUR COURSES & CLASSES EXPLAINED', 'school-course-listing', NULL, '2020-03-19 07:04:43', '2020-03-20 01:07:37'),
(475, 0, 'school_course_description3', 'We currently only offer a Tadpoles coaching class which is for boys and girls aged 5 and 6 years old. The aim of the class is to create the next under 7s MK City Colts team which will be lead and manged by one of the parents.', 'school-course-listing', NULL, '2020-03-19 07:04:43', '2020-03-20 01:07:37'),
(476, 0, 'school_course_section4_title', 'Need help with kids camps or our coaching courses?', 'school-course-listing', NULL, '2020-03-19 07:04:43', '2020-03-20 01:07:37'),
(477, 0, 'school_course_section4_button_title', 'Click Here', 'school-course-listing', NULL, '2020-03-19 07:04:43', '2020-03-20 01:07:37'),
(478, 0, 'school_course_section4_button_url', '#', 'school-course-listing', NULL, '2020-03-19 07:04:43', '2020-03-20 01:07:37'),
(479, 0, 'pdf_upload', '', 'school-course-listing', NULL, '2020-03-19 07:04:43', '2020-03-19 07:04:43'),
(480, 0, 'school_course_pdf_upload', '1584686257school_course_pdf_upload.pdf', 'school-course-listing', NULL, '2020-03-19 07:05:34', '2020-03-20 01:07:37'),
(481, 0, 'football_course_page_title', '', 'footballl-course-listing', NULL, '2020-03-19 08:01:04', '2020-03-19 08:01:04'),
(482, 0, 'football_course_banner_image', '', 'footballl-course-listing', NULL, '2020-03-19 08:09:46', '2020-03-19 08:09:46'),
(483, 0, 'section4_button_url', '', 'football-course-listing', NULL, '2020-03-19 08:09:46', '2020-03-19 08:09:46'),
(484, 0, '', 'football-course-listing', 'football-course-listing', NULL, '2020-03-20 00:30:49', '2020-03-20 00:30:49'),
(485, 0, 'football_course_pdf_upload', '', 'football_course_-course-listing', NULL, '2020-03-20 00:36:54', '2020-03-20 00:36:54'),
(486, 0, '', 'tennis-course-listing', 'tennis-course-listing', NULL, '2020-03-20 00:44:24', '2020-03-20 00:44:24'),
(487, 0, '', 'OUR TENNIS COACHES', 'tennis-course-listing', NULL, '2020-03-20 00:44:25', '2020-03-20 00:44:25'),
(488, 0, '', 'At DRH Sports all our tennis coaches are fully FA qualified, insured, DBS checked and First Aid Trained. Collectively they have a great amount of experience and expertise and they all share a passion for football and coaching. Each and every one of our coaches brings energy and enthusiasm on court - they all love what they do, and we have been told that it shows!', 'tennis-course-listing', NULL, '2020-03-20 00:44:25', '2020-03-20 00:44:25'),
(489, 0, 'banner_image', '', 'tennis-course-listing', NULL, '2020-03-20 00:46:12', '2020-03-20 00:46:12'),
(490, 0, 'tennis_course_heading2', 'OUR TENNIS COACHES', 'tennis-course-listing', NULL, '2020-03-20 00:46:12', '2020-03-20 00:50:35'),
(491, 0, 'tennis_course_description2', 'At DRH Sports all our football coaches are fully FA qualified, insured, DBS checked and First Aid Trained. Collectively they have a great amount of experience and expertise and they all share a passion for football and coaching. Each and every one of our coaches brings energy and enthusiasm on court - they all love what they do, and we have been told that it shows!', 'tennis-course-listing', NULL, '2020-03-20 00:46:12', '2020-03-20 00:50:35'),
(492, 0, 'section4_button_url', '', 'tennis-course-listing', NULL, '2020-03-20 00:46:12', '2020-03-20 00:46:12'),
(493, 0, '', 'tennis-course-listing', 'tennis-course-listing', NULL, '2020-03-20 00:50:35', '2020-03-20 00:50:35'),
(494, 0, '', 'school-course-listing', 'school-course-listing', NULL, '2020-03-20 01:07:37', '2020-03-20 01:07:37'),
(495, 0, 'school_course_school_course_page_title', '', 'school-course-listing', NULL, '2020-03-20 01:07:44', '2020-03-20 01:07:44'),
(496, 0, 'section4_title', '', 'school-course-listing', NULL, '2020-03-20 01:07:44', '2020-03-20 01:07:44');

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
('bajwa9876470492@gmail.com', '$2y$10$w6Nzc11m9jJ5qxqsW7JhTuEFwHq0udXcINIVH3bdaNNbZnp.Tqb1m', '2019-11-12 10:46:03'),
('bajwa7696346232@gmail.com', '$2y$10$c1a6jFDUiLRUmfnq3AcK6.PxCl38vx88QzmJoeo99Na7Mo6KZ/lhW', '2019-11-29 03:35:02'),
('jaskaran@yopmail.com', '$2y$10$NvHF3cxOD/imeoShDQGlrutHQAygg1K2nrjKv8C2XEVc3st53Mzym', '2019-11-29 04:49:24'),
('qa2.deftsoft@gmail.com', '$2y$10$HnC.lXDA0T1gKptjGQ.bI.aE0fSD8K3/AC0PU/.wd1L7rVGOS2Mua', '2019-12-05 03:34:41'),
('sandha78@yopmail.com', '$2y$10$gUxqdflsON9kE/2fjYOVCObN1OF6qObkJ6i0xHD4//9kH6vNntLYG', '2019-12-05 04:42:55'),
('user001@yopmail.com', '$2y$10$lh.vnR/re1s0UOdUk0gr/.J.AO4H4SkFzx3gy1hHlfx5oXLHUO9n.', '2019-12-06 02:12:58'),
('admin@gmail.com', '$2y$10$pT2YmILhGMBTQ4E/yPCZWeH1eWxRGTTzKuswzgUuFU20KLXyJmsG6', '2020-03-06 01:18:38'),
('test90@yopmail.com', '$2y$10$KcA.fZX4975zV7f1VD0hHutVXxElJ.jOkdXmT4Vj./8SnVDO22go6', '2020-03-19 04:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `variant_id` int(11) NOT NULL DEFAULT '0',
  `product_type` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_id` int(11) NOT NULL DEFAULT '0',
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `subcategory_id` int(11) NOT NULL DEFAULT '0',
  `childcategory_id` int(11) NOT NULL DEFAULT '0',
  `featured` int(11) NOT NULL DEFAULT '0',
  `price` double NOT NULL DEFAULT '0',
  `sale_price` double NOT NULL DEFAULT '0',
  `final_price` double DEFAULT '0',
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `create_status` int(11) NOT NULL DEFAULT '0',
  `inventory_status` int(11) NOT NULL DEFAULT '0',
  `width` double NOT NULL DEFAULT '0',
  `height` double NOT NULL DEFAULT '0',
  `weight` double NOT NULL DEFAULT '0',
  `length` double NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `approved_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `parent`, `variant_id`, `product_type`, `name`, `slug`, `shop_id`, `thumbnail`, `category_id`, `subcategory_id`, `childcategory_id`, `featured`, `price`, `sale_price`, `final_price`, `description`, `short_description`, `user_id`, `create_status`, `inventory_status`, `width`, `height`, `weight`, `length`, `status`, `approved_status`, `created_at`, `updated_at`) VALUES
(26, 0, 0, 1, 'Color Block Men Hooded Neck Grey, White T-Shirt', 'color-block-men-hooded-neck-grey-white-t-shirt', 1, 'images/products/1581002307BHlEqV2UmDltazxZZhYBxxlrockstaraquawhitehoodiewrathoriginalimafmdtnbwhphue5.jpeg', 1, 3, 153, 1, 0, 0, 0, '<p>Color Block Men Hooded Neck Grey, White T-Shirt</p>', 'Color Block Men Hooded Neck Grey, White T-Shirt', 31, 1, 0, 0, 0, 0, 0, 1, 1, '2020-02-06 09:38:44', '2020-02-18 04:20:26'),
(27, 26, 1, 1, 'Color Block Men Hooded Neck Grey, White T-Shirt', 'color-block-men-hooded-neck-grey-white-t-shirt-1', 1, 'images/products/1581002018BkAnaGhkfG1B4oI9385isrockstargraywhitehoodiewrathoriginalimafmdtnggwjgktg.jpeg', 1, 3, 153, 0, 599, 100, 499, NULL, NULL, 31, 1, 0, 0, 0, 0, 0, 1, 1, '2020-02-06 09:44:29', '2020-02-18 04:20:26'),
(28, 26, 5, 1, 'Color Block Men Hooded Neck Grey, White T-Shirt', 'color-block-men-hooded-neck-grey-white-t-shirt-2', 1, 'images/products/1581002069su954CC3Qlg0ir84vVlgxxlrockstaraquawhitehoodiewrathoriginalimafmdtnbwhphue5.jpeg', 1, 3, 153, 0, 599, 120, 479, NULL, NULL, 31, 1, 0, 0, 0, 0, 0, 1, 1, '2020-02-06 09:45:21', '2020-02-18 04:20:26'),
(29, 26, 9, 1, 'Color Block Men Hooded Neck Grey, White T-Shirt', 'color-block-men-hooded-neck-grey-white-t-shirt-3', 1, 'images/products/1581002121vtBBU6wfDzsqqBfGooZqsrockstargraywhitehoodiewrathoriginalimafmdtnggwjgktg.jpeg', 1, 3, 153, 0, 699, 150, 549, NULL, NULL, 31, 1, 0, 0, 0, 0, 0, 1, 1, '2020-02-06 09:46:05', '2020-02-18 04:20:26'),
(30, 26, 13, 1, 'Color Block Men Hooded Neck Grey, White T-Shirt', 'color-block-men-hooded-neck-grey-white-t-shirt-4', 1, 'images/products/1581002165Um4gq6z6HgiUDRnGbnzEsrockstargraywhitehoodiewrathoriginalimafmdtnggwjgktg.jpeg', 1, 3, 153, 0, 699, 200, 499, NULL, NULL, 31, 1, 0, 0, 0, 0, 0, 1, 1, '2020-02-06 09:46:44', '2020-02-18 04:20:26'),
(31, 26, 17, 1, 'Color Block Men Hooded Neck Grey, White T-Shirt', 'color-block-men-hooded-neck-grey-white-t-shirt-5', 1, 'images/products/1581002204xasmQwCAcf9yBdF5qmwAsts224wrathoriginalimafmgk3rwnpenhc.jpeg', 1, 3, 153, 0, 599, 120, 479, NULL, NULL, 31, 1, 0, 0, 0, 0, 0, 1, 1, '2020-02-06 09:47:35', '2020-02-18 04:20:26'),
(32, 26, 21, 1, 'Color Block Men Hooded Neck Grey, White T-Shirt', 'color-block-men-hooded-neck-grey-white-t-shirt-6', 1, 'images/products/1581002254oe90pF9ndmp2jYBr9EtUsts224wrathoriginalimafmgk3rwnpenhc.jpeg', 1, 3, 153, 0, 700, 100, 600, NULL, NULL, 31, 1, 0, 0, 0, 0, 0, 1, 1, '2020-02-06 09:48:21', '2020-02-18 04:20:26'),
(33, 26, 25, 1, 'Color Block Men Hooded Neck Grey, White T-Shirt', 'color-block-men-hooded-neck-grey-white-t-shirt-7', 1, 'images/products/1581002301MTneF6m4wOmB68h1haMysts224wrathoriginalimafmgk3rwnpenhc.jpeg', 1, 3, 153, 0, 566, 180, 386, NULL, NULL, 31, 1, 0, 0, 0, 0, 0, 1, 0, '2020-02-06 09:50:10', '2020-02-18 04:20:26'),
(34, 0, 0, 0, 'Color Block Men Hooded Neck Red, White, Blue T-Shirt', 'color-block-men-hooded-neck-red-white-blue-t-shirt', 1, 'images/products/1581088157xa6JG2iZTEMaCR4WrqIsm61ywnleweloriginalimafgxd7dfg7uub2.jpeg', 1, 3, 153, 0, 700, 150, 550, '<p>Color Block Men Hooded Neck Red, White, Blue T-Shirt</p>', 'Color Block Men Hooded Neck Red, White, Blue T-Shirt', 31, 1, 0, 1, 1, 1, 1, 1, 1, '2020-02-07 09:34:36', '2020-02-18 02:56:02'),
(35, 0, 0, 1, 'Blue T-shirt', 'blue-t-shirt', 2, 'images/products/1581407650oxzeJgPhdS3zlaC5DRyg46bfrybluesht02beingfaboriginalimaekjr8ymhnxznp.jpeg', 1, 3, 153, 0, 0, 0, 0, '<p>Lorium Epsum is dummy values</p>', 'Lorium Epsum is dummy values', 59, 1, 0, 0, 0, 0, 0, 0, 1, '2020-02-11 02:05:26', '2020-02-11 02:24:10'),
(36, 35, 52, 1, 'Blue T-shirt', 'blue-t-shirt-1', 2, 'images/products/1581407504n4AwVJeA8BScY6izEP8EAuthenticRoyalBlueShirtforMen5263747.jpg', 1, 3, 153, 0, 100, 50, 50, NULL, NULL, 59, 1, 0, 0, 0, 0, 0, 0, 0, '2020-02-11 02:22:39', '2020-02-11 02:40:27'),
(37, 35, 54, 1, 'Blue T-shirt', 'blue-t-shirt-2', 2, 'images/products/1581407559PPIShwy8JHFEvvNGI78mAuthenticRoyalBlueShirtforMen5263747.jpg', 1, 3, 153, 0, 120, 100, 20, NULL, NULL, 59, 1, 0, 0, 0, 0, 0, 0, 0, '2020-02-11 02:23:12', '2020-02-11 02:40:28'),
(38, 0, 0, 1, 'Blue-Tshirt Demo', 'blue-tshirt-demo', 2, 'images/products/1581411922KNYBe4NohMmCbVJsXzWsAuthenticRoyalBlueShirtforMen5263747.jpg', 1, 3, 153, 0, 0, 0, 0, '<p>Lorium Epsum&nbsp;Lorium Epsum&nbsp;Lorium Epsum&nbsp;Lorium Epsum</p>', 'Lorium Epsum', 59, 1, 0, 0, 0, 0, 0, 0, 1, '2020-02-11 03:21:19', '2020-02-18 02:51:18'),
(39, 38, 59, 1, 'Blue-Tshirt Demo', 'blue-tshirt-demo-1', 2, 'images/products/1581411359zgrUnpq6y01B1vdYkWLIAuthenticRoyalBlueShirtforMen5263747.jpg', 1, 3, 153, 0, 100, 50, 50, NULL, NULL, 59, 1, 0, 0, 0, 0, 0, 0, 1, '2020-02-11 03:27:04', '2020-02-18 02:51:18'),
(40, 38, 61, 1, 'Blue-Tshirt Demo', 'blue-tshirt-demo-2', 2, 'images/products/1581411424ZwGI9XiXnNySAvgGgQS346bfrybluesht02beingfaboriginalimaekjr8ymhnxznp.jpeg', 1, 3, 153, 0, 150, 100, 50, NULL, NULL, 59, 1, 0, 0, 0, 0, 0, 0, 1, '2020-02-11 03:31:55', '2020-02-18 02:51:18'),
(41, 38, 67, 1, 'Blue-Tshirt Demo', 'blue-tshirt-demo-3', 2, 'images/products/1581411785jT8xfiGJwCwAxSHddqho46bfrybluesht02beingfaboriginalimaekjr8ymhnxznp.jpeg', 1, 3, 153, 0, 100, 50, 50, NULL, NULL, 59, 1, 0, 0, 0, 0, 0, 0, 1, '2020-02-11 03:36:13', '2020-02-18 02:51:18'),
(42, 0, 0, 1, 'Men Checkered Casual Spread Shirt', 'men-checkered-casual-spread-shirt', 1, 'images/products/1581424891z9a4rt9bNTYSfHT6l5Zb44pcsfcslbe59477peterenglandoriginalimafnwjx2ymghewq.jpeg', 1, 3, 154, 0, 0, 0, 0, '<p>Men Checkered Casual Spread Shirt</p>', 'Men Checkered Casual Spread Shirt', 31, 1, 0, 0, 0, 0, 0, 1, 0, '2020-02-11 07:01:33', '2020-02-25 05:49:37'),
(43, 42, 76, 1, 'Men Checkered Casual Spread Shirt', 'men-checkered-casual-spread-shirt-1', 1, 'images/products/1581424849efFj8uIdhI6ZhDY6eP8544pcsfcslbe59477peterenglandoriginalimafnwjx2ymghewq.jpeg', 1, 3, 154, 0, 700, 100, 600, NULL, NULL, 31, 1, 0, 0, 0, 0, 0, 1, 0, '2020-02-11 07:11:27', '2020-02-25 05:49:37'),
(44, 42, 79, 1, 'Men Checkered Casual Spread Shirt', 'men-checkered-casual-spread-shirt-2', 1, 'images/products/15814248871zHJK3XcLRfZx86jt3QE44pcsfcslbe59477peterenglandoriginalimafnwjxmnbyu4am.jpeg', 1, 3, 154, 0, 900, 100, 800, NULL, NULL, 31, 1, 0, 0, 0, 0, 0, 1, 0, '2020-02-11 07:11:31', '2020-02-25 05:49:37');

-- --------------------------------------------------------

--
-- Table structure for table `product_assigned_variations`
--

CREATE TABLE `product_assigned_variations` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `price` double NOT NULL DEFAULT '0',
  `sale_price` double NOT NULL DEFAULT '0',
  `final_price` double DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT '0',
  `shop_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `stock_managable` int(11) NOT NULL DEFAULT '0',
  `weight` double NOT NULL DEFAULT '0',
  `height` double NOT NULL DEFAULT '0',
  `width` double NOT NULL DEFAULT '0',
  `length` double NOT NULL DEFAULT '0',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute_id` int(11) DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_assigned_variations`
--

INSERT INTO `product_assigned_variations` (`id`, `parent`, `price`, `sale_price`, `final_price`, `product_id`, `shop_id`, `user_id`, `status`, `stock_managable`, `weight`, `height`, `width`, `length`, `type`, `attribute_id`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 0, 599, 100, 499, 26, 1, 31, 1, 1, 2, 1, 2, 1, NULL, NULL, 'images/products/1581002018BkAnaGhkfG1B4oI9385isrockstargraywhitehoodiewrathoriginalimafmdtnggwjgktg.jpeg', '2020-02-06 09:43:38', '2020-02-06 09:43:38'),
(5, 0, 599, 120, 479, 26, 1, 31, 1, 1, 1, 1, 1, 1, NULL, NULL, 'images/products/1581002069su954CC3Qlg0ir84vVlgxxlrockstaraquawhitehoodiewrathoriginalimafmdtnbwhphue5.jpeg', '2020-02-06 09:44:29', '2020-02-06 09:44:29'),
(9, 0, 699, 150, 549, 26, 1, 31, 1, 1, 1, 1, 1, 1, NULL, NULL, 'images/products/1581002121vtBBU6wfDzsqqBfGooZqsrockstargraywhitehoodiewrathoriginalimafmdtnggwjgktg.jpeg', '2020-02-06 09:45:21', '2020-02-06 09:45:21'),
(13, 0, 699, 200, 499, 26, 1, 31, 1, 1, 1, 1, 1, 1, NULL, NULL, 'images/products/1581002165Um4gq6z6HgiUDRnGbnzEsrockstargraywhitehoodiewrathoriginalimafmdtnggwjgktg.jpeg', '2020-02-06 09:46:05', '2020-02-06 09:46:05'),
(17, 0, 599, 120, 479, 26, 1, 31, 1, 1, 11, 51, 1, 1, NULL, NULL, 'images/products/1581002204xasmQwCAcf9yBdF5qmwAsts224wrathoriginalimafmgk3rwnpenhc.jpeg', '2020-02-06 09:46:44', '2020-02-06 09:46:44'),
(21, 0, 700, 100, 600, 26, 1, 31, 1, 1, 1, 1, 1, 1, NULL, NULL, 'images/products/1581002254oe90pF9ndmp2jYBr9EtUsts224wrathoriginalimafmgk3rwnpenhc.jpeg', '2020-02-06 09:47:35', '2020-02-06 09:47:35'),
(25, 0, 566, 180, 386, 26, 1, 31, 1, 1, 1, 1, 1, 1, NULL, NULL, 'images/products/1581002301MTneF6m4wOmB68h1haMysts224wrathoriginalimafmgk3rwnpenhc.jpeg', '2020-02-06 09:48:21', '2020-02-06 09:48:21'),
(38, 1, 0, 0, 0, 26, 1, 31, 0, 0, 0, 0, 0, 0, 'colors', 30, NULL, '2020-02-06 09:57:03', '2020-02-06 09:57:03'),
(39, 1, 0, 0, 0, 26, 1, 31, 0, 0, 0, 0, 0, 0, 'sizes', 3, NULL, '2020-02-06 09:57:03', '2020-02-06 09:57:03'),
(40, 5, 0, 0, 0, 26, 1, 31, 0, 0, 0, 0, 0, 0, 'colors', 30, NULL, '2020-02-06 09:57:10', '2020-02-06 09:57:10'),
(41, 5, 0, 0, 0, 26, 1, 31, 0, 0, 0, 0, 0, 0, 'sizes', 4, NULL, '2020-02-06 09:57:10', '2020-02-06 09:57:10'),
(42, 9, 0, 0, 0, 26, 1, 31, 0, 0, 0, 0, 0, 0, 'colors', 32, NULL, '2020-02-06 09:57:17', '2020-02-06 09:57:17'),
(43, 9, 0, 0, 0, 26, 1, 31, 0, 0, 0, 0, 0, 0, 'sizes', 5, NULL, '2020-02-06 09:57:17', '2020-02-06 09:57:17'),
(44, 13, 0, 0, 0, 26, 1, 31, 0, 0, 0, 0, 0, 0, 'colors', 32, NULL, '2020-02-06 09:57:26', '2020-02-06 09:57:26'),
(45, 13, 0, 0, 0, 26, 1, 31, 0, 0, 0, 0, 0, 0, 'sizes', 4, NULL, '2020-02-06 09:57:26', '2020-02-06 09:57:26'),
(46, 21, 0, 0, 0, 26, 1, 31, 0, 0, 0, 0, 0, 0, 'colors', 13, NULL, '2020-02-06 09:57:29', '2020-02-06 09:57:29'),
(47, 21, 0, 0, 0, 26, 1, 31, 0, 0, 0, 0, 0, 0, 'sizes', 7, NULL, '2020-02-06 09:57:29', '2020-02-06 09:57:29'),
(48, 25, 0, 0, 0, 26, 1, 31, 0, 0, 0, 0, 0, 0, 'colors', 13, NULL, '2020-02-06 09:57:32', '2020-02-06 09:57:32'),
(49, 25, 0, 0, 0, 26, 1, 31, 0, 0, 0, 0, 0, 0, 'sizes', 6, NULL, '2020-02-06 09:57:32', '2020-02-06 09:57:32'),
(50, 17, 0, 0, 0, 26, 1, 31, 0, 0, 0, 0, 0, 0, 'colors', 13, NULL, '2020-02-06 09:57:36', '2020-02-06 09:57:36'),
(51, 17, 0, 0, 0, 26, 1, 31, 0, 0, 0, 0, 0, 0, 'sizes', 3, NULL, '2020-02-06 09:57:37', '2020-02-06 09:57:37'),
(52, 0, 100, 50, 50, 35, 2, 59, 1, 1, 2, 2, 2, 2, NULL, NULL, 'images/products/1581407504n4AwVJeA8BScY6izEP8EAuthenticRoyalBlueShirtforMen5263747.jpg', '2020-02-11 02:21:44', '2020-02-11 02:21:44'),
(54, 0, 120, 100, 20, 35, 2, 59, 1, 1, 10, 10, 10, 10, NULL, NULL, 'images/products/1581407559PPIShwy8JHFEvvNGI78mAuthenticRoyalBlueShirtforMen5263747.jpg', '2020-02-11 02:22:39', '2020-02-11 02:22:39'),
(57, 52, 0, 0, 0, 35, 2, 59, 0, 0, 0, 0, 0, 0, 'toppings', 37, NULL, '2020-02-11 02:40:28', '2020-02-11 02:40:28'),
(58, 54, 0, 0, 0, 35, 2, 59, 0, 0, 0, 0, 0, 0, 'toppings', 38, NULL, '2020-02-11 02:40:31', '2020-02-11 02:40:31'),
(59, 0, 100, 50, 50, 38, 2, 59, 1, 1, 2, 5, 5, 5, NULL, NULL, 'images/products/1581411359zgrUnpq6y01B1vdYkWLIAuthenticRoyalBlueShirtforMen5263747.jpg', '2020-02-11 03:25:59', '2020-02-11 03:25:59'),
(61, 0, 150, 100, 50, 38, 2, 59, 1, 1, 2, 2, 2, 2, NULL, NULL, 'images/products/1581411424ZwGI9XiXnNySAvgGgQS346bfrybluesht02beingfaboriginalimaekjr8ymhnxznp.jpeg', '2020-02-11 03:27:04', '2020-02-11 03:27:04'),
(67, 0, 100, 50, 50, 38, 2, 59, 1, 1, 10, 1, 1, 1, NULL, NULL, 'images/products/1581411785jT8xfiGJwCwAxSHddqho46bfrybluesht02beingfaboriginalimaekjr8ymhnxznp.jpeg', '2020-02-11 03:33:05', '2020-02-11 03:33:05'),
(70, 59, 0, 0, 0, 38, 2, 59, 0, 0, 0, 0, 0, 0, 'body-height', 39, NULL, '2020-02-11 03:36:14', '2020-02-11 03:36:14'),
(71, 59, 0, 0, 0, 38, 2, 59, 0, 0, 0, 0, 0, 0, 'sizes', 4, NULL, '2020-02-11 03:36:14', '2020-02-11 03:36:14'),
(72, 61, 0, 0, 0, 38, 2, 59, 0, 0, 0, 0, 0, 0, 'body-height', 40, NULL, '2020-02-11 03:36:17', '2020-02-11 03:36:17'),
(73, 61, 0, 0, 0, 38, 2, 59, 0, 0, 0, 0, 0, 0, 'sizes', 4, NULL, '2020-02-11 03:36:17', '2020-02-11 03:36:17'),
(74, 67, 0, 0, 0, 38, 2, 59, 0, 0, 0, 0, 0, 0, 'body-height', 39, NULL, '2020-02-11 03:36:19', '2020-02-11 03:36:19'),
(75, 67, 0, 0, 0, 38, 2, 59, 0, 0, 0, 0, 0, 0, 'sizes', 5, NULL, '2020-02-11 03:36:19', '2020-02-11 03:36:19'),
(76, 0, 700, 100, 600, 42, 1, 31, 1, 1, 1, 1, 1, 1, NULL, NULL, 'images/products/1581424849efFj8uIdhI6ZhDY6eP8544pcsfcslbe59477peterenglandoriginalimafnwjx2ymghewq.jpeg', '2020-02-11 07:10:49', '2020-02-11 07:10:49'),
(77, 76, 0, 0, 0, 42, 1, 31, 0, 0, 0, 0, 0, 0, 'colors', 22, NULL, '2020-02-11 07:10:49', '2020-02-11 07:10:49'),
(78, 76, 0, 0, 0, 42, 1, 31, 0, 0, 0, 0, 0, 0, 'sizes', 4, NULL, '2020-02-11 07:10:49', '2020-02-11 07:10:49'),
(79, 0, 900, 100, 800, 42, 1, 31, 1, 1, 1, 1, 1, 1, NULL, NULL, 'images/products/15814248871zHJK3XcLRfZx86jt3QE44pcsfcslbe59477peterenglandoriginalimafnwjxmnbyu4am.jpeg', '2020-02-11 07:11:27', '2020-02-11 07:11:27'),
(80, 79, 0, 0, 0, 42, 1, 31, 0, 0, 0, 0, 0, 0, 'colors', 32, NULL, '2020-02-11 07:11:27', '2020-02-11 07:11:27'),
(81, 79, 0, 0, 0, 42, 1, 31, 0, 0, 0, 0, 0, 0, 'sizes', 4, NULL, '2020-02-11 07:11:27', '2020-02-11 07:11:27');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT '0',
  `shop_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vkey` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` int(11) NOT NULL DEFAULT '0',
  `product_view` int(11) NOT NULL DEFAULT '0',
  `product_variant` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `parent`, `product_id`, `shop_id`, `user_id`, `type`, `vkey`, `value`, `product_view`, `product_variant`, `created_at`, `updated_at`) VALUES
(34, 0, 26, 1, 31, 'colors', 'colors', 0, 1, 1, '2020-02-06 09:56:47', '2020-02-06 09:56:47'),
(35, 34, 26, 1, 31, 'colors', 'colors', 2, 0, 0, '2020-02-06 09:56:47', '2020-02-06 09:56:47'),
(36, 34, 26, 1, 31, 'colors', 'colors', 13, 0, 0, '2020-02-06 09:56:47', '2020-02-06 09:56:47'),
(37, 34, 26, 1, 31, 'colors', 'colors', 30, 0, 0, '2020-02-06 09:56:47', '2020-02-06 09:56:47'),
(38, 34, 26, 1, 31, 'colors', 'colors', 32, 0, 0, '2020-02-06 09:56:47', '2020-02-06 09:56:47'),
(39, 0, 26, 1, 31, 'sizes', 'sizes', 0, 1, 1, '2020-02-06 09:56:47', '2020-02-06 09:56:47'),
(40, 39, 26, 1, 31, 'sizes', 'sizes', 3, 0, 0, '2020-02-06 09:56:47', '2020-02-06 09:56:47'),
(41, 39, 26, 1, 31, 'sizes', 'sizes', 4, 0, 0, '2020-02-06 09:56:47', '2020-02-06 09:56:47'),
(42, 39, 26, 1, 31, 'sizes', 'sizes', 5, 0, 0, '2020-02-06 09:56:47', '2020-02-06 09:56:47'),
(43, 39, 26, 1, 31, 'sizes', 'sizes', 6, 0, 0, '2020-02-06 09:56:48', '2020-02-06 09:56:48'),
(44, 39, 26, 1, 31, 'sizes', 'sizes', 7, 0, 0, '2020-02-06 09:56:48', '2020-02-06 09:56:48'),
(45, 39, 26, 1, 31, 'sizes', 'sizes', 8, 0, 0, '2020-02-06 09:56:48', '2020-02-06 09:56:48'),
(46, 0, 26, 1, 31, 'styles', 'styles', 0, 1, 0, '2020-02-06 09:56:48', '2020-02-06 09:56:48'),
(47, 46, 26, 1, 31, 'styles', 'styles', 10, 0, 0, '2020-02-06 09:56:48', '2020-02-06 09:56:48'),
(48, 46, 26, 1, 31, 'styles', 'styles', 25, 0, 0, '2020-02-06 09:56:48', '2020-02-06 09:56:48'),
(49, 46, 26, 1, 31, 'styles', 'styles', 35, 0, 0, '2020-02-06 09:56:48', '2020-02-06 09:56:48'),
(50, 0, 34, 1, 31, 'colors', 'colors', 0, 1, 1, '2020-02-07 09:39:11', '2020-02-07 09:39:11'),
(51, 50, 34, 1, 31, 'colors', 'colors', 13, 0, 0, '2020-02-07 09:39:11', '2020-02-07 09:39:11'),
(52, 50, 34, 1, 31, 'colors', 'colors', 32, 0, 0, '2020-02-07 09:39:11', '2020-02-07 09:39:11'),
(53, 0, 35, 2, 59, 'toppings', 'toppings', 0, 1, 1, '2020-02-11 02:19:46', '2020-02-11 02:19:46'),
(54, 53, 35, 2, 59, 'toppings', 'toppings', 37, 0, 0, '2020-02-11 02:19:46', '2020-02-11 02:19:46'),
(55, 53, 35, 2, 59, 'toppings', 'toppings', 38, 0, 0, '2020-02-11 02:19:46', '2020-02-11 02:19:46'),
(60, 0, 38, 2, 59, 'body-height', 'body-height', 0, 1, 1, '2020-02-11 03:28:12', '2020-02-11 03:28:12'),
(61, 60, 38, 2, 59, 'body-height', 'body-height', 39, 0, 0, '2020-02-11 03:28:12', '2020-02-11 03:28:12'),
(62, 60, 38, 2, 59, 'body-height', 'body-height', 40, 0, 0, '2020-02-11 03:28:12', '2020-02-11 03:28:12'),
(63, 60, 38, 2, 59, 'body-height', 'body-height', 41, 0, 0, '2020-02-11 03:28:12', '2020-02-11 03:28:12'),
(64, 0, 38, 2, 59, 'sizes', 'sizes', 0, 1, 1, '2020-02-11 03:28:12', '2020-02-11 03:28:12'),
(65, 64, 38, 2, 59, 'sizes', 'sizes', 4, 0, 0, '2020-02-11 03:28:12', '2020-02-11 03:28:12'),
(66, 64, 38, 2, 59, 'sizes', 'sizes', 5, 0, 0, '2020-02-11 03:28:12', '2020-02-11 03:28:12'),
(67, 64, 38, 2, 59, 'sizes', 'sizes', 6, 0, 0, '2020-02-11 03:28:12', '2020-02-11 03:28:12'),
(71, 0, 42, 1, 31, 'colors', 'colors', 0, 1, 1, '2020-02-11 07:09:57', '2020-02-11 07:09:57'),
(72, 71, 42, 1, 31, 'colors', 'colors', 22, 0, 0, '2020-02-11 07:09:57', '2020-02-11 07:09:57'),
(73, 71, 42, 1, 31, 'colors', 'colors', 32, 0, 0, '2020-02-11 07:09:57', '2020-02-11 07:09:57'),
(74, 0, 42, 1, 31, 'sizes', 'sizes', 0, 1, 1, '2020-02-11 07:09:58', '2020-02-11 07:09:58'),
(75, 74, 42, 1, 31, 'sizes', 'sizes', 3, 0, 0, '2020-02-11 07:09:58', '2020-02-11 07:09:58'),
(76, 74, 42, 1, 31, 'sizes', 'sizes', 4, 0, 0, '2020-02-11 07:09:58', '2020-02-11 07:09:58'),
(77, 74, 42, 1, 31, 'sizes', 'sizes', 5, 0, 0, '2020-02-11 07:09:58', '2020-02-11 07:09:58'),
(78, 74, 42, 1, 31, 'sizes', 'sizes', 6, 0, 0, '2020-02-11 07:09:58', '2020-02-11 07:09:58'),
(79, 74, 42, 1, 31, 'sizes', 'sizes', 7, 0, 0, '2020-02-11 07:09:58', '2020-02-11 07:09:58'),
(80, 74, 42, 1, 31, 'sizes', 'sizes', 8, 0, 0, '2020-02-11 07:09:58', '2020-02-11 07:09:58');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `subparent` int(11) DEFAULT NULL,
  `sorting` int(11) DEFAULT '0',
  `featured` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template_id` int(11) NOT NULL DEFAULT '1',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` longtext COLLATE utf8mb4_unicode_ci,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `label`, `slug`, `parent`, `subparent`, `sorting`, `featured`, `type`, `template_id`, `image`, `thumbnail_image`, `description`, `meta_title`, `meta_tag`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(156, 'Tennis', 'tennis', 0, 0, 1, 1, 'Course', 1, 'images/products/categories/1584008421ESobNfl47FLFjp5pDBgMfootballcoursesecbg.png', '', NULL, 'Category', 'Category', 'Category', '1', '2020-03-12 04:50:21', '2020-03-20 01:25:00'),
(157, 'Football', 'football', 0, 0, 2, 1, 'Course', 1, 'images/products/categories/1584008463hpmTUdwxhEuMv4WPh0nEfootballcoursesecbg.png', '', NULL, 'Category', 'Category', 'Category', '1', '2020-03-12 04:51:03', '2020-03-20 01:25:00'),
(158, 'Schools', 'schools', 0, 0, 3, 1, 'Course', 1, 'images/products/categories/1584008675bUn2L1KzDWADPykUuNijfootballcoursesecbg.png', '', NULL, 'Category', 'Category', 'Category', '1', '2020-03-12 04:54:35', '2020-03-20 01:25:00'),
(159, 'Beginner', 'beginner', 157, 0, 1, 1, 'Course', 1, 'images/products/categories/1584009035k2DcYpsL2ZsE3H59bMyZfootballcoursesecbg.png', '', NULL, 'Sub-category', 'Sub-category', 'Sub-category', '1', '2020-03-12 05:00:35', '2020-03-15 10:32:01'),
(160, 'Intermediate', 'intermediate', 157, 0, 2, 1, 'Course', 0, 'images/products/categories/1584009077PYjmnYjlEVUJcZf44cALfootballcoursesecbg.png', '', NULL, 'Sub-category', 'Sub-category', 'Sub-category', '1', '2020-03-12 05:01:17', '2020-03-15 10:32:01'),
(161, 'Advanced', 'advanced', 157, 0, 3, 1, 'Course', 1, 'images/products/categories/1584009111T9s4knrmnPBFEIgMIS7dfootballcoursesecbg.png', '', NULL, 'Sub-category', 'Sub-category', 'Sub-category', '1', '2020-03-12 05:01:51', '2020-03-15 10:32:01'),
(162, 'Mini Tots', 'mini-tots', 156, 0, 1, 1, 'Course', 0, 'images/products/categories/1584009142hkZvlmHmiOL16YSDhhyUfootballcoursesecbg.png', '', NULL, 'Sub-Category', 'Sub-Category', 'Sub-Category', '1', '2020-03-12 05:02:23', '2020-03-20 01:25:00'),
(163, 'Mini Red', 'mini-red', 156, 0, 2, 1, 'Course', 1, 'images/products/categories/1584009165fUaAwDlYT754VFXswgnXfootballcoursesecbg.png', '', NULL, 'Sub-Category', 'Sub-Category', 'Sub-Category', '1', '2020-03-12 05:02:45', '2020-03-20 01:25:00'),
(164, 'Mini Orange', 'mini-orange', 156, 0, 4, 1, 'Course', 1, 'images/products/categories/1584009187mzr2OLxNnTvIbVbDXvEMfootballcoursesecbg.png', '', NULL, 'Sub-Category', 'Sub-Category', 'Sub-Category', '1', '2020-03-12 05:03:07', '2020-03-20 01:25:00'),
(165, 'Mini Green', 'mini-green', 156, 0, 3, 1, 'Course', 1, 'images/products/categories/1584009208VknizKMITsxmClJM0zqdfootballcoursesecbg.png', '', NULL, 'Sub-Category', 'Sub-Category', 'Sub-Category', '1', '2020-03-12 05:03:28', '2020-03-20 01:25:00'),
(167, 'Juniors', 'juniors', 156, 0, 6, 1, 'Course', 1, 'images/products/categories/1584009316nsLpdTuMCjlwYBgfsy8Cfootballcoursesecbg.png', '', NULL, 'Sub-Category', 'Sub-Category', 'Sub-Category', '1', '2020-03-12 05:05:16', '2020-03-20 01:25:00'),
(168, 'Adults', 'adults', 156, 0, 7, 1, 'Course', 1, 'images/products/categories/1584009350wJxmuy4UEqmR7ColHjxUfootballcoursesecbg.png', '', NULL, 'Sub-Category', 'Sub-Category', 'Sub-Category', '1', '2020-03-12 05:05:50', '2020-03-20 01:25:00'),
(169, 'Beginner', 'mini-tots-beginner', 156, 162, 1, 0, 'Course', 0, '', '', NULL, 'Sub-category\'s level', 'Sub-category\'s level', 'Sub-category\'s level', '1', '2020-03-16 05:46:43', '2020-03-20 01:25:00'),
(170, 'Intermediate', 'mini-tots-intermediate', 156, 162, 2, 0, 'Course', 1, 'images/products/categories/1584357592beso7z2rGY6F4mYvnWjZfootballcoursesecbg.png', '', NULL, 'Sub-category\'s level', 'Sub-category\'s level', 'Sub-category\'s level', '1', '2020-03-16 05:49:52', '2020-03-20 01:25:00'),
(171, 'Advanced', 'mini-tots-advanced', 156, 162, 3, 0, 'Course', 1, 'images/products/categories/1584357744EqhzThc8RNf61g1kwWlbfootballcoursesecbg.png', '', NULL, 'Sub-category\'s level', 'Sub-category\'s level', 'Sub-category\'s level', '1', '2020-03-16 05:52:24', '2020-03-20 01:25:00'),
(172, 'Beginner', 'mini-red-beginner', 156, 163, 1, 0, 'Course', 1, '', '', NULL, 'Sub-category\'s level', 'Sub-category\'s level', 'Sub-category\'s level', '1', '2020-03-16 05:57:22', '2020-03-16 05:57:32'),
(173, 'Intermediate', 'mini-red-intermediate', 156, 163, 2, 0, 'Course', 1, 'images/products/categories/15843581731Hio8XIYbgpBKSeMImfzfootballcoursesecbg.png', '', NULL, 'Sub-category\'s level', 'Sub-category\'s level', 'Sub-category\'s level', '1', '2020-03-16 05:59:33', '2020-03-16 05:59:43'),
(174, 'Advanced', 'mini-red-advanced', 156, 163, 3, 0, 'Course', 1, '', '', NULL, 'Sub-category\'s level', 'Sub-category\'s level', 'Sub-category\'s level', '1', '2020-03-16 06:00:51', '2020-03-16 06:01:03'),
(175, 'Beginner', 'mini-orange-beginner', 156, 164, 1, 0, 'Course', 1, '', '', NULL, 'Sub-category\'s level', 'Sub-category\'s level', 'Sub-category\'s level', '1', '2020-03-16 05:57:22', '2020-03-16 05:57:32'),
(176, 'Intermediate', 'mini-orange-intermediate', 156, 164, 2, 0, 'Course', 1, 'images/products/categories/15843581731Hio8XIYbgpBKSeMImfzfootballcoursesecbg.png', '', NULL, 'Sub-category\'s level', 'Sub-category\'s level', 'Sub-category\'s level', '1', '2020-03-16 05:59:33', '2020-03-16 05:59:43'),
(177, 'Advanced', 'mini-orange-advanced', 156, 164, 3, 0, 'Course', 1, '', '', NULL, 'Sub-category\'s level', 'Sub-category\'s level', 'Sub-category\'s level', '1', '2020-03-16 06:00:51', '2020-03-16 06:01:03'),
(178, 'Beginner', 'mini-green-beginner', 156, 0, 5, 0, 'Course', 1, '', '', NULL, 'Sub-category\'s level', 'Sub-category\'s level', 'Sub-category\'s level', '1', '2020-03-16 05:57:22', '2020-03-20 01:25:00'),
(179, 'Intermediate', 'mini-green-intermediate', 156, 165, 1, 0, 'Course', 1, 'images/products/categories/15843581731Hio8XIYbgpBKSeMImfzfootballcoursesecbg.png', '', NULL, 'Sub-category\'s level', 'Sub-category\'s level', 'Sub-category\'s level', '1', '2020-03-16 05:59:33', '2020-03-18 04:18:00'),
(180, 'Advanced', 'mini-green-advanced', 156, 165, 2, 0, 'Course', 1, '', '', NULL, 'Sub-category\'s level', 'Sub-category\'s level', 'Sub-category\'s level', '1', '2020-03-16 06:00:51', '2020-03-18 04:18:00'),
(181, 'Beginner', 'juniors-beginner', 156, 167, 1, 0, 'Course', 1, '', '', NULL, 'Sub-category\'s level', 'Sub-category\'s level', 'Sub-category\'s level', '1', '2020-03-16 05:57:22', '2020-03-16 05:57:32'),
(182, 'Intermediate', 'juniors-intermediate', 156, 167, 2, 0, 'Course', 1, 'images/products/categories/15843581731Hio8XIYbgpBKSeMImfzfootballcoursesecbg.png', '', NULL, 'Sub-category\'s level', 'Sub-category\'s level', 'Sub-category\'s level', '1', '2020-03-16 05:59:33', '2020-03-16 05:59:43'),
(183, 'Advanced', 'juniors-advanced', 156, 167, 3, 0, 'Course', 1, '', '', NULL, 'Sub-category\'s level', 'Sub-category\'s level', 'Sub-category\'s level', '1', '2020-03-16 06:00:51', '2020-03-16 06:01:03'),
(184, 'Beginner', 'adults-beginner', 156, 168, 1, 0, 'Course', 1, '', '', NULL, 'Sub-category\'s level', 'Sub-category\'s level', 'Sub-category\'s level', '1', '2020-03-16 05:57:22', '2020-03-16 05:57:32'),
(185, 'Intermediate', 'adults-intermediate', 156, 168, 2, 0, 'Course', 1, 'images/products/categories/15843581731Hio8XIYbgpBKSeMImfzfootballcoursesecbg.png', '', NULL, 'Sub-category\'s level', 'Sub-category\'s level', 'Sub-category\'s level', '1', '2020-03-16 05:59:33', '2020-03-16 05:59:43'),
(186, 'Advanced', 'adults-advanced', 156, 168, 3, 0, 'Course', 1, '', '', NULL, 'Sub-category\'s level', 'Sub-category\'s level', 'Sub-category\'s level', '1', '2020-03-16 06:00:51', '2020-03-16 06:01:03');

-- --------------------------------------------------------

--
-- Table structure for table `product_category_brands`
--

CREATE TABLE `product_category_brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_category_brands`
--

INSERT INTO `product_category_brands` (`id`, `brand_id`, `category_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 3, 137, 'brands', '2020-01-31 09:35:16', '2020-01-31 09:35:16'),
(2, 1, 137, 'brands', '2020-01-31 09:35:16', '2020-01-31 09:35:16'),
(3, 5, 137, 'brands', '2020-01-31 09:35:16', '2020-01-31 09:35:16'),
(4, 2, 137, 'brands', '2020-01-31 09:35:16', '2020-01-31 09:35:16'),
(5, 4, 137, 'brands', '2020-01-31 09:35:16', '2020-01-31 09:35:16'),
(6, 3, 3, 'brands', '2020-02-06 02:53:14', '2020-02-06 02:53:14'),
(7, 1, 3, 'brands', '2020-02-06 02:53:14', '2020-02-06 02:53:14'),
(8, 5, 3, 'brands', '2020-02-06 02:53:14', '2020-02-06 02:53:14'),
(9, 2, 3, 'brands', '2020-02-06 02:53:14', '2020-02-06 02:53:14'),
(10, 4, 3, 'brands', '2020-02-06 02:53:14', '2020-02-06 02:53:14'),
(11, 3, 42, 'brands', '2020-02-25 06:07:25', '2020-02-25 06:07:25'),
(12, 1, 42, 'brands', '2020-02-25 06:07:25', '2020-02-25 06:07:25'),
(13, 5, 42, 'brands', '2020-02-25 06:07:25', '2020-02-25 06:07:25'),
(14, 2, 42, 'brands', '2020-02-25 06:07:25', '2020-02-25 06:07:25'),
(15, 4, 42, 'brands', '2020-02-25 06:07:25', '2020-02-25 06:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `product_category_variations`
--

CREATE TABLE `product_category_variations` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `parent` int(11) DEFAULT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_category_variations`
--

INSERT INTO `product_category_variations` (`id`, `category_id`, `parent`, `key`, `value`, `type`, `status`, `created_at`, `updated_at`) VALUES
(34, 5, NULL, 'colors', '2', 'colors', NULL, '2020-01-22 08:52:27', '2020-01-22 08:52:27'),
(35, 5, NULL, 'colors', '13', 'colors', NULL, '2020-01-22 08:52:27', '2020-01-22 08:52:27'),
(36, 5, NULL, 'styles', '10', 'styles', NULL, '2020-01-22 08:52:28', '2020-01-22 08:52:28'),
(37, 5, NULL, 'types', '9', 'types', NULL, '2020-01-22 08:52:28', '2020-01-22 08:52:28'),
(38, 5, NULL, 'sizes', '3', 'sizes', NULL, '2020-01-22 08:52:28', '2020-01-22 08:52:28'),
(39, 5, NULL, 'sizes', '4', 'sizes', NULL, '2020-01-22 08:52:28', '2020-01-22 08:52:28'),
(40, 5, NULL, 'sizes', '5', 'sizes', NULL, '2020-01-22 08:52:28', '2020-01-22 08:52:28'),
(41, 5, NULL, 'sizes', '6', 'sizes', NULL, '2020-01-22 08:52:28', '2020-01-22 08:52:28'),
(42, 5, NULL, 'sizes', '7', 'sizes', NULL, '2020-01-22 08:52:28', '2020-01-22 08:52:28'),
(43, 5, NULL, 'sizes', '8', 'sizes', NULL, '2020-01-22 08:52:28', '2020-01-22 08:52:28'),
(44, 5, NULL, 'by-robby-friedman', '14', 'by-robby-friedman', NULL, '2020-01-22 08:52:28', '2020-01-22 08:52:28'),
(57, 151, NULL, 'colors', '2', 'colors', NULL, '2020-01-27 05:43:14', '2020-01-27 05:43:14'),
(58, 151, NULL, 'colors', '13', 'colors', NULL, '2020-01-27 05:43:14', '2020-01-27 05:43:14'),
(59, 151, NULL, 'sizes', '15', 'sizes', NULL, '2020-01-27 05:43:14', '2020-01-27 05:43:14'),
(60, 151, NULL, 'sizes', '16', 'sizes', NULL, '2020-01-27 05:43:14', '2020-01-27 05:43:14'),
(85, 77, NULL, 'colors', '2', 'colors', NULL, '2020-01-31 02:22:04', '2020-01-31 02:22:04'),
(86, 77, NULL, 'colors', '13', 'colors', NULL, '2020-01-31 02:22:05', '2020-01-31 02:22:05'),
(87, 77, NULL, 'colors', '22', 'colors', NULL, '2020-01-31 02:22:05', '2020-01-31 02:22:05'),
(88, 77, NULL, 'styles', '10', 'styles', NULL, '2020-01-31 02:22:05', '2020-01-31 02:22:05'),
(89, 77, NULL, 'styles', '25', 'styles', NULL, '2020-01-31 02:22:05', '2020-01-31 02:22:05'),
(90, 77, NULL, 'types', '9', 'types', NULL, '2020-01-31 02:22:05', '2020-01-31 02:22:05'),
(91, 77, NULL, 'types', '27', 'types', NULL, '2020-01-31 02:22:05', '2020-01-31 02:22:05'),
(92, 77, NULL, 'toppins', '26', 'toppins', NULL, '2020-01-31 02:22:05', '2020-01-31 02:22:05'),
(93, 77, NULL, 'flavours', '23', 'flavours', NULL, '2020-01-31 02:22:05', '2020-01-31 02:22:05'),
(94, 77, NULL, 'weights', '17', 'weights', NULL, '2020-01-31 02:22:05', '2020-01-31 02:22:05'),
(95, 77, NULL, 'weights', '18', 'weights', NULL, '2020-01-31 02:22:05', '2020-01-31 02:22:05'),
(96, 77, NULL, 'weights', '19', 'weights', NULL, '2020-01-31 02:22:06', '2020-01-31 02:22:06'),
(97, 77, NULL, 'sizes', '4', 'sizes', NULL, '2020-01-31 02:22:06', '2020-01-31 02:22:06'),
(98, 77, NULL, 'sizes', '5', 'sizes', NULL, '2020-01-31 02:22:06', '2020-01-31 02:22:06'),
(99, 77, NULL, 'sizes', '6', 'sizes', NULL, '2020-01-31 02:22:06', '2020-01-31 02:22:06'),
(100, 77, NULL, 'sizes', '7', 'sizes', NULL, '2020-01-31 02:22:06', '2020-01-31 02:22:06'),
(101, 77, NULL, 'sizes', '8', 'sizes', NULL, '2020-01-31 02:22:06', '2020-01-31 02:22:06'),
(102, 77, NULL, 'sizes', '15', 'sizes', NULL, '2020-01-31 02:22:06', '2020-01-31 02:22:06'),
(103, 77, NULL, 'by-robby-friedman', '14', 'by-robby-friedman', NULL, '2020-01-31 02:22:06', '2020-01-31 02:22:06'),
(104, 77, NULL, 'by-robby-friedman', '21', 'by-robby-friedman', NULL, '2020-01-31 02:22:06', '2020-01-31 02:22:06'),
(238, 137, NULL, 'colors', '2', 'colors', NULL, '2020-02-04 08:25:28', '2020-02-04 08:25:28'),
(239, 137, NULL, 'colors', '13', 'colors', NULL, '2020-02-04 08:25:28', '2020-02-04 08:25:28'),
(240, 137, NULL, 'colors', '22', 'colors', NULL, '2020-02-04 08:25:28', '2020-02-04 08:25:28'),
(241, 137, NULL, 'colors', '29', 'colors', NULL, '2020-02-04 08:25:28', '2020-02-04 08:25:28'),
(242, 137, NULL, 'styles', '10', 'styles', NULL, '2020-02-04 08:25:28', '2020-02-04 08:25:28'),
(243, 137, NULL, 'styles', '25', 'styles', NULL, '2020-02-04 08:25:28', '2020-02-04 08:25:28'),
(244, 137, NULL, 'types', '9', 'types', NULL, '2020-02-04 08:25:28', '2020-02-04 08:25:28'),
(245, 137, NULL, 'types', '27', 'types', NULL, '2020-02-04 08:25:28', '2020-02-04 08:25:28'),
(246, 137, NULL, 'toppins', '26', 'toppins', NULL, '2020-02-04 08:25:28', '2020-02-04 08:25:28'),
(247, 137, NULL, 'flavours', '23', 'flavours', NULL, '2020-02-04 08:25:28', '2020-02-04 08:25:28'),
(248, 137, NULL, 'weights', '17', 'weights', NULL, '2020-02-04 08:25:28', '2020-02-04 08:25:28'),
(249, 137, NULL, 'weights', '18', 'weights', NULL, '2020-02-04 08:25:28', '2020-02-04 08:25:28'),
(250, 137, NULL, 'weights', '19', 'weights', NULL, '2020-02-04 08:25:28', '2020-02-04 08:25:28'),
(251, 137, NULL, 'weights', '28', 'weights', NULL, '2020-02-04 08:25:28', '2020-02-04 08:25:28'),
(252, 137, NULL, 'sizes', '3', 'sizes', NULL, '2020-02-04 08:25:28', '2020-02-04 08:25:28'),
(253, 137, NULL, 'sizes', '4', 'sizes', NULL, '2020-02-04 08:25:29', '2020-02-04 08:25:29'),
(254, 137, NULL, 'sizes', '5', 'sizes', NULL, '2020-02-04 08:25:29', '2020-02-04 08:25:29'),
(255, 137, NULL, 'sizes', '6', 'sizes', NULL, '2020-02-04 08:25:29', '2020-02-04 08:25:29'),
(256, 137, NULL, 'sizes', '7', 'sizes', NULL, '2020-02-04 08:25:29', '2020-02-04 08:25:29'),
(257, 137, NULL, 'sizes', '8', 'sizes', NULL, '2020-02-04 08:25:29', '2020-02-04 08:25:29'),
(258, 137, NULL, 'sizes', '15', 'sizes', NULL, '2020-02-04 08:25:29', '2020-02-04 08:25:29'),
(259, 137, NULL, 'sizes', '16', 'sizes', NULL, '2020-02-04 08:25:29', '2020-02-04 08:25:29'),
(260, 137, NULL, 'sizes', '24', 'sizes', NULL, '2020-02-04 08:25:29', '2020-02-04 08:25:29'),
(261, 137, NULL, 'by-robby-friedman', '14', 'by-robby-friedman', NULL, '2020-02-04 08:25:29', '2020-02-04 08:25:29'),
(262, 137, NULL, 'by-robby-friedman', '21', 'by-robby-friedman', NULL, '2020-02-04 08:25:29', '2020-02-04 08:25:29'),
(301, 3, NULL, 'colors', '2', 'colors', NULL, '2020-02-11 03:18:24', '2020-02-11 03:18:24'),
(302, 3, NULL, 'colors', '13', 'colors', NULL, '2020-02-11 03:18:24', '2020-02-11 03:18:24'),
(303, 3, NULL, 'colors', '22', 'colors', NULL, '2020-02-11 03:18:24', '2020-02-11 03:18:24'),
(304, 3, NULL, 'colors', '29', 'colors', NULL, '2020-02-11 03:18:24', '2020-02-11 03:18:24'),
(305, 3, NULL, 'colors', '30', 'colors', NULL, '2020-02-11 03:18:24', '2020-02-11 03:18:24'),
(306, 3, NULL, 'colors', '32', 'colors', NULL, '2020-02-11 03:18:24', '2020-02-11 03:18:24'),
(307, 3, NULL, 'colors', '33', 'colors', NULL, '2020-02-11 03:18:25', '2020-02-11 03:18:25'),
(308, 3, NULL, 'styles', '10', 'styles', NULL, '2020-02-11 03:18:25', '2020-02-11 03:18:25'),
(309, 3, NULL, 'styles', '25', 'styles', NULL, '2020-02-11 03:18:25', '2020-02-11 03:18:25'),
(310, 3, NULL, 'styles', '35', 'styles', NULL, '2020-02-11 03:18:25', '2020-02-11 03:18:25'),
(311, 3, NULL, 'types', '34', 'types', NULL, '2020-02-11 03:18:25', '2020-02-11 03:18:25'),
(312, 3, NULL, 'sizes', '3', 'sizes', NULL, '2020-02-11 03:18:25', '2020-02-11 03:18:25'),
(313, 3, NULL, 'sizes', '4', 'sizes', NULL, '2020-02-11 03:18:25', '2020-02-11 03:18:25'),
(314, 3, NULL, 'sizes', '5', 'sizes', NULL, '2020-02-11 03:18:25', '2020-02-11 03:18:25'),
(315, 3, NULL, 'sizes', '6', 'sizes', NULL, '2020-02-11 03:18:25', '2020-02-11 03:18:25'),
(316, 3, NULL, 'sizes', '7', 'sizes', NULL, '2020-02-11 03:18:25', '2020-02-11 03:18:25'),
(317, 3, NULL, 'sizes', '8', 'sizes', NULL, '2020-02-11 03:18:25', '2020-02-11 03:18:25'),
(318, 3, NULL, 'fabric', '36', 'fabric', NULL, '2020-02-11 03:18:25', '2020-02-11 03:18:25'),
(319, 3, NULL, 'toppings', '37', 'toppings', NULL, '2020-02-11 03:18:26', '2020-02-11 03:18:26'),
(320, 3, NULL, 'toppings', '38', 'toppings', NULL, '2020-02-11 03:18:26', '2020-02-11 03:18:26'),
(321, 3, NULL, 'body-height', '39', 'body-height', NULL, '2020-02-11 03:18:26', '2020-02-11 03:18:26'),
(322, 3, NULL, 'body-height', '40', 'body-height', NULL, '2020-02-11 03:18:26', '2020-02-11 03:18:26'),
(323, 3, NULL, 'body-height', '41', 'body-height', NULL, '2020-02-11 03:18:26', '2020-02-11 03:18:26'),
(324, 42, NULL, 'colors', '2', 'colors', NULL, '2020-02-25 06:07:23', '2020-02-25 06:07:23'),
(325, 42, NULL, 'colors', '13', 'colors', NULL, '2020-02-25 06:07:23', '2020-02-25 06:07:23'),
(326, 42, NULL, 'colors', '22', 'colors', NULL, '2020-02-25 06:07:23', '2020-02-25 06:07:23'),
(327, 42, NULL, 'colors', '29', 'colors', NULL, '2020-02-25 06:07:23', '2020-02-25 06:07:23'),
(328, 42, NULL, 'colors', '30', 'colors', NULL, '2020-02-25 06:07:23', '2020-02-25 06:07:23'),
(329, 42, NULL, 'colors', '32', 'colors', NULL, '2020-02-25 06:07:23', '2020-02-25 06:07:23'),
(330, 42, NULL, 'colors', '33', 'colors', NULL, '2020-02-25 06:07:23', '2020-02-25 06:07:23'),
(331, 42, NULL, 'styles', '10', 'styles', NULL, '2020-02-25 06:07:23', '2020-02-25 06:07:23'),
(332, 42, NULL, 'styles', '25', 'styles', NULL, '2020-02-25 06:07:23', '2020-02-25 06:07:23'),
(333, 42, NULL, 'styles', '35', 'styles', NULL, '2020-02-25 06:07:23', '2020-02-25 06:07:23'),
(334, 42, NULL, 'types', '9', 'types', NULL, '2020-02-25 06:07:23', '2020-02-25 06:07:23'),
(335, 42, NULL, 'types', '27', 'types', NULL, '2020-02-25 06:07:23', '2020-02-25 06:07:23'),
(336, 42, NULL, 'types', '34', 'types', NULL, '2020-02-25 06:07:23', '2020-02-25 06:07:23'),
(337, 42, NULL, 'toppins', '26', 'toppins', NULL, '2020-02-25 06:07:24', '2020-02-25 06:07:24'),
(338, 42, NULL, 'flavours', '23', 'flavours', NULL, '2020-02-25 06:07:24', '2020-02-25 06:07:24'),
(339, 42, NULL, 'weights', '17', 'weights', NULL, '2020-02-25 06:07:24', '2020-02-25 06:07:24'),
(340, 42, NULL, 'weights', '18', 'weights', NULL, '2020-02-25 06:07:24', '2020-02-25 06:07:24'),
(341, 42, NULL, 'weights', '19', 'weights', NULL, '2020-02-25 06:07:24', '2020-02-25 06:07:24'),
(342, 42, NULL, 'weights', '28', 'weights', NULL, '2020-02-25 06:07:24', '2020-02-25 06:07:24'),
(343, 42, NULL, 'sizes', '3', 'sizes', NULL, '2020-02-25 06:07:24', '2020-02-25 06:07:24'),
(344, 42, NULL, 'sizes', '4', 'sizes', NULL, '2020-02-25 06:07:24', '2020-02-25 06:07:24'),
(345, 42, NULL, 'sizes', '5', 'sizes', NULL, '2020-02-25 06:07:24', '2020-02-25 06:07:24'),
(346, 42, NULL, 'sizes', '6', 'sizes', NULL, '2020-02-25 06:07:24', '2020-02-25 06:07:24'),
(347, 42, NULL, 'sizes', '7', 'sizes', NULL, '2020-02-25 06:07:24', '2020-02-25 06:07:24'),
(348, 42, NULL, 'sizes', '8', 'sizes', NULL, '2020-02-25 06:07:24', '2020-02-25 06:07:24'),
(349, 42, NULL, 'sizes', '15', 'sizes', NULL, '2020-02-25 06:07:24', '2020-02-25 06:07:24'),
(350, 42, NULL, 'sizes', '16', 'sizes', NULL, '2020-02-25 06:07:24', '2020-02-25 06:07:24'),
(351, 42, NULL, 'sizes', '24', 'sizes', NULL, '2020-02-25 06:07:24', '2020-02-25 06:07:24'),
(352, 42, NULL, 'sizes', '31', 'sizes', NULL, '2020-02-25 06:07:25', '2020-02-25 06:07:25'),
(353, 42, NULL, 'by-robby-friedman', '14', 'by-robby-friedman', NULL, '2020-02-25 06:07:25', '2020-02-25 06:07:25'),
(354, 42, NULL, 'by-robby-friedman', '21', 'by-robby-friedman', NULL, '2020-02-25 06:07:25', '2020-02-25 06:07:25'),
(355, 42, NULL, 'fabric', '36', 'fabric', NULL, '2020-02-25 06:07:25', '2020-02-25 06:07:25'),
(356, 42, NULL, 'toppings', '37', 'toppings', NULL, '2020-02-25 06:07:25', '2020-02-25 06:07:25'),
(357, 42, NULL, 'toppings', '38', 'toppings', NULL, '2020-02-25 06:07:25', '2020-02-25 06:07:25'),
(358, 42, NULL, 'body-height', '39', 'body-height', NULL, '2020-02-25 06:07:25', '2020-02-25 06:07:25'),
(359, 42, NULL, 'body-height', '40', 'body-height', NULL, '2020-02-25 06:07:25', '2020-02-25 06:07:25'),
(360, 42, NULL, 'body-height', '41', 'body-height', NULL, '2020-02-25 06:07:25', '2020-02-25 06:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `product_id` int(11) NOT NULL DEFAULT '0',
  `variation_id` int(11) NOT NULL DEFAULT '0',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `product_id`, `variation_id`, `type`, `created_at`, `updated_at`) VALUES
(2, 'images/products/1579960951hOiXdz3S0g2zdvX0As79download.jpeg', 3, 0, 'product', '2020-01-25 08:32:31', '2020-01-25 08:32:31'),
(3, 'images/products/15799609514h2QrQTFVo6CaJcAxP85custompkgcardbg.jpeg', 3, 0, 'product', '2020-01-25 08:32:31', '2020-01-25 08:32:31'),
(4, 'images/products/1579960951zn7HNTgNXpPGtOHn9yaaeventthemebg.jpg', 3, 0, 'product', '2020-01-25 08:32:31', '2020-01-25 08:32:31'),
(5, 'images/products/1580119060ohsD4ylli9QQ8sXHRnW2plussizeweddingdressesimage.jpg', 3, 0, 'product', '2020-01-27 04:27:40', '2020-01-27 04:27:40'),
(6, 'images/products/1580119060OxON1VANNJnqSaWY3eBOeventthemebg.jpg', 3, 0, 'product', '2020-01-27 04:27:40', '2020-01-27 04:27:40'),
(7, 'images/products/15801206157auoxGdDRYbhGhgEgTdEproductimg1.jpg', 6, 0, 'product', '2020-01-27 04:53:35', '2020-01-27 04:53:35'),
(8, 'images/products/1580120616S4FAvl4YlY8h4VXYhK7Tproductimg3.jpg', 6, 0, 'product', '2020-01-27 04:53:36', '2020-01-27 04:53:36'),
(9, 'images/products/1580120616AkeKSQoYOLdRAQZKn4hWproductimg4.jpg', 6, 0, 'product', '2020-01-27 04:53:36', '2020-01-27 04:53:36'),
(10, 'images/products/1580120616f5YG0maHGx8HGSAANsnHproductimg2.jpg', 6, 0, 'product', '2020-01-27 04:53:36', '2020-01-27 04:53:36'),
(11, 'images/products/1580123816BQGEUxchmK0eLZOsSACoproductimg1.jpg', 6, 0, 'product', '2020-01-27 05:46:56', '2020-01-27 05:46:56'),
(12, 'images/products/1580123817ix3198PdWjVcUaS5Itglproductimg3.jpg', 6, 0, 'product', '2020-01-27 05:46:57', '2020-01-27 05:46:57'),
(13, 'images/products/15801238176qj76J7TJImx10keqnBPproductimg2.jpg', 6, 0, 'product', '2020-01-27 05:46:57', '2020-01-27 05:46:57'),
(15, 'images/products/1580215645GtQ3OY4xPNrawCKxmG94get.docx', 8, 0, 'product', '2020-01-28 07:17:25', '2020-01-28 07:17:25'),
(16, 'images/products/15802159049dz1iGyKJgBsqfw15H8Fproductimg3.jpg', 8, 0, 'product', '2020-01-28 07:21:44', '2020-01-28 07:21:44'),
(17, 'images/products/15802159042LgNbALKZfpYWyea0y3Eproductimg4.jpg', 8, 0, 'product', '2020-01-28 07:21:44', '2020-01-28 07:21:44'),
(18, 'images/products/1580215989bENRiclz3S9jz52R5c7cproductimg3.jpg', 8, 0, 'product', '2020-01-28 07:23:09', '2020-01-28 07:23:09'),
(19, 'images/products/1580215990L0DVfpNXAGEEdMQ9DcYGproductimg4.jpg', 8, 0, 'product', '2020-01-28 07:23:10', '2020-01-28 07:23:10'),
(21, 'images/products/15808201359GQJMwq4Eb8g62Ydfw1Q495755w_largesquaredisposablepaperpartyplatesgeomarblesetof83d6d49f6c7d313c3e3ad50e63325ede6.jpg', 7, 0, 'product', '2020-02-04 07:12:15', '2020-02-04 07:12:15'),
(22, 'images/products/1580977110M3uVSvJRoHV5ROk7OgWHxxlrockstaraquawhitehoodiewrathoriginalimafmdtnbwhphue5.jpeg', 20, 0, 'product', '2020-02-06 02:48:30', '2020-02-06 02:48:30'),
(23, 'images/products/1580977110g1te9UlW69BBTeaCiFaQxxlrockstaraquawhitehoodiewrathoriginalimafmdtnbepgvudz.jpeg', 20, 0, 'product', '2020-02-06 02:48:30', '2020-02-06 02:48:30'),
(24, 'images/products/1580977110U5fvfeXSTyoShY3ipqXFsrockstargraywhitehoodiewrathoriginalimafmdtnggwjgktg.jpeg', 20, 0, 'product', '2020-02-06 02:48:30', '2020-02-06 02:48:30'),
(25, 'images/products/1580977110ljPUT65SuR3lB9HtLtmQsts224wrathoriginalimafmgk3rwnpenhc.jpeg', 20, 0, 'product', '2020-02-06 02:48:30', '2020-02-06 02:48:30'),
(26, 'images/products/1580977110lVjv0dubkxrsKOtKGqf2srockstaraquawhitehoodiewrathoriginalimafmdtnjzrhtpz6.jpeg', 20, 0, 'product', '2020-02-06 02:48:30', '2020-02-06 02:48:30'),
(27, 'images/products/1580977110RBTXC5SI7GNgo0YtgOkSsrockstaraquawhitehoodiewrathoriginalimafmdtn2ztvgzxt.jpeg', 20, 0, 'product', '2020-02-06 02:48:30', '2020-02-06 02:48:30'),
(28, 'images/products/1580977110bOc94a7LRKVVV3mqB7tBmts223wrathoriginalimafmgk39asf3upa.jpeg', 20, 0, 'product', '2020-02-06 02:48:30', '2020-02-06 02:48:30'),
(29, 'images/products/1580977110HQVzGQ4REY4ohtl3EkGwlts222wrathoriginalimafmgk3gmbvzgfa.jpeg', 20, 0, 'product', '2020-02-06 02:48:30', '2020-02-06 02:48:30'),
(30, 'images/products/1581001823g5i0FAzp4vgXyABBs0C5xxlrockstaraquawhitehoodiewrathoriginalimafmdtnbwhphue5.jpeg', 26, 0, 'product', '2020-02-06 09:40:23', '2020-02-06 09:40:23'),
(31, 'images/products/1581001823IGle5pMoEfA8DoFsdMX7xxlrockstaraquawhitehoodiewrathoriginalimafmdtnbepgvudz.jpeg', 26, 0, 'product', '2020-02-06 09:40:23', '2020-02-06 09:40:23'),
(32, 'images/products/15810018239MsVCwjGP2c2DhAwtkCMsrockstargraywhitehoodiewrathoriginalimafmdtnggwjgktg.jpeg', 26, 0, 'product', '2020-02-06 09:40:23', '2020-02-06 09:40:23'),
(33, 'images/products/1581001823puQJq7oEdXD21fWxx1rLsts224wrathoriginalimafmgk3rwnpenhc.jpeg', 26, 0, 'product', '2020-02-06 09:40:23', '2020-02-06 09:40:23'),
(34, 'images/products/1581001823AsIoSg1su5HsJBd6MiRAsrockstaraquawhitehoodiewrathoriginalimafmdtnjzrhtpz6.jpeg', 26, 0, 'product', '2020-02-06 09:40:23', '2020-02-06 09:40:23'),
(35, 'images/products/1581001823YXsqQC99WW5GW11odkVDsrockstaraquawhitehoodiewrathoriginalimafmdtn2ztvgzxt.jpeg', 26, 0, 'product', '2020-02-06 09:40:23', '2020-02-06 09:40:23'),
(36, 'images/products/1581001823OH15XKdj64RmuxQwAUaYmts223wrathoriginalimafmgk39asf3upa.jpeg', 26, 0, 'product', '2020-02-06 09:40:23', '2020-02-06 09:40:23'),
(37, 'images/products/15810018239yDwdUTn7DD8aACjqWKYlts222wrathoriginalimafmgk3gmbvzgfa.jpeg', 26, 0, 'product', '2020-02-06 09:40:23', '2020-02-06 09:40:23'),
(38, 'images/products/1581088075YBv7QFZj4MtlGW14c5cpl61ywnleweloriginalimafgxd74c3bqec9.jpeg', 34, 0, 'product', '2020-02-07 09:37:55', '2020-02-07 09:37:55'),
(39, 'images/products/1581088075odOveGq4lHhvMtFvUbvMm61ywnleweloriginalimafgxd7dfg7uub2.jpeg', 34, 0, 'product', '2020-02-07 09:37:55', '2020-02-07 09:37:55'),
(40, 'images/products/1581088075Xktj5edw2H8EusEDyp5Ql62rwnleweloriginalimafgxd736jdh6dk.jpeg', 34, 0, 'product', '2020-02-07 09:37:55', '2020-02-07 09:37:55'),
(41, 'images/products/1581088075gtV1pxjypAvy8rGu2h6Il24gmwbleweloriginalimaf9bszwayhtb3r.jpeg', 34, 0, 'product', '2020-02-07 09:37:55', '2020-02-07 09:37:55'),
(42, 'images/products/1581406647wOM8kOlKESqk33ECAKQtAuthenticRoyalBlueShirtforMen5263747.jpg', 35, 0, 'product', '2020-02-11 02:07:27', '2020-02-11 02:07:27'),
(43, 'images/products/1581406647SbuInt9rgfobipAfiFmy46bfrybluesht02beingfaboriginalimaekjr8ymhnxznp.jpeg', 35, 0, 'product', '2020-02-11 02:07:27', '2020-02-11 02:07:27'),
(44, 'images/products/1581406647UY4IDdKgXVtemvoZb8Rg71XRP6p7_RL._UL1500_.jpg', 35, 0, 'product', '2020-02-11 02:07:27', '2020-02-11 02:07:27'),
(45, 'images/products/15814111644sMGWOjlslx8O7PNe47246bfrybluesht02beingfaboriginalimaekjr8ymhnxznp.jpeg', 38, 0, 'product', '2020-02-11 03:22:44', '2020-02-11 03:22:44'),
(46, 'images/products/1581411164uPDi8asBDDbivZiJichlAuthenticRoyalBlueShirtforMen5263747.jpg', 38, 0, 'product', '2020-02-11 03:22:44', '2020-02-11 03:22:44'),
(47, 'images/products/1581411164D2A4fHrYIXElmp16X3pt71XRP6p7_RL._UL1500_.jpg', 38, 0, 'product', '2020-02-11 03:22:44', '2020-02-11 03:22:44'),
(48, 'images/products/1581424726N4ByVidtBfPCsBAifM4Y44pcsfcslbe59477peterenglandoriginalimafnwjx2ymghewq.jpeg', 42, 0, 'product', '2020-02-11 07:08:46', '2020-02-11 07:08:46'),
(49, 'images/products/1581424726JwlCxMUVHoCbCFOw9ujV44pcsfcslbe59477peterenglandoriginalimafnwjxgzdxewxz.jpeg', 42, 0, 'product', '2020-02-11 07:08:46', '2020-02-11 07:08:46'),
(50, 'images/products/1581424726NpkmQGH7Ds3erYER22iZ44pcsfcslbe59477peterenglandoriginalimafnwjxmnbyu4am.jpeg', 42, 0, 'product', '2020-02-11 07:08:46', '2020-02-11 07:08:46'),
(51, 'images/products/1581424726rPFpKl0SkybVSbcbtvQu44pcsfcslbe59477peterenglandoriginalimafnwjxhnu2hhhj.jpeg', 42, 0, 'product', '2020-02-11 07:08:46', '2020-02-11 07:08:46'),
(53, 'images/products/1582629576yIIGtSF6zbM9mSewQteAmts223wrathoriginalimafmgk39asf3upa.jpeg', 42, 0, 'product', '2020-02-25 05:49:36', '2020-02-25 05:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `product_inventories`
--

CREATE TABLE `product_inventories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT '0',
  `shop_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `variation_id` int(11) DEFAULT '0',
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `stock` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `lowInStock` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_inventories`
--

INSERT INTO `product_inventories` (`id`, `parent`, `product_id`, `shop_id`, `user_id`, `variation_id`, `sku`, `stock`, `status`, `lowInStock`, `created_at`, `updated_at`) VALUES
(1, 0, 26, 1, 31, 1, 'SKU1', 0, 0, 10, '2020-02-06 09:43:38', '2020-02-07 09:06:26'),
(2, 0, 26, 1, 31, 5, 'SKU2', 1, 0, 10, '2020-02-06 09:44:29', '2020-02-10 03:38:35'),
(3, 0, 26, 1, 31, 9, 'SKU3', 11, 0, 10, '2020-02-06 09:45:21', '2020-02-06 09:45:21'),
(4, 0, 26, 1, 31, 13, '2525', 11, 0, 10, '2020-02-06 09:46:06', '2020-02-06 09:46:06'),
(5, 0, 26, 1, 31, 17, '525', 11, 0, 10, '2020-02-06 09:46:44', '2020-02-06 09:46:44'),
(6, 0, 26, 1, 31, 21, 'SKU5', 8, 0, 10, '2020-02-06 09:47:35', '2020-02-07 09:26:30'),
(7, 0, 26, 1, 31, 25, 'SKU100', 10, 0, 10, '2020-02-06 09:48:21', '2020-02-07 09:26:30'),
(8, 0, 35, 2, 59, 52, 'SKU980980', 14, 0, 1, '2020-02-11 02:21:44', '2020-02-11 03:07:23'),
(9, 0, 35, 2, 59, 54, 'SKU7867878', 20, 0, 1, '2020-02-11 02:22:39', '2020-02-11 02:22:39'),
(10, 0, 38, 2, 59, 59, 'SKU7858585', 5, 0, 1, '2020-02-11 03:25:59', '2020-02-11 03:25:59'),
(11, 0, 38, 2, 59, 61, 'SKU17867', 20, 0, 2, '2020-02-11 03:27:04', '2020-02-11 03:27:04'),
(12, 0, 38, 2, 59, 67, 'SKU7861', 9, 0, 1, '2020-02-11 03:33:05', '2020-02-11 03:45:52'),
(13, 0, 42, 1, 31, 76, 'fsdasasas', 25, 0, 10, '2020-02-11 07:10:50', '2020-02-11 07:10:50'),
(14, 0, 42, 1, 31, 79, '112sd213', 52, 0, 15, '2020-02-11 07:11:27', '2020-02-11 07:11:27');

-- --------------------------------------------------------

--
-- Table structure for table `product_variations`
--

CREATE TABLE `product_variations` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent` int(11) DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` longtext COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variations`
--

INSERT INTO `product_variations` (`id`, `parent`, `name`, `data`, `type`, `status`, `created_at`, `updated_at`) VALUES
(2, NULL, 'Maroon', '{"_token":"0TcuMtID41JfwzoWCo8q7z267cslX8JplD7bcZog","type":"colors","name":"Maroon","color":"#6f0606"}', 'colors', 1, '2020-01-16 03:56:43', '2020-01-17 07:46:46'),
(3, NULL, 'sm', '{"attributes":{},"request":{},"query":{},"server":{},"files":{},"cookies":{},"headers":{}}', 'sizes', 1, '2020-01-16 03:57:26', '2020-01-16 03:57:26'),
(4, NULL, 'M', '{"attributes":{},"request":{},"query":{},"server":{},"files":{},"cookies":{},"headers":{}}', 'sizes', 1, '2020-01-16 03:57:51', '2020-01-16 03:57:51'),
(5, NULL, 'L', '{"_token":"9kftwU0NZV8g1Q9jgRYVOwYLqDtifuZP0WvzN7QG","type":"sizes","name":"L"}', 'sizes', 1, '2020-01-16 03:57:56', '2020-01-20 23:58:04'),
(6, NULL, 'XL', '{"attributes":{},"request":{},"query":{},"server":{},"files":{},"cookies":{},"headers":{}}', 'sizes', 1, '2020-01-16 03:58:04', '2020-01-16 03:58:04'),
(7, NULL, 'XXL', '{"attributes":{},"request":{},"query":{},"server":{},"files":{},"cookies":{},"headers":{}}', 'sizes', 1, '2020-01-16 03:58:10', '2020-01-16 03:58:10'),
(8, NULL, 'XXXL', '{"attributes":{},"request":{},"query":{},"server":{},"files":{},"cookies":{},"headers":{}}', 'sizes', 1, '2020-01-16 03:58:15', '2020-01-16 03:58:15'),
(9, NULL, 'Wedding', '{"_token":"9kftwU0NZV8g1Q9jgRYVOwYLqDtifuZP0WvzN7QG","type":"types","name":"Wedding"}', 'types', 1, '2020-01-16 03:59:57', '2020-01-21 01:36:17'),
(10, NULL, 'Full Sleeve', '{"attributes":{},"request":{},"query":{},"server":{},"files":{},"cookies":{},"headers":{}}', 'styles', 1, '2020-01-16 04:00:29', '2020-01-16 04:00:29'),
(11, NULL, 'Cotton', '{"attributes":{},"request":{},"query":{},"server":{},"files":{},"cookies":{},"headers":{}}', 'materials', 1, '2020-01-16 04:01:13', '2020-01-16 04:01:13'),
(12, NULL, 'Woolen', '{"attributes":{},"request":{},"query":{},"server":{},"files":{},"cookies":{},"headers":{}}', 'materials', 1, '2020-01-16 04:09:04', '2020-01-16 04:09:04'),
(13, NULL, 'Red', '{"_token":"0TcuMtID41JfwzoWCo8q7z267cslX8JplD7bcZog","type":"colors","name":"Red","color":"#ff0000"}', 'colors', 1, '2020-01-16 06:02:08', '2020-01-17 07:46:30'),
(14, 0, 'sadsa', '{"_token":"QIYNzJHASN4ZrbLnE3lJkq8yK5xSK13N7TSS84sG","type":"by-robby-friedman","name":"sadsa"}', 'by-robby-friedman', 1, '2020-01-22 02:08:02', '2020-01-22 02:08:02'),
(15, 0, '5 UK', '{"_token":"XuNDBEUmgGQjfTWt0X1oaE5DUGNZrcKrUw0LhqT1","type":"sizes","name":"5 UK"}', 'sizes', 1, '2020-01-27 04:55:15', '2020-01-27 04:55:15'),
(16, 0, '9 Uk', '{"_token":"XuNDBEUmgGQjfTWt0X1oaE5DUGNZrcKrUw0LhqT1","type":"sizes","name":"9 Uk"}', 'sizes', 1, '2020-01-27 04:55:24', '2020-01-27 04:55:24'),
(17, 0, '1 KG', '{"_token":"j7RAj0lVjP1aMxGttq7qI3sq37iqUPeUuzLidrzD","type":"weights","name":"1 KG"}', 'weights', 1, '2020-01-28 07:27:27', '2020-01-28 07:27:27'),
(18, 0, '2 KG', '{"_token":"j7RAj0lVjP1aMxGttq7qI3sq37iqUPeUuzLidrzD","type":"weights","name":"2 KG"}', 'weights', 1, '2020-01-28 07:27:33', '2020-01-28 07:27:33'),
(19, 0, '1 POUND', '{"_token":"j7RAj0lVjP1aMxGttq7qI3sq37iqUPeUuzLidrzD","type":"weights","name":"1 POUND"}', 'weights', 1, '2020-01-28 07:27:49', '2020-01-28 07:27:49'),
(21, 0, 'Cakes', '{"_token":"z3PEJnCC6Z7BiGvYh1aN4Nq3GthCT6SA0vVE6LSL","type":"by-robby-friedman","name":"Cakes"}', 'by-robby-friedman', 1, '2020-01-28 08:19:02', '2020-01-28 08:19:02'),
(22, 0, 'Green', '{"_token":"LTewn48vGIfsiUaaqE5uyQo4vER8DNOr5G9RgpcK","type":"colors","name":"Green","color":"#00ff00"}', 'colors', 1, '2020-01-28 08:22:22', '2020-01-31 03:00:48'),
(23, 0, 'Strawbery', '{"_token":"z3PEJnCC6Z7BiGvYh1aN4Nq3GthCT6SA0vVE6LSL","type":"flavours","name":"Strawbery"}', 'flavours', 1, '2020-01-28 08:22:42', '2020-01-28 08:22:42'),
(24, 0, '9UK', '{"_token":"z3PEJnCC6Z7BiGvYh1aN4Nq3GthCT6SA0vVE6LSL","type":"sizes","name":"9UK"}', 'sizes', 1, '2020-01-28 08:23:01', '2020-01-28 08:23:01'),
(25, 0, 'Half Sleeve', '{"_token":"z3PEJnCC6Z7BiGvYh1aN4Nq3GthCT6SA0vVE6LSL","type":"styles","name":"Half Sleeve"}', 'styles', 1, '2020-01-28 08:23:22', '2020-01-28 08:23:22'),
(26, 0, 'Oak Harbo', '{"_token":"z3PEJnCC6Z7BiGvYh1aN4Nq3GthCT6SA0vVE6LSL","type":"toppins","name":"Oak Harbo"}', 'toppins', 1, '2020-01-28 08:24:42', '2020-01-28 08:24:42'),
(27, 0, 'Reception', '{"_token":"z3PEJnCC6Z7BiGvYh1aN4Nq3GthCT6SA0vVE6LSL","type":"types","name":"Reception"}', 'types', 1, '2020-01-28 08:24:57', '2020-01-28 08:24:57'),
(28, 0, '9KG', '{"_token":"z3PEJnCC6Z7BiGvYh1aN4Nq3GthCT6SA0vVE6LSL","type":"weights","name":"9KG"}', 'weights', 1, '2020-01-28 08:25:17', '2020-01-28 08:25:17'),
(29, 0, 'Rose Gold', '{"_token":"C8wYnrgWsHgl7T1er01YUcTKSrOkY8oszB8twxhP","type":"colors","name":"Rose Gold","color":"#ac7575"}', 'colors', 1, '2020-02-04 07:29:56', '2020-02-04 07:29:56'),
(30, 0, 'White', '{"_token":"C8wYnrgWsHgl7T1er01YUcTKSrOkY8oszB8twxhP","type":"colors","name":"White","color":"#ffffff"}', 'colors', 1, '2020-02-04 08:05:43', '2020-02-04 08:05:43'),
(31, 0, '3 1/2" (W) x 5 1/4" (H)', '{"_token":"C8wYnrgWsHgl7T1er01YUcTKSrOkY8oszB8twxhP","type":"sizes","name":"3 1\\/2\\" (W) x 5 1\\/4\\" (H)"}', 'sizes', 1, '2020-02-04 08:06:15', '2020-02-04 08:06:15'),
(32, 0, 'Gray', '{"_token":"wjA7uvH4YLugXwcxpgcNjzXW96AXLEX3xgYvDsIs","type":"colors","name":"Gray","color":"#cdc5c5"}', 'colors', 1, '2020-02-06 02:45:47', '2020-02-06 02:45:47'),
(33, 0, 'Blue', '{"_token":"wjA7uvH4YLugXwcxpgcNjzXW96AXLEX3xgYvDsIs","type":"colors","name":"Blue","color":"#5c2eff"}', 'colors', 1, '2020-02-06 02:46:15', '2020-02-06 02:46:15'),
(34, 0, 'Hooded Neck', '{"_token":"wjA7uvH4YLugXwcxpgcNjzXW96AXLEX3xgYvDsIs","type":"types","name":"Hooded Neck"}', 'types', 1, '2020-02-06 02:49:48', '2020-02-06 02:49:48'),
(35, 0, 'Rockstar Gray & White Hoodie', '{"_token":"wjA7uvH4YLugXwcxpgcNjzXW96AXLEX3xgYvDsIs","type":"styles","name":"Rockstar Gray & White Hoodie"}', 'styles', 1, '2020-02-06 02:50:18', '2020-02-06 02:50:18'),
(36, 0, 'Pure Cotton', '{"_token":"wjA7uvH4YLugXwcxpgcNjzXW96AXLEX3xgYvDsIs","type":"fabric","name":"Pure Cotton"}', 'fabric', 1, '2020-02-06 02:51:50', '2020-02-06 02:51:50'),
(37, 0, '100CM', '{"_token":"xcPXEVokyJ0mJE04QbhBjZgazmtXVhI5C2bnJeQo","type":"toppings","name":"100CM"}', 'toppings', 1, '2020-02-11 02:02:27', '2020-02-11 02:02:27'),
(38, 0, '200CM', '{"_token":"xcPXEVokyJ0mJE04QbhBjZgazmtXVhI5C2bnJeQo","type":"toppings","name":"200CM"}', 'toppings', 1, '2020-02-11 02:02:33', '2020-02-11 02:02:33'),
(39, 0, '100CM', '{"_token":"i9SN1iVrF5dLQ21i3RW9ncqzBHSBTDBokzbXbLLk","type":"body-height","name":"100CM"}', 'body-height', 1, '2020-02-11 03:17:37', '2020-02-11 03:17:37'),
(40, 0, '200CM', '{"_token":"i9SN1iVrF5dLQ21i3RW9ncqzBHSBTDBokzbXbLLk","type":"body-height","name":"200CM"}', 'body-height', 1, '2020-02-11 03:17:45', '2020-02-11 03:17:45'),
(41, 0, '300CM', '{"_token":"i9SN1iVrF5dLQ21i3RW9ncqzBHSBTDBokzbXbLLk","type":"body-height","name":"300CM"}', 'body-height', 1, '2020-02-11 03:17:51', '2020-02-11 03:17:51');

-- --------------------------------------------------------

--
-- Table structure for table `rejection_reasons`
--

CREATE TABLE `rejection_reasons` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `reason` longtext COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rejection_reasons`
--

INSERT INTO `rejection_reasons` (`id`, `type_id`, `reason`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, '<p>we4444444444qrrrrrrrre4wtt45adsewe</p>\r\n\r\n<p>ojhaef</p>\r\n\r\n<p>khjh</p>\r\n\r\n<p>nhjhsdg</p>\r\n\r\n<p>hjher</p>\r\n\r\n<p>\\hjhfrs</p>\r\n\r\n<p>ljhljrt</p>', 'shop', '2020-02-17 08:44:10', '2020-02-17 08:44:10'),
(2, 1, '<p>we4444444444qrrrrrrrre4wtt45adsewe</p>\r\n\r\n<p>ojhaef</p>\r\n\r\n<p>khjh</p>\r\n\r\n<p>nhjhsdg</p>\r\n\r\n<p>hjher</p>\r\n\r\n<p>\\hjhfrs</p>\r\n\r\n<p>ljhljrt</p>', 'shop', '2020-02-17 08:46:51', '2020-02-17 08:46:51'),
(3, 1, '<p>asssssssssss</p>', 'shop', '2020-02-17 08:54:15', '2020-02-17 08:54:15'),
(4, 1, 'Shop Approved', 'shop', '2020-02-17 09:25:01', '2020-02-17 09:25:01'),
(5, 1, 'Shop Approved', 'shop', '2020-02-17 09:27:03', '2020-02-17 09:27:03'),
(6, 4, '<p>rejected</p>', 'shop', '2020-02-17 09:33:37', '2020-02-17 09:33:37'),
(7, 1, 'User has been changed something in shop settings', 'shop', '2020-02-17 10:05:51', '2020-02-17 10:05:51'),
(8, 1, 'Shop Approved', 'shop', '2020-02-17 10:06:26', '2020-02-17 10:06:26'),
(9, 39, '<p><strong>asssssssssssas</strong></p>', 'product', '2020-02-18 02:16:27', '2020-02-18 02:16:27'),
(10, 39, '<p>sweeeeeeeeee r</p>\r\n\r\n<p>erererer</p>', 'product', '2020-02-18 02:17:26', '2020-02-18 02:17:26'),
(11, 40, '<p>ssssssssssqwewqqqqqqqqqqqqqqqqqq</p>', 'product', '2020-02-18 02:19:47', '2020-02-18 02:19:47'),
(12, 41, '<p>sddddddddddddddddddddd</p>', 'product', '2020-02-18 02:21:52', '2020-02-18 02:21:52'),
(13, 41, '<p>sddddddddddddddddddddd</p>', 'product', '2020-02-18 02:24:42', '2020-02-18 02:24:42'),
(14, 38, '<p>daswrrrrrrrrrrrrrrrrrs</p>', 'product', '2020-02-18 02:37:55', '2020-02-18 02:37:55'),
(15, 38, 'Product is Approved', 'product', '2020-02-18 02:51:13', '2020-02-18 02:51:13'),
(16, 26, 'Product is Approved', 'product', '2020-02-18 02:55:39', '2020-02-18 02:55:39'),
(17, 34, 'Product is Approved', 'product', '2020-02-18 02:55:58', '2020-02-18 02:55:58'),
(18, 42, 'Product is Approved', 'product', '2020-02-18 02:56:16', '2020-02-18 02:56:16'),
(19, 26, 'User has been changed something in shop settings', 'product', '2020-02-18 04:19:52', '2020-02-18 04:19:52'),
(20, 26, 'User has been changed something in shop settings', 'product', '2020-02-18 04:20:26', '2020-02-18 04:20:26'),
(21, 42, 'User has been changed something in shop settings', 'product', '2020-02-25 05:49:36', '2020-02-25 05:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `review` longtext COLLATE utf8mb4_unicode_ci,
  `product_id` int(11) DEFAULT NULL,
  `rating` double DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `images` longtext COLLATE utf8mb4_unicode_ci,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `title`, `review`, `product_id`, `rating`, `type`, `order_id`, `images`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum dolor sit', 'hello', 26, 5, 'products', 4, NULL, 32, '2020-02-10 09:36:29', '2020-02-10 09:36:29'),
(2, 'Lorem ipsum dolor sit', 'hello', 26, 4, 'products', 4, NULL, 32, '2020-02-10 09:36:29', '2020-02-10 09:36:29'),
(3, 'Lorem ipsum dolor sit', 'hello', 26, 3, 'products', 4, NULL, 32, '2020-02-10 09:36:29', '2020-02-10 09:36:29');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', '2020-03-05 18:30:00', '2020-03-05 18:30:00'),
(2, 'parent', 'Parent', '2020-03-05 18:30:00', '2020-03-05 18:30:00'),
(3, 'coach', 'Coach', '2020-03-05 18:30:00', '2020-03-05 18:30:00'),
(4, 'child', 'Child', '2020-03-05 18:30:00', '2020-03-05 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `seasons`
--

CREATE TABLE `seasons` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seasons`
--

INSERT INTO `seasons` (`id`, `name`, `description`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hots', 'Hot Desi', 'hots', NULL, 1, '2019-11-13 15:07:45', '2019-12-20 06:01:49'),
(2, 'Summer Season', 'Summer Desc', 'summer-season', NULL, 1, '2019-11-15 04:17:49', '2019-11-18 03:57:16'),
(3, 'Winter season', 'Winter season desc', 'my-new-season', NULL, 1, '2019-11-15 22:57:50', '2019-11-15 23:00:14'),
(4, 'Rainy Season', 'The wet season is the time of year', 'rainy-season', NULL, 1, '2019-11-19 04:09:51', '2019-12-20 06:12:28'),
(5, 'Rainy', 'The wet season (sometimes called the rainy season) is the time of year when most of a region\'s average annual rainfall occurs. Generally the season lasts at least a month. ... When the wet season occurs during a warm season, or summer, precipitation falls mainly during the late afternoon and early evening.', 'rainy', NULL, 1, '2019-12-05 05:00:37', '2019-12-20 06:04:51');

-- --------------------------------------------------------

--
-- Table structure for table `service_aproval_processes`
--

CREATE TABLE `service_aproval_processes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `vendor_service_id` int(11) DEFAULT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyValue` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_aproval_processes`
--

INSERT INTO `service_aproval_processes` (`id`, `user_id`, `parent`, `vendor_service_id`, `key`, `keyValue`, `created_at`, `updated_at`) VALUES
(61, 42, 0, 11, 'comment', 'Dummy Description', '2019-11-26 03:29:29', '2019-11-26 03:29:29'),
(62, 42, 0, 11, 'faq_comment', 'You Faqs are not good please change this ASAP for reapproval', '2019-11-26 03:29:29', '2019-11-26 03:29:29'),
(77, 34, 0, 16, 'comment', 'red', '2019-12-02 03:59:49', '2019-12-02 03:59:49'),
(78, 34, 0, 16, 'photo_comment', 'pp asxc', '2019-12-02 03:59:49', '2019-12-02 03:59:49'),
(79, 34, 0, 16, 'prohibtion_estrictions_comment', 'pro cmd', '2019-12-02 03:59:49', '2019-12-02 03:59:49'),
(83, 34, 0, 14, 'comment', 'cmt', '2019-12-02 04:04:37', '2019-12-02 04:04:37'),
(84, 34, 0, 14, 'basic_info_comment', 'b cmd', '2019-12-02 04:04:37', '2019-12-02 04:04:37'),
(85, 34, 0, 14, 'photo_comment', 'p cmd', '2019-12-02 04:04:37', '2019-12-02 04:04:37'),
(92, 34, 0, 25, 'comment', 'rej cmt', '2019-12-02 04:43:48', '2019-12-02 04:43:48'),
(93, 34, 0, 25, 'venue_comment', 'v cmt', '2019-12-02 04:43:48', '2019-12-02 04:43:48'),
(107, 34, 0, 15, 'comment', 'cts', '2019-12-02 05:16:20', '2019-12-02 05:16:20'),
(108, 34, 0, 15, 'photo_comment', 'p ct', '2019-12-02 05:16:20', '2019-12-02 05:16:20'),
(109, 31, 0, 52, 'comment', 'heloo', '2020-01-22 00:56:39', '2020-01-22 00:56:39'),
(110, 31, 0, 52, 'basic_info_comment', 'dd', '2020-01-22 00:56:39', '2020-01-22 00:56:39'),
(111, 31, 0, 52, 'photo_comment', 'dfdf', '2020-01-22 00:56:39', '2020-01-22 00:56:39'),
(112, 31, 0, 52, 'faq_comment', 'fstty', '2020-01-22 00:56:39', '2020-01-22 00:56:39'),
(113, 31, 0, 52, 'description_comment', 'ht', '2020-01-22 00:56:39', '2020-01-22 00:56:39'),
(114, 31, 0, 52, 'amenity_comment', 'tyty', '2020-01-22 00:56:40', '2020-01-22 00:56:40'),
(115, 31, 0, 52, 'deal_comment', 'tytyt', '2020-01-22 00:56:40', '2020-01-22 00:56:40'),
(116, 31, 0, 52, 'prohibtion_estrictions_comment', 'ght', '2020-01-22 00:56:40', '2020-01-22 00:56:40');

-- --------------------------------------------------------

--
-- Table structure for table `shop_cart_items`
--

CREATE TABLE `shop_cart_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT '0',
  `variant_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL DEFAULT '0',
  `price` double NOT NULL DEFAULT '0',
  `vendor_id` int(11) NOT NULL DEFAULT '0',
  `shop_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` int(11) DEFAULT NULL,
  `total` double NOT NULL DEFAULT '0',
  `order_id` int(11) NOT NULL DEFAULT '0',
  `orderID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cart',
  `payment_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_cart_items`
--

INSERT INTO `shop_cart_items` (`id`, `product_id`, `variant_id`, `user_id`, `quantity`, `price`, `vendor_id`, `shop_id`, `created_at`, `updated_at`, `name`, `total`, `order_id`, `orderID`, `type`, `payment_status`) VALUES
(2, 26, 21, 32, 3, 600, 31, 1, '2020-02-07 03:29:03', '2020-02-07 09:26:30', NULL, 1800, 5, '#ENVSHOP1581044188', 'order', 1),
(5, 26, 9, 32, 8, 549, 31, 1, '2020-02-07 07:44:17', '2020-02-07 09:06:26', NULL, 4392, 4, '#ENVSHOP1581042984', 'order', 1),
(6, 26, 25, 32, 1, 386, 31, 1, '2020-02-07 09:15:07', '2020-02-07 09:26:30', NULL, 386, 5, '#ENVSHOP1581044188', 'order', 1),
(7, 34, 0, 32, 10, 550, 31, 1, '2020-02-07 09:59:58', '2020-02-07 10:03:59', NULL, 5500, 6, '#ENVSHOP1581046438', 'order', 1),
(8, 34, 0, 32, 1, 550, 31, 1, '2020-02-07 10:05:11', '2020-02-07 10:05:43', NULL, 550, 7, '#ENVSHOP1581046542', 'order', 1),
(9, 26, 5, 32, 1, 479, 31, 1, '2020-02-10 03:39:07', '2020-02-10 04:05:15', NULL, 479, 0, NULL, 'cart', 0),
(10, 26, 17, 32, 6, 479, 31, 1, '2020-02-10 05:33:43', '2020-02-22 08:07:49', NULL, 2874, 0, NULL, 'cart', 0),
(11, 35, 52, 60, 1, 50, 59, 2, '2020-02-11 02:43:10', '2020-02-11 03:07:23', NULL, 50, 9, '#ENVSHOP1581410242', 'order', 1),
(12, 38, 67, 60, 1, 50, 59, 2, '2020-02-11 03:44:38', '2020-02-11 03:45:52', NULL, 50, 10, '#ENVSHOP1581412551', 'order', 1),
(13, 34, 0, 32, 0, 0, 0, 0, '2020-02-11 06:36:55', '2020-02-11 06:36:55', NULL, 0, 0, NULL, 'wishlist', 0),
(14, 42, 76, 32, 16, 600, 31, 1, '2020-02-22 08:06:12', '2020-02-22 08:08:17', NULL, 9600, 0, NULL, 'cart', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shop_categories`
--

CREATE TABLE `shop_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `category_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_categories`
--

INSERT INTO `shop_categories` (`id`, `type`, `shop_id`, `parent`, `category_id`, `vendor_id`, `created_at`, `updated_at`) VALUES
(103, NULL, 3, 0, 136, 44, '2020-01-28 07:24:49', '2020-01-28 07:24:49'),
(104, NULL, 3, 0, 136, 44, '2020-01-28 07:24:49', '2020-01-28 07:24:49'),
(105, NULL, 3, 0, 41, 44, '2020-01-28 07:24:49', '2020-01-28 07:24:49'),
(106, NULL, 3, 0, 41, 44, '2020-01-28 07:24:49', '2020-01-28 07:24:49'),
(107, NULL, 3, 0, 64, 44, '2020-01-28 07:24:49', '2020-01-28 07:24:49'),
(108, NULL, 3, 0, 64, 44, '2020-01-28 07:24:49', '2020-01-28 07:24:49'),
(109, NULL, 3, 0, 90, 44, '2020-01-28 07:24:49', '2020-01-28 07:24:49'),
(110, NULL, 3, 0, 90, 44, '2020-01-28 07:24:49', '2020-01-28 07:24:49'),
(111, NULL, 3, 0, 111, 44, '2020-01-28 07:24:49', '2020-01-28 07:24:49'),
(112, NULL, 3, 0, 111, 44, '2020-01-28 07:24:49', '2020-01-28 07:24:49'),
(113, NULL, 3, 0, 125, 44, '2020-01-28 07:24:49', '2020-01-28 07:24:49'),
(114, NULL, 3, 0, 125, 44, '2020-01-28 07:24:49', '2020-01-28 07:24:49'),
(115, NULL, 3, 0, 14, 44, '2020-01-28 07:24:49', '2020-01-28 07:24:49'),
(116, NULL, 3, 0, 14, 44, '2020-01-28 07:24:49', '2020-01-28 07:24:49'),
(117, NULL, 3, 0, 1, 44, '2020-01-28 07:24:49', '2020-01-28 07:24:49'),
(118, NULL, 3, 0, 1, 44, '2020-01-28 07:24:49', '2020-01-28 07:24:49'),
(119, NULL, 3, 0, 8, 44, '2020-01-28 07:24:49', '2020-01-28 07:24:49'),
(120, NULL, 3, 0, 8, 44, '2020-01-28 07:24:49', '2020-01-28 07:24:49'),
(121, NULL, 3, 136, 137, 44, '2020-01-28 07:25:20', '2020-01-28 07:25:20'),
(122, NULL, 3, 136, 143, 44, '2020-01-28 07:25:20', '2020-01-28 07:25:20'),
(123, NULL, 3, 136, 137, 44, '2020-01-28 07:25:20', '2020-01-28 07:25:20'),
(124, NULL, 3, 136, 144, 44, '2020-01-28 07:25:21', '2020-01-28 07:25:21'),
(125, NULL, 3, 136, 143, 44, '2020-01-28 07:25:21', '2020-01-28 07:25:21'),
(126, NULL, 3, 136, 145, 44, '2020-01-28 07:25:21', '2020-01-28 07:25:21'),
(127, NULL, 3, 136, 144, 44, '2020-01-28 07:25:21', '2020-01-28 07:25:21'),
(128, NULL, 3, 136, 146, 44, '2020-01-28 07:25:21', '2020-01-28 07:25:21'),
(129, NULL, 3, 136, 145, 44, '2020-01-28 07:25:21', '2020-01-28 07:25:21'),
(130, NULL, 3, 41, 42, 44, '2020-01-28 07:25:21', '2020-01-28 07:25:21'),
(131, NULL, 3, 136, 146, 44, '2020-01-28 07:25:21', '2020-01-28 07:25:21'),
(132, NULL, 3, 41, 50, 44, '2020-01-28 07:25:21', '2020-01-28 07:25:21'),
(133, NULL, 3, 41, 42, 44, '2020-01-28 07:25:21', '2020-01-28 07:25:21'),
(134, NULL, 3, 41, 56, 44, '2020-01-28 07:25:21', '2020-01-28 07:25:21'),
(135, NULL, 3, 41, 50, 44, '2020-01-28 07:25:21', '2020-01-28 07:25:21'),
(136, NULL, 3, 41, 59, 44, '2020-01-28 07:25:21', '2020-01-28 07:25:21'),
(137, NULL, 3, 41, 56, 44, '2020-01-28 07:25:21', '2020-01-28 07:25:21'),
(138, NULL, 3, 64, 65, 44, '2020-01-28 07:25:21', '2020-01-28 07:25:21'),
(139, NULL, 3, 41, 59, 44, '2020-01-28 07:25:21', '2020-01-28 07:25:21'),
(140, NULL, 3, 64, 66, 44, '2020-01-28 07:25:21', '2020-01-28 07:25:21'),
(141, NULL, 3, 64, 65, 44, '2020-01-28 07:25:21', '2020-01-28 07:25:21'),
(142, NULL, 3, 64, 67, 44, '2020-01-28 07:25:21', '2020-01-28 07:25:21'),
(143, NULL, 3, 64, 66, 44, '2020-01-28 07:25:22', '2020-01-28 07:25:22'),
(144, NULL, 3, 64, 70, 44, '2020-01-28 07:25:22', '2020-01-28 07:25:22'),
(145, NULL, 3, 64, 67, 44, '2020-01-28 07:25:22', '2020-01-28 07:25:22'),
(146, NULL, 3, 64, 77, 44, '2020-01-28 07:25:22', '2020-01-28 07:25:22'),
(147, NULL, 3, 64, 70, 44, '2020-01-28 07:25:22', '2020-01-28 07:25:22'),
(148, NULL, 3, 64, 81, 44, '2020-01-28 07:25:22', '2020-01-28 07:25:22'),
(149, NULL, 3, 64, 77, 44, '2020-01-28 07:25:22', '2020-01-28 07:25:22'),
(150, NULL, 3, 64, 85, 44, '2020-01-28 07:25:22', '2020-01-28 07:25:22'),
(151, NULL, 3, 64, 81, 44, '2020-01-28 07:25:22', '2020-01-28 07:25:22'),
(152, NULL, 3, 90, 91, 44, '2020-01-28 07:25:22', '2020-01-28 07:25:22'),
(153, NULL, 3, 64, 85, 44, '2020-01-28 07:25:22', '2020-01-28 07:25:22'),
(154, NULL, 3, 90, 92, 44, '2020-01-28 07:25:22', '2020-01-28 07:25:22'),
(155, NULL, 3, 90, 91, 44, '2020-01-28 07:25:22', '2020-01-28 07:25:22'),
(156, NULL, 3, 90, 96, 44, '2020-01-28 07:25:22', '2020-01-28 07:25:22'),
(157, NULL, 3, 90, 92, 44, '2020-01-28 07:25:22', '2020-01-28 07:25:22'),
(158, NULL, 3, 90, 101, 44, '2020-01-28 07:25:22', '2020-01-28 07:25:22'),
(159, NULL, 3, 90, 96, 44, '2020-01-28 07:25:22', '2020-01-28 07:25:22'),
(160, NULL, 3, 90, 105, 44, '2020-01-28 07:25:22', '2020-01-28 07:25:22'),
(161, NULL, 3, 90, 101, 44, '2020-01-28 07:25:22', '2020-01-28 07:25:22'),
(162, NULL, 3, 90, 110, 44, '2020-01-28 07:25:23', '2020-01-28 07:25:23'),
(163, NULL, 3, 90, 105, 44, '2020-01-28 07:25:23', '2020-01-28 07:25:23'),
(164, NULL, 3, 111, 112, 44, '2020-01-28 07:25:23', '2020-01-28 07:25:23'),
(165, NULL, 3, 90, 110, 44, '2020-01-28 07:25:23', '2020-01-28 07:25:23'),
(166, NULL, 3, 111, 118, 44, '2020-01-28 07:25:23', '2020-01-28 07:25:23'),
(167, NULL, 3, 111, 112, 44, '2020-01-28 07:25:23', '2020-01-28 07:25:23'),
(168, NULL, 3, 111, 120, 44, '2020-01-28 07:25:23', '2020-01-28 07:25:23'),
(169, NULL, 3, 111, 118, 44, '2020-01-28 07:25:23', '2020-01-28 07:25:23'),
(170, NULL, 3, 111, 124, 44, '2020-01-28 07:25:23', '2020-01-28 07:25:23'),
(171, NULL, 3, 111, 120, 44, '2020-01-28 07:25:23', '2020-01-28 07:25:23'),
(172, NULL, 3, 125, 126, 44, '2020-01-28 07:25:23', '2020-01-28 07:25:23'),
(173, NULL, 3, 111, 124, 44, '2020-01-28 07:25:23', '2020-01-28 07:25:23'),
(174, NULL, 3, 125, 129, 44, '2020-01-28 07:25:23', '2020-01-28 07:25:23'),
(175, NULL, 3, 125, 126, 44, '2020-01-28 07:25:23', '2020-01-28 07:25:23'),
(176, NULL, 3, 125, 130, 44, '2020-01-28 07:25:23', '2020-01-28 07:25:23'),
(177, NULL, 3, 125, 129, 44, '2020-01-28 07:25:23', '2020-01-28 07:25:23'),
(178, NULL, 3, 125, 131, 44, '2020-01-28 07:25:23', '2020-01-28 07:25:23'),
(179, NULL, 3, 125, 130, 44, '2020-01-28 07:25:23', '2020-01-28 07:25:23'),
(180, NULL, 3, 125, 134, 44, '2020-01-28 07:25:23', '2020-01-28 07:25:23'),
(181, NULL, 3, 125, 131, 44, '2020-01-28 07:25:23', '2020-01-28 07:25:23'),
(182, NULL, 3, 14, 34, 44, '2020-01-28 07:25:24', '2020-01-28 07:25:24'),
(183, NULL, 3, 125, 134, 44, '2020-01-28 07:25:24', '2020-01-28 07:25:24'),
(184, NULL, 3, 14, 35, 44, '2020-01-28 07:25:24', '2020-01-28 07:25:24'),
(185, NULL, 3, 14, 34, 44, '2020-01-28 07:25:24', '2020-01-28 07:25:24'),
(186, NULL, 3, 14, 36, 44, '2020-01-28 07:25:24', '2020-01-28 07:25:24'),
(187, NULL, 3, 14, 35, 44, '2020-01-28 07:25:24', '2020-01-28 07:25:24'),
(188, NULL, 3, 14, 17, 44, '2020-01-28 07:25:24', '2020-01-28 07:25:24'),
(189, NULL, 3, 14, 36, 44, '2020-01-28 07:25:24', '2020-01-28 07:25:24'),
(190, NULL, 3, 14, 25, 44, '2020-01-28 07:25:24', '2020-01-28 07:25:24'),
(191, NULL, 3, 14, 17, 44, '2020-01-28 07:25:24', '2020-01-28 07:25:24'),
(192, NULL, 3, 14, 15, 44, '2020-01-28 07:25:24', '2020-01-28 07:25:24'),
(193, NULL, 3, 14, 25, 44, '2020-01-28 07:25:24', '2020-01-28 07:25:24'),
(194, NULL, 3, 1, 151, 44, '2020-01-28 07:25:24', '2020-01-28 07:25:24'),
(195, NULL, 3, 14, 15, 44, '2020-01-28 07:25:24', '2020-01-28 07:25:24'),
(196, NULL, 3, 1, 5, 44, '2020-01-28 07:25:24', '2020-01-28 07:25:24'),
(197, NULL, 3, 1, 151, 44, '2020-01-28 07:25:24', '2020-01-28 07:25:24'),
(198, NULL, 3, 1, 3, 44, '2020-01-28 07:25:24', '2020-01-28 07:25:24'),
(199, NULL, 3, 1, 5, 44, '2020-01-28 07:25:24', '2020-01-28 07:25:24'),
(200, NULL, 3, 1, 4, 44, '2020-01-28 07:25:24', '2020-01-28 07:25:24'),
(201, NULL, 3, 1, 3, 44, '2020-01-28 07:25:24', '2020-01-28 07:25:24'),
(202, NULL, 3, 1, 4, 44, '2020-01-28 07:25:25', '2020-01-28 07:25:25'),
(362, NULL, 4, 0, 136, 76, '2020-01-31 05:39:43', '2020-01-31 05:39:43'),
(363, NULL, 4, 0, 41, 76, '2020-01-31 05:39:43', '2020-01-31 05:39:43'),
(364, NULL, 4, 0, 64, 76, '2020-01-31 05:39:43', '2020-01-31 05:39:43'),
(365, NULL, 4, 0, 90, 76, '2020-01-31 05:39:43', '2020-01-31 05:39:43'),
(366, NULL, 4, 0, 111, 76, '2020-01-31 05:39:43', '2020-01-31 05:39:43'),
(367, NULL, 4, 0, 125, 76, '2020-01-31 05:39:43', '2020-01-31 05:39:43'),
(368, NULL, 4, 0, 14, 76, '2020-01-31 05:39:43', '2020-01-31 05:39:43'),
(369, NULL, 4, 0, 1, 76, '2020-01-31 05:39:44', '2020-01-31 05:39:44'),
(370, NULL, 4, 0, 8, 76, '2020-01-31 05:39:44', '2020-01-31 05:39:44'),
(412, NULL, 4, 136, 137, 76, '2020-01-31 05:40:25', '2020-01-31 05:40:25'),
(413, NULL, 4, 136, 143, 76, '2020-01-31 05:40:25', '2020-01-31 05:40:25'),
(414, NULL, 4, 136, 144, 76, '2020-01-31 05:40:25', '2020-01-31 05:40:25'),
(415, NULL, 4, 136, 145, 76, '2020-01-31 05:40:25', '2020-01-31 05:40:25'),
(416, NULL, 4, 136, 146, 76, '2020-01-31 05:40:25', '2020-01-31 05:40:25'),
(417, NULL, 4, 41, 42, 76, '2020-01-31 05:40:25', '2020-01-31 05:40:25'),
(418, NULL, 4, 41, 50, 76, '2020-01-31 05:40:25', '2020-01-31 05:40:25'),
(419, NULL, 4, 41, 56, 76, '2020-01-31 05:40:25', '2020-01-31 05:40:25'),
(420, NULL, 4, 41, 59, 76, '2020-01-31 05:40:25', '2020-01-31 05:40:25'),
(421, NULL, 4, 64, 65, 76, '2020-01-31 05:40:26', '2020-01-31 05:40:26'),
(422, NULL, 4, 64, 66, 76, '2020-01-31 05:40:26', '2020-01-31 05:40:26'),
(423, NULL, 4, 64, 67, 76, '2020-01-31 05:40:26', '2020-01-31 05:40:26'),
(424, NULL, 4, 64, 70, 76, '2020-01-31 05:40:26', '2020-01-31 05:40:26'),
(425, NULL, 4, 64, 77, 76, '2020-01-31 05:40:26', '2020-01-31 05:40:26'),
(426, NULL, 4, 64, 81, 76, '2020-01-31 05:40:26', '2020-01-31 05:40:26'),
(427, NULL, 4, 64, 85, 76, '2020-01-31 05:40:26', '2020-01-31 05:40:26'),
(428, NULL, 4, 90, 91, 76, '2020-01-31 05:40:26', '2020-01-31 05:40:26'),
(429, NULL, 4, 90, 92, 76, '2020-01-31 05:40:26', '2020-01-31 05:40:26'),
(430, NULL, 4, 90, 96, 76, '2020-01-31 05:40:26', '2020-01-31 05:40:26'),
(431, NULL, 4, 90, 101, 76, '2020-01-31 05:40:26', '2020-01-31 05:40:26'),
(432, NULL, 4, 90, 105, 76, '2020-01-31 05:40:26', '2020-01-31 05:40:26'),
(433, NULL, 4, 90, 110, 76, '2020-01-31 05:40:26', '2020-01-31 05:40:26'),
(434, NULL, 4, 111, 112, 76, '2020-01-31 05:40:26', '2020-01-31 05:40:26'),
(435, NULL, 4, 111, 118, 76, '2020-01-31 05:40:26', '2020-01-31 05:40:26'),
(436, NULL, 4, 111, 120, 76, '2020-01-31 05:40:26', '2020-01-31 05:40:26'),
(437, NULL, 4, 111, 124, 76, '2020-01-31 05:40:26', '2020-01-31 05:40:26'),
(438, NULL, 4, 125, 126, 76, '2020-01-31 05:40:26', '2020-01-31 05:40:26'),
(439, NULL, 4, 125, 129, 76, '2020-01-31 05:40:26', '2020-01-31 05:40:26'),
(440, NULL, 4, 125, 130, 76, '2020-01-31 05:40:27', '2020-01-31 05:40:27'),
(441, NULL, 4, 125, 131, 76, '2020-01-31 05:40:27', '2020-01-31 05:40:27'),
(442, NULL, 4, 125, 134, 76, '2020-01-31 05:40:27', '2020-01-31 05:40:27'),
(443, NULL, 4, 14, 34, 76, '2020-01-31 05:40:27', '2020-01-31 05:40:27'),
(444, NULL, 4, 14, 35, 76, '2020-01-31 05:40:27', '2020-01-31 05:40:27'),
(445, NULL, 4, 14, 36, 76, '2020-01-31 05:40:27', '2020-01-31 05:40:27'),
(446, NULL, 4, 14, 17, 76, '2020-01-31 05:40:27', '2020-01-31 05:40:27'),
(447, NULL, 4, 14, 25, 76, '2020-01-31 05:40:27', '2020-01-31 05:40:27'),
(448, NULL, 4, 14, 15, 76, '2020-01-31 05:40:27', '2020-01-31 05:40:27'),
(449, NULL, 4, 1, 151, 76, '2020-01-31 05:40:27', '2020-01-31 05:40:27'),
(450, NULL, 4, 1, 5, 76, '2020-01-31 05:40:27', '2020-01-31 05:40:27'),
(451, NULL, 4, 1, 3, 76, '2020-01-31 05:40:27', '2020-01-31 05:40:27'),
(452, NULL, 4, 1, 4, 76, '2020-01-31 05:40:27', '2020-01-31 05:40:27'),
(601, NULL, 2, 0, 136, 59, '2020-02-11 03:19:54', '2020-02-11 03:19:54'),
(602, NULL, 2, 0, 136, 59, '2020-02-11 03:19:54', '2020-02-11 03:19:54'),
(603, NULL, 2, 0, 1, 59, '2020-02-11 03:19:54', '2020-02-11 03:19:54'),
(604, NULL, 2, 0, 1, 59, '2020-02-11 03:19:54', '2020-02-11 03:19:54'),
(605, NULL, 2, 136, 137, 59, '2020-02-11 03:20:16', '2020-02-11 03:20:16'),
(606, NULL, 2, 136, 137, 59, '2020-02-11 03:20:16', '2020-02-11 03:20:16'),
(607, NULL, 2, 136, 144, 59, '2020-02-11 03:20:16', '2020-02-11 03:20:16'),
(608, NULL, 2, 136, 144, 59, '2020-02-11 03:20:16', '2020-02-11 03:20:16'),
(609, NULL, 2, 1, 151, 59, '2020-02-11 03:20:17', '2020-02-11 03:20:17'),
(610, NULL, 2, 1, 151, 59, '2020-02-11 03:20:17', '2020-02-11 03:20:17'),
(611, NULL, 2, 1, 3, 59, '2020-02-11 03:20:17', '2020-02-11 03:20:17'),
(612, NULL, 2, 1, 3, 59, '2020-02-11 03:20:17', '2020-02-11 03:20:17'),
(613, NULL, 2, 1, 4, 59, '2020-02-11 03:20:17', '2020-02-11 03:20:17'),
(614, NULL, 2, 1, 4, 59, '2020-02-11 03:20:17', '2020-02-11 03:20:17'),
(867, NULL, 1, 0, 111, 31, '2020-02-17 10:05:57', '2020-02-17 10:05:57'),
(868, NULL, 1, 0, 111, 31, '2020-02-17 10:05:57', '2020-02-17 10:05:57'),
(869, NULL, 1, 0, 125, 31, '2020-02-17 10:05:57', '2020-02-17 10:05:57'),
(870, NULL, 1, 0, 125, 31, '2020-02-17 10:05:57', '2020-02-17 10:05:57'),
(871, NULL, 1, 0, 14, 31, '2020-02-17 10:05:57', '2020-02-17 10:05:57'),
(872, NULL, 1, 0, 14, 31, '2020-02-17 10:05:57', '2020-02-17 10:05:57'),
(873, NULL, 1, 0, 1, 31, '2020-02-17 10:05:58', '2020-02-17 10:05:58'),
(874, NULL, 1, 0, 1, 31, '2020-02-17 10:05:58', '2020-02-17 10:05:58'),
(875, NULL, 1, 0, 8, 31, '2020-02-17 10:05:58', '2020-02-17 10:05:58'),
(876, NULL, 1, 0, 8, 31, '2020-02-17 10:05:58', '2020-02-17 10:05:58'),
(877, NULL, 1, 111, 112, 31, '2020-02-17 10:06:02', '2020-02-17 10:06:02'),
(878, NULL, 1, 111, 120, 31, '2020-02-17 10:06:02', '2020-02-17 10:06:02'),
(879, NULL, 1, 111, 112, 31, '2020-02-17 10:06:02', '2020-02-17 10:06:02'),
(880, NULL, 1, 111, 120, 31, '2020-02-17 10:06:02', '2020-02-17 10:06:02'),
(881, NULL, 1, 111, 124, 31, '2020-02-17 10:06:02', '2020-02-17 10:06:02'),
(882, NULL, 1, 111, 124, 31, '2020-02-17 10:06:02', '2020-02-17 10:06:02'),
(883, NULL, 1, 125, 126, 31, '2020-02-17 10:06:02', '2020-02-17 10:06:02'),
(884, NULL, 1, 125, 126, 31, '2020-02-17 10:06:02', '2020-02-17 10:06:02'),
(885, NULL, 1, 125, 129, 31, '2020-02-17 10:06:02', '2020-02-17 10:06:02'),
(886, NULL, 1, 125, 129, 31, '2020-02-17 10:06:02', '2020-02-17 10:06:02'),
(887, NULL, 1, 125, 130, 31, '2020-02-17 10:06:02', '2020-02-17 10:06:02'),
(888, NULL, 1, 125, 130, 31, '2020-02-17 10:06:03', '2020-02-17 10:06:03'),
(889, NULL, 1, 125, 131, 31, '2020-02-17 10:06:03', '2020-02-17 10:06:03'),
(890, NULL, 1, 125, 131, 31, '2020-02-17 10:06:03', '2020-02-17 10:06:03'),
(891, NULL, 1, 14, 34, 31, '2020-02-17 10:06:03', '2020-02-17 10:06:03'),
(892, NULL, 1, 14, 34, 31, '2020-02-17 10:06:03', '2020-02-17 10:06:03'),
(893, NULL, 1, 14, 35, 31, '2020-02-17 10:06:03', '2020-02-17 10:06:03'),
(894, NULL, 1, 14, 35, 31, '2020-02-17 10:06:03', '2020-02-17 10:06:03'),
(895, NULL, 1, 14, 36, 31, '2020-02-17 10:06:03', '2020-02-17 10:06:03'),
(896, NULL, 1, 14, 36, 31, '2020-02-17 10:06:03', '2020-02-17 10:06:03'),
(897, NULL, 1, 14, 17, 31, '2020-02-17 10:06:03', '2020-02-17 10:06:03'),
(898, NULL, 1, 14, 17, 31, '2020-02-17 10:06:03', '2020-02-17 10:06:03'),
(899, NULL, 1, 14, 25, 31, '2020-02-17 10:06:03', '2020-02-17 10:06:03'),
(900, NULL, 1, 14, 25, 31, '2020-02-17 10:06:03', '2020-02-17 10:06:03'),
(901, NULL, 1, 14, 15, 31, '2020-02-17 10:06:03', '2020-02-17 10:06:03'),
(902, NULL, 1, 14, 15, 31, '2020-02-17 10:06:03', '2020-02-17 10:06:03'),
(903, NULL, 1, 1, 151, 31, '2020-02-17 10:06:03', '2020-02-17 10:06:03'),
(904, NULL, 1, 1, 151, 31, '2020-02-17 10:06:03', '2020-02-17 10:06:03'),
(905, NULL, 1, 1, 3, 31, '2020-02-17 10:06:03', '2020-02-17 10:06:03'),
(906, NULL, 1, 1, 3, 31, '2020-02-17 10:06:03', '2020-02-17 10:06:03'),
(907, NULL, 1, 1, 4, 31, '2020-02-17 10:06:03', '2020-02-17 10:06:03'),
(908, NULL, 1, 1, 4, 31, '2020-02-17 10:06:03', '2020-02-17 10:06:03');

-- --------------------------------------------------------

--
-- Table structure for table `shop_orders`
--

CREATE TABLE `shop_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `orderID` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `shipping_address` longtext COLLATE utf8mb4_unicode_ci,
  `billing_address` longtext COLLATE utf8mb4_unicode_ci,
  `payment_detail` longtext COLLATE utf8mb4_unicode_ci,
  `balance_transaction` longtext COLLATE utf8mb4_unicode_ci,
  `amount` double NOT NULL DEFAULT '0',
  `payment_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_orders`
--

INSERT INTO `shop_orders` (`id`, `orderID`, `user_id`, `shipping_address`, `billing_address`, `payment_detail`, `balance_transaction`, `amount`, `payment_by`, `status`, `created_at`, `updated_at`) VALUES
(1, '#ENVSHOP1581065849', 32, '{"name":"Narinder Singh","email":"bajwa9876470491@gmail.com","phone_number":"01212878777","address":"Bergen Town Center","country":"United States","state":"NJ","city":"Paramus","zipcode":"07652","latitude":"40.9157361","longitude":"-74.06090449999999","country_short_code":"US"}', '{"name":"Narinder Singh","email":"bajwa9876470491@gmail.com","phone_number":"01212878777","address":"Bergen Town Center","country":"United States","state":"NJ","city":"Paramus","zipcode":"07652","latitude":"40.9157361","longitude":"-74.06090449999999","country_short_code":"US","tax":6.63}', '{"id":"ch_1G9SeTENgNZPUt9KBwU0DakS","object":"charge","amount":244963,"amount_refunded":0,"application":null,"application_fee":null,"application_fee_amount":null,"balance_transaction":"txn_1G9SeVENgNZPUt9KhPKt8zW3","billing_details":{"address":{"city":null,"country":null,"line1":null,"line2":null,"postal_code":null,"state":null},"email":null,"name":"bajwa9876470491@gmail.com","phone":null},"captured":true,"created":1581065849,"currency":"usd","customer":null,"description":"Customer for pay for #ENVSHOP1581065849","destination":null,"dispute":null,"disputed":false,"failure_code":null,"failure_message":null,"fraud_details":[],"invoice":null,"livemode":false,"metadata":[],"on_behalf_of":null,"order":null,"outcome":{"network_status":"approved_by_network","reason":null,"risk_level":"normal","risk_score":56,"seller_message":"Payment complete.","type":"authorized"},"paid":true,"payment_intent":null,"payment_method":"card_1G9SeQENgNZPUt9KMsiFUV6p","payment_method_details":{"card":{"brand":"visa","checks":{"address_line1_check":null,"address_postal_code_check":null,"cvc_check":"pass"},"country":"US","exp_month":12,"exp_year":2020,"fingerprint":"5yPNVhsLBrcpIKlS","funding":"unknown","installments":null,"last4":"1111","network":"visa","three_d_secure":null,"wallet":null},"type":"card"},"receipt_email":null,"receipt_number":null,"receipt_url":"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1Fbq7RENgNZPUt9K\\/ch_1G9SeTENgNZPUt9KBwU0DakS\\/rcpt_GgqLUFqS33vuTRlccueg7m3kPKPGokl","refunded":false,"refunds":{"object":"list","data":[],"has_more":false,"total_count":0,"url":"\\/v1\\/charges\\/ch_1G9SeTENgNZPUt9KBwU0DakS\\/refunds"},"review":null,"shipping":null,"source":{"id":"card_1G9SeQENgNZPUt9KMsiFUV6p","object":"card","address_city":null,"address_country":null,"address_line1":null,"address_line1_check":null,"address_line2":null,"address_state":null,"address_zip":null,"address_zip_check":null,"brand":"Visa","country":"US","customer":null,"cvc_check":"pass","dynamic_last4":null,"exp_month":12,"exp_year":2020,"fingerprint":"5yPNVhsLBrcpIKlS","funding":"unknown","last4":"1111","metadata":[],"name":"bajwa9876470491@gmail.com","tokenization_method":null},"source_transfer":null,"statement_descriptor":null,"statement_descriptor_suffix":null,"status":"succeeded","transfer_data":null,"transfer_group":null}', '{"31":{"vendor_id":31,"total":2449.63,"amount":"2395","tax":6.63,"commission_fee":95.8,"service_fee":48,"payable_amount":2251,"account_id":"acct_1G6cxyFzSNgbCEQp","stripeAccountParams":{"amount":2251,"stripe_account":"acct_1G6cxyFzSNgbCEQp"}}}', 2449.63, 'STRIPE', 3, '2020-02-07 03:27:31', '2020-02-07 03:27:31'),
(2, '#ENVSHOP1581065997', 32, '{"name":"Narinder Singh","email":"bajwa9876470491@gmail.com","phone_number":"01212878777","address":"Bourbon Street","country":"United States","state":"NJ","city":"Wayne","zipcode":"07470","latitude":"40.9492264","longitude":"-74.2616527","country_short_code":"US"}', '{"name":"Narinder Singh","email":"bajwa9876470491@gmail.com","phone_number":"01212878777","address":"Bergen Town Center","country":"United States","state":"NJ","city":"Paramus","zipcode":"07652","latitude":"40.9157361","longitude":"-74.06090449999999","country_short_code":"US","tax":6.63}', '{"id":"ch_1G9SgrENgNZPUt9KeHIFb57y","object":"charge","amount":429063,"amount_refunded":0,"application":null,"application_fee":null,"application_fee_amount":null,"balance_transaction":"txn_1G9SgsENgNZPUt9KhLsV4iJI","billing_details":{"address":{"city":null,"country":null,"line1":null,"line2":null,"postal_code":null,"state":null},"email":null,"name":"bajwa9876470491@gmail.com","phone":null},"captured":true,"created":1581065997,"currency":"usd","customer":null,"description":"Customer for pay for #ENVSHOP1581065997","destination":null,"dispute":null,"disputed":false,"failure_code":null,"failure_message":null,"fraud_details":[],"invoice":null,"livemode":false,"metadata":[],"on_behalf_of":null,"order":null,"outcome":{"network_status":"approved_by_network","reason":null,"risk_level":"normal","risk_score":60,"seller_message":"Payment complete.","type":"authorized"},"paid":true,"payment_intent":null,"payment_method":"card_1G9SgoENgNZPUt9KT1jbFjcA","payment_method_details":{"card":{"brand":"visa","checks":{"address_line1_check":null,"address_postal_code_check":null,"cvc_check":"pass"},"country":"US","exp_month":12,"exp_year":2020,"fingerprint":"5yPNVhsLBrcpIKlS","funding":"unknown","installments":null,"last4":"1111","network":"visa","three_d_secure":null,"wallet":null},"type":"card"},"receipt_email":null,"receipt_number":null,"receipt_url":"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1Fbq7RENgNZPUt9K\\/ch_1G9SgrENgNZPUt9KeHIFb57y\\/rcpt_GgqNAgqslnQWqNCd93pn9shhlPDIyco","refunded":false,"refunds":{"object":"list","data":[],"has_more":false,"total_count":0,"url":"\\/v1\\/charges\\/ch_1G9SgrENgNZPUt9KeHIFb57y\\/refunds"},"review":null,"shipping":null,"source":{"id":"card_1G9SgoENgNZPUt9KT1jbFjcA","object":"card","address_city":null,"address_country":null,"address_line1":null,"address_line1_check":null,"address_line2":null,"address_state":null,"address_zip":null,"address_zip_check":null,"brand":"Visa","country":"US","customer":null,"cvc_check":"pass","dynamic_last4":null,"exp_month":12,"exp_year":2020,"fingerprint":"5yPNVhsLBrcpIKlS","funding":"unknown","last4":"1111","metadata":[],"name":"bajwa9876470491@gmail.com","tokenization_method":null},"source_transfer":null,"statement_descriptor":null,"statement_descriptor_suffix":null,"status":"succeeded","transfer_data":null,"transfer_group":null}', '{"31":{"vendor_id":31,"total":4290.63,"amount":"6595","tax":6.63,"commission_fee":395.70000000000005,"service_fee":132,"payable_amount":6067,"account_id":"acct_1G6cxyFzSNgbCEQp","stripeAccountParams":{"amount":6067,"stripe_account":"acct_1G6cxyFzSNgbCEQp"}}}', 4290.63, 'STRIPE', 1, '2020-02-07 03:29:58', '2020-02-07 03:29:58'),
(3, '#ENVSHOP1581068750', 32, '{"name":"Narinder Singh","email":"bajwa9876470491@gmail.com","phone_number":"01212878777","address":"Bourbon Street","country":"United States","state":"MA","city":"Peabody","zipcode":"01960","latitude":"42.5466407","longitude":"-70.9792677","country_short_code":"US"}', '{"name":"Narinder Singh","email":"bajwa9876470491@gmail.com","phone_number":"01212878777","address":"Bergen Town Center","country":"United States","state":"NJ","city":"Paramus","zipcode":"07652","latitude":"40.9157361","longitude":"-74.06090449999999","country_short_code":"US","tax":6.63}', '{"id":"ch_1G9TPHENgNZPUt9KinsnJ415","object":"charge","amount":147163,"amount_refunded":0,"application":null,"application_fee":null,"application_fee_amount":null,"balance_transaction":"txn_1G9TPHENgNZPUt9K7HCBQBoO","billing_details":{"address":{"city":null,"country":null,"line1":null,"line2":null,"postal_code":null,"state":null},"email":null,"name":"bajwa9876470491@gmail.com","phone":null},"captured":true,"created":1581068751,"currency":"usd","customer":null,"description":"Customer for pay for #ENVSHOP1581068750","destination":null,"dispute":null,"disputed":false,"failure_code":null,"failure_message":null,"fraud_details":[],"invoice":null,"livemode":false,"metadata":[],"on_behalf_of":null,"order":null,"outcome":{"network_status":"approved_by_network","reason":null,"risk_level":"normal","risk_score":3,"seller_message":"Payment complete.","type":"authorized"},"paid":true,"payment_intent":null,"payment_method":"card_1G9TPCENgNZPUt9KdBn9x7bF","payment_method_details":{"card":{"brand":"visa","checks":{"address_line1_check":null,"address_postal_code_check":null,"cvc_check":"pass"},"country":"US","exp_month":12,"exp_year":2020,"fingerprint":"5yPNVhsLBrcpIKlS","funding":"unknown","installments":null,"last4":"1111","network":"visa","three_d_secure":null,"wallet":null},"type":"card"},"receipt_email":null,"receipt_number":null,"receipt_url":"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1Fbq7RENgNZPUt9K\\/ch_1G9TPHENgNZPUt9KinsnJ415\\/rcpt_Ggr7RJmWAgok15UbkFS2zC2W1CwkCoX","refunded":false,"refunds":{"object":"list","data":[],"has_more":false,"total_count":0,"url":"\\/v1\\/charges\\/ch_1G9TPHENgNZPUt9KinsnJ415\\/refunds"},"review":null,"shipping":null,"source":{"id":"card_1G9TPCENgNZPUt9KdBn9x7bF","object":"card","address_city":null,"address_country":null,"address_line1":null,"address_line1_check":null,"address_line2":null,"address_state":null,"address_zip":null,"address_zip_check":null,"brand":"Visa","country":"US","customer":null,"cvc_check":"pass","dynamic_last4":null,"exp_month":12,"exp_year":2020,"fingerprint":"5yPNVhsLBrcpIKlS","funding":"unknown","last4":"1111","metadata":[],"name":"bajwa9876470491@gmail.com","tokenization_method":null},"source_transfer":null,"statement_descriptor":null,"statement_descriptor_suffix":null,"status":"succeeded","transfer_data":null,"transfer_group":null}', '{"31":{"vendor_id":31,"total":1471.63,"amount":"5637","tax":6.63,"commission_fee":338.21999999999997,"service_fee":112,"payable_amount":5187,"account_id":"acct_1G6cxyFzSNgbCEQp","stripeAccountParams":{"amount":5187,"stripe_account":"acct_1G6cxyFzSNgbCEQp"}}}', 1471.63, 'STRIPE', 1, '2020-02-07 04:15:52', '2020-02-07 04:15:52'),
(4, '#ENVSHOP1581042984', 32, '{"name":"Narinder Singh","email":"bajwa9876470491@gmail.com","phone_number":"01212878777","address":"Bourbon Street","country":"United States","state":"NJ","city":"Wayne","zipcode":"07470","latitude":"40.9492264","longitude":"-74.2616527","country_short_code":"US"}', '{"name":"Narinder Singh","email":"bajwa9876470491@gmail.com","phone_number":"01212878777","address":"Bergen Town Center","country":"United States","state":"NJ","city":"Paramus","zipcode":"07652","latitude":"40.9157361","longitude":"-74.06090449999999","country_short_code":"US","tax":6.63}', '{"id":"ch_1G9XwTENgNZPUt9KEe1CFl8P","object":"charge","amount":790563,"amount_refunded":0,"application":null,"application_fee":null,"application_fee_amount":null,"balance_transaction":"txn_1G9XwTENgNZPUt9KobzDIWBE","billing_details":{"address":{"city":null,"country":null,"line1":null,"line2":null,"postal_code":null,"state":null},"email":null,"name":"bajwa9876470491@gmail.com","phone":null},"captured":true,"created":1581086185,"currency":"usd","customer":null,"description":"Customer for pay for #ENVSHOP1581042984","destination":null,"dispute":null,"disputed":false,"failure_code":null,"failure_message":null,"fraud_details":[],"invoice":null,"livemode":false,"metadata":[],"on_behalf_of":null,"order":null,"outcome":{"network_status":"approved_by_network","reason":null,"risk_level":"normal","risk_score":45,"seller_message":"Payment complete.","type":"authorized"},"paid":true,"payment_intent":null,"payment_method":"card_1G9XwPENgNZPUt9KV9nNZZOM","payment_method_details":{"card":{"brand":"visa","checks":{"address_line1_check":null,"address_postal_code_check":null,"cvc_check":"pass"},"country":"US","exp_month":12,"exp_year":2020,"fingerprint":"5yPNVhsLBrcpIKlS","funding":"unknown","installments":null,"last4":"1111","network":"visa","three_d_secure":null,"wallet":null},"type":"card"},"receipt_email":null,"receipt_number":null,"receipt_url":"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1Fbq7RENgNZPUt9K\\/ch_1G9XwTENgNZPUt9KEe1CFl8P\\/rcpt_GgvoMK9jnuYyFPqNk5OERraOlkVF8dL","refunded":false,"refunds":{"object":"list","data":[],"has_more":false,"total_count":0,"url":"\\/v1\\/charges\\/ch_1G9XwTENgNZPUt9KEe1CFl8P\\/refunds"},"review":null,"shipping":null,"source":{"id":"card_1G9XwPENgNZPUt9KV9nNZZOM","object":"card","address_city":null,"address_country":null,"address_line1":null,"address_line1_check":null,"address_line2":null,"address_state":null,"address_zip":null,"address_zip_check":null,"brand":"Visa","country":"US","customer":null,"cvc_check":"pass","dynamic_last4":null,"exp_month":12,"exp_year":2020,"fingerprint":"5yPNVhsLBrcpIKlS","funding":"unknown","last4":"1111","metadata":[],"name":"bajwa9876470491@gmail.com","tokenization_method":null},"source_transfer":null,"statement_descriptor":null,"statement_descriptor_suffix":null,"status":"succeeded","transfer_data":null,"transfer_group":null}', '{"31":{"vendor_id":31,"total":7905.63,"amount":"11945","tax":6.63,"commission_fee":238.9,"service_fee":238,"payable_amount":11468,"account_id":"acct_1G6cxyFzSNgbCEQp","stripeAccountParams":{"amount":11468,"stripe_account":"acct_1G6cxyFzSNgbCEQp"}}}', 7905.63, 'STRIPE', 1, '2020-02-07 09:06:25', '2020-02-07 09:06:25'),
(5, '#ENVSHOP1581044188', 32, '{"name":"Narinder Singh","email":"bajwa9876470491@gmail.com","phone_number":"01212878777","address":"Broadway","country":"United States","state":"NY","city":"New York","zipcode":"wqewewe","latitude":"40.7186342","longitude":"-74.0025412","country_short_code":"US"}', '{"name":"Narinder Singh","email":"bajwa9876470491@gmail.com","phone_number":"01212878777","address":"Bourbon Street","country":"United States","state":"NJ","city":"Wayne","zipcode":"07470","latitude":"40.9492264","longitude":"-74.2616527","country_short_code":"US","tax":6.63}', '{"id":"ch_1G9YFtENgNZPUt9KCVTntzBv","object":"charge","amount":223663,"amount_refunded":0,"application":null,"application_fee":null,"application_fee_amount":null,"balance_transaction":"txn_1G9YFtENgNZPUt9Kky4kZz3E","billing_details":{"address":{"city":null,"country":null,"line1":null,"line2":null,"postal_code":null,"state":null},"email":null,"name":"bajwa9876470491@gmail.com","phone":null},"captured":true,"created":1581087389,"currency":"usd","customer":null,"description":"Customer for pay for #ENVSHOP1581044188","destination":null,"dispute":null,"disputed":false,"failure_code":null,"failure_message":null,"fraud_details":[],"invoice":null,"livemode":false,"metadata":[],"on_behalf_of":null,"order":null,"outcome":{"network_status":"approved_by_network","reason":null,"risk_level":"normal","risk_score":50,"seller_message":"Payment complete.","type":"authorized"},"paid":true,"payment_intent":null,"payment_method":"card_1G9YFpENgNZPUt9K2Tu6HvMA","payment_method_details":{"card":{"brand":"visa","checks":{"address_line1_check":null,"address_postal_code_check":null,"cvc_check":"pass"},"country":"US","exp_month":12,"exp_year":2020,"fingerprint":"5yPNVhsLBrcpIKlS","funding":"unknown","installments":null,"last4":"1111","network":"visa","three_d_secure":null,"wallet":null},"type":"card"},"receipt_email":null,"receipt_number":null,"receipt_url":"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1Fbq7RENgNZPUt9K\\/ch_1G9YFtENgNZPUt9KCVTntzBv\\/rcpt_Ggw8LzvofabYhKLZ5wyN3kOXFG9nkn2","refunded":false,"refunds":{"object":"list","data":[],"has_more":false,"total_count":0,"url":"\\/v1\\/charges\\/ch_1G9YFtENgNZPUt9KCVTntzBv\\/refunds"},"review":null,"shipping":null,"source":{"id":"card_1G9YFpENgNZPUt9K2Tu6HvMA","object":"card","address_city":null,"address_country":null,"address_line1":null,"address_line1_check":null,"address_line2":null,"address_state":null,"address_zip":null,"address_zip_check":null,"brand":"Visa","country":"US","customer":null,"cvc_check":"pass","dynamic_last4":null,"exp_month":12,"exp_year":2020,"fingerprint":"5yPNVhsLBrcpIKlS","funding":"unknown","last4":"1111","metadata":[],"name":"bajwa9876470491@gmail.com","tokenization_method":null},"source_transfer":null,"statement_descriptor":null,"statement_descriptor_suffix":null,"status":"succeeded","transfer_data":null,"transfer_group":null}', '{"31":{"vendor_id":31,"total":2236.63,"amount":"9931","tax":6.63,"commission_fee":198.62,"service_fee":198,"payable_amount":9534,"account_id":"acct_1G6cxyFzSNgbCEQp","stripeAccountParams":{"amount":9534,"stripe_account":"acct_1G6cxyFzSNgbCEQp"}}}', 2236.63, 'STRIPE', 1, '2020-02-07 09:26:30', '2020-02-07 09:26:30'),
(6, '#ENVSHOP1581046438', 32, '{"name":"Narinder Singh","email":"bajwa9876470491@gmail.com","phone_number":"01212878777","address":"Bourbon Street","country":"United States","state":"LA","city":"New Orleans","zipcode":"wqewewe","latitude":"29.9590238","longitude":"-90.0652876","country_short_code":"US"}', '{"name":"Narinder Singh","email":"bajwa9876470491@gmail.com","phone_number":"01212878777","address":"Balaji Temple Drive","country":"United States","state":"NJ","city":"Bridgewater Township","zipcode":"08807","latitude":"40.628165","longitude":"-74.63283969999999","country_short_code":"US","tax":6.63}', '{"id":"ch_1G9YqBENgNZPUt9KyCK2akbL","object":"charge","amount":561663,"amount_refunded":0,"application":null,"application_fee":null,"application_fee_amount":null,"balance_transaction":"txn_1G9YqBENgNZPUt9KmzX3Qk9S","billing_details":{"address":{"city":null,"country":null,"line1":null,"line2":null,"postal_code":null,"state":null},"email":null,"name":"bajwa9876470491@gmail.com","phone":null},"captured":true,"created":1581089639,"currency":"usd","customer":null,"description":"Customer for pay for #ENVSHOP1581046438","destination":null,"dispute":null,"disputed":false,"failure_code":null,"failure_message":null,"fraud_details":[],"invoice":null,"livemode":false,"metadata":[],"on_behalf_of":null,"order":null,"outcome":{"network_status":"approved_by_network","reason":null,"risk_level":"normal","risk_score":31,"seller_message":"Payment complete.","type":"authorized"},"paid":true,"payment_intent":null,"payment_method":"card_1G9Yq7ENgNZPUt9KIivq8VNp","payment_method_details":{"card":{"brand":"visa","checks":{"address_line1_check":null,"address_postal_code_check":null,"cvc_check":"pass"},"country":"US","exp_month":12,"exp_year":2020,"fingerprint":"5yPNVhsLBrcpIKlS","funding":"unknown","installments":null,"last4":"1111","network":"visa","three_d_secure":null,"wallet":null},"type":"card"},"receipt_email":null,"receipt_number":null,"receipt_url":"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1Fbq7RENgNZPUt9K\\/ch_1G9YqBENgNZPUt9KyCK2akbL\\/rcpt_GgwjI0V4R41zXyrRxJch6AcAMq09q7z","refunded":false,"refunds":{"object":"list","data":[],"has_more":false,"total_count":0,"url":"\\/v1\\/charges\\/ch_1G9YqBENgNZPUt9KyCK2akbL\\/refunds"},"review":null,"shipping":null,"source":{"id":"card_1G9Yq7ENgNZPUt9KIivq8VNp","object":"card","address_city":null,"address_country":null,"address_line1":null,"address_line1_check":null,"address_line2":null,"address_state":null,"address_zip":null,"address_zip_check":null,"brand":"Visa","country":"US","customer":null,"cvc_check":"pass","dynamic_last4":null,"exp_month":12,"exp_year":2020,"fingerprint":"5yPNVhsLBrcpIKlS","funding":"unknown","last4":"1111","metadata":[],"name":"bajwa9876470491@gmail.com","tokenization_method":null},"source_transfer":null,"statement_descriptor":null,"statement_descriptor_suffix":null,"status":"succeeded","transfer_data":null,"transfer_group":null}', '{"31":{"vendor_id":31,"total":5616.63,"amount":"15431","tax":6.63,"commission_fee":308.62,"service_fee":308,"payable_amount":14814,"account_id":"acct_1G6cxyFzSNgbCEQp","stripeAccountParams":{"amount":14814,"stripe_account":"acct_1G6cxyFzSNgbCEQp"}}}', 5616.63, 'STRIPE', 1, '2020-02-07 10:03:59', '2020-02-07 10:03:59'),
(7, '#ENVSHOP1581046542', 32, '{"name":"Narinder Singh","email":"bajwa9876470491@gmail.com","phone_number":"01212878777","address":"Bourbon Street","country":"United States","state":"LA","city":"New Orleans","zipcode":"wqewewe","latitude":"29.9590238","longitude":"-90.0652876","country_short_code":"US"}', '{"name":"Narinder Singh","email":"bajwa9876470491@gmail.com","phone_number":"01212878777","address":"Balaji Temple Drive","country":"United States","state":"NJ","city":"Bridgewater Township","zipcode":"08807","latitude":"40.628165","longitude":"-74.63283969999999","country_short_code":"US","tax":6.63}', '{"id":"ch_1G9YrrENgNZPUt9KIoQFHGgg","object":"charge","amount":56863,"amount_refunded":0,"application":null,"application_fee":null,"application_fee_amount":null,"balance_transaction":"txn_1G9YrrENgNZPUt9KcFHNeIQJ","billing_details":{"address":{"city":null,"country":null,"line1":null,"line2":null,"postal_code":null,"state":null},"email":null,"name":"bajwa9876470491@gmail.com","phone":null},"captured":true,"created":1581089743,"currency":"usd","customer":null,"description":"Customer for pay for #ENVSHOP1581046542","destination":null,"dispute":null,"disputed":false,"failure_code":null,"failure_message":null,"fraud_details":[],"invoice":null,"livemode":false,"metadata":[],"on_behalf_of":null,"order":null,"outcome":{"network_status":"approved_by_network","reason":null,"risk_level":"normal","risk_score":39,"seller_message":"Payment complete.","type":"authorized"},"paid":true,"payment_intent":null,"payment_method":"card_1G9YrnENgNZPUt9KIoLiOQQZ","payment_method_details":{"card":{"brand":"visa","checks":{"address_line1_check":null,"address_postal_code_check":null,"cvc_check":"pass"},"country":"US","exp_month":12,"exp_year":2020,"fingerprint":"5yPNVhsLBrcpIKlS","funding":"unknown","installments":null,"last4":"1111","network":"visa","three_d_secure":null,"wallet":null},"type":"card"},"receipt_email":null,"receipt_number":null,"receipt_url":"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1Fbq7RENgNZPUt9K\\/ch_1G9YrrENgNZPUt9KIoQFHGgg\\/rcpt_GgwlXJV50kSvNTTFcpS60Yqx7Kth47S","refunded":false,"refunds":{"object":"list","data":[],"has_more":false,"total_count":0,"url":"\\/v1\\/charges\\/ch_1G9YrrENgNZPUt9KIoQFHGgg\\/refunds"},"review":null,"shipping":null,"source":{"id":"card_1G9YrnENgNZPUt9KIoLiOQQZ","object":"card","address_city":null,"address_country":null,"address_line1":null,"address_line1_check":null,"address_line2":null,"address_state":null,"address_zip":null,"address_zip_check":null,"brand":"Visa","country":"US","customer":null,"cvc_check":"pass","dynamic_last4":null,"exp_month":12,"exp_year":2020,"fingerprint":"5yPNVhsLBrcpIKlS","funding":"unknown","last4":"1111","metadata":[],"name":"bajwa9876470491@gmail.com","tokenization_method":null},"source_transfer":null,"statement_descriptor":null,"statement_descriptor_suffix":null,"status":"succeeded","transfer_data":null,"transfer_group":null}', '{"31":{"vendor_id":31,"total":568.63,"amount":"15981","tax":6.63,"commission_fee":319.62,"service_fee":320,"payable_amount":15341,"account_id":"acct_1G6cxyFzSNgbCEQp","stripeAccountParams":{"amount":15341,"stripe_account":"acct_1G6cxyFzSNgbCEQp"}}}', 568.63, 'STRIPE', 1, '2020-02-07 10:05:43', '2020-02-07 10:05:43'),
(8, '#ENVSHOP1581325714', 32, '{"name":"Narinder Singh","email":"bajwa9876470491@gmail.com","phone_number":"01212878777","address":"Bourbon Street","country":"United States","state":"MA","city":"Peabody","zipcode":"01960","latitude":"42.5466407","longitude":"-70.9792677","country_short_code":"US"}', '{"name":"Narinder Singh","email":"bajwa9876470491@gmail.com","phone_number":"01212878777","address":"Gravity Falls Lane","country":"United States","state":"OK","city":"Oklahoma City","zipcode":"73142","latitude":"35.6200913","longitude":"-97.6450338","country_short_code":"US","tax":8.63}', '{"id":"ch_1GAYFqENgNZPUt9KQCRyImWK","object":"charge","amount":489463,"amount_refunded":0,"application":null,"application_fee":null,"application_fee_amount":null,"balance_transaction":"txn_1GAYFrENgNZPUt9K6uv39HDx","billing_details":{"address":{"city":null,"country":null,"line1":null,"line2":null,"postal_code":null,"state":null},"email":null,"name":"bajwa9876470491@gmail.com","phone":null},"captured":true,"created":1581325714,"currency":"usd","customer":null,"description":"Customer for pay for #ENVSHOP1581325714","destination":null,"dispute":null,"disputed":false,"failure_code":null,"failure_message":null,"fraud_details":[],"invoice":null,"livemode":false,"metadata":[],"on_behalf_of":null,"order":null,"outcome":{"network_status":"approved_by_network","reason":null,"risk_level":"normal","risk_score":10,"seller_message":"Payment complete.","type":"authorized"},"paid":true,"payment_intent":null,"payment_method":"card_1GAYFmENgNZPUt9KhpN9AqJA","payment_method_details":{"card":{"brand":"visa","checks":{"address_line1_check":null,"address_postal_code_check":null,"cvc_check":"pass"},"country":"US","exp_month":12,"exp_year":2020,"fingerprint":"5yPNVhsLBrcpIKlS","funding":"unknown","installments":null,"last4":"1111","network":"visa","three_d_secure":null,"wallet":null},"type":"card"},"receipt_email":null,"receipt_number":null,"receipt_url":"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1Fbq7RENgNZPUt9K\\/ch_1GAYFqENgNZPUt9KQCRyImWK\\/rcpt_GhyCrpYPQcnaevGi36OhruFYElYUg7v","refunded":false,"refunds":{"object":"list","data":[],"has_more":false,"total_count":0,"url":"\\/v1\\/charges\\/ch_1GAYFqENgNZPUt9KQCRyImWK\\/refunds"},"review":null,"shipping":null,"source":{"id":"card_1GAYFmENgNZPUt9KhpN9AqJA","object":"card","address_city":null,"address_country":null,"address_line1":null,"address_line1_check":null,"address_line2":null,"address_state":null,"address_zip":null,"address_zip_check":null,"brand":"Visa","country":"US","customer":null,"cvc_check":"pass","dynamic_last4":null,"exp_month":12,"exp_year":2020,"fingerprint":"5yPNVhsLBrcpIKlS","funding":"unknown","last4":"1111","metadata":[],"name":"bajwa9876470491@gmail.com","tokenization_method":null},"source_transfer":null,"statement_descriptor":null,"statement_descriptor_suffix":null,"status":"succeeded","transfer_data":null,"transfer_group":null}', '{"31":{"vendor_id":31,"total":4894.63,"amount":"17418","tax":8.63,"commission_fee":348.36,"service_fee":348,"payable_amount":16722,"account_id":"acct_1G6cxyFzSNgbCEQp","stripeAccountParams":{"amount":16722,"stripe_account":"acct_1G6cxyFzSNgbCEQp"}}}', 4894.63, 'STRIPE', 3, '2020-02-10 03:38:35', '2020-02-10 03:38:35'),
(9, '#ENVSHOP1581410242', 60, '{"name":"Kanny Customer","email":"kannyc@yopmail.com","phone_number":"9465470549","address":"New Bern Avenue","country":"United States","state":"NC","city":"Raleigh","zipcode":"07114","latitude":"35.7899227","longitude":"-78.58670099999999","country_short_code":"US"}', '{"name":"Kanny Customer","email":"kannyc@yopmail.com","phone_number":"9465470549","address":"New Bern Avenue","country":"United States","state":"NC","city":"Raleigh","zipcode":"07114","latitude":"35.7899227","longitude":"-78.58670099999999","country_short_code":"US","tax":6.63}', '{"id":"ch_1GAuFCENgNZPUt9KGibezxkk","object":"charge","amount":5863,"amount_refunded":0,"application":null,"application_fee":null,"application_fee_amount":null,"balance_transaction":"txn_1GAuFDENgNZPUt9KHoOYgt6X","billing_details":{"address":{"city":null,"country":null,"line1":null,"line2":null,"postal_code":null,"state":null},"email":null,"name":"kannyc@yopmail.com","phone":null},"captured":true,"created":1581410242,"currency":"usd","customer":null,"description":"Customer for pay for #ENVSHOP1581410242","destination":null,"dispute":null,"disputed":false,"failure_code":null,"failure_message":null,"fraud_details":[],"invoice":null,"livemode":false,"metadata":[],"on_behalf_of":null,"order":null,"outcome":{"network_status":"approved_by_network","reason":null,"risk_level":"normal","risk_score":22,"seller_message":"Payment complete.","type":"authorized"},"paid":true,"payment_intent":null,"payment_method":"card_1GAuF9ENgNZPUt9KH5Jzm7td","payment_method_details":{"card":{"brand":"visa","checks":{"address_line1_check":null,"address_postal_code_check":null,"cvc_check":"pass"},"country":"US","exp_month":11,"exp_year":2022,"fingerprint":"msKWEk5zSbOlPaGy","funding":"credit","installments":null,"last4":"4242","network":"visa","three_d_secure":null,"wallet":null},"type":"card"},"receipt_email":null,"receipt_number":null,"receipt_url":"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1Fbq7RENgNZPUt9K\\/ch_1GAuFCENgNZPUt9KGibezxkk\\/rcpt_GiKvq7JDi3BV2xo1NhAXTYv9aQrvVvL","refunded":false,"refunds":{"object":"list","data":[],"has_more":false,"total_count":0,"url":"\\/v1\\/charges\\/ch_1GAuFCENgNZPUt9KGibezxkk\\/refunds"},"review":null,"shipping":null,"source":{"id":"card_1GAuF9ENgNZPUt9KH5Jzm7td","object":"card","address_city":null,"address_country":null,"address_line1":null,"address_line1_check":null,"address_line2":null,"address_state":null,"address_zip":null,"address_zip_check":null,"brand":"Visa","country":"US","customer":null,"cvc_check":"pass","dynamic_last4":null,"exp_month":11,"exp_year":2022,"fingerprint":"msKWEk5zSbOlPaGy","funding":"credit","last4":"4242","metadata":[],"name":"kannyc@yopmail.com","tokenization_method":null},"source_transfer":null,"statement_descriptor":null,"statement_descriptor_suffix":null,"status":"succeeded","transfer_data":null,"transfer_group":null}', '{"59":{"vendor_id":59,"total":58.629999999999995,"amount":"50","tax":6.63,"commission_fee":1,"service_fee":2,"payable_amount":47,"account_id":"acct_1Fz0whE8A1VCXYb0","stripeAccountParams":{"amount":47,"stripe_account":"acct_1Fz0whE8A1VCXYb0"}}}', 58.629999999999995, 'STRIPE', 1, '2020-02-11 03:07:23', '2020-02-11 03:07:23'),
(10, '#ENVSHOP1581412551', 60, '{"name":"Kanny Customer","email":"kannyc@yopmail.com","phone_number":"9465470549","address":"New Bern Avenue","country":"United States","state":"NC","city":"Raleigh","zipcode":"07114","latitude":"35.7899227","longitude":"-78.58670099999999","country_short_code":"US"}', '{"name":"Kanny Customer","email":"kannyc@yopmail.com","phone_number":"9465470549","address":"New Bern Avenue","country":"United States","state":"NC","city":"Raleigh","zipcode":"07114","latitude":"35.7899227","longitude":"-78.58670099999999","country_short_code":"US","tax":6.63}', '{"id":"ch_1GAuqRENgNZPUt9K4Fuy32Js","object":"charge","amount":5863,"amount_refunded":0,"application":null,"application_fee":null,"application_fee_amount":null,"balance_transaction":"txn_1GAuqSENgNZPUt9KoPCBowCM","billing_details":{"address":{"city":null,"country":null,"line1":null,"line2":null,"postal_code":null,"state":null},"email":null,"name":"kannyc@yopmail.com","phone":null},"captured":true,"created":1581412551,"currency":"usd","customer":null,"description":"Customer for pay for #ENVSHOP1581412551","destination":null,"dispute":null,"disputed":false,"failure_code":null,"failure_message":null,"fraud_details":[],"invoice":null,"livemode":false,"metadata":[],"on_behalf_of":null,"order":null,"outcome":{"network_status":"approved_by_network","reason":null,"risk_level":"normal","risk_score":29,"seller_message":"Payment complete.","type":"authorized"},"paid":true,"payment_intent":null,"payment_method":"card_1GAuqOENgNZPUt9K5XHGH8vy","payment_method_details":{"card":{"brand":"visa","checks":{"address_line1_check":null,"address_postal_code_check":null,"cvc_check":"pass"},"country":"US","exp_month":11,"exp_year":2022,"fingerprint":"msKWEk5zSbOlPaGy","funding":"credit","installments":null,"last4":"4242","network":"visa","three_d_secure":null,"wallet":null},"type":"card"},"receipt_email":null,"receipt_number":null,"receipt_url":"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1Fbq7RENgNZPUt9K\\/ch_1GAuqRENgNZPUt9K4Fuy32Js\\/rcpt_GiLXox6KnqR4GwMt15ZDp7bI6eY8TPs","refunded":false,"refunds":{"object":"list","data":[],"has_more":false,"total_count":0,"url":"\\/v1\\/charges\\/ch_1GAuqRENgNZPUt9K4Fuy32Js\\/refunds"},"review":null,"shipping":null,"source":{"id":"card_1GAuqOENgNZPUt9K5XHGH8vy","object":"card","address_city":null,"address_country":null,"address_line1":null,"address_line1_check":null,"address_line2":null,"address_state":null,"address_zip":null,"address_zip_check":null,"brand":"Visa","country":"US","customer":null,"cvc_check":"pass","dynamic_last4":null,"exp_month":11,"exp_year":2022,"fingerprint":"msKWEk5zSbOlPaGy","funding":"credit","last4":"4242","metadata":[],"name":"kannyc@yopmail.com","tokenization_method":null},"source_transfer":null,"statement_descriptor":null,"statement_descriptor_suffix":null,"status":"succeeded","transfer_data":null,"transfer_group":null}', '{"59":{"vendor_id":59,"total":58.629999999999995,"amount":"100","tax":6.63,"commission_fee":2,"service_fee":2,"payable_amount":96,"account_id":"acct_1Fz0whE8A1VCXYb0","stripeAccountParams":{"amount":96,"stripe_account":"acct_1Fz0whE8A1VCXYb0"}}}', 58.629999999999995, 'STRIPE', 1, '2020-02-11 03:45:52', '2020-02-11 03:45:52');

-- --------------------------------------------------------

--
-- Table structure for table `shop_pages`
--

CREATE TABLE `shop_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'shop',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_pages`
--

INSERT INTO `shop_pages` (`id`, `title`, `slug`, `description`, `type`, `created_at`, `updated_at`) VALUES
(3, 'Privacy Policy', 'privacy-policy', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'shop', '2020-02-11 09:36:53', '2020-02-14 02:47:56'),
(4, 'Terms & Condition', 'terms-condition', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'shop', '2020-02-14 02:48:35', '2020-02-14 02:48:35'),
(5, 'About US', 'about-us', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'shop', '2020-02-14 02:49:12', '2020-02-14 02:49:12');

-- --------------------------------------------------------

--
-- Table structure for table `styles`
--

CREATE TABLE `styles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `added_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `styles`
--

INSERT INTO `styles` (`id`, `user_id`, `added_by`, `slug`, `description`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'style', 'Photobooth', 'Photobooth', '1573834276.png', 1, '2019-11-15 09:37:28', '2019-12-31 01:42:13'),
(2, 1, 'admin', 'demo2-style', 'Albums', 'Albums', '1574317853.jpg', 0, '2019-11-16 00:50:03', '2019-12-31 01:42:09'),
(3, 1, 'admin', 'jimmy-choo', 'History (from Greek ἱστορία, historia, meaning \'inquiry; knowledge acquired by investigation\') is the past as it is described in written documents History (from Greek ἱστορία, historia, meaning \'inquiry; knowledge acquired by investigation\') is the past as it is described in written documents', 'Jimmy Choo', '1574318296.jpg', 1, '2019-11-21 01:08:16', '2019-12-31 01:41:46'),
(4, 1, 'admin', 'tester', 'en.wikipedia.org/wiki/History\r\nSocial history, sometimes called the new social history, is the field that includes history of ordinary people and their strategies and institutions for coping with life. In its "golden age" it was a major growth field in the 1960s and 1970s among scholars, and still is well represented in history departments.', 'Tester', '1575264859.jpg', 1, '2019-12-02 00:04:19', '2019-12-31 01:42:14'),
(6, 59, 'vendor', 'dummy-style', 'Testing is the descriptions', 'Dummy Style', '1577786404.png', 1, '2019-12-31 04:30:04', '2019-12-31 05:15:49');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `slug`, `description`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'marbel-freytag', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambledspecimen book.', 'MARBEL FREYTAG', '1583919328.jpeg', 1, '2020-03-11 02:51:13', '2020-03-12 00:02:03'),
(2, 'nikki-rogers', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambledspecimen book.', 'NIKKI ROGERS', '1583919344.png', 1, '2020-03-11 03:17:39', '2020-03-11 04:54:49'),
(3, 'ria-hannah', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambledspecimen book.', 'RIA HANNAH', '1583919351.jpeg', 1, '2020-03-11 03:19:28', '2020-03-11 04:56:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `town` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `county` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ein_bs_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` date DEFAULT NULL,
  `id_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'user',
  `custom_token` longtext COLLATE utf8mb4_unicode_ci,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` tinyint(2) DEFAULT NULL,
  `paypal_account` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_count` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_status` int(11) NOT NULL DEFAULT '0',
  `refer_data` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `first_name`, `last_name`, `gender`, `date_of_birth`, `address`, `town`, `postcode`, `county`, `country`, `email`, `phone_number`, `user_location`, `latitude`, `longitude`, `email_verified_at`, `password`, `website_url`, `ein_bs_number`, `age`, `id_proof`, `role`, `custom_token`, `profile_image`, `status`, `payment_status`, `payment_type`, `paypal_account`, `stripe_account`, `login_count`, `remember_token`, `updated_status`, `refer_data`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin', 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin@gmail.com', '0', NULL, NULL, NULL, NULL, '$2y$10$UIg567laqenUCo1i8AyPXO7HkApsEkBOXZMZe31JKLyex7w65XXj.', NULL, NULL, NULL, NULL, 'admin', NULL, 'images/admin/1583936859PH4ZRR75ReZMRfSwYFaADRHSPORT1.png', 1, NULL, NULL, NULL, NULL, 0, 'lS91e9Ynr3eZHBPiaCSvK8yKSAKgOE3pqNCaGFVEyqeLknctraeSZT7Rkux3', 0, NULL, '2019-11-09 00:19:35', '2020-03-11 08:57:39'),
(106, 2, 'First Name Last Name', 'First Name', 'Last Name', 'male', '121212-03-21', 'Cecilia Chapman 711-2880 Nulla St. Mankato Mississippi 96522 (257) 563-7401', 'Town TownTown', '@#@#@#%', 'CountyCounty County', 'French Southern Territories', 'parents@yopmail.com', '123456789012121', NULL, NULL, NULL, '2020-03-18 05:40:38', '$2y$10$NTUnAeDyuCgR1IlvhhYAiuRTr15GsaYCizj/Oaqdr4VIfy/1lZDq6', NULL, NULL, NULL, NULL, 'user', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, '2020-03-18 05:39:44', '2020-03-18 05:45:32'),
(107, 2, 'test team', 'test', 'team', 'male', '275760-03-10', 'fgf', 'gbn', 'vgn', 'bvm', 'Anguilla', 'test90@yopmail.com', '124567800', NULL, NULL, NULL, NULL, '$2y$10$1cfcbbjfq2F7ROdDrwJo2.u1g51ZEW6ZNB7C29BpPynVMwJKW/e1u', NULL, NULL, NULL, NULL, 'user', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 'pOZV8TurDlItwPr4fQhkPt5W4JcszsFIYK6yGr4tvfWZiwkBrCdfuvEdAvLh', 0, NULL, '2020-03-19 00:07:24', '2020-03-19 00:07:24'),
(108, 2, 'Shhshs Bsbsb', 'Shhshs', 'Bsbsb', 'female', '2020-03-20', 'Shhshsh', 'Hwbweb', 'Hwhw', 'Hhg', 'Åland', 'Mehak@yopmail.com', '2233334444', NULL, NULL, NULL, NULL, '$2y$10$eJj/pM3X.nB8yJrVMRDI9Om./Ls.vtGyVfhmOMjGc7tOf0kD7ogRu', NULL, NULL, NULL, NULL, 'user', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, '2020-03-19 03:18:45', '2020-03-19 03:18:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_events`
--

CREATE TABLE `user_events` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_budget` double DEFAULT '0',
  `long_description` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(2) DEFAULT '0',
  `min_person` int(11) DEFAULT NULL,
  `max_person` int(11) DEFAULT NULL,
  `start_time` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seasons` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colour` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notepad` text COLLATE utf8mb4_unicode_ci,
  `ideas` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_events`
--

INSERT INTO `user_events` (`id`, `user_id`, `slug`, `title`, `event_picture`, `event_budget`, `long_description`, `description`, `start_date`, `end_date`, `location`, `latitude`, `longitude`, `event_type`, `status`, `min_person`, `max_person`, `start_time`, `end_time`, `seasons`, `colour`, `notepad`, `ideas`, `created_at`, `updated_at`) VALUES
(17, 50, 'new', 'new', NULL, 0, NULL, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form', '2019-12-15 18:30:00', '2019-12-27 18:30:00', 'Disneyland Drive, Anaheim, CA, USA', '33.8136287', '-117.92424490000002', '2', 0, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-09 10:50:14', '2019-12-16 07:57:08'),
(18, 50, 'my-winter', 'My Birthday Bash', NULL, 0, NULL, 'Lorium Epsum is proper part of Testing. Lorium Epsum is proper part of Testing so on part of Testing so on part of Testing so on', '2019-12-12 18:30:00', '2019-12-27 18:30:00', 'Logan Airport Terminal B, East Boston, MA, USA', '42.3645508', '-71.01954490000003', '6', 0, 5, 12, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-10 00:25:18', '2019-12-12 00:57:17'),
(19, 32, 'my-birthbay-party', 'My Birthbay Party', 'images/events/1576748520CyvmkqmYoFI1ipv3HFMppackageimg1.png', 50000, 'sdddddddddd', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour', '2019-12-30 18:30:00', '2020-01-09 18:30:00', 'New York State Thruway, Central Valley, NY, USA', '42.9586191', '-76.90872790000003', '3', 0, 10, 100, '2:30 PM', '03:30 PM', 'sdsdsd', '#835656', 'sds', 'sdsd', '2019-12-11 06:51:19', '2019-12-27 15:38:13'),
(20, 32, 'wedding-anniversary', 'Wedding Anniversary', 'images/events/1577345015lKRhbe2ZlZxmuIMyxPbRvideoposter.png', 5000, 'ssssssssssss', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour', '2019-12-30 18:30:00', '2020-01-09 18:30:00', 'Newark International Airport Street, Newark, NJ, USA', '40.6921118', '-74.1828812', '2', 0, 120, 200, '2:30 PM', '03:30 PM', 'sdsdsd', '#ce3737', 'sds', 'sdsdsd', '2019-12-11 06:52:40', '2019-12-27 13:52:21'),
(21, 60, 'birthday-bash', 'Birthday Bash', 'images/events/1576748659voQQBEXaLUxYclJNZMq315747561420CECWnSZ7yaVhvavQEMn14997.png', 15000, '', 'It\'s my Birthday Event', '2019-12-27 18:30:00', '2019-12-28 18:30:00', 'Miami Circle Northeast, Atlanta, GA, USA', '33.83015460000001', '-84.36332010000001', '17', 0, 5, 180, '09:15 AM', '06:15 AM', 'Summer', '#cc1414', 'Test', 'Test', '2019-12-11 10:20:02', '2019-12-26 05:10:15'),
(22, 61, 'test-photoshot', 'Test photoshot', NULL, 0, NULL, 'test', '2019-12-30 18:30:00', '2020-01-30 18:30:00', 'New Orleans Drive, Fort Hunt, VA, USA', '38.74248300000001', '-77.066777', '6', 0, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-13 21:01:51', '2019-12-13 21:01:51'),
(25, 32, 'xxl', 'XXL', 'images/events/1576586971wxYQsjyN1Ha7J7wSXOTScommas.png', 0, NULL, 'kgkg', '2019-12-18 18:30:00', '2019-12-18 18:30:00', 'Logan Airport Terminal B, East Boston, MA, USA', '42.3645508', '-71.01954490000003', '17', 0, 5, 7, '22:22', '22:55', NULL, NULL, NULL, NULL, '2019-12-17 07:19:31', '2019-12-17 07:19:31'),
(26, 32, 'sample-1', 'Sample 1', 'images/events/1577787926qSF4AwEngYKtG3gWiBmovendor01.png', 50000, 'test', 'kgkg', '2020-01-03 18:30:00', '2020-01-10 18:30:00', 'Logan Airport Terminal B, East Boston, MA, USA', '42.3645508', '-71.01954490000003', '2', 0, 100, 500, '10:22 AM', '05:02 PM', 'sdsdsd', '#df1a1a', NULL, NULL, '2019-12-17 07:35:06', '2019-12-31 05:22:04'),
(27, 32, 'my-birthday-event', 'My  Friend Wedding', 'images/events/15765929017ICZLdvwWW8CBQo5UN4deventformimg.png', 50000, '', 'My  Friend Wedding', '2019-12-29 18:30:00', '2020-01-01 18:30:00', 'Love Field Drive, Dallas, TX, USA', '32.85203', '-96.8587106', '2', 0, 30, 50, '22:22', '12:02', 'test', '#fc0000', NULL, NULL, '2019-12-17 08:58:22', '2019-12-27 12:28:27'),
(28, 60, 'test', 'test', 'images/events/1576617752hp5EwLpBIlAM87S96wH024.09.2019_20.02.43_REC.png', 0, NULL, 'test', '2019-12-17 18:30:00', '2019-12-19 18:30:00', 'Manassas Circle, Vienna, VA, USA', '38.890749', '-77.2370482', '6', 0, 10, 100, '01:00', '13:00', NULL, NULL, NULL, NULL, '2019-12-17 15:52:32', '2019-12-17 15:52:32'),
(29, 60, 'xxl-1', 'XXL', 'images/events/1576667588k13j5M5Vy16P1ooH3RL2menuaboutus.png', 0, NULL, 'kgkg', '2019-12-18 18:30:00', '2019-12-19 18:30:00', 'Teston Road, Woodbridge, ON, Canada', '43.8676065', '-79.5438924', '17', 0, 2, 5, '22:22', '22:02', 'sdsdsd', '#360909', 'tes', 'test', '2019-12-18 05:43:08', '2019-12-18 05:43:08'),
(30, 60, 'xxl-2', 'XXL', 'images/events/157667078193yh1ZS8vtFB87Ft1ytFforgotpassbanner.png', 0, 'dfffffffffffffffffff', 'kgkg', '2019-12-18 18:30:00', '2019-12-28 18:30:00', 'Teston Road, Woodbridge, ON, Canada', '43.8676065', '-79.5438924', '17', 0, 5, 6, '2:30 PM', '03:30 PM', 'sdsdsd', '#8e4040', 'tst', 'tst', '2019-12-18 06:00:33', '2019-12-18 06:36:21'),
(31, 60, 'xxl-3', 'XXL', 'images/events/1576671562vfRQWSCgcL8Tb5z3SZLhcalculators.png', 1444, 'dfffffffffffffffffff', 'kgkg', '2019-12-18 18:30:00', '2019-12-28 18:30:00', 'Teston Road, Woodbridge, ON, Canada', '43.8676065', '-79.5438924', '2', 0, 5, 6, '2:30 PM', '03:30 PM', 'sdsdsd', '#8e4040', 'tst', 'tst', '2019-12-18 06:34:01', '2019-12-18 06:53:22'),
(32, 60, 'lorem-ipsum-dolor-sit', 'Lorem ipsum dolor sit', 'images/events/1576671989s2UbvLhU0bM9r1AYkSP6eventformimg.png', 112, 'sdddddd', 'ssssss', '2019-12-19 13:04:51', '2019-12-19 13:04:51', 'Logan Airport Terminal B, East Boston, MA, USA', '42.3645508', '-71.01954490000003', '2', 0, 5, 12, '09:15 PM', '05:25 PM', 'sdsdsd', '#bc5151', 'Events are on the top of the world', 'Testing Ideas is running', '2019-12-18 06:56:29', '2019-12-19 07:34:51'),
(33, 60, 'dream-pool', 'Dream Pool', 'images/events/1576704472U9uAYpo2oNSkWdIc8fQt24.09.2019_19.56.56_REC.png', 30000, 'long', 'Pool Party', '2019-12-18 18:30:00', '2020-02-19 18:30:00', 'Willow Oaks Corporate Drive, Annandale, VA, USA', '38.86409560000001', '-77.23121220000002', '11', 0, 10, 2000, '2:30 PM', '2:30 PM', 'Winter', '#008080', 'none', 'none', '2019-12-18 15:57:52', '2019-12-18 15:57:52'),
(34, 60, 'technology-event', 'Technology Event', 'images/events/1576750039Q1HnCw9QUYZUAxVce4FY15747561420CECWnSZ7yaVhvavQEMn14997.png', 1500, 'This is the long dummy event', 'This is the dummy event', '2019-12-28 18:30:00', '2020-01-30 18:30:00', 'Newbury Street, Boston, MA, USA', '42.3481375', '-71.08792870000002', '5', 0, 1, 200, '2:30 PM', '06:25 AM', 'Summer', '#f14747', NULL, NULL, '2019-12-19 04:37:20', '2019-12-19 04:37:20'),
(35, 60, 'birthday-event', 'Birthday Event', 'images/events/157675311250WaTOMWVJXmkph6csTlanchez4_51_698336157383070553519.jpg', 1500, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text', 'Short Event Description', '2020-01-21 13:31:04', '2020-01-21 13:31:04', 'Teston Road, Woodbridge, ON, Canada', '43.8676065', '-79.5438924', '17', 0, 10, 1000, '2:30 PM', '2:30 PM', 'Summer', '#e80d0d', NULL, '<p>Test</p>', '2019-10-02 05:28:32', '2020-01-21 08:01:04'),
(36, 63, 'my-marriage', 'my marriage', 'images/events/1577179249vH0WZDxPguaDuxjmPPNY30.jpg', 2000, 'The definition of marriage is the religious or legal process through which people become husband and wife, husband and husband or wife and wife, or the state of being married. An example of marriage is the Sacrament of Holy Matrimony.', 'The definition of marriage is the religious or legal process through which people become husband and wife, husband and husband or wife and wife, or the state of being married. An example of marriage is the Sacrament of Holy Matrimony.', '2019-12-24 18:30:00', '2019-12-25 18:30:00', 'Test Drive, Chattanooga, TN, USA', '35.0602608', '-85.18986029999996', '2', 0, 100, 200, '11 AM', '06:30 PM', 'winter', '#0000ff', NULL, NULL, '2019-12-24 03:50:49', '2019-12-24 04:09:08'),
(37, 62, 'wedding', 'wedding Me', 'images/events/1577181490tCD5fNRc4UwPCLmb6YDjimg3.jpg', 21000, 'The definition of marriage is the religious or legal process through which people become husband and wife, husband and husband or wife and wife, or the state of being married. An example of marriage is the Sacrament of Holy Matrimony.', 'The definition of marriage is the religious or legal process through which people become husband and wife, husband and husband or wife and wife, or the state of being married. An example of marriage is the Sacrament of Holy Matrimony.', '2020-01-15 09:52:23', '2020-01-31 09:52:23', 'Logan Airport Terminal B, East Boston, MA, USA', '42.3645508', '-71.01954490000003', '2', 0, 100, 200, '11 AM', '06 AM', 'winter', '#0000ff', NULL, NULL, '2019-12-24 04:28:10', '2019-12-31 04:45:40'),
(38, 50, 'my-birthday', 'My birthday', 'images/events/157726558267L7GBhugwooLRb10241loyalty24px.svg', 50000, 'Congratulation for using our Platform', 'Congratulation for using our Platform', '2019-12-25 18:30:00', '2019-12-26 18:30:00', 'Teston Road, Woodbridge, ON, Canada', '43.8676065', '-79.5438924', '17', 0, 100, 250, '2:30 PM', '2:30 PM', 'hghh', '#3c2828', NULL, NULL, '2019-12-25 03:49:42', '2019-12-25 06:38:14'),
(39, 60, 'marriage-event', 'Marriage Event', 'images/events/1577694063DQ4bOZysDFJhrMpr3uaG15747561420CECWnSZ7yaVhvavQEMn14997.png', 12000, 'Its the long description working testing', 'Its the dummy testing description', '2020-01-07 18:30:00', '2020-01-30 18:30:00', 'Michigan Avenue, Chicago, IL, USA', '41.816046', '-87.62301689999998', '11', 0, 100, 150, '06:10 AM', '09:30 PM', 'Summer', '#d53d3d', NULL, NULL, '2019-12-30 02:51:04', '2020-01-06 01:07:21'),
(40, 50, 'birthday-bash-party', 'Birthday Bash Party', 'images/events/1577697409eRqVgI1EVuZUhfyw35Fs15747561420CECWnSZ7yaVhvavQEMn14997.png', 2500, 'Birthday Bash Party', 'Birthday Bash Party', '2020-12-16 18:30:00', '2021-01-20 18:30:00', 'Newark International Airport Street, Newark, NJ, USA', '40.6921118', '-74.1828812', '11', 0, 100, 250, '09:15 AM', '06:25 AM', 'Summer', '#d03333', NULL, NULL, '2019-12-30 03:46:49', '2020-01-17 05:13:34'),
(41, 32, 'new-year-party', 'New Year Party', 'images/events/1577772845kYhTealpceB4rMoC6Zg9pop1.png', 5000, 'test', 'test', '2019-12-30 18:30:00', '2019-12-31 18:30:00', 'Newark International Airport Street, Newark, NJ, USA', '40.6921118', '-74.1828812', '11', 0, 100, 200, '11 PM', '02 AM', 'sdsdsd', '#050000', NULL, NULL, '2019-12-31 00:44:05', '2019-12-31 00:44:05'),
(42, 62, 'club-party', 'Club Party', 'images/events/1577775001lRwC8Bifn3tTrvFseBGjimage1.webp', 100, 'OFFICIAL BACK TO SCHOOL PARTY FOR ALL THE SCHOOLS IN THE 336 AREA ( UNCG , NCAT , WSSU , BENNETT , AND ALL OTHER SCHOOLS ) .\r\n\r\nOFFICIAL CAPRICORN BASH\r\n\r\nTEXT 2526783758\r\n\r\nGAMES RULES :\r\n\r\n-ALL MALES WILL RECEIVE', 'OFFICIAL BACK TO SCHOOL PARTY FOR ALL THE SCHOOLS IN THE 336 AREA ( UNCG , NCAT , WSSU , BENNETT , AND ALL OTHER SCHOOLS ) .\r\n\r\nOFFICIAL CAPRICORN BASH\r\n\r\nTEXT 2526783758\r\n\r\nGAMES RULES :\r\n\r\n-ALL MALES WILL RECEIVE', '2019-12-30 18:30:00', '2019-12-31 18:30:00', 'Sunset Boulevard, Pacific Palisades, CA, USA', '34.0473913', '-118.52583340000001', '2', 0, 100, 1000, '03 PM', '07 PM', 'summer', '#ffff00', NULL, NULL, '2019-12-31 01:03:05', '2019-12-31 01:32:46'),
(43, 32, 'event-demo-two', 'Event Demo Two', 'images/events/1577952985Fn6pTG8uHwZZxnVecAQxweatherbg.jpg', 50000, 'Event Demo Two', 'Event Demo Two', '2020-01-21 18:30:00', '2020-01-30 18:30:00', 'New York State Thruway, Central Valley, NY, USA', '42.9586191', '-76.90872790000003', '2', 0, 120, 200, '12:45 PM', '09:45 AM', 'sdsdsd', '#372222', NULL, NULL, '2020-01-02 02:46:25', '2020-01-15 01:10:08'),
(45, 60, 'carnival-event', 'Carnival Event', 'images/events/1578292939UQuLXY5jfde6WMz04gOsbannerimg.png', 2000, 'Loriuem Epsum Dummy Loriuem Epsum Dummy Loriuem Epsum Dummy', 'Loriuem Epsum Dummy', '2020-01-06 18:30:00', '2020-01-08 18:30:00', 'Superstition Springs Mall Circle, Mesa, AZ, USA', '33.3924571', '-111.68790360000003', '17', 0, 100, 200, '09:30 AM', '06:25 PM', 'Summer', '#611111', NULL, NULL, '2020-01-06 01:12:19', '2020-01-06 04:35:18'),
(46, 62, 'function', 'function', 'images/events/1578563510wnw9V6GofrjtE9Mx0VAJchathere.png', 5000, 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum', 'lorem ipsum', '2020-01-09 18:30:00', '2020-01-15 18:30:00', 'DC Drive, Tyler, TX, USA', '32.30049739999999', '-95.3250115', '17', 0, 100, 200, '04:20 AM', '06:20 AM', 'winter', '#80ff00', NULL, NULL, '2020-01-09 04:21:50', '2020-01-09 04:25:11'),
(47, 32, 'kanny-birthday-bash', 'Kanny Birthday Bash', 'images/events/1579166583UWXiQA21FV2qHOr6llGO15747561420CECWnSZ7yaVhvavQEMn14997.png', 25000, 'Lorium Epsum Lorium Epsum', 'Lorium Epsum', '2020-01-17 18:30:00', '2020-01-30 18:30:00', 'Miami Gardens Drive, Hialeah, FL, USA', '25.9409179', '-80.2473297', '2', 0, 10, 100, '06:10 AM', '04:30 AM', 'Summer', '#fe066f', NULL, NULL, '2020-01-16 03:53:03', '2020-01-16 03:53:03'),
(48, 60, 'sdfsd', 'Test Event', 'images/events/1579258860RiqS5BEcVz7cOXyhGaxh8.jpg', 111, 'sdgsd', 'Test', '2020-01-17 18:30:00', '2020-01-18 18:30:00', 'Assembly Row, Somerville, MA, USA', '42.3938779', '-71.0790553', '11', 0, 1, 2, '10:10 AM', '02:10 AM', '213qwsaf', '["#5a1414","#5a1414","#a44343","#a44343","#432e2e","#432e2e"]', NULL, NULL, '2020-01-17 05:31:00', '2020-01-17 10:20:20'),
(49, 60, 'gsdg', 'Ryan Eve', 'images/events/15792591241ZCxDpl2yNlMEzX7i6jp8.jpg', 1, 'Test', 'Test', '2020-01-18 18:30:00', '2020-01-23 18:30:00', 'SD-11, Brandon, SD, USA', '43.5912692', '-96.57229269999999', '11', 0, 1, 11, '09:15 AM', '09:20 AM', '2', '["#de2828"]', NULL, NULL, '2020-01-17 05:35:24', '2020-01-17 10:51:30'),
(50, 60, 'star-dance', 'Star Dance', 'images/events/1579871635bbH1Wd0ks87edo9VLugYFE6F1090274D4D12BF79C1BB7003EC19.jpeg', 1000, 'Stars', 'Stars', '2020-02-23 18:30:00', '2020-02-23 18:30:00', '7920 Jones Branch Drive, McLean, VA, USA', '38.9264629', '-77.2159952', '11', 0, 1, 100, '07 AM', '09 AM', 'Summer', '["#00ff00","#fdc700","#7a219e"]', NULL, NULL, '2020-01-24 07:43:55', '2020-01-24 07:43:55'),
(51, 50, 'asd', 'birth day', 'images/events/1579944976OPmoedbFF21C6f77qNvHpexelsphoto414612.jpeg', 10000, 'my birth day', 'my birth day', '2020-02-05 18:30:00', '2020-03-28 18:30:00', 'Fremont Street, Las Vegas, NV, USA', '36.16139229999999', '-115.1224271', '6', 0, 3, 50, '12:05 AM', '03:15 AM', 'winter', '[{"colourName":"blue","colour":"#ffffff"},{"colourName":"yellow","colour":"#8080ff"}]', NULL, NULL, '2020-01-25 04:06:16', '2020-01-25 05:44:34'),
(52, 60, 'heavy-fun-event', 'Heavy Fun Event', 'images/events/15799576219P8fwGvYOSPrJz90dRVs15747561420CECWnSZ7yaVhvavQEMn14997.png', 1500, 'Lorium Epsum is simple dummy text Lorium Epsum is simple dummy text Lorium Epsum is simple dummy text Lorium Epsum is simple dummy text', 'Lorium Epsum is simple dummy text', '2020-02-27 18:30:00', '2020-03-30 18:30:00', 'Newark International Airport Street, Newark, NJ, USA', '40.6921118', '-74.1828812', '2', 0, 10, 100, '03:15 AM', '07:15 AM', 'Summer', '[{"colourName":"Red","colour":"#f90404"},{"colourName":"Blue","colour":"#0660f1"},{"colourName":"green green","colour":"#000000"}]', NULL, NULL, '2020-01-25 07:37:01', '2020-02-13 08:34:02'),
(53, 50, 'title-n', 'title n', 'images/events/1580722238XcBoALUFlDWW4JEZSs7dpexelsphoto414612.jpeg', 500, 'lg desd', 'desc', '2020-02-05 18:30:00', '2020-02-28 18:30:00', 'Melrose Avenue, Los Angeles, CA, USA', '34.0834668', '-118.3385396', '2', 0, 5, 10, '01:05 AM', '04:20 AM', 'winter', '[{"colourName":"green","colour":"#00ff80"},{"colourName":"blue","colour":"#0000ff"},{"colourName":"gray","colour":"#0080c0"},{"colourName":"c","colour":"#00ffff"}]', NULL, NULL, '2020-02-03 04:00:38', '2020-02-03 04:27:56'),
(54, 62, 'diwali', 'Diwali', 'images/events/1580815243dyJQzngZM7xdIzl3Hsobpic3a.jpg', 10000, 'Diwali, Divali, Deepavali is the Hindu festival of lights, usually lasting five days and celebrated during the Hindu Lunisolar month Kartika. One of the most popular festivals of Hinduism, Diwali symbolizes', 'Diwali, Divali, Deepavali is the Hindu festival of lights, usually lasting five days and celebrated during the Hindu Lunisolar month Kartika. One of the most popular festivals of Hinduism, Diwali symbolizes', '2020-02-04 18:30:00', '2020-02-21 18:30:00', 'Erskine Street, Brooklyn, NY, USA', '40.65591', '-73.86774240000001', '5', 0, 100, 200, '11:00 AM', '06:30 PM', 'winter', '[{"colourName":"green","colour":"#408080"}]', NULL, NULL, '2020-02-04 05:50:44', '2020-02-04 06:52:05'),
(55, 32, 'wedding-anniversary-1', 'Wedding Anniversary', 'images/events/1581090544yF63jasWChjjUDiR60R9photo1507217633297c9815ce2f885.jpeg', 1000, 'wewewe', 'we', '2020-02-01 18:30:00', '2020-02-04 18:30:00', 'Lombard Street, San Francisco, CA, USA', '37.80105529999999', '-122.4262049', '2', 0, 100, 200, '03:15 AM', '03:10 AM', '12', '[{"colourName":"red","colour":"#fe1717"}]', NULL, NULL, '2020-02-06 10:19:04', '2020-02-06 01:37:18'),
(56, 50, 'birthday-function', 'Birthday Function', 'images/events/15814020575xcsiQtMTiOZey5fadxvrecent5.png', 2500, 'Lorem ipsum is simply dummy', 'Lorem ipsum is simply dummy', '2020-02-13 18:30:00', '2020-02-14 18:30:00', 'Lombard Street, San Francisco, CA, USA', '37.80105529999999', '-122.4262049', '17', 0, 120, 250, '03:15 AM', '05:25 AM', 'winter', '[{"colourName":"#d1d1d1","colour":"#212f11"},{"colourName":"#000","colour":"#45ba60"},{"colourName":"#fff","colour":"#8000ff"},{"colourName":"#333","colour":"#400080"}]', NULL, NULL, '2020-02-11 00:50:57', '2020-02-11 00:50:57'),
(57, 32, 'my-darling-s-birthday', 'My Love Birthday', 'images/events/1581582640SaC7DVuBAj2yMW3IJaP6plussizeweddingdressesimage.jpg', 50000, 'tes', 'test', '2020-02-22 18:30:00', '2020-02-23 18:30:00', 'Lombard Street, San Francisco, CA, USA', '37.80105529999999', '-122.4262049', '17', 0, 120, 400, '12:00 AM', '04:00 PM', 'Summer', '[{"colourName":"Red","colour":"#ff0101"},{"colourName":"White","colour":"#ffffff"}]', NULL, NULL, '2020-02-13 03:00:40', '2020-02-20 08:38:22'),
(58, 32, 'my-wedding-anniversary', 'My Wedding Anniversary', 'images/events/1582299847R9ccyNLVlVpKStZT2JdAeventthemebg.jpg', 5000, 'My Wedding Anniversary', 'My Wedding Anniversary', '2020-03-23 18:30:00', '2020-03-24 18:30:00', 'Lombard Street, San Francisco, CA, USA', '37.80105529999999', '-122.4262049', '2', 0, 50, 100, '12:00 AM', '03:00 AM', 'Summer', '[{"colourName":"Red","colour":"#ff0000"}]', NULL, NULL, '2020-02-21 10:14:07', '2020-02-21 10:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `user_event_meta_datas`
--

CREATE TABLE `user_event_meta_datas` (
  `id` int(11) NOT NULL,
  `parent` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `type` varchar(191) NOT NULL,
  `key` varchar(191) NOT NULL,
  `key_value` varchar(191) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_event_meta_datas`
--

INSERT INTO `user_event_meta_datas` (`id`, `parent`, `user_id`, `type`, `key`, `key_value`, `event_id`, `created_at`, `updated_at`) VALUES
(9, 0, 60, 'events', 'category_id', '6', 15, '2019-12-09 09:23:47', '2019-12-09 09:23:47'),
(10, 0, 60, 'events', 'category_id', '1', 15, '2019-12-09 09:23:47', '2019-12-09 09:23:47'),
(11, 0, 50, 'events', 'category_id', '31', 16, '2019-12-09 10:00:23', '2019-12-09 10:00:23'),
(12, 0, 50, 'events', 'category_id', '16', 16, '2019-12-09 10:00:23', '2019-12-09 10:00:23'),
(29, 0, 50, 'events', 'category_id', '16', 18, '2019-12-12 00:57:17', '2019-12-12 00:57:17'),
(34, 0, 61, 'events', 'category_id', '11', 22, '2019-12-13 21:01:51', '2019-12-13 21:01:51'),
(35, 0, 61, 'events', 'category_id', '16', 22, '2019-12-13 21:01:51', '2019-12-13 21:01:51'),
(36, 0, 61, 'events', 'category_id', '18', 22, '2019-12-13 21:01:51', '2019-12-13 21:01:51'),
(37, 0, 61, 'events', 'category_id', '31', 22, '2019-12-13 21:01:51', '2019-12-13 21:01:51'),
(41, 0, 50, 'events', 'category_id', '1', 17, '2019-12-16 07:57:08', '2019-12-16 07:57:08'),
(42, 0, 50, 'events', 'category_id', '11', 17, '2019-12-16 07:57:08', '2019-12-16 07:57:08'),
(43, 0, 50, 'events', 'category_id', '20', 17, '2019-12-16 07:57:08', '2019-12-16 07:57:08'),
(44, 0, 32, 'events', 'category_id', '1', 23, '2019-12-17 06:23:08', '2019-12-17 06:23:08'),
(45, 0, 32, 'events', 'category_id', '11', 23, '2019-12-17 06:23:08', '2019-12-17 06:23:08'),
(46, 0, 32, 'events', 'category_id', '16', 23, '2019-12-17 06:23:08', '2019-12-17 06:23:08'),
(47, 0, 32, 'events', 'category_id', '18', 23, '2019-12-17 06:23:08', '2019-12-17 06:23:08'),
(48, 0, 32, 'events', 'category_id', '31', 23, '2019-12-17 06:23:08', '2019-12-17 06:23:08'),
(49, 0, 32, 'events', 'category_id', '41', 23, '2019-12-17 06:23:08', '2019-12-17 06:23:08'),
(50, 0, 32, 'events', 'category_id', '11', 24, '2019-12-17 06:32:58', '2019-12-17 06:32:58'),
(51, 0, 32, 'events', 'category_id', '11', 25, '2019-12-17 07:19:31', '2019-12-17 07:19:31'),
(54, 0, 60, 'events', 'category_id', '1', 28, '2019-12-17 15:52:32', '2019-12-17 15:52:32'),
(55, 0, 60, 'events', 'category_id', '8', 28, '2019-12-17 15:52:32', '2019-12-17 15:52:32'),
(56, 0, 60, 'events', 'category_id', '11', 28, '2019-12-17 15:52:32', '2019-12-17 15:52:32'),
(57, 0, 60, 'events', 'category_id', '16', 28, '2019-12-17 15:52:33', '2019-12-17 15:52:33'),
(58, 0, 60, 'events', 'category_id', '18', 28, '2019-12-17 15:52:33', '2019-12-17 15:52:33'),
(59, 0, 60, 'events', 'category_id', '31', 28, '2019-12-17 15:52:33', '2019-12-17 15:52:33'),
(60, 0, 60, 'events', 'category_id', '41', 28, '2019-12-17 15:52:33', '2019-12-17 15:52:33'),
(61, 0, 60, 'events', 'category_id', '11', 29, '2019-12-18 05:43:09', '2019-12-18 05:43:09'),
(65, 0, 60, 'events', 'category_id', '11', 30, '2019-12-18 06:32:42', '2019-12-18 06:32:42'),
(66, 0, 60, 'events', 'category_id', '11', 30, '2019-12-18 06:36:21', '2019-12-18 06:36:21'),
(73, 0, 60, 'events', 'category_id', '6', 31, '2019-12-18 06:53:22', '2019-12-18 06:53:22'),
(74, 0, 60, 'events', 'category_id', '11', 31, '2019-12-18 06:53:22', '2019-12-18 06:53:22'),
(75, 0, 60, 'events', 'category_id', '16', 31, '2019-12-18 06:53:22', '2019-12-18 06:53:22'),
(80, 0, 60, 'events', 'category_id', '6', 32, '2019-12-18 07:00:23', '2019-12-18 07:00:23'),
(81, 0, 60, 'events', 'category_id', '11', 32, '2019-12-18 07:00:23', '2019-12-18 07:00:23'),
(82, 0, 60, 'events', 'category_id', '16', 32, '2019-12-18 07:00:23', '2019-12-18 07:00:23'),
(83, 0, 60, 'events', 'category_id', '18', 32, '2019-12-18 07:00:23', '2019-12-18 07:00:23'),
(84, 0, 60, 'events', 'category_id', '1', 33, '2019-12-18 15:57:52', '2019-12-18 15:57:52'),
(85, 0, 60, 'events', 'category_id', '11', 33, '2019-12-18 15:57:52', '2019-12-18 15:57:52'),
(86, 0, 60, 'events', 'category_id', '18', 33, '2019-12-18 15:57:52', '2019-12-18 15:57:52'),
(87, 0, 60, 'events', 'category_id', '20', 33, '2019-12-18 15:57:52', '2019-12-18 15:57:52'),
(88, 0, 60, 'events', 'category_id', '25', 33, '2019-12-18 15:57:52', '2019-12-18 15:57:52'),
(97, 0, 60, 'events', 'category_id', '1', 34, '2019-12-19 04:37:20', '2019-12-19 04:37:20'),
(195, 0, 63, 'events', 'category_id', '1', 36, '2019-12-24 04:09:08', '2019-12-24 04:09:08'),
(196, 0, 63, 'events', 'category_id', '11', 36, '2019-12-24 04:09:08', '2019-12-24 04:09:08'),
(197, 0, 63, 'events', 'category_id', '16', 36, '2019-12-24 04:09:08', '2019-12-24 04:09:08'),
(198, 0, 63, 'events', 'category_id', '18', 36, '2019-12-24 04:09:08', '2019-12-24 04:09:08'),
(199, 0, 63, 'events', 'category_id', '20', 36, '2019-12-24 04:09:08', '2019-12-24 04:09:08'),
(200, 0, 63, 'events', 'category_id', '25', 36, '2019-12-24 04:09:08', '2019-12-24 04:09:08'),
(225, 0, 62, 'events', 'category_id', '1', 37, '2019-12-24 04:45:40', '2019-12-24 04:45:40'),
(226, 0, 62, 'events', 'category_id', '6', 37, '2019-12-24 04:45:41', '2019-12-24 04:45:41'),
(227, 0, 62, 'events', 'category_id', '11', 37, '2019-12-24 04:45:41', '2019-12-24 04:45:41'),
(228, 0, 62, 'events', 'category_id', '16', 37, '2019-12-24 04:45:41', '2019-12-24 04:45:41'),
(229, 0, 62, 'events', 'category_id', '18', 37, '2019-12-24 04:45:41', '2019-12-24 04:45:41'),
(230, 0, 62, 'events', 'category_id', '20', 37, '2019-12-24 04:45:41', '2019-12-24 04:45:41'),
(233, 0, 50, 'events', 'category_id', '11', 38, '2019-12-25 06:38:14', '2019-12-25 06:38:14'),
(234, 0, 50, 'events', 'category_id', '20', 38, '2019-12-25 06:38:14', '2019-12-25 06:38:14'),
(257, 0, 60, 'events', 'category_id', '11', 21, '2019-12-26 05:10:15', '2019-12-26 05:10:15'),
(258, 0, 60, 'events', 'category_id', '20', 21, '2019-12-26 05:10:15', '2019-12-26 05:10:15'),
(259, 0, 32, 'events', 'category_id', '1', 27, '2019-12-27 12:28:27', '2019-12-27 12:28:27'),
(260, 0, 32, 'events', 'category_id', '6', 27, '2019-12-27 12:28:27', '2019-12-27 12:28:27'),
(261, 0, 32, 'events', 'category_id', '11', 27, '2019-12-27 12:28:27', '2019-12-27 12:28:27'),
(262, 0, 32, 'events', 'category_id', '16', 27, '2019-12-27 12:28:27', '2019-12-27 12:28:27'),
(263, 0, 32, 'events', 'category_id', '18', 27, '2019-12-27 12:28:27', '2019-12-27 12:28:27'),
(264, 0, 32, 'events', 'category_id', '20', 27, '2019-12-27 12:28:27', '2019-12-27 12:28:27'),
(265, 0, 32, 'events', 'category_id', '1', 20, '2019-12-27 13:52:21', '2019-12-27 13:52:21'),
(266, 0, 32, 'events', 'category_id', '6', 20, '2019-12-27 13:52:21', '2019-12-27 13:52:21'),
(267, 0, 32, 'events', 'category_id', '11', 20, '2019-12-27 13:52:21', '2019-12-27 13:52:21'),
(268, 0, 32, 'events', 'category_id', '16', 20, '2019-12-27 13:52:21', '2019-12-27 13:52:21'),
(269, 0, 32, 'events', 'category_id', '18', 20, '2019-12-27 13:52:21', '2019-12-27 13:52:21'),
(270, 0, 32, 'events', 'category_id', '20', 20, '2019-12-27 13:52:21', '2019-12-27 13:52:21'),
(271, 0, 32, 'events', 'category_id', '1', 19, '2019-12-27 15:38:13', '2019-12-27 15:38:13'),
(272, 0, 32, 'events', 'category_id', '6', 19, '2019-12-27 15:38:13', '2019-12-27 15:38:13'),
(273, 0, 32, 'events', 'category_id', '11', 19, '2019-12-27 15:38:13', '2019-12-27 15:38:13'),
(274, 0, 32, 'events', 'category_id', '16', 19, '2019-12-27 15:38:13', '2019-12-27 15:38:13'),
(275, 0, 32, 'events', 'category_id', '18', 19, '2019-12-27 15:38:14', '2019-12-27 15:38:14'),
(276, 0, 32, 'events', 'category_id', '20', 19, '2019-12-27 15:38:14', '2019-12-27 15:38:14'),
(286, 0, 32, 'events', 'category_id', '1', 41, '2019-12-31 00:44:05', '2019-12-31 00:44:05'),
(287, 0, 32, 'events', 'category_id', '11', 41, '2019-12-31 00:44:05', '2019-12-31 00:44:05'),
(288, 0, 32, 'events', 'category_id', '18', 41, '2019-12-31 00:44:05', '2019-12-31 00:44:05'),
(289, 0, 32, 'events', 'category_id', '20', 41, '2019-12-31 00:44:06', '2019-12-31 00:44:06'),
(290, 0, 32, 'events', 'category_id', '25', 41, '2019-12-31 00:44:06', '2019-12-31 00:44:06'),
(331, 0, 62, 'events', 'category_id', '1', 42, '2019-12-31 01:32:46', '2019-12-31 01:32:46'),
(332, 0, 62, 'events', 'category_id', '6', 42, '2019-12-31 01:32:46', '2019-12-31 01:32:46'),
(333, 0, 62, 'events', 'category_id', '11', 42, '2019-12-31 01:32:46', '2019-12-31 01:32:46'),
(334, 0, 62, 'events', 'category_id', '16', 42, '2019-12-31 01:32:46', '2019-12-31 01:32:46'),
(335, 0, 62, 'events', 'category_id', '18', 42, '2019-12-31 01:32:46', '2019-12-31 01:32:46'),
(336, 0, 62, 'events', 'category_id', '20', 42, '2019-12-31 01:32:46', '2019-12-31 01:32:46'),
(337, 0, 62, 'events', 'category_id', '25', 42, '2019-12-31 01:32:46', '2019-12-31 01:32:46'),
(338, 0, 62, 'events', 'category_id', '31', 42, '2019-12-31 01:32:47', '2019-12-31 01:32:47'),
(348, 0, 32, 'events', 'category_id', '1', 26, '2019-12-31 05:22:05', '2019-12-31 05:22:05'),
(349, 0, 32, 'events', 'category_id', '6', 26, '2019-12-31 05:22:05', '2019-12-31 05:22:05'),
(350, 0, 32, 'events', 'category_id', '11', 26, '2019-12-31 05:22:05', '2019-12-31 05:22:05'),
(351, 0, 32, 'events', 'category_id', '16', 26, '2019-12-31 05:22:05', '2019-12-31 05:22:05'),
(352, 0, 32, 'events', 'category_id', '18', 26, '2019-12-31 05:22:05', '2019-12-31 05:22:05'),
(353, 0, 32, 'events', 'category_id', '20', 26, '2019-12-31 05:22:05', '2019-12-31 05:22:05'),
(376, 0, 60, 'events', 'category_id', '1', 39, '2020-01-06 01:07:21', '2020-01-06 01:07:21'),
(377, 0, 60, 'events', 'category_id', '11', 39, '2020-01-06 01:07:21', '2020-01-06 01:07:21'),
(378, 0, 60, 'events', 'category_id', '18', 39, '2020-01-06 01:07:22', '2020-01-06 01:07:22'),
(379, 0, 60, 'events', 'category_id', '20', 39, '2020-01-06 01:07:22', '2020-01-06 01:07:22'),
(382, 0, 60, 'events', 'category_id', '11', 45, '2020-01-06 04:35:18', '2020-01-06 04:35:18'),
(383, 0, 60, 'events', 'category_id', '20', 45, '2020-01-06 04:35:18', '2020-01-06 04:35:18'),
(390, 0, 50, 'events', 'category_id', '1', 44, '2020-01-06 09:00:56', '2020-01-06 09:00:56'),
(391, 0, 50, 'events', 'category_id', '6', 44, '2020-01-06 09:00:56', '2020-01-06 09:00:56'),
(397, 0, 62, 'events', 'category_id', '1', 46, '2020-01-09 04:25:11', '2020-01-09 04:25:11'),
(398, 0, 62, 'events', 'category_id', '20', 46, '2020-01-09 04:25:11', '2020-01-09 04:25:11'),
(405, 0, 32, 'events', 'category_id', '1', 43, '2020-01-15 01:10:08', '2020-01-15 01:10:08'),
(406, 0, 32, 'events', 'category_id', '6', 43, '2020-01-15 01:10:08', '2020-01-15 01:10:08'),
(407, 0, 32, 'events', 'category_id', '11', 43, '2020-01-15 01:10:08', '2020-01-15 01:10:08'),
(408, 0, 32, 'events', 'category_id', '16', 43, '2020-01-15 01:10:08', '2020-01-15 01:10:08'),
(409, 0, 32, 'events', 'category_id', '18', 43, '2020-01-15 01:10:08', '2020-01-15 01:10:08'),
(410, 0, 32, 'events', 'category_id', '20', 43, '2020-01-15 01:10:08', '2020-01-15 01:10:08'),
(411, 0, 32, 'events', 'category_id', '1', 47, '2020-01-16 03:53:03', '2020-01-16 03:53:03'),
(412, 0, 32, 'events', 'category_id', '6', 47, '2020-01-16 03:53:03', '2020-01-16 03:53:03'),
(416, 0, 60, 'events', 'category_id', '11', 35, '2020-01-17 04:41:26', '2020-01-17 04:41:26'),
(417, 0, 50, 'events', 'category_id', '1', 40, '2020-01-17 05:13:34', '2020-01-17 05:13:34'),
(418, 0, 50, 'events', 'category_id', '11', 40, '2020-01-17 05:13:34', '2020-01-17 05:13:34'),
(419, 0, 50, 'events', 'category_id', '20', 40, '2020-01-17 05:13:34', '2020-01-17 05:13:34'),
(423, 0, 60, 'events', 'category_id', '20', 48, '2020-01-17 10:20:20', '2020-01-17 10:20:20'),
(426, 0, 60, 'events', 'category_id', '25', 49, '2020-01-17 10:51:30', '2020-01-17 10:51:30'),
(427, 0, 60, 'events', 'category_id', '1', 50, '2020-01-24 07:43:55', '2020-01-24 07:43:55'),
(428, 0, 60, 'events', 'category_id', '11', 50, '2020-01-24 07:43:55', '2020-01-24 07:43:55'),
(429, 0, 60, 'events', 'category_id', '12', 50, '2020-01-24 07:43:55', '2020-01-24 07:43:55'),
(430, 0, 60, 'events', 'category_id', '18', 50, '2020-01-24 07:43:55', '2020-01-24 07:43:55'),
(431, 0, 60, 'events', 'category_id', '20', 50, '2020-01-24 07:43:55', '2020-01-24 07:43:55'),
(432, 0, 60, 'events', 'category_id', '25', 50, '2020-01-24 07:43:55', '2020-01-24 07:43:55'),
(441, 0, 50, 'events', 'category_id', '1', 51, '2020-01-25 05:44:34', '2020-01-25 05:44:34'),
(442, 0, 50, 'events', 'category_id', '20', 51, '2020-01-25 05:44:34', '2020-01-25 05:44:34'),
(455, 0, 50, 'events', 'category_id', '6', 53, '2020-02-03 04:27:56', '2020-02-03 04:27:56'),
(456, 0, 50, 'events', 'category_id', '11', 53, '2020-02-03 04:27:56', '2020-02-03 04:27:56'),
(478, 0, 62, 'events', 'category_id', '1', 54, '2020-02-04 06:52:06', '2020-02-04 06:52:06'),
(479, 0, 62, 'events', 'category_id', '11', 54, '2020-02-04 06:52:06', '2020-02-04 06:52:06'),
(480, 0, 62, 'events', 'category_id', '12', 54, '2020-02-04 06:52:06', '2020-02-04 06:52:06'),
(481, 0, 62, 'events', 'category_id', '16', 54, '2020-02-04 06:52:06', '2020-02-04 06:52:06'),
(482, 0, 62, 'events', 'category_id', '18', 54, '2020-02-04 06:52:06', '2020-02-04 06:52:06'),
(483, 0, 62, 'events', 'category_id', '20', 54, '2020-02-04 06:52:06', '2020-02-04 06:52:06'),
(484, 0, 62, 'events', 'category_id', '41', 54, '2020-02-04 06:52:06', '2020-02-04 06:52:06'),
(509, 0, 50, 'events', 'category_id', '11', 56, '2020-02-11 00:50:57', '2020-02-11 00:50:57'),
(510, 0, 50, 'events', 'category_id', '12', 56, '2020-02-11 00:50:57', '2020-02-11 00:50:57'),
(511, 0, 50, 'events', 'category_id', '20', 56, '2020-02-11 00:50:57', '2020-02-11 00:50:57'),
(528, 0, 32, 'events', 'category_id', '1', 55, '2020-02-12 01:37:18', '2020-02-12 01:37:18'),
(532, 0, 60, 'events', 'category_id', '1', 52, '2020-02-13 08:34:03', '2020-02-13 08:34:03'),
(533, 0, 60, 'events', 'category_id', '6', 52, '2020-02-13 08:34:03', '2020-02-13 08:34:03'),
(534, 0, 60, 'events', 'category_id', '11', 52, '2020-02-13 08:34:03', '2020-02-13 08:34:03'),
(535, 0, 32, 'events', 'category_id', '1', 57, '2020-02-20 08:38:22', '2020-02-20 08:38:22'),
(536, 0, 32, 'events', 'category_id', '12', 57, '2020-02-20 08:38:22', '2020-02-20 08:38:22'),
(537, 0, 32, 'events', 'category_id', '20', 57, '2020-02-20 08:38:22', '2020-02-20 08:38:22'),
(538, 0, 32, 'events', 'category_id', '1', 58, '2020-02-21 10:14:07', '2020-02-21 10:14:07'),
(539, 0, 32, 'events', 'category_id', '6', 58, '2020-02-21 10:14:07', '2020-02-21 10:14:07'),
(540, 0, 32, 'events', 'category_id', '11', 58, '2020-02-21 10:14:07', '2020-02-21 10:14:07'),
(541, 0, 32, 'events', 'category_id', '12', 58, '2020-02-21 10:14:07', '2020-02-21 10:14:07'),
(542, 0, 32, 'events', 'category_id', '16', 58, '2020-02-21 10:14:07', '2020-02-21 10:14:07'),
(543, 0, 32, 'events', 'category_id', '18', 58, '2020-02-21 10:14:07', '2020-02-21 10:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `variations`
--

CREATE TABLE `variations` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variations`
--

INSERT INTO `variations` (`id`, `type`, `parent`, `name`, `value`, `status`, `created_at`, `updated_at`) VALUES
(2, 'colors', 0, 'Colors', '["price","stock"]', 1, '2020-01-16 10:27:57', '2020-01-22 01:43:45'),
(3, 'styles', 0, 'Styles', NULL, 1, '2020-01-16 10:28:03', '2020-01-16 10:28:03'),
(4, 'types', 0, 'Types', 'null', 1, '2020-01-16 10:28:12', '2020-01-17 10:22:46'),
(5, 'toppins', 0, 'Toppins', NULL, 1, '2020-01-16 10:37:24', '2020-01-16 10:37:24'),
(6, 'flavours', 0, 'Flavours', NULL, 1, '2020-01-17 01:49:42', '2020-01-17 01:49:42'),
(7, 'weights', 0, 'Weights', NULL, 1, '2020-01-17 01:50:10', '2020-01-17 01:50:10'),
(8, 'sizes', 0, 'Sizes', NULL, 1, '2020-01-17 01:55:11', '2020-01-17 01:55:11'),
(9, 'by-robby-friedman', 0, 'By Robby Friedman', NULL, 1, '2020-01-17 08:33:34', '2020-01-17 08:33:34'),
(10, 'fabric', 0, 'Fabric', '["price","stock"]', 1, '2020-02-06 02:51:24', '2020-02-06 02:51:24'),
(11, 'toppings', 0, 'Body Width', 'null', 1, '2020-02-11 01:57:08', '2020-02-11 02:02:07'),
(12, 'body-height', 0, 'Body Height', 'null', 1, '2020-02-11 03:16:08', '2020-02-11 03:16:08');

-- --------------------------------------------------------

--
-- Table structure for table `variation_extras`
--

CREATE TABLE `variation_extras` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attributes` longtext COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variation_extras`
--

INSERT INTO `variation_extras` (`id`, `parent`, `slug`, `label`, `name`, `type`, `attributes`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'colors', 'Colour Code', 'color', 'color', '{"id":"get","onchange":"fetch()","style":"width: 46px; margin-left: -2px;","required":"true"}', 1, '2020-01-17 07:00:18', '2020-01-17 07:15:26'),
(2, 0, 'types', 'Test', 'Test', 'color', '{"id":"#1111","placelholder":"test","required":"true"}', 0, '2020-01-31 04:57:16', '2020-01-31 05:00:19');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_amenities`
--

CREATE TABLE `vendor_amenities` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amenity_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `vendor_category_id` int(11) NOT NULL DEFAULT '0',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'amenity',
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_amenities`
--

INSERT INTO `vendor_amenities` (`id`, `parent`, `user_id`, `amenity_id`, `category_id`, `vendor_category_id`, `type`, `status`, `created_at`, `updated_at`) VALUES
(48, 0, 31, 10, 1, 1, 'amenity', NULL, '2019-11-21 04:29:19', '2019-11-21 04:29:19'),
(49, 0, 31, 11, 1, 1, 'amenity', NULL, '2019-11-21 04:29:19', '2019-11-21 04:29:19'),
(50, 0, 31, 4, 1, 1, 'game', NULL, '2019-11-21 04:29:19', '2019-11-21 04:29:19'),
(51, 0, 31, 7, 1, 1, 'game', NULL, '2019-11-21 04:29:19', '2019-11-21 04:29:19'),
(52, 0, 31, 12, 1, 1, 'game', NULL, '2019-11-21 04:29:19', '2019-11-21 04:29:19'),
(53, 0, 31, 10, 18, 2, 'amenity', NULL, '2019-11-21 07:33:20', '2019-11-21 07:33:20'),
(54, 0, 31, 11, 18, 2, 'amenity', NULL, '2019-11-21 07:33:20', '2019-11-21 07:33:20'),
(55, 0, 31, 4, 18, 2, 'game', NULL, '2019-11-21 07:33:20', '2019-11-21 07:33:20'),
(56, 0, 31, 7, 18, 2, 'game', NULL, '2019-11-21 07:33:20', '2019-11-21 07:33:20'),
(57, 0, 31, 12, 18, 2, 'game', NULL, '2019-11-21 07:33:20', '2019-11-21 07:33:20'),
(58, 0, 42, 10, 1, 11, 'amenity', NULL, '2019-11-25 10:39:46', '2019-11-25 10:39:46'),
(59, 0, 42, 4, 1, 11, 'game', NULL, '2019-11-25 10:39:46', '2019-11-25 10:39:46'),
(62, 0, 44, 4, 20, 22, 'game', NULL, '2019-11-26 05:45:23', '2019-11-26 05:45:23'),
(63, 0, 44, 10, 20, 22, 'amenity', NULL, '2019-11-26 05:54:07', '2019-11-26 05:54:07'),
(64, 0, 34, 10, 25, 15, 'amenity', NULL, '2019-11-27 01:37:34', '2019-11-27 01:37:34'),
(65, 0, 31, 10, 11, 24, 'amenity', NULL, '2019-11-27 02:15:47', '2019-11-27 02:15:47'),
(66, 0, 31, 11, 11, 24, 'amenity', NULL, '2019-11-27 02:15:47', '2019-11-27 02:15:47'),
(67, 0, 31, 4, 11, 24, 'game', NULL, '2019-11-27 02:15:47', '2019-11-27 02:15:47'),
(68, 0, 31, 7, 11, 24, 'game', NULL, '2019-11-27 02:15:47', '2019-11-27 02:15:47'),
(74, 0, 34, 11, 20, 14, 'amenity', NULL, '2019-12-03 04:53:48', '2019-12-03 04:53:48'),
(81, 0, 34, 12, 20, 14, 'game', NULL, '2019-12-03 04:56:59', '2019-12-03 04:56:59'),
(87, 0, 34, 12, 11, 25, 'game', NULL, '2019-12-06 07:20:54', '2019-12-06 07:20:54'),
(89, 0, 59, 11, 1, 35, 'amenity', NULL, '2019-12-09 03:20:46', '2019-12-09 03:20:46'),
(90, 0, 59, 12, 1, 35, 'game', NULL, '2019-12-09 03:20:46', '2019-12-09 03:20:46'),
(92, 0, 44, 10, 11, 26, 'amenity', NULL, '2019-12-10 01:04:09', '2019-12-10 01:04:09'),
(100, 0, 44, 16, 11, 26, 'game', NULL, '2019-12-10 01:04:35', '2019-12-10 01:04:35'),
(101, 0, 59, 10, 11, 39, 'amenity', NULL, '2019-12-23 07:49:00', '2019-12-23 07:49:00'),
(102, 0, 59, 11, 11, 39, 'amenity', NULL, '2019-12-23 07:49:00', '2019-12-23 07:49:00'),
(103, 0, 59, 15, 11, 39, 'amenity', NULL, '2019-12-23 07:49:01', '2019-12-23 07:49:01'),
(104, 0, 59, 12, 11, 39, 'game', NULL, '2019-12-23 07:49:01', '2019-12-23 07:49:01'),
(105, 0, 59, 16, 11, 39, 'game', NULL, '2019-12-23 07:49:01', '2019-12-23 07:49:01'),
(106, 0, 31, 6, 12, 52, 'amenity', NULL, '2020-01-09 07:40:55', '2020-01-09 07:40:55'),
(107, 0, 31, 8, 12, 52, 'amenity', NULL, '2020-01-09 07:40:55', '2020-01-09 07:40:55'),
(108, 0, 31, 9, 12, 52, 'amenity', NULL, '2020-01-09 07:40:55', '2020-01-09 07:40:55'),
(109, 0, 31, 11, 12, 52, 'amenity', NULL, '2020-01-09 07:40:55', '2020-01-09 07:40:55'),
(110, 0, 31, 15, 12, 52, 'amenity', NULL, '2020-01-09 07:40:55', '2020-01-09 07:40:55'),
(111, 0, 31, 4, 12, 52, 'game', NULL, '2020-01-09 07:40:55', '2020-01-09 07:40:55'),
(112, 0, 31, 7, 12, 52, 'game', NULL, '2020-01-09 07:40:55', '2020-01-09 07:40:55'),
(113, 0, 31, 12, 12, 52, 'game', NULL, '2020-01-09 07:40:55', '2020-01-09 07:40:55');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_categories`
--

CREATE TABLE `vendor_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_url` text COLLATE utf8mb4_unicode_ci,
  `price` int(11) NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT NULL,
  `publish` int(11) NOT NULL DEFAULT '0',
  `business_location` text COLLATE utf8mb4_unicode_ci,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `travel_distaince` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `capacity_type` int(11) NOT NULL,
  `sitting_capacity` int(11) NOT NULL,
  `standing_capacity` int(11) NOT NULL DEFAULT '0',
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_account` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_account` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_categories`
--

INSERT INTO `vendor_categories` (`id`, `parent`, `user_id`, `category_id`, `title`, `business_url`, `price`, `status`, `publish`, `business_location`, `latitude`, `longitude`, `travel_distaince`, `capacity_type`, `sitting_capacity`, `standing_capacity`, `payment_status`, `paypal_account`, `stripe_account`, `created_at`, `updated_at`) VALUES
(1, 0, 31, 1, 'Prateek Dua Photography', 'prateek-dua-photography', 200, 3, 1, 'Miami Gardens Drive, Hialeah, FL, USA', '25.9409179', '-80.24732970000002', '0', 0, 0, 0, '2', 'photopaypal@gmail.com', 'photostripe@gmail.com', '2019-11-20 01:37:22', '2019-12-05 07:47:02'),
(2, 0, 31, 18, 'SVA Fotografs', 'sva-fotografs', 200, 3, 1, 'Lombard Street, San Francisco, CA, USA', '37.80105529999999', '-122.4262049', '0', 0, 0, 0, NULL, NULL, 'acct_1FqyztCe3tiKFEXp', '2019-11-20 01:45:40', '2020-01-09 07:11:39'),
(3, 1, 31, 29, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2019-11-20 02:32:09', '2019-11-20 02:32:09'),
(4, 1, 31, 30, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2019-11-20 02:32:09', '2019-11-20 02:32:09'),
(5, 1, 31, 35, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2019-11-20 02:32:09', '2019-11-20 02:32:09'),
(6, 1, 31, 36, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2019-11-20 02:32:09', '2019-11-20 02:32:09'),
(7, 1, 31, 37, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2019-11-20 02:32:09', '2019-11-20 02:32:09'),
(8, 1, 31, 38, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2019-11-20 02:32:09', '2019-11-20 02:32:09'),
(9, 1, 31, 39, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2019-11-20 02:32:09', '2019-11-20 02:32:09'),
(10, 1, 31, 40, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2019-11-20 02:32:09', '2019-11-20 02:32:09'),
(11, 0, 42, 1, 'Kanny Gill Photography', 'kanny-gill-photography', 1500, 3, 1, 'New York 112, North Patchogue, NY, USA', '40.78464160000001', '-73.00876929999998', '0', 0, 0, 0, NULL, NULL, NULL, '2019-11-20 03:23:14', '2020-02-05 06:39:56'),
(12, 11, 42, 30, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2019-11-20 03:32:20', '2019-11-20 03:32:20'),
(13, 11, 42, 35, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2019-11-20 03:32:20', '2019-11-20 03:32:20'),
(14, 0, 34, 20, 'Photos', 'photos', 500, 3, 1, 'Korniv Drive, Charlotte, NC, USA', '35.3127194', '-80.93545039999998', '0', 0, 0, 0, '0', 'hospital@yopmail.com', 'acct_1FlvGZCqcZPOBWPd', '2019-11-20 03:35:54', '2019-12-11 04:54:05'),
(15, 0, 34, 25, 'Decoration', 'decoration', 500, 2, 0, 'USC McCarthy Way, Los Angeles, CA, USA', '34.0205687', '-118.2813509', '0', 0, 0, 0, NULL, NULL, NULL, '2019-11-20 03:35:54', '2020-01-22 03:20:20'),
(16, 0, 34, 1, 'photos', 'photos-1', 25, 3, 1, 'Canal Street, Chinatown, NY, USA', '40.7163437', '-73.99638620000002', '0', 0, 0, 0, NULL, NULL, NULL, '2019-11-20 03:35:54', '2019-12-09 04:15:24'),
(17, 0, 40, 6, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2019-11-20 05:19:29', '2019-11-20 05:19:29'),
(18, 2, 31, 44, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2019-11-21 07:33:08', '2019-11-21 07:33:08'),
(19, 14, 34, 34, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2019-11-22 04:58:59', '2019-11-22 04:58:59'),
(20, 15, 34, 13, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2019-11-26 01:09:29', '2019-11-26 01:09:29'),
(21, 0, 44, 1, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2019-11-26 01:20:16', '2019-11-26 01:20:16'),
(22, 0, 44, 20, 'Event planner      12', 'event-planer-123', 0, 2, 0, '', '40.6921118', '-74.1828812', '200', 0, 0, 0, NULL, NULL, 'acct_1Fu0uKGFWCumBAok', '2019-11-26 01:28:19', '2020-01-22 03:23:39'),
(23, 22, 44, 34, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2019-11-26 04:43:03', '2019-11-26 04:43:03'),
(24, 0, 31, 11, 'Harkul Royal Events', 'harkul-royal-events', 5000, 2, 0, 'Miami Beach Boardwalk, Miami Beach, FL, USA', '25.8136198', '-80.1217557', '0', 3, 500, 200, NULL, NULL, NULL, '2019-11-27 01:36:18', '2020-01-22 03:23:49'),
(25, 0, 34, 11, 'Mohali Star', 'mohali-star', 500, 2, 0, '', '37.0902', '95.7129', '100', 0, 0, 0, NULL, NULL, NULL, '2019-11-27 02:13:22', '2020-01-22 03:29:20'),
(26, 0, 44, 11, 'Blush Banquet Hall', 'blush-banquet-hall', 2147483647, 2, 0, 'Miami Beach, FL, USA', '25.792240', '-80.134850', '0', 3, 200000, 300000, NULL, NULL, 'acct_1Fu1UYIc310lkye2', '2019-11-28 03:46:35', '2020-01-22 02:57:46'),
(27, 0, 54, 11, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2019-12-05 01:06:49', '2019-12-05 01:06:49'),
(28, 0, 44, 45, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, '', NULL, '2019-12-05 05:18:33', '2019-12-05 05:18:33'),
(29, 16, 34, 29, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2019-12-06 08:27:48', '2019-12-06 08:27:48'),
(30, 16, 34, 30, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2019-12-06 08:27:48', '2019-12-06 08:27:48'),
(31, 16, 34, 35, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2019-12-06 08:27:48', '2019-12-06 08:27:48'),
(32, 16, 34, 36, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2019-12-06 08:27:48', '2019-12-06 08:27:48'),
(33, 16, 34, 37, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2019-12-06 08:27:48', '2019-12-06 08:27:48'),
(34, 0, 42, 11, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2019-12-09 02:39:29', '2019-12-09 02:39:29'),
(35, 0, 59, 1, 'Kanny Photo Lab', 'kanny-photo-lab', 1000, 5, 0, 'Miami Gardens Drive, Hialeah, FL, USA', '25.9409179', '-80.24732970000002', '0', 0, 0, 0, NULL, NULL, NULL, '2019-12-09 03:10:43', '2020-02-12 09:10:00'),
(37, 35, 59, 37, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2019-12-09 03:20:30', '2019-12-09 03:20:30'),
(38, 35, 59, 35, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2019-12-20 06:32:27', '2019-12-20 06:32:27'),
(39, 0, 59, 11, 'Kanny Gill Venues', 'kanny-gill-venues', 1500, 2, 0, 'South Miami Boulevard, Durham, NC, USA', '35.9251643', '-78.8460943', '0', 3, 10, 100, NULL, NULL, 'acct_1Fu1UYIc310lkye2', '2019-12-23 07:42:11', '2020-01-22 03:26:45'),
(40, 39, 59, 46, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2019-12-23 07:48:49', '2019-12-23 07:48:49'),
(41, 0, 64, 11, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2019-12-30 07:21:02', '2019-12-30 07:21:02'),
(45, 0, 72, 5, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2020-01-02 06:50:51', '2020-01-02 06:50:51'),
(46, 0, 72, 8, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2020-01-02 06:50:51', '2020-01-02 06:50:51'),
(47, 0, 73, 41, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2020-01-02 06:59:16', '2020-01-02 06:59:16'),
(48, 0, 74, 5, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2020-01-07 09:52:59', '2020-01-07 09:52:59'),
(49, 0, 74, 7, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2020-01-07 09:52:59', '2020-01-07 09:52:59'),
(50, 0, 74, 28, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2020-01-07 09:52:59', '2020-01-07 09:52:59'),
(51, 0, 75, 7, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2020-01-07 09:54:58', '2020-01-07 09:54:58'),
(52, 0, 31, 12, 'Lovely Flowers', 'lovely-flowers', 10, 4, 0, 'Lonsdale Avenue, North Vancouver, BC, Canada', '49.32312289999999', '-123.0723529', '0', 0, 0, 0, NULL, NULL, 'acct_1Fz0whE8A1VCXYb0', '2020-01-09 07:27:39', '2020-01-22 00:56:40'),
(53, 0, 76, 17, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2020-01-31 05:35:28', '2020-01-31 05:35:28'),
(54, 0, 76, 18, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2020-01-31 05:35:28', '2020-01-31 05:35:28'),
(55, 0, 77, 17, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2020-02-25 03:06:05', '2020-02-25 03:06:05'),
(56, 0, 77, 18, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, '0', 0, 0, 0, NULL, NULL, NULL, '2020-02-25 03:06:05', '2020-02-25 03:06:05');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_category_meta_datas`
--

CREATE TABLE `vendor_category_meta_datas` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyValue` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `vendor_category_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_category_meta_datas`
--

INSERT INTO `vendor_category_meta_datas` (`id`, `parent`, `key`, `type`, `keyValue`, `user_id`, `category_id`, `vendor_category_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 'business_name', 'basic_information', 'Prateek Dua Photography', 31, 1, 1, '2019-11-20 01:45:48', '2019-11-20 01:54:50'),
(2, NULL, 'address', 'basic_information', 'Miami Gardens Drive, Hialeah, FL, USA', 31, 1, 1, '2019-11-20 01:45:48', '2019-12-02 01:10:49'),
(3, NULL, 'website', 'basic_information', 'http://49.249.236.30:8654', 31, 1, 1, '2019-11-20 01:45:48', '2019-11-20 01:54:50'),
(4, NULL, 'phone_number', 'basic_information', '4158464500', 31, 1, 1, '2019-11-20 01:45:48', '2019-11-20 01:54:50'),
(5, NULL, 'company', 'basic_information', 'Prateek Dua Photography', 31, 1, 1, '2019-11-20 01:45:48', '2019-11-20 01:54:50'),
(6, NULL, 'travel_distaince', 'basic_information', '1000', 31, 1, 1, '2019-11-20 01:45:48', '2019-11-20 01:54:50'),
(7, NULL, 'min_price', 'basic_information', '200', 31, 1, 1, '2019-11-20 01:45:48', '2019-11-20 01:54:50'),
(8, NULL, 'cover_photo', 'basic_information', 'images/vendors/settings/1574348222jhWaq3X8Kpiwvl2jml6k-istockphoto-953790424-612x612.jpg', 31, 1, 1, '2019-11-20 01:45:48', '2019-11-21 09:27:02'),
(9, NULL, 'short_description', 'basic_information', 'Based out of Noida, Prateek Dua Photography is a photography service that specialises in documenting the splendour of your nuptial ceremonies in vibrant pictures and engaging videos. The team of experienced photographers at this company combines traditional, contemporary and portraiture styles of photography and captures the emotions of your family and friends on the day of your wedding in exclusive images.', 31, 1, 1, '2019-11-20 01:45:48', '2019-11-20 01:54:50'),
(10, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/15742352101K1rwYiVUkDUwMtkcSII--dsc6542_15_68762.jpg', 31, 1, 1, '2019-11-20 02:03:30', '2019-11-20 02:03:30'),
(11, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1574235210QTSRE9y4j9CYW20UBEIJ--dsc2796_15_68762.jpg', 31, 1, 1, '2019-11-20 02:03:30', '2019-11-20 02:03:30'),
(12, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1574235210TY35njj6jpTV3FtbehM8--dsc2731_15_68762.jpg', 31, 1, 1, '2019-11-20 02:03:30', '2019-11-20 02:03:30'),
(13, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1574235210L30rURbwQd2nBn5A7ELL--dsc2726_15_68762.jpg', 31, 1, 1, '2019-11-20 02:03:30', '2019-11-20 02:03:30'),
(14, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1574235210ri8VBdDCNpEZ5Lvc57kw-img-9096_15_68762-1562319904.jpg', 31, 1, 1, '2019-11-20 02:03:30', '2019-11-20 02:03:30'),
(17, NULL, 'description', 'description', '<p>Based out of Noida, Prateek Dua Photography is a photography service that specialises in documenting the splendour of your nuptial ceremonies in vibrant pictures and engaging videos. The team of experienced photographers at this company combines traditional, contemporary and portraiture styles of photography and captures the emotions of your family and friends on the day of your wedding in exclusive images. The staff can also modify the snapshots using a variety of visual effects such as monochrome, Sabatier and bokeh.</p>\r\n\r\n<p><strong>Services Offered</strong></p>\r\n\r\n<p>Be it the beauty of bride-to-be or her mehndi designs, the team covers every aspect of the occasion to give you pictorial memories that you can relive for years. To depict the happiness of the couple, the staff conducts candid pre-wedding and post-wedding shoots in attractive photographs. Apart from these, the team of Prateek Dua Photography also sets photo booths at the venue for the entertainment of your guests. The company offers products such as albums and Blue-ray discs or DVDs so that you can store the images of your special day in creative formats.</p>\r\n\r\n<p>Prateek Dua Photography also provides the option of online sharing of your wedding pictures and videos through its social media pages. The packages offered by this company are customisable as per your requirements and the budget. The range of service they offer are:</p>\r\n\r\n<ul>\r\n	<li>Wedding photography and videography</li>\r\n	<li>Pre-wedding shoots</li>\r\n	<li>Candid photography</li>\r\n	<li>Traditional videography and photography</li>\r\n	<li>Cinematography</li>\r\n	<li>Albums</li>\r\n	<li>Photobooth</li>\r\n</ul>', 31, 1, 1, '2019-11-20 02:20:24', '2019-11-20 02:21:50'),
(21, NULL, 'prohibtion', 'prohibtion', '<p>-&nbsp;BYO alcohol</p>\r\n\r\n<p>-&nbsp;General liability insurance required</p>\r\n\r\n<p>-&nbsp;No rice, birdseed, confetti, etc.</p>\r\n\r\n<p>-&nbsp;Approved outside caterer allowed</p>\r\n\r\n<p>-&nbsp;Amplified music OK indoors and outdoors</p>\r\n\r\n<p>-&nbsp;Smoking in designated areas only</p>\r\n\r\n<p>-&nbsp;Music must end by 10:30PM</p>', 31, 1, 1, '2019-11-20 02:36:15', '2019-11-20 02:36:27'),
(22, 0, 'season', 'seasons', '2', 31, 1, 1, '2019-11-20 02:37:10', '2019-11-20 02:37:10'),
(23, NULL, 'business_name', 'basic_information', 'Kanny Gill Photography', 42, 1, 11, '2019-11-20 03:23:21', '2019-11-20 03:27:04'),
(24, NULL, 'address', 'basic_information', 'New York 112, North Patchogue, NY, USA', 42, 1, 11, '2019-11-20 03:23:21', '2019-12-03 07:35:19'),
(25, NULL, 'website', 'basic_information', 'https://kanny-gill.com', 42, 1, 11, '2019-11-20 03:23:21', '2019-11-20 03:27:04'),
(26, NULL, 'phone_number', 'basic_information', '9465470549', 42, 1, 11, '2019-11-20 03:23:21', '2019-11-20 03:27:04'),
(27, NULL, 'company', 'basic_information', 'Gill Works', 42, 1, 11, '2019-11-20 03:23:21', '2019-11-20 03:27:04'),
(28, NULL, 'travel_distaince', 'basic_information', '50', 42, 1, 11, '2019-11-20 03:23:21', '2019-11-20 03:27:04'),
(29, NULL, 'min_price', 'basic_information', '1500', 42, 1, 11, '2019-11-20 03:23:21', '2019-11-20 03:27:04'),
(30, NULL, 'cover_photo', 'basic_information', 'images/vendors/settings/1574240224glAtzumYn3MnBt8lg3PS-t10_1435802609300-solo019.jpg', 42, 1, 11, '2019-11-20 03:23:21', '2019-11-20 03:27:04'),
(31, NULL, 'short_description', 'basic_information', 'I have been so lucky to have lived my dream job for the last 8 years! Yes thats more than 300 weddings, 4 countries and many states. It is such a special thing to share an experience like this. My background in Advertising, documentary and fashion has given me a unique view on the process of recording your wedding. Emotion, the details and the connections made are my focus for the day.', 42, 1, 11, '2019-11-20 03:23:21', '2019-11-20 03:27:04'),
(32, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1574240264BpJpZvD1lhl0y77Jgeh7-t10_1435802609300-solo019.jpg', 42, 1, 11, '2019-11-20 03:27:44', '2019-11-20 03:27:44'),
(36, NULL, 'description', 'description', '<p>&ldquo;IN THE FACE OF LOVE, EVERYONE IS EQUAL. LET EVERYONE HAVE THE FREEDOM TO LOVE AND PURSUE THEIR HAPPINESS&rdquo; . - TSAI ING-WEN</p>\r\n\r\n<p>I have been so lucky to have lived my dream job for the last 8 years! Yes thats more than 300 weddings, 4 countries and many states. It is such a special thing to share an experience like this. My background in Advertising, documentary and fashion has given me a unique view on the process of recording your wedding. Emotion, the details and the connections made are my focus for the day.</p>\r\n\r\n<p>After spending a year abroad to be with my fiance and planing our wedding from Chile I truely understand the stress that can be involved in planning your day. My partner and I fully understand what goes into wedding planning and would love to help you along you path. Every wedding and every couple is unique. I put my focus on making sure that I can help you be at ease throughout this process.</p>\r\n\r\n<p>We both truly hope that we can be a part of others wedding days. We know how special this moment is that we also have dreamed of for for ourselves for so many years.</p>', 42, 1, 11, '2019-11-20 03:31:28', '2019-11-20 03:31:59'),
(45, NULL, 'prohibtion', 'prohibtion', '<p>-&nbsp;Wedding coordinator required</p>\r\n\r\n<p>- Testing</p>\r\n\r\n<p>- Lightning</p>\r\n\r\n<p>-&nbsp;Venue must have keypads</p>', 42, 1, 11, '2019-11-20 03:40:51', '2019-11-20 03:52:40'),
(50, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1574242892rgUPBbk7uXWBEVSbAHoc-anchez4_51_698336-157383070553519.jpg', 42, 1, 11, '2019-11-20 04:11:32', '2019-11-20 04:11:32'),
(53, NULL, 'business_name', 'basic_information', 'photos', 34, 1, 16, '2019-11-20 04:27:21', '2019-12-09 04:15:24'),
(54, NULL, 'address', 'basic_information', 'Canal Street, Chinatown, NY, USA', 34, 1, 16, '2019-11-20 04:27:22', '2019-12-09 04:15:24'),
(55, NULL, 'website', 'basic_information', 'http://google.com`', 34, 1, 16, '2019-11-20 04:27:22', '2019-12-09 04:15:24'),
(56, NULL, 'phone_number', 'basic_information', '4542128525', 34, 1, 16, '2019-11-20 04:27:22', '2019-12-09 04:15:24'),
(57, NULL, 'company', 'basic_information', 'photos', 34, 1, 16, '2019-11-20 04:27:22', '2019-12-09 04:15:24'),
(58, NULL, 'travel_distaince', 'basic_information', '52', 34, 1, 16, '2019-11-20 04:27:22', '2019-12-09 04:15:24'),
(59, NULL, 'min_price', 'basic_information', '25', 34, 1, 16, '2019-11-20 04:27:22', '2019-12-09 04:15:25'),
(60, NULL, 'cover_photo', 'basic_information', 'images/vendors/settings/1575884725Rg0IsmxvCk8NCuqusz5emenuhome.png', 34, 1, 16, '2019-11-20 04:27:22', '2019-12-09 04:15:25'),
(61, NULL, 'short_description', 'basic_information', 'its good', 34, 1, 16, '2019-11-20 04:27:22', '2019-12-09 04:15:24'),
(62, NULL, 'description', 'description', '<p>its too good</p>', 34, 25, 15, '2019-11-20 04:28:17', '2019-11-27 01:37:25'),
(64, NULL, 'prohibtion', 'prohibtion', '<p>its too good descr</p>', 34, 25, 15, '2019-11-20 04:30:00', '2019-11-27 01:39:10'),
(66, NULL, 'business_name', 'basic_information', 'Photos', 34, 20, 14, '2019-11-20 04:38:40', '2019-11-22 01:59:40'),
(67, NULL, 'address', 'basic_information', 'Korniv Drive, Charlotte, NC, USA', 34, 20, 14, '2019-11-20 04:38:40', '2019-12-03 04:24:48'),
(68, NULL, 'website', 'basic_information', 'http://google.com', 34, 20, 14, '2019-11-20 04:38:40', '2019-11-22 01:59:40'),
(69, NULL, 'phone_number', 'basic_information', '123456789', 34, 20, 14, '2019-11-20 04:38:41', '2019-11-22 01:59:40'),
(70, NULL, 'company', 'basic_information', 'company name', 34, 20, 14, '2019-11-20 04:38:41', '2019-11-22 01:59:40'),
(71, NULL, 'travel_distaince', 'basic_information', '400', 34, 20, 14, '2019-11-20 04:38:41', '2019-11-22 01:59:40'),
(72, NULL, 'min_price', 'basic_information', '500', 34, 20, 14, '2019-11-20 04:38:41', '2019-11-22 01:59:40'),
(73, NULL, 'cover_photo', 'basic_information', 'images/vendors/settings/1574694861zzlXTb5ihN0txYdueExN-event-pic.jpg', 34, 20, 14, '2019-11-20 04:38:41', '2019-11-25 09:44:21'),
(74, NULL, 'short_description', 'basic_information', 'short des', 34, 20, 14, '2019-11-20 04:38:41', '2019-11-22 01:59:40'),
(86, 0, 'style', 'styles', '1', 31, 1, 1, '2019-11-21 04:16:56', '2019-11-21 04:16:56'),
(87, 0, 'style', 'styles', '2', 31, 1, 1, '2019-11-21 04:16:56', '2019-11-21 04:16:56'),
(88, NULL, 'business_name', 'basic_information', 'SVA Fotografs', 31, 18, 2, '2019-11-21 04:51:44', '2019-11-21 05:17:33'),
(89, NULL, 'address', 'basic_information', 'Lombard Street, San Francisco, CA, USA', 31, 18, 2, '2019-11-21 04:51:44', '2020-01-09 07:11:39'),
(90, NULL, 'website', 'basic_information', 'http://49.249.236.30:8654', 31, 18, 2, '2019-11-21 04:51:44', '2019-11-21 05:17:34'),
(91, NULL, 'phone_number', 'basic_information', '4158464500', 31, 18, 2, '2019-11-21 04:51:44', '2019-11-21 05:17:34'),
(92, NULL, 'company', 'basic_information', 'SVA Fotografs', 31, 18, 2, '2019-11-21 04:51:44', '2019-11-21 05:17:34'),
(93, NULL, 'travel_distaince', 'basic_information', '1000', 31, 18, 2, '2019-11-21 04:51:44', '2019-11-21 05:17:34'),
(94, NULL, 'min_price', 'basic_information', '200', 31, 18, 2, '2019-11-21 04:51:44', '2019-11-21 05:17:34'),
(95, NULL, 'cover_photo', 'basic_information', '', 31, 18, 2, '2019-11-21 04:51:44', '2019-11-21 04:51:44'),
(96, NULL, 'short_description', 'basic_information', 'I Have Been So Lucky To Have Lived My Dream Job For The Last 8 Years! Yes Thats More Than 300 Weddings, 4 Countries And Many States. It Is Such A Special Thing To Share An Experience Like This. My Background In Advertising, Documentary And Fashion Has Given Me A Unique View On The Process Of Recording Your Wedding. Emotion, The Details And The Connections Made Are My Focus For The Day.', 31, 18, 2, '2019-11-21 04:51:44', '2019-11-21 07:39:06'),
(97, NULL, 'cover_video', 'basic_information', 'videos/vendors/cover/1574336173M1zYTcqIxukRyiJXECXy-background-vdo.mp4', 31, 18, 2, '2019-11-21 04:57:05', '2019-11-21 06:06:13'),
(98, NULL, 'cover_video_image', 'basic_information', 'images/vendors/settings/1574348333YVH915cvghabKZnvRaGG-wedding-photography-melbourne-bride-and-groom-41.jpg', 31, 18, 2, '2019-11-21 04:57:05', '2019-11-21 09:28:53'),
(99, NULL, 'cover_video', 'basic_information', '', 34, 20, 14, '2019-11-21 05:16:33', '2019-11-21 05:16:33'),
(100, NULL, 'cover_video_image', 'basic_information', '', 34, 20, 14, '2019-11-21 05:16:33', '2019-11-21 05:16:33'),
(101, NULL, 'cover_photo_image', 'basic_information', '', 31, 18, 2, '2019-11-21 06:17:11', '2019-11-21 06:17:11'),
(102, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1574340920hVtQum0nwh1O5FFOvwTg--dsc6542_15_68762.jpg', 31, 18, 2, '2019-11-21 07:25:20', '2019-11-21 07:25:20'),
(103, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1574340920ykqEOxFwtqIUYy2iGgSm--dsc2731_15_68762.jpg', 31, 18, 2, '2019-11-21 07:25:20', '2019-11-21 07:25:20'),
(104, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1574340920rVIM8aPIREVIHnzOKll1--dsc2796_15_68762.jpg', 31, 18, 2, '2019-11-21 07:25:20', '2019-11-21 07:25:20'),
(106, NULL, 'description', 'description', '<p>Situated on a 120-acres of rolling hills, The Texas Star, is a beautifully-appointed rustic ranch venue in the Dallas-Fort Worth area of Texas. With its simple charm and tranquil scenery, this unique ranch is the perfect place to host your wedding day or wedding weekend retreat. The ranch offers several spaces to choose from for your wedding day festivities, including: The Great Room, an Amphitheater-style space, and the original party barn. Whether you envision a magical outdoor ceremony or a romantic indoor ceremony, The Texas Star can accommodate you. After the ceremony guests can mix and mingle over cocktails and appetizers. Meanwhile, you and your wedding party can pose for formal portraits along the sprawling estate. After cocktail hour, you can reunite with your guests in the party barn for a delicious meal, toasts, and dancing! Strict attention to detail and comfort ensures that you and your guests will experience and enjoy the country charm of this venue and leave with memories to last a lifetime!</p>', 31, 18, 2, '2019-11-21 07:26:34', '2019-11-21 07:26:48'),
(108, 0, 'style', 'styles', '1', 31, 18, 2, '2019-11-21 07:26:56', '2019-11-21 07:26:56'),
(109, 0, 'style', 'styles', '2', 31, 18, 2, '2019-11-21 07:26:56', '2019-11-21 07:26:56'),
(110, 0, 'style', 'styles', '3', 31, 18, 2, '2019-11-21 07:26:56', '2019-11-21 07:26:56'),
(111, 0, 'season', 'seasons', '1', 31, 18, 2, '2019-11-21 07:33:41', '2019-11-21 07:33:41'),
(112, 0, 'season', 'seasons', '3', 31, 18, 2, '2019-11-21 07:33:41', '2019-11-21 07:33:41'),
(113, 0, 'season', 'seasons', '4', 31, 18, 2, '2019-11-21 07:33:41', '2019-11-21 07:33:41'),
(114, NULL, 'prohibtion', 'prohibtion', '<p>Situated on a 120-acres of rolling hills, The Texas Star, is a beautifully-appointed rustic ranch venue in the Dallas-Fort Worth area of Texas. With its simple charm and tranquil scenery, this unique ranch is the perfect place to host your wedding day or wedding weekend retreat. The ranch offers several spaces to choose from for your wedding day festivities, including: The Great Room, an Amphitheater-style space, and the original party barn. Whether you envision a magical outdoor ceremony or a romantic indoor ceremony, The Texas Star can accommodate you. After the ceremony guests can mix and mingle over cocktails and appetizers. Meanwhile, you and your wedding party can pose for formal portraits along the sprawling estate. After cocktail hour, you can reunite with your guests in the party barn for a delicious meal, toasts, and dancing! Strict attention to detail and comfort ensures that you and your guests will experience and enjoy the country charm of this venue and leave with memories to last a lifetime!</p>', 31, 18, 2, '2019-11-21 07:33:52', '2019-11-21 07:34:03'),
(115, NULL, 'cover_video', 'basic_information', '', 31, 1, 1, '2019-11-21 09:26:52', '2019-11-21 09:26:52'),
(116, NULL, 'cover_video_image', 'basic_information', '', 31, 1, 1, '2019-11-21 09:26:52', '2019-11-21 09:26:52'),
(123, NULL, 'video', 'videoGallery', '{"title":"Sample 1sss","link":"https:\\/\\/www.youtube.com\\/embed\\/ICej-ufgFF4","image":"images\\/vendors\\/gallery\\/1574404144tU1r6Pn5MKODC6zvblyh-wedding-photography-melbourne-bride-and-groom-41.jpg"}', 31, 1, 1, '2019-11-22 00:59:04', '2019-11-22 01:17:07'),
(124, NULL, 'cover_video', 'basic_information', '', 34, 1, 16, '2019-11-22 02:01:29', '2019-11-22 02:01:29'),
(125, NULL, 'cover_video_image', 'basic_information', '', 34, 1, 16, '2019-11-22 02:01:29', '2019-11-22 02:01:29'),
(128, NULL, 'description', 'description', '<p>Knot Just Pictures is a photography company located in Noida and was founded by two professional photographers who started following their passion for photography in the year 2005, although their first wedding shoot was in 2012. The team has captured over a hundred weddings all around the nation and Oceania with its talented team of photographers</p>', 34, 20, 14, '2019-11-22 04:58:24', '2019-11-22 04:58:50'),
(132, NULL, 'prohibtion', 'prohibtion', '<p>Knot Just Pictures is a photography company located in Noida and was founded by two professional photographers who started following their passion for photography in the year 2005, although their first wedding shoot was in 2012. The team has captured over a hundred weddings all around the nation and Oceania with its talented team of photographers</p>', 34, 20, 14, '2019-11-22 05:01:31', '2019-11-22 05:01:40'),
(133, NULL, 'business_name', 'basic_information', 'Decoration', 34, 25, 15, '2019-11-22 05:06:01', '2019-11-22 06:45:27'),
(134, NULL, 'address', 'basic_information', 'USC McCarthy Way, Los Angeles, CA, USA', 34, 25, 15, '2019-11-22 05:06:01', '2019-12-06 01:46:46'),
(135, NULL, 'website', 'basic_information', 'http://google.com', 34, 25, 15, '2019-11-22 05:06:01', '2019-11-22 06:45:27'),
(136, NULL, 'phone_number', 'basic_information', '14785236954', 34, 25, 15, '2019-11-22 05:06:01', '2019-11-22 06:45:27'),
(137, NULL, 'company', 'basic_information', 'Decoration pvt ltd', 34, 25, 15, '2019-11-22 05:06:01', '2019-11-22 06:45:27'),
(138, NULL, 'travel_distaince', 'basic_information', '60', 34, 25, 15, '2019-11-22 05:06:01', '2019-11-22 06:45:27'),
(139, NULL, 'min_price', 'basic_information', '500', 34, 25, 15, '2019-11-22 05:06:01', '2019-11-22 06:45:27'),
(140, NULL, 'cover_photo', 'basic_information', 'images/vendors/settings/1574424927yDxExkqPDf5U5P3nBhlx-budget-plan-bg.png', 34, 25, 15, '2019-11-22 05:06:01', '2019-11-22 06:45:27'),
(141, NULL, 'short_description', 'basic_information', 'Decorator is the best in the world', 34, 25, 15, '2019-11-22 05:06:01', '2019-11-22 06:45:27'),
(142, NULL, 'cover_video', 'basic_information', '', 34, 25, 15, '2019-11-22 05:06:03', '2019-11-22 05:06:03'),
(143, NULL, 'cover_video_image', 'basic_information', '', 34, 25, 15, '2019-11-22 05:06:03', '2019-11-22 05:06:03'),
(145, NULL, 'video', 'videoGallery', '{"title":"Wedding","link":"https:\\/\\/www.youtube.com\\/embed\\/67Mlgq6-dGA","image":"images\\/vendors\\/gallery\\/1574697825xqe9svAlKrd5ssHg6Na4-fb_cover_5_post-650x300.jpg"}', 42, 1, 11, '2019-11-25 10:33:45', '2019-11-25 10:33:45'),
(150, 0, 'style', 'styles', '1', 34, 25, 15, '2019-11-26 01:09:23', '2019-11-26 01:09:23'),
(152, NULL, 'business_name', 'basic_information', '', 44, 1, 21, '2019-11-26 01:20:49', '2019-11-26 01:20:49'),
(153, NULL, 'address', 'basic_information', '', 44, 1, 21, '2019-11-26 01:20:49', '2019-11-26 01:20:49'),
(154, NULL, 'website', 'basic_information', '', 44, 1, 21, '2019-11-26 01:20:49', '2019-11-26 01:20:49'),
(155, NULL, 'phone_number', 'basic_information', '', 44, 1, 21, '2019-11-26 01:20:49', '2019-11-26 01:20:49'),
(156, NULL, 'company', 'basic_information', '', 44, 1, 21, '2019-11-26 01:20:49', '2019-11-26 01:20:49'),
(157, NULL, 'travel_distaince', 'basic_information', '', 44, 1, 21, '2019-11-26 01:20:49', '2019-11-26 01:20:49'),
(158, NULL, 'min_price', 'basic_information', '', 44, 1, 21, '2019-11-26 01:20:49', '2019-11-26 01:20:49'),
(159, NULL, 'cover_photo', 'basic_information', '', 44, 1, 21, '2019-11-26 01:20:49', '2019-11-26 01:20:49'),
(160, NULL, 'short_description', 'basic_information', '', 44, 1, 21, '2019-11-26 01:20:49', '2019-11-26 01:20:49'),
(161, NULL, 'cover_video', 'basic_information', '', 44, 1, 21, '2019-11-26 01:20:52', '2019-11-26 01:20:52'),
(162, NULL, 'cover_video_image', 'basic_information', '', 44, 1, 21, '2019-11-26 01:20:52', '2019-11-26 01:20:52'),
(163, NULL, 'description', 'description', '', 44, 1, 21, '2019-11-26 01:21:31', '2019-11-26 01:21:31'),
(164, NULL, 'style', 'styles', '', 44, 1, 21, '2019-11-26 01:21:35', '2019-11-26 01:21:35'),
(165, NULL, 'prohibtion', 'prohibtion', '', 44, 1, 21, '2019-11-26 01:22:49', '2019-11-26 01:22:49'),
(166, NULL, 'business_name', 'basic_information', 'Event planner      12', 44, 20, 22, '2019-11-26 01:29:24', '2019-11-26 02:50:27'),
(167, NULL, 'address', 'basic_information', 'suuny enclace 125', 44, 20, 22, '2019-11-26 01:29:24', '2019-11-26 02:45:41'),
(168, NULL, 'website', 'basic_information', 'http://49.249.236.30:2930/swopzshop/author/developer/?screen=new', 44, 20, 22, '2019-11-26 01:29:24', '2019-11-26 02:45:41'),
(169, NULL, 'phone_number', 'basic_information', '1234456789', 44, 20, 22, '2019-11-26 01:29:24', '2019-11-26 02:50:27'),
(170, NULL, 'company', 'basic_information', 'Deftsoft', 44, 20, 22, '2019-11-26 01:29:24', '2019-11-26 02:45:42'),
(171, NULL, 'travel_distaince', 'basic_information', '200', 44, 20, 22, '2019-11-26 01:29:24', '2019-11-26 02:45:42'),
(172, NULL, 'min_price', 'basic_information', '45', 44, 20, 22, '2019-11-26 01:29:24', '2019-11-26 03:07:29'),
(173, NULL, 'cover_photo', 'basic_information', 'images/vendors/settings/15747561420CECWnSZ7yaVhvavQEMn-14997.png', 44, 20, 22, '2019-11-26 01:29:24', '2019-11-26 02:45:42'),
(174, NULL, 'short_description', 'basic_information', '01 WELCOME\r\nOUR WELCOME.\r\nYOUR PLEASURE.\r\nOur hospitality: it is, perhaps, the thing that impresses when you arrive; and what lingers longest once you’ve left. Being a trading nation that has welcomed the world for over 4,000 years, putting our guests first has become second nature.\r\n\r\nTo visit Bahrain is to know Bahrainis. Our readiness to smile and eagerness to help are legendary. We look forward to welcoming you to our home to experience the rich history, vibrant culture, tourist attractions, food and above all, the warmth of our people.', 44, 20, 22, '2019-11-26 01:29:24', '2019-11-26 02:45:41'),
(175, NULL, 'cover_video', 'basic_information', '', 44, 20, 22, '2019-11-26 01:30:44', '2019-11-26 01:30:44'),
(176, NULL, 'cover_video_image', 'basic_information', '', 44, 20, 22, '2019-11-26 01:30:44', '2019-11-26 01:30:44'),
(177, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/15747584673dZm35bJTHjnNUG8ID8B-Chat-text.txt', 44, 20, 22, '2019-11-26 03:24:27', '2019-11-26 03:24:27'),
(180, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1574758467n57i92dNNOdiH6w8Sy58-New-Microsoft-Office-Word-Document.docx', 44, 20, 22, '2019-11-26 03:24:27', '2019-11-26 03:24:27'),
(181, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1574758467xgSctAg28GgHUjo6vBcn-wp3276805-pubg-4k-wallpapers.jpg', 44, 20, 22, '2019-11-26 03:24:27', '2019-11-26 03:24:27'),
(183, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1574759666hEbCfzUEchRFhLBuKss2-2faf1563b9868cea2b35d9345c68c77d.jpg', 44, 20, 22, '2019-11-26 03:44:26', '2019-11-26 03:44:26'),
(186, NULL, 'video', 'videoGallery', '{"title":"FUnny videos","link":"https:\\/\\/www.youtube.com\\/embed\\/sdUUx5FdySs","image":"images\\/vendors\\/gallery\\/1574760670a1FJabniNB15aERKXuZw-maxresdefault.jpg"}', 44, 20, 22, '2019-11-26 04:01:10', '2019-11-26 04:01:10'),
(187, NULL, 'description', 'description', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Do you have experience in&nbsp;<b>event</b>&nbsp;from start to finish according to requirements, brand, target audience and objectives? If yes ,then go through our&nbsp;<b>event planner</b>&nbsp;interview&nbsp;<b>questions</b>&nbsp;page for better understanding of interview process and win in job search.Do you have experience in&nbsp;<b>event</b>&nbsp;from start to finish according to requirements, brand, target audience and objectives? If yes ,then go through our&nbsp;<b>event planner</b>&nbsp;interview&nbsp;<b>questions</b>&nbsp;page for better understanding of interview process and win in job search. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', 44, 20, 22, '2019-11-26 04:02:17', '2019-11-26 04:38:22'),
(192, NULL, 'prohibtion', 'prohibtion', '<p>aLCHOLIC CIGRATE&nbsp;&nbsp;Do you have experience in&nbsp;<b>event</b>&nbsp;from start to finish according to requirements, brand, target audience and objectives? If yes ,then go through our&nbsp;<b>event planner</b>&nbsp;interview&nbsp;<b>questions</b>&nbsp;page for better understanding of interview process and win in job search.Do you have experience in&nbsp;<b>event</b>&nbsp;from start to finish according to requirements, brand, target audience and objectives? If yes ,then go through our&nbsp;<b>event planner</b>&nbsp;interview&nbsp;<b>questions</b>&nbsp;page for better understanding of interview process and win in job search.Do you have experience in&nbsp;<b>event</b>&nbsp;from start to finish according to requirements, brand, target audience and objectives? If yes ,then go through our&nbsp;<b>event planner</b>&nbsp;interview&nbsp;<b>questions</b>&nbsp;page for better understanding of interview process and win in job search.Do you have experience in&nbsp;<b>event</b>&nbsp;from start to finish according to requirements, brand, target audience and objectives? If yes ,then go through our&nbsp;<b>event planner</b>&nbsp;interview&nbsp;<b>questions</b>&nbsp;page for better understanding of interview process and win in job search.Do you have experience in&nbsp;<b>event</b>&nbsp;from start to finish according to requirements, brand, target audience and objectives? If yes ,then go through our&nbsp;<b>event planner</b>&nbsp;interview&nbsp;<b>questions</b>&nbsp;page for better understanding of interview process and win in job search.Do you have experience in&nbsp;<b>event</b>&nbsp;from start to finish according to requirements, brand, target audience and objectives? If yes ,then go through our&nbsp;<b>event planner</b>&nbsp;interview&nbsp;<b>questions</b>&nbsp;page for better understanding of interview process and win in job search.Do you have experience in&nbsp;<b>event</b>&nbsp;from start to finish according to requirements, brand, target audience and objectives? If yes ,then go through our&nbsp;<b>event planner</b>&nbsp;interview&nbsp;<b>questions</b>&nbsp;page for better understanding of interview process and win in job search.Do you have experience in&nbsp;<b>event</b>&nbsp;from start to finish according to requirements, brand, target audience and objectives? If yes ,then go through our&nbsp;<b>event planner</b>&nbsp;interview&nbsp;<b>questions</b>&nbsp;page for better understanding of interview process and win in job search.</p>', 44, 20, 22, '2019-11-26 05:49:02', '2019-11-26 07:27:53'),
(195, 0, 'style', 'styles', '3', 44, 20, 22, '2019-11-26 05:50:12', '2019-11-26 05:50:12'),
(196, 0, 'season', 'seasons', '4', 44, 20, 22, '2019-11-26 05:59:17', '2019-11-26 05:59:17'),
(197, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1574838336Sop4bT1ajRuDjXxvZqAv-band.png', 34, 25, 15, '2019-11-27 01:35:36', '2019-11-27 01:35:36'),
(198, NULL, 'video', 'videoGallery', '{"title":"video tap","link":"https:\\/\\/www.youtube.com\\/embed\\/EU7PRmCpx-0","image":"images\\/vendors\\/gallery\\/1574838380FbtIc6K8fvK7cDD36uYf-band.png"}', 34, 25, 15, '2019-11-27 01:36:20', '2019-11-27 01:36:59'),
(199, 0, 'season', 'seasons', '4', 34, 25, 15, '2019-11-27 01:37:43', '2019-11-27 01:37:43'),
(200, NULL, 'business_name', 'basic_information', 'Harkul Royal Events', 31, 11, 24, '2019-11-27 01:43:23', '2019-11-27 02:07:41'),
(201, NULL, 'address', 'basic_information', 'Miami Beach Boardwalk, Miami Beach, FL, USA', 31, 11, 24, '2019-11-27 01:43:23', '2019-11-28 05:42:33'),
(202, NULL, 'website', 'basic_information', 'http://49.249.236.30:8654', 31, 11, 24, '2019-11-27 01:43:23', '2019-11-27 02:07:41'),
(203, NULL, 'phone_number', 'basic_information', '1212878777', 31, 11, 24, '2019-11-27 01:43:23', '2019-11-27 02:07:41'),
(204, NULL, 'company', 'basic_information', 'Harkul Royal Events', 31, 11, 24, '2019-11-27 01:43:23', '2019-11-27 02:07:41'),
(205, NULL, 'travel_distaince', 'basic_information', '50', 31, 11, 24, '2019-11-27 01:43:23', '2019-11-27 02:07:42'),
(206, NULL, 'min_price', 'basic_information', '5000', 31, 11, 24, '2019-11-27 01:43:23', '2019-11-27 05:04:33'),
(207, NULL, 'cover_photo', 'basic_information', 'images/vendors/settings/1574840284qVVukcHSO7itargTBnd2-The-Manek-Chowk_new_s-591db2093df78cf5fa46dcae.jpg', 31, 11, 24, '2019-11-27 01:43:23', '2019-11-27 02:08:04'),
(208, NULL, 'short_description', 'basic_information', 'Royal Wedding Events is a banquet hall located in the city of Delhi. Choosing a wedding venue is one of the most difficult tasks which you will accomplish while planning it.', 31, 11, 24, '2019-11-27 01:43:23', '2019-11-27 02:07:41'),
(209, NULL, 'cover_video', 'basic_information', '', 31, 11, 24, '2019-11-27 01:43:26', '2019-11-27 01:43:26'),
(210, NULL, 'cover_video_image', 'basic_information', '', 31, 11, 24, '2019-11-27 01:43:26', '2019-11-27 01:43:26'),
(212, NULL, 'description', 'description', '<p>Royal Wedding Events is a banquet hall located in the city of Delhi. Choosing a wedding venue is one of the most difficult tasks which you will accomplish while planning it. Indian weddings are comprised of many functions and ceremonies which are usually spread across days, and weeks before they are spent in planning everything flawlessly. To ensure that your every need is catered to while providing you with quality services, you need to choose a venue which can be a perfect fit for all your wedding-related functions. Royal Wedding Events will ensure that your wedding is celebrated with much grandiosity with memories that you can cherish for life.</p>', 31, 11, 24, '2019-11-27 02:10:48', '2019-11-27 02:11:07'),
(214, 0, 'style', 'styles', '1', 31, 11, 24, '2019-11-27 02:11:16', '2019-11-27 02:11:16'),
(215, 0, 'style', 'styles', '2', 31, 11, 24, '2019-11-27 02:11:17', '2019-11-27 02:11:17'),
(216, 0, 'style', 'styles', '3', 31, 11, 24, '2019-11-27 02:11:17', '2019-11-27 02:11:17'),
(217, NULL, 'business_name', 'basic_information', 'Mohali Star', 34, 11, 25, '2019-11-27 02:13:56', '2019-11-27 02:16:52'),
(218, NULL, 'address', 'basic_information', 'mohali sector 71', 34, 11, 25, '2019-11-27 02:13:56', '2019-11-27 02:16:52'),
(219, NULL, 'website', 'basic_information', 'http://google.com', 34, 11, 25, '2019-11-27 02:13:56', '2019-11-27 02:16:52'),
(220, NULL, 'phone_number', 'basic_information', '147852369', 34, 11, 25, '2019-11-27 02:13:56', '2019-11-27 02:16:52'),
(221, NULL, 'company', 'basic_information', 'mohali pvt ltd', 34, 11, 25, '2019-11-27 02:13:56', '2019-11-27 02:16:52'),
(222, NULL, 'travel_distaince', 'basic_information', '100', 34, 11, 25, '2019-11-27 02:13:56', '2019-11-27 02:16:52'),
(223, NULL, 'min_price', 'basic_information', '500', 34, 11, 25, '2019-11-27 02:13:56', '2019-11-27 02:16:52'),
(224, NULL, 'cover_photo', 'basic_information', 'images/vendors/settings/1574840812N3fRraN5ZqLwZClJIEPF-event-pic.jpg', 34, 11, 25, '2019-11-27 02:13:56', '2019-11-27 02:16:52'),
(225, NULL, 'short_description', 'basic_information', 'my business is good compared to another business.', 34, 11, 25, '2019-11-27 02:13:56', '2019-11-27 02:16:52'),
(226, NULL, 'cover_video', 'basic_information', '', 34, 11, 25, '2019-11-27 02:13:58', '2019-11-27 02:13:58'),
(227, NULL, 'cover_video_image', 'basic_information', '', 34, 11, 25, '2019-11-27 02:13:58', '2019-11-27 02:13:58'),
(228, 0, 'season', 'seasons', '3', 31, 11, 24, '2019-11-27 02:14:04', '2019-11-27 02:14:04'),
(229, 0, 'season', 'seasons', '4', 31, 11, 24, '2019-11-27 02:14:04', '2019-11-27 02:14:04'),
(230, NULL, 'prohibtion', 'prohibtion', '<p>Royal Wedding Events is a banquet hall located in the city of Delhi. Choosing a wedding venue is one of the most difficult tasks which you will accomplish while planning it. Indian weddings are comprised of many functions and ceremonies which are usually spread across days, and weeks before they are spent in planning everything flawlessly. To ensure that your every need is catered to while providing you with quality services, you need to choose a venue which can be a perfect fit for all your wedding-related functions. Royal Wedding Events will ensure that your wedding is celebrated with much grandiosity with memories that you can cherish for life.</p>', 31, 11, 24, '2019-11-27 02:15:13', '2019-11-27 02:15:23'),
(231, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1574840835138DFiye9tpDAeIiSugo-menu-about.png', 34, 11, 25, '2019-11-27 02:17:15', '2019-11-27 02:17:15'),
(232, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1574840835fCPj83KFCAItIb2BUc8S-menu-about-us.png', 34, 11, 25, '2019-11-27 02:17:15', '2019-11-27 02:17:15'),
(233, NULL, 'video', 'videoGallery', '{"title":"deftsoft mohali","link":"https:\\/\\/www.youtube.com\\/embed\\/yC270QKnJ80","image":"images\\/vendors\\/gallery\\/1574840897xHS8CQ5XRiWBZ8ZEGaIo-forgot-pass-banner.png"}', 34, 11, 25, '2019-11-27 02:18:17', '2019-11-27 02:18:17'),
(234, NULL, 'description', 'description', '<p>its too good venues&nbsp;</p>', 34, 11, 25, '2019-11-27 02:19:29', '2019-11-27 02:19:43'),
(236, 0, 'style', 'styles', '1', 34, 11, 25, '2019-11-27 02:19:47', '2019-11-27 02:19:47'),
(237, 0, 'style', 'styles', '3', 34, 11, 25, '2019-11-27 02:19:47', '2019-11-27 02:19:47'),
(239, NULL, 'prohibtion', 'prohibtion', '<p>deftsoft des</p>', 34, 11, 25, '2019-11-27 02:21:30', '2019-11-27 02:21:41'),
(240, NULL, 'cover_video', 'basic_information', '', 42, 1, 11, '2019-11-27 06:24:11', '2019-11-27 06:24:11'),
(241, NULL, 'cover_video_image', 'basic_information', '', 42, 1, 11, '2019-11-27 06:24:11', '2019-11-27 06:24:11'),
(242, NULL, 'facebook_url', 'basic_information', 'https://www.facebook.com', 42, 1, 11, '2019-11-27 06:30:04', '2019-11-27 06:35:24'),
(243, NULL, 'linkedin_url', 'basic_information', 'https://www.lindedin.com', 42, 1, 11, '2019-11-27 06:30:04', '2019-11-27 06:35:24'),
(244, NULL, 'twitter_url', 'basic_information', 'https://www.twitter.com', 42, 1, 11, '2019-11-27 06:30:04', '2019-11-27 06:35:24'),
(245, NULL, 'instagram_url', 'basic_information', 'https://www.instagram.com', 42, 1, 11, '2019-11-27 06:30:04', '2019-11-27 06:35:24'),
(246, NULL, 'pinterest_url', 'basic_information', 'https://www.pinterest.com', 42, 1, 11, '2019-11-27 06:30:04', '2019-11-27 06:35:24'),
(247, NULL, 'facebook_url', 'basic_information', NULL, 31, 1, 1, '2019-11-28 02:53:18', '2019-11-28 02:54:25'),
(248, NULL, 'linkedin_url', 'basic_information', NULL, 31, 1, 1, '2019-11-28 02:53:20', '2019-11-28 02:54:56'),
(249, NULL, 'twitter_url', 'basic_information', 'https://www.facebook.com/', 31, 1, 1, '2019-11-28 02:53:20', '2019-11-28 02:53:46'),
(250, NULL, 'instagram_url', 'basic_information', 'https://www.facebook.com/', 31, 1, 1, '2019-11-28 02:53:21', '2019-11-28 02:53:46'),
(251, NULL, 'pinterest_url', 'basic_information', 'https://www.facebook.com/', 31, 1, 1, '2019-11-28 02:53:21', '2019-11-28 02:53:46'),
(252, NULL, 'facebook_url', 'basic_information', 'https://google.com', 31, 11, 24, '2019-11-28 03:36:34', '2019-11-29 04:33:09'),
(253, NULL, 'linkedin_url', 'basic_information', 'https://google.com', 31, 11, 24, '2019-11-28 03:36:42', '2019-11-29 04:33:10'),
(254, NULL, 'twitter_url', 'basic_information', 'https://google.com', 31, 11, 24, '2019-11-28 03:36:43', '2019-11-29 04:33:10'),
(255, NULL, 'instagram_url', 'basic_information', 'https://google.com', 31, 11, 24, '2019-11-28 03:36:43', '2019-11-29 04:33:10'),
(256, NULL, 'pinterest_url', 'basic_information', 'https://google.com', 31, 11, 24, '2019-11-28 03:36:43', '2019-11-29 04:33:10'),
(257, NULL, 'business_name', 'basic_information', 'Blush Banquet Hall', 44, 11, 26, '2019-11-28 03:46:45', '2019-11-28 04:13:55'),
(258, NULL, 'address', 'basic_information', 'Miami Beach, FL, USA', 44, 11, 26, '2019-11-28 03:46:45', '2019-11-28 04:13:55'),
(259, NULL, 'website', 'basic_information', 'https://blushbanquethallcom/', 44, 11, 26, '2019-11-28 03:46:45', '2019-11-28 04:20:22'),
(260, NULL, 'phone_number', 'basic_information', '18187538585', 44, 11, 26, '2019-11-28 03:46:45', '2019-11-28 04:13:55'),
(261, NULL, 'company', 'basic_information', 'Alecan Marketing Solutions', 44, 11, 26, '2019-11-28 03:46:45', '2019-11-28 04:13:55'),
(262, NULL, 'travel_distaince', 'basic_information', '10000000000000000000000000000000000000000000000000', 44, 11, 26, '2019-11-28 03:46:45', '2019-12-10 00:26:28'),
(263, NULL, 'min_price', 'basic_information', '5000000000', 44, 11, 26, '2019-11-28 03:46:45', '2019-12-10 00:26:28'),
(264, NULL, 'cover_photo', 'basic_information', 'images/vendors/settings/1575630243OiYw7zv7HhKbXy9hLiDY100s14000000wdapw4A33_C_750_350.jpg', 44, 11, 26, '2019-11-28 03:46:46', '2019-12-06 05:34:04'),
(265, NULL, 'short_description', 'basic_information', 'Combining a trendy, upscale atmosphere with timeless elegance, Blush Banquet Hall is certain to be the perfect event venue for your special occasion. A versatile and stunning banquet hall, Blush is perfect not only for weddings, but also for any special event, including quinceañeras, Sweet 16s, bar and bat mitzvahs, anniversaries, baby showers, christenings, holiday parties, and corporate events such as awards galas and fundraisers. When you celebrate with Blush Banquet Hall, you’re giving your guests an incredible experience that they will never forget.', 44, 11, 26, '2019-11-28 03:46:46', '2019-11-28 04:13:55'),
(266, NULL, 'facebook_url', 'basic_information', 'https://www.facebook.com/', 44, 11, 26, '2019-11-28 03:46:46', '2019-11-28 04:13:55'),
(267, NULL, 'cover_video', 'basic_information', '', 44, 11, 26, '2019-11-28 03:46:50', '2019-11-28 03:46:50'),
(268, NULL, 'cover_video_image', 'basic_information', '', 44, 11, 26, '2019-11-28 03:46:50', '2019-11-28 03:46:50'),
(269, NULL, 'linkedin_url', 'basic_information', 'https://www.linkedin.com/', 44, 11, 26, '2019-11-28 03:46:50', '2019-11-28 04:13:55'),
(270, NULL, 'twitter_url', 'basic_information', 'https://www.twitter.com/', 44, 11, 26, '2019-11-28 03:46:50', '2019-11-28 04:13:55'),
(271, NULL, 'instagram_url', 'basic_information', 'https://www.instagram.com/', 44, 11, 26, '2019-11-28 03:46:51', '2019-11-28 04:13:55'),
(272, NULL, 'pinterest_url', 'basic_information', NULL, 44, 11, 26, '2019-11-28 03:46:51', '2019-11-28 04:13:56'),
(273, NULL, 'prohibtion', 'prohibtion', '<p>1.No Smoking&nbsp;</p>\r\n\r\n<p>2. No Fireworks&nbsp;</p>\r\n\r\n<p>3 Gun</p>', 44, 11, 26, '2019-11-28 04:20:33', '2019-12-10 01:27:46'),
(274, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/15749351820UiMXLFqdLTXMOpGPRir-BH.jpg', 44, 11, 26, '2019-11-28 04:29:42', '2019-11-28 04:29:42'),
(275, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1574935182rWL9dyILou2mqVkOBaRK-blush-banquet-hall-001.jpg', 44, 11, 26, '2019-11-28 04:29:42', '2019-11-28 04:29:42'),
(276, NULL, 'video', 'videoGallery', '{"title":"Blush Banquet hall","link":"https:\\/\\/www.youtube.com\\/embed\\/q5ny8dsqWIs","image":"images\\/vendors\\/gallery\\/1574935683gyBu4a40683dp60ud1K4-BH.jpg"}', 44, 11, 26, '2019-11-28 04:38:03', '2019-11-28 04:38:03'),
(277, NULL, 'description', 'description', '<p>Combining a trendy, upscale atmosphere with timeless elegance, Blush Banquet Hall is certain to be the perfect event venue for your special occasion. A versatile and stunning banquet hall, Blush is perfect not only for weddings, but also for any special event, including quincea&ntilde;eras, Sweet 16s, bar and bat mitzvahs, anniversaries, baby showers, christenings, holiday parties, and corporate events such as awards galas and fundraisers. When you celebrate with Blush Banquet Hall, you&rsquo;re giving your guests an incredible experience that they will never forget.</p>', 44, 11, 26, '2019-11-28 04:41:29', '2019-11-28 04:42:06'),
(281, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1574948099EdXf6GI2mkVU8D3Y7C14--dsc2726_15_68762.jpg', 31, 24, 0, '2019-11-28 08:04:59', '2019-11-28 08:04:59'),
(285, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1574949047MNMthrwbaca97IsqY2T9TheManekChowk_new_s591db2093df78cf5fa46dcae.jpg', 31, 11, 24, '2019-11-28 08:20:47', '2019-11-28 08:20:47'),
(286, NULL, 'facebook_url', 'basic_information', NULL, 34, 20, 14, '2019-11-29 00:31:52', '2019-12-03 04:24:48'),
(287, NULL, 'linkedin_url', 'basic_information', NULL, 34, 20, 14, '2019-11-29 00:31:55', '2019-12-03 04:24:48'),
(288, NULL, 'twitter_url', 'basic_information', NULL, 34, 20, 14, '2019-11-29 00:31:55', '2019-12-03 04:24:48'),
(289, NULL, 'instagram_url', 'basic_information', NULL, 34, 20, 14, '2019-11-29 00:31:55', '2019-12-03 04:24:48'),
(290, NULL, 'pinterest_url', 'basic_information', NULL, 34, 20, 14, '2019-11-29 00:31:55', '2019-12-03 04:24:48'),
(294, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1575017384w2dUaCj5N1SwRZyKHaTv20191125.png', 34, 20, 14, '2019-11-29 03:19:44', '2019-11-29 03:19:44'),
(297, NULL, 'facebook_url', 'basic_information', '', 34, 11, 25, '2019-11-29 05:32:44', '2019-11-29 05:32:44'),
(298, NULL, 'linkedin_url', 'basic_information', '', 34, 11, 25, '2019-11-29 05:32:46', '2019-11-29 05:32:46'),
(299, NULL, 'twitter_url', 'basic_information', '', 34, 11, 25, '2019-11-29 05:32:46', '2019-11-29 05:32:46'),
(300, NULL, 'instagram_url', 'basic_information', '', 34, 11, 25, '2019-11-29 05:32:46', '2019-11-29 05:32:46'),
(301, NULL, 'pinterest_url', 'basic_information', '', 34, 11, 25, '2019-11-29 05:32:46', '2019-11-29 05:32:46'),
(302, NULL, 'video', 'videoGallery', '{"title":"XXL","link":"https:\\/\\/www.youtube.com\\/embed\\/ICej-ufgFF4","image":"images\\/vendors\\/gallery\\/1575033501KqXB300TKpj15PVY8ts1istockphoto953790424612x612.jpg"}', 31, 1, 1, '2019-11-29 07:48:21', '2019-11-29 07:48:21'),
(303, NULL, 'min_guest', 'basic_information', '10', 31, 1, 1, '2019-12-02 01:09:44', '2019-12-02 01:10:49'),
(304, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1575269723vPOz9ZFnnWueISSpYdZGdiningbuffetstyle.jpg', 44, 11, 26, '2019-12-02 01:25:23', '2019-12-02 01:25:23'),
(307, NULL, 'min_guest', 'basic_information', '5000000000', 44, 11, 26, '2019-12-02 01:31:05', '2019-12-10 00:26:28'),
(311, NULL, 'min_guest', 'basic_information', '', 34, 11, 25, '2019-12-02 06:11:30', '2019-12-02 06:11:30'),
(312, NULL, 'min_guest', 'basic_information', '5', 34, 20, 14, '2019-12-02 06:51:11', '2019-12-03 04:24:48'),
(313, NULL, 'video', 'videoGallery', '{"title":"food food","link":"https:\\/\\/www.youtube.com\\/embed\\/hMy5za-m5Ew","image":"images\\/vendors\\/gallery\\/1575291349odTKPCOa71GXAG2RMyANmenuaboutus.png"}', 34, 20, 14, '2019-12-02 07:25:49', '2019-12-02 07:25:49'),
(316, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1575297397O4uvv2wQe0wnbGbpmBg7band2.png', 34, 20, 14, '2019-12-02 09:06:37', '2019-12-02 09:06:37'),
(317, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1575297472nig2aKQjjwnTSHtFqY9tfavourite.png', 34, 20, 14, '2019-12-02 09:07:52', '2019-12-02 09:07:52'),
(318, NULL, 'facebook_url', 'basic_information', NULL, 34, 25, 15, '2019-12-03 02:17:05', '2019-12-06 01:46:46'),
(319, NULL, 'facebook_url', 'basic_information', NULL, 34, 1, 16, '2019-12-03 04:05:41', '2019-12-09 04:15:25'),
(320, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1575366911mu0zaFjxJYG3pbQi9vfQballoons.png', 34, 20, 14, '2019-12-03 04:25:11', '2019-12-03 04:25:11'),
(327, 0, 'style', 'styles', '1', 34, 20, 14, '2019-12-03 04:48:49', '2019-12-03 04:48:49'),
(328, 0, 'style', 'styles', '3', 34, 20, 14, '2019-12-03 04:48:49', '2019-12-03 04:48:49'),
(330, 0, 'season', 'seasons', '4', 34, 20, 14, '2019-12-03 05:02:13', '2019-12-03 05:02:13'),
(331, NULL, 'min_guest', 'basic_information', '100', 42, 1, 11, '2019-12-03 05:24:10', '2019-12-03 07:35:19'),
(332, 0, 'style', 'styles', '1', 42, 1, 11, '2019-12-03 06:16:43', '2019-12-03 06:16:43'),
(333, 0, 'style', 'styles', '3', 42, 1, 11, '2019-12-03 06:16:43', '2019-12-03 06:16:43'),
(334, 0, 'season', 'seasons', '3', 42, 1, 11, '2019-12-03 06:18:57', '2019-12-03 06:18:57'),
(335, NULL, 'business_name', 'basic_information', '', 54, 11, 27, '2019-12-05 01:06:56', '2019-12-05 01:06:56'),
(336, NULL, 'address', 'basic_information', '', 54, 11, 27, '2019-12-05 01:06:56', '2019-12-05 01:06:56'),
(337, NULL, 'website', 'basic_information', '', 54, 11, 27, '2019-12-05 01:06:56', '2019-12-05 01:06:56'),
(338, NULL, 'phone_number', 'basic_information', '', 54, 11, 27, '2019-12-05 01:06:56', '2019-12-05 01:06:56'),
(339, NULL, 'company', 'basic_information', '', 54, 11, 27, '2019-12-05 01:06:56', '2019-12-05 01:06:56'),
(340, NULL, 'travel_distaince', 'basic_information', '', 54, 11, 27, '2019-12-05 01:06:56', '2019-12-05 01:06:56'),
(341, NULL, 'min_price', 'basic_information', '', 54, 11, 27, '2019-12-05 01:06:56', '2019-12-05 01:06:56'),
(342, NULL, 'cover_photo', 'basic_information', '', 54, 11, 27, '2019-12-05 01:06:56', '2019-12-05 01:06:56'),
(343, NULL, 'short_description', 'basic_information', '', 54, 11, 27, '2019-12-05 01:06:57', '2019-12-05 01:06:57'),
(344, NULL, 'facebook_url', 'basic_information', '', 54, 11, 27, '2019-12-05 01:06:57', '2019-12-05 01:06:57'),
(345, NULL, 'min_guest', 'basic_information', '', 54, 11, 27, '2019-12-05 01:07:42', '2019-12-05 01:07:42'),
(346, NULL, 'cover_video', 'basic_information', '', 54, 11, 27, '2019-12-05 01:07:42', '2019-12-05 01:07:42'),
(347, NULL, 'cover_video_image', 'basic_information', '', 54, 11, 27, '2019-12-05 01:07:42', '2019-12-05 01:07:42'),
(348, NULL, 'linkedin_url', 'basic_information', '', 54, 11, 27, '2019-12-05 01:07:42', '2019-12-05 01:07:42'),
(349, NULL, 'twitter_url', 'basic_information', '', 54, 11, 27, '2019-12-05 01:07:42', '2019-12-05 01:07:42'),
(350, NULL, 'instagram_url', 'basic_information', '', 54, 11, 27, '2019-12-05 01:07:42', '2019-12-05 01:07:42'),
(351, NULL, 'pinterest_url', 'basic_information', '', 54, 11, 27, '2019-12-05 01:07:42', '2019-12-05 01:07:42'),
(352, NULL, 'business_name', 'basic_information', '', 44, 45, 28, '2019-12-05 05:18:40', '2019-12-05 05:18:40'),
(353, NULL, 'address', 'basic_information', '', 44, 45, 28, '2019-12-05 05:18:40', '2019-12-05 05:18:40'),
(354, NULL, 'website', 'basic_information', '', 44, 45, 28, '2019-12-05 05:18:40', '2019-12-05 05:18:40'),
(355, NULL, 'phone_number', 'basic_information', '', 44, 45, 28, '2019-12-05 05:18:40', '2019-12-05 05:18:40'),
(356, NULL, 'company', 'basic_information', '', 44, 45, 28, '2019-12-05 05:18:40', '2019-12-05 05:18:40'),
(357, NULL, 'travel_distaince', 'basic_information', '', 44, 45, 28, '2019-12-05 05:18:40', '2019-12-05 05:18:40'),
(358, NULL, 'min_price', 'basic_information', '', 44, 45, 28, '2019-12-05 05:18:40', '2019-12-05 05:18:40'),
(359, NULL, 'cover_photo', 'basic_information', '', 44, 45, 28, '2019-12-05 05:18:41', '2019-12-05 05:18:41'),
(360, NULL, 'short_description', 'basic_information', '', 44, 45, 28, '2019-12-05 05:18:41', '2019-12-05 05:18:41'),
(361, NULL, 'facebook_url', 'basic_information', '', 44, 45, 28, '2019-12-05 05:18:41', '2019-12-05 05:18:41'),
(362, NULL, 'min_guest', 'basic_information', '', 44, 45, 28, '2019-12-05 07:35:28', '2019-12-05 07:35:28'),
(363, NULL, 'cover_video', 'basic_information', '', 44, 45, 28, '2019-12-05 07:35:28', '2019-12-05 07:35:28'),
(364, NULL, 'cover_video_image', 'basic_information', '', 44, 45, 28, '2019-12-05 07:35:28', '2019-12-05 07:35:28'),
(365, NULL, 'linkedin_url', 'basic_information', '', 44, 45, 28, '2019-12-05 07:35:28', '2019-12-05 07:35:28'),
(366, NULL, 'twitter_url', 'basic_information', '', 44, 45, 28, '2019-12-05 07:35:28', '2019-12-05 07:35:28'),
(367, NULL, 'instagram_url', 'basic_information', '', 44, 45, 28, '2019-12-05 07:35:28', '2019-12-05 07:35:28'),
(368, NULL, 'pinterest_url', 'basic_information', '', 44, 45, 28, '2019-12-05 07:35:28', '2019-12-05 07:35:28'),
(369, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1575551177RJjAA4GylSUoXdpsX6dj100s14000000wdapw4A33_C_750_350.jpg', 44, 11, 26, '2019-12-05 07:36:17', '2019-12-05 07:36:17'),
(370, NULL, 'min_guest', 'basic_information', '3', 34, 25, 15, '2019-12-06 01:46:25', '2019-12-06 01:46:47'),
(371, NULL, 'linkedin_url', 'basic_information', NULL, 34, 25, 15, '2019-12-06 01:46:25', '2019-12-06 01:46:46'),
(372, NULL, 'twitter_url', 'basic_information', NULL, 34, 25, 15, '2019-12-06 01:46:25', '2019-12-06 01:46:47'),
(373, NULL, 'instagram_url', 'basic_information', NULL, 34, 25, 15, '2019-12-06 01:46:26', '2019-12-06 01:46:47'),
(374, NULL, 'pinterest_url', 'basic_information', NULL, 34, 25, 15, '2019-12-06 01:46:26', '2019-12-06 01:46:47');
INSERT INTO `vendor_category_meta_datas` (`id`, `parent`, `key`, `type`, `keyValue`, `user_id`, `category_id`, `vendor_category_id`, `created_at`, `updated_at`) VALUES
(378, NULL, 'facebook_url', 'basic_information', '', 44, 20, 22, '2019-12-06 04:32:02', '2019-12-06 04:32:02'),
(383, 0, 'season', 'seasons', '4', 34, 11, 25, '2019-12-06 06:47:51', '2019-12-06 06:47:51'),
(388, NULL, 'style', 'styles', '', 42, 11, 34, '2019-12-09 02:42:24', '2019-12-09 02:42:24'),
(389, NULL, 'business_name', 'basic_information', 'Kanny Photo Lab', 59, 1, 35, '2019-12-09 03:10:48', '2019-12-09 04:20:34'),
(390, NULL, 'address', 'basic_information', 'Miami Gardens Drive, Hialeah, FL, USA', 59, 1, 35, '2019-12-09 03:10:48', '2019-12-09 04:20:34'),
(391, NULL, 'website', 'basic_information', 'https://www.amazon.com', 59, 1, 35, '2019-12-09 03:10:48', '2019-12-09 04:20:34'),
(392, NULL, 'phone_number', 'basic_information', '9465470549', 59, 1, 35, '2019-12-09 03:10:48', '2019-12-09 04:20:34'),
(393, NULL, 'company', 'basic_information', 'Kanny Photo Lab', 59, 1, 35, '2019-12-09 03:10:48', '2019-12-09 04:20:34'),
(394, NULL, 'travel_distaince', 'basic_information', '50', 59, 1, 35, '2019-12-09 03:10:48', '2019-12-09 04:20:34'),
(395, NULL, 'min_price', 'basic_information', '1000', 59, 1, 35, '2019-12-09 03:10:48', '2019-12-09 04:20:35'),
(396, NULL, 'cover_photo', 'basic_information', 'images/vendors/settings/1575885035TXodYRMS3x9cS1SqyMLkk.jpg', 59, 1, 35, '2019-12-09 03:10:48', '2019-12-09 04:20:35'),
(397, NULL, 'short_description', 'basic_information', 'Kanny Photo Lab is a full-service wedding photography and videography company based in Mokena, Illinois. This talented team serves each client with effortless professionalism, capturing their wedding nuptials with precision and care.', 59, 1, 35, '2019-12-09 03:10:48', '2019-12-09 04:20:34'),
(398, NULL, 'facebook_url', 'basic_information', 'https://www.facebook.com', 59, 1, 35, '2019-12-09 03:10:48', '2019-12-09 04:20:35'),
(399, NULL, 'min_guest', 'basic_information', '50', 59, 1, 35, '2019-12-09 03:10:50', '2019-12-09 04:20:35'),
(400, NULL, 'cover_video', 'basic_information', '', 59, 1, 35, '2019-12-09 03:10:50', '2019-12-09 03:10:50'),
(401, NULL, 'cover_video_image', 'basic_information', '', 59, 1, 35, '2019-12-09 03:10:50', '2019-12-09 03:10:50'),
(402, NULL, 'linkedin_url', 'basic_information', 'https://www.linkedin.com', 59, 1, 35, '2019-12-09 03:10:50', '2019-12-09 04:20:35'),
(403, NULL, 'twitter_url', 'basic_information', 'https://www.twitter.com', 59, 1, 35, '2019-12-09 03:10:50', '2019-12-09 04:20:35'),
(404, NULL, 'instagram_url', 'basic_information', 'https://www.instagram.com', 59, 1, 35, '2019-12-09 03:10:50', '2019-12-09 04:20:35'),
(405, NULL, 'pinterest_url', 'basic_information', 'https://www.pinterest.com', 59, 1, 35, '2019-12-09 03:10:50', '2019-12-09 04:20:35'),
(406, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1575881129CzLCNf4IfC0ApwPjtco715747561420CECWnSZ7yaVhvavQEMn14997.png', 59, 1, 35, '2019-12-09 03:15:29', '2019-12-09 03:15:29'),
(407, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1575881129Y13btcL50pGskR4RpT1Vanchez4_51_698336157383070553519.jpg', 59, 1, 35, '2019-12-09 03:15:29', '2019-12-09 03:15:29'),
(408, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1575881129KVNITIDvHRpu4eGW8SoMsanchex2_51_698336157383070987838.jpg', 59, 1, 35, '2019-12-09 03:15:29', '2019-12-09 03:15:29'),
(409, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1575881129boJL7coVKTrsHoIcxsWcsanchez1_51_698336157383071560610.jpg', 59, 1, 35, '2019-12-09 03:15:29', '2019-12-09 03:15:29'),
(410, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1575881129sxTMVkrxhoKBb981CqeDt10_1435802609300solo019.jpg', 59, 1, 35, '2019-12-09 03:15:29', '2019-12-09 03:15:29'),
(411, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1575881129t1kt22bDaxKIi8IFTYCdt20_1312238515529Pwc10011.jpg', 59, 1, 35, '2019-12-09 03:15:29', '2019-12-09 03:15:29'),
(412, NULL, 'video', 'videoGallery', '{"title":"Wedding Creative","link":"https:\\/\\/www.youtube.com\\/embed\\/EBv48eIcwiQ","image":"images\\/vendors\\/gallery\\/1575881237iWj2brlfHOZj8PjYqVfSt10_1435802609300solo019.jpg"}', 59, 1, 35, '2019-12-09 03:17:17', '2020-01-22 09:57:28'),
(413, NULL, 'description', 'description', '<h2>About Kanny&nbsp;Photo Lab</h2>\r\n\r\n<p>Kanny Photo Lab is a Detroit, Michigan-based wedding company specializing in Photography, Video, DJ and Photo Booths. The team at Kanny Photo Lab is committed to excellency both in service and in craft. They&rsquo;ll use their professional planning and service skills to help find the right package for your vision and budget. With over 15 years of experience in their field, you can trust this team of award-winning videographers to provide a timeless, beautiful photography and video experience that you&rsquo;ll enjoy for years to come. Inquire about Fairytale Productions Wedding Services today to reserve your wedding date!</p>', 59, 1, 35, '2019-12-09 03:19:03', '2019-12-09 03:20:15'),
(417, NULL, 'prohibtion', 'prohibtion', '<p>Lorium Epsum is dummy Text value to show for Testing.&nbsp;Lorium Epsum is dummy Text value to show for Testing.&nbsp;Lorium Epsum is dummy Text value to show for Testing.&nbsp;Lorium Epsum is dummy Text value to show for Testing.&nbsp;Lorium Epsum is dummy Text value to show for Testing.</p>', 59, 1, 35, '2019-12-09 03:28:03', '2019-12-09 03:28:26'),
(418, NULL, 'min_guest', 'basic_information', '5', 34, 1, 16, '2019-12-09 04:00:51', '2019-12-09 04:15:25'),
(419, NULL, 'linkedin_url', 'basic_information', NULL, 34, 1, 16, '2019-12-09 04:00:51', '2019-12-09 04:15:25'),
(420, NULL, 'twitter_url', 'basic_information', NULL, 34, 1, 16, '2019-12-09 04:00:51', '2019-12-09 04:15:25'),
(421, NULL, 'instagram_url', 'basic_information', NULL, 34, 1, 16, '2019-12-09 04:00:51', '2019-12-09 04:15:25'),
(422, NULL, 'pinterest_url', 'basic_information', NULL, 34, 1, 16, '2019-12-09 04:00:51', '2019-12-09 04:15:25'),
(423, NULL, 'facebook_url', 'basic_information', '', 44, 1, 21, '2019-12-10 00:17:57', '2019-12-10 00:17:57'),
(424, NULL, 'min_guest', 'basic_information', '', 44, 1, 21, '2019-12-10 00:18:02', '2019-12-10 00:18:02'),
(425, NULL, 'linkedin_url', 'basic_information', '', 44, 1, 21, '2019-12-10 00:18:02', '2019-12-10 00:18:02'),
(426, NULL, 'twitter_url', 'basic_information', '', 44, 1, 21, '2019-12-10 00:18:02', '2019-12-10 00:18:02'),
(427, NULL, 'instagram_url', 'basic_information', '', 44, 1, 21, '2019-12-10 00:18:02', '2019-12-10 00:18:02'),
(428, NULL, 'pinterest_url', 'basic_information', '', 44, 1, 21, '2019-12-10 00:18:02', '2019-12-10 00:18:02'),
(429, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1575957487V6JcT3DIPxVTg2t1yYw1Penguins.jpg', 44, 11, 26, '2019-12-10 00:28:07', '2019-12-10 00:28:07'),
(430, NULL, 'video', 'videoGallery', '{"title":"Wedding plan","link":"https:\\/\\/www.youtube.com\\/embed\\/waqXUFqTAlI","image":"images\\/vendors\\/gallery\\/1575958322oEXcBwnhNwMRkgsAri1B2evai5d.jpg"}', 44, 11, 26, '2019-12-10 00:42:02', '2019-12-10 00:42:02'),
(431, NULL, 'video', 'videoGallery', '{"title":"Banquet Banquet Banquet Banque","link":"https:\\/\\/www.youtube.com\\/embed\\/l84WVIa5Zzg","image":"images\\/vendors\\/gallery\\/1575958727uK3iDi5Uv9dLMaSpABe52evai5d.jpg"}', 44, 11, 26, '2019-12-10 00:48:47', '2019-12-10 00:49:33'),
(432, 0, 'style', 'styles', '1', 44, 11, 26, '2019-12-10 01:01:29', '2019-12-10 01:01:29'),
(433, 0, 'style', 'styles', '4', 44, 11, 26, '2019-12-10 01:01:29', '2019-12-10 01:01:29'),
(434, 0, 'season', 'seasons', '3', 44, 11, 26, '2019-12-10 01:09:14', '2019-12-10 01:09:14'),
(435, 0, 'season', 'seasons', '4', 44, 11, 26, '2019-12-10 01:09:14', '2019-12-10 01:09:14'),
(436, 0, 'season', 'seasons', '5', 44, 11, 26, '2019-12-10 01:09:14', '2019-12-10 01:09:14'),
(437, NULL, 'description', 'description', '', 42, 11, 34, '2019-12-10 04:24:55', '2019-12-10 04:24:55'),
(439, 0, 'season', 'seasons', '3', 59, 1, 35, '2019-12-20 06:04:25', '2019-12-20 06:04:25'),
(440, 0, 'season', 'seasons', '5', 59, 1, 35, '2019-12-20 06:04:25', '2019-12-20 06:04:25'),
(441, NULL, 'business_name', 'basic_information', 'Kanny Gill Venues', 59, 11, 39, '2019-12-23 07:42:15', '2019-12-23 07:44:40'),
(442, NULL, 'address', 'basic_information', 'South Miami Boulevard, Durham, NC, USA', 59, 11, 39, '2019-12-23 07:42:15', '2019-12-23 07:44:40'),
(443, NULL, 'website', 'basic_information', 'https://kanny-venue.com', 59, 11, 39, '2019-12-23 07:42:15', '2019-12-23 07:44:40'),
(444, NULL, 'phone_number', 'basic_information', '9465470549', 59, 11, 39, '2019-12-23 07:42:15', '2019-12-23 07:44:40'),
(445, NULL, 'company', 'basic_information', 'Kanny\'s Venues', 59, 11, 39, '2019-12-23 07:42:15', '2019-12-23 07:44:40'),
(446, NULL, 'travel_distaince', 'basic_information', '100', 59, 11, 39, '2019-12-23 07:42:15', '2019-12-23 07:44:40'),
(447, NULL, 'min_price', 'basic_information', '1500', 59, 11, 39, '2019-12-23 07:42:15', '2019-12-23 07:44:40'),
(448, NULL, 'cover_photo', 'basic_information', 'images/vendors/settings/1577106880MWqFKZPXz32sQ1PO9P9j15747561420CECWnSZ7yaVhvavQEMn14997.png', 59, 11, 39, '2019-12-23 07:42:15', '2019-12-23 07:44:40'),
(449, NULL, 'short_description', 'basic_information', 'Lorium Epsum for Kanny Business', 59, 11, 39, '2019-12-23 07:42:15', '2019-12-23 07:44:40'),
(450, NULL, 'facebook_url', 'basic_information', 'https://www.facebook.com', 59, 11, 39, '2019-12-23 07:42:15', '2019-12-23 07:44:40'),
(451, NULL, 'min_guest', 'basic_information', '10', 59, 11, 39, '2019-12-23 07:42:18', '2019-12-23 07:44:40'),
(452, NULL, 'cover_video', 'basic_information', '', 59, 11, 39, '2019-12-23 07:42:18', '2019-12-23 07:42:18'),
(453, NULL, 'cover_video_image', 'basic_information', '', 59, 11, 39, '2019-12-23 07:42:19', '2019-12-23 07:42:19'),
(454, NULL, 'linkedin_url', 'basic_information', 'https://linedin.com', 59, 11, 39, '2019-12-23 07:42:19', '2019-12-23 07:44:40'),
(455, NULL, 'twitter_url', 'basic_information', 'https://www.twitter.com', 59, 11, 39, '2019-12-23 07:42:19', '2019-12-23 07:44:40'),
(456, NULL, 'instagram_url', 'basic_information', 'https://insta.com', 59, 11, 39, '2019-12-23 07:42:19', '2019-12-23 07:44:40'),
(457, NULL, 'pinterest_url', 'basic_information', 'https://www.pinta.com', 59, 11, 39, '2019-12-23 07:42:19', '2019-12-23 07:44:40'),
(458, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1577106896ev04qswes77AfWI2oRQ115747561420CECWnSZ7yaVhvavQEMn14997.png', 59, 11, 39, '2019-12-23 07:44:56', '2019-12-23 07:44:56'),
(459, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/15771068968RhGupypmAqisfHwXmfoanchez4_51_698336157383070553519.jpg', 59, 11, 39, '2019-12-23 07:44:56', '2019-12-23 07:44:56'),
(460, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1577106896UFmIr7sPusQMDdHFJswvsanchez1_51_698336157383071560610.jpg', 59, 11, 39, '2019-12-23 07:44:56', '2019-12-23 07:44:56'),
(461, NULL, 'video', 'videoGallery', '{"title":"Venue Miami","link":"https:\\/\\/www.youtube.com\\/embed\\/ZdtvA99hBCI","image":"images\\/vendors\\/gallery\\/15771069619sMZq4V5zmRaUWt5P7iO15747561420CECWnSZ7yaVhvavQEMn14997.png"}', 59, 11, 39, '2019-12-23 07:46:01', '2019-12-23 07:46:01'),
(462, NULL, 'description', 'description', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 59, 11, 39, '2019-12-23 07:46:27', '2019-12-23 07:46:49'),
(466, 0, 'season', 'seasons', '3', 59, 11, 39, '2019-12-23 07:49:19', '2019-12-23 07:49:19'),
(467, NULL, 'prohibtion', 'prohibtion', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.&nbsp;</p>', 59, 11, 39, '2019-12-23 07:51:39', '2019-12-23 07:51:45'),
(468, 0, 'style', 'styles', '1', 59, 11, 39, '2019-12-24 02:11:52', '2019-12-24 02:11:52'),
(469, 0, 'style', 'styles', '4', 59, 11, 39, '2019-12-24 02:11:52', '2019-12-24 02:11:52'),
(470, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1577173524I9PGV8HuAI0BkMbjput7k.jpg', 59, 11, 39, '2019-12-24 02:15:24', '2019-12-24 02:15:24'),
(471, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1577173524YDVmxUUxB2pjl5sieBqFsanchex2_51_698336157383070987838.jpg', 59, 11, 39, '2019-12-24 02:15:24', '2019-12-24 02:15:24'),
(472, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1577173524dsgfp2LIislJYgNKW8fUsanchez1_51_698336157383071560610.jpg', 59, 11, 39, '2019-12-24 02:15:24', '2019-12-24 02:15:24'),
(473, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1577173532wV5prj4wfPqszVUYstzTScreenshotfrom20191120185131.png', 59, 11, 39, '2019-12-24 02:15:32', '2019-12-24 02:15:32'),
(474, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1577173532N1vO3UDKEZWUDEiS7dNUScreenshotfrom20191125182053.png', 59, 11, 39, '2019-12-24 02:15:32', '2019-12-24 02:15:32'),
(475, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1577173532zmz22IKYsckuZlgaqoNNScreenshotfrom20191127124459.png', 59, 11, 39, '2019-12-24 02:15:32', '2019-12-24 02:15:32'),
(476, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1577174009ZMfqQ0a11y98WzZ3G55wsanchex2_51_698336157383070987838.jpg', 44, 11, 26, '2019-12-24 02:23:29', '2019-12-24 02:23:29'),
(477, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1577174009XO2UyS4eOcIYYMCwQbyosanchez1_51_698336157383071560610.jpg', 44, 11, 26, '2019-12-24 02:23:29', '2019-12-24 02:23:29'),
(478, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1577174009W4aRYRHPK2SIHsCBMhIoScreenshotfrom20191030173155.png', 44, 11, 26, '2019-12-24 02:23:29', '2019-12-24 02:23:29'),
(479, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1577174009GAm6mbrv5eP1opTAJZhMScreenshotfrom20191118132913.png', 44, 11, 26, '2019-12-24 02:23:29', '2019-12-24 02:23:29'),
(480, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1577174009uk1cuuFIIMhgsO1crIaWScreenshotfrom20191120185131.png', 44, 11, 26, '2019-12-24 02:23:29', '2019-12-24 02:23:29'),
(481, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1577174009XUCBOqHHbVSsPvPN6ZXGScreenshotfrom20191125182053.png', 44, 11, 26, '2019-12-24 02:23:29', '2019-12-24 02:23:29'),
(482, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/15771740090ZByaxcf981uCJk4VOkDScreenshotfrom20191127124459.png', 44, 11, 26, '2019-12-24 02:23:29', '2019-12-24 02:23:29'),
(483, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1577174009P3A5mdyNubFuZKxO9pbNScreenshotfrom20191204195729.png', 44, 11, 26, '2019-12-24 02:23:29', '2019-12-24 02:23:29'),
(484, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1577174009BRSYhDjuX5AXzRxH3wjBt10_1435802609300solo019.jpg', 44, 11, 26, '2019-12-24 02:23:29', '2019-12-24 02:23:29'),
(485, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1577176442dMAsPl3U3dCExifo5uSVScreenshotfrom20191125182053.png', 59, 11, 39, '2019-12-24 03:04:02', '2019-12-24 03:04:02'),
(486, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1577176442PAJ87TGphX3Nb4SVgfIqScreenshotfrom20191127124459.png', 59, 11, 39, '2019-12-24 03:04:02', '2019-12-24 03:04:02'),
(487, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1577176442z5G11ozNsOK2LYmqYPb0Screenshotfrom20191204195729.png', 59, 11, 39, '2019-12-24 03:04:02', '2019-12-24 03:04:02'),
(488, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1577176442GxurhNPsEVv3uuawbMmDt10_1435802609300solo019.jpg', 59, 11, 39, '2019-12-24 03:04:02', '2019-12-24 03:04:02'),
(489, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1577176541jYMVDsNKM5ATJKtbIU9Cpackageimg1.png', 31, 1, 1, '2019-12-24 03:05:41', '2019-12-24 03:05:41'),
(490, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1577176541J6xoh51TX7Umi3y06dLkpackageimg2.png', 31, 1, 1, '2019-12-24 03:05:41', '2019-12-24 03:05:41'),
(491, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/15771765412vI90f11kaOGdy8Hqic0packageimg3.png', 31, 1, 1, '2019-12-24 03:05:41', '2019-12-24 03:05:41'),
(492, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1577176541kHIJE8QBBuV2yImxafO2packageimg4.png', 31, 1, 1, '2019-12-24 03:05:41', '2019-12-24 03:05:41'),
(493, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1577176541s4NFTdP9XLcW8RAm8bH6recent1.png', 31, 1, 1, '2019-12-24 03:05:41', '2019-12-24 03:05:41'),
(494, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1577176541V8Qohd9o6XPaTh76LT6Erecent2.png', 31, 1, 1, '2019-12-24 03:05:41', '2019-12-24 03:05:41'),
(495, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/15771765413xq4bbkCsfENiYgyuaiErecent4.png', 31, 1, 1, '2019-12-24 03:05:41', '2019-12-24 03:05:41'),
(496, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1577176541SKZ0kV0QFEPZUGHKHUAkrecent5.png', 31, 1, 1, '2019-12-24 03:05:41', '2019-12-24 03:05:41'),
(497, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1577176541Eb6X6dV3u5yK9Jh82ZHBrecent7.png', 31, 1, 1, '2019-12-24 03:05:41', '2019-12-24 03:05:41'),
(498, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1577176541NeguL9UB6eIqOdpBuWE0recent8.png', 31, 1, 1, '2019-12-24 03:05:41', '2019-12-24 03:05:41'),
(499, NULL, 'business_name', 'basic_information', '', 64, 11, 41, '2019-12-30 07:21:27', '2019-12-30 07:21:27'),
(500, NULL, 'address', 'basic_information', '', 64, 11, 41, '2019-12-30 07:21:28', '2019-12-30 07:21:28'),
(501, NULL, 'website', 'basic_information', '', 64, 11, 41, '2019-12-30 07:21:28', '2019-12-30 07:21:28'),
(502, NULL, 'phone_number', 'basic_information', '', 64, 11, 41, '2019-12-30 07:21:28', '2019-12-30 07:21:28'),
(503, NULL, 'company', 'basic_information', '', 64, 11, 41, '2019-12-30 07:21:28', '2019-12-30 07:21:28'),
(504, NULL, 'travel_distaince', 'basic_information', '', 64, 11, 41, '2019-12-30 07:21:28', '2019-12-30 07:21:28'),
(505, NULL, 'min_price', 'basic_information', '', 64, 11, 41, '2019-12-30 07:21:28', '2019-12-30 07:21:28'),
(506, NULL, 'cover_photo', 'basic_information', '', 64, 11, 41, '2019-12-30 07:21:28', '2019-12-30 07:21:28'),
(507, NULL, 'short_description', 'basic_information', '', 64, 11, 41, '2019-12-30 07:21:28', '2019-12-30 07:21:28'),
(508, NULL, 'facebook_url', 'basic_information', '', 64, 11, 41, '2019-12-30 07:21:28', '2019-12-30 07:21:28'),
(509, NULL, 'prohibtion', 'prohibtion', '', 64, 11, 41, '2019-12-30 07:21:52', '2019-12-30 07:21:52'),
(512, 0, 'style', 'styles', '1', 59, 1, 35, '2019-12-31 03:52:49', '2019-12-31 03:52:49'),
(513, NULL, 'style', 'styles', '', 64, 11, 41, '2019-12-31 17:08:07', '2019-12-31 17:08:07'),
(514, NULL, 'bessiness_address_proof_1', 'basic_information', 'images/vendors/settings/1578045082UfIWNwzh6SKZYTSoeVZMchecklist.svg', 31, 1, 1, '2020-01-03 03:11:13', '2020-01-03 04:21:22'),
(515, NULL, 'bessiness_address_proof_2', 'basic_information', 'images/vendors/settings/1578045082NSBWAoGk3d5zjOqNZKsjcommas.png', 31, 1, 1, '2020-01-03 03:11:13', '2020-01-03 04:21:22'),
(516, NULL, 'business_registation_proof', 'basic_information', 'images/vendors/settings/1578045082JmGUhm2f3iGoVqgorwdtDJ.png', 31, 1, 1, '2020-01-03 03:11:13', '2020-01-03 04:21:22'),
(517, NULL, 'bessiness_address_proof_1', 'basic_information', '', 59, 11, 39, '2020-01-03 09:06:54', '2020-01-03 09:06:54'),
(518, NULL, 'bessiness_address_proof_2', 'basic_information', '', 59, 11, 39, '2020-01-03 09:06:54', '2020-01-03 09:06:54'),
(519, NULL, 'business_registation_proof', 'basic_information', '', 59, 11, 39, '2020-01-03 09:06:54', '2020-01-03 09:06:54'),
(520, NULL, 'bessiness_address_proof_1', 'basic_information', '', 59, 1, 35, '2020-01-07 04:10:24', '2020-01-07 04:10:24'),
(521, NULL, 'bessiness_address_proof_2', 'basic_information', '', 59, 1, 35, '2020-01-07 04:10:24', '2020-01-07 04:10:24'),
(522, NULL, 'business_registation_proof', 'basic_information', '', 59, 1, 35, '2020-01-07 04:10:24', '2020-01-07 04:10:24'),
(523, NULL, 'facebook_url', 'basic_information', NULL, 31, 18, 2, '2020-01-09 07:07:52', '2020-01-09 07:11:39'),
(524, NULL, 'bessiness_address_proof_1', 'basic_information', '', 31, 18, 2, '2020-01-09 07:07:52', '2020-01-09 07:07:52'),
(525, NULL, 'bessiness_address_proof_2', 'basic_information', '', 31, 18, 2, '2020-01-09 07:07:52', '2020-01-09 07:07:52'),
(526, NULL, 'business_registation_proof', 'basic_information', '', 31, 18, 2, '2020-01-09 07:07:52', '2020-01-09 07:07:52'),
(527, NULL, 'min_guest', 'basic_information', '10', 31, 18, 2, '2020-01-09 07:07:55', '2020-01-09 07:11:39'),
(528, NULL, 'linkedin_url', 'basic_information', NULL, 31, 18, 2, '2020-01-09 07:07:55', '2020-01-09 07:11:39'),
(529, NULL, 'twitter_url', 'basic_information', NULL, 31, 18, 2, '2020-01-09 07:07:56', '2020-01-09 07:11:39'),
(530, NULL, 'instagram_url', 'basic_information', NULL, 31, 18, 2, '2020-01-09 07:07:56', '2020-01-09 07:11:39'),
(531, NULL, 'pinterest_url', 'basic_information', NULL, 31, 18, 2, '2020-01-09 07:07:56', '2020-01-09 07:11:39'),
(532, NULL, 'business_name', 'basic_information', 'Lovely Flowers', 31, 12, 52, '2020-01-09 07:27:48', '2020-01-09 07:29:43'),
(533, NULL, 'address', 'basic_information', 'Lonsdale Avenue, North Vancouver, BC, Canada', 31, 12, 52, '2020-01-09 07:27:48', '2020-01-09 07:29:44'),
(534, NULL, 'website', 'basic_information', 'http://49.249.236.30:8654', 31, 12, 52, '2020-01-09 07:27:48', '2020-01-09 07:29:44'),
(535, NULL, 'phone_number', 'basic_information', '1212878777', 31, 12, 52, '2020-01-09 07:27:48', '2020-01-09 07:29:44'),
(536, NULL, 'company', 'basic_information', 'Lovely Flowers PVT LTD', 31, 12, 52, '2020-01-09 07:27:48', '2020-01-09 07:29:44'),
(537, NULL, 'travel_distaince', 'basic_information', '50', 31, 12, 52, '2020-01-09 07:27:48', '2020-01-09 07:29:44'),
(538, NULL, 'min_price', 'basic_information', '10', 31, 12, 52, '2020-01-09 07:27:48', '2020-01-09 07:29:44'),
(539, NULL, 'cover_photo', 'basic_information', 'images/vendors/settings/1578574784UB0CoaI3YZfgiFaGzWrSbeachweddingceremonyduringdaytime169198.jpg', 31, 12, 52, '2020-01-09 07:27:49', '2020-01-09 07:29:44'),
(540, NULL, 'short_description', 'basic_information', 'Lovely Flowers', 31, 12, 52, '2020-01-09 07:27:49', '2020-01-09 07:29:44'),
(541, NULL, 'facebook_url', 'basic_information', NULL, 31, 12, 52, '2020-01-09 07:27:49', '2020-01-09 07:29:44'),
(542, NULL, 'bessiness_address_proof_1', 'basic_information', 'images/vendors/settings/1578576120OAdGRwh9E1pT2uvkNaMvanthonydelanoixhzgs56Ze49sunsplash.jpg', 31, 12, 52, '2020-01-09 07:27:49', '2020-01-09 07:52:00'),
(543, NULL, 'bessiness_address_proof_2', 'basic_information', 'images/vendors/settings/1578576120d8c4EQay98k2cQx2Bep2austindistelVvAcrVa56fcunsplash.jpg', 31, 12, 52, '2020-01-09 07:27:49', '2020-01-09 07:52:00'),
(544, NULL, 'business_registation_proof', 'basic_information', 'images/vendors/settings/1578576238gI7Mbb96Ryhde1rHduq2eventbannerbg.jpg', 31, 12, 52, '2020-01-09 07:27:49', '2020-01-09 07:53:58'),
(545, NULL, 'min_guest', 'basic_information', '2', 31, 12, 52, '2020-01-09 07:27:52', '2020-01-09 07:29:44'),
(546, NULL, 'cover_video', 'basic_information', '', 31, 12, 52, '2020-01-09 07:27:52', '2020-01-09 07:27:52'),
(547, NULL, 'cover_video_image', 'basic_information', '', 31, 12, 52, '2020-01-09 07:27:52', '2020-01-09 07:27:52'),
(548, NULL, 'linkedin_url', 'basic_information', NULL, 31, 12, 52, '2020-01-09 07:27:52', '2020-01-09 07:29:44'),
(549, NULL, 'twitter_url', 'basic_information', NULL, 31, 12, 52, '2020-01-09 07:27:53', '2020-01-09 07:29:44'),
(550, NULL, 'instagram_url', 'basic_information', NULL, 31, 12, 52, '2020-01-09 07:27:53', '2020-01-09 07:29:44'),
(551, NULL, 'pinterest_url', 'basic_information', NULL, 31, 12, 52, '2020-01-09 07:27:53', '2020-01-09 07:29:44'),
(552, NULL, 'aboutus_slider_images', 'imageGallery', 'images/vendors/gallery/1578574820otRGH6m5s2kGjG0kqUejcelebrationcolorfulcolourfulcupcakes587741.jpg', 31, 12, 52, '2020-01-09 07:30:20', '2020-01-09 07:30:20'),
(553, NULL, 'description', 'description', '<p>Why can&#39;t I log in to my Print Genie account even though I connected a store?</p>', 31, 12, 52, '2020-01-09 07:30:45', '2020-01-09 07:30:54'),
(555, 0, 'style', 'styles', '1', 31, 12, 52, '2020-01-09 07:31:04', '2020-01-09 07:31:04'),
(556, 0, 'style', 'styles', '2', 31, 12, 52, '2020-01-09 07:31:04', '2020-01-09 07:31:04'),
(557, NULL, 'prohibtion', 'prohibtion', '<p>Why can&#39;t I log in to my Print Genie account even though I connected a store?</p>', 31, 12, 52, '2020-01-09 07:33:47', '2020-01-09 07:33:56'),
(563, 0, 'season', 'seasons', '1', 31, 12, 52, '2020-01-09 07:41:30', '2020-01-09 07:41:30'),
(564, 0, 'season', 'seasons', '2', 31, 12, 52, '2020-01-09 07:41:30', '2020-01-09 07:41:30'),
(565, 0, 'season', 'seasons', '3', 31, 12, 52, '2020-01-09 07:41:30', '2020-01-09 07:41:30'),
(566, 0, 'season', 'seasons', '4', 31, 12, 52, '2020-01-09 07:41:30', '2020-01-09 07:41:30'),
(567, 0, 'season', 'seasons', '5', 31, 12, 52, '2020-01-09 07:41:30', '2020-01-09 07:41:30'),
(568, NULL, 'video', 'videoGallery', '{"title":"Lorem ipsum dolor sit","link":"https:\\/\\/www.youtube.com\\/embed\\/aFRAwJ5Q7nw","image":"images\\/vendors\\/gallery\\/1578576012MEUdGPvRHygfwH546Y0Beventthemebg2.jpg"}', 31, 12, 52, '2020-01-09 07:50:12', '2020-01-09 07:50:12'),
(569, NULL, 'bessiness_address_proof_1', 'basic_information', '', 34, 20, 14, '2020-01-17 01:57:52', '2020-01-17 01:57:52'),
(570, NULL, 'bessiness_address_proof_2', 'basic_information', '', 34, 20, 14, '2020-01-17 01:57:52', '2020-01-17 01:57:52'),
(571, NULL, 'business_registation_proof', 'basic_information', '', 34, 20, 14, '2020-01-17 01:57:52', '2020-01-17 01:57:52'),
(572, NULL, 'business_name', 'basic_information', '', 76, 17, 53, '2020-01-31 06:07:25', '2020-01-31 06:07:25'),
(573, NULL, 'address', 'basic_information', '', 76, 17, 53, '2020-01-31 06:07:25', '2020-01-31 06:07:25'),
(574, NULL, 'website', 'basic_information', '', 76, 17, 53, '2020-01-31 06:07:25', '2020-01-31 06:07:25'),
(575, NULL, 'phone_number', 'basic_information', '', 76, 17, 53, '2020-01-31 06:07:25', '2020-01-31 06:07:25'),
(576, NULL, 'company', 'basic_information', '', 76, 17, 53, '2020-01-31 06:07:25', '2020-01-31 06:07:25'),
(577, NULL, 'travel_distaince', 'basic_information', '', 76, 17, 53, '2020-01-31 06:07:25', '2020-01-31 06:07:25'),
(578, NULL, 'min_price', 'basic_information', '', 76, 17, 53, '2020-01-31 06:07:25', '2020-01-31 06:07:25'),
(579, NULL, 'cover_photo', 'basic_information', '', 76, 17, 53, '2020-01-31 06:07:25', '2020-01-31 06:07:25'),
(580, NULL, 'short_description', 'basic_information', '', 76, 17, 53, '2020-01-31 06:07:25', '2020-01-31 06:07:25'),
(581, NULL, 'facebook_url', 'basic_information', '', 76, 17, 53, '2020-01-31 06:07:25', '2020-01-31 06:07:25'),
(582, NULL, 'bessiness_address_proof_1', 'basic_information', '', 76, 17, 53, '2020-01-31 06:07:25', '2020-01-31 06:07:25'),
(583, NULL, 'bessiness_address_proof_2', 'basic_information', '', 76, 17, 53, '2020-01-31 06:07:25', '2020-01-31 06:07:25'),
(584, NULL, 'business_registation_proof', 'basic_information', '', 76, 17, 53, '2020-01-31 06:07:25', '2020-01-31 06:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_event_games`
--

CREATE TABLE `vendor_event_games` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `vendor_category_id` int(11) NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_event_games`
--

INSERT INTO `vendor_event_games` (`id`, `parent`, `user_id`, `event_id`, `category_id`, `vendor_category_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 0, 31, 3, 1, 1, NULL, '2019-11-21 02:12:48', '2019-11-21 02:12:48'),
(3, 0, 31, 1, 18, 2, NULL, '2019-11-21 07:33:31', '2019-11-21 07:33:31'),
(4, 0, 31, 2, 18, 2, NULL, '2019-11-21 07:33:31', '2019-11-21 07:33:31'),
(5, 0, 31, 3, 18, 2, NULL, '2019-11-21 07:33:31', '2019-11-21 07:33:31'),
(6, 0, 31, 5, 18, 2, NULL, '2019-11-21 07:33:31', '2019-11-21 07:33:31'),
(7, 0, 31, 6, 18, 2, NULL, '2019-11-21 07:33:31', '2019-11-21 07:33:31'),
(8, 0, 31, 9, 18, 2, NULL, '2019-11-21 07:33:31', '2019-11-21 07:33:31'),
(9, 0, 31, 10, 18, 2, NULL, '2019-11-21 07:33:31', '2019-11-21 07:33:31'),
(10, 0, 31, 11, 18, 2, NULL, '2019-11-21 07:33:31', '2019-11-21 07:33:31'),
(11, 0, 31, 14, 18, 2, NULL, '2019-11-21 07:33:31', '2019-11-21 07:33:31'),
(12, 0, 42, 2, 1, 11, NULL, '2019-11-25 10:39:52', '2019-11-25 10:39:52'),
(14, 0, 44, 1, 20, 22, NULL, '2019-11-26 05:59:10', '2019-11-26 05:59:10'),
(15, 0, 34, 1, 25, 15, NULL, '2019-11-27 01:37:38', '2019-11-27 01:37:38'),
(16, 0, 31, 2, 11, 24, NULL, '2019-11-27 02:13:55', '2019-11-27 02:13:55'),
(22, 0, 34, 5, 11, 25, NULL, '2019-11-27 02:20:01', '2019-11-27 02:20:01'),
(25, 0, 34, 2, 20, 14, NULL, '2019-12-03 05:01:46', '2019-12-03 05:01:46'),
(31, 0, 59, 3, 1, 35, NULL, '2019-12-09 03:20:52', '2019-12-09 03:20:52'),
(32, 0, 34, 3, 11, 25, NULL, '2019-12-11 01:38:12', '2019-12-11 01:38:12'),
(33, 0, 34, 1, 20, 14, NULL, '2019-12-13 09:12:07', '2019-12-13 09:12:07'),
(34, 0, 31, 1, 11, 24, NULL, '2019-12-17 01:07:28', '2019-12-17 01:07:28'),
(36, 0, 44, 2, 11, 26, NULL, '2019-12-18 01:42:25', '2019-12-18 01:42:25'),
(42, 0, 31, 5, 1, 1, NULL, '2019-12-19 09:21:51', '2019-12-19 09:21:51'),
(43, 0, 31, 6, 1, 1, NULL, '2019-12-19 09:21:52', '2019-12-19 09:21:52'),
(45, 0, 59, 6, 1, 35, NULL, '2019-12-20 06:22:32', '2019-12-20 06:22:32'),
(46, 0, 59, 5, 1, 35, NULL, '2019-12-20 06:22:45', '2019-12-20 06:22:45'),
(47, 0, 59, 17, 11, 39, NULL, '2019-12-23 07:49:07', '2019-12-23 07:49:07'),
(48, 0, 31, 2, 1, 1, NULL, '2020-01-08 04:00:41', '2020-01-08 04:00:41'),
(49, 0, 31, 11, 1, 1, NULL, '2020-01-08 04:00:41', '2020-01-08 04:00:41'),
(50, 0, 31, 17, 1, 1, NULL, '2020-01-08 04:00:41', '2020-01-08 04:00:41'),
(51, 0, 31, 2, 12, 52, NULL, '2020-01-09 07:41:14', '2020-01-09 07:41:14'),
(52, 0, 31, 3, 12, 52, NULL, '2020-01-09 07:41:14', '2020-01-09 07:41:14'),
(53, 0, 31, 5, 12, 52, NULL, '2020-01-09 07:41:14', '2020-01-09 07:41:14'),
(54, 0, 31, 6, 12, 52, NULL, '2020-01-09 07:41:15', '2020-01-09 07:41:15'),
(55, 0, 31, 11, 12, 52, NULL, '2020-01-09 07:41:15', '2020-01-09 07:41:15'),
(56, 0, 31, 17, 12, 52, NULL, '2020-01-09 07:41:15', '2020-01-09 07:41:15');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_packages`
--

CREATE TABLE `vendor_packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `no_of_hours` int(11) NOT NULL,
  `no_of_days` int(191) NOT NULL,
  `menus` longtext COLLATE utf8mb4_unicode_ci,
  `price_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_person` int(11) NOT NULL,
  `max_person` int(11) NOT NULL,
  `vendor_category_id` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0',
  `user_requested_by` int(11) NOT NULL DEFAULT '0',
  `custom_package_id` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_packages`
--

INSERT INTO `vendor_packages` (`id`, `title`, `slug`, `description`, `category_id`, `user_id`, `price`, `no_of_hours`, `no_of_days`, `menus`, `price_type`, `min_person`, `max_person`, `vendor_category_id`, `type`, `user_requested_by`, `custom_package_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '10 Percent OFF your Wedding', '10-percent-off-your-wedding', '<p>Print out this promotional page and bring it to us when you come in for your complimentary tasting and private appointment. Allow us to meet with you and If you plan on ordering your cake with us allow us to price your cake. Then, show us your print out and we will take 10% OFF our quoted price.</p>', 1, 31, 5000, 5, 1, '<p>Print out this promotional page and bring it to us when you come in for your complimentary tasting and private appointment. Allow us to meet with you and If you plan on ordering your cake with us allow us to price your cake. Then, show us your print out and we will take 10% OFF our quoted price.</p>', 'per_person', 1, 1000, 1, 0, 0, 0, 1, '2019-11-20 02:42:33', '2019-12-23 09:35:54'),
(11, 'Gold Package', 'gold-package', '<p>Lorium Epsum&nbsp;Lorium Epsum&nbsp;Lorium Epsum&nbsp;Lorium Epsum&nbsp;</p>', 1, 42, 2000, 8, 5, '<p>No</p>', 'per_person', 1, 100, 11, 0, 0, 0, 1, '2019-11-26 01:55:32', '2019-12-10 04:14:15'),
(15, 'Tester', 'tester', '<p>Do you have experience in&nbsp;<b>event</b>&nbsp;from start to finish according to requirements, brand, target audience and objectives? If yes ,then go through our&nbsp;<b>event planner</b>&nbsp;interview&nbsp;<b>questions</b>&nbsp;page for better understanding of interview process and win in job search.Do you have experience in&nbsp;<b>event</b>&nbsp;from start to finish according to requirements, brand, target audience and objectives? If yes ,then go through our&nbsp;<b>event planner</b>&nbsp;interview&nbsp;<b>questions</b>&nbsp;page for better understanding of interview process and win in job search.Do you have experience in&nbsp;<b>event</b>&nbsp;from start to finish according to requirements, brand, target audience and objectives? If yes ,then go through our&nbsp;<b>event planner</b>&nbsp;interview&nbsp;<b>questions</b>&nbsp;page for better understanding of interview process and win in job search.</p>', 20, 44, 20000, 10, 230, '<p>Do you have experience in&nbsp;<b>event</b>&nbsp;from start to finish according to requirements, brand, target audience and objectives? If yes ,then go through our&nbsp;<b>event planner</b>&nbsp;interview&nbsp;<b>questions</b>&nbsp;page for better understanding of interview process and win in job search.Do you have experience in&nbsp;<b>event</b>&nbsp;from start to finish according to requirements, brand, target audience and objectives? If yes ,then go through our&nbsp;<b>event planner</b>&nbsp;interview&nbsp;<b>questions</b>&nbsp;page for better understanding of interview process and win in job search.</p>', 'per_person', 100, 300, 22, 0, 0, 0, 1, '2019-11-26 06:49:50', '2019-12-24 04:33:24'),
(19, 'Tester', 'tester-1', '<p>teszn</p>', 1, 44, 1233, 23, 323, '<p>nsersnsn</p>', 'per_person', 12, 22, 21, 0, 0, 0, 1, '2019-11-26 07:42:27', '2019-11-26 07:42:27'),
(28, 'Buffet', 'buffet', '<p>Combining a trendy, upscale atmosphere with timeless elegance, Blush Banquet Hall is certain to be the perfect event venue for your special occasion. A versatile and stunning banquet hall, Blush is perfect not only for weddings, but also for any special event, including quincea&ntilde;eras, Sweet 16s, bar and bat mitzvahs, anniversaries, baby showers, christenings, holiday parties, and corporate events such as awards galas and fundraisers. When you celebrate with Blush Banquet Hall, you&rsquo;re giving your guests an incredible experience that they will never forget.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Follow us:</strong></p>\r\n	</li>\r\n</ul>', 26, 44, 120000, 12, 3, '<p>Combining a trendy, upscale atmosphere with timeless elegance, Blush Banquet Hall is certain to be the perfect event venue for your special occasion. A versatile and stunning banquet hall, Blush is perfect not only for weddings, but also for any special event, including quincea&ntilde;eras, Sweet 16s, bar and bat mitzvahs, anniversaries, baby showers, christenings, holiday parties, and corporate events such as awards galas and fundraisers. When you celebrate with Blush Banquet Hall, you&rsquo;re giving your guests an incredible experience that they will never forget.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Follow us:</strong></p>\r\n	</li>\r\n</ul>', 'per_person', 1000, 200000, 0, 0, 0, 0, 1, '2019-12-06 05:04:03', '2019-12-06 05:04:03'),
(29, 'Veg Buffet', 'veg-buffet', '<p>Combining a trendy, upscale atmosphere with timeless elegance, Blush Banquet Hall is certain to be the perfect event venue for your special occasion. A versatile and stunning banquet hall, Blush is perfect not only for weddings, but also for any special event, including quincea&ntilde;eras, Sweet 16s, bar and bat mitzvahs, anniversaries, baby showers, christenings, holiday parties, and corporate events such as awards galas and fundraisers. When you celebrate with Blush Banquet Hall, you&rsquo;re giving your guests an incredible experience that they will never forget.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Follow us:</strong></p>\r\n	</li>\r\n</ul>', 26, 44, 340000, 11, 2, '<p>Combining a trendy, upscale atmosphere with timeless elegance, Blush Banquet Hall is certain to be the perfect event venue for your special occasion. A versatile and stunning banquet hall, Blush is perfect not only for weddings, but also for any special event, including quincea&ntilde;eras, Sweet 16s, bar and bat mitzvahs, anniversaries, baby showers, christenings, holiday parties, and corporate events such as awards galas and fundraisers. When you celebrate with Blush Banquet Hall, you&rsquo;re giving your guests an incredible experience that they will never forget.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Follow us:</strong></p>\r\n	</li>\r\n</ul>', 'per_person', 2000, 300000, 0, 0, 0, 0, 1, '2019-12-06 05:05:47', '2019-12-06 05:05:47'),
(30, 'Silver', 'silver-1', '<p>Lorium Epsum is dummy values of Testing for any thing you want</p>', 35, 59, 1000, 5, 5, '<p>No</p>', 'per_person', 100, 2000, 35, 0, 0, 0, 0, '2019-12-09 03:21:53', '2019-12-09 04:54:09'),
(31, 'Gold', 'gold-1', '<p>Lorium Epsum is dummy values of Testing for any thing you want</p>', 35, 59, 1000, 5, 5, '<p>No</p>', 'per_person', 100, 1000, 36, 0, 0, 0, 1, '2019-12-09 03:23:08', '2019-12-09 03:23:08'),
(36, 'Grab Gold Package', 'grab-gold-package', '<p>Grab Gold Package for dummy offers</p>', 1, 59, 1000, 5, 5, '<p>No</p>', 'per_person', 100, 1000, 35, 0, 0, 0, 1, '2019-12-09 04:59:45', '2019-12-09 04:59:45'),
(37, 'GRAB SILVER PACKAGE', 'grab-silver-package', '<p>Grab Silver Package for dummy offers</p>', 1, 59, 100, 8, 8, '<p>No</p>', 'per_person', 50, 100, 35, 0, 0, 0, 1, '2019-12-09 05:01:54', '2019-12-09 05:01:54'),
(40, 'my new winter', 'my-new-winter', '<p>description</p>', 20, 34, 50, 2, 22, NULL, 'per_person', 2, 10, 14, 0, 0, 0, 1, '2019-12-12 06:22:39', '2019-12-26 01:47:11'),
(41, 'fdgdfg', 'fdgdfg', '<p>dfgfdfdg</p>', 1, 34, 400, 2, 3, '<p>dfgdfgdfg</p>', 'per_person', 1, 3, 16, 0, 0, 0, 1, '2019-12-17 05:56:51', '2019-12-17 05:56:51'),
(42, 'Gold Venue Package', 'gold-venue-package', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 11, 59, 1500, 8, 10, '<p>No</p>', 'per_person', 100, 1000, 39, 0, 0, 0, 1, '2019-12-23 07:50:08', '2020-01-06 04:33:30'),
(43, 'Golden Chance', 'golden-chance', '<p>Golden Chance</p>', 11, 31, 1000, 5, 2, '<p>Golden Chance</p>', 'per_person', 5, 200, 24, 0, 0, 0, 1, '2019-12-23 09:38:55', '2019-12-23 09:41:21'),
(44, 'wedding', 'wedding', '<p><strong>Flourish Atlanta&nbsp;</strong>Flourish is the event space to excite your attendees with astonishing stealth and business savvy, and confident appeal. This is the best venue place located amid the city and suitable for small to giant size, and award-winning events. The unique design and decor of Flourish social landscape ensure to add more glamour to your event. Excellent service and culinary expertise are the assets of this outstanding event space.&nbsp;</p>', 20, 44, 500, 14, 1, '<p>Flourish is the event space to excite your attendees with astonishing stealth and business savvy, and confident appeal. This is the best venue place located amid the city and suitable for small to giant size, and award-winning events. The unique design and decor of Flourish social landscape ensure to add more glamour to your event. Excellent service and culinary expertise are the assets of this outstanding event space.&nbsp;</p>', 'per_person', 100, 200, 22, 0, 0, 0, 1, '2019-12-24 02:41:44', '2019-12-24 02:41:44'),
(45, 'AKM Resorts', 'akm-resorts', '<p>Face actual professional level pitchers who&#39;ve pitched at the affiliate to big league level! Ever wondered if you could hit a big league fastball or changeup? Come find out!Face actual professional level pitchers who&#39;ve pitched at the affiliate to big league level! Ever wondered if you could hit a big league fastball or changeup? Come find out!</p>', 11, 44, 10000, 6, 3, '<p>Face actual professional level pitchers who&#39;ve pitched at the affiliate to big league level! Ever wondered if you could hit a big league fastball or changeup? Come find out!Face actual professional level pitchers who&#39;ve pitched at the affiliate to big league level! Ever wondered if you could hit a big league fastball or changeup? Come find out!</p>', 'per_person', 100, 1000, 26, 0, 0, 0, 1, '2019-12-31 01:42:52', '2019-12-31 01:42:52'),
(47, 'Sample 1', 'sample-1', '<p>test</p>', 1, 31, 2000, 5, 2, '<p>test</p>', 'per_person', 20, 1000, 1, 0, 0, 0, 1, '2019-12-31 01:46:13', '2019-12-31 01:46:13'),
(50, 'The Missisaugga', 'the-missisaugga', '<p>Face actual professional level pitchers who&#39;ve pitched at the affiliate to big league level! Ever wondered if you could hit a big league fastball or changeup? Come find out!Face actual professional level pitchers who&#39;ve pitched at the affiliate to big league level! Ever wondered if you could hit a big league fastball or changeup? Come find out!</p>', 11, 44, 10000, 6, 2, '<p>Face actual professional level pitchers who&#39;ve pitched at the affiliate to big league level! Ever wondered if you could hit a big league fastball or changeup? Come find out!Face actual professional level pitchers who&#39;ve pitched at the affiliate to big league level! Ever wondered if you could hit a big league fastball or changeup? Come find out!</p>', 'per_person', 100, 1000, 26, 0, 0, 0, 1, '2019-12-31 03:07:00', '2019-12-31 03:07:00'),
(51, 'Gold Package', 'gold-package-1', '<p>Why can&#39;t I log in to my Print Genie account even though I connected a store?</p>', 12, 31, 10, 2, 1, '<p>Why can&#39;t I log in to my Print Genie account even though I connected a store?</p>', 'fix', 1, 100, 52, 0, 0, 0, 1, '2020-01-09 07:32:37', '2020-01-09 07:32:37'),
(55, 'My Wedding Custom Package', 'my-wedding-custom-package', '<p>asssssss</p>', 1, 31, 5000, 4, 2, '<p>asssssssssssss</p>', 'per_person', 120, 500, 1, 1, 32, 2, 1, '2020-01-14 04:55:27', '2020-01-14 04:55:27'),
(56, 'Venue Custom Packe', 'venue-custom-packe', '<p>test</p>', 11, 31, 12000, 5, 2, '<p>test</p>', 'per_person', 12, 150, 24, 1, 32, 10, 1, '2020-01-15 06:38:51', '2020-01-15 06:38:51'),
(57, 'Sample 12', 'sample-12', '<p>sadd</p>', 11, 31, 5000, 5, 1, '<p>sddddddddddd</p>', 'per_person', 120, 500, 24, 1, 32, 11, 1, '2020-01-15 06:45:13', '2020-01-15 06:45:13');

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`id`, `slug`, `description`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'tt', 'Its good place', 'New York', '1573814666.jpeg', 0, '2019-11-15 04:24:14', '2019-11-20 03:12:02'),
(2, 'jassiiiii', 'The image must be an image. Error message should be correct .  it should be sound goodThe image must be an image. Error message should be correct .  it should be sound good', 'jassiiiii', '1574317703.jpg', 1, '2019-11-20 07:57:47', '2019-11-26 01:06:53'),
(3, 'england', 'England is the largest part of the island of Great Britain, and it is also the largest constituent country of the United Kingdom. Scotland and Wales are also part of Great Britain (and the UK), Scotland to the north and Wales to the west. To the east and south, and part of the west, England is bordered by sea.', 'England', '1583913774.png', 1, '2019-12-05 05:07:45', '2020-03-11 02:32:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accordians`
--
ALTER TABLE `accordians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_variations`
--
ALTER TABLE `category_variations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `check_lists`
--
ALTER TABLE `check_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commissions`
--
ALTER TABLE `commissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_code`
--
ALTER TABLE `country_code`
  ADD PRIMARY KEY (`countrycode`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_dates`
--
ALTER TABLE `course_dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_packages`
--
ALTER TABLE `custom_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `default_tasks`
--
ALTER TABLE `default_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_deals`
--
ALTER TABLE `discount_deals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dispute_vendors`
--
ALTER TABLE `dispute_vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eshops`
--
ALTER TABLE `eshops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_orders`
--
ALTER TABLE `event_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourite_vendors`
--
ALTER TABLE `favourite_vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `f_a_qs`
--
ALTER TABLE `f_a_qs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invite_vendors`
--
ALTER TABLE `invite_vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_check_list_tasks`
--
ALTER TABLE `my_check_list_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_meta_datas`
--
ALTER TABLE `package_meta_datas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_meta_tags`
--
ALTER TABLE `page_meta_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_assigned_variations`
--
ALTER TABLE `product_assigned_variations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category_brands`
--
ALTER TABLE `product_category_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category_variations`
--
ALTER TABLE `product_category_variations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_inventories`
--
ALTER TABLE `product_inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variations`
--
ALTER TABLE `product_variations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejection_reasons`
--
ALTER TABLE `rejection_reasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seasons`
--
ALTER TABLE `seasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_aproval_processes`
--
ALTER TABLE `service_aproval_processes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_cart_items`
--
ALTER TABLE `shop_cart_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_categories`
--
ALTER TABLE `shop_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_orders`
--
ALTER TABLE `shop_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_pages`
--
ALTER TABLE `shop_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `styles`
--
ALTER TABLE `styles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_events`
--
ALTER TABLE `user_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_event_meta_datas`
--
ALTER TABLE `user_event_meta_datas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variations`
--
ALTER TABLE `variations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variation_extras`
--
ALTER TABLE `variation_extras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_amenities`
--
ALTER TABLE `vendor_amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_categories`
--
ALTER TABLE `vendor_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_category_meta_datas`
--
ALTER TABLE `vendor_category_meta_datas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_event_games`
--
ALTER TABLE `vendor_event_games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_packages`
--
ALTER TABLE `vendor_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accordians`
--
ALTER TABLE `accordians`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `category_variations`
--
ALTER TABLE `category_variations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1093;
--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `check_lists`
--
ALTER TABLE `check_lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;
--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `course_dates`
--
ALTER TABLE `course_dates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT for table `custom_packages`
--
ALTER TABLE `custom_packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `default_tasks`
--
ALTER TABLE `default_tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=496;
--
-- AUTO_INCREMENT for table `discount_deals`
--
ALTER TABLE `discount_deals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `dispute_vendors`
--
ALTER TABLE `dispute_vendors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `eshops`
--
ALTER TABLE `eshops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `event_orders`
--
ALTER TABLE `event_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `favourite_vendors`
--
ALTER TABLE `favourite_vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `f_a_qs`
--
ALTER TABLE `f_a_qs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `invite_vendors`
--
ALTER TABLE `invite_vendors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `my_check_list_tasks`
--
ALTER TABLE `my_check_list_tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=565;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `package_meta_datas`
--
ALTER TABLE `package_meta_datas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=799;
--
-- AUTO_INCREMENT for table `page_meta_tags`
--
ALTER TABLE `page_meta_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=497;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `product_assigned_variations`
--
ALTER TABLE `product_assigned_variations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;
--
-- AUTO_INCREMENT for table `product_category_brands`
--
ALTER TABLE `product_category_brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `product_category_variations`
--
ALTER TABLE `product_category_variations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=361;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `product_inventories`
--
ALTER TABLE `product_inventories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `product_variations`
--
ALTER TABLE `product_variations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `rejection_reasons`
--
ALTER TABLE `rejection_reasons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `seasons`
--
ALTER TABLE `seasons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `service_aproval_processes`
--
ALTER TABLE `service_aproval_processes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `shop_cart_items`
--
ALTER TABLE `shop_cart_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `shop_categories`
--
ALTER TABLE `shop_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=909;
--
-- AUTO_INCREMENT for table `shop_orders`
--
ALTER TABLE `shop_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `shop_pages`
--
ALTER TABLE `shop_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `styles`
--
ALTER TABLE `styles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `user_events`
--
ALTER TABLE `user_events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `user_event_meta_datas`
--
ALTER TABLE `user_event_meta_datas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=544;
--
-- AUTO_INCREMENT for table `variations`
--
ALTER TABLE `variations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `variation_extras`
--
ALTER TABLE `variation_extras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vendor_amenities`
--
ALTER TABLE `vendor_amenities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `vendor_categories`
--
ALTER TABLE `vendor_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `vendor_category_meta_datas`
--
ALTER TABLE `vendor_category_meta_datas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=585;
--
-- AUTO_INCREMENT for table `vendor_event_games`
--
ALTER TABLE `vendor_event_games`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `vendor_packages`
--
ALTER TABLE `vendor_packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
