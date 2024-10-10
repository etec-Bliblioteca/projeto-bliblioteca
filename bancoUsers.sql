create database users;
use users;

create table users(
	iduser int primary key auto_increment,
    rm int not null,
    turma varchar(80) not null,
    nome varchar(80) not null,
    email varchar(80) not null,
    telefone int not null,
    senha varchar(80) not null,
    estado varchar(80) not null
);


