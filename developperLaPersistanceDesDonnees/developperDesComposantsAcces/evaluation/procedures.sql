-- Codez deux procédures stockées correspondant aux requêtes 9 et 10. Les procédures stockées doivent prendre en compte les éventuels paramètres.

-- n°9 - n°10
DELIMITER $$

CREATE PROCEDURE northwind.`requete9`( IN ShipName VARCHAR(20))
BEGIN 
SELECT orders.OrderDate AS `Date de la dernière commande`
FROM orders
JOIN northwind.`order details` ON northwind.`order details`.OrderID = orders.OrderID
WHERE orders.OrderDate = (SELECT MAX(orders.OrderDate) FROM orders) 
GROUP BY orders.OrderDate;
END $$

DELIMITER ;

--  pour appeler  
CALL northwind.requete9('le nom du fournisseur');


