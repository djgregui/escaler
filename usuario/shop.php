<?php ini_set('display_errors',1); require_once '../config.php'; ?>
<?php require_once DBAPI; ?>

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

// function view($id) {
//     global $usuario;
//     $db = open_database();
//     $query = $db->query("SELECT * FROM usuario WHERE id='$id'");
//     $usuario = $query->fetch_assoc();
// }
header_user($_SESSION['id_user']);
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
        <br>
        <p class="a font-weight-bold h2">Sua Compra</p>
        <br>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-12">
        <form action='shop-pay.php?id=<?=(int) $_GET['id']?>' method='POST'>
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Endereço de Entrega</h4>

                    <div class="card-text">
                        <div class="row">
                            <div class="col-6">
                                    <h6>Rua</h6>
                                    <input type="text" class="form-control" value="" name="rua" id="rua">
                            </div>
                            <div class="col-2">
                                    <h6>Nº</h6>
                                    <input type="text" class="form-control" value="" name="numero" id="numero">
                            </div>
                            <div class="col-4">
                                    <h6>Complemento</h6>
                                    <input type="text" class="form-control" value="" name="complemento" id="complemento">
                            </div>
                            <div class="col-4">
                                    <h6>Bairro</h6>
                                    <input type="text" class="form-control" value="" name="bairro" id="bairro">
                            </div>
                            <div class="col-3">
                                    <h6>Cidade</h6>
                                    <input type="text" class="form-control" value="" name="cidade" id="cidade">
                            </div>
                            <div class="col-3">
                                    <h6>Estado</h6>
                                    <select class="form-control" name="estado" id="estado">
                                        <option value="" disabled selected>Selecione</option>
                                        <option value="Acre">Acre</option>
                                        <option value="Alagoas">Alagoas</option>
                                        <option value="Amapá">Amapá</option>
                                        <option value="Amazonas">Amazonas</option>
                                        <option value="Bahia">Bahia</option>
                                        <option value="Ceará">Ceará</option>
                                        <option value="Distrito Federal">Distrito Federal</option>
                                        <option value="Espirito Santo">Espirito Santo</option>
                                        <option value="Goiás">Goiás</option>
                                        <option value="Maranhão">Maranhão</option>
                                        <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                                        <option value="Mato Grosso">Mato Grosso</option>
                                        <option value="Minas Gerais">Minas Gerais</option>
                                        <option value="Pará">Pará</option>
                                        <option value="Paraíba">Paraíba</option>
                                        <option value="Paraná">Paraná</option>
                                        <option value="Pernambuco">Pernambuco</option>
                                        <option value="Piauí">Piauí</option>
                                        <option value="Rio de Janeiro">Rio de Janeiro</option>
                                        <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                                        <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                                        <option value="Rondônia">Rondônia</option>
                                        <option value="Roraima">Roraima</option>
                                        <option value="Santa Catarina">Santa Catarina</option>
                                        <option value="São Paulo">São Paulo</option>
                                        <option value="Sergipe">Sergipe</option>
                                        <option value="Tocantins">Tocantins</option>
                                    </select>
                            </div>
                            <div class="col-2">
                                <h6>CEP</h6>
                                <input type="int" class="form-control" value="" name="cep" id='cep'>
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
                    <h4 class="card-title">Gerar Pedido</h4>
                    <input type="hidden" name="shop_item" value="<?=(int) $_GET['id']?>">
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
                    <button type='submit' class="btn btn-success btn-lg">Prosseguir para pagamento</button>
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
                                 <a href="#" onclick="reuseaddress()" class="btn btn-outline-primary">USAR ESTE ENDEREÇO</a>
                                 <a href="<?=BASEURL?>usuario/dados-pessoais/view-edit.php" target="_blank" class="btn btn-outline-danger">EDITAR</a>
                                 <!-- _blank faz abrir numa nova guia -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
