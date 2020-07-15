<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="alterar.css" rel="stylesheet" type="text/css">
    <title>Alteração</title>

</head>

<body style="background-color: rgba(0, 7, 7, 0.753);">
    <?php

    include("../conexao.php");

    $conexao = new connectedMysql();

    $id = $_GET["id"];
    $sql = "SELECT * FROM produtos WHERE idprodutos = $id"; //busca os dados da pessoa específica
    $resultado = $conexao->conecta()->query($sql);
    // Teste que verifica se o SQL de inserção foi executado com sucesso

    ?>

    <form action="alteraScript.php" method="post">
        <?php $linha = $resultado->fetch_assoc(); ?>
        <center>
            <button><a href="../../view/menu.html">Menu</a></button>
            <div id="alteracao-produto">
                <h2 style="color: rgb(0, 209, 209);">Alteração de Produto</h2>
                <input type="hidden" name="id" value="<?php print $linha['idprodutos'] ?>" />
                <input type="text" name="nome" value="<?php print $linha['nome'] ?>" placeholder="Digite o nome" required><br><br>
                <input type="number" name="preco" step="any" value="<?php print $linha['precoUnitario'] ?>" placeholder="Digite o preço" required><br><br>
                <input type="submit" value="Alterar">
            </div>
        </center>
    </form>

    <?php
    //fecha a conexão
    $conexao->conecta()->close();

    ?>
</body>
<script src="script.js"></script>

</html>