DROP TABLE IF EXISTS comptes, musiques;


CREATE TABLE `comptes` (
    `id` int(15) NOT NULL,
    `login` varchar (255) NOT NULL,
    `hash` varchar (255) NOT NULL,
    `nom` varchar (255) NOT NULL,
    `statut` varchar (20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `comptes` VALUES (1, 'vanier', '$2y$10$izOosLngwH/2XywAb7nHf.F7GXAQAE.oOjhUcE9rblBhcPZHvm89O', 'Vanier', 'admin'),
(2, 'lecarpentier', '$2y$10$izOosLngwH/2XywAb7nHf.F7GXAQAE.oOjhUcE9rblBhcPZHvm89O', 'Lecarpentier', 'admin');


CREATE TABLE `musiques` (
                            `id` int(11) NOT NULL,
                            `titre` varchar(255) DEFAULT NULL,
                            `auteur` varchar(255) DEFAULT NULL,
                            `dateSortie` date DEFAULT NULL,
                            `jaquette` varchar(255) DEFAULT NULL,
                            `label` varchar(255) DEFAULT NULL,
                            `lien` varchar(255) DEFAULT NULL,
                            `genre` varchar(255) DEFAULT NULL,
                            `proprietaire` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;