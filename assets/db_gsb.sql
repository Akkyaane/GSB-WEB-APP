-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 03 mars 2024 à 17:22
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

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

DROP TABLE IF EXISTS `expense_sheets`;
CREATE TABLE IF NOT EXISTS `expense_sheets` (
  `expense_sheet_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `receipts_id` int NOT NULL,
  `treatment_id` int DEFAULT NULL,
  `request_date` date NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `transport_category` int DEFAULT NULL,
  `kilometers_number` int DEFAULT NULL,
  `kilometer_expense` float DEFAULT NULL,
  `kilometer_expense_refund` float DEFAULT NULL,
  `kilometer_expense_unrefund` float DEFAULT NULL,
  `transport_expense` float DEFAULT NULL,
  `transport_expense_refund` float DEFAULT NULL,
  `transport_expense_unrefund` float DEFAULT NULL,
  `nights_number` int DEFAULT NULL,
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
  `total_amount_unrefund` float DEFAULT NULL,
  PRIMARY KEY (`expense_sheet_id`),
  KEY `id_user` (`user_id`),
  KEY `receipts_id` (`receipts_id`),
  KEY `treatment_id` (`treatment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `expense_sheets`
--

INSERT INTO `expense_sheets` (`expense_sheet_id`, `user_id`, `receipts_id`, `treatment_id`, `request_date`, `start_date`, `end_date`, `transport_category`, `kilometers_number`, `kilometer_expense`, `kilometer_expense_refund`, `kilometer_expense_unrefund`, `transport_expense`, `transport_expense_refund`, `transport_expense_unrefund`, `nights_number`, `accommodation_expense`, `accommodation_expense_refund`, `accommodation_expense_unrefund`, `food_expense`, `food_expense_refund`, `food_expense_unrefund`, `other_expense`, `other_expense_refund`, `other_expense_unrefund`, `message`, `total_amount`, `total_amount_refund`, `total_amount_unrefund`) VALUES
(1, 5, 1, 1, '2024-03-03', '2024-03-01', '2024-03-02', 2, NULL, NULL, NULL, NULL, 129, 129, NULL, 1, 51, 51, NULL, 32.15, 32.15, NULL, 150, 150, NULL, 'Participation à une conférence.', 362.15, 362.15, 0),
(2, 5, 2, 2, '2024-02-15', '2024-03-11', '2024-03-14', 4, 529, 368.713, 368.713, NULL, NULL, NULL, NULL, 3, 325, 325, NULL, 69.87, 69.87, NULL, 250, 200, 50, 'Participation à divers évènements.', 1013.58, 963.58, 50),
(3, 5, 3, 3, '2023-12-05', '2024-03-05', '2024-03-05', 3, NULL, NULL, NULL, NULL, 125, 125, NULL, NULL, NULL, NULL, NULL, 15.63, 15.63, NULL, 110, 110, NULL, 'Participation à une conférence.', 250.63, 250.63, 0),
(4, 3, 4, 4, '2024-03-29', '2024-03-22', '2024-03-28', 1, NULL, NULL, NULL, NULL, 1250, 1250, NULL, 6, 1124, 1124, NULL, 256.45, 256.45, NULL, 300, 200, 100, 'Participation à diverses conférences.', 2930.45, 2830.45, 100),
(5, 3, 5, NULL, '2024-04-18', '2024-04-18', '2024-04-18', 4, 123, 78.228, 78.228, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20.63, 20.63, NULL, NULL, NULL, NULL, NULL, 98.86, 98.86, 0),
(6, 3, 6, NULL, '2024-05-17', '2024-05-15', '2024-05-16', 2, NULL, NULL, NULL, NULL, 263, 263, NULL, NULL, NULL, NULL, NULL, 42.36, 42.36, NULL, 96, 96, NULL, 'Participation à un évènement.', 401.36, 401.36, 0);

-- --------------------------------------------------------

--
-- Structure de la table `kilometer_costs`
--

DROP TABLE IF EXISTS `kilometer_costs`;
CREATE TABLE IF NOT EXISTS `kilometer_costs` (
  `kilometer_cost_id` int NOT NULL AUTO_INCREMENT,
  `horsepower` int NOT NULL,
  `cost` float NOT NULL,
  PRIMARY KEY (`kilometer_cost_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `kilometer_costs`
--

INSERT INTO `kilometer_costs` (`kilometer_cost_id`, `horsepower`, `cost`) VALUES
(1, 3, 0.529),
(2, 4, 0.606),
(3, 5, 0.636),
(4, 6, 0.665),
(5, 7, 0.697);

-- --------------------------------------------------------

--
-- Structure de la table `receipts`
--

DROP TABLE IF EXISTS `receipts`;
CREATE TABLE IF NOT EXISTS `receipts` (
  `receipts_id` int NOT NULL AUTO_INCREMENT,
  `transport_expense_file` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `accommodation_expense_file` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `food_expense_file` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `other_expense_file` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`receipts_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `receipts`
--

INSERT INTO `receipts` (`receipts_id`, `transport_expense_file`, `accommodation_expense_file`, `food_expense_file`, `other_expense_file`) VALUES
(1, '../../../../GSB-WEB-APP/assets/uploads/transport/1_transport-receipt.jpg', '../../../../GSB-WEB-APP/assets/uploads/accommodation/1_accommodation-receipt.png', '../../../../GSB-WEB-APP/assets/uploads/food/1_food-receipt.jpeg', '../../../../GSB-WEB-APP/assets/uploads/other/1_other-receipt.webp'),
(2, NULL, '../../../../GSB-WEB-APP/assets/uploads/accommodation/2_transport-receipt.jpg', '../../../../GSB-WEB-APP/assets/uploads/food/2_food-receipt.jpeg', '../../../../GSB-WEB-APP/assets/uploads/other/2_other-receipt.webp'),
(3, '../../../../GSB-WEB-APP/assets/uploads/transport/3_transport-receipt.jpg', NULL, '../../../../GSB-WEB-APP/assets/uploads/food/3_food-receipt.jpeg', '../../../../GSB-WEB-APP/assets/uploads/other/3_other-receipt.webp'),
(4, '../../../../GSB-WEB-APP/assets/uploads/transport/4_transport-receipt.jpg', '../../../../GSB-WEB-APP/assets/uploads/accommodation/4_accommodation-receipt.png', '../../../../GSB-WEB-APP/assets/uploads/food/4_food-receipt.jpeg', '../../../../GSB-WEB-APP/assets/uploads/other/4_other-receipt.webp'),
(5, NULL, NULL, '../../../../GSB-WEB-APP/assets/uploads/food/5_food-receipt.jpeg', NULL),
(6, '../../../../GSB-WEB-APP/assets/uploads/transport/6_transport-receipt.jpg', NULL, '../../../../GSB-WEB-APP/assets/uploads/food/6_food-receipt.jpeg', '../../../../GSB-WEB-APP/assets/uploads/other/6_other-receipt.webp');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int NOT NULL,
  `category` char(20) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`role_id`, `category`) VALUES
(1, 'administrator'),
(2, 'accountant'),
(3, 'visitor');

-- --------------------------------------------------------

--
-- Structure de la table `treatment`
--

DROP TABLE IF EXISTS `treatment`;
CREATE TABLE IF NOT EXISTS `treatment` (
  `treatment_id` int NOT NULL AUTO_INCREMENT,
  `treatment_status` tinyint(1) NOT NULL,
  `remark` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`treatment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `treatment`
--

INSERT INTO `treatment` (`treatment_id`, `treatment_status`, `remark`) VALUES
(1, 1, NULL),
(2, 1, NULL),
(3, 2, 'Correspondance des prix incorrecte entre le montant de la fiche de frais et le justificatif concernant les frais d\'alimentation.'),
(4, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `kilometer_costs_id` int DEFAULT NULL,
  `role_id` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`),
  KEY `role_id` (`role_id`),
  KEY `kilometercosts_id` (`kilometer_costs_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `kilometer_costs_id`, `role_id`, `first_name`, `last_name`, `email`, `password`, `status`) VALUES
(1, NULL, 1, 'Harry', 'Potter', 'harrypotter@gmail.com', '$2y$10$ZRzK3edRGIooYnYkDZs3YeUw9L86UwVClbMRpREXkTc4t7OIUyMTq', 1),
(2, NULL, 2, 'Hermione', 'Granger', 'hermionegranger@gmail.com', '$2y$10$4ZCPDPFU0ke6YyDvWxSvJ.kcZSP.6E0teDWS0w6la5iTlZqe/BrPu', 1),
(3, 3, 3, 'Ron', 'Weasley', 'ronweasley@gmail.com', '$2y$10$4qMyyA.k5AwwkIZ8/EiO1u5nxLP6p5V2m/ptdE2pivFkRnNjQxbZe', 1),
(4, NULL, 2, 'Severus', 'Rogue', 'severusrogue@gmail.com', '$2y$10$a7dkRctPrWWr0obrDzrTx.l95XuUaOjZnMWI9rANfacMSq1b5y5vC', 0),
(5, 5, 3, 'Minerva', 'McGonagall', 'minervamcgonagall@gmail.com', '$2y$10$snL84HEiKKjiIcil4K6H7e9Qj2tIx4v7pe/IaDSQPS5fP6wYFerIi', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `expense_sheets`
--
ALTER TABLE `expense_sheets`
  ADD CONSTRAINT `expense_sheets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `expense_sheets_ibfk_2` FOREIGN KEY (`receipts_id`) REFERENCES `receipts` (`receipts_id`),
  ADD CONSTRAINT `expense_sheets_ibfk_3` FOREIGN KEY (`treatment_id`) REFERENCES `treatment` (`treatment_id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`kilometer_costs_id`) REFERENCES `kilometer_costs` (`kilometer_cost_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
