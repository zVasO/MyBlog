-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 18 mai 2022 à 11:23
-- Version du serveur : 5.7.33
-- Version de PHP : 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `myblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `header` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `User_id` int(11) NOT NULL,
  `status` enum('waiting','published') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `header`, `content`, `created_at`, `updated_at`, `User_id`, `status`) VALUES
(1, 'Guerre en Ukraine', 'Le président russe a dit, jeudi, avoir signé un décret imposant aux acheteurs étrangers de payer en roubles les livraisons de gaz naturel à compter du 1er avril.', 'Justin Trudeau s’oppose à la présence de la Russie au prochain G20\r\nLe premier ministre canadien, Justin Trudeau, a estimé, jeudi, que la Russie n’avait pas sa place à la prochaine réunion du G20, car elle ne peut pas être considérée comme un « partenaire constructif ».\r\n\r\n« Je ne pense pas qu’on peut s’asseoir avec la Russie autour de la table », a expliqué le chef du gouvernement canadien, expliquant avoir discuté de ce sujet avec le président indonésien, qui préside le G20 cette année. « Cela n’a aucun sens d’avoir une discussion sur la croissance économique mondiale si le pays responsable d’une grande partie des bouleversements se trouve autour de la table », a ajouté le premier ministre canadien.\r\n\r\nLa décision revient au G20 lui-même, format créé pour promouvoir le dialogue entre les vieilles puissances industrielles du G7 et des géants économiques émergents, comme la Chine, le Brésil ou encore la Russie.', '2022-03-31 21:29:05', '2022-05-13 20:21:45', 1, 'published'),
(2, 'Esport - Smash : Glutonny enfin titré aux États-Unis', 'Le Français William « Glutonny » Belaïd est devenu, dans la nuit de dimanche à lundi, le premier Européen à remporter un tournoi majeur de Super Smash Bros Ultimate sur le territoire américain.', 'Cette fois, c\'est la bonne. Troisième de l\'EVO en 2019, finaliste du CEO en 2021 et du Genesis - l\'équivalent des Mondiaux sur Super Smash Bros Ultimate - il y a tout juste une semaine, le Français William « Glutonny » Belaïd a gagné, dans la nuit de dimanche à lundi, le Pound, à Laurel (Maryland, près de Washington DC). Son premier tournoi remporté aux États-Unis, là où se déroule la quasi-intégralité du circuit professionnel du jeu. Jamais un joueur européen n\'avait réussi un tel exploit.', '2022-03-31 21:30:20', '2022-05-05 12:28:53', 1, 'published'),
(3, 'Guerre en Ukraine', 'Le président russe a dit, jeudi, avoir signé un décret imposant aux acheteurs étrangers de payer en roubles les livraisons de gaz naturel à compter du 1er avril.', 'Justin Trudeau s’oppose à la présence de la Russie au prochain G20\r\nLe premier ministre canadien, Justin Trudeau, a estimé, jeudi, que la Russie n’avait pas sa place à la prochaine réunion du G20, car elle ne peut pas être considérée comme un « partenaire constructif ».\r\n\r\n« Je ne pense pas qu’on peut s’asseoir avec la Russie autour de la table », a expliqué le chef du gouvernement canadien, expliquant avoir discuté de ce sujet avec le président indonésien, qui préside le G20 cette année. « Cela n’a aucun sens d’avoir une discussion sur la croissance économique mondiale si le pays responsable d’une grande partie des bouleversements se trouve autour de la table », a ajouté le premier ministre canadien.\r\n\r\nLa décision revient au G20 lui-même, format créé pour promouvoir le dialogue entre les vieilles puissances industrielles du G7 et des géants économiques émergents, comme la Chine, le Brésil ou encore la Russie.', '2022-03-31 21:30:53', '2022-05-05 11:44:15', 1, 'waiting'),
(4, 'Guerre en Ukraine', 'Le président russe a dit, jeudi, avoir signé un décret imposant aux acheteurs étrangers de payer en roubles les livraisons de gaz naturel à compter du 1er avril.', 'Justin Trudeau s’oppose à la présence de la Russie au prochain G20\r\nLe premier ministre canadien, Justin Trudeau, a estimé, jeudi, que la Russie n’avait pas sa place à la prochaine réunion du G20, car elle ne peut pas être considérée comme un « partenaire constructif ».\r\n\r\n« Je ne pense pas qu’on peut s’asseoir avec la Russie autour de la table », a expliqué le chef du gouvernement canadien, expliquant avoir discuté de ce sujet avec le président indonésien, qui préside le G20 cette année. « Cela n’a aucun sens d’avoir une discussion sur la croissance économique mondiale si le pays responsable d’une grande partie des bouleversements se trouve autour de la table », a ajouté le premier ministre canadien.\r\n\r\nLa décision revient au G20 lui-même, format créé pour promouvoir le dialogue entre les vieilles puissances industrielles du G7 et des géants économiques émergents, comme la Chine, le Brésil ou encore la Russie.', '2022-03-31 21:31:46', '2022-05-05 11:44:15', 1, 'waiting');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `User_id` int(11) NOT NULL,
  `status` enum('waiting','published','hided') NOT NULL,
  `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `content`, `created_at`, `User_id`, `status`, `article_id`) VALUES
(2, 'La grosse défaite du Z', '2022-04-15 06:36:21', 1, 'published', 4),
(3, 'Tres bon article', '2022-04-15 07:08:50', 1, 'hided', 1),
(27, 'test', '2022-05-01 18:11:11', 1, 'published', 2),
(29, 'tetete', '2022-05-05 13:49:36', 1, 'waiting', 2),
(30, 'tetete', '2022-05-05 13:52:48', 1, 'waiting', 2),
(31, 'teett', '2022-05-05 13:53:47', 1, 'waiting', 2);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'USER'),
(2, 'ADMIN');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `Role_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `lastname`, `firstname`, `Role_id`, `created_at`) VALUES
(1, 'admin@myblog.fr', '$2y$10$NPC4s3VxR/VRKDMi2RPjw.m4I61dtgm9Kx2WI.8QJaKnC2CaEWdeu', 'Germann', 'Dylan', 2, '2022-03-31 21:23:19');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Article_User1_idx` (`User_id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Comment_User1_idx` (`User_id`),
  ADD KEY `fkey` (`article_id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_User_Role_idx` (`Role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_Article_User1` FOREIGN KEY (`User_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_Comment_User1` FOREIGN KEY (`User_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkey` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_User_Role` FOREIGN KEY (`Role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
