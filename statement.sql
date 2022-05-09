CREATE DATABASE hotelterduin;

USE hotelterduin;

CREATE TABLE medewerkers (
    medewerker_id int NOT NULL AUTO_INCREMENT,
    medewerker_user varchar(255) NOT NULL,
    medewerker_pwd varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    PRIMARY KEY(medewerker_id)
);

CREATE TABLE klanten (
    klant_id int NOT NULL AUTO_INCREMENT,
    r_periode_in date NOT NULL,
    r_periode_out date NOT NULL,
    naam varchar(255) NOT NULL,
    adres varchar(255) NOT NULL,
    plaats varchar(255) NOT NULL,
    postcode varchar(255) NOT NULL,
    telefoon varchar(255) NOT NULL,
    PRIMARY KEY(klant_id)
);

CREATE TABLE reservatie (
    r_id int NOT NULL AUTO_INCREMENT,
    kamer_id int NOT NULL,
    PRIMARY KEY(r_id),
    FOREIGN KEY(kamer_id) REFERENCES klanten(klant_id)
);
    