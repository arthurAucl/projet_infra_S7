DROP DATABASE IF EXISTS RDV_DATABASE;
CREATE DATABASE RDV_DATABASE;

USE RDV_DATABASE;

CREATE USER 'rdvuser'@'192.168.56.80' IDENTIFIED BY 'network';

GRANT ALL PRIVILEGES ON visionote.* TO rdvuser@'192.168.56.80';

CREATE DATABASE IF NOT EXISTS 'phpmyadmin'
  DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

CREATE TABLE IF NOT EXISTS 'Salle' (
    'nomDeLaSalle' varchar(64) NOT NULL,
    'batiment' enum('A', 'B') NOT NULL,
    'numero' smallint NOT NULL,
    'disponible' boolean NOT NULL,
    PRIMARY KEY ('nomDeLaSalle')
)

CREATE TABLE IF NOT EXISTS 'Utilisateurs' ( 
    'id' varchar(64) NOT NULL,
    'nom' varchar(64) NOT NULL,
    'prenom' varchar(64) NOT NULL,
    'email' varchar(64) NOT NULL,
    'motDePasse' varchar(64) NOT NULL,
    'etat' ENUM('Etudiant', 'Professeur')
)

CREATE TYPE qualite AS ENUM ('Neuf','Bonne qualité','Mauvaise qualité', 'Inutilisable');

CREATE TABLE IF NOT EXISTS 'Materiels' (
    'nomDuMateriel' varchar(64) NOT NULL,
    'description' varchar(64) NOT NULL,
    'photo' varchar(64) NOT NULL,
    'qualiteAvantLePret' qualite,
    'qualiteApresLePret' qualite,
    'prix' REAL NOT NULL,
    'dateAttribution' DATE_FORMAT NOT NULL,
    'dateRestitution' DATE_FORMAT NOT NULL,
)

CREATE TABLE IF NOT EXISTS 'RDV' (
    'id' varchar(64) NOT NULL,
    'description' varchar(64) NOT NULL,
    'salle' Salle NOT NULL,
    'utilisateurDemande' Utilisateurs NOT NULL,
    'utilisateurSollicite' Utilisateurs NOT NULL,
    'dateEtHeure' DATETIME NOT NULL,
    'duree' REAL NOT NULL,
)


INSERT INTO Salle VALUES ('Monge', 'A', 555, 1),
INSERT INTO Salle VALUES ('Tesla', 'A', 555, 1),
INSERT INTO Salle VALUES ('Bode', 'A', 5, 0),
INSERT INTO Salle VALUES ('Newton', 'A', 555, 1),

INSERT INTO Utilisateurs VALUES ('Isma', 'Bahloul', 'Ismail', 'ismail.bahloul@reseau.eseo.fr', 'network', 'Etudiant'),
INSERT INTO Utilisateurs VALUES ('Chavinje', 'Chavin', 'Jerome', 'jerome.chavin@eseo.fr', 'network', 'Professeur'),

INSERT INTO Materiels VALUES ('cable HDMI', 'Ceci est un câble HDMI', '', 'Bonne qualité', 'Bonne qualité', '2023-01-17', '2023-01-17'),

INSERT INTO RDV VALUES ('4', 'Besoin de te voir pour la correction', SELECT, 'Isma', 'Chavinje', '2023-01-17 15H25', '10'),


