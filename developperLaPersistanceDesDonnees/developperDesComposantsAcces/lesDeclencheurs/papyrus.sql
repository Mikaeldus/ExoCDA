-- Créer un déclencheur UPDATE sur la table produit : lorsque le stock physique devient inférieur ou égal au stock d'alerte, une nouvelle ligne est insérée dans la table ARTICLES_A_COMMANDER.
CREATE DEFINER=`root`@`localhost` TRIGGER `produit_article` BEFORE UPDATE ON `produit` FOR EACH ROW BEGIN
    	  DECLARE cod INT;
    	  DECLARE nb INT;
    	  DECLARE stkale INT;
    	  DECLARE stkphy INT;
    	  SET stkale = NEW.stkale;
    	  SET stkphy = NEW.stkphy;
		  SET cod = NEW.codart;
		  SET nb = (SELECT SUM(stkale - stkphy) FROM produit WHERE produit.codart = NEW.articles_a_commander.codart);
        if(stkale > stkphy) then 
        UPDATE articles_a_commander 
		  SET codart = cod, QTE = nb
		  WHERE produit.codart = NEW.articles_a_commander.codart;
		  END if;
		  
END

-- a revoir 