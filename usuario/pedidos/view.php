<?php
require '../../config.php';
require DBAPI;
require HEADER_USUARIO_TEMPLATE;
$dadosPedidos = ((open_database())->query("SELECT * FROM pedidos WHERE id='".filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT)."'"))->fetch_assoc();
$produtos = get_produtos_from_json($dadosPedidos['idproduto']);
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
        <div class="card" style="margin-bottom: 25px !important; box-shadow: 4px 8px 15px grey; border-radius: 15px;">
            <div class="card-body">
                <h4 class="card-title">Endereço de Entrega Preenchido</h4>
                
                <div class="card-text">
                    <div class="row">
                        <div class="col-6">
                                <h6>Rua</h6>
                                <input type="text" class="form-control" value="<?=$dadosPedidos['rua']?>" name="rua" id="rua" readonly>
                        </div>
                        <div class="col-2">
                                <h6>Nº</h6>
                                <input type="text" class="form-control" value="<?=$dadosPedidos['numero']?>" name="numero" id="numero" readonly>
                        </div>
                        <div class="col-4">
                                <h6>Complemento</h6>
                                <input type="text" class="form-control" value="<?=$dadosPedidos['complemento']?>" name="complemento" id="complemento" readonly>
                        </div>
                        <div class="col-4">
                                <h6>Bairro</h6>
                                <input type="text" class="form-control" value="<?=$dadosPedidos['bairro']?>" name="bairro" id="bairro" readonly>
                        </div>
                        <div class="col-3">
                                <h6>Cidade</h6>
                                <input type="text" class="form-control" value="<?=$dadosPedidos['cidade']?>" name="cidade" id="cidade" readonly>
                        </div>
                        <div class="col-3">
                                <h6>Estado</h6>
                                <input type="text" class="form-control" value="<?=$dadosPedidos['estado']?>" name="estado" id="estado" readonly>
                        </div>
                        <div class="col-2">
                            <h6>CEP</h6>
                            <input type="int" class="form-control" value="<?=$dadosPedidos['cep']?>" name="cep" id='cep' readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="height:5px"></div>
        <div class="card" style="margin-bottom: 25px !important; box-shadow: 4px 8px 15px grey; border-radius: 15px;">
            <div class="card-body">
                <h4 class="card-title">Pagamento do Pedido</h4>
                <div class="card-text">
                    <h6><b>Status:</b>&nbsp;<?=switch_status($dadosPedidos['status'])?></h6>
                    <?php if($dadosPedidos['status'] == '0' && $dadosPedidos['id_payment'] == null) { echo '<a class="btn btn-sm btn-danger" style="margin-bottom: 25px !important; box-shadow: 4px 4px 8px grey; border-radius: 5px;" href="'.BASEURL.'usuario/shop-pay.php?tp=repay&id='.$dadosPedidos['id'].'">Pagar novamente</a>';}?>
                </div>
            </div>
        </div>
        <br>
        <p class="text-right">
            <a href="<?=BASEURL?>usuario/pedidos" class="btn btn-danger"  style="margin-bottom: 25px !important; box-shadow: 4px 4px 8px grey; border-radius: 5px;">Voltar</a>
        </p>
    </div>
    <div class="col-12 col-lg-6">
        <div class="container-fluid">
            <div class="row">
                <?php foreach($produtos as $produto) {?>
                    <div class="col-12 mb-2">
                        <div class="card" style="margin-bottom: 25px !important; box-shadow: 1px 1px 4px grey; border-radius: 15px;">
                            <div class="card-horizontal">
                                <div class="img-square-wrapper py-3">
                                <img class="" src="<?=BASEURL?><?=$produto['imagens'][0]['url']?>" alt="Card image cap" style="max-width:180px;aspect-ratio:9/16;padding-left:16px">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title"><?=$produto['nome']?></h4>
                                    <div class="card-text">
                                        <p><b>Versão: </b> <?=$produto['versao']?>&nbsp;<b>Valor: </b>R$ <?=number_format($produto['valor'],2,',','.')?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>   
        

    </div>
</div>
