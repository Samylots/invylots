-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql210.byethost24.com
-- Generation Time: Feb 04, 2015 at 07:58 PM
-- Server version: 5.6.22-71.0
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `b24_15687469_invylots`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_articles`
--

CREATE TABLE IF NOT EXISTS `tbl_articles` (
  `no_article` bigint(20) NOT NULL AUTO_INCREMENT,
  `upc_article` bigint(20) DEFAULT NULL,
  `nom_article` mediumtext,
  `desc_article` text,
  PRIMARY KEY (`no_article`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=173 ;

--
-- Dumping data for table `tbl_articles`
--

INSERT INTO `tbl_articles` (`no_article`, `upc_article`, `nom_article`, `desc_article`) VALUES
(12, 67311896289, 'Jus d''ananas &quot; Fairlee &quot;', ''),
(2, 632609130668, 'chantepom', 'Mou de pomme non alcoolisÃ©'),
(3, 60000801007, 'soupe aux tomates Aylmer', ''),
(4, 63211117905, 'crÃ¨me de poulet Campbells', ''),
(5, 63211117912, 'crÃ¨me de champignon', ''),
(6, 69593120045, 'huile de pepins raisins &quot;Maison OrphÃ©e&quot;', ''),
(7, 56573112039, 'pain tranchÃ© moelleux long &quot;Gadoua&quot;', ''),
(8, 67907001127, 'sac Ã  glace', ''),
(9, 64300222456, 'fÃ¨ves Ã  la sauce tomate &quot; Clark &quot;', ''),
(10, 64300221602, 'fÃ¨ves au lard Ã  la sauce tomate &quot; Clark &quot;', ''),
(11, 64300220209, 'fÃ¨ves au lard foncÃ©es Ã  la sauce tomate &quot; Clark &quot;', ''),
(13, 59749901949, 'vinaigrette cÃ©sar &quot;Selection&quot;', ''),
(14, 5736106, 'sauce chili &quot; Heinz &quot;', ''),
(15, 58744151151, 'sauce VH ail mÃ©dium', ''),
(16, 55872026016, 'lait 2% QuÃ©bon', ''),
(17, 68200148434, 'lait Lactaid de Lactantia', ''),
(18, 776090102015, 'lait de chÃ¨vre &quot; LibertÃ© &quot;', ''),
(19, 58744152134, 'sauce VH au prunes', ''),
(20, 5976700, 'relish sweet &quot; Habitant &quot;', ''),
(21, 5982701, 'Betteraves en tranches marinÃ©es &quot; Habitant &quot;', ''),
(22, 41679158517, 'Boost au chocolat', ''),
(23, 59749883207, 'salsa douce &quot; Selection &quot;', ''),
(24, 59749932264, 'moutarde jaune &quot; Selection &quot; ', ''),
(25, 59749894203, 'fromage 24 tranches type mozzarella &quot; Selection &quot;', ''),
(26, 68200989181, 'Ficello cheddarific &quot; Black Diamond', ''),
(29, 68200858241, 'ficello marbelicious zÃ©brÃ©s 16 unitÃ©s &quot;Black Diamond&quot;', ''),
(30, 57000002992, 'ketchup Heinz', ''),
(31, 37600583299, 'Bacon &quot; Hormel&quot; ', 'Miettes de vrai bacon'),
(32, 68400662709, 'mayonnaise 1/2 gras &quot;Hellmann''s', ''),
(33, 59749890700, 'mayonnaise  &quot;Selection&quot; ', '890 ml'),
(34, 69593120014, 'huile d''olive extra vierge &quot;Maison OrphÃ©e&quot;', '500 ml'),
(35, 69593120090, 'huile de canola vierge &quot;Maison OrphÃ©e&quot;', '500 ml'),
(36, 61400000588, 'Bovril concentrÃ© bouillon poulet', ''),
(37, 61400000281, 'Bovril concentrÃ© bouillon boeuf', ''),
(38, 59749891240, 'cocktail de lÃ©gumes &quot;Selection&quot;', '1,89 L'),
(39, 65250002860, 'tranches d''ananas &quot;Dole&quot;', '398 ml'),
(40, 65250004765, 'gros morceaux d''ananas &quot;Dole&quot;', '398 ml'),
(41, 65250006561, 'Ananas broyÃ©s &quot;Dole&quot;', '398ml'),
(42, 64042493046, 'chocomax brownies &quot;Leclerc&quot;', '8 barres tendres enrobÃ©es, 256 g'),
(43, 69593153609, 'mÃ©lange d''huile Quatuor &quot;OrphÃ©e&quot;', 'Canola, sÃ©same, d''olive, de noisette.\r\nBiologique'),
(44, 59749888769, 'huile de canola vierge &quot;Selection&quot;', '3 L'),
(45, 59749888370, 'vinaigre blanc &quot;Selection&quot;', '5 % d''acide acÃ©tique par volume.\r\n4 L'),
(46, 55577107966, 'galette de riz &quot;Quaker&quot;', 'Caramel et brisure de chocolat.\r\n14 galettes\r\n199 g'),
(47, 888048000400, 'Ã©chalottes francaises &quot;Attitude&quot;', '12.3oz/350 g'),
(48, 3329487611200, 'fructose cristallisÃ© &quot;Markal&quot;', '500 g'),
(49, 56358620193, 'biscuits feuille d''Ã©rable &quot;David&quot;', '300 g'),
(50, 67311028338, 'Jus d''ananas &quot; Oasis &quot;', '960 ml'),
(51, 62847210233, 'sucre granulÃ© fin &quot;Redpath&quot;', '2 kg'),
(52, 65143000065, 'melasse verte &quot;Tout Naturel&quot;', '700 g'),
(53, 59749893442, 'tomates en dÃ©s &quot;Selection&quot;', 'Aux fines herbes et Ã©pices.\r\n796 ml/28 oz liq'),
(54, 60000108601, 'pÃªches en tranches &quot;Del Monte&quot;', 'Dans un sirop lÃ©ger\r\n796 ml/ 28oz liq'),
(55, 761720001912, 'sirop de maÃ¯s &quot;Crown&quot;', 'Sirop blanc\r\n500 ml'),
(56, 64013120223, 'vinaigre de cidre de pommes pur &quot;Allen''s', '500 ml\r\n'),
(57, 67200003248, 'cerises &quot;E.D.Smith&quot;', 'Garniture pour tarte\r\n540 ml'),
(59, 68100011173, 'fromage Ã  la crÃ¨me &quot;Philadelphia&quot;', '38% moins de gras'),
(60, 223876303895, 'sauce Ã  spaghetti ', '400 ml'),
(61, 68932401234, 'mÃ©lasse &quot;Grandma&quot;', ''),
(62, 621001004769, 'fructose &quot;yvan nadeau&quot;', '1 kg'),
(63, 67924702083, 'sucre en poudre &quot;Original&quot;', '1.5 kg'),
(64, 5143829923, 'riz Basmati indian Superior', '1 kg'),
(68, 58336419300, 'mÃ©lange Ã  muffins &quot;Shirriff&quot;', 'Avoine\r\n220 g'),
(69, 58336421006, 'mÃ©lange Ã  gÃ¢teau &quot;Shirriff&quot;', 'Blanc\r\n250 g'),
(70, 58336417405, 'mÃ©lange Ã  muffins &quot;Shirriff&quot;', 'Bleuets\r\n200 g'),
(71, 59000038414, 'gruau &quot;Robin Hood&quot;', 'Minute, Vieux Moulin\r\n1,35 kg'),
(72, 59749892605, 'Farine &quot;Selection&quot;', 'Tout usage\r\n10 kg'),
(73, 66721012029, 'chapelure de biscuit &quot;Christie&quot; ', 'Oreo\r\n400 g'),
(74, 66721010827, 'chapelure de biscuit &quot;Christie&quot; ', 'P''tite Abeille\r\n400 g'),
(75, 66721010414, 'biscuit graham', 'P''tit Abeille\r\n400 g'),
(76, 58496010409, 'riz Uncle Ben''s', 'Original\r\nsac 2 kg'),
(79, 59100008010, 'riz Minute Rice', 'Riz Ã  grains long \r\n700 g'),
(78, 58496041083, 'riz Uncle Ben''s', 'Instant, prÃªt en 5 minutes\r\n1.1 kg'),
(80, 65633465879, 'mÃ©lange Ã  gÃ¢teau &quot;Betty crocker&quot;', 'DorÃ©\r\n432 g'),
(81, 65633465916, 'mÃ©lange Ã  gÃ¢teau &quot;Betty crocker&quot;', 'Blanc\r\n461 g'),
(82, 65633071711, 'mÃ©lange Ã  gÃ¢teau &quot;Betty crocker&quot;', 'Arc-en-ciel\r\n510 g'),
(83, 223877007297, 'sauce Ã  spaghetti ', '800 ml\r\n'),
(84, 66701001548, 'soupe lÃ©gumes', 'St-Hubert , 540 ml'),
(85, 59749901970, 'vinaigrette cÃ©sar &quot;Selection&quot;', '475 ml'),
(86, 66701004242, 'jardiniÃ¨re au poulet', 'St-Hubert, 540 ml'),
(87, 59749932585, 'Eclats choco', 'Biscuit &quot; Selection &quot; , 500 g'),
(88, 229943903296, 'pain &quot; kaiser &quot;', 'Boulangerie Metro, 450 g'),
(89, 64300474008, 'sauce poutine', 'CordonBleu , 398 ml'),
(90, 59749903677, 'crouton cÃ©sar', 'Selection (style maison), 150 g'),
(91, 55789066808, 'soupe Won Ton', 'Haiku , 398 ml'),
(92, 58744151311, 'sauce ananas', 'VH , sauce pour cuisson , 341 ml'),
(93, 31200444981, 'sauce aux canneberges en gelÃ©e', 'Ocean Spray , 348 ml'),
(94, 64300414141, 'sauce Bar-B-Q', 'CordonBleu , 398 ml'),
(95, 64300402278, 'sauce Hot Chicken', 'CordonBleu,  227 ml'),
(96, 621001000266, 'sauce poivre vert', 'Les Distributions Yvan Nadeau , 200 g'),
(97, 66577253058, 'poudre pour sauce hot chicken', 'Le meilleur Chef , 170 g'),
(98, 66200009779, 'Ã©pice pour poulet', 'Club House &quot; la grille&quot;  , 92 g'),
(99, 69809701051, 'poudre pour rosbif', 'Berthelet, 400 g'),
(100, 66701004297, 'poudre pour sauce rosbif', 'Loney''s ,  400 g'),
(101, 68400130208, 'mÃ©lange Ã  sauce Parma-Rosa', 'Knorr ,  44 g'),
(102, 56725335019, 'riz frit chinois', 'Dainty , 350 g'),
(103, 68100892314, 'Cheezwhiz &quot;kraft&quot;', '450g'),
(104, 60000658106, 'Tomates en dÃ©s &quot;aylmer&quot; avec Ã©pices italiennes', '796ml'),
(105, 57351012251, 'Papier d''aluminium &quot;alcan&quot;', '25'''),
(106, 41679158524, 'Boost chocolat', '26 vitamines et minÃ©raux\r\npaquet de 6x237ml'),
(107, 66721002204, 'Ritz Original', '200g'),
(108, 59749893183, 'Spaghettini &quot;Selection&quot;', '900g'),
(110, 60410010914, 'Chips &quot;Lays&quot; Sel et vinaigre', '180g'),
(111, 667888055692, 'Sacs &quot;Zipper seal&quot;', 'Large 20sacs'),
(112, 64100498129, 'Special K &quot;kellogg''s&quot; au fraise', 'Paquet 10x125g'),
(113, 67311016328, 'Jus &quot;Oasis&quot; au pomme-raisins', '8x200ml'),
(114, 67311037323, 'Jus &quot;Oasis&quot; au mangue-exotique', '8x200ml'),
(115, 55653686002, 'Biscuits Breton au legume', '225g'),
(116, 66721001153, 'Biscuits &quot;Chips ahoy!&quot; triple chocolat', '300g'),
(117, 68100084245, 'Beurre d''arachide &quot;kraft&quot;', 'CrÃ©meux 1kg'),
(118, 68100084276, 'Beurre d''arachide &quot;kraft&quot;', 'CrÃ©meux 2kg'),
(119, 59749898775, 'Ketchup Selection', '1L'),
(120, 63211311112, 'Soupenaux pois &quot;Habitant&quot;', '796ml'),
(121, 66086011156, 'Tomates broyÃ©es &quot;pastene&quot;', '796ml'),
(122, 58744153469, 'Sauce Teriyaki &quot;VH&quot;', '355ml'),
(123, 60410010921, 'Chips &quot;Lays&quot; Ketchup', '180g'),
(124, 59119010080, 'Chips BÃ¢tonnets au fromage &quot;humpty dumpty&quot;', '285g'),
(125, 66188136429, 'CafÃ© instantanÃ© &quot;maxwell house&quot;', 'TorrÃ©faction veloutÃ©e 200g'),
(126, 60000108403, 'PÃªches en moitiÃ©s &quot;delmonte&quot;', '796ml'),
(127, 66721002167, 'Mini Ritz au fromages', 'Sandwiches 180g'),
(128, 63348001849, 'Pattes d''ours pepites de chocolat', '6x 300g'),
(129, 61328802165, 'Mouchoirs &quot;Scotties&quot;', '6x100 2 epaisseurs'),
(130, 63435701201, 'Papier hygiÃ©nique &quot;Royale&quot;', '8x200 feuilles 3 Ã©paisseurs'),
(131, 690069045310703, 'savon &quot;la parisienne&quot; biodegradable', '1,52L  - 38 brassÃ©es'),
(132, 59600070029, 'Jus d''orange &quot;Simply Orange&quot;', 'Sans pulpe 2.63L'),
(133, 33383455631, 'Sac de patates ', 'Rouge - 10lb - 4,54kg'),
(134, 59749926515, 'Alcool Ã  friction &quot;selection&quot;', 'Isopropylique - 70% - 500ml'),
(135, 59749936033, 'Savon Ã  main &quot;selection&quot;', 'Antibacterien - 1L'),
(136, 37000340355, 'Cascade ', '1.70kg parfum frais'),
(137, 51700828876, 'Finish', 'NEttoyant machine 250ml\r\ndual action'),
(138, 51700362448, 'Finish Jet dry', '250 ml'),
(139, 63400260825, 'petits pain Ã  saucisse &quot; italiano&quot;', '6 pains italiano'),
(140, 59749882576, 'cola &quot;selection&quot;', '2L'),
(141, 229950103092, 'pain sous-marin metro', 'Blanc 9pouce 480g'),
(142, 59749898485, 'pains hot-dog &quot;selection&quot;', '12 pains'),
(143, 7804637090006, 'raisins rouges', 'Sans pepins\r\nplu #4023'),
(144, 55775103005, 'fromage cheddar en grains', 'Beauceron 300g 41% humi 31% m.g.'),
(145, 59749897228, 'essuie-tout &quot;selection&quot;', '2 epaisseur 6x100 feuilles'),
(146, 853951002025, 'fraises GPC', 'USA 454g'),
(147, 69045310741, 'savon &quot;la parisienne&quot; biodegradable', '1,52L 38 brassÃ©es'),
(148, 59749878708, 'chips &quot;selection&quot; sel et vinaigre', '200g'),
(149, 738761300151, 'laitue iceberg', 'Plu #4061\r\nNature''s reward'),
(150, 7808772040230, 'raisins rouges sans pÃ©pins', '#plu 4023'),
(151, 33383440910, 'pommes Cortland', '1.81 kg 4lb'),
(152, 223877608296, 'sauce a la viande METRO', '800g'),
(153, 66188117107, 'Jell-o', 'Sans sucre ajoutÃ©\r\nrÃ©frigÃ©rÃ©'),
(154, 214843901145, 'Germe de haricot Metro', '325g'),
(155, 621001018278, 'Noix acajoux R/S', '250g'),
(156, 56725335040, 'riz &quot;Dainty&quot; pilaf', '350g'),
(157, 59749900157, 'Oignons jaunes', '2.27kg 5lb'),
(158, 71022315335, 'Cerises sec &quot;mariani&quot;', '170g'),
(159, 64200115780, 'lasagne &quot;catelli&quot;', '500g'),
(160, 773239140013, 'canneberges sÃ©chÃ©es &quot;atoka&quot;', 'Original 170g'),
(161, 24300061028, 'Honey buns', '6x gateau 301g'),
(162, 59749887199, 'amidon de maÃ¯s &quot;selection&quot;', '454g'),
(163, 68400130307, 'Primavera &quot;knorr&quot;', 'Melange a sauce 41g'),
(164, 55653684503, 'Mini Biscuits Breton bouchÃ©es au legume', '200g'),
(165, 628456570030, 'pizza pepperoni &quot;mikes&quot;', '880g'),
(166, 628456570054, 'Pizza Internazionale di mikes &quot;mikes&quot;', '1kg'),
(167, 628456570016, 'pizza Deluxe &quot;mikes&quot;', '925g'),
(168, 55000615167, 'poulet grillÃ© baja &quot;stouffer''s&quot;', '170g'),
(169, 55000615129, 'poulet grillÃ© au parmesan &quot;stouffer''s&quot;', '170g'),
(170, 59749894791, 'beurre demi-salÃ© &quot;selection&quot;', '454g'),
(171, 68553130551, 'pepperoni &quot;gaspÃ©sien&quot;', '200g'),
(172, 63100108779, 'Jambon cuit au four &quot;maple leaf&quot;', 'Natural selections 175g');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE IF NOT EXISTS `tbl_categories` (
  `no_catego` bigint(20) NOT NULL AUTO_INCREMENT,
  `nom_catego` mediumtext NOT NULL,
  `desc_catego` mediumtext,
  `no_user` bigint(20) NOT NULL,
  PRIMARY KEY (`no_catego`),
  KEY `FK_tbl_categories_no_user` (`no_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`no_catego`, `nom_catego`, `desc_catego`, `no_user`) VALUES
(1, 'Repas principals', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_descriptions`
--

CREATE TABLE IF NOT EXISTS `tbl_descriptions` (
  `no_desc` int(11) NOT NULL AUTO_INCREMENT,
  `desc_desc` text,
  `no_user` int(11) DEFAULT NULL,
  `no_article` int(11) NOT NULL,
  PRIMARY KEY (`no_desc`),
  KEY `FK_Descriptions_no_user` (`no_user`),
  KEY `FK_Descriptions_no_article` (`no_article`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=153 ;

--
-- Dumping data for table `tbl_descriptions`
--

INSERT INTO `tbl_descriptions` (`no_desc`, `desc_desc`, `no_user`, `no_article`) VALUES
(1, 'totoot', 1, 12),
(2, '4 iÃ¨me tablette', 2, 7),
(3, 'Bas, tablette du centre', 2, 57),
(4, 'Jus tomate Ã  Marc, \r\ntablette au dessus du micro-onde', 2, 38),
(5, 'Bas, 3 iÃ¨me tablette', 2, 45),
(6, 'Pour Vincent', 2, 29),
(7, 'Tablette au dessus du micro-onde', 2, 31),
(8, 'Bas, tablette du centre', 2, 49),
(9, 'Tablette au dessus du micro-onde', 2, 37),
(10, 'Bas, tablette du centre', 2, 47),
(11, 'Bas, tablette du centre', 2, 41),
(12, 'Tablette au dessus du micro-onde', 2, 36),
(13, 'Bas, tablette du centre', 2, 42),
(14, '1 iÃ¨re tablette coulissante de l''Ã®lot', 2, 5),
(15, '1 iÃ¨re tablette coulissante de l''Ã®lot', 2, 4),
(16, '2 iÃ¨re tablette coulissante de l''Ã®lot', 2, 10),
(17, '2 iÃ¨re tablette coulissante de l''Ã®lot', 2, 11),
(18, '2 iÃ¨re tablette coulissante de l''Ã®lot', 2, 9),
(19, 'Bas, tablette du centre', 2, 48),
(20, 'Bas, tablette du centre', 2, 46),
(21, 'Bas, tablette du centre', 2, 40),
(22, 'Tablette au dessus du micro-onde', 2, 34),
(23, 'Tablette au dessus du micro-onde', 2, 35),
(24, 'Tablette au dessus du micro-onde', 2, 44),
(25, 'Tablette au dessus du micro-onde', 2, 6),
(26, 'Bas, tablette du centre', 2, 50),
(27, 'Bas, tablette du centre', 2, 33),
(28, 'Bas, tablette du centre', 2, 32),
(29, 'Tablette au dessus du micro-onde', 2, 43),
(30, 'Bas, tablette du centre', 2, 52),
(31, 'Bas, tablette du centre', 2, 54),
(32, 'Sous la fenÃªtre, panneau Ã  droite', 2, 8),
(33, 'Bas, 1 iÃ¨re tablette', 2, 55),
(34, '1 iÃ¨re tablette coulissante de l''Ã®lot\r\n+\r\nArmoire blanche Ã  la cave', 2, 3),
(35, 'Bas, tablette du centre', 2, 51),
(36, 'Bas, tablette du centre\r\n+\r\narmoire blanche Ã  la cave', 2, 53),
(37, 'Bas, tablette du centre', 2, 39),
(38, 'Bas, tablette du centre', 2, 56),
(39, '', 2, 58),
(40, '', 2, 59),
(41, 'MÃ©tro\r\n3 iÃ¨me tablette', 2, 60),
(42, 'Bas, tablette du centre', 2, 61),
(43, 'Sous micro-onde, 2iÃ¨me tablette', 2, 62),
(44, 'Sous micro-onde 3 iÃ¨me tablette', 2, 63),
(45, 'Sous micro-onde 3 iÃ¨me tablette\r\ndans plat plastique', 2, 64),
(46, 'Sous micro-onde 3 iÃ¨me tablette\r\ndans plat plastique\r\ngÃ¢teau blanc', 2, 65),
(47, 'Sous micro-onde 3 iÃ¨me tablette\r\ndans plat plastique', 2, 66),
(48, '', 2, 67),
(49, 'Sous micro-onde 3 iÃ¨me tablette\r\ndans plat plastique', 2, 68),
(50, 'Sous micro-onde 3 iÃ¨me tablette\r\ndans plat plastique', 2, 69),
(51, 'Sous micro-onde 3 iÃ¨me tablette\r\ndans plat plastique', 2, 70),
(52, 'Sous micro-onde 3 iÃ¨me tablette\r\ndans plat plastique', 2, 71),
(53, 'Sous micro-onde 3 iÃ¨me tablette + + + dans panneau avant du comptoir', 2, 72),
(54, 'Sous micro-onde 3 iÃ¨me tablette', 2, 73),
(55, 'Sous micro-onde 3 iÃ¨me tablette', 2, 74),
(56, 'Sous micro-onde 3 iÃ¨me tablette', 2, 75),
(57, 'Sous micro-onde 3 iÃ¨me tablette', 2, 76),
(58, 'Sous micro-onde 3 iÃ¨me tablette', 2, 77),
(59, 'Sous micro-onde 3 iÃ¨me tablette', 2, 78),
(60, 'Sous micro-onde 3 iÃ¨me tablette', 2, 79),
(61, 'Sous micro-onde 3 iÃ¨me tablette', 2, 80),
(62, 'Sous micro-onde 3 iÃ¨me tablette', 2, 81),
(63, 'Sous micro-onde 3 iÃ¨me tablette', 2, 82),
(64, '', 2, 83),
(65, '', 2, 84),
(66, 'Au dessus du micro-onde', 2, 85),
(67, '', 2, 86),
(68, '', 2, 87),
(69, 'Porte\r\n', 2, 88),
(70, '2 iÃ¨re tablette coulissante de l''Ã®lot', 2, 89),
(71, '2 iÃ¨re tablette coulissante de l''Ã®lot', 2, 90),
(72, '2 iÃ¨re tablette coulissante de l''Ã®lot', 2, 91),
(73, '2 iÃ¨re tablette coulissante de l''Ã®lot', 2, 92),
(74, '2 iÃ¨re tablette coulissante de l''Ã®lot', 2, 93),
(75, '2 iÃ¨re tablette coulissante de l''Ã®lot', 2, 94),
(76, '2 iÃ¨re tablette coulissante de l''Ã®lot', 2, 95),
(77, '2 iÃ¨re tablette coulissante de l''Ã®lot', 2, 96),
(78, '2 iÃ¨re tablette coulissante de l''Ã®lot', 2, 97),
(79, '2 iÃ¨re tablette coulissante de l''Ã®lot', 2, 98),
(80, '2 iÃ¨re tablette coulissante de l''Ã®lot', 2, 99),
(81, '2 iÃ¨re tablette coulissante de l''Ã®lot', 2, 100),
(82, '2 iÃ¨re tablette coulissante de l''Ã®lot', 2, 101),
(83, '', 2, 102),
(84, '', 2, 103),
(85, '', 2, 104),
(86, '', 2, 105),
(87, '', 2, 106),
(88, '', 2, 107),
(89, '', 2, 108),
(90, '', 2, 110),
(91, 'Sacs ziplock', 2, 111),
(92, '', 2, 112),
(93, '', 2, 113),
(94, '', 2, 114),
(95, '', 2, 115),
(96, '', 2, 116),
(97, '', 2, 117),
(98, '', 2, 118),
(99, '', 2, 119),
(100, '', 2, 120),
(101, '', 2, 121),
(102, '', 2, 122),
(103, '', 2, 123),
(104, 'Crottes au fromage', 2, 124),
(105, '', 2, 125),
(106, '', 2, 126),
(107, '', 2, 127),
(108, '', 2, 128),
(109, '', 2, 129),
(110, '', 2, 130),
(111, '', 2, 131),
(112, '', 2, 132),
(113, '', 2, 133),
(114, '', 2, 134),
(115, '', 2, 135),
(116, '', 2, 136),
(117, '', 2, 137),
(118, '', 2, 138),
(119, '', 2, 139),
(120, '', 2, 140),
(121, '', 2, 141),
(122, '', 2, 142),
(123, '', 2, 143),
(124, '', 2, 144),
(125, '', 2, 145),
(126, '', 2, 146),
(127, '', 2, 147),
(128, '', 2, 148),
(129, '', 2, 149),
(130, '', 2, 150),
(131, '', 2, 151),
(132, '', 2, 152),
(133, '', 2, 153),
(134, '', 2, 154),
(135, '', 2, 155),
(136, '', 2, 156),
(137, '', 2, 157),
(138, '', 2, 158),
(139, '', 2, 159),
(140, '', 2, 160),
(141, '', 2, 161),
(142, '', 2, 162),
(143, '', 2, 163),
(144, '', 2, 164),
(145, '', 2, 165),
(146, '', 2, 166),
(147, '', 2, 167),
(148, '', 2, 168),
(149, '', 2, 169),
(150, '', 2, 170),
(151, '', 2, 171),
(152, '', 2, 172);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lieux`
--

CREATE TABLE IF NOT EXISTS `tbl_lieux` (
  `no_lieu` int(11) NOT NULL AUTO_INCREMENT,
  `titre_lieu` mediumtext,
  `desc_lieu` mediumtext,
  `no_user` bigint(20) NOT NULL,
  PRIMARY KEY (`no_lieu`),
  KEY `FK_Tbl_lieux_no_user` (`no_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_lieux`
--

INSERT INTO `tbl_lieux` (`no_lieu`, `titre_lieu`, `desc_lieu`, `no_user`) VALUES
(1, 'Maison', '\r\n', 1),
(18, 'Chez nous', '', 4),
(17, 'maison', '', 2),
(19, 'roulotte', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_listes`
--

CREATE TABLE IF NOT EXISTS `tbl_listes` (
  `no_liste` int(11) NOT NULL AUTO_INCREMENT,
  `titre_liste` mediumtext,
  `desc_liste` text,
  `no_lieu` int(11) NOT NULL,
  PRIMARY KEY (`no_liste`),
  KEY `FK_Tbl_listes_no_lieu` (`no_lieu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_listes`
--

INSERT INTO `tbl_listes` (`no_liste`, `titre_liste`, `desc_liste`, `no_lieu`) VALUES
(1, 'Frigo', '', 1),
(2, 'congelateur', '', 1),
(3, 'armoire', '', 1),
(12, 'Congelateur frigo', '', 18),
(7, 'frigidaire', '', 17),
(8, 'garde-manger', '', 17),
(9, 'congÃ©lateur', '', 17),
(11, 'Garde manger', '', 18),
(13, 'Congelateur', '', 18),
(14, 'Armoire garde manger', '', 18),
(15, 'Frigo', '', 18),
(16, 'armoire blanche ', 'Ã€ la cave', 17),
(17, 'frigo', '', 19),
(18, 'epicerie', '', 17);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_liste_articles`
--

CREATE TABLE IF NOT EXISTS `tbl_liste_articles` (
  `no_liste` int(11) NOT NULL AUTO_INCREMENT,
  `no_article` bigint(20) NOT NULL,
  `qte_article` bigint(20) DEFAULT '0',
  `qte_limit_article` bigint(20) DEFAULT '1',
  `date_liste_article` date DEFAULT NULL,
  PRIMARY KEY (`no_liste`,`no_article`),
  KEY `FK_garde_no_article` (`no_article`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_liste_articles`
--

INSERT INTO `tbl_liste_articles` (`no_liste`, `no_article`, `qte_article`, `qte_limit_article`, `date_liste_article`) VALUES
(7, 12, 1, 1, NULL),
(7, 2, 1, 0, NULL),
(8, 4, 2, 1, NULL),
(8, 3, 4, 1, NULL),
(8, 5, 1, 1, NULL),
(8, 6, 1, 1, NULL),
(9, 7, 1, 1, NULL),
(8, 8, 6, 1, NULL),
(8, 9, 2, 1, NULL),
(8, 10, 1, 1, NULL),
(8, 11, 2, 1, NULL),
(7, 13, 1, 1, NULL),
(7, 14, 1, 1, NULL),
(7, 15, 1, 1, NULL),
(7, 16, 1, 1, NULL),
(7, 17, 1, 1, NULL),
(7, 18, 1, 1, NULL),
(7, 19, 1, 1, NULL),
(7, 20, 1, 1, NULL),
(7, 21, 1, 1, NULL),
(7, 22, 5, 2, NULL),
(7, 23, 1, 1, NULL),
(7, 24, 1, 1, NULL),
(7, 25, 2, 1, NULL),
(7, 26, 0, 1, NULL),
(7, 28, 1, 1, NULL),
(7, 29, 1, 1, NULL),
(7, 30, 1, 1, NULL),
(7, 31, 1, 1, NULL),
(8, 31, 2, 0, NULL),
(8, 32, 0, 0, NULL),
(7, 33, 1, 1, NULL),
(8, 34, 1, 1, NULL),
(8, 35, 1, 1, NULL),
(8, 36, 1, 1, NULL),
(8, 37, 1, 1, NULL),
(8, 38, 1, 1, NULL),
(8, 33, 1, 0, NULL),
(8, 39, 2, 1, NULL),
(8, 40, 0, 1, NULL),
(8, 41, 0, 1, NULL),
(8, 42, 1, 1, NULL),
(8, 43, 1, 1, NULL),
(8, 44, 1, 1, NULL),
(8, 45, 1, 1, NULL),
(8, 46, 2, 1, NULL),
(8, 47, 1, 1, NULL),
(8, 48, 1, 0, NULL),
(8, 49, 1, 1, NULL),
(8, 50, 0, 1, NULL),
(8, 51, 1, 1, NULL),
(8, 52, 1, 1, NULL),
(8, 53, 1, 1, NULL),
(8, 54, 1, 1, NULL),
(8, 55, 2, 1, NULL),
(8, 56, 2, 1, NULL),
(8, 57, 4, 1, NULL),
(7, 59, 1, 1, NULL),
(8, 61, 1, 1, NULL),
(7, 50, 1, 1, NULL),
(8, 62, 1, 1, NULL),
(8, 63, 2, 1, NULL),
(8, 64, 1, 1, NULL),
(8, 65, 1, 1, NULL),
(8, 66, 2, 1, NULL),
(8, 68, 2, 1, NULL),
(8, 67, 1, 1, NULL),
(8, 69, 1, 0, NULL),
(8, 70, 1, 0, NULL),
(8, 71, 1, 1, NULL),
(8, 72, 1, 1, NULL),
(8, 75, 1, 1, NULL),
(8, 73, 2, 1, NULL),
(8, 74, 2, 1, NULL),
(8, 77, 1, 1, NULL),
(8, 78, 1, 1, NULL),
(8, 76, 1, 1, NULL),
(8, 79, 1, 1, NULL),
(8, 81, 1, 0, NULL),
(8, 82, 1, 0, NULL),
(8, 80, 1, 0, NULL),
(9, 83, 0, 1, NULL),
(9, 60, 0, 1, NULL),
(16, 84, 1, 1, NULL),
(8, 85, 1, 1, NULL),
(8, 84, 2, 1, NULL),
(8, 86, 1, 1, NULL),
(16, 87, 0, 1, NULL),
(9, 88, 5, 1, NULL),
(8, 89, 0, 1, NULL),
(8, 90, 1, 1, NULL),
(8, 91, 2, 1, NULL),
(8, 92, 1, 1, NULL),
(8, 93, 1, 1, NULL),
(8, 94, 2, 1, NULL),
(8, 95, 1, 1, NULL),
(8, 96, 1, 1, NULL),
(8, 97, 1, 1, NULL),
(8, 98, 1, 1, NULL),
(8, 99, 1, 1, NULL),
(8, 100, 1, 1, NULL),
(8, 101, 2, 1, NULL),
(16, 102, 4, 1, NULL),
(16, 3, 11, 1, NULL),
(16, 94, 1, 1, NULL),
(16, 103, 1, 1, NULL),
(16, 104, 2, 1, NULL),
(16, 105, 1, 1, NULL),
(16, 42, 5, 1, NULL),
(16, 106, 1, 1, NULL),
(16, 107, 1, 1, NULL),
(16, 108, 10, 1, NULL),
(16, 110, 0, 1, NULL),
(16, 111, 1, 1, NULL),
(16, 112, 1, 1, NULL),
(16, 49, 2, 1, NULL),
(16, 113, 0, 1, NULL),
(16, 114, 0, 1, NULL),
(16, 115, 2, 1, NULL),
(16, 116, 2, 1, NULL),
(16, 36, 1, 1, NULL),
(16, 117, 2, 1, NULL),
(16, 118, 1, 1, NULL),
(16, 41, 1, 1, NULL),
(16, 119, 1, 1, NULL),
(16, 120, 2, 1, NULL),
(16, 121, 1, 1, NULL),
(16, 122, 1, 1, NULL),
(16, 123, 1, 1, NULL),
(16, 124, 1, 1, NULL),
(16, 125, 1, 1, NULL),
(16, 126, 2, 1, NULL),
(16, 127, 1, 1, NULL),
(16, 128, 2, 1, NULL),
(16, 129, 1, 1, NULL),
(16, 130, 0, 1, NULL),
(8, 87, 1, 1, NULL),
(18, 131, 1, 1, NULL),
(18, 132, 2, 1, NULL),
(18, 133, 1, 1, NULL),
(18, 135, 1, 1, NULL),
(18, 136, 1, 1, NULL),
(18, 137, 1, 1, NULL),
(18, 138, 1, 0, NULL),
(18, 128, 3, 1, NULL),
(18, 139, 1, 1, NULL),
(18, 26, 1, 1, NULL),
(18, 140, 4, 1, NULL),
(18, 141, 1, 1, NULL),
(18, 142, 1, 1, NULL),
(18, 7, 6, 1, NULL),
(18, 143, 2, 1, NULL),
(18, 144, 2, 1, NULL),
(18, 145, 1, 1, NULL),
(18, 146, 1, 1, NULL),
(18, 147, 1, 1, NULL),
(18, 148, 3, 1, NULL),
(18, 149, 1, 1, NULL),
(18, 150, 1, 1, NULL),
(18, 151, 1, 1, NULL),
(18, 152, 1, 1, NULL),
(18, 153, 1, 1, NULL),
(18, 154, 1, 1, NULL),
(18, 155, 1, 1, NULL),
(18, 156, 2, 1, NULL),
(18, 157, 1, 1, NULL),
(18, 158, 0, 1, '2015-02-04'),
(8, 158, 1, 1, NULL),
(18, 161, 1, 1, NULL),
(8, 160, 2, 1, '2015-02-04'),
(8, 159, 1, 1, NULL),
(16, 159, 1, 1, NULL),
(18, 163, 2, 1, NULL),
(18, 164, 1, 1, NULL),
(9, 165, 1, 1, NULL),
(9, 166, 1, 1, NULL),
(9, 167, 1, 1, NULL),
(9, 168, 4, 1, NULL),
(9, 169, 1, 1, NULL),
(9, 170, 1, 1, NULL),
(7, 171, 1, 1, NULL),
(7, 172, 1, 1, NULL),
(7, 3, 0, 1, NULL),
(8, 162, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_liste_restants`
--

CREATE TABLE IF NOT EXISTS `tbl_liste_restants` (
  `no_liste` int(11) NOT NULL AUTO_INCREMENT,
  `no_restant` bigint(20) NOT NULL,
  `qte_restant` bigint(20) DEFAULT NULL,
  `date_liste_restant` date DEFAULT NULL,
  PRIMARY KEY (`no_liste`,`no_restant`),
  KEY `FK_congele_no_restant` (`no_restant`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_liste_restants`
--

INSERT INTO `tbl_liste_restants` (`no_liste`, `no_restant`, `qte_restant`, `date_liste_restant`) VALUES
(8, 2, 1, NULL),
(9, 3, 3, NULL),
(9, 7, 1, NULL),
(14, 9, 0, NULL),
(2, 1, 6, NULL),
(9, 12, 3, NULL),
(9, 13, 1, NULL),
(7, 14, 2, NULL),
(9, 22, 5, NULL),
(9, 16, 0, NULL),
(8, 17, 1, NULL),
(9, 18, 1, NULL),
(9, 19, 2, NULL),
(9, 20, 1, NULL),
(9, 21, 2, NULL),
(9, 23, 3, NULL),
(9, 24, 2, NULL),
(9, 26, 1, NULL),
(9, 27, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_magasins`
--

CREATE TABLE IF NOT EXISTS `tbl_magasins` (
  `no_magasin` int(11) NOT NULL AUTO_INCREMENT,
  `nom_magasin` mediumtext,
  `desc_magasin` text,
  PRIMARY KEY (`no_magasin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_magasins`
--

INSERT INTO `tbl_magasins` (`no_magasin`, `nom_magasin`, `desc_magasin`) VALUES
(1, 'WalMart', NULL),
(2, 'Metro', NULL),
(3, 'IGA', NULL),
(4, 'Target', NULL),
(5, 'Maxi', NULL),
(6, 'Loblaws', NULL),
(7, 'Peres Nature', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prix`
--

CREATE TABLE IF NOT EXISTS `tbl_prix` (
  `no_prix` bigint(20) NOT NULL AUTO_INCREMENT,
  `montant_prix` int(11) DEFAULT NULL,
  `gramme_prix` int(11) DEFAULT NULL,
  PRIMARY KEY (`no_prix`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prix_articles`
--

CREATE TABLE IF NOT EXISTS `tbl_prix_articles` (
  `no_article` bigint(20) NOT NULL AUTO_INCREMENT,
  `no_magasin` int(11) NOT NULL,
  `no_prix` bigint(20) NOT NULL,
  `date_prix` date DEFAULT NULL,
  PRIMARY KEY (`no_article`,`no_magasin`,`no_prix`),
  KEY `FK_offre_no_magasin` (`no_magasin`),
  KEY `FK_offre_no_prix` (`no_prix`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recettes`
--

CREATE TABLE IF NOT EXISTS `tbl_recettes` (
  `no_recette` bigint(20) NOT NULL AUTO_INCREMENT,
  `code_recette` mediumtext,
  `titre_recette` mediumtext,
  `desc_recette` text,
  `share_recette` int(11) DEFAULT NULL,
  `no_user` bigint(20) NOT NULL,
  `no_catego` bigint(20) NOT NULL,
  `date_recette` datetime DEFAULT NULL,
  PRIMARY KEY (`no_recette`),
  KEY `FK_Tbl_recettes_no_user` (`no_user`),
  KEY `FK_Tbl_recettes_no_catego` (`no_catego`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_recettes`
--

INSERT INTO `tbl_recettes` (`no_recette`, `code_recette`, `titre_recette`, `desc_recette`, `share_recette`, `no_user`, `no_catego`, `date_recette`) VALUES
(3, '888887974897897979', 'tarte', 'fdsfdsfds', 1, 1, 1, '2015-01-21 10:42:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recette_articles`
--

CREATE TABLE IF NOT EXISTS `tbl_recette_articles` (
  `no_article` bigint(20) NOT NULL AUTO_INCREMENT,
  `no_recette` bigint(20) NOT NULL,
  `qte_article_recette` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`no_article`,`no_recette`),
  KEY `FK_utilise_no_recette` (`no_recette`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_recette_articles`
--

INSERT INTO `tbl_recette_articles` (`no_article`, `no_recette`, `qte_article_recette`) VALUES
(2, 3, 1),
(12, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restants`
--

CREATE TABLE IF NOT EXISTS `tbl_restants` (
  `no_restant` bigint(20) NOT NULL AUTO_INCREMENT,
  `code_restant` mediumtext,
  `nom_restant` mediumtext,
  `desc_restant` text,
  `no_user` bigint(20) NOT NULL,
  PRIMARY KEY (`no_restant`),
  KEY `FK_tbl_restants_no_user` (`no_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `tbl_restants`
--

INSERT INTO `tbl_restants` (`no_restant`, `code_restant`, `nom_restant`, `desc_restant`, `no_user`) VALUES
(1, '456', 'test restant', '', 1),
(2, '1111111111', 'sucre vanillÃ©', 'Bas, tablette du centre', 2),
(3, 'painviande', 'pain de viande', 'Avec bacon\r\ndec. 2014', 2),
(11, '', 'pizza Vincent', '1 iÃ¨re tablette', 2),
(10, 'pizz', 'pizza CÃ©line', '1 iÃ¨re tablette\r\n29 dec. 2015', 2),
(9, 'Bb', 'Bobette', '', 4),
(7, 'hotchiken', 'sauce hot chicken', 'Porte\r\ndec. 2014', 2),
(12, 'piz', 'pizza Vincent', '1 iÃ¨re tablette\r\n29 dec. 2014', 2),
(13, 'jambon', 'jambon Ã  l''ananas', '2 tablette au fond Ã  cÃ´tÃ© du bac vert\r\n\r\nDÃ©c. 2014', 2),
(14, 'jam', 'jambon Ã  l''ananas', 'Compartiment lait+cÃ´tÃ© fromage jaune \r\n28 dec. 2014', 2),
(15, 'gratin', 'gratin dauphinois', 'Tablette du bas\r\n28 dec. 2014', 2),
(16, 'cuit', 'bacon cuit', '2 iÃ¨me tablette\r\n02/01/2015', 0),
(17, 'sarasin', 'farine de sarasin', 'Sous micro-onde 3 iÃ¨me tablette', 2),
(18, 'ham', 'hamberger', '2 iÃ¨me tablette\r\n3 et 17 janv. 2015', 2),
(19, 'saucis', 'saucisses cuites', '4 iÃ¨me tablette', 2),
(20, 'vol', 'sauce vol-au-vent', 'Pour 1 personne\r\n3 iÃ¨me tablette\r\n8/01/015\r\n', 2),
(21, 'rag', 'ragout poulet', 'Tablette 3 et 4,\r\n12 janv. 2015', 2),
(22, 'via', 'viande Ã  hot-dog', 'Au fond de la 3 iÃ¨me tabblette,  18/01/015', 2),
(23, 'cre', 'creton veau', '1 iÃ¨re tablette', 2),
(24, 'cho', 'chop de lard', '1 iÃ¨re tablette, 1 personne', 2),
(25, '064300474008', 'sauce poutine', 'Porte', 2),
(26, 'pou', 'sauce poutine', 'Porte', 2),
(27, 'lai', 'lait Samuel', '3 iÃ¨me tablette', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE IF NOT EXISTS `tbl_type` (
  `no_type` int(11) NOT NULL AUTO_INCREMENT,
  `desc_type` text,
  PRIMARY KEY (`no_type`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`no_type`, `desc_type`) VALUES
(1, 'Admin'),
(2, 'Tester'),
(3, 'Premium'),
(4, 'Regular');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `no_user` bigint(20) NOT NULL AUTO_INCREMENT,
  `username_user` mediumtext,
  `nom_user` mediumtext,
  `prenom_user` mediumtext,
  `mdp_user` mediumtext,
  `courriel_user` mediumtext,
  `no_type` int(11) NOT NULL,
  PRIMARY KEY (`no_user`),
  KEY `FK_Tbl_Users_no_type` (`no_type`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`no_user`, `username_user`, `nom_user`, `prenom_user`, `mdp_user`, `courriel_user`, `no_type`) VALUES
(1, 'Samylots', 'Beaudoin', 'Samuel', '866694c462ded35a526c08ba138f29e868e808df', 'samapoil9@hotmail.com', 1),
(2, 'celes01', 'Lessard', 'Celine', '28c7348b02c1aa3dde7ee2a65cbb062c066c260a', 'vskmc@sogetel.net', 2),
(4, 'K_beaudoin', 'Beaudoin', 'Keven', 'eb8efe1c4acb71adc953ebb5393486ac51f1ba40', 'k_beaudoin@hotmail.com', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
