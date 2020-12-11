CREATE TABLE dzial (
    id             INTEGER(2) NOT NULL,
    nazwa          VARCHAR(255 ) NOT NULL,
    zarzad_id      INTEGER(2) NOT NULL,
    kierownik_id   INTEGER(5) NOT NULL
);
 
CREATE UNIQUE INDEX dzial__idx ON
    dzial (
        kierownik_id
    ASC );
 
ALTER TABLE dzial ADD CONSTRAINT dzial_pk PRIMARY KEY ( id );
 
CREATE TABLE grupa (
    id             INTEGER(2) NOT NULL,
    nazwa          VARCHAR(255 ) NOT NULL,
    dzial_id       INTEGER(2) NOT NULL,
    kierownik_id   INTEGER(5) NOT NULL
);
 
CREATE UNIQUE INDEX grupa__idx ON
    grupa (
        kierownik_id
    ASC );
 
ALTER TABLE grupa ADD CONSTRAINT grupa_pk PRIMARY KEY ( id );
 
CREATE TABLE kompetencja (
    id      INTEGER(4) NOT NULL,
    nazwa   VARCHAR(255 ) NOT NULL
);
 
ALTER TABLE kompetencja ADD CONSTRAINT kompetencja_pk PRIMARY KEY ( id );
 
CREATE TABLE kompetencje_pracownika (
    kompetencja_id   INTEGER(4) NOT NULL,
    pracownik_id     INTEGER(5) NOT NULL
);
 
ALTER TABLE kompetencje_pracownika ADD CONSTRAINT komprac_pk PRIMARY KEY ( kompetencja_id,
                                                                           pracownik_id );
 
CREATE TABLE konto_uzytkownika (
    id                  INTEGER(5) NOT NULL,
    nazwa_uzytkownika   VARCHAR(64) NOT NULL,
    haslo               CHAR(64 ) NOT NULL
);
 
ALTER TABLE konto_uzytkownika ADD CONSTRAINT kontouzyt_pk PRIMARY KEY ( id );
 
CREATE TABLE nieobecnosci (
    id             INTEGER(7) NOT NULL,
    poczatek       DATE NOT NULL,
    koniec         DATE NOT NULL,
    pracownik_id   INTEGER(5) NOT NULL
);
 
ALTER TABLE nieobecnosci ADD CONSTRAINT nieobecnosci_pk PRIMARY KEY ( id );
 
CREATE TABLE pracownik (
    id                     INTEGER(5) NOT NULL,
    imie                   VARCHAR(64 ) NOT NULL,
    nazwisko               VARCHAR(64 ) NOT NULL,
    pracownik_id           INTEGER(5),
    pesel                  CHAR(11 ) NOT NULL,
    email                  VARCHAR(64 ) NOT NULL,
    numer_telefonu         VARCHAR(20 ) NOT NULL,
    konto_uzytkownika_id   INTEGER(5) NOT NULL
);
 
-- Error - Index Pracownik__IDX has no columns
 
ALTER TABLE pracownik ADD CONSTRAINT pracownik_pk PRIMARY KEY ( id );
 
CREATE TABLE slownik_zastepstw (
    id               INTEGER(6) NOT NULL,
    pracownik_kto    INTEGER(5) NOT NULL,
    pracownik_kogo   INTEGER(5) NOT NULL
);
 
ALTER TABLE slownik_zastepstw ADD CONSTRAINT slowzast_pk PRIMARY KEY ( id );
 
CREATE TABLE zakres_obowiazkow (
    id                 INTEGER(7) NOT NULL,
    opis_obowiazku     VARCHAR(255 ) NOT NULL,
    data_dodania       DATE NOT NULL,
    termin_wykonania   DATE NOT NULL,
    pracownik_id       INTEGER(5) NOT NULL
);
 
ALTER TABLE zakres_obowiazkow ADD CONSTRAINT zakres_obowiazkow_pk PRIMARY KEY ( id );
 
CREATE TABLE zarzad (
    id                 INTEGER(2) NOT NULL,
    nazwa_stanowiska   VARCHAR(127 ) NOT NULL,
    pracownik_id       INTEGER(5) NOT NULL
);
 
ALTER TABLE zarzad ADD CONSTRAINT zarzad_pk PRIMARY KEY ( id );
 
CREATE TABLE zastepstwo (
    id                INTEGER(8) NOT NULL,
    poczatek          DATE NOT NULL,
    koniec            DATE NOT NULL,
    nieobecnosci_id   INTEGER(7) NOT NULL,
    slowzast_id       INTEGER(6) NOT NULL
);
 
ALTER TABLE zastepstwo ADD CONSTRAINT zastepstwo_pk PRIMARY KEY ( id );
 
CREATE TABLE zespol (
    id             INTEGER(2) NOT NULL,
    nazwa          VARCHAR(255 ) NOT NULL,
    grupa_id       INTEGER(2) NOT NULL,
    kierownik_id   INTEGER(5) NOT NULL
);
 
CREATE UNIQUE INDEX zespol__idx ON
    zespol (
        kierownik_id
    ASC );
 
ALTER TABLE zespol ADD CONSTRAINT zespol_pk PRIMARY KEY ( id );
 
ALTER TABLE dzial
    ADD CONSTRAINT dzial_pracownik_fk FOREIGN KEY ( kierownik_id )
        REFERENCES pracownik ( id );
 
ALTER TABLE dzial
    ADD CONSTRAINT dzial_zarzad_fk FOREIGN KEY ( zarzad_id )
        REFERENCES zarzad ( id );
 
ALTER TABLE grupa
    ADD CONSTRAINT grupa_dzial_fk FOREIGN KEY ( dzial_id )
        REFERENCES dzial ( id );
 
ALTER TABLE grupa
    ADD CONSTRAINT grupa_pracownik_fk FOREIGN KEY ( kierownik_id )
        REFERENCES pracownik ( id );
 
ALTER TABLE kompetencje_pracownika
    ADD CONSTRAINT komprac_kompetencja_fk FOREIGN KEY ( kompetencja_id )
        REFERENCES kompetencja ( id );
 
ALTER TABLE kompetencje_pracownika
    ADD CONSTRAINT komprac_pracownik_fk FOREIGN KEY ( pracownik_id )
        REFERENCES pracownik ( id );
 
ALTER TABLE nieobecnosci
    ADD CONSTRAINT nieobecnosci_pracownik_fk FOREIGN KEY ( pracownik_id )
        REFERENCES pracownik ( id );
 
ALTER TABLE pracownik
    ADD CONSTRAINT pracownik_kontouzyt_fk FOREIGN KEY ( konto_uzytkownika_id )
        REFERENCES konto_uzytkownika ( id );
 
ALTER TABLE pracownik
    ADD CONSTRAINT pracownik_pracownik_fk FOREIGN KEY ( pracownik_id )
        REFERENCES pracownik ( id );
 
ALTER TABLE slownik_zastepstw
    ADD CONSTRAINT slowzast_pracownik_kogo_fk FOREIGN KEY ( pracownik_kogo )
        REFERENCES pracownik ( id );
 
ALTER TABLE slownik_zastepstw
    ADD CONSTRAINT slowzast_pracownik_kto_fk FOREIGN KEY ( pracownik_kto )
        REFERENCES pracownik ( id );
 
ALTER TABLE zakres_obowiazkow
    ADD CONSTRAINT zakres_obowiazkow_pracownik_fk FOREIGN KEY ( pracownik_id )
        REFERENCES pracownik ( id );
 
ALTER TABLE zarzad
    ADD CONSTRAINT zarzad_pracownik_fk FOREIGN KEY ( pracownik_id )
        REFERENCES pracownik ( id );
 
ALTER TABLE zastepstwo
    ADD CONSTRAINT zastepstwo_nieobecnosci_fk FOREIGN KEY ( nieobecnosci_id )
        REFERENCES nieobecnosci ( id );
 
ALTER TABLE zastepstwo
    ADD CONSTRAINT zastepstwo_slowzast_fk FOREIGN KEY ( slowzast_id )
        REFERENCES slownik_zastepstw ( id );
 
ALTER TABLE zespol
    ADD CONSTRAINT zespol_grupa_fk FOREIGN KEY ( grupa_id )
        REFERENCES grupa ( id );
 
ALTER TABLE zespol
    ADD CONSTRAINT zespol_pracownik_fk FOREIGN KEY ( kierownik_id )
        REFERENCES pracownik ( id );
