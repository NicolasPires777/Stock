<?php
session_start();
include_once("conectar.php");

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verifica se a conexão foi estabelecida corretamente
    if (!$conexao) {
        die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
    }

    // Obtém os dados do formulário
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];

    // Verifica se o nome e a senha estão corretos
    $sql = "SELECT * FROM usuarios WHERE nome='$nome' AND senha='$senha'";
    $result = mysqli_query($conexao, $sql);
    $id = "SELECT id FROM usuarios WHERE nome='$nome'";
    $sess= mysqli_query($conexao, $id);
    $row = mysqli_fetch_assoc($sess);
    $id = $row["id"];

    if (mysqli_num_rows($result) == 1) {
        $_SESSION["nome"] = $id;
        header("Location: main.php"); // Redireciona para a página de dashboard
        exit();
    } else {
        echo "Nome de usuário ou senha incorretos.";
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conexao);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
.logo {
        display: block;
        margin: 0 auto;
        max-width: 80%; /* Defina a largura máxima da imagem */
        height: auto; /* Isso permite que a altura seja ajustada automaticamente de acordo com a largura */
    }
    </style>
</head>
<body>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <h2>Login</h2>
        <label for="nome">Usuário:</label>
        <input type="text" name="nome" maxlength="20" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" maxlength="20" required><br>

        <input type="submit" value="Entrar">
        <a href="register.php">Não possui cadastro? Clique aqui</a>
        <img class="logo" src="logo.png" alt="Logo da Empresa">
    </form>

</body>
</html>