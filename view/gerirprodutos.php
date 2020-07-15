<?php
include("../controller/conexao.php");

$conexao = new connectedMysql();
?>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="gerirProdutos.css" rel="stylesheet" type="text/css">
    <title>Gestão de Produtos</title>

</head>

<body style="background-color: rgba(0, 7, 7, 0.753);">
    <center>
        <button><a href="menu.html">Menu</a></button>
        <button><a href="produto/cadastraProduto.html">Cadastrar Produto</a></button>
        <h2>Gerir Produtos</h2>
        <form action="gerirProdutos.php" method="POST">
            <input type="text" name="filtro" id="filtro" placeholder="Nome do Produto" />
            <input type="submit" value="Pesquisar" id="filtro" /><br>
        </form>

        <?php
        //se a variavel de filtro existe no POST, monta um SQL para puxar somente as pessoas que contenham a informação do filtro no nome, no sobrenome ou no e-mail
        if (isset($_POST['filtro'])) {
            $filtro = $_POST['filtro'];
            $sql = "SELECT * FROM produtos WHERE nome LIKE '%$filtro%'";
        }
        //se a variável de filtro não existe no POST, monta um SQL para puxar todas as pessoas do banco
        else {
            $sql = "SELECT * FROM produtos";
        }
        $resultado = $conexao->conecta()->query($sql);
        //se veio alguma coisa da consulta
        if ($resultado->num_rows > 0) {
        ?>
            <table>
                <tr>
                    <th>Nome</th>
                    <th>Preço Unitário</th>
                </tr>
                <tr>
                    <?php
                    //enquanto houverem produtos
                    while ($linha = $resultado->fetch_assoc()) { //continua enquanto houverem produtos
                    ?>
                <tr>
                    <td><?php print $linha['nome'] ?></td>
                    <td><?php print "R$ " . $linha['precoUnitario'] ?></td>
                    <td><a href="../controller/produto/Alterar.php?id=<?php print $linha['idprodutos'] ?>">Alterar </a></td>
                    <td><a href="../controller/produto/Excluir.php?id=<?php print $linha['idprodutos'] ?>" onclick="return confirm('Tem certeza?')">Excluir </a></td>
                </tr>
            <?php
                    }
            ?>

            </tr>
            </table>
        <?php
        }
        ?>
    </center>
</body>

</html>