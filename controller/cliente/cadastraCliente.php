<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrado</title>
</head>

<body>
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

    //executa o sql de inserção da pessoa
    $sql = "INSERT INTO Clientes 
            (nome, idade, sexo, cep, endereco, numero, cidade, complemento, estado, bairro)
            VALUES 
            ('$nome','$idade','$sexo','$cep', '$endereco', '$numero', 
            '$cidade', '$complemento', '$estado', '$bairro')";
    // Teste que verifica se o SQL de inserção foi executado com sucesso
    if ($conexao->query($sql) === TRUE) {
        $ultimo_id = $conexao->insert_id;
        echo "Registro criado com sucesso. O id é " . $ultimo_id;
        echo ("<script>
            let confirm = window.confirm('Cadastrado com sucesso, deseja cadastra outro?');
            if(confirm) {
                window.location.href = '../../view/cliente/cadastraCliente.html'
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

</html>