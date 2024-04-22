<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['nome'])) {
    // Redireciona para a página de login
    header('Location: index.php');
    exit;
}
?>