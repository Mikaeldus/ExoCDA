-- BASE EXEMPLE 1

-- 1. Afficher toutes les informations concernant les employés. 
Select * from employe ;

-- 2. Afficher toutes les informations concernant les départements. 
Select * from dept ;

-- 3. Afficher le nom, la date d'embauche, le numéro du supérieur, le
-- numéro de département et le salaire de tous les employés.
SELECT nom AS "le nom", dateemb AS "la date d'embauche", nosup AS "le numéro du supérieur", nodep AS "le numéro de département", salaire AS "le salaire"
FROM employe ;

-- 4. Afficher le titre de tous les employés.
SELECT DISTINCT titre
FROM employe ;

-- 5. Afficher les différentes valeurs des titres des employés. 
SELECT titre
FROM employe ;

-- 6. Afficher le nom, le numéro d'employé et le numéro du
-- département des employés dont le titre est « Secrétaire ».
 SELECT nom AS "le nom", noemp AS "le numéro d'employé", nodep AS "le numéro de département", titre
FROM employe 
WHERE titre = "Secrétaire";

-- 7. Afficher le nom et le numéro de département dont le numéro de
-- département est supérieur à 40.
SELECT nom AS "le nom", nodep AS "le numéro de département"
FROM employe 
WHERE nodep > 40 ;

-- 8. Afficher le nom et le prénom des employés dont le nom est
-- alphabétiquement antérieur au prénom. 
SELECT nom, prenom
FROM employe
WHERE nom  < prenom ;

-- 9. Afficher le nom, le salaire et le numéro du département des employés
-- dont le titre est « Représentant », le numéro de département est 35 et
-- le salaire est supérieur à 20000. 
SELECT nom, salaire, nodep AS 'le numéro de departement'
FROM employe
WHERE titre = "Représentant" AND nodep = 35 AND salaire > 20000;

-- 10.Afficher le nom, le titre et le salaire des employés dont le titre est
-- « Représentant » ou dont le titre est « Président ».
SELECT nom, titre, salaire
FROM employe
WHERE titre = "Représentant" OR titre = "Président" ;

-- 11.Afficher le nom, le titre, le numéro de département, le salaire des
-- employés du département 34, dont le titre est « Représentant » ou
-- « Secrétaire ». 
SELECT nom, titre, nodep AS 'le numéro de departement', salaire
FROM employe
WHERE nodep = 34 OR titre = "Représentant" AND titre = "Secrétaire";

-- 12.Afficher le nom, le titre, le numéro de département, le salaire des
-- employés dont le titre est Représentant, ou dont le titre est Secrétaire
-- dans le département numéro 34. 
SELECT nom, titre, nodep AS 'le numéro de departement', salaire
FROM employe
WHERE nodep = 34 OR titre = "Représentant" AND titre = "Secrétaire";

-- 13.Afficher le nom, et le salaire des employés dont le salaire est compris
-- entre 20000 et 30000. 
SELECT nom, salaire
FROM employe
WHERE salaire > 20000 AND salaire < 30000;

-- 15.Afficher le nom des employés commençant par la lettre « H ». 
SELECT nom
FROM employe
WHERE nom LIKE 'H%';

-- 16.Afficher le nom des employés se terminant par la lettre « n ». 
SELECT nom
FROM employe
WHERE nom LIKE '%n';

-- 17.Afficher le nom des employés contenant la lettre « u » en 3ème
-- position. 
SELECT nom
FROM employe
WHERE nom LIKE '__u%';

-- 18.Afficher le salaire et le nom des employés du service 41 classés par
-- salaire croissant. 
SELECT salaire, nom
FROM employe
WHERE nodep = 41
ORDER BY salaire ASC;

-- 19.Afficher le salaire et le nom des employés du service 41 classés par
-- salaire décroissant. 
SELECT salaire, nom
FROM employe
WHERE nodep = 41
ORDER BY salaire DESC;

-- 20.Afficher le titre, le salaire et le nom des employés classés par titre
-- croissant et par salaire décroissant. 
SELECT titre, salaire, nom
FROM employe
ORDER BY titre, salaire DESC;

-- 21.Afficher le taux de commission, le salaire et le nom des employés
-- classés par taux de commission croissante. 
SELECT tauxcom, salaire, nom
FROM employe
ORDER BY tauxcom;

-- 22.Afficher le nom, le salaire, le taux de commission et le titre des
-- employés dont le taux de commission n'est pas renseigné.
SELECT tauxcom, salaire, nom, titre
FROM employe
WHERE tauxcom IS NULL;

-- 23.Afficher le nom, le salaire, le taux de commission et le titre des
-- employés dont le taux de commission est renseigné. 
SELECT tauxcom, salaire, nom, titre
FROM employe
WHERE tauxcom IS NOT NULL;

-- 24.Afficher le nom, le salaire, le taux de commission, le titre des
-- employés dont le taux de commission est inférieur à 15. 
SELECT tauxcom, salaire, nom, titre
FROM employe
WHERE tauxcom < 15 ;

-- 25. Afficher le nom, le salaire, le taux de commission, le titre des
-- employés dont le taux de commission est supérieur à 15.
SELECT tauxcom, salaire, nom, titre
FROM employe
WHERE tauxcom > 15 ;

-- 26.Afficher le nom, le salaire, le taux de commission et la commission des
-- employés dont le taux de commission n'est pas nul. (la commission
-- est calculée en multipliant le salaire par le taux de commission)
SELECT nom, salaire, tauxcom, (salaire*tauxcom) Commission
FROM employe
WHERE tauxcom IS NOT NULL;

-- 27. Afficher le nom, le salaire, le taux de commission, la commission des
-- employés dont le taux de commission n'est pas nul, classé par taux de
-- commission croissant. 
SELECT nom, salaire, tauxcom, (salaire*tauxcom) Commission
FROM employe
WHERE tauxcom IS NOT NULL
ORDER BY Commission ASC;

-- 28. Afficher le nom et le prénom (concaténés) des employés. Renommer
-- les colonnes
SELECT CONCAT(nom, ' ', prenom) AS 'Employe'
FROM employe;

-- 29. Afficher les 5 premières lettres du nom des employés. 
SELECT SUBSTR(nom, 1, 5)
FROM employe;

-- 30. Afficher le nom et le rang de la lettre « r » dans le nom des
-- employés. 
SELECT nom, LOCATE('r', nom) AS 'locate r'
FROM employe;

-- 31. Afficher le nom, le nom en majuscule et le nom en minuscule de
-- l'employé dont le nom est Vrante.
 SELECT nom, UPPER(nom), LOWER(nom)
FROM employe
WHERE nom = 'Vrante';

-- 32. Afficher le nom et le nombre de caractères du nom des employés. 
SELECT nom, LENGTH(nom) AS 'nombre de caractere'
FROM employe;


-- BASE EXEMPLE 2

-- Jointures


-- Rechercher le prénom des employés et le numéro de la région de leur
-- département.
SELECT prenom, noregion
FROM employe
JOIN dept ON dept.nodept = employe.nodep;

-- Rechercher le numéro du département, le nom du département, le
-- nom des employés classés par numéro de département (renommer les
-- tables utilisées). 
SELECT employe.nodep AS 'numero departement', employe.nom AS 'employe', dept.nom AS 'nom departement'
FROM employe
JOIN dept ON employe.nodep = dept.nodept
ORDER BY nodep ASC;

-- Rechercher le nom des employés du département Distribution. 
SELECT employe.nodep AS 'numero departement', employe.nom AS 'employe', dept.nom AS 'nom departement'
FROM employe
JOIN dept ON employe.nodep = dept.nodept
WHERE dept.nom LIKE 'distribution'
ORDER BY nodep ASC;

-- Auto-jointures

-- Rechercher le nom et le salaire des employés qui gagnent plus que
-- leur patron, et le nom et le salaire de leur patron.
SELECT nom, salaire, titre, (salaire*tauxcom) Commission
FROM employe 
WHERE tauxcom IS NOT NULL OR titre LIKE 'président';

-- Sous-requêtes

-- Rechercher le nom et le titre des employés qui ont le même titre que
-- Amartakaldire. 
SELECT nom, titre
FROM employe
WHERE titre IN (SELECT titre FROM employe WHERE nom='Amartakaldire');

-- Rechercher le nom, le salaire et le numéro de département des
-- employés qui gagnent plus qu'un seul employé du département 31,
-- classés par numéro de département et salaire. 
SELECT nom, salaire, nodep
FROM employe
WHERE salaire > ANY ( SELECT salaire FROM employe WHERE nodep = '31');

-- Rechercher le nom, le salaire et le numéro de département des
-- employés qui gagnent plus que tous les employés du département 31,
-- classés par numéro de département et salaire. 
SELECT nom, salaire, nodep
FROM employe
WHERE salaire > ALL ( SELECT salaire FROM employe WHERE nodep = '31');

-- Rechercher le nom et le titre des employés du service 31 qui ont un
-- titre que l'on trouve dans le département 32. 
SELECT nom, titre, nodep
FROM employe
WHERE titre IN (SELECT titre FROM employe WHERE nodep = '32') AND nodep ='31'; 

-- Rechercher le nom et le titre des employés du service 31 qui ont un
-- titre l'on ne trouve pas dans le département 32.
SELECT nom, titre, nodep
FROM employe
WHERE titre NOT IN (SELECT titre FROM employe WHERE nodep = '32') AND nodep ='31'; 

-- Rechercher le nom, le titre et le salaire des employés qui ont le même
-- titre et le même salaire que Fairant.
SELECT nom, titre, salaire
FROM employe
WHERE salaire IN (SELECT salaire FROM employe WHERE nom='fairent'); 

-- Requêtes externes

-- Rechercher le numéro de département, le nom du département, le
-- nom des employés, en affichant aussi les départements dans lesquels
-- il n'y a personne, classés par numéro de département. 
SELECT dept.nodept, dept.nom, employe.nom
FROM dept
LEFT JOIN employe ON dept.nodept = employe.nodep
WHERE employe.nom IS NOT NULL

-- Utilisation de fonctions de groupe

-- 1. Calculer le nombre d'employés de chaque titre. 
SELECT titre, COUNT(nom) AS 'Nombre d employé'
FROM employe
GROUP BY titre;

-- 2. Calculer la moyenne des salaires et leur somme, par région.
SELECT dept.nodept, dept.nom, AVG(salaire) AS 'Moyenne des salaires'
FROM dept JOIN employe ON dept.nodept = employe.nodep
GROUP BY dept.nodept;

-- La clause HAVING

-- 3. Afficher les numéros des départements ayant au moins 3 employés. 
SELECT nodep, COUNT(nom)
FROM employe
GROUP BY nodep
HAVING COUNT(nom) >=3;

-- 4. Afficher les lettres qui sont l'initiale d'au moins trois employés. 
SELECT COUNT(nom) AS 'nombre d employe', SUBSTR(nom,1,1) AS 'initial'
FROM employe
GROUP BY initial
HAVING COUNT(nom) >= 3;

-- 5. Rechercher le salaire maximum et le salaire minimum parmi tous les
-- salariés et l'écart entre les deux. 
SELECT MIN(salaire), MAX(salaire), MAX(salaire)-MIN(salaire) AS 'ecart'
FROM employe ;

-- 6. Rechercher le nombre de titres différents. 
SELECT COUNT(distinct titre) AS 'nombre de titre differents'
FROM employe ;

-- 7. Pour chaque titre, compter le nombre d'employés possédant ce titre. 
SELECT COUNT(titre) AS 'nombre d employé possedant le meme titre'
FROM employe
GROUP BY titre;

-- 8. Pour chaque nom de département, afficher le nom du département et
-- le nombre d'employés.
SELECT dept.nom AS 'nom du departement', COUNT(employe.nom) AS 'nombres d employe'
FROM dept 
JOIN employe ON dept.nodept = employe.nodep
GROUP BY dept.nom;

-- 9. Rechercher les titres et la moyenne des salaires par titre dont la
-- moyenne est supérieure à la moyenne des salaires des Représentants. 
SELECT distinct titre AS 'nombre de titre differents', AVG(salaire)
FROM employe
GROUP BY titre;

-- 10.Rechercher le nombre de salaires renseignés et le nombre de taux de
-- commission renseignés. 
SELECT COUNT(salaire) AS 'salaire renseignés', COUNT(tauxcom) AS 'commission reseignés'
FROM employe;


