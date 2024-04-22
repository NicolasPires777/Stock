<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página com Imagens e Links</title>
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
            background-color: #f87422;
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
            padding: 15px 30px;
            border: none;
            cursor: pointer;
            font-size: 26px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin-top: 20px;
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
    </style>
</head>

<body>
    <?php
        session_start();
        
        // Verifica se o usuário está logado
        if (isset($_SESSION['nome'])) {
            // Redireciona para a página de login
            header('Location: main.php');
            exit;
        }
    ?>
    <div class="content">
        <header>
            <nav>
                <a href="#">Início</a>
                <a href="#">Compras</a>
                <a href="logout.php">Logout</a>
            </nav>
            <button onclick="window.location.href='login.php';">Login</button>
        </header>
        <img class="logo" src="logo.png" alt="Logo">

        <div class="center-text">
            <div class="main-text">
                <h1><span class="organize-text">Organize</span> suas compras</h1>
                <h1><span class="organize-text">Organize</span> sua vida</h1>
                <button class="signup-button" onclick="window.location.href='register.php';">Fazer Cadastro</button>
            </div>
        </div>

        <footer>
            <img src="insta.png" alt="Instagram">
            <p>Nicolas, Raphael e Julia</p>
            <img src="whats.png" alt="WhatsApp">
        </footer>
    </div>

</body>

</html>
