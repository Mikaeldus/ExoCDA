-- exercice1

-- L'instruction START TRANSACTION est suivie d'une instruction UPDATE, mais aucune instruction COMMIT ou ROLLBACK correspondante n'est présente.

-- Que concluez-vous ?

-- Tous le monde, peut modifier, la transaction est mode auto il n'ya pas de notion de commit ou rollback, pour déactiver le mode auto SET autocommit=0;

-- Les données sont-elles modifiables par d'autres utilisateurs (ouvrez une nouvelle fenêtre de requête pour interroger le fournisseur 120 par une instruction SELECT) ?

-- oui

-- La transaction est-elle terminée ?

-- non car il faut soit faire un commit ou un rollback 

-- -- Comment rendre la modification permanente ? 
en fesant :
START TRANSACTION;
UPDATE fournis  SET nomfou= 'GROSBRIGAND' WHERE numfou=120;
COMMIT;

on verifie avec :
SELECT nomfou FROM fournis WHERE numfou=120

-- Comment annuler la transaction ?
en fesant:
ROLLBACK;

on verifie avec :
SELECT nomfou FROM fournis WHERE numfou=120

-- exercice2 


