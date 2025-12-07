-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 14, 2020 at 10:42 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toya`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `name`) VALUES
(1, 'Mans'),
(2, 'Woman');

-- --------------------------------------------------------

--
-- Table structure for table `image_product`
--

CREATE TABLE `image_product` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image_product`
--

INSERT INTO `image_product` (`id`, `id_product`, `foto`) VALUES
(1, 2, 'http://localhost/toya-webapps/assets/backend/upload/foto/Item_6.png'),
(4, 2, 'http://localhost/toya-webapps/assets/backend/upload/foto/Item_7.png'),
(5, 2, 'http://localhost/toya-webapps/assets/backend/upload/foto/Item_7.png'),
(6, 2, 'http://localhost/toya-webapps/assets/backend/upload/foto/Item_7.png'),
(7, 2, 'http://localhost/toya-webapps/assets/backend/upload/foto/Item_7.png'),
(8, 2, 'http://localhost/toya-webapps/assets/backend/upload/foto/Item_7.png');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `id_categori` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `name`, `price`, `id_categori`, `foto`) VALUES
(2, 'Product 1', 1000000, 1, 'http://localhost/toya-webapps/assets/backend/upload/product/Item_1.png'),
(4, 'Product 2', 1000000, 1, 'http://localhost/toya-webapps/assets/backend/upload/product/batik.jpeg'),
(5, 'Product 3', 1000000, 1, 'http://localhost/toya-webapps/assets/backend/upload/product/batik.jpeg'),
(6, 'Product 4', 1000000, 1, 'http://localhost/toya-webapps/assets/backend/upload/product/Item_1.png');

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE `slideshow` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `publish` enum('enable','disabled') NOT NULL DEFAULT 'disabled'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`id`, `title`, `foto`, `link`, `description`, `publish`) VALUES
(2, 'Slider 1', 'http://localhost/toya-webapps/assets/backend/upload/slider/Content_1.png', 'http://www.google.com', 'Description Sample Slider', 'enable'),
(3, 'Slide 2', 'http://localhost/toya-webapps/assets/backend/upload/slider/Content_2.png', 'http://www.google.com', 'Description Sample Slider', 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `status`) VALUES
(1, 'admin', 'muhammad45rifki@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'admin'),
(2, 'admin', 'muhammad45rifqi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_product`
--
ALTER TABLE `image_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `image_product`
--
ALTER TABLE `image_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
