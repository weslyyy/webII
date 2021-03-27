CREATE DATABASE bd_loren;

USE bd_loren;

CREATE TABLE usuario (
	id_usuario int(8) AUTO_INCREMENT NOT NULL,
	nome varchar(100) NOT NULL,
	cpf varchar(11) NOT NULL,
	email varchar(100),
	senha varchar(32) NOT NULL,
	telefone varchar(11),
	nascimento date NOT NULL,
	CONSTRAINT pk_usuario PRIMARY KEY(id_usuario),
	CONSTRAINT uk_cpf UNIQUE KEY(cpf),
	CONSTRAINT uk_email UNIQUE KEY(email)
);


CREATE TABLE produto (
	id_produto int(8) AUTO_INCREMENT NOT NULL,
	nome varchar(100) NOT NULL,
	descricao text,
	valor double,
	quantidade int,
	tipo varchar(100),
	CONSTRAINT pk_produto PRIMARY KEY(id_produto)
);
