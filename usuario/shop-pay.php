<?php
require '../config.php';
require_once DBAPI; 
// Registrando compra
$rua = filter_input(INPUT_POST,'rua',FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST,'numero',FILTER_SANITIZE_STRING);
$complemento = filter_input(INPUT_POST,'complemento',FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST,'bairro',FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST,'cidade',FILTER_SANITIZE_STRING);
$estado = filter_input(INPUT_POST,'estado',FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST,'cep',FILTER_SANITIZE_STRING);
$shop_item = filter_input(INPUT_POST,'shop_item',FILTER_SANITIZE_STRING);
$shop_user = filter_input(INPUT_POST,'shop_user',FILTER_SANITIZE_STRING);
$data = date('Y-m-d H:i:s');
$sql = "INSERT INTO pedidos VALUES (NULL,$shop_user,$shop_item,'$data',0,'$rua','$numero','$complemento','$bairro','$cidade','$estado','$cep',NULL,NULL,NULL);";
$db_pedido = open_database();
$query = $db_pedido->query($sql);
echo $db_pedido->error;
?>

<?php include(HEADER_USUARIO_TEMPLATE); ?>

<?php
function get_produto_versao($id){
    $db = open_database();
    $query = $db->query('SELECT produtos.*,produto_versoes.versao , produto_versoes.valor , produto_versoes.id as versao_id FROM produto_versoes LEFT JOIN produtos ON produto_versoes.id_produto=produtos.id WHERE produto_versoes.id = "'.$id.'" ');
    global $produto; $produto = $query->fetch_assoc(); $id=$produto['id'];
    $query2=$db->query($sql="SELECT * FROM produto_imagens WHERE id_produto = '$id'");
    global $produto_imagens;
    $produto_imagens = $query2->fetch_all(MYSQLI_ASSOC);
}
get_produto_versao((int) $_GET['id']);
// view($_SESSION['id_user']);
?>
<style>
    .card-horizontal {
        display: flex;
        flex: 1 1 auto;
    }
</style>
<div class="row">
    <div class="col-12">
        <br>
        <p class="a font-weight-bold h2">Sua Compra</p>
    </div>
</div>
<br>
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Endereço de Entrega Preenchido</h4>
                    
                    <div class="card-text">
                        <div class="row">
                            <div class="col-6">
                                    <h6>Rua</h6>
                                    <input type="text" class="form-control" value="<?=filter_input(INPUT_POST,'rua',FILTER_SANITIZE_STRING)?>" name="rua" id="rua" readonly>
                            </div>
                            <div class="col-2">
                                    <h6>Nº</h6>
                                    <input type="text" class="form-control" value="<?=filter_input(INPUT_POST,'numero',FILTER_SANITIZE_STRING)?>" name="numero" id="numero" readonly>
                            </div>
                            <div class="col-4">
                                    <h6>Complemento</h6>
                                    <input type="text" class="form-control" value="<?=filter_input(INPUT_POST,'complemento',FILTER_SANITIZE_STRING)?>" name="complemento" id="complemento" readonly>
                            </div>
                            <div class="col-4">
                                    <h6>Bairro</h6>
                                    <input type="text" class="form-control" value="<?=filter_input(INPUT_POST,'bairro',FILTER_SANITIZE_STRING)?>" name="bairro" id="bairro" readonly>
                            </div>
                            <div class="col-3">
                                    <h6>Cidade</h6>
                                    <input type="text" class="form-control" value="<?=filter_input(INPUT_POST,'cidade',FILTER_SANITIZE_STRING)?>" name="cidade" id="cidade" readonly>
                            </div>
                            <div class="col-3">
                                    <h6>Estado</h6>
                                    <input type="text" class="form-control" value="<?=filter_input(INPUT_POST,'estado',FILTER_SANITIZE_STRING)?>" name="estado" id="estado" readonly>
                            </div>
                            <div class="col-2">
                                <h6>CEP</h6>
                                <input type="int" class="form-control" value="<?=filter_input(INPUT_POST,'cep',FILTER_SANITIZE_STRING)?>" name="cep" id='cep' readonly>
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
                    <input type="hidden" name="shop_item" value="<?=(int) $_GET['id']?>">
                    <input type="hidden" name="shop_user" value="<?=$_SESSION['id_user']?>">
                    <div class="card-text">
                        <?php
                        // Transfira esse código para tela com o pédido gerado
                            // SDK de Mercado Pago
                            require '../vendor/autoload.php';
                            // Configura credenciais
                            MercadoPago\SDK::setAccessToken('TEST-6783177390811949-032619-8999d2ce250b0c2b1d216c8cd6a4d0ea-233438859');
                            // Cria um objeto de preferência
                            $preference = new MercadoPago\Preference();

                            // Cria um item na preferência
                            $item = new MercadoPago\Item();
                            $item->title = $produto['nome'];
                            $item->quantity = 1;
                            $item->unit_price = $produto['valor'];
                            $preference->items = array($item);
                            $preference->external_reference = $db_pedido->insert_id;
                            $preference->back_urls = array(
                                "success" => "https://admin.interfi.net/escaler/usuario/shop-success.php",
                                "failure" => "https://admin.interfi.net/escaler/usuario/shop-failure.php",
                                "pending" => "https://admin.interfi.net/escaler/usuario/shop-pending.php"
                            );
                            $preference->save();
                        ?>       
                        <script
                            src="https://www.mercadopago.com.br/integrations/v1/web-payment-checkout.js"
                            data-preference-id="<?=$preference->id?>" data-header-color="#9d0201" data-elements-color="#9d0201" data-button-label="Pagar com MercadoPago">
                        </script>  
                        <br>
                    </div>
                    <!-- <br> -->
                    <!-- Shopping success será colocado em outro momento porém dentro da $item do ML API -->
                    <!-- Leia: https://www.mercadopago.com.br/developers/pt/guides/online-payments/checkout-pro/advanced-integration#bookmark_url_de_retorno -->
                    <!-- <button type='submit' class="btn btn-success btn-lg">GERAR PEDIDO / EFETUAR PAGAMENTO</button> -->
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-6">

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
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-horizontal">
                            <div class="card-body">
                                <h4 class="card-title">Endereço Cadastrado</h4>
                                <div class="card-text">
                                 <p><b>Rua: </b><?=$usuario['rua'].', '.$usuario['numero'].' - '.$usuario['complemento']?>
                                 <p><?=$usuario['bairro'].', '.$usuario['cidade'].' - '.$usuario['estado']?></p>
                                 <p><b>CEP: </b><?=$usuario['cep']?></p>
                                 </div>
                                 <!-- _blank faz abrir numa nova guia -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
