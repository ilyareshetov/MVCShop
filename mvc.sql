-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 10, 2018 at 11:28 AM
-- Server version: 5.7.20
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `city` varchar(20) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `phone` varchar(10) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'customer'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `password`, `city`, `state`, `phone`, `role`) VALUES
(21, 'admin', '$2y$10$ELdpdOQpb48ukEVRyagc7uj4LuqVQZWUd2zNDJE1nrgO9xvEffOku', '', '', '1234567891', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `orderline`
--

CREATE TABLE `orderline` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ordertable`
--

CREATE TABLE `ordertable` (
  `order_id` int(11) NOT NULL,
  `order_date` date DEFAULT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `payment_id` int(11) NOT NULL DEFAULT '0',
  `total_price` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `card_No` varchar(20) DEFAULT NULL,
  `name` varchar(15) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `state` varchar(10) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `product_price` float DEFAULT NULL,
  `materials and environment` varchar(500) NOT NULL,
  `product info` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `materials and environment`, `product info`) VALUES
(101, 'Chef\'s knife, stainless steel', 16.99, 'Stainless steel', ' 15-year Limited Warranty. Read about the terms in the Limited Warranty brochure.\r\n Sturdy blade makes for easy dividing and chopping of foods such as meats and root vegetables.\r\n The knife is very durable, balanced, and easy to clean, since it is made of a single piece of stainless steel.\r\n Made of molybdenum/vanadium stainless steel, '),
(102, 'STORJORM', 249, 'Main parts/ Door: Fiberboard, Pigmented polyester powder coating, .\r\nMirror glass: Glass\r\nRail: Aluminum, Anodized\r\nBack panel: Fiberboard, Laminate (melamine foil)\r\nAdjustable shelf: Tempered glass\r\nLamp house: Aluminum, Powder coating\r\nDiffuser: Acrylic\r\nShade/ Mounting device: Polycarbonate plastic\r\nCord anchor: Polyamide\r\nJunction box: ABS plastic', 'The LED light source consumes up to 85% less energy and lasts 20 times longer than incandescent bulbs.\r\nGives a diffused light. Good for spreading light into larger areas of a bathroom.\r\nThe mirror comes with safety film on the back, which reduces the risk of injury if the glass is broken.'),
(103, 'MALM', 179, 'Top panel/ Side panel/ Rail/ Drawer front: Particleboard, Ash veneer, Stain, Clear acrylic lacquer\r\nPartition/ Support rail, back: Particleboard\r\nBack: Fiberboard\r\nDrawer bottom: Fiberboard, Acrylic paint', 'of course your home should be a safe place for the entire family. That’s why hardware is included so that you can attach the chest of drawers to the wall.\r\nReal wood veneer will make this chest of drawers age gracefully.\r\nThis high chest gives you plenty of storage without taking up too much room.\r\nSmooth running drawers with pull-out stop.\r\nIf you want to organize inside you can complement with SKUBB box, set of 6.\r\n'),
(104, 'NORDLI', 369, 'Top and base:\r\nPlinth: Fiberboard, Particleboard, Paper, Acrylic paint, Foil\r\nTop panel: Particleboard, Acrylic paint, Foil\r\n\r\nModular 2-drawer chest:\r\nSide panel: Particleboard, Acrylic paint, Foil\r\nBack panel/ Drawer bottom: Fiberboard, Foil\r\nDrawer front: Fiberboard, Fiberboard, Paper, Acrylic paint\r\nSide panel: Particleboard, Acrylic paint, Foil\r\nBack panel: Particleboard, Foil\r\nDrawer front: Fiberboard, Fiberboard, Paper, Acrylic paint\r\nDrawer bottom: Fiberboard, Foil', 'Of course your home should be a safe place for the entire family. That’s why hardware is included so that you can attach the chest of drawers to the wall.\r\nYou can use one modular chest of drawers or combine several to get a storage solution that perfectly suits your space.\r\nYou can easily create your own personal design by mixing chests of different colors.\r\nIntegrated damper catches the running drawer and closes it slowly, silently and softly.\r\n'),
(105, 'VALLENTUNA', 360, '\r\nSleeper seat section frame:\r\nFrame: Solid wood, Plywood, Particleboard, Polyurethane foam 2.0 lb/cu.ft.\r\nSeat cushion: Polyurethane foam 2.0 lb/cu.ft., High-resilience polyurethane foam (cold foam) 2.2 lb/cu.ft., Non-woven \r\n\r\nSleeper seat section cover:\r\nTotal composition: 65 % polyester, 35 % cotton\r\nTicking: 64 % cotton, 36 % polyester\r\nQuilting: Polyester wadding\r\nCover, other surfaces: Non-woven polypropylene', 'Add, remove or change functions to suit your needs, and choose covers to fit your style.\r\nEasily converts into a bed.\r\nThe cover is easy to keep clean as it is removable and can be machine washed.\r\n10-year limited warrranty. Read about the terms in the limited warranty brochure.\r\n'),
(106, 'VITTSJÖ', 59.99, 'Main parts: Steel, Epoxy/polyester powder coating\r\nBottom panel/ Top panel: Particleboard, Melamine foil, ABS plastic\r\nFixed shelf: Tempered glass', 'Tempered glass and metal are durable materials that provide an open, airy feel.\r\nA simple unit can be enough storage for a limited space or the foundation for a larger storage solution if your needs change.\r\nAdjustable feet for stability on uneven floors.\r\n'),
(107, 'FLINTAN / NOMINELL', 89.99, 'Pair of armrests:\r\nArmrest frame: Steel, Pigmented epoxy/polyester powder coating\r\nArmrest pad: High resilient polyurethane foam (cold foam).\r\n\r\nSwivel chair:\r\nTotal composition/ Total composition: 100 % polyester\r\nAdjustment lever/ Back/ Star base center/ Star base leg: Steel, Epoxy/polyester powder coating\r\nCover: Polypropylene\r\nSpring: Steel\r\nSeat: Molded eucalyptus plywood, Polyurethane foam.\r\nLumbar cushion: Polyester wadding', 'You can lean back with perfect balance, as the tilt tension mechanism automatically adjusts the resistance to suit your weight and movements.\r\nYou sit comfortably since the chair is adjustable in height.\r\nYour back gets support and extra relief from the built-in lumbar support.'),
(108, 'SKRUVSTA', 119, 'Plastic part: Polypropylene, Polyethylene\r\nTotal composition: 100 % cotton\r\nBase plate/ Adjustment lever: Steel, Epoxy powder coating\r\nBase: Steel, Epoxy/polyester powder coating\r\nFrame: Expanded polystyrene plastic, Plywood, Particleboard\r\nSeat cushion: Polyurethane foam 1.5 lb/cu.ft.\r\nLining: 100 % polypropylene\r\nZipper: 100 % polyester', 'You sit comfortably since the chair is adjustable in height.\r\nThe safety casters have a pressure-sensitive brake mechanism that keeps the chair in place when you stand up, and releases automatically when you sit down.\r\nThe casters are rubber coated to run smoothly on any type of floor.'),
(109, 'LERHAMN', 229, 'Chair:\r\nMain parts: Solid pine, Stain, Clear acrylic lacquer\r\nSeat: Fiberboard, Polyurethane foam 2.2 lb/cu.ft.\r\nProtective fabric: Polyester wadding\r\nCover: 35 % cotton, 65 % polyester\r\n\r\nTable:\r\nSolid pine, Stain, Clear acrylic lacquer', ''),
(110, 'RÖDARV', 24.99, 'Outer fabric: 100 % cotton\r\nEmbroidery: 100 % polyester\r\nFilling material: Duck feathers', 'Embroidery adds texture and luster to the cushion.\r\nYou can easily vary the look, because the two sides have different designs.\r\nThe duck feather filling feels fluffy and gives your body excellent support.\r\nThe buttons make the cover easy to remove.'),
(111, 'TJALLA', 9.99, 'Clock frame: Polystyrene, Acrylic paint\r\nFront protection: Glass', 'No disturbing ticking sounds since the clock has a silent quartz movement.\r\nHighly accurate at keeping time as it is fitted with a quartz movement.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `orderline`
--
ALTER TABLE `orderline`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `orderline_fk2` (`product_id`);

--
-- Indexes for table `ordertable`
--
ALTER TABLE `ordertable`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_fk` (`cust_id`),
  ADD KEY `order_fk2` (`payment_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ordertable`
--
ALTER TABLE `ordertable`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
