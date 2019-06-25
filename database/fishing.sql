-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2019 at 09:31 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fishing`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookfishingplace`
--

CREATE TABLE `bookfishingplace` (
  `ID` int(10) NOT NULL,
  `OrderID` int(10) NOT NULL,
  `fishingPlaceID` int(10) NOT NULL,
  `SeatNo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `buyproduct`
--

CREATE TABLE `buyproduct` (
  `ID` int(10) NOT NULL,
  `OrderID` int(10) NOT NULL,
  `ProductID` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `buyproduct`
--

INSERT INTO `buyproduct` (`ID`, `OrderID`, `ProductID`, `quantity`) VALUES
(1, 1, 11, 1),
(2, 2, 9, 1),
(3, 2, 1, 1),
(4, 2, 41, 1),
(5, 3, 1, 1),
(7, 3, 9, 1),
(8, 3, 19, 1),
(9, 3, 38, 1),
(10, 4, 10, 1),
(11, 4, 21, 1),
(12, 4, 25, 1),
(13, 4, 35, 1),
(14, 4, 45, 1),
(15, 4, 46, 1),
(16, 4, 40, 1),
(17, 4, 58, 1),
(18, 4, 57, 1),
(19, 5, 16, 3),
(20, 5, 4, 2),
(21, 5, 23, 4),
(22, 5, 18, 3),
(23, 5, 24, 2),
(24, 5, 37, 5),
(25, 5, 48, 10),
(26, 5, 38, 5),
(27, 6, 4, 1),
(28, 6, 1, 1),
(29, 7, 1, 1),
(30, 8, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(10) NOT NULL,
  `productID` int(10) NOT NULL,
  `hireId` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `qty` int(11) NOT NULL,
  `days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ID`, `productID`, `hireId`, `userID`, `qty`, `days`) VALUES
(1, 2, 1, 6, 1, 1),
(3, 8, 1, 5, 1, 1),
(41, 4, 1, 9, 1, 1),
(42, 1, 0, 4, 1, 1),
(43, 2, 1, 4, 1, 6),
(44, 2, 0, 4, 2, 1),
(46, 4, 1, 4, 1, 1),
(47, 4, 0, 4, 1, 1),
(48, 17, 1, 4, 1, 5),
(49, 2, 1, 8, 6, 8),
(50, 10, 0, 8, 9, 0),
(51, 8, 0, 8, 1, 0),
(52, 16, 1, 8, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `ID` int(10) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`ID`, `name`) VALUES
(1, 'Rods'),
(2, 'Fishing Line'),
(3, 'Lures & Flies'),
(5, 'Reel/ Wheel'),
(7, 'Hooks'),
(8, 'Baits And Tackle'),
(9, 'Snaps And Swivels'),
(10, 'Net'),
(11, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `customer_ticket`
--

CREATE TABLE `customer_ticket` (
  `ID` int(10) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `fishingPlaceID` int(10) NOT NULL,
  `ticket_type` int(11) DEFAULT NULL,
  `userID` int(10) DEFAULT NULL,
  `role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `customer_ticket`
--

INSERT INTO `customer_ticket` (`ID`, `order_id`, `fishingPlaceID`, `ticket_type`, `userID`, `role`) VALUES
(6, 9, 2, 2, 4, 1),
(7, 9, 2, 2, 4, 1),
(8, 13, 2, 2, 8, 1),
(9, 13, 2, 2, 8, 1),
(21, NULL, 4, NULL, NULL, 0),
(22, NULL, 4, NULL, NULL, 0),
(23, NULL, 4, NULL, NULL, 0),
(24, NULL, 4, NULL, NULL, 0),
(25, NULL, 4, NULL, NULL, 0),
(26, NULL, 4, NULL, NULL, 0),
(27, NULL, 4, NULL, NULL, 0),
(28, NULL, 4, NULL, NULL, 0),
(29, NULL, 4, NULL, NULL, 0),
(30, NULL, 4, NULL, NULL, 0),
(31, NULL, 4, NULL, NULL, 0),
(32, NULL, 4, NULL, NULL, 0),
(33, NULL, 4, NULL, NULL, 0),
(34, NULL, 4, NULL, NULL, 0),
(35, NULL, 4, NULL, NULL, 0),
(36, NULL, 4, NULL, NULL, 0),
(37, NULL, 4, NULL, NULL, 0),
(38, NULL, 4, NULL, NULL, 0),
(39, NULL, 4, NULL, NULL, 0),
(40, NULL, 4, NULL, NULL, 0),
(41, NULL, 4, NULL, NULL, 0),
(42, NULL, 4, NULL, NULL, 0),
(43, NULL, 4, NULL, NULL, 0),
(44, NULL, 4, NULL, NULL, 0),
(45, NULL, 4, NULL, NULL, 0),
(46, NULL, 4, NULL, NULL, 0),
(47, NULL, 4, NULL, NULL, 0),
(48, NULL, 4, NULL, NULL, 0),
(49, NULL, 4, NULL, NULL, 0),
(50, NULL, 4, NULL, NULL, 0),
(51, NULL, 4, NULL, NULL, 0),
(52, NULL, 4, NULL, NULL, 0),
(53, NULL, 4, NULL, NULL, 0),
(54, NULL, 4, NULL, NULL, 0),
(55, NULL, 4, NULL, NULL, 0),
(56, NULL, 4, NULL, NULL, 0),
(57, NULL, 4, NULL, NULL, 0),
(58, NULL, 4, NULL, NULL, 0),
(59, NULL, 4, NULL, NULL, 0),
(60, NULL, 4, NULL, NULL, 0),
(61, NULL, 4, NULL, NULL, 0),
(62, NULL, 4, NULL, NULL, 0),
(63, NULL, 4, NULL, NULL, 0),
(64, NULL, 4, NULL, NULL, 0),
(65, NULL, 4, NULL, NULL, 0),
(66, NULL, 4, NULL, NULL, 0),
(67, NULL, 4, NULL, NULL, 0),
(68, NULL, 4, NULL, NULL, 0),
(69, NULL, 4, NULL, NULL, 0),
(70, NULL, 4, NULL, NULL, 0),
(71, NULL, 5, NULL, NULL, 0),
(72, NULL, 5, NULL, NULL, 0),
(73, NULL, 5, NULL, NULL, 0),
(74, NULL, 5, NULL, NULL, 0),
(75, NULL, 5, NULL, NULL, 0),
(76, NULL, 5, NULL, NULL, 0),
(77, NULL, 5, NULL, NULL, 0),
(78, NULL, 5, NULL, NULL, 0),
(79, NULL, 5, NULL, NULL, 0),
(80, NULL, 5, NULL, NULL, 0),
(81, NULL, 5, NULL, NULL, 0),
(82, NULL, 5, NULL, NULL, 0),
(83, NULL, 5, NULL, NULL, 0),
(84, NULL, 5, NULL, NULL, 0),
(85, NULL, 5, NULL, NULL, 0),
(86, NULL, 5, NULL, NULL, 0),
(87, NULL, 5, NULL, NULL, 0),
(88, NULL, 5, NULL, NULL, 0),
(89, NULL, 5, NULL, NULL, 0),
(90, NULL, 5, NULL, NULL, 0),
(91, NULL, 6, NULL, NULL, 0),
(92, NULL, 6, NULL, NULL, 0),
(93, NULL, 6, NULL, NULL, 0),
(94, NULL, 6, NULL, NULL, 0),
(95, NULL, 6, NULL, NULL, 0),
(96, NULL, 6, NULL, NULL, 0),
(97, NULL, 6, NULL, NULL, 0),
(98, NULL, 6, NULL, NULL, 0),
(99, NULL, 6, NULL, NULL, 0),
(100, NULL, 6, NULL, NULL, 0),
(101, NULL, 6, NULL, NULL, 0),
(102, NULL, 6, NULL, NULL, 0),
(103, NULL, 6, NULL, NULL, 0),
(104, NULL, 6, NULL, NULL, 0),
(105, NULL, 6, NULL, NULL, 0),
(106, NULL, 6, NULL, NULL, 0),
(107, NULL, 6, NULL, NULL, 0),
(108, NULL, 6, NULL, NULL, 0),
(109, NULL, 6, NULL, NULL, 0),
(110, NULL, 6, NULL, NULL, 0),
(111, NULL, 6, NULL, NULL, 0),
(112, NULL, 6, NULL, NULL, 0),
(113, NULL, 6, NULL, NULL, 0),
(114, NULL, 6, NULL, NULL, 0),
(115, NULL, 6, NULL, NULL, 0),
(116, NULL, 6, NULL, NULL, 0),
(117, NULL, 6, NULL, NULL, 0),
(118, NULL, 6, NULL, NULL, 0),
(119, NULL, 6, NULL, NULL, 0),
(120, NULL, 6, NULL, NULL, 0),
(121, NULL, 6, NULL, NULL, 0),
(122, NULL, 6, NULL, NULL, 0),
(123, NULL, 6, NULL, NULL, 0),
(124, NULL, 6, NULL, NULL, 0),
(125, NULL, 6, NULL, NULL, 0),
(126, NULL, 6, NULL, NULL, 0),
(127, NULL, 6, NULL, NULL, 0),
(128, NULL, 6, NULL, NULL, 0),
(129, NULL, 6, NULL, NULL, 0),
(130, NULL, 6, NULL, NULL, 0),
(131, NULL, 6, NULL, NULL, 0),
(132, NULL, 6, NULL, NULL, 0),
(133, NULL, 6, NULL, NULL, 0),
(134, NULL, 6, NULL, NULL, 0),
(135, NULL, 6, NULL, NULL, 0),
(136, NULL, 6, NULL, NULL, 0),
(137, NULL, 6, NULL, NULL, 0),
(138, NULL, 6, NULL, NULL, 0),
(139, NULL, 6, NULL, NULL, 0),
(140, NULL, 6, NULL, NULL, 0),
(141, NULL, 6, NULL, NULL, 0),
(142, NULL, 6, NULL, NULL, 0),
(143, NULL, 6, NULL, NULL, 0),
(144, NULL, 6, NULL, NULL, 0),
(145, NULL, 6, NULL, NULL, 0),
(146, NULL, 6, NULL, NULL, 0),
(147, NULL, 6, NULL, NULL, 0),
(148, NULL, 6, NULL, NULL, 0),
(149, NULL, 6, NULL, NULL, 0),
(150, NULL, 6, NULL, NULL, 0),
(151, NULL, 6, NULL, NULL, 0),
(152, NULL, 6, NULL, NULL, 0),
(153, NULL, 6, NULL, NULL, 0),
(154, NULL, 6, NULL, NULL, 0),
(155, NULL, 6, NULL, NULL, 0),
(156, NULL, 6, NULL, NULL, 0),
(157, NULL, 6, NULL, NULL, 0),
(158, NULL, 6, NULL, NULL, 0),
(159, NULL, 6, NULL, NULL, 0),
(160, NULL, 6, NULL, NULL, 0),
(161, NULL, 6, NULL, NULL, 0),
(162, NULL, 6, NULL, NULL, 0),
(163, NULL, 6, NULL, NULL, 0),
(164, NULL, 6, NULL, NULL, 0),
(165, NULL, 6, NULL, NULL, 0),
(166, NULL, 6, NULL, NULL, 0),
(167, NULL, 6, NULL, NULL, 0),
(168, NULL, 6, NULL, NULL, 0),
(169, NULL, 6, NULL, NULL, 0),
(170, NULL, 6, NULL, NULL, 0),
(171, NULL, 6, NULL, NULL, 0),
(172, NULL, 6, NULL, NULL, 0),
(173, NULL, 6, NULL, NULL, 0),
(174, NULL, 6, NULL, NULL, 0),
(175, NULL, 6, NULL, NULL, 0),
(176, NULL, 6, NULL, NULL, 0),
(177, 14, 7, 1, 5, 1),
(178, NULL, 7, NULL, 7, 0),
(179, NULL, 7, NULL, 7, 0),
(180, NULL, 7, NULL, 7, 0),
(181, NULL, 7, NULL, 7, 0),
(182, NULL, 7, NULL, 7, 0),
(183, NULL, 7, NULL, 7, 0),
(184, NULL, 7, NULL, 7, 0),
(185, NULL, 7, NULL, 7, 0),
(186, NULL, 7, NULL, 7, 0),
(187, NULL, 7, NULL, NULL, 0),
(188, NULL, 7, NULL, NULL, 0),
(189, NULL, 7, NULL, NULL, 0),
(190, NULL, 7, NULL, NULL, 0),
(191, NULL, 7, NULL, NULL, 0),
(192, NULL, 7, NULL, NULL, 0),
(193, NULL, 7, NULL, NULL, 0),
(194, NULL, 7, NULL, NULL, 0),
(195, NULL, 7, NULL, NULL, 0),
(196, NULL, 7, NULL, NULL, 0),
(197, NULL, 7, NULL, NULL, 0),
(198, NULL, 7, NULL, NULL, 0),
(199, NULL, 7, NULL, NULL, 0),
(200, NULL, 7, NULL, NULL, 0),
(201, NULL, 7, NULL, NULL, 0),
(202, NULL, 7, NULL, NULL, 0),
(203, NULL, 7, NULL, NULL, 0),
(204, NULL, 7, NULL, NULL, 0),
(205, NULL, 7, NULL, NULL, 0),
(206, NULL, 7, NULL, NULL, 0),
(207, NULL, 7, NULL, NULL, 0),
(208, NULL, 7, NULL, NULL, 0),
(209, NULL, 7, NULL, NULL, 0),
(210, NULL, 7, NULL, NULL, 0),
(211, NULL, 7, NULL, NULL, 0),
(212, NULL, 8, NULL, NULL, 0),
(213, NULL, 8, NULL, NULL, 0),
(214, NULL, 8, NULL, NULL, 0),
(215, NULL, 8, NULL, NULL, 0),
(216, NULL, 8, NULL, NULL, 0),
(217, NULL, 8, NULL, NULL, 0),
(218, NULL, 8, NULL, NULL, 0),
(219, NULL, 8, NULL, NULL, 0),
(220, NULL, 8, NULL, NULL, 0),
(221, NULL, 8, NULL, NULL, 0),
(222, NULL, 8, NULL, NULL, 0),
(223, NULL, 8, NULL, NULL, 0),
(224, NULL, 8, NULL, NULL, 0),
(225, NULL, 8, NULL, NULL, 0),
(226, NULL, 8, NULL, NULL, 0),
(227, NULL, 8, NULL, NULL, 0),
(228, NULL, 8, NULL, NULL, 0),
(229, NULL, 8, NULL, NULL, 0),
(230, NULL, 8, NULL, NULL, 0),
(231, NULL, 8, NULL, NULL, 0),
(232, NULL, 8, NULL, NULL, 0),
(233, NULL, 8, NULL, NULL, 0),
(234, NULL, 8, NULL, NULL, 0),
(235, NULL, 8, NULL, NULL, 0),
(236, NULL, 8, NULL, NULL, 0),
(237, NULL, 8, NULL, NULL, 0),
(238, NULL, 8, NULL, NULL, 0),
(239, NULL, 8, NULL, NULL, 0),
(240, NULL, 8, NULL, NULL, 0),
(241, NULL, 8, NULL, NULL, 0),
(242, NULL, 8, NULL, NULL, 0),
(243, NULL, 8, NULL, NULL, 0),
(244, NULL, 8, NULL, NULL, 0),
(245, NULL, 8, NULL, NULL, 0),
(246, NULL, 8, NULL, NULL, 0),
(247, NULL, 8, NULL, NULL, 0),
(248, NULL, 8, NULL, NULL, 0),
(249, NULL, 8, NULL, NULL, 0),
(250, NULL, 8, NULL, NULL, 0),
(251, NULL, 8, NULL, NULL, 0),
(252, NULL, 8, NULL, NULL, 0),
(253, NULL, 8, NULL, NULL, 0),
(254, NULL, 8, NULL, NULL, 0),
(255, NULL, 8, NULL, NULL, 0),
(256, NULL, 8, NULL, NULL, 0),
(257, NULL, 8, NULL, NULL, 0),
(258, NULL, 8, NULL, NULL, 0),
(259, NULL, 8, NULL, NULL, 0),
(260, NULL, 8, NULL, NULL, 0),
(261, NULL, 8, NULL, NULL, 0),
(262, NULL, 8, NULL, NULL, 0),
(263, NULL, 8, NULL, NULL, 0),
(264, NULL, 8, NULL, NULL, 0),
(265, NULL, 8, NULL, NULL, 0),
(266, NULL, 8, NULL, NULL, 0),
(267, NULL, 8, NULL, NULL, 0),
(268, NULL, 8, NULL, NULL, 0),
(269, NULL, 8, NULL, NULL, 0),
(270, NULL, 8, NULL, NULL, 0),
(271, NULL, 8, NULL, NULL, 0),
(272, NULL, 8, NULL, NULL, 0),
(273, NULL, 8, NULL, NULL, 0),
(274, NULL, 8, NULL, NULL, 0),
(275, NULL, 8, NULL, NULL, 0),
(276, NULL, 8, NULL, NULL, 0),
(277, NULL, 9, NULL, 8, 0),
(278, NULL, 9, NULL, 8, 0),
(279, NULL, 9, NULL, 8, 0),
(280, NULL, 9, NULL, 8, 0),
(281, NULL, 9, NULL, 8, 0),
(282, NULL, 9, NULL, 8, 0),
(283, NULL, 9, NULL, 8, 0),
(284, NULL, 9, NULL, 8, 0),
(285, NULL, 9, NULL, 8, 0),
(286, NULL, 9, NULL, NULL, 0),
(287, NULL, 9, NULL, NULL, 0),
(288, NULL, 9, NULL, NULL, 0),
(289, NULL, 9, NULL, NULL, 0),
(290, NULL, 9, NULL, NULL, 0),
(291, NULL, 9, NULL, NULL, 0),
(292, NULL, 9, NULL, NULL, 0),
(293, NULL, 9, NULL, NULL, 0),
(294, NULL, 9, NULL, NULL, 0),
(295, NULL, 9, NULL, NULL, 0),
(296, NULL, 9, NULL, NULL, 0),
(297, NULL, 10, NULL, 9, 0),
(298, NULL, 10, NULL, 9, 0),
(299, NULL, 10, NULL, 9, 0),
(300, NULL, 10, NULL, 9, 0),
(301, NULL, 10, NULL, 9, 0),
(302, NULL, 10, NULL, 9, 0),
(303, NULL, 10, NULL, NULL, 0),
(304, NULL, 10, NULL, NULL, 0),
(305, NULL, 10, NULL, NULL, 0),
(306, NULL, 10, NULL, NULL, 0),
(307, NULL, 10, NULL, NULL, 0),
(308, NULL, 10, NULL, NULL, 0),
(309, NULL, 10, NULL, NULL, 0),
(310, NULL, 10, NULL, NULL, 0),
(311, NULL, 10, NULL, NULL, 0),
(312, NULL, 10, NULL, NULL, 0),
(313, NULL, 10, NULL, NULL, 0),
(314, NULL, 10, NULL, NULL, 0),
(315, NULL, 10, NULL, NULL, 0),
(316, NULL, 10, NULL, NULL, 0),
(317, NULL, 10, NULL, NULL, 0),
(318, NULL, 10, NULL, NULL, 0),
(319, NULL, 10, NULL, NULL, 0),
(320, NULL, 10, NULL, NULL, 0),
(321, NULL, 10, NULL, NULL, 0),
(322, NULL, 10, NULL, NULL, 0),
(323, NULL, 10, NULL, NULL, 0),
(324, NULL, 10, NULL, NULL, 0),
(325, NULL, 10, NULL, NULL, 0),
(326, NULL, 10, NULL, NULL, 0),
(327, NULL, 10, NULL, NULL, 0),
(328, NULL, 10, NULL, NULL, 0),
(329, NULL, 10, NULL, NULL, 0),
(330, NULL, 10, NULL, NULL, 0),
(331, NULL, 10, NULL, NULL, 0),
(332, NULL, 10, NULL, NULL, 0),
(333, NULL, 10, NULL, NULL, 0),
(334, NULL, 10, NULL, NULL, 0),
(335, NULL, 10, NULL, NULL, 0),
(336, NULL, 10, NULL, NULL, 0),
(337, NULL, 10, NULL, NULL, 0),
(338, NULL, 10, NULL, NULL, 0),
(339, NULL, 10, NULL, NULL, 0),
(340, NULL, 10, NULL, NULL, 0),
(341, NULL, 10, NULL, NULL, 0),
(342, NULL, 11, NULL, NULL, 0),
(343, NULL, 11, NULL, NULL, 0),
(344, NULL, 11, NULL, NULL, 0),
(345, NULL, 11, NULL, NULL, 0),
(346, NULL, 11, NULL, NULL, 0),
(347, NULL, 11, NULL, NULL, 0),
(348, NULL, 11, NULL, NULL, 0),
(349, NULL, 11, NULL, NULL, 0),
(350, NULL, 11, NULL, NULL, 0),
(351, NULL, 11, NULL, NULL, 0),
(352, NULL, 11, NULL, NULL, 0),
(353, NULL, 11, NULL, NULL, 0),
(354, NULL, 11, NULL, NULL, 0),
(355, NULL, 11, NULL, NULL, 0),
(356, NULL, 11, NULL, NULL, 0),
(357, NULL, 11, NULL, NULL, 0),
(358, NULL, 11, NULL, NULL, 0),
(359, NULL, 11, NULL, NULL, 0),
(360, NULL, 11, NULL, NULL, 0),
(361, NULL, 11, NULL, NULL, 0),
(362, NULL, 11, NULL, NULL, 0),
(363, NULL, 11, NULL, NULL, 0),
(364, NULL, 11, NULL, NULL, 0),
(365, NULL, 11, NULL, NULL, 0),
(366, NULL, 11, NULL, NULL, 0),
(367, NULL, 11, NULL, NULL, 0),
(368, NULL, 11, NULL, NULL, 0),
(369, NULL, 11, NULL, NULL, 0),
(370, NULL, 11, NULL, NULL, 0),
(396, NULL, 13, NULL, NULL, 0),
(397, NULL, 13, NULL, NULL, 0),
(398, NULL, 13, NULL, NULL, 0),
(399, NULL, 13, NULL, NULL, 0),
(400, NULL, 13, NULL, NULL, 0),
(401, NULL, 13, NULL, NULL, 0),
(402, NULL, 13, NULL, NULL, 0),
(403, NULL, 13, NULL, NULL, 0),
(404, NULL, 13, NULL, NULL, 0),
(405, NULL, 13, NULL, NULL, 0),
(406, NULL, 13, NULL, NULL, 0),
(407, NULL, 13, NULL, NULL, 0),
(408, NULL, 13, NULL, NULL, 0),
(409, NULL, 13, NULL, NULL, 0),
(410, NULL, 13, NULL, NULL, 0),
(411, NULL, 13, NULL, NULL, 0),
(412, NULL, 13, NULL, NULL, 0),
(413, NULL, 13, NULL, NULL, 0),
(414, NULL, 13, NULL, NULL, 0),
(415, NULL, 13, NULL, NULL, 0),
(416, NULL, 14, NULL, NULL, 0),
(417, NULL, 14, NULL, NULL, 0),
(418, NULL, 14, NULL, NULL, 0),
(419, NULL, 14, NULL, NULL, 0),
(420, NULL, 14, NULL, NULL, 0),
(421, NULL, 14, NULL, NULL, 0),
(422, NULL, 14, NULL, NULL, 0),
(423, NULL, 14, NULL, NULL, 0),
(424, NULL, 14, NULL, NULL, 0),
(425, NULL, 14, NULL, NULL, 0),
(426, NULL, 14, NULL, NULL, 0),
(427, NULL, 14, NULL, NULL, 0),
(428, NULL, 14, NULL, NULL, 0),
(429, NULL, 14, NULL, NULL, 0),
(430, NULL, 14, NULL, NULL, 0),
(431, NULL, 14, NULL, NULL, 0),
(432, NULL, 14, NULL, NULL, 0),
(433, NULL, 14, NULL, NULL, 0),
(434, NULL, 14, NULL, NULL, 0),
(435, NULL, 14, NULL, NULL, 0),
(436, NULL, 14, NULL, NULL, 0),
(437, NULL, 14, NULL, NULL, 0),
(438, NULL, 14, NULL, NULL, 0),
(439, NULL, 14, NULL, NULL, 0),
(440, NULL, 14, NULL, NULL, 0),
(441, NULL, 14, NULL, NULL, 0),
(442, NULL, 14, NULL, NULL, 0),
(443, NULL, 14, NULL, NULL, 0),
(444, NULL, 14, NULL, NULL, 0),
(445, NULL, 14, NULL, NULL, 0),
(446, NULL, 14, NULL, NULL, 0),
(447, NULL, 14, NULL, NULL, 0),
(448, NULL, 14, NULL, NULL, 0),
(449, NULL, 14, NULL, NULL, 0),
(450, NULL, 14, NULL, NULL, 0),
(451, NULL, 14, NULL, NULL, 0),
(452, NULL, 14, NULL, NULL, 0),
(453, NULL, 14, NULL, NULL, 0),
(454, NULL, 14, NULL, NULL, 0),
(455, NULL, 14, NULL, NULL, 0),
(456, NULL, 14, NULL, NULL, 0),
(457, NULL, 14, NULL, NULL, 0),
(458, NULL, 14, NULL, NULL, 0),
(459, NULL, 14, NULL, NULL, 0),
(460, NULL, 14, NULL, NULL, 0),
(461, NULL, 13, NULL, NULL, 0),
(462, NULL, 13, NULL, NULL, 0),
(463, NULL, 13, NULL, NULL, 0),
(464, NULL, 13, NULL, NULL, 0),
(465, NULL, 13, NULL, NULL, 0),
(466, NULL, 13, NULL, NULL, 0),
(467, NULL, 13, NULL, NULL, 0),
(468, NULL, 13, NULL, NULL, 0),
(469, NULL, 13, NULL, NULL, 0),
(470, NULL, 13, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `fishingplace`
--

CREATE TABLE `fishingplace` (
  `ID` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `TotalSeat` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `image` varchar(300) NOT NULL,
  `fromDate` date NOT NULL,
  `toDate` date NOT NULL,
  `role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `fishingplace`
--

INSERT INTO `fishingplace` (`ID`, `name`, `Description`, `TotalSeat`, `price`, `Location`, `latitude`, `longitude`, `image`, `fromDate`, `toDate`, `role`) VALUES
(1, 'Macquarie Fishing Spots', 'Durable ABS body, exquisite coating, and sharp metal hooks set the hard baits high quality. There are steel balls in the body, it can flow .Durable ABS body, exquisite coating, and sharp metal hooks set the hard baits high quality. There are steel balls in the body, it can flow .Durable ABS body, exquisite coating, and sharp metal hooks set the hard baits high quality. There are steel balls in the body, it can flow .Durable ABS body, exquisite coating, and sharp metal hooks set the hard baits high quality. There are steel balls in the body, it can flow .Durable ABS body, exquisite coating, and sharp metal hooks set the hard baits high quality. There are steel balls in the body, it can flow .Durable ABS body, exquisite coating, and sharp metal hooks set the hard baits high quality. There are steel balls in the body, it can flow .Durable ABS body, exquisite coating, and sharp metal hooks set the hard baits high quality. There are steel balls in the body, it can flow .Durable ABS body, exquisite coating, and sharp metal hooks set the hard baits high quality. There are steel balls in the body, it can flow .Durable ABS body, exquisite coating, and sharp metal hooks set the hard baits high quality. There are steel balls in the body, it can flow .Durable ABS body, exquisite coating, and sharp metal hooks set the hard baits high quality. There are steel balls in the body, it can flow .', 5, 100, 'Hatir Jheel', 23.756, 90.4036, '20190422163658_20190404002953_43939068.jpg', '2019-03-31', '2019-04-12', 1),
(2, 'Fishing Lake Nagambie', 'Made of PE material, superior abrasion and slow water absorption Wide range of choices in tensile strengths: from 6lbs to 80lbsMade of PE material, superior abrasion and slow water absorption Wide range of choices in tensile strengths: from 6lbs to 80lbsMade of PE material, superior abrasion and slow water absorption Wide range of choices in tensile strengths: from 6lbs to 80lbsMade of PE material, superior abrasion and slow water absorption Wide range of choices in tensile strengths: from 6lbs to 80lbsMade of PE material, cbabrasion and slow water absorption Wide range of choices in tensile strengths: from 6lbs to 80lbsMade of PE material, superior abrasion and slow water absorption Wide range of choices in tensile strengths: from 6lbs to 80lbsMade of PE material, superior abrasion and slow water absorption Wide range of choices in tensile strengths: from 6lbs to 80lbsMade of PE material, superior abrasion and slow water absorption Wide range of choices in tensile strengths: from 6lbs to 80lbs', 6, 80, 'fishing', 23, 90, '20190401233313_1.PNG', '2019-03-29', '2019-03-19', 1),
(3, 'Great places to fish', 'Durable ABS body, exquisite coating, and sharp metal hooks set the hard baits high quality. There are steel balls in the body, it can flow .Durable ABS body, exquisite coating, and sharp metal hooks set the hard baits high quality. There are steel balls in the body, it can flow .Durable ABS body, exquisite coating, and sharp metal hooks set the hard baits high quality. There are steel balls in the body, it can flow .Durable ABS body, exquisite coating, and sharp metal hooks set the hard baits high quality. There are steel balls in the body, it can flow .Durable ABS body, exquisite coating, and sharp metal hooks set the hard baits high quality. There are steel balls in the body, it can flow .Durable ABS body, exquisite coating, and sharp metal hooks set the hard baits high quality. There are steel balls in the body, it can flow .Durable ABS body, exquisite coating, and sharp metal hooks set the hard baits high quality. There are steel balls in the body, it can flow .Durable ABS body, exquisite coating, and sharp metal hooks set the hard baits high quality. There are steel balls in the body, it can flow .Durable ABS body, exquisite coating, and sharp metal hooks set the hard baits high quality. There are steel balls in the body, it can flow .Durable ABS body, exquisite coating, and sharp metal hooks set the hard baits high quality. There are steel balls in the body, it can flow .', 5, 50, 'Dhanmondi', 23.7449, 90.3777, '20190324230852_5b2c4138d23cf4.61503379.jpg', '2019-03-30', '2019-04-10', 1),
(4, 'Mirpur Zoo', 'Dhaka National Zoo Lakes have always been prime destinations for anglers for decades. It consists of two great pristine lakes with great fishes like rohu, catla, mrigal, kalibaus, catfish etc. Anyone can go fishing from 6:00am to 7:00 pm for a fee of 2000 Taka with 3 rods. Ticket for fishing in Dhaka National Zoo Lakes should be booked prior to the angling trip. Inclusion of a helping man is permitted with the same package, that means you can take another person with you in the same cost.\r\n\r\nThere are two lakes inside the zoo. The Northern Lake is little bigger than the Southern Lake. Which lake to go depends on the  individual choice. But Most people prefer to fish in the Northern Lake. There are two restaurants where you can get foods (mainly fast foods and snacks) and drinks. Beside this, if you need any kind of first aid you may contact Veterinary Surgeon of Information Center near the entrance gate.', 50, 2000, 'Mirpur-1', 23.8111, 90.3456, '20190504091743_6927599124_3434d1e509_b.jpg', '2019-05-02', '2019-05-04', 0),
(5, 'Government Bangla College Lake ', 'One man with one helping man can fish using three wheels at a time, from 6.00AM to 7.00PM at the cost of Tk. 2,000.00', 20, 1500, 'Technical', 23.7854, 90.3515, '20190504091942_020651085375.jpg', '2019-05-04', '2019-05-10', 0),
(6, 'Dhanmondi Lake', 'Angling means catching fishes with fish-hook. It is a very interesting passtime. People like to go on angling in both cities and rural areas.  In Dhaka, the anglers gather on Dhanmondi lake. There is a committeee for arranging angling on Dhanmondi lake\r\n', 86, 5000, 'Dhanmondi', 23.7499, 90.3781, '20190504092149_9400025305_da26e725ee_b.jpg', '2019-05-11', '2019-05-18', 0),
(7, 'Nawab Bari Pukur', 'The annual fishing festival has been going on at the â€˜Nawab Bari Pukurâ€™ in Islampur of Old Dhaka.\r\nEvery year the festival takes place only on five Fridays during the months of May and June at the same pond. Fishing lovers of the local areas and from other areas gather here with wheels for fishing.\r\nThe Nawab Bari pond, locally known as â€œNawab Bari Pushkuniâ€ is monitored and managed by the Moulavi Khwaja Abdullah Welfare Trust. However, the trust leases the pond to local people for maintenance and fish cultivation.\r\nSayed Saber Hossain, a member of the group that has taken lease of the pond, told the Dhaka Tribune: â€œWe arrange the fishing festival only on five Fridays in May-June every year. Local people and few other outsiders come here to catch fish. Most of the people come here as fishing is their hobby.â€\r\nThis year, a total of 36 stools were set up around the pond with ticket prices of each stool for one day set at Tk5,000 for the locals and Tk13,000 for the outsiders, he added.', 34, 13000, 'Gol Talab', 23.7097, 90.4051, '20190504103531_43939068.jpg', '2019-05-23', '2019-05-30', 0),
(8, 'Ramna Lake', 'Fishery hunting was held in Ramna Lake under Ramna Saukhin Fishery Hunting Multipurpose Co-operative Society. The hunting season starts from March 16 and ends in December. There is only two days of fishing on Friday and Saturdays. 1 ticket can be fish for two days. 1 day ticket worth Tk. 2000, 2 day ticket price of 3,000', 65, 3000, 'Ramna', 23.7364, 90.4006, '20190504103916_5091498105_413ae8ec97_b.jpg', '2019-05-23', '2019-05-30', 0),
(9, 'Airport Runway Lake', 'There is a fishing facility in the runway daily every week except Sunday. Here only one day ticket is sold, which is worth 3000 rupees. It is noteworthy that no government holiday, weekly leave on Sundays were arranged for fishing on Sundays.', 20, 3000, 'Runway Lake', 23.8529, 90.4081, '20190504112416_541192840_357e3417f8_b.jpg', '2019-05-14', '2019-05-21', 0),
(10, 'Uttara Lake', 'In the Uttara Lake of Dhaka, arrangement of fish for 3/4 months break is made. Fishing is here from 6am to 6pm.', 45, 4000, 'Uttara', 23.8712, 90.3929, '20190504112541_1531035532.jpg', '2019-05-12', '2019-04-19', 0),
(11, 'Jahurul Haque Hall Lake', 'Fishing arrangements are made here in the month of August, September and October. However, there is only a week of fishing along with Friday. Tickets for 3 days Taka 3,000', 29, 4000, 'DU', 23.7301, 90.3886, '20190504112721_IaI9IZ_du pond.jpg', '2019-05-17', '2019-05-24', 0),
(12, 'kochu khet', 'Fgikfuisiugh hfgyasldigah hlgsfgyafilage jkfhliaeIu', 25, 5000, 'National Park', 23.7449, 90.3777, '20190503104250_Aling-photo.jpg', '2019-05-13', '2019-05-07', 1),
(13, 'Bangshal Lake', 'The annual fishing festival has been going on at the â€˜Bangshal Lakeâ€™ in Islampur of Old Dhaka.\r\nEvery year the festival takes place only on five Fridays during the months of May and June at the same pond. Fishing lovers of the local areas and from other areas gather here with wheels for fishing.\r\nThe Bangshal Lake, locally known as â€œBangshal Pondâ€ is monitored and managed by the Bangshal Welfare Trust. However, the trust leases the pond to local people for maintenance and fish cultivation.\r\nThe member of this group that has taken lease of the pond, told the Dhaka Tribune: â€œWe arrange the fishing festival only on five Fridays in May-June every year. Local people and few other outsiders come here to catch fish. Most of the people come here as fishing is their hobby.â€\r\nThis year, a total of 36 stools were set up around the pond with ticket prices of each stool for one day set at Tk5,000 to Tk10,000', 30, 5000, 'Bangshal', 23.7155, 90.4073, '20190504112941_Banshal-pond-2-626x365.jpg', '2019-05-15', '2019-05-21', 0),
(14, 'Shangsad Bhaban Lake', 'In Shangsad Bhaban Lake, there is occasionally fishing facility . Here only one day ticket is sold, which is worth Tk5000. It is note worthy that no government holiday, weekly leave on Sundays were arranged for fishing on Sundays.', 45, 5000, 'Sangsad Bhaban', 23.7627, 90.3774, '20190504112231_tumblr_nld5eltWCx1rauk9mo1_1280.jpg', '2019-05-14', '2019-05-18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fishing_result`
--

CREATE TABLE `fishing_result` (
  `id` int(10) NOT NULL,
  `place_id` int(10) NOT NULL,
  `ownerName` varchar(100) NOT NULL,
  `fishName` varchar(100) NOT NULL,
  `position` int(10) NOT NULL,
  `description` text NOT NULL,
  `size` int(11) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fishing_result`
--

INSERT INTO `fishing_result` (`id`, `place_id`, `ownerName`, `fishName`, `position`, `description`, `size`, `img`) VALUES
(4, 4, 'Owner Name', 'Ilish', 1, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia', 20, '20190417164144_sdjf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hireproduct`
--

CREATE TABLE `hireproduct` (
  `ID` int(10) NOT NULL,
  `OrderID` int(10) NOT NULL,
  `ProductID` int(10) NOT NULL,
  `qty` int(11) NOT NULL,
  `days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `hireproduct`
--

INSERT INTO `hireproduct` (`ID`, `OrderID`, `ProductID`, `qty`, `days`) VALUES
(1, 12, 1, 1, 1),
(2, 12, 9, 1, 2),
(3, 12, 10, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `ID` int(10) NOT NULL,
  `order_type` tinyint(4) NOT NULL,
  `userID` int(10) NOT NULL,
  `payment_status` int(10) NOT NULL,
  `orderStatus` tinyint(4) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`ID`, `order_type`, `userID`, `payment_status`, `orderStatus`, `date_time`) VALUES
(1, 1, 5, 1, 0, '2019-03-01 03:06:36'),
(2, 1, 6, 1, 0, '2019-03-01 03:06:39'),
(3, 1, 7, 1, 0, '2019-03-01 03:06:40'),
(4, 1, 8, 1, 1, '2019-04-01 03:06:41'),
(5, 1, 9, 1, 0, '2019-04-01 03:06:42'),
(6, 1, 4, 1, 0, '2019-04-01 03:06:43'),
(7, 1, 4, 1, 0, '2019-05-01 03:06:46'),
(8, 1, 9, 1, 0, '2019-05-01 03:06:45'),
(9, 3, 4, 0, 0, '2019-05-01 03:06:45'),
(12, 2, 4, 1, 0, '2019-05-01 17:49:29'),
(13, 3, 8, 1, 0, '2019-05-03 13:14:43'),
(14, 3, 5, 1, 0, '2019-05-05 20:12:14');

-- --------------------------------------------------------

--
-- Table structure for table `place_rating`
--

CREATE TABLE `place_rating` (
  `ID` int(10) NOT NULL,
  `fishingPlaceID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `star` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `place_rating`
--

INSERT INTO `place_rating` (`ID`, `fishingPlaceID`, `userID`, `star`) VALUES
(1, 1, 4, 4),
(2, 2, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(10) NOT NULL,
  `catagory_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `img` varchar(300) NOT NULL,
  `buyPrice` int(10) NOT NULL,
  `hirePrice` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `catagory_id`, `name`, `Description`, `img`, `buyPrice`, `hirePrice`) VALUES
(1, 1, 'Spinning Rods 2 Pieces', 'asdkfhksd', '20190423041922_20190402190843_41RAMgpwOLL._SX466_.jpg', 100, 10),
(2, 2, ' Zorbes PROBEROS 100M ', 'Medium Action Spinning Rod: Moderate action suits such as bass, trout and river, lake, reservoir, pond and fresh water, suitable for fishing on trips and vacations.Medium Action Spinning Rod: Modera Medium Action Spinning Rod: Moderate action suits ...Medium Action Spinning Rod: Moderate action suits ... Medium Action Spinning Rod: Moderate action suits such as bass, trout and river, lake, reservoir, pond and fresh water, suitable for fishing on trips and vacations.Medium Action Spinning Rod: Modera Medium Action Spinning Rod: Moderate action suits ...Medium Action Spinning Rod: Moderate action suits ...Medium Action Spinning Rod: Moderate action suits such as bass, trout and river, lake, reservoir, pond and fresh water, suitable for fishing on trips and vacations.Medium Action Spinning Rod: Modera Medium Action Spinning Rod: Moderate action suits ...Medium Action Spinning Rod: Moderate action suits ... Medium Action Spinning Rod: Moderate action suits such as bass, trout and river, lake, reservoir, pond and fresh water, suitable for fishing on trips and vacations.Medium Action Spinning Rod: Modera Medium Action Spinning Rod: Moderate action suits ...Medium Action Spinning Rod: Moderate action suits ...', '20190324225054_1.PNG', 50, 5),
(4, 3, 'Zorbes 20 PCS Lure Hard', ' Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs Made of PE material, superior abrasion and slow water absorption\r\nWide range of choices in tensile strengths: from 6lbs to 80lbs', '20190324225440_2.PNG', 500, 50),
(8, 11, 'FISHING TACKLE BOX WITH TACKLE 200 PIECE KIT', 'The Surecatch 200 Piece Tackle Kit comes with everything you need to hit the water. The Sure Catch Tackle Kit features 200 pieces of quality fishing accessories all housed in a 2 tray tackle box.\r\n\r\nContents\r\nQuality 2 Tray Tackle Box\r\n4â€ (100mm) Hand caster with line\r\n5â€ Scaler back knife\r\nLine cutter with sheath\r\nSabiki bait jigs\r\nFish Scaler\r\nMetal Lure\r\n90 Assorted hooks in 3 different patterns and sizes\r\n60 Swivels\r\n20 Sinkers in various shapes and sizes\r\n6 floats\r\n\r\nBenefits\r\nGreat gift idea, The Surecatch 200 Piece Tackle Kit is the perfect start up package for an up and coming angler featuring everything they need to hit the water\r\nGreat for all anglers especially those those travelling the country in caravans and like to spend a few quality hours wetting a line while camping next to the river bank or beach.\r\nThe ultimate tackle box, from the dedicated fisherman to the budding angler or traveller! An ideal gift, all you need to go fishing is this Jumbo value pack and some bait.', '20190402182330_tackle-box-kit-with-tackle__17691.1476867213.jpg', 5500, 550),
(9, 11, 'PLANO TACKLE BOX MODEL 758', 'The tackle box is designated as being 100% worm-proof, which will allow you to store soft plastic lures directly on the trays without fear of them damaging the box. Additionally, the plastic construction is also impact-resistant and extra tools can be stored on the side bait racks.\r\n\r\nFeatures and Specifications\r\n\r\nDimensions: 20.75\" x 11.5\" x 13.88\"\r\n100% worm-proof\r\nFour-drawer system\r\nFour removable bait racks\r\nImpact-resistant\r\nLarge bulk storage\r\nSide tool storage\r\nUSA-manufactured', '20190402182552_plano_758_tackle_box__34299.1396933217.jpg', 5000, 500),
(10, 11, 'Three Tray Fishing Tackle Box', 'Three cantilever tray with 22 to 34 compartments\r\nBrass bailed latch\r\nTwo top access storage areas\r\nGreen Metallic / Off White\r\n16.25 in L x 9 in W x 8.375 in H', '20190402183118_4097-DEFAULT-l.jpg', 3000, 300),
(11, 11, 'Custom Wooden Tackle Boxes', 'Custom made to your specifications, tackle boxes are created using only the finest material available. Built one at a \r\ntime, each tackle box features premium graded figured woods combined with exotic and domestic woods of \r\ncontrasting colors to create a stunning visual impact.  Over 200 parts and pieces are carefully milled, fitted and finished \r\nby a dedicated artisan. Stainless steel hardware and penetrating epoxy coating on all surfaces ensure a rugged, usable \r\nbox designed to meet your demanding expectations. The basic design was created in consultation with Rob Sanford, a \r\ntop sportfisherman.  Unique features include ample storage for reels, removable hanging jig holder, compartmentalized \r\ndrawers and trays with exquisitely worked wooden handles, dovetails and fine furniture drawer rails. Inset doors with \r\nsee through panels in the lid  are perfect for smaller jigs and maximize space.  Custom built rod holders from stainless \r\nsteel  and sturdy handles accented with tear drop overlays add storage and convenience.    The combination of these \r\ndetails provide practical and unique components unavailable on any other single tackle box.   Interlocking hidden \r\njoinery, accent inlays, custom laser engraving and traditional construction methods ensure a world class tackle box that \r\nwill last a lifetime and become a priceless heirloom that you can use today.', '20190402183328_fbe7239371088df11dc8437946825c70.jpg', 6500, 650),
(16, 11, 'Tackle Box Tools Small Clear Plastic Waterproof', 'With Backrest or Not: Yes\r\nWith Retractable Leg or Not: Yes\r\nRod Material: Other\r\nMaterial: Plastic\r\nRod Length: 1.8m\r\nPosition: River\r\nFishing Rod Category: Competition Rod\r\nModel Number: 71002\r\nis_customized: Yes\r\nAccessories Type: Other Accessories', '20190402212527_product-image-375863796_2000x.jpg', 3700, 300),
(17, 11, 'Carp Fishing Accessories Kit', 'All nautical & fishing products of the category Tools have a high manufacturer quality and take care of even the smallest details. At waveinn you can find the full catalogue of Fishing equipment products from Carp professional. The price of Carp professional Carp Fishing Accessories Kit is 15.95 US$, with the lowest price guarantee, secure payment and an efficient delivery service!', '20190402212915_carp-professional-carp-fishing-accessories-kit.jpg', 3500, 350),
(18, 11, 'JAKEMY PJ-5002 Fishing Accessories Tool Kit', 'Brand-JAKEMY\r\nModel-PJ-5002\r\nQuantity-1 set\r\nForm Color-ACU\r\nMaterial-ABS + TPR', '20190402213941_maxresdefault.jpg', 3600, 350),
(19, 11, '160pcs/box Fishing Accessories Kit', 'The fishing tackle box set comes with 160pcs/lot necessary fishing accessories:fishing hooks,bass casting weights sinker,rolling swivel with safety snap connector,rolling barrel fishing swivels,three way cross-line fishing swivels,fishing line to hook swivels shank clip connector and fishing beads.', '20190402214323_wholesale-fishing-accessories-tackle-box.jpg', 4500, 500),
(20, 11, 'Fishing Tackle, Gear and Accessories', 'Fishing tackle, gear and electronics sales closely follow angler preferences. Manufacturers listen to loyal customers and develop gear that matches their tastes and interests.', '20190402214655_icast-roundup-new-products.jpg', 3400, 370),
(21, 11, 'E-ERA Hiking Fishing Hat', 'Complete Sun Protection UVA / UVB (Comes with Mouth/Face Cover as well).\r\nLarge Bill and Back Flap Provides Great Protection from the Sun.\r\nMesh side panels with 2 large meshed brass eyelets for ventilation.\r\nFixed the hat with adjustable drawstring, especially in windy days.\r\nThe strap is adjustable so you can keep it as loose or tight as you want.\r\nWindproof / UV protection / Quick-drying.', '20190402215140_3c759f7735c7b000af1ca8b555a06116.jpg', 1000, 50),
(22, 1, 'FLATHEAD FISHING ROD', 'There is nothing like tackling Flathead on light fishing gear. The notorious Lizard packs a hell of a punch, particularly when it attacks lures. There aggressive attack is matched only by its antics as its head breaks the surface, where a landing net quickly becomes the difference between reward and devastation.', '20190402221010_41RAMgpwOLL._SX466_.jpg', 2300, 400),
(23, 1, 'Plusinno Fishing Rod', 'This rod from Plusinno is great for two major reasons: Itâ€™s low-cost, and it folds down small for incredibly easy storage. When extended to its full length (the rod comes in several sizes, for the record), itâ€™s suitable for use on the pier, kayak fishing, and even trolling for midsize saltwater fish. While you wouldnâ€™t use this rod for long-distance casting off the shore, itâ€™s a fine choice for just about all other non-fly-fishing uses, and is a great choice for travel, too, as when collapsed fully, the rod measures about a foot and a half in length.', '20190402222111_OY0220 (8).jpg', 1700, 250),
(24, 1, 'Ugly Stik GX2 Fishing Rod', 'When it comes to a fishing rod that isnâ€™t wildly expensive for someone with some fishing experience, Labissiere said: â€œFor the price, this is a great combo. I have fished with it in both freshwater and saltwater and it performs well. The rod is great for the price and the reel is average, if you are looking for a decent, reasonably priced combo, this is a good way to go.â€ And Iâ€™ll add that itâ€™s a great rod for going after those peak-popularity species like trout, bass, and pike.', '20190402221759_rBVaEVdiKuuAC-2WAA0_QiBUjTI880.jpg', 3000, 300),
(25, 1, 'Pflueger Trion Fishing Rod', 'If youâ€™re committed to fishing but not quite ready to spend in the hundreds of dollars, then the Pflueger Trion is a great choice for your last semi-amateur rod-and-reel combo. Labissiere said: â€œPflueger reels are smooth and powerful, rather than so jerky you lose the fish. This combo is my workhorse, and I just keep going back to it because it works.â€ Available in lengths spanning from five feet to seven feet, itâ€™s also short enough to use on the banks or if youâ€™re wading without your bait resting on the river bottom or lake bed.', '20190402221909_rBVaHVUD6eaADVr_AAMibGO7AI8545.jpg', 2700, 270),
(26, 1, 'Cadence Fishing CC6 Fishing Rod', 'Whether youâ€™re after trout, bass, or walleye in the river or youâ€™re angling for flounder or red fish off the pier or just offshore, the Cadence Fishing CC6 is a great advanced-level fishing pole that will give you the edge. It has moderate to fast action, so the tip will bend and let you know the second you have a bite, but most of the rod will hold firm, letting you fight with as much zeal as needed to reel in a prized catch. The graphite rod takes plenty of abuse while the combination cork and EVA foam grips are lightweight and comfortable.', '20190402222032_Scott_A4.jpg', 3650, 350),
(27, 1, 'Crystal River C/CTFK1 Fishing Rod', 'Fly-fishing is not easy, something I can tell you from personal experience. In fact, many people who think they will love fly-fishing end up frustrated by the sport and give it up after a few tries. If you think you might fall into that category, donâ€™t overspend on gear. The Crystal River C/CTFK1 rod-and-reel combo is a great choice for entry-level fly-fishing hardware because the rod is well-balanced and gives good flex and control, and the reel is sufficient for learning and easily replaced later if you stick with the new hobby.', '20190402222307_Shakespeare_Omni_360_Surf_Rods_1.jpg', 2100, 200),
(28, 1, 'Piscifun Fishing Rod', 'It turns out you enjoy fly-fishing. Time to upgrade your gear and fill out your kit. The (rather) complete package you get when you order a fly-fishing rod from Piscifun includes a reel, line, a line-cutting tool, nine flies, and more. Extending out to nine feet, this slow-action rod (that means the whole rod bends, basically speaking) is ideal for smaller varieties of river fish like trout. The flexible pole and the light weight of the rod and reel together allow for plenty of control and for hours of fishing without fatigue.', '20190402222439_shakespeare-wild-rod-reel-combo__24624.1478634398.jpg', 1900, 190),
(29, 1, 'KastKing Emergence Fly Fishing Rod', 'This rod-and-reel combo will feel right at home in the hands of an experienced fisherman, and the fact that said reel comes preloaded saves you time when you want to get a fly in the water fast. The shaft is made from graphite and breaks down into four pieces for convenience, and when assembled, the rod is lightweight and sensitive, transferring motion to your hands so youâ€™re in tune with the fish, and giving you maximum control. While more than suitable for use by experienced fly fishermen, thereâ€™s really no reason a beginner couldnâ€™t use it â€” itâ€™s just a bit more expensive than the newcomer might look for.', '20190402222550_Silstar-Tactical-7002L.jpg', 2750, 210),
(30, 1, 'Shakespeare Youth Ugly Stik GX2 2-Piece Fishing Ro', 'heir GX2 Youth rod-and-reel combo is 100 percent genuine fishing gear; itâ€™s just a bit smaller than an adult-size rod. The narrow grips fit smaller hands, while the lightweight rod and reel are ideal for smaller bodies. As for performance, the reel spins smoothly and can handle a moderate test line, while the graphite-and-fiberglass-combo body flexes well for good sensitivity.', '20190402223041_Types-of-Fishing-Rods-Line-and-Hooks-Learn-Before-Going-Fishing.jpg', 2360, 210),
(31, 2, 'Mono Fishing Line', 'If youâ€™ve searched around at the monofilament options today, I think youâ€™ll agree they are endless. It seems thereâ€™s a line for every specific fishing niche; each fish species, in a specific water type, in certain weather, and on and on it goes. In this tackle guide weâ€™ll sort through the distractions of niche lines and focus on general line specifications that will help you better understand monofilament. Along with that, weâ€™ll provide the best mono fishing lines that we have confidence in and cross these countless fishing niches.', '20190402224340_best-mono-fishing-line.jpg', 100, 10),
(32, 2, 'KastKing Superpower Braided Fishing Line', 'STRONG KNOT STRENGTH â€“ dynamically incorporated strands in KastKing SuperPower Braided Lines allow you to easily tie a more solid knot; you can even tie an improved clinch knot. The special proprietary treatment (without a waxy coating) allows the supple fishing line to zip through the guides to your target and gives you better lure swimming action.', '20190402231639_PowerProSpectraFiberBraidedFishingLine-5b7c6e1ac9e77c00508c493a.jpg', 200, 50),
(33, 1, 'Joy Fish Monofilament Fishing Line 1 LB Spool', 'The Joy FishÂ® brand of quality monofilament fishing line has been fully approved by commercial and sports fishermen all around the world, and for good reason!\r\nOur line is made of advanced resin material from well-known companies (such\r\nas Dupont & Bayer) and is manufactured on computer operated machinery\r\nusing the most advanced technology available. This gives our product the â€œJoy\r\nFishÂ®â€ advantage with superior quality line that is smaller, stronger, super soft\r\nand flexible. Now available in Clear and Hi-Vis colors.', '20190402232453_PROBEROS-300M-Fishing-Lines-PE-Braid-4-Stands-6LBS-to-100LB-Multifilament-Fishing-Line-Angling-Accessories.jpg_640x640.jpg', 300, 70),
(34, 1, 'Premium Monofilament Fishing Line', 'Premium monofilament fishing lines made with great attention to detail. All aspects of these lines are engineered with one goal in mind, to catch you more fish.', '20190402232532_diamond hi catch mono 1000yrd spools.jpg', 270, 60),
(35, 2, '1pcs 300M Nylon lines 1pcs fishing line', 'Line Number:\r\n0.4~8.0  \r\nDiameter(mm):\r\n0.10mm~0.50mm  \r\nTest Weight(kg):\r\n12lb~130lb  \r\nLength(Meter):\r\n300 Meter  \r\nWith Ruler or Not	:\r\nNo  \r\nShape:\r\nLevel  \r\nBuoyancy Characteristic:\r\nFloating Line  \r\nShape	:\r\nLevel ', '20190402232004_1pcs-300m-nylon-lines-1pcs-fishing-line-monofilament.jpg', 240, 90),
(36, 2, 'SeaKnight Monofilament Nylon Fishing Line', 'Brand Name:SeaKnight\r\nPosition:River,Reservoir Pond,Ocean Beach Fishing,Lake,Ocean Boat Fishing,stream,Ocean Rock Fshing\r\nMaterial:Nylon\r\nShape:Level Buoyancy \r\nCharacteristic:Floating \r\nLineWith Ruler or Not:No\r\nModel Number:Nylon Line BALDE 500M 1000M\r\nWith Scale or Not:No\r\nMeters:500M 1000MStrength Test Range(LB):2 4 5 6 7 8 10 12 16 20 25 30 35LBStrength \r\nTest Range(KG):0.90-15.87KG\r\nDiameter Range (mm):0.105-0.500mm5 \r\nColors:Yellow,Blue,Green,Black,Clean Fishing Line \r\nType:Mono Nylon Line\r\nWater Absorption:No', '20190402232253_SeaKnight-Monofilament-Nylon-Fishing-Line-BLADE-500M-1000M-2-35LB-Strong-Jig-Winter-Fishing-Line-Mono.jpg_640x640.jpg', 190, 70),
(37, 3, 'New ABS Plastic Wobbler Laser bass Lure', 'Material :\r\nHard Baits  \r\nShape:\r\nSwimbaits  \r\nType:\r\nFreshwater  \r\nSwimming Depth:\r\n0.8-2.4M  \r\nWeight:\r\n12.5g  \r\nHooks:\r\n4# hooks  \r\nLength:\r\n11cm  \r\nPaint:\r\nPS Painted  \r\nEyes:\r\n3D eyes  ', '20190402233615_new-abs-plastic-wobbler-laser-bass-lure-11cm.jpg', 1400, 250),
(38, 3, '12pcs Dry and Wet Bionic Fly Lures', 'Specifications:\r\nStyle: Biomimetic and Imitation of the Butterfly\r\nColor: Multicolor(send randomly)\r\nSize(Width and Length Hook) : 10*20mm\r\n \r\nFeatures:\r\nBe suitalbe for carnivorous fish,  carp and crucian carp included.\r\nDry hair hook to hook with the surface using a fish, Wet hair hook hook for the fish at the middle of \r\nand even at the bottom of water', '20190402233723_373df476-5e41-b774-ecf5-93cb61d98ce8.jpg', 1000, 200),
(39, 3, 'Dry Fly Fishing Lure 25 PC Kit - Essential Freshwa', 'Material :\r\nSoft Baits  \r\nShape:\r\nJigs  \r\nType:\r\nSaltwater  \r\nposition:\r\nRiver,Stream,Reservoir Pond,Ocean Beach  \r\ncategory:\r\nFloating Bait  \r\nmodel number:\r\nFY-007  \r\ntype:\r\nArtificial Bait  ', '20190402233910_8405c4eeebc5f1633b8e4a4f407814c1.jpg', 1500, 350),
(40, 2, 'ZANLURE 32pcs Mixed Trout Flies Lure ', 'Features:\r\n32 mounted universal lures bait hook flies.\r\nEach side containing 16 hooks.\r\nA total of 32 double-sided.\r\nSpecially processed fly hook, shaped like small insects.\r\nHigher accuracy caught fishing.\r\nBox with magnet design, closed solid, easy to carry.', '20190402234446_678e6e79-63a5-482a-bb96-eec14af5d608.jpg', 1200, 300),
(41, 5, '12BB Spinning Fishing Reel', 'Model Number: JINSHA-HK\r\nBaits Type: Fake Bait\r\nPosition: Ocean Rock Fshing,Reservoir Pond,Ocean Beach Fishing,Lake,Ocean Boat Fishing\r\nFishing Method: Spinning\r\nBrand Name: JACKFISH\r\nFishing Reels Type: Pre-Loading Spinning Wheel\r\nGear Ratio: 5.5:1\r\nMAX Drag: 8-16KG', '20190403001431_10238567.jpg', 8000, 3000),
(42, 5, 'Van Staal VS200BXP Spinning Reel', 'The original Van Staal surf reels (VS) are like no other reels. The body, spool and handle are all machined from solid bar stock 6061-T6511 aluminum. The center shaft and line roller are machined from solid titanium with a titanium-nitride coating. The main gear â€” the largest in the industry â€” and pinion gear are both machined from strong 416 HT stainless steel. The spiral bevel gear system is designed to handle great gear load and last a lifetime. No other reel has ever been built to be as strong, and to withstand the elements better than Van Staal. Patented Sealed Drag System: Responsive linear drag curve Wider-range of power settings MicroClickÃ‚ tuning accuracy FlatWrapÃ‚ Oscillation: Perfect line lay every time Optimized for braided superlines Increased casting distance and control', '20190403001617_Best-Surf-Fishing-Reels.jpg', 8200, 3000),
(43, 5, 'Abu Garcia Ambassadeur Yonder Fishing Reel', 'Product Dimensions: 7 x 5 x 3 inches ; 1 pounds\r\nShipping Weight: 1 pounds (View shipping rates and policies)\r\nDomestic Shipping: Currently, item can be shipped only within the U.S. and to APO/FPO addresses. For APO/FPO shipments, please check with the manufacturer regarding warranty and support issues.', '20190403001752_7.jpg', 6000, 2000),
(44, 5, 'Himenlens MC-A08 Carbon Fiber Brakes Fishing Spinn', 'This is a high quality professional spenning reel,Suitable for professional anglers of high quality bait casting reel,Fit:saltwater,freshwater,baitcasting,rear drag,lure,Jigs\r\nBraid Ready Spool - Allows braid to be tied directly to spool Stainless Steel/Oil Felt Drag - Consistent drag pressure, and corrosion resistant', '20190403001929_product-image-635181346.jpg', 7500, 2000),
(45, 5, 'Shimano Baitrunner 12000 OC fishing reel BTR12000O', 'The new Baitrunner OC gives you the confidence of a legendary drivetrain and auto-return Baitrunner feature as well as better castability, better line lay, less backlash, wind knots or tangles, less friction on the line, larger, more comfortable grips, a higher max drag as well as a wider range of Baitrunner settings than its predecessors. Features: Dyna balance, Fluidrive II, Propulsion line management system, Super stopper II, varispeed. Specifications: Retrieve: Reversible, Gear ratio: 4.4:1, line capacity mono lbs/yds: 12/550, 16/350, 20/265, Power Pro lb/yds: 50/505, 65/310, 80/230, Weight : 29.1 ounce, lineretrieve per crank 37 inch, Bearings: 3 S ARB', '20190403002056_abu_garcia_ambassadeur_seven_1.jpg', 4000, 1500),
(46, 7, 'fishing hard lures with 2 hooks', 'Material :\r\nHard Baits  \r\ncondition:\r\nnew  \r\ncolor:\r\nas photos  \r\nType:\r\nHard Baits  \r\nHoliday:\r\nChristmas  \r\ntype:\r\nminnow  ', '20190403002626_h91.jpg', 500, 100),
(47, 7, 'Owner ST-36 Decoy Quad Hooks ', 'Owner ST-36 Treble hooks are super sharp and are the perfect replacement hooks for smaller profile lures or as a \"stinger\" when bait fishing. If you need to replace Whopper Plopper hooks, these are PERFECT! Features include round bends, plus three straight Super Needle Points for wide-gap hooking efficiency.', '20190403002837_000105457_original_1024x1024.jpg', 350, 100),
(48, 7, 'Jig Fishing Hook', 'Type: Barbed Hook, Position: Ocean Boat Fishing, Electric or Not: Manual, With Ruler or Not: No, With Scale or Not: No, Shape: Treble Hook, Brand Name: FISH KING, Material: Stainless Steel, Unit Type: Pack, ', '20190403003048_1372034_IS.jpg', 270, 70),
(49, 7, 'Sharpened Octopus Circle Fishing Hooks', 'Give your fishing and extra edge with these sharpened Octopus Cirlcle Fishing hooks with attaching line. Set of 24 hooks\r\n\r\nSize length:0.7\"(1.8cm) width 0.43\"(1.1cm)', '20190403003222_Fishing_hooks_on_white_surface.jpg', 290, 90),
(50, 7, 'Mustad 39951NPBN Demon Circle Fishing hooks', 'Position:RiverBrand Name:MustadMaterial:High Carbon SteelWith Scale or Not:NoType:Barbed HookElectric or Not:ManualWith Ruler or Not:NoShape:sharp', '20190403003442_fish-hook-silhouette.jpg', 190, 50),
(51, 9, 'Japan Fishing Snap', 'Product Name: INFOF 200pcs/lot Fishing Swivels Crane Swivel with Interlock Snap bass Fishing tackle Fishing Snap Button Snap Japan pesca\r\nItem Code: 397666512\r\nCategory: Fishing Hooks\r\nShort Description:\r\nconnector can be connected conveniently and fast,pole,sea rods,rock fishing group,rock fishing line,lure fishing ects., such as explosive hook, string hooks, lures and sinker, and so on. The flying fishing ,pole line, connecting the monster, almost all the fishing will use it.\r\nQuantity: 1 Lot (200 Piece / Lot)\r\nPackage Size: 15.0 * 15.0 * 20.0 ( cm )\r\nGross Weight/Package: 0.5 ( kg )', '20190403004749_infof-200pcs-lot-fishing-swivels-crane-swivel.jpg', 100, 20),
(52, 9, 'High Strength Copper Swivel Fishing Snap', '\r\nProduct Name: High Strength Copper Swivel Winter Fishing Gear Accessories Smooth Stainless Steel Swivels Interlock Snap Factory Direct 0 08yd UU\r\nItem Code: 414271334\r\nCategory: Fishing Accessories\r\nShort Description:\r\nAlloy fishing eight word link ring DHgate recommend supplier, you can mix items in our store, we have the most competitive price and the best service', '20190403005120_high-strength-copper-swivel-winter-fishing-gear-accessories-smooth-stainless-steel-swivels-interlock-snap-factory-direct-0-08yd-uu.jpg', 150, 40),
(53, 9, 'Steel Barrel Swivel', 'Type :\r\nGear  \r\nWeight:\r\n1g  \r\nLength:\r\n36mm  \r\nMaterial:\r\nStainless Steel  ', '20190403005340_aktdesc_1090849513_00.jpg', 130, 40),
(54, 8, 'Plastic Fishing Baits', 'Material :\r\nHard Baits  \r\nShape:\r\nMinnow Baits  \r\nType:\r\nSaltwater  \r\nName:\r\nPlastic Fishing Lures  \r\nQuantity:\r\n8pcs per lot  \r\nProduct:\r\nMinnow Fishing Bait  \r\nItem:\r\nLifelike Hard Baits  \r\nWeight:\r\n13g per piece  \r\nLength:\r\n12cm  \r\nMaterial:\r\nHard Plastic  \r\nColor:\r\nGreen,Silver,White,Blue,Pink,etc', '20190403014027_rBVaEFnLRjGACWYpAAFUU2eAHak933.jpg', 400, 100),
(55, 8, 'Minnow Fishing Bait', 'Material :\r\nHard Baits  \r\nShape:\r\nSwimbaits  \r\nType:\r\nHard Baits  Saltwater  \r\nHoliday:\r\nall  ', '20190403014146_1.0x0.jpg', 450, 120),
(56, 8, 'Multi-section Fish Plastic Hard Baits', 'Material :\r\nHard Baits  \r\nShape:\r\nSwimbaits  \r\nType:\r\nFreshwate', '20190403014300_rBVaGlZqlTCATz-mAAGiy0OHeSY991.jpg', 350, 90),
(57, 8, 'Rainbow Laser Metel Jig Bait', 'Material :\r\nHard Baits  \r\nShape:\r\nJigs  \r\nType:\r\nSaltwater  \r\nHooks:\r\nwithout hooks  \r\nColors:\r\nChromatic  ', '20190403014536_100-pieces-led-light-fishing-lure-treble.jpg', 550, 130),
(58, 10, 'CC30 LANDING FISHING NET 42â€', 'The lightest landing net we have ever produced, full 3K High modulus carbon construction handle and spread block, 3K carbon for mesh arms. The full carbon construction give to this landing net unrivalled rigidity and low weight, combined with a very comfortable non-slip handle.\r\nâ€¢ 3K high modulus carbon handle (180cm)\r\nâ€¢ 3K carbon spread block\r\nâ€¢ 3K high modulus carbon mesh arms\r\nâ€¢ Camo mesh\r\nâ€¢ Waterproof carry bag included', '20190403015141_54953-PL.jpg', 1200, 300);

-- --------------------------------------------------------

--
-- Table structure for table `product_rating`
--

CREATE TABLE `product_rating` (
  `ID` int(10) NOT NULL,
  `productID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `star` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `product_rating`
--

INSERT INTO `product_rating` (`ID`, `productID`, `userID`, `star`) VALUES
(2, 1, 4, 4),
(3, 46, 4, 3),
(4, 8, 4, 4),
(5, 2, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `request_kit`
--

CREATE TABLE `request_kit` (
  `ID` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `userId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `request_kit`
--

INSERT INTO `request_kit` (`ID`, `name`, `brand`, `comment`, `userId`) VALUES
(1, 'test kit name', 'test Brand', 'test descrtiption', 4);

-- --------------------------------------------------------

--
-- Table structure for table `request_place`
--

CREATE TABLE `request_place` (
  `ID` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `userID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `request_place`
--

INSERT INTO `request_place` (`ID`, `name`, `location`, `comment`, `userID`) VALUES
(2, 'test place name', 'test location', 'test description', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `role` int(5) NOT NULL,
  `image` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `email`, `password`, `name`, `address`, `phone`, `role`, `image`) VALUES
(2, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'Admin', '', '', 1, NULL),
(4, 'manik017500@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'User', 'house no-8, Dhaka, Bangladesh', '1962564621', 0, '20190328165048_apple.png'),
(5, 'sharabunthahura@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Sara', 'Mirpur-1', '01940691515', 0, '20190404003215_16603084_1793334047584440_2414049642738557826_n.jpg'),
(6, 'apsharabristy@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Apshara', 'Dhanmondi', '01638891256', 0, '20190404004053_IMG_20161110_134443.jpg'),
(7, 'apsharabriste@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Bristy', 'Uttara', '01932059907', 0, NULL),
(8, 'israfilsamrat3@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Israfil', 'Chowakbazar', '01686903686', 0, NULL),
(9, 'mdashikur9090@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Ashik', 'Old Town', '01920142715', 0, '20190422221738_');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookfishingplace`
--
ALTER TABLE `bookfishingplace`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fishingPlaceID` (`fishingPlaceID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `buyproduct`
--
ALTER TABLE `buyproduct`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `customer_ticket`
--
ALTER TABLE `customer_ticket`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `customer_ticket_ibfk_1` (`fishingPlaceID`),
  ADD KEY `customer_ticket_ibfk_2` (`userID`);

--
-- Indexes for table `fishingplace`
--
ALTER TABLE `fishingplace`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `fishing_result`
--
ALTER TABLE `fishing_result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `place_id` (`place_id`);

--
-- Indexes for table `hireproduct`
--
ALTER TABLE `hireproduct`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `place_rating`
--
ALTER TABLE `place_rating`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fishingPlaceID` (`fishingPlaceID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `catagory_id` (`catagory_id`);

--
-- Indexes for table `product_rating`
--
ALTER TABLE `product_rating`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `request_kit`
--
ALTER TABLE `request_kit`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `request_place`
--
ALTER TABLE `request_place`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookfishingplace`
--
ALTER TABLE `bookfishingplace`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buyproduct`
--
ALTER TABLE `buyproduct`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer_ticket`
--
ALTER TABLE `customer_ticket`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=471;

--
-- AUTO_INCREMENT for table `fishingplace`
--
ALTER TABLE `fishingplace`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `fishing_result`
--
ALTER TABLE `fishing_result`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hireproduct`
--
ALTER TABLE `hireproduct`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `place_rating`
--
ALTER TABLE `place_rating`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `product_rating`
--
ALTER TABLE `product_rating`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `request_kit`
--
ALTER TABLE `request_kit`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `request_place`
--
ALTER TABLE `request_place`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookfishingplace`
--
ALTER TABLE `bookfishingplace`
  ADD CONSTRAINT `bookfishingplace_ibfk_1` FOREIGN KEY (`fishingPlaceID`) REFERENCES `fishingplace` (`ID`),
  ADD CONSTRAINT `bookfishingplace_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `order` (`ID`);

--
-- Constraints for table `buyproduct`
--
ALTER TABLE `buyproduct`
  ADD CONSTRAINT `buyproduct_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ID`),
  ADD CONSTRAINT `buyproduct_ibfk_3` FOREIGN KEY (`OrderID`) REFERENCES `order` (`ID`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`ID`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `customer_ticket`
--
ALTER TABLE `customer_ticket`
  ADD CONSTRAINT `customer_ticket_ibfk_1` FOREIGN KEY (`fishingPlaceID`) REFERENCES `fishingplace` (`ID`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `customer_ticket_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`) ON UPDATE NO ACTION;

--
-- Constraints for table `fishing_result`
--
ALTER TABLE `fishing_result`
  ADD CONSTRAINT `fishing_result_ibfk_1` FOREIGN KEY (`place_id`) REFERENCES `fishingplace` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hireproduct`
--
ALTER TABLE `hireproduct`
  ADD CONSTRAINT `hireproduct_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ID`) ON DELETE NO ACTION,
  ADD CONSTRAINT `hireproduct_ibfk_3` FOREIGN KEY (`OrderID`) REFERENCES `order` (`ID`) ON DELETE NO ACTION;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `place_rating`
--
ALTER TABLE `place_rating`
  ADD CONSTRAINT `place_rating_ibfk_1` FOREIGN KEY (`fishingPlaceID`) REFERENCES `fishingplace` (`ID`),
  ADD CONSTRAINT `place_rating_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`catagory_id`) REFERENCES `catagory` (`ID`);

--
-- Constraints for table `product_rating`
--
ALTER TABLE `product_rating`
  ADD CONSTRAINT `product_rating_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`ID`),
  ADD CONSTRAINT `product_rating_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `request_kit`
--
ALTER TABLE `request_kit`
  ADD CONSTRAINT `request_kit_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`ID`);

--
-- Constraints for table `request_place`
--
ALTER TABLE `request_place`
  ADD CONSTRAINT `request_place_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
