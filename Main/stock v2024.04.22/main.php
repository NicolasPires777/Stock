<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f3e0;
            text-align: center;
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


        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 60vh; /* 60% of the viewport height */
        }

        img {
            width: 50%; /* 30% of the viewport width */
            max-height: 100%; /* Ensure the image doesn't exceed the container height */
            margin: 0 ; /* Add some spacing between the images */
            transition: 2s;
        }

        img:hover {
            width: 55%;
            transition: 2s;
        }

        footer {
            background-color: #f55d00;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
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
    include("sessao.php");
    ?>
    <header>
        <nav>
            <a href="#">Início</a>
            <a href="faltas.php">Compras</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>
    <img class="logo" src="logo.png" alt="Logo">
    <div class="content">
        <img src="despensa.png" alt="Image 1" onclick="window.location.href='pesquisa.php';">
        <img src="comprar.png" alt="Image 2" onclick="window.location.href='faltas.php';">
    </div>

    <footer>
        <img src="insta.png" alt="Instagram">
        <p>Nicolas, Raphael e Julia</p>
        <img src="whats.png" alt="WhatsApp">
    </footer>

</body>

</html>
