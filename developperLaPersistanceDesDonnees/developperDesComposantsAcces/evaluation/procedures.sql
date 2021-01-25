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


-- Mise en place d'une règle de gestion
-- Décrivez par quel moyen et comment vous pourriez implémenter la règle de gestion suivante.

-- Pour tenir compte des coûts liés au transport, on vérifiera que pour chaque produit d’une commande, le client réside dans le même pays que le fournisseur du même produit
DELIMITER | 

CREATE TRIGGER insert_produit BEFORE INSERT ON `order details` 

FOR EACH ROW 

BEGIN     
    DECLARE Pays_fournis VARCHAR (15);     
    DECLARE Pays_client VARCHAR (15);  
-- Je déclare les valeurs qui doivent êtres mises à jour avec des sous-requetes   
    SET Pays_fournis = (SELECT Country FROM Suppliers WHERE SupplierID = (SELECT SupplierID FROM Products WHERE ProductID = NEW.ProductID));     
    SET Pays_client = (SELECT Country FROM Customers WHERE CustomerID = (SELECT CustomerID FROM Orders WHERE OrderID = NEW.OrderID ));   

IF Pays_fournis != Pays_client 
THEN     
SIGNAL SQLSTATE '40000' SET MESSAGE_TEXT = 'Impossible de rajouter ce produit';     
END IF; 

END | 

DELIMITER ;  