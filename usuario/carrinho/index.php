<?php require_once '../../config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_USUARIO_TEMPLATE); ini_set('display_errors',1); ?>



<?php
function view($id) {
    global $usuario;
    $db = open_database();
    $query = $db->query("SELECT * FROM carrinho WHERE id='$id'");
    $usuario = $query->fetch_assoc();
}
view($_SESSION['id_user']);
error_reporting(E_ALL);
ini_set('display_errors',1);
?>



<!-- CORPO DA PÁGINA -->

<h2>Usuário ID nº:<?=$usuario['id']?></h2>

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
                <h3>79,00</h3>
                -------<br>
                Size<br>
                PP P M G GG EG
                </p>
                <br>
                <div class=button-adcarrinho><b>Adicionar Ao Carrinho</b></div>
                <br>
                <br>
                <div class=button-comprarpaypal><b>Comprar com Paypal</b></div>
                <div id="paypal-button-container"></div>
                <div class="a" style="color: black;"><b>Mais opções de pagamento</b></div>
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


<?php include(FOOTER_USUARIO_TEMPLATE); ?>