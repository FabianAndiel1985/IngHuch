-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 06. Sep 2019 um 12:43
-- Server-Version: 10.3.16-MariaDB
-- PHP-Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr10_fabian_andiel_biglibrary`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `authors`
--

CREATE TABLE `authors` (
  `author_ID` bigint(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `authors`
--

INSERT INTO `authors` (`author_ID`, `name`, `surname`, `subject`) VALUES
(1, 'Roland', 'Kaiser', 'romance'),
(2, 'Peter', 'Cornelius', 'rap'),
(3, 'Max', 'Mustermann', 'comedy');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `betweenauthormedia`
--

CREATE TABLE `betweenauthormedia` (
  `index_bam` bigint(20) NOT NULL,
  `FK_ISBN` bigint(20) NOT NULL,
  `FK_author_ID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `betweenauthormedia`
--

INSERT INTO `betweenauthormedia` (`index_bam`, `FK_ISBN`, `FK_author_ID`) VALUES
(1, 2, 1),
(2, 1, 2),
(3, 2, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `media`
--

CREATE TABLE `media` (
  `ISBN` bigint(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(60) DEFAULT NULL,
  `type` enum('DVD','CD','BOOK') NOT NULL,
  `publish_date` date DEFAULT NULL,
  `availability` enum('available','reserved') DEFAULT NULL,
  `FK_publisher_ID` bigint(20) NOT NULL,
  `last_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `media`
--

INSERT INTO `media` (`ISBN`, `title`, `description`, `type`, `publish_date`, `availability`, `FK_publisher_ID`, `last_update`) VALUES
(1, 'Laleou1212', 'an awesome book', 'BOOK', '2019-01-01', 'available', 1, '2019-09-05 09:52:36'),
(2, 'Nepumuk', 'best book brother 1419', 'BOOK', '2019-07-01', 'reserved', 3, '2019-09-05 09:17:16'),
(3, 'Sucess2', '2', 'BOOK', '2019-01-02', 'reserved', 1, '2019-09-05 11:01:25'),
(4, 'Sucess2', '2', 'BOOK', '2019-01-02', 'reserved', 1, '2019-09-05 11:01:25'),
(5, 'Sofa Sessel', 'cool book', 'BOOK', '2019-05-02', 'reserved', 2, '2019-09-05 11:30:22'),
(6, 'Sofa Sessel', 'cool book', 'BOOK', '2019-05-02', 'reserved', 2, '2019-09-05 11:30:22'),
(7, 'Laleou1122', 'cool book', 'CD', '2019-01-02', 'available', 2, '2019-09-05 11:37:56');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `publishers`
--

CREATE TABLE `publishers` (
  `publisher_ID` bigint(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `adress` varchar(20) NOT NULL,
  `zip` mediumint(9) NOT NULL,
  `city` varchar(20) NOT NULL,
  `size` enum('big','medium','small') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `publishers`
--

INSERT INTO `publishers` (`publisher_ID`, `name`, `adress`, `zip`, `city`, `size`) VALUES
(1, 'Random House', 'random street', 1050, 'vienna', 'medium'),
(2, 'Best publisher', 'best road', 4450, 'Linz', 'small'),
(3, 'Roughhouse', 'rough plaza', 3750, 'Mallorca', 'big');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_ID`);

--
-- Indizes für die Tabelle `betweenauthormedia`
--
ALTER TABLE `betweenauthormedia`
  ADD PRIMARY KEY (`index_bam`),
  ADD KEY `FK_ISBN` (`FK_ISBN`),
  ADD KEY `FK_author_ID` (`FK_author_ID`);

--
-- Indizes für die Tabelle `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `FK_publisher_ID` (`FK_publisher_ID`);

--
-- Indizes für die Tabelle `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`publisher_ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `authors`
--
ALTER TABLE `authors`
  MODIFY `author_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `betweenauthormedia`
--
ALTER TABLE `betweenauthormedia`
  MODIFY `index_bam` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `media`
--
ALTER TABLE `media`
  MODIFY `ISBN` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT für Tabelle `publishers`
--
ALTER TABLE `publishers`
  MODIFY `publisher_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `betweenauthormedia`
--
ALTER TABLE `betweenauthormedia`
  ADD CONSTRAINT `betweenauthormedia_ibfk_2` FOREIGN KEY (`FK_author_ID`) REFERENCES `authors` (`author_ID`);

--
-- Constraints der Tabelle `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`FK_publisher_ID`) REFERENCES `publishers` (`publisher_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
