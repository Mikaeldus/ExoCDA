-- Exercice 1 : vues sur la base hotel

-- Afficher la liste des hôtels avec leur station 
CREATE VIEW vue1
AS 
SELECT sta_nom, hot_nom
FROM hotel.station, hotel.hotel
WHERE sta_nom = sta_nom

SELECT sta_nom, hot_nom
FROM vue1

-- Afficher la liste des chambres et leur hôtel
CREATE VIEW vue2
AS
SELECT hot_nom, cha_numero
FROM hotel.hotel A 
JOIN hotel.chambre B
ON A.hot_sta_id = B.cha_hot_id
GROUP BY hot_nom, cha_numero

SELECT *
FROM vue2

-- Afficher la liste des réservations avec le nom des clients
CREATE VIEW vue3
AS
SELECT  res_date, hot_nom, cli_nom 
FROM hotel.client 
JOIN hotel.reservation ON res_id = cli_id
JOIN hotel.chambre ON cha_id = cli_id
JOIN hotel.hotel ON hot_id = cli_id 

SELECT *
FROM vue3

-- Afficher la liste des chambres avec le nom de l’hôtel et le nom de la station
CREATE VIEW vue4
AS
SELECT sta_nom, cha_numero, hot_nom
FROM hotel.chambre
JOIN hotel.station ON sta_id = cha_id
JOIN hotel.hotel ON hot_sta_id = cha_id

SELECT *
FROM vue4

-- Afficher les réservations avec le nom du client et le nom de l’hôtel
CREATE VIEW vue5
AS
SELECT cli_nom, hot_nom, res_date_debut
FROM hotel.client
JOIN hotel.hotel ON hot_id = cli_id
JOIN hotel.reservation ON res_id = cli_id

SELECT *
FROM vue5

-- Exercice 2 : vues sur la base papyrus

-- v_GlobalCde correspondant à la requête : A partir de la table Ligcom, afficher par code produit, la somme des quantités commandées et le prix total correspondant : on nommera la colonne correspondant à la somme des quantités commandées, QteTot et le prix total, PrixTot.
CREATE VIEW v_GlobalCde
AS
SELECT ligcom.codart AS 'Code produit', qtecde AS 'Quantité commandé', SUM(qtecde * priuni) AS 'PrixTotal'
FROM entcom
JOIN fournis ON entcom.numfou = fournis.numfou
JOIN ligcom ON entcom.numcom = ligcom.numcom
JOIN produit ON produit.codart = ligcom.codart   
GROUP BY entcom.numcom, nomfou, libart
ORDER BY PrixTotal DESC

SELECT *
FROM v_GlobalCde

--v_VentesI100 correspondant à la requête : Afficher les ventes dont le code produit est le I100 (affichage de toutes les colonnes de la table Vente).
CREATE VIEW v_VentesI100
AS
SELECT vente.codart, vente.numfou, vente.delliv, vente.qte1, vente.prix1, vente.qte2, vente.prix2, vente.qte3, vente.prix3
FROM vente
WHERE vente.codart LIKE 'I100'

SELECT *
FROM v_VentesI100

-- A partir de la vue précédente, créez v_VentesI100Grobrigan remontant toutes les ventes concernant le produit I100 et le fournisseur 00120.
CREATE VIEW v_VentesI100Grobrigan
AS
SELECT vente.codart, vente.numfou, vente.delliv, vente.qte1, vente.prix1, vente.qte2, vente.prix2, vente.qte3, vente.prix3
FROM vente
JOIN fournis ON vente.numfou = fournis.numfou
WHERE vente.codart LIKE 'I100' AND fournis.numfou = '00120'

SELECT *
FROM v_VentesI100Grobrigan