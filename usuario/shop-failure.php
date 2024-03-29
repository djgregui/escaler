<?php
require_once '../config.php'; 
require_once DBAPI; 
require_once COMPOSER;
$id_pedido =  filter_var($_GET['external_reference'],FILTER_SANITIZE_NUMBER_INT);
$pedido = ((open_database())->query("SELECT * FROM pedidos WHERE id = '".$id_pedido."'"))->fetch_assoc();
$id = $pedido['idproduto'];
$db = open_database();
if($pedido['status'] != "0") {
    header("Location: pedidos/");exit;return false;
} 
$id_payment = filter_var($_GET['payment_id'],FILTER_SANITIZE_NUMBER_INT); $tp_payment = filter_var($_GET['payment_type'],FILTER_SANITIZE_STRING); $preference_id = filter_var($_GET['preference_id'],FILTER_SANITIZE_STRING);
$query = $db->query("UPDATE pedidos SET status='0',id_payment = '$id_payment', payment_status = 2, payment_type = '$tp_payment' WHERE id='$id_pedido';");
require_once HEADER_USUARIO_TEMPLATE; 

function get_produto_versao($id){
    $db = open_database();
    $query = $db->query('SELECT produtos.*,produto_versoes.versao , produto_versoes.valor , produto_versoes.id as versao_id FROM produto_versoes LEFT JOIN produtos ON produto_versoes.id_produto=produtos.id WHERE produto_versoes.id = "'.$id.'" ');
    global $produto; $produto = $query->fetch_assoc(); $id=$produto['id'];
    $query2=$db->query($sql="SELECT * FROM produto_imagens WHERE id_produto = '$id'");
    global $produto_imagens;
    $produto_imagens = $query2->fetch_all(MYSQLI_ASSOC);
}
get_produto_versao((int) $id);

$body  = '';
$body .= 'Olá '.$usuario['nome'].' '.$usuario['sobrenome'].', seu pedido foi atualizado.<br>';
$body .= 'O novo status do seu pedido é \'Pagamento pendente\'<br>';
$body .= 'O motivo da atualização de status é \'Pagamento recusado ou cancelado\', por favor tente novamente em: ';
$body .= "<a target='_blank' href='https://admin.interfi.net/escaler/usuario/pedidos/view.php?id=$id_pedido'>Visualizar pedido</a><br>";
$body .= 'Você comprou '.$produto['nome']. '<br>';
$body .= 'Assim que o pagamento for concluido, entraremos em contato.<br>';
$body .= '<br>Agradecemos por escolher a Escaler.';

// Envia email notificando 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
$user = $usuario['email'];
$mailer = new PHPMailer();
$mailer->IsSMTP();
$mailer->Host = 'smtp.zoho.com';
$mailer->Port = 587; //587
// $mailer->SMTPDebug = 1;
$mailer->SMTPAuth = true;
$mailer->Username = 'contato@interfi.net';
$mailer->Password = 'JUSCstPvqnN2';  //net@interFI0801
$mailer->setFrom('contato@interfi.net','Contato Escaler');
$mailer->addReplyTo('contato@interfi.net','Contato Escaler');
$mailer->addAddress($user);
$mailer->addAddress('contato@interfi.net');
$mailer->IsHTML(true);
$mailer->CharSet = 'utf8';
$mailer->Body = $body;
$mailer->Subject = 'Escaler - Atualização de Pedido';
if(!$mailer->send()) {
    $log = $mailer->ErrorInfo;
    $sql_error = "INSERT INTO solicitacao (id_usuario,solicitacao,concluido) VALUES (20,'Não foi enviar email para $user, por conta do erro: $log',0)";
    $query_error = (new Mysqli('localhost','nano','mellany0801gui','hotspottest'))->query($sql_error);
}

?>

<style>
.card-horizontal {
    display: flex;
    flex: 1 1 auto;
}
* {
    /* display: none; */
}
</style>



<div class="row">
    <div class="col-12">
        <div style='height:10px'></div>
        <p class="a font-weight-bold h2">Sua Compra</p>
        <div style='height:10px'></div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 col-12">

        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Endereço de Entrega</h4>

                    <div class="card-text">
                        <div class="row">
                            <div class="col-9">
                                    <h6>Rua</h6>
                                    <input type="text" class="form-control" value="<?=$pedido['rua']?>" name="rua" id="rua">
                            </div>
                            <div class="col-3">
                                    <h6>Nº</h6>
                                    <input type="text" class="form-control" value="<?=$pedido['numero']?>" name="numero" id="numero">
                            </div>
                            <div class="col-6">
                                    <h6>Complemento</h6>
                                    <input type="text" class="form-control" value="<?=$pedido['complemento']?>" name="complemento" id="complemento">
                            </div>
                            <div class="col-6">
                                    <h6>Bairro</h6>
                                    <input type="text" class="form-control" value="<?=$pedido['bairro']?>" name="bairro" id="bairro">
                            </div>
                            <div class="col-5">
                                    <h6>Cidade</h6>
                                    <input type="text" class="form-control" value="<?=$pedido['cidade']?>" name="cidade" id="cidade">
                            </div>
                            <div class="col-4">
                                    <h6>Estado</h6>
                                    <input type="text" class="form-control" value="<?=$pedido['estado']?>" name="estado" id="estado">
                            </div>
                            <div class="col-3">
                                    <h6>CEP</h6>
                                    <input type="int" class="form-control" value="<?=$pedido['cep']?>" name="cep" id='cep'>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pagamento do Pedido</h4>
                    <div class="card-text">
                        <div class="alert alert-danger text-center" role="alert">
                            Seu pagamento foi cancelado! Enviamos os detalhes por email.<br>Pode tentar novamente abaixo:
                        </div>                        
                        <p class="text-center">
                        <script
                            src="https://www.mercadopago.com.br/integrations/v1/web-payment-checkout.js"
                            data-preference-id="<?=$preference_id?>" data-header-color="#9d0201" data-elements-color="#9d0201" data-button-label="Pagar com MercadoPago">
                        </script> 
                        </p>
                        <p class="text-center">
                            <a href="<?=BASEURL?>usuario" class="btn btn-sm btn-primary">Voltar para o site</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-12">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper py-3">
                            <img class="" src="<?=BASEURL?><?=$produto_imagens[0]['url']?>" alt="Card image cap" style="max-width:180px;aspect-ratio:9/16;">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title"><?=$produto['nome']?></h4>
                                <div class="card-text">
                                    <p><b>Versão: </b> <?=$produto['versao']?>&nbsp;<b>Valor: </b>R$ <?=number_format($produto['valor'],2,',','.')?></p>
                                    <p><b>Descrição: </b> <?=substr($produto['descricao'],0,400)?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
       

    </div>
</div>
