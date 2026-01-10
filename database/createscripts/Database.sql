USE opdracht_3;

DROP TABLE IF EXISTS Leverancier;
DROP TABLE IF EXISTS Contact;


CREATE TABLE Contact (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Straat VARCHAR(255) NOT NULL,
    Huisnummer VARCHAR(10) NOT NULL,
    Postcode VARCHAR(10) NOT NULL,
    Stad VARCHAR(100) NOT NULL,
    IsActief BIT NOT NULL DEFAULT 1,
    Opmerking VARCHAR(255) NULL,
    DatumAangemaakt DATETIME(6) NOT NULL DEFAULT SYSDATE(6),
    DatumGewijzigd DATETIME(6) NOT NULL DEFAULT SYSDATE(6)
);

INSERT INTO Contact (Straat, Huisnummer, Postcode, Stad, IsActief, Opmerking, DatumAangemaakt, DatumGewijzigd) VALUES
('Van Gilslaan', '34', '1045CB', 'Hilvarenbeek', 1, NULL, SYSDATE(6), SYSDATE(6)),
('Den Dolderpad', '2', '1067RC', 'Utrecht', 1, NULL, SYSDATE(6), SYSDATE(6)),
('Fredo Raalteweg', '257', '1236OP', 'Nijmegen', 1, NULL, SYSDATE(6), SYSDATE(6)),
('Bertrand Russellhof', '21', '2034AP', 'Den Haag', 1, NULL, SYSDATE(6), SYSDATE(6)),
('Leon van Bonstraat', '213', '145XC', 'Lunteren', 1, NULL, SYSDATE(6), SYSDATE(6)),
('Bea van Lingenlaan', '234', '2197FG', 'Sint Pancras', 1, NULL, SYSDATE(6), SYSDATE(6));

CREATE TABLE Leverancier (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Naam VARCHAR(255) NOT NULL,
    ContactPersoon VARCHAR(100) NOT NULL,
    LeverancierNummer VARCHAR(20) NOT NULL,
    Mobiel VARCHAR(20) NOT NULL,
    ContactId INT NOT NULL,
    IsActief BIT NOT NULL DEFAULT 1,
    Opmerking VARCHAR(255) NULL,
    DatumAangemaakt DATETIME(6) NOT NULL DEFAULT SYSDATE(6),
    DatumGewijzigd DATETIME(6) NOT NULL DEFAULT SYSDATE(6),
    FOREIGN KEY (ContactId) REFERENCES Contact(Id)
);

INSERT INTO Leverancier (Naam, ContactPersoon, LeverancierNummer, Mobiel, ContactId, IsActief, Opmerking, DatumAangemaakt, DatumGewijzigd) VALUES
('Venco', 'Bert van Linge', 'L1029384719', '06-28493827', 1, 1, NULL, SYSDATE(6), SYSDATE(6)),
('Astra Sweets', 'Jasper del Monte', 'L1029284315', '06-39398734', 2, 1, NULL, SYSDATE(6), SYSDATE(6)),
('Haribo', 'Sven Stalman', 'L1029324748', '06-24383291', 3, 1, NULL, SYSDATE(6), SYSDATE(6)),
('Basset', 'Joyce Stelterberg', 'L1023845773', '06-48293823', 4, 1, NULL, SYSDATE(6), SYSDATE(6)),
('De Bron', 'Remco Veenstra', 'L1023857736', '06-34291234', 5, 0, NULL, SYSDATE(6), SYSDATE(6)),
('Quality Street', 'Johan Nooij', 'L1029234586', '06-23458456', 6, 1, NULL, SYSDATE(6), SYSDATE(6));