DROP DATABASE IF EXISTS RDV_DATABASE;
CREATE DATABASE RDV_DATABASE;

USE RDV_DATABASE;

CREATE TABLE IF NOT EXISTS materiels (
    id INTEGER NOT NULL AUTO_INCREMENT,
    nomDuMateriel VARCHAR(255) NOT NULL,
    photo VARCHAR(255) NOT NULL,
    prix REAL NOT NULL,
    qualite ENUM ('NEUF', 'BONNE QUALITE', 'MAUVAISE QUALITE', 'INUTILISABLE') NOT NULL,    
    disponible BOOLEAN NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS salle (
    id INTEGER NOT NULL AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    batiment ENUM('A', 'B','C','D') NOT NULL,
    numero INT NOT NULL,
    disponible BOOLEAN NOT NULL,
    PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS utilisateurs (
    id INTEGER NOT NULL AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    motDePasse VARCHAR(255) NOT NULL,
    etat ENUM('ETUDIANT', 'PROFESSEUR', 'PROFESSEUR-ADMINISTRATEUR'),
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
    dateAttribution DATETIME NOT NULL, 
    dateRestitution DATETIME NOT NULL, 
    utilisateurs INTEGER NOT NULL,
    materiels INTEGER NOT NULL, 
    PRIMARY KEY(utilisateurs, materiels), 
    FOREIGN KEY(utilisateurs) REFERENCES utilisateurs(id), 
    FOREIGN KEY(materiels) REFERENCES materiels(id)
)ENGINE=InnoDB;

INSERT INTO salle (nom, batiment, numero, disponible) VALUES
('Monge', 'A', 555, TRUE),
('Tesla', 'A', 555, TRUE),
('Bode', 'A', 5, FALSE),
('Newton', 'A', 555, TRUE);

INSERT INTO utilisateurs (nom, prenom, email, motDePasse, etat) VALUES
( 'Bahloul', 'Ismail', 'ismail.bahloul@reseau.eseo.fr', 'network', 'ETUDIANT'),
( 'Rousseau', 'Sophie', 'sophie.rousseau@reseau.eseo.fr', 'network', 'PROFESSEUR-ADMINISTRATEUR'),
( 'Chavin', 'Jerome', 'jerome.chavin@eseo.fr', 'network','PROFESSEUR');

INSERT INTO materiels (nomDuMateriel, photo, prix, qualite,disponible)  VALUES
('cable HDMI', 'HDMI', 20.23,'BONNE QUALITE', TRUE);

INSERT INTO emprunt (utilisateurs, materiels, dateAttribution, dateRestitution) VALUES
(1,1,'2023-01-17', '2023-01-17');

INSERT INTO rdv (date, duree, description, etat, salle) VALUES
('2023-01-17', 20,'Besoin de te voir pour la correction', 'ACCEPTE', 1);

INSERT INTO acours (utilisateurs, rdv) VALUES
(1,1);