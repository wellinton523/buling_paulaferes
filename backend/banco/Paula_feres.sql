create database Paula_feres;
use Paula_feres;

create table Relatos(
id int auto_increment primary key,
nome varchar(255),
turma varchar(10),
data datetime,
relato text not null
);

create table Usuarios(
id int auto_increment primary key,
usuario varchar(255) not null,
senha varchar(255) not null,
cpf varchar(14) not null,
telefone varchar(14),
email varchar(255),
data date
);

insert into Usuarios (usuario, senha, cpf, telefone, email, data) values ("admin", "ad123", "000.000.000.00","00 0000-0000", "...@gmail.com", NOW());
insert into Usuarios (usuario, senha, cpf, telefone, email, data) values ("weto", "welwel523", "135.798.959.82","47 9999-1129", "wellint5x@gmail.com", NOW());