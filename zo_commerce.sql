-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 14 mai 2025 à 11:30
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `zo_commerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mdp` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `pseudo`, `email`, `mdp`) VALUES
(1, 'FenotianaZo', 'rajaonraisoafenotianazo@gmal.com', 'Fenotiana10');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `image`) VALUES
(1, 'Ordinateur', 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?q=80&w=1471&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(2, 'Téléphone', 'https://images.unsplash.com/photo-1722834228772-01d16b9bf83b?q=80&w=1464&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(3, 'Console de Jeux', 'https://media.materiel.net/r900/products/MN0006093881.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `homepage_sections`
--

DROP TABLE IF EXISTS `homepage_sections`;
CREATE TABLE IF NOT EXISTS `homepage_sections` (
  `id` int NOT NULL AUTO_INCREMENT,
  `section_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `homepage_sections`
--

INSERT INTO `homepage_sections` (`id`, `section_name`, `product_id`) VALUES
(12, 'Produit avec promotion', 14),
(8, 'Meilleures ventes', 9),
(7, 'Meilleures ventes', 4),
(9, 'Meilleures ventes', 11),
(10, 'Meilleures ventes', 15),
(11, 'Meilleures ventes', 17),
(13, 'Produit avec promotion', 15),
(14, 'Produit avec promotion', 17);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `created_at`) VALUES
(1, 7, 2509.00, '2025-05-10 16:41:38'),
(2, 5, 3000.00, '2025-05-10 20:02:45'),
(3, 7, 1000.00, '2025-05-12 06:54:55'),
(4, 7, 7000.00, '2025-05-12 06:58:20'),
(5, 5, 3000.00, '2025-05-12 07:47:57'),
(6, 5, 400.00, '2025-05-12 09:01:41'),
(7, 11, 100.00, '2025-05-14 10:15:35');

-- --------------------------------------------------------

--
-- Structure de la table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 11, 1, 100.00),
(2, 1, 12, 1, 600.00),
(3, 1, 19, 1, 500.00),
(4, 1, 18, 1, 309.00),
(5, 1, 19, 1, 500.00),
(6, 1, 19, 1, 500.00),
(7, 2, 13, 1, 3000.00),
(8, 3, 2, 1, 1000.00),
(9, 4, 14, 1, 1000.00),
(10, 4, 15, 1, 3000.00),
(11, 4, 15, 1, 3000.00),
(12, 5, 13, 1, 3000.00),
(13, 6, 7, 1, 400.00),
(14, 7, 11, 1, 100.00);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int NOT NULL AUTO_INCREMENT,
  `img` text COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `prix` int NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `date_ajout` datetime DEFAULT CURRENT_TIMESTAMP,
  `categorie_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categorie` (`categorie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `img`, `nom`, `prix`, `description`, `date_ajout`, `categorie_id`) VALUES
(2, 'https://images.unsplash.com/photo-1622297845775-5ff3fef71d13?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8UFM1fGVufDB8fDB8fHww', 'PlayStation 5', 1000, 'Profitez de performances ultra-rapides avec le SSD, des graphismes 4K époustouflants et de l’immersion totale grâce à la manette DualSense et l’audio 3D. La PS5 repousse les limites du jeu vidéo.', '2025-05-08 11:41:12', 3),
(3, 'https://images.unsplash.com/photo-1515054562254-30a1b0ebe227?w=500&amp;auto=format&amp;fit=crop&amp;q=60&amp;ixlib=rb-4.1.0&amp;ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8SXBob25lJTIwWHxlbnwwfHwwfHx8MA%3D%3D', 'Iphone X', 700, 'L’iPhone X est un smartphone haut de gamme signé Apple, doté d’un écran Super Retina OLED de 5,8 pouces, d’une puce A11 Bionic ultra-performante, d’un double appareil photo 12 Mpx, et de la reconnaissance faciale Face ID. Élégant, puissant et fluide, il offre une expérience utilisateur premium.', '2025-05-08 11:41:12', 2),
(4, 'https://images.unsplash.com/photo-1674763301530-f73a9351d9fc?w=500&amp;auto=format&amp;fit=crop&amp;q=60&amp;ixlib=rb-4.1.0&amp;ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8U2Ftc3VuZyUyMFMyMnxlbnwwfHwwfHx8MA%3D%3D', 'Samsung S22', 700, 'Le Samsung Galaxy S22 est un smartphone haut de gamme alliant élégance, puissance et innovation. Doté d’un écran AMOLED 6,1 pouces 120 Hz, d’un triple capteur photo de 50 Mpx, et d’un processeur Exynos 2200 ou Snapdragon 8 Gen 1, il offre des performances exceptionnelles pour la photo, la vidéo et le gaming. Sa finition premium et sa compatibilité 5G en font un appareil ultra complet.', '2025-05-08 11:41:12', 2),
(7, 'https://images.pexels.com/photos/13588948/pexels-photo-13588948.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=600', 'Redmi note 10 pro', 400, 'Le Xiaomi Redmi Note 10 Pro est un smartphone de milieu de gamme annoncé en mars 2021, doté d’un écran AMOLED de 6,67 pouces à 120 Hz et animé par le processeur Qualcomm Snapdragon 732G pour des performances fluides\r\nGSMArena\r\n. Il embarque une batterie de 5 020 mAh offrant jusqu’à deux jours d’autonomie et supportant la charge rapide 33 W\r\n. Son module photo quadruple, mené par un capteur principal Samsung HM2 de 108 Mpx, permet de capturer des images très détaillées, le tout à un tarif souvent salué pour son excellent rapport qualité-prix', '2025-05-08 11:41:12', 2),
(8, 'https://images.pexels.com/photos/16004744/pexels-photo-16004744/free-photo-of-apple-pomme-appareil-photo-iphone.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=600', 'Iphone 14 pro max', 1000, 'L’iPhone 14 Pro Max est le fer de lance haut de gamme d’Apple, doté d’un grand écran OLED Super Retina XDR de 6,7 pouces avec technologie ProMotion (taux de rafraîchissement adaptatif jusqu’à 120 Hz), Dynamic Island et écran toujours activé pour une expérience visuelle immersive et fluide\r\nAssistance Apple\r\n. Il intègre la puce Apple A16 Bionic, gravée en 4 nm, offrant des performances CPU et GPU en nette progression pour le gaming, le traitement d’images et la réalité augmentée', '2025-05-08 11:41:12', 2),
(9, 'https://images.pexels.com/photos/28381528/pexels-photo-28381528.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=600', 'Redmi note 13 pro', 600, 'Le Redmi Note 13 Pro est un smartphone de milieu de gamme présenté en janvier 2024, équipé d’un grand écran AMOLED de 6,67″ avec taux de rafraîchissement jusqu’à 120 Hz pour un affichage fluide et lumineux, ainsi que d’une batterie de 5 000 mAh compatible charge rapide 67 W pour une autonomie confortable\r\nGSMArena\r\n. Il embarque un processeur MediaTek Helio G99-Ultra gravé en 6 nm, un module photo principal de 200 Mpx avec stabilisation optique (OIS) et offre jusqu’à 512 Go de stockage ; ses performances sont à la hauteur des usages multimédias et gaming légers', '2025-05-08 11:41:12', 2),
(10, 'https://images.pexels.com/photos/214488/pexels-photo-214488.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=600', 'Samsung S9', 200, 'Le Samsung Galaxy S9, lancé le 16 mars 2018, est un smartphone haut de gamme compact équipé d’un écran 5,8″ Quad HD+ Super AMOLED (2960 × 1440 px) offrant des couleurs vives et des contrastes profonds\r\nGSMArena\r\nSamsung\r\n. Il est animé par le processeur Exynos 9810 (ou Snapdragon 845 selon les marchés) accompagné de 4 Go de RAM, garantissant des performances fluides en usage quotidien et gaming léger\r\nGSMArena\r\nPhoneArena\r\n. Son module photo principal de 12 Mpx intègre une double ouverture mécanique (f/1.5–f/2.4) pour capturer des images nettes même en basse lumière, tandis que la caméra frontale de 8 Mpx prend en charge l’Auto Focus', '2025-05-08 11:41:12', 2),
(11, 'https://images.pexels.com/photos/11934175/pexels-photo-11934175.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=600', 'Nokia 6.4', 100, 'Le Nokia 6.4 est un smartphone de milieu de gamme annoncé pour le premier trimestre 2021, combinant un design moderne à une fiche technique équilibrée pour l’usage quotidien\r\nGizchina.com\r\n. Il arbore un grand écran IPS LCD 6,3″ (1080 × 2400 px, 418 ppi) avec encoche goutte d’eau, animé par un SoC Qualcomm Snapdragon 665 (11 nm) associé à 4 Go de RAM et jusqu’à 128 Go de stockage, extensible via microSD\r\nCashify\r\n. Côté photo, il intègre un module triple caméra arrière 16 Mpx + 8 Mpx ultra-grand-angle + 5 Mpx macro, ainsi qu’une caméra frontale de 8 Mpx, le tout logé dans un module circulaire caractéristique\r\nCashify\r\n. Il embarque Android 11 (avec la promesse de deux mises à jour majeures), une batterie de 4000 mAh compatible charge rapide 15 W et un capteur d’empreinte latéral pour le déverrouillage ', '2025-05-08 11:41:12', 2),
(12, 'https://images.pexels.com/photos/4522997/pexels-photo-4522997.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=600', 'Playstation 4', 600, 'La PlayStation 4 (PS4) est une console de salon de huitième génération lancée par Sony en novembre 2013, qui a révolutionné l’expérience de jeu grâce à son interface sociale, ses capacités de streaming et un catalogue de plus de 3 400 titres. Animée par un APU AMD Jaguar 8-cœurs et dotée de 8 Go de RAM GDDR5, elle a connu plusieurs révisions (Slim, Pro) pour répondre aux besoins de compacité et de jeu en 4K. Avec plus de 117 millions d’unités écoulées à ce jour, elle demeure l’une des consoles les plus vendues de l’histoire, dominant largement les parts de marché en Europe et offrant encore aujourd’hui un vaste écosystème de jeux et de services en ligne.', '2025-05-08 11:41:12', 3),
(13, 'https://dlcdnwebimgs.asus.com/gain/E20134EE-F6B3-4AB7-A1B5-73795E91011D/w717/h525', 'ROG Strix G16 (2025) G615', 3000, 'Jusqu&#039;au GPU NVIDIA® GeForce RTX™ 5080 pour ordinateur portable\r\n    Jusqu&#039;à Windows 11 Pro\r\n    Jusqu&#039;au processeur Intel® Core™ Ultra 9 275HX\r\n    Jusqu&#039;à un écran de 16 pouces, 2,5K (2560 x 1600, WQXGA), rapport d&#039;aspect 16:10, taux de rafraîchissement : 240Hz, écran ROG Nebula\r\n    Jusqu&#039;à 32 Go de DDR5-5600 SO-DIMM x 2\r\n    Jusqu&#039;à 2 To PCIe® 4.0 NVMe™ M.2 SSD\r\n', '2025-05-08 15:32:12', 1),
(14, 'https://dlcdnwebimgs.asus.com/gain/00789a54-1d8c-4e3c-83dc-50521da247e4//fwebp', 'ExpertBook B6 Flip (B6602F, 12', 1000, 'Le ASUS ExpertBook B6 Flip est la station de travail mobile qui vous permettra de répondre à vos ambitions en matière de performances, en repoussant toutes les limites pour vous offrir la vitesse, la puissance et la portabilité dont vous avez besoin grâce à un écran tactile rabattable qui s\'adapte à n\'importe quelle tâche. Il est doté de composants de qualité professionnelle, dont des processeurs jusqu\'au Intel 55 W et des cartes graphiques NVIDIA®, ainsi que d\'une conception thermique avancée pour que tout fonctionne au frais, dans le silence et avec des performances optimales. Il dispose également d\'un superbe écran de 16 pouces, 120 Hz au format 16:10, qui permet de garder les commandes essentielles à portée de main. L\'ExpertBook B6 Flip est ainsi prêt à répondre à tous les besoins créatifs, de l\'édition audio et vidéo à la modélisation 3D la plus poussée.', '2025-05-08 15:34:15', 1),
(15, 'https://media.materiel.net/r900/products/MN0006155364_0006242147.jpg', 'MSI Thin 15 B13UC-3024FR', 3000, 'Le PC portable gamer MSI Thin 15 B13UC-3024FR dispose de tous les atouts pour vous procurer une excellente expérience de jeu grâce à des composants performants comme sa carte graphique NVIDIA RTX 3050 ou son écran IPS 15.6 pouces Full HD 144 Hz.', '2025-05-08 15:52:47', 1),
(17, 'https://media.materiel.net/r900/products/MN0006060001_0006170942_0006171052.jpg', 'Altyk Le Petit PC Portable L14', 4009, 'Nouvel arrivant dans le monde du PC portable, Altyk nous propose avec son L14F-I7U32-N2 une machine totalement conçue et assemblée en France ! Son châssis métal (aluminium) intègre un processeur Intel Core i7 Alder Lake et présente l&#039;énorme avantage d&#039;être nativement équipé de 32 Go de RAM DDR4. Vous apprécierez aussi le confort de sa dalle 14 pouces IPS à la résolution Full HD ! ', '2025-05-08 16:01:14', 1),
(18, 'https://media.materiel.net/r900/products/MN0006058430.jpg', 'Microsoft Xbox Series S - 512 ', 309, 'La Microsoft Xbox Series S vous offre les performances de pointe de la nouvelle génération, le tout dans le format le plus compact jamais réalisé pour une Xbox. Grâce à ses graphismes dynamiques en 1440p et à son SSD interne de 512 Go, cette console réduit considérablement les temps de chargement, offrant ainsi une expérience de jeu exceptionnelle. ', '2025-05-08 16:05:43', 3),
(19, 'https://media.materiel.net/r900/products/MN0006058440.jpg', 'Microsoft Xbox Series X', 500, 'Avec la Xbox Series X, Microsoft dévoile sa console la plus véloce et la plus puissante à ce jour. Plongez dans des univers hautement immersifs grâce à des graphismes à couper le souffle, pouvant atteindre une résolution de 8K, des temps de chargement nettement raccourcis, et une fluidité d&#039;image allant jusqu&#039;à 120 images par seconde.', '2025-05-08 16:07:05', 3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `password` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(5, 'Zo', 'rajaonarisoafenotianazo@gmail.com', '$2y$10$ALsvKpp3JPW3xmNbOulnSOP8CeFF3clg6ZiPoBR0gYTgdR5e8rqCm', '2025-05-07 09:41:53'),
(6, 'Ulrich', 'Ulrich@gmail.com', '$2y$10$q.IBn9EIFghLwUS0LOGBCurA06yWjCKWjUQ5OoxUxnI7iYDoUm9EO', '2025-05-09 10:02:22'),
(7, 'Fenotiana', 'fenotiana@gmail.com', '$2y$10$RGrwKppDH1xVVRGHM7VA3.bldklZh5e4Z9hsH5Y.DVGgW7Y6gNEzC', '2025-05-09 12:20:51'),
(8, 'Rabozaka', 'Rabozaka@gmail.com', '$2y$10$pfk1hZS9DOlWAmqQRjimI.0cgDv0I/wLlgYwZX7QTzgtud6TwRsL.', '2025-05-12 08:20:17'),
(9, 'Anjara', 'anjara@gmail.com', '$2y$10$hXRYQnteQdXxD0wDBEBSlOAg/x1y8Z/R/in.VqlsWkPfgb22oh0dS', '2025-05-12 08:47:03'),
(10, 'AnjaraZo', 'anjarazoa@gmail.com', '$2y$10$0PTOcVo95Ad48MDWotnOAOkEOZ1hHQVytritLfAWtDRZXEPgR8Egy', '2025-05-12 08:51:22'),
(11, 'Voahirana', 'Voahirana@gmail.com', '$2y$10$PNRY1bVdMCahXXlcc0/gkOAdqDmN8XQ55sMRQH7uLYta3NhpETnMe', '2025-05-14 10:14:47');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `fk_categorie` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
