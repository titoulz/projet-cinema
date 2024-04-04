-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 04 avr. 2024 à 11:02
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_cinema`
--

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

CREATE TABLE `films` (
  `id` int(11) NOT NULL,
  `titre` varchar(150) NOT NULL,
  `durée` int(11) NOT NULL,
  `résumé` text NOT NULL,
  `date` date NOT NULL,
  `pays` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`id`, `titre`, `durée`, `résumé`, `date`, `pays`, `image`) VALUES
(1, 'mission', 119, 'Cinq ans après la fin de la Guerre civile, le capitaine Jefferson Kyle Kidd croise le chemin d\'une fillette de 10 ans prise par le peuple Kiowa. Contraint de la retourner auprès de son oncle et de sa tante, Kidd accepte d\'accompagner l\'enfant à travers les plaines hostile et sans merci du Texas. Cependant, la longue traversée se transforme en lutte pour la survie lorsque les deux voyageurs croisent le danger à chaque tournant, qu\'il soit de nature humaine ou environnementale.', '2020-02-19', 'france', 'https://m.media-amazon.com/images/I/81MFdYBJpvL._AC_UF1000,1000_QL80_.jpg'),
(2, 'batman2', 170, 'Batman remue désespérément la ville de Gotham pour trouver des traces de la petite Alina, sa fille présumée, enlevée par son pire ennemi, le Joker. Mais le clown psychopathe se moque pas mal de l\'homme chauve-souris : pour lui, c\'est Bruce Wayne qui détient la clé de son problème.', '2021-02-04', 'USA', 'https://fr.web.img2.acsta.net/medias/nmedia/18/63/97/89/18949761.jpg'),
(4, 'inception', 150, 'Dom Cobb est un voleur expérimenté dans l\'art périlleux de `l\'extraction\' : sa spécialité consiste à s\'approprier les secrets les plus précieux d\'un individu, enfouis au plus profond de son subconscient, pendant qu\'il rêve et que son esprit est particulièrement vulnérable. Très recherché pour ses talents dans l\'univers trouble de l\'espionnage industriel, Cobb est aussi devenu un fugitif traqué dans le monde entier. Cependant, une ultime mission pourrait lui permettre de retrouver sa vie d\'avant.', '2017-02-01', 'USA', 'https://fr.web.img2.acsta.net/medias/nmedia/18/72/34/14/19476654.jpg'),
(5, 'star-wars', 147, 'La guerre civile fait rage entre l\'Empire galactique et l\'Alliance rebelle. Capturée par les troupes de choc de l\'Empereur menées par le sombre et impitoyable Dark Vador, la princesse Leia Organa dissimule les plans de l\'Etoile Noire.', '2014-02-08', 'UK', 'https://fr.web.img4.acsta.net/pictures/15/10/18/18/56/052074.jpg'),
(6, 'vivants', 168, 'Gabrielle, 30 ans, intègre une prestigieuse émission de reportages. Elle doit très vite trouver sa place au sein d’une équipe de grands reporters. Malgré l’engagement de Vincent, leur rédacteur en chef, ils sont confrontés au quotidien d’un métier qui change, avec des moyens toujours plus réduits, face aux nouveaux canaux de l’information. Habités par leur passion pour la recherche de la vérité, leur sens de l’humour et de la solidarité, ils vont tout tenter pour retrouver la foi de leurs débuts et se réinventer', '2015-02-17', 'belgique', 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcRcUKSZzEaam9CQatdAS0rYRz50yH_-1CZDggnLjbKRiaJmBvqR'),
(7, 'interstellar', 120, 'Dans un proche futur, la Terre est devenue hostile pour l\'homme. Les tempêtes de sable sont fréquentes et il n\'y a plus que le maïs qui peut être cultivé, en raison d\'un sol trop aride. Cooper est un pilote, recyclé en agriculteur, qui vit avec son fils et sa fille dans la ferme familiale. Lorsqu\'une force qu\'il ne peut expliquer lui indique les coordonnées d\'une division secrète de la NASA, il est alors embarqué dans une expédition pour sauver l\'humanité.', '2014-04-23', 'USA', 'https://fr.web.img6.acsta.net/pictures/14/09/24/12/08/158828.jpg'),
(8, 'my-son', 145, 'Edmond Murray, divorcé, s\'est éloigné de son ex-femme et de son fils de 7 ans pour poursuivre une carrière internationale. Lorsque le garçon disparaît, Murray revient précipitamment dans les Highlands. Rapidement, il devient clair que l\'enfant a été kidnappé. Les parents cèdent d\'abord au désespoir, mais Murray va très vite se montrer prêt à tout pour retrouver son fils. Il se lance dans une traque qui l\'obligera à aller au bout de lui-même et à remettre en cause toutes ses convictions.', '2016-02-04', 'allemagne', 'https://fr.web.img5.acsta.net/pictures/21/09/23/17/12/1648758.jpg'),
(10, 'baby-driver', 150, 'Chauffeur pour des braqueurs de banque, Baby a un truc pour être le meilleur dans sa partie : il roule au rythme de sa propre playlist. Lorsqu\'il rencontre la fille de ses rêves, Baby cherche à mettre fin à ses activités criminelles pour revenir dans le droit chemin. Il est forcé de travailler pour un grand patron du crime et le braquage tourne mal. Désormais, sa liberté, son avenir avec la fille qu\'il aime et sa vie sont en jeu.', '2018-02-08', 'USA', 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRp93XMU7LT6KWsf_ves9gIbJbw_SPqZIPoqCxdWdwRu3QKDt8Y'),
(11, 'ant-man', 80, 'Doté d\'une capacité étonnante, celle de rétrécir considérablement sa taille tout en multipliant sa force, Scott Lang, voleur professionnel, doit accepter le héros qui sommeille en lui afin de venir en aide à son mentor, le docteur Hank Pym, et ainsi protéger les secrets technologiques que renferme son costume.', '2024-02-23', 'USA', 'https://fr.web.img4.acsta.net/pictures/15/05/06/16/05/305731.jpg'),
(12, 'captain-america', 99, 'Steve Rogers est désormais à la tête des Avengers, dont la mission est de protéger l\'humanité. À la suite d\'une de leurs interventions qui a causé d\'importants dégâts collatéraux, le gouvernement décide de mettre en place un organisme de commandement et de supervision.', '2024-02-13', 'USA', 'https://fr.web.img4.acsta.net/medias/nmedia/18/84/69/36/19774937.jpg'),
(13, 'super-man', 85, 'Craignant les débordements d\'un superhéros aux pouvoirs infinis, le justicier de Gotham City, lui-même doté d\'une détermination et d\'une force de frappe redoutables, affronte le sauveur des temps modernes adulé de Metropolis sous le regard du monde entier qui se demande quel type de héros lui convient le mieux.', '2023-03-16', 'USA', 'https://fr.web.img4.acsta.net/medias/nmedia/18/35/78/09/18648048.jpg'),
(14, 'the-flash', 95, 'Flash utilise ses super pouvoirs pour voyager dans le temps afin de changer les événements du passé. Cependant, lorsque sa tentative de sauver sa famille modifie par inadvertance l\'avenir, il se retrouve piégé dans une réalité dans laquelle le général Zod est revenu, menaçant l\'anéantissement.', '2020-02-07', 'UK', 'https://fr.web.img6.acsta.net/pictures/23/04/26/10/33/4339332.jpg'),
(17, 'kill-bill', 118, 'Au cours d\'une cérémonie de mariage en plein désert, un commando fait irruption dans la chapelle et tire sur les convives. Laissée pour morte, la mariée enceinte retrouve ses esprits après un coma de quatre ans. Celle qui a auparavant exercé les fonctions de tueuse à gages au sein du Détachement international des Vipères assassines n\'a alors plus qu\'une seule idée en tête: venger la mort de ses proches en éliminant tous les membres de cette organisation criminelle.', '2017-03-16', 'italie', 'https://m.media-amazon.com/images/S/pv-target-images/ca4af7fb6e19a86e6ecffa246f9cb22af11e39cedc9236a468bc8f043676df96.jpg'),
(18, 'bac-nord', 105, '2012. Les quartiers Nord de Marseille détiennent un triste record : la zone au taux de criminalité le plus élevé de France. Poussée par sa hiérarchie, la BAC Nord, brigade de terrain, cherche sans cesse à améliorer ses résultats. Dans un secteur à haut risque, les policiers adaptent leurs méthodes, franchissant parfois la ligne jaune. Jusqu\'au jour où le système judiciaire se retourne contre eux.', '2012-08-06', 'france', 'https://fr.web.img3.acsta.net/pictures/21/06/07/13/11/2832970.jpg'),
(19, 'NOVEMBRE', 128, 'Fred est policier dans un groupe antiterroriste chargé de retrouver les fugitifs les plus recherchés de France. Lors d\'une mission en Grèce, Fred et ses hommes ont malheureusement perdu la trace d\'un suspect. Dix mois plus tard, la France est frappée par une série d\'attentats', '2022-06-08', 'france', 'https://fr.web.img5.acsta.net/pictures/22/08/22/12/13/2509103.jpg'),
(43, 'babylon', 75, 'Los Angeles des années 1920. Récit d’une ambition démesurée et d’excès les plus fous, BABYLON retrace l’ascension et la chute de différents personnages lors de la création d’Hollywood, une ère de décadence et de dépravation sans limites.\r\n\r\n', '2012-07-06', 'USA', 'https://fr.web.img6.acsta.net/pictures/22/12/02/16/03/2536613.jpg'),
(44, 'cars', 77, 'cars est une voiture de course pérformante ', '2012-07-06', 'UK', 'https://fr.web.img6.acsta.net/pictures/17/08/01/16/24/309645.jpg'),
(52, 'blue story', 110, 'http://localhost:8001', '2017-07-06', 'UK', 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQNB_1wBtQpYWvmvolNZNYlrFqnCzHtN6g9gGKT70YYCDnmdumU'),
(54, 'Matrix', 111, 'Thomas A. Anderson18, un jeune informaticien connu dans le monde du hacking sous le pseudonyme de Neo19, est contacté via son ordinateur par ce qu’il pense être un groupe de hackers. Ils lui font découvrir que le monde dans lequel il vit n’est qu’un monde virtuel appelé la Matrice, à l\'intérieur duquel les êtres humains sont gardés inconsciemment sous contrôle.', '2012-03-08', 'USA', 'https://www.themoviedb.org/t/p/original/8QdTKWQtcHXal7UR1V8FWCo5jqp.jpg'),
(55, 'Spider-Man', 110, 'Ecartelé entre son identité secrète de Spider-Man et sa vie d\'étudiant, Peter Parker n\'a pas réussi à garder celle qu\'il aime, Mary Jane, qui est aujourd\'hui comédienne et fréquente quelqu\'un d\'autre. Guidé par son seul sens du devoir, Peter vit désormais chacun de ses pouvoirs à la fois comme un don et comme une malédiction.', '2008-08-06', 'USA', 'https://www.themoviedb.org/t/p/original/3csIdytRnmRNh1EjHD9Nrej3L2H.jpg'),
(60, 'barbie', 125, 'Parallèlement au monde réel, il existe Barbieland, un monde parfait où les poupées Barbie vivent joyeusement, persuadées d\'avoir rendu les filles humaines heureuses. Mais un jour, une Barbie commence à se poser des questions et à devenir humaine.  Sur les conseils d\'une Barbie bizarre, elle part pour le monde réel afin de retrouver la fille à laquelle elle appartenait afin de pouvoir retrouver sa perfection. Dans sa quête, elle est accompagnée par un Ken fou amoureux d\'elle qui va également trouver un sens à sa vie dans le monde réel…', '2023-09-06', 'USA', 'https://fr.web.img4.acsta.net/pictures/23/06/16/12/04/4590179.jpg'),
(64, 'Mad-Max', 112, 'Hanté par un lourd passé, Mad Max estime que le meilleur moyen de survivre est de rester seul. Cependant, il se retrouve embarqué par une bande qui parcourt la Désolation à bord d\'un véhicule militaire piloté par l\'Imperator Furiosa. Ils fuient la Citadelle où sévit le terrible Immortan Joe qui s\'est fait voler un objet irremplaçable. Enragé, ce Seigneur de guerre envoie ses hommes pour traquer les rebelles impitoyablement…', '2024-03-22', 'USA', 'https://img.seriebox.com/films/24/24680/affich_24680_2.jpg'),
(65, 'La Plateforme', 128, 'La Plateforme Synopsis du film Dans le futur, des prisonniers sont détenus dans des cellules verticales. Ceux qui logent dans les cellules supérieures sont nourris, tandis que ceux des cellules inférieures meurent de faim. Goreng, un détenu fraîchement débarqué, va se battre pour changer le système.', '2020-06-12', 'USA', 'https://th.bing.com/th/id/OIP.mdy6bHIXGSF2yH5MYn7qaAHaLH?rs=1&pid=ImgDetMain'),
(66, 'Harry-Potter', 150, 'Après la mort tragique de ses parents, le petit Harry Potter (Daniel Radcliffe) se retrouve tyrannisé par son oncle et sa tante qui le font dormir dans un placard sous les escaliers. Jusqu’au jour où débarque le géant Rubeus Hagrid (Robbie Coltrane) pour l’emmener à Poudlard, l’école de sorcellerie renommée.  Une séance de shopping plus tard, le voilà équipé pour la rentrée. En chemin, Harry sympathise avec Ron Weasley (Rupert Grint) et Hermione Granger (Emma Watson) qui ont déjà entendu parler de lui. En effet, dans le milieu, la légende d’Harry Potter le précède. Le petit garçon a survécu au maléfique Voldemort (Richard Bremmer) qui a tué ses parents et laissé une vilaine cicatrice au front.', '2012-02-02', 'USA', 'https://cdn1.cinenode.com/movie_poster/138/full/harry-potter-1---harry-potter---l--cole-des-sorciers-138002.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(101) NOT NULL,
  `mdp` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `email`, `mdp`) VALUES
(98, 'test28', 'test29@gmail.com', '$2y$10$/TGQ7bJFq4stiGE5U6hjheGSNTUi2rNc1gV5KAOGGlnO2LDxjk/9u'),
(99, 'test30', 'test30@gmail.com', '$2y$10$DU9Q/dY6oKTJRxSMlZSFVuvHZ6O1xtJ8s9L9VMhs8giPBfWLgoA7u'),
(100, 'test30', 'test31@gmail.com', '$2y$10$pWHSYrDyyk0Xk9rneLuw0.h6q78n/G0WYhKw5qwen4dXeNMp.a2r2'),
(101, 'test32', 'test32@gmail.com', '$2y$10$1bOxgtk7/HfpeiDRr6GWE.tIgvJd1ApZSH8jDplxfjkyxXENnI4FK'),
(102, 'test33', 'test33@gmail.com', '$2y$10$gr7tRdNNT0J0VmQHBHSeWeBEnW9gZUT65EEXr4tWGjWyCKEAmjrDS'),
(103, 'test33', 'test34@gmail.com', '$2y$10$EbbKjZq9O6HCgIeZRba/TucW8ZK4P8Alycq6GGfae2CfURbB0NsPK'),
(104, 'test35', 'test35@gmail.com', '$2y$10$.bL/wpcaNvNUSr9ZiVsaDuQeIlKO55aHIAXmJOh0jZZdvNxUftGYa'),
(105, 'test39', 'test39@gmail.com', '$2y$10$f1q35ASyy1X0qDO0lPGQoeI/Q4oWhpyOhUdz3kXUnVVl4MQ/po66e'),
(106, 'sadamhussein', 'sadam@gmail.com', '$2y$10$QU7lj2uSzyCDjCUoXCIR6uW3jQFyH.Q/jMCLRdFYhq5JjqhtXBBYm'),
(107, 'test45', 'test45@gmail.com', '$2y$10$VPwK3ABES5fZdazi1ttqTOg8fnv7A/dcAxZCkYKbnCD0ER3tgzlqi'),
(108, 'test46', 'test46@gmail.com', '$2y$10$9AaYn8DqptSbXBGXELWOD.6ULHxUFfWCIJlLWExevEQhssq29Cp8i'),
(109, 'test50', 'test50@gmail.com', '$2y$10$uWc6NQWapXR0K2Bg/bjBEuY31BZeJERTtjAtA5Ou5Ii30Lej14Gce'),
(110, 'test50@gmail.com', 'assa@gmail.com', '$2y$10$d26g7Spxn1cInGB9w66GNeKDLMa20HhiWwssyas.A7Rh8izXwfcZW'),
(111, 'zff', 'test70@gmail.com', '$2y$10$sxGwzZ4IMuXkMZHmVmlMnOKs1VvHrUKwZncqP04OcrONZyN5lEsjC'),
(112, 'test70@gmail.comzzd', 'test70@gmail.comzzd', '$2y$10$wActlx9t13Da7i1oA6BhO.suxZPp8/ryieazNvDnWqyBYA6eFoQBK'),
(113, 'test70@gmail.comzzd', 'test70@gmail.com1', '$2y$10$Xw2CHOD.85HM1p3m7ukxbePnJEupYCkldROLLnzlxy0ajqNoJpYUG');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
