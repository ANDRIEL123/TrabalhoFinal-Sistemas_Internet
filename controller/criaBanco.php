<?php

//conexão com o banco de dados
$ip = "localhost";
$usuario = "root";
$senha = "";

$conexao = new mysqli($ip, $usuario, $senha);

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error); // Termina se houver algum problema
}
echo "Conexão feita com sucesso!";

//criar o banco
$sql = "CREATE DATABASE IF NOT EXISTS dbpedidos";
if ($conexao->query($sql) === TRUE) {
    echo "Banco criado com sucesso!";
} else {
    echo "Erro na criação do banco: " . $conexao->error; // Caso contrário, aponta o erro
}

//seleciona o banco criado acima
$conexao->select_db("dbpedidos");

//criar as tabelas do banco
$sql = "CREATE TABLE IF NOT EXISTS produtos (
		idprodutos int not null auto_increment,
		nome VARCHAR(100) NOT NULL,
		precoUnitario decimal(2) not null,
		primary key (idprodutos)
	);
	
	CREATE TABLE IF NOT EXISTS clientes (
	  idclientes int not null auto_increment,
	  nome VARCHAR(100) NOT NULL,
	  idade int not null,
	  sexo VARCHAR(45) NULL DEFAULT NULL,
	  endereco VARCHAR(100) NULL DEFAULT NULL,
	  numero int not null,
	  complemento VARCHAR(45) NULL DEFAULT NULL,
	  primary key (idclientes)
	);
	
	CREATE TABLE IF NOT EXISTS pedidos (
		idpedidos int not null auto_increment,
		clientes_idclientes int not null,
		primary key (idpedidos),
		CONSTRAINT fk_id_clientes 
		FOREIGN KEY (clientes_idclientes) 
		REFERENCES clientes (idclientes)
		ON UPDATE CASCADE
		ON DELETE CASCADE
	);
	
	CREATE TABLE IF NOT EXISTS produtos_pedido (
	  idproduto_pedido int not null auto_increment,
	  quantidade int not null,
	  produtos_idprodutos int not null,
	  pedido_idpedidos int not null,
	  PRIMARY KEY (idproduto_pedido),
	  CONSTRAINT fk_idpedidos FOREIGN KEY (pedido_idpedidos) 
		REFERENCES pedidos (idpedidos)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	  CONSTRAINT fk_id_produtos FOREIGN KEY (produtos_idprodutos) 
		REFERENCES produtos (idprodutos)
		ON UPDATE CASCADE
		ON DELETE CASCADE);";


if ($conexao->multi_query($sql) === TRUE) {
    echo "Tabelas criadas com sucesso!";
} else {
    echo "Erro na criação das tabelas: " . $conexao->error; // Caso contrário, aponta o erro
}

//fecha a conexão
$conexao->close();
