CREATE TABLE Station ( 
    num_station INT AUTO_INCREMENT PRIMARY key,
    nom_station varchar(50));
CREATE TABLE Hotel (
    capacite_hotel INT,
    categorie_hotel INT,
    nom_hotel varchar(50),
    adresse_hotel varchar(50),
    num_hotel INT AUTO_INCREMENT PRIMARY KEY,
    num_station INT,
    FOREIGN KEY (num_station) REFERENCES Station(num_station));
CREATE TABLE Chambre (
    capacite_chambre INT,
    degre_chambre INT,
    exposition_chambre varchar(10),
    type_chambre INT,
    num_chambre INT AUTO_INCREMENT PRIMARY KEY,
    num_hotel INT,
    FOREIGN KEY (num_hotel) REFERENCES Hotel(num_hotel));
CREATE TABLE Client ( 
    adresse_client varchar(50),
    nom_client varchar(50),
    prenom_client varchar (50),
    num_client INT AUTO_INCREMENT PRIMARY KEY);
CREATE TABLE Reservation ( 
    num_chambre INT,
    num_client INT,
    date_debut DATE,
    date_fin DATE,
    date_reservation DATE,
    montant_arrhes decimal(10,2),
    prix_total decimal(10,2))