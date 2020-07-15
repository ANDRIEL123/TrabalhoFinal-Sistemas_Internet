<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrado</title>
</head>

<body>
    <?php

    include("../conexao.php");
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $con = new connectedMysql();
    $conexao = $con->conecta();

    //executa o sql de inserção da pessoa
    $sql = "INSERT INTO Produtos (nome, precoUnitario)
            VALUES ('$nome','$preco')";
    // Teste que verifica se o SQL de inserção foi executado com sucesso
    if ($conexao->query($sql) === TRUE) {
        $ultimo_id = $conexao->insert_id;
        echo "Registro criado com sucesso. O id é " . $ultimo_id;
        echo ("<script>
            let confirm = window.confirm('Cadastrado com sucesso, deseja cadastra outro?');
            if(confirm) {
                window.location.href = '../../view/produto/cadastraProduto.html'
            } else {
                window.location.href = '../../view/menu.html'
            }
        </script>");
    } else {
        echo "Erro: " . $conexao->error;
    }


    //fecha a conexão
    $conexao->close();

    ?>
</body>
<script src="script.js"></script>

</html>