-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 29, 2019 at 04:41 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Webdev2_eindwerk`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `intro`, `content`, `user_name`, `type`, `product_id`, `created_at`, `updated_at`) VALUES
(15, 'test', 'test', 'test', 'Owen De Waele', 'Bericht', NULL, '2019-05-26 17:44:30', '2019-05-26 17:44:30'),
(16, 'test date', 'testing 123', 'test', 'Owen De Waele', 'Create', 7, '2019-05-26 17:49:00', '2019-05-26 17:49:00'),
(17, 'ghjklk', 'jhbkjnlk', 'jhkj', 'Owen De Waele', 'Create', 8, '2019-05-26 17:54:03', '2019-05-26 17:54:03'),
(18, 'er', 'er', 'er', 'Steve De Waele', 'Create', 9, '2019-05-26 17:57:34', '2019-05-26 17:57:34'),
(19, '666test666', 'testing 123321123321', 'testing 123', 'testing 123', 'Create', 10, '2019-05-27 15:59:58', '2019-05-29 14:10:58'),
(20, 'test test test test', 'testing 123321123321', 'testing 123', 'Test', 'Edit', 10, '2019-05-27 16:05:04', '2019-05-27 16:05:04'),
(21, 'test', 'testing 123', 'testing 123', 'Test', 'Fund', 4, '2019-05-27 16:06:37', '2019-05-27 16:06:37'),
(22, 'er', 'er', 'er', 'Test', 'Fund', 9, '2019-05-27 16:06:47', '2019-05-27 16:06:47'),
(23, 'ghjklk', 'jhbkjnlk', 'jhbkjnlk', 'Test', 'Fund', 8, '2019-05-27 16:06:56', '2019-05-27 16:06:56'),
(24, 'ghjklk', 'jhbkjnlk', 'jhbkjnlk', 'Test', 'Fund', 8, '2019-05-27 16:06:59', '2019-05-27 16:06:59'),
(25, 'ghjklk', 'jhbkjnlk', 'jhbkjnlk', 'Test', 'Fund', 8, '2019-05-27 16:07:00', '2019-05-27 16:07:00'),
(26, 'ghjklk', 'jhbkjnlk', 'jhbkjnlk', 'Test', 'Fund', 8, '2019-05-27 16:07:01', '2019-05-27 16:07:01'),
(27, 'ghjklk', 'jhbkjnlk', 'jhbkjnlk', 'Test', 'Fund', 8, '2019-05-27 16:07:03', '2019-05-27 16:07:03'),
(28, 'ghjklk', 'jhbkjnlk', 'jhbkjnlk', 'Test', 'Fund', 8, '2019-05-27 16:07:04', '2019-05-27 16:07:04'),
(29, 'ghjklk', 'jhbkjnlk', 'jhbkjnlk', 'Test', 'Fund', 8, '2019-05-27 16:07:05', '2019-05-27 16:07:05'),
(30, 'ghjklk', 'jhbkjnlk', 'jhbkjnlk', 'Test', 'Fund', 8, '2019-05-27 16:07:07', '2019-05-27 16:07:07'),
(31, 'ghjklk', 'jhbkjnlk', 'jhbkjnlk', 'Test', 'Fund', 8, '2019-05-27 16:07:08', '2019-05-27 16:07:08'),
(32, 'ghjklk', 'jhbkjnlk', 'jhbkjnlk', 'Test', 'Fund', 8, '2019-05-27 16:07:10', '2019-05-27 16:07:10'),
(33, 'ghjklk', 'jhbkjnlk', 'jhbkjnlk', 'Test', 'Fund', 8, '2019-05-27 16:07:14', '2019-05-27 16:07:14'),
(34, 'ghjklk', 'jhbkjnlk', 'jhbkjnlk', 'Test', 'Fund', 8, '2019-05-27 16:07:16', '2019-05-27 16:07:16'),
(35, 'ghjklk', 'jhbkjnlk', 'jhbkjnlk', 'Test', 'Fund', 8, '2019-05-27 16:07:17', '2019-05-27 16:07:17'),
(36, 'GuidelineTest', 'dit is een test', 'Dit is voor een guideline test', 'Steve De Waele', 'Create', 11, '2019-05-27 17:20:31', '2019-05-27 17:20:31'),
(37, 'test test test test', 'testing 123321123321', 'testing 123321123321', 'Steve De Waele', 'Fund', 10, '2019-05-28 20:52:52', '2019-05-28 20:52:52'),
(38, 'test test test test', 'testing 123321123321', 'testing 123321123321', 'Steve De Waele', 'Fund', 10, '2019-05-28 20:52:58', '2019-05-28 20:52:58'),
(39, 'test', 'testing 123', 'test', 'Steve De Waele', 'Create', 1, '2019-05-28 21:01:03', '2019-05-28 21:01:03'),
(40, 'gvhbjnkl', 'ghjnk', 'vygbhnj,k', 'testman', 'Create', 2, '2019-05-28 21:01:57', '2019-05-28 21:01:57'),
(41, 'vygbuhijok', 'yguhijok', 'yguyhijok', 'testman', 'Create', 3, '2019-05-28 21:03:29', '2019-05-28 21:03:29'),
(42, 'vgbhjnkk', 'gbhjnk,l', 'gbhnj,kl', 'testman', 'Create', 4, '2019-05-28 21:03:54', '2019-05-28 21:03:54'),
(43, 'hgbjnkk', 'uhjk', 'uyhijo', 'testman', 'Create', 5, '2019-05-28 21:04:21', '2019-05-28 21:04:21'),
(44, 'hfgjklm', 'fjghklompio', 'jfghukjlm', 'Owen De Waele', 'Create', 2, '2019-05-29 12:01:11', '2019-05-29 12:01:11'),
(45, 'hfgjklm', 'fjghklompio', 'fjghklompio', 'Steve De Waele', 'Fund', 2, '2019-05-29 12:23:41', '2019-05-29 12:23:41');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Gaming', NULL, '2019-05-29 05:47:31'),
(2, 'Uitvinding', NULL, '2019-05-28 20:19:08'),
(3, 'Muziek', NULL, NULL),
(4, 'Evenementen', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `user_id`, `user_name`, `comment`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 'Steve De Waele', 'Test', '2019-05-27 17:51:42', '2019-05-27 17:51:42');

-- --------------------------------------------------------

--
-- Table structure for table `fundings`
--

CREATE TABLE `fundings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fundings`
--

INSERT INTO `fundings` (`id`, `amount`, `product_id`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES
(1, '54.00', 10, 1, 'Steve De Waele', '2019-05-28 20:52:52', '2019-05-28 20:52:52'),
(2, '54.00', 10, 1, 'Steve De Waele', '2019-05-28 20:52:58', '2019-05-28 20:52:58'),
(3, '18.00', 2, 1, 'Steve De Waele', '2019-05-29 12:23:41', '2019-05-29 12:23:41'),
(4, '500.00', 2, 2, 'Owen De Waele', '2019-05-29 14:04:59', '2019-05-29 14:04:59'),
(5, '20.00', 2, 2, 'Owen De Waele', '2019-05-29 14:05:34', '2019-05-29 14:05:34');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filepath` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `product_id`, `filepath`, `filename`, `created_at`, `updated_at`, `user_id`) VALUES
(1, NULL, 'storage/product', 'LODO2_afb4-55cead2b3b380e.jpg', '2019-05-26 15:53:56', '2019-05-26 15:53:56', 1),
(8, 9, 'storage/product9', '2pac-55ceaefb5dc6aa.png', '2019-05-26 17:57:42', '2019-05-26 17:57:42', NULL),
(9, 8, 'storage/product8', 'Affiche-55ceaefd82b6c8.jpg', '2019-05-26 17:58:16', '2019-05-26 17:58:16', NULL),
(10, 7, 'storage/product7', 'LODO2_afb3-55ceaefe81fa3d.jpg', '2019-05-26 17:58:32', '2019-05-26 17:58:32', NULL),
(11, 10, 'storage/product10', '2pac_biggie-55cec26613842e.png', '2019-05-27 16:03:13', '2019-05-27 16:03:13', NULL),
(12, 10, 'storage/product10', '2pac-55cec266168a18.png', '2019-05-27 16:03:13', '2019-05-27 16:03:13', NULL),
(13, 11, 'storage/product11', '2pac-55cec3e121fc2f.png', '2019-05-27 17:44:18', '2019-05-27 17:44:18', NULL),
(17, 1, 'storage/product1', 'Schermafbeelding 2019-05-27 om 20.33.07-55cee8ed6b20a9.png', '2019-05-29 11:53:26', '2019-05-29 11:53:26', NULL);

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
(3, '2019_04_27_132627_create_pages_table', 1),
(4, '2019_04_27_203352_create_category_table', 1),
(5, '2019_04_27_124405_create_product_table', 2),
(6, '2019_05_05_160704_add_intro_to_product', 3),
(7, '2019_05_05_170706_add_product_id_to_product', 3),
(8, '2019_05_06_101846_add_goal_to_product', 3),
(9, '2019_05_08_113345_add_credits_to_users_table', 4),
(10, '2019_05_15_112810_add_admin_to_users_table', 4),
(11, '2019_05_17_233600_create_article_table', 5),
(12, '2019_05_20_201627_create_image_table', 5),
(13, '2019_05_20_202339_create_spotlight_table', 5),
(14, '2019_05_20_203229_create_fundings_table', 5),
(15, '2019_05_20_203543_add_user_name_to_fundings', 6),
(16, '2019_05_21_182503_change_admin_in_users_table', 6),
(17, '2019_05_22_115533_add_checked_to_spotlight', 6),
(18, '2019_05_22_123636_create_comments_table', 6),
(19, '2019_05_22_155808_add_user_name_to_comments_table', 6),
(20, '2019_05_23_105607_add_user_id_to_image', 7),
(21, '2019_05_23_145038_add_foreign_key_to_image', 7),
(22, '2019_05_23_145425_change_product_id_in_image', 7),
(23, '2019_05_26_152955_add_deadline_to_product', 7),
(24, '2019_05_28_224700_change_user_id_in_fundings_table', 8),
(25, '2019_05_28_225028_create_fundings_table', 9),
(26, '2019_05_28_225228_add_user_name_to_fundings_table', 10),
(27, '2019_05_28_225741_create_products_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `image`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Home', '', '\r\nWelkom bij Down the Plan\r\nWelkom wij zijn een website die nieuwe kickstarters en entrepreneurs helpen hun ideeën en project voor te stellen aan de wereld. Bij Down The Plan kunnen deze kickstarters en entrepreneurs hun ideeën en projecten online plaatsen met de bedoeling om commentaar en feedback van de community te krijgen en zelfs fundings ontvangen van geïnteresseerde partijen', NULL, NULL),
(2, 'About', 'images/company.jpg', '\r\nWelkom wij zijn een website die nieuwe kickstarters en entrepreneurs helpen hun ideeën en project voor te stellen aan de wereld. Bij Down The Plan kunnen deze kickstarters en entrepreneurs hun ideeën en projecten online plaatsen met de bedoeling om commentaar en feedback van de community te krijgen en zelfs fundings ontvangen van geïnteresseerde partijen Ons team bestaat uit vrijwilligers van een in Gent gelegen multimedia bedrijf die de passie van de nieuwste uitvindingen wilt doorgeven en de mensen hun interesse wil wekken bij de nieuwste evenementen\r\nDown The Plan overleeft op het funding systeem waarbij wij 10% nemen als winst van deze 10% gaat de helft naar een goed doel dat iedere maand veranderd\r\n', NULL, NULL),
(3, 'Contact', '<h1 class=\"mt-5\">Contact</h1>', '', NULL, NULL),
(4, 'Policy', '', '<h1>Privacy Policy</h1>\r\n<p>Effective date: April 27, 2019</p>\r\n\r\n\r\n<p>We use your data to provide and improve the Service. By using the Service, you agree to the collection and use of information in accordance with this policy. Unless otherwise defined in this Privacy Policy, terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, accessible from 127.0.0.1:8000\r\n</p>\r\n\r\n\r\n<h2>Information Collection And Use</h2>\r\n\r\n<p>We collect several different types of information for various purposes to provide and improve our Service to you.</p>\r\n\r\n<h3>Types of Data Collected</h3>\r\n\r\n<h4>Personal Data</h4>\r\n\r\n<p>While using our Service, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you (“Personal Data”). Personally identifiable information may include, but is not limited to:</p>\r\n\r\n<ul>\r\n<li>Email address</li><li>First name and last name</li><li>Cookies and Usage Data</li>\r\n</ul>\r\n\r\n<h4>Usage Data</h4>\r\n\r\n<p>We may also collect information how the Service is accessed and used (“Usage Data”). This Usage Data may include information such as your computer’s Internet Protocol address (e.g. IP address), browser type, browser version, the pages of our Service that you visit, the time and date of your visit, the time spent on those pages, unique device identifiers and other diagnostic data.</p>\r\n\r\n<h4>Tracking & Cookies Data</h4>\r\n<p>We use cookies and similar tracking technologies to track the activity on our Service and hold certain information.</p>\r\n<p>Cookies are files with small amount of data which may include an anonymous unique identifier. Cookies are sent to your browser from a website and stored on your device. Tracking technologies also used are beacons, tags, and scripts to collect and track information and to improve and analyze our Service.</p>\r\n<p>You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use some portions of our Service.</p>\r\n<p>Examples of Cookies we use:</p>\r\n<ul>\r\n    <li><strong>Session Cookies.</strong> We use Session Cookies to operate our Service.</li>\r\n    <li><strong>Preference Cookies.</strong> We use Preference Cookies to remember your preferences and various settings.</li>\r\n    <li><strong>Security Cookies.</strong> We use Security Cookies for security purposes.</li>\r\n</ul>\r\n\r\n<h2>Use of Data</h2>\r\n    \r\n<p>Larvel Eindwerk uses the collected data for various purposes:</p>    \r\n<ul>\r\n    <li>To provide and maintain the Service</li>\r\n    <li>To notify you about changes to our Service</li>\r\n    <li>To allow you to participate in interactive features of our Service when you choose to do so</li>\r\n    <li>To provide customer care and support</li>\r\n    <li>To provide analysis or valuable information so that we can improve the Service</li>\r\n    <li>To monitor the usage of the Service</li>\r\n    <li>To detect, prevent and address technical issues</li>\r\n</ul>\r\n\r\n<h2>Transfer Of Data</h2>\r\n<p>Your information, including Personal Data, may be transferred to — and maintained on — computers located outside of your state, province, country or other governmental jurisdiction where the data protection laws may differ than those from your jurisdiction.</p>\r\n<p>If you are located outside Belgium and choose to provide information to us, please note that we transfer the data, including Personal Data, to Belgium and process it there.</p>\r\n<p>Your consent to this Privacy Policy followed by your submission of such information represents your agreement to that transfer.</p>\r\n<p>Larvel Eindwerk will take all steps reasonably necessary to ensure that your data is treated securely and in accordance with this Privacy Policy and no transfer of your Personal Data will take place to an organization or a country unless there are adequate controls in place including the security of your data and other personal information.</p>\r\n\r\n<h2>Disclosure Of Data</h2>\r\n\r\n<h3>Legal Requirements</h3>\r\n<p>Larvel Eindwerk may disclose your Personal Data in the good faith belief that such action is necessary to:</p>\r\n<ul>\r\n    <li>To comply with a legal obligation</li>\r\n    <li>To protect and defend the rights or property of Larvel Eindwerk</li>\r\n    <li>To prevent or investigate possible wrongdoing in connection with the Service</li>\r\n    <li>To protect the personal safety of users of the Service or the public</li>\r\n    <li>To protect against legal liability</li>\r\n</ul>\r\n\r\n<h2>Security Of Data</h2>\r\n<p>The security of your data is important to us, but remember that no method of transmission over the Internet, or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Data, we cannot guarantee its absolute security.</p>\r\n\r\n<h2>Service Providers</h2>\r\n<p>We may employ third party companies and individuals to facilitate our Service (“Service Providers”), to provide the Service on our behalf, to perform Service-related services or to assist us in analyzing how our Service is used.</p>\r\n<p>These third parties have access to your Personal Data only to perform these tasks on our behalf and are obligated not to disclose or use it for any other purpose.</p>\r\n\r\n\r\n\r\n<h2>Links To Other Sites</h2>\r\n<p>Our Service may contain links to other sites that are not operated by us. If you click on a third party link, you will be directed to that third party’s site. We strongly advise you to review the Privacy Policy of every site you visit.</p>\r\n<p>We have no control over and assume no responsibility for the content, privacy policies or practices of any third party sites or services.</p>\r\n\r\n\r\n<h2>Children’s Privacy</h2>\r\n<p>Our Service does not address anyone under the age of 18 (“Children”).</p>\r\n<p>We do not knowingly collect personally identifiable information from anyone under the age of 18. If you are a parent or guardian and you are aware that your Children has provided us with Personal Data, please contact us. If we become aware that we have collected Personal Data from children without verification of parental consent, we take steps to remove that information from our servers.</p>\r\n\r\n\r\n<h2>Changes To This Privacy Policy</h2>\r\n<p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.</p>\r\n<p>We will let you know via email and/or a prominent notice on our Service, prior to the change becoming effective and update the “effective date” at the top of this Privacy Policy.</p>\r\n<p>You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.</p>\r\n\r\n\r\n<h2>Contact Us</h2>\r\n<p>If you have any questions about this Privacy Policy, please contact us:</p>\r\n<ul>\r\n        <li>By email: owen.de.waele@hotmail.com</li>\r\n          \r\n        </ul>', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `naam` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `goal` decimal(8,2) NOT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `naam`, `intro`, `content`, `category_id`, `user_id`, `created_at`, `updated_at`, `product_id`, `goal`, `deadline`) VALUES
(1, 'test', 'testing 123', 'test', 3, 1, '2019-05-28 21:01:03', '2019-05-28 21:01:03', NULL, '5000.00', '2019-06-02'),
(2, 'hfgjklm', 'fjghklompio', 'jfghukjlm', 1, 2, '2019-05-29 12:01:11', '2019-05-29 12:01:11', NULL, '4000.00', '2019-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `spotlight`
--

CREATE TABLE `spotlight` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `imagePath` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `checked` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spotlight`
--

INSERT INTO `spotlight` (`id`, `product_id`, `imagePath`, `imageName`, `created_at`, `updated_at`, `checked`) VALUES
(3, 4, 'storage/product4', 'LODO2_afb7-55cead5f7cc28c.jpg', '2019-05-26 17:02:05', '2019-05-26 17:02:05', NULL),
(4, 9, 'storage/product9', '2pac-55ceaefb5dc6aa.png', '2019-05-26 17:57:43', '2019-05-26 17:57:43', NULL),
(5, 8, 'storage/product8', 'Affiche-55ceaefd82b6c8.jpg', '2019-05-26 17:58:17', '2019-05-26 17:58:17', NULL),
(6, 7, 'storage/product7', 'LODO2_afb3-55ceaefe81fa3d.jpg', '2019-05-26 17:58:33', '2019-05-26 17:58:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credits` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `credits`, `remember_token`, `created_at`, `updated_at`, `admin`) VALUES
(1, 'Steve De Waele', 'dewaelesteve@telenet.be', NULL, '$2y$10$YvVClfBRgcoETpNYVh7gu.WxVKDEMocwcbZVdMNnCmESur6P1/EFi', 9126, NULL, '2019-05-26 15:51:04', '2019-05-29 14:33:40', 'user'),
(2, 'Owen De Waele', 'owendewa@student.arteveldehs.be', NULL, '$2y$10$WKAAt6s/VqY/NJSd6T65ZOddqbkvRuQEz7Vu5CFV..pugtGX2OzUe', 4338, NULL, '2019-05-26 16:08:13', '2019-05-29 14:33:40', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_product_id_foreign` (`product_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `fundings`
--
ALTER TABLE `fundings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fundings_product_id_foreign` (`product_id`),
  ADD KEY `fundings_user_id_foreign` (`user_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_product_id_foreign` (`product_id`),
  ADD KEY `image_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_id_foreign` (`category_id`),
  ADD KEY `product_user_id_foreign` (`user_id`);

--
-- Indexes for table `spotlight`
--
ALTER TABLE `spotlight`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fundings`
--
ALTER TABLE `fundings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spotlight`
--
ALTER TABLE `spotlight`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fundings`
--
ALTER TABLE `fundings`
  ADD CONSTRAINT `fundings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fundings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `image_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
