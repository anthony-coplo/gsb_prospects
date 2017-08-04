#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Prospect
#------------------------------------------------------------

CREATE TABLE Prospect(
        id_Praticien Int NOT NULL ,
        id_Etat Int NOT NULL ,
        PRIMARY KEY (id_Praticien )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Etat
#------------------------------------------------------------

CREATE TABLE Etat(
        id  int (11) Auto_increment  NOT NULL ,
        nom Varchar (25) NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Praticien
#------------------------------------------------------------

CREATE TABLE Praticien(
        id       int (11) Auto_increment  NOT NULL ,
        nom      Varchar (25) NOT NULL ,
        prenom   Varchar (25) NOT NULL ,
        adresse  Varchar (255) NOT NULL ,
        id_Ville Int NOT NULL ,
        code_Type_Praticien Varchar (6) NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Type_Praticien
#------------------------------------------------------------

CREATE TABLE Type_Praticien(
        code    Varchar (6) NOT NULL ,
        libelle Varchar (50) NOT NULL ,
        lieu    Varchar (70) NOT NULL ,
        PRIMARY KEY (code )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Ville
#------------------------------------------------------------

CREATE TABLE Ville(
        id          int (11) Auto_increment  NOT NULL ,
        nom         Varchar (45) NOT NULL ,
        code_postal Varchar (255) NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Client
#------------------------------------------------------------

CREATE TABLE Client(
        id_Praticien Int NOT NULL ,
        PRIMARY KEY (id_Praticien )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Prestation
#------------------------------------------------------------

CREATE TABLE Prestation(
        id  int (11) Auto_increment  NOT NULL ,
        nom Varchar (25) NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: interesser
#------------------------------------------------------------

CREATE TABLE interesser(
        id_Prestation Int NOT NULL ,
        id_Client Int NOT NULL ,
        PRIMARY KEY (id_Prestation ,id_Client )
)ENGINE=InnoDB;

ALTER TABLE Prospect ADD CONSTRAINT FK_Prospect_id_Praticien FOREIGN KEY (id_Praticien) REFERENCES Praticien(id);
ALTER TABLE Prospect ADD CONSTRAINT FK_Prospect_id_Etat FOREIGN KEY (id_Etat) REFERENCES Etat(id);
ALTER TABLE Praticien ADD CONSTRAINT FK_Praticien_id_Ville FOREIGN KEY (id_Ville) REFERENCES Ville(id);
ALTER TABLE Praticien ADD CONSTRAINT FK_Praticien_code_Type_Praticien FOREIGN KEY (code_Type_Praticien) REFERENCES Type_Praticien(code);
ALTER TABLE Client ADD CONSTRAINT FK_Client_id_Praticien FOREIGN KEY (id_Praticien) REFERENCES Praticien(id);
ALTER TABLE interesser ADD CONSTRAINT FK_interesser_id_Prestation FOREIGN KEY (id_Prestation) REFERENCES Prestation(id);
ALTER TABLE interesser ADD CONSTRAINT FK_interesser_id_Client FOREIGN KEY (id_Client) REFERENCES Client(id);
