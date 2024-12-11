create database filmedb;
use filmedb;

create table filme(
	id int auto_increment primary key,
    nome varchar(200) not null,
    ano int not null,
    descricao text,
    url text
);