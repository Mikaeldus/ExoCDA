CREATE DATABASE papyrus; USE papyrus;

CREATE TABLE vente(
    codart CHAR(4) NOT NULL,
    numfou TINYINT NOT NULL,
    delliv SMALLINT NOT NULL,
    qte1 INT NOT NULL,
    prix1 DECIMAL(9,2) NOT NULL,
    qte2 INT,
    prix2 DECIMAL(9,2),
    qte3 INT,
    prix3 DECIMAL(9,2)
    , PRIMARY KEY (codart,numfou)
);

CREATE TABLE produit(
    codart CHAR(4) NOT NULL PRIMARY KEY,
    libart VARCHAR(30) NOT NULL,
    stkale INT NOT NULL,
    stkphy INT NOT NULL,
    qteann INT NOT NULL,
    unimes CHAR(5) NOT NULL
);

CREATE TABLE fournis(
    numfou TINYINT NOT NULL PRIMARY KEY,
    nomfou VARCHAR(25) NOT NULL,
    ruefou VARCHAR(50) NOT NULL,
    posfou CHAR(5) NOT NULL,
    vilfou VARCHAR(30) NOT NULL,
    confou VARCHAR(15) NOT NULL,
    satisf TINYINT(10)
);

CREATE TABLE ligcom(
    numcom INT NOT NULL,
    numlig TINYINT NOT NULL,
    codart CHAR(4) NOT NULL,
    qtecde INT NOT NULL,
    priuni DECIMAL(9,2) NOT NULL,
    qteliv INT,
    derliv DATETIME NOT NULL
    , PRIMARY KEY (numcom, numlig)
);

CREATE TABLE entcom(
    numcom INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    obscom VARCHAR(50),
    datcom DATETIME NOT NULL,
    numfou TINYINT
);

ALTER TABLE ligcom
ADD CONSTRAINT ligcom_produit_FK FOREIGN KEY (codart) REFERENCES produit(codart),
ADD CONSTRAINT ligcom_entcom_FK FOREIGN KEY (numcom) REFERENCES entcom(numcom);

ALTER TABLE vente
ADD CONSTRAINT vente_produit_FK FOREIGN KEY (codart) REFERENCES produit(codart),
ADD CONSTRAINT vente_fournis_FK FOREIGN KEY (numfou) REFERENCES fournis(numfou);

ALTER TABLE entcom
ADD CONSTRAINT entcom_founis_FK FOREIGN KEY (numfou) REFERENCES fournis(numfou);

CREATE INDEX newnumfou ON entcom (numfou);