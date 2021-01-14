-----------LES BESOINS D’AFFICHAGE-------------*

--1.Quelles sont les commandes du fournisseur 09120?
SELECT numcom
FROM entcom
WHERE numfou = '9120'

--2.Afficher le code des fournisseurs pour lesquels des commandes ont été passées.
SELECT fournis.numfou
FROM entcom
JOIN fournis ON entcom.numfou = fournis.numfou 
GROUP BY fournis.numfou
 

--3.Afficher le nombre de commandes fournisseurs passées, et le nombre de fournisseur concernés.
SELECT COUNT(numcom) AS 'Nombre de commande'  , COUNT(DISTINCT numfou) AS 'Fournisseur concerné' 
FROM entcom 

--4.Editer les produits ayant un stock inférieur ou égal au stock d'alerte et dont la quantité annuelle est inférieur est inférieure à1000 (informations à fournir : n° produit, libelléproduit, stock, stockactuel d'alerte, quantitéannuelle)
SELECT codart, libart, stkale, stkphy, qteann
FROM produit
WHERE stkphy <= stkale

--5.Quels sont les fournisseurs situés dans les départements 75 78 92 77 ? L’affichage (département, nom fournisseur) sera effectué par département décroissant, puis par ordre alphabétique
SELECT posfou,nomfou  
FROM entcom 
JOIN fournis ON entcom.numfou = fournis.numfou
WHERE fournis.posfou LIKE '75%'                                                 
OR fournis.posfou LIKE '78%'                        
OR fournis.posfou LIKE '77%' 
OR fournis.posfou LIKE '92%'
GROUP BY fournis.numfou
ORDER BY posfou DESC, nomfou ASC

--6.Quelles sont les commandes passées au mois de mars et avril?
SELECT ligcom.numcom, derliv
FROM ligcom
WHERE MONTH(derliv) BETWEEN 3 AND 4

UNION 

SELECT entcom.numcom, datcom
FROM entcom
WHERE MONTH(datcom) BETWEEN 3 AND 4
GROUP BY entcom.numcom
--Apres avoir recompter pour vérifier il manque juste une commande en 70010 ----

--7.Quelles sont les commandes du jour qui ont des observations particulières ?(Affichage numéro de commande, date de commande)
SELECT numcom, datcom, obscom 
FROM entcom
WHERE obscom LIKE 'com%' 
AND YEAR(datcom) = DAY (CURRENT_TIMESTAMP)

--8. Lister le total de chaque commande par total décroissant (Affichage numéro de commande et total)
SELECT numcom, SUM(qtecde * priuni) AS total
FROM ligcom  
GROUP BY numcom 
ORDER BY total DESC

--9. Lister les commandesdont le total est supérieur à 10000€; on exclura dans le calcul du total les articles commandés en quantité supérieure ou égale à 1000.(Affichage numéro de commande et total)
SELECT numcom, SUM(qtecde * priuni) AS total
FROM ligcom
WHERE qtecde >= 1000     
GROUP BY numcom 
HAVING SUM(qtecde * priuni) > 10000
ORDER BY total DESC

--10 Lister les commandes par nom fournisseur (Afficher le nom du fournisseur, le numéro de commande et la date)
SELECT nomfou, numcom, datcom
FROM fournis 
JOIN entcom ON entcom.numfou = fournis.numfou

--11 Sortir les produits des commandes ayant le mot "urgent' en observation?(Afficher le numéro de commande, le nom du fournisseur, le libellé du produit et le sous total= quantité commandée * Prix unitaire)
SELECT entcom.numcom, nomfou, libart, SUM(qtecde * priuni) AS soustotal
FROM entcom
JOIN fournis ON entcom.numfou = fournis.numfou
JOIN ligcom ON entcom.numcom = ligcom.numcom
JOIN produit ON produit.codart = ligcom.codart
WHERE obscom LIKE '%urgent%'     
GROUP BY entcom.numcom, nomfou, libart
ORDER BY soustotal DESC

--12 Coder de 2manières différentes la requête suivante:Lister le nom des fournisseurs susceptibles de livrer au moins un article
SELECT nomfou
FROM entcom
JOIN fournis ON entcom.numfou = fournis.numfou
JOIN ligcom ON entcom.numcom = ligcom.numcom AND qteliv >= 1
GROUP BY nomfou

--OU--

SELECT nomfou
FROM entcom, fournis, ligcom
WHERE entcom.numfou = fournis.numfou and entcom.numcom = ligcom.numcom  AND qteliv >= 1
GROUP BY nomfou

--13 Coder de 2 manières différentes la requête suivante Lister les commandes (Numéro et date) dont le fournisseur est celui de la commande 70210
SELECT numcom, datcom
FROM entcom
WHERE numfou = 120

--OU--
SELECT nomfou, numcom, datcom
FROM fournis 
JOIN entcom ON entcom.numfou = fournis.numfou
WHERE fournis.nomfou LIKE 'GROBRIGAN'

--14 Dans les articles susceptibles d’être vendus, lister les articles moins chers (basés sur Prix1) que le moins cher des rubans (article dont le premier caractère commence par R). On affichera le libellé de l’article et prix1
SELECT libart, prix1
FROM vente, produit
WHERE produit.codart = vente.codart and STKPHY > 0 and PRIX1 < (
SELECT min(prix1) 
FROM VENTE, PRODUIT 
WHERE produit.CODART = vente.CODART and LIBART  LIKE ('R%') )

GROUP BY LIBART,PRIX1

--15 Editer la liste des fournisseurs susceptibles de livrer les produits dont le stock est inférieur ou égal à 150 % du stock d'alerte. La liste est triée par produit puis fournisseur
SELECT libart, fournis.nomfou
FROM produit
JOIN vente ON produit.codart = vente.codart
JOIN fournis ON fournis.numfou = vente.numfou AND stkphy <=(
SELECT SUM(stkale * 1.5)
FROM produit
WHERE stkale > 0 AND stkphy > 0)

ORDER BY libart, fournis.nomfou

--16 Éditer la liste des fournisseurs susceptibles de livrer les produit dont le stock est inférieur ou égal à 150 % du stock d'alerte et un délai de livraison d'au plus 30 jours. La liste est triée par fournisseur puis produit
SELECT libart, fournis.nomfou
FROM produit
JOIN vente ON produit.codart = vente.codart
JOIN fournis ON fournis.numfou = vente.numfou AND stkphy <=(
SELECT SUM(stkale * 1.5)
FROM produit
WHERE stkale > 0 AND stkphy > 0 AND delliv < 30)

ORDER BY libart, fournis.nomfou

--17 Avec le même type de sélection que ci-dessus, sortir un total des stocks par fournisseur trié par total décroissant
SELECT nomfou, sum(stkphy) AS stock
FROM  fournis
JOIN vente ON vente.numfou = fournis.numfou
JOIN produit ON vente.codart = produit.codart
GROUP BY nomfou
ORDER BY Stock DESC

--18 En fin d'année, sortir la liste des produits dont la quantité réellement commandée dépasse 90% de la quantité annuelle prévue.
SELECT libart, sum(qtecde) AS quantite 
FROM produit
JOIN ligcom ON produit.codart = ligcom.codart
GROUP BY libart, qteann
HAVING (qteann * 0.9) < SUM(qtecde)

--19 Calculer le chiffre d'affaire par fournisseur pour l'année 93 sachant que les prix indiqués sont hors taxes et que le taux de TVA est 20%.
SELECT fournis.nomfou, SUM(qtecde * priuni *1.2) AS Prixttc
FROM entcom
JOIN ligcom ON ligcom.numcom = entcom.numcom
JOIN fournis ON entcom.numfou = fournis.numfou 
GROUP BY nomfou

--20 Existe-t-il des lignes de commande non cohérentes avec les produits vendus par les fournisseurs. ?
SELECT ligcom.numcom, ligcom.derliv, entcom.datcom
FROM ligcom 
JOIN entcom ON entcom.numcom = ligcom.numcom

-- Les dates de livraison commande et date de passage commande ne correspondent pas entre eux 

--------------------------------Les besoins de mise a jour --------------------------------

--1 Application d'une augmentation de tarif de 4% pour le prix 1, 2% pour le prix2 pour le fournisseur 9180
UPDATE vente
SET prix1 = prix1 * 1.04, prix2 = prix2 * 1.02
WHERE numfou = 9180

--2 Dans la table vente, mettre à jour le prix2 des articles dont le prix2 est null, en affectant a valeur de prix.
UPDATE vente
SET prix2 = prix1
WHERE prix2 IS NULL

--3 Mettre à jour le champ obscom en positionnant '*****' pour toutes les commandes dont le fournisseur a un indice de satisfaction <5
UPDATE entcom
SET obscom = '*****'
FROM entcom
JOIN fournis ON entcom.numfou = fournis.numfou
WHERE satisf < 5

--4 Suppression du produit I110
DELETE FROM papyrus.vente
WHERE vente.codart = 'I110';

DELETE FROM papyrus.ligcom
WHERE ligcom.codart = 'I110';

DELETE FROM papyrus.produit
WHERE produit.codart = 'I110';


--5 Suppression des commandes qui n'ont aucune ligne de commande
DELETE FROM papyrus.ligcom
WHERE ligcom.qteliv = '0';

--6 Supression des lignes de commande dont les commandes n'ont pas d'observation

Pour déactiver les clef etrangere 
SET FOREIGN_KEY_CHECKS = 0;

DELETE FROM papyrus.entcom 
WHERE obscom NOT LIKE 'com%';

pour réactiver :
SET FOREIGN_KEY_CHECKS = 1;
