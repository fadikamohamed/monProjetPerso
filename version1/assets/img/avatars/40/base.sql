#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: gt1m_genders
#------------------------------------------------------------

CREATE TABLE gt1m_genders(
        id     Int  Auto_increment  NOT NULL ,
        gender Varchar (80) NOT NULL
	,CONSTRAINT gt1m_genders_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: gt1m_users
#------------------------------------------------------------

CREATE TABLE gt1m_users(
        id               Int  Auto_increment  NOT NULL ,
        Login            Varchar (25) NOT NULL ,
        birthdate        Date NOT NULL ,
        mail             Varchar (80) NOT NULL ,
        password         Varchar (80) NOT NULL ,
        registrationDate Date NOT NULL ,
        lastConnection   Datetime NOT NULL ,
        id_gt1m_genders  Int NOT NULL
	,CONSTRAINT gt1m_users_PK PRIMARY KEY (id)

	,CONSTRAINT gt1m_users_gt1m_genders_FK FOREIGN KEY (id_gt1m_genders) REFERENCES gt1m_genders(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: gt1m_scantrad_teams
#------------------------------------------------------------

CREATE TABLE gt1m_scantrad_teams(
        id    Int NOT NULL ,
        teams Varchar (80) NOT NULL COMMENT "Lecteur - Scantradeur - moderateur - administrateur" 
	,CONSTRAINT gt1m_scantrad_teams_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: gt1m_manga_types
#------------------------------------------------------------

CREATE TABLE gt1m_manga_types(
        id    Int NOT NULL ,
        types Varchar (80) NOT NULL
	,CONSTRAINT gt1m_manga_types_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: gt1m_kinds
#------------------------------------------------------------

CREATE TABLE gt1m_kinds(
        id    Int NOT NULL ,
        kinds Varchar (80) NOT NULL
	,CONSTRAINT gt1m_kinds_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: gt1m_subgenus
#------------------------------------------------------------

CREATE TABLE gt1m_subgenus(
        id       Int NOT NULL ,
        subgenus Varchar (80) NOT NULL
	,CONSTRAINT gt1m_subgenus_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: gt1m_authors
#------------------------------------------------------------

CREATE TABLE gt1m_authors(
        id        Int  Auto_increment  NOT NULL ,
        lastname  Varchar (80) NOT NULL ,
        firstname Varchar (80) NOT NULL ,
        birthdate Date NOT NULL
	,CONSTRAINT gt1m_authors_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: gt1m_editors
#------------------------------------------------------------

CREATE TABLE gt1m_editors(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (80) NOT NULL
	,CONSTRAINT gt1m_editors_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: gt1m_countrys
#------------------------------------------------------------

CREATE TABLE gt1m_countrys(
        id      Int  Auto_increment  NOT NULL ,
        country Varchar (80) NOT NULL
	,CONSTRAINT gt1m_countrys_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: gt1m_edition_status
#------------------------------------------------------------

CREATE TABLE gt1m_edition_status(
        id     Int  Auto_increment  NOT NULL ,
        status Varchar (80) NOT NULL
	,CONSTRAINT gt1m_edition_status_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: gt1m_mangas
#------------------------------------------------------------

CREATE TABLE gt1m_mangas(
        id                     Int  Auto_increment  NOT NULL ,
        title                  Varchar (150) NOT NULL ,
        synopsis               Text NOT NULL ,
        creationDate           Date NOT NULL ,
        id_gt1m_manga_types    Int NOT NULL ,
        id_gt1m_edition_status Int NOT NULL
	,CONSTRAINT gt1m_mangas_PK PRIMARY KEY (id)

	,CONSTRAINT gt1m_mangas_gt1m_manga_types_FK FOREIGN KEY (id_gt1m_manga_types) REFERENCES gt1m_manga_types(id)
	,CONSTRAINT gt1m_mangas_gt1m_edition_status0_FK FOREIGN KEY (id_gt1m_edition_status) REFERENCES gt1m_edition_status(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: gt1m_chapters
#------------------------------------------------------------

CREATE TABLE gt1m_chapters(
        id            Int  Auto_increment  NOT NULL ,
        chapterNumber Int NOT NULL
	,CONSTRAINT gt1m_chapters_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: of
#------------------------------------------------------------

CREATE TABLE of(
        id            Int NOT NULL ,
        id_gt1m_users Int NOT NULL




	=======================================================================
	   Désolé, il faut activer cette version pour voir la suite du script ! 
	=======================================================================
