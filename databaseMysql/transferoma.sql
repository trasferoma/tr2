-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Set 19, 2017 alle 15:11
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
-- Struttura della tabella `tr_mezzi_piu_orari`
--

CREATE TABLE `tr_mezzi_piu_orari` (
  `id` int(11) NOT NULL,
  `id_struttura` int(11) NOT NULL,
  `direzione` set('arrivo','partenza') NOT NULL,
  `descrizione_it` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descrizione_abjad` varchar(255) NOT NULL,
  `descrizione_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `attiva` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dump dei dati per la tabella `tr_mezzi_piu_orari`
--

INSERT INTO `tr_mezzi_piu_orari` (`id`, `id_struttura`, `direzione`, `descrizione_it`, `descrizione_abjad`, `descrizione_en`, `attiva`) VALUES
(1, 1, 'arrivo', 'Descrizione 1', '???? ????', 'Description 1', 1),
(2, 1, 'arrivo', 'Descrizione 2', 'ציאה מהשד', 'Description 2', 1),
(3, 1, 'partenza', 'Descrizione 3', 'ציאה מהשד', 'Description 3', 1),
(4, 2, 'arrivo', 'Descrizione 4', 'ציאה מהשד', 'Description 4', 1),
(5, 13, 'partenza', 'Descrizione 5', 'ציאה מהשד', 'Description 5', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `tr_prenotazione`
--

CREATE TABLE `tr_prenotazione` (
  `id` int(11) NOT NULL,
  `data_arrivo` date NOT NULL,
  `id_struttura` int(11) NOT NULL,
  `id_mezzo_piu_orario` int(11) NOT NULL,
  `numero_adulti` int(11) NOT NULL,
  `numero_animali` int(11) NOT NULL,
  `numero_bambini_3_6` int(11) NOT NULL,
  `numero_bambini_6_11` int(11) NOT NULL,
  `nome_contatto` varchar(255) NOT NULL,
  `cognome_contatto` varchar(255) NOT NULL,
  `email_contatto` varchar(255) NOT NULL,
  `cellulare_contatto` varchar(20) NOT NULL,
  `indirizzo_destinazione` varchar(255) NOT NULL,
  `tipo` set('arrivo_in_roma','partenza_da_roma') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dump dei dati per la tabella `tr_prenotazione`
--

INSERT INTO `tr_prenotazione` (`id`, `data_arrivo`, `id_struttura`, `id_mezzo_piu_orario`, `numero_adulti`, `numero_animali`, `numero_bambini_3_6`, `numero_bambini_6_11`, `nome_contatto`, `cognome_contatto`, `email_contatto`, `cellulare_contatto`, `indirizzo_destinazione`, `tipo`) VALUES
(2, '2017-09-05', 1, 1, 1, 1, 1, 1, '1', '1', 'xxx@xxx.xx', '3474377079', 'xxxxx', 'arrivo_in_roma'),
(3, '2017-09-19', 1, 3, 1, 2, 3, 4, '5', '6', 'xxx@xxx.xx', '3474377079', 'zzz', 'partenza_da_roma');

-- --------------------------------------------------------

--
-- Struttura della tabella `tr_strutture`
--

CREATE TABLE `tr_strutture` (
  `id` int(11) NOT NULL,
  `tipo` set('aeroporto','porto') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `attiva` int(1) NOT NULL DEFAULT '1',
  `descrizione_it` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descrizione_abjad` varchar(255) NOT NULL,
  `descrizione_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dump dei dati per la tabella `tr_strutture`
--

INSERT INTO `tr_strutture` (`id`, `tipo`, `attiva`, `descrizione_it`, `descrizione_abjad`, `descrizione_en`) VALUES
(1, 'aeroporto', 1, 'Ciampino', 'ציאה מהשד', 'Ciampino'),
(2, 'aeroporto', 0, 'Fiumicino', 'ציאה מהשד', 'Fiumicino'),
(3, 'aeroporto', 1, 'a3', 'c3', 'b3'),
(13, 'porto', 1, 'cc112', 'cc', 'cc');

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
  `onoff` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `tr_utenti`
--

INSERT INTO `tr_utenti` (`id`, `nome`, `cognome`, `email`, `uname`, `passwd`, `onoff`) VALUES
(1, '', '', '', 'xx', 'xx', 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `tr_mezzi_piu_orari`
--
ALTER TABLE `tr_mezzi_piu_orari`
  ADD UNIQUE KEY `id_volo_piu_orario` (`id`);

--
-- Indici per le tabelle `tr_prenotazione`
--
ALTER TABLE `tr_prenotazione`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tr_strutture`
--
ALTER TABLE `tr_strutture`
  ADD UNIQUE KEY `id_struttura` (`id`);

--
-- Indici per le tabelle `tr_utenti`
--
ALTER TABLE `tr_utenti`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `tr_mezzi_piu_orari`
--
ALTER TABLE `tr_mezzi_piu_orari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT per la tabella `tr_prenotazione`
--
ALTER TABLE `tr_prenotazione`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT per la tabella `tr_strutture`
--
ALTER TABLE `tr_strutture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
