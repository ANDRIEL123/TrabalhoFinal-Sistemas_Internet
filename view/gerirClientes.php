<?php
include("../controller/conexao.php");

$conexao = new connectedMysql();
?>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="gerirClientes.css" rel="stylesheet" type="text/css">
    <title>Gestão de Clienes</title>
</head>

<body style="background-color: rgba(0, 7, 7, 0.753);">
    <center>
        <button><a href="menu.html">Menu</a></button>
        <button><a href="cliente/cadastraCliente.html">Cadastrar Clientes</a></button>
        <h2>Gerir Clientes</h2>
        <form action="gerirClientes.php" method="POST">
            <input type="text" name="filtro" id="filtro" placeholder="Nome do Cliente" />
            <input type="submit" value="Pesquisar" id="filtro" /><br>
        </form>

        <?php
        //se a variavel de filtro existe no POST, monta um SQL para puxar somente as pessoas que contenham a informação do filtro no nome, no sobrenome ou no e-mail
        if (isset($_POST['filtro'])) {
            $filtro = $_POST['filtro'];
            $sql = "SELECT * FROM clientes WHERE nome LIKE '%$filtro%'";
        }
        //se a variável de filtro não existe no POST, monta um SQL para puxar todas as pessoas do banco
        else {
            $sql = "SELECT * FROM clientes";
        }
        $resultado = $conexao->conecta()->query($sql);
        //se veio alguma coisa da consulta
        if ($resultado->num_rows > 0) {
        ?>
            <table>
                <tr>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Endereço</th>
                    <th>Cidade</th>
                </tr>
                <tr>
                    <?php
                    //enquanto houverem clientes
                    while ($linha = $resultado->fetch_assoc()) { //continua enquanto houverem clientes
                    ?>
                <tr>
                    <td><?php print $linha['nome'] ?></td>
                    <td><?php print $linha['idade'] ?></td>
                    <td><?php print $linha['endereco'] ?></td>
                    <td><?php print $linha['cidade'] ?></td>
                    <td><a href="../controller/cliente/Alterar.php?id=<?php print $linha['idclientes'] ?>">Alterar </a></td>
                    <td><a href="../controller/cliente/excluir.php?id=<?php print $linha['idclientes'] ?>" onclick="return confirm('Tem certeza?')">Excluir </a></td>
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