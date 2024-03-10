<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conecta ao banco de dados (substitua as informações de conexão com o seu banco)
    $conn = mysqli_connect("localhost", "root", "", "stock");

    // Verifica se a conexão foi estabelecida corretamente
    if (!$conn) {
        die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
    }

    // Obtém os dados do formulário
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];

    // Verifica se o nome já existe no banco de dados
    $sql = "SELECT * FROM usuarios WHERE nome='$nome'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "Nome de usuário já existe. Por favor, escolha outro nome.";
    } else {
        // Gera um ID aleatório e exclusivo
        do {
            $id = rand();
            $sql = "SELECT * FROM usuarios WHERE id='$id'";
            $result = mysqli_query($conn, $sql);
        } while (mysqli_num_rows($result) > 0);

        // Insere os dados na tabela
        $sql = "INSERT INTO usuarios (id, nome, senha) VALUES ('$id', '$nome', '$senha')";
        if (mysqli_query($conn, $sql)) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro no cadastro: " . mysqli_error($conn);
        }
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
</head>
<body>
    <h2>Cadastro</h2>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" maxlength="20" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" maxlength="20" required><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>