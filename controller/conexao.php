<?php

class connectedMysql
{

    var $usuario = "user";
    var $senha = "password";
    var $ip = "localhost";
    var $banco = "dbpedidos";
    var $consulta = "";

    var $link = "";

    var $conexao = new mysqli($this->ip, $this->usuario, $this->senha);


    function Conecta()
    {
        if ($this->conexao->connect_error) {
            die("Conexão falhou: " . $this->conexao->connect_error); // Termina se houver algum problema
        }
        echo "Conexão feita com sucesso!";

        //criar o banco
        $sql = "CREATE DATABASE meuBanco";
        if ($this->conexao->query($sql) === TRUE) {
            echo "Banco criado com sucesso!";
        } else {
            echo "Erro na criação do banco: " . $this->conexao->error; // Caso contrário, aponta o erro
        }
    }

    function Desconecta()
    {
        $this->conexao->close();
    }
}
