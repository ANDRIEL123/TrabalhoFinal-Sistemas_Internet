<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrado</title>
</head>
<body>
<?php

$nome = $_POST["nome"];
$preco = $_POST["preco"];

//conexão com o banco de dados
$ip = "localhost"; 
$usuario = "root";
$senha = "";

$conexao = new mysqli($ip, $usuario, $senha);

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error); // Termina se houver algum problema
}
echo "Conexão feita com sucesso!";

$conexao->select_db("dbpedidos");

//executa o sql de inserção da pessoa
$sql = "INSERT INTO Produtos (nome, precoUnitario)
            VALUES ('$nome','$preco')";
// Teste que verifica se o SQL de inserção foi executado com sucesso
if ($conexao->query($sql) === TRUE) {
    $ultimo_id = $conexao->insert_id;
    echo "Registro criado com sucesso. O id é ".$ultimo_id;
    echo("<script>
            let confirm = window.confirm('Cadastrado com sucesso, deseja cadastra outro?');
            if(confirm) {
                window.location.href = '../view/cadastraProduto.html'
            } else {
                window.location.href = '../view/menu.html'
            }
        </script>");

}
else {
    echo "Erro: " . $conexao->error;
}


//fecha a conexão
$conexao->close();

?>
</body>
<script src="script.js"></script>
</html>

