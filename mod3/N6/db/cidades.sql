CREATE TABLE cidade (
    id         serial PRIMARY KEY,
    nome       varchar(50)
);

INSERT INTO cidade (nome) VALUES
('Porto Alegre'),
('São Paulo'),
('Rio de Janeiro'),
('Curitiba'),
('Salvador');