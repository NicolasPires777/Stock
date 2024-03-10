<!DOCTYPE html>
<html>
<head>
    <title>Itens Cadastrados</title>
    <meta charset="utf-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f0f0f0;
        }

        .setor-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .setor-title {
            font-size: 1.5em;
            color: #333;
            margin-bottom: 10px;
            font-family: 'Courier New', Courier, monospace;
        }

        .item-container {
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
        }

        .item-info {
            font-weight: bold;
            color: #333;
            margin-bottom: 4px;
        }

        .item-unit {
            color: #555;
        }

        .item-brand-model {
            color: #555;
            font-style: italic;
        }
        .delete-form {
            display: inline;
        }

        .delete-button {
            background-color: #ff5722;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 8px 16px;
            cursor: pointer;
        }

        .delete-button:hover {
            background-color: #e64a19;
        }

        .back-button {
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 8px 16px;
            cursor: pointer;
            margin-top: 20px;
        }

        .back-button:hover {
            background-color: #45a049;
        }
    </style>
    </head>
    <body>
        <?php
        include_once ("conectar.php");
        include_once ('sessao.php');
        if (!$conexao) {
            die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
        }
        $id = $_SESSION["nome"];
        echo $id;

        $sql = "SELECT * FROM itens WHERE id=$id";
        $result = $conexao->query($sql);

        if ($result->num_rows > 0) {
            $setores = array();

            while($row = $result->fetch_assoc()) {
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
                    echo '<form class="delete-form" action="adicionar_quantidade.php" method="post" onsubmit="return confirm(\'Tem certeza que deseja excluir?\');">';
                    echo '<input type="hidden" name="item" value="' . $item["item"] . '">';
                    echo '<input type="number" name="quantidade" min="0" step = "0.01">  ';
                    echo '<input type="submit" class="delete-button" value="Adicionar Quantidade">  ';
                    echo '</form></br></br>';

                    // Adicionando o formulário para excluir uma quantidade específica
                    echo '<form class="delete-form" action="excluir_quantidade.php" method="post" onsubmit="return confirm(\'Tem certeza que deseja excluir?\');">';
                    echo '<input type="hidden" name="item" value="' . $item["item"] . '">';
                    echo '<input type="number" name="quantidade" min="0" step = "0.01"max="' . $item["quantidade"] . '">  ';
                    echo '<input type="submit" class="delete-button" value="Excluir quantidade">  ';
                    echo '</form>';

                    // Adicionando o formulário para excluir completamente o item
                    echo '<form class="delete-form" action="excluir_item.php" method="post" onsubmit="return confirm(\'Tem certeza que deseja excluir este item?\');">';
                    echo '<input type="hidden" name="item" value="' . $item["item"] . '">';
                    echo '<input type="submit" class="delete-button" value="Excluir Item">';
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
        
        <button class="back-button" onclick="window.location.href='form.php'">Voltar para Adicionar Item</button>
        <button class="back-button" onclick="window.location.href = 'faltas.php';">Produtos Faltantes</button>
</body>
</html>
