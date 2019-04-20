-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 18 Απρ 2019 στις 21:40:17
-- Έκδοση διακομιστή: 10.1.36-MariaDB
-- Έκδοση PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `myblog`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `articles`
--

CREATE TABLE `articles` (
  `article_id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'eikona.jpg',
  `created_date` date NOT NULL,
  `owner_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `published` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `articles`
--

INSERT INTO `articles` (`article_id`, `title`, `content`, `image`, `created_date`, `owner_id`, `cat_id`, `published`) VALUES
(1, 'Καλωσήρθατε', 'Καλωσήρθατε στο blog για όλα τα θέματα.', '3.jpg', '2018-01-03', 1, 1, '1'),
(2, 'Ποιος θα πάρει το πρωτάθλημα;', 'Με μεγάλο ενδιαφέρον αναμένουμε τον πρωταθλητή της χρονιάς.', '1.jpg', '2018-03-22', 2, 4, '1'),
(4, 'Ήρθαν τα νέα iphone.', 'Ανακοινώθηκε η κυκλοφορία των νέων iphone.', '4.jpg', '2018-03-22', 2, 3, '0'),
(5, 'Έρχονται εκλογές;', 'Με αγωνία αναμένει ο Ελληνικός λαός την ημερομηνία των εκλογών.', '2.jpg', '2018-05-19', 4, 5, '1'),
(6, 'Lorem ipsum', 'Το Lorem Ipsum είναι απλά ένα κείμενο χωρίς νόημα για τους επαγγελματίες της τυπογραφίας.', '2.jpg', '2018-05-20', 1, 1, '0'),
(7, 'Επιλογή οθόνης', 'Για να επιλέξουμε οθόνη το πιο βασικό κριτήριο είναι τα μάτια μας.', '3.jpg', '2018-07-22', 4, 3, '0'),
(8, 'Ανοίγουν τα σχολεία', 'Σήμερα πρώτη ημέρα για τα σχολεία.', '4.jpg', '2018-09-11', 4, 2, '1'),
(9, 'Social media ranks', 'Στην πρώτη θέση βρέθηκε το instagram ξεπερνώντας το facebook.', '2.jpg', '2018-12-17', 4, 2, '1');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) NOT NULL,
  `cat_name` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `categories`
--

INSERT INTO `categories` (`category_id`, `cat_name`) VALUES
(1, 'Γενικά'),
(2, 'Κοινωνικά'),
(3, 'Τεχνολογία'),
(4, 'Αθλητικά'),
(5, 'Πολιτική');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` char(20) NOT NULL DEFAULT 'registered',
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `role`, `created_date`) VALUES
(1, 'Nikos', '123456', 'nikos@myblog.gr', 'admin', '2018-01-01'),
(2, 'John', '654321', 'john@myblog.gr', 'publisher', '2018-02-15'),
(3, 'Maria', '567890', 'maria@google.gr', 'registered', '2018-04-23'),
(4, 'Bob', '098765', 'bob@admin.gr', 'editor', '2018-05-04'),
(5, 'Eleni', '123456', 'eleni@mail.gr', 'registered', '2019-01-02');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Ευρετήρια για πίνακα `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT για πίνακα `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`category_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
