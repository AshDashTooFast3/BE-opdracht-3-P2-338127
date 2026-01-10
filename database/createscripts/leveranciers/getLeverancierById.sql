USE opdracht_3;

DROP PROCEDURE IF EXISTS GetLeverancierById;

DELIMITER $$

CREATE PROCEDURE GetLeverancierById(
    IN leverancierId INT
)

BEGIN

    SELECT 
        l.Id,
        l.Naam,
        l.ContactPersoon,
        l.LeverancierNummer,
        l.Mobiel,
        l.ContactId,
        c.Straat,
        c.Huisnummer,
        c.Postcode,
        c.Stad
    FROM Leverancier l
    JOIN Contact c ON l.ContactId = c.Id
    WHERE l.Id = leverancierId;

END $$

DELIMITER ;