<?php

include("../conexao.php");

$conexao = new connectedMysql();

$id = $_GET["id"];

//executa o sql de exclusão da pessoa
$sql = "DELETE FROM clientes WHERE idclientes = $id";
// Teste que verifica se o SQL de exclusão foi executado com sucesso
if ($conexao->conecta()->query($sql) === TRUE) {
    echo
        "<script>
        alert('Registro excluído com sucesso!');
        window.location.href = '../../view/gerirClientes.php'
        </script>";
} else {
    echo "Erro: " . $conexao->error;
}

//fecha a conexão
$conexao->conecta()->close();
