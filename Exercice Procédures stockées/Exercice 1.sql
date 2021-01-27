DELIMITER |

CREATE PROCEDURE Lst_fournis (In NUMFOU varchar(25))
BEGIN
	SELECT distinct NUMFOU from entcom where numcom IS NOT null
END |

DELIMITER ;