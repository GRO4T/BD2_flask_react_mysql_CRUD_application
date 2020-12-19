
CREATE OR REPLACE TRIGGER insert_nieobecnosc
BEFORE INSERT ON nieobecnosci FOR EACH ROW
BEGIN
	DECLARE is_overlapping_absence INT;
    
	IF NEW.poczatek > NEW.koniec THEN 
		SIGNAL SQLSTATE '45000' set MESSAGE_TEXT = 'poczatek should be earlier than koniec'; 
    END IF;
	
    SET @is_overlapping_absence = (SELECT COUNT(*) FROM nieobecnosci WHERE pracownik_id = NEW.pracownik_id AND koniec < NEW.poczatek);
    IF @is_overlapping_absence > 0 THEN
    	SIGNAL SQLSTATE '45000' set MESSAGE_TEXT = 'Cannot add absence for somebody who is already absent at the time';
    END IF;
END;

CREATE OR REPLACE TRIGGER insert_zastepstwo
BEFORE INSERT ON zastepstwo FOR EACH ROW
BEGIN
    IF NEW.poczatek > NEW.koniec THEN
        SIGNAL SQLSTATE '45000' set MESSAGE_TEXT = 'Oj nie byczq';
    END IF;
END;

CREATE OR REPLACE TRIGGER insert_zakres_obowiazkow
BEFORE INSERT ON zakres_obowiazkow FOR EACH ROW
BEGIN
    IF NEW.data_dodania > NEW.termin_wykonania THEN
        SIGNAL SQLSTATE '45000' set MESSAGE_TEXT = 'Oj nie byczq';
    END IF;
END;

CREATE TRIGGER new_password_different
BEFORE UPDATE ON konto_uzytkownika
FOR EACH ROW
BEGIN
    IF NEW.haslo = OLD.haslo
    THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: New password is identical to an old one!';
    END IF;
END;

CREATE OR REPLACE TRIGGER insert_zarzad
BEFORE INSERT ON zarzad FOR EACH ROW 
BEGIN
	DECLARE has_superior INT;
   	SET @has_superior = (SELECT COUNT(*) FROM pracownik WHERE pracownik.id = NEW.pracownik_id AND pracownik.pracownik_id IS NOT NULL);
   	IF @has_superior > 0 THEN
    	SIGNAL SQLSTATE '45000' set MESSAGE_TEXT = 'Error: Management member cannot have a superior';
    END IF;
END;
