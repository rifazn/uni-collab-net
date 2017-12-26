-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 26, 2017 at 11:39 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uni_project_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `msg` varchar(1000) NOT NULL,
  `id` int(11) NOT NULL,
  `by_user` varchar(200) NOT NULL,
  `timedate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chating_with`
--

CREATE TABLE `chating_with` (
  `id` int(11) NOT NULL,
  `to_user` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chat_global`
--

CREATE TABLE `chat_global` (
  `msg` varchar(1000) NOT NULL,
  `id` int(11) NOT NULL,
  `by_user` varchar(300) NOT NULL,
  `timedate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `by_who` varchar(300) NOT NULL,
  `comment_at` varchar(200) NOT NULL,
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plant`
--

CREATE TABLE `plant` (
  `name` varchar(30) DEFAULT NULL,
  `species` varchar(30) DEFAULT NULL,
  `seed_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plant`
--

INSERT INTO `plant` (`name`, `species`, `seed_date`) VALUES
('Marcha', 'Bry', NULL),
('Marchana', 'Bryrophyte', NULL),
('Cycas1', 'Gymnosperm', NULL),
('Marchana2', 'Bryrophyte', NULL),
('Cycas2', 'Gymnosperm', NULL),
('A', '1', NULL),
('B', '2', NULL),
('A1', '1', NULL),
('B1', '2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `content` varchar(4000) NOT NULL,
  `email` varchar(400) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `email`, `created_at`, `updated_at`) VALUES
(2, 'first post', 'something posting here', 'rifazn@protonmail.com', '2017-12-17 21:55:30', NULL),
(4, 'shadows', '... and how you can get lost in there.', 'rifazn@protonmail.com', '2017-12-17 22:27:03', NULL),
(5, 'aslkdjlaskj', 'sajlkdjaslkjdlasj', 'rifaz@rr.com', '2017-12-20 18:19:16', NULL),
(6, 'slkjdhakshdfkjah', 'aksjdhaskhdksahk', 'rifaz@rr.com', '2017-12-20 18:19:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(11) NOT NULL,
  `by_user` varchar(200) NOT NULL,
  `timedate` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `by_user`, `timedate`) VALUES
(21, 'rifaz@rr.com', '2017-12-27 02:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `resources_for`
--

CREATE TABLE `resources_for` (
  `id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `link` varchar(200) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `takes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resources_for`
--

INSERT INTO `resources_for` (`id`, `r_id`, `link`, `photo`, `takes_id`) VALUES
(1, 21, '', 'images/photo_2017-12-18_23-24-24.jpg', 1),
(2, 21, '', 'images/photo_2017-12-18_23-24-29.jpg', 1),
(3, 21, '', 'images/photo_2017-12-18_23-24-41.jpg', 1),
(4, 21, '', 'images/photo_2017-12-18_23-24-46.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `takes`
--

CREATE TABLE `takes` (
  `email` varchar(300) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_code` varchar(50) DEFAULT NULL,
  `course_title` varchar(50) DEFAULT NULL,
  `course_sec` varchar(50) DEFAULT NULL,
  `course_semester` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `takes`
--

INSERT INTO `takes` (`email`, `course_id`, `course_code`, `course_title`, `course_sec`, `course_semester`) VALUES
('rifaz@rr.com', 1, 'csi_212', 'Algorithms', 'A', 'fall2017'),
('rifaz@rr.com', 2, 'csi_213', 'Digital Logic Design', 'B', 'fall2017'),
('rifaz@rr.com', 3, 'csi_214', 'Humble Lectronics', 'C', 'fall2017'),
('rifaz@rr.com', 4, 'csi_215', 'Kind Denial Services', 'S', 'fall2017'),
('rifaz@rr.com', 5, 'csi_216', 'ultimates', 'Z', 'fall2017'),
('ss@ss.com', 6, 'test', 'test', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(300) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `uni_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `pass`, `uni_id`, `name`, `user_name`) VALUES
('nahiyan', '$2y$10$54dz2wrvf3qMYV5ookSCwuTQGbRFXobDEzgp702OsnOX5/m9Jk0C6', 0, NULL, NULL),
('Rifaz', '', 123, NULL, NULL),
('rifaz@rr.com', '$2y$10$3GNffTIicfdFEUsUiOQQt.celiphzFtNcEBDEnsqeXVBpznWr7Loy', 0, 'Mr. Hyde', NULL),
('rifazn', '$2y$10$QLs./fn.n8CbeaIyVD/r6.Dedq7Zc7YwZnN9HEF4fs3iuMVOqVpgq', 0, NULL, NULL),
('rifazn@protonmail.com', '$2y$10$TWAac6HTrntK48sdW.BFqe/tfgdhK9I7LhFC5ZhD2f7BKccpmhYvS', 0, NULL, NULL),
('sourav@s.com', '$2y$10$Tp5//en/hcP3ne.Z1mJIduetaXFe2idCJDKgBEpZL24aJQuGZukb.', 0, NULL, NULL),
('ss@ss.com', '$2y$10$9A9sV5f7LYJv3lM8ZXs5fe4kfS0azfVUw6MJHYwIo9aFkTtEmO84O', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wb`
--

CREATE TABLE `wb` (
  `id` int(20) NOT NULL,
  `email` varchar(300) NOT NULL,
  `timedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `course_id` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wb_global`
--

CREATE TABLE `wb_global` (
  `time_date` int(11) NOT NULL,
  `email` varchar(300) NOT NULL,
  `content` varchar(5000) DEFAULT '',
  `id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wb_global`
--

INSERT INTO `wb_global` (`time_date`, `email`, `content`, `id`) VALUES
(0, 'rifazn@protonmail.com', NULL, 2),
(0, 'rifazn@protonmail.com', 'blah bluh blih blan. lets test it.', 3),
(0, 'rifazn@protonmail.com', '# Nothing really\r\nblah bluh blih blan. lets test it.', 4),
(0, 'rifazn@protonmail.com', '# Nothing really\r\nblah bluh blih blan. lets test it.', 5),
(0, 'sourav@s.com', '# Nothing really\r\nblah bluh blih blan. lets test it.\r\n\r\nkjdsahdkjhaslkjdhflkjsahdlksah \'df', 6),
(0, 'sourav@s.com', '# Nothing really\r\nblah bluh blih blan. lets test it.\r\n\r\nkjdsahdkjhaslkjdhflkjsahdlksah \'df', 7),
(0, 'rifazn@protonmail.com', '# Nothing really\r\nblah bluh blih blan. lets test it.\r\n\r\nkjdsahdkjhaslkjdhflkjsahdlksah \'df\r\n\r\nCT 4:\r\n2017/11/20\r\nhlkhkdsah', 8),
(0, 'rifazn@protonmail.com', '# Nothing really\r\nblah bluh blih blan. lets test it.\r\n\r\nkjdsahdkjhaslkjdhflkjsahdlksah \'df\r\n\r\nCT 4:\r\n2017/11/20\r\nhlkhkdsah\r\n\r\n<body>\r\n<a href=\"#\">asdasdasdas</a>\r\n<img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Macaca_fuscata_fuscata1.jpg/1200px-Macaca_fuscata_fuscata1.jpg\" />\r\n</body>', 9),
(0, 'rifazn@protonmail.com', '# Nothing really\r\nblah bluh blih blan. lets test it.\r\n\r\nkjdsahdkjhaslkjdhflkjsahdlksah \'df\r\n\r\nCT 4:\r\n2017/11/20\r\nhlkhkdsah\r\n\r\n&lt;body&gt;\r\n&lt;a href=\"#\"&gt;asdasdasdas&lt;/a&gt;\r\n&lt;img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Macaca_fuscata_fuscata1.jpg/1200px-Macaca_fuscata_fuscata1.jpg\" /&gt;\r\n&lt;/body&gt;', 10),
(0, 'rifazn@protonmail.com', '# Nothing really\r\nblah bluh blih blan. lets test it.\r\n\r\nkjdsahdkjhaslkjdhflkjsahdlksah \'df\r\n\r\nCT 4:\r\n2017/11/20\r\nhlkhkdsah\r\n\r\n&lt;body&gt;\r\n&lt;a href=\"#\"&gt;asdasdasdas&lt;/a&gt;\r\n&lt;img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Macaca_fuscata_fuscata1.jpg/1200px-Macaca_fuscata_fuscata1.jpg\" /&gt;\r\n&lt;/body&gt;', 11),
(0, 'rifazn@protonmail.com', '# Nothing really\r\nblah bluh blih blan. lets test it.\r\n\r\nkjdsahdkjhaslkjdhflkjsahdlksah \'df\r\n\r\nCT 4:\r\n2017/11/20\r\nhlkhkdsah\r\n\r\n&lt;body&gt;\r\n&lt;a href=\"#\"&gt;asdasdasdas&lt;/a&gt;\r\n&lt;img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Macaca_fuscata_fuscata1.jpg/1200px-Macaca_fuscata_fuscata1.jpg\" /&gt;\r\n&lt;/body&gt;', 12),
(0, 'rifazn@protonmail.com', '# Nothing really\r\nblah bluh blih blan. lets test it.\r\n\r\nkjdsahdkjhaslkjdhflkjsahdlksah \'df\r\n\r\nCT 4:\r\n2017/11/20\r\nhlkhkdsah\r\n\r\n&lt;body&gt;\r\n&lt;a href=\"#\"&gt;asdasdasdas&lt;/a&gt;\r\n&lt;img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Macaca_fuscata_fuscata1.jpg/1200px-Macaca_fuscata_fuscata1.jpg\" /&gt;\r\n&lt;/body&gt;', 13),
(0, 'sourav@s.com', '# Nothing really\r\nblah bluh blih blan. lets test it.\r\n\r\nkjdsahdkjhaslkjdhflkjsahdlksah \'df\r\n\r\nCT 4:\r\n2017/11/20\r\nhlkhkdsah\r\n\r\n&lt;body&gt;\r\n&lt;a href=\"#\"&gt;asdasdasdas&lt;/a&gt;\r\n&lt;img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Macaca_fuscata_fuscata1.jpg/1200px-Macaca_fuscata_fuscata1.jpg\" /&gt;\r\n&lt;/body&gt;', 14),
(0, 'rifazn@protonmail.com', '# Nothing really\r\nblah bluh blih blan. lets test it.\r\n\r\nkjdsahdkjhaslkjdhflkjsahdlksah \'df\r\n\r\nCT 4:\r\n2017/11/20\r\nhlkhkdsah\r\n\r\n<body>\r\n<a href=\"#\">asdasdasdas</a>\r\n<img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Macaca_fuscata_fuscata1.jpg/1200px-Macaca_fuscata_fuscata1.jpg\" />\r\n</body>', 15),
(0, 'rifazn@protonmail.com', '# Nothing really\r\nblah bluh blih blan. lets test it.\r\n\r\nkjdsahdkjhaslkjdhflkjsahdlksah \'df\r\n\r\nCT 4:\r\n2017/11/20\r\nhlkhkdsah\r\n\r\n<body>\r\n<a href=\"#\">asdasdasdas</a>\r\n<img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Macaca_fuscata_fuscata1.jpg/1200px-Macaca_fuscata_fuscata1.jpg\" />\r\n</body>', 16),
(0, 'rifazn@protonmail.com', '# Nothing really\r\nblah bluh blih blan. lets test it.\r\n\r\nkjdsahdkjhaslkjdhflkjsahdlksah \'df\r\n\r\nCT 4:\r\n2017/11/20\r\nhlkhkdsah\r\n\r\n<body>\r\n<a href=\"#\">asdasdasdas</a>\r\n<img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Macaca_fuscata_fuscata1.jpg/1200px-Macaca_fuscata_fuscata1.jpg\" />\r\n</body>', 17),
(0, 'rifazn@protonmail.com', '# Nothing really\r\nblah bluh blih blan. lets test it.\r\n\r\nkjdsahdkjhaslkjdhflkjsahdlksah \'df\r\n\r\nCT 4:\r\n2017/11/20\r\nhlkhkdsah\r\n\r\n&lt;body&gt;\r\n&lt;a href=\"#\"&gt;asdasdasdas&lt;/a&gt;\r\n&lt;img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Macaca_fuscata_fuscata1.jpg/1200px-Macaca_fuscata_fuscata1.jpg\" /&gt;\r\n&lt;/body&gt;', 18),
(0, 'rifazn@protonmail.com', '# Nothing really\r\nblah bluh blih blan. lets test it.\r\n\r\nkjdsahdkjhaslkjdhflkjsahdlksah \'df\r\n\r\nCT 4:\r\n2017/11/20\r\nhlkhkdsah\r\n\r\n<body>\r\n<a href=\"#\">asdasdasdas</a>\r\n<img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Macaca_fuscata_fuscata1.jpg/1200px-Macaca_fuscata_fuscata1.jpg\" />\r\n</body>', 19),
(0, 'rifazn@protonmail.com', '# Nothing really\r\nblah bluh blih blan. lets test it.\r\n\r\nkjdsahdkjhaslkjdhflkjsahdlksah \'df\r\n\r\nCT 4:\r\n2017/11/20\r\nhlkhkdsah\r\n\r\n<body>\r\n<a href=\"#\">asdasdasdas</a>\r\n<img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Macaca_fuscata_fuscata1.jpg/1200px-Macaca_fuscata_fuscata1.jpg\" />\r\n</body>', 20),
(0, 'rifazn@protonmail.com', '# Nothing really\r\nblah bluh blih blan. lets test it.\r\n\r\nkjdsahdkjhaslkjdhflkjsahdlksah \'df\r\n\r\nCT 4:\r\n2017/11/20\r\nhlkhkdsah\r\n\r\n<body>\r\n<a href=\"#\">asdasdasdas</a>\r\n<img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Macaca_fuscata_fuscata1.jpg/1200px-Macaca_fuscata_fuscata1.jpg\" />\r\n</body>', 21),
(0, 'rifazn@protonmail.com', NULL, 22),
(0, 'rifazn@protonmail.com', '', 23),
(0, 'rifazn@protonmail.com', NULL, 24),
(0, 'rifaz@rr.com', NULL, 25),
(0, 'rifaz@rr.com', NULL, 26),
(0, 'rifaz@rr.com', NULL, 27),
(0, 'rifaz@rr.com', 'just a test brah', 28),
(0, 'rifaz@rr.com', NULL, 29),
(0, 'rifaz@rr.com', 'l;sadjlsajldkjsaljdlkasjdlkja', 30),
(0, 'rifaz@rr.com', 'l;sadjlsajldkjsaljdlkasjdlkja\r\n\r\n\r\nasd\r\nsa\r\nd\r\nsad\r\nads\r\n', 31),
(0, 'rifaz@rr.com', 'l;sadjlsajldkjsaljdlkasjdlkja\r\n\r\n\r\nasd\r\nsa\r\nd\r\nsad\r\nads\r\n\r\n&lt;h1&gt; mitthe bolechi &lt;/h1&gt;\r\n', 32);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `by_user` (`by_user`);

--
-- Indexes for table `chating_with`
--
ALTER TABLE `chating_with`
  ADD KEY `id` (`id`),
  ADD KEY `to_user` (`to_user`);

--
-- Indexes for table `chat_global`
--
ALTER TABLE `chat_global`
  ADD PRIMARY KEY (`id`),
  ADD KEY `by_user` (`by_user`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `by_who` (`by_who`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `by_user` (`by_user`);

--
-- Indexes for table `resources_for`
--
ALTER TABLE `resources_for`
  ADD PRIMARY KEY (`id`),
  ADD KEY `r_id` (`r_id`),
  ADD KEY `takes_id` (`takes_id`);

--
-- Indexes for table `takes`
--
ALTER TABLE `takes`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `wb`
--
ALTER TABLE `wb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `wb_global`
--
ALTER TABLE `wb_global`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `resources_for`
--
ALTER TABLE `resources_for`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `takes`
--
ALTER TABLE `takes`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wb_global`
--
ALTER TABLE `wb_global`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`by_user`) REFERENCES `user` (`email`);

--
-- Constraints for table `chating_with`
--
ALTER TABLE `chating_with`
  ADD CONSTRAINT `chating_with_ibfk_1` FOREIGN KEY (`id`) REFERENCES `chat` (`id`),
  ADD CONSTRAINT `chating_with_ibfk_2` FOREIGN KEY (`to_user`) REFERENCES `user` (`email`);

--
-- Constraints for table `chat_global`
--
ALTER TABLE `chat_global`
  ADD CONSTRAINT `chat_global_ibfk_1` FOREIGN KEY (`by_user`) REFERENCES `user` (`email`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`by_who`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`);

--
-- Constraints for table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `resources_ibfk_1` FOREIGN KEY (`by_user`) REFERENCES `user` (`email`);

--
-- Constraints for table `resources_for`
--
ALTER TABLE `resources_for`
  ADD CONSTRAINT `resources_for_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `resources` (`id`),
  ADD CONSTRAINT `resources_for_ibfk_2` FOREIGN KEY (`takes_id`) REFERENCES `takes` (`course_id`);

--
-- Constraints for table `takes`
--
ALTER TABLE `takes`
  ADD CONSTRAINT `takes_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`);

--
-- Constraints for table `wb`
--
ALTER TABLE `wb`
  ADD CONSTRAINT `wb_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`);

--
-- Constraints for table `wb_global`
--
ALTER TABLE `wb_global`
  ADD CONSTRAINT `wb_global_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
