-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 29 jan. 2025 à 09:28
-- Version du serveur : 10.11.6-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ocr_p6`
--

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

CREATE TABLE `book` (
  `ID` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `TITLE` varchar(255) DEFAULT NULL,
  `AUTHOR` varchar(128) DEFAULT NULL,
  `DESCRIPTION` text DEFAULT NULL,
  `DISPONIBILITY` tinyint(1) DEFAULT NULL,
  `COVER` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`ID`, `ID_USER`, `TITLE`, `AUTHOR`, `DESCRIPTION`, `DISPONIBILITY`, `COVER`) VALUES
(23, 35, 'The Kinfolk Table', 'Nathan Williams', 'J\'ai récemment plongé dans les pages de \'The Kinfolk Table\' et j\'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d\'une simple collection de recettes ; il célèbre l\'art de partager des moments authentiques autour de la table. \r\n\r\nLes photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité. \r\n\r\nChaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \r\n\r\n\'The Kinfolk Table\' incarne parfaitement l\'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', 1, 'public/assets/book-images/cover-image-23.png'),
(24, 35, 'Wabi sabi', 'Beth Kempton', 'Wabi Sabi est une ode à la beauté imparfaite et éphémère, inspirée par une philosophie japonaise qui célèbre l’impermanence et l’authenticité. À travers ses pages, le livre invite le lecteur à embrasser la simplicité, à voir la beauté dans l’incomplet, et à trouver la sérénité dans le passage du temps.\r\n\r\nL\'auteur explore comment appliquer ces principes à la vie quotidienne, que ce soit dans nos relations, nos choix, ou nos environnements. Wabi Sabi mélange réflexions philosophiques, anecdotes poétiques et conseils pratiques pour apprendre à vivre avec grâce dans un monde souvent chaotique. Une œuvre qui inspire la pleine conscience et un retour à l’essentiel.', 1, 'public/assets/book-images/cover-image-24.jpg'),
(25, 36, 'Milk & honey', 'Rupi Kaur', 'Milk & Honey est un recueil de poésie profondément intime et émouvant, divisé en quatre chapitres : \"la souffrance\", \"l’amour\", \"la rupture\", et \"la guérison\". À travers des mots simples mais puissants, Rupi Kaur explore les thèmes de l’amour, de la perte, de la féminité, du traumatisme et de la résilience.\r\n\r\nChaque poème, accompagné d’illustrations minimalistes, invite le lecteur à plonger dans un voyage émotionnel et introspectif. Milk & Honey n’est pas seulement une collection de poèmes, c’est une célébration de la survie et de la capacité à trouver de la douceur dans les moments les plus amers de la vie. Une œuvre incontournable qui a touché des millions de cœurs à travers le monde.', 1, 'public/assets/book-images/cover-image-25.jpg'),
(26, 36, 'Hygge', 'Meik Wiking', 'Hygge est bien plus qu’un simple mot danois : c’est un art de vivre qui célèbre le confort, la convivialité et le bien-être. Ce livre explore comment intégrer cette philosophie nordique dans votre vie quotidienne pour trouver le bonheur dans les petites choses : un moment paisible devant un feu de cheminée, un repas chaleureux partagé entre amis, ou une tasse de thé savourée sous un plaid doux.\r\n\r\nÀ travers des conseils pratiques, des recettes simples, et des idées de décoration cocooning, Hygge vous invite à ralentir, à profiter du moment présent, et à créer une atmosphère de sérénité dans votre maison. Inspirant et réconfortant, ce guide est une véritable porte d’entrée vers une vie plus heureuse et équilibrée.', 1, 'public/assets/book-images/cover-image-26.jpg'),
(27, 37, 'Delight!', 'Justin Rossow', 'Delight! est une célébration vibrante et joyeuse des plaisirs simples de la vie. À travers une série d’essais courts et pleins d’esprit, l’auteur nous rappelle l’importance de savourer les moments ordinaires qui apportent de la joie : le parfum du papier neuf, une conversation spontanée, ou le premier rayon de soleil après la pluie.\r\n\r\nAvec son ton chaleureux et humoristique, Delight! invite les lecteurs à ralentir, à s’émerveiller des petites choses, et à cultiver un état d\'esprit positif dans un monde souvent trop rapide. Ce livre est une véritable ode à l’optimisme et à la gratitude, un compagnon parfait pour retrouver le sourire au quotidien.', 0, 'public/assets/book-images/cover-image-27.jpg'),
(28, 38, 'Milwaukee Mission', 'Elder Cooper Low', 'Milwaukee Mission est un récit captivant où se croisent les destins de personnages complexes dans le cadre brut et authentique de Milwaukee. Ce roman (ou récit) explore les thèmes de la résilience, de la rédemption et de l’espoir à travers les yeux de personnes confrontées à des défis personnels et sociaux.\r\n\r\nDans un quartier marqué par les inégalités et les luttes quotidiennes, un lieu appelé \"The Mission\" devient un symbole d\'espoir, un espace où les âmes perdues trouvent refuge et solidarité. À travers des histoires entrelacées, l\'auteur peint un portrait poignant de l’humanité et de la capacité de chacun à trouver un sens, même dans les moments les plus sombres. Milwaukee Mission est un livre qui résonne avec profondeur et émotion, invitant le lecteur à réfléchir sur l’importance de la communauté et de la persévérance.', 1, 'public/assets/book-images/cover-image-28.jpg'),
(29, 39, 'Minimalist Graphics', 'Julia Schoniau', 'Minimalist Graphics est un guide visuel et inspirant qui célèbre l\'art de la simplicité dans le design graphique. À travers des exemples épurés et des analyses percutantes, ce livre explore comment des formes, des couleurs et des typographies minimalistes peuvent transmettre des messages puissants tout en éliminant le superflu.\r\n\r\nDestiné aux graphistes, artistes, et amateurs de design, cet ouvrage plonge dans les principes fondamentaux du minimalisme : équilibre, contraste, espace négatif et efficacité visuelle. Que ce soit pour des projets de branding, d\'illustration, ou d\'affiches, Minimalist Graphics montre comment la réduction peut renforcer l\'impact visuel et émotionnel.', 1, 'public/assets/book-images/cover-image-29.jpg'),
(30, 37, 'Innovation', 'Matt Ridley', 'Innovation explore les idées, les stratégies et les mentalités qui transforment les défis en opportunités et ouvrent la voie à des changements révolutionnaires. À travers des exemples inspirants tirés des domaines de la technologie, des affaires, et des sciences, ce livre examine comment des individus et des organisations ont repoussé les limites du possible pour redéfinir notre manière de vivre, de travailler et de créer.\r\n\r\nCet ouvrage plonge dans les principes fondamentaux de l’innovation : la créativité, l’adaptation, et la prise de risques éclairée. Que vous soyez entrepreneur, dirigeant, ou simplement curieux d’apprendre à innover dans votre vie quotidienne, Innovation vous offre des outils pratiques et des études de cas pour stimuler votre imagination et concrétiser vos idées.', 1, 'public/assets/book-images/cover-image-30.jpg'),
(31, 35, 'Psalms', 'Alabaster', 'Psalms est l\'un des livres les plus poétiques et spirituellement riches de la Bible, regroupant 150 chants, prières et méditations. Écrits dans des moments de joie, de peine, de gratitude et de recherche de guidance divine, les psaumes capturent l’essence des émotions humaines tout en se tournant vers Dieu pour la consolation et l’inspiration.\r\n\r\nChaque psaume est une invitation à la réflexion et à la connexion spirituelle, offrant des paroles de louange, des appels à l’aide, et des déclarations de foi inébranlable. De \"L’Éternel est mon berger\" du Psaume 23 aux hymnes de louange du Psaume 150, ces textes intemporels continuent de résonner dans le cœur de millions de personnes à travers le monde.', 1, 'public/assets/book-images/cover-image-31.jpg'),
(32, 36, 'Thinking, Fast & Slow', 'Daniel Kahneman', 'Psalms est l\'un des livres les plus poétiques et spirituellement riches de la Bible, regroupant 150 chants, prières et méditations. Écrits dans des moments de joie, de peine, de gratitude et de recherche de guidance divine, les psaumes capturent l’essence des émotions humaines tout en se tournant vers Dieu pour la consolation et l’inspiration.\r\n\r\nChaque psaume est une invitation à la réflexion et à la connexion spirituelle, offrant des paroles de louange, des appels à l’aide, et des déclarations de foi inébranlable. De \"L’Éternel est mon berger\" du Psaume 23 aux hymnes de louange du Psaume 150, ces textes intemporels continuent de résonner dans le cœur de millions de personnes à travers le monde.', 0, 'public/assets/book-images/cover-image-32.jpg'),
(33, 34, 'A book Full Of Hope', 'Rupi Kaur', 'À Book Full of Hope est un guide lumineux et inspirant pour ceux qui cherchent un souffle d’optimisme et une nouvelle perspective sur la vie. À travers des histoires réconfortantes, des réflexions profondes et des conseils pratiques, ce livre célèbre la résilience humaine et la beauté qui peut naître même des moments les plus sombres.\r\n\r\nChaque chapitre est une invitation à renouer avec l\'espoir, à cultiver la gratitude et à trouver la force d’avancer, quels que soient les défis rencontrés. En mêlant sagesse intemporelle et récits contemporains, A Book Full of Hope devient un compagnon indispensable pour quiconque cherche à raviver sa lumière intérieure.', 1, 'public/assets/book-images/cover-image-33.jpg'),
(34, 38, 'The Subtle Art Of..', 'Mark Manson', 'Dans The Subtle Art of Not Giving a Fck*, Mark Manson brise les conventions des livres de développement personnel traditionnels en adoptant une approche honnête et pragmatique de la vie. Plutôt que de chercher constamment à être \"positif\", Manson invite ses lecteurs à accepter les limites, les échecs, et les défis comme une partie intégrante de la condition humaine.\r\n\r\nAvec un ton mordant et un humour cru, il explore comment concentrer notre attention et nos efforts sur ce qui compte vraiment, tout en laissant de côté les attentes irréalistes et les distractions inutiles. Ce livre propose une philosophie rafraîchissante et libératrice : choisir ses combats, assumer ses responsabilités, et trouver le sens dans les difficultés.', 1, 'public/assets/book-images/cover-image-34.jpg'),
(35, 37, 'Narnia', 'C.S Lewis', 'The Chronicles of Narnia est une série de sept romans intemporels qui transportent les lecteurs dans un monde magique rempli d\'aventures épiques, de créatures fantastiques, et de leçons intemporelles sur le courage, l\'amitié, et la quête du bien.\r\n\r\nTout commence avec Le Lion, la Sorcière Blanche et l\'Armoire Magique, où quatre enfants découvrent une armoire enchantée qui les mène au royaume de Narnia, un monde pris sous l\'emprise glaciale de la Sorcière Blanche. Guidés par Aslan, un lion majestueux et symbolique, les enfants se retrouvent au cœur d\'une bataille entre le bien et le mal.', 0, 'public/assets/book-images/cover-image-35.jpg'),
(36, 39, 'Company Of One', 'Paul Jarvis', 'Company of One est un livre révolutionnaire qui défie les idées traditionnelles sur la croissance des entreprises. Paul Jarvis explore pourquoi \"plus gros\" n\'est pas toujours synonyme de \"meilleur\" et montre comment construire une entreprise durable, rentable, et alignée sur vos valeurs personnelles, sans avoir besoin de s\'agrandir à tout prix.\r\n\r\nÀ travers des anecdotes engageantes, des études de cas et des conseils pratiques, Jarvis démontre comment rester petit peut permettre de mieux contrôler son temps, de cultiver une relation plus authentique avec les clients, et de privilégier la qualité à la quantité.', 1, 'public/assets/book-images/cover-image-36.jpg'),
(37, 35, 'The Two Towers', 'J.R.R Tolkien', 'The Two Towers est le deuxième tome de l\'épopée légendaire Le Seigneur des Anneaux, une œuvre magistrale de la fantasy écrite par J.R.R. Tolkien. Dans ce chapitre central, les héros se retrouvent dispersés et confrontés à des épreuves périlleuses alors que les forces du mal de Sauron continuent de grandir.\r\n\r\nLa Communauté de l’Anneau, désormais brisée, suit des chemins divergents. Aragorn, Legolas et Gimli poursuivent les Orques pour secourir leurs amis capturés, Merry et Pippin. Pendant ce temps, Frodo et Sam se lancent dans leur propre voyage dangereux vers le Mordor, accompagnés de l’insaisissable et ambigu Gollum, qui connaît les secrets du chemin vers la Montagne du Destin.\r\n\r\nCe volume explore des thèmes de loyauté, de trahison et de courage face à des obstacles insurmontables. Des batailles épiques, comme celle du Gouffre de Helm, aux moments intimes de lutte intérieure, The Two Towers entraîne les lecteurs plus profondément dans la richesse du monde de Tolkien, préparant le terrain pour une conclusion grandiose.', 1, 'public/assets/book-images/cover-image-37.jpg'),
(38, 18, 'Esther', 'Alabaster', 'Une histoire poignante et captivante qui explore la résilience, le courage, et la quête de vérité. Au cœur du récit, Esther, une héroïne complexe, se retrouve confrontée à des choix qui redéfiniront sa vision du monde et sa place dans celui-ci.\r\n\r\nÀ travers des paysages riches et une écriture immersive, le lecteur est transporté dans un univers où les secrets du passé s\'entrelacent avec les luttes du présent. Entre drames familiaux, révélations inattendues et une quête de rédemption, \"Esther\" est un roman qui invite à réfléchir sur l’amour, la perte et la capacité à surmonter l’adversité.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 1, 'public/assets/book-images/cover-image-38.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `ID` int(11) NOT NULL,
  `ID_RECEIVER` int(11) NOT NULL,
  `ID_SENDER` int(11) NOT NULL,
  `CONTENT` text DEFAULT NULL,
  `DATETIME` datetime DEFAULT NULL,
  `IS_READ` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`ID`, `ID_RECEIVER`, `ID_SENDER`, `CONTENT`, `DATETIME`, `IS_READ`) VALUES
(52, 35, 18, 'Bonjour, votre livre m\'intéresse, est-il toujours disponible , merci d\'avance', '2025-01-28 16:04:21', 0),
(53, 34, 18, 'Bonjour je suis intéressé par votre livre', '2025-01-28 16:05:13', 0),
(54, 36, 18, 'Bonjour, votre livre m\'intéresse par contre est ce qu\'il est long ???', '2025-01-28 16:06:26', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(320) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PICTURE` varchar(255) DEFAULT NULL,
  `DATE_CREATION` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID`, `EMAIL`, `PASSWORD`, `USERNAME`, `PICTURE`, `DATE_CREATION`) VALUES
(18, 'camilleclublit@gmail.com', '$2y$10$TctYIOA3WFNUwU0ewgrzR.VXtztV5kx/O2gUrOorK2rIY7DYi1eci', 'CamilleClubLit', '/public/assets/profile-images/profile-image-18.jpg', '2025-01-06 16:03:42'),
(28, 'lucasschnelzauer@gmail.com', '$2y$10$3wuH2IwnJBW0m4dxxMxRE.6ZDMiNMZcPCK6V/.WyOKOA89GyXJaKi', 'Lucas', NULL, '2025-01-17 10:35:09'),
(34, 'nathalire@gmail.com', '$2y$10$j6LkUuL2F6l.mZEWrCCLkueqE4TAaOdTcrzORLnflS3wI.Jim9/P2', 'Nathalire', '/public/assets/profile-images/profile-image-34.png', '2025-01-28 15:38:18'),
(35, 'alex@gmail.com', '$2y$10$fxdmFtFiqOM3Xb4FjQcOJe64uiDcwElK1.UTb0x8MTENlTuc6LBYW', 'Alexlecture', '/public/assets/profile-images/profile-image-35.png', '2025-01-28 15:38:51'),
(36, 'hugo@gmail.com', '$2y$10$cf0PEJAJQHhj5Zg1VLKF5e871uxFoc9EhGh4CTAg40si.Z12/DJDK', 'Hugo1990_2', '/public/assets/profile-images/profile-image-36.png', '2025-01-28 15:39:11'),
(37, 'juju1423@gmail.com', '$2y$10$wOUf49NL9Qa6kFv7l4LpDunCnwU1Mb97Wsoo6lCnQp3wSAhJZqhq.', 'Juju1432', NULL, '2025-01-28 15:47:45'),
(38, 'christiane@gmail.com', '$2y$10$3UWuprdqzyQUWR/cSp2XS.SssCOduDcUcFttGkBgWV/hS3/cqkZkC', 'Christiane75014', NULL, '2025-01-28 15:48:09'),
(39, 'hamza@gmail.com', '$2y$10$MPo5DCfIe.cmVOgWW4hmIOG.Mog7vzMmkhmwwFJ7m6p1rywEZLjha', 'Hamzalecture', NULL, '2025-01-28 15:48:40');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_BOOK_USER` (`ID_USER`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_MESSAGE_USER1` (`ID_SENDER`),
  ADD KEY `FK_MESSAGE_USER` (`ID_RECEIVER`) USING BTREE;

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `book`
--
ALTER TABLE `book`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `FK_BOOK_USER` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK_MESSAGE_USER` FOREIGN KEY (`ID_RECEIVER`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `FK_MESSAGE_USER1` FOREIGN KEY (`ID_SENDER`) REFERENCES `user` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
