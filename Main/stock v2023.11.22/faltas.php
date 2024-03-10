<?php
        include_once ("conectar.php");
        include_once ('sessao.php');
        if (!$conexao) {
            die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
        }
        $id = $_SESSION["nome"];
        echo $id;

        $sql = "SELECT * FROM itens WHERE quant=0";
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
                    echo '</div>';
                }

                echo '</div>';
            }
        } else {
            echo "Nenhum item encontrado.";
        }

        mysqli_close($conexao);
        ?>
        <html>
            <head>

            </head>
            <body>
                <a href="comprar.php">Comprar produtos faltantes</a>
            </body>
        </html>