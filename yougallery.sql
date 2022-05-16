-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 16 maj 2022 kl 13:57
-- Serverversion: 10.4.20-MariaDB
-- PHP-version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `yougallery`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `tblgallery`
--

CREATE TABLE `tblgallery` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `description` varchar(255) NOT NULL,
  `path` varchar(500) NOT NULL,
  `username` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `tblgallery`
--

INSERT INTO `tblgallery` (`id`, `title`, `description`, `path`, `username`) VALUES
(32, 'test', 'test', 'gallery/sad/2022-05-13-12-12-58-sad-b4914600112ba18af7798b6c1a1363728ae1d96f-northgard4.jpg', 'sad'),
(33, 'image2', 'image2', 'gallery/sad/2022-05-13-12-22-06-sad-b4914600112ba18af7798b6c1a1363728ae1d96f-northgard1.jpg', 'sad'),
(34, 'image 3', 'image 3', 'gallery/sad/2022-05-13-12-36-13-sad-b4914600112ba18af7798b6c1a1363728ae1d96f-northgard5.jpg', 'sad'),
(35, 'image 4', 'image 4', 'gallery/sad/2022-05-13-12-36-48-sad-b4914600112ba18af7798b6c1a1363728ae1d96f-northgard3.jpg', 'sad'),
(36, 'image 5', 'image 5', 'gallery/sad/2022-05-13-12-37-01-sad-b4914600112ba18af7798b6c1a1363728ae1d96f-northgard7.jpg', 'sad'),
(37, 'image 6', 'image 6', 'gallery/sad/2022-05-13-12-37-32-sad-b4914600112ba18af7798b6c1a1363728ae1d96f-northgard6.jpg', 'sad'),
(38, 'test 2', 'image 7', 'gallery/sad/2022-05-13-12-38-41-sad-b4914600112ba18af7798b6c1a1363728ae1d96f-background1.jpg', 'sad'),
(39, 'image 1', 'an image', 'gallery/user/2022-05-16-13-38-19-user-12dea96fec20593566ab75692c9949596833adc9-northgard4.jpg', 'user');

-- --------------------------------------------------------

--
-- Tabellstruktur `tblusers`
--

CREATE TABLE `tblusers` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(40) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `LEVEL` int(11) NOT NULL DEFAULT 50
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `tblusers`
--

INSERT INTO `tblusers` (`ID`, `USERNAME`, `PASSWORD`, `LEVEL`) VALUES
(5, 'sad', 'f402294f3a12207650ae6120b3426b31', 50);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `tblgallery`
--
ALTER TABLE `tblgallery`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `tblgallery`
--
ALTER TABLE `tblgallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT för tabell `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
