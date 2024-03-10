<?php
include_once ("conectar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = $_POST["item"];

    $sql = "DELETE FROM itens WHERE item = '$item'";
    if ($conexao->query($sql) === TRUE) {
        header("Location: pesquisa.php"); // Redireciona de volta para a página de pesquisa
    } else {
        echo "Erro ao excluir o item: " . $conexao->error;
    }
} else {
    echo "Requisição inválida.";
}

mysqli_close($conexao);
?>