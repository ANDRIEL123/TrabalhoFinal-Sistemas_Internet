<?php

include("./controller/conexao.php");

$con = new connectedMysql();
$conexao = $con->conecta();

$login = $_POST["login"];
$senha = $_POST["senha"];

$sql = "SELECT * FROM usuarios";

$resultado = $conexao->query($sql);
$auxAut = false;
while ($linha = $resultado->fetch_assoc()) {
    if ($login == $linha["usuario"] && $senha == $linha["senha"]) {
        echo ("
        <script>
            alert('Acesso concedido!');
        </script>
    ");
        session_start();
        $_SESSION["login"] = $login;
        $_SESSION["senha"] = $senha;
        $auxAut = true;
        header("refresh:1; url=./view/menu.html");
    }
}

if ($auxAut == false) {
    echo ("
        <script>
            alert('Não autorizado!');
        </script>
    ");
    header("refresh:0.01; url=index.html");
}
