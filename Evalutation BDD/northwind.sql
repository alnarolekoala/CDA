DROP VIEW IF EXISTS pays_fourni;
CREATE VIEW pays_fourni
AS 
SELECT Country, suppliers.SupplierID, ProductID from suppliers
JOIN products on products.SupplierID = suppliers.SupplierID

GROUP BY ProductID;


DROP VIEW IF EXISTS pays_client;
CREATE VIEW pays_client
AS 
SELECT customers.CustomerID, Country from customers
join orders on orders.CustomerID = customers.CustomerID
join `order details` on `order details`.OrderID = orders.OrderID
GROUP BY customers.CustomerID;

DELIMITER |

CREATE TRIGGER pays after insert 
ON `order details` FOR EACH ROW 

BEGIN

DECLARE `num_command` INT;
DECLARE `num_produit` INT;
DECLARE `pays_produit` varchar (50);
DECLARE `pays_client` varchar (50);

SET `num_command` = new.orderID;

SELECT ProductID into `pays_produit`
FROM `order details`
WHERE orderID = `num_command`;


SELECT Country INTO `pays_produit`
FROM pays_fourni
WHERE ProductID = `num_produit`;


SET `pays_client` = (select Country
FROM customers 
JOIN orders on orders.CustomerID = customers.CustomerID
JOIN `order details` on `order details`.OrderID = orders.OrderID
WHERE OrderID = `num_command`);

IF `pays_client` <> `pays_produit` THEN 

SIGNAL SQLSTATE '28347' SET MESSAGE_TEXT = 'pays différent';

END IF; 
END |

DELIMITER ;