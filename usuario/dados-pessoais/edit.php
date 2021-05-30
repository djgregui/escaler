<?php
ini_set("display_errors",1);
require '../../config.php';
require DBAPI;
$db = open_database();
if($_GET['tipo'] == 'dp') {
    $id = (int) $_POST['id'];
    $nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_STRING);
    $sobrenome = filter_input(INPUT_POST,'sobrenome',FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST,'cpf',FILTER_SANITIZE_STRING);
    $nascimento = filter_input(INPUT_POST,'nascimento',FILTER_SANITIZE_STRING);
    $telefone = filter_input(INPUT_POST,'telefone',FILTER_SANITIZE_STRING);
    $cep = floatval(filter_input(INPUT_POST,'cep',FILTER_SANITIZE_NUMBER_INT));
    $rua = filter_input(INPUT_POST,'rua',FILTER_SANITIZE_STRING);
    $numero = filter_input(INPUT_POST,'numero',FILTER_SANITIZE_STRING);
    $complemento = filter_input(INPUT_POST,'complemento',FILTER_SANITIZE_STRING);
    $bairro = filter_input(INPUT_POST,'bairro',FILTER_SANITIZE_STRING);
    $cidade = filter_input(INPUT_POST,'cidade',FILTER_SANITIZE_STRING);
    $estado = filter_input(INPUT_POST,'estado',FILTER_SANITIZE_STRING);
    $telefone = filter_input(INPUT_POST,'telefone',FILTER_SANITIZE_STRING);
    
    
    $sql = "UPDATE usuario SET nome = '$nome', sobrenome = '$sobrenome',nascimento = '$nascimento', cpf = '$cpf', telefone = '$telefone',telefone = '$telefone', cep = '$cep', rua = '$rua', numero = '$numero', complemento = '$complemento', bairro = '$bairro', cidade = '$cidade', estado = '$estado'  WHERE id = '$id'";
    echo $sql;
    $query = $db->query($sql);
    if($query) {
        echo $db->error;
        header("Location: ./");
    } else {
        echo $db->error;
        echo "<script>alert('Erro: $erro');window.location.href='./';</script>";
    }
} elseif($_GET['tipo'] == 'i') {
    // var_dump($_POST);
    $uploaddir = '/var/www/html/escaler/img/users/';
    $uploadfile = $uploaddir . $name = basename("_".date('U')."_".$UIUD."_".$_FILES['userfile']['name']);
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        if(((open_database())->query("UPDATE usuario SET profile_pic = 'https://'.DOMAIN.'/img/users/".$name."' WHERE id = '".filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT)."'"))) {
            header("Location: ./");
        } else {
            echo "<script>alert('Erro: $erro');window.location.href='./';</script>";
        }
    } else {
        echo "<script>alert('Erro: Não foi possível enviar o arquivo');window.location.href='./';</script>";
    }

} else {
    header("Location: ./");
}