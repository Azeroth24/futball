-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Hoszt: 127.0.0.1
-- Létrehozás ideje: 2013. ápr. 28. 12:39
-- Szerver verzió: 5.5.27
-- PHP verzió: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Adatbázis: `futball`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet: `igazolasok`
--

CREATE TABLE IF NOT EXISTS `igazolasok` (
  `atig_id` int(10) NOT NULL AUTO_INCREMENT,
  `jatekos` int(10) NOT NULL,
  `honnan` int(10) NOT NULL,
  `hova` int(10) NOT NULL,
  `mikor` date NOT NULL,
  `ar` int(15) NOT NULL,
  PRIMARY KEY (`atig_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=7 ;

--
-- A tábla adatainak kiíratása `igazolasok`
--

INSERT INTO `igazolasok` (`atig_id`, `jatekos`, `honnan`, `hova`, `mikor`, `ar`) VALUES
(3, 1, 2, 3, '2013-04-08', 10210),
(4, 3, 3, 1, '2013-11-25', 520500),
(5, 5, 1, 3, '2012-08-17', 320200),
(6, 4, 2, 1, '2011-12-31', 200500);

-- --------------------------------------------------------

--
-- Tábla szerkezet: `jatekos`
--

CREATE TABLE IF NOT EXISTS `jatekos` (
  `jatekos_id` int(10) NOT NULL AUTO_INCREMENT,
  `jatekos_nev` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `kor` int(2) NOT NULL,
  `nemzetiseg` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `akt_klub` int(5) NOT NULL,
  `j_aktiv` int(1) NOT NULL,
  UNIQUE KEY `jatekos_id` (`jatekos_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=7 ;

--
-- A tábla adatainak kiíratása `jatekos`
--

INSERT INTO `jatekos` (`jatekos_id`, `jatekos_nev`, `kor`, `nemzetiseg`, `akt_klub`, `j_aktiv`) VALUES
(1, 'Farkas Tibor', 22, 'magyar', 1, 1),
(2, 'Kovács Lajos', 20, 'lengyel', 1, 1),
(3, 'Huszár Gábor', 35, 'orosz', 2, 1),
(4, 'Kiss Pista', 26, 'német', 4, 1),
(5, 'Erős Pista', 42, 'magyar', 2, 1),
(6, 'Édes Anna', 17, 'orosz', 3, 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet: `klub`
--

CREATE TABLE IF NOT EXISTS `klub` (
  `klub_id` int(10) NOT NULL AUTO_INCREMENT,
  `klub_nev` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `alapitva` date NOT NULL,
  `k_aktiv` int(1) NOT NULL,
  PRIMARY KEY (`klub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=5 ;

--
-- A tábla adatainak kiíratása `klub`
--

INSERT INTO `klub` (`klub_id`, `klub_nev`, `alapitva`, `k_aktiv`) VALUES
(1, 'Team Two', '1990-10-24', 1),
(2, 'Geeks', '2010-02-21', 1),
(3, 'Párducok', '2010-05-07', 1),
(4, 'Fantastic Four', '1990-10-24', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
