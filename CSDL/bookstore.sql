-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2020 at 01:31 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `BookID` int(11) NOT NULL,
  `BookTitle` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `BookDesc` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `BookCatID` int(11) NOT NULL,
  `BookAuthor` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `BookPubID` int(11) NOT NULL,
  `BookYear` int(11) NOT NULL,
  `BookPic` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `BookPrice` float NOT NULL,
  `BookRate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`BookID`, `BookTitle`, `BookDesc`, `BookCatID`, `BookAuthor`, `BookPubID`, `BookYear`, `BookPic`, `BookPrice`, `BookRate`) VALUES
(1, 'Harry Potter va Chiec Coc Lua', 'Harry Potter va Chiec Coc Lua', 3, 'J.K.Rowling', 1, 2000, '', 20, 10),
(2, 'Giao Trinh PHP Co Ban', 'Giao Trinh PHP Co Ban', 2, 'Random', 2, 2017, '', 20, 7);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `CategoryDesc` varchar(1024) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`, `CategoryDesc`) VALUES
(1, 'TrinhTham', 'TrinhTham'),
(2, 'GiaoDuc', 'GiaoDuc'),
(3, 'TieuThuyet', 'TieuThuyet');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `PublisherID` int(11) NOT NULL,
  `PublisherName` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `PublisherAddress` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`PublisherID`, `PublisherName`, `PublisherAddress`) VALUES
(1, 'KimDong', 'HaNoi'),
(2, 'Tre', 'TPHCM');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `name`, `email`, `diachi`) VALUES
(0, 'a', '1', 'Nguyen Van A', 'nva@gmail.com', '227 Nguyen Van Cu Q5'),
(2, 'saladSnake', '210900Phong', 'Nguyen Tien Phong', 'phongnguyen@gmail.com', 'BinhDuong');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`BookID`),
  ADD KEY `PK_ Category_CategoryID` (`BookCatID`),
  ADD KEY `PK_ Publisher_PublisherID` (`BookPubID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`PublisherID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `BookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `PublisherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `PK_ Category_CategoryID` FOREIGN KEY (`BookCatID`) REFERENCES `category` (`CategoryID`),
  ADD CONSTRAINT `PK_ Publisher_PublisherID` FOREIGN KEY (`BookPubID`) REFERENCES `publisher` (`PublisherID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
