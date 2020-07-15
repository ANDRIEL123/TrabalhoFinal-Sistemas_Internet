<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Usuário</title>
</head>

<body>
    <?php
    include("./controller/conexao.php");

    $con = new connectedMysql();
    $conexao = $con->conecta();

    $login = $_POST["login"];
    $senha = $_POST["senha"];
    $senhaCriptografa = password_hash($senha, PASSWORD_DEFAULT);
    $nivelAcesso = $_POST["nivel-acesso"];

    $sql = "INSERT INTO usuarios 
            (usuario, senha)
            VALUES 
            ('$login','$senha')";

    if ($conexao->query($sql) === TRUE) {
        $ultimo_id = $conexao->insert_id;
        echo "Registro criado com sucesso. O id é " . $ultimo_id;
        echo ("<script>
        alert('Cadastro com sucesso!')
        window.location.href = 'login.php'
    </script>");
    } else {
        echo "Erro: " . $conexao->error;
    }
    ?>
</body>

</html>