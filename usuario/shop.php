<?php
    ini_set('display_errors',1); 
    require_once '../config.php'; 
    require_once DBAPI; 
    require HEADER_USUARIO_TEMPLATE;
    $produtos=[];
    if(isset($_GET['cart'])) {
        $db_tracking->query("INSERT INTO tracking_shop VALUES (NULL,'$UUID','$IP','$COUNTRY','$ID','$DATETIME')");
        // echo json_encode($_POST);
        foreach($_POST['produto'] as $produto) {
            $produtos[]=get_produto_versao($produto);
        }
    } else {
        $produtos[]=get_produto_versao((int) $_GET['id']);
    }
    header_user($_SESSION['id_user']);
?>
<style> </style>
<div class="row">
    <div class="col-12">
        <p class="mt-4 mb-4 text-center font-weight-bold h2">Sua Compra</p>
    </div>
</div>
<form action='shop-pay.php' method='POST'>
<div class="row">
    <div class="col-lg-6 col-12">
        <div class="container-fluid">
        <div class="row">
        <?php foreach($produtos as $produto) { ?>
            <input type="hidden" name="shop_item[]" value="<?=$produto['versao_id']?>">
            <div class="col-12 mb-2">
                <div class="card" style="margin-bottom: 25px !important; box-shadow: 4px 4px 8px grey; border-radius: 5px;">
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
                        <p><b>Descrição: </b> <?=substr($produto['descricao'],0,400)?>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
        </div>
    </div>
    <div class="col-lg-6 col-12">
        
        <script>
            function reuseaddress() {
                document.querySelector('#cep').value="<?php echo $usuario['cep']; ?>";
                document.querySelector('#rua').value="<?php echo $usuario['rua']; ?>";
                document.querySelector('#numero').value="<?php echo $usuario['numero']; ?>";
                document.querySelector('#complemento').value="<?php echo $usuario['complemento']; ?>";
                document.querySelector('#bairro').value="<?php echo $usuario['bairro']; ?>";
                document.querySelector('#cidade').value="<?php echo $usuario['cidade']; ?>";
                document.querySelector('#estado').value="<?php echo $usuario['estado']; ?>";
            }
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="margin-bottom: 25px !important; box-shadow: 4px 8px 15px grey; border-radius: 15px;">
                        <div class="card-horizontal">
                            <div class="card-body">
                                <h4 class="card-title">Endereço Cadastrado</h4>
                                <div class="card-text">
                                 <p><b>Rua: </b><?=$usuario['rua'].', '.$usuario['numero'].' - '.$usuario['complemento']?>
                                 <p><?=$usuario['bairro'].', '.$usuario['cidade'].' - '.$usuario['estado']?></p>
                                 <p><b>CEP: </b><?=$usuario['cep']?></p>
                                 </div>
                                 <a href="javascript:void(0)" onclick="reuseaddress()" class="btn btn-outline-primary" >USAR ESTE ENDEREÇO</a>
                                 <a href="<?=BASEURL?>usuario/dados-pessoais/view-edit.php" target="_blank" class="btn btn-outline-danger">EDITAR</a>
                                 <!-- _blank faz abrir numa nova guia -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container-fluid">
            <div class="card" style="margin-bottom: 25px !important; box-shadow: 4px 8px 15px grey; border-radius: 15px;">
                <div class="card-body">
                    <h4 class="card-title">Endereço de Entrega</h4>

                    <div class="card-text">
                        <div class="row">
                            <div class="col-md-9 col-lg-9 col-8">
                                    <h6>Rua</h6>
                                    <input type="text" class="form-control" value="" name="rua" id="rua">
                            </div>
                            <div class="col-md-3 col-lg-3 col-4">
                                    <h6>Nº</h6>
                                    <input type="text" class="form-control" value="" name="numero" id="numero">
                            </div>
                            <div class="col-md-6 col-lg-6 col-6">
                                    <h6>Complemento</h6>
                                    <input type="text" class="form-control" value="" name="complemento" id="complemento">
                            </div>
                            <div class="col-md-6 col-lg-6 col-6">
                                    <h6>Bairro</h6>
                                    <input type="text" class="form-control" value="" name="bairro" id="bairro">
                            </div>
                            <div class="col-md-4 col-lg-4 col-12">
                                    <h6>Cidade</h6>
                                    <input type="text" class="form-control" value="" name="cidade" id="cidade">
                            </div>
                            <div class="col-md-4 col-lg-4 col-6">
                                    <h6>Estado</h6>
                                    <select class="form-control" name="estado" id="estado">
                                        <option value="" disabled selected>Selecione</option>
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="DF">Distrito Federal</option>
                                        <option value="ES">Espirito Santo</option>
                                        <option value="GO">Goiás</option>
                                        <option value="MA">Maranhão</option>
                                        <option value="MT">Mato Grosso do Sul</option>
                                        <option value="MS">Mato Grosso</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="PA">Pará</option>
                                        <option value="PB">Paraíba</option>
                                        <option value="PR">Paraná</option>
                                        <option value="PE">Pernambuco</option>
                                        <option value="PI">Piauí</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="RN">Rio Grande do Norte</option>
                                        <option value="RS">Rio Grande do Sul</option>
                                        <option value="RO">Rondônia</option>
                                        <option value="RR">Roraima</option>
                                        <option value="SC">Santa Catarina</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="SE">Sergipe</option>
                                        <option value="TO">Tocantins</option>
                                    </select>
                            </div>
                            <div class="col-md-4 col-lg-4 col-6">
                                <h6>CEP</h6>
                                <input type="int" class="form-control" value="" name="cep" id='cep'>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container-fluid mb-4">
            <div class="card" style="margin-bottom: 25px !important; box-shadow: 4px 8px 15px grey; border-radius: 15px;">
                <div class="card-body">
                    <h4 class="card-title">Gerar Pedido</h4>
                    
                    <input type="hidden" name="shop_user" value="<?=$_SESSION['id_user']?>">
                    <div class="card-text">
                        <?php
                        // Transfira esse código para tela com o pédido gerado
                            // SDK de Mercado Pago
                            // require '../vendor/autoload.php';
                            // Configura credenciais
                            // MercadoPago\SDK::setAccessToken('TEST-6783177390811949-032619-8999d2ce250b0c2b1d216c8cd6a4d0ea-233438859');
                            // Cria um objeto de preferência
                            // $preference = new MercadoPago\Preference();

                            // Cria um item na preferência
                            // $item = new MercadoPago\Item();
                            // $item->title = $produto['nome'];
                            // $item->quantity = 1;
                            // $item->unit_price = $produto['valor'];
                            // $preference->items = array($item);
                            // $preference->save();
                        ?>       
                        <!-- Não adicione isso -->
                        <!-- <script
                            src="https://www.mercadopago.com.br/integrations/v1/web-payment-checkout.js"
                            data-preference-id="">
                        </script>   -->
                    </div>
                    <!-- <br> -->
                    <!-- Shopping success será colocado em outro momento porém dentro da $item do ML API -->
                    <!-- Leia: https://www.mercadopago.com.br/developers/pt/guides/online-payments/checkout-pro/advanced-integration#bookmark_url_de_retorno -->
                    <button type='submit' class="btn btn-success btn-lg"  style="margin-bottom: 25px !important; box-shadow: 4px 4px 8px grey; border-radius: 5px;">Prosseguir para pagamento</button>
                </div>
            </div>
        </div>
    </div>
</div>
