-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 09, 2019 at 02:08 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kountacffauser3`
--

-- --------------------------------------------------------

--
-- Table structure for table `achats`
--

DROP TABLE IF EXISTS `achats`;
CREATE TABLE IF NOT EXISTS `achats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int(11) DEFAULT NULL,
  `valider` tinyint(1) NOT NULL,
  `effacer` tinyint(1) DEFAULT NULL,
  `euro` tinyint(1) DEFAULT NULL,
  `all_a` tinyint(1) DEFAULT NULL,
  `livre` tinyint(1) DEFAULT NULL,
  `usa` tinyint(1) DEFAULT NULL,
  `cfa` tinyint(1) DEFAULT NULL,
  `naira` tinyint(1) DEFAULT NULL,
  `date_a` date NOT NULL,
  `reference` int(11) NOT NULL,
  `achat` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  KEY `IDX_9920924EFB88E14F` (`utilisateur_id`),
  KEY `utilisateur_id` (`utilisateur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `achats`
--

INSERT INTO `achats` (`id`, `utilisateur_id`, `valider`, `effacer`, `euro`, `all_a`, `livre`, `usa`, `cfa`, `naira`, `date_a`, `reference`, `achat`) VALUES
(97, 8, 1, 0, NULL, NULL, NULL, NULL, 1, NULL, '2019-07-25', 1, 'a:6:{s:7:\"produit\";a:1:{i:54;a:7:{s:5:\"image\";O:40:\"Kountac\\KountacBundle\\Entity\\Media_motif\":11:{s:44:\"\0Kountac\\KountacBundle\\Entity\\Media_motif\0id\";i:46;s:51:\"\0Kountac\\KountacBundle\\Entity\\Media_motif\0mannequin\";O:53:\"Proxies\\__CG__\\Kountac\\KountacBundle\\Entity\\Mannequin\":16:{s:17:\"__isInitialized__\";b:0;s:42:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0id\";i:24;s:46:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0marque\";N;s:47:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0picture\";N;s:4:\"file\";N;s:50:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0date_ajout\";N;s:51:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0date_update\";N;s:53:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0nom_mannequin\";N;s:65:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0taille_standard_mannequin\";N;s:55:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0poids_mannequin\";N;s:56:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0taille_mannequin\";N;s:62:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0numero_teint_mannequin\";N;s:61:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0tour_taille_mannequin\";N;s:63:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0tour_poitrine_mannequin\";N;s:70:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0tour_grandes_hanches_mannequin\";N;s:56:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0statut_mannequin\";N;}s:51:\"\0Kountac\\KountacBundle\\Entity\\Media_motif\0produit_2\";O:54:\"Proxies\\__CG__\\Kountac\\KountacBundle\\Entity\\Produits_2\":27:{s:17:\"__isInitialized__\";b:1;s:43:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0id\";i:50;s:50:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0produit_1\";O:54:\"Proxies\\__CG__\\Kountac\\KountacBundle\\Entity\\Produits_1\":16:{s:17:\"__isInitialized__\";b:1;s:43:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0id\";i:27;s:51:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0collection\";O:55:\"Proxies\\__CG__\\Kountac\\KountacBundle\\Entity\\Collections\":3:{s:17:\"__isInitialized__\";b:0;s:44:\"\0Kountac\\KountacBundle\\Entity\\Collections\0id\";i:4;s:45:\"\0Kountac\\KountacBundle\\Entity\\Collections\0nom\";N;}s:50:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0produit_2\";O:33:\"Doctrine\\ORM\\PersistentCollection\":2:{s:13:\"\0*\0collection\";O:43:\"Doctrine\\Common\\Collections\\ArrayCollection\":1:{s:53:\"\0Doctrine\\Common\\Collections\\ArrayCollection\0elements\";a:0:{}}s:14:\"\0*\0initialized\";b:0;}s:50:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0categorie\";O:54:\"Proxies\\__CG__\\Kountac\\KountacBundle\\Entity\\Categories\":5:{s:17:\"__isInitialized__\";b:0;s:43:\"\0Kountac\\KountacBundle\\Entity\\Categories\0id\";i:14;s:49:\"\0Kountac\\KountacBundle\\Entity\\Categories\0children\";N;s:47:\"\0Kountac\\KountacBundle\\Entity\\Categories\0parent\";N;s:44:\"\0Kountac\\KountacBundle\\Entity\\Categories\0nom\";N;}s:46:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0looks\";O:55:\"Proxies\\__CG__\\Kountac\\KountacBundle\\Entity\\Idees_looks\":3:{s:17:\"__isInitialized__\";b:0;s:44:\"\0Kountac\\KountacBundle\\Entity\\Idees_looks\0id\";i:5;s:45:\"\0Kountac\\KountacBundle\\Entity\\Idees_looks\0nom\";N;}s:47:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0marque\";C:51:\"Utilisateurs\\UtilisateursBundle\\Entity\\Utilisateurs\":206:{a:8:{i:0;s:60:\"$2y$13$nF5bt32v7MmjOp74xFGJXOKKylzV4VNYxWWsyLoDh0JB4ZtMOz8ge\";i:1;N;i:2;s:7:\"kroskel\";i:3;s:7:\"Kroskel\";i:4;b:1;i:5;i:8;i:6;s:23:\"ornelladjoukui@yahoo.fr\";i:7;s:23:\"ornelladjoukui@yahoo.fr\";}}s:44:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0nom\";s:10:\"Veste Sota\";s:48:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0matiere\";s:5:\"Coton\";s:52:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0description\";s:209:\"La veste Sota est une veste en coton couleur jaune soufre, qui descend jusque au-dessous des petites hanches. Elle possède une poche de chaque côté, n’est pas boutonnée et présente un large col cranté.\";s:63:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0conditions_utilisation\";s:341:\"Dans le cas de lavages au lave—linge, utiliser un programme à 40° maximum, une lessive liquide sans agent blanchissant et opter pour un faible essorage. Cette veste peut être séchée à la machine, en choisissant le programme adéquat. Repasser au programme coton en protégeant d’une trop grande chaleur du fer par une pattemouille.\";s:51:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0popularite\";i:1;s:46:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0stock\";i:27;s:50:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0dateajout\";O:8:\"DateTime\":3:{s:4:\"date\";s:26:\"2018-12-14 00:00:00.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}s:51:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0dateupdate\";O:8:\"DateTime\":3:{s:4:\"date\";s:26:\"2018-12-15 00:00:00.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}s:50:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0dateachat\";N;}s:50:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0produit_3\";O:33:\"Doctrine\\ORM\\PersistentCollection\":2:{s:13:\"\0*\0collection\";O:43:\"Doctrine\\Common\\Collections\\ArrayCollection\":1:{s:53:\"\0Doctrine\\Common\\Collections\\ArrayCollection\0elements\";a:0:{}}s:14:\"\0*\0initialized\";b:0;}s:52:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0commentaire\";O:33:\"Doctrine\\ORM\\PersistentCollection\":2:{s:13:\"\0*\0collection\";O:43:\"Doctrine\\Common\\Collections\\ArrayCollection\":1:{s:53:\"\0Doctrine\\Common\\Collections\\ArrayCollection\0elements\";a:0:{}}s:14:\"\0*\0initialized\";b:0;}s:48:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0libelle\";O:58:\"Proxies\\__CG__\\Kountac\\KountacBundle\\Entity\\Libelles_motif\":6:{s:17:\"__isInitialized__\";b:1;s:47:\"\0Kountac\\KountacBundle\\Entity\\Libelles_motif\0id\";i:25;s:54:\"\0Kountac\\KountacBundle\\Entity\\Libelles_motif\0mannequin\";O:33:\"Doctrine\\ORM\\PersistentCollection\":2:{s:13:\"\0*\0collection\";O:43:\"Doctrine\\Common\\Collections\\ArrayCollection\":1:{s:53:\"\0Doctrine\\Common\\Collections\\ArrayCollection\0elements\";a:0:{}}s:14:\"\0*\0initialized\";b:0;}s:52:\"\0Kountac\\KountacBundle\\Entity\\Libelles_motif\0libelle\";s:5:\"Jaune\";s:4:\"path\";s:45:\"e413af2371c7bf4458a0af5d18622f6823179d93.jpeg\";s:4:\"file\";N;}s:46:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0stock\";i:27;s:45:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0etat\";b:1;s:50:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0reduction\";d:0;s:48:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0allprix\";d:70;s:56:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0allprixCommande\";d:110;s:55:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0allprecommande\";b:0;s:49:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0europrix\";d:65;s:57:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0europrixCommande\";d:105;s:56:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0europrecommande\";b:0;s:48:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0cfaprix\";d:27000;s:56:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0cfaprixCommande\";d:42000;s:55:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0cfaprecommande\";b:0;s:48:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0usaprix\";d:80;s:56:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0usaprixCommande\";d:120;s:55:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0usaprecommande\";b:0;s:50:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0livreprix\";d:65;s:58:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0livreprixCommande\";d:105;s:57:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0livreprecommande\";b:0;s:50:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0nairaprix\";d:17900;s:58:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0nairaprixCommande\";d:35900;s:57:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0nairaprecommande\";b:0;}s:4:\"path\";s:45:\"275a95fbf667e267ec46fe65204c0c6af231b510.jpeg\";s:5:\"path2\";s:46:\"dc0d0ce54740af42c31ebcbdba2e39a2a7acc4be2.jpeg\";s:5:\"path3\";s:46:\"a3845775a3879f5f22aa92b8b2de2df2a07e77fc3.jpeg\";s:45:\"\0Kountac\\KountacBundle\\Entity\\Media_motif\0top\";b:0;s:4:\"file\";N;s:5:\"file2\";N;s:5:\"file3\";N;s:9:\"modifieLe\";O:8:\"DateTime\":3:{s:4:\"date\";s:26:\"2019-07-25 15:26:07.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}}s:6:\"taille\";s:2:\"34\";s:9:\"reference\";s:10:\"Veste Sota\";s:5:\"motif\";s:5:\"Jaune\";s:8:\"quantite\";s:1:\"2\";s:4:\"prix\";d:27000;s:6:\"devise\";s:4:\"fcfa\";}}s:9:\"livraison\";a:10:{s:6:\"prenom\";s:7:\"Ornella\";s:3:\"nom\";s:7:\"DJOUKUI\";s:5:\"email\";s:23:\"ornelladjoukui@yahoo.fr\";s:9:\"telephone\";d:644784429;s:12:\"telephonefix\";d:644784429;s:7:\"adresse\";s:16:\"12 rue de Valois\";s:2:\"cp\";d:91940;s:5:\"ville\";s:8:\"Les Ulis\";s:4:\"pays\";s:2:\"FR\";s:3:\"Rue\";s:16:\"12 rue du valois\";}s:11:\"facturation\";a:10:{s:6:\"prenom\";s:7:\"Ornella\";s:3:\"nom\";s:7:\"DJOUKUI\";s:5:\"email\";s:23:\"ornelladjoukui@yahoo.fr\";s:9:\"telephone\";d:644784429;s:12:\"telephonefix\";d:644784429;s:7:\"adresse\";s:16:\"12 rue de Valois\";s:2:\"cp\";d:91940;s:5:\"ville\";s:8:\"Les Ulis\";s:4:\"pays\";s:2:\"FR\";s:3:\"Rue\";s:16:\"12 rue du valois\";}s:4:\"prix\";d:54000;s:12:\"prixCommande\";d:0;s:5:\"token\";s:40:\"6c28550fe4e8082e553286f06cee05401da712f0\";}'),
(98, 41, 1, 0, NULL, NULL, NULL, NULL, 1, NULL, '2019-07-25', 2, 'a:6:{s:7:\"produit\";a:1:{i:62;a:7:{s:5:\"image\";O:40:\"Kountac\\KountacBundle\\Entity\\Media_motif\":11:{s:44:\"\0Kountac\\KountacBundle\\Entity\\Media_motif\0id\";i:46;s:51:\"\0Kountac\\KountacBundle\\Entity\\Media_motif\0mannequin\";O:53:\"Proxies\\__CG__\\Kountac\\KountacBundle\\Entity\\Mannequin\":16:{s:17:\"__isInitialized__\";b:0;s:42:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0id\";i:24;s:46:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0marque\";N;s:47:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0picture\";N;s:4:\"file\";N;s:50:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0date_ajout\";N;s:51:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0date_update\";N;s:53:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0nom_mannequin\";N;s:65:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0taille_standard_mannequin\";N;s:55:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0poids_mannequin\";N;s:56:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0taille_mannequin\";N;s:62:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0numero_teint_mannequin\";N;s:61:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0tour_taille_mannequin\";N;s:63:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0tour_poitrine_mannequin\";N;s:70:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0tour_grandes_hanches_mannequin\";N;s:56:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0statut_mannequin\";N;}s:51:\"\0Kountac\\KountacBundle\\Entity\\Media_motif\0produit_2\";O:54:\"Proxies\\__CG__\\Kountac\\KountacBundle\\Entity\\Produits_2\":27:{s:17:\"__isInitialized__\";b:1;s:43:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0id\";i:50;s:50:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0produit_1\";O:54:\"Proxies\\__CG__\\Kountac\\KountacBundle\\Entity\\Produits_1\":16:{s:17:\"__isInitialized__\";b:1;s:43:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0id\";i:27;s:51:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0collection\";O:55:\"Proxies\\__CG__\\Kountac\\KountacBundle\\Entity\\Collections\":3:{s:17:\"__isInitialized__\";b:0;s:44:\"\0Kountac\\KountacBundle\\Entity\\Collections\0id\";i:4;s:45:\"\0Kountac\\KountacBundle\\Entity\\Collections\0nom\";N;}s:50:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0produit_2\";O:33:\"Doctrine\\ORM\\PersistentCollection\":2:{s:13:\"\0*\0collection\";O:43:\"Doctrine\\Common\\Collections\\ArrayCollection\":1:{s:53:\"\0Doctrine\\Common\\Collections\\ArrayCollection\0elements\";a:0:{}}s:14:\"\0*\0initialized\";b:0;}s:50:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0categorie\";O:54:\"Proxies\\__CG__\\Kountac\\KountacBundle\\Entity\\Categories\":5:{s:17:\"__isInitialized__\";b:0;s:43:\"\0Kountac\\KountacBundle\\Entity\\Categories\0id\";i:14;s:49:\"\0Kountac\\KountacBundle\\Entity\\Categories\0children\";N;s:47:\"\0Kountac\\KountacBundle\\Entity\\Categories\0parent\";N;s:44:\"\0Kountac\\KountacBundle\\Entity\\Categories\0nom\";N;}s:46:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0looks\";O:55:\"Proxies\\__CG__\\Kountac\\KountacBundle\\Entity\\Idees_looks\":3:{s:17:\"__isInitialized__\";b:0;s:44:\"\0Kountac\\KountacBundle\\Entity\\Idees_looks\0id\";i:5;s:45:\"\0Kountac\\KountacBundle\\Entity\\Idees_looks\0nom\";N;}s:47:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0marque\";C:66:\"Proxies\\__CG__\\Utilisateurs\\UtilisateursBundle\\Entity\\Utilisateurs\":206:{a:8:{i:0;s:60:\"$2y$13$nF5bt32v7MmjOp74xFGJXOKKylzV4VNYxWWsyLoDh0JB4ZtMOz8ge\";i:1;N;i:2;s:7:\"kroskel\";i:3;s:7:\"Kroskel\";i:4;b:1;i:5;i:8;i:6;s:23:\"ornelladjoukui@yahoo.fr\";i:7;s:23:\"ornelladjoukui@yahoo.fr\";}}s:44:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0nom\";s:10:\"Veste Sota\";s:48:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0matiere\";s:5:\"Coton\";s:52:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0description\";s:209:\"La veste Sota est une veste en coton couleur jaune soufre, qui descend jusque au-dessous des petites hanches. Elle possède une poche de chaque côté, n’est pas boutonnée et présente un large col cranté.\";s:63:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0conditions_utilisation\";s:341:\"Dans le cas de lavages au lave—linge, utiliser un programme à 40° maximum, une lessive liquide sans agent blanchissant et opter pour un faible essorage. Cette veste peut être séchée à la machine, en choisissant le programme adéquat. Repasser au programme coton en protégeant d’une trop grande chaleur du fer par une pattemouille.\";s:51:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0popularite\";i:2;s:46:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0stock\";i:25;s:50:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0dateajout\";O:8:\"DateTime\":3:{s:4:\"date\";s:26:\"2018-12-14 00:00:00.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}s:51:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0dateupdate\";O:8:\"DateTime\":3:{s:4:\"date\";s:26:\"2018-12-15 00:00:00.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}s:50:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0dateachat\";O:8:\"DateTime\":3:{s:4:\"date\";s:26:\"2019-07-25 00:00:00.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}}s:50:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0produit_3\";O:33:\"Doctrine\\ORM\\PersistentCollection\":2:{s:13:\"\0*\0collection\";O:43:\"Doctrine\\Common\\Collections\\ArrayCollection\":1:{s:53:\"\0Doctrine\\Common\\Collections\\ArrayCollection\0elements\";a:0:{}}s:14:\"\0*\0initialized\";b:0;}s:52:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0commentaire\";O:33:\"Doctrine\\ORM\\PersistentCollection\":2:{s:13:\"\0*\0collection\";O:43:\"Doctrine\\Common\\Collections\\ArrayCollection\":1:{s:53:\"\0Doctrine\\Common\\Collections\\ArrayCollection\0elements\";a:0:{}}s:14:\"\0*\0initialized\";b:0;}s:48:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0libelle\";O:58:\"Proxies\\__CG__\\Kountac\\KountacBundle\\Entity\\Libelles_motif\":6:{s:17:\"__isInitialized__\";b:1;s:47:\"\0Kountac\\KountacBundle\\Entity\\Libelles_motif\0id\";i:25;s:54:\"\0Kountac\\KountacBundle\\Entity\\Libelles_motif\0mannequin\";O:33:\"Doctrine\\ORM\\PersistentCollection\":2:{s:13:\"\0*\0collection\";O:43:\"Doctrine\\Common\\Collections\\ArrayCollection\":1:{s:53:\"\0Doctrine\\Common\\Collections\\ArrayCollection\0elements\";a:0:{}}s:14:\"\0*\0initialized\";b:0;}s:52:\"\0Kountac\\KountacBundle\\Entity\\Libelles_motif\0libelle\";s:5:\"Jaune\";s:4:\"path\";s:45:\"e413af2371c7bf4458a0af5d18622f6823179d93.jpeg\";s:4:\"file\";N;}s:46:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0stock\";i:25;s:45:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0etat\";b:1;s:50:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0reduction\";d:0;s:48:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0allprix\";d:70;s:56:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0allprixCommande\";d:110;s:55:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0allprecommande\";b:0;s:49:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0europrix\";d:65;s:57:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0europrixCommande\";d:105;s:56:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0europrecommande\";b:0;s:48:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0cfaprix\";d:27000;s:56:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0cfaprixCommande\";d:42000;s:55:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0cfaprecommande\";b:0;s:48:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0usaprix\";d:80;s:56:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0usaprixCommande\";d:120;s:55:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0usaprecommande\";b:0;s:50:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0livreprix\";d:65;s:58:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0livreprixCommande\";d:105;s:57:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0livreprecommande\";b:0;s:50:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0nairaprix\";d:17900;s:58:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0nairaprixCommande\";d:35900;s:57:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0nairaprecommande\";b:0;}s:4:\"path\";s:45:\"275a95fbf667e267ec46fe65204c0c6af231b510.jpeg\";s:5:\"path2\";s:46:\"dc0d0ce54740af42c31ebcbdba2e39a2a7acc4be2.jpeg\";s:5:\"path3\";s:46:\"a3845775a3879f5f22aa92b8b2de2df2a07e77fc3.jpeg\";s:45:\"\0Kountac\\KountacBundle\\Entity\\Media_motif\0top\";b:0;s:4:\"file\";N;s:5:\"file2\";N;s:5:\"file3\";N;s:9:\"modifieLe\";O:8:\"DateTime\":3:{s:4:\"date\";s:26:\"2019-07-25 16:25:08.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}}s:6:\"taille\";s:2:\"50\";s:9:\"reference\";s:10:\"Veste Sota\";s:5:\"motif\";s:5:\"Jaune\";s:8:\"quantite\";s:1:\"1\";s:4:\"prix\";d:27000;s:6:\"devise\";s:4:\"fcfa\";}}s:9:\"livraison\";a:10:{s:6:\"prenom\";s:5:\"Chris\";s:3:\"nom\";s:3:\"MEL\";s:5:\"email\";s:24:\"christianmeli81@yahoo.fr\";s:9:\"telephone\";d:689880522;s:12:\"telephonefix\";d:698880522;s:7:\"adresse\";s:4:\"test\";s:2:\"cp\";d:1234;s:5:\"ville\";s:6:\"Douala\";s:4:\"pays\";s:2:\"AF\";s:3:\"Rue\";s:9:\"Logbessou\";}s:11:\"facturation\";a:10:{s:6:\"prenom\";s:5:\"Chris\";s:3:\"nom\";s:3:\"MEL\";s:5:\"email\";s:24:\"christianmeli81@yahoo.fr\";s:9:\"telephone\";d:689880522;s:12:\"telephonefix\";d:698880522;s:7:\"adresse\";s:4:\"test\";s:2:\"cp\";d:1234;s:5:\"ville\";s:6:\"Douala\";s:4:\"pays\";s:2:\"AF\";s:3:\"Rue\";s:9:\"Logbessou\";}s:4:\"prix\";d:27000;s:12:\"prixCommande\";d:0;s:5:\"token\";s:40:\"77b337aeb1e1c6f7ff9798c9218b089eec793ef3\";}');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3AF34668727ACA70` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=266 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `nom`) VALUES
(1, NULL, 'Femmes'),
(2, NULL, 'Hommes'),
(3, NULL, 'Enfants'),
(4, NULL, 'Accessoires'),
(6, 1, 'Hauts'),
(7, 1, 'Bas'),
(8, 1, 'Ensembles'),
(9, 6, 'Chemisiers et blouses'),
(10, 6, 'Blazers et blousons'),
(11, 6, 'Pulls et gilets'),
(12, 6, 'Sweats'),
(13, 6, 'T-shirts et tops'),
(14, 6, 'Vestes'),
(15, 7, 'Chaussettes et collants'),
(16, 7, 'Jeans'),
(17, 7, 'Jupes'),
(18, 7, 'Leggings'),
(19, 7, 'Pantalons'),
(20, 7, 'Shorts et bermudas'),
(21, 8, 'Combinaisons'),
(22, 8, 'Costumes'),
(23, 8, 'Lingerie'),
(24, 8, 'Maillots de bain'),
(25, 8, 'Manteaux'),
(26, 8, 'Robes'),
(27, 8, 'Salopettes'),
(28, 8, 'Vêtements de nuit'),
(29, 8, 'Vêtements de sport'),
(30, 8, 'Vêtements imperméables'),
(31, 2, 'Hauts'),
(32, 2, 'Bas'),
(33, 2, 'Ensembles'),
(34, 3, 'Filles'),
(35, 3, 'Garçons'),
(36, 3, 'Bébés'),
(41, 31, 'Chemises et chemisettes'),
(42, 31, 'Blazers et blousons'),
(43, 31, 'Pulls et gilets'),
(44, 31, 'Sweats'),
(45, 31, 'T-shirts et polos'),
(46, 31, 'Vestes'),
(47, 32, 'Chaussettes'),
(48, 32, 'Jeans'),
(49, 32, 'Pantalons'),
(50, 32, 'Shorts et bermudas'),
(51, 33, 'Combinaisons'),
(52, 33, 'Costumes'),
(53, 33, 'Maillots de bain'),
(54, 33, 'Manteaux'),
(55, 33, 'Salopettes'),
(56, 33, 'Sous-vêtements'),
(57, 33, 'Vêtements de nuit'),
(58, 33, 'Vêtements de sport'),
(59, 33, 'Vêtements imperméables'),
(60, 34, 'Blazers, blousons et manteaux'),
(61, 34, 'Chaussettes, collants et leggings'),
(62, 34, 'Chemisiers, T-shirts et tops'),
(63, 34, 'Jeans et pantalons'),
(64, 34, 'Jupes et robes'),
(65, 34, 'Maillots de bain'),
(66, 34, 'Pulls, gilets et sweats'),
(79, 35, 'Blazers, blousons et manteaux'),
(80, 35, 'Chaussettes'),
(81, 35, 'Chemises, T-shirts et polos'),
(82, 35, 'Costumes et vestons'),
(83, 35, 'Jeans et pantalons'),
(84, 35, 'Maillots de bain'),
(85, 35, 'Pulls, gilets et sweats'),
(86, 35, 'Salopettes'),
(87, 35, 'Shorts et bermudas'),
(90, 35, 'Sous-vêtements'),
(91, 35, 'Vêtements de nuit et peignoirs'),
(92, 35, 'Vêtements de sport'),
(93, 35, 'Vêtements imperméables et de ski'),
(96, 36, 'Blazers, blousons et manteaux'),
(97, 36, 'Chaussettes, collants et leggings'),
(98, 36, 'Chemises, T-shirts et cie'),
(99, 36, 'Jeans et pantalons'),
(100, 36, 'Jupes et robes'),
(101, 36, 'Maillots de bain'),
(102, 36, 'Pulls, gilets et sweats'),
(103, 36, 'Salopettes, bodys et combinaisons'),
(104, 36, 'Shorts et bermudas'),
(105, 36, 'Sous-vêtements'),
(106, 36, 'Vêtements de nuit et peignoirs'),
(107, 36, 'Vêtements de sport'),
(108, 36, 'Vêtements imperméables et de ski'),
(156, 4, 'Sacs et bagageries'),
(157, 4, 'Bijoux et montres'),
(158, 4, 'Autres'),
(159, 156, 'Bagages\r\n'),
(160, 156, 'Business'),
(161, 156, 'Cabas'),
(162, 156, 'Cartables et scolaires\r\n'),
(163, 156, 'Petite Maroquinerie\r\n'),
(164, 156, 'Sacs bandoulières\r\n'),
(165, 156, 'Sacs de sport'),
(166, 34, 'Salopettes et combinaisons'),
(167, 34, 'Shorts et bermudas'),
(168, 34, 'Sous-vêtements'),
(169, 34, 'Vêtements de nuit et peignoirs'),
(170, 34, 'Vêtements de sport'),
(171, 34, 'Vêtements imperméables et de ski'),
(179, 156, 'Sacs homme'),
(180, 156, 'Sacs ordinateur\r\n'),
(181, 156, 'Sacs pochettes\r\n'),
(182, 156, 'Sacs à dos\r\n'),
(183, 156, 'Sacs à main\r\n'),
(184, 157, 'Bagues\r\n'),
(185, 157, 'Bagues d\'orteils'),
(186, 157, 'Boucles d\'oreilles\r\n'),
(187, 157, 'Bracelets\r\n'),
(188, 157, 'Bracelets de cheville\r\n'),
(189, 157, 'Bijoux de corps\r\n'),
(190, 157, 'Colliers\r\n'),
(191, 157, 'Pendentifs\r\n'),
(192, 157, 'Montres bracelets'),
(193, 157, 'Montres de poches et goussets\r\n'),
(194, 157, 'Montres sportives\r\n'),
(195, 158, 'Accessoires cheveux\r\n'),
(196, 158, 'Ceintures et corsets\r\n'),
(197, 158, 'Chapeaux et bonnets\r\n'),
(198, 158, 'Écharpes et foulards'),
(199, 158, 'Gants et mitaines\r\n'),
(200, 158, 'Lunettes de soleil\r\n'),
(201, 158, 'Serviettes et tapis de plage\r\n'),
(202, 158, 'Turbans'),
(231, NULL, 'Chaussures'),
(232, 231, 'Chaussures femmes'),
(233, 231, 'Chaussures hommes'),
(234, 231, 'Chaussures enfants'),
(235, 232, 'Ballerines et espadrilles\r\n'),
(236, 232, 'Baskets\r\n'),
(237, 232, 'Bottes, bottines et cuissardes\r\n'),
(238, 232, 'Chaussures à lacets\r\n'),
(239, 232, 'Chaussures de sport\r\n'),
(240, 232, 'Escarpins\r\n'),
(241, 232, 'Mocassins\r\n'),
(242, 232, 'Mules et sabots\r\n'),
(243, 232, 'Pantoufles et chaussons\r\n'),
(244, 232, 'Sandales\r\n'),
(245, 232, 'Tongs\r\n'),
(246, 233, 'Baskets\r\n'),
(247, 233, 'Bottes, bottines et boots\r\n'),
(248, 233, 'Chaussures à lacets\r\n'),
(249, 233, 'Chaussures à scratch\r\n'),
(250, 233, 'Chaussures de sport\r\n'),
(251, 233, 'Mocassins et espadrilles\r\n'),
(252, 233, 'Pantoufles et Chaussons\r\n'),
(253, 233, 'Sandales\r\n'),
(254, 233, 'Tongs\r\n'),
(255, 234, 'Ballerines, mocassins et espadrilles\r\n'),
(256, 234, 'Baskets'),
(257, 234, 'Bottes, bottines et boots\r\n'),
(258, 234, 'Chaussures à lacets\r\n'),
(259, 234, 'Chaussures à scratch\r\n'),
(260, 234, 'Chaussures de sport\r\n'),
(261, 234, 'Pantoufles et Chaussons\r\n'),
(262, 234, 'Sandales\r\n'),
(263, 234, 'Tongs\r\n'),
(264, NULL, 'Arts et Déco'),
(265, NULL, 'Luxe');

-- --------------------------------------------------------

--
-- Table structure for table `chatmessage`
--

DROP TABLE IF EXISTS `chatmessage`;
CREATE TABLE IF NOT EXISTS `chatmessage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `recepteur_id` int(11) NOT NULL,
  `channel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `insert_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_61735696F675F31B` (`author_id`),
  KEY `IDX_617356963B49782D` (`recepteur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

DROP TABLE IF EXISTS `collections`;
CREATE TABLE IF NOT EXISTS `collections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `nom`) VALUES
(1, 'Hiver'),
(2, 'Eté'),
(3, 'Automne'),
(4, 'Printemps'),
(5, 'Saison des prunes'),
(6, 'Saison des mangues'),
(7, 'Saison des ignames'),
(8, 'Saison des haricots');

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_id` int(11) DEFAULT NULL,
  `utilisateur_id` int(11) DEFAULT NULL,
  `marque_id` int(11) DEFAULT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `produit_id` int(11) DEFAULT NULL,
  `intitule` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `mesures` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `contenu` longtext COLLATE utf8_unicode_ci NOT NULL,
  `prixCommande` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `dateacceptation` date DEFAULT NULL,
  `dateachat` date DEFAULT NULL,
  `datelivraison` date DEFAULT NULL,
  `acheter` tinyint(1) DEFAULT NULL,
  `terminer` tinyint(1) DEFAULT NULL,
  `envoyer` tinyint(1) DEFAULT NULL,
  `livrer` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_35D4282C3DA5256D` (`image_id`),
  KEY `IDX_35D4282CFB88E14F` (`utilisateur_id`),
  KEY `IDX_35D4282C4827B9B2` (`marque_id`),
  KEY `IDX_35D4282CBCF5E72D` (`categorie_id`),
  KEY `IDX_35D4282CF347EFB` (`produit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produit_id` int(11) DEFAULT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pseudo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenu` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D9BEC0C4F347EFB` (`produit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`id`, `produit_id`, `titre`, `pseudo`, `contenu`, `date`) VALUES
(1, 85, 'tres_bien', 'foster05', 'Belle robe. La couleur est une belle profonde de blanc creme.  je  recommande vraiment.', '2019-02-10'),
(2, 69, 'tres_bien', 'NDJOO', 'Très beau pantalon. La matière est très agréable et les mesures sont au top !', '2019-02-10'),
(3, 62, 'tres_bien', 'Tata rosalie', 'Très belle robe, decapotable. Les mesures sont parfaites. Je suis satisfaite', '2019-02-10');

-- --------------------------------------------------------

--
-- Table structure for table `idees_looks`
--

DROP TABLE IF EXISTS `idees_looks`;
CREATE TABLE IF NOT EXISTS `idees_looks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `idees_looks`
--

INSERT INTO `idees_looks` (`id`, `nom`) VALUES
(1, 'Afro-urbain'),
(2, 'Basique'),
(3, 'Baptême'),
(4, 'Chic'),
(5, 'Classe affaires'),
(6, 'Dote afro'),
(7, 'En famille'),
(8, 'Entre nous'),
(9, 'Mariage'),
(10, 'Plage et soleil'),
(11, 'Soirée dansante'),
(12, 'Sortie en couple');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lien` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `lien`) VALUES
(1, '28aac370d2f7231b8bd113d59c58bec6.jpeg'),
(2, 'c08f6dd8dde42bc4ca9c917523997db2.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `libelles_motif`
--

DROP TABLE IF EXISTS `libelles_motif`;
CREATE TABLE IF NOT EXISTS `libelles_motif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `libelles_motif`
--

INSERT INTO `libelles_motif` (`id`, `libelle`, `path`) VALUES
(17, 'Bleu', '75669bb5449429eac03fc2ba3b208395e50a2efa.jpeg'),
(20, 'Vert', 'c923a75d42983fb0a8cc7ef9416f5f00e5910f6a.jpeg'),
(21, 'Rouge', '72919c9de3151e103fcfaf231f87895013f9df8b.jpeg'),
(22, 'Beige', 'b2e5527838d8e517b1150a5211a51ca86246a698.jpeg'),
(23, 'Gris', '4ea3b10dc22975f03e706f510faefa1b18821d7b.jpeg'),
(24, 'Ivoire', '783f85c462dedf17bd4eda990f7062ea6808d221.jpeg'),
(25, 'Jaune', 'e413af2371c7bf4458a0af5d18622f6823179d93.jpeg'),
(26, 'Kaki', 'b10e6b9759e47ce5a6c138f8e52a6ff9908864cd.jpeg'),
(27, 'Marron', '249a7d6f18e80eb6b958ec8888e8e345f862b1a1.jpeg'),
(28, 'Orange', '57c9c40d6958c9cc955925c90447bb3fadd7b058.jpeg'),
(29, 'Pourpre', '109b26c56ad61697c7fdecd551f09206561de2db.jpeg'),
(30, 'Rose', '2a3a72d6d602f27e4468ed51c09b20b55fea433b.jpeg'),
(31, 'Rouge', '046b9f24be61e78b66ff6a59e9de8d25c46763b5.jpeg'),
(32, 'VertBleu', 'b6459a7b3ff14cf43df0b1a1360eeda9a02c1013.jpeg'),
(33, 'Vert', 'b5ec99dae3dba75612e801fcbc44c62493d60164.jpeg'),
(34, 'Violet', '1cef44b7862ea9d47176a90b2aab753ce0efc3b5.jpeg'),
(35, 'Blanc', 'd71f293596d58a262eccf92fbf3af89c8e7452d5.jpeg'),
(36, 'Noir', '47b3f312cb2b7a97e4bff2e3501ccd42d491fcbc.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `mannequin`
--

DROP TABLE IF EXISTS `mannequin`;
CREATE TABLE IF NOT EXISTS `mannequin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marque_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_ajout` date DEFAULT NULL,
  `date_update` date DEFAULT NULL,
  `nom_mannequin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `taille_standard_mannequin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `poids_mannequin` double DEFAULT NULL,
  `taille_mannequin` double DEFAULT NULL,
  `numero_teint_mannequin` double DEFAULT NULL,
  `tour_taille_mannequin` double DEFAULT NULL,
  `tour_poitrine_mannequin` double DEFAULT NULL,
  `tour_grandes_hanches_mannequin` double DEFAULT NULL,
  `statut_mannequin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_704D82244827B9B2` (`marque_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mannequin`
--

INSERT INTO `mannequin` (`id`, `marque_id`, `path`, `date_ajout`, `date_update`, `nom_mannequin`, `taille_standard_mannequin`, `poids_mannequin`, `taille_mannequin`, `numero_teint_mannequin`, `tour_taille_mannequin`, `tour_poitrine_mannequin`, `tour_grandes_hanches_mannequin`, `statut_mannequin`) VALUES
(19, 7, '62c843e15d962e7fad573ecea43eefd0202af715.jpeg', '2018-12-11', '2018-12-11', 'Christelle', '40', 70, 1.69, 50, 82, 98, 110, 'reserve'),
(20, 7, '22b4f66e3d7c569fa85ad37df611d435ef74c649.jpeg', '2018-12-11', '2018-12-11', 'Christine', '48', 90, 168, 80, 94, 112, 120, 'reserve'),
(21, 7, 'c052fca3fc7fb3d1fc5e8cd766ba6854ba7b6c7d.jpeg', '2018-12-11', '2018-12-11', 'Dany', '36', 58, 1.58, 30, 70, 86, 98, 'reserve'),
(22, 7, '01e27212351173755e1430fb133d8483a1cf73d9.jpeg', '2018-12-11', '2018-12-11', 'Manuela', '34', 55, 170, 26, 64, 82, 94, 'reserve'),
(23, 7, '09e3701e4771d270253bf59da7a7b49c62694d19.jpeg', '2018-12-11', '2018-12-11', 'Ninelle', '36', 60, 1.59, 55, 68, 88, 106, 'reserve'),
(24, 7, '7d9a28423c9523a263d4d260efff06315d648176.jpeg', '2018-12-11', '2018-12-11', 'Sarah', '38', 65, 1.75, 26, 72, 92, 102, 'reserve'),
(25, 8, '9172b8abb09463e1253f1c066a4c782474ed6084.png', '2019-07-12', '2019-07-12', 'Sac', '32', 0, 0, 0, 0, 0, 0, 'disponible');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `path`, `path2`) VALUES
(1, 'e24215a56bb9203ef42424abeac7c22aa6d3a915.jpeg', '6d8304fdaff8797eafa3d26c628062710b3f921d2.jpeg'),
(2, 'f044458bc573ceeb0c6d14320feee0eba8f1621a.jpeg', '1edd2a1db8b780295e24b4c39a876fb67b6bafe52.jpeg'),
(3, '46e5b33412deb897da72582015d94144d686ab25.jpeg', '8d57c7cb3a4992b3845452c73a7d09e22d8961a82.jpeg'),
(4, '47400a58cb77cccefc2cf6cd9ee79d969799fb8f.png', '690e3c7026b16d5bba8192ff26d206571a19d1e42.png'),
(5, '8f1795b8271d421068b942e10806f12f7c21a5a5.jpeg', NULL),
(6, NULL, NULL),
(7, '6722bd1bee2cb786f6f620d11f9db8dd65717960.png', NULL),
(8, '9f8673dfe979def4393080fdf04621cd4a748c74.jpeg', '8b433d23535586af398582fda14bc19e1c946e0b2.jpeg'),
(9, NULL, NULL),
(10, NULL, NULL),
(11, NULL, NULL),
(12, NULL, NULL),
(13, NULL, NULL),
(14, NULL, NULL),
(16, 'c13eb96b316b4510ce924bcc96fb4f75b4c4da71.jpeg', NULL),
(18, NULL, NULL),
(22, NULL, NULL),
(27, NULL, NULL),
(28, '80ec95fa9f5b2760da3d2d91ae09ad1715f161c2.jpeg', 'aa2f4827a14c3c4ec841c2945c0451693ffe55052.jpeg'),
(29, '8cc7b2e23ab2c8089eea12f84c407a549e00ee19.jpeg', 'ff33c1d177cc3c8b14fcc0367a116ba75e2816ed2.jpeg'),
(32, 'a83ad5f8e63035c9cdc09722da9e48b4de40a6df.jpeg', 'd270238842d787d1e1cc085bc589e11a37dbc01e2.jpeg'),
(34, NULL, NULL),
(37, NULL, NULL),
(38, NULL, NULL),
(39, NULL, NULL),
(40, NULL, NULL),
(42, NULL, NULL),
(43, NULL, NULL),
(47, NULL, NULL),
(48, NULL, NULL),
(49, NULL, NULL),
(50, NULL, NULL),
(51, NULL, NULL),
(52, NULL, NULL),
(55, NULL, NULL),
(56, NULL, NULL),
(57, NULL, NULL),
(58, NULL, NULL),
(59, NULL, NULL),
(60, NULL, NULL),
(61, NULL, NULL),
(62, NULL, NULL),
(63, NULL, NULL),
(64, NULL, NULL),
(65, NULL, NULL),
(66, NULL, NULL),
(67, NULL, NULL),
(68, NULL, NULL),
(69, NULL, NULL),
(70, NULL, NULL),
(72, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media_motif`
--

DROP TABLE IF EXISTS `media_motif`;
CREATE TABLE IF NOT EXISTS `media_motif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `top` tinyint(1) DEFAULT NULL,
  `mannequin_id` int(11) DEFAULT NULL,
  `produit_2_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_98CAB30A58DDEC98` (`mannequin_id`),
  KEY `IDX_98CAB30ACBFE8EFB` (`produit_2_id`)
) ENGINE=InnoDB AUTO_INCREMENT=267 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `media_motif`
--

INSERT INTO `media_motif` (`id`, `path`, `path2`, `path3`, `top`, `mannequin_id`, `produit_2_id`) VALUES
(44, '5063cf6023d9e30c37f594285a4c41ba78c0a7ee.jpeg', '6abc01e887e9437d37e491688bf34bcc8832013d2.jpeg', '4eeea032e35352340b2615a86e99ad5e0cf87e7e3.jpeg', 1, 23, 49),
(45, '5274e32060292470f15329a7cfc3d227267fb8df.jpeg', '45a39c46c09880e7fd06af1189e0c08ab336fd652.jpeg', '578545bcb8c04ec0a6e3e500b4dc032b48c9229c3.jpeg', 0, 24, 49),
(46, '275a95fbf667e267ec46fe65204c0c6af231b510.jpeg', 'dc0d0ce54740af42c31ebcbdba2e39a2a7acc4be2.jpeg', 'a3845775a3879f5f22aa92b8b2de2df2a07e77fc3.jpeg', 0, 24, 50),
(51, '7321552dfa920de5deec4118dbff877d4b485ca8.jpeg', 'e09ff153ca0d2df5cba3b0061a81b98b464636f02.jpeg', '08b316118e9e4d9e1449852cf651c7b447d9201b3.jpeg', 0, 22, 54),
(52, 'c0bc39b4723749715a2caef723c7ba028e165eee.jpeg', '0489914274408fb87c0e14568fe65bee854398982.jpeg', '964fe5a2c712911e3487964b2ed2113b20984aa63.jpeg', 1, 23, 54),
(53, 'ae305d363dc847d0e7c7748fc61f3bad4bca5854.jpeg', '0862a5b20d2520c346a828baeef54a3205f64eb12.jpeg', '830cc32355770e70629b24b18b80084d30f104533.jpeg', 1, 24, 54),
(54, '9d758735bf5f6afadd7fb091188fe19afdad943f.jpeg', '0872da45fa2b5c81a2ffef6927334979d8cc47ba2.jpeg', '937983614e566fc577fba063717580f7360219283.jpeg', 1, 21, 54),
(55, 'cfaff99513f5f6a14bcd12afd49af7b26db5971e.jpeg', 'ab33a7d565ed22183fdc0745aa47e09de669b91b2.jpeg', '43015c4c4fb4c77f94a24618dedd887e1a6d77633.jpeg', 1, 22, 55),
(57, 'ec3267efe3994ebc48e1e04c094c7f966a17a878.jpeg', 'eee8d80bcf5ab2c7d968baa01cad6cab275a97412.jpeg', '497e8c429d106de219fc37be6b2834ebea4902ff3.jpeg', 1, 24, 55),
(58, '6b4cc290730841e7791c37ec7e10e4e2a18bb994.jpeg', '84f39427b56188a5c2ab3f65211ee51ea36077dd2.jpeg', 'f426cb5b82c5ebe4bafd44835cdc88e0a4943f0d3.jpeg', 0, 23, 55),
(59, '8302ae49631bc21b8e65c4b445f67cfdc00938bd.jpeg', 'c1e2126cebe5913b7d7e615ea83cc52d7e88f9092.jpeg', 'd50e7699ba7fe2712cadd84d5beac98b3af7bd6d3.jpeg', 1, 21, 55),
(60, 'bb8d3e99c9f1a9e355605f19b587ac08df35b7e8.jpeg', 'e41eb8a6348c1028f5b33d7f70f96c2367db5fea2.jpeg', '718b091d8ffc99e795609f61e89ce957737643083.jpeg', 1, 22, 56),
(61, 'a56b4c57a32288eaf892587a4bd0ac979b02c00b.jpeg', '6441d7497042dd903652d1e4bf20ba0cbafa5bee2.jpeg', 'e8d8ee1b3705f48d322e01e26fe47c722d8d14293.jpeg', 1, 23, 56),
(62, 'fd8fb3b6d7edd572efe3b532b0f23a5fa919e7ba.jpeg', '9f77f77c60e6caa4672858b6c94262a2d92a6cd42.jpeg', '35088a9744ec5cf2747d22fbd14e60a923b19bad3.jpeg', 1, 24, 56),
(63, '9429c0398d4a84a9f9e644f19f7b98cf6ed24f43.jpeg', '2d2a03a69f421f05cbe53523bc1d5d9db6b5a91e2.jpeg', 'f398baf4df1ecb7b35e627406346659686144c3b3.jpeg', 0, 21, 56),
(67, '347f4c82a1b61b8dc9fd8da73d7947166df9cbe1.jpeg', '54c6903e5d55e0a0e15737079167dc1fba8383952.jpeg', '047e07ecb1dbb4885d040fa4757938180505da8a3.jpeg', 1, 20, 60),
(68, '08799ac5f3ff0406dd4454043fa49139259c9f3b.jpeg', '02d250317acd20ad72358a650861b7393bf2d1e42.jpeg', 'afb7b1930f42563a4e48c15557c4135ce47114073.jpeg', 1, 22, 60),
(69, 'ef3a074610aa7a42c1698cf11a25c983232f59ae.jpeg', 'f176003920177cb9ef0368a53fe5e643fb52ecfc2.jpeg', '9ef01f68bcaeb72af6c245ec1714a455d7ea28793.jpeg', 0, 24, 60),
(70, 'b081a2470bbd40947438997fe00aaddb12a1d84b.jpeg', 'c186d62483a71d69c31f439ebf03af279a702f622.jpeg', 'aeb6ff32a24c9af17ecbb9a77ba2547a6f6a51503.jpeg', 1, 23, 60),
(71, 'f2bbc59b18df8f7d3b8c1292b95031999e9190bb.jpeg', '457efe19b8106630d5c64d3f24da7bb868b830a22.jpeg', '92af4a38c3e34a0561d5be927f33562b17569a893.jpeg', 0, 20, 61),
(72, '9f5ed7e660eea29614c02f4cf64cc633169bc95c.jpeg', '66286f070f5315fbf100d6ee24bd7516bfd5dcc22.jpeg', '41038c12f5f12da7b68885324fd2cceb860928513.jpeg', 1, 22, 61),
(73, 'eb28aa34450de44eada95a3b8af11bb5a77e2608.jpeg', '507e4ca19a9e2fa1b365e0ee825f9e24f587df1f2.jpeg', '24fa4ca5391aa0e9496f28d7fb8771b4018b64cd3.jpeg', 1, 24, 61),
(74, '134e96ead48a71b4637501f5673e106bce402411.jpeg', 'e2d3e9c5b22998f993a609124ef3ae7b48eea6ee2.jpeg', '99922a7d82c276c8cbde5e200fbf28dd397b30303.jpeg', 0, 22, 62),
(75, '0618c197df11155c04703428cc465d606db8afb1.jpeg', '743674e4f3fdb1b0264c5b200c413612ede3262b2.jpeg', '19956e204ae60eb3cc2394c9e9bb6ecb9459c16b3.jpeg', 1, 24, 62),
(77, 'ae5aee1e369b414739084f1a4b4222fa1399e275.jpeg', '4e1b98d6aa39d8b11ca77e4e29fb6447f86693242.jpeg', 'de67dbc0ee0bacf1991e016d59cadc2f1d4a4b013.jpeg', 1, 24, 65),
(78, '5e50e5bd7649ef5f430cf503d3278c8627dfd352.jpeg', '4917ddd3fab52e10df56b4f96fa4dfd23bba8cc62.jpeg', '5e2ed088d31bc753bd3be7a879580c5b27937c453.jpeg', 0, 23, 65),
(79, '8e12346965e43e3bbbb232b6da4a861226ef54f6.jpeg', '7571b289d6a6557f6fb582a2148a6c4dcdb67de12.jpeg', '45c0674b068b56103a9ff7b9474e5046edbe88df3.jpeg', 1, 21, 65),
(80, '3ba6ca8d15544b7757257cf5258cd9b0c076e9d6.jpeg', '0af812afc2d66fca8938cfc467d185c84ec447f32.jpeg', '6ff66bbb09ecf1c164599a654e763622f88c7c3e3.jpeg', 1, 21, 66),
(81, '80d80b0c6b3f5d58df80a9819ab3cfaeb3186df7.jpeg', 'f081ec1b2553c91806b8424a04f0fe0dac9f7b932.jpeg', 'c21e472f69704b4ee0a6afe7c29b0680c0abf7d23.jpeg', 0, 19, 66),
(82, '7de75e4074acacac7de75d70625216349f561b7c.jpeg', '81f1c67c42907b7bb82d53af5a83fd408ab8c1cf2.jpeg', 'd2c434caaa362639a517488f4701642d13edaed73.jpeg', 1, 23, 66),
(83, '3fc17b6067698616f5fbe283e5d3cdbe880b3fd9.jpeg', '6e9753af0f86d238ebed527540727e3bc5eabd722.jpeg', '9cde41d551ecf8b3f234beee9d7a2e4c361cd1343.jpeg', 1, 21, 67),
(84, 'b06540cd6cff5019100fbc41736d54e46eb37aa1.jpeg', 'e219c536694d2a5faab8f29ef4d3806c38bef2472.jpeg', '0db3784a95b8ca7133459a2328e068c45fa6719d3.jpeg', 1, 19, 67),
(85, '944ef760cc6c06f27bae879ac798f5f8b67603e6.jpeg', '9625e219cde7dba38cc133df7218020058ac02b62.jpeg', 'cc3a8f14706822795e6e1ed2f2c0ae95c293a8cc3.jpeg', 1, 23, 67),
(86, '3d221a21fba919514d8e6a7b1e5eb8e14ab9e09d.jpeg', 'dac0fc7f4a7a76a9bea26e8d7ee35e3df9b080892.jpeg', '48ff28a6a6d4881b6c382c7a05e6c434916e77613.jpeg', 0, 22, 67),
(87, '99c8cd1568fc683971855dcf4b916a6b4e5c06e8.jpeg', 'ef15f686c165c17d96e97131a56556d19688fa042.jpeg', '851e41c6d29ed3825d37d166177a0e08c62d624c3.jpeg', 1, 22, 68),
(88, '0cc728aa1cb0744253d7a389586252561afdd9ff.jpeg', 'c2fef459f35157261a32cdb5a8da2049005524192.jpeg', '8d436d83124e1eb0d4c6c170202df6cb787eeefa3.jpeg', 1, 23, 68),
(89, '91981fae61725197284bc216fc24d90554fd4878.jpeg', '1b52405c2841a8bb4b1b9c001e45a096173c06472.jpeg', '3d0178714bea11249d23b9181f60d5b6300c78403.jpeg', 0, 21, 68),
(90, '6865c719bf9fb066ca0803ae79baeba2a7ba5c6e.jpeg', 'bebdd480c72e6be5505a216853c8fe5d7a92916d2.jpeg', '44af585e6b22dd554052d83a2993674191fbf3ef3.jpeg', 1, 21, 69),
(91, 'b892241edde583cc5b2ecc1b50fc4a97cf65b437.jpeg', 'fd38ee1ff4d48585fdff2b51626ce1cf87f66b2d2.jpeg', NULL, 1, 22, 69),
(92, '74a238bfa081b752b3ae2398ded654288ebcc188.jpeg', 'e45240d3ef4109b0294e6f132a2cf52321f4ead02.jpeg', '6de760a37f54a1ea6bb7694f7ee2a328f3f4dbb63.jpeg', 0, 24, 69),
(93, '7594d171ed1f275d8fe1e36f8563881e303999ed.jpeg', '4dd99093af491446d5dccc465251493271300cea2.jpeg', '005fe761b3e895ca931994f38838e8233032c4743.jpeg', 1, 23, 69),
(94, '2faa8ba66391fac4917df56b21906bab1743cf90.jpeg', '980e423c725196970cdd676ef6eacfa0f51199922.jpeg', '71ffa16c3138b09eba8c42fce377d7ad30d007843.jpeg', 0, 22, 70),
(95, '98801a654e41cf43529c0ab1cf9070fed2d44099.jpeg', '187994b2dc7448c2f26b839b54f7f1e0fefff4862.jpeg', '81a7fa013f7777f932c5fc32f6f624ba00e75a833.jpeg', 1, 23, 70),
(96, '94b18c17452818c13a174523940540c1f746a98f.jpeg', '2aa17b62b460b05177d9aa4e5ac9a9ec6a39dc162.jpeg', '4d10de8414bdf37e3f9f996d3f13715e0d952a133.jpeg', 1, 21, 70),
(97, 'bf1b9dd076919e53dab38d8660f4a0278ec5ec2f.jpeg', 'bdbfb6a96aa90d624dfcd3851dd734d12f567a732.jpeg', '9ebe41fa8bdc6a7200a1f025221cf13bf1d5fec03.jpeg', 1, 24, 70),
(98, '9aff8d1d53670e9e2dfc90d1692223924de08e93.jpeg', '34296b35fdd3ad8acc3996c995eae75baad6510c2.jpeg', '712ee2169381580a0187cd94ac7b55fc47eb7a713.jpeg', 1, 22, 71),
(99, 'a1e5ab1ddaa8d130727c6e88810b8e0465eda37a.jpeg', 'ace3b1ef73fe17bc24832f5611b1a256295e1ca02.jpeg', 'bd17ded3b5748045ee9788d214f4496339290d023.jpeg', 0, 23, 71),
(100, '70645e2cf4c58f5945c735066793ebca21257f4d.jpeg', 'b14ef4c298ccf8883232622c891dc23394d369672.jpeg', '1957f1376b387b33c29cb6b0951e11cbbaf2d5013.jpeg', 1, 21, 71),
(101, '962a8081124fde79c721edeeafdca1dd9642aeab.jpeg', '83f11226a056336cbb6e807af1b62911fb49eadd2.jpeg', '9dd84a13e32a3d0b6dc3a422a8686480ca1e26fe3.jpeg', 0, 22, 72),
(102, '2af412497a8f4de5de45f947890a15bf78040bc8.jpeg', '56cc47802dde06215506d4efaf0a976cf4fc98072.jpeg', '68a4ad56dbabb771646d777fcf2db6057a81e61b3.jpeg', 1, 23, 72),
(103, '2cc4711f03bf84840791800426de860af8715d5a.jpeg', '7196b44d1cf4b38f6dc2016a2fcfce6dd073ed3c2.jpeg', '7f1a5b5c45f7ef4a6b0191a4c01e56f4aa1944e03.jpeg', 1, 21, 72),
(104, '4e3791ca232459d27e84fe9d600eddcf6b05bbd3.jpeg', '4c4fc4b8b874fde83d268c979bb165110fe354f62.jpeg', '69bc130da2d3a73a636832cf73380a31fdc1429f3.jpeg', 1, 24, 72),
(105, '1920bc87118aa42d1899d613fbf14145721828d5.jpeg', '1729f05dfaf2bec59cc96ecab42aaaf977f7ea522.jpeg', 'a88a447fdbe56fba1a9948667098810a9d4a289c3.jpeg', 0, 21, 73),
(106, '13e94c72aa8dd2b6ec4bbb3f47168a07cd959fad.jpeg', '4d8cd40f03453f05755c4dbabd039f2c2f7e31cc2.jpeg', NULL, 1, 22, 73),
(107, 'c4bfdf0fdff5f37d165ba27b73d1082e3e14c57d.jpeg', '35ee7bde310d30bb5b400290576b12e39ca9ee532.jpeg', '996bfc339fef2f37a584f5e1492c05c37f253bc53.jpeg', 1, 24, 73),
(108, '649db51571e295dd89fcb98932fe6613b79e9f97.jpeg', '560c55842d3fc6ba0e1ca04c4ab5f5670d2fcce92.jpeg', NULL, 1, 23, 73),
(109, 'df27d60a0bff33af570bcdb2c04b15e6dd21f31a.jpeg', '5a0d076315bd2e0a559887ad6de78f074ce8c2ef2.jpeg', '79b93c24aca1868caa6ec8c8b158853b588b1c603.jpeg', 1, 24, 74),
(110, '07ac96cd97907adeb998721d8f0ca4957afc9b00.jpeg', 'c648f2cc5f2c036c7181e36a131064b8dc4022bf2.jpeg', '2f0011fbf09ba4c563e5b2888ea26acb43c8eefc3.jpeg', 1, 21, 74),
(111, '1f9795400e0cfa76080ce75bdc860b5aec8dcd3a.jpeg', '7245d21564bcc056a6a393247783b7a377640a2f2.jpeg', 'f93ed6c862365b95a9039d900ed07688e367772f3.jpeg', 1, 20, 74),
(112, '5bdc40daa30e5c648fbd8f6bb05ee28bf561592c.jpeg', 'de4121b1b66638b772d96830427964edc6e6e2452.jpeg', NULL, 1, 19, 74),
(114, '7f078cb129338f16c25fd21e70fc6381cc5218ac.jpeg', 'bf9bffc515de7f1d83cb84c64688f94c666e22e32.jpeg', '854171accb038eeca1f1df55157dd6887b31e3d73.jpeg', 0, 20, 75),
(115, 'f01c99e82515ef756ff0344ebe2348905e7175ef.jpeg', 'b62a49f4087ad23cbe7161ff712638b56f82ba172.jpeg', 'e9469ea83dfc772579a919224a33cfe4fdcf548d3.jpeg', 1, 19, 75),
(116, '30d8a09b479322c70408d7e79f7d29987cd17c79.jpeg', '32f1a95cbb5ce291934258234631639eca0818542.jpeg', '495972643b4b280b9e45c86881e89e1a38a202893.jpeg', 0, 21, 76),
(117, 'd36a32b58224e644ce6028d9e0fdc55f5d598e24.jpeg', '761b8d6584f92fc60683996f103bde3faec3e11c2.jpeg', '8065b45265bf87bb594f5cbc39802da4116c8bae3.jpeg', 1, 20, 76),
(118, '85fcc5b44b0acd7436fb98edcd6afac56248c934.jpeg', 'c3e5af94ccb0d3c71dea5abbe84471d3c8079a602.jpeg', '836c1021f9e838eca4c63c4ab265c2c0ba1bd0c83.jpeg', 1, 22, 77),
(119, '18854e2e85b61343bf86c4bb5d2254adf9e73c98.jpeg', '65f2f019dae60e3c639a16a0eb544de0ce01f1c82.jpeg', '36a8f1c6b6f2eeaca3695d6e24aa77772b5611043.jpeg', 0, 24, 77),
(120, 'd1fe8f366090030cef6f6b903281ba87a19d83c7.jpeg', 'f1218f468f88765ab634fee731b1c5d162689d062.jpeg', '7b950ff636f61b65d8599e160451b2174d87b80e3.jpeg', 1, 23, 77),
(121, 'c434eab896c520ced6ff8e282bc5d32f2cdb66c2.jpeg', 'e72c719b782c68a0490dde1a3ee9c1263d90ac2d2.jpeg', '240fcc4433120284d1f0ca7168c49c5d18498f113.jpeg', 1, 21, 77),
(122, '55bd7250d4c462ce14fa9ab9dac55910fdedcff4.jpeg', '8cf9c87cac52fd0a59ec006c62c976d5e22258c92.jpeg', 'cf0e953e865a29b7df73cab99ad684404b653d003.jpeg', 0, 22, 78),
(123, 'e3de82df7ac484a50aa6c1b268efe850de5f1b18.jpeg', '67a971faa60c7dbbb7bf6a40d078d43aefcc074f2.jpeg', 'a479cd844ff3c9590b7658e4f1225afc5d317c8d3.jpeg', 1, 23, 78),
(124, '4dc4e9060c1ae26d045821d0f0b9aa95a7a4fc64.jpeg', '2575061008bf9bc6e6e6ce171c312d5c2c140a7b2.jpeg', '63d249fd236443792bebe093037b896329f5565f3.jpeg', 1, 21, 78),
(125, '236e6726119e775e6ff536f4fca2c2868398c6f6.jpeg', '0a691a8b60b8e04f79fec1cb77012b19fc8d8a0b2.jpeg', '26be1b51c81e6e58d263c6d668320cdab72aca203.jpeg', 1, 24, 79),
(126, '621afb6bb068f7f8302b1cca0cd7229eecaa4786.jpeg', '997c49c5842579401ab1abe2638f4ffce31995ca2.jpeg', 'feace4b8ca9ac9b71e5683c2641ed525161e11473.jpeg', 0, 23, 79),
(127, '9300c3d9c23f4ce9d4e0b35c119970027a9d7656.jpeg', '8e14eaffccdfb6490fa22b54222fd2b80298f69a2.jpeg', '1be5e916c37b37b5287546368c2e0709c27cea723.jpeg', 1, 21, 79),
(131, '5bf16f10ec9f8797852d70d130a5c080ac4e59e4.jpeg', '03be63072fa1aba27d5f07d6196dd9f15556add52.jpeg', 'f029a248595723e2cf2f4d216379132b941cb26f3.jpeg', 1, 23, 82),
(132, 'e2dd4e762493f6c32677a8dc9325eddbd2f75999.jpeg', '329034e587c28f08489c55de0dc900505d977c872.jpeg', 'e7e87a2dd7ed11e435ebab5aa5fe125dfb9407b23.jpeg', 1, 22, 82),
(133, '5330aec9428b33978c5336485272fe7074727862.jpeg', '790765c041f85b4491e35f378ebfd167db73a2312.jpeg', '732e3192b84ccd8783fd64206d1370b2f52df6523.jpeg', 1, 20, 82),
(137, '3430e62ec5e51ffdec15cc0a544b7da38b0681d2.jpeg', '218697b52bad7ec733514180109ccb363564b2512.jpeg', '1478d6b79d6b3b4d4c0fb8be799d91463b4496423.jpeg', 1, 19, 83),
(138, '2ae6d37f4d40e84597806eb070342f2bb234c395.jpeg', '79c480f03aa532683b7db157ee134d413381826e2.jpeg', '1b21eb8e9dd0b39dc839b11b286ffc9448084bd03.jpeg', 1, 23, 83),
(139, 'f5dc15dbefa4fb176c5136e616259a5c9e80e214.jpeg', 'c5b8680dd2fe1fbfc10c771ae78f74295f8738382.jpeg', 'd261fa2efb2d05e86a7ed996d6853b64c15bd2dc3.jpeg', 0, 20, 83),
(140, '68f928c01412dd7e95fed36aab449ad8063e1437.jpeg', '33bc6177890ab87c709e057e6f9ca1cb6724afb52.jpeg', '74ccffac0579d08b6f61babd5459f1745f1ddc393.jpeg', 1, 22, 83),
(144, 'afd04653427b6c8418fea7df4bcc1eeabbbac2a5.jpeg', '6c6a3fcdc17a4874145fc9969fb816a97f5d3f772.jpeg', '04b430b7d61d3a3cd883a3d7bc82ce07cbcd2db73.jpeg', 1, 19, 84),
(145, '411a3ee81e3de49023bbc25b8d130a7602d535a5.jpeg', 'e609b784c9b1e91ed3f7f1a255ae65d70bc4a2a82.jpeg', '0c9ff3bffc0fbf0d3d698cf2c8700177e70584633.jpeg', 1, 21, 84),
(146, '7c8ece718518b158f389284250decb0a568556d5.jpeg', '5c9683cb1d94c646fab13322ffda510512182e742.jpeg', '11173a686ad734a34e529a474d5e5811bbb0350f3.jpeg', 1, 22, 84),
(148, 'a198728144229a8a2a055ef478622251c27b2d33.jpeg', 'fbb8f00168bf568e63d553e9c4836015932799c92.jpeg', 'fe2ce8f5e29f10adfd2152ea0ebdedc736402b603.jpeg', 1, 20, 84),
(149, 'c5faff94aa1ddafedf70cf6dc0ed8b1ca6742cee.jpeg', '5c9425b920efeebe8bc04302dfc6b2f31644287d2.jpeg', 'dcfe416925d26cbe60df87a1f8932eb43822e01a3.jpeg', 1, 24, 85),
(151, '82efe92e76e109f54bb832b9846bed5fbdf65e7e.jpeg', 'f520cb8ad1e87a7c0e0a54252c4104bc64294d292.jpeg', 'eaaec728bfd25654e23419b3e5792cbe887e1a0c3.jpeg', 1, 24, 86),
(152, '151d4c28adbb53103ecfae70a357672f1ff1b1eb.jpeg', '5b0b91fd520d91c272062cb7e40330ffd87dc5672.jpeg', 'd83aede151d2440c1d7292d1e4abcb24b3e0994c3.jpeg', 1, 22, 86),
(153, '01a392fd1d77c955e8ff36690dd26f0bb1577ce1.jpeg', '5c762b558157eccb67573187aa7ee0cb77e26c942.jpeg', '3b1c3e15567122e0766feb887a69241e5b954bee3.jpeg', 0, 21, 86),
(154, '827e2ba2c477585e27cf94bb3bffe29bd6ebe8c8.jpeg', 'd27b5ec456e4658912a0d367151b9fe108d27db22.jpeg', 'f530ab50ffabaeec9b4408738e1b369b831fd1e43.jpeg', 1, 21, 87),
(155, 'd543539ecb8b017cbef80ecc3cbafe494362cdff.jpeg', '80a40585b3accc6241c09d31a95b67ccb7365b292.jpeg', 'e596db80e43ab82c18e0c58067f75209c23914603.jpeg', 0, 22, 87),
(156, 'a495bbb5be645e7899677708208102e5fb6c670d.jpeg', '60fad76d3b3c3b0d5b3b41b6a1ef39220781c97b2.jpeg', '4cf878ac6125e6d48772c70fc87216bf3f0de7c03.jpeg', 1, 24, 87),
(157, '30d2611eb81a71f4a47ae9f3a977b86ea45753ba.jpeg', '02dc1ac223670d6384cab66a27fb49c283668c4c2.jpeg', '8283a736e1df35eb185739a15b8371d5082ec92d3.jpeg', 0, 22, 88),
(159, '8e15f2b192f640326ebc7b09243757c03cde9367.jpeg', '58a8ac433fd6dae28ec8b1b0c3f03fd09ccefc0a2.jpeg', 'c3db41708edf9cb13fc1bcf05dd4cd4971b8b0e43.jpeg', 1, 23, 88),
(160, '40e94b0720cc1dddd319eaf2f99bcae7c4ed24ae.jpeg', 'f54ee435270c0808051cf3b34cb9b5841e2349862.jpeg', NULL, 1, 19, 89),
(161, '51c5c3d65d5c1934209d252b27e32102af50d578.jpeg', 'a0ad214df66b141d3a5b2c01affa514d15d106b32.jpeg', '21f590e75c5809c3c66ff33830ff740f74c677f73.jpeg', 0, 20, 89),
(163, '1d89ff27660b95b4a4978ce776bbf38b08bad162.jpeg', '2d331e987b48e8f3981c2c09b1c2d53747853ccf2.jpeg', 'fd6ab66c4800c5b5d5c5486d87444ad958210e203.jpeg', 1, 22, 89),
(165, 'e0c29c7881b45c985b99ac6055fc7febf112c3dd.jpeg', '91ea4c955e0f189b3a3116817049e0905da16fa82.jpeg', 'c68974061d141c3b40d5eeb7c8a4f1137071dbd33.jpeg', 1, 22, 90),
(166, '9cdc8623805b30b962aaecb9d69f75e8e10b60c1.jpeg', '4d3b34849e8961b7782e2215d93dcd35e094c4a52.jpeg', 'dc00a3e5d1a63059ccb9091cb3cf803bf419c84e3.jpeg', 0, 21, 91),
(167, '03a482926ac69ce5bb38249bbf0970590bc03152.jpeg', '8c0f1ec1b043a67ab7fcfcd1f63fac06cc2e78d72.jpeg', '742452c143e62f8e26cb3d3452853f81b4a799543.jpeg', 1, 22, 91),
(168, '5f3b95e67c232b9a4a3384755fc6572a8ab0605b.jpeg', '27510c236e72ded55f1fbaadf85a883f335ea4d92.jpeg', 'dab398932517f17d238faf7a852eeeb50f6a2dae3.jpeg', 0, 21, 92),
(169, '713eac36bf7af7a4f3c61b511a3fa017135e43ae.jpeg', 'ea6d975ae1fb9b5cbc447b4b4a8c3e0c4242a5392.jpeg', NULL, 1, 20, 92),
(170, 'ea9fbe6105f04fbce651adf07334bb9598f8607f.jpeg', '048bfb44439d1f4a5c50b1cb4aee1324d2320e0e2.jpeg', 'a5448e5dbf542f5ed6b094f3be07beab58f66f223.jpeg', 1, 22, 92),
(172, 'f7075cec83abc2ecf56420e763165f730a18fa2b.jpeg', 'bc9b689d42738edd2005327fd507079093b095c62.jpeg', '8f9c853fde814af5015ff02fb6a84851bc7d5dbc3.jpeg', 1, 22, 99),
(173, 'c46b173b857e2d7e6b6043de3302df247dd60fef.jpeg', '33e8de8ec5d33bd2a99f83b5fa33d7878c6cce9a2.jpeg', 'b73ae2719dc929e45d6c1da4a66a5e1a9b3e3d823.jpeg', 0, 21, 100),
(174, 'd146a51aea4201e19c99a5a2d5501469213d1cc4.jpeg', 'a05c496274ba9b643c43c2a0069f0bd2e9e70ff82.jpeg', '01f30915c127198c8e4e5e5b5caf12fef0d46d163.jpeg', 0, 21, 101),
(175, '9fc7eee11b3f81bf72eea86943386f83c87dd6f3.jpeg', '96188ed9f2a2d5638923f8b274e71c1c9539ee422.jpeg', 'd456b1782ab5fd97e256653cd9b64ce023cab2153.jpeg', 0, 22, 102),
(177, '4236bb718b1f90aaff201057168a4cf9ad3a9698.jpeg', 'cee55b557feb16f7a5373205822784b37436959f2.jpeg', 'b2666bbefbd93025d2301cfd4160b20c79594da73.jpeg', 1, 22, 103),
(179, '9e6f1fdd3a9e7cf7186c16881911b1066c6b4ba8.jpeg', 'a2768cae15143fdbc6ecfebff73d8dd5bbed21192.jpeg', 'd062d7e89e326c15d67822a7b6924936dfa384993.jpeg', 0, 22, 104),
(180, '5ee1b694da4e6d857294c3b4824f1f067237cb10.jpeg', '6ed8848c8ab564b816792c83fb7cafd762146c9a2.jpeg', 'f994ffa1966375c05dcc75239a8b2ca37de0b0183.jpeg', 1, 22, 105),
(181, 'd6a4b8e3138906fb6d1df1b0dd9037fde08216e6.jpeg', 'c9b40c9064670fff29637c1e907883b2edb714492.jpeg', '07099d860cf5f8290ed678820c0aa20773b650853.jpeg', 1, 23, 105),
(182, 'a9869bd7fe468a02719f63d5e9ca018d16a85304.jpeg', '0d36d9223c0614c35626bb60b0641a65d95ff0572.jpeg', '46b57cb24e488a767c0f329c4dedcc3afe937feb3.jpeg', 0, 21, 105),
(183, 'b6bde8be37b21034573627ccf8df89bddfe100fc.jpeg', '1b8a49e063bf0575b88ede55f376cf844e1f0f322.jpeg', '9bf90c6a1578e56541f6c7630108126f907cbecd3.jpeg', 1, 24, 105),
(184, '3ee8c7946a65873b5f6830161d8eac40cf19385e.jpeg', '70a20cd2d4808ef0add7eb49a78374f8c7269b082.jpeg', '6149c10aecbce6de9fd00b8c167489eb8a606d233.jpeg', 1, 22, 106),
(185, '41a72b5b35069ecbd0f76db9ff8fda9aa8134eec.jpeg', 'c7d658fec33e1a3da46aefe3748d0b2c0e0c99c02.jpeg', '061fd4927c4c103144f59e9207008e570f0d2d243.jpeg', 1, 23, 106),
(186, 'a909841fb0942c0c54f3b80fb5a2761168f41f18.jpeg', '406b47ae4646023b395d15db0411818b098335e12.jpeg', '67014cfef3c126109d8e008b30082a864dee27783.jpeg', 1, 21, 106),
(187, 'cbb0c7f31365ee2d33d3c474f826361ed741e42b.jpeg', '9fad13c7a59959f14c8f31cb8baeb83d83e20cb72.jpeg', 'a783aa3d2039427ed70fb57d0ba29b0bf51bd6973.jpeg', 0, 24, 106),
(188, 'a25350652ed633f88a718bcfcf14a8db7b401c77.jpeg', '05840090370937c48fe04ef51e97db3e9990c2e82.jpeg', 'dd11662afd5b0f12378d5723f1bdb585b9e8ef9d3.jpeg', 0, 22, 107),
(189, 'fc9d4fb76482fe6c43f63cf584f763238916d975.jpeg', 'e6372d9979bb4317cf41d9b7a328f89c11a2d07f2.jpeg', 'ca085772b18848d73f9d95ea8a1494bbdbd63e653.jpeg', 1, 21, 108),
(190, 'e9d26f6908dedd159856437ebf61ffa9862f1f48.jpeg', 'cd7a024ad1c773b0473838e5f18d8e0b6f18a8a82.jpeg', 'ae41fabe5174443f908af57c867a3691a8401fe43.jpeg', 0, 24, 108),
(191, 'e08e248e286c72eb4e347e4ca3ba33cde8d59595.jpeg', 'dde4f39cebf90f1fc00f40ff6f66208790dcea782.jpeg', '6610a708480a79d6e96b3e18d91db22a693dfa863.jpeg', 1, 22, 108),
(192, 'c7ba50564b4e81e6b58a38c5ef831e1843728cab.jpeg', 'a73cf391c19fe50ee6757b1d176bcc9fc9fa2d372.jpeg', 'eae43e1c35a7e42c4438b50b03555e1ce19101783.jpeg', 0, 22, 109),
(193, 'f3947b53960347a583d13c50a53c858331b978ae.jpeg', 'cd95b00b7f098066b3689ae034b02461ba62826b2.jpeg', 'aa118f2892a64cd463b611ee9d4f2723f06639903.jpeg', 1, 24, 110),
(194, 'a0c1652b054e19a247b2b6b6b2e5f8c918891b4c.jpeg', '2d4dc800d0ea40fd1db83f44c6828530a41717392.jpeg', '8b1c8db8e148658b566f38333fc977efb318848c3.jpeg', 1, 22, 110),
(195, '2645e2053d6d5ca897f9c434802c309f14b748d2.jpeg', '7c91370bbd9c4bcf298dbecd5e60b7f86009709a2.jpeg', '2226a8c0179198021d25c2c4bcea8c91ca9969423.jpeg', 0, 23, 110),
(196, 'b70ec8bbfcec9d55a9990917f901dac87f59666e.jpeg', '28a9d4ec3e23412f7c8978cabe22698783c8eac42.jpeg', '11c8537e568b071f313c3e3e93b38c8ec81d59a13.jpeg', 1, 21, 110),
(197, '9187114c3d902a7cd1910c925adb51f19e4124ef.jpeg', 'e8e65477edd6a2c10c50b5f2feabfe448a50acca2.jpeg', 'b2a49c5d7389b4dd2100a854656e3ac447df4e533.jpeg', 1, 22, 111),
(198, '2d730ab229501908eb1cf99659702f7756cf0dfd.jpeg', '590e9799fbca82751f7ebf5ee7678b5c688cc8bb2.jpeg', '2c2a57a913dca8215f64e27918a121572965952f3.jpeg', 0, 24, 111),
(199, '4d6b9ee07fd704c6e76bc6b6e5a6222e9f5ad4f3.jpeg', '710d7f41160f937dc2eb1d8ce507b81d070ebfb52.jpeg', '4bdf5d4a3a8930ccad63f9b7963f49965ae3ad013.jpeg', 1, 23, 111),
(200, 'b7503f91b4f1c6520839a59777359dff919205f2.jpeg', '11ca8e188de6dbd40f18f3d42a5dd46c02f0a86a2.jpeg', '93b3edf30f8caf7df07cc1dc81294179b0ac9f173.jpeg', 0, 22, 112),
(201, 'ed5270ef31e629280467b32fbc721b8fc48a2ceb.jpeg', 'a0fcbe45fee18f303ef505e16a032b4ce9fe3b202.jpeg', '465927b4b4446d5293a0f0371cf8ee76cf22d0093.jpeg', 1, 24, 112),
(202, 'ead0029516dcc720334127807ea8b6c11939f282.jpeg', '59f594d813fbe410c5de7bc09060d6e5ccdb92c72.jpeg', '0771eb4b6553b35bf28c1771726f8be40c766c4c3.jpeg', 0, 21, 113),
(203, '26b34e1c421844be34fd6effc223e446770aa5b2.jpeg', '885d1c16e72652784ddd6d675858bbbce448fa7e2.jpeg', '118d2e6ad4a1d7ce02c2443fe09f4891a83696093.jpeg', 1, 23, 113),
(205, 'c2a892be6e8419b27a38153ecdaeb1cc53633084.jpeg', '825c4d554a8448438db3d9cf9575408ce217fa3e2.jpeg', '0a4eec1d615682cd98b1f6f3a38bd9edbd6402233.jpeg', 1, 22, 113),
(206, '8c08f3600e52d815dd6f5a315d2711066c1c1231.jpeg', '6d40a9e04716f2e12a0b02090f51856e7789713e2.jpeg', 'e3774656306662c64f9b00dbead861c26e0d3d2b3.jpeg', 1, 21, 114),
(207, '18c4ce8b8e7b1a914ca75dc928327b09210d6c39.jpeg', '302a74f93836e1b616d8bc817abd0e1bd32615b02.jpeg', '1561de04a2c2d908f22eedd88184efec3a59cc003.jpeg', 0, 22, 114),
(210, '526e02e85f3dffcd6a82e49ec454f6c81f979158.jpeg', '32ae8e55539bae1e3d422c100931f8f8314d92c32.jpeg', 'f173f727b2c6c1680c9e00d0af2a2f51414c491b3.jpeg', 1, 21, 115),
(211, 'b2c2e7cc711925ffd32d9c9391abcf4207e685b5.jpeg', '19b599090c8da81c8d1229e14dba8dd0d2264a702.jpeg', '805e88959a3ca96ee5d4565df868e37fcee5bda23.jpeg', 1, 22, 115),
(215, 'd0e68e7c12e7e8a3e93d6257122a4a2f8eb2ddb9.jpeg', '16c31a605ec7e8680e4c91635e0cc6ae0bd89f602.jpeg', '48350017b8be58624e3c91f028d55c169e6d622a3.jpeg', 1, 20, 115),
(217, 'c122429794eba7756923c73df0729ca3283f43a4.jpeg', '63307e3a9655e024a54e9b1ac125f0e625ea93e02.jpeg', '9bf1ef97ae1fa3bac27f698d81dad51a6aa6fd723.jpeg', 0, 19, 115),
(226, 'c0d25415a535c7046d97b7f6ede8bec244bf413b.jpeg', '3ad50e43cffeb7f96e49ed95fba54803a6b7d9a02.jpeg', '54396b576b9c4a7e841037086ed1bfeab62547d33.jpeg', 0, 20, 121),
(227, 'e12d8274729ff60316eff36e04a0c4d5fb1d6c2f.jpeg', '6fbfcd059ab5ee6ef9f73267cf85bb199b5df2582.jpeg', '9e16b8d164f8f18635d320c2d39026993a634d423.jpeg', 1, 21, 121),
(229, '1848f218e03953ffcc066ea2b2d5cfdbf1e6ac15.jpeg', '990590f7dae06d0effcb93e3c8127bb30f5aa50d2.jpeg', '8877a375fea44ba96879479deeb1f31df9f0447e3.jpeg', 0, 21, 119),
(230, 'f942281ca2079fda5158e09e11efe566950a400e.jpeg', 'b72588253c4177c76126b2f85b3600a5b6c62b482.jpeg', '13fa736f3b38b89131b6badcb65a2b66fb40be1c3.jpeg', 1, 20, 119),
(231, '6a7b9170447930b0747c6ece42104c0b16f6250c.jpeg', '5d84f7b26e19d5fd7bdd506259a09ed1676d6db52.jpeg', 'ae299a14bced2f2c816f15506b01a70c38e34bb13.jpeg', 1, 24, 120),
(232, '441501b5e942dc786f6cb13c0fe0cad7cdc61a93.jpeg', 'a8e9d3f64545bb79e412cedb89e44c853afa4b492.jpeg', '67c862d0c94797e21fdc8e7765574b1377fbc95d3.jpeg', 1, 20, 120),
(238, '4a7e5c57a71afd43f95c5fbe86829729efced55b.jpeg', '3c8f9b678644a226a25c3291314abf3aab996b412.jpeg', '7095f32151363158fab6f5eba57dd7ef02ae1efa3.jpeg', 1, 22, 125),
(239, '58b4846e3fd8784ff68aa8edb2501b06deca801f.jpeg', 'e787b267b7ad3ec6c6876eebf95bf2a2ae5dcf712.jpeg', '94a8fcd3892f41b0f004f128ede432e1620d9bdb3.jpeg', 0, 24, 125),
(240, '7d055c8b889304c0b963fa1826100b8cee89e6b6.jpeg', '1be7246212db6948e8192f879dce1cbaa0ff99e42.jpeg', '5803f579adc28dd52305379fe15c390ccfa9d67f3.jpeg', 1, 23, 125),
(241, 'd14093cc4e2ce66a41572a0750089d0d08ab524f.jpeg', 'd8e90e4cbd2bf3519585c3265938ec9f506facca2.jpeg', '84d244953d70c6a09233a7c455406fdfb4b8de8c3.jpeg', 1, 24, 126),
(243, 'e56c733533077db4218d6d5c50c6f6d7a240b21a.jpeg', '686531bc58166db9d41c193b01cf8c504f87f96e2.jpeg', '4b8eeefb138ba03b3c9c2177d88285b8cf0b25a03.jpeg', 0, 22, 124),
(244, '2a3d686d99a797fe4527963a58cd2a4ec251ab42.jpeg', '4860502cad10a2b1477cb63275b4745a0a2a9f712.jpeg', 'eeb5a348eaacc6103996af8cb6edb0e67c72465a3.jpeg', 1, 24, 124),
(245, '8c352e09db69fa59ad7c3eecd4981b51443a96b0.jpeg', 'b34f401aac03269ceb7130b75e8a91f68a7f4ee52.jpeg', '92ef29acde1fd67f9dbf8634d800e59e88a11b3b3.jpeg', 1, 21, 124),
(247, '3bedc1312de90b12634676e4d05b55d3190dd3df.jpeg', 'b3479a916ad6285e01966a3eea98cd15c2a893d62.jpeg', '0dc67163a8f2610369dd002e14323e279638f41c3.jpeg', 0, 21, 123),
(248, '8bd8f665fafa731b52c517519c686af6f6da2cb8.jpeg', '7f0c4436e474af8c62ae73fd3df647715c8c8b572.jpeg', 'f1aa037abe1cd9a800e1a5f7c7dad15d72d16c673.jpeg', 0, 23, 126),
(249, 'efa3bba0a46eb2b9139e9ea0701d032f8d270a5e.jpeg', '68a6b076bbb69af092018a7b2d1cd1f39db46dd42.jpeg', '11be095c3a9a6d84ec190b22761afef5b7ec366d3.jpeg', 1, 23, 127),
(251, '04eb71d0c02f2bfddb670943269b093f5ef8a1b1.jpeg', '62eb0a9a53e69cefb42cd414241ee395ad00afb12.jpeg', '6954cce5bd8005bda983d4fc2239f4e78958c7783.jpeg', 0, 20, 127),
(252, 'fa1c5c218522f89952807ae14b9d4347b8aa6bff.jpeg', '47881a054471e2a86f2ffc8f699962afdaf73bb62.jpeg', 'eb8f9884e133dc4bde02b0c250e94ddb0ba7083f3.jpeg', 1, 19, 128),
(253, '0f5859166714a9f3edebf0dd450b96bc8b99222e.jpeg', 'b5f8007785025e2695615b21138a493e24cb55ae2.jpeg', 'fea9f8368ace35673704b6317467c36ffafe29093.jpeg', 1, 22, 128),
(256, '488405edf057489636273e66d9a87127b608c2d7.jpeg', 'a9d5b2a2a659235c7c1bb035ef487425925d30f92.jpeg', '62b3328296230632232dff95bff9370f5ed9609e3.jpeg', 0, 20, 128),
(258, '14eef52b15743d6a52c21fee754c5a9e1a80ed2d.jpeg', 'b46c05359247c9192a95dbe3e0b02252562e8d7d2.jpeg', '0738adb53571131c176fac7ada33e236190ebef63.jpeg', 1, 20, 129),
(259, 'fbf45d7669648e1a09a56fdda0642066b5f092c8.jpeg', '93cd046d8c03a53970d38d181f33f38668fe46922.jpeg', 'bec67b556989932ced8e144ab0f50d7b357dde923.jpeg', 0, 22, 129),
(264, 'b69128e3aa41d452731b1e8747d16a03faddb179.jpeg', '1b922aff947d3d598dc8743462fdc2f08d0649cb2.jpeg', 'f06cea5ef59484f1fc3918474640cf08bb6d34613.jpeg', 0, 21, 133),
(265, '555ea28585bd5f4fb27bd31b6f24f517edb86273.jpeg', '783ee1c3751beebae76839caf76a1dd044d6c4682.jpeg', '1368ee4ae439d24b46a51d6d5e265ae9e6aa4d303.jpeg', 0, 19, 135),
(266, '69506b388633661277e5738a0ed263fa9ee3f0cb.jpeg', NULL, NULL, 0, 19, 136);

-- --------------------------------------------------------

--
-- Table structure for table `mesures`
--

DROP TABLE IF EXISTS `mesures`;
CREATE TABLE IF NOT EXISTS `mesures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int(11) DEFAULT NULL,
  `titulaire` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `poitrine` double DEFAULT NULL,
  `taille` double DEFAULT NULL,
  `bassin` double DEFAULT NULL,
  `epaules` double DEFAULT NULL,
  `seins` double DEFAULT NULL,
  `epauletaille` double DEFAULT NULL,
  `longueur` double DEFAULT NULL,
  `genre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `taille_dos` double DEFAULT NULL,
  `taille_devant` double DEFAULT NULL,
  `hauteur_poitrine` double DEFAULT NULL,
  `demi_ecart_poitrine` double DEFAULT NULL,
  `tour_petites_hanches` double DEFAULT NULL,
  `tour_grandes_hanches` double DEFAULT NULL,
  `demi_tour_encolure` double DEFAULT NULL,
  `demi_carrure_dos` double DEFAULT NULL,
  `demi_carrure_devant` double DEFAULT NULL,
  `longueur_epaule` double DEFAULT NULL,
  `tour_emmanchure` double DEFAULT NULL,
  `hauteur_dessous_bras` double DEFAULT NULL,
  `longueur_bras` double DEFAULT NULL,
  `grosseur_bras` double DEFAULT NULL,
  `hauteur_coude` double DEFAULT NULL,
  `tour_poignet` double DEFAULT NULL,
  `hauteur_taille_hanche` double DEFAULT NULL,
  `hauteur_montant` double DEFAULT NULL,
  `enfourchure` double DEFAULT NULL,
  `hauteur_taille_genou` double DEFAULT NULL,
  `hauteur_taille_terre` double DEFAULT NULL,
  `hauteur_taille_cote_terre` double DEFAULT NULL,
  `tour_poitrine_homme` double DEFAULT NULL,
  `tour_ceinture_homme` double DEFAULT NULL,
  `tour_bassin_homme` double DEFAULT NULL,
  `longueur_taille_dos_homme` double DEFAULT NULL,
  `longueur_taille_devant_homme` double DEFAULT NULL,
  `longueur_taille_devant7_homme` double DEFAULT NULL,
  `tour_encolure_homme` double DEFAULT NULL,
  `tour_tete_homme` double DEFAULT NULL,
  `hauteur_tete_homme` double DEFAULT NULL,
  `carrure_dos_homme` double DEFAULT NULL,
  `carrure_devant_homme` double DEFAULT NULL,
  `longueur_epaule_homme` double DEFAULT NULL,
  `longueur_bras_homme` double DEFAULT NULL,
  `tour_poignet_homme` double DEFAULT NULL,
  `hauteur_corps_homme` double DEFAULT NULL,
  `hauteur_taille_terre_homme` double DEFAULT NULL,
  `hauteur_taille_bassin_homme` double DEFAULT NULL,
  `hauteur_montant_homme` double DEFAULT NULL,
  `enfourchure_homme` double DEFAULT NULL,
  `hauteur_taille_genou_homme` double DEFAULT NULL,
  `longueur_entrejambe_homme` double DEFAULT NULL,
  `tour_cuisse_homme` double DEFAULT NULL,
  `tour_mollet_homme` double DEFAULT NULL,
  `tour_jarret_homme` double DEFAULT NULL,
  `longueur_taille_dos_enfant` double DEFAULT NULL,
  `longueur_taille_devant_enfant` double DEFAULT NULL,
  `tour_poitrine_enfant` double DEFAULT NULL,
  `tour_taille_enfant` double DEFAULT NULL,
  `tour_hanches_enfant` double DEFAULT NULL,
  `tour_encolure_enfant` double DEFAULT NULL,
  `longueur_epaule_enfant` double DEFAULT NULL,
  `carrure_dos_enfant` double DEFAULT NULL,
  `carrure_devant_enfant` double DEFAULT NULL,
  `longueur_bras_enfant` double DEFAULT NULL,
  `grosseur_bras_enfant` double DEFAULT NULL,
  `longueur_coude_enfant` double DEFAULT NULL,
  `tour_poignet_enfant` double DEFAULT NULL,
  `hauteur_taille_hanches_enfant` double DEFAULT NULL,
  `hauteur_montant_enfant` double DEFAULT NULL,
  `hauteur_taille_genou_enfant` double DEFAULT NULL,
  `tour_genou_enfant` double DEFAULT NULL,
  `hauteur_entrejambe_enfant` double DEFAULT NULL,
  `hauteur_taille_cote_terre_enfant` double DEFAULT NULL,
  `largeur_bas_pantalon_enfant` double DEFAULT NULL,
  `hauteur_tete7_enfant` double DEFAULT NULL,
  `perimetre_cranien_enfant` double DEFAULT NULL,
  `tour_visage_enfant` double DEFAULT NULL,
  `ecart_poitrine_enfant` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4B54A559FB88E14F` (`utilisateur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

DROP TABLE IF EXISTS `newsletters`;
CREATE TABLE IF NOT EXISTS `newsletters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `date`) VALUES
(2, 'contact@kountac.fr', '2018-09-22'),
(3, 'kengne.rosalie@yahoo.fr', '2018-12-21'),
(4, 'kengne.rosalie@yahoo.fr', '2019-01-16'),
(5, 'kengne.rosalie@yahoo.fr', '2019-01-16'),
(6, 'kengne.rosalie@yahoo.fr', '2019-01-17'),
(7, 'kengne.rosalie@yahoo.fr', '2019-01-18'),
(8, 'kengne.rosalie@yahoo.fr', '2019-01-20'),
(9, 'kengne.rosalie@yahoo.fr', '2019-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lien` varchar(100) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `categorie` varchar(100) NOT NULL,
  `contenu` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `lien`, `titre`, `type`, `categorie`, `contenu`) VALUES
(1, 'l\'histoire-de-kountac', 'L\'histoire de Kountac', 'Liens', 'Information', '<h1><span style=\"color:#d35400\"><span style=\"font-size:26px\">Kountac, &quot;The new made in Africa&quot;</span></span></h1>\r\n\r\n<p><span style=\"font-size:12px\">Kountac, la plateforme du 100% fabriqu&eacute; en Afrique.</span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\">Kountac est le fruit du travail et de la passion d&rsquo;une jeune camerounaise install&eacute;e en France depuis quelques ann&eacute;es. Toute petite, elle r&ecirc;vait d&rsquo;&ecirc;tre styliste et d&rsquo;habiller chaque personne selon le style qui lui &eacute;tait propre, &agrave; partir de ses quatre s&oelig;urs et quatre fr&egrave;res. </span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\">Elle a ensuite v&eacute;cu la n&eacute;cessit&eacute; d&rsquo;avoir une identit&eacute; &laquo;&nbsp;africaine&nbsp;&raquo; dans le Pays dans lequel elle a fini des brillantes &eacute;tudes commenc&eacute;es au Cameroun, ce qu&rsquo;elle compare &agrave; une forme d&rsquo;&laquo;&nbsp;entrave moderne&nbsp;&raquo;. Cette identit&eacute; &eacute;tait fictive, artificielle, puisque son parcours, le parcours de nombre des jeunes aujourd&rsquo;hui, est un parcours multilingues, multicultures et nomade sur la Terre. Il reste, &agrave; chacun de nous, nos racines<a href=\"#_ftn1\" name=\"_ftnref1\" title=\"\"><span style=\"font-size:12.0pt\"><span style=\"font-family:Calibri\">[1]</span></span></a> pour nous d&eacute;finir une identit&eacute; propre. </span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\">Kountac se veut le porte-parole des africains qui, de force ou de gr&eacute;, ont subi les influences, les sollicitations, les signaux de partout dans le monde et qui en sortent grandis.</span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\">Ainsi, Kountac met en avant tous les cr&eacute;ateurs qui revendiquent leurs origines africaines mais qui ne se refusent pas &agrave; embrasser des id&eacute;es, des suggestions, des styles, textures, couleurs venus d&rsquo;ailleurs. </span></span></p>\r\n\r\n<div>&nbsp;\r\n<hr />\r\n<div id=\"ftn1\">\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><a href=\"#_ftnref1\" name=\"_ftn1\" title=\"\"><span style=\"font-size:12.0pt\"><span style=\"font-family:Calibri\">[1]</span></span></a> Si vous voulez conna&icirc;tre l&rsquo;origine du nom de l&rsquo;entreprise, vous &ecirc;tes cordialement invit&eacute;s &agrave; visionner une s&eacute;rie t&eacute;l&eacute;vis&eacute;e sortie en 1977&nbsp;!</span></span></p>\r\n</div>\r\n</div>\r\n\r\n<p><span style=\"font-size:12px\"><img alt=\"\" src=\" 	  /uploadProduits/28aac370d2f7231b8bd113d59c58bec6.jpeg \" /></span></p>\r\n\r\n<p><span style=\"font-size:12px\">D&eacute;couvrez notre site de vente en ligne.</span></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<caption><span style=\"background-color:#2c3e50\">Les formules pour les marques</span></caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>Formule 1</td>\r\n			<td>Ouvrir sa boutique en ligne et ajouter tous les produits de notre choix</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><img alt=\"cool\" src=\"https://www.kountac.fr/ckeditor/plugins/smiley/images/shades_smile.png\" style=\"height:23px; width:23px\" title=\"cool\" /></p>\r\n\r\n<p><img alt=\"Photo d\'un oiseau / problème d\'affichage\" src=\"C:\\Users\\Ornella DJOUKUI\\Pictures\\oiseau1.jfif\" style=\"float:left\" /></p>'),
(2, 'visite-guidée-chez-kountac', 'Visite guidée chez Kountac', 'Texte', 'Information', '<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\">VISITE GUID&Eacute;E CHEZ KOUNTAC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\">Chez Kountac, tout est pens&eacute; pour simplifier la visite des clients et la rendre le plus agr&eacute;able et compl&egrave;te possible, car nous tenions &agrave; d&eacute;velopper une plateforme pour toutes et tous, pas seulement au niveau des tailles et des mod&egrave;les propos&eacute;s, mais aussi au niveau de la visualisation des produits.</span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\">Ainsi, chaque mod&egrave;le est port&eacute; par plusieurs mannequins tr&egrave;s diff&eacute;rents entre eux. Les filtres sont aussi con&ccedil;us pour affiner l&rsquo;affichage autant possible&nbsp;: les clients peuvent ainsi choisir une gamme de prix, de couleurs, de cat&eacute;gorie de v&ecirc;tements mais aussi de mannequins qui les pr&eacute;sentent. Les mannequins sont s&eacute;lectionn&eacute;.e.s en fonction de leurs morphologie, &acirc;ge et pr&eacute;sence physique aussi diverses que possible, toujours dans le but que le choix des clients se fasse le plus possible en connaissance de cause.</span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\">Chez Kountac, pas de pi&egrave;ge&nbsp;: les prix sont pens&eacute;s en fonction de leur co&ucirc;t r&eacute;el et des frais dus &agrave; l&rsquo;importation et au transport, ils sont ronds et n&rsquo;essaient pas d&rsquo;amadouer les clients en enlevant un centime pour faire &laquo;&nbsp;moins cher&nbsp;&raquo;. </span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\">Chez Kountac, pas de &laquo;&nbsp;soldes&nbsp;&raquo; non plus, puisque les marges sont calcul&eacute;es au plus juste.</span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\">Les prototypes (les mod&egrave;les qui ont servi &agrave; finaliser les produits commercialis&eacute;s mais qui n&rsquo;existent qu&rsquo;en peu de tailles) sont d&eacute;stock&eacute;s &agrave; des prix tr&egrave;s inf&eacute;rieurs &agrave; ceux des produits finaux.</span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\">Chez Kountac, la vision africaine de la mode va jusqu&rsquo;&agrave; imaginer que beaucoup de mod&egrave;les vendus en pr&ecirc;t-&agrave;-porter peuvent aussi &ecirc;tre faits sur mesure. Evidemment, le prix ne sera pas le m&ecirc;me qu&rsquo;en pr&ecirc;t-&agrave;-porter, mais il est aussi calcul&eacute; au plus juste.</span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\">Une fois que le client a fait son choix, la d&eacute;marche pour le paiement en ligne est tr&egrave;s simple et s&eacute;curis&eacute;e&nbsp;; tous les types de carte bancaire sont autoris&eacute;es.</span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\">Chez Kountac, nous n&eacute;gocions les prix de livraison au jour le jour&nbsp;; c&rsquo;est ainsi que nous pouvons contenir ces prix dans certaines conditions&nbsp;: ainsi, la livraison est gratuite pour le client si elle a lieu dans un point relais&nbsp;; un suppl&eacute;ment est demand&eacute; dans le cas d&rsquo;une livraison &agrave; domicile ou sur le lieu de travail.</span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\">Chez Kountac, le client a deux semaines pour changer d&rsquo;avis ou &eacute;changer les produits achet&eacute;s, dans les conditions pr&eacute;vues dans les CGU&amp;V. Tout retour est gratuit dans les m&ecirc;mes conditions que la livraison.</span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\">Enfin, un Service Avant et Apr&egrave;s Vente </span></span>....</p>'),
(3, 'vente-en-ligne', 'Vente en ligne', 'Texte', 'Information', '<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><strong><span style=\"font-size:24.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;\">Vente en ligne (e-commerce)</span></span></strong></span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">Comme tous les sites commerciaux de vente de biens ou de services sur internet, la soci&eacute;t&eacute; Kountac SAS est soumise &agrave; une r&eacute;glementation identique &agrave; celle de la vente &agrave; distance ou par correspondance (VPC), comprenant des obligations d&eacute;claratives (protection des consommateurs, TVA), des mentions obligatoires, des r&egrave;gles pr&eacute;cises de prospection, etc.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">Kountac, comme tous les sites de e-commerce, doit respecter certaines </span><a href=\"https://www.cnil.fr/fr/informatique-et-libertes-suis-je-concerne\" style=\"color:blue; text-decoration:underline\" target=\"_blank\" title=\"obligations - www.cnil.fr - Nouvelle fenêtre\"><span style=\"font-family:&quot;Times New Roman&quot;\">obligations</span></a><span style=\"font-family:&quot;Times New Roman&quot;\"> &nbsp;:</span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">recueillir l&#39;accord des clients&nbsp;;</span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">informer les clients de leur droit d&#39;acc&egrave;s, de modification et de suppression des informations collect&eacute;es&nbsp;;</span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">veiller &agrave; la s&eacute;curit&eacute; des syst&egrave;mes d&#39;information et la confidentialit&eacute; des donn&eacute;es&nbsp;;</span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">indiquer une dur&eacute;e de conservation des donn&eacute;es.</span></span></span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">Kountac n&#39;est pas autoris&eacute; &agrave; envoyer un mail commercial sans l&#39;accord du destinataire.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">La commande est effectu&eacute;e en 3 &eacute;tapes obligatoires&nbsp;:</span></span></span></p>\r\n\r\n<ol>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">visualisation du d&eacute;tail de la commande et de son prix total&nbsp;;</span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">correction d&#39;&eacute;ventuelles erreurs&nbsp;;</span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">confirmation de la commande.</span></span></span></li>\r\n</ol>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">Kountac est enti&egrave;rement responsable de l&#39;ex&eacute;cution du contrat conclu &agrave; distance (y compris la livraison), sauf si la mauvaise ex&eacute;cution est imputable &agrave; l&#39;acheteur, &agrave; un tiers, ou &agrave; un cas de </span><a href=\"https://www.service-public.fr/professionnels-entreprises/glossaire/R38200\" style=\"color:blue; text-decoration:underline\" title=\"force majeure : Événement exceptionnel, imprévisible et irrésistible justifiant de s\'exonérer d\'une obligation, d\'un engagement ou d\'une responsabilité (par exemple : catastrophe naturelle pour un contrat d\'assurance, décès pour un contrat de travail...)\"><em><span style=\"font-family:&quot;Times New Roman&quot;\">force majeure</span></em></a><span style=\"font-family:&quot;Times New Roman&quot;\">.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">D&egrave;s r&eacute;ception de la commande,<strong> Kountac </strong></span><span style=\"font-family:&quot;Times New Roman&quot;\">adressera un courriel d&#39;accus&eacute; de r&eacute;ception de la vente et d&eacute;livrera une </span><a href=\"https://www.service-public.fr/professionnels-entreprises/vosdroits/F23208\" style=\"color:blue; text-decoration:underline\"><span style=\"font-family:&quot;Times New Roman&quot;\">facture</span></a><span style=\"font-family:&quot;Times New Roman&quot;\"> au client lors de la livraison.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">Le paiement est effectu&eacute; lors de la commande.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">Kountac propose un paiement par carte&nbsp;: carte bleue (CB), Visa, Mastercard, Amex, Maestro, Paypal.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">Pour ce paiement, Kountac a souscrit un contrat de vente &agrave; distance avec sa banque.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><em><span style=\"font-family:&quot;Times New Roman&quot;\">En cas de contestation ou d&#39;utilisation frauduleuse, le commer&ccedil;ant doit assumer les co&ucirc;ts de la vente et le client n&#39;est pas responsable si le paiement a &eacute;t&eacute; fait &agrave; distance sans utilisation physique de la CB (utilisation du num&eacute;ro de la CB). Le titulaire de la carte doit avoir d&eacute;pos&eacute; une r&eacute;clamation dans les 70 jours &agrave; partir de la date de l&#39;op&eacute;ration contest&eacute;e (d&eacute;lai port&eacute; &agrave; 120 jours maximum par le contrat).</span></em></span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><em><span style=\"font-family:&quot;Times New Roman&quot;\">Les sommes sont cr&eacute;dit&eacute;es sur le compte du d&eacute;tenteur de la CB ou restitu&eacute;es, sans frais, 1 mois au plus tard &agrave; partir de la r&eacute;ception de la contestation.</span></em></span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">La livraison interviendra au plus tard <strong>30 jours</strong> apr&egrave;s la commande en ligne.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">Le fournisseur de biens ou services &agrave; distance, autres que des services financiers, doit indiquer, avant la conclusion du contrat, la date limite &agrave; laquelle il s&#39;engage &agrave; livrer le bien ou ex&eacute;cuter la prestation.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">Sans mention au contrat, le bien doit &ecirc;tre livr&eacute; ou la prestation ex&eacute;cut&eacute;e d&egrave;s la conclusion du contrat.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">En cas de retard de livraison ou de la prestation, le fournisseur doit en informer le client, qui peut demander &agrave; &ecirc;tre rembours&eacute; dans les 30 jours suivant le paiement.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">Le remboursement se fait alors en totalit&eacute;, y compris des frais de r&eacute;exp&eacute;dition, si le colis arrive apr&egrave;s la r&eacute;tractation.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">Le client n&#39;est pas oblig&eacute; d&#39;accepter une certaine modalit&eacute; de remboursement (avoir sur un prochain achat par exemple).</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><strong><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Times New Roman&quot;\">R&eacute;tractation</span></span></strong></span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">L&#39;acheteur en ligne, comme tout consommateur de VPC, a un droit de r&eacute;tractation de <strong>14 jours</strong> &agrave; partir du lendemain o&ugrave; il entre en possession du bien ou accepte l&#39;offre pour une prestation, sans justification, ni paiement de p&eacute;nalit&eacute;s de sa part. Il peut cependant &ecirc;tre redevable des frais de retour.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">Ce droit de r&eacute;tractation s&#39;applique aussi aux produits sold&eacute;s, d&#39;occasion ou en d&eacute;stockage.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">Lors de la conclusion du contrat, le client doit imp&eacute;rativement &ecirc;tre inform&eacute; des conditions du droit de r&eacute;tractation&nbsp;: dur&eacute;e du d&eacute;lai, point de d&eacute;part, remboursement du produit, paiement des frais de retour, etc.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">Le professionnel doit communiquer au consommateur, avant la conclusion du contrat, un </span><a href=\"https://www.service-public.fr/professionnels-entreprises/vosdroits/R38397\" style=\"color:blue; text-decoration:underline\"><span style=\"font-family:&quot;Times New Roman&quot;\">formulaire de r&eacute;tractation</span></a><span style=\"font-family:&quot;Times New Roman&quot;\">.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">Le remboursement de la totalit&eacute; des sommes vers&eacute;es, y compris les frais de livraison, doit &ecirc;tre fait dans les 14 jours &agrave; partir du moment o&ugrave; le professionnel est inform&eacute; de la d&eacute;cision du client de se r&eacute;tracter.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">&Agrave; condition que cela soit clairement signal&eacute; au moment de l&#39;achat, certains produits ou prestations ne sont pas soumis au droit de r&eacute;tractation et ne peuvent pas &ecirc;tre rembours&eacute;s&nbsp;:</span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">bien confectionn&eacute; sp&eacute;cialement pour le consommateur (du sur-mesure par exemple)&nbsp;;</span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">produit ne pouvant &ecirc;tre par nature r&eacute;exp&eacute;di&eacute;&nbsp;;</span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">produit p&eacute;rissable (alimentaire par exemple)&nbsp;;</span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">cassettes vid&eacute;o, CD, DVD s&#39;ils ont &eacute;t&eacute; ouverts par le consommateur&nbsp;;</span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">presse (journaux, p&eacute;riodiques ou magazines)&nbsp;;</span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">prestation de services d&#39;h&eacute;bergement, de transport, de restauration ou de loisirs.</span></span></span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">&nbsp; <strong>&Agrave; noter :</strong></span></span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">L&#39;acheteur en ligne d&#39;un service financier a &eacute;galement un droit de r&eacute;tractation de<strong> 14 jours calendaires</strong>, d&eacute;lai commen&ccedil;ant &agrave; partir du jour o&ugrave; le contrat &agrave; distance est conclu.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><strong><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Times New Roman&quot;\">Retour du produit</span></span></strong></span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">Le vendeur est tenu de reprendre un article en cas de livraison non conforme &agrave; la commande ou d&eacute;fectueuse.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">Le consommateur doit le r&eacute;exp&eacute;dier dans son emballage d&#39;origine, en indiquant le motif de refus sur le bon de livraison ou la facture et peut exiger&nbsp;:</span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">une nouvelle livraison respectant la commande&nbsp;;</span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">la r&eacute;paration du produit d&eacute;fectueux&nbsp;;</span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">l&#39;&eacute;change du produit par un autre similaire ou</span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">l&#39;annulation de la commande (avec remboursement des sommes vers&eacute;es avec &eacute;ventuellement une demande de dommages et int&eacute;r&ecirc;ts en cas de pr&eacute;judice).</span></span></span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">Le consommateur doit payer les co&ucirc;ts directs de renvoi, sauf si le professionnel accepte de les prendre &agrave; sa charge ou s&#39;il n&#39;a pas inform&eacute; le consommateur que ces co&ucirc;ts sont &agrave; sa charge.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">Sont &eacute;galement &agrave; la charge du consommateur :</span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">les frais suppl&eacute;mentaires de livraison des biens s&#39;il a choisi un mode de livraison plus co&ucirc;teux que le mode de livraison propos&eacute; habituellement par le vendeur&nbsp;;</span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">les co&ucirc;ts fixes et proportionnels de la prestation de service, dont l&#39;ex&eacute;cution a commenc&eacute; avant la fin du d&eacute;lai de r&eacute;tractation, &agrave; la demande expresse du consommateur.</span></span></span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">En cas de demande expresse d&#39;ex&eacute;cution du service avant la fin du d&eacute;lai de r&eacute;tractation, le consommateur n&#39;est redevable d&#39;aucune somme si le professionnel n&#39;a pas recueilli sa demande sur papier ou sur support durable ou ne l&#39;a pas inform&eacute; de l&#39;obligation de payer des frais pour le service fourni.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">&nbsp; <strong>&Agrave; savoir :</strong></span></span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\"><span style=\"font-family:&quot;Times New Roman&quot;\">l&#39;e-commer&ccedil;ant doit assurer la </span><a href=\"https://www.service-public.fr/particuliers/vosdroits/F11094\" style=\"color:blue; text-decoration:underline\"><span style=\"font-family:&quot;Times New Roman&quot;\">garantie l&eacute;gale de conformit&eacute;</span></a><span style=\"font-family:&quot;Times New Roman&quot;\"> qui permet au consommateur de choisir entre &eacute;change et r&eacute;paration, en cas de d&eacute;faut de fabrication ou de panne d&#39;un produit neuf, pendant 2 ans. Le professionnel est tenu de r&eacute;pondre &agrave; cette demande dans un d&eacute;lai maximum d&#39;un mois.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\">TEXTES DE R&eacute;f&eacute;rence</span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;\"><a href=\"https://www.legifrance.gouv.fr/affichCodeArticle.do?idArticle=LEGIARTI000032226994&amp;cidTexte=LEGITEXT000006069565\" style=\"color:blue; text-decoration:underline\" target=\"_blank\" title=\"Code de la consommation : article L213-1 - www.legifrance.gouv.fr - Nouvelle fenêtre\">Code de la consommation : article L213-1&nbsp;</a></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:48px\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;\">Archivage du contrat conclu par voie &eacute;lectronique</span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;\"><a href=\"https://www.legifrance.gouv.fr/affichCodeArticle.do?idArticle=LEGIARTI000032227010&amp;cidTexte=LEGITEXT000006069565\" style=\"color:blue; text-decoration:underline\" target=\"_blank\" title=\"Code de la consommation : article L211-2 - www.legifrance.gouv.fr - Nouvelle fenêtre\">Code de la consommation : article L211-2&nbsp;</a></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:48px\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;\">Obligations relatives aux contrats, au droit de r&eacute;tractation et &agrave; la prospection commerciale</span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;\"><a href=\"https://www.legifrance.gouv.fr/affichCode.do?idSectionTA=LEGISCTA000032226878&amp;cidTexte=LEGITEXT000006069565\" style=\"color:blue; text-decoration:underline\" target=\"_blank\" title=\"Code de la consommation : articles L221-5 à L221-7 - www.legifrance.gouv.fr - Nouvelle fenêtre\">Code de la consommation&nbsp;: articles L221-5 &agrave; L221-7&nbsp;</a></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:48px\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;\">Obligation d&#39;information pr&eacute; contractuelle</span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;\"><a href=\"https://www.legifrance.gouv.fr/affichCode.do?idSectionTA=LEGISCTA000032226870&amp;cidTexte=LEGITEXT000006069565\" style=\"color:blue; text-decoration:underline\" target=\"_blank\" title=\"Code de la consommation : articles L221-8 à L221-10 - www.legifrance.gouv.fr - Nouvelle fenêtre\">Code de la consommation&nbsp;: articles L221-8 &agrave; L221-10&nbsp;</a></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:48px\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;\">Contrats conclus hors &eacute;tablissement</span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;\"><a href=\"https://www.legifrance.gouv.fr/affichCode.do?idSectionTA=LEGISCTA000032226862&amp;cidTexte=LEGITEXT000006069565\" style=\"color:blue; text-decoration:underline\" target=\"_blank\" title=\"Code de la consommation : articles L221-11 à L221-15 - www.legifrance.gouv.fr - Nouvelle fenêtre\">Code de la consommation&nbsp;: articles L221-11 &agrave; L221-15&nbsp;</a></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:48px\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;\">Contrats conclus &agrave; distance</span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;\"><a href=\"https://www.legifrance.gouv.fr/affichCode.do?idSectionTA=LEGISCTA000032226850&amp;cidTexte=LEGITEXT000006069565\" style=\"color:blue; text-decoration:underline\" target=\"_blank\" title=\"Code de la consommation : articles L221-16 à L221-17 - www.legifrance.gouv.fr - Nouvelle fenêtre\">Code de la consommation&nbsp;: articles L221-16 &agrave; L221-17&nbsp;</a></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:48px\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;\">D&eacute;marchage t&eacute;l&eacute;phonique et prospection commerciale</span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;\"><a href=\"https://www.legifrance.gouv.fr/affichCode.do?idSectionTA=LEGISCTA000032226844&amp;cidTexte=LEGITEXT000006069565\" style=\"color:blue; text-decoration:underline\" target=\"_blank\" title=\"Code de la consommation : articles L221-18 à L221-28 - www.legifrance.gouv.fr - Nouvelle fenêtre\">Code de la consommation : articles L221-18 &agrave; L221-28&nbsp;</a></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:48px\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;\">Droit de r&eacute;tractation</span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;\"><a href=\"https://www.legifrance.gouv.fr/affichCodeArticle.do?idArticle=LEGIARTI000032226433&amp;cidTexte=LEGITEXT000006069565\" style=\"color:blue; text-decoration:underline\" target=\"_blank\" title=\"Code de la consommation : article L232-3 - www.legifrance.gouv.fr - Nouvelle fenêtre\">Code de la consommation&nbsp;: article L232-3&nbsp;</a></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;\"><a href=\"https://www.legifrance.gouv.fr/affichCode.do?idSectionTA=LEGISCTA000032226386&amp;cidTexte=LEGITEXT000006069565\" style=\"color:blue; text-decoration:underline\" target=\"_blank\" title=\"Code de la consommation : articles L242-1 à L242-4 - www.legifrance.gouv.fr - Nouvelle fenêtre\">Code de la consommation&nbsp;: articles L242-1 &agrave; L242-4&nbsp;</a></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:48px\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;\">Sanctions civiles</span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;\"><a href=\"https://www.legifrance.gouv.fr/affichCode.do?idSectionTA=LEGISCTA000032226376&amp;cidTexte=LEGITEXT000006069565\" style=\"color:blue; text-decoration:underline\" target=\"_blank\" title=\"Code de la consommation : articles L242-5 à L242-9 - www.legifrance.gouv.fr - Nouvelle fenêtre\">Code de la consommation&nbsp;: articles L242-5 &agrave; L242-9&nbsp;</a></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:48px\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;\">Sanctions p&eacute;nales</span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;\"><a href=\"https://www.legifrance.gouv.fr/affichCode.do?idSectionTA=LEGISCTA000032226364&amp;cidTexte=LEGITEXT000006069565\" style=\"color:blue; text-decoration:underline\" target=\"_blank\" title=\"Code de la consommation : articles L242-10 à L242-14 - www.legifrance.gouv.fr - Nouvelle fenêtre\">Code de la consommation&nbsp;: articles L242-10 &agrave; L242-14&nbsp;</a></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:48px\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;\">Sanctions administratives</span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;\"><a href=\"http://www.legifrance.gouv.fr/affichCodeArticle.do?idArticle=LEGIARTI000006417969&amp;cidTexte=LEGITEXT000006070719\" style=\"color:blue; text-decoration:underline\" target=\"_blank\" title=\"Code pénal : article 226-18-1 - www.legifrance.gouv.fr - Nouvelle fenêtre\">Code p&eacute;nal&nbsp;: article 226-18-1&nbsp;</a></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;\"><a href=\"http://www.legifrance.gouv.fr/affichCode.do?idSectionTA=LEGISCTA000006165426&amp;cidTexte=LEGITEXT000006070719\" style=\"color:blue; text-decoration:underline\" target=\"_blank\" title=\"Code pénal : articles R625-10 à R625-13 - www.legifrance.gouv.fr - Nouvelle fenêtre\">Code p&eacute;nal&nbsp;: articles R625-10 &agrave; R625-13&nbsp;</a></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;\"><a href=\"https://www.legifrance.gouv.fr/affichCodeArticle.do?idArticle=LEGIARTI000032007504&amp;cidTexte=LEGITEXT000006070721\" style=\"color:blue; text-decoration:underline\" target=\"_blank\" title=\"Code civil : articles 1127-1 à 1127-3 - www.legifrance.gouv.fr - Nouvelle fenêtre\">Code civil : articles 1127-1 &agrave; 1127-3&nbsp;</a></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:48px\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;\">R&egrave;gles concernant un contrat conclu sous forme &eacute;lectronique</span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;\"><a href=\"http://www.legifrance.gouv.fr/affichTexteArticle.do?idArticle=LEGIARTI000024042423&amp;cidTexte=LEGITEXT000005789847\" style=\"color:blue; text-decoration:underline\" target=\"_blank\" title=\"Loi n°2004-575 du 21 juin 2004 pour la confiance dans l\'économie numérique : articles 19 et 20 - www.legifrance.gouv.fr - Nouvelle fenêtre\">Loi n&deg;2004-575 du 21 juin 2004 pour la confiance dans l&#39;&eacute;conomie num&eacute;rique&nbsp;: articles 19 et 20&nbsp;</a></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;\"><a href=\"https://www.legifrance.gouv.fr/affichTexte.do?cidTexte=JORFTEXT000034070801\" style=\"color:blue; text-decoration:underline\" target=\"_blank\" title=\"Loi n°2017-203 du 21 février 2017-vente à distance - www.legifrance.gouv.fr - Nouvelle fenêtre\">Loi n&deg;2017-203 du 21 f&eacute;vrier 2017-vente &agrave; distance&nbsp;</a></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;\"><a href=\"http://www.legifrance.gouv.fr/affichTexte.do;?cidTexte=JORFTEXT000000448451\" style=\"color:blue; text-decoration:underline\" target=\"_blank\" title=\"Décret n°2005-137 du 16 février 2005 pris pour l\'application de l\'article L. 134-2 du code de la consommation - www.legifrance.gouv.fr - Nouvelle fenêtre\">D&eacute;cret n&deg;2005-137 du 16 f&eacute;vrier 2005 pris pour l&#39;application de l&#39;article L. 134-2 du code de la consommation&nbsp;</a></span></span></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\" 	  /uploadProduits/c08f6dd8dde42bc4ca9c917523997db2.jpeg \" style=\"height:520px; width:874px\" /></p>');

-- --------------------------------------------------------

--
-- Table structure for table `payscfa`
--

DROP TABLE IF EXISTS `payscfa`;
CREATE TABLE IF NOT EXISTS `payscfa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payseuro`
--

DROP TABLE IF EXISTS `payseuro`;
CREATE TABLE IF NOT EXISTS `payseuro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payslivre`
--

DROP TABLE IF EXISTS `payslivre`;
CREATE TABLE IF NOT EXISTS `payslivre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paysnaira`
--

DROP TABLE IF EXISTS `paysnaira`;
CREATE TABLE IF NOT EXISTS `paysnaira` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paysusa`
--

DROP TABLE IF EXISTS `paysusa`;
CREATE TABLE IF NOT EXISTS `paysusa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `precommandes`
--

DROP TABLE IF EXISTS `precommandes`;
CREATE TABLE IF NOT EXISTS `precommandes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produits_1`
--

DROP TABLE IF EXISTS `produits_1`;
CREATE TABLE IF NOT EXISTS `produits_1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `collection_id` int(11) DEFAULT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `marque_id` int(11) DEFAULT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `matiere` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `popularite` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `dateajout` date DEFAULT NULL,
  `dateupdate` date DEFAULT NULL,
  `dateachat` date DEFAULT NULL,
  `conditions_utilisation` longtext COLLATE utf8_unicode_ci NOT NULL,
  `looks_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_AC7EF571514956FD` (`collection_id`),
  KEY `IDX_AC7EF571BCF5E72D` (`categorie_id`),
  KEY `IDX_AC7EF5714827B9B2` (`marque_id`),
  KEY `IDX_AC7EF5716852BE12` (`looks_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `produits_1`
--

INSERT INTO `produits_1` (`id`, `collection_id`, `categorie_id`, `marque_id`, `nom`, `matiere`, `description`, `popularite`, `stock`, `dateajout`, `dateupdate`, `dateachat`, `conditions_utilisation`, `looks_id`) VALUES
(25, 4, 19, 8, 'Pantalon Jogodo', 'Coton', 'Le pantalon Jogodo est un pantalon en coton de couleur bleu marine, qui épouse les formes sans serrer, à taille haute, avec deux poches et terminé par une large ceinture.', 2, 26, '2018-12-14', '2018-12-15', '2019-07-04', 'Dans le cas de lavages au lave—linge, utiliser un programme à 40° maximum, une lessive liquide sans agent blanchissant et opter pour un faible essorage.\r\nCe pantalon peut être séché à la machine, en choisissant le programme adéquat.\r\n\r\nRepasser au programme coton en protégeant d’une trop grande chaleur du fer par une pattemouille.', 5),
(27, 4, 14, 8, 'Veste Sota', 'Coton', 'La veste Sota est une veste en coton couleur jaune soufre, qui descend jusque au-dessous des petites hanches. Elle possède une poche de chaque côté, n’est pas boutonnée et présente un large col cranté.', 3, 24, '2018-12-14', '2018-12-15', '2019-07-25', 'Dans le cas de lavages au lave—linge, utiliser un programme à 40° maximum, une lessive liquide sans agent blanchissant et opter pour un faible essorage. Cette veste peut être séchée à la machine, en choisissant le programme adéquat. Repasser au programme coton en protégeant d’une trop grande chaleur du fer par une pattemouille.', 5),
(29, 2, 26, 8, 'Robe Kinkin', 'Coton', 'La robe Kinkin est une robe courte qui associe tissu uni et tissu teinté à la cire (appelé WAX), par une alternance de bandes horizontales et verticales qui mettent en valeur les rondeurs naturelles du corps. Le décolleté devant descend jusqu’en dessous de la poitrine en formant un joli trapèze avec les larges bretelles. La forme des hanches est soulignée par le bouffant de la jupe.', 1, 81, '2018-12-14', '2018-12-15', NULL, 'Les trois modèles associant un tissu en coton uni et un tissu teinté à la cire, il est conseillé, au moins pour les premiers lavages, de procéder à un lavage à la main à l’eau tiède savonneuse, mais on peut aussi utiliser une lessive liquide ou quelques gouttes de shampoing. Les nettoyants et les lessives en poudre ne sont pas recommandés. Dans le cas de lavages au lave—linge, utiliser un programme à 40° maximum, une lessive liquide sans agent blanchissant et opter pour un faible essorage. Le séchage au sèche-linge est possible mais pas conseillé. Repasser au programme coton en protégeant d’une trop grande chaleur du fer par une pattemouille.', 8),
(31, 6, 26, 8, 'Robe Ouarga', 'Coton', 'La robe Ouarga est une robe courte en coton qui associe tissu uni et tissu légèrement stretché teinté artisanalement à la cire, dans une alternance de bandes verticales sur le devant fixées par deux fermetures éclairs. De la même manière, les courbes des hanches sont dessinées par des pièces rapportées et ajustées avec des fermetures éclairs. Il se décline en trois couleurs : blanc, fuchsia et noir. Attention, le procédé de teinture artisanale étant totalement manuel, certains écarts au niveau des couleurs des parties teintées peuvent être constatés par rapport aux photos.', 2, 78, '2018-12-14', '2018-12-15', '2019-07-25', 'Les trois modèles associant un tissu en coton uni et un tissu teinté à la cire, il est conseillé, au moins pour les premiers lavages, de procéder à un lavage à la main à l’eau tiède savonneuse, mais on peut aussi utiliser une lessive liquide ou quelques gouttes de shampoing. Les nettoyants et les lessives en poudre ne sont pas recommandés. Dans le cas de lavages au lave—linge, utiliser un programme à 40° maximum, une lessive liquide sans agent blanchissant et opter pour un faible essorage. Le séchage au sèche-linge est possible mais pas conseillé. Repasser au programme coton en protégeant d’une trop grande chaleur du fer par une pattemouille.', 12),
(33, 2, 26, 8, 'Robe Annabella', 'Coton', 'La robe Annabella est une robe asymétrique avec un dos qui descend un peu au-dessus du genou et un devant qui monte progressivement en formant une sorte de triangle. Le décolleté, très original, descend vers la poitrine en forme rectangulaire et s’achève au cou par un col mao triple. La robe est complétée par des mancherons. La robe Annabella se décline en trois versions :  une version fuchsia en coton uni et deux versions en léger tissu damassé en coton bleu-ciel et orange. Dans ces deux cas, les mancherons ainsi le col et le bas de la robe sont soulignés par des rappels en tissu teinté artisanalement à la cire. Attention, le procédé de teinture artisanale étant totalement manuel, certains écarts au niveau des couleurs des parties teintées peuvent être constatés par rapport aux photos.', 1, 81, '2018-12-15', '2018-12-15', NULL, 'Pour la robe Annabella fuchsia, il est conseillé d’utiliser un programme à 40° maximum, une lessive liquide sans agent blanchissant et opter pour un faible essorage. Cette veste peut être séchée à la machine, en choisissant le programme adéquat. Pour les robes Annabella Bleu-ciel et orange, pour les premiers lavages, il est conseillé de laver cette robe à la main à l’eau tiède savonneuse, mais on peut aussi utiliser une lessive liquide ou quelques gouttes de shampoing. Les nettoyants et les lessives en poudre ne sont pas recommandés. Dans le cas de lavages au lave—linge, utiliser un programme à 40° maximum, une lessive liquide sans agent blanchissant et opter pour un faible essorage. Le séchage au sèche-linge est déconseillé. Repasser au programme coton en protégeant d’une trop grande chaleur du fer par une pattemouille.', 12),
(34, 4, 19, 8, 'Pantalon Saiyens', 'Coton', 'Le pantalon Saiyens, décliné en trois motifs à dominante indigo, jaune ou noire, est un pantalon à pinces à taille haute. Très confortable, il a une coupe droite joliment froncée aux extrémités ; deux poches appliquées basses agrémentent l’ensemble. Dans le modèle indigo, les appliques sont réalisées avec un tissu teinté artisanalement à la cire ; dans les modèles jaune et noir, elles sont réalisées en Wax. Il est accompagné ici de la ceinture-corset Cintra.', 1, 81, '2018-12-15', '2018-12-15', NULL, 'Pour les premiers lavages, il est conseillé de laver ce pantalon à la main à l’eau tiède savonneuse, mais on peut aussi utiliser une lessive liquide ou quelques gouttes de shampoing. Les nettoyants et les lessives en poudre ne sont pas recommandés. Dans le cas de lavages au lave—linge, utiliser un programme à 40° maximum, une lessive liquide sans agent blanchissant et opter pour un faible essorage. Le séchage au sèche-linge est déconseillé. Repasser au programme coton en protégeant d’une trop grande chaleur du fer par une pattemouille.', 1),
(35, 4, 13, 8, 'Ceinture corset Cintra', 'Coton', 'La ceinture-corset Cintra est une ceinture haute élastique montée avec des baleines posées régulièrement sur la circonférence. Elle épouse sans serrer et met en valeur toutes les formes féminines. Elle se décline selon trois dominantes : bleu et violet, noir et bleu, orange et bleu. Le modèle bleu et violet est fabriqué avec un tissu teinté à la cire artisanalement, les deux autres sont réalisés en Wax.', 1, 81, '2018-12-15', '2018-12-15', NULL, 'Pour les premiers lavages, il est conseillé de laver cette ceinture à la main à l’eau tiède savonneuse, mais on peut aussi utiliser une lessive liquide ou quelques gouttes de shampoing. Les nettoyants et les lessives en poudre ne sont pas recommandés. Dans le cas de lavages au lave—linge, utiliser un programme à 40° maximum, une lessive liquide sans agent blanchissant et opter pour un faible essorage. Le séchage au sèche-linge est déconseillé. Repasser au programme coton en protégeant d’une trop grande chaleur du fer par une pattemouille.', 1),
(36, 4, 21, 8, 'Combinaison Oro', 'Coton', 'La combinaison Oro est composé d’un pantalon ajusté et d’un top bouffant qui se serre à la taille pour la souligner agréablement. Elle se décline en trois coloris : rose bonbon, bleu marine et vert turquoise. Le grand col appliqué rappelle les tonalités de l’ensemble avec un tissu en wax pour les deux premières et et tissu teinté artisanalement à la cire pour la combinaison vert-turquoise. La grande taille de ce joli col lui permet de jouer en même temps le rôle de mancheron, qui termine la combinaison de manière originale.', 1, 81, '2018-12-15', '2019-04-12', NULL, 'Pour les premiers lavages, il est conseillé de laver cette combinaison à la main à l’eau tiède savonneuse, mais on peut aussi utiliser une lessive liquide ou quelques gouttes de shampoing. Les nettoyants et les lessives en poudre ne sont pas recommandés. Dans le cas de lavages au lave—linge, utiliser un programme à 40° maximum, une lessive liquide sans agent blanchissant et opter pour un faible essorage. Le séchage au sèche-linge est déconseillé. Repasser au programme coton en protégeant d’une trop grande chaleur du fer par une pattemouille.', 8),
(37, 2, 21, 8, 'Combinaison Frou-frou', 'Coton', 'La combinaison froufrou est combinaison composée d’un pantalon droit et d’un top à bretelles qui laisse une partie du dos découverte. Il se décline en trois variantes arborant toutes une sorte d’amusante bavette-froufrou, deux en couleur unie (marron et saumon) et une en tissu de type WAX. Une fermeture éclaire invisible permet d’enfiler la combinaison très aisément. La matière principale est le coton.', 1, 81, '2018-12-15', '2018-12-15', NULL, 'La combinaison en WAX doit de préférence être lavée à la main à l’eau tiède savonneuse au moins pour les quelques premiers lavages. On peut aussi utiliser une lessive liquide ou quelques gouttes de shampoing. Les nettoyants et les lessives en poudre ne sont pas recommandés.\r\nPour la suite et pour les autres combinaisons, dans le cas de lavages au lave—linge, utiliser un programme à 40° maximum, une lessive liquide sans agent blanchissant et opter pour un faible essorage.\r\nLe séchage au sèche-linge est déconseillé.\r\nRepasser au programme coton en protégeant d’une trop grande chaleur du fer par une pattemouille.', 8),
(39, 4, 26, 8, 'Robe Puzzle', 'Coton', 'Cette jolie robe toute simple présente l’originalité de l’asymétrie des deux tissus de couleurs différentes qui se marient au travers d’une pièce en tissu teinté artisanalement à la cire qui fait leur trait d’union. Elle descend juste au-dessus des genoux et affiche des manches longues qui lui permettent de pouvoir être portée à toute saison.', 1, 81, '2018-12-15', '2018-12-15', NULL, 'Pour les premiers lavages, il est conseillé de laver cette robe à la main à l’eau tiède savonneuse, mais on peut aussi utiliser une lessive liquide ou quelques gouttes de shampoing. Les nettoyants et les lessives en poudre ne sont pas recommandés. Dans le cas de lavages au lave—linge, utiliser un programme à 40° maximum, une lessive liquide sans agent blanchissant et opter pour un faible essorage. \r\nLe séchage au sèche-linge est déconseillé. \r\nRepasser au programme coton en protégeant d’une trop grande chaleur du fer par une pattemouille.', 1),
(40, 4, 26, 8, 'Robe Banane', 'Coton', 'La robe Banane est une robe en coton qui combine tissu uni et tissu teinté à la cire (WAX industriel pour le modèle en bleu et en violet, artisanalement pour le modèle blanc) dans une association qui superpose les deux au niveau de la jupe. Son col châle très ample et son asymétrie « sage » en font un modèle qui sait s’adapter à toutes les situations, de la plus décontractée à la plus chic et habillée.\r\nAttention, le procédé de teinture artisanale étant totalement manuel, certains écarts au niveau des couleurs des parties teintées peuvent être constatés par rapport aux photos.', 50, -20, '2018-12-15', '2019-02-09', '2019-06-17', 'Les trois modèles associant un tissu en coton uni et un tissu teinté à la cire, il est conseillé, au moins pour les premiers lavages, de proférer à un lavage à la main à l’eau tiède savonneuse, mais on peut aussi utiliser une lessive liquide ou quelques gouttes de shampoing. Les nettoyants et les lessives en poudre ne sont pas recommandés.\r\nDans le cas de lavages au lave—linge, utiliser un programme à 40° maximum, une lessive liquide sans agent blanchissant et opter pour un faible essorage.\r\nLe séchage au sèche-linge est déconseillé.\r\nRepasser au programme coton en protégeant d’une trop grande chaleur du fer par une pattemouille.', 4),
(41, 4, 10, 8, 'Blouson raglan', 'Coton', 'Le blouson raglan est un blouson court qui se termine par une taille élastique. Il est fermé par une fermeture éclair et est muni de deux poche de chaque côté. Il se décline en quatre variantes (marron, rouge, bleu et vert) qui alternent des manches en tissu teinté artisanalement à la cire et tissu uni. Les motifs des manches sont soulignés par une bordure unie. Il est doublé. La matière principale est le coton.\r\nAttention, le procédé de teinture artisanale étant totalement manuel, certains écarts au niveau des couleurs des parties teintées peuvent être constatés par rapport aux photos.', 3, 133, '2018-12-15', '2018-12-15', '2019-06-17', 'Pour les premiers lavages, il est conseillé de laver ce blouson à la main à l’eau tiède savonneuse, mais on peut aussi utiliser une lessive liquide ou quelques gouttes de shampoing. Les nettoyants et les lessives en poudre ne sont pas recommandés.\r\nDans le cas de lavages au lave—linge, utiliser un programme à 40° maximum, une lessive liquide sans agent blanchissant et opter pour un faible essorage.\r\nLe séchage au sèche-linge est fortement déconseillé.\r\nRepasser au programme coton en protégeant d’une trop grande chaleur du fer par une pattemouille.', 2),
(44, 4, 10, 8, 'Blouson Rangers', 'Coton', 'Ce joli blouson est caractérisé par des épaulettes qui jouent également le rôle de sur-mancherons, ce qui rend gracieux un modèle classiquement plutôt masculin. Il est décliné en quatre modèles à dominante : blanche, noire, orange et verte ; deux modèles « prototypes » sont également présentés, sur les tons marron et bleu. Les manches sont confectionnées avec des tissus teintés artisanalement à la cire, des poches sont insérées dans le col, et fermées par des zips, d’autres sont insérées plus classiquement, et couvertes par un rabat.', 1, 126, '2018-12-17', '2018-12-17', NULL, 'Pour les premiers lavages, il est conseillé de laver ce blouson à la main à l’eau tiède savonneuse, mais on peut aussi utiliser une lessive liquide ou quelques gouttes de shampoing. Les nettoyants et les lessives en poudre ne sont pas recommandés. Dans le cas de lavages au lave—linge, utiliser un programme à 40° maximum, une lessive liquide sans agent blanchissant et opter pour un faible essorage. \r\nLe séchage au sèche-linge est déconseillé. \r\nRepasser au programme coton en protégeant d’une trop grande chaleur du fer par une pattemouille.', 8),
(45, 4, 25, 8, 'Manteau Dragdyeing', 'Coton', 'Le manteau Dragdyeing est un manteau court, décolleté sur le devant avec des manches 3/4. Il est zippé devant et muni de deux poches. Les manches sont de couleur unie, le reste du corps comprend des parties teintées à la cire. Il est près du corps.\r\nLa matière principale est différente pour les deux manteaux. Le Dragdyeing fuchsia, est principalement en coton teinté de façon industrielle à la cire (communément appelé WAX) ; les parties uniformes sont en coton glacé - mélange de coton et d’élasthanne (96% coton et 4% élasthanne)\r\nLe Dragdyeing feuille est en tissu ciré imperméable. Les poches, la bande en bas du vêtement, et le col sont en coton teinté de façon artisanale. Attention, le procédé de teinture artisanale étant totalement manuel, certains écarts au niveau des couleurs des parties teintées peuvent être constatés par rapport aux photos.\r\nLes deux manteaux sont bordés de fines dentelles noires au cou et aux manches .\r\nAttention, le procédé de teinture artisanale étant totalement manuel, certains écarts au niveau des couleurs des parties teintées peuvent être constatés par rapport aux photos.', 2, 53, '2018-12-17', '2018-12-17', '2019-07-04', 'Pour les premiers lavages, il est conseillé de laver ce manteau à la main à l’eau tiède savonneuse, mais on peut aussi utiliser une lessive liquide ou quelques gouttes de shampoing. Les nettoyants et les lessives en poudre ne sont pas recommandés sur ce tissu.\r\nDans le cas de lavages au lave—linge, utiliser un programme à 40° maximum, une lessive liquide sans agent blanchissant et opter pour un faible essorage.\r\nLe séchage au sèche-linge est forcément déconseillé.\r\nRepasser au programme coton en protégeant d’une trop grande chaleur du fer par une pattemouille.', 1),
(46, 4, 22, 8, 'Ensemble slim 3/4', 'Coton', 'Le slim ¾ est un tailleur pantalon composé d’un pantalon près du corps et d’une veste ajustée aux manches ¾,  au col légèrement montant et boutonnée sur le devant. L’ensemble est confectionné dans un tissu uni légèrement stretch, rehaussé au niveau des poignets par un tissu teinté artisanalement à la cire. Il se décline en trois variantes de couleur de base différente : citron, feuille et chair. Une fermeture éclaire invisible permet d’enfiler la combinaison très aisément.\r\nLe tissu utilisé est un coton glacé - mélange de coton et d’élasthanne (96% coton et 4% élasthanne)\r\nAttention, le procédé de teinture artisanale étant totalement manuel, certains écarts au niveau des couleurs des parties teintées peuvent être constatés par rapport aux photos.', 1, 108, '2018-12-17', '2018-12-17', NULL, 'Dans le cas de lavages au lave—linge, utiliser un programme à 40° maximum, une lessive liquide sans agent blanchissant et opter pour un faible essorage.\r\nLe séchage au sèche-linge est déconseillé.\r\nRepasser au programme coton en protégeant d’une trop grande chaleur du fer par une pattemouille.', 1),
(47, 4, 26, 8, 'Robe d\'Elfes', 'Coton', 'Cette jolie robe se croise en portefeuille sur le devant par un arrondi superposant plusieurs épaisseurs de tissus différents, selon le modèle et comportant en dernier un voile léger. Elle se décline en trois tonalités mais aussi trois finitions différentes comportant des paillettes ou des dessins complémentaires ; le col asymétrique complète ce modèle tout à fait adapté à être porté dans une occasion festive.', 1, 81, '2018-12-17', '2018-12-17', NULL, 'Pour les premiers lavages, il est conseillé de laver cette robe à la main à l’eau tiède savonneuse, mais on peut aussi utiliser une lessive liquide ou quelques gouttes de shampoing. Les nettoyants et les lessives en poudre ne sont pas recommandés. Dans le cas de lavages au lave—linge, utiliser un programme à 40° maximum, une lessive liquide sans agent blanchissant et opter pour un faible essorage. \r\nLe séchage au sèche-linge est déconseillé. \r\nRepasser au programme coton en protégeant d’une trop grande chaleur du fer par une pattemouille.', 11),
(48, 4, 26, 8, 'Robe Anastasie', 'Coton', 'La robe Anastasie a la forme d’une veste croisée près du corps, décolletée et sans col appliqué. Les tissus unis sont rehaussés par des appliqués en tissus teintés artisanalement à la cire. Elle se décline en trois couleurs : blanc, jaune et noir.La robe Anastasie a la forme d’une veste croisée près du corps, décolletée et sans col appliqué. Les tissus unis sont rehaussés par des appliqués en tissus teintés artisanalement à la cire. Elle se décline en trois couleurs : blanc, jaune et noir.', 24, 58, '2018-12-17', '2018-12-17', '2019-06-17', 'Pour les premiers lavages, il est conseillé de laver cette robe à la main à l’eau tiède savonneuse, mais on peut aussi utiliser une lessive liquide ou quelques gouttes de shampoing. Les nettoyants et les lessives en poudre ne sont pas recommandés. Dans le cas de lavages au lave—linge, utiliser un programme à 40° maximum, une lessive liquide sans agent blanchissant et opter pour un faible essorage. \r\nLe séchage au sèche-linge est déconseillé. \r\nRepasser au programme coton en protégeant d’une trop grande chaleur du fer par une pattemouille.', 5),
(52, 4, 21, 8, 'Combinaison Sarah', 'Coton', 'Les caractéristiques de cette élégante combinaison sont les petits décolletés au niveau des épaules et les épaulettes/mancherons très travaillées en même temps que le col montant. La pièce centrale est confectionner à l’aide d’un tissu teinté artisanalement à la cire sur des tons rappelant la couleur de base de la combinaison : bleue, verte ou rouge pour ce modèle adapté en toute situation, de la plus quotidienne à l’événement festif.', 2, 80, '2018-12-17', '2018-12-17', '2019-07-25', 'Pour les premiers lavages, il est conseillé de laver cette combinaison à la main à l’eau tiède savonneuse, mais on peut aussi utiliser une lessive liquide ou quelques gouttes de shampoing. Les nettoyants et les lessives en poudre ne sont pas recommandés. Dans le cas de lavages au lave—linge, utiliser un programme à 40° maximum, une lessive liquide sans agent blanchissant et opter pour un faible essorage. \r\nLe séchage au sèche-linge est déconseillé. \r\nRepasser au programme coton en protégeant d’une trop grande chaleur du fer par une pattemouille.', 4),
(54, 4, 26, 8, 'Robe soirée Ciri', 'Polyester', 'Véritable robe de princesse, la robe de soirée Ciri est une robe longue sans manches et qui épouse le corps jusqu’à la taille pour s’évaser ensuite en un grand pli au dos confectionné avec du WAX et qui tient le rôle d’une traîne. Des appliques de passementeries judicieusement agencées agrémentent cette belle robe pour les occasions festives.\r\nLa matière principale est du satin de polyester.', 2, 107, '2018-12-17', '2018-12-17', '2019-06-17', 'De par sa composition et sa confection, il est conseillé de laver cette robe à sec ou bien à la main à l’eau tiède savonneuse, mais on peut aussi utiliser une lessive liquide ou quelques gouttes de shampoing. Les nettoyants et les lessives en poudre ne sont pas recommandés. \r\nLe séchage au sèche-linge est fortement déconseillé. \r\nRepasser au programme coton en protégeant d’une trop grande chaleur du fer par une pattemouille.', 11),
(55, 4, 26, 8, 'Robe voile Ninelle', 'Coton', 'Cette belle robe longue des grandes occasions marie un tissu uni, un tissu teinté artisanalement à la cire et un voile, dans une harmonie de formes et de couleurs. Transparente dans un décolleté profond, elle se fait très sage ailleurs, et le voile forme une traine légère qui figure une sorte de grande aile au milieu du dos. La robe, près du corps, s’évase à partir des hanches pour rendre aisé n’importe quel mouvement de danse.', 1, 78, '2018-12-17', '2019-04-30', NULL, 'De par sa composition mélangée, il est conseillé de laver cette robe soit à sec, soit à la main à l’eau tiède savonneuse ; on peut aussi utiliser une lessive liquide ou quelques gouttes de shampoing. Les nettoyants et les lessives en poudre ne sont pas recommandés. Dans le cas de lavages au lave—linge, utiliser un programme à 30° maximum, une lessive liquide sans agent blanchissant et opter pour un faible essorage. \r\nRepasser au programme laine en protégeant d’une trop grande chaleur du fer par une pattemouille.', 4),
(59, 5, 10, 8, 'Prototype', 'Coton', 'Prototype pour tester le paiement par carte bancaire', 3, -1, '2019-02-09', '2019-02-09', '2019-02-13', 'Laver à la main :-)', 1),
(60, 1, 1, 8, 'couleurs', 'Coton', 'couleurscouleurscouleurscouleurscouleurscouleurscouleurscouleurs', 1, 1, '2019-02-13', '2019-02-13', NULL, 'couleurscouleurscouleurs', 1),
(61, 1, 1, 41, 'Produit test', 'Coton', 'test', 67, -114, '2019-06-17', '2019-06-17', '2019-06-18', 'aucune', 1),
(62, 1, 1, 41, 'Produit test', 'Coton', 'ykhfjh', 1, NULL, '2019-06-18', '2019-06-18', NULL, 'bghv;hnbkl', 1),
(63, 1, 1, 8, 'Produit test', 'Coton', 'khcv', 1, NULL, '2019-07-12', '2019-07-12', NULL, 'gbjbkhj', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produits_2`
--

DROP TABLE IF EXISTS `produits_2`;
CREATE TABLE IF NOT EXISTS `produits_2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produit_1_id` int(11) DEFAULT NULL,
  `libelle_id` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `etat` tinyint(1) NOT NULL,
  `reduction` double NOT NULL,
  `europrix` double DEFAULT NULL,
  `europrixCommande` double DEFAULT NULL,
  `cfaprix` double DEFAULT NULL,
  `cfaprixCommande` double DEFAULT NULL,
  `usaprix` double DEFAULT NULL,
  `usaprixCommande` double DEFAULT NULL,
  `livreprix` double DEFAULT NULL,
  `livreprixCommande` double DEFAULT NULL,
  `nairaprix` double DEFAULT NULL,
  `nairaprixCommande` double DEFAULT NULL,
  `allprix` double DEFAULT NULL,
  `allprixCommande` double DEFAULT NULL,
  `allprecommande` tinyint(1) DEFAULT NULL,
  `europrecommande` tinyint(1) DEFAULT NULL,
  `cfaprecommande` tinyint(1) DEFAULT NULL,
  `usaprecommande` tinyint(1) DEFAULT NULL,
  `livreprecommande` tinyint(1) DEFAULT NULL,
  `nairaprecommande` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3577A4CBD94B2115` (`produit_1_id`),
  KEY `IDX_3577A4CB25DD318D` (`libelle_id`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `produits_2`
--

INSERT INTO `produits_2` (`id`, `produit_1_id`, `libelle_id`, `stock`, `etat`, `reduction`, `europrix`, `europrixCommande`, `cfaprix`, `cfaprixCommande`, `usaprix`, `usaprixCommande`, `livreprix`, `livreprixCommande`, `nairaprix`, `nairaprixCommande`, `allprix`, `allprixCommande`, `allprecommande`, `europrecommande`, `cfaprecommande`, `usaprecommande`, `livreprecommande`, `nairaprecommande`) VALUES
(49, 25, 17, 26, 1, 0, 47, 87, 18950, 33950, 65, 105, 50, 90, 14600, 29600, 52, 92, 0, 0, 0, 0, 0, 0),
(50, 27, 25, 24, 1, 0, 65, 105, 27000, 42000, 80, 120, 65, 105, 17900, 35900, 70, 110, 0, 0, 0, 0, 0, 0),
(54, 29, 17, 27, 1, 0, 63, 103, 25700, 40700, 78, 118, 65, 105, 17300, 35300, 68, 108, 0, 0, 0, 0, 0, 0),
(55, 29, 30, 27, 1, 0, 63, 103, 25700, 40700, 78, 118, 65, 105, 17300, 35300, 68, 108, 0, 0, 0, 0, 0, 0),
(56, 29, 34, 27, 1, 0, 63, 103, 25700, 40700, 78, 118, 65, 105, 17300, 35300, 68, 108, 0, 0, 0, 0, 0, 0),
(60, 31, 35, 27, 1, 0, 77, 117, 32000, 47000, 95, 135, 80, 120, 20200, 35200, 82, 122, 0, 0, 0, 0, 0, 0),
(61, 31, 30, 27, 1, 0, 77, 117, 32000, 47000, 95, 135, 80, 120, 20200, 35200, 82, 122, 0, 0, 0, 0, 0, 0),
(62, 31, 36, 24, 1, 0, 77, 117, 32000, 47000, 95, 135, 80, 120, 20200, 35200, 82, 122, 0, 0, 0, 0, 0, 0),
(65, 33, 30, 27, 1, 0, 71, 111, 29200, 44200, 90, 130, 73, 113, 18900, 33900, 76, 116, 0, 0, 0, 0, 0, 0),
(66, 33, 17, 27, 1, 0, 71, 111, 29200, 44200, 90, 130, 73, 113, 18900, 33900, 76, 116, 0, 0, 0, 0, 0, 0),
(67, 33, 28, 27, 1, 0, 71, 111, 29200, 44200, 90, 130, 73, 113, 18900, 33900, 76, 116, 0, 0, 0, 0, 0, 0),
(68, 34, 17, 27, 1, 0, 58, 98, 23800, 38800, 75, 115, 60, 100, 16500, 31500, 63, 103, 0, 0, 0, 0, 0, 0),
(69, 34, 25, 27, 1, 0, 58, 98, 23800, 38800, 75, 115, 60, 100, 16500, 31500, 63, 103, 0, 0, 0, 0, 0, 0),
(70, 34, 36, 27, 1, 0, 58, 98, 23800, 38800, 75, 115, 60, 100, 16500, 31500, 63, 103, 0, 0, 0, 0, 0, 0),
(71, 35, 17, 27, 1, 0, 58, 98, 23600, 38600, 75, 115, 60, 100, 16400, 31400, 63, 103, 0, 0, 0, 0, 0, 0),
(72, 35, 36, 27, 1, 0, 58, 98, 23600, 38600, 75, 115, 60, 100, 16400, 31400, 63, 103, 0, 0, 0, 0, 0, 0),
(73, 35, 28, 27, 1, 0, 58, 98, 23600, 38600, 75, 115, 60, 100, 16400, 31400, 63, 103, 0, 0, 0, 0, 0, 0),
(74, 36, 17, 27, 1, 0, 72, 112, 29900, 44900, 88, 128, 74, 114, 19200, 34200, 77, 117, 0, 0, 0, 0, 0, 0),
(75, 36, 30, 27, 1, 0, 72, 112, 29900, 44900, 88, 128, 74, 114, 19200, 34200, 77, 117, 0, 0, 0, 0, 0, 0),
(76, 36, 33, 27, 1, 0, 72, 112, 29900, 44900, 88, 128, 74, 114, 19200, 34200, 77, 117, 0, 0, 0, 0, 0, 0),
(77, 37, 22, 27, 1, 0, 63, 103, 25700, 40700, 80, 120, 65, 105, 17300, 32300, 68, 108, 0, 0, 0, 0, 0, 0),
(78, 37, 17, 27, 1, 0, 63, 103, 25700, 43700, 80, 120, 65, 105, 17300, 31300, 68, 108, 1, 1, 1, 1, 1, 1),
(79, 37, 28, 27, 1, 0, 63, 103, 25700, 40700, 80, 120, 65, 105, 17300, 32300, 68, 108, 0, 0, 0, 0, 0, 0),
(82, 39, 17, 27, 1, 0, 75, 115, 31100, 46100, 91, 131, 77, 117, 19700, 34700, 80, 120, 1, 1, 1, 1, 1, 1),
(83, 39, 25, 27, 1, 0, 75, 115, 31100, 46100, NULL, NULL, 77, 117, 19700, 34700, 80, 120, 0, 1, 1, 1, 1, 1),
(84, 39, 22, 27, 1, 0, 75, 115, 31100, 46100, 91, 131, 77, 117, 19700, 34700, 80, 120, 1, 1, 1, 1, 1, 1),
(85, 40, 35, 24, 1, 0, 95, 135, 39900, 54900, 111, 151, 97, 137, 22500, 37500, 100, 140, 1, 1, 1, 1, 1, 1),
(86, 40, 17, -71, 1, 0, 95, 135, 39900, 54900, 111, 151, 97, 137, 22500, 37500, 100, 140, 1, 1, 1, 1, 1, 1),
(87, 40, 34, 27, 1, 0, 95, 135, 39900, 54900, 111, 151, 97, 137, 22500, 37500, 100, 140, 1, 1, 1, 1, 1, 1),
(88, 41, 17, 25, 1, 0, 90, 130, 37600, 52600, 106, 146, 92, 132, 21600, 36600, 95, 135, 1, 1, 1, 1, 1, 1),
(89, 41, 22, 27, 1, 0, 90, 130, 37600, 52600, 106, 146, 92, 132, 21600, 36600, 95, 135, 1, 1, 1, 1, 1, 1),
(90, 41, 28, 27, 1, 0, 90, 130, 37600, 52600, 106, 146, 92, 132, 21600, 36600, 95, 135, 1, 1, 1, 1, 1, 1),
(91, 41, 21, 27, 1, 0, 90, 130, 37600, 52600, 106, 146, 92, 132, 21600, 36600, 95, 135, 0, 0, 0, 0, 0, 1),
(92, 41, 32, 27, 1, 0, 90, 130, 37600, 52600, 106, 146, 92, 132, 21600, 36600, 95, 135, 1, 1, 1, 1, 1, 1),
(99, 44, 35, 27, 1, 0, 97, 137, 40600, 55600, 113, 153, 99, 139, 22800, 37800, 102, 142, 1, 1, 1, 1, 1, 1),
(100, 44, 17, 9, 1, 50, 97, 137, 40600, 55600, 113, 153, 99, 139, 22800, 37800, 102, 142, 1, 1, 1, 1, 1, 1),
(101, 44, 22, 9, 1, 50, 97, 137, 40600, 55600, 113, 153, 99, 139, 22800, 37800, 102, 142, 1, 1, 1, 1, 1, 1),
(102, 44, 36, 27, 1, 0, 97, 137, 40600, 55600, 113, 153, 99, 139, 22800, 37800, 102, 142, 1, 1, 1, 1, 1, 1),
(103, 44, 28, 27, 1, 0, 97, 137, 40600, 55600, 113, 153, 99, 139, 22800, 37800, 102, 142, 1, 1, 1, 1, 1, 1),
(104, 44, 33, 27, 1, 0, 97, 137, 40600, 55600, 113, 153, 99, 139, 22800, 37800, 102, 142, 1, 1, 1, 1, 1, 1),
(105, 45, 30, 27, 1, 0, 105, 145, 44400, 59400, 121, 161, 108, 148, 24400, 39400, 110, 150, 1, 1, 1, 1, 1, 1),
(106, 45, 20, 26, 1, 0, 105, 145, 44400, 59400, 121, 161, 108, 148, 24400, 39400, 110, 150, 1, 1, 1, 1, 1, 1),
(107, 46, 25, 54, 1, 0, 88, 128, 36900, 51900, 105, 145, 90, 130, 21300, 36300, 93, 133, 1, 1, 1, 1, 1, 1),
(108, 46, 22, 27, 1, 0, 88, 128, 36900, 51900, 105, 145, 90, 130, 21300, 36300, 93, 133, 1, 1, 1, 1, 1, 1),
(109, 46, 33, 27, 1, 0, 88, 128, 36900, 51900, 105, 145, 90, 130, 21300, 36300, 93, 133, 1, 1, 1, 1, 1, 1),
(110, 47, 30, 27, 1, 0, 90, 130, 37600, 52600, 105, 145, 92, 132, 21600, 36600, 95, 135, 1, 1, 1, 1, 1, 1),
(111, 47, 34, 27, 1, 0, 90, 130, 37600, 52600, 105, 145, 92, 132, 21600, 36600, 95, 135, 1, 1, 1, 1, 1, 1),
(112, 47, 28, 27, 1, 0, 90, 130, 37600, 52600, 105, 145, 92, 132, 21600, 36600, 95, 135, 0, 1, 1, 1, 1, 1),
(113, 48, 35, 27, 1, 0, 91, 131, 38000, 53000, 106, 146, 93, 133, 21700, 36700, 96, 136, 1, 1, 1, 1, 1, 1),
(114, 48, 36, 4, 1, 0, 91, 131, 38000, 53000, 106, 146, 93, 133, 21700, 36700, 96, 136, 1, 1, 1, 1, 1, 1),
(115, 48, 28, 27, 1, 0, 91, 131, 38000, 52000, 106, 146, 93, 133, 21700, 36700, 96, 136, 0, 0, 0, 0, 0, 0),
(119, 52, 17, 26, 1, 0, 121, 161, 54900, 69900, 136, 176, 123, 163, 26800, 41800, 126, 166, 1, 1, 1, 1, 1, 1),
(120, 52, 33, 27, 1, 0, 121, 161, 54900, 69900, 136, 176, 123, 163, 26800, 41800, 126, 166, 1, 1, 1, 1, 1, 1),
(121, 52, 21, 27, 1, 0, 121, 161, 54900, 69900, 136, 176, 123, 163, 26800, 41800, 126, 166, 1, 1, 1, 1, 1, 1),
(123, 54, 35, 27, 1, 0, 141, 181, 63900, 78900, 156, 196, 143, 183, 30200, 45200, 146, 186, 1, 1, 1, 1, 1, 1),
(124, 54, 17, 27, 1, 0, 141, 181, 63900, 78900, 156, 196, 143, 183, 30200, 45200, 146, 186, 1, 1, 1, 1, 1, 1),
(125, 54, 29, 27, 1, 0, 141, 181, 63900, 78900, 156, 196, 143, 183, 30200, 45200, 146, 186, 1, 1, 1, 1, 1, 1),
(126, 54, 32, 26, 1, 0, 141, 181, 63900, 78900, 156, 196, 143, 183, 30200, 45200, 146, 186, 1, 1, 1, 1, 1, 1),
(127, 55, 21, 27, 1, 0, 144, 184, 65600, 80600, 160, 200, 146, 186, 30900, 45900, 149, 189, 0, 0, 0, 0, 0, 0),
(128, 55, 25, 27, 1, 0, 144, 184, 65600, 80600, 160, 200, 146, 186, 30900, 45900, 149, 189, 1, 1, 1, 1, 1, 1),
(129, 55, 34, 24, 1, 0, 144, 184, 65600, 80600, 160, 200, 146, 186, 30900, 45900, 149, 189, 1, 1, 1, 1, 1, 1),
(133, 59, 21, -1, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0),
(134, 60, 17, 1, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0),
(135, 61, 17, 100, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(136, 62, 17, NULL, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(137, 63, 17, NULL, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 11, 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `produits_3`
--

DROP TABLE IF EXISTS `produits_3`;
CREATE TABLE IF NOT EXISTS `produits_3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produit_2_id` int(11) DEFAULT NULL,
  `taille` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4270945DCBFE8EFB` (`produit_2_id`)
) ENGINE=InnoDB AUTO_INCREMENT=599 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `produits_3`
--

INSERT INTO `produits_3` (`id`, `produit_2_id`, `taille`, `stock`) VALUES
(45, 49, '34', 2),
(46, 49, '36', 3),
(47, 49, '38', 3),
(48, 49, '40', 3),
(49, 49, '42', 3),
(50, 49, '44', 3),
(51, 49, '46', 3),
(52, 49, '48', 3),
(53, 49, '50', 3),
(54, 50, '34', 1),
(55, 50, '36', 3),
(56, 50, '38', 3),
(57, 50, '40', 3),
(58, 50, '42', 3),
(59, 50, '44', 3),
(60, 50, '46', 3),
(61, 50, '48', 3),
(62, 50, '50', 2),
(72, 54, '34', 3),
(73, 54, '36', 3),
(74, 54, '38', 3),
(75, 54, '40', 3),
(76, 54, '42', 3),
(77, 54, '44', 3),
(78, 54, '46', 3),
(79, 54, '48', 3),
(80, 54, '50', 3),
(81, 55, '34', 3),
(82, 55, '36', 3),
(83, 55, '38', 3),
(84, 55, '40', 3),
(85, 55, '42', 3),
(86, 55, '44', 3),
(87, 55, '46', 3),
(88, 55, '48', 3),
(89, 55, '50', 3),
(90, 56, '34', 3),
(91, 56, '36', 3),
(92, 56, '38', 3),
(93, 56, '40', 3),
(94, 56, '42', 3),
(95, 56, '44', 3),
(96, 56, '46', 3),
(97, 56, '48', 3),
(98, 56, '50', 3),
(99, 60, '34', 3),
(100, 60, '36', 3),
(101, 60, '38', 3),
(102, 60, '40', 3),
(103, 60, '42', 3),
(104, 60, '44', 3),
(105, 60, '46', 3),
(106, 60, '48', 3),
(107, 60, '50', 3),
(108, 61, '34', 3),
(109, 61, '36', 3),
(110, 61, '38', 3),
(111, 61, '40', 3),
(112, 61, '42', 3),
(113, 61, '44', 3),
(114, 61, '46', 3),
(115, 61, '48', 3),
(116, 61, '50', 3),
(117, 62, '34', 3),
(118, 62, '36', 3),
(119, 62, '38', 3),
(120, 62, '40', 3),
(121, 62, '42', 3),
(122, 62, '44', 3),
(123, 62, '46', 3),
(124, 62, '48', 0),
(125, 62, '50', 3),
(126, 65, '34', 3),
(127, 65, '36', 3),
(128, 65, '38', 3),
(129, 65, '40', 3),
(130, 65, '42', 3),
(131, 65, '44', 3),
(132, 65, '46', 3),
(133, 65, '48', 3),
(134, 65, '50', 3),
(135, 66, '34', 3),
(136, 66, '36', 3),
(137, 66, '38', 3),
(138, 66, '40', 3),
(139, 66, '42', 3),
(140, 66, '44', 3),
(141, 66, '46', 3),
(142, 66, '48', 3),
(143, 66, '50', 3),
(144, 67, '34', 3),
(145, 67, '36', 3),
(146, 67, '38', 3),
(147, 67, '40', 3),
(148, 67, '42', 3),
(149, 67, '44', 3),
(150, 67, '46', 3),
(151, 67, '48', 3),
(152, 67, '50', 3),
(153, 68, '34', 3),
(154, 68, '36', 3),
(155, 68, '38', 3),
(156, 68, '40', 3),
(157, 68, '42', 3),
(158, 68, '44', 3),
(159, 68, '46', 3),
(160, 68, '48', 3),
(161, 68, '50', 3),
(162, 69, '34', 3),
(163, 69, '36', 3),
(164, 69, '38', 3),
(165, 69, '40', 3),
(166, 69, '42', 3),
(167, 69, '44', 3),
(168, 69, '46', 3),
(169, 69, '48', 3),
(170, 69, '50', 3),
(171, 70, '34', 3),
(172, 70, '36', 3),
(173, 70, '38', 3),
(174, 70, '40', 3),
(175, 70, '42', 3),
(176, 70, '44', 3),
(177, 70, '46', 3),
(178, 70, '48', 3),
(179, 70, '50', 3),
(180, 71, '34', 3),
(181, 71, '36', 3),
(182, 71, '38', 3),
(183, 71, '40', 3),
(184, 71, '42', 3),
(185, 71, '44', 3),
(186, 71, '46', 3),
(187, 71, '48', 3),
(188, 71, '50', 3),
(189, 72, '34', 3),
(190, 72, '36', 3),
(191, 72, '38', 3),
(192, 72, '40', 3),
(193, 72, '42', 3),
(194, 72, '44', 3),
(195, 72, '46', 3),
(196, 72, '48', 3),
(197, 72, '50', 3),
(198, 73, '34', 3),
(199, 73, '36', 3),
(200, 73, '38', 3),
(201, 73, '40', 3),
(202, 73, '42', 3),
(203, 73, '44', 3),
(204, 73, '46', 3),
(205, 73, '48', 3),
(206, 73, '50', 3),
(207, 74, '34', 3),
(208, 74, '36', 3),
(209, 74, '38', 3),
(210, 74, '40', 3),
(211, 74, '42', 3),
(212, 74, '44', 3),
(213, 74, '46', 3),
(214, 74, '48', 3),
(215, 74, '50', 3),
(216, 75, '34', 3),
(217, 75, '36', 3),
(218, 75, '38', 3),
(219, 75, '40', 3),
(220, 75, '42', 3),
(221, 75, '44', 3),
(222, 75, '46', 3),
(223, 75, '48', 3),
(224, 75, '50', 3),
(225, 76, '34', 3),
(226, 76, '36', 3),
(227, 76, '38', 3),
(228, 76, '40', 3),
(229, 76, '42', 3),
(230, 76, '44', 3),
(231, 76, '46', 3),
(232, 76, '48', 3),
(233, 76, '50', 3),
(234, 77, '34', 3),
(235, 77, '36', 3),
(236, 77, '38', 3),
(237, 77, '40', 3),
(238, 77, '42', 3),
(239, 77, '44', 3),
(240, 77, '46', 3),
(241, 77, '48', 3),
(242, 77, '50', 3),
(243, 78, '34', 3),
(244, 78, '36', 3),
(245, 78, '38', 3),
(246, 78, '40', 3),
(247, 78, '42', 3),
(248, 78, '44', 3),
(249, 78, '46', 3),
(250, 78, '48', 3),
(251, 78, '50', 3),
(252, 79, '34', 3),
(253, 79, '36', 3),
(254, 79, '38', 3),
(255, 79, '40', 3),
(256, 79, '42', 3),
(257, 79, '44', 3),
(258, 79, '46', 3),
(259, 79, '48', 3),
(260, 79, '50', 3),
(266, 82, '34', 3),
(267, 82, '36', 3),
(268, 82, '38', 3),
(269, 82, '40', 3),
(270, 82, '42', 3),
(271, 82, '44', 3),
(272, 82, '46', 3),
(273, 82, '48', 3),
(274, 82, '50', 3),
(275, 83, '34', 3),
(276, 83, '36', 3),
(277, 83, '38', 3),
(278, 83, '40', 3),
(279, 83, '42', 3),
(280, 83, '44', 3),
(281, 83, '46', 3),
(282, 83, '48', 3),
(283, 83, '50', 3),
(284, 84, '34', 3),
(285, 84, '36', 3),
(286, 84, '38', 3),
(287, 84, '40', 3),
(288, 84, '42', 3),
(289, 84, '44', 3),
(290, 84, '46', 3),
(291, 84, '48', 3),
(292, 84, '50', 3),
(293, 85, '34', 3),
(294, 85, '36', 3),
(295, 85, '38', 3),
(296, 85, '40', 3),
(297, 85, '42', 3),
(298, 85, '44', 3),
(299, 85, '46', 3),
(300, 85, '48', 3),
(301, 86, '34', -95),
(302, 86, '36', 3),
(303, 86, '38', 3),
(304, 86, '40', 3),
(305, 86, '42', 3),
(306, 86, '44', 3),
(307, 86, '46', 3),
(308, 86, '48', 3),
(309, 86, '50', 3),
(310, 87, '34', 3),
(311, 87, '36', 3),
(312, 87, '38', 3),
(313, 87, '40', 3),
(314, 87, '42', 3),
(315, 87, '44', 3),
(316, 87, '46', 3),
(317, 87, '48', 3),
(318, 87, '50', 3),
(319, 88, '34', 1),
(320, 88, '36', 3),
(321, 88, '38', 3),
(322, 88, '40', 3),
(323, 88, '42', 3),
(324, 88, '44', 3),
(325, 88, '46', 3),
(326, 88, '48', 3),
(327, 88, '50', 3),
(328, 89, '34', 3),
(329, 89, '36', 3),
(330, 89, '38', 3),
(331, 89, '40', 3),
(332, 89, '42', 3),
(333, 89, '44', 3),
(334, 89, '46', 3),
(335, 89, '48', 3),
(336, 89, '50', 3),
(337, 90, '34', 3),
(338, 90, '36', 3),
(339, 90, '38', 3),
(340, 90, '40', 3),
(341, 90, '42', 3),
(342, 90, '44', 3),
(343, 90, '46', 3),
(344, 90, '48', 3),
(345, 90, '50', 3),
(346, 91, '34', 3),
(347, 91, '36', 3),
(348, 91, '38', 3),
(349, 91, '40', 3),
(350, 91, '42', 3),
(351, 91, '44', 3),
(352, 91, '46', 3),
(353, 91, '48', 3),
(354, 91, '50', 3),
(355, 92, '34', 3),
(356, 92, '36', 3),
(357, 92, '38', 3),
(358, 92, '40', 3),
(359, 92, '42', 3),
(360, 92, '44', 3),
(361, 92, '46', 3),
(362, 92, '48', 3),
(363, 92, '50', 3),
(364, 99, '34', 3),
(365, 99, '36', 3),
(366, 99, '38', 3),
(367, 99, '40', 3),
(368, 99, '42', 3),
(369, 99, '44', 3),
(370, 99, '46', 3),
(371, 99, '48', 3),
(372, 99, '50', 3),
(373, 100, '36', 3),
(374, 100, '38', 3),
(375, 100, '40', 3),
(376, 101, '36', 3),
(377, 101, '38', 3),
(378, 101, '40', 3),
(379, 102, '34', 3),
(380, 102, '36', 3),
(381, 102, '38', 3),
(382, 102, '40', 3),
(383, 102, '42', 3),
(384, 102, '44', 3),
(385, 102, '46', 3),
(386, 102, '48', 3),
(387, 102, '50', 3),
(388, 103, '34', 3),
(389, 103, '36', 3),
(390, 103, '38', 3),
(391, 103, '40', 3),
(392, 103, '42', 3),
(393, 103, '44', 3),
(394, 103, '46', 3),
(395, 103, '48', 3),
(396, 103, '50', 3),
(397, 104, '34', 3),
(398, 104, '36', 3),
(399, 104, '38', 3),
(400, 104, '40', 3),
(401, 104, '42', 3),
(402, 104, '44', 3),
(403, 104, '46', 3),
(404, 104, '48', 3),
(405, 104, '50', 3),
(406, 105, '34', 3),
(407, 105, '36', 3),
(408, 105, '38', 3),
(409, 105, '40', 3),
(410, 105, '42', 3),
(411, 105, '44', 3),
(412, 105, '46', 3),
(413, 105, '48', 3),
(414, 105, '50', 3),
(415, 106, '34', 2),
(416, 106, '36', 3),
(417, 106, '38', 3),
(418, 106, '40', 3),
(419, 106, '42', 3),
(420, 106, '44', 3),
(421, 106, '46', 3),
(422, 106, '48', 3),
(423, 106, '50', 3),
(424, 107, '34', 3),
(425, 107, '36', 3),
(426, 107, '38', 3),
(427, 107, '40', 3),
(428, 107, '42', 3),
(429, 107, '44', 3),
(430, 107, '46', 3),
(431, 107, '48', 3),
(432, 107, '50', 3),
(433, 108, '34', 3),
(434, 108, '36', 3),
(435, 108, '38', 3),
(436, 108, '40', 3),
(437, 108, '42', 3),
(438, 108, '44', 3),
(439, 108, '46', 3),
(440, 108, '48', 3),
(441, 108, '50', 3),
(442, 109, '34', 3),
(443, 109, '36', 3),
(444, 109, '38', 3),
(445, 109, '40', 3),
(446, 109, '42', 3),
(447, 109, '44', 3),
(448, 109, '46', 3),
(449, 109, '48', 3),
(450, 109, '50', 3),
(451, 110, '34', 3),
(452, 110, '36', 3),
(453, 110, '38', 3),
(454, 110, '40', 3),
(455, 110, '42', 3),
(456, 110, '44', 3),
(457, 110, '46', 3),
(458, 110, '48', 3),
(459, 110, '50', 3),
(460, 111, '34', 3),
(461, 111, '36', 3),
(462, 111, '38', 3),
(463, 111, '40', 3),
(464, 111, '42', 3),
(465, 111, '44', 3),
(466, 111, '46', 3),
(467, 111, '48', 3),
(468, 111, '50', 3),
(469, 112, '34', 3),
(470, 112, '36', 3),
(471, 112, '38', 3),
(472, 112, '40', 3),
(473, 112, '42', 3),
(474, 112, '44', 3),
(475, 112, '46', 3),
(476, 112, '48', 3),
(477, 112, '50', 3),
(478, 113, '34', 3),
(479, 113, '36', 3),
(480, 113, '38', 3),
(481, 113, '40', 3),
(482, 113, '42', 3),
(483, 113, '44', 3),
(484, 113, '46', 3),
(485, 113, '48', 3),
(486, 113, '50', 3),
(487, 114, '34', -20),
(488, 114, '36', 3),
(489, 114, '38', 3),
(490, 114, '40', 3),
(491, 114, '42', 3),
(492, 114, '44', 3),
(493, 114, '46', 3),
(494, 114, '48', 3),
(495, 114, '50', 3),
(496, 115, '34', 3),
(497, 115, '36', 3),
(498, 115, '38', 3),
(499, 115, '40', 3),
(500, 115, '42', 3),
(501, 115, '44', 3),
(502, 115, '46', 3),
(503, 115, '48', 3),
(504, 115, '50', 3),
(505, 119, '34', 2),
(506, 119, '36', 3),
(507, 119, '38', 3),
(508, 119, '40', 3),
(509, 119, '42', 3),
(510, 119, '44', 3),
(511, 119, '46', 3),
(512, 119, '48', 3),
(513, 119, '50', 3),
(514, 120, '34', 3),
(515, 120, '36', 3),
(516, 120, '38', 3),
(517, 120, '40', 3),
(518, 120, '42', 3),
(519, 120, '44', 3),
(520, 120, '46', 3),
(521, 120, '48', 3),
(522, 120, '50', 3),
(523, 121, '34', 3),
(524, 121, '36', 3),
(525, 121, '38', 3),
(526, 121, '40', 3),
(527, 121, '42', 3),
(528, 121, '44', 3),
(529, 121, '46', 3),
(530, 121, '48', 3),
(531, 121, '50', 3),
(532, 123, '34', 3),
(533, 123, '36', 3),
(534, 123, '38', 3),
(535, 123, '40', 3),
(536, 123, '42', 3),
(537, 123, '44', 3),
(538, 123, '46', 3),
(539, 123, '48', 3),
(540, 123, '50', 3),
(541, 124, '34', 3),
(542, 124, '36', 3),
(543, 124, '38', 3),
(544, 124, '40', 3),
(545, 124, '42', 3),
(546, 124, '44', 3),
(547, 124, '46', 3),
(548, 124, '48', 3),
(549, 124, '50', 3),
(550, 125, '34', 3),
(551, 125, '36', 3),
(552, 125, '38', 3),
(553, 125, '40', 3),
(554, 125, '42', 3),
(555, 125, '44', 3),
(556, 125, '46', 3),
(557, 125, '48', 3),
(558, 125, '50', 3),
(559, 126, '34', 2),
(560, 126, '36', 3),
(561, 126, '38', 3),
(562, 126, '40', 3),
(563, 126, '42', 3),
(564, 126, '44', 3),
(565, 126, '46', 3),
(566, 126, '48', 3),
(567, 126, '50', 3),
(568, 127, '34', 3),
(569, 127, '36', 3),
(570, 127, '38', 3),
(571, 127, '40', 3),
(572, 127, '42', 3),
(573, 127, '44', 3),
(574, 127, '46', 3),
(575, 127, '48', 3),
(576, 127, '50', 3),
(577, 128, '34', 3),
(578, 128, '36', 3),
(579, 128, '38', 3),
(580, 128, '40', 3),
(581, 128, '42', 3),
(582, 128, '44', 3),
(583, 128, '46', 3),
(584, 128, '48', 3),
(585, 128, '50', 3),
(586, 129, '34', 3),
(587, 129, '36', 3),
(588, 129, '38', 3),
(589, 129, '40', 3),
(590, 129, '42', 3),
(591, 129, '44', 3),
(592, 129, '46', 3),
(593, 129, '48', 3),
(595, 133, '36', -1),
(596, 134, '36', 1),
(597, 135, '34', -129),
(598, 135, '36', 15);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produit_id` int(11) DEFAULT NULL,
  `utilisateur_id` int(11) DEFAULT NULL,
  `marque_id` int(11) DEFAULT NULL,
  `dateajout` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4DA239F347EFB` (`produit_id`),
  KEY `IDX_4DA239FB88E14F` (`utilisateur_id`),
  KEY `IDX_4DA2394827B9B2` (`marque_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `servicelivraison`
--

DROP TABLE IF EXISTS `servicelivraison`;
CREATE TABLE IF NOT EXISTS `servicelivraison` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `servicelivraison`
--

INSERT INTO `servicelivraison` (`id`, `nom`) VALUES
(1, 'SMS'),
(2, 'SMS'),
(3, 'SMS'),
(4, 'Null'),
(5, 'Null'),
(6, 'MTA'),
(7, 'DHL'),
(8, 'Null'),
(9, 'Null');

-- --------------------------------------------------------

--
-- Table structure for table `servicepaiement`
--

DROP TABLE IF EXISTS `servicepaiement`;
CREATE TABLE IF NOT EXISTS `servicepaiement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `servicepaiement`
--

INSERT INTO `servicepaiement` (`id`, `nom`) VALUES
(1, 'PayPal'),
(2, 'Visa'),
(3, 'Visa'),
(4, 'Visa'),
(5, 'Visa');

-- --------------------------------------------------------

--
-- Table structure for table `sousachats`
--

DROP TABLE IF EXISTS `sousachats`;
CREATE TABLE IF NOT EXISTS `sousachats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int(11) NOT NULL,
  `marque_id` int(11) NOT NULL,
  `valider` int(11) DEFAULT NULL,
  `effacer` int(11) DEFAULT NULL,
  `euro` int(11) DEFAULT NULL,
  `all_a` int(11) DEFAULT NULL,
  `livre` int(11) DEFAULT NULL,
  `usa` int(11) DEFAULT NULL,
  `cfa` int(11) DEFAULT NULL,
  `naira` int(11) DEFAULT NULL,
  `date_a` date NOT NULL,
  `reference` int(11) DEFAULT NULL,
  `achat` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `statut` varchar(255) DEFAULT NULL,
  `accepter` int(11) DEFAULT NULL,
  `livraison` int(11) DEFAULT NULL,
  `expedier` int(11) DEFAULT NULL,
  `date_expedition` varchar(255) DEFAULT NULL,
  `date_reception` varchar(255) DEFAULT NULL,
  `statut_reception` int(11) DEFAULT NULL,
  `date_livraison` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `utilisateurs` (`utilisateur_id`),
  KEY `utilisateur_id` (`utilisateur_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sousachats`
--

INSERT INTO `sousachats` (`id`, `utilisateur_id`, `marque_id`, `valider`, `effacer`, `euro`, `all_a`, `livre`, `usa`, `cfa`, `naira`, `date_a`, `reference`, `achat`, `statut`, `accepter`, `livraison`, `expedier`, `date_expedition`, `date_reception`, `statut_reception`, `date_livraison`) VALUES
(4, 8, 8, 0, 0, NULL, NULL, NULL, NULL, 1, NULL, '2019-07-25', NULL, 'a:7:{s:5:\"image\";O:40:\"Kountac\\KountacBundle\\Entity\\Media_motif\":11:{s:44:\"\0Kountac\\KountacBundle\\Entity\\Media_motif\0id\";i:46;s:51:\"\0Kountac\\KountacBundle\\Entity\\Media_motif\0mannequin\";O:53:\"Proxies\\__CG__\\Kountac\\KountacBundle\\Entity\\Mannequin\":16:{s:17:\"__isInitialized__\";b:0;s:42:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0id\";i:24;s:46:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0marque\";N;s:47:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0picture\";N;s:4:\"file\";N;s:50:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0date_ajout\";N;s:51:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0date_update\";N;s:53:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0nom_mannequin\";N;s:65:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0taille_standard_mannequin\";N;s:55:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0poids_mannequin\";N;s:56:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0taille_mannequin\";N;s:62:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0numero_teint_mannequin\";N;s:61:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0tour_taille_mannequin\";N;s:63:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0tour_poitrine_mannequin\";N;s:70:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0tour_grandes_hanches_mannequin\";N;s:56:\"\0Kountac\\KountacBundle\\Entity\\Mannequin\0statut_mannequin\";N;}s:51:\"\0Kountac\\KountacBundle\\Entity\\Media_motif\0produit_2\";O:54:\"Proxies\\__CG__\\Kountac\\KountacBundle\\Entity\\Produits_2\":27:{s:17:\"__isInitialized__\";b:1;s:43:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0id\";i:50;s:50:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0produit_1\";O:54:\"Proxies\\__CG__\\Kountac\\KountacBundle\\Entity\\Produits_1\":16:{s:17:\"__isInitialized__\";b:1;s:43:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0id\";i:27;s:51:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0collection\";O:55:\"Proxies\\__CG__\\Kountac\\KountacBundle\\Entity\\Collections\":3:{s:17:\"__isInitialized__\";b:0;s:44:\"\0Kountac\\KountacBundle\\Entity\\Collections\0id\";i:4;s:45:\"\0Kountac\\KountacBundle\\Entity\\Collections\0nom\";N;}s:50:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0produit_2\";O:33:\"Doctrine\\ORM\\PersistentCollection\":2:{s:13:\"\0*\0collection\";O:43:\"Doctrine\\Common\\Collections\\ArrayCollection\":1:{s:53:\"\0Doctrine\\Common\\Collections\\ArrayCollection\0elements\";a:0:{}}s:14:\"\0*\0initialized\";b:0;}s:50:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0categorie\";O:54:\"Proxies\\__CG__\\Kountac\\KountacBundle\\Entity\\Categories\":5:{s:17:\"__isInitialized__\";b:0;s:43:\"\0Kountac\\KountacBundle\\Entity\\Categories\0id\";i:14;s:49:\"\0Kountac\\KountacBundle\\Entity\\Categories\0children\";N;s:47:\"\0Kountac\\KountacBundle\\Entity\\Categories\0parent\";N;s:44:\"\0Kountac\\KountacBundle\\Entity\\Categories\0nom\";N;}s:46:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0looks\";O:55:\"Proxies\\__CG__\\Kountac\\KountacBundle\\Entity\\Idees_looks\":3:{s:17:\"__isInitialized__\";b:0;s:44:\"\0Kountac\\KountacBundle\\Entity\\Idees_looks\0id\";i:5;s:45:\"\0Kountac\\KountacBundle\\Entity\\Idees_looks\0nom\";N;}s:47:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0marque\";C:51:\"Utilisateurs\\UtilisateursBundle\\Entity\\Utilisateurs\":206:{a:8:{i:0;s:60:\"$2y$13$nF5bt32v7MmjOp74xFGJXOKKylzV4VNYxWWsyLoDh0JB4ZtMOz8ge\";i:1;N;i:2;s:7:\"kroskel\";i:3;s:7:\"Kroskel\";i:4;b:1;i:5;i:8;i:6;s:23:\"ornelladjoukui@yahoo.fr\";i:7;s:23:\"ornelladjoukui@yahoo.fr\";}}s:44:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0nom\";s:10:\"Veste Sota\";s:48:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0matiere\";s:5:\"Coton\";s:52:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0description\";s:209:\"La veste Sota est une veste en coton couleur jaune soufre, qui descend jusque au-dessous des petites hanches. Elle possède une poche de chaque côté, n’est pas boutonnée et présente un large col cranté.\";s:63:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0conditions_utilisation\";s:341:\"Dans le cas de lavages au lave—linge, utiliser un programme à 40° maximum, une lessive liquide sans agent blanchissant et opter pour un faible essorage. Cette veste peut être séchée à la machine, en choisissant le programme adéquat. Repasser au programme coton en protégeant d’une trop grande chaleur du fer par une pattemouille.\";s:51:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0popularite\";i:1;s:46:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0stock\";i:27;s:50:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0dateajout\";O:8:\"DateTime\":3:{s:4:\"date\";s:26:\"2018-12-14 00:00:00.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}s:51:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0dateupdate\";O:8:\"DateTime\":3:{s:4:\"date\";s:26:\"2018-12-15 00:00:00.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}s:50:\"\0Kountac\\KountacBundle\\Entity\\Produits_1\0dateachat\";N;}s:50:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0produit_3\";O:33:\"Doctrine\\ORM\\PersistentCollection\":2:{s:13:\"\0*\0collection\";O:43:\"Doctrine\\Common\\Collections\\ArrayCollection\":1:{s:53:\"\0Doctrine\\Common\\Collections\\ArrayCollection\0elements\";a:0:{}}s:14:\"\0*\0initialized\";b:0;}s:52:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0commentaire\";O:33:\"Doctrine\\ORM\\PersistentCollection\":2:{s:13:\"\0*\0collection\";O:43:\"Doctrine\\Common\\Collections\\ArrayCollection\":1:{s:53:\"\0Doctrine\\Common\\Collections\\ArrayCollection\0elements\";a:0:{}}s:14:\"\0*\0initialized\";b:0;}s:48:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0libelle\";O:58:\"Proxies\\__CG__\\Kountac\\KountacBundle\\Entity\\Libelles_motif\":6:{s:17:\"__isInitialized__\";b:1;s:47:\"\0Kountac\\KountacBundle\\Entity\\Libelles_motif\0id\";i:25;s:54:\"\0Kountac\\KountacBundle\\Entity\\Libelles_motif\0mannequin\";O:33:\"Doctrine\\ORM\\PersistentCollection\":2:{s:13:\"\0*\0collection\";O:43:\"Doctrine\\Common\\Collections\\ArrayCollection\":1:{s:53:\"\0Doctrine\\Common\\Collections\\ArrayCollection\0elements\";a:0:{}}s:14:\"\0*\0initialized\";b:0;}s:52:\"\0Kountac\\KountacBundle\\Entity\\Libelles_motif\0libelle\";s:5:\"Jaune\";s:4:\"path\";s:45:\"e413af2371c7bf4458a0af5d18622f6823179d93.jpeg\";s:4:\"file\";N;}s:46:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0stock\";i:27;s:45:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0etat\";b:1;s:50:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0reduction\";d:0;s:48:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0allprix\";d:70;s:56:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0allprixCommande\";d:110;s:55:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0allprecommande\";b:0;s:49:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0europrix\";d:65;s:57:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0europrixCommande\";d:105;s:56:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0europrecommande\";b:0;s:48:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0cfaprix\";d:27000;s:56:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0cfaprixCommande\";d:42000;s:55:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0cfaprecommande\";b:0;s:48:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0usaprix\";d:80;s:56:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0usaprixCommande\";d:120;s:55:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0usaprecommande\";b:0;s:50:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0livreprix\";d:65;s:58:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0livreprixCommande\";d:105;s:57:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0livreprecommande\";b:0;s:50:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0nairaprix\";d:17900;s:58:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0nairaprixCommande\";d:35900;s:57:\"\0Kountac\\KountacBundle\\Entity\\Produits_2\0nairaprecommande\";b:0;}s:4:\"path\";s:45:\"275a95fbf667e267ec46fe65204c0c6af231b510.jpeg\";s:5:\"path2\";s:46:\"dc0d0ce54740af42c31ebcbdba2e39a2a7acc4be2.jpeg\";s:5:\"path3\";s:46:\"a3845775a3879f5f22aa92b8b2de2df2a07e77fc3.jpeg\";s:45:\"\0Kountac\\KountacBundle\\Entity\\Media_motif\0top\";b:0;s:4:\"file\";N;s:5:\"file2\";N;s:5:\"file3\";N;s:9:\"modifieLe\";O:8:\"DateTime\":3:{s:4:\"date\";s:26:\"2019-07-25 15:26:07.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}}s:6:\"taille\";s:2:\"34\";s:9:\"reference\";s:10:\"Veste Sota\";s:5:\"motif\";s:5:\"Jaune\";s:8:\"quantite\";s:1:\"2\";s:4:\"prix\";d:27000;s:6:\"devise\";s:4:\"fcfa\";}', 'Expedier', 1, 0, 1, '2019-08-07', '2019-08-12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sur_mesures`
--

DROP TABLE IF EXISTS `sur_mesures`;
CREATE TABLE IF NOT EXISTS `sur_mesures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_id` int(11) DEFAULT NULL,
  `service_livraison_id` int(11) DEFAULT NULL,
  `service_paiement_id` int(11) DEFAULT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexe` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pays` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cp` double DEFAULT NULL,
  `telephone` double DEFAULT NULL,
  `telephonefix` double DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codeparrain` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `marque` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_entreprise` longtext COLLATE utf8_unicode_ci,
  `pays_entreprise` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville_entreprise` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse_entreprise` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rue_entreprise` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cp_entreprise` int(11) DEFAULT NULL,
  `telephone_entreprise` double DEFAULT NULL,
  `telephonefix_entreprise` double DEFAULT NULL,
  `departement` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `digicode` double DEFAULT NULL,
  `verifier` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_497B315E92FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_497B315EA0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_497B315EC05FB297` (`confirmation_token`),
  UNIQUE KEY `UNIQ_497B315E51F88EC0` (`service_livraison_id`),
  UNIQUE KEY `UNIQ_497B315EE6D662D4` (`service_paiement_id`),
  KEY `IDX_497B315E3DA5256D` (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `image_id`, `service_livraison_id`, `service_paiement_id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `nom`, `prenom`, `sexe`, `pays`, `adresse`, `rue`, `ville`, `cp`, `telephone`, `telephonefix`, `code`, `codeparrain`, `points`, `marque`, `description_entreprise`, `pays_entreprise`, `ville_entreprise`, `adresse_entreprise`, `rue_entreprise`, `cp_entreprise`, `telephone_entreprise`, `telephonefix_entreprise`, `departement`, `digicode`, `verifier`) VALUES
(3, 3, 1, 1, 'damss_admin', 'damss_admin', 'dwohwe@yahoo.fr', 'dwohwe@yahoo.fr', 1, NULL, '$2y$13$825iw1zFYHGg2CVlbb2lT.93ZD/rG.JwLHfy/1y6qI0ahZk0WEV8K', '2019-08-01 06:22:28', NULL, NULL, 'a:2:{i:0;s:8:\"ROLE_PRO\";i:1;s:10:\"ROLE_ADMIN\";}', 'Sambo', 'Damien', '0', 'AF', 'Ngaoundéré', '12 rue de Valois', 'Ngaoundéré', 454, 3398432804665, 237694584538, NULL, NULL, NULL, 'kountac_admin', 'Administration de Kountac', 'CM', 'Ngaoundéré', 'Ngaoundéré', 'Comportement bar', 454, 6564545454, 679835554, '', NULL, NULL),
(5, 5, NULL, NULL, 'bantou_nomade', 'bantou_nomade', 'damien.wohwe@univ-ndere.cm', 'damien.wohwe@univ-ndere.cm', 1, NULL, '$2y$13$ns43CLX2C1nK6fKmesEA2.lmzQzEF8vAuotP/4Vclskv5cFbJcDp6', '2018-12-19 14:02:16', NULL, NULL, 'a:1:{i:0;s:8:\"ROLE_PRO\";}', 'Wohwe Sambo', 'Damien', '0', 'AF', 'Ngaoundéré', NULL, 'Ngaoundéré', 454, 33984328046, NULL, NULL, NULL, NULL, 'Damien Wohwe Sambo', 'A propos de ma marque personnelle', 'FR', 'Ngaoundéré', 'Ngaoundéré', '12 rue de valois', 454, 33984328046, NULL, 'Mfoundi', 4545, NULL),
(7, 7, 7, NULL, 'donapav', 'donapav', 'donapav@gmail.com', 'donapav@gmail.com', 1, NULL, '$2y$13$2OKOXseHfzx4mPz/WpwVR.Eij2e4fsrw7adC4gNAT/ECqOwX9rlpq', '2019-04-17 13:23:12', NULL, NULL, 'a:2:{i:0;s:8:\"ROLE_PRO\";i:1;s:10:\"ROLE_ADMIN\";}', 'Pavolini', 'Donatella', '1', 'FR', '12 rue du Valois', '12 rue du valois', 'Les Ulis', 91940, 781857285, 164915537, NULL, NULL, NULL, 'Kroskel', 'Ça, c\'est à faire. Encore un souci d\'adresse : ici il y a \"adresse\" puis \"rue\"... Et je ne comprends pas : peut-on ou pas créer plusieurs comptes perso pour la même marque ?', 'FR', 'Les Ulis', NULL, '12 rue du valois', 91940, 781857285, NULL, 'Essonne', NULL, NULL),
(8, 8, 4, 3, 'Kroskel', 'kroskel', 'ornelladjoukui@yahoo.fr', 'ornelladjoukui@yahoo.fr', 1, NULL, '$2y$13$nF5bt32v7MmjOp74xFGJXOKKylzV4VNYxWWsyLoDh0JB4ZtMOz8ge', '2019-08-06 13:52:53', NULL, NULL, 'a:1:{i:0;s:8:\"ROLE_PRO\";}', 'DJOUKUI', 'Ornella', '1', 'FR', '12 rue de Valois', '12 rue du valois', 'Les Ulis', 91940, 644784429, 644784429, NULL, NULL, NULL, 'Kroskel', 'Kroskel est une marque de prêt à porter et de sur-mesure spécialisée dans la création de vêtements et d\'accessoires pour femmes, hommes et enfants. La marque personnalise ses créations en associant du tissus teintés de façon artisanale à des matières plus classiques. Le résultat donne une ligne chaude qui ajoute sa touche d\'originalité à ce qui se définit comme de la mode Afropéenne. Les produits sont conçus et modélisés en France, et exclusivement fabriqués en Afrique. Par ce choix du lieu de fabrication, la marque espère apporter sa patte au développement du continent.', 'FR', 'Les Ulis', '12 rue de Valois', 'De Valois', 91940, 644784429, 644784429, 'Essonne', NULL, 1),
(15, 16, 5, 4, 'ChrisME', 'chrisme', 'christianmeli81@gmail.com', 'christianmeli81@gmail.com', 1, NULL, '$2y$13$3zrZEmYNgkq138fyl.46cOe7xpcghR4OqWc/vsvi4j0SkIqNvGmw6', '2019-07-15 01:31:16', NULL, NULL, 'a:0:{}', 'MELI', 'CHRISTIAN', '0', 'CM', 'Bonamoussadi', 'fin goudron afrique du sud', 'Douala', 0, 698880522, 698880522, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WOURI', 0, NULL),
(17, 22, 3, NULL, 'MonsieurPi', 'monsieurpi', 'jmfcad@hotmail.fr', 'jmfcad@hotmail.fr', 1, NULL, '$2y$13$99Zjf27ovJAq87qKj0zhbugmLzlWCeJwRxJUQElYP4xt.oKBPKo6C', '2019-02-22 16:25:51', NULL, NULL, 'a:0:{}', 'Roux', 'Mattias', '0', 'FR', '12', 'rue de Valois', 'Les Ulis', 91940, 659261956, 984328046, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '91', NULL, NULL),
(18, 27, NULL, NULL, 'foster05', 'foster05', 'mtinafoss05@gmail.com', 'mtinafoss05@gmail.com', 1, NULL, '$2y$13$Nd/5Pd1942e0QbbFvGD8I.a/c92NjiliOVdS5urEiim4GY.j.ff9O', '2019-02-10 18:56:42', NULL, NULL, 'a:0:{}', 'Fossi', 'Tatiana', '1', 'DE', 'Niersterfeldstr', '03', 'Dortmund', 44329, 15731383571, 23113098782, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Nordrhein-Westfalen', NULL, NULL),
(19, 28, NULL, NULL, 'Tata rosalie', 'tata rosalie', 'kengne.rosalie@yahoo.fr', 'kengne.rosalie@yahoo.fr', 1, NULL, '$2y$13$paoxRYD6.9XZIKxO9ZgrxuWjxbflPA4HhnJu94k6U8B5eriotDuxC', '2019-02-10 19:23:02', NULL, NULL, 'a:0:{}', 'Kengne', 'Rosalie', '1', 'CM', 'Hapy', 'Odza', 'Yaoundé', 7652, 699539509, 679525263, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mfoundi', NULL, NULL),
(20, 29, 6, NULL, 'NDJOO', 'ndjoo', 'djovany.7@gmail.com', 'djovany.7@gmail.com', 1, NULL, '$2y$13$abXceN/2UigY6ljOlMHFcegO6e0mkyZiddSj6f2ke0VxEIuLFU8sy', '2019-04-11 16:13:51', NULL, NULL, 'a:2:{i:0;s:8:\"ROLE_PRO\";i:1;s:10:\"ROLE_ADMIN\";}', 'DJOUKUI', 'Ornella', '1', 'FR', '12 rue de Valois', 'Res La Treille', 'Les Ulis', 91940, 783770322, 783770322, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ESSONNE', 1234, NULL),
(21, 32, NULL, NULL, 'Wadouf', 'wadouf', 'wadouf@gmail.com', 'wadouf@gmail.com', 1, NULL, '$2y$13$UFhRPLRz/eNUsnUL94rUBep8xsqaQXsC6cWfYmvLH5kQxW3QnrMN.', '2019-02-13 14:01:16', NULL, NULL, 'a:0:{}', 'WADOUFEY', 'Abel', '0', 'CM', 'Ngousso, Yaoundé Cameroun', NULL, 'Yaoundé', 157, 696472400, 650125212, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yaoundé 4', 237, NULL),
(22, 34, 8, NULL, 'donapavo', 'donapavo', 'donapavo@free.fr', 'donapavo@free.fr', 1, NULL, '$2y$13$caFjqnh9.dIQsvMBtKYH3uCrBB5SqgakdSEs/HskUoOxGDNnIYCU6', '2019-02-22 16:21:37', NULL, NULL, 'a:0:{}', 'Pavolini', 'Donatella', '1', 'FR', '66 rue du couvent', '66 rue du couvent', 'Limours', 91470, 781857285, 164915537, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Essonne', NULL, NULL),
(41, 59, 9, 5, 'ChrisME237', 'chrisme237', 'christianmeli81@yahoo.fr', 'christianmeli81@yahoo.fr', 1, NULL, '$2y$13$WNWDhJGIWGmuwWzuSTFPiunq9IS7/qnOFlQXFO2jRyw8JAvrA.WNu', '2019-07-25 16:23:37', NULL, NULL, 'a:1:{i:0;s:8:\"ROLE_PRO\";}', 'MEL', 'Chris', '0', 'AF', 'test', 'Logbessou', 'Douala', 1234, 689880522, 698880522, '4WE53PA \n', NULL, 1000, 'ChrisME237', 'ergsq f sdw f', 'AF', 'Douala', NULL, 'Douala', 1234, 698880522, NULL, NULL, NULL, 1),
(42, 60, NULL, NULL, 'Roux', 'roux', '3muvj4e6y03x@opayq.com', '3muvj4e6y03x@opayq.com', 1, NULL, '$2y$13$x07PGfERyQnnJq1jBjb42eaHv/1j9UEs6L0M7eVW7xga2/MqAXFuO', '2019-04-11 15:56:49', NULL, NULL, 'a:1:{i:0;s:8:\"ROLE_PRO\";}', 'Roux', 'Roux', '0', 'FR', 'Roux', NULL, 'Les Ulis', 91940, 659261956, NULL, 'MHTMMYH \n', 'Roux', 1000, 'Roux', 'Roux', 'FR', 'Les Ulis', NULL, 'Roux', 91940, 659261956, NULL, NULL, NULL, NULL),
(43, 61, NULL, NULL, 'donclaros', 'donclaros', 'donclaros@free.fr', 'donclaros@free.fr', 0, NULL, '$2y$13$SwN.NrX9TVj/rrGHaHaHOuLrzM6/XGt2mXuSh8.N/TqgE.GvwLA5O', NULL, 'dHVNjy2y1RvwyHNqEMyI4oJzUki3RvMqnWX-8IBV0v0', NULL, 'a:0:{}', 'Don', 'Claros', '1', 'FR', '66 rue du couvent', NULL, 'Limours', 91470, 781857285, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 62, NULL, NULL, 'DIDIROUX', 'didiroux', 'didi.roux@free.fr', 'didi.roux@free.fr', 0, NULL, '$2y$13$nXuzfNp1P3xDF3e3XXA./.NonKZBMe8CAzZzPJLGesjBLXh2P4WVq', NULL, 'Dx4ekBNiI_s9_-7zWO9n59lQM_ZQPRsop8NybspDsUM', NULL, 'a:1:{i:0;s:8:\"ROLE_PRO\";}', 'Roux', 'Elisabeth', '1', 'FR', '66 rue du couvent', NULL, 'Limours', 91470, 781857285, NULL, '4S8PRJM \n', NULL, 1000, 'DIDIROUX', 'DIDIDIDIDIDIDIDIDIDIDI', 'FR', 'Limours', NULL, '66 rue du couvent', 91470, 781857285, NULL, NULL, NULL, NULL),
(52, 70, NULL, NULL, 'ChrisME0', 'chrisme0', 'chris@gmaik.com', 'chris@gmaik.com', 0, NULL, '$2y$13$xX8vOoal8WWQSxuPSjM0n.1AOeZejRwm9QBD2eMNDVrvRvac68vHu', NULL, 'yl-U8pqNVDRqSbJvINlcaBOXOcZhP6qyr0RhXJuad1U', NULL, 'a:0:{}', 'MELI', 'Christian', '0', 'AF', NULL, NULL, 'Douala', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 72, NULL, NULL, 'ChrisME007', 'chrisme007', 'chris@gmail.com', 'chris@gmail.com', 1, NULL, '$2y$13$0.8YzLei/tbV2q6g1.ygxeruoacqj/jSQYJpFcfs8GLNIAYiCMDIu', '2019-07-15 01:45:13', NULL, NULL, 'a:1:{i:0;s:8:\"ROLE_PRO\";}', 'MELI', 'Christian', '0', 'AF', 'Odza', 'deuxieme entree du lycee', 'Yaoundé', 1980, 650504902, NULL, 'UF0ZZH5 \n', NULL, 1000, 'ChrisME007', 'test', 'AF', 'Yaoundé', NULL, 'Odza', 12797, 650504902, NULL, NULL, NULL, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achats`
--
ALTER TABLE `achats`
  ADD CONSTRAINT `FK_9920924EFB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `FK_3AF34668727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chatmessage`
--
ALTER TABLE `chatmessage`
  ADD CONSTRAINT `FK_617356963B49782D` FOREIGN KEY (`recepteur_id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_61735696F675F31B` FOREIGN KEY (`author_id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `FK_35D4282C3DA5256D` FOREIGN KEY (`image_id`) REFERENCES `media_motif` (`id`),
  ADD CONSTRAINT `FK_35D4282C4827B9B2` FOREIGN KEY (`marque_id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_35D4282CBCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_35D4282CF347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produits_2` (`id`),
  ADD CONSTRAINT `FK_35D4282CFB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `FK_D9BEC0C4F347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produits_2` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mannequin`
--
ALTER TABLE `mannequin`
  ADD CONSTRAINT `FK_F2BC00874827B9B2` FOREIGN KEY (`marque_id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `media_motif`
--
ALTER TABLE `media_motif`
  ADD CONSTRAINT `FK_98CAB30A58DDEC98` FOREIGN KEY (`mannequin_id`) REFERENCES `mannequin` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_98CAB30ACBFE8EFB` FOREIGN KEY (`produit_2_id`) REFERENCES `produits_2` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mesures`
--
ALTER TABLE `mesures`
  ADD CONSTRAINT `FK_4B54A559FB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`);

--
-- Constraints for table `produits_1`
--
ALTER TABLE `produits_1`
  ADD CONSTRAINT `FK_AC7EF5714827B9B2` FOREIGN KEY (`marque_id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_AC7EF571514956FD` FOREIGN KEY (`collection_id`) REFERENCES `collections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_AC7EF5716852BE12` FOREIGN KEY (`looks_id`) REFERENCES `idees_looks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_AC7EF571BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `produits_2`
--
ALTER TABLE `produits_2`
  ADD CONSTRAINT `FK_3577A4CB25DD318D` FOREIGN KEY (`libelle_id`) REFERENCES `libelles_motif` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_3577A4CBD94B2115` FOREIGN KEY (`produit_1_id`) REFERENCES `produits_1` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `produits_3`
--
ALTER TABLE `produits_3`
  ADD CONSTRAINT `FK_4270945DCBFE8EFB` FOREIGN KEY (`produit_2_id`) REFERENCES `produits_2` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `FK_4DA2394827B9B2` FOREIGN KEY (`marque_id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_4DA239F347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produits_3` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_4DA239FB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `FK_497B315E3DA5256D` FOREIGN KEY (`image_id`) REFERENCES `media` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_497B315E51F88EC0` FOREIGN KEY (`service_livraison_id`) REFERENCES `servicelivraison` (`id`),
  ADD CONSTRAINT `FK_497B315EE6D662D4` FOREIGN KEY (`service_paiement_id`) REFERENCES `servicepaiement` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
