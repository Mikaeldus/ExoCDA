Rajouter trois stations(1,2,3 part auto_incrementation) :

INSERT INTO station
VALUES (NULL,'Soleil'), (NULL,'Eau'), (NULL,'Terre');

Trois hotel part stations :

INSERT INTO hotel
VALUES (10, 'Chaud', 'Exotique Hotel', '2_ruedelabete_80512_BELLEVILLE', 1, 1), 
       (8, 'Relax', 'Vert Hotel', '4_ruedelhotel_80691_DOULIS', 2, 1),
       (12, 'Calme', 'Bleu Hotel', '9_ruedelaplace_96231_PARIS', 3, 1),
       (10, 'Chaud', 'Doux Hotel', '2_ruedelouest_58124_DOULLENS', 4, 2),
       (9, 'Relax', 'Rouge Hotel', '8_ruedelest_98475_AMIENS', 5, 2),
       (13, 'Calme', 'Vague Hotel', '15_ruedunord_15645_COMPIEGNE', 6, 2),
       (12, 'Chaud', 'Nuage Hotel', '7_ruedelaterre_89563_HAN', 7, 3),
       (7, 'Relax', 'Plage Hotel', '16_ruede_78945_PIERRE', 8, 3),
       (15, 'Calme', 'Montagne Hotel', '21_ruedel_32569_CAVILLON', 9, 3);

Trois chambres part hotel :

INSERT INTO chambre
VALUES (2, 'Correct', 'Nord', 'VIP', 1, 1), 
       (1, 'Bon', 'Sud', 'Celibataire', 2, 1),
       (2, 'Correct', 'Nord', 'VIP', 3, 1),
       (2, 'Correct', 'Est', 'Couple', 4, 2),
       (1, 'Bon', 'Nord', 'Celibataire', 5, 2),
       (2, 'Moyen', 'Ouest', 'Couple', 6, 2),
       (2, 'Correct', 'Nord', 'VIP', 7, 3),
       (1, 'Bon', 'Nord', 'Celibataire', 8, 3),
       (1, 'Correct', 'Sud', 'Celibataire', 9, 3),
       (2, 'Moyen', 'Nord', 'VIP', 10, 4), 
       (2, 'Moyen', 'Ouest', 'Couple', 11, 4),
       (3, 'Moyen', 'Nord', 'Famille', 12, 4),
       (2, 'Correct', 'Sud', 'Couple', 13, 5),
       (3, 'Moyen', 'Nord', 'Famille', 14, 5),
       (1, 'Correct', 'Est', 'VIP', 15, 5),
       (1, 'Bon', 'Nord', 'Celibataire', 16, 6),
       (2, 'Moyen', 'Ouest', 'Couple', 17, 6),
       (3, 'Correct', 'Est', 'VIP', 18, 6),
       (2, 'Bon', 'Nord', 'Couple', 19, 7), 
       (1, 'Moyen', 'Sud', 'Celibataire', 20, 7),
       (3, 'Correct', 'Nord', 'VIP', 21, 7),
       (4, 'Moyen', 'Ouest', 'Famille', 22, 8),
       (4, 'Moyen', 'Est', 'Famille', 23, 8),
       (2, 'Correct', 'Sud', 'VIP', 24, 8),
       (1, 'Bon', 'Ouest', 'Celibataire', 25, 9),
       (4, 'Correct', 'Sud', 'VIP', 26, 9),
       (3, 'Moyen', 'Est', 'Famille', 27, 9);