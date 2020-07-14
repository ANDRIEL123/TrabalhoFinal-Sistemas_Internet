<?php

include("../conexao.php");

$conexao = new connectedMysql();
$id = $_POST["id"];
$nome = $_POST["nome"];
$precoUnitario = $_POST["preco"];

$sql = "UPDATE produtos
           SET nome = '$nome',
      precoUnitario = '$precoUnitario'
         WHERE idprodutos = '$id'";

// Teste que verifica se o SQL de alteração foi executado com sucesso
if ($conexao->conecta()->query($sql) === TRUE) {
    echo
        "<script>
        alert('Registro excluído com sucesso!');
        window.location.href = '../../view/gerirprodutos.php'
        </script>";
} else {
    echo "Erro: " . $conexao->error;
}

//fecha a conexão
$conexao->conecta()->close();
