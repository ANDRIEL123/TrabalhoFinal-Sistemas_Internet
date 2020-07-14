<?php

include("../conexao.php");

$conexao = new connectedMysql();

$id = $_GET["id"];

//executa o sql de exclusão da pessoa
$sql = "DELETE FROM produtos WHERE idprodutos = $id";
// Teste que verifica se o SQL de exclusão foi executado com sucesso
if ($conexao->conecta()->query($sql) === TRUE) {
    echo
        "<script>
        alert('Registro atualizado com sucesso!');
        window.location.href = '../../view/gerirprodutos.php'
        </script>";
} else {
    echo "Erro: " . $conexao->error;
}

//fecha a conexão
$conexao->conecta()->close();
