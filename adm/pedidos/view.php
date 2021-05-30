<?php
require '../../config.php';
require DBAPI;
require HEADER_ADMIN_TEMPLATE;
$pedido = get_pedido($_GET['id']);
$produtos=[]; foreach(json_decode($pedido['idproduto']) as $produto) { $produtos[]=get_produto_versao2($produto); }
?>
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
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Endereço de Entrega Preenchido</h4>
                    
                    <div class="card-text">
                        <div class="row">
                            <div class="col-md-9 col-lg-9 col-6">
                                    <h6>Rua</h6>
                                    <input type="text" class="form-control" value="<?=$pedido['rua']?>" name="rua" id="rua" readonly>
                            </div>
                            <div class="col-md-3 col-lg-3 col-2">
                                    <h6>Nº</h6>
                                    <input type="text" class="form-control" value="<?=$pedido['numero']?>" name="numero" id="numero" readonly>
                            </div>
                            <div class="col-md-6 col-lg-6 col-4">
                                    <h6>Complemento</h6>
                                    <input type="text" class="form-control" value="<?=$pedido['complemento']?>" name="complemento" id="complemento" readonly>
                            </div>
                            <div class="col-md-6 col-lg-6 col-4">
                                    <h6>Bairro</h6>
                                    <input type="text" class="form-control" value="<?=$pedido['bairro']?>" name="bairro" id="bairro" readonly>
                            </div>
                            <div class="col-md-4 col-lg-4 col-3">
                                    <h6>Cidade</h6>
                                    <input type="text" class="form-control" value="<?=$pedido['cidade']?>" name="cidade" id="cidade" readonly>
                            </div>
                            <div class="col-md-4 col-lg-4 col-3">
                                    <h6>Estado</h6>
                                    <input type="text" class="form-control" value="<?=$pedido['estado']?>" name="estado" id="estado" readonly>
                            </div>
                            <div class="col-md-4 col-lg-4 col-2">
                                <h6>CEP</h6>
                                <input type="int" class="form-control" value="<?=$pedido['cep']?>" name="cep" id='cep' readonly>
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
                    <input type="hidden" name="shop_item" value="<?=(int) $_GET['id']?>">
                    <input type="hidden" name="shop_user" value="<?=$_SESSION['id_user']?>">
                    <div class="card-text">
                        <style>
                            .mercadopago-button {
                                background:rgb(157,2,1);
                            }
                        </style>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
