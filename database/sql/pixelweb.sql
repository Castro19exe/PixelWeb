-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Maio-2024 às 01:13
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pixelweb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `game`
--

CREATE TABLE `game` (
  `gameID` int(11) NOT NULL,
  `gameName` varchar(255) NOT NULL,
  `gameDescription` varchar(255) NOT NULL,
  `gameImage` varchar(255) NOT NULL,
  `gameLink` varchar(255) NOT NULL,
  `gameStatus` int(11) NOT NULL DEFAULT 1,
  `FkUserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `game`
--

INSERT INTO `game` (`gameID`, `gameName`, `gameDescription`, `gameImage`, `gameLink`, `gameStatus`, `FkUserID`) VALUES
(1, 'Snake | The Board Game', 'game test', 'snakeGame.jpg', 'SnakeGame/Index.html', 1, 1),
(2, 'game Test', 'game test', 'space.jpg', '', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `role`
--

CREATE TABLE `role` (
  `roleID` int(11) NOT NULL,
  `roleName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `role`
--

INSERT INTO `role` (`roleID`, `roleName`) VALUES
(1, 'Admin'),
(2, 'Normal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `score`
--

CREATE TABLE `score` (
  `scoreID` int(11) NOT NULL,
  `scoreNumber` int(11) NOT NULL,
  `FkGameID` int(11) NOT NULL,
  `FkUserID` int(11) NOT NULL,
  `FkGameDifficultyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userEmail` varchar(300) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userImage` varchar(255) NOT NULL DEFAULT 'unknown_user.jpg',
  `userRole` int(11) NOT NULL,
  `userStatus` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`userID`, `userName`, `userEmail`, `userPassword`, `userImage`, `userRole`, `userStatus`) VALUES
(1, 'Admin', 'admin2024pixelweb@gmail.com', '60de2f3696d45ef34215fe58653bf586608dd894', 'unknown_user.jpg', 1, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`gameID`),
  ADD KEY `FK_user` (`FkUserID`);

--
-- Índices para tabela `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleID`);

--
-- Índices para tabela `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`scoreID`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `userRole` (`userRole`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `game`
--
ALTER TABLE `game`
  MODIFY `gameID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de tabela `role`
--
ALTER TABLE `role`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `score`
--
ALTER TABLE `score`
  MODIFY `scoreID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`FkUserID`) REFERENCES `user` (`userID`);

--
-- Limitadores para a tabela `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`userRole`) REFERENCES `role` (`roleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
