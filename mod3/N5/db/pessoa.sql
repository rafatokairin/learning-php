CREATE TABLE pessoa (
    id         integer PRIMARY KEY,
    nome       varchar(100),
    endereco   varchar(150),
    bairro     varchar(50),
    telefone   varchar(20),
    email      varchar(50),
    id_cidade  integer
);