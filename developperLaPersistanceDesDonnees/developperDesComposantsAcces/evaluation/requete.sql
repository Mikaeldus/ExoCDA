-- 1 Liste des contacts français :
SELECT CompanyName AS Société, ContactName AS contact, ContactTitle AS Fonction, Phone AS Téléphone
FROM customers
WHERE Country = 'France'
-- je demande la socièté, l'intitulé de la personne et sa fonction et que des français.



-- 2 Produits vendus par le fournisseur "Exotic Liquids" :
SELECT ProductName AS Produit, UnitPrice AS Prix
FROM products
JOIN suppliers ON products.SupplierID = suppliers.SupplierID
WHERE suppliers.SupplierID = '1'
-- je demande les produits vendu part "Exotic Liquids" en référence avec la table suppliers, j'aurai put faire plus simple :
SELECT ProductName AS Produit, UnitPrice AS Prix
FROM products
WHERE products.SupplierID = '1'


-- 3 Nombre de produits vendus par les fournisseurs Français dans l’ordre décroissant :
SELECT suppliers.CompanyName AS Fournisseur, COUNT(products.ProductName) AS 'nbre_produits'
FROM suppliers
JOIN products ON suppliers.SupplierID = products.SupplierID
WHERE suppliers.Country = 'France'
GROUP BY suppliers.CompanyName
ORDER BY nbre_produits DESC 
-- je demande le nom des fournisseur, ensuite je compte le nombre de produit vendu part fournisseur  et avec le where je demande que les fournisseur qui sont de la France.


-- 4 Liste des clients Français ayant plus de 10 commandes :
SELECT orders.ShipName AS Client, COUNT(orders.CustomerID) AS nbre_commandes
FROM orders
WHERE orders.ShipCountry = 'France'
GROUP BY orders.ShipName
HAVING COUNT(orders.CustomerID) > 10 
-- Je demande le nom de client, je compte le nombre de commande part client, je trie avec un where pour que ce soit que les client qui viennent de France,
-- si le nombre de commande est inférieur à 10 je ne l'ai montre pas (avec le HAVING)


-- 5 Liste des clients ayant un chiffre d’affaires > 30.000 :
SELECT orders.ShipName AS Client, SUM(unitPrice * Quantity) AS CA, orders.ShipCountry AS Pays
FROM northwind.`order details`
JOIN orders ON orders.OrderID = northwind.`order details`.OrderID
GROUP BY orders.ShipName, orders.ShipCountry
HAVING SUM(unitPrice * Quantity) > 30000
ORDER BY CA DESC
-- j'affiche le client, le chiffre d'affaire en prenant les info de la talbe order details et le pays, 
-- le having me permet d'afficher que les client qui ont un chiffres d'affaire supérieur à 30000, et j'utilise DESC pour montrer en décroissant.


--6 Liste des pays dont les clients ont passé commande de produits fournis par « Exotic Liquids » :
SELECT shipCountry AS pays
FROM orders
JOIN northwind.`order details` ON northwind.`order details`.OrderID = orders.OrderID
JOIN products ON products.ProductID = northwind.`order details`.ProductID
JOIN suppliers ON suppliers.SupplierID = products.SupplierID
WHERE suppliers.SupplierID = '1'
GROUP BY shipCountry

-- j'affiche tous les pays qui ont passer commande avec Exotic Liquids, en reliant toute les tables à cause des clefs etrangères.

--7 Montant des ventes de 1997 :
SELECT SUM(UnitPrice * Quantity) AS `Montant Ventes 1997`
FROM northwind.`order details`
JOIN orders ON northwind.`order details`.OrderID = orders.OrderID 
WHERE YEAR(orders.OrderDate) = '1997'
-- j'affiche le globale des ventes, ensuite je met une condition que les années 1997, j'ai reliés les tables.

--8 Montant des ventes de 1997 mois par mois :
SELECT MONTH(orders.OrderDate) AS `Mois 1997`, SUM(UnitPrice * Quantity) AS `Montant Ventes 1997`
FROM northwind.`order details`
JOIN orders ON northwind.`order details`.OrderID = orders.OrderID
WHERE YEAR(orders.OrderDate) = '1997'
GROUP BY MONTH(orders.OrderDate)
-- j'affiche les mois, les chiffre mensuelle et avec le where je defini quelle année.

--9 Depuis quelle date le client « Du monde entier » n’a plus commandé ?
SELECT orders.OrderDate AS `Date de la dernière commande`
FROM orders
JOIN northwind.`order details` ON northwind.`order details`.OrderID = orders.OrderID
WHERE orders.OrderDate = (SELECT MAX(orders.OrderDate) FROM orders WHERE orders.ShipName LIKE 'Du%') 
GROUP BY orders.OrderDate
-- je demande toutes les dates de commande du client Du monde entier et je prend la dernière enregistrer.

--10 – Quel est le délai moyen de livraison en jours ?
SELECT ROUND(AVG(DATEDIFF(orders.ShippedDate, orders.OrderDate))) AS `Délai moyen de livraison en jours`
FROM orders
-- j'utilise le round pour enlever les décimal, avg pour la moyenne, datediff pour recuperer en nombre la difference entre la date de debut commande et la livraison.

