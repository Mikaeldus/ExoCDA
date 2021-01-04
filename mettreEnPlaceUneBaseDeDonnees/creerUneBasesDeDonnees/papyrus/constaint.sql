-- je fais la junction entre la table ligcom avec les champs codart et numcom, avec les tables produit et entcom.
ALTER TABLE ligcom
ADD CONSTRAINT ligcom_produit_FK FOREIGN KEY (codart) REFERENCES produit(codart),
ADD CONSTRAINT ligcom_entcom_FK FOREIGN KEY (numcom) REFERENCES entcom(numcom);

-- je fais la junction entre la table vente avec les champs codart et numfou, avec les tables produits et fournis.
ALTER TABLE vente
ADD CONSTRAINT vente_produit_FK FOREIGN KEY (codart) REFERENCES produit(codart),
ADD CONSTRAINT vente_fournis_FK FOREIGN KEY (numfou) REFERENCES fournis(numfou);

-- je fais la junction entre la table entcom et la table fournis avec le champ numfou.
ALTER TABLE entcom
ADD CONSTRAINT entcom_founis_FK FOREIGN KEY (numfou) REFERENCES fournis(numfou);