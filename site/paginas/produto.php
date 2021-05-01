<?php require_once '../../config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_SITE_TEMPLATE); ini_set('display_errors',1); ?>



<?php
function view($id) {
    global $produto;
    $db = open_database();
    $query = $db->query("SELECT * FROM produtos WHERE id='$id'");
    $produto = $query->fetch_assoc();
    $query2=$db->query($sql="SELECT * FROM produto_imagens WHERE id_produto = '$id'");
    global $produto_imagens;
    $produto_imagens = $query2->fetch_all(MYSQLI_ASSOC);
    
}
view($id = (int) $_GET['id']);
error_reporting(E_ALL);
ini_set('display_errors',1);
?>

<!-- CORPO DA PÁGINA -->

<div class="py-3">
    <p class="a display h2" style="font-family: 'Arapey'; font-weight: 400;">Produto</p>
    <p class="a">________</p>
    <br>  <!-- Pular Linha -->
</div>

<div class="container"> <!--Comando de contenção de elementos (como se estivessem dentro de uma caixa) -->
    <div class="row">

        <div class="col-6 py-3">
            <div class="container-black">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                    <style>
                        .carousel-control-prev-icon,
                        .carousel-control-next-icon {
                        height: 100px;
                        width: 100px;
                        background-size: 100%, 100%;
                        border-radius: 50%;
                        background-image: none;
                        }

                        .carousel-control-next-icon:after
                        {
                        content: '»';
                        font-size: 55px;
                        color: black;
                        }

                        .carousel-control-prev-icon:after {
                        content: '«';
                        font-size: 55px;
                        color: black;
                        }
                    </style>
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="<?=BASEURL?><?=$produto_imagens[0]['url']?>" alt="First slide">
                    </div>
                    <?php for($n=1;$n<count($produto_imagens);$n++) { ?>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="<?=BASEURL?><?=$produto_imagens[$n]['url']?>" alt=" slide">
                        </div>
                    <?php } ?>
                        
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div> 
        </div>

        <div class="col-6 py-3">
            <div class="container-black">
                <h1><?=$produto['nome']?></h1>
                <h3 id="produto_versao_preco"></h3>

                <script>
                function troca_produto(id,valor){
                    $('.btn-versao').attr('class','btn btn-outline-primary btn-versao')
                    $('#btn-p'+id).attr('class','btn btn-primary btn-versao')
                    document.getElementById('produto_versao_preco').innerText = 'R$ ' + parseFloat(valor).toFixed(2)
                    document.getElementById('btn-shop').setAttribute("href",'<?=BASEURL?>shop.php?id='+id)
                }
                $(function(){
                    <?php $id_produto = $produto['id']; $query = $db->query("SELECT * FROM produto_versoes WHERE id_produto='$id_produto'"); $produto_versao=$query->fetch_assoc(); $id_versao = $produto_versao['id']; ?>
                    troca_produto(<?=$produto_versao['id']?>,<?=$produto_versao['valor']?>)
                })
                </script>

                -------<br>
                Tamanho/Versão<br>
                
                <?php
                    // Entra no banco de dados
                    $db = open_database();
                    // Acessa o banco específico que quero a informação (o limite é a quantidade de itens seguidos mostrado)
                    $id_produto = $produto['id'];
                    $query = $db->query("SELECT * FROM produto_versoes WHERE id_produto='$id_produto'");
                    // Comando que faz sequencia dos itens do banco de dados para apresentação de mais de 1 item
                    while($versao=$query->fetch_assoc()){
                ?>
                    <a href="#"id='btn-p<?=$versao['id']?>' onclick="troca_produto(<?=$versao['id']?>,<?=$versao['valor']?>)" class="btn btn<?php if($versao['id'] != $id_versao){echo '-outline';}?>-primary btn-versao"><?=$versao['versao']?></a>  
                <?php
                }
                ?>

                </p>
                <br>
                <!-- <div class="btn btn-lg btn-outline-danger"><b>Adicionar Ao Carrinho</b></div> -->
                <!-- <br><br> -->
                <a href="#" id="btn-shop" class="btn btn-lg btn-warning font-weight-bold">Comprar Agora</a>
            </div>
        </div>
    </div>
    <div style="color: black">
        <h6>Características</h6><br>
        <p><?=$produto['descricao']?></p>
    </div>
</div>

<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->
<br>  <!-- Pular Linha -->


<div class="text-center">
@2020Escaler
</div>

<br>  <!-- Pular Linha -->


<?php include(FOOTER_SITE_TEMPLATE); ?>