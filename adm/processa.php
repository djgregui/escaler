<?php
require '../config.php';
require DBAPI;
require COMMON;
$tipo = filter_var($_GET['tipo'],FILTER_SANITIZE_STRING);
switch($tipo) {
    case "add_produto":
        $customer = filter_var_array($_POST['customer'],FILTER_SANITIZE_STRING);
        // echo json_encode($customer);
        $customer['imagens'] = ''; $customer['long_descricao'] = '';
        $sql = "INSERT INTO produtos VALUES (NULL,'".$customer['nome']."','".$customer['original_url']."',1,'".$customer['imagens']."','".$customer['video']."','".$customer['descricao']."','".$customer['long_descricao']."','".$customer['marca']."','".$customer['modelo']."','".$customer['id_colecao']."')";
        $query = (open_database())->query($sql);
        header("Location:produtos");
    break;
    case "edit_produto":
        // echo json_encode($_POST); 
        $produto = get_produto((int) $_GET['id']);
        if(isset($_POST['versao'])) {
            (open_database())->query("UPDATE produto_versoes SET status = '0' WHERE id_produto = '".$produto['id']."'");
            $produto_vid_produto = $produto['id'];
            for($n=0;$n<count($_POST['versao']);$n++) {
                $produto_vversao = filter_var($_POST['versao'][$n],FILTER_SANITIZE_STRING);
                $produto_vvalor =  filter_var($_POST['valor'][$n],FILTER_SANITIZE_STRING);
                $arr = explode(',',$produto_vvalor);
                $produto_vvalor = str_replace('.','',$arr[0]) . "." . $arr[1];
                (open_database())->query("INSERT INTO produto_versoes VALUES (NULL,$produto_vid_produto,'$produto_vversao','$produto_vvalor',0,1)");
            }
        }
        if(isset($_POST['imagem'])) {
            (open_database())->query("DELETE FROM produto_imagens WHERE id_produto = '".$produto['id']."'");
            $produto_vid_produto = $produto['id'];
            foreach($_POST['imagem'] as $url) {
                (open_database())->query("INSERT INTO produto_imagens VALUES (NULL,$produto_vid_produto ,'$url')");
            }
        }
        $nome = filter_var($_POST['nome'],FILTER_SANITIZE_STRING);
        $colecao = filter_var($_POST['colecao'],FILTER_SANITIZE_STRING);
        $marca = filter_var($_POST['marca'],FILTER_SANITIZE_STRING);
        $modelo = filter_var($_POST['modelo'],FILTER_SANITIZE_STRING);
        $video = filter_var($_POST['video'],FILTER_SANITIZE_STRING);
        $original_url = filter_var($_POST['original_url'],FILTER_SANITIZE_STRING);
        $idp = $_GET['id'];
        $sql = "UPDATE produtos SET original_url = '$original_url', nome = '$nome', id_colecao = '$colecao', marca = '$marca', modelo = '$modelo' WHERE id='$idp'";
        $dbc = open_database();
        ($dbc)->query($sql);
        echo $dbc->error;
        if(substr($video,0,32) == "https://www.youtube.com/watch?v=") {
            if($produto['video'] != $video) {
                (open_database())->query("UPDATE produtos SET video = '$video' WHERE id = '".$produto['id']."'");
            } 
        } else{
            if(strlen($video) > 0) {
            } else {
                (open_database())->query("UPDATE produtos SET video = '' WHERE id = '".$produto['id']."'");
            }
        }
        header("Location:produtos/edit.php?id=".$produto['id']);
    break;
    case "perfil":
        $nome = filter_var($_POST['nome'],FILTER_SANITIZE_STRING);
        $sobrenome = filter_var($_POST['sobrenome'],FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
        $id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
        $SQL = "UPDATE administrators SET nome = '$nome', sobrenome = '$sobrenome', email = '$email' WHERE id = '$id'";
        (open_database())->query($SQL);
        header("Location:perfil");
    break;
    case "deactivate_usuario":
        $id = (int) $_GET['id'];
        $SQL = "UPDATE usuario SET u_status = '2' WHERE id = '$id'";
        (open_database())->query($SQL);
        header("Location:usuarios");
    break;
    case "conf":
        $id = (int) $_POST['id'];
        $valor = $_POST['valor'];
        $SQL = "UPDATE configuracoes SET valor = '$valor' WHERE id = '$id'";
        (open_database())->query($SQL);
        header("Location:configuracoes");
    break;
    case "add_conf":
        $nome  = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
        $valor = filter_var($_POST['valor'],FILTER_SANITIZE_STRING);
        (open_database())->query("INSERT INTO configuracoes VALUES (NULL,'$nome','$valor')");
    header("Location:configuracoes");
    break;
    case "rem_add":
        $id = (int) $_GET['id'];
        (open_database())->query("DELETE FROM configuracoes WHERE id = '$id'");
        header("Location:configuracoes");
    break;
    default:
        // header("Location:index.php");
    break;
}