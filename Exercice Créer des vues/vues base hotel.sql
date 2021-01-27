

DROP VIEW IF EXISTS v_sta_hot_nom;
CREATE VIEW v_sta_hot_nom
AS
SELECT hot_nom AS `nom de l'hotel`, sta_nom as 'nom de la station' 
FROM hotel JOIN station 
on station.sta_id = hotel.hot_sta_id;

DROP VIEW IF EXISTS v_cha_hot_nom;
CREATE VIEW v_cha_hot_nom
AS
SELECT hot_nom AS `nom de l'hotel`,cha_numero AS 'numero de chambre' 
FROM hotel 
join chambre on chambre.cha_hot_id = hotel.hot_id;

DROP VIEW IF EXISTS v_res_cha_id;
CREATE VIEW v_res_cha_id 
AS
SELECT cha_numero AS 'numero de chambre', res_id AS 'numero de reservation'
FROM chambre
JOIN reservation on reservation.res_cha_id = chambre.cha_id;

DROP VIEW IF EXISTS v_cha_hot_sta;
CREATE VIEW v_cha_hot_sta
AS
SELECT cha_numero AS 'numero de chambre', hot_nom AS `nom de l'hotel`, sta_nom AS `nom de la station`
FROM chambre
JOIN hotel ON hotel.hot_id = chambre.cha_hot_id 
JOIN station ON station.sta_id = hotel.hot_sta_id;

DROP VIEW IF EXISTS v_res_cha_hot;
CREATE VIEW v_res_cha_hot
AS
SELECT res_id AS `numero de reservation`, cli_nom AS 'nom du client', hot_nom AS `nom de l'hotel`
from client 
JOIN reservation ON reservation.res_cli_id = client.cli_id
JOIN chambre ON chambre.cha_id = reservation.res_cha_id
JOIN hotel ON hotel.hot_id = chambre.cha_hot_id;




