<?php

class connectedMysql
{
    //conexão com o banco de dados
    var $ip = "localhost";
    var $usuario = "root";
    var $senha = "";

    function conecta()
    {
        $conexao = new mysqli($this->ip, $this->usuario, $this->senha);

        if ($conexao->connect_error) {
            die("Conexão falhou: " . $conexao->connect_error); // Termina se houver algum problema
        }

        $conexao->select_db("dbpedidos");
        return $conexao;
    }
}
