<?php
include_once ("conectar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = $_POST["item"];
    $quantidade = $_POST["quantidade"];

    if ($quantidade <= 0) {
        echo "A quantidade deve ser maior que zero.";
    } else {
        $sql = "UPDATE itens SET quantidade = quantidade - $quantidade WHERE item = '$item'";
        if ($conexao->query($sql) === TRUE) {
            header("Location: pesquisa.php"); // Redireciona de volta para a página de pesquisa
        } else {
            echo "Erro ao excluir a quantidade: " . $conexao->error;
        }
    }
} else {
    echo "Requisição inválida.";
}

mysqli_close($conexao);
?>
