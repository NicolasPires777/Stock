# Como criar banco de dados para rodar a aplicação:
Cole o seguinte comando no PHPmyadmin:
CREATE DATABASE stock;

USE stock;

CREATE TABLE usuarios (
   id integer NOT NULL,
   nome CHAR(20) NOT NULL,
   senha CHAR(20) NOT NULL
);

CREATE TABLE itens (
   item CHAR(20) NOT NULL,
   marca CHAR(20) NOT NULL,
   quant FLOAT NOT NULL,
   modelo CHAR(20) NOT NULL,
   format CHAR(20) NOT NULL,
   id integer NOT NULL,
   setor CHAR(50) NOT NULL,
   FOREIGN KEY (id) REFERENCES usuarios(id)
);
