DROP DATABASE IF EXISTS recyclage;
CREATE DATABASE recyclage;
USE recyclage;
DROP TABLE IF EXISTS Client;
CREATE TABLE Client ( 
    cli_num INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    cli_nom varchar(50) not null,
    cli_adresse varchar(50) not null,
    cli_tel varchar(30) not null);
DROP TABLE IF EXISTS Produit;
CREATE TABLE Produit ( 
    pro_num INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    pro_libelle varchar(50) not null,
    pro_description varchar(50) not null);
DROP TABLE IF EXISTS Commande;
CREATE TABLE Commande (
    com_num INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    cli_num INT NOT NULL,
    com_date datetime not null,
    com_obs varchar(50),
    FOREIGN KEY (cli_num) REFERENCES Client(cli_num));
DROP TABLE IF EXISTS est_compose;
CREATE TABLE est_compose (
    com_num INT NOT NULL UNIQUE,
    pro_num INT NOT NULL UNIQUE,
    est_qte INT NOT NULL,
    PRIMARY KEY (com_num, pro_num),
    FOREIGN KEY (com_num) REFERENCES Commande(com_num),
    FOREIGN KEY (pro_num) REFERENCES Produit(pro_num));
CREATE INDEX nom ON Client (cli_nom);