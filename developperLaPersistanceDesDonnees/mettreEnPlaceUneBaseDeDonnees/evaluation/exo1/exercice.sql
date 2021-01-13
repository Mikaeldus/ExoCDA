CREATE DATABASE evaluation; USE evaluation;

CREATE TABLE est_compose(
	 com_num INT NOT NULL,
    pro_num INT NOT NULL,
    est_qte INT NOT NULL
    , PRIMARY KEY (com_num,pro_num)
);

CREATE TABLE produit(
    pro_num INT NOT NULL PRIMARY KEY,
    pro_libelle VARCHAR(50) NOT NULL,
    pro_description VARCHAR(50) NOT NULL
);

CREATE TABLE commande(
    com_num INT NOT NULL PRIMARY KEY,
    cli_num INT NOT NULL,
    com_date DATETIME,
    com_obs VARCHAR(50)
);

CREATE TABLE client(
    cli_num INT NOT NULL PRIMARY KEY,
    cli_nom VARCHAR(50) NOT NULL,
    cli_adresse VARCHAR(50) NOT NULL,
    cli_tel VARCHAR(30) NOT NULL
);

ALTER TABLE est_compose
ADD CONSTRAINT est_compose_commande_FK FOREIGN KEY (com_num) REFERENCES commande(com_num),
ADD CONSTRAINT est_compose_produit_FK FOREIGN KEY (pro_num) REFERENCES produit(pro_num);

ALTER TABLE commande
ADD CONSTRAINT commande_client_FK FOREIGN KEY (cli_num) REFERENCES client(cli_num);


CREATE INDEX first_cli_nom ON client (cli_nom);