create database ressencementmafana;

CREATE  TABLE utilisateur (
	id                   serial NOT NULL  ,
	nom                  varchar(50)    ,
	email                varchar(50)    ,
	passe                varchar(50)    ,
	statut               integer  default 0,
	CONSTRAINT pk_utilisateur PRIMARY KEY ( id )
 );
create table genre
(
    id serial not null primary key,
    nom varchar(10)
);

create table personne
(
    id serial not null primary key,
    nom varchar(100),
    prenom varchar(100),
    idGenre smallint,
    dateNaissance date,
    foreign key(idGenre) references genre(id)
);
create table Vallee
(
    id serial not null primary key,
    nom varchar(50)
);

create table tranobe
(
    id serial not null primary key,
    nom varchar(100),
    idVallee smallint,
    foreign key(idVallee) references Vallee(id)
);
create table region
(
    id serial not null primary key,
    nom varchar(100)
);
create table domicile
(
    id serial not null primary key,
    nom varchar(100),
    idRegion integer,
    foreign key(idRegion) references region(id)
);
create table profession
(
    id serial not null primary key,
    nom varchar(100),
    nivVulnerabilite smallint
);

create table pereFamille
(
    id serial not null primary key,
    idpersonne integer,
    dateAdmission date,
    idDomicile integer,
    idProfession integer,
    idTranobe integer,
    foreign key(idPersonne) references personne(id),
    foreign key(idDomicile) references domicile(id),
    foreign key(idProfession) references profession(id),
    foreign key(idTranobe) references tranobe(id)
);
create table charge
(
    id serial not null primary key,
    idPereFamille integer,
    idPersonne integer,
    statut integer default 0,
    foreign key(idPereFamille) references pereFamille(id),
    foreign key(idPersonne) references personne(id)
);
create table cotisation
(
    id serial not null primary key,
    idPereFamille integer,
    dateCotisation date,
    valeur decimal,
    foreign key(idPereFamille) references pereFamille(id)
);
create table categorieDon
(
    id serial not null primary key,
    nom varchar(50)
);
create table Don
(
    id serial not null primary key,
    nom varchar(100),
    idCategDon integer,
    nivVulnerabilite smallint,
    minage smallint,
    maxage smallint,
    foreign key(idCategDon) references categorieDon(id)
);
create table distributionDon
(
    id serial not null primary key,
    idPereFamille integer,
    idDon integer,
    dateDistribution date,
    foreign key(idPereFamille) references pereFamille(id),
    foreign key(idDon) references Don(id)
);
---------------------------vues----------------------
--reunion tranobe et vallee
create or replace view  vwvalleetranobee  as
select a.*,b.nom nomvallee
from tranobe a join vallee b on
a.idVallee=b.id;

---vue permettant d'avoir les informations consernant le pere de famille
create or replace view vwaffperefamille as
select a.*,b.nom,b.prenom,c.nom nomdomicile,d.nom nomprofession,e.nom nomtranobe,e.nomvallee
from pereFamille a join personne b on a.idpersonne=b.id
join domicile c on a.idDomicile=c.id
join profession d on a.idProfession=d.id
join vwvalleetranobe e on a.idtranobe=e.id;


--vue permettant de joindre perefamille et son information
create or replace view vwperefamillepersonne as
select a.*,b.nom,b.prenom
from pereFamille a join personne b on  a.idpersonne=b.id


--vue personne
create or replace view vwaffpersonne as
select a.*,b.nom genre
from personne a join genre b on a.idGenre=b.id;

--les potentiels charges(ni un parrain, ni pararainé par d'autre personne)

--les personnes qui sont deja pere de famille;
create or replace view vwpersonneperefamillecharge as
select a.*,b.id idPereFamille,c.idpersonne idfilleul
from personne a left join vwperefamillepersonne b
on a.id=b.idpersonne
left join charge c on a.id=c.idpersonne;

-- les personnes qui sont ni charge ni parrain
create or replace view vwpotentielfilleul as
select  id,nom,prenom,idgenre,datenaissance
from vwpersonneperefamillecharge where idPereFamille is null and idfilleul is null;

-- les personnes qui sont pas  parrain
create or replace view vwpotentielparrain as
select  id,nom,prenom,idgenre,datenaissance
from vwpersonneperefamillecharge where idPereFamille is null ;


--les veritables charges d'une personne
create or replace view chargejoinperefamille as
select a.*,b.idpersonne idpersonnePere
from charge a left join vwperefamillepersonne b
on a.idpersonne=b.idpersonne;

--les veritables charges d'une personne
create or replace view vwchargereel as
select id,idperefamille,idpersonne,statut
from chargejoinperefamille where idpersonnePere is null;

--vue permettant de savoir le pere de famille avec son filleul
create or replace view vwcharge as
select a.*,b.nom nomparain,b.prenom prenomparain,c.nom nomcharge,c.prenom prenomcharge
from vwchargereel a join vwperefamillepersonne b on a.idPereFamille=b.id
join personne c on a.idpersonne=c.id;
