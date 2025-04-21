-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2025 at 11:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblio`
--

-- --------------------------------------------------------

--
-- Table structure for table `auteur`
--

CREATE TABLE `auteur` (
  `id_auteur` int(11) NOT NULL,
  `nom_auteur` varchar(100) NOT NULL,
  `image_auteur` varchar(255) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auteur`
--

INSERT INTO `auteur` (`id_auteur`, `nom_auteur`, `image_auteur`, `description`) VALUES
(38, 'Victor Hugo', '1738942627_MV5BOTUyMmY3NTUtZWZhNi00ZWE2LWFhOGUtMmYyNzU4ZDJhNTA1XkEyXkFqcGc@.webp', 'Écrivain français romantique, engagé pour la justice sociale (XIXe siècle).'),
(39, 'Jane Austen', '1738942676_jane-austen-portrait-of-the-english-novelist-as-a-young-woman-16-december-1775-18-july-1817.webp', 'Romancière anglaise, maîtresse de l’ironie sociale (XIXe siècle).'),
(40, 'Fiodor Dostoïevski ', '1738942714_Fyodor_Mikhailovich_Dostoyevsky_1863.webp', 'Romancier russe, explorateur des tourments moraux (XIXe siècle).'),
(41, 'Charles Dickens', '1738942769_Dickens_Gurney_head.webp', 'Auteur victorien, défenseur des opprimés (XIXe siècle).'),
(42, 'Gustave Flaubert', '1738942809_gustave-flaubert-portrait-of-the-french-novelist-12-december-1821-8-may-1880.webp', 'Maître du réalisme français, critique de la bourgeoisie (XIXe siècle).'),
(43, 'Isaac Asimov', '1738942857_author-isaac-asimov.webp', 'Pionnier américain de la SF, inventeur des lois de la robotique (XXe siècle)'),
(44, 'J.R.R. Tolkien', '1738942906_1000012164.webp', 'Créateur britannique de la Terre du Milieu, père de la fantasy moderne.'),
(45, 'Philip K. Dick', '1738943183_MV5BMTY4MDI2NTE0M15BMl5BanBnXkFtZTgwNjI0NDY0MTI@.webp', 'Auteur américain de SF psychédélique, obsédé par la réalité.'),
(46, 'Ursula K. Le Guin', '1738943248_LeGuin_Ursula.webp', 'Autrice américaine, féministe et humaniste en SF/Fantasy.'),
(47, 'Frank Herbert', '1738943307_MV5BMTI5MzkzMDctZmJjMC00NTNiLWE4NzQtODViYWMyNzQxNDJmXkEyXkFqcGc@.webp', 'Visionnaire américain, auteur de la saga écologique Dune.'),
(48, 'Agatha Christie', '1738943344_christie-agatha-15-09-1891-schriftstellerin-grossbritannienporträt-1954.webp', '\"Reine du crime\" britannique, génie des énigmes (XXe siècle).'),
(49, 'Arthur Conan Doyle', '1738943397_unspecified-sir-arthur-conan-doyle.webp', 'Créateur écossais de Sherlock Holmes (XIXe-XXe siècle).'),
(50, 'Stieg Larsson', '1738943439_MV5BOWExZjFiMWQtNzFjYS00MzUyLWI2MmItMDg4YjU2MzM1YWI2XkEyXkFqcGc@.webp', 'Journaliste suédois, auteur de la saga Millénium.'),
(51, 'Gillian Flynn', '1738943485_MV5BMTk0MDkxNTYyMV5BMl5BanBnXkFtZTgwNjMwMzA4MjE@.webp', 'Romancière américaine de thrillers psychologiques sombres.'),
(52, 'Dan Brown', '1738943528_paris-france-dan-brown-attends-the-inferno-paris-photocall-at-hotel-bristol-on-october-11-2016.webp', 'Maître américain des thrillers ésotériques et historiques.'),
(53, 'Yuval Noah Harari', '1738943735_2138691.webp', 'Historien israélien, penseur de l’humanité et de la technologie.'),
(54, 'Stephen Hawking', '1738943773_Stephen_Hawking_050506.webp', 'Physicien britannique, vulgarisateur des mystères de l’univers.'),
(55, 'Michelle Obama', '1738943833_81GuxIkSYTL.webp', 'Ex-Première Dame américaine, militante pour l’éducation.'),
(56, 'Malcolm Gladwell', '1738943871_ndtsjs1mbus8ubg04hv02g5f3l._SY600_.webp', 'Essayiste canadien, décrypteur de phénomènes sociaux.'),
(57, 'Naomi Klein', '1738943917_Naomi_Klein_Warsaw_Nov._19_2008_Fot_Mariusz_Kubik_03.webp', 'Journaliste canadienne, critique du capitalisme et du climat.'),
(58, 'Haruki Murakami', '1738943953_new-york-ny-haruki-murakami-speaks-on-stage-during-the-2018-new-yorker-festival-on-october-6.webp', 'Écrivain japonais, mélange de réalisme magique et de pop culture.'),
(59, 'Margaret Atwood ', '1738943996_MV5BNjg2MzU5OTI2Ml5BMl5BanBnXkFtZTgwODU3MTg1MzI@.webp', 'Romancière canadienne, voix féministe et dystopique.'),
(60, 'Khaled Hosseini', '1738944064_Khaled_Hosseini_(9039700792).webp', 'Auteur afghan-américain, conteur de drames humains.'),
(61, 'Chimamanda Ngozi Adichie', '1738944110_MV5BNWJiMjIzYzUtNDgzNS00ZDVmLWIxYmEtYTI3MGY1MzcwODJmXkEyXkFqcGc@.webp', 'Autrice nigériane, défenseuse de l’égalité et de l’identité.'),
(62, 'Paul Auster', '1738944151_paris-france-writer-paul-auster-is-photographed-for-paris-match-on-january-12-2018-in-paris.webp', 'Romancier américain, maître des récits postmodernes et labyrinthiques.');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_categorie`, `nom_categorie`) VALUES
(27, ' Policier & Thriller'),
(25, 'Littérature Classique'),
(29, 'Littérature Contemporaine'),
(28, 'Non-Fiction & Essais'),
(26, 'Science-Fiction & Fantastique');

-- --------------------------------------------------------

--
-- Table structure for table `description_admin`
--

CREATE TABLE `description_admin` (
  `id_descrip` int(11) NOT NULL,
  `description_ad` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `description_admin`
--

INSERT INTO `description_admin` (`id_descrip`, `description_ad`) VALUES
(2, 'L\'administrateur est chargé de gérer les emprunts, l\'inventaire des livres, les informations des auteurs et l\'organisation des catégories pour faciliter la recherche et le classement.\r\n        '),
(3, 'Le chef administratif supervise la gestion des emprunts, des livres, des auteurs et des catégories, tout en gérant les utilisateurs, leurs profils et droits d\'accès, et en coordonnant l\'équipe adminis');

-- --------------------------------------------------------

--
-- Table structure for table `emprunts`
--

CREATE TABLE `emprunts` (
  `id_emprunts` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `date_emprunt` date NOT NULL,
  `date_retour` date DEFAULT NULL,
  `statut` enum('emprunte','retourne','en_retard') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `livres`
--

CREATE TABLE `livres` (
  `id_livre` int(11) NOT NULL,
  `titre` varchar(200) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `id_auteur` int(11) DEFAULT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `disponibilite` enum('disponible','non disponible','emprunte') NOT NULL,
  `description_livre` varchar(255) NOT NULL,
  `date_ajout` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `livres`
--

INSERT INTO `livres` (`id_livre`, `titre`, `image`, `id_auteur`, `id_categorie`, `disponibilite`, `description_livre`, `date_ajout`) VALUES
(10, 'Les Misérables', '../images/71-AINBCy0L.webp', 38, 25, 'disponible', 'Rédemption de Jean Valjean dans la France du XIXe siècle.', '2025-02-01 23:59:51'),
(11, 'Notre-Dame de Paris', '../images/9782382926376ORI.webp', 38, 25, 'disponible', 'Tragédie de Quasimodo et Esmeralda à Paris médiéval.', '2025-02-02 00:01:31'),
(12, 'Orgueil et Préjugés', '../images/71H9V+osLSL.webp', 39, 25, 'disponible', 'Conflits de classe et romance entre Elizabeth Bennet et Darcy.', '2025-02-02 00:05:36'),
(13, 'Raison et Sentiments', '../images/raison_et_sentiments-1416195-264-432.webp', 39, 25, 'disponible', 'Sœurs Dashwood entre amour et raison.', '2025-02-02 00:06:32'),
(14, 'Crime et Châtiment', '../images/crime_et_chatiment-140603-264-432.webp', 40, 25, 'disponible', 'Étudiant rongé par la culpabilité après un meurtre.', '2025-02-02 00:07:54'),
(15, 'Les Frères Karamazov', '../images/51hP97S6IzL.webp', 40, 25, 'disponible', 'Drame familial et questions existentielles.', '2025-02-02 00:09:06'),
(16, 'Oliver Twist', '../images/9789354865336.webp', 41, 25, 'disponible', 'Orphelin confronté au crime dans Londres victorien.', '2025-02-02 00:13:12'),
(17, 'David Copperfield', '../images/427830276b5328ed8f52878f60e476b6.webp', 41, 25, 'disponible', 'Parcours semi-autobiographique de résilience.', '2025-02-02 00:14:46'),
(18, 'Madame Bovary', '../images/61Z9ebxYVvL.webp', 42, 25, 'disponible', 'Désillusions d’une femme aspirant à l’évasion romantique.', '2025-02-02 00:16:05'),
(19, 'L’Éducation sentimentale', '../images/MV5BNTQzNWRkMjAtN2YzMS00NTkyLTk3YjgtMTIyZDllNzMwYzExXkEyXkFqcGc@.webp', 42, 25, 'disponible', 'Jeunesse désenchantée dans le Paris du XIXe.', '2025-02-02 00:17:31'),
(20, 'Fondation', '../images/91EVYFLvQ2L.webp', 43, 26, 'disponible', 'Effondrement d’un empire galactique et sauvegarde du savoir.', '2025-02-02 00:30:41'),
(21, 'Les Robots', '../images/le_cycle_des_robots_tome_4_face_aux_feux_du_soleil-838524-264-432.webp', 43, 26, 'disponible', 'Nouvelles sur l’éthique des androïdes et l’intelligence artificielle.', '2025-02-02 00:32:36'),
(22, 'Le Seigneur des Anneaux', '../images/916AFuZklLL.webp', 44, 26, 'disponible', 'Quête pour détruire un anneau maléfique en Terre du Milieu.', '2025-02-02 00:35:28'),
(23, 'Bilbo le Hobbit', '../images/71BAXRnuZtL.webp', 44, 26, 'disponible', 'Aventure d’un hobbit pour récupérer un trésor gardé par un dragon.', '2025-02-02 00:36:46'),
(24, 'Blade Runner', '../images/9780553099836.webp', 45, 26, 'disponible', 'Chasse aux réplicants dans un Los Angeles dystopique.', '2025-02-02 00:39:10'),
(25, 'Ubik', '../images/156548.webp', 45, 26, 'disponible', 'Réalité fragmentée et lutte contre la dissolution du temps.', '2025-02-02 00:40:20'),
(26, 'Les Dépossédés', '../images/les_depossedes-5036543-264-432.webp', 46, 26, 'disponible', 'Conflit entre anarchisme et capitalisme sur deux planètes.', '2025-02-02 00:41:52'),
(27, 'La Main gauche de la nuit', '../images/418b1QmhLZL.webp', 46, 26, 'disponible', 'Diplomatie sur un monde asexué aux traditions mystérieuses.', '2025-02-02 00:43:22'),
(28, 'Dune ', '../images/81nq+ewtkcL.webp', 47, 26, 'disponible', 'Guerre pour l’épice, ressource vitale du désert d’Arrakis.', '2025-02-02 00:45:47'),
(29, 'Le Messie de Dune', '../images/41LPg4uQK8L.webp', 47, 26, 'disponible', 'Paul Atréides confronté à son destin messianique.', '2025-02-02 00:47:24'),
(30, 'Le Crime de l’Orient-Express', '../images/CVT_9976_752115.webp', 48, 27, 'disponible', 'Meurtre dans un train bloqué, enquête de Poirot.', '2025-02-02 16:10:39'),
(31, 'Dix Petits Nègres', '../images/71dvqCzcLGL.webp', 48, 27, 'disponible', 'Invités piégés sur une île, morts mystérieuses.', '2025-02-02 16:13:21'),
(32, 'Une étude en rouge', '../images/9782732898957-fr-300.webp', 49, 27, 'disponible', 'Première enquête de Holmes sur un double meurtre.', '2025-02-02 16:15:29'),
(33, 'Le Chien des Baskerville', '../images/6_9782253003144_1_75.webp', 49, 27, 'disponible', 'Malédiction d’un chien fantôme dans les landes.', '2025-02-02 16:17:40'),
(34, 'Les Hommes qui n’aimaient', '../images/millenium_tome_1_les_hommes_qui_naimaient_pas_les_femmes-576674-264-432.webp', 50, 27, 'disponible', 'Secrets familiaux liés à un meurtre.', '2025-02-02 16:20:31'),
(35, 'La Fille qui rêvait…', '../images/couv35304340.webp', 50, 27, 'disponible', 'Lisbeth Salander venge une violence passée.', '2025-02-02 17:27:42'),
(36, 'Les Apparences', '../images/les_apparences-349754-264-432.webp', 51, 27, 'disponible', 'Disparition d’une femme et mensonges de couple.', '2025-02-02 21:42:02'),
(37, 'Sharp Objects ', '../images/51vrmMF6K7L.webp', 51, 27, 'disponible', 'Journaliste enquêtant sur des meurtres dans sa ville natale.', '2025-02-02 21:43:16'),
(38, 'Da Vinci Code', '../images/Dan-Brown_The-Da-Vinci-Code-book-cover_2024.webp', 52, 27, 'disponible', 'Course contre la mort pour un secret lié à Léonard de Vinci.', '2025-02-02 21:45:09'),
(39, 'Anges et Démons', '../images/anges_et_demons-407-264-432.webp', 52, 27, 'disponible', 'Conflit science-religion au Vatican, course contre une bombe.', '2025-02-02 21:46:13'),
(40, 'Sapiens', '../images/71U5HjmyufL.webp', 53, 28, 'disponible', 'Évolution de l’humanité, des cavernes à l’ère numérique.', '2025-02-03 00:04:45'),
(41, 'Homo Deus', '../images/9781910701881-us.webp', 53, 28, 'disponible', 'L’avenir de l’homme face aux technologies.', '2025-02-03 00:25:16'),
(42, 'Une brève histoire du temps', '../images/51ArfwT6whL.webp', 54, 28, 'disponible', 'Exploration des lois gouvernant l’univers.', '2025-02-03 00:26:31'),
(43, 'L’Univers dans une coquille', '../images/41ir1C6LxcL.webp', 54, 28, 'disponible', 'Théories sur l’espace-temps.', '2025-02-03 00:27:42'),
(44, 'Devenir', '../images/41cZftVwUXL.webp', 55, 28, 'disponible', 'Parcours d’une femme ordinaire à la Maison Blanche.', '2025-02-03 00:30:45'),
(45, 'La Lumière en nous', '../images/62317953._SY475_.webp', 55, 28, 'disponible', 'Réflexions sur la résilience et l’empathie.', '2025-02-03 00:31:53'),
(46, 'Le Point de bascule', '../images/9782894726570-475x500-1.webp', 56, 28, 'disponible', 'Comment les petites causes ont de grands effets.', '2025-02-03 00:33:55'),
(47, 'Outliers', '../images/HBGAuthors_Malcolm-Gladwell_Outliers_Paperback.webp', 56, 28, 'disponible', 'Secrets des génies et des réussites exceptionnelles.', '2025-02-03 00:35:06'),
(48, 'No Logo ', '../images/9780312429270.webp', 57, 28, 'disponible', 'Déconstruction des marques et de la mondialisation.', '2025-02-03 00:38:13'),
(49, 'This Changes Everything', '../images/71JCKqKd6YL.webp', 57, 28, 'disponible', 'Capitalisme vs crise climatique.', '2025-02-03 00:39:07'),
(50, '1Q84', '../images/9780099549055.webp', 58, 29, 'disponible', 'Monde parallèle et quête amoureuse mystérieuse.', '2025-02-03 00:40:33'),
(51, 'Kafka sur le rivage', '../images/37_9782264056160_1_75.webp', 58, 29, 'disponible', 'Voyage initiatique entre réel et fantastique.', '2025-02-03 00:44:19'),
(52, 'La Servante écarlate', '../images/41B3lFllxpL.webp', 59, 29, 'disponible', 'Femmes réduites au rôle de porteuses dans un régime totalitaire.', '2025-02-03 08:55:28'),
(53, 'Le Testament', '../images/9780385543798.webp', 59, 29, 'disponible', 'Résistance contre le régime de Gilead, 15 ans après.', '2025-02-03 08:57:38'),
(54, 'Les Cerfs-Volants', '../images/les_cerfs_volants_de_kaboul-1012443-264-432.webp', 60, 29, 'disponible', 'Amitié trahie pendant l’invasion soviétique.', '2025-02-03 08:58:35'),
(55, 'Mille Soleils splendides', '../images/41osDmqejrL.webp', 60, 29, 'disponible', 'Destins de femmes sous les talibans.', '2025-02-03 08:59:53'),
(56, 'L’Hibiscus pourpre', '../images/51UySRV25SL.webp', 61, 29, 'disponible', 'Enfance sous la dictature au Nigeria.', '2025-02-03 09:14:05'),
(57, 'Americanah', '../images/41b6InkMuZL.webp', 61, 29, 'disponible', 'Immigrante nigériane confrontée au racisme aux États-Unis.', '2025-02-03 09:15:09'),
(58, 'La Trilogie new-yorkaise', '../images/71w56GHu5TL.webp', 62, 29, 'disponible', 'Enquêtes métaphysiques entrelacées.', '2025-02-03 09:18:21'),
(59, 'Moon Palace', '../images/61i2Angu5bL.webp', 62, 29, 'disponible', 'Quête identitaire à travers les paysages américains.', '2025-02-03 09:22:13');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `role` enum('utilisateur','admin','chef administratif') NOT NULL,
  `image_prfl` varchar(255) NOT NULL,
  `date_inscription` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_user`, `nom`, `email`, `mot_de_passe`, `role`, `image_prfl`, `date_inscription`) VALUES
(1, 'ali', 'sss@gmail.com', 'kkkkkkk', 'utilisateur', '', '2025-01-12 16:34:01'),
(2, 'ilias', 'awsqd@gmail.com', 'aaaaaaaaaaaaaa', 'chef administratif', '', '2025-01-12 16:47:32'),
(3, 'sas', 'test@gmail.com', 'sssss', 'utilisateur', '', '2025-01-13 12:20:25'),
(9, 'ahmedtest', 'azqwerty@gmail.com', 'qwerty', 'utilisateur', '../images/user.png', '2025-01-28 17:18:04'),
(10, 'kamal', 'kamal@gmail.com', 'qwerty123456', 'utilisateur', '../images/user.png', '2025-01-28 17:44:43'),
(14, 'iliasadmin', 'iliasadmin@gmail.com', 'qwerty', 'admin', '../images/user.png', '2025-01-30 17:27:10'),
(15, 'iliaschef', 'iliaschefadmin@gmail.com', 'qwerty', 'chef administratif', '../images/user.png', '2025-01-30 17:27:44'),
(16, 'iliasuser', 'iliasuser@gmail.com', 'qwerty', 'utilisateur', '../images/user.png', '2025-01-30 17:28:10'),
(17, 'touhami', 'touhami@gmail.com', 'qwerty', 'utilisateur', '../images/user.png', '2025-02-04 13:13:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`id_auteur`),
  ADD UNIQUE KEY `nom_auteur` (`nom_auteur`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categorie`),
  ADD UNIQUE KEY `nom_categorie` (`nom_categorie`);

--
-- Indexes for table `description_admin`
--
ALTER TABLE `description_admin`
  ADD PRIMARY KEY (`id_descrip`);

--
-- Indexes for table `emprunts`
--
ALTER TABLE `emprunts`
  ADD PRIMARY KEY (`id_emprunts`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_livre` (`id_livre`);

--
-- Indexes for table `livres`
--
ALTER TABLE `livres`
  ADD PRIMARY KEY (`id_livre`),
  ADD KEY `id_auteur` (`id_auteur`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `id_auteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `description_admin`
--
ALTER TABLE `description_admin`
  MODIFY `id_descrip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `emprunts`
--
ALTER TABLE `emprunts`
  MODIFY `id_emprunts` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `livres`
--
ALTER TABLE `livres`
  MODIFY `id_livre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emprunts`
--
ALTER TABLE `emprunts`
  ADD CONSTRAINT `emprunts_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `utilisateurs` (`id_user`),
  ADD CONSTRAINT `emprunts_ibfk_2` FOREIGN KEY (`id_livre`) REFERENCES `livres` (`id_livre`);

--
-- Constraints for table `livres`
--
ALTER TABLE `livres`
  ADD CONSTRAINT `livres_ibfk_1` FOREIGN KEY (`id_auteur`) REFERENCES `auteur` (`id_auteur`),
  ADD CONSTRAINT `livres_ibfk_2` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id_categorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
