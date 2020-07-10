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
$sql = "CREATE DATABASE dbpedidos";
if ($conexao->query($sql) === TRUE) {
    echo "Banco criado com sucesso!";
} else {
    echo "Erro na criação do banco: " . $conexao->error; // Caso contrário, aponta o erro
}

//seleciona o banco criado acima
$conexao->select_db("dbpedidos");

//criar as tabelas do banco
$sql = "CREATE TABLE Pessoa (
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				nome VARCHAR(30) NOT NULL,
				sobrenome VARCHAR(30) NOT NULL,
				email VARCHAR(50));";
if ($conexao->query($sql) === TRUE) {
    echo "Tabelas criadas com sucesso!";
} else {
    echo "Erro na criação das tabelas: " . $conexao->error; // Caso contrário, aponta o erro
}

//fecha a conexão
$conexao->close();
