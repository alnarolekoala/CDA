########### Requête#1 
SELECT CompanyName AS 'Société', ContactName AS 'contact', ContactTitle AS 'Fonction', Phone AS 'Téléphone' FROM customers
WHERE Country = 'France'


########## Requête#2
SELECT ProductName AS 'Produit', UnitPrice AS 'Prix' FROM products
JOIN suppliers ON products.SupplierID = suppliers.SupplierID
WHERE suppliers.SupplierID = 1


########## Requête#3
SELECT CompanyName AS 'Fournisseur', COUNT(products.SupplierID) AS 'Nbre produits' FROM suppliers
JOIN products ON suppliers.SupplierID = products.SupplierID
WHERE Country = 'France'
GROUP BY products.SupplierID
ORDER BY COUNT(products.SupplierID) DESC




########## Requête#4
SELECT CompanyName AS 'Client',  COUNT(OrderID) AS 'Nbre commandes' FROM customers
JOIN orders ON customers.CustomerID = orders.CustomerID
WHERE Country = 'France'
GROUP BY CompanyName
HAVING COUNT(OrderID) > 10



######## Requête#5
SELECT CompanyName AS 'Client', Sum(Quantity * UnitPrice) AS 'CA', Country AS 'Pays'
FROM customers
JOIN orders ON orders.CustomerID = customers.CustomerID
JOIN `order details` ON `order details`.OrderID = orders.OrderID
GROUP BY CompanyName, Country
HAVING sum(Quantity * UnitPrice) > 30000
ORDER BY SUM(Quantity * UnitPrice) desc


########## Requête#6
SELECT distinct customers.Country AS 'Pays' FROM customers
JOIN orders ON customers.CustomerID = orders.CustomerID
JOIN `order details` ON `order details`.OrderID = orders.OrderID
JOIN products ON `order details`.ProductID = products.ProductID
JOIN suppliers ON products.SupplierID = suppliers.SupplierID
WHERE suppliers.CompanyName LIKE 'Exotic Liquids'
ORDER BY customers.Country asc


########## Requête#7
SELECT SUM(Quantity * UnitPrice) AS 'Montant Ventes 97' FROM `order details`
JOIN orders ON `order details`.OrderID = orders.OrderID
WHERE OrderDate BETWEEN '1997-01-01' AND '1997-12-31'


######### Requête#8
SELECT DISTINCT MONTH(OrderDate) AS 'Mois', SUM(Quantity * UnitPrice) AS 'Montant Ventes' FROM `order details`
JOIN orders ON `order details`.OrderID = orders.OrderID
WHERE YEAR(OrderDate) = 1997
GROUP BY month(OrderDate)


######## Requête#9
SELECT MAX(OrderDate) AS 'Date de dernière commande' FROM orders
WHERE ShipName = 'Du monde entier'


######### procedure stockée requete 9

DELIMITER |

CREATE PROCEDURE last_commande (IN nomboat varchar(50))
BEGIN
    SELECT MAX(OrderDate) AS 'Date de dernière commande' FROM orders
WHERE ShipName = `nomboat`;
END |

DELIMITER ;


######## Requête#10
SELECT ROUND(AVG(DATEDIFF(ShippedDate, OrderDate))) AS 'Délai moyen de livraison en jours' FROM orders



######### procedure stockée requete 10

DELIMITER |

CREATE PROCEDURE delai_liv ()
BEGIN
    SELECT ROUND(AVG(DATEDIFF(ShippedDate, OrderDate)))  FROM orders;
END |

DELIMITER ;