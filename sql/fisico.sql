-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.



CREATE TABLE cargo (
id_cargo int(2) auto_increment PRIMARY KEY,
nome_cargo varchar(40) unique not null,
observacao varchar(100),
status bit not null,
data_cadastro datetime not null
)

CREATE TABLE funcionario (
id_funcionario int(4) auto_increment PRIMARY KEY,
rg varchar(12),
cpf char(14) unique not null,
sexo char(1),
nome varchar(60),
data_nasc date not null,
nome_social varchar(60),
foto varchar(40),
telef_celular char(14),
telef_residen char(13),
status bit not null,
email varchar(50),
usuario varchar(20) unique not null,
senha char(8),
tipo_acesso bit not null,
numero int(4),
complemento varchar(40),
bairro varchar(30),
cidade varchar(40),
estado char(2),
cep char(9),
data_cadastro datetime not null,
id_cargo int(2),
FOREIGN KEY(id_cargo) REFERENCES cargo (id_cargo)
)

CREATE TABLE cliente (
id_cliente int(3) auto_increment PRIMARY KEY,
cep char(9),
rua varchar(70),
bairro varchar(30),
cidade varchar(40),
estado char(2),
numero int(4),
nome varchar(60),
data_nasc date not null,
status bit not null,
sexo char(1),
senha char(8),
email varchar(50),
nome_social varchar(50),
tel_residen char(13),
tel_cell char(14),
data_cadastro datetime not null,
estado_civil varchar(20),
endereco varchar(70)
)

CREATE TABLE categoria (
id_categoria int(3) PRIMARY KEY,
nome_categoria varchar(40),
status bit,
data_cadastro datetime,
descricao varchar(100)
)

CREATE TABLE marca (
id_marca int(3) PRIMARY KEY,
nome_marca varchar(40),
status bit,
data_cadastro datetime,
descricao varchar(100)
)

CREATE TABLE produto (
id_produto int(3) PRIMARY KEY,
descricao varchar(100),
nome varchar(40),
preco_venda decimal(7,2),
foto varchar(40),
preco_promocao decimal(7,2),
estoque int(3),
status bit,
preco_custo decimal(7,2),
preco_lucro decimal(7,2),
status_promocao bit,
porcentagem varchar(3),
data_cadastro datetime,
bit_promocao bit,
id_marca int(3),
id_categoria int(3),
FOREIGN KEY(id_marca) REFERENCES marca (id_marca),
FOREIGN KEY(id_categoria) REFERENCES categoria (id_categoria)
)

CREATE TABLE venda (
id_venda int(3) auto_increment PRIMARY KEY,
hora_vend datetime not null,
data_cadastro date not null,
valor_total decimal(7,2) not null,
id_funcionario int(4),
id_cliente int(3),
FOREIGN KEY(id_funcionario) REFERENCES funcionario (id_funcionario),
FOREIGN KEY(id_cliente) REFERENCES cliente (id_cliente)
)

CREATE TABLE Relação_4 (
id_produto int(3),
id_venda int(3),
FOREIGN KEY(id_produto) REFERENCES produto (id_produto),
FOREIGN KEY(id_venda) REFERENCES venda (id_venda)
)

