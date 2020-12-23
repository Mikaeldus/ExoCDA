CREATE DATABASE exercice2; USE exercice2;

CREATE TABLE station(
		sta_num INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
		sta_nom VARCHAR (30) NOT NULL
);

CREATE TABLE hotel(
		hot_capacite DECIMAL(3,0) NOT NULL,
		hot_categorie VARCHAR (30) NOT NULL,
		hot_nom VARCHAR (30) NOT NULL,
		hot_adresse VARCHAR (30) NOT NULL,
		hot_num INT NOT NULL PRIMARY KEY,
		hot_sta_num INT NOT NULL 
);

CREATE TABLE chambre(
		cham_capacite DECIMAL(1,0) NOT NULL,
		cham_confort VARCHAR (30) NOT NULL,
		cham_exposition VARCHAR (30) NOT NULL,
		cham_type VARCHAR (30) NOT NULL,
		cham_num INT NOT NULL PRIMARY KEY,
		cham_hot_num INT NOT NULL  
);

CREATE TABLE reservation(
		reser_cham_num INT NOT NULL,
		reser_cli_num INT NOT NULL,
		reser_date_debut DATE NOT NULL,
		reser_date_fin DATE NOT NULL,
		reser_date DATE NOT NULL,
		reser_montant_arrhes DECIMAL(4,2) NOT NULL,
		reser_prix_total DECIMAL(4,2) NOT NULL 
		,PRIMARY KEY (reser_cham_num,reser_cli_num)
);
CREATE TABLE Client(
		cli_adress VARCHAR (30) NOT NULL,
		cli_nom VARCHAR (30) NOT NULL,
		cli_prenom VARCHAR (30) NOT NULL,
		cli_num INT NOT NULL PRIMARY KEY
);

ALTER TABLE hotel
ADD CONSTRAINT hotel_station_FK FOREIGN KEY (hot_sta_num) REFERENCES station(sta_num);

ALTER TABLE chambre
ADD CONSTRAINT chambre_hotel_FK FOREIGN KEY (cham_hot_num) REFERENCES hotel(hot_num);

ALTER TABLE reservation
ADD CONSTRAINT reservation_chambre_FK FOREIGN KEY (reser_cham_num) REFERENCES chambre(cham_num),
ADD CONSTRAINT reservation_client_FK FOREIGN KEY (reser_cli_num) REFERENCES Client(cli_num);




 
