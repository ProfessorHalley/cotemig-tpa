create database bd_escola;
use bd_escola;
-- Tabela Turma
CREATE TABLE Turma (
    IdTurma INT PRIMARY KEY auto_increment,
    descricao VARCHAR(255)
);
-- describe Turma;
INSERT into Turma (IdTurma, descricao) 
values
(default, '1A'),
(default, '1B'),
(default, '1C'),
(default, '2A'),
(default, '2B'),
(default, '2C'),
(default, '3A'),
(default, '3B'),
(default, '3C');
Select * from Turma;
-- Tabela Aluno
CREATE TABLE Aluno (
    id INT PRIMARY KEY ,
    nomeAluno VARCHAR(255),
    matricula VARCHAR(50),
    endereco VARCHAR(255),
    idTurmaAluno INT,
    FOREIGN KEY (idTurmaAluno) REFERENCES Turma(IdTurma)
);
-- Inserção de dados na tabela Aluno

INSERT INTO Aluno (id, nomeAluno, matricula, endereco, idTurmaAluno)
VALUES
    (1, 'João Silva', '12345', 'Rua A, 123', 1),
    (2, 'Maria Santos', '67890', 'Avenida B, 456', 2),
    (3, 'Pedro Souza', '54321', 'Praça C, 789', 1),
    (4, 'Ana Oliveira', '98765', 'Rua D, 321', 3),
    (5, 'Carlos Ferreira', '13579', 'Rua E, 987', 2),
    (6, 'Isabela Rodrigues', '24680', 'Avenida F, 654', 1),
    (7, 'Rafaela Lima', '98765', 'Praça G, 321', ''),
    (8, 'Lucas Martins', '56789', 'Rua H, 123', 2),
    (9, 'Mateus Almeida', '43210', 'Avenida I, 456', ''),
    (10, 'Lívia Santos', '78901', 'Praça J, 789', 3),
    (11, 'Fernanda Oliveira', '23456', 'Rua K, 987', 2),
    (12, 'Gustavo Pereira', '54321', 'Avenida L, 654', 1),
    (13, 'Juliana Souza', '87654', 'Praça M, 321', 3);
Select * from Aluno;
Select * from Turma;
Select * from Aluno inner join Turma;
Select * from Aluno inner join Turma on aluno.idTurmaALuno = Turma.idTurma order by idTurmaAluno;
Select * from Aluno left outer join Turma on aluno.idTurmaALuno = Turma.idTurma order by idTurmaAluno;
Select * from Aluno right outer join Turma on aluno.idTurmaALuno = Turma.idTurma order by idTurmaAluno;
