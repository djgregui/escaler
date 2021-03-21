<?php
ini_set("display_errors",1);
require '../../config.php';
require DBAPI;
$db = open_database();
$id = (int) $_GET['id'];
// var_dump($_POST);
// var_dump($_GET);
$nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_STRING);
$sobrenome = filter_input(INPUT_POST,'sobrenome',FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST,'cpf',FILTER_SANITIZE_STRING);
// $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_STRING);

if($_POST['senha'] != ''){
    $senha = filter_input(INPUT_POST,'senha',FILTER_SANITIZE_STRING);
    $senha = hash('sha256',$senha);
    $complement = ",senha = '$senha'";
    } else {
        $complement = '';
    }

$telefone = filter_input(INPUT_POST,'telefone',FILTER_SANITIZE_STRING);
$cep = floatval(filter_input(INPUT_POST,'cep',FILTER_SANITIZE_NUMBER_INT));//FILTER_SANITIZE_NUMBER_INT
$rua = filter_input(INPUT_POST,'rua',FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST,'numero',FILTER_SANITIZE_STRING);
$complemento = filter_input(INPUT_POST,'complemento',FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST,'bairro',FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST,'cidade',FILTER_SANITIZE_STRING);
$estado = filter_input(INPUT_POST,'estado',FILTER_SANITIZE_STRING);


$sql = "UPDATE usuario SET nome = '$nome', sobrenome = '$sobrenome', cpf = '$cpf' $complement, telefone = '$telefone', cep = '$cep', rua = '$rua', numero = '$numero', complemento = '$complemento', bairro = '$bairro', cidade = '$cidade', estado = '$estado' WHERE id = '$id'";

$query = $db->query($sql);
if($query) {
    header("Location: ../dados-pessoais/index.php");
    echo $db->error;
    } else {
        echo $db->error;
    echo "<script>alert('Erro: $erro');window.location.href='usuario/index.php';</script>";
}
