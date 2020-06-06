create database pag_cripto;
create table usuario(
IDlogin int auto_increment not null primary key,
nome varchar(25) not null,
senha varchar(25) not null
);

use pag_cripto;
insert into usuario (nome, senha)
values
('cristalino', 'lucaxsh'),
('abner', 'motaro');

select * from usuario;