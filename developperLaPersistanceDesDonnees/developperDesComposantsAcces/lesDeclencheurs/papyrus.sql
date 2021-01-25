-- Créer un déclencheur UPDATE sur la table produit : lorsque le stock physique devient inférieur ou égal au stock d'alerte, une nouvelle ligne est insérée dans la table ARTICLES_A_COMMANDER.
CREATE DEFINER=`root`@`localhost` TRIGGER `update_prod` AFTER UPDATE ON `produit` FOR EACH ROW BEGIN 
    DECLARE _stkale INT;
    DECLARE _stkphy INT;
    DECLARE _codart char(4);
    
    DECLARE dja_com INT;
    DECLARE _qte INT;
        
    SET _stkale = NEW.stkale;
    SET _stkphy = NEW.stkphy;
    SET _codart = NEW.codart;
    SET dja_com = (SELECT sum(qte) FROM articles_a_commander WHERE codart = _codart);
            
    IF dja_com IS NOT NULL  
    THEN
       
		 UPDATE articles_a_commander SET qte = _qte WHERE codart = _codart; 
	 ELSE
       
       SET _qte = _stkale-_stkphy;
    
          /* dja_com vaut NULL, on ne peut pas faire de calcul dessus */ 
		INSERT INTO articles_a_commander(codart, dat, qte)
       VALUES (_codart, NOW(), _qte);    
    END IF;
	  
END

