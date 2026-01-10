DROP PROCEDURE IF EXISTS sp_UpdateLeverancier;

DELIMITER $$

CREATE PROCEDURE sp_UpdateLeverancier(
    IN p_id INT
        ,IN p_naam VARCHAR(255)
        ,IN p_contactpersoon VARCHAR(100)
        ,IN p_leveranciernummer VARCHAR(20)
        ,IN p_mobiel VARCHAR(20)
        ,IN p_contactId INT
        ,IN p_straat VARCHAR(255)
        ,IN p_huisnummer VARCHAR(10)
        ,IN p_postcode VARCHAR(10)
        ,IN p_stad VARCHAR(100)
)
BEGIN

    -- Update Leverancier tabel
    UPDATE Leverancier L
    INNER JOIN Contact C ON L.ContactId = C.Id
       SET 
          L.Naam = p_naam,
          L.ContactPersoon = p_contactpersoon,
          L.LeverancierNummer = p_leveranciernummer,
          L.Mobiel = p_mobiel,
          L.ContactId = p_contactId,
          L.DatumGewijzigd = SYSDATE(6) 
       WHERE L.Id = p_id;
      SELECT ROW_COUNT() as affected;


    -- Update Contact tabel
    UPDATE Contact C
       SET C.Straat = p_straat,
          C.Huisnummer = p_huisnummer,
          C.Postcode = p_postcode,
          C.Stad = p_stad
       WHERE C.Id = p_contactId;

    SELECT ROW_COUNT() as affected;

END$$

DELIMITER ;