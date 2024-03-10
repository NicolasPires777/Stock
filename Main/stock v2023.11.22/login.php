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
        header("Location: form.php"); // Redireciona para a página de dashboard
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
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" maxlength="20" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" maxlength="20" required><br>

        <input type="submit" value="Entrar">
    </form>
    <a href="register.php">Não possui cadastro? Clique aqui</a>
</body>
</html>