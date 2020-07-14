<?php
include("../controller/conexao.php");

$conexao = new connectedMysql();
?>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Produtos</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        a {
            text-decoration: none;
            color: black;
            font-size: 18px;
            font-weight: bold;
        }

        button {
            padding: 10px;
        }

        #filtro {
            height: 30px;
        }
    </style>
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
                    //enquanto houverem pessoas
                    while ($linha = $resultado->fetch_assoc()) { //continua enquanto houverem pessoas
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