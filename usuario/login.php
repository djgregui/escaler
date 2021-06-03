<?php
// Pega arquivos necessários para conexão com banco de dados
require('../config.php');
require DBAPI;
$db = open_database();
// Verifica se o usuário digitou, caso não, expulsa
if( empty($_POST['usuario']) && empty($_POST['senha']) ) {
    header('Location: ../index.php');
    exit();
}

// Filtra e criptografa variaveis
$usuario = filter_input(INPUT_POST,'usuario',FILTER_SANITIZE_STRING);
$senha = hash('sha256', filter_input(INPUT_POST,'senha',FILTER_SANITIZE_STRING));

// Consulta dados digitados no banco de dados
$sql = "SELECT * FROM usuario WHERE email = '$usuario' AND senha = '$senha'";
$query = $db->query($sql);
// Verifica se foi encontrado
if($query->num_rows > 0) {
    // Guarda os dados numa variavel temporario
    $user = $query->fetch_assoc();
    if($user['u_status'] == '0') {
        header("Location: pagina-login.php?e=425&email=".$usuario);
    } else {
        // Inicia sessão e variável $_SESSION
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // Saber se está logado
        $_SESSION['loggedin_escaler'] = 1;
        // Identificar pessoa
        $_SESSION['id_user'] = $user['id'];
        // Nome do Usuário
        $_SESSION['name'] = $user['nome'];
        if(isset($_POST['shop'])){
            header('Location: shop.php?id='.filter_input(INPUT_POST,'shop',FILTER_SANITIZE_NUMBER_INT));
        } else {
            echo '<script>if(localStorage.cart == undefined){localStorage.cart=JSON.stringify([]);}window.location.href="index.php"</script>';
            // Envia pro Admin
            // header("Location: index.php");
        }
    }
} else {
    if(isset($_POST['shop'])){
        header('Location: login.php?shop='.filter_input(INPUT_POST,'shop',FILTER_SANITIZE_NUMBER_INT));
        exit;
    }
    header("Location: pagina-login.php?e=401");
}