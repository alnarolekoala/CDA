CREATE TABLE Personne (
    per_num INT AUTO_INCREMENT PRIMARY KEY,
    per_nom varchar(50),
    per_prenom varchar(50),
    per_adresse varchar(50),
    per_ville varchar(50));

CREATE TABLE Groupe (
    gro_num INT AUTO_INCREMENT PRIMARY KEY,
    gro_libelle varchar(50));
    
    
CREATE TABLE Appartient (
    per_num INT,
    gro_num INT,
    PRIMARY KEY (per_num, gro_num),
    FOREIGN KEY (per_num) REFERENCES Personne(per_num),
    FOREIGN KEY (gro_num) REFERENCES Groupe(gro_num))