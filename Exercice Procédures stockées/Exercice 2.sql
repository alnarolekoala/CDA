

DELIMITER |



CREATE PROCEDURE Lst_Commandes (In ListCommand varchar(50))
BEGIN
	
	SELECT OBSCOM,NUMCOM 
    FROM entcom 
	WHERE OBSCOM = ListCommand;

END |

DELIMITER ;
