CREATE TABLE categoria (codigo integer primary key, nome varchar(20) not null, codigo_pai integer);
CREATE TABLE historico (codigo integer primary key, tabela text, antes text, depois text, data DATE);
CREATE VIEW grade_livros
AS
SELECT livros.codigo, livros.titulo, livros.autores, editora.nome, categoria.nome FROM livros, editora, categoria WHERE livros.categoria=categoria.codigo AND livros.editora=editora.codigo;
-- Usuario
CREATE TABLE usuario (codigo integer primary key, nome varchar(30) not null, login varchar(20) not null, senha varchar(120) not null,email varchar(120) not null);
CREATE TRIGGER log_delete_usuario
AFTER DELETE ON usuario
FOR EACH ROW
BEGIN
INSERT INTO historico (codigo,tabela,antes,depois,data)
VALUES((SELECT max(codigo) FROM historico)+1, "usuario", OLD.nome, "", DATETIME('NOW'));
END;
CREATE TRIGGER log_insert_usuario
AFTER INSERT ON usuario
FOR EACH ROW
BEGIN
INSERT INTO historico (codigo,tabela,antes,depois,data)
VALUES((SELECT max(codigo) FROM historico)+1, "usuario", "", NEW.nome, DATETIME('NOW'));
END;
CREATE TRIGGER log_update_usuario
AFTER UPDATE ON usuario
FOR EACH ROW
BEGIN
INSERT INTO historico (codigo,tabela,antes,depois,data)
VALUES((SELECT max(codigo) FROM historico)+1, "usuario", OLD.nome, NEW.nome, DATETIME('NOW'));
END;

-- Editora
CREATE TABLE editora (codigo integer primary key, nome varchar(60) not null);
CREATE TRIGGER log_delete_editora
AFTER DELETE ON editora
FOR EACH ROW
BEGIN
INSERT INTO historico (codigo,tabela,antes,depois,data)
VALUES((SELECT max(codigo) FROM historico)+1, "editora", OLD.nome, "", DATETIME('NOW'));
END;
CREATE TRIGGER log_insert_editora
AFTER INSERT ON editora
FOR EACH ROW
BEGIN
INSERT INTO historico (codigo,tabela,antes,depois,data)
VALUES((SELECT max(codigo) FROM historico)+1, "editora ", "", NEW.nome, DATETIME('NOW'));
END;
CREATE TRIGGER log_update_editora
AFTER UPDATE ON editora
FOR EACH ROW
BEGIN
INSERT INTO historico (codigo,tabela,antes,depois,data)
VALUES((SELECT max(codigo) FROM historico)+1, "editora", OLD.nome, NEW.nome, DATETIME('NOW'));
END;


-- Livros
CREATE TABLE livros (codigo integer primary key, titulo varchar(60) not null, autores varchar(120) not null, diretorio varchar(256), editora integer, categoria integer);
CREATE TRIGGER log_delete_livros
AFTER DELETE ON livros
FOR EACH ROW
BEGIN
INSERT INTO historico (codigo,tabela,antes,depois,data)
VALUES((SELECT max(codigo) FROM historico)+1 , "livros", OLD.titulo , "" , DATETIME('NOW'));
END;
CREATE TRIGGER log_insert_livros
AFTER INSERT ON livros
FOR EACH ROW
BEGIN
INSERT INTO historico (codigo,tabela,antes,depois,data)
VALUES((SELECT max(codigo) FROM historico)+1 , "livros", "" , NEW.titulo, DATETIME('NOW'));
END;
CREATE TRIGGER log_update_livros
AFTER UPDATE ON livros
FOR EACH ROW
BEGIN
INSERT INTO historico (codigo,tabela,antes,depois,data)
VALUES((SELECT max(codigo) FROM historico)+1 , "livros", OLD.titulo, NEW.titulo, DATETIME('NOW'));
END;
