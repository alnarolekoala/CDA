CREATE TABLE Client(
   N_Client INT,
   NomClient VARCHAR(50) NOT NULL,
   PrenomClient VARCHAR(50) NOT NULL,
   PRIMARY KEY(N_Client)
);

CREATE TABLE Commande(
   N_Commande INT,
   DateCommande DATE NOT NULL,
   MontantCommande DECIMAL(11,2) NOT NULL,
   N_Client INT NOT NULL,
   PRIMARY KEY(N_Commande),
   FOREIGN KEY(N_Client) REFERENCES Client(N_Client)
);

CREATE TABLE Article(
   N_Article INT,
   DesignationArticle VARCHAR(50),
   PUArticle DECIMAL(11,2) NOT NULL,
   PRIMARY KEY(N_Article)
);

CREATE TABLE SeComposeDe(
   N_Commande INT,
   N_Article INT,
   Qte INT NOT NULL,
   TauxTva DECIMAL(2,2) NOT NULL,
   PRIMARY KEY(N_Commande, N_Article),
   FOREIGN KEY(N_Commande) REFERENCES Commande(N_Commande),
   FOREIGN KEY(N_Article) REFERENCES Article(N_Article)
);
