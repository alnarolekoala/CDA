DROP VIEW IF EXISTS v_GlobalCde;
CREATE VIEW v_GlobalCde
AS
select distinct CODART, SUM(QTECDE) AS 'quantités commandées', PRIUNI, (SUM(QTECDE)*PRIUNI) AS 'PrixTot' 
from ligcom 
GROUP BY CODART;



DROP VIEW IF EXISTS v_VentesI100;
CREATE VIEW v_VentesI100
AS
SELECT * FROM vente 
where CODART LIKE '%I100%';


DROP VIEW IF EXISTS v_VentesI100Grobrigan;
CREATE VIEW v_VentesI100Grobrigan
AS
SELECT * FROM `v_ventesi100`
where NUMFOU = 120