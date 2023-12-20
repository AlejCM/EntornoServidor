create schema db_loginusuarios;
use db_login;

create table usuarios (
	usuario varchar(20) primary key,
    contrasena varchar(255) not null
);
select * from usuarios;