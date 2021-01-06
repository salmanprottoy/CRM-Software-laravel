-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2021 at 06:35 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Mobile` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Name`, `Mobile`, `Email`, `Gender`, `Address`) VALUES
(4, 'Rabeya Ety', '021457544444757', 'ety@yahoo.com', 'Female', 'Dhaka'),
(5, 'sadek rayhan', '00424444454', 'rayhanmahi999@gmail.com', 'Male', 'Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `adminnotice`
--

CREATE TABLE `adminnotice` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `details` varchar(255) NOT NULL,
  `concerned_to` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminnotice`
--

INSERT INTO `adminnotice` (`id`, `title`, `details`, `concerned_to`, `date`) VALUES
(1, 'Meeting', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'All', '12/12/2022');

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

CREATE TABLE `adminuser` (
  `id` int(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`id`, `username`, `password`, `type`) VALUES
(1, 'rayhan', '1234', 'Super Admin'),
(4, 'wwww', 'efqln', 'Super Admin'),
(5, 'qqqqq', '1234', 'Manager'),
(6, 'wwwww', 'kfsc7', 'Super Admin'),
(7, 'sadek', '1234', 'Admin'),
(8, 'salman', 'a5qtz', 'Super Admin'),
(9, 'ety', '0g0ke', 'Super Admin'),
(10, 'rabeya', 'tsa2a', 'Admin'),
(11, 'salman123', '1234', 'Manager'),
(12, 'sadek123', 'egb14', 'Super Admin'),
(13, 'sadek999', 'avu1v', 'Admin'),
(14, 'sr', 'Chsr', 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `adminvalidator`
--

CREATE TABLE `adminvalidator` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminvalidator`
--

INSERT INTO `adminvalidator` (`id`, `username`, `password`) VALUES
(1, 'rayhan', '123'),
(2, 'ety', '123'),
(3, 'salman', '123'),
(4, 'belal', '123');

-- --------------------------------------------------------

--
-- Table structure for table `admin_pending_log`
--

CREATE TABLE `admin_pending_log` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Mobile` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `vote` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_pending_log`
--

INSERT INTO `admin_pending_log` (`id`, `pid`, `Name`, `Mobile`, `Email`, `Gender`, `Address`, `image`, `vote`) VALUES
(39, 49, 'Rayhan Mahi', '01996545978', 'rayhanmahi999@gmail.com', 'Male', 'Dhaka', 'assets/uploads/060121_04_55_15.png', 0),
(40, 50, 'Rabeya Ety', '01996545978', 'rayhanmahi999@gmail.com', 'Female', 'Sylhet', 'assets/uploads/060121_04_08_17.png', 0),
(41, 50, 'Rabeya Noaman ETY', '01996545978', 'rayhanmahi999@gmail.com', 'Female', 'Sylhet', 'assets/uploads/060121_04_08_17.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bankinfo`
--

CREATE TABLE `bankinfo` (
  `id` int(11) NOT NULL,
  `accountName` varchar(50) NOT NULL,
  `accountNumber` varchar(50) NOT NULL,
  `bankName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bankinfo`
--

INSERT INTO `bankinfo` (`id`, `accountName`, `accountNumber`, `bankName`) VALUES
(1, 'Fahim Mahmud', '1223454633', 'EBL'),
(2, 'Rayhan Mahi', '1222099884', 'DBBL');

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `id` int(11) NOT NULL,
  `buyerName` varchar(255) NOT NULL,
  `buyerAddress` varchar(255) NOT NULL,
  `buyerContactNumber` varchar(255) NOT NULL,
  `productCode` varchar(255) NOT NULL,
  `productQuantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE `campaign` (
  `offer` int(3) NOT NULL,
  `template` text NOT NULL,
  `audience` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`offer`, `template`, `audience`, `id`) VALUES
(20, 'all clothes 20% off', 'leads', 1),
(30, 'all shoes 20% off', 'potential', 2);

-- --------------------------------------------------------

--
-- Table structure for table `commentinfo`
--

CREATE TABLE `commentinfo` (
  `commentid` int(11) NOT NULL,
  `creatorid` varchar(20) NOT NULL,
  `commentdescription` varchar(300) NOT NULL,
  `postid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commentinfo`
--

INSERT INTO `commentinfo` (`commentid`, `creatorid`, `commentdescription`, `postid`) VALUES
(1, '18-36963-1', 'Hello sir!', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `coupon` varchar(255) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon`, `discount`) VALUES
(1, 'aaa', 15);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(15) NOT NULL,
  `customerName` varchar(30) NOT NULL,
  `customerContactNumber` varchar(20) NOT NULL,
  `customerAdress` varchar(50) NOT NULL,
  `customerEmail` varchar(50) NOT NULL,
  `customerStatus` varchar(10) NOT NULL,
  `customerGender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `eventinfo`
--

CREATE TABLE `eventinfo` (
  `eventid` int(11) NOT NULL,
  `eventname` varchar(100) NOT NULL,
  `eventdate` varchar(20) NOT NULL,
  `expiredate` varchar(20) NOT NULL,
  `eventdescription` varchar(300) NOT NULL,
  `eventstatus` int(11) NOT NULL,
  `audience` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventinfo`
--

INSERT INTO `eventinfo` (`eventid`, `eventname`, `eventdate`, `expiredate`, `eventdescription`, `eventstatus`, `audience`) VALUES
(2, '20% Discount going on!', '22/11/2020', '15/12/2020', 'Discount going on in table ', 1, ''),
(3, 'New year offers!', '28/12/2020', '31/01/2021', '50% cashback in this new in any product!', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `isSolved` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `username`, `comment`, `date`, `isSolved`) VALUES
(2, 'adf', 'aaaaasdfsdfdfhdghcxaaaasdfdfbbbbbbbbbbbxxccccccccx', '11/22/20', 'solved'),
(3, 'ety', 'mmmmmmmmmmmmmmmmmmmmmmmmmmmm', '22/11/2020', 'unsolved');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `status` text NOT NULL,
  `gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `name`, `email`, `phone`, `status`, `gender`) VALUES
(9, 'dipto ', 'dipto@gmail.com', '09090909090', 'normal', 'male'),
(10, 'soumya', 'soumya@gmail.com', '0909090909090909009', 'Potential', 'male');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_05_085513_add_social_login_field', 1),
(5, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(7, '2021_01_05_091803_create_sessions_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `noticeinfo`
--

CREATE TABLE `noticeinfo` (
  `noticeid` int(11) NOT NULL,
  `creatorid` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `noticedate` date NOT NULL,
  `expiredate` date NOT NULL,
  `noticestatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_employee` int(11) DEFAULT NULL,
  `mname` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_type` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `amount`, `address`, `status`, `transaction_id`, `currency`, `type`, `total_employee`, `mname`, `card_type`, `transaction_date`) VALUES
(6, 'Salman Express', 'salman@gmail.com', '0000000000000', 735, 'Dhaka', 'Processing', '5ff05bba526b3', 'BDT', 'Advance', 3434, 'salman', NULL, '2021-02-02 11:40:18'),
(7, 'dgdgrr', 'rayhanmahi999@gmail.com', '345344636', 735, 'dfgdbhdghdgh', 'Processing', '5ff05e9ceeb6a', 'BDT', 'Advance', 34534, 'ghjgh', NULL, '2021-01-02 11:52:32'),
(8, 'sdh', 'rayhanmahi123@gmail.com', '3453455555555555', 1000, 'ergdfjhj', 'Complete', '5ff0707e84e52', 'BDT', 'Enterprise', 454, 'eeee', NULL, '2021-01-02 13:08:38'),
(9, 'Rayhan Ent.', 'rayhanmahi123@gmail.com', '01996545978', 485, 'Dhaka', 'Complete', '5ff15a5b8bad4', 'BDT', 'Standard', 200, 'mahi', NULL, '2021-01-03 05:46:34'),
(10, 'Salman Express', 'rayhanmahi123@gmail.com', '000000000000', 500, 'sfgsdfgh', 'Complete', '5ff164bef366c', 'BDT', 'Standard', 345, 'rrr', NULL, '2021-01-03 06:31:05'),
(12, 'Salman Express', 'rayhanmahi999@gmail.com', '45645646', 750, 'dfghfdgh', 'Pending', '5ff16cebd7cf2', 'BDT', 'Advance', 345, 'hfhh', NULL, '2021-01-03 07:05:49'),
(13, 'sfs', 'rayhanmahi123@gmail.com', '444444444444444', 500, 'fgdfgsfg', 'Complete', '5ff179a478e36', 'BDT', 'Standard', 4444, 'dgdfg', NULL, '2021-01-03 08:00:22'),
(14, 'Rayhan Ent.', 'rayhanmahi123@gmail.com', '5555555555555555', 1000, 'sfgdfhdgh', 'Complete', '5ff17db8c87f9', 'BDT', 'Enterprise', 5555, 'gjkjk', NULL, '2021-01-03 08:17:47'),
(15, 'dfghfg', 'rayhanmahi123@gmail.com', '4544444444444', 1000, 'sdfgdfgdf', 'Complete', '5ff17e1f41364', 'BDT', 'Enterprise', 4440, 'werq', NULL, '2020-09-03 08:19:31'),
(16, 'asdas', 'rayhanmahi999@gmail.com', '666666666666', 1000, 'fhjghjhh', 'Complete', '5ff17e5e6cce3', 'BDT', 'Enterprise', 666664, 'sdf', NULL, '2020-09-03 08:20:32'),
(17, 'sfsd', 'rayhanmahi999@gmail.com', '4444444444444444', 500, 'dfgdghdh', 'Complete', '5ff18cb7a3461', 'BDT', 'Standard', 441, 'dfgd', NULL, '2021-01-03 09:21:48'),
(18, 'Rayhan Ent.', 'rayhanmahi999@gmail.com', '444444444444444', 500, 'ergdfgdfg', 'Complete', '5ff18d31db8e1', 'BDT', 'Standard', 4443, 'xvv', NULL, '2021-01-03 09:23:50'),
(19, 'Rayhan Ent.', 'salman1111@gmail.com', '23333333333333', 500, 'sfgdfgdf', 'Complete', '5ff18ebb31448', 'BDT', 'Standard', 3333, 'salman', NULL, '2021-01-03 09:30:12'),
(20, 'Salman Express', 'salman00@gmail.com', '333333333333', 500, 'sdfsdf', 'Complete', '5ff193e58b3ef', 'BDT', 'Standard', 33333, 'ghj', NULL, '2021-02-03 09:52:15'),
(21, 'sdfsdf', 'salman00@gmail.com', '444444444444', 500, 'sdfsdfgsfg', 'Complete', '5ff19446d97d4', 'BDT', 'Standard', 4444, 'hhh', NULL, '2021-02-03 09:53:49'),
(22, 'Salman Express', 'rayhanmahi123@gmail.com', '4444444444444', 750, 'dfgdfgdfg', 'Complete', '5ff1b1034f006', 'BDT', 'Advance', 33, 'sdf', NULL, '2021-03-03 11:56:34'),
(23, 'wertert', 'rayhanmahi123@gmail.com', '4344444444444', 750, 'sfgdhd', 'Complete', '5ff1b2132110d', 'BDT', 'Advance', 44442, 'sdf', NULL, '2021-03-03 12:01:11'),
(24, 'Basundhara', 'rayhanmahi123@gmail.com', '444444444444444', 750, 'sgdfgdfg', 'Complete', '5ff1b2a26d804', 'BDT', 'Advance', 4444, 'rgdf', NULL, '2021-01-03 12:03:34'),
(25, 'Basundhara', 'rayhanmahi123@gmail.com', '5555555555555', 750, 'fghfhfhj', 'Complete', '5ff1b3457f785', 'BDT', 'Advance', 5555, 'ad', NULL, '2021-01-03 12:06:13'),
(26, 'cvxfvdgh', 'rayhanmahi999@gmail.com', '88888888888888', 750, 'sdfhdsghg', 'Complete', '5ff1b44741fb5', 'BDT', 'Advance', 8888, 'dfg', NULL, '2021-01-03 12:10:30'),
(27, 'Basundhara', 'ey@yahoo.com', '4444444444444', 1000, 'sfdgsdfgdf', 'Complete', '5ff1b699bad68', 'BDT', 'Enterprise', 4444, 'add', NULL, '2021-01-03 12:20:27'),
(28, 'Salman Express', 'salman00@gmail.com', '333333333333333', 750, 'Dhaka', 'Complete', '5ff475e8336f4', 'BDT', 'Advance', 333, 'salman', NULL, '2021-01-05 14:21:01');

-- --------------------------------------------------------

--
-- Table structure for table `ordersssss`
--

CREATE TABLE `ordersssss` (
  `id` int(11) NOT NULL,
  `cname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_employee` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mname` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_type` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tran_date` datetime DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ordersssss`
--

INSERT INTO `ordersssss` (`id`, `cname`, `email`, `phone`, `amount`, `address`, `type`, `total_employee`, `mname`, `card_type`, `tran_date`, `status`, `transaction_id`, `currency`) VALUES
(8, 'Rayhan Ent.', 'rayhanmahi999@gmail.com', '01996545978', 750, 'Dhaka', 'Advance', '300', 'Rayhan', NULL, NULL, 'Pending', '5ff02a76097c3', 'BDT'),
(9, 'Rayhan Ent.', 'rayhanmahi123@gmail.com', '01996545978', 750, 'Dhaka', 'Advance', '222', 'rayhan', NULL, NULL, 'Pending', '5ff02bc446172', 'BDT'),
(10, 'sdaf', 'rayhanmahi999@gmail.com', '2354234', 750, 'asdfa', 'Advance', '232', 'fddf', NULL, NULL, 'Pending', '5ff02c87656ce', 'BDT'),
(11, 'afdaf', 'rayhanmahi123@gmail.com', '234545', 750, 'asdfsdfs', 'Advance', '45642', 'dsfsd', NULL, NULL, 'Pending', '5ff02ca5c9db7', 'BDT'),
(12, 'sdgvf', 'rayhanmahi123@gmail.com', '34563464', 750, 'dfgdfg', 'Advance', '34', 'dfg', NULL, NULL, 'Pending', '5ff02db263b77', 'BDT'),
(13, 'sdgfsd', 'ey@yahoo.com', '435345', 750, 'sfgdfgdf', 'Advance', '345', 'vffv', NULL, NULL, 'Pending', '5ff02dddeb218', 'BDT'),
(14, 'sdfs', 'rayhanmahi123@gmail.com', '43564356', 750, 'sfgdfdgh', 'Advance', '345', 'sfgd', NULL, NULL, 'Pending', '5ff02e0e6491d', 'BDT'),
(15, 'sdfsdf', 'rayhanmahi999@gmail.com', '345345', 750, 'sdgsfgsfg', 'Advance', '452', 'sdfg', NULL, NULL, 'Pending', '5ff02e28c2713', 'BDT'),
(16, 'sdfsdf', 'rayhanmahi999@gmail.com', '345345', 750, 'sdgsfgsfg', 'Advance', '452', 'sdfg', NULL, NULL, 'Pending', '5ff03224d7ac0', 'BDT'),
(17, 'sdf', 'rayhanmahi999@gmail.com', '2345235', 750, 'sdgsdgf', 'Advance', '345', 'dfg', NULL, NULL, 'Pending', '5ff035b0099b1', 'BDT');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `postinfo`
--

CREATE TABLE `postinfo` (
  `postid` int(11) NOT NULL,
  `creatorid` varchar(20) NOT NULL,
  `postdescription` varchar(300) NOT NULL,
  `postdate` varchar(20) NOT NULL,
  `postaprovalstatus` int(11) DEFAULT NULL,
  `filepath` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postinfo`
--

INSERT INTO `postinfo` (`postid`, `creatorid`, `postdescription`, `postdate`, `postaprovalstatus`, `filepath`) VALUES
(7, '18-36963-1', 'Photo', '2020-11-22', 0, 'IMG-20201114-WA0000.jpg'),
(8, '18-36963-1', 'helllo', '2020-11-22', 0, 'IMG-20201114-WA0000.jpg'),
(9, '18-36963-1', 'dfhgj', '2020-11-22', 0, 'IMG-20201114-WA0000.jpg'),
(10, '18-36963-1', 'ghjkuyoiupo', '2020-11-23', 0, 'IMG-20201114-WA0000.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(15) NOT NULL,
  `productCode` varchar(50) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productVendor` varchar(255) DEFAULT NULL,
  `quantityInStock` int(255) NOT NULL,
  `buyPrice` float NOT NULL,
  `sellPrice` float NOT NULL,
  `productDescription` varchar(255) DEFAULT NULL,
  `productImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `productCode`, `productName`, `productVendor`, `quantityInStock`, `buyPrice`, `sellPrice`, `productDescription`, `productImage`) VALUES
(1, '101', 'PRAN Pasteurized Milk', 'PRAN Group', 12, 65, 70, '500ml', 'undefined'),
(2, '102', 'PRAN Pasteurized Milk', 'PRAN GROUP', 15, 68, 74, '', ''),
(3, '104', 'PRAN UTH Milk', 'PRAN Group', 12, 67, 71, '', ''),
(6, '200', 'PRAN UTH Milk 3', 'PRAN GROUP', 111, 67, 78, '', ''),
(7, '110', 'PRAN Milk Candy', 'PRAN GROUP', 200, 1.2, 3, '', 'undefined'),
(8, '220', 'PRAN Pasteurized Milk', 'PRAN GROUP', 200, 67, 74, '1L', 'undefined');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `company_name`, `amount`, `date`) VALUES
(1, 'dfhghjgj', 100, '2020-11-25 02:29:15'),
(2, 'mmmm', 150, '2020-11-25 02:29:15'),
(3, 'asd', 100, '2020-11-19 02:30:28'),
(4, 'sdfsd', 150, '2020-08-12 02:32:05'),
(5, 'qqqqqqq', 100, '2020-11-25 14:32:36'),
(6, 'xyz Limited', 250, '2020-11-25 14:35:46'),
(7, 'rthdf', 250, '2021-05-13 15:47:15'),
(8, 'fghnfh', 100, '2020-04-23 15:47:39'),
(9, 'bvvbvn', 150, '2019-12-16 15:47:54'),
(10, 'jkhj', 250, '2019-11-12 15:47:54'),
(11, 'abcde', 150, '2020-11-25 18:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(50) NOT NULL,
  `employeeId` int(50) NOT NULL,
  `salaryGrade` int(50) NOT NULL,
  `salaryMin` float NOT NULL,
  `salaryMax` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `employeeId`, `salaryGrade`, `salaryMin`, `salaryMax`) VALUES
(1, 101, 7, 35000, 40000),
(2, 102, 8, 45000, 50000),
(3, 103, 7, 35000, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8QiSRlMq7vT12mAZejMpuOPcHuUFWEFVn0FqU3tt', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:84.0) Gecko/20100101 Firefox/84.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiQTVIVXZrNEc2aWxRZjhtQUxBR3FBMGlNUUVmck16NnNUbGR5RmNpSyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9zdXBlckFkbWluX2hvbWUvYWRtaW5fbGlzdC9lZGl0LzQ3Ijt9czo4OiJ1c2VybmFtZSI7czo2OiJyYXloYW4iO3M6NDoidHlwZSI7czoxMToiU3VwZXIgQWRtaW4iO3M6NToiaW1hZ2UiO3M6MzQ6ImFzc2V0cy91cGxvYWRzLzAzMDEyMV8wNl8xM18wNS5wbmciO30=', 1609905510),
('bEEThU3h05TQu1lGaHZThGo4HzwplInomMYnDAUR', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:84.0) Gecko/20100101 Firefox/84.0', 'YTo2OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0ODoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL3N1cGVyQWRtaW5faG9tZS9hZG1pbl9saXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6IlFrVmFERmNMQUFIaGZTR2dQR2Jad0N0bkhoSm45WFM5TXRoWmFTTFYiO3M6ODoidXNlcm5hbWUiO3M6MjM6InJheWhhbm1haGk5OTlAZ21haWwuY29tIjtzOjQ6InR5cGUiO3M6MTE6IlN1cGVyIEFkbWluIjtzOjU6ImltYWdlIjtzOjE3NjoiaHR0cHM6Ly9tZWRpYS1leHAxLmxpY2RuLmNvbS9kbXMvaW1hZ2UvQzU2MDNBUUZ6M0UtM0J5RFVtdy9wcm9maWxlLWRpc3BsYXlwaG90by1zaHJpbmtfMTAwXzEwMC8wLzE2MDkzMDU4ODc2MTc/ZT0xNjE1NDIwODAwJnY9YmV0YSZ0PTJ6aVFDajIyc0dBcV81dUVVVk9GcHVnQ1lTazJaWjhvS0Zsa2RxMkkzUkUiO30=', 1609883904),
('mx46ncTpLaguyMa8v71S9ggDOyyP4UWfakWDLPEx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:84.0) Gecko/20100101 Firefox/84.0', 'YTo2OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0ODoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL3N1cGVyQWRtaW5faG9tZS9hZG1pbl9saXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6Ill2em9HS2JHZTZqSXY3bzFXRFYwY21zcEU3OHVPNG11VnhTSEExSUgiO3M6ODoidXNlcm5hbWUiO3M6NjoicmF5aGFuIjtzOjQ6InR5cGUiO3M6MTE6IlN1cGVyIEFkbWluIjtzOjU6ImltYWdlIjtzOjM0OiJhc3NldHMvdXBsb2Fkcy8wMzAxMjFfMDZfMTNfMDUucG5nIjt9', 1609910502);

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `id` int(11) NOT NULL,
  `Subscription_Type` varchar(255) NOT NULL,
  `Company_Name` varchar(255) NOT NULL,
  `Company_Email` varchar(255) NOT NULL,
  `Contact_No` varchar(255) NOT NULL,
  `Company_Address` varchar(255) NOT NULL,
  `Manager_Name` varchar(255) NOT NULL,
  `Company_logo` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`id`, `Subscription_Type`, `Company_Name`, `Company_Email`, `Contact_No`, `Company_Address`, `Manager_Name`, `Company_logo`, `status`) VALUES
(2, 'Advan', 'srtgs', 'ab@g.com', '254325', 'sdgdfsg', 'dhjgk', '', 'unblock'),
(3, 'Advan', 'srtgs', 'ab@g.com', '254325', 'sdgdfsg', 'dhjgk', '', 'block'),
(6, 'sfsfv', 'sdvxscv', 'sfvsdfs', '45345345', 'dfgdfbvc', 'cnvn', '', ''),
(7, 'Advan', 'spaceX', 'rayhanmahi999@gmail.com', '0111111111111111', '262.ibrahimpur,Dhaka', 'Sadek Rayhan', '', ''),
(8, 'asd', 'asdfdf', 'rayhanmahi999@gmail.com', '4563453', 'xfbcgncbjnmjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 'sdfsdf', '', ''),
(9, 'Stand', 'dfhghjgj', 'rayhanmahi999@gmail.com', '23456456', 'fffffffffffffffffffffffffffffffffffffffffffff', 'qqqq', '', ''),
(10, 'Advan', 'mmmm', 'ab@gasd.com', '245785752', 'asdadfsdfgf', 'abcd', '', ''),
(11, 'Stand', 'qqqqqqq', 'ab@gsdfsd.com', '44444444444438', 'eeeeeeeeeeeeeeeeee', 'aaaa', '', ''),
(12, 'Enter', 'xyz Limited', 'rayhanmahi123@gmail.com', '01996545978', 'Dhaka', 'Mahirayhan', '', ''),
(13, 'Advan', 'abcde', 'salman@gmail.com', '0126456545', 'Chattogram', 'salman', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `supadmin`
--

CREATE TABLE `supadmin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Mobile` varchar(255) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `Gender` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `provider_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supadmin`
--

INSERT INTO `supadmin` (`id`, `username`, `password`, `type`, `Name`, `Mobile`, `Email`, `Gender`, `Address`, `image`, `provider_id`) VALUES
(33, 'rayhan', '123', 'Super Admin', 'Salman', '01996545978', 'salman@gmail.com', 'Female', 'Chottogram', 'assets/uploads/030121_06_13_05.png', ''),
(34, 'sr', 'X6Jm', 'Super Admin', 'Salman', '01996545978', 'salman@gmail.com', 'Female', 'Chottogram', 'assets/uploads/281220_15_40_16.png', ''),
(46, 'belal', 'dkOy', 'Super Admin', 'Belal', '01996545978', 'belal@gmil.com', 'Male', 'Chottogram', 'assets/uploads/030121_06_11_04.png', ''),
(47, 'belala', 'Qvsw', 'Admin', 'Belal', '01996545978', 'belal@gmil.com', 'Male', 'Chottogram', 'assets/uploads/030121_06_13_05.png', ''),
(48, 'rayhanmahi999@gmail.com', '', 'Super Admin', 'Rayhan Mahi', NULL, 'rayhanmahi999@gmail.com', NULL, NULL, 'https://media-exp1.licdn.com/dms/image/C5603AQFz3E-3ByDUmw/profile-displayphoto-shrink_100_100/0/1609305887617?e=1615420800&v=beta&t=2ziQCj22sGAq_5uEUVOFpugCYSk2ZZ8oKFlkdq2I3RE', 'h0GmE3OTHu'),
(49, 'mahi', 'psim', 'Admin', 'Rayhan Mahi', '01996545978', 'rayhanmahi999@gmail.com', 'Male', 'Dhaka', 'assets/uploads/060121_04_55_15.png', NULL),
(50, 'ety', 'D5Gx', 'Admin', 'Rabeya Noaman ETY', '01996545978', 'rayhanmahi999@gmail.com', 'Female', 'Sylhet', 'assets/uploads/060121_04_08_17.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `designation` varchar(20) DEFAULT NULL,
  `contactNumber` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `salary` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `type`, `designation`, `contactNumber`, `email`, `salary`) VALUES
(3, 'sadek', '1234', 'Manager', '', '', '', ''),
(4, 'salman123', '1234', 'Manager', '', '', '', ''),
(5, 'user5', '123', 'Manager', NULL, NULL, NULL, NULL),
(6, 'qqqq', '123', 'Manager', NULL, NULL, NULL, NULL),
(7, 'aaaaa', '123', 'Manager', NULL, NULL, NULL, NULL),
(8, 'aaaaaaaaaaaaaa', '123', 'Manager', NULL, NULL, NULL, NULL),
(9, 'aaaaaaaaaaa', '123', 'Manager', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `social_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `verifiysubscriber`
--

CREATE TABLE `verifiysubscriber` (
  `id` int(11) NOT NULL,
  `Subscription_Type` varchar(5) NOT NULL,
  `Company_Name` varchar(255) NOT NULL,
  `Company_Email` varchar(255) NOT NULL,
  `Contact_No` varchar(25) NOT NULL,
  `Total_Employee` int(10) NOT NULL,
  `Company_Address` varchar(255) NOT NULL,
  `Manager_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verifiysubscriber`
--

INSERT INTO `verifiysubscriber` (`id`, `Subscription_Type`, `Company_Name`, `Company_Email`, `Contact_No`, `Total_Employee`, `Company_Address`, `Manager_Name`) VALUES
(12, 'Stand', 'Belal Enterprise', 'belal@gmail.com', '0154544524587', 500, 'Khulna', 'Belal'),
(13, 'Advan', 'Ety enterprise', 'ey@yahoo.com', '01548676845', 2000, 'Dhaka', 'Rabeya Ety'),
(14, 'Advan', 'Salman Express', 'salman@gmail.com', '021548452486', 200, 'Dhaka', 'Salman Khan'),
(15, 'Advan', 'mahi rayhan', 'ab@gasd.com', '45454545', 20, 'dhaka', 'Mahirayhan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminnotice`
--
ALTER TABLE `adminnotice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminuser`
--
ALTER TABLE `adminuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminvalidator`
--
ALTER TABLE `adminvalidator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_pending_log`
--
ALTER TABLE `admin_pending_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bankinfo`
--
ALTER TABLE `bankinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commentinfo`
--
ALTER TABLE `commentinfo`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventinfo`
--
ALTER TABLE `eventinfo`
  ADD PRIMARY KEY (`eventid`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordersssss`
--
ALTER TABLE `ordersssss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `postinfo`
--
ALTER TABLE `postinfo`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supadmin`
--
ALTER TABLE `supadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `verifiysubscriber`
--
ALTER TABLE `verifiysubscriber`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `adminnotice`
--
ALTER TABLE `adminnotice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `adminvalidator`
--
ALTER TABLE `adminvalidator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_pending_log`
--
ALTER TABLE `admin_pending_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `bankinfo`
--
ALTER TABLE `bankinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `campaign`
--
ALTER TABLE `campaign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `commentinfo`
--
ALTER TABLE `commentinfo`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eventinfo`
--
ALTER TABLE `eventinfo`
  MODIFY `eventid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `ordersssss`
--
ALTER TABLE `ordersssss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postinfo`
--
ALTER TABLE `postinfo`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `supadmin`
--
ALTER TABLE `supadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `verifiysubscriber`
--
ALTER TABLE `verifiysubscriber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
