<?php
require '../config.php';
require_once DBAPI; 
require_once HEADER_USUARIO_TEMPLATE;
if(!isset($_GET['tp'])) {
    $rua = filter_input(INPUT_POST,'rua',FILTER_SANITIZE_STRING);
    $numero = filter_input(INPUT_POST,'numero',FILTER_SANITIZE_STRING);
    $complemento = filter_input(INPUT_POST,'complemento',FILTER_SANITIZE_STRING);
    $bairro = filter_input(INPUT_POST,'bairro',FILTER_SANITIZE_STRING);
    $cidade = filter_input(INPUT_POST,'cidade',FILTER_SANITIZE_STRING);
    $estado = filter_input(INPUT_POST,'estado',FILTER_SANITIZE_STRING);
    $cep = filter_input(INPUT_POST,'cep',FILTER_SANITIZE_STRING);
    $shop_item = @json_encode($_POST['shop_item']);
    $shop_user = filter_input(INPUT_POST,'shop_user',FILTER_SANITIZE_STRING);
    $data = date('Y-m-d H:i:s');
    $sql = "INSERT INTO pedidos VALUES (NULL,$shop_user,'$shop_item','$data',0,'$rua','$numero','$complemento','$bairro','$cidade','$estado','$cep',NULL,NULL,NULL,NULL);";
    $db_pedido = open_database();
    $query = $db_pedido->query($sql);
    $_POST['id'] = $db_pedido->insert_id;
    echo $db_pedido->error;
} else {
    $_POST['id'] = (int) $_GET['id'];
}

$dadosPedidos = ((open_database())->query("SELECT * FROM pedidos WHERE id='".$_POST['id']."'"))->fetch_assoc(); $produtos=[];
foreach(json_decode($dadosPedidos['idproduto'],true) as $produto) {
    $produto = ((open_database())->query("SELECT produto_versoes.*,produtos.nome, produtos.descricao, produtos.id_colecao FROM produto_versoes LEFT JOIN produtos ON produto_versoes.id_produto=produtos.id WHERE produto_versoes.id = '".floatval($produto)."'"))->fetch_assoc();
    $produto['imagens'] = ((open_database())->query("SELECT * FROM produto_imagens WHERE id_produto = '".$produto['id_produto']."'"))->fetch_all(MYSQLI_ASSOC); $produtos[] = $produto;
}
?>
<script>localStorage.cart=JSON.stringify([]);</script>
<div class="row" style="">
    
    <div class="col-12">
        <p class="text-center font-weight-bold h2">Sua Compra</p>
        <br>
    </div>

    <div class="col-12 col-md-6 col-lg-6">

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
                                <p>      <b>Descrição: </b> <?=substr($produto['descricao'],0,400)?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>   
        
    </div>

    <div class="col-12 col-md-6 col-lg-6">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
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
        <br>
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Endereço de Entrega Preenchido</h4>
                    
                    <div class="card-text">
                        <div class="row">
                            <div class="col-md-9 col-lg-9 col-6">
                                    <h6>Rua</h6>
                                    <input type="text" class="form-control" value="<?=$dadosPedidos['rua']?>" name="rua" id="rua" readonly>
                            </div>
                            <div class="col-md-3 col-lg-3 col-2">
                                    <h6>Nº</h6>
                                    <input type="text" class="form-control" value="<?=$dadosPedidos['numero']?>" name="numero" id="numero" readonly>
                            </div>
                            <div class="col-md-6 col-lg-6 col-4">
                                    <h6>Complemento</h6>
                                    <input type="text" class="form-control" value="<?=$dadosPedidos['complemento']?>" name="complemento" id="complemento" readonly>
                            </div>
                            <div class="col-md-6 col-lg-6 col-4">
                                    <h6>Bairro</h6>
                                    <input type="text" class="form-control" value="<?=$dadosPedidos['bairro']?>" name="bairro" id="bairro" readonly>
                            </div>
                            <div class="col-md-4 col-lg-4 col-3">
                                    <h6>Cidade</h6>
                                    <input type="text" class="form-control" value="<?=$dadosPedidos['cidade']?>" name="cidade" id="cidade" readonly>
                            </div>
                            <div class="col-md-4 col-lg-4 col-3">
                                    <h6>Estado</h6>
                                    <input type="text" class="form-control" value="<?=$dadosPedidos['estado']?>" name="estado" id="estado" readonly>
                            </div>
                            <div class="col-md-4 col-lg-4 col-2">
                                <h6>CEP</h6>
                                <input type="int" class="form-control" value="<?=$dadosPedidos['cep']?>" name="cep" id='cep' readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container-fluid mb-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pagamento do Pedido</h4>
                    <?php
                        $valortotal = 0;
                        foreach($produtos as $produto) {
                        $valortotal += floatval($produto['valor']);
                        }
                    ?>
                    <p>Valor Total do Pedido: R$ <?=number_format($valortotal,2,',','.')?></p>
                    <input type="hidden" name="shop_item" value="<?=(int) $_GET['id']?>">
                    <input type="hidden" name="shop_user" value="<?=$_SESSION['id_user']?>">
                    <div class="card-text">
                        <style>
                            .mercadopago-button {
                                background:rgb(157,2,1);
                            }
                        </style>
                        <?php
                        // Transfira esse código para tela com o pédido gerado
                            // SDK de Mercado Pago
                            require COMPOSER; //'../vendor/autoload.php';
                            // Configura credenciais
                            MercadoPago\SDK::setAccessToken(MP_API_TOKEN);
                            // echo MP_API_TOKEN;
                            // Cria um objeto de preferência
                            $preference = new MercadoPago\Preference();
                            $items=[];
                            foreach($produtos as $produto) {
                                // Cria um item na preferência
                                $item = new MercadoPago\Item();
                                $item->title = $produto['nome'];
                                $item->quantity = 1;
                                $item->unit_price = $produto['valor'];
                                $item->description = $produto['descricao'];
                                $item->currency_id = 'BRL';
                                $item->picture_url = $produto['imagens'][0]['url'];
                                $item->category_id = $produto['id_colecao'];
                                $items[]=$item;
                            }
                            $preference->items = $items;
                            $preference->external_reference = $_POST['id'];
                            $preference->statement_descriptor = "ESCALER";
                            $preference->back_urls = array(
                                "success" => "https://".DOMAIN."/usuario/shop-success.php",
                                "failure" => "https://".DOMAIN."/usuario/shop-failure.php",
                                "pending" => "https://".DOMAIN."/usuario/shop-pending.php"
                            );
                            $shipments = new MercadoPago\Shipments; 
                            $shipments->free_shipping = true;
                            $preference->shipments;
                            $preference->notification_url = "https://".DOMAIN."/ipn.php?id=".$dadosPedidos['id'];
                            // var_dump($preference);
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

</div>
