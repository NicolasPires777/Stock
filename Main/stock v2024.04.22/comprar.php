<?php
    include_once("conectar.php");
    include_once("sessao.php");


    // Verificar a conexão
    if ($conexao->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conexao->connect_error);
    }

    // Consulta para obter os produtos com quantidade igual a zero
    $id = $_SESSION["nome"];
    $sql = "SELECT * FROM itens WHERE quant = 0 and id=$id";
    $result = $conexao->query($sql);

    // Verificar se há resultados
    if ($result->num_rows > 0) {
        // Inicializar a frase de compra no WhatsApp
        $frase = "Olá, eu gostaria de pedir os seguintes itens:\n";

        // Loop pelos resultados e adicionar as informações dos produtos à frase
        while ($row = $result->fetch_assoc()) {
            $frase .= "- " . $row["item"]." | ".$row["marca"]." | ".$row["modelo"]." - adicione aqui a quantidade". "\n";
        }

        // URL do WhatsApp com a frase de compra
        $whatsappUrl = "https://wa.me/+5548984974798/?text=" . urlencode($frase);

        // Redirecionar para o WhatsApp
        header("Location: " . $whatsappUrl);
        exit();
    } else {
        header("location: form.php");
    }

    // Fechar a conexão com o banco de dados
    $conexao->close();
?>