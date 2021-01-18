-- exercice1

-- L'instruction START TRANSACTION est suivie d'une instruction UPDATE, mais aucune instruction COMMIT ou ROLLBACK correspondante n'est présente.

-- Que concluez-vous ?

-- Tous le monde, peut modifier, la transaction est mode auto il n'ya pas de notion de commit ou rollback, pour déactiver le mode auto SET autocommit=0;

-- Les données sont-elles modifiables par d'autres utilisateurs (ouvrez une nouvelle fenêtre de requête pour interroger le fournisseur 120 par une instruction SELECT) ?

-- oui

-- La transaction est-elle terminée ?

-- oui car c'est en auto commit 

-- -- Comment rendre la modification permanente ? 
en fesant : 1er utilisateur
SET autocommit=0;
START TRANSACTION;
UPDATE fournis  SET nomfou= 'GROSBRIGAND' WHERE numfou=120;

on verifie avec : avec les deux utilisateurs
SELECT nomfou FROM fournis WHERE numfou=120;
le premier est ok, le second la modification n'y est pas

On commit avec le 1er utilisateur
COMMIT;

 on reverifie avec le 2eme est normalement c'est ok


-- Comment annuler la transaction ?
en fesant : 1er utilisateur
SET autocommit=0;
START TRANSACTION;
UPDATE fournis  SET nomfou= 'GROSBRIGAND' WHERE numfou=120;

on verifie avec : avec les deux utilisateurs
SELECT nomfou FROM fournis WHERE numfou=120;
le premier est modifier, le second la modification n'y est pas

On rollback avec le 1er utilisateur
ROOLBACK;

 on reverifie avec le 1er et le 2 eme est normalement c'est remis avant la modification



-- exercice2 

SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;
START TRANSACTION;
UPDATE fournis  SET nomfou= 'GROSBRIGAND' WHERE numfou=120;
on verifie avec : 
SELECT nomfou FROM fournis WHERE numfou=120;
commit; 
SET TRANSACTION ISOLATION LEVEL READ COMMITTED;

Pour s'affranchir des anomalies de lectures « sales », il suffit de placer la transaction au niveau d'isolation READ COMMITTED. 
Cela met en œuvre des verrous sur les lectures empêchant que la modification des lignes ne soit commise pendant la lecture.