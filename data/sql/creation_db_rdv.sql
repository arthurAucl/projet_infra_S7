DROP DATABASE IF EXISTS RDV_DATABASE;
CREATE DATABASE RDV_DATABASE;

USE RDV_DATABASE;

CREATE TABLE IF NOT EXISTS Salle (
id INT NOT NULL AUTO_INCREMENT,
nomDeLaSalle VARCHAR(64) NOT NULL,
batiment ENUM('A', 'B','C') NOT NULL,
numero SMALLINT NOT NULL,
disponible BOOLEAN NOT NULL,
PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS Utilisateurs (
id INT NOT NULL AUTO_INCREMENT,
id_user VARCHAR(64) NOT NULL,
nom VARCHAR(64) NOT NULL,
prenom VARCHAR(64) NOT NULL,
email VARCHAR(64) NOT NULL,
motDePasse VARCHAR(64) NOT NULL,
etat ENUM('Etudiant', 'Professeur'),
PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS Materiels (
id INT NOT NULL AUTO_INCREMENT,
nomDuMateriel VARCHAR(64) NOT NULL,
description_materiel VARCHAR(255) NOT NULL,
qualiteAvantLePret ENUM ('Neuf', 'Bonne qualité', 'Mauvaise qualité', 'Inutilisable') NOT NULL,
qualiteApresLePret ENUM ('Neuf', 'Bonne qualité', 'Mauvaise qualité', 'Inutilisable') NOT NULL,
prix REAL NOT NULL,
dateAttribution DATE NOT NULL,
dateRestitution DATE NOT NULL,
PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS RDV (
id INT NOT NULL AUTO_INCREMENT,
id_rdv VARCHAR(64) NOT NULL,
description_rdv VARCHAR(255) NOT NULL,
salle_id INT NOT NULL,
utilisateurDemande_id INT NOT NULL,
utilisateurSollicite_id INT NOT NULL,
dateEtHeure DATETIME NOT NULL,
duree REAL NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (salle_id) REFERENCES Salle(id),
FOREIGN KEY (utilisateurDemande_id) REFERENCES Utilisateurs(id),
    FOREIGN KEY (utilisateurSollicite_id) REFERENCES Utilisateurs(id)
);

INSERT INTO Salle (nomDeLaSalle, batiment, numero, disponible) VALUES
('Monge', 'C', 108, TRUE),
('Tesla', 'A', 317, TRUE),
('Bode', 'A', 5, FALSE),
('Newton', 'B', 314, TRUE);

INSERT INTO Utilisateurs (id_user, nom, prenom, email, motDePasse, etat) VALUES
('Bahloulis', 'Bahloul', 'Ismail', 'ismail.bahloul@reseau.eseo.fr', 'network', 'Etudiant'),
('Mignotsi', 'Mignot', 'Sixtine', 'sixtine.mignot@reseau.eseo.fr', 'network', 'Etudiant'),
('Lhommedetco', 'Lhommedet', 'Constance', 'constance.lhommedet@reseau.eseo.fr', 'network', 'Etudiant'),
('Adamczuket', 'Adamczuk', 'Etienne', 'etienne.adamczuk@reseau.eseo.fr', 'network', 'Etudiant'),
('Baffouau', 'Baffou', 'Augustin', 'augustin.baffou@reseau.eseo.fr', 'network', 'Etudiant'),
('Beaudouxol', 'Beaudoux', 'Olivier', 'olivier.beaudoux@eseo.fr', 'network', 'Professeur'),
('Campol', 'Camp', 'Olivier', 'olivier.camp@eseo.fr', 'network', 'Professeur'),
('Chhelfa', 'Chhel', 'Fabien', 'fabien.chhel@eseo.fr', 'network', 'Professeur'),
('Jametfr', 'Jamet', 'François', 'françois.jamet@eseo.fr', 'network', 'Professeur'),
('Rousseauso', 'Rousseau', 'Sophie', 'sophie.rousseau@eseo.fr', 'network', 'Professeur'),
('Chavinje', 'Chavin', 'Jerome', 'jerome.chavin@eseo.fr', 'network', 'Professeur');

INSERT INTO Materiels (nomDuMateriel, description_materiel, qualiteAvantLePret, qualiteApresLePret, prix, dateAttribution, dateRestitution) VALUES
('cable HDMI', 'Ceci est un câble HDMI', 'Bonne qualité', 'Bonne qualité', 20.23, '2023-01-17', '2023-01-17');

INSERT INTO RDV (id_rdv, description_rdv, salle_id, utilisateurDemande_id, utilisateurSollicite_id, dateEtHeure, duree) VALUES
('4', 'Besoin de te voir pour la correction', (SELECT id FROM Salle WHERE nomDeLaSalle ='Monge'), (SELECT id FROM Utilisateurs WHERE id_user='Bahloulis'), (SELECT id FROM Utilisateurs WHERE id_user='Chavinje'), '2023-01-17 15:25:00', 10);