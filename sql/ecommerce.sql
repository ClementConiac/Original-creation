-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 11 avr. 2018 à 19:56
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `category_item`
--

DROP TABLE IF EXISTS `category_item`;
CREATE TABLE IF NOT EXISTS `category_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `category_item`
--

INSERT INTO `category_item` (`id`, `name`, `description`) VALUES
(1, 'Tee-shirt', 'Tee-shirt manche courte'),
(2, 'Sweat-shirt', 'Sweat-shirt avec capuche');

-- --------------------------------------------------------

--
-- Structure de la table `category_kind`
--

DROP TABLE IF EXISTS `category_kind`;
CREATE TABLE IF NOT EXISTS `category_kind` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `category_kind`
--

INSERT INTO `category_kind` (`id`, `name`, `image`) VALUES
(1, 'Homme', '9dbffba2a03b29811719318b20070b4a.jpg'),
(2, 'Femme', '43a87a86ea9aee0255325e2865d6b503.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `item_id` int(11) NOT NULL,
  `model` tinyint(1) NOT NULL DEFAULT '0',
  `back` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=240 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id`, `caption`, `name`, `item_id`, `model`, `back`) VALUES
(5, 'Aqua licorne - Tee shirt - blanc face', '26337353b7962f533d78c762373b3318.png', 119, 0, 0),
(4, 'Aqua licorne - Tee shirt - blanc dos', '6c3cf77d52820cd0fe646d38bc2145ca.png', 119, 0, 1),
(6, 'Aqua licorne - Tee shirt - gris dos', '7f46c947fb6d99b46df4e2181237e2d0.png', 119, 0, 1),
(7, 'Aqua licorne - Tee shirt - gris face', 'b3746c4a274181d2bcc315ab1f7aa87d.png', 119, 0, 0),
(8, 'Avocat - Tee shirt - blanc dos', 'ae97cad218fc1460f367cb360f4a5461.png', 120, 0, 1),
(9, 'Avocat - Tee shirt - blanc face', 'eb17f3472e73f481d8e135c779c01858.png', 120, 0, 0),
(10, 'Avocat - Tee shirt - gris dos', '34306d99c63613fad5b2a140398c0420.png', 120, 0, 1),
(11, 'Avocat - Tee shirt - gris face', '9185f3ec501c674c7c788464a36e7fb3.png', 120, 0, 0),
(12, 'Baleine - Tee shirt - blanc dos', '157e2c09fd6a096b061c2baf0b1d8899.png', 121, 0, 1),
(13, 'Baleine - Tee shirt - blanc face', 'a706b4d72de0eae9e9682f3ba03adfd7.png', 121, 0, 0),
(14, 'Baleine - Tee shirt - rouge dos', 'cefab442b1728a7c1b49c63f1a55781c.png', 121, 0, 1),
(15, 'Baleine - Tee shirt - rouge face', '45f6a4a57549a5720dfdcdf643c78b83.png', 121, 0, 0),
(16, 'Bambi - Tee shirt - gris dos', '364196813f3b746270a9b27bd76149c9.png', 122, 0, 1),
(17, 'Bambi - Tee shirt - gris face', '95cbccd215b174ddee376b6eb425975a.png', 122, 0, 0),
(18, 'Bambi - Tee shirt - bleu dos', '7de32147a4f1055bed9e4faf3485a84d.png', 122, 0, 1),
(19, 'Bambi - Tee shirt - bleu face', '0f46c64b74a6c964c674853a89796c8e.png', 122, 0, 0),
(20, 'Bird - Tee shirt - gris dos', '49dee2008d36b4304fcb72e867f40c14.png', 123, 0, 1),
(21, 'Bird - Tee shirt - gris face', '6af814698155afb9511dd5e91454834a.png', 123, 0, 0),
(22, 'Bird - Tee shirt - noir dos', '7bfa32686d200c64cb46de03ac2eac0d.png', 123, 0, 1),
(23, 'Bird - Tee shirt - noir face', '933390dbc3600bd8710a48fef4997a7f.png', 123, 0, 0),
(24, 'Rolling Stone - Tee shirt - blanc dos', '211ed78fe91938b90f84a51944b08d5a.png', 124, 0, 1),
(25, 'Rolling Stone - Tee shirt - blanc face', 'b94909c45ed96a5a5c25378254116b57.png', 124, 0, 0),
(26, 'Rolling Stone - Tee shirt - noir dos', '0ead0dd9d2b345a1fe8507437245d8f8.png', 124, 0, 1),
(27, 'Rolling Stone - Tee shirt - noir face', '81b669febd10363a78964e2ea652a9e6.png', 124, 0, 0),
(28, 'Cats - Tee shirt - noir dos', '6b1d7eadb42d159909af05a7a6d88989.png', 125, 0, 1),
(29, 'Cats - Tee shirt - noir face', '5e98d23afe19a774d1b2dcbefd5103eb.png', 125, 0, 0),
(30, 'Cats - Tee shirt - rouge dos', '8daf9808509694b39ac7ad3b3bda71f3.png', 125, 0, 1),
(31, 'Cats - Tee shirt - rouge face', 'e8a079d6a3dbabc7bcfa0047f63e475c.png', 125, 0, 0),
(32, 'Fée - Tee shirt - noir dos', '02af07ab8a2782c8790a015fb912f677.png', 126, 0, 1),
(33, 'Fée - Tee shirt - noir face', '01600ecc17d3094eb9669cd6a4feb8a8.png', 126, 0, 0),
(34, 'Fée - Tee shirt - vert dos', '19eca5979ccbb752778e6c5f090dc9b6.png', 126, 0, 1),
(35, 'Fée - Tee shirt - vert face', 'f83d13844fb3dadd32223756dd132261.png', 126, 0, 0),
(36, 'Féminisme - Tee shirt - bleu dos', 'ede7e2b6d13a41ddf9f4bdef84fdc737.png', 127, 0, 1),
(37, 'Féminisme - Tee shirt - bleu face', 'fcba6537741bf200fd2d7e965afd9770.png', 127, 0, 0),
(38, 'Féminisme - Tee shirt - rose dos', '4b86abe48d358ecf194c56c69108433e.png', 127, 0, 1),
(39, 'Féminisme - Tee shirt - rose face', '81853dc778186bff64ba4b47dacfe8aa.png', 127, 0, 0),
(40, 'Frite - Tee shirt - rose dos', '2877b49ebb731389a1a583bda03540bd.png', 128, 0, 1),
(41, 'Frite - Tee shirt - rose face', '1458c6647dbf7cca56dff7bfe0576ebb.png', 128, 0, 0),
(42, 'Frite - Tee shirt - violet dos', 'bc9d42fcee61388f6d4634deb12d5b48.png', 128, 0, 1),
(43, 'Frite - Tee shirt - violet face', 'd0f548652e8a7292eb72153ee4f3b411.png', 128, 0, 0),
(44, 'Panda - Tee shirt - bleu dos', '16fc18d787294ad5171100e33d05d4e2.png', 129, 0, 1),
(45, 'Panda - Tee shirt - bleu face', 'd13f6aa1117f0a36d3478a998f9925b7.png', 129, 0, 0),
(46, 'Panda - Tee shirt - noir dos', '8635b5fd6bc675033fb72e8a3ccc10a0.png', 129, 0, 1),
(47, 'Panda - Tee shirt - noir face', '8989e07fc124e7a9bcbdebcc8ace2bc0.png', 129, 0, 0),
(48, 'Pizza - Tee shirt - noir dos', '56457b43d703d1633b36fec9a01ea51e.png', 130, 0, 1),
(49, 'Pizza - Tee shirt - noir face', '7fad1aaeb2b1139a73241d05e5a68cbb.png', 130, 0, 0),
(50, 'Pizza - Tee shirt - violet dos', '0af787945872196b42c9f73ead2565c8.png', 130, 0, 1),
(51, 'Pizza - Tee shirt - violet face', 'd9eb09a4dbf0b2098faf20331f294afe.png', 130, 0, 0),
(52, 'Princesse - Tee shirt - blanc dos', 'ec0387f057705a013c09bc5508249ea7.png', 131, 0, 1),
(53, 'Princesse - Tee shirt - blanc face', 'e8d2fc41fb98705874a309ed648806a0.png', 131, 0, 0),
(54, 'Princesse - Tee shirt - gris dos', '0832f3473e5c452694a193e668e38ad1.png', 131, 0, 1),
(55, 'Princesse - Tee shirt - gris face', '9016512cbdfaa7634ba35dd446297b7b.png', 131, 0, 0),
(56, 'Shopping - Tee shirt - bleu dos', 'aded6ee2a29750522670aad156b654bd.png', 132, 0, 1),
(57, 'Shopping - Tee shirt - bleu face', '4afe044911ed2c247005912512ace23b.png', 132, 0, 0),
(58, 'Shopping - Tee shirt - noir dos', '3171b3bc8d19c82f38fef8b518aef833.png', 132, 0, 1),
(59, 'Shopping - Tee shirt - noir face', 'b666545e24ea289be13796baae7463e3.png', 132, 0, 0),
(60, 'Vibes - Tee shirt - bleu dos', 'd0ab3eaa2d0af7efe82a485a26fb2705.png', 133, 0, 1),
(61, 'Vibes - Tee shirt - bleu face', 'a6640ad0aca7033809ffa7165c3040f9.png', 133, 0, 0),
(62, 'Vibes - Tee shirt - rouge dos', '60d2d5e1fc6ed532f175d633240b2075.png', 133, 0, 1),
(63, 'Vibes - Tee shirt - rouge face', '4639475d6782a08c1e964f9a4329a254.png', 133, 0, 0),
(64, 'Wonder woman - Tee shirt - vert dos', 'f6e8de88807006538cd9be5fd3ba51c1.png', 134, 0, 1),
(65, 'Wonder woman - Tee shirt - vert face', '7d49c3e7fa0a529bbcd35b3c858e886e.png', 134, 0, 0),
(66, 'Wonder woman - Tee shirt - violet dos', 'b53086d558f1127993271e8c504ded45.png', 134, 0, 1),
(67, 'Wonder woman - Tee shirt - violet face', 'eb32c69f88aa347dcb335d47f0c075e7.png', 134, 0, 0),
(74, 'Batman - Tee shirt - bleu dos', '012a91467f210472fab4e11359bbfef6.png', 136, 0, 1),
(80, 'Beard - Tee shirt - bleu face', 'e6511e07069c95500e0337215ac85395.png', 137, 0, 0),
(75, 'Batman - Tee shirt - bleu face', '41a60377ba920919939d83326ebee5a1.png', 136, 0, 0),
(76, 'Batman - Tee shirt - gris dos', 'b27a5a543f55bda3adeda94a76790bdb.png', 136, 0, 1),
(77, 'Batman - Tee shirt - gris face', 'bbdba257f96ea1bfa6e0aa829c59984c.png', 136, 0, 0),
(79, 'Beard - Tee shirt - bleu dos', '7f52d05b03fa31d9fff9b51349efeef4.png', 137, 0, 1),
(81, 'Beard - Tee shirt - gris dos', '19a87049ef104ba10d1a7aa3d70ad59a.png', 137, 0, 1),
(82, 'Beard - Tee shirt - bleu face', '66b0cd925d80e64555a2babbb2ccddc2.png', 137, 0, 0),
(83, 'Born 80 - Tee shirt - bleu dos', '3ef430bcac19166ddf205dd8cdf4edca.png', 138, 0, 1),
(84, 'Born 80 - Tee shirt - bleu face', '3a0cc05957ec30e262540e57b8a413ae.png', 138, 0, 0),
(85, 'Born 80 - Tee shirt - noir dos', 'f7fb43719fb4947a5d0faa61de9fb232.png', 138, 0, 1),
(86, 'Born 80 - Tee shirt - noir face', 'e32c51ad39723ee92b285b362c916ca7.png', 138, 0, 0),
(87, 'Burger - Tee shirt - bleu dos', 'f2ce1333f818dec7cb51e00e74bedd15.png', 139, 0, 1),
(88, 'Burger - Tee shirt - bleu face', '710ebadf55558b46b755c665a9177880.png', 139, 0, 0),
(89, 'Burger - Tee shirt - blanc dos', '3bd80cc75f3bee69358296a3c4d8f01e.png', 139, 0, 1),
(90, 'Burger - Tee shirt - blanc face', '721e7285b298cde5b3d0c973ed8d7b63.png', 139, 0, 0),
(91, 'Cactus - Tee shirt - bleu dos', '8ddc98fe6483c3ecddcb687eb2d30d37.png', 140, 0, 1),
(92, 'Cactus - Tee shirt - bleu face', '923cac285a4b2e03d3d618857c250eee.png', 140, 0, 0),
(93, 'Cactus - Tee shirt - blanc dos', '9fd4b00af024dc168d3d955414ceb8e9.png', 140, 0, 1),
(94, 'Cactus - Tee shirt - blanc face', '18fb150bb65a5825c83969a59f3febc1.png', 140, 0, 0),
(95, 'Chauve souris - Tee shirt - bleu dos', 'd3952b85dfe9e8b3b9c453532beb7208.png', 141, 0, 1),
(96, 'Chauve souris - Tee shirt - bleu face', '9981ae50de43432c6299c5a4c5d30050.png', 141, 0, 0),
(97, 'Chauve souris - Tee shirt - gris dos', 'dfd786998e082758be12670d856df755.png', 141, 0, 1),
(98, 'Chauve souris - Tee shirt - gris face', '27dcfa6c9fb04dfa28b3e385698e3e5c.png', 141, 0, 0),
(99, 'Don\'t care - Tee shirt - bleu dos', '573572e4e9a8486a02fbc7eeeaffba7b.png', 142, 0, 1),
(100, 'Don\'t care - Tee shirt - bleu face', '41d6c2482cdf34113f998e9df192e148.png', 142, 0, 0),
(101, 'Don\'t care - Tee shirt - gris dos', '54fda78aa8a09b4d77b5aaec57b75028.png', 142, 0, 1),
(102, 'Don\'t care - Tee shirt - gris face', '4c3c33b9115db0a66cd40a5465974ed6.png', 142, 0, 0),
(103, 'Flash - Tee shirt - bleu dos', 'f9c42040716c5ec592a0cd1735e596ff.png', 143, 0, 1),
(104, 'Flash - Tee shirt - bleu face', 'd802a3e63c700493242d9d104389c7df.png', 143, 0, 0),
(105, 'Flash - Tee shirt - gris dos', 'b4d168b48157c623fbd095b4a565b5bb.png', 143, 0, 1),
(106, 'Flash - Tee shirt - gris face', '9bc804e36dfda950c21b6022e67863ef.png', 143, 0, 0),
(107, 'Keep calm zombie - Tee shirt - bleu dos', 'c061abe12b79ffb077e88ecf5e4bcf01.png', 144, 0, 1),
(108, 'Keep calm zombie - Tee shirt - bleu face', '81e4fe932e45bbbc10cfce7ffb67162e.png', 144, 0, 0),
(109, 'Keep calm zombie - Tee shirt - gris dos', 'd994e3728ba5e28defb88a3289cd7ee8.png', 144, 0, 1),
(110, 'Keep calm zombie - Tee shirt - gris face', 'c04c19c2c2474dbf5f7ac4372c5b9af1.png', 144, 0, 0),
(111, 'Ni dieu ni maître - Tee shirt - bleu dos', '4fa177df22864518b2d7818d4db5db2d.png', 145, 0, 1),
(112, 'Ni dieu ni maître - Tee shirt - bleu face', '27253445de7e4ce1cff3853ee2b357b2.png', 145, 0, 0),
(113, 'Ni dieu ni maître - Tee shirt - noir dos', '6e69ebbfad976d4637bb4b39de261bf7.png', 145, 0, 1),
(114, 'Ni dieu ni maître - Tee shirt - noir face', '1730f69e6f66d5f0c741799e82351f81.png', 145, 0, 0),
(115, 'Pas 50 ans - Tee shirt - bleu dos', '09ba3f0df1447f40e98674ba9d62c747.png', 146, 0, 1),
(116, 'Pas 50 ans - Tee shirt - bleu face', '52c670999cdef4b09eb656850da777c4.png', 146, 0, 0),
(117, 'Pas 50 ans - Tee shirt - noir dos', '943c84b16aaafd25f1c0d243cdd357d6.png', 146, 0, 1),
(118, 'Pas 50 ans - Tee shirt - noir face', '66a168785ed58b2b5955cea85954d669.png', 146, 0, 0),
(119, 'Rubiscube - Tee shirt - noir dos', '4c9d1fbce4890fc2731b6a61262313b1.png', 147, 0, 1),
(120, 'Rubiscube - Tee shirt - noir face', 'c1502ae5a4d514baec129f72948c266e.png', 147, 0, 0),
(121, 'Rubiscube - Tee shirt - blanc dos', '7651301cabf91a1be8e3cf0b72e8734f.png', 147, 0, 1),
(122, 'Rubiscube - Tee shirt - blanc face', '0b9dcc39ddecd3359566b59d3c9a6b9c.png', 147, 0, 0),
(123, 'Superman - Tee shirt - gris clair dos', '127d2e587fe09591c67b04c7c7190479.png', 148, 0, 1),
(124, 'Superman - Tee shirt - gris clair face', '47b4f1bfdf6d298682e610ad74b37dca.png', 148, 0, 0),
(125, 'Superman - Tee shirt - gris foncé dos', '6eb6e75fddec0218351dc5c0c8464104.png', 148, 0, 1),
(126, 'Superman - Tee shirt - gris foncé face', '87a1ce4101713d067ef68c3dba223ab3.png', 148, 0, 0),
(127, 'Two guns - Tee shirt - blanc dos', '7e909d0e18cec1ad8ad9076be0b669c2.png', 149, 0, 1),
(128, 'Two guns - Tee shirt - blanc face', 'd185c5ed37536ac0063f735f7a15dd24.png', 149, 0, 0),
(129, 'Two guns - Tee shirt - bleu dos', 'ad16fe8f92f051afbf656271afd7872d.png', 149, 0, 1),
(130, 'Two guns - Tee shirt - bleu face', '2adee3823fe0b1c49ce2b4124cdcecda.png', 149, 0, 0),
(131, 'Vintage moto - Tee shirt - bleu dos', 'b88524c1561b782a1a78bd24d1712ffb.png', 150, 0, 1),
(132, 'Vintage moto - Tee shirt - bleu face', 'cf577c93108e7dcf27f7905e65933d18.png', 150, 0, 0),
(133, 'Vintage moto - Tee shirt - gris dos', '63c34979acf3fe9ef1f8faa3f43ca5f7.png', 150, 0, 1),
(134, 'Vintage moto - Tee shirt - gris face', '8de87e06e082806f690692c0ca47d3cc.png', 150, 0, 0),
(135, 'Wisky - Tee shirt - blanc dos', '9a912f218d27a625d946ed56081d9123.png', 151, 0, 1),
(136, 'Wisky - Tee shirt - blanc face', '6ac37313e074d4fa4c73335747f35fa1.png', 151, 0, 0),
(137, 'Wisky - Tee shirt - bleu dos', '36ac2b589744fa94bfe694b604971bf0.png', 151, 0, 1),
(138, 'Wisky - Tee shirt - bleu face', '677fa4059ee76333f9bb9a7920aef719.png', 151, 0, 0),
(141, 'Batman - Tee shirt - mannequin dos', '18daa83afcf39c61b9ddd9c817054d64.png', 136, 1, 1),
(142, 'Batman - Tee shirt - mannequin face', 'c79ec57a8e72a87d8a69d2c6b8a2a8d4.png', 136, 1, 0),
(143, 'Beard - Tee shirt - mannequin dos', '273928cb4859a0db86ba8aefd34c1755.png', 137, 1, 1),
(144, 'Beard - Tee shirt - mannequin face', '29ddf7414ac131a83205fe7195aff159.png', 137, 1, 0),
(145, 'Born 80 - Tee shirt - mannequin dos', 'd0866fb7fef7340334755089f89bdfeb.png', 138, 1, 1),
(146, 'Born 80 - Tee shirt - mannequin face', '1977ab8c9f9473d8594671be4ddf9e7f.png', 138, 1, 0),
(147, 'Burger - Tee shirt - mannequin dos', 'd828725179d622a56f951e527a966ed7.png', 139, 1, 1),
(148, 'Burger - Tee shirt - mannequin face', 'f60749fa4cee4f9dfe786aba9d7be0da.png', 139, 1, 0),
(149, 'Chauve souris - Tee shirt - mannequin dos', '8735c937a659ef5138a7f5bd7bf59ae6.png', 141, 1, 1),
(150, 'Chauve souris - Tee shirt - mannequin face', '3fb04953d95a94367bb133f862402bce.png', 141, 1, 0),
(151, 'Don\'t care - Tee shirt - mannequin dos', '1fc30b9d4319760b04fab735fbfed9a9.png', 142, 1, 1),
(152, 'Don\'t care - Tee shirt - mannequin face', 'a1cb608a30fc2883eed0831dcf25f260.png', 142, 1, 0),
(153, 'Two guns - Tee shirt - mannequin dos', 'e5815151957be36ad2085b7a1a02c5cc.png', 149, 1, 1),
(154, 'Two guns - Tee shirt - mannequin face', '0bb0846327772451045bd30dd347821b.png', 149, 1, 0),
(155, 'Wisky - Tee shirt - mannequin dos', '8a6026f2e24c76678c283322a527f58f.png', 151, 1, 1),
(156, 'Wisky - Tee shirt - mannequin face', '68e4bdc24afcc8110cfbcbec24f12770.png', 151, 1, 0),
(157, 'Avocat - Tee shirt - mannequin dos', '0bf04bee73b4f705123f3183a081ce28.png', 120, 1, 1),
(158, 'Avocat - Tee shirt - mannequin face', '97d0145823aeb8ed80617be62e08bdcc.png', 120, 1, 0),
(159, 'Baleine - Tee shirt - mannequin dos', '7a22c0c0a4515485e31f95fd372050c9.png', 121, 1, 1),
(160, 'Baleine - Tee shirt - mannequin face', '37563f059c2d815bf5fc637cb88e1df3.png', 121, 1, 0),
(161, 'Bird - Tee shirt - mannequin dos', '49fbf9453be54ba56927b556d9958537.png', 123, 1, 1),
(162, 'Bird - Tee shirt - mannequin face', 'd79aac075930c83c2f1e369a511148fe.png', 123, 1, 0),
(163, 'Frite - Tee shirt - mannequin dos', '412bb949b10ebe6b9fe743385388f3cb.png', 128, 1, 1),
(164, 'Frite - Tee shirt - mannequin face', '2e0a791950a53842e60d83295368cdff.png', 128, 1, 0),
(165, 'Princesse - Tee shirt - mannequin dos', '5c936263f3428a40227908d5a3847c0b.png', 131, 1, 1),
(166, 'Princesse - Tee shirt - mannequin face', 'e1d55a1caf2d7b5c0c88fd76b8df2141.png', 131, 1, 0),
(167, 'Shopping - Tee shirt - mannequin dos', '8e5a808681a0070beaf455c2cabb782b.png', 132, 1, 1),
(168, 'Shopping - Tee shirt - mannequin face', '073b00ab99487b74b63c9a6d2b962ddc.png', 132, 1, 0),
(169, 'Vibes - Tee shirt - mannequin dos', '466accbac9a66b805ba50e42ad715740.png', 133, 1, 1),
(170, 'Vibes - Tee shirt - mannequin face', 'bf2fe6582ed9ead9161a3d6f6b1d6858.png', 133, 1, 0),
(171, 'Wonder woman - Tee shirt - mannequin dos', 'c84f741b048a0721739ac52c241ba5df.png', 134, 1, 1),
(172, 'Wonder woman - Tee shirt - mannequin face', 'd0e7244b36e4e2cfcc04d247bff16291.png', 134, 1, 0),
(173, 'Escalade - Sweat shirt - bleu dos', 'f2d35b2542b90a729646e3503a790669.png', 153, 0, 1),
(174, 'Escalade - Sweat shirt - bleu face', '2fefc978e8573441bb22120ecc62ac7d.png', 153, 0, 0),
(175, 'Escalade - Sweat shirt - rouge dos', 'ee6929cfd8dd567e41e4efe843b42dcd.png', 153, 0, 1),
(176, 'Escalade - Sweat shirt - rouge face', '50f3c73883917b44d9109375d6e9c37c.png', 153, 0, 0),
(177, 'Force - Sweat shirt - bleu dos', '4d6e4749289c4ec58c0063a90deb3964.png', 154, 0, 1),
(178, 'Force - Sweat shirt - bleu face', 'e6cb2a3c14431b55aa50c06529eaa21b.png', 154, 0, 0),
(179, 'Force - Sweat shirt - rouge dos', '6e315707bfe8c9809f10e7336a2455a2.png', 154, 0, 1),
(180, 'Force - Sweat shirt - rouge face', 'a1a3170911eaa82c07fccbcbdf61f6bb.png', 154, 0, 0),
(181, 'Handball - Sweat shirt - noir dos', 'a8c10ea52e3b84e7a2948f25a13f2768.png', 155, 0, 1),
(182, 'Handball - Sweat shirt - noir face', '4a7d2be8648d00c3d1090ed4168a5748.png', 155, 0, 0),
(183, 'Handball - Sweat shirt - rouge dos', '262e7707a161061c2b75c75215c2c4a9.png', 155, 0, 1),
(184, 'Handball - Sweat shirt - rouge face', 'd741ff8c24fe26717eb3101e2d8d30c1.png', 155, 0, 0),
(185, 'Magic - Sweat shirt - bleu dos', 'cb4b69eb9bd10da82c15dca2f86a1385.png', 156, 0, 1),
(186, 'Magic - Sweat shirt - bleu face', '53885282fbff8407b3b6e820b7830180.png', 156, 0, 0),
(187, 'Magic - Sweat shirt - rouge dos', '12f6de45d4efe308cfeeca3f1d0bc3af.png', 156, 0, 1),
(188, 'Magic - Sweat shirt - rouge face', '25702d4234f4c7dc542adde64426a7ca.png', 156, 0, 0),
(189, 'Musculation - Sweat shirt - bleu dos', '6b050305727cf58f619ee76f40697abf.png', 157, 0, 1),
(190, 'Musculation - Sweat shirt - bleu face', '41f6e8b589d6d47cc56937ff17c493f5.png', 157, 0, 0),
(191, 'Musculation - Sweat shirt - noir dos', '4122cb13c7a474c1976c9706ae36521d.png', 157, 0, 1),
(192, 'Musculation - Sweat shirt - noir face', '0200a91354cdcc7e7f803af641b0a56c.png', 157, 0, 0),
(193, 'Parkour - Sweat shirt - bleu dos', '8f19793b2671094e63a15ab883d50137.png', 158, 0, 1),
(194, 'Parkour - Sweat shirt - bleu face', 'cba0a4ee5ccd02fda0fe3f9a3e7b89fe.png', 158, 0, 0),
(195, 'Parkour - Sweat shirt - rouge dos', '04cd6b3a4a100219aef16baf900d804e.png', 158, 0, 1),
(196, 'Parkour - Sweat shirt - rouge face', 'd0bfcb426cd8154f5350db5a73e29b4d.png', 158, 0, 0),
(197, 'Rugby - Sweat shirt - bleu dos', '243098afe85a1d30b6e02a9e0574331f.png', 159, 0, 1),
(198, 'Rugby - Sweat shirt - bleu face', '9739efc4f01292e764c86caa59af353e.png', 159, 0, 0),
(199, 'Rugby - Sweat shirt - rouge dos', '8cfef17bee2b7a75a3ce09d40b497f6b.png', 159, 0, 1),
(200, 'Rugby - Sweat shirt - rouge face', '085d5d1e61effabc440d74ac51b91d87.png', 159, 0, 0),
(201, 'Snowboard - Sweat shirt - bleu dos', 'a22c0238589078fb10b606ab62015744.png', 160, 0, 1),
(202, 'Snowboard - Sweat shirt - bleu face', '110be03bce924f1eb65caf8491effba0.png', 160, 0, 0),
(203, 'Snowboard - Sweat shirt - rouge dos', '29a6aa8af3c942a277478a90aa4cae21.png', 160, 0, 1),
(204, 'Snowboard - Sweat shirt - rouge face', '2e99e68e7c01590f28bf0b64e645f856.png', 160, 0, 0),
(205, 'Batman - Sweat shirt - vert dos', '97888b75aa1e8aaac3923028d4466fea.png', 161, 0, 1),
(206, 'Batman - Sweat shirt - vert face', 'dc21a729b54e520379058cba22659b15.png', 161, 0, 0),
(207, 'Batman - Sweat shirt - rose dos', 'd96fd4caf8e622ab6c5ef52f5e4feff6.png', 161, 0, 1),
(208, 'Batman - Sweat shirt - rose face', '90dda4bebc7faaccb0a7a02b6db8478c.png', 161, 0, 0),
(209, 'Parfaite - Sweat shirt - rose dos', '8ebb270c06eb053c6d0b0bb201f0d739.png', 162, 0, 1),
(210, 'Parfaite - Sweat shirt - rose face', '9421c38d86e75f5851f5241770f86142.png', 162, 0, 0),
(211, 'Parfaite - Sweat shirt - vert dos', 'ad7ae181409d1089f4c6eed63d364081.png', 162, 0, 1),
(212, 'Parfaite - Sweat shirt - vert face', '5e491d66377606ec44c27564123ab511.png', 162, 0, 0),
(213, 'Bird - Sweat shirt - rose dos', 'd66a1a0b677b9f693c310e2fb2748a54.png', 163, 0, 1),
(214, 'Bird - Sweat shirt - rose face', 'e0b9fd6b0c3ecc593dc48a5f639d6b49.png', 163, 0, 0),
(215, 'Bird - Sweat shirt - vert dos', '4dbbafbb5365ffd94a1062267967535f.png', 163, 0, 1),
(216, 'Bird - Sweat shirt - vert face', '16837163fee34175358a47e0b51485ff.png', 163, 0, 0),
(217, 'Classic gaming - Sweat shirt - rose dos', '4d1167f353e66de571a72c70f36e6af7.png', 164, 0, 1),
(218, 'Classic gaming - Sweat shirt - rose face', 'd30960ce77e83d896503d43ba249caf7.png', 164, 0, 0),
(219, 'Classic gaming - Sweat shirt - vert dos', '8aec51422b30d61bce078b27f0babeb1.png', 164, 0, 1),
(220, 'Classic gaming - Sweat shirt - vert face', 'd7ea7a7dde348753a17428282d46081e.png', 164, 0, 0),
(221, 'Gymnastique - Sweat shirt - rose dos', '55d491cf951b1b920900684d71419282.png', 165, 0, 1),
(222, 'Gymnastique - Sweat shirt - rose face', '964bc1c4246b6a9d8afaa820e8fdc519.png', 165, 0, 0),
(223, 'Gymnastique - Sweat shirt - vert dos', '5b0d4c35f0631337b5286a02bfbae6a0.png', 165, 0, 1),
(224, 'Gymnastique - Sweat shirt - vert face', 'cd5099c73f75235d60ec0e90c4a092aa.png', 165, 0, 0),
(225, 'Lama - Sweat shirt - rose dos', 'b2e466c9d91e7a0be71ab741fc76c4a1.png', 166, 0, 1),
(226, 'Lama - Sweat shirt - rose face', '8daf77e334fd4230bec1dd51f47c8b77.png', 166, 0, 0),
(227, 'Lama - Sweat shirt - vert dos', '299fb2142d7de959380f91c01c3a293c.png', 166, 0, 1),
(228, 'Lama - Sweat shirt - vert face', 'e924517087669cf201ea91bd737a4ff4.png', 166, 0, 0),
(229, 'Paris - Sweat shirt - rose dos', '4607f7fff0dce694258e1c637512aa9d.png', 167, 0, 1),
(230, 'Paris - Sweat shirt - rose face', 'dfa037a53e121ecc9e0926800c3e814e.png', 167, 0, 0),
(231, 'Paris - Sweat shirt - vert dos', 'b64a70760bb75e3ecfd1ad86d8f10c88.png', 167, 0, 1),
(232, 'Paris - Sweat shirt - vert face', '1b12189170921fa4ac5414db98f542de.png', 167, 0, 0),
(233, 'Escrime - Sweat shirt - rose dos', 'bf65f07beaf1780ac1cf7dcf51cc8bfc.png', 168, 0, 1),
(234, 'Escrime - Sweat shirt - rose face', '2377f9eb902f3c5855aca19197689b14.png', 168, 0, 0),
(235, 'Escrime - Sweat shirt - vert dos', 'f7a124943b6aa6654d787f07eee84d2c.png', 168, 0, 1),
(236, 'Escrime - Sweat shirt - vert face', '2a51f806ae5d54633cd1a0ce91256a3c.png', 168, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `is_published` tinyint(1) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=170 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`id`, `title`, `price`, `is_published`, `image`, `created_at`) VALUES
(120, 'Avocat', '16', 1, 'eb17f3472e73f481d8e135c779c01858.png', '2018-04-02'),
(121, 'Baleine', '16', 1, 'a706b4d72de0eae9e9682f3ba03adfd7.png', '2018-04-02'),
(122, 'Bambi', '16', 1, '95cbccd215b174ddee376b6eb425975a.png', '2018-04-02'),
(123, 'Bird', '16', 1, '6af814698155afb9511dd5e91454834a.png', '2018-04-02'),
(124, 'Rolling Stones ', '16', 1, 'b94909c45ed96a5a5c25378254116b57.png', '2018-04-02'),
(125, 'Cats', '16', 1, '5e98d23afe19a774d1b2dcbefd5103eb.png', '2018-04-02'),
(126, 'Fée', '16', 1, '01600ecc17d3094eb9669cd6a4feb8a8.png', '2018-04-02'),
(127, 'Féminisme', '16', 1, 'fcba6537741bf200fd2d7e965afd9770.png', '2018-04-02'),
(128, 'Frite', '16', 1, '1458c6647dbf7cca56dff7bfe0576ebb.png', '2018-04-02'),
(129, 'Panda', '16', 1, 'd13f6aa1117f0a36d3478a998f9925b7.png', '2018-04-02'),
(130, 'Pizza', '16', 1, '7fad1aaeb2b1139a73241d05e5a68cbb.png', '2018-04-02'),
(119, 'Aqua licorne', '16', 1, '26337353b7962f533d78c762373b3318.png', '2018-04-02'),
(131, 'Princesse', '16', 1, 'e8d2fc41fb98705874a309ed648806a0.png', '2018-04-02'),
(132, 'Shopping', '16', 1, '4afe044911ed2c247005912512ace23b.png', '2018-04-02'),
(133, 'Vibes', '16', 1, 'a6640ad0aca7033809ffa7165c3040f9.png', '2018-04-02'),
(134, 'Wonder woman', '16', 1, '7d49c3e7fa0a529bbcd35b3c858e886e.png', '2018-04-02'),
(136, 'Batman', '16', 1, 'bbdba257f96ea1bfa6e0aa829c59984c.png', '2018-04-03'),
(137, 'Beard', '16', 1, '66b0cd925d80e64555a2babbb2ccddc2.png', '2018-04-03'),
(138, 'Born 80', '16', 1, 'e32c51ad39723ee92b285b362c916ca7.png', '2018-04-03'),
(139, 'Burger', '16', 1, '721e7285b298cde5b3d0c973ed8d7b63.png', '2018-04-03'),
(140, 'Cactus', '16', 1, '18fb150bb65a5825c83969a59f3febc1.png', '2018-04-03'),
(141, 'Chauve souris', '16', 1, '27dcfa6c9fb04dfa28b3e385698e3e5c.png', '2018-04-03'),
(142, 'Don\'t care', '16', 1, '4c3c33b9115db0a66cd40a5465974ed6.png', '2018-04-03'),
(143, 'Flash', '16', 1, '9bc804e36dfda950c21b6022e67863ef.png', '2018-04-03'),
(144, 'Keep calm zombie', '16', 1, 'c04c19c2c2474dbf5f7ac4372c5b9af1.png', '2018-04-03'),
(145, 'Ni dieu ni maître', '16', 1, '1730f69e6f66d5f0c741799e82351f81.png', '2018-04-03'),
(146, 'Pas 50 ans', '16', 1, '66a168785ed58b2b5955cea85954d669.png', '2018-04-03'),
(147, 'Rubiscube', '16', 1, '0b9dcc39ddecd3359566b59d3c9a6b9c.png', '2018-04-03'),
(148, 'Superman', '16', 1, '47b4f1bfdf6d298682e610ad74b37dca.png', '2018-04-03'),
(149, 'Two guns', '16', 1, 'd185c5ed37536ac0063f735f7a15dd24.png', '2018-04-03'),
(150, 'Vintage moto', '16', 1, '8de87e06e082806f690692c0ca47d3cc.png', '2018-04-03'),
(151, 'Wisky', '16', 1, '6ac37313e074d4fa4c73335747f35fa1.png', '2018-04-03'),
(153, 'Escalade', '25', 1, '2fefc978e8573441bb22120ecc62ac7d.png', '2018-04-05'),
(154, 'Force', '25', 1, 'a1a3170911eaa82c07fccbcbdf61f6bb.png', '2018-04-05'),
(155, 'Handball', '25', 1, '4a7d2be8648d00c3d1090ed4168a5748.png', '2018-04-05'),
(156, 'Magic', '25', 1, '53885282fbff8407b3b6e820b7830180.png', '2018-04-05'),
(157, 'Musculation', '25', 1, '0200a91354cdcc7e7f803af641b0a56c.png', '2018-04-05'),
(158, 'Parkour', '25', 1, 'cba0a4ee5ccd02fda0fe3f9a3e7b89fe.png', '2018-04-05'),
(159, 'Rugby', '25', 1, '085d5d1e61effabc440d74ac51b91d87.png', '2018-04-05'),
(160, 'Snowborad', '25', 1, '110be03bce924f1eb65caf8491effba0.png', '2018-04-05'),
(161, 'Batman', '25', 1, 'dc21a729b54e520379058cba22659b15.png', '2018-04-05'),
(162, 'Parfaite', '25', 1, '9421c38d86e75f5851f5241770f86142.png', '2018-04-05'),
(163, 'Bird', '25', 1, '16837163fee34175358a47e0b51485ff.png', '2018-04-05'),
(164, 'Classic gaming', '25', 1, 'd30960ce77e83d896503d43ba249caf7.png', '2018-04-05'),
(165, 'Gymnastique', '25', 1, 'cd5099c73f75235d60ec0e90c4a092aa.png', '2018-04-05'),
(166, 'Lama', '25', 1, 'e924517087669cf201ea91bd737a4ff4.png', '2018-04-05'),
(167, 'Paris', '25', 1, 'dfa037a53e121ecc9e0926800c3e814e.png', '2018-04-05'),
(168, 'Escrime', '25', 1, '2a51f806ae5d54633cd1a0ce91256a3c.png', '2018-04-05');

-- --------------------------------------------------------

--
-- Structure de la table `item_category`
--

DROP TABLE IF EXISTS `item_category`;
CREATE TABLE IF NOT EXISTS `item_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_kind_id` int(11) NOT NULL,
  `category_item_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `item_category`
--

INSERT INTO `item_category` (`id`, `item_id`, `category_kind_id`, `category_item_id`) VALUES
(39, 122, 2, 1),
(36, 120, 2, 1),
(37, 119, 2, 1),
(38, 121, 2, 1),
(40, 123, 2, 1),
(41, 124, 2, 1),
(42, 125, 2, 1),
(43, 126, 2, 1),
(45, 127, 2, 1),
(46, 128, 2, 1),
(47, 129, 2, 1),
(48, 130, 2, 1),
(49, 131, 2, 1),
(50, 132, 2, 1),
(51, 133, 2, 1),
(52, 134, 2, 1),
(54, 136, 1, 1),
(55, 137, 1, 1),
(56, 138, 1, 1),
(57, 139, 1, 1),
(58, 140, 1, 1),
(59, 141, 1, 1),
(60, 142, 1, 1),
(61, 143, 1, 1),
(62, 144, 1, 1),
(63, 145, 1, 1),
(64, 146, 1, 1),
(65, 147, 1, 1),
(66, 148, 1, 1),
(67, 149, 1, 1),
(68, 150, 1, 1),
(69, 151, 1, 1),
(71, 153, 1, 2),
(73, 154, 1, 2),
(74, 155, 1, 2),
(75, 156, 1, 2),
(76, 157, 1, 2),
(77, 158, 1, 2),
(78, 159, 1, 2),
(79, 160, 1, 2),
(80, 161, 2, 2),
(81, 162, 2, 2),
(82, 163, 2, 2),
(83, 164, 2, 2),
(84, 165, 2, 2),
(85, 166, 2, 2),
(86, 167, 2, 2),
(87, 168, 2, 2),
(88, 169, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `adress` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `is_admin`, `adress`) VALUES
(14, 'Original', 'Creation', 'admin@original.net', 'b53759f3ce692de7aff1b5779d3964da', 1, ''),
(15, 'Original', 'Creation', 'user@original.net', 'b53759f3ce692de7aff1b5779d3964da', 0, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
