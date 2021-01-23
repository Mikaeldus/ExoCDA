-- Base Hotel 


-- Pour changer le moteur de stockage d'une table, exécuter la requête

ALTER TABLE station ENGINE=InnoDB;


-- un trigger en insertion sur la table station

DELIMITER |
CREATE TRIGGER station_insert AFTER INSERT ON station
    FOR EACH ROW
    BEGIN
        DECLARE altitude INT;
        SET altitude = NEW.sta_altitude;
        IF altitude<1000 THEN
            SIGNAL SQLSTATE '40000' SET MESSAGE_TEXT = 'Un problème est survenu. Règle de gestion altitude !';
        END IF;
END |
DELIMITER ;

-- Ce qui provoque l'annulation de la requête qui a déclenchée le trigger

insert into station (sta_nom, sta_altitude) values ('station du bas', 666);

-- Message d'erreur 
SIGNAL SQLSTATE '40000' SET MESSAGE_TEXT = 'Un problème est survenu. Règle de gestion altitude !';


-- Exercice : 

-- modif_reservation : interdire la modification des réservations (on autorise l'ajout et la suppression).

DELIMITER |
CREATE TRIGGER modif_reservation
BEFORE UPDATE ON hotel.reservation
FOR EACH ROW BEGIN
SIGNAL SQLSTATE '40000' SET MESSAGE_TEXT = 'Impossible de modifier les lignes de commandes';
END |
DELIMITER ;

-- je test l'update 
UPDATE reservation  SET res_prix= '4545' WHERE res_id=1;
-- il me met bien le message d'erreur

-- je test l'ajout 
INSERT INTO reservation (res_cha_id, res_cli_id, res_date, res_date_debut, res_date_fin, res_prix, res_arrhes) VALUES (1, 1, '2017-01-10', '2017-07-01', '2017-07-15', 56, 000);
-- ok !

-- je test le delete 
DELETE FROM `hotel`.`reservation` WHERE  `res_id`=9;
-- ok ! 

-- insert_reservation : interdire l'ajout de réservation pour les hôtels possédant déjà 10 réservations.
DELIMITER |
CREATE TRIGGER reservation_insert
BEFORE INSERT ON hotel.reservation
FOR EACH ROW
BEGIN
    IF (SELECT COUNT(*) FROM reservation WHERE res_cha_id = NEW.res_cha_id) >= '10' THEN
        SIGNAL SQLSTATE '40000' SET MESSAGE_TEXT = 'Reservation interdite, il n y a plus de place';
    END IF;
END |
DELIMITER ;

-- insert_reservation2 : interdire les réservations si le client possède déjà 3 réservations.
DELIMITER |
CREATE TRIGGER reservation_insert2
BEFORE INSERT ON hotel.reservation
FOR EACH ROW
BEGIN
    IF (SELECT COUNT(*) FROM reservation WHERE res_cli_id = NEW.res_cli_id) >= '3' THEN
        SIGNAL SQLSTATE '40000' SET MESSAGE_TEXT = 'Reservation interdite, le client à deja 3 reservations';
    END IF;
END |
DELIMITER ;

-- insert_chambre : lors d'une insertion, on calcule le total des capacités des chambres pour l'hôtel, si ce total est supérieur à 50, on interdit l'insertion de la chambre.
DELIMITER |
CREATE TRIGGER chambre_insert
BEFORE INSERT ON hotel.chambre
FOR EACH ROW
BEGIN
    IF (SELECT COUNT(*) FROM chambre WHERE cha_hot_id = NEW.cha_hot_id) >= '50' THEN
        SIGNAL SQLSTATE '40000' SET MESSAGE_TEXT = 'Création interdite, l hotel à deja plus de 50 chambres';
    END IF;
END |
DELIMITER ;

-- Cas pratique

-- Mettez en place ce trigger, puis ajoutez un produit dans une commande, vérifiez que le champ total est bien mis à jour.
DELIMITER |
CREATE TRIGGER maj_total AFTER INSERT ON lignedecommande
    FOR EACH ROW
    BEGIN
        DECLARE id_c INT;
        DECLARE tot DOUBLE;
        SET id_c = NEW.id_commande;
        SET tot = (SELECT sum(prix*quantite) FROM lignedecommande WHERE id_commande=id_c); 
        UPDATE commande SET total=tot WHERE id=id_c;
END|
DELIMITER ;

-- Ce trigger ne fonctionne que lorsque l'on ajoute des produits dans la commande, les modifications ou suppressions ne permettent pas de recalculer le total. Modifiez le code ci-dessus pour faire en sorte que la modification ou la suppression de produit recalcul le total de la commande.
-- Un champ remise était prévu dans la table commande. Prenez en compte ce champ dans le code de votre trigger.

DELIMITER |
CREATE TRIGGER maj_total AFTER INSERT ON lignedecommande
    FOR EACH ROW
    BEGIN
        DECLARE id_c INT;
        DECLARE tot DOUBLE;
        SET id_c = NEW.id_commande;
        SET tot = (SELECT sum(prix*quantite) FROM lignedecommande WHERE id_commande=id_c); 
        UPDATE commande SET total= ((tot * remise) / 100)  WHERE id=id_c;
END|
DELIMITER ;

DELIMITER |
CREATE TRIGGER maj_total AFTER update ON lignedecommande
    FOR EACH ROW
    BEGIN
        DECLARE id_c INT;
        DECLARE tot DOUBLE;
        SET id_c = NEW.id_commande;
        SET tot = (SELECT sum(prix*quantite) FROM lignedecommande WHERE id_commande=id_c); 
        UPDATE commande SET total= ((tot * remise) / 100) WHERE id=id_c;
END|
DELIMITER ;

DELIMITER |
CREATE TRIGGER maj_total AFTER DELETE ON lignedecommande
    FOR EACH ROW
    BEGIN
        DECLARE id_c INT;
        DECLARE tot DOUBLE;
        SET id_c = OLD.id_commande;
        SET tot = (SELECT sum(prix*quantite) FROM lignedecommande WHERE id_commande=id_c); 
        UPDATE commande SET total= ((tot * remise) / 100) WHERE id=id_c;
END|
DELIMITER ;





