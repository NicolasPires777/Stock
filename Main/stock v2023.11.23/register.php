<?php
    include_once("conectar.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se a conexão foi estabelecida corretamente
    if (!$conexao) {
        die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
    }

    // Obtém os dados do formulário
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];

    // Verifica se o nome já existe no banco de dados
    $sql = "SELECT * FROM usuarios WHERE nome='$nome'";
    $result = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "Nome de usuário já existe. Por favor, escolha outro nome.";
    } else {
        // Gera um ID aleatório e exclusivo
        do {
            $id = rand();
            $sql = "SELECT * FROM usuarios WHERE id='$id'";
            $result = mysqli_query($conexao, $sql);
        } while (mysqli_num_rows($result) > 0);

        // Insere os dados na tabela
        $sql = "INSERT INTO usuarios (id, nome, senha) VALUES ('$id', '$nome', '$senha')";
        if (mysqli_query($conexao, $sql)) {
            echo "Cadastro realizado com sucesso!";
            header("Location:login.php");
        } else {
            echo "Erro no cadastro: " . mysqli_error($conexao);
        }
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conexao);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
    <style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-color: #f4f3e0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    h2 {
        text-align: center;
        color: #f55d00;
    }

    form {
        width: 400px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #333;
    }

    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #f87422;
        color: #fff;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        font-size: 16px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #e44d00;
        color: #fff;
    }

    /* Adicione esta parte para estilizar a imagem */
    .logo {
        display: block;
        margin: 0 auto;
        max-width: 80%; /* Defina a largura máxima da imagem */
        height: auto; /* Isso permite que a altura seja ajustada automaticamente de acordo com a largura */
    }
    a {
    display: block;
    text-align: center;
    margin-top: 15px;
    color: #333;
    text-decoration: none;
}

a:hover {
    color: #f55d00;
}
    </style>
</head>
<body>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
      

        <h2>Cadastro</h2>
        <label for="nome">Usuario:</label>
        <input type="text" name="nome" maxlength="20" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" maxlength="20" required><br>

        <input type="submit" value="Cadastrar">
        <a href="login.php">Já possui cadastro? Clique aqui</a>
        <img class="logo" src="logo.png" alt="Logo da Empresa">
    </form>
</body>
</html>
