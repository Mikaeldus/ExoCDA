---------------LOT1------------------

-- 1 - Afficher la liste des hôtels. Le résultat doit faire apparaître le nom de l’hôtel et la ville
SELECT hot_nom FROM hotel
-- permet de voir tous les noms des hotels de la hotel--

--Afficher la ville de résidence de Mr White Le résultat doit faire apparaître le nom, le prénom, et l'adresse du client
SELECT cli_nom, cli_prenom, cli_adresse FROM hotel.client
WHERE cli_nom LIKE 'wh%'
-- permet d'afficher la ligne avec tous les noms commançant part 'wh', dans cette exemple on rechercher 'white' -----

--3 - Afficher la liste des stations dont l’altitude < 1000 Le résultat doit faire apparaître le nom de la station et l'altitude
SELECT sta_nom, sta_altitude FROM hotel.station
WHERE sta_altitude <= 1000
-- permet d'afficher le nom et l'altitude des station inférieur ou égale à 1000 ----

--4 - Afficher la liste des chambres ayant une capacité > 1 Le résultat doit faire apparaître le numéro de la chambre ainsi que la capacité
SELECT cha_numero, cha_capacite FROM hotel.chambre
WHERE cha_capacite >1
-- permet d'afficher les chambre ayant une capacité supérieur à 1

--5 - Afficher les clients n’habitant pas à Londre Le résultat doit faire apparaître le nom du client et la ville
SELECT cli_nom, cli_ville FROM hotel.client
WHERE cli_ville NOT LIKE 'LON%'
-- permet d'afficher tous les clients avec leur ville, qui n'habite pas Londre.

--6 - Afficher la liste des hôtels située sur la ville de Bretou et possédant une catégorie>3 Le résultat doit faire apparaître le nom de l'hôtel, ville et la catégorie
SELECT hot_nom, hot_categorie, hot_ville FROM hotel.hotel
WHERE hot_categorie >= 3 AND hot_ville = 'Bretou'
-- permet d'indiquer toutes les lignes ou le champ categorie est "3" ou supérieur et dans la ville "Bretou"




---------------LOT2------------------

--7 - Afficher la liste des hôtels avec leur station Le résultat doit faire apparaître le nom de la station, le nom de l’hôtel, la catégorie, la ville)
SELECT sta_nom, hot_nom, hot_categorie, hot_ville
FROM hotel.station, hotel.hotel
WHERE sta_nom = sta_nom

--8 - Afficher la liste des chambres et leur hôtel Le résultat doit faire apparaître le nom de l’hôtel, la catégorie, la ville, le numéro de la chambre)
SELECT hot_nom, hot_categorie, hot_ville, cha_numero
FROM hotel.hotel A 
JOIN hotel.chambre B
ON A.hot_sta_id = B.cha_hot_id

--9 - Afficher la liste des chambres de plus d'une place dans des hôtels situés sur la ville de Bretou Le résultat doit faire apparaître le nom de l’hôtel, la catégorie, la ville, le numéro de la chambre et sa capacité)
SELECT hot_nom, hot_categorie, hot_ville, cha_numero, cha_capacite 
FROM hotel.hotel A 
JOIN hotel.chambre B
ON A.hot_sta_id = B.cha_hot_id
AND hot_ville = 'Bretou'

--10 - Afficher la liste des réservations avec le nom des clients Le résultat doit faire apparaître le nom du client, le nom de l’hôtel, la date de réservation
SELECT  res_date, hot_nom, cli_nom 
FROM hotel.client 
JOIN hotel.reservation ON res_id = cli_id
JOIN hotel.chambre ON cha_id = cli_id
JOIN hotel.hotel ON hot_id = cli_id 

--11 - Afficher la liste des chambres avec le nom de l’hôtel et le nom de la station Le résultat doit faire apparaître le nom de la station, le nom de l’hôtel, le numéro de la chambre et sa capacité)
SELECT sta_nom, cha_numero, hot_nom, cha_capacite
FROM hotel.chambre
JOIN hotel.station ON sta_id = cha_id
JOIN hotel.hotel ON hot_sta_id = cha_id

--12 - Afficher les réservations avec le nom du client et le nom de l’hôtel Le résultat doit faire apparaître le nom du client, le nom de l’hôtel, la date de début du séjour et la durée du séjour
SELECT cli_nom, hot_nom, res_date_debut, DATEDIFF( res_date_fin,  res_date_debut)
FROM hotel.client
JOIN hotel.hotel ON hot_id = cli_id
JOIN hotel.reservation ON res_id = cli_id



---------------LOT3------------------

--13 - Compter le nombre d’hôtel par station
SELECT sta_nom, count(hot_sta_id) 
from hotel, station 
where hot_sta_id = sta_id 
group by sta_id

--14 - Compter le nombre de chambre par station
SELECT sta_nom, COUNT(cha_hot_id) 
FROM station 
JOIN hotel ON hot_sta_id = sta_id 
JOIN chambre ON cha_hot_id = hot_id
GROUP BY sta_id

--15 - Compter le nombre de chambre par station ayant une capacité > 1
SELECT sta_nom, COUNT(cha_hot_id)
FROM station 
JOIN hotel ON hot_sta_id = sta_id 
JOIN chambre ON cha_hot_id = hot_id
WHERE cha_capacite >1
GROUP BY sta_id

--16 - Afficher la liste des hôtels pour lesquels Mr Squire a effectué une réservation
SELECT cli_nom, hot_nom, res_date_debut
FROM hotel.client
JOIN hotel.hotel ON hot_id = cli_id
JOIN hotel.reservation ON res_id = cli_id
AND cli_nom = 'Squire'

--17 - Afficher la durée moyenne des réservations par station
SELECT sta_nom, avg(DATEDIFF(res_date_fin, res_date_debut)) 
FROM reservation, hotel, chambre, station   
WHERE res_cha_id = cha_id AND cha_hot_id = hot_id  
GROUP BY sta_id;