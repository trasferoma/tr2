-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Set 01, 2017 alle 09:24
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
  `id_struttura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dump dei dati per la tabella `tr_mezzi_piu_orari`
--

INSERT INTO `tr_mezzi_piu_orari` (`id`, `id_struttura`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 2),
(5, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `tr_mezzi_piu_orari_2_lingue`
--

CREATE TABLE `tr_mezzi_piu_orari_2_lingue` (
  `id_mezzo_piu_orario` int(11) NOT NULL,
  `descrizione_it` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descrizione_abjad` varchar(255) NOT NULL,
  `descrizione_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dump dei dati per la tabella `tr_mezzi_piu_orari_2_lingue`
--

INSERT INTO `tr_mezzi_piu_orari_2_lingue` (`id_mezzo_piu_orario`, `descrizione_it`, `descrizione_abjad`, `descrizione_en`) VALUES
(1, 'Descrizione 1', 'ציאה מהשד', 'Description 1'),
(2, 'Descrizione 2', 'ציאה מהשד', 'Description 2'),
(3, 'Descrizione 3', 'ציאה מהשד', 'Description 3'),
(4, 'Descrizione 4', 'ציאה מהשד', 'Description 4'),
(5, 'Descrizione 5', 'ציאה מהשד', 'Description 5');

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

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `tr_mezzi_piu_orari`
--
ALTER TABLE `tr_mezzi_piu_orari`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tr_mezzi_piu_orari_2_lingue`
--
ALTER TABLE `tr_mezzi_piu_orari_2_lingue`
  ADD UNIQUE KEY `id_volo_piu_orario` (`id_mezzo_piu_orario`);

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
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `tr_mezzi_piu_orari`
--
ALTER TABLE `tr_mezzi_piu_orari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT per la tabella `tr_strutture`
--
ALTER TABLE `tr_strutture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
