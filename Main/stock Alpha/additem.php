<html>
    <head>
        <title>Item Adicionado</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
            include_once ("form.php");
            include_once ("conectar.php");
            session_start();

            if (!$conexao) {
                die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
            }

            $item = $_POST["item"];
            $quant = $_POST["quant"];
            $marca = $_POST["marca"];
            $modelo = $_POST["modelo"];
            $form = $_POST["form"];
            $setor = $_POST["local"];
            $id = $_SESSION["nome"];

            $sql = "INSERT INTO itens (item, marca, quant, modelo, format, id, setor) VALUES ('$item', '$marca', '$quant', '$modelo', '$form', '$id', '$setor')";

            $resultado = mysqli_query($conexao, $sql);

            mysqli_close($conexao);
        ?>
    </body>
</html>