<html>
            <head>
                <style>
                    /* style.css */
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
a.button-link {
    display: inline-block;
    background-color: #f55d00;
    color: #fff;
    padding: 5px 10px;
    margin-left: 20px;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

a.button-link:hover {
    background-color: #e44d00;
    color: #fff;
}

                </style>
            </head>
            <body>
            <header>
            <nav>
                <a href="main.php">Início</a>
                <a href="faltas.html">Compras</a>
                <a href="logout.php">Logout</a>
            </nav>
        </header>
        <img class="logo" src="logo.png" alt="Logo">
<?php
        include_once ("conectar.php");
        include_once ('sessao.php');
        if (!$conexao) {
            die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
        }
        $id = $_SESSION["nome"];

        $sql = "SELECT * FROM itens WHERE quant=0 and id=$id";
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
        
                <a class="button-link" href="comprar.php" target="_blank">Comprar produtos faltantes</a>
            </body>
        </html>