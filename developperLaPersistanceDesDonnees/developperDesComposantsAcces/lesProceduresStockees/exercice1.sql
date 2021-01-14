-- Exercice 1 : création d'une procédure stockée sans paramètre

-- Créez la procédure stockée Lst_fournis correspondant à la requête n°2 afficher le code des fournisseurs pour lesquels une commande a été passée.
CREATE PROCEDURE `Lst_fournis`()

BEGIN
SELECT fournis.numfou
    FROM entcom
    JOIN fournis ON entcom.numfou = fournis.numfou 
    GROUP BY fournis.numfou;
END


-- Exécutez la pour vérifier qu’elle fonctionne conformément à votre attente.
CALL Lst_fournis;

-- Exécutez la commande SQL suivante pour obtenir des informations sur cette procédure stockée :
SHOW CREATE PROCEDURE Lst_fournis;

-- Exercice 2 : création d'une procédure stockée avec un paramètre en entrée

-- Créer la procédure stockée Lst_Commandes, qui liste les commandes ayant un libellé particulier dans le champ obscom (cette requête sera construite à partir de la requête n°11).
DELIMITER $$ 
CREATE PROCEDURE papyrus.`Lst_Commandes`(IN observation VARCHAR(20)) 
LANGUAGE SQL 
DETERMINISTIC 
COMMENT '' 
BEGIN 
SELECT entcom.numcom, nomfou, libart, SUM(qtecde * priuni) AS soustotal
FROM entcom
JOIN fournis ON entcom.numfou = fournis.numfou
JOIN ligcom ON entcom.numcom = ligcom.numcom
JOIN produit ON produit.codart = ligcom.codart
WHERE obscom = observation     
GROUP BY entcom.numcom, nomfou, libart
ORDER BY soustotal DESC;
END $$ 
DELIMITER ;

-- Pour vérifier :
CALL papyrus.Lst_Commandes('Commande urgente');

-- Créer la procédure stockée CA_ Fournisseur, qui pour un code fournisseur et une année entrée en paramètre, calcule et restitue le CA potentiel de ce fournisseur pour l'année souhaitée (cette requête sera construite à partir de la requête n°19).
DELIMITER $$ 
CREATE PROCEDURE papyrus.`CA_Fournisseur`( 
    IN codefournis    int,
    IN annee          int
)
    BEGIN
    SELECT SUM((qtecde * priuni)*1.2) AS 'chiffre d''affaire' 
    FROM ligcom, entcom
    WHERE ligcom.numcom = entcom.numcom
	AND YEAR(datcom) = annee
	AND numfou = codefournis
	GROUP BY numfou;
END $$ 
DELIMITER ;

-- On exécutera la requête que si le code fournisseur est valide, c'est-à-dire dans la table FOURNIS.

-- Testez cette procédure avec différentes valeurs des paramètres.

CALL papyrus.CA_Fournisseur('540', '2018');

