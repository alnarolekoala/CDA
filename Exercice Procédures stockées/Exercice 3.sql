SELECT DISTINCT YEAR(DERLIV) AS 'année', SUM(QTECDE * PRIUNI) AS 'CA potentiel', fournis.NUMFOU FROM `ligcom`
JOIN entcom ON `ligcom`.`NUMCOM` = entcom.NUMCOM
join fournis ON fournis.NUMFOU = entcom.NUMFOU
WHERE YEAR(DERLIV) = annee
GROUP BY fournis.NUMFOU

DELIMITER |
CREATE PROCEDURE CA_Fournisseur (
	In annee INT(10),
	In fournisseur varchar(50)
)
BEGIN
	SELECT DISTINCT YEAR(DERLIV), SUM(QTECDE*PRIUNI) AS 'CA potentiel', fournis.NUMFOU 
    FROM ligcom
	JOIN entcom ON ligcom.NUMCOM = entcom.NUMCOM
	JOIN fournis ON fournis.NUMFOU = entcom.NUMFOU
	WHERE YEAR(DERLIV) = annee AND fournis.NUMFOU = fournisseur
	GROUP BY NUMFOU;
END |
DELIMITER ;





