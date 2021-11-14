-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: mysql.info.unicaen.fr    Database: niveau_dev
-- ------------------------------------------------------
-- Server version	5.5.47-0+deb7u1-log

DROP TABLE IF EXISTS `musiques`;
CREATE TABLE `musiques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  `auteur` varchar(255) DEFAULT NULL,
  `dateSortie` DATE DEFAULT NULL,
  `jacquette` varchar(255) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `lien` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `musiques` WRITE;

INSERT INTO `musiques`(`titre`, `auteur`, `dateSortie`, `jacquette`, `label`, `lien`, `genre`) VALUES
('Homiris', 'WX', '2021-09-26', NULL, '', 'soundcloud.com/wx_psy/homiris', 'Trance progressive'),
('Deep', 'WX', '2020-09-20', NULL, '', 'soundcloud.com/wx_psy/deep', 'Psytrance progressive');

UNLOCK TABLES;
