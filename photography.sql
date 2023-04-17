-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 24, 2022 at 03:32 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `photography`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `surname`, `email`, `message`) VALUES
(1, 'Lavinia Pacheco', 'Mathis', 'werohamus@mailinator.com', 'Vel sed ut consequat'),
(2, 'Dillon Velasquez', 'Blanchard', 'kirumuk@mailinator.com', 'Omnis earum amet au'),
(3, 'Dillon Velasquez', 'Blanchard', 'kirumuk@mailinator.com', 'Omnis earum amet au'),
(4, 'Dillon Velasquez', 'Blanchard', 'kirumuk@mailinator.com', 'Omnis earum amet au'),
(5, 'Dillon Velasquez', 'Blanchard', 'kirumuk@mailinator.com', 'Omnis earum amet au'),
(6, 'Dillon Velasquez', 'Blanchard', 'kirumuk@mailinator.com', 'Omnis earum amet au'),
(9, 'Teegan Graves', 'Carver', 'hyqybo@mailinator.com', 'Nisi nobis nobis dui'),
(10, 'Xenos Willis', 'Ortega', 'xuvyrybaq@mailinator.com', 'Et voluptas aliquam '),
(11, 'Shafira Dyer', 'Hurst', 'tykudohat@mailinator.com', 'Ratione eius occaeca'),
(12, 'Martha Hurst', 'Figueroa', 'hedesoc@mailinator.com', 'Sit facilis in reru'),
(17, 'Paula Morse', 'Manning', 'zynotum@mailinator.com', 'Ipsum doloribus sit'),
(18, 'Paula Morse', 'Manning', 'zynotum@mailinator.com', 'Ipsum doloribus sit'),
(19, 'Aiko Rosa', 'Olsen', 'dizac@mailinator.com', 'Consequat Ullam imp'),
(20, 'Aiko Rosa', 'Olsen', 'dizac@mailinator.com', 'Consequat Ullam imp'),
(21, 'Scarlett Roy', 'Jensen', 'qufewemok@mailinator.com', 'Itaque temporibus ip'),
(22, 'Cameran Holder', 'Cox', 'kijybolevo@mailinator.com', 'In in nulla molestia'),
(23, 'Cameran Holder', 'Cox', 'kijybolevo@mailinator.com', 'In in nulla molestia'),
(24, 'Cameran Holder', 'Cox', 'kijybolevo@mailinator.com', 'In in nulla molestia'),
(25, 'Kim Warren', 'Mendoza', 'rodoze@mailinator.com', 'Culpa do veniam ea '),
(26, 'Kim Warren', 'Mendoza', 'rodoze@mailinator.com', 'Culpa do veniam ea '),
(27, 'Kim Warren', 'Mendoza', 'rodoze@mailinator.com', 'Culpa do veniam ea '),
(28, 'Kyla Melendez', 'Acevedo', 'nukehowyte@mailinator.com', 'Est do laboriosam e'),
(29, 'Kyla Melendez', 'Acevedo', 'nukehowyte@mailinator.com', 'Est do laboriosam e'),
(30, 'Kyla Melendez', 'Acevedo', 'nukehowyte@mailinator.com', 'Est do laboriosam e'),
(31, 'Dawn Salazar', 'Raymond', 'dysuj@mailinator.com', 'Rerum fugit corpori'),
(32, 'Dawn Salazar', 'Raymond', 'dysuj@mailinator.com', 'Rerum fugit corpori'),
(33, 'Kaden Lester', 'Deleon', 'rato@mailinator.com', 'Eveniet dolorem exp'),
(34, 'Kaden Lester', 'Deleon', 'rato@mailinator.com', 'Eveniet dolorem exp'),
(35, 'Patience Reeves', 'Grimes', 'coqyqo@mailinator.com', 'Consequatur at culpa'),
(36, 'Maggy Conner', 'Clark', 'kilogu@mailinator.com', 'Sit est sequi est s'),
(37, 'Holly Glover', 'Sweeney', 'bocy@mailinator.com', 'Officia dolores est'),
(38, 'Shkurta', 'Hoxha', 'kelamemig@mailinator.com', 'tew45rhyyetyr'),
(39, 'ilir', 'koci', 'ilirkoci@gmail.com', 'pershendetje!');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `step` int(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `teaser` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `title`, `step`, `icon`, `teaser`) VALUES
(2, 'Passion', 1, 'passion.png', 'Our desire to produce good work runs deep â€“ thatâ€™s what lets us handle every project with fresh energy and enthusiasm.'),
(3, 'Empathy', 2, 'empathy.png', 'While we share our knowledge and experience, we listen hard to understand your business and your needs.'),
(4, 'Teamwork', 3, 'teamWork.png', 'We are united with you - think of us as extra members of your team with all the skills you need.');

-- --------------------------------------------------------

--
-- Table structure for table `homeslider`
--

CREATE TABLE `homeslider` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `homeslider`
--

INSERT INTO `homeslider` (`id`, `title`, `image`) VALUES
(10, 'Nature Photography', 'Nature-Photography.jpg'),
(11, 'Animals Photography', 'Animal-Photography.jpg'),
(13, 'Street Photography', 'Street-Photography.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `navigation`
--

CREATE TABLE `navigation` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `navigation`
--

INSERT INTO `navigation` (`id`, `title`, `url`) VALUES
(5, 'Home', '/'),
(6, 'About', 'about.php'),
(7, 'Portfolio', 'portfolio.php'),
(8, 'Contact', 'contact.php');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `image`) VALUES
(3, 'Nature-photography4.jpg'),
(4, 'Nature-photography2.jpg'),
(5, 'Nature-photography3.jpg'),
(6, 'street-photography1.jpg'),
(7, 'street-photography2.jpg'),
(8, 'street-photography3.jpg'),
(9, 'Animals-photography2.jpg'),
(10, 'Animals-photography1.jpg'),
(11, 'Animals-photography3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `biography` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `firstname`, `lastname`, `position`, `image`, `biography`) VALUES
(2, 'Shkurta', 'Hoxha', 'Founder & Photographer', 'Shkurta-Photographer.jpg', 'As a photographer I want my photos to imagine a bold, exciting worldâ€”one in which the subject, be it a product or a person, stands out, shines. Viewers need to be transported, and my photos achieve that through careful compositions of color and tone. This is the end result of a process by which I bring the creative brief to life and make the subject part of a story.\r\nThis is the power that photographyâ€™s always had for me. I recognized it when I took my first photo class, back when I was growing up in Puerto Rico. So, I apprenticed with photographers and shot for a variety of publications. Eventually, to continue my education, I moved to the United States. Here Iâ€™ve broadened my capacities and become an art director, shepherding ideas from briefs to concepts to production shoots to deliverables. To each project I bring my experience and my keen eye.'),
(3, 'Vanesa', 'Hoxha', 'Photographer', 'Vanesa-Photographer.jpg', 'It is important to know that a great photographer is one who captures all that is commonly unnoticed. I work with a different â€˜eyeâ€™ altogether. The lens of a camera explores a world of various perspectives. Some treat photography as an art, they feel it has the power to manipulate realities and present them in an attractive way. Others feel that art and photography are miles apart, since a photograph reflects exactly whatâ€™s in front of the camera.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'shkurtahoxha', 'e554441b7e6e20ee6818b6851f8a57d2', 'admin', '2022-04-22 10:43:54'),
(2, 'vanesahoxha', 'c09ab6c839d4ca9460cdb0e5303d3faa', 'user', '2022-04-22 10:43:54'),
(8, 'fjollahoxha', '$2y$10$Ira03fyNRiZ/lOo3bNhHF.LO1i/Jg3/sWoBg3w/oTCNLYzP6KuoAa', 'user', '2022-04-22 11:04:59'),
(9, 'ramizhoxha', '$2y$10$LdkqKEuWVctdNODOuFYD5e/nrO0Xe6d6r56ZC3ESbtKHeu9eeoVi6', 'user', '2022-04-22 21:22:12'),
(13, 'saranda', '123456789', 'user', '2022-04-23 15:50:28'),
(25, 'shkurta', '$2y$10$bkiWB/hvYtiB/EgvRMvGzOClpWAG1JQ6A.ZjvNaD3c3cDSjR5guCa', 'user', '2022-04-24 13:15:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homeslider`
--
ALTER TABLE `homeslider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `homeslider`
--
ALTER TABLE `homeslider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `navigation`
--
ALTER TABLE `navigation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
