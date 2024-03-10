<?php
include_once ("conectar.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = $_POST["item"];
    $id = $_SESSION["nome"];

    $sql = "DELETE FROM itens WHERE item = '$item' and id='$id'";
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