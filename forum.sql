-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2024 at 05:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `badge`
--

CREATE TABLE `badge` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(255) NOT NULL,
  `content` varchar(500) NOT NULL,
  `status` enum('ACTIVE','BAN') NOT NULL,
  `profile_id` int(255) NOT NULL,
  `profile_user_id` int(255) NOT NULL,
  `post_id` int(255) NOT NULL,
  `post_profile_id` int(255) NOT NULL,
  `post_profile_user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `list_picture`
--

CREATE TABLE `list_picture` (
  `id` int(255) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `post_id` int(255) NOT NULL,
  `post_profile_id` int(255) NOT NULL,
  `post_profile_user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(255) NOT NULL,
  `menu` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(255) NOT NULL,
  `type` enum('POST','COURSE') NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(500) NOT NULL,
  `status` enum('ACTIVE','BAN') NOT NULL,
  `profile_id` int(255) NOT NULL,
  `profile_user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `profile_img` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `nickname`, `description`, `profile_img`, `user_id`) VALUES
(1, 'GABTEO', 'OSLKD ', '01. Epifania (300x300).png', 3),
(2, 'cocolate', '', '', 5),
(3, 'HAHA', 'HHIHHIIHI ', 'no_profile', 6);

-- --------------------------------------------------------

--
-- Table structure for table `profile_has_badge1`
--

CREATE TABLE `profile_has_badge1` (
  `profile_id` int(255) NOT NULL,
  `badge_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_has_profile`
--

CREATE TABLE `profile_has_profile` (
  `profile_id` int(255) NOT NULL,
  `profile_user_id` int(255) NOT NULL,
  `profile_id1` int(255) NOT NULL,
  `profile_user_id1` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(10) NOT NULL,
  `type` enum('SPAM','TOXIC','WRONG') NOT NULL,
  `post_id` int(255) NOT NULL,
  `post_profile_id` int(255) NOT NULL,
  `post_profile_user_id` int(255) NOT NULL,
  `profile_id` int(255) NOT NULL,
  `profile_user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `respon`
--

CREATE TABLE `respon` (
  `id` int(255) NOT NULL,
  `type` enum('LIKE','DISLIKE') NOT NULL,
  `post_id` int(255) NOT NULL,
  `post_profile_id` int(255) NOT NULL,
  `post_profile_user_id` int(255) NOT NULL,
  `profile_id` int(255) NOT NULL,
  `profile_user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `id` int(255) NOT NULL,
  `submenu` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `menu_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role` enum('MEMBER','ADMIN') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'test@gmail.com', '$2y$10$GFaH3YOtZrgZydvaASWKAuetiy7CkanAGEFUkSZp2LfGa1JTIzoGC', 'MEMBER'),
(2, 'coba@gmail.com', '$2y$10$MkJ4hbsio0yuk51uNO4oXOT49ipCfgGnMtTTzMUC3j6S1HUyJrlbW', 'MEMBER'),
(3, 'tesu@gmail.com', '$2y$10$kcHyGVK7y/BQaQBOImiZ/O1qfTyQkjUeuXImVlhn/RNt0mkqYmLQi', 'MEMBER'),
(5, 'coco@gmail.com', '$2y$10$H5YwansWqqGIhVoT4qs9wOHvm2LKmMcZDaOQVPpaIxpG85BWDtX.e', 'MEMBER'),
(6, 'papa@gmail.com', '$2y$10$8J1vAiElZcV8t6xeeuiqeOfBdxHRDJxjkDQ/pjTCiCajInxwrZrg.', 'MEMBER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `badge`
--
ALTER TABLE `badge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`,`profile_id`,`profile_user_id`,`post_id`,`post_profile_id`,`post_profile_user_id`),
  ADD KEY `fk_comment_profile1_idx` (`profile_id`,`profile_user_id`),
  ADD KEY `fk_comment_post1_idx` (`post_id`,`post_profile_id`,`post_profile_user_id`);

--
-- Indexes for table `list_picture`
--
ALTER TABLE `list_picture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_list_picture_post2_idx` (`post_id`,`post_profile_id`,`post_profile_user_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`,`user_id`),
  ADD KEY `fk_menu_user1_idx` (`user_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`,`profile_id`,`profile_user_id`),
  ADD KEY `fk_post_profile2_idx` (`profile_id`,`profile_user_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`,`user_id`),
  ADD KEY `fk_profile_user2_idx` (`user_id`);

--
-- Indexes for table `profile_has_badge1`
--
ALTER TABLE `profile_has_badge1`
  ADD PRIMARY KEY (`profile_id`,`badge_id`),
  ADD KEY `fk_profile_has_badge1_badge1_idx` (`badge_id`),
  ADD KEY `fk_profile_has_badge1_profile1_idx` (`profile_id`);

--
-- Indexes for table `profile_has_profile`
--
ALTER TABLE `profile_has_profile`
  ADD PRIMARY KEY (`profile_id`,`profile_user_id`,`profile_id1`,`profile_user_id1`),
  ADD KEY `fk_profile_has_profile_profile4_idx` (`profile_id1`,`profile_user_id1`),
  ADD KEY `fk_profile_has_profile_profile3_idx` (`profile_id`,`profile_user_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`,`post_id`,`post_profile_id`,`post_profile_user_id`,`profile_id`,`profile_user_id`),
  ADD KEY `fk_report_post2_idx` (`post_id`,`post_profile_id`,`post_profile_user_id`),
  ADD KEY `fk_report_profile2_idx` (`profile_id`,`profile_user_id`);

--
-- Indexes for table `respon`
--
ALTER TABLE `respon`
  ADD PRIMARY KEY (`id`,`post_id`,`post_profile_id`,`post_profile_user_id`,`profile_id`,`profile_user_id`),
  ADD KEY `fk_respon_post1_idx` (`post_id`,`post_profile_id`,`post_profile_user_id`),
  ADD KEY `fk_respon_profile1_idx` (`profile_id`,`profile_user_id`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id`,`menu_id`),
  ADD KEY `fk_submenu_menu1_idx` (`menu_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `badge`
--
ALTER TABLE `badge`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `list_picture`
--
ALTER TABLE `list_picture`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `respon`
--
ALTER TABLE `respon`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_post1` FOREIGN KEY (`post_id`,`post_profile_id`,`post_profile_user_id`) REFERENCES `post` (`id`, `profile_id`, `profile_user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comment_profile1` FOREIGN KEY (`profile_id`,`profile_user_id`) REFERENCES `profile` (`id`, `user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `list_picture`
--
ALTER TABLE `list_picture`
  ADD CONSTRAINT `fk_list_picture_post2` FOREIGN KEY (`post_id`,`post_profile_id`,`post_profile_user_id`) REFERENCES `post` (`id`, `profile_id`, `profile_user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fk_menu_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_post_profile2` FOREIGN KEY (`profile_id`,`profile_user_id`) REFERENCES `profile` (`id`, `user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_profile_user2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `profile_has_badge1`
--
ALTER TABLE `profile_has_badge1`
  ADD CONSTRAINT `fk_profile_has_badge1_badge1` FOREIGN KEY (`badge_id`) REFERENCES `badge` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_profile_has_badge1_profile1` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `profile_has_profile`
--
ALTER TABLE `profile_has_profile`
  ADD CONSTRAINT `fk_profile_has_profile_profile3` FOREIGN KEY (`profile_id`,`profile_user_id`) REFERENCES `profile` (`id`, `user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_profile_has_profile_profile4` FOREIGN KEY (`profile_id1`,`profile_user_id1`) REFERENCES `profile` (`id`, `user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `fk_report_post2` FOREIGN KEY (`post_id`,`post_profile_id`,`post_profile_user_id`) REFERENCES `post` (`id`, `profile_id`, `profile_user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_report_profile2` FOREIGN KEY (`profile_id`,`profile_user_id`) REFERENCES `profile` (`id`, `user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `respon`
--
ALTER TABLE `respon`
  ADD CONSTRAINT `fk_respon_post1` FOREIGN KEY (`post_id`,`post_profile_id`,`post_profile_user_id`) REFERENCES `post` (`id`, `profile_id`, `profile_user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_respon_profile1` FOREIGN KEY (`profile_id`,`profile_user_id`) REFERENCES `profile` (`id`, `user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `submenu`
--
ALTER TABLE `submenu`
  ADD CONSTRAINT `fk_submenu_menu1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
