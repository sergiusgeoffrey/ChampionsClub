-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2020 at 07:40 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project tekweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id_game` int(11) NOT NULL,
  `nama_game` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id_game`, `nama_game`) VALUES
(1, 'CS:GO'),
(2, 'DOTA 2');

-- --------------------------------------------------------

--
-- Table structure for table `register_tournament`
--

CREATE TABLE `register_tournament` (
  `id_pendaftaran` int(11) NOT NULL,
  `id_game` int(11) NOT NULL,
  `id_team` varchar(255) NOT NULL,
  `id_tournament` int(11) NOT NULL,
  `tanggal` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `waktu` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register_tournament`
--

INSERT INTO `register_tournament` (`id_pendaftaran`, `id_game`, `id_team`, `id_tournament`, `tanggal`, `waktu`) VALUES
(15, 2, 'RNIR3YUM', 2, '24-26/12/2020', '13.30 - 17.30');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id_user_request` int(11) NOT NULL,
  `username_request` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `id_owner` int(11) NOT NULL,
  `id_team` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id_user_request`, `username_request`, `id_owner`, `id_team`) VALUES
(8, 'c14190034', 9, 'RNIR3YUM');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id_team` varchar(255) NOT NULL,
  `id_owner` int(11) DEFAULT NULL,
  `status_team` tinyint(1) NOT NULL,
  `nama_team` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `jumlah_anggota` int(11) NOT NULL DEFAULT 1,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id_team`, `id_owner`, `status_team`, `nama_team`, `jumlah_anggota`, `logo`) VALUES
('2mBb3FX1', 1, 0, 'mangoclub', 3, './data/logo/5fe01105907a25.81974291.png'),
('bxUvZlIZ', 6, 0, 'halo', 1, './data/logo/5fe180e4b01bd6.25790013.jpeg'),
('LXACswUL', 4, 0, 'gaming4life', 2, './data/logo/5fe085b1d287a7.14640947.jpeg'),
('LzbR6DZS', 2, 0, 'yeygaming', 1, './data/logo/5fe015c325aab9.71214896.png'),
('RNIR3YUM', 9, 0, 'teknologiweb', 2, './data/logo/5fe190a3124f88.27570845.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tournament`
--

CREATE TABLE `tournament` (
  `id_tournament` int(11) NOT NULL,
  `league` varchar(255) NOT NULL,
  `waktu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `tanggal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tournament`
--

INSERT INTO `tournament` (`id_tournament`, `league`, `waktu`, `tanggal`) VALUES
(1, 'ESL_ONE', '12.00 - 16.30', '22-25/12/2020'),
(2, 'DreamLeague', '13.30 - 17.30', '24-26/12/2020'),
(3, 'MangoCup', '16.00 - 21.00', '28-31/12/2020');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_team` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT '0',
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `real_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `tanggal_lahir` varchar(255) NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `id_discord` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_team`, `username`, `real_name`, `tanggal_lahir`, `gender`, `email`, `password`, `id_discord`, `status`) VALUES
(1, '2mBb3FX1', 'dummy', 'this_is_real_name', '2013-05-01', 'Others', 'dummy@test.com', 'test', 'hahaha', 1),
(2, 'LzbR6DZS', 'MangoMan', 'Gejo', '2001-05-09', 'Male', 'yep.cock', 'allo', '1234', 1),
(3, 'LXACswUL', 'S1K4R4', 'Bagus', '1998-12-14', 'Male', 'Gay', 'baskaragusba', '5552', 1),
(4, 'LXACswUL', 'PBO', 'Pemrograman Berorientasi Obyek', '1995-12-25', 'Others', 'gotoxyezpz', 'hariinigampangajaya', '6969', 1),
(5, '2mBb3FX1', 'hello', 'coba', '2020-12-24', 'Female', 'test', 'world', 'aweawe', 1),
(6, 'bxUvZlIZ', 'Timothy', 'Dwi', '2020-12-23', 'Female', 'timoty.dwiputra@putra.com', 'putra', '3304', 1),
(7, '2mBb3FX1', 'coba', 'test', '2001-09-05', 'Male', 'test@mail.com', 'testing', '#4444', 1),
(8, '0', 'c14190034', 'coba', '0123-12-03', 'Male', 'sergius.geoffrey@gmail.com', '1234', 'gwgw', 1),
(9, 'RNIR3YUM', 'tekweb', 'sergius', '2001-09-05', 'Male', 'email@petra.ac.id', '1234', '#1234', 1),
(10, 'RNIR3YUM', 'kel4', 'kelompok4', '2010-02-10', 'Others', 'test@gmail.com', 'cobadulu', '1234', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id_game`);

--
-- Indexes for table `register_tournament`
--
ALTER TABLE `register_tournament`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `game_choice` (`id_game`),
  ADD KEY `team_id` (`id_team`),
  ADD KEY `tournament_choice` (`id_tournament`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id_team`),
  ADD KEY `team_owner` (`id_owner`);

--
-- Indexes for table `tournament`
--
ALTER TABLE `tournament`
  ADD PRIMARY KEY (`id_tournament`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id_game` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `register_tournament`
--
ALTER TABLE `register_tournament`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tournament`
--
ALTER TABLE `tournament`
  MODIFY `id_tournament` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `register_tournament`
--
ALTER TABLE `register_tournament`
  ADD CONSTRAINT `game_choice` FOREIGN KEY (`id_game`) REFERENCES `game` (`id_game`) ON DELETE CASCADE,
  ADD CONSTRAINT `team_id` FOREIGN KEY (`id_team`) REFERENCES `team` (`id_team`) ON DELETE CASCADE,
  ADD CONSTRAINT `tournament_choice` FOREIGN KEY (`id_tournament`) REFERENCES `tournament` (`id_tournament`) ON DELETE CASCADE;

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_owner` FOREIGN KEY (`id_owner`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
