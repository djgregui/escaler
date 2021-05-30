<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
/**
 *  Cadastro de Clientes
 */
function add() {

  if (!empty($_POST['customer'])) {
    global $UUID;
    echo "<pre>";
    $customer = $_POST['customer'];
    $customer['senha'] = hash('sha256',$customer['senha']);
    $email = $customer['email'];
    // Checking already existing user email on database
    $check = ((open_database())->query("SELECT * FROM usuario WHERE email = '$email'"));
    if($check->num_rows == 0) {
      $customer['u_status'] = 0;
      $user = $customer['email'];
      $ac = $customer['activaction_code'] = md5($user . date('U') . $UUID);
      // Envia email notificando 
      $body="";
      $body .= "<center><h2 style='color:rgb(157,2,1)'>Bem Vindo ao Escaler!</h2><br>";
      $body .= "Você acabou de se cadastrar no Escaler, por questões de segurança, pedimos que confirme seu email clicando no botão abaixo.<br><br><br>";
      $body .= "<a href='https://".DOMAIN."/usuario/processa.php?tipo=cac&ac=$ac' style='padding: 10px 15px;background:rgb(157,2,1);color: white;margin-top: 10px;border-radius: 5px;margin-top:20px;margin-bottom:20px;text-decoration:none'>ATIVAR CONTA</a><br>";
      $body .= "<br><br>Caso o botão não funcione, acesse: https://".DOMAIN."/usuario/processa.php?tipo=cac&ac=$ac<br>";
      $body .= "</center>";
      require COMPOSER;
      $mailer = new PHPMailer();
      $mailer->IsSMTP();
      $mailer->Host = 'smtp.zoho.com';
      $mailer->Port = 587; //587
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
      save('usuario', $customer);
      header('location: ../usuario/pagina-login.php?e=424');
    } else {
      $check = ((open_database())->query("SELECT * FROM usuario WHERE email = '$email'"));
      if($check->fetch_assoc()['u_status'] == '0') {
        header("Location: ./index.php?e=425");
      } else {
        header("Location: ./index.php?e=400");
      }
    }

    echo json_encode($customer,JSON_PRETTY_PRINT);
    echo "</pre>";
    return false;
    exit;

  }
}