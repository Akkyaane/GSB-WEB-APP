-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 30 déc. 2023 à 17:14
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_gsb`
--

-- --------------------------------------------------------

--
-- Structure de la table `expense_sheets`
--

CREATE TABLE `expense_sheets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `receipts_id` int(11) NOT NULL,
  `treatment_id` int(11) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `request_date` date NOT NULL,
  `transport_category` int(11) DEFAULT NULL,
  `kilometers_number` int(11) DEFAULT NULL,
  `kilometer_expense` float DEFAULT NULL,
  `kilometer_expense_refund` float DEFAULT NULL,
  `kilometer_expense_unrefund` float DEFAULT NULL,
  `transport_expense` float DEFAULT NULL,
  `transport_expense_refund` float DEFAULT NULL,
  `transport_expense_unrefund` float DEFAULT NULL,
  `nights_number` int(11) DEFAULT NULL,
  `accommodation_expense` float DEFAULT NULL,
  `accommodation_expense_refund` float DEFAULT NULL,
  `accommodation_expense_unrefund` float DEFAULT NULL,
  `food_expense` float DEFAULT NULL,
  `food_expense_refund` float DEFAULT NULL,
  `food_expense_unrefund` float DEFAULT NULL,
  `other_expense` float DEFAULT NULL,
  `other_expense_refund` float DEFAULT NULL,
  `other_expense_unrefund` float DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL,
  `total_amount` float NOT NULL,
  `total_amount_refund` float NOT NULL,
  `total_amount_unrefund` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `kilometer_costs`
--

CREATE TABLE `kilometer_costs` (
  `id` int(11) NOT NULL,
  `horsepower` int(11) NOT NULL,
  `cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `kilometer_costs`
--

INSERT INTO `kilometer_costs` (`id`, `horsepower`, `cost`) VALUES
(1, 3, 0.529),
(2, 4, 0.606),
(3, 5, 0.636),
(4, 6, 0.665),
(5, 7, 0.697);

-- --------------------------------------------------------

--
-- Structure de la table `receipts`
--

CREATE TABLE `receipts` (
  `id` int(11) NOT NULL,
  `transport_expense` varchar(255) DEFAULT NULL,
  `accommodation_expense` varchar(255) DEFAULT NULL,
  `food_expense` varchar(255) DEFAULT NULL,
  `other_expense` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `category` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `category`) VALUES
(1, 'administrator'),
(2, 'accountant'),
(3, 'visitor');

-- --------------------------------------------------------

--
-- Structure de la table `treatment`
--

CREATE TABLE `treatment` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `remark` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `kilometer_costs_id` int(11) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `kilometer_costs_id`, `role_id`, `first_name`, `last_name`, `email`, `password`, `status`) VALUES
(1, NULL, 1, 'Harry', 'Potter', 'harrypotter@gmail.com', '$2y$10$HWBQPuhfG74TTW5XsDZLHuqaZsvpz5P/8cijdofKXRXjj12Qab4oS', 1),
(2, NULL, 2, 'Hermione', 'Granger', 'hermionegranger@gmail.com', '$2y$10$Cervu8riKn640Xi6q7AjT.XyGA4rHovKJls2Zq85hKo355lOCsGr.', 1),
(3, 3, 3, 'Ron', 'Weasley', 'ronweasley@gmail.com', '$2y$10$yCnkGwQSxFHp6iTzifhPBesfbEBczfGBSFcC8smGohbO3WCFDe0HO', 1),
(4, 4, 3, 'Albus', 'Dumbledore', 'albusdumbledore@gmail.com', '$2y$10$WfcYuqe0TgLjb2woEKqu/uQq0pgHwJPGTobSH0V8b9Bvl1eNnkSy.', 1),
(5, 5, 3, 'Minerva', 'McGonagall', 'minervamcgonagall@gmail.com', '$2y$10$qxiVTx.MR9yJDexKOs6.fO5nTQ5EdE0QbaiAVUz0MwVHmaV1ZACHG', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `expense_sheets`
--
ALTER TABLE `expense_sheets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`user_id`),
  ADD KEY `receipts_id` (`receipts_id`),
  ADD KEY `treatment_id` (`treatment_id`);

--
-- Index pour la table `kilometer_costs`
--
ALTER TABLE `kilometer_costs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `kilometercosts_id` (`kilometer_costs_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `expense_sheets`
--
ALTER TABLE `expense_sheets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `kilometer_costs`
--
ALTER TABLE `kilometer_costs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `expense_sheets`
--
ALTER TABLE `expense_sheets`
  ADD CONSTRAINT `expense_sheets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `expense_sheets_ibfk_2` FOREIGN KEY (`receipts_id`) REFERENCES `receipts` (`id`),
  ADD CONSTRAINT `expense_sheets_ibfk_3` FOREIGN KEY (`treatment_id`) REFERENCES `treatment` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`kilometer_costs_id`) REFERENCES `kilometer_costs` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
