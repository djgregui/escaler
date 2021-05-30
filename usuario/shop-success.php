<?php 
//https://escaler.infocuspt.com/usuario/shop-success.php?collection_id=1236919183&collection_status=approved&payment_id=1236919183&status=approved&external_reference=7&payment_type=credit_card&merchant_order_id=2694602333&preference_id=233438859-ac13f85f-4261-4a11-a488-24038ecb1085&site_id=MLB&processing_mode=aggregator&merchant_account_id=null
require_once '../config.php'; 
require_once DBAPI; 
require_once COMPOSER;
$id_pedido =  filter_var($_GET['external_reference'],FILTER_SANITIZE_NUMBER_INT);
$pedido = ((open_database())->query("SELECT * FROM pedidos WHERE id = '".$id_pedido."'"))->fetch_assoc();
$id = $pedido['idproduto'];
$db = open_database();
// if($pedido['status'] != "0") {
    //     header("Location: pedidos/");exit;return false;
// } 
require_once HEADER_USUARIO_TEMPLATE; 
$id_payment = filter_var($_GET['payment_id'],FILTER_SANITIZE_NUMBER_INT); $tp_payment = filter_var($_GET['payment_type'],FILTER_SANITIZE_STRING);
$query = $db->query("UPDATE pedidos SET status='1',id_payment = '$id_payment', payment_status = 1, payment_type = '$tp_payment' WHERE id='$id_pedido';");
$produtos=[];
foreach(json_decode($id) as $id_produto) {
    $produto = ((open_database())->query("SELECT produto_versoes.*, produtos.nome, produtos.descricao FROM produto_versoes LEFT JOIN produtos ON produto_versoes.id_produto=produtos.id WHERE produto_versoes.id = '$id_produto'"))->fetch_assoc();
    $produto['imagens'] = ((open_database())->query("SELECT * FROM produto_imagens WHERE id_produto = '".$produto['id_produto']."'"))->fetch_all(MYSQLI_ASSOC);
    $produtos[]=$produto;
}
$body  = '';
$body .= 'Olá '.$usuario['nome'].' '.$usuario['sobrenome'].', seu pedido foi atualizado.<br>';
$body .= 'O novo status do seu pedido é \'Envio pendente\'<br>';
$body .= 'Você comprou: <br>' ;
foreach($produtos as $produto) {
    $body .= $produto['nome']. ': R$' . number_format($produto['valor'],2,',','.') . '<br>';
}
$body .= 'Enviaremos o prazo de entrega, e detalhes do envio assim que o produto for despachado.<br>';
$body .= 'Acompanhe seu pedido em <a href="https://'.DOMAIN.'/usuario/pedidos" style="color:rgb(1572,2,1)">https://'.DOMAIN.'/usuario/pedidos</a>';
$body .= '<br>Agradecemos por escolher a Escaler.<br>';
$body .= '<br>--<br><br>';
$body .= 'Escaler Store<br>' . EMAIL;

// Envia email notificando 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
$user = $usuario['email'];
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
$mailer->Subject = 'Escaler - Atualização de Pedido';
if(!$mailer->send()) { $log = $mailer->ErrorInfo; $sql_error = "INSERT INTO solicitacao (id_usuario,solicitacao,concluido) VALUES (20,'Não foi enviar email para $user, por conta do erro: $log',0)"; $query_error = (new Mysqli('localhost','nano','mellany0801gui','hotspottest'))->query($sql_error); }

?>

<div class="row">
    <div class="col-12">
        <p class="text-center font-weight-bold h2">Sua Compra</p>
        <br>
    </div>
    <div class="col-lg-6 col-12">
        <div class="container-fluid">
            <div class="row">
                <?php foreach($produtos as $produto) {?>
                    <div class="col-12 mb-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 text-center col-12">
                                        <div class="img-square-wrapper py-3">
                                            <img class="" src="<?=BASEURL?><?=$produto['imagens'][0]['url']?>" alt="Card image cap" style="max-width:180px;aspect-ratio:1/1;padding-left:16px;width:100%">
                                        </div>
                                    </div>
                                    <div class="col-lg-8 text-center col-12">
                                        <h4 class="card-title"><?=$produto['nome']?></h4>
                                        <div class="card-text">
                                            <p><b>Versão: </b> <?=$produto['versao']?>&nbsp;<b>Valor: </b>R$ <?=number_format($produto['valor'],2,',','.')?></p>
                                        </div>
                                    </div>
                                </div>
                                <p><b>Descrição: </b> <?=$produto['descricao']?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>  
    </div>
    <div class="col-lg-6 col-12">

        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Endereço de Entrega</h4>

                    <div class="card-text">
                        <div class="row">
                            <div class="col-9">
                                    <h6>Rua</h6>
                                    <input type="text" class="form-control" disabled value="<?=$pedido['rua']?>" name="rua" id="rua">
                            </div>
                            <div class="col-3">
                                    <h6>Nº</h6>
                                    <input type="text" class="form-control" disabled value="<?=$pedido['numero']?>" name="numero" id="numero">
                            </div>
                            <div class="col-6">
                                    <h6>Complemento</h6>
                                    <input type="text" class="form-control" disabled value="<?=$pedido['complemento']?>" name="complemento" id="complemento">
                            </div>
                            <div class="col-6">
                                    <h6>Bairro</h6>
                                    <input type="text" class="form-control" disabled value="<?=$pedido['bairro']?>" name="bairro" id="bairro">
                            </div>
                            <div class="col-5">
                                    <h6>Cidade</h6>
                                    <input type="text" class="form-control" disabled value="<?=$pedido['cidade']?>" name="cidade" id="cidade">
                            </div>
                            <div class="col-4">
                                    <h6>Estado</h6>
                                    <input type="text" class="form-control" disabled value="<?=$pedido['estado']?>" name="estado" id="estado">
                            </div>
                            <div class="col-3">
                                    <h6>CEP</h6>
                                    <input type="int" class="form-control" disabled value="<?=$pedido['cep']?>" name="cep" id='cep'>
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
                        <div class="alert alert-success" role="alert">
                            Seu pagamento foi aprovado! Enviamos os detalhes por email.<br>
                            Os dados de envio seram enviados assim que o pacote for despachado.
                        </div>                        
                        <p class="text-center">
                            <a href="<?=BASEURL?>usuario" class='btn btn-primary'>Voltar para o site</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</div>
