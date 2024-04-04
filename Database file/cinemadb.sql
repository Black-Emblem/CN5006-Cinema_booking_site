-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 04, 2024 at 11:12 AM
-- Server version: 10.6.5-MariaDB
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinemadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `brunch`
--

DROP TABLE IF EXISTS `brunch`;
CREATE TABLE IF NOT EXISTS `brunch` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `NAME` text NOT NULL,
  `Address` text NOT NULL,
  `Contact` bigint(14) NOT NULL,
  `Halls` int(2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brunch`
--

INSERT INTO `brunch` (`ID`, `NAME`, `Address`, `Contact`, `Halls`) VALUES
(1, 'Appolo Theatre Θεσσαλονίκη', 'Γεωρ. Ιβάνωφ , Θεσσαλονίκη , Ελλάδα', 305555555555, 3),
(2, 'Appolo Theatre Βόλος', 'Γιάννη Δήμου 65, Βόλος 383 33, Ελλάδα', 305555555555, 2),
(3, 'Appolo Theatre Αθήνα', 'Αγίου Δημητρίου 32-40, Ψυχικό 154 52, Ελλάδα', 305555555555, 3);

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

DROP TABLE IF EXISTS `hall`;
CREATE TABLE IF NOT EXISTS `hall` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `Brunch_ID` int(3) NOT NULL,
  `nLines` int(2) NOT NULL,
  `nRows` int(2) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Brunch_ID` (`Brunch_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`ID`, `Brunch_ID`, `nLines`, `nRows`) VALUES
(1, 1, 9, 8),
(2, 1, 12, 12),
(3, 1, 6, 7),
(4, 2, 8, 8),
(5, 2, 8, 8),
(6, 3, 15, 15),
(7, 3, 7, 7),
(8, 3, 9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `ID` int(9) NOT NULL AUTO_INCREMENT,
  `State` text NOT NULL,
  `Name` text NOT NULL,
  `Description` text NOT NULL,
  `Duration` int(4) NOT NULL,
  `Type` text NOT NULL,
  `age_rist` int(2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`ID`, `State`, `Name`, `Description`, `Duration`, `Type`, `age_rist`) VALUES
(1, 'playing', 'Dune', 'A mythic and emotionally charged hero\'s journey, \"Dune\" tells the story of Paul Atreides, a brilliant and gifted young man born into a great destiny beyond his understanding, who must travel to the most dangerous planet in the universe to ensure the future of his family and his people. As malevolent forces explode into conflict over the planet\'s exclusive supply of the most precious resource in existence-a commodity capable of unlocking humanity\'s greatest potential-only those who can conquer their fear will survive.', 155, 'Sci-Fi', 13),
(2, 'down', 'The French Dispatch', 'Arthur Howitzer Jr., the editor of the newspaper The French Dispatch, dies suddenly of a heart attack. According to the wishes expressed in his will, publication of the newspaper is immediately suspended following one final farewell issue, in which three articles from past editions of the paper are republished, along with an obituary.', 107, 'Comedy', 18),
(3, 'playing', 'No Time to Die', 'Bond has left active service and is enjoying a tranquil life in Jamaica. His peace is short-lived when his old friend Felix Leiter from the CIA turns up asking for help. The mission to rescue a kidnapped scientist turns out to be far more treacherous than expected, leading Bond onto the trail of a mysterious villain armed with dangerous new technology.', 163, 'Action', 13),
(4, 'down', 'The Dig', 'An archaeologist embarks on the historically important excavation of Sutton Hoo in 1938.', 112, 'Biography', 13),
(5, 'playing', 'Little Fish', 'A couple fights to hold their relationship together as a memory loss virus spreads and threatens to erase the history of their love and courtship.', 101, 'Drama', 18),
(6, 'playing', 'Last Night in Soho', 'In acclaimed director Edgar Wright\'s psychological thriller, Eloise, an aspiring fashion designer, is mysteriously able to enter the 1960s where she encounters a dazzling wannabe singer, Sandie. But the glamour is not all it appears to be and the dreams of the past start to crack and splinter into something far darker.', 116, 'Horror', 18),
(7, 'down', 'Licorice Pizza', 'LICORICE PIZZA is the story of Alana Kane and Gary Valentine growing up, running around and falling in love in the San Fernando Valley, 1973. Written and Directed by Paul Thomas Anderson, the film tracks the treacherous navigation of first love.', 133, 'Comedy', 18),
(8, 'playing', 'Spider-Man: No Way Home', 'Peter Parker\'s secret identity is revealed to the entire world. Desperate for help, Peter turns to Doctor Strange to make the world forget that he is Spider-Man. The spell goes horribly wrong and shatters the multiverse, bringing in monstrous villains that could destroy the world.', 148, 'Action', 13),
(9, 'down', 'The Green Knight', 'An epic fantasy adventure based on the timeless Arthurian legend, \"The Green Knight\" tells the story of Sir Gawain (Dev Patel), King Arthur\'s reckless and headstrong nephew, who embarks on a daring quest to confront the eponymous Green Knight, a gigantic emerald-skinned stranger and tester of men. Gawain contends with ghosts, giants, thieves, and schemers in what becomes a deeper journey to define his character and prove his worth in the eyes of his family and kingdom by facing the ultimate challenger. From visionary filmmaker David Lowery comes a fresh and bold spin on a classic tale from the knights of the round table.', 130, 'Adventure', 18),
(10, 'down', 'The Power of the Dog', 'Severe, pale-eyed, handsome, Phil Burbank is brutally beguiling. All of Phil\'s romance, power and fragility is trapped in the past and in the land: He can castrate a bull calf with two swift slashes of his knife; he swims naked in the river, smearing his body with mud. He is a cowboy as raw as his hides. The year is 1925. The Burbank brothers are wealthy ranchers in Montana. At the Red Mill restaurant on their way to market, the brothers meet Rose, the widowed proprietress, and her impressionable son Peter. Phil behaves so cruelly he drives them both to tears, revelling in their hurt and rousing his fellow cowhands to laughter - all except his brother George, who comforts Rose then returns to marry her. As Phil swings between fury and cunning, his taunting of Rose takes an eerie form - he hovers at the edges of her vision, whistling a tune she can no longer play. His mockery of her son is more overt, amplified by the cheering of Phil\'s cowhand disciples. Then Phil appears to take the boy under his wing. Is this latest gesture a softening that leaves Phil exposed, or a plot twisting further into menace? ', 126, 'Drama', 18),
(11, 'down', 'The Last Duel', 'King Charles VI declares that Knight Jean de Carrouges settle his dispute with his squire by challenging him to a duel.', 152, 'Action', 16),
(12, 'down', 'Nobody', 'A docile family man slowly reveals his true character after his house gets burgled by two petty thieves, which, coincidentally, leads him going to a bloody war with a Russian crime boss.', 152, 'Action', 16),
(13, 'playing', 'Pig', 'A truffle hunter who lives alone in the Oregonian wilderness must return to his past in Portland in search of his beloved foraging pig after she is kidnapped.', 92, 'Drama', 12),
(14, 'down', 'No Sudden Move', 'A group of criminals are brought together under mysterious circumstances and have to work together to uncover what\'s really going on when their simple job goes completely sideways.', 115, 'Crime', 18),
(15, 'down', 'Spencer', 'During her Christmas holidays with the royal family at the Sandringham estate in Norfolk, England, Diana Spencer, struggling with mental health problems, decides to end her decade-long marriage to Prince Charles.', 117, 'Biography', 12),
(16, 'playing', 'Drive My Car', 'Yusuke Kafuku is a stage actor and director happily married to his playwright wife. Then one day she disappears', 179, 'Drama', 12),
(17, 'down', 'West Side Story', 'An adaptation of the 1957 musical, West Side Story explores forbidden love and the rivalry between the Jets and the Sharks, two teenage street gangs of different ethnic backgrounds.', 156, 'Crime', 12),
(18, 'down', 'Nightmare Alley', 'An ambitious carny with a talent for manipulating people with a few well-chosen words hooks up with a female psychiatrist who is even more dangerous than he is.', 150, ' Crime', 16),
(19, 'playing', 'Together Together', 'When a young loner becomes the gestational surrogate for a single man in his 40s, the two strangers come to realize this unexpected relationship will challenge their perceptions of connection, boundaries and the particulars of love.', 90, 'Comedy', 18),
(20, 'playing', 'CODA', 'As a CODA (Child of Deaf Adults) Ruby is the only hearing person in her deaf family. When the family\'s fishing business is threatened, Ruby finds herself torn between pursuing her love of music by wanting to go to Berklee College of Music and her fear of abandoning her parents.', 111, 'Comedy', 13);

-- --------------------------------------------------------

--
-- Table structure for table `play`
--

DROP TABLE IF EXISTS `play`;
CREATE TABLE IF NOT EXISTS `play` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Brunch_ID` int(3) NOT NULL,
  `Hall_ID` int(3) NOT NULL,
  `Movie_ID` int(9) NOT NULL,
  `nDate` date NOT NULL,
  `nTime` time NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Brunch_ID` (`Brunch_ID`),
  KEY `Hall_ID` (`Hall_ID`),
  KEY `Movie_ID` (`Movie_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `play`
--

INSERT INTO `play` (`ID`, `Brunch_ID`, `Hall_ID`, `Movie_ID`, `nDate`, `nTime`, `price`) VALUES
(2, 1, 2, 3, '2025-05-20', '00:00:23', 15),
(3, 1, 2, 3, '2025-05-20', '22:15:23', 15),
(4, 1, 1, 3, '2025-05-20', '00:15:23', 15),
(5, 3, 6, 1, '2025-05-20', '18:21:00', 20),
(6, 1, 2, 1, '2025-05-20', '13:26:00', 20),
(7, 1, 2, 1, '2025-05-20', '15:00:00', 20),
(8, 1, 2, 1, '2025-05-20', '15:00:00', 20),
(9, 1, 1, 3, '2025-05-20', '21:00:00', 15),
(10, 1, 1, 5, '2025-05-20', '21:00:00', 15),
(11, 1, 2, 1, '2025-05-20', '12:00:00', 8),
(12, 2, 2, 3, '2025-05-20', '23:00:00', 25);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `ID` int(15) NOT NULL AUTO_INCREMENT,
  `user_ID` int(15) NOT NULL,
  `Play_ID` int(10) NOT NULL,
  `State` text NOT NULL,
  `rows_num` int(2) NOT NULL,
  `line_num` int(2) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `user_ID` (`user_ID`),
  KEY `Play_ID` (`Play_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ID`, `user_ID`, `Play_ID`, `State`, `rows_num`, `line_num`) VALUES
(2, 1, 6, 'confirmed', 4, 4),
(3, 1, 6, 'confirmed', 11, 3),
(4, 1, 6, 'confirmed', 12, 3),
(5, 1, 6, 'confirmed', 6, 8),
(6, 1, 6, 'confirmed', 7, 7),
(7, 1, 6, 'confirmed', 7, 9),
(8, 1, 6, 'confirmed', 8, 7),
(9, 1, 6, 'confirmed', 8, 9),
(10, 1, 6, 'confirmed', 9, 8),
(11, 1, 6, 'confirmed', 7, 8),
(12, 1, 6, 'confirmed', 8, 8),
(13, 1, 12, 'confirmed', 12, 1),
(14, 1, 12, 'confirmed', 8, 4),
(15, 1, 12, 'confirmed', 9, 4),
(16, 1, 12, 'confirmed', 10, 3),
(17, 1, 12, 'confirmed', 6, 7),
(18, 1, 12, 'confirmed', 7, 8),
(19, 1, 12, 'confirmed', 1, 1),
(20, 1, 12, 'confirmed', 1, 3),
(21, 1, 12, 'confirmed', 1, 6),
(22, 1, 12, 'confirmed', 1, 8),
(23, 1, 12, 'confirmed', 1, 10),
(24, 1, 12, 'confirmed', 2, 1),
(25, 1, 12, 'confirmed', 2, 4),
(26, 1, 12, 'confirmed', 2, 6),
(27, 1, 12, 'confirmed', 2, 10),
(28, 1, 12, 'confirmed', 2, 12),
(29, 1, 12, 'confirmed', 3, 2),
(30, 1, 12, 'confirmed', 3, 4),
(31, 1, 12, 'confirmed', 3, 6),
(32, 1, 12, 'confirmed', 3, 10),
(33, 1, 12, 'confirmed', 3, 12),
(34, 1, 12, 'confirmed', 4, 4),
(35, 1, 12, 'confirmed', 4, 6),
(36, 1, 12, 'confirmed', 4, 10),
(37, 1, 12, 'confirmed', 5, 1),
(38, 1, 12, 'confirmed', 5, 4),
(39, 1, 12, 'confirmed', 5, 6),
(40, 1, 12, 'confirmed', 5, 10),
(41, 1, 12, 'confirmed', 6, 1),
(42, 1, 12, 'confirmed', 6, 5),
(43, 1, 12, 'confirmed', 6, 8),
(44, 1, 12, 'confirmed', 6, 10),
(45, 1, 12, 'confirmed', 6, 12),
(46, 1, 12, 'confirmed', 7, 5),
(47, 1, 12, 'confirmed', 7, 7),
(48, 1, 12, 'confirmed', 7, 9),
(49, 1, 12, 'confirmed', 7, 11),
(50, 1, 12, 'confirmed', 8, 5),
(51, 1, 12, 'confirmed', 8, 7),
(52, 1, 12, 'confirmed', 8, 10),
(53, 1, 12, 'confirmed', 9, 6),
(54, 1, 12, 'confirmed', 9, 8),
(55, 1, 12, 'confirmed', 9, 10),
(56, 1, 12, 'confirmed', 10, 6),
(57, 1, 12, 'confirmed', 10, 8),
(58, 1, 12, 'confirmed', 10, 10),
(59, 1, 12, 'confirmed', 11, 6),
(60, 1, 12, 'confirmed', 11, 8),
(61, 1, 12, 'confirmed', 11, 10),
(62, 1, 12, 'confirmed', 12, 6),
(63, 1, 12, 'confirmed', 12, 9),
(64, 1, 11, 'confirmed', 12, 9),
(65, 1, 11, 'confirmed', 1, 2),
(66, 1, 11, 'confirmed', 2, 2),
(67, 1, 12, 'confirmed', 1, 2),
(68, 1, 11, 'confirmed', 10, 3),
(69, 1, 11, 'confirmed', 11, 3),
(70, 1, 11, 'confirmed', 11, 4),
(77, 1, 11, 'confirmed', 1, 7),
(78, 1, 11, 'confirmed', 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(15) NOT NULL AUTO_INCREMENT,
  `Email` text NOT NULL,
  `Password` varchar(40) NOT NULL,
  `role` text NOT NULL,
  `name` text NOT NULL,
  `birthday` date NOT NULL,
  `phone` int(14) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Email`, `Password`, `role`, `name`, `birthday`, `phone`) VALUES
(1, 'admin@admin.com', 'admin@admin.com', 'admin', 'admin', '2024-01-01', 5555555);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hall`
--
ALTER TABLE `hall`
  ADD CONSTRAINT `hall_ibfk_1` FOREIGN KEY (`Brunch_ID`) REFERENCES `brunch` (`ID`);

--
-- Constraints for table `play`
--
ALTER TABLE `play`
  ADD CONSTRAINT `play_ibfk_1` FOREIGN KEY (`Brunch_ID`) REFERENCES `brunch` (`ID`),
  ADD CONSTRAINT `play_ibfk_2` FOREIGN KEY (`Hall_ID`) REFERENCES `hall` (`ID`),
  ADD CONSTRAINT `play_ibfk_3` FOREIGN KEY (`Movie_ID`) REFERENCES `movies` (`ID`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`Play_ID`) REFERENCES `play` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
