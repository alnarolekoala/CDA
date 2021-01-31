CREATE TABLE ARTICLES_A_COMMANDER (
    CODART char(4),
    DATE datetime DEFAULT CURRENT_TIMESTAMP,
    QTE INT,
    PRIMARY KEY (CODART),
    FOREIGN KEY (CODART) REFERENCES produit(CODART));





DELIMITER |
CREATE TRIGGER commande AFTER UPDATE
ON produit FOR EACH ROW
BEGIN
DECLARE `verif` INT;
DECLARE `stock_alerte` INT;
DECLARE `stock_physique` INT;
DECLARE `already_done` INT; #nombre deja commander
DECLARE `nombre_command` INT; #nombre a commander
DECLARE `stock_phy` INT;
DECLARE `code` CHAR(4);
SET `code` = NEW.CODART;
SET `stock_phy` = NEW.STKPHY;

SET `verif` = (SELECT COUNT(*) 
FROM articles_a_commander 
WHERE CODART = `code`);

SET `stock_alerte` = (SELECT STKALE
from produit
where CODART = `code`
GROUP BY `code`);

SET `stock_physique` = (SELECT `stock_phy` 
from produit
where CODART = `code`
GROUP BY `code`);




IF `verif` < 1 THEN
SET `already_done` = 0; 
ELSE 
SET `already_done` = (SELECT QTE
from articles_a_commander
where CODART = `code`
GROUP BY `code`);
END IF;


IF `stock_physique` <= `stock_alerte` THEN
SET `nombre_command` = (SELECT sum(`stock_alerte` - `stock_physique`  -  `already_done`));

IF `verif` < 1 THEN

INSERT INTO articles_a_commander 
VALUES (`code`, default, `nombre_command`);
ELSE 
UPDATE articles_a_commander SET QTE = `nombre_command`
WHERE CODART = `code`;
END IF;
END IF;
END |

DELIMITER ;