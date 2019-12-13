-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 08 déc. 2019 à 21:26
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dbblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) COLLATE utf8_bin NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `date_add` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=240 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `pseudo`, `content`, `date_add`, `date_update`, `post_id`, `user_id`, `active`) VALUES
(213, 'Mirko87', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '2019-12-07 20:26:08', NULL, 186, 20, 1),
(214, 'Mirko87', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', '2019-12-07 20:42:25', NULL, 1, 20, 1),
(215, 'Mario', 'Test affichage nouveau commentaire', '2019-12-08 13:48:58', NULL, 185, 24, 0),
(233, 'Mario', 'Test du CommentController', '2019-12-08 14:46:53', NULL, 1, 24, 0),
(234, 'Mario', 'testtts', '2019-12-08 14:53:15', NULL, 1, 24, 0),
(235, 'Mario', 'encore un nte', '2019-12-08 14:55:29', NULL, 1, 24, 0),
(236, 'aaaa', 'aaaaaaaa', '2019-12-08 14:56:11', NULL, 1, 24, 0),
(237, 'mmmmm', ',,,,,,,,,,,,,,,', '2019-12-08 14:57:10', NULL, 1, 24, 0),
(238, 'Marc87', 'rrrrr', '2019-12-08 15:01:00', NULL, 1, 24, 0),
(239, 'Marc87', 'rrrrr', '2019-12-08 15:01:40', NULL, 1, 24, 0);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(100) COLLATE utf8_bin NOT NULL,
  `title` varchar(100) COLLATE utf8_bin NOT NULL,
  `chapeau` varchar(100) COLLATE utf8_bin NOT NULL,
  `imageUrl` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `date_add` date NOT NULL,
  `date_update` datetime DEFAULT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `author`, `title`, `chapeau`, `imageUrl`, `date_add`, `date_update`, `content`) VALUES
(1, 'Mirko Venturi', 'New post', 'Fix user_id bug', 'update-bg.jpg', '2019-11-30', '2019-12-01 08:26:20', '<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>'),
(185, 'Mirko1988', 'Fix bug post add updated', 'Bug with foreign Key', 'header-bg_old.jpg', '2019-11-30', '2019-12-01 08:22:45', '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">At vero eos et accusamus <strong>et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati</strong> cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</span></p>'),
(186, 'Jules24', 'Javascript language', 'This is a post about Javascript', 'header-bg.jpg', '2019-12-01', '2019-12-01 08:25:07', '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words<strong> which don\'t look even slightly believable.</strong> If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate <span style=\"color: #e03e2d;\">Lorem Ipsum which looks reasonable</span>. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc</span></p>');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `imageUrl` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(254) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `active` int(1) DEFAULT NULL,
  `validation_key` binary(32) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `password` (`password`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `imageUrl`, `email`, `password`, `active`, `validation_key`, `role`, `date_add`) VALUES
(16, 'Maelle', '3.jpg', 'maelle@gmail.com', '$2y$10$jQEWQinhL8mCkaqeMNCR1e.5EXHL9L/UjvAkK7e31/gq3fpzJgW/i', 1, NULL, 2, '2019-12-01 08:54:38'),
(17, 'Julian3', '2.jpg', 'julian28@yahoo.fr', '$2y$10$/.sCQFtu7JonSUcNPYSNHeoLuwRFyPsEeaPPiyVB89oLZ1ROVxwoC', 1, NULL, 2, '2019-12-01 08:58:49'),
(20, 'Mirko87', 'mirko.jpg', 'mirkoventuri.web@gmail.com', '$2y$10$JBGvKE5RqzzTjoJ2rfApfeJOtoIX8liT.eosKSgAPj73iFsNeY7HW', 1, NULL, 2, '2019-12-03 18:12:42'),
(24, 'Mario', '2.jpg', 'mario@gmail.com', '$2y$10$ThcA3DvCpDslijkyYDy.ReRWWH4a2Q3K/OxVOcH8HdTPCUSh6ZpN6', 1, NULL, 1, '2019-12-07 11:03:51'),
(25, 'Gwenola', '3.jpg', 'gwen@gmail.com', '$2y$10$hj7p6uUSrRryzty.1i7GOO1dzLclHmTENJBDFGIuZz..VFN4VmtRa', 1, NULL, 2, '2019-12-08 10:22:48'),
(27, 'Francesca', '3.jpg', 'francesca@gmail.com', '$2y$10$bJenIK9EXiM8rBdMtZgM/.MVp3VucNHNl1mnMybhbGpk2YCJucjIW', 1, NULL, 1, '2019-12-08 10:34:52');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `post_id` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
