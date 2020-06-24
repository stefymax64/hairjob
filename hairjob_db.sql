-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 25 juin 2020 à 00:03
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hairjob_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `advert`
--

CREATE TABLE `advert` (
  `id` int(11) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `published` tinyint(1) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `nb_applications` int(11) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `advert`
--

INSERT INTO `advert` (`id`, `image_id`, `date`, `title`, `content`, `published`, `updated_at`, `nb_applications`, `slug`, `author`) VALUES
(4, 4, '2020-06-17 16:25:00', 'Recherche Barbier H/F', '<p>Salon dynamique recherche un/e coiffeur/se sp&eacute;cialiste de&nbsp;la barbe!&nbsp;</p>', 1, '2020-06-24 14:24:40', 0, 'recherche-barbier-h-f', 'Clémentine'),
(5, 5, '2020-05-11 08:45:00', 'Manager', '<p>Dans le cadre de son d&eacute;veloppement, le Groupe Martin recherche un coiffeur ou un coiffeuse exp&eacute;riment&eacute;(e).<br />\r\nCet oasis de bien &ecirc;tre compos&eacute; de plusieurs espaces, technique, coupe, barbier et VIP.</p>\r\n\r\n<p>L&#39;&eacute;tablissement b&eacute;n&eacute;ficie d&#39;une large client&egrave;le avec des styles vari&eacute;s &agrave; l&#39;image du personnel qui le compose.<br />\r\nSalaire en fonction de l&#39;exp&eacute;rience.</p>\r\n\r\n<p>Adresse : Magny (77)</p>\r\n\r\n<p>Alors n&#39;h&eacute;sitez pas contactez-nous pour nous rejoindre au 065991256 demandez Marie ou envoyez votre cv et lettre de motivation &agrave; marie@groupemartin.fr</p>', 1, '2020-06-24 18:05:36', 0, 'manager', 'Martin'),
(6, 6, '2020-05-16 18:45:00', 'Coiffeur / Barbier', '<p>Le salon Lab-barbershop situ&eacute; &agrave; Asni&egrave;res-sur-Seine recherche actuellement :<br />\r\n<br />\r\n-des coiffeurs/barbiers<br />\r\n<br />\r\n-un manager avec un projet ambitieux.<br />\r\n<br />\r\nMerci de me contacter &agrave; l&#39;adresse suivante : ophelie-augeard@outlook.fr</p>', 1, '2020-06-24 18:47:25', 0, 'coiffeur-barbier', 'Augustin'),
(7, 7, '2020-05-21 23:34:00', 'Coiffeur/ Coiffeuse', '<p>Le salon Jean Claude Convenant Ollioules (Centre commercial Carrefour), recherche coiffeur/coiffeuse &quot;coupe et technique&quot; pour CDI 35H - 39H avec prime sur le chiffre d&#39;affaire et vente. Vous &ecirc;tes titulaire d&#39;un CAP et BP coiffure OBLIGATOIRE (Franchis&eacute; ind&eacute;pendant Jean Claude Convenant).</p>\r\n\r\n<p>Contact : JCC 0660225897&nbsp;</p>', 1, '2020-06-24 23:37:33', 0, 'coiffeur-coiffeuse', 'Jean-Claude Convenant'),
(8, 8, '2020-06-24 23:37:00', 'Coiffeur/ coiffeuse (H/F) - Temps partiel- 1700 euros', '<p>Pour un salon de coiffure situ&eacute; &agrave; Antony (92160) cot&eacute; RER Parc de Sceaux.<br />\r\nNous recherchons un(e) coiffeur(se) avec une bonne ma&icirc;trise de la technique et de la coupe. Titulaire du Brevet Professionnel.<br />\r\nContrat CDD de 15 mois,<br />\r\nEmploi du Temps : 3 jours 1/2 par semaine.<br />\r\nSalaire de base : Mensuel de 1500 Euros &agrave; 1700 Euros (Brut), selon profil et exp&eacute;rience + pourcentage sur Chiffre d&#39;affaires<br />\r\nSalon conviviale avec une tr&egrave;s bonne ambiance.<br />\r\nVacances d&#39;&eacute;t&eacute; assur&eacute;s.</p>\r\n\r\n<p>Contactez Anthony au 0664521389</p>', 1, '2020-06-24 23:38:59', 0, 'coiffeur-coiffeuse-h-f-temps-partiel-1700-euros', 'Anthony'),
(9, 9, '2020-06-01 23:39:00', 'Recherche coiffeuse (Loire-Atlantique)', '<p>Salon Chantal Coiffure Batz sur mer recherche coiffeuse d&egrave;s que possible pour CDD ou CDI .<br />\r\nSalaire &agrave; d&eacute;battre selon exp&eacute;rience et qualification&nbsp;</p>\r\n\r\n<p>Chantal 0684351247 ou 0240235896</p>', 1, '2020-06-24 23:40:41', 0, 'recherche-coiffeuse-loire-atlantique', 'Chantal'),
(10, 10, '2020-06-24 23:40:00', 'Recrute coiffeur(se) à Villeneuve sur Lot 47 (Lot-et-Garonne)', '<p>Salon de coiffure &agrave; Villeneuve sur lot recrute un(e) coiffeur(se) mixte, exp&eacute;rience 2 &agrave; 4 ans et plus, avec brevet professionnel.<br />\r\nDescription du poste: accueil et services &agrave; la client&egrave;le.<br />\r\nVous travaillerez &eacute;galement avec autonomie et initiative, pour la gestion du salon et des stocks.<br />\r\nLe g&eacute;rant n&#39;&eacute;tant pas sur place, vous collaborerez de fa&ccedil;on &eacute;troite.<br />\r\nVos horaires seront : 9h-12h et 14h-18h du mardi au samedi. Souplesse sur la prise des cong&eacute;s.<br />\r\nType de contrat: CDI temps complet. Salaire conventionnel + primes.<br />\r\nPrise de poste en juillet/ao&ucirc;t 2020.<br />\r\nLieu de travail: Villeneuve sur Lot<br />\r\nSi vous &ecirc;tes d&eacute;butant.e mais que vous avez la volont&eacute; de vous investir dans un projet, le poste est pour vous.<br />\r\nSi vous &ecirc;tes exp&eacute;riment&eacute;.e et que le salariat autonome vous int&eacute;resse, le poste est pour vous &eacute;galement.<br />\r\nTel: 05 63 95 36 82. Joignable toute la journ&eacute;e.<br />\r\nEnvoyez CV et lettre de motivation &agrave; : Sarl Lillol - 82150 Montaigu de quercy.<br />\r\nN&#39;ENVOYER PAS DIRECTEMENT VOTRE CV PAR EMAIL, PREFEREZ UN ENVOI POSTAL OU UN CONTACT TELEPHONE.</p>', 1, '2020-06-24 23:42:31', 0, 'recrute-coiffeur-se-a-villeneuve-sur-lot-47-lot-et-garonne', 'SARL Lillol'),
(11, 11, '2020-06-24 23:42:00', 'Coiffeurs polyvalent (Hérault)', '<p>Le salon les f&eacute;es m&egrave;ches a castelnau le lez . Recherche un (e) salari&eacute; (e) motiv&eacute; (e) ambitieux (se) poss&eacute;dant le sens artistique coiffure, techniques de m&egrave;ches et balayages toutes confondues. &nbsp;Exp&eacute;rience 1 an apr&egrave;s bp, pour travailler dans une ambiance urbaine chic, sereine en confiance ayant le sens des responsabilit&eacute;s &nbsp;. &nbsp;Salaire fixe et %&nbsp;</p>\r\n\r\n<p>Contact : 0467566125</p>', 1, '2020-06-24 23:44:09', 0, 'coiffeurs-polyvalent-herault', 'Sylvie'),
(12, 12, '2020-05-22 23:44:00', 'coiffeuse ou coiffeur (Côte-d-Or)', '<p>TR&Egrave;S URGENT<br />\r\n<br />\r\nRecherche coiffeur (se) pour une p&eacute;riode de trois mois minimum pour remplacement accident.<br />\r\nD&eacute;partement de la c&ocirc;te d&#39;or<br />\r\n<br />\r\nt&eacute;l:06-19-15-43-31</p>', 1, '2020-06-24 23:45:27', 0, 'coiffeuse-ou-coiffeur-cote-d-or', 'Nolay'),
(13, 13, '2020-06-05 23:45:00', 'RECHERCHE APPRENTI(E) CAP 1ere année (Côte-d-Or)', '<p>Salon recherche apprenti(e) CAP 1&egrave;re ann&eacute;e. Me contacter au 03.80.74.88.08 Pr&eacute;voir lettre de motivation, copie du dernier bulletin scolaire. La pr&eacute;sentation par les parents serait un plus.</p>\r\n\r\n<p>&nbsp;</p>', 1, '2020-06-24 23:47:48', 0, 'recherche-apprenti-e-cap-1ere-annee-cote-d-or', 'St Apollinaire');

-- --------------------------------------------------------

--
-- Structure de la table `advert_category`
--

CREATE TABLE `advert_category` (
  `advert_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `advert_category`
--

INSERT INTO `advert_category` (`advert_id`, `category_id`) VALUES
(4, 43),
(5, 40),
(6, 43),
(7, 42),
(8, 42),
(9, 42),
(10, 42),
(11, 42),
(12, 42),
(13, 48);

-- --------------------------------------------------------

--
-- Structure de la table `advert_levels`
--

CREATE TABLE `advert_levels` (
  `advert_id` int(11) NOT NULL,
  `advert_skill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `advert_levels`
--

INSERT INTO `advert_levels` (`advert_id`, `advert_skill_id`) VALUES
(4, 11),
(5, 13),
(6, 11),
(7, 12),
(8, 12),
(9, 11),
(10, 11),
(11, 11),
(12, 11),
(13, 11);

-- --------------------------------------------------------

--
-- Structure de la table `advert_newskill`
--

CREATE TABLE `advert_newskill` (
  `advert_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `advert_newskill`
--

INSERT INTO `advert_newskill` (`advert_id`, `skill_id`) VALUES
(4, 53),
(5, 57),
(6, 47),
(7, 47),
(8, 47),
(9, 47),
(10, 49),
(11, 47),
(12, 50),
(13, 49);

-- --------------------------------------------------------

--
-- Structure de la table `advert_skill`
--

CREATE TABLE `advert_skill` (
  `id` int(11) NOT NULL,
  `advert_id` int(11) DEFAULT NULL,
  `skill_id` int(11) DEFAULT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `advert_skill`
--

INSERT INTO `advert_skill` (`id`, `advert_id`, `skill_id`, `level`) VALUES
(11, NULL, NULL, 'Débutant(e)'),
(12, NULL, NULL, 'Intermédiaire'),
(13, NULL, NULL, 'Confirmé(é)'),
(14, NULL, NULL, 'Qualifié(é)'),
(15, NULL, NULL, 'Hautement qualifié(é)');

-- --------------------------------------------------------

--
-- Structure de la table `api_token`
--

CREATE TABLE `api_token` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expires_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `api_token`
--

INSERT INTO `api_token` (`id`, `user_id`, `token`, `expires_at`) VALUES
(21, 25, '12fc8ab262c89be3fe86e0d3270be216684d47d34908ed4eca638912b52248267582bbcdea4941e3682292d8e28cc2bd7a869a96e81b7c95e9d51491', '2020-06-17 17:22:38'),
(22, 25, 'fefcaa84e088f5abbd9625c887d7ae252af7a8b0d24d093105cc328621738555894051a1503fb4f9fda13f1f5c60e1ee63c6b0e99d997b517d96339a', '2020-06-17 17:22:38'),
(23, 26, 'edaa3bd187ac0019baa411a577262c60a838ea97abf4fb624dc3cfff1cb0a3c644ad95317630fdccdf4b8647f197531b5ddb3bc51eefca7021000016', '2020-06-17 17:22:39'),
(24, 26, '721b8f4855a25d3efe4506862031c5436333a93e879e5a4321f5614eae4905c922e1a24e81183b4889a7be402a75ecb95ff93a342b9bb10749e03d96', '2020-06-17 17:22:39'),
(25, 27, '9d0649d875301fa7d247bbf56cff3d30eaace0a847abb51612c137dc23535966fd4579ac35dcc34f2cf152fd0933323afe45959f2546b2ad6d71ad93', '2020-06-17 17:22:39'),
(26, 27, '21e686787ace8889019f90bd1f0308cf7d93263134990b306b92fcf94f915eba5ad51d66f2a8600b706df7c797d9d131e9834e1a82677ee5fcce615f', '2020-06-17 17:22:39'),
(27, 28, 'e91637c238869dfd371c8d9eccd83fe6d8ee5fff0395c32a55540de0a761a2093e16e370311c72cc2b3980b1feb2f192a873860cc27fd64eafed96da', '2020-06-17 17:22:40'),
(28, 28, '8b6f037d2e25c56fef6626e72a61063238d2ed4d6429b2c6120108a701775c7f99799286336c1f92ff1a53800027f0c99b957d0feced253d6ece1467', '2020-06-17 17:22:40'),
(29, 29, '46ffb23d7de4b938d03ed366cc829a2bdef12f07e36b7f8a9c006622f34ac4560f3e281ead3821bd5927e4ffe004f86555d6f877df57a645c2c2849f', '2020-06-17 17:22:40'),
(30, 29, '68fbc6b9a10021ed8faba5fb084fc8b9e3c65bb9e6bfebccb1920ef3c9bf2aa682042b84b8a15a7674176d3ecf1329cfb34e3eb70a5603d45dea84ff', '2020-06-17 17:22:40'),
(31, 30, 'aef1e2f078c782a626f787b1e015c3c57b33dfd05b32c0e5694e6ae807ac9c5012f03470720bfb15d489ba99d9ab5d8df0b472832abcca0e04d36c8a', '2020-06-17 17:22:41'),
(32, 30, 'd9b4b2500f942a7f0710599e6fda7cd0df0fb432e9d80935fb7b712bbf55313e9f2407675aee9cae9cf3ee25c7ffbec22e708184537bc2130dc97e9f', '2020-06-17 17:22:41'),
(33, 31, '22e88c1c314fcc272be4de9ed1663dff6a7a4dc472e6caa19031849fe5ad7d8d08af171cd7ce4b5509588277d58f5e1ead8da3300090890001d8c28f', '2020-06-17 17:22:41'),
(34, 31, '73663ba135c772f840cd0c4ed2fbbbdcb4e663f51ac0f514f883455a7ed089e2d154af89803fee9732b0ec783d45d5c4efa7df37e7906b073de13b39', '2020-06-17 17:22:41'),
(35, 32, '6277e24a0ceeb4c4679941f3c8ce9275ddb78f45fae9829e671e1a3190c77dfc60b206af5aba0592e5c469865646e90b69157c3d88ab67f1c2fd8916', '2020-06-17 17:22:42'),
(36, 32, 'e336b3cb12133bddf0c4c07ebdedd60dfdb0197d84d883fb39a4521c34686ff93a574b205f18a57bec80a929e88924c066292ef3725153245f0e515b', '2020-06-17 17:22:42'),
(37, 33, 'c1849134f74acf11b0636782ffaa8bd50e473d84208e41be81cea37161615e0e23a78195729afac194526e51b81acfbe8af2b7c470830ebfa85f9e6f', '2020-06-17 17:22:42'),
(38, 33, '075ac67b5cd758e52bfd069c57036c42a1055e3c526cd26b3157e395ba1d44310e0c736eeaeae04e3461d54817a1649e50a3f16778b74cd74f0f7c05', '2020-06-17 17:22:42'),
(39, 34, '48574c82e5085ab910186545d3fab638e467c550555f394e36cb93f4de5db2f42dd57636901d880617e7e287d8bcc9577d6dca528432cd95cb7da405', '2020-06-17 17:22:43'),
(40, 34, 'c7c0c7d6f136e80a8ec6ccddf809eb9199f42e7480303766f3443964f43abe344f6c75fc2cb4e3cf5ee492ecc5d1671862d398d108a5cf92cf6b0440', '2020-06-17 17:22:43');

-- --------------------------------------------------------

--
-- Structure de la table `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `advert_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(40, 'Manager'),
(41, 'Gérant/e'),
(42, 'Coiffeur/se'),
(43, 'Coiffeur mixte (H/F)'),
(44, 'Coiffeur Homme'),
(45, 'Coiffeur polyvalent'),
(46, 'Coiffeur studio'),
(47, 'Technicien/ne'),
(48, 'Apprenti(e) C.A.P'),
(49, 'Appenti(e) B.P'),
(50, 'Stagiaire'),
(51, 'Formateur/trice'),
(52, 'Professeur de coiffure');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id`, `url`, `alt`) VALUES
(4, 'jpeg', 'barber.jpg'),
(5, 'gif', 'no_photo.gif'),
(6, 'gif', 'no_photo.gif'),
(7, 'gif', 'no_photo.gif'),
(8, 'gif', 'no_photo.gif'),
(9, 'gif', 'no_photo.gif'),
(10, 'jpeg', '379.jpg'),
(11, 'gif', 'no_photo.gif'),
(12, 'gif', 'no_photo.gif'),
(13, 'jpeg', '383.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200609123211', '2020-06-09 12:33:31'),
('20200609135400', '2020-06-09 13:54:39'),
('20200609140112', '2020-06-09 14:01:31'),
('20200612164029', '2020-06-12 16:40:54'),
('20200612181049', '2020-06-12 18:11:32'),
('20200614135133', '2020-06-14 13:52:20'),
('20200616163546', '2020-06-16 16:36:22'),
('20200616164551', '2020-06-16 16:46:12'),
('20200616164725', '2020-06-16 16:47:43'),
('20200616232021', '2020-06-16 23:20:47'),
('20200617092926', '2020-06-17 09:29:58'),
('20200617093923', '2020-06-17 09:39:44'),
('20200617094147', '2020-06-17 09:42:13'),
('20200617101407', '2020-06-17 10:14:30'),
('20200617110446', '2020-06-17 11:05:13'),
('20200617110804', '2020-06-17 11:08:26'),
('20200617111615', '2020-06-17 11:16:36'),
('20200617113333', '2020-06-17 11:34:09'),
('20200617133130', '2020-06-17 13:31:53'),
('20200617135504', '2020-06-17 13:55:28'),
('20200617140408', '2020-06-17 14:04:29'),
('20200617140816', '2020-06-17 14:08:37'),
('20200617141415', '2020-06-17 14:14:39'),
('20200617141805', '2020-06-17 14:18:40'),
('20200617142155', '2020-06-17 14:22:18'),
('20200617150814', '2020-06-17 15:08:40'),
('20200617151444', '2020-06-17 15:15:04'),
('20200624160420', '2020-06-24 16:04:58');

-- --------------------------------------------------------

--
-- Structure de la table `skill`
--

CREATE TABLE `skill` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `skill`
--

INSERT INTO `skill` (`id`, `name`) VALUES
(46, 'Diagnostic capillaire'),
(47, 'Techniques de coupes de cheveux'),
(48, 'Techniques de séchage'),
(49, 'Principes de la relation client'),
(50, 'Coiffure femme'),
(51, 'Coiffure homme'),
(52, 'Coiffure enfant'),
(53, 'Technique de la barbe'),
(54, 'Techniques de décoloration, de coloration de cheveux'),
(55, 'Techniques de raccord, de rajouts, d\'extensions'),
(56, 'Techniques de pose de perruques'),
(57, 'Techniques pédagogiques'),
(58, 'Gestion administrative'),
(59, 'Gestion comptable'),
(60, 'Outils bureautiques');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `linkedin_username` varchar(255) DEFAULT NULL,
  `avatar_url` int(11) DEFAULT NULL,
  `siret` int(11) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `first_name`, `linkedin_username`, `avatar_url`, `siret`, `last_name`, `phone`, `city`) VALUES
(25, 'spacebar0@example.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$cWh1TUdxalRwMmx0MGlBUQ$5IeZim01dTaUpupbgFp51gfdXkcC/8qLsHG6vFpYN0M', 'Julien', NULL, NULL, NULL, 'SPACE', '0000000000', 'Toulouse'),
(26, 'spacebar1@example.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$eVkydm1kZUNCVzQ5L2ZsTg$wkx1lF8M6Ejzk4O2WpNEChukJxrQW1l6hpX2E6Vagb0', 'Odette', 'robert73', NULL, NULL, 'robert', '0000000000', 'Mulhouse'),
(27, 'spacebar2@example.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$R2Y0WTJOSlFheXQyUFRGYg$XUIpVIbFXOWXJAT9sLidM8Fljroj663vGhwTLO3QJ8Y', 'Anastasie', NULL, NULL, NULL, 'Nast', '0000000000', 'Argenteuil'),
(28, 'spacebar3@example.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$eG5MdDRQc2Y1OEkzbHY1Lg$yg1bnNRIBdsRQksUiCkRXZtEPDWDWgGyuR0kOk6etgU', 'Olivier', NULL, NULL, NULL, 'Leroy', '0000000000', 'Paris'),
(29, 'spacebar4@example.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$M3dsdktNMEFvV05oUzR5MA$xvcQg8r6qY1fxC6Zyr2So0CgOCbWIC78k23i+/HNjQc', 'Élise', '', NULL, NULL, 'Déesse', '0000000000', 'Bayonne'),
(30, 'spacebar5@example.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$c21aaWVHaXRvUWFwQlp0Yg$9A3wR1Dhm9+X2VGmTmuJKVH0tGnlB9TFkj63Cfg/EvM', 'Margot', NULL, NULL, NULL, 'Picot', '0000000000', 'Royan'),
(31, 'spacebar6@example.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$ZzNFOWFKRzJKNVVkcDBTNA$WPde9j9mqrXJspUxYkWeiGri5YfajUHgVuu0H3AAl3o', 'Alix', NULL, NULL, NULL, 'Sapriche', '0000000000', 'Troyes'),
(32, 'spacebar7@example.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$WGs4NFpQQWdHMUREUG9Ndw$xagj8toC5mwOvjMvbC2ArLLvUFj8tOqjcTrPhNbXTsw', 'Théophile', 'hlelievre', NULL, NULL, 'Lelievre', '0000000000', 'Garches'),
(33, 'spacebar8@example.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$dFVNQ3hDMjBwcGlMSHJocw$GPYuyhdtrlOu4vA9Wh+WAfjJFyyxCZmqKTyjExL5PdQ', 'Daniel', NULL, NULL, NULL, 'Delobel', '0000000000', 'Meudon'),
(34, 'spacebar9@example.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$anlRdTExV2RqNFBIdkcyWg$Qz0coOps1WfQTdkBUaSUM4/kpWGa3R/u0qTL21kJv5M', 'Jacques', NULL, NULL, NULL, 'Martin', '0000000000', 'Lille'),
(35, 'admin0@thespacebar.com', '[\"ROLE_RECRUITER\"]', '$argon2id$v=19$m=65536,t=4,p=1$NTJSN0FYR0t6RWdpZFVFYw$kAnzEVIProHtQ6Ve00zlqLNkdfvDYAOsq8uT49xCzRU', 'Martin', 'mjacques', NULL, 1234567893, 'Jacques', '1111111111', 'Toulouse'),
(36, 'admin1@thespacebar.com', '[\"ROLE_RECRUITER\"]', '$argon2id$v=19$m=65536,t=4,p=1$bEF3aDc4dC9nMXExOEV4Mg$l3Lw0bnVJHn/HXAWeY+VTNrmpvSDnjdmoadT7ZpcaAQ', 'Jacques', 'jmartin', NULL, 1234567893, 'martino', '1212121212', 'Mulhouse'),
(37, 'admin2@thespacebar.com', '[\"ROLE_RECRUITER\"]', '$argon2id$v=19$m=65536,t=4,p=1$WDRWU01IUlBqVEl6TzRlTw$+q7zAnHCOs3MK8+dd6+Trij9I7yVn4Z61m3nCrkDxoo', 'Augustin', 'augustinp', NULL, 1234567893, 'Pedro', '2121212121', 'Paris'),
(39, 'stephanie.sccellier@gmail.com', '{\"0\":\"ROLE_ADMIN\",\"2\":\"ROLE_RECRUITER\"}', '$argon2id$v=19$m=65536,t=4,p=1$cVdWM3Voci9YMHlQVFVkcg$T2xW9UFrgVlbQTWqNIsfjy8o52SJF0Ryl5KHV/aZb5g', 'Stéphanie', 'stéphanie-cellier', NULL, 14, 'CELLIER', '0629753804', 'Toulouse');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `advert`
--
ALTER TABLE `advert`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_54F1F40B989D9B62` (`slug`),
  ADD UNIQUE KEY `UNIQ_54F1F40B3DA5256D` (`image_id`);

--
-- Index pour la table `advert_category`
--
ALTER TABLE `advert_category`
  ADD PRIMARY KEY (`advert_id`,`category_id`),
  ADD KEY `IDX_84EEA340D07ECCB6` (`advert_id`),
  ADD KEY `IDX_84EEA34012469DE2` (`category_id`);

--
-- Index pour la table `advert_levels`
--
ALTER TABLE `advert_levels`
  ADD PRIMARY KEY (`advert_id`,`advert_skill_id`),
  ADD KEY `IDX_DB266D77D07ECCB6` (`advert_id`),
  ADD KEY `IDX_DB266D77D7277BC3` (`advert_skill_id`);

--
-- Index pour la table `advert_newskill`
--
ALTER TABLE `advert_newskill`
  ADD PRIMARY KEY (`advert_id`,`skill_id`),
  ADD KEY `IDX_75579A30D07ECCB6` (`advert_id`),
  ADD KEY `IDX_75579A305585C142` (`skill_id`);

--
-- Index pour la table `advert_skill`
--
ALTER TABLE `advert_skill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5619F91BD07ECCB6` (`advert_id`),
  ADD KEY `IDX_5619F91B5585C142` (`skill_id`);

--
-- Index pour la table `api_token`
--
ALTER TABLE `api_token`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7BA2F5EBA76ED395` (`user_id`);

--
-- Index pour la table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A45BDDC1D07ECCB6` (`advert_id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `advert`
--
ALTER TABLE `advert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `advert_skill`
--
ALTER TABLE `advert_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `api_token`
--
ALTER TABLE `api_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `advert`
--
ALTER TABLE `advert`
  ADD CONSTRAINT `FK_54F1F40B3DA5256D` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`);

--
-- Contraintes pour la table `advert_category`
--
ALTER TABLE `advert_category`
  ADD CONSTRAINT `FK_84EEA34012469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_84EEA340D07ECCB6` FOREIGN KEY (`advert_id`) REFERENCES `advert` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `advert_levels`
--
ALTER TABLE `advert_levels`
  ADD CONSTRAINT `FK_DB266D77D07ECCB6` FOREIGN KEY (`advert_id`) REFERENCES `advert` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_DB266D77D7277BC3` FOREIGN KEY (`advert_skill_id`) REFERENCES `advert_skill` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `advert_newskill`
--
ALTER TABLE `advert_newskill`
  ADD CONSTRAINT `FK_75579A305585C142` FOREIGN KEY (`skill_id`) REFERENCES `skill` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_75579A30D07ECCB6` FOREIGN KEY (`advert_id`) REFERENCES `advert` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `advert_skill`
--
ALTER TABLE `advert_skill`
  ADD CONSTRAINT `FK_5619F91B5585C142` FOREIGN KEY (`skill_id`) REFERENCES `skill` (`id`),
  ADD CONSTRAINT `FK_5619F91BD07ECCB6` FOREIGN KEY (`advert_id`) REFERENCES `advert` (`id`);

--
-- Contraintes pour la table `api_token`
--
ALTER TABLE `api_token`
  ADD CONSTRAINT `FK_7BA2F5EBA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `FK_A45BDDC1D07ECCB6` FOREIGN KEY (`advert_id`) REFERENCES `advert` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
