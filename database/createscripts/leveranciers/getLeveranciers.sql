USE opdracht_3;

DROP PROCEDURE IF EXISTS GetLeveranciers;

DELIMITER $$

CREATE PROCEDURE GetLeveranciers()

BEGIN

    SELECT 
        l.Id,
        l.Naam,
        l.ContactPersoon,
        l.LeverancierNummer,
        l.Mobiel
    FROM Leverancier l;

END $$

DELIMITER ;


