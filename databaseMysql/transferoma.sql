-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Ago 30, 2017 alle 10:22
-- Versione del server: 10.1.21-MariaDB
-- Versione PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transferoma`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `tr_percorso`
--

CREATE TABLE `tr_percorso` (
  `id` int(11) NOT NULL,
  `id_tipo_percorso` int(11) NOT NULL,
  `descrizione` varchar(255) NOT NULL,
  `orario` time NOT NULL,
  `seriale` int(11) NOT NULL,
  `durata` time NOT NULL,
  `codice` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `tr_percorso`
--

INSERT INTO `tr_percorso` (`id`, `id_tipo_percorso`, `descrizione`, `orario`, `seriale`, `durata`, `codice`) VALUES
(100, 1, '- טיסת ישראייר 341 שנוחתת ברומא ב 18:40 יציאה מהשדה ב 19:30 ', '00:00:00', 53, '00:00:00', '341'),
(119, 1, '- טיסת ישראייר 341 שנוחתת ברומא ב 10:20 יציאה מהשדה ב 11:15 ', '00:00:00', 14, '00:00:00', '341'),
(7, 3, 'יציאה בשעה 12:00 - חזרה בשעה 16:30', '12:00:00', 70, '04:30:00', ''),
(8, 4, 'יציאה בשעה 08:00 - חזרה בשעה 20:00', '08:00:00', 80, '12:00:00', ''),
(9, 5, 'יציאה בשעה 09:00 - חזרה בשעה 13:00', '09:00:00', 90, '04:00:00', ''),
(10, 6, 'יציאה בשעה 20:30 - חזרה בשעה 23:30', '20:30:00', 100, '03:00:00', ''),
(11, 9, 'יציאה בשעה 08:00 - חזרה בשעה 20:00', '08:00:00', 80, '12:00:00', ''),
(12, 10, 'יציאה בשעה 08:00 - חזרה בשעה 20:00', '08:00:00', 80, '12:00:00', ''),
(13, 11, 'יציאה בשעה 09:30', '09:30:00', 10, '00:00:00', ''),
(14, 11, 'יציאה בשעה 12:00', '12:00:00', 20, '00:00:00', ''),
(15, 12, 'איסוף הנוסעים בין השעות 12:00-13:00', '12:00:00', 10, '00:00:00', ''),
(16, 13, 'יציאה בשעה 08:30', '08:30:00', 10, '00:00:00', ''),
(17, 14, 'יציאה בשעה 08:30', '08:30:00', 10, '00:00:00', ''),
(18, 15, 'סיור בוקר בשעות 09:00-13:00', '09:00:00', 10, '00:00:00', ''),
(19, 15, 'סיור צהריים בשעות 14:00-18:00', '14:00:00', 20, '00:00:00', ''),
(110, 1, '- טיסת ישראייר 341 שנוחתת ברומא ב 21:35 יציאה מהשדה ב 22:30 ', '00:00:00', 70, '00:00:00', '341'),
(89, 2, '- לטיסת אלעל 384 שממריאה מרומא ב 21:50 התחלת האיסוף מהמלונות ב 18:30 ', '00:00:00', 40, '00:00:00', '384'),
(99, 1, '- טיסת אלעל 385 שנוחתת ברומא ב 09:10 יציאה מהשדה ב 10:00 ', '00:00:00', 8, '00:00:00', '385'),
(102, 1, '- טיסת אליטליה 813 שנוחתת ברומא ב 20:05 יציאה מהשדה ב 21:00 ', '00:00:00', 56, '00:00:00', '813'),
(131, 2, '- לטיסת אלעל 386 שממריאה מרומא ב 10:00 התחלת האיסוף מהמלונות ב 06:45 ', '00:00:00', 4, '00:00:00', '386'),
(133, 1, '- טיסת אלעל 5787 שנוחתת ברומא ב 10:20 יציאה מהשדה ב 11:15 ', '00:00:00', 13, '00:00:00', '5787'),
(105, 1, '- טיסת אליטליה 811 שנוחתת ברומא ב 17:40 יציאה מהשדה ב 18:30 ', '00:00:00', 38, '00:00:00', '811 '),
(106, 1, '- טיסת ישראייר 341 שנוחתת ברומא ב 18:05 יציאה מהשדה ב 19:00 ', '00:00:00', 41, '00:00:00', '341'),
(107, 1, '- טיסת אלעל 383 שנוחתת ברומא ב 20:35 יציאה מהשדה ב 21:30 ', '00:00:00', 58, '00:00:00', '383'),
(101, 1, '- טיסת ישראייר 341 שנוחתת ברומא ב 10:15 יציאה מהשדה ב 11:00 ', '00:00:00', 12, '00:00:00', '341'),
(103, 1, '- טיסת ישראייר 343 שנוחתת ברומא ב 11:55 יציאה מהשדה ב 13:00 ', '00:00:00', 22, '00:00:00', '343'),
(108, 1, '- טיסת ישראייר 341 שנוחתת ברומא ב 20:40 יציאה מהשדה ב 21:30 ', '00:00:00', 60, '00:00:00', '341'),
(109, 1, '- טיסת אלעל 383 שנוחתת ברומא ב 21:10 יציאה מהשדה ב 22:00 ', '00:00:00', 64, '00:00:00', '383'),
(31, 1, '- טיסת אל על 383 נחיתה ברומא ב 21:25 יציאה מהשדה ב 22:30', '00:00:00', 66, '00:00:00', '6H383'),
(111, 1, '- טיסת אלעל 283 שנוחתת ברומא ב 21:55 יציאה מהשדה ב 22:45 ', '00:00:00', 72, '00:00:00', '283'),
(112, 1, '- טיסת אלעל 383 שנוחתת ברומא ב 22:30 יציאה מהשדה ב 23:15 ', '00:00:00', 68, '00:00:00', '383'),
(113, 1, '- טיסת אלעל 385 שנוחתת ברומא ב 09:50 יציאה מהשדה ב 10:40 ', '00:00:00', 11, '00:00:00', '385'),
(114, 1, '- טיסת אלעל 385 שנוחתת ברומא ב 10:40 יציאה מהשדה ב 11:30 ', '00:00:00', 16, '00:00:00', '385'),
(78, 2, '- לטיסת ישראייר 342 שממריאה מרומא ב 11:35 התחלת האיסוף מהמלונות ב 07:45 ', '00:00:00', 10, '00:00:00', '342'),
(77, 2, '- לטיסת אליטליה 808 שממריאה מרומא ב 09:20 התחלת האיסוף מהמלונות ב 06:45 ', '00:00:00', 3, '00:00:00', '808'),
(79, 2, '- לטיסת אליטליה 812 שממריאה מרומא ב 11:45 התחלת האיסוף מהמלונות ב 07:45 ', '00:00:00', 12, '00:00:00', '812'),
(80, 2, '- לטיסת ישראייר 342 שממריאה מרומא ב 15:15 התחלת האיסוף מהמלונות ב 12:00 ', '00:00:00', 19, '00:00:00', '342'),
(81, 2, '- לטיסת ישראייר 342 שממריאה מרומא ב 19:10 התחלת האיסוף מהמלונות ב 15:00 ', '00:00:00', 26, '00:00:00', '342'),
(82, 2, '- לטיסת אליטליה 814 שממריאה מרומא ב 21:40 התחלת האיסוף מהמלונות ב 17:30 ', '00:00:00', 37, '00:00:00', '814'),
(83, 2, '- לטיסת אליטליה 810 שממריאה מרומא ב 22:15 התחלת האיסוף מהמלונות ב 18:30 ', '00:00:00', 72, '00:00:00', '810'),
(84, 2, '- לטיסת ישראייר 342 שממריאה מרומא ב 23:30 התחלת האיסוף מהמלונות ב 19:30 ', '00:00:00', 76, '00:00:00', '342'),
(85, 2, '- לטיסת אלעל 386 שממריאה מרומא ב 10:15 התחלת האיסוף מהמלונות ב 06:45 ', '00:00:00', 5, '00:00:00', '386'),
(115, 1, '- טיסת ישראייר 341 שנוחתת ברומא ב 16:20 יציאה מהשדה ב 17:00 ', '00:00:00', 35, '00:00:00', '341'),
(116, 1, '- טיסת ישראייר 341 שנוחתת ברומא ב 13:55 יציאה מהשדה ב 14:45 ', '00:00:00', 29, '00:00:00', '341'),
(118, 1, '- טיסת ארקיע 335 שנוחתת ברומא ב 18:00 יציאה מהשדה ב 18:45 ', '00:00:00', 39, '00:00:00', '335'),
(86, 2, '- לטיסת ישראייר 342 שממריאה מרומא ב 20:50 התחלת האיסוף מהמלונות ב 16:45 ', '00:00:00', 32, '00:00:00', '342'),
(87, 2, '- לטיסת אלעל 384 שממריאה מרומא ב 22:15 התחלת האיסוף מהמלונות ב 18:30 ', '00:00:00', 70, '00:00:00', '384'),
(88, 2, '- לטיסת ארקיע 336 שממריאה מרומא ב 16:50 התחלת האיסוף מהמלונות ב 13:00 ', '00:00:00', 24, '00:00:00', '336'),
(120, 1, '- טיסת ישראייר 341 שנוחתת ברומא ב 16:05 יציאה מהשדה ב 17:00 ', '00:00:00', 33, '00:00:00', '341'),
(121, 1, '- טיסת אלעל 383 שנוחתת ברומא ב 17:15 יציאה מהשדה ב 18:00 ', '00:00:00', 37, '00:00:00', '383'),
(122, 1, '- טיסת ארקיע 335 שנוחתת ברומא ב 15:50 יציאה מהשדה ב 16:45 ', '00:00:00', 31, '00:00:00', '335'),
(90, 2, '- לטיסת ארקיע 336 שממריאה מרומא ב 14:05 התחלת האיסוף מהמלונות ב 10:00 ', '00:00:00', 17, '00:00:00', '336'),
(123, 1, '- טיסת אלעל 385 שנוחתת ברומא ב 08:35 יציאה מהשדה ב 09:30 ', '00:00:00', 3, '00:00:00', '385'),
(91, 2, '- לטיסת אלעל 386 שממריאה מרומא ב 12:05 התחלת האיסוף מהמלונות ב 08:00 ', '00:00:00', 15, '00:00:00', '386'),
(92, 2, '- לטיסת אלעל 5788 שממריאה מרומא ב 21:30 התחלת האיסוף מהמלונות ב 17:30 ', '00:00:00', 35, '00:00:00', '5788'),
(124, 1, '- טיסת מאי אייר 1832 שנוחתת ברומא ב 13:55 יציאה מהשדה ב 14:45 ', '00:00:00', 27, '00:00:00', '1832'),
(125, 1, '- טיסת ארקיע 335 שנוחתת ברומא ב 13:05 יציאה מהשדה ב 14:00 ', '00:00:00', 24, '00:00:00', '335'),
(126, 1, '- טיסת אלעל 5787 שנוחתת ברומא ב 09:20 יציאה מהשדה ב 10:15 ', '00:00:00', 10, '00:00:00', '5787'),
(127, 1, '- טיסת ארקיע 5387 שנוחתת ברומא ב 11:50 יציאה מהשדה ב 12:45 ', '00:00:00', 20, '00:00:00', '5387'),
(130, 1, '- טיסת אלעל 385 שנוחתת ברומא ב 08:45 יציאה מהשדה ב 09:45 ', '00:00:00', 5, '00:00:00', '385'),
(128, 1, '- טיסת ארקיע 335 שנוחתת ברומא ב 20:40 יציאה מהשדה ב 21:30 ', '00:00:00', 62, '00:00:00', '335'),
(93, 2, '- לטיסת ארקיע 336 שממריאה מרומא ב 22:00 התחלת האיסוף מהמלונות ב 18:00 ', '00:00:00', 65, '00:00:00', '336'),
(94, 2, '- לטיסת אלעל 5788 שממריאה מרומא ב 16:40 התחלת האיסוף מהמלונות ב 13:00 ', '00:00:00', 23, '00:00:00', '5788'),
(129, 1, '- טיסת פגאסוס 535 שנוחתת ברומא ב 13:40 יציאה מהשדה ב 14:30 ', '00:00:00', 25, '00:00:00', '535'),
(98, 1, '- טיסת אליטליה 809 שנוחתת ברומא ב 08:20 יציאה מהשדה ב 09:15 ', '00:00:00', 2, '00:00:00', '809'),
(97, 1, '- טיסת אלעל 385 שנוחתת ברומא ב 11:25 יציאה מהשדה ב 12:30 ', '00:00:00', 18, '00:00:00', '385'),
(76, 2, '- לטיסת ישראייר 344 שממריאה מרומא ב 11:30 התחלת האיסוף מהמלונות ב 07:45 ', '00:00:00', 7, '00:00:00', '344'),
(132, 1, '- טיסת אליטליה 815 שנוחתת ברומא ב 11:00 יציאה מהשדה ב 12:00 ', '00:00:00', 17, '00:00:00', '815');

-- --------------------------------------------------------

--
-- Struttura della tabella `tr_prenotazione`
--

CREATE TABLE `tr_prenotazione` (
  `id` int(11) NOT NULL,
  `id_shuttle` int(11) NOT NULL,
  `numero_persone` int(11) NOT NULL,
  `codice` varchar(30) NOT NULL,
  `hotel` varchar(50) NOT NULL,
  `nome_riferimento` varchar(50) NOT NULL,
  `telefono_riferimento` varchar(50) NOT NULL,
  `camera_riferimento` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `conferma_inviata` int(11) NOT NULL DEFAULT '0',
  `seggiolino_0_1` int(1) NOT NULL,
  `seggiolino_1_3` int(1) NOT NULL,
  `note` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `tr_prenotazione`
--

INSERT INTO `tr_prenotazione` (`id`, `id_shuttle`, `numero_persone`, `codice`, `hotel`, `nome_riferimento`, `telefono_riferimento`, `camera_riferimento`, `email`, `conferma_inviata`, `seggiolino_0_1`, `seggiolino_1_3`, `note`) VALUES
(1, 1, 1, '809', 'xx@xx.xx', 'xx@xx.xx', 'xx@xx.xx', 'xx@xx.xx', 'xx@xx.xx', 0, 0, 1, 'xxx'),
(2, 1, 1, '809', 'xx@xx.xx', 'xx@xx.xx', 'xx@xx.xx', 'xx@xx.xx', 'xx@xx.xx', 0, 1, 1, 'xxx'),
(3, 1, 1, '809', 'xx@xx.xx', 'xx@xx.xx', 'xx@xx.xx', 'xx@xx.xx', 'xx@xx.xx', 0, 1, 1, 'xxx\r\nqqqqqqqq\r\n222\r\n\r\n\r\n3333'),
(4, 3, 3, '343', '11', '11', '12312', '11', 'xx@xx.xx', 0, 0, 0, ''),
(5, 3, 2, '343', 'xx@xx.xx', 'xx@xx.xx', 'xx@xx.xx', 'xx@xx.xx', 'xx@xx.xx', 0, 0, 0, ''),
(6, 3, 1, '343', 'xx@xx.xx', 'xx@xx.xx', 'xx@xx.xx', 'xx@xx.xx', 'xx@xx.xx', 0, 0, 0, ''),
(7, 3, 2, '343', 'xx@xx.xx', 'xx@xx.xx', 'xx@xx.xx', 'xx@xx.xx', 'xx@xx.xx', 0, 0, 0, ''),
(8, 4, 2, '', 'xx@xx.xx', 'xx@xx.xx', 'xx@xx.xx', 'xx@xx.xx', 'xx@xx.xx', 0, 0, 0, ''),
(9, 4, 2, '', 'xx@xx.xx', 'xx@xx.xx', 'xx@xx.xx', 'xx@xx.xx', 'xx@xx.xx', 0, 0, 0, ''),
(10, 4, 1, '', 'xx@xx.xx', 'xx@xx.xx', 'xx@xx.xx', 'xx@xx.xx', 'xx@xx.xx', 0, 0, 0, ''),
(11, 6, 1, '', 'xx@xx.xx', 'xx@xx.xx', 'xx@xx.xx', 'xx@xx.xx', 'xx@xx.xx', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Struttura della tabella `tr_raggruppamenti`
--

CREATE TABLE `tr_raggruppamenti` (
  `id` int(11) NOT NULL,
  `descrizione` varchar(200) NOT NULL,
  `immagine` varchar(200) NOT NULL,
  `attivo` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `tr_raggruppamenti`
--

INSERT INTO `tr_raggruppamenti` (`id`, `descrizione`, `immagine`, `attivo`) VALUES
(1, 'Raggruppamento A', 'raggruppamento_a.png', 1),
(2, 'Raggruppamento B', 'raggruppamento_b.png', 1),
(3, 'Raggruppamento C', 'raggruppamento_c.png', 1),
(4, 'Raggruppamento D', 'raggruppamento_d.png', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `tr_shuttle`
--

CREATE TABLE `tr_shuttle` (
  `id` int(11) NOT NULL,
  `data_partenza` date NOT NULL,
  `id_percorso` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `tr_shuttle`
--

INSERT INTO `tr_shuttle` (`id`, `data_partenza`, `id_percorso`) VALUES
(1, '2013-04-23', 98),
(2, '2013-12-28', 132),
(3, '2013-12-30', 103),
(4, '2014-01-01', 7),
(5, '2013-12-31', 10),
(6, '2013-12-31', 10);

-- --------------------------------------------------------

--
-- Struttura della tabella `tr_struttura_2_lingue`
--

CREATE TABLE `tr_struttura_2_lingue` (
  `id_struttura` int(11) NOT NULL,
  `descrizione_it` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descrizione_abjad` varchar(255) NOT NULL,
  `descrizione_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `tr_struttura_2_lingue`
--

INSERT INTO `tr_struttura_2_lingue` (`id_struttura`, `descrizione_it`, `descrizione_abjad`, `descrizione_en`) VALUES
(1, 'Ciampino', 'ציאה מהשד', 'Ciampino'),
(2, 'Fiumicino', 'ציאה מהשד', 'Fiumicino');

-- --------------------------------------------------------

--
-- Struttura della tabella `tr_strutture`
--

CREATE TABLE `tr_strutture` (
  `id` int(11) NOT NULL,
  `tipo` set('porto','aeroporto') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

--
-- Dump dei dati per la tabella `tr_strutture`
--

INSERT INTO `tr_strutture` (`id`, `tipo`) VALUES
(1, 'aeroporto'),
(2, 'aeroporto');

-- --------------------------------------------------------

--
-- Struttura della tabella `tr_tariffe`
--

CREATE TABLE `tr_tariffe` (
  `id` int(11) NOT NULL,
  `id_tipo_percorso` int(11) NOT NULL,
  `numero_persone` int(11) NOT NULL,
  `prezzo` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `tr_tariffe`
--

INSERT INTO `tr_tariffe` (`id`, `id_tipo_percorso`, `numero_persone`, `prezzo`) VALUES
(1, 1, 1, 42),
(2, 1, 2, 21),
(3, 1, 3, 14),
(4, 1, 4, 12.5),
(5, 1, 5, 11.5),
(6, 1, 6, 11),
(7, 1, 7, 10.5),
(8, 1, 8, 10),
(11, 1, 0, 42),
(12, 2, 1, 42),
(13, 2, 2, 21),
(14, 2, 3, 14),
(15, 2, 4, 12.5),
(16, 2, 5, 11.5),
(17, 2, 6, 11),
(18, 2, 7, 10.5),
(19, 2, 8, 10),
(22, 2, 0, 42),
(23, 3, 1, 100),
(24, 3, 2, 50),
(25, 3, 3, 33),
(26, 3, 4, 30),
(27, 3, 5, 30),
(28, 3, 6, 29),
(29, 3, 7, 28),
(30, 3, 8, 27),
(33, 3, 0, 100),
(34, 4, 1, 450),
(35, 4, 2, 225),
(36, 4, 3, 150),
(37, 4, 4, 112.5),
(38, 4, 5, 98),
(39, 4, 6, 82),
(40, 4, 7, 70),
(41, 4, 8, 62),
(44, 4, 0, 450),
(45, 5, 1, 160),
(46, 5, 2, 80),
(47, 5, 3, 54),
(48, 5, 4, 40),
(49, 5, 5, 40),
(50, 5, 6, 34),
(51, 5, 7, 29),
(52, 5, 8, 25),
(55, 5, 0, 160),
(56, 6, 1, 120),
(57, 6, 2, 60),
(58, 6, 3, 40),
(59, 6, 4, 30),
(60, 6, 5, 24),
(61, 6, 6, 20),
(62, 6, 7, 17.5),
(63, 6, 8, 15),
(66, 6, 0, 120),
(67, 15, 0, 100),
(68, 15, 1, 100),
(69, 15, 2, 50),
(70, 15, 3, 33),
(71, 15, 4, 30),
(72, 15, 5, 30),
(73, 15, 6, 29),
(74, 15, 7, 28),
(75, 15, 8, 27),
(86, 12, 0, 110),
(77, 11, 0, 110),
(78, 11, 1, 110),
(79, 11, 2, 55),
(80, 11, 3, 36.5),
(81, 11, 4, 30),
(82, 11, 5, 28),
(83, 11, 6, 26.5),
(84, 11, 7, 25.5),
(85, 11, 8, 24),
(87, 12, 1, 110),
(88, 12, 2, 55),
(89, 12, 3, 36.5),
(90, 12, 4, 30),
(91, 12, 5, 28),
(92, 12, 6, 26.5),
(93, 12, 7, 25.5),
(94, 12, 8, 24),
(95, 13, 0, 110),
(96, 13, 1, 110),
(97, 13, 2, 55),
(98, 13, 3, 36.5),
(99, 13, 4, 30),
(100, 13, 5, 28),
(101, 13, 6, 26.5),
(102, 13, 7, 25.5),
(103, 13, 8, 24),
(104, 14, 0, 110),
(105, 14, 1, 110),
(106, 14, 2, 55),
(107, 14, 3, 36.5),
(108, 14, 4, 30),
(109, 14, 5, 28),
(110, 14, 6, 26.5),
(111, 14, 7, 25.5),
(112, 14, 8, 24);

-- --------------------------------------------------------

--
-- Struttura della tabella `tr_tipo_percorso`
--

CREATE TABLE `tr_tipo_percorso` (
  `id` int(11) NOT NULL,
  `descrizione` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `seriale` int(11) NOT NULL,
  `max_shuttle` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `tr_tipo_percorso`
--

INSERT INTO `tr_tipo_percorso` (`id`, `descrizione`, `seriale`, `max_shuttle`) VALUES
(1, 'שדה התעופה פיומיצ\'ינו – מרכז רומא', 10, 10),
(2, 'מרכז רומא – שדה התעופה פיומיצ\'ינו', 20, 10),
(3, 'רומא – אאוטלט קסטל רומאנו – הלוך חזור', 30, 10),
(4, 'טיול יום לפירנצה', 40, 10),
(5, 'טיול יום ברומא', 50, 10),
(6, 'טיול לילה ברומא', 60, 10),
(9, 'טיול יום חוף אמאלפי', 45, 10),
(10, 'טיול יום נאפולי ופומפיי', 42, 10),
(11, 'שאטל משדה התעופה פיומיצ׳ינו לנמל האוניות צ׳יביטבקייה', 50, 10),
(12, 'שאטל ממרכז רומא לנמל האוניות צ׳יביטבקייה', 60, 10),
(13, 'שאטל מנמל האוניות צ׳יביטבקייה לשדה התעופה פיומיצ׳ינו', 70, 10),
(14, 'שאטל מנמל האוניות צ׳יביטבקייה למרכז רומא', 80, 10),
(15, 'טיול יום לטיבולי ווילה אדריאנה + ווילה דסטה', 90, 10);

-- --------------------------------------------------------

--
-- Struttura della tabella `tr_tipo_percorso2raggruppamenti`
--

CREATE TABLE `tr_tipo_percorso2raggruppamenti` (
  `id_tipo_percorso` int(11) NOT NULL,
  `id_raggruppamento` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `tr_tipo_percorso2raggruppamenti`
--

INSERT INTO `tr_tipo_percorso2raggruppamenti` (`id_tipo_percorso`, `id_raggruppamento`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 2),
(5, 2),
(6, 3),
(7, 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `tr_utenti`
--

CREATE TABLE `tr_utenti` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT '',
  `cognome` varchar(200) DEFAULT '',
  `email` varchar(200) DEFAULT '',
  `uname` varchar(200) DEFAULT '',
  `passwd` varchar(200) DEFAULT '',
  `onoff` int(11) NOT NULL DEFAULT '0',
  `ultimalogin` datetime DEFAULT NULL,
  `loginnow` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `tr_utenti`
--

INSERT INTO `tr_utenti` (`id`, `nome`, `cognome`, `email`, `uname`, `passwd`, `onoff`, `ultimalogin`, `loginnow`) VALUES
(1, 'admin', '', '', 'a', 'a', 1, '0000-00-00 00:00:00', '2013-02-15 03:17:20'),
(2, 'eyal', '', '', 'eyal', 'eyal', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `tr_voli_piu_orari`
--

CREATE TABLE `tr_voli_piu_orari` (
  `id` int(11) NOT NULL,
  `id_struttura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `tr_voli_piu_orari`
--

INSERT INTO `tr_voli_piu_orari` (`id`, `id_struttura`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 2),
(5, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `tr_voli_piu_orari_2_lingue`
--

CREATE TABLE `tr_voli_piu_orari_2_lingue` (
  `id_volo_piu_orario` int(11) NOT NULL,
  `descrizione_it` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descrizione_abjad` varchar(255) NOT NULL,
  `descrizione_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `tr_voli_piu_orari_2_lingue`
--

INSERT INTO `tr_voli_piu_orari_2_lingue` (`id_volo_piu_orario`, `descrizione_it`, `descrizione_abjad`, `descrizione_en`) VALUES
(1, 'Descrizione 1', 'ציאה מהשד', 'Description 1'),
(2, 'Descrizione 2', 'ציאה מהשד', 'Description 2'),
(3, 'Descrizione 3', 'ציאה מהשד', 'Description 3'),
(4, 'Descrizione 4', 'ציאה מהשד', 'Description 4'),
(5, 'Descrizione 5', 'ציאה מהשד', 'Description 5');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `tr_percorso`
--
ALTER TABLE `tr_percorso`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tr_prenotazione`
--
ALTER TABLE `tr_prenotazione`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tr_raggruppamenti`
--
ALTER TABLE `tr_raggruppamenti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tr_shuttle`
--
ALTER TABLE `tr_shuttle`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tr_struttura_2_lingue`
--
ALTER TABLE `tr_struttura_2_lingue`
  ADD UNIQUE KEY `id_struttura` (`id_struttura`);

--
-- Indici per le tabelle `tr_strutture`
--
ALTER TABLE `tr_strutture`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tr_tariffe`
--
ALTER TABLE `tr_tariffe`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tr_tipo_percorso`
--
ALTER TABLE `tr_tipo_percorso`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tr_utenti`
--
ALTER TABLE `tr_utenti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tr_voli_piu_orari`
--
ALTER TABLE `tr_voli_piu_orari`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tr_voli_piu_orari_2_lingue`
--
ALTER TABLE `tr_voli_piu_orari_2_lingue`
  ADD UNIQUE KEY `id_volo_piu_orario` (`id_volo_piu_orario`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `tr_percorso`
--
ALTER TABLE `tr_percorso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
--
-- AUTO_INCREMENT per la tabella `tr_prenotazione`
--
ALTER TABLE `tr_prenotazione`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT per la tabella `tr_raggruppamenti`
--
ALTER TABLE `tr_raggruppamenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT per la tabella `tr_shuttle`
--
ALTER TABLE `tr_shuttle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT per la tabella `tr_strutture`
--
ALTER TABLE `tr_strutture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `tr_tariffe`
--
ALTER TABLE `tr_tariffe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT per la tabella `tr_tipo_percorso`
--
ALTER TABLE `tr_tipo_percorso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT per la tabella `tr_utenti`
--
ALTER TABLE `tr_utenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT per la tabella `tr_voli_piu_orari`
--
ALTER TABLE `tr_voli_piu_orari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
