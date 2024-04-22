<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de itens</title>
    <meta charset="utf-8">
    <style>
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #f4f3e0;
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

form {
    max-width: 600px;
    margin: 0px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

form h1 {
    text-align: center;
    color: #f55d00;
}

label {
    display: block;
    margin-bottom: 8px;
    color: #333;
}

input,
select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
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


    </style>
</head>
<body>
    <?php
        include_once ('sessao.php');
    ?>
    <header>
            <nav>
                <a href="main.php">Início</a>
                <a href="faltas.php">Compras</a>
                <a href="logout.php">Logout</a>
            </nav>
            <button onclick="window.location.href='login.php';">Login</button>
        </header>
        <img class="logo" src="logo.png" alt="Logo">

    <form action="additem.php" method="post">
        <h1> Adicionar item </h1>
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
        <button onclick="window.location.href='pesquisa.php';">Ver lista</button>
    </form>
    <footer>
            <img src="insta.png" alt="Instagram">
            <p>Nicolas, Raphael e Julia</p>
            <img src="whats.png" alt="WhatsApp">
        </footer>
</body>
</html>
