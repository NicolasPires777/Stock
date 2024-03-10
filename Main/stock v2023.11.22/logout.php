<?php
session_start();

// Verifica se a sessão está definida
if (isset($_SESSION["nome"])) {
    // Destroi a sessão
    session_destroy();
    
    // Redireciona para a página de login
    header("Location: login.php");
    exit();
} else {
    // Redireciona para a página de login caso não esteja logado
    header("Location: login.php");
    exit();
}
?>