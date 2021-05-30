<?php
require '../config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require DBAPI;
require COMPOSER;
$tipo = filter_var($_GET['tipo'],FILTER_SANITIZE_STRING);
if($tipo == 'reac') {
    $user = filter_var($_GET['email'],FILTER_SANITIZE_EMAIL);
    $ac = $customer['activaction_code'] = md5($user . date('U') . $UUID);
    // Envia email notificando 
    $body="";
    $body .= "<center><h2 style='color:rgb(157,2,1)'>Bem Vindo ao Escaler!</h2><br>";
    $body .= "Você se cadastrou no Escaler, e solicou um novo email de confirmação.<br><br><br>";
    $body .= "<a href='https://".DOMAIN."/usuario/processa.php?tipo=cac&ac=$ac' style='padding: 10px 15px;background:rgb(157,2,1);color: white;margin-top: 10px;border-radius: 5px;margin-top:20px;margin-bottom:20px;text-decoration:none'>ATIVAR CONTA</a><br>";
    $body .= "<br><br>Caso o botão não funcione, acesse: https://".DOMAIN."/usuario/processa.php?tipo=cac&ac=$ac<br>";
    $body .= "</center>";
    $mailer = new PHPMailer();
    $mailer->IsSMTP();
    $mailer->Host = 'smtp.zoho.com';
    $mailer->Port = 587; 
    // $mailer->SMTPDebug = 1;
    $mailer->SMTPAuth = true;
    $mailer->Username = 'contato@interfi.net';
    $mailer->Password = 'JUSCstPvqnN2'; 
    $mailer->setFrom('contato@interfi.net','Contato Escaler');
    $mailer->addReplyTo('contato@interfi.net','Contato Escaler');
    $mailer->addAddress($user);
    $mailer->IsHTML(true);
    $mailer->CharSet = 'utf8';
    $mailer->Body = $body;
    $mailer->Subject = 'Escaler - Confirmação de Email';
    if(!$mailer->send()) {
        $log = $mailer->ErrorInfo;
        $sql_error = "INSERT INTO solicitacao (id_usuario,solicitacao,concluido) VALUES (20,'Não foi enviar email para $user, por conta do erro: $log',0)";
        $query_error = (new Mysqli('localhost','nano','mellany0801gui','hotspottest'))->query($sql_error);
    }
    $query_error = (open_database())->query("UPDATE usuario SET activaction_code = '$ac' WHERE email = '$user'");
    header("Location: ../usuario/pagina-login.php?e=425&email=$user");
} elseif($tipo == 'cac') {
    $ac = filter_var($_GET['ac'],FILTER_SANITIZE_STRING);
    $query_error = (open_database())->query("UPDATE usuario SET u_status = '1' WHERE activaction_code = '$ac'");
    header('location: pagina-login.php?e=203');
} elseif($tipo == 'newsletter') {
    $datetime = date('Y-m-d H:i:s'); $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $dba = open_database();
    $check = (($dba)->query("SELECT * FROM newsletter  WHERE email = '$email'"));
    if($check->num_rows < 1) {
        $query = ((open_database())->query("INSERT INTO newsletter VALUES (NULL,'$email','$datetime')"));
    }
    header("Location: ../");
}elseif($tipo == 'logout') {
    unset($_SESSION['loggedin_escaler']);
    unset($_SESSION['id_user']);
    unset($_SESSION['name']);
    header("Location: /");
}