-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2022 at 11:25 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pantheon`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Pantheon'),
(2, 'Features'),
(3, 'Upcoming');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_image` varchar(255) NOT NULL DEFAULT 'comment.png',
  `comment_status` varchar(255) NOT NULL DEFAULT 'Unapproved',
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_image`, `comment_status`, `comment_date`) VALUES
(3, 1, 'Ahan Jaiswal', 'ahan0689.cse19@chitkara.edu.in', 'Comment count check.', 'Ahan.jpg', 'Approved', '2021-05-20'),
(4, 2, 'Admin', 'admin@pantheon.com', 'First comment.', 'comment.png', 'Approved', '2021-05-20'),
(5, 3, 'Parth Arora', 'parth0702.cse19@chitkara.edu.in', 'Parth was here.', 'Parth.jpg', 'Approved', '2021-05-20'),
(6, 4, 'Admin', 'admin@pantheon.com', 'Comment count failed.', 'comment.png', 'Approved', '2021-05-20'),
(7, 8, 'Asjad Iqbal', 'asjad0703.cse19@chitkara.edu.in', 'Thankyou for the explanation, very easy to use.', 'Asjad.jpeg', 'Approved', '2021-05-20'),
(8, 8, 'Admin', 'admin@pantheon.com', 'No problem, Asjad. I hope you enjoy your stay on Pantheon.', 'comment.png', 'Approved', '2021-05-20'),
(9, 1, 'Admin', 'admin@pantheon.com', 'Checking reply feature.', 'comment.png', 'Approved', '2021-05-21'),
(19, 3, 'Admin ', 'admin@pantheon.com', 'Hello.', 'comment.png', 'Approved', '2021-05-26'),
(20, 2, 'Ahan Jaiswal', 'ahan0689.cse19@chitkara.edu.in', 'ahahan', 'comment.png', 'Unapproved', '2021-09-08');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_desc` text NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_desc`, `post_comment_count`, `post_status`) VALUES
(1, 2, 'Games', 'Ahan Jaiswal', '2021-05-20', 'hero-image4.jpg', '<p>To become a Pantheon Game developer, please reach out to us.</p>\r\n                                        <blockquote> <i class=\"fa fa-quote-left\"></i> Discover original game beta content from creators you already love, or new developers you might like.</blockquote>\r\n                                        <p>Our best game till date: Tic-Tac-Toe.</p>\r\n                                        <p>=> Indicates when a player has won the game,<br>\r\n                                           => Stores a game’s history as a game progresses,<br>\r\n                                           => Allows players to review a game’s history and see previous versions of a game’s board.<br></p>\r\n                                        <p>We hope for your support!</p>   ', 'games, pantheon, product, tic-tac-toe, ahan jaiswal', 'Discover original game beta content from creators you already love, or new developers you might like.', 0, 'Published'),
(2, 3, 'Chatbox', 'Parth Arora', '2021-05-20', 'hero-image3.svg', '<p>Finally, pantheon has its own chatrooom guyssss!</p>                                         <blockquote> <i class=\"fa fa-quote-left\"></i> Send photos, videos, and messages privately to friends. End-to-End encrypted conversations like Whatsapp.</blockquote>                                         <p>A chatbot is a software application used to conduct an on-line chat conversation.</p>                                         <p>We hope you like the new feature!</p>', 'Pantheon, Product, Features, Parth Arora, Chatbox', 'Send photos, videos, and messages privately to friends. End-to-End encrypted conversation like whatsapp.', 0, 'Published'),
(3, 2, 'Posts', 'Ahan Jaiswal', '2021-05-20', 'hero-image2.svg', '<p>A post is an individual entry or article written by an author on Pantheon blog.</p>                                         <blockquote> <i class=\"fa fa-quote-left\"></i> Easily create fun, entertaining posts to share with friends or anyone on Pantheon.</blockquote>                                         <p>Blog posts can include content like text, images, infographics or videos.</p>                                         <p>Blogs posts are an efficient way to share information, interact with your audience, and increase your online visibility. For businesses, blog posts can focus any aspect of operation, from customer testimonials to recent achievements.</p>                                         <p>We hope you like the new feature on Pantheon!</p>', 'Pantheon, Posts, Features, Ahan Jaiswal, Product', 'Easily create fun, entertaining posts to share with friends or anyone on Pantheon. We also have a comment section.', 0, 'Published'),
(4, 2, 'Profile', 'Parth Arora', '2021-05-20', 'hero-image.jpg', '<p>We have introduced a new feature - the ability to add a \"User Profile\" linked with your account.</p>                                         <blockquote> <i class=\"fa fa-quote-left\"></i> Our features help you express yourself and connect with the people you love. Best profile features on all CMS.</blockquote>                                         <p>What this element does, is that it allows your logged-in users to edit their user information, change their email, password, and so on. </p>                                         <p>If you need help setting this element up, or understanding what you can use it for, please comment your problems, our staff will try to resolve it as soon as possible.</p>', 'Pantheon, Features, Product, Profile, Parth Arora', 'Our features help you express yourself and connect with the people you love. Best profile features on all CMS.', 0, 'Published'),
(8, 1, 'Post Making on Pantheon', 'Admin', '2021-05-21', 'blog1.jpg', '<p>Welcome to Pantheon, new users.</p>\r\n <blockquote><i class=\"fa fa-quote-left\"></i> You can use blockquote tag with an i tag with class fa fa quote left to make such a blockquote. </blockquote>\r\n<p> This line is inside an p element. </p><br>\r\n<p>You came to this next line by adding a br element after the previous p element.</p>\r\n<h1>This is h1 tag</h1>\r\n<h2>This is h2 tag</h2>\r\n<h3>This is h3 tag</h3>\r\n<h4>This is h4 tag</h4>\r\n<h5>This is h5 tag</h5>\r\n<h6>This is h6 tag</h6>\r\n<p>While making posts on Pantheon, all your content should be inside any of the above tags.</p>\r\n<ol>\r\n<li>ol tag used to make this list.</li>\r\n</ol>\r\n<p><strong>Please do not user single parenthesis on your posts.</strong></p>\r\n<p>Do not worry, if you do not know html, you can always ask for help in the comments.</p>', 'Post Making on Pantheon, Pantheon, Admin', 'One of our admins will teach new users about how to make posts on Pantheon after they register with us.', 0, 'Published'),
(9, 12, 'Post #4', 'Ahan Jaiswal', '2021-05-26', 'sample.jpg', '<h1>HEADING</h>\r\n<p>Para</p><br>\r\n<p>Hi</p>', '789', 'Home', 0, 'Published');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_fname` varchar(255) NOT NULL,
  `user_lname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'comment.png',
  `user_role` varchar(255) NOT NULL DEFAULT 'Member',
  `randSalt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_fname`, `user_lname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(1, 'ahanj', 'ahan123', 'Ahan', 'Jaiswal', 'ahan0689.cse19@chitkara.edu.in', 'Ahan.JPG', 'Member', ''),
(2, 'admin2', 'parth123', 'Parth', 'Arora', 'parth0702.cse19@chitkara.edu.in', 'Parth.jpg', 'Admin', ''),
(11, 'Admin', 'Admin', 'Admin', '', 'admin@pantheon.com', 'comment.png', 'Admin', ''),
(16, 'member1', 'chitkara', 'Sarita', 'Simaiya', 'sarita@chitkara.edu.in', 'sample.jpg', 'Admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
