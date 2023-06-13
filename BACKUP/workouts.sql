-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 07. Jun 2023 um 17:01
-- Server-Version: 10.4.28-MariaDB
-- PHP-Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `workouts`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `equipment`
--

CREATE TABLE `equipment` (
  `EquipmentID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `equipment`
--

INSERT INTO `equipment` (`EquipmentID`, `Name`) VALUES
(0, 'Dumbells'),
(1, 'Barbells'),
(2, 'Bar'),
(3, 'Bodyweight'),
(4, 'Bike'),
(5, 'Ring'),
(6, 'Medicine ball'),
(7, 'Foam Roll'),
(8, 'Kettlebell'),
(9, 'Plates');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `excercise`
--

CREATE TABLE `excercise` (
  `ExcerciseID` int(11) NOT NULL,
  `MuscleGroupID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `EquipmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `excercise`
--

INSERT INTO `excercise` (`ExcerciseID`, `MuscleGroupID`, `Name`, `Description`, `EquipmentID`) VALUES
(0, 5, 'Pushups', 'push it', 3),
(1, 6, 'Pullups', 'pull it', 2),
(2, 6, 'Backsquat', 'Heavy', 5),
(3, 0, 'Sprint', 'Weeeeee', 7),
(4, 0, 'Bike', 'eeeeeeW', 9),
(5, 5, 'Wallball', 'Bounce it', 5),
(6, 4, 'Burpees', 'Up and down', 3),
(7, 3, 'Boxjumps', 'Down and up', 2),
(8, 1, 'Run', 'Like Sprint but slower', 4),
(9, 0, 'Pilates', 'Rest day is pilates day', 6);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `musclegroup`
--

CREATE TABLE `musclegroup` (
  `MuscleGroupID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `musclegroup`
--

INSERT INTO `musclegroup` (`MuscleGroupID`, `Name`) VALUES
(0, 'chest'),
(1, 'back'),
(2, 'arms'),
(3, 'abdominals'),
(4, 'legs'),
(5, 'shoulders'),
(6, 'calves'),
(7, 'hamstrings'),
(8, 'quadriceps'),
(9, 'glutes'),
(10, 'biceps'),
(11, 'triceps'),
(12, 'forearms'),
(13, 'trapezius'),
(14, 'lats');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `workout`
--

CREATE TABLE `workout` (
  `WorkoutID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `MuscleGroupID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `workout`
--

INSERT INTO `workout` (`WorkoutID`, `Name`, `MuscleGroupID`) VALUES
(0, 'Chestday', 3),
(1, 'Legday', 2),
(2, 'Armday', 5),
(3, 'Cardio', 7);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `workoutexcercise`
--

CREATE TABLE `workoutexcercise` (
  `ExcerciseID` int(11) NOT NULL,
  `WorkoutID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `workoutexcercise`
--

INSERT INTO `workoutexcercise` (`ExcerciseID`, `WorkoutID`) VALUES
(1, 0),
(2, 0),
(2, 1),
(3, 0),
(4, 1),
(5, 0),
(5, 1),
(5, 2),
(6, 0),
(7, 3),
(8, 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`EquipmentID`);

--
-- Indizes für die Tabelle `excercise`
--
ALTER TABLE `excercise`
  ADD PRIMARY KEY (`ExcerciseID`),
  ADD KEY `FK_MusclegroupExcer` (`MuscleGroupID`),
  ADD KEY `FK_Equipment` (`EquipmentID`);

--
-- Indizes für die Tabelle `musclegroup`
--
ALTER TABLE `musclegroup`
  ADD PRIMARY KEY (`MuscleGroupID`);

--
-- Indizes für die Tabelle `workout`
--
ALTER TABLE `workout`
  ADD PRIMARY KEY (`WorkoutID`),
  ADD KEY `FK_MusclegroupWork` (`MuscleGroupID`);

--
-- Indizes für die Tabelle `workoutexcercise`
--
ALTER TABLE `workoutexcercise`
  ADD PRIMARY KEY (`ExcerciseID`,`WorkoutID`),
  ADD KEY `FK_Excerwork` (`WorkoutID`);

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `excercise`
--
ALTER TABLE `excercise`
  ADD CONSTRAINT `FK_Equipment` FOREIGN KEY (`EquipmentID`) REFERENCES `equipment` (`EquipmentID`),
  ADD CONSTRAINT `FK_MusclegroupExcer` FOREIGN KEY (`MuscleGroupID`) REFERENCES `musclegroup` (`MuscleGroupID`);

--
-- Constraints der Tabelle `workout`
--
ALTER TABLE `workout`
  ADD CONSTRAINT `FK_MusclegroupWork` FOREIGN KEY (`MuscleGroupID`) REFERENCES `musclegroup` (`MuscleGroupID`);

--
-- Constraints der Tabelle `workoutexcercise`
--
ALTER TABLE `workoutexcercise`
  ADD CONSTRAINT `FK_Excerwork` FOREIGN KEY (`WorkoutID`) REFERENCES `workout` (`WorkoutID`),
  ADD CONSTRAINT `FK_Workexcer` FOREIGN KEY (`ExcerciseID`) REFERENCES `excercise` (`ExcerciseID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
