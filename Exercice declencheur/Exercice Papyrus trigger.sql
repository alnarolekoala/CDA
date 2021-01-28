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

SELECT COUNT(*) INTO `verif`
FROM articles_a_commander 
WHERE CODART = `code`;

SELECT STKALE INTO `stock_alerte`
from produit
where CODART = `code`
GROUP BY `code`;

SELECT `stock_phy` INTO `stock_physique`
from produit
where CODART = `code`
GROUP BY `code`;

SELECT QTE into `already_done`
from articles_a_commander
where CODART = `code`
GROUP BY `code`;

IF `already_done` = NULL THEN
SET `already_done` = 0; 
END IF;


IF `stock_physique` <= `stock_alerte` THEN
SELECT sum(`stock_alerte` - `stock_physique` - `already_done`) INTO `nombre_command`;

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