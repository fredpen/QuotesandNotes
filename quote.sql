-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 20, 2018 at 01:30 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quote`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(255) NOT NULL,
  `author` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `author`) VALUES
(2, 'Robert_Greene_(American_author)'),
(3, 'Tony_Robbins'),
(4, 'John_C._Maxwell'),
(5, 'Daniel_Goleman'),
(6, 'Jim_Rohn'),
(7, 'Micheal_Jordan'),
(8, 'Martin_luther_king_Jr'),
(9, 'Mark_Twain'),
(10, 'Malcom_Gladwell'),
(12, 'Joel_Osteen'),
(14, 'Jack_Ma\r\n'),
(15, 'J._Cole'),
(16, 'Benjamin_Franklin'),
(17, 'Barack_Obama'),
(20, 'Les_Brown'),
(21, 'James_Woods');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `quote_id` int(10) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `quote_id`, `comment`, `date`) VALUES
(137, 2, 85, 'grace', '2018-12-20 10:39:04'),
(138, 2, 85, 'gerere', '2018-12-20 10:39:13'),
(139, 2, 85, 'yes', '2018-12-20 10:42:17');

-- --------------------------------------------------------

--
-- Table structure for table `genre1`
--

CREATE TABLE `genre1` (
  `id` int(255) NOT NULL,
  `genre1` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre1`
--

INSERT INTO `genre1` (`id`, `genre1`) VALUES
(1, 'Inspirational'),
(2, 'motivational'),
(3, 'love'),
(4, 'life'),
(5, 'happiness'),
(6, 'positive'),
(7, 'nature'),
(8, 'family'),
(9, 'friendship'),
(10, 'work'),
(11, 'goals'),
(12, 'determination'),
(13, 'age'),
(14, 'jealosy'),
(15, 'knowledge'),
(16, 'amazing'),
(17, 'leadership'),
(18, 'anger'),
(19, 'learning'),
(20, 'beauty'),
(21, 'father'),
(22, 'mother'),
(23, 'brainy'),
(24, 'business'),
(25, 'money'),
(26, 'music'),
(27, 'communication'),
(28, 'courage'),
(29, 'dating'),
(30, 'relationship'),
(31, 'poetry'),
(33, 'freedom'),
(34, 'success'),
(36, 'sympathy'),
(37, 'teacher'),
(38, 'future'),
(39, 'technology'),
(40, 'teen'),
(41, 'gardening'),
(42, 'god'),
(44, 'thankful'),
(45, 'good'),
(46, 'intelligence'),
(47, 'independence'),
(48, 'women'),
(49, 'imagination'),
(50, 'wisdom'),
(51, 'humor'),
(52, 'wedding'),
(53, 'hope'),
(54, 'war'),
(55, 'home'),
(56, 'history'),
(57, 'valentine'),
(58, 'veterans'),
(59, 'health'),
(60, 'truth'),
(61, 'trust'),
(62, 'great'),
(63, 'travel'),
(64, 'graduation'),
(65, 'time'),
(66, 'goverment'),
(67, 'thanksgiving'),
(68, 'grateful'),
(69, 'teen'),
(70, 'strength'),
(71, 'forgiveness'),
(72, 'sport'),
(73, 'food'),
(74, 'space'),
(75, 'fitness'),
(76, 'society'),
(77, 'finance'),
(78, 'smile'),
(79, 'fear'),
(80, 'science'),
(81, 'famous'),
(82, 'sad'),
(83, 'romantic'),
(84, 'faith'),
(85, 'respect'),
(86, 'failure'),
(87, 'religion'),
(88, 'experience'),
(89, 'equality'),
(90, 'pet'),
(91, 'diet'),
(92, 'peace'),
(93, 'design'),
(94, 'death'),
(95, 'patience'),
(96, 'parenting'),
(98, 'art'),
(100, 'growth'),
(102, 'change'),
(103, 'attitude'),
(104, 'responsibility'),
(107, 'mistakes'),
(108, 'smart'),
(109, 'purpose'),
(110, 'potential'),
(111, 'talent'),
(112, 'gift'),
(113, 'desire'),
(114, 'excellent'),
(115, 'integrity'),
(116, 'character'),
(117, 'comfort'),
(118, 'control'),
(119, 'influence'),
(120, 'decision'),
(121, 'vision'),
(122, 'choice'),
(123, 'focus'),
(124, 'today'),
(125, 'Worry'),
(126, 'Trouble'),
(127, 'discipline'),
(128, 'drive'),
(129, 'praise'),
(130, 'action'),
(131, 'contentment'),
(132, 'wealth'),
(133, 'savings'),
(134, 'passion'),
(135, 'power'),
(136, 'fun'),
(137, 'persistence'),
(138, 'energy'),
(139, 'generosity'),
(140, 'shame');

-- --------------------------------------------------------

--
-- Table structure for table `genre2`
--

CREATE TABLE `genre2` (
  `id` int(255) NOT NULL,
  `genre2` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre2`
--

INSERT INTO `genre2` (`id`, `genre2`) VALUES
(1, 'Inspirational'),
(2, 'motivational'),
(3, 'love'),
(4, 'life'),
(5, 'happiness'),
(6, 'positive'),
(7, 'nature'),
(8, 'family'),
(9, 'friendship'),
(10, 'work'),
(11, 'goals'),
(12, 'determination'),
(13, 'age'),
(14, 'jealosy'),
(15, 'knowledge'),
(16, 'amazing'),
(17, 'leadership'),
(18, 'anger'),
(19, 'learning'),
(20, 'beauty'),
(21, 'father'),
(22, 'mother'),
(23, 'brainy'),
(24, 'business'),
(25, 'money'),
(26, 'music'),
(27, 'communication'),
(28, 'courage'),
(29, 'dating'),
(30, 'relationship'),
(31, 'poetry'),
(33, 'freedom'),
(34, 'success'),
(36, 'sympathy'),
(37, 'teacher'),
(38, 'future'),
(39, 'technology'),
(40, 'teen'),
(41, 'gardening'),
(42, 'god'),
(44, 'thankful'),
(45, 'good'),
(46, 'intelligence'),
(47, 'independence'),
(48, 'women'),
(49, 'imagination'),
(50, 'wisdom'),
(51, 'humor'),
(52, 'wedding'),
(53, 'hope'),
(54, 'war'),
(55, 'home'),
(56, 'history'),
(57, 'valentine'),
(58, 'veterans'),
(59, 'health'),
(60, 'truth'),
(61, 'trust'),
(62, 'great'),
(63, 'travel'),
(64, 'graduation'),
(65, 'time'),
(66, 'goverment'),
(67, 'thanksgiving'),
(68, 'grateful'),
(69, 'teen'),
(70, 'strength'),
(71, 'forgiveness'),
(72, 'sport'),
(73, 'food'),
(74, 'space'),
(75, 'fitness'),
(76, 'society'),
(77, 'finance'),
(78, 'smile'),
(79, 'fear'),
(80, 'science'),
(81, 'famous'),
(82, 'sad'),
(83, 'romantic'),
(84, 'faith'),
(85, 'respect'),
(86, 'failure'),
(87, 'religion'),
(88, 'experience'),
(89, 'equality'),
(90, 'pet'),
(91, 'diet'),
(92, 'peace'),
(93, 'design'),
(94, 'death'),
(95, 'patience'),
(96, 'parenting'),
(98, 'art'),
(100, 'growth'),
(102, 'change'),
(103, 'attitude'),
(104, 'responsibility'),
(107, 'mistakes'),
(108, 'smart'),
(109, 'purpose'),
(110, 'potential'),
(111, 'talent'),
(112, 'gift'),
(113, 'desire'),
(114, 'excellent'),
(115, 'integrity'),
(116, 'character'),
(117, 'comfort'),
(118, 'control'),
(119, 'influence'),
(120, 'decision'),
(121, 'vision'),
(122, 'choice'),
(123, 'focus'),
(124, 'today'),
(125, 'Worry'),
(126, 'Trouble'),
(127, 'discipline'),
(128, 'drive'),
(129, 'praise'),
(130, 'action'),
(131, 'contentment'),
(132, 'wealth'),
(133, 'savings'),
(134, 'passion'),
(135, 'power'),
(136, 'fun'),
(137, 'persistence'),
(138, 'energy'),
(139, 'generosity'),
(140, 'shame'),
(141, 'shame');

-- --------------------------------------------------------

--
-- Table structure for table `genre3`
--

CREATE TABLE `genre3` (
  `id` int(255) NOT NULL,
  `genre3` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre3`
--

INSERT INTO `genre3` (`id`, `genre3`) VALUES
(1, 'Inspirational'),
(2, 'motivational'),
(3, 'love'),
(4, 'life'),
(5, 'happiness'),
(6, 'positive'),
(7, 'nature'),
(8, 'family'),
(9, 'friendship'),
(10, 'work'),
(11, 'goals'),
(12, 'determination'),
(13, 'age'),
(14, 'jealosy'),
(15, 'knowledge'),
(16, 'amazing'),
(17, 'leadership'),
(18, 'anger'),
(19, 'learning'),
(20, 'beauty'),
(21, 'father'),
(22, 'mother'),
(23, 'brainy'),
(24, 'business'),
(25, 'money'),
(26, 'music'),
(27, 'communication'),
(28, 'courage'),
(29, 'dating'),
(30, 'relationship'),
(31, 'poetry'),
(33, 'freedom'),
(34, 'success'),
(36, 'sympathy'),
(37, 'teacher'),
(38, 'future'),
(39, 'technology'),
(40, 'teen'),
(41, 'gardening'),
(42, 'god'),
(44, 'thankful'),
(45, 'good'),
(46, 'intelligence'),
(47, 'independence'),
(48, 'women'),
(49, 'imagination'),
(50, 'wisdom'),
(51, 'humor'),
(52, 'wedding'),
(53, 'hope'),
(54, 'war'),
(55, 'home'),
(56, 'history'),
(57, 'valentine'),
(58, 'veterans'),
(59, 'health'),
(60, 'truth'),
(61, 'trust'),
(62, 'great'),
(63, 'travel'),
(64, 'graduation'),
(65, 'time'),
(66, 'goverment'),
(67, 'thanksgiving'),
(68, 'grateful'),
(69, 'teen'),
(70, 'strength'),
(71, 'forgiveness'),
(72, 'sport'),
(73, 'food'),
(74, 'space'),
(75, 'fitness'),
(76, 'society'),
(77, 'finance'),
(78, 'smile'),
(79, 'fear'),
(80, 'science'),
(81, 'famous'),
(82, 'sad'),
(83, 'romantic'),
(84, 'faith'),
(85, 'respect'),
(86, 'failure'),
(87, 'religion'),
(88, 'experience'),
(89, 'equality'),
(90, 'pet'),
(91, 'diet'),
(92, 'peace'),
(93, 'design'),
(94, 'death'),
(95, 'patience'),
(96, 'parenting'),
(98, 'art'),
(100, 'growth'),
(102, 'change'),
(103, 'attitude'),
(104, 'responsibility'),
(107, 'mistakes'),
(108, 'smart'),
(109, 'purpose'),
(110, 'potential'),
(111, 'talent'),
(112, 'gift'),
(113, 'desire'),
(114, 'excellent'),
(115, 'integrity'),
(116, 'character'),
(117, 'comfort'),
(118, 'control'),
(119, 'influence'),
(120, 'decision'),
(121, 'vision'),
(122, 'choice'),
(123, 'focus'),
(124, 'today'),
(125, 'Worry'),
(126, 'Trouble'),
(127, 'discipline'),
(128, 'drive'),
(129, 'praise'),
(130, 'action'),
(131, 'contentment'),
(132, 'wealth'),
(133, 'savings'),
(134, 'passion'),
(135, 'power'),
(136, 'fun'),
(137, 'persistence'),
(138, 'energy'),
(139, 'generosity'),
(140, 'shame'),
(141, 'shame');

-- --------------------------------------------------------

--
-- Table structure for table `quoteLovers`
--

CREATE TABLE `quoteLovers` (
  `id` int(255) NOT NULL,
  `quote` int(255) NOT NULL,
  `user` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quoteLovers`
--

INSERT INTO `quoteLovers` (`id`, `quote`, `user`) VALUES
(111, 84, 2),
(112, 87, 2),
(113, 95, 2),
(114, 91, 2),
(115, 94, 2),
(116, 97, 2),
(117, 95, 0),
(118, 82, 0),
(119, 85, 1),
(120, 92, 1),
(121, 81, 1),
(122, 93, 0),
(123, 87, 1),
(124, 86, 1),
(125, 88, 1),
(126, 89, 1),
(127, 81, 2),
(128, 93, 2),
(129, 86, 2),
(130, 92, 2),
(131, 89, 2),
(132, 83, 2),
(133, 90, 2),
(134, 82, 2),
(135, 96, 2);

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` int(255) NOT NULL,
  `dt` varchar(10) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `user` int(10) NOT NULL,
  `author` int(10) NOT NULL,
  `genre1` int(10) NOT NULL,
  `genre2` int(10) NOT NULL,
  `genre3` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `dt`, `content`, `user`, `author`, `genre1`, `genre2`, `genre3`) VALUES
(81, '2018-11-03', 'Do not anticipate trouble, or worry about what may never happen. Keep in the\r\nsunlight', 1, 16, 53, 126, 125),
(82, '2018-11-03', 'Drive thy business or it will drive thee', 1, 16, 24, 118, 127),
(83, '2018-11-03', 'If a man empties his purse into his head no one can take it away from him. An\r\ninvestment in knowledge always pays the best interest.', 1, 16, 38, 15, 19),
(84, '2018-11-04', 'Drive thy business or it will drive thee.', 1, 16, 24, 118, 135),
(85, '2018-11-04', 'You may delay, but time will not.', 1, 16, 38, 4, 65),
(86, '2018-11-04', 'Well done is better than well said', 1, 16, 130, 114, 129),
(87, '2018-11-04', 'Content makes poor men rich; discontentment makes rich men poor', 1, 16, 131, 119, 132),
(88, '2018-11-04', 'Who is wise? He that learns from every one', 1, 16, 15, 19, 50),
(89, '2018-11-04', 'If you would be wealthy. think of saving as well as getting', 1, 16, 25, 133, 132),
(90, '2018-11-04', 'Who is powerful? He that governs his Passions', 1, 16, 118, 134, 135),
(91, '2018-11-04', 'Early to bed and early to rise makes a man healthy, wealthy, and wise', 1, 16, 59, 65, 132),
(92, '2018-11-04', 'Employ your time well, if you mean to get leisure', 1, 16, 127, 136, 65),
(93, '2018-11-04', 'Do you love life? Then do not squander time, for thatâ€™s the stuff life is made of', 1, 16, 4, 3, 65),
(94, '2018-11-04', 'Energy and persistence conquer all things.', 1, 16, 12, 138, 137),
(95, '2018-11-04', 'Take it from Richard, poor and lame, whatâ€™s begun in anger ends in shame', 1, 16, 18, 88, 140),
(96, '2018-11-04', 'Perhaps the history of the errors of mankind, all things considered, is more valuable and interesting than that of their discoveries', 1, 16, 56, 4, 107),
(97, '2018-11-04', 'Having been poor is no shame, but being ashamed of it, is.', 1, 16, 25, 140, 132);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptionEmail`
--

CREATE TABLE `subscriptionEmail` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscriptionEmail`
--

INSERT INTO `subscriptionEmail` (`id`, `email`) VALUES
(1, 'fredricsola@yahoo.com'),
(2, ''),
(3, 'fredricksola@yahoo.com'),
(4, 'fredricksola@yahoo.com'),
(5, 'fredricksola@yahoo.com'),
(6, 'fredricksola@yahoo.com'),
(7, 'fredricksola@yahoo.com'),
(8, ''),
(9, ''),
(10, ''),
(11, ''),
(12, '');

-- --------------------------------------------------------

--
-- Table structure for table `sub_comment`
--

CREATE TABLE `sub_comment` (
  `id` int(100) NOT NULL,
  `comment_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `sub_comment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `firstName` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `dt` varchar(255) NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`firstName`, `lastname`, `username`, `email`, `pwd`, `dt`, `id`) VALUES
('Oladipupo', 'Fredrick', 'fredpen', 'fredrickksola@gmail.com', '15e5c87b18c1289d45bb4a72961b58e8', '2018-10-05 09:45:25', 1),
('Oladele', 'Ikramah', 'ikkybabe', 'ikky@gmail.com', '15e5c87b18c1289d45bb4a72961b58e8', '2018-10-07 05:12:03', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genre1`
--
ALTER TABLE `genre1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genre2`
--
ALTER TABLE `genre2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genre3`
--
ALTER TABLE `genre3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quoteLovers`
--
ALTER TABLE `quoteLovers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptionEmail`
--
ALTER TABLE `subscriptionEmail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_comment`
--
ALTER TABLE `sub_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `genre1`
--
ALTER TABLE `genre1`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `genre2`
--
ALTER TABLE `genre2`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `genre3`
--
ALTER TABLE `genre3`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `quoteLovers`
--
ALTER TABLE `quoteLovers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `subscriptionEmail`
--
ALTER TABLE `subscriptionEmail`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sub_comment`
--
ALTER TABLE `sub_comment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
