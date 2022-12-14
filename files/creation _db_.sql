CREATE DATABASE IF NOT EXISTS 'phpmyadmin'
  DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

CREATE TABLE IF NOT EXISTS 'Salle' (
    'nomDeLaSalle' varchar(64) NOT NULL,
    'batiment' enum('A', 'B') NOT NULL,
    'numero' smallint NOT NULL,
    'disponible' boolean NOT NULL,
    PRIMARY KEY ('nomDeLaSalle','batiment','numero','disponible')
)

CREATE TABLE IF NOT EXISTS 'Utilisateurs' ( 
    'id' varchar(64) NOT NULL,
    'nom' varchar(64) NOT NULL,
    'prenom' varchar(64) NOT NULL,
    'email' varchar(64) NOT NULL,
    'motDePasse' varchar(64) NOT NULL,
    'etat' ENUM('Etudiant', 'Professeur')
)

CREATE TYPE qualite AS ENUM ('Neuf','Bonne qualitée','Mauvaise qualitée', 'Inutilisable');

CREATE TABLE IF NOT EXISTS 'Materiels' (
    'nomDuMateriel' varchar(64) NOT NULL,
    'description' varchar(64) NOT NULL,
    'photo' varchar(64) NOT NULL,
    'qualiteAvecLePret' qualite,
    'qualiteApresLePret' qualite,
    'prix' REAL NOT NULL,
    'dateAttribution' DATE NOT NULL,
    'dateRestitution' DATE NOT NULL,
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