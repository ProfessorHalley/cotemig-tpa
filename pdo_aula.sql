create database aula_pdo;
use aula_pdo;

-- Crie a tabela "usuarios"
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);

ALTER TABLE usuarios
ADD senha_hash VARCHAR(255) NOT NULL;