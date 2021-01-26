DROP DATABASE IF EXISTS papyrus;
CREATE DATABASE papyrus;
USE papyrus;


DROP TABLE IF EXISTS produit;
CREATE TABLE produit (
    CODART char(4) not null PRIMARY KEY,
    LIBART varchar(30) not null,
    STKALE INT(10) not null,
    STKPHY INT(10) not null,
    QTEANN INT(10) not null,
    UNIMES char(5) not null);
DROP TABLE IF EXISTS fournis;
CREATE TABLE fournis ( 
    NUMFOU varchar(25) not null PRIMARY KEY,
    NOMFOU varchar(25) not null,
    RUEFOU varchar(50) not null,
    POSFOU char(5) not null,
    VILFOU varchar(30) not null,
    CONFOU varchar(15) not null,
    SATISF TINYINT(3));
DROP TABLE IF EXISTS vente;
CREATE TABLE vente ( 
    DELLIV SMALLINT(5) not null,
    QTE1	INT(10) not null,
    PRIX1	varchar(50) not null,
    QTE2	INT(10),
    PRIX2	varchar(50),
    QTE3	INT(10),
    PRIX3 	varchar(50),
    NUMFOU varchar(25) not null,
    CODART char(4) not null,
    PRIMARY KEY (NUMFOU, CODART),
    FOREIGN KEY (NUMFOU) REFERENCES fournis(NUMFOU),
    FOREIGN KEY (CODART) REFERENCES produit(CODART));
DROP TABLE IF EXISTS entcom;
CREATE TABLE entcom ( 
    NUMCOM INT(10) PRIMARY KEY,
    OBSCOM varchar(50),
    DATCOM datetime DEFAULT CURRENT_TIMESTAMP,
    NUMFOU varchar(25),
    FOREIGN KEY (NUMFOU) REFERENCES fournis(NUMFOU));
DROP TABLE IF EXISTS ligcom;
CREATE TABLE ligcom (
    NUMLIG TINYINT(3) not null,
    QTECDE INT(10) not null,
    PRIUNI varchar(50) not null,
    QTELIV int(10),
    DERLIV datetime,
    NUMCOM INT(10) not null,
    CODART char(4) not null,
    PRIMARY KEY (CODART, NUMCOM),
    FOREIGN KEY (NUMCOM) REFERENCES entcom(NUMCOM),
    FOREIGN KEY (CODART) REFERENCES produit(CODART));
CREATE INDEX `fk` ON `entcom` (`NUMFOU`);
