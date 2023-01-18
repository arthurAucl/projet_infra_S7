DROP DATABASE IF EXISTS RDV_DATABASE;
CREATE DATABASE RDV_DATABASE;

USE RDV_DATABASE;

CREATE TABLE IF NOT EXISTS materiels (
    id INTEGER NOT NULL AUTO_INCREMENT,
    nomdumateriel VARCHAR(255) NOT NULL,
    photo VARCHAR(255) NOT NULL,
    prix REAL NOT NULL,
    qualite ENUM ('NEUF', 'BONNE_QUALITE', 'MAUVAISE_QUALITE', 'INUTILISABLE') NOT NULL,    
    PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS salle (
    id INTEGER NOT NULL AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    batiment ENUM('A', 'B','C','D') NOT NULL,
    numero INT NOT NULL,
    PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS utilisateurs (
    id INTEGER NOT NULL AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    motdepasse VARCHAR(255) NOT NULL,
    etat ENUM('ETUDIANT', 'PROFESSEUR', 'ADMINISTRATEUR', 'PROFESSEUR_ADMINISTRATEUR'),
    PRIMARY KEY (id)
)ENGINE=InnoDB;



CREATE TABLE IF NOT EXISTS rdv (
    id INTEGER NOT NULL AUTO_INCREMENT,
    date DATETIME NOT NULL,
    duree REAL NOT NULL,
    description VARCHAR(255) NOT NULL,
    etat ENUM ('ACCEPTE', 'REFUSE'),
    salle INTEGER NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (salle) REFERENCES salle(id)
)ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS acours(
    utilisateurs INTEGER NOT NULL,
    rdv INTEGER NOT NULL, 
    PRIMARY KEY (utilisateurs, rdv), 
    FOREIGN KEY (utilisateurs) REFERENCES utilisateurs(id),
    FOREIGN KEY (rdv) REFERENCES rdv(id)
)ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS emprunt(
    id INTEGER NOT NULL AUTO_INCREMENT,
    dateattribution DATETIME NOT NULL, 
    daterestitution DATETIME NOT NULL, 
    utilisateurs INTEGER NOT NULL,
    materiels INTEGER NOT NULL, 
    PRIMARY KEY(id), 
    FOREIGN KEY(utilisateurs) REFERENCES utilisateurs(id), 
    FOREIGN KEY(materiels) REFERENCES materiels(id)
)ENGINE=InnoDB;

INSERT INTO salle (nom, batiment, numero) VALUES
('Monge', 'A', 555),
('Tesla', 'A', 555),
('Bode', 'A', 5),
('Newton', 'A', 555);

INSERT INTO utilisateurs (nom, prenom, email, motdepasse, etat) VALUES
( 'Bahloul', 'Ismail', 'ismail.bahloul@reseau.eseo.fr', 'network', 'ETUDIANT'),
( 'Rousseau', 'Sophie', 'sophie.rousseau@reseau.eseo.fr', 'network', 'PROFESSEUR_ADMINISTRATEUR'),
( 'Chavin', 'Jerome', 'jerome.chavin@eseo.fr', 'network','PROFESSEUR');

INSERT INTO materiels (nomdumateriel, photo, prix, qualite)  VALUES
('cable HDMI', 'HDMI', 20.23,'BONNE QUALITE');

INSERT INTO emprunt (utilisateurs, materiels, dateattribution, daterestitution) VALUES
(1,1,'2023-01-17', '2023-01-17');

INSERT INTO rdv (date, duree, description, etat, salle) VALUES
('2023-01-17', 20,'Besoin de te voir pour la correction', 'ACCEPTE', 1);

INSERT INTO acours (utilisateurs, rdv) VALUES
(1,1);