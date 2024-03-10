<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Itens Cadastrados</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f3e0;
        }

        .setor-container {
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            clear: both; /* Add this line to clear the float */
        }

        .setor-title {
            color: #f55d00;
            font-size: 24px;
            margin-bottom: 10px;
            text-align: left; /* Align setor title to the left */
        }

        header {
            background-color: #f55d00;
            color: #fff;
            text-align: center;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav {
            display: flex;
            align-items: center;
            margin-left: 170px;
            height: 30px;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            margin: 0 10px;
        }

        img.logo {
            width: 30%;
            max-width: 200px;
            height: auto;
            display: flex;
            margin-top: 0px;
            position: relative;
            top: 70%;
            left: 5%;
            transform: translate(-50%, -50%);
        }

        h1,
        h2 {
            text-align: center;
        }

        .center-text {
            text-align: center;
        }

        .main-text {
            max-width: 800px;
            margin: 100px auto;
            font-size: 30px;
        }

        .organize-text {
            color: #f55d00;
            font-size: 72px;
            /* Tamanho maior para a palavra "organize" */
            text-shadow: -1px -1px 0 #000,
                1px -1px 0 #000,
                -1px 1px 0 #000,
                1px 1px 0 #000;
        }

        button {
            background-color: #f55d00;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #e44d00;
            color: #fff;
        }

        .signup-button {
            background-color: #f55d00;
            color: #fff;
            border: none;
            padding: 5px 5px;
            margin: 2px;
            cursor: pointer;
            font-size: 12px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .signup-button:hover {
            background-color: #e44d00;
        }

        footer {
            background-color: #f55d00;
            color: #fff;
            text-align: center;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        footer img {
            width: 50px;
            margin-right: 10px;
            margin-left: 10px;
        }
        .random{
            padding-bottom: 100px;
            margin-left: 50px;
        }
    </style>
</head>

<body>

    <div class="content">
        <header>
            <nav>
                <a href="main.php">Início</a>
                <a href="faltas.php">Compras</a>
                <a href="logout.php">Logout</a>
            </nav>
        </header>
        <img class="logo" src="logo.png" alt="Logo">

        <?php
        include_once("conectar.php");
        include_once('sessao.php');
        if (!$conexao) {
            die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
        }
        $id = $_SESSION["nome"];

        $sql = "SELECT * FROM itens WHERE id=$id";
        $result = $conexao->query($sql);

        if ($result->num_rows > 0) {
            $setores = array();

            while ($row = $result->fetch_assoc()) {
                $setor = $row["setor"];
                $item = $row["item"];
                $quantidade = $row["quant"];
                $marca = $row["marca"];
                $modelo = $row["modelo"];
                $form = $row["format"];

                if (!isset($setores[$setor])) {
                    $setores[$setor] = array();
                }

                $setores[$setor][] = array("item" => $item, "quantidade" => $quantidade, "marca" => $marca, "modelo" => $modelo, "form" => $form);
            }

            foreach ($setores as $setor => $itens) {
                echo '<div class="setor-container">';
                echo '<h2 class="setor-title">' . $setor . '</h2>';

                foreach ($itens as $item) {
                    echo '<div class="item-container">';
                    echo '<p class="item-info">Item: ' . $item["item"] . '</p>';
                    echo '<p class="item-brand-model">Marca: ' . $item["marca"] . '</p>';
                    echo '<p class="item-brand-model">Modelo: ' . $item["modelo"] . '</p>';
                    echo '<p class="item-info">Quantidade: ' . $item["quantidade"] . ' <span class="item-unit">' . $item["form"] . '</span></p>';

                    // Adicionando o formulário para adicionar uma quantidade específica
                    echo '<form class="delete-form" action="adicionar_quantidade.php" method="post">';
                    echo '<input type="hidden" name="item" value="' . $item["item"] . '">';
                    echo '<input type="number" name="quantidade" min="0" max="99" step="0.01">';
                    echo '<input type="submit" class="signup-button" value="Adicionar Quantidade">';
                    echo '</form>';

                    // Adicionando o formulário para excluir uma quantidade específica
                    echo '<form class="delete-form" action="excluir_quantidade.php" method="post">';
                    echo '<input type="hidden" name="item" value="' . $item["item"] . '">';
                    echo '<input type="number" name="quantidade" min="0" step="0.01" max="' . $item["quantidade"] . '">';
                    echo '<input type="submit" class="signup-button" value="Excluir quantidade">';
                    echo '</form>';

                    // Adicionando o formulário para excluir completamente o item
                    echo '<form class="delete-form" action="excluir_item.php" method="post" onsubmit="return confirm(\'Tem certeza que deseja excluir este item?\');">';
                    echo '<input type="hidden" name="item" value="' . $item["item"] . '">';
                    echo '<input type="submit" class="signup-button" value="Excluir Item">';
                    echo '</form>';


                    echo '</div>';
                }

                echo '</div>';
            }
        } else {
            echo "Nenhum item encontrado.";
        }

        mysqli_close($conexao);
        ?>
        <div class="random">
        <button class="back-button" onclick="window.location.href='form.php'">Voltar para Adicionar Item</button>
        <button class="back-button" onclick="window.location.href = 'faltas.php';">Produtos Faltantes</button>
        </div>

        <footer>
            <img src="insta.png" alt="Instagram">
            <p>Nicolas, Raphael e Julia</p>
            <img src="whats.png" alt="WhatsApp">
        </footer>
    </div>

</body>

</html>
