<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="alterar.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../../view/cliente/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../../view/cliente/js/bootstrap.min.js"></script>
    <title>Alteração de Cliente</title>
</head>

<body style="background-color: rgba(0, 7, 7, 0.753);">
    <?php

    include("../conexao.php");

    $conexao = new connectedMysql();

    $id = $_GET["id"];
    $sql = "SELECT * FROM clientes WHERE idclientes = $id"; //busca os dados da pessoa específica
    $resultado = $conexao->conecta()->query($sql);
    // Teste que verifica se o SQL de inserção foi executado com sucesso

    ?>
    <form action="alteraScript.php" method="post">
        <?php $linha = $resultado->fetch_assoc(); ?>
        <center>
            <button><a href="../../view/menu.html">Menu</a></button>
            <div id="alterar-cliente">
                <h2 style="color: rgb(0, 209, 209);">Alteração de Cliente</h2>
                <input type="hidden" name="id" value="<?php print $linha['idclientes'] ?>" />
                <input type="text" name="nome" placeholder="Digite o nome" value="<?php print $linha['nome'] ?>" required><br><br>
                <input type="number" name="idade" placeholder="Digite a idade" value="<?php print $linha['idade'] ?>" required><br>

                <div id="sexo" id="sexo">
                    <h3 style="color: rgb(0, 209, 209);">Sexo</h3>
                    <select name="sexo">
                        <?php if ($linha["sexo"] === 'Masculino') { ?>
                            <option value="Masculino" selected>Masculino</option>
                            <option value="Feminino">Feminino</option>
                            <option value="Outro">Outro</option>
                        <?php } ?>
                        <?php if ($linha["sexo"] === 'Feminino') { ?>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino" selected>Feminino</option>
                            <option value="Outro">Outro</option>
                        <?php } ?>
                        <?php if ($linha["sexo"] === 'Outro') { ?>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                            <option value="Outro" selected>Outro</option>
                        <?php } ?>
                    </select>
                </div>

                <br><br>
                <input type="text" name="cep" maxlength="9" class="cep" placeholder="Digite o CEP" value="<?php print $linha['cep'] ?>">
                <input type="button" value="Buscar" onclick="buscaCep()"></p>
                <input type="text" name="endereco" class="endereco" placeholder="Digite o endereço" value="<?php print $linha['endereco'] ?>"><br><br>
                <input type="number" name="numero" class="numero" placeholder="Digite o número" value="<?php print $linha['numero'] ?>"><br><br>
                <input type="text" name="bairro" class="bairro" placeholder="Digite o bairro" value="<?php print $linha['bairro'] ?>"><br><br>
                <input type="text" name="cidade" class="cidade" placeholder="Digite a cidade" value="<?php print $linha['cidade'] ?>"><br><br>
                <input type="text" name="complemento" class="complemento " placeholder="Digite o complemento" value="<?php print $linha['complemento'] ?>"><br><br>
                <input type="text" name="estado" class="estado" placeholder="Digite o estado" value="<?php print $linha['estado'] ?>">
                <br><br>
                <input type="submit" value="Alterar" style="font-weight: bold;">

            </div>

        </center>
    </form>
    <script type="text/javascript" src="../../../view/cliente/js/jquery.mask.min.js"></script>
    <script src="../../view/cliente/js/mascara.js"></script>
    <script src="../../view/cliente/js/ajax.js"></script>
</body>

</html>