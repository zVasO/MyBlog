-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 23 mai 2022 à 18:59
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
  `header` text NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `User_id` int(11) NOT NULL,
  `status` enum('waiting','published','archived') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `header`, `content`, `created_at`, `updated_at`, `User_id`, `status`) VALUES
(1, 'Guerre en Ukraine', 'Le président russe a dit, jeudi, avoir signé un décret imposant aux acheteurs étrangers de payer en roubles les livraisons de gaz naturel à compter du 1er avril.', 'Justin Trudeau s’oppose à la présence de la Russie au prochain G20\r\nLe premier ministre canadien, Justin Trudeau, a estimé, jeudi, que la Russie n’avait pas sa place à la prochaine réunion du G20, car elle ne peut pas être considérée comme un « partenaire constructif ».\r\n\r\n« Je ne pense pas qu’on peut s’asseoir avec la Russie autour de la table », a expliqué le chef du gouvernement canadien, expliquant avoir discuté de ce sujet avec le président indonésien, qui préside le G20 cette année. « Cela n’a aucun sens d’avoir une discussion sur la croissance économique mondiale si le pays responsable d’une grande partie des bouleversements se trouve autour de la table », a ajouté le premier ministre canadien.\r\n\r\nLa décision revient au G20 lui-même, format créé pour promouvoir le dialogue entre les vieilles puissances industrielles du G7 et des géants économiques émergents, comme la Chine, le Brésil ou encore la Russie.', '2022-04-04 21:29:05', '2022-05-22 14:01:02', 1, 'archived'),
(2, 'Esport - Smash : Glutonny enfin titré aux États-Unis', 'Le Français William « Glutonny » Belaïd est devenu, dans la nuit de dimanche à lundi, le premier Européen à remporter un tournoi majeur de Super Smash Bros Ultimate sur le territoire américain.', 'Cette fois, c\'est la bonne. Troisième de l\'EVO en 2019, finaliste du CEO en 2021 et du Genesis - l\'équivalent des Mondiaux sur Super Smash Bros Ultimate - il y a tout juste une semaine, le Français William « Glutonny » Belaïd a gagné, dans la nuit de dimanche à lundi, le Pound, à Laurel (Maryland, près de Washington DC). Son premier tournoi remporté aux États-Unis, là où se déroule la quasi-intégralité du circuit professionnel du jeu. Jamais un joueur européen n\'avait réussi un tel exploit.', '2022-03-31 21:30:20', '2022-05-22 14:14:38', 1, 'archived'),
(3, 'Guerre en Ukraine', 'Le président russe a dit, jeudi, avoir signé un décret imposant aux acheteurs étrangers de payer en roubles les livraisons de gaz naturel à compter du 1er avril.', 'Justin Trudeau s’oppose à la présence de la Russie au prochain G20\r\nLe premier ministre canadien, Justin Trudeau, a estimé, jeudi, que la Russie n’avait pas sa place à la prochaine réunion du G20, car elle ne peut pas être considérée comme un « partenaire constructif ».\r\n\r\n« Je ne pense pas qu’on peut s’asseoir avec la Russie autour de la table », a expliqué le chef du gouvernement canadien, expliquant avoir discuté de ce sujet avec le président indonésien, qui préside le G20 cette année. « Cela n’a aucun sens d’avoir une discussion sur la croissance économique mondiale si le pays responsable d’une grande partie des bouleversements se trouve autour de la table », a ajouté le premier ministre canadien.\r\n\r\nLa décision revient au G20 lui-même, format créé pour promouvoir le dialogue entre les vieilles puissances industrielles du G7 et des géants économiques émergents, comme la Chine, le Brésil ou encore la Russie.', '2022-03-31 21:30:53', '2022-05-23 16:16:58', 1, 'archived'),
(4, 'Guerre en Ukraine', 'Le président russe a dit, jeudi, avoir signé un décret imposant aux acheteurs étrangers de payer en roubles les livraisons de gaz naturel à compter du 1er avril.', 'Justin Trudeau s’oppose à la présence de la Russie au prochain G20\r\nLe premier ministre canadien, Justin Trudeau, a estimé, jeudi, que la Russie n’avait pas sa place à la prochaine réunion du G20, car elle ne peut pas être considérée comme un « partenaire constructif ».\r\n\r\n« Je ne pense pas qu’on peut s’asseoir avec la Russie autour de la table », a expliqué le chef du gouvernement canadien, expliquant avoir discuté de ce sujet avec le président indonésien, qui préside le G20 cette année. « Cela n’a aucun sens d’avoir une discussion sur la croissance économique mondiale si le pays responsable d’une grande partie des bouleversements se trouve autour de la table », a ajouté le premier ministre canadien.\r\n\r\nLa décision revient au G20 lui-même, format créé pour promouvoir le dialogue entre les vieilles puissances industrielles du G7 et des géants économiques émergents, comme la Chine, le Brésil ou encore la Russie.', '2018-03-07 21:31:46', '2022-05-23 16:16:37', 1, 'archived'),
(5, 'Esport - Counter-Strike : NAVI s\'arrache et poursuit sa quête de doublé', 'Vainqueur du précédent Major de Counter-Strike fin 2021 à Stockholm, le club ukrainien NAVI s\'est qualifié ce vendredi soir pour les demi-finales de celui d\'Anvers. Il retrouvera Ence, samedi. De l\'autre côté de l\'arbre, FaZe Clan affrontera Team Spirit.', 'NAVI s\'accroche à sa couronne. Tenante du titre, la formation russo-ukrainienne du club basé à Kiev (n°2 mondiale) s\'est qualifiée ce vendredi soir pour les demi-finales du Major d\'Anvers - la catégorie de tournois la plus prestigieuse sur Counter-Strike. Mais elle a dû se démener. Opposé aux Danois d\'Heroic (n°6), bourreaux des Français de Vitality au tour précédent, NAVI lâchait la première manche (10-16) avant d\'arracher la suivante face à un adversaire très accrocheur (14-16). Libérés mentalement, Oleksandr « s1mple » Kostyliev et ses coéquipiers prenaient plus largement le dessus sur la carte décisive (16-8), dans une salle complètement acquise à leur cause et celle de leur pays - de très nombreux drapeaux ukrainiens ont fleuri dans le Palais des Sports. Ils reviendront samedi (20h) pour jouer une autre formation difficile à manoeuvrer : Ence (n°3), vainqueur de Copenhagen Flames (n°15) nettement plus facilement (16-10, 16-12) un peu plus tôt.', '2022-05-22 14:00:19', '2022-05-23 13:23:15', 1, 'archived'),
(6, 'Esport - Rocket League : BDS s\'impose encore, la Karmine Corp se replace', 'Déjà vainqueurs du premier tournoi continental du segment de printemps des Rocket League Championship Series - le circuit professionnel sur Rocket League -, les Français de BDS ont remporté le deuxième, ce week-end. Ils ont ainsi assuré leur place aux Mondiaux.', 'Deux sur deux pour BDS sur Rocket League. Désormais une formation 100 % française (depuis l\'intégration du Français Enzo « Seikoo » Grondein il y a quelques semaines, en lieu et place de l\'Espagnol Marc « MaRc_By_8 » Domingo pour relancer une machine grippée), la meilleure équipe du monde en 2021 a remporté le deuxième tournoi continental du segment de printemps des Rocket League Championship Series, ce week-end.\r\n\r\nComme lors du premier, début mai, les Tricolores n\'ont pas perdu un seul match. Seuls les NAVI au premier tour les ont poussés en manche décisive. En finale, ils ont giflé Team Liquid (4-0). La performance leur assure une place au Major intercontinental de Londres mais aussi aux Mondiaux, à Dallas, en août. Moist Esports et son Français Axel « vatira » Touret (16 ans), quatrièmes ce week-end, iront aux Etats-Unis également.\r\n\r\nTroisième, la Karmine Corp se rapproche du Major et se replace dans la course à la qualification aux championnats du monde. Elle passera par une bonne performance lors de l\'ultime tournoi continental du printemps (10-12 juin). Les clubs de Vitality et Solary ont manqué leur week-end (9e tous les deux), mais ont encore leurs chances.', '2022-05-23 20:33:16', '2022-05-23 20:33:16', 1, 'published'),
(7, 'Esport - Dota 2 : Ceb remporte le Major de Stockholm, son premier en tant que joueur', 'Seul Français à évoluer au plus haut niveau sur Dota 2, deux fois champion du monde (2018, 2019) avec OG, son équipe, Sébastien « Ceb » Debs a remporté ce week-end le Major de Stockholm. Quelques mois après avoir pourtant pris sa retraite sportive...', 'Considéré comme l\'un des plus grands esportifs français tous jeux confondus, Sébastien « Ceb » Debs (30 ans) continue de gonfler son palmarès. Seul tricolore à évoluer au plus haut niveau sur Dota 2, il a remporté ce dimanche à Stockholm son tout premier Major en tant que joueur avec OG, son club depuis 2016.\r\n\r\nDéjà double champion du monde (2018, 2019), vainqueur de Majors comme coach en 2016 et 2017, celui qui a plusieurs fois alterné entre joueur et membre du staff ces six dernières années a peut-être réalisé là son plus bel exploit, puisqu\'il est officiellement retraité depuis fin 2021. Toujours dans l\'encadrement d\'OG, il a remplacé en Suède le Russe Mikhail « Misha » Agatov, privé de visa comme son entraîneur. Un intérim qu\'il a d\'ailleurs effectué à un poste qui n\'était pas le sien il y a encore quelques mois.\r\n\r\nCe n\'était visiblement pas un problème : au terme d\'un superbe parcours dans le lower bracket d\'un arbre à double élimination, Ceb et ses coéquipiers ont battu TSM (3-1) en finale. Et si ce Major s\'est disputé dans des conditions particulières (absence des équipes chinoises, problèmes de visas pour plusieurs formations...), la performance reste remarquable. Elle pose aussi forcément la question d\'une éventuelle suite à cette histoire.\r\n', '2022-05-23 20:35:16', '2022-05-23 20:35:16', 1, 'published'),
(8, 'Esport - Counter-Strike : FaZe Clan remporte son premier Major', 'N°1 mondial, FaZe Clan a remporté ce dimanche soir son tout premier Major de Counter-Strike à Anvers. En finale, la structure nord-américaine a battu la formation russo-ukrainienne de NAVI (n°2), tenante du titre (19-16, 16-10).', 'C\'était la finale rêvée à l\'entame du tournoi, elle s\'est montrée à la hauteur des attentes. Le Major - catégorie de compétition la plus prestigieuse sur Counter-Strike - d\'Anvers s\'est achevé ce dimanche soir par la victoire de la meilleure équipe du moment, FaZe Clan (n°1 mondiale, vainqueur des deux plus gros rendez-vous de 2022 jusqu\'ici) face aux tenants du titre de NAVI (N°2). Une finale réglée en deux manches (19-16, 16-10) qui a touché au sublime lors de la première.\r\n\r\nTrès au point d\'entrée sur Inferno, FaZe entamait très fort en attaque prenant constamment NAVI de vitesse. Mais la formation russo-ukrainienne se réveillait en fin de side et, grâce à un duo Valerii « b1t » Vakhovskyi - Ilya « Perfecto » Zalutskiy déchaîné, renversait la tendance pour s\'offrir deux rounds de carte. Et la finale s\'est peut-être jouée lors du deuxième, quand Oleksandr « s1mple » Kostyliev, meilleur joueur du monde en 2021, perdait un face-à-face décisif. Retrouvés en prolongation, les FaZe remportaient finalement le bras de fer mental sur un coup de génie de leur capitaine danois Finn « karrigan » Andersen, dans une ambiance exceptionnelle - près de 12 000 personnes assistaient à la finale sur place.\r\n\r\nVainqueurs de la bataille du sang-froid, avec l\'ascendant psychologique, ils enchaînaient sur Nuke : après un side défensif correct et malgré une timide remontée de NAVI, ils gagnaient leur premier Major, quatre ans après une défaite épique à Boston. Karrigan y était déjà, Havard « rain » Nygaard, exceptionnel en finale et MVP à Anvers, également. Le leader danois, à la longévité remarquable dans l\'esport (32 ans), pouvait enfin soulever son trophée si longtemps attendu. Le succès de FaZe est également le premier d\'une équipe internationale à ce niveau, en 17 éditions.', '2022-05-23 20:36:21', '2022-05-23 20:36:21', 1, 'published'),
(9, 'Esport - Counter-Strike : NAVI - FaZe Clan, finale de rêve à Anvers', 'FaZe Clan et NAVI, les deux meilleures équipes du monde, s\'affronteront en finale du Major de Counter-Strike, à Anvers, ce dimanche (20h).', 'Les Majors de Counter-Strike ont connu leur lot de surprises ces dernières années. Mais pour la première édition annuelle du tournoi le plus prestigieux du calendrier professionnel à Anvers (Belgique), la logique a été respectée : FaZe Clan (n°1) et NAVI (n°2), les deux meilleures équipes de la planète, se retrouveront en finale de la compétition dimanche (20h).\r\n\r\nAprès un quart difficile contre Heroic vendredi, la formation russo-ukrainienne de Natus Vincere a assez facilement dominé ENCE ce samedi soir (16-7, 16-12). Les n°3 mondiaux, trop timides, n\'ont jamais réussi à imposer leur jeu offensif et se sont heurtés à des NAVI impressionnants collectivement. Moyen contre Heroic, la star Oleksandr « s1mple » Kostyliev a cette fois livré une prestation de très haut niveau. Quand il est dans cette forme-là, lui et sa formation paraissent injouables.\r\n\r\nNAVI et son meilleur joueur du monde ukrainien défendront donc leur premier titre en Major acquis en novembre dernier à Stockholm. Ils le feront dans un contexte forcément particulier : l\'invasion russe a, depuis, fortement perturbé le club basé à Kiyv. Dans un Palais des Sports d\'Anvers rempli ce samedi et complètement acquis à sa cause, il est en train d\'écrire une histoire comme l\'esport n\'en a probablement encore jamais connu. Et aura l\'occasion de le faire dans une finale de rêve, très indécise a priori.', '2022-05-23 20:37:08', '2022-05-23 20:37:08', 1, 'published'),
(10, 'A Ishigaki, la construction d’une base militaire japonaise ravive les blessures de l’histoire', 'Cinquante ans après la rétrocession d’Okinawa par les Américains, un projet de base antimissile des forces japonaises divise une population marquée par la seconde guerre mondiale et les années d’occupation qui suivirent, mais inquiète pour l’économie.', '« Le deigo a fleuri, a appelé le vent mais la tempête est venue… » Shima uta, émouvante « chanson des îles » du groupe The Boom, résonne dans les ruelles écrasées de soleil et bordées de béton gris du vieux marché d’Ishigaki, petite île de l’archipel d’Okinawa, dans le sud-ouest du Japon.\r\n\r\nDans la culture locale, la flamboyance rouge de la fleur de deigo annonce la sévérité des typhons à venir. Sa floraison, dans la chanson de Kazufumi Miyazawa, symbolise « le sacrifice des îles d’Okinawa pour le reste du Japon ». Bataille d’Okinawa en avril-juin 1945, omniprésence militaire américaine, diktats de Tokyo : autant de moments sombres qui ressurgissent à l’occasion de la commémoration, le 15 mai, du 50e anniversaire de la rétrocession au Japon d’Okinawa par les Américains.\r\n\r\nA Ishigaki, 50 000 habitants, rien n’indique l’anniversaire si ce n’est quelques devantures comme celle du magasin Hamauta, où est affiché un autocollant jaune et rouge saluant « le retour d’Okinawa ».\r\n\r\nLa municipalité n’a pas prévu de fête, tout juste une conférence en ligne. Officiellement à cause du coronavirus, officieusement parce que l’événement suscite des réactions mitigées, exacerbées par la construction d’une base de défense antimissile des Forces japonaises d’autodéfense (FJA, l’armée nippone).\r\n\r\nDepuis 2020, les bulldozers labourent un verdoyant coteau niché dans l’ombre du mont Omoto, point culminant de l’île à 526 mètres, au-dessus des plantations de cannes à sucre et d’ananas. L’installation est jugée indispensable par le ministère de la défense, engagé depuis 2015 dans le renforcement des îles Nansei. Vu de Tokyo, ce chapelet s’étendant jusqu’à Yonaguni, à une centaine de kilomètres de Taïwan, forme « une barrière contre la Chine ».', '2022-05-23 20:39:00', '2022-05-23 20:39:00', 1, 'published'),
(11, 'A Okinawa, le combat de deux journaux contre la présence des bases militaires américaines', 'Alors que le 15 mai marquera les 50 ans de la rétrocession de l’archipel au Japon, l’« Okinawa Times » et le « Ryukyu Shimpo » continuent de sensibiliser aux problèmes liés au déploiement de milliers de soldats américains, face à la résignation croissante de la population.', 'A la veille du 50e anniversaire du retour de l’archipel d’Okinawa sous administration japonaise, le 15 mai, l’amertume domine dans cet archipel méridional du Japon où sont concentrées les bases militaires américaines. Dans un pays où la grande presse est souvent peu combative, les deux quotidiens régionaux, Okinawa Times et Ryukyu Shimpo (« nouvelles des Ryukyu »), concurrents pour l’audience et les annonceurs, ont néanmoins la même ligne éditoriale : pacifisme, opposition à la révision de la Constitution, qui interdit au Japon le recours à la force armée dans le règlement des différends internationaux, et critique du peu de cas que fait le gouvernement central de l’opinion des Okinawaïens. L’un et l’autre sont le fer de lance du combat contre la présence des bases militaires américaines.\r\n\r\nLe traité de San Francisco, signé le 28 avril 1951, par lequel le Japon recouvrait sa souveraineté, laissait Okinawa sous administration américaine. Un abandon perçu comme une trahison de Tokyo, qui avait annexé, en 1879, le petit royaume indépendant et prospère des Ryukyu. Okinawa resta pendant vingt-sept ans sous occupation américaine, avant de revenir dans le giron japonais en 1972. Mais les bases sont demeurées, accueillant aujourd’hui 70 % des 48 000 GI déployés au Japon. Okinawa est le département qui paye le plus lourd tribut à la présence militaire américaine dans l’archipel.\r\n\r\n', '2022-05-23 20:39:27', '2022-05-23 20:39:27', 1, 'published');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL,
  `User_id` int(11) NOT NULL,
  `status` enum('waiting','published','hided') NOT NULL,
  `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `content`, `created_at`, `User_id`, `status`, `article_id`) VALUES
(29, 'tetete', '2022-05-05 13:49:36', 1, 'hided', 2),
(30, 'tetete', '2022-05-05 13:52:48', 1, 'published', 2),
(31, 'teett', '2022-05-05 13:53:47', 1, 'waiting', 2),
(33, 'BDS sont vraiment imprennable !!', '2022-05-23 20:40:07', 1, 'published', 6),
(34, 'Tous pour Navi !!', '2022-05-23 20:40:27', 1, 'waiting', 9),
(35, 'Ceb le goat, meilleur personnalité francaise en esport et de loin.', '2022-05-23 20:42:44', 1, 'published', 7);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
