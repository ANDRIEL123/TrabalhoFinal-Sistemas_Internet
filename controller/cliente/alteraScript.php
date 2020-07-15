<?php

include("../conexao.php");
include("../../model/Cliente.php");

$con = new connectedMysql();
$conexao = $con->conecta();
$Cliente1 = new Cliente(
    $_POST["nome"],
    $_POST["idade"],
    $_POST["sexo"],
    $_POST["endereco"],
    $_POST["bairro"],
    $_POST["estado"],
    $_POST["numero"],
    $_POST["complemento"],
    $_POST["cep"],
    $_POST["cidade"]
);
$id = $_POST["id"];
$nome = $Cliente1->getNome();
$idade = $Cliente1->getIdade();
$sexo = $Cliente1->getSexo();
$endereco = $Cliente1->getEndereco();
$bairro = $Cliente1->getBairro();
$estado = $Cliente1->getEstado();
$numero = $Cliente1->getNumero();
$complemento = $Cliente1->getComplemento();
$cep = $Cliente1->getCep();
$cidade = $Cliente1->getCidade();

$sql = "UPDATE clientes
           SET nome = '$nome',
               idade = '$idade',
               sexo = '$sexo',
               endereco = '$endereco',
               bairro = '$bairro',
               estado = '$estado',
               numero = '$numero',
               complemento = '$complemento',
               cep = '$cep',
               cidade = '$cidade'
         WHERE idclientes = '$id'";

// Teste que verifica se o SQL de alteração foi executado com sucesso
if ($conexao->query($sql) === TRUE) {
    echo ($sql);
    echo
        "<script>
        alert('Registro atualizado!');
        window.location.href = '../../view/gerirClientes.php';
        </script>";
    echo $sql;
} else {
    echo "Erro: " . $conexao->error;
}

//fecha a conexão
$conexao->close();
