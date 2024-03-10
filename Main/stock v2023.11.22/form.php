<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de itens</title>
    <meta charset="utf-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input, select {
            width: calc(100% - 16px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php
        include_once ('sessao.php');
        echo $_SESSION["nome"];
    ?>
    <form action="additem.php" method="post">
        <label for="iditem">Item:</label>
        <input type="text" id="iditem" name="item" required>

        <label for="idquant">Quantidade:</label>
        <input type="number" id="idquant" name="quant" step="0.01" required>

        <label for="idform">Formatação:</label>
        <select id="idform" name="form">
            <option value="kg">Kg</option>
            <option value="lt">Litro(s)</option>
            <option value="un">Unidade(s)</option>
        </select>

        <label for="idmarca">Marca:</label>
        <input type="text" id="idmarca" name="marca" required>  
        
        <label for="idmodelo">Modelo:</label>
        <input type="text" id="idmodelo" name="modelo" required>

        <label for="idlocal">Setor:</label>
        <select id="idlocal" name="local">
            <option value="Cozinha">Cozinha</option>
            <option value="Banheiro">Banheiro</option>
            <option value="Area">Área de Serviço</option>
            <option value="Outros">Outros</option>
        </select>

        <button type="submit">Adicionar Item</button>
    </form>

    <form action="pesquisa.php" method="post">
        <button type="submit">Ver lista</button>
    </form>

    <a href="logout.php">Logout</a>
</body>
</html>
