produit
fournis
entcom
vente 
ligcom

C:\Users\Pc\Desktop\vente.csv


USE papyrus;
LOAD DATA LOCAL INFILE 'C:\\Users\\Pc\Desktop\vente.csv'
INTO TABLE vente
FIELDS TERMINATED BY ';' 
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES
(NUMFOU,CODART,DELLIV,QTE1,PRIX1,QTE2,PRIX2,QTE3,PRIX3
);




Use papyrus;

INSERT INTO `produit` (`CODART`, `LIBART`, `STKALE`, `STKPHY`, `QTEANN`, `UNIMES`) 
VALUES
	('B001', 'Bande magnétique 1200', 20, 87, 240, 'unité'),
	('B002', 'Bande magnétique 6250', 20, 12, 410, 'unite'),
	('D035', 'CD R slim 80 mm', 40, 42, 150, 'B010'),
	('D050', 'CD R-W 80mm', 50, 4, 0, 'B010'),
	('I100', 'Papier 1 ex continu', 100, 557, 3500, 'B1000'),
	('I105', 'Papier 2 ex continu', 75, 5, 2300, 'B1000'),
	('I108', 'Papier 3 ex continu', 200, 557, 3500, 'B500'),
	('I110', 'Papier 4 ex continu', 10, 12, 63, 'B400'),
	('P220', 'Pré-imprimé commande', 500, 2500, 24500, 'B500'),
	('P230', 'Pré-imprimé facture', 500, 250, 12500, 'B500'),
	('P240', 'Pré-imprimé bulletin paie', 500, 3000, 6250, 'B500'),
	('P250', 'Pré-imprimé bon livraison', 500, 2500, 24500, 'B500'),
	('P270', 'Pré-imprimé bon fabrication', 500, 2500, 24500, 'B500'),
	('R080', 'ruban Epson 850', 10, 2, 120, 'unite'),
	('R132', 'ruban impl 1200 lignes', 25, 200, 182, 'unite');
INSERT INTO fournis
VALUES 
		(120, "GROBRIGAN","20, rue du papier",92200,"papercity","Georges",08),
		(540, "ECLIPSE", "53, rue laisse flotter les rubans", 78250, "Bugbugville","Nestor",07),
        (8700,"MEDICIS","120, rue des plantes",75014,"Paris","Lison",DEFAULT),
        (9120,"DISCOBOL","11, rue des sports",85100,"La Roche sur Yon","Hercule",08),
        (9150,"DEPANPAP","26, avenue des locomotives",59987,"Coroncountry","Pollux",05),
        (9180,"HURRYTAPE","68, boulevard des octets",04044,"Dumpville","Track", DEFAULT);

INSERT INTO entcom 
VALUES 
		(70010,DEFAULT,"2007-10-02",120),
        (70011,"Commande urgente","2007-03-01",540),
        (70020,DEFAULT,"2007-04-2007",9180),
        (70025,"Commande urgente","2007-04-30",9150),
        (70210,"Commande cadencée","2007-05-05",120),
        (70300,DEFAULT,"2007-06-06",120),
        (70250,"Commande cadencée","2007-10-02",8700),
        (70620,DEFAULT,"2007-10-02",540),
        (70625,DEFAULT,"2007-10-09",120),
        (70629,DEFAULT,"2007-10-12",120);

ALTER TABLE `vente` CHANGE `NUMFOU` `NUMFOU` VARCHAR(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL FIRST, CHANGE `CODART` `CODART` CHAR(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL AFTER `NUMFOU`;

INSERT INTO vente
VALUES 
		(8700,"B001",15,0,150,50,145,100,140),
        (8700,"B002",15,0,210,50,200,100,185),
        (120,"D035",0,0,40,0,0,0,DEFAULT),
        (9120,"D035",5,0,40,100,30,0,DEFAULT),
        (120,"I100",90,0,700,50,600,120,500),
        (540,"I100",70,0,710,60,630,100,600),
        (9120,"I100",60,0,800,70,600,90,500),
        (9150,"I100",90,0,650,90,600,200,590),
        (9180,"I100",30,0,720,50,670,100,490),
        (120,"I105",90,10,705,50,630,120,500),
        (540,"I105",70,0,810,60,645,100,600),
        (8700,"I105",30,0,720,50,670,100,510),
        (9120,"I105",60,0,920,70,800,90,700),
        (9150,"I105",90,0,685,90,600,200,590),
        (120,"I108",90,5,795,30,720,100,680),
        (9120,"I108",60,0,920,70,820,100,780),
        (9120,"I110",60,0,950,70,850,90,790),
        (9180,"I110",90,0,900,70,870,90,835),
        (120,"P220",15,0,3700,100,3500,0,0),
        (8700,"P220",20,50,3500,100,3350,0,0),
        (120,"P230",30,0,5200,100,5000,0,0),
        (8700,"P230",60,0,5000,50,4900,0,0),
        (120,"P240",15,0,2200,100,2000,0,0),
        (120,"P250",30,0,1500,100,1400,500,1200),
        (9120,"P250",30,0,1500,100,1400,500,1200),
        (9120,"R080",10,0,120,100,100,0,0),
        (9120,"R132",5,0,275,0,0,0,0);

INSERT INTO ligcom (NUMCOM,CODART,NUMLIG,QTECDE,PRIUNI,QTELIV,DERLIV)
VALUES 
		(70010,"I100",01,3000,470,3000,"2007-03-15"),
        (70010,"I105",02,2000,485,2000,"2007-07-05"),
        (70010,"I108",03,1000,680,1000,"2007-08-20"),
        (70010,"D035",04,200,40,250,"2007-02-20"),
        (70010,"P220",05,6000,3500,6000,"2007-31-03"),
        (70010,"P240",06,6000,2000,6000,"2007-31-03"),
        (70011,"I105",01,1000,590,1000,"2007-05-15"),
        (70020,"B001",01,200,140,DEFAULT,"2007-12-31"),
        (70020,"B002",02,200,140,DEFAULT,"2007-12-31"),
        (70025,"I100",01,1000,590,1000,"2007-05-15"),
        (70025,"I105",02,500,590,500,"2007-05-15"),
        (70210,"I100",01,1000,470,1000,"2007-05-15"),
        (70010,"P230",02,10000,3500,10000,"2007-08-31"),
        (70300,"I110",01,50,790,50,"2007-10-31"),
        (70250,"P230",01,15000,4900,12000,"2007-12-15"),
        (70250,"P220",02,10000,3350,10000,"2007-11-10"),
        (70620,"I105",01,200,600,200,"2007-11-01"),
        (70625,"I100",01,1000,470,1000,"2007-10-15"),
        (70625,"P220",02,10000,3500,10000,"2007-10-31"),
        (70629,"B001",01,200,140,DEFAULT,"2007-12-31"),
        (70629,"B002",02,200,140,DEFAULT,"2007-12-31");





